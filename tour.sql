-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2022 at 08:03 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '01323846782');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `name`, `email`, `password`, `mobile`, `address`) VALUES
(1, 'abc', 'abc@gmail.com', '123', '1882864259', 'Road:2/A,Block:CD,Dhaka,Bangladesh'),
(2, 'Abid Tonmoy', 'tonmoy@gmail.com', '123', '01923846670', 'Alupotti,Rajshahi');

-- --------------------------------------------------------

--
-- Table structure for table `issued_bookings`
--

CREATE TABLE `issued_bookings` (
  `s_no` int(50) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `tg` varchar(50) NOT NULL,
  `guest_id` int(50) NOT NULL,
  `status` int(50) NOT NULL,
  `issue_date` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issued_bookings`
--

INSERT INTO `issued_bookings` (`s_no`, `package_name`, `tg`, `guest_id`, `status`, `issue_date`) VALUES
(3, 'ab', 'AB travels', 2, 2, '20-11-2022'),
(4, 'Saint Martin', 'pq travels', 2, 3, '2022-07-19'),
(5, 'Bandarbans', 'pq travels', 2, 8, '2022-07-17'),
(10, 'Saint Martin', 'pq travels', 2, 3, '2022-07-18'),
(11, 'ab', 'AB travels', 2, 4, '2022-09-17'),
(12, 'Coxs Bazar', 'AB travels', 2, 10, '2022-07-22'),
(13, 'Bandarbans', 'pq travels', 2, 1, '2022-09-30'),
(14, 'Coxs Bazar', 'AB travels', 2, 3, '2022-09-23'),
(15, 'Bandarbans', 'AB travels', 1, 7, '2022-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(50) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `tg_id` int(50) NOT NULL,
  `package_price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `tg_id`, `package_price`) VALUES
(1, 'Bandarbans', 1, 3500),
(3, 'Saint Martin', 1, 3900),
(4, 'Shundarbans', 1, 9000),
(5, 'Bandarbans', 2, 4300),
(7, 'Coxs Bazar', 1, 4300),
(8, 'Coxs Bazar', 2, 5500),
(9, 'Shundarbans', 2, 7500);

-- --------------------------------------------------------

--
-- Table structure for table `trgrp`
--

CREATE TABLE `trgrp` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trgrp`
--

INSERT INTO `trgrp` (`id`, `name`, `email`, `password`, `mobile`, `address`) VALUES
(1, 'AB travels', 'AB@gmail.com', '12', '1726253830', 'Ghosh para, Rajshahi'),
(2, 'pq travels', 'pq@gmail.com', 'pq', '01835263840', 'Rani Bazar,Rajshahi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issued_bookings`
--
ALTER TABLE `issued_bookings`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `trgrp`
--
ALTER TABLE `trgrp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `issued_bookings`
--
ALTER TABLE `issued_bookings`
  MODIFY `s_no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trgrp`
--
ALTER TABLE `trgrp`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
