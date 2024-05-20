<?php include ("dbconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Basketball</title>
    
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        if(isset($_GET["edit"])){
            $jerseyid = $_GET["jerseyid"];
            $result = mysqli_query($connect, "SELECT * FROM jersey WHERE jersey_id = $jerseyid");
            $row = mysqli_fetch_assoc($result);
    ?>
    <div class="body">
        <form name="editfrm" method="post" action="" enctype="multipart/form-data">
            <h2>Edit Jersey</h2>
            <label>Jersey Name</label>
                <input type="text" name="name" placeholder="Jersey Name" value="<?php echo $row['jersey_name']; ?>">
            <label>Jersey Price</label>
                <input type="number" name="price" placeholder="Jersey Price" min="1" step=".01" value="<?php echo $row['jersey_price']; ?>">
            <label>Jersey Stock</label>
                <input type="number" name="stock" placeholder="Jersey Stock" min="1" value="<?php echo $row['jersey_stock']; ?>">
            <label>Jersey Size</label>
                <input type="text" name="size" placeholder="Jersey Size" min="1" value="<?php echo $row['jersey_size']; ?>">
            <label>Jersey Image</label>
                <input type="file" name="image" accept="image/*">
            <label>Jersey Details</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Jersey Details"><?php echo $row['jersey_details']; ?></textarea>
            
            <br><button type="submit" name="savebtn">Update Jersey</button>
            <button type="submit" name="archivebtn">Archive Jersey</button>
            <a href="admin(jersey).php" class="back">Back</a>
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
        // Check if a new image file was uploaded
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['image'];
            $imagePath = 'image/' . $file['name'];
            move_uploaded_file($file['tmp_name'], $imagePath);
            $nimage = $imagePath;
        } else {
            // No new image uploaded, retain the existing image path
            $nimage = $row['jersey_image'];
        }
        mysqli_query($connect, "UPDATE jersey SET jersey_name='$nname', jersey_price='$nprice', jersey_stock='$nstock', jersey_size='$nsize', jersey_image='$nimage', jersey_details='$ndetail' WHERE jersey_id=$jerseyid");
?>
<script type="text/javascript">
    alert("Jersey Update");
</script>
<?php
    header("refresh:0.1; url=admin(jersey).php");
    }
    if(isset($_POST["archivebtn"])){
        $nname = $row['jersey_name'];
        $nprice = $row['jersey_price'];
        $nstock = $row['jersey_stock'];
        $nimage = $row['jersey_image'];
        $ndetail = $row['jersey_details'];

        mysqli_query($connect, "INSERT INTO archive_product (product_name, product_price, product_stock, product_image, product_details) VALUES ('$nname', '$nprice', '$nstock', '$nimage', '$ndetail')");

        mysqli_query($connect, "DELETE FROM jersey WHERE jersey_id=$jerseyid");

        ?>
        <script type="text/javascript">
            alert("Product Archived");
        </script>
        <?php
        header("refresh:0.1; url=admin(jersey).php");
    }
?>