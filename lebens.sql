-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 04, 2018 at 04:58 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lebens`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `name` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `pincode` bigint(6) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `alt_mobile` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`name`, `mobile`, `pincode`, `locality`, `address`, `city`, `state`, `landmark`, `alt_mobile`, `id`, `user_id`) VALUES
('DSLR', 9999999999, 110045, 'palal', 'Rz-222/45 Sadh nagar', 'new dekhi', 'delhi', 'jain plywood', '', 1, 3),
('DSLR', 9999999999, 110045, 'palal', 'Rz-222/45 Sadh nagar', 'new dekhi', 'delhi', 'jain plywood', '', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE IF NOT EXISTS `favorite` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `price`, `category`, `image`) VALUES
(18, 'T-shirt', 'kidley', 350, 'clothes', 'Canon_dslr.jpg'),
(19, 'watch', 'Rolex', 4000, 'watches', 'Canon_dslr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

DROP TABLE IF EXISTS `support`;
CREATE TABLE IF NOT EXISTS `support` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `message` longtext NOT NULL,
  `subject` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `user_id`, `message`, `subject`, `time`) VALUES
(51, 1, '', '', '2018-09-02 08:58:30'),
(50, 1, '', '', '2018-09-02 08:58:20'),
(49, 1, '', '', '2018-09-02 08:57:36'),
(48, 1, 'deepti', '', '2018-09-02 08:57:29'),
(47, 1, '', '', '2018-09-02 08:57:16'),
(46, 1, '', '', '2018-09-02 08:56:48'),
(45, 1, '', '', '2018-09-02 08:55:30'),
(44, 1, '', '', '2018-09-02 08:55:27'),
(43, 1, '', '', '2018-09-02 08:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `id`, `contact`, `name`, `image`) VALUES
('deeptisingh956@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 8851057549, 'deepti', NULL),
('de', 'c20ad4d76fe97759aa27a0c99bff6710', 2, 123, '', NULL),
('iamdeepti956@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3, 8851057549, 'deepti singh', NULL),
('abc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4, 8851057549, 'kjsuyfn', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_items`
--

DROP TABLE IF EXISTS `users_items`;
CREATE TABLE IF NOT EXISTS `users_items` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('added to cart','confirmed') NOT NULL DEFAULT 'added to cart',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_items`
--

INSERT INTO `users_items` (`id`, `user_id`, `product_id`, `quantity`, `time`, `status`) VALUES
(22, 1, 1, 1, '2018-08-25 10:37:51', 'confirmed'),
(23, 1, 17, 1, '2018-09-02 06:55:50', 'confirmed'),
(24, 1, 17, 1, '2018-09-02 06:56:01', 'added to cart'),
(26, 4, 16, 1, '2018-09-05 07:40:14', 'added to cart'),
(58, 3, 17, 1, '2018-09-11 17:36:56', 'confirmed');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
