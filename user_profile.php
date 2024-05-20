<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
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
$stmt = $con->prepare('SELECT register_password, register_email, register_contact FROM register WHERE register_id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $contact);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="user_profile.css">
	<link rel="stylesheet" href="account_button.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl嗨⢾姞筗㵁縓狙혲絷䶜黺ࢌ鯇똯==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Profile Page</title>
    <link rel="icon" type="png" href="image/dreams2.png">
</head>
<body class="loggedin">    
	
	<div class="content">
			<h1>User Profile</h1><hr>
			<div class="detail">
				<h3>Account Details</h3>
				<table>
					<tr>
						<td>Username : </td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Contact  : </td>
						<td><?=$contact?></td>
					</tr>
					<tr>
						<td>Email    : </td>
						<td><?=$email?></td>
					</tr>
                    <tr>
						<td>Password : </td>
						<td><?=$password?></td>
					</tr>
				</table>
                <form action="password_change.php" method="post">
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" required>
                    <input type="submit" value="Change Password">
                </form>
				<a href="index.php" class="independent-btn">Go Back to Homepage</a>
			</div>
	</div>

    <?php @include 'footer.php'; ?>

</body>
</html>