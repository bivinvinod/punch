-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2014 at 06:18 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `fetchAllRecords`()
begin
SELECT * FROM monthly_table;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `ip_address` varchar(100) NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `updated_on` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `user_type`, `status`, `ip_address`, `last_login`, `created_on`, `updated_on`) VALUES
(1, 'coool', '5c550692bb6fdf12a0184cc7ecab4737', 'admin', '1', '127.0.0.1', '2014-04-08 15:19:22', '', ''),
(2, 'agent', 'b33aed8f3134996703dc39f9a7c95783', 'superadmin', '1', '127.0.0.1', '2014-04-22 17:22:25', '', ''),
(3, 'coool1', '54effb25e51965e7a470346790b8f3eb', 'user', '1', '127.0.0.1', '2014-04-08 10:15:21', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_in_out_tables`
--

CREATE TABLE IF NOT EXISTS `monthly_in_out_tables` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `monthly_table_id` bigint(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `punch_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=293 ;

--
-- Dumping data for table `monthly_in_out_tables`
--

INSERT INTO `monthly_in_out_tables` (`id`, `in_time`, `out_time`, `monthly_table_id`, `user_id`, `punch_date`) VALUES
(1, '09:49:00', NULL, 1, 1, '2014-01-01'),
(2, NULL, '11:14:00', 1, 1, '2014-01-01'),
(3, '11:25:00', NULL, 1, 1, '2014-01-01'),
(4, NULL, '15:23:00', 1, 1, '2014-01-01'),
(5, '13:18:00', NULL, 2, 1, '2014-01-02'),
(6, NULL, '18:34:00', 2, 1, '2014-01-02'),
(7, '10:16:00', NULL, 3, 1, '2014-01-03'),
(8, NULL, '18:19:00', 3, 1, '2014-01-03'),
(9, '18:38:00', NULL, 3, 1, '2014-01-03'),
(10, NULL, '18:45:00', 3, 1, '2014-01-03'),
(11, NULL, NULL, 3, 1, '2014-01-03'),
(12, NULL, NULL, 3, 1, '2014-01-03'),
(13, '19:33:00', NULL, 3, 1, '2014-01-03'),
(14, NULL, NULL, 3, 1, '2014-01-03'),
(15, NULL, '19:45:00', 3, 1, '2014-01-03'),
(16, '21:08:00', NULL, 3, 1, '2014-01-03'),
(17, NULL, NULL, 3, 1, '2014-01-03'),
(18, NULL, '21:13:00', 3, 1, '2014-01-03'),
(19, '09:28:00', NULL, 4, 1, '2014-01-04'),
(20, NULL, '13:42:00', 4, 1, '2014-01-04'),
(21, '13:59:00', NULL, 6, 1, '2014-01-06'),
(22, NULL, '16:52:00', 6, 1, '2014-01-06'),
(23, '17:04:00', NULL, 6, 1, '2014-01-06'),
(24, NULL, '22:10:00', 6, 1, '2014-01-06'),
(25, '09:43:00', NULL, 7, 1, '2014-01-07'),
(26, NULL, '16:20:00', 7, 1, '2014-01-07'),
(27, NULL, NULL, 7, 1, '2014-01-07'),
(28, '21:11:00', NULL, 7, 1, '2014-01-07'),
(29, NULL, NULL, 7, 1, '2014-01-07'),
(30, NULL, NULL, 7, 1, '2014-01-07'),
(31, '09:34:00', NULL, 8, 1, '2014-01-08'),
(32, NULL, '15:41:00', 8, 1, '2014-01-08'),
(33, NULL, NULL, 8, 1, '2014-01-08'),
(34, '18:40:00', NULL, 8, 1, '2014-01-08'),
(35, NULL, '18:45:00', 8, 1, '2014-01-08'),
(36, '09:40:00', NULL, 9, 1, '2014-01-09'),
(37, NULL, '16:26:00', 9, 1, '2014-01-09'),
(38, '10:22:00', NULL, 10, 1, '2014-01-10'),
(39, NULL, '14:54:00', 10, 1, '2014-01-10'),
(40, NULL, NULL, 10, 1, '2014-01-10'),
(41, '17:07:00', NULL, 10, 1, '2014-01-10'),
(42, NULL, '17:20:00', 10, 1, '2014-01-10'),
(43, '19:35:00', NULL, 10, 1, '2014-01-10'),
(44, NULL, NULL, 10, 1, '2014-01-10'),
(45, NULL, '20:50:00', 10, 1, '2014-01-10'),
(46, '10:13:00', NULL, 11, 1, '2014-01-11'),
(47, NULL, '15:01:00', 11, 1, '2014-01-11'),
(48, '18:01:00', NULL, 13, 1, '2014-01-13'),
(49, NULL, '18:07:00', 13, 1, '2014-01-13'),
(50, '09:54:00', NULL, 14, 1, '2014-01-14'),
(51, NULL, '18:54:00', 14, 1, '2014-01-14'),
(52, '09:31:00', NULL, 15, 1, '2014-01-15'),
(53, NULL, '14:32:00', 15, 1, '2014-01-15'),
(54, '19:27:00', NULL, 15, 1, '2014-01-15'),
(55, NULL, '20:17:00', 15, 1, '2014-01-15'),
(56, '20:41:00', NULL, 15, 1, '2014-01-15'),
(57, NULL, NULL, 15, 1, '2014-01-15'),
(58, '09:26:00', NULL, 16, 1, '2014-01-16'),
(59, NULL, NULL, 16, 1, '2014-01-16'),
(60, NULL, '12:01:00', 16, 1, '2014-01-16'),
(61, '12:11:00', NULL, 16, 1, '2014-01-16'),
(62, NULL, '12:22:00', 16, 1, '2014-01-16'),
(63, '12:40:00', NULL, 16, 1, '2014-01-16'),
(64, NULL, NULL, 16, 1, '2014-01-16'),
(65, NULL, '12:47:00', 16, 1, '2014-01-16'),
(66, NULL, NULL, 16, 1, '2014-01-16'),
(67, NULL, NULL, 16, 1, '2014-01-16'),
(68, '12:59:00', NULL, 16, 1, '2014-01-16'),
(69, NULL, NULL, 16, 1, '2014-01-16'),
(70, NULL, '13:05:00', 16, 1, '2014-01-16'),
(71, '17:14:00', NULL, 16, 1, '2014-01-16'),
(72, NULL, '17:49:00', 16, 1, '2014-01-16'),
(73, '18:18:00', NULL, 16, 1, '2014-01-16'),
(74, NULL, NULL, 16, 1, '2014-01-16'),
(75, NULL, '18:33:00', 16, 1, '2014-01-16'),
(76, NULL, NULL, 16, 1, '2014-01-16'),
(77, NULL, NULL, 16, 1, '2014-01-16'),
(78, '19:41:00', NULL, 16, 1, '2014-01-16'),
(79, '09:11:00', NULL, 17, 1, '2014-01-17'),
(80, NULL, '11:23:00', 17, 1, '2014-01-17'),
(81, '14:04:00', NULL, 17, 1, '2014-01-17'),
(82, NULL, '14:16:00', 17, 1, '2014-01-17'),
(83, '16:22:00', NULL, 17, 1, '2014-01-17'),
(84, NULL, NULL, 17, 1, '2014-01-17'),
(85, NULL, NULL, 17, 1, '2014-01-17'),
(86, NULL, '16:42:00', 17, 1, '2014-01-17'),
(87, '16:48:00', NULL, 17, 1, '2014-01-17'),
(88, '13:50:00', NULL, 20, 1, '2014-01-20'),
(89, NULL, '17:50:00', 20, 1, '2014-01-20'),
(90, NULL, NULL, 20, 1, '2014-01-20'),
(91, '08:46:00', NULL, 21, 1, '2014-01-21'),
(92, NULL, '11:51:00', 21, 1, '2014-01-21'),
(93, '12:22:00', NULL, 21, 1, '2014-01-21'),
(94, NULL, '19:00:00', 21, 1, '2014-01-21'),
(95, '08:59:00', NULL, 22, 1, '2014-01-22'),
(96, NULL, '19:15:00', 22, 1, '2014-01-22'),
(97, '10:30:00', NULL, 23, 1, '2014-01-23'),
(98, NULL, '18:57:00', 23, 1, '2014-01-23'),
(99, '09:19:00', NULL, 24, 1, '2014-01-24'),
(100, NULL, '19:02:00', 24, 1, '2014-01-24'),
(101, '09:44:00', NULL, 25, 1, '2014-01-25'),
(102, NULL, '14:18:00', 25, 1, '2014-01-25'),
(103, '13:11:00', NULL, 27, 1, '2014-01-27'),
(104, NULL, '20:37:00', 27, 1, '2014-01-27'),
(105, NULL, NULL, 27, 1, '2014-01-27'),
(106, NULL, NULL, 27, 1, '2014-01-27'),
(107, '09:26:00', NULL, 28, 1, '2014-01-28'),
(108, NULL, '19:44:00', 28, 1, '2014-01-28'),
(109, '10:52:00', NULL, 29, 1, '2014-01-29'),
(110, NULL, '22:34:00', 29, 1, '2014-01-29'),
(111, '09:41:00', NULL, 30, 1, '2014-01-30'),
(112, NULL, '19:27:00', 30, 1, '2014-01-30'),
(113, '09:49:00', NULL, 31, 1, '2014-01-31'),
(114, NULL, '19:48:00', 31, 1, '2014-01-31'),
(115, '09:49:00', NULL, 32, 1, '2014-01-01'),
(116, NULL, '11:14:00', 32, 1, '2014-01-01'),
(117, '11:25:00', NULL, 32, 1, '2014-01-01'),
(118, NULL, '15:23:00', 32, 1, '2014-01-01'),
(119, '13:18:00', NULL, 33, 1, '2014-01-02'),
(120, NULL, '18:34:00', 33, 1, '2014-01-02'),
(121, '10:16:00', NULL, 34, 1, '2014-01-03'),
(122, NULL, '18:19:00', 34, 1, '2014-01-03'),
(123, '18:38:00', NULL, 34, 1, '2014-01-03'),
(124, NULL, '18:45:00', 34, 1, '2014-01-03'),
(125, NULL, NULL, 34, 1, '2014-01-03'),
(126, NULL, NULL, 34, 1, '2014-01-03'),
(127, '19:33:00', NULL, 34, 1, '2014-01-03'),
(128, NULL, NULL, 34, 1, '2014-01-03'),
(129, NULL, '19:45:00', 34, 1, '2014-01-03'),
(130, '21:08:00', NULL, 34, 1, '2014-01-03'),
(131, NULL, NULL, 34, 1, '2014-01-03'),
(132, NULL, '21:13:00', 34, 1, '2014-01-03'),
(133, '09:28:00', NULL, 35, 1, '2014-01-04'),
(134, NULL, '13:42:00', 35, 1, '2014-01-04'),
(135, '13:59:00', NULL, 37, 1, '2014-01-06'),
(136, NULL, '16:52:00', 37, 1, '2014-01-06'),
(137, '17:04:00', NULL, 37, 1, '2014-01-06'),
(138, NULL, '22:10:00', 37, 1, '2014-01-06'),
(139, '09:43:00', NULL, 38, 1, '2014-01-07'),
(140, NULL, '16:20:00', 38, 1, '2014-01-07'),
(141, NULL, NULL, 38, 1, '2014-01-07'),
(142, '21:11:00', NULL, 38, 1, '2014-01-07'),
(143, NULL, NULL, 38, 1, '2014-01-07'),
(144, NULL, NULL, 38, 1, '2014-01-07'),
(145, '09:34:00', NULL, 39, 1, '2014-01-08'),
(146, NULL, '15:41:00', 39, 1, '2014-01-08'),
(147, NULL, NULL, 39, 1, '2014-01-08'),
(148, '18:40:00', NULL, 39, 1, '2014-01-08'),
(149, NULL, '18:45:00', 39, 1, '2014-01-08'),
(150, '09:40:00', NULL, 40, 1, '2014-01-09'),
(151, NULL, '16:26:00', 40, 1, '2014-01-09'),
(152, '10:22:00', NULL, 41, 1, '2014-01-10'),
(153, NULL, '14:54:00', 41, 1, '2014-01-10'),
(154, NULL, NULL, 41, 1, '2014-01-10'),
(155, '17:07:00', NULL, 41, 1, '2014-01-10'),
(156, NULL, '17:20:00', 41, 1, '2014-01-10'),
(157, '19:35:00', NULL, 41, 1, '2014-01-10'),
(158, NULL, NULL, 41, 1, '2014-01-10'),
(159, NULL, '20:50:00', 41, 1, '2014-01-10'),
(160, '10:13:00', NULL, 42, 1, '2014-01-11'),
(161, NULL, '15:01:00', 42, 1, '2014-01-11'),
(162, '18:01:00', NULL, 44, 1, '2014-01-13'),
(163, NULL, '18:07:00', 44, 1, '2014-01-13'),
(164, '09:54:00', NULL, 45, 1, '2014-01-14'),
(165, NULL, '18:54:00', 45, 1, '2014-01-14'),
(166, '09:31:00', NULL, 46, 1, '2014-01-15'),
(167, NULL, '14:32:00', 46, 1, '2014-01-15'),
(168, '19:27:00', NULL, 46, 1, '2014-01-15'),
(169, NULL, '20:17:00', 46, 1, '2014-01-15'),
(170, '20:41:00', NULL, 46, 1, '2014-01-15'),
(171, NULL, NULL, 46, 1, '2014-01-15'),
(172, '09:26:00', NULL, 47, 1, '2014-01-16'),
(173, NULL, NULL, 47, 1, '2014-01-16'),
(174, NULL, '12:01:00', 47, 1, '2014-01-16'),
(175, '12:11:00', NULL, 47, 1, '2014-01-16'),
(176, NULL, '12:22:00', 47, 1, '2014-01-16'),
(177, '12:40:00', NULL, 47, 1, '2014-01-16'),
(178, NULL, NULL, 47, 1, '2014-01-16'),
(179, NULL, '12:47:00', 47, 1, '2014-01-16'),
(180, NULL, NULL, 47, 1, '2014-01-16'),
(181, NULL, NULL, 47, 1, '2014-01-16'),
(182, '12:59:00', NULL, 47, 1, '2014-01-16'),
(183, NULL, NULL, 47, 1, '2014-01-16'),
(184, NULL, '13:05:00', 47, 1, '2014-01-16'),
(185, '17:14:00', NULL, 47, 1, '2014-01-16'),
(186, NULL, '17:49:00', 47, 1, '2014-01-16'),
(187, '18:18:00', NULL, 47, 1, '2014-01-16'),
(188, NULL, NULL, 47, 1, '2014-01-16'),
(189, NULL, '18:33:00', 47, 1, '2014-01-16'),
(190, NULL, NULL, 47, 1, '2014-01-16'),
(191, NULL, NULL, 47, 1, '2014-01-16'),
(192, '19:41:00', NULL, 47, 1, '2014-01-16'),
(193, '09:11:00', NULL, 48, 1, '2014-01-17'),
(194, NULL, '11:23:00', 48, 1, '2014-01-17'),
(195, '14:04:00', NULL, 48, 1, '2014-01-17'),
(196, NULL, '14:16:00', 48, 1, '2014-01-17'),
(197, '16:22:00', NULL, 48, 1, '2014-01-17'),
(198, NULL, NULL, 48, 1, '2014-01-17'),
(199, NULL, NULL, 48, 1, '2014-01-17'),
(200, NULL, '16:42:00', 48, 1, '2014-01-17'),
(201, '16:48:00', NULL, 48, 1, '2014-01-17'),
(202, '13:50:00', NULL, 51, 1, '2014-01-20'),
(203, NULL, '17:50:00', 51, 1, '2014-01-20'),
(204, NULL, NULL, 51, 1, '2014-01-20'),
(205, '08:46:00', NULL, 52, 1, '2014-01-21'),
(206, NULL, '11:51:00', 52, 1, '2014-01-21'),
(207, '12:22:00', NULL, 52, 1, '2014-01-21'),
(208, NULL, '19:00:00', 52, 1, '2014-01-21'),
(209, '08:59:00', NULL, 53, 1, '2014-01-22'),
(210, NULL, '19:15:00', 53, 1, '2014-01-22'),
(211, '10:30:00', NULL, 54, 1, '2014-01-23'),
(212, NULL, '18:57:00', 54, 1, '2014-01-23'),
(213, '09:19:00', NULL, 55, 1, '2014-01-24'),
(214, NULL, '19:02:00', 55, 1, '2014-01-24'),
(215, '09:44:00', NULL, 56, 1, '2014-01-25'),
(216, NULL, '14:18:00', 56, 1, '2014-01-25'),
(217, '13:11:00', NULL, 58, 1, '2014-01-27'),
(218, NULL, '20:37:00', 58, 1, '2014-01-27'),
(219, NULL, NULL, 58, 1, '2014-01-27'),
(220, NULL, NULL, 58, 1, '2014-01-27'),
(221, '09:26:00', NULL, 59, 1, '2014-01-28'),
(222, NULL, '19:44:00', 59, 1, '2014-01-28'),
(223, '10:52:00', NULL, 60, 1, '2014-01-29'),
(224, NULL, '22:34:00', 60, 1, '2014-01-29'),
(225, '09:41:00', NULL, 61, 1, '2014-01-30'),
(226, NULL, '19:27:00', 61, 1, '2014-01-30'),
(227, '09:49:00', NULL, 62, 1, '2014-01-31'),
(228, NULL, '19:48:00', 62, 1, '2014-01-31'),
(229, '09:49:00', NULL, 64, 1, '2014-01-01'),
(230, NULL, '11:14:00', 64, 1, '2014-01-01'),
(231, '11:25:00', NULL, 64, 1, '2014-01-01'),
(232, NULL, '15:23:00', 64, 1, '2014-01-01'),
(233, '09:49:00', NULL, 65, 1, '2014-01-01'),
(234, NULL, '11:14:00', 65, 1, '2014-01-01'),
(235, '11:25:00', NULL, 65, 1, '2014-01-01'),
(236, NULL, '15:23:00', 65, 1, '2014-01-01'),
(237, '09:49:00', NULL, 66, 1, '2014-01-01'),
(238, NULL, '11:14:00', 66, 1, '2014-01-01'),
(239, '11:25:00', NULL, 66, 1, '2014-01-01'),
(240, NULL, '15:23:00', 66, 1, '2014-01-01'),
(241, '09:49:00', NULL, 67, 1, '2014-01-01'),
(242, NULL, '11:14:00', 67, 1, '2014-01-01'),
(243, '11:25:00', NULL, 67, 1, '2014-01-01'),
(244, NULL, '15:23:00', 67, 1, '2014-01-01'),
(245, '09:49:00', NULL, 68, 1, '2014-01-01'),
(246, NULL, '11:14:00', 68, 1, '2014-01-01'),
(247, '11:25:00', NULL, 68, 1, '2014-01-01'),
(248, NULL, '15:23:00', 68, 1, '2014-01-01'),
(249, '09:49:00', NULL, 69, 1, '2014-01-01'),
(250, NULL, '11:14:00', 69, 1, '2014-01-01'),
(251, '11:25:00', NULL, 69, 1, '2014-01-01'),
(252, NULL, '15:23:00', 69, 1, '2014-01-01'),
(253, '09:49:00', NULL, 70, 1, '2014-01-01'),
(254, NULL, '11:14:00', 70, 1, '2014-01-01'),
(255, '11:25:00', NULL, 70, 1, '2014-01-01'),
(256, NULL, '15:23:00', 70, 1, '2014-01-01'),
(257, '09:49:00', NULL, 71, 1, '2014-01-01'),
(258, NULL, '11:14:00', 71, 1, '2014-01-01'),
(259, '11:25:00', NULL, 71, 1, '2014-01-01'),
(260, NULL, '15:23:00', 71, 1, '2014-01-01'),
(261, '09:49:00', NULL, 72, 1, '2014-01-01'),
(262, NULL, '11:14:00', 72, 1, '2014-01-01'),
(263, '11:25:00', NULL, 72, 1, '2014-01-01'),
(264, NULL, '15:23:00', 72, 1, '2014-01-01'),
(265, '09:49:00', NULL, 73, 1, '2014-01-01'),
(266, NULL, '11:14:00', 73, 1, '2014-01-01'),
(267, '11:25:00', NULL, 73, 1, '2014-01-01'),
(268, NULL, '15:23:00', 73, 1, '2014-01-01'),
(269, '09:49:00', NULL, 74, 1, '2014-01-01'),
(270, NULL, '11:14:00', 74, 1, '2014-01-01'),
(271, '11:25:00', NULL, 74, 1, '2014-01-01'),
(272, NULL, '15:23:00', 74, 1, '2014-01-01'),
(273, '09:49:00', NULL, 75, 1, '2014-01-01'),
(274, NULL, '11:14:00', 75, 1, '2014-01-01'),
(275, '11:25:00', NULL, 75, 1, '2014-01-01'),
(276, NULL, '15:23:00', 75, 1, '2014-01-01'),
(277, '09:49:00', NULL, 76, 1, '2014-01-01'),
(278, NULL, '11:14:00', 76, 1, '2014-01-01'),
(279, '11:25:00', NULL, 76, 1, '2014-01-01'),
(280, NULL, '15:23:00', 76, 1, '2014-01-01'),
(281, '09:49:00', NULL, 77, 1, '2014-01-01'),
(282, NULL, '11:14:00', 77, 1, '2014-01-01'),
(283, '11:25:00', NULL, 77, 1, '2014-01-01'),
(284, NULL, '15:23:00', 77, 1, '2014-01-01'),
(285, '09:49:00', NULL, 78, 1, '2014-01-01'),
(286, NULL, '11:14:00', 78, 1, '2014-01-01'),
(287, '11:25:00', NULL, 78, 1, '2014-01-01'),
(288, NULL, '15:23:00', 78, 1, '2014-01-01'),
(289, '09:49:00', NULL, 79, 1, '2014-01-01'),
(290, NULL, '11:14:00', 79, 1, '2014-01-01'),
(291, '11:25:00', NULL, 79, 1, '2014-01-01'),
(292, NULL, '15:23:00', 79, 1, '2014-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_table`
--

CREATE TABLE IF NOT EXISTS `monthly_table` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `dates` date DEFAULT NULL,
  `employee_code` int(11) DEFAULT NULL,
  `employee_name` varchar(100) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `degination` varchar(100) DEFAULT NULL,
  `grade` varchar(100) DEFAULT NULL,
  `team` varchar(100) DEFAULT NULL,
  `shift` varchar(100) DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `late_by` time DEFAULT NULL,
  `early_by` time DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `punch_records` longtext,
  `total_in` time DEFAULT NULL,
  `total_out` time DEFAULT NULL,
  `over_time` time DEFAULT NULL,
  `under_time` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `monthly_table`
--

INSERT INTO `monthly_table` (`id`, `dates`, `employee_code`, `employee_name`, `company`, `department`, `category`, `degination`, `grade`, `team`, `shift`, `in_time`, `out_time`, `duration`, `late_by`, `early_by`, `status`, `punch_records`, `total_in`, `total_out`, `over_time`, `under_time`) VALUES
(1, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(2, '2014-01-02', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '13:18:00', '18:34:00', '4:42', '04:18:00', '00:00:00', 'Present ', '13:18:in(Door Access) 18:34:out(Door Access) ', '05:16:00', '00:00:00', '00:34:00', NULL),
(3, '2014-01-03', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '10:16:00', '21:13:00', '7:44', '01:16:00', '00:00:00', 'Present ', '10:16:in(Door Access) 18:19:out(Door Access) 18:38:in(Door Access) 18:45:out(Door Access) 18:47:(Door Access) 18:47:(Door Access) 19:33:in(Door Access) 19:34:(Door Access) 19:45:out(Door Access) 21:08:in(Door Access) 21:13:(Door Access) 21:13:out(Door Access) ', '09:34:00', '01:23:00', '03:13:00', NULL),
(4, '2014-01-04', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:28:00', '13:42:00', '4:14', '00:28:00', '04:17:00', 'Present ', '09:28:in(Door Access) 13:42:out(Door Access) ', '04:14:00', '00:00:00', '00:00:00', NULL),
(5, '2014-01-05', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '00:00:00', '00:00:00', '0:00', '00:00:00', '00:00:00', 'WeeklyOff ', '', '00:00:00', '00:00:00', '00:00:00', NULL),
(6, '2014-01-06', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '13:59:00', '22:10:00', '4:01', '04:59:00', '00:00:00', 'Present ', '13:59:in(Door Access) 16:52:out(Door Access) 17:04:in(Door Access) 22:10:out(Door Access) ', '07:59:00', '00:12:00', '04:10:00', NULL),
(7, '2014-01-07', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:43:00', '21:12:00', '8:17', '00:43:00', '00:00:00', 'Present ', '09:43:in(Door Access) 16:20:out(Door Access) 16:20:(Door Access) 21:11:in(Door Access) 21:12:(Door Access) 21:12:(Door Access) ', '11:28:00', '00:01:00', '03:11:00', NULL),
(8, '2014-01-08', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:34:00', '18:45:00', '8:26', '00:34:00', '00:00:00', 'Present ', '09:34:in(Door Access) 15:41:out(Door Access) 15:42:(Door Access) 18:40:in(Door Access) 18:45:out(Door Access) ', '00:06:00', '09:05:00', '00:45:00', NULL),
(9, '2014-01-09', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:40:00', '16:26:00', '6:46', '00:40:00', '01:33:00', 'Present ', '09:40:in(Door Access) 16:26:out(Door Access) ', '06:46:00', '00:00:00', '00:00:00', NULL),
(10, '2014-01-10', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '10:22:00', '20:50:00', '7:38', '01:22:00', '00:00:00', 'Present ', '10:22:in(Door Access) 14:54:out(Door Access) 14:54:(Door Access) 17:07:in(Door Access) 17:20:out(Door Access) 19:35:in(Door Access) 19:38:(Door Access) 20:50:out(Door Access) ', '10:12:00', '00:16:00', '02:50:00', NULL),
(11, '2014-01-11', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '10:13:00', '15:01:00', '4:48', '01:13:00', '02:59:00', 'Present ', '10:13:in(Door Access) 15:01:out(Door Access) ', '04:48:00', '00:00:00', '00:00:00', NULL),
(12, '2014-01-12', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '00:00:00', '00:00:00', '0:00', '00:00:00', '00:00:00', 'WeeklyOff ', '', '00:00:00', '00:00:00', '00:00:00', NULL),
(13, '2014-01-13', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '18:01:00', '18:07:00', '0:01', '09:01:00', '00:00:00', 'Present ', '18:01:in(Door Access) 18:07:out(Door Access) ', '00:06:00', '00:00:00', '00:05:00', NULL),
(14, '2014-01-14', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:54:00', '18:54:00', '8:06', '00:54:00', '00:00:00', 'Present ', '09:54:in(Door Access) 18:54:out(Door Access) ', '09:00:00', '00:00:00', '00:54:00', NULL),
(15, '2014-01-15', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:31:00', '20:41:00', '8:29', '00:31:00', '00:00:00', 'Present ', '09:31:in(Door Access) 14:32:out(Door Access) 19:27:in(Door Access) 20:17:out(Door Access) 20:41:in(Door Access) 20:41:(Door Access) ', '05:51:00', '05:19:00', '02:41:00', NULL),
(16, '2014-01-16', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:26:00', '19:41:00', '8:34', '00:26:00', '00:00:00', 'Present ', '09:26:in(Door Access) 09:26:(Door Access) 12:01:out(Door Access) 12:11:in(Door Access) 12:22:out(Door Access) 12:40:in(Door Access) 12:44:(Door Access) 12:47:out(Door Access) 12:50:(Door Access) 12:51:(Door Access) 12:59:in(Door Access) 13:03:(Door Access) 13:05:out(Door Access) 17:14:in(Door Access) 17:49:out(Door Access) 18:18:in(Door Access) 18:21:(Door Access) 18:33:out(Door Access) 18:33:(Door Access) 18:36:(Door Access) 19:41:in(Door Access) ', '04:46:00', '05:29:00', '01:41:00', NULL),
(17, '2014-01-17', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:11:00', '16:48:00', '7:37', '00:11:00', '01:11:00', 'Present ', '09:11:in(Door Access) 11:23:out(Door Access) 14:04:in(Door Access) 14:16:out(Door Access) 16:22:in(Door Access) 16:22:(Door Access) 16:23:(Door Access) 16:42:out(Door Access) 16:48:in(Door Access) ', '04:54:00', '02:43:00', '00:00:00', NULL),
(18, '2014-01-18', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '00:00:00', '00:00:00', '0:00', '00:00:00', '00:00:00', 'WeeklyOff ', '', '00:00:00', '00:00:00', '00:00:00', NULL),
(19, '2014-01-19', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '00:00:00', '00:00:00', '0:00', '00:00:00', '00:00:00', 'WeeklyOff ', '', '00:00:00', '00:00:00', '00:00:00', NULL),
(20, '2014-01-20', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '13:50:00', '17:51:00', '4:00', '04:50:00', '00:09:00', 'Present ', '13:50:in(Door Access) 17:50:out(Door Access) 17:51:(Door Access) ', '00:01:00', '04:00:00', '00:00:00', NULL),
(21, '2014-01-21', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '08:46:00', '19:00:00', '9:14', '00:00:00', '00:00:00', 'Present ', '08:46:in(Door Access) 11:51:out(Door Access) 12:22:in(Door Access) 19:00:out(Door Access) ', '09:43:00', '00:31:00', '01:00:00', NULL),
(22, '2014-01-22', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '08:59:00', '19:15:00', '9:01', '00:00:00', '00:00:00', 'Present ', '08:59:in(Door Access) 19:15:out(Door Access) ', '10:16:00', '00:00:00', '01:15:00', NULL),
(23, '2014-01-23', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '10:30:00', '18:57:00', '7:30', '01:30:00', '00:00:00', 'Present ', '10:30:in(Door Access) 18:57:out(Door Access) ', '08:27:00', '00:00:00', '00:57:00', NULL),
(24, '2014-01-24', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:19:00', '19:02:00', '8:41', '00:19:00', '00:00:00', 'Present ', '09:19:in(Door Access) 19:02:out(Door Access) ', '09:43:00', '00:00:00', '01:02:00', NULL),
(25, '2014-01-25', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:44:00', '14:18:00', '4:34', '00:44:00', '03:41:00', 'Present ', '09:44:in(Door Access) 14:18:out(Door Access) ', '04:34:00', '00:00:00', '00:00:00', NULL),
(26, '2014-01-26', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '00:00:00', '00:00:00', '0:00', '00:00:00', '00:00:00', 'WeeklyOff ', '', '00:00:00', '00:00:00', '00:00:00', NULL),
(27, '2014-01-27', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '13:11:00', '20:39:00', '4:49', '04:11:00', '00:00:00', 'Present ', '13:11:in(Door Access) 20:37:out(Door Access) 20:38:(Door Access) 20:39:(Door Access) ', '07:27:00', '00:01:00', '02:37:00', NULL),
(28, '2014-01-28', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:26:00', '19:44:00', '8:34', '00:26:00', '00:00:00', 'Present ', '09:26:in(Door Access) 19:44:out(Door Access) ', '10:18:00', '00:00:00', '01:44:00', NULL),
(29, '2014-01-29', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '10:52:00', '22:34:00', '7:08', '01:52:00', '00:00:00', 'Present ', '10:52:in(Door Access) 22:34:out(Door Access) ', '11:42:00', '00:00:00', '04:34:00', NULL),
(30, '2014-01-30', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:41:00', '19:27:00', '8:19', '00:41:00', '00:00:00', 'Present ', '09:41:in(Door Access) 19:27:out(Door Access) ', '09:46:00', '00:00:00', '01:27:00', NULL),
(31, '2014-01-31', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '19:48:00', '8:11', '00:49:00', '00:00:00', 'Present ', '09:49:in(Door Access) 19:48:out(Door Access) ', '09:59:00', '00:00:00', '01:48:00', NULL),
(32, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(33, '2014-01-02', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '13:18:00', '18:34:00', '4:42', '04:18:00', '00:00:00', 'Present ', '13:18:in(Door Access) 18:34:out(Door Access) ', '05:16:00', '00:00:00', '00:34:00', NULL),
(34, '2014-01-03', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '10:16:00', '21:13:00', '7:44', '01:16:00', '00:00:00', 'Present ', '10:16:in(Door Access) 18:19:out(Door Access) 18:38:in(Door Access) 18:45:out(Door Access) 18:47:(Door Access) 18:47:(Door Access) 19:33:in(Door Access) 19:34:(Door Access) 19:45:out(Door Access) 21:08:in(Door Access) 21:13:(Door Access) 21:13:out(Door Access) ', '09:34:00', '01:23:00', '03:13:00', NULL),
(35, '2014-01-04', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:28:00', '13:42:00', '4:14', '00:28:00', '04:17:00', 'Present ', '09:28:in(Door Access) 13:42:out(Door Access) ', '04:14:00', '00:00:00', '00:00:00', NULL),
(36, '2014-01-05', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '00:00:00', '00:00:00', '0:00', '00:00:00', '00:00:00', 'WeeklyOff ', '', '00:00:00', '00:00:00', '00:00:00', NULL),
(37, '2014-01-06', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '13:59:00', '22:10:00', '4:01', '04:59:00', '00:00:00', 'Present ', '13:59:in(Door Access) 16:52:out(Door Access) 17:04:in(Door Access) 22:10:out(Door Access) ', '07:59:00', '00:12:00', '04:10:00', NULL),
(38, '2014-01-07', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:43:00', '21:12:00', '8:17', '00:43:00', '00:00:00', 'Present ', '09:43:in(Door Access) 16:20:out(Door Access) 16:20:(Door Access) 21:11:in(Door Access) 21:12:(Door Access) 21:12:(Door Access) ', '11:28:00', '00:01:00', '03:11:00', NULL),
(39, '2014-01-08', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:34:00', '18:45:00', '8:26', '00:34:00', '00:00:00', 'Present ', '09:34:in(Door Access) 15:41:out(Door Access) 15:42:(Door Access) 18:40:in(Door Access) 18:45:out(Door Access) ', '00:06:00', '09:05:00', '00:45:00', NULL),
(40, '2014-01-09', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:40:00', '16:26:00', '6:46', '00:40:00', '01:33:00', 'Present ', '09:40:in(Door Access) 16:26:out(Door Access) ', '06:46:00', '00:00:00', '00:00:00', NULL),
(41, '2014-01-10', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '10:22:00', '20:50:00', '7:38', '01:22:00', '00:00:00', 'Present ', '10:22:in(Door Access) 14:54:out(Door Access) 14:54:(Door Access) 17:07:in(Door Access) 17:20:out(Door Access) 19:35:in(Door Access) 19:38:(Door Access) 20:50:out(Door Access) ', '10:12:00', '00:16:00', '02:50:00', NULL),
(42, '2014-01-11', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '10:13:00', '15:01:00', '4:48', '01:13:00', '02:59:00', 'Present ', '10:13:in(Door Access) 15:01:out(Door Access) ', '04:48:00', '00:00:00', '00:00:00', NULL),
(43, '2014-01-12', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '00:00:00', '00:00:00', '0:00', '00:00:00', '00:00:00', 'WeeklyOff ', '', '00:00:00', '00:00:00', '00:00:00', NULL),
(44, '2014-01-13', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '18:01:00', '18:07:00', '0:01', '09:01:00', '00:00:00', 'Present ', '18:01:in(Door Access) 18:07:out(Door Access) ', '00:06:00', '00:00:00', '00:05:00', NULL),
(45, '2014-01-14', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:54:00', '18:54:00', '8:06', '00:54:00', '00:00:00', 'Present ', '09:54:in(Door Access) 18:54:out(Door Access) ', '09:00:00', '00:00:00', '00:54:00', NULL),
(46, '2014-01-15', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:31:00', '20:41:00', '8:29', '00:31:00', '00:00:00', 'Present ', '09:31:in(Door Access) 14:32:out(Door Access) 19:27:in(Door Access) 20:17:out(Door Access) 20:41:in(Door Access) 20:41:(Door Access) ', '05:51:00', '05:19:00', '02:41:00', NULL),
(47, '2014-01-16', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:26:00', '19:41:00', '8:34', '00:26:00', '00:00:00', 'Present ', '09:26:in(Door Access) 09:26:(Door Access) 12:01:out(Door Access) 12:11:in(Door Access) 12:22:out(Door Access) 12:40:in(Door Access) 12:44:(Door Access) 12:47:out(Door Access) 12:50:(Door Access) 12:51:(Door Access) 12:59:in(Door Access) 13:03:(Door Access) 13:05:out(Door Access) 17:14:in(Door Access) 17:49:out(Door Access) 18:18:in(Door Access) 18:21:(Door Access) 18:33:out(Door Access) 18:33:(Door Access) 18:36:(Door Access) 19:41:in(Door Access) ', '04:46:00', '05:29:00', '01:41:00', NULL),
(48, '2014-01-17', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:11:00', '16:48:00', '7:37', '00:11:00', '01:11:00', 'Present ', '09:11:in(Door Access) 11:23:out(Door Access) 14:04:in(Door Access) 14:16:out(Door Access) 16:22:in(Door Access) 16:22:(Door Access) 16:23:(Door Access) 16:42:out(Door Access) 16:48:in(Door Access) ', '04:54:00', '02:43:00', '00:00:00', NULL),
(49, '2014-01-18', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '00:00:00', '00:00:00', '0:00', '00:00:00', '00:00:00', 'WeeklyOff ', '', '00:00:00', '00:00:00', '00:00:00', NULL),
(50, '2014-01-19', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '00:00:00', '00:00:00', '0:00', '00:00:00', '00:00:00', 'WeeklyOff ', '', '00:00:00', '00:00:00', '00:00:00', NULL),
(51, '2014-01-20', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '13:50:00', '17:51:00', '4:00', '04:50:00', '00:09:00', 'Present ', '13:50:in(Door Access) 17:50:out(Door Access) 17:51:(Door Access) ', '00:01:00', '04:00:00', '00:00:00', NULL),
(52, '2014-01-21', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '08:46:00', '19:00:00', '9:14', '00:00:00', '00:00:00', 'Present ', '08:46:in(Door Access) 11:51:out(Door Access) 12:22:in(Door Access) 19:00:out(Door Access) ', '09:43:00', '00:31:00', '01:00:00', NULL),
(53, '2014-01-22', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '08:59:00', '19:15:00', '9:01', '00:00:00', '00:00:00', 'Present ', '08:59:in(Door Access) 19:15:out(Door Access) ', '10:16:00', '00:00:00', '01:15:00', NULL),
(54, '2014-01-23', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '10:30:00', '18:57:00', '7:30', '01:30:00', '00:00:00', 'Present ', '10:30:in(Door Access) 18:57:out(Door Access) ', '08:27:00', '00:00:00', '00:57:00', NULL),
(55, '2014-01-24', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:19:00', '19:02:00', '8:41', '00:19:00', '00:00:00', 'Present ', '09:19:in(Door Access) 19:02:out(Door Access) ', '09:43:00', '00:00:00', '01:02:00', NULL),
(56, '2014-01-25', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:44:00', '14:18:00', '4:34', '00:44:00', '03:41:00', 'Present ', '09:44:in(Door Access) 14:18:out(Door Access) ', '04:34:00', '00:00:00', '00:00:00', NULL),
(57, '2014-01-26', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '00:00:00', '00:00:00', '0:00', '00:00:00', '00:00:00', 'WeeklyOff ', '', '00:00:00', '00:00:00', '00:00:00', NULL),
(58, '2014-01-27', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '13:11:00', '20:39:00', '4:49', '04:11:00', '00:00:00', 'Present ', '13:11:in(Door Access) 20:37:out(Door Access) 20:38:(Door Access) 20:39:(Door Access) ', '07:27:00', '00:01:00', '02:37:00', NULL),
(59, '2014-01-28', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:26:00', '19:44:00', '8:34', '00:26:00', '00:00:00', 'Present ', '09:26:in(Door Access) 19:44:out(Door Access) ', '10:18:00', '00:00:00', '01:44:00', NULL),
(60, '2014-01-29', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '10:52:00', '22:34:00', '7:08', '01:52:00', '00:00:00', 'Present ', '10:52:in(Door Access) 22:34:out(Door Access) ', '11:42:00', '00:00:00', '04:34:00', NULL),
(61, '2014-01-30', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:41:00', '19:27:00', '8:19', '00:41:00', '00:00:00', 'Present ', '09:41:in(Door Access) 19:27:out(Door Access) ', '09:46:00', '00:00:00', '01:27:00', NULL),
(62, '2014-01-31', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '19:48:00', '8:11', '00:49:00', '00:00:00', 'Present ', '09:49:in(Door Access) 19:48:out(Door Access) ', '09:59:00', '00:00:00', '01:48:00', NULL),
(63, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', NULL, NULL, '00:00:00', NULL),
(64, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(65, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(66, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(67, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(68, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(69, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(70, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(71, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(72, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(73, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(74, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(75, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(76, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(77, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(78, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL),
(79, '2014-01-01', 1, 'Aswin', 'Codexmind Technologies', 'IT', 'Default', '', '', '', 'Normal', '09:49:00', '15:23:00', '5:34', '00:49:00', '02:36:00', 'Present ', '09:49:in(Door Access) 11:14:out(Door Access) 11:25:in(Door Access) 15:23:out(Door Access) ', '05:23:00', '00:11:00', '00:00:00', NULL);

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
  `feedback` varchar(500) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '1',
  UNIQUE KEY `id` (`id`),
  KEY `employee_code` (`employee_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`employee_code`, `employee_name`, `last_name`, `dob`, `gender`, `email_id`, `address`, `mobile_no1`, `mobile_no2`, `mobile_no3`, `doj`, `department`, `designation`, `monthly_salary`, `daily_salary`, `image`, `device_code`, `company`, `location`, `grade`, `team`, `shift_in_time`, `shift_out_time`, `category`, `employment_type`, `doc`, `card_number`, `id_card`, `id_card_image`, `passport`, `passport_image`, `aadhar`, `aadhar_image`, `driver_license`, `driver_license_image`, `feedback`, `id`, `status`) VALUES
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', 'Choose the department', 'Programmer', '12000', '400', '', '', 'Codex Mind Technology', 'Calicut', '', '', '09:00:00', '18:00:00', 'Permanent', '', '', '', '', '', '', '', '', '', '', '', '                                                                      ', 25, 1),
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', 26, 1),
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', 27, 1),
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', 28, 1),
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', 29, 1),
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, 1),
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', 31, 1),
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', 32, 1),
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', 33, 1),
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', 34, 1),
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', 35, 1),
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', 36, 1),
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', 37, 1),
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', 38, 1),
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', 39, 1),
(1, 'Aswin', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendence`
--

CREATE TABLE IF NOT EXISTS `tbl_attendence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `leave_dates` date DEFAULT NULL,
  `leave_matter` text,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_attendence`
--

INSERT INTO `tbl_attendence` (`id`, `user_id`, `leave_dates`, `leave_matter`, `status`) VALUES
(1, 1, '2014-02-01', 'fgfgh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE IF NOT EXISTS `tbl_leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_date` date DEFAULT NULL,
  `leave_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_leave`
--

INSERT INTO `tbl_leave` (`id`, `leave_date`, `leave_description`) VALUES
(1, '2014-01-10', 'Harthal');

-- --------------------------------------------------------

--
-- Table structure for table `user_work_history`
--

CREATE TABLE IF NOT EXISTS `user_work_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_code` bigint(20) DEFAULT NULL,
  `worked_date` date DEFAULT NULL,
  `worked_hour` time DEFAULT NULL,
  `over_time` time DEFAULT NULL,
  `under_time` time DEFAULT NULL,
  `early_by` time DEFAULT NULL,
  `late_by` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
