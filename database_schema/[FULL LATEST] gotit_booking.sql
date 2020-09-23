-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2018 at 09:19 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gotit_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE IF NOT EXISTS `accessories` (
  `accessory_id` smallint(5) unsigned NOT NULL,
  `accessory_name` varchar(85) NOT NULL,
  `accessory_quantity` smallint(5) unsigned DEFAULT NULL,
  `legacyid` char(16) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`accessory_id`, `accessory_name`, `accessory_quantity`, `legacyid`) VALUES
(2, 'liner', 2, NULL),
(3, 'Crisible', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_activation`
--

CREATE TABLE IF NOT EXISTS `account_activation` (
  `account_activation_id` mediumint(8) unsigned NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `activation_code` varchar(30) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `announcementid` mediumint(8) unsigned NOT NULL,
  `announcement_text` text NOT NULL,
  `priority` mediumint(8) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcementid`, `announcement_text`, `priority`, `start_date`, `end_date`) VALUES
(8, 'CHNS out of ser vice', NULL, '2018-03-12 00:00:00', '2018-03-26 00:00:00'),
(10, 'LC-QTOF-MS/MS training', NULL, '2018-03-27 00:00:00', '2018-03-28 00:00:00'),
(12, 'XRD PM', NULL, '2018-03-20 00:00:00', '2018-03-22 00:00:00'),
(13, 'XRF PM', NULL, '2018-03-14 00:00:00', '2018-03-15 00:00:00'),
(14, 'dfgdg', 1, '2018-03-28 00:00:00', '2018-04-19 00:00:00'),
(17, 'BEL-mini_PM', NULL, '2018-03-12 00:00:00', '2018-03-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_groups`
--

CREATE TABLE IF NOT EXISTS `announcement_groups` (
  `announcementid` mediumint(8) unsigned NOT NULL,
  `group_id` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `announcement_resources`
--

CREATE TABLE IF NOT EXISTS `announcement_resources` (
  `announcementid` mediumint(8) unsigned NOT NULL,
  `resource_id` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blackout_instances`
--

CREATE TABLE IF NOT EXISTS `blackout_instances` (
  `blackout_instance_id` int(10) unsigned NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `blackout_series_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blackout_series`
--

CREATE TABLE IF NOT EXISTS `blackout_series` (
  `blackout_series_id` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `last_modified` datetime DEFAULT NULL,
  `title` varchar(85) NOT NULL,
  `description` text,
  `owner_id` mediumint(8) unsigned NOT NULL,
  `legacyid` char(16) DEFAULT NULL,
  `repeat_type` varchar(10) DEFAULT NULL,
  `repeat_options` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blackout_series`
--

INSERT INTO `blackout_series` (`blackout_series_id`, `date_created`, `last_modified`, `title`, `description`, `owner_id`, `legacyid`, `repeat_type`, `repeat_options`) VALUES
(12, '2018-03-29 15:01:09', NULL, 'กด', NULL, 2, NULL, 'none', ''),
(16, '2018-03-29 15:05:51', NULL, 'PM', NULL, 2, NULL, 'none', ''),
(17, '2018-03-29 15:06:12', NULL, 'PM', NULL, 2, NULL, 'none', '');

-- --------------------------------------------------------

--
-- Table structure for table `blackout_series_resources`
--

CREATE TABLE IF NOT EXISTS `blackout_series_resources` (
  `blackout_series_id` int(10) unsigned NOT NULL,
  `resource_id` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blackout_series_resources`
--

INSERT INTO `blackout_series_resources` (`blackout_series_id`, `resource_id`) VALUES
(12, 10),
(16, 15),
(17, 10);

-- --------------------------------------------------------

--
-- Table structure for table `custom_attributes`
--

CREATE TABLE IF NOT EXISTS `custom_attributes` (
  `custom_attribute_id` mediumint(8) unsigned NOT NULL,
  `display_label` varchar(50) NOT NULL,
  `display_type` tinyint(2) unsigned NOT NULL,
  `attribute_category` tinyint(2) unsigned NOT NULL,
  `validation_regex` varchar(50) DEFAULT NULL,
  `is_required` tinyint(1) unsigned NOT NULL,
  `possible_values` text,
  `sort_order` tinyint(2) unsigned DEFAULT NULL,
  `admin_only` tinyint(1) unsigned DEFAULT NULL,
  `secondary_category` tinyint(2) unsigned DEFAULT NULL,
  `secondary_entity_ids` varchar(2000) DEFAULT NULL,
  `is_private` tinyint(1) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_attributes`
--

INSERT INTO `custom_attributes` (`custom_attribute_id`, `display_label`, `display_type`, `attribute_category`, `validation_regex`, `is_required`, `possible_values`, `sort_order`, `admin_only`, `secondary_category`, `secondary_entity_ids`, `is_private`) VALUES
(7, 'Special mode', 3, 1, '', 0, 'EDS,Diffraction', 0, 0, 4, '25', 0),
(8, 'Mode', 3, 1, '', 1, 'Powder mode,Modified mode', 0, 0, 4, '2', 0),
(9, 'Mode', 3, 1, '', 1, 'LC coupled with QTOF-MS/MS,APCI with direct probe,ES-QTOF mode', 0, 0, 4, '24', 0),
(10, 'tga', 3, 1, '', 1, 'O,N,Air', 0, 0, NULL, '', 0),
(11, 'data', 4, 1, '', 0, NULL, 0, 0, NULL, '', 1),
(12, 'test', 5, 1, '', 0, NULL, 0, 0, 4, '10', 0),
(13, 'Gas', 3, 1, '', 1, 'N2,O2,gg', 0, 0, 4, '27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `custom_attribute_entities`
--

CREATE TABLE IF NOT EXISTS `custom_attribute_entities` (
  `custom_attribute_id` mediumint(8) unsigned NOT NULL,
  `entity_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_attribute_values`
--

CREATE TABLE IF NOT EXISTS `custom_attribute_values` (
  `custom_attribute_value_id` int(8) unsigned NOT NULL,
  `custom_attribute_id` mediumint(8) unsigned NOT NULL,
  `attribute_value` text NOT NULL,
  `entity_id` mediumint(8) unsigned NOT NULL,
  `attribute_category` tinyint(2) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_attribute_values`
--

INSERT INTO `custom_attribute_values` (`custom_attribute_value_id`, `custom_attribute_id`, `attribute_value`, `entity_id`, `attribute_category`) VALUES
(17, 8, 'Powder mode', 87, 1),
(18, 8, 'Powder mode', 88, 1),
(19, 8, 'Modified mode', 89, 1),
(20, 8, 'Modified mode', 90, 1),
(21, 8, 'Powder mode', 91, 1),
(22, 8, 'Powder mode', 92, 1),
(23, 8, 'Powder mode', 93, 1),
(24, 8, 'Powder mode', 94, 1),
(25, 8, 'Powder mode', 95, 1),
(26, 8, 'Powder mode', 96, 1),
(27, 8, 'Powder mode', 97, 1),
(28, 8, 'Powder mode', 98, 1),
(29, 9, 'APCI with direct probe', 99, 1),
(30, 9, 'APCI with direct probe', 100, 1),
(31, 9, 'APCI with direct probe', 101, 1),
(32, 9, 'APCI with direct probe', 102, 1),
(33, 9, 'APCI with direct probe', 103, 1),
(34, 9, 'APCI with direct probe', 104, 1),
(35, 9, 'APCI with direct probe', 105, 1),
(36, 9, 'APCI with direct probe', 106, 1),
(37, 9, 'APCI with direct probe', 107, 1),
(38, 9, 'LC coupled with QTOF-MS/MS', 108, 1),
(39, 9, 'LC coupled with QTOF-MS/MS', 109, 1),
(40, 9, 'LC coupled with QTOF-MS/MS', 110, 1),
(41, 9, 'LC coupled with QTOF-MS/MS', 111, 1),
(42, 9, 'LC coupled with QTOF-MS/MS', 112, 1),
(43, 9, 'APCI with direct probe', 113, 1),
(44, 9, 'LC coupled with QTOF-MS/MS', 114, 1),
(45, 9, 'LC coupled with QTOF-MS/MS', 115, 1),
(46, 9, 'LC coupled with QTOF-MS/MS', 116, 1),
(47, 9, 'LC coupled with QTOF-MS/MS', 117, 1),
(48, 9, 'APCI with direct probe', 118, 1),
(49, 9, 'LC coupled with QTOF-MS/MS', 119, 1),
(50, 9, 'APCI with direct probe', 120, 1),
(51, 9, 'APCI with direct probe', 121, 1),
(52, 9, 'LC coupled with QTOF-MS/MS', 122, 1),
(53, 9, 'APCI with direct probe', 123, 1),
(55, 9, 'APCI with direct probe', 125, 1),
(56, 9, 'LC coupled with QTOF-MS/MS', 124, 1),
(57, 9, 'APCI with direct probe', 126, 1),
(58, 9, 'APCI with direct probe', 127, 1),
(59, 9, 'APCI with direct probe', 128, 1),
(60, 9, 'LC coupled with QTOF-MS/MS', 129, 1),
(61, 9, 'LC coupled with QTOF-MS/MS', 130, 1),
(62, 9, 'APCI with direct probe', 131, 1),
(63, 9, 'APCI with direct probe', 132, 1),
(64, 9, 'APCI with direct probe', 133, 1),
(65, 9, 'APCI with direct probe', 134, 1),
(66, 9, 'LC coupled with QTOF-MS/MS', 135, 1),
(67, 9, 'LC coupled with QTOF-MS/MS', 136, 1),
(68, 9, 'APCI with direct probe', 137, 1),
(69, 9, 'LC coupled with QTOF-MS/MS', 138, 1),
(70, 9, 'APCI with direct probe', 139, 1),
(71, 9, 'ES-QTOF mode', 140, 1),
(72, 9, 'LC coupled with QTOF-MS/MS', 141, 1),
(73, 9, 'APCI with direct probe', 142, 1),
(74, 9, 'APCI with direct probe', 143, 1),
(75, 9, 'LC coupled with QTOF-MS/MS', 144, 1),
(76, 9, 'APCI with direct probe', 145, 1),
(77, 9, 'APCI with direct probe', 146, 1),
(78, 9, 'APCI with direct probe', 147, 1),
(79, 9, 'APCI with direct probe', 148, 1),
(80, 9, 'LC coupled with QTOF-MS/MS', 149, 1),
(81, 8, 'Powder mode', 150, 1),
(82, 8, 'Powder mode', 151, 1),
(83, 8, 'Powder mode', 152, 1),
(84, 8, 'Powder mode', 153, 1),
(85, 8, 'Powder mode', 154, 1),
(86, 8, 'Powder mode', 155, 1),
(87, 8, 'Powder mode', 156, 1),
(88, 9, 'APCI with direct probe', 157, 1),
(89, 9, 'APCI with direct probe', 158, 1),
(90, 9, 'APCI with direct probe', 159, 1),
(91, 9, 'APCI with direct probe', 160, 1),
(92, 9, 'APCI with direct probe', 161, 1),
(93, 9, 'APCI with direct probe', 162, 1),
(94, 9, 'APCI with direct probe', 163, 1),
(95, 9, 'APCI with direct probe', 164, 1),
(96, 9, 'APCI with direct probe', 165, 1),
(97, 9, 'APCI with direct probe', 166, 1),
(98, 9, 'APCI with direct probe', 167, 1),
(99, 9, 'APCI with direct probe', 168, 1),
(100, 9, 'APCI with direct probe', 169, 1),
(101, 9, 'APCI with direct probe', 170, 1),
(102, 9, 'APCI with direct probe', 171, 1),
(103, 9, 'APCI with direct probe', 172, 1),
(104, 9, 'APCI with direct probe', 173, 1),
(105, 9, 'APCI with direct probe', 174, 1),
(106, 9, 'APCI with direct probe', 175, 1),
(107, 9, 'APCI with direct probe', 176, 1),
(108, 9, 'APCI with direct probe', 177, 1),
(109, 9, 'APCI with direct probe', 178, 1),
(110, 9, 'APCI with direct probe', 179, 1),
(111, 9, 'APCI with direct probe', 180, 1),
(112, 9, 'LC coupled with QTOF-MS/MS', 181, 1),
(113, 9, 'LC coupled with QTOF-MS/MS', 182, 1),
(114, 9, 'LC coupled with QTOF-MS/MS', 183, 1),
(115, 9, 'APCI with direct probe', 184, 1),
(116, 9, 'APCI with direct probe', 185, 1),
(117, 9, 'APCI with direct probe', 186, 1),
(118, 9, 'APCI with direct probe', 187, 1),
(120, 9, 'LC coupled with QTOF-MS/MS', 188, 1),
(121, 9, 'APCI with direct probe', 189, 1),
(122, 9, 'LC coupled with QTOF-MS/MS', 190, 1),
(123, 9, 'LC coupled with QTOF-MS/MS', 191, 1),
(124, 9, 'LC coupled with QTOF-MS/MS', 192, 1),
(125, 9, 'LC coupled with QTOF-MS/MS', 193, 1),
(126, 9, 'LC coupled with QTOF-MS/MS', 194, 1),
(127, 9, 'APCI with direct probe', 195, 1),
(128, 9, 'APCI with direct probe', 196, 1),
(129, 9, 'APCI with direct probe', 197, 1),
(130, 9, 'APCI with direct probe', 198, 1),
(131, 9, 'APCI with direct probe', 199, 1),
(132, 9, 'LC coupled with QTOF-MS/MS', 200, 1),
(133, 9, 'APCI with direct probe', 201, 1),
(134, 9, 'APCI with direct probe', 202, 1),
(135, 9, 'APCI with direct probe', 203, 1),
(137, 9, 'LC coupled with QTOF-MS/MS', 205, 1),
(138, 9, 'LC coupled with QTOF-MS/MS', 206, 1),
(139, 9, 'LC coupled with QTOF-MS/MS', 207, 1),
(140, 9, 'LC coupled with QTOF-MS/MS', 208, 1),
(141, 9, 'APCI with direct probe', 209, 1),
(142, 9, 'APCI with direct probe', 210, 1),
(143, 9, 'LC coupled with QTOF-MS/MS', 211, 1),
(144, 9, 'LC coupled with QTOF-MS/MS', 212, 1),
(145, 9, 'LC coupled with QTOF-MS/MS', 213, 1),
(146, 9, 'LC coupled with QTOF-MS/MS', 214, 1),
(147, 9, 'LC coupled with QTOF-MS/MS', 215, 1),
(148, 9, 'LC coupled with QTOF-MS/MS', 216, 1),
(149, 9, 'APCI with direct probe', 217, 1),
(150, 9, 'APCI with direct probe', 218, 1),
(151, 9, 'LC coupled with QTOF-MS/MS', 219, 1),
(152, 9, 'LC coupled with QTOF-MS/MS', 220, 1),
(153, 9, 'LC coupled with QTOF-MS/MS', 221, 1),
(154, 9, 'LC coupled with QTOF-MS/MS', 222, 1),
(155, 9, 'LC coupled with QTOF-MS/MS', 223, 1),
(156, 9, 'LC coupled with QTOF-MS/MS', 224, 1),
(157, 9, 'LC coupled with QTOF-MS/MS', 225, 1),
(158, 9, 'LC coupled with QTOF-MS/MS', 204, 1),
(159, 9, 'LC coupled with QTOF-MS/MS', 226, 1),
(160, 9, 'LC coupled with QTOF-MS/MS', 227, 1),
(161, 9, 'LC coupled with QTOF-MS/MS', 228, 1),
(162, 9, 'LC coupled with QTOF-MS/MS', 229, 1),
(163, 9, 'LC coupled with QTOF-MS/MS', 230, 1),
(164, 9, 'LC coupled with QTOF-MS/MS', 231, 1),
(165, 9, 'APCI with direct probe', 232, 1),
(166, 9, 'LC coupled with QTOF-MS/MS', 233, 1),
(167, 9, 'LC coupled with QTOF-MS/MS', 234, 1),
(168, 9, 'APCI with direct probe', 235, 1),
(169, 9, 'APCI with direct probe', 236, 1),
(170, 9, 'APCI with direct probe', 237, 1),
(171, 9, 'ES-QTOF mode', 238, 1),
(172, 9, 'APCI with direct probe', 239, 1),
(173, 9, 'APCI with direct probe', 240, 1),
(174, 9, 'APCI with direct probe', 241, 1),
(175, 9, 'APCI with direct probe', 242, 1),
(176, 9, 'ES-QTOF mode', 243, 1),
(177, 9, 'APCI with direct probe', 244, 1),
(178, 9, 'LC coupled with QTOF-MS/MS', 245, 1),
(179, 9, 'LC coupled with QTOF-MS/MS', 246, 1),
(180, 9, 'LC coupled with QTOF-MS/MS', 247, 1),
(181, 9, 'LC coupled with QTOF-MS/MS', 248, 1),
(182, 9, 'LC coupled with QTOF-MS/MS', 249, 1),
(183, 9, 'APCI with direct probe', 250, 1),
(185, 9, 'LC coupled with QTOF-MS/MS', 252, 1),
(186, 9, 'LC coupled with QTOF-MS/MS', 251, 1),
(187, 9, 'LC coupled with QTOF-MS/MS', 253, 1),
(188, 9, 'APCI with direct probe', 254, 1),
(189, 9, 'APCI with direct probe', 255, 1),
(190, 8, 'Powder mode', 270, 1),
(191, 8, 'Powder mode', 273, 1),
(192, 9, 'APCI with direct probe', 274, 1),
(193, 8, 'Powder mode', 276, 1),
(194, 8, 'Powder mode', 278, 1),
(195, 10, 'O', 303, 1),
(196, 11, '1', 304, 1),
(198, 10, 'N', 304, 1),
(199, 10, 'O', 305, 1),
(200, 12, '', 306, 1),
(201, 10, 'O', 306, 1),
(202, 12, '', 307, 1),
(203, 10, 'O', 307, 1),
(204, 12, '', 308, 1),
(205, 10, 'O', 308, 1),
(206, 12, '', 309, 1),
(207, 10, 'O', 309, 1),
(208, 12, '', 310, 1),
(209, 10, 'O', 310, 1),
(210, 12, '', 311, 1),
(211, 10, 'O', 311, 1),
(212, 8, 'Powder mode', 312, 1),
(213, 10, 'O', 312, 1),
(214, 12, '2018-03-13 00:00:00', 304, 1),
(215, 12, '', 313, 1),
(216, 10, 'O', 313, 1),
(217, 12, '', 314, 1),
(218, 10, 'O', 314, 1),
(219, 12, '', 315, 1),
(220, 10, 'O', 315, 1),
(221, 12, '', 316, 1),
(222, 10, 'O', 316, 1),
(223, 13, 'O2', 317, 1),
(224, 10, 'N', 317, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dbversion`
--

CREATE TABLE IF NOT EXISTS `dbversion` (
  `version_number` double unsigned NOT NULL DEFAULT '0',
  `version_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dbversion`
--

INSERT INTO `dbversion` (`version_number`, `version_date`) VALUES
(2.1, '2017-11-13 23:04:12'),
(2.2, '2017-11-13 23:04:12'),
(2.3, '2017-11-13 23:04:12'),
(2.4, '2017-11-13 23:04:12'),
(2.5, '2017-11-13 23:04:12'),
(2.6, '2017-11-13 23:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` smallint(5) unsigned NOT NULL,
  `name` varchar(85) NOT NULL,
  `admin_group_id` smallint(5) unsigned DEFAULT NULL,
  `legacyid` char(16) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `name`, `admin_group_id`, `legacyid`) VALUES
(3, 'Group1-Test', NULL, NULL),
(4, 'Group2-Test', NULL, NULL),
(5, 'Group3-Test', NULL, NULL),
(6, 'gc', NULL, NULL),
(7, 'frc', 7, NULL),
(8, 'Ann', NULL, NULL),
(9, 'ff', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_resource_permissions`
--

CREATE TABLE IF NOT EXISTS `group_resource_permissions` (
  `group_id` smallint(5) unsigned NOT NULL,
  `resource_id` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_resource_permissions`
--

INSERT INTO `group_resource_permissions` (`group_id`, `resource_id`) VALUES
(6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `group_roles`
--

CREATE TABLE IF NOT EXISTS `group_roles` (
  `group_id` smallint(8) unsigned NOT NULL,
  `role_id` tinyint(2) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_roles`
--

INSERT INTO `group_roles` (`group_id`, `role_id`) VALUES
(7, 1),
(7, 2),
(7, 3),
(7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `layouts`
--

CREATE TABLE IF NOT EXISTS `layouts` (
  `layout_id` mediumint(8) unsigned NOT NULL,
  `timezone` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layouts`
--

INSERT INTO `layouts` (`layout_id`, `timezone`) VALUES
(26, 'Asia/Bangkok'),
(27, 'Asia/Bangkok'),
(34, 'Asia/Bangkok'),
(35, 'Asia/Bangkok');

-- --------------------------------------------------------

--
-- Table structure for table `peak_times`
--

CREATE TABLE IF NOT EXISTS `peak_times` (
  `peak_times_id` mediumint(8) unsigned NOT NULL,
  `schedule_id` smallint(5) unsigned NOT NULL,
  `all_day` tinyint(1) unsigned NOT NULL,
  `start_time` varchar(10) DEFAULT NULL,
  `end_time` varchar(10) DEFAULT NULL,
  `every_day` tinyint(1) unsigned NOT NULL,
  `peak_days` varchar(13) DEFAULT NULL,
  `all_year` tinyint(1) unsigned NOT NULL,
  `begin_month` tinyint(1) unsigned NOT NULL,
  `begin_day` tinyint(1) unsigned NOT NULL,
  `end_month` tinyint(1) unsigned NOT NULL,
  `end_day` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotas`
--

CREATE TABLE IF NOT EXISTS `quotas` (
  `quota_id` mediumint(8) unsigned NOT NULL,
  `quota_limit` decimal(7,2) unsigned NOT NULL,
  `unit` varchar(25) NOT NULL,
  `duration` varchar(25) NOT NULL,
  `resource_id` smallint(5) unsigned DEFAULT NULL,
  `group_id` smallint(5) unsigned DEFAULT NULL,
  `schedule_id` smallint(5) unsigned DEFAULT NULL,
  `enforced_days` varchar(15) DEFAULT NULL,
  `enforced_time_start` time DEFAULT NULL,
  `enforced_time_end` time DEFAULT NULL,
  `scope` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotas`
--

INSERT INTO `quotas` (`quota_id`, `quota_limit`, `unit`, `duration`, `resource_id`, `group_id`, `schedule_id`, `enforced_days`, `enforced_time_start`, `enforced_time_end`, `scope`) VALUES
(3, '12.00', 'hours', 'month', 7, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(4, '24.00', 'hours', 'month', 8, NULL, 8, NULL, NULL, NULL, 'ExcludeCompleted'),
(5, '24.00', 'hours', 'month', 9, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(6, '12.00', 'hours', 'month', 10, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(7, '12.00', 'hours', 'month', 11, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(10, '12.00', 'hours', 'month', 13, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(12, '6.00', 'hours', 'month', 14, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(13, '48.00', 'hours', 'month', 15, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(14, '12.00', 'hours', 'month', 16, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(15, '6.00', 'hours', 'month', 17, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(16, '12.00', 'hours', 'month', 18, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(18, '12.00', 'hours', 'month', 19, NULL, 9, NULL, NULL, NULL, 'ExcludeCompleted'),
(19, '48.00', 'hours', 'month', 20, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(20, '6.00', 'hours', 'month', 21, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(21, '12.00', 'hours', 'month', 22, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(22, '12.00', 'hours', 'month', 23, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(23, '48.00', 'hours', 'month', 25, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(24, '48.00', 'hours', 'month', 26, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted'),
(26, '12.00', 'hours', 'month', 2, NULL, 8, NULL, NULL, NULL, 'ExcludeCompleted'),
(27, '0.00', 'hours', 'day', NULL, NULL, NULL, NULL, NULL, NULL, 'ExcludeCompleted'),
(28, '0.00', 'hours', 'day', NULL, NULL, NULL, NULL, NULL, NULL, 'ExcludeCompleted'),
(29, '0.00', 'hours', 'day', NULL, NULL, NULL, NULL, NULL, NULL, 'ExcludeCompleted'),
(31, '6.00', 'hours', 'day', 12, NULL, 1, NULL, NULL, NULL, 'ExcludeCompleted');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE IF NOT EXISTS `reminders` (
  `reminder_id` int(11) unsigned NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `address` text NOT NULL,
  `message` text NOT NULL,
  `sendtime` datetime NOT NULL,
  `refnumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_accessories`
--

CREATE TABLE IF NOT EXISTS `reservation_accessories` (
  `series_id` int(10) unsigned NOT NULL,
  `accessory_id` smallint(5) unsigned NOT NULL,
  `quantity` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation_accessories`
--

INSERT INTO `reservation_accessories` (`series_id`, `accessory_id`, `quantity`) VALUES
(290, 2, 1),
(304, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_color_rules`
--

CREATE TABLE IF NOT EXISTS `reservation_color_rules` (
  `reservation_color_rule_id` mediumint(8) unsigned NOT NULL,
  `custom_attribute_id` mediumint(8) unsigned NOT NULL,
  `attribute_type` smallint(5) unsigned DEFAULT NULL,
  `required_value` text,
  `comparison_type` smallint(5) unsigned DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_files`
--

CREATE TABLE IF NOT EXISTS `reservation_files` (
  `file_id` int(10) unsigned NOT NULL,
  `series_id` int(10) unsigned NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `file_type` varchar(75) DEFAULT NULL,
  `file_size` varchar(45) NOT NULL,
  `file_extension` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation_files`
--

INSERT INTO `reservation_files` (`file_id`, `series_id`, `file_name`, `file_type`, `file_size`, `file_extension`) VALUES
(1, 277, 'Registration form.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '34350', 'docx');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_guests`
--

CREATE TABLE IF NOT EXISTS `reservation_guests` (
  `reservation_instance_id` int(10) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `reservation_user_level` tinyint(2) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_instances`
--

CREATE TABLE IF NOT EXISTS `reservation_instances` (
  `reservation_instance_id` int(10) unsigned NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `reference_number` varchar(50) NOT NULL,
  `series_id` int(10) unsigned NOT NULL,
  `checkin_date` datetime DEFAULT NULL,
  `checkout_date` datetime DEFAULT NULL,
  `previous_end_date` datetime DEFAULT NULL,
  `credit_count` decimal(7,2) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=318 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation_instances`
--

INSERT INTO `reservation_instances` (`reservation_instance_id`, `start_date`, `end_date`, `reference_number`, `series_id`, `checkin_date`, `checkout_date`, `previous_end_date`, `credit_count`) VALUES
(1, '2017-11-14 14:00:00', '2017-11-14 17:30:00', '5a0a535bbc7c9209209568', 1, NULL, NULL, NULL, NULL),
(3, '2017-11-15 14:00:00', '2017-11-15 15:00:00', '5a0a54152042a871613972', 3, NULL, NULL, NULL, NULL),
(5, '2017-11-15 23:30:00', '2017-11-17 00:00:00', '5a0a7609bd6ad650701530', 5, NULL, NULL, NULL, NULL),
(7, '2018-01-06 14:00:00', '2018-01-06 14:30:00', '5a50cfa3c7f9d644122282', 7, NULL, NULL, NULL, NULL),
(8, '2018-01-08 06:00:00', '2018-01-09 06:00:00', '5a5399ac6d7e8261958205', 8, NULL, NULL, NULL, NULL),
(9, '2018-01-09 06:00:00', '2018-01-09 07:00:00', '5a5399b89e864601827443', 9, NULL, NULL, NULL, NULL),
(10, '2018-01-07 06:00:00', '2018-01-08 06:00:00', '5a547492999dd003892156', 10, NULL, NULL, NULL, '0.00'),
(11, '2018-01-08 06:00:00', '2018-01-10 06:00:00', '5a54e45e15386373217751', 11, NULL, NULL, NULL, NULL),
(12, '2018-01-10 06:00:00', '2018-01-11 06:00:00', '5a54eaaa593f2146312825', 12, NULL, NULL, NULL, NULL),
(13, '2018-01-08 06:00:00', '2018-01-09 02:00:00', '5a54f28619487407691105', 13, NULL, NULL, NULL, '0.00'),
(14, '2018-01-09 06:00:00', '2018-01-12 06:00:00', '5a54f28cb5d63248224551', 14, NULL, NULL, NULL, NULL),
(15, '2018-01-09 07:00:00', '2018-01-09 22:00:00', '5a54f2979b503315292779', 15, NULL, NULL, NULL, NULL),
(16, '2018-01-10 10:00:00', '2018-01-11 04:00:00', '5a54f2a3785bb855446013', 16, NULL, NULL, NULL, NULL),
(17, '2018-01-11 08:00:00', '2018-01-11 21:00:00', '5a5502c9095d6564858381', 17, NULL, NULL, NULL, NULL),
(18, '2018-01-12 09:00:00', '2018-01-13 02:00:00', '5a5502d131fad496780036', 18, NULL, NULL, NULL, NULL),
(19, '2018-01-13 08:00:00', '2018-01-14 01:00:00', '5a5507c415589343145812', 19, NULL, NULL, NULL, NULL),
(20, '2018-01-09 06:00:00', '2018-01-10 07:00:00', '5a5508f0073ba532583249', 20, NULL, NULL, '2018-01-10 05:00:00', NULL),
(21, '2018-01-08 09:00:00', '2018-01-09 01:00:00', '5a550a13cfda2584404794', 21, NULL, NULL, NULL, '0.00'),
(22, '2018-01-09 08:00:00', '2018-01-10 03:00:00', '5a550a1a7739c312808604', 22, NULL, NULL, NULL, NULL),
(23, '2018-01-09 06:00:00', '2018-01-10 03:00:00', '5a550a4d6bac3522937775', 23, NULL, NULL, NULL, NULL),
(24, '2018-01-08 06:00:00', '2018-01-09 06:00:00', '5a550a876e8bc411447230', 24, NULL, NULL, NULL, '0.00'),
(25, '2018-01-09 06:00:00', '2018-01-10 03:00:00', '5a55112f4dce8560319411', 25, NULL, NULL, NULL, NULL),
(26, '2018-01-10 09:00:00', '2018-01-11 06:00:00', '5a55166ab0b59215837122', 26, NULL, NULL, NULL, NULL),
(27, '2018-01-09 06:00:00', '2018-01-09 14:00:00', '5a55178f7023b992687970', 27, NULL, NULL, NULL, '0.00'),
(28, '2018-01-09 14:00:00', '2018-01-10 00:00:00', '5a55179642890668847145', 28, NULL, NULL, NULL, NULL),
(29, '2018-01-09 14:00:00', '2018-01-09 22:00:00', '5a5517e6e1166950867282', 29, NULL, NULL, NULL, NULL),
(30, '2018-01-09 14:00:00', '2018-01-09 18:00:00', '5a551850ed2f4236706820', 30, NULL, NULL, NULL, '0.00'),
(31, '2018-01-10 08:00:00', '2018-01-11 04:00:00', '5a55186285f18769368731', 31, NULL, NULL, NULL, NULL),
(32, '2018-01-11 10:00:00', '2018-01-13 05:00:00', '5a55186678f1e106422928', 32, NULL, NULL, NULL, NULL),
(33, '2018-02-01 06:00:00', '2018-02-01 15:00:00', '5a55187b86935232620521', 33, NULL, NULL, NULL, NULL),
(34, '2018-02-01 15:00:00', '2018-02-01 18:00:00', '5a55188eb4534839386904', 34, NULL, NULL, NULL, NULL),
(35, '2018-01-10 06:00:00', '2018-01-10 07:00:00', '5a5519a0b0b26466356847', 35, NULL, NULL, NULL, NULL),
(36, '2018-01-10 07:00:00', '2018-01-10 18:00:00', '5a5519abaa818205212198', 36, NULL, NULL, NULL, NULL),
(37, '2018-01-09 05:00:00', '2018-01-09 13:00:00', '5a551a95c4d9f123530110', 37, NULL, NULL, NULL, '0.00'),
(38, '2018-01-09 13:00:00', '2018-01-10 05:00:00', '5a551aaf48f78292436176', 38, NULL, NULL, NULL, NULL),
(39, '2018-01-10 06:00:00', '2018-01-10 18:00:00', '5a5521a05552d032350126', 39, NULL, NULL, NULL, NULL),
(40, '2018-01-11 06:00:00', '2018-01-11 21:00:00', '5a5684175f42e949219122', 40, NULL, NULL, NULL, NULL),
(41, '2018-01-11 06:00:00', '2018-01-11 19:00:00', '5a5684774ff7c537947882', 41, NULL, NULL, NULL, NULL),
(42, '2018-01-10 06:00:00', '2018-01-10 07:00:00', '5a568738a3642503133069', 42, NULL, NULL, NULL, '0.00'),
(43, '2018-01-10 17:00:00', '2018-01-10 18:00:00', '5a5687c8ca02a616034716', 43, NULL, NULL, NULL, '0.00'),
(44, '2018-01-11 17:00:00', '2018-01-11 18:00:00', '5a5687d0ae64d634194262', 44, NULL, NULL, NULL, NULL),
(45, '2018-01-10 17:00:00', '2018-01-10 18:00:00', '5a56880dafd28410141457', 45, NULL, NULL, NULL, '0.00'),
(46, '2018-01-10 18:00:00', '2018-01-11 17:00:00', '5a568812f10fb844482043', 46, NULL, NULL, NULL, NULL),
(47, '2018-01-10 17:00:00', '2018-01-10 19:00:00', '5a5688288e578562797601', 47, NULL, NULL, NULL, '0.00'),
(48, '2018-01-10 17:00:00', '2018-01-10 23:00:00', '5a568a4165b8d820788596', 48, NULL, NULL, NULL, NULL),
(49, '2018-01-10 17:00:00', '2018-01-10 23:00:00', '5a568e560656a523380469', 49, NULL, NULL, NULL, NULL),
(50, '2018-01-10 17:00:00', '2018-01-11 01:00:00', '5a568f8c6ff69814296781', 50, NULL, NULL, NULL, NULL),
(51, '2018-01-10 17:00:00', '2018-01-10 21:00:00', '5a5691b649cd7796809438', 51, NULL, NULL, NULL, '0.00'),
(52, '2018-01-10 17:00:00', '2018-01-10 18:00:00', '5a56922aa7725987714857', 52, NULL, NULL, NULL, '0.00'),
(53, '2018-01-10 17:00:00', '2018-01-10 22:00:00', '5a5693f5cd022933027394', 53, NULL, NULL, NULL, '0.00'),
(54, '2018-01-10 17:00:00', '2018-01-10 22:00:00', '5a5698a32b622362210630', 54, NULL, NULL, NULL, '0.00'),
(55, '2018-01-10 22:00:00', '2018-01-11 04:00:00', '5a569916e8171071140693', 55, NULL, NULL, NULL, NULL),
(56, '2018-01-10 17:00:00', '2018-01-10 22:00:00', '5a569a2de1a17947124975', 56, NULL, NULL, NULL, '0.00'),
(57, '2018-01-10 22:00:00', '2018-01-11 03:00:00', '5a569a6aa4f86174485455', 57, NULL, NULL, NULL, NULL),
(58, '2018-01-10 17:00:00', '2018-01-10 23:00:00', '5a569ab01b0ab615579652', 58, NULL, NULL, NULL, NULL),
(59, '2018-01-10 23:00:00', '2018-01-11 03:00:00', '5a569aca7e8c3222088177', 59, NULL, NULL, NULL, NULL),
(60, '2018-01-10 17:00:00', '2018-01-10 22:00:00', '5a569c240475c668786727', 60, NULL, NULL, NULL, '0.00'),
(61, '2018-01-11 05:00:00', '2018-01-11 07:00:00', '5a569f88a3ec2474719136', 61, NULL, NULL, NULL, NULL),
(62, '2018-01-11 05:00:00', '2018-01-11 07:00:00', '5a56a01c1f4ba702091210', 62, NULL, NULL, NULL, NULL),
(63, '2018-01-11 00:00:00', '2018-01-11 05:00:00', '5a56a064ad82a397691900', 63, NULL, NULL, NULL, '0.00'),
(64, '2018-01-11 05:00:00', '2018-01-11 07:00:00', '5a56a0c390ac9688315449', 64, NULL, NULL, NULL, NULL),
(65, '2018-01-11 00:00:00', '2018-01-11 05:00:00', '5a56a26db62f9981073963', 65, NULL, NULL, NULL, '0.00'),
(66, '2018-01-11 00:00:00', '2018-01-11 06:00:00', '5a56a2e34e7b9037020657', 66, NULL, NULL, NULL, '0.00'),
(67, '2018-01-11 20:00:00', '2018-01-12 00:00:00', '5a56a30f5f6bb287218496', 67, NULL, NULL, NULL, NULL),
(68, '2018-01-11 00:00:00', '2018-01-11 07:00:00', '5a56a3938073d687426277', 68, NULL, NULL, NULL, NULL),
(69, '2018-01-11 00:00:00', '2018-01-11 07:00:00', '5a56a4574742a232899371', 69, NULL, NULL, NULL, NULL),
(70, '2018-01-11 00:00:00', '2018-01-11 10:00:00', '5a56a4962e6b9639593974', 70, NULL, NULL, NULL, NULL),
(71, '2018-01-11 00:00:00', '2018-01-11 05:00:00', '5a56a531bc163907487422', 71, NULL, NULL, NULL, '0.00'),
(72, '2018-01-11 00:00:00', '2018-01-11 04:00:00', '5a56a5dc06af4910056298', 72, NULL, NULL, NULL, '0.00'),
(73, '2018-01-11 00:00:00', '2018-01-11 04:00:00', '5a56a673419d6453010699', 73, NULL, NULL, NULL, '0.00'),
(74, '2018-01-11 00:00:00', '2018-01-11 06:00:00', '5a56a793b69a5470622882', 74, NULL, NULL, NULL, '0.00'),
(75, '2018-01-11 00:00:00', '2018-01-11 03:00:00', '5a56a843a56fa249732878', 75, NULL, NULL, NULL, '0.00'),
(76, '2018-01-11 00:00:00', '2018-01-11 05:00:00', '5a56a87c2165e992563233', 76, NULL, NULL, NULL, '0.00'),
(77, '2018-01-11 00:00:00', '2018-01-11 05:00:00', '5a56a8bad1474901357035', 77, NULL, NULL, NULL, '0.00'),
(78, '2018-01-11 00:00:00', '2018-01-11 04:00:00', '5a56a8cf5ed70097879003', 78, NULL, NULL, NULL, '0.00'),
(79, '2018-01-13 11:00:00', '2018-01-13 13:00:00', '5a56a99b9ab00301201553', 79, NULL, NULL, NULL, NULL),
(80, '2018-01-11 00:00:00', '2018-01-11 04:00:00', '5a56e0bfd44ed773909944', 80, NULL, NULL, NULL, '0.00'),
(81, '2018-01-11 00:00:00', '2018-01-11 05:00:00', '5a56e0e60dcb3208797231', 81, NULL, NULL, NULL, '0.00'),
(82, '2018-01-11 00:00:00', '2018-01-11 05:00:00', '5a56e1675624d980136338', 82, NULL, NULL, NULL, '0.00'),
(83, '2018-01-13 09:00:00', '2018-01-13 12:00:00', '5a56e94a787e0072264935', 83, NULL, NULL, NULL, NULL),
(84, '2018-01-19 00:00:00', '2018-01-19 02:00:00', '5a60168e8251e731710963', 84, NULL, NULL, NULL, NULL),
(85, '2018-01-21 15:00:00', '2018-01-21 17:00:00', '5a638af7b0806369398610', 85, NULL, NULL, NULL, NULL),
(86, '2018-01-23 23:00:00', '2018-01-24 01:00:00', '5a657519335d5123924803', 86, NULL, NULL, NULL, NULL),
(87, '2018-01-26 00:00:00', '2018-01-26 01:00:00', '5a6966ab1ff35859794472', 87, NULL, NULL, NULL, NULL),
(88, '2018-01-27 03:00:00', '2018-01-27 04:00:00', '5a6b81749b9c2989633460', 88, NULL, NULL, NULL, NULL),
(89, '2018-01-27 04:00:00', '2018-01-27 05:00:00', '5a6b81967db36139280953', 89, NULL, NULL, NULL, NULL),
(90, '2018-01-27 05:00:00', '2018-01-27 06:00:00', '5a6b827579653363089230', 90, NULL, NULL, NULL, NULL),
(91, '2018-01-27 03:00:00', '2018-01-27 04:00:00', '5a6b88a2d887f123360540', 91, NULL, NULL, NULL, NULL),
(92, '2018-01-27 04:00:00', '2018-01-27 09:00:00', '5a6b88b35f456218301443', 92, NULL, NULL, NULL, NULL),
(93, '2018-01-27 09:00:00', '2018-01-27 10:00:00', '5a6b8aabe8123831458292', 93, NULL, NULL, NULL, NULL),
(94, '2018-01-27 10:00:00', '2018-01-27 11:00:00', '5a6b8ac9442ba165831661', 94, NULL, NULL, NULL, NULL),
(95, '2018-01-27 04:00:00', '2018-01-27 05:00:00', '5a6b8b4ce8467447885076', 95, NULL, NULL, NULL, NULL),
(96, '2018-01-27 04:00:00', '2018-01-27 05:00:00', '5a6b8cac5febd042598954', 96, NULL, NULL, NULL, NULL),
(97, '2018-01-27 04:00:00', '2018-01-27 05:00:00', '5a6b8dabdd7a8336158595', 97, NULL, NULL, NULL, NULL),
(98, '2018-01-27 04:00:00', '2018-01-27 05:00:00', '5a6b8e308d597062985901', 98, NULL, NULL, NULL, NULL),
(99, '2018-01-27 11:00:00', '2018-01-27 12:00:00', '5a6bf629bcd8f585045372', 99, NULL, NULL, NULL, NULL),
(100, '2018-02-04 23:00:00', '2018-02-05 00:00:00', '5a6bf68188b47837153929', 100, NULL, NULL, NULL, NULL),
(101, '2018-02-06 12:00:00', '2018-02-06 13:00:00', '5a6e3cf46d548254872363', 101, NULL, NULL, NULL, NULL),
(102, '2018-01-30 08:00:00', '2018-01-30 09:00:00', '5a6e3d274262d779143708', 102, NULL, NULL, NULL, NULL),
(103, '2018-01-29 08:00:00', '2018-01-29 09:00:00', '5a6e3d7617d5c776348911', 103, NULL, NULL, NULL, NULL),
(104, '2018-02-04 08:00:00', '2018-02-04 09:00:00', '5a6e3d8528360235107087', 104, NULL, NULL, NULL, NULL),
(105, '2018-01-29 08:00:00', '2018-01-29 09:00:00', '5a6e3e2373563920810184', 105, NULL, NULL, NULL, NULL),
(106, '2018-01-31 08:00:00', '2018-01-31 09:00:00', '5a6e948fbb563716780610', 106, NULL, NULL, NULL, NULL),
(107, '2018-02-04 09:00:00', '2018-02-04 10:00:00', '5a6e94a10deaa774162005', 107, NULL, NULL, NULL, NULL),
(108, '2018-02-01 08:00:00', '2018-02-01 14:00:00', '5a6ffc356dc90456455164', 108, NULL, NULL, NULL, NULL),
(109, '2018-02-01 05:00:00', '2018-02-01 07:00:00', '5a6ffc3f1b873533364775', 109, NULL, NULL, NULL, NULL),
(110, '2018-02-01 07:00:00', '2018-02-01 08:00:00', '5a6ffcef8677e029841735', 110, NULL, NULL, NULL, NULL),
(111, '2018-02-02 00:00:00', '2018-02-02 08:00:00', '5a6ffd195a867734051103', 111, NULL, NULL, NULL, NULL),
(112, '2018-02-03 07:00:00', '2018-02-03 11:00:00', '5a6ffd2868e95651091113', 112, NULL, NULL, NULL, NULL),
(113, '2018-01-31 09:00:00', '2018-01-31 10:00:00', '5a70a4a6242df811655035', 113, NULL, NULL, NULL, NULL),
(114, '2018-01-31 07:00:00', '2018-01-31 08:00:00', '5a70a4b0be0a4404178828', 114, NULL, NULL, NULL, NULL),
(115, '2018-02-03 07:00:00', '2018-02-03 12:00:00', '5a70a4b89b36d890449849', 115, NULL, NULL, NULL, NULL),
(116, '2018-02-03 07:00:00', '2018-02-03 11:00:00', '5a71763ebdac4659021182', 116, NULL, NULL, NULL, NULL),
(117, '2018-02-02 08:00:00', '2018-02-02 13:00:00', '5a71764b1df14104113830', 117, NULL, NULL, NULL, NULL),
(118, '2018-02-03 08:00:00', '2018-02-03 13:00:00', '5a7286ee734c6520268156', 118, NULL, NULL, NULL, NULL),
(119, '2018-02-03 13:00:00', '2018-02-03 22:00:00', '5a7286f9920f4202327339', 119, NULL, NULL, NULL, NULL),
(120, '2018-02-03 08:00:00', '2018-02-03 13:00:00', '5a729e88b290e867856038', 120, NULL, NULL, NULL, NULL),
(121, '2018-02-03 13:00:00', '2018-02-03 19:00:00', '5a729ef3ef7f3995387321', 121, NULL, NULL, NULL, NULL),
(122, '2018-02-03 13:00:00', '2018-02-03 18:00:00', '5a729f17e30f2631642643', 122, NULL, NULL, NULL, NULL),
(123, '2018-02-04 10:00:00', '2018-02-04 17:00:00', '5a72a01cd871a002582457', 123, NULL, NULL, NULL, NULL),
(124, '2018-02-09 10:00:00', '2018-02-09 14:00:00', '5a72a1e932038717186970', 124, NULL, NULL, NULL, NULL),
(125, '2018-02-10 10:00:00', '2018-02-10 14:00:00', '5a72a1f16c9c8284522707', 125, NULL, NULL, NULL, NULL),
(126, '2018-02-03 18:00:00', '2018-02-04 00:00:00', '5a74b3b0e9d80228206951', 126, NULL, NULL, NULL, NULL),
(127, '2018-02-08 10:00:00', '2018-02-08 15:00:00', '5a74b3e4b60d8551268676', 127, NULL, NULL, NULL, NULL),
(128, '2018-02-11 10:00:00', '2018-02-11 14:00:00', '5a74b3ed1fac5408120278', 128, NULL, NULL, NULL, NULL),
(129, '2018-02-09 14:00:00', '2018-02-09 19:00:00', '5a772e9670773025634323', 129, NULL, NULL, NULL, NULL),
(130, '2018-02-05 08:00:00', '2018-02-05 09:00:00', '5a776f97c706b399403224', 130, NULL, NULL, NULL, NULL),
(131, '2018-02-05 09:00:00', '2018-02-05 10:00:00', '5a7770113bff2305212323', 131, NULL, NULL, NULL, NULL),
(132, '2018-02-05 10:00:00', '2018-02-05 11:00:00', '5a777018bd2b4585568060', 132, NULL, NULL, NULL, NULL),
(133, '2018-02-06 10:00:00', '2018-02-06 11:00:00', '5a77702ac9781046470065', 133, NULL, NULL, NULL, NULL),
(134, '2018-02-07 10:00:00', '2018-02-07 17:00:00', '5a7770303c549343064599', 134, NULL, NULL, NULL, NULL),
(135, '2018-02-06 11:00:00', '2018-02-06 18:00:00', '5a777045183d4800381043', 135, NULL, NULL, NULL, NULL),
(136, '2018-02-05 09:00:00', '2018-02-05 10:00:00', '5a777143c7c4f910006955', 136, NULL, NULL, NULL, NULL),
(137, '2018-02-05 19:00:00', '2018-02-05 20:00:00', '5a777160f1701351480325', 137, NULL, NULL, NULL, NULL),
(138, '2018-02-05 21:00:00', '2018-02-05 22:00:00', '5a77716d84f00206234379', 138, NULL, NULL, NULL, NULL),
(139, '2018-02-06 09:00:00', '2018-02-06 10:00:00', '5a7778c88761a761878745', 139, NULL, NULL, NULL, NULL),
(140, '2018-02-06 10:00:00', '2018-02-06 11:00:00', '5a7778ced2726218583451', 140, NULL, NULL, NULL, NULL),
(141, '2018-02-06 11:00:00', '2018-02-06 12:00:00', '5a7778d4d8b02571639919', 141, NULL, NULL, NULL, NULL),
(142, '2018-02-07 04:00:00', '2018-02-07 07:00:00', '5a78bcf0b8214854265790', 142, NULL, NULL, NULL, NULL),
(143, '2018-02-07 08:00:00', '2018-02-07 13:00:00', '5a78bcf680d3d262773681', 143, NULL, NULL, NULL, NULL),
(144, '2018-02-06 23:00:00', '2018-02-07 00:00:00', '5a79c2dfad05e085891136', 144, NULL, NULL, NULL, NULL),
(145, '2018-02-07 00:00:00', '2018-02-07 01:00:00', '5a79c39bb8420063150480', 145, NULL, NULL, NULL, NULL),
(146, '2018-02-07 01:00:00', '2018-02-07 02:00:00', '5a79c3a1f2228903328963', 146, NULL, NULL, NULL, NULL),
(147, '2018-02-07 00:00:00', '2018-02-07 01:00:00', '5a79c42153b06611957311', 147, NULL, NULL, NULL, NULL),
(148, '2018-02-07 00:00:00', '2018-02-07 01:00:00', '5a79c46b25f66604349804', 148, NULL, NULL, NULL, NULL),
(149, '2018-02-07 00:00:00', '2018-02-07 01:00:00', '5a79c47ab5890650646592', 149, NULL, NULL, NULL, NULL),
(150, '2018-02-06 23:00:00', '2018-02-07 00:00:00', '5a79c4d5a66ad478247649', 150, NULL, NULL, NULL, NULL),
(151, '2018-02-08 00:00:00', '2018-02-08 01:00:00', '5a79c51a8ab84636590304', 151, NULL, NULL, NULL, NULL),
(152, '2018-02-10 00:00:00', '2018-02-10 01:00:00', '5a79c51f47d32165087678', 152, NULL, NULL, NULL, NULL),
(153, '2018-02-08 01:00:00', '2018-02-08 02:00:00', '5a79c5404abd2401220802', 153, NULL, NULL, NULL, NULL),
(154, '2018-02-08 15:00:00', '2018-02-08 16:00:00', '5a79cb9e86190856217968', 154, NULL, NULL, NULL, NULL),
(155, '2018-02-07 00:00:00', '2018-02-07 01:00:00', '5a79d3f319ead049091225', 155, NULL, NULL, NULL, NULL),
(156, '2018-02-08 01:00:00', '2018-02-08 02:00:00', '5a79d3ff5d3be594200627', 156, NULL, NULL, NULL, NULL),
(157, '2018-02-07 00:00:00', '2018-02-07 01:00:00', '5a79d414c5723374873932', 157, NULL, NULL, NULL, NULL),
(158, '2018-02-07 00:00:00', '2018-02-07 01:00:00', '5a79d48f5575a260108977', 158, NULL, NULL, NULL, NULL),
(159, '2018-02-07 09:00:00', '2018-02-07 10:00:00', '5a79d498a74a6434382526', 159, NULL, NULL, NULL, NULL),
(160, '2018-02-07 00:00:00', '2018-02-07 01:00:00', '5a79dacab0a13265361734', 160, NULL, NULL, NULL, NULL),
(161, '2018-02-07 08:00:00', '2018-02-07 09:00:00', '5a79dadee5160062967653', 161, NULL, NULL, NULL, NULL),
(162, '2018-02-07 13:00:00', '2018-02-07 14:00:00', '5a79dae4cf863376465238', 162, NULL, NULL, NULL, NULL),
(163, '2018-02-07 00:00:00', '2018-02-07 01:00:00', '5a79dc8dbf724764705213', 163, NULL, NULL, NULL, NULL),
(164, '2018-02-07 00:00:00', '2018-02-07 01:00:00', '5a79dd1861913069523847', 164, NULL, NULL, NULL, NULL),
(165, '2018-02-07 01:00:00', '2018-02-07 02:00:00', '5a79e6de455ed333261316', 165, NULL, NULL, NULL, NULL),
(166, '2018-02-07 01:00:00', '2018-02-07 02:00:00', '5a79e736982b6585144042', 166, NULL, NULL, NULL, NULL),
(167, '2018-02-07 01:00:00', '2018-02-07 02:00:00', '5a79e7c8da02b768833891', 167, NULL, NULL, NULL, NULL),
(168, '2018-02-07 01:00:00', '2018-02-07 02:00:00', '5a79e7e98cf30889814974', 168, NULL, NULL, NULL, NULL),
(169, '2018-02-07 01:00:00', '2018-02-07 02:00:00', '5a79e87b89677667979976', 169, NULL, NULL, NULL, NULL),
(170, '2018-02-07 02:00:00', '2018-02-07 03:00:00', '5a79e94837b67703665049', 170, NULL, NULL, NULL, NULL),
(171, '2018-02-07 03:00:00', '2018-02-07 04:00:00', '5a79ea2c5d83b472784884', 171, NULL, NULL, NULL, NULL),
(172, '2018-02-07 09:00:00', '2018-02-07 10:00:00', '5a79eb982e429045433137', 172, NULL, NULL, NULL, NULL),
(173, '2018-02-07 08:00:00', '2018-02-07 09:00:00', '5a79eba2b872b797843711', 173, NULL, NULL, NULL, NULL),
(174, '2018-02-11 08:00:00', '2018-02-11 09:00:00', '5a79ec6266823263056951', 174, NULL, NULL, NULL, NULL),
(175, '2018-02-12 08:00:00', '2018-02-12 14:00:00', '5a79ec94122cd543679356', 175, NULL, NULL, NULL, NULL),
(176, '2018-02-13 08:00:00', '2018-02-13 14:00:00', '5a79f1152eaa0111075085', 176, NULL, NULL, NULL, NULL),
(177, '2018-02-14 08:00:00', '2018-02-14 14:00:00', '5a79f11e09590358178286', 177, NULL, NULL, NULL, NULL),
(178, '2018-02-18 08:00:00', '2018-02-18 14:00:00', '5a79f13a0e4d0733835028', 178, NULL, NULL, NULL, NULL),
(179, '2018-02-18 04:00:00', '2018-02-18 08:00:00', '5a79f144bd68c556174649', 179, NULL, NULL, '2018-02-18 07:00:00', NULL),
(180, '2018-02-12 08:00:00', '2018-02-12 15:00:00', '5a79f16b1f7e7904469005', 180, NULL, NULL, NULL, NULL),
(181, '2018-02-15 08:00:00', '2018-02-15 14:00:00', '5a79f23ad556b357020271', 181, NULL, NULL, NULL, NULL),
(182, '2018-02-09 08:00:00', '2018-02-09 14:00:00', '5a79f24e206b8578250267', 182, NULL, NULL, NULL, NULL),
(183, '2018-02-08 08:00:00', '2018-02-08 15:00:00', '5a79f2a5ca216541878736', 183, NULL, NULL, NULL, NULL),
(184, '2018-02-09 08:00:00', '2018-02-09 15:00:00', '5a79f75c2c857693198253', 184, NULL, NULL, NULL, NULL),
(185, '2018-02-10 08:00:00', '2018-02-10 15:00:00', '5a79f7968a46b214828587', 185, NULL, NULL, NULL, NULL),
(186, '2018-02-10 08:00:00', '2018-02-10 15:00:00', '5a79f86319f32652572438', 186, NULL, NULL, NULL, NULL),
(187, '2018-02-10 08:00:00', '2018-02-10 15:00:00', '5a79ff1f8fc43260076195', 187, NULL, NULL, NULL, NULL),
(188, '2018-02-10 08:00:00', '2018-02-10 15:00:00', '5a79ff609e3c1557849014', 188, NULL, NULL, NULL, NULL),
(189, '2018-02-07 04:00:00', '2018-02-07 07:00:00', '5a79ff9081f10466000301', 189, NULL, NULL, NULL, NULL),
(190, '2018-02-08 08:00:00', '2018-02-08 14:00:00', '5a79ffdfe7f50430143958', 190, NULL, NULL, NULL, NULL),
(191, '2018-02-09 08:00:00', '2018-02-09 14:00:00', '5a7a002286833062432535', 191, NULL, NULL, NULL, NULL),
(192, '2018-02-10 08:00:00', '2018-02-10 14:00:00', '5a7a006244db8915317177', 192, NULL, NULL, NULL, NULL),
(193, '2018-02-16 08:00:00', '2018-02-16 14:00:00', '5a7a00a7e3a4e617000515', 193, NULL, NULL, NULL, NULL),
(194, '2018-02-13 03:00:00', '2018-02-13 07:00:00', '5a7a00ad95d9d959711603', 194, NULL, NULL, NULL, NULL),
(195, '2018-02-14 04:00:00', '2018-02-14 06:00:00', '5a7a00b5747de362317987', 195, NULL, NULL, NULL, NULL),
(196, '2018-02-07 04:00:00', '2018-02-07 06:00:00', '5a7a010fad15e832558770', 196, NULL, NULL, NULL, NULL),
(197, '2018-02-17 08:00:00', '2018-02-17 14:00:00', '5a7a089f460f5889895896', 197, NULL, NULL, NULL, NULL),
(198, '2018-02-07 03:00:00', '2018-02-07 08:00:00', '5a7a090e49783852909883', 198, NULL, NULL, NULL, NULL),
(199, '2018-02-07 04:00:00', '2018-02-07 08:00:00', '5a7a097155b92603448074', 199, NULL, NULL, NULL, NULL),
(200, '2018-02-11 08:00:00', '2018-02-11 15:00:00', '5a7a16263d7b6721824775', 200, NULL, NULL, NULL, NULL),
(201, '2018-02-08 11:00:00', '2018-02-08 15:00:00', '5a7a76dc39863723756829', 201, NULL, NULL, NULL, NULL),
(202, '2018-02-07 11:00:00', '2018-02-07 15:00:00', '5a7a7722ec149702750762', 202, NULL, NULL, NULL, NULL),
(203, '2018-02-08 01:00:00', '2018-02-08 02:00:00', '5a7a782ca0780432310277', 203, NULL, NULL, NULL, NULL),
(204, '2018-02-09 10:00:00', '2018-02-09 15:00:00', '5a7a87ccc65ea393559735', 204, NULL, NULL, NULL, NULL),
(205, '2018-02-13 09:00:00', '2018-02-13 14:00:00', '5a7a87df242ca145270806', 205, NULL, NULL, NULL, NULL),
(206, '2018-02-13 09:00:00', '2018-02-13 14:00:00', '5a7a8ad6e13e5471071814', 206, NULL, NULL, NULL, NULL),
(207, '2018-02-15 09:00:00', '2018-02-15 14:00:00', '5a7aae0620d98354338168', 207, NULL, NULL, NULL, NULL),
(208, '2018-02-12 08:00:00', '2018-02-12 13:00:00', '5a7aafaaa9a9b959976528', 208, NULL, NULL, NULL, NULL),
(209, '2018-02-08 10:00:00', '2018-02-08 15:00:00', '5a7b5047c00b0635230378', 209, NULL, NULL, NULL, NULL),
(210, '2018-02-11 00:00:00', '2018-02-11 05:00:00', '5a7b505487495383541691', 210, NULL, NULL, NULL, NULL),
(211, '2018-02-12 20:00:00', '2018-02-12 23:00:00', '5a7c7fda56925609220394', 211, NULL, NULL, NULL, NULL),
(212, '2018-02-15 08:00:00', '2018-02-15 13:00:00', '5a7c7fe9a9dcb796841309', 212, NULL, NULL, NULL, NULL),
(213, '2018-02-12 08:00:00', '2018-02-12 13:00:00', '5a7c7fee928aa952065530', 213, NULL, NULL, NULL, NULL),
(214, '2018-02-13 08:00:00', '2018-02-13 13:00:00', '5a7c7ff60fe4e053849657', 214, NULL, NULL, NULL, NULL),
(215, '2018-02-13 07:00:00', '2018-02-13 08:00:00', '5a7c8091d915d100889947', 215, NULL, NULL, NULL, NULL),
(216, '2018-02-13 20:00:00', '2018-02-13 23:00:00', '5a7c80d002e85696508454', 216, NULL, NULL, NULL, NULL),
(217, '2018-02-13 08:00:00', '2018-02-13 13:00:00', '5a7c80eabb2e5648560997', 217, NULL, NULL, NULL, NULL),
(218, '2018-02-14 08:00:00', '2018-02-14 12:00:00', '5a7c80f731e78673441431', 218, NULL, NULL, NULL, NULL),
(219, '2018-02-16 01:00:00', '2018-02-16 16:00:00', '5a7c810063e6b511689488', 219, NULL, NULL, NULL, NULL),
(220, '2018-02-17 00:00:00', '2018-02-18 00:00:00', '5a7c8109b4102638166780', 220, NULL, NULL, NULL, NULL),
(221, '2018-02-15 01:00:00', '2018-02-15 07:00:00', '5a7c8116b4d95440082568', 221, NULL, NULL, NULL, NULL),
(222, '2018-02-15 13:00:00', '2018-02-16 00:00:00', '5a7c811ff1528940163020', 222, NULL, NULL, NULL, NULL),
(223, '2018-02-15 07:00:00', '2018-02-15 08:00:00', '5a7c8127ebae4005842254', 223, NULL, NULL, NULL, NULL),
(224, '2018-02-15 00:00:00', '2018-02-15 01:00:00', '5a7c812fd2b89953377016', 224, NULL, NULL, NULL, NULL),
(225, '2018-02-16 00:00:00', '2018-02-16 01:00:00', '5a7c81379ae77452925052', 225, NULL, NULL, NULL, NULL),
(226, '2018-02-16 16:00:00', '2018-02-17 00:00:00', '5a7c81684144c818903281', 226, NULL, NULL, NULL, NULL),
(227, '2018-02-17 00:00:00', '2018-02-17 06:00:00', '5a7c8abfd25fe402731831', 227, NULL, NULL, NULL, NULL),
(228, '2018-02-17 06:00:00', '2018-02-17 13:00:00', '5a7c8b0b13b0f400862154', 228, NULL, NULL, NULL, NULL),
(229, '2018-02-17 13:00:00', '2018-02-17 17:00:00', '5a7c8b428228b718213226', 229, NULL, NULL, NULL, NULL),
(230, '2018-02-17 17:00:00', '2018-02-17 21:00:00', '5a7c8bd29dd6c217925889', 230, NULL, NULL, NULL, NULL),
(231, '2018-02-17 21:00:00', '2018-02-18 00:00:00', '5a7c8c94980fa758042425', 231, NULL, NULL, NULL, NULL),
(232, '2018-02-14 20:00:00', '2018-02-15 00:00:00', '5a7c8d670d0c3291168591', 232, NULL, NULL, NULL, NULL),
(233, '2018-02-11 00:00:00', '2018-02-11 03:00:00', '5a7c8dd55ce24772548966', 233, NULL, NULL, NULL, NULL),
(234, '2018-02-11 03:00:00', '2018-02-11 08:00:00', '5a7c8ddede32a729889409', 234, NULL, NULL, NULL, NULL),
(235, '2018-02-10 00:00:00', '2018-02-10 08:00:00', '5a7c93b814435021472301', 235, NULL, NULL, NULL, NULL),
(236, '2018-02-10 08:00:00', '2018-02-10 14:00:00', '5a7c93c690de6541701409', 236, NULL, NULL, NULL, NULL),
(237, '2018-02-11 08:00:00', '2018-02-11 15:00:00', '5a7c93d2af782590437251', 237, NULL, NULL, NULL, NULL),
(238, '2018-02-11 15:00:00', '2018-02-11 21:00:00', '5a7c93eb9552b768089703', 238, NULL, NULL, NULL, NULL),
(239, '2018-02-11 21:00:00', '2018-02-12 00:00:00', '5a7c93f39863a358247965', 239, NULL, NULL, NULL, NULL),
(240, '2018-02-11 21:00:00', '2018-02-12 00:00:00', '5a7c990009c84226964532', 240, NULL, NULL, NULL, NULL),
(241, '2018-02-11 21:00:00', '2018-02-12 00:00:00', '5a7c992cc1d93089578790', 241, NULL, NULL, NULL, NULL),
(242, '2018-02-11 21:00:00', '2018-02-12 00:00:00', '5a7c9f4c889e6661743299', 242, NULL, NULL, NULL, NULL),
(243, '2018-02-11 21:00:00', '2018-02-12 00:00:00', '5a7c9f70da55e475129188', 243, NULL, NULL, NULL, NULL),
(244, '2018-02-11 21:00:00', '2018-02-12 00:00:00', '5a7ca51ac1f33684463018', 244, NULL, NULL, NULL, NULL),
(245, '2018-02-11 20:00:00', '2018-02-11 21:00:00', '5a7caa2ac18d6275078891', 245, NULL, NULL, NULL, NULL),
(246, '2018-02-11 21:00:00', '2018-02-12 00:00:00', '5a7caa3096dbd106433290', 246, NULL, NULL, NULL, NULL),
(247, '2018-02-15 08:00:00', '2018-02-15 20:00:00', '5a7caa8432dc5649097151', 247, NULL, NULL, NULL, NULL),
(248, '2018-02-16 08:00:00', '2018-02-16 20:00:00', '5a7caa893fa24252714627', 248, NULL, NULL, NULL, NULL),
(249, '2018-02-17 08:00:00', '2018-02-17 20:00:00', '5a7caad14dbb9029327265', 249, NULL, NULL, NULL, NULL),
(250, '2018-02-12 00:00:00', '2018-02-12 06:00:00', '5a7cab45bdfd0664364064', 250, NULL, NULL, NULL, NULL),
(251, '2018-02-12 20:00:00', '2018-02-13 00:00:00', '5a7cab5b15393941233652', 251, NULL, NULL, NULL, NULL),
(252, '2018-02-13 20:00:00', '2018-02-14 00:00:00', '5a7cabd5bdcc3813928956', 252, NULL, NULL, NULL, NULL),
(253, '2018-02-14 20:00:00', '2018-02-15 00:00:00', '5a7caf280b03c784249671', 253, NULL, NULL, NULL, NULL),
(254, '2018-02-15 20:00:00', '2018-02-16 00:00:00', '5a7caf366d5a0422722587', 254, NULL, NULL, NULL, NULL),
(255, '2018-02-14 08:00:00', '2018-02-14 20:00:00', '5a7caf3e6dcbc117697213', 255, NULL, NULL, '2018-02-14 19:00:00', NULL),
(256, '2018-02-17 11:00:00', '2018-02-17 12:00:00', '5a8683d0610b0534784295', 256, NULL, NULL, NULL, NULL),
(257, '2018-02-18 09:00:00', '2018-02-18 14:00:00', '5a86840689d30689780648', 257, NULL, NULL, NULL, NULL),
(258, '2018-02-20 07:00:00', '2018-02-20 11:00:00', '5a868431dbe7c910758708', 258, NULL, NULL, NULL, NULL),
(259, '2018-02-19 00:00:00', '2018-02-19 04:00:00', '5a88792a675c9993696486', 259, NULL, NULL, NULL, NULL),
(260, '2018-02-19 00:00:00', '2018-02-19 01:00:00', '5a887c5289d79466833834', 260, NULL, NULL, NULL, NULL),
(261, '2018-02-20 00:00:00', '2018-02-20 11:00:00', '5a887d79a5c7c998714973', 261, NULL, NULL, NULL, NULL),
(262, '2018-02-21 00:00:00', '2018-02-21 01:00:00', '5a887daa18b4d826617528', 262, NULL, NULL, NULL, NULL),
(263, '2018-02-21 01:00:00', '2018-02-21 11:00:00', '5a887daedfbba966884685', 263, NULL, NULL, NULL, NULL),
(264, '2018-02-21 00:00:00', '2018-02-21 12:00:00', '5a887f6b3b87e342847369', 264, NULL, NULL, NULL, NULL),
(265, '2018-02-22 03:00:00', '2018-02-22 15:00:00', '5a887f8cd136d809883480', 265, NULL, NULL, NULL, NULL),
(266, '2018-02-21 03:00:00', '2018-02-21 10:00:00', '5a887fdd19964683197988', 266, NULL, NULL, NULL, NULL),
(267, '2018-03-08 04:00:00', '2018-03-08 05:00:00', '5a9e6129ea260112966978', 267, NULL, NULL, NULL, NULL),
(268, '2018-03-08 05:00:00', '2018-03-08 10:00:00', '5a9e615ba3cd0098791194', 268, NULL, NULL, NULL, NULL),
(269, '2018-03-08 10:00:00', '2018-03-08 11:00:00', '5a9e6459d3425956998213', 269, NULL, NULL, NULL, NULL),
(270, '2018-03-09 11:00:00', '2018-03-09 14:00:00', '5a9f5be3b9370939060605', 270, NULL, NULL, NULL, NULL),
(271, '2018-03-12 00:00:00', '2018-03-12 11:00:00', '5aa09f4aa980a214903757', 271, NULL, NULL, NULL, NULL),
(272, '2018-03-11 09:00:00', '2018-03-11 20:00:00', '5aa0a1d39150b493085932', 272, NULL, NULL, NULL, NULL),
(273, '2018-03-10 08:00:00', '2018-03-10 09:00:00', '5aa1e7a9ca374555252230', 273, NULL, NULL, NULL, NULL),
(274, '2018-03-10 13:00:00', '2018-03-10 14:00:00', '5aa1e84575374567756052', 274, NULL, NULL, NULL, NULL),
(275, '2018-03-11 09:00:00', '2018-03-11 23:00:00', '5aa1e9ed54ceb369833583', 275, NULL, NULL, NULL, NULL),
(276, '2018-03-11 01:00:00', '2018-03-11 09:00:00', '5aa1eca2ad42c621255486', 276, NULL, NULL, NULL, NULL),
(277, '2018-03-21 08:00:00', '2018-03-21 14:00:00', '5aa1ed9599e03385517088', 277, NULL, NULL, NULL, NULL),
(278, '2018-03-15 00:00:00', '2018-03-15 03:00:00', '5aa2348249f9f816593724', 278, NULL, NULL, NULL, NULL),
(279, '2018-03-14 02:00:00', '2018-03-14 22:00:00', '5aa5e3d5e3d16861127800', 279, NULL, NULL, NULL, NULL),
(280, '2018-03-15 05:00:00', '2018-03-15 16:00:00', '5aa5e414c4744013309044', 280, NULL, NULL, NULL, NULL),
(281, '2018-03-13 01:00:00', '2018-03-13 22:00:00', '5aa62cd9a539c091673417', 281, NULL, NULL, NULL, NULL),
(282, '2018-03-15 03:00:00', '2018-03-15 05:00:00', '5aa62d8dd7119705317609', 282, NULL, NULL, NULL, NULL),
(283, '2018-03-17 12:00:00', '2018-03-17 14:00:00', '5aa62d98c5427041327154', 283, NULL, NULL, NULL, NULL),
(284, '2018-03-15 08:00:00', '2018-03-15 15:00:00', '5aa631ced2106110148885', 284, NULL, NULL, NULL, NULL),
(285, '2018-03-15 06:00:00', '2018-03-15 09:00:00', '5aa6322d9feab056042306', 285, NULL, NULL, NULL, NULL),
(286, '2018-03-15 10:00:00', '2018-03-15 14:00:00', '5aa6323bf3ee7722387843', 286, NULL, NULL, NULL, NULL),
(287, '2018-03-15 10:00:00', '2018-03-15 15:00:00', '5aa6324736c8a849270515', 287, NULL, NULL, NULL, NULL),
(288, '2018-03-15 09:00:00', '2018-03-15 15:00:00', '5aa6325b34823259231198', 288, NULL, NULL, NULL, NULL),
(289, '2018-03-15 09:00:00', '2018-03-15 15:00:00', '5aa6326806f73797058051', 289, NULL, NULL, NULL, NULL),
(290, '2018-03-15 10:00:00', '2018-03-15 15:00:00', '5aa63287cc516383960272', 290, NULL, NULL, NULL, NULL),
(291, '2018-03-15 09:00:00', '2018-03-15 13:00:00', '5aa632ae04700203504529', 291, NULL, NULL, NULL, NULL),
(292, '2018-03-15 09:00:00', '2018-03-15 16:00:00', '5aa632e1bd601924765092', 292, NULL, NULL, NULL, NULL),
(293, '2018-03-29 04:00:00', '2018-03-29 21:00:00', '5abb056b3afb1396667985', 293, NULL, NULL, NULL, NULL),
(294, '2018-03-29 05:00:00', '2018-03-29 06:00:00', '5abb05b3d565a797789011', 294, NULL, NULL, NULL, NULL),
(295, '2018-04-04 03:00:00', '2018-04-04 07:00:00', '5abb0604a3d0b387035222', 295, NULL, NULL, NULL, NULL),
(296, '2018-03-29 07:00:00', '2018-03-29 19:00:00', '5abb072694ac0540901990', 296, NULL, NULL, NULL, NULL),
(297, '2018-03-30 05:00:00', '2018-03-30 14:00:00', '5abb093c55020440479037', 297, NULL, NULL, NULL, NULL),
(298, '2018-03-30 00:00:00', '2018-03-31 00:00:00', '5abb0af326981522547098', 298, NULL, NULL, NULL, NULL),
(299, '2018-03-28 11:00:00', '2018-03-28 12:00:00', '5abb0f5d98d44935572842', 299, NULL, NULL, NULL, NULL),
(300, '2018-03-28 12:00:00', '2018-03-28 13:00:00', '5abb0f638bd88324576683', 300, NULL, NULL, NULL, NULL),
(301, '2018-03-28 13:00:00', '2018-03-28 14:00:00', '5abb0f6acba5a658929668', 301, NULL, NULL, NULL, NULL),
(302, '2018-03-30 04:00:00', '2018-03-30 13:00:00', '5abb0f88f0c8e745437730', 302, NULL, NULL, NULL, NULL),
(303, '2018-03-31 06:00:00', '2018-03-31 18:00:00', '5abb1023c4efa917471090', 303, NULL, NULL, NULL, NULL),
(304, '2018-03-31 02:00:00', '2018-03-31 07:00:00', '5abb11a3de208902646669', 304, NULL, NULL, NULL, NULL),
(305, '2018-03-30 06:00:00', '2018-03-30 15:00:00', '5abb3f932b2b6353615602', 305, NULL, NULL, NULL, NULL),
(306, '2018-03-30 13:00:00', '2018-03-30 14:00:00', '5abb52f992fcb876467119', 306, NULL, NULL, NULL, NULL),
(307, '2018-03-26 06:00:00', '2018-03-26 11:00:00', '5abb596240a27861119516', 307, NULL, NULL, NULL, '0.00'),
(308, '2018-03-27 04:00:00', '2018-03-27 11:00:00', '5abb59789460d242144277', 308, NULL, NULL, NULL, '0.00'),
(309, '2018-03-29 13:00:00', '2018-03-29 20:00:00', '5abb5a3d98c3f203991717', 309, NULL, NULL, NULL, NULL),
(310, '2018-04-01 00:00:00', '2018-04-01 09:00:00', '5abb5a432f69e188263068', 310, NULL, NULL, NULL, NULL),
(311, '2018-04-01 11:00:00', '2018-04-01 12:00:00', '5abb5fcd45895431185172', 311, NULL, NULL, NULL, NULL),
(312, '2018-04-01 00:00:00', '2018-04-01 05:00:00', '5abb5fece491d398410099', 312, NULL, NULL, NULL, NULL),
(313, '2018-04-02 05:00:00', '2018-04-02 07:00:00', '5abc9d0c700a2361349465', 313, NULL, NULL, NULL, NULL),
(314, '2018-04-06 05:00:00', '2018-04-06 06:00:00', '5abc9d5164979067052504', 314, NULL, NULL, NULL, NULL),
(315, '2018-04-05 01:00:00', '2018-04-05 03:00:00', '5abc9d704ee0b729921644', 315, NULL, NULL, NULL, NULL),
(316, '2018-04-06 02:00:00', '2018-04-06 03:00:00', '5abc9dc4b1dec137079338', 316, NULL, NULL, NULL, NULL),
(317, '2018-03-31 12:00:00', '2018-03-31 13:00:00', '5abcb491d9a6d585897443', 317, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_reminders`
--

CREATE TABLE IF NOT EXISTS `reservation_reminders` (
  `reminder_id` int(11) unsigned NOT NULL,
  `series_id` int(10) unsigned NOT NULL,
  `minutes_prior` int(10) unsigned NOT NULL,
  `reminder_type` tinyint(2) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_resources`
--

CREATE TABLE IF NOT EXISTS `reservation_resources` (
  `series_id` int(10) unsigned NOT NULL,
  `resource_id` smallint(5) unsigned NOT NULL,
  `resource_level_id` tinyint(2) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation_resources`
--

INSERT INTO `reservation_resources` (`series_id`, `resource_id`, `resource_level_id`) VALUES
(1, 2, 1),
(3, 2, 1),
(5, 2, 1),
(7, 2, 1),
(8, 7, 1),
(9, 7, 1),
(10, 10, 1),
(11, 17, 1),
(12, 17, 1),
(13, 10, 1),
(14, 10, 1),
(15, 7, 1),
(16, 7, 1),
(17, 7, 1),
(18, 7, 1),
(19, 7, 1),
(20, 7, 1),
(21, 10, 1),
(22, 10, 1),
(23, 7, 1),
(24, 7, 1),
(25, 7, 1),
(26, 7, 1),
(27, 7, 1),
(28, 7, 1),
(29, 7, 1),
(30, 7, 1),
(31, 10, 1),
(32, 10, 1),
(33, 7, 1),
(34, 7, 1),
(35, 7, 1),
(36, 7, 1),
(37, 8, 1),
(38, 8, 1),
(39, 10, 1),
(40, 24, 1),
(41, 24, 1),
(42, 10, 1),
(43, 18, 1),
(44, 18, 1),
(45, 24, 1),
(46, 24, 1),
(47, 7, 1),
(48, 7, 1),
(49, 7, 1),
(50, 7, 1),
(51, 7, 1),
(52, 7, 1),
(53, 7, 1),
(54, 7, 1),
(55, 7, 1),
(56, 7, 1),
(57, 7, 1),
(58, 7, 1),
(59, 7, 1),
(60, 7, 1),
(61, 7, 1),
(62, 7, 1),
(63, 7, 1),
(64, 7, 1),
(65, 7, 1),
(66, 7, 1),
(67, 7, 1),
(68, 7, 1),
(69, 7, 1),
(70, 7, 1),
(71, 7, 1),
(72, 7, 1),
(73, 7, 1),
(74, 7, 1),
(75, 7, 1),
(76, 7, 1),
(77, 7, 1),
(78, 7, 1),
(79, 7, 1),
(80, 7, 1),
(81, 7, 1),
(82, 7, 1),
(83, 7, 1),
(84, 7, 1),
(85, 7, 1),
(86, 7, 1),
(87, 2, 1),
(88, 2, 1),
(89, 2, 1),
(90, 2, 1),
(91, 2, 1),
(92, 2, 1),
(93, 2, 1),
(94, 2, 1),
(95, 2, 1),
(96, 2, 1),
(97, 2, 1),
(98, 2, 1),
(99, 24, 1),
(100, 24, 1),
(101, 24, 1),
(102, 24, 1),
(103, 24, 1),
(104, 24, 1),
(105, 24, 1),
(106, 24, 1),
(107, 24, 1),
(108, 24, 1),
(109, 24, 1),
(110, 24, 1),
(111, 24, 1),
(112, 24, 1),
(113, 24, 1),
(114, 24, 1),
(115, 24, 1),
(116, 24, 1),
(117, 24, 1),
(118, 24, 1),
(119, 24, 1),
(120, 24, 1),
(121, 24, 1),
(122, 24, 1),
(123, 24, 1),
(124, 24, 1),
(125, 24, 1),
(126, 24, 1),
(127, 24, 1),
(128, 24, 1),
(129, 24, 1),
(130, 24, 1),
(131, 24, 1),
(132, 24, 1),
(133, 24, 1),
(134, 24, 1),
(135, 24, 1),
(136, 24, 1),
(137, 24, 1),
(138, 24, 1),
(139, 24, 1),
(140, 24, 1),
(141, 24, 1),
(142, 24, 1),
(143, 24, 1),
(144, 24, 1),
(145, 24, 1),
(146, 24, 1),
(147, 24, 1),
(148, 24, 1),
(149, 24, 1),
(150, 2, 1),
(151, 2, 1),
(152, 2, 1),
(153, 2, 1),
(154, 2, 1),
(155, 2, 1),
(156, 2, 1),
(157, 24, 1),
(158, 24, 1),
(159, 24, 1),
(160, 24, 1),
(161, 24, 1),
(162, 24, 1),
(163, 24, 1),
(164, 24, 1),
(165, 24, 1),
(166, 24, 1),
(167, 24, 1),
(168, 24, 1),
(169, 24, 1),
(170, 24, 1),
(171, 24, 1),
(172, 24, 1),
(173, 24, 1),
(174, 24, 1),
(175, 24, 1),
(176, 24, 1),
(177, 24, 1),
(178, 24, 1),
(179, 24, 1),
(180, 24, 1),
(181, 24, 1),
(182, 24, 1),
(183, 24, 1),
(184, 24, 1),
(185, 24, 1),
(186, 24, 1),
(187, 24, 1),
(188, 24, 1),
(189, 24, 1),
(190, 24, 1),
(191, 24, 1),
(192, 24, 1),
(193, 24, 1),
(194, 24, 1),
(195, 24, 1),
(196, 24, 1),
(197, 24, 1),
(198, 24, 1),
(199, 24, 1),
(200, 24, 1),
(201, 24, 1),
(202, 24, 1),
(203, 24, 1),
(204, 24, 1),
(205, 24, 1),
(206, 24, 1),
(207, 24, 1),
(208, 24, 1),
(209, 24, 1),
(210, 24, 1),
(211, 24, 1),
(212, 24, 1),
(213, 24, 1),
(214, 24, 1),
(215, 24, 1),
(216, 24, 1),
(217, 24, 1),
(218, 24, 1),
(219, 24, 1),
(220, 24, 1),
(221, 24, 1),
(222, 24, 1),
(223, 24, 1),
(224, 24, 1),
(225, 24, 1),
(226, 24, 1),
(227, 24, 1),
(228, 24, 1),
(229, 24, 1),
(230, 24, 1),
(231, 24, 1),
(232, 24, 1),
(233, 24, 1),
(234, 24, 1),
(235, 24, 1),
(236, 24, 1),
(237, 24, 1),
(238, 24, 1),
(239, 24, 1),
(240, 24, 1),
(241, 24, 1),
(242, 24, 1),
(243, 24, 1),
(244, 24, 1),
(245, 24, 1),
(246, 24, 1),
(247, 24, 1),
(248, 24, 1),
(249, 24, 1),
(250, 24, 1),
(251, 24, 1),
(252, 24, 1),
(253, 24, 1),
(254, 24, 1),
(255, 24, 1),
(256, 22, 1),
(257, 10, 1),
(258, 17, 1),
(259, 10, 1),
(260, 10, 1),
(261, 10, 1),
(262, 10, 1),
(263, 10, 1),
(264, 10, 1),
(265, 10, 1),
(266, 10, 1),
(267, 23, 1),
(268, 23, 1),
(269, 23, 1),
(270, 2, 1),
(271, 22, 1),
(272, 26, 1),
(273, 2, 1),
(274, 24, 1),
(275, 15, 1),
(276, 2, 1),
(277, 13, 1),
(278, 2, 1),
(279, 9, 1),
(280, 23, 1),
(281, 9, 1),
(282, 23, 1),
(283, 23, 1),
(284, 10, 1),
(285, 17, 1),
(286, 18, 1),
(287, 26, 1),
(288, 7, 1),
(289, 22, 1),
(290, 15, 1),
(291, 11, 1),
(292, 13, 1),
(293, 9, 1),
(294, 10, 1),
(295, 10, 1),
(296, 10, 1),
(297, 10, 1),
(298, 9, 1),
(299, 10, 1),
(300, 10, 1),
(301, 10, 1),
(302, 10, 1),
(303, 10, 1),
(304, 10, 1),
(305, 9, 1),
(306, 10, 1),
(307, 10, 1),
(308, 10, 1),
(309, 10, 1),
(310, 10, 1),
(311, 10, 1),
(312, 2, 1),
(313, 10, 1),
(314, 10, 1),
(315, 10, 1),
(316, 10, 1),
(317, 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_series`
--

CREATE TABLE IF NOT EXISTS `reservation_series` (
  `series_id` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `last_modified` datetime DEFAULT NULL,
  `title` varchar(85) NOT NULL,
  `description` text,
  `allow_participation` tinyint(1) unsigned NOT NULL,
  `allow_anon_participation` tinyint(1) unsigned NOT NULL,
  `type_id` tinyint(2) unsigned NOT NULL,
  `status_id` tinyint(2) unsigned NOT NULL,
  `repeat_type` varchar(10) DEFAULT NULL,
  `repeat_options` varchar(255) DEFAULT NULL,
  `owner_id` mediumint(8) unsigned NOT NULL,
  `legacyid` char(16) DEFAULT NULL,
  `last_action_by` mediumint(8) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=318 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation_series`
--

INSERT INTO `reservation_series` (`series_id`, `date_created`, `last_modified`, `title`, `description`, `allow_participation`, `allow_anon_participation`, `type_id`, `status_id`, `repeat_type`, `repeat_options`, `owner_id`, `legacyid`, `last_action_by`) VALUES
(1, '2017-11-14 02:22:19', '2018-03-29 14:34:07', '', '', 0, 0, 1, 2, 'none', '', 1, NULL, NULL),
(3, '2017-11-14 02:25:25', '2018-03-29 14:34:07', '', '', 0, 0, 1, 2, 'none', '', 1, NULL, NULL),
(5, '2017-11-14 04:50:17', '2018-03-29 14:34:58', '', '', 0, 0, 1, 2, 'none', '', 1, NULL, NULL),
(7, '2018-01-06 13:31:15', '2018-01-09 18:20:32', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(8, '2018-01-08 16:17:48', '2018-01-09 18:20:32', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(9, '2018-01-08 16:18:00', '2018-01-09 18:20:32', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(10, '2018-01-09 07:51:46', '2018-01-09 18:20:32', 'dsfsd', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(11, '2018-01-09 15:48:46', '2018-01-09 18:20:32', 'asdad', 'asdasd', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(12, '2018-01-09 16:15:38', '2018-01-09 18:20:32', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(13, '2018-01-09 16:49:10', '2018-01-09 18:20:32', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(14, '2018-01-09 16:49:16', '2018-01-09 18:20:32', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(15, '2018-01-09 16:49:27', '2018-01-09 18:20:32', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(16, '2018-01-09 16:49:39', '2018-01-09 18:20:32', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(17, '2018-01-09 17:58:33', '2018-01-09 18:20:33', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(18, '2018-01-09 17:58:41', '2018-01-09 18:20:33', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(19, '2018-01-09 18:19:48', '2018-01-09 18:20:33', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(20, '2018-01-09 18:24:48', '2018-01-09 18:30:28', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(21, '2018-01-09 18:29:39', '2018-01-09 18:30:28', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(22, '2018-01-09 18:29:46', '2018-01-09 18:30:28', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(23, '2018-01-09 18:30:37', '2018-01-09 18:31:22', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(24, '2018-01-09 18:31:35', '2018-01-09 18:59:48', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(25, '2018-01-09 18:59:59', '2018-01-09 19:20:28', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(26, '2018-01-09 19:22:18', '2018-01-09 19:26:56', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(27, '2018-01-09 19:27:11', '2018-01-09 19:33:40', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(28, '2018-01-09 19:27:18', '2018-01-09 19:27:43', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(29, '2018-01-09 19:28:38', '2018-01-09 19:29:50', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(30, '2018-01-09 19:30:25', '2018-01-09 19:33:35', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(31, '2018-01-09 19:30:42', '2018-01-09 20:09:22', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(32, '2018-01-09 19:30:46', '2018-01-09 20:09:28', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(33, '2018-01-09 19:31:07', '2018-02-07 02:24:25', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(34, '2018-01-09 19:31:26', '2018-02-07 02:24:25', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(35, '2018-01-09 19:36:00', '2018-01-10 21:39:13', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(36, '2018-01-09 19:36:11', '2018-01-10 21:39:13', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(37, '2018-01-09 19:40:05', '2018-01-10 21:39:13', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(38, '2018-01-09 19:40:31', '2018-01-10 21:39:13', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(39, '2018-01-09 20:10:08', '2018-01-10 21:12:09', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(40, '2018-01-10 21:22:31', '2018-01-10 21:22:43', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(41, '2018-01-10 21:24:07', '2018-01-10 21:39:14', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(42, '2018-01-10 21:35:52', '2018-01-10 21:39:13', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(43, '2018-01-10 21:38:16', '2018-01-10 21:39:14', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(44, '2018-01-10 21:38:24', '2018-01-10 21:39:14', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(45, '2018-01-10 21:39:25', '2018-01-11 06:22:32', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(46, '2018-01-10 21:39:31', '2018-01-11 06:22:32', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(47, '2018-01-10 21:39:52', '2018-01-10 21:46:06', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(48, '2018-01-10 21:48:49', '2018-01-10 21:49:13', 'asdasd', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(49, '2018-01-10 22:06:14', '2018-01-10 22:07:47', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(50, '2018-01-10 22:11:24', '2018-01-10 22:12:54', 'asd', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(51, '2018-01-10 22:20:38', '2018-01-10 22:21:48', 'asdasdasd', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(52, '2018-01-10 22:22:34', '2018-01-10 22:29:12', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(53, '2018-01-10 22:30:13', '2018-01-10 22:44:33', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(54, '2018-01-10 22:50:11', '2018-01-10 22:56:29', 'asdasd', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(55, '2018-01-10 22:52:06', '2018-01-10 22:56:23', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(56, '2018-01-10 22:56:45', '2018-01-10 22:58:34', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(57, '2018-01-10 22:57:46', '2018-01-10 22:58:29', 'asdasd', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(58, '2018-01-10 22:58:56', '2018-01-10 23:05:03', 'aeqweq', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(59, '2018-01-10 22:59:22', '2018-01-10 23:04:58', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(60, '2018-01-10 23:05:08', '2018-01-11 06:22:32', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(61, '2018-01-11 06:19:36', '2018-01-11 06:22:32', 'asdasd', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(62, '2018-01-11 06:22:04', '2018-01-11 06:22:32', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(63, '2018-01-11 06:23:16', '2018-01-11 06:27:04', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(64, '2018-01-11 06:24:51', '2018-01-11 06:25:02', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(65, '2018-01-11 06:31:57', '2018-01-11 06:32:03', 'asdasd', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(66, '2018-01-11 06:33:55', '2018-01-11 06:34:00', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(67, '2018-01-11 06:34:39', '2018-01-11 06:34:44', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(68, '2018-01-11 06:36:51', '2018-01-11 06:36:57', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(69, '2018-01-11 06:40:07', '2018-01-11 06:40:19', 'asdasd', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(70, '2018-01-11 06:41:10', '2018-01-11 06:41:15', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(71, '2018-01-11 06:43:45', '2018-01-11 06:43:50', 'sdfsdfsdf', 'sdfsdf', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(72, '2018-01-11 06:46:36', '2018-01-11 06:46:41', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(73, '2018-01-11 06:49:07', '2018-01-11 06:49:12', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(74, '2018-01-11 06:53:55', '2018-01-11 06:54:00', 'asdasdasd', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(75, '2018-01-11 06:56:51', '2018-01-11 06:56:56', 'asdasd', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(76, '2018-01-11 06:57:48', '2018-01-11 06:57:53', 'asdasdsad', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(77, '2018-01-11 06:58:50', '2018-01-11 06:58:57', 'asdasd', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(78, '2018-01-11 06:59:11', '2018-01-11 10:57:17', 'asdasdsad', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(79, '2018-01-11 07:02:35', '2018-01-11 07:02:40', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(80, '2018-01-11 10:57:52', '2018-01-11 10:58:00', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(81, '2018-01-11 10:58:30', '2018-01-11 10:58:37', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(82, '2018-01-11 11:00:39', '2018-02-07 02:29:23', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(83, '2018-01-11 11:34:18', '2018-01-11 11:34:26', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(84, '2018-01-18 10:37:50', '2018-02-07 02:29:23', '', '', 0, 0, 1, 2, 'none', '', 6, NULL, NULL),
(85, '2018-01-21 01:31:19', '2018-02-07 02:29:23', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(86, '2018-01-22 12:22:33', '2018-02-07 02:29:23', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(87, '2018-01-25 12:10:03', '2018-01-25 12:10:31', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(88, '2018-01-27 02:28:52', '2018-01-27 02:34:46', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(89, '2018-01-27 02:29:26', '2018-01-27 02:34:40', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(90, '2018-01-27 02:33:09', '2018-01-27 02:34:35', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(91, '2018-01-27 02:59:31', '2018-02-07 02:29:23', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(92, '2018-01-27 02:59:47', '2018-01-27 03:08:56', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(93, '2018-01-27 03:08:11', '2018-01-27 03:09:05', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(94, '2018-01-27 03:08:41', '2018-01-27 03:09:12', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(95, '2018-01-27 03:10:52', '2018-01-27 03:15:15', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(96, '2018-01-27 03:16:44', '2018-01-27 03:16:51', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(97, '2018-01-27 03:20:59', '2018-01-27 03:21:06', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(98, '2018-01-27 03:23:12', '2018-02-07 02:29:23', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(99, '2018-01-27 10:46:49', '2018-01-27 10:47:42', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(100, '2018-01-27 10:48:17', '2018-02-07 02:24:26', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(101, '2018-01-29 04:13:24', '2018-02-05 03:40:25', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(102, '2018-01-29 04:14:15', '2018-02-07 02:29:23', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(103, '2018-01-29 04:15:34', '2018-01-29 04:18:20', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(104, '2018-01-29 04:15:49', '2018-02-03 14:22:47', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(105, '2018-01-29 04:18:27', '2018-02-07 02:29:23', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(106, '2018-01-29 10:27:11', '2018-02-07 02:24:25', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(107, '2018-01-29 10:27:29', '2018-02-07 02:24:26', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(108, '2018-01-30 12:01:41', '2018-02-07 02:24:25', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(109, '2018-01-30 12:01:51', '2018-01-30 12:02:01', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(110, '2018-01-30 12:04:47', '2018-02-07 02:24:25', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(111, '2018-01-30 12:05:29', '2018-02-07 02:24:25', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(112, '2018-01-30 12:05:44', '2018-01-30 12:21:58', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(113, '2018-01-31 00:00:22', '2018-02-07 02:24:25', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(114, '2018-01-31 00:00:32', '2018-02-07 02:24:25', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(115, '2018-01-31 00:00:40', '2018-01-31 00:00:47', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(116, '2018-01-31 14:54:38', '2018-01-31 15:03:53', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(117, '2018-01-31 14:54:51', '2018-02-07 02:24:25', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(118, '2018-02-01 10:18:07', '2018-02-01 10:18:36', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(119, '2018-02-01 10:18:17', '2018-02-01 10:18:45', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(120, '2018-02-01 11:58:48', '2018-02-07 02:24:25', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(121, '2018-02-01 12:00:37', '2018-02-01 12:00:46', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(122, '2018-02-01 12:01:11', '2018-02-03 11:03:01', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(123, '2018-02-01 12:05:32', '2018-02-07 02:24:26', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(124, '2018-02-01 12:13:13', '2018-02-05 04:14:42', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(125, '2018-02-01 12:13:21', '2018-02-05 04:17:30', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(126, '2018-02-03 01:53:37', '2018-02-03 11:11:25', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(127, '2018-02-03 01:54:28', '2018-02-05 04:07:15', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(128, '2018-02-03 01:54:37', '2018-02-05 04:18:16', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(129, '2018-02-04 23:02:30', '2018-02-04 23:03:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(130, '2018-02-05 03:39:51', '2018-02-07 02:24:26', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(131, '2018-02-05 03:41:53', '2018-02-05 03:44:33', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(132, '2018-02-05 03:42:00', '2018-02-05 03:44:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(133, '2018-02-05 03:42:18', '2018-02-05 04:08:53', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(134, '2018-02-05 03:42:24', '2018-02-05 04:10:38', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(135, '2018-02-05 03:42:45', '2018-02-05 04:09:50', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(136, '2018-02-05 03:46:59', '2018-02-07 02:24:26', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(137, '2018-02-05 03:47:29', '2018-02-05 04:07:47', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(138, '2018-02-05 03:47:41', '2018-02-07 02:24:26', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(139, '2018-02-05 04:19:04', '2018-02-06 03:22:33', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(140, '2018-02-05 04:19:10', '2018-02-06 03:22:39', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(141, '2018-02-05 04:19:16', '2018-02-07 02:24:26', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(142, '2018-02-06 03:22:08', '2018-02-06 03:23:07', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(143, '2018-02-06 03:22:14', '2018-02-06 03:23:01', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(144, '2018-02-06 21:59:44', '2018-02-07 02:24:26', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(145, '2018-02-06 22:02:51', '2018-02-06 22:03:09', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(146, '2018-02-06 22:02:58', '2018-02-06 22:03:03', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(147, '2018-02-06 22:05:05', '2018-02-06 22:05:12', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(148, '2018-02-06 22:06:19', '2018-02-06 22:06:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(149, '2018-02-06 22:06:34', '2018-02-06 22:06:40', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(150, '2018-02-06 22:08:05', '2018-02-07 02:24:26', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(151, '2018-02-06 22:09:14', '2018-02-06 23:12:31', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(152, '2018-02-06 22:09:19', '2018-02-06 22:09:26', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(153, '2018-02-06 22:09:52', '2018-02-06 23:12:25', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(154, '2018-02-06 22:37:02', '2018-02-06 22:37:08', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(155, '2018-02-06 23:12:35', '2018-02-07 02:24:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(156, '2018-02-06 23:12:47', '2018-02-06 23:12:52', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(157, '2018-02-06 23:13:08', '2018-02-06 23:13:14', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(158, '2018-02-06 23:15:11', '2018-02-06 23:16:23', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(159, '2018-02-06 23:15:20', '2018-02-06 23:15:46', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(160, '2018-02-06 23:41:46', '2018-02-06 23:42:18', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(161, '2018-02-06 23:42:06', '2018-02-06 23:44:24', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(162, '2018-02-06 23:42:12', '2018-02-06 23:47:18', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(163, '2018-02-06 23:49:17', '2018-02-06 23:49:23', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(164, '2018-02-06 23:51:36', '2018-02-06 23:51:42', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(165, '2018-02-07 00:33:18', '2018-02-07 00:33:25', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(166, '2018-02-07 00:34:46', '2018-02-07 00:34:53', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(167, '2018-02-07 00:37:12', '2018-02-07 00:37:23', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(168, '2018-02-07 00:37:45', '2018-02-07 00:37:51', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(169, '2018-02-07 00:40:11', '2018-02-07 02:24:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(170, '2018-02-07 00:43:36', '2018-02-07 00:47:36', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(171, '2018-02-07 00:47:24', '2018-02-07 00:47:31', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(172, '2018-02-07 00:53:28', '2018-02-07 02:24:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(173, '2018-02-07 00:53:38', '2018-02-07 02:24:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(174, '2018-02-07 00:56:50', '2018-02-07 02:24:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(175, '2018-02-07 00:57:40', '2018-02-07 01:18:13', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(176, '2018-02-07 01:16:54', '2018-02-07 02:24:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(177, '2018-02-07 01:17:02', '2018-02-07 02:24:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(178, '2018-02-07 01:17:30', '2018-02-07 02:58:48', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(179, '2018-02-07 01:17:40', '2018-02-07 02:58:39', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(180, '2018-02-07 01:18:19', '2018-02-07 02:24:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(181, '2018-02-07 01:21:46', '2018-02-07 02:58:00', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(182, '2018-02-07 01:22:06', '2018-02-07 01:22:53', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(183, '2018-02-07 01:23:33', '2018-02-07 02:19:47', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(184, '2018-02-07 01:43:40', '2018-02-07 02:19:42', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(185, '2018-02-07 01:44:38', '2018-02-07 01:47:57', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(186, '2018-02-07 01:48:03', '2018-02-07 02:16:33', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(187, '2018-02-07 02:16:47', '2018-02-07 02:17:31', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(188, '2018-02-07 02:17:52', '2018-02-07 02:18:31', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(189, '2018-02-07 02:18:40', '2018-02-07 02:24:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(190, '2018-02-07 02:20:00', '2018-02-07 02:24:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(191, '2018-02-07 02:21:06', '2018-02-07 02:22:50', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(192, '2018-02-07 02:22:10', '2018-02-07 02:24:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(193, '2018-02-07 02:23:19', '2018-02-07 02:58:21', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(194, '2018-02-07 02:23:25', '2018-02-07 02:24:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(195, '2018-02-07 02:23:33', '2018-02-07 02:24:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(196, '2018-02-07 02:25:03', '2018-02-07 02:28:27', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(197, '2018-02-07 02:57:19', '2018-02-07 02:58:30', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(198, '2018-02-07 02:59:10', '2018-02-07 02:59:28', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(199, '2018-02-07 03:00:49', '2018-02-07 03:02:26', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(200, '2018-02-07 03:55:02', '2018-02-07 10:27:54', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(201, '2018-02-07 10:47:40', '2018-02-07 10:48:39', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(202, '2018-02-07 10:48:51', '2018-02-09 00:48:57', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(203, '2018-02-07 10:53:16', '2018-02-09 00:48:57', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(204, '2018-02-07 11:59:56', '2018-02-09 00:48:57', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(205, '2018-02-07 12:00:15', '2018-02-07 12:08:02', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(206, '2018-02-07 12:12:54', '2018-02-07 14:43:35', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(207, '2018-02-07 14:43:02', '2018-02-07 14:43:17', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(208, '2018-02-07 14:50:02', '2018-02-07 14:51:41', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(209, '2018-02-08 02:15:19', '2018-02-09 00:48:57', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(210, '2018-02-08 02:15:32', '2018-02-09 00:48:57', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(211, '2018-02-08 23:50:34', '2018-02-09 00:48:57', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(212, '2018-02-08 23:50:49', '2018-02-09 00:48:59', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(213, '2018-02-08 23:50:54', '2018-02-09 00:48:57', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(214, '2018-02-08 23:51:02', '2018-02-08 23:52:32', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(215, '2018-02-08 23:53:37', '2018-02-09 00:48:58', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(216, '2018-02-08 23:54:40', '2018-02-09 00:48:58', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(217, '2018-02-08 23:55:06', '2018-02-09 00:48:58', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(218, '2018-02-08 23:55:19', '2018-02-09 00:48:58', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(219, '2018-02-08 23:55:28', '2018-02-09 00:48:59', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(220, '2018-02-08 23:55:37', '2018-02-09 00:36:44', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(221, '2018-02-08 23:55:50', '2018-02-09 00:48:58', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(222, '2018-02-08 23:56:00', '2018-02-09 00:48:59', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(223, '2018-02-08 23:56:08', '2018-02-09 00:48:58', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(224, '2018-02-08 23:56:15', '2018-02-09 00:48:58', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(225, '2018-02-08 23:56:23', '2018-02-09 00:48:59', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(226, '2018-02-08 23:57:12', '2018-02-09 00:48:59', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(227, '2018-02-09 00:37:03', '2018-02-09 00:48:59', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(228, '2018-02-09 00:38:19', '2018-02-09 00:49:22', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(229, '2018-02-09 00:39:14', '2018-02-09 00:49:22', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(230, '2018-02-09 00:41:38', '2018-02-09 00:49:22', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(231, '2018-02-09 00:44:52', '2018-02-09 00:46:07', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(232, '2018-02-09 00:48:23', '2018-02-09 00:48:58', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(233, '2018-02-09 00:50:13', '2018-02-09 02:57:45', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(234, '2018-02-09 00:50:22', '2018-02-09 02:57:24', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(235, '2018-02-09 01:15:20', '2018-03-29 14:34:58', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(236, '2018-02-09 01:15:34', '2018-02-09 02:57:40', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(237, '2018-02-09 01:15:46', '2018-02-09 02:57:50', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(238, '2018-02-09 01:16:11', '2018-02-09 02:29:42', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(239, '2018-02-09 01:16:19', '2018-02-09 01:18:23', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(240, '2018-02-09 01:37:52', '2018-02-09 01:38:04', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(241, '2018-02-09 01:38:36', '2018-02-09 02:04:38', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(242, '2018-02-09 02:04:44', '2018-02-09 02:04:56', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(243, '2018-02-09 02:05:20', '2018-02-09 02:05:30', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(244, '2018-02-09 02:29:30', '2018-02-09 02:29:36', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(245, '2018-02-09 02:51:06', '2018-02-09 02:57:57', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(246, '2018-02-09 02:51:12', '2018-02-09 02:58:03', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(247, '2018-02-09 02:52:36', NULL, '', '', 0, 0, 1, 1, 'none', '', 7, NULL, NULL),
(248, '2018-02-09 02:52:41', NULL, '', '', 0, 0, 1, 1, 'none', '', 7, NULL, NULL),
(249, '2018-02-09 02:53:53', NULL, '', '', 0, 0, 1, 1, 'none', '', 7, NULL, NULL),
(250, '2018-02-09 02:55:49', '2018-02-09 02:58:33', '', '', 0, 0, 1, 2, 'none', '', 7, NULL, NULL),
(251, '2018-02-09 02:56:11', '2018-02-09 03:12:05', '', '', 0, 0, 1, 1, 'none', '', 7, NULL, NULL),
(252, '2018-02-09 02:58:13', NULL, '', '', 0, 0, 1, 1, 'none', '', 7, NULL, NULL),
(253, '2018-02-09 03:12:24', NULL, '', '', 0, 0, 1, 1, 'none', '', 7, NULL, NULL),
(254, '2018-02-09 03:12:38', NULL, '', '', 0, 0, 1, 1, 'none', '', 7, NULL, NULL),
(255, '2018-02-09 03:12:46', '2018-02-09 03:13:03', '', '', 0, 0, 1, 1, 'none', '', 7, NULL, NULL),
(256, '2018-02-16 14:10:08', NULL, '', '', 0, 0, 1, 1, 'none', '', 1, NULL, NULL),
(257, '2018-02-16 14:11:02', NULL, '', '', 0, 0, 1, 1, 'none', '', 1, NULL, NULL),
(258, '2018-02-16 14:11:45', NULL, '', '', 0, 0, 1, 1, 'none', '', 1, NULL, NULL),
(259, '2018-02-18 01:49:14', '2018-02-18 01:49:25', '', '', 0, 0, 1, 2, 'none', '', 8, NULL, NULL),
(260, '2018-02-18 02:02:42', NULL, '', '', 0, 0, 1, 1, 'none', '', 10, NULL, NULL),
(261, '2018-02-18 02:07:37', NULL, '', '', 0, 0, 1, 1, 'none', '', 10, NULL, NULL),
(262, '2018-02-18 02:08:26', '2018-02-18 02:08:36', '', '', 0, 0, 1, 2, 'none', '', 9, NULL, NULL),
(263, '2018-02-18 02:08:30', '2018-02-18 02:08:42', '', '', 0, 0, 1, 2, 'none', '', 9, NULL, NULL),
(264, '2018-02-18 02:15:55', '2018-02-18 02:16:22', '', '', 0, 0, 1, 2, 'none', '', 9, NULL, NULL),
(265, '2018-02-18 02:16:28', NULL, '', '', 0, 0, 1, 1, 'none', '', 9, NULL, NULL),
(266, '2018-02-18 02:17:49', NULL, '', '', 0, 0, 1, 1, 'none', '', 8, NULL, NULL),
(267, '2018-03-06 16:36:42', '2018-03-28 14:15:35', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(268, '2018-03-06 16:37:31', '2018-03-07 11:51:17', '', 'Soild sample, 3 samples', 0, 0, 1, 1, 'none', '', 1, NULL, NULL),
(269, '2018-03-06 16:50:17', '2018-03-06 16:50:29', '', 'powder', 0, 0, 1, 1, 'none', '', 1, NULL, NULL),
(270, '2018-03-07 10:26:27', NULL, '', '', 0, 0, 1, 1, 'none', '', 1, NULL, NULL),
(271, '2018-03-08 09:26:18', '2018-03-08 09:28:34', '', '1. Type of sample : film\r\n2. 4 samples', 0, 0, 1, 1, 'none', '', 1, NULL, NULL),
(272, '2018-03-08 09:37:07', NULL, '', '1. Type of sample : film\r\n2. mode of operation : fluorescence\r\n3. Detector : Red PMT\r\n4. Remark :', 0, 0, 1, 1, 'none', '', 1, NULL, NULL),
(273, '2018-03-09 08:47:21', NULL, '', '', 0, 0, 1, 1, 'none', '', 1, NULL, NULL),
(274, '2018-03-09 08:49:57', NULL, '', '', 0, 0, 1, 1, 'none', '', 1, NULL, NULL),
(275, '2018-03-09 08:57:01', NULL, '', '', 0, 0, 1, 1, 'none', '', 1, NULL, NULL),
(276, '2018-03-09 09:08:34', NULL, '', '', 0, 0, 1, 1, 'none', '', 1, NULL, NULL),
(277, '2018-03-09 09:12:37', NULL, 'HPLC Training', '2 April 2018 at ESE building', 1, 0, 1, 1, 'none', '', 1, NULL, NULL),
(278, '2018-03-09 14:15:14', '2018-03-29 14:32:16', 'PM', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(279, '2018-03-12 09:20:06', '2018-03-12 09:20:29', '', '', 0, 0, 1, 1, 'none', '', 1, NULL, NULL),
(280, '2018-03-12 09:21:08', '2018-03-29 14:34:24', '', '', 0, 0, 1, 2, 'none', '', 1, NULL, NULL),
(281, '2018-03-12 14:31:37', NULL, '', '', 0, 0, 1, 1, 'none', '', 2, NULL, NULL),
(282, '2018-03-12 14:34:37', '2018-03-29 14:32:55', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(283, '2018-03-12 14:34:48', '2018-03-29 15:43:23', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(284, '2018-03-12 14:52:47', NULL, '', '', 0, 0, 1, 1, 'none', '', 2, NULL, NULL),
(285, '2018-03-12 14:54:21', '2018-03-29 14:34:24', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(286, '2018-03-12 14:54:36', NULL, '', '', 0, 0, 1, 1, 'none', '', 2, NULL, NULL),
(287, '2018-03-12 14:54:47', NULL, '', '', 0, 0, 1, 1, 'none', '', 2, NULL, NULL),
(288, '2018-03-12 14:55:07', '2018-03-29 14:33:55', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(289, '2018-03-12 14:55:20', '2018-03-29 14:33:37', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(290, '2018-03-12 14:55:51', NULL, '', '', 0, 0, 1, 1, 'none', '', 2, NULL, NULL),
(291, '2018-03-12 14:56:30', '2018-03-29 14:33:55', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(292, '2018-03-12 14:57:21', NULL, '', '', 0, 0, 1, 1, 'none', '', 2, NULL, NULL),
(293, '2018-03-28 10:00:59', NULL, '', '', 0, 0, 1, 1, 'none', '', 13, NULL, NULL),
(294, '2018-03-28 10:02:11', NULL, '', '', 0, 0, 1, 1, 'none', '', 13, NULL, NULL),
(295, '2018-03-28 10:03:33', '2018-03-29 14:33:40', '', '', 0, 0, 1, 2, 'none', '', 13, NULL, NULL),
(296, '2018-03-28 10:08:22', '2018-03-28 10:56:12', '', '', 0, 0, 1, 2, 'none', '', 1, NULL, NULL),
(297, '2018-03-28 10:17:16', '2018-03-28 10:44:01', '', '', 0, 0, 1, 2, 'none', '', 14, NULL, NULL),
(298, '2018-03-28 10:24:35', '2018-03-28 10:30:33', '', '', 0, 0, 1, 2, 'none', '', 14, NULL, NULL),
(299, '2018-03-28 10:43:25', '2018-04-03 12:44:50', '', '', 0, 0, 1, 2, 'none', '', 14, NULL, NULL),
(300, '2018-03-28 10:43:31', NULL, '', '', 0, 0, 1, 1, 'none', '', 14, NULL, NULL),
(301, '2018-03-28 10:43:38', NULL, '', '', 0, 0, 1, 1, 'none', '', 14, NULL, NULL),
(302, '2018-03-28 10:44:09', '2018-03-29 15:03:00', '', '', 0, 0, 1, 2, 'none', '', 14, NULL, NULL),
(303, '2018-03-28 10:46:43', '2018-03-28 10:52:47', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(304, '2018-03-28 10:53:08', '2018-03-29 14:59:43', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(305, '2018-03-28 14:09:07', NULL, '', '', 0, 0, 1, 1, 'none', '', 14, NULL, NULL),
(306, '2018-03-28 15:31:53', '2018-03-29 15:03:01', '', '', 0, 0, 1, 2, 'none', '', 1, NULL, NULL),
(307, '2018-03-28 15:59:14', '2018-03-28 16:01:39', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(308, '2018-03-28 15:59:36', '2018-03-28 16:01:49', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(309, '2018-03-28 16:02:53', '2018-03-29 15:00:45', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(310, '2018-03-28 16:02:59', '2018-03-29 14:33:40', '', '', 0, 0, 1, 2, 'none', '', 1, NULL, NULL),
(311, '2018-03-28 16:26:37', '2018-03-29 14:27:15', '', '', 0, 0, 1, 2, 'none', '', 1, NULL, NULL),
(312, '2018-03-28 16:27:08', '2018-03-28 16:27:22', 'PM', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(313, '2018-03-29 15:00:12', '2018-03-29 15:01:08', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(314, '2018-03-29 15:01:21', NULL, '', '', 0, 0, 1, 1, 'none', '', 2, NULL, NULL),
(315, '2018-03-29 15:01:52', '2018-03-29 15:02:50', '', '', 0, 0, 1, 2, 'none', '', 2, NULL, NULL),
(316, '2018-03-29 15:03:16', NULL, '', '', 0, 0, 1, 1, 'none', '', 2, NULL, NULL),
(317, '2018-03-29 16:40:33', NULL, '', '', 0, 0, 1, 1, 'none', '', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_statuses`
--

CREATE TABLE IF NOT EXISTS `reservation_statuses` (
  `status_id` tinyint(2) unsigned NOT NULL,
  `label` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation_statuses`
--

INSERT INTO `reservation_statuses` (`status_id`, `label`) VALUES
(1, 'Created'),
(2, 'Deleted'),
(3, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_types`
--

CREATE TABLE IF NOT EXISTS `reservation_types` (
  `type_id` tinyint(2) unsigned NOT NULL,
  `label` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation_types`
--

INSERT INTO `reservation_types` (`type_id`, `label`) VALUES
(1, 'Reservation'),
(2, 'Blackout');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_users`
--

CREATE TABLE IF NOT EXISTS `reservation_users` (
  `reservation_instance_id` int(10) unsigned NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `reservation_user_level` tinyint(2) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation_users`
--

INSERT INTO `reservation_users` (`reservation_instance_id`, `user_id`, `reservation_user_level`) VALUES
(1, 1, 1),
(3, 1, 1),
(5, 1, 1),
(7, 2, 1),
(8, 2, 1),
(9, 2, 1),
(10, 2, 1),
(11, 2, 1),
(12, 2, 1),
(13, 2, 1),
(14, 2, 1),
(15, 2, 1),
(16, 2, 1),
(17, 2, 1),
(18, 2, 1),
(19, 2, 1),
(20, 2, 1),
(21, 2, 1),
(22, 2, 1),
(23, 2, 1),
(24, 2, 1),
(25, 2, 1),
(26, 2, 1),
(27, 2, 1),
(28, 2, 1),
(29, 2, 1),
(30, 2, 1),
(31, 2, 1),
(32, 2, 1),
(33, 2, 1),
(34, 2, 1),
(35, 2, 1),
(36, 2, 1),
(37, 2, 1),
(38, 2, 1),
(39, 2, 1),
(40, 2, 1),
(41, 2, 1),
(42, 2, 1),
(43, 2, 1),
(44, 2, 1),
(45, 2, 1),
(46, 2, 1),
(47, 2, 1),
(48, 2, 1),
(49, 2, 1),
(50, 2, 1),
(51, 2, 1),
(52, 2, 1),
(53, 2, 1),
(54, 2, 1),
(55, 2, 1),
(56, 2, 1),
(57, 2, 1),
(58, 2, 1),
(59, 2, 1),
(60, 2, 1),
(61, 2, 1),
(62, 2, 1),
(63, 2, 1),
(64, 2, 1),
(65, 2, 1),
(66, 2, 1),
(67, 2, 1),
(68, 2, 1),
(69, 2, 1),
(70, 2, 1),
(71, 2, 1),
(72, 2, 1),
(73, 2, 1),
(74, 2, 1),
(75, 2, 1),
(76, 2, 1),
(77, 2, 1),
(78, 2, 1),
(79, 2, 1),
(80, 2, 1),
(81, 2, 1),
(82, 2, 1),
(83, 2, 1),
(84, 6, 1),
(85, 7, 1),
(86, 7, 1),
(87, 7, 1),
(88, 7, 1),
(89, 7, 1),
(90, 7, 1),
(91, 7, 1),
(92, 7, 1),
(93, 7, 1),
(94, 7, 1),
(95, 7, 1),
(96, 7, 1),
(97, 7, 1),
(98, 7, 1),
(99, 7, 1),
(100, 7, 1),
(101, 7, 1),
(102, 7, 1),
(103, 7, 1),
(104, 7, 1),
(105, 7, 1),
(106, 7, 1),
(107, 7, 1),
(108, 7, 1),
(109, 7, 1),
(110, 7, 1),
(111, 7, 1),
(112, 7, 1),
(113, 7, 1),
(114, 7, 1),
(115, 7, 1),
(116, 7, 1),
(117, 7, 1),
(118, 7, 1),
(119, 7, 1),
(120, 7, 1),
(121, 7, 1),
(122, 7, 1),
(123, 7, 1),
(124, 7, 1),
(125, 7, 1),
(126, 7, 1),
(127, 7, 1),
(128, 7, 1),
(129, 7, 1),
(130, 7, 1),
(131, 7, 1),
(132, 7, 1),
(133, 7, 1),
(134, 7, 1),
(135, 7, 1),
(136, 7, 1),
(137, 7, 1),
(138, 7, 1),
(139, 7, 1),
(140, 7, 1),
(141, 7, 1),
(142, 7, 1),
(143, 7, 1),
(144, 7, 1),
(145, 7, 1),
(146, 7, 1),
(147, 7, 1),
(148, 7, 1),
(149, 7, 1),
(150, 7, 1),
(151, 7, 1),
(152, 7, 1),
(153, 7, 1),
(154, 7, 1),
(155, 7, 1),
(156, 7, 1),
(157, 7, 1),
(158, 7, 1),
(159, 7, 1),
(160, 7, 1),
(161, 7, 1),
(162, 7, 1),
(163, 7, 1),
(164, 7, 1),
(165, 7, 1),
(166, 7, 1),
(167, 7, 1),
(168, 7, 1),
(169, 7, 1),
(170, 7, 1),
(171, 7, 1),
(172, 7, 1),
(173, 7, 1),
(174, 7, 1),
(175, 7, 1),
(176, 7, 1),
(177, 7, 1),
(178, 7, 1),
(179, 7, 1),
(180, 7, 1),
(181, 7, 1),
(182, 7, 1),
(183, 7, 1),
(184, 7, 1),
(185, 7, 1),
(186, 7, 1),
(187, 7, 1),
(188, 7, 1),
(189, 7, 1),
(190, 7, 1),
(191, 7, 1),
(192, 7, 1),
(193, 7, 1),
(194, 7, 1),
(195, 7, 1),
(196, 7, 1),
(197, 7, 1),
(198, 7, 1),
(199, 7, 1),
(200, 7, 1),
(201, 7, 1),
(202, 7, 1),
(203, 7, 1),
(204, 7, 1),
(205, 7, 1),
(206, 7, 1),
(207, 7, 1),
(208, 7, 1),
(209, 7, 1),
(210, 7, 1),
(211, 7, 1),
(212, 7, 1),
(213, 7, 1),
(214, 7, 1),
(215, 7, 1),
(216, 7, 1),
(217, 7, 1),
(218, 7, 1),
(219, 7, 1),
(220, 7, 1),
(221, 7, 1),
(222, 7, 1),
(223, 7, 1),
(224, 7, 1),
(225, 7, 1),
(226, 7, 1),
(227, 7, 1),
(228, 7, 1),
(229, 7, 1),
(230, 7, 1),
(231, 7, 1),
(232, 7, 1),
(233, 7, 1),
(234, 7, 1),
(235, 7, 1),
(236, 7, 1),
(237, 7, 1),
(238, 7, 1),
(239, 7, 1),
(240, 7, 1),
(241, 7, 1),
(242, 7, 1),
(243, 7, 1),
(244, 7, 1),
(245, 7, 1),
(246, 7, 1),
(247, 7, 1),
(248, 7, 1),
(249, 7, 1),
(250, 7, 1),
(251, 7, 1),
(252, 7, 1),
(253, 7, 1),
(254, 7, 1),
(255, 7, 1),
(256, 1, 1),
(257, 1, 1),
(258, 1, 1),
(259, 8, 1),
(260, 10, 1),
(261, 10, 1),
(262, 9, 1),
(263, 9, 1),
(264, 9, 1),
(265, 9, 1),
(266, 8, 1),
(267, 2, 1),
(268, 1, 1),
(269, 1, 1),
(270, 1, 1),
(271, 1, 1),
(272, 1, 1),
(273, 1, 1),
(274, 1, 1),
(275, 1, 1),
(276, 1, 1),
(277, 1, 1),
(278, 2, 1),
(279, 1, 1),
(280, 1, 1),
(281, 2, 1),
(282, 2, 1),
(283, 2, 1),
(284, 2, 1),
(285, 2, 1),
(286, 2, 1),
(287, 2, 1),
(288, 2, 1),
(289, 2, 1),
(290, 2, 1),
(291, 2, 1),
(292, 2, 1),
(293, 13, 1),
(294, 13, 1),
(295, 13, 1),
(296, 1, 1),
(297, 14, 1),
(298, 14, 1),
(299, 14, 1),
(300, 14, 1),
(301, 14, 1),
(302, 14, 1),
(303, 2, 1),
(304, 2, 1),
(305, 14, 1),
(306, 1, 1),
(307, 2, 1),
(308, 2, 1),
(309, 2, 1),
(310, 1, 1),
(311, 1, 1),
(312, 2, 1),
(313, 2, 1),
(314, 2, 1),
(315, 2, 1),
(316, 2, 1),
(317, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_waitlist_requests`
--

CREATE TABLE IF NOT EXISTS `reservation_waitlist_requests` (
  `reservation_waitlist_request_id` mediumint(8) unsigned NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `resource_id` smallint(5) unsigned NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `resource_id` smallint(5) unsigned NOT NULL,
  `name` varchar(85) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `description` text,
  `notes` text,
  `min_duration` int(11) DEFAULT NULL,
  `min_increment` int(11) DEFAULT NULL,
  `max_duration` int(11) DEFAULT NULL,
  `unit_cost` decimal(7,2) DEFAULT NULL,
  `autoassign` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `requires_approval` tinyint(1) unsigned NOT NULL,
  `allow_multiday_reservations` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `max_participants` mediumint(8) unsigned DEFAULT NULL,
  `min_notice_time` int(11) DEFAULT NULL,
  `max_notice_time` int(11) DEFAULT NULL,
  `image_name` varchar(50) DEFAULT NULL,
  `schedule_id` smallint(5) unsigned NOT NULL,
  `legacyid` char(16) DEFAULT NULL,
  `admin_group_id` smallint(5) unsigned DEFAULT NULL,
  `public_id` varchar(20) DEFAULT NULL,
  `allow_calendar_subscription` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` tinyint(2) unsigned DEFAULT NULL,
  `resource_type_id` mediumint(8) unsigned DEFAULT NULL,
  `status_id` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `resource_status_reason_id` smallint(5) unsigned DEFAULT NULL,
  `buffer_time` int(10) unsigned DEFAULT NULL,
  `enable_check_in` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `auto_release_minutes` smallint(5) unsigned DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `allow_display` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `credit_count` decimal(7,2) unsigned DEFAULT NULL,
  `peak_credit_count` decimal(7,2) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `name`, `location`, `contact_info`, `description`, `notes`, `min_duration`, `min_increment`, `max_duration`, `unit_cost`, `autoassign`, `requires_approval`, `allow_multiday_reservations`, `max_participants`, `min_notice_time`, `max_notice_time`, `image_name`, `schedule_id`, `legacyid`, `admin_group_id`, `public_id`, `allow_calendar_subscription`, `sort_order`, `resource_type_id`, `status_id`, `resource_status_reason_id`, `buffer_time`, `enable_check_in`, `auto_release_minutes`, `color`, `allow_display`, `credit_count`, `peak_credit_count`) VALUES
(2, 'XRD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource2.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#00ff00', 0, '0.00', '0.00'),
(7, 'DSC', 'Asia/Bangkok', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource7.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#000080', 0, '0.00', '0.00'),
(8, 'TGA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource8.png', 8, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#ffff80', 0, '0.00', '0.00'),
(9, 'CHNS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource9.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#00ff40', 0, '0.00', '0.00'),
(10, 'AFM', 'Asia/Bangkok', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource10.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#ff0000', 0, '0.00', '0.00'),
(11, 'GPC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource11.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#ff8040', 0, '0.00', '0.00'),
(12, 'ICP-OES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource12.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#ff0080', 0, '0.00', '0.00'),
(13, 'HPLC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource13.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#004080', 0, '0.00', '0.00'),
(14, 'MALDI-TOF-MS/MS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource14.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#800080', 0, '0.00', '0.00'),
(15, 'GC-MS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource15.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#804040', 0, '0.00', '0.00'),
(16, 'UV/VIS/NIR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource16.png', 13, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#400000', 0, '0.00', '0.00'),
(17, 'ATR-FTIR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource17.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#ffff00', 0, '0.00', '0.00'),
(18, 'DLS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource18.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#8080c0', 0, '0.00', '0.00'),
(19, 'SEM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource19.png', 9, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#ff8080', 0, '0.00', '0.00'),
(20, 'XPS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource20.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#008040', 0, '0.00', '0.00'),
(21, 'WDXRF', NULL, NULL, 'Please fill out the following form in as much detail as possible\n1. Type of sample(s):..................(e.g. Powder, Liquid, Film, ETC.)\n2. The number of sample:.................\n3. Advisor:.........................................\n4. Remark:.........................(if any)', NULL, NULL, NULL, 21600, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource21.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#808040', 0, '0.00', '0.00'),
(22, 'FT-RAMAN (MULTIRAM)', NULL, NULL, 'Please fill out the following form in as much detail as possible\n1. Type of sample(s):..................(e.g. Powder, Liquid, Film, ETC.)\n2. The number of sample:.................\n3. Advisor:.........................................\n3. Remark:........................(if any)', NULL, NULL, NULL, 43200, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource22.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, 2, NULL, 0, NULL, '#ff00ff', 0, '0.00', '0.00'),
(23, 'Dispersive-RAMAN (SENTERRA)', 'M115,MSE Equipment Center', NULL, 'Please fill out the following form in as much detail as possible\n1. Type of sample(s):..................(e.g. Powder, Liquid, Film, ETC.)\n2. The number of sample:.................\n3. Advisor:.........................................\n3. Remark:........................................', NULL, NULL, NULL, 43200, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource23.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, 1, NULL, 0, NULL, '#ffff80', 0, '0.00', '0.00'),
(24, 'LC-QTOF-MS/MS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource24.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#ff8080', 0, '0.00', '0.00'),
(25, 'TEM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource25.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#400080', 0, '0.00', '0.00'),
(26, 'FLS', NULL, NULL, 'Please fill out the following form in as much detail as possible\n1.Type of sample:.........(e.g. Liquid, Powder, Film)\n2.The number of sample:.................\n3.Mode(s) of operation:...........(e.g.Fluorescence, Quantum yield, Lifetime)\n4.Detector:.........(e.g.Red PMT, Ex Red PMT, MCT PMT)\n5.Advisor:................\n6.Remark:.........(if any)', NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource26.png', 1, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#0000ff', 0, '0.00', '0.00'),
(27, 'abc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL, 0, 0, NULL, 1, NULL, NULL, 0, NULL, '#f979ac', 0, '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `resource_accessories`
--

CREATE TABLE IF NOT EXISTS `resource_accessories` (
  `resource_accessory_id` mediumint(8) unsigned NOT NULL,
  `resource_id` smallint(5) unsigned NOT NULL,
  `accessory_id` smallint(5) unsigned NOT NULL,
  `minimum_quantity` smallint(6) DEFAULT NULL,
  `maximum_quantity` smallint(6) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resource_accessories`
--

INSERT INTO `resource_accessories` (`resource_accessory_id`, `resource_id`, `accessory_id`, `minimum_quantity`, `maximum_quantity`) VALUES
(4, 15, 2, 1, 4),
(5, 10, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resource_groups`
--

CREATE TABLE IF NOT EXISTS `resource_groups` (
  `resource_group_id` mediumint(8) unsigned NOT NULL,
  `resource_group_name` varchar(75) DEFAULT NULL,
  `parent_id` mediumint(8) unsigned DEFAULT NULL,
  `public_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resource_group_assignment`
--

CREATE TABLE IF NOT EXISTS `resource_group_assignment` (
  `resource_group_id` mediumint(8) unsigned NOT NULL,
  `resource_id` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resource_status_reasons`
--

CREATE TABLE IF NOT EXISTS `resource_status_reasons` (
  `resource_status_reason_id` smallint(5) unsigned NOT NULL,
  `status_id` tinyint(3) unsigned NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resource_status_reasons`
--

INSERT INTO `resource_status_reasons` (`resource_status_reason_id`, `status_id`, `description`) VALUES
(1, 1, 'Ready to use'),
(2, 1, 'Ready to use)');

-- --------------------------------------------------------

--
-- Table structure for table `resource_types`
--

CREATE TABLE IF NOT EXISTS `resource_types` (
  `resource_type_id` mediumint(8) unsigned NOT NULL,
  `resource_type_name` varchar(75) DEFAULT NULL,
  `resource_type_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resource_type_assignment`
--

CREATE TABLE IF NOT EXISTS `resource_type_assignment` (
  `resource_id` smallint(5) unsigned NOT NULL,
  `resource_type_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` tinyint(2) unsigned NOT NULL,
  `name` varchar(85) DEFAULT NULL,
  `role_level` tinyint(2) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`, `role_level`) VALUES
(1, 'Group Admin', 1),
(2, 'Application Admin', 2),
(3, 'Resource Admin', 3),
(4, 'Schedule Admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `saved_reports`
--

CREATE TABLE IF NOT EXISTS `saved_reports` (
  `saved_report_id` mediumint(8) unsigned NOT NULL,
  `report_name` varchar(50) DEFAULT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `report_details` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saved_reports`
--

INSERT INTO `saved_reports` (`saved_report_id`, `report_name`, `user_id`, `date_created`, `report_details`) VALUES
(1, 'Test', 2, '2018-01-18 11:27:45', 'usage=RESOURCES;selection=LIST;groupby=NONE;range=ALL_TIME;range_start=0001-01-01 06:42:04;range_end=9999-01-01 07:00:00;resourceid=;scheduleid=;userid=;groupid=;accessoryid=;participantid=;deleted=;resourceTypeId='),
(2, 'TEST', 2, '2018-03-28 13:22:11', 'usage=RESOURCES;selection=TIME;groupby=GROUP;range=ALL_TIME;range_start=0001-01-01 06:42:04;range_end=9999-01-01 07:00:00;resourceid=23;scheduleid=;userid=;groupid=;accessoryid=;participantid=;deleted=1;resourceTypeId=');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
  `schedule_id` smallint(5) unsigned NOT NULL,
  `name` varchar(85) NOT NULL,
  `isdefault` tinyint(1) unsigned NOT NULL,
  `weekdaystart` tinyint(2) unsigned NOT NULL,
  `daysvisible` tinyint(2) unsigned NOT NULL DEFAULT '7',
  `layout_id` mediumint(8) unsigned NOT NULL,
  `legacyid` char(16) DEFAULT NULL,
  `public_id` varchar(20) DEFAULT NULL,
  `allow_calendar_subscription` tinyint(1) NOT NULL DEFAULT '0',
  `admin_group_id` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `name`, `isdefault`, `weekdaystart`, `daysvisible`, `layout_id`, `legacyid`, `public_id`, `allow_calendar_subscription`, `admin_group_id`) VALUES
(1, 'Default(1h/1slot)', 0, 1, 7, 34, NULL, '5a52501b996fb', 0, NULL),
(8, '4h/1slot', 1, 1, 7, 27, NULL, '5abca119f0463', 0, NULL),
(9, 'Every day 6.00-24.00(1h/1slot)', 0, 1, 7, 26, NULL, NULL, 0, NULL),
(12, 't', 0, 0, 7, 35, NULL, NULL, 0, NULL),
(13, 'ANN', 0, 0, 4, 27, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `time_blocks`
--

CREATE TABLE IF NOT EXISTS `time_blocks` (
  `block_id` mediumint(8) unsigned NOT NULL,
  `label` varchar(85) DEFAULT NULL,
  `end_label` varchar(85) DEFAULT NULL,
  `availability_code` tinyint(2) unsigned NOT NULL,
  `layout_id` mediumint(8) unsigned NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day_of_week` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1100 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_blocks`
--

INSERT INTO `time_blocks` (`block_id`, `label`, `end_label`, `availability_code`, `layout_id`, `start_time`, `end_time`, `day_of_week`) VALUES
(514, NULL, NULL, 1, 26, '00:00:00', '01:00:00', NULL),
(515, NULL, NULL, 2, 26, '01:00:00', '07:00:00', NULL),
(516, NULL, NULL, 1, 26, '07:00:00', '08:00:00', NULL),
(517, NULL, NULL, 1, 26, '08:00:00', '09:00:00', NULL),
(518, NULL, NULL, 1, 26, '09:00:00', '10:00:00', NULL),
(519, NULL, NULL, 1, 26, '10:00:00', '11:00:00', NULL),
(520, NULL, NULL, 1, 26, '11:00:00', '12:00:00', NULL),
(521, NULL, NULL, 1, 26, '12:00:00', '13:00:00', NULL),
(522, NULL, NULL, 1, 26, '13:00:00', '14:00:00', NULL),
(523, NULL, NULL, 1, 26, '14:00:00', '15:00:00', NULL),
(524, NULL, NULL, 1, 26, '15:00:00', '16:00:00', NULL),
(525, NULL, NULL, 1, 26, '16:00:00', '17:00:00', NULL),
(526, NULL, NULL, 1, 26, '17:00:00', '18:00:00', NULL),
(527, NULL, NULL, 1, 26, '18:00:00', '19:00:00', NULL),
(528, NULL, NULL, 1, 26, '19:00:00', '20:00:00', NULL),
(529, NULL, NULL, 1, 26, '20:00:00', '21:00:00', NULL),
(530, NULL, NULL, 1, 26, '21:00:00', '22:00:00', NULL),
(531, NULL, NULL, 1, 26, '22:00:00', '23:00:00', NULL),
(532, NULL, NULL, 1, 26, '23:00:00', '00:00:00', NULL),
(533, NULL, NULL, 1, 27, '00:00:00', '01:00:00', NULL),
(534, NULL, NULL, 1, 27, '01:00:00', '05:00:00', NULL),
(535, NULL, NULL, 1, 27, '05:00:00', '09:00:00', NULL),
(536, NULL, NULL, 1, 27, '09:00:00', '13:00:00', NULL),
(537, NULL, NULL, 1, 27, '13:00:00', '17:00:00', NULL),
(538, NULL, NULL, 1, 27, '17:00:00', '21:00:00', NULL),
(539, NULL, NULL, 1, 27, '21:00:00', '00:00:00', NULL),
(954, NULL, NULL, 2, 34, '00:00:00', '12:00:00', NULL),
(955, NULL, NULL, 2, 34, '12:00:00', '00:00:00', NULL),
(956, NULL, NULL, 2, 35, '00:00:00', '08:00:00', 0),
(957, NULL, NULL, 1, 35, '08:00:00', '08:30:00', 0),
(958, NULL, NULL, 1, 35, '08:30:00', '09:00:00', 0),
(959, NULL, NULL, 1, 35, '09:00:00', '09:30:00', 0),
(960, NULL, NULL, 1, 35, '09:30:00', '10:00:00', 0),
(961, NULL, NULL, 1, 35, '10:00:00', '10:30:00', 0),
(962, NULL, NULL, 1, 35, '10:30:00', '11:00:00', 0),
(963, NULL, NULL, 1, 35, '11:00:00', '11:30:00', 0),
(964, NULL, NULL, 1, 35, '11:30:00', '12:00:00', 0),
(965, NULL, NULL, 1, 35, '12:00:00', '12:30:00', 0),
(966, NULL, NULL, 1, 35, '12:30:00', '13:00:00', 0),
(967, NULL, NULL, 1, 35, '13:00:00', '13:30:00', 0),
(968, NULL, NULL, 1, 35, '13:30:00', '14:00:00', 0),
(969, NULL, NULL, 1, 35, '14:00:00', '14:30:00', 0),
(970, NULL, NULL, 1, 35, '14:30:00', '15:00:00', 0),
(971, NULL, NULL, 1, 35, '15:00:00', '15:30:00', 0),
(972, NULL, NULL, 1, 35, '15:30:00', '16:00:00', 0),
(973, NULL, NULL, 1, 35, '16:00:00', '16:30:00', 0),
(974, NULL, NULL, 1, 35, '16:30:00', '17:00:00', 0),
(975, NULL, NULL, 1, 35, '17:00:00', '17:30:00', 0),
(976, NULL, NULL, 1, 35, '17:30:00', '18:00:00', 0),
(977, NULL, NULL, 2, 35, '18:00:00', '00:00:00', 0),
(978, NULL, NULL, 2, 35, '00:00:00', '08:00:00', 1),
(979, NULL, NULL, 1, 35, '08:00:00', '08:30:00', 1),
(980, NULL, NULL, 1, 35, '08:30:00', '09:00:00', 1),
(981, NULL, NULL, 1, 35, '09:00:00', '09:30:00', 1),
(982, NULL, NULL, 1, 35, '09:30:00', '10:00:00', 1),
(983, NULL, NULL, 1, 35, '10:00:00', '10:30:00', 1),
(984, NULL, NULL, 1, 35, '10:30:00', '11:00:00', 1),
(985, NULL, NULL, 1, 35, '11:00:00', '11:30:00', 1),
(986, NULL, NULL, 1, 35, '11:30:00', '12:00:00', 1),
(987, NULL, NULL, 1, 35, '12:00:00', '12:30:00', 1),
(988, NULL, NULL, 1, 35, '12:30:00', '13:00:00', 1),
(989, NULL, NULL, 1, 35, '13:00:00', '13:30:00', 1),
(990, NULL, NULL, 1, 35, '13:30:00', '14:00:00', 1),
(991, NULL, NULL, 1, 35, '14:00:00', '14:30:00', 1),
(992, NULL, NULL, 1, 35, '14:30:00', '15:00:00', 1),
(993, NULL, NULL, 1, 35, '15:00:00', '15:30:00', 1),
(994, NULL, NULL, 1, 35, '15:30:00', '16:00:00', 1),
(995, NULL, NULL, 1, 35, '16:00:00', '16:30:00', 1),
(996, NULL, NULL, 1, 35, '16:30:00', '17:00:00', 1),
(997, NULL, NULL, 1, 35, '17:00:00', '17:30:00', 1),
(998, NULL, NULL, 1, 35, '17:30:00', '18:00:00', 1),
(999, NULL, NULL, 2, 35, '18:00:00', '00:00:00', 1),
(1000, NULL, NULL, 2, 35, '00:00:00', '08:00:00', 2),
(1001, NULL, NULL, 1, 35, '08:00:00', '08:30:00', 2),
(1002, NULL, NULL, 1, 35, '08:30:00', '09:00:00', 2),
(1003, NULL, NULL, 1, 35, '09:00:00', '09:30:00', 2),
(1004, NULL, NULL, 1, 35, '09:30:00', '10:00:00', 2),
(1005, NULL, NULL, 1, 35, '10:00:00', '10:30:00', 2),
(1006, NULL, NULL, 1, 35, '10:30:00', '11:00:00', 2),
(1007, NULL, NULL, 1, 35, '11:00:00', '11:30:00', 2),
(1008, NULL, NULL, 1, 35, '11:30:00', '12:00:00', 2),
(1009, NULL, NULL, 1, 35, '12:00:00', '12:30:00', 2),
(1010, NULL, NULL, 1, 35, '12:30:00', '13:00:00', 2),
(1011, NULL, NULL, 1, 35, '13:00:00', '13:30:00', 2),
(1012, NULL, NULL, 1, 35, '13:30:00', '14:00:00', 2),
(1013, NULL, NULL, 1, 35, '14:00:00', '14:30:00', 2),
(1014, NULL, NULL, 1, 35, '14:30:00', '15:00:00', 2),
(1015, NULL, NULL, 1, 35, '15:00:00', '15:30:00', 2),
(1016, NULL, NULL, 1, 35, '15:30:00', '16:00:00', 2),
(1017, NULL, NULL, 1, 35, '16:00:00', '16:30:00', 2),
(1018, NULL, NULL, 1, 35, '16:30:00', '17:00:00', 2),
(1019, NULL, NULL, 1, 35, '17:00:00', '17:30:00', 2),
(1020, NULL, NULL, 1, 35, '17:30:00', '18:00:00', 2),
(1021, NULL, NULL, 2, 35, '18:00:00', '00:00:00', 2),
(1022, NULL, NULL, 2, 35, '00:00:00', '08:00:00', 3),
(1023, NULL, NULL, 1, 35, '08:00:00', '08:30:00', 3),
(1024, NULL, NULL, 1, 35, '08:30:00', '09:00:00', 3),
(1025, NULL, NULL, 1, 35, '09:00:00', '09:30:00', 3),
(1026, NULL, NULL, 1, 35, '09:30:00', '10:00:00', 3),
(1027, NULL, NULL, 1, 35, '10:00:00', '10:30:00', 3),
(1028, NULL, NULL, 1, 35, '10:30:00', '11:00:00', 3),
(1029, NULL, NULL, 1, 35, '11:00:00', '11:30:00', 3),
(1030, NULL, NULL, 1, 35, '11:30:00', '12:00:00', 3),
(1031, NULL, NULL, 1, 35, '12:00:00', '12:30:00', 3),
(1032, NULL, NULL, 1, 35, '12:30:00', '13:00:00', 3),
(1033, NULL, NULL, 1, 35, '13:00:00', '13:30:00', 3),
(1034, NULL, NULL, 1, 35, '13:30:00', '14:00:00', 3),
(1035, NULL, NULL, 1, 35, '14:00:00', '14:30:00', 3),
(1036, NULL, NULL, 1, 35, '14:30:00', '15:00:00', 3),
(1037, NULL, NULL, 1, 35, '15:00:00', '15:30:00', 3),
(1038, NULL, NULL, 1, 35, '15:30:00', '16:00:00', 3),
(1039, NULL, NULL, 1, 35, '16:00:00', '16:30:00', 3),
(1040, NULL, NULL, 1, 35, '16:30:00', '17:00:00', 3),
(1041, NULL, NULL, 1, 35, '17:00:00', '17:30:00', 3),
(1042, NULL, NULL, 1, 35, '17:30:00', '18:00:00', 3),
(1043, NULL, NULL, 2, 35, '18:00:00', '00:00:00', 3),
(1044, NULL, NULL, 2, 35, '00:00:00', '08:00:00', 4),
(1045, NULL, NULL, 1, 35, '08:00:00', '08:30:00', 4),
(1046, NULL, NULL, 1, 35, '08:30:00', '09:00:00', 4),
(1047, NULL, NULL, 1, 35, '09:00:00', '09:30:00', 4),
(1048, NULL, NULL, 1, 35, '09:30:00', '10:00:00', 4),
(1049, NULL, NULL, 1, 35, '10:00:00', '10:30:00', 4),
(1050, NULL, NULL, 1, 35, '10:30:00', '11:00:00', 4),
(1051, NULL, NULL, 1, 35, '11:00:00', '11:30:00', 4),
(1052, NULL, NULL, 1, 35, '11:30:00', '12:00:00', 4),
(1053, NULL, NULL, 1, 35, '12:00:00', '12:30:00', 4),
(1054, NULL, NULL, 1, 35, '12:30:00', '13:00:00', 4),
(1055, NULL, NULL, 1, 35, '13:00:00', '13:30:00', 4),
(1056, NULL, NULL, 1, 35, '13:30:00', '14:00:00', 4),
(1057, NULL, NULL, 1, 35, '14:00:00', '14:30:00', 4),
(1058, NULL, NULL, 1, 35, '14:30:00', '15:00:00', 4),
(1059, NULL, NULL, 1, 35, '15:00:00', '15:30:00', 4),
(1060, NULL, NULL, 1, 35, '15:30:00', '16:00:00', 4),
(1061, NULL, NULL, 1, 35, '16:00:00', '16:30:00', 4),
(1062, NULL, NULL, 1, 35, '16:30:00', '17:00:00', 4),
(1063, NULL, NULL, 1, 35, '17:00:00', '17:30:00', 4),
(1064, NULL, NULL, 1, 35, '17:30:00', '18:00:00', 4),
(1065, NULL, NULL, 2, 35, '18:00:00', '00:00:00', 4),
(1066, NULL, NULL, 2, 35, '00:00:00', '08:00:00', 5),
(1067, NULL, NULL, 1, 35, '08:00:00', '08:30:00', 5),
(1068, NULL, NULL, 1, 35, '08:30:00', '09:00:00', 5),
(1069, NULL, NULL, 1, 35, '09:00:00', '09:30:00', 5),
(1070, NULL, NULL, 1, 35, '09:30:00', '10:00:00', 5),
(1071, NULL, NULL, 1, 35, '10:00:00', '10:30:00', 5),
(1072, NULL, NULL, 1, 35, '10:30:00', '11:00:00', 5),
(1073, NULL, NULL, 1, 35, '11:00:00', '11:30:00', 5),
(1074, NULL, NULL, 1, 35, '11:30:00', '12:00:00', 5),
(1075, NULL, NULL, 1, 35, '12:00:00', '12:30:00', 5),
(1076, NULL, NULL, 1, 35, '12:30:00', '13:00:00', 5),
(1077, NULL, NULL, 1, 35, '13:00:00', '13:30:00', 5),
(1078, NULL, NULL, 1, 35, '13:30:00', '14:00:00', 5),
(1079, NULL, NULL, 1, 35, '14:00:00', '14:30:00', 5),
(1080, NULL, NULL, 1, 35, '14:30:00', '15:00:00', 5),
(1081, NULL, NULL, 1, 35, '15:00:00', '15:30:00', 5),
(1082, NULL, NULL, 1, 35, '15:30:00', '16:00:00', 5),
(1083, NULL, NULL, 1, 35, '16:00:00', '16:30:00', 5),
(1084, NULL, NULL, 1, 35, '16:30:00', '17:00:00', 5),
(1085, NULL, NULL, 1, 35, '17:00:00', '17:30:00', 5),
(1086, NULL, NULL, 1, 35, '17:30:00', '18:00:00', 5),
(1087, NULL, NULL, 2, 35, '18:00:00', '00:00:00', 5),
(1088, NULL, NULL, 2, 35, '00:00:00', '08:00:00', 6),
(1089, NULL, NULL, 1, 35, '08:00:00', '09:00:00', 6),
(1090, NULL, NULL, 1, 35, '09:00:00', '10:00:00', 6),
(1091, NULL, NULL, 1, 35, '10:00:00', '11:00:00', 6),
(1092, NULL, NULL, 1, 35, '11:00:00', '12:00:00', 6),
(1093, NULL, NULL, 1, 35, '12:00:00', '13:00:00', 6),
(1094, NULL, NULL, 1, 35, '13:00:00', '14:00:00', 6),
(1095, NULL, NULL, 1, 35, '14:00:00', '15:00:00', 6),
(1096, NULL, NULL, 1, 35, '15:00:00', '16:00:00', 6),
(1097, NULL, NULL, 1, 35, '16:00:00', '17:00:00', 6),
(1098, NULL, NULL, 1, 35, '17:00:00', '18:00:00', 6),
(1099, NULL, NULL, 2, 35, '18:00:00', '00:00:00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` mediumint(8) unsigned NOT NULL,
  `fname` varchar(85) DEFAULT NULL,
  `lname` varchar(85) DEFAULT NULL,
  `username` varchar(85) DEFAULT NULL,
  `email` varchar(85) NOT NULL,
  `password` varchar(85) NOT NULL,
  `salt` varchar(85) NOT NULL,
  `organization` varchar(85) DEFAULT NULL,
  `position` varchar(85) DEFAULT NULL,
  `phone` varchar(85) DEFAULT NULL,
  `timezone` varchar(85) NOT NULL,
  `language` varchar(10) NOT NULL,
  `homepageid` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lastlogin` datetime DEFAULT NULL,
  `status_id` tinyint(2) unsigned NOT NULL,
  `legacyid` char(16) DEFAULT NULL,
  `legacypassword` varchar(32) DEFAULT NULL,
  `public_id` varchar(20) DEFAULT NULL,
  `allow_calendar_subscription` tinyint(1) NOT NULL DEFAULT '0',
  `default_schedule_id` smallint(5) unsigned DEFAULT NULL,
  `credit_count` decimal(7,2) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `username`, `email`, `password`, `salt`, `organization`, `position`, `phone`, `timezone`, `language`, `homepageid`, `date_created`, `last_modified`, `lastlogin`, `status_id`, `legacyid`, `legacypassword`, `public_id`, `allow_calendar_subscription`, `default_schedule_id`, `credit_count`) VALUES
(1, 'User', 'User', 'user', 'user@example.com', '7b6aec38ff9b7650d64d0374194307bdde711425', '3b3dbb9b', 'XYZ Org Inc.', '', '089999999', 'Asia/Bangkok', 'en_us', 1, '2017-11-14 06:04:13', '2018-04-09 04:18:17', '2018-04-09 11:18:17', 1, NULL, NULL, '5a0a4cac56c47', 0, NULL, '0.00'),
(2, 'Admin', 'Admin', 'admin', 'admin@example.com', '70f3e748c6801656e4aae9dca6ee98ab137d952c', '4a04db87', 'ABC Org Inc.', '', '', 'Asia/Bangkok', 'en_us', 1, '2017-11-14 06:04:13', '2018-05-09 13:36:09', '2018-05-09 20:36:09', 1, NULL, NULL, '5a0a250765a11', 0, NULL, '0.00'),
(3, 'Arnut', 'Virachotikul', 'aquajigi@hotmail.com', 'aquajigi@hotmail.com', 'b0e807b1f11d237fe0b4592873b2e064e09e8f5a', '57cea063', NULL, NULL, NULL, 'Asia/Bangkok', 'en_us', 1, '2017-11-14 06:30:53', '2017-11-13 23:33:05', '2017-11-14 06:30:55', 1, NULL, NULL, '5a0a8d9d69365', 0, NULL, '0.00'),
(4, 'Supajittra', 'Yimthachote', 'baralee_b@hotmail.com', 'baralee_b@hotmail.com', '5533bf744503c2c6320e92c0f1f22be6a59d90cd', '5c8dff74', NULL, NULL, NULL, 'Asia/Bangkok', 'en_us', 1, '2017-11-14 06:30:53', '2017-11-13 23:31:03', '2017-11-14 06:30:54', 1, NULL, NULL, '5a0a8d9e5acd7', 0, NULL, '0.00'),
(6, 'Traveller', 'EveryDays', 'piya@guruenglishschool.com', 'piya@guruenglishschool.com', '35bfec5a126069167842e8c85e73f6a3e11e3afc', '3662414b', NULL, NULL, NULL, 'Asia/Bangkok', 'en_us', 1, '2018-01-18 10:09:03', '2018-01-18 03:40:46', '2018-01-18 10:09:04', 1, NULL, NULL, '5a600fd0046b1', 0, NULL, '0.00'),
(7, 'Piya', 'KanKun', 'unloveablenaruto@hotmail.com', 'unloveablenaruto@hotmail.com', 'f7ebf469bd3a81fa91b5fcb04cf6b8414467de84', '744f3588', NULL, NULL, NULL, 'Asia/Bangkok', 'en_us', 1, '2018-01-19 00:09:34', '2018-02-09 16:27:18', '2018-02-09 23:27:18', 1, NULL, NULL, '5a60d4cf6b007', 0, NULL, '0.00'),
(8, 'test001', 'PK', 'test001', 'test001@mail.com', 'fe15b40a5797c7b449ff34c9259f4414fd66bdb1', '22311380', NULL, NULL, NULL, 'Asia/Bangkok', 'en_us', 1, '2018-02-17 12:57:21', '2018-02-17 19:17:04', '2018-02-18 02:17:04', 1, NULL, NULL, '5a87c4cc99f42', 0, NULL, '0.00'),
(9, 'test002', 'PK', 'test002', 'test002@mail.com', '10c81ee357e0f208eaf8f3925fa2980f98b1ba62', '01b71100', NULL, NULL, NULL, 'Asia/Bangkok', 'en_us', 1, '2018-02-17 12:58:14', '2018-02-17 19:08:03', '2018-02-18 02:08:03', 1, NULL, NULL, '5a887d93e3ff8', 0, NULL, '0.00'),
(10, 'test003', 'PK', 'test003', 'test003@mail.com', '13084fe9f82328d9a2c173946e2a7c9d6fb7a609', '5a5d76f6', NULL, NULL, NULL, 'Asia/Bangkok', 'en_us', 1, '2018-02-17 12:58:56', '2018-02-17 18:55:17', '2018-02-18 01:55:17', 1, NULL, NULL, '5a887a9579d14', 0, NULL, '0.00'),
(11, 'test001-1', 'PK', 'test001-1', 'test001-1@mail.com', '24c41da02bf6c5da55b0c13e0ad588caedfa986a', '557e8844', NULL, NULL, NULL, 'Asia/Bangkok', 'en_us', 1, '2018-02-18 02:18:52', '2018-02-17 19:19:07', '2018-02-18 02:19:07', 1, NULL, NULL, '5a88802b7f209', 0, NULL, '0.00'),
(12, 'Jarinya', 'Sittiwong', 'Jarinya', 'jarinya.s@vistec.ac.th', '51504edec3dbe684a9d1b2cae69dd17141445725', '50ec69d9', NULL, NULL, NULL, 'Asia/Bangkok', 'en_us', 1, '2018-03-09 15:05:58', '2018-03-09 08:05:58', NULL, 1, NULL, NULL, NULL, 0, NULL, NULL),
(13, 'ds', 'sd', 'ds', 'admin@admin.com', '0335196ff7e848e8272c6a53399bc9660343eb85', '1b326e42', NULL, NULL, NULL, 'Asia/Bangkok', 'en_us', 1, '2018-03-28 10:00:11', '2018-03-28 03:05:32', '2018-03-28 10:00:49', 1, NULL, NULL, '5abb05617d69f', 0, NULL, '0.00'),
(14, 'me', 'me', 'me', 'me@me.com', '5362ac39c0f9a9ba666dc520e5621bd3f7ee3be5', '50a47463', '', '', '', 'Asia/Bangkok', 'en_us', 4, '2018-03-28 10:14:22', '2018-03-28 07:38:38', '2018-03-28 14:38:37', 1, NULL, NULL, '5abb0925c3ed6', 0, NULL, '0.00'),
(15, 'mem', 'mem', 'mem', 'mem@mem.com', '02af187baba66adfdcafc9967c64e29ea625f04f', '13615694', NULL, NULL, NULL, 'Asia/Bangkok', 'en_us', 1, '2018-03-28 10:18:44', '2018-03-28 03:24:45', '2018-03-28 10:24:45', 1, NULL, NULL, '5abb0afd550a0', 0, NULL, '0.00'),
(17, 'Ann', 'asde', 'ann', 'ja@com', '4408e852a0aa34ee8e956e9e01c84ab3ff6a8364', '68eeae83', NULL, NULL, NULL, 'Asia/Bangkok', 'en_us', 1, '2018-03-29 16:23:10', '2018-03-29 09:23:10', NULL, 1, NULL, NULL, NULL, 0, NULL, NULL),
(18, 'frc', 'aa', 'frc', 'ss@com', 'cac9d37a2cf014651ff5d8ba97211e6a7e67500a', '2023cc5b', NULL, NULL, NULL, 'Asia/Bangkok', 'en_us', 1, '2018-03-29 16:24:15', '2018-03-29 09:24:15', NULL, 1, NULL, NULL, NULL, 0, NULL, NULL),
(19, 'aa', 'aa', 'sd', 'sa@aa.com', '440a385c60d7a13f2166d38bc37c4cbf70b4eb4b', '60cb2b96', NULL, NULL, NULL, 'Asia/Bangkok', 'en_us', 1, '2018-03-29 16:24:51', '2018-03-29 09:24:51', NULL, 1, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_email_preferences`
--

CREATE TABLE IF NOT EXISTS `user_email_preferences` (
  `user_id` mediumint(8) unsigned NOT NULL,
  `event_category` varchar(45) NOT NULL,
  `event_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`user_id`, `group_id`) VALUES
(1, 3),
(6, 3),
(8, 3),
(11, 3),
(3, 4),
(9, 4),
(4, 5),
(7, 5),
(10, 5),
(2, 6),
(11, 6),
(13, 6),
(1, 7),
(9, 7),
(10, 7),
(12, 7),
(13, 7),
(6, 8),
(7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_preferences`
--

CREATE TABLE IF NOT EXISTS `user_preferences` (
  `user_preferences_id` int(10) unsigned NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` text
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_preferences`
--

INSERT INTO `user_preferences` (`user_preferences_id`, `user_id`, `name`, `value`) VALUES
(1, 1, 'CalendarFilter', '15|1|'),
(2, 4, 'CalendarFilter', '||'),
(3, 3, 'CalendarFilter', '||'),
(4, 2, 'CalendarFilter', '||'),
(5, 2, 'FilterStartDateDelta', '-14'),
(6, 2, 'FilterEndDateDelta', '14'),
(7, 2, 'FilterUserId', '2'),
(8, 2, 'FilterUserName', 'Admin Admin'),
(9, 2, 'FilterScheduleId', '0'),
(10, 2, 'FilterResourceId', '0'),
(11, 2, 'FilterReservationStatusId', '0'),
(12, 2, 'FilterReferenceNumber', NULL),
(13, 2, 'FilterResourceStatusId', NULL),
(14, 2, 'FilterResourceReasonId', ''),
(15, 2, 'FilterCustomAttributes', 'a:0:{}'),
(16, 6, 'CalendarFilter', '||'),
(17, 7, 'CalendarFilter', '||'),
(18, 8, 'CalendarFilter', '||'),
(19, 13, 'CalendarFilter', '||'),
(20, 14, 'CalendarFilter', '||'),
(21, 1, 'FilterStartDateDelta', '-7'),
(22, 1, 'FilterEndDateDelta', '7'),
(23, 1, 'FilterUserId', '14'),
(24, 1, 'FilterUserName', 'me me'),
(25, 1, 'FilterScheduleId', '0'),
(26, 1, 'FilterResourceId', '0'),
(27, 1, 'FilterReservationStatusId', '0'),
(28, 1, 'FilterReferenceNumber', NULL),
(29, 1, 'FilterResourceStatusId', NULL),
(30, 1, 'FilterResourceReasonId', NULL),
(31, 1, 'FilterCustomAttributes', 'a:0:{}');

-- --------------------------------------------------------

--
-- Table structure for table `user_resource_permissions`
--

CREATE TABLE IF NOT EXISTS `user_resource_permissions` (
  `user_id` mediumint(8) unsigned NOT NULL,
  `resource_id` smallint(5) unsigned NOT NULL,
  `permission_id` tinyint(2) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_resource_permissions`
--

INSERT INTO `user_resource_permissions` (`user_id`, `resource_id`, `permission_id`) VALUES
(1, 2, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(1, 11, 1),
(1, 12, 1),
(1, 13, 1),
(1, 14, 1),
(1, 15, 1),
(1, 16, 1),
(1, 17, 1),
(1, 18, 1),
(1, 19, 1),
(1, 20, 1),
(1, 21, 1),
(1, 22, 1),
(1, 23, 1),
(1, 24, 1),
(1, 25, 1),
(1, 26, 1),
(1, 27, 1),
(2, 2, 1),
(2, 7, 1),
(2, 8, 1),
(2, 9, 1),
(2, 10, 1),
(2, 11, 1),
(2, 12, 1),
(2, 13, 1),
(2, 14, 1),
(2, 15, 1),
(2, 16, 1),
(2, 17, 1),
(2, 18, 1),
(2, 19, 1),
(2, 20, 1),
(2, 21, 1),
(2, 22, 1),
(2, 23, 1),
(2, 24, 1),
(2, 25, 1),
(2, 26, 1),
(2, 27, 1),
(3, 2, 1),
(3, 7, 1),
(3, 8, 1),
(3, 9, 1),
(3, 10, 1),
(3, 11, 1),
(3, 12, 1),
(3, 13, 1),
(3, 14, 1),
(3, 15, 1),
(3, 16, 1),
(3, 17, 1),
(3, 18, 1),
(3, 19, 1),
(3, 20, 1),
(3, 21, 1),
(3, 22, 1),
(3, 23, 1),
(3, 24, 1),
(3, 25, 1),
(3, 26, 1),
(3, 27, 1),
(4, 2, 1),
(4, 7, 1),
(4, 8, 1),
(4, 9, 1),
(4, 10, 1),
(4, 11, 1),
(4, 12, 1),
(4, 13, 1),
(4, 14, 1),
(4, 15, 1),
(4, 16, 1),
(4, 17, 1),
(4, 18, 1),
(4, 19, 1),
(4, 20, 1),
(4, 21, 1),
(4, 22, 1),
(4, 23, 1),
(4, 24, 1),
(4, 25, 1),
(4, 26, 1),
(4, 27, 1),
(6, 2, 1),
(6, 7, 1),
(6, 8, 1),
(6, 9, 1),
(6, 10, 1),
(6, 11, 1),
(6, 12, 1),
(6, 13, 1),
(6, 14, 1),
(6, 15, 1),
(6, 16, 1),
(6, 17, 1),
(6, 18, 1),
(6, 19, 1),
(6, 20, 1),
(6, 21, 1),
(6, 22, 1),
(6, 23, 1),
(6, 24, 1),
(6, 25, 1),
(6, 26, 1),
(6, 27, 1),
(7, 2, 1),
(7, 7, 1),
(7, 8, 1),
(7, 9, 1),
(7, 10, 1),
(7, 11, 1),
(7, 12, 1),
(7, 13, 1),
(7, 14, 1),
(7, 15, 1),
(7, 16, 1),
(7, 17, 1),
(7, 18, 1),
(7, 19, 1),
(7, 20, 1),
(7, 21, 1),
(7, 22, 1),
(7, 23, 1),
(7, 24, 1),
(7, 25, 1),
(7, 26, 1),
(7, 27, 1),
(8, 2, 1),
(8, 7, 1),
(8, 8, 1),
(8, 9, 1),
(8, 10, 1),
(8, 11, 1),
(8, 12, 1),
(8, 13, 1),
(8, 14, 1),
(8, 15, 1),
(8, 16, 1),
(8, 17, 1),
(8, 18, 1),
(8, 19, 1),
(8, 20, 1),
(8, 21, 1),
(8, 22, 1),
(8, 23, 1),
(8, 24, 1),
(8, 25, 1),
(8, 26, 1),
(8, 27, 1),
(9, 2, 1),
(9, 7, 1),
(9, 8, 1),
(9, 9, 1),
(9, 10, 1),
(9, 11, 1),
(9, 12, 1),
(9, 13, 1),
(9, 14, 1),
(9, 15, 1),
(9, 16, 1),
(9, 17, 1),
(9, 18, 1),
(9, 19, 1),
(9, 20, 1),
(9, 21, 1),
(9, 22, 1),
(9, 23, 1),
(9, 24, 1),
(9, 25, 1),
(9, 26, 1),
(9, 27, 1),
(10, 2, 1),
(10, 7, 1),
(10, 8, 1),
(10, 9, 1),
(10, 10, 1),
(10, 11, 1),
(10, 12, 1),
(10, 13, 1),
(10, 14, 1),
(10, 15, 1),
(10, 16, 1),
(10, 17, 1),
(10, 18, 1),
(10, 19, 1),
(10, 20, 1),
(10, 21, 1),
(10, 22, 1),
(10, 23, 1),
(10, 24, 1),
(10, 25, 1),
(10, 26, 1),
(10, 27, 1),
(11, 2, 1),
(11, 7, 1),
(11, 8, 1),
(11, 9, 1),
(11, 10, 1),
(11, 11, 1),
(11, 12, 1),
(11, 13, 1),
(11, 14, 1),
(11, 15, 1),
(11, 16, 1),
(11, 17, 1),
(11, 18, 1),
(11, 19, 1),
(11, 20, 1),
(11, 21, 1),
(11, 22, 1),
(11, 23, 1),
(11, 24, 1),
(11, 25, 1),
(11, 26, 1),
(11, 27, 1),
(12, 2, 1),
(12, 7, 1),
(12, 8, 1),
(12, 9, 1),
(12, 10, 1),
(12, 11, 1),
(12, 12, 1),
(12, 13, 1),
(12, 14, 1),
(12, 15, 1),
(12, 16, 1),
(12, 17, 1),
(12, 18, 1),
(12, 19, 1),
(12, 20, 1),
(12, 21, 1),
(12, 22, 1),
(12, 23, 1),
(12, 24, 1),
(12, 25, 1),
(12, 26, 1),
(12, 27, 1),
(13, 2, 1),
(13, 7, 1),
(13, 8, 1),
(13, 9, 1),
(13, 10, 1),
(13, 11, 1),
(13, 12, 1),
(13, 13, 1),
(13, 14, 1),
(13, 15, 1),
(13, 16, 1),
(13, 17, 1),
(13, 18, 1),
(13, 19, 1),
(13, 20, 1),
(13, 21, 1),
(13, 22, 1),
(13, 23, 1),
(13, 24, 1),
(13, 25, 1),
(13, 26, 1),
(13, 27, 1),
(14, 9, 1),
(14, 10, 1),
(14, 27, 1),
(15, 2, 1),
(15, 7, 1),
(15, 8, 1),
(15, 9, 1),
(15, 10, 1),
(15, 11, 1),
(15, 12, 1),
(15, 13, 1),
(15, 14, 1),
(15, 15, 1),
(15, 16, 1),
(15, 17, 1),
(15, 18, 1),
(15, 19, 1),
(15, 20, 1),
(15, 21, 1),
(15, 22, 1),
(15, 23, 1),
(15, 24, 1),
(15, 25, 1),
(15, 26, 1),
(15, 27, 1),
(17, 2, 1),
(17, 7, 1),
(17, 8, 1),
(17, 9, 1),
(17, 10, 1),
(17, 11, 1),
(17, 12, 1),
(17, 13, 1),
(17, 14, 1),
(17, 15, 1),
(17, 16, 1),
(17, 17, 1),
(17, 18, 1),
(17, 19, 1),
(17, 20, 1),
(17, 21, 1),
(17, 22, 1),
(17, 23, 1),
(17, 24, 1),
(17, 25, 1),
(17, 26, 1),
(17, 27, 1),
(18, 2, 1),
(18, 7, 1),
(18, 8, 1),
(18, 9, 1),
(18, 10, 1),
(18, 11, 1),
(18, 12, 1),
(18, 13, 1),
(18, 14, 1),
(18, 15, 1),
(18, 16, 1),
(18, 17, 1),
(18, 18, 1),
(18, 19, 1),
(18, 20, 1),
(18, 21, 1),
(18, 22, 1),
(18, 23, 1),
(18, 24, 1),
(18, 25, 1),
(18, 26, 1),
(18, 27, 1),
(19, 2, 1),
(19, 7, 1),
(19, 8, 1),
(19, 9, 1),
(19, 10, 1),
(19, 11, 1),
(19, 12, 1),
(19, 13, 1),
(19, 14, 1),
(19, 15, 1),
(19, 16, 1),
(19, 17, 1),
(19, 18, 1),
(19, 19, 1),
(19, 20, 1),
(19, 21, 1),
(19, 22, 1),
(19, 23, 1),
(19, 24, 1),
(19, 25, 1),
(19, 26, 1),
(19, 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE IF NOT EXISTS `user_session` (
  `user_session_id` mediumint(8) unsigned NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `last_modified` datetime NOT NULL,
  `session_token` varchar(50) NOT NULL,
  `user_session_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_statuses`
--

CREATE TABLE IF NOT EXISTS `user_statuses` (
  `status_id` tinyint(2) unsigned NOT NULL,
  `description` varchar(85) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_statuses`
--

INSERT INTO `user_statuses` (`status_id`, `description`) VALUES
(1, 'Active'),
(2, 'Awaiting'),
(3, 'Inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`accessory_id`);

--
-- Indexes for table `account_activation`
--
ALTER TABLE `account_activation`
  ADD PRIMARY KEY (`account_activation_id`),
  ADD UNIQUE KEY `activation_code_2` (`activation_code`),
  ADD KEY `activation_code` (`activation_code`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcementid`);

--
-- Indexes for table `announcement_groups`
--
ALTER TABLE `announcement_groups`
  ADD PRIMARY KEY (`announcementid`,`group_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `announcement_resources`
--
ALTER TABLE `announcement_resources`
  ADD PRIMARY KEY (`announcementid`,`resource_id`),
  ADD KEY `resource_id` (`resource_id`);

--
-- Indexes for table `blackout_instances`
--
ALTER TABLE `blackout_instances`
  ADD PRIMARY KEY (`blackout_instance_id`),
  ADD KEY `start_date` (`start_date`),
  ADD KEY `end_date` (`end_date`),
  ADD KEY `blackout_series_id` (`blackout_series_id`);

--
-- Indexes for table `blackout_series`
--
ALTER TABLE `blackout_series`
  ADD PRIMARY KEY (`blackout_series_id`);

--
-- Indexes for table `blackout_series_resources`
--
ALTER TABLE `blackout_series_resources`
  ADD PRIMARY KEY (`blackout_series_id`,`resource_id`),
  ADD KEY `resource_id` (`resource_id`);

--
-- Indexes for table `custom_attributes`
--
ALTER TABLE `custom_attributes`
  ADD PRIMARY KEY (`custom_attribute_id`),
  ADD KEY `attribute_category` (`attribute_category`),
  ADD KEY `display_label` (`display_label`);

--
-- Indexes for table `custom_attribute_entities`
--
ALTER TABLE `custom_attribute_entities`
  ADD PRIMARY KEY (`custom_attribute_id`,`entity_id`);

--
-- Indexes for table `custom_attribute_values`
--
ALTER TABLE `custom_attribute_values`
  ADD PRIMARY KEY (`custom_attribute_value_id`),
  ADD KEY `custom_attribute_id` (`custom_attribute_id`),
  ADD KEY `entity_category` (`entity_id`,`attribute_category`),
  ADD KEY `entity_attribute` (`entity_id`,`custom_attribute_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `admin_group_id` (`admin_group_id`);

--
-- Indexes for table `group_resource_permissions`
--
ALTER TABLE `group_resource_permissions`
  ADD PRIMARY KEY (`group_id`,`resource_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `resource_id` (`resource_id`);

--
-- Indexes for table `group_roles`
--
ALTER TABLE `group_roles`
  ADD PRIMARY KEY (`group_id`,`role_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `layouts`
--
ALTER TABLE `layouts`
  ADD PRIMARY KEY (`layout_id`);

--
-- Indexes for table `peak_times`
--
ALTER TABLE `peak_times`
  ADD PRIMARY KEY (`peak_times_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indexes for table `quotas`
--
ALTER TABLE `quotas`
  ADD PRIMARY KEY (`quota_id`),
  ADD KEY `resource_id` (`resource_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`reminder_id`),
  ADD KEY `reminders_user_id` (`user_id`);

--
-- Indexes for table `reservation_accessories`
--
ALTER TABLE `reservation_accessories`
  ADD PRIMARY KEY (`series_id`,`accessory_id`),
  ADD KEY `accessory_id` (`accessory_id`),
  ADD KEY `series_id` (`series_id`);

--
-- Indexes for table `reservation_color_rules`
--
ALTER TABLE `reservation_color_rules`
  ADD PRIMARY KEY (`reservation_color_rule_id`),
  ADD KEY `custom_attribute_id` (`custom_attribute_id`);

--
-- Indexes for table `reservation_files`
--
ALTER TABLE `reservation_files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `series_id` (`series_id`);

--
-- Indexes for table `reservation_guests`
--
ALTER TABLE `reservation_guests`
  ADD PRIMARY KEY (`reservation_instance_id`,`email`),
  ADD KEY `reservation_guests_reservation_instance_id` (`reservation_instance_id`),
  ADD KEY `reservation_guests_email_address` (`email`),
  ADD KEY `reservation_guests_reservation_user_level` (`reservation_user_level`);

--
-- Indexes for table `reservation_instances`
--
ALTER TABLE `reservation_instances`
  ADD PRIMARY KEY (`reservation_instance_id`),
  ADD KEY `start_date` (`start_date`),
  ADD KEY `end_date` (`end_date`),
  ADD KEY `reference_number` (`reference_number`),
  ADD KEY `series_id` (`series_id`),
  ADD KEY `checkin_date` (`checkin_date`);

--
-- Indexes for table `reservation_reminders`
--
ALTER TABLE `reservation_reminders`
  ADD PRIMARY KEY (`reminder_id`),
  ADD KEY `series_id` (`series_id`);

--
-- Indexes for table `reservation_resources`
--
ALTER TABLE `reservation_resources`
  ADD PRIMARY KEY (`series_id`,`resource_id`),
  ADD KEY `resource_id` (`resource_id`),
  ADD KEY `series_id` (`series_id`);

--
-- Indexes for table `reservation_series`
--
ALTER TABLE `reservation_series`
  ADD PRIMARY KEY (`series_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `reservations_owner` (`owner_id`);

--
-- Indexes for table `reservation_statuses`
--
ALTER TABLE `reservation_statuses`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `reservation_types`
--
ALTER TABLE `reservation_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `reservation_users`
--
ALTER TABLE `reservation_users`
  ADD PRIMARY KEY (`reservation_instance_id`,`user_id`),
  ADD KEY `reservation_instance_id` (`reservation_instance_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reservation_user_level` (`reservation_user_level`);

--
-- Indexes for table `reservation_waitlist_requests`
--
ALTER TABLE `reservation_waitlist_requests`
  ADD PRIMARY KEY (`reservation_waitlist_request_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `resource_id` (`resource_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resource_id`),
  ADD UNIQUE KEY `public_id` (`public_id`),
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `admin_group_id` (`admin_group_id`),
  ADD KEY `resource_type_id` (`resource_type_id`),
  ADD KEY `resource_status_reason_id` (`resource_status_reason_id`),
  ADD KEY `auto_release_minutes` (`auto_release_minutes`);

--
-- Indexes for table `resource_accessories`
--
ALTER TABLE `resource_accessories`
  ADD PRIMARY KEY (`resource_accessory_id`),
  ADD KEY `resource_id` (`resource_id`),
  ADD KEY `accessory_id` (`accessory_id`);

--
-- Indexes for table `resource_groups`
--
ALTER TABLE `resource_groups`
  ADD PRIMARY KEY (`resource_group_id`),
  ADD KEY `resource_groups_parent_id` (`parent_id`);

--
-- Indexes for table `resource_group_assignment`
--
ALTER TABLE `resource_group_assignment`
  ADD PRIMARY KEY (`resource_group_id`,`resource_id`),
  ADD KEY `resource_group_assignment_resource_id` (`resource_id`),
  ADD KEY `resource_group_assignment_resource_group_id` (`resource_group_id`);

--
-- Indexes for table `resource_status_reasons`
--
ALTER TABLE `resource_status_reasons`
  ADD PRIMARY KEY (`resource_status_reason_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `resource_types`
--
ALTER TABLE `resource_types`
  ADD PRIMARY KEY (`resource_type_id`);

--
-- Indexes for table `resource_type_assignment`
--
ALTER TABLE `resource_type_assignment`
  ADD PRIMARY KEY (`resource_id`,`resource_type_id`),
  ADD KEY `resource_type_id` (`resource_type_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `saved_reports`
--
ALTER TABLE `saved_reports`
  ADD PRIMARY KEY (`saved_report_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`),
  ADD UNIQUE KEY `public_id` (`public_id`),
  ADD KEY `layout_id` (`layout_id`),
  ADD KEY `schedules_groups_admin_group_id` (`admin_group_id`);

--
-- Indexes for table `time_blocks`
--
ALTER TABLE `time_blocks`
  ADD PRIMARY KEY (`block_id`),
  ADD KEY `layout_id` (`layout_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `public_id` (`public_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `user_email_preferences`
--
ALTER TABLE `user_email_preferences`
  ADD PRIMARY KEY (`user_id`,`event_category`,`event_type`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`group_id`,`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD PRIMARY KEY (`user_preferences_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_resource_permissions`
--
ALTER TABLE `user_resource_permissions`
  ADD PRIMARY KEY (`user_id`,`resource_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `resource_id` (`resource_id`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`user_session_id`),
  ADD KEY `user_session_user_id` (`user_id`),
  ADD KEY `user_session_session_token` (`session_token`);

--
-- Indexes for table `user_statuses`
--
ALTER TABLE `user_statuses`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `accessory_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `account_activation`
--
ALTER TABLE `account_activation`
  MODIFY `account_activation_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcementid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `blackout_instances`
--
ALTER TABLE `blackout_instances`
  MODIFY `blackout_instance_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `blackout_series`
--
ALTER TABLE `blackout_series`
  MODIFY `blackout_series_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `custom_attributes`
--
ALTER TABLE `custom_attributes`
  MODIFY `custom_attribute_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `custom_attribute_values`
--
ALTER TABLE `custom_attribute_values`
  MODIFY `custom_attribute_value_id` int(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=225;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `layouts`
--
ALTER TABLE `layouts`
  MODIFY `layout_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `peak_times`
--
ALTER TABLE `peak_times`
  MODIFY `peak_times_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quotas`
--
ALTER TABLE `quotas`
  MODIFY `quota_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `reminder_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservation_color_rules`
--
ALTER TABLE `reservation_color_rules`
  MODIFY `reservation_color_rule_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservation_files`
--
ALTER TABLE `reservation_files`
  MODIFY `file_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reservation_instances`
--
ALTER TABLE `reservation_instances`
  MODIFY `reservation_instance_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=318;
--
-- AUTO_INCREMENT for table `reservation_reminders`
--
ALTER TABLE `reservation_reminders`
  MODIFY `reminder_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservation_series`
--
ALTER TABLE `reservation_series`
  MODIFY `series_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=318;
--
-- AUTO_INCREMENT for table `reservation_waitlist_requests`
--
ALTER TABLE `reservation_waitlist_requests`
  MODIFY `reservation_waitlist_request_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resource_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `resource_accessories`
--
ALTER TABLE `resource_accessories`
  MODIFY `resource_accessory_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `resource_groups`
--
ALTER TABLE `resource_groups`
  MODIFY `resource_group_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resource_status_reasons`
--
ALTER TABLE `resource_status_reasons`
  MODIFY `resource_status_reason_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `resource_types`
--
ALTER TABLE `resource_types`
  MODIFY `resource_type_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `saved_reports`
--
ALTER TABLE `saved_reports`
  MODIFY `saved_report_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `time_blocks`
--
ALTER TABLE `time_blocks`
  MODIFY `block_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1100;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_preferences`
--
ALTER TABLE `user_preferences`
  MODIFY `user_preferences_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `user_session_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_activation`
--
ALTER TABLE `account_activation`
  ADD CONSTRAINT `account_activation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `announcement_groups`
--
ALTER TABLE `announcement_groups`
  ADD CONSTRAINT `announcement_groups_ibfk_1` FOREIGN KEY (`announcementid`) REFERENCES `announcements` (`announcementid`) ON DELETE CASCADE,
  ADD CONSTRAINT `announcement_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE;

--
-- Constraints for table `announcement_resources`
--
ALTER TABLE `announcement_resources`
  ADD CONSTRAINT `announcement_resources_ibfk_1` FOREIGN KEY (`announcementid`) REFERENCES `announcements` (`announcementid`) ON DELETE CASCADE,
  ADD CONSTRAINT `announcement_resources_ibfk_2` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`resource_id`) ON DELETE CASCADE;

--
-- Constraints for table `blackout_instances`
--
ALTER TABLE `blackout_instances`
  ADD CONSTRAINT `blackout_instances_ibfk_1` FOREIGN KEY (`blackout_series_id`) REFERENCES `blackout_series` (`blackout_series_id`) ON DELETE CASCADE;

--
-- Constraints for table `blackout_series_resources`
--
ALTER TABLE `blackout_series_resources`
  ADD CONSTRAINT `blackout_series_resources_ibfk_1` FOREIGN KEY (`blackout_series_id`) REFERENCES `blackout_series` (`blackout_series_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blackout_series_resources_ibfk_2` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`resource_id`) ON DELETE CASCADE;

--
-- Constraints for table `custom_attribute_entities`
--
ALTER TABLE `custom_attribute_entities`
  ADD CONSTRAINT `custom_attribute_entities_ibfk_1` FOREIGN KEY (`custom_attribute_id`) REFERENCES `custom_attributes` (`custom_attribute_id`) ON DELETE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`admin_group_id`) REFERENCES `groups` (`group_id`);

--
-- Constraints for table `group_resource_permissions`
--
ALTER TABLE `group_resource_permissions`
  ADD CONSTRAINT `group_resource_permissions_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_resource_permissions_ibfk_2` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`resource_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_roles`
--
ALTER TABLE `group_roles`
  ADD CONSTRAINT `group_roles_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peak_times`
--
ALTER TABLE `peak_times`
  ADD CONSTRAINT `peak_times_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`schedule_id`) ON DELETE CASCADE;

--
-- Constraints for table `quotas`
--
ALTER TABLE `quotas`
  ADD CONSTRAINT `quotas_ibfk_1` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`resource_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quotas_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quotas_ibfk_3` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`schedule_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reservation_accessories`
--
ALTER TABLE `reservation_accessories`
  ADD CONSTRAINT `reservation_accessories_ibfk_1` FOREIGN KEY (`accessory_id`) REFERENCES `accessories` (`accessory_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_accessories_ibfk_2` FOREIGN KEY (`series_id`) REFERENCES `reservation_series` (`series_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation_color_rules`
--
ALTER TABLE `reservation_color_rules`
  ADD CONSTRAINT `reservation_color_rules_ibfk_1` FOREIGN KEY (`custom_attribute_id`) REFERENCES `custom_attributes` (`custom_attribute_id`) ON DELETE CASCADE;

--
-- Constraints for table `reservation_files`
--
ALTER TABLE `reservation_files`
  ADD CONSTRAINT `reservation_files_ibfk_1` FOREIGN KEY (`series_id`) REFERENCES `reservation_series` (`series_id`) ON DELETE CASCADE;

--
-- Constraints for table `reservation_guests`
--
ALTER TABLE `reservation_guests`
  ADD CONSTRAINT `reservation_guests_ibfk_1` FOREIGN KEY (`reservation_instance_id`) REFERENCES `reservation_instances` (`reservation_instance_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation_instances`
--
ALTER TABLE `reservation_instances`
  ADD CONSTRAINT `reservations_series` FOREIGN KEY (`series_id`) REFERENCES `reservation_series` (`series_id`) ON DELETE CASCADE;

--
-- Constraints for table `reservation_reminders`
--
ALTER TABLE `reservation_reminders`
  ADD CONSTRAINT `reservation_reminders_ibfk_1` FOREIGN KEY (`series_id`) REFERENCES `reservation_series` (`series_id`) ON DELETE CASCADE;

--
-- Constraints for table `reservation_resources`
--
ALTER TABLE `reservation_resources`
  ADD CONSTRAINT `reservation_resources_ibfk_1` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`resource_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_resources_ibfk_2` FOREIGN KEY (`series_id`) REFERENCES `reservation_series` (`series_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation_series`
--
ALTER TABLE `reservation_series`
  ADD CONSTRAINT `reservations_owner` FOREIGN KEY (`owner_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_status` FOREIGN KEY (`status_id`) REFERENCES `reservation_statuses` (`status_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_type` FOREIGN KEY (`type_id`) REFERENCES `reservation_types` (`type_id`) ON UPDATE CASCADE;

--
-- Constraints for table `reservation_users`
--
ALTER TABLE `reservation_users`
  ADD CONSTRAINT `reservation_users_ibfk_1` FOREIGN KEY (`reservation_instance_id`) REFERENCES `reservation_instances` (`reservation_instance_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation_waitlist_requests`
--
ALTER TABLE `reservation_waitlist_requests`
  ADD CONSTRAINT `reservation_waitlist_requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_waitlist_requests_ibfk_2` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`resource_id`) ON DELETE CASCADE;

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `admin_group_id` FOREIGN KEY (`admin_group_id`) REFERENCES `groups` (`group_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`schedule_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resources_ibfk_2` FOREIGN KEY (`resource_type_id`) REFERENCES `resource_types` (`resource_type_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `resources_ibfk_3` FOREIGN KEY (`resource_status_reason_id`) REFERENCES `resource_status_reasons` (`resource_status_reason_id`) ON DELETE SET NULL;

--
-- Constraints for table `resource_accessories`
--
ALTER TABLE `resource_accessories`
  ADD CONSTRAINT `resource_accessories_ibfk_1` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`resource_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resource_accessories_ibfk_2` FOREIGN KEY (`accessory_id`) REFERENCES `accessories` (`accessory_id`) ON DELETE CASCADE;

--
-- Constraints for table `resource_groups`
--
ALTER TABLE `resource_groups`
  ADD CONSTRAINT `resource_groups_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `resource_groups` (`resource_group_id`) ON DELETE CASCADE;

--
-- Constraints for table `resource_group_assignment`
--
ALTER TABLE `resource_group_assignment`
  ADD CONSTRAINT `resource_group_assignment_ibfk_1` FOREIGN KEY (`resource_group_id`) REFERENCES `resource_groups` (`resource_group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resource_group_assignment_ibfk_2` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`resource_id`) ON DELETE CASCADE;

--
-- Constraints for table `resource_type_assignment`
--
ALTER TABLE `resource_type_assignment`
  ADD CONSTRAINT `resource_type_assignment_ibfk_1` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`resource_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resource_type_assignment_ibfk_2` FOREIGN KEY (`resource_type_id`) REFERENCES `resource_types` (`resource_type_id`) ON DELETE CASCADE;

--
-- Constraints for table `saved_reports`
--
ALTER TABLE `saved_reports`
  ADD CONSTRAINT `saved_reports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_groups_admin_group_id` FOREIGN KEY (`admin_group_id`) REFERENCES `groups` (`group_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`layout_id`) REFERENCES `layouts` (`layout_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_blocks`
--
ALTER TABLE `time_blocks`
  ADD CONSTRAINT `time_blocks_ibfk_1` FOREIGN KEY (`layout_id`) REFERENCES `layouts` (`layout_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `user_statuses` (`status_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_email_preferences`
--
ALTER TABLE `user_email_preferences`
  ADD CONSTRAINT `user_email_preferences_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD CONSTRAINT `user_groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD CONSTRAINT `user_preferences_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_resource_permissions`
--
ALTER TABLE `user_resource_permissions`
  ADD CONSTRAINT `user_resource_permissions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_resource_permissions_ibfk_2` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`resource_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_session`
--
ALTER TABLE `user_session`
  ADD CONSTRAINT `user_session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
