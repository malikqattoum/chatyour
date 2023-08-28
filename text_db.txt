-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2023 at 09:00 PM
-- Server version: 10.6.13-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatyour_toto`
--

-- --------------------------------------------------------

--
-- Table structure for table `gr_audio_player`
--

CREATE TABLE `gr_audio_player` (
  `audio_content_id` bigint(20) NOT NULL,
  `audio_title` varchar(100) NOT NULL,
  `audio_description` varchar(191) NOT NULL,
  `audio_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Radio 2 = Playlist',
  `radio_stream_url` varchar(191) NOT NULL,
  `streaming_server` varchar(20) NOT NULL DEFAULT 'other',
  `disabled` int(11) NOT NULL DEFAULT 0,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_badges`
--

CREATE TABLE `gr_badges` (
  `badge_id` bigint(20) NOT NULL,
  `string_constant` varchar(191) NOT NULL,
  `badge_category` varchar(20) NOT NULL DEFAULT 'profile',
  `disabled` int(11) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_badges_assigned`
--

CREATE TABLE `gr_badges_assigned` (
  `badge_assigned_id` bigint(20) NOT NULL,
  `badge_id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `assigned_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_complaints`
--

CREATE TABLE `gr_complaints` (
  `complaint_id` bigint(20) NOT NULL,
  `reason` varchar(20) NOT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `group_message_id` bigint(20) DEFAULT NULL,
  `private_chat_message_id` bigint(20) DEFAULT NULL,
  `comments_by_complainant` text NOT NULL,
  `complainant_user_id` bigint(20) DEFAULT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Under Review\r\n1 = Action Taken\r\n2 = Rejected',
  `reviewer_user_id` bigint(20) DEFAULT NULL,
  `comments_by_reviewer` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_cron_jobs`
--

CREATE TABLE `gr_cron_jobs` (
  `cron_job_id` bigint(20) NOT NULL,
  `cron_job` varchar(100) NOT NULL,
  `cron_job_access_code` varchar(20) NOT NULL,
  `cron_job_parameters` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `last_run_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_css_variables`
--

CREATE TABLE `gr_css_variables` (
  `css_variable_id` bigint(20) NOT NULL,
  `css_variable` varchar(100) NOT NULL,
  `css_variable_value` varchar(100) NOT NULL,
  `color_scheme` varchar(20) NOT NULL DEFAULT 'light_mode',
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_css_variables`
--

INSERT INTO `gr_css_variables` (`css_variable_id`, `css_variable`, `css_variable_value`, `color_scheme`, `updated_on`) VALUES
(1, 'chat-page-primary-bg-color', '#F7F9FB', 'light_mode', '2023-05-15 14:17:14'),
(2, 'chat-page-primary-font-size', '14px', 'light_mode', '2023-05-15 14:17:14'),
(3, 'side-navigation-primary-bg-color', '#F7F9FB', 'light_mode', '2023-05-15 14:17:14'),
(4, 'side-navigation-secondary-bg-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(5, 'side-navigation-tertiary-bg-color', '#EFF1F3', 'light_mode', '2023-05-15 14:17:14'),
(6, 'side-navigation-quaternary-bg-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(7, 'side-navigation-primary-text-color', '#828282', 'light_mode', '2023-05-15 14:17:14'),
(8, 'side-navigation-secondary-text-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(9, 'side-navigation-tertiary-text-color', '#9C27B0', 'light_mode', '2023-05-15 14:17:14'),
(10, 'side-navigation-quaternary-text-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(11, 'side-navigation-primary-border-color', '#DFE7EF', 'light_mode', '2023-05-15 14:17:14'),
(12, 'side-navigation-primary-font-size', '14px', 'light_mode', '2023-05-15 14:17:14'),
(13, 'side-navigation-secondary-font-size', '13px', 'light_mode', '2023-05-15 14:17:14'),
(14, 'side-navigation-tertiary-font-size', '20px', 'light_mode', '2023-05-15 14:17:14'),
(15, 'left-side-content-primary-bg-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(16, 'left-side-content-secondary-bg-color', '#F7F9FB', 'light_mode', '2023-05-15 14:17:14'),
(17, 'left-side-content-tertiary-bg-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(18, 'left-side-content-quaternary-bg-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(19, 'left-side-content-quinary-bg-color', '#9C27B0', 'light_mode', '2023-05-15 14:17:14'),
(20, 'left-side-content-senary-bg-color', '#F8D7DA', 'light_mode', '2023-05-15 14:17:14'),
(21, 'left-side-content-septenary-bg-color', '#FFC107', 'light_mode', '2023-05-15 14:17:14'),
(22, 'left-side-content-octonary-bg-color', '#FF5722', 'light_mode', '2023-05-15 14:17:14'),
(23, 'left-side-content-nonary-bg-color', '#F48FB1', 'light_mode', '2023-05-15 14:17:14'),
(24, 'left-side-content-denary-bg-color', '#F06292', 'light_mode', '2023-05-15 14:17:14'),
(25, 'left-side-content-primary-text-color', '#696767', 'light_mode', '2023-05-15 14:17:14'),
(26, 'left-side-content-secondary-text-color', '#828588', 'light_mode', '2023-05-15 14:17:14'),
(27, 'left-side-content-tertiary-text-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(28, 'left-side-content-quaternary-text-color', '#9C27B0', 'light_mode', '2023-05-15 14:17:14'),
(29, 'left-side-content-quinary-text-color', '#721C24', 'light_mode', '2023-05-15 14:17:14'),
(30, 'left-side-content-senary-text-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(31, 'left-side-content-primary-border-color', '#DFE7EF', 'light_mode', '2023-05-15 14:17:14'),
(32, 'left-side-content-secondary-border-color', '#E88A93', 'light_mode', '2023-05-15 14:17:14'),
(33, 'left-side-content-tertiary-border-color', '#EC407A', 'light_mode', '2023-05-15 14:17:14'),
(34, 'left-side-content-quaternary-border-color', '#D7DDE3', 'light_mode', '2023-05-15 14:17:14'),
(35, 'left-side-content-primary-font-size', '13px', 'light_mode', '2023-05-15 14:17:14'),
(36, 'left-side-content-secondary-font-size', '12px', 'light_mode', '2023-05-15 14:17:14'),
(37, 'left-side-content-tertiary-font-size', '15px', 'light_mode', '2023-05-15 14:17:14'),
(38, 'left-side-content-quaternary-font-size', '14px', 'light_mode', '2023-05-15 14:17:14'),
(39, 'left-side-content-quinary-font-size', '11px', 'light_mode', '2023-05-15 14:17:14'),
(40, 'left-side-content-senary-font-size', '25px', 'light_mode', '2023-05-15 14:17:14'),
(41, 'left-side-content-septenary-font-size', '20px', 'light_mode', '2023-05-15 14:17:14'),
(42, 'audio-player-primary-bg-color', '#050517', 'light_mode', '2023-05-15 14:17:14'),
(43, 'audio-player-secondary-bg-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(44, 'audio-player-tertiary-bg-color', '#FF4E8A', 'light_mode', '2023-05-15 14:17:14'),
(45, 'audio-player-quaternary-bg-color', '#202030', 'light_mode', '2023-05-15 14:17:14'),
(46, 'audio-player-quinary-bg-color', '#EFF1F3', 'light_mode', '2023-05-15 14:17:14'),
(47, 'audio-player-senary-bg-color', '#E45E8C', 'light_mode', '2023-05-15 14:17:14'),
(48, 'audio-player-primary-text-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(49, 'audio-player-secondary-text-color', '#696969', 'light_mode', '2023-05-15 14:17:14'),
(50, 'audio-player-tertiary-text-color', '#97A1A9', 'light_mode', '2023-05-15 14:17:14'),
(51, 'audio-player-quaternary-text-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(52, 'audio-player-quinary-text-color', '#959595', 'light_mode', '2023-05-15 14:17:14'),
(53, 'audio-player-senary-text-color', '#FF6D9F', 'light_mode', '2023-05-15 14:17:14'),
(54, 'audio-player-primary-border-color', '#DFE7EF', 'light_mode', '2023-05-15 14:17:14'),
(55, 'audio-player-primary-font-size', '20px', 'light_mode', '2023-05-15 14:17:14'),
(56, 'audio-player-secondary-font-size', '15px', 'light_mode', '2023-05-15 14:17:14'),
(57, 'audio-player-tertiary-font-size', '14px', 'light_mode', '2023-05-15 14:17:14'),
(58, 'audio-player-quaternary-font-size', '13px', 'light_mode', '2023-05-15 14:17:14'),
(59, 'audio-player-quinary-font-size', '27px', 'light_mode', '2023-05-15 14:17:14'),
(60, 'audio-player-senary-font-size', '11px', 'light_mode', '2023-05-15 14:17:14'),
(61, 'form-primary-bg-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(62, 'form-secondary-bg-color', '#F7F9FB', 'light_mode', '2023-05-15 14:17:14'),
(63, 'form-tertiary-bg-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(64, 'form-quaternary-bg-color', '#9C27B0', 'light_mode', '2023-05-15 14:17:14'),
(65, 'form-quinary-bg-color', '#000000', 'light_mode', '2023-05-15 14:17:14'),
(66, 'form-senary-bg-color', '#F8D7DA', 'light_mode', '2023-05-15 14:17:14'),
(67, 'form-septenary-bg-color', '#E8EBEF', 'light_mode', '2023-05-15 14:17:14'),
(68, 'form-octonary-bg-color', '#F06292', 'light_mode', '2023-05-15 14:17:14'),
(69, 'form-primary-text-color', '#808080', 'light_mode', '2023-05-15 14:17:14'),
(70, 'form-secondary-text-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(71, 'form-tertiary-text-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(72, 'form-quaternary-text-color', '#9C27B0', 'light_mode', '2023-05-15 14:17:14'),
(73, 'form-quinary-text-color', '#721C24', 'light_mode', '2023-05-15 14:17:14'),
(74, 'form-primary-border-color', '#DFE7EF', 'light_mode', '2023-05-15 14:17:14'),
(75, 'form-secondary-border-color', '#E88A93', 'light_mode', '2023-05-15 14:17:14'),
(76, 'form-tertiary-border-color', '#EC407A', 'light_mode', '2023-05-15 14:17:14'),
(77, 'form-primary-font-size', '14px', 'light_mode', '2023-05-15 14:17:14'),
(78, 'form-secondary-font-size', '15px', 'light_mode', '2023-05-15 14:17:14'),
(79, 'form-tertiary-font-size', '18px', 'light_mode', '2023-05-15 14:17:14'),
(80, 'info-panel-primary-bg-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(81, 'info-panel-secondary-bg-color', '#F7F9FB', 'light_mode', '2023-05-15 14:17:14'),
(82, 'info-panel-tertiary-bg-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(83, 'info-panel-quaternary-bg-color', '#9C27B0', 'light_mode', '2023-05-15 14:17:14'),
(84, 'info-panel-quinary-bg-color', '#FDFEFE', 'light_mode', '2023-05-15 14:17:14'),
(85, 'info-panel-senary-bg-color', '#BFBDBD', 'light_mode', '2023-05-15 14:17:14'),
(86, 'info-panel-primary-text-color', '#565656', 'light_mode', '2023-05-15 14:17:14'),
(87, 'info-panel-secondary-text-color', '#878688', 'light_mode', '2023-05-15 14:17:14'),
(88, 'info-panel-tertiary-text-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(89, 'info-panel-quaternary-text-color', '#9C27B0', 'light_mode', '2023-05-15 14:17:14'),
(90, 'info-panel-quinary-text-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(91, 'info-panel-primary-border-color', '#DFE7EF', 'light_mode', '2023-05-15 14:17:14'),
(92, 'info-panel-secondary-border-color', '#E88A93', 'light_mode', '2023-05-15 14:17:14'),
(93, 'info-panel-tertiary-border-color', '#EC407A', 'light_mode', '2023-05-15 14:17:14'),
(94, 'info-panel-primary-font-size', '16px', 'light_mode', '2023-05-15 14:17:14'),
(95, 'info-panel-secondary-font-size', '14px', 'light_mode', '2023-05-15 14:17:14'),
(96, 'info-panel-tertiary-font-size', '15px', 'light_mode', '2023-05-15 14:17:14'),
(97, 'info-panel-quaternary-font-size', '13px', 'light_mode', '2023-05-15 14:17:14'),
(98, 'welcome-screen-primary-bg-color', '#F7F9FB', 'light_mode', '2023-05-15 14:17:14'),
(99, 'welcome-screen-primary-text-color', '#696767', 'light_mode', '2023-05-15 14:17:14'),
(100, 'welcome-screen-secondary-text-color', '#828588', 'light_mode', '2023-05-15 14:17:14'),
(101, 'welcome-screen-primary-border-color', '#DFE7EF', 'light_mode', '2023-05-15 14:17:14'),
(102, 'welcome-screen-primary-font-size', '19px', 'light_mode', '2023-05-15 14:17:14'),
(103, 'welcome-screen-secondary-font-size', '14px', 'light_mode', '2023-05-15 14:17:14'),
(104, 'welcome-screen-tertiary-font-size', '13px', 'light_mode', '2023-05-15 14:17:14'),
(105, 'custom-page-primary-bg-color', '#F7F9FB', 'light_mode', '2023-05-15 14:17:14'),
(106, 'custom-page-secondary-bg-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(107, 'custom-page-primary-text-color', '#8F8F8F', 'light_mode', '2023-05-15 14:17:14'),
(108, 'custom-page-secondary-text-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(109, 'custom-page-tertiary-text-color', '#9C27B0', 'light_mode', '2023-05-15 14:17:14'),
(110, 'custom-page-primary-border-color', '#DFE7EF', 'light_mode', '2023-05-15 14:17:14'),
(111, 'custom-page-primary-font-size', '15px', 'light_mode', '2023-05-15 14:17:14'),
(112, 'custom-page-secondary-font-size', '14px', 'light_mode', '2023-05-15 14:17:14'),
(113, 'statistics-primary-bg-color', '#F7F9FB', 'light_mode', '2023-05-15 14:17:14'),
(114, 'statistics-secondary-bg-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(115, 'statistics-tertiary-bg-color', '#050517', 'light_mode', '2023-05-15 14:17:14'),
(116, 'statistics-quaternary-bg-color', '#262630', 'light_mode', '2023-05-15 14:17:14'),
(117, 'statistics-quinary-bg-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(118, 'statistics-senary-bg-color', '#A5A5A5', 'light_mode', '2023-05-15 14:17:14'),
(119, 'statistics-primary-text-color', '#4A4A49', 'light_mode', '2023-05-15 14:17:14'),
(120, 'statistics-secondary-text-color', '#808080', 'light_mode', '2023-05-15 14:17:14'),
(121, 'statistics-tertiary-text-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(122, 'statistics-quaternary-text-color', '#C7C7C7', 'light_mode', '2023-05-15 14:17:14'),
(123, 'statistics-quinary-text-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(124, 'statistics-senary-text-color', '#9C27B0', 'light_mode', '2023-05-15 14:17:14'),
(125, 'statistics-primary-border-color', '#DFE7EF', 'light_mode', '2023-05-15 14:17:14'),
(126, 'statistics-primary-font-size', '14px', 'light_mode', '2023-05-15 14:17:14'),
(127, 'statistics-secondary-font-size', '17px', 'light_mode', '2023-05-15 14:17:14'),
(128, 'statistics-tertiary-font-size', '15px', 'light_mode', '2023-05-15 14:17:14'),
(129, 'statistics-quaternary-font-size', '19px', 'light_mode', '2023-05-15 14:17:14'),
(130, 'chat-window-primary-bg-color', '#FAFBFC', 'light_mode', '2023-05-15 14:17:14'),
(131, 'chat-window-secondary-bg-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(132, 'chat-window-tertiary-bg-color', '#F7F9FB', 'light_mode', '2023-05-15 14:17:14'),
(133, 'chat-window-quaternary-bg-color', '#F06292', 'light_mode', '2023-05-15 14:17:14'),
(134, 'chat-window-quinary-bg-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(135, 'chat-window-senary-bg-color', '#FFF3CD', 'light_mode', '2023-05-15 14:17:14'),
(136, 'chat-window-septenary-bg-color', '#ECEFF1', 'light_mode', '2023-05-15 14:17:14'),
(137, 'chat-window-octonary-bg-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(138, 'chat-window-nonary-bg-color', '#F06292', 'light_mode', '2023-05-15 14:17:14'),
(139, 'chat-window-denary-bg-color', '#9E9E9E', 'light_mode', '2023-05-15 14:17:14'),
(140, 'chat-window-primary-text-color', '#808080', 'light_mode', '2023-05-15 14:17:14'),
(141, 'chat-window-secondary-text-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(142, 'chat-window-tertiary-text-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(143, 'chat-window-quaternary-text-color', '#808080', 'light_mode', '2023-05-15 14:17:14'),
(144, 'chat-window-quinary-text-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(145, 'chat-window-senary-text-color', '#9C27B0', 'light_mode', '2023-05-15 14:17:14'),
(146, 'chat-window-septenary-text-color', '#856404', 'light_mode', '2023-05-15 14:17:14'),
(147, 'chat-window-octonary-text-color', '#565656', 'light_mode', '2023-05-15 14:17:14'),
(148, 'chat-window-nonary-text-color', '#E45E8C', 'light_mode', '2023-05-15 14:17:14'),
(149, 'chat-window-denary-text-color', '#B1B1B1', 'light_mode', '2023-05-15 14:17:14'),
(150, 'chat-window-primary-border-color', '#DFE7EF', 'light_mode', '2023-05-15 14:17:14'),
(151, 'chat-window-secondary-border-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(152, 'chat-window-tertiary-border-color', '#F7E2A0', 'light_mode', '2023-05-15 14:17:14'),
(153, 'chat-window-quaternary-border-color', '#607D8B', 'light_mode', '2023-05-15 14:17:14'),
(154, 'chat-window-quinary-border-color', '#EC407A', 'light_mode', '2023-05-15 14:17:14'),
(155, 'chat-window-senary-border-color', '#FFC107', 'light_mode', '2023-05-15 14:17:14'),
(156, 'chat-window-septenary-border-color', '#D7DDE3', 'light_mode', '2023-05-15 14:17:14'),
(157, 'chat-window-primary-font-size', '14px', 'light_mode', '2023-05-15 14:17:14'),
(158, 'chat-window-secondary-font-size', '15px', 'light_mode', '2023-05-15 14:17:14'),
(159, 'chat-window-tertiary-font-size', '13px', 'light_mode', '2023-05-15 14:17:14'),
(160, 'chat-window-quaternary-font-size', '12px', 'light_mode', '2023-05-15 14:17:14'),
(161, 'chat-window-quinary-font-size', '19px', 'light_mode', '2023-05-15 14:17:14'),
(162, 'chat-window-senary-font-size', '27px', 'light_mode', '2023-05-15 14:17:14'),
(163, 'chat-window-septenary-font-size', '30px', 'light_mode', '2023-05-15 14:17:14'),
(164, 'chat-window-octonary-font-size', '34px', 'light_mode', '2023-05-15 14:17:14'),
(165, 'entry-page-primary-bg-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(166, 'entry-page-secondary-bg-color', '#F7F9FB', 'light_mode', '2023-05-15 14:17:14'),
(167, 'entry-page-tertiary-bg-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(168, 'entry-page-quaternary-bg-color', '#9C27B0', 'light_mode', '2023-05-15 14:17:14'),
(169, 'entry-page-quinary-bg-color', '#9E9E9E', 'light_mode', '2023-05-15 14:17:14'),
(170, 'entry-page-senary-bg-color', '#F06292', 'light_mode', '2023-05-15 14:17:14'),
(171, 'entry-page-primary-text-color', '#808080', 'light_mode', '2023-05-15 14:17:14'),
(172, 'entry-page-secondary-text-color', '#919191', 'light_mode', '2023-05-15 14:17:14'),
(173, 'entry-page-tertiary-text-color', '#23576A', 'light_mode', '2023-05-15 14:17:14'),
(174, 'entry-page-quaternary-text-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(175, 'entry-page-quinary-text-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(176, 'entry-page-senary-text-color', '#333333', 'light_mode', '2023-05-15 14:17:14'),
(177, 'entry-page-primary-border-color', '#DFE7EF', 'light_mode', '2023-05-15 14:17:14'),
(178, 'entry-page-secondary-border-color', '#A9A9A9', 'light_mode', '2023-05-15 14:17:14'),
(179, 'entry-page-tertiary-border-color', '#DC1F6F', 'light_mode', '2023-05-15 14:17:14'),
(180, 'entry-page-quaternary-border-color', '#D7DDE3', 'light_mode', '2023-05-15 14:17:14'),
(181, 'entry-page-primary-font-size', '14px', 'light_mode', '2023-05-15 14:17:14'),
(182, 'entry-page-secondary-font-size', '15px', 'light_mode', '2023-05-15 14:17:14'),
(183, 'entry-page-tertiary-font-size', '18px', 'light_mode', '2023-05-15 14:17:14'),
(184, 'entry-page-quaternary-font-size', '20px', 'light_mode', '2023-05-15 14:17:14'),
(185, 'entry-page-quinary-font-size', '16px', 'light_mode', '2023-05-15 14:17:14'),
(186, 'entry-page-senary-font-size', '13px', 'light_mode', '2023-05-15 14:17:14'),
(187, 'chat-page-primary-bg-color', '#0F0F0F', 'dark_mode', '2023-05-15 14:17:14'),
(188, 'chat-page-primary-font-size', '14px', 'dark_mode', '2023-05-15 14:17:14'),
(189, 'side-navigation-primary-bg-color', '#1E1D1D', 'dark_mode', '2023-05-15 14:17:14'),
(190, 'side-navigation-secondary-bg-color', '#1E1D1D', 'dark_mode', '2023-05-15 14:17:14'),
(191, 'side-navigation-tertiary-bg-color', '#242424', 'dark_mode', '2023-05-15 14:17:14'),
(192, 'side-navigation-quaternary-bg-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(193, 'side-navigation-primary-text-color', '#9D9D9D', 'dark_mode', '2023-05-15 14:17:14'),
(194, 'side-navigation-secondary-text-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(195, 'side-navigation-tertiary-text-color', '#9C27B0', 'dark_mode', '2023-05-15 14:17:14'),
(196, 'side-navigation-quaternary-text-color', '#FFFFFF', 'dark_mode', '2023-05-15 14:17:14'),
(197, 'side-navigation-primary-border-color', '#060606', 'dark_mode', '2023-05-15 14:17:14'),
(198, 'side-navigation-primary-font-size', '14px', 'dark_mode', '2023-05-15 14:17:14'),
(199, 'side-navigation-secondary-font-size', '13px', 'dark_mode', '2023-05-15 14:17:14'),
(200, 'side-navigation-tertiary-font-size', '20px', 'dark_mode', '2023-05-15 14:17:14'),
(201, 'left-side-content-primary-bg-color', '#1E1D1D', 'dark_mode', '2023-05-15 14:17:14'),
(202, 'left-side-content-secondary-bg-color', '#292929', 'dark_mode', '2023-05-15 14:17:14'),
(203, 'left-side-content-tertiary-bg-color', '#292929', 'dark_mode', '2023-05-15 14:17:14'),
(204, 'left-side-content-quaternary-bg-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(205, 'left-side-content-quinary-bg-color', '#9C27B0', 'dark_mode', '2023-05-15 14:17:14'),
(206, 'left-side-content-senary-bg-color', '#F8D7DA', 'dark_mode', '2023-05-15 14:17:14'),
(207, 'left-side-content-septenary-bg-color', '#FFC107', 'dark_mode', '2023-05-15 14:17:14'),
(208, 'left-side-content-octonary-bg-color', '#FF5722', 'dark_mode', '2023-05-15 14:17:14'),
(209, 'left-side-content-nonary-bg-color', '#F48FB1', 'dark_mode', '2023-05-15 14:17:14'),
(210, 'left-side-content-denary-bg-color', '#F06292', 'dark_mode', '2023-05-15 14:17:14'),
(211, 'left-side-content-primary-text-color', '#B6B6B6', 'dark_mode', '2023-05-15 14:17:14'),
(212, 'left-side-content-secondary-text-color', '#767676', 'dark_mode', '2023-05-15 14:17:14'),
(213, 'left-side-content-tertiary-text-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(214, 'left-side-content-quaternary-text-color', '#9C27B0', 'dark_mode', '2023-05-15 14:17:14'),
(215, 'left-side-content-quinary-text-color', '#721C24', 'dark_mode', '2023-05-15 14:17:14'),
(216, 'left-side-content-senary-text-color', '#FFFFFF', 'dark_mode', '2023-05-15 14:17:14'),
(217, 'left-side-content-primary-border-color', '#000000', 'dark_mode', '2023-05-15 14:17:14'),
(218, 'left-side-content-secondary-border-color', '#E88A93', 'dark_mode', '2023-05-15 14:17:14'),
(219, 'left-side-content-tertiary-border-color', '#EC407A', 'dark_mode', '2023-05-15 14:17:14'),
(220, 'left-side-content-quaternary-border-color', '#474747', 'dark_mode', '2023-05-15 14:17:14'),
(221, 'left-side-content-primary-font-size', '13px', 'dark_mode', '2023-05-15 14:17:14'),
(222, 'left-side-content-secondary-font-size', '12px', 'dark_mode', '2023-05-15 14:17:14'),
(223, 'left-side-content-tertiary-font-size', '15px', 'dark_mode', '2023-05-15 14:17:14'),
(224, 'left-side-content-quaternary-font-size', '14px', 'dark_mode', '2023-05-15 14:17:14'),
(225, 'left-side-content-quinary-font-size', '11px', 'dark_mode', '2023-05-15 14:17:14'),
(226, 'left-side-content-senary-font-size', '25px', 'dark_mode', '2023-05-15 14:17:14'),
(227, 'left-side-content-septenary-font-size', '20px', 'dark_mode', '2023-05-15 14:17:14'),
(228, 'audio-player-primary-bg-color', '#000000', 'dark_mode', '2023-05-15 14:17:14'),
(229, 'audio-player-secondary-bg-color', '#FFFFFF', 'dark_mode', '2023-05-15 14:17:14'),
(230, 'audio-player-tertiary-bg-color', '#FF4E8A', 'dark_mode', '2023-05-15 14:17:14'),
(231, 'audio-player-quaternary-bg-color', '#1E1D1D', 'dark_mode', '2023-05-15 14:17:14'),
(232, 'audio-player-quinary-bg-color', '#EFF1F3', 'dark_mode', '2023-05-15 14:17:14'),
(233, 'audio-player-senary-bg-color', '#E45E8C', 'dark_mode', '2023-05-15 14:17:14'),
(234, 'audio-player-primary-text-color', '#FFFFFF', 'dark_mode', '2023-05-15 14:17:14'),
(235, 'audio-player-secondary-text-color', '#AAA7A7', 'dark_mode', '2023-05-15 14:17:14'),
(236, 'audio-player-tertiary-text-color', '#818589', 'dark_mode', '2023-05-15 14:17:14'),
(237, 'audio-player-quaternary-text-color', '#FFFFFF', 'dark_mode', '2023-05-15 14:17:14'),
(238, 'audio-player-quinary-text-color', '#666666', 'dark_mode', '2023-05-15 14:17:14'),
(239, 'audio-player-senary-text-color', '#FF6D9F', 'dark_mode', '2023-05-15 14:17:14'),
(240, 'audio-player-primary-border-color', '#383838', 'dark_mode', '2023-05-15 14:17:14'),
(241, 'audio-player-primary-font-size', '20px', 'dark_mode', '2023-05-15 14:17:14'),
(242, 'audio-player-secondary-font-size', '15px', 'dark_mode', '2023-05-15 14:17:14'),
(243, 'audio-player-tertiary-font-size', '14px', 'dark_mode', '2023-05-15 14:17:14'),
(244, 'audio-player-quaternary-font-size', '13px', 'dark_mode', '2023-05-15 14:17:14'),
(245, 'audio-player-quinary-font-size', '27px', 'dark_mode', '2023-05-15 14:17:14'),
(246, 'audio-player-senary-font-size', '11px', 'dark_mode', '2023-05-15 14:17:14'),
(247, 'form-primary-bg-color', '#1E1D1D', 'dark_mode', '2023-05-15 14:17:14'),
(248, 'form-secondary-bg-color', '#040404', 'dark_mode', '2023-05-15 14:17:14'),
(249, 'form-tertiary-bg-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(250, 'form-quaternary-bg-color', '#9C27B0', 'dark_mode', '2023-05-15 14:17:14'),
(251, 'form-quinary-bg-color', '#000000', 'dark_mode', '2023-05-15 14:17:14'),
(252, 'form-senary-bg-color', '#F8D7DA', 'dark_mode', '2023-05-15 14:17:14'),
(253, 'form-septenary-bg-color', '#000000', 'dark_mode', '2023-05-15 14:17:14'),
(254, 'form-octonary-bg-color', '#F06292', 'dark_mode', '2023-05-15 14:17:14'),
(255, 'form-primary-text-color', '#A1A1A1', 'dark_mode', '2023-05-15 14:17:14'),
(256, 'form-secondary-text-color', '#FFFFFF', 'dark_mode', '2023-05-15 14:17:14'),
(257, 'form-tertiary-text-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(258, 'form-quaternary-text-color', '#9C27B0', 'dark_mode', '2023-05-15 14:17:14'),
(259, 'form-quinary-text-color', '#721C24', 'dark_mode', '2023-05-15 14:17:14'),
(260, 'form-primary-border-color', '#383838', 'dark_mode', '2023-05-15 14:17:14'),
(261, 'form-secondary-border-color', '#E88A93', 'dark_mode', '2023-05-15 14:17:14'),
(262, 'form-tertiary-border-color', '#EC407A', 'dark_mode', '2023-05-15 14:17:14'),
(263, 'form-primary-font-size', '14px', 'dark_mode', '2023-05-15 14:17:14'),
(264, 'form-secondary-font-size', '15px', 'dark_mode', '2023-05-15 14:17:14'),
(265, 'form-tertiary-font-size', '18px', 'dark_mode', '2023-05-15 14:17:14'),
(266, 'info-panel-primary-bg-color', '#1E1D1D', 'dark_mode', '2023-05-15 14:17:14'),
(267, 'info-panel-secondary-bg-color', '#2E2E2E', 'dark_mode', '2023-05-15 14:17:14'),
(268, 'info-panel-tertiary-bg-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(269, 'info-panel-quaternary-bg-color', '#9C27B0', 'dark_mode', '2023-05-15 14:17:14'),
(270, 'info-panel-quinary-bg-color', '#242424', 'dark_mode', '2023-05-15 14:17:14'),
(271, 'info-panel-senary-bg-color', '#454545', 'dark_mode', '2023-05-15 14:17:14'),
(272, 'info-panel-primary-text-color', '#B2B1B1', 'dark_mode', '2023-05-15 14:17:14'),
(273, 'info-panel-secondary-text-color', '#959595', 'dark_mode', '2023-05-15 14:17:14'),
(274, 'info-panel-tertiary-text-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(275, 'info-panel-quaternary-text-color', '#9C27B0', 'dark_mode', '2023-05-15 14:17:14'),
(276, 'info-panel-quinary-text-color', '#FFFFFF', 'dark_mode', '2023-05-15 14:17:14'),
(277, 'info-panel-primary-border-color', '#000000', 'dark_mode', '2023-05-15 14:17:14'),
(278, 'info-panel-secondary-border-color', '#E88A93', 'dark_mode', '2023-05-15 14:17:14'),
(279, 'info-panel-tertiary-border-color', '#EC407A', 'dark_mode', '2023-05-15 14:17:14'),
(280, 'info-panel-primary-font-size', '16px', 'dark_mode', '2023-05-15 14:17:14'),
(281, 'info-panel-secondary-font-size', '14px', 'dark_mode', '2023-05-15 14:17:14'),
(282, 'info-panel-tertiary-font-size', '15px', 'dark_mode', '2023-05-15 14:17:14'),
(283, 'info-panel-quaternary-font-size', '13px', 'dark_mode', '2023-05-15 14:17:14'),
(284, 'welcome-screen-primary-bg-color', '#2E2E2E', 'dark_mode', '2023-05-15 14:17:14'),
(285, 'welcome-screen-primary-text-color', '#A4A4A4', 'dark_mode', '2023-05-15 14:17:14'),
(286, 'welcome-screen-secondary-text-color', '#7E7F81', 'dark_mode', '2023-05-15 14:17:14'),
(287, 'welcome-screen-primary-border-color', '#383838', 'dark_mode', '2023-05-15 14:17:14'),
(288, 'welcome-screen-primary-font-size', '19px', 'dark_mode', '2023-05-15 14:17:14'),
(289, 'welcome-screen-secondary-font-size', '14px', 'dark_mode', '2023-05-15 14:17:14'),
(290, 'welcome-screen-tertiary-font-size', '13px', 'dark_mode', '2023-05-15 14:17:14'),
(291, 'custom-page-primary-bg-color', '#2E2E2E', 'dark_mode', '2023-05-15 14:17:14'),
(292, 'custom-page-secondary-bg-color', '#1E1D1D', 'dark_mode', '2023-05-15 14:17:14'),
(293, 'custom-page-primary-text-color', '#8A8A8A', 'dark_mode', '2023-05-15 14:17:14'),
(294, 'custom-page-secondary-text-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(295, 'custom-page-tertiary-text-color', '#9C27B0', 'dark_mode', '2023-05-15 14:17:14'),
(296, 'custom-page-primary-border-color', '#383838', 'dark_mode', '2023-05-15 14:17:14'),
(297, 'custom-page-primary-font-size', '15px', 'dark_mode', '2023-05-15 14:17:14'),
(298, 'custom-page-secondary-font-size', '14px', 'dark_mode', '2023-05-15 14:17:14'),
(299, 'statistics-primary-bg-color', '#2E2E2E', 'dark_mode', '2023-05-15 14:17:14'),
(300, 'statistics-secondary-bg-color', '#1E1D1D', 'dark_mode', '2023-05-15 14:17:14'),
(301, 'statistics-tertiary-bg-color', '#232323', 'dark_mode', '2023-05-15 14:17:14'),
(302, 'statistics-quaternary-bg-color', '#191919', 'dark_mode', '2023-05-15 14:17:14'),
(303, 'statistics-quinary-bg-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(304, 'statistics-senary-bg-color', '#1B1B1B', 'dark_mode', '2023-05-15 14:17:14'),
(305, 'statistics-primary-text-color', '#B4B4B4', 'dark_mode', '2023-05-15 14:17:14'),
(306, 'statistics-secondary-text-color', '#818181', 'dark_mode', '2023-05-15 14:17:14'),
(307, 'statistics-tertiary-text-color', '#FFFFFF', 'dark_mode', '2023-05-15 14:17:14'),
(308, 'statistics-quaternary-text-color', '#8B8B8B', 'dark_mode', '2023-05-15 14:17:14'),
(309, 'statistics-quinary-text-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(310, 'statistics-senary-text-color', '#9C27B0', 'dark_mode', '2023-05-15 14:17:14'),
(311, 'statistics-primary-border-color', '#060606', 'dark_mode', '2023-05-15 14:17:14'),
(312, 'statistics-primary-font-size', '14px', 'dark_mode', '2023-05-15 14:17:14'),
(313, 'statistics-secondary-font-size', '17px', 'dark_mode', '2023-05-15 14:17:14'),
(314, 'statistics-tertiary-font-size', '15px', 'dark_mode', '2023-05-15 14:17:14'),
(315, 'statistics-quaternary-font-size', '19px', 'dark_mode', '2023-05-15 14:17:14'),
(316, 'chat-window-primary-bg-color', '#070707', 'dark_mode', '2023-05-15 14:17:14'),
(317, 'chat-window-secondary-bg-color', '#1E1D1D', 'dark_mode', '2023-05-15 14:17:14'),
(318, 'chat-window-tertiary-bg-color', '#040404', 'dark_mode', '2023-05-15 14:17:14'),
(319, 'chat-window-quaternary-bg-color', '#F06292', 'dark_mode', '2023-05-15 14:17:14'),
(320, 'chat-window-quinary-bg-color', '#292929', 'dark_mode', '2023-05-15 14:17:14'),
(321, 'chat-window-senary-bg-color', '#1F1D1D', 'dark_mode', '2023-05-15 14:17:14'),
(322, 'chat-window-septenary-bg-color', '#292929', 'dark_mode', '2023-05-15 14:17:14'),
(323, 'chat-window-octonary-bg-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(324, 'chat-window-nonary-bg-color', '#F06292', 'dark_mode', '2023-05-15 14:17:14'),
(325, 'chat-window-denary-bg-color', '#312F2F', 'dark_mode', '2023-05-15 14:17:14'),
(326, 'chat-window-primary-text-color', '#8D8D8D', 'dark_mode', '2023-05-15 14:17:14'),
(327, 'chat-window-secondary-text-color', '#FFFFFF', 'dark_mode', '2023-05-15 14:17:14'),
(328, 'chat-window-tertiary-text-color', '#FFFFFF', 'dark_mode', '2023-05-15 14:17:14'),
(329, 'chat-window-quaternary-text-color', '#989898', 'dark_mode', '2023-05-15 14:17:14'),
(330, 'chat-window-quinary-text-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(331, 'chat-window-senary-text-color', '#9C27B0', 'dark_mode', '2023-05-15 14:17:14'),
(332, 'chat-window-septenary-text-color', '#666664', 'dark_mode', '2023-05-15 14:17:14'),
(333, 'chat-window-octonary-text-color', '#565656', 'dark_mode', '2023-05-15 14:17:14'),
(334, 'chat-window-nonary-text-color', '#E45E8C', 'dark_mode', '2023-05-15 14:17:14'),
(335, 'chat-window-denary-text-color', '#B1B1B1', 'dark_mode', '2023-05-15 14:17:14'),
(336, 'chat-window-primary-border-color', '#000000', 'dark_mode', '2023-05-15 14:17:14'),
(337, 'chat-window-secondary-border-color', '#FFFFFF', 'dark_mode', '2023-05-15 14:17:14'),
(338, 'chat-window-tertiary-border-color', '#0A0A0A', 'dark_mode', '2023-05-15 14:17:14'),
(339, 'chat-window-quaternary-border-color', '#607D8B', 'dark_mode', '2023-05-15 14:17:14'),
(340, 'chat-window-quinary-border-color', '#EC407A', 'dark_mode', '2023-05-15 14:17:14'),
(341, 'chat-window-senary-border-color', '#FFC107', 'dark_mode', '2023-05-15 14:17:14'),
(342, 'chat-window-septenary-border-color', '#474747', 'dark_mode', '2023-05-15 14:17:14'),
(343, 'chat-window-primary-font-size', '14px', 'dark_mode', '2023-05-15 14:17:14'),
(344, 'chat-window-secondary-font-size', '15px', 'dark_mode', '2023-05-15 14:17:14'),
(345, 'chat-window-tertiary-font-size', '13px', 'dark_mode', '2023-05-15 14:17:14'),
(346, 'chat-window-quaternary-font-size', '12px', 'dark_mode', '2023-05-15 14:17:14'),
(347, 'chat-window-quinary-font-size', '19px', 'dark_mode', '2023-05-15 14:17:14'),
(348, 'chat-window-senary-font-size', '27px', 'dark_mode', '2023-05-15 14:17:14'),
(349, 'chat-window-septenary-font-size', '30px', 'dark_mode', '2023-05-15 14:17:14'),
(350, 'chat-window-octonary-font-size', '34px', 'dark_mode', '2023-05-15 14:17:14'),
(351, 'entry-page-primary-bg-color', '#1E1D1D', 'dark_mode', '2023-05-15 14:17:14'),
(352, 'entry-page-secondary-bg-color', '#292929', 'dark_mode', '2023-05-15 14:17:14'),
(353, 'entry-page-tertiary-bg-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(354, 'entry-page-quaternary-bg-color', '#9C27B0', 'dark_mode', '2023-05-15 14:17:14'),
(355, 'entry-page-quinary-bg-color', '#353333', 'dark_mode', '2023-05-15 14:17:14'),
(356, 'entry-page-senary-bg-color', '#F06292', 'dark_mode', '2023-05-15 14:17:14'),
(357, 'entry-page-primary-text-color', '#858585', 'dark_mode', '2023-05-15 14:17:14'),
(358, 'entry-page-secondary-text-color', '#929292', 'dark_mode', '2023-05-15 14:17:14'),
(359, 'entry-page-tertiary-text-color', '#CDCDCD', 'dark_mode', '2023-05-15 14:17:14'),
(360, 'entry-page-quaternary-text-color', '#FFFFFF', 'dark_mode', '2023-05-15 14:17:14'),
(361, 'entry-page-quinary-text-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(362, 'entry-page-senary-text-color', '#808080', 'dark_mode', '2023-05-15 14:17:14'),
(363, 'entry-page-primary-border-color', '#101010', 'dark_mode', '2023-05-15 14:17:14'),
(364, 'entry-page-secondary-border-color', '#A9A9A9', 'dark_mode', '2023-05-15 14:17:14'),
(365, 'entry-page-tertiary-border-color', '#DC1F6F', 'dark_mode', '2023-05-15 14:17:14'),
(366, 'entry-page-quaternary-border-color', '#474747', 'dark_mode', '2023-05-15 14:17:14'),
(367, 'entry-page-primary-font-size', '14px', 'dark_mode', '2023-05-15 14:17:14'),
(368, 'entry-page-secondary-font-size', '15px', 'dark_mode', '2023-05-15 14:17:14'),
(369, 'entry-page-tertiary-font-size', '18px', 'dark_mode', '2023-05-15 14:17:14'),
(370, 'entry-page-quaternary-font-size', '20px', 'dark_mode', '2023-05-15 14:17:14'),
(371, 'entry-page-quinary-font-size', '16px', 'dark_mode', '2023-05-15 14:17:14'),
(372, 'entry-page-senary-font-size', '13px', 'dark_mode', '2023-05-15 14:17:14'),
(373, 'chat-page-secondary-bg-color', '#F06292', 'light_mode', '2023-05-15 14:17:14'),
(374, 'chat-page-tertiary-bg-color', '#DBE1E7', 'light_mode', '2023-05-15 14:17:14'),
(375, 'chat-page-secondary-bg-color', '#F06292', 'dark_mode', '2023-05-15 14:17:14'),
(376, 'chat-page-tertiary-bg-color', '#292929', 'dark_mode', '2023-05-15 14:17:14'),
(377, 'landing-page-primary-bg-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(378, 'landing-page-secondary-bg-color', '#F1F5F9', 'light_mode', '2023-05-15 14:17:14'),
(379, 'landing-page-tertiary-bg-color', '#CED6DF', 'light_mode', '2023-05-15 14:17:14'),
(380, 'landing-page-quaternary-bg-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(381, 'landing-page-quinary-bg-color', '#FFF497', 'light_mode', '2023-05-15 14:17:14'),
(382, 'landing-page-senary-bg-color', '#000000', 'light_mode', '2023-05-15 14:17:14'),
(383, 'landing-page-septenary-bg-color', '#9C27B0', 'light_mode', '2023-05-15 14:17:14'),
(384, 'landing-page-primary-text-color', '#1B1E60', 'light_mode', '2023-05-15 14:17:14'),
(385, 'landing-page-secondary-text-color', '#7F8097', 'light_mode', '2023-05-15 14:17:14'),
(386, 'landing-page-tertiary-text-color', '#CFCFCF', 'light_mode', '2023-05-15 14:17:14'),
(387, 'landing-page-quaternary-text-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(388, 'landing-page-quinary-text-color', '#FFEB3B', 'light_mode', '2023-05-15 14:17:14'),
(389, 'landing-page-senary-text-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(390, 'landing-page-septenary-text-color', '#3F3F3F', 'light_mode', '2023-05-15 14:17:14'),
(391, 'landing-page-octonary-text-color', '#797F85', 'light_mode', '2023-05-15 14:17:14'),
(392, 'landing-page-primary-border-color', '#B9BFC6', 'light_mode', '2023-05-15 14:17:14'),
(393, 'landing-page-primary-font-size', '25px', 'light_mode', '2023-05-15 14:17:14'),
(394, 'landing-page-secondary-font-size', '17px', 'light_mode', '2023-05-15 14:17:14'),
(395, 'landing-page-tertiary-font-size', '16px', 'light_mode', '2023-05-15 14:17:14'),
(396, 'landing-page-quaternary-font-size', '16px', 'light_mode', '2023-05-15 14:17:14'),
(397, 'landing-page-quinary-font-size', '15px', 'light_mode', '2023-05-15 14:17:14'),
(398, 'landing-page-senary-font-size', '14px', 'light_mode', '2023-05-15 14:17:14'),
(399, 'landing-page-primary-bg-color', '#1D1D1D', 'dark_mode', '2023-05-15 14:17:14'),
(400, 'landing-page-secondary-bg-color', '#131313', 'dark_mode', '2023-05-15 14:17:14'),
(401, 'landing-page-tertiary-bg-color', '#000000', 'dark_mode', '2023-05-15 14:17:14'),
(402, 'landing-page-quaternary-bg-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(403, 'landing-page-quinary-bg-color', '#FFF497', 'dark_mode', '2023-05-15 14:17:14'),
(404, 'landing-page-senary-bg-color', '#000000', 'dark_mode', '2023-05-15 14:17:14'),
(405, 'landing-page-septenary-bg-color', '#9C27B0', 'dark_mode', '2023-05-15 14:17:14'),
(406, 'landing-page-primary-text-color', '#FFFFFF', 'dark_mode', '2023-05-15 14:17:14'),
(407, 'landing-page-secondary-text-color', '#AFAFAF', 'dark_mode', '2023-05-15 14:17:14'),
(408, 'landing-page-tertiary-text-color', '#CFCFCF', 'dark_mode', '2023-05-15 14:17:14'),
(409, 'landing-page-quaternary-text-color', '#FFFFFF', 'dark_mode', '2023-05-15 14:17:14'),
(410, 'landing-page-quinary-text-color', '#FFEB3B', 'dark_mode', '2023-05-15 14:17:14'),
(411, 'landing-page-senary-text-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(412, 'landing-page-septenary-text-color', '#3F3F3F', 'dark_mode', '2023-05-15 14:17:14'),
(413, 'landing-page-octonary-text-color', '#727272', 'dark_mode', '2023-05-15 14:17:14'),
(414, 'landing-page-primary-border-color', '#222222', 'dark_mode', '2023-05-15 14:17:14'),
(415, 'landing-page-primary-font-size', '25px', 'dark_mode', '2023-05-15 14:17:14'),
(416, 'landing-page-secondary-font-size', '17px', 'dark_mode', '2023-05-15 14:17:14'),
(417, 'landing-page-tertiary-font-size', '16px', 'dark_mode', '2023-05-15 14:17:14'),
(418, 'landing-page-quaternary-font-size', '16px', 'dark_mode', '2023-05-15 14:17:14'),
(419, 'landing-page-quinary-font-size', '15px', 'dark_mode', '2023-05-15 14:17:14'),
(420, 'landing-page-senary-font-size', '14px', 'dark_mode', '2023-05-15 14:17:14'),
(421, 'chat-window-undenary-text-color', '#FF9800', 'light_mode', '2023-05-15 14:17:14'),
(422, 'chat-window-duodenary-text-color', '#FFEB3B', 'light_mode', '2023-05-15 14:17:14'),
(423, 'chat-window-undenary-text-color', '#FF9800', 'dark_mode', '2023-05-15 14:17:14'),
(424, 'chat-window-duodenary-text-color', '#FFEB3B', 'dark_mode', '2023-05-15 14:17:14'),
(425, 'chat-window-nonary-font-size', '22px', 'light_mode', '2023-05-15 14:17:14'),
(426, 'chat-window-nonary-font-size', '22px', 'dark_mode', '2023-05-15 14:17:14'),
(427, 'landing-page-secondary-border-color', '#DFE7EF', 'light_mode', '2023-05-15 14:17:14'),
(428, 'chat-page-quaternary-bg-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(429, 'chat-page-quinary-bg-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(430, 'chat-page-primary-border-color', '#DFE7EF', 'light_mode', '2023-05-15 14:17:14'),
(431, 'chat-page-secondary-font-size', '18px', 'light_mode', '2023-05-15 14:17:14'),
(432, 'chat-page-tertiary-font-size', '15px', 'light_mode', '2023-05-15 14:17:14'),
(433, 'chat-page-primary-text-color', '#E91E63', 'light_mode', '2023-05-15 14:17:14'),
(434, 'chat-page-secondary-text-color', '#FFFFFF', 'light_mode', '2023-05-15 14:17:14'),
(435, 'chat-page-tertiary-text-color', '#808080', 'light_mode', '2023-05-15 14:17:14'),
(436, 'landing-page-secondary-border-color', '#101010', 'dark_mode', '2023-05-15 14:17:14'),
(437, 'chat-page-quaternary-bg-color', '#1E1D1D', 'dark_mode', '2023-05-15 14:17:14'),
(438, 'chat-page-quinary-bg-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(439, 'chat-page-primary-border-color', '#101010', 'dark_mode', '2023-05-15 14:17:14'),
(440, 'chat-page-secondary-font-size', '18px', 'dark_mode', '2023-05-15 14:17:14'),
(441, 'chat-page-tertiary-font-size', '15px', 'dark_mode', '2023-05-15 14:17:14'),
(442, 'chat-page-primary-text-color', '#E91E63', 'dark_mode', '2023-05-15 14:17:14'),
(443, 'chat-page-secondary-text-color', '#FFFFFF', 'dark_mode', '2023-05-15 14:17:14'),
(444, 'chat-page-tertiary-text-color', '#858585', 'dark_mode', '2023-05-15 14:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `gr_custom_fields`
--

CREATE TABLE `gr_custom_fields` (
  `field_id` bigint(20) NOT NULL,
  `string_constant` varchar(191) DEFAULT NULL,
  `field_category` varchar(15) NOT NULL DEFAULT 'profile',
  `field_type` varchar(15) DEFAULT NULL,
  `show_on_signup` int(11) NOT NULL DEFAULT 0,
  `required` int(11) NOT NULL DEFAULT 0,
  `minimum_length` int(11) NOT NULL DEFAULT 0,
  `maximum_length` int(11) NOT NULL DEFAULT 250,
  `show_on_info_page` int(11) NOT NULL DEFAULT 1,
  `editable_only_once` int(11) NOT NULL DEFAULT 0,
  `searchable_field` int(11) NOT NULL DEFAULT 0,
  `disabled` int(11) NOT NULL DEFAULT 0,
  `order_by` bigint(20) NOT NULL DEFAULT 0,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_custom_fields`
--

INSERT INTO `gr_custom_fields` (`field_id`, `string_constant`, `field_category`, `field_type`, `show_on_signup`, `required`, `minimum_length`, `maximum_length`, `show_on_info_page`, `editable_only_once`, `searchable_field`, `disabled`, `order_by`, `updated_on`) VALUES
(1, 'custom_field_1', 'profile', 'long_text', 0, 0, 0, 250, 1, 0, 0, 0, 0, '2023-05-15 14:16:25'),
(2, 'custom_field_2', 'profile', 'date', 0, 0, 0, 0, 1, 0, 1, 0, 0, '2023-04-16 20:25:00'),
(3, 'custom_field_3', 'profile', 'dropdown', 0, 0, 0, 0, 1, 0, 1, 0, 0, '2023-04-16 20:24:35'),
(4, 'custom_field_4', 'profile', 'link', 0, 0, 0, 0, 1, 0, 0, 0, 0, '2023-04-16 17:02:10'),
(5, 'custom_field_5', 'profile', 'short_text', 0, 0, 0, 0, 1, 0, 0, 0, 0, '2022-03-06 13:33:36'),
(6, 'custom_field_6', 'profile', 'dropdown', 0, 0, 0, 0, 1, 0, 1, 0, 0, '2023-04-16 20:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `gr_custom_fields_values`
--

CREATE TABLE `gr_custom_fields_values` (
  `field_value_id` bigint(20) NOT NULL,
  `field_id` bigint(20) NOT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `field_value` text NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_custom_fields_values`
--

INSERT INTO `gr_custom_fields_values` (`field_value_id`, `field_id`, `group_id`, `user_id`, `field_value`, `updated_on`) VALUES
(1, 6, NULL, 1, 'JO', '2023-05-15 13:36:50'),
(2, 6, NULL, 2, 'US', '2023-05-16 12:12:26'),
(3, 6, NULL, 3, 'IN', '2023-05-16 13:45:53'),
(4, 6, NULL, 4, 'IN', '2023-05-16 19:32:05'),
(5, 1, NULL, 4, 'Feel relaxed and unwind yourself with the Body Massage in pune at , the best Massage Centre in pune which offers various massage therapies to invigorate and relax your entire body.', '2023-05-16 19:32:05'),
(6, 5, NULL, 4, '', '2023-05-16 19:32:05'),
(7, 6, NULL, 5, 'TR', '2023-05-17 05:25:35'),
(8, 6, NULL, 7, 'IN', '2023-05-17 07:35:33'),
(9, 1, NULL, 7, 'We&#039;re glad you&#039;re here at Amritsar Escorts, the top spot for romance and company. We have the ideal match for you, whether you&#039;re seeking a casual encounter or a committed relationship. Our beautiful escorts are seductive, sensual, and sophisticated. Set up an appointment with one of our lovely escorts right now, and allow us to show you all that Amritsar has to offer.\r\n\r\nhttps://www.amritsarcallgirlsagency.in', '2023-05-17 07:35:33'),
(10, 5, NULL, 7, '', '2023-05-17 07:35:33'),
(11, 6, NULL, 8, 'IN', '2023-05-17 16:32:53'),
(12, 1, NULL, 8, 'If you are seeking for Chandigarh call girls then we recommend you to have a look at our service as we are one of the most reputed Call Girl agencies in the city and offering their great services at very reasonable price.\r\n\r\nhttps://anuviz.com', '2023-05-17 16:32:53'),
(13, 5, NULL, 8, '', '2023-05-17 16:32:53'),
(14, 6, NULL, 9, 'IN', '2023-05-17 17:05:56'),
(15, 1, NULL, 9, 'Call Girls In Zirakpur are the best at providing pleasure. book us and visit in heaven.Here you can meet and hire most pretty and stunning Call Girls In Zirakpur. We provide all kind of escorts and call girls like as Russian escorts.\r\n\r\nhttps://www.nehamanaliescorts.com', '2023-05-17 17:05:56'),
(16, 5, NULL, 9, '', '2023-05-17 17:05:56'),
(17, 6, NULL, 10, 'IN', '2023-05-17 18:42:37'),
(18, 6, NULL, 11, 'EG', '2023-05-18 03:47:15'),
(19, 6, NULL, 12, 'US', '2023-05-18 12:04:37'),
(20, 1, NULL, 12, 'Bitfoic is a professional electronic components distributor with many years of industry experience. We will provide one-stop service and equipment support of various kinds for customers, and provide component support from Original Equipment Manufactures (OEM) and Electronic Manufacturing Service (EMS) to Original Designing Manufactures (ODM).Bitfoic focuses on CPLD or FPGA, MCU, DSP and Memory or Flash, provides key market information of commodities to our partners\r\n\r\nhttps://www.bitfoic.com/', '2023-05-18 12:04:37'),
(21, 5, NULL, 12, '', '2023-05-18 12:04:37'),
(22, 6, NULL, 13, 'IN', '2023-05-18 14:09:36'),
(23, 1, NULL, 13, 'If there is one best way to treat erectile dysfunction, it is Fildenasrx. Our company offers you 100% genuine products for the treatment of Ed at a very low price and very good medicine. You should contact our company Fildenasrx today to get details about all these products.', '2023-05-18 14:09:36'),
(24, 3, NULL, 13, '1', '2023-05-18 14:09:36'),
(25, 5, NULL, 13, 'United States', '2023-05-18 14:09:36'),
(26, 6, NULL, 14, 'IN', '2023-05-19 20:06:06'),
(27, 1, NULL, 14, 'Get all of your queries answered and bid farewell to confusion. This chapter should be read aloud. Chants and other forms of heavenly music can help you find the meaning and purpose of your life with this Spiritual Music Songs from Pooja Tunes.', '2023-05-19 20:06:06'),
(28, 4, NULL, 14, 'https://www.poojatunes.com/', '2023-05-19 20:06:06'),
(29, 5, NULL, 14, '', '2023-05-19 20:06:06'),
(30, 6, NULL, 15, 'US', '2023-05-20 04:06:38'),
(31, 1, NULL, 15, 'Offering comprehensive children’s care services and treatments, we keep our future leaders and dreamers strong and healthy, while keeping their parents reassured that their children are getting the best care possible for any and every ailment—big or small.\r\nhttps://www.a-zpeds.com/', '2023-05-20 04:06:38'),
(32, 3, NULL, 15, '1', '2023-05-20 04:06:38'),
(33, 5, NULL, 15, '', '2023-05-20 04:06:38'),
(34, 6, NULL, 16, 'DE', '2023-05-20 04:43:18'),
(35, 6, NULL, 17, 'EG', '2023-05-21 15:32:16'),
(36, 6, NULL, 18, 'YE', '2023-05-22 01:03:12'),
(37, 6, NULL, 19, 'IN', '2023-05-22 11:18:31'),
(38, 1, NULL, 19, 'https://babachart.com\r\nhttps://a7-satta.com', '2023-05-22 11:18:31'),
(39, 5, NULL, 19, '', '2023-05-22 11:18:31'),
(40, 6, NULL, 20, 'IN', '2023-05-22 16:34:40'),
(41, 1, NULL, 20, 'Arrowalley.com is based on innovation, like Business, Finance, Marketing, Health, Lifestyle, Real Estate, Travel, Technology, Digital Marketing, and Tips &amp; Tricks related topics that might be useful to you to get a piece of precise information. Arrowalley has a mission to convey significant substance to the audience.', '2023-05-22 16:34:40'),
(42, 2, NULL, 20, '2023-01-25', '2023-05-22 16:34:40'),
(43, 3, NULL, 20, '1', '2023-05-22 16:34:40'),
(44, 5, NULL, 20, 'United States', '2023-05-22 16:34:40'),
(45, 6, NULL, 21, 'TR', '2023-05-22 17:06:39'),
(46, 6, NULL, 22, 'IN', '2023-05-22 17:34:05'),
(47, 1, NULL, 22, '', '2023-05-22 17:34:05'),
(48, 5, NULL, 22, '', '2023-05-22 17:34:05'),
(49, 6, NULL, 23, 'JO', '2023-05-22 22:37:02'),
(50, 6, NULL, 24, 'PS', '2023-05-23 02:54:17'),
(51, 1, NULL, 25, '', '2023-05-23 07:45:39'),
(52, 5, NULL, 25, '', '2023-05-23 07:45:39'),
(53, 6, NULL, 26, 'DZ', '2023-05-23 15:56:38'),
(54, 6, NULL, 27, 'JO', '2023-05-23 21:19:35'),
(55, 6, NULL, 25, 'JO', '2023-05-23 21:23:36'),
(56, 6, NULL, 28, 'IQ', '2023-05-23 22:16:48'),
(57, 6, NULL, 29, 'IN', '2023-05-24 13:49:59'),
(58, 1, NULL, 29, 'Independent call girls in Haridwar, Haridwar escort service provided by Indian ladies. Get ultimate pleasure with Haridwar escorts near you.', '2023-05-24 13:49:59'),
(59, 2, NULL, 29, '2003-11-29', '2023-05-24 13:49:59'),
(60, 3, NULL, 29, '2', '2023-05-24 13:49:59'),
(61, 5, NULL, 29, 'Haridwar,Uttarakhand,India', '2023-05-24 13:49:59'),
(62, 6, NULL, 30, 'IN', '2023-05-24 14:49:47'),
(63, 1, NULL, 30, 'Hello, I am Dipal Sharma. I am 25 years old, a beautiful and sensual young man. I’m hot and broke. And I’m good at sex. I know the skills to satisfy you. I’m having sex as you’ve never had it before. Surat call girls satisfies you to the fullest. I’ll make you comfortable in bed. I know all the positions in bed. Whatever you want to try. I am an independent call girl in Surat. I also have beautiful girls. https://dipal.in/', '2023-05-24 14:49:47'),
(64, 2, NULL, 30, '2000-11-11', '2023-05-24 14:49:47'),
(65, 3, NULL, 30, '2', '2023-05-24 14:49:47'),
(66, 5, NULL, 30, '', '2023-05-24 14:49:47'),
(67, 4, NULL, 30, 'https://dipal.in/', '2023-05-24 14:49:47'),
(68, 6, NULL, 31, 'IN', '2023-05-24 16:20:17'),
(69, 1, NULL, 31, 'I Am Apsara Sharma Living in Dehradun If you are looking for independent model girls for your fun and enjoyment then contact my website.', '2023-05-24 16:20:17'),
(70, 3, NULL, 31, '2', '2023-05-24 16:20:17'),
(71, 5, NULL, 31, '', '2023-05-24 16:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `gr_custom_menu_items`
--

CREATE TABLE `gr_custom_menu_items` (
  `menu_item_id` bigint(20) NOT NULL,
  `string_constant` varchar(191) NOT NULL,
  `menu_icon_class` varchar(25) DEFAULT NULL,
  `page_id` bigint(20) DEFAULT NULL,
  `web_address` varchar(191) DEFAULT NULL,
  `link_target` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Open URL in same window\r\n1 = Open URL in New tab',
  `show_on_landing_page_header` int(11) NOT NULL DEFAULT 0,
  `show_on_landing_page_footer` int(11) NOT NULL DEFAULT 0,
  `show_on_entry_page` int(11) NOT NULL DEFAULT 0,
  `show_on_chat_page` int(11) NOT NULL DEFAULT 0,
  `show_on_chat_page_top` int(11) NOT NULL DEFAULT 0,
  `menu_item_order` int(11) NOT NULL DEFAULT 0,
  `menu_item_visibility` varchar(191) NOT NULL DEFAULT 'all',
  `disabled` int(11) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_custom_menu_items`
--

INSERT INTO `gr_custom_menu_items` (`menu_item_id`, `string_constant`, `menu_icon_class`, `page_id`, `web_address`, `link_target`, `show_on_landing_page_header`, `show_on_landing_page_footer`, `show_on_entry_page`, `show_on_chat_page`, `show_on_chat_page_top`, `menu_item_order`, `menu_item_visibility`, `disabled`, `created_on`, `updated_on`) VALUES
(1, 'custom_menu_item_1', 'bi-card-text', 2, '#', 0, 1, 1, 1, 0, 0, 3, '[\"1\",\"2\",\"3\",\"5\"]', 0, '2022-01-20 19:10:31', '2023-04-23 13:58:45'),
(2, 'custom_menu_item_2', 'bi-card-text', 3, '#', 0, 1, 1, 1, 0, 0, 2, 'all', 0, '2022-01-20 19:10:48', '2022-03-19 22:14:00'),
(3, 'custom_menu_item_3', 'bi-card-text', 1, '#', 0, 1, 0, 0, 0, 0, 1, '[\"1\",\"2\",\"3\",\"5\"]', 0, '2022-03-19 22:13:42', '2022-10-21 02:41:02'),
(4, 'custom_menu_item_4', 'bi-card-text', NULL, 'sitemap/', 0, 0, 1, 0, 0, 0, 4, '[\"1\",\"2\",\"3\",\"5\"]', 0, '2022-03-19 22:14:47', '2022-10-21 02:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `gr_custom_pages`
--

CREATE TABLE `gr_custom_pages` (
  `page_id` bigint(20) NOT NULL,
  `string_constant` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `meta_title` varchar(80) DEFAULT NULL,
  `meta_description` varchar(150) DEFAULT NULL,
  `disabled` int(11) NOT NULL DEFAULT 0,
  `who_all_can_view_page` varchar(191) DEFAULT 'all',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_custom_pages`
--

INSERT INTO `gr_custom_pages` (`page_id`, `string_constant`, `slug`, `meta_title`, `meta_description`, `disabled`, `who_all_can_view_page`, `created_on`, `updated_on`) VALUES
(1, 'custom_page_1', 'about', '', '', 0, '[\"1\",\"2\",\"3\",\"5\"]', '2021-09-26 18:44:30', '2022-09-29 18:11:20'),
(2, 'custom_page_2', 'terms', '', '', 0, '[\"1\",\"2\",\"3\",\"5\"]', '2021-09-26 18:44:03', '2022-06-14 10:06:37'),
(3, 'custom_page_3', 'privacy', '', '', 0, '[\"1\",\"2\",\"3\",\"5\"]', '2021-12-08 22:05:49', '2022-06-14 10:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `gr_friends`
--

CREATE TABLE `gr_friends` (
  `friendship_id` bigint(20) NOT NULL,
  `from_user_id` bigint(20) NOT NULL,
  `to_user_id` bigint(20) NOT NULL,
  `relation_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Pending 1 = Friends',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_friends`
--

INSERT INTO `gr_friends` (`friendship_id`, `from_user_id`, `to_user_id`, `relation_status`, `created_on`, `updated_on`) VALUES
(1, 25, 27, 0, '2023-05-23 21:23:58', '2023-05-23 21:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `gr_groups`
--

CREATE TABLE `gr_groups` (
  `group_id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(80) DEFAULT NULL,
  `meta_description` varchar(150) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `secret_group` int(11) NOT NULL DEFAULT 0,
  `secret_code` varchar(10) DEFAULT NULL,
  `unleavable` int(11) NOT NULL DEFAULT 0,
  `who_all_can_send_messages` varchar(199) DEFAULT NULL,
  `pin_group` int(11) NOT NULL DEFAULT 0,
  `auto_join_group` int(11) NOT NULL DEFAULT 0,
  `total_members` bigint(20) NOT NULL DEFAULT 0,
  `suspended` int(11) NOT NULL DEFAULT 0,
  `group_header_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Disabled\r\n1 = Enabled',
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_groups`
--

INSERT INTO `gr_groups` (`group_id`, `name`, `slug`, `description`, `meta_title`, `meta_description`, `password`, `secret_group`, `secret_code`, `unleavable`, `who_all_can_send_messages`, `pin_group`, `auto_join_group`, `total_members`, `suspended`, `group_header_status`, `created_by`, `created_on`, `updated_on`) VALUES
(1, 'غرفة شاتيور', NULL, '', NULL, NULL, NULL, 0, 'i6AKT02p', 0, '[\"2\",\"3\",\"4\"]', 0, 0, 2, 0, 0, 1, '2023-05-19 09:59:25', '2023-05-20 09:32:25'),
(2, 'غرفة مصرية', NULL, '', NULL, NULL, NULL, 0, 'goGszT6M', 0, '[\"2\",\"3\",\"4\"]', 0, 0, 4, 0, 0, 1, '2023-05-19 10:00:38', '2023-05-23 21:21:14'),
(3, 'بنات سوريا', NULL, '', NULL, NULL, NULL, 0, '65Mk2DOJ', 0, '[\"2\",\"3\",\"4\"]', 0, 0, 5, 0, 0, 1, '2023-05-19 10:00:44', '2023-05-23 02:55:27'),
(4, 'تجربة', NULL, '', NULL, NULL, NULL, 0, 'oTBMmIhK', 0, '[\"2\",\"3\",\"4\"]', 0, 0, 3, 0, 0, 1, '2023-05-19 10:01:53', '2023-05-23 22:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `gr_group_invitations`
--

CREATE TABLE `gr_group_invitations` (
  `group_invitation_id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `referrer_user_id` bigint(20) DEFAULT NULL,
  `related_email_address` varchar(191) DEFAULT NULL,
  `invitation_code` varchar(50) NOT NULL,
  `expired` int(11) NOT NULL DEFAULT 0 COMMENT '0 = No\r\n1 = Yes',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_group_members`
--

CREATE TABLE `gr_group_members` (
  `group_member_id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `group_role_id` bigint(20) NOT NULL DEFAULT 4,
  `referrer_user_id` bigint(20) DEFAULT 0,
  `last_read_message_id` bigint(20) DEFAULT 0,
  `load_message_id_from` bigint(20) DEFAULT NULL,
  `currently_browsing` int(11) NOT NULL DEFAULT 0,
  `previous_group_role_id` bigint(20) NOT NULL DEFAULT 4,
  `banned_till` datetime DEFAULT NULL,
  `joined_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_group_members`
--

INSERT INTO `gr_group_members` (`group_member_id`, `group_id`, `user_id`, `group_role_id`, `referrer_user_id`, `last_read_message_id`, `load_message_id_from`, `currently_browsing`, `previous_group_role_id`, `banned_till`, `joined_on`, `updated_on`) VALUES
(1, 1, 1, 2, 0, 10, NULL, 0, 2, NULL, '2023-05-19 09:59:25', '2023-05-19 09:59:25'),
(2, 2, 1, 2, 0, 21, NULL, 0, 2, NULL, '2023-05-19 10:00:38', '2023-05-19 10:00:38'),
(3, 3, 1, 2, 0, 18, NULL, 0, 2, NULL, '2023-05-19 10:00:44', '2023-05-19 10:00:44'),
(4, 4, 1, 2, 0, 23, NULL, 1, 2, NULL, '2023-05-19 10:01:53', '2023-05-19 10:01:53'),
(5, 3, 16, 4, 0, 5, NULL, 1, 4, NULL, '2023-05-20 04:43:33', '2023-05-20 04:43:33'),
(6, 1, 16, 4, 0, 6, NULL, 0, 4, NULL, '2023-05-20 04:43:40', '2023-05-20 04:43:40'),
(7, 2, 17, 4, 0, 11, NULL, 1, 4, NULL, '2023-05-21 15:32:27', '2023-05-21 15:32:27'),
(8, 3, 21, 4, 0, 13, NULL, 0, 4, NULL, '2023-05-22 17:06:55', '2023-05-22 17:06:55'),
(9, 2, 21, 4, 0, 14, NULL, 1, 4, NULL, '2023-05-22 17:08:31', '2023-05-22 17:08:31'),
(10, 3, 23, 4, 0, 16, NULL, 0, 4, NULL, '2023-05-22 22:37:12', '2023-05-22 22:37:12'),
(11, 3, 24, 4, 0, 18, NULL, 1, 4, NULL, '2023-05-23 02:55:12', '2023-05-23 02:55:12'),
(12, 4, 26, 4, 0, 20, NULL, 1, 4, NULL, '2023-05-23 15:57:12', '2023-05-23 15:57:12'),
(13, 2, 27, 4, 0, 21, NULL, 1, 4, NULL, '2023-05-23 21:21:14', '2023-05-23 21:21:14'),
(14, 4, 28, 4, 0, 23, NULL, 1, 4, NULL, '2023-05-23 22:17:05', '2023-05-23 22:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `gr_group_messages`
--

CREATE TABLE `gr_group_messages` (
  `group_message_id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `original_message` text NOT NULL,
  `filtered_message` text NOT NULL,
  `system_message` int(11) NOT NULL DEFAULT 0,
  `parent_message_id` bigint(20) DEFAULT NULL,
  `attachment_type` varchar(15) DEFAULT NULL,
  `attachments` text NOT NULL,
  `link_preview` varchar(191) DEFAULT NULL,
  `total_reactions` text DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_group_messages`
--

INSERT INTO `gr_group_messages` (`group_message_id`, `group_id`, `user_id`, `original_message`, `filtered_message`, `system_message`, `parent_message_id`, `attachment_type`, `attachments`, `link_preview`, `total_reactions`, `created_on`, `updated_on`) VALUES
(2, 2, 1, 'system_message', '{\"message\":\"created_group\",\"user_id\":\"1\"}', 1, NULL, NULL, '', NULL, NULL, '2023-05-19 10:00:38', '2023-05-19 10:00:38'),
(3, 3, 1, 'system_message', '{\"message\":\"created_group\",\"user_id\":\"1\"}', 1, NULL, NULL, '', NULL, NULL, '2023-05-19 10:00:44', '2023-05-19 10:00:44'),
(4, 4, 1, 'system_message', '{\"message\":\"created_group\",\"user_id\":\"1\"}', 1, NULL, NULL, '', NULL, NULL, '2023-05-19 10:01:53', '2023-05-19 10:01:53'),
(5, 3, 16, 'system_message', '{\"message\":\"joined_group\",\"user_id\":\"16\"}', 1, NULL, NULL, '', NULL, NULL, '2023-05-20 04:43:33', '2023-05-20 04:43:33'),
(11, 2, 17, 'system_message', '{\"message\":\"joined_group\",\"user_id\":\"17\"}', 1, NULL, NULL, '', NULL, NULL, '2023-05-21 15:32:27', '2023-05-21 15:32:27'),
(12, 3, 21, 'system_message', '{\"message\":\"joined_group\",\"user_id\":\"21\"}', 1, NULL, NULL, '', NULL, NULL, '2023-05-22 17:06:55', '2023-05-22 17:06:55'),
(13, 3, 21, '<p>مسالخير</p>', '<p>مسالخير</p>', 0, NULL, '', '', '', NULL, '2023-05-22 17:07:30', '2023-05-22 17:07:30'),
(14, 2, 21, 'system_message', '{\"message\":\"joined_group\",\"user_id\":\"21\"}', 1, NULL, NULL, '', NULL, NULL, '2023-05-22 17:08:31', '2023-05-22 17:08:31'),
(15, 3, 23, 'system_message', '{\"message\":\"joined_group\",\"user_id\":\"23\"}', 1, NULL, NULL, '', NULL, NULL, '2023-05-22 22:37:12', '2023-05-22 22:37:12'),
(16, 3, 23, '<p>Hgt</p>', '<p>Hgt</p>', 0, NULL, '', '', '', NULL, '2023-05-22 22:37:15', '2023-05-22 22:37:15'),
(17, 3, 24, 'system_message', '{\"message\":\"joined_group\",\"user_id\":\"24\"}', 1, NULL, NULL, '', NULL, NULL, '2023-05-23 02:55:12', '2023-05-23 02:55:12'),
(18, 3, 24, '<p>ا</p>', '<p>ا</p>', 0, NULL, '', '', '', NULL, '2023-05-23 02:55:27', '2023-05-23 02:55:27'),
(19, 4, 26, 'system_message', '{\"message\":\"joined_group\",\"user_id\":\"26\"}', 1, NULL, NULL, '', NULL, NULL, '2023-05-23 15:57:12', '2023-05-23 15:57:12'),
(20, 4, 26, '<p>اهلا</p>', '<p>اهلا</p>', 0, NULL, '', '', '', NULL, '2023-05-23 15:57:22', '2023-05-23 15:57:22'),
(21, 2, 27, 'system_message', '{\"message\":\"joined_group\",\"user_id\":\"27\"}', 1, NULL, NULL, '', NULL, NULL, '2023-05-23 21:21:14', '2023-05-23 21:21:14'),
(22, 4, 28, 'system_message', '{\"message\":\"joined_group\",\"user_id\":\"28\"}', 1, NULL, NULL, '', NULL, NULL, '2023-05-23 22:17:05', '2023-05-23 22:17:05'),
(23, 4, 28, '<p>هلو&nbsp;</p>', '<p>هلو </p>', 0, NULL, '', '', '', NULL, '2023-05-23 22:17:13', '2023-05-23 22:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `gr_group_messages_reactions`
--

CREATE TABLE `gr_group_messages_reactions` (
  `group_message_reaction_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `group_message_id` bigint(20) NOT NULL,
  `reaction_id` int(11) NOT NULL COMMENT '1 = Like\r\n2 = Love\r\n3 = Haha\r\n4 = Wow\r\n5 = Sad\r\n6 = Angry',
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_group_roles`
--

CREATE TABLE `gr_group_roles` (
  `group_role_id` bigint(20) NOT NULL,
  `string_constant` varchar(191) NOT NULL,
  `permissions` text NOT NULL,
  `group_role_attribute` varchar(20) DEFAULT 'group_role',
  `disabled` int(11) NOT NULL DEFAULT 0,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_group_roles`
--

INSERT INTO `gr_group_roles` (`group_role_id`, `string_constant`, `permissions`, `group_role_attribute`, `disabled`, `updated_on`) VALUES
(1, 'group_role_1', '{\"update\":\"group_roles\",\"show_label\":\"\",\"label_background_color\":\"#7b0909\",\"label_text_color\":\"#ff0a0a\",\"attribute\":\"banned_users\",\"disabled\":\"no\"}', 'banned_users', 0, '2022-02-09 08:15:00'),
(2, 'group_role_2', '{\"update\":\"group_roles\",\"language_id\":\"\",\"show_label\":\"no\",\"label_background_color\":\"#FF61BB\",\"label_text_color\":\"#FFFFFF\",\"attribute\":\"administrators\",\"disabled\":\"\",\"group\":[\"edit_group\",\"view_shared_files\",\"view_shared_links\",\"delete_group\"],\"group_members\":[\"view_group_members\",\"view_currently_online\",\"ban_users_from_group\",\"unban_users_from_group\",\"manage_user_roles\",\"remove_group_members\"],\"messages\":[\"send_message\",\"send_audio_message\",\"attach_files\",\"attach_from_storage\",\"attach_gifs\",\"attach_stickers\",\"check_read_receipts\",\"share_screenshot\",\"allow_sharing_links\",\"allow_sharing_email_addresses\",\"generate_link_preview\",\"download_attachments\",\"edit_own_message\",\"edit_messages\",\"delete_own_message\",\"delete_messages\",\"view_reactions\",\"react_messages\",\"reply_messages\",\"forward_messages\",\"mention_users\",\"mention_everyone\"],\"csrf_token\":\"NUz9VY8xHjhqTPQvIu1s\"}', 'administrators', 0, '2023-04-15 05:49:34'),
(3, 'group_role_3', '{\"update\":\"group_roles\",\"language_id\":\"\",\"show_label\":\"no\",\"label_background_color\":\"#9EFF00\",\"label_text_color\":\"#FFFFFF\",\"attribute\":\"moderators\",\"disabled\":\"\",\"group\":[\"view_shared_files\",\"view_shared_links\"],\"group_members\":[\"view_group_members\",\"view_currently_online\",\"ban_users_from_group\",\"unban_users_from_group\"],\"messages\":[\"send_message\",\"send_audio_message\",\"attach_files\",\"attach_from_storage\",\"attach_gifs\",\"attach_stickers\",\"check_read_receipts\",\"share_screenshot\",\"allow_sharing_links\",\"allow_sharing_email_addresses\",\"generate_link_preview\",\"download_attachments\",\"edit_own_message\",\"edit_messages\",\"delete_own_message\",\"delete_messages\",\"view_reactions\",\"react_messages\",\"reply_messages\",\"forward_messages\",\"mention_users\"]}', 'moderators', 0, '2023-04-23 19:04:32'),
(4, 'group_role_4', '{\"update\":\"group_roles\",\"language_id\":\"\",\"show_label\":\"no\",\"label_background_color\":\"#FF4D55\",\"label_text_color\":\"#FFFFFF\",\"attribute\":\"default_group_role\",\"disabled\":\"\",\"group\":[\"view_shared_files\",\"view_shared_links\"],\"group_members\":[\"view_group_members\",\"view_currently_online\"],\"messages\":[\"send_message\",\"send_audio_message\",\"attach_files\",\"attach_from_storage\",\"attach_gifs\",\"attach_stickers\",\"check_read_receipts\",\"share_screenshot\",\"allow_sharing_links\",\"allow_sharing_email_addresses\",\"generate_link_preview\",\"download_attachments\",\"edit_own_message\",\"delete_own_message\",\"view_reactions\",\"react_messages\",\"reply_messages\",\"forward_messages\",\"mention_users\"]}', 'default_group_role', 0, '2023-04-23 19:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `gr_languages`
--

CREATE TABLE `gr_languages` (
  `language_id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `iso_code` varchar(10) NOT NULL DEFAULT 'en',
  `text_direction` varchar(5) NOT NULL DEFAULT 'ltr',
  `disabled` int(11) NOT NULL DEFAULT 0,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_languages`
--

INSERT INTO `gr_languages` (`language_id`, `name`, `iso_code`, `text_direction`, `disabled`, `updated_on`) VALUES
(1, 'English', 'en', 'ltr', 0, '2023-01-11 14:31:16'),
(2, 'العربية', 'ar', 'rtl', 0, '2023-05-15 13:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `gr_language_strings`
--

CREATE TABLE `gr_language_strings` (
  `string_id` bigint(20) NOT NULL,
  `string_constant` varchar(191) NOT NULL,
  `string_value` text DEFAULT NULL,
  `string_type` varchar(10) NOT NULL DEFAULT 'one-line',
  `skip_update` int(11) NOT NULL DEFAULT 0,
  `skip_cache` int(11) NOT NULL DEFAULT 0,
  `language_id` bigint(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_language_strings`
--

INSERT INTO `gr_language_strings` (`string_id`, `string_constant`, `string_value`, `string_type`, `skip_update`, `skip_cache`, `language_id`) VALUES
(1, 'site_name', 'Site Name', 'one-line', 0, 0, 1),
(2, 'invited', 'Invited', 'one-line', 0, 0, 1),
(3, 'edit_profile', 'Edit Profile', 'one-line', 0, 0, 1),
(4, 'login', 'Login', 'one-line', 0, 0, 1),
(5, 'new_password', 'New Password', 'one-line', 0, 0, 1),
(6, 'update', 'Update', 'one-line', 0, 0, 1),
(7, 'upload_avatar', 'Upload Avatar', 'one-line', 0, 0, 1),
(8, 'create_user_if_not_exists', 'Create User if not exists', 'one-line', 0, 0, 1),
(9, 'mail_login_info', 'Mail Login Info', 'one-line', 0, 0, 1),
(10, 'icon', 'Icon', 'one-line', 0, 0, 1),
(11, 'cookie_consent_modal_title', 'Cookie Consent', 'one-line', 0, 0, 1),
(12, 'advert_name', 'Advert Name', 'one-line', 0, 0, 1),
(13, 'add_to_group', 'Add to Group', 'one-line', 0, 0, 1),
(14, 'other', 'Other', 'one-line', 0, 0, 1),
(15, 'requires_minimum_username_length', 'Requires Minimum Username Length', 'one-line', 0, 0, 1),
(16, 'banned_till', 'Banned Till', 'one-line', 0, 0, 1),
(17, 'visit', 'Visit', 'one-line', 0, 0, 1),
(18, 'site_description', 'Site Description', 'one-line', 0, 0, 1),
(19, 'smtp_username', 'SMTP Username', 'one-line', 0, 0, 1),
(20, 'unban_from_site_confirmation', 'Are you sure you want to allow this user from accessing site ?', 'one-line', 0, 0, 1),
(21, 'appearance', 'Appearance', 'one-line', 0, 0, 1),
(22, 'language', 'Language', 'one-line', 0, 0, 1),
(23, 'open', 'Open', 'one-line', 0, 0, 1),
(24, 'import_json', 'Select JSON File', 'one-line', 0, 0, 1),
(25, 'inbox', 'Inbox', 'one-line', 0, 0, 1),
(26, 'advert_placement', 'Ad Placement', 'one-line', 0, 0, 1),
(27, 'password_protect', 'Password Protect', 'one-line', 0, 0, 1),
(28, 'rejected', 'Rejected', 'one-line', 0, 0, 1),
(29, 'download', 'Download', 'one-line', 0, 0, 1),
(30, 'sender_name', 'Sender Name', 'one-line', 0, 0, 1),
(31, 'view_message', 'View Message', 'one-line', 0, 0, 1),
(32, 'smtp_password', 'SMTP Password', 'one-line', 0, 0, 1),
(33, 'add', 'Add', 'one-line', 0, 0, 1),
(34, 'exceeds_username_length', 'Exceeds Maximum Username Length', 'one-line', 0, 0, 1),
(35, 'supported_image_formats', 'Supported Image Formats', 'one-line', 0, 0, 1),
(36, 'blacklist', 'Blacklist', 'one-line', 0, 0, 1),
(37, 'users', 'Users', 'one-line', 0, 0, 1),
(38, 'info', 'Info', 'one-line', 0, 0, 1),
(39, 'smtp_authentication', 'SMTP Authentication', 'one-line', 0, 0, 1),
(40, 'group_icon', 'Group Icon', 'one-line', 0, 0, 1),
(41, 'user_registration', 'User Registration', 'one-line', 0, 0, 1),
(42, 'edit_own_group', 'Edit own Group', 'one-line', 0, 0, 1),
(43, 'ignored', 'Ignored', 'one-line', 0, 0, 1),
(44, 'view', 'View', 'one-line', 0, 0, 1),
(45, 'not_found_page_expression', 'Oops!', 'one-line', 0, 0, 1),
(46, 'deactivate_account', 'Deactivate Account', 'one-line', 0, 0, 1),
(47, 'login_text', 'Sign In to Your Account', 'one-line', 0, 0, 1),
(48, 'send_as_user', 'Send as another User', 'one-line', 0, 0, 1),
(49, 'last_login', 'Last Login', 'one-line', 0, 0, 1),
(50, 'custom_field_6_options', '{\"DZ\":\"Algeria\",\"AO\":\"Angola\",\"BJ\":\"Benin\",\"BW\":\"Botswana\",\"BF\":\"Burkina Faso\",\"BI\":\"Burundi\",\"CM\":\"Cameroon\",\"CV\":\"Cape Verde\",\"CF\":\"Central African Republic\",\"TD\":\"Chad\",\"KM\":\"Comoros\",\"CD\":\"Congo [DRC]\",\"CG\":\"Congo [Republic]\",\"DJ\":\"Djibouti\",\"EG\":\"Egypt\",\"GQ\":\"Equatorial Guinea\",\"ER\":\"Eritrea\",\"ET\":\"Ethiopia\",\"GA\":\"Gabon\",\"GM\":\"Gambia\",\"GH\":\"Ghana\",\"GN\":\"Guinea\",\"GW\":\"Guinea-Bissau\",\"CI\":\"Ivory Coast\",\"KE\":\"Kenya\",\"LS\":\"Lesotho\",\"LR\":\"Liberia\",\"LY\":\"Libya\",\"MG\":\"Madagascar\",\"MW\":\"Malawi\",\"ML\":\"Mali\",\"MR\":\"Mauritania\",\"MU\":\"Mauritius\",\"YT\":\"Mayotte\",\"MA\":\"Morocco\",\"MZ\":\"Mozambique\",\"NA\":\"Namibia\",\"NE\":\"Niger\",\"NG\":\"Nigeria\",\"RW\":\"Rwanda\",\"RE\":\"R\\u00e9union\",\"SH\":\"Saint Helena\",\"SN\":\"Senegal\",\"SC\":\"Seychelles\",\"SL\":\"Sierra Leone\",\"SO\":\"Somalia\",\"ZA\":\"South Africa\",\"SD\":\"Sudan\",\"SZ\":\"Swaziland\",\"ST\":\"S\\u00e3o Tom\\u00e9 and Pr\\u00edncipe\",\"TZ\":\"Tanzania\",\"TG\":\"Togo\",\"TN\":\"Tunisia\",\"UG\":\"Uganda\",\"EH\":\"Western Sahara\",\"ZM\":\"Zambia\",\"ZW\":\"Zimbabwe\",\"AQ\":\"Antarctica\",\"BV\":\"Bouvet Island\",\"TF\":\"French Southern Territories\",\"HM\":\"Heard Island and McDonald Island\",\"GS\":\"South Georgia and the South Sandwich Islands\",\"AF\":\"Afghanistan\",\"AM\":\"Armenia\",\"AZ\":\"Azerbaijan\",\"BH\":\"Bahrain\",\"BD\":\"Bangladesh\",\"BT\":\"Bhutan\",\"IO\":\"British Indian Ocean Territory\",\"BN\":\"Brunei\",\"KH\":\"Cambodia\",\"CN\":\"China\",\"CX\":\"Christmas Island\",\"CC\":\"Cocos [Keeling] Islands\",\"GE\":\"Georgia\",\"HK\":\"Hong Kong\",\"IN\":\"India\",\"ID\":\"Indonesia\",\"IR\":\"Iran\",\"IQ\":\"Iraq\",\"IL\":\"Israel\",\"JP\":\"Japan\",\"JO\":\"Jordan\",\"KZ\":\"Kazakhstan\",\"KW\":\"Kuwait\",\"KG\":\"Kyrgyzstan\",\"LA\":\"Laos\",\"LB\":\"Lebanon\",\"MO\":\"Macau\",\"MY\":\"Malaysia\",\"MV\":\"Maldives\",\"MN\":\"Mongolia\",\"MM\":\"Myanmar [Burma]\",\"NP\":\"Nepal\",\"KP\":\"North Korea\",\"OM\":\"Oman\",\"PK\":\"Pakistan\",\"PS\":\"Palestinian Territories\",\"PH\":\"Philippines\",\"QA\":\"Qatar\",\"SA\":\"Saudi Arabia\",\"SG\":\"Singapore\",\"KR\":\"South Korea\",\"LK\":\"Sri Lanka\",\"SY\":\"Syria\",\"TW\":\"Taiwan\",\"TJ\":\"Tajikistan\",\"TH\":\"Thailand\",\"TR\":\"Turkey\",\"TM\":\"Turkmenistan\",\"AE\":\"United Arab Emirates\",\"UZ\":\"Uzbekistan\",\"VN\":\"Vietnam\",\"YE\":\"Yemen\",\"AL\":\"Albania\",\"AD\":\"Andorra\",\"AT\":\"Austria\",\"BY\":\"Belarus\",\"BE\":\"Belgium\",\"BA\":\"Bosnia and Herzegovina\",\"BG\":\"Bulgaria\",\"HR\":\"Croatia\",\"CY\":\"Cyprus\",\"CZ\":\"Czech Republic\",\"DK\":\"Denmark\",\"EE\":\"Estonia\",\"FO\":\"Faroe Islands\",\"FI\":\"Finland\",\"FR\":\"France\",\"DE\":\"Germany\",\"GI\":\"Gibraltar\",\"GR\":\"Greece\",\"GG\":\"Guernsey\",\"HU\":\"Hungary\",\"IS\":\"Iceland\",\"IE\":\"Ireland\",\"IM\":\"Isle of Man\",\"IT\":\"Italy\",\"JE\":\"Jersey\",\"XK\":\"Kosovo\",\"LV\":\"Latvia\",\"LI\":\"Liechtenstein\",\"LT\":\"Lithuania\",\"LU\":\"Luxembourg\",\"MK\":\"Macedonia\",\"MT\":\"Malta\",\"MD\":\"Moldova\",\"MC\":\"Monaco\",\"ME\":\"Montenegro\",\"NL\":\"Netherlands\",\"NO\":\"Norway\",\"PL\":\"Poland\",\"PT\":\"Portugal\",\"RO\":\"Romania\",\"RU\":\"Russia\",\"SM\":\"San Marino\",\"RS\":\"Serbia\",\"CS\":\"Serbia and Montenegro\",\"SK\":\"Slovakia\",\"SI\":\"Slovenia\",\"ES\":\"Spain\",\"SJ\":\"Svalbard and Jan Mayen\",\"SE\":\"Sweden\",\"CH\":\"Switzerland\",\"UA\":\"Ukraine\",\"GB\":\"United Kingdom\",\"VA\":\"Vatican City\",\"AX\":\"\\u00c5land Islands\",\"AI\":\"Anguilla\",\"AG\":\"Antigua and Barbuda\",\"AW\":\"Aruba\",\"BS\":\"Bahamas\",\"BB\":\"Barbados\",\"BZ\":\"Belize\",\"BM\":\"Bermuda\",\"BQ\":\"Bonaire\",\"VG\":\"British Virgin Islands\",\"CA\":\"Canada\",\"KY\":\"Cayman Islands\",\"CR\":\"Costa Rica\",\"CU\":\"Cuba\",\"CW\":\"Curacao\",\"DM\":\"Dominica\",\"DO\":\"Dominican Republic\",\"SV\":\"El Salvador\",\"GL\":\"Greenland\",\"GD\":\"Grenada\",\"GP\":\"Guadeloupe\",\"GT\":\"Guatemala\",\"HT\":\"Haiti\",\"HN\":\"Honduras\",\"JM\":\"Jamaica\",\"MQ\":\"Martinique\",\"MX\":\"Mexico\",\"MS\":\"Montserrat\",\"AN\":\"Netherlands Antilles\",\"NI\":\"Nicaragua\",\"PA\":\"Panama\",\"PR\":\"Puerto Rico\",\"BL\":\"Saint Barth\\u00e9lemy\",\"KN\":\"Saint Kitts and Nevis\",\"LC\":\"Saint Lucia\",\"MF\":\"Saint Martin\",\"PM\":\"Saint Pierre and Miquelon\",\"VC\":\"Saint Vincent and the Grenadines\",\"SX\":\"Sint Maarten\",\"TT\":\"Trinidad and Tobago\",\"TC\":\"Turks and Caicos Islands\",\"VI\":\"U.S. Virgin Islands\",\"US\":\"United States\",\"AR\":\"Argentina\",\"BO\":\"Bolivia\",\"BR\":\"Brazil\",\"CL\":\"Chile\",\"CO\":\"Colombia\",\"EC\":\"Ecuador\",\"FK\":\"Falkland Islands\",\"GF\":\"French Guiana\",\"GY\":\"Guyana\",\"PY\":\"Paraguay\",\"PE\":\"Peru\",\"SR\":\"Suriname\",\"UY\":\"Uruguay\",\"VE\":\"Venezuela\",\"AS\":\"American Samoa\",\"AU\":\"Australia\",\"CK\":\"Cook Islands\",\"TL\":\"East Timor\",\"FJ\":\"Fiji\",\"PF\":\"French Polynesia\",\"GU\":\"Guam\",\"KI\":\"Kiribati\",\"MH\":\"Marshall Islands\",\"FM\":\"Micronesia\",\"NR\":\"Nauru\",\"NC\":\"New Caledonia\",\"NZ\":\"New Zealand\",\"NU\":\"Niue\",\"NF\":\"Norfolk Island\",\"MP\":\"Northern Mariana Islands\",\"PW\":\"Palau\",\"PG\":\"Papua New Guinea\",\"PN\":\"Pitcairn Islands\",\"WS\":\"Samoa\",\"SB\":\"Solomon Islands\",\"TK\":\"Tokelau\",\"TO\":\"Tonga\",\"TV\":\"Tuvalu\",\"UM\":\"U.S. Minor Outlying Islands\",\"VU\":\"Vanuatu\",\"WF\":\"Wallis and Futuna\"}', 'multi_line', 1, 0, 1),
(51, 'smtp_protocol', 'SMTP (SSL/TLS)', 'one-line', 0, 0, 1),
(52, 'create_advert', 'Create Advert', 'one-line', 0, 0, 1),
(53, 'not_found_page_description', 'The resource you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'multi-line', 0, 0, 1),
(54, 'guest_login_text', 'Create a Guest User account', 'one-line', 0, 0, 1),
(55, 'edit_role', 'Edit Role', 'one-line', 0, 0, 1),
(56, 'temporarily_banned_from_group', 'Temporarily Banned from Group', 'one-line', 0, 0, 1),
(57, 'message', 'Message', 'one-line', 0, 0, 1),
(58, 'empty_profile', 'Empty Profile', 'one-line', 0, 0, 1),
(59, 'ban_ip_addresses', 'Ban IP addresses', 'one-line', 0, 0, 1),
(60, 'default_font', 'Default Font', 'one-line', 0, 0, 1),
(61, 'whitelist', 'Whitelist', 'one-line', 0, 0, 1),
(62, 'signup', 'Signup', 'one-line', 0, 0, 1),
(63, 'avatars', 'Avatars', 'one-line', 0, 0, 1),
(64, 'smtp_host', 'SMTP Host', 'one-line', 0, 0, 1),
(65, 'title', 'Title', 'one-line', 0, 0, 1),
(66, 'updated_group_info', 'Updated Group Info', 'one-line', 0, 0, 1),
(67, 'ban_from_group', 'Ban From Group', 'one-line', 0, 0, 1),
(68, 'role_name', 'Role Name', 'one-line', 0, 0, 1),
(69, 'pin_group', 'Pin Group', 'one-line', 0, 0, 1),
(70, 'delete_own_group', 'Delete their own Group', 'one-line', 0, 0, 1),
(71, 'delete', 'Delete', 'one-line', 0, 0, 1),
(72, 'manage_avatars', 'Manage Avatars', 'one-line', 0, 0, 1),
(73, 'appid', 'APP/Client ID', 'one-line', 0, 0, 1),
(74, 'temporarily_banned', 'Temporarily Banned', 'one-line', 0, 0, 1),
(75, 'not_found_page_button', 'Go To Homepage', 'one-line', 0, 0, 1),
(76, 'action_taken', 'Action Taken', 'one-line', 0, 0, 1),
(77, 'choose_avatar', 'Choose an Avatar', 'one-line', 0, 0, 1),
(78, 'edit_menu_item', 'Edit Menu Item', 'one-line', 0, 0, 1),
(79, 'unban_ip_addresses', 'Unban IP addresses', 'one-line', 0, 0, 1),
(80, 'signup_text', 'Create a new Account', 'one-line', 0, 0, 1),
(81, 'search_here', 'Search here', 'one-line', 0, 0, 1),
(82, 'enable', 'Enable', 'one-line', 0, 0, 1),
(83, 'deactivated', 'Deactivated', 'one-line', 0, 0, 1),
(84, 'radio_station', 'Radio Station', 'one-line', 0, 0, 1),
(85, 'system_variables', 'System Variables', 'one-line', 0, 0, 1),
(86, 'logout', 'Logout', 'one-line', 0, 0, 1),
(87, 'stickers', 'Stickers', 'one-line', 0, 0, 1),
(88, 'forgot_password_text', 'We will send you password recovery instruction to the email address associated with your account.', 'one-line', 0, 0, 1),
(89, 'report', 'Report', 'one-line', 0, 0, 1),
(90, 'agree', 'Agree', 'one-line', 0, 0, 1),
(91, 'attach_from_storage', 'Attach from Storage', 'one-line', 0, 0, 1),
(92, 'screenshot', 'Screenshot', 'one-line', 0, 0, 1),
(93, 'disable', 'Disable', 'one-line', 0, 0, 1),
(94, 'reload', 'Reload', 'one-line', 0, 0, 1),
(95, 'mentioned_group_chat', 'Mentioned you in group chat', 'one-line', 0, 0, 1),
(96, 'send_mail', 'Send Mail', 'one-line', 0, 0, 1),
(97, 'general_settings', 'General Settings', 'one-line', 0, 0, 1),
(98, 'strict_mode', 'Strict Mode', 'one-line', 0, 0, 1),
(99, 'block_user', 'Block User', 'one-line', 0, 0, 1),
(100, 'options', 'Options', 'one-line', 0, 0, 1),
(101, 'audio_player', 'Audio Player', 'one-line', 0, 0, 1),
(102, 'who_all_can_send_messages', 'Who all can Send Messages', 'one-line', 0, 0, 1),
(103, 'gravatar', 'Gravatar', 'one-line', 0, 0, 1),
(104, 'onesignal', 'OneSignal', 'one-line', 0, 0, 1),
(105, 'ban_ip_addresses_confirmation', 'Are you sure you want to block user IP addresses ?', 'one-line', 0, 0, 1),
(106, 'switch', 'Switch', 'one-line', 0, 0, 1),
(107, 'name_color', 'Name Color', 'one-line', 0, 0, 1),
(108, 'minimum_username_length', 'Minimum Username Length', 'one-line', 0, 0, 1),
(109, 'onesignal_app_id', 'OneSignal APP ID', 'one-line', 0, 0, 1),
(110, 'confirm_delete', 'Are you sure you want to delete the selected item(s) ?', 'one-line', 0, 0, 1),
(111, 'onesignal_rest_api_key', 'OneSignal REST API Key', 'one-line', 0, 0, 1),
(112, 'audio_files', 'Audio Files', 'one-line', 0, 0, 1),
(113, 'logo', 'Logo', 'one-line', 0, 0, 1),
(114, 'ban', 'Ban', 'one-line', 0, 0, 1),
(115, 'smtp_port', 'SMTP Port', 'one-line', 0, 0, 1),
(116, 'group_role', 'Group Role', 'one-line', 0, 0, 1),
(117, 'back_to_login', 'Back to Login', 'one-line', 0, 0, 1),
(118, 'confirm_join', 'Are you sure you would like to be part of this group?', 'one-line', 0, 0, 1),
(119, 'invalid_email_address', 'Invalid Email Address', 'one-line', 0, 0, 1),
(120, 'left_group', 'Left the Group Chat', 'one-line', 0, 0, 1),
(121, 'device_blocked', 'Your Device had been Blocked. Maximum Login Attempts Exceeded. Try again in one hour.', 'one-line', 0, 0, 1),
(122, 'unban_ip_addresses_confirmation', 'Are you sure you want to allow user IP addresses ?', 'one-line', 0, 0, 1),
(123, 'replied_group_message', 'Posted a response to your group chat message', 'one-line', 0, 0, 1),
(124, 'playlist', 'Playlist', 'one-line', 0, 0, 1),
(125, 'onesignal_safari_web_id', 'OneSignal Safari Web ID', 'one-line', 0, 0, 1),
(126, 'favicon', 'Favicon', 'one-line', 0, 0, 1),
(127, 'view_group_members', 'View Group Members', 'one-line', 0, 0, 1),
(128, 'attribute', 'Attribute', 'one-line', 0, 0, 1),
(129, 'ip_address', 'IP address', 'one-line', 0, 0, 1),
(130, 'system_default', 'Default', 'one-line', 0, 0, 1),
(131, 'new', 'New', 'one-line', 0, 0, 1),
(132, 'site_role', 'Site Role', 'one-line', 0, 0, 1),
(133, 'view_profile', 'View Profile', 'one-line', 0, 0, 1),
(134, 'default_site_role', 'Default Site Role', 'one-line', 0, 0, 1),
(135, 'edit_group', 'Edit Group', 'one-line', 0, 0, 1),
(136, 'view_currently_online', 'View Currently Online', 'one-line', 0, 0, 1),
(137, 'reply', 'Reply', 'one-line', 0, 0, 1),
(138, 'guest_users', 'Guest Users', 'one-line', 0, 0, 1),
(139, 'protected_group', 'Protected Group', 'one-line', 0, 0, 1),
(140, 'minutes', 'Minutes', 'one-line', 0, 0, 1),
(141, 'roles', 'Site Roles', 'one-line', 0, 0, 1),
(142, 'push_notification_icon', 'Push Notification Icon', 'one-line', 0, 0, 1),
(143, 'group_url', 'Group URL', 'one-line', 0, 0, 1),
(144, 'offline_page_description', 'Sorry, it looks like you have lost your internet connection or the server is not responding at the moment. Please refresh the page or try again later.', 'one-line', 0, 0, 1),
(145, 'add_audio', 'Add Audio', 'one-line', 0, 0, 1),
(146, 'providers', 'Providers', 'one-line', 0, 0, 1),
(147, 'current_role', 'Current Role', 'one-line', 0, 0, 1),
(148, 'custom_menu_item_1', 'Terms', 'one-line', 0, 0, 1),
(149, 'non_latin_usernames', 'Non Latin Usernames', 'one-line', 0, 0, 1),
(150, 'add_members', 'Add Members', 'one-line', 0, 0, 1),
(151, 'invalid_login', 'Invalid Login Credentials', 'one-line', 0, 0, 1),
(152, 'members', 'Members', 'one-line', 0, 0, 1),
(153, 'timestamp', 'Timestamp', 'one-line', 0, 0, 1),
(154, 'unverified_users', 'Unverified Users', 'one-line', 0, 0, 1),
(155, 'image', 'Image', 'one-line', 0, 0, 1),
(156, 'disagree', 'Disagree', 'one-line', 0, 0, 1),
(157, 'full_name', 'Full Name', 'one-line', 0, 0, 1),
(158, 'onesignal_prompt_message', 'We would like to send you Push Notifications for the latest Updates.', 'one-line', 0, 0, 1),
(159, 'typing_indicator', 'Typing Indicator', 'one-line', 0, 0, 1),
(160, 'headers_footers', 'Headers &amp; Footers', 'one-line', 0, 0, 1),
(161, 'content', 'Content', 'one-line', 0, 0, 1),
(162, 'platform', 'Platform', 'one-line', 0, 0, 1),
(163, 'ban_from_group_confirmation', 'Are you sure you want to ban this user from Group ?', 'one-line', 0, 0, 1),
(164, 'denied', 'Permission Denied', 'one-line', 0, 0, 1),
(165, 'now_playing', 'Now Playing', 'one-line', 0, 0, 1),
(166, 'offline_page_button', 'Refresh', 'one-line', 0, 0, 1),
(167, 'sending_limit', 'Sending Limit (Per Minute)', 'one-line', 0, 0, 1),
(168, 'dateformat', 'Date Format', 'one-line', 0, 0, 1),
(169, 'banned_users', 'Banned Users', 'one-line', 0, 0, 1),
(170, 'share', 'Share', 'one-line', 0, 0, 1),
(171, 'onesignal_prompt_accept_button', 'Allow', 'one-line', 0, 0, 1),
(172, 'view_public_groups', 'View Public Groups', 'one-line', 0, 0, 1),
(173, 'confirm_your_email_address', 'You are required to verify your email address. We have sent an email with a confirmation link to your email address. In order to complete the sign-up process, please click the confirmation link.', 'one-line', 0, 0, 1),
(174, 'search', 'Search', 'one-line', 0, 0, 1),
(175, 'join_group', 'Join Group', 'one-line', 0, 0, 1),
(176, 'dark_mode', 'Dark Mode', 'one-line', 0, 0, 1),
(177, 'account_banned', 'Your account has been banned for violating the Terms of Service.', 'one-line', 0, 0, 1),
(178, 'badge', 'Badge', 'one-line', 0, 0, 1),
(179, 'onesignal_prompt_cancel_button', 'Cancel', 'one-line', 0, 0, 1),
(180, 'view_secret_groups', 'View Secret Groups', 'one-line', 0, 0, 1),
(181, 'slideshows', 'Slideshows', 'one-line', 0, 0, 1),
(182, 'reply_to', 'Reply To', 'one-line', 0, 0, 1),
(183, 'join', 'Join', 'one-line', 0, 0, 1),
(184, 'edit_site_role', 'Edit Site Role', 'one-line', 0, 0, 1),
(185, 'add_images', 'Add Images', 'one-line', 0, 0, 1),
(186, 'unknown', 'Unknown', 'one-line', 0, 0, 1),
(187, 'sending_limit_reached', 'Sending Limit Reached. Please wait : ', 'one-line', 0, 0, 1),
(188, 'slideshow', 'Slideshow', 'one-line', 0, 0, 1),
(189, 'go_offline', 'Go Offline', 'one-line', 0, 0, 1),
(190, 'not_found_page_title', '404 - Page not found', 'one-line', 0, 0, 1),
(191, 'non_member', 'Non Member', 'one-line', 0, 0, 1),
(192, 'languages', 'Languages', 'one-line', 0, 0, 1),
(193, 'custom_menu_item_2', 'Privacy Policy', 'one-line', 0, 0, 1),
(194, 'edit_audio', 'Edit Audio', 'one-line', 0, 0, 1),
(195, 'all_group_members', 'All Group Members', 'one-line', 0, 0, 1),
(196, 'maximum_username_length', 'Maximum Username Length', 'one-line', 0, 0, 1),
(197, 'export_chat', 'Export Chat', 'one-line', 0, 0, 1),
(198, 'confirm_password', 'Confirm Password', 'one-line', 0, 0, 1),
(199, 'report_group', 'Report Group', 'one-line', 0, 0, 1),
(200, 'cookie_consent_modal_content', 'We may use cookies, web beacons, tracking pixels, and other tracking technologies when you visit our website, including any other media form, media channel, mobile website, or mobile application related or connected thereto (collectively, the &quot;Site&quot;) to help customize the Site and improve your experience. We reserve the right to make changes to this Cookie Policy at any time and for any reason. Any changes or modifications will be effective immediately upon posting the updated Cookie Policy on the Site, and you waive the right to receive specific notice of each such change or modification. You are encouraged to periodically review this Cookie Policy to stay informed of updates. You will be deemed to have been made aware of, will be subject to, and will be deemed to have accepted the changes in any revised Cookie Policy by your continued use of the Site after the date such revised Cookie Policy is posted.', 'one-line', 0, 0, 1),
(201, 'slug', 'Slug', 'one-line', 0, 0, 1),
(202, 'web_push_new_pm_message', 'Sent you a private message.', 'one-line', 0, 0, 1),
(203, 'secret_group', 'Secret Group', 'one-line', 0, 0, 1),
(204, 'maximum_storage_space', 'Maximum Storage Space (MB)', 'one-line', 0, 0, 1),
(205, 'system_email_address', 'System Email Address', 'one-line', 0, 0, 1),
(206, 'confirm_leave', ' Are you sure you want to leave this group?', 'one-line', 0, 0, 1),
(207, 'web_push_sent_reply_message', 'Replied to Your Message', 'one-line', 0, 0, 1),
(208, 'view_password_protected_groups', 'View Password Protected Groups', 'one-line', 0, 0, 1),
(209, 'category', 'Category', 'one-line', 0, 0, 1),
(210, 'light_mode', 'Light Mode', 'one-line', 0, 0, 1),
(211, 'seconds', 'Seconds', 'one-line', 0, 0, 1),
(212, 'joined_group', 'Joined the Group Chat', 'one-line', 0, 0, 1),
(213, 'mail_footer_text', 'If you have any questions or concerns, \\n please feel free to email us at', 'one-line', 0, 0, 1),
(214, 'version', 'Version', 'one-line', 0, 0, 1),
(215, 'custom_page_3_content', '[YOU CAN MODIFY THE PAGE CONTENTS VIA CUSTOM PAGES MODULE]', 'multi_line', 1, 1, 1),
(216, 'ffmpeg_binaries_path', 'FFmpeg Binaries Path', 'one-line', 0, 0, 1),
(217, 'shared_file', 'Shared a File', 'one-line', 0, 0, 1),
(218, 'chat', 'Chat', 'one-line', 0, 0, 1),
(219, 'user_email_verification', 'User Email Verification', 'one-line', 0, 0, 1),
(220, 'file_name', 'File Name', 'one-line', 0, 0, 1),
(221, 'banned', 'Banned', 'one-line', 0, 0, 1),
(222, 'core_settings', 'Core Settings', 'one-line', 0, 0, 1),
(223, 'short_text_field', 'Short Text', 'one-line', 0, 0, 1),
(224, 'member', 'Member', 'one-line', 0, 0, 1),
(225, 'allowed_file_formats', 'Allowed File Formats', 'one-line', 0, 0, 1),
(226, 'edit_provider', 'Edit Provider', 'one-line', 0, 0, 1),
(227, 'idle', 'Idle', 'one-line', 0, 0, 1),
(228, 'reset_password_email_subject', 'Recover your Account', 'one-line', 0, 0, 1),
(229, 'unban_from_group', 'Unban from Group', 'one-line', 0, 0, 1),
(230, 'edit', 'Edit', 'one-line', 0, 0, 1),
(231, 'unblocked', 'Unblocked', 'one-line', 0, 0, 1),
(232, 'unban', 'Unban', 'one-line', 0, 0, 1),
(233, 'send_message', 'Send Message', 'one-line', 0, 0, 1),
(234, 'group', 'Group', 'one-line', 0, 0, 1),
(235, 'inappropriate', 'Inappropriate', 'one-line', 0, 0, 1),
(236, 'user_agent', 'User Agent', 'one-line', 0, 0, 1),
(237, 'denary_border_color', 'Denary Border Color', 'one-line', 0, 0, 1),
(238, 'unban_from_group_confirmation', 'Are you sure you want to unban this user from Group ?', 'one-line', 0, 0, 1),
(239, 'someone', 'Someone', 'one-line', 0, 0, 1),
(240, 'secondary_border_color', 'Secondary Border Color', 'one-line', 0, 0, 1),
(241, 'invite_users', 'Invite Users', 'one-line', 0, 0, 1),
(242, 'created_group', 'Created Group', 'one-line', 0, 0, 1),
(243, 'cover_pic', 'Cover Pic', 'one-line', 0, 0, 1),
(244, 'today', 'Today', 'one-line', 0, 0, 1),
(245, 'default_skin_mode', 'Default Color Scheme', 'one-line', 0, 0, 1),
(246, 'reset_password_email_heading', 'Trouble signing in?', 'one-line', 0, 0, 1),
(247, 'create_sticker_pack', 'Create Sticker Pack', 'one-line', 0, 0, 1),
(248, 'ffprobe_binaries_path', 'FFProbe Binaries Path', 'one-line', 0, 0, 1),
(249, 'all', 'All', 'one-line', 0, 0, 1),
(250, 'reset_password_email_content', 'Resetting your password is easy. Just press the button below and you will be auto logged in to your account. If you did not make this request then please ignore this email.', 'one-line', 0, 0, 1),
(251, 'exceeded_max_msg_length', 'Exceeded Maximum Message Length', 'one-line', 0, 0, 1),
(252, 'create_unleavable_group', 'Create Unleavable Group', 'one-line', 0, 0, 1),
(253, 'reset_password_email_button_label', 'Reset Password', 'one-line', 0, 0, 1),
(254, 'create_site_role', 'Create Site Role', 'one-line', 0, 0, 1),
(255, 'sending', 'Sending', 'one-line', 0, 0, 1),
(256, 'gif_search_engine', 'GIF Search Engine', 'one-line', 0, 0, 1),
(257, 'complaints', 'Complaints', 'one-line', 0, 0, 1),
(258, 'yesterday', 'Yesterday', 'one-line', 0, 0, 1),
(259, 'account_not_found', 'Account Does Not Exist', 'one-line', 0, 0, 1),
(260, 'callback_url', 'Callback URL', 'one-line', 0, 0, 1),
(261, 'identifier', 'Identifier', 'one-line', 0, 0, 1),
(262, 'reset_password_success_message', 'We have sent you an e-mail containing your password reset link. Click the link in the email to create a new password. ', 'one-line', 0, 0, 1),
(263, 'control_storage', 'Full Control Access to User&#039;s Storage', 'one-line', 0, 0, 1),
(264, 'send_audio_message', 'Send Audio Message', 'one-line', 0, 0, 1),
(265, 'access_token_expired', 'Access Token is not valid or has expired', 'one-line', 0, 0, 1),
(266, 'edit_sticker_pack', 'Edit Sticker Pack', 'one-line', 0, 0, 1),
(267, 'remove_from_group', 'Remove from Group', 'one-line', 0, 0, 1),
(268, 'tertiary_border_color', 'Tertiary Border Color', 'one-line', 0, 0, 1),
(269, 'verification_email_subject', 'Confirm your email address', 'one-line', 0, 0, 1),
(270, 'max_file_upload_size', 'Max File Upload Size (MB)', 'one-line', 0, 0, 1),
(271, 'create_secret_group', 'Create Secret Group', 'one-line', 0, 0, 1),
(272, 'link_type', 'Link Type', 'one-line', 0, 0, 1),
(273, 'verification_email_heading', 'Email Confirmation', 'one-line', 0, 0, 1),
(274, 'settings', 'Settings', 'one-line', 0, 0, 1),
(275, 'download_file', 'Download File', 'one-line', 0, 0, 1),
(276, 'attach_gifs', 'Attach GIFs', 'one-line', 0, 0, 1),
(277, 'verification_email_content', 'Before you get started, we need to validate your email address. Please click on the button below to verify your email address. If you did not make this request then please ignore this email.', 'one-line', 0, 0, 1),
(278, 'browser', 'Browser', 'one-line', 0, 0, 1),
(279, 'remove_from_group_confirmation', 'Are you sure you want to remove this user from Group ?', 'one-line', 0, 0, 1),
(280, 'delete_account', 'Delete Account', 'one-line', 0, 0, 1),
(281, 'primary_font_size', 'Primary Font Size', 'one-line', 0, 0, 1),
(282, 'image_files', 'Image Files', 'one-line', 0, 0, 1),
(283, 'role', 'Role', 'one-line', 0, 0, 1),
(284, 'minimum_message_length', 'Minimum Message Length', 'one-line', 0, 0, 1),
(285, 'on_user_mention_group_chat', 'Someone mentions user in Group Chat', 'one-line', 0, 0, 1),
(286, 'joined', 'Joined', 'one-line', 0, 0, 1),
(287, 'datetime', 'Date &amp; Time', 'one-line', 0, 0, 1),
(288, 'quaternary_border_color', 'Quaternary Border Color', 'one-line', 0, 0, 1),
(289, 'none', 'None', 'one-line', 0, 0, 1),
(290, 'verification_email_button_label', 'Verify your email', 'one-line', 0, 0, 1),
(291, 'string_constant', 'String Constant', 'one-line', 0, 0, 1),
(292, 'other_features', 'Other Features', 'one-line', 0, 0, 1),
(293, 'block_user_confirmation', 'Are you sure you want to block this user ?', 'one-line', 0, 0, 1),
(294, 'web_push_mentioned_user_message', 'Mentioned you in Group Chat', 'one-line', 0, 0, 1),
(295, 'share_screenshot', 'Share Screenshot', 'one-line', 0, 0, 1),
(296, 'add_site_members', 'Add Site Members', 'one-line', 0, 0, 1),
(297, 'create_protected_group', 'Create Protected Group', 'one-line', 0, 0, 1),
(298, 'upload_file', 'Upload File', 'one-line', 0, 0, 1),
(299, 'search_messages', 'Search messages', 'one-line', 0, 0, 1),
(300, 'report_message', 'Report Message', 'one-line', 0, 0, 1),
(301, 'notification_tone', 'Notification Tone', 'one-line', 0, 0, 1),
(302, 'on_group_invitation', 'Someone send an invitation to join a group', 'one-line', 0, 0, 1),
(303, 'set_as_default', 'Set as Default', 'one-line', 0, 0, 1),
(304, 'go_online', 'Go Online', 'one-line', 0, 0, 1),
(305, 'long_text_field', 'Long Text', 'one-line', 0, 0, 1),
(306, 'secondary_font_size', 'Secondary Font Size', 'one-line', 0, 0, 1),
(307, 'email_verified', 'You&#039;ve successfully verified your email', 'one-line', 0, 0, 1),
(308, 'preview_attachments', 'Preview Attachments', 'one-line', 0, 0, 1),
(309, 'custom_page', 'Custom Page', 'one-line', 0, 0, 1),
(310, 'play_music', 'Play Music', 'one-line', 0, 0, 1),
(311, 'ignore_user_confirmation', 'Are you sure you want to ignore this user ?', 'one-line', 0, 0, 1),
(312, 'email_settings', 'Email Settings', 'one-line', 0, 0, 1),
(313, 'reported', 'Reported', 'one-line', 0, 0, 1),
(314, 'link_target', 'Link Target', 'one-line', 0, 0, 1),
(315, 'leave_group', 'Leave Group', 'one-line', 0, 0, 1),
(316, 'video_files', 'Video Files', 'one-line', 0, 0, 1),
(317, 'social_login_providers', 'Social Login Providers', 'one-line', 0, 0, 1),
(318, 'slug_already_exists', 'Slug Already Exists', 'one-line', 0, 0, 1),
(319, 'on_private_message', 'Someone send a Private Message', 'one-line', 0, 0, 1),
(320, 'quinary_border_color', 'Quinary Border Color', 'one-line', 0, 0, 1),
(321, 'upload', 'Upload', 'one-line', 0, 0, 1),
(322, 'remove_user', 'Remove User', 'one-line', 0, 0, 1),
(323, 'tertiary_font_size', 'Tertiary Font Size', 'one-line', 0, 0, 1),
(324, 'nickname', 'Nickname', 'one-line', 0, 0, 1),
(325, 'pwa_settings', 'PWA Settings', 'one-line', 0, 0, 1),
(326, 'cancel', 'Cancel', 'one-line', 0, 0, 1),
(327, 'access_time', 'Access Time', 'one-line', 0, 0, 1),
(328, 'on_new_site_badges', 'User awarded with new badge', 'one-line', 0, 0, 1),
(329, 'shortcodes', 'Shortcodes', 'one-line', 0, 0, 1),
(330, 'verification_code_expired', 'Verification code is not valid or has expired', 'one-line', 0, 0, 1),
(331, 'exceeded_max_file_upload_size', 'Exceeded Maximum File Upload Size Limit', 'one-line', 0, 0, 1),
(332, 'ignore_user', 'Ignore User', 'one-line', 0, 0, 1),
(333, 'progressive_web_application', 'Progressive Web Application', 'one-line', 0, 0, 1),
(334, 'unjoined', 'Unjoined', 'one-line', 0, 0, 1),
(335, 'go_back', 'Go Back', 'one-line', 0, 0, 1),
(336, 'login_as_guest', 'Login as Guest', 'one-line', 0, 0, 1),
(337, 'pwa_icon', 'PWA icon', 'one-line', 0, 0, 1),
(338, 'sender', 'Sender', 'one-line', 0, 0, 1),
(339, 'on_reply_group_messages', 'Someone replies to the user messages (Group Chat)', 'one-line', 0, 0, 1),
(340, 'default_notification_tone', 'Default Notification Tone', 'one-line', 0, 0, 1),
(341, 'pwa_name', 'Application Name', 'one-line', 0, 0, 1),
(342, 'show_only_on', 'Show Only On', 'one-line', 0, 0, 1),
(343, 'or_login_using', 'or login using', 'one-line', 0, 0, 1),
(344, 'date_field', 'Date', 'one-line', 0, 0, 1),
(345, 'pwa_short_name', 'Application Short Name', 'one-line', 0, 0, 1),
(346, 'attach', 'Share Files', 'one-line', 0, 0, 1),
(347, 'group_info', 'Group Info', 'one-line', 0, 0, 1),
(348, 'you', 'You', 'one-line', 0, 0, 1),
(349, 'create_group', 'Create Group', 'one-line', 0, 0, 1),
(350, 'site_records', 'Site Records', 'one-line', 0, 0, 1),
(351, 'admin', 'Admin', 'one-line', 0, 0, 1),
(352, 'allow_sharing_links', 'Allow Sharing Links', 'one-line', 0, 0, 1),
(353, 'delete_access_log_confirmation', 'Are you sure you want to remove this Access Log ?', 'one-line', 0, 0, 1),
(354, 'show_on_chat_page', 'Show on Chat Page', 'one-line', 0, 0, 1),
(355, 'radio_stations', 'Radio Stations', 'one-line', 0, 0, 1),
(356, 'spam', 'Spam', 'one-line', 0, 0, 1),
(357, 'login_as_user', 'Login as User', 'one-line', 0, 0, 1),
(358, 'guest_login', 'Guest Login', 'one-line', 0, 0, 1),
(359, 'change_to_idle_status_after', 'Change to Idle Status After (Minutes)', 'one-line', 0, 0, 1),
(360, 'unignore_user', 'Unignore User', 'one-line', 0, 0, 1),
(361, 'firewall', 'Firewall', 'one-line', 0, 0, 1),
(362, 'pwa_background_color', 'Background Color', 'one-line', 0, 0, 1),
(363, 'senary_border_color', 'Senary Border Color', 'one-line', 0, 0, 1),
(364, 'documents', 'Documents', 'one-line', 0, 0, 1),
(365, 'chat_message', 'Chat Message', 'one-line', 0, 0, 1),
(366, 'created_on', 'Created On', 'one-line', 0, 0, 1),
(367, 'open_in_same_window', 'Open in Same Window', 'one-line', 0, 0, 1),
(368, 'mobile_page_transition', 'Mobile Page Transition', 'one-line', 0, 0, 1),
(369, 'exporting', 'Exporting', 'one-line', 0, 0, 1),
(370, 'infotip_footer_tag', 'This will be printed before the &lt;/body&gt; closing tag', 'one-line', 0, 0, 1),
(371, 'add_audio_files', 'Add Audio Files', 'one-line', 0, 0, 1),
(372, 'unignore_user_confirmation', 'Are you sure you want to remove this user from Ignore list ?', 'one-line', 0, 0, 1),
(373, 'moderator', 'Moderator', 'one-line', 0, 0, 1),
(374, 'messages_per_call', 'Messages per Call', 'one-line', 0, 0, 1),
(375, 'delete_shared_files', 'Delete Shared Files', 'one-line', 0, 0, 1),
(376, 'all_file_formats', 'All File Formats', 'one-line', 0, 0, 1),
(377, 'invite', 'Invite', 'one-line', 0, 0, 1),
(378, 'username_already_exists', 'Username Already Exists', 'one-line', 0, 0, 1),
(379, 'generate_link_preview', 'Generate Link Preview', 'one-line', 0, 0, 1),
(380, 'uploading', 'Uploading', 'one-line', 0, 0, 1),
(381, 'pwa_theme_color', 'Theme Color', 'one-line', 0, 0, 1),
(382, 'files', 'Files', 'one-line', 0, 0, 1),
(383, 'unignore', 'Unignore', 'one-line', 0, 0, 1),
(384, 'tertiary_text_color', 'Tertiary Text Color', 'one-line', 0, 0, 1),
(385, 'profile', 'Profile', 'one-line', 0, 0, 1),
(386, 'dropdown_field', 'Dropdown', 'one-line', 0, 0, 1),
(387, 'manage_user_access_logs', 'Manage User Access Logs', 'one-line', 0, 0, 1),
(388, 'select_a_page', 'Select a Page', 'one-line', 0, 0, 1),
(389, 'group_join_limit', 'Maximum Number of Groups a User can Join', 'one-line', 0, 0, 1),
(390, 'blocked', 'Blocked', 'one-line', 0, 0, 1),
(391, 'unblock_user_confirmation', 'Are you sure you want to unblock this user ?', 'one-line', 0, 0, 1),
(392, 'confirm_export', 'Do You Want to Export?', 'one-line', 0, 0, 1),
(393, 'pwa_description', 'Description', 'one-line', 0, 0, 1),
(394, 'super_privileges', 'Super Privileges', 'one-line', 0, 0, 1),
(395, 'description', 'Description', 'one-line', 0, 0, 1),
(396, 'login_settings', 'Login Settings', 'one-line', 0, 0, 1),
(397, 'disable_private_messages', 'Disable Private Messages', 'one-line', 0, 0, 1),
(398, 'pwa_display', 'Display Mode', 'one-line', 0, 0, 1),
(399, 'upload_files', 'Upload Files', 'one-line', 0, 0, 1),
(400, 'delete_own_message', 'Delete their own Message', 'one-line', 0, 0, 1),
(401, 'confirm', 'Confirm', 'one-line', 0, 0, 1),
(402, 'quaternary_font_size', 'Quaternary Font Size', 'one-line', 0, 0, 1),
(403, 'header', 'Header', 'one-line', 0, 0, 1),
(404, 'standalone', 'Standalone', 'one-line', 0, 0, 1),
(405, 'remove_custom_bg', 'Remove Custom BG', 'one-line', 0, 0, 1),
(406, 'open_in_new_tab', 'Open in New Tab', 'one-line', 0, 0, 1),
(407, 'google_analytics_id', 'Google Analytics ID', 'one-line', 0, 0, 1),
(408, 'change_full_name', 'Change Full Name', 'one-line', 0, 0, 1),
(409, 'label_background_color', 'Label Background Color', 'one-line', 0, 0, 1),
(410, 'create_role', 'Create Role', 'one-line', 0, 0, 1),
(411, 'create_user', 'Create User', 'one-line', 0, 0, 1),
(412, 'septenary_border_color', 'Septenary Border Color', 'one-line', 0, 0, 1),
(413, 'chat_page', 'Chat Page', 'one-line', 0, 0, 1),
(414, 'change_to_offline_status_after', 'Change to Offline Status After (Minutes)', 'one-line', 0, 0, 1),
(415, 'delete_all_messages', 'Delete All Messages', 'one-line', 0, 0, 1),
(416, 'menu_order', 'Menu Order', 'one-line', 0, 0, 1),
(417, 'message_settings', 'Message Settings', 'one-line', 0, 0, 1),
(418, 'groups', 'Groups', 'one-line', 0, 0, 1),
(419, 'invite_link', 'Invite Link', 'one-line', 0, 0, 1),
(420, 'custom_pages', 'Custom Pages', 'one-line', 0, 0, 1),
(421, 'login_cookie_validity', 'Login Cookie Validity (Days)', 'one-line', 0, 0, 1),
(422, 'invalid_captcha', 'Invalid Captcha', 'one-line', 0, 0, 1),
(423, 'ignore_users', 'Ignore Users', 'one-line', 0, 0, 1),
(424, 'fields', 'Fields', 'one-line', 0, 0, 1),
(425, 'private_conversations', 'Private Conversations', 'one-line', 0, 0, 1),
(426, 'conversation', 'Conversation', 'one-line', 0, 0, 1),
(427, 'number_field', 'Number', 'one-line', 0, 0, 1),
(428, 'gif_search_engine_api', 'GIF Search Engine API', 'one-line', 0, 0, 1),
(429, 'fullscreen', 'Fullscreen', 'one-line', 0, 0, 1),
(430, 'quaternary_text_color', 'Quaternary Text Color', 'one-line', 0, 0, 1),
(431, 'web_address', 'Web Address', 'one-line', 0, 0, 1),
(432, 'ban_from_site', 'Ban from Site', 'one-line', 0, 0, 1),
(433, 'download_files', 'Download Files', 'one-line', 0, 0, 1),
(434, 'delete_all', 'Delete All', 'one-line', 0, 0, 1),
(435, 'request_timeout', 'Timeout Seconds (Long Polling)', 'one-line', 0, 0, 1),
(436, 'notification_settings', 'Notifications', 'one-line', 0, 0, 1),
(437, 'change_username', 'Change Username', 'one-line', 0, 0, 1),
(438, 'footer', 'Footer', 'one-line', 0, 0, 1),
(439, 'read_more', 'Read More', 'one-line', 0, 0, 1),
(440, 'abuse', 'Abuse', 'one-line', 0, 0, 1),
(441, 'delete_older_than', 'Delete older than (Minutes)', 'one-line', 0, 0, 1),
(442, 'delete_file_confirmation', 'Are you sure you want to delete this file ?', 'one-line', 0, 0, 1),
(443, 'change_avatar', 'Change Avatar', 'one-line', 0, 0, 1),
(444, 'octonary_border_color', 'Octonary Border Color', 'one-line', 0, 0, 1),
(445, 'delete_files', 'Delete Files', 'one-line', 0, 0, 1),
(446, 'view_reactions', 'View Reactions', 'one-line', 0, 0, 1),
(447, 'quinary_font_size', 'Quinary Font Size', 'one-line', 0, 0, 1),
(448, 'realtime_settings', 'Realtime Settings', 'one-line', 0, 0, 1),
(449, 'pages', 'Pages', 'one-line', 0, 0, 1),
(450, 'attach_files', 'Attach Files', 'one-line', 0, 0, 1),
(451, 'unblock_user', 'Unblock User', 'one-line', 0, 0, 1),
(452, 'menu_items', 'Menu Items', 'one-line', 0, 0, 1),
(453, 'entry_page_footer_text', 'Ⓒ 2023. All Rights Reserved. Site Name', 'one-line', 0, 0, 1),
(454, 'ltr', 'Left to Right', 'one-line', 0, 0, 1),
(455, 'exceeded_group_join_limit', 'Exceeded Maximum Number of Groups You can Join', 'one-line', 0, 0, 1),
(456, 'minimal-ui', 'Minimal UI', 'one-line', 0, 0, 1),
(457, 'senary_text_color', 'Senary Text Color', 'one-line', 0, 0, 1),
(458, 'confirm_delete_all_messages', 'Are you sure you want to delete all chat messages?', 'one-line', 0, 0, 1),
(459, 'ban_from_site_confirmation', 'Are you sure you want to ban this user from accessing site ?', 'one-line', 0, 0, 1),
(460, 'giphy', 'GIPHY', 'one-line', 0, 0, 1),
(461, 'manage_user_roles', 'Manage User Roles', 'one-line', 0, 0, 1),
(462, 'offline_page_expression', 'Oops!', 'one-line', 0, 0, 1),
(463, 'manage_custom_pages', 'Manage Custom Pages', 'one-line', 0, 0, 1),
(464, 'deleted', 'Deleted', 'one-line', 0, 0, 1),
(465, 'upload_custom_avatar', 'Upload Custom Avatar', 'one-line', 0, 0, 1),
(466, 'block_users', 'Block Users', 'one-line', 0, 0, 1),
(467, 'react_messages', 'React to Messages', 'one-line', 0, 0, 1),
(468, 'gifs_per_load', 'GIFs Per Load', 'one-line', 0, 0, 1),
(469, 'septenary_text_color', 'Septenary Text Color', 'one-line', 0, 0, 1),
(470, 'social_login', 'Social Login', 'one-line', 0, 0, 1),
(471, 'offline_page_title', 'You are Offline', 'one-line', 0, 0, 1),
(472, 'initiate_private_chat', 'Initiate Private Chat', 'one-line', 0, 0, 1),
(473, 'set_custom_background', 'Set Custom background', 'one-line', 0, 0, 1),
(474, 'req_min_msg_length', 'Required Minimum number of characters', 'one-line', 0, 0, 1),
(475, 'system_messages_groups', 'System Messages (Groups)', 'one-line', 0, 0, 1),
(476, 'add_custom_field', 'Add Field', 'one-line', 0, 0, 1),
(477, 'download_attachments', 'Download Attachments', 'one-line', 0, 0, 1),
(478, 'senary_font_size', 'Senary Font Size', 'one-line', 0, 0, 1),
(479, 'delete_all_files_confirmation', 'Are you sure you want to delete all files ?', 'one-line', 0, 0, 1),
(480, 'set_cover_pic', 'Set Cover Pic', 'one-line', 0, 0, 1),
(481, 'ffmpeg', 'FFmpeg', 'one-line', 0, 0, 1),
(482, 'site_role_1', 'Unverified', 'one-line', 0, 0, 1),
(483, 'unblock', 'Unblock', 'one-line', 0, 0, 1),
(484, 'records_per_call', 'Site Records per Call', 'one-line', 0, 0, 1),
(485, 'banned_from_group', 'Banned from Group', 'one-line', 0, 0, 1),
(486, 'access_storage', 'Access Storage', 'one-line', 0, 0, 1),
(487, 'octonary_text_color', 'Octonary Text Color', 'one-line', 0, 0, 1),
(488, 'entries_per_call', 'Entries per call', 'one-line', 0, 0, 1),
(489, 'custom_field_1', 'About Me', 'one-line', 1, 0, 1),
(490, 'send_on_behalf', 'Send Messages on Behalf', 'one-line', 0, 0, 1),
(491, 'ban_users_from_site', 'Ban Users from Site', 'one-line', 0, 0, 1),
(492, 'online', 'Online', 'one-line', 0, 0, 1),
(493, 'storage_limit_exceeded', 'Storage Limit Exceeded', 'one-line', 0, 0, 1),
(494, 'custom_site_role', 'Custom Site Role', 'one-line', 0, 0, 1),
(495, 'unbanned_from_group', 'Unbanned From Group', 'one-line', 0, 0, 1),
(496, 'meta_description', 'Meta Description', 'one-line', 0, 0, 1),
(497, 'adverts', 'Adverts', 'one-line', 0, 0, 1),
(498, 'delete_users', 'Delete Users', 'one-line', 0, 0, 1),
(499, 'remember_me', 'Remember Me', 'one-line', 0, 0, 1),
(500, 'view_private_chats', 'View Private Chats', 'one-line', 0, 0, 1),
(501, 'monitor_group_chats', 'Monitor Group Chats', 'one-line', 0, 0, 1),
(502, 'show_on_info_page', 'Show on Info Page', 'one-line', 0, 0, 1),
(503, 'api_secret_key', 'API Secret Key', 'one-line', 0, 0, 1),
(504, 'nonary_text_color', 'Nonary Text Color', 'one-line', 0, 0, 1),
(505, 'delete_group', 'Delete Group', 'one-line', 0, 0, 1),
(506, 'read_more_criteria', 'Add Read More button if height greater than (px)', 'one-line', 0, 0, 1),
(507, 'deleting', 'Deleting', 'one-line', 0, 0, 1),
(508, 'exceeded_maxgroupjoin', 'Exceeded Maximum Number of Groups You can Join', 'one-line', 0, 0, 1),
(509, 'ban_users_from_group', 'Ban Users from Group', 'one-line', 0, 0, 1),
(510, 'edit_custom_field_value', 'Edit Custom Field Value', 'one-line', 0, 0, 1),
(511, 'banned_page_title', 'You Are Banned', 'one-line', 0, 0, 1),
(512, 'uploading_files', 'Uploading File(s)', 'one-line', 0, 0, 1),
(513, 'nonary_border_color', 'Nonary Border Color', 'one-line', 0, 0, 1),
(514, 'editable_only_once', 'Editable Only Once', 'one-line', 0, 0, 1),
(515, 'offline', 'Offline', 'one-line', 0, 0, 1),
(516, 'unban_users_from_site', 'Unban Users from Site', 'one-line', 0, 0, 1),
(517, 'refresh_rate', 'Chat Refresh Rate (Milliseconds)', 'one-line', 0, 0, 1),
(518, 'delete_messages', 'Delete Msgs', 'one-line', 0, 0, 1),
(519, 'badge_title', 'Badge Title', 'one-line', 0, 0, 1),
(520, 'click_to_view_info', 'Click here to view info', 'one-line', 0, 0, 1),
(521, 'add_menu_item', 'Add Menu Item', 'one-line', 0, 0, 1),
(522, 'chat_page_boxed_layout', 'Boxed Layout [Chat Page]', 'one-line', 0, 0, 1),
(523, 'body', 'Body', 'one-line', 0, 0, 1),
(524, 'gif_content_filtering', 'GIF Content Filtering', 'one-line', 0, 0, 1),
(525, 'username_condition', 'Your username must contain at least one letter', 'one-line', 0, 0, 1),
(526, 'entry_page', 'Entry Page', 'one-line', 0, 0, 1),
(527, 'infotip_header_tag', 'This will be printed in the &lt;head&gt; section', 'one-line', 0, 0, 1),
(528, 'high', 'High', 'one-line', 0, 0, 1),
(529, 'infotip_body_tag', 'This will be printed after the &lt;body&gt; opening tag', 'one-line', 0, 0, 1),
(530, 'link_text', 'Link Text', 'one-line', 0, 0, 1),
(531, 'maximum_login_attempts', 'Maximum Login Attempts', 'one-line', 0, 0, 1),
(532, 'banned_page_expression', 'Ouch!', 'one-line', 0, 0, 1),
(533, 'site_notifications', 'Site Notifications', 'one-line', 0, 0, 1),
(534, 'view_site_users', 'View Site Users', 'one-line', 0, 0, 1),
(535, 'rtl', 'Right to Left', 'one-line', 0, 0, 1),
(536, 'time_format', 'Time Format', 'one-line', 0, 0, 1),
(537, 'push_notifications', 'Push Notifications', 'one-line', 0, 0, 1),
(538, 'delete_only_offline_users', 'Delete only Offline Users', 'one-line', 0, 0, 1),
(539, 'administrators', 'Administrators', 'one-line', 0, 0, 1),
(540, 'medium', 'Medium', 'one-line', 0, 0, 1),
(541, 'profile_url', 'Profile URL', 'one-line', 0, 0, 1),
(542, 'meta_title', 'Meta Title', 'one-line', 0, 0, 1),
(543, 'invalid_group_password', 'Invalid Group Password', 'one-line', 0, 0, 1),
(544, 'google_recaptcha_v2', 'Google reCAPTCHA v2', 'one-line', 0, 0, 1),
(545, 'site_role_2', 'Web Admin', 'one-line', 0, 0, 1),
(546, 'sticker_packs', 'Sticker Packs', 'one-line', 0, 0, 1),
(547, 'assign_badges', 'Assign Badges', 'one-line', 0, 0, 1),
(548, 'language_text_direction', 'Text direction', 'one-line', 0, 0, 1),
(549, 'send_push_notification', 'Send Push Notification', 'one-line', 0, 0, 1),
(550, 'embed_code', 'Embed Code', 'one-line', 0, 0, 1),
(551, 'on_join_group_chat', 'Someone joins Group Chat', 'one-line', 0, 0, 1),
(552, 'is_typing', 'is typing', 'one-line', 0, 0, 1),
(553, 'no_results_found', 'No Results Found', 'one-line', 0, 0, 1),
(554, 'view_group', 'View Group', 'one-line', 0, 0, 1),
(555, 'switch_languages', 'Switch Languages', 'one-line', 0, 0, 1),
(556, 'url', 'URL', 'one-line', 0, 0, 1),
(557, 'add_language', 'Add Language', 'one-line', 0, 0, 1),
(558, 'comments_if_any', 'Comments (If Any)', 'one-line', 0, 0, 1),
(559, 'monitor_private_chats', 'Monitor Private Chats', 'one-line', 0, 0, 1),
(560, 'denary_text_color', 'Denary Text Color', 'one-line', 0, 0, 1),
(561, 'low', 'Low', 'one-line', 0, 0, 1),
(562, 'maximum_message_length', 'Maximum Message Length', 'one-line', 0, 0, 1),
(563, 'no_results_found_subtitle', 'Try changing the filters or search term', 'one-line', 0, 0, 1),
(564, 'set_default_language', 'Set as Default Language', 'one-line', 0, 0, 1),
(565, 'view_online_users', 'View Online Users', 'one-line', 0, 0, 1),
(566, 'banned_page_description', 'Your have been banned from using this website. If you think your account was banned by mistake, please email us and we&#039;ll look into your case.', 'one-line', 0, 0, 1),
(567, 'posted_by', 'Posted by', 'one-line', 0, 0, 1),
(568, 'edit_custom_field', 'Edit Custom Field', 'one-line', 0, 0, 1),
(569, 'cookie_consent', 'Cookie Consent', 'one-line', 0, 0, 1),
(570, 'on_load_guest_login_window', 'Open Guest Login Window on Load (Login Page)', 'one-line', 0, 0, 1),
(571, 'listen_music', 'Listen Music', 'one-line', 0, 0, 1),
(572, 'message_id', 'Message ID', 'one-line', 0, 0, 1),
(573, 'location', 'Location', 'one-line', 0, 0, 1),
(574, 'edit_users', 'Edit Users', 'one-line', 0, 0, 1),
(575, 'view_full_name', 'View Full Name', 'one-line', 0, 0, 1),
(576, 'on_removal_from_group', 'Someone removed from Group', 'one-line', 0, 0, 1),
(577, 'unban_from_site', 'Unban from Site', 'one-line', 0, 0, 1),
(578, 'unban_users_from_group', 'Unban Users from Group', 'one-line', 0, 0, 1),
(579, 'force_https', 'Force HTTPS', 'one-line', 0, 0, 1),
(580, 'primary_border_color', 'Primary Border Color', 'one-line', 0, 0, 1),
(581, 'already_exists', 'Already Exists', 'one-line', 0, 0, 1),
(582, 'email_username', 'Email/Username', 'one-line', 0, 0, 1),
(583, 'create', 'Create', 'one-line', 0, 0, 1),
(584, 'icon_class', 'Icon Class', 'one-line', 0, 0, 1),
(585, 'forms', 'Forms', 'one-line', 0, 0, 1),
(586, 'site_adverts', 'Site Adverts', 'one-line', 0, 0, 1),
(587, 'yes', 'Yes', 'one-line', 0, 0, 1),
(588, 'info_panel', 'Info Panel', 'one-line', 0, 0, 1),
(589, 'on_leaving_group_chat', 'Someone leaves Group Chat', 'one-line', 0, 0, 1),
(590, 'welcome_screen', 'Welcome Screen', 'one-line', 0, 0, 1),
(591, 'forgot_password', 'Forgot Password', 'one-line', 0, 0, 1),
(592, 'no', 'No', 'one-line', 0, 0, 1),
(593, 'whats_wrong', 'What&#039;s Wrong with this', 'one-line', 0, 0, 1),
(594, 'rename', 'Rename', 'one-line', 0, 0, 1),
(595, 'open_in_new_window', 'Open Link in New Window', 'one-line', 0, 0, 1),
(596, 'advert_max_height', 'Maximum Height (px)', 'one-line', 0, 0, 1),
(597, 'banned_page_button', 'Contact Support', 'one-line', 0, 0, 1),
(598, 'rename_audio_file', 'Rename Audio File', 'one-line', 0, 0, 1),
(599, 'hcaptcha', 'hCaptcha', 'one-line', 0, 0, 1),
(600, 'landing_page', 'Landing Page', 'one-line', 0, 0, 1),
(601, 'set_participant_settings', 'Set Participant Settings', 'one-line', 0, 0, 1),
(602, 'site_role_3', 'Registered', 'one-line', 0, 0, 1),
(603, 'attachments', 'Attachment(s)', 'one-line', 0, 0, 1),
(604, 'add_cron_job', 'Add Cron Job', 'one-line', 0, 0, 1),
(605, 'login_as_another_user', 'Login as Another User', 'one-line', 0, 0, 1),
(606, 'slug_condition', 'Slug must contain at least one letter', 'one-line', 0, 0, 1),
(607, 'private_chats', 'Private Chats', 'one-line', 0, 0, 1),
(608, 'gif', 'GIF', 'one-line', 0, 0, 1),
(609, 'badge_image', 'Badge Image', 'one-line', 0, 0, 1),
(610, 'register', 'Register', 'one-line', 0, 0, 1),
(611, 'conversation_with', 'Conversation With', 'one-line', 0, 0, 1),
(612, 'ssl', 'SSL', 'one-line', 0, 0, 1),
(613, 'stream_url', 'Stream URL', 'one-line', 0, 0, 1),
(614, 'remove_password', 'Remove Password', 'one-line', 0, 0, 1),
(615, 'css_code', 'CSS Code', 'one-line', 0, 0, 1),
(616, 'sticker', 'Sticker', 'one-line', 0, 0, 1),
(617, 'site_role_4', 'Banned', 'one-line', 0, 0, 1),
(618, 'account_reactivated', 'Account Reactivated. Welcome Back', 'one-line', 0, 0, 1),
(619, 'clear_realtime_activity_logs', 'Clear Activity Logs', 'one-line', 0, 0, 1),
(620, 'sort', 'Sort', 'one-line', 0, 0, 1),
(621, 'group_roles', 'Group Roles', 'one-line', 0, 0, 1),
(622, 'reset', 'Reset', 'one-line', 0, 0, 1),
(623, 'default', 'Default', 'one-line', 0, 0, 1),
(624, 'footer_block_description', 'Footer Block [Description]', 'one-line', 0, 0, 1),
(625, 'off', 'Off', 'one-line', 0, 0, 1),
(626, 'edit_language', 'Edit Language', 'one-line', 0, 0, 1),
(627, 'delete_message_time_limit', 'Time Limit to Delete their own Messages (Minutes)', 'one-line', 0, 0, 1),
(628, 'denary_font_size', 'Denary Font Size', 'one-line', 0, 0, 1),
(629, 'audio_message', 'Audio Message', 'one-line', 0, 0, 1),
(630, 'advert_content', 'Advert Content', 'one-line', 0, 0, 1),
(631, 'edit_advert', 'Edit Advert', 'one-line', 0, 0, 1),
(632, 'manage_audio_player', 'Manage Audio Player', 'one-line', 0, 0, 1),
(633, 'group_invitation_email_button_label', 'Join Group', 'one-line', 0, 0, 1),
(634, 'messages', 'Messages', 'one-line', 0, 0, 1),
(635, 'create_group_role', 'Create Group Role', 'one-line', 0, 0, 1),
(636, 'flood_control_error_message', 'You are submitting too quickly. Please wait', 'one-line', 0, 0, 1),
(637, 'removed_from_group', 'Got removed from Group', 'one-line', 0, 0, 1),
(638, 'unbanned', 'Unbanned', 'one-line', 0, 0, 1),
(639, 'manage_social_login', 'Manage Social Login', 'one-line', 0, 0, 1),
(640, 'order', 'Order', 'one-line', 0, 0, 1),
(641, 'hide_language', 'Hide Language', 'one-line', 0, 0, 1),
(642, 'invalid_value', 'Invalid Input or Field Empty', 'one-line', 0, 0, 1),
(643, 'on_awarding_group_badges', 'Group awarded with new badge', 'one-line', 0, 0, 1),
(644, 'custom_field_3', 'Gender', 'one-line', 1, 0, 1),
(645, 'site_slogan', 'Site Slogan', 'one-line', 0, 0, 1),
(646, 'tls', 'TLS', 'one-line', 0, 0, 1),
(647, 'name', 'Name', 'one-line', 0, 0, 1),
(648, 'temporary_ban_from_group', 'Temporary Ban', 'one-line', 0, 0, 1),
(649, 'separate_commas', 'Separate with commas', 'one-line', 0, 0, 1),
(650, 'flood_control_time_difference', 'Required time difference between each message (seconds)', 'one-line', 0, 0, 1),
(651, 'site_role_5', 'Guest', 'one-line', 0, 0, 1),
(652, 'edit_group_role', 'Edit Group Role', 'one-line', 0, 0, 1),
(653, 'facebook_url', 'Facebook URL', 'one-line', 0, 0, 1),
(654, 'attach_stickers', 'Attach Stickers', 'one-line', 0, 0, 1),
(655, 'pinned_group', 'Pinned', 'one-line', 0, 0, 1),
(656, 'user_does_not_exist', 'User Does not Exist', 'one-line', 0, 0, 1),
(657, 'view_all', 'View All', 'one-line', 0, 0, 1),
(658, 'create_badge', 'Create Badge', 'one-line', 0, 0, 1),
(659, 'add_provider', 'Add Provider', 'one-line', 0, 0, 1),
(660, 'message_alignment', 'Message Alignment', 'one-line', 0, 0, 1);
INSERT INTO `gr_language_strings` (`string_id`, `string_constant`, `string_value`, `string_type`, `skip_update`, `skip_cache`, `language_id`) VALUES
(661, 'on_getting_banned_from_group', 'Someone banned from Group', 'one-line', 0, 0, 1),
(662, 'edit_cron_job', 'Edit Cron Job', 'one-line', 0, 0, 1),
(663, 'done', 'Done', 'one-line', 0, 0, 1),
(664, 'rebuild_cache', 'Rebuild Cache', 'one-line', 0, 0, 1),
(665, 'custom_field_4', 'Website', 'one-line', 1, 0, 1),
(666, 'cron_jobs', 'Cron Jobs', 'one-line', 0, 0, 1),
(667, 'statistics', 'Statistics', 'one-line', 0, 0, 1),
(668, 'appkey', 'APP Key', 'one-line', 0, 0, 1),
(669, 'own_message_alignment', 'Message Alignment [Own]', 'one-line', 0, 0, 1),
(670, 'banned_from_group_message', 'You are Banned from accessing the Group', 'one-line', 0, 0, 1),
(671, 'instagram_url', 'Instagram URL', 'one-line', 0, 0, 1),
(672, 'images', 'Images', 'one-line', 0, 0, 1),
(673, 'site_roles', 'Site Roles', 'one-line', 0, 0, 1),
(674, 'mention', '@Mention', 'one-line', 0, 0, 1),
(675, 'manage_group_roles', 'Manage Group Roles', 'one-line', 0, 0, 1),
(676, 'custom_field_5', 'Location', 'one-line', 1, 0, 1),
(677, 'tenor', 'Tenor', 'one-line', 0, 0, 1),
(678, 'reactions', 'Reactions', 'one-line', 0, 0, 1),
(679, 'timezone', 'TimeZone', 'one-line', 0, 0, 1),
(680, 'file_expired', 'File Expired or Doesn&#039;t exist', 'one-line', 0, 0, 1),
(681, 'edit_badge', 'Edit Badge', 'one-line', 0, 0, 1),
(682, 'manage_site_roles', 'Manage Site Roles', 'one-line', 0, 0, 1),
(683, 'identity_provider', 'Identity Provider', 'one-line', 0, 0, 1),
(684, 'went_wrong', 'Something Went Wrong', 'one-line', 0, 0, 1),
(685, 'welcome_screen_heading', 'Hello, and a warm welcome to you', 'one-line', 0, 0, 1),
(686, 'load_more', 'Load More', 'one-line', 0, 0, 1),
(687, 'unleavable', 'Unleavable', 'one-line', 0, 0, 1),
(688, 'newest', 'Newest', 'one-line', 0, 0, 1),
(689, 'show', 'Show', 'one-line', 0, 0, 1),
(690, 'no_group_selected', 'Empty Inbox', 'one-line', 0, 0, 1),
(691, 'group_role_1', 'Banned', 'one-line', 0, 0, 1),
(692, 'twitter_url', 'Twitter URL', 'one-line', 0, 0, 1),
(693, 'on_getting_unbanned_from_group', 'Someone unbanned from Group', 'one-line', 0, 0, 1),
(694, 'web_app_manifest', 'Web App Manifest', 'one-line', 0, 0, 1),
(695, 'group_role_2', 'Group Admin', 'one-line', 0, 0, 1),
(696, 'custom_menu', 'Custom Menu', 'one-line', 0, 0, 1),
(697, 'recently_joined', 'Recently Joined', 'one-line', 0, 0, 1),
(698, 'on_getting_temporarily_banned_from_group', 'Someone temporarily banned from Group', 'one-line', 0, 0, 1),
(699, 'manage_adverts', 'Manage Adverts', 'one-line', 0, 0, 1),
(700, 'custom_field_3_options', '{\"male\":\"Male\",\"female\":\"Female\",\"non_binary\":\"Non-binary\"}', 'multi_line', 1, 0, 1),
(701, 'boxed', 'Boxed Layout', 'one-line', 0, 0, 1),
(702, 'set_group_slug', 'Set Group Slug', 'one-line', 0, 0, 1),
(703, 'blacklist_user_permission_denied', 'Permission Denied : You are not allowed to block/ignore Site Administrators', 'one-line', 0, 0, 1),
(704, 'create_public_group', 'Create Public Group', 'one-line', 0, 0, 1),
(705, 'group_role_3', 'Group Moderator', 'one-line', 0, 0, 1),
(706, 'welcome_screen_message', 'Share what&#039;s on your mind with other people from all around the world to find new friends', 'one-line', 0, 0, 1),
(707, 'site_users', 'Site Users', 'one-line', 0, 0, 1),
(708, 'custom_avatar', 'Custom Avatar', 'one-line', 0, 0, 1),
(709, 'custom_fields', 'Custom Fields', 'one-line', 0, 0, 1),
(710, 'line_break_delimiter', 'Use line break as the delimiter', 'one-line', 0, 0, 1),
(711, 'unleavable_group', 'Unleavable Group', 'one-line', 0, 0, 1),
(712, 'quinary_text_color', 'Quinary Text Color', 'one-line', 0, 0, 1),
(713, 'select_option', 'Select Option from Dropdown', 'one-line', 0, 0, 1),
(714, 'loading_image', 'Loading Image', 'one-line', 0, 0, 1),
(715, 'on_updating_group_info', 'Updating Group Information', 'one-line', 0, 0, 1),
(716, 'welcome_screen_footer_text', 'By accessing this website, you are agreeing to be bound by the Terms and Conditions of Use', 'one-line', 0, 0, 1),
(717, 'group_role_4', 'Member', 'one-line', 0, 0, 1),
(718, 'change_email_address', 'Change Email Address', 'one-line', 0, 0, 1),
(719, 'custom_background', 'Custom Background', 'one-line', 0, 0, 1),
(720, 'linkedin_url', 'LinkedIn URL', 'one-line', 0, 0, 1),
(721, 'left', 'Left', 'one-line', 0, 0, 1),
(722, 'create_groups', 'Create Groups', 'one-line', 0, 0, 1),
(723, 'forward', 'Forward', 'one-line', 0, 0, 1),
(724, 'values', 'Values', 'one-line', 0, 0, 1),
(725, 'choose_file', 'Choose a file', 'one-line', 0, 0, 1),
(726, 'background', 'Background', 'one-line', 0, 0, 1),
(727, 'access_logs', 'Access Logs', 'one-line', 0, 0, 1),
(728, 'videos', 'Videos', 'one-line', 0, 0, 1),
(729, 'clear_chat_history', 'Clear Chat History', 'one-line', 0, 0, 1),
(730, 'welcome_message', 'Welcome Message', 'one-line', 0, 0, 1),
(731, 'refresh', 'Refresh', 'one-line', 0, 0, 1),
(732, 'septenary_font_size', 'Septenary Font Size', 'one-line', 0, 0, 1),
(733, 'select_group', 'Select a Group or Chat', 'one-line', 0, 0, 1),
(734, 'cron_job_url', 'Cron Job URL', 'one-line', 0, 0, 1),
(735, 'twitch_url', 'Twitch URL', 'one-line', 0, 0, 1),
(736, 'switch_color_scheme', 'Switch Color Scheme', 'one-line', 0, 0, 1),
(737, 'show_language', 'Show Language', 'one-line', 0, 0, 1),
(738, 'gfycat', 'Gfycat', 'one-line', 0, 0, 1),
(739, 'confirm_action', 'Are you sure you want to continue ?', 'one-line', 0, 0, 1),
(740, 'menu_item', 'Menu Item', 'one-line', 0, 0, 1),
(741, 'created', 'Created', 'one-line', 0, 0, 1),
(742, 'total_users', 'Total Users', 'one-line', 0, 0, 1),
(743, 'check_inbox', 'We have sent an email to your email address. Please check your Inbox.', 'one-line', 0, 0, 1),
(744, 'temporarily_banned_from_group_message', 'You are Temporarily Banned from accessing the Group', 'one-line', 0, 0, 1),
(745, 'custom_page_2_content', '[YOU CAN MODIFY THE PAGE CONTENTS VIA CUSTOM PAGES MODULE]', 'multi_line', 1, 1, 1),
(746, 'public_group', 'Public Group', 'one-line', 0, 0, 1),
(747, 'view_groups_without_login', 'View Public Groups without Login', 'one-line', 0, 0, 1),
(748, 'heading', 'Heading', 'one-line', 0, 0, 1),
(749, 'view_joined_groups', 'View Joined Groups', 'one-line', 0, 0, 1),
(750, 'not_a_group_member_message', 'You are not a member of this Group. Click here to Join.', 'one-line', 0, 0, 1),
(751, 'reply_messages', 'Reply Messages', 'one-line', 0, 0, 1),
(752, 'cron_job', 'Cron Job', 'one-line', 0, 0, 1),
(753, 'minimum_score_required_wad_content', 'Minimum Score Required [Weapons, Alcohol &amp; Drugs] %', 'one-line', 0, 0, 1),
(754, 'other_files', 'Other Files', 'one-line', 0, 0, 1),
(755, 'landing_page_footer_block_two_heading', 'Contact', 'one-line', 0, 0, 1),
(756, 'online_users', 'Online Users', 'one-line', 0, 0, 1),
(757, 'login_link_email_heading', 'Welcome To The Community', 'one-line', 0, 0, 1),
(758, 'landing_page_hero_section_heading', 'Much more than just another chat site', 'one-line', 0, 0, 1),
(759, 'email_address', 'Email Address', 'one-line', 0, 0, 1),
(760, 'default_group_role', 'Default Group Role', 'one-line', 0, 0, 1),
(761, 'webpushr_rest_api_key', 'Webpushr REST API Key', 'one-line', 0, 0, 1),
(762, 'clear_chat', 'Clear Chat', 'one-line', 0, 0, 1),
(763, 'badges', 'Badges', 'one-line', 0, 0, 1),
(764, 'icon_img', 'Icon', 'one-line', 0, 0, 1),
(765, 'command', 'Command', 'one-line', 0, 0, 1),
(766, 'external_link', 'External Link', 'one-line', 0, 0, 1),
(767, 'dmy_format', 'Day Month Year', 'one-line', 0, 0, 1),
(768, 'type', 'Type', 'one-line', 0, 0, 1),
(769, 'sort_by_default', 'Default', 'one-line', 0, 0, 1),
(770, 'delete_group_messages', 'Delete Group Messages', 'one-line', 0, 0, 1),
(771, 'on_group_creation', 'On Group Creation', 'one-line', 0, 0, 1),
(772, 'links', 'Links', 'one-line', 0, 0, 1),
(773, 'notifications', 'Notifications', 'one-line', 0, 0, 1),
(774, 'fake_online_users', 'Fake Online Users', 'one-line', 0, 0, 1),
(775, 'octonary_font_size', 'Octonary Font Size', 'one-line', 0, 0, 1),
(776, 'footer_text', 'Footer Text', 'one-line', 0, 0, 1),
(777, 'landing_page_faq_question_10_answer', '', 'one-line', 0, 0, 1),
(778, 'results_found', 'Results Found', 'one-line', 0, 0, 1),
(779, 'entry_page_background', 'Entry Page Background', 'one-line', 0, 0, 1),
(780, 'fake_users', 'Fake Users', 'one-line', 0, 0, 1),
(781, 'export', 'Export', 'one-line', 0, 0, 1),
(782, 'page_content', 'Page Content', 'one-line', 0, 0, 1),
(783, 'home', 'Home', 'one-line', 0, 0, 1),
(784, 'app_id', 'APP ID or Client ID', 'one-line', 0, 0, 1),
(785, 'landing_page_hero_section_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.', 'one-line', 0, 0, 1),
(786, 'read_status', 'Read Status', 'one-line', 0, 0, 1),
(787, 'faq', 'FAQ', 'one-line', 0, 0, 1),
(788, 'custom_group_role', 'Custom Group Role', 'one-line', 0, 0, 1),
(789, 'right', 'Right', 'one-line', 0, 0, 1),
(790, 'new_message_notification', 'You have a new message', 'one-line', 0, 0, 1),
(791, 'add_users', 'Add Users', 'one-line', 0, 0, 1),
(792, 'view_shared_files', 'View Shared Files', 'one-line', 0, 0, 1),
(793, 'no_conversation_found', 'No Conversation Found', 'one-line', 0, 0, 1),
(794, 'switch_user', 'Switch User', 'one-line', 0, 0, 1),
(795, 'show_on_landing_page_footer', 'Show on Landing Page [Footer]', 'one-line', 0, 0, 1),
(796, 'disabled', 'Disabled', 'one-line', 0, 0, 1),
(797, 'remove_group_members', 'Remove Group Members', 'one-line', 0, 0, 1),
(798, 'login_link_email_content', 'A warm welcome to our website. You&#039;re now part of our website. We&#039;re excited to have you on board. Meet new friends. Share your experiences.', 'one-line', 0, 0, 1),
(799, 'default_group_visibility', 'Default Group Visibility', 'one-line', 0, 0, 1),
(800, 'add_fake_users', 'Add Fake Users', 'one-line', 0, 0, 1),
(801, 'mdy_format', 'Month Day Year', 'one-line', 0, 0, 1),
(802, 'landing_page_footer_block_two_description', '+44 1632 960811hello@yourdomain.com', 'one-line', 0, 0, 1),
(803, 'delete_private_messages', 'Delete Private Messages', 'one-line', 0, 0, 1),
(804, 'show_on_landing_page_header', 'Show on Landing Page [Header]', 'one-line', 0, 0, 1),
(805, 'default_txt', 'Default', 'one-line', 0, 0, 1),
(806, 'filter', 'Filter', 'one-line', 0, 0, 1),
(807, 'not_found', 'Not Found', 'one-line', 0, 0, 1),
(808, 'resend_email', 'Resend Email', 'one-line', 0, 0, 1),
(809, 'site_controls', 'Site Controls', 'one-line', 0, 0, 1),
(810, 'play_notification_sound', 'Play a Notification Sound', 'one-line', 0, 0, 1),
(811, 'custom_menu_item_3', 'About', 'one-line', 0, 0, 1),
(812, 'resend_email_on_error', 'Account already verified or account does not exist', 'one-line', 0, 0, 1),
(813, 'login_link_email_button_label', 'Login Now', 'one-line', 0, 0, 1),
(814, 'custom_menu_item_4', 'Sitemap', 'one-line', 0, 0, 1),
(815, 'disallowed_slugs', 'Disallowed Slugs', 'one-line', 0, 0, 1),
(816, 'email_successfully_sent', 'Email successfully sent', 'one-line', 0, 0, 1),
(817, 'landing_page_copyright_notice', '© 2021 Company, Inc. All rights reserved.', 'one-line', 0, 0, 1),
(818, 'featured_image', 'Featured Image', 'one-line', 0, 0, 1),
(819, 'custom_page_3', 'Privacy Policy', 'multi_line', 1, 1, 1),
(820, 'custom_css', 'Custom CSS', 'one-line', 0, 0, 1),
(821, 'minimum_full_name_length', 'Minimum Full Name Length', 'one-line', 0, 0, 1),
(822, 'on_new_message', 'On New Message', 'one-line', 0, 0, 1),
(823, 'landing_page_groups_section', 'Groups Section (Landing Page)', 'one-line', 0, 0, 1),
(824, 'mini_audio_player', 'Mini Audio Player', 'one-line', 0, 0, 1),
(825, 'approve', 'Approve', 'one-line', 0, 0, 1),
(826, 'moderators', 'Moderators', 'one-line', 0, 0, 1),
(827, 'hero_section_heading', 'Hero Section [Heading]', 'one-line', 0, 0, 1),
(828, 'faq_section_heading', 'FAQ Section [Heading]', 'one-line', 0, 0, 1),
(829, 'maximum_full_name_length', 'Maximum Full Name Length', 'one-line', 0, 0, 1),
(830, 'no_conversation_found_subtitle', 'Try changing the filters or search term', 'one-line', 0, 0, 1),
(831, 'on_new_site_notification', 'On New Site Notification', 'one-line', 0, 0, 1),
(832, 'disapprove', 'Disapprove', 'one-line', 0, 0, 1),
(833, 'nonary_font_size', 'Nonary Font Size', 'one-line', 0, 0, 1),
(834, 'requires_minimum_full_name_length', 'Require Minimum Length for Full Name', 'one-line', 0, 0, 1),
(835, 'minimum_score_required_offensive', 'Minimum Score Required [Offensive Signs &amp; Gestures] %', 'one-line', 0, 0, 1),
(836, 'please_wait', 'Please Wait', 'one-line', 0, 0, 1),
(837, 'disapprove_user_confirmation', 'Are you sure you want to disapprove this user ?', 'one-line', 0, 0, 1),
(838, 'suspended', 'Suspended', 'one-line', 0, 0, 1),
(839, 'dashboard', 'Dashboard', 'one-line', 0, 0, 1),
(840, 'approve_user_confirmation', 'Are you sure you want to approve this user ?', 'one-line', 0, 0, 1),
(841, 'landing_page_faq_section_heading', 'Frequently Asked Questions', 'one-line', 0, 0, 1),
(842, 'send_as_another_user', 'Send Messages as Another Site User', 'one-line', 0, 0, 1),
(843, 'custom_login_url', 'Custom Login URL', 'one-line', 0, 0, 1),
(844, 'minimum_score_required_graphic_violence_gore', 'Minimum Score Required [Graphic Violence &amp; Gore] %', 'one-line', 0, 0, 1),
(845, 'custom_url_on_logout', 'Custom URL on Logout', 'one-line', 0, 0, 1),
(846, 'hero_section_animation', 'Hero Section [Animation]', 'one-line', 0, 0, 1),
(847, 'infotip_select_multiple_files', 'To select multiple files, hold the Ctrl (PC) or Command (Mac) key and using your trackpad or external mouse, click on all the other files you wish to select one by one.', 'one-line', 0, 0, 1),
(848, 'track_status', 'Track Status', 'one-line', 0, 0, 1),
(849, 'group_members', 'Group Members', 'one-line', 0, 0, 1),
(850, 'hide_group_member_list_from_non_members', 'Hide Group Member list from Non members', 'one-line', 0, 0, 1),
(851, 'on_group_unread_count_change', 'On Group Unread Count Change', 'one-line', 0, 0, 1),
(852, 'display_full_file_name_of_attachments', 'Display full file name of Attachment(s)', 'one-line', 0, 0, 1),
(853, 'landing_page_groups_section_heading', 'Trending Groups', 'one-line', 0, 0, 1),
(854, 'assign', 'Assign', 'one-line', 0, 0, 1),
(855, 'moderation', 'Moderation', 'one-line', 0, 0, 1),
(856, 'link_field', 'Link', 'one-line', 0, 0, 1),
(857, 'enabled', 'Enabled', 'one-line', 0, 0, 1),
(858, 'import', 'Import', 'one-line', 0, 0, 1),
(859, 'daily_send_limit_group_messages', 'Daily Send Limit [Group Messages]', 'one-line', 0, 0, 1),
(860, 'load_group_info_on_group_load', 'Load Group Info on Group Load', 'one-line', 0, 0, 1),
(861, 'total_groups', 'Total Groups', 'one-line', 0, 0, 1),
(862, 'secret_key', 'Secret Key', 'one-line', 0, 0, 1),
(863, 'answer', 'Answer', 'one-line', 0, 0, 1),
(864, 'visible', 'Visible', 'one-line', 0, 0, 1),
(865, 'zero_equals_unlimited', '(0 = Unlimited)', 'one-line', 0, 0, 1),
(866, 'permission_denied', 'Permission Denied', 'one-line', 0, 0, 1),
(867, 'moderation_settings', 'Moderation', 'one-line', 0, 0, 1),
(868, 'delete_site_users', 'Delete Site Users', 'one-line', 0, 0, 1),
(869, 'daily_send_limit_private_messages', 'Daily Send Limit [Private Messages]', 'one-line', 0, 0, 1),
(870, 'ymd_format', 'Year Month Day', 'one-line', 0, 0, 1),
(871, 'landing_page_faq_question_1', 'How to create an account ?', 'one-line', 0, 0, 1),
(872, 'manage_custom_fields', 'Manage Custom Fields', 'one-line', 0, 0, 1),
(873, 'updated', 'Updated', 'one-line', 0, 0, 1),
(874, 'undenary_text_color', 'Undenary Text Color', 'one-line', 0, 0, 1),
(875, 'group_name', 'Group Name', 'one-line', 0, 0, 1),
(876, 'maximum_sending_rate_exceeded', 'Maximum Sending Rate Exceeded', 'one-line', 0, 0, 1),
(877, 'unsuspend', 'Unsuspend', 'one-line', 0, 0, 1),
(878, 'show_group_label', 'Show Group Role Next to Chat Message', 'one-line', 0, 0, 1),
(879, 'exceeds_full_name_length', 'Full Name character length limit exceeded', 'one-line', 0, 0, 1),
(880, 'on_private_conversation_unread_count_change', 'On Private Conversation Unread Count Change', 'one-line', 0, 0, 1),
(881, 'landing_page_faq_section', 'FAQ Section (Landing Page)', 'one-line', 0, 0, 1),
(882, 'groups_section_status', 'Groups Section [Status]', 'one-line', 0, 0, 1),
(883, 'duodenary_text_color', 'Duodenary Text Color', 'one-line', 0, 0, 1),
(884, 'delete_user_files', 'Delete User Files', 'one-line', 0, 0, 1),
(885, 'friend_system', 'Friend System', 'one-line', 0, 0, 1),
(886, 'system_info', 'System Info', 'one-line', 0, 0, 1),
(887, 'admins_moderators', 'Admins &amp; Moderators', 'one-line', 0, 0, 1),
(888, 'faq_section_status', 'FAQ Section [Status]', 'one-line', 0, 0, 1),
(889, 'import_users', 'Import Users', 'one-line', 0, 0, 1),
(890, 'hero_section_image', 'Hero Section [Image]', 'one-line', 0, 0, 1),
(891, 'hidden', 'Hidden', 'one-line', 0, 0, 1),
(892, 'ip_blacklist', 'IP Blacklist', 'one-line', 0, 0, 1),
(893, 'status', 'Status', 'one-line', 0, 0, 1),
(894, 'under_review', 'Under Review', 'one-line', 0, 0, 1),
(895, 'storage_usage', 'Storage Usage', 'one-line', 0, 0, 1),
(896, 'iso_language_code', 'ISO Language Code', 'one-line', 0, 0, 1),
(897, 'loading', 'Loading', 'one-line', 0, 0, 1),
(898, 'menu_title', 'Menu Title', 'one-line', 0, 0, 1),
(899, 'hero_section_description', 'Hero Section [Description]', 'one-line', 0, 0, 1),
(900, 'landing_page_groups_section_description', 'Where Good conversation become great experiences', 'one-line', 0, 0, 1),
(901, 'select_an_option', 'Select an Option', 'one-line', 0, 0, 1),
(902, 'add_friend', 'Add Friend', 'one-line', 0, 0, 1),
(903, 'seen_by', 'Seen By', 'one-line', 0, 0, 1),
(904, 'view_public_group_messages_non_member', 'View Public Group Messages without being Group Member [Logged in Users]', 'one-line', 0, 0, 1),
(905, 'access_denied_message', '403 Forbidden You don&#039;t have permission to access.', 'one-line', 0, 0, 1),
(906, 'footer_logo', 'Footer Logo', 'one-line', 0, 0, 1),
(907, 'cancel_request', 'Cancel Request', 'one-line', 0, 0, 1),
(908, 'remove', 'Remove', 'one-line', 0, 0, 1),
(909, 'view_shared_links', 'View Shared Links', 'one-line', 0, 0, 1),
(910, 'access_denied_non_member_message', 'You are not part of this Group. Join Group to View Messages.', 'one-line', 0, 0, 1),
(911, 'open_in_popup', 'Open in Popup', 'one-line', 0, 0, 1),
(912, 'landing_page_faq_question_1_answer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 'one-line', 0, 0, 1),
(913, 'username', 'Username', 'one-line', 0, 0, 1),
(914, 'accept_friend', 'Accept Friend', 'one-line', 0, 0, 1),
(915, 'view_complaint', 'View Complaint', 'one-line', 0, 0, 1),
(916, 'supported_file_formats', 'Supported File Formats', 'one-line', 0, 0, 1),
(917, 'read_receipts', 'Read Receipts', 'one-line', 0, 0, 1),
(918, 'ad_free_account', 'Ad-Free Account', 'one-line', 0, 0, 1),
(919, 'customizer', 'Customizer', 'one-line', 0, 0, 1),
(920, 'suspend', 'Suspend', 'one-line', 0, 0, 1),
(921, 'social_share_image', 'Default Social Share Image', 'one-line', 0, 0, 1),
(922, 'unfriend', 'Unfriend', 'one-line', 0, 0, 1),
(923, 'username_exists', 'Username Already Taken', 'one-line', 0, 0, 1),
(924, 'modules', 'Modules', 'one-line', 0, 0, 1),
(925, 'landing_page_footer_text', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', 'one-line', 0, 0, 1),
(926, 'who_all_can_view_page', 'Who all can View Page', 'one-line', 0, 0, 1),
(927, 'mention_users', 'Mention Users', 'one-line', 0, 0, 1),
(928, 'csv_file', 'CSV File', 'one-line', 0, 0, 1),
(929, 'others', 'Others', 'one-line', 0, 0, 1),
(930, 'reject_request', 'Reject Request', 'one-line', 0, 0, 1),
(931, '24_format', '24-hour clock', 'one-line', 0, 0, 1),
(932, 'load_profile_on_page_load', 'Load Profile on Page Load', 'one-line', 0, 0, 1),
(933, 'friends', 'Friends', 'one-line', 0, 0, 1),
(934, 'autoplay_audio_player', 'Autoplay Audio Player', 'one-line', 0, 0, 1),
(935, 'users_banned', 'Users Banned', 'one-line', 0, 0, 1),
(936, 'not_assigned', 'Not Assigned', 'one-line', 0, 0, 1),
(937, 'enter_is_send', 'Send message with Enter key', 'one-line', 0, 0, 1),
(938, 'question', 'Question', 'one-line', 0, 0, 1),
(939, 'profanity_filter', 'Profanity Filter', 'one-line', 0, 0, 1),
(940, 'total_members', 'Total Members', 'one-line', 0, 0, 1),
(941, 'sample_reference_file', 'Sample Reference File', 'one-line', 0, 0, 1),
(942, 'pending', 'Pending', 'one-line', 0, 0, 1),
(943, 'password', 'Password', 'one-line', 0, 0, 1),
(944, 'review_complaints', 'Review Complaints', 'one-line', 0, 0, 1),
(945, 'new_user_approval', 'New User Approval', 'one-line', 0, 0, 1),
(946, 'webpushr_authentication_token', 'Webpushr Authentication Token', 'one-line', 0, 0, 1),
(947, 'menu_item_visibility', 'Menu Item Visibility', 'one-line', 0, 0, 1),
(948, 'group_join_confirmation', 'Group Join Confirmation', 'one-line', 0, 0, 1),
(949, 'group_suspended', 'Sorry, this group has been Suspended.', 'one-line', 0, 0, 1),
(950, 'label_text_color', 'Label Text Color', 'one-line', 0, 0, 1),
(951, 'emojis', 'Emojis', 'one-line', 0, 0, 1),
(952, 'time_am', 'AM', 'one-line', 0, 0, 1),
(953, 'show_only_on_specific_language', 'Show only on Specific Language', 'one-line', 0, 0, 1),
(954, 'review', 'Review', 'one-line', 0, 0, 1),
(955, 'group_chats', 'Group Chats', 'one-line', 0, 0, 1),
(956, 'landing_page_footer_block_one_heading', 'Address', 'one-line', 0, 0, 1),
(957, 'view_statistics', 'View Statistics', 'one-line', 0, 0, 1),
(958, 'password_doesnt_match', 'Password doesn&#039;t match the Confirm password', 'one-line', 0, 0, 1),
(959, 'storage', 'Storage', 'one-line', 0, 0, 1),
(960, 'email_exists', 'Email Already Exists', 'one-line', 0, 0, 1),
(961, 'time_pm', 'PM', 'one-line', 0, 0, 1),
(962, 'recording', 'Recording', 'one-line', 0, 0, 1),
(963, 'something_went_wrong', 'Something Went Wrong', 'one-line', 0, 0, 1),
(964, 'email_logo', 'Logo (Email Template)', 'one-line', 0, 0, 1),
(965, 'signup_agreement', 'I agree to the Terms of Service and Privacy Policy', 'one-line', 0, 0, 1),
(966, '12_format', '12-hour clock', 'one-line', 0, 0, 1),
(967, 'show_on_signup', 'Show on Signup Page', 'one-line', 0, 0, 1),
(968, 'default_timezone', 'Default Timezone', 'one-line', 0, 0, 1),
(969, 'sent', 'Sent', 'one-line', 0, 0, 1),
(970, 'show_on_front_page', 'Show on Frontpage', 'one-line', 0, 0, 1),
(971, 'assigned', 'Assigned', 'one-line', 0, 0, 1),
(972, 'hide_name_field_in_registration_page', 'Hide Name Field in Registration Page', 'one-line', 0, 0, 1),
(973, 'comments_by_complainant', 'Comments by Complainant', 'one-line', 0, 0, 1),
(974, 'webpushr', 'Webpushr', 'one-line', 0, 0, 1),
(975, 'message_non_friends', 'Message Non-Friends', 'one-line', 0, 0, 1),
(976, 'field_type', 'Field Type', 'one-line', 0, 0, 1),
(977, 'unverified_email_address', 'Unverified Email Address', 'one-line', 0, 0, 1),
(978, 'hide_email_address_field_in_registration_page', 'Hide Email Address Field in Registration Page', 'one-line', 0, 0, 1),
(979, 'gifs', 'GIFs', 'one-line', 0, 0, 1),
(980, 'landing_page_footer_block_one_description', '3 Burthong Road, Eremerang, New South Wales, 2877 Australia', 'one-line', 0, 0, 1),
(981, 'send_requests', 'Send Requests', 'one-line', 0, 0, 1),
(982, 'email', 'Email', 'one-line', 0, 0, 1),
(983, 'landing_page_faq_question_2', 'How to Delete an account ?', 'one-line', 0, 0, 1),
(984, 'play', 'Play', 'one-line', 0, 0, 1),
(985, 'hide_username_field_in_registration_page', 'Hide Username Field In Registration Page', 'one-line', 0, 0, 1),
(986, 'captcha', 'Captcha', 'one-line', 0, 0, 1),
(987, 'copyright_notice', 'Copyright Notice', 'one-line', 0, 0, 1),
(988, 'receive_requests', 'Receive Requests', 'one-line', 0, 0, 1),
(989, 'new_badge_awarded', 'New Badge Awarded', 'one-line', 0, 0, 1),
(990, 'left_content_block', 'Left Content Block', 'one-line', 0, 0, 1),
(991, 'advert_min_height', 'Minimum Height (px)', 'one-line', 0, 0, 1),
(992, 'wait_for_profile_approval', 'Your Account is currently pending approval. Once your profile has been approved you can login.', 'one-line', 0, 0, 1),
(993, 'static_image', 'Static Image', 'one-line', 0, 0, 1),
(994, 'id', 'ID', 'one-line', 0, 0, 1),
(995, 'field_options', 'Field Options', 'one-line', 0, 0, 1),
(996, 'left_panel_content_on_page_load', 'Content to Show on Page Load [Left Panel]', 'one-line', 0, 0, 1),
(997, 'view_friends', 'View Friends', 'one-line', 0, 0, 1),
(998, 'side_navigation', 'Side Navigation', 'one-line', 0, 0, 1),
(999, 'image_moderation', 'Image Moderation', 'one-line', 0, 0, 1),
(1000, 'confirm_email_address', 'You are required to verify your email address. We have sent an email with a confirmation link to your email address.', 'one-line', 0, 0, 1),
(1001, 'monitor', 'Monitor', 'one-line', 0, 0, 1),
(1002, 'your_friend_since', 'Your Friend Since', 'one-line', 0, 0, 1),
(1003, 'show_on_entry_page', 'Show on Entry Page', 'one-line', 0, 0, 1),
(1004, 'left_side_content', 'Left Side Content', 'one-line', 0, 0, 1),
(1005, 'sightengine_api_user', 'Sightengine API user', 'one-line', 0, 0, 1),
(1006, 'audio', 'Audio', 'one-line', 0, 0, 1),
(1007, 'comments_by_reviewer', 'Comments by Reviewer', 'one-line', 0, 0, 1),
(1008, 'custom_page_2', 'Terms of Service', 'multi_line', 1, 1, 1),
(1009, 'remove_cover_pic', 'Remove Cover Pic', 'one-line', 0, 0, 1),
(1010, 'display_username_group_chats', 'Display Username instead of Full Name in Group Chats', 'one-line', 0, 0, 1),
(1011, 'files_uploaded', 'Files Uploaded', 'one-line', 0, 0, 1),
(1012, 'display_username_private_chats', 'Display Username instead of Full Name in Private Chats', 'one-line', 0, 0, 1),
(1013, 'landing_page_faq_question_2_answer', '02 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 'one-line', 0, 0, 1),
(1014, 'captcha_secret_key', 'Captcha Secret Key', 'one-line', 0, 0, 1),
(1015, 'sightengine_api_secret', 'Sightengine API Secret', 'one-line', 0, 0, 1),
(1016, 'form', 'Form', 'one-line', 0, 0, 1),
(1017, 'groups_section_description', 'Groups Section [Description]', 'one-line', 0, 0, 1),
(1018, 'compress_video_files', 'Compress Video Files', 'one-line', 0, 0, 1),
(1019, 'pending_approval', 'Pending Approval', 'one-line', 0, 0, 1),
(1020, 'image_removal_criteria', 'Delete Images that contain', 'one-line', 0, 0, 1),
(1021, 'compress_image_files', 'Compress Image Files', 'one-line', 0, 0, 1),
(1022, 'chat_window', 'Chat Window', 'one-line', 0, 0, 1),
(1023, 'partial_nudity', 'Partial Nudity', 'one-line', 0, 0, 1),
(1024, 'primary_bg_color', 'Primary Background Color', 'one-line', 0, 0, 1),
(1025, 'compress_audio_files', 'Compress Audio Files', 'one-line', 0, 0, 1),
(1026, 'requires_consent', 'Your consent is required.', 'one-line', 0, 0, 1),
(1027, 'not_logged_in', 'Not Logged In', 'one-line', 0, 0, 1),
(1028, 'explicit_nudity', 'Explicit Nudity', 'one-line', 0, 0, 1),
(1029, 'email_login_link', 'Email Login Link', 'one-line', 0, 0, 1),
(1030, 'secondary_bg_color', 'Secondary Background Color', 'one-line', 0, 0, 1),
(1031, 'edit_custom_page', 'Edit Custom Page', 'one-line', 0, 0, 1),
(1032, 'unverified', 'Unverified', 'one-line', 0, 0, 1),
(1033, 'webpushr_public_key', 'Webpushr Public Key', 'one-line', 0, 0, 1),
(1034, 'tertiary_bg_color', 'Tertiary Background Color', 'one-line', 0, 0, 1),
(1035, 'nearby_users', 'Nearby Users', 'one-line', 0, 0, 1),
(1036, 'login_link_email_subject', 'Your Login Link', 'one-line', 0, 0, 1),
(1037, 'not_logged_in_message', 'You are not logged in. Click here to log in.', 'one-line', 0, 0, 1),
(1038, 'wad_content', 'Weapons, Alcohol &amp; Drugs', 'one-line', 0, 0, 1),
(1039, 'quaternary_bg_color', 'Quaternary Background Color', 'one-line', 0, 0, 1),
(1040, 'rebuild', 'Rebuild', 'one-line', 0, 0, 1),
(1041, 'people_nearby_feature', 'People Nearby Feature', 'one-line', 0, 0, 1),
(1042, 'landing_page_faq_question_3', '', 'one-line', 0, 0, 1),
(1043, 'custom_field_6', 'Country', 'one-line', 1, 0, 1),
(1044, 'offensive_signs_gestures', 'Offensive Signs &amp; Gestures', 'one-line', 0, 0, 1),
(1045, 'group_invitation', 'Invited you to Join the Group', 'one-line', 0, 0, 1),
(1046, 'quinary_bg_color', 'Quinary Background Color', 'one-line', 0, 0, 1),
(1047, 'view_nearby_users', 'View Nearby Users', 'one-line', 0, 0, 1),
(1048, 'required_field', 'Required Field', 'one-line', 0, 0, 1),
(1049, 'embed', 'Embed', 'one-line', 0, 0, 1),
(1050, 'graphic_violence_gore', 'Graphic Violence &amp; Gore', 'one-line', 0, 0, 1),
(1051, 'last_visit', 'Last Visit', 'one-line', 0, 0, 1),
(1052, 'people_nearby_max_distance', 'People Nearby - Maximum Distance (km)', 'one-line', 0, 0, 1),
(1053, 'add_custom_page', 'Add Custom Page', 'one-line', 0, 0, 1),
(1054, 'senary_bg_color', 'Senary Background Color', 'one-line', 0, 0, 1),
(1055, 'captcha_site_key', 'Captcha Site Key', 'one-line', 0, 0, 1),
(1056, 'approve_users', 'Approve Users', 'one-line', 0, 0, 1),
(1057, 'group_invitation_email_subject', 'You&#039;ve Got an Invitation', 'one-line', 0, 0, 1),
(1058, 'top', 'Top', 'one-line', 0, 0, 1),
(1059, 'septenary_bg_color', 'Septenary Background Color', 'one-line', 0, 0, 1),
(1060, 'complaint_status', 'Complaint Status', 'one-line', 0, 0, 1),
(1061, 'minimum_score_required_partial_nudity', 'Minimum Score Required [Partial Nudity] %', 'one-line', 0, 0, 1),
(1062, 'embed_group', 'Embed Group', 'one-line', 0, 0, 1),
(1063, 'auto_join_group', 'Auto Add Users on Signup', 'one-line', 0, 0, 1),
(1064, 'bottom', 'Bottom', 'one-line', 0, 0, 1),
(1065, 'check_read_receipts', 'Check Read Receipts', 'one-line', 0, 0, 1),
(1066, 'minimum_score_required_explicit_nudity', 'Minimum Score Required [Explicit Nudity] %', 'one-line', 0, 0, 1),
(1067, 'style_sheets', 'Style Sheets', 'one-line', 0, 0, 1),
(1068, 'octonary_bg_color', 'Octonary Background Color', 'one-line', 0, 0, 1),
(1069, 'error_uploading', 'Error Uploading Files', 'one-line', 0, 0, 1),
(1070, 'create_account', 'Create Account', 'one-line', 0, 0, 1),
(1071, 'landing_page_faq_question_3_answer', '', 'one-line', 0, 0, 1),
(1072, 'default_language', 'Default Language', 'one-line', 0, 0, 1),
(1073, 'allow_guest_users_create_accounts', 'Allow Guest Users to Create Accounts', 'one-line', 0, 0, 1),
(1074, 'custom_page_1', 'About', 'multi_line', 1, 1, 1),
(1075, 'email_validator', 'Email Validator', 'one-line', 0, 0, 1),
(1076, 'nonary_bg_color', 'Nonary Background Color', 'one-line', 0, 0, 1),
(1077, 'email_domain_not_allowed', 'Not allowed to use an email address from this domain ', 'one-line', 0, 0, 1),
(1078, 'data_unavailable', 'Data Unavailable', 'one-line', 0, 0, 1),
(1079, 'denary_bg_color', 'Denary Background Color', 'one-line', 0, 0, 1),
(1080, 'group_headers', 'Group Headers', 'one-line', 0, 0, 1),
(1081, 'voice_message', 'Voice Message', 'one-line', 0, 0, 1),
(1082, 'edit_group_header', 'Edit Group Header', 'one-line', 0, 0, 1),
(1083, 'entry_page_form_header', 'Form Header (Entry Page)', 'one-line', 0, 0, 1),
(1084, 'group_header', 'Group Header', 'one-line', 0, 0, 1),
(1085, 'add_meta_tags', 'Add Meta Tags', 'one-line', 0, 0, 1),
(1086, 'primary_text_color', 'Primary Text Color', 'one-line', 0, 0, 1),
(1087, 'header_content', 'Header Content', 'one-line', 0, 0, 1),
(1088, 'global_css', 'Global CSS', 'one-line', 0, 0, 1),
(1089, 'groups_section_heading', 'Groups Section [Heading]', 'one-line', 0, 0, 1),
(1090, 'landing_page_faq_question_4', '', 'one-line', 0, 0, 1),
(1091, 'custom_js', 'Custom JS', 'one-line', 0, 0, 1),
(1092, 'javascript', 'JavaScript', 'one-line', 0, 0, 1),
(1093, 'secondary_text_color', 'Secondary Text Color', 'one-line', 0, 0, 1),
(1094, 'error', 'Error', 'one-line', 0, 0, 1),
(1095, 'global_js', 'Global Custom JS', 'one-line', 0, 0, 1),
(1096, 'pin_groups', 'Pin Groups', 'one-line', 0, 0, 1),
(1097, 'forward_message', 'Forward Message', 'one-line', 0, 0, 1),
(1098, 'forward_messages', 'Forward Messages', 'one-line', 0, 0, 1),
(1099, 'color_scheme', 'Color Scheme', 'one-line', 0, 0, 1),
(1100, 'react', 'React', 'one-line', 0, 0, 1),
(1101, 'page_title', 'Page Title', 'one-line', 0, 0, 1),
(1102, 'samesite_cookies', 'SameSite Cookies', 'one-line', 0, 0, 1),
(1103, 'show_timestamp_on_mouseover', 'Show Timestamp on Mouseover', 'one-line', 0, 0, 1),
(1104, 'group_invitation_email_heading', 'You&#039;ve Got an invitation', 'one-line', 0, 0, 1),
(1105, 'csrf_token', 'CSRF Token', 'one-line', 0, 0, 1),
(1106, 'javascript_files', 'Javascript Files', 'one-line', 0, 0, 1),
(1107, 'complainant', 'Complainant', 'one-line', 0, 0, 1),
(1108, 'delete_complaints', 'Delete Complaints', 'one-line', 0, 0, 1),
(1109, 'main_panel_content_on_page_load', 'Content to Show on Page Load [Main Panel]', 'one-line', 0, 0, 1),
(1110, 'login_as_admin', 'Login as Admin', 'one-line', 0, 0, 1),
(1111, 'media', 'Media', 'one-line', 0, 0, 1),
(1112, 'chats', 'Chats', 'one-line', 0, 0, 1),
(1113, 'set_auto_join_groups', 'Set Auto Join Groups', 'one-line', 0, 0, 1),
(1114, 'message_textarea_placeholder', 'Write Here…', 'one-line', 0, 0, 1),
(1115, 'entry_page_form_footer', 'Form Footer (Entry Page)', 'one-line', 0, 0, 1),
(1116, 'footer_block_heading', 'Footer Block [Heading]', 'one-line', 0, 0, 1),
(1117, 'allow_sharing_email_addresses', 'Allow Sharing Email Addresses', 'one-line', 0, 0, 1),
(1118, 'landing_page_faq_question_4_answer', '', 'one-line', 0, 0, 1),
(1119, 'search_on_change_of_input', 'Search on Change of Input', 'one-line', 0, 0, 1),
(1120, 'hide', 'Hide', 'one-line', 0, 0, 1),
(1121, 'show_side_navigation_on_load', 'Show Side Navigation On Load', 'one-line', 0, 0, 1),
(1122, 'landing_page_faq_question_5', '', 'one-line', 0, 0, 1),
(1123, 'hide_groups_on_group_url', 'Hide groups when a user visits through the group URL', 'one-line', 0, 0, 1),
(1124, 'sitemap', 'Sitemap', 'one-line', 0, 0, 1),
(1125, 'group_chat', 'Group Chat', 'one-line', 0, 0, 1),
(1126, 'landing_page_faq_question_5_answer', '', 'one-line', 0, 0, 1),
(1127, 'external_page', 'External Page', 'one-line', 0, 0, 1),
(1128, 'landing_page_faq_question_6', '', 'one-line', 0, 0, 1),
(1129, 'custom_field_2', 'Birth Date', 'one-line', 1, 0, 1),
(1130, 'recipient', 'Recipient', 'one-line', 0, 0, 1),
(1131, 'group_invitation_email_content', 'Come join our community where you can share, learn, and discover amazing resources, ask questions, engage in conversations.', 'one-line', 0, 0, 1),
(1132, 'landing_page_faq_question_6_answer', '', 'one-line', 0, 0, 1),
(1133, 'view_invisible_users', 'View Invisible Users (Offline Mode)', 'one-line', 0, 0, 1),
(1134, 'invalid_pwa_icon_dimensions', 'Use an image that is at least 512X512 pixels', 'one-line', 0, 0, 1),
(1135, 'custom_page_1_content', '[YOU CAN MODIFY THE PAGE CONTENTS VIA CUSTOM PAGES MODULE]', 'multi_line', 1, 1, 1),
(1136, 'landing_page_faq_question_7', '', 'one-line', 0, 0, 1),
(1137, 'error_message', 'Something went wrong, try refreshing.', 'one-line', 0, 0, 1),
(1138, 'landing_page_faq_question_7_answer', '', 'one-line', 0, 0, 1),
(1139, 'landing_page_faq_question_8', '', 'one-line', 0, 0, 1),
(1140, 'landing_page_faq_question_8_answer', '', 'one-line', 0, 0, 1),
(1141, 'landing_page_faq_question_9', '', 'one-line', 0, 0, 1),
(1142, 'landing_page_faq_question_9_answer', '', 'one-line', 0, 0, 1),
(1143, 'set_fake_online_users', 'Set Fake Online Users', 'one-line', 0, 0, 1),
(1144, 'landing_page_faq_question_10', '', 'one-line', 0, 0, 1),
(1145, 'cloud_storage', 'Cloud Storage', 'one-line', 0, 0, 1),
(1146, 'amazon_s3', 'Amazon S3', 'one-line', 0, 0, 1),
(1147, 's3_compatible', 'S3 Compatible Storage', 'one-line', 0, 0, 1),
(1148, 'digitalocean_spaces', 'DigitalOcean Spaces', 'one-line', 0, 0, 1),
(1149, 'ftp_storage', 'FTP Storage', 'one-line', 0, 0, 1),
(1150, 'wasabi', 'Wasabi', 'one-line', 0, 0, 1),
(1151, 'cloud_storage_api_key', 'API Key', 'one-line', 0, 0, 1),
(1152, 'cloud_storage_secret_key', 'Secret Key', 'one-line', 0, 0, 1),
(1153, 'cloud_storage_region', 'Region', 'one-line', 0, 0, 1),
(1154, 'cloud_storage_bucket_name', 'Bucket/Space Name', 'one-line', 0, 0, 1),
(1155, 'cloud_storage_endpoint', 'Endpoint', 'one-line', 0, 0, 1),
(1156, 'cloud_storage_ftp_host', 'FTP Hostname', 'one-line', 0, 0, 1),
(1157, 'cloud_storage_ftp_username', 'FTP Username', 'one-line', 0, 0, 1),
(1158, 'cloud_storage_ftp_password', 'FTP Password', 'one-line', 0, 0, 1),
(1159, 'cloud_storage_ftp_port', 'FTP Port', 'one-line', 0, 0, 1),
(1160, 'cloud_storage_ftp_path', 'FTP Path', 'one-line', 0, 0, 1),
(1161, 'cloud_storage_ftp_endpoint', 'FTP Endpoint', 'one-line', 0, 0, 1),
(1162, 'assets_folder_missing', '&quot;files&quot; folder missing. [1] Login to your cloud storage account [2] Create &quot;assets&quot; folder [3] Upload &quot;assets/files/&quot; folder &amp; its contents inside &quot;assets&quot; folder', 'one-line', 0, 0, 1),
(1163, 'invalid_bucket_name', 'Invalid Bucket/Space name', 'one-line', 0, 0, 1),
(1164, 'invalid_credentials', 'Invalid Credentials', 'one-line', 0, 0, 1),
(1169, 'default_bg_group_chat', 'Default Background Image [Group Chat]', 'one-line', 0, 0, 1),
(1170, 'default_bg_private_chat', 'Default Background Image [Private Chat]', 'one-line', 0, 0, 1),
(1171, 'cloudflare_turnstile', 'Cloudflare Turnstile', 'one-line', 0, 0, 1),
(1172, 'edit_message', 'Edit Message', 'one-line', 0, 0, 1),
(1173, 'edit_own_message', 'Edit Own Message', 'one-line', 0, 0, 1),
(1174, 'edit_all_messages', 'Edit All Messages', 'one-line', 0, 0, 1),
(1175, 'edit_message_time_limit', 'Time Limit to Edit their own Messages (Minutes)', 'one-line', 0, 0, 1),
(1176, 'time_limit_expired', 'Time Limit has Expired', 'one-line', 0, 0, 1),
(1177, 'hide_phone_number_field_in_registration_page', 'Hide Phone Number Field in Registration Page', 'one-line', 0, 0, 1),
(1178, 'phone_number_verification', 'Phone Number Verification', 'one-line', 0, 0, 1),
(1179, 'sms_gateway', 'SMS Gateway', 'one-line', 0, 0, 1),
(1181, 'twilio', 'Twilio', 'one-line', 0, 0, 1),
(1184, 'phone_number', 'Phone Number', 'one-line', 0, 0, 1),
(1185, 'invalid_phone_number', 'Invalid Phone Number', 'one-line', 0, 0, 1),
(1186, 'enter_otp', 'Enter OTP', 'one-line', 0, 0, 1),
(1187, 'verify', 'Verify', 'one-line', 0, 0, 1),
(1188, 'verify_phone_number', 'Verify Phone Number', 'one-line', 0, 0, 1),
(1189, 'verify_phone_number_text', 'We send you a one-time password to the mobile number that you entered. Type the OTP received and click on verify.', 'one-line', 0, 0, 1),
(1190, 'resend_otp', 'Resend OTP', 'one-line', 0, 0, 1),
(1191, 'verify_your_phone_number', 'The phone number was not verified. In order to proceed, please, verify.', 'one-line', 0, 0, 1),
(1192, 'phone_number_verified', 'Your phone number has been verified', 'one-line', 0, 0, 1),
(1193, 'invalid_otp_code', 'Invalid OTP Code', 'one-line', 0, 0, 1),
(1194, 'approve_phone_number', 'Approve Phone Number', 'one-line', 0, 0, 1),
(1195, 'twilio_account_sid', 'Twilio Account SID', 'one-line', 0, 0, 1),
(1196, 'twilio_auth_token', 'Twilio Auth Token', 'one-line', 0, 0, 1),
(1197, 'sms_settings', 'SMS Settings', 'one-line', 0, 0, 1),
(1198, 'sms_src', 'Sender/From Number', 'one-line', 0, 0, 1),
(1199, 'messagebird', 'MessageBird', 'one-line', 0, 0, 1),
(1200, 'messagebird_api_key', 'MessageBird API Key', 'one-line', 0, 0, 1),
(1201, 'registration_otp_message', 'Your OTP for registration is', 'one-line', 0, 0, 1),
(1202, 'phone_number_exists', 'Phone number already exists', 'one-line', 0, 0, 1),
(1203, 'view_email_address', 'View Email Address', 'one-line', 0, 0, 1),
(1204, 'view_phone_number', 'View Phone Number', 'one-line', 0, 0, 1),
(1205, 'ip_blacklisted', 'Your IP is blacklisted', 'one-line', 0, 0, 1),
(1206, 'ip_intelligence', 'IP Intelligence', 'one-line', 0, 0, 1),
(1207, 'proxycheck_io', 'ProxyCheck.io', 'one-line', 0, 0, 1),
(1208, 'getipintel', 'GetIPIntel', 'one-line', 0, 0, 1),
(1209, 'ip_intelligence_api_key', 'API Key', 'one-line', 0, 0, 1),
(1210, 'ip_intelligence_probability', 'Probability', 'one-line', 0, 0, 1),
(1211, 'ip_intel_validate_on_login', 'Validate on User Login', 'one-line', 0, 0, 1),
(1212, 'ip_intel_validate_on_register', 'Validate on User Signup', 'one-line', 0, 0, 1),
(1213, 'maximum_guest_nickname_length', 'Maximum Guest Nickname Length', 'one-line', 0, 0, 1),
(1214, 'minimum_guest_nickname_length', 'Minimum Guest Nickname Length', 'one-line', 0, 0, 1),
(1215, 'requires_minimum_guest_nickname_length', 'Requires Minimum Length for Guest Nickname', 'one-line', 0, 0, 1),
(1216, 'exceeds_guest_nickname_length', 'Guest Nickname character length limit exceeded', 'one-line', 0, 0, 1),
(1217, 'ad_block_detected_title', 'AdBlock Detected!', 'one-line', 0, 0, 1),
(1218, 'ad_block_detected_description', 'Our website is made possible by displaying online advertisements to our visitors.\r\n                    Please consider supporting us by disabling your ad blocker on our website.', 'one-line', 0, 0, 1),
(1219, 'ad_block_detected_button', 'I&#039;ve disabled AdBlock', 'one-line', 0, 0, 1),
(1220, 'adblock_detector', 'Adblock Detector', 'one-line', 0, 0, 1),
(1221, 'streaming_server', 'Streaming Server', 'one-line', 0, 0, 1),
(1222, 'shoutcast', 'SHOUTcast', 'one-line', 0, 0, 1),
(1223, 'icecast', 'Icecast', 'one-line', 0, 0, 1),
(1224, 'mention_everyone', 'Mention @everyone', 'one-line', 0, 0, 1),
(1225, 'footer_section_status', 'Footer Section [Status]', 'one-line', 0, 0, 1),
(1226, 'search_users', 'Search Users', 'one-line', 0, 0, 1),
(1227, 'searchable', 'Searchable', 'one-line', 0, 0, 1),
(1230, 'name_censored_word_detected', 'Name contains a censored word', 'one-line', 0, 0, 1),
(1231, 'username_censored_word_detected', 'Username contains a censored word', 'one-line', 0, 0, 1),
(1232, 'filter_username', 'Filter Username', 'one-line', 0, 0, 1),
(1233, 'filter_full_name', 'Filter Full Name', 'one-line', 0, 0, 1),
(1234, 'filter_messages', 'Filter Messages', 'one-line', 0, 0, 1),
(1235, 'user_pending_approval_email_heading', 'Pending Approval', 'one-line', 0, 0, 1),
(1236, 'user_pending_approval_email_content', 'A new user has registered on your website and is currently pending approval. The user\'s details are as follows:', 'one-line', 0, 0, 1),
(1237, 'user_pending_approval_email_subject', 'New User Pending Approval', 'one-line', 0, 0, 1),
(1238, 'user_pending_approval_email_button_label', 'Visit Website', 'one-line', 0, 0, 1),
(1239, 'on_private_message_offline', 'Someone send a Private Message when Offline', 'one-line', 0, 0, 1),
(1240, 'on_friend_request', 'Someone send a Friend Request', 'one-line', 0, 0, 1),
(1241, 'web_push_on_friend_request', 'Sent you a friend request', 'one-line', 0, 0, 1),
(1242, 'when_changing_group_role', 'When Changing Group Role', 'one-line', 0, 0, 1),
(1243, 'updated_user_group_role', 'Group role has been changed to', 'one-line', 0, 0, 1),
(1244, 'enable_photo_upload_on_signup', 'Enable Photo upload on Signup', 'one-line', 0, 0, 1),
(1245, 'required', 'Required', 'one-line', 0, 0, 1),
(1246, 'missing_profile_image', 'Please upload a profile image to continue', 'one-line', 0, 0, 1),
(1247, 'profile_image', 'Profile Image', 'one-line', 0, 0, 1),
(1249, 'chat_page_footer', 'Footer (Chat Page)', 'one-line', 0, 0, 1),
(1250, 'chat_page_header', 'Header (Chat Page)', 'one-line', 0, 0, 1),
(1251, 'advanced_user_searches', 'Advanced User Searches', 'one-line', 0, 0, 1),
(1252, 'schedule_cronjob_command_message', 'Make sure to schedule the following cronjob command in your hosting server to run the script automatically at your preferred intervals', 'one-line', 0, 0, 1),
(1253, 'please_note', 'Please Note', 'one-line', 0, 0, 1),
(1254, 'send_email_notification', 'Send Email Notification', 'one-line', 0, 0, 1),
(1255, 'new_private_message_email_subject', 'New Private Message Received', 'one-line', 0, 0, 1),
(1256, 'new_private_message_email_heading', 'New Message Received', 'one-line', 0, 0, 1),
(1257, 'new_private_message_email_content', 'You have received a new private message. Please log in to your account to read the message and reply if necessary.', 'one-line', 0, 0, 1),
(1258, 'new_private_message_email_button_label', 'View Message', 'one-line', 0, 0, 1),
(1259, 'on_new_user_pending_approval', 'New user signup pending approval', 'one-line', 0, 0, 1),
(1260, 'new_friend_request_email_subject', 'New Friend Request Received', 'one-line', 0, 0, 1),
(1261, 'new_friend_request_email_heading', 'New Friend Request', 'one-line', 0, 0, 1),
(1262, 'new_friend_request_email_content', 'You have received a new friend request on our platform. You can view and respond to this request by logging into your account and going to the &quot;Friends&quot; section.', 'one-line', 0, 0, 1),
(1263, 'new_friend_request_email_button_label', 'View Request', 'one-line', 0, 0, 1),
(1264, 'message_scheduler', 'Message Scheduler', 'one-line', 0, 0, 1),
(1265, 'scheduled_message', 'Scheduled Message', 'one-line', 0, 0, 1),
(1266, 'schedule_message', 'Schedule Message', 'one-line', 0, 0, 1),
(1267, 'send_message_on', 'Send Message On', 'one-line', 0, 0, 1),
(1268, 'schedule_cronjob_command_message_skip', 'Make sure to schedule the following cronjob command in your hosting server to run the script automatically at your preferred intervals, and if the cronjob is already scheduled, skip this step', 'one-line', 0, 0, 1),
(1269, 'view_profile_url', 'View Profile URL', 'one-line', 0, 0, 1),
(1270, 'smtp_self_signed_certificate', 'Self-signed Certificate', 'one-line', 0, 0, 1),
(1271, 'read_terms', 'Read Terms', 'one-line', 0, 0, 1),
(1272, 'site_name', 'اسم الموقع', 'one-line', 0, 0, 2),
(1273, 'invited', 'مدعو', 'one-line', 0, 0, 2),
(1274, 'edit_profile', 'تعديل الملف الشخصي', 'one-line', 0, 0, 2),
(1275, 'login', 'تسجيل الدخول ', 'one-line', 0, 0, 2),
(1276, 'new_password', 'كلمة المرور الجديدة', 'one-line', 0, 0, 2),
(1277, 'update', 'تحديث', 'one-line', 0, 0, 2),
(1278, 'upload_avatar', 'تحميل الصورة الرمزية', 'one-line', 0, 0, 2),
(1279, 'create_user_if_not_exists', 'إنشاء مستخدم إن لم يكن موجودًا', 'one-line', 0, 0, 2),
(1280, 'mail_login_info', 'معلومات تسجيل الدخول بالبريد', 'one-line', 0, 0, 2),
(1281, 'icon', 'أيقونة', 'one-line', 0, 0, 2),
(1282, 'cookie_consent_modal_title', 'العنوان المشروط لموافقة ملف تعريف الارتباط', 'one-line', 0, 0, 2),
(1283, 'advert_name', 'الإعلان', 'one-line', 0, 0, 2),
(1284, 'add_to_group', 'إضافة إلى الجروب', 'one-line', 0, 0, 2),
(1285, 'other', 'آخر', 'one-line', 0, 0, 2),
(1286, 'requires_minimum_username_length', 'الحد الأدنى لطول اسم المستخدم', 'one-line', 0, 0, 2),
(1287, 'banned_till', 'حتى المحظورة', 'one-line', 0, 0, 2),
(1288, 'visit', 'يزور', 'one-line', 0, 0, 2),
(1289, 'site_description', 'وصف الموقع', 'one-line', 0, 0, 2),
(1290, 'smtp_username', 'اسم مستخدم SMTP', 'one-line', 0, 0, 2),
(1291, 'unban_from_site_confirmation', 'هل أنت متأكد أنك تريد السماح لهذا المستخدم من الوصول إلى الموقع؟', 'one-line', 0, 0, 2),
(1292, 'appearance', 'المظهر', 'one-line', 0, 0, 2),
(1293, 'language', 'لغة', 'one-line', 0, 0, 2),
(1294, 'open', 'يفتح', 'one-line', 0, 0, 2),
(1295, 'import_json', 'حدد ملف JSON', 'one-line', 0, 0, 2),
(1296, 'inbox', 'صندوق الوارد', 'one-line', 0, 0, 2),
(1297, 'advert_placement', 'إعلان', 'one-line', 0, 0, 2),
(1298, 'password_protect', 'حماية كلمة المرور', 'one-line', 0, 0, 2),
(1299, 'rejected', 'مرفوض', 'one-line', 0, 0, 2),
(1300, 'download', 'تحميل', 'one-line', 0, 0, 2),
(1301, 'sender_name', 'اسم المرسل', 'one-line', 0, 0, 2),
(1302, 'view_message', 'شاهد الرساله', 'one-line', 0, 0, 2),
(1303, 'smtp_password', 'كلمة مرور smtp', 'one-line', 0, 0, 2),
(1304, 'add', 'يضيف', 'one-line', 0, 0, 2),
(1305, 'exceeds_username_length', 'يتجاوز الحد الأقصى لطول اسم المستخدم', 'one-line', 0, 0, 2),
(1306, 'supported_image_formats', 'صيغ الصور المدعومة', 'one-line', 0, 0, 2),
(1307, 'blacklist', 'القائمة السوداء', 'one-line', 0, 0, 2),
(1308, 'users', 'المستخدمين', 'one-line', 0, 0, 2),
(1309, 'info', 'معلومات', 'one-line', 0, 0, 2),
(1310, 'smtp_authentication', 'مصادقة smtp', 'one-line', 0, 0, 2),
(1311, 'group_icon', 'أيقونة الجروب', 'one-line', 0, 0, 2),
(1312, 'user_registration', 'تسجيل المستخدم', 'one-line', 0, 0, 2),
(1313, 'edit_own_group', 'تحرير الجروب الخاص به', 'one-line', 0, 0, 2),
(1314, 'ignored', 'اشخاص تم تجاهلهم', 'one-line', 0, 0, 2),
(1315, 'view', 'مشاهدة', 'one-line', 0, 0, 2),
(1316, 'not_found_page_expression', 'لم يتم العثور على هذه الصفحة', 'one-line', 0, 0, 2),
(1317, 'deactivate_account', 'تعطيل الحساب', 'one-line', 0, 0, 2),
(1318, 'login_text', 'تسجيل الدخول إلى حسابك', 'one-line', 0, 0, 2),
(1319, 'send_as_user', 'أرسل لمستخدم آخر', 'one-line', 0, 0, 2),
(1320, 'last_login', 'آخر تسجيل دخول', 'one-line', 0, 0, 2);
INSERT INTO `gr_language_strings` (`string_id`, `string_constant`, `string_value`, `string_type`, `skip_update`, `skip_cache`, `language_id`) VALUES
(1321, 'custom_field_6_options', '{\"DZ\":\"Algeria\",\"AO\":\"Angola\",\"BJ\":\"Benin\",\"BW\":\"Botswana\",\"BF\":\"Burkina Faso\",\"BI\":\"Burundi\",\"CM\":\"Cameroon\",\"CV\":\"Cape Verde\",\"CF\":\"Central African Republic\",\"TD\":\"Chad\",\"KM\":\"Comoros\",\"CD\":\"Congo [DRC]\",\"CG\":\"Congo [Republic]\",\"DJ\":\"Djibouti\",\"EG\":\"Egypt\",\"GQ\":\"Equatorial Guinea\",\"ER\":\"Eritrea\",\"ET\":\"Ethiopia\",\"GA\":\"Gabon\",\"GM\":\"Gambia\",\"GH\":\"Ghana\",\"GN\":\"Guinea\",\"GW\":\"Guinea-Bissau\",\"CI\":\"Ivory Coast\",\"KE\":\"Kenya\",\"LS\":\"Lesotho\",\"LR\":\"Liberia\",\"LY\":\"Libya\",\"MG\":\"Madagascar\",\"MW\":\"Malawi\",\"ML\":\"Mali\",\"MR\":\"Mauritania\",\"MU\":\"Mauritius\",\"YT\":\"Mayotte\",\"MA\":\"Morocco\",\"MZ\":\"Mozambique\",\"NA\":\"Namibia\",\"NE\":\"Niger\",\"NG\":\"Nigeria\",\"RW\":\"Rwanda\",\"RE\":\"R\\u00e9union\",\"SH\":\"Saint Helena\",\"SN\":\"Senegal\",\"SC\":\"Seychelles\",\"SL\":\"Sierra Leone\",\"SO\":\"Somalia\",\"ZA\":\"South Africa\",\"SD\":\"Sudan\",\"SZ\":\"Swaziland\",\"ST\":\"S\\u00e3o Tom\\u00e9 and Pr\\u00edncipe\",\"TZ\":\"Tanzania\",\"TG\":\"Togo\",\"TN\":\"Tunisia\",\"UG\":\"Uganda\",\"EH\":\"Western Sahara\",\"ZM\":\"Zambia\",\"ZW\":\"Zimbabwe\",\"AQ\":\"Antarctica\",\"BV\":\"Bouvet Island\",\"TF\":\"French Southern Territories\",\"HM\":\"Heard Island and McDonald Island\",\"GS\":\"South Georgia and the South Sandwich Islands\",\"AF\":\"Afghanistan\",\"AM\":\"Armenia\",\"AZ\":\"Azerbaijan\",\"BH\":\"Bahrain\",\"BD\":\"Bangladesh\",\"BT\":\"Bhutan\",\"IO\":\"British Indian Ocean Territory\",\"BN\":\"Brunei\",\"KH\":\"Cambodia\",\"CN\":\"China\",\"CX\":\"Christmas Island\",\"CC\":\"Cocos [Keeling] Islands\",\"GE\":\"Georgia\",\"HK\":\"Hong Kong\",\"IN\":\"India\",\"ID\":\"Indonesia\",\"IR\":\"Iran\",\"IQ\":\"Iraq\",\"IL\":\"Israel\",\"JP\":\"Japan\",\"JO\":\"Jordan\",\"KZ\":\"Kazakhstan\",\"KW\":\"Kuwait\",\"KG\":\"Kyrgyzstan\",\"LA\":\"Laos\",\"LB\":\"Lebanon\",\"MO\":\"Macau\",\"MY\":\"Malaysia\",\"MV\":\"Maldives\",\"MN\":\"Mongolia\",\"MM\":\"Myanmar [Burma]\",\"NP\":\"Nepal\",\"KP\":\"North Korea\",\"OM\":\"Oman\",\"PK\":\"Pakistan\",\"PS\":\"Palestinian Territories\",\"PH\":\"Philippines\",\"QA\":\"Qatar\",\"SA\":\"Saudi Arabia\",\"SG\":\"Singapore\",\"KR\":\"South Korea\",\"LK\":\"Sri Lanka\",\"SY\":\"Syria\",\"TW\":\"Taiwan\",\"TJ\":\"Tajikistan\",\"TH\":\"Thailand\",\"TR\":\"Turkey\",\"TM\":\"Turkmenistan\",\"AE\":\"United Arab Emirates\",\"UZ\":\"Uzbekistan\",\"VN\":\"Vietnam\",\"YE\":\"Yemen\",\"AL\":\"Albania\",\"AD\":\"Andorra\",\"AT\":\"Austria\",\"BY\":\"Belarus\",\"BE\":\"Belgium\",\"BA\":\"Bosnia and Herzegovina\",\"BG\":\"Bulgaria\",\"HR\":\"Croatia\",\"CY\":\"Cyprus\",\"CZ\":\"Czech Republic\",\"DK\":\"Denmark\",\"EE\":\"Estonia\",\"FO\":\"Faroe Islands\",\"FI\":\"Finland\",\"FR\":\"France\",\"DE\":\"Germany\",\"GI\":\"Gibraltar\",\"GR\":\"Greece\",\"GG\":\"Guernsey\",\"HU\":\"Hungary\",\"IS\":\"Iceland\",\"IE\":\"Ireland\",\"IM\":\"Isle of Man\",\"IT\":\"Italy\",\"JE\":\"Jersey\",\"XK\":\"Kosovo\",\"LV\":\"Latvia\",\"LI\":\"Liechtenstein\",\"LT\":\"Lithuania\",\"LU\":\"Luxembourg\",\"MK\":\"Macedonia\",\"MT\":\"Malta\",\"MD\":\"Moldova\",\"MC\":\"Monaco\",\"ME\":\"Montenegro\",\"NL\":\"Netherlands\",\"NO\":\"Norway\",\"PL\":\"Poland\",\"PT\":\"Portugal\",\"RO\":\"Romania\",\"RU\":\"Russia\",\"SM\":\"San Marino\",\"RS\":\"Serbia\",\"CS\":\"Serbia and Montenegro\",\"SK\":\"Slovakia\",\"SI\":\"Slovenia\",\"ES\":\"Spain\",\"SJ\":\"Svalbard and Jan Mayen\",\"SE\":\"Sweden\",\"CH\":\"Switzerland\",\"UA\":\"Ukraine\",\"GB\":\"United Kingdom\",\"VA\":\"Vatican City\",\"AX\":\"\\u00c5land Islands\",\"AI\":\"Anguilla\",\"AG\":\"Antigua and Barbuda\",\"AW\":\"Aruba\",\"BS\":\"Bahamas\",\"BB\":\"Barbados\",\"BZ\":\"Belize\",\"BM\":\"Bermuda\",\"BQ\":\"Bonaire\",\"VG\":\"British Virgin Islands\",\"CA\":\"Canada\",\"KY\":\"Cayman Islands\",\"CR\":\"Costa Rica\",\"CU\":\"Cuba\",\"CW\":\"Curacao\",\"DM\":\"Dominica\",\"DO\":\"Dominican Republic\",\"SV\":\"El Salvador\",\"GL\":\"Greenland\",\"GD\":\"Grenada\",\"GP\":\"Guadeloupe\",\"GT\":\"Guatemala\",\"HT\":\"Haiti\",\"HN\":\"Honduras\",\"JM\":\"Jamaica\",\"MQ\":\"Martinique\",\"MX\":\"Mexico\",\"MS\":\"Montserrat\",\"AN\":\"Netherlands Antilles\",\"NI\":\"Nicaragua\",\"PA\":\"Panama\",\"PR\":\"Puerto Rico\",\"BL\":\"Saint Barth\\u00e9lemy\",\"KN\":\"Saint Kitts and Nevis\",\"LC\":\"Saint Lucia\",\"MF\":\"Saint Martin\",\"PM\":\"Saint Pierre and Miquelon\",\"VC\":\"Saint Vincent and the Grenadines\",\"SX\":\"Sint Maarten\",\"TT\":\"Trinidad and Tobago\",\"TC\":\"Turks and Caicos Islands\",\"VI\":\"U.S. Virgin Islands\",\"US\":\"United States\",\"AR\":\"Argentina\",\"BO\":\"Bolivia\",\"BR\":\"Brazil\",\"CL\":\"Chile\",\"CO\":\"Colombia\",\"EC\":\"Ecuador\",\"FK\":\"Falkland Islands\",\"GF\":\"French Guiana\",\"GY\":\"Guyana\",\"PY\":\"Paraguay\",\"PE\":\"Peru\",\"SR\":\"Suriname\",\"UY\":\"Uruguay\",\"VE\":\"Venezuela\",\"AS\":\"American Samoa\",\"AU\":\"Australia\",\"CK\":\"Cook Islands\",\"TL\":\"East Timor\",\"FJ\":\"Fiji\",\"PF\":\"French Polynesia\",\"GU\":\"Guam\",\"KI\":\"Kiribati\",\"MH\":\"Marshall Islands\",\"FM\":\"Micronesia\",\"NR\":\"Nauru\",\"NC\":\"New Caledonia\",\"NZ\":\"New Zealand\",\"NU\":\"Niue\",\"NF\":\"Norfolk Island\",\"MP\":\"Northern Mariana Islands\",\"PW\":\"Palau\",\"PG\":\"Papua New Guinea\",\"PN\":\"Pitcairn Islands\",\"WS\":\"Samoa\",\"SB\":\"Solomon Islands\",\"TK\":\"Tokelau\",\"TO\":\"Tonga\",\"TV\":\"Tuvalu\",\"UM\":\"U.S. Minor Outlying Islands\",\"VU\":\"Vanuatu\",\"WF\":\"Wallis and Futuna\"}', 'multi_line', 1, 0, 2),
(1322, 'smtp_protocol', 'SMTP (SSL/TLS)', 'one-line', 0, 0, 2),
(1323, 'create_advert', 'إنشاء إعلان', 'one-line', 0, 0, 2),
(1324, 'not_found_page_description', 'قم بتحديث الصفحة لكي تتمكن من دخول الشات ', 'multi-line', 0, 0, 2),
(1325, 'guest_login_text', 'قم بإنشاء حساب مستخدم ضيف', 'one-line', 0, 0, 2),
(1326, 'edit_role', 'تحرير الدور', 'one-line', 0, 0, 2),
(1327, 'temporarily_banned_from_group', 'محظور مؤقتًا من الجروب', 'one-line', 0, 0, 2),
(1328, 'message', 'محادثة خاصة', 'one-line', 0, 0, 2),
(1329, 'empty_profile', 'ملف تعريف فارغ', 'one-line', 0, 0, 2),
(1330, 'ban_ip_addresses', 'حظر IP ', 'one-line', 0, 0, 2),
(1331, 'default_font', 'الخط الافتراضي', 'one-line', 0, 0, 2),
(1332, 'whitelist', 'القائمة البيضاء', 'one-line', 0, 0, 2),
(1333, 'signup', 'إنشاء حساب', 'one-line', 0, 0, 2),
(1334, 'avatars', 'صور avatars', 'one-line', 0, 0, 2),
(1335, 'smtp_host', 'SMTP Host', 'one-line', 0, 0, 2),
(1336, 'title', 'عنوان', 'one-line', 0, 0, 2),
(1337, 'updated_group_info', 'حدث معلومات الجروب .', 'one-line', 0, 0, 2),
(1338, 'ban_from_group', 'طرد نهائي', 'one-line', 0, 0, 2),
(1339, 'role_name', 'اسم الدور', 'one-line', 0, 0, 2),
(1340, 'pin_group', 'تثبيت الجروب', 'one-line', 0, 0, 2),
(1341, 'delete_own_group', 'حذف مالك الجروب', 'one-line', 0, 0, 2),
(1342, 'delete', 'حذف', 'one-line', 0, 0, 2),
(1343, 'manage_avatars', 'ادارة الصور الرمزية', 'one-line', 0, 0, 2),
(1344, 'appid', 'APP/Client ID', 'one-line', 0, 0, 2),
(1345, 'temporarily_banned', 'اصغط للدخول الشات ', 'one-line', 0, 0, 2),
(1346, 'not_found_page_button', 'اضغط هنا للدخول الشات ', 'one-line', 0, 0, 2),
(1347, 'action_taken', 'تم اتخاذ فعل', 'one-line', 0, 0, 2),
(1348, 'choose_avatar', 'اختر صورة رمزية', 'one-line', 0, 0, 2),
(1349, 'edit_menu_item', 'تحرير عنصر القائمة', 'one-line', 0, 0, 2),
(1350, 'unban_ip_addresses', 'الغاء حظر IP', 'one-line', 0, 0, 2),
(1351, 'signup_text', 'انشاء حساب جديد', 'one-line', 0, 0, 2),
(1352, 'search_here', 'ابحث هنا', 'one-line', 0, 0, 2),
(1353, 'enable', 'تفعيل', 'one-line', 0, 0, 2),
(1354, 'deactivated', 'معطل', 'one-line', 0, 0, 2),
(1355, 'radio_station', 'محطة إذاعية', 'one-line', 0, 0, 2),
(1356, 'system_variables', 'متغيرات النظام', 'one-line', 0, 0, 2),
(1357, 'logout', 'تسجيل خروج', 'one-line', 0, 0, 2),
(1358, 'stickers', 'ملصقات', 'one-line', 0, 0, 2),
(1359, 'forgot_password_text', 'سنرسل لك تعليمات استعادة كلمة المرور إلى عنوان البريد الإلكتروني المرتبط بحسابك.', 'one-line', 0, 0, 2),
(1360, 'report', 'تبيلغ اساءة', 'one-line', 0, 0, 2),
(1361, 'agree', 'يوافق', 'one-line', 0, 0, 2),
(1362, 'attach_from_storage', 'إرفاق من التخزين', 'one-line', 0, 0, 2),
(1363, 'screenshot', 'لقطة شاشة', 'one-line', 0, 0, 2),
(1364, 'disable', 'الغاء التفعيل', 'one-line', 0, 0, 2),
(1365, 'reload', 'تحذيث الصفحة ', 'one-line', 0, 0, 2),
(1366, 'mentioned_group_chat', 'ذكرك في الجروب', 'one-line', 0, 0, 2),
(1367, 'send_mail', 'ارسل إيميل', 'one-line', 0, 0, 2),
(1368, 'general_settings', 'الاعدادات العامة', 'one-line', 0, 0, 2),
(1369, 'strict_mode', 'الوضع الصارم', 'one-line', 0, 0, 2),
(1370, 'block_user', 'بلوك block', 'one-line', 0, 0, 2),
(1371, 'options', 'خيارات', 'one-line', 0, 0, 2),
(1372, 'audio_player', 'راديو', 'one-line', 0, 0, 2),
(1373, 'who_all_can_send_messages', 'من يمكنه إرسال الرسائل', 'one-line', 0, 0, 2),
(1374, 'gravatar', 'Gravatar', 'one-line', 0, 0, 2),
(1375, 'onesignal', 'onesignal', 'one-line', 0, 0, 2),
(1376, 'ban_ip_addresses_confirmation', 'هل أنت متأكد أنك تريد حظر العضو بشكل نهائي ؟', 'one-line', 0, 0, 2),
(1377, 'switch', 'تحويل', 'one-line', 0, 0, 2),
(1378, 'name_color', 'لون الاسم', 'one-line', 0, 0, 2),
(1379, 'minimum_username_length', 'الحد الأدنى للعدد حروف المستخدم', 'one-line', 0, 0, 2),
(1380, 'onesignal_app_id', 'onesignal app id', 'one-line', 0, 0, 2),
(1381, 'confirm_delete', 'هل أنت متأكد أنك تريد حذف العنصر (العناصر) المحددة؟', 'one-line', 0, 0, 2),
(1382, 'onesignal_rest_api_key', 'OneSignal REST API Key', 'one-line', 0, 0, 2),
(1383, 'audio_files', 'ملفات صوتية', 'one-line', 0, 0, 2),
(1384, 'logo', 'الوجو الرئيسي', 'one-line', 0, 0, 2),
(1385, 'ban', 'حظر', 'one-line', 0, 0, 2),
(1386, 'smtp_port', 'SMTP Port', 'one-line', 0, 0, 2),
(1387, 'group_role', 'دور الجروب', 'one-line', 0, 0, 2),
(1388, 'back_to_login', 'العودة إلى تسجيل الدخول', 'one-line', 0, 0, 2),
(1389, 'confirm_join', 'هل أنت متأكد أنك تريد الإنضمام لهذا الجروب ؟', 'one-line', 0, 0, 2),
(1390, 'invalid_email_address', 'عنوان البريد الإلكتروني غير صالح', 'one-line', 0, 0, 2),
(1391, 'left_group', 'غادر الدردشة الجماعية', 'one-line', 0, 0, 2),
(1392, 'device_blocked', 'تم حظر جهازك. تم تجاوز الحد الأقصى لمحاولات تسجيل الدخول. حاول مرة أخرى في ساعة واحدة.', 'one-line', 0, 0, 2),
(1393, 'unban_ip_addresses_confirmation', 'هل أنت متأكد أنك تريد السماح بعناوين IP للمستخدم؟', 'one-line', 0, 0, 2),
(1394, 'replied_group_message', 'أرسلت ردًا على رسالة الدردشة الجماعية الخاصة بك', 'one-line', 0, 0, 2),
(1395, 'playlist', 'قائمة التشغيل', 'one-line', 0, 0, 2),
(1396, 'onesignal_safari_web_id', 'OneSignal Safari Web ID', 'one-line', 0, 0, 2),
(1397, 'favicon', 'رمز الموقع في شريط المتصفح', 'one-line', 0, 0, 2),
(1398, 'view_group_members', 'عرض أعضاء الجروب', 'one-line', 0, 0, 2),
(1399, 'attribute', 'يصف', 'one-line', 0, 0, 2),
(1400, 'ip_address', 'عنوان IP', 'one-line', 0, 0, 2),
(1401, 'system_default', 'النظام الافتراضي', 'one-line', 0, 0, 2),
(1402, 'new', 'new', 'one-line', 0, 0, 2),
(1403, 'site_role', 'رتبة الموقع', 'one-line', 0, 0, 2),
(1404, 'view_profile', 'عرض الصفحة الشخصية', 'one-line', 0, 0, 2),
(1405, 'default_site_role', 'دور الموقع الافتراضي', 'one-line', 0, 0, 2),
(1406, 'edit_group', 'تحرير الجروب', 'one-line', 0, 0, 2),
(1407, 'view_currently_online', 'مشاهدة الاعضاء المتصلين حاليا', 'one-line', 0, 0, 2),
(1408, 'reply', 'رد ', 'one-line', 0, 0, 2),
(1409, 'guest_users', 'المستخدمون الضيوف', 'one-line', 0, 0, 2),
(1410, 'protected_group', 'الجروبات المحمية', 'one-line', 0, 0, 2),
(1411, 'minutes', 'دقائق', 'one-line', 0, 0, 2),
(1412, 'roles', 'رتب المستخدمين', 'one-line', 0, 0, 2),
(1413, 'push_notification_icon', 'دفع أيقونة الإخطار', 'one-line', 0, 0, 2),
(1414, 'group_url', 'رابط الجروب', 'one-line', 0, 0, 2),
(1415, 'offline_page_description', 'يبدو أنك فقدت اتصالك بالإنترنت ', 'one-line', 0, 0, 2),
(1416, 'add_audio', 'أضف الصوت', 'one-line', 0, 0, 2),
(1417, 'providers', 'Providers', 'one-line', 0, 0, 2),
(1418, 'current_role', 'الدور الحالي', 'one-line', 0, 0, 2),
(1419, 'custom_menu_item_1', 'شروط الإستخدام', 'one-line', 0, 0, 2),
(1420, 'non_latin_usernames', 'أسماء مستخدمين غير لاتينية', 'one-line', 0, 0, 2),
(1421, 'add_members', 'إضافة أعضاء', 'one-line', 0, 0, 2),
(1422, 'invalid_login', 'تسجيل الدخول غير صالح', 'one-line', 0, 0, 2),
(1423, 'members', 'أعضاء', 'one-line', 0, 0, 2),
(1424, 'timestamp', 'الطابع الزمني', 'one-line', 0, 0, 2),
(1425, 'unverified_users', 'المستخدمون الذين لم يتم التحقق منهم', 'one-line', 0, 0, 2),
(1426, 'image', 'صورة', 'one-line', 0, 0, 2),
(1427, 'disagree', 'تعارض', 'one-line', 0, 0, 2),
(1428, 'full_name', 'الاسم الكامل', 'one-line', 0, 0, 2),
(1429, 'onesignal_prompt_message', 'نود أن نرسل إليك إشعارات فورية بآخر التحديثات.', 'one-line', 0, 0, 2),
(1430, 'typing_indicator', 'مؤشر الكتابة', 'one-line', 0, 0, 2),
(1431, 'headers_footers', 'الرؤوس والتذييلات', 'one-line', 0, 0, 2),
(1432, 'content', 'محتوى', 'one-line', 0, 0, 2),
(1433, 'platform', 'منصة', 'one-line', 0, 0, 2),
(1434, 'ban_from_group_confirmation', 'تأكيد الحظر', 'one-line', 0, 0, 2),
(1435, 'denied', 'تم رفض الإذن', 'one-line', 0, 0, 2),
(1436, 'now_playing', 'اللعب الان', 'one-line', 0, 0, 2),
(1437, 'offline_page_button', 'تحديث', 'one-line', 0, 0, 2),
(1438, 'sending_limit', 'حد الإرسال (بالدقيقة)', 'one-line', 0, 0, 2),
(1439, 'dateformat', 'صيغة التاريخ', 'one-line', 0, 0, 2),
(1440, 'banned_users', 'المستخدمون المحظورون', 'one-line', 0, 0, 2),
(1441, 'share', 'مشاركة', 'one-line', 0, 0, 2),
(1442, 'onesignal_prompt_accept_button', 'يسمح', 'one-line', 0, 0, 2),
(1443, 'view_public_groups', 'عرض الجروبات العامة', 'one-line', 0, 0, 2),
(1444, 'confirm_your_email_address', 'أنت مطالب بالتحقق من عنوان بريدك الإلكتروني. لقد أرسلنا بريدًا إلكترونيًا به رابط تأكيد إلى عنوان بريدك الإلكتروني. لإكمال عملية التسجيل ، يرجى النقر فوق رابط التأكيد.', 'one-line', 0, 0, 2),
(1445, 'search', 'بحث', 'one-line', 0, 0, 2),
(1446, 'join_group', 'إنضم للجروب', 'one-line', 0, 0, 2),
(1447, 'dark_mode', 'اللون الغامق', 'one-line', 0, 0, 2),
(1448, 'account_banned', 'تم حظر حسابك لانتهاك شروط الخدمة.', 'one-line', 0, 0, 2),
(1449, 'badge', 'وسام', 'one-line', 0, 0, 2),
(1450, 'onesignal_prompt_cancel_button', 'إلفاء', 'one-line', 0, 0, 2),
(1451, 'view_secret_groups', 'مشاهدة الجروبات السرية', 'one-line', 0, 0, 2),
(1452, 'slideshows', 'عرض الشرائح', 'one-line', 0, 0, 2),
(1453, 'reply_to', 'الرد على', 'one-line', 0, 0, 2),
(1454, 'join', 'ينضم', 'one-line', 0, 0, 2),
(1455, 'edit_site_role', 'تحرير دور الموقع', 'one-line', 0, 0, 2),
(1456, 'add_images', 'إضافة الصور', 'one-line', 0, 0, 2),
(1457, 'unknown', 'مجهول', 'one-line', 0, 0, 2),
(1458, 'sending_limit_reached', 'تم الوصول إلى حد الإرسال. انتظر من فضلك :', 'one-line', 0, 0, 2),
(1459, 'slideshow', 'عرض الشرائح', 'one-line', 0, 0, 2),
(1460, 'go_offline', 'الوضع المتخفي', 'one-line', 0, 0, 2),
(1461, 'not_found_page_title', '404 - الصفحة غير موجودة', 'one-line', 0, 0, 2),
(1462, 'non_member', 'غير الأعضاء', 'one-line', 0, 0, 2),
(1463, 'languages', 'اللغات', 'one-line', 0, 0, 2),
(1464, 'custom_menu_item_2', 'سياسة الخصوصية', 'one-line', 0, 0, 2),
(1465, 'edit_audio', 'تحرير الصوت', 'one-line', 0, 0, 2),
(1466, 'all_group_members', 'كافة أعضاء الجروب', 'one-line', 0, 0, 2),
(1467, 'maximum_username_length', 'أقصى طول لاسم المستخدم', 'one-line', 0, 0, 2),
(1468, 'export_chat', 'تصدير الدردشة', 'one-line', 0, 0, 2),
(1469, 'confirm_password', 'تأكيد كلمة المرور', 'one-line', 0, 0, 2),
(1470, 'report_group', 'تقرير الجروب', 'one-line', 0, 0, 2),
(1471, 'cookie_consent_modal_content', 'قد نستخدم ملفات تعريف الارتباط وإشارات الويب ووحدات بكسل التتبع وتقنيات التتبع الأخرى عند زيارة موقعنا على الويب ، بما في ذلك أي نموذج وسائط آخر أو قناة وسائط أو موقع ويب للجوال أو تطبيق جوال مرتبط أو متصل به (يُشار إليها إجمالاً باسم &quot;الموقع&quot;) للمساعدة تخصيص الموقع وتحسين تجربتك. نحتفظ بالحق في إجراء تغييرات على سياسة ملفات تعريف الارتباط هذه في أي وقت ولأي سبب. ستكون أي تغييرات أو تعديلات سارية فور نشر سياسة ملفات تعريف الارتباط المحدثة على الموقع ، وأنت تتنازل عن الحق في تلقي إشعار محدد لكل تغيير أو تعديل. نشجعك على مراجعة سياسة ملفات تعريف الارتباط هذه بشكل دوري للبقاء على اطلاع على التحديثات. سيتم اعتبار أنك قد علمت ، وستكون خاضعًا ، وسيتم اعتبار أنك قد قبلت التغييرات في أي سياسة ملفات تعريف ارتباط منقحة من خلال استمرارك في استخدام الموقع بعد تاريخ نشر سياسة ملفات تعريف الارتباط المنقحة هذه.', 'one-line', 0, 0, 2),
(1472, 'slug', 'الرابط الفرعي', 'one-line', 0, 0, 2),
(1473, 'web_push_new_pm_message', 'أرسل لك رسالة خاصة.', 'one-line', 0, 0, 2),
(1474, 'secret_group', 'الجروبات السرية', 'one-line', 0, 0, 2),
(1475, 'maximum_storage_space', 'مساحة التخزين القصوى (ميغا بايت)', 'one-line', 0, 0, 2),
(1476, 'system_email_address', 'عنوان البريد الإلكتروني للنظام', 'one-line', 0, 0, 2),
(1477, 'confirm_leave', 'هل أنت متأكد أنك تريد أن تغادر هذا الجروب ؟', 'one-line', 0, 0, 2),
(1478, 'web_push_sent_reply_message', 'رد على رسالتك', 'one-line', 0, 0, 2),
(1479, 'view_password_protected_groups', 'عرض الجروبات المحمية بكلمة مرور', 'one-line', 0, 0, 2),
(1480, 'category', 'فئة', 'one-line', 0, 0, 2),
(1481, 'light_mode', 'الوضع الفاتح', 'one-line', 0, 0, 2),
(1482, 'seconds', 'ثواني', 'one-line', 0, 0, 2),
(1483, 'joined_group', 'انضم إلى الجروب', 'one-line', 0, 0, 2),
(1484, 'mail_footer_text', 'إذا كانت لديك أية أسئلة أو استفسارات ، \\ n فلا تتردد في مراسلتنا عبر البريد الإلكتروني على', 'one-line', 0, 0, 2),
(1485, 'version', 'Version', 'one-line', 0, 0, 2),
(1486, 'custom_page_3_content', '[YOU CAN MODIFY THE PAGE CONTENTS VIA CUSTOM PAGES MODULE]', 'multi_line', 1, 1, 2),
(1487, 'ffmpeg_binaries_path', 'FFmpeg Binaries Path', 'one-line', 0, 0, 2),
(1488, 'shared_file', 'مشاركة ملف', 'one-line', 0, 0, 2),
(1489, 'chat', 'دردشة', 'one-line', 0, 0, 2),
(1490, 'user_email_verification', 'التحقق من البريد الإلكتروني للمستخدم', 'one-line', 0, 0, 2),
(1491, 'file_name', 'اسم الملف', 'one-line', 0, 0, 2),
(1492, 'banned', 'محظور', 'one-line', 0, 0, 2),
(1493, 'core_settings', 'الإعدادات الأساسية', 'one-line', 0, 0, 2),
(1494, 'short_text_field', 'نص قصير', 'one-line', 0, 0, 2),
(1495, 'member', 'عضو', 'one-line', 0, 0, 2),
(1496, 'allowed_file_formats', 'تنسيقات الملفات المسموح بها', 'one-line', 0, 0, 2),
(1497, 'edit_provider', 'تحرير الموفر', 'one-line', 0, 0, 2),
(1498, 'idle', 'عاطل', 'one-line', 0, 0, 2),
(1499, 'reset_password_email_subject', 'استرداد حسابك', 'one-line', 0, 0, 2),
(1500, 'unban_from_group', 'إلغاء الحظر من الجروب', 'one-line', 0, 0, 2),
(1501, 'edit', 'تعديل', 'one-line', 0, 0, 2),
(1502, 'unblocked', 'إلغاء الحظر', 'one-line', 0, 0, 2),
(1503, 'unban', 'إلغاء التثبيت', 'one-line', 0, 0, 2),
(1504, 'send_message', 'إرسال رسالة', 'one-line', 0, 0, 2),
(1505, 'group', 'جروب', 'one-line', 0, 0, 2),
(1506, 'inappropriate', 'غير مناسب', 'one-line', 0, 0, 2),
(1507, 'user_agent', 'وكيل المستخدم', 'one-line', 0, 0, 2),
(1508, 'denary_border_color', 'لون الحدود Denary', 'one-line', 0, 0, 2),
(1509, 'unban_from_group_confirmation', 'هل أنت متأكد أنك تريد إلغاء حظر هذا المستخدم من الجروب ؟', 'one-line', 0, 0, 2),
(1510, 'someone', 'شخص ما', 'one-line', 0, 0, 2),
(1511, 'secondary_border_color', 'Secondary Border Color', 'one-line', 0, 0, 2),
(1512, 'invite_users', 'دعوة اشخاص جدد', 'one-line', 0, 0, 2),
(1513, 'created_group', 'تم إنشاء الجروب', 'one-line', 0, 0, 2),
(1514, 'cover_pic', 'صورة الغلاف', 'one-line', 0, 0, 2),
(1515, 'today', 'اليوم', 'one-line', 0, 0, 2),
(1516, 'default_skin_mode', 'نظام الألوان الافتراضي', 'one-line', 0, 0, 2),
(1517, 'reset_password_email_heading', 'هل تواجه مشكلة في تسجيل الدخول؟', 'one-line', 0, 0, 2),
(1518, 'create_sticker_pack', 'إنشاء حزمة ملصقات', 'one-line', 0, 0, 2),
(1519, 'ffprobe_binaries_path', 'FFProbe Binaries Path', 'one-line', 0, 0, 2),
(1520, 'all', 'الجميع', 'one-line', 0, 0, 2),
(1521, 'reset_password_email_content', 'إعادة تعيين كلمة المرور الخاصة بك أمر سهل. فقط اضغط على الزر أدناه وسيتم تسجيل دخولك تلقائيًا إلى حسابك. إذا لم تقدم هذا الطلب ، فيرجى تجاهل هذا البريد الإلكتروني.', 'one-line', 0, 0, 2),
(1522, 'exceeded_max_msg_length', 'تجاوز الحد الأقصى للطول', 'one-line', 0, 0, 2),
(1523, 'create_unleavable_group', 'إنشاء جروب غير قابلة للكسر', 'one-line', 0, 0, 2),
(1524, 'reset_password_email_button_label', 'إعادة تعيين كلمة المرور', 'one-line', 0, 0, 2),
(1525, 'create_site_role', 'إنشاء دور الموقع', 'one-line', 0, 0, 2),
(1526, 'sending', 'إرسال', 'one-line', 0, 0, 2),
(1527, 'gif_search_engine', 'محرك بحث GIF', 'one-line', 0, 0, 2),
(1528, 'complaints', 'بلاغات ', 'one-line', 0, 0, 2),
(1529, 'yesterday', 'أمس', 'one-line', 0, 0, 2),
(1530, 'account_not_found', 'الحساب غير موجود', 'one-line', 0, 0, 2),
(1531, 'callback_url', 'عاود الاتصال بالعنوان', 'one-line', 0, 0, 2),
(1532, 'identifier', 'المعرف', 'one-line', 0, 0, 2),
(1533, 'reset_password_success_message', 'لقد أرسلنا إليك بريدًا إلكترونيًا يحتوي على رابط إعادة تعيين كلمة المرور الخاصة بك. انقر فوق الارتباط الموجود في البريد الإلكتروني لإنشاء كلمة مرور جديدة.', 'one-line', 0, 0, 2),
(1534, 'control_storage', 'التحكم الكامل في الوصول إلى مساحة تخزين المستخدم', 'one-line', 0, 0, 2),
(1535, 'send_audio_message', 'إرسال رسالة صوتية', 'one-line', 0, 0, 2),
(1536, 'access_token_expired', 'رمز الوصول غير صالح أو انتهت صلاحيته', 'one-line', 0, 0, 2),
(1537, 'edit_sticker_pack', 'تحرير حزمة الملصقات', 'one-line', 0, 0, 2),
(1538, 'remove_from_group', 'حذف من الجروب', 'one-line', 0, 0, 2),
(1539, 'tertiary_border_color', 'لون الحدود الثالثية', 'one-line', 0, 0, 2),
(1540, 'verification_email_subject', 'أكد عنوان بريدك الألكتروني', 'one-line', 0, 0, 2),
(1541, 'max_file_upload_size', 'الحجم الأقصى لتحميل الملف (ميغا بايت)', 'one-line', 0, 0, 2),
(1542, 'create_secret_group', 'إنشاء جروبات سرية', 'one-line', 0, 0, 2),
(1543, 'link_type', 'نوع الارتباط', 'one-line', 0, 0, 2),
(1544, 'verification_email_heading', 'تأكيد البريد الإلكتروني', 'one-line', 0, 0, 2),
(1545, 'settings', 'إعدادات', 'one-line', 0, 0, 2),
(1546, 'download_file', 'تحميل الملف', 'one-line', 0, 0, 2),
(1547, 'attach_gifs', 'إرفاق ملفات GIF', 'one-line', 0, 0, 2),
(1548, 'verification_email_content', 'قبل أن تبدأ ، نحتاج إلى التحقق من صحة عنوان بريدك الإلكتروني. الرجاء النقر فوق الزر أدناه للتحقق من عنوان بريدك الإلكتروني. إذا لم تقدم هذا الطلب ، فيرجى تجاهل هذا البريد الإلكتروني.', 'one-line', 0, 0, 2),
(1549, 'browser', 'المتصفح', 'one-line', 0, 0, 2),
(1550, 'remove_from_group_confirmation', 'هل أنت متأكد أنك تريد إزالة هذا المستخدم من الجروب ؟', 'one-line', 0, 0, 2),
(1551, 'delete_account', 'حذف الحساب', 'one-line', 0, 0, 2),
(1552, 'primary_font_size', 'حجم الخط الأساسي', 'one-line', 0, 0, 2),
(1553, 'image_files', 'ملفات الصور', 'one-line', 0, 0, 2),
(1554, 'role', 'دور', 'one-line', 0, 0, 2),
(1555, 'minimum_message_length', 'الحد الأدنى لطول الرسالة', 'one-line', 0, 0, 2),
(1556, 'on_user_mention_group_chat', 'يذكر شخص ما المستخدم في الدردشة الجماعية', 'one-line', 0, 0, 2),
(1557, 'joined', 'منضم', 'one-line', 0, 0, 2),
(1558, 'datetime', 'التاريخ والوقت', 'one-line', 0, 0, 2),
(1559, 'quaternary_border_color', 'لون الحدود الرباعية', 'one-line', 0, 0, 2),
(1560, 'none', 'لا أحد', 'one-line', 0, 0, 2),
(1561, 'verification_email_button_label', 'قم بتأكيد بريدك الألكتروني', 'one-line', 0, 0, 2),
(1562, 'string_constant', 'ثابت السلسلة', 'one-line', 0, 0, 2),
(1563, 'other_features', 'ميزات أخرى', 'one-line', 0, 0, 2),
(1564, 'block_user_confirmation', 'هل أنت متأكد أنك تريد حظر هذا المستخدم ؟', 'one-line', 0, 0, 2),
(1565, 'web_push_mentioned_user_message', 'ذكرك في الدردشة الجماعية', 'one-line', 0, 0, 2),
(1566, 'share_screenshot', 'مشاركة لقطة الشاشة', 'one-line', 0, 0, 2),
(1567, 'add_site_members', 'اضافة اعضاء للجروب', 'one-line', 0, 0, 2),
(1568, 'create_protected_group', 'إنشاء جروب محمي', 'one-line', 0, 0, 2),
(1569, 'upload_file', 'رفع ملف', 'one-line', 0, 0, 2),
(1570, 'search_messages', 'رسائل البحث', 'one-line', 0, 0, 2),
(1571, 'report_message', 'الإبلاغ عن رسالة', 'one-line', 0, 0, 2),
(1572, 'notification_tone', 'نغمة الإخطار', 'one-line', 0, 0, 2),
(1573, 'on_group_invitation', 'شخص ما يرسل دعوة للانضمام إلى جروب', 'one-line', 0, 0, 2),
(1574, 'set_as_default', 'تعيين كافتراضي', 'one-line', 0, 0, 2),
(1575, 'go_online', 'الوضع المرئي', 'one-line', 0, 0, 2),
(1576, 'long_text_field', 'نص طويل', 'one-line', 0, 0, 2),
(1577, 'secondary_font_size', 'حجم الخط الثانوي', 'one-line', 0, 0, 2),
(1578, 'email_verified', 'لقد نجحت في التحقق من بريدك الإلكتروني', 'one-line', 0, 0, 2),
(1579, 'preview_attachments', 'معاينة المرفقات', 'one-line', 0, 0, 2),
(1580, 'custom_page', 'صفحة مخصص', 'one-line', 0, 0, 2),
(1581, 'play_music', 'تشغيل الموسيقى', 'one-line', 0, 0, 2),
(1582, 'ignore_user_confirmation', 'هل أنت متأكد أنك تريد تجاهل هذا المستخدم؟', 'one-line', 0, 0, 2),
(1583, 'email_settings', 'إعدادات البريد الإلكتروني', 'one-line', 0, 0, 2),
(1584, 'reported', 'ذكرت', 'one-line', 0, 0, 2),
(1585, 'link_target', 'رابط الهدف', 'one-line', 0, 0, 2),
(1586, 'leave_group', 'غادر الجروب', 'one-line', 0, 0, 2),
(1587, 'video_files', 'ملفات فيديو', 'one-line', 0, 0, 2),
(1588, 'social_login_providers', 'مزودو تسجيل الدخول الاجتماعي', 'one-line', 0, 0, 2),
(1589, 'slug_already_exists', 'الرابط الفرعي موجود مسبقاُ', 'one-line', 0, 0, 2),
(1590, 'on_private_message', 'شخص ما يرسل رسالة خاصة', 'one-line', 0, 0, 2),
(1591, 'quinary_border_color', 'لون الحدود الخماسي', 'one-line', 0, 0, 2),
(1592, 'upload', 'رفع', 'one-line', 0, 0, 2),
(1593, 'remove_user', 'إزالة المستخدم', 'one-line', 0, 0, 2),
(1594, 'tertiary_font_size', 'حجم الخط الثالث', 'one-line', 0, 0, 2),
(1595, 'nickname', 'الاسم المؤقت', 'one-line', 0, 0, 2),
(1596, 'pwa_settings', 'إعدادات PWA', 'one-line', 0, 0, 2),
(1597, 'cancel', 'إالغاء', 'one-line', 0, 0, 2),
(1598, 'access_time', 'وقت الدخول', 'one-line', 0, 0, 2),
(1599, 'on_new_site_badges', 'حصل المستخدم على وسام جديدة', 'one-line', 0, 0, 2),
(1600, 'shortcodes', 'الرموز القصيرة', 'one-line', 0, 0, 2),
(1601, 'verification_code_expired', 'رمز التحقق غير صالح أو انتهت صلاحيته', 'one-line', 0, 0, 2),
(1602, 'exceeded_max_file_upload_size', 'تم تجاوز الحد الأقصى لحجم تحميل الملف', 'one-line', 0, 0, 2),
(1603, 'ignore_user', 'تجاهل المستخدم', 'one-line', 0, 0, 2),
(1604, 'progressive_web_application', 'تطبيق ويب تقدمي', 'one-line', 0, 0, 2),
(1605, 'unjoined', 'إزالة الانضمام', 'one-line', 0, 0, 2),
(1606, 'go_back', 'الذهاب للوراء', 'one-line', 0, 0, 2),
(1607, 'login_as_guest', 'تسجيل الدخول كزائر ', 'one-line', 0, 0, 2),
(1608, 'pwa_icon', 'PWA icon', 'one-line', 0, 0, 2),
(1609, 'sender', 'مرسل', 'one-line', 0, 0, 2),
(1610, 'on_reply_group_messages', 'شخص ما يرد على رسائل المستخدم (محادثة جماعية)', 'one-line', 0, 0, 2),
(1611, 'default_notification_tone', 'نغمة الإشعارات الافتراضية', 'one-line', 0, 0, 2),
(1612, 'pwa_name', 'اسم التطبيق', 'one-line', 0, 0, 2),
(1613, 'show_only_on', 'عرض فقط في', 'one-line', 0, 0, 2),
(1614, 'or_login_using', 'أو تسجيل الدخول باستخدام', 'one-line', 0, 0, 2),
(1615, 'date_field', 'التاريخ', 'one-line', 0, 0, 2),
(1616, 'pwa_short_name', 'الاسم المختصر للتطبيق', 'one-line', 0, 0, 2),
(1617, 'attach', 'مشاركة الملفات', 'one-line', 0, 0, 2),
(1618, 'group_info', 'معلومات الجروب', 'one-line', 0, 0, 2),
(1619, 'you', 'أنت', 'one-line', 0, 0, 2),
(1620, 'create_group', 'إنشاء جروب', 'one-line', 0, 0, 2),
(1621, 'site_records', 'تسجيلات الموقع', 'one-line', 0, 0, 2),
(1622, 'admin', 'مدير', 'one-line', 0, 0, 2),
(1623, 'allow_sharing_links', 'السماح بمشاركة الروابط', 'one-line', 0, 0, 2),
(1624, 'delete_access_log_confirmation', 'هل أنت متأكد أنك تريد إزالة سجل الوصول هذا؟', 'one-line', 0, 0, 2),
(1625, 'show_on_chat_page', 'إظهار في صفحة الدردشة', 'one-line', 0, 0, 2),
(1626, 'radio_stations', 'محطات الإذاعة', 'one-line', 0, 0, 2),
(1627, 'spam', 'رسائل إلكترونية مزعجة', 'one-line', 0, 0, 2),
(1628, 'login_as_user', 'تسجيل الدخول بـ حسابه', 'one-line', 0, 0, 2),
(1629, 'guest_login', 'ضيف ( زائر )', 'one-line', 0, 0, 2),
(1630, 'change_to_idle_status_after', 'التغيير إلى حالة الخمول بعد (بالدقائق)', 'one-line', 0, 0, 2),
(1631, 'unignore_user', 'مستخدم غير مألوف', 'one-line', 0, 0, 2),
(1632, 'firewall', 'الأي بيهات المحظورة', 'one-line', 0, 0, 2),
(1633, 'pwa_background_color', 'لون الخلفية', 'one-line', 0, 0, 2),
(1634, 'senary_border_color', 'لون الحدود Senary', 'one-line', 0, 0, 2),
(1635, 'documents', 'وثائق', 'one-line', 0, 0, 2),
(1636, 'chat_message', 'رسالة الدردشة', 'one-line', 0, 0, 2),
(1637, 'created_on', 'مسجل في الموقع منذ :', 'one-line', 0, 0, 2),
(1638, 'open_in_same_window', 'فتح في نفس النافذة', 'one-line', 0, 0, 2),
(1639, 'mobile_page_transition', 'انتقال الصفحة الموبايل', 'one-line', 0, 0, 2),
(1640, 'exporting', 'تصدير', 'one-line', 0, 0, 2),
(1641, 'infotip_footer_tag', 'ستتم طباعة هذا قبل علامة إغلاق &lt;/body&gt;', 'one-line', 0, 0, 2),
(1642, 'add_audio_files', 'أضف ملفات الصوت', 'one-line', 0, 0, 2),
(1643, 'unignore_user_confirmation', 'هل أنت متأكد أنك تريد إزالة هذا المستخدم من قائمة التجاهل؟', 'one-line', 0, 0, 2),
(1644, 'moderator', 'الوسيط', 'one-line', 0, 0, 2),
(1645, 'messages_per_call', 'الرسائل لكل مكالمة', 'one-line', 0, 0, 2),
(1646, 'delete_shared_files', 'حذف الملفات المشتركة', 'one-line', 0, 0, 2),
(1647, 'all_file_formats', 'جميع تنسيقات الملفات', 'one-line', 0, 0, 2),
(1648, 'invite', 'دعوة', 'one-line', 0, 0, 2),
(1649, 'username_already_exists', 'اسم المستخدم موجود بالفعل', 'one-line', 0, 0, 2),
(1650, 'generate_link_preview', 'إنشاء رابط معاينة', 'one-line', 0, 0, 2),
(1651, 'uploading', 'تحميل', 'one-line', 0, 0, 2),
(1652, 'pwa_theme_color', 'لون المظهر', 'one-line', 0, 0, 2),
(1653, 'files', 'الملفات', 'one-line', 0, 0, 2),
(1654, 'unignore', 'الغاء التجاهل', 'one-line', 0, 0, 2),
(1655, 'tertiary_text_color', 'لون نص الثلاثي', 'one-line', 0, 0, 2),
(1656, 'profile', 'الملف الشخصي', 'one-line', 0, 0, 2),
(1657, 'dropdown_field', 'اسقاط', 'one-line', 0, 0, 2),
(1658, 'manage_user_access_logs', 'إدارة سجلات وصول المستخدم', 'one-line', 0, 0, 2),
(1659, 'select_a_page', 'حدد صفحة', 'one-line', 0, 0, 2),
(1660, 'group_join_limit', 'الحد الأقصى لعدد الجروبات التي يمكن للمستخدم الانضمام إليها', 'one-line', 0, 0, 2),
(1661, 'blocked', 'الاشخاص االمحظورين', 'one-line', 0, 0, 2),
(1662, 'unblock_user_confirmation', 'هل أنت متأكد أنك تريد إلغاء حظر هذا المستخدم؟', 'one-line', 0, 0, 2),
(1663, 'confirm_export', 'هل تريد تصدير؟', 'one-line', 0, 0, 2),
(1664, 'pwa_description', 'وصف', 'one-line', 0, 0, 2),
(1665, 'super_privileges', 'الامتيازات الفائقة', 'one-line', 0, 0, 2),
(1666, 'description', 'وصف', 'one-line', 0, 0, 2),
(1667, 'login_settings', 'اعدادات تسجيل الدخول', 'one-line', 0, 0, 2),
(1668, 'disable_private_messages', 'تعطيل الرسائل الخاصة', 'one-line', 0, 0, 2),
(1669, 'pwa_display', 'وضع العرض', 'one-line', 0, 0, 2),
(1670, 'upload_files', 'تحميل الملفات', 'one-line', 0, 0, 2),
(1671, 'delete_own_message', 'حذف رسالتهم الخاصة', 'one-line', 0, 0, 2),
(1672, 'confirm', 'تأكيد', 'one-line', 0, 0, 2),
(1673, 'quaternary_font_size', 'حجم الخط الرباعي', 'one-line', 0, 0, 2),
(1674, 'header', 'رأس', 'one-line', 0, 0, 2),
(1675, 'standalone', 'قائمة بذاتها', 'one-line', 0, 0, 2),
(1676, 'remove_custom_bg', 'إزالة خلفة الجروب', 'one-line', 0, 0, 2),
(1677, 'open_in_new_tab', 'فتح في علامة تبويب جديدة', 'one-line', 0, 0, 2),
(1678, 'google_analytics_id', 'Google Analytics ID', 'one-line', 0, 0, 2),
(1679, 'change_full_name', 'تعديل الاسم الكامل', 'one-line', 0, 0, 2),
(1680, 'label_background_color', 'لون خلفية التسمية', 'one-line', 0, 0, 2),
(1681, 'create_role', 'إنشاء دور', 'one-line', 0, 0, 2),
(1682, 'create_user', 'إنشاء مستخدم', 'one-line', 0, 0, 2),
(1683, 'septenary_border_color', 'لون الحدود السبعينية', 'one-line', 0, 0, 2),
(1684, 'chat_page', 'صفحة الدردشة', 'one-line', 0, 0, 2),
(1685, 'change_to_offline_status_after', 'التغيير إلى حالة عدم الاتصال بعد (بالدقائق)', 'one-line', 0, 0, 2),
(1686, 'delete_all_messages', 'مسح المحادثة للجميع', 'one-line', 0, 0, 2),
(1687, 'menu_order', 'ترتيب القائمة', 'one-line', 0, 0, 2),
(1688, 'message_settings', 'إعدادات الرسالة', 'one-line', 0, 0, 2),
(1689, 'groups', 'جروبات الدردشة', 'one-line', 0, 0, 2),
(1690, 'invite_link', 'رابط دعوة', 'one-line', 0, 0, 2),
(1691, 'custom_pages', 'الصفحات المخصصة', 'one-line', 0, 0, 2),
(1692, 'login_cookie_validity', 'صلاحية ملفات تعريف الارتباط لتسجيل الدخول (أيام)', 'one-line', 0, 0, 2),
(1693, 'invalid_captcha', 'كلمة التحقق غير صالحة', 'one-line', 0, 0, 2),
(1694, 'ignore_users', 'تجاهل المستخدمين', 'one-line', 0, 0, 2),
(1695, 'fields', 'مجالات', 'one-line', 0, 0, 2),
(1696, 'private_conversations', 'رسائل خاصة', 'one-line', 0, 0, 2),
(1697, 'conversation', 'محادثة', 'one-line', 0, 0, 2),
(1698, 'number_field', 'رقم', 'one-line', 0, 0, 2),
(1699, 'gif_search_engine_api', 'GIF محرك البحث API', 'one-line', 0, 0, 2),
(1700, 'fullscreen', 'تكبير الشاشة', 'one-line', 0, 0, 2),
(1701, 'quaternary_text_color', 'لون النص الرباعي', 'one-line', 0, 0, 2),
(1702, 'web_address', 'عنوان صفحة انترنت', 'one-line', 0, 0, 2),
(1703, 'ban_from_site', 'حظر من الموقع', 'one-line', 0, 0, 2),
(1704, 'download_files', 'تحميل ملفات', 'one-line', 0, 0, 2),
(1705, 'delete_all', 'حذف الكل', 'one-line', 0, 0, 2),
(1706, 'request_timeout', 'ثواني المهلة (استقصاء طويل)', 'one-line', 0, 0, 2),
(1707, 'notification_settings', 'إشعارات', 'one-line', 0, 0, 2),
(1708, 'change_username', 'تعديل اسم المستخدم', 'one-line', 0, 0, 2),
(1709, 'footer', 'تذييل', 'one-line', 0, 0, 2),
(1710, 'read_more', 'اقرأ أكثر', 'one-line', 0, 0, 2),
(1711, 'abuse', 'إساءة', 'one-line', 0, 0, 2),
(1712, 'delete_older_than', 'حذف أقدم من (دقيقة)', 'one-line', 0, 0, 2),
(1713, 'delete_file_confirmation', 'هل أنت متأكد أنك تريد حذف هذا الملف؟', 'one-line', 0, 0, 2),
(1714, 'change_avatar', 'تغيير الصورة الشخصية ', 'one-line', 0, 0, 2),
(1715, 'octonary_border_color', 'لون الحدود الثمانية', 'one-line', 0, 0, 2),
(1716, 'delete_files', 'حذف الملفات', 'one-line', 0, 0, 2),
(1717, 'view_reactions', 'مشاهدة ردود الفعل', 'one-line', 0, 0, 2),
(1718, 'quinary_font_size', 'حجم الخط الخماسي', 'one-line', 0, 0, 2),
(1719, 'realtime_settings', 'إعدادات الوقت الفعلي', 'one-line', 0, 0, 2),
(1720, 'pages', 'الصفحات', 'one-line', 0, 0, 2),
(1721, 'attach_files', 'إرفاق ملفات', 'one-line', 0, 0, 2),
(1722, 'unblock_user', 'فتح الحظر عن المستخدم', 'one-line', 0, 0, 2),
(1723, 'menu_items', 'عناصر القائمة', 'one-line', 0, 0, 2),
(1724, 'entry_page_footer_text', 'شاتيور 2023', 'one-line', 0, 0, 2),
(1725, 'ltr', 'من اليسار إلى اليمين', 'one-line', 0, 0, 2),
(1726, 'exceeded_group_join_limit', 'تم تجاوز الحد الأقصى لعدد الجروبات التي يمكنك الانضمام إليها', 'one-line', 0, 0, 2),
(1727, 'minimal-ui', 'الحد الأدنى من واجهة المستخدم', 'one-line', 0, 0, 2),
(1728, 'senary_text_color', 'لون نص سيناري', 'one-line', 0, 0, 2),
(1729, 'confirm_delete_all_messages', 'هل أنت متأكد أنك تريد حذف جميع رسائل الدردشة؟', 'one-line', 0, 0, 2),
(1730, 'ban_from_site_confirmation', 'هل أنت متأكد أنك تريد منع هذا المستخدم من الوصول إلى الموقع؟', 'one-line', 0, 0, 2),
(1731, 'giphy', 'GIPHY', 'one-line', 0, 0, 2),
(1732, 'manage_user_roles', 'رتبة العضو في الجروب', 'one-line', 0, 0, 2),
(1733, 'offline_page_expression', 'أُووبس!', 'one-line', 0, 0, 2),
(1734, 'manage_custom_pages', 'إدارة الصفحات المخصصة', 'one-line', 0, 0, 2),
(1735, 'deleted', 'تم الحذف', 'one-line', 0, 0, 2),
(1736, 'upload_custom_avatar', 'رفع صورة رمزية خاصة', 'one-line', 0, 0, 2),
(1737, 'block_users', 'بلوك block', 'one-line', 0, 0, 2),
(1738, 'react_messages', 'الرد على الرسائل', 'one-line', 0, 0, 2),
(1739, 'gifs_per_load', 'صور GIF لكل تحميل', 'one-line', 0, 0, 2),
(1740, 'septenary_text_color', 'لون النص سبتارية', 'one-line', 0, 0, 2),
(1741, 'social_login', 'تسجيل الدخول الاجتماعي', 'one-line', 0, 0, 2),
(1742, 'offline_page_title', 'انت غير متصل', 'one-line', 0, 0, 2),
(1743, 'initiate_private_chat', 'بدء الدردشة الخاصة', 'one-line', 0, 0, 2),
(1744, 'set_custom_background', 'رفع صورة غلاف خاصة', 'one-line', 0, 0, 2),
(1745, 'req_min_msg_length', 'الحد الأدنى المطلوب لعدد الأحرف', 'one-line', 0, 0, 2),
(1746, 'system_messages_groups', 'رسائل النظام (الجروبات)', 'one-line', 0, 0, 2),
(1747, 'add_custom_field', 'إضافة حقل', 'one-line', 0, 0, 2),
(1748, 'download_attachments', 'تحميل المرفقات', 'one-line', 0, 0, 2),
(1749, 'senary_font_size', 'حجم الخط سيناري', 'one-line', 0, 0, 2),
(1750, 'delete_all_files_confirmation', 'هل أنت متأكد أنك تريد حذف كافة الملفات؟', 'one-line', 0, 0, 2),
(1751, 'set_cover_pic', 'تعيين صورة الغلاف', 'one-line', 0, 0, 2),
(1752, 'ffmpeg', 'FFmpeg', 'one-line', 0, 0, 2),
(1753, 'site_role_1', 'لم يتم التحقق منه', 'one-line', 0, 0, 2),
(1754, 'unblock', 'ازالة الـبلوك block', 'one-line', 0, 0, 2),
(1755, 'records_per_call', 'سجلات الموقع لكل مكالمة', 'one-line', 0, 0, 2),
(1756, 'banned_from_group', 'تم حظرك من الجروب', 'one-line', 0, 0, 2),
(1757, 'access_storage', 'الوصول إلى التخزين', 'one-line', 0, 0, 2),
(1758, 'octonary_text_color', 'لون نص ثماني', 'one-line', 0, 0, 2),
(1759, 'entries_per_call', 'إدخالات لكل مكالمة', 'one-line', 0, 0, 2),
(1760, 'custom_field_1', 'معلومات عَنِّي', 'one-line', 1, 0, 2),
(1761, 'send_on_behalf', 'إرسال رسائل نيابة', 'one-line', 0, 0, 2),
(1762, 'ban_users_from_site', 'حظر المستخدمين من الموقع', 'one-line', 0, 0, 2),
(1763, 'online', 'Online', 'one-line', 0, 0, 2),
(1764, 'storage_limit_exceeded', 'تم تجاوز حد التخزين', 'one-line', 0, 0, 2),
(1765, 'custom_site_role', 'دور موقع مخصص', 'one-line', 0, 0, 2),
(1766, 'unbanned_from_group', 'غير محظور من الجروب', 'one-line', 0, 0, 2),
(1767, 'meta_description', 'ميتا الوصف', 'one-line', 0, 0, 2),
(1768, 'adverts', 'الاعلانات', 'one-line', 0, 0, 2),
(1769, 'delete_users', 'حذف المستخدمين', 'one-line', 0, 0, 2),
(1770, 'remember_me', 'تذكرنى', 'one-line', 0, 0, 2),
(1771, 'view_private_chats', 'private chats', 'one-line', 0, 0, 2),
(1772, 'monitor_group_chats', 'group chats', 'one-line', 0, 0, 2),
(1773, 'show_on_info_page', 'إظهار في صفحة المعلومات', 'one-line', 0, 0, 2),
(1774, 'api_secret_key', 'المفتاح السري لواجهة برمجة التطبيقات', 'one-line', 0, 0, 2),
(1775, 'nonary_text_color', 'لون نص نوناري', 'one-line', 0, 0, 2),
(1776, 'delete_group', 'حذف الجروب', 'one-line', 0, 0, 2),
(1777, 'read_more_criteria', 'إضافة زر ', 'one-line', 0, 0, 2),
(1778, 'deleting', 'حذف', 'one-line', 0, 0, 2),
(1779, 'exceeded_maxgroupjoin', 'تم تجاوز الحد الأقصى لعدد الجروبات التي يمكنك الانضمام إليها', 'one-line', 0, 0, 2),
(1780, 'ban_users_from_group', 'حظر المستخدمين من الجروب', 'one-line', 0, 0, 2),
(1781, 'edit_custom_field_value', 'تحرير قيمة الحقل المخصص', 'one-line', 0, 0, 2),
(1782, 'banned_page_title', 'تم حظرك', 'one-line', 0, 0, 2),
(1783, 'uploading_files', 'تحميل الملف (الملفات)', 'one-line', 0, 0, 2),
(1784, 'nonary_border_color', 'لون الحدود nonary', 'one-line', 0, 0, 2),
(1785, 'editable_only_once', 'قابل للتحرير مرة واحدة فقط', 'one-line', 0, 0, 2),
(1786, 'offline', 'غير متصل على الانترنت', 'one-line', 0, 0, 2),
(1787, 'unban_users_from_site', 'إلغاء حظر المستخدمين من الموقع', 'one-line', 0, 0, 2),
(1788, 'refresh_rate', 'معدل تحديث الدردشة (بالثواني)', 'one-line', 0, 0, 2),
(1789, 'delete_messages', 'تنظيف الجروب للجميع', 'one-line', 0, 0, 2),
(1790, 'badge_title', 'اسم الوسام', 'one-line', 0, 0, 2),
(1791, 'click_to_view_info', 'انقر هنا لعرض المعلومات', 'one-line', 0, 0, 2),
(1792, 'add_menu_item', 'إضافة عنصر قائمة', 'one-line', 0, 0, 2),
(1793, 'chat_page_boxed_layout', 'تخطيط محاصر [صفحة الدردشة]', 'one-line', 0, 0, 2),
(1794, 'body', 'جسم', 'one-line', 0, 0, 2),
(1795, 'gif_content_filtering', 'تصفية محتوى GIF', 'one-line', 0, 0, 2),
(1796, 'username_condition', 'يجب أن يحتوي اسم المستخدم الخاص بك على حرف واحد على الأقل', 'one-line', 0, 0, 2),
(1797, 'entry_page', 'صفحة الدخول', 'one-line', 0, 0, 2),
(1798, 'infotip_header_tag', 'ستتم طباعة هذا في &amp; lt؛ head &amp; gt؛ قسم', 'one-line', 0, 0, 2),
(1799, 'high', 'عالي', 'one-line', 0, 0, 2),
(1800, 'infotip_body_tag', 'ستتم طباعة هذا بعد العلامة &amp; lt؛ body &amp; gt؛ علامة الافتتاح', 'one-line', 0, 0, 2),
(1801, 'link_text', 'نص الدعوة', 'one-line', 0, 0, 2),
(1802, 'maximum_login_attempts', 'الحد الأقصى من محاولات تسجيل الدخول', 'one-line', 0, 0, 2),
(1803, 'banned_page_expression', 'أوتش!', 'one-line', 0, 0, 2),
(1804, 'site_notifications', 'إخطارات الموقع', 'one-line', 0, 0, 2),
(1805, 'view_site_users', 'عرض مستخدمي الموقع', 'one-line', 0, 0, 2),
(1806, 'rtl', 'من اليمين الى اليسار', 'one-line', 0, 0, 2),
(1807, 'time_format', 'تنسيق الوقت', 'one-line', 0, 0, 2),
(1808, 'push_notifications', 'دفع الإخطارات', 'one-line', 0, 0, 2),
(1809, 'delete_only_offline_users', 'حذف المستخدمين غير المتصلين فقط', 'one-line', 0, 0, 2),
(1810, 'administrators', 'مدير الموقع ', 'one-line', 0, 0, 2),
(1811, 'medium', 'واسطة', 'one-line', 0, 0, 2),
(1812, 'profile_url', 'URL الملف الشخصي', 'one-line', 0, 0, 2),
(1813, 'meta_title', 'عنوان الفوقية', 'one-line', 0, 0, 2),
(1814, 'invalid_group_password', 'كلمة مرور الجروب غير صالحة', 'one-line', 0, 0, 2),
(1815, 'google_recaptcha_v2', 'برنامج Google reCAPTCHA v2', 'one-line', 0, 0, 2),
(1816, 'site_role_2', 'مؤسس الموقع', 'one-line', 0, 0, 2),
(1817, 'sticker_packs', 'حزم الملصقات', 'one-line', 0, 0, 2),
(1818, 'assign_badges', 'منح اوسمه', 'one-line', 0, 0, 2),
(1819, 'language_text_direction', 'اتجاه النص', 'one-line', 0, 0, 2),
(1820, 'send_push_notification', 'إرسال إشعار دفع', 'one-line', 0, 0, 2),
(1821, 'embed_code', 'كود التضمين', 'one-line', 0, 0, 2),
(1822, 'on_join_group_chat', 'شخص ما ينضم إلى الدردشة الجماعية', 'one-line', 0, 0, 2),
(1823, 'is_typing', 'يكتب', 'one-line', 0, 0, 2),
(1824, 'no_results_found', 'لم يتم العثور على نتائج', 'one-line', 0, 0, 2),
(1825, 'view_group', 'مشاهدة الجروب', 'one-line', 0, 0, 2),
(1826, 'switch_languages', 'تبديل اللغات', 'one-line', 0, 0, 2),
(1827, 'url', 'URL', 'one-line', 0, 0, 2),
(1828, 'add_language', 'إضافة لغة', 'one-line', 0, 0, 2),
(1829, 'comments_if_any', 'وضح سبب الشكوى بشكل كامل ( وإلا سيتم التجاهل )', 'one-line', 0, 0, 2),
(1830, 'monitor_private_chats', 'private chats', 'one-line', 0, 0, 2),
(1831, 'denary_text_color', 'لون النص Denary', 'one-line', 0, 0, 2),
(1832, 'low', 'قليل', 'one-line', 0, 0, 2),
(1833, 'maximum_message_length', 'أقصى طول للرسالة', 'one-line', 0, 0, 2),
(1834, 'no_results_found_subtitle', 'حاول تغيير عوامل التصفية أو مصطلح البحث', 'one-line', 0, 0, 2),
(1835, 'set_default_language', 'تعيين كلغة افتراضية', 'one-line', 0, 0, 2),
(1836, 'view_online_users', 'عرض المستخدمين المتصلين', 'one-line', 0, 0, 2),
(1837, 'banned_page_description', 'لقد تم منعك من استخدام هذا الموقع. إذا كنت تعتقد أن حسابك قد تم حظره عن طريق الخطأ ، فيرجى مراسلتنا عبر البريد الإلكتروني وسننظر في قضيتك.', 'one-line', 0, 0, 2),
(1838, 'posted_by', 'منشور من طرف', 'one-line', 0, 0, 2),
(1839, 'edit_custom_field', 'تحرير حقل مخصص', 'one-line', 0, 0, 2),
(1840, 'cookie_consent', 'الموافقة على ملفات تعريف الارتباط', 'one-line', 0, 0, 2),
(1841, 'on_load_guest_login_window', 'افتح نافذة تسجيل دخول الضيف عند التحميل (صفحة تسجيل الدخول)', 'one-line', 0, 0, 2),
(1842, 'listen_music', 'استمع الى الموسيقى', 'one-line', 0, 0, 2),
(1843, 'message_id', 'معرف الرسالة', 'one-line', 0, 0, 2),
(1844, 'location', 'موقع', 'one-line', 0, 0, 2),
(1845, 'edit_users', 'تحرير المستخدمين', 'one-line', 0, 0, 2),
(1846, 'view_full_name', 'مشاهدة الاسم الكامل', 'one-line', 0, 0, 2),
(1847, 'on_removal_from_group', 'تمت إزالة شخص ما من الجروب', 'one-line', 0, 0, 2),
(1848, 'unban_from_site', 'إلغاء الحظر من الموقع', 'one-line', 0, 0, 2),
(1849, 'unban_users_from_group', 'إلغاء حظر المستخدمين من الجروب', 'one-line', 0, 0, 2),
(1850, 'force_https', 'فرض HTTPS', 'one-line', 0, 0, 2),
(1851, 'primary_border_color', 'لون الحدود الأساسي', 'one-line', 0, 0, 2),
(1852, 'already_exists', 'موجود أصلا', 'one-line', 0, 0, 2),
(1853, 'email_username', 'البريد الإلكتروني / اسم المستخدم', 'one-line', 0, 0, 2),
(1854, 'create', 'تسجيل ', 'one-line', 0, 0, 2),
(1855, 'icon_class', 'فئة الأيقونات', 'one-line', 0, 0, 2),
(1856, 'forms', 'نماذج', 'one-line', 0, 0, 2),
(1857, 'site_adverts', 'إعلانات الموقع', 'one-line', 0, 0, 2),
(1858, 'yes', 'نعم', 'one-line', 0, 0, 2),
(1859, 'info_panel', 'لوحة المعلومات', 'one-line', 0, 0, 2),
(1860, 'on_leaving_group_chat', 'شخص ما يغادر الدردشة الجماعية', 'one-line', 0, 0, 2),
(1861, 'welcome_screen', 'شاشة الترحيب', 'one-line', 0, 0, 2),
(1862, 'forgot_password', 'هل نسيت كلمة السر', 'one-line', 0, 0, 2),
(1863, 'no', 'لا', 'one-line', 0, 0, 2),
(1864, 'whats_wrong', 'ما الخطأ في هذا', 'one-line', 0, 0, 2),
(1865, 'rename', 'إعادة تسمية', 'one-line', 0, 0, 2),
(1866, 'open_in_new_window', 'افتح الرابط في نافذة جديدة', 'one-line', 0, 0, 2),
(1867, 'advert_max_height', 'الارتفاع الأقصى (بكسل)', 'one-line', 0, 0, 2),
(1868, 'banned_page_button', 'اتصل بالدعم', 'one-line', 0, 0, 2),
(1869, 'rename_audio_file', 'إعادة تسمية ملف الصوت', 'one-line', 0, 0, 2),
(1870, 'hcaptcha', 'hCaptcha', 'one-line', 0, 0, 2),
(1871, 'landing_page', 'الصفحة الرئيسية', 'one-line', 0, 0, 2),
(1872, 'set_participant_settings', 'اضبط إعدادات المشارك', 'one-line', 0, 0, 2),
(1873, 'site_role_3', 'عضو مسجل', 'one-line', 0, 0, 2),
(1874, 'attachments', 'ملف وسائط', 'one-line', 0, 0, 2),
(1875, 'add_cron_job', 'إضافة وظيفة كرون', 'one-line', 0, 0, 2),
(1876, 'login_as_another_user', 'تسجيل الدخول كمستخدم آخر', 'one-line', 0, 0, 2),
(1877, 'slug_condition', 'يجب أن يحتوي الرابط الفرعي على حرف واحد على الأقل', 'one-line', 0, 0, 2),
(1878, 'private_chats', 'private', 'one-line', 0, 0, 2),
(1879, 'gif', 'GIF', 'one-line', 0, 0, 2),
(1880, 'badge_image', 'صورة الوسام ', 'one-line', 0, 0, 2),
(1881, 'register', 'إنشاء حساب جديد', 'one-line', 0, 0, 2),
(1882, 'conversation_with', 'محادثة مع', 'one-line', 0, 0, 2),
(1883, 'ssl', 'SSL', 'one-line', 0, 0, 2),
(1884, 'stream_url', 'دفق URL', 'one-line', 0, 0, 2),
(1885, 'remove_password', 'إزالة كلمة المرور', 'one-line', 0, 0, 2),
(1886, 'css_code', 'كود CSS', 'one-line', 0, 0, 2),
(1887, 'sticker', 'ملصق', 'one-line', 0, 0, 2),
(1888, 'site_role_4', 'محظور', 'one-line', 0, 0, 2),
(1889, 'account_reactivated', 'إعادة تنشيط الحساب. مرحبًا بعودتك', 'one-line', 0, 0, 2),
(1890, 'clear_realtime_activity_logs', 'مسح سجلات النشاط', 'one-line', 0, 0, 2),
(1891, 'sort', 'نوع', 'one-line', 0, 0, 2),
(1892, 'group_roles', 'رتبة الجروب', 'one-line', 0, 0, 2),
(1893, 'reset', 'إعادة ضبط', 'one-line', 0, 0, 2),
(1894, 'default', 'اللغة الإفتراضية', 'one-line', 0, 0, 2),
(1895, 'footer_block_description', 'كتلة التذييل [الوصف]', 'one-line', 0, 0, 2),
(1896, 'off', 'عن', 'one-line', 0, 0, 2),
(1897, 'edit_language', 'تحرير اللغة', 'one-line', 0, 0, 2),
(1898, 'delete_message_time_limit', 'المهلة الزمنية لحذف رسائلهم (بالدقائق)', 'one-line', 0, 0, 2),
(1899, 'denary_font_size', 'حجم الخط Denary', 'one-line', 0, 0, 2),
(1900, 'audio_message', 'رسالة صوتية', 'one-line', 0, 0, 2),
(1901, 'advert_content', 'محتوى الإعلان', 'one-line', 0, 0, 2),
(1902, 'edit_advert', 'تحرير إعلان', 'one-line', 0, 0, 2),
(1903, 'manage_audio_player', 'إدارة الراديو', 'one-line', 0, 0, 2),
(1904, 'group_invitation_email_button_label', 'إنضم للجروب', 'one-line', 0, 0, 2),
(1905, 'messages', 'رسائل خاصة', 'one-line', 0, 0, 2),
(1906, 'create_group_role', 'إنشاء رتبة جروب جديدة', 'one-line', 0, 0, 2),
(1907, 'flood_control_error_message', 'أنت تقدم بسرعة كبيرة. انتظر من فضلك', 'one-line', 0, 0, 2),
(1908, 'removed_from_group', 'تمت إزالته من الجروب', 'one-line', 0, 0, 2),
(1909, 'unbanned', 'غير محظور', 'one-line', 0, 0, 2),
(1910, 'manage_social_login', 'إدارة تسجيل الدخول الاجتماعي', 'one-line', 0, 0, 2),
(1911, 'order', 'طلب', 'one-line', 0, 0, 2),
(1912, 'hide_language', 'إخفاء اللغة', 'one-line', 0, 0, 2),
(1913, 'invalid_value', 'إدخال غير صالح أو الحقل فارغ', 'one-line', 0, 0, 2),
(1914, 'on_awarding_group_badges', 'منحت الجروب وسام جديد', 'one-line', 0, 0, 2),
(1915, 'custom_field_3', 'جنس', 'one-line', 1, 0, 2),
(1916, 'site_slogan', 'لوجو الموقع', 'one-line', 0, 0, 2),
(1917, 'tls', 'TLS', 'one-line', 0, 0, 2),
(1918, 'name', 'اسم', 'one-line', 0, 0, 2),
(1919, 'temporary_ban_from_group', 'طرد مؤقت', 'one-line', 0, 0, 2),
(1920, 'separate_commas', 'افصل بفاصلات', 'one-line', 0, 0, 2),
(1921, 'flood_control_time_difference', 'فارق التوقيت المطلوب بين كل رسالة (بالثواني)', 'one-line', 0, 0, 2),
(1922, 'site_role_5', 'زائر مؤقت', 'one-line', 0, 0, 2),
(1923, 'edit_group_role', 'تحرير رتبة الجروب', 'one-line', 0, 0, 2),
(1924, 'facebook_url', 'URL الفيسبوك', 'one-line', 0, 0, 2),
(1925, 'attach_stickers', 'إرفاق الملصقات', 'one-line', 0, 0, 2),
(1926, 'pinned_group', 'جروب مثبت', 'one-line', 0, 0, 2),
(1927, 'user_does_not_exist', 'المستخدم غير موجود', 'one-line', 0, 0, 2),
(1928, 'view_all', 'مشاهدة الكل', 'one-line', 0, 0, 2),
(1929, 'create_badge', 'أنشئ وسام', 'one-line', 0, 0, 2),
(1930, 'add_provider', 'إضافة موفر', 'one-line', 0, 0, 2),
(1931, 'message_alignment', 'محاذاة الرسالة', 'one-line', 0, 0, 2),
(1932, 'on_getting_banned_from_group', 'تم حظر شخص ما من الجروب', 'one-line', 0, 0, 2),
(1933, 'edit_cron_job', 'تحرير وظيفة Cron', 'one-line', 0, 0, 2),
(1934, 'done', 'منتهي', 'one-line', 0, 0, 2),
(1935, 'rebuild_cache', 'اعادة بناء ملفات الكاش', 'one-line', 0, 0, 2),
(1936, 'custom_field_4', 'هاتف', 'one-line', 1, 0, 2),
(1937, 'cron_jobs', 'كرون الوظائف', 'one-line', 0, 0, 2),
(1938, 'statistics', 'إحصائيات', 'one-line', 0, 0, 2),
(1939, 'appkey', 'مفتاح APP', 'one-line', 0, 0, 2),
(1940, 'own_message_alignment', 'محاذاة الرسالة [خاص]', 'one-line', 0, 0, 2),
(1941, 'banned_from_group_message', 'لا يسمح لك بدخول هادي الجروب', 'one-line', 0, 0, 2),
(1942, 'instagram_url', 'رابط Instagram', 'one-line', 0, 0, 2),
(1943, 'images', 'الصور', 'one-line', 0, 0, 2),
(1944, 'site_roles', 'رتبة الموقع', 'one-line', 0, 0, 2),
(1945, 'mention', '@يذكر', 'one-line', 0, 0, 2),
(1946, 'manage_group_roles', 'إدارة رتبة العرفة', 'one-line', 0, 0, 2),
(1947, 'custom_field_5', 'موقع', 'one-line', 1, 0, 2),
(1948, 'tenor', 'tenor', 'one-line', 0, 0, 2),
(1949, 'reactions', 'تفاعلات', 'one-line', 0, 0, 2),
(1950, 'timezone', 'وحدة زمنية', 'one-line', 0, 0, 2),
(1951, 'file_expired', 'الملف منتهي الصلاحية أو غير موجود', 'one-line', 0, 0, 2),
(1952, 'edit_badge', 'تحرير_الوسام', 'one-line', 0, 0, 2),
(1953, 'manage_site_roles', 'إدارة رتب الموقع', 'one-line', 0, 0, 2),
(1954, 'identity_provider', 'مزود الهوية', 'one-line', 0, 0, 2),
(1955, 'went_wrong', 'هناك خطأ ما', 'one-line', 0, 0, 2),
(1956, 'welcome_screen_heading', 'أهلا وسهلا بك مرة اخرى . لقد قمنا بتحديث موقعنا نأمل ان ينال تجربة ناجحة لك .', 'one-line', 0, 0, 2),
(1957, 'load_more', 'تحميل المزيد', 'one-line', 0, 0, 2),
(1958, 'unleavable', 'لا يمكن للاعضاء المغادرة من هذا الجروب', 'one-line', 0, 0, 2),
(1959, 'newest', 'الأحدث', 'one-line', 0, 0, 2),
(1960, 'show', 'يعرض', 'one-line', 0, 0, 2),
(1961, 'no_group_selected', 'صندوق الوارد الفارغ', 'one-line', 0, 0, 2),
(1962, 'group_role_1', 'محظور', 'one-line', 0, 0, 2),
(1963, 'twitter_url', 'Twitter URL', 'one-line', 0, 0, 2),
(1964, 'on_getting_unbanned_from_group', 'شخص غير محظور من الجروب', 'one-line', 0, 0, 2),
(1965, 'web_app_manifest', 'بيان تطبيق الويب', 'one-line', 0, 0, 2),
(1966, 'group_role_2', 'Admin', 'one-line', 0, 0, 2),
(1967, 'custom_menu', 'قائمة مخصصة', 'one-line', 0, 0, 2),
(1968, 'recently_joined', 'انضم مؤخرا', 'one-line', 0, 0, 2);
INSERT INTO `gr_language_strings` (`string_id`, `string_constant`, `string_value`, `string_type`, `skip_update`, `skip_cache`, `language_id`) VALUES
(1969, 'on_getting_temporarily_banned_from_group', 'تم حظر شخص ما مؤقتًا من الجروب', 'one-line', 0, 0, 2),
(1970, 'manage_adverts', 'إدارة الإعلانات', 'one-line', 0, 0, 2),
(1971, 'custom_field_3_options', '{\"1\":\"\\u0630\\u0643\\u0631\",\"2\":\"\\u0627\\u0646\\u062b\\u0649\",\"3\":\"\\u0644\\u0627\\u0634\\u064a\\u0621\"}', 'multi_line', 1, 0, 2),
(1972, 'boxed', 'تخطيط محاصر', 'one-line', 0, 0, 2),
(1973, 'set_group_slug', 'تعيين الرابط الفرعي للجروب', 'one-line', 0, 0, 2),
(1974, 'blacklist_user_permission_denied', 'تم رفض الإذن: غير مسموح لك بحظر / تجاهل مسؤولي الموقع', 'one-line', 0, 0, 2),
(1975, 'create_public_group', 'إنشاء جروب عام', 'one-line', 0, 0, 2),
(1976, 'group_role_3', 'مشرف', 'one-line', 0, 0, 2),
(1977, 'welcome_screen_message', 'شارك ما يدور في ذهنك مع أشخاص آخرين من جميع أنحاء العالم و كون علاقاتك الخاصة مع أصدقاء جدد', 'one-line', 0, 0, 2),
(1978, 'site_users', 'اعضاء الموقع', 'one-line', 0, 0, 2),
(1979, 'custom_avatar', 'الصورة الرمزية المخصصة', 'one-line', 0, 0, 2),
(1980, 'custom_fields', 'الحقول المخصصة', 'one-line', 0, 0, 2),
(1981, 'line_break_delimiter', 'استخدم فاصل الأسطر كمحدد', 'one-line', 0, 0, 2),
(1982, 'unleavable_group', 'اجبارية لا يمكن الخروج منها', 'one-line', 0, 0, 2),
(1983, 'quinary_text_color', 'لون النص الخماسي', 'one-line', 0, 0, 2),
(1984, 'select_option', 'حدد خيار من القائمة المنسدلة', 'one-line', 0, 0, 2),
(1985, 'loading_image', 'صورة اثناء تحميل الصفحة', 'one-line', 0, 0, 2),
(1986, 'on_updating_group_info', 'تحديث معلومات الجروب', 'one-line', 0, 0, 2),
(1987, 'welcome_screen_footer_text', 'بعد تسجيل الدخول اذهب الى الجربو  وقم باختيار الجروب المناسبة لك وانضم اليها مباشرة', 'one-line', 0, 0, 2),
(1988, 'group_role_4', 'عضو', 'one-line', 0, 0, 2),
(1989, 'change_email_address', 'تغيير البريد الالكتروني', 'one-line', 0, 0, 2),
(1990, 'custom_background', 'خلفية الجروب', 'one-line', 0, 0, 2),
(1991, 'linkedin_url', 'linkedin URL', 'one-line', 0, 0, 2),
(1992, 'left', 'شمال', 'one-line', 0, 0, 2),
(1993, 'create_groups', 'إنشاء جروب', 'one-line', 0, 0, 2),
(1994, 'forward', 'إعادة توجيه', 'one-line', 0, 0, 2),
(1995, 'values', 'قيم', 'one-line', 0, 0, 2),
(1996, 'choose_file', 'اختيار صورة ', 'one-line', 0, 0, 2),
(1997, 'background', 'خلفية', 'one-line', 0, 0, 2),
(1998, 'access_logs', 'سجلات الوصول', 'one-line', 0, 0, 2),
(1999, 'videos', 'أشرطة فيديو', 'one-line', 0, 0, 2),
(2000, 'clear_chat_history', 'امسح تاريخ الدردشة', 'one-line', 0, 0, 2),
(2001, 'welcome_message', 'رسالة ترحيب', 'one-line', 0, 0, 2),
(2002, 'refresh', 'ينعش', 'one-line', 0, 0, 2),
(2003, 'septenary_font_size', 'حجم الخط السبعيني', 'one-line', 0, 0, 2),
(2004, 'select_group', 'قم باختيار احدى الجروبات', 'one-line', 0, 0, 2),
(2005, 'cron_job_url', 'عنوان URL لوظيفة Cron', 'one-line', 0, 0, 2),
(2006, 'twitch_url', 'موقع Twitch', 'one-line', 0, 0, 2),
(2007, 'switch_color_scheme', 'تبديل نظام الألوان', 'one-line', 0, 0, 2),
(2008, 'show_language', 'إظهار اللغة', 'one-line', 0, 0, 2),
(2009, 'gfycat', 'gfycat', 'one-line', 0, 0, 2),
(2010, 'confirm_action', 'هل أنت متأكد أنك تريد الاستمرار؟', 'one-line', 0, 0, 2),
(2011, 'menu_item', 'عنصر القائمة', 'one-line', 0, 0, 2),
(2012, 'created', 'مخلوق', 'one-line', 0, 0, 2),
(2013, 'total_users', 'إجمالي المستخدمين', 'one-line', 0, 0, 2),
(2014, 'check_inbox', 'لقد أرسلنا بريدًا إلكترونيًا إلى عنوان بريدك الإلكتروني. يرجى التحقق من البريد الوارد الخاص بك.', 'one-line', 0, 0, 2),
(2015, 'temporarily_banned_from_group_message', 'أنت محظور مؤقتًا من الوصول إلى هذا الجروب', 'one-line', 0, 0, 2),
(2016, 'custom_page_2_content', '[YOU CAN MODIFY THE PAGE CONTENTS VIA CUSTOM PAGES MODULE]', 'multi_line', 1, 1, 2),
(2017, 'public_group', 'جروب عام', 'one-line', 0, 0, 2),
(2018, 'view_groups_without_login', 'عرض الجروبات العامة بدون تسجيل الدخول', 'one-line', 0, 0, 2),
(2019, 'heading', 'عنوان', 'one-line', 0, 0, 2),
(2020, 'view_joined_groups', 'مشاهدة الجروبات المنضمة', 'one-line', 0, 0, 2),
(2021, 'not_a_group_member_message', 'انت لست عضوا في هذه الجروب . اضغط هنا للانضمام.', 'one-line', 0, 0, 2),
(2022, 'reply_messages', 'رسائل الرد', 'one-line', 0, 0, 2),
(2023, 'cron_job', 'وظيفة كرون', 'one-line', 0, 0, 2),
(2024, 'minimum_score_required_wad_content', 'الحد الأدنى من النقاط المطلوبة [أسلحة ، كحول &amp; amp؛ المخدرات] ٪', 'one-line', 0, 0, 2),
(2025, 'other_files', 'ملفات اخرى', 'one-line', 0, 0, 2),
(2026, 'landing_page_footer_block_two_heading', 'شاتيور', 'one-line', 0, 0, 2),
(2027, 'online_users', 'Online Users', 'one-line', 0, 0, 2),
(2028, 'login_link_email_heading', 'مرحبا بكم في المجتمع', 'one-line', 0, 0, 2),
(2029, 'landing_page_hero_section_heading', 'مرحبا بك في شاتيور Chat Your', 'one-line', 0, 0, 2),
(2030, 'email_address', 'عنوان البريد الإلكتروني', 'one-line', 0, 0, 2),
(2031, 'default_group_role', 'الرتبة الافتراضي', 'one-line', 0, 0, 2),
(2032, 'webpushr_rest_api_key', 'مفتاح Webpushr REST API', 'one-line', 0, 0, 2),
(2033, 'clear_chat', 'مسح المحادثة', 'one-line', 0, 0, 2),
(2034, 'badges', 'الأوسمة', 'one-line', 0, 0, 2),
(2035, 'icon_img', 'أيقونة', 'one-line', 0, 0, 2),
(2036, 'command', 'يأمر', 'one-line', 0, 0, 2),
(2037, 'external_link', 'رابط خارجي', 'one-line', 0, 0, 2),
(2038, 'dmy_format', 'يوم شهر سنة', 'one-line', 0, 0, 2),
(2039, 'type', 'يكتب', 'one-line', 0, 0, 2),
(2040, 'sort_by_default', 'فرز بشكل افتراضي', 'one-line', 0, 0, 2),
(2041, 'delete_group_messages', 'حذف رسائل الجروب', 'one-line', 0, 0, 2),
(2042, 'on_group_creation', 'عند إنشاء الجروب', 'one-line', 0, 0, 2),
(2043, 'links', 'الروابط', 'one-line', 0, 0, 2),
(2044, 'notifications', 'إشعارات', 'one-line', 0, 0, 2),
(2045, 'fake_online_users', 'المستخدمون المزيفون المتصلين حالياً', 'one-line', 0, 0, 2),
(2046, 'octonary_font_size', 'حجم الخط الثماني', 'one-line', 0, 0, 2),
(2047, 'footer_text', 'النص في اسفل الصفحة الرئيسية', 'one-line', 0, 0, 2),
(2048, 'landing_page_faq_question_10_answer', '', 'one-line', 0, 0, 2),
(2049, 'results_found', 'العثور على نتائج', 'one-line', 0, 0, 2),
(2050, 'entry_page_background', 'خلفية صفحة الدخول', 'one-line', 0, 0, 2),
(2051, 'fake_users', 'المستخدمون المزيفون', 'one-line', 0, 0, 2),
(2052, 'export', 'يصدّر', 'one-line', 0, 0, 2),
(2053, 'page_content', 'محتوى الصفحة', 'one-line', 0, 0, 2),
(2054, 'home', 'الرئيسية', 'one-line', 0, 0, 2),
(2055, 'app_id', 'معرف التطبيق أو معرف العميل', 'one-line', 0, 0, 2),
(2056, 'landing_page_hero_section_description', 'موقع شاتيور Chat your', 'one-line', 0, 0, 2),
(2057, 'read_status', 'قراءة الحالة', 'one-line', 0, 0, 2),
(2058, 'faq', 'التعليمات', 'one-line', 0, 0, 2),
(2059, 'custom_group_role', 'رتبة خاصة', 'one-line', 0, 0, 2),
(2060, 'right', 'يمين', 'one-line', 0, 0, 2),
(2061, 'new_message_notification', 'لديك رسالة جديدة', 'one-line', 0, 0, 2),
(2062, 'add_users', 'أضف اعضاء', 'one-line', 0, 0, 2),
(2063, 'view_shared_files', 'عرض الملفات المشتركة', 'one-line', 0, 0, 2),
(2064, 'no_conversation_found', 'لم يتم العثور على محادثة', 'one-line', 0, 0, 2),
(2065, 'switch_user', 'تغير المستخدم', 'one-line', 0, 0, 2),
(2066, 'show_on_landing_page_footer', 'إظهار في الصفحة الرئيسية [التذييل]', 'one-line', 0, 0, 2),
(2067, 'disabled', 'الغاء التفعيل', 'one-line', 0, 0, 2),
(2068, 'remove_group_members', 'طرد أعضاء الجروب', 'one-line', 0, 0, 2),
(2069, 'login_link_email_content', 'ترحيب حار لموقعنا. أنت الآن جزء من موقعنا على الإنترنت. نحن متحمسون لوجودك على متن الطائرة. تعرف على أصدقاء جدد. شارك تجاربك.', 'one-line', 0, 0, 2),
(2070, 'default_group_visibility', 'رؤية الجروبات الافتراضية', 'one-line', 0, 0, 2),
(2071, 'add_fake_users', 'إضافة مستخدمين مزيفين', 'one-line', 0, 0, 2),
(2072, 'mdy_format', 'شهر يوم سنه', 'one-line', 0, 0, 2),
(2073, 'landing_page_footer_block_two_description', 'دردشات شاتيور', 'one-line', 0, 0, 2),
(2074, 'delete_private_messages', 'حذف الرسائل الخاصة', 'one-line', 0, 0, 2),
(2075, 'show_on_landing_page_header', 'إظهار في الصفحة الرئيسية [العنوان]', 'one-line', 0, 0, 2),
(2076, 'default_txt', 'النص الإفتراضي', 'one-line', 0, 0, 2),
(2077, 'filter', 'منقي', 'one-line', 0, 0, 2),
(2078, 'not_found', 'لا يوجد ', 'one-line', 0, 0, 2),
(2079, 'resend_email', 'إعادة إرسال البريد الإلكتروني', 'one-line', 0, 0, 2),
(2080, 'site_controls', 'ضوابط الموقع', 'one-line', 0, 0, 2),
(2081, 'play_notification_sound', 'تشغيل صوت إعلام', 'one-line', 0, 0, 2),
(2082, 'custom_menu_item_3', 'من نحن', 'one-line', 0, 0, 2),
(2083, 'resend_email_on_error', 'تم التحقق من الحساب بالفعل أو الحساب غير موجود', 'one-line', 0, 0, 2),
(2084, 'login_link_email_button_label', 'تسجيل الدخول الآن', 'one-line', 0, 0, 2),
(2085, 'custom_menu_item_4', 'خريطة الموقع', 'one-line', 0, 0, 2),
(2086, 'disallowed_slugs', 'الروابط الفرعية الغير مسموح بها', 'one-line', 0, 0, 2),
(2087, 'email_successfully_sent', 'البريد الإلكتروني المرسلة بنجاح', 'one-line', 0, 0, 2),
(2088, 'landing_page_copyright_notice', 'شات يور 2023', 'one-line', 0, 0, 2),
(2089, 'featured_image', 'صورة مميزة', 'one-line', 0, 0, 2),
(2090, 'custom_page_3', 'Privacy Policy', 'multi_line', 1, 1, 2),
(2091, 'custom_css', 'تعليمات Css خاصة', 'one-line', 0, 0, 2),
(2092, 'minimum_full_name_length', 'الحد الأدنى لطول الاسم الكامل', 'one-line', 0, 0, 2),
(2093, 'on_new_message', 'رسالة جديدة', 'one-line', 0, 0, 2),
(2094, 'landing_page_groups_section', 'قسم الجروبات  (الصفحة الرئيسية)', 'one-line', 0, 0, 2),
(2095, 'mini_audio_player', 'مشغل صوت صغير', 'one-line', 0, 0, 2),
(2096, 'approve', 'الموافقة عليه', 'one-line', 0, 0, 2),
(2097, 'moderators', 'الوسطاء', 'one-line', 0, 0, 2),
(2098, 'hero_section_heading', 'العنوان الواضح في الصفحة الرئيسية', 'one-line', 0, 0, 2),
(2099, 'faq_section_heading', 'قسم الأسئلة الشائعة [العنوان]', 'one-line', 0, 0, 2),
(2100, 'maximum_full_name_length', 'الحد الأقصى لطول الاسم الكامل', 'one-line', 0, 0, 2),
(2101, 'no_conversation_found_subtitle', 'حاول تغيير عوامل التصفية أو مصطلح البحث', 'one-line', 0, 0, 2),
(2102, 'on_new_site_notification', 'في إشعار الموقع الجديد', 'one-line', 0, 0, 2),
(2103, 'disapprove', 'رفض', 'one-line', 0, 0, 2),
(2104, 'nonary_font_size', 'حجم الخط غير العادي', 'one-line', 0, 0, 2),
(2105, 'requires_minimum_full_name_length', 'تتطلب الحد الأدنى للطول للاسم الكامل', 'one-line', 0, 0, 2),
(2106, 'minimum_score_required_offensive', 'الحد الأدنى من النقاط المطلوبة [علامات هجومية &amp; amp؛ إيماءات] ٪', 'one-line', 0, 0, 2),
(2107, 'please_wait', 'انتظر من فضلك', 'one-line', 0, 0, 2),
(2108, 'disapprove_user_confirmation', 'هل أنت متأكد أنك تريد رفض هذا المستخدم؟', 'one-line', 0, 0, 2),
(2109, 'suspended', 'معلق', 'one-line', 0, 0, 2),
(2110, 'dashboard', 'لوحة القيادة', 'one-line', 0, 0, 2),
(2111, 'approve_user_confirmation', 'هل أنت متأكد أنك تريد الموافقة على هذا المستخدم؟', 'one-line', 0, 0, 2),
(2112, 'landing_page_faq_section_heading', 'مواقع شاتيور الكتابية', 'one-line', 0, 0, 2),
(2113, 'send_as_another_user', 'إرسال الرسائل كمستخدم آخر للموقع', 'one-line', 0, 0, 2),
(2114, 'custom_login_url', 'عنوان URL مخصص لتسجيل الدخول', 'one-line', 0, 0, 2),
(2115, 'minimum_score_required_graphic_violence_gore', 'الحد الأدنى من النقاط المطلوبة [عنف تصويري &amp; amp؛ جور]٪', 'one-line', 0, 0, 2),
(2116, 'custom_url_on_logout', 'عنوان URL مخصص عند تسجيل الخروج', 'one-line', 0, 0, 2),
(2117, 'hero_section_animation', 'صور متحركة ', 'one-line', 0, 0, 2),
(2118, 'infotip_select_multiple_files', 'لتحديد ملفات متعددة ، اضغط مع الاستمرار على مفتاح Ctrl (الكمبيوتر الشخصي) أو مفتاح الأوامر (Mac) وباستخدام لوحة التتبع أو الماوس الخارجي ، انقر فوق جميع الملفات الأخرى التي ترغب في تحديدها واحدة تلو الأخرى.', 'one-line', 0, 0, 2),
(2119, 'track_status', 'تتبع الحالة', 'one-line', 0, 0, 2),
(2120, 'group_members', 'أعضاء الجروبات', 'one-line', 0, 0, 2),
(2121, 'hide_group_member_list_from_non_members', 'إخفاء قائمة أعضاء الجروبات من غير الأعضاء', 'one-line', 0, 0, 2),
(2122, 'on_group_unread_count_change', 'تغيير العد في الجروبات الغير مقروء', 'one-line', 0, 0, 2),
(2123, 'display_full_file_name_of_attachments', 'عرض اسم الملف الكامل للمرفق (المرفقات)', 'one-line', 0, 0, 2),
(2124, 'landing_page_groups_section_heading', 'جروب شاتيور', 'one-line', 0, 0, 2),
(2125, 'assign', 'تعيين', 'one-line', 0, 0, 2),
(2126, 'moderation', 'إعتدال', 'one-line', 0, 0, 2),
(2127, 'link_field', 'وصلة', 'one-line', 0, 0, 2),
(2128, 'enabled', 'ممكن', 'one-line', 0, 0, 2),
(2129, 'import', 'يستورد', 'one-line', 0, 0, 2),
(2130, 'daily_send_limit_group_messages', 'حد الإرسال اليومي [رسائل جماعية]', 'one-line', 0, 0, 2),
(2131, 'load_group_info_on_group_load', 'تحميل معلومات الجروب', 'one-line', 0, 0, 2),
(2132, 'total_groups', 'إجمالي جروبات الدردشة', 'one-line', 0, 0, 2),
(2133, 'secret_key', 'المفتاح السري', 'one-line', 0, 0, 2),
(2134, 'answer', 'إجابة', 'one-line', 0, 0, 2),
(2135, 'visible', 'مرئي', 'one-line', 0, 0, 2),
(2136, 'zero_equals_unlimited', '(0 = غير محدود)', 'one-line', 0, 0, 2),
(2137, 'permission_denied', 'تم رفض الإذن', 'one-line', 0, 0, 2),
(2138, 'moderation_settings', 'إعدادات تشفير الصور', 'one-line', 0, 0, 2),
(2139, 'delete_site_users', 'حذف مستخدمي الموقع', 'one-line', 0, 0, 2),
(2140, 'daily_send_limit_private_messages', 'حد الإرسال اليومي [الرسائل الخاصة]', 'one-line', 0, 0, 2),
(2141, 'ymd_format', 'سنة شهر يوم', 'one-line', 0, 0, 2),
(2142, 'landing_page_faq_question_1', 'الدخول الى شاتيور', 'one-line', 0, 0, 2),
(2143, 'manage_custom_fields', 'إدارة الحقول المخصصة', 'one-line', 0, 0, 2),
(2144, 'updated', 'محدث', 'one-line', 0, 0, 2),
(2145, 'undenary_text_color', 'لون نص غير عقد', 'one-line', 0, 0, 2),
(2146, 'group_name', 'أسم الجروب', 'one-line', 0, 0, 2),
(2147, 'maximum_sending_rate_exceeded', 'تم تجاوز الحد الأقصى لمعدل الإرسال', 'one-line', 0, 0, 2),
(2148, 'unsuspend', 'غير معلق', 'one-line', 0, 0, 2),
(2149, 'show_group_label', 'إظهار رتبة الجروب  بجوار اسم العضو عند ارسال رسالة الدردشة', 'one-line', 0, 0, 2),
(2150, 'exceeds_full_name_length', 'تم تجاوز حد طول أحرف الاسم الكامل', 'one-line', 0, 0, 2),
(2151, 'on_private_conversation_unread_count_change', 'تغيير العد في المحادثة الخاصة الغير مقروئة', 'one-line', 0, 0, 2),
(2152, 'landing_page_faq_section', 'قسم الأسئلة الشائعة (الصفحة الرئيسية)', 'one-line', 0, 0, 2),
(2153, 'groups_section_status', 'ظهور جروبات الدردشة ضمن الصفحة الرئيسية', 'one-line', 0, 0, 2),
(2154, 'duodenary_text_color', 'لون نص الاجتماع الثاني عشر', 'one-line', 0, 0, 2),
(2155, 'delete_user_files', 'حذف ملفات المستخدم', 'one-line', 0, 0, 2),
(2156, 'friend_system', 'نظام الأصدقاء', 'one-line', 0, 0, 2),
(2157, 'system_info', 'معلومات النظام', 'one-line', 0, 0, 2),
(2158, 'admins_moderators', 'المسؤولون وأمبير. الوسطاء', 'one-line', 0, 0, 2),
(2159, 'faq_section_status', 'قسم الأسئلة الشائعة [الحالة]', 'one-line', 0, 0, 2),
(2160, 'import_users', 'استيراد المستخدمين', 'one-line', 0, 0, 2),
(2161, 'hero_section_image', 'قسم البطل [صورة]', 'one-line', 0, 0, 2),
(2162, 'hidden', 'مختفي', 'one-line', 0, 0, 2),
(2163, 'ip_blacklist', 'قائمة IP السوداء', 'one-line', 0, 0, 2),
(2164, 'status', 'حالة', 'one-line', 0, 0, 2),
(2165, 'under_review', 'قيد المراجعة', 'one-line', 0, 0, 2),
(2166, 'storage_usage', 'استخدام التخزين', 'one-line', 0, 0, 2),
(2167, 'iso_language_code', 'كود لغة ISO', 'one-line', 0, 0, 2),
(2168, 'loading', 'تحميل', 'one-line', 0, 0, 2),
(2169, 'menu_title', 'عنوان القائمة', 'one-line', 0, 0, 2),
(2170, 'hero_section_description', 'وصف العنوان في الصفحة الرئيسية', 'one-line', 0, 0, 2),
(2171, 'landing_page_groups_section_description', 'الانضمام السهل الى روم شاتيور', 'one-line', 0, 0, 2),
(2172, 'select_an_option', 'حدد اختيارا', 'one-line', 0, 0, 2),
(2173, 'add_friend', 'أضف صديق', 'one-line', 0, 0, 2),
(2174, 'seen_by', 'تمت رؤيته بواسطة', 'one-line', 0, 0, 2),
(2175, 'view_public_group_messages_non_member', 'عرض رسائل الجروب العامة للاعضاء حتى وان لم يكن عضواً منتمي اليها [المستخدمون المسجلون]', 'one-line', 0, 0, 2),
(2176, 'access_denied_message', '403 ممنوع ليس لديك إذن للوصول.', 'one-line', 0, 0, 2),
(2177, 'footer_logo', 'الوجو  في الاسفل', 'one-line', 0, 0, 2),
(2178, 'cancel_request', 'إلغاء الطلب', 'one-line', 0, 0, 2),
(2179, 'remove', 'يزيل', 'one-line', 0, 0, 2),
(2180, 'view_shared_links', 'عرض الروابط المشتركة', 'one-line', 0, 0, 2),
(2181, 'access_denied_non_member_message', 'أنت لست عضواً من هذا الجروب . انضم إلى هذا الجروب للمشاركة فيه .', 'one-line', 0, 0, 2),
(2182, 'open_in_popup', 'فتح في نافذة منبثقة', 'one-line', 0, 0, 2),
(2183, 'landing_page_faq_question_1_answer', 'موقع شاتيور', 'one-line', 0, 0, 2),
(2184, 'username', 'اسم المستخدم', 'one-line', 0, 0, 2),
(2185, 'accept_friend', 'قبول الصداقة', 'one-line', 0, 0, 2),
(2186, 'view_complaint', 'عرض شكوى', 'one-line', 0, 0, 2),
(2187, 'supported_file_formats', 'تنسيقات الملفات المدعومة', 'one-line', 0, 0, 2),
(2188, 'read_receipts', 'المشاهدين !', 'one-line', 0, 0, 2),
(2189, 'ad_free_account', 'حساب خالي من الاعلانات', 'one-line', 0, 0, 2),
(2190, 'customizer', 'مخصص', 'one-line', 0, 0, 2),
(2191, 'suspend', 'تعليق', 'one-line', 0, 0, 2),
(2192, 'social_share_image', 'الصورة الافتراضية للمشاركة الاجتماعية', 'one-line', 0, 0, 2),
(2193, 'unfriend', 'الغاء الصداقه', 'one-line', 0, 0, 2),
(2194, 'username_exists', 'الاسم مستخدم من قبل', 'one-line', 0, 0, 2),
(2195, 'modules', 'الاضافات', 'one-line', 0, 0, 2),
(2196, 'landing_page_footer_text', 'موقع شاتيور 2023', 'one-line', 0, 0, 2),
(2197, 'who_all_can_view_page', 'من يمكنه عرض الصفحة', 'one-line', 0, 0, 2),
(2198, 'mention_users', 'اذكر المستخدمين', 'one-line', 0, 0, 2),
(2199, 'csv_file', 'ملف CSV', 'one-line', 0, 0, 2),
(2200, 'others', 'آحرون', 'one-line', 0, 0, 2),
(2201, 'reject_request', 'رفض الطلب', 'one-line', 0, 0, 2),
(2202, '24_format', 'ساعة بنظام 24 ساعة', 'one-line', 0, 0, 2),
(2203, 'load_profile_on_page_load', 'تحميل ملف التعريف عند تحميل الصفحة', 'one-line', 0, 0, 2),
(2204, 'friends', 'الأصدقاء', 'one-line', 0, 0, 2),
(2205, 'autoplay_audio_player', 'تشغل الراديو تلقائياً', 'one-line', 0, 0, 2),
(2206, 'users_banned', 'مستخدمين محظورين', 'one-line', 0, 0, 2),
(2207, 'not_assigned', 'غيرمعتمد', 'one-line', 0, 0, 2),
(2208, 'enter_is_send', 'إرسال رسالة مع إدخال مفتاح', 'one-line', 0, 0, 2),
(2209, 'question', 'سؤال', 'one-line', 0, 0, 2),
(2210, 'profanity_filter', 'تشغير الكلمات', 'one-line', 0, 0, 2),
(2211, 'total_members', 'إجمالي الأعضاء', 'one-line', 0, 0, 2),
(2212, 'sample_reference_file', 'عينة ملف مرجعي', 'one-line', 0, 0, 2),
(2213, 'pending', 'قيد الانتظار', 'one-line', 0, 0, 2),
(2214, 'password', 'كلمة المرور', 'one-line', 0, 0, 2),
(2215, 'review_complaints', 'مراجعة الشكاوى', 'one-line', 0, 0, 2),
(2216, 'new_user_approval', 'موافقة المستخدم الجديد', 'one-line', 0, 0, 2),
(2217, 'webpushr_authentication_token', 'رمز مصادقة Webpushr', 'one-line', 0, 0, 2),
(2218, 'menu_item_visibility', 'رؤية عنصر القائمة', 'one-line', 0, 0, 2),
(2219, 'group_join_confirmation', 'تأكيد الانضمام للجروب', 'one-line', 0, 0, 2),
(2220, 'group_suspended', 'عذرا ، تم تعليق هذه الجروب.', 'one-line', 0, 0, 2),
(2221, 'label_text_color', 'لون نص التسمية', 'one-line', 0, 0, 2),
(2222, 'emojis', 'إموجيس', 'one-line', 0, 0, 2),
(2223, 'time_am', 'AM', 'one-line', 0, 0, 2),
(2224, 'show_only_on_specific_language', 'عرض فقط على لغة معينة', 'one-line', 0, 0, 2),
(2225, 'review', 'مراجعة', 'one-line', 0, 0, 2),
(2226, 'group_chats', 'group chats', 'one-line', 0, 0, 2),
(2227, 'landing_page_footer_block_one_heading', 'دردشة شاتيور 2023', 'one-line', 0, 0, 2),
(2228, 'view_statistics', 'عرض الإحصائيات', 'one-line', 0, 0, 2),
(2229, 'password_doesnt_match', 'كلمة المرور لا تتطابق مع تأكيد كلمة المرور', 'one-line', 0, 0, 2),
(2230, 'storage', 'التخزين', 'one-line', 0, 0, 2),
(2231, 'email_exists', 'البريد الالكتروني موجود بالفعل', 'one-line', 0, 0, 2),
(2232, 'time_pm', 'PM', 'one-line', 0, 0, 2),
(2233, 'recording', 'تسجيل', 'one-line', 0, 0, 2),
(2234, 'something_went_wrong', 'هناك خطأ ما', 'one-line', 0, 0, 2),
(2235, 'email_logo', 'الشعار (نموذج البريد الإلكتروني)', 'one-line', 0, 0, 2),
(2236, 'signup_agreement', 'أوافق على شروط الخدمة وسياسة الخصوصية', 'one-line', 0, 0, 2),
(2237, '12_format', 'تنسيق 12 ساعة', 'one-line', 0, 0, 2),
(2238, 'show_on_signup', 'إظهار في صفحة التسجيل', 'one-line', 0, 0, 2),
(2239, 'default_timezone', 'المنطقة الزمنية الافتراضية', 'one-line', 0, 0, 2),
(2240, 'sent', 'مرسل', 'one-line', 0, 0, 2),
(2241, 'show_on_front_page', 'تظهر على صفحتها الأولى', 'one-line', 0, 0, 2),
(2242, 'assigned', 'مُكَلَّف', 'one-line', 0, 0, 2),
(2243, 'hide_name_field_in_registration_page', 'إخفاء حقل الاسم في صفحة التسجيل', 'one-line', 0, 0, 2),
(2244, 'comments_by_complainant', 'تعليقات مقدم الشكوى', 'one-line', 0, 0, 2),
(2245, 'webpushr', 'ويبشر', 'one-line', 0, 0, 2),
(2246, 'message_non_friends', 'إمكانية الرسائل الخاصة لغير الاصدقاء', 'one-line', 0, 0, 2),
(2247, 'field_type', 'نوع الحقل', 'one-line', 0, 0, 2),
(2248, 'unverified_email_address', 'عنوان بريد إلكتروني لم يتم التحقق منه', 'one-line', 0, 0, 2),
(2249, 'hide_email_address_field_in_registration_page', 'إخفاء حقل عنوان البريد الإلكتروني في صفحة التسجيل', 'one-line', 0, 0, 2),
(2250, 'gifs', 'صور GIF', 'one-line', 0, 0, 2),
(2251, 'landing_page_footer_block_one_description', 'الانضمام الى شاتيور من الموبايل', 'one-line', 0, 0, 2),
(2252, 'send_requests', 'ارسل طلبات', 'one-line', 0, 0, 2),
(2253, 'email', 'بريد إلكتروني', 'one-line', 0, 0, 2),
(2254, 'landing_page_faq_question_2', 'حذف حسابك في شاتيور', 'one-line', 0, 0, 2),
(2255, 'play', 'تشغيل الفيديو', 'one-line', 0, 0, 2),
(2256, 'hide_username_field_in_registration_page', 'إخفاء حقل اسم المستخدم', 'one-line', 0, 0, 2),
(2257, 'captcha', 'كلمة التحقق', 'one-line', 0, 0, 2),
(2258, 'copyright_notice', 'حقوق التأليف', 'one-line', 0, 0, 2),
(2259, 'receive_requests', 'تلقي الطلبات', 'one-line', 0, 0, 2),
(2260, 'new_badge_awarded', 'مُنحت وسام جديدة', 'one-line', 0, 0, 2),
(2261, 'left_content_block', 'كتلة المحتوى اليسرى', 'one-line', 0, 0, 2),
(2262, 'advert_min_height', 'الحد الأدنى للارتفاع (بكسل)', 'one-line', 0, 0, 2),
(2263, 'wait_for_profile_approval', 'حسابك في انتظار الموافقة حاليا. بمجرد الموافقة على ملف التعريف الخاص بك يمكنك تسجيل الدخول.', 'one-line', 0, 0, 2),
(2264, 'static_image', 'صورة ثابتة', 'one-line', 0, 0, 2),
(2265, 'id', 'بطاقة تعريف', 'one-line', 0, 0, 2),
(2266, 'field_options', 'خيارات الحقل', 'one-line', 0, 0, 2),
(2267, 'left_panel_content_on_page_load', 'المحتوى المراد إظهاره عند تحميل الصفحة [اللوحة اليسرى]', 'one-line', 0, 0, 2),
(2268, 'view_friends', 'مشاهدة الاصدقاء', 'one-line', 0, 0, 2),
(2269, 'side_navigation', 'القائمة الجانبية', 'one-line', 0, 0, 2),
(2270, 'image_moderation', 'اعتدال الصورة', 'one-line', 0, 0, 2),
(2271, 'confirm_email_address', 'أنت مطالب بالتحقق من عنوان بريدك الإلكتروني. لقد أرسلنا بريدًا إلكترونيًا به رابط تأكيد إلى عنوان بريدك الإلكتروني.', 'one-line', 0, 0, 2),
(2272, 'monitor', 'الإشراف', 'one-line', 0, 0, 2),
(2273, 'your_friend_since', 'صديقك منذ', 'one-line', 0, 0, 2),
(2274, 'show_on_entry_page', 'تظهر في صفحة الدخول', 'one-line', 0, 0, 2),
(2275, 'left_side_content', 'محتوى الجانب الأيسر', 'one-line', 0, 0, 2),
(2276, 'sightengine_api_user', 'مستخدم Sightengine API', 'one-line', 0, 0, 2),
(2277, 'audio', 'صوتي', 'one-line', 0, 0, 2),
(2278, 'comments_by_reviewer', 'تعليقات المراجع', 'one-line', 0, 0, 2),
(2279, 'custom_page_2', 'Terms of Service', 'multi_line', 1, 1, 2),
(2280, 'remove_cover_pic', 'إزالة صورة الغلاف', 'one-line', 0, 0, 2),
(2281, 'display_username_group_chats', 'اعرض اسم المستخدم بدلاً من الاسم الكامل في الدردشات الجماعية', 'one-line', 0, 0, 2),
(2282, 'files_uploaded', 'تم تحميل الملفات', 'one-line', 0, 0, 2),
(2283, 'display_username_private_chats', 'اعرض اسم المستخدم بدلاً من الاسم الكامل في الدردشات الخاصة', 'one-line', 0, 0, 2),
(2284, 'landing_page_faq_question_2_answer', 'بعد تسجيل الدخول يمكنك التوجه مباشرة الى الاعدادات ومن ثم الى خانة تعطيل الحساب وحذفه .', 'one-line', 0, 0, 2),
(2285, 'captcha_secret_key', 'مفتاح الكابتشا السري', 'one-line', 0, 0, 2),
(2286, 'sightengine_api_secret', 'سر API Sightengine', 'one-line', 0, 0, 2),
(2287, 'form', 'استمارة', 'one-line', 0, 0, 2),
(2288, 'groups_section_description', 'وصف قسم الغرف في الرئيسية', 'one-line', 0, 0, 2),
(2289, 'compress_video_files', 'ضغط ملفات الفيديو', 'one-line', 0, 0, 2),
(2290, 'pending_approval', 'ينتظر الموافقة', 'one-line', 0, 0, 2),
(2291, 'image_removal_criteria', 'احذف الصور التي تحتوي على', 'one-line', 0, 0, 2),
(2292, 'compress_image_files', 'ضغط ملفات الصور', 'one-line', 0, 0, 2),
(2293, 'chat_window', 'نافذة الدردشة', 'one-line', 0, 0, 2),
(2294, 'partial_nudity', 'العري الجزئي', 'one-line', 0, 0, 2),
(2295, 'primary_bg_color', 'لون الخلفية الأساسي', 'one-line', 0, 0, 2),
(2296, 'compress_audio_files', 'ضغط ملفات الصوت', 'one-line', 0, 0, 2),
(2297, 'requires_consent', 'مطلوب موافقتك على شروط الخدمة.', 'one-line', 0, 0, 2),
(2298, 'not_logged_in', 'لم تقم بتسجيل الدخول', 'one-line', 0, 0, 2),
(2299, 'explicit_nudity', 'العري الصريح', 'one-line', 0, 0, 2),
(2300, 'email_login_link', 'رابط تسجيل الدخول إلى البريد الإلكتروني', 'one-line', 0, 0, 2),
(2301, 'secondary_bg_color', 'لون الخلفية الثانوية', 'one-line', 0, 0, 2),
(2302, 'edit_custom_page', 'تحرير صفحة مخصصة', 'one-line', 0, 0, 2),
(2303, 'unverified', 'لم يتم التحقق منه', 'one-line', 0, 0, 2),
(2304, 'webpushr_public_key', 'مفتاح Webpushr العام', 'one-line', 0, 0, 2),
(2305, 'tertiary_bg_color', 'لون الخلفية الثالثية', 'one-line', 0, 0, 2),
(2306, 'nearby_users', 'قريبون منك', 'one-line', 0, 0, 2),
(2307, 'login_link_email_subject', 'رابط تسجيل الدخول الخاص بك', 'one-line', 0, 0, 2),
(2308, 'not_logged_in_message', 'أنت لم تسجل الدخول. انقر هنا لتسجيل الدخول.', 'one-line', 0, 0, 2),
(2309, 'wad_content', 'الأسلحة والكحول وأمبير. المخدرات', 'one-line', 0, 0, 2),
(2310, 'quaternary_bg_color', 'لون الخلفية الرباعي', 'one-line', 0, 0, 2),
(2311, 'rebuild', 'إعادة بناء', 'one-line', 0, 0, 2),
(2312, 'people_nearby_feature', 'ميزة الناس المجاورة', 'one-line', 0, 0, 2),
(2313, 'landing_page_faq_question_3', '', 'one-line', 0, 0, 2),
(2314, 'custom_field_6', 'دولة', 'one-line', 1, 0, 2),
(2315, 'offensive_signs_gestures', 'علامات هجومية وأمبير. إيماءات', 'one-line', 0, 0, 2),
(2316, 'group_invitation', 'دعوتك للانضمام إلى الجروب', 'one-line', 0, 0, 2),
(2317, 'quinary_bg_color', 'لون الخلفية الخماسي', 'one-line', 0, 0, 2),
(2318, 'view_nearby_users', 'عرض المستخدمين القريبين', 'one-line', 0, 0, 2),
(2319, 'required_field', 'حقل اجباري', 'one-line', 0, 0, 2),
(2320, 'embed', 'تضمين', 'one-line', 0, 0, 2),
(2321, 'graphic_violence_gore', 'عنف تصويري &amp; amp؛ جور', 'one-line', 0, 0, 2),
(2322, 'last_visit', 'الزيارة الأخيرة', 'one-line', 0, 0, 2),
(2323, 'people_nearby_max_distance', 'الناس بالجوار - المسافة القصوى (كم)', 'one-line', 0, 0, 2),
(2324, 'add_custom_page', 'أضف صفحة مخصصة', 'one-line', 0, 0, 2),
(2325, 'senary_bg_color', 'لون الخلفية Senary', 'one-line', 0, 0, 2),
(2326, 'captcha_site_key', 'مفتاح موقع Captcha', 'one-line', 0, 0, 2),
(2327, 'approve_users', 'قبول المستخدمين', 'one-line', 0, 0, 2),
(2328, 'group_invitation_email_subject', 'لقد تلقيت دعوة', 'one-line', 0, 0, 2),
(2329, 'top', 'قمة', 'one-line', 0, 0, 2),
(2330, 'septenary_bg_color', 'لون الخلفية السبعيني', 'one-line', 0, 0, 2),
(2331, 'complaint_status', 'حالة الشكوى', 'one-line', 0, 0, 2),
(2332, 'minimum_score_required_partial_nudity', 'الحد الأدنى من النقاط المطلوبة [عري جزئي]٪', 'one-line', 0, 0, 2),
(2333, 'embed_group', 'تضمين الجروب', 'one-line', 0, 0, 2),
(2334, 'auto_join_group', 'إضافة مستخدمين تلقائيًا عند التسجيل', 'one-line', 0, 0, 2),
(2335, 'bottom', 'قاع', 'one-line', 0, 0, 2),
(2336, 'check_read_receipts', 'تحقق من إيصالات القراءة', 'one-line', 0, 0, 2),
(2337, 'minimum_score_required_explicit_nudity', 'الحد الأدنى من النقاط المطلوبة [عُري صريح]', 'one-line', 0, 0, 2),
(2338, 'style_sheets', 'الشكل والألوان', 'one-line', 0, 0, 2),
(2339, 'octonary_bg_color', 'لون الخلفية ثماني', 'one-line', 0, 0, 2),
(2340, 'error_uploading', 'خطأ في تحميل الملفات', 'one-line', 0, 0, 2),
(2341, 'create_account', 'إنشاء حساب', 'one-line', 0, 0, 2),
(2342, 'landing_page_faq_question_3_answer', '', 'one-line', 0, 0, 2),
(2343, 'default_language', 'اللغة الافتراضية', 'one-line', 0, 0, 2),
(2344, 'allow_guest_users_create_accounts', 'السماح للمستخدمين الضيوف بإنشاء حسابات', 'one-line', 0, 0, 2),
(2345, 'custom_page_1', 'About', 'multi_line', 1, 1, 2),
(2346, 'email_validator', 'مدقق البريد الإلكتروني', 'one-line', 0, 0, 2),
(2347, 'nonary_bg_color', 'لون خلفية نوناري', 'one-line', 0, 0, 2),
(2348, 'email_domain_not_allowed', 'غير مسموح باستخدام عنوان بريد إلكتروني من هذا المجال', 'one-line', 0, 0, 2),
(2349, 'data_unavailable', 'البيانات غير متوفرة', 'one-line', 0, 0, 2),
(2350, 'denary_bg_color', 'لون الخلفية Denary', 'one-line', 0, 0, 2),
(2351, 'group_headers', 'رؤوس جروب الدردشة', 'one-line', 0, 0, 2),
(2352, 'voice_message', 'رسالة صوتية', 'one-line', 0, 0, 2),
(2353, 'edit_group_header', 'تحرير رأس الجروب', 'one-line', 0, 0, 2),
(2354, 'entry_page_form_header', 'رأس النموذج (صفحة الإدخال)', 'one-line', 0, 0, 2),
(2355, 'group_header', 'رأس الجروب', 'one-line', 0, 0, 2),
(2356, 'add_meta_tags', 'أضف العلامات الوصفية', 'one-line', 0, 0, 2),
(2357, 'primary_text_color', 'لون النص الأساسي', 'one-line', 0, 0, 2),
(2358, 'header_content', 'محتوى الرأس', 'one-line', 0, 0, 2),
(2359, 'global_css', 'Global CSS', 'one-line', 0, 0, 2),
(2360, 'groups_section_heading', 'عنوان قسم الغرف في الرئيسية', 'one-line', 0, 0, 2),
(2361, 'landing_page_faq_question_4', 'انشاء حساب في شاتيور ', 'one-line', 0, 0, 2),
(2362, 'custom_js', 'تعليمات js خاصة', 'one-line', 0, 0, 2),
(2363, 'javascript', 'جافا سكريبت', 'one-line', 0, 0, 2),
(2364, 'secondary_text_color', 'لون النص الثانوي', 'one-line', 0, 0, 2),
(2365, 'error', 'خطأ', 'one-line', 0, 0, 2),
(2366, 'global_js', 'Global Custom JS', 'one-line', 0, 0, 2),
(2367, 'pin_groups', 'تثبيت الجروب', 'one-line', 0, 0, 2),
(2368, 'forward_message', 'إعادة توجيه الى ..', 'one-line', 0, 0, 2),
(2369, 'forward_messages', 'اعادت توجيه الرسالة', 'one-line', 0, 0, 2),
(2370, 'color_scheme', 'نظام الألوان', 'one-line', 0, 0, 2),
(2371, 'react', 'رياكشن', 'one-line', 0, 0, 2),
(2372, 'page_title', 'عنوان الصفحة', 'one-line', 0, 0, 2),
(2373, 'samesite_cookies', 'ملفات تعريف الارتباط SameSite', 'one-line', 0, 0, 2),
(2374, 'show_timestamp_on_mouseover', 'إظهار الطابع الزمني عند تمرير الماوس', 'one-line', 0, 0, 2),
(2375, 'group_invitation_email_heading', 'لقد تلقيت دعوة', 'one-line', 0, 0, 2),
(2376, 'csrf_token', 'رمز CSRF', 'one-line', 0, 0, 2),
(2377, 'javascript_files', 'ملفات جافا سكريبت', 'one-line', 0, 0, 2),
(2378, 'complainant', 'المشتكي', 'one-line', 0, 0, 2),
(2379, 'delete_complaints', 'حذف الشكاوى', 'one-line', 0, 0, 2),
(2380, 'main_panel_content_on_page_load', 'المحتوى المراد إظهاره عند تحميل الصفحة [اللوحة الرئيسية]', 'one-line', 0, 0, 2),
(2381, 'login_as_admin', 'تسجيل الدخول كمسؤول', 'one-line', 0, 0, 2),
(2382, 'media', 'وسائط', 'one-line', 0, 0, 2),
(2383, 'chats', 'الدردشات', 'one-line', 0, 0, 2),
(2384, 'set_auto_join_groups', 'تعيين الانضمام التلقائي للجروب', 'one-line', 0, 0, 2),
(2385, 'message_textarea_placeholder', 'اكتب هنا…', 'one-line', 0, 0, 2),
(2386, 'entry_page_form_footer', 'تذييل النموذج (صفحة الإدخال)', 'one-line', 0, 0, 2),
(2387, 'footer_block_heading', 'كتلة التذييل [عنوان]', 'one-line', 0, 0, 2),
(2388, 'allow_sharing_email_addresses', 'السماح بمشاركة عناوين البريد الإلكتروني', 'one-line', 0, 0, 2),
(2389, 'landing_page_faq_question_4_answer', 'التسجيل في شاتيور متاح', 'one-line', 0, 0, 2),
(2390, 'search_on_change_of_input', 'البحث عن تغيير المدخلات', 'one-line', 0, 0, 2),
(2391, 'hide', 'إخفاء', 'one-line', 0, 0, 2),
(2392, 'show_side_navigation_on_load', 'عرض التنقل الجانبي عند التحميل', 'one-line', 0, 0, 2),
(2393, 'landing_page_faq_question_5', '', 'one-line', 0, 0, 2),
(2394, 'hide_groups_on_group_url', 'إخفاء المجموعات على رابط المجموعة', 'one-line', 0, 0, 2),
(2395, 'sitemap', 'خريطة الموقع', 'one-line', 0, 0, 2),
(2396, 'group_chat', 'مجموعة محادثة', 'one-line', 0, 0, 2),
(2397, 'landing_page_faq_question_5_answer', '', 'one-line', 0, 0, 2),
(2398, 'external_page', 'صفحة خارجية', 'one-line', 0, 0, 2),
(2399, 'landing_page_faq_question_6', '', 'one-line', 0, 0, 2),
(2400, 'custom_field_2', 'ميلادك', 'one-line', 1, 0, 2),
(2401, 'recipient', 'متلقي', 'one-line', 0, 0, 2),
(2402, 'group_invitation_email_content', 'محتوى البريد الإلكتروني لدعوة المجموعة', 'one-line', 0, 0, 2),
(2403, 'landing_page_faq_question_6_answer', '', 'one-line', 0, 0, 2),
(2404, 'view_invisible_users', 'عرض المستخدمين غير المرئيين', 'one-line', 0, 0, 2),
(2405, 'invalid_pwa_icon_dimensions', 'أبعاد رمز pwa غير صالحة', 'one-line', 0, 0, 2),
(2406, 'custom_page_1_content', '[YOU CAN MODIFY THE PAGE CONTENTS VIA CUSTOM PAGES MODULE]', 'multi_line', 1, 1, 2),
(2407, 'landing_page_faq_question_7', '', 'one-line', 0, 0, 2),
(2408, 'error_message', 'رسالة خاطئة', 'one-line', 0, 0, 2),
(2409, 'landing_page_faq_question_7_answer', '', 'one-line', 0, 0, 2),
(2410, 'landing_page_faq_question_8', '', 'one-line', 0, 0, 2),
(2411, 'landing_page_faq_question_8_answer', '', 'one-line', 0, 0, 2),
(2412, 'landing_page_faq_question_9', '', 'one-line', 0, 0, 2),
(2413, 'landing_page_faq_question_9_answer', '', 'one-line', 0, 0, 2),
(2414, 'set_fake_online_users', 'تعيين المستخدمين المزيفين متصلاً حاليا', 'one-line', 0, 0, 2),
(2415, 'landing_page_faq_question_10', '', 'one-line', 0, 0, 2),
(2416, 'cloud_storage', 'Cloud Storage', 'one-line', 0, 0, 2),
(2417, 'amazon_s3', 'Amazon S3', 'one-line', 0, 0, 2),
(2418, 's3_compatible', 'S3 Compatible Storage', 'one-line', 0, 0, 2),
(2419, 'digitalocean_spaces', 'DigitalOcean Spaces', 'one-line', 0, 0, 2),
(2420, 'ftp_storage', 'FTP Storage', 'one-line', 0, 0, 2),
(2421, 'wasabi', 'Wasabi', 'one-line', 0, 0, 2),
(2422, 'cloud_storage_api_key', 'API Key', 'one-line', 0, 0, 2),
(2423, 'cloud_storage_secret_key', 'Secret Key', 'one-line', 0, 0, 2),
(2424, 'cloud_storage_region', 'Region', 'one-line', 0, 0, 2),
(2425, 'cloud_storage_bucket_name', 'Bucket/Space Name', 'one-line', 0, 0, 2),
(2426, 'cloud_storage_endpoint', 'Endpoint', 'one-line', 0, 0, 2),
(2427, 'cloud_storage_ftp_host', 'FTP Hostname', 'one-line', 0, 0, 2),
(2428, 'cloud_storage_ftp_username', 'FTP Username', 'one-line', 0, 0, 2),
(2429, 'cloud_storage_ftp_password', 'FTP Password', 'one-line', 0, 0, 2),
(2430, 'cloud_storage_ftp_port', 'FTP Port', 'one-line', 0, 0, 2),
(2431, 'cloud_storage_ftp_path', 'FTP Path', 'one-line', 0, 0, 2),
(2432, 'cloud_storage_ftp_endpoint', 'FTP Endpoint', 'one-line', 0, 0, 2),
(2433, 'assets_folder_missing', '&quot;files&quot; folder missing. [1] Login to your cloud storage account [2] Create &quot;assets&quot; folder [3] Upload &quot;assets/files/&quot; folder &amp; its contents inside &quot;assets&quot; folder', 'one-line', 0, 0, 2),
(2434, 'invalid_bucket_name', 'Invalid Bucket/Space name', 'one-line', 0, 0, 2),
(2435, 'invalid_credentials', 'Invalid Credentials', 'one-line', 0, 0, 2),
(2436, 'default_bg_group_chat', 'Default Background Image [Group Chat]', 'one-line', 0, 0, 2),
(2437, 'default_bg_private_chat', 'Default Background Image [Private Chat]', 'one-line', 0, 0, 2),
(2438, 'cloudflare_turnstile', 'Cloudflare Turnstile', 'one-line', 0, 0, 2),
(2439, 'edit_message', 'تحرير الرسالة', 'one-line', 0, 0, 2),
(2440, 'edit_own_message', 'تحرير الرسالة الخاصة', 'one-line', 0, 0, 2),
(2441, 'edit_all_messages', 'تحرير كافة الرسائل', 'one-line', 0, 0, 2),
(2442, 'edit_message_time_limit', 'المهلة الزمنية لتحرير رسائلهم (بالدقائق)', 'one-line', 0, 0, 2),
(2443, 'time_limit_expired', 'انتهى المهلة', 'one-line', 0, 0, 2),
(2444, 'hide_phone_number_field_in_registration_page', 'إخفاء حقل رقم الهاتف في صفحة التسجيل', 'one-line', 0, 0, 2),
(2445, 'phone_number_verification', 'التحقق من رقم الهاتف', 'one-line', 0, 0, 2),
(2446, 'sms_gateway', 'SMS Gateway', 'one-line', 0, 0, 2),
(2447, 'twilio', 'Twilio', 'one-line', 0, 0, 2),
(2448, 'phone_number', 'رقم الهاتف', 'one-line', 0, 0, 2),
(2449, 'invalid_phone_number', 'رقم الهاتف غير صحيح', 'one-line', 0, 0, 2),
(2450, 'enter_otp', 'أدخل OTP', 'one-line', 0, 0, 2),
(2451, 'verify', 'تحقق', 'one-line', 0, 0, 2),
(2452, 'verify_phone_number', 'تحقق من رقم الهاتف', 'one-line', 0, 0, 2),
(2453, 'verify_phone_number_text', 'نرسل لك كلمة مرور لمرة واحدة إلى رقم الهاتف المحمول الذي أدخلته. اكتب OTP المستلم وانقر على التحقق.', 'one-line', 0, 0, 2),
(2454, 'resend_otp', 'Resend OTP', 'one-line', 0, 0, 2),
(2455, 'verify_your_phone_number', 'لم يتم التحقق من رقم الهاتف. من أجل المتابعة ، من فضلك ، قم بالتحقق .', 'one-line', 0, 0, 2),
(2456, 'phone_number_verified', 'تم التحقق من رقم هاتفك', 'one-line', 0, 0, 2),
(2457, 'invalid_otp_code', 'Invalid OTP Code', 'one-line', 0, 0, 2),
(2458, 'approve_phone_number', 'اعتماد رقم الهاتف', 'one-line', 0, 0, 2),
(2459, 'twilio_account_sid', 'Twilio Account SID', 'one-line', 0, 0, 2),
(2460, 'twilio_auth_token', 'Twilio Auth Token', 'one-line', 0, 0, 2),
(2461, 'sms_settings', 'إعدادات الرسائل القصيرة', 'one-line', 0, 0, 2),
(2462, 'sms_src', 'المرسل / من الرقم', 'one-line', 0, 0, 2),
(2463, 'messagebird', 'MessageBird', 'one-line', 0, 0, 2),
(2464, 'messagebird_api_key', 'مفتاح واجهة برمجة تطبيقات MessageBird', 'one-line', 0, 0, 2),
(2465, 'registration_otp_message', 'OTP الخاص بك للتسجيل هو', 'one-line', 0, 0, 2),
(2466, 'phone_number_exists', 'رقم الهاتف موجود بالفعل', 'one-line', 0, 0, 2),
(2467, 'view_email_address', 'عرض عنوان البريد الإلكتروني', 'one-line', 0, 0, 2),
(2468, 'view_phone_number', 'عرض رقم الهاتف', 'one-line', 0, 0, 2),
(2469, 'ip_blacklisted', 'نأسف لهذا لكن  IP الخاص بك غير صالح . اذا كنت تستخدم بروكسي او VPN . قم بالغائه وحاول الدخول  مجدداً .', 'one-line', 0, 0, 2),
(2470, 'ip_intelligence', 'IP Intelligence', 'one-line', 0, 0, 2),
(2471, 'proxycheck_io', 'ProxyCheck.io', 'one-line', 0, 0, 2),
(2472, 'getipintel', 'GetIPIntel', 'one-line', 0, 0, 2),
(2473, 'ip_intelligence_api_key', 'API Key', 'one-line', 0, 0, 2),
(2474, 'ip_intelligence_probability', 'احتمالا', 'one-line', 0, 0, 2),
(2475, 'ip_intel_validate_on_login', 'تحقق من صحة تسجيل دخول المستخدم', 'one-line', 0, 0, 2),
(2476, 'ip_intel_validate_on_register', 'تحقق من صحة تسجيل المستخدم', 'one-line', 0, 0, 2),
(2477, 'maximum_guest_nickname_length', 'الحد الأقصى لطول لقب الضيف', 'one-line', 0, 0, 2),
(2478, 'minimum_guest_nickname_length', 'الحد الأدنى لطول لقب الضيف', 'one-line', 0, 0, 2),
(2479, 'requires_minimum_guest_nickname_length', 'يتطلب الحد الأدنى لطول لقب الضيف', 'one-line', 0, 0, 2),
(2480, 'exceeds_guest_nickname_length', 'تم تجاوز الحد الأقصى لعدد الأحرف في لقب الضيف', 'one-line', 0, 0, 2),
(2481, 'ad_block_detected_title', 'تم اكتشاف AdBlock!', 'one-line', 0, 0, 2),
(2482, 'ad_block_detected_description', 'أصبح موقعنا الإلكتروني ممكنًا من خلال عرض إعلانات عبر الإنترنت لزوارنا. يرجى النظر في دعمنا عن طريق تعطيل مانع الإعلانات الخاص بك على موقعنا.', 'one-line', 0, 0, 2),
(2483, 'ad_block_detected_button', 'I&#039;ve disabled AdBlock', 'one-line', 0, 0, 2),
(2484, 'adblock_detector', 'Adblock Detector', 'one-line', 0, 0, 2),
(2485, 'streaming_server', 'Streaming Server', 'one-line', 0, 0, 2),
(2486, 'shoutcast', 'SHOUTcast', 'one-line', 0, 0, 2),
(2487, 'icecast', 'Icecast', 'one-line', 0, 0, 2),
(2488, 'mention_everyone', 'ذكر المستخدمين @everyone', 'one-line', 0, 0, 2),
(2489, 'footer_section_status', 'قسم التذييل [الحالة]', 'one-line', 0, 0, 2),
(2490, 'search_users', 'البحث عن شخص', 'one-line', 0, 0, 2),
(2491, 'searchable', 'قابل للبحث', 'one-line', 0, 0, 2),
(2492, 'name_censored_word_detected', 'الاسم يحتوي على كلمة خاضعة للرقابة', 'one-line', 0, 0, 2),
(2493, 'username_censored_word_detected', 'اسم المستخدم يحتوي على كلمة خاضعة للرقابة', 'one-line', 0, 0, 2),
(2494, 'filter_username', 'تصفية اسم المستخدم', 'one-line', 0, 0, 2),
(2495, 'filter_full_name', 'تصفية الاسم الكامل', 'one-line', 0, 0, 2),
(2496, 'filter_messages', 'تصفية الرسائل', 'one-line', 0, 0, 2),
(2497, 'user_pending_approval_email_heading', 'في انتظار الموافقة', 'one-line', 0, 0, 2),
(2498, 'user_pending_approval_email_content', 'تم تسجيل مستخدم جديد على موقع الويب الخاص بك وهو في انتظار الموافقة حاليًا. تفاصيل المستخدم كالتالي:', 'one-line', 0, 0, 2),
(2499, 'user_pending_approval_email_subject', 'مستخدم جديد في انتظار الموافقة', 'one-line', 0, 0, 2),
(2500, 'user_pending_approval_email_button_label', 'زيارة الموقع', 'one-line', 0, 0, 2),
(2501, 'on_private_message_offline', 'شخص ما أرسل رسالة خاصة عندما كنت غير متصل', 'one-line', 0, 0, 2),
(2502, 'on_friend_request', 'شخص ما ارسل طلب صداقة', 'one-line', 0, 0, 2),
(2503, 'web_push_on_friend_request', 'أرسل لك طلب صداقة', 'one-line', 0, 0, 2),
(2504, 'when_changing_group_role', 'عند تغيير دور المجموعة', 'one-line', 0, 0, 2),
(2505, 'updated_user_group_role', 'تم تغيير دور المجموعة إلى', 'one-line', 0, 0, 2),
(2506, 'enable_photo_upload_on_signup', 'تمكين تحميل الصور عند التسجيل', 'one-line', 0, 0, 2),
(2507, 'required', 'مطلوب', 'one-line', 0, 0, 2),
(2508, 'missing_profile_image', 'يرجى تحميل صورة الملف الشخصي للمتابعة', 'one-line', 0, 0, 2),
(2509, 'profile_image', 'صورة الملف الشخصي', 'one-line', 0, 0, 2),
(2510, 'chat_page_footer', 'Footer (Chat Page)', 'one-line', 0, 0, 2),
(2511, 'chat_page_header', 'Header (Chat Page)', 'one-line', 0, 0, 2),
(2512, 'advanced_user_searches', 'Advanced User Searches', 'one-line', 0, 0, 2),
(2513, 'schedule_cronjob_command_message', 'Make sure to schedule the following cronjob command in your hosting server to run the script automatically at your preferred intervals', 'one-line', 0, 0, 2),
(2514, 'please_note', 'Please Note', 'one-line', 0, 0, 2),
(2515, 'send_email_notification', 'Send Email Notification', 'one-line', 0, 0, 2),
(2516, 'new_private_message_email_subject', 'New Private Message Received', 'one-line', 0, 0, 2),
(2517, 'new_private_message_email_heading', 'New Message Received', 'one-line', 0, 0, 2),
(2518, 'new_private_message_email_content', 'You have received a new private message. Please log in to your account to read the message and reply if necessary.', 'one-line', 0, 0, 2),
(2519, 'new_private_message_email_button_label', 'View Message', 'one-line', 0, 0, 2),
(2520, 'on_new_user_pending_approval', 'New user signup pending approval', 'one-line', 0, 0, 2),
(2521, 'new_friend_request_email_subject', 'New Friend Request Received', 'one-line', 0, 0, 2),
(2522, 'new_friend_request_email_heading', 'New Friend Request', 'one-line', 0, 0, 2),
(2523, 'new_friend_request_email_content', 'You have received a new friend request on our platform. You can view and respond to this request by logging into your account and going to the &quot;Friends&quot; section.', 'one-line', 0, 0, 2),
(2524, 'new_friend_request_email_button_label', 'View Request', 'one-line', 0, 0, 2),
(2525, 'message_scheduler', 'Message Scheduler', 'one-line', 0, 0, 2),
(2526, 'scheduled_message', 'Scheduled Message', 'one-line', 0, 0, 2),
(2527, 'schedule_message', 'Schedule Message', 'one-line', 0, 0, 2),
(2528, 'send_message_on', 'Send Message On', 'one-line', 0, 0, 2),
(2529, 'schedule_cronjob_command_message_skip', 'Make sure to schedule the following cronjob command in your hosting server to run the script automatically at your preferred intervals, and if the cronjob is already scheduled, skip this step', 'one-line', 0, 0, 2),
(2530, 'view_profile_url', 'View Profile URL', 'one-line', 0, 0, 2),
(2531, 'smtp_self_signed_certificate', 'Self-signed Certificate', 'one-line', 0, 0, 2),
(2532, 'read_terms', 'إقرأ الشروط', 'one-line', 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gr_login_sessions`
--

CREATE TABLE `gr_login_sessions` (
  `login_session_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `initiated_ip_address` varchar(90) NOT NULL,
  `access_code` varchar(100) NOT NULL,
  `csrf_token` varchar(30) DEFAULT NULL,
  `csrf_token_generated_on` datetime NOT NULL,
  `log_device` int(11) NOT NULL DEFAULT 1,
  `login_from_user_id` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Inactive\r\n1 = Active\r\n2 = Expired',
  `failed_attempts` int(11) NOT NULL,
  `time_stamp` int(11) NOT NULL,
  `last_access` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_login_sessions`
--

INSERT INTO `gr_login_sessions` (`login_session_id`, `user_id`, `initiated_ip_address`, `access_code`, `csrf_token`, `csrf_token_generated_on`, `log_device`, `login_from_user_id`, `status`, `failed_attempts`, `time_stamp`, `last_access`) VALUES
(1, 1, '213.139.49.121', 'TDSaNsUyFi9MXWE1wJ8Z', NULL, '0000-00-00 00:00:00', 1, NULL, 2, 0, 1684138007, '2023-05-15 14:11:11'),
(2, 1, '213.139.49.121', 'Tq6k5Wwou1GgMP3z7LHn', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 1, 1684138033, '2023-05-25 08:09:57'),
(3, 1, '213.139.49.121', '40LK7cT2wNHRVhFkae5W', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684140283, '2023-05-15 14:14:43'),
(4, 2, '173.239.218.225', 'xMBzl7jH8nopG9gYQAVh', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684219344, '2023-05-16 12:12:24'),
(5, 3, '122.173.24.89', 'dxrLbfa4DwtWzhUiQ3mS', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684224949, '2023-05-22 11:56:57'),
(6, 4, '117.202.65.249', 'W05DxCNzpR3ZwPUTs4LX', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684245654, '2023-05-16 19:30:54'),
(7, 5, '176.220.74.122', 'DIVJp9S4CAgO0NqoGM87', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684281297, '2023-05-17 05:24:57'),
(8, 7, '2401:4900:1215:6417:cc30:8a5a:505b:5400', 'KzVGbEQuehoTdIJw1AYW', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684289024, '2023-05-18 17:49:24'),
(9, 8, '2409:40e4:37:94b7:d5f1:54e1:b7ea:940e', 'CejyYQurc63D1d8NvFSM', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684321344, '2023-05-17 16:32:24'),
(10, 9, '2409:40e4:37:94b7:d5f1:54e1:b7ea:940e', 'pq8EHwf1jRbrGD6LtFCW', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684323315, '2023-05-17 17:05:15'),
(11, 10, '2401:4900:1c48:f44e:c154:bd41:c99f:437', 'HkpTxnWNGsEYwJ0AZ12v', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684329157, '2023-05-23 16:51:20'),
(12, 11, '196.133.92.200', '9a4cy6UvJSeDlToGdPLq', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684361834, '2023-05-18 03:47:14'),
(13, 12, '103.152.112.176', 'RWi7A8BTNqeEOk6HjCZD', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684391565, '2023-05-18 12:02:45'),
(14, 13, '2405:201:200c:d8ad:7c20:a3cd:b8f0:751f', '0ZnbekmRQyfBIvlxcAFW', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684399042, '2023-05-18 14:07:22'),
(15, 14, '103.178.168.50', 'Dx5n8p0Rl1a9TNYctVeI', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684505204, '2023-05-19 20:06:06'),
(16, 15, '2607:f130:0:fc:340b:1cff:fe52:1ec8', 'QCfYFjuU2pzLOwb9Xk8q', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684535570, '2023-05-20 04:02:50'),
(17, 16, '178.11.119.149', '1g73w6jZXO9SftcyvRQW', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684537997, '2023-05-20 04:43:17'),
(18, 17, '196.152.82.177', 'Zsd8TVmlq2OQEFxvPYSG', NULL, '0000-00-00 00:00:00', 1, NULL, 2, 0, 1684663336, '2023-05-21 15:32:16'),
(19, 18, '185.80.141.41', 'OI7TKQ1wM0JPUckNBLm6', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684697589, '2023-05-22 01:03:09'),
(20, 19, '2405:201:301b:314a:59df:a6fc:92b8:15b8', 'mouVdpANrRS6UCIzq39Q', NULL, '0000-00-00 00:00:00', 1, NULL, 2, 0, 1684734407, '2023-05-22 11:16:47'),
(21, 20, '2401:4900:1f3e:8fff::150:670d', 'lfqWp4M9YmLFezIUwZkb', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684753175, '2023-05-22 16:34:26'),
(22, 21, '188.132.221.174', 'KV2nLWFaJXmfl4yqszxk', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684755399, '2023-05-22 17:06:39'),
(23, 22, '103.108.5.127', 'KeI8krgmLSZpjJ7NC3WH', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684757018, '2023-05-23 17:16:51'),
(24, 23, '2a01:9700:1005:d100:3863:5f42:d9bc:9c28', 'XRUqEG9hewb4zKc2IFdL', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684775222, '2023-05-22 22:47:32'),
(25, 24, '213.6.164.215', 'u3xC2UZKn6XHVri1LA5M', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684790657, '2023-05-23 02:54:17'),
(26, 26, '197.204.26.23', 'KQGxSPgVXLrlJWe6uvya', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684837598, '2023-05-23 15:56:38'),
(27, 27, '212.34.19.115', '3bU4zNd1PKuEhgC9eXBk', NULL, '0000-00-00 00:00:00', 1, NULL, 2, 0, 1684856974, '2023-05-23 21:19:34'),
(28, 25, '212.34.19.115', 'HNEb64GxhI5Bcr0dvaTZ', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684857215, '2023-05-23 21:52:56'),
(29, 28, '37.238.199.10', 'fRV7oHq01hkLGsnPOKyu', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684860407, '2023-05-23 22:16:47'),
(30, 29, '2401:4900:47ff:daf8:cd1:b5f0:679e:97f6', 'F8gvMRcyxehbG4HmfQEl', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684916277, '2023-05-24 13:47:57'),
(31, 30, '2401:4900:1c66:59ef:b980:3d35:17fb:7f70', 'PmculBZiX0SzAeWjLT28', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684919851, '2023-05-24 14:47:31'),
(32, 31, '122.162.149.168', 'nRksfqXGAT4xgUDEYQit', NULL, '0000-00-00 00:00:00', 1, NULL, 1, 0, 1684925388, '2023-05-24 16:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `gr_mailbox`
--

CREATE TABLE `gr_mailbox` (
  `mail_id` bigint(20) NOT NULL,
  `email_addresses` text NOT NULL,
  `email_category` varchar(50) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `email_parameters` text NOT NULL,
  `send_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Pending\r\n1 = Send\r\n2 = Failed',
  `mail_error_log` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_private_chat_messages`
--

CREATE TABLE `gr_private_chat_messages` (
  `private_chat_message_id` bigint(20) NOT NULL,
  `private_conversation_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `original_message` text NOT NULL,
  `filtered_message` text NOT NULL,
  `system_message` int(11) NOT NULL DEFAULT 0,
  `parent_message_id` bigint(20) DEFAULT NULL,
  `attachment_type` varchar(15) DEFAULT NULL,
  `attachments` text NOT NULL,
  `link_preview` varchar(191) DEFAULT NULL,
  `read_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Unread\r\n1 = Read',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_private_conversations`
--

CREATE TABLE `gr_private_conversations` (
  `private_conversation_id` bigint(20) NOT NULL,
  `initiator_user_id` bigint(20) NOT NULL,
  `recipient_user_id` bigint(20) NOT NULL,
  `initiator_load_message_id_from` bigint(20) DEFAULT NULL,
  `recipient_load_message_id_from` bigint(20) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_push_subscriptions`
--

CREATE TABLE `gr_push_subscriptions` (
  `push_subscriber_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `device_token` text NOT NULL,
  `push_notification_service` varchar(80) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_realtime_logs`
--

CREATE TABLE `gr_realtime_logs` (
  `realtime_log_id` bigint(20) NOT NULL,
  `log_type` varchar(50) NOT NULL,
  `related_parameters` text DEFAULT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_realtime_logs`
--

INSERT INTO `gr_realtime_logs` (`realtime_log_id`, `log_type`, `related_parameters`, `created_on`) VALUES
(1, 'removed_all_messages', '{\"group_id\":\"1\"}', '2023-05-24 10:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `gr_scheduled_messages`
--

CREATE TABLE `gr_scheduled_messages` (
  `scheduled_message_id` bigint(20) NOT NULL,
  `message_content` text NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `send_message_on` datetime NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_settings`
--

CREATE TABLE `gr_settings` (
  `setting_id` bigint(20) NOT NULL,
  `setting` varchar(191) NOT NULL,
  `options` text DEFAULT NULL,
  `value` text NOT NULL,
  `required` int(11) NOT NULL DEFAULT 0,
  `category` varchar(80) NOT NULL DEFAULT 'other_settings',
  `field_attributes` text DEFAULT NULL,
  `settings_order` int(11) NOT NULL DEFAULT 0,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_settings`
--

INSERT INTO `gr_settings` (`setting_id`, `setting`, `options`, `value`, `required`, `category`, `field_attributes`, `settings_order`, `updated_on`) VALUES
(1, 'site_name', '0', 'شاتيور دردشة شات يور عربية مباشرة', 1, 'general_settings', NULL, 1, '2023-05-15 13:55:49'),
(2, 'site_description', 'textarea', 'Share what is on your mind with other people from all around the world to find new friends.', 1, 'general_settings', NULL, 2, '2022-01-27 14:02:45'),
(3, 'site_slogan', '0', 'Your Slogan Goes Here', 1, 'general_settings', NULL, 3, '2022-01-20 14:29:04'),
(4, 'meta_title', '0', 'chatyour', 1, 'general_settings', NULL, 4, '2023-05-15 13:55:49'),
(5, 'default_timezone', 'select', 'America/New_York', 1, 'general_settings', NULL, 5, '2022-10-28 22:38:22'),
(6, 'captcha', '[\"disable\",\"hcaptcha\",\"google_recaptcha_v2\",\"cloudflare_turnstile\"]', 'disable', 0, 'login_settings', NULL, 8, '2023-04-06 06:05:27'),
(7, 'captcha_site_key', '0', '', 0, 'login_settings', NULL, 9, '2023-04-06 06:05:27'),
(8, 'captcha_secret_key', '0', '', 0, 'login_settings', NULL, 10, '2023-04-06 06:05:27'),
(9, 'default_language', 'select', '2', 1, 'general_settings', NULL, 6, '2023-05-15 13:40:39'),
(10, 'guest_login', '[\"enable\",\"disable\"]', 'enable', 0, 'login_settings', NULL, 2, '2022-01-21 01:37:18'),
(11, 'sender_name', '0', 'Site Name', 0, 'email_settings', NULL, 7, '2022-01-20 23:44:27'),
(12, 'user_email_verification', '[\"enable\",\"disable\"]', 'disable', 0, 'login_settings', NULL, 4, '2022-10-21 16:28:46'),
(13, 'smtp_authentication', '[\"enable\",\"disable\"]', 'disable', 0, 'email_settings', NULL, 1, '2023-04-23 11:29:38'),
(14, 'smtp_host', '0', '', 0, 'email_settings', NULL, 3, '2022-03-21 01:14:51'),
(15, 'system_email_address', '0', 'email@yourdomain.test', 0, 'email_settings', NULL, 2, '2022-10-28 22:38:57'),
(16, 'smtp_username', '0', '', 0, 'email_settings', NULL, 4, '2022-03-21 01:14:51'),
(17, 'smtp_password', '0', '', 0, 'email_settings', NULL, 5, '2022-03-21 01:14:51'),
(18, 'smtp_protocol', '[\"ssl\",\"tls\"]', 'tls', 0, 'email_settings', NULL, 6, '2022-01-20 23:44:34'),
(19, 'smtp_port', '[25,587,465,2525]', '587', 0, 'email_settings', NULL, 8, '2021-09-23 00:50:10'),
(20, 'gif_search_engine', '[\"disable\",\"tenor\",\"gfycat\",\"giphy\"]', 'disable', 0, 'message_settings', NULL, 5, '2023-04-23 01:02:01'),
(21, 'gif_search_engine_api', '0', '', 0, 'message_settings', NULL, 6, '2023-04-23 01:02:01'),
(22, 'gifs_per_load', 'number', '25', 0, 'message_settings', NULL, 7, '2021-07-22 15:56:00'),
(23, 'records_per_call', 'number', '24', 1, 'general_settings', NULL, 7, '2022-10-28 12:49:05'),
(24, 'messages_per_call', 'number', '25', 1, 'message_settings', NULL, 1, '2021-06-23 15:52:17'),
(25, 'refresh_rate', 'number', '3000', 1, 'realtime_settings', NULL, 3, '2022-07-14 10:58:28'),
(26, 'request_timeout', 'number', '1', 1, 'realtime_settings', NULL, 4, '2022-10-28 22:55:16'),
(27, 'minimum_message_length', 'number', '1', 1, 'message_settings', NULL, 9, '2022-01-21 23:45:15'),
(28, 'maximum_message_length', 'number', '2000', 1, 'message_settings', NULL, 10, '2022-01-23 14:59:36'),
(29, 'read_more_criteria', 'number', '250', 1, 'message_settings', NULL, 11, '2022-01-23 23:34:17'),
(30, 'force_https', '[\"yes\",\"no\"]', 'no', 0, 'general_settings', NULL, 8, '2022-01-20 15:33:03'),
(31, 'non_latin_usernames', '[\"enable\",\"disable\"]', 'enable', 0, 'login_settings', NULL, 3, '2021-06-23 15:52:17'),
(32, 'system_messages_groups', '[multi_select][\"on_group_creation\",\"on_join_group_chat\",\"on_removal_from_group\",\"on_leaving_group_chat\",\"on_awarding_group_badges\",\"on_getting_banned_from_group\",\"on_getting_unbanned_from_group\",\"on_getting_temporarily_banned_from_group\",\"on_updating_group_info\",\"when_changing_group_role\"]', 'a:10:{i:0;s:17:\"on_group_creation\";i:1;s:18:\"on_join_group_chat\";i:2;s:21:\"on_removal_from_group\";i:3;s:21:\"on_leaving_group_chat\";i:4;s:24:\"on_awarding_group_badges\";i:5;s:28:\"on_getting_banned_from_group\";i:6;s:30:\"on_getting_unbanned_from_group\";i:7;s:40:\"on_getting_temporarily_banned_from_group\";i:8;s:22:\"on_updating_group_info\";i:9;s:24:\"when_changing_group_role\";}', 0, 'notification_settings', NULL, 11, '2023-04-22 04:56:35'),
(33, 'site_notifications', '[multi_select][\"on_user_mention_group_chat\",\"on_group_invitation\",\"on_new_site_badges\",\"on_reply_group_messages\"]', 'a:4:{i:0;s:26:\"on_user_mention_group_chat\";i:1;s:19:\"on_group_invitation\";i:2;s:18:\"on_new_site_badges\";i:3;s:23:\"on_reply_group_messages\";}', 0, 'notification_settings', NULL, 10, '2023-04-22 04:56:35'),
(34, 'login_cookie_validity', 'number', '30', 0, 'login_settings', NULL, 6, '2022-10-28 11:58:43'),
(35, 'gravatar', '[\"enable\",\"disable\"]', 'enable', 0, 'login_settings', NULL, 20, '2023-05-15 14:15:45'),
(36, 'minimum_username_length', 'number', '4', 0, 'login_settings', NULL, 10, '2021-06-23 15:52:17'),
(37, 'maximum_username_length', 'number', '30', 0, 'login_settings', NULL, 11, '2021-06-23 15:52:17'),
(38, 'group_join_confirmation', '[\"enable\",\"disable\"]', 'disable', 0, 'general_settings', NULL, 9, '2023-05-15 13:41:03'),
(39, 'view_groups_without_login', '[\"enable\",\"disable\"]', 'enable', 0, 'general_settings', NULL, 10, '2022-06-13 11:30:39'),
(40, 'api_secret_key', '0', 'dXvSMH8rmVPNGa', 0, 'general_settings', NULL, 11, '2022-06-29 11:59:59'),
(41, 'dateformat', '[\"dmy_format\",\"mdy_format\",\"ymd_format\"]', 'dmy_format', 0, 'general_settings', NULL, 12, '2022-01-20 15:40:12'),
(42, 'autoplay_audio_player', '[\"yes\",\"no\"]', 'no', 0, 'general_settings', NULL, 14, '2022-04-02 20:10:21'),
(43, 'cookie_consent', '[\"enable\",\"disable\"]', 'enable', 0, 'general_settings', NULL, 15, '2022-01-20 21:58:26'),
(44, 'notification_tone', 'select', 'assets/files/sound_notifications/open-up.mp3', 1, 'realtime_settings', NULL, 5, '2022-06-07 04:31:56'),
(45, 'google_analytics_id', '0', '', 0, 'general_settings', NULL, 16, '2022-01-20 22:29:56'),
(46, 'time_format', '[\"24_format\",\"12_format\"]', '12_format', 1, 'general_settings', NULL, 13, '2022-06-27 01:23:34'),
(47, 'on_load_guest_login_window', '[\"enable\",\"disable\"]', 'enable', 0, 'login_settings', NULL, 23, '2023-05-15 14:15:45'),
(48, 'color_scheme', '[\"light_mode\",\"dark_mode\"]', 'light_mode', 1, 'general_settings', NULL, 17, '2023-05-15 13:41:03'),
(49, 'default_font', 'select', 'cairo', 1, 'general_settings', NULL, 18, '2023-05-15 13:41:03'),
(50, 'ffmpeg', '[\"enable\",\"disable\"]', 'disable', 0, 'general_settings', NULL, 19, '2022-10-28 22:38:22'),
(51, 'ffmpeg_binaries_path', '0', '/usr/bin/ffmpeg', 0, 'general_settings', NULL, 20, '2022-10-28 22:38:22'),
(52, 'profanity_filter', '[\"enable\",\"disable\",\"strict_mode\"]', 'enable', 0, 'other_settings', NULL, 0, '2022-06-14 13:24:38'),
(53, 'firewall', '[\"enable\",\"disable\"]', 'enable', 0, 'other_settings', NULL, 0, '2022-04-19 22:38:00'),
(54, 'maximum_login_attempts', 'number', '10', 0, 'login_settings', NULL, 26, '2021-06-23 15:52:17'),
(55, 'ffprobe_binaries_path', '0', '/usr/bin/ffprobe', 0, 'general_settings', NULL, 21, '2022-10-28 22:38:22'),
(56, 'user_registration', '[\"enable\",\"disable\"]', 'enable', 0, 'login_settings', NULL, 1, '2022-01-31 17:48:26'),
(57, 'push_notifications', '[\"disable\",\"webpushr\",\"onesignal\"]', 'disable', 1, 'notification_settings', '{\"class\":\"field toggle_form_fields\",\"hide_field\":\"web_push_fields\",\"show_fields\":\"onesignal|onesignal,webpushr|webpushr\"}', 1, '2023-04-19 13:14:04'),
(58, 'send_push_notification', '[multi_select][\"on_private_message\",\"on_private_message_offline\",\"on_friend_request\",\"on_user_mention_group_chat\",\"on_reply_group_messages\"]', 'a:4:{i:0;s:26:\"on_private_message_offline\";i:1;s:17:\"on_friend_request\";i:2;s:26:\"on_user_mention_group_chat\";i:3;s:23:\"on_reply_group_messages\";}', 0, 'notification_settings', NULL, 8, '2023-04-22 04:56:35'),
(59, 'onesignal_app_id', NULL, 'c074952c-d6d1-43c5-b031-ef9de0189f34', 0, 'notification_settings', '{\"class\":\"field web_push_fields onesignal d-none\"}', 2, '2023-03-13 15:56:22'),
(60, 'onesignal_rest_api_key', NULL, 'ODU1YTZiZDctOTUwNC00NDllLTk2MmYtMzEyYTJkNWIyNTA5', 0, 'notification_settings', '{\"class\":\"field web_push_fields onesignal d-none\"}', 3, '2023-03-13 15:56:22'),
(61, 'onesignal_safari_web_id', NULL, '', 0, 'notification_settings', '{\"class\":\"field web_push_fields onesignal d-none\"}', 4, '2022-03-21 01:16:35'),
(62, 'webpushr_public_key', NULL, 'BDB9YyMmPZm-jjwmRYvlWW0KI9qV3RGmmhe_jNEAbK1e8c7YRaCp26-xRCvHSwqn5CSGwfDBRJO1Ftly4FjlSKk', 0, 'notification_settings', '{\"class\":\"field web_push_fields webpushr d-none\"}', 5, '2023-01-11 15:42:22'),
(63, 'webpushr_rest_api_key', NULL, 'e27f83415dac651ca1fad46d4f11ae10', 0, 'notification_settings', '{\"class\":\"field web_push_fields webpushr d-none\"}', 6, '2023-01-11 15:42:22'),
(64, 'webpushr_authentication_token', NULL, '46537', 0, 'notification_settings', '{\"class\":\"field web_push_fields webpushr d-none\"}', 7, '2023-01-11 15:42:22'),
(65, 'progressive_web_application', '[\"enable\",\"disable\"]', 'disable', 0, 'pwa_settings', NULL, 1, '2023-04-23 01:04:08'),
(66, 'pwa_name', '', 'Site Name', 0, 'pwa_settings', NULL, 2, '2022-01-27 14:05:26'),
(67, 'pwa_short_name', '', 'Site Name', 0, 'pwa_settings', NULL, 3, '2022-01-27 14:05:26'),
(68, 'pwa_background_color', 'color', '#000000', 0, 'pwa_settings', NULL, 5, '2022-11-09 17:32:28'),
(69, 'pwa_theme_color', 'color', '#020202', 0, 'pwa_settings', NULL, 6, '2022-04-05 08:31:23'),
(70, 'pwa_description', 'textarea', 'Share what is on your mind with other people from all around the world to find new friends.', 0, 'pwa_settings', NULL, 4, '2022-01-27 14:05:26'),
(71, 'pwa_display', '[\"standalone\",\"minimal-ui\",\"fullscreen\",\"browser\"]', 'standalone', 0, 'pwa_settings', NULL, 7, '2022-01-27 14:05:26'),
(72, 'gif_content_filtering', '[\"high\",\"medium\",\"low\",\"off\"]', 'off', 0, 'message_settings', NULL, 8, '2022-04-11 13:32:19'),
(73, 'message_alignment', '[\"left\",\"right\"]', 'left', 1, 'message_settings', NULL, 2, '2022-10-28 03:29:26'),
(74, 'own_message_alignment', '[\"left\",\"right\"]', 'left', 1, 'message_settings', NULL, 3, '2022-10-28 12:03:43'),
(75, 'play_notification_sound', '[multi_select][\"on_new_message\",\"on_new_site_notification\",\"on_group_unread_count_change\",\"on_private_conversation_unread_count_change\"]', 'a:4:{i:0;s:14:\"on_new_message\";i:1;s:24:\"on_new_site_notification\";i:2;s:28:\"on_group_unread_count_change\";i:3;s:43:\"on_private_conversation_unread_count_change\";}', 0, 'realtime_settings', NULL, 6, '2023-04-23 14:27:07'),
(76, 'entry_page_background', '[\"slideshow\",\"static_image\"]', 'slideshow', 0, 'login_settings', NULL, 21, '2022-03-20 04:20:40'),
(77, 'change_to_idle_status_after', 'number', '3', 0, 'realtime_settings', NULL, 1, '2022-04-06 05:57:12'),
(78, 'change_to_offline_status_after', 'number', '5', 0, 'realtime_settings', NULL, 2, '2022-04-06 05:57:12'),
(79, 'chat_page_boxed_layout', '[\"enable\",\"disable\"]', 'disable', 0, 'general_settings', NULL, 22, '2022-10-28 01:49:29'),
(80, 'facebook_url', NULL, '#facebook', 0, 'other_settings', NULL, 0, '2022-03-19 10:05:13'),
(81, 'instagram_url', NULL, '#Instagram', 0, 'other_settings', NULL, 0, '2022-03-19 10:06:57'),
(82, 'twitter_url', NULL, '#Twitter', 0, 'other_settings', NULL, 0, '2022-03-20 04:38:57'),
(83, 'linkedin_url', NULL, '#LinkedIn', 0, 'other_settings', NULL, 0, '2022-03-19 10:06:57'),
(84, 'twitch_url', NULL, '#Twitch', 0, 'other_settings', NULL, 0, '2022-03-19 10:37:58'),
(85, 'landing_page', '[\"enable\",\"disable\"]', 'enable', 0, 'other_settings', NULL, 0, '2022-03-20 06:50:08'),
(86, 'enter_is_send', '[\"enable\",\"disable\"]', 'enable', 0, 'message_settings', NULL, 4, '2022-04-05 14:25:29'),
(87, 'disallowed_slugs', 'textarea', 'a:0:{}', 0, 'general_settings', NULL, 23, '2023-05-15 13:55:49'),
(88, 'mini_audio_player', '[\"enable\",\"disable\"]', 'enable', 0, 'general_settings', NULL, 24, '2022-04-05 15:51:38'),
(89, 'load_group_info_on_group_load', '[\"enable\",\"disable\"]', 'enable', 0, 'general_settings', NULL, 25, '2022-04-05 16:07:47'),
(90, 'new_user_approval', '[\"enable\",\"disable\"]', 'disable', 0, 'login_settings', NULL, 5, '2023-04-23 01:01:19'),
(91, 'custom_login_url', NULL, '', 0, 'login_settings', NULL, 24, '2022-04-08 07:34:54'),
(92, 'custom_url_on_logout', NULL, '', 0, 'login_settings', NULL, 25, '2022-04-08 07:24:11'),
(93, 'hero_section_animation', '[\"enable\",\"disable\"]', 'enable', 0, 'other_settings', NULL, 0, '2022-04-10 12:27:34'),
(94, 'hide_group_member_list_from_non_members', '[\"yes\",\"no\"]', 'no', 0, 'general_settings', NULL, 26, '2022-06-07 23:39:13'),
(95, 'display_full_file_name_of_attachments', '[\"yes\",\"no\"]', 'no', 0, 'general_settings', NULL, 27, '2023-04-23 14:09:05'),
(96, 'groups_section_status', '[\"enable\",\"disable\"]', 'enable', 0, 'other_settings', NULL, 0, '2022-06-10 10:15:37'),
(97, 'faq_section_status', '[\"enable\",\"disable\"]', 'enable', 0, 'other_settings', NULL, 0, '2022-06-10 10:15:37'),
(98, 'view_public_group_messages_non_member', '[\"enable\",\"disable\"]', 'enable', 0, 'general_settings', NULL, 28, '2022-06-13 10:38:30'),
(99, 'hide_name_field_in_registration_page', '[\"yes\",\"no\"]', 'yes', 0, 'login_settings', NULL, 16, '2023-05-15 14:15:45'),
(100, 'hide_email_address_field_in_registration_page', '[\"yes\",\"no\"]', 'yes', 0, 'login_settings', NULL, 17, '2023-05-15 14:15:45'),
(101, 'hide_username_field_in_registration_page', '[\"yes\",\"no\"]', 'no', 0, 'login_settings', NULL, 18, '2022-06-20 07:08:11'),
(102, 'image_moderation', '[\"enable\",\"disable\"]', 'disable', 0, 'moderation_settings', NULL, 1, '2023-04-23 01:03:04'),
(103, 'sightengine_api_user', NULL, '', 0, 'moderation_settings', NULL, 2, '2023-04-23 01:03:04'),
(104, 'sightengine_api_secret', NULL, '', 0, 'moderation_settings', NULL, 3, '2023-04-23 01:03:04'),
(105, 'image_removal_criteria', '[multi_select][\"partial_nudity\",\"explicit_nudity\",\"wad_content\",\"offensive_signs_gestures\",\"graphic_violence_gore\"]', 'a:5:{i:0;s:14:\"partial_nudity\";i:1;s:15:\"explicit_nudity\";i:2;s:11:\"wad_content\";i:3;s:24:\"offensive_signs_gestures\";i:4;s:21:\"graphic_violence_gore\";}', 0, 'moderation_settings', NULL, 4, '2023-04-23 01:03:04'),
(106, 'minimum_score_required_partial_nudity', 'number', '40', 0, 'moderation_settings', NULL, 5, '2022-06-23 00:06:20'),
(107, 'minimum_score_required_explicit_nudity', 'number', '60', 0, 'moderation_settings', NULL, 6, '2022-06-23 00:06:20'),
(108, 'minimum_score_required_wad_content', 'number', '60', 0, 'moderation_settings', NULL, 7, '2022-06-23 00:05:50'),
(109, 'minimum_score_required_offensive', 'number', '60', 0, 'moderation_settings', NULL, 8, '2022-06-23 00:05:50'),
(110, 'minimum_score_required_graphic_violence_gore', 'number', '70', 0, 'moderation_settings', NULL, 9, '2022-06-23 00:09:09'),
(111, 'minimum_full_name_length', 'number', '5', 0, 'login_settings', NULL, 14, '2022-10-28 22:52:51'),
(112, 'maximum_full_name_length', 'number', '30', 0, 'login_settings', NULL, 15, '2022-10-09 08:46:22'),
(113, 'friend_system', '[\"enable\",\"disable\"]', 'enable', 0, 'general_settings', NULL, 29, '2022-10-10 08:25:07'),
(114, 'display_username_group_chats', '[\"enable\",\"disable\"]', 'disable', 0, 'message_settings', NULL, 12, '2022-10-19 00:00:32'),
(115, 'display_username_private_chats', '[\"enable\",\"disable\"]', 'disable', 0, 'message_settings', NULL, 13, '2022-10-19 00:01:35'),
(116, 'compress_video_files', '[\"enable\",\"disable\"]', 'enable', 0, 'general_settings', NULL, 33, '2022-01-20 15:38:52'),
(117, 'compress_image_files', '[\"enable\",\"disable\"]', 'enable', 0, 'general_settings', NULL, 34, '2022-01-20 15:38:52'),
(118, 'compress_audio_files', '[\"enable\",\"disable\"]', 'enable', 0, 'general_settings', NULL, 35, '2022-01-20 15:38:52'),
(119, 'people_nearby_feature', '[\"enable\",\"disable\"]', 'enable', 0, 'general_settings', NULL, 30, '2022-10-21 01:20:30'),
(120, 'people_nearby_max_distance', 'number', '100', 0, 'general_settings', NULL, 31, '2022-10-21 01:36:56'),
(121, 'allow_guest_users_create_accounts', '[\"yes\",\"no\"]', 'yes', 0, 'login_settings', NULL, 22, '2022-10-21 19:07:01'),
(122, 'email_validator', '[\"enable\",\"disable\",\"strict_mode\"]', 'enable', 0, 'other_settings', NULL, 0, '2022-10-28 22:35:28'),
(123, 'show_timestamp_on_mouseover', '[\"enable\",\"disable\"]', 'enable', 0, 'message_settings', NULL, 14, '2022-10-24 18:24:22'),
(124, 'search_on_change_of_input', '[\"enable\",\"disable\"]', 'disable', 0, 'general_settings', NULL, 36, '2022-10-27 22:47:13'),
(125, 'show_side_navigation_on_load', '[\"yes\",\"no\"]', 'yes', 0, 'general_settings', NULL, 37, '2022-10-27 22:50:24'),
(126, 'cloud_storage', '[\"disable\", \"amazon_s3\", \"wasabi\", \"ftp_storage\", \"digitalocean_spaces\", \"s3_compatible\"]', 'disable', 1, 'cloud_storage', '{\"class\":\"field toggle_form_fields\",\"hide_field\":\"cloud_storage_fields\",\"show_fields\":\"amazon_s3|s3_compatible,digitalocean_spaces|s3_compatible,ftp_storage|ftp_storage,wasabi|s3_compatible,s3_compatible|s3_compatible\"}', 1, '2022-11-09 07:44:54'),
(127, 'cloud_storage_api_key', NULL, '', 0, 'cloud_storage', '{\"class\":\"field cloud_storage_fields s3_compatible d-none\"}', 2, '2023-04-23 01:02:40'),
(128, 'cloud_storage_secret_key', NULL, '', 0, 'cloud_storage', '{\"class\":\"field cloud_storage_fields s3_compatible d-none\"}', 3, '2023-04-23 01:02:40'),
(129, 'cloud_storage_region', NULL, '', 0, 'cloud_storage', '{\"class\":\"field cloud_storage_fields s3_compatible d-none\"}', 4, '2023-04-23 01:02:40'),
(130, 'cloud_storage_bucket_name', NULL, '', 0, 'cloud_storage', '{\"class\":\"field cloud_storage_fields s3_compatible d-none\"}', 5, '2023-04-23 01:02:40'),
(131, 'cloud_storage_endpoint', NULL, '', 0, 'cloud_storage', '{\"class\":\"field cloud_storage_fields s3_compatible d-none\"}', 6, '2023-04-23 01:02:40'),
(132, 'cloud_storage_ftp_host', NULL, '', 0, 'cloud_storage', '{\"class\":\"field cloud_storage_fields ftp_storage d-none\"}', 2, '2022-04-05 08:00:24'),
(133, 'cloud_storage_ftp_username', NULL, '', 0, 'cloud_storage', '{\"class\":\"field cloud_storage_fields ftp_storage d-none\"}', 3, '2022-04-05 08:00:24'),
(134, 'cloud_storage_ftp_password', NULL, '', 0, 'cloud_storage', '{\"class\":\"field cloud_storage_fields ftp_storage d-none\"}', 4, '2022-04-05 08:00:24'),
(135, 'cloud_storage_ftp_port', 'number', '', 0, 'cloud_storage', '{\"class\":\"field cloud_storage_fields ftp_storage d-none\"}', 5, '2022-04-05 08:00:24'),
(136, 'cloud_storage_ftp_path', '', '', 0, 'cloud_storage', '{\"class\":\"field cloud_storage_fields ftp_storage d-none\"}', 6, '2022-04-05 08:00:24'),
(137, 'cloud_storage_ftp_endpoint', '', '', 0, 'cloud_storage', '{\"class\":\"field cloud_storage_fields ftp_storage d-none\"}', 7, '2022-04-05 08:00:24'),
(138, 'hide_phone_number_field_in_registration_page', '[\"yes\",\"no\"]', 'yes', 0, 'login_settings', NULL, 19, '2023-05-15 14:15:45'),
(139, 'phone_number_verification', '[\"enable\",\"disable\"]', 'disable', 0, 'sms_settings', NULL, 1, '2023-04-23 01:00:37'),
(140, 'sms_gateway', '[\"disable\",\"twilio\",\"messagebird\"]', 'twilio', 0, 'sms_settings', '{\"class\":\"field toggle_form_fields\",\"hide_field\":\"sms_gateway_fields\",\"show_fields\":\"twilio|twilio,messagebird|messagebird\"}', 2, '2023-04-06 00:09:48'),
(141, 'twilio_account_sid', '', '', 0, 'sms_settings', '{\"class\":\"field sms_gateway_fields twilio d-none\"}', 3, '2023-04-05 02:57:50'),
(142, 'twilio_auth_token', '', '', 0, 'sms_settings', '{\"class\":\"field sms_gateway_fields twilio d-none\"}', 4, '2023-04-05 02:57:50'),
(143, 'sms_src', '', '', 0, 'sms_settings', NULL, 6, '2023-04-05 02:57:50'),
(144, 'messagebird_api_key', '', '', 0, 'sms_settings', '{\"class\":\"field sms_gateway_fields messagebird d-none\"}', 5, '2023-04-05 02:57:50'),
(145, 'ip_intelligence', '[\"disable\",\"proxycheck_io\",\"getipintel\"]', 'disable', 0, 'ip_intelligence', '', 1, '2023-04-11 15:26:42'),
(146, 'ip_intelligence_api_key', NULL, '', 0, 'ip_intelligence', '', 2, '2023-04-11 14:07:20'),
(147, 'ip_intelligence_probability', '', '50', 0, 'ip_intelligence', '', 3, '2023-04-11 14:59:50'),
(148, 'ip_intel_validate_on_login', '[\"yes\",\"no\"]', 'yes', 0, 'ip_intelligence', NULL, 4, '2023-04-11 14:33:20'),
(149, 'ip_intel_validate_on_register', '[\"yes\",\"no\"]', 'yes', 0, 'ip_intelligence', NULL, 5, '2023-04-11 14:33:20'),
(150, 'minimum_guest_nickname_length', 'number', '5', 0, 'login_settings', NULL, 12, '2022-10-28 22:52:51'),
(151, 'maximum_guest_nickname_length', 'number', '30', 0, 'login_settings', NULL, 13, '2022-10-09 08:46:22'),
(152, 'adblock_detector', '[\"enable\",\"disable\"]', 'enable', 0, 'general_settings', NULL, 32, '2023-04-12 20:20:59'),
(153, 'footer_section_status', '[\"enable\",\"disable\"]', 'enable', 0, 'other_settings', NULL, 0, '2023-04-15 16:43:37'),
(154, 'profanity_filter_username', '[\"enable\",\"disable\",\"strict_mode\"]', 'enable', 0, 'other_settings', NULL, 0, '2023-04-17 06:33:25'),
(155, 'profanity_filter_full_name', '[\"enable\",\"disable\",\"strict_mode\"]', 'enable', 0, 'other_settings', NULL, 0, '2023-04-17 06:33:25'),
(156, 'enable_photo_upload_on_signup', '[\"yes\",\"no\",\"required\"]', 'yes', 0, 'login_settings', NULL, 7, '2023-04-22 04:25:54'),
(157, 'send_email_notification', '[multi_select][\"on_private_message_offline\",\"on_friend_request\", \"on_new_user_pending_approval\"]', 'a:1:{i:0;s:28:\"on_new_user_pending_approval\";}', 0, 'notification_settings', NULL, 9, '2023-04-22 04:56:35'),
(158, 'smtp_self_signed_certificate', '[\"yes\",\"no\"]', 'no', 0, 'email_settings', NULL, 9, '2023-04-23 11:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `gr_site_advertisements`
--

CREATE TABLE `gr_site_advertisements` (
  `site_advert_id` bigint(20) NOT NULL,
  `site_advert_name` varchar(50) NOT NULL,
  `site_advert_content` text NOT NULL,
  `site_advert_placement` varchar(50) NOT NULL,
  `site_advert_min_height` int(11) DEFAULT NULL,
  `site_advert_max_height` int(11) NOT NULL DEFAULT 150,
  `disabled` int(11) NOT NULL DEFAULT 0,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_site_notifications`
--

CREATE TABLE `gr_site_notifications` (
  `notification_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `notification_type` varchar(50) NOT NULL,
  `related_group_id` bigint(20) DEFAULT NULL,
  `related_user_id` bigint(20) DEFAULT NULL,
  `related_message_id` bigint(20) DEFAULT NULL,
  `related_parameters` text DEFAULT NULL,
  `read_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Unread\r\n1 = Read',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_site_roles`
--

CREATE TABLE `gr_site_roles` (
  `site_role_id` bigint(20) NOT NULL,
  `string_constant` varchar(191) NOT NULL,
  `permissions` text NOT NULL,
  `site_role_attribute` varchar(20) DEFAULT NULL,
  `disabled` int(11) NOT NULL DEFAULT 0,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_site_roles`
--

INSERT INTO `gr_site_roles` (`site_role_id`, `string_constant`, `permissions`, `site_role_attribute`, `disabled`, `updated_on`) VALUES
(1, 'site_role_1', '{\"update\":\"site_roles\",\"language_id\":\"\",\"name_color\":\"#DD8400\",\"attribute\":\"unverified_users\",\"disabled\":\"no\",\"load_profile_on_page_load\":\"\",\"left_panel_content_on_page_load\":\"\",\"main_panel_content_on_page_load\":\"\",\"hide_groups_on_group_url\":\"no\",\"default_group_visibility\":\"\",\"group_join_limit\":\"100\",\"flood_control_time_difference\":\"20\",\"daily_send_limit_group_messages\":\"0\",\"daily_send_limit_private_messages\":\"0\",\"edit_message_time_limit\":\"10\",\"delete_message_time_limit\":\"10\",\"max_file_upload_size\":\"500\",\"maximum_storage_space\":\"500\"}', 'unverified_users', 0, '2023-04-23 14:00:08'),
(2, 'site_role_2', '{\"update\":\"site_roles\",\"language_id\":\"\",\"name_color\":\"#F06292\",\"attribute\":\"administrators\",\"disabled\":\"no\",\"load_profile_on_page_load\":\"yes\",\"left_panel_content_on_page_load\":\"groups\",\"main_panel_content_on_page_load\":\"statistics\",\"site_notifications\":[\"view\",\"delete\"],\"hide_groups_on_group_url\":\"no\",\"groups\":[\"view_public_groups\",\"view_secret_groups\",\"view_password_protected_groups\",\"view_joined_groups\",\"create_groups\",\"create_unleavable_group\",\"create_secret_group\",\"create_protected_group\",\"set_group_slug\",\"pin_groups\",\"set_auto_join_groups\",\"set_participant_settings\",\"add_meta_tags\",\"set_cover_pic\",\"set_custom_background\",\"download_attachments\",\"typing_indicator\",\"mention_users\",\"mention_everyone\",\"reply_messages\",\"forward_messages\",\"check_read_receipts\",\"join_group\",\"leave_group\",\"invite_users\",\"add_site_members\",\"view_reactions\",\"react_messages\",\"send_message\",\"send_audio_message\",\"attach_files\",\"attach_from_storage\",\"attach_gifs\",\"attach_stickers\",\"share_screenshot\",\"allow_sharing_links\",\"allow_sharing_email_addresses\",\"generate_link_preview\",\"clear_chat_history\",\"export_chat\",\"embed_group\",\"send_as_another_user\",\"super_privileges\"],\"default_group_visibility\":\"visible\",\"friend_system\":[\"view_friends\",\"send_requests\",\"receive_requests\"],\"private_conversations\":[\"super_privileges\",\"initiate_private_chat\",\"view_private_chats\",\"send_message\",\"message_non_friends\",\"send_audio_message\",\"attach_files\",\"attach_from_storage\",\"attach_gifs\",\"attach_stickers\",\"share_screenshot\",\"allow_sharing_links\",\"allow_sharing_email_addresses\",\"generate_link_preview\",\"typing_indicator\",\"reply_messages\",\"check_read_receipts\",\"edit_own_message\",\"delete_own_message\",\"download_attachments\",\"export_chat\",\"clear_chat_history\"],\"group_join_limit\":\"99999999\",\"flood_control_time_difference\":\"1\",\"daily_send_limit_group_messages\":\"0\",\"daily_send_limit_private_messages\":\"0\",\"edit_message_time_limit\":\"10\",\"delete_message_time_limit\":\"99999999999999\",\"storage\":[\"access_storage\",\"upload_files\",\"download_files\",\"delete_files\",\"super_privileges\"],\"max_file_upload_size\":\"5000\",\"maximum_storage_space\":\"5000\",\"allowed_file_formats\":[\"image_files\",\"video_files\",\"audio_files\",\"documents\",\"all_file_formats\"],\"site_users\":[\"block_users\",\"ignore_users\",\"create_user\",\"import_users\",\"edit_users\",\"delete_users\",\"approve_users\",\"ban_users_from_site\",\"unban_users_from_site\",\"view_site_users\",\"view_online_users\",\"view_nearby_users\",\"view_invisible_users\",\"ban_ip_addresses\",\"unban_ip_addresses\",\"manage_user_access_logs\",\"login_as_another_user\",\"set_fake_online_users\",\"advanced_user_searches\"],\"profile\":[\"edit_profile\",\"change_full_name\",\"change_username\",\"change_email_address\",\"change_avatar\",\"upload_custom_avatar\",\"set_cover_pic\",\"set_custom_background\",\"go_offline\",\"view_email_address\",\"view_phone_number\",\"view_profile_url\",\"switch_languages\",\"switch_color_scheme\",\"disable_private_messages\",\"deactivate_account\",\"delete_account\"],\"site_roles\":[\"create\",\"view\",\"edit\",\"delete\"],\"group_roles\":[\"create\",\"view\",\"edit\",\"delete\"],\"custom_fields\":[\"create\",\"view\",\"edit\",\"delete\"],\"stickers\":[\"create\",\"view\",\"edit\",\"delete\"],\"custom_pages\":[\"create\",\"view\",\"edit\",\"delete\"],\"custom_menu\":[\"create\",\"view\",\"edit\",\"delete\"],\"avatars\":[\"upload\",\"view\",\"delete\"],\"languages\":[\"create\",\"view\",\"edit\",\"delete\",\"export\"],\"social_login_providers\":[\"add\",\"view\",\"edit\",\"delete\"],\"audio_player\":[\"listen_music\",\"add\",\"view\",\"edit\",\"delete\"],\"site_adverts\":[\"create\",\"view\",\"edit\",\"delete\"],\"badges\":[\"assign\",\"create\",\"view\",\"edit\",\"delete\"],\"complaints\":[\"report\",\"track_status\",\"review_complaints\",\"delete_complaints\"],\"super_privileges\":[\"monitor_group_chats\",\"monitor_private_chats\",\"view_statistics\",\"core_settings\",\"customizer\",\"slideshows\",\"group_headers\",\"header_footer\",\"firewall\",\"email_validator\",\"profanity_filter\",\"message_scheduler\",\"cron_jobs\"]}', 'administrators', 0, '2023-04-23 14:00:30'),
(3, 'site_role_3', '{\"update\":\"site_roles\",\"language_id\":\"\",\"name_color\":\"#00B107\",\"attribute\":\"default_site_role\",\"disabled\":\"no\",\"load_profile_on_page_load\":\"yes\",\"left_panel_content_on_page_load\":\"groups\",\"main_panel_content_on_page_load\":\"welcome_screen\",\"site_notifications\":[\"view\",\"delete\"],\"hide_groups_on_group_url\":\"no\",\"groups\":[\"view_public_groups\",\"view_password_protected_groups\",\"view_joined_groups\",\"download_attachments\",\"typing_indicator\",\"mention_users\",\"reply_messages\",\"forward_messages\",\"check_read_receipts\",\"join_group\",\"leave_group\",\"invite_users\",\"view_reactions\",\"react_messages\",\"send_message\",\"send_audio_message\",\"attach_files\",\"attach_from_storage\",\"attach_gifs\",\"attach_stickers\",\"share_screenshot\",\"allow_sharing_links\",\"allow_sharing_email_addresses\",\"generate_link_preview\",\"clear_chat_history\",\"export_chat\",\"embed_group\"],\"default_group_visibility\":\"hidden\",\"friend_system\":[\"view_friends\",\"send_requests\",\"receive_requests\"],\"private_conversations\":[\"initiate_private_chat\",\"view_private_chats\",\"send_message\",\"send_audio_message\",\"attach_files\",\"attach_from_storage\",\"attach_gifs\",\"attach_stickers\",\"share_screenshot\",\"allow_sharing_links\",\"allow_sharing_email_addresses\",\"generate_link_preview\",\"typing_indicator\",\"reply_messages\",\"check_read_receipts\",\"edit_own_message\",\"delete_own_message\",\"download_attachments\",\"export_chat\",\"clear_chat_history\"],\"group_join_limit\":\"100\",\"flood_control_time_difference\":\"2\",\"daily_send_limit_group_messages\":\"0\",\"daily_send_limit_private_messages\":\"0\",\"edit_message_time_limit\":\"10\",\"delete_message_time_limit\":\"10\",\"storage\":[\"access_storage\",\"upload_files\",\"download_files\",\"delete_files\"],\"max_file_upload_size\":\"500\",\"maximum_storage_space\":\"1000\",\"allowed_file_formats\":[\"image_files\",\"video_files\",\"audio_files\",\"documents\"],\"site_users\":[\"block_users\",\"ignore_users\",\"view_online_users\",\"view_nearby_users\",\"advanced_user_searches\"],\"profile\":[\"edit_profile\",\"change_full_name\",\"change_username\",\"change_email_address\",\"change_avatar\",\"upload_custom_avatar\",\"set_cover_pic\",\"set_custom_background\",\"go_offline\",\"view_profile_url\",\"switch_languages\",\"switch_color_scheme\",\"disable_private_messages\",\"deactivate_account\"],\"audio_player\":[\"listen_music\"],\"complaints\":[\"report\",\"track_status\"]}', 'default_site_role', 0, '2023-04-23 19:03:43'),
(4, 'site_role_4', '{\"update\":\"site_roles\",\"language_id\":\"\",\"name_color\":\"#FF1100\",\"attribute\":\"banned_users\",\"disabled\":\"no\",\"load_profile_on_page_load\":\"\",\"left_panel_content_on_page_load\":\"\",\"main_panel_content_on_page_load\":\"\",\"default_group_visibility\":\"\",\"group_join_limit\":\"100\",\"flood_control_time_difference\":\"20\",\"delete_message_time_limit\":\"10\",\"max_file_upload_size\":\"500\",\"maximum_storage_space\":\"500\"}', 'banned_users', 0, '2022-06-07 03:36:58'),
(5, 'site_role_5', '{\"update\":\"site_roles\",\"language_id\":\"\",\"name_color\":\"#5D01FF\",\"attribute\":\"guest_users\",\"disabled\":\"no\",\"load_profile_on_page_load\":\"yes\",\"left_panel_content_on_page_load\":\"groups\",\"main_panel_content_on_page_load\":\"welcome_screen\",\"site_notifications\":[\"view\"],\"hide_groups_on_group_url\":\"\",\"groups\":[\"view_public_groups\",\"view_joined_groups\",\"download_attachments\",\"typing_indicator\",\"mention_users\",\"reply_messages\",\"forward_messages\",\"check_read_receipts\",\"join_group\",\"leave_group\",\"invite_users\",\"view_reactions\",\"react_messages\",\"send_message\",\"send_audio_message\",\"attach_files\",\"attach_from_storage\",\"attach_gifs\",\"attach_stickers\",\"share_screenshot\",\"allow_sharing_links\",\"allow_sharing_email_addresses\",\"generate_link_preview\",\"clear_chat_history\",\"export_chat\"],\"default_group_visibility\":\"hidden\",\"private_conversations\":[\"initiate_private_chat\",\"view_private_chats\",\"send_message\",\"message_non_friends\",\"send_audio_message\",\"attach_files\",\"attach_from_storage\",\"attach_gifs\",\"attach_stickers\",\"share_screenshot\",\"allow_sharing_links\",\"allow_sharing_email_addresses\",\"generate_link_preview\",\"typing_indicator\",\"reply_messages\",\"check_read_receipts\",\"delete_own_message\",\"download_attachments\",\"export_chat\",\"clear_chat_history\"],\"group_join_limit\":\"10\",\"flood_control_time_difference\":\"3\",\"daily_send_limit_group_messages\":\"0\",\"daily_send_limit_private_messages\":\"0\",\"edit_message_time_limit\":\"10\",\"delete_message_time_limit\":\"10\",\"storage\":[\"access_storage\",\"upload_files\",\"download_files\"],\"max_file_upload_size\":\"100\",\"maximum_storage_space\":\"500\",\"allowed_file_formats\":[\"image_files\",\"video_files\",\"audio_files\",\"documents\"],\"site_users\":[\"block_users\",\"ignore_users\",\"view_online_users\",\"view_nearby_users\"],\"profile\":[\"edit_profile\",\"change_full_name\",\"change_avatar\",\"upload_custom_avatar\",\"set_cover_pic\",\"switch_languages\",\"switch_color_scheme\"],\"audio_player\":[\"listen_music\"],\"complaints\":[\"report\",\"track_status\"]}', 'guest_users', 0, '2023-04-23 19:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `gr_site_users`
--

CREATE TABLE `gr_site_users` (
  `user_id` bigint(20) NOT NULL,
  `display_name` varchar(70) NOT NULL DEFAULT 'Unknown',
  `username` varchar(191) NOT NULL,
  `email_address` varchar(191) NOT NULL,
  `unverified_email_address` varchar(191) DEFAULT NULL,
  `phone_number` varchar(60) DEFAULT NULL,
  `phone_verified` int(11) NOT NULL DEFAULT 1,
  `verification_code` varchar(20) DEFAULT NULL,
  `one_time_pin` int(11) DEFAULT NULL,
  `otp_generated_on` datetime DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `encrypt_type` varchar(50) NOT NULL DEFAULT 'php_password_hash' COMMENT 'md5,php_password_hash OR encrypt_method_id',
  `salt` varchar(100) DEFAULT NULL,
  `site_role_id` bigint(20) NOT NULL DEFAULT 1,
  `previous_site_role_id` bigint(20) NOT NULL DEFAULT 3,
  `online_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Offline\r\n1 = Online\r\n2 = Idle',
  `stay_online` int(11) NOT NULL DEFAULT 0,
  `approved` int(11) NOT NULL DEFAULT 1,
  `geo_latitude` decimal(10,8) DEFAULT NULL,
  `geo_longitude` decimal(11,8) DEFAULT NULL,
  `total_friends` bigint(20) DEFAULT 0,
  `social_login_provider_id` bigint(20) DEFAULT NULL,
  `access_token` varchar(20) NOT NULL,
  `token_generated_on` datetime DEFAULT '1970-01-02 00:00:00',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `last_seen_on` datetime DEFAULT NULL,
  `last_login_session` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_site_users`
--

INSERT INTO `gr_site_users` (`user_id`, `display_name`, `username`, `email_address`, `unverified_email_address`, `phone_number`, `phone_verified`, `verification_code`, `one_time_pin`, `otp_generated_on`, `password`, `encrypt_type`, `salt`, `site_role_id`, `previous_site_role_id`, `online_status`, `stay_online`, `approved`, `geo_latitude`, `geo_longitude`, `total_friends`, `social_login_provider_id`, `access_token`, `token_generated_on`, `created_on`, `updated_on`, `last_seen_on`, `last_login_session`) VALUES
(1, 'Site Admin', 'wasimcp', 'wasimcppro@gmail.com', NULL, '', 1, NULL, NULL, NULL, '$2y$10$Hz3mhwKmfYCg4S8MZDfCyO6jPUjuTEKNmhJeaa.vrKMXkdxFu7Mt2', 'php_password_hash', '', 2, 2, 0, 0, 1, 31.99512299, 35.94212623, 1, NULL, 'bzf0vuh3IC', '2023-03-31 11:25:12', '2022-04-11 08:23:17', '2023-05-20 09:32:47', '2023-05-25 08:12:55', '2023-05-15 11:14:43'),
(2, 'Doralee2303', 'Doralee2303', 'user_1684219344@gAYRTWpmHv.user', NULL, NULL, 1, 'vmTcJOQIkV', NULL, NULL, '$2y$10$agfaE.LDb.5UNTBRqqCSFuVjBgE4RJnDjvpzWxfrktDNkjeAw8ja2', 'php_password_hash', '', 3, 3, 0, 0, 1, 34.03867749, -118.25565815, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-16 12:12:24', '2023-05-16 12:12:31', '2023-05-16 12:14:16', '2023-05-16 09:12:24'),
(3, 'cosmeagardens4@gmail.com', 'cosmeagardens4gmail.com', 'user_1684224949@y10VF9tCYI.user', NULL, NULL, 1, 'bwoPctGeKf', NULL, NULL, '$2y$10$m2CsnoBN/8Vzs0SxWXw1TO1m.9yunvHKi5J1AenORG95I0DwWg9Di', 'php_password_hash', '', 3, 3, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-16 13:45:49', '2023-05-16 13:45:49', '2023-05-22 11:56:57', '2023-05-16 10:45:49'),
(4, 'nancysweety', 'nancysweety', 'user_1684245654@9dM5tg6Cim.user', NULL, NULL, 1, 'tTokDjqMrV', NULL, NULL, '$2y$10$Tri8fQyjzSqaQf6l4W0KketTeUsw8BFFsXqZtpR5zSv8SEsLfVpCm', 'php_password_hash', '', 3, 3, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-16 19:30:54', '2023-05-16 19:32:10', '2023-05-16 19:32:37', '2023-05-16 16:30:54'),
(5, 'السيد.احمد', 'السيد.احمد', 'user_1684281297@Q4AfV.guestuser', NULL, NULL, 1, 'i2y7WBprt5', NULL, NULL, '$2y$10$jhoxSVTAfplD6jo3skth4efzfrdXB/J8qwKlkiPvUhxAXOYyCub.i', 'php_password_hash', '', 5, 5, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-17 05:24:57', '2023-05-17 05:24:57', '2023-05-17 05:24:57', '2023-05-17 02:24:57'),
(6, 'السيد.احمد', 'السيد.احمد_R1Z6t', 'user_1684281336@8r1NR.guestuser', NULL, NULL, 1, 'zXN7Dj5si1', NULL, NULL, '$2y$10$WZF90j4sFsv4E35n5cowEOmaE6qkUDDqnMT7de3165D82b4iGlte.', 'php_password_hash', '', 5, 5, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-17 05:25:36', '2023-05-17 05:25:36', NULL, NULL),
(7, 'amritsarcallgirls12', 'amritsarcallgirls12', 'user_1684289024@Z5vuWBynl2.user', NULL, NULL, 1, 'Sx0MTspUFL', NULL, NULL, '$2y$10$0hCexFUTy9deCs97DcL./.Cy1prtIsIZrOLzH8IW.lllL1SB4MBmm', 'php_password_hash', '', 3, 3, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-17 07:33:44', '2023-05-17 07:36:09', '2023-05-18 17:49:24', '2023-05-17 04:33:44'),
(8, 'anuviz12', 'anuviz12', 'user_1684321344@JHr52R6qkG.user', NULL, NULL, 1, 'w8MOXBVlmA', NULL, NULL, '$2y$10$YZzJBHara/X7fMmxavpSQ.JTLhWLRa4t6QVgdZFIJJAdTrdNfvca6', 'php_password_hash', '', 3, 3, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-17 16:32:24', '2023-05-17 16:32:53', '2023-05-17 16:33:07', '2023-05-17 13:32:24'),
(9, 'nehamanali12', 'nehamanali12', 'user_1684323315@Cd0jLAg5cx.user', NULL, NULL, 1, '546edapuWX', NULL, NULL, '$2y$10$.uoqMrfjXmpognUq9W8uo.iCtUZwyw4DT7O6H.rYlnkC4X61KIQQ.', 'php_password_hash', '', 3, 3, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-17 17:05:15', '2023-05-17 17:05:56', '2023-05-17 17:06:06', '2023-05-17 14:05:15'),
(10, 'Fernando4562', 'Fernando4562', 'user_1684329157@g3sIqJzTUy.user', NULL, NULL, 1, 'x1yh9ADBUK', NULL, NULL, '$2y$10$5c.ad7i36yvcBM8Nshhk0.t0um33yfKm/NKhWXwrvDrG48dVpVTK.', 'php_password_hash', '', 3, 3, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-17 18:42:37', '2023-05-22 12:49:48', '2023-05-23 16:51:55', '2023-05-17 15:42:37'),
(11, 'ڜات بنت الاكابر', 'ڜات-بنت-الاكابر', 'user_1684361834@vyiaT2dxEs.user', NULL, NULL, 1, 'PDVs25Cd8m', NULL, NULL, '$2y$10$goPKbqhKS/vDY37UfNinrei.bo8XnD8/qOZtGq92yJVJL87eStTsu', 'php_password_hash', '', 3, 3, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-18 03:47:14', '2023-05-18 03:47:14', '2023-05-18 03:48:01', '2023-05-18 00:47:14'),
(12, 'crystallin', 'crystallin', 'user_1684391565@S1CMgUX3lk.user', NULL, NULL, 1, 'uNJG12ix38', NULL, NULL, '$2y$10$Ao2jWzirHlgPQ0U7emSB/evr0AwgJGhG4zCSlBmvFHHO2TmwKY6lu', 'php_password_hash', '', 3, 3, 0, 0, 1, 39.55001940, -123.43835300, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-18 12:02:45', '2023-05-18 12:07:11', '2023-05-18 12:07:17', '2023-05-18 09:02:45'),
(13, 'jacksandys', 'jacksandys', 'user_1684399042@rG6ZzJque0.user', NULL, NULL, 1, 'nhUuGPjN7p', NULL, NULL, '$2y$10$RPUVawph.8XjWojDpuCsAe.YtkcIOmcJ8y/5mt5eaprn2a0.jiZ.u', 'php_password_hash', '', 3, 3, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-18 14:07:22', '2023-05-18 14:09:36', '2023-05-18 14:10:29', '2023-05-18 11:07:22'),
(14, 'poojatunes', 'poojatunes', 'user_1684505204@z7FsgXtANn.user', NULL, NULL, 1, '9pWOLaKcDx', NULL, NULL, '$2y$10$X/GRvkEu54B3mCiTXacTSu0PaWjJWOwestTGhb777955H6AqzfH.6', 'php_password_hash', '', 3, 3, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-19 19:36:44', '2023-05-19 20:06:58', '2023-05-19 20:06:58', '2023-05-19 16:36:44'),
(15, 'AZPeds', 'AZPeds', 'user_1684535570@rwY18UkqfS.user', NULL, NULL, 1, 'c4oB25QpEJ', NULL, NULL, '$2y$10$5XAgqVz3FyQ70RmNB2sqZuW3LeQYlBzreq6hToSxtw/oIRjWYY8Na', 'php_password_hash', '', 3, 3, 0, 0, 1, 24.85774510, 67.04588410, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-20 04:02:50', '2023-05-20 04:06:52', '2023-05-20 04:07:34', '2023-05-20 01:02:50'),
(16, 'Aspire', 'Aspire', 'user_1684537998@Nnocy.guestuser', NULL, NULL, 1, 'ndE2D1J309', NULL, NULL, '$2y$10$3BskEeO2TPldawfqLOamLOV2drk0dbs8awHNuQK4BOo6mEJ4SB9ku', 'php_password_hash', '', 5, 5, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-20 04:43:17', '2023-05-20 04:44:47', '2023-05-20 04:44:47', '2023-05-20 01:43:17'),
(17, 'نو نيم', 'نو-نيم', 'user_1684663336@BPZVp.guestuser', NULL, NULL, 1, 'HTIjemKR0V', NULL, NULL, '$2y$10$Vup15Q4adCJnNpdEe3XbNe5af6Eg2/hmTnZPW4xaoKh2.92L8XmJW', 'php_password_hash', '', 5, 5, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-21 15:32:16', '2023-05-21 15:33:12', '2023-05-21 15:33:12', '2023-05-21 12:32:16'),
(18, 'احمد علي', 'احمد-علي', 'user_1684697590@ze8bh.guestuser', NULL, NULL, 1, 'tPZmwXCJVS', NULL, NULL, '$2y$10$R1vwUzH05h/cl8XeFdqzUuxceb8w0uQEE0LTmvpiIkDUM23/64qJG', 'php_password_hash', '', 5, 5, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-22 01:03:09', '2023-05-22 01:04:42', '2023-05-22 01:04:42', '2023-05-21 22:03:09'),
(19, 'Hashirama', 'Hashirama', 'user_1684734407@PqJTSC3lnd.user', NULL, NULL, 1, 'yWeHLQaDbZ', NULL, NULL, '$2y$10$6gOw0ju2g8i/NnPLy68Tr.vRO56kAuGKUQdTZrf3I2F2LQfneEUOG', 'php_password_hash', '', 3, 3, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-22 11:16:47', '2023-05-22 11:18:31', '2023-05-22 11:18:31', '2023-05-22 08:16:47'),
(20, 'arrowalley', 'arrowalley', 'user_1684753175@Hi81b6hDzr.user', NULL, NULL, 1, '4nNMas8dSr', NULL, NULL, '$2y$10$rTc1SHHiqSSwnzeQ2bO8FOoTW34muLMnQ6NoF5jxH5rRRB14Homk2', 'php_password_hash', '', 3, 3, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-22 16:29:35', '2023-05-22 16:35:30', '2023-05-22 16:35:31', '2023-05-22 13:29:35'),
(21, 'اوسكار', 'اوسكار', 'user_1684755399@MW59J.guestuser', NULL, NULL, 1, 'DPc463eLNz', NULL, NULL, '$2y$10$YjBBLbG5dP5gcfWZhVvS1eTTy3fwz30N2Ibc3donOmb4BlC2lt6UO', 'php_password_hash', '', 5, 5, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-22 17:06:39', '2023-05-22 17:06:39', '2023-05-22 17:10:12', '2023-05-22 14:06:39'),
(22, 'acsius', 'acsius', 'acsiusworks@gmail.com', NULL, NULL, 1, 'eu0WKUipjs', NULL, NULL, '$2y$10$89p3Vn4JDRtqcla/bWawjuF00X93IwVE5qytkuEa6iAy0ryzdxEvq', 'php_password_hash', '', 3, 3, 0, 0, 1, 28.64578560, 77.21779200, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-22 17:33:38', '2023-05-23 17:16:54', '2023-05-23 17:16:57', '2023-05-22 14:33:38'),
(23, 'Hffhh', 'Hffhh', 'user_1684775222@Oo6Nn.guestuser', NULL, NULL, 1, 'ZqaW257hli', NULL, NULL, '$2y$10$Rrg7rlJ0OVGqBMuPun2LOuJninuX8rFrX9uux3es0AB/Jkvomu8qq', 'php_password_hash', '', 5, 5, 0, 0, 1, 32.02497310, 35.85741520, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-22 22:37:02', '2023-05-22 22:49:36', '2023-05-22 22:49:36', '2023-05-22 19:37:02'),
(24, 'امير الامراء', 'امير-الامراء', 'user_1684790657@3qr7k.guestuser', NULL, NULL, 1, 'XUp1uFqg8f', NULL, NULL, '$2y$10$Y9cp1Y0STMcZtaQdevNSlOHyJvIOcfeLqM8VTu62Nxpt1osX9YFY2', 'php_password_hash', '', 5, 5, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-23 02:54:17', '2023-05-23 02:54:17', '2023-05-23 02:55:47', '2023-05-22 23:54:17'),
(25, 'Malk Admin', 'malk', 'malk@malk.malk', NULL, NULL, 1, 'bmCgLfYTeG', NULL, NULL, '$2y$10$/MBHAg69LI7M.E2nUoCZruRvLd0lWXXt.n0Sxx3uXqwSBPUpyINya', 'php_password_hash', '', 2, 2, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-23 07:45:39', '2023-05-23 07:45:39', '2023-05-23 21:57:21', '2023-05-23 18:23:35'),
(26, 'يويو68', 'يويو68', 'user_1684837598@yTjPz.guestuser', NULL, NULL, 1, '7GLdYeC3By', NULL, NULL, '$2y$10$TyCbvQEL95CkIhqFs1lnq.SBx3qqqPtjHZpzG1SklhWoAaL2u33Du', 'php_password_hash', '', 5, 5, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-23 15:56:38', '2023-05-23 15:56:38', '2023-05-23 15:58:02', '2023-05-23 12:56:38'),
(27, 'lutehuwa', 'lutehuwa', 'user_1684856974@GqUIyRXz8E.user', NULL, NULL, 1, 'L6Xks0zS3m', NULL, NULL, '$2y$10$KBPpJ8MMR5iY3L9jqGJbv.O.zG5Rj8eJoDJzwxlQJCupt3JIGJfH.', 'php_password_hash', '', 3, 3, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-23 21:19:34', '2023-05-23 21:22:26', '2023-05-23 21:22:26', '2023-05-23 18:19:34'),
(28, 'الملك الملك', 'الملك-الملك', 'user_1684860407@rylm3.guestuser', NULL, NULL, 1, 'reVoySmXQO', NULL, NULL, '$2y$10$RPZFe4OOt9Nk2NHhaxv9QuXWWzgqSoYSpEVLIBfKWQ2r7YaOsqEuG', 'php_password_hash', '', 5, 5, 0, 0, 1, 33.31722850, 44.36786630, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-23 22:16:47', '2023-05-23 22:16:54', '2023-05-23 22:17:41', '2023-05-23 19:16:47'),
(29, 'Shrisht978', 'Shrisht978', 'onlygoawebsiterent@gmail.com', NULL, NULL, 1, 'np0JFafPDU', NULL, NULL, '$2y$10$7QJ93Yd8miOftILiv/UnROgefo3bxoUHIfUFvEkIUqN/LfB.2ljkm', 'php_password_hash', '', 3, 3, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-24 13:47:57', '2023-05-24 13:51:50', '2023-05-24 13:51:52', '2023-05-24 10:47:57'),
(30, 'dipalsharma0808', 'dipalsharma0808', 'user_1684919851@CdFOoufSwH.user', NULL, NULL, 1, '1LPuR5KFsY', NULL, NULL, '$2y$10$JX.c21lNtIvEMDC7AE4rG.lIx8Mgukov/IrOPKZ14QCJ4.1AyYtkK', 'php_password_hash', '', 3, 3, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-24 14:47:31', '2023-05-24 14:49:47', '2023-05-24 14:50:43', '2023-05-24 11:47:31'),
(31, 'Apsara', 'Apsara', 'user_1684925388@vT0SHGwydX.user', NULL, NULL, 1, 'LM1wKu8U9B', NULL, NULL, '$2y$10$GqxGx0j3FkDWN6kTsi6eR.9HCGjWBiM/WClFfgNgQ85IzsQ2zz.na', 'php_password_hash', '', 3, 3, 0, 0, 1, NULL, NULL, 0, NULL, '', '1970-01-02 00:00:00', '2023-05-24 16:19:48', '2023-05-24 16:20:17', '2023-05-24 16:21:54', '2023-05-24 13:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `gr_site_users_blacklist`
--

CREATE TABLE `gr_site_users_blacklist` (
  `user_blacklist_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `blacklisted_user_id` bigint(20) NOT NULL,
  `ignore` int(11) DEFAULT 0 COMMENT '0 = False\r\n1 = True',
  `block` int(11) NOT NULL DEFAULT 0 COMMENT '0 = False\r\n1 = True',
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_site_users_device_logs`
--

CREATE TABLE `gr_site_users_device_logs` (
  `access_log_id` bigint(20) NOT NULL,
  `login_session_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `ip_address` varchar(191) NOT NULL,
  `user_agent` text NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_site_users_device_logs`
--

INSERT INTO `gr_site_users_device_logs` (`access_log_id`, `login_session_id`, `user_id`, `ip_address`, `user_agent`, `created_on`) VALUES
(1, 1, 1, '213.139.49.121', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:5:\"112.0\";s:7:\"browser\";s:7:\"Firefox\";s:10:\"user_agent\";s:80:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0\";}', '2023-05-15 13:36:47'),
(2, 2, 1, '213.139.49.121', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"111.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36\";}', '2023-05-15 13:37:22'),
(3, 3, 1, '213.139.49.121', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:5:\"112.0\";s:7:\"browser\";s:7:\"Firefox\";s:10:\"user_agent\";s:80:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0\";}', '2023-05-15 14:14:43'),
(4, 4, 2, '173.239.218.225', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"111.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36\";}', '2023-05-16 12:12:24'),
(5, 5, 3, '122.173.24.89', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"109.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36\";}', '2023-05-16 13:45:49'),
(6, 5, 3, '101.0.57.40', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"109.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36\";}', '2023-05-16 16:21:56'),
(7, 6, 4, '117.202.65.249', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-16 19:30:54'),
(8, 7, 5, '176.220.74.122', 'a:4:{s:8:\"platform\";s:7:\"Android\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36\";}', '2023-05-17 05:24:57'),
(9, 8, 7, '2401:4900:1215:6417:cc30:8a5a:505b:5400', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-17 07:33:44'),
(10, 9, 8, '2409:40e4:37:94b7:d5f1:54e1:b7ea:940e', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-17 16:32:24'),
(11, 10, 9, '2409:40e4:37:94b7:d5f1:54e1:b7ea:940e', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-17 17:05:15'),
(12, 11, 10, '2401:4900:1c48:f44e:c154:bd41:c99f:437', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-17 18:42:37'),
(13, 12, 11, '196.133.92.200', 'a:4:{s:8:\"platform\";s:7:\"Android\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36\";}', '2023-05-18 03:47:14'),
(14, 13, 12, '103.152.112.176', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-18 12:02:45'),
(15, 14, 13, '2405:201:200c:d8ad:7c20:a3cd:b8f0:751f', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-18 14:07:22'),
(16, 8, 7, '2409:40e4:37:94b7:28a8:6c60:1716:a5cb', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-18 17:49:24'),
(17, 11, 10, '2401:4900:1f2e:7e37:9584:551e:e0a0:650f', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-18 18:18:05'),
(18, 2, 1, '213.139.59.172', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-19 09:59:02'),
(19, 15, 14, '103.178.168.50', 'a:4:{s:8:\"platform\";s:9:\"Windows 7\";s:7:\"version\";s:5:\"113.0\";s:7:\"browser\";s:7:\"Firefox\";s:10:\"user_agent\";s:79:\"Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:109.0) Gecko/20100101 Firefox/113.0\";}', '2023-05-19 19:36:44'),
(20, 16, 15, '2607:f130:0:fc:340b:1cff:fe52:1ec8', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:5:\"113.0\";s:7:\"browser\";s:7:\"Firefox\";s:10:\"user_agent\";s:80:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/113.0\";}', '2023-05-20 04:02:50'),
(21, 17, 16, '178.11.119.149', 'a:4:{s:8:\"platform\";s:7:\"Android\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36\";}', '2023-05-20 04:43:17'),
(22, 2, 1, '213.139.59.172', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-20 09:02:58'),
(23, 5, 3, '101.0.57.136', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"109.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36\";}', '2023-05-20 10:30:00'),
(24, 11, 10, '2409:4063:421c:24e5:5954:b74:6487:599a', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-21 14:06:46'),
(25, 18, 17, '196.152.82.177', 'a:4:{s:8:\"platform\";s:7:\"Android\";s:7:\"version\";s:13:\"79.0.3945.116\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:121:\"Mozilla/5.0 (Linux; Android 9; MRD-LX1F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.116 Mobile Safari/537.36\";}', '2023-05-21 15:32:16'),
(26, 19, 18, '185.80.141.41', 'a:4:{s:8:\"platform\";s:7:\"Android\";s:7:\"version\";s:12:\"78.0.3904.96\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:121:\"Mozilla/5.0 (Linux; Android 9; SM-J737R4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.96 Mobile Safari/537.36\";}', '2023-05-22 01:03:09'),
(27, 2, 1, '213.139.59.172', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-22 06:13:57'),
(28, 20, 19, '2405:201:301b:314a:59df:a6fc:92b8:15b8', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-22 11:16:47'),
(29, 5, 3, '101.0.57.40', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"109.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36\";}', '2023-05-22 11:56:57'),
(30, 11, 10, '2409:4063:4001:c936:d1bb:26ee:95a9:5d9a', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-22 12:49:22'),
(31, 21, 20, '2401:4900:1f3e:8fff::150:670d', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-22 16:29:35'),
(32, 22, 21, '188.132.221.174', 'a:4:{s:8:\"platform\";s:7:\"Android\";s:7:\"version\";s:3:\"4.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:195:\"Mozilla/5.0 (Linux; Android 10; Redmi 8 Build/QKQ1.191014.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/113.0.5672.123 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/415.0.0.34.107;]\";}', '2023-05-22 17:06:39'),
(33, 23, 22, '103.108.5.127', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"109.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36\";}', '2023-05-22 17:33:38'),
(34, 24, 23, '2a01:9700:1005:d100:3863:5f42:d9bc:9c28', 'a:4:{s:8:\"platform\";s:7:\"Android\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36\";}', '2023-05-22 22:37:02'),
(35, 25, 24, '213.6.164.215', 'a:4:{s:8:\"platform\";s:7:\"Android\";s:7:\"version\";s:3:\"4.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:203:\"Mozilla/5.0 (Linux; Android 13; SM-A137F Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/113.0.5672.76 Mobile Safari/537.36 [FB_IAB/Orca-Android;FBAV/408.1.0.16.113;]\";}', '2023-05-23 02:54:17'),
(36, 2, 1, '213.139.59.172', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-23 07:43:30'),
(37, 26, 26, '197.204.26.23', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:13:\"113.0.1774.50\";s:7:\"browser\";s:4:\"Edge\";s:10:\"user_agent\";s:129:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 Edg/113.0.1774.50\";}', '2023-05-23 15:56:38'),
(38, 11, 10, '2405:204:a088:a4ab:a1fe:e76b:d3e8:db00', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-23 16:51:20'),
(39, 23, 22, '103.108.5.54', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"109.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36\";}', '2023-05-23 17:06:53'),
(40, 27, 27, '212.34.19.115', 'a:4:{s:8:\"platform\";s:5:\"Linux\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:101:\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-23 21:19:34'),
(41, 28, 25, '212.34.19.115', 'a:4:{s:8:\"platform\";s:5:\"Linux\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:101:\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-23 21:23:35'),
(42, 29, 28, '37.238.199.10', 'a:4:{s:8:\"platform\";s:7:\"Android\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36\";}', '2023-05-23 22:16:47'),
(43, 2, 1, '212.34.12.161', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-24 10:14:12'),
(44, 30, 29, '2401:4900:47ff:daf8:cd1:b5f0:679e:97f6', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-24 13:47:57'),
(45, 31, 30, '2401:4900:1c66:59ef:b980:3d35:17fb:7f70', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-24 14:47:31'),
(46, 32, 31, '122.162.149.168', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-24 16:19:48'),
(47, 2, 1, '212.34.12.13', 'a:4:{s:8:\"platform\";s:10:\"Windows 10\";s:7:\"version\";s:9:\"113.0.0.0\";s:7:\"browser\";s:6:\"Chrome\";s:10:\"user_agent\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36\";}', '2023-05-25 07:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `gr_site_users_settings`
--

CREATE TABLE `gr_site_users_settings` (
  `user_setting_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `offline_mode` int(11) NOT NULL DEFAULT 0,
  `time_zone` varchar(100) DEFAULT 'Australia/Sydney',
  `language_id` bigint(20) DEFAULT NULL,
  `notification_tone` varchar(199) NOT NULL DEFAULT '0',
  `disable_private_messages` int(11) NOT NULL DEFAULT 0,
  `deactivated` int(11) DEFAULT 0,
  `color_scheme` varchar(20) DEFAULT 'default',
  `updated_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_site_users_settings`
--

INSERT INTO `gr_site_users_settings` (`user_setting_id`, `user_id`, `offline_mode`, `time_zone`, `language_id`, `notification_tone`, `disable_private_messages`, `deactivated`, `color_scheme`, `updated_on`) VALUES
(1, 1, 0, 'Asia/Amman', NULL, '0', 0, 0, 'default', '2023-05-15 10:36:50'),
(2, 2, 0, 'America/Los_Angeles', NULL, '0', 0, 0, 'default', '2023-05-16 09:12:26'),
(3, 3, 0, 'Asia/Kolkata', NULL, '0', 0, 0, 'default', '2023-05-16 10:45:53'),
(4, 4, 0, 'Asia/Kolkata', NULL, '', 0, 0, 'default', '2023-05-16 16:32:05'),
(5, 5, 0, 'Europe/Istanbul', NULL, '0', 0, 0, 'default', '2023-05-17 02:25:35'),
(6, 6, 0, '', NULL, '0', 0, 0, 'default', '2023-05-17 02:25:36'),
(7, 7, 0, 'Asia/Kolkata', NULL, '', 0, 0, 'default', '2023-05-17 04:35:33'),
(8, 8, 0, 'Asia/Kolkata', NULL, '', 0, 0, 'default', '2023-05-17 13:32:53'),
(9, 9, 0, 'Asia/Kolkata', NULL, '', 0, 0, 'default', '2023-05-17 14:05:56'),
(10, 10, 0, 'Asia/Kolkata', NULL, '0', 0, 0, 'default', '2023-05-17 15:42:37'),
(11, 11, 0, 'Africa/Cairo', NULL, '0', 0, 0, 'default', '2023-05-18 00:47:15'),
(12, 12, 0, 'America/Los_Angeles', NULL, '', 0, 0, 'default', '2023-05-18 09:04:37'),
(13, 13, 0, 'Asia/Kolkata', NULL, '', 0, 0, 'default', '2023-05-18 11:09:36'),
(14, 14, 0, 'Asia/Kolkata', 1, '', 0, 0, 'default', '2023-05-19 17:06:06'),
(15, 15, 0, 'America/Los_Angeles', NULL, '', 0, 0, 'default', '2023-05-20 01:06:38'),
(16, 16, 0, 'Europe/Berlin', NULL, '0', 0, 0, 'default', '2023-05-20 01:43:18'),
(17, 17, 0, 'Africa/Cairo', NULL, '0', 0, 0, 'default', '2023-05-21 12:32:16'),
(18, 18, 0, 'Asia/Aden', NULL, '0', 0, 0, 'default', '2023-05-21 22:03:12'),
(19, 19, 0, 'Asia/Kolkata', NULL, '', 0, 1, 'default', '2023-05-22 08:18:31'),
(20, 20, 0, 'Asia/Kolkata', NULL, '', 0, 0, 'default', '2023-05-22 13:34:40'),
(21, 21, 0, 'Europe/Istanbul', NULL, '0', 0, 0, 'default', '2023-05-22 14:06:39'),
(22, 22, 0, 'Asia/Kolkata', NULL, '', 0, 0, 'default', '2023-05-22 14:34:05'),
(23, 23, 0, 'Asia/Amman', NULL, '0', 0, 0, 'default', '2023-05-22 19:37:02'),
(24, 24, 0, 'Asia/Hebron', NULL, '0', 0, 0, 'default', '2023-05-22 23:54:17'),
(25, 25, 0, 'Asia/Amman', 1, '0', 0, 0, 'default', '2023-05-23 18:48:57'),
(26, 26, 0, 'Africa/Algiers', NULL, '0', 0, 0, 'default', '2023-05-23 12:56:38'),
(27, 27, 0, 'Asia/Amman', NULL, '0', 0, 0, 'default', '2023-05-23 18:19:35'),
(28, 28, 0, 'Asia/Baghdad', NULL, '0', 0, 0, 'default', '2023-05-23 19:16:48'),
(29, 29, 0, 'Asia/Kolkata', NULL, '', 0, 0, 'default', '2023-05-24 10:49:59'),
(30, 30, 0, 'Asia/Kolkata', NULL, '', 0, 0, 'default', '2023-05-24 11:49:47'),
(31, 31, 0, 'Asia/Kolkata', NULL, '', 0, 0, 'default', '2023-05-24 13:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `gr_social_login_providers`
--

CREATE TABLE `gr_social_login_providers` (
  `social_login_provider_id` int(11) NOT NULL,
  `identity_provider` varchar(50) NOT NULL,
  `app_id` varchar(150) DEFAULT NULL,
  `app_key` varchar(150) DEFAULT NULL,
  `secret_key` varchar(150) DEFAULT NULL,
  `open_in_popup` int(11) NOT NULL DEFAULT 1,
  `create_user` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Don''t Create\r\n1 = Create',
  `disabled` int(11) NOT NULL DEFAULT 0,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gr_typing_status`
--

CREATE TABLE `gr_typing_status` (
  `user_input_log_id` bigint(20) NOT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `private_conversation_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gr_typing_status`
--

INSERT INTO `gr_typing_status` (`user_input_log_id`, `group_id`, `private_conversation_id`, `user_id`, `created_on`, `updated_on`) VALUES
(1, 1, NULL, 1, '2023-05-20 09:07:00', '2022-01-01 00:00:00'),
(2, 3, NULL, 21, '2023-05-22 17:07:25', '2022-01-01 00:00:00'),
(3, 3, NULL, 23, '2023-05-22 22:37:14', '2022-01-01 00:00:00'),
(4, 3, NULL, 24, '2023-05-23 02:55:24', '2022-01-01 00:00:00'),
(5, 4, NULL, 26, '2023-05-23 15:57:18', '2022-01-01 00:00:00'),
(6, 4, NULL, 28, '2023-05-23 22:17:11', '2022-01-01 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gr_audio_player`
--
ALTER TABLE `gr_audio_player`
  ADD PRIMARY KEY (`audio_content_id`),
  ADD KEY `idx__disabled` (`disabled`);

--
-- Indexes for table `gr_badges`
--
ALTER TABLE `gr_badges`
  ADD PRIMARY KEY (`badge_id`);

--
-- Indexes for table `gr_badges_assigned`
--
ALTER TABLE `gr_badges_assigned`
  ADD PRIMARY KEY (`badge_assigned_id`),
  ADD KEY `badge_id_fk` (`badge_id`),
  ADD KEY `user_id_fk_20` (`user_id`),
  ADD KEY `group_id_fk_8` (`group_id`);

--
-- Indexes for table `gr_complaints`
--
ALTER TABLE `gr_complaints`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `user_id_fk_7` (`complainant_user_id`),
  ADD KEY `idx__complaint_status_complaint_id` (`complaint_status`,`complaint_id`);

--
-- Indexes for table `gr_cron_jobs`
--
ALTER TABLE `gr_cron_jobs`
  ADD PRIMARY KEY (`cron_job_id`);

--
-- Indexes for table `gr_css_variables`
--
ALTER TABLE `gr_css_variables`
  ADD PRIMARY KEY (`css_variable_id`);

--
-- Indexes for table `gr_custom_fields`
--
ALTER TABLE `gr_custom_fields`
  ADD PRIMARY KEY (`field_id`),
  ADD KEY `idx__type_id` (`field_id`);

--
-- Indexes for table `gr_custom_fields_values`
--
ALTER TABLE `gr_custom_fields_values`
  ADD PRIMARY KEY (`field_value_id`),
  ADD KEY `field_id_fk` (`field_id`),
  ADD KEY `user_id_fk_6` (`user_id`),
  ADD KEY `group_id_fk_4` (`group_id`),
  ADD KEY `idx__user_id_field_id` (`user_id`,`field_id`);

--
-- Indexes for table `gr_custom_menu_items`
--
ALTER TABLE `gr_custom_menu_items`
  ADD PRIMARY KEY (`menu_item_id`),
  ADD KEY `page_id_fk` (`page_id`),
  ADD KEY `idx__menu_item_order` (`menu_item_order`);

--
-- Indexes for table `gr_custom_pages`
--
ALTER TABLE `gr_custom_pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `gr_friends`
--
ALTER TABLE `gr_friends`
  ADD PRIMARY KEY (`friendship_id`),
  ADD KEY `user_id_fk_23` (`to_user_id`),
  ADD KEY `user_id_fk_22` (`from_user_id`) USING BTREE;

--
-- Indexes for table `gr_groups`
--
ALTER TABLE `gr_groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `idx__secret_group_suspended_pin_group` (`secret_group`,`suspended`,`pin_group`);

--
-- Indexes for table `gr_group_invitations`
--
ALTER TABLE `gr_group_invitations`
  ADD PRIMARY KEY (`group_invitation_id`),
  ADD KEY `group_id_fk_6` (`group_id`),
  ADD KEY `user_id_fk_9` (`user_id`);

--
-- Indexes for table `gr_group_members`
--
ALTER TABLE `gr_group_members`
  ADD PRIMARY KEY (`group_member_id`),
  ADD KEY `group_id_fk` (`group_id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `group_role_id_fk` (`group_role_id`),
  ADD KEY `idx__user_id_group_id` (`user_id`,`group_id`),
  ADD KEY `idx__group_id_user_id` (`group_id`,`user_id`),
  ADD KEY `idx__user_id_last_read_message_id` (`user_id`,`last_read_message_id`),
  ADD KEY `idx__user_id_group_role_id` (`user_id`,`group_role_id`),
  ADD KEY `idx__last_read_message_id` (`last_read_message_id`),
  ADD KEY `idx__group_id_group_member_id` (`group_id`,`group_member_id`);

--
-- Indexes for table `gr_group_messages`
--
ALTER TABLE `gr_group_messages`
  ADD PRIMARY KEY (`group_message_id`),
  ADD KEY `group_id_fk_2` (`group_id`),
  ADD KEY `user_id_fk_2` (`user_id`),
  ADD KEY `group_message_id_fk_3` (`parent_message_id`),
  ADD KEY `idx__group_id_group_message_id` (`group_id`,`group_message_id`),
  ADD KEY `idx__attachment_type_group_id_group_message_id` (`attachment_type`,`group_id`,`group_message_id`);

--
-- Indexes for table `gr_group_messages_reactions`
--
ALTER TABLE `gr_group_messages_reactions`
  ADD PRIMARY KEY (`group_message_reaction_id`),
  ADD KEY `group_message_id_fk_4` (`group_message_id`),
  ADD KEY `user_id_fk_10` (`user_id`);

--
-- Indexes for table `gr_group_roles`
--
ALTER TABLE `gr_group_roles`
  ADD PRIMARY KEY (`group_role_id`);

--
-- Indexes for table `gr_languages`
--
ALTER TABLE `gr_languages`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `gr_language_strings`
--
ALTER TABLE `gr_language_strings`
  ADD PRIMARY KEY (`string_id`),
  ADD KEY `language_id_fk` (`language_id`),
  ADD KEY `idx__string_constant` (`string_constant`(16)),
  ADD KEY `idx__skip_cache_skip_update_language_id` (`skip_cache`,`skip_update`,`language_id`);

--
-- Indexes for table `gr_login_sessions`
--
ALTER TABLE `gr_login_sessions`
  ADD PRIMARY KEY (`login_session_id`),
  ADD KEY `user_id_fk_3` (`user_id`);

--
-- Indexes for table `gr_mailbox`
--
ALTER TABLE `gr_mailbox`
  ADD PRIMARY KEY (`mail_id`),
  ADD KEY `user_id_fk_11` (`user_id`);

--
-- Indexes for table `gr_private_chat_messages`
--
ALTER TABLE `gr_private_chat_messages`
  ADD PRIMARY KEY (`private_chat_message_id`),
  ADD KEY `private_conversation_id_fk` (`private_conversation_id`),
  ADD KEY `user_id_fk_12` (`user_id`),
  ADD KEY `private_message_id_fk_2` (`parent_message_id`),
  ADD KEY `idx__read_status_private_conversation_id_user_id` (`read_status`,`private_conversation_id`,`user_id`),
  ADD KEY `idx__user_id_read_status_private_conversation_id` (`user_id`,`read_status`,`private_conversation_id`);

--
-- Indexes for table `gr_private_conversations`
--
ALTER TABLE `gr_private_conversations`
  ADD PRIMARY KEY (`private_conversation_id`),
  ADD KEY `idx__initiator_user_id_recipient_user_id` (`initiator_user_id`,`recipient_user_id`),
  ADD KEY `idx__recipient_user_id_initiator_user_id` (`recipient_user_id`,`initiator_user_id`);

--
-- Indexes for table `gr_push_subscriptions`
--
ALTER TABLE `gr_push_subscriptions`
  ADD PRIMARY KEY (`push_subscriber_id`),
  ADD KEY `user_id_fk_21` (`user_id`);

--
-- Indexes for table `gr_realtime_logs`
--
ALTER TABLE `gr_realtime_logs`
  ADD PRIMARY KEY (`realtime_log_id`);

--
-- Indexes for table `gr_scheduled_messages`
--
ALTER TABLE `gr_scheduled_messages`
  ADD PRIMARY KEY (`scheduled_message_id`),
  ADD KEY `group_id_fk_9` (`group_id`),
  ADD KEY `user_id_fk_25` (`user_id`);

--
-- Indexes for table `gr_settings`
--
ALTER TABLE `gr_settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `gr_site_advertisements`
--
ALTER TABLE `gr_site_advertisements`
  ADD PRIMARY KEY (`site_advert_id`);

--
-- Indexes for table `gr_site_notifications`
--
ALTER TABLE `gr_site_notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `idx__user_id_read_status` (`user_id`,`read_status`);

--
-- Indexes for table `gr_site_roles`
--
ALTER TABLE `gr_site_roles`
  ADD PRIMARY KEY (`site_role_id`);

--
-- Indexes for table `gr_site_users`
--
ALTER TABLE `gr_site_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `name` (`username`),
  ADD UNIQUE KEY `email` (`email_address`),
  ADD KEY `site_role_id_fk` (`site_role_id`),
  ADD KEY `idx__online_status` (`online_status`),
  ADD KEY `idx__last_login_session` (`last_login_session`),
  ADD KEY `idx__updated_on` (`updated_on`);

--
-- Indexes for table `gr_site_users_blacklist`
--
ALTER TABLE `gr_site_users_blacklist`
  ADD PRIMARY KEY (`user_blacklist_id`),
  ADD KEY `idx__blacklisted_user_id_user_id` (`blacklisted_user_id`,`user_id`),
  ADD KEY `idx__user_id_blacklisted_user_id` (`user_id`,`blacklisted_user_id`),
  ADD KEY `idx__user_id_ignore` (`user_id`,`ignore`),
  ADD KEY `idx__user_id_block` (`user_id`,`block`);

--
-- Indexes for table `gr_site_users_device_logs`
--
ALTER TABLE `gr_site_users_device_logs`
  ADD PRIMARY KEY (`access_log_id`),
  ADD KEY `user_id_fk_18` (`user_id`);

--
-- Indexes for table `gr_site_users_settings`
--
ALTER TABLE `gr_site_users_settings`
  ADD PRIMARY KEY (`user_setting_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_fk_4` (`user_id`),
  ADD KEY `language_id_fk_2` (`language_id`);

--
-- Indexes for table `gr_social_login_providers`
--
ALTER TABLE `gr_social_login_providers`
  ADD PRIMARY KEY (`social_login_provider_id`);

--
-- Indexes for table `gr_typing_status`
--
ALTER TABLE `gr_typing_status`
  ADD PRIMARY KEY (`user_input_log_id`),
  ADD KEY `user_id_fk_19` (`user_id`),
  ADD KEY `private_conversation_id_fk_2` (`private_conversation_id`),
  ADD KEY `group_id_fk_7` (`group_id`),
  ADD KEY `idx__group_id_user_id` (`group_id`,`user_id`),
  ADD KEY `idx__group_id_updated_on` (`group_id`,`updated_on`),
  ADD KEY `idx__private_conversation_id_user_id` (`private_conversation_id`,`user_id`),
  ADD KEY `idx__private_conversation_id_updated_on` (`private_conversation_id`,`updated_on`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gr_audio_player`
--
ALTER TABLE `gr_audio_player`
  MODIFY `audio_content_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_badges`
--
ALTER TABLE `gr_badges`
  MODIFY `badge_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_badges_assigned`
--
ALTER TABLE `gr_badges_assigned`
  MODIFY `badge_assigned_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_complaints`
--
ALTER TABLE `gr_complaints`
  MODIFY `complaint_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_cron_jobs`
--
ALTER TABLE `gr_cron_jobs`
  MODIFY `cron_job_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_css_variables`
--
ALTER TABLE `gr_css_variables`
  MODIFY `css_variable_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;

--
-- AUTO_INCREMENT for table `gr_custom_fields`
--
ALTER TABLE `gr_custom_fields`
  MODIFY `field_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gr_custom_fields_values`
--
ALTER TABLE `gr_custom_fields_values`
  MODIFY `field_value_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `gr_custom_menu_items`
--
ALTER TABLE `gr_custom_menu_items`
  MODIFY `menu_item_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gr_custom_pages`
--
ALTER TABLE `gr_custom_pages`
  MODIFY `page_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gr_friends`
--
ALTER TABLE `gr_friends`
  MODIFY `friendship_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gr_groups`
--
ALTER TABLE `gr_groups`
  MODIFY `group_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gr_group_invitations`
--
ALTER TABLE `gr_group_invitations`
  MODIFY `group_invitation_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_group_members`
--
ALTER TABLE `gr_group_members`
  MODIFY `group_member_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gr_group_messages`
--
ALTER TABLE `gr_group_messages`
  MODIFY `group_message_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gr_group_messages_reactions`
--
ALTER TABLE `gr_group_messages_reactions`
  MODIFY `group_message_reaction_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_group_roles`
--
ALTER TABLE `gr_group_roles`
  MODIFY `group_role_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gr_languages`
--
ALTER TABLE `gr_languages`
  MODIFY `language_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gr_language_strings`
--
ALTER TABLE `gr_language_strings`
  MODIFY `string_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2533;

--
-- AUTO_INCREMENT for table `gr_login_sessions`
--
ALTER TABLE `gr_login_sessions`
  MODIFY `login_session_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `gr_mailbox`
--
ALTER TABLE `gr_mailbox`
  MODIFY `mail_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_private_chat_messages`
--
ALTER TABLE `gr_private_chat_messages`
  MODIFY `private_chat_message_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_private_conversations`
--
ALTER TABLE `gr_private_conversations`
  MODIFY `private_conversation_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_push_subscriptions`
--
ALTER TABLE `gr_push_subscriptions`
  MODIFY `push_subscriber_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_realtime_logs`
--
ALTER TABLE `gr_realtime_logs`
  MODIFY `realtime_log_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gr_scheduled_messages`
--
ALTER TABLE `gr_scheduled_messages`
  MODIFY `scheduled_message_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_settings`
--
ALTER TABLE `gr_settings`
  MODIFY `setting_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `gr_site_advertisements`
--
ALTER TABLE `gr_site_advertisements`
  MODIFY `site_advert_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_site_notifications`
--
ALTER TABLE `gr_site_notifications`
  MODIFY `notification_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_site_roles`
--
ALTER TABLE `gr_site_roles`
  MODIFY `site_role_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gr_site_users`
--
ALTER TABLE `gr_site_users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `gr_site_users_blacklist`
--
ALTER TABLE `gr_site_users_blacklist`
  MODIFY `user_blacklist_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_site_users_device_logs`
--
ALTER TABLE `gr_site_users_device_logs`
  MODIFY `access_log_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `gr_site_users_settings`
--
ALTER TABLE `gr_site_users_settings`
  MODIFY `user_setting_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `gr_social_login_providers`
--
ALTER TABLE `gr_social_login_providers`
  MODIFY `social_login_provider_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gr_typing_status`
--
ALTER TABLE `gr_typing_status`
  MODIFY `user_input_log_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gr_badges_assigned`
--
ALTER TABLE `gr_badges_assigned`
  ADD CONSTRAINT `badge_id_fk` FOREIGN KEY (`badge_id`) REFERENCES `gr_badges` (`badge_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_id_fk_8` FOREIGN KEY (`group_id`) REFERENCES `gr_groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_20` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_complaints`
--
ALTER TABLE `gr_complaints`
  ADD CONSTRAINT `user_id_fk_7` FOREIGN KEY (`complainant_user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_custom_fields_values`
--
ALTER TABLE `gr_custom_fields_values`
  ADD CONSTRAINT `field_id_fk` FOREIGN KEY (`field_id`) REFERENCES `gr_custom_fields` (`field_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_id_fk_4` FOREIGN KEY (`group_id`) REFERENCES `gr_groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_6` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_custom_menu_items`
--
ALTER TABLE `gr_custom_menu_items`
  ADD CONSTRAINT `page_id_fk` FOREIGN KEY (`page_id`) REFERENCES `gr_custom_pages` (`page_id`);

--
-- Constraints for table `gr_friends`
--
ALTER TABLE `gr_friends`
  ADD CONSTRAINT `user_id_fk_22` FOREIGN KEY (`from_user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_23` FOREIGN KEY (`to_user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_group_invitations`
--
ALTER TABLE `gr_group_invitations`
  ADD CONSTRAINT `group_id_fk_6` FOREIGN KEY (`group_id`) REFERENCES `gr_groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_9` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_group_members`
--
ALTER TABLE `gr_group_members`
  ADD CONSTRAINT `group_id_fk` FOREIGN KEY (`group_id`) REFERENCES `gr_groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_role_id_fk` FOREIGN KEY (`group_role_id`) REFERENCES `gr_group_roles` (`group_role_id`),
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_group_messages`
--
ALTER TABLE `gr_group_messages`
  ADD CONSTRAINT `group_id_fk_2` FOREIGN KEY (`group_id`) REFERENCES `gr_groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_message_id_fk_3` FOREIGN KEY (`parent_message_id`) REFERENCES `gr_group_messages` (`group_message_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_id_fk_2` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_group_messages_reactions`
--
ALTER TABLE `gr_group_messages_reactions`
  ADD CONSTRAINT `group_message_id_fk_4` FOREIGN KEY (`group_message_id`) REFERENCES `gr_group_messages` (`group_message_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_10` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_language_strings`
--
ALTER TABLE `gr_language_strings`
  ADD CONSTRAINT `language_id_fk` FOREIGN KEY (`language_id`) REFERENCES `gr_languages` (`language_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_login_sessions`
--
ALTER TABLE `gr_login_sessions`
  ADD CONSTRAINT `user_id_fk_3` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_mailbox`
--
ALTER TABLE `gr_mailbox`
  ADD CONSTRAINT `user_id_fk_11` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_private_chat_messages`
--
ALTER TABLE `gr_private_chat_messages`
  ADD CONSTRAINT `private_conversation_id_fk` FOREIGN KEY (`private_conversation_id`) REFERENCES `gr_private_conversations` (`private_conversation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `private_message_id_fk_2` FOREIGN KEY (`parent_message_id`) REFERENCES `gr_private_chat_messages` (`private_chat_message_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_id_fk_12` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_private_conversations`
--
ALTER TABLE `gr_private_conversations`
  ADD CONSTRAINT `user_id_fk_13` FOREIGN KEY (`recipient_user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_14` FOREIGN KEY (`initiator_user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_push_subscriptions`
--
ALTER TABLE `gr_push_subscriptions`
  ADD CONSTRAINT `user_id_fk_21` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_scheduled_messages`
--
ALTER TABLE `gr_scheduled_messages`
  ADD CONSTRAINT `group_id_fk_9` FOREIGN KEY (`group_id`) REFERENCES `gr_groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_25` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_site_notifications`
--
ALTER TABLE `gr_site_notifications`
  ADD CONSTRAINT `user_id_fk_15` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_site_users`
--
ALTER TABLE `gr_site_users`
  ADD CONSTRAINT `site_role_id_fk` FOREIGN KEY (`site_role_id`) REFERENCES `gr_site_roles` (`site_role_id`);

--
-- Constraints for table `gr_site_users_blacklist`
--
ALTER TABLE `gr_site_users_blacklist`
  ADD CONSTRAINT `user_id_fk_16` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_17` FOREIGN KEY (`blacklisted_user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_site_users_device_logs`
--
ALTER TABLE `gr_site_users_device_logs`
  ADD CONSTRAINT `user_id_fk_18` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_site_users_settings`
--
ALTER TABLE `gr_site_users_settings`
  ADD CONSTRAINT `language_id_fk_2` FOREIGN KEY (`language_id`) REFERENCES `gr_languages` (`language_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `user_id_fk_4` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gr_typing_status`
--
ALTER TABLE `gr_typing_status`
  ADD CONSTRAINT `group_id_fk_7` FOREIGN KEY (`group_id`) REFERENCES `gr_groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `private_conversation_id_fk_2` FOREIGN KEY (`private_conversation_id`) REFERENCES `gr_private_conversations` (`private_conversation_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_19` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
