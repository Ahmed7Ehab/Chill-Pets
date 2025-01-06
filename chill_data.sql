-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 12:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chill_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `created_at`, `updated_at`) VALUES
(1, 'dog', 'this is dog category ', '2024-12-23 05:25:55', '2024-12-23 05:25:55'),
(2, 'cat', 'this is cat catigory', '2024-12-23 05:25:55', '2024-12-23 05:25:55'),
(3, 'fish', 'this is fish catigory', '2024-12-23 05:25:55', '2024-12-23 05:25:55'),
(4, 'bird', 'this is bird catigory', '2024-12-23 05:25:55', '2024-12-23 05:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `confermed`
--

CREATE TABLE `confermed` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confermed`
--

INSERT INTO `confermed` (`id`, `order_id`, `user_id`, `created_at`) VALUES
(1, 17, 2, '2025-01-06 14:42:47'),
(2, 18, 2, '2025-01-06 14:46:41'),
(3, 16, 1, '2025-01-06 22:07:03'),
(4, 19, 1, '2025-01-06 22:08:25'),
(5, 20, 1, '2025-01-06 22:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `use_phone` varchar(11) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantity` int(11) DEFAULT NULL,
  `o_status` varchar(255) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `use_phone`, `user_address`, `created_at`, `quantity`, `o_status`) VALUES
(15, 1, 10, '01017573369', 'banha', '2025-01-06 10:38:24', 1, 'confermed'),
(16, 1, 20, '01017573369', 'banha', '2025-01-06 14:40:20', 1, 'confermed'),
(17, 2, 20, '', 'banha', '2025-01-06 14:41:59', 1, 'confermed'),
(18, 2, 3, '', 'banha', '2025-01-06 14:46:38', 1, 'confermed'),
(19, 1, 3, '01017573369', 'banha', '2025-01-06 22:07:48', 1, 'confermed'),
(20, 1, 31, '01017573369', 'banha', '2025-01-06 22:57:35', 1, 'confermed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `p_status` varchar(255) DEFAULT 'out of stock',
  `avg_rete` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quantity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `picture`, `product_description`, `price`, `p_status`, `avg_rete`, `created_at`, `updated_at`, `quantity`) VALUES
(3, 1, 'dog', 'Dog Lovers.jpg', 'dog', 3.00, 'In stock', 6, '2024-12-23 12:38:47', '2025-01-06 22:07:48', 1),
(7, 2, 'cattest', 'product4.jpg', 'testtttttt', 12.00, 'out of stock', 8, '2024-12-23 12:55:56', '2025-01-06 10:35:06', 0),
(10, 1, 'testttt', 'Dog Lovers.jpg', 'testttttttttttttttttttttt', 12.12, 'out of stock', NULL, '2024-12-23 13:03:42', '2025-01-06 10:38:26', 0),
(17, 1, 'dg', 'product20_8d6fda60-29ab-4bfb-a3c1-47d515d4a91c.jpg', 'dgg', 12.11, 'out of stock', NULL, '2024-12-23 17:29:59', '2025-01-06 10:38:43', 0),
(18, 2, 'Cozy Pet Bed', 'accses.png', 'edited', 12.00, 'In stock', NULL, '2024-12-24 03:31:21', '2025-01-06 23:19:23', 5),
(20, 2, 'Cozy Pet Bed', 'accses.png', ' Your pet deserves the best rest! This cozy pet bed is designed with soft, durable materials to                 ensure maximum comfort for your furry friend. Its neutral design makes it a perfect fit for                 any room decor.', 12.00, 'in_stock', NULL, '2024-12-24 03:36:19', '2025-01-06 14:41:59', 0),
(25, 1, 'dog food', 'product4.jpg', 'this is a dog food', 122.00, 'in_stock', NULL, '2024-12-24 19:54:06', '2024-12-24 19:54:06', 2),
(27, 3, 'fish', 'fish.jpg', 'fishh', 33.00, 'in_stock', NULL, '2025-01-06 22:50:33', '2025-01-06 22:50:33', 3),
(28, 3, 'fish', 'fish.jpg', 'fishh', 33.00, 'In stock', NULL, '2025-01-06 22:50:33', '2025-01-06 22:50:33', 3),
(29, 4, 'bird', 'parrot.jpeg', 'bird', 4.00, 'in_stock', NULL, '2025-01-06 22:53:38', '2025-01-06 22:53:38', 4),
(30, 4, 'bird', 'parrot.jpeg', 'bird', 4.00, 'In stock', NULL, '2025-01-06 22:53:38', '2025-01-06 22:53:38', 4),
(31, 4, 'bird', 'freezed.png', 'test', 5.00, 'out of stock', NULL, '2025-01-06 22:57:12', '2025-01-06 22:57:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `phone`, `role`, `first_name`, `last_name`, `created_at`, `updated_at`, `address`, `password`) VALUES
(1, 'ahmed@gmail.com', '01017573369', 'admin', 'Ahmed', 'Ehab', '2024-12-23 03:57:23', '2024-12-23 03:57:23', 'banha', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'user@gmail.com', '', 'user', 'first', 'last\r\n', '2024-12-23 06:10:16', '2024-12-23 07:35:26', 'banha', '011c945f30ce2cbafc452f39840f025693339c42'),
(5, 'ahmedihab712@gmail.com', '01017573369', 'user', 'Ahmed', 'Ehab', '2024-12-24 01:28:33', '2024-12-24 01:28:33', 'Benha', '05a8ea5382b9fd885261bb3eed0527d1d3b07262'),
(6, 'ahmedihab72@gmail.com', '01017573369', 'user', 'Ahmed', 'Ehab', '2024-12-24 01:30:04', '2024-12-24 01:30:04', 'Benha', '1c6637a8f2e1f75e06ff9984894d6bd16a3a36a9'),
(7, 'malak@gmail.com', '01110458954', 'admin', 'malak', 'ayman', '2024-12-24 02:39:36', '2024-12-24 02:40:15', 'banha', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(8, 'ahmedehab@gmail.com', '01110458954', 'user', 'Ahmed', 'Ehab', '2024-12-24 20:51:29', '2024-12-24 20:51:29', 'Benha', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confermed`
--
ALTER TABLE `confermed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `confermed`
--
ALTER TABLE `confermed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `confermed`
--
ALTER TABLE `confermed`
  ADD CONSTRAINT `confermed_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `confermed_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
