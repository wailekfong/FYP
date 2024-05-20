<?php

$connect = mysqli_connect("localhost","root","","fyp");
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['username'], $_POST['contact'], $_POST['email'], $_POST['password'])) {
	exit('Please complete the registration form!');
}

if (empty($_POST['username']) || empty($_POST['contact']) || empty($_POST['email']) || empty($_POST['password']) ) {
	exit('Please complete the registration form');
}

if ($stmt = $connect->prepare('SELECT register_id, register_contact, register_password FROM register WHERE register_username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows > 0) 
	{
		echo 'Username exists, please choose another!';
	} else {
		if ($stmt = $connect->prepare('INSERT INTO register (register_username, register_contact, register_email, register_password) VALUES (?, ?, ?, ?)')) {
            
            $stmt->bind_param('ssss', $_POST['username'], $_POST['contact'], $_POST['email'], $_POST['password']);
            $stmt->execute();
            header("refresh:0.5; url=login.html");
        } else {
            echo 'Could not prepare statement!';
        }
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement!';
}
$connect->close();
?>