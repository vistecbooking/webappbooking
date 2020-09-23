-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2018 at 03:08 PM
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
-- Table structure for table `positions`
--

CREATE TABLE `positions` ( 
    `position_id` INT NOT NULL AUTO_INCREMENT , 
    `name` varchar(255) NOT NULL , 
    PRIMARY KEY (`position_id`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Alter table `users`
--

ALTER TABLE `users` 
CHANGE `timezone` `timezone` VARCHAR(85) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Asia/Bangkok', 
CHANGE `language` `language` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'en_us';

--
-- Alter table `users`
--

ALTER TABLE `users` 
ADD `advisor_name` VARCHAR(255) NULL AFTER `credit_count`, 
ADD `profile_img` VARCHAR(255) NULL AFTER `advisor_name`, 
ADD `nickname` VARCHAR(100) NULL AFTER `profile_img`, 
ADD `line_ID` VARCHAR(100) NULL AFTER `nickname`, 
ADD `student_ID` VARCHAR(100) NULL AFTER `line_ID`;

--
-- Alter table `users`
--

ALTER TABLE `users` CHANGE `position` `position_id` INT NULL DEFAULT NULL;

--
-- Update table `users`
--

UPDATE `users` SET `position_id`= NULL;

--
-- Alter table `users`
--

ALTER TABLE `users` 
ADD CONSTRAINT `users_positions` 
FOREIGN KEY (`position_id`) 
REFERENCES `positions`(`position_id`) 
ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Alter table `announcements`
--
ALTER TABLE `announcements` ADD COLUMN start_time VARCHAR(20); 
ALTER TABLE `announcements` ADD COLUMN end_time VARCHAR(20); 
ALTER TABLE `announcements` ADD COLUMN update_date datetime NULL DEFAULT current_timestamp; 
ALTER TABLE `announcements` ADD COLUMN cancel_reason VARCHAR(255); 
ALTER TABLE `announcements` ADD COLUMN status_deleted int;

UPDATE `announcements` SET `update_date`= NULL;

ALTER TABLE `users` ADD `is_admin` BOOLEAN NOT NULL DEFAULT FALSE AFTER `student_ID`;