<?php
include("dbconnection.php");
session_start();
?>

<html>
<head>
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl嗨⢾姞筗㵁縓狙혲絷䶜黺ࢌ鯇똯==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>List of Products</title>
    <link rel="icon" type="png" href="image/dreams2.png">
</head>
<body>

    <h1>List of Products</h1>

    <table border="1" width="650px">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Stock</th>
            <th>Product Size</th>
            <th>Product Image</th>
            <th>Product Details</th>    
            <th>Action</th>
        </tr>

        <?php
        // Fetch and display products from database
        $result = mysqli_query($connect, "SELECT * FROM product");  
        while($row = mysqli_fetch_assoc($result)) {
        ?>          
            <tr>
                <td><?php echo $row["product_id"]; ?></td>
                <td><?php echo $row["product_name"]; ?></td>
                <td><?php echo $row["product_price"]; ?></td>
                <td><?php echo ($row["product_stock"] > 0) ? "In Stock" : "Out of Stock"; ?></td>
                <td><?php echo $row["product_size"]; ?></td>
                <td><img src="<?php echo $row["product_image"]; ?>" alt="Product Image" style="width: 100px;"></td>
                <td><?php echo $row["product_details"]; ?></td>
                <td><a href="purchase.php?buy&productid=<?php echo $row['product_id']; ?>">Buy Now</a></td>
            </tr>
        <?php
        }       
        ?>
    </table>
    <div>
        <ul class="nav-links">
            <li class="btn"><a href="cart.php">Cart</a></li>
            <li class="btn"><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    
    <?php @include 'footer.php'; ?>
    
</body>
</html>
