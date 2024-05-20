<?php 
include("dbconnection.php"); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
  $name = $_POST['admin_name'];
  $password = $_POST['admin_password'];
  
  $query = "SELECT * FROM admin WHERE admin_name = ? AND admin_password = ?";
  $stmt = $connect->prepare($query);
  $stmt->bind_param("ss", $name, $password);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows == 1) 
  {
    // Redirect to the admin dashboard
    header('Location: admin_mainpage.php');
    exit;
  } else {
    $error = 'Invalid username or password.';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin_login.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="login">
        <h1>LOGIN</h1>
        <form action="" method="post">
        <label for="username">Admin Name</label>
        <input type="text" name="admin_name" id="admin_name" placeholder="Name" required><br>
        <label for="password">Password</label>
        <input type="password" name="admin_password" id="admin_password" placeholder="Password" required><br>
        <input type="submit" name="submit" id="submit" value="Login">

        <?php
        if (isset($error) && !empty($error))
        {
            echo '<div class="alert">' . $error . '</div>';
        }
        ?>
    </form>
    </div>
    
</body>
</html>
