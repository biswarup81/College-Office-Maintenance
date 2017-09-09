-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2017 at 05:56 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `col_off_kandra`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(40) NOT NULL,
  `user_full_name` varchar(200) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `role` enum('ADMIN','ACCOUNTS','PRINCIPAL','STUDENT','PROFESSOR','GUEST') NOT NULL,
  `date_added` datetime NOT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_full_name`, `user_password`, `role`, `date_added`, `created_by_user_id`, `create_date`, `isSync`) VALUES
(1, 'mrinalkantee', 'Dr. Mrinal Kanti Chattopadhay', 'c7a85972e188c669f0d1e24528a772a3', 'PRINCIPAL', '2012-06-11 15:42:40', 0, '0000-00-00 00:00:00', 0),
(2, 'jghosh', 'Mr. Jyosthnasish Ghosh', 'c7a85972e188c669f0d1e24528a772a3', 'PROFESSOR', '2012-06-11 15:42:40', 0, '0000-00-00 00:00:00', 0),
(3, 'bghos', 'Mr. Biswarup Ghoshal', 'c7a85972e188c669f0d1e24528a772a3', 'ACCOUNTS', '0000-00-00 00:00:00', 0, '2017-08-18 15:41:50', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
