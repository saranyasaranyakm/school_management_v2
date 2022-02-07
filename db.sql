-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2022 at 03:06 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school_management`
--
CREATE DATABASE IF NOT EXISTS `school_management` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `school_management`;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` text NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(2, 'second'),
(4, '1');

-- --------------------------------------------------------

--
-- Table structure for table `stud_reg`
--

CREATE TABLE IF NOT EXISTS `stud_reg` (
  `stud_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(120) NOT NULL,
  `last_name` varchar(120) NOT NULL,
  `class` varchar(120) NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`stud_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `stud_reg`
--

INSERT INTO `stud_reg` (`stud_id`, `first_name`, `last_name`, `class`, `age`) VALUES
(19, 'saranya km', 'km', '10', 15),
(20, 'saranya km', 'aa', '4', 7);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` text NOT NULL,
  `sub_remark` text NOT NULL,
  `sub_added_by` text NOT NULL,
  `sub_added_Date` int(11) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `sub_remark`, `sub_added_by`, `sub_added_Date`) VALUES
(2, 'English', '', '', 0),
(3, 'maths', '', '', 0),
(4, 'chemistry', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teach_reg`
--

CREATE TABLE IF NOT EXISTS `teach_reg` (
  `teach_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(120) NOT NULL,
  `last_name` varchar(120) NOT NULL,
  `subject` int(11) NOT NULL,
  PRIMARY KEY (`teach_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `teach_reg`
--

INSERT INTO `teach_reg` (`teach_id`, `first_name`, `last_name`, `subject`) VALUES
(27, 'saranya', 'saranya', 3),
(31, 'nitha', 'v', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE IF NOT EXISTS `user_reg` (
  `user_id` int(120) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`user_id`, `user_name`, `password`) VALUES
(1, 'ss', '11'),
(2, 'saranya', '123'),
(3, 'ssasa', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
