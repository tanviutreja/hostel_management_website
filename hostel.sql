-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 12:10 PM
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
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sno` int(11) NOT NULL,
  `nameid` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `pwd` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sno`, `nameid`, `email`, `designation`, `pwd`) VALUES
(1, 'Vandana', 'Vandana@gmail.com', 'Warden', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `lid` int(11) NOT NULL,
  `enrollment_id` int(11) NOT NULL,
  `permission` varchar(10) NOT NULL,
  `pcontact` int(11) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `depart` date NOT NULL,
  `arrive` date NOT NULL,
  `address_to` varchar(250) NOT NULL,
  `approve` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`lid`, `enrollment_id`, `permission`, `pcontact`, `reason`, `depart`, `arrive`, `address_to`, `approve`) VALUES
(1, 221030037, 'yes', 2147483647, 'Visit Home', '2024-05-17', '2024-05-20', 'shimla', 1),
(2, 221030024, 'yes', 2147483647, 'sem break', '2024-05-23', '2024-05-31', 'dwarka delhi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `nid` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `detail` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`nid`, `topic`, `detail`) VALUES
(1, 'Room cleaning days', 'Rooms of boys will be cleaned on Monday and Saturday and of girls will be cleaned on Sunday and Wednesday. '),
(6, 'water dispenser', 'water dispenser on -3 is broken, i request everyone to use the water dispenser on -4');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `rid` int(11) NOT NULL,
  `enrollment_id` int(11) NOT NULL,
  `cgpa` varchar(5) NOT NULL,
  `accomodation` varchar(20) NOT NULL,
  `disability` varchar(10) NOT NULL,
  `requirement` varchar(350) NOT NULL,
  `roomno` varchar(11) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`rid`, `enrollment_id`, `cgpa`, `accomodation`, `disability`, `requirement`, `roomno`) VALUES
(2, 221030037, '9.01', 'double', 'no', 'need balcony,sunlight', 'A-7'),
(3, 221030024, '9', 'double', 'no', 'Good roomate,soft mattress', 'A-7'),
(4, 221030039, '9.7', 'double', 'no', 'frequent cold so need a cozy room ', 'B-1');

-- --------------------------------------------------------

--
-- Table structure for table `room_detail`
--

CREATE TABLE `room_detail` (
  `roomid` int(11) NOT NULL,
  `rid` int(11) DEFAULT NULL,
  `hostelno` int(11) NOT NULL,
  `block` char(1) NOT NULL,
  `floor` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `accomodation` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_detail`
--

INSERT INTO `room_detail` (`roomid`, `rid`, `hostelno`, `block`, `floor`, `room_number`, `accomodation`) VALUES
(1, 3, 12, 'A', -5, 7, 'double'),
(2, 2, 12, 'A', -5, 7, 'double'),
(3, 4, 10, 'B', -5, 1, 'double'),
(4, NULL, 10, 'C', 3, 103, 'triple'),
(5, NULL, 10, 'C', 3, 103, 'triple'),
(6, NULL, 10, 'C', 3, 103, 'triple'),
(7, NULL, 10, 'B', -5, 1, 'double'),
(8, NULL, 11, 'C', -4, 14, 'double'),
(9, NULL, 11, 'C', -4, 14, 'double'),
(10, NULL, 12, 'B', -1, 24, 'double'),
(11, NULL, 12, 'B', -1, 24, 'double'),
(12, NULL, 11, 'E', -1, 11, 'double'),
(13, NULL, 11, 'E', -1, 11, 'double');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `sid` int(11) NOT NULL,
  `topic` varchar(250) NOT NULL,
  `suggest` varchar(350) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`sid`, `topic`, `suggest`, `done`) VALUES
(1, 'Too many insects in the room', 'Our room c37 needs pesticide spray .We will be free on Mondaya after 5pm', 1),
(2, 'Room Cleaning Service', 'It is to inform you that Aunty did not clean the room on the assigned day', 1),
(3, 'maggi', 'dont use maggi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sno` int(11) NOT NULL,
  `sname` varchar(200) NOT NULL,
  `enrollment` int(7) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `contact` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `father` varchar(200) NOT NULL,
  `mother` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pwd` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sno`, `sname`, `enrollment`, `branch`, `year`, `contact`, `gender`, `father`, `mother`, `email`, `address`, `pwd`) VALUES
(2, 'tanvi ', 221030037, 'cse', '2022', 2147483647, 'female', 'Pardeep', 'Kavita', 'aaditya8008@gmail.com', 'shimla', '12345'),
(3, 'priyanshi jain', 221030024, 'cse', '2022', 2147483647, 'female', 'rajesh jain', 'anjali jain', 'prij@gmail.com', 'dwarka delhi', 'abc123'),
(5, 'Aaditya', 221030039, 'cse', '2022', 2147483647, 'male', 'Ram', 'Sita', 'aaditya@gmail.com', 'Mandi', '12345'),
(6, 'Srishti', 221030061, 'cse', '2022', 2147483647, 'female', 'Anil ', 'Anita', '221030061@juitsolan.in', 'Delhi', '54321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `user_to_leave` (`enrollment_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `user_to_room` (`enrollment_id`);

--
-- Indexes for table `room_detail`
--
ALTER TABLE `room_detail`
  ADD PRIMARY KEY (`roomid`),
  ADD KEY `room_request` (`rid`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `enrollment` (`enrollment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_detail`
--
ALTER TABLE `room_detail`
  MODIFY `roomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leave`
--
ALTER TABLE `leave`
  ADD CONSTRAINT `user_to_leave` FOREIGN KEY (`enrollment_id`) REFERENCES `user` (`enrollment`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `user_to_room` FOREIGN KEY (`enrollment_id`) REFERENCES `user` (`enrollment`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_detail`
--
ALTER TABLE `room_detail`
  ADD CONSTRAINT `room_request` FOREIGN KEY (`rid`) REFERENCES `room` (`rid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
