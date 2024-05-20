<?php 
ob_start(); // Start output buffering
include("dbconnection.php");
session_start();
?>

<html>
<head>
    <link rel="stylesheet" href="purchase.css">
    <link rel="stylesheet" href="size.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl嗨⢾姞筗㵁縓狙혲絷䶜黺ࢌ鯇똯==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Product Detail</title>
    <link rel="icon" type="png" href="image/dreams2.png">
</head>
<body>
   

<?php
if(isset($_GET["buy"])) {
    $productid = $_GET["productid"];

    $result = mysqli_query($connect, "SELECT * FROM product WHERE product_id='$productid'");
    $row = mysqli_fetch_assoc($result);
}
?>

<h1>Product Detail</h1>
<p>
    <img src="<?php echo $row['product_image']; ?>" alt="Product Image">
    <br>Product ID : <?php echo $row['product_id'] ?>
    <br>Product Name : <?php echo $row['product_name'] ?>
    <br>Product Price : <?php echo $row['product_price'] ?>
    <br>Product Stock : 
    <?php 
        if ($row['product_stock'] > 0) 
        {
            echo "In stock";
        } else {
            echo "Out of stock";
        } 
    ?>
    <br>Product Detail : <?php echo $row['product_details'] ?>
    <?php if (!empty($row['product_size'])): ?>
        <br>Product Sizes: 
        <ul class="product-sizes">
            <?php if (strpos($row['product_size'], ',') !== false): ?>
                <?php $sizes = explode(',', $row['product_size']); ?>
                <?php foreach ($sizes as $size): ?>
                    <li><?php echo $size; ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li><?php echo $row['product_size']; ?></li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
</p>

<h1>Your Order Detail</h1>
<form name="purchasefrm" method="post" action="">
    <p>Quantity:<input type="number" name="cust_qty" value="1" min="1"></p>
    <?php if (!empty($row['product_size'])): ?>
        <!-- Modified section to include only selected product size -->
        <?php if (strpos($row['product_size'], ',') !== false): ?>
            <label for="product_size">Select Size:</label>
            <select name="product_size">
                <?php $sizes = explode(',', $row['product_size']); ?>
                <?php foreach ($sizes as $size): ?>
                    <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                <?php endforeach; ?>
            </select>
        <?php else: ?>
            <input type="hidden" name="product_size" value="<?php echo $row['product_size']; ?>">
        <?php endif; ?>
    <?php endif; ?>
    <p><input type="submit" name="orderbtn" value="Add to Cart"></p>
</form>

<div>
    <ul class="nav-links">
        <li class="btn"><a href="product.php">Product Page</a></li>
    </ul>
</div>

<?php @include 'footer.php'; ?>

</body>
</html>

<?php
if (isset($_POST["orderbtn"])) {
    $cqty = $_POST["cust_qty"];  // Retrieve value from purchasefrm
    $csize = isset($_POST["product_size"]) ? $_POST["product_size"] : ''; // Retrieve selected size
    $cname = $row["product_name"];
    $cprice = $row["product_price"];
    $tprice = $row["product_price"] * $cqty;

    // Check if the product already exists in the cart table for the user
    $check_query = mysqli_query($connect, "SELECT * FROM cart WHERE product_name='$cname' AND product_size='$csize'");
    if(mysqli_num_rows($check_query) > 0) {
        // If the product exists with the same size, update the quantity
        $existing_row = mysqli_fetch_assoc($check_query);
        $new_qty = $existing_row['quantity'] + $cqty;
        $new_tprice = $existing_row['product_price'] * $new_qty;
        
        mysqli_query($connect, "UPDATE cart SET quantity='$new_qty', total_price='$new_tprice' 
                            WHERE product_name='$cname' AND product_size='$csize'");
    } else {
        // If the product doesn't exist or exists with a different size, insert it into the cart table
        mysqli_query($connect, "INSERT INTO cart (product_id, product_name, product_price, quantity, total_price, product_size) 
                            VALUES ('$productid','$cname','$cprice', '$cqty', '$tprice', '$csize')");
    }
    
    header("location: cart.php");
    exit(); // Stop execution after redirection
}
ob_end_flush(); // Flush the output buffer and turn off output buffering
?>