-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2017 at 11:15 PM
-- Server version: 5.6.36
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `col_off_kandra`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LINK_COURSE` (IN `SID` INT(11), OUT `CNT` INT(11))  insert into pg_session_course (session_id, course_id, active_flg, created_by, last_upd_by)
select b.row_id, a.row_id, 1, 0,0 from pg_course a, pg_session b
where a.active_flg = 1
and b.row_id = SID$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pg_course`
--

CREATE TABLE `pg_course` (
  `row_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` int(2) NOT NULL,
  `suffix` varchar(2) NOT NULL,
  `course_level_id` int(11) NOT NULL,
  `specialisation_id` int(11) NOT NULL,
  `start_month` int(2) NOT NULL,
  `duration_in_month` int(2) NOT NULL,
  `par_row_id` int(11) NOT NULL,
  `active_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_course`
--

INSERT INTO `pg_course` (`row_id`, `name`, `year`, `suffix`, `course_level_id`, `specialisation_id`, `start_month`, `duration_in_month`, `par_row_id`, `active_flg`, `created`, `created_by`, `last_upd_by`, `last_upd_dt`) VALUES
(1, 'B.A. HONS HISTORY 1ST YR', 1, 'ST', 1, 1, 6, 10, 0, 1, '2017-09-12 19:36:38', 0, 0, '2017-09-12 19:36:38'),
(2, 'B.A.HONS HISTORY 2ND YR', 2, 'ND', 1, 1, 4, 12, 1, 1, '2017-09-12 19:38:19', 0, 0, '2017-09-12 19:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `pg_course_level`
--

CREATE TABLE `pg_course_level` (
  `row_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_course_level`
--

INSERT INTO `pg_course_level` (`row_id`, `name`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(1, 'B.A.Hons', '2017-09-12 19:27:55', 0, '2017-09-12 19:27:55', 0),
(2, 'B.A. GENERAL', '2017-09-12 19:28:41', 0, '2017-09-12 19:28:41', 0),
(3, 'M.A.', '2017-09-12 19:31:37', 0, '2017-09-12 19:31:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_fee_item`
--

CREATE TABLE `pg_fee_item` (
  `row_id` int(11) NOT NULL,
  `par_row_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(6) NOT NULL,
  `due_by` int(4) NOT NULL,
  `due_by_unit` varchar(6) NOT NULL,
  `active_flg` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_fee_item`
--

INSERT INTO `pg_fee_item` (`row_id`, `par_row_id`, `name`, `amount`, `due_by`, `due_by_unit`, `active_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(1, 1, 'Admission Fee', 200, 20, 'days', 1, '2017-09-15 21:20:46', 0, '2017-09-15 21:20:46', 0),
(2, 1, 'Exam Fee', 100, 60, 'days', 1, '2017-09-15 21:21:22', 0, '2017-09-15 21:21:22', 0),
(3, 2, 'Admission Fee', 300, 30, 'days', 1, '2017-09-15 21:21:50', 0, '2017-09-15 21:21:50', 0),
(4, 2, 'Exam Fee', 150, 60, 'days', 1, '2017-09-15 21:22:17', 0, '2017-09-15 21:22:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_fee_item_discount`
--

CREATE TABLE `pg_fee_item_discount` (
  `row_id` int(11) NOT NULL,
  `par_row_id` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  `amount` int(6) NOT NULL,
  `active_flg` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_fee_item_discount`
--

INSERT INTO `pg_fee_item_discount` (`row_id`, `par_row_id`, `category`, `amount`, `active_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(1, 1, 'SC', 100, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 3, 'ST', 50, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 4, 'SC', 100, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 2, 'OBC-A', 100, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 1, 'ST', 110, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 2, 'PH', 120, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_fee_master`
--

CREATE TABLE `pg_fee_master` (
  `row_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `active_flg` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_fee_master`
--

INSERT INTO `pg_fee_master` (`row_id`, `course_id`, `name`, `active_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(1, 1, 'Session Charge', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 2, 'Session Charge', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_scheme`
--

CREATE TABLE `pg_scheme` (
  `row_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_dt` date NOT NULL,
  `end_dt` date DEFAULT NULL,
  `active_flg` tinyint(1) NOT NULL,
  `criteria` text,
  `amount` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) NOT NULL,
  `last_upd_dt` datetime NOT NULL,
  `last_upd_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_scheme`
--

INSERT INTO `pg_scheme` (`row_id`, `name`, `start_dt`, `end_dt`, `active_flg`, `criteria`, `amount`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(101, 'Kanysahree', '2012-01-01', NULL, 0, 'Girl student aged 16 to 22', 12000, '2017-09-08 20:58:34', 0, '0000-00-00 00:00:00', 0),
(102, 'Kanysahree II', '2012-01-01', NULL, 1, 'Girl student aged 16 to 22', 16000, '2017-09-08 20:58:34', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_schm_application`
--

CREATE TABLE `pg_schm_application` (
  `row_id` int(11) NOT NULL,
  `scheme_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `scheme_time` int(6) NOT NULL,
  `amount` int(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'New',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved_dt` datetime DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_schm_application`
--

INSERT INTO `pg_schm_application` (`row_id`, `scheme_id`, `student_id`, `scheme_time`, `amount`, `status`, `created`, `approved_dt`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(10000001, 101, 10000001, 0, 12000, 'New', '2017-09-08 21:12:02', NULL, 0, '2017-09-08 21:12:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_session`
--

CREATE TABLE `pg_session` (
  `row_id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `start_dt` date NOT NULL,
  `end_dt` date NOT NULL,
  `active_flg` tinyint(1) NOT NULL,
  `course_linked` tinyint(1) NOT NULL,
  `par_row_id` int(11) DEFAULT NULL COMMENT 'prev_session_id',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_session`
--

INSERT INTO `pg_session` (`row_id`, `name`, `start_dt`, `end_dt`, `active_flg`, `course_linked`, `par_row_id`, `created`, `created_by`, `last_upd_by`, `last_upd_dt`) VALUES
(6, '2016-17', '2016-06-01', '2017-04-30', 0, 0, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(9, '2017-18', '2017-06-01', '2018-04-30', 1, 0, 6, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(10, '2018-19', '2018-06-01', '2019-04-30', 0, 0, 9, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(11, '2019-20', '2019-06-01', '2020-04-30', 0, 0, 10, '2017-09-11 21:48:07', 0, 0, '2017-09-11 21:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `pg_session_course`
--

CREATE TABLE `pg_session_course` (
  `row_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `start_dt` date DEFAULT NULL,
  `end_dt` date DEFAULT NULL,
  `active_flg` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_session_course`
--

INSERT INTO `pg_session_course` (`row_id`, `session_id`, `course_id`, `start_dt`, `end_dt`, `active_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(1, 6, 1, NULL, NULL, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 6, 2, NULL, NULL, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 9, 1, NULL, NULL, 1, '2017-09-14 00:51:18', 0, '2017-09-14 00:51:18', 0),
(4, 9, 2, NULL, NULL, 1, '2017-09-14 00:51:18', 0, '2017-09-14 00:51:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_session_course_student`
--

CREATE TABLE `pg_session_course_student` (
  `row_id` int(11) NOT NULL,
  `session_course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `active_flg` tinyint(1) NOT NULL DEFAULT '1',
  `promo_retained` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_session_course_student`
--

INSERT INTO `pg_session_course_student` (`row_id`, `session_course_id`, `student_id`, `active_flg`, `promo_retained`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(1, 1, 10000001, 1, 0, '2017-09-17 08:38:15', 0, '2017-09-17 08:38:15', 0),
(2, 1, 10000002, 1, 0, '2017-09-17 08:38:15', 0, '2017-09-17 08:38:15', 0),
(5, 2, 10000003, 1, 1, '2017-10-09 21:02:09', 0, '2017-10-09 21:02:09', 0),
(6, 2, 10000004, 1, 1, '2017-10-09 21:02:10', 0, '2017-10-09 21:02:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_specialisation`
--

CREATE TABLE `pg_specialisation` (
  `row_id` int(11) NOT NULL,
  `course_level_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `pr_subject_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_specialisation`
--

INSERT INTO `pg_specialisation` (`row_id`, `course_level_id`, `name`, `pr_subject_id`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(1, 1, 'HISTORY', 1, '2017-09-12 19:34:05', 0, '2017-09-12 19:34:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_staff`
--

CREATE TABLE `pg_staff` (
  `row_id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `fst_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `staff_id` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_staff`
--

INSERT INTO `pg_staff` (`row_id`, `title`, `fst_name`, `middle_name`, `last_name`, `dob`, `staff_id`, `email`, `mobile`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(10001, 'Mr.', 'Mrinmoy', NULL, 'Bandopadhya', '1997-09-05', '1', NULL, NULL, '0000-00-00 00:00:00', 0, '2017-09-08 21:06:20', 0),
(10002, 'Mr.', 'Manomoy', NULL, 'Bandopadhya', '1997-09-05', '2', NULL, NULL, '0000-00-00 00:00:00', 0, '2017-09-08 21:06:20', 0),
(10003, 'Mr.', 'Manomoy', NULL, 'Banerjee', '1997-09-05', '3', NULL, NULL, '0000-00-00 00:00:00', 0, '2017-09-08 21:06:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_staff_payment`
--

CREATE TABLE `pg_staff_payment` (
  `row_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `amount` int(6) NOT NULL,
  `payment_dt` date NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `active_flg` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pg_student`
--

CREATE TABLE `pg_student` (
  `row_id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `fst_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(12) NOT NULL,
  `aadhaar_no` varchar(12) DEFAULT NULL,
  `category` varchar(10) NOT NULL,
  `ph_challenged` tinyint(1) NOT NULL DEFAULT '0',
  `old_student_id` varchar(15) DEFAULT NULL,
  `active_flg` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) NOT NULL,
  `last_upd_dt` datetime NOT NULL,
  `last_upd_by` int(10) NOT NULL,
  `blood_group` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_student`
--

INSERT INTO `pg_student` (`row_id`, `title`, `fst_name`, `middle_name`, `last_name`, `dob`, `gender`, `aadhaar_no`, `category`, `ph_challenged`, `old_student_id`, `active_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`, `blood_group`) VALUES
(10000001, 'Mr.', 'Mridul', NULL, 'Bhattacharya', '1997-09-05', 'Male', NULL, 'OBC-A', 0, NULL, 1, '2017-09-08 21:10:31', 0, '0000-00-00 00:00:00', 0, NULL),
(10000002, 'Mr.', 'Rajen', NULL, 'Chakraborty', '1997-09-05', 'Male', NULL, 'ST', 1, NULL, 1, '2017-09-08 21:10:31', 0, '0000-00-00 00:00:00', 0, NULL),
(10000003, 'MR.', 'Suman', '', 'Singh', '2017-10-03', 'Male', '12434567888', '', 0, NULL, 1, '2017-10-06 08:40:14', 0, '0000-00-00 00:00:00', 0, NULL),
(10000004, 'Trans', 'Sumana', '', 'Singh', '2017-10-01', 'Female', '12434567800', '', 0, NULL, 1, '2017-10-06 08:44:31', 0, '0000-00-00 00:00:00', 0, NULL),
(10000005, 'MS.', 'Srabonti', '', 'Saha', '2017-10-02', 'Female', '4889390', '', 0, NULL, 1, '2017-10-06 08:47:32', 0, '0000-00-00 00:00:00', 0, NULL),
(10000006, 'MR.', 'Soujanya', 'Kumar', 'Sarkar', '2017-10-02', 'Male', '998889090900', 'SC', 0, NULL, 1, '2017-10-06 20:13:14', 0, '0000-00-00 00:00:00', 0, NULL),
(10000007, 'MR.', 'Soujanya', '', 'Sarkar', '2017-10-01', 'Male', '998889090900', '', 0, NULL, 1, '2017-10-06 20:14:26', 0, '0000-00-00 00:00:00', 0, NULL),
(10000008, 'MS.', 'Radha', 'rani', 'Dutta', '2017-10-01', 'Female', '123412341234', 'GENERAL', 1, NULL, 1, '2017-10-06 20:17:03', 0, '0000-00-00 00:00:00', 0, NULL),
(10000047, 'MR.', 'Raju', '', 'Bag', '2017-10-04', 'Male', '', 'GENERAL', 0, NULL, 1, '2017-10-14 18:49:45', 0, '0000-00-00 00:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pg_student_address`
--

CREATE TABLE `pg_student_address` (
  `row_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `address_type` varchar(10) NOT NULL,
  `addr` varchar(50) NOT NULL,
  `addr_line_2` varchar(50) DEFAULT NULL,
  `addr_line_3` varchar(30) DEFAULT NULL,
  `state` varchar(30) NOT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `active_flg` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pg_student_board`
--

CREATE TABLE `pg_student_board` (
  `row_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `board_name` varchar(50) NOT NULL,
  `level` int(2) NOT NULL,
  `instituition_name` int(11) NOT NULL,
  `session_course_id` int(11) DEFAULT NULL,
  `roll` varchar(15) DEFAULT NULL,
  `index_no` varchar(15) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pg_student_email`
--

CREATE TABLE `pg_student_email` (
  `row_id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `active_flg` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_student_email`
--

INSERT INTO `pg_student_email` (`row_id`, `student_id`, `email`, `active_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(1, 10000001, 'mpmanas@gmail.com', 0, '2017-10-07 23:38:40', 0, '2017-10-07 23:38:40', 0),
(2, 10000001, 'mpmanas_patra2001@yahoo.com', 1, '2017-10-07 23:41:06', 0, '2017-10-07 23:41:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_student_emergency_contact`
--

CREATE TABLE `pg_student_emergency_contact` (
  `row_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `active_flg` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pg_student_invoice`
--

CREATE TABLE `pg_student_invoice` (
  `row_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `session_course_id` int(11) NOT NULL,
  `invoice_dt` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `fee_id` int(11) NOT NULL,
  `paid_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_student_invoice`
--

INSERT INTO `pg_student_invoice` (`row_id`, `student_id`, `session_course_id`, `invoice_dt`, `name`, `fee_id`, `paid_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(37, 10000001, 1, '0000-00-00', 'Session Charge', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, 10000002, 1, '0000-00-00', 'Session Charge', 1, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_student_invoice_item`
--

CREATE TABLE `pg_student_invoice_item` (
  `row_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(6) NOT NULL,
  `discount_category` varchar(6) DEFAULT NULL,
  `discount` int(6) NOT NULL,
  `due_dt` date NOT NULL,
  `paid_flg` tinyint(1) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `active_flg` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_student_invoice_item`
--

INSERT INTO `pg_student_invoice_item` (`row_id`, `invoice_id`, `item_id`, `name`, `amount`, `discount_category`, `discount`, `due_dt`, `paid_flg`, `payment_id`, `active_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(23, 35, 1, 'Admission Fee', 200, 'NA', 0, '2017-06-01', 0, NULL, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 35, 2, 'Exam Fee', 100, 'OBC-A', 100, '2017-06-01', 0, NULL, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 36, 1, 'Admission Fee', 200, 'NA', 0, '2017-06-01', 0, NULL, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 36, 2, 'Exam Fee', 100, 'PH', 120, '2017-06-01', 1, NULL, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 37, 1, 'Admission Fee', 200, 'NA', 0, '2017-06-01', 1, 40, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 37, 2, 'Exam Fee', 100, 'OBC-A', 50, '2017-06-01', 1, 41, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, 38, 1, 'Admission Fee', 200, 'NA', 0, '2017-06-01', 1, 49, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, 38, 2, 'Exam Fee', 100, 'PH', 80, '2017-06-01', 1, 49, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_student_marks`
--

CREATE TABLE `pg_student_marks` (
  `row_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `std_board_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `marks` int(5) NOT NULL,
  `full_marks` int(5) NOT NULL,
  `pass_marks` int(5) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pg_student_mobile`
--

CREATE TABLE `pg_student_mobile` (
  `row_id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `mobile_num` varchar(10) NOT NULL,
  `active_flg` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_student_mobile`
--

INSERT INTO `pg_student_mobile` (`row_id`, `student_id`, `mobile_num`, `active_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(1001, 100001, '9874055573', 0, '2017-09-09 17:34:26', 0, '2017-09-09 17:34:26', 0),
(1002, 10000001, '9564216736', 0, '2017-10-07 19:19:04', 0, '2017-10-07 19:19:04', 0),
(1003, 10000001, '9564216736', 1, '2017-10-07 19:20:04', 0, '2017-10-07 19:20:04', 0),
(1004, 10000001, '9432431147', 1, '2017-10-07 19:28:38', 0, '2017-10-07 19:28:38', 0),
(1005, 10000001, '9432431147', 1, '2017-10-07 19:28:40', 0, '2017-10-07 19:28:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_student_payment`
--

CREATE TABLE `pg_student_payment` (
  `row_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_dt` int(11) NOT NULL,
  `pay_mode` int(11) NOT NULL,
  `bank_name` varchar(30) DEFAULT NULL,
  `cheque_number` varchar(15) DEFAULT NULL,
  `active_flg` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_student_payment`
--

INSERT INTO `pg_student_payment` (`row_id`, `student_id`, `invoice_id`, `amount`, `payment_dt`, `pay_mode`, `bank_name`, `cheque_number`, `active_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(39, 1000001, 37, 250, 2017, 0, NULL, NULL, 0, '2017-09-24 15:34:44', 0, '2017-09-24 15:34:44', 0),
(40, 1000001, 37, 200, 2017, 0, NULL, NULL, 0, '2017-09-24 15:39:15', 0, '2017-09-24 15:39:15', 0),
(41, 1000001, 37, 50, 2017, 0, NULL, NULL, 0, '2017-09-24 15:40:17', 0, '2017-09-24 15:40:17', 0),
(47, 10000002, 38, 220, 2017, 0, NULL, NULL, 0, '2017-10-23 11:32:26', 0, '2017-10-23 11:32:26', 0),
(48, 10000002, 38, 220, 2017, 0, NULL, NULL, 0, '2017-10-23 11:39:55', 0, '2017-10-23 11:39:55', 0),
(49, 10000002, 38, 220, 2017, 0, NULL, NULL, 0, '2017-10-23 11:44:42', 0, '2017-10-23 11:44:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_student_ph`
--

CREATE TABLE `pg_student_ph` (
  `row_id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `std_code` varchar(6) NOT NULL,
  `ph_num` varchar(10) NOT NULL,
  `active_flg` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_student_ph`
--

INSERT INTO `pg_student_ph` (`row_id`, `student_id`, `std_code`, `ph_num`, `active_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(100001, 10000001, '033', '25266486', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(100002, 10000001, '033', '25266486', 0, '2017-10-07 23:27:30', 0, '2017-10-07 23:27:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_student_photo`
--

CREATE TABLE `pg_student_photo` (
  `row_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `filename` varchar(30) NOT NULL,
  `active_flg` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_student_photo`
--

INSERT INTO `pg_student_photo` (`row_id`, `student_id`, `filename`, `active_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(5, 10000001, '10000001_logo.png', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 10000001, '10000001_1_logo.png', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 10000001, '10000001_2_logo.png', 0, '0000-00-00 00:00:00', 0, '2017-10-14 20:38:02', 0),
(8, 10000001, '10000001_3_logo.png', 0, '0000-00-00 00:00:00', 0, '2017-10-14 20:38:02', 0),
(9, 10000001, '10000001_GEMS.jpg', 0, '0000-00-00 00:00:00', 0, '2017-10-14 20:37:21', 0),
(10, 10000001, '10000001_1_GEMS.jpg', 0, '0000-00-00 00:00:00', 0, '2017-10-14 20:38:02', 0),
(11, 10000001, '10000001_2_GEMS.jpg', 0, '0000-00-00 00:00:00', 0, '2017-10-14 20:40:02', 0),
(12, 10000001, '10000001_4_logo.png', 0, '0000-00-00 00:00:00', 0, '2017-10-15 00:21:11', 0),
(13, 10000002, '10000002_logo.png', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 10000001, '10000001_3_GEMS.jpg', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 10000002, '10000002_Painting by Mick.jpg', 0, '0000-00-00 00:00:00', 0, '2017-10-15 00:56:45', 0),
(16, 10000003, '10000003_logo.png', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 10000002, '10000002_GEMS.jpg', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 10000004, '10000004_Painting by Mick.jpg', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_student_relation`
--

CREATE TABLE `pg_student_relation` (
  `row_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `relationship` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pg_subject`
--

CREATE TABLE `pg_subject` (
  `row_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject_code` varchar(10) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pg_subject`
--

INSERT INTO `pg_subject` (`row_id`, `name`, `subject_code`, `created`, `created_by`, `last_upd_dt`, `last_upd_by`) VALUES
(1, 'HISTORY', 'HST', '2017-09-12 19:32:30', 0, '2017-09-12 19:32:30', 0),
(2, 'WORLD HISTORY', 'WHS', '2017-09-12 19:33:12', 0, '2017-09-12 19:33:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pg_vendor`
--

CREATE TABLE `pg_vendor` (
  `row_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `registration_number` varchar(15) DEFAULT NULL,
  `ph` varchar(15) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `pincode` int(7) NOT NULL,
  `active_flg` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pg_vendor_payment`
--

CREATE TABLE `pg_vendor_payment` (
  `row_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `amount` int(6) NOT NULL,
  `payment_dt` date NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `active_flg` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_upd_dt` datetime NOT NULL,
  `last_upd_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `patient_id` int(10) NOT NULL DEFAULT '0',
  `GENDER` varchar(6) NOT NULL,
  `user_first_name` varchar(100) NOT NULL,
  `user_last_name` varchar(100) NOT NULL,
  `user_address` varchar(500) DEFAULT NULL,
  `user_city` varchar(100) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `age` int(3) NOT NULL,
  `user_cell_num` varchar(12) NOT NULL,
  `user_alt_cell_num` varchar(12) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `aadhaar_no` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`patient_id`, `GENDER`, `user_first_name`, `user_last_name`, `user_address`, `user_city`, `user_dob`, `age`, `user_cell_num`, `user_alt_cell_num`, `user_email`, `create_date`, `isSync`, `aadhaar_no`) VALUES
(0, 'Male', 'Manas', 'Patra', 'kjfd', '', '2017-09-09', 0, '9874055573', '', 'mpmanas@gmail.com', '2017-09-09 11:34:09', 0, NULL),
(0, 'Female', 'keya', 'patra', 'abc', 'xyz', '2017-09-10', 0, '9876543210', '', 'kpkeya@gmail.com', '2017-09-10 11:45:45', 0, NULL),
(0, 'Female', 'radha', 'kundu', 'hfilh', 'kokoko', '2017-09-03', 0, '9876543211', '', 'kpkeyqa@gmail.com', '2017-09-10 12:24:36', 0, NULL),
(0, 'Female', 'soumik', 'patra', 'hjkkl', 'kolkatr', '2017-09-01', 0, '987654322', '', 'spatra@gmail.com', '2017-09-10 12:42:10', 0, NULL),
(0, 'Female', 'biswa', 'gh', 'kg', 'jjjikh', '2017-09-01', 0, '9876543210', '', 'bhjo@gmail.com', '2017-09-10 13:23:33', 0, '123456789001'),
(0, 'Female', 'subha', 'dull', 'dlk', 'abc', '2017-09-01', 0, '9876543210', '', 'fkn', '2017-09-10 13:43:20', 0, '49853841'),
(0, 'Male', 'hjkk', 'kuio', 'kb', 'fghhh', '2017-09-01', 0, '9876543216', '', 'abb@gmail.com', '2017-09-10 13:58:01', 0, '9898980');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_full_name` varchar(200) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `role` enum('ADMIN','ACCOUNTS','PRINCIPAL','STUDENT','PROFESSOR','GUEST') NOT NULL,
  `date_added` datetime NOT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isSync` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_full_name`, `user_password`, `role`, `date_added`, `created_by_user_id`, `create_date`, `isSync`) VALUES
(1, 'mrinalkantee', 'Dr. Mrinal Kanti Chattopadhay', 'c7a85972e188c669f0d1e24528a772a3', 'PRINCIPAL', '2012-06-11 15:42:40', 0, '0000-00-00 00:00:00', 0),
(2, 'jghosh', 'Mr. Jyosthnasish Ghosh', 'c7a85972e188c669f0d1e24528a772a3', 'PROFESSOR', '2012-06-11 15:42:40', 0, '0000-00-00 00:00:00', 0),
(3, 'bghos', 'Mr. Biswarup Ghoshal', 'c7a85972e188c669f0d1e24528a772a3', 'ACCOUNTS', '0000-00-00 00:00:00', 0, '2017-08-18 15:41:50', 0),
(4, 'mpmanas', 'Manas Patra', 'c7a85972e188c669f0d1e24528a772a3', 'STUDENT', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 'kpke', 'keya patra', 'c7a85972e188c669f0d1e24528a772a3', 'STUDENT', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'rk', 'radha kundu', 'bd8efa321bb3e6497d055e92ea0ac0d4', 'STUDENT', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 'spatra', 'soumik patra', 'c7a85972e188c669f0d1e24528a772a3', 'STUDENT', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'bghkhl', 'biswa gh', 'c7a85972e188c669f0d1e24528a772a3', 'STUDENT', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 'kjgdh', 'subha dull', 'c7a85972e188c669f0d1e24528a772a3', 'STUDENT', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, ',jhgk', 'hjkk kuio', 'da81aab2c29568a5d8a35077d8a59917', 'STUDENT', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pg_course`
--
ALTER TABLE `pg_course`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `year` (`year`,`course_level_id`,`specialisation_id`),
  ADD KEY `par_row_id` (`par_row_id`);

--
-- Indexes for table `pg_course_level`
--
ALTER TABLE `pg_course_level`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `pg_fee_item`
--
ALTER TABLE `pg_fee_item`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `par_row_id` (`par_row_id`);

--
-- Indexes for table `pg_fee_item_discount`
--
ALTER TABLE `pg_fee_item_discount`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `par_row_id` (`par_row_id`);

--
-- Indexes for table `pg_fee_master`
--
ALTER TABLE `pg_fee_master`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `pg_scheme`
--
ALTER TABLE `pg_scheme`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `pg_schm_application`
--
ALTER TABLE `pg_schm_application`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `scheme_id_3` (`scheme_id`,`student_id`,`scheme_time`);

--
-- Indexes for table `pg_session`
--
ALTER TABLE `pg_session`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `par_row_id` (`par_row_id`);

--
-- Indexes for table `pg_session_course`
--
ALTER TABLE `pg_session_course`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `session_id` (`session_id`,`course_id`),
  ADD KEY `session_id_2` (`session_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `pg_session_course_student`
--
ALTER TABLE `pg_session_course_student`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `session_course_id` (`session_course_id`,`student_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `session_course_id_2` (`session_course_id`);

--
-- Indexes for table `pg_specialisation`
--
ALTER TABLE `pg_specialisation`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `pg_staff`
--
ALTER TABLE `pg_staff`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `staff_id` (`staff_id`);

--
-- Indexes for table `pg_staff_payment`
--
ALTER TABLE `pg_staff_payment`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `payment_dt` (`payment_dt`);

--
-- Indexes for table `pg_student`
--
ALTER TABLE `pg_student`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `old_student_id` (`old_student_id`);

--
-- Indexes for table `pg_student_address`
--
ALTER TABLE `pg_student_address`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `pg_student_board`
--
ALTER TABLE `pg_student_board`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `student_id_2` (`student_id`,`level`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `session_course_id` (`session_course_id`);

--
-- Indexes for table `pg_student_email`
--
ALTER TABLE `pg_student_email`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `pg_student_emergency_contact`
--
ALTER TABLE `pg_student_emergency_contact`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `pg_student_invoice`
--
ALTER TABLE `pg_student_invoice`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `student_id_2` (`student_id`,`session_course_id`,`fee_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `pg_student_invoice_item`
--
ALTER TABLE `pg_student_invoice_item`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `invoice_id_2` (`invoice_id`,`item_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `pg_student_marks`
--
ALTER TABLE `pg_student_marks`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `student_id_2` (`student_id`,`std_board_id`,`subject_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `pg_student_mobile`
--
ALTER TABLE `pg_student_mobile`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `mobile_num` (`mobile_num`);

--
-- Indexes for table `pg_student_payment`
--
ALTER TABLE `pg_student_payment`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `payment_dt` (`payment_dt`);

--
-- Indexes for table `pg_student_ph`
--
ALTER TABLE `pg_student_ph`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `pg_student_photo`
--
ALTER TABLE `pg_student_photo`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `pg_student_relation`
--
ALTER TABLE `pg_student_relation`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `pg_subject`
--
ALTER TABLE `pg_subject`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `pg_vendor`
--
ALTER TABLE `pg_vendor`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `pg_vendor_payment`
--
ALTER TABLE `pg_vendor_payment`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `payment_dt` (`payment_dt`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pg_course`
--
ALTER TABLE `pg_course`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pg_course_level`
--
ALTER TABLE `pg_course_level`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pg_fee_item`
--
ALTER TABLE `pg_fee_item`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pg_fee_item_discount`
--
ALTER TABLE `pg_fee_item_discount`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pg_fee_master`
--
ALTER TABLE `pg_fee_master`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pg_scheme`
--
ALTER TABLE `pg_scheme`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `pg_schm_application`
--
ALTER TABLE `pg_schm_application`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000002;
--
-- AUTO_INCREMENT for table `pg_session`
--
ALTER TABLE `pg_session`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pg_session_course`
--
ALTER TABLE `pg_session_course`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pg_session_course_student`
--
ALTER TABLE `pg_session_course_student`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pg_specialisation`
--
ALTER TABLE `pg_specialisation`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pg_staff`
--
ALTER TABLE `pg_staff`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;
--
-- AUTO_INCREMENT for table `pg_staff_payment`
--
ALTER TABLE `pg_staff_payment`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pg_student`
--
ALTER TABLE `pg_student`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000048;
--
-- AUTO_INCREMENT for table `pg_student_address`
--
ALTER TABLE `pg_student_address`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pg_student_board`
--
ALTER TABLE `pg_student_board`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pg_student_email`
--
ALTER TABLE `pg_student_email`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pg_student_emergency_contact`
--
ALTER TABLE `pg_student_emergency_contact`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pg_student_invoice`
--
ALTER TABLE `pg_student_invoice`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `pg_student_invoice_item`
--
ALTER TABLE `pg_student_invoice_item`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `pg_student_marks`
--
ALTER TABLE `pg_student_marks`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pg_student_mobile`
--
ALTER TABLE `pg_student_mobile`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;
--
-- AUTO_INCREMENT for table `pg_student_payment`
--
ALTER TABLE `pg_student_payment`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `pg_student_ph`
--
ALTER TABLE `pg_student_ph`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100003;
--
-- AUTO_INCREMENT for table `pg_student_photo`
--
ALTER TABLE `pg_student_photo`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pg_student_relation`
--
ALTER TABLE `pg_student_relation`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pg_subject`
--
ALTER TABLE `pg_subject`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pg_vendor`
--
ALTER TABLE `pg_vendor`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pg_vendor_payment`
--
ALTER TABLE `pg_vendor_payment`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
