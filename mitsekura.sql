-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2018 at 10:03 PM
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
  PRIMARY KEY (`f_regno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fac_adv`
--

INSERT INTO `fac_adv` (`f_regno`, `name`, `hod_regno`, `batch`, `contact`, `branch`, `position`, `photo`) VALUES
('EMP172/16', 'Bineeth Kuriakose', 'EMP200/17', '2017', 987654321, 'CSE', 'Asst Professor', 'EMP172_16.jpg');

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
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `regno` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `reg_as` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `regno`, `password`, `reg_as`) VALUES
(1, '15CS181', 'Aswin9037#', 'STUDENT'),
(2, '15GA101', 'guard123', 'GUARD'),
(3, 'admin', 'admin123', 'ADMIN'),
(4, 'EMP172/16', 'faculty1', 'FACULTY'),
(5, 'EMP200/17', 'hod123', 'HOD'),
(6, 'EMP100/13', 'office123', 'OFFICE'),
(7, 'EMP500/16', 'guard123', 'GUARD');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`reqid`, `regno`, `cat`, `reason`, `exp_time`, `curr_time`, `STATUS`, `fappr_time`, `hodappr_time`, `officeappr_time`, `out_time`, `office_regno`, `guard_regno`, `ffor_time`, `fa_hod_msg`) VALUES
(23, '15CS181', 'Attending Events', 'Hackathon Meeting', '15 March 2018 - 12:35', '2018-03-14 02:17:13', 'GATEPASS_ISSUED', '2018-03-14 02:25:22', NULL, '2018-03-14 03:31:35', NULL, 'EMP100/13', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `s_regno` varchar(20) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `branch` varchar(10) DEFAULT NULL,
  `batch` varchar(10) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `fad_regno` varchar(20) NOT NULL,
  `hod_regno` varchar(20) NOT NULL,
  PRIMARY KEY (`s_regno`),
  KEY `s_regno` (`s_regno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_regno`, `name`, `branch`, `batch`, `photo`, `fad_regno`, `hod_regno`) VALUES
('15CS181', 'A V Aswin', 'CSE', '2015', '15CS181.jpg', 'EMP172/16', 'EMP200/17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
