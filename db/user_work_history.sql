-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2014 at 10:58 AM
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
-- Table structure for table `user_work_history`
--

CREATE TABLE IF NOT EXISTS `user_work_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_code` bigint(20) DEFAULT NULL,
  `worked_date` date DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `worked_hour` time DEFAULT NULL,
  `over_time` time DEFAULT NULL,
  `under_time` time DEFAULT NULL,
  `early_by` time DEFAULT NULL,
  `late_by` time DEFAULT NULL,
  `duty_type` varchar(100) DEFAULT NULL,
  `correct_time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `user_work_history`
--

INSERT INTO `user_work_history` (`id`, `user_code`, `worked_date`, `in_time`, `out_time`, `worked_hour`, `over_time`, `under_time`, `early_by`, `late_by`, `duty_type`, `correct_time`) VALUES
(1, 1, '2014-01-01', '09:49:00', '15:23:00', '05:23:00', '00:00:00', '02:37:00', '00:00:00', '00:49:00', 'UT', 'LateBy'),
(2, 1, '2014-01-02', '13:18:00', '18:34:00', '05:16:00', '00:00:00', '02:44:00', '00:00:00', '04:18:00', 'UT', 'LateBy'),
(3, 1, '2014-01-03', '10:16:00', '21:13:00', '09:34:00', '01:34:00', '00:00:00', '00:00:00', '01:16:00', 'OT', 'LateBy'),
(4, 1, '2014-01-04', '09:28:00', '13:42:00', '04:14:00', '00:00:00', '03:46:00', '00:00:00', '00:28:00', 'UT', 'LateBy'),
(5, 1, '2014-01-06', '13:59:00', '22:10:00', '07:59:00', '00:00:00', '00:01:00', '00:00:00', '04:59:00', 'UT', 'LateBy'),
(6, 1, '2014-01-07', '09:43:00', '21:12:00', '11:28:00', '03:28:00', '00:00:00', '00:00:00', '00:43:00', 'OT', 'LateBy'),
(7, 1, '2014-01-08', '09:34:00', '18:45:00', '00:06:00', '00:00:00', '07:54:00', '00:00:00', '00:34:00', 'UT', 'LateBy'),
(8, 1, '2014-01-09', '09:40:00', '16:26:00', '06:46:00', '00:00:00', '01:14:00', '00:00:00', '00:40:00', 'UT', 'LateBy'),
(9, 1, '2014-01-10', '10:22:00', '20:50:00', '10:12:00', '02:12:00', '00:00:00', '00:00:00', '01:22:00', 'OT', 'LateBy'),
(10, 1, '2014-01-11', '10:13:00', '15:01:00', '04:48:00', '00:00:00', '03:12:00', '00:00:00', '01:13:00', 'UT', 'LateBy'),
(11, 1, '2014-01-13', '18:01:00', '18:07:00', '00:06:00', '00:00:00', '07:54:00', '00:00:00', '09:01:00', 'UT', 'LateBy'),
(12, 1, '2014-01-14', '09:54:00', '18:54:00', '09:00:00', '01:00:00', '00:00:00', '00:00:00', '00:54:00', 'OT', 'LateBy'),
(13, 1, '2014-01-15', '09:31:00', '20:41:00', '05:51:00', '00:00:00', '02:09:00', '00:00:00', '00:31:00', 'UT', 'LateBy'),
(14, 1, '2014-01-16', '09:26:00', '19:41:00', '04:46:00', '00:00:00', '03:14:00', '00:00:00', '00:26:00', 'UT', 'LateBy'),
(15, 1, '2014-01-17', '09:11:00', '16:48:00', '04:54:00', '00:00:00', '03:06:00', '00:00:00', '00:11:00', 'UT', 'LateBy'),
(16, 1, '2014-01-20', '13:50:00', '17:51:00', '00:01:00', '00:00:00', '07:59:00', '00:00:00', '04:50:00', 'UT', 'LateBy'),
(17, 1, '2014-01-21', '08:46:00', '19:00:00', '09:43:00', '01:43:00', '00:00:00', '00:14:00', '00:00:00', 'OT', 'Earlyby'),
(18, 1, '2014-01-22', '08:59:00', '19:15:00', '10:16:00', '02:16:00', '00:00:00', '00:01:00', '00:00:00', 'OT', 'Earlyby'),
(19, 1, '2014-01-23', '10:30:00', '18:57:00', '08:27:00', '00:27:00', '00:00:00', '00:00:00', '01:30:00', 'OT', 'LateBy'),
(20, 1, '2014-01-24', '09:19:00', '19:02:00', '09:43:00', '01:43:00', '00:00:00', '00:00:00', '00:19:00', 'OT', 'LateBy'),
(21, 1, '2014-01-25', '09:44:00', '14:18:00', '04:34:00', '00:00:00', '03:26:00', '00:00:00', '00:44:00', 'UT', 'LateBy'),
(22, 1, '2014-01-27', '13:11:00', '20:39:00', '07:27:00', '00:00:00', '00:33:00', '00:00:00', '04:11:00', 'UT', 'LateBy'),
(23, 1, '2014-01-28', '09:26:00', '19:44:00', '10:18:00', '02:18:00', '00:00:00', '00:00:00', '00:26:00', 'OT', 'LateBy'),
(24, 1, '2014-01-29', '10:52:00', '22:34:00', '11:42:00', '03:42:00', '00:00:00', '00:00:00', '01:52:00', 'OT', 'LateBy'),
(25, 1, '2014-01-30', '09:41:00', '19:27:00', '09:46:00', '01:46:00', '00:00:00', '00:00:00', '00:41:00', 'OT', 'LateBy'),
(26, 1, '2014-01-31', '09:49:00', '19:48:00', '09:59:00', '01:59:00', '00:00:00', '00:00:00', '00:49:00', 'OT', 'LateBy');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
