<?php
include("dbconnection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Products</title>
    <link rel="icon" type="png" href="image/dreams2.png">
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
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl嗨⢾姞筗㵁縓狙혲絷䶜黺ࢌ鯇똯==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
            background-color: #fff;
        }
        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .card .product-id,
        .card .product-name,
        .card .product-price,
        .card .product-stock,
        .card .product-details {
            margin-bottom: 10px;
        }
        .card .buy-now {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #28a745;
            border-radius: 4px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <a class="navbar-brand logo_h" href="index.php"><img src="image/dreams3.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
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

    <h1>List of Products</h1>
    <div class="card-container">
        <?php
        // Fetch and display products from database
        $result = mysqli_query($connect, "SELECT * FROM product");  
        while($row = mysqli_fetch_assoc($result)) {
        ?>          
            <div class="card">
                <div class="product-id"><?php echo $row["product_id"]; ?></div>
                <div class="product-name"><?php echo $row["product_name"]; ?></div>
                <div class="product-price"><?php echo $row["product_price"]; ?></div>
                <div class="product-stock"><?php echo ($row["product_stock"] > 0) ? "In Stock" : "Out of Stock"; ?></div>
                <img src="<?php echo $row["product_image"]; ?>" alt="Product Image">
                <div class="product-details"><?php echo $row["product_details"]; ?></div>
                <a class="buy-now" href="purchase.php?buy&productid=<?php echo $row['product_id']; ?>">Buy Now</a>
            </div>
        <?php
        }       
        ?>
    </div>
    <div>
        <ul class="nav-links">
            <li class="btn"><a href="cart.php">Cart</a></li>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
