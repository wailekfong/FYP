<?php 
include("dbconnection.php"); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
  $name = $_POST['superadmin_name'];
  $password = $_POST['superadmin_password'];
  
  $query = "SELECT * FROM superadmin WHERE superadmin_name = ? AND superadmin_password = ?";
  $stmt = $connect->prepare($query);
  $stmt->bind_param("ss", $name, $password);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows == 1) 
  {
    // Redirect to the admin dashboard
    header('Location: superadmin(mainpage).php');
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
    <title>SuperAdmin Login</title>
    <link rel="stylesheet" href="admin_login.css?v=<?php echo time(); ?>">
</head>
<body>  
    <div class="login">
        <h1>LOGIN</h1>
        <form action="" method="post">
        <label for="username">SuperAdmin Name</label>
        <input type="text" name="superadmin_name" id="superadmin_name" placeholder="Name" required><br>
        <label for="password">Password</label>
        <input type="password" name="superadmin_password" id="superadmin_password" placeholder="Password" required><br>
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
