<?php 
include("dbconnection.php");
session_start();

// Check if user is logged in
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is submitted to update quantity
    if (isset($_POST['update_quantity'])) {
        $cart_id = $_POST['cart_id'];
        $new_quantity = $_POST['quantity'];

        // Get the product ID and current quantity from the cart
        $cart_result = mysqli_query($connect, "SELECT product_id, quantity FROM cart WHERE id = '$cart_id'");
        $cart_row = mysqli_fetch_assoc($cart_result);
        $product_id = $cart_row['product_id'];

        // Get the available stock for the product
        $stock_result = mysqli_query($connect, "SELECT product_stock FROM product WHERE product_id = '$product_id'");
        $stock_row = mysqli_fetch_assoc($stock_result);
        $available_stock = $stock_row['product_stock'];

        if ($new_quantity <= $available_stock) {
            // Update quantity in the cart table
            $update_query = mysqli_query($connect, "UPDATE cart SET quantity = '$new_quantity' WHERE id = '$cart_id'");
            if ($update_query) {
                // Recalculate total price
                $row = mysqli_fetch_assoc(mysqli_query($connect, "SELECT product_price FROM cart WHERE id = '$cart_id'"));
                $total_price = $row["product_price"] * $new_quantity;

                // Update total price in the cart table
                mysqli_query($connect, "UPDATE cart SET total_price = '$total_price' WHERE id = '$cart_id'");
            } else {
                // Handle error if failed to update quantity
                echo "Error updating quantity.";
            }
        } else {
            echo '<script>alert("Error: Requested quantity exceeds available stock.");window.location = "cart.php";</script>';
        }
    }
    // Check if form is submitted to update size
    if (isset($_POST['update_size'])) {
        $cart_id = $_POST['cart_id'];
        $new_size = $_POST['selected_size']; // Change to 'selected_size' to match form field name

        // Update size in the cart table
        $update_query = mysqli_query($connect, "UPDATE cart SET product_size = '$new_size' WHERE id = '$cart_id'");
        if (!$update_query) {
            // Handle error if failed to update size
            echo "Error updating size.";
        }
    }
}

if (isset($_REQUEST["del"])) 
{
    $id = $_REQUEST["id"]; 
    mysqli_query($connect, "DELETE FROM cart WHERE id = $id");
    
    header("Location: cart.php");
}

// Fetch and store product details from the cart
$product_details = array();
$result = mysqli_query($connect, "SELECT * FROM cart");
while ($row = mysqli_fetch_assoc($result)) {
    $product_details[] = array(
        "product_name" => $row["product_name"],
        "product_size" => $row["product_size"], 
        "quantity" => $row["quantity"],
        "total_price" => $row["total_price"]
    );
}

// Store product details in session
$_SESSION['product_details'] = $product_details;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl嗨⢾姞筗㵁縓狙혲絷䶜黺ࢌ鯇똯==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="image/dreams2.png">
</head>
<body>
    <div class="container">
        <h1>Cart</h1>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Size</th> <!-- New column for product size -->
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($connect, "SELECT * FROM cart");
                while($row = mysqli_fetch_assoc($result)) {
                ?>          
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["product_name"]; ?></td>
                        <td><?php echo $row["product_size"]; ?></td> 
                        <td>$<?php echo $row["product_price"]; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="cart_id" value="<?php echo $row["id"]; ?>">
                                <input type="number" name="quantity" value="<?php echo $row["quantity"]; ?>" min="1">
                                <button type="submit" name="update_quantity">Update</button>
                            </form>
                        </td>
                        <td>$<?php echo $row["total_price"]; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="del" onclick="return confirmation();">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }       
                ?>
            </tbody>
        </table>
        <ul class="nav-links">
            <li><a href="product.php">Product Page</a></li>
            <li><a href="make_payment.php">Make Payment</a></li>
            <li><a href="index.php">Back To Home</a></li>
        </ul>
    </div>
    <?php @include 'footer.php'; ?>

    <script type="text/javascript">
        function confirmation() {
            answer = confirm("Do you want to delete this product?");
            return answer;
        }
    </script>
</body>
</html>
