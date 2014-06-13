-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2014 at 12:53 PM
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
-- Table structure for table `skill_rating_table`
--

CREATE TABLE IF NOT EXISTS `skill_rating_table` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `employee_code` int(100) NOT NULL,
  `skill` varchar(100) NOT NULL,
  `rating` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `skill_rating_table`
--

INSERT INTO `skill_rating_table` (`id`, `employee_code`, `skill`, `rating`) VALUES
(6, 456, 'dsds', 0),
(16, 3, 'dsds', 3),
(47, 1, '', 1),
(87, 0, 'Communications', 1),
(90, 0, 'Communications', 3),
(91, 0, 'Communications', 1),
(92, 0, 'Communications', 2),
(93, 0, 'Communications', 3),
(94, 11, 'Communications', 1),
(105, 11, 'Communications', 2),
(106, 15, 'Communications', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
