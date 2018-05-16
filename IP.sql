-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2018 at 03:19 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IP`
--

-- --------------------------------------------------------

--
-- Table structure for table `allotment`
--

CREATE TABLE `allotment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `no_of_students` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `logins` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `logins`) VALUES
(1, 'admin'),
(2, 'student'),
(3, 'HOD'),
(4, 'COE'),
(5, 'accountant');

-- --------------------------------------------------------

--
-- Table structure for table `company_requirements`
--

CREATE TABLE `company_requirements` (
  `id` int(11) NOT NULL,
  `company_id` varchar(20) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `date_of_consent` date DEFAULT NULL,
  `consent_given_by` varchar(40) NOT NULL,
  `consent_obtained_by` varchar(40) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `no_of_girls` int(11) DEFAULT NULL,
  `no_of_boys` int(11) DEFAULT NULL,
  `total_no_students` int(11) NOT NULL,
  `cgpa` varchar(20) DEFAULT NULL,
  `nature_of_work` varchar(100) DEFAULT NULL,
  `working_hrs` varchar(20) DEFAULT NULL,
  `weekly_holidays` varchar(40) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_requirements`
--

INSERT INTO `company_requirements` (`id`, `company_id`, `company_name`, `date_of_consent`, `consent_given_by`, `consent_obtained_by`, `phone`, `email`, `branch`, `no_of_girls`, `no_of_boys`, `total_no_students`, `cgpa`, `nature_of_work`, `working_hrs`, `weekly_holidays`, `website`, `address`) VALUES
(1, '2015cmp001', 'iolite', '2017-06-19', 'saji', 'abrar', 7899979954, 'poojareddy367@gmail.com', 'cse', 5, 3, 8, '8', 'software development', '8', 'sunday', 'www.iolite.com', 'shanthi nagar'),
(2, '2015cmp002', 'tcl', '2017-06-16', 'john', 'james', 9856473889, 'john@gmail.com', 'cse,ece', 10, 10, 20, '6', 'marketing', '10', 'saturday,sunday', 'www.tcl.com', 'peenya');

-- --------------------------------------------------------

--
-- Table structure for table `eligibility`
--

CREATE TABLE `eligibility` (
  `id` int(11) NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `due` varchar(20) DEFAULT '0',
  `backlog` int(11) DEFAULT '0',
  `issues` varchar(30) DEFAULT '0',
  `withdrawal` varchar(20) DEFAULT '0',
  `undertaking` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eligibility`
--

INSERT INTO `eligibility` (`id`, `student_id`, `due`, `backlog`, `issues`, `withdrawal`, `undertaking`) VALUES
(1, '2015cse099', '0', 0, '0', '0', 'given'),
(2, '2015cve054', '10000', 0, '0', '0', '0'),
(3, '2015cse062', '0', 0, '0', '0', 'given'),
(4, 'q121', '0', 0, '0', '0', '0'),
(5, 'q123', '0', 0, '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `eligible_students`
--

CREATE TABLE `eligible_students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `cgpa` float NOT NULL,
  `branch` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eligible_students`
--

INSERT INTO `eligible_students` (`id`, `student_id`, `cgpa`, `branch`, `gender`) VALUES
(1, '2015cse099', 9, 'CSE', 'Female'),
(19, '2015cse062', 7.8, 'CSE', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `category_id`, `username`, `password`) VALUES
(1, 1, 'admin', 'admin'),
(2, 2, 'student', 'student'),
(3, 3, 'hod', 'hod'),
(4, 4, 'coe', 'coe'),
(5, 5, 'acc', 'acc'),
(6, 2, '2015mee099', '123456'),
(7, 2, '2015cse099', '1801'),
(8, 2, '2015cse062', '1234'),
(9, 2, '2015cse065', '1234'),
(10, 2, '2015cse060', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `preference`
--

CREATE TABLE `preference` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `preference_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preference`
--

INSERT INTO `preference` (`id`, `student_id`, `company_id`, `preference_no`) VALUES
(1, 2, 1, 1),
(2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `cgpa` float NOT NULL,
  `gender` varchar(20) NOT NULL,
  `eligibility` tinyint(1) NOT NULL DEFAULT '1',
  `date_of_birth` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `em_name` varchar(40) NOT NULL,
  `em_relation` varchar(30) NOT NULL,
  `em_contact` bigint(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_id`, `name`, `cgpa`, `gender`, `eligibility`, `date_of_birth`, `address`, `mobile`, `branch`, `email_id`, `blood_group`, `em_name`, `em_relation`, `em_contact`, `password`) VALUES
(1, '2015mee099', 'nithin', 9.2, 'Male', 1, '1997-09-13', 'bangalore', 9738374426, 'MEE', 'nithin1309@gmail.com', 'B+', 'lnreddy', 'father', 9945106474, '123456'),
(2, '2015cse099', 'pooja reddy', 9, 'Female', 1, '1998-01-18', 'bangalore', 7899979954, 'CSE', 'reddy1801@gmail.com', 'A+', 'manjula', 'mother', 9738374426, '1801'),
(3, '2015cse062', 'kavya', 7.8, 'Female', 1, '1997-04-19', 'bangalore', 9786543675, 'CSE', 'kavyaarun111@gmail.com', 'O+', 'pooja', 'friend', 7899979954, '1234'),
(4, '2015cse065', 'james', 9.3, 'Female', 1, '1997-04-19', 'bangalore', 8764523678, 'CSE', 'james@gmail.com', 'B+', 'pooja', 'student', 7899979954, '1234'),
(5, '2015cse060', 'kaushik', 8.3, 'Male', 1, '1997-08-20', 'bangalore', 9876543210, 'CSE', 'kaushik@gmail.com', 'O+', 'pooja', 'friend', 7899979954, '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allotment`
--
ALTER TABLE `allotment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f1` (`company_id`),
  ADD KEY `f2` (`student_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_requirements`
--
ALTER TABLE `company_requirements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_id` (`company_id`);

--
-- Indexes for table `eligibility`
--
ALTER TABLE `eligibility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eligible_students`
--
ALTER TABLE `eligible_students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `preference`
--
ALTER TABLE `preference`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allotment`
--
ALTER TABLE `allotment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company_requirements`
--
ALTER TABLE `company_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eligibility`
--
ALTER TABLE `eligibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `eligible_students`
--
ALTER TABLE `eligible_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `preference`
--
ALTER TABLE `preference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allotment`
--
ALTER TABLE `allotment`
  ADD CONSTRAINT `f1` FOREIGN KEY (`company_id`) REFERENCES `company_requirements` (`id`),
  ADD CONSTRAINT `f2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `preference`
--
ALTER TABLE `preference`
  ADD CONSTRAINT `preference_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_requirements` (`id`),
  ADD CONSTRAINT `preference_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
