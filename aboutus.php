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
        #about-us-content {
        background-color: #eed8d8;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 80%;
        margin: 20px auto;
        text-align: justify;
        }

        .card {
        width: 1400px;
        height: 500px;
        border-radius: 10px;
        display: flex;
        justify-content: space-evenly;
        margin-top: 20px;
        }

        .no{
        width: 1400px;
        height: 335px;
        }
        .cardproduct{
          width: 250px;
          height: 450px;
          box-shadow: 0 0 5px grey;
          margin-left: 20px;
          margin-bottom: 10px;
          margin-top: 10px;
          border-radius: 5px;
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
	
    

            <div id="about-us-content" style="margin-top: 200px;" >
                <p>Backgroud</p>
                <p>Welcome to the Scout Mall! We are an online retailer specializing in high-quality basketball supplies. As basketball enthusiasts, we know how important quality equipment is to improving your game and enjoying the game. Therefore, we are committed to providing basketball fans around the world with the latest and highest quality basketball equipment, allowing you to perform well on the court and enjoy the fun of basketball.</p>
            </div>

            <div id="about-us-content">
                <p>Mission and Vision</p>
                <p>Our mission is to provide basketball fans with a convenient and fast shopping experience through our platform, so that they can easily find and purchase the basketball supplies they need. Our vision is to become the preferred shopping platform for basketball fans around the world, providing them with a wide variety of product choices, high-quality services and a pleasant shopping experience.</p>
            </div>

            <div id="about-us-content">
                <p>User Experience</p>
                <p>We are committed to providing users with a convenient and pleasant shopping experience. Our website interface is simple and clear, and the product categories are clear, allowing you to easily find the products you need. We provide safe and convenient payment methods and ensure privacy and security during the shopping process. Our customer service team is always on standby to provide you with professional and timely consultation and assistance.</p>
            </div>

            <div class="card">
                <div class="no"style="display: flex; justify-content: space-evenly;">
                    <div class="cardproduct">
                        <img width="100%" style="border-radius: 5px 5px 0 0;" src="">
                        <a>Ny Yao Bin</a><br><br>
                        <a></a><br><br>
                        <a></a>
                        <div class="bt">
                          
                        </div>
                      </div>
                    <div class="cardproduct">
                        <img width="100%" style="border-radius: 5px 5px 0 0;" src="">
                        <a>Choo Yi Cheng</a><br><br>
                        <a></a><br><br>
                        <a></a>
                        <div class="bt">
                          
                        </div>
                      </div>
                    <div class="cardproduct">
                        <img width="100%" style="border-radius: 5px 5px 0 0;" src="">
                        <a>Fong Wai Lek</a><br><br>
                        <a></a><br><br>
                        <a></a>
                        <div class="bt">
                          
                        </div>
                      </div>
                    </div>
                </div>



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