-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 04:13 AM
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
-- Table structure for table `stocking`
--

CREATE TABLE `stocking` (
  `stocking_id` int(11) NOT NULL,
  `stocking_name` varchar(255) NOT NULL,
  `stocking_price` decimal(5,2) NOT NULL,
  `stocking_stock` varchar(255) NOT NULL,
  `stocking_size` varchar(255) NOT NULL,
  `stocking_image` varchar(255) NOT NULL,
  `stocking_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocking`
--

INSERT INTO `stocking` (`stocking_id`, `stocking_name`, `stocking_price`, `stocking_stock`, `stocking_size`, `stocking_image`, `stocking_details`) VALUES
(1, 'Nike Everyday Cushioned Training Ankle Socks (3 Pairs)', 69.00, '50', 'S,M,L', 'image/nike.png', 'The Nike Everyday Cushioned Training Ankle Socks come in a pack of three pairs, offering comfort and support for your daily activities. With their cushioned design, they keep your feet comfortable and reduce fatigue. Perfect for workouts or everyday wear,'),
(2, 'LI-NING MID CUT SOCKS - WHITE/RED - AWLR234-1', 30.00, '50', 'FIXED-SIZE', 'image/lining.png', 'The Li-Ning Mid Cut Socks in White/Red (model AWLR234-1) offer both style and functionality. Their mid-cut design provides ankle support, while the white and red colors add a vibrant touch. Made with quality materials, these socks ensure comfort and durab'),
(3, 'RIGORER SOCKS (WHITE/BLACK)', 29.00, '50', 'FIXED-SIZE', 'image/rigorer.jpg', 'The RIGORER Socks in White/Black offer a comfortable and stylish choice for everyday wear. With their classic color combination, they are versatile for any occasion, providing both comfort and style.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stocking`
--
ALTER TABLE `stocking`
  ADD PRIMARY KEY (`stocking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stocking`
--
ALTER TABLE `stocking`
  MODIFY `stocking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
