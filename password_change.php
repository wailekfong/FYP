<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: FYP_login.html');
    exit;
}

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fyp';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize the new password
    $new_password = ($_POST['new_password']);

    // Update the password in the database
    $stmt = $con->prepare('UPDATE register SET register_password = ? WHERE register_id = ?');
    $stmt->bind_param('si', $new_password, $_SESSION['id']);
    $stmt->execute();
    $stmt->close();

    // Redirect to the profile page after changing the password
    header('Location: user_profile.php');
    exit;
} else {
    // Redirect to the profile page if accessed without a POST request
    header('Location: user_profile.php');
    exit;
}
?>
