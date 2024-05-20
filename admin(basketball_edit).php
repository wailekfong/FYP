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
            $basketballid = $_GET["basketballid"];
            $result = mysqli_query($connect, "SELECT * FROM basketball WHERE basketball_id = $basketballid");
            $row = mysqli_fetch_assoc($result);
    ?>
    <div class="body">
        <form name="editfrm" method="post" action="" enctype="multipart/form-data">
            <h2>Edit Basketball</h2>
            <label>Product Name</label>
                <input type="text" name="name" placeholder="Basketball Name" value="<?php echo $row['basketball_name']; ?>">
            <label>Product Price</label>
                <input type="number" name="price" placeholder="Basketball Price" min="1" step=".01" value="<?php echo $row['basketball_price']; ?>">
            <label>Product Stock</label>
                <input type="number" name="stock" placeholder="Basketball Stock" min="1" value="<?php echo $row['basketball_stock']; ?>">
            <label>Product Size</label>
                <input type="text" name="size" placeholder="Basketball Size" min="1" value="<?php echo $row['basketball_size']; ?>">
            <label>Product Image</label>
                <input type="file" name="image" accept="image/*">
            <label>Product Details</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Basketball Details"><?php echo $row['basketball_details']; ?></textarea>
            
            <br><button type="submit" name="savebtn">Update Product</button>
            <button type="submit" name="archivebtn">Archive Product</button>
            <a href="admin(basketball).php" class="back">Back</a>
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
            $nimage = $row['Basketball_image'];
        }
        mysqli_query($connect, "UPDATE basketball SET basketball_name='$nname', basketball_price='$nprice', basketball_stock='$nstock', basketball_size='$nsize', basketball_image='$nimage', basketball_details='$ndetail' WHERE basketball_id=$basketballid");
?>
<script type="text/javascript">
    alert("Product Update");
</script>
<?php
    header("refresh:0.1; url=admin(basketball).php");
    }
    if(isset($_POST["archivebtn"])){
        $nname = $row['basketball_name'];
        $nprice = $row['basketball_price'];
        $nstock = $row['basketball_stock'];
        $nimage = $row['basketball_image'];
        $ndetail = $row['basketball_details'];

        mysqli_query($connect, "INSERT INTO archive_product (product_name, product_price, product_stock, product_image, product_details) VALUES ('$nname', '$nprice', '$nstock', '$nimage', '$ndetail')");

        mysqli_query($connect, "DELETE FROM basketball WHERE basketball_id=$basketballid");

        ?>
        <script type="text/javascript">
            alert("Product Archived");
        </script>
        <?php
        header("refresh:0.1; url=admin(basketball).php");
    }
?>