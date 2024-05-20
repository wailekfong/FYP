<?php include "dbconnection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Details</title>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
    <link rel="icon" type="png" href="image/dreams2.png">
</head>
<body>
    
    <?php
        if(isset($_GET["detail"])){
            $orderid = $_GET["orderid"];
            $result = mysqli_query($connect, "SELECT * FROM orders WHERE order_id = $orderid");
            $row = mysqli_fetch_assoc($result);
    ?>
    <div class="body">
        <form method="POST" action="" class="box">
            <h2>Order Detail</h2>
            <p>Order ID : <span><?php echo $row["order_id"]; ?></span></p>
            <p>Customer Name : <span><?php echo $row["customer_name"]; ?></span></p>
            <p>Customer Number : <span><?php echo $row["customer_number"]; ?></span></p>
            <p>Customer Address : <span><?php echo $row["customer_address"]; ?></span></p>
            <p>Product Name : <span><?php echo $row["product_name"]; ?></span></p>
            <p>Total Price : <span><?php echo $row["total_price"]; ?></span></p>
            <p>Order Date : <span><?php echo $row["order_date"]; ?></span></p>
            <p>Payment Method : <span><?php echo $row["payment_method"]; ?></span></p>
            <input type="hidden" name="order_id" value="<?= $row['order_id']; ?>">
            <p>Delivery Status : <span><?php echo $row["delivery_status"]; ?></span></p>
            
            <br> 
            <div class=buttons>
                <button type="submit" name="generatepdf" class="generatepdf" formaction="generatepdf(user).php" formtarget="_blank"><b>Generate PDF</b></button><br><br>
                <a href="transaction_history.php" class="bk"><b>Back</b></a>
            </div>
        </form>
    <?php
        }
    ?>
    </div>
</body>
</html>

<?php
if (isset($_POST["savebtn"])) {
    $orderid = $_POST["order_id"];
    $nstatus = $_POST["delivery_status"];
    mysqli_query($connect, "UPDATE orders SET delivery_status='$nstatus' WHERE order_id=$orderid");
    ?>
    <script type="text/javascript">
        alert("Status Updated");
        window.location.href = "transaction_history(admin).php";
    </script>
    <?php
}

if (isset($_POST["archivebtn"])) {
    $orderid = $_POST["order_id"];

    $result = mysqli_query($connect, "SELECT * FROM orders WHERE order_id=$orderid");
    $row = mysqli_fetch_assoc($result);
    $archiveName = $row["customer_name"];
    $archiveNumber = $row["customer_number"];
    $archiveAddress = $row["customer_address"];
    $archiveItem = $row["product_name"];
    $archiveTotalPrice = $row["total_price"];
    $archiveDate = $row["order_date"];
    $archivePaymentMethod = $row["payment_method"];

    mysqli_query($connect, "INSERT INTO archive_order (customer_name, customer_number, customer_address, product_name, total_price, order_date, payment_method) VALUES ('$archiveName', '$archiveNumber', '$archiveAddress', '$archiveItem', '$archiveTotalPrice', '$archiveDate', '$archivePaymentMethod')");
    mysqli_query($connect, "DELETE FROM orders WHERE order_id = $orderid");
    ?>
    <script type="text/javascript">
        alert("Order Archived");
        window.location.href = "transaction_history(admin).php";
    </script>
    <?php
}
?>
<script type="text/javascript">
    function confirmation(){
        return confirm("Do you want to archive this order?");
    }
</script>
