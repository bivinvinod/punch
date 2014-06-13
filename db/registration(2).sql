-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2014 at 12:29 PM
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
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `employee_code` int(11) DEFAULT NULL,
  `employee_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `mobile_no1` int(100) NOT NULL,
  `mobile_no2` varchar(100) NOT NULL,
  `mobile_no3` varchar(100) NOT NULL,
  `doj` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `monthly_salary` varchar(200) NOT NULL,
  `daily_salary` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `device_code` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `grade` varchar(200) NOT NULL,
  `team` varchar(200) NOT NULL,
  `shift_in_time` time NOT NULL,
  `shift_out_time` time NOT NULL,
  `category` varchar(200) NOT NULL,
  `employment_type` varchar(200) NOT NULL,
  `doc` varchar(200) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `id_card` varchar(100) NOT NULL,
  `id_card_image` varchar(500) NOT NULL,
  `passport` varchar(100) NOT NULL,
  `passport_image` varchar(100) NOT NULL,
  `aadhar` varchar(100) NOT NULL,
  `aadhar_image` varchar(100) NOT NULL,
  `driver_license` varchar(100) NOT NULL,
  `driver_license_image` varchar(100) NOT NULL,
  `work_days` int(100) NOT NULL,
  `work_hours` int(100) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '1',
  UNIQUE KEY `id` (`id`),
  KEY `employee_code` (`employee_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`employee_code`, `employee_name`, `last_name`, `dob`, `gender`, `email_id`, `address`, `mobile_no1`, `mobile_no2`, `mobile_no3`, `doj`, `department`, `designation`, `monthly_salary`, `daily_salary`, `image`, `device_code`, `company`, `location`, `grade`, `team`, `shift_in_time`, `shift_out_time`, `category`, `employment_type`, `doc`, `card_number`, `id_card`, `id_card_image`, `passport`, `passport_image`, `aadhar`, `aadhar_image`, `driver_license`, `driver_license_image`, `work_days`, `work_hours`, `feedback`, `id`, `status`) VALUES
(1, 'Aswin', '', '20-03-1990', 'male', 's@gmail.com', '123', 123, '123', '123', '11-08-2013', 'IT', 'Programmer', '15000', '500', '', '101', 'Codex Mind Technology', 'Calicut', 'A', 'T1', '09:00:00', '18:00:00', 'Permanent', 'Normal', '21-03-2014', '', '', '', '', '', '', '', '', '', 6, 9, '                                                           ntng  :)                                                                                                                                                                                                                                                                                                                                                                                                                                                 ', 25, 1),
(2, 'Shijin', '', '', '', '', '', 0, '', '', '', 'Choose the department', 'Programmer', '', '0', '', '', 'Codex Mind Technology', 'Calicut', '', '', '00:00:00', '00:00:00', 'Permanent', '', '', '', '', '', '', '', '', '', '', '', 5, 15, '                                                                      ', 26, 1),
(3, 'Baji M.V', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 27, 1),
(4, 'Alok', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 28, 1),
(5, 'Lijesh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 29, 1),
(6, 'Rajeesh R.S', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 30, 1),
(7, 'Rajeesh .P', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 31, 1),
(8, 'Bivin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 32, 1),
(9, 'Vineesh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 33, 1),
(10, 'Sumesh', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 34, 1),
(11, 'Linsha', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 35, 1),
(13, 'Nimisha', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 36, 1),
(15, 'Anita', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 37, 1),
(16, 'Sam', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 38, 1),
(17, 'Ajay Kumar', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 39, 1),
(18, 'Shinto A.R', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 40, 1),
(20, 'Aghila .K', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 41, 1),
(21, 'Shinurag', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 42, 1),
(22, 'Treesa Lesley Lobo', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 43, 1),
(23, 'Aazad Sivadas', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 44, 1),
(24, 'Prabeena', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 45, 1),
(25, 'Sharsad', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 46, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
