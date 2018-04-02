-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2018 at 03:56 AM
-- Server version: 5.7.19
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
-- Database: `mitsekura`
--

-- --------------------------------------------------------

--
-- Table structure for table `adv`
--

DROP TABLE IF EXISTS `adv`;
CREATE TABLE IF NOT EXISTS `adv` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `branch` varchar(30) DEFAULT NULL,
  `fadv1` varchar(30) DEFAULT NULL,
  `fadv2` varchar(30) DEFAULT NULL,
  `batch` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `branch` (`branch`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adv`
--

INSERT INTO `adv` (`id`, `branch`, `fadv1`, `fadv2`, `batch`) VALUES
(1, 'CSE', 'EMP172/16', 'EMP184/15', '2015');

-- --------------------------------------------------------

--
-- Table structure for table `fac_adv`
--

DROP TABLE IF EXISTS `fac_adv`;
CREATE TABLE IF NOT EXISTS `fac_adv` (
  `f_regno` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `hod_regno` varchar(20) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `contact` int(10) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `position` varchar(50) NOT NULL DEFAULT 'Asst Professor',
  `photo` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL DEFAULT 'mitsekura@gmail.com',
  PRIMARY KEY (`f_regno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fac_adv`
--

INSERT INTO `fac_adv` (`f_regno`, `name`, `hod_regno`, `batch`, `contact`, `branch`, `position`, `photo`, `email`) VALUES
('EMP172/16', 'Bineeth Kuriakose', 'EMP200/17', '2017', 987654321, 'CSE', 'Asst Professor', 'EMP172_16.jpg', 'mitsekura@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `gatepass`
--

DROP TABLE IF EXISTS `gatepass`;
CREATE TABLE IF NOT EXISTS `gatepass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reqid` int(11) NOT NULL,
  `out_time` datetime NOT NULL,
  `guard_regno` varchar(30) NOT NULL,
  `appr_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `appr_regno` varchar(30) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `req_id` (`reqid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guard`
--

DROP TABLE IF EXISTS `guard`;
CREATE TABLE IF NOT EXISTS `guard` (
  `g_regno` varchar(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `contact` int(10) NOT NULL,
  `position` varchar(25) NOT NULL DEFAULT 'Asst Security',
  `photo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`g_regno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guard`
--

INSERT INTO `guard` (`g_regno`, `name`, `contact`, `position`, `photo`) VALUES
('EMP500/16', 'Vijay Babu', 987654321, 'Head Security', 'emp500_16,jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

DROP TABLE IF EXISTS `hod`;
CREATE TABLE IF NOT EXISTS `hod` (
  `h_regno` varchar(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `contact` int(10) DEFAULT NULL,
  `branch` varchar(10) DEFAULT NULL,
  `photo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`h_regno`),
  UNIQUE KEY `branch` (`branch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`h_regno`, `name`, `contact`, `branch`, `photo`) VALUES
('hodce', 'HODCE', NULL, 'CE', 'hodce.jpg'),
('hodcse', 'Dr. Tripti S Warrier', 987654321, 'CSE', 'hodcse.jpg'),
('hodece', 'HODECE', NULL, 'ECE', 'hodece.jpg'),
('hodeee', 'HODEEE', NULL, 'EEE', 'hodeee.jpg'),
('hodme', 'HODME', NULL, 'ME', 'hodme.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

DROP TABLE IF EXISTS `office`;
CREATE TABLE IF NOT EXISTS `office` (
  `o_regno` varchar(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `contact` int(10) DEFAULT NULL,
  `position` varchar(30) DEFAULT NULL,
  `photo` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parking_lot`
--

DROP TABLE IF EXISTS `parking_lot`;
CREATE TABLE IF NOT EXISTS `parking_lot` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `location` varchar(50) NOT NULL,
  `available` int(10) NOT NULL DEFAULT '0',
  `total` int(10) NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL DEFAULT 'CAR',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking_lot`
--

INSERT INTO `parking_lot` (`id`, `location`, `available`, `total`, `type`) VALUES
(1, 'NEAR BASKETBALL COURT', 15, 15, 'CAR'),
(2, 'BIKE PARKING', 100, 110, 'BIKE');

-- --------------------------------------------------------

--
-- Table structure for table `parking_space`
--

DROP TABLE IF EXISTS `parking_space`;
CREATE TABLE IF NOT EXISTS `parking_space` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  `user` varchar(200) NOT NULL,
  `slot_id` int(10) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `slot_id` (`slot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking_space`
--

INSERT INTO `parking_space` (`pid`, `status`, `user`, `slot_id`) VALUES
(1, 'FREE', '', 1),
(2, 'FREE', '', 1),
(3, 'FREE', '', 1),
(4, 'FREE', '', 1),
(5, 'FREE', '', 1),
(6, 'FREE', '', 1),
(7, 'FREE', '', 1),
(8, 'FREE', '', 1),
(9, 'FREE', '', 1),
(10, 'FREE', '', 1),
(11, 'FREE', '', 1),
(12, 'FREE', '', 1),
(13, 'FREE', '', 1),
(14, 'FREE', '', 1),
(15, 'FREE', '', 1),
(16, 'FREE', '', 2),
(17, 'FREE', '', 2),
(18, 'FREE', '', 2),
(19, 'FREE', '', 2),
(20, 'FREE', '', 2),
(21, 'FREE', '', 2),
(22, 'FREE', '', 2),
(23, 'FREE', '', 2),
(24, 'FREE', '', 2),
(25, 'FREE', '', 2),
(26, 'FREE', '', 1),
(27, 'FREE', '', 1),
(28, 'FREE', '', 1),
(29, 'FREE', '', 1),
(30, 'FREE', '', 1),
(31, 'FREE', '', 1),
(32, 'FREE', '', 1),
(33, 'FREE', '', 1),
(34, 'FREE', '', 1),
(35, 'FREE', '', 1),
(36, 'FREE', '', 1),
(37, 'FREE', '', 1),
(38, 'FREE', '', 1),
(39, 'FREE', '', 1),
(40, 'FREE', '', 1),
(41, 'FREE', '', 2),
(42, 'FREE', '', 2),
(43, 'FREE', '', 2),
(44, 'FREE', '', 2),
(45, 'FREE', '', 2),
(46, 'FREE', '', 2),
(47, 'FREE', '', 2),
(48, 'FREE', '', 2),
(49, 'FREE', '', 2),
(50, 'FREE', '', 2),
(51, 'FREE', '', 2),
(52, 'FREE', '', 2),
(53, 'FREE', '', 2),
(54, 'FREE', '', 2),
(55, 'FREE', '', 2),
(56, 'FREE', '', 2),
(57, 'FREE', '', 2),
(58, 'FREE', '', 2),
(59, 'FREE', '', 2),
(60, 'FREE', '', 2),
(61, 'FREE', '', 2),
(62, 'FREE', '', 2),
(63, 'FREE', '', 2),
(64, 'FREE', '', 2),
(65, 'FREE', '', 2),
(66, 'FREE', '', 2),
(67, 'FREE', '', 2),
(68, 'FREE', '', 2),
(69, 'FREE', '', 2),
(70, 'FREE', '', 2),
(71, 'FREE', '', 2),
(72, 'FREE', '', 2),
(73, 'FREE', '', 2),
(74, 'FREE', '', 2),
(75, 'FREE', '', 2),
(76, 'FREE', '', 2),
(77, 'FREE', '', 2),
(78, 'FREE', '', 2),
(79, 'FREE', '', 2),
(80, 'FREE', '', 2),
(81, 'FREE', '', 2),
(82, 'FREE', '', 2),
(83, 'FREE', '', 2),
(84, 'FREE', '', 2),
(85, 'FREE', '', 2),
(86, 'FREE', '', 2),
(87, 'FREE', '', 2),
(88, 'FREE', '', 2),
(89, 'FREE', '', 2),
(90, 'FREE', '', 2),
(91, 'FREE', '', 2),
(92, 'FREE', '', 2),
(93, 'FREE', '', 2),
(94, 'FREE', '', 2),
(95, 'FREE', '', 2),
(96, 'FREE', '', 2),
(97, 'FREE', '', 2),
(98, 'FREE', '', 2),
(99, 'FREE', '', 2),
(100, 'FREE', '', 2),
(101, 'FREE', '', 2),
(102, 'FREE', '', 2),
(103, 'FREE', '', 2),
(104, 'FREE', '', 2),
(105, 'FREE', '', 2),
(106, 'FREE', '', 2),
(107, 'FREE', '', 2),
(108, 'FREE', '', 2),
(109, 'FREE', '', 2),
(110, 'FREE', '', 2),
(111, 'FREE', '', 2),
(112, 'FREE', '', 2),
(113, 'FREE', '', 2),
(114, 'FREE', '', 2),
(115, 'FREE', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `regno` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `reg_as` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `regno`, `password`, `reg_as`) VALUES
(1, '15CS181', 'Aswin9037#', 'STUDENT'),
(2, '15GA101', 'guard123', 'GUARD'),
(3, 'admin', 'admin123', 'ADMIN'),
(4, 'EMP172/16', 'faculty1', 'FACULTY'),
(5, 'hodcse', 'hod123', 'HOD'),
(6, 'EMP100/13', 'office123', 'OFFICE'),
(7, 'EMP500/16', 'guard123', 'GUARD'),
(8, '15CS100', 'anjana123', 'STUDENT');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `reqid` int(11) NOT NULL AUTO_INCREMENT,
  `regno` varchar(20) NOT NULL,
  `cat` varchar(20) DEFAULT NULL,
  `reason` text,
  `exp_time` varchar(200) DEFAULT NULL,
  `curr_time` datetime DEFAULT NULL,
  `STATUS` varchar(30) NOT NULL DEFAULT 'WAITING_FACULTY_APPROVAL',
  `fappr_time` datetime DEFAULT NULL,
  `hodappr_time` datetime DEFAULT NULL,
  `officeappr_time` datetime DEFAULT NULL,
  `out_time` datetime DEFAULT NULL,
  `office_regno` varchar(20) DEFAULT NULL,
  `guard_regno` varchar(30) DEFAULT NULL,
  `ffor_time` datetime DEFAULT NULL,
  `fa_hod_msg` text,
  PRIMARY KEY (`reqid`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`reqid`, `regno`, `cat`, `reason`, `exp_time`, `curr_time`, `STATUS`, `fappr_time`, `hodappr_time`, `officeappr_time`, `out_time`, `office_regno`, `guard_regno`, `ffor_time`, `fa_hod_msg`) VALUES
(38, '15CS181', 'Health Problems', 'pain', '01 April 2018 - 23:55', '2018-04-01 22:25:25', 'GATEPASS_ISSUED', '2018-04-01 23:42:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, '15CS181', 'Private Functions', 'gserfbs', '01 April 2018 - 23:55', '2018-04-01 22:40:04', 'GATEPASS_ISSUED', '2018-04-01 23:31:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '15CS181', 'Health Problems', 'fever', '02 April 2018 - 23:40', '2018-04-01 23:44:38', 'GATEPASS_ISSUED', '2018-04-01 23:45:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '15CS181', 'Attending Events', 'asfcvav', '02 April 2018 - 08:25', '2018-04-01 23:48:36', 'GATEPASS_ISSUED', '2018-04-01 23:54:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '15CS181', 'Attending Events', 'asfcvav', '02 April 2018 - 08:25', '2018-04-01 23:48:38', 'GATEPASS_ISSUED', '2018-04-01 23:48:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, '15CS181', 'Other', 'scxa', '05 April 2018 - 09:30', '2018-04-01 23:54:48', 'GATEPASS_ISSUED', '2018-04-01 23:55:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, '15CS181', 'Attending Events', 'kjm', '20 April 2018 - 09:30', '2018-04-01 23:58:01', 'GATEPASS_ISSUED', '2018-04-01 23:58:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, '15CS181', 'Private Functions', 'kkml', '11 April 2018 - 09:30', '2018-04-01 23:59:02', 'GATEPASS_ISSUED', '2018-04-01 23:59:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, '15CS181', 'Other', 'xgxd', '05 April 2018 - 09:30', '2018-04-02 00:00:14', 'GATEPASS_ISSUED', '2018-04-02 00:00:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `req_trans`
--

DROP TABLE IF EXISTS `req_trans`;
CREATE TABLE IF NOT EXISTS `req_trans` (
  `trans_id` int(10) NOT NULL AUTO_INCREMENT,
  `req_id` int(10) DEFAULT NULL,
  `trans_type` varchar(30) DEFAULT NULL,
  `trans_time` datetime NOT NULL,
  `trans_status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `req_trans`
--

INSERT INTO `req_trans` (`trans_id`, `req_id`, `trans_type`, `trans_time`, `trans_status`) VALUES
(2, 31, 'STUDENT', '2018-03-30 19:35:49', 'REQUEST SEND'),
(4, 31, 'FACULTY', '2018-03-30 20:16:45', 'FORWARD_HOD'),
(5, 31, 'HOD', '2018-03-30 20:52:08', 'GATEPASS_ISSUED'),
(6, 32, 'STUDENT', '2018-03-31 21:29:57', 'REQUEST SEND'),
(7, 33, 'STUDENT', '2018-03-31 21:30:53', 'REQUEST SEND'),
(8, 31, 'GUARD', '2018-04-01 13:18:57', 'DEPARTED'),
(9, 34, 'STUDENT', '2018-04-01 13:21:35', 'REQUEST SEND'),
(10, 35, 'STUDENT', '2018-04-01 13:29:23', 'REQUEST SEND'),
(11, 36, 'STUDENT', '2018-04-01 13:29:53', 'REQUEST SEND'),
(12, 37, 'STUDENT', '2018-04-01 13:31:29', 'REQUEST SEND'),
(13, 32, 'FACULTY', '2018-04-01 14:18:59', 'GATEPASS_ISSUED'),
(14, 37, 'FACULTY', '2018-04-01 14:19:38', 'GATEPASS_ISSUED'),
(15, 38, 'STUDENT', '2018-04-01 22:25:25', 'REQUEST SEND'),
(16, 39, 'STUDENT', '2018-04-01 22:36:05', 'REQUEST SEND'),
(17, 40, 'STUDENT', '2018-04-01 22:40:04', 'REQUEST SEND'),
(18, 40, 'FACULTY', '2018-04-01 23:30:39', 'GATEPASS_ISSUED'),
(19, 40, 'FACULTY', '2018-04-01 23:31:24', 'GATEPASS_ISSUED'),
(20, 40, 'FACULTY', '2018-04-01 23:31:41', 'GATEPASS_ISSUED'),
(21, 38, 'FACULTY', '2018-04-01 23:42:28', 'GATEPASS_ISSUED'),
(22, 41, 'STUDENT', '2018-04-01 23:44:38', 'REQUEST SEND'),
(23, 41, 'FACULTY', '2018-04-01 23:45:03', 'GATEPASS_ISSUED'),
(24, 42, 'STUDENT', '2018-04-01 23:48:36', 'REQUEST SEND'),
(25, 43, 'STUDENT', '2018-04-01 23:48:38', 'REQUEST SEND'),
(26, 43, 'FACULTY', '2018-04-01 23:48:55', 'GATEPASS_ISSUED'),
(27, 42, 'FACULTY', '2018-04-01 23:54:01', 'GATEPASS_ISSUED'),
(28, 44, 'STUDENT', '2018-04-01 23:54:48', 'REQUEST SEND'),
(29, 44, 'FACULTY', '2018-04-01 23:55:18', 'GATEPASS_ISSUED'),
(30, 45, 'STUDENT', '2018-04-01 23:58:01', 'REQUEST SEND'),
(31, 45, 'FACULTY', '2018-04-01 23:58:13', 'GATEPASS_ISSUED'),
(32, 46, 'STUDENT', '2018-04-01 23:59:02', 'REQUEST SEND'),
(33, 46, 'FACULTY', '2018-04-01 23:59:15', 'GATEPASS_ISSUED'),
(34, 47, 'STUDENT', '2018-04-02 00:00:14', 'REQUEST SEND'),
(35, 47, 'FACULTY', '2018-04-02 00:00:38', 'GATEPASS_ISSUED');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `s_regno` varchar(20) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `branch` varchar(10) DEFAULT NULL,
  `batch` varchar(10) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `fad_regno` varchar(20) DEFAULT NULL,
  `fad2_regno` varchar(30) DEFAULT NULL,
  `hod_regno` varchar(20) DEFAULT NULL,
  `parent_email` varchar(100) DEFAULT 'mitsekura@gmail.com',
  `parent` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL DEFAULT 'mitsekura@gmail.com',
  `mobno` varchar(10) DEFAULT '0',
  `parent_mobno` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`s_regno`),
  KEY `s_regno` (`s_regno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_regno`, `name`, `branch`, `batch`, `photo`, `fad_regno`, `fad2_regno`, `hod_regno`, `parent_email`, `parent`, `email`, `mobno`, `parent_mobno`, `gender`) VALUES
('15CS100', 'Anjana George', 'CSE', '2015', '15CS100.jpg\r\n', 'EMP172/16', '', 'hodcse', NULL, NULL, 'mitsekura@gmail.com', '0', '0', NULL),
('15CS181', 'A V Aswin', 'CSE', '2015', '15CS181.jpg', 'EMP172/16', '', 'hodcse', 'mitsekura@gmail.com', 'Sunil Kumar', 'mitsekura@gmail.com', '0', '0', NULL),
('15CS187', ' vbc', 'hi', NULL, '15CS187', NULL, NULL, NULL, 'mitsekura@gmail.com', NULL, 'mitsekura@gmail.com', '0', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adv`
--
ALTER TABLE `adv`
  ADD CONSTRAINT `adv_ibfk_1` FOREIGN KEY (`branch`) REFERENCES `hod` (`branch`);

--
-- Constraints for table `gatepass`
--
ALTER TABLE `gatepass`
  ADD CONSTRAINT `gatepass_ibfk_1` FOREIGN KEY (`reqid`) REFERENCES `request` (`reqid`);

--
-- Constraints for table `parking_space`
--
ALTER TABLE `parking_space`
  ADD CONSTRAINT `parking_space_ibfk_1` FOREIGN KEY (`slot_id`) REFERENCES `parking_lot` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
