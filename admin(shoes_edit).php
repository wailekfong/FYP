<?php include ("dbconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Shoes</title>
    
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        if(isset($_GET["edit"])){
            $shoesid = $_GET["shoesid"];
            $result = mysqli_query($connect, "SELECT * FROM shoes WHERE shoes_id = $shoesid");
            $row = mysqli_fetch_assoc($result);
    ?>
    <div class="body">
        <form name="editfrm" method="post" action="" enctype="multipart/form-data">
            <h2>Edit Basketball Shoes</h2>
            <label>Shoes Name</label>
                <input type="text" name="name" placeholder="Shoes Name" value="<?php echo $row['shoes_name']; ?>">
            <label>Shoes Price</label>
                <input type="number" name="price" placeholder="Shoes Price" min="1" step=".01" value="<?php echo $row['shoes_price']; ?>">
            <label>Shoes Stock</label>
                <input type="number" name="stock" placeholder="Shoes Stock" min="1" value="<?php echo $row['shoes_stock']; ?>">
            <label>Shoes Size</label>
                <input type="text" name="size" placeholder="Shoes Size" min="1" value="<?php echo $row['shoes_size']; ?>">
            <label>Shoes Image</label>
                <input type="file" name="image" accept="image/*">
            <label>Shoes Details</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Shoes Details"><?php echo $row['shoes_details']; ?></textarea>
            
            <br><button type="submit" name="savebtn">Update Product</button>
            <button type="submit" name="archivebtn">Archive Product</button>
            <a href="admin(shoes).php" class="back">Back</a>
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
            $nimage = $row['shoes_image'];
        }
        mysqli_query($connect, "UPDATE shoes SET shoes_name='$nname', shoes_price='$nprice', shoes_stock='$nstock', shoes_size='$nsize', shoes_image='$nimage', shoes_details='$ndetail' WHERE shoes_id=$shoesid");
?>
<script type="text/javascript">
    alert("Product Update");
</script>
<?php
    header("refresh:0.1; url=admin(shoes).php");
    }
    if(isset($_POST["archivebtn"])){
        $nname = $row['shoes_name'];
        $nprice = $row['shoes_price'];
        $nstock = $row['shoes_stock'];
        $nimage = $row['shoes_image'];
        $ndetail = $row['shoes_details'];

        mysqli_query($connect, "INSERT INTO archive_product (product_name, product_price, product_stock, product_image, product_details) VALUES ('$nname', '$nprice', '$nstock', '$nimage', '$ndetail')");

        mysqli_query($connect, "DELETE FROM shoes WHERE shoes_id=$shoesid");

        ?>
        <script type="text/javascript">
            alert("Product Archived");
        </script>
        <?php
        header("refresh:0.1; url=admin(shoes).php");
    }
?>