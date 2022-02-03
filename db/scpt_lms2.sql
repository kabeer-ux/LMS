-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 02:17 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

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
(8, 'all', '<p>This is 1st dummy message of all i.e. faculty and student&nbsp;<br></p>', 'img.png', 1, '2022-01-12 20:14:01.303156'),
(9, 'faculty', '<p>lkjhgfdsa</p>', 'img.png', 1, '2022-01-12 20:41:22.670429');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(255) NOT NULL,
  `city_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `addon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `addon`) VALUES
(1, 'Sialkot', '2022-01-11 18:18:21.000000'),
(2, 'Lahore', '2022-01-11 22:26:02.940993'),
(3, 'Multan', '2022-01-12 18:30:14.775246'),
(4, 'Islamabad', '2022-01-25 16:52:07.000000'),
(5, 'Karachi', '2022-01-11 16:56:26.000000');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(255) NOT NULL,
  `term_id` int(100) NOT NULL,
  `course_id` int(100) NOT NULL,
  `start` int(11) NOT NULL COMMENT '1 is for active and 0 has to start',
  `active` int(11) NOT NULL COMMENT 'Rare Condition',
  `complete` int(11) NOT NULL COMMENT '1 for class end by default is 0 ',
  `class_description` longtext CHARACTER SET latin1 NOT NULL,
  `addon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `term_id`, `course_id`, `start`, `active`, `complete`, `class_description`, `addon`) VALUES
(1, 2, 3, 0, 0, 0, '<p>First Record&nbsp;</p>', '2022-02-02 00:12:43.999086');

-- --------------------------------------------------------

--
-- Table structure for table `class_faculty`
--

CREATE TABLE `class_faculty` (
  `class_teacher_id` int(255) NOT NULL,
  `class_id` int(255) NOT NULL,
  `teacher_id` int(255) NOT NULL,
  `description` longtext NOT NULL,
  `leave_on` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `adddon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class_student`
--

CREATE TABLE `class_student` (
  `class_student_id` int(255) NOT NULL,
  `class_id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `addon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 2, 'Database Administration & Management', 'IT-3441', 'Outline_DBAM_(IT-3441).png', 1, '2021-12-20 14:40:38.868588'),
(3, 2, 'Business Economics', 'BUS-2152', 'img1.png', 1, '2022-01-12 20:28:03.868356'),
(4, 1, 'Anatomy', 'ana101', 'hero12.png', 1, '2022-01-18 15:02:34.202701');

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
(6, 'Demo Department', 'D-D', '<p>This is demo department for check purpose<br></p>', 1, 'dep_icon2.png', '2021-08-26 11:22:56.915520');

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
(2, 5, 'Permanent', 'Arqum Abdul Muqeet', '34603-5566221-1', '1988-01-27', 'male', 'Umer Town', 'fac042.png', '03213646562', 'arqam@gmail.com', '0192023a7bbd73250516f069df18b500', '<p>He is the MD of College</p>', 1, '2021-08-28 12:37:02.772843'),
(3, 4, 'Permanent', 'Wajid Ali Shirazi ', '34603-7788991-1', '1989-01-16', 'male', 'Sialkot', 'male_teacher.png', '03214569871', 'wajidali1@gmail.com', 'c81ed1e86d521238ac866781f4ffe429', '<p>He is the HOD of our college </p>', 1, '2022-01-13 19:06:19.274990'),
(5, 4, 'Permanent', 'Rizwan ', '34603-2233665-5', '2022-01-14', 'male', 'Ugoki Sialkot', 'male_teacher2.png', '03032589741', 'rizwan1@gmail.com', 'b4d8e37debf25bc76fa751c9b71672e6', 'Ph.D. Teacher of mathematics.&nbsp;', 1, '2022-01-14 18:40:58.545341'),
(6, 6, 'Permanent', 'Demo Faculty ', '32147-8962147-8', '2021-01-31', '', 'Demo', 'abdul-a-0si69BeGjoI-unsplash.jpg', '456789123102', 'demo@gmail.com', 'bb90dcb0ceabfc8bf10c550f1ee95ee7', '<p>demo&nbsp;</p>', 1, '2022-01-19 17:18:18.452292');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `hod_id` int(255) NOT NULL,
  `faculty_id` int(255) NOT NULL,
  `department_id` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `start` datetime(6) NOT NULL,
  `end_date` datetime(6) DEFAULT NULL,
  `message_addon` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `addon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`hod_id`, `faculty_id`, `department_id`, `password`, `message`, `start`, `end_date`, `message_addon`, `addon`) VALUES
(1, 1, 3, '9ad110b6373ea8e60d3e6df0270e4271', '<p>HOD of Physical Therapy Department&nbsp;</p>', '2021-01-19 00:00:00.000000', '0000-00-00 00:00:00.000000', '2022-01-19 17:41:08.632969', '2022-01-19 17:41:08.632969'),
(2, 2, 5, '9ad110b6373ea8e60d3e6df0270e4271', '<p>HOD of Business Administration&nbsp;</p>', '2022-01-19 00:00:00.000000', '0000-00-00 00:00:00.000000', '2022-01-19 17:42:38.734881', '2022-01-19 17:42:38.734881'),
(3, 6, 6, '9ad110b6373ea8e60d3e6df0270e4271', '<p>New Demo HOD&nbsp;</p>', '2022-01-28 00:00:00.000000', '0000-00-00 00:00:00.000000', '2022-01-28 20:26:38.014571', '2022-01-28 20:26:38.014571');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(100) NOT NULL,
  `department_id` int(100) NOT NULL,
  `system_id` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `sname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `active` int(11) NOT NULL,
  `addon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `department_id`, `system_id`, `name`, `sname`, `description`, `active`, `addon`) VALUES
(1, 3, 1, 'Program of Diploma of Physical Therapy ', 'DPT', '<p>It is Diplomaof Physical Therapy </p>', 1, '2022-01-11 18:01:08.035584'),
(2, 4, 2, 'Program of Computer Science and Information Technology ', 'BS-IT', '<p>It is a Department of Computer Science and Information Technology </p>', 1, '2022-01-11 18:02:14.039182'),
(3, 5, 2, 'Program of Business Administration', 'BBA', '<p>It is Business Administration Description </p>', 1, '2022-01-11 18:03:07.778871'),
(4, 6, 2, 'Program of Demo Department ', 'DD', '<p>It is Demo Department Description</p>', 1, '2022-01-11 18:04:26.791883'),
(5, 6, 2, 'Demo Program 2', 'DD2', '<p>Description&nbsp;</p>', 1, '2022-01-28 20:44:34.103614');

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
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(255) NOT NULL,
  `system_id` int(11) NOT NULL,
  `program_id` int(225) NOT NULL,
  `hod_id` int(255) NOT NULL,
  `session_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `addon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `system_id`, `program_id`, `hod_id`, `session_name`, `description`, `addon`) VALUES
(2, 2, 3, 2, '2016 - 2020', '<p>First Session&nbsp;</p>', '2022-01-28 18:34:09.092924'),
(3, 2, 3, 2, '2017 - 2021', '<p>Second Session</p>', '2022-01-28 19:48:58.316538'),
(4, 2, 3, 2, '2018 - 2022', '<p>Third Session&nbsp;</p>', '2022-01-28 19:50:20.122213'),
(5, 2, 3, 2, '2019 - 2023', '<p>Fourth Session&nbsp;</p>', '2022-01-28 19:51:22.496745'),
(6, 1, 4, 3, '2017 - 2022', '<p>Description&nbsp;</p>', '2022-01-28 20:05:22.446112'),
(7, 1, 4, 3, '2018 - 2023', '<p>Second Desc</p>', '2022-01-28 20:18:00.927508'),
(8, 2, 5, 3, '2017 - 2021', '<p>Description</p>', '2022-01-28 20:49:28.494090');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(255) NOT NULL,
  `first_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `father_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `pic` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) NOT NULL,
  `city_id` int(100) NOT NULL,
  `addon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `father_name`, `email`, `phone`, `whatsapp`, `pic`, `address`, `password`, `city_id`, `addon`) VALUES
(1, 'Kabeer ', 'Hassan', 'Iftikhar Ul hassan ', 'kab@gmail.com', '03214569870', '03214569710', 'fac0511.jpg', 'Neka Pura Sialkot Punjab ', '493d0a16d71ecb6c6dc68e007743082b', 1, '2022-01-11 19:51:54.550761'),
(7, 'Faizan ', 'Pervaiz Khan', 'Pervaiz Khan', 'faizan5@gmail.com', '03215566889', '03215566889', 'fac02.png', 'Ugoki Sialkot', '864a4b6c671971a675890f5fd507ddd6', 1, '2022-01-12 18:30:14.780281'),
(9, 'Ammarah', 'Javed', 'Javed Ali', 'ammarah@gmail.com', '032511255665', '03215566448', 'hero12.png', 'Ugoki', '1ff146f6ef7819603ca0ab2d1b2ebe36', 1, '2022-01-18 14:49:30.710105'),
(10, 'Yasir', 'Mukhtar ', 'Mukhtar Ali', 'yasir@gmail.com', '03215566889', '03215566889', 'hero12.png', 'Ugoki', '27731a1e9d93aafaf43b2eb3f476a7b9', 1, '2022-01-18 14:58:23.097737');

-- --------------------------------------------------------

--
-- Table structure for table `stu_enroll`
--

CREATE TABLE `stu_enroll` (
  `stu_enroll_id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `program_id` int(255) NOT NULL,
  `addon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stu_enroll`
--

INSERT INTO `stu_enroll` (`stu_enroll_id`, `student_id`, `program_id`, `addon`) VALUES
(1, 1, 2, '2022-01-11 22:21:13.411352'),
(3, 7, 1, '2022-01-12 18:30:14.781778'),
(5, 9, 2, '2022-01-18 14:49:30.716350'),
(6, 10, 3, '2022-01-18 14:58:23.100226');

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

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `term_id` int(255) NOT NULL,
  `session_id` int(255) NOT NULL,
  `hod_id` int(255) NOT NULL,
  `term_name` varchar(100) CHARACTER SET latin1 NOT NULL COMMENT 'i.e. Fall 2021',
  `ease_name` varchar(255) NOT NULL COMMENT 'i.e. 4 year',
  `description` longtext NOT NULL,
  `addon` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='name as fall 2020 spring 2021 fall 2021 - 2017 2018 etc';

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`term_id`, `session_id`, `hod_id`, `term_name`, `ease_name`, `description`, `addon`) VALUES
(2, 2, 2, 'Fall 2016', '1st Semester', '<p>First Term / Semester Desc</p>', '2022-01-28 19:52:17.421092'),
(3, 2, 2, 'Spring 2017', '2nd Semester', '<p>Second Term / Semester Desc</p>', '2022-01-28 19:54:10.154231'),
(4, 3, 2, 'Fall 2017', '1st Semester', '<p>Third Term / Semester Desc</p>', '2022-01-28 19:55:45.488909'),
(5, 3, 2, 'Spring 2018', '2nd Semester', '<p>Fourth Term / Semester Desc</p>', '2022-01-28 19:56:56.746302'),
(6, 6, 3, 'Fall 2017', '1st Year', '<p>Dsecription</p>', '2022-01-28 20:18:57.698165'),
(7, 6, 3, 'Spring 2018', '2nd Year', '<p>Description&nbsp;</p>', '2022-01-28 20:20:16.763941'),
(8, 7, 3, 'Fall 2018', '1st Year', '<p>Description&nbsp;</p>', '2022-01-28 20:30:57.890469');

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
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_faculty`
--
ALTER TABLE `class_faculty`
  ADD PRIMARY KEY (`class_teacher_id`);

--
-- Indexes for table `class_student`
--
ALTER TABLE `class_student`
  ADD PRIMARY KEY (`class_student_id`);

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
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`hod_id`);

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
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `stu_enroll`
--
ALTER TABLE `stu_enroll`
  ADD PRIMARY KEY (`stu_enroll_id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`system_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`term_id`);

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
  MODIFY `announcement_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_faculty`
--
ALTER TABLE `class_faculty`
  MODIFY `class_teacher_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_student`
--
ALTER TABLE `class_student`
  MODIFY `class_student_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hod`
--
ALTER TABLE `hod`
  MODIFY `hod_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stu_enroll`
--
ALTER TABLE `stu_enroll`
  MODIFY `stu_enroll_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `system_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `term_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
