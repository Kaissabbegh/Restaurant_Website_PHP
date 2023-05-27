-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 04:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ip_add` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(9, 'pizza'),
(10, 'burger'),
(11, 'salad'),
(12, 'tacos'),
(14, 'soda'),
(15, 'dessert'),
(16, 'sandwich');

-- --------------------------------------------------------

--
-- Table structure for table `order_pending`
--

CREATE TABLE `order_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_pending`
--

INSERT INTO `order_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(21, 18, 634624688, 8, 1, 'pending'),
(22, 18, 1782161701, 8, 1, 'pending'),
(23, 19, 567594146, 8, 1, 'pending'),
(24, 18, 2092852352, 8, 1, 'pending'),
(25, 18, 1884224349, 7, 1, 'pending'),
(26, 18, 1482081702, 21, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(225) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_image` varchar(225) NOT NULL,
  `product_price` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `category_id`, `product_image`, `product_price`) VALUES
(6, 'pizza2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 9, '4791207-9790062099-Pizza.jpg', 10),
(7, 'pizza3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 9, 'R.jpg', 12),
(8, 'tacos1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 12, 'OIP.jpg', 5),
(9, 'tacos2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 12, 'OIP (1).jpg', 6),
(10, 'sandwich1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 8, 'sandwich1.jpg', 8),
(11, 'sandwich2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 8, 'sandwich2.jpg', 8),
(12, 'sandwich3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 8, 'sandwich3.jpg', 8),
(13, 'soda1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 14, 'soda1.jpg', 2),
(14, 'soda2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 14, 'soda 2.jpg', 2),
(15, 'soda 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 14, 'soda 3.jpg', 2),
(16, 'burger1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 10, 'OIP (5).jpg', 10),
(17, 'burger2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 10, 'pexels-sebastian-coman-photography-3504876.jpg', 10),
(18, 'burger3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 10, 'pexels-robin-stickel-70497.jpg', 12),
(19, 'salad1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 11, 'salad1.jpg', 5),
(20, 'salad2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 11, 'salad2.jpg', 12),
(21, 'dessert1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 15, 'desert1.jpg', 3),
(22, 'dessert2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempore praesentium perferendis a, repellat, temporibus sunt placeat illum dolore fugiat ad deserunt quis? Dolores molestias velit similique cumque odio atque.', 15, 'desert2.jpg', 4),
(23, 'test', 'eifosjiof', 9, 'Sister s house.png', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(31, 18, 5, 1782161701, 1, '2023-05-09 08:29:53', 'pending'),
(32, 19, 17, 567594146, 2, '2023-05-09 08:30:15', 'pending'),
(33, 18, 17, 2092852352, 2, '2023-05-09 08:31:27', 'pending'),
(34, 18, 12, 1884224349, 1, '2023-05-09 11:41:13', 'pending'),
(35, 18, 3, 1482081702, 1, '2023-05-09 14:37:20', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `ip_add` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_image`, `user_address`, `user_mobile`, `user_email`, `user_password`, `ip_add`, `role`) VALUES
(17, 'admin', '', '', '123', 'kaissabbegh1@gmail.com', ' 123', '::1', 'admin'),
(18, 'kais', '', '', '123', 'kaissabbegh1@gmail.com', ' 123', '::1', 'user'),
(19, 'ons', '', '', '123', 'kaissabbegh1@gmail.com', ' 123', '::1', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `order_pending`
--
ALTER TABLE `order_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_pending`
--
ALTER TABLE `order_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
