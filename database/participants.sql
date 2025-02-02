-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 02, 2025 at 12:55 PM
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
-- Database: `event-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(25) NOT NULL,
  `full_name` varchar(210) NOT NULL,
  `email` varchar(254) NOT NULL,
  `event_id` int(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `full_name`, `email`, `event_id`) VALUES
(6, 'Bijoy chandra', 'bijoy12@gmail.com', 1),
(7, 'David', 'david@gmail.com', 2),
(8, 'Anil Roy', 'anil@gmail.com', 5),
(9, 'Subrota Chandra', 'itsectorcommunication@gmail.com', 2),
(14, 'Subrota Chandra', 'itsectorcommunicatio3@gmail.com', 2),
(15, 'Subrota Chandra', 'itsectorcommunication3434@gmail.com', 1),
(16, 'Subrota Chandra', 'itsectorcommunication34@gmail.com', 1),
(18, 'David', 'david34@gmail.com', 2),
(19, 'Johan Doe', 'johan@gmail.com', 2),
(20, 'Subrota Chandra Sarker', 'subrota12@gmail.com', 6),
(25, 'Subrota Chandra', 'subrota122@gmail.com', 6),
(26, 'David', 'itsect@gmail.com', 5),
(27, 'Anil Roy', 'anil33@gmail.com', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
