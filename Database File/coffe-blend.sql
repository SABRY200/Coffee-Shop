-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 01:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffe-blend`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Mohamed Sabry', 'admin@gmail.com', '$2y$10$5OHyOzfTK/aFt8Gm6zX9wusrHPupy/lSHMRBfNHiM2pA2U61n7JGC', '2023-10-27 19:55:09'),
(2, 'Mo_Sabry0', 'admin1@gmail.com', '$2y$10$cdw4Gb6fV4Q1E6OjrZKESeB7zaa1MlMVFwp2E4kHjd8lfRRLBxRt.', '2023-10-27 20:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Pending',
  `user_id` int(7) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `first_name`, `last_name`, `date`, `time`, `phone`, `message`, `status`, `user_id`, `created_at`) VALUES
(4, 'Mohamed', 'Sabry', '10/29/2023', '12:30am', '01278694124', 'helllllllllo', 'Done', 1, '2023-10-27 22:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` varchar(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `image`, `price`, `pro_id`, `description`, `quantity`, `user_id`, `created_at`) VALUES
(10, 'PINEAPPLE JUICE', 'drink-2.jpg', '2.90', 12, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', 1, 1, '2023-10-26 19:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `state` varchar(100) NOT NULL,
  `street_address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `zip_code` int(10) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` varchar(200) NOT NULL,
  `total_price` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `type` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `type`, `created_at`) VALUES
(1, 'COFFEE CAPUCCINO', 'menu-1.jpg', 'A small river named Duden flows by their place and supplies', '5.90', 'drink', '2023-10-23 20:43:44'),
(2, 'ICE COFFEE', 'menu-2.jpg', 'A small river named Duden flows by their place and supplies', '6.90', 'drink', '2023-10-23 20:43:44'),
(3, 'COFFEE CAPUCCINO', 'menu-3.jpg', 'A small river named Duden flows by their place and supplies', '7.90', 'drink', '2023-10-23 20:43:44'),
(4, 'ICE COFFEE', 'menu-4.jpg', 'A small river named Duden flows by their place and supplies', '8.90', 'drink', '2023-10-23 20:43:44'),
(5, 'HOT CAKE HONEY', 'dessert-1.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '2.90', 'DESSERTS', '2023-10-26 18:00:22'),
(6, 'CAKE HONEY', 'dessert-2.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '2.90', 'DESSERTS', '2023-10-26 18:00:22'),
(7, 'HOT CAKE', 'dessert-3.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '2.90', 'DESSERTS', '2023-10-26 18:00:22'),
(8, 'HOT CAKE HONEY', 'dessert-4.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '2.90', 'DESSERTS', '2023-10-26 18:00:22'),
(9, 'HOT CAKE HONEY', 'dessert-5.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '2.90', 'DESSERTS', '2023-10-26 18:02:16'),
(10, 'HOT CAKE HONEY', 'dessert-6.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '2.90', 'DESSERTS', '2023-10-26 18:02:16'),
(11, 'LEMONADE JUICE', 'drink-1.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '2.90', 'DRINKS', '2023-10-26 18:06:29'),
(12, 'PINEAPPLE JUICE', 'drink-2.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '2.90', 'DRINKS', '2023-10-26 18:06:29'),
(13, 'SODA DRINKS', 'drink-3.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '2.90', 'DRINKS', '2023-10-26 18:06:29'),
(14, 'LEMONADE JUICE', 'drink-4.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '2.90', 'DRINKS', '2023-10-26 18:06:29'),
(15, 'PINEAPPLE JUICE', 'drink-5.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '2.90', 'DRINKS', '2023-10-26 18:06:29'),
(16, 'SODA DRINKS', 'drink-6.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.', '2.90', 'DRINKS', '2023-10-26 18:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `review` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `username`, `created_at`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum sapiente voluptas necessitatibus voluptatem illum optio! Temporibus hic pariatur nesciunt fugit corrupti labore voluptas. Error facere al', 'Mohamed Sabry', '2023-10-26 19:43:36'),
(2, '“Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small.”', 'Louise Kelly', '2023-10-26 19:51:16'),
(3, '“Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the ', 'Louise Kelly', '2023-10-26 19:51:16'),
(4, '“Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name. ”', 'Louise Kelly', '2023-10-26 19:51:16'),
(5, '“Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however.”', 'Louise Kelly', '2023-10-26 19:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Mohamed Sabry', 'sabriano200@gmail.com', '$2y$10$LZY8v884ZqFGrkLPuHTrguE0AH0O0JBnyTU/ByBX2LBxn8W2XI4pe', '2023-10-23 19:16:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
