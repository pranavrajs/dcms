-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2014 at 04:45 PM
-- Server version: 5.5.40-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cetdrishti`
--

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `CollegeId` int(11) NOT NULL AUTO_INCREMENT,
  `CollegeName` varchar(100) NOT NULL,
  PRIMARY KEY (`CollegeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=485 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `eve_sname` varchar(255) NOT NULL,
  `descr` longtext NOT NULL,
  `eve_format` longtext NOT NULL,
  `pbm_stat` longtext NOT NULL,
  `prize1` int(255) NOT NULL,
  `prize2` int(255) NOT NULL,
  `group` int(255) NOT NULL DEFAULT '0',
  `feat_image` varchar(120) DEFAULT 'http://cetdrishti.com/images/events/default.jpg',
  `max_no` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

-- --------------------------------------------------------

--
-- Table structure for table `event_reg`
--

CREATE TABLE IF NOT EXISTS `event_reg` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `eve_id` int(255) NOT NULL,
  `drs_id` int(255) NOT NULL,
  `report` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8276 ;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `event` int(255) NOT NULL,
  `mem1` int(255) NOT NULL,
  `mem2` int(255) NOT NULL,
  `mem3` int(255) NOT NULL,
  `mem4` int(255) NOT NULL,
  `mem5` int(255) NOT NULL,
  `mem6` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=534 ;

-- --------------------------------------------------------

--
-- Table structure for table `prize`
--

CREATE TABLE IF NOT EXISTS `prize` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `event_id` int(255) NOT NULL,
  `pos` int(10) NOT NULL,
  `cl_id` int(255) NOT NULL,
  `drs_id` int(255) NOT NULL,
  `points` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `drishti_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `college` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `phone2` varchar(255) NOT NULL,
  `accomodation` int(10) NOT NULL,
  `valid` longtext NOT NULL,
  `reg_bit` int(10) NOT NULL,
  `pay_bit` int(10) NOT NULL DEFAULT '0',
  `eves` varchar(255) DEFAULT '{}',
  PRIMARY KEY (`drishti_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1925 ;

-- --------------------------------------------------------

--
-- Table structure for table `stud_reg`
--

CREATE TABLE IF NOT EXISTS `stud_reg` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `level` int(10) NOT NULL,
  `event` int(255) NOT NULL DEFAULT '0',
  `valid` varchar(255) NOT NULL DEFAULT '0',
  `email_drs` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=158 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
