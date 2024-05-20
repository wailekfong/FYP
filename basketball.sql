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
-- Table structure for table `basketball`
--

CREATE TABLE `basketball` (
  `basketball_id` int(11) NOT NULL,
  `basketball_name` varchar(255) NOT NULL,
  `basketball_price` decimal(5,2) NOT NULL,
  `basketball_stock` varchar(255) NOT NULL,
  `basketball_size` varchar(255) NOT NULL,
  `basketball_image` varchar(255) NOT NULL,
  `basketball_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basketball`
--

INSERT INTO `basketball` (`basketball_id`, `basketball_name`, `basketball_price`, `basketball_stock`, `basketball_size`, `basketball_image`, `basketball_details`) VALUES
(1, 'MOLTEN BALL B7G 4 5 0 0', 240.00, '50', '7', 'image/b7g4500.jpg', 'The BG4500 basketball is a high-quality choice for serious players. Made with durable composite leather, it offers excellent grip and responsiveness for both indoor and outdoor play. Its official size and weight make it perfect for competitive games and t'),
(2, 'MOLTEN BALL B5G3800', 190.00, '50', '5', 'image/bg3800.png', 'The BG3800 basketball is a reliable option designed for both casual and competitive play. Constructed with durable rubber, it provides good grip and control on the court. Its official size and weight ensure consistency and accuracy in your shots and passe'),
(3, 'MOLTEN BALL B6G-5000', 480.00, '50', '6', 'image/bg-5000.png', 'The BG5000 basketball is built for peak performance and lasting durability. With its high-quality composite leather construction, it provides excellent grip and control. Whether you are playing indoors or outdoors, it delivers consistent bounce and respon'),
(4, 'MOLTEN BALL B5G1600', 60.00, '50', '5', 'image/bg1600.jpg', 'The BG1600 basketball is a reliable option for players of all levels. Made with durable rubber, it offers solid grip and control on the court. Its official size and weight ensure consistency in your shots and passes. Perfect for casual games or practice s'),
(5, 'WILSON BASKETBALL FIBA 3 ON 3', 250.00, '50', '6', 'image/fiba3on3.jpeg', 'The Wilson FIBA 3x3 basketball is built for FIBA 3x3 competitions with top-notch materials for outdoor play. Its durable rubber cover provides great grip and longevity, meeting official size and weight requirements. Whether you are in tournaments or casua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basketball`
--
ALTER TABLE `basketball`
  ADD PRIMARY KEY (`basketball_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basketball`
--
ALTER TABLE `basketball`
  MODIFY `basketball_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
