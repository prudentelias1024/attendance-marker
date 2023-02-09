-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 11:16 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_marker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Oracle_no` varchar(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Oracle_no`, `Name`, `Email`) VALUES
('Q1011', 'James Cardif', 'qwertu@gmail.com'),
('Q1011', 'James Cardif', 'qwertu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Oracle_no` varchar(6) NOT NULL,
  `Name` varchar(75) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Designation` varchar(30) NOT NULL,
  `Location` text NOT NULL,
  `Grade` int(2) NOT NULL,
  `Role` varchar(15) DEFAULT 'Member',
  `Training_Code` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Oracle_no`, `Name`, `Image`, `Email`, `Password`, `Designation`, `Location`, `Grade`, `Role`, `Training_Code`) VALUES
('AW1634', 'Olamide Kosoko', './uploads/Olamide Kosoko.jpg', 'work321@yahoo.com', '$2y$10$U2Se6la.tP6zyd.AZzMuO.qvypX.v6lHdqi4dcA54Z1EfX4q2QWwm', 'Full-Stack Developer', 'United Kingdom', 10, 'Member', ''),
('G2742', 'Vhikthors Davidsons', './uploads/Vhikthors Davidsons.jfif', 'qwerty12345@gmail.com', '$2y$10$gyq1rfu2aYDtW896PMMfWuPK7nf2LIRx/4Wt8sspkuzKzSx8WFtWm', 'Backend Developer', 'Apapa', 10, 'Member', ''),
('Q1010', 'Oladips Vhikthors', './uploads/Oladips Vhikthors.jpg', 'qwerty@gmail.com', '$2y$10$3nva9YNNRh6vnpc/EWoBc.ZdxWkJnT0QdlCe/KqVZAGiPrHICiru2', 'Web Developer', 'Marina ', 1, 'Member', ''),
('Q1011', 'James Cardiff', './uploads/James Cardiff.jfif', 'qwertu@gmail.com', '$2y$10$PEx4o2o9mXtiVkxITeapcOo.KaGW6H70/Aue19iwbGuWII431DsJe', 'Web Developer', 'Tincan', 1, 'Coordinator', ''),
('Z0121', 'Dikko Oladapo Chinedu', './uploads/Dikko Oladapo Chinedu.jfif', 'practice@gmail.com', '$2y$10$oG/mFIbExpZjn//jbGog/.9EGcz.r6E0gfal4xr6ji1NRVlAjq3ZW', 'Web Developer', 'Marina HQ', 10, 'Member', '');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE `enrolled` (
  `enrol_id` int(10) NOT NULL,
  `Oracle_no` varchar(6) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Training_Title` varchar(60) NOT NULL,
  `Training_Code` varchar(6) NOT NULL,
  `Training_Cordinator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`enrol_id`, `Oracle_no`, `Name`, `Training_Title`, `Training_Code`, `Training_Cordinator`) VALUES
(1, 'Q1010', 'Oladips Vhikthors', 'System Maintenance', 'T0002', 'James Cardiff'),
(3, 'G2742', 'Vhikthors Davidsons', 'System Maintenance', 'T0002', 'James Cardiff'),
(4, 'Z0121', 'Dikko Oladapo Chinedu', 'System Maintenance', 'T0002', 'James Cardiff'),
(5, 'AW1634', 'Olamide Kosoko', 'System Maintenance', 'T0002', 'James Cardiff');

-- --------------------------------------------------------

--
-- Table structure for table `t0002_01`
--

CREATE TABLE `t0002_01` (
  `Course_Coordinator` varchar(60) NOT NULL,
  `Name` varchar(75) NOT NULL,
  `Oracle_no` varchar(6) NOT NULL,
  `Attendance_Status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t0002_01`
--

INSERT INTO `t0002_01` (`Course_Coordinator`, `Name`, `Oracle_no`, `Attendance_Status`) VALUES
('James Cardiff', 'Olamide Kosoko', 'AW1634', 'Present'),
('James Cardiff', 'Vhikthors Davidsons', 'G2742', 'Present'),
('James Cardiff', 'Oladips Vhikthors', 'Q1010', 'Present'),
('James Cardiff', 'Dikko Oladapo Chinedu', 'Z0121', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `t0002_02`
--

CREATE TABLE `t0002_02` (
  `Course_Coordinator` varchar(60) NOT NULL,
  `Name` varchar(75) NOT NULL,
  `Oracle_No` varchar(6) NOT NULL,
  `Attendance_Status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `Training_Coordinator` varchar(50) NOT NULL,
  `Training_title` varchar(100) NOT NULL,
  `Training_Code` varchar(6) NOT NULL,
  `Training_Location` varchar(50) NOT NULL,
  `Training_Duration` varchar(10) NOT NULL,
  `Training_Endtime` varchar(10) NOT NULL,
  `Training_Time` varchar(25) NOT NULL,
  `Training_Day` varchar(14) NOT NULL,
  `Training_Startdate` varchar(60) NOT NULL,
  `Training_Enddate` varchar(60) NOT NULL,
  `No_Of_Classes` int(2) NOT NULL,
  `Class_Taken` int(2) DEFAULT 0,
  `Schedule` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`Training_Coordinator`, `Training_title`, `Training_Code`, `Training_Location`, `Training_Duration`, `Training_Endtime`, `Training_Time`, `Training_Day`, `Training_Startdate`, `Training_Enddate`, `No_Of_Classes`, `Class_Taken`, `Schedule`) VALUES
('James Cardiff', 'System Maintenance', 'T0002', 'Marina', '2 weeks', '18:00:00', '16:00:00', 'Tuesday', '2023-01-10', '2023-01-24', 2, 1, 'Weekly');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Oracle_no`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD PRIMARY KEY (`enrol_id`);

--
-- Indexes for table `t0002_01`
--
ALTER TABLE `t0002_01`
  ADD PRIMARY KEY (`Oracle_no`);

--
-- Indexes for table `t0002_02`
--
ALTER TABLE `t0002_02`
  ADD PRIMARY KEY (`Oracle_No`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`Training_title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrolled`
--
ALTER TABLE `enrolled`
  MODIFY `enrol_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
