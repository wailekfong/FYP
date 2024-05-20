<?php include ("dbconnection.php"); ?>
<html>
<head>
    <title>Staff</title>
    <link rel="stylesheet" href="admin_product.css?v=<?php echo time(); ?>">
    <style>
        .back-to-home 
        {
            text-align: center;
            margin-top: 20px; /* Adjust the margin as needed */
        }

        .button 
        {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff; /* Button color */
            color: #fff; /* Text color */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button:hover 
        {
            background-color: #0056b3; /* Button color on hover */
        }

        .button i 
        {
            margin-right: 5px; /* Adjust the icon spacing if necessary */
        }
    </style>
</head>
<body>
    <?php include ("superadmin(header).php"); ?>
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
            <hr><br>
            <div class="actions">
                <form method="GET" action="admin(staff).php">
                    <div class="search-form">
                        <input type="text" name="search" placeholder="Search by staff" class="search-input">
                        <button type="submit" class="search-button">Search</button>
                    </div>
                </form>
                <button class="add-button" onclick="document.location='admin(staff_add).php'">Add Staff</button>
            </div>
            <table>
                <tr>
                    <th>Staff ID</th>
                    <th>Staff Name</th>
                    <th>Staff Email</th>
                    <th>Staff Phone Number</th>
                    <th>Staff Gender</th>
                    <th>Staff Position</th>
                    <th>Action</th>
                </tr>
                <?php
                    mysqli_select_db($connect, "fyp");
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $query = "SELECT * FROM staff WHERE staff_name LIKE '%$search%'";
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
                    <td><a href="admin(staff_edit).php?edit&staffid=<?php echo $row['staff_id']; ?>">More</a></td>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
        <div class="back-to-home">
            <a href="superadmin(mainpage).php" class="button"><i class="fas fa-home"></i> Back to Home</a>
        </div>
    </div>
    
</body>
</html>