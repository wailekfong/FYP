<?php include ("dbconnection.php"); ?>
<html>
<head>
    <title>Basketball</title>
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
                <form method="GET" action="admin(basketball).php">
                    <div class="search-form">
                        <input type="text" name="search" placeholder="Search by basketball" class="search-input">
                        <button type="submit" class="search-button">Search</button>
                    </div>
                </form>
                <button class="add-button" onclick="document.location='admin(add).php'">Add Basketball</button>
                
            </div>
            <table>
                <tr>
                    <th>Basketball ID</th>
                    <th>Basketball Name</th>
                    <th>Basketball Price</th>
                    <th>Basketball Stock</th>
                    <th>Basketball Size</th>
                    <th>Basketball Image</th>
                    <th>Basketball Details</th>
                    <th>Action</th>
                </tr>
                <?php
                    mysqli_select_db($connect, "fyp");
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $query = "SELECT * FROM basketball WHERE basketball_name LIKE '%$search%'";
                    $result = mysqli_query($connect, $query);
                    $count = mysqli_num_rows($result);
                    
                    if ($count == 0) {
                        echo "<tr><td colspan='8'>No results found.</td></tr>";
                    } 
                    else{
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["basketball_id"]; ?></td>
                    <td><?php echo $row["basketball_name"]; ?></td>
                    <td><?php echo $row["basketball_price"]; ?></td>
                    <td><?php echo $row["basketball_stock"]; ?></td>
                    <td><?php echo $row["basketball_size"]; ?></td>
                    <td><?php echo $row["basketball_image"]; ?></td>
                    <td><?php echo $row["basketball_details"]; ?></td>
                    <td><a href="admin(basketball_edit).php?edit&basketballid=<?php echo $row['basketball_id']; ?>">More</a></td>
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