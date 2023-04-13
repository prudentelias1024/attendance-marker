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
CREATE DATABASE attendance_marker;
USE  attendance_marker;
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
  `Oracle_no` varchar(5) NOT NULL PRIMARY KEY,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Oracle_no`, `Name`, `Email`) VALUES
('Q1011', 'James Cardif', 'qwertu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--


CREATE TABLE `employee` (
  `Oracle_no` varchar(6) NOT NULL PRIMARY KEY,
  `Name` varchar(75) NOT NULL,
  `Username` varchar(60) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `PN` varchar(5) NOT NULL,
  `Designation` varchar(30) NOT NULL,
  `Position` varchar(30) NOT NULL,
  `Location` text NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Grade` int(2) NOT NULL,
  `Role` varchar(15) DEFAULT 'Member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Oracle_no`, `Name`, `Username`, `Image`, `Email`, `PN`, `Designation`, `Position`, `Location`, `Department`, `Grade`, `Role`) VALUES
('AW1634', 'Olamide Kosoko', 'o.kosoko', './uploads/Olamide Kosoko.jpg', 'work321@yahoo.com', 'AW163', 'Full-Stack Developer', 'Senior Manager', 'United Kingdom', 'Performance', 10, 'Member'),
('G2742', 'Vhikthors Davidsons', 'v.davidsons', './uploads/Vhikthors Davidsons.jfif', 'qwerty12345@gmail.com', 'G2742', 'Backend Developer', 'Principal Manager', 'Apapa', 'Audit', 10, 'Member'),
('Q1010', 'Oladips Vhikthors', 'o.vhikthors', './uploads/Oladips Vhikthors.jpg', 'qwerty@gmail.com', 'Q1010', 'Web Developer', 'General Manager', 'Marina ', 'ICT', 1, 'Coordinator'),
('Q1011', 'James Cardiff', 'j.cardiff', './uploads/James Cardiff.jfif', 'qwertu@gmail.com', 'Q1011', 'Web Developer', 'Assistant General Manager', 'Tincan', 'Corporate and Strategic Planning', 1, 'Coordinator'),
('Z0121', 'Dikko Oladapo Chinedu', 'd.oladdapo', './uploads/Dikko Oladapo Chinedu.jfif', 'practice@gmail.com', 'Z0121', 'Web Developer', 'Senior Manager', 'Marina HQ', 'SA&DM', 10, 'Member');

--
-- Dumping data for table `employee`

--
-- Table structure for table `enrolled`
--

CREATE TABLE `joined` (
  `enrol_id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Oracle_no` varchar(6) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Meeting_Title` varchar(60) NOT NULL,
  `Meeting_Code` varchar(6) NOT NULL,
  `Meeting_Cordinator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `joined` (`enrol_id`, `Oracle_no`, `Name`, `Meeting_Title`, `Meeting_Code`, `Meeting_Cordinator`) VALUES
(1, 'Q1010', 'Oladips Vhikthors', 'Launching of Vector Software', 'M0002', 'James Cardiff'),
(3, 'G2742', 'Vhikthors Davidsons', 'Launching of Vector Software', 'M0002', 'James Cardiff'),
(4, 'Z0121', 'Dikko Oladapo Chinedu', 'Launching of Vector Software', 'M0002', 'James Cardiff'),
(5, 'AW1634', 'Olamide Kosoko', 'Launching of Vector Software', 'M0002', 'James Cardiff');

-- --------------------------------------------------------

--
-- Table structure for table `t0002_01`
--

CREATE TABLE `m0002_01` (
  `Meeting_Coordinator` varchar(60) NOT NULL,
  `Name` varchar(75) NOT NULL,
  `Oracle_no` varchar(6) NOT NULL PRIMARY KEY,
  `Attendance_Status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t0002_01`
--

INSERT INTO `m0002_01` (`Meeting_Coordinator`, `Name`, `Oracle_no`, `Attendance_Status`) VALUES
('James Cardiff', 'Olamide Kosoko', 'AW1634', 'Present'),
('James Cardiff', 'Vhikthors Davidsons', 'G2742', 'Present'),
('James Cardiff', 'Oladips Vhikthors', 'Q1010', 'Present'),
('James Cardiff', 'Dikko Oladapo Chinedu', 'Z0121', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `t0002_02`
--

CREATE TABLE `m0002_02` (
  `Meeting_Coordinator` varchar(60) NOT NULL,
  `Name` varchar(75) NOT NULL,
  `Oracle_No` varchar(6) NOT NULL PRIMARY KEY,
  `Attendance_Status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Meetings`
--

CREATE TABLE `meetings` (
  `Meeting_Coordinator` varchar(50) NOT NULL,
  `Meeting_title` varchar(100) NOT NULL,
  `Meeting_Code` varchar(6) NOT NULL PRIMARY KEY,
  `Meeting_Location` varchar(50) NOT NULL,
  `Meeting_Duration` varchar(10) NOT NULL,
  `Meeting_Endtime` varchar(10) NOT NULL,
  `Meeting_Time` varchar(25) NOT NULL,
  `Meeting_Day` varchar(14) NOT NULL,
  `Meeting_Startdate` varchar(60) NOT NULL,
  `Meeting_Enddate` varchar(60) NOT NULL,
  `No_Of_Meetings` int(2) NOT NULL,
  `Meeting_Taken` int(2) DEFAULT 0,
  `Schedule` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Meetings`
--

INSERT INTO `Meetings` (`Meeting_Coordinator`, `Meeting_title`, `Meeting_Code`, `Meeting_Location`, `Meeting_Duration`, `Meeting_Endtime`, `Meeting_Time`, `Meeting_Day`, `Meeting_Startdate`, `Meeting_Enddate`, `No_Of_Meetings`, `Meeting_Taken`, `Schedule`) VALUES
('James Cardiff', 'Launching of Vector Software', 'M0001', 'Marina', '1 week', '18:00:00', '16:00:00', 'Wednesday', '2023-04-10', '2023-04-17', 7, 0, 'Daily');

INSERT INTO `Meetings` (`Meeting_Coordinator`, `Meeting_title`, `Meeting_Code`, `Meeting_Location`, `Meeting_Duration`, `Meeting_Endtime`, `Meeting_Time`, `Meeting_Day`, `Meeting_Startdate`, `Meeting_Enddate`, `No_Of_Meetings`, `Meeting_Taken`, `Schedule`) VALUES
('Olamide Kosoko', 'Launching of Visitor Management System', 'M0002', 'Marina', '3 weeks', '18:00:00', '16:00:00', 'Tuesday', '2023-04-10', '2023-04-24', 3, 0, 'Weekly');

--
-- Indexes for dumped tables
--

--
-- --
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrolled`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
