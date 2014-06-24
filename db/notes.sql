-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2014 at 11:54 AM
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
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) DEFAULT NULL,
  `notes_date` date DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `notes_date`, `title`, `note`) VALUES
(28, 8, '2013-02-20', 'jjjjj', 'kikiiili'),
(29, 5, '2019-03-20', 'kkk', 'kkkk'),
(31, 2, '1990-03-20', '124', 'asdfgjkoisodr'),
(38, 1, '2034-02-23', 'sdssd', 'sdsssssssssssssssssss'),
(39, 1, '0101-01-01', 'feaver1', 'kldjlj;kj;jj,mmmmmmmmmmmmmm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
