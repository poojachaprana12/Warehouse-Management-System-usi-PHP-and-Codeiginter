-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 07:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pooja_warehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(11) NOT NULL,
  `roleauthentication` int(12) NOT NULL,
  `status` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `name`, `username`, `image`, `password`, `role`, `roleauthentication`, `status`, `created_on`) VALUES
(1, 'pooja', 'pooja', '23213330_1556572081085630_922003168551451912_o.jpg', '1111', 1, 1, 2, '2020-08-27 10:20:00'),
(6, 'Kaushal Kumar Bhati', 'Kaushal', '20190617181521_IMG_3805.jpg', '1111', 2, 1, 2, '2020-08-27 20:36:44'),
(8, 'tejsee', 'sdf', '52935796_1689957341106054_137658361876316160_n4.jpg', 'sdfs', 1, 1, 3, '2020-08-30 17:42:30'),
(14, 'Pooja Chaprana', 'bhati', '51565990_354383175153073_7913717584954916864_n.jpg', '1111', 2, 1, 2, '2020-08-30 16:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`cat_id`, `cat_name`, `cat_time`) VALUES
(1, 'Electronics', '2020-08-25 15:53:49'),
(2, 'Kitchen', '2020-08-25 15:54:05'),
(3, 'Garden', '2020-08-25 15:55:01'),
(4, 'Hardware', '2020-08-25 15:55:01'),
(8, 'test', '2020-08-30 17:49:35'),
(12, 'test', '2020-08-30 17:56:21'),
(15, 'www', '2020-09-01 18:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` varchar(12) NOT NULL,
  `quantity` int(12) NOT NULL,
  `stock` varchar(5) NOT NULL,
  `updatedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `cat_id`, `description`, `price`, `quantity`, `stock`, `updatedon`, `date`) VALUES
(1, 'test', 1, 'testing', '14', 2, '2', '2020-08-27 18:23:48', '0000-00-00'),
(2, 'test', 4, 'testing for issue', '14', 21, '21', '2020-08-30 10:21:48', '0000-00-00'),
(3, 'test', 3, 'testing', '14', 2, '2', '2020-08-30 10:21:04', '0000-00-00'),
(9, 'shomu', 4, 'sadasdsaddsfsdfdsf dsfssssssssssssssssssssssssssssssssssss dsfffffffffffffffffffffffffffffffffffffffffffffffff sdfffffffffffffffffffffffffffffffffffff', '2', 3, '3', '2020-08-30 11:17:11', '0000-00-00'),
(11, 'pooja', 2, 'asdsadsadwqqbbbbbbbbbbbbbbbbb', '21', 5, '5', '2020-08-30 13:56:38', '0000-00-00'),
(12, 'testing', 1, 'absbsbs', '4', 4, '4', '2020-08-30 13:54:16', '0000-00-00'),
(13, 'zzzzzz', 3, 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzz', '7', 21, '21', '2020-08-30 13:58:29', '0000-00-00'),
(14, 'dsfsfdsfdsf', 1, 'dsfdsfdsfds', '92', 21, '21', '2020-08-30 13:59:56', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `rolename` varchar(12) NOT NULL,
  `roleauthentication` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `rolename`, `roleauthentication`) VALUES
(1, 'user', 1),
(2, 'client', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `productcategory` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
