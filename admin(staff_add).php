<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Staff</title>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">

    
</head>
<body>
    
    <div class="body">
        <h1>Add Staff</h1>
        <form name="addfrm" method="post" action="" enctype="multipart/form-data">
            <label>Staff Name</label>
                <input type="text" name="sta_name" size="80" required>
            <label>Staff Email</label>
                <input type="email" name="sta_email" size="10" required>
            <label>Staff Phone Number</label>
                <input type="tel" name="sta_contact" size="10" pattern="[0-9]{3}-[0-9]{7,8}" required>
            <label for="staff_gender">Staff Gender</label>
                <select name="sta_gender" id="staff_gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            <br><br>
            <label>Staff Position</label>
                <textarea name="sta_position" cols="60" rows="4" required></textarea>

            <label><input type="submit" name="savebtn" value="ADD STAFF"></p>
            <a href="admin(staff).php" class="back">Back</a>
        </form>
    </div>

</body>
</html>

<?php
include("dbconnection.php");
if(isset($_POST["savebtn"]))
{
    $pname = $_POST["sta_name"];
    $pprice = $_POST["sta_email"];
    $pstock = $_POST["sta_contact"];
    $psize = $_POST["sta_gender"];
    $pdet = $_POST["sta_position"];

    mysqli_query($connect, "INSERT INTO staff (staff_name, staff_email, staff_phone_number, staff_gender, staff_position) VALUES ('$pname', '$pprice', '$pstock', '$psize', '$pdet')");
    
    ?>

        <script type="text/javascript">
            alert("<?php echo $pname. ' saved' ?>");
        </script>

    <?php

}
?>
