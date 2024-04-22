-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 03:49 AM
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
(21, 'Hiace A350', 25, 1, '2023-05-06 19:15:17', '2023-06-13 11:51:43'),
(22, 'Marcopolo 2', 168, 1, '2023-05-06 19:15:26', '2023-06-06 13:56:37'),
(23, 'White Costa', 100, 0, '2023-05-06 19:15:52', '0000-00-00 00:00:00'),
(24, 'Hiace B550', 50, 0, '2023-06-13 11:30:27', '0000-00-00 00:00:00');

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
(4, 'sani musa', '0901111111', 'Arabic', '4', 'time constrients', 'i wish you would improve more...', '2023-05-06 14:30:15'),
(5, 'Master', '090222222', 'Arabic', '4', 'payment', 'i wish you success', '2023-05-06 19:07:05'),
(6, 'Hamza Usman', '07011111111', 'Information Technology', '3', 'Complaint', 'i wish you can improve more', '2023-06-13 11:47:35');

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
(11, 'New Campus', 'Gwarzo Road', '2023-05-06 19:13:27', '0000-00-00 00:00:00'),
(12, 'Old Campus', 'BUK Road', '2023-05-06 19:14:11', '0000-00-00 00:00:00');

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
(43, 4, '63CCA5CEA9896', 'Testing', 'Main Campus', 'Main Campus', 'BUS 002', 'Wed', '1:30 pm', '2023-01-22 03:56:14'),
(44, 9, '6456C7C0DD9E4', 'sani musa', 'Old Campus', 'Old Campus', 'BUS 001', 'Fri', '7:00 am', '2023-05-06 14:33:52'),
(45, 9, '6456C8620D143', 'sani musa', 'Old Campus', 'Old Campus', 'BUS 001', 'Tues', '7:00 am', '2023-05-06 14:36:34'),
(46, 10, '64570838CFBE9', 'Master', 'Old Campus', 'Old Campus', 'BUS 001', 'Mon', '7:00 am', '2023-05-06 19:08:56'),
(47, 8, '645EBA6ED8E94', 'munazzir', 'New Campus', 'Old Campus', 'Marcopolo 1', '2023-05-24', '20:14', '2023-05-12 15:15:10'),
(48, 8, '647F9D84CB324', 'munazzir', 'New Campus', 'Old Campus', 'Marcopolo 2', '2023-06-13', '04:59', '2023-06-06 13:56:36'),
(49, 11, '6487B6BED373E', 'usman', 'New Campus', 'Old Campus', 'Marcopolo 1', '2023-06-14', '07:30', '2023-06-12 17:22:22'),
(50, 13, '6488BABF8C0E6', 'Hamza Usman', 'New Campus', 'Old Campus', 'Hiace A350', '2023-06-05', '14:54', '2023-06-13 11:51:43');

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
(2, 'Yunus Isah', 'CST/17/IFT/00029', 'elnas@gmail.com', '09033248408', '400', 'Information', '12345', 1, '2022-03-09 16:30:35', '2023-05-04 15:19:23'),
(5, 'Ibrahim Mohammed', 'CST/COM/19/0001', 'musa@gmail.com', '08756727662', '1', 'Computer Science', '1234', 0, '2023-01-22 04:13:24', '0000-00-00 00:00:00'),
(6, 'Nasiru', 'CST/COM/17/0001', 'nasiru@gmail.com', '0906756456', '4', 'Computer Science', '123', 0, '2023-05-04 15:27:48', '0000-00-00 00:00:00'),
(7, 'Bala Sani', 'Fgs/rrt/vt/0998', 'fdb@buk.edu.ng', '09053738532', '3', 'Arabic', '4321', 0, '2023-05-04 17:11:06', '0000-00-00 00:00:00'),
(8, 'munazzir', 'CST/COM/17/0012', 'nazz@gmail', '09099999999', '4', 'Computer Science', '123', 0, '2023-05-05 15:07:25', '0000-00-00 00:00:00'),
(9, 'sani musa', 'fgc/12/com/01023', 'sani@gmail.com', '0901111111', '4', 'Arabic', '123', 0, '2023-05-06 14:28:39', '0000-00-00 00:00:00'),
(10, 'Master', 'CST/COM/111', 'master@gmail.com', '090222222', '4', 'Arabic', '123', 0, '2023-05-06 19:05:05', '0000-00-00 00:00:00'),
(11, 'usman', 'CST/COM/18/0015', 'usman@yahoo.com', '07033333333', '2', 'arabic', '12345', 0, '2023-06-12 17:20:25', '0000-00-00 00:00:00'),
(12, 'haruna usman', 'sst/17/com/01023', 'haruna@gmail.com', '0702222222', '4', 'Arabic', '123', 0, '2023-06-13 11:17:52', '0000-00-00 00:00:00'),
(13, 'Hamza Usman', 'CST/18/IFT/002', 'hamzausman311@yahoo.com', '07011111111', '3', 'Information Technology', '123', 0, '2023-06-13 11:46:28', '0000-00-00 00:00:00');

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
(2, 5, 0),
(3, 6, 90),
(4, 8, 1300),
(5, 9, 950),
(6, 10, 950),
(7, 13, 50);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
