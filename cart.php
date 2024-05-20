<?php 
include("dbconnection.php");
session_start();

// Check if user is logged in
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if form is submitted to update quantity
        if (isset($_POST['update_quantity'])) {
            $cart_id = $_POST['cart_id'];
            $new_quantity = $_POST['quantity'];

            // Update quantity in the cart table
            $update_query = mysqli_query($connect, "UPDATE cart SET quantity = '$new_quantity' WHERE id = '$cart_id'");
            if ($update_query) {
                // Recalculate total price
                $row = mysqli_fetch_assoc(mysqli_query($connect, "SELECT product_price FROM cart WHERE id = '$cart_id'"));
                $total_price = $row["product_price"] * $new_quantity;

                // Update total price in the cart table
                mysqli_query($connect, "UPDATE cart SET total_price = '$total_price' WHERE id = '$cart_id'");
            } else {
                // Handle error if failed to update quantity
                echo "Error updating quantity.";
            }
        }
    }

	if (isset($_REQUEST["del"])) 
	{
		$id = $_REQUEST["id"]; 
		mysqli_query($connect, "DELETE FROM cart WHERE id = $id");
		
		header("Location: cart.php");
	}

	// Fetch and store product details from the cart
	$product_details = array();
	$result = mysqli_query($connect, "SELECT * FROM cart");
	while ($row = mysqli_fetch_assoc($result)) {
		$product_details[] = array(
			"product_name" => $row["product_name"],
			"quantity" => $row["quantity"],
			"total_price" => $row["total_price"]
		);
	}

	// Store product details in session
	$_SESSION['product_details'] = $product_details;
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
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl嗨⢾姞筗㵁縓狙혲絷䶜黺ࢌ鯇똯==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Shopping Cart</title>
	<link rel="icon" type="png" href="image/dreams2.png">

    <script type="text/javascript">
    
    function confirmation()
    {
        answer = confirm("Do you want to delete this product?");
        return answer;
    }
    
    </script>

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
    <h1>Cart</h1>

    <table border="1" width="650px">
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th colspan="5">Action</th>
        </tr>

        <?php
        

        // Fetch and display products from database
        $result = mysqli_query($connect, "SELECT * FROM cart");
        while($row = mysqli_fetch_assoc($result)) {
        ?>          
            <tr>
                <form method="post">
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["product_name"]; ?></td>
                    <td><?php echo $row["product_price"]; ?></td>
                    <td><input type="number" name="quantity" value="<?php echo $row["quantity"]; ?>"></td>
                    <td><?php echo $row["total_price"]; ?></td>
                    <input type="hidden" name="cart_id" value="<?php echo $row["id"]; ?>" min="1">
                    <td><button type="submit" name="update_quantity">Update</button></td>
                    <td><button type="submit"><a href="cart.php?del&id=<?php echo $row['id']; ?>" onclick="return confirmation();">Delete</button></a></td>
                </form>
            </tr>
        <?php
        }       
        ?>
    </table>
    <div>
        <ul class="nav-links">
            <li class="btn"><a href="product.php">Product Page</a></li>
            <li class="btn"><a href="make_payment.php">Make Payment</a></li>
			<li class="btn"><a href="logout.php">Logout</a></li>
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