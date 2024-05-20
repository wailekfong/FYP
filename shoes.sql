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
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `shoes_id` int(11) NOT NULL,
  `shoes_name` varchar(255) NOT NULL,
  `shoes_price` decimal(5,2) NOT NULL,
  `shoes_stock` varchar(255) NOT NULL,
  `shoes_size` varchar(255) NOT NULL,
  `shoes_image` varchar(255) NOT NULL,
  `shoes_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoes_id`, `shoes_name`, `shoes_price`, `shoes_stock`, `shoes_size`, `shoes_image`, `shoes_details`) VALUES
(1, 'ANTA SPEED 5', 469.00, '50', '9,9.5,10,10.5,11', 'image/antaspeed5.jpg', 'The Anta Speed 5 is a lightweight and supportive basketball shoe designed for speed and agility. It offers comfortable cushioning, breathability, and reliable traction for quick movements on the court.'),
(2, 'LI-NING WAY OF WADE ALL CITY V2 \"FAMILY LOVE\" BASKETBALL SHOES - STANDARD WHITE/NEON BARELY PINK - ABAT053-7', 699.00, '50', '7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13', 'image/liningwadev2.jpeg', 'The Li-Ning Way of Wade All City V2 \"Family Love\" basketball shoes in standard white with neon barely pink accents are designed for both style and performance on the court. Created in collaboration with Dwyane Wade, they offer comfort, support, and tracti'),
(3, 'LI-NING SONIC 11 BASKETBALL SHOES - WHITE - ABAT021-2', 599.00, '50', '7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13', 'image/liningsonic11.jpeg', 'The Li-Ning Sonic 11 basketball shoes in white offer a sleek design with lightweight comfort and responsive cushioning for on-court performance. With durable rubber outsoles providing reliable traction, these shoes are designed to support your game with c'),
(4, 'JORDAN MAX AURA 4 \"BLACK CAT\"', 739.00, '50', '7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12', 'image/jordanmaxaura4.png', 'The Jordan Max Aura 4 \"Black Cat\" is a sleek and versatile basketball shoe designed for both on-court performance and off-court style. With a sleek black colorway, these shoes offer comfort, support, and traction, making them suitable for both basketball ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`shoes_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `shoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
