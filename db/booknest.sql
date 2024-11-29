-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 11:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booknest`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `book_condition` enum('new','like new','used') NOT NULL,
  `keywords` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `genre`, `price`, `book_condition`, `keywords`, `image`, `quantity`) VALUES
(7, 'Fourth Wing', 'Rebecca Yarros', 'fantasy', 6.00, 'like new', 'romantasy, academia, fantasy, dragons', '674698b2e01277.24545568.jpg', 60),
(8, 'Blood Over Bright Haven', 'M. L. Wang', 'scifi', 7.00, 'like new', 'dark academia, fantasy, gore', '6746ba3ce96737.30226996.jpg', 50),
(9, 'The Housemaid', 'Freida McFadden', 'thriller', 5.00, 'used', 'suspense, psychological thriller, housemaid', '6746bb37220117.72339442.jpg', 40),
(10, 'Iron Flame', 'Rebecca Yarros', 'fantasy', 7.00, 'like new', 'romantasy, academia, fantasy', '6746bbb148ddb4.68284881.jpg', 50),
(11, 'Adanna', 'Adesuwa Nwokedi', 'afrilit', 4.00, 'used', 'family, nigeria, patriarchy', '6746bc49a78c14.24442484.jpg', 30),
(12, 'Love And Other Words', 'Christina Lauren', 'romance', 7.00, 'new', 'love, friendship, romance', '6746bf530ff651.32252227.jpg', 20),
(13, 'Legendborn', 'Tracy Deonn', 'fantasy', 8.00, 'new', 'hardback, fantasy', '6746bf8e0e2ea3.34010369.jpg', 45),
(14, 'The Mechanics Of Yenagoa', 'Michael Afenfia', 'afrilit', 4.00, 'used', 'comedy, nigeria, mechanics', '6746bfcd250568.78875706.jpg', 50),
(15, 'My Sister, The Serial Killer', 'Oyinkan Braithwaite', 'afrilit', 5.00, 'like new', 'horror, african, serial killer', '6746c34466abe0.70180804.jpg', 40),
(16, 'Nightbloom', 'Peace Adzo Medie', 'afrilit', 4.00, 'used', 'ghana, family', '6746c38579d920.34522442.jpg', 40),
(17, 'Red Rising', 'Pierce Brown', 'scifi', 5.00, 'like new', 'mars, dystopia, revolution', '6746c3e0309957.09669912.jpg', 20),
(18, 'A Broken People\'s Playlist', 'Chimeka Garricks', 'afrilit', 6.00, 'like new', 'short stories', '6746e49c151f31.65915511.jpg', 45),
(19, 'The Song of Achilles', 'Madeline Miller', 'fantasy', 5.00, 'used', 'mythology, historical, queer', '6746e51b74f1d6.24670158.jpg', 20),
(20, 'A Good Girl\'s Guide To Murder', 'Holly Jackson', 'thriller', 4.00, 'like new', 'murder, YA, detective', '6746e57406d5e8.65361810.jpg', 40),
(21, 'All Your Perfects', 'Colleen Hoover', 'romance', 3.00, 'used', 'romance, love, heartbreak', '6746e5a9c5d8f6.90993398.jpg', 50),
(22, 'Beach Read', 'Emily Henry', 'romance', 4.00, 'like new', 'summer, beach,romance', '6746e5db55c8d8.99187578.jpg', 30),
(23, 'Divine Rivals', 'Rebecca Ross', 'fantasy', 5.00, 'like new', 'academia, paranormal', '6746e6274d59b8.84257120.jpg', 35);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `book_id`, `quantity`, `added_at`) VALUES
(5, 7, 7, 1, '2024-11-27 04:28:43'),
(8, 7, 9, 1, '2024-11-28 02:58:55'),
(10, 7, 12, 1, '2024-11-28 05:24:42'),
(11, 7, 11, 1, '2024-11-28 12:55:54'),
(13, 5, 8, 1, '2024-11-29 09:21:46'),
(14, 5, 17, 1, '2024-11-29 09:22:01'),
(15, 5, 16, 1, '2024-11-29 09:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_status` enum('pending','completed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_amount`, `order_status`, `created_at`) VALUES
(1, 7, 6.00, 'pending', '2024-11-28 01:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `book_id`, `quantity`, `price`) VALUES
(1, 7, 1, 6.00);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` enum('credit_card','mobile_money','debit_card') NOT NULL,
  `payment_status` enum('success','failed','pending') DEFAULT 'pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `book_id`, `user_id`, `rating`, `comment`, `created_at`) VALUES
(3, 8, 7, 5, 'Great book', '2024-11-28 23:14:44'),
(4, 9, 7, 5, 'Definitely worth the time!', '2024-11-29 07:10:38'),
(5, 14, 7, 4, 'peak fiction, finished this book in one sitting!', '2024-11-29 07:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('female','male') DEFAULT NULL,
  `pno` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `gender`, `pno`, `password`, `role`) VALUES
(4, 'patricia', 'patriciaappiah@gmail.com', 'male', '2147483647', '$2y$10$O3ZPFODqgiOxpFvjL17EPOsAWOG1Lgh8aQpjEZLJ6kJ80/.ZZfr1m', 'admin'),
(5, 'jobaby', 'joana.aba@ashesi.edu.gh', 'male', '2147483647', '$2y$10$kzMUvGL2UMnRzQFSVXuyO.cHG2MohoUcUYXxF4MDcOZx90j556zOW', 'customer'),
(6, 'lois', 'loismills@gmail.com', 'male', '2147483647', '$2y$10$kkNdi5e6hxQ3/7p21fE5feLgyP4Vcq9JNMvy21.Z8jtyOi8J2coMO', 'admin'),
(7, 'nanabaisie', 'nanab@gmail.com', 'male', '+23344556677', '$2y$10$SrRjE0X8uyteiJ2dpN/FKeYJmXk036J3jd.HKTKI3eFVSLWoSUc8O', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `user_id`, `book_id`, `added_at`) VALUES
(1, 7, 7, '2024-11-28 02:44:13'),
(4, 7, 13, '2024-11-28 05:34:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
