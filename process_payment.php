<?php
include("dbconnection.php");
session_start();

// Retrieve the username from the session
$customer_name = $_SESSION['name'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customer_name = $_POST['customer_name'];
    $customer_number = $_POST['contact_number']; // Corrected to match form input name
    $customer_address = $_POST['customer_address'];
    $order_date = $_POST['order_date'];
    $payment_method = $_POST['payment_method'];

    // Retrieve product details from the form
    $products = $_POST['products'];

    // Insert order details into the database
    foreach ($products as $product) {
        $product_name = $product['name'];
        $total_price = $product['total_price'];

        // Prepare the SQL statement
        $stmt = mysqli_prepare($connect, "INSERT INTO orders (customer_name, customer_number, customer_address, product_name, total_price, order_date, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "ssssdss", $customer_name, $customer_number, $customer_address, $product_name, $total_price, $order_date, $payment_method);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Order placed successfully
            echo '<script>alert("Order placed successfully."); window.location = "feedback.php";</script>';

            // Clear the cart after successful order placement
            $clear_cart_query = "DELETE FROM cart";
            if (mysqli_query($connect, $clear_cart_query)) {
                // Cart cleared successfully
                echo '<script>console.log("Cart cleared successfully.");</script>';
            } else {
                // Error occurred while clearing cart
                echo '<script>console.error("Error clearing cart: ' . mysqli_error($connect) . '");</script>';
            }
        } else {
            // Error occurred
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }
    // Close the database connection
    mysqli_close($connect);
} else {
    // Redirect back to the payment page if the form is not submitted
    header("Location: make_payment.php");
    exit;
}