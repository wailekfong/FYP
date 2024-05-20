<?php
include("dbconnection.php");
session_start();
$user_id = $_SESSION['id'];

// Retrieve the cart items
$find_cart_sql = "SELECT * FROM cart WHERE user_id = $user_id";
$result_cart = mysqli_query($connect, $find_cart_sql);

// Calculate the total price
$total = 0;
if (mysqli_num_rows($result_cart) > 0) {
    while ($row_cart = mysqli_fetch_assoc($result_cart)) {
        $product_category = $row_cart['product_category'];
        $product_id = $row_cart['product_id'];
        $product_price = $row_cart['product_price'];
        $quantity = $row_cart['quantity'];
        $product_total = $product_price * $quantity;

        $total += $product_total;
    }
}

// Handle form submission
if (isset($_POST['make_payment'])) {
    // Check if there are products in the cart
    if (mysqli_num_rows($result_cart) > 0) {
        $customer_name = $_POST['customer_name'];
        $customer_number = $_POST['customer_number'];
        $customer_address = $_POST['customer_address'];
        $payment_method = $_POST['payment_method']; // Get the selected payment method

        // Prepare the order_items as a string
        mysqli_data_seek($result_cart, 0); // Reset the result pointer to the beginning
        $order_items = [];
        if (mysqli_num_rows($result_cart) > 0) {
            while ($row_cart = mysqli_fetch_assoc($result_cart)) {
                $product_category = $row_cart['product_category'];
                $product_id = $row_cart['product_id'];
                $product_name = $row_cart['product_name'];
                $product_price = $row_cart['product_price'];
                $quantity = $row_cart['quantity'];
                $product_total = $product_price * $quantity;

                $order_items[] = [
                    'name' => $product_name,
                    'price' => $product_price,
                    'quantity' => $quantity
                ];

                // Reduce the stock in the respective table using product ID
                $update_stock_sql = "";

                switch ($product_category) {
                    case 1: // Racquet
                        $update_stock_sql = "UPDATE racquet SET racquet_stock = racquet_stock - $quantity WHERE racquet_id = $product_id";
                        break;
                    case 2: // Shoe
                        $update_stock_sql = "UPDATE shoe SET shoe_stock = shoe_stock - $quantity WHERE shoe_id = $product_id";
                        break;
                    case 3: // Clothes
                        $update_stock_sql = "UPDATE clothes SET clothes_stock = clothes_stock - $quantity WHERE clothes_category = $product_id";
                        break;
                    case 4: // Bag
                        $update_stock_sql = "UPDATE bag SET bag_stock = bag_stock - $quantity WHERE bag_id = $product_id";
                        break;
                    case 5: // String
                        $update_stock_sql = "UPDATE string SET string_stock = string_stock - $quantity WHERE string_id = $product_id";
                        break;
                    case 6: // Shuttlecock
                        $update_stock_sql = "UPDATE shuttlecock SET shuttlecock_stock = shuttlecock_stock - $quantity WHERE shuttlecock_id = $product_id";
                        break;
                }

                if (!empty($update_stock_sql)) {
                    mysqli_query($connect, $update_stock_sql);
                }
            }
        }

        // Convert order_items array to JSON string
        $order_items_json = json_encode($order_items);

        // Insert the order into the database
        $insert_order_sql = "INSERT INTO orders (customer_name, customer_number, customer_address, order_item, order_total_price, order_date, payment_method, user_id) VALUES ('$customer_name', '$customer_number', '$customer_address', '$order_items_json', $total, CURDATE(), '$payment_method', $user_id)";
        mysqli_query($connect, $insert_order_sql);

        // Clear the cart after successful order placement
        $clear_cart_sql = "DELETE FROM cart WHERE user_id = $user_id";
        mysqli_query($connect, $clear_cart_sql);

        // Redirect to the order record page
        ob_start(); // Start output buffering
        header("Location: orders.php");
        ob_end_flush(); // Flush output buffer and redirect
        exit();
    } else {
        $notification = "Failed to make a payment because there are no products in your cart!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Make Payment</title>
    <link rel="stylesheet" href="make_payment.css?<?php echo time(); ?>">
    <style>
        .make-payment-btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .make-payment-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="payment-details">
    <h1>Make Payment</h1>
    <h2>Order Summary</h2>
    <table>
        <thead>
        <tr>
            <th>Product</th>
            <th>Price (RM)</th>
            <th>Quantity</th>
            <th>Total (RM)</th>
        </tr>
        </thead>
        <tbody>
        <?php
        mysqli_data_seek($result_cart, 0); // Reset the result pointer to the beginning
        $total = 0; // Initialize total to 0
        if (mysqli_num_rows($result_cart) > 0) {
            while ($row_cart = mysqli_fetch_assoc($result_cart)) {
                $product_name = $row_cart['product_name'];
                $product_price = $row_cart['product_price'];
                $quantity = $row_cart['quantity'];
                $product_total = $product_price * $quantity;

                echo "<tr>";
                echo "<td>$product_name</td>";
                echo "<td>" . number_format($product_price, 2) . "</td>";
                echo "<td>$quantity</td>";
                echo "<td>" . number_format($product_total, 2) . "</td>";
                echo "</tr>";

                $total += $product_total;
            }
        }
        ?>
        </tbody>
    </table>

    <h3>Total: <?php echo "RM " . number_format($total, 2); ?></h3>
</div>

<div class="payment-form">
    <h2>Shipping Information</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="customer_name">Customer Name:</label>
            <input type="text" name="customer_name" required>
            <br><br>
            <label for="customer_number">Customer Number:</label>
            <input type="text" name="customer_number" required>
            <br><br>
            <label for="customer_address">Customer Address:</label>
            <input type="text" name="customer_address" required>
            <br><br>
            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" required>
                <option value="">Select Payment Method</option>
                <option value="Cash on Delivery">Cash on Delivery</option>
                <option value="Online Banking">Online Banking</option>
                <option value="Credit Card">Credit Card</option>
            </select>
            <br><br>
            <button class="make-payment-btn" type="submit" name="make_payment">Make Payment</button>
        </div>
    </form>
</div>

<?php include("footer.php"); ?>
</body>
</html>
