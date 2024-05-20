<?php include ("dbconnection.php"); ?>
<html>
<head>
    <title>Jersey</title>
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
                <form method="GET" action="admin(jersey).php">
                    <div class="search-form">
                        <input type="text" name="search" placeholder="Search by jersey" class="search-input">
                        <button type="submit" class="search-button">Search</button>
                    </div>
                </form>
                <button class="add-button" onclick="document.location='admin(jersey_add).php'">Add Jersey</button>
            </div>
            <table>
                <tr>
                    <th>Jersey ID</th>
                    <th>Jersey Name</th>
                    <th>Jersey Price</th>
                    <th>Jersey Stock</th>
                    <th>Jersey Size</th>
                    <th>Jersey Image</th>
                    <th>Jersey Details</th>
                    <th>Action</th>
                </tr>
                <?php
                    mysqli_select_db($connect, "fyp");
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $query = "SELECT * FROM jersey WHERE jersey_name LIKE '%$search%'";
                    $result = mysqli_query($connect, $query);
                    $count = mysqli_num_rows($result);
                    
                    if ($count == 0) {
                        echo "<tr><td colspan='8'>No results found.</td></tr>";
                    } 
                    else{
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["jersey_id"]; ?></td>
                    <td><?php echo $row["jersey_name"]; ?></td>
                    <td><?php echo $row["jersey_price"]; ?></td>
                    <td><?php echo $row["jersey_stock"]; ?></td>
                    <td><?php echo $row["jersey_size"]; ?></td>
                    <td><?php echo $row["jersey_image"]; ?></td>
                    <td><?php echo $row["jersey_details"]; ?></td>
                    <td><a href="admin(jersey_edit).php?edit&jerseyid=<?php echo $row['jersey_id']; ?>">More</a></td>
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