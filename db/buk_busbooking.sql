-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 01:40 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buk_busbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `id` int(30) NOT NULL,
  `schedule_id` int(30) NOT NULL,
  `ref_no` text NOT NULL,
  `name` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '1=Paid, 0- Unpaid',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `busName` varchar(50) NOT NULL,
  `busCap` int(30) NOT NULL,
  `busAvailableSpace` int(11) NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updateDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `busName`, `busCap`, `busAvailableSpace`, `creationDate`, `updateDate`) VALUES
(14, 'BUS 001', 15, 1, '2022-03-20 14:09:44', '2023-01-22 03:12:40'),
(15, 'BUS 002', 40, 2, '2022-03-20 14:09:57', '2023-01-22 03:56:14'),
(16, 'BUS 004', 3, 1, '2022-03-20 14:10:10', '2023-01-21 06:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `department` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL,
  `messageSubject` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `sendDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `department`, `level`, `messageSubject`, `message`, `sendDate`) VALUES
(2, 'Testing', '09017797709', 'fauz@gmail.', '300', 'Good service', 'Nice service.Thanks', '2023-01-21 05:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `terminalName` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updateDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `terminalName`, `address`, `creationDate`, `updateDate`) VALUES
(8, 'Main Campus', 'Tudun Wada', '2022-03-20 14:10:51', '0000-00-00 00:00:00'),
(9, 'CASSS Sabon Tasha', 'College Admin', '2022-03-20 14:11:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `orderID` varchar(30) NOT NULL,
  `std_name` varchar(30) NOT NULL,
  `location_from` varchar(50) NOT NULL,
  `location_to` varchar(50) NOT NULL,
  `bus_name` varchar(30) NOT NULL,
  `day` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `oderDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `userID`, `orderID`, `std_name`, `location_from`, `location_to`, `bus_name`, `day`, `time`, `oderDate`) VALUES
(37, 2, '6238E841A4C1B', 'Yunus Isah', 'CASSS Sabon Tasha', 'Main Campus', 'BUS 001', 'Tues', '7:00 am', '2022-03-21 22:04:01'),
(38, 2, '6238E84D255C8', 'Yunus Isah', 'Main Campus', 'CASSS Sabon Tasha', 'BUS 001', 'Mon', '7:00 am', '2022-03-21 22:04:13'),
(39, 2, '6238E8557D8EF', 'Yunus Isah', 'Main Campus', 'Main Campus', 'BUS 001', 'sun', '7:00 am', '2022-03-21 22:04:21'),
(40, 4, '63CB715DA1A00', 'Testing', 'Main Campus', 'Main Campus', 'BUS 004', 'Mon', '7:00 am', '2023-01-21 06:00:13'),
(41, 4, '63CC9B979BA9F', '', 'Main Campus', 'Main Campus', 'BUS 001', 'Tues', '7:00 am', '2023-01-22 03:12:39'),
(42, 4, '63CCA4B3CAE3F', 'Testing', 'Main Campus', 'Main Campus', 'BUS 002', 'Tues', '7:00 am', '2023-01-22 03:51:31'),
(43, 4, '63CCA5CEA9896', 'Testing', 'Main Campus', 'Main Campus', 'BUS 002', 'Wed', '1:30 pm', '2023-01-22 03:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `reg.No` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `level` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FullName`, `reg.No`, `email`, `phone`, `level`, `department`, `password`, `status`, `creation_date`, `update_date`) VALUES
(2, 'Yunus Isah', 'CST/17/IFT/00029', 'nasiru@gmail.com', '09033248408', '400', 'Information', '123', 1, '2022-03-09 16:30:35', '2023-01-21 02:23:10'),
(4, 'Testing', 'mm', 'musa@gmail.com', '090177977078', '300', 'fauz@gmail.', '12345', 0, '2022-03-09 21:44:00', '2023-01-25 00:00:41'),
(5, 'Ibrahim Mohammed', 'CST/COM/19/0001', 'musa@gmail.com', '08756727662', '1', 'Computer Science', '1234', 0, '2023-01-22 04:13:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `student_id`, `Amount`) VALUES
(1, 4, 2979),
(2, 5, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
