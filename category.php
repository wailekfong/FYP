<?php
include("dbconnection.php");

// Check if the category ID is provided in the URL
if (isset($_GET['category'])) {
    $category_id = $_GET['category'];
    // Query to retrieve products of the selected category
    $query = "SELECT p.*, c.category_name 
              FROM product p 
              INNER JOIN category c ON p.category_id = c.category_id
              WHERE p.category_id = $category_id";
    $result = $connect->query($query);

    // Fetch the category name for the selected category ID
    $category_name_query = "SELECT category_name FROM category WHERE category_id = $category_id";
    $category_name_result = $connect->query($category_name_query);
    if ($category_name_result->num_rows > 0) {
        $category_name_row = $category_name_result->fetch_assoc();
        $category_name = $category_name_row['category_name'];
    } else {
        $category_name = "Category";
    }
} else {
    // Redirect to products.php if no category is selected
    header("Location: products.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="slide.css">
    <link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="footer.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl嗨⢾姞筗㵁縓狙혲絷䶜黺ࢌ鯇똯==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?php echo $category_name; ?> Products</title>
    <link rel="icon" type="png" href="image/dreams2.png">
</head>
<body>
    <header class="site-header">
            <a href="index.php">
                <img src="image/dreams.png" alt="Icon">
            </a>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about_us.html">About us</a></li>
                    <li><a href="travel_plan.php">Travel Plan</a></li>
                    <li><a href="contact_us.php">Contact us</a></li>
                    <li><a href="user_profile.php">Account</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </header>    

    <div class="container">
        <div class="products">
            <h1><?php echo $category_name; ?> Products</h1>

            <?php if ($result->num_rows > 0): ?>
                <div class="product-grid">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="product-item <?php echo $row['product_discount'] > 0 ? 'has-discount' : ''; ?>">
                            <?php if (!empty($row['product_image'])): ?>
                                <div class="product-image">
                                    <img src="<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>">
                                </div>
                            <?php endif; ?>
                            <div class="product-details">
                                <h2><?php echo $row['product_name']; ?></h2>
                                <?php if ($row['product_discount'] > 0): ?>
                                    <p><strong>Price:</strong> <span class="original-price"><?php echo $row['product_price']; ?></span> <span class="discounted-price"><?php echo $row['product_discount']; ?></span></p>
                                <?php else: ?>
                                    <p><strong>Price:</strong> <span class="original-price"><?php echo $row['product_price']; ?></span></p>
                                <?php endif; ?>
                                <p><strong>Availability:</strong> <?php echo ($row['product_stock'] > 0) ? 'In stock' : 'Out of stock'; ?></p>
                                <?php if (count(explode(',', $row['product_size'])) > 1): ?> <!-- Check if there's more than one size available -->
                                    <label for="size">Size:</label>
                                    <select id="size" name="size">
                                        <?php $sizes = explode(',', $row['product_size']); ?>
                                        <?php foreach ($sizes as $size): ?>
                                            <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php else: ?>
                                    <p><strong>Size:</strong> <?php echo $row['product_size']; ?></p>
                                <?php endif; ?>
                                <p><strong>Details:</strong> <?php echo $row['product_details']; ?></p>
                                <label for="quantity">Quantity:</label>
                                <input type="number" id="quantity" name="quantity" value="1" min="1" max="<?php echo $row['product_stock']; ?>">
                                <button class="add-to-cart-btn">Add to Cart</button> <!-- Add to Cart button -->
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p>No products found in this category</p>
            <?php endif; ?>
        </div>
    </div>

    <?php @include 'footer.php'; ?>
</body>
</html>

<?php
$connect->close();
?>
