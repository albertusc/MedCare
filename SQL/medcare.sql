-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 04:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `date`, `email`, `status`) VALUES
(14, '12345', '2023-12-14', 'al@gmail.com', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`_id`, `title`, `description`, `email`) VALUES
(1, 'albert', 'You ordered an Appointment', 'al@gmail.com'),
(2, '12', 'You ordered an Appointment', 'al@gmail.com'),
(3, 'albert', 'You ordered an Appointment', 'al@gmail.com'),
(4, 'albertus', 'You ordered an Appointment', 'al@gmail.com'),
(5, '12345', 'You ordered an Appointment', 'al@gmail.com'),
(6, '1234512', 'You ordered an Appointment', 'al@gmail.com'),
(7, '12345', 'You ordered an Appointment', 'al@gmail.com'),
(8, '12', 'You ordered an Appointment', 'al@gmail.com'),
(9, '12', 'You ordered an Appointment', 'al@gmail.com'),
(10, '12', 'You ordered an Appointment', 'al@gmail.com'),
(11, 'Ordered Room', 'You Just Ordered A Room', 'al@gmail.com'),
(12, 'Ordered Room', 'You Just Ordered A Room', 'al@gmail.com'),
(13, 'Order Obat', 'You just ordered obat_nyeri', 'user_email'),
(14, 'Order Obat', 'You just ordered obat_nyeri', 'al@gmail.com'),
(15, 'Appointment', 'You ordered an Appointment', 'al@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `totalRoom` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `totalRoom`, `email`) VALUES
(4, 'albert', 12, 'al@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Name`, `DateOfBirth`, `Address`, `PhoneNumber`, `Email`, `Password`) VALUES
(1, 'Albertus Christian Wahyu Atmaja', '2023-11-27', 'Jl. Taman Ubud Indah', '123456789', 'alchris428@gmail.com', '$2y$10$45HM08MVpuyIYZTQ/HRP5OfEZieWO9WiAFBdGoUiqpDdREo5KV3H2'),
(12, 'Albertus', '2007-11-26', '123 Address', '12345', '23@gmail.com', '$2y$10$8svVnwfGYOgRQYB6er8n/e/LRL30V88qYGgvW3OLB0oFO1YRvQJ/2'),
(13, 'albertus', '2001-11-26', '123 number', '123456789', '21@gmail.com', '$2y$10$Kw2aAttS.Q5HTHRMNVERYeeqDlaSemzYtbioqA3krwxSfTet2/fcu'),
(14, 'Albertus', '2004-11-26', '123 Lippo', '12345', '20@gmail.com', '$2y$10$7R0j3e7/8OMP8/B00UB5hOHQ32FdNB8aKQzcgHkrxxw0va.w/E.HO'),
(15, 'albert', '2023-11-26', '123', '123456', '2@gmail.com', '$2y$10$VJtNgivMF/sQHLa/PR0I0ODKBJkIGfSU0QiDzf12/4D2Z.Ag5kuoq'),
(16, 'Albertus', '2004-11-26', '123 Walk', '12345', 'al@gmail.com', '$2y$10$F.w8RFFYaDtc0AFsDcGpj.Kg7YzIcNjx4uKOAqn5ILu4kE9CHfov6'),
(18, 'Albertus', '0000-00-00', 'Lippo', '12345', 'Albert@medcare.com', '$2y$10$q459.zlcbt2Hv.H/9AzGEeiJklyMy2vuNDvAtF.jrz6U/NbolICcm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
