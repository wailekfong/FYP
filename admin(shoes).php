<?php include ("dbconnection.php"); ?>
<html>
<head>
    <title>Basketball Shoes</title>
    <link rel="stylesheet" href="admin_product.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include ("admin_header.php"); ?>
    <div class="left"> 
        <div class="contentL">
            <h2>Category List</h2>
            <table>
                <tr>
                    <td><a href="admin(basketball).php">Basketball</a></td>
                </tr>
                <tr>
                    <td><a href="admin(jersey).php">Jersey</a></td>
                </tr>
                <tr>
                    <td><a href="admin(shoes).php">Basketball Shoe</a></td>
                </tr>
                <tr>
                    <td><a href="admin(stocking).php">Stocking</a></td>
                </tr>
                <tr>
                    <td><a href="admin(archive).php">ARCHIVED PRODUCT</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="right"> 
        <div class="contentR">
            <h2>Basketball Accessories List</h2>
            <hr><br>
            <div class="actions">
                <form method="GET" action="admin(shoes).php">
                    <div class="search-form">
                        <input type="text" name="search" placeholder="Search by shoes" class="search-input">
                        <button type="submit" class="search-button">Search</button>
                    </div>
                </form>
                <button class="add-button" onclick="document.location='admin(shoes_add).php'">Add Basketball Shoes</button>
            </div>
            <table>
                <tr>
                    <th>Shoes ID</th>
                    <th>Shoes Name</th>
                    <th>Shoes Price</th>
                    <th>Shoes Stock</th>
                    <th>Shoes Size</th>
                    <th>Shoes Image</th>
                    <th>Shoes Details</th>
                    <th>Action</th>
                </tr>
                <?php
                    mysqli_select_db($connect, "fyp");
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $query = "SELECT * FROM shoes WHERE shoes_name LIKE '%$search%'";
                    $result = mysqli_query($connect, $query);
                    $count = mysqli_num_rows($result);
                    
                    if ($count == 0) {
                        echo "<tr><td colspan='8'>No results found.</td></tr>";
                    } 
                    else{
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["shoes_id"]; ?></td>
                    <td><?php echo $row["shoes_name"]; ?></td>
                    <td><?php echo $row["shoes_price"]; ?></td>
                    <td><?php echo $row["shoes_stock"]; ?></td>
                    <td><?php echo $row["shoes_size"]; ?></td>
                    <td><?php echo $row["shoes_image"]; ?></td>
                    <td><?php echo $row["shoes_details"]; ?></td>
                    <td><a href="admin(shoes_edit).php?edit&shoesid=<?php echo $row['shoes_id']; ?>">More</a></td>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>