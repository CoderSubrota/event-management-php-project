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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(22) NOT NULL,
  `full_name` varchar(210) NOT NULL,
  `email` varchar(254) NOT NULL,
  `user_password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `user_password`) VALUES
(1, 'Subrota Chandra Sarker', 'subrota12@gmail.com', '$2y$10$XVEAMWnVgHzaDEUgAh1wZ.V9MR/6jUeAtwoVb3Ckr2Etokv.tCgNa'),
(2, 'Khirstal David', 'davidkrish22@gmail.com', '$2y$10$u1kYyzGJKYjzSbnN3KyqK.zNFBdGexrOcRkMNTfV/6s/4wdXK.tLW'),
(3, 'Subrota Chandra', 'itsectorcommunication@gmail.com', '$2y$10$pvzFFeXCwSEorWk/DptGTukoCLq7sjP.0.cDyGVIWyyNceIUidDwC'),
(4, 'Bijoy chandra', 'subrota45278@gmail.com', '$2y$10$aVy7fK59QA8hs1MTuaW.YeuGO7RDIzw9upsgeailJAqLJD4yY/ncm'),
(5, 'Anil Roy', 'anil12@gmail.com', '$2y$10$gtDZlkwB9Jir4MASJ013q.KT3T37vsRk5iy9gHK8oGifYjeVy.3by');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
