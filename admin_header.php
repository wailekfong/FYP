<?php include("dbconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_header.css">
    <title>Header</title>
</head>
<body>
    <header class="site-header">
        <a href="admin_mainpage.php">
            <img src="image/dreams.png" alt="">
        </a>
        <nav>
            <ul>
                <li><a href="admin_mainpage.php">Home</a></li>
                <li><a href="superadmin_login.php">SuperAdmin</a></li>
                <li><a href="admin(basketball).php">Product</a></li>
                <li><a href="transaction_history(admin).php">Orders</a></li>
                <li><a href="admin(user).php">User</a></li>
                <li><a href="">Account</a></li>
                <li><a href="admin(logout).php">Log Out</a></li>    
            </ul>
        </nav>
    </header>
</body>
</html>