-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 02:40 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scpt_lms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `name` text CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `addon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `username`, `password`, `addon`) VALUES
(1, 'Mr. Ijaz Amin', 'ijazamin@scptamc.com', 'admin', '0192023a7bbd73250516f069df18b500', '2021-08-12 13:11:24.000000');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(100) NOT NULL,
  `audience` text CHARACTER SET latin1 NOT NULL COMMENT 'All | Faculty | Student',
  `message` longtext CHARACTER SET latin1 NOT NULL,
  `media` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` int(100) NOT NULL,
  `addon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `audience`, `message`, `media`, `status`, `addon`) VALUES
(1, 'all', 'This is 1st dummy message of all i.e. faculty and student', '', 1, '2021-12-18 10:48:53.000000'),
(2, 'faculty', 'This is 1st message only for faculty', '', 1, '2021-12-18 10:51:22.000000'),
(3, 'student', 'This is 1st message for only students', '', 1, '2021-12-18 10:51:48.000000'),
(4, 'faculty', 'This is 2nd message only for faculty', '', 1, '2021-12-18 10:51:48.000000');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(255) NOT NULL,
  `system_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `code` varchar(100) CHARACTER SET latin1 NOT NULL,
  `outline` varchar(100) CHARACTER SET latin1 NOT NULL,
  `active` int(11) NOT NULL,
  `addon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `system_id`, `name`, `code`, `outline`, `active`, `addon`) VALUES
(1, 2, 'Multimedia System and Design', 'IT-3743', 'Outline_(IT-3743).jpg', 1, '2021-12-20 14:38:29.000000'),
(2, 2, 'Database Administration & Management', 'IT-3441', 'Outline_DBAM_(IT-3441).png', 1, '2021-12-20 14:40:38.868588');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(200) NOT NULL,
  `name` text CHARACTER SET latin1 NOT NULL,
  `sname` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `active` int(11) NOT NULL,
  `icon` varchar(100) CHARACTER SET latin1 NOT NULL,
  `addon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`, `sname`, `description`, `active`, `icon`, `addon`) VALUES
(3, 'Department of Physical Therapy', 'DPT', '<p>This is&nbsp;Department of Physical Therapy</p>', 1, 'dep_icon3.png', '2021-08-26 11:20:01.643106'),
(4, 'Faculty of Computer Science and Information Technology', 'CS/IT', '<p>Faculty of Computer Science and Information Technology<br></p>', 1, 'dep_icon4.png', '2021-08-26 11:20:59.611846'),
(5, 'Faculty of Business Administration', 'BBA', '<p>This is&nbsp;Faculty of Business Administration</p>', 1, 'dep_icon5.png', '2021-08-26 11:22:18.445119'),
(6, 'Demo Department', 'D-D', '<p>This is demo department for check purpose<br></p>', 1, '', '2021-08-26 11:22:56.915520');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(255) NOT NULL,
  `department_id` int(100) NOT NULL,
  `status` text CHARACTER SET latin1 NOT NULL COMMENT 'it will tell whether he is permanent or visiting',
  `name` text CHARACTER SET latin1 NOT NULL,
  `cnic` varchar(100) CHARACTER SET latin1 NOT NULL,
  `dob` date NOT NULL,
  `gender` text CHARACTER SET latin1 NOT NULL,
  `address` varchar(200) CHARACTER SET latin1 NOT NULL,
  `pic` varchar(255) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `notes` longtext CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `active` int(11) NOT NULL,
  `addon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `department_id`, `status`, `name`, `cnic`, `dob`, `gender`, `address`, `pic`, `phone`, `email`, `password`, `notes`, `active`, `addon`) VALUES
(1, 3, 'Permanent', 'sir Ijaz Amin', '34603-1112223-3', '2021-08-01', 'male', 'Umer Town', 'fac04.png', '03131122334', 'ijazamin@gmail.com', '0192023a7bbd73250516f069df18b500', '<p>He is the principal of our college</p>', 1, '2021-08-27 10:14:59.150920'),
(2, 5, 'Permanent', 'Arqum Abdul Muqeet', '34603-5566221-1', '1988-01-27', 'male', 'Umer Town', 'fac02.png', '03213646562', 'arqam@gmail.com', '0192023a7bbd73250516f069df18b500', '<p>He is the MD of College</p>', 1, '2021-08-28 12:37:02.772843');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(100) NOT NULL,
  `deparment_id` int(100) NOT NULL,
  `system_id` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `sname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `active` int(11) NOT NULL,
  `addon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(255) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `system_id` int(255) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `code` varchar(100) CHARACTER SET latin1 NOT NULL,
  `detail` longtext CHARACTER SET latin1 NOT NULL,
  `active` int(11) NOT NULL,
  `addon` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`system_id`, `name`, `code`, `detail`, `active`, `addon`) VALUES
(1, 'Annual System', 'Annual', 'This is an annual system right now DPT is only in this system', 1, '2021-12-19 19:51:40.000000'),
(2, 'Term System', 'Term', 'This is term system, all department other than DPT and paramedics are enrolled in it.', 1, '2021-12-19 19:51:40.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`system_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `system_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
