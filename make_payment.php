<?php
include("dbconnection.php");
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit;
}

// Retrieve the username from the session
$customer_name = $_SESSION['name'];

// Retrieve product details from the session
$product_details = $_SESSION['product_details'];

// Initialize total price
$total_price = 0;

// Prepare product details HTML
$product_table = '<table border="1">
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>';

// Loop through each product and add details to the table
foreach ($product_details as $product) {
    $product_table .= '<tr>
                        <td>' . $product['product_name'] . '</td>
                        <td>' . $product['quantity'] . '</td>
                        <td>' . $product['total_price'] . '</td>
                    </tr>';

    // Accumulate total price
    $total_price += $product['total_price'];
}

// Close the HTML table
$product_table .= '</table>';

// Get today's date
$order_date = date("Y-m-d");
?>

<html>
<head>
    <link rel="stylesheet" href="make_payment.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl嗨⢾姞筗㵁縓狙혲絷䶜黺ࢌ鯇똯==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Make Payment</title>
    <link rel="icon" type="png" href="image/dreams2.png">
</head>
<body>

    <h2>Make Payment</h2>

    <!-- Display product details from the session -->
    <div>
        <h3>Product Details</h3>
        <?php echo $product_table; ?>
        <h3>Total Price</h3>
        <p>RM <?php echo number_format($total_price, 2); ?></p>
    </div>

    <!-- Your payment form goes here -->

    <form method="post" action="process_payment.php">
        <!-- Include your input fields for name, contact number, address, payment method, etc. -->
        <div>
            <label for="order_date">Order Date:</label>
            <input type="text" name="order_date" value="<?php echo $order_date; ?>" readonly>
        </div>
        <div>
            <label for="customer_name">Customer Name:</label>
            <input type="text" id="customer_name" name="customer_name" value="<?php echo $customer_name; ?>" readonly>
        </div>
        <div>
            <label for="customer_number">Contact Number:</label>
            <input type="text" id="customer_number" name="contact_number" pattern="[0-9]{3}-[0-9]{7,8}" required>
        </div>
        <div>
            <label for="customer_address">Home Address:</label>
            <input type="text" id="customer_address" name="customer_address" required>
        </div>
        <div>
            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" required>
                <option value="">Select Payment Method</option>
                <option value="Cash On Delivery">Cash On Delivery</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Online Banking">Online Banking</option>
            </select>
        </div>
        <!-- Loop through product details and create hidden input fields for each product -->
        <?php foreach ($product_details as $index => $product): ?>
            <input type="hidden" name="products[<?php echo $index; ?>][name]" value="<?php echo $product['product_name']; ?>">
            <input type="hidden" name="products[<?php echo $index; ?>][total_price]" value="<?php echo $product['total_price']; ?>">
        <?php endforeach; ?>
        <!-- Submit button -->
        <input type="submit" name="pay_now" value="Pay Now">
    </form>

    <!-- Back to cart link -->
    <a href="cart.php">Back to Cart</a>

    <?php @include 'footer.php'; ?>

</body>
</html>