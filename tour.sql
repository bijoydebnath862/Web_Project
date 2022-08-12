-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2022 at 06:35 AM
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
  `address` varchar(55) NOT NULL,
  `verify_token` varchar(200) NOT NULL,
  `verify_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `name`, `email`, `password`, `mobile`, `address`, `verify_token`, `verify_status`) VALUES
(1, 'Bijoy', 'bijoy@gmail.com', '123', '1882864259', 'Road:2/A,Block:CD,Dhaka,Bangladesh', '60bf768587d4ea647fa1e19524c904bc', 1),
(2, 'Abid Tonmoy', 'tonmoy@gmail.com', '123', '01923846670', 'Alupotti,Rajshahi', '9ff38acf3a6e4a777b8a207db7b6ba87', 1),
(5, 'Amit', 'ashrafamit9227@gmail.com', '123', '123456', 'asdfg', '5f259ac8ed62f6956029ee5e2b62796e', 0);

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
(2, 'Sajek Valley', 'pq travels', 1, 4, '2022-08-24'),
(3, 'Bandarbans', 'AB travels', 1, 8, '2022-08-25'),
(4, 'Cox Bazar', 'pq travels', 1, 2, '2022-09-15'),
(5, 'Boga Lake', 'AB travels', 2, 10, '2022-08-31'),
(6, 'Cox Bazar', 'pq travels', 2, 2, '2022-08-16'),
(7, 'Boga Lake', 'AB travels', 1, 10, '2022-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(50) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `tg_id` int(50) NOT NULL,
  `package_price` int(50) NOT NULL,
  `package_image` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `tg_id`, `package_price`, `package_image`, `description`) VALUES
(1, 'Sajek', 1, 5000, 'image_0862022185751.jpg', 'Witness the true beauty of Rangamati hill tracts in Sajek valley with this tour. You will get a complete package that will cover:\n\nBreakfast, lunch, and dinner for 2 days\nAccomodation: Travelers will be allotted rooms in one of the following best resorts in Sajek: Chader Bari Resort, Bihan Resort, Nil Pahari Resort.\nTransportation costs during the tour.\nLocations that will cover in this tour are:\nKonglak para, \nSajek helipad, \nHorticulture Park (Hanging Bridge)/Risang Waterfalls'),
(2, 'Boga Lake', 1, 3500, 'image_0862022191451.jpeg', 'What you will see:\n Boga Lake,\n Chingri fountain,\nDarjeeling Para,\n Keokradong Hills.\n\nWhatever you get:\n\n1. 3 meals a day, including dinner on the morning of the 7th,\n\n2. Living in a hill house on a share basis,\n\n3. All transportation costs.\n\nWhich does not exist\n\nNo personal costs\n\n'),
(3, 'Cox Bazar', 1, 5000, 'image_0862022192012.jpg', 'TOUR PACKAGE SERVICE INCLUDES:\n\n1) All Standard / Deluxe accommodation on Twin Sharing basis as per itinerary\nAC / Non ac Transport / Ship / Local Transport / Boat / Trollar\nAll sightseeing, toll, tax and entry fees as per mentioned itinerary\nExperienced Guide\nTOUR PACKAGE SERVICE EXCLUDES:\n\nFood & Soft Drinks (let us know if you wish to include this)\nItems of personal nature and items not mentioned above.\n'),
(4, 'Shundarbans', 1, 7000, 'image_0862022192400.jpeg', 'INCLUSION IN SERVICES:\nTravel fair to Khulna (Bus)\nLodging in boat\nAll meals with one Bar-B-Q Dinner if preferred\nUnlimited Snacks & Coffee\nWell-trained Guide English spoken guide along with armed guard from forest office\nAll Govt. Taxes\nCountryboat to explore small canals and move in jungle in silence\nActivities like cultural program, fishing, travel Fisher Men’s  village etc. based on condition, time and availability'),
(5, 'Bandarbans', 1, 6500, 'image_0862022192727.jpeg', 'HIGHLIGHTS\r\n\r\n2 Days & 1 Night\r\nVisit Nilgiri, Chimbuk, Shoilopropat, Nilachol, Meghla & Sornomondir\r\nExperience tribal lifestyle and food menus\r\nDelicious local food from the restaurant\r\nEnjoy Chander Gari ride on hilly roads'),
(6, 'Saint Martin', 1, 7000, 'image_0862022194533.jpeg', 'TOUR PACKAGE SERVICE INCLUDES:\r\n\r\nAll Standard / Deluxe accommodation on Twin Sharing basis as per itinerary\r\nAC / Non ac Transport / Ship / Local Transport / Trollar\r\nAll sightseeing, toll, tax and entry fees as per mentioned itinerary\r\nExperienced guide\r\nTOUR PACKAGE SERVICE EXCLUDES:\r\n\r\nFood & Soft Drinks (let us know if you wish to include this)\r\nItems of personal nature and items not mentioned above.\r\n'),
(7, 'Sajek Valley', 2, 3000, 'image_0862022194945.jpeg', 'A complete package that will cover:\r\n\r\nBreakfast, lunch, and dinner for 2 days\r\nAccomodation: Travelers will be allotted rooms in one of the following best resorts in Sajek: Chader Bari Resort, Bihan Resort, Nil Pahari Resort.\r\nTransportation costs during the tour.\r\nLocations that will cover in this tour are:\r\nKonglak para, \r\nSajek helipad, \r\nHorticulture Park (Hanging Bridge)/Risang Waterfalls'),
(8, 'Boga Lake', 2, 4000, 'image_0862022195808.jpeg', 'In this Package the Places are:\r\n Boga Lake,\r\n Chingri fountain,\r\nDarjeeling Para,\r\n Keokradong Hills.\r\n\r\nWhatever you get:\r\n\r\n1. 3 meals a day, including dinner on the morning of the 7th,\r\n\r\n2. Living in a hill house on a share basis,\r\n\r\n3. All transportation costs.\r\n\r\nWhich does not exist\r\n\r\nNo personal costs\r\n'),
(9, 'Cox Bazar', 2, 4800, 'image_0862022200138.jpeg', 'TOUR PACKAGE SERVICE INCLUDES:\r\n\r\n1) All Standard / Deluxe accommodation on Twin Sharing basis as per itinerary\r\nAC / Non ac Transport / Ship / Local Transport / Boat / Trollar\r\nAll sightseeing, toll, tax and entry fees as per mentioned itinerary\r\nExperienced Guide.'),
(10, 'Shundarbans', 2, 7500, 'image_0862022200258.jpeg', 'INCLUSION IN SERVICES:\r\nTravel fair to Khulna (Bus)\r\nLodging in boat\r\nAll meals with one Bar-B-Q Dinner if preferred\r\nUnlimited Snacks & Coffee\r\nWell-trained Guide English spoken guide along with armed guard from forest office\r\nAll Govt. Taxes\r\nCountryboat to explore small canals and move in jungle in silence\r\nActivities like cultural program, fishing, travel Fisher Men’s  village etc. based on condition, time and availability');

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `issued_bookings`
--
ALTER TABLE `issued_bookings`
  MODIFY `s_no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trgrp`
--
ALTER TABLE `trgrp`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
