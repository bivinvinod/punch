-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2014 at 03:24 PM
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
-- Table structure for table `leave_table`
--

CREATE TABLE IF NOT EXISTS `leave_table` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `leave_date` date NOT NULL,
  `status` int(100) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `type` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `leave_table`
--

INSERT INTO `leave_table` (`id`, `leave_date`, `status`, `from_time`, `to_time`, `type`, `desc`) VALUES
(1, '2014-04-01', 1, '00:00:00', '00:00:00', '', 'testing update 2'),
(2, '2014-01-01', 1, '00:00:00', '00:00:00', '', 'testing update'),
(3, '2014-01-03', 1, '00:00:00', '00:00:00', '', 'fdfdf fdfdf dfdfdfdf dfdfdf 000000000000000000000000000000000000000000000000000000000000000'),
(4, '2014-01-01', 1, '00:00:00', '00:00:00', '', 'dfsd;s.d;s. sd.s;.d'),
(5, '2014-01-01', 1, '00:00:00', '00:00:00', '', 'hknj'),
(6, '2014-01-01', 1, '00:00:00', '00:00:00', '', 'sdsdsd'),
(7, '2014-01-01', 1, '00:00:00', '00:00:00', '', 'ssds'),
(8, '2014-01-01', 1, '01:00:00', '02:00:00', '', 'sdsdsd'),
(9, '2014-01-01', 1, '03:03:00', '17:01:00', '', 'wwewe'),
(10, '2014-10-10', 0, '00:00:00', '00:00:00', '', 'sdsds sdsdsd'),
(11, '2014-11-11', 1, '00:00:00', '00:00:00', '', 'zdxsdsds'),
(12, '2014-01-01', 1, '00:00:00', '00:00:00', '', 'zsdxsdsds ttttt'),
(13, '2014-01-01', 1, '09:00:00', '18:00:00', 'Full Day', 'sadsdsdsd sdsd'),
(14, '2014-01-01', 1, '09:00:00', '18:00:00', 'Full Day', 'D.FG;DL,GDGF.G'),
(15, '2014-01-01', 1, '09:00:00', '18:00:00', 'Full Day', 'bivin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
