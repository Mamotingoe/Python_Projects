-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 06:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`email`, `password`) VALUES
('admin@gmail.com', '123'),
('admin1@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `coursetable`
--

CREATE TABLE `coursetable` (
  `course_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_limit` int(200) NOT NULL,
  `seat_available` int(200) NOT NULL,
  `tuitionfee` int(200) NOT NULL,
  `examfee` int(200) NOT NULL,
  `totalfee` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coursetable`
--

INSERT INTO `coursetable` (`course_id`, `semester`, `course_name`, `seat_limit`, `seat_available`, `tuitionfee`, `examfee`, `totalfee`) VALUES
('1', '1st', 'ACADEMIC LITERACY DEVELOPMENT ALDE 1 22', 3, 2, 100, 100, 0),
('10', '2nd', 'CALCULUS & LINEAR ALGEBRA & PROBABILITY & INFERENCE', 3, 2, 2000, 1000, 0),
('11', '2nd', 'COMPUTER ORGANIZATION AND ARCHITECTURE', 3, 2, 4000, 1000, 0),
('12', '2nd', 'CRITICAL AND ANALYTICAL THINKING', 3, 2, 2000, 1000, 0),
('13', '2nd', 'ELECTRONIC BUSINESS INFS 2 21', 3, 2, 4000, 1000, 0),
('14', '2nd', 'EXTENSION OF CRITICAL AND ANALYTICAL THINKING ECAT 1 21', 3, 2, 4000, 1000, 0),
('15', '2nd', 'INTRODUCTION TO MACROECONOMICS ECON 1 22', 3, 2, 4000, 1000, 0),
('16', '2nd', 'INTRODUCTION TO DATABASES INFS 2 22', 3, 2, 4000, 1000, 0),
('17', '3rd', 'FINANCIAL ACCOUNTING SPECIAL ACFS 1 11', 3, 2, 4000, 1000, 0),
('18', '3rd', 'SYSTEMS ANALYSIS INFS 2 13', 3, 2, 4000, 1000, 0),
('19', '3rd', 'INTRODUCTION TO NETWORKS INFS 2 14', 3, 2, 4500, 1000, 0),
('20', '3rd', 'SYSTEMS DESIGN INFS 2 23', 3, 2, 4500, 1000, 0),
('21', '3rd', 'UNDERSTANDING THE WORLD OF ECONOMIC AND MANAGEMENT SCIENCE WVES 2 22', 3, 2, 4000, 1000, 0),
('22', '3rd', 'FINANCIAL ACCOUNTING SPECIAL ACFS 1 21', 3, 2, 2000, 1000, 0),
('23', '3rd', 'WEB PROGRAMMING INFS 2 24', 3, 2, 4000, 1000, 0),
('24', '4th', 'BUSINESS INTELLIGENCE INFS 3 24', 3, 3, 4000, 1000, 0),
('25', '4th', 'DATABASE SYSTEMS INFS 3 11', 3, 3, 5400, 1000, 0),
('26', '2nd', 'INTRODUCTION TO MICROECONOMICS ECON 1 12', 3, 2, 2000, 1000, 0),
('27', '2nd', 'INTRODUCTORY STATISTICS STFM 1 11', 3, 2, 4000, 1000, 0),
('28', '2nd', 'OBJECT ORIENTED PROGRAMMING INFS 2 11', 3, 2, 4000, 1000, 0),
('29', '4th', 'EMERGING BUSINESS TECHNOLOGIES INFS 3 21', 3, 3, 2000, 1000, 0),
('3', '1st', 'FOUNDATION MATHEMATICS FOR COMMERCE I MTHS 1 19', 3, 2, 4500, 1000, 0),
('4', '1st', 'INTRODUCTION TO COMMUNICATION ICOM 1 11', 3, 2, 4000, 1000, 0),
('5', '1st', 'INTRODUCTION TO COMPUTERS AND PROGRAMMING INFS 1 13', 3, 2, 4000, 1000, 0),
('50', '1st', 'INTRODUCTION TO PROGRAMMING INFS 1 22', 3, 2, 4000, 1000, 0),
('51', 'Ist', 'GENERAL MANAGEMENT BMAN 1 21', 3, 3, 5400, 1000, 0),
('66', '4th', 'INFOMATION SYSTEMS PROJECT INFS 323', 3, 3, 5400, 1000, 0),
('7', '4th', 'INFORMATION SYSTEMS SECURITY INFS 3 13', 3, 3, 5400, 1000, 0),
('8', '4th', 'MANAGEMENT OF INFORMATION SYSTEMS INFS 322', 3, 3, 5400, 1000, 0),
('9', '4th', 'PROJECT MANAGEMENT FOR INFORMATIONS SYSTEMS INFS 3 12', 3, 3, 5400, 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `examtype`
--

CREATE TABLE `examtype` (
  `status` int(200) NOT NULL,
  `exam_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examtype`
--

INSERT INTO `examtype` (`status`, `exam_type`) VALUES
(1, 'Recourse'),
(2, 'Regular'),
(3, 'Retake');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `roll_no` int(200) NOT NULL,
  `amount` int(200) NOT NULL,
  `trxid` varchar(200) NOT NULL,
  `transaction` varchar(200) NOT NULL,
  `monthi` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`roll_no`, `amount`, `trxid`, `transaction`, `monthi`) VALUES
(1, 200, 'ch_1Iin4KDfbWnbeNn8HZ4CFWXr', 'txn_1Iin4KDfbWnbeNn8iKqWxwSD', '0000-00-00'),
(99, 39200, 'ch_1IinW5DfbWnbeNn8a0uI0xWS', 'txn_1IinW5DfbWnbeNn8gvADNJwV', '2021-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `pendingcourse`
--

CREATE TABLE `pendingcourse` (
  `roll_no` int(200) NOT NULL,
  `course_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coursefee` int(200) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendingcourse`
--

INSERT INTO `pendingcourse` (`roll_no`, `course_id`, `semester`, `course_name`, `exam_type`, `coursefee`, `status`) VALUES
(3345678, '10', '2nd', 'CALCULUS & LINEAR ALGEBRA & PROBABILITY & INFERENCE', 'Regular', 0, 1),
(3345678, '11', '2nd', 'COMPUTER ORGANIZATION AND ARCHITECTURE', 'Regular', 0, 1),
(3345678, '12', '2nd', 'CRITICAL AND ANALYTICAL THINKING', 'Regular', 0, 1),
(3345678, '13', '2nd', 'ELECTRONIC BUSINESS INFS 2 21', 'Regular', 0, 1),
(3345678, '14', '2nd', 'EXTENSION OF CRITICAL AND ANALYTICAL THINKING ECAT 1 21', 'Regular', 0, 1),
(3345678, '15', '2nd', 'INTRODUCTION TO MACROECONOMICS ECON 1 22', 'Regular', 0, 1),
(3345678, '16', '2nd', 'INTRODUCTION TO DATABASES INFS 2 22', 'Regular', 0, 1),
(3345678, '26', '2nd', 'INTRODUCTION TO MICROECONOMICS ECON 1 12', 'Regular', 0, 1),
(3345678, '27', '2nd', 'INTRODUCTORY STATISTICS STFM 1 11', 'Regular', 0, 1),
(3345678, '28', '2nd', 'OBJECT ORIENTED PROGRAMMING INFS 2 11', 'Regular', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `status`) VALUES
('2023 BCOM INFORMATION SYSTEMS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentsignup`
--

CREATE TABLE `studentsignup` (
  `student_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll_no` int(200) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` int(20) NOT NULL,
  `guardian_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentsignup`
--

INSERT INTO `studentsignup` (`student_name`, `roll_no`, `email`, `department`, `father_name`, `mother_name`, `address`, `mobile_no`, `guardian_name`, `password`, `confirm_password`, `img`) VALUES
('Tumelo', 3345678, 'isaactin711@gmail.com', 'CSE', 'Isaac', 'Sarah', 'North West University', 735382239, 'EB', '12345', '12345', 'R (2).jfif'),
('Isaac Ncube', 32190549, 'isaactin711@gmail.com', 'CSE', 'Isaac', 'Sarah', '01 mulati street', 813466364, 'EB', '12345', '12345', 'OIP.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `teachersignup`
--

CREATE TABLE `teachersignup` (
  `teacher_name` varchar(200) NOT NULL,
  `id_no` int(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `department` varchar(30) NOT NULL,
  `father_name` varchar(40) NOT NULL,
  `mother_name` varchar(40) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile_no` int(20) NOT NULL,
  `nid_no` int(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachersignup`
--

INSERT INTO `teachersignup` (`teacher_name`, `id_no`, `email`, `department`, `father_name`, `mother_name`, `address`, `mobile_no`, `nid_no`, `password`, `confirm_password`, `img`) VALUES
('a', 2, 'a@gmail.com', 'cse', 'af', 'mf', 'ctg', 346546, 76557, '123', '123', '12.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coursetable`
--
ALTER TABLE `coursetable`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `examtype`
--
ALTER TABLE `examtype`
  ADD PRIMARY KEY (`exam_type`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `pendingcourse`
--
ALTER TABLE `pendingcourse`
  ADD KEY `roll_no` (`roll_no`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `studentsignup`
--
ALTER TABLE `studentsignup`
  ADD PRIMARY KEY (`roll_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendingcourse`
--
ALTER TABLE `pendingcourse`
  ADD CONSTRAINT `pendingcourse_ibfk_1` FOREIGN KEY (`roll_no`) REFERENCES `studentsignup` (`roll_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendingcourse_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `coursetable` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
