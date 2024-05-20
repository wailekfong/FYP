<?php include ("dbconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Stocking</title>
    
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        if(isset($_GET["edit"])){
            $stockingid = $_GET["stockingid"];
            $result = mysqli_query($connect, "SELECT * FROM stocking WHERE stocking_id = $stockingid");
            $row = mysqli_fetch_assoc($result);
    ?>
    <div class="body">
        <form name="editfrm" method="post" action="" enctype="multipart/form-data">
            <h2>Edit Basketball Stocking</h2>
            <label>Stocking Name</label>
                <input type="text" name="name" placeholder="Stocking Name" value="<?php echo $row['stocking_name']; ?>">
            <label>Stocking Price</label>
                <input type="number" name="price" placeholder="Stocking Price" min="1" step=".01" value="<?php echo $row['stocking_price']; ?>">
            <label>Stocking Stock</label>
                <input type="number" name="stock" placeholder="Stocking Stock" min="1" value="<?php echo $row['stocking_stock']; ?>">
            <label>Stocking Size</label>
                <input type="text" name="size" placeholder="Stocking Size" min="1" value="<?php echo $row['stocking_size']; ?>">
            <label>Stocking Image</label>
                <input type="file" name="image" accept="image/*">
            <label>Stocking Details</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Stocking Details"><?php echo $row['stocking_details']; ?></textarea>
            
            <br><button type="submit" name="savebtn">Update Product</button>
            <button type="submit" name="archivebtn">Archive Product</button>
            <a href="admin(stocking).php" class="back">Back</a>
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
            $nimage = $row['stocking_image'];
        }
        mysqli_query($connect, "UPDATE stocking SET stocking_name='$nname', stocking_price='$nprice', stocking_stock='$nstock', stocking_size='$nsize', stocking_image='$nimage', stocking_details='$ndetail' WHERE stocking_id=$stockingid");
?>
<script type="text/javascript">
    alert("Product Update");
</script>
<?php
    header("refresh:0.1; url=admin(shoes).php");
    }
    if(isset($_POST["archivebtn"])){
        $nname = $row['stocking_name'];
        $nprice = $row['stocking_price'];
        $nstock = $row['stocking_stock'];
        $nimage = $row['stocking_image'];
        $ndetail = $row['stocking_details'];

        mysqli_query($connect, "INSERT INTO archive_product (product_name, product_price, product_stock, product_image, product_details) VALUES ('$nname', '$nprice', '$nstock', '$nimage', '$ndetail')");

        mysqli_query($connect, "DELETE FROM stocking WHERE stocking_id=$stockingid");

        ?>
        <script type="text/javascript">
            alert("Product Archived");
        </script>
        <?php
        header("refresh:0.1; url=admin(stocking).php");
    }
?>