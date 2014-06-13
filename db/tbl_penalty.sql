-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2014 at 01:00 PM
-- Server version: 5.5.35
-- PHP Version: 5.4.27-1+deb.sury.org~precise+1

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
-- Table structure for table `tbl_penalty`
--

CREATE TABLE IF NOT EXISTS `tbl_penalty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penalty_date` date DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `dis` text,
  `emp_name` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tbl_penalty`
--

INSERT INTO `tbl_penalty` (`id`, `penalty_date`, `amount`, `dis`, `emp_name`) VALUES
(31, '2014-01-14', '300', 'late', 1),
(32, '2014-01-15', '100', 'late', 1),
(33, '2014-01-18', '250', 'late', 1),
(34, '2014-01-01', '300', 'jj', 1),
(35, '2014-01-01', 'jhj', 'll', 1),
(36, '2014-01-01', '100', 'ghgh', 1),
(37, '2015-01-01', '500', 'hai', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
