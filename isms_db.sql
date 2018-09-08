-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2018 at 02:17 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `acadamic_sessions`
--

CREATE TABLE `acadamic_sessions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `first_term_start` date NOT NULL,
  `first_term_end` date NOT NULL,
  `second_term_start` date NOT NULL,
  `second_term_end` date NOT NULL,
  `third_term_start` date NOT NULL,
  `third_term_end` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acadamic_sessions`
--

INSERT INTO `acadamic_sessions` (`id`, `name`, `first_term_start`, `first_term_end`, `second_term_start`, `second_term_end`, `third_term_start`, `third_term_end`, `created_at`, `updated_at`) VALUES
(1, '2015/2016', '2015-01-01', '2015-03-31', '2015-04-01', '2015-06-30', '2015-07-01', '2016-01-31', '2018-08-16 10:56:32', '0000-00-00 00:00:00'),
(2, '2016/2017', '2016-08-01', '2018-09-30', '2016-10-01', '2016-11-30', '2016-12-01', '2017-01-31', '2018-08-16 11:07:54', '0000-00-00 00:00:00'),
(3, '2017/2018', '2017-08-01', '2017-09-30', '2017-10-01', '2017-11-30', '2017-12-01', '2018-01-31', '2018-08-16 11:08:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_categories`
--

CREATE TABLE `assessment_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `abbreviation` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_categories`
--

INSERT INTO `assessment_categories` (`id`, `name`, `abbreviation`, `created_at`, `updated_at`) VALUES
(1, 'CA', 'CA', '2018-08-16 10:36:27', '0000-00-00 00:00:00'),
(2, 'Exam', 'EX', '2018-08-16 10:36:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `attendance_group` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `batch_id`, `attendance_date`, `status`, `attendance_group`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2018-09-01', 'present', 'student', '2018-09-07 05:31:15', '0000-00-00 00:00:00'),
(2, 5, 1, '2018-09-01', 'present', 'student', '2018-09-07 05:31:15', '0000-00-00 00:00:00'),
(3, 9, 1, '2018-09-01', 'present', 'student', '2018-09-07 05:31:15', '0000-00-00 00:00:00'),
(4, 4, 1, '2018-09-02', 'present', 'student', '2018-09-07 05:31:24', '0000-00-00 00:00:00'),
(5, 5, 1, '2018-09-02', 'late', 'student', '2018-09-07 05:31:29', '0000-00-00 00:00:00'),
(6, 9, 1, '2018-09-02', 'absent', 'student', '2018-09-07 05:31:33', '0000-00-00 00:00:00'),
(7, 4, 1, '2018-09-03', 'late', 'student', '2018-09-07 05:31:41', '0000-00-00 00:00:00'),
(8, 5, 1, '2018-09-03', 'present', 'student', '2018-09-07 05:31:38', '0000-00-00 00:00:00'),
(9, 9, 1, '2018-09-03', 'present', 'student', '2018-09-07 05:31:38', '0000-00-00 00:00:00'),
(10, 4, 1, '2018-09-04', 'present', 'student', '2018-09-07 05:31:57', '0000-00-00 00:00:00'),
(11, 5, 1, '2018-09-04', 'present', 'student', '2018-09-07 05:31:57', '0000-00-00 00:00:00'),
(12, 9, 1, '2018-09-04', 'absent', 'student', '2018-09-07 05:32:02', '0000-00-00 00:00:00'),
(13, 4, 1, '2018-09-05', 'present', 'student', '2018-09-07 05:32:17', '0000-00-00 00:00:00'),
(14, 5, 1, '2018-09-05', 'late', 'student', '2018-09-07 05:32:18', '0000-00-00 00:00:00'),
(15, 9, 1, '2018-09-05', 'present', 'student', '2018-09-07 11:23:46', '0000-00-00 00:00:00'),
(16, 1, 2, '2018-09-01', 'present', 'student', '2018-09-07 05:32:35', '0000-00-00 00:00:00'),
(17, 3, 2, '2018-09-01', 'late', 'student', '2018-09-07 05:32:39', '0000-00-00 00:00:00'),
(18, 6, 2, '2018-09-01', 'present', 'student', '2018-09-07 05:32:35', '0000-00-00 00:00:00'),
(19, 7, 2, '2018-09-01', 'present', 'student', '2018-09-07 05:32:35', '0000-00-00 00:00:00'),
(20, 1, 2, '2018-09-02', 'present', 'student', '2018-09-07 05:32:52', '0000-00-00 00:00:00'),
(21, 3, 2, '2018-09-02', 'present', 'student', '2018-09-07 05:32:52', '0000-00-00 00:00:00'),
(22, 6, 2, '2018-09-02', 'late', 'student', '2018-09-07 05:32:55', '0000-00-00 00:00:00'),
(23, 7, 2, '2018-09-02', 'present', 'student', '2018-09-07 05:32:52', '0000-00-00 00:00:00'),
(24, 1, 2, '2018-09-03', 'present', 'student', '2018-09-07 05:33:09', '0000-00-00 00:00:00'),
(25, 3, 2, '2018-09-03', 'present', 'student', '2018-09-07 05:33:10', '0000-00-00 00:00:00'),
(26, 6, 2, '2018-09-03', 'present', 'student', '2018-09-07 05:33:10', '0000-00-00 00:00:00'),
(27, 7, 2, '2018-09-03', 'present', 'student', '2018-09-07 05:33:10', '0000-00-00 00:00:00'),
(28, 1, 2, '2018-09-04', 'present', 'student', '2018-09-07 05:33:13', '0000-00-00 00:00:00'),
(29, 3, 2, '2018-09-04', 'present', 'student', '2018-09-07 05:33:13', '0000-00-00 00:00:00'),
(30, 6, 2, '2018-09-04', 'present', 'student', '2018-09-07 05:33:13', '0000-00-00 00:00:00'),
(31, 7, 2, '2018-09-04', 'present', 'student', '2018-09-07 05:33:13', '0000-00-00 00:00:00'),
(32, 1, 2, '2018-09-05', 'present', 'student', '2018-09-07 05:33:15', '0000-00-00 00:00:00'),
(33, 3, 2, '2018-09-05', 'present', 'student', '2018-09-07 05:33:15', '0000-00-00 00:00:00'),
(34, 6, 2, '2018-09-05', 'late', 'student', '2018-09-07 05:33:18', '0000-00-00 00:00:00'),
(35, 7, 2, '2018-09-05', 'late', 'student', '2018-09-07 05:33:17', '0000-00-00 00:00:00'),
(36, 4, 1, '2018-09-06', 'present', 'student', '2018-09-07 05:36:50', '0000-00-00 00:00:00'),
(37, 5, 1, '2018-09-06', 'late', 'student', '2018-09-07 05:56:21', '0000-00-00 00:00:00'),
(38, 9, 1, '2018-09-06', 'present', 'student', '2018-09-07 05:36:50', '0000-00-00 00:00:00'),
(39, 3, 1, '2018-09-06', 'late', 'employee', '2018-09-07 06:01:20', '0000-00-00 00:00:00'),
(40, 6, 1, '2018-09-06', 'late', 'employee', '2018-09-07 06:01:21', '0000-00-00 00:00:00'),
(41, 9, 1, '2018-09-06', 'present', 'employee', '2018-09-07 06:00:24', '0000-00-00 00:00:00'),
(42, 3, 1, '2018-09-01', 'present', 'employee', '2018-09-07 06:04:01', '0000-00-00 00:00:00'),
(43, 6, 1, '2018-09-01', 'present', 'employee', '2018-09-07 06:04:02', '0000-00-00 00:00:00'),
(44, 9, 1, '2018-09-01', 'late', 'employee', '2018-09-07 06:03:35', '0000-00-00 00:00:00'),
(45, 3, 1, '2018-09-02', 'absent', 'employee', '2018-09-07 06:04:21', '0000-00-00 00:00:00'),
(46, 6, 1, '2018-09-02', 'late', 'employee', '2018-09-07 06:04:20', '0000-00-00 00:00:00'),
(47, 9, 1, '2018-09-02', 'late', 'employee', '2018-09-07 06:04:24', '0000-00-00 00:00:00'),
(48, 3, 1, '2018-09-03', 'present', 'employee', '2018-09-07 06:04:44', '0000-00-00 00:00:00'),
(49, 6, 1, '2018-09-03', 'present', 'employee', '2018-09-07 06:04:44', '0000-00-00 00:00:00'),
(50, 9, 1, '2018-09-03', 'present', 'employee', '2018-09-07 06:04:44', '0000-00-00 00:00:00'),
(51, 3, 1, '2018-09-04', 'present', 'employee', '2018-09-07 06:04:48', '0000-00-00 00:00:00'),
(52, 6, 1, '2018-09-04', 'present', 'employee', '2018-09-07 06:04:48', '0000-00-00 00:00:00'),
(53, 9, 1, '2018-09-04', 'present', 'employee', '2018-09-07 06:04:48', '0000-00-00 00:00:00'),
(54, 3, 1, '2018-09-05', 'late', 'employee', '2018-09-07 06:05:16', '0000-00-00 00:00:00'),
(55, 6, 1, '2018-09-05', 'present', 'employee', '2018-09-07 06:04:50', '0000-00-00 00:00:00'),
(56, 9, 1, '2018-09-05', 'absent', 'employee', '2018-09-07 06:05:18', '0000-00-00 00:00:00'),
(57, 6, 2, '2018-09-01', 'absent', 'employee', '2018-09-07 06:07:16', '0000-00-00 00:00:00'),
(58, 9, 2, '2018-09-01', 'late', 'employee', '2018-09-07 06:07:00', '0000-00-00 00:00:00'),
(59, 6, 2, '2018-09-02', 'late', 'employee', '2018-09-07 06:07:49', '0000-00-00 00:00:00'),
(60, 9, 2, '2018-09-02', 'present', 'employee', '2018-09-07 06:07:39', '0000-00-00 00:00:00'),
(61, 4, 1, '2018-09-26', 'present', 'student', '2018-09-07 11:27:55', '0000-00-00 00:00:00'),
(62, 5, 1, '2018-09-26', 'late', 'student', '2018-09-07 11:45:58', '0000-00-00 00:00:00'),
(63, 9, 1, '2018-09-26', 'present', 'student', '2018-09-07 11:27:56', '0000-00-00 00:00:00'),
(64, 4, 1, '2018-09-07', 'late', 'student', '2018-09-07 11:42:12', '0000-00-00 00:00:00'),
(65, 5, 1, '2018-09-07', 'late', 'student', '2018-09-07 11:43:24', '0000-00-00 00:00:00'),
(66, 9, 1, '2018-09-07', 'present', 'student', '2018-09-07 11:42:10', '0000-00-00 00:00:00'),
(67, 4, 1, '2018-09-08', 'present', 'student', '2018-09-07 11:42:24', '0000-00-00 00:00:00'),
(68, 5, 1, '2018-09-08', 'present', 'student', '2018-09-07 11:42:25', '0000-00-00 00:00:00'),
(69, 9, 1, '2018-09-08', 'present', 'student', '2018-09-07 11:42:25', '0000-00-00 00:00:00'),
(70, 4, 1, '2018-09-09', 'present', 'student', '2018-09-07 11:43:44', '0000-00-00 00:00:00'),
(71, 5, 1, '2018-09-09', 'present', 'student', '2018-09-07 11:43:44', '0000-00-00 00:00:00'),
(72, 9, 1, '2018-09-09', 'present', 'student', '2018-09-07 11:43:44', '0000-00-00 00:00:00'),
(73, 4, 1, '2018-09-10', 'present', 'student', '2018-09-07 11:45:05', '0000-00-00 00:00:00'),
(74, 5, 1, '2018-09-10', 'present', 'student', '2018-09-07 11:45:05', '0000-00-00 00:00:00'),
(75, 9, 1, '2018-09-10', 'present', 'student', '2018-09-07 11:45:05', '0000-00-00 00:00:00'),
(76, 4, 1, '2018-09-11', 'present', 'student', '2018-09-07 11:45:08', '0000-00-00 00:00:00'),
(77, 5, 1, '2018-09-11', 'present', 'student', '2018-09-07 11:45:08', '0000-00-00 00:00:00'),
(78, 9, 1, '2018-09-11', 'present', 'student', '2018-09-07 11:45:08', '0000-00-00 00:00:00'),
(79, 4, 1, '2018-09-12', 'present', 'student', '2018-09-07 11:45:11', '0000-00-00 00:00:00'),
(80, 5, 1, '2018-09-12', 'present', 'student', '2018-09-07 11:45:11', '0000-00-00 00:00:00'),
(81, 9, 1, '2018-09-12', 'present', 'student', '2018-09-07 11:45:11', '0000-00-00 00:00:00'),
(82, 4, 1, '2018-09-13', 'present', 'student', '2018-09-07 11:45:15', '0000-00-00 00:00:00'),
(83, 5, 1, '2018-09-13', 'present', 'student', '2018-09-07 11:45:15', '0000-00-00 00:00:00'),
(84, 9, 1, '2018-09-13', 'present', 'student', '2018-09-07 11:45:15', '0000-00-00 00:00:00'),
(85, 4, 1, '2018-09-14', 'present', 'student', '2018-09-07 11:45:18', '0000-00-00 00:00:00'),
(86, 5, 1, '2018-09-14', 'present', 'student', '2018-09-07 11:45:18', '0000-00-00 00:00:00'),
(87, 9, 1, '2018-09-14', 'present', 'student', '2018-09-07 11:45:18', '0000-00-00 00:00:00'),
(88, 4, 1, '2018-09-15', 'present', 'student', '2018-09-07 11:45:20', '0000-00-00 00:00:00'),
(89, 5, 1, '2018-09-15', 'present', 'student', '2018-09-07 11:45:20', '0000-00-00 00:00:00'),
(90, 9, 1, '2018-09-15', 'present', 'student', '2018-09-07 11:45:20', '0000-00-00 00:00:00'),
(91, 4, 1, '2018-09-16', 'present', 'student', '2018-09-07 11:45:22', '0000-00-00 00:00:00'),
(92, 5, 1, '2018-09-16', 'present', 'student', '2018-09-07 11:45:22', '0000-00-00 00:00:00'),
(93, 9, 1, '2018-09-16', 'present', 'student', '2018-09-07 11:45:22', '0000-00-00 00:00:00'),
(94, 4, 1, '2018-09-17', 'present', 'student', '2018-09-07 11:45:25', '0000-00-00 00:00:00'),
(95, 5, 1, '2018-09-17', 'present', 'student', '2018-09-07 11:45:25', '0000-00-00 00:00:00'),
(96, 9, 1, '2018-09-17', 'present', 'student', '2018-09-07 11:45:25', '0000-00-00 00:00:00'),
(97, 4, 1, '2018-09-18', 'present', 'student', '2018-09-07 11:45:27', '0000-00-00 00:00:00'),
(98, 5, 1, '2018-09-18', 'present', 'student', '2018-09-07 11:45:27', '0000-00-00 00:00:00'),
(99, 9, 1, '2018-09-18', 'present', 'student', '2018-09-07 11:45:27', '0000-00-00 00:00:00'),
(100, 4, 1, '2018-09-19', 'present', 'student', '2018-09-07 11:45:29', '0000-00-00 00:00:00'),
(101, 5, 1, '2018-09-19', 'present', 'student', '2018-09-07 11:45:29', '0000-00-00 00:00:00'),
(102, 9, 1, '2018-09-19', 'present', 'student', '2018-09-07 11:45:29', '0000-00-00 00:00:00'),
(103, 4, 1, '2018-09-20', 'present', 'student', '2018-09-07 11:45:32', '0000-00-00 00:00:00'),
(104, 5, 1, '2018-09-20', 'present', 'student', '2018-09-07 11:45:32', '0000-00-00 00:00:00'),
(105, 9, 1, '2018-09-20', 'present', 'student', '2018-09-07 11:45:32', '0000-00-00 00:00:00'),
(106, 4, 1, '2018-09-21', 'present', 'student', '2018-09-07 11:45:37', '0000-00-00 00:00:00'),
(107, 5, 1, '2018-09-21', 'present', 'student', '2018-09-07 11:45:37', '0000-00-00 00:00:00'),
(108, 9, 1, '2018-09-21', 'present', 'student', '2018-09-07 11:45:37', '0000-00-00 00:00:00'),
(109, 4, 1, '2018-09-22', 'present', 'student', '2018-09-07 11:45:39', '0000-00-00 00:00:00'),
(110, 5, 1, '2018-09-22', 'present', 'student', '2018-09-07 11:45:39', '0000-00-00 00:00:00'),
(111, 9, 1, '2018-09-22', 'present', 'student', '2018-09-07 11:45:39', '0000-00-00 00:00:00'),
(112, 4, 1, '2018-09-23', 'present', 'student', '2018-09-07 11:45:42', '0000-00-00 00:00:00'),
(113, 5, 1, '2018-09-23', 'present', 'student', '2018-09-07 11:45:42', '0000-00-00 00:00:00'),
(114, 9, 1, '2018-09-23', 'present', 'student', '2018-09-07 11:45:42', '0000-00-00 00:00:00'),
(115, 4, 1, '2018-09-24', 'present', 'student', '2018-09-07 11:45:45', '0000-00-00 00:00:00'),
(116, 5, 1, '2018-09-24', 'present', 'student', '2018-09-07 11:45:45', '0000-00-00 00:00:00'),
(117, 9, 1, '2018-09-24', 'present', 'student', '2018-09-07 11:45:45', '0000-00-00 00:00:00'),
(118, 4, 1, '2018-09-25', 'present', 'student', '2018-09-07 11:45:48', '0000-00-00 00:00:00'),
(119, 5, 1, '2018-09-25', 'present', 'student', '2018-09-07 11:45:48', '0000-00-00 00:00:00'),
(120, 9, 1, '2018-09-25', 'present', 'student', '2018-09-07 11:45:48', '0000-00-00 00:00:00'),
(121, 4, 1, '2018-09-27', 'present', 'student', '2018-09-07 11:46:04', '0000-00-00 00:00:00'),
(122, 5, 1, '2018-09-27', 'present', 'student', '2018-09-07 11:46:04', '0000-00-00 00:00:00'),
(123, 9, 1, '2018-09-27', 'present', 'student', '2018-09-07 11:46:04', '0000-00-00 00:00:00'),
(124, 4, 1, '2018-09-28', 'present', 'student', '2018-09-07 11:46:06', '0000-00-00 00:00:00'),
(125, 5, 1, '2018-09-28', 'present', 'student', '2018-09-07 11:46:06', '0000-00-00 00:00:00'),
(126, 9, 1, '2018-09-28', 'present', 'student', '2018-09-07 11:46:06', '0000-00-00 00:00:00'),
(127, 4, 1, '2018-09-29', 'present', 'student', '2018-09-07 11:46:10', '0000-00-00 00:00:00'),
(128, 5, 1, '2018-09-29', 'present', 'student', '2018-09-07 11:46:10', '0000-00-00 00:00:00'),
(129, 9, 1, '2018-09-29', 'present', 'student', '2018-09-07 11:46:10', '0000-00-00 00:00:00'),
(130, 4, 1, '2018-09-30', 'late', 'student', '2018-09-07 12:01:58', '0000-00-00 00:00:00'),
(131, 5, 1, '2018-09-30', 'late', 'student', '2018-09-07 12:02:01', '0000-00-00 00:00:00'),
(132, 9, 1, '2018-09-30', 'absent', 'student', '2018-09-07 12:02:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Access Bank Plc', '2018-07-31 11:47:07', '0000-00-00 00:00:00'),
(2, 'Citibank Nigeria Limited', '2018-07-31 11:47:07', '0000-00-00 00:00:00'),
(3, 'Diamond Bank Plc', '2018-07-31 11:47:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `bank_name`, `account_name`, `account_number`, `created_at`, `updated_at`) VALUES
(2, '2', 'citi bank', '1232323232', '2018-08-01 04:25:13', '0000-00-00 00:00:00'),
(8, '3', 'now', 'check', '2018-08-01 12:13:17', '0000-00-00 00:00:00'),
(11, '', 'smdf,d4154', '4546543464', '2018-08-17 12:20:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `arm` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `session` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `arm`, `course_id`, `session`, `created_at`, `updated_at`) VALUES
(1, 'MNIS', 1, '2015/2016', '2018-08-15 05:05:23', '0000-00-00 00:00:00'),
(2, 'Test', 2, '2018/2019', '2018-08-10 11:17:19', '0000-00-00 00:00:00'),
(17, 'test', 1, '2018/2019', '2018-08-10 12:23:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `batch_assign_employee`
--

CREATE TABLE `batch_assign_employee` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_assign_employee`
--

INSERT INTO `batch_assign_employee` (`id`, `batch_id`, `employee_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, '2018-08-18 05:03:02', '2018-08-18 05:03:02'),
(2, 1, 6, 1, '2018-08-30 07:00:47', '2018-08-30 07:00:47'),
(3, 1, 9, 1, '2018-09-06 10:04:26', '2018-09-06 10:04:26'),
(9, 2, 6, 1, '2018-09-06 08:19:06', '2018-09-06 08:19:06'),
(10, 2, 9, 1, '2018-09-06 08:19:06', '2018-09-06 08:19:06'),
(11, 17, 6, 1, '2018-09-06 10:12:41', '2018-09-06 10:12:41'),
(12, 17, 9, 2, '2018-09-06 10:12:41', '2018-09-06 10:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_events`
--

CREATE TABLE `calendar_events` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `is_all_day` tinyint(1) NOT NULL,
  `is_holiday` tinyint(1) NOT NULL,
  `is_common` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_events`
--

INSERT INTO `calendar_events` (`id`, `title`, `start`, `end`, `is_all_day`, `is_holiday`, `is_common`, `description`, `created_at`, `updated_at`) VALUES
(1, '14th August', '2018-08-14 00:00:00', '2018-08-15 00:00:00', 0, 1, 1, '14 august event', '2018-08-29 06:28:51', '0000-00-00 00:00:00'),
(4, 'This is test title', '2018-08-30 00:00:00', '2018-08-31 00:00:00', 0, 1, 1, 'test', '2018-08-29 04:28:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `code`, `enable`, `created_at`, `updated_at`) VALUES
(1, 'National certificate in Accoubtancy', 'NCA', 1, '2018-07-26 07:10:16', '0000-00-00 00:00:00'),
(2, 'National certificate in Secreterial Studies', 'NCSS', 0, '2018-08-28 05:16:51', '0000-00-00 00:00:00'),
(3, 'Certificate in Records and information management', 'CRIM', 1, '2018-07-26 07:10:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `countries_list`
--

CREATE TABLE `countries_list` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries_list`
--

INSERT INTO `countries_list` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `demographics`
--

CREATE TABLE `demographics` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demographics`
--

INSERT INTO `demographics` (`id`, `student_id`, `batch_id`, `created_at`, `updated_at`) VALUES
(1, 5, 2, '2018-08-11 07:04:20', '0000-00-00 00:00:00'),
(2, 1, 2, '2018-08-11 07:40:08', '0000-00-00 00:00:00'),
(3, 6, 2, '2018-08-18 07:14:43', '0000-00-00 00:00:00'),
(4, 7, 2, '2018-08-18 07:32:21', '0000-00-00 00:00:00'),
(5, 4, 1, '2018-08-20 05:14:08', '0000-00-00 00:00:00'),
(6, 5, 1, '2018-08-20 05:14:08', '0000-00-00 00:00:00'),
(7, 9, 1, '2018-09-01 08:24:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `abbrevation` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `abbrevation`, `created_at`, `updated_at`) VALUES
(1, 'department1', 'd1', '2018-08-08 06:17:17', '0000-00-00 00:00:00'),
(2, 'department2', 'd2', '2018-08-08 06:19:00', '0000-00-00 00:00:00'),
(3, 'department3', 'd3', '2018-08-08 06:21:01', '0000-00-00 00:00:00'),
(4, 'department4', 'd4', '2018-08-08 06:21:14', '0000-00-00 00:00:00'),
(5, 'department5', 'd5', '2018-08-08 06:21:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `domain_goup`
--

CREATE TABLE `domain_goup` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `learning_domain` varchar(20) NOT NULL,
  `grade_scale_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domain_goup`
--

INSERT INTO `domain_goup` (`id`, `name`, `learning_domain`, `grade_scale_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'General Affective update', 'psychomotor', 7, 'General Affective domain updated', '2018-08-03 12:10:22', '0000-00-00 00:00:00'),
(2, 'test domin', 'psychomotor', 2, 'test domain', '2018-08-03 07:46:52', '0000-00-00 00:00:00'),
(3, 'domain3', 'affective', 6, 'domain3 added', '2018-08-03 11:53:14', '0000-00-00 00:00:00'),
(4, 'domani4 update', 'psychomotor', 7, 'domain4 description', '2018-08-03 12:19:25', '0000-00-00 00:00:00'),
(5, 'Ahmad', 'affective', 2, 'asdf', '2018-08-06 06:42:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `domain_group_indicator`
--

CREATE TABLE `domain_group_indicator` (
  `id` int(11) NOT NULL,
  `domain_group_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domain_group_indicator`
--

INSERT INTO `domain_group_indicator` (`id`, `domain_group_id`, `name`, `code`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'indicator1', 'one', 'one added now', '2018-08-03 10:17:24', '0000-00-00 00:00:00'),
(4, 2, 'indicator5', 'five', 'five added now check', '2018-08-03 11:21:50', '0000-00-00 00:00:00'),
(6, 1, 'indicator3', 'three', 'indicator three added now', '2018-08-03 10:56:52', '0000-00-00 00:00:00'),
(11, 1, 'indicator4', 'four', 'added', '2018-08-03 11:21:13', '0000-00-00 00:00:00'),
(12, 2, 'indicator6', 'six', 'six added now', '2018-08-03 11:22:22', '0000-00-00 00:00:00'),
(13, 3, 'kkkkg', 'hhhhhg', 'mmmmg', '2018-08-03 11:53:14', '0000-00-00 00:00:00'),
(14, 3, 'what', 'is', 'this going on', '2018-08-03 11:54:05', '0000-00-00 00:00:00'),
(19, 4, 'add again', 'domain4', 'domain4 indicator', '2018-08-03 12:18:27', '0000-00-00 00:00:00'),
(20, 4, 'javed', 'wasim', 'javed wasim', '2018-08-03 12:19:18', '0000-00-00 00:00:00'),
(21, 5, 'Ahmad', '33', 'adsf', '2018-08-06 06:42:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `elective_groups`
--

CREATE TABLE `elective_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elective_groups`
--

INSERT INTO `elective_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Test', '2018-08-15 06:18:01', '0000-00-00 00:00:00'),
(2, 'Test1', '2018-08-15 06:18:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `employee_no` varchar(100) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_of_join` date NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `genotype` varchar(5) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `state_of_origin` varchar(100) DEFAULT NULL,
  `lga_of_origin` varchar(100) DEFAULT NULL,
  `mobile_phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address_line` text,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `next_of_kin_name` varchar(100) NOT NULL,
  `next_of_kin_relation` varchar(100) NOT NULL,
  `next_of_kin_phone` varchar(100) NOT NULL,
  `next_of_kin_mobile` varchar(100) NOT NULL,
  `next_of_kin_address_line` text NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `status_updated_at` date NOT NULL,
  `reason` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `username`, `surname`, `first_name`, `middle_name`, `title`, `employee_no`, `date_of_birth`, `date_of_join`, `gender`, `religion`, `photo`, `blood_group`, `category`, `department`, `position`, `marital_status`, `qualification`, `genotype`, `nationality`, `state_of_origin`, `lga_of_origin`, `mobile_phone`, `email`, `phone`, `address_line`, `country`, `state`, `city`, `next_of_kin_name`, `next_of_kin_relation`, `next_of_kin_phone`, `next_of_kin_mobile`, `next_of_kin_address_line`, `bank_name`, `account_name`, `account_number`, `status`, `status_updated_at`, `reason`, `created`, `updated`) VALUES
(1, '', 'Muhammad', 'Sajid', '', 'MR', '123456', '0000-00-00', '0000-00-00', 'male', 'christianity', 'latif-adnan-5b6abdef9173a.jpg', 'A+', 3, 3, 4, 'married', 'DR', NULL, '3', NULL, 'bwp', '', 'admin01@example.com', '', 'test', '167', '8', NULL, 'test', 'test', '03314716888', '03314716888', 'abc', '1', 'current account', '1232323231', 1, '0000-00-00', '', '2018-07-23 10:00:49', '2018-08-18 05:04:33'),
(2, '', 'Anjum', 'Javed', 'Wasim', 'test', '6553322', '0000-00-00', '0000-00-00', 'female', 'islam', NULL, 'AB+', 1, 1, 3, 'married', 'NCE', NULL, 'Select Nationality', NULL, 'punjab', '0331 4716890', 'admin@example.com', '033322222222', 'testting', '', '1', NULL, 'test', '', 'test', 'test', 'test', '6', 'current', '123456789', 1, '0000-00-00', '', '2018-07-23 10:49:43', '2018-08-18 05:03:41'),
(3, '', 'Muhammad', 'Ali', 'Ahmed', 'test', '6553322', '0000-00-00', '0000-00-00', 'male', 'islam', 'latif-adnan-5b6abdef9173a.jpg', 'AB-', 1, 0, 0, 'single', 'PROF', NULL, 'Select Nationality', NULL, 'punjab', '0331 4716890', 'admin+1@example.com', '222222222222', 'xyz', '', '1', NULL, 'test', 'test re', 'test mobile', 'test phone', 'test phone', '12', 'current', '11112323232323232', 1, '0000-00-00', '', '2018-07-23 11:56:24', '2018-08-18 05:04:52'),
(4, '', 'Yousaf', 'Muhammad', 'Ahmed', '', '123456', '0000-00-00', '0000-00-00', '', 'islam', '', '', 3, 3, 2, 'married', '', NULL, 'Select Nationality', NULL, '', '', 'admin+2@example.com', '', '', '', '1', NULL, '', '', '', '', '', '', '', '', 1, '0000-00-00', '', '2018-07-24 05:07:57', '2018-08-18 05:04:07'),
(5, '', 'new', 'admin', 'check', 'test', '6553322', '2000-02-16', '2000-02-16', 'male', 'islam', NULL, 'AB+', 3, 2, 2, 'single', 'PGDE', NULL, '2', NULL, 'punjab', '', 'admin+3@example.com', '', 'test', '167', '9', NULL, 'test', 'test', '03314716888', 'test', 'test', '14', 'sdfsf', '321321321321321321', 0, '2018-08-07', 'test', '2018-08-08 10:56:00', '2018-08-08 11:38:57'),
(6, 'e6', 'Muhammad', 'wasim', 'javed', 'MR', '1234521', '0000-00-00', '0000-00-00', 'male', '', 'muhammad-wasim-5b90e32ee6654.png', '', 0, 0, 0, '', '', NULL, 'Select Nationality', NULL, '', '0331 4716890', 'wasim@gmail.com', '', '', '', '1', NULL, '', '', '', '', '', '', '', '', 1, '0000-00-00', '', '2018-08-29 10:28:35', '2018-09-06 08:19:59'),
(9, 'e9', 'Khalid', 'Muhammad', 'Haider', 'MR', '6553322', '0000-00-00', '2018-08-06', 'male', '', NULL, '', 0, 0, 0, '', '', NULL, 'Select Nationality', NULL, '', '0331 4716891', 'khalid@gmail.com', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', 1, '0000-00-00', '', '2018-08-30 11:29:26', '2018-09-01 08:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `employee_categories`
--

CREATE TABLE `employee_categories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_categories`
--

INSERT INTO `employee_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'category1', '2018-08-08 07:17:31', '0000-00-00 00:00:00'),
(2, 'category2', '2018-08-08 07:17:39', '0000-00-00 00:00:00'),
(3, 'category3', '2018-08-08 07:17:46', '0000-00-00 00:00:00'),
(4, 'category4', '2018-08-08 07:17:52', '0000-00-00 00:00:00'),
(5, 'category5', '2018-08-08 07:20:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `events_groups`
--

CREATE TABLE `events_groups` (
  `id` int(11) NOT NULL,
  `event_groups` varchar(100) NOT NULL,
  `event_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_groups`
--

INSERT INTO `events_groups` (`id`, `event_groups`, `event_id`, `created_at`, `updated_at`) VALUES
(1, 'class-1', 1, '2018-08-28 11:03:31', '0000-00-00 00:00:00'),
(2, 'class-2', 1, '2018-08-28 11:03:31', '0000-00-00 00:00:00'),
(5, 'class-1', 4, '2018-08-29 04:28:12', '0000-00-00 00:00:00'),
(6, 'class-2', 4, '2018-08-29 04:28:13', '0000-00-00 00:00:00'),
(7, 'category-3', 4, '2018-08-29 04:28:13', '0000-00-00 00:00:00'),
(8, 'category-4', 4, '2018-08-29 04:28:13', '0000-00-00 00:00:00'),
(9, 'ecategory-4', 4, '2018-08-29 04:28:13', '0000-00-00 00:00:00'),
(10, 'ecategory-5', 4, '2018-08-29 04:28:13', '0000-00-00 00:00:00'),
(11, 'edepartment-4', 4, '2018-08-29 04:28:13', '0000-00-00 00:00:00'),
(12, 'edepartment-5', 4, '2018-08-29 04:28:13', '0000-00-00 00:00:00'),
(13, 'eposition-1', 4, '2018-08-29 04:28:13', '0000-00-00 00:00:00'),
(14, 'eposition-4', 4, '2018-08-29 04:28:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fee_management`
--

CREATE TABLE `fee_management` (
  `id` int(11) NOT NULL,
  `fee_type_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `due_date` date NOT NULL,
  `amount` varchar(100) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `class_set_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_type`
--

CREATE TABLE `fee_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_type`
--

INSERT INTO `fee_type` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(4, 'Tuition', 'Tuition Fee', '2018-07-31 12:24:20', '0000-00-00 00:00:00'),
(14, 'Boarding', 'Boarding Fee', '2018-08-01 11:39:40', '0000-00-00 00:00:00'),
(15, 'Library', 'Library Fee', '2018-08-01 11:50:39', '0000-00-00 00:00:00'),
(16, 'Development/Maintenance', 'Development/Maintenance', '2018-09-04 11:38:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `grade_scales`
--

CREATE TABLE `grade_scales` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_scales`
--

INSERT INTO `grade_scales` (`id`, `name`, `type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Behavioural Scoresheet', 'behavioural', 'behavioural scoresheet', 'retire', '2018-08-20 06:30:22', '0000-00-00 00:00:00'),
(3, 'javed', 'cognitive', 'dfsdfsdfsd', 'retire', '2018-08-02 11:55:13', '0000-00-00 00:00:00'),
(6, 'new', 'behavioural', 'scale addedhhh', 'active', '2018-08-02 09:52:00', '0000-00-00 00:00:00'),
(7, 'now', 'behavioural', 'check', 'active', '2018-08-02 12:15:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `grade_scale_level`
--

CREATE TABLE `grade_scale_level` (
  `id` int(11) NOT NULL,
  `grade_scale_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `min_percentage` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_scale_level`
--

INSERT INTO `grade_scale_level` (`id`, `grade_scale_id`, `name`, `min_percentage`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 2, 'A', 80, 'Excellent', '2018-08-02 07:20:52', '0000-00-00 00:00:00'),
(2, 2, 'B', 70, 'Very good', '2018-08-02 07:20:52', '0000-00-00 00:00:00'),
(5, 3, 'javed', 100, 'now remaks', '2018-08-02 10:28:38', '0000-00-00 00:00:00'),
(7, 6, 'iiui', 100, 'ooopopopo', '2018-08-02 10:33:34', '0000-00-00 00:00:00'),
(10, 3, 'wasim', 98, 'very good', '2018-08-02 10:50:22', '0000-00-00 00:00:00'),
(11, 7, 'sss', 56, '56 remarksddd', '2018-08-02 12:16:58', '0000-00-00 00:00:00'),
(12, 2, 'C', 60, '', '2018-08-20 06:32:44', '0000-00-00 00:00:00'),
(13, 2, 'D', 50, '', '2018-08-20 06:32:58', '0000-00-00 00:00:00'),
(14, 2, 'E', 40, '', '2018-08-20 06:33:12', '0000-00-00 00:00:00'),
(15, 2, 'F', 50, '', '2018-08-20 06:33:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `guardian_id` int(11) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile_phone` varchar(20) DEFAULT NULL,
  `address_line` text,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `lga` int(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`guardian_id`, `surname`, `first_name`, `last_name`, `middle_name`, `photo`, `title`, `email`, `gender`, `phone`, `mobile_phone`, `address_line`, `country`, `state`, `city`, `lga`, `created_by`, `status`, `relation`, `created`, `updated`) VALUES
(1, 'guardian1', 'one', '', 'guardian', NULL, 'Mr', 'g1@test.com', 'male', '0331425222', '03314716555', '0', '', '', 'bahawalpur', 0, 0, 1, '', '2018-08-07 05:28:50', '2018-08-09 10:23:00'),
(2, 'guardian2', 'afaq', 'wasim', 'sajid', NULL, 'MR', 'javed@gmail.com', 'female', '0331425222', '03314716555', 'sdfdsf', 'Select Nationality', '', 'bahawalpur', 0, 0, 1, '', '2018-08-07 10:09:55', '2018-08-10 06:07:48'),
(4, 'anjum', 'javed', 'wasim', 'yousafs', 'anjum-javed-5b6bf26677ec2.png', 'Mr', 'javed@gmail.com', 'male', '03314716890', '03314716890', 'sdfsdfsdf', '167', '6', 'bahawalpur', 0, 1, 1, '', '2018-08-09 07:51:02', '2018-08-10 06:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `subdomain` varchar(100) NOT NULL,
  `slogan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `name`, `code`, `subdomain`, `slogan`, `email`, `website`, `phone`, `mobile`, `address`, `logo`, `currency`, `country`, `created_at`, `updated_at`) VALUES
(1, 'sdfsdf', 'sdfsdf', 'sdf', 'sdfsdf', 'admin@example.com', '', '', '', '', 'javed-5b6182a8d4e66.jpg', 'ugx', '', '2018-08-02 06:52:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lga_origin`
--

CREATE TABLE `lga_origin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `state_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lga_origin`
--

INSERT INTO `lga_origin` (`id`, `name`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'Aba North', 1, '2018-08-07 05:50:21', '0000-00-00 00:00:00'),
(2, 'Aba South', 1, '2018-08-07 05:50:23', '0000-00-00 00:00:00'),
(3, 'Arochukwu', 1, '2018-08-07 05:50:25', '0000-00-00 00:00:00'),
(4, 'Bende', 1, '2018-08-07 05:50:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(70) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `login_rights_group_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `name`, `email`, `password`, `contact_no`, `last_login`, `login_rights_group_id`, `created_by`, `creation_time`, `status`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$cNEEldLnfkCfj7GgziWjGu2C472JQ3fY6hCkhB5zO0pwAuOhqZk4e', '03001111111', '2018-08-18 10:32:49', 3, 1, '2018-07-10 06:31:57', 1),
(4, 's3', 'test@example.com', '$2y$10$cNEEldLnfkCfj7GgziWjGu2C472JQ3fY6hCkhB5zO0pwAuOhqZk4e', '', '2018-08-18 05:59:47', 2, 1, '2018-08-07 05:27:13', 1),
(5, 's4', 'admin+2@example.com', '$2y$10$sjQJGFwhdGCuXIMo.FNDj.YbPdGtQfJROhTaKDEw2iT0jSQX4gB5q', '', '2018-08-18 05:59:50', 0, 1, '2018-08-07 10:09:24', 1),
(7, 's4', 'admin4@example.com', '$2y$10$sjQJGFwhdGCuXIMo.FNDj.YbPdGtQfJROhTaKDEw2iT0jSQX4gB5q', '', '2018-08-18 05:59:53', 0, 1, '2018-08-09 07:11:46', 1),
(9, 's4', 'javed@gmail.com', '$2y$10$sjQJGFwhdGCuXIMo.FNDj.YbPdGtQfJROhTaKDEw2iT0jSQX4gB5q', '', '2018-08-18 05:59:56', 0, 1, '2018-08-09 07:51:02', 1),
(10, 's5', 'test1@gmail.com', '$2y$10$FjR2zgzv735u1p0NEkVHkuuQ52GhZoZPyYKWeux5nCXt0GDLwJLGO', '', '2018-08-18 05:59:59', 0, 1, '2018-08-11 07:04:20', 1),
(11, 's6', 'ali@gmail.com', '$2y$10$sR2v6VfpeLTO.FQFTeE23.djv5hisED40HwhX.9e.cwqw7mvao9Sa', '', '2018-08-18 07:15:12', 1, 1, '2018-08-18 07:14:43', 1),
(12, 's7', 'now@gmail.com', '$2y$10$kI5hMsNkg2LzFEBDqh7EbOmjapOA4eM/yoAw5ir8qawwUF2gJ0/a6', '', '2018-08-18 07:32:21', 1, 1, '2018-08-18 07:32:21', 1),
(13, 'e6', 'wasim@gmail.com', '$2y$10$b8oWIS.78IdkArGPWXFyNuEUZ6O2YfO.I5rAIP4M41i1FVVvg/dd.', '', '2018-08-29 10:28:36', 5, 1, '2018-08-29 10:28:36', 1),
(16, 'e9', 'khalid@gmail.com', '$2y$10$Tepca2W2JZ5JKvag9Bm7KO5n8SqgoS3lcDbhuZgFuYpamnSqP94bq', '', '2018-08-30 11:29:26', 8, 1, '2018-08-30 11:29:26', 1),
(17, 's9', 's9@test.com', '$2y$10$w1J6T7sutnHsvppz0JAU3..x2rm6h8/vpdotSeupAqObuqWFU2Qp6', '', '2018-09-01 08:24:44', 1, 1, '2018-09-01 08:24:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_rights_group`
--

CREATE TABLE `login_rights_group` (
  `login_rights_group_id` int(11) NOT NULL,
  `menu_group_id` int(11) NOT NULL,
  `other_rights_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_rights_group`
--

INSERT INTO `login_rights_group` (`login_rights_group_id`, `menu_group_id`, `other_rights_group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(5, 4, 5),
(8, 7, 11);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `menu_name` varchar(50) NOT NULL,
  `func_called` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `parent_id`, `menu_name`, `func_called`, `class`, `created_by`, `creation_time`, `status`) VALUES
(1, NULL, 'Students', '', 'fas fa-user-graduate', 1, '2018-08-28 05:29:20', 1),
(2, 1, 'Search', 'students', 'fa fa-search', 1, '2018-07-14 11:04:09', 1),
(3, 1, 'Add Student', 'add_student', 'fas fa-user-plus', 1, '2018-07-16 06:13:23', 1),
(4, NULL, 'Employess', '', 'fa fa-user-circle', 1, '2018-07-10 09:41:39', 1),
(5, 4, 'Search', 'employee', 'fa fa-search', 1, '2018-07-19 05:20:45', 1),
(6, 4, 'Add Employees', 'employee_add', 'fas fa-user-plus', 1, '2018-07-19 08:25:10', 1),
(7, NULL, 'Guardiens', 'guardians', 'fa fa-users', 1, '2018-07-19 08:51:53', 1),
(8, NULL, 'Attendance', '', 'fas fa-clipboard-list', 1, '2018-07-14 07:58:16', 1),
(9, 8, 'Register', 'register', 'fas fa-id-card-alt', 1, '2018-07-20 09:45:24', 1),
(10, 8, 'Reports', 'reports', 'fas fa-file-alt', 1, '2018-07-20 09:45:31', 1),
(11, NULL, 'Finance', '', 'fas fa-user-tie', 1, '2018-07-14 07:58:20', 1),
(12, 11, 'Master Transection', '', '', 1, '2018-07-10 09:43:27', 1),
(13, 11, 'Fees', '', '', 1, '2018-07-12 06:12:00', 1),
(14, 13, 'Fee Managment', 'fee_management', '', 1, '2018-09-04 11:49:19', 1),
(15, 13, 'Fee Transection', '', '', 1, '2018-07-12 06:00:20', 1),
(16, 11, 'Income/Expense', '', '', 1, '2018-07-10 09:48:27', 1),
(17, 11, 'Wallet Transection', '', '', 1, '2018-07-10 09:48:31', 1),
(18, NULL, 'Subjects', 'subjects', 'fa fa-book', 1, '2018-08-15 04:56:10', 1),
(19, NULL, 'Batches', 'batches', 'fa fa-users', 1, '2018-08-10 09:56:06', 1),
(20, NULL, 'Report Cards', '', 'fa fa-chart-line', 1, '2018-07-10 09:50:00', 1),
(21, NULL, 'SMS', 'sms', 'fa fa-comment-alt', 1, '2018-09-01 05:25:43', 1),
(22, NULL, 'Events', '', 'fa fa-calendar-alt', 1, '2018-07-10 09:50:15', 1),
(23, 22, 'Calendar', 'Calendar', '', 1, '2018-08-27 11:19:35', 1),
(24, 22, 'Events', 'events', '', 1, '2018-08-28 05:22:22', 1),
(25, NULL, 'Settings', '', 'fa fa-cogs', 1, '2018-07-10 09:50:31', 1),
(26, 25, 'Institution Details', 'institution_details', '', 1, '2018-07-30 10:55:54', 1),
(27, 25, 'Academic Sessions', 'academic_sessions', '', 1, '2018-07-30 12:02:08', 1),
(28, 25, 'Classes', 'classes', '', 1, '2018-07-30 07:16:59', 1),
(29, 25, 'Class sets', '', '', 1, '2018-07-10 09:51:59', 1),
(30, 25, 'Subject Names', 'subject_name', '', 1, '2018-07-30 10:56:12', 1),
(31, 25, 'Students', '', '', 1, '2018-07-10 09:52:20', 1),
(32, 31, 'Profile Fields', 'student_fields', '', 1, '2018-07-17 06:12:52', 1),
(33, 31, 'Student Categories', 'student_cat', '', 1, '2018-07-28 04:45:21', 1),
(34, 25, 'Employee', '', '', 1, '2018-07-10 09:52:44', 1),
(35, 34, 'Profile Fields', 'employee_profile_fields', '', 1, '2018-07-30 04:28:16', 1),
(36, 34, 'Categories', 'employee_cat', '', 1, '2018-07-30 04:28:30', 1),
(37, 34, 'Departments', 'employee_department', '', 1, '2018-07-30 04:28:39', 1),
(38, 34, 'Positions', 'emp_positions', '', 1, '2018-07-30 04:28:42', 1),
(39, 25, 'Finance', '', '', 1, '2018-07-10 09:53:43', 1),
(40, 39, 'Institution Bank Accounts', 'institution_bank_accounts', '', 1, '2018-07-31 05:27:55', 1),
(41, 39, 'Fee Types', 'fee_type', '', 1, '2018-07-31 09:42:28', 1),
(42, 39, 'Custom payment methods', 'custom_payment_method', '', 1, '2018-07-31 10:14:27', 1),
(43, 39, 'Transaction categories', 'transaction_categories', '', 1, '2018-07-31 10:53:38', 1),
(44, 25, 'GradeBook', '', '', 1, '2018-07-10 09:54:40', 1),
(45, 44, 'Grading Scales', 'grade_scales', '', 1, '2018-08-02 04:37:07', 1),
(46, 44, 'Assessment Categories', 'assessments', '', 1, '2018-08-01 09:52:37', 1),
(47, 44, 'Learning Domains', 'domains', '', 1, '2018-08-03 04:58:43', 1),
(48, 25, 'Reports', '', '', 1, '2018-07-10 09:55:05', 1),
(49, 48, 'Report Card Templates', '', '', 1, '2018-07-10 09:55:10', 1),
(50, 48, 'Comment Bank', '', '', 1, '2018-07-10 09:55:15', 1),
(51, 25, 'General Settings', '', '', 1, '2018-07-10 09:55:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_group`
--

CREATE TABLE `menu_group` (
  `menu_group_id` int(11) NOT NULL,
  `menu_group_name` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_group`
--

INSERT INTO `menu_group` (`menu_group_id`, `menu_group_name`, `created_by`, `creation_time`, `status`) VALUES
(1, 'Students', 1, '2018-07-10 07:29:24', 1),
(2, 'javed wasim', 1, '2018-08-29 09:49:36', 1),
(3, 'Admin', 1, '2018-08-18 10:31:34', 1),
(4, 'wasim javed', 1, '2018-08-29 10:28:35', 1),
(7, 'Muhammad Haider', 1, '2018-08-30 11:29:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_group_detail`
--

CREATE TABLE `menu_group_detail` (
  `menu_group_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_group_detail`
--

INSERT INTO `menu_group_detail` (`menu_group_id`, `menu_id`) VALUES
(1, 1),
(2, 18),
(2, 19),
(2, 20),
(2, 22),
(2, 23),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(3, 39),
(3, 40),
(3, 41),
(3, 42),
(3, 43),
(3, 44),
(3, 45),
(3, 46),
(3, 47),
(3, 48),
(3, 49),
(3, 50),
(3, 51),
(4, 0),
(4, 18),
(4, 19),
(4, 20),
(4, 22),
(4, 23),
(4, 25),
(7, 0),
(7, 18),
(7, 19),
(7, 20),
(7, 22),
(7, 23),
(7, 25),
(7, 11),
(7, 12),
(7, 13),
(7, 14),
(7, 15),
(7, 16),
(7, 17),
(7, 24),
(7, 30),
(7, 21),
(0, 0),
(0, 18),
(0, 19),
(0, 20),
(0, 22),
(0, 23),
(0, 25),
(0, 21),
(3, 8),
(3, 9),
(3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `other_rights`
--

CREATE TABLE `other_rights` (
  `other_rights_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `other_rights_name` varchar(50) NOT NULL,
  `func_called` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_rights`
--

INSERT INTO `other_rights` (`other_rights_id`, `parent_id`, `other_rights_name`, `func_called`, `class`, `created_by`, `creation_time`, `status`) VALUES
(1, 0, '', '', '', 1, '2018-08-30 10:30:52', 1),
(2, 1, 'batch', '', 'create_new_batch', 1, '2018-09-05 10:25:35', 1),
(3, 1, 'batch', '', 'edit_all_batch', 1, '2018-09-05 10:25:35', 1),
(4, 1, 'batch', '', 'view_all_batches', 1, '2018-09-05 10:25:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `other_rights_group`
--

CREATE TABLE `other_rights_group` (
  `other_rights_group_id` int(11) NOT NULL,
  `other_rights_group_name` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_rights_group`
--

INSERT INTO `other_rights_group` (`other_rights_group_id`, `other_rights_group_name`, `created_by`, `creation_time`, `status`) VALUES
(1, 'wasim javed', 1, '2018-08-31 04:40:40', 0),
(2, 'Muhammad Haider', 1, '2018-08-30 11:31:37', 1),
(3, 'Muhammad Haider', 1, '2018-08-30 11:41:44', 0),
(4, 'Muhammad Haider', 1, '2018-08-30 12:14:40', 0),
(5, 'wasim javed', 1, '2018-08-31 11:44:27', 0),
(11, 'Muhammad Haider', 1, '2018-09-05 10:25:09', 1),
(12, 'Javed Wasim', 1, '2018-09-05 10:25:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `other_rights_group_detail`
--

CREATE TABLE `other_rights_group_detail` (
  `other_rights_group_id` int(11) NOT NULL,
  `other_rights_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_rights_group_detail`
--

INSERT INTO `other_rights_group_detail` (`other_rights_group_id`, `other_rights_id`) VALUES
(2, 2),
(2, 3),
(2, 4),
(11, 2),
(11, 3),
(11, 4),
(12, 2),
(12, 3),
(12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `is_incoming` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `description`, `is_incoming`, `created_at`, `updated_at`) VALUES
(1, 'test', 'payment', 1, '2018-08-01 07:41:57', '0000-00-00 00:00:00'),
(5, 'check', 'checking payment', 0, '2018-08-02 04:54:12', '0000-00-00 00:00:00'),
(8, 'wee', 'we are heree', 1, '2018-08-02 05:58:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `abbrevation` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `abbrevation`, `created_at`, `updated_at`) VALUES
(1, 'position1', 'p1', '2018-08-08 07:15:39', '0000-00-00 00:00:00'),
(2, 'position2', 'p2', '2018-08-08 07:15:50', '0000-00-00 00:00:00'),
(3, 'position3', 'p3', '2018-08-08 07:16:00', '0000-00-00 00:00:00'),
(4, 'position4', 'p4', '2018-08-08 07:16:07', '0000-00-00 00:00:00'),
(5, 'position5', 'p5', '2018-08-08 07:16:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profile_fields`
--

CREATE TABLE `profile_fields` (
  `profile_field_id` int(11) NOT NULL,
  `profile_field_type` varchar(50) NOT NULL,
  `photo` tinyint(1) DEFAULT '0',
  `gender` tinyint(1) DEFAULT '0',
  `date_of_birth` tinyint(1) DEFAULT '0',
  `email` tinyint(1) DEFAULT '0',
  `mobile_phone` tinyint(1) DEFAULT '0',
  `phone` tinyint(1) DEFAULT '0',
  `address` tinyint(1) DEFAULT '0',
  `student_category` tinyint(1) DEFAULT '0',
  `religion` tinyint(1) DEFAULT '0',
  `nationality` tinyint(1) DEFAULT '0',
  `state_of_origin` tinyint(1) DEFAULT '0',
  `lga_of_origin` tinyint(1) DEFAULT '0',
  `blood_group` tinyint(1) DEFAULT '0',
  `genotype` tinyint(1) DEFAULT '0',
  `health_info` tinyint(1) DEFAULT '0',
  `guardian_info` tinyint(1) DEFAULT '0',
  `title` tinyint(1) DEFAULT '0',
  `guardian_info_section` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_fields`
--

INSERT INTO `profile_fields` (`profile_field_id`, `profile_field_type`, `photo`, `gender`, `date_of_birth`, `email`, `mobile_phone`, `phone`, `address`, `student_category`, `religion`, `nationality`, `state_of_origin`, `lga_of_origin`, `blood_group`, `genotype`, `health_info`, `guardian_info`, `title`, `guardian_info_section`, `created`, `updated`) VALUES
(1, 'student', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, '2018-07-19 05:08:27', '2018-07-27 07:55:04'),
(2, 'guardian', 0, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2018-07-19 05:01:50', '2018-07-24 06:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `profile_group_detail`
--

CREATE TABLE `profile_group_detail` (
  `id` int(11) NOT NULL,
  `field_name` varchar(100) NOT NULL,
  `add_view` tinyint(1) NOT NULL,
  `list_view` tinyint(1) NOT NULL,
  `profile_setting_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_group_detail`
--

INSERT INTO `profile_group_detail` (`id`, `field_name`, `add_view`, `list_view`, `profile_setting_id`, `created_at`, `updated_at`) VALUES
(1, 'photo', 1, 1, 1, '2018-08-06 04:53:40', '0000-00-00 00:00:00'),
(2, 'gender', 1, 1, 1, '2018-08-06 04:49:02', '0000-00-00 00:00:00'),
(3, 'date_of_birth', 1, 1, 1, '2018-08-06 04:49:02', '0000-00-00 00:00:00'),
(4, 'email', 1, 1, 1, '2018-08-06 04:49:02', '0000-00-00 00:00:00'),
(5, 'mobile_phone', 1, 1, 1, '2018-08-06 04:49:02', '0000-00-00 00:00:00'),
(6, 'phone', 1, 1, 1, '2018-08-06 04:49:02', '0000-00-00 00:00:00'),
(7, 'address', 1, 1, 1, '2018-08-06 04:49:02', '0000-00-00 00:00:00'),
(8, 'student_category', 1, 1, 1, '2018-07-24 05:44:13', '0000-00-00 00:00:00'),
(9, 'religion', 1, 1, 1, '2018-08-06 04:49:02', '0000-00-00 00:00:00'),
(10, 'nationality', 1, 1, 1, '2018-08-06 04:49:02', '0000-00-00 00:00:00'),
(11, 'state_of_origin', 1, 1, 1, '2018-07-24 05:44:13', '0000-00-00 00:00:00'),
(12, 'lga_of_origin', 1, 1, 1, '2018-07-24 05:44:13', '0000-00-00 00:00:00'),
(13, 'blood_group', 1, 1, 1, '2018-08-06 04:49:02', '0000-00-00 00:00:00'),
(14, 'genotype', 1, 1, 1, '2018-07-24 05:44:13', '0000-00-00 00:00:00'),
(15, 'health_info', 1, 1, 1, '2018-07-24 05:44:13', '0000-00-00 00:00:00'),
(16, 'guardian_info', 1, 1, 1, '2018-08-06 04:53:53', '0000-00-00 00:00:00'),
(17, 'title', 1, 1, 1, '2018-08-06 04:53:56', '0000-00-00 00:00:00'),
(18, 'guardian_info_section', 1, 1, 1, '2018-07-24 05:44:14', '0000-00-00 00:00:00'),
(19, 'title', 1, 1, 3, '2018-08-08 07:53:14', '0000-00-00 00:00:00'),
(20, 'photo', 1, 1, 3, '2018-08-08 07:53:16', '0000-00-00 00:00:00'),
(21, 'date_of_join', 1, 1, 3, '2018-08-08 07:53:18', '0000-00-00 00:00:00'),
(22, 'gender', 1, 1, 3, '2018-07-30 02:09:22', '0000-00-00 00:00:00'),
(23, 'date_of_birth', 1, 1, 3, '2018-07-30 01:52:13', '0000-00-00 00:00:00'),
(24, 'email', 1, 1, 3, '2018-07-30 01:52:13', '0000-00-00 00:00:00'),
(25, 'mobile_phone', 1, 1, 3, '2018-07-30 01:51:32', '0000-00-00 00:00:00'),
(26, 'phone', 1, 1, 3, '2018-07-30 01:52:13', '0000-00-00 00:00:00'),
(27, 'address', 1, 1, 3, '2018-08-08 07:53:08', '0000-00-00 00:00:00'),
(28, 'employee_category', 1, 1, 3, '2018-08-08 07:53:05', '0000-00-00 00:00:00'),
(29, 'employee_position', 1, 1, 3, '2018-08-08 07:53:03', '0000-00-00 00:00:00'),
(30, 'employee_department', 1, 1, 3, '2018-08-08 07:53:01', '0000-00-00 00:00:00'),
(31, 'religion', 1, 1, 3, '2018-07-30 01:52:56', '0000-00-00 00:00:00'),
(32, 'nationality', 1, 1, 3, '2018-07-30 01:52:56', '0000-00-00 00:00:00'),
(33, 'blood_group', 1, 1, 3, '2018-07-30 01:52:56', '0000-00-00 00:00:00'),
(34, 'qualification', 1, 1, 3, '2018-07-30 01:52:56', '0000-00-00 00:00:00'),
(35, 'marital_status', 1, 1, 3, '2018-07-30 01:52:56', '0000-00-00 00:00:00'),
(36, 'bank_account_details', 1, 1, 3, '2018-07-30 01:44:48', '0000-00-00 00:00:00'),
(37, 'next_of_kin', 1, 1, 3, '2018-07-30 01:45:30', '0000-00-00 00:00:00'),
(38, 'next_of_kin_mobile', 1, 1, 3, '2018-07-30 01:45:30', '0000-00-00 00:00:00'),
(39, 'relation_next_of_kin', 1, 1, 3, '2018-07-30 01:45:30', '0000-00-00 00:00:00'),
(40, 'next_of_kin_phone', 1, 1, 3, '2018-07-30 01:52:56', '0000-00-00 00:00:00'),
(41, 'next_of_kin_address', 1, 1, 3, '2018-07-30 01:52:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profile_settings`
--

CREATE TABLE `profile_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_settings`
--

INSERT INTO `profile_settings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'student', '2018-07-24 10:31:03', '0000-00-00 00:00:00'),
(2, 'teacher', '2018-07-24 10:31:03', '0000-00-00 00:00:00'),
(3, 'employee', '2018-07-30 05:00:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Employee', '2018-09-01 07:59:44', '0000-00-00 00:00:00'),
(2, 'Student', '2018-09-01 07:59:54', '0000-00-00 00:00:00'),
(3, 'Guardian', '2018-09-01 08:00:09', '0000-00-00 00:00:00'),
(4, 'Class Teacher', '2018-09-06 10:04:54', '0000-00-00 00:00:00'),
(5, 'Administrative', '2018-09-06 10:05:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `selected_recipients`
--

CREATE TABLE `selected_recipients` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipient_group` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selected_recipients`
--

INSERT INTO `selected_recipients` (`id`, `user_id`, `recipient_group`, `created_at`, `updated_at`) VALUES
(1, 6, 'selected_employees', '2018-09-01 09:48:16', '0000-00-00 00:00:00'),
(2, 9, 'selected_employees', '2018-09-01 09:48:19', '0000-00-00 00:00:00'),
(4, 1, 'selected_guardians', '2018-09-01 09:56:18', '0000-00-00 00:00:00'),
(5, 2, 'selected_guardians', '2018-09-01 09:56:23', '0000-00-00 00:00:00'),
(17, 1, 'selected_students', '2018-09-08 05:26:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `sender_name`, `message`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Javed', 'selected students', 'admin', '2018-09-01 11:40:14', '0000-00-00 00:00:00'),
(2, 'javed', 'student guardian', 'admin', '2018-09-01 11:40:51', '0000-00-00 00:00:00'),
(3, 'wasim', 'employee', 'admin', '2018-09-01 11:41:40', '0000-00-00 00:00:00'),
(4, 'javed', 'send message to student guardian', 'admin', '2018-09-04 10:31:35', '0000-00-00 00:00:00'),
(5, 'test', 'test message sent', 'admin', '2018-09-03 06:39:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sms_recipients`
--

CREATE TABLE `sms_recipients` (
  `id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `recipient_group` varchar(100) NOT NULL,
  `sms_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_recipients`
--

INSERT INTO `sms_recipients` (`id`, `recipient_id`, `recipient_group`, `sms_id`, `created_at`, `updated_at`) VALUES
(1, 9, 'selected_students', 1, '2018-09-03 05:20:16', '0000-00-00 00:00:00'),
(2, 1, 'student_guardians', 2, '2018-09-01 11:40:51', '0000-00-00 00:00:00'),
(3, 2, 'student_guardians', 2, '2018-09-01 11:40:51', '0000-00-00 00:00:00'),
(4, 4, 'student_guardians', 2, '2018-09-01 11:40:51', '0000-00-00 00:00:00'),
(5, 6, 'selected_employees', 3, '2018-09-01 11:41:40', '0000-00-00 00:00:00'),
(6, 9, 'selected_employees', 3, '2018-09-01 11:41:41', '0000-00-00 00:00:00'),
(7, 1, 'student_guardians', 4, '2018-09-01 11:43:41', '0000-00-00 00:00:00'),
(8, 2, 'student_guardians', 4, '2018-09-03 05:28:21', '0000-00-00 00:00:00'),
(9, 4, 'selected_students', 4, '2018-09-03 05:28:54', '0000-00-00 00:00:00'),
(10, 6, 'selected_employees', 4, '2018-09-01 11:43:41', '0000-00-00 00:00:00'),
(11, 9, 'selected_employees', 4, '2018-09-03 05:22:04', '0000-00-00 00:00:00'),
(12, 4, 'selected_guardians', 4, '2018-09-03 06:16:16', '0000-00-00 00:00:00'),
(13, 1, 'student_guardians', 5, '2018-09-03 06:39:04', '0000-00-00 00:00:00'),
(14, 2, 'student_guardians', 5, '2018-09-03 06:39:04', '0000-00-00 00:00:00'),
(15, 4, 'student_guardians', 5, '2018-09-03 06:39:04', '0000-00-00 00:00:00'),
(16, 1, 'selected_guardians', 5, '2018-09-03 06:39:04', '0000-00-00 00:00:00'),
(17, 2, 'selected_guardians', 5, '2018-09-03 06:39:04', '0000-00-00 00:00:00'),
(18, 9, 'selected_students', 5, '2018-09-03 06:39:04', '0000-00-00 00:00:00'),
(19, 6, 'selected_employees', 5, '2018-09-03 06:39:04', '0000-00-00 00:00:00'),
(20, 9, 'selected_employees', 5, '2018-09-03 06:39:04', '0000-00-00 00:00:00'),
(28, 3, 'selected_students', 0, '2018-09-05 08:22:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(20) NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `code`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Abia', 'AB', 161, '2018-08-07 06:17:11', '0000-00-00 00:00:00'),
(2, 'Adamawa', 'AK', 161, '2018-08-07 06:17:17', '0000-00-00 00:00:00'),
(3, 'Anambra', 'AN', 161, '2018-08-07 06:17:20', '0000-00-00 00:00:00'),
(4, 'Bauchi', 'BA', 161, '2018-08-07 06:17:23', '0000-00-00 00:00:00'),
(5, 'Baluchistan', 'BA', 167, '2018-08-07 06:39:41', '0000-00-00 00:00:00'),
(6, 'Islamabad', 'IS', 167, '2018-08-07 06:39:46', '0000-00-00 00:00:00'),
(7, 'Northern Areas', 'NA', 167, '2018-08-07 06:39:48', '0000-00-00 00:00:00'),
(8, 'North-West Frontier', 'NW', 167, '2018-08-07 06:39:50', '0000-00-00 00:00:00'),
(9, 'Punjab', 'PB', 167, '2018-08-07 06:39:52', '0000-00-00 00:00:00'),
(10, 'Sind', 'SD', 167, '2018-08-07 06:39:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'active', '2018-08-13 09:47:47', '0000-00-00 00:00:00'),
(2, 'graduation', '2018-08-13 09:47:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `guardian_id` int(11) DEFAULT NULL,
  `relation_with_student` varchar(100) DEFAULT NULL,
  `surname` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `admission_no` varchar(100) NOT NULL,
  `admission_date` date NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `genotype` varchar(5) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `state_of_origin` varchar(100) DEFAULT NULL,
  `lga_of_origin` varchar(100) DEFAULT NULL,
  `batch_no` varchar(255) NOT NULL,
  `student_category` varchar(255) DEFAULT NULL,
  `mobile_phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address_line` text,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `status_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_day_in_batch` date NOT NULL,
  `reason_to_leave_batch` text NOT NULL,
  `reason` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `username`, `guardian_id`, `relation_with_student`, `surname`, `first_name`, `last_name`, `admission_no`, `admission_date`, `date_of_birth`, `gender`, `religion`, `photo`, `blood_group`, `genotype`, `nationality`, `state_of_origin`, `lga_of_origin`, `batch_no`, `student_category`, `mobile_phone`, `email`, `phone`, `address_line`, `country`, `state`, `city`, `status`, `status_updated_at`, `last_day_in_batch`, `reason_to_leave_batch`, `reason`, `created`, `updated`) VALUES
(1, 's1', NULL, NULL, 'Anjum', 'Wasim', 'Javed', 'MCS-110', '0000-00-00', '0000-00-00', 'Male', 'Christianity', NULL, '', '', '161', '1', '3', '2', '', '03314716890', '', '', 'abc', 'PW', '4', 'bahawalpur', 1, '2018-09-03 05:42:33', '2018-08-15', 'test', 'test', '2018-08-06 08:07:38', '2018-09-03 05:42:33'),
(3, 's3', NULL, NULL, 'Muhammad', 'Afaq', 'Sajid', 'MCS-110', '2018-08-27', '2018-08-06', 'Male', 'Islam', NULL, '', '', '', '1', '1', '2', '', '03314716890', 'test@example.com', '', 'abc', 'PK', '5', 'bahawalpur', 1, '2018-09-03 05:42:31', '0000-00-00', '', '', '2018-08-07 05:27:13', '2018-09-03 05:42:31'),
(4, 's4', NULL, NULL, 'Muhammad', 'sharjeel', 'khan', 'MCS-110', '2018-08-22', '2018-08-28', '', '', NULL, '', '', '', '1', '1', '1', '', '03314716890', 'admin+2@example.com', '', 'test address line', '', '5', 'bahawalpur', 1, '2018-09-03 05:42:29', '0000-00-00', '', '', '2018-08-09 07:11:46', '2018-09-03 05:42:29'),
(5, 's5', NULL, NULL, 'Muhammad', 'Yaqoob', 'Dewan', 'BS-CS-110', '2018-08-21', '2018-09-05', '', '', NULL, '', '', '', '1', '1', '1', '', '03314716890', 'test1@gmail.com', '', '', '', '1', '', 1, '2018-09-03 05:42:27', '2018-08-15', 'test', '', '2018-08-11 07:04:20', '2018-09-03 05:42:27'),
(6, 's6', NULL, NULL, 'Muhammad', 'Ali', 'Ahmed', '123456', '2018-08-01', '2018-08-15', 'Male', 'Islam', 'muhammad-ali-5b77c76308b09.png', 'A-', 'SS', '167', '5', '1', '2', '', '03314716890', 'ali@gmail.com', '03314716890', 'abc', 'PK', '9', 'bahawalpur', 1, '2018-09-03 05:42:25', '0000-00-00', '', '', '2018-08-18 07:14:43', '2018-09-03 05:42:25'),
(7, 's7', NULL, NULL, 'Test', 'user', 'now', '123456', '0000-00-00', '0000-00-00', 'Male', 'Islam', NULL, '', '', '167', '5', '', '2', '', '03314716890', 'now@gmail.com', '', 'abc', '161', '', 'bahawalpur', 1, '2018-09-03 05:42:22', '0000-00-00', '', '', '2018-08-18 07:32:21', '2018-09-03 05:42:22'),
(9, 's9', NULL, NULL, 'student', 'fname', 'mlname', '123456', '0000-00-00', '0000-00-00', '', '', NULL, '', 'AA', '167', '6', '1', '1', '', '03314716890', 's9@test.com', '', 'xyz', 'AL', '4', 'bwp', 1, '2018-09-01 08:34:11', '0000-00-00', '', '', '2018-09-01 08:24:44', '2018-09-01 08:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `student_categories`
--

CREATE TABLE `student_categories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_categories`
--

INSERT INTO `student_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(2, 'Category3', '2018-08-28 04:45:47', '0000-00-00 00:00:00'),
(3, 'Category4', '2018-08-28 04:45:59', '0000-00-00 00:00:00'),
(4, 'Category2', '2018-08-28 04:45:32', '0000-00-00 00:00:00'),
(5, 'Category1', '2018-08-28 04:45:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_fee`
--

CREATE TABLE `student_fee` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `batch_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `amount` double NOT NULL,
  `amount_paid` double NOT NULL,
  `status` varchar(20) NOT NULL,
  `method` varchar(20) NOT NULL,
  `balance` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fee`
--

INSERT INTO `student_fee` (`id`, `student_id`, `title`, `description`, `date`, `batch_id`, `discount`, `amount`, `amount_paid`, `status`, `method`, `balance`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'afaq sajid', 'Lorem ipsum dolor sit amet, consectetur ', '2018-09-05', 2, 0, 700, 700, 'completed', 'cash', 0, 1, '2018-09-08 12:06:34', '0000-00-00 00:00:00'),
(2, 5, 'yaqoob payment', 'yaqoob payment', '2018-09-20', 1, 0, 1500, 1500, 'completed', 'cash', 0, 1, '2018-09-08 12:12:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE `student_grades` (
  `id` int(11) NOT NULL,
  `grade_scale_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_behavioural_score` text NOT NULL,
  `term_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_grades`
--

INSERT INTO `student_grades` (`id`, `grade_scale_id`, `student_id`, `student_behavioural_score`, `term_id`, `created_at`, `updated_at`) VALUES
(1, 2, 5, '{\n    \"student_id\": \"5\",\n    \"grade_scale_id\": \"2\",\n    \"term_id\": \"3\",\n    \"punctuality\": \"2\",\n    \"assignments\": \"1\",\n    \"participation\": \"13\",\n    \"relationship\": \"12\",\n    \"neatness\": \"1\",\n    \"sense_of_responsibility\": \"13\",\n    \"religious_activities\": \"1\",\n    \"self_control\": \"1\",\n    \"obedience\": \"1\",\n    \"participation_in_social_activities\": \"1\",\n    \"honesty\": \"1\",\n    \"politeness\": \"2\",\n    \"attentiveness\": \"12\",\n    \"community_spirit\": \"1\",\n    \"initiative\": \"1\"\n}', 1, '2018-08-27 06:56:55', '0000-00-00 00:00:00'),
(2, 2, 4, '{\n    \"student_id\": \"4\",\n    \"grade_scale_id\": \"2\",\n    \"term_id\": \"1\",\n    \"punctuality\": \"12\",\n    \"assignments\": \"14\",\n    \"participation\": \"15\",\n    \"relationship\": \"13\",\n    \"neatness\": \"14\",\n    \"sense_of_responsibility\": \"2\",\n    \"religious_activities\": \"2\",\n    \"self_control\": \"13\",\n    \"obedience\": \"12\",\n    \"participation_in_social_activities\": \"15\",\n    \"honesty\": \"12\",\n    \"politeness\": \"2\",\n    \"attentiveness\": \"13\",\n    \"community_spirit\": \"1\",\n    \"initiative\": \"2\"\n}', 1, '2018-08-20 08:15:26', '0000-00-00 00:00:00'),
(3, 2, 5, '{\n    \"student_id\": \"5\",\n    \"grade_scale_id\": \"2\",\n    \"term_id\": \"3\",\n    \"punctuality\": \"13\",\n    \"assignments\": \"1\",\n    \"participation\": \"13\",\n    \"relationship\": \"12\",\n    \"neatness\": \"1\",\n    \"sense_of_responsibility\": \"13\",\n    \"religious_activities\": \"1\",\n    \"self_control\": \"1\",\n    \"obedience\": \"1\",\n    \"participation_in_social_activities\": \"1\",\n    \"honesty\": \"1\",\n    \"politeness\": \"2\",\n    \"attentiveness\": \"12\",\n    \"community_spirit\": \"1\",\n    \"initiative\": \"1\"\n}', 3, '2018-08-27 06:57:31', '0000-00-00 00:00:00'),
(4, 2, 5, '{\n    \"student_id\": \"5\",\n    \"grade_scale_id\": \"2\",\n    \"term_id\": \"2\",\n    \"punctuality\": \"1\",\n    \"assignments\": \"12\",\n    \"participation\": \"14\",\n    \"relationship\": \"14\",\n    \"neatness\": \"12\",\n    \"sense_of_responsibility\": \"2\",\n    \"religious_activities\": \"13\",\n    \"self_control\": \"15\",\n    \"obedience\": \"12\",\n    \"participation_in_social_activities\": \"2\",\n    \"honesty\": \"12\",\n    \"politeness\": \"1\",\n    \"attentiveness\": \"2\",\n    \"community_spirit\": \"12\",\n    \"initiative\": \"12\"\n}', 2, '2018-08-27 07:39:04', '0000-00-00 00:00:00'),
(5, 2, 6, '{\n    \"student_id\": \"6\",\n    \"grade_scale_id\": \"2\",\n    \"term_id\": \"2\",\n    \"punctuality\": \"1\",\n    \"assignments\": \"12\",\n    \"participation\": \"2\",\n    \"relationship\": \"12\",\n    \"neatness\": \"1\",\n    \"sense_of_responsibility\": \"1\",\n    \"religious_activities\": \"2\",\n    \"self_control\": \"12\",\n    \"obedience\": \"1\",\n    \"participation_in_social_activities\": \"13\",\n    \"honesty\": \"14\",\n    \"politeness\": \"15\",\n    \"attentiveness\": \"15\",\n    \"community_spirit\": \"15\",\n    \"initiative\": \"13\"\n}', 2, '2018-09-06 10:19:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_guardians`
--

CREATE TABLE `student_guardians` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `guardian_id` int(11) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `emergency_contact` tinyint(1) NOT NULL,
  `is_authorized` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_guardians`
--

INSERT INTO `student_guardians` (`id`, `student_id`, `guardian_id`, `relation`, `emergency_contact`, `is_authorized`, `created_at`, `updated_at`) VALUES
(8, 3, 2, 'now', 1, 1, '2018-08-10 06:18:26', '0000-00-00 00:00:00'),
(9, 3, 1, 'test', 1, 1, '2018-08-09 06:05:09', '0000-00-00 00:00:00'),
(10, 4, 3, 'guardian', 1, 1, '2018-08-09 07:35:33', '0000-00-00 00:00:00'),
(11, 4, 4, '', 0, 0, '2018-08-09 07:51:02', '0000-00-00 00:00:00'),
(12, 4, 1, 'test', 0, 0, '2018-08-09 07:51:14', '0000-00-00 00:00:00'),
(13, 4, 2, 'check', 0, 0, '2018-08-10 06:18:26', '0000-00-00 00:00:00'),
(14, 5, 4, 'test', 0, 0, '2018-08-11 07:04:42', '0000-00-00 00:00:00'),
(15, 6, 4, 'Father', 1, 1, '2018-08-18 07:16:36', '0000-00-00 00:00:00'),
(16, 7, 1, 'test', 0, 0, '2018-08-18 07:32:30', '0000-00-00 00:00:00'),
(17, 5, 1, 'test', 1, 1, '2018-09-01 08:13:50', '0000-00-00 00:00:00'),
(18, 5, 2, 'Father', 1, 1, '2018-09-01 08:14:05', '0000-00-00 00:00:00'),
(19, 1, 1, 'test', 1, 1, '2018-09-01 08:17:06', '0000-00-00 00:00:00'),
(20, 1, 2, 'test', 1, 1, '2018-09-01 08:17:12', '0000-00-00 00:00:00'),
(21, 9, 4, 'Father', 1, 1, '2018-09-01 08:24:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'AGRICULTURAL SCIENCE', 'ASC', '2018-08-27 10:09:39', '0000-00-00 00:00:00'),
(2, 'ALGEBRA', '', '2018-08-15 07:32:00', '0000-00-00 00:00:00'),
(3, 'ANIMAL', '', '2018-08-15 07:32:00', '0000-00-00 00:00:00'),
(4, 'ARABIC', '', '2018-08-15 07:32:00', '0000-00-00 00:00:00'),
(5, 'AZKAR', '', '2018-08-15 07:32:00', '0000-00-00 00:00:00'),
(6, 'BASIC SCIENCE', '', '2018-08-15 07:32:00', '0000-00-00 00:00:00'),
(7, 'BIOLOGY', '', '2018-08-15 07:32:00', '0000-00-00 00:00:00'),
(8, 'BUSINESS STUDIES', '', '2018-08-15 07:32:00', '0000-00-00 00:00:00'),
(9, 'CATERING CRAFT', '', '2018-08-15 07:32:00', '0000-00-00 00:00:00'),
(10, 'GENERAL KNOWLEDGE', '', '2018-08-15 07:32:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_detail`
--

CREATE TABLE `subjects_detail` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `max_weekly_class` int(11) NOT NULL,
  `elective_group_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects_detail`
--

INSERT INTO `subjects_detail` (`id`, `subject_id`, `max_weekly_class`, `elective_group_id`, `batch_id`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 0, 2, '2018-08-15 10:32:47', '0000-00-00 00:00:00'),
(3, 7, 3, 1, 17, '2018-08-15 09:37:31', '0000-00-00 00:00:00'),
(5, 5, 0, 1, 1, '2018-08-15 10:41:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subject_assessments`
--

CREATE TABLE `subject_assessments` (
  `id` int(11) NOT NULL,
  `subject_detail_id` int(11) NOT NULL,
  `assessment_category_id` int(11) NOT NULL,
  `assessment_name` varchar(100) NOT NULL,
  `abbreviation` varchar(20) NOT NULL,
  `points` varchar(10) NOT NULL,
  `extra_points` varchar(10) NOT NULL,
  `due_date` date NOT NULL,
  `include_final_grade` tinyint(1) NOT NULL,
  `publish` varchar(20) NOT NULL,
  `score_display_as` varchar(20) NOT NULL,
  `publish_score` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_assessments`
--

INSERT INTO `subject_assessments` (`id`, `subject_detail_id`, `assessment_category_id`, `assessment_name`, `abbreviation`, `points`, `extra_points`, `due_date`, `include_final_grade`, `publish`, `score_display_as`, `publish_score`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Fist Term', '1st', '10', '10', '2018-09-30', 1, 'due_date', 'points', 1, 'tests', '2018-08-17 11:54:21', '0000-00-00 00:00:00'),
(2, 1, 1, 'Second Term', '2nd', '20', '10', '2018-10-31', 1, 'Please Select', 'Please Select', 1, 'test', '2018-08-17 12:21:03', '0000-00-00 00:00:00'),
(3, 1, 2, 'Final', 'final', '60', '0', '2018-12-31', 1, 'points', '', 1, '', '2018-08-17 05:03:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subject_assign_employee`
--

CREATE TABLE `subject_assign_employee` (
  `id` int(11) NOT NULL,
  `subject_detail_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_assign_employee`
--

INSERT INTO `subject_assign_employee` (`id`, `subject_detail_id`, `employee_id`, `role_id`, `created_at`, `updated_at`) VALUES
(11, 3, 2, 1, '2018-08-16 05:15:43', '0000-00-00 00:00:00'),
(26, 5, 1, 1, '2018-08-16 06:02:20', '0000-00-00 00:00:00'),
(27, 5, 3, 1, '2018-08-16 06:02:20', '0000-00-00 00:00:00'),
(28, 5, 5, 1, '2018-08-16 06:02:20', '0000-00-00 00:00:00'),
(35, 1, 2, 1, '2018-08-16 07:19:26', '0000-00-00 00:00:00'),
(36, 1, 4, 1, '2018-08-16 07:19:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `temp_domain_group_indicator`
--

CREATE TABLE `temp_domain_group_indicator` (
  `id` int(11) NOT NULL,
  `domain_group_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_categories`
--

CREATE TABLE `transaction_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_categories`
--

INSERT INTO `transaction_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(4, 'tt', 'ttt', '2018-07-31 12:24:20', '0000-00-00 00:00:00'),
(5, 'new', 'trnasaction', '2018-07-31 12:25:31', '0000-00-00 00:00:00'),
(7, 'ddd', '  ggghy', '2018-08-01 11:53:12', '0000-00-00 00:00:00'),
(8, 'sdfsdsfg', '  sdfsdf', '2018-08-07 11:57:42', '0000-00-00 00:00:00'),
(9, 'sdfsdsfg', '  sdfsdf', '2018-08-07 11:57:51', '0000-00-00 00:00:00'),
(10, 'sdfsdsfg', '  sdfsdf', '2018-08-07 12:02:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_priviliges`
--

CREATE TABLE `user_priviliges` (
  `id` int(11) NOT NULL,
  `menu_group_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_priviliges`
--

INSERT INTO `user_priviliges` (`id`, `menu_group_id`, `menu_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 2, 24, 2, '2018-08-18 09:54:07', '0000-00-00 00:00:00'),
(2, 2, 25, 2, '2018-08-18 10:28:49', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acadamic_sessions`
--
ALTER TABLE `acadamic_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_categories`
--
ALTER TABLE `assessment_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_assign_employee`
--
ALTER TABLE `batch_assign_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_events`
--
ALTER TABLE `calendar_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries_list`
--
ALTER TABLE `countries_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demographics`
--
ALTER TABLE `demographics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domain_goup`
--
ALTER TABLE `domain_goup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domain_group_indicator`
--
ALTER TABLE `domain_group_indicator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elective_groups`
--
ALTER TABLE `elective_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_categories`
--
ALTER TABLE `employee_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_groups`
--
ALTER TABLE `events_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_management`
--
ALTER TABLE `fee_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_type`
--
ALTER TABLE `fee_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_scales`
--
ALTER TABLE `grade_scales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_scale_level`
--
ALTER TABLE `grade_scale_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`guardian_id`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lga_origin`
--
ALTER TABLE `lga_origin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `login_rights_group`
--
ALTER TABLE `login_rights_group`
  ADD PRIMARY KEY (`login_rights_group_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_group`
--
ALTER TABLE `menu_group`
  ADD PRIMARY KEY (`menu_group_id`);

--
-- Indexes for table `other_rights`
--
ALTER TABLE `other_rights`
  ADD PRIMARY KEY (`other_rights_id`);

--
-- Indexes for table `other_rights_group`
--
ALTER TABLE `other_rights_group`
  ADD PRIMARY KEY (`other_rights_group_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_fields`
--
ALTER TABLE `profile_fields`
  ADD PRIMARY KEY (`profile_field_id`);

--
-- Indexes for table `profile_group_detail`
--
ALTER TABLE `profile_group_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_settings`
--
ALTER TABLE `profile_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selected_recipients`
--
ALTER TABLE `selected_recipients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_recipients`
--
ALTER TABLE `sms_recipients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_categories`
--
ALTER TABLE `student_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fee`
--
ALTER TABLE `student_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_guardians`
--
ALTER TABLE `student_guardians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects_detail`
--
ALTER TABLE `subjects_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_assessments`
--
ALTER TABLE `subject_assessments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_assign_employee`
--
ALTER TABLE `subject_assign_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_domain_group_indicator`
--
ALTER TABLE `temp_domain_group_indicator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_categories`
--
ALTER TABLE `transaction_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_priviliges`
--
ALTER TABLE `user_priviliges`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acadamic_sessions`
--
ALTER TABLE `acadamic_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assessment_categories`
--
ALTER TABLE `assessment_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `batch_assign_employee`
--
ALTER TABLE `batch_assign_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `calendar_events`
--
ALTER TABLE `calendar_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries_list`
--
ALTER TABLE `countries_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `demographics`
--
ALTER TABLE `demographics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `domain_goup`
--
ALTER TABLE `domain_goup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `domain_group_indicator`
--
ALTER TABLE `domain_group_indicator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `elective_groups`
--
ALTER TABLE `elective_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee_categories`
--
ALTER TABLE `employee_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events_groups`
--
ALTER TABLE `events_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fee_management`
--
ALTER TABLE `fee_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_type`
--
ALTER TABLE `fee_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `grade_scales`
--
ALTER TABLE `grade_scales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `grade_scale_level`
--
ALTER TABLE `grade_scale_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `guardian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lga_origin`
--
ALTER TABLE `lga_origin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `login_rights_group`
--
ALTER TABLE `login_rights_group`
  MODIFY `login_rights_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `menu_group`
--
ALTER TABLE `menu_group`
  MODIFY `menu_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `other_rights`
--
ALTER TABLE `other_rights`
  MODIFY `other_rights_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `other_rights_group`
--
ALTER TABLE `other_rights_group`
  MODIFY `other_rights_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile_fields`
--
ALTER TABLE `profile_fields`
  MODIFY `profile_field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile_group_detail`
--
ALTER TABLE `profile_group_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `profile_settings`
--
ALTER TABLE `profile_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `selected_recipients`
--
ALTER TABLE `selected_recipients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sms_recipients`
--
ALTER TABLE `sms_recipients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_categories`
--
ALTER TABLE `student_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_fee`
--
ALTER TABLE `student_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_grades`
--
ALTER TABLE `student_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_guardians`
--
ALTER TABLE `student_guardians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects_detail`
--
ALTER TABLE `subjects_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject_assessments`
--
ALTER TABLE `subject_assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_assign_employee`
--
ALTER TABLE `subject_assign_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `temp_domain_group_indicator`
--
ALTER TABLE `temp_domain_group_indicator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_categories`
--
ALTER TABLE `transaction_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_priviliges`
--
ALTER TABLE `user_priviliges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
