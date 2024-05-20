<?php include "dbconnection.php"; ?>
<html>
<head>
    <title>Archive Staff</title>
    <link rel="stylesheet" href="admin_product.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include "admin_header.php"; ?>
    <div class="left"> 
        <div class="contentL">
            <h2>Category List</h2>
            <table>
                <tr>
                    <td><a href="admin(archiveStaff).php">ARCHIVED STAFF</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="right"> 
        <div class="contentR">
            <h2>Staff List</h2>
            <hr><br>
            <div class="actions">
                <form method="GET" action="admin(archiveStaff).php">
                    <div class="search-form">
                        <input type="text" name="search" placeholder="Search by Staff" class="search-input">
                        <button type="submit" class="search-button">Search</button>
                    </div>
                </form>
                <button class="add-button" onclick="document.location='superadmin(mainpage).php'">Back to Home</button>
            </div>
            <table>
                <tr>
                    <th>Staff ID</th>
                    <th>Staff Name</th>
                    <th>Staff Email</th>
                    <th>Staff Phone Number</th>
                    <th>Staff Gender</th>
                    <th>Staff Position</th>
                </tr>
                <?php
                    mysqli_select_db($connect, "fyp");
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $query = "SELECT * FROM archive_staff WHERE staff_name LIKE '%$search%'";
                    $result = mysqli_query($connect, $query);
                    $count = mysqli_num_rows($result);
                    
                    if ($count == 0) {
                        echo "<tr><td colspan='8'>No results found.</td></tr>";
                    } 
                    else{
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["staff_id"]; ?></td>
                    <td><?php echo $row["staff_name"]; ?></td>
                    <td><?php echo $row["staff_email"]; ?></td>
                    <td><?php echo $row["staff_phone_number"]; ?></td>
                    <td><?php echo $row["staff_gender"]; ?></td>
                    <td><?php echo $row["staff_position"]; ?></td>
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