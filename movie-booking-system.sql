-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2025 at 04:54 AM
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
-- Database: `movie-booking-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `seat_id` int(11) NOT NULL,
  `booking_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('confirmed','cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345678'),
(2, 'haris', 'haris121');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL,
  `language` varchar(50) NOT NULL,
  `release_date` date NOT NULL,
  `rating` decimal(2,0) NOT NULL,
  `poster_url` varchar(500) DEFAULT '\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `genre`, `duration`, `language`, `release_date`, `rating`, `poster_url`) VALUES
(7, 'parwaaz hai junoon', 'Airforce', 220, 'english', '2025-11-26', 9, NULL),
(9, 'jannan', 'Action', 110, 'Urdu', '2025-12-02', 4, '\r\n'),
(10, 'tari mari khani', 'love', 120, 'Urdu', '2026-11-12', 7, '\r\n'),
(11, 'Love Guru', 'Love', 110, 'Urdu', '2026-01-02', 6, '\r\n'),
(12, 'Azadi', 'Action', 150, 'Urdu', '2026-01-06', 10, '\r\n'),
(13, 'Maula Jutt', 'Action', 125, 'Urdu', '2025-12-10', 8, '\r\n'),
(14, 'Quaid-e-Azam ZINDABAD', 'Story', 220, 'Urdu', '2025-12-15', 5, '\r\n'),
(15, 'Parwaz', 'Airforce', 111, 'Urdu', '2025-12-20', 10, '\r\n'),
(17, 'movie', 'drama', 120, 'Urdu', '2025-12-18', 9, 'uploads/movies/1764900550_azaadi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

CREATE TABLE `screens` (
  `screen_id` int(11) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `screen_name` varchar(50) NOT NULL,
  `total_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`screen_id`, `theater_id`, `screen_name`, `total_seats`) VALUES
(1, 1, 'scrren-1', 150);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seat_id` int(11) NOT NULL,
  `screen_id` int(11) DEFAULT NULL,
  `seat_number` varchar(10) NOT NULL,
  `status` enum('available','booked') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `showtime`
--

CREATE TABLE `showtime` (
  `show_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `show_date` date NOT NULL,
  `show_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `showtime`
--

INSERT INTO `showtime` (`show_id`, `movie_id`, `screen_id`, `show_date`, `show_time`) VALUES
(1, 5, 1, '2025-11-20', '00:00:00'),
(2, 7, 1, '2025-12-16', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `theaters`
--

CREATE TABLE `theaters` (
  `theater_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `poster_url` varchar(500) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theaters`
--

INSERT INTO `theaters` (`theater_id`, `name`, `location`, `contact`, `poster_url`) VALUES
(1, 'haris', 'malir', '908356731', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `created_at`) VALUES
(1, 'haris', 'admin@solutionhub.com', '$2y$10$BvH814HvGKGnGXvXzfWuluOOxRvVMi.Y/sN9NagvRk5', 2147483647, '2025-11-26 02:34:21'),
(2, 'azan', 'azan@gmail.com', '$2y$10$PG.po07QLOH.J2QIeYQOlOVU./84Od08vqTq97PbV4y', 12345689, '2025-11-26 02:34:21'),
(3, 'laiba', 'laiba@gmail.com', '$2y$10$8oIG.4lGC5Ur0vceK6cf7Oa2aiEjS73OswkZgNsGq3P', 2147483647, '2025-11-26 02:34:21'),
(4, 'ali', 'ali@gmail.com', '111222333', 123456789, '2025-12-01 21:25:22'),
(5, 'fahad', 'fahad@gmail.com', '$2y$10$KllNWaGRIKbuvyQ5JJZAuedpkSr.S6cXHj1wXsVMkLW', 12345689, '2025-12-01 21:29:43'),
(6, 'abdullah', 'abd@gmail.com', '$2y$10$stHYqTiok1ViwLiPDrt0oubmJSSFfz6iDgfYFY1AKQm', 12345689, '2025-12-03 00:15:16'),
(7, 'hassan', 'hassan@gmail.com', '$2y$10$PpVMga5MuOEtPeRiU9hty.CMxhANvFwsbfVBru4JJHI', 2147483647, '2025-12-03 00:55:37'),
(8, 'shawwal', 'shawwal@gmail.com', '$2y$10$kvuGEnKI3W7TgWA.eGlaWuaEnktnIuBIbDvMLLii6DU', 12345689, '2025-12-05 02:10:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`screen_id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `screen_id` (`screen_id`);

--
-- Indexes for table `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`show_id`);

--
-- Indexes for table `theaters`
--
ALTER TABLE `theaters`
  ADD PRIMARY KEY (`theater_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `screens`
--
ALTER TABLE `screens`
  MODIFY `screen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `showtime`
--
ALTER TABLE `showtime`
  MODIFY `show_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `theaters`
--
ALTER TABLE `theaters`
  MODIFY `theater_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`screen_id`) REFERENCES `screens` (`screen_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
