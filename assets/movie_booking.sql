-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2026 at 09:49 AM
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
-- Database: `movie_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `seat_class` varchar(50) NOT NULL,
  `seat_numbers` varchar(255) NOT NULL,
  `tickets` int(11) NOT NULL,
  `kids_tickets` int(11) DEFAULT 0,
  `total_amount` decimal(10,2) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `show_time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `show_id`, `seat_class`, `seat_numbers`, `tickets`, `kids_tickets`, `total_amount`, `booking_date`, `show_time`) VALUES
(1, 1, 1, 'Platinum', 'A3,B3', 1, 0, 1200.00, '2026-03-25 04:48:00', NULL),
(2, 1, 4, 'Gold', 'B1', 1, 2, 2000.00, '2026-03-25 09:18:32', '06:00 PM'),
(3, 1, 5, 'Gold', 'A2,A1', 1, 1, 1425.00, '2026-03-30 06:37:37', '03:00 PM'),
(4, 2, 4, 'Gold', 'A1,A2', 1, 1, 1500.00, '2026-03-30 06:40:15', '03:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `poster` varchar(255) NOT NULL,
  `trailer_link` varchar(255) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `genre`, `duration`, `language`, `rating`, `description`, `poster`, `trailer_link`, `release_date`, `created_at`) VALUES
(1, 'Avengers Endgame', 'Action / Sci-Fi', '3h 1m', 'English', '8.4', 'Epic superhero finale packed with action and emotion.', 'https://image.tmdb.org/t/p/original/or06FN3Dka5tukK1e9sl16pB3iy.jpg', 'https://www.youtube.com/watch?v=TcMBFSGVi1c', '2019-04-26', '2026-03-25 04:23:00'),
(2, 'Spider-Man No Way Home', 'Action / Adventure', '2h 28m', 'English', '8.2', 'Spider-Man faces multiverse chaos in this blockbuster hit.', 'https://image.tmdb.org/t/p/original/1g0dhYtq4irTY1GPXvft6k4YLjm.jpg', 'https://www.youtube.com/watch?v=JfVOs4VSpmA', '2021-12-17', '2026-03-25 04:23:00'),
(3, 'The Batman', 'Action / Crime', '2h 56m', 'English', '7.9', 'Dark and stylish detective story of Gotham’s hero.', 'https://image.tmdb.org/t/p/original/74xTEgt7R36Fpooo50r9T25onhq.jpg', 'https://www.youtube.com/watch?v=mqqft2x_Aa4', '2022-03-04', '2026-03-25 04:23:00'),
(4, 'Dune Part Two', 'Sci-Fi / Adventure', '2h 46m', 'English', '8.5', 'Paul Atreides unites with the Fremen while seeking revenge and destiny on Arrakis.', 'https://image.tmdb.org/t/p/original/8b8R8l88Qje9dn9OE8PY05Nxl1X.jpg', 'https://www.youtube.com/watch?v=Way9Dexny3w', '2024-03-01', '2026-03-25 04:23:00'),
(5, 'Oppenheimer', 'Drama / History', '3h 0m', 'English', '8.6', 'A gripping story about the life of J. Robert Oppenheimer and the creation of the atomic bomb.', 'https://image.tmdb.org/t/p/original/ptpr0kGAckfQkJeJIt8st5dglvd.jpg', 'https://www.youtube.com/watch?v=uYPbbksJxIg', '2023-07-21', '2026-03-25 04:23:00'),
(11, 'jawan', 'Drama / History', '2h 46m', 'hindi', '8.5', ' A man fights against corruption with powerful action and emotion.', 'https://image.tmdb.org/t/p/original/jFt1gS4BGHlK8xt76Y81Alp4dbt.jpg', ' https://www.youtube.com/watch?v=MWOlnZSnXJo', NULL, '2026-03-27 07:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `show_date` date NOT NULL,
  `show_time` varchar(50) NOT NULL,
  `gold_price` decimal(10,2) NOT NULL,
  `platinum_price` decimal(10,2) NOT NULL,
  `box_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `movie_id`, `theater_id`, `show_date`, `show_time`, `gold_price`, `platinum_price`, `box_price`) VALUES
(1, 1, 1, '2026-03-20', '03:00 PM', 800.00, 1200.00, 1800.00),
(2, 2, 2, '2026-03-21', '06:00 PM', 900.00, 1300.00, 1900.00),
(3, 3, 3, '2026-03-22', '09:00 PM', 850.00, 1250.00, 1850.00),
(4, 4, 1, '2026-03-23', '05:00 PM', 1000.00, 1400.00, 2000.00),
(5, 5, 2, '2026-03-24', '08:00 PM', 950.00, 1350.00, 1950.00),
(6, 11, 2, '2026-03-27', '12:00pm', 400.00, 700.00, 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `theaters`
--

CREATE TABLE `theaters` (
  `id` int(11) NOT NULL,
  `theater_name` varchar(120) NOT NULL,
  `location` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theaters`
--

INSERT INTO `theaters` (`id`, `theater_name`, `location`, `created_at`) VALUES
(1, 'CinePax Karachi', 'Karachi', '2026-03-25 04:23:00'),
(2, 'Super Cinema Lahore', 'Lahore', '2026-03-25 04:23:00'),
(3, 'Arena Islamabad', 'Islamabad', '2026-03-25 04:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `created_at`) VALUES
(1, 'Muhammad Usman', 'muhammadusman09858@gmail.com', '03152724554', '$2y$10$6PF7Gmy72Jx.7uT4PZ1jEeQniU6AUxgua9ubgcE6OVXZxFUfZL4km', '2026-03-25 04:25:37'),
(2, 'Muhammad Usman', 'muhammadusman0985@gmail.com', '0383877273', '$2y$10$MLsBN6dcrzR4.EDwMoAwXeUD/zfuPGib.NxNFXDkJzYVZVZ1Aga7a', '2026-03-30 06:39:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `show_id` (`show_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `theater_id` (`theater_id`);

--
-- Indexes for table `theaters`
--
ALTER TABLE `theaters`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `theaters`
--
ALTER TABLE `theaters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shows_ibfk_2` FOREIGN KEY (`theater_id`) REFERENCES `theaters` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
