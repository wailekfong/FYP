<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Basketball Shoes</title>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">

    
</head>
<body>
    
    <div class="body">
        <h1>Add Basketball Shoes</h1>
        <form name="addfrm" method="post" action="" enctype="multipart/form-data">
            <label>Shoes Name</label>
                <input type="text" name="pro_name" size="80" required>
            <label>Shoes Price</label>
                <input type="text" name="pro_price" size="10" required>
            <label>Shoes Stock</label>
                <input type="text" name="pro_stock" size="10" required>
            <label>Shoes Size</label>
                <input type="text" name="pro_size" size="10" required>
            <label>Shoes Image</label>
                <input type="file" name="image" accept="image/*" required>
            <label>Shoes Details</label>
                <textarea name="pro_details" cols="60" rows="4" required></textarea>

            <label><input type="submit" name="savebtn" value="ADD BASKETBALL SHOES"></p>
            <a href="admin(shoes).php" class="back">Back</a>
        </form>
    </div>

</body>
</html>

<?php
include("dbconnection.php");
if(isset($_POST["savebtn"]))
{
    $pname = $_POST["pro_name"];
    $pprice = $_POST["pro_price"];
    $pstock = $_POST["pro_stock"];
    $psize = $_POST["pro_size"];
    $pdet = $_POST["pro_details"];
    
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['image'];
        $imagePath = 'image/' . $file['name'];
        move_uploaded_file($file['tmp_name'], $imagePath);
        $nimage = $imagePath;
    } else {
        // No new image uploaded, retain the existing image path
        $nimage = $row['image'];
    }


    mysqli_query($connect, "INSERT INTO shoes (shoes_name, shoes_price, shoes_stock, shoes_size, shoes_image, shoes_details) VALUES ('$pname', '$pprice', '$pstock', '$psize', '$nimage', '$pdet')");
    
    ?>

        <script type="text/javascript">
            alert("<?php echo $pname. ' saved' ?>");
        </script>

    <?php

}
?>
