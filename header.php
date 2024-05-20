<?php
// Start session
session_start();

// Check if user is logged in
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <title>Document</title>
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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Account</a>
                    <ul class="dropdown-menu">
                        <li><a href="user_profile.php">Profile</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </li>
                <!-- Display username -->
                <li>Welcome, <?php echo $username; ?></li>
            </ul>
        </nav>
    </header>
</body>
</html>
