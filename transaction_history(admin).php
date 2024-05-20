<?php
include("dbconnection.php");

// Start session
session_start();

// Retrieve transaction history for all users from the orders table
$sql = "SELECT * FROM orders ORDER BY order_date DESC";

// Execute the query    
$result = mysqli_query($connect, $sql);

// Close the database connection
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_product.css?v=<?php echo time(); ?>">
    <title>Transaction History</title>
    <link rel="icon" type="png" href="image/dreams2.png">
    <style>
        /* admin_product.css */

/* Table styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

/* Style the table header */
th:first-child, td:first-child {
    border-left: none;
}

th:last-child, td:last-child {
    border-right: none;
}

/* Style alternate rows */
tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Hover effect on rows */
tr:hover {
    background-color: #e9e9e9;
}

/* Back to Home button style */
.back-to-home {
    margin-top: 20px;
    text-align: center;
}

.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #0056b3;
}
</style>

</head>
<body>
<?php include ("admin_header.php"); ?>
<h2>Transaction History</h2>

<table>
    <tr>
        <th>Customer Name</th>
        <th>Customer Number</th>
        <th>Customer Address</th>
        <th>Product Name</th>
        <th>Total Price</th>
        <th>Order Date</th>
        <th>Payment Method</th>
        <th>Delivery Status</th>
        <th>Action</th>
    </tr>
    <?php
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <tr>
            <td><?php echo $row["customer_name"]; ?></td>
            <td><?php echo $row["customer_number"]; ?></td>
            <td><?php echo $row["customer_address"]; ?></td>
            <td><?php echo $row["product_name"]; ?></td>
            <td><?php echo $row["total_price"]; ?></td>
            <td><?php echo $row["order_date"]; ?></td>
            <td><?php echo $row["payment_method"]; ?></td>
            <td><?php echo $row["delivery_status"]; ?></td>
            <td><a href="admin(order_detail).php?detail&orderid=<?php echo $row['order_id']; ?>">View Detail</a></td></td>
        </tr>
            
        <?php
        }
    } else {
        echo "<tr><td colspan='7'>No transactions found.</td></tr>";
    }
    ?>
</table>

<div class="back-to-home">
    <a href="admin_mainpage.php" class="button"><i class="fas fa-home"></i> Back to Home</a>
</div>

</body>
</html>