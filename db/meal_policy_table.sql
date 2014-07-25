-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2014 at 12:52 PM
-- Server version: 5.5.37
-- PHP Version: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `punch`
--

-- --------------------------------------------------------

--
-- Table structure for table `meal_policy_table`
--

CREATE TABLE IF NOT EXISTS `meal_policy_table` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `meal_type` char(100) NOT NULL,
  `start_time` time NOT NULL,
  `stop_time` time NOT NULL,
  `status` int(100) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `meal_policy_table`
--

INSERT INTO `meal_policy_table` (`id`, `meal_type`, `start_time`, `stop_time`, `status`) VALUES
(1, 'bivinvinv', '07:30:00', '12:30:00', 1),
(2, 'dammmm', '00:00:00', '01:01:00', 1),
(3, 'dammmm', '00:00:00', '01:01:00', 1),
(4, '', '00:00:00', '03:00:00', 0),
(5, 'dfgdfgdf', '00:00:00', '17:00:00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
