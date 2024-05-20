-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 05:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_gender` varchar(255) NOT NULL,
  `admin_contact` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(7,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(7,2) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Basketball'),
(2, 'Shoes'),
(3, 'Jersey'),
(4, 'Socks'),
(5, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_rating` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order details`
--

CREATE TABLE `order details` (
  `order_details_id` int(11) NOT NULL,
  `order_details_quantity` int(255) NOT NULL,
  `order_details_total_price` decimal(5,2) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_details` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_price` decimal(5,2) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(255) NOT NULL,
  `payment_price` decimal(5,2) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `receipt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(5,2) NOT NULL,
  `product_discount` decimal(5,2) NOT NULL,
  `product_stock` int(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_details` varchar(1000) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_image`, `product_name`, `product_price`, `product_discount`, `product_stock`, `product_size`, `product_details`, `order_id`) VALUES
(1, 1, 'image/Basketball/b7g4500.jpg', 'MOLTEN BALL B7G 4 5 0 0', 240.00, 0.00, 50, '7', 'The BG4500 basketball is a high-quality choice for serious players. Made with durable composite leather, it offers excellent grip and responsiveness for both indoor and outdoor play. Its official size and weight make it perfect for competitive games and training sessions. Elevate your performance with the reliability of the BG4500.', 0),
(2, 1, 'image/Basketball/bg3800.png', 'MOLTEN BALL B5G3800\r\n', 190.00, 0.00, 50, '5', '\r\nThe BG3800 basketball is a reliable option designed for both casual and competitive play. Constructed with durable rubber, it provides good grip and control on the court. Its official size and weight ensure consistency and accuracy in your shots and passes. Whether you\'re practicing drills or enjoying a game with friends, the BG3800 is a solid choice for all skill levels.', 0),
(3, 1, 'image/Basketball/bg-5000.png', 'MOLTEN BALL B6G-5000', 480.00, 249.00, 10, '6', 'The BG5000 basketball is built for peak performance and lasting durability. With its high-quality composite leather construction, it provides excellent grip and control. Whether you are playing indoors or outdoors, it delivers consistent bounce and responsiveness. Perfect for serious players aiming to improve their game, the BG5000 is your go-to choice for reliable performance on the court.', 0),
(4, 1, 'image/Basketball/bg1600.jpg', 'MOLTEN BALL B5G1600', 60.00, 0.00, 50, '5', 'The BG1600 basketball is a reliable option for players of all levels. Made with durable rubber, it offers solid grip and control on the court. Its official size and weight ensure consistency in your shots and passes. Perfect for casual games or practice sessions, the BG1600 provides good performance at an affordable price.', 0),
(5, 1, 'image/Basketball/fiba3on3.jpeg', 'WILSON BASKETBALL FIBA 3 ON 3', 250.00, 220.00, 10, '6', 'The Wilson FIBA 3x3 basketball is built for FIBA 3x3 competitions with top-notch materials for outdoor play. Its durable rubber cover provides great grip and longevity, meeting official size and weight requirements. Whether you are in tournaments or casual games, it offers the performance and durability you need to shine on the court.', 0),
(6, 2, 'image/Shoes/antaspeed5.jpg', 'ANTA SPEED 5', 469.00, 0.00, 20, '9,9.5,10,10.5,11', 'The Anta Speed 5 is a lightweight and supportive basketball shoe designed for speed and agility. It offers comfortable cushioning, breathability, and reliable traction for quick movements on the court.', 0),
(7, 2, 'image/Shoes/liningwadev2.jpeg', 'LI-NING WAY OF WADE ALL CITY V2 \"FAMILY LOVE\" BASKETBALL SHOES - STANDARD WHITE/NEON BARELY PINK - ABAT053-7', 699.00, 0.00, 20, '7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13', 'The Li-Ning Way of Wade All City V2 \"Family Love\" basketball shoes in standard white with neon barely pink accents are designed for both style and performance on the court. Created in collaboration with Dwyane Wade, they offer comfort, support, and traction for your game.', 0),
(8, 2, 'image/Shoes/liningsonic11.jpeg', 'LI-NING SONIC 11 BASKETBALL SHOES - WHITE - ABAT021-2', 599.00, 0.00, 20, '7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13', '\r\nThe Li-Ning Sonic 11 basketball shoes in white offer a sleek design with lightweight comfort and responsive cushioning for on-court performance. With durable rubber outsoles providing reliable traction, these shoes are designed to support your game with confidence.', 0),
(9, 2, 'image/Shoes/jordanmaxaura4.png', 'JORDAN MAX AURA 4 \"BLACK CAT\"', 739.00, 600.00, 20, '7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12', 'The Jordan Max Aura 4 \"Black Cat\" is a sleek and versatile basketball shoe designed for both on-court performance and off-court style. With a sleek black colorway, these shoes offer comfort, support, and traction, making them suitable for both basketball and everyday wear.', 0),
(10, 3, 'image/Jersey/onfireseries.png', 'JK BASKETBALL JERSEY- ON FIRE SERIES', 108.00, 0.00, 100, 'S,M,L,XL,XXL,XXXL', 'This on fire series jersey is made from structured m/f with a nice fit and weight. This jersey is combine withe the fire on the side of the jersey, and below the short.  Fierce and passionate, just like the game of basketball.', 0),
(11, 3, 'image/Jersey/hoopsallstar.jpg', 'HOOPS ALL STAR CITY (SUBLIMATION)GRADIENT PURPLE/WHT/ORANGE', 99.00, 0.00, 100, 'XS,S,M,L,XL,XXL,XXXL,XXXXL', 'The Hoops All Star City basketball jersey in Gradient Purple/White/Orange offers a stylish design with a comfortable fit. It is perfect for both casual and competitive play, ensuring you look and feel like an all-star on the court.', 0),
(12, 3, 'image/Jersey/nba.jpg', 'NIKE JERSEY CLEVELAND (BLUE/WHITE)', 129.00, 0.00, 100, 'XS,S,M,L,XL,XXL,XXXL,XXXXL', '\r\nThe Nike Cleveland basketball jersey in Blue/White offers a classic look with modern comfort. It is the perfect way to support your team whether you are playing or cheering from the sidelines.', 0),
(13, 4, 'image/Socks/nike.png', 'Nike Everyday Cushioned Training Ankle Socks (3 Pairs)', 69.00, 0.00, 100, 'S,M,L', 'The Nike Everyday Cushioned Training Ankle Socks come in a pack of three pairs, offering comfort and support for your daily activities. With their cushioned design, they keep your feet comfortable and reduce fatigue. Perfect for workouts or everyday wear, these socks provide a snug fit and a touch of athletic style with the Nike logo.', 0),
(14, 4, 'image/Socks/lining.png', 'LI-NING MID CUT SOCKS - WHITE/RED - AWLR234-1', 30.00, 22.00, 100, 'FIXED-SIZE', 'The Li-Ning Mid Cut Socks in White/Red (model AWLR234-1) offer both style and functionality. Their mid-cut design provides ankle support, while the white and red colors add a vibrant touch. Made with quality materials, these socks ensure comfort and durability for any activity.', 0),
(15, 4, 'image/Socks/rigorer.jpg', 'RIGORER SOCKS (WHITE/BLACK)', 29.00, 0.00, 100, 'FIXED-SIZE', 'The RIGORER Socks in White/Black offer a comfortable and stylish choice for everyday wear. With their classic color combination, they are versatile for any occasion, providing both comfort and style.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` int(11) NOT NULL,
  `receipt_date` date NOT NULL,
  `receipt_total_price` decimal(5,2) NOT NULL,
  `receipt_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `register_id` int(100) NOT NULL,
  `register_username` varchar(100) NOT NULL,
  `register_contact` varchar(100) NOT NULL,
  `register_email` varchar(100) NOT NULL,
  `register_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`register_id`, `register_username`, `register_contact`, `register_email`, `register_password`) VALUES
(13, 'yicheng', '011-10997079', 'yc@gmail.com', 'Yicheng1124@');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_contact` int(100) NOT NULL,
  `user_date_of_birth` date NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `order details`
--
ALTER TABLE `order details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`register_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order details`
--
ALTER TABLE `order details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `register_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
