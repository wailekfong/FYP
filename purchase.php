<?php 
include("dbconnection.php");
session_start();
?>

<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css">
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="purchase.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl嗨⢾姞筗㵁縓狙혲絷䶜黺ࢌ鯇똯==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Product Detail</title>
	<link rel="icon" type="png" href="image/dreams2.png">
</head>
<body>
    <header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="image/dreams3.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
									aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="product.php">Product Details</a></li>
									<li class="nav-item"><a class="nav-link" href="cart.php">Shopping Cart</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
									aria-expanded="false">About Us</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
									<li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
									aria-expanded="false">Privacy</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="user_profile.php">Account</a></li>
								</ul>
							</li>
							<!-- Display Log Out option if user is logged in -->
							<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
								<li class="nav-item"><a href="user_profile.php"><span class="nav-link">Welcome, <?php echo $_SESSION['name']; ?></span></li>
								<li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
							<?php else: ?>
								<li class="nav-item"><a class="nav-link" href="login.html">Log In</a></li>
							<?php endif; ?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>

<?php
if(isset($_GET["buy"])) {
    $productid = $_GET["productid"];

    $result = mysqli_query($connect, "SELECT * FROM product WHERE product_id='$productid'");
    $row = mysqli_fetch_assoc($result);
}
?>

<h1>Product Detail</h1>
<p>
    <br>Product ID : <?php echo $row['product_id'] ?>
    <br>Product Name : <?php echo $row['product_name'] ?>
    <br>Product Price : <?php echo $row['product_price'] ?>
    <br>Product Stock : 
    <?php 
        if ($row['product_stock'] > 0) 
        {
            echo "In stock";
        } else {
            echo "Out of stock";
        } 
    ?>
    <br>Product Detail : <?php echo $row['product_details'] ?>
</p>

<h1>Your Order Detail</h1>
<form name="purchasefrm" method="post" action="">
    <p>Quantity:<input type="number" name="cust_qty" value="1" min="1"></p>
    <p><input type="submit" name="orderbtn" value="Add to Cart"></p>
</form>

<div>
    <ul class="nav-links">
        <li class="btn"><a href="product.php">Product Page</a></li>
    </ul>
</div>

<?php @include 'footer.php'; ?>
    
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>

<?php

if (isset($_POST["orderbtn"])) {
    $cqty = $_POST["cust_qty"];  // Retrieve value from purchasefrm

    $user_id = $_SESSION['user_id']; // Retrieve user ID from session

    $cname = $row["product_name"];
    $cprice = $row["product_price"];
    $tprice = $row["product_price"] * $cqty;

    // Check if the product already exists in the cart table for the user
    $check_query = mysqli_query($connect, "SELECT * FROM cart WHERE product_name='$cname' AND user_id='$user_id'");
    if(mysqli_num_rows($check_query) > 0) {
        // If the product exists, update the quantity
        $existing_row = mysqli_fetch_assoc($check_query);
        $new_qty = $existing_row['quantity'] + $cqty;
        $new_tprice = $existing_row['product_price'] * $new_qty;
        
        mysqli_query($connect, "UPDATE cart SET quantity='$new_qty', total_price='$new_tprice' 
                            WHERE product_name='$cname' AND user_id='$user_id'");
    } else {
        // If the product doesn't exist, insert it into the cart table
        mysqli_query($connect, "INSERT INTO cart (product_id, product_name, product_price, quantity, total_price, user_id) 
                            VALUES ('$clothesid','$cname','$cprice', '$cqty', '$tprice', '$user_id')");
    }
    
    header("location: cart.php");
}
?>