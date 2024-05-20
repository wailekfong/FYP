<?php
// Start session
session_start();

// Check if user is logged in
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = "Guest"; // If user is not logged in, display as "Guest"
}
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="icon" type="png" href="image/dreams2.png">
	<!-- Author Meta -->
	<meta name="author" content="DREAMS STATION">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>DREAMS STATION</title>
	<!--
		CSS
		============================================= -->
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
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl嗨⢾姞筗㵁縓狙혲絷䶜黺ࢌ鯇똯==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

	<style>
		body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eaea9b;
            color: #333;
        }
        
        h1 {
            color: #fff;
        }
        main {
   			max-width: 800px;
    		margin: 200px auto 20px; /* 调整顶部边距为 100px */
    		background-color: #fff;
    		padding: 20px;
    		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    		border-radius: 8px;
		}

        iframe {
            width: 100%;
            height: 300px;
            border: 0;
        }
        address {
            margin-top: 20px;
            font-style: normal;
        }
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #34393e;
            color: #fff;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        
        nav {
          background-color: #444;
          color: white;
          text-align: center;
          padding: 0.5em;
        }
    
        nav a {
          color: white;
          text-decoration: none;
          margin: 0 10px;
          font-size: 16px;
          border-radius: 5px;
          padding: 5px;
          transition: all 1s;
        }

        nav a:hover {
            background-color: black;
        }

        h3{
            text-align: center;
        }

	</style>

<body>

	<!-- Start Header Area -->
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
									<li class="nav-item"><a class="nav-link" href="contactus.php">Contact Us</a></li>
									<li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
									aria-expanded="false">Privacy</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="user_profile.php">Account</a></li>
									<li class="nav-item"><a class="nav-link" href="transaction_history.php">Transaction History</a></li>
								</ul>
							</li>
							<!-- Display Log Out option if user is logged in -->
							<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
								<li class="nav-item"><span class="nav-link">Welcome, <?php echo $_SESSION['name']; ?></span></li>
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
	<!-- End Header Area -->

    

	<!-- Start banner Area -->
	
    <main>
        <p>Email: dreamsstationFYP@gmail.com</p>
        <p>Phone: 1600-500 8888</p>

        <address>
            Lot 9221, Linked Bridge, One Utama Shopping Centre, Lebuh Bandar Utama
        </address>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127481.1966134129!2d101.46308749726559!3d3.1507054000000254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4f59553ca70f%3A0xaeda7960c587a9f!2sMVP%20Basketball%20Store%20%40%201%20Utama!5e0!3m2!1szh-CN!2smy!4v1704964425333!5m2!1szh-CN!2smy" 
                width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </main>


	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="image/Features/f-icon1.png" alt="">
						</div>
						<h6>Free Delivery</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="image/Features/f-icon2.png" alt="">
						</div>
						<h6>Return Policy</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="image/Features/f-icon3.png" alt="">
						</div>
						<h6>24/7 Support</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="image/Features/f-icon4.png" alt="">
						</div>
						<h6>Secure Payment</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->

	

	

	


	<!-- start footer Area -->
	<?php @include 'footer.php'; ?>
	<!-- End footer Area -->

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