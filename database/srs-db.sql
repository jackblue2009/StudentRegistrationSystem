-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2016 at 07:40 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `srs-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE IF NOT EXISTS `contact_table` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_table`
--

INSERT INTO `contact_table` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Sharuh Khan', 'iamsrk@khan.com', '98201520', 'Hello, this is a sample message sent by administrator.'),
(2, 'Johnny Depp', 'johnny-210@depp.com', '81852012', 'I would like to know about the registration process'),
(3, 'Shawn Michaels', 'michael_shawn_hicken@wwe.com', '55562102', 'I would like to ask about the fees to apply?'),
(4, 'Vince McMahon', 'mr_mcmahon@wwe.com', '62500166', 'Hello, I would like to buy this college.'),
(5, 'Lex Luthor', 'lex@luthor.org', '37777777', 'I would like to know more about your organization.'),
(6, 'Lois Lane', 'lois_lane@dailyplanet.org', '39965501', 'I would like to have an interview with the dean of this respectful college regarding the matter of the registration process.'),
(7, 'John Jones', 'jones-john@justice.com', 'No Phone Number.', 'I am wondering if it is possible to shape-shift into the Dean of this respectful industry?');

-- --------------------------------------------------------

--
-- Table structure for table `course_registered`
--

CREATE TABLE IF NOT EXISTS `course_registered` (
`cr_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_number` smallint(6) DEFAULT NULL,
  `days` varchar(5) DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `date_registered` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_registered`
--

INSERT INTO `course_registered` (`cr_id`, `course_id`, `section_number`, `days`, `time_start`, `time_end`, `location`, `student_id`, `date_registered`) VALUES
(1, 1, 2, 'MW', '11:00:00', '13:40:00', 's20c-20', 20120003, '2016-05-25 17:42:22'),
(2, 2, 1, 'U', '09:30:00', '11:30:00', 's20c-05', 20120003, '2016-05-25 17:44:39'),
(3, 5, 2, 'UH', '11:00:00', '13:30:00', 's20b-06', 20120003, '2016-05-25 17:44:49'),
(4, 3, 1, 'W', '10:00:00', '11:40:00', 's20b-04', 20120003, '2016-05-25 17:45:01'),
(5, 4, 2, 'MW', '15:00:00', '17:40:00', 's41-10', 20120003, '2016-05-25 17:45:15'),
(6, 50, 2, 'UH', '12:00:00', '14:00:00', 's20c-20', 20120005, '2016-05-25 18:55:28'),
(7, 51, 1, 'MW', '08:00:00', '10:45:00', 's20c-20', 20120005, '2016-05-25 18:55:42'),
(8, 52, 1, 'H', '09:00:00', '12:00:00', 's20c-102', 20120005, '2016-05-25 18:55:51'),
(9, 53, 2, 'T', '09:00:00', '11:00:00', 's20c-15', 20120005, '2016-05-25 18:56:01'),
(10, 54, 1, 'MW', '16:00:00', '18:00:00', 's20c-20', 20120005, '2016-05-25 18:56:16'),
(11, 27, 2, 'UTH', '15:00:00', '17:30:00', 's20c-120', 20120004, '2016-05-25 19:14:18'),
(12, 28, 1, 'MW', '11:00:00', '12:50:00', 's20c-05', 20120004, '2016-05-25 19:14:29'),
(13, 29, 2, 'MW', '10:00:00', '11:50:00', 's20c-20', 20120004, '2016-05-25 19:14:48'),
(14, 30, 2, 'MW', '12:00:00', '14:40:00', 's20c-119', 20120004, '2016-05-25 19:15:00'),
(15, 31, 2, 'U', '10:00:00', '10:50:00', 's20c-10', 20120004, '2016-05-25 19:15:10'),
(16, 27, 1, 'UTH', '10:00:00', '12:30:00', 's20c-120', 20120006, '2016-05-26 15:53:22'),
(17, 28, 2, 'MW', '14:00:00', '15:50:00', 's20c-05', 20120006, '2016-05-26 15:53:45'),
(18, 29, 2, 'MW', '10:00:00', '11:50:00', 's20c-20', 20120006, '2016-05-26 15:54:27'),
(19, 30, 2, 'MW', '12:00:00', '14:40:00', 's20c-119', 20120006, '2016-05-26 15:54:52'),
(20, 31, 1, 'U', '09:00:00', '09:50:00', 's20c-10', 20120006, '2016-05-26 15:55:01'),
(23, 50, 1, 'UH', '08:00:00', '09:15:00', 's20c-20', 20120002, '2016-05-26 19:35:43'),
(24, 51, 2, 'MW', '14:00:00', '14:45:00', 's20c-20', 20120002, '2016-05-26 19:36:19'),
(25, 52, 1, 'H', '09:00:00', '12:00:00', 's20c-102', 20120002, '2016-05-26 19:36:30'),
(26, 53, 1, 'T', '12:00:00', '14:00:00', 's20c-15', 20120002, '2016-05-26 19:37:03'),
(27, 54, 1, 'MW', '16:00:00', '18:00:00', 's20c-20', 20120002, '2016-05-26 19:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `course_table`
--

CREATE TABLE IF NOT EXISTS `course_table` (
`course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `cr` int(11) NOT NULL,
  `major` int(11) NOT NULL,
  `students_enrolled` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_table`
--

INSERT INTO `course_table` (`course_id`, `course_name`, `course_code`, `cr`, `major`, `students_enrolled`) VALUES
(1, 'Introduction to IT', 'CSA101', 3, 1, 0),
(2, 'Modern Bahrain History & Culture', 'Hist122', 3, 1, 0),
(3, 'English Development 1', 'ENGLA111', 3, 1, 0),
(4, 'Principles of Human Rights', 'LAW107', 2, 1, 0),
(5, 'Applied Mathematics', 'MATHA111', 3, 1, 0),
(6, 'Programming Fundamentals', 'CSA106', 3, 1, 0),
(7, 'Computer Hardware & Software', 'CEA121', 4, 1, 0),
(12, 'Network Fundamentals', 'CEA122', 3, 1, 0),
(13, 'Introduction to Routing & Switching', 'CEA123', 4, 1, 0),
(14, 'English Development 2', 'ENGLA112', 3, 1, 0),
(15, 'Enterprise Network Services', 'CEA124', 3, 1, 0),
(16, 'Routing Protocols', 'CEA231', 4, 1, 0),
(17, 'LAN Switching', 'CEA232', 3, 1, 0),
(18, 'Introduction to Network Security', 'CEA233', 3, 1, 0),
(19, 'Customer Relationship Management', 'BAA220', 3, 1, 0),
(20, 'Wireless Networks', 'CEA234', 3, 1, 0),
(21, 'Seminar', 'CSA250', 1, 1, 0),
(22, 'WAN Technologies', 'CEA241', 3, 1, 0),
(23, 'Server Operating Systems Administration', 'CEA242', 3, 1, 0),
(24, 'Advanced Routing', 'CEA243', 3, 1, 0),
(25, 'Building and Supporting Computer Networks', 'CEA244', 3, 1, 0),
(26, 'Technical Project', 'CEA290', 3, 1, 0),
(27, 'Introduction to IT', 'CSA101', 3, 2, 0),
(28, 'English Development 1', 'ENGLA111', 3, 2, 0),
(29, 'Modern Bahrain History and Culture', 'Hist122', 3, 2, 0),
(30, 'Principles of Human Rights', 'LAW107', 2, 2, 0),
(31, 'Applied Mathematics', 'MATHA111', 3, 2, 0),
(32, 'Programming Fundamentals', 'CSA106', 3, 2, 0),
(33, 'Databases Fundamentals', 'CSA121', 3, 2, 0),
(34, 'Introduction to Digital Imaging for Multimedia and Web', 'CSA126', 3, 2, 0),
(35, 'Fundamentals of Web Development', 'CSA131', 3, 2, 0),
(36, 'Network Fundamentals', 'CEA122', 3, 2, 0),
(37, 'English Development 2', 'ENGLA112', 3, 2, 0),
(38, 'Interactivity and Interface Design', 'CSA136', 3, 2, 0),
(39, 'Web/Mobile Applications Development', 'CSA231', 3, 2, 0),
(40, 'Digital Video and Audio Production', 'CSA241', 3, 2, 0),
(41, 'Server Operating Systems Administration', 'CEA242', 3, 2, 0),
(42, 'Introduction to Business Administration', 'OMA121', 3, 2, 0),
(43, 'Programming in PERL', 'CSA236', 3, 2, 0),
(44, 'Seminar', 'CSA250', 1, 2, 0),
(45, 'Advanced Digital Video and Audio Production', 'CSA261', 3, 2, 0),
(46, 'Web Server Administration', 'CSA266', 3, 2, 0),
(47, 'Multimedia Animation Tools and Techniques', 'CSA271', 3, 2, 0),
(48, 'Data Driven Websites and Applications', 'CSA276', 3, 2, 0),
(49, 'Technical Project', 'CSA290', 3, 2, 0),
(50, 'English Language Development I', 'ENGLA111', 3, 3, 0),
(51, 'Applied Mathematics', 'MATHA111', 3, 3, 0),
(52, 'English Communication Skills', 'ENGLA112', 3, 3, 0),
(53, 'Introduction to Business Computing', 'BAA110', 3, 3, 0),
(54, 'Modern History of Bahrain & Culture', 'HIST122', 3, 3, 0),
(55, 'Principles of Human Rights', 'LAW107', 2, 3, 0),
(56, 'English Language Development II', 'ENGLA120', 3, 3, 0),
(57, 'Introduction to Business Administration', 'OMA121', 3, 3, 0),
(58, 'English Word Processing I', 'OMA140', 3, 3, 0),
(59, 'Interpersonal Skills', 'OMA160', 3, 3, 0),
(60, 'Financial Accounting I', 'BAA121', 3, 3, 0),
(61, 'Arabic Word Processing I', 'OMA222', 3, 3, 0),
(62, 'Spreadsheets', 'OMA231', 3, 3, 0),
(63, 'English Language Development III', 'ENGLA210', 3, 3, 0),
(64, 'Office Procedures & Simulations I', 'OMA237', 3, 3, 0),
(65, 'English Word Processing II', 'OMA240', 3, 3, 0),
(66, 'Integrated Office Applications', 'OMA241', 3, 3, 0),
(67, 'Administrative Office Management', 'OMA242', 3, 3, 0),
(68, 'Office Procedures and Simulations II', 'OMA247', 3, 3, 0),
(69, 'Database Management', 'OMA260', 3, 3, 0),
(70, 'Arabic Word Processing II', 'OMA262', 3, 3, 0),
(71, 'Applied Research Skills', 'OMA291', 3, 3, 0),
(72, 'Professional Internship', 'OMA299', 1, 3, 0),
(73, 'Professional Live Hacking', 'CSA399', 3, 1, 0),
(74, 'Introduction to Vulnerability Exploitation', 'CSA265', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `major_table`
--

CREATE TABLE IF NOT EXISTS `major_table` (
`major_id` int(11) NOT NULL,
  `major_name` varchar(255) NOT NULL,
  `program` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `major_table`
--

INSERT INTO `major_table` (`major_id`, `major_name`, `program`) VALUES
(1, 'Network Administration', 1),
(2, 'Web and Multimedia Development', 1),
(3, 'Office Management', 2),
(4, 'Business Administration', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pending_students_table`
--

CREATE TABLE IF NOT EXISTS `pending_students_table` (
`id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_phone` varchar(255) NOT NULL,
  `student_major` int(11) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `high_school_major` varchar(255) NOT NULL,
  `high_school_gpa` double NOT NULL,
  `adviser` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_students_table`
--

INSERT INTO `pending_students_table` (`id`, `student_name`, `student_email`, `student_phone`, `student_major`, `student_password`, `high_school_major`, `high_school_gpa`, `adviser`, `status`) VALUES
(18, 'Couch Erney', 'owwmesoerney@hotmail.com', '32445225', 3, '0a5fa94e', '2', 68.9, 1, 0),
(20, 'Tom Welling', 'welling.tom@cw.com', '36201252', 2, '86543607', '1', 56.6, 1, 0),
(21, 'Stephen Amell', 'amells-wood@cw.com', '33201252', 3, '34e5bf10', '1', 69.3, 1, 0),
(22, 'Chris Evans', 'evans-chris@marvel.com', '34520012', 3, 'a1f0c226', '2', 63.7, 1, 0),
(23, 'Chris Homesworth', 'homesworth-995@marvel.com', '35220025', 2, '65326ecc', '4', 55.2, 1, 0),
(24, 'Scarlett Johnesson', 'black-widow@marvel.com', '36332012', 1, '038857b2', '2', 68.2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `program_table`
--

CREATE TABLE IF NOT EXISTS `program_table` (
`program_id` int(11) NOT NULL,
  `program_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_table`
--

INSERT INTO `program_table` (`program_id`, `program_name`) VALUES
(1, 'Technical Programs'),
(2, 'Administrative Programs');

-- --------------------------------------------------------

--
-- Table structure for table `section_table`
--

CREATE TABLE IF NOT EXISTS `section_table` (
`id` int(11) NOT NULL,
  `section_number` smallint(6) NOT NULL,
  `course_id` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `days` varchar(5) NOT NULL,
  `location` varchar(255) NOT NULL,
  `instructor` int(11) NOT NULL,
  `students` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_table`
--

INSERT INTO `section_table` (`id`, `section_number`, `course_id`, `time_start`, `time_end`, `days`, `location`, `instructor`, `students`) VALUES
(1, 1, 1, '08:00:00', '10:40:00', 'MW', 's20c-20', 2, 0),
(2, 2, 1, '11:00:00', '13:40:00', 'MW', 's20c-20', 3, 0),
(3, 1, 2, '09:30:00', '11:30:00', 'U', 's20c-05', 2, 0),
(4, 2, 2, '09:00:00', '11:00:00', 'H', 's20c-05', 3, 0),
(5, 1, 3, '10:00:00', '11:40:00', 'W', 's20b-04', 2, 0),
(6, 2, 3, '10:00:00', '11:40:00', 'T', 's20b-06', 3, 0),
(7, 1, 4, '12:00:00', '14:30:00', 'UTH', 's41-15', 2, 0),
(8, 2, 4, '15:00:00', '17:40:00', 'MW', 's41-10', 3, 0),
(9, 1, 5, '15:00:00', '16:15:00', 'UT', 's20b-05', 2, 0),
(10, 2, 5, '11:00:00', '13:30:00', 'UH', 's20b-06', 3, 0),
(11, 1, 6, '09:00:00', '11:15:00', 'UTH', 's20c-102', 2, 0),
(12, 2, 6, '08:30:00', '10:40:00', 'MW', 's20c-10', 3, 0),
(13, 1, 7, '10:00:00', '12:10:00', 'TH', 's20c-20', 2, 0),
(14, 2, 7, '09:00:00', '11:10:00', 'UT', 's20c-04', 3, 0),
(15, 1, 27, '10:00:00', '12:30:00', 'UTH', 's20c-120', 2, 0),
(16, 2, 27, '15:00:00', '17:30:00', 'UTH', 's20c-120', 3, 0),
(17, 1, 28, '11:00:00', '12:50:00', 'MW', 's20c-05', 2, 0),
(18, 2, 28, '14:00:00', '15:50:00', 'MW', 's20c-05', 3, 0),
(19, 1, 29, '08:00:00', '09:50:00', 'MW', 's20c-20', 2, 0),
(20, 2, 29, '10:00:00', '11:50:00', 'MW', 's20c-20', 3, 0),
(21, 1, 30, '16:00:00', '18:40:00', 'MW', 's20c-119', 2, 0),
(22, 2, 30, '12:00:00', '14:40:00', 'MW', 's20c-119', 3, 0),
(23, 1, 31, '09:00:00', '09:50:00', 'U', 's20c-10', 2, 0),
(24, 2, 31, '10:00:00', '10:50:00', 'U', 's20c-10', 3, 0),
(27, 1, 51, '08:00:00', '10:45:00', 'MW', 's20c-20', 2, 0),
(28, 2, 51, '14:00:00', '14:45:00', 'MW', 's20c-20', 3, 0),
(29, 1, 52, '09:00:00', '12:00:00', 'H', 's20c-102', 2, 0),
(30, 2, 52, '13:00:00', '16:00:00', 'H', 's20c-102', 3, 0),
(31, 1, 53, '12:00:00', '14:00:00', 'T', 's20c-15', 2, 0),
(32, 2, 53, '09:00:00', '11:00:00', 'T', 's20c-15', 3, 0),
(33, 1, 54, '16:00:00', '18:00:00', 'MW', 's20c-20', 2, 0),
(34, 2, 54, '12:00:00', '14:00:00', 'MW', 's20c-20', 3, 0),
(35, 1, 50, '08:00:00', '09:15:00', 'UH', 's20c-20', 2, 0),
(36, 2, 50, '12:00:00', '14:00:00', 'UH', 's20c-20', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_table`
--

CREATE TABLE IF NOT EXISTS `staff_table` (
`staff_id` int(11) NOT NULL,
  `staff_username` varchar(255) NOT NULL,
  `staff_password` varchar(255) NOT NULL,
  `staff_office` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_table`
--

INSERT INTO `staff_table` (`staff_id`, `staff_username`, `staff_password`, `staff_office`) VALUES
(1, 'admin', 'admin', 'S20C-128'),
(2, 'dr_fate', 'fate_jsa', 'S20B-32'),
(3, 'dr_amell', 'hamilton_amell', 'S20C-52');

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE IF NOT EXISTS `student_table` (
`student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_phone` varchar(255) NOT NULL,
  `student_major` int(11) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `high_school_major` varchar(255) NOT NULL,
  `high_school_gpa` double NOT NULL,
  `adviser` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20120008 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`student_id`, `student_name`, `student_email`, `student_phone`, `student_major`, `student_password`, `high_school_major`, `high_school_gpa`, `adviser`, `status`) VALUES
(20120001, 'Clark Kent', 'kent-clark@justice.com', '33333333', 3, '9b8cacc7', '3', 97.8, 1, 1),
(20120002, 'Bruce Wayne', 'wayne-bruce@justice.com', '39999993', 3, '56f7715b', '1', 99.5, 1, 1),
(20120003, 'Berry Allen', 'allen-berry@justice.com', '33551441', 1, '9944e1e5', '3', 99.8, 1, 1),
(20120004, 'Ray Palmer', 'mr_palmer@legends.com', '39920152', 2, '2aec31a5', '3', 99.8, 1, 1),
(20120005, 'Han Solo', 'solo@rebels.com', '39607777', 3, 'ce94a8da', '1', 76.2, 1, 1),
(20120006, 'Luke Skywalker', 'luke@rebels.com', '34450012', 2, 'a54f1aec', '2', 86.3, 1, 1),
(20120007, 'Dinah Lance', 'lance@prey.com', '77621520', 3, '443e7564', '2', 84.2, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_registered`
--
ALTER TABLE `course_registered`
 ADD PRIMARY KEY (`cr_id`), ADD KEY `course_id` (`course_id`), ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `course_table`
--
ALTER TABLE `course_table`
 ADD PRIMARY KEY (`course_id`), ADD KEY `major` (`major`);

--
-- Indexes for table `major_table`
--
ALTER TABLE `major_table`
 ADD PRIMARY KEY (`major_id`), ADD KEY `program` (`program`), ADD KEY `program_2` (`program`);

--
-- Indexes for table `pending_students_table`
--
ALTER TABLE `pending_students_table`
 ADD PRIMARY KEY (`id`), ADD KEY `student_major` (`student_major`);

--
-- Indexes for table `program_table`
--
ALTER TABLE `program_table`
 ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `section_table`
--
ALTER TABLE `section_table`
 ADD PRIMARY KEY (`id`), ADD KEY `course_id` (`course_id`,`instructor`), ADD KEY `instructor` (`instructor`);

--
-- Indexes for table `staff_table`
--
ALTER TABLE `staff_table`
 ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
 ADD PRIMARY KEY (`student_id`), ADD KEY `student_major` (`student_major`,`adviser`), ADD KEY `adviser` (`adviser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `course_registered`
--
ALTER TABLE `course_registered`
MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `course_table`
--
ALTER TABLE `course_table`
MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `major_table`
--
ALTER TABLE `major_table`
MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pending_students_table`
--
ALTER TABLE `pending_students_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `program_table`
--
ALTER TABLE `program_table`
MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `section_table`
--
ALTER TABLE `section_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `staff_table`
--
ALTER TABLE `staff_table`
MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20120008;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_registered`
--
ALTER TABLE `course_registered`
ADD CONSTRAINT `course_registered_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_table` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `course_registered_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course_table` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_table`
--
ALTER TABLE `course_table`
ADD CONSTRAINT `course_table_ibfk_1` FOREIGN KEY (`major`) REFERENCES `major_table` (`major_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `major_table`
--
ALTER TABLE `major_table`
ADD CONSTRAINT `major_table_ibfk_1` FOREIGN KEY (`program`) REFERENCES `program_table` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pending_students_table`
--
ALTER TABLE `pending_students_table`
ADD CONSTRAINT `pending_students_table_ibfk_1` FOREIGN KEY (`student_major`) REFERENCES `major_table` (`major_id`);

--
-- Constraints for table `section_table`
--
ALTER TABLE `section_table`
ADD CONSTRAINT `section_table_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_table` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `section_table_ibfk_2` FOREIGN KEY (`instructor`) REFERENCES `staff_table` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_table`
--
ALTER TABLE `student_table`
ADD CONSTRAINT `student_table_ibfk_1` FOREIGN KEY (`adviser`) REFERENCES `staff_table` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_table_ibfk_2` FOREIGN KEY (`student_major`) REFERENCES `major_table` (`major_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
