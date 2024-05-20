<?php include "dbconnection.php"; ?>
<html>
<head>
    <title>User</title>
    <link rel="stylesheet" href="admin_product.css?v=<?php echo time(); ?>">

    <style>
        /* admin_product.css */

/* Table styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

/* Style the table header */
th:first-child, td:first-child {
    border-left: none;
}

th:last-child, td:last-child {
    border-right: none;
}

/* Style alternate rows */
tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Hover effect on rows */
tr:hover {
    background-color: #e9e9e9;
}

/* Back to Home button style */
.back-to-home {
    margin-top: 20px;
    text-align: center;
}

.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #0056b3;
}
</style>
</head>
<body>
    <?php include "admin_header.php"; ?>

    <div class="right"> 
        <div class="content">
            <h2>User List</h2>
            <hr><br>
            <br><br><br>
            <table>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Contact</th>
                    <th>Email</th>
                </tr>
                <?php
                    mysqli_select_db($connect, "fyp");
                    $result = mysqli_query($connect, "SELECT * FROM register");	
                    $count = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["register_id"]; ?></td>
                    <td><?php echo $row["register_username"]; ?></td>
                    <td><?php echo $row["register_contact"]; ?></td>
                    <td><?php echo $row["register_email"]; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
        <div class="back-to-home">
            <a href="admin_mainpage.php" class="button"><i class="fas fa-home"></i> Back to Home</a>
        </div>
    </div>
    
</body>
</html>
