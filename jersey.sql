-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 04:12 AM
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
-- Table structure for table `jersey`
--

CREATE TABLE `jersey` (
  `jersey_id` int(11) NOT NULL,
  `jersey_name` varchar(255) NOT NULL,
  `jersey_price` decimal(5,2) NOT NULL,
  `jersey_stock` varchar(255) NOT NULL,
  `jersey_size` varchar(255) NOT NULL,
  `jersey_image` varchar(255) NOT NULL,
  `jersey_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jersey`
--

INSERT INTO `jersey` (`jersey_id`, `jersey_name`, `jersey_price`, `jersey_stock`, `jersey_size`, `jersey_image`, `jersey_details`) VALUES
(1, 'JK BASKETBALL JERSEY- ON FIRE SERIES', 108.00, '50', 'S,M,L,XL,XXL,XXXL', 'image/onfireseries.png', 'This on fire series jersey is made from structured m/f with a nice fit and weight. This jersey is combine withe the fire on the side of the jersey, and below the short.  Fierce and passionate, just like the game of basketball.'),
(2, 'HOOPS ALL STAR CITY (SUBLIMATION)GRADIENT PURPLE/WHT/ORANGE', 99.00, '50', 'XS,S,M,L,XL,XXL,XXXL,XXXXL', 'image/hoopsallstar.jpg', 'The Hoops All Star City basketball jersey in Gradient Purple/White/Orange offers a stylish design with a comfortable fit. It is perfect for both casual and competitive play, ensuring you look and feel like an all-star on the court.'),
(3, 'NIKE JERSEY CLEVELAND (BLUE/WHITE)', 129.00, '50', 'XS,S,M,L,XL,XXL,XXXL,XXXXL', 'image/nba.jpg', 'The Nike Cleveland basketball jersey in Blue/White offers a classic look with modern comfort. It is the perfect way to support your team whether you are playing or cheering from the sidelines.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jersey`
--
ALTER TABLE `jersey`
  ADD PRIMARY KEY (`jersey_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jersey`
--
ALTER TABLE `jersey`
  MODIFY `jersey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
