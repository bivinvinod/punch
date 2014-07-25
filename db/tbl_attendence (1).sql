-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2014 at 10:36 AM
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
-- Table structure for table `tbl_attendence`
--

CREATE TABLE IF NOT EXISTS `tbl_attendence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `leave_dates` date DEFAULT NULL,
  `leave_type` varchar(100) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `leave_matter` text,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tbl_attendence`
--

INSERT INTO `tbl_attendence` (`id`, `user_id`, `leave_dates`, `leave_type`, `from_time`, `to_time`, `leave_matter`, `status`) VALUES
(1, 20, '2014-02-03', 'Paid Half Day', '00:00:00', '00:00:00', 'kooi', 1),
(2, NULL, '2012-12-21', '', '00:00:00', '00:00:00', 'ntng', 0),
(3, NULL, '1111-11-11', '', '00:00:00', '00:00:00', NULL, 0),
(4, NULL, '2014-01-01', '', '00:00:00', '00:00:00', NULL, 0),
(5, NULL, '2013-01-11', '', '00:00:00', '00:00:00', NULL, 1),
(6, NULL, '2014-01-01', '', '00:00:00', '00:00:00', NULL, 1),
(7, NULL, '2014-01-01', '', '00:00:00', '00:00:00', NULL, 0),
(8, NULL, '2012-02-12', 'paidfullday', '00:00:00', '00:00:00', NULL, 1),
(9, NULL, '2015-01-01', 'fullday', '00:00:00', '00:00:00', 'sssssssssss', 1),
(10, NULL, '2016-01-01', 'paidfullday', '00:00:00', '00:00:00', 'nw yr:)', 1),
(11, NULL, '0001-01-01', 'paidfullday', '00:00:00', '00:00:00', 'xxx', 1),
(12, NULL, '0000-11-11', 'paid full day', '00:00:00', '00:00:00', 'cccccccc', 1),
(13, NULL, '0000-00-00', 'Full Day', '00:00:00', '00:00:00', 'simple', 1),
(14, NULL, '2014-05-05', 'Half Day', '00:00:00', '00:00:00', NULL, 1),
(15, NULL, '0000-00-00', 'Paid Full Day', '00:00:00', '00:00:00', 'vvv', 1),
(16, NULL, '2014-01-01', 'Half Day', '00:00:00', '00:00:00', 'fdfdfd ', 1),
(17, NULL, '2014-01-01', 'Half Day', '00:00:00', '00:00:00', 'bla bla ', 1),
(22, 8, '2014-01-01', 'Half Day', '00:00:00', '00:00:00', 'dsfsdfd', 1),
(23, 2, '2014-01-01', 'Half Day', '00:00:00', '00:00:00', 'dsdsdsdsds', 1),
(24, 2, '2014-01-01', 'Half Day', '00:00:00', '00:00:00', 'dsdsdsdsds', 1),
(25, 2, '2014-01-01', 'Half Day', '00:00:00', '00:00:00', 'dsdsdsdsds', 1),
(26, 5, '2014-01-01', 'Paid Half Day', '00:00:00', '00:00:00', 'dfdfdf ', 1),
(27, 13, '2014-04-03', 'Half Day', '00:00:00', '00:00:00', 'ygututy', 1),
(28, 1, '2014-01-01', 'Half Day', '00:00:00', '00:00:00', 'fgdfd', 1),
(29, 1, '2014-01-02', 'Half Day', '00:00:00', '00:00:00', 'dsdsd', 1),
(30, 1, '2014-01-03', 'Full Day', '00:00:00', '00:00:00', 'sdsdsds sdsd ', 1),
(31, 1, '2014-01-05', 'Paid Half Day', '00:00:00', '00:00:00', 'asdaasa ssds', 1),
(32, 1, '2014-01-09', 'Paid Half Day', '00:00:00', '00:00:00', 'swdsds', 1),
(33, 1, '2014-01-10', 'Paid Full Day', '00:00:00', '00:00:00', 'sdsdsdsd', 1),
(34, 1, '2014-01-13', 'Paid Half Day', '00:00:00', '00:00:00', 'klklmmkmm', 1),
(35, 456, '2014-01-01', 'Full Day', '00:00:00', '00:00:00', 'kkkkkkkkkkkkk', 1),
(36, 0, '2014-01-01', 'Full Day', '09:00:00', '18:00:00', 'gdgdgdgdgdg tttttttttttttttttt', 1),
(37, 0, '2014-01-01', 'Full Day', '09:00:00', '18:00:00', 'wdsdsd sssss', 1),
(38, 2, '2014-01-01', 'Full Day', '09:00:00', '18:00:00', 'efefe fefe efef efe', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
