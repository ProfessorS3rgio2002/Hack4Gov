-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql112.ezyro.com
-- Generation Time: Feb 24, 2025 at 06:18 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezyro_38375951_ctf`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `attempt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `challenge_id` int(11) NOT NULL,
  `flag_attempt` varchar(255) DEFAULT NULL,
  `attempt_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`attempt_id`, `user_id`, `challenge_id`, `flag_attempt`, `attempt_time`) VALUES
(8, 30, 1, 'CCS', '2025-02-17 06:18:18'),
(9, 9, 1, 'dqdqwcasd', '2025-02-17 06:27:26'),
(10, 29, 2, 'flag{TNEDUTS_TI_deifitreC}', '2025-02-17 06:33:51'),
(11, 32, 16, 'synt{Orfgsevraq_EBG13}', '2025-02-17 06:35:22'),
(12, 29, 2, 'flag{Certified_IT_STUDENT}', '2025-02-17 06:39:12'),
(13, 31, 1, 'flag{Certificate_IT_STUDENT}', '2025-02-17 07:41:16'),
(14, 31, 1, 'Certificate_IT_STUDENT', '2025-02-17 07:41:24'),
(15, 31, 1, 'Certificate IT STUDENT', '2025-02-17 07:42:43'),
(16, 39, 1, 'CCS', '2025-02-17 07:51:07'),
(17, 39, 1, 'ZmxhZ3tDZXJ0aWZpZWRfSVRfU1RVREVOVH0=', '2025-02-17 07:56:18'),
(18, 39, 16, 'synt{Orfgsevraq_EBG13}', '2025-02-17 08:29:32'),
(19, 39, 16, 'So long and thanks for all the fish.', '2025-02-17 08:30:43'),
(20, 39, 16, 'Base64', '2025-02-17 08:45:34'),
(21, 31, 2, 'flag{Certified_IT_STUDENT}', '2025-02-17 08:45:49'),
(22, 39, 16, 'synt{Orfgsevraq_EBG13}', '2025-02-17 08:48:10'),
(23, 39, 16, 'Orfgsevraq_EBG13', '2025-02-17 08:48:19'),
(24, 31, 2, 'flag{Certified_IT_STUDENT}', '2025-02-17 08:50:05'),
(25, 39, 16, 'BESTFRIEND', '2025-02-17 08:54:22'),
(26, 39, 16, 'FLAGBESTFRIEND', '2025-02-17 08:55:38'),
(27, 31, 2, '{Certificate_IT_STUDENT}', '2025-02-17 08:56:16'),
(28, 9, 1, 'dqwdqd', '2025-02-17 09:26:48'),
(29, 31, 2, 'Photoshop', '2025-02-17 09:30:47'),
(30, 41, 1, 'flag{', '2025-02-17 09:33:21'),
(31, 41, 1, 'flag', '2025-02-17 09:33:29'),
(32, 31, 2, 'flag{gnirtS_desreveR}', '2025-02-17 09:33:49'),
(33, 31, 2, 'flag{gnirtS_desreveR}', '2025-02-17 09:34:03'),
(34, 41, 1, 'Photoshop', '2025-02-17 09:34:13'),
(35, 31, 2, 'flag{gnirtS_desreveR}.', '2025-02-17 09:34:15'),
(36, 41, 1, '50 68 6F 74 6F 73 68 6F 70 20', '2025-02-17 09:36:42'),
(37, 41, 1, 'Exif', '2025-02-17 09:39:17'),
(38, 41, 1, 'JFIF', '2025-02-17 09:39:27'),
(39, 41, 1, 'Photoshop', '2025-02-17 09:42:27'),
(40, 41, 1, 'HEÃP', '2025-02-17 09:43:28'),
(41, 41, 1, 'Exit', '2025-02-17 09:44:23'),
(42, 41, 1, 'FIFJ', '2025-02-17 09:45:38'),
(43, 41, 1, 'reC}galf', '2025-02-17 09:45:57'),
(44, 41, 1, 'flag{Cre', '2025-02-17 09:47:09'),
(45, 41, 1, 'flag}Cre', '2025-02-17 09:47:14'),
(46, 41, 1, 'flag}reC', '2025-02-17 09:47:32'),
(47, 41, 1, 'flag}', '2025-02-17 09:47:42'),
(48, 41, 1, 'flag}Cre', '2025-02-17 09:48:21'),
(49, 41, 1, 'flag{Cre', '2025-02-17 09:48:28'),
(50, 41, 1, 'flag{Cre', '2025-02-17 09:49:00'),
(51, 41, 1, 'flag{', '2025-02-17 09:49:05'),
(52, 41, 1, 'ZmxhZ3tDZXJ0aWZpZWRfSVRfU1RVREVOVH0=', '2025-02-17 09:51:35'),
(53, 41, 2, 'flag{gnirtS_desreveR}', '2025-02-17 10:00:16'),
(54, 41, 2, 'flag{gnirtS_desreveR}.', '2025-02-17 10:01:08'),
(55, 41, 23, 'collapseForensics2', '2025-02-17 10:03:26'),
(56, 41, 23, 'collapseForensics2', '2025-02-17 10:03:47'),
(57, 41, 23, 'Forensics2', '2025-02-17 10:03:54'),
(58, 41, 23, 'collapseForensics2', '2025-02-17 10:03:57'),
(59, 41, 16, 'flag{CesarsevenENC13}', '2025-02-17 10:04:58'),
(60, 41, 16, 'flag{CesarsevenENC13}', '2025-02-17 10:05:02'),
(61, 41, 16, 'flag{CesarsevenENC13}', '2025-02-17 10:05:06'),
(62, 41, 16, 'flag{CesarsevenENC13}.', '2025-02-17 10:05:13'),
(63, 41, 16, 'flag{Betsyfriend_ROT13}', '2025-02-17 10:05:41'),
(64, 41, 16, 'synt{Orfgsevraq_EBG13}', '2025-02-17 10:06:00'),
(65, 41, 24, 'view-source:hack4gov.unaux.com', '2025-02-17 10:11:33'),
(66, 43, 1, 'CSS_logo', '2025-02-17 10:18:01'),
(67, 41, 23, 'epidemic1', '2025-02-17 10:21:41'),
(68, 41, 23, 'epidemic', '2025-02-17 10:21:44'),
(69, 41, 23, 'flag{epidemic}', '2025-02-17 10:22:00'),
(70, 41, 23, 'flag{epidemic1}', '2025-02-17 10:22:04'),
(71, 41, 23, 'Mic Theory Records', '2025-02-17 10:24:59'),
(72, 41, 23, 'My Story', '2025-02-17 10:26:03'),
(73, 41, 23, 'My Story', '2025-02-17 10:26:04'),
(74, 37, 1, '01000011 01000011 01010011', '2025-02-17 10:44:42'),
(75, 37, 2, '01000011 01000011 01010011', '2025-02-17 10:44:45'),
(76, 37, 23, 'CCS', '2025-02-17 10:44:49'),
(77, 37, 16, 'From Base64', '2025-02-17 10:44:54'),
(78, 37, 24, '01000011 01000011 01010011', '2025-02-17 10:44:59'),
(79, 37, 16, 'CyberChef', '2025-02-17 10:45:11'),
(80, 37, 1, 'Ai', '2025-02-17 10:45:59'),
(81, 37, 1, 'CCS', '2025-02-17 10:46:25'),
(82, 31, 23, 'Repair the corrupted file', '2025-02-17 10:53:20'),
(83, 44, 2, 'flag{Certified_IT_STUDENT}', '2025-02-17 11:06:08'),
(84, 43, 1, 'CSS', '2025-02-17 11:15:21'),
(85, 43, 1, 'College of Computer Studies', '2025-02-17 11:15:50'),
(86, 33, 1, 'CCS', '2025-02-17 11:15:51'),
(87, 33, 1, 'CSS', '2025-02-17 11:16:10'),
(88, 43, 1, 'CSS_logo', '2025-02-17 11:18:44'),
(89, 33, 1, 'ccs', '2025-02-17 13:14:10'),
(90, 33, 1, 'CCS', '2025-02-17 13:14:19'),
(91, 33, 1, 'CSS', '2025-02-17 13:14:27'),
(92, 41, 23, 'hack4gov.unaux.com', '2025-02-17 13:39:30'),
(93, 41, 23, 'hack4gov', '2025-02-17 13:39:35'),
(94, 41, 23, 'unaux', '2025-02-17 13:39:43'),
(95, 41, 23, 'corgi', '2025-02-17 13:39:53'),
(96, 33, 1, 'centered', '2025-02-17 13:41:57'),
(97, 33, 1, 'centered', '2025-02-17 13:42:03'),
(98, 33, 1, 'JPEG', '2025-02-17 13:45:00'),
(99, 41, 26, '24', '2025-02-17 13:49:00'),
(100, 41, 26, 'A', '2025-02-17 13:49:03'),
(101, 33, 23, 'A', '2025-02-17 13:50:12'),
(102, 41, 26, 'Corgi Can Fly', '2025-02-17 13:55:43'),
(103, 41, 26, 'Corgi Can Fly?', '2025-02-17 13:55:46'),
(104, 41, 26, 'Did you tried LSB?', '2025-02-17 13:56:24'),
(105, 41, 26, 'Corgi Can Fly? Did you tried LSB?', '2025-02-17 13:56:58'),
(106, 41, 26, 'Corgi Can Fly Did you tried LSB?', '2025-02-17 13:57:03'),
(107, 41, 26, 'Corgi Can Fly Did you tried LSB?', '2025-02-17 13:57:04'),
(108, 41, 26, 'flag{Did you tried LSB?}', '2025-02-17 13:57:15'),
(109, 41, 26, 'flag{did you tried lsb?}', '2025-02-17 13:57:25'),
(110, 41, 26, 'flag{Did you try LSB?}', '2025-02-17 13:57:50'),
(111, 41, 26, 'Did you try LSB?', '2025-02-17 13:57:53'),
(112, 41, 26, 'Did you try LSB?', '2025-02-17 13:57:56'),
(113, 33, 23, 'H4G{w4tCh_yOUr_h34D3r}', '2025-02-17 14:00:10'),
(114, 43, 16, 'synt{Orfgsevraq_EBG13}', '2025-02-17 22:48:26'),
(115, 43, 16, 'Orfgsevraq_EBG13', '2025-02-17 22:49:04'),
(116, 43, 16, '{Orfgsevraq_EBG13}', '2025-02-17 22:49:26'),
(117, 39, 24, 'H4G{v13w_s0urc3_f0r_s3cr3ts}</p>', '2025-02-18 00:05:42'),
(118, 31, 23, 'H4G{w4tCh_yOUr_h34D3r}', '2025-02-18 00:37:40'),
(119, 31, 23, 'flag{w4tCh_yOUr_h34D3r}', '2025-02-18 00:37:48'),
(120, 45, 1, 'Flag()Zm xhZ 3tD Z XJ 0aWZ pZ WRf S V Rf U1R V R E V O V H 0=', '2025-02-18 00:49:04'),
(121, 45, 1, 'Zm xhZ 3tD Z XJ 0aWZ pZ WRf S V Rf U1R V R E V O V H 0=', '2025-02-18 00:49:22'),
(122, 49, 2, 'flag{Certified_IT_STUDENT}', '2025-02-18 03:55:05'),
(123, 49, 2, 'flag{gnirtS_desreveR}', '2025-02-18 04:01:57'),
(124, 49, 2, 'flag{String_Reversed}', '2025-02-18 04:02:26'),
(125, 49, 2, 'flag{gnirtS_desreveR}', '2025-02-18 04:04:13'),
(126, 43, 24, 'H4G{v13w_s0urc3_f0r_s3cr3ts', '2025-02-18 05:08:57'),
(127, 43, 24, 'H4G{v13w_s0urc3_f0r_s3cr3ts', '2025-02-18 05:08:57'),
(128, 43, 2, '}TNEDUTS_TI_deifitreC{galf', '2025-02-18 05:17:11'),
(129, 43, 2, '=0HVOVERVR1UfRVSfRWZpZWa0JXZDt3ZhxmZ', '2025-02-18 05:18:30'),
(130, 49, 23, 'H4G{w4tCh_yOUr_h34D3r}', '2025-02-18 05:56:32'),
(131, 37, 1, 'CCS', '2025-02-18 05:56:34'),
(132, 37, 1, '01000011 01000011 01010011', '2025-02-18 05:56:55'),
(133, 37, 16, 'The Hex', '2025-02-18 05:57:33'),
(134, 37, 16, 'To Base64', '2025-02-18 05:57:50'),
(135, 37, 16, 'MD5', '2025-02-18 05:58:13'),
(136, 37, 16, 'Base64', '2025-02-18 05:58:25'),
(137, 37, 16, 'Hex', '2025-02-18 05:58:38'),
(138, 37, 16, 'URL Decode', '2025-02-18 05:59:05'),
(139, 37, 16, 'Web app for encryption', '2025-02-18 05:59:35'),
(140, 37, 16, '01000011 01000011 01010011', '2025-02-18 06:03:47'),
(141, 37, 16, 'Data analysis', '2025-02-18 06:04:23'),
(142, 37, 16, 'Cyber Swiss Army Knife', '2025-02-18 06:05:01'),
(143, 37, 16, 'Cyber Swiss', '2025-02-18 06:05:09'),
(144, 37, 16, 'Cyber Swiss', '2025-02-18 06:05:10'),
(145, 37, 16, 'Web app for Encryption', '2025-02-18 06:05:43'),
(146, 37, 27, 'Einstein\'s Quote â€“ Encouraging curiosity and continuous questioning, which aligns with the nature of computing, problem-solving, and innovation.', '2025-02-18 06:12:28'),
(147, 37, 27, 'Encouraging curiosity and continuous questioning, which aligns with the nature of computing, problem-solving, and innovation.', '2025-02-18 06:12:38'),
(148, 37, 27, 'Einstein\'s Quote', '2025-02-18 06:13:04'),
(149, 37, 1, 'Central Symbol', '2025-02-18 06:13:54'),
(150, 37, 23, 'Central Symbol', '2025-02-18 06:14:04'),
(151, 37, 27, 'Computer Science', '2025-02-18 06:16:05'),
(152, 37, 27, 'Computer Science', '2025-02-18 06:16:06'),
(153, 37, 27, 'Computer Science', '2025-02-18 06:16:06'),
(154, 37, 27, 'Computer Science', '2025-02-18 06:16:06'),
(155, 37, 1, 'piexif', '2025-02-18 06:19:29'),
(156, 50, 16, 'synt{Orfgsevraq_EBG13}', '2025-02-18 06:55:23'),
(157, 41, 27, 'blee', '2025-02-18 09:16:37'),
(158, 41, 23, 'H4G{w4tCh_yO0Ur_h34D3r}', '2025-02-18 11:38:55'),
(159, 41, 23, 'H4G{w4tCh_yOUr_h34D3r}', '2025-02-18 11:39:51'),
(160, 31, 23, 'H4G{w4tCh_yOUr_h34D3r}', '2025-02-18 11:43:09'),
(161, 31, 23, 'H4G{w4tCh_yOUr_h34D3r}', '2025-02-18 11:43:11'),
(162, 31, 23, 'H4G{w4tCh_yOUr_h34D3r}', '2025-02-18 11:43:46'),
(163, 38, 1, 'ZmxhZ3tDZXJ0aWZpZWRfSVRfU1RVREVOVH0=', '2025-02-18 11:51:33'),
(164, 38, 16, 'synt{Orfgsevraq_EBG13}', '2025-02-18 11:54:40'),
(165, 41, 28, 'fb', '2025-02-18 12:40:04'),
(166, 41, 28, 'flag{sung-jin-woo]', '2025-02-18 12:42:11'),
(167, 41, 28, 'flag{sung-jin-woo]', '2025-02-18 12:42:35'),
(168, 31, 27, 'flag{tongue}', '2025-02-18 12:48:52'),
(169, 31, 27, 'flag{albert_einstein_tongue}', '2025-02-18 12:49:07'),
(170, 49, 28, 'selectFLAG{example_flag}', '2025-02-18 13:10:18'),
(171, 49, 28, 'selectFLAG{nawala_flag}', '2025-02-18 13:11:22'),
(172, 49, 28, 'selectFLAG{nawala}', '2025-02-18 13:11:28'),
(173, 49, 28, 'selectFLAG{flag_nawala}', '2025-02-18 13:11:37'),
(174, 49, 28, 'selectFLAG{dave}', '2025-02-18 13:17:03'),
(175, 49, 28, 'selectCTF{python_oowrfcaas_ms}', '2025-02-18 13:21:22'),
(176, 49, 28, 'selectCTF{this_is_not_yourflag}', '2025-02-18 13:35:35'),
(177, 49, 28, 'selectCTF{}', '2025-02-18 13:35:41'),
(178, 31, 27, 'flag{albert_einstein_tongue_meme}', '2025-02-18 13:48:31'),
(179, 31, 27, 'flag{Albert_Einstein_tongue_meme}', '2025-02-18 13:48:42'),
(180, 31, 27, 'flag{Albert_Einstein\'s_tongue_meme}', '2025-02-18 13:48:50'),
(181, 31, 27, 'flag{albert_einstein\'s_tongue_meme}', '2025-02-18 13:48:56'),
(182, 49, 28, 'selectCTF{this_is_not_yourflag}', '2025-02-18 14:13:16'),
(183, 41, 27, 'flag{albert.jpg}', '2025-02-19 00:36:29'),
(184, 41, 27, 'flag.txt', '2025-02-19 00:58:28'),
(185, 41, 27, 'secret.zip', '2025-02-19 01:51:22'),
(186, 45, 28, 'Flag{sung-jin-woo}', '2025-02-19 02:04:50'),
(187, 53, 1, 'ccs', '2025-02-19 03:27:28'),
(188, 53, 1, '257', '2025-02-19 03:31:47'),
(189, 53, 1, '01 00 00 FF E1 00 AC 45 78 69 66 00 00 4D 4D 00 2A00 00 00 08 00 05 01 1A 00 05 00 00 00 01 00 00 004A 01 1B 00 05 00 00 00 01 00 00 00 52 01 28 00 0300 00 00 01 00 01 00 00 02 13 00 03 00 00 00 01 0001 00 00 9C 9C 00 01 00 00 00 4A 00 00 00 5A 00 0000 00', '2025-02-19 03:46:16'),
(190, 53, 1, 'Comment', '2025-02-19 03:51:52'),
(191, 53, 1, 'DCT', '2025-02-19 03:52:56'),
(192, 47, 16, 'flag{Bestfriend_ROT68}', '2025-02-19 08:42:59'),
(193, 47, 16, 'HAG{Bestfriend_ROT68}', '2025-02-19 08:43:23'),
(194, 41, 33, '2', '2025-02-19 09:50:10'),
(195, 41, 33, '1', '2025-02-19 09:50:37'),
(196, 41, 30, 'flag selectCTF{my_answer_is_11})', '2025-02-19 09:54:04'),
(197, 41, 33, 'flag selectCTF{my_answer_is_11})', '2025-02-19 09:54:15'),
(198, 41, 33, 'flag selectCTF{my_answer_is_11}', '2025-02-19 09:54:21'),
(199, 41, 33, '(10 original + flag selectCTF{my_answer_is_11})', '2025-02-19 09:54:43'),
(200, 41, 33, 'flag selectCTF{my_answer_is_11}', '2025-02-19 09:54:56'),
(201, 41, 33, 'flagselectCTF{my_answer_is_11}', '2025-02-19 09:54:59'),
(202, 43, 28, 'flag{sung_jin_woo}', '2025-02-19 11:01:05'),
(203, 43, 28, 'flag{song_jin_woo}', '2025-02-19 11:01:11'),
(204, 43, 28, 'flag{Sung_Jin_Woo}', '2025-02-19 11:01:42'),
(205, 43, 28, 'flag{Sung_JinWoo}', '2025-02-19 11:01:46'),
(206, 43, 28, 'flag{SungJinWoo}', '2025-02-19 11:01:50'),
(207, 43, 28, 'flag{Sung_Jin_Woo}', '2025-02-19 11:02:23'),
(208, 43, 2, 'Ã¿Ã˜Ã¿Ã  JFIF      Ã¿Ã¡', '2025-02-19 11:08:30'),
(209, 31, 33, 'flag selectCTF{my_answer_is_11}', '2025-02-19 11:08:51'),
(210, 31, 33, 'flag{my_answer_is_11}', '2025-02-19 11:09:03'),
(211, 31, 33, '10 original + flag selectCTF{my_answer_is_11}', '2025-02-19 11:09:20'),
(212, 31, 33, '(10 original + flag selectCTF{my_answer_is_11})', '2025-02-19 11:09:38'),
(213, 43, 23, 'flag{gnirtS_desreveR}', '2025-02-19 11:11:52'),
(214, 39, 23, 'H4G{w4tCh_y0Ur_h34d3r}', '2025-02-19 11:11:54'),
(215, 43, 2, 'flag{gnirtS_desreveR}', '2025-02-19 11:12:21'),
(216, 39, 23, 'H4G{w4tCh_y0Ur_h34d3r}', '2025-02-19 11:12:25'),
(217, 39, 23, 'H4G{w4tCh_yOUr_h34D3r}', '2025-02-19 11:12:26'),
(218, 39, 23, 'H4G{w4tCh_yOUr_h34D3r}', '2025-02-19 11:14:17'),
(219, 43, 2, 'flag{gnirtS_desreveR}', '2025-02-19 11:14:34'),
(220, 39, 23, 'H4G{w4tCh_yOUr_h34D3r}', '2025-02-19 11:15:09'),
(221, 39, 23, 'H4G{w4tCh_yOUr_h34D3r}', '2025-02-19 11:15:23'),
(222, 43, 23, 'flag{gnirtS_desreveR}', '2025-02-19 11:16:27'),
(223, 39, 33, 'flag selectCTF{my_answer_is_11})', '2025-02-19 11:37:05'),
(224, 39, 33, 'selectCTF{my_answer_is_11})', '2025-02-19 11:37:11'),
(225, 43, 23, 'H4G{w4tCh_yOUr_h34D3r}', '2025-02-19 11:42:34'),
(226, 43, 33, 'flag selectCTF{my_answer_is_11}', '2025-02-19 11:58:44'),
(227, 43, 33, 'flag{10}', '2025-02-19 11:59:31'),
(228, 43, 33, 'flag selectCTF{10}', '2025-02-19 11:59:43'),
(229, 43, 33, 'flag selectCTF{my_answer_is_11}', '2025-02-19 12:03:10'),
(230, 43, 33, 'flag selectCTF{my_answer_is_2}', '2025-02-19 12:06:33'),
(231, 43, 33, 'flag selectCTF{my_answer_is_3}', '2025-02-19 12:06:37'),
(232, 43, 33, 'flag selectCTF{my_answer_is_3}', '2025-02-19 12:06:39'),
(233, 43, 33, 'flag selectCTF{my_answer_is_3}', '2025-02-19 12:06:39'),
(234, 43, 33, 'flag selectCTF{my_answer_is_3}', '2025-02-19 12:06:40'),
(235, 43, 33, 'flag{my_answer_is_3}', '2025-02-19 12:06:46'),
(236, 43, 33, 'flag{my_answer_is_3}', '2025-02-19 12:06:46'),
(237, 43, 33, 'flag{my_answer_is_2}', '2025-02-19 12:06:50'),
(238, 43, 33, 'flag{my_answer_is_2}', '2025-02-19 12:06:50'),
(239, 43, 33, 'flag{my_answer_is_2}', '2025-02-19 12:06:50'),
(240, 43, 33, 'flag{my_answer_is_2}', '2025-02-19 12:06:51'),
(241, 43, 33, 'flag{my_answer_is_2}', '2025-02-19 12:06:51'),
(242, 43, 33, 'flag{my_answer_is_2}', '2025-02-19 12:06:51'),
(243, 43, 33, 'flag{my_answer_is_2}', '2025-02-19 12:06:51'),
(244, 43, 33, 'flag{my_answer_is_11}', '2025-02-19 12:06:55'),
(245, 43, 33, 'flag{my_answer_is_11}', '2025-02-19 12:06:55'),
(246, 43, 33, 'flag{my_answer_is_1}', '2025-02-19 12:06:58'),
(247, 43, 33, 'flag{my_answer_is_1}', '2025-02-19 12:06:58'),
(248, 43, 33, 'flag{my_answer_is_0}', '2025-02-19 12:07:02'),
(249, 43, 33, 'flag{my_answer_is_0}', '2025-02-19 12:07:02'),
(250, 43, 33, 'flag{my_answer_is_0}', '2025-02-19 12:07:02'),
(251, 43, 33, 'flag{my_answer_is_4}', '2025-02-19 12:07:06'),
(252, 43, 33, 'flag{my_answer_is_3}', '2025-02-19 12:07:53'),
(253, 43, 33, 'flag{my_answer_is_3}', '2025-02-19 12:07:54'),
(254, 43, 33, 'flag{my_answer_is_3}', '2025-02-19 12:07:54'),
(255, 43, 33, 'flag{my_answer_is_3}', '2025-02-19 12:07:54'),
(256, 43, 33, 'flag{my_answer_is_3}', '2025-02-19 12:07:54'),
(257, 43, 33, 'flag{3}', '2025-02-19 12:08:02'),
(258, 43, 33, 'flag{3}', '2025-02-19 12:08:03'),
(259, 43, 33, 'flag selectCTF{my_answer_is_2}', '2025-02-19 12:08:16'),
(260, 43, 33, 'flag selectCTF{my_answer_is_2}', '2025-02-19 12:08:16'),
(261, 43, 33, 'flag selectCTF{my_answer_is_3}', '2025-02-19 12:08:19'),
(262, 43, 33, 'flag selectCTF{my_answer_is_3}', '2025-02-19 12:08:19'),
(263, 43, 33, 'flag selectCTF{my_answer_is_2}', '2025-02-19 12:13:42'),
(264, 43, 33, 'flag selectCTF{my_answer_is_2}', '2025-02-19 12:13:42'),
(265, 43, 33, 'flag selectCTF{my_answer_is_2}', '2025-02-19 12:13:42'),
(266, 43, 33, 'flag selectCTF{my_answer_is_2}', '2025-02-19 12:13:42'),
(267, 43, 33, 'flag selectCTF{my_answer_is_2}', '2025-02-19 12:13:42'),
(268, 43, 33, 'flag selectCTF{my_answer_is_2}', '2025-02-19 12:13:43'),
(269, 43, 33, 'flag selectCTF{my_answer_is_2}', '2025-02-19 12:13:43'),
(270, 43, 33, 'flag selectCTF{my_answer_is_2}', '2025-02-19 12:13:43'),
(271, 43, 33, 'flag selectCTF{my_answer_is_2}', '2025-02-19 12:16:58'),
(272, 43, 33, 'selectCTF{my_answer_is_2}', '2025-02-19 12:20:04'),
(273, 43, 33, 'selectCTF{my_answer_is_2}', '2025-02-19 12:20:06'),
(274, 43, 33, 'selectCTF{my_answer_is_2}', '2025-02-19 12:20:06'),
(275, 43, 33, 'selectCTF{my_answer_is_2}', '2025-02-19 12:20:07'),
(276, 43, 33, 'selectCTF{my_answer_is_2}', '2025-02-19 12:20:07'),
(277, 43, 33, 'selectCTF{my_answer_is_2}', '2025-02-19 12:20:07'),
(278, 43, 33, 'selectCTF{my_answer_is_2}', '2025-02-19 12:20:15'),
(279, 43, 33, 'selectCTF{my_answer_is_2}', '2025-02-19 12:20:15'),
(280, 43, 33, 'flagselectCTF{my_answer_is_2}', '2025-02-19 12:20:25'),
(281, 43, 33, 'flag_selectCTF{my_answer_is_2}', '2025-02-19 12:20:34'),
(282, 43, 33, 'flag_selectCTF{my_answer_is_2}', '2025-02-19 12:20:34'),
(283, 43, 33, 'flag_selectCTF{my_answer_is_2}', '2025-02-19 12:21:33'),
(284, 43, 33, 'flag_selectCTF{my_answer_is_2}', '2025-02-19 12:21:34'),
(285, 43, 33, 'flag_selectCTF{my_answer_is_3}', '2025-02-19 12:23:04'),
(286, 43, 33, 'flag_selectCTF{my_answer_is_3}', '2025-02-19 12:23:05'),
(287, 43, 33, 'selectCTF{my_answer_is_3}', '2025-02-19 12:23:11'),
(288, 43, 33, 'flag_selectCTF{my_answer_is_11}', '2025-02-19 12:23:40'),
(289, 43, 33, 'flag selectCTF{my_answer_is_11}', '2025-02-19 12:25:08'),
(290, 43, 33, 'flag_selectCTF{my_answer_is_11}', '2025-02-19 12:25:16'),
(291, 38, 2, 'flag{gnirtS_desreveR}', '2025-02-19 12:38:48'),
(292, 38, 2, '{flag{gnirtS_desreveR}', '2025-02-19 12:42:01'),
(293, 38, 2, 'flag{gnirtS_desreveR}', '2025-02-19 12:42:05'),
(294, 38, 34, 'Reversed_String', '2025-02-19 12:49:28'),
(295, 38, 2, '}Reversed_String{galf', '2025-02-19 12:51:29'),
(296, 38, 2, '}Reversed_String{galf', '2025-02-19 12:55:41'),
(297, 38, 34, 'H4CK4G0V{CAESAR_IS_COOL}', '2025-02-19 13:41:51'),
(298, 31, 36, '{More H4G{im@g3_R3V3Rs3d}', '2025-02-19 14:01:19'),
(299, 38, 2, 'flag{gnirtS_desreveR}', '2025-02-19 14:10:52'),
(300, 38, 2, '}Reversed_String{galf', '2025-02-19 14:11:03'),
(301, 41, 35, '{More H4G{im@g3_R3V3Rs3d}', '2025-02-19 14:11:07'),
(302, 41, 35, 'H4G{im@g3_R3V3Rs3d}', '2025-02-19 14:11:15'),
(303, 38, 2, 'H4ck4Gov{Reversed_String}', '2025-02-19 14:11:19'),
(304, 41, 35, 'H4G{im@g3_R3V3Rs3d}', '2025-02-19 14:11:58'),
(305, 38, 2, '{Reversed_String}galf', '2025-02-19 14:33:35'),
(306, 38, 33, 'selectCTF{my_answer_is_11})', '2025-02-19 14:38:21'),
(307, 38, 33, 'electCTF{my_answer_is_11})', '2025-02-19 14:38:31'),
(308, 38, 33, 'CTF{my_answer_is_11}', '2025-02-19 14:38:40'),
(309, 38, 33, 'electCTF{my_answer_is_11}', '2025-02-19 14:38:44'),
(310, 38, 33, 'flag selectCTF{my_answer_is_11}', '2025-02-19 14:38:59'),
(311, 38, 33, 'flagselectCTF{my_answer_is_11}', '2025-02-19 14:39:03'),
(312, 38, 33, 'flagCTF{my_answer_is_11}', '2025-02-19 14:39:13'),
(313, 38, 33, 'flag{my_answer_is_11}', '2025-02-19 14:39:17'),
(314, 38, 33, 'flag selectCTF{my_answer_is_11}', '2025-02-19 14:39:37'),
(315, 38, 33, '(10 original + flag selectCTF{my_answer_is_11})', '2025-02-19 14:40:12'),
(316, 38, 33, 'selectCTF{my_answer_is_11})', '2025-02-19 14:41:28'),
(317, 38, 33, 'selectCTF{my_answer_is_11}).', '2025-02-19 14:41:32'),
(318, 31, 37, 'S4_{mldtn_cl?_slsl}', '2025-02-19 15:03:13'),
(319, 31, 37, 'F4_{zyqga_py?_fyfy}', '2025-02-19 15:03:31'),
(320, 31, 37, 'H4_{basic_ra?_haha}', '2025-02-19 15:04:12'),
(321, 38, 37, 'F4E{zyqga_py?_fyfy}', '2025-02-19 15:20:11'),
(322, 41, 37, 'H4G_{basic_ra?_haha}', '2025-02-19 15:24:24'),
(323, 41, 37, 'H4G_{basic_ra?_haha}', '2025-02-19 15:24:29'),
(324, 9, 35, 'dqwdqd', '2025-02-19 16:13:36'),
(325, 31, 40, 'H4G{Z1p_Crack3d_4_Rev3ng3}', '2025-02-19 18:20:05'),
(326, 31, 40, 'H4G{J0hnW1ck_UnZ1pp3d}', '2025-02-19 18:22:07'),
(327, 31, 35, 'TECHNIQUES{SECRET/ADVANCED}', '2025-02-19 18:37:07'),
(328, 31, 35, 'VIRTUAL HOSTS TECHNIQUES{SECRET/ADVANCED}', '2025-02-19 18:37:29'),
(329, 31, 40, 'H9G{FakeFlag!}', '2025-02-19 18:54:21'),
(330, 31, 40, 'H4G{FakeFlag!}', '2025-02-19 18:54:30'),
(331, 31, 40, 'H4G{FakeFlag!}', '2025-02-19 18:57:13'),
(332, 31, 42, 'H9G{FakeFlag!}', '2025-02-19 19:19:39'),
(333, 31, 42, 'H4G{FakeFlag!}', '2025-02-19 19:19:43'),
(334, 31, 42, 'H9G{FakeFlag!}', '2025-02-19 19:21:16'),
(335, 31, 42, 'H4G{FakeFlag!}', '2025-02-19 19:21:23'),
(336, 31, 42, 'H4G{FakeFlag!}', '2025-02-19 19:21:23'),
(337, 31, 42, 'H4G{FakeFlag!}', '2025-02-19 19:21:23'),
(338, 31, 42, 'H4G{FakeFlag!}', '2025-02-19 19:21:24'),
(339, 31, 42, 'password=Hack4Gov', '2025-02-19 19:23:18'),
(340, 31, 40, 'H4CK4G0V{YOu_Found_me}', '2025-02-19 19:29:21'),
(341, 31, 40, 'H4G{ChupapiMunenyo}', '2025-02-19 19:39:08'),
(342, 41, 40, 'gwapo', '2025-02-19 22:07:05'),
(343, 41, 42, 'U4T{SnxrSynt!}', '2025-02-19 22:12:18'),
(344, 41, 42, 'U4T{SnxrSynt!}', '2025-02-19 22:12:18'),
(345, 41, 42, 'H4G{FakeFlag!}', '2025-02-19 22:12:52'),
(346, 41, 42, 'H4G{FakeFlag!}', '2025-02-19 22:12:58'),
(347, 41, 42, 'H9G{FakeFlag!}', '2025-02-19 22:14:09'),
(348, 41, 42, 'H4G{FakeFlag!}', '2025-02-19 22:14:14'),
(349, 41, 42, 'U4T{SnxrSynt!}', '2025-02-19 22:16:03'),
(350, 41, 42, 'P4O{NismNtio!}', '2025-02-19 22:16:39'),
(351, 41, 42, 'H4G{Fake_Flag!}', '2025-02-19 22:17:20'),
(352, 41, 42, 'H4G{FakeFlag!}', '2025-02-19 22:22:05'),
(353, 41, 42, 'H4G{FakeFlag!}', '2025-02-19 22:22:13'),
(354, 41, 42, 'H4G{FakeFlag!}', '2025-02-19 22:23:03'),
(355, 41, 35, 'H4G{FakeFlag}', '2025-02-19 22:32:00'),
(356, 41, 35, 'H4G{FakeFlag!}', '2025-02-19 22:32:09'),
(357, 41, 35, 'H4G{fakeflag!}', '2025-02-19 22:32:19'),
(358, 41, 35, 'H4G{fake_flag!}', '2025-02-19 22:32:23'),
(359, 41, 35, 'H4G{FakeFlag!}', '2025-02-19 22:33:39'),
(360, 41, 38, 'H4G{FakeFlag!}', '2025-02-19 22:33:49'),
(361, 41, 42, 'H4G{FakeFlag!}', '2025-02-19 22:33:55'),
(362, 41, 42, 'H4G{FakeFlag!}', '2025-02-19 22:34:06'),
(363, 41, 42, 'H4G{FakeFlag}', '2025-02-19 22:34:27'),
(364, 41, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-19 22:39:24'),
(365, 41, 42, 'H4CK4GOV{Binwalk_Uncovers_Secrets}', '2025-02-19 22:40:49'),
(366, 41, 42, 'HACK4GOV{Binwalk_Uncovers_Secrets}', '2025-02-19 22:40:54'),
(367, 41, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-19 22:41:00'),
(368, 41, 42, 'H4G{Binwalk_Uncovers_Secrets}', '2025-02-19 22:41:19'),
(369, 41, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets} HkSZ}', '2025-02-20 01:31:10'),
(370, 41, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}HkSZ}', '2025-02-20 01:31:15'),
(371, 41, 42, 'H4CK4G0V{Binwalk_Uncovers_SecretsHkSZ}', '2025-02-20 01:31:18'),
(372, 41, 42, 'H4CK4G0V{Binwalk_Uncovers_SecretsZ}', '2025-02-20 01:31:25'),
(373, 41, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-20 01:31:28'),
(374, 41, 42, 'secret.txtH4CK4G0V{Binwalk_Uncovers_Secrets} HkSZ}', '2025-02-20 01:32:37'),
(375, 41, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-20 01:32:55'),
(376, 41, 42, 'U4T{SnxrSynt!}', '2025-02-20 03:53:40'),
(377, 41, 35, 'U4T{SnxrSynt!}', '2025-02-20 03:53:48'),
(378, 41, 35, 'H4G{FakeFlag!}', '2025-02-20 03:54:10'),
(379, 41, 42, 'H4G{FakeFlag!}', '2025-02-20 03:54:18'),
(380, 41, 35, 'key.txtU4T{SnxrSynt!}', '2025-02-20 04:03:21'),
(381, 41, 35, 'H4G{FakeFlag!}', '2025-02-20 04:03:57'),
(382, 41, 35, 'H4CK4G0V{YOu_Found_me}', '2025-02-20 04:16:42'),
(383, 41, 35, 'H4G{Z1p_Crack3d_4_Rev3ng3}', '2025-02-20 07:59:11'),
(384, 41, 35, 'H4G{J0hnW1ck_UnZ1pp3d}', '2025-02-20 08:00:48'),
(385, 39, 42, 'CTF{y0u_pass3d_GO_coll3ct_200_buck5}', '2025-02-20 08:14:58'),
(386, 41, 35, 'H4G{J0hnW1ck_UnZ1pp3d}', '2025-02-20 08:18:18'),
(387, 41, 40, 'H4G{J0hnW1ck_UnZ1pp3d}', '2025-02-20 08:18:44'),
(388, 41, 40, 'H4G{J0hnW1ck_UnZ1pp3d}', '2025-02-20 08:18:52'),
(389, 41, 40, 'H4G{Z1p_Crack3d_4_Rev3ng3}', '2025-02-20 08:20:56'),
(390, 39, 30, '${flag}', '2025-02-20 09:05:54'),
(391, 39, 42, 'Flag{Hack4Gov}', '2025-02-20 09:14:51'),
(392, 43, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-20 09:42:23'),
(393, 43, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-20 09:42:26'),
(394, 43, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-20 09:42:27'),
(395, 43, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-20 09:42:28'),
(396, 43, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-20 09:42:28'),
(397, 43, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-20 09:42:29'),
(398, 43, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-20 09:42:29'),
(399, 43, 42, 'secret.txtH4CK4G0V{Binwalk_Uncovers_Secrets}}', '2025-02-20 09:43:14'),
(400, 41, 27, '{Nv^}vw', '2025-02-20 10:56:26'),
(401, 53, 30, 'CTF', '2025-02-20 11:27:14'),
(402, 53, 35, 'Anonymous', '2025-02-20 11:29:55'),
(403, 53, 35, 'Anonymous', '2025-02-20 11:30:01'),
(404, 53, 35, 'Anonymous', '2025-02-20 11:30:02'),
(405, 53, 35, 'Anonymous', '2025-02-20 11:30:02'),
(406, 53, 35, 'Anonymous', '2025-02-20 11:30:04'),
(407, 55, 24, 'H4G{v13w_s0urc3_f0r_s3cr3ts', '2025-02-20 12:17:29'),
(408, 49, 34, 'K4fn4J0y{Fdhvdu_lv_frro}', '2025-02-20 14:41:34'),
(409, 49, 34, 'k4fn4j0y{fdhvdu_lv_frro}', '2025-02-20 14:42:36'),
(410, 49, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-20 15:22:15'),
(411, 49, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-20 15:27:56'),
(412, 49, 42, 'H4CK4G0V{Y0u_Found_me}', '2025-02-20 15:31:59'),
(413, 45, 1, 'flag{IT student}', '2025-02-20 15:32:50'),
(414, 49, 42, 'H4CK4G0V{Y0u_Found_me}', '2025-02-20 15:34:08'),
(415, 45, 42, 'flag{ John Wick}', '2025-02-20 15:38:44'),
(416, 45, 42, 'flag{ John Wick }', '2025-02-20 15:38:48'),
(417, 45, 42, 'flag{John Wick}', '2025-02-20 15:38:57'),
(418, 45, 42, 'flag{JohnWick}', '2025-02-20 15:39:10'),
(419, 45, 40, 'flag{Gwapo}', '2025-02-20 15:46:04'),
(420, 45, 40, 'flag{Gwapo}', '2025-02-20 15:46:08'),
(421, 45, 40, 'Flag{John Wick}', '2025-02-20 15:48:45'),
(422, 45, 40, 'Flag{keanu Reeves}', '2025-02-20 15:49:20'),
(423, 45, 40, 'flag{keanu Reeves}', '2025-02-20 15:49:31'),
(424, 45, 40, 'flag{baba yaga}', '2025-02-20 15:55:57'),
(425, 45, 40, 'flag{baba Yaga}', '2025-02-20 15:56:06'),
(426, 45, 40, 'flag{Baba Yaga}', '2025-02-20 15:56:15'),
(427, 49, 28, 'selectCTF{python_oowrfcaas_ms}', '2025-02-21 00:39:41'),
(428, 53, 27, 'Theoretical physicist', '2025-02-21 01:23:26'),
(429, 41, 40, 'H4G{J0hnW1ck_UnZ1pp3d}', '2025-02-21 09:56:02'),
(430, 41, 40, 'H4G{ChupapiMunenyo}', '2025-02-21 09:56:39'),
(431, 41, 27, 'H4ck4G0v{St3gS33k_P0w3r}', '2025-02-21 10:09:27'),
(432, 55, 28, 'selectFLAG{example_flag}', '2025-02-21 10:47:45'),
(433, 55, 28, 'flag{nawala}', '2025-02-21 10:50:19'),
(434, 55, 28, 'flag{nawala}', '2025-02-21 10:50:43'),
(435, 55, 28, 'flag=\'nawala\'', '2025-02-21 10:58:46'),
(436, 43, 42, 'secret.txtH4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-21 11:52:08'),
(437, 43, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-21 11:52:17'),
(438, 43, 42, '{Binwalk_Uncovers_Secrets}', '2025-02-21 11:52:26'),
(439, 55, 2, 'flag{Certified_IT_STUDENT}', '2025-02-21 11:57:37'),
(440, 55, 2, 'flag{Certified_IT_STUDENT}', '2025-02-21 11:57:58'),
(441, 43, 30, '${flag}', '2025-02-21 12:41:36'),
(442, 43, 42, 'flag{gnirtS_desreveR}', '2025-02-21 12:53:23'),
(443, 43, 42, 'flag{gnirtS_desreveR}', '2025-02-21 12:53:33'),
(444, 43, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-21 13:17:20'),
(445, 43, 42, 'H4CK4G0V{Hack4Gov}', '2025-02-21 13:17:46'),
(446, 43, 42, 'secret.txtH4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-21 13:18:19'),
(447, 43, 42, 'secret.txt{Binwalk_Uncovers_Secrets}', '2025-02-21 13:18:29'),
(448, 43, 42, 'secret.txt{Binwalk_Uncovers_Secrets}', '2025-02-21 13:18:31'),
(449, 43, 42, 'flag.txt{Binwalk_Uncovers_Secrets}', '2025-02-21 13:18:39'),
(450, 57, 41, 'MD5', '2025-02-23 15:14:40'),
(451, 57, 1, '2025', '2025-02-23 15:16:23'),
(452, 57, 1, '3.91.39.188 .7z', '2025-02-23 15:19:59'),
(453, 57, 1, 'ZmxhZ3tDZXJ0aWZpZWRfSVRfU1RVREVOVH0=', '2025-02-23 15:23:02'),
(454, 57, 1, 'COMMENTS', '2025-02-23 15:25:31'),
(455, 57, 2, 'flag{Certified_IT_STUDENT}', '2025-02-23 15:38:48'),
(456, 57, 2, 'flag{STUDENT_IT_Certified}', '2025-02-23 15:39:12'),
(457, 57, 41, ':xfsW\Zy', '2025-02-23 15:40:21'),
(458, 57, 41, 'flag{:xfsW\Zy}', '2025-02-23 15:40:40'),
(459, 39, 37, 'H4CK4G0V{YOu_Found_me}', '2025-02-24 01:43:12'),
(460, 39, 37, 'H4CK4G0V{YOu_Found_me}', '2025-02-24 01:43:33'),
(461, 39, 40, 'H4G{ChupapiMunenyo}', '2025-02-24 01:44:09'),
(462, 39, 37, 'H4CK4G0V{YOu_Found_me}', '2025-02-24 01:46:23'),
(463, 39, 40, 'H4G{ChupapiMunenyo}', '2025-02-24 01:46:29'),
(464, 41, 38, 'W3lc0m3 t0 th3 S3cur3 G0v3rnm3nt P0rt4l', '2025-02-24 02:05:00'),
(465, 41, 44, 'W3lc0m3 t0 th3 S3cur3 G0v3rnm3nt P0rt4l', '2025-02-24 02:05:11'),
(466, 55, 42, 'U4T{SnxrSynt!}', '2025-02-24 02:42:11'),
(467, 55, 42, 'U4T{SnxrSynt!}', '2025-02-24 02:51:06'),
(468, 55, 23, 'H4G{w4tCh_yOUr_h34D3r}', '2025-02-24 02:55:59'),
(469, 38, 23, 'H4G{w4tCh_y0Ur_h34d3r}', '2025-02-24 06:11:20'),
(470, 38, 23, 'H4G{w4tCh_yOUr_h34d3r}', '2025-02-24 06:11:28'),
(471, 38, 42, 'U4T{SnxrSynt!}', '2025-02-24 06:14:01'),
(472, 38, 42, 'H4G{FakeFlag!}', '2025-02-24 06:14:57'),
(473, 38, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-24 06:25:01'),
(474, 38, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-24 06:26:35'),
(475, 38, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-24 06:30:02'),
(476, 55, 37, 'U4T{SnxrSynt!}', '2025-02-24 06:53:00'),
(477, 38, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-24 06:53:13'),
(478, 55, 42, 'U4T{SnxrSynt!}', '2025-02-24 06:53:16'),
(479, 38, 42, 'secret.txtH4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-24 06:53:21'),
(480, 55, 42, 'H4G{FakeFlag!}', '2025-02-24 06:53:53'),
(481, 55, 42, 'H4G{FakeFlag!}', '2025-02-24 06:54:04'),
(482, 38, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-24 06:56:57'),
(483, 38, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-24 06:57:02'),
(484, 55, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-24 07:00:48'),
(485, 38, 28, 'flag=\'nawala\'', '2025-02-24 07:16:50'),
(486, 38, 28, '\"flag=\'nawala\'\"', '2025-02-24 07:17:45'),
(487, 55, 42, 'H4CK4G0V{Binwalk_Uncovers_Secrets}', '2025-02-24 07:26:56'),
(488, 38, 27, 'H4G{Baba_Yaga_Brute}', '2025-02-24 07:37:42'),
(489, 38, 40, 'H4G{Baba_Yaga_Brute}', '2025-02-24 07:37:45'),
(490, 38, 40, 'H4G{Baba_Yaga_Brute}', '2025-02-24 07:42:58'),
(491, 38, 28, 'flag=\'nawala\'', '2025-02-24 08:07:01'),
(492, 38, 28, 'nawala', '2025-02-24 08:07:16'),
(493, 38, 28, 'flag=\"nawala\"', '2025-02-24 08:07:26'),
(494, 38, 28, 'flag=\'nawala\'', '2025-02-24 08:07:41'),
(495, 38, 28, 'flag=nawala', '2025-02-24 08:16:30'),
(496, 38, 28, 'flag={nawala}', '2025-02-24 08:16:41'),
(497, 55, 28, 'flag=\'nawala\'', '2025-02-24 08:22:18'),
(498, 55, 28, 'flag{nawala}', '2025-02-24 08:22:30'),
(499, 55, 28, 'selectCTF{python_oowrfcaas_ms}', '2025-02-24 08:30:20'),
(500, 55, 28, 'selectCTF{python_oowrfcaas_ms}', '2025-02-24 08:30:42'),
(501, 58, 28, 'selectCTF{python_oowrfcaas_ms}', '2025-02-24 08:31:28'),
(502, 38, 28, 'flag=\'nawala\'', '2025-02-24 09:14:23'),
(503, 38, 28, '\"flag=\'nawala\'\"', '2025-02-24 09:15:19'),
(504, 55, 28, 'selectFLAG{example_flag}', '2025-02-24 09:35:48'),
(505, 58, 38, 'CTF{extremely_hidden_flag}', '2025-02-24 09:37:36'),
(506, 55, 28, 'FLAG{example_flag}', '2025-02-24 09:40:30'),
(507, 55, 28, 'FLAG{nawala}', '2025-02-24 09:40:40'),
(508, 55, 26, 'FLAG{Corgi is cutest aniaml on the earth >/////////<}', '2025-02-24 09:55:19'),
(509, 38, 28, 'flag=\'nawala\'', '2025-02-24 10:15:18'),
(510, 55, 40, 'H4G{Baba_Yaga_Brute}', '2025-02-24 10:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `description`) VALUES
(1, 'Cryptography', 'Challenges related to encryption and decryption techniques.'),
(2, 'Forensics', 'Challenges that involve analyzing files and recovering hidden data.'),
(3, 'Reverse Engineering', 'Challenges requiring disassembly and analysis of binaries.'),
(4, 'Web Exploitation', 'Challenges focused on web vulnerabilities like SQLi, XSS, and LFI.'),
(5, 'Steganography', 'Challenges that hide information inside images, audio, or other files.'),
(6, 'OSINT', 'OSINT (Open Source Intelligence) is a common category in CTF challenges. It involves gathering publicly available information from the internet to solve challenges.');

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `challenge_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `points` int(11) NOT NULL,
  `difficulty` enum('Easy','Medium','Hard') NOT NULL,
  `flag` varchar(255) NOT NULL,
  `hint` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`challenge_id`, `category_id`, `title`, `description`, `link`, `file`, `points`, `difficulty`, `flag`, `hint`) VALUES
(1, 2, 'Hidden Message', 'Find the hidden flag inside the image metadata.', NULL, 'https://www.mediafire.com/file/pgt9qanl8pf97np/CSS_logo.jpg/file', 10, 'Easy', 'flag{Certified_IT_STUDENT}', 'Try checking the EXIF data of the image.'),
(2, 2, 'Reversed Message', 'Analyze the image file to find the hidden flag. Maybe it\'s Reversed!', 'uploads/challenge.jpg', 'https://www.mediafire.com/file/msedip8pfi6emv9/challenge.jpg/file', 15, 'Easy', 'flag{Reversed_String}', 'Maybe you know Linux, Try to use command \"Strings\"'),
(16, 1, 'Dear Friend...', 'My friend ROT13 send me this message!, He said something about\nan Alien having 64 legs inside a military base...\n\nc3ludHtPcmZnc2V2cmFxX0VCRzEzfQ==', NULL, 'https://www.google.com/search?q=cyberchef', 15, 'Easy', 'flag{Bestfriend_ROT13}', 'Maybe you are familiar with Cyberchef..\nTry getting help with it. '),
(23, 2, 'A Picture Worth a Thousand Hex', 'A picture holds a secret, but its story won\'t unfold,\nFor its very first lines are lost in the cold.\nA broken beginning, a tale untold,\nCan you mend the cracks and watch it reload?', NULL, 'https://www.mediafire.com/file/ins3d29lk7xsumz/p3nny.jpg/file', 100, 'Hard', 'H4G{w4tCh_y0Ur_h34D3r}', 'Every masterpiece starts with a frame,\nBut this oneâ€™s missing such a shame...'),
(24, 4, 'Hidden in Plain Sight!', 'A developer left a secret note in the source code, but it\'s not as simple as it seems. Sometimes, what you see isnâ€™t what you get. Can you uncover the hidden message and retrieve the flag?\n\nWebsite: www.hack4gov.unaux.com/challenges/Hidden_In_Plain_Sight/hidden.html', NULL, 'http://hack4gov.unaux.com/challenges/Hidden_In_Plain_Sight/hidden.html', 15, 'Easy', 'H4G{v13w_s0urc3_f0r_s3cr3ts}', 'Inspecting the surface won\'t be enough. Look deeper where the real data lies...'),
(26, 5, 'Dear Corgi!', 'Corgi is cute, right?\n\nPillow (Python) and Bitmap (.NET) are your friends.', NULL, 'https://www.mediafire.com/file/ahjc9ecbfr18vah/corgi_cute.png/file', 50, 'Medium', 'FLAG{Corgi is cutest aniaml on the earth >////////<}', 'Maybe you can try stegsolve...'),
(27, 5, 'Einsteinâ€™s Enigma', 'Albert Einstein once said, \"The important thing is not to stop questioning.\" In this challenge, a picture of the great physicist holds more than meets the eye.\n\nDo you have what it takes to uncover the secrets hidden within?', NULL, 'https://www.mediafire.com/file/5knq4nx97uhdxay/Einstein.zip/file', 70, 'Medium', 'H4G{M0R$3C0D3R}', 'Look deeper into the image, then listen carefully knowledge is power, and sound can be the key.'),
(28, 4, 'My Password', 'you can find me if you are using a social media platform', NULL, 'https://dave123345.github.io/password/', 50, 'Medium', 'flag{sung-jin-woo}', 'no hints because you have facebook HAHAHA!'),
(30, 3, 'SQL', 'In a small, forgotten town, an old librarian once kept records of every secret ever whispered. Legends say that deep within the libraryâ€™s database, a mysterious flag is hidden, accessible only to those who know how to unite forgotten records.\n\nOne day, a curious hacker stumbles upon a web system rumored to be connected to this database. But the interface shows nothingâ€”just a simple page with no clues. However, thereâ€™s a way to speak to the database through the URL itself. The right query might just reveal the truth.\n\nCan you find the forgotten flag by uniting the right pieces of information?', NULL, 'https://dave123345.github.io/sql/', 200, 'Hard', 'selectCTF{union_sql}', 'Sometimes, separate pieces of data can be combined to reveal more information.\n\nThe database holds the key you just need to union the right pieces.'),
(33, 4, 'puzzle', 'try and try', NULL, 'https://dave123345.github.io/puzzle/', 30, 'Medium', 'selectCTF{my_answer_is_11}', 'numbers'),
(34, 1, 'Basic Shift :)', 'We found this strange message, but it looks like someone shifted the letters. Can you decrypt it and find the flag?', NULL, 'https://www.mediafire.com/file/j62igdnvn6dfb02/K4fn4J0y{Fdhvdu_lv_frro}.jpg/file', 20, 'Easy', 'H4ck4G0v{Caesar_is_cool}', 'It\'s just a simple cipher with a shift of +3.'),
(35, 5, 'Hidden Secret!', 'A top-secret agent left a mysterious image behind. We know there\'s a hidden message inside it, but it seems password-protected. Can you crack the password and retrieve the secret?', NULL, 'https://www.mediafire.com/file/vh71akibz336yt5/secret.jpg/file', 30, 'Easy', 'H4ck4G0v{St3gS33k_P0w3r}', 'Steghide was used to hide something in this file.\nBut the password? We lost it... \nMaybe your friend can help <3'),
(36, 6, 'Lost in the Web', 'An anonymous user uploaded this image, claiming it holds a secret. Can you track down its origin and find the hidden flag?', NULL, 'https://www.mediafire.com/file/zw0w10sif9pw4ml/Mabuhay.jpg/file', 15, 'Easy', 'H4G{im@g3_R3V3Rs3d}', 'A picture is worth a thousand searches.'),
(37, 5, 'Hidden Layers..', 'A mysterious image has surfaced, but something feels... off. Legends say it hides a secret message, buried deep within. Those who uncover it must decipher an ancient code, shifting time itself to unveil the truth. Will you be the one to break its silence?', NULL, 'https://www.mediafire.com/view/5jbg69npg3pkgpw/1739968895145.jpg/file', 50, 'Medium', 'H4G{basic_ra?_haha}', 'Some secrets lie beneath the surfaceâ€”try looking deeper.'),
(38, 4, '**Admin Only!**', 'Our website has a secret admin panel, but itâ€™s protected! Can you find a way to bypass the restrictions and gain access?', NULL, 'http://ctfchallenge1423admin.liveblog365.com/', 100, 'Hard', 'selectCTF{cookie_hack_success}', 'Sometimes, the client knows more than it should...'),
(40, 5, 'Baba Yagaâ€™s Secret', 'Heâ€™s the one you send to kill the Boogeymanâ€¦ but even John Wick has secrets. Hidden within this image lies something valuable. Can you uncover it? Beware, the key is buried deep only those with the right tools can retrieve it.', NULL, 'https://www.mediafire.com/file/hsk8sjfxh4s5idd/Babayaga.zip/file', 70, 'Medium', 'H4G{j0hn_w1ck_unl0ck3d}', 'Sometimes, passwords aren\'t just typed... they\'re hidden in plain sight. A little brute force might do the trick.'),
(41, 1, 'The Forgotten Hash 1', 'It looks like a hash, but what does it mean? Can you crack it and uncover the original value?\n\n48bb6e862e54f2a795ffc4e541caed4d', NULL, '.', 10, 'Easy', 'easy', 'This type of hash is commonly used for password storage but isn\'t secure anymore.'),
(42, 2, 'Invisible File', 'John Wick left behind a suspicious image. It looks normal at first glance, but we know he\'s a man of secrets. Can you uncover whatâ€™s hidden within?', NULL, 'https://www.mediafire.com/file/qhmd0wc0d10aeiu/Hidden+Layer.zip/file', 20, 'Easy', 'H4CK4G0V{YOu_Found_me}', 'Sometimes, files have more than what meets the eye. Dig deeper, analyze the layers, and extract the truth.'),
(43, 3, 'Casino Royale', 'Step into the casino, where fortunes rise and fall,', NULL, 'https://www.mediafire.com/file/xdyilmycwshfy5t/casino.rar/file', 30, 'Easy', 'H4G{n3g4t1v3_b3t_0p3n5_d00rs}', 'Sometimes, the house rules can be... reversed.'),
(44, 4, 'Lost in the Directives', 'A new government portal is live, but the developers forgot to clean up. They say search engines know too muchâ€¦ but maybe you should check where theyâ€™re told not to look.', NULL, 'http://hck4govstii.unaux.com/Challenge/Web/Lost_In_Directives', 20, 'Easy', 'Hack4Gov{N0wh3r3/T0/B3/F0und}', 'Crawlers follow rules, but you donâ€™t have to.');

-- --------------------------------------------------------

--
-- Table structure for table `countdowns`
--

CREATE TABLE `countdowns` (
  `countdown_id` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `duration` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countdowns`
--

INSERT INTO `countdowns` (`countdown_id`, `start_time`, `duration`, `created_at`) VALUES
(1, '2024-12-26 09:25:10', 604800, '2024-12-26 09:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `log_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `affected_table` varchar(255) DEFAULT NULL,
  `affected_id` int(11) DEFAULT NULL,
  `additional_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_recover`
--

CREATE TABLE `password_recover` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `password_recover`
--

INSERT INTO `password_recover` (`id`, `user_id`, `token`, `created_at`, `expires_at`) VALUES
(2, 48, '5efb65bbf0496ffdd10acba134ef318e40696404a4f00c8067778e3938a8782d9f696c9e47f229a50ffc6935c79755105e06', '2025-02-19 01:57:43', '2025-02-19 10:57:43'),
(3, 56, '294a3a6d6eee6d18776b412880ac7ec185db67aa7fe49b5d05da8cddd17f0133e906039a8ffe47b2d72da6b71a33cff17cab', '2025-02-21 08:25:31', '2025-02-21 17:25:31'),
(4, 56, 'b5a9d4829291abf169d1812d6cff2197e16475e26906f08e16ff27c67a9ba3618d334f5116905f1c8402f18783ac8acc9c18', '2025-02-21 08:26:04', '2025-02-21 17:26:04'),
(5, 56, 'ea97c424057a09a7d783d8bac79cf6c8fc326472f82ee5f9856652e5e5d4188ea50ac080eb4c1606a559d60ee838868a08c6', '2025-02-21 08:26:07', '2025-02-21 17:26:07'),
(6, 56, '3d962c66726dc6f7b542f07cc20bf57487f9935985f12fba9f13e283f0d816ede94884218249e9b48d74e923aa82f2088e9c', '2025-02-21 08:26:13', '2025-02-21 17:26:13'),
(7, 56, '3ecef96625159990df6c43c9595142c22280fb973b98e0b6289fb66497ec2bfa868b130df227fa926921b66f6f2fdfade313', '2025-02-21 08:26:13', '2025-02-21 17:26:13'),
(8, 56, '41c024b413a1b7ab4a48a1815257d57ad0526c552fb45f31b7c8126a4c26cd0ce13e542c99e460d9c3b64f21532438d5e27b', '2025-02-21 08:26:14', '2025-02-21 17:26:14'),
(9, 56, 'dda07915e12543bd7da7175544e735826eca175d4285fad32bf74b681d399a26f2e7ad4dc113dab2d240dccbf285913cf742', '2025-02-21 08:26:14', '2025-02-21 17:26:14'),
(10, 56, '97d8d156ec06aa387146a607aa6a46e2f678659c780d5b5f41fd16a668e7194f400d95b578e188b5c7933fa625ec7cd042bd', '2025-02-21 08:26:15', '2025-02-21 17:26:15'),
(11, 56, 'a09dc99dfa2401b017c33cb1ca3b766443a038b7c65ecfcfd5802d96b5a93fae8beb0802818259643960584be5a9956c4ddd', '2025-02-21 08:26:21', '2025-02-21 17:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `Course` varchar(255) NOT NULL,
  `Year` enum('First Year','Second Year','Third Year','Fourth Year') NOT NULL,
  `solved_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `FirstName`, `LastName`, `Gender`, `Course`, `Year`, `solved_count`) VALUES
(9, 'Kira', 'Romero', 'Male', 'ACT', 'Fourth Year', 2),
(29, 'JIMMY ', 'BRANGGAN', 'Male', 'BSIT', 'Third Year', 2),
(30, 'gb', 'egos', 'Male', 'BSIT', 'Second Year', 0),
(31, 'Mac Jorviy Anghelou ', 'Vallecer', 'Male', 'ACT', '', 18),
(32, 'ZACK', 'MADIHK', 'Female', 'ACT', 'Fourth Year', 2),
(33, 'Reynald', 'Landong', 'Male', 'BSIT', 'First Year', 0),
(34, 'Mark', 'Zuckerberg', 'Female', 'ACT', 'Fourth Year', 2),
(35, 'Jash', 'Manuel', 'Male', 'BSIT', 'Second Year', 0),
(36, 'Kira', 'Romero', 'Male', 'BSCS', 'Third Year', 0),
(37, 'John Carl', 'Amazon', 'Male', 'BSIT', 'First Year', 0),
(38, 'Janelle ', 'Capotulan ', 'Female', 'BSIT', 'Third Year', 17),
(39, 'Hjon Lloyd ', 'Deloso', 'Male', '', 'First Year', 11),
(40, 'Keneth', 'Rojas', 'Male', 'BSIT', 'First Year', 0),
(41, 'Christian', 'Ramizo', 'Male', 'BSIT', 'First Year', 18),
(42, 'khenn', 'lomoloy', 'Male', 'BSIT', 'First Year', 0),
(43, 'Francis', 'Canoy', 'Male', 'BSIT', 'First Year', 12),
(44, 'khenn', 'lomoloy', 'Male', 'BSIT', 'First Year', 1),
(45, 'Jasmine Angel', 'Libantino ', 'Female', 'BSIT', 'First Year', 1),
(46, 'John Earl', 'Quiros', 'Male', 'BSIT', 'Fourth Year', 0),
(47, 'Dave', 'Lemera', 'Male', 'BSIT', 'Fourth Year', 1),
(48, 'Justine', 'Bongcawil', 'Male', 'BSIT', 'First Year', 0),
(49, 'Who', 'Am I', 'Male', 'BSIT', 'First Year', 10),
(50, 'M', 'D', 'Male', 'BSIT', 'Third Year', 5),
(51, 'Mac Jorviy Anghelou', 'Vallecer', 'Male', 'BSIT', 'First Year', 1),
(52, 'Just', 'Bongcawil', 'Male', 'BSIT', 'First Year', 0),
(53, 'Alfred ', 'Tragico ', 'Male', 'BSIT', 'First Year', 0),
(54, 'Bai', 'Recmar', 'Male', 'BSIT', 'First Year', 1),
(55, 'datu', 'adlaw', 'Female', 'BSIT', 'First Year', 13),
(56, 'jin', 'castor', 'Female', 'BSCS', 'First Year', 0),
(57, 'Monkey', 'Luffy', 'Male', 'BSIT', 'First Year', 1),
(58, 'Brader', 'Error', 'Male', 'BSIT', 'Third Year', 1);

-- --------------------------------------------------------

--
-- Table structure for table `solved`
--

CREATE TABLE `solved` (
  `user_id` int(11) DEFAULT NULL,
  `challenge_id` int(11) DEFAULT NULL,
  `solved_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `flag_id` int(11) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `entries` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solved`
--

INSERT INTO `solved` (`user_id`, `challenge_id`, `solved_id`, `points`, `flag_id`, `flag`, `entries`, `created_at`) VALUES
(29, 1, 7, 10, NULL, 'flag{Certified_IT_STUDENT}', 0, '2025-02-17 06:30:31'),
(32, 1, 8, 10, NULL, 'flag{Certified_IT_STUDENT}', 0, '2025-02-17 06:32:35'),
(32, 16, 9, 15, NULL, 'flag{Bestfriend_ROT13}', 1, '2025-02-17 06:36:09'),
(29, 2, 10, 15, NULL, 'flag{Reversed_String}', 2, '2025-02-17 06:41:42'),
(34, 16, 11, 15, NULL, 'flag{Bestfriend_ROT13}', 0, '2025-02-17 06:54:01'),
(34, 1, 12, 10, NULL, 'flag{Certified_IT_STUDENT}', 0, '2025-02-17 06:54:10'),
(31, 1, 13, 10, NULL, 'flag{Certified_IT_STUDENT}', 3, '2025-02-17 07:44:09'),
(39, 1, 14, 10, NULL, 'flag{Certified_IT_STUDENT}', 2, '2025-02-17 08:26:22'),
(39, 16, 15, 15, NULL, 'flag{Bestfriend_ROT13}', 7, '2025-02-17 08:56:23'),
(41, 1, 16, 10, NULL, 'flag{Certified_IT_STUDENT}', 20, '2025-02-17 09:59:30'),
(41, 2, 17, 15, NULL, 'flag{Reversed_String}', 2, '2025-02-17 10:01:37'),
(31, 2, 18, 15, NULL, 'flag{Reversed_String}', 7, '2025-02-17 10:03:18'),
(31, 16, 19, 15, NULL, 'flag{Bestfriend_ROT13}', 0, '2025-02-17 10:07:05'),
(41, 16, 20, 15, NULL, 'flag{Bestfriend_ROT13}', 6, '2025-02-17 10:07:17'),
(31, 24, 21, 15, NULL, 'H4G{v13w_s0urc3_f0r_s3cr3ts}', 0, '2025-02-17 10:11:53'),
(41, 24, 22, 15, NULL, 'H4G{v13w_s0urc3_f0r_s3cr3ts}', 1, '2025-02-17 10:12:13'),
(44, 1, 23, 10, NULL, 'flag{Certified_IT_STUDENT}', 0, '2025-02-17 10:34:37'),
(31, 26, 24, 50, NULL, 'FLAG{Corgi is cutest aniaml on the earth >////////<}', 0, '2025-02-17 12:49:37'),
(41, 26, 25, 50, NULL, 'FLAG{Corgi is cutest aniaml on the earth >////////<}', 13, '2025-02-17 21:12:14'),
(43, 1, 26, 10, NULL, 'flag{Certified_IT_STUDENT}', 4, '2025-02-17 23:29:47'),
(43, 16, 27, 15, NULL, 'flag{Bestfriend_ROT13}', 3, '2025-02-17 23:58:00'),
(39, 24, 28, 15, NULL, 'H4G{v13w_s0urc3_f0r_s3cr3ts}', 1, '2025-02-18 00:06:01'),
(49, 1, 29, 10, NULL, 'flag{Certified_IT_STUDENT}', 0, '2025-02-18 03:50:59'),
(49, 2, 30, 15, NULL, 'flag{Reversed_String}', 4, '2025-02-18 04:08:40'),
(43, 24, 31, 15, NULL, 'H4G{v13w_s0urc3_f0r_s3cr3ts}', 2, '2025-02-18 05:09:08'),
(49, 23, 32, 100, NULL, 'H4G{w4tCh_y0Ur_h34D3r}', 1, '2025-02-18 05:56:41'),
(50, 23, 33, 100, NULL, 'H4G{w4tCh_y0Ur_h34D3r}', 0, '2025-02-18 06:45:56'),
(50, 2, 34, 15, NULL, 'flag{Reversed_String}', 0, '2025-02-18 06:47:24'),
(50, 1, 35, 10, NULL, 'flag{Certified_IT_STUDENT}', 0, '2025-02-18 06:51:16'),
(50, 16, 36, 15, NULL, 'flag{Bestfriend_ROT13}', 1, '2025-02-18 07:00:53'),
(50, 24, 37, 15, NULL, 'H4G{v13w_s0urc3_f0r_s3cr3ts}', 0, '2025-02-18 07:02:11'),
(49, 16, 38, 15, NULL, 'flag{Bestfriend_ROT13}', 0, '2025-02-18 07:15:15'),
(49, 24, 39, 15, NULL, 'H4G{v13w_s0urc3_f0r_s3cr3ts}', 0, '2025-02-18 07:17:53'),
(41, 23, 40, 100, NULL, 'H4G{w4tCh_y0Ur_h34D3r}', 17, '2025-02-18 11:40:20'),
(31, 23, 41, 100, NULL, 'H4G{w4tCh_y0Ur_h34D3r}', 6, '2025-02-18 11:43:50'),
(38, 1, 42, 10, NULL, 'flag{Certified_IT_STUDENT}', 1, '2025-02-18 11:51:57'),
(38, 24, 43, 15, NULL, 'H4G{v13w_s0urc3_f0r_s3cr3ts}', 0, '2025-02-18 11:55:17'),
(38, 16, 44, 15, NULL, 'flag{Bestfriend_ROT13}', 1, '2025-02-18 11:56:59'),
(41, 28, 46, 50, NULL, 'flag{sung-jin-woo}', 3, '2025-02-18 12:42:44'),
(31, 28, 47, 50, NULL, 'flag{sung-jin-woo}', 0, '2025-02-18 12:47:41'),
(9, 1, 48, 10, NULL, 'flag{Certified_IT_STUDENT}', 2, '2025-02-18 19:13:15'),
(39, 2, 49, 15, NULL, 'flag{Reversed_String}', 0, '2025-02-18 23:38:47'),
(39, 28, 50, 50, NULL, 'flag{sung-jin-woo}', 0, '2025-02-18 23:40:38'),
(45, 28, 51, 50, NULL, 'flag{sung-jin-woo}', 1, '2025-02-19 02:05:06'),
(54, 24, 52, 15, NULL, 'H4G{v13w_s0urc3_f0r_s3cr3ts}', 0, '2025-02-19 06:05:50'),
(41, 33, 56, 30, NULL, 'selectCTF{my_answer_is_11}', 7, '2025-02-19 09:55:01'),
(41, 34, 57, 20, NULL, 'H4ck4G0v{Caesar_is_cool}', 0, '2025-02-19 09:57:40'),
(31, 33, 58, 30, NULL, 'selectCTF{my_answer_is_11}', 4, '2025-02-19 11:10:56'),
(39, 23, 59, 100, NULL, 'H4G{w4tCh_y0Ur_h34D3r}', 6, '2025-02-19 11:15:30'),
(31, 34, 60, 20, NULL, 'H4ck4G0v{Caesar_is_cool}', 0, '2025-02-19 11:15:45'),
(43, 2, 61, 15, NULL, 'flag{Reversed_String}', 5, '2025-02-19 11:17:38'),
(39, 34, 62, 20, NULL, 'H4ck4G0v{Caesar_is_cool}', 0, '2025-02-19 11:24:57'),
(39, 33, 63, 30, NULL, 'selectCTF{my_answer_is_11}', 2, '2025-02-19 11:37:52'),
(43, 23, 64, 100, NULL, 'H4G{w4tCh_y0Ur_h34D3r}', 3, '2025-02-19 11:42:47'),
(43, 34, 65, 20, NULL, 'H4ck4G0v{Caesar_is_cool}', 0, '2025-02-19 11:51:59'),
(43, 33, 66, 30, NULL, 'selectCTF{my_answer_is_11}', 65, '2025-02-19 12:25:33'),
(43, 36, 68, 15, NULL, 'H4G{im@g3_R3V3Rs3d}', 0, '2025-02-19 13:05:44'),
(43, 28, 69, 50, NULL, 'flag{sung-jin-woo}', 6, '2025-02-19 13:16:28'),
(38, 34, 70, 20, NULL, 'H4ck4G0v{Caesar_is_cool}', 2, '2025-02-19 13:42:13'),
(39, 36, 71, 15, NULL, 'H4G{im@g3_R3V3Rs3d}', 0, '2025-02-19 13:47:17'),
(31, 36, 72, 15, NULL, 'H4G{im@g3_R3V3Rs3d}', 1, '2025-02-19 14:01:24'),
(38, 35, 73, 30, NULL, 'H4ck4G0v{St3gS33k_P0w3r}', 0, '2025-02-19 14:09:02'),
(41, 36, 74, 15, NULL, 'H4G{im@g3_R3V3Rs3d}', 0, '2025-02-19 14:12:04'),
(38, 36, 75, 15, NULL, 'H4G{im@g3_R3V3Rs3d}', 0, '2025-02-19 14:24:53'),
(38, 2, 76, 15, NULL, 'flag{Reversed_String}', 9, '2025-02-19 14:33:40'),
(38, 33, 77, 30, NULL, 'selectCTF{my_answer_is_11}', 12, '2025-02-19 14:41:35'),
(31, 37, 78, 50, NULL, 'H4G{basic_ra?_haha}', 3, '2025-02-19 15:04:21'),
(38, 26, 79, 50, NULL, 'FLAG{Corgi is cutest aniaml on the earth >////////<}', 0, '2025-02-19 15:15:09'),
(41, 37, 80, 50, NULL, 'H4G{basic_ra?_haha}', 2, '2025-02-19 15:24:31'),
(38, 37, 81, 50, NULL, 'H4G{basic_ra?_haha}', 1, '2025-02-19 15:28:08'),
(41, 30, 82, 200, NULL, 'selectCTF{union_sql}', 1, '2025-02-19 15:38:56'),
(31, 30, 83, 200, NULL, 'selectCTF{union_sql}', 0, '2025-02-19 15:45:21'),
(31, 41, 84, 10, NULL, 'easy', 0, '2025-02-19 19:12:32'),
(31, 42, 85, 20, NULL, 'H4CK4G0V{YOu_Found_me}', 8, '2025-02-19 19:29:12'),
(31, 40, 86, 70, NULL, 'H4G{j0hn_w1ck_unl0ck3d}', 7, '2025-02-19 19:40:02'),
(31, 35, 87, 30, NULL, 'H4ck4G0v{St3gS33k_P0w3r}', 2, '2025-02-19 19:45:13'),
(41, 41, 88, 10, NULL, 'easy', 0, '2025-02-19 21:55:22'),
(39, 41, 89, 10, NULL, 'easy', 0, '2025-02-19 22:44:44'),
(47, 24, 90, 15, NULL, 'H4G{v13w_s0urc3_f0r_s3cr3ts}', 0, '2025-02-20 03:54:02'),
(41, 42, 91, 20, NULL, 'H4CK4G0V{YOu_Found_me}', 29, '2025-02-20 04:17:08'),
(43, 41, 92, 10, NULL, 'easy', 0, '2025-02-20 09:05:38'),
(39, 30, 93, 200, NULL, 'selectCTF{union_sql}', 1, '2025-02-20 09:13:20'),
(55, 24, 94, 15, NULL, 'H4G{v13w_s0urc3_f0r_s3cr3ts}', 1, '2025-02-20 12:22:50'),
(55, 33, 95, 30, NULL, 'selectCTF{my_answer_is_11}', 0, '2025-02-20 12:31:44'),
(55, 1, 96, 10, NULL, 'flag{Certified_IT_STUDENT}', 0, '2025-02-20 13:06:39'),
(55, 41, 97, 10, NULL, 'easy', 0, '2025-02-20 13:08:58'),
(55, 16, 98, 15, NULL, 'flag{Bestfriend_ROT13}', 0, '2025-02-20 13:21:09'),
(49, 34, 99, 20, NULL, 'H4ck4G0v{Caesar_is_cool}', 2, '2025-02-20 15:05:06'),
(49, 41, 100, 10, NULL, 'easy', 0, '2025-02-20 15:10:08'),
(49, 42, 101, 20, NULL, 'H4CK4G0V{YOu_Found_me}', 4, '2025-02-20 23:56:51'),
(49, 33, 102, 30, NULL, 'selectCTF{my_answer_is_11}', 0, '2025-02-21 00:20:03'),
(49, 30, 103, 200, NULL, 'selectCTF{union_sql}', 0, '2025-02-21 00:24:31'),
(41, 35, 104, 30, NULL, 'H4ck4G0v{St3gS33k_P0w3r}', 16, '2025-02-21 02:35:15'),
(41, 40, 105, 70, NULL, 'H4G{j0hn_w1ck_unl0ck3d}', 6, '2025-02-21 09:58:56'),
(55, 30, 106, 200, NULL, 'selectCTF{union_sql}', 0, '2025-02-21 10:29:46'),
(43, 30, 107, 200, NULL, 'selectCTF{union_sql}', 1, '2025-02-21 12:46:13'),
(57, 1, 108, 10, NULL, 'flag{Certified_IT_STUDENT}', 4, '2025-02-23 15:32:19'),
(31, 27, 109, 70, NULL, 'H4G{M0R$3C0D3R}', 6, '2025-02-23 18:18:37'),
(31, 44, 110, 20, NULL, 'Hack4Gov{N0wh3r3/T0/B3/F0und}', 0, '2025-02-23 19:23:33'),
(41, 27, 111, 70, NULL, 'H4G{M0R$3C0D3R}', 6, '2025-02-24 01:31:25'),
(41, 44, 112, 20, NULL, 'Hack4Gov{N0wh3r3/T0/B3/F0und}', 1, '2025-02-24 02:09:03'),
(55, 2, 113, 15, NULL, 'flag{Reversed_String}', 2, '2025-02-24 02:35:25'),
(51, 44, 114, 20, NULL, 'Hack4Gov{N0wh3r3/T0/B3/F0und}', 0, '2025-02-24 02:45:08'),
(55, 23, 115, 100, NULL, 'H4G{w4tCh_y0Ur_h34D3r}', 1, '2025-02-24 02:56:24'),
(55, 35, 116, 30, NULL, 'H4ck4G0v{St3gS33k_P0w3r}', 0, '2025-02-24 02:58:35'),
(38, 41, 117, 10, NULL, 'easy', 0, '2025-02-24 05:51:28'),
(55, 36, 118, 15, NULL, 'H4G{im@g3_R3V3Rs3d}', 0, '2025-02-24 06:10:14'),
(38, 23, 119, 100, NULL, 'H4G{w4tCh_y0Ur_h34D3r}', 2, '2025-02-24 06:12:01'),
(55, 34, 120, 20, NULL, 'H4ck4G0v{Caesar_is_cool}', 0, '2025-02-24 06:40:09'),
(43, 35, 121, 30, NULL, 'H4ck4G0v{St3gS33k_P0w3r}', 0, '2025-02-24 06:53:26'),
(38, 44, 122, 20, NULL, 'Hack4Gov{N0wh3r3/T0/B3/F0und}', 0, '2025-02-24 07:03:09'),
(38, 30, 123, 200, NULL, 'selectCTF{union_sql}', 0, '2025-02-24 07:18:53'),
(38, 40, 124, 70, NULL, 'H4G{j0hn_w1ck_unl0ck3d}', 2, '2025-02-24 07:52:03'),
(58, 28, 125, 50, NULL, 'flag{sung-jin-woo}', 1, '2025-02-24 08:47:58'),
(38, 27, 126, 70, NULL, 'H4G{M0R$3C0D3R}', 1, '2025-02-24 09:40:39'),
(55, 28, 127, 50, NULL, 'flag{sung-jin-woo}', 11, '2025-02-24 09:43:27'),
(55, 26, 128, 50, NULL, 'FLAG{Corgi is cutest aniaml on the earth >////////<}', 1, '2025-02-24 09:55:36'),
(38, 42, 129, 20, NULL, 'H4CK4G0V{YOu_Found_me}', 9, '2025-02-24 10:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','moderator') NOT NULL,
  `rank` enum('Newbie','Script Kiddie','Wannabe Hacker','Anonymous') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `rank`, `created_at`, `email`, `points`) VALUES
(9, 'ProfessorS3rgio', '$2y$10$NGGU3gMCrE9sDBMK2j5T7eLJ70SLk6O3Na91QLP/0NZrLDFWJv3Dy', 'admin', 'Script Kiddie', '2024-12-20 15:35:06', 'billymamaril2002@gmail.com', 225),
(29, 'jimx2.0', '$2y$10$pAU1vBEo.MWzp60mA7WkUeRGCUE1vWJy6/KO0u7HgLUOyb6EbYnIm', 'user', 'Newbie', '2025-02-17 06:09:25', 'ctfjimx2.0@gmail.com', 25),
(30, 'gebhey', '$2y$10$hp.V5gZKLWsVYkOBw/OqUetBH6/YvO8.cs80txr4vHSr4bU2Hhfc.', 'user', 'Newbie', '2025-02-17 06:10:35', 'gebheye@gmail.com', 0),
(31, 'mcriez', '$2y$10$cHfp9i5LbS9wI4oX0ojDh.MTwYGTCHPsiloJDqVIzmRMJd.ZBumPC', 'user', 'Wannabe Hacker', '2025-02-17 06:18:32', 'johver34@gmail.com', 790),
(32, 'Zvck3r', '$2y$10$bAuiahrLd3NW3340Unb90OYnZGGWIslQxvDUDgNxhXC6LNu3q1KZe', 'user', 'Newbie', '2025-02-17 06:29:36', 'zackmadihk01@gmail.com', 25),
(33, 'Jamito', '$2y$10$pA0O2fvE.TtNPqR3tSug.OjlN6V.A4NDclUMBJTXC8KpNBjuUkoJm', 'user', 'Newbie', '2025-02-17 06:31:51', 'jamitojames57@gmail.com', 0),
(34, 'MarkZuckerberg', '$2y$10$KdGLsjLruEOH1CrA6d86de0zTX0EqhhM3RW0AZfN4pVFa.Ch/Pfyq', 'user', 'Newbie', '2025-02-17 06:52:53', 'markzuckerberg@gmail.com', 25),
(35, 'Jash', '$2y$10$BNetgcHEjAIA6Gn5Kt9c9umc6NHgJjrkaNMdbgeX2LCcnP0GYVXHm', 'user', 'Newbie', '2025-02-17 07:24:38', 'jeckmanuel.personal@gmail.com', 0),
(36, 'KIRABEL', '$2y$10$KV9JSb7B5LFGnHT5iXwEHekxq/WKxTYfAFBcCBcrJUK.CXKF5bSbC', 'user', 'Newbie', '2025-02-17 07:26:00', 'Kira123@gmail.com', 0),
(37, 'Amazon', '$2y$10$mHbvvq3vypka4jMnilVF.u9ps.Eex/Y93MLhMV.EpBh70rJ/MDgnm', 'user', 'Newbie', '2025-02-17 07:37:18', 'jcarlamazon@gmail.com', 0),
(38, 'CAPSLOCKED', '$2y$10$psTaCTLYMxaCsLXJtyp4rOyc34VVujpqJzLyNxhsJVgdDmEgjjO7e', 'user', 'Wannabe Hacker', '2025-02-17 07:38:54', 'jltc0912@gmail.com', 740),
(39, 'Hjon', '$2y$10$awvUCdnYzrIanfbhs7QhvupXfcoOLjqtM//MbqDg5AcMZwwoDfNHa', 'user', 'Script Kiddie', '2025-02-17 07:46:46', 'johnlloyddeloso567@gmail.com', 480),
(40, 'rubeus', '$2y$10$eqK7OhWq/kchjollEZCKSOz/NdUvw7UhY2dglo/NRPbJ7cM.zCFZa', 'user', 'Newbie', '2025-02-17 08:13:15', 'kenethjayrojas08@gmail.com', 0),
(41, 'Christian9311', '$2y$10$yQqfJCcXofmPFgdhjX643upfB0oETXj4hT2k1WPBevFL9d8xxHLmy', 'user', 'Wannabe Hacker', '2025-02-17 09:11:00', 'ramizoyt@gmail.com', 790),
(42, 'khenn', '$2y$10$d0pmNLU/M8y9lszZL4p5uOkAgI9jfLgozo3BqPG/abbRsi4bqYxZ.', 'user', 'Newbie', '2025-02-17 10:09:47', '', 0),
(43, 'FrancisD', '$2y$10$rD0u9pUds8PLC3hqcV4Oge.yUTnTJjHbkBfmMF8AD0i2EJMana4D.', 'user', 'Wannabe Hacker', '2025-02-17 10:11:16', 'fcanoy41@gmail.com', 510),
(44, 'khennlomoloy', '$2y$10$wURujUG1Eqf3nMJFHIw.beaKN9.PSlv03W.WIS0I1daRpNIADz9ou', 'user', 'Newbie', '2025-02-17 10:11:57', 'khennlomoloy@example.com', 10),
(45, 'astra', '$2y$10$U/tg2Do0icx2mXINqCFp7.vSagcJjapoKY2tKAJUNjUeIjo0sDqTi', 'user', 'Newbie', '2025-02-17 11:03:47', 'jasangel8306@gmail.com', 50),
(46, 'quiros', '$2y$10$IVMrgsLou2wBmdHkrRvN1uPE.nxU.yEvqi95J5cd/xA7/bxw3Yg3i', 'moderator', 'Newbie', '2025-02-17 11:06:19', 'vodatankquiros@gmail.com', 0),
(47, 'Mitnick', '$2y$10$3ALObKaFXHEqFQEf78u4.eZkxFNtNRrnVkpG1KshYheDrX3BYtx/C', 'moderator', 'Script Kiddie', '2025-02-17 11:15:01', 'iandavelemera@gmail.com', 15),
(48, 'Just', '$2y$10$S6KQc1aVpkaKK4XjxBvvNeyL83JyPZukWA0EnOVthasksr0VK30Ia', 'user', 'Newbie', '2025-02-17 12:13:37', 'Justinebongcawil48@gmail.com', 0),
(49, 'M4tr1x', '$2y$10$bWN0p3TEpBuIPJCY3VnVO.wMN6MVsnieelbNgjlBiUKkIrHHVn/o6', 'user', 'Script Kiddie', '2025-02-17 17:22:40', 'gipemi2243@btcours.com', 435),
(50, 'D4yN4Ta', '$2y$10$6P5JapmaS2h1VCVkfN2OrOhOtMegqoidwcWGZldm4HVri0l6fbfWa', 'user', 'Newbie', '2025-02-18 06:44:43', 'dnt@gmail.com', 155),
(51, 'mcriezzz', '$2y$10$8SmVI8A9bXvAZnC29NYVIuix8/yu7/v/4hT2C3RCvrrykuzn/fZpi', 'user', 'Newbie', '2025-02-18 13:41:42', 'macgalenzoga268@gmail.com', 20),
(52, ' Jjust', '$2y$10$S9a30li3Uev26cJZxf..bOehBPLJ1wFYMSRicnRNvxNQpqixBvZRG', 'user', 'Newbie', '2025-02-19 02:00:53', 'justinebongcawil98@gmail.com', 0),
(53, 'wertyu', '$2y$10$6mXC/U62mvxRc3MoO/IYX.8gwptbtrTnZ2znWGeueXRYgdQnWcOGS', 'user', 'Newbie', '2025-02-19 02:34:12', 'tragicoalfred8@gmail.com', 0),
(54, 'Br4der_M3Trix', '$2y$10$6cezSX5h/lujkeP/fS3sWu8FhEK.NSy.xjyemDXGzITeYXvEs2NrK', 'user', 'Newbie', '2025-02-19 06:04:45', 'brader@gmail.com', 15),
(55, 'datu_adlaw', '$2y$10$r63AsVetvK3FrLiyUhYYdeDItB2jSzcUbjNpjVq0dhKytmzCkwVNC', 'user', 'Wannabe Hacker', '2025-02-20 11:54:57', 'datu@gmail.com', 560),
(56, '@max', '$2y$10$7L1CxXrULTuNmyl4S8jiQ.DlOPn1SAKnY3jgSzNN7U/iMLafnf8q2', 'user', 'Newbie', '2025-02-21 08:16:04', 'eljeancastor57@gmail.com', 0),
(57, 'nobita', '$2y$10$jPXRq5Mkl2vVN.90sgur/OvKnLWLxgU5wWOdO9n0imCPZNZks5aey', 'user', 'Newbie', '2025-02-23 15:11:04', 'nobita@gmail.com', 10),
(58, 'Agi_r4rk0_kol', '$2y$10$2yDc9W6NGFOZQeTqV2k9PO94m7mZhAx4vfbFZCofraQU.gcxUGc3y', 'user', 'Newbie', '2025-02-24 08:12:57', 'agirako@gmail.com', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`attempt_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `challenge_id` (`challenge_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`challenge_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `countdowns`
--
ALTER TABLE `countdowns`
  ADD PRIMARY KEY (`countdown_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `password_recover`
--
ALTER TABLE `password_recover`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `solved`
--
ALTER TABLE `solved`
  ADD PRIMARY KEY (`solved_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `challenge_id` (`challenge_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `attempt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `challenge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `countdowns`
--
ALTER TABLE `countdowns`
  MODIFY `countdown_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_recover`
--
ALTER TABLE `password_recover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `solved`
--
ALTER TABLE `solved`
  MODIFY `solved_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attempts`
--
ALTER TABLE `attempts`
  ADD CONSTRAINT `attempts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `attempts_ibfk_2` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`challenge_id`);

--
-- Constraints for table `challenges`
--
ALTER TABLE `challenges`
  ADD CONSTRAINT `challenges_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
