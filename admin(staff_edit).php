<?php include ("dbconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Staff</title>
    
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        if(isset($_GET["edit"])){
            $staffid = $_GET["staffid"];
            $result = mysqli_query($connect, "SELECT * FROM staff WHERE staff_id = $staffid");
            $row = mysqli_fetch_assoc($result);
    ?>
    <div class="body">
        <form name="editfrm" method="post" action="" enctype="multipart/form-data">
            <h2>Edit Staff</h2>
            <label>Staff Name</label>
                <input type="text" name="name" placeholder="Staff Name" value="<?php echo $row['staff_name']; ?>">
            <label>Staff Email</label>
                <input type="email" name="price" placeholder="Staff Email" min="1" step=".01" value="<?php echo $row['staff_email']; ?>">
            <label>Staff Phone Number</label>	
                <input type="tel" name="stock" placeholder="Staff Phone Number" min="1" value="<?php echo $row['staff_phone_number']; ?>">
            <label>Staff Gender</label>
                <input type="text" name="size" placeholder="Staff Gender" min="1" value="<?php echo $row['staff_gender']; ?>">
            <label>Staff Position</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Staff Position"><?php echo $row['staff_position']; ?></textarea>
            
            <br><button type="submit" name="savebtn">Update Staff</button>
            <button type="submit" name="archivebtn">Archive Staff</button>
            <a href="admin(staff).php" class="back">Back</a>
        </form>
        <?php
            }
        ?>
    </div>
</body>
</html>
<?php
    if(isset($_POST["savebtn"])){
        $nname = $_POST["name"];
        $nprice = $_POST["price"];
        $nstock = $_POST["stock"];
        $nsize = $_POST["size"];
        $ndetail = $_POST["detail"];
        mysqli_query($connect, "UPDATE staff SET staff_name='$nname', staff_email='$nprice', staff_phone_number='$nstock', staff_gender='$nsize', staff_position='$ndetail' WHERE staff_id=$staffid");
?>
<script type="text/javascript">
    alert("Staff Update");
</script>
<?php
    header("refresh:0.1; url=admin(staff).php");
    }
    if(isset($_POST["archivebtn"])){
        $nname = $row['staff_name'];
        $nprice = $row['staff_email'];
        $nstock = $row['staff_phone_number'];
        $nimage = $row['staff_gender'];
        $ndetail = $row['staff_position'];

        mysqli_query($connect, "INSERT INTO archive_staff (staff_name, staff_email, staff_phone_number, staff_gender, staff_position) VALUES ('$nname', '$nprice', '$nstock', '$nimage', '$ndetail')");

        mysqli_query($connect, "DELETE FROM staff WHERE staff_id=$staffid");

        ?>
        <script type="text/javascript">
            alert("Staff Archived");
        </script>
        <?php
        header("refresh:0.1; url=admin(staff).php");
    }
?>