-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 12, 2018 at 03:08 PM
-- Server version: 5.6.35-1+deb.sury.org~xenial+0.1
-- PHP Version: 5.6.36-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(2, 'Video Games & Consoles', 'popular_1.png'),
(3, 'Computers & Laptops', 'popular_2.png'),
(4, 'Gadgets', 'popular_3.png'),
(5, 'Video Games & Consoles', 'popular_4.png'),
(6, 'Accessories', 'popular_5.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `user_phone` varchar(25) NOT NULL,
  `massege` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `user_name`, `user_phone`, `massege`) VALUES
(1, '', 'sadam hussain', '0300246859', 'test massege fine the test'),
(2, '', 'sadaasd', '43423423', 'dsfdsfdsfsd'),
(3, '', 'dfs', '676767', 'jhjhjhj'),
(4, '', 'sadam', '9899789798', 'test message'),
(5, 'dsbsadam@gmail.com', 'asasa', '03005246762', 'sasasasa');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `description` text,
  `keyword` varchar(255) DEFAULT NULL,
  `extra_link_text` varchar(255) DEFAULT NULL,
  `comparative_text` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_image2` varchar(255) DEFAULT NULL,
  `product_image3` varchar(255) DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `video_id` varchar(255) DEFAULT NULL,
  `urdu_name` varchar(255) DEFAULT NULL,
  `was_price` int(11) NOT NULL,
  `now_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `store_id`, `name`, `sku`, `description`, `keyword`, `extra_link_text`, `comparative_text`, `product_image`, `product_image2`, `product_image3`, `hot_deal`, `status`, `created_at`, `video_id`, `urdu_name`, `was_price`, `now_price`) VALUES
(1, 1, 'test product', '3424324jlkl424', 'test', 'test', 'test', 'test', 'image1', 'image2', 'image3', 1, 2, '2018-05-08 11:17:34', 'video', 'urdu name', 45, 40),
(2, 0, 'dsad', 'dsad', 'dasd', 'dsada', 'dsad', 'dsad', NULL, NULL, NULL, 1, 1, '2018-09-04 16:20:57', 'dsa', 'lk', 2, 2),
(6, 3, 'dsadwwwgfdgfdgdf', 'dsad', 'dasd', 'dsada', 'dsad', 'dsad', '1.png', 'Screenshot from 2018-08-02 20-09-25.png', 'paymemt.png', 1, 1, '2018-09-04 16:22:42', 'dsa', 'lk', 2, 2),
(7, 3, 'Apple Iphone 6s', '12121', 'new era of smartphones', 'Apple Iphone 6s', '', 'new era of smartphones', 'banner_product.png', NULL, NULL, 1, 1, '2018-09-05 13:19:14', '', 'Apple Iphone 6s', 540, 400);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` text,
  `location` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `cell` varchar(255) DEFAULT NULL,
  `fex` varchar(255) DEFAULT NULL,
  `opening_day` text,
  `opening_hours` text,
  `remdan_day` text,
  `remdan_hours` text,
  `eid_day` text,
  `eid_hours` text,
  `christmas_day` text,
  `christmas_hours` text,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `user_id`, `store_name`, `image`, `address`, `location`, `state`, `phone`, `cell`, `fex`, `opening_day`, `opening_hours`, `remdan_day`, `remdan_hours`, `eid_day`, `eid_hours`, `christmas_day`, `christmas_hours`, `latitude`, `longitude`, `status`, `created_at`) VALUES
(1, 0, 'test1', 'brands_1.jpg', 'address', 'location', 'punjab', '03000', '030000', '030000', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2.266565', '2.65655', 2, '2018-05-08 11:18:51'),
(2, 1, 'jkjkjdsadsadas', 'brands_2.jpg', 'kjkj', 'kj', 'kj', 'kj', 'kjkhjk', 'kj', 'kj', 'kj', 'kjhgfhfg', 'kj', 'kj', 'kj', 'k', 'jk', '31.4645825', '74.2594097', 1, '2018-09-04 13:52:36'),
(3, 4, 'adsad', 'brands_3.jpg', 'dsa', 'dsak', 'qlk', 'lk', 'lk', 'l', 'lk', 'kl', 'lk', 'lk', 'lk', 'lk', 'lk', 'kl', 'kl', 'lk', 1, '2018-09-05 12:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `status`, `created_at`) VALUES
(1, 'sadam', 'sadam@nxb.com.pl', 'zaq123', '03005246762', 1, '2018-09-04 07:13:56'),
(3, 'sadam hussaingfdgdfgdfsss', 'dsbsadam@gmail.com', 'sasa', '3005246762', 1, '2018-09-04 08:03:04'),
(4, 'sadam hussain hussain ss', 'dsbsadam@gmail.com', 'zaq123', '3005246762', 1, '2018-09-04 12:47:48'),
(5, 'sadam hussaindddd', 'dsbsadam@gmail.com', 'zaq123', '3005246762', 1, '2018-09-04 13:18:50'),
(6, 'sadam hussaindddd', 'dsbsadam@gmail.com', 'zaq123', '3005246762', 1, '2018-09-04 13:22:15'),
(7, '', 'dsbsadam@gmail.com', 'zaq123', '', 1, '2018-09-04 13:29:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
