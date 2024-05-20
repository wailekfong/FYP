<?php
include("dbconnection.php");

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.html"); // Redirect to login page if user is not logged in
    exit;
}

// Retrieve register_username from session
$register_username = $_SESSION['name'];

// Retrieve transaction history for the logged-in user from the orders table
$sql = "SELECT * FROM orders WHERE customer_name = '$register_username' ORDER BY order_date DESC";

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
    <link rel="stylesheet" href="transaction_history.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl嗨⢾姞筗㵁縓狙혲絷䶜黺ࢌ鯇똯==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Transaction History</title>
    <link rel="icon" type="png" href="image/dreams2.png">
</head>
<body>

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
    </tr>
    <?php
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['customer_name'] . "</td>";
            echo "<td>" . $row['customer_number'] . "</td>";
            echo "<td>" . $row['customer_address'] . "</td>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['total_price'] . "</td>";
            echo "<td>" . $row['order_date'] . "</td>";
            echo "<td>" . $row['payment_method'] . "</td>";
            echo "<td>" . $row["delivery_status"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No transactions found.</td></tr>";
    }
    ?>
</table>

<div class="back-to-home">
    <a href="index.php" class="button"><i class="fas fa-home"></i> Back to Home</a>
</div>

<footer>
    <?php @include 'footer.php'; ?>
</footer>

</body>
</html>
