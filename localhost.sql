-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2019 at 03:35 PM
-- Server version: 10.1.41-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dropsmqx_video-editing`
--
CREATE DATABASE IF NOT EXISTS `dropsmqx_video-editing` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dropsmqx_video-editing`;

-- --------------------------------------------------------

--
-- Table structure for table `createvideo`
--

CREATE TABLE `createvideo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `createvideo`
--

INSERT INTO `createvideo` (`id`, `img`, `image_size`, `description`, `created_at`, `updated_at`) VALUES
(1, 'c1.png', '1.91:1', NULL, '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(2, 'c2.png', '16:9', 'Full Landscape', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(3, 'c3.png', '1:1', 'Square (Instagram and Facebook Feed)', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(4, 'c4.png', '4:5', 'Vertical (Instagram and Facebook Feed)', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(5, 'c5.png', '2:3', 'Vertical (Facebook Only)', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(6, 'c6.png', '1.91:1', 'Full Portrait/Vertical (Stories and Facebook Feed)', '2019-07-02 18:30:00', '2019-07-02 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `customerdetails`
--

CREATE TABLE `customerdetails` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `video_price` varchar(100) NOT NULL,
  `video_image` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `music` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `music_type` varchar(100) NOT NULL,
  `thumbnail_style` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscribe_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `name`, `user_id`, `email`, `password`, `image`, `subscribe_status`, `created_at`, `updated_at`) VALUES
(97, 'web', 'ewq', 'amit', 491, 'mesasell888@gmail.com', '$2y$10$TrwICvHVv5y3TWkBTBw59uxR4EZEJ/P7DlehxqpxONAsdK6JGqp0W', 'ewwew.jpeg', 0, '2019-08-12 12:31:30', '2019-08-12 12:31:30'),
(98, 'Ajmer', 'mora', 'Ajmer', 504, 'jyotish.stit@outlook.com', '$2y$10$/tLCoHyhhY3h9rNKtX3gEe.c25IwLb7JxF9zaG0/tm7EMjHCcp4My', 'ewwew.jpeg', 0, '2019-08-26 14:37:20', '2019-08-26 15:22:59'),
(100, 'Jyotish', 'raj', 'Jyotish', 506, 'kjyotish888@gmail.com', '$2y$10$nDfUnMXApf/dw/pHzo/KF.GH0ipDV4RajJvA.1MM1oRmZROiwkkyq', 'ewwew.jpeg', 0, '2019-08-26 05:14:37', '2019-08-28 16:51:10'),
(101, 'Jyotish', 'raj', 'Jyotish', 512, 'onlinedimand888@gmail.com', '$2y$10$f9/Q6IEXDbxNt3zlgQrdbOCmidFf90q8FsLyrt2LLfKl8d4.O0HfW', 'ewwew.jpeg', 1, '2019-08-28 14:48:12', '2019-08-30 17:48:03'),
(102, 'santosh', 'kumar', 'santosh kumar', 514, 'skchaudhary7073@gmail.com', '$2y$10$nphDpBSf8esg8RLdrS1MWu48C6aQOz1yxhzK4V6byRJdz07oT85O.', 'ewwew.jpeg', 0, '2019-08-29 09:52:04', '2019-08-29 09:52:04'),
(103, 'santosh', 'kumar', 'santosh kumar', 515, 'santoshkumarc51@gmail.com', '$2y$10$zrj9M6/fY7l8HSp1St0uZOo8VJYTfPEG903f5sTyKq/hCDaA5l/XS', 'ewwew.jpeg', 0, '2019-08-29 09:58:10', '2019-08-29 09:58:10'),
(104, 'ashish', 'maurya', 'ashish', 516, 'ashishmaurya644@gmail.com', '$2y$10$hu9cQvdLiwWTIFMq1tOlQu7Lkf63rjpMo5Wtv3/FOqGT6Dc6lLMuC', 'ewwew.jpeg', 0, '2019-08-29 09:59:45', '2019-08-29 09:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_id` int(11) NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `music` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_day` int(100) DEFAULT NULL,
  `music_type` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_link` text COLLATE utf8mb4_unicode_ci,
  `customer_id` int(11) NOT NULL,
  `video_id` int(11) DEFAULT NULL,
  `is_assigned` int(11) DEFAULT NULL,
  `subscribe` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Unsubscribe` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `order_assign_time` timestamp NULL DEFAULT NULL,
  `employe_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_counter` tinyint(1) NOT NULL DEFAULT '0',
  `customer_comment` text COLLATE utf8mb4_unicode_ci,
  `thumbnail_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscribe_status` tinyint(100) NOT NULL DEFAULT '0',
  `change_stop_scroll` tinyint(1) NOT NULL DEFAULT '0',
  `change_thumb` tinyint(1) NOT NULL DEFAULT '0',
  `video_counter` tinyint(1) DEFAULT NULL,
  `video_upload_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`id`, `image_id`, `gender`, `music`, `delivery_day`, `music_type`, `logo`, `created_at`, `updated_at`, `product_link`, `customer_id`, `video_id`, `is_assigned`, `subscribe`, `Unsubscribe`, `status`, `order_assign_time`, `employe_video`, `order_counter`, `customer_comment`, `thumbnail_video`, `subscribe_status`, `change_stop_scroll`, `change_thumb`, `video_counter`, `video_upload_time`) VALUES
(349, 1, '1', '1', NULL, 'img/order_music/van.mp3', 'img/order_logo/Suntek.GIF', '2019-08-26 17:16:31', '2019-08-27 12:15:53', 'h', 506, 1, 499, NULL, 'e $26.5', 1, '2019-09-02 17:44:16', '/img/video/videoplayback.mp45d63e2dff11f8', 1, NULL, 'undefined', 0, 1, 0, 1, '2019-08-30 17:47:12'),
(350, 1, '1', '1', NULL, NULL, NULL, '2019-08-27 09:21:49', '2019-08-27 09:21:49', 'iuopo', 499, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, NULL, NULL),
(351, 1, '1', '1', NULL, 'img/order_music/pot.mp3', 'img/order_logo/1.jpg', '2019-08-27 10:20:12', '2019-08-29 12:49:56', 'jj', 506, 1, 518, '26.50', NULL, 1, '2019-09-03 12:33:20', '/img/video/5 Super Fast Animation Tips in 30 Seconds.mp45d6791b49153a', 1, NULL, 'undefined', 0, 0, 0, 1, '2019-09-02 12:49:56'),
(352, 1, '1', '1', NULL, 'img/order_music/van.mp3', 'img/order_logo/2.jpg', '2019-08-27 10:36:01', '2019-08-27 12:11:15', 'jj', 506, 1, 499, '26.50', NULL, 1, '2019-09-03 10:39:14', '/img/video/videoplayback.mp45d64d0312b321', 1, NULL, 'undefined', 0, 1, 1, 1, '2019-08-31 10:39:45'),
(353, 1, '1', '1', NULL, 'img/order_music/pot (2).mp3', 'img/order_logo/2.jpg', '2019-08-27 12:00:51', '2019-08-27 12:01:04', 'hgjm', 499, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'undefined', 0, 0, 0, NULL, NULL),
(354, 1, '1', '1', NULL, NULL, NULL, '2019-08-27 12:06:40', '2019-08-27 12:06:40', 'jty', 387, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, NULL, NULL),
(355, 1, '1', '1', NULL, 'img/order_music/a (2).mp3', 'img/order_logo/2.jpg', '2019-08-27 12:06:40', '2019-08-27 12:06:56', 'jty', 387, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'undefined', 0, 0, 0, NULL, NULL),
(356, 1, '2', '1', NULL, 'img/order_music/pot.mp3', 'img/order_logo/123.jpeg', '2019-08-27 12:23:43', '2019-08-27 14:21:38', 'hj', 506, 3, 499, '26.50', NULL, 1, '2019-09-03 14:21:38', NULL, 1, NULL, 'undefined', 0, 0, 0, NULL, NULL),
(357, 1, '1', '1', NULL, 'img/order_music/van.mp3', 'img/order_logo/Suntek.GIF', '2019-08-27 13:05:06', '2019-08-29 09:52:02', 'ht5yju', 506, 3, 513, '26.50', NULL, 1, '2019-09-03 09:52:02', NULL, 1, NULL, 'undefined', 0, 0, 0, NULL, NULL),
(358, 1, '1', '2', NULL, 'img/order_music/van.mp3', 'img/order_logo/123.jpeg', '2019-08-27 14:02:58', '2019-08-27 14:03:14', 'u', 499, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'undefined', 0, 0, 0, NULL, NULL),
(359, 1, '2', '2', 2, 'img/order_music/pot.mp3', 'img/order_logo/Suntek.GIF', '2019-08-27 14:29:24', '2019-08-27 14:58:35', 'u', 506, 1, 499, '26.50', NULL, 1, '2019-08-29 14:58:35', '/img/video/videoplayback.mp45d6506f021ff5', 1, NULL, 'undefined', 0, 1, 1, 1, '2019-08-31 14:33:20'),
(360, 1, '1', '1', 3, 'img/order_music/pot.mp3', 'img/order_logo/man-user.png', '2019-08-27 15:01:45', '2019-08-27 17:17:15', 'bnm', 506, 1, 499, '26.50', NULL, 1, '2019-08-30 17:17:15', NULL, 1, NULL, 'undefined', 0, 0, 0, NULL, NULL),
(361, 3, '1', '1', NULL, 'img/order_music/pot.mp3', 'img/order_logo/2.jpg', '2019-08-28 15:24:12', '2019-08-28 15:33:46', 'ghjk', 506, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '3', 0, 0, 0, NULL, NULL),
(362, 1, '1', '1', NULL, 'img/order_music/van.mp3', 'img/order_logo/Suntek.GIF', '2019-08-28 16:41:40', '2019-08-28 16:44:58', 'santoshkumari.com', 506, 1, NULL, '45.99', NULL, 1, NULL, NULL, 0, NULL, '4', 0, 0, 0, NULL, NULL),
(363, 1, '1', '1', NULL, NULL, NULL, '2019-08-28 16:41:42', '2019-08-28 16:41:42', 'santoshkumari.com', 506, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, NULL, NULL),
(364, 1, '3', '2', NULL, 'img/order_music/van.mp3', 'img/order_logo/2.jpg', '2019-08-28 16:47:26', '2019-09-02 08:54:45', 'b', 506, 1, 518, NULL, 'e $26.5', 1, '2019-09-09 08:54:45', NULL, 1, NULL, '4', 0, 0, 0, NULL, NULL),
(365, 1, '1', '1', NULL, NULL, NULL, '2019-08-29 08:50:12', '2019-08-29 08:50:12', 'online.com', 512, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, NULL, NULL),
(366, 1, '1', '1', NULL, 'img/order_music/pot.mp3', 'img/order_logo/1.jpg', '2019-08-29 08:58:40', '2019-08-29 09:08:59', 'online', 512, 1, 513, NULL, 'e $26.5', 1, '2019-09-05 09:08:59', NULL, 1, NULL, '4', 0, 0, 0, NULL, NULL),
(367, 1, '1', '1', NULL, 'img/order_music/pot.mp3', 'img/order_logo/2.jpg', '2019-08-29 09:05:27', '2019-08-29 09:05:49', 'jyu', 512, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '3', 0, 0, 0, NULL, NULL),
(368, 1, '1', '1', NULL, 'img/order_music/van.mp3', 'img/order_logo/2.jpg', '2019-08-29 09:12:51', '2019-08-29 11:12:06', 'comes', 512, 1, 513, '26.50', NULL, 1, '2019-09-05 09:15:26', '/img/video/5 Super Fast Animation Tips in 30 Seconds.mp45d677ac6dab20', 1, NULL, '4', 0, 0, 0, 1, '2019-09-02 11:12:06'),
(369, 1, '1', '1', NULL, 'img/order_music/van.mp3', 'img/order_logo/2.jpg', '2019-08-29 09:41:27', '2019-08-29 09:41:52', 'japann', 513, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '4', 0, 0, 0, NULL, NULL),
(370, 1, '1', '1', NULL, 'img/order_music/a (2).mp3', 'img/order_logo/2.jpg', '2019-08-29 09:46:44', '2019-08-29 09:47:06', 'kjhgc', 512, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '4', 0, 0, 0, NULL, NULL),
(371, 1, '2', '1', NULL, 'img/order_music/pot.mp3', 'img/order_logo/123.jpeg', '2019-08-29 09:48:13', '2019-08-29 11:18:40', 'n h', 512, 1, 513, '26.50', NULL, 1, '2019-09-05 09:50:57', '/img/video/30 sec animation scene.mp45d677bdf61b71', 1, NULL, '4', 0, 1, 1, 1, '2019-09-02 11:16:47'),
(372, 2, '1', '1', NULL, 'img/order_music/pot.mp3', 'img/order_logo/2.jpg', '2019-08-29 10:01:57', '2019-08-29 10:02:18', 'sgdh', 516, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '3', 0, 0, 0, NULL, NULL),
(373, 1, '1', '1', NULL, 'img/order_music/van.mp3', 'img/order_logo/2.jpg', '2019-08-29 10:05:53', '2019-08-29 10:06:12', 'hju', 512, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '3', 0, 0, 0, NULL, NULL),
(374, 1, '2', '1', NULL, 'img/order_music/pot.mp3', 'img/order_logo/Suntek.GIF', '2019-08-29 10:14:49', '2019-08-29 10:16:01', 'kui', 512, 1, NULL, '26.50', NULL, NULL, NULL, NULL, 0, NULL, '3', 0, 0, 0, NULL, NULL),
(375, 1, '1', '1', NULL, 'img/order_music/pot (2).mp3', 'img/order_logo/8.jpg', '2019-08-29 10:22:10', '2019-08-29 10:22:39', 'ht', 516, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '3', 0, 0, 0, NULL, NULL),
(376, 1, '1', '1', NULL, NULL, NULL, '2019-08-29 10:35:37', '2019-08-29 10:35:37', 'f', 512, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, NULL, NULL),
(377, 1, '1', '1', NULL, 'img/order_music/pot (2).mp3', 'img/order_logo/Suntek.GIF', '2019-08-29 10:38:11', '2019-08-29 10:38:30', 'gh', 512, 1, NULL, '26.50', NULL, NULL, NULL, NULL, 0, NULL, '3', 0, 0, 0, NULL, NULL),
(378, 3, '1', '1', NULL, 'img/order_music/a (2).mp3', 'img/order_logo/images.jpg', '2019-08-29 10:38:35', '2019-08-29 10:39:15', 'abc123', 512, 1, NULL, '26.50', NULL, NULL, NULL, NULL, 0, NULL, '4', 0, 0, 0, NULL, NULL),
(379, 2, '1', '1', 4, 'img/order_music/pot (2).mp3', 'img/order_logo/1564658708.jpeg', '2019-08-29 10:42:28', '2019-08-29 10:42:52', 'sdfghg', 512, 1, NULL, '26.50', NULL, NULL, NULL, NULL, 0, NULL, '3', 0, 0, 0, NULL, NULL),
(380, 3, '1', '1', 5, 'img/order_music/a (2).mp3', 'img/order_logo/7.jpg', '2019-08-29 10:46:44', '2019-08-29 11:14:55', 'sadf', 512, 1, 513, '26.50', NULL, 1, '2019-09-03 10:48:13', '/img/video/A Cartoon in 30 Seconds.mp45d677b6f66ac7', 1, NULL, '3', 0, 0, 0, 1, '2019-09-02 11:14:55'),
(381, 3, '1', '1', 2, 'img/order_music/pot (2).mp3', 'img/order_logo/pexels-photo.jpg', '2019-08-29 14:23:39', '2019-08-29 16:37:25', 'sdfsfd', 512, 1, 518, '26.50', NULL, 1, '2019-08-31 14:25:17', '/img/video/Lines.mp45d67a88a5de52', 1, NULL, '3', 0, 0, 0, 1, '2019-09-02 14:27:22'),
(382, 1, '2', '1', 6, 'img/order_music/van.mp3', 'img/order_logo/1565267955.png', '2019-08-30 09:07:24', '2019-08-30 09:20:01', 'y', 512, 3, 518, '26.50', NULL, 1, '2019-09-05 09:19:03', '/img/video/30 sec animation scene.mp45d68b20187f7a', 1, NULL, '3', 0, 0, 0, 1, '2019-09-03 09:20:01'),
(383, 1, '3', '2', 4, 'img/order_music/pot.mp3', 'img/order_logo/1565259149.jpg', '2019-08-30 09:27:21', '2019-08-30 09:29:55', 'j', 512, 1, 518, '45.99', NULL, 1, '2019-09-04 09:29:55', NULL, 1, NULL, '4', 1, 1, 0, 1, NULL),
(384, 2, '1', '1', 2, 'img/order_music/a1 (2).mp3', 'img/order_logo/jacob.png', '2019-08-30 09:52:40', '2019-08-30 09:53:36', 'sdsd', 512, 1, NULL, '45.99', NULL, 1, NULL, NULL, 0, NULL, '3', 0, 0, 0, NULL, NULL),
(385, 3, '1', '1', 1, NULL, NULL, '2019-08-30 13:42:08', '2019-08-30 13:42:08', 'sdsd', 512, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, NULL, NULL),
(386, 1, '1', '1', 3, NULL, NULL, '2019-08-30 17:34:19', '2019-08-30 17:34:19', 't', 512, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, NULL, NULL),
(387, 1, '1', '1', 3, NULL, NULL, '2019-08-30 17:40:45', '2019-08-30 17:40:45', 'e', 512, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, NULL, NULL),
(388, 1, '1', '1', 3, 'img/order_music/pot (2).mp3', 'img/order_logo/123.jpeg', '2019-08-30 17:40:45', '2019-08-30 17:43:17', 'e', 512, 3, NULL, '45.99', NULL, 1, NULL, NULL, 0, NULL, '76', 0, 0, 0, NULL, NULL),
(389, 4, '1', '1', 3, 'img/order_music/a (2).mp3', 'img/order_logo/123.jpeg', '2019-08-30 17:44:10', '2019-08-30 17:46:02', 'sfdg', 512, 3, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '75', 0, 0, 0, NULL, NULL),
(390, 2, '3', '2', 5, 'img/order_music/pot (2).mp3', 'img/order_logo/2.jpg', '2019-08-30 17:44:55', '2019-08-30 17:46:05', 'vd', 512, 3, NULL, '45.99', NULL, 1, NULL, NULL, 0, NULL, '75', 0, 0, 0, NULL, NULL),
(391, 1, '3', '1', 5, 'img/order_music/van.mp3', 'img/order_logo/2.jpg', '2019-08-30 17:47:09', '2019-08-30 17:47:40', 'gh', 512, 3, NULL, NULL, 'e $26.5', NULL, NULL, NULL, 0, NULL, '76', 0, 0, 0, NULL, NULL),
(392, 1, '1', '2', 4, 'img/order_music/pot.mp3', 'img/order_logo/2.jpg', '2019-08-30 17:48:26', '2019-08-30 17:48:58', 'yh', 512, 3, NULL, '26.50', NULL, 1, NULL, NULL, 0, NULL, '76', 0, 0, 0, NULL, NULL),
(393, 1, '1', '1', 3, 'img/order_music/a1 (2).mp3', 'img/order_logo/1.jpg', '2019-09-02 08:51:42', '2019-09-02 08:58:34', 'sdfdg', 512, 3, 518, '26.50', NULL, 1, '2019-09-05 08:56:39', '/img/video/Lines.mp45d6ca17a0ba44', 1, NULL, '76', 0, 0, 0, 1, '2019-09-06 08:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE `employes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_rate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_rate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`id`, `name`, `user_id`, `created_at`, `updated_at`, `email`, `password`, `contact`, `thumbnail_rate`, `video_rate`, `last_login`, `status`) VALUES
(185, 'rajkumar', 499, '2019-08-19 09:55:33', '2019-08-29 09:38:20', 'jyotishjndghjdedq@gmail.com', '$2y$10$FPzF4EjfXUIwikI7iMMMqeCGH5WThsanju4rBoGkAXqTAZNWLwSdK', '6200086078', '', '', '2019-08-19 05:55:33', 1),
(186, 'ramkumar', 500, '2019-08-19 10:30:19', '2019-08-19 10:30:19', 'jyotishraj1999@gmail.com', '$2y$10$ova/TixaixvW9M95.QmcruH4QMUbF3gtKvs/3qu0UHN/pHlhChi8.', '6200086078', '', '', '2019-08-19 06:30:19', 1),
(191, 'mohan', 508, '2019-08-28 11:10:58', '2019-08-28 11:10:58', 'mohan@gmail.com', '$2y$10$scJH5oPOOxwpXzvwtLJJauf8gGugD19SKUV09WU4BBybiZV9/aE1O', '1234567890', '', '', '2019-08-28 07:10:58', 1),
(193, 'rohan', 510, '2019-08-28 11:24:24', '2019-08-28 11:24:24', 'rohan@gmail.com', '$2y$10$xcQHsLaI2HgZNTA7Aqafte93rhLjZ5AHHdIRWRZlz3bHBHAX6mxUS', '987346', '', '', '2019-08-28 07:24:24', 1),
(194, 'aa', 511, '2019-08-28 11:27:18', '2019-08-28 11:31:20', 'io', '$2y$10$wBkNjGYbCIIpDZgacUmp4eBy6cmR/GcQipKclubaNhqEH7PwXeJcG', '5202532536', '', '', '2019-08-28 07:27:18', 1),
(196, 'Jyotish raj', 517, '2019-08-29 12:05:16', '2019-08-29 12:05:16', 'jyotishk746@gmail.com', '$2y$10$Lq6kGWA1CaEm3Oqq38Dp4OviXugQspGO10.LmXc6fScR6XJhWibt.', '6200086078', '', '', '2019-08-29 08:05:16', 1),
(197, 'Jyotish raj', 518, '2019-08-29 12:06:06', '2019-08-29 12:06:06', 'jyotish.stit@outlook.com', '$2y$10$uw0bv32lKFE3V0FW11q9t.es/V4XQH.BLv.dc/KxAdFmUVBjPOHZ6', '6200086078', '', '', '2019-08-29 08:06:06', 1),
(198, 'aa', 519, '2019-08-30 16:08:42', '2019-08-30 17:06:10', 'aa@gmail.com', '$2y$10$q9thjtFsqd4sDFTokZ81cOVum0HYVgdtVTLvo9Fd4wnMulz5DgLla', '13234', '11', '44', '2019-08-30 12:08:42', 1),
(199, 'yugyu', 520, '2019-09-04 10:32:25', '2019-09-04 10:32:25', 'uyu@gmail.com', '$2y$10$gcMvDpg02SutqEbu.bGHCe.dUywtusjHFsIiniv/gbSxijTtUzX26', '979797979799', '88', '88', '2019-09-04 06:32:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Male', NULL, NULL),
(2, 'Female', NULL, NULL),
(3, 'Both', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `title`, `price`, `paid`, `created_at`, `updated_at`) VALUES
(38, 'Order #13 Invoice', 45, 1, '2019-08-30 17:48:05', '2019-08-30 17:48:05'),
(37, 'Order #12 Invoice', 45, 1, '2019-08-29 09:00:06', '2019-08-29 09:00:06'),
(36, 'Order #11 Invoice', 45, 1, '2019-08-28 16:51:12', '2019-08-28 16:51:12'),
(35, 'Order #10 Invoice', 45, 1, '2019-08-26 17:17:47', '2019-08-26 17:17:47'),
(34, 'Order #9 Invoice', 45, 1, '2019-08-26 16:47:26', '2019-08-26 16:47:26'),
(33, 'Order #8 Invoice', 45, 1, '2019-08-26 16:43:12', '2019-08-26 16:43:12'),
(32, 'Order #7 Invoice', 45, 1, '2019-08-21 14:38:54', '2019-08-21 14:38:54'),
(31, 'Order #6 Invoice', 45, 1, '2019-08-19 09:12:52', '2019-08-19 09:12:52'),
(30, 'Order #5 Invoice', 45, 1, '2019-08-13 10:06:45', '2019-08-13 10:06:45'),
(29, 'Order #4 Invoice', 45, 1, '2019-08-12 14:26:47', '2019-08-12 14:26:47'),
(28, 'Order #3 Invoice', 45, 1, '2019-08-12 12:08:40', '2019-08-12 12:08:40'),
(27, 'Order #2 Invoice', 45, 1, '2019-08-12 11:52:07', '2019-08-12 11:52:07'),
(26, 'Order #1 Invoice', 45, 1, '2019-08-12 11:39:56', '2019-08-12 11:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `ipn_status`
--

CREATE TABLE `ipn_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` double NOT NULL,
  `item_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `invoice_id`, `item_name`, `item_price`, `item_qty`, `created_at`, `updated_at`) VALUES
(38, 38, 'Monthly Subscription  #13', 45, 1, '2019-08-30 17:48:05', '2019-08-30 17:48:05'),
(37, 37, 'Monthly Subscription  #12', 45, 1, '2019-08-29 09:00:06', '2019-08-29 09:00:06'),
(36, 36, 'Monthly Subscription  #11', 45, 1, '2019-08-28 16:51:12', '2019-08-28 16:51:12'),
(35, 35, 'Monthly Subscription  #10', 45, 1, '2019-08-26 17:17:47', '2019-08-26 17:17:47'),
(34, 34, 'Monthly Subscription  #9', 45, 1, '2019-08-26 16:47:26', '2019-08-26 16:47:26'),
(33, 33, 'Monthly Subscription  #8', 45, 1, '2019-08-26 16:43:12', '2019-08-26 16:43:12'),
(32, 32, 'Monthly Subscription  #7', 45, 1, '2019-08-21 14:38:54', '2019-08-21 14:38:54'),
(31, 31, 'Monthly Subscription  #6', 45, 1, '2019-08-19 09:12:52', '2019-08-19 09:12:52'),
(30, 30, 'Monthly Subscription  #5', 45, 1, '2019-08-13 10:06:45', '2019-08-13 10:06:45'),
(29, 29, 'Monthly Subscription  #4', 45, 1, '2019-08-12 14:26:47', '2019-08-12 14:26:47'),
(28, 28, 'Monthly Subscription  #3', 45, 1, '2019-08-12 12:08:40', '2019-08-12 12:08:40'),
(27, 27, 'Monthly Subscription  #2', 45, 1, '2019-08-12 11:52:07', '2019-08-12 11:52:07'),
(26, 26, 'Monthly Subscription  #1', 45, 1, '2019-08-12 11:39:56', '2019-08-12 11:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `masters`
--

CREATE TABLE `masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masters`
--

INSERT INTO `masters` (`id`, `img`, `image_size`, `description`, `created_at`, `updated_at`) VALUES
(1, 'c1.png', '1.91:1', 'Full Landscape', '2019-07-03 07:00:00', '2019-07-03 07:00:00'),
(2, 'c2.png', '16:9', 'Full Landscape', '2019-07-03 07:00:00', '2019-08-02 17:12:15'),
(3, 'c3.png', '1:1', 'Square (Instagram and Facebook Feed) ', '2019-07-03 07:00:00', '2019-08-02 17:15:02'),
(4, 'c4.png', '4:5', 'Vertical (Instagram and Facebook Feed)', '2019-07-03 07:00:00', '2019-07-03 07:00:00'),
(9, 'c6.png', '1.91:1', 'Full Portrait/Vertical (Stories and Facebook Feed)', NULL, NULL),
(26, 'c5.png', '2:3', 'Vertical (Facebook Only)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `masterthumnails`
--

CREATE TABLE `masterthumnails` (
  `id` int(11) NOT NULL,
  `thum_video` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masterthumnails`
--

INSERT INTO `masterthumnails` (`id`, `thum_video`, `created_at`, `updated_at`) VALUES
(80, '/img/thumvideo/videoplayback (1).mp45d6921264a957', '2019-08-30 17:14:14', '2019-08-30 17:14:14'),
(79, '/img/thumvideo/30 sec animation scene.mp45d69210b3c2b9', '2019-08-30 17:13:47', '2019-08-30 17:13:47'),
(78, '/img/thumvideo/A Cartoon in 30 Seconds.mp45d6920e343255', '2019-08-30 17:13:07', '2019-08-30 17:13:07'),
(75, '/img/thumvideo/videoplayback (1).mp45d6916ecefff6', '2019-08-30 16:30:36', '2019-08-30 16:30:36'),
(76, '/img/thumvideo/5 Super Fast Animation Tips in 30 Seconds.mp45d69208357151', '2019-08-30 17:11:31', '2019-08-30 17:11:31'),
(77, '/img/thumvideo/20-Seconds Animation.mp45d69209d66232', '2019-08-30 17:11:57', '2019-08-30 17:11:57'),
(74, '/img/thumvideo/videoplayback.mp45d69164a9b93c', '2019-08-30 16:27:54', '2019-08-30 16:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2019_06_28_112725_create_roles_table', 1),
(13, '2019_06_28_125902_create_roles_table', 3),
(47, '2014_10_12_000000_create_users_table', 4),
(48, '2014_10_12_100000_create_password_resets_table', 4),
(49, '2019_06_27_061718_add_first_name_to_users', 4),
(50, '2019_06_27_061742_add_last_name_to_users', 4),
(51, '2019_06_28_125732_create_employes_table', 4),
(52, '2019_06_29_111354_add_coloumn_to_employes', 4),
(53, '2019_06_29_112414_create_customers_table', 4),
(54, '2019_06_29_120237_add_role_id_to_users', 4),
(55, '2019_07_02_075319_add_user_id_to_employes', 4),
(56, '2019_07_03_123442_create_order_details_table', 4),
(57, '2019_07_04_051833_create_customer_orders_table', 4),
(58, '2019_07_05_094919_create_gender_table', 4),
(59, '2019_07_05_102517_create_music_table', 4),
(60, '2019_07_05_130751_create_videos_table', 4),
(61, '2019_07_09_065125_add_product_link_to_customer_orders', 4),
(62, '2019_07_09_071417_update_column_to_customer_orders', 4),
(63, '2019_07_09_073836_add_customer_id_to_customer_orders', 4),
(64, '2019_07_09_082653_add_video_id_to_customer_orders', 4),
(65, '2019_07_10_053457_add_isassigned_to_customer_orders', 4),
(66, '2019_07_10_054924_update_customer_orders_table', 5),
(67, '2019_07_10_055317_drop_is_assigned_to_customer_orders', 6),
(68, '2019_07_10_055446_add_isassigned_to_customer_orders', 7),
(69, '2019_07_02_100918_add_role_id_to_users', 8),
(70, '2016_10_31_160156_create_invoices_table', 9),
(71, '2016_10_31_160339_create_items_table', 9),
(72, '2018_08_21_161348_create_ipn_status_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `music` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `music`, `created_at`, `updated_at`) VALUES
(1, 'Yes, I TRUST DROPSHIPMEDIA', NULL, NULL),
(2, 'No, I WANT TO UPLOAD MY OWN', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nonsubscribemembers`
--

CREATE TABLE `nonsubscribemembers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nonsubscribemembers`
--

INSERT INTO `nonsubscribemembers` (`id`, `video_type`, `created_at`, `updated_at`) VALUES
(1, 'Additional for Thumbnails', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(2, 'Free Script/Text', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(3, 'Additional for Video Orientations', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(4, 'Free Royal Music', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(5, '7 Day Delivery', '2019-07-02 18:30:00', '2019-07-02 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `nonsub_member_video_variation`
--

CREATE TABLE `nonsub_member_video_variation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nonsub_member_video_variation`
--

INSERT INTO `nonsub_member_video_variation` (`id`, `amount`, `video_type`, `created_at`, `updated_at`) VALUES
(1, '$45.99 / 1 Video (Free)', 'Additional for Thumbnails', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(2, '$91.98 / 2 Video (Free)', 'Free Script/Text', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(3, '$137.97 / 3 Video (Free)', 'Additional for Video Orientations', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(4, '$183.96 / 4 Video', 'Free Royal Music', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(5, '$229.95 / 5 Video', '7 Day Delivery', '2019-07-03 18:30:00', '2019-07-03 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `service_id`, `transaction_id`, `amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(384, 506, 322, '55K75290XV392764D', '45.99', 1, '2019-08-28 12:46:18', '2019-08-28 16:46:18'),
(383, 506, 321, '68701447', '26.50', 1, '2019-08-28 16:42:24', '2019-08-28 16:42:24'),
(382, 506, 320, '95167359', '26.50', 1, '2019-08-27 15:02:24', '2019-08-27 15:02:24'),
(381, 506, 319, '89512996', '26.50', 1, '2019-08-27 14:29:44', '2019-08-27 14:29:44'),
(380, 506, 318, '98535002', '26.50', 1, '2019-08-27 13:58:04', '2019-08-27 13:58:04'),
(379, 506, 317, '20912893', '26.50', 1, '2019-08-27 12:24:07', '2019-08-27 12:24:07'),
(378, 506, 316, '43171004', '26.50', 1, '2019-08-27 10:37:18', '2019-08-27 10:37:18'),
(377, 506, 315, '76296992', '26.50', 1, '2019-08-27 10:35:33', '2019-08-27 10:35:33'),
(376, 506, 314, '76296992', '26.50', 1, '2019-08-27 10:25:58', '2019-08-27 10:25:58'),
(375, 506, 313, '58327870', 'e $26.5', 1, '2019-08-26 17:17:00', '2019-08-26 17:17:00'),
(374, 488, 312, '8F800635EM874315B', '45.99', 1, '2019-08-26 12:56:37', '2019-08-26 16:56:37'),
(373, 488, 311, '3DD91720XY054002D', '26.50', 1, '2019-08-26 12:49:57', '2019-08-26 16:49:57'),
(372, 488, 310, '39406070', 'e $26.5', 1, '2019-08-26 16:46:21', '2019-08-26 16:46:21'),
(371, 488, 309, '31062820', 'e $26.5', 1, '2019-08-26 16:45:41', '2019-08-26 16:45:41'),
(370, 488, 308, '90634174', 'e $26.5', 1, '2019-08-26 16:42:16', '2019-08-26 16:42:16'),
(369, 488, 307, '29479735', 'e $26.5', 1, '2019-08-26 16:36:44', '2019-08-26 16:36:44'),
(368, 488, 306, '0DC76440NE9326827', '45.99', 1, '2019-08-26 12:40:05', '2019-08-26 16:40:05'),
(367, 488, 305, '61719836', 'e $26.5', 1, '2019-08-26 16:28:10', '2019-08-26 16:28:10'),
(366, 488, 304, '30091979', '26.50', 1, '2019-08-26 16:12:37', '2019-08-26 16:12:37'),
(365, 488, 303, '55585616', '26.50', 1, '2019-08-26 15:47:17', '2019-08-26 15:47:17'),
(364, 504, 302, '90277059', '45.99', 1, '2019-08-26 15:29:27', '2019-08-26 15:29:27'),
(363, 488, 301, '97701332', '26.50', 1, '2019-08-26 15:27:24', '2019-08-26 15:27:24'),
(362, 504, 300, '53682708', '45.99', 1, '2019-08-26 15:27:22', '2019-08-26 15:27:22'),
(361, 504, 299, '76235950', 'e $26.5', 1, '2019-08-26 15:22:59', '2019-08-26 15:22:59'),
(360, 504, 298, '10234677', '45.99', 1, '2019-08-26 15:21:52', '2019-08-26 15:21:52'),
(359, 488, 297, '36022044', '26.50', 1, '2019-08-26 15:21:02', '2019-08-26 15:21:02'),
(358, 488, 296, '80259963', '26.50', 1, '2019-08-26 15:20:34', '2019-08-26 15:20:34'),
(357, 504, 295, '82139420', 'e $26.5', 1, '2019-08-26 15:14:32', '2019-08-26 15:14:32'),
(356, 504, 294, '85846513', '26.50', 1, '2019-08-26 15:14:22', '2019-08-26 15:14:22'),
(355, 504, 293, '87325215', '45.99', 1, '2019-08-26 15:14:13', '2019-08-26 15:14:13'),
(354, 504, 292, '15911342', '45.99', 1, '2019-08-26 15:10:42', '2019-08-26 15:10:42'),
(353, 504, 291, '43757777', '45.99', 1, '2019-08-26 15:10:36', '2019-08-26 15:10:36'),
(352, 504, 290, '35689414', 'e $26.5', 1, '2019-08-26 15:09:19', '2019-08-26 15:09:19'),
(351, 504, 289, '94749732', 'e $26.5', 1, '2019-08-26 15:03:34', '2019-08-26 15:03:34'),
(350, 504, 288, '48376832', 'e $26.5', 1, '2019-08-26 14:59:27', '2019-08-26 14:59:27'),
(349, 504, 287, '48376832', 'e $26.5', 1, '2019-08-26 14:59:17', '2019-08-26 14:59:17'),
(348, 504, 286, '48376832', 'e $26.5', 1, '2019-08-26 14:59:16', '2019-08-26 14:59:16'),
(347, 504, 285, '95267968', '45.99', 1, '2019-08-26 14:58:54', '2019-08-26 14:58:54'),
(346, 504, 284, '58168404', '45.99', 1, '2019-08-26 14:58:43', '2019-08-26 14:58:43'),
(345, 504, 283, '58168404', '45.99', 1, '2019-08-26 14:58:41', '2019-08-26 14:58:41'),
(344, 504, 282, '15570432', '45.99', 1, '2019-08-26 14:58:20', '2019-08-26 14:58:20'),
(343, 504, 281, '79363432', '45.99', 1, '2019-08-26 14:58:03', '2019-08-26 14:58:03'),
(342, 504, 280, '61366858', '45.99', 1, '2019-08-26 14:57:47', '2019-08-26 14:57:47'),
(341, 504, 279, '82846866', '45.99', 1, '2019-08-26 14:57:32', '2019-08-26 14:57:32'),
(340, 488, 278, '16784952', '26.50', 1, '2019-08-26 14:27:12', '2019-08-26 14:27:12'),
(339, 488, 277, '18040164', '26.50', 1, '2019-08-26 14:27:00', '2019-08-26 14:27:00'),
(338, 488, 276, '97066762', '26.50', 1, '2019-08-26 14:26:43', '2019-08-26 14:26:43'),
(337, 488, 275, '97066762', '26.50', 1, '2019-08-26 14:26:35', '2019-08-26 14:26:35'),
(336, 488, 274, '27961856', '26.50', 1, '2019-08-26 14:26:29', '2019-08-26 14:26:29'),
(335, 488, 273, '54800285', '26.50', 1, '2019-08-26 14:26:03', '2019-08-26 14:26:03'),
(334, 488, 272, '43517602', '26.50', 1, '2019-08-26 14:25:55', '2019-08-26 14:25:55'),
(333, 488, 271, '76004667', '26.50', 1, '2019-08-26 14:25:50', '2019-08-26 14:25:50'),
(332, 488, 270, '6SE462187G955691R', '26.50', 1, '2019-08-26 08:28:46', '2019-08-26 12:28:46'),
(331, 488, 269, '50641830', '26.50', 1, '2019-08-22 16:34:32', '2019-08-22 16:34:32'),
(330, 488, 268, '50641830', '26.50', 1, '2019-08-22 16:34:06', '2019-08-22 16:34:06'),
(329, 488, 267, '1X785092549503825', '26.50', 1, '2019-08-22 11:08:24', '2019-08-22 15:08:24'),
(328, 488, 266, '52603498KF8226529', '26.50', 1, '2019-08-22 10:58:36', '2019-08-22 14:58:36'),
(327, 488, 265, '43S837612N639541P', '26.50', 1, '2019-08-21 12:27:11', '2019-08-21 16:27:11'),
(326, 488, 264, '36254537', 'e $26.5', 1, '2019-08-21 14:37:42', '2019-08-21 14:37:42'),
(325, 488, 263, '36254537', '26.50', 1, '2019-08-21 14:36:25', '2019-08-21 14:36:25'),
(324, 488, 262, '75588093', '26.50', 1, '2019-08-20 11:13:28', '2019-08-20 11:13:28'),
(323, 488, 261, '76V12454NM473945N', '26.50', 1, '2019-08-19 13:28:01', '2019-08-19 17:28:01'),
(322, 488, 260, '5UX67667F9287252D', '26.50', 1, '2019-08-19 11:40:12', '2019-08-19 15:40:12'),
(321, 488, 259, '6YA61008G2599341B', '26.50', 1, '2019-08-19 11:38:35', '2019-08-19 15:38:35'),
(320, 488, 258, '74148904', 'e $26.5', 1, '2019-08-19 15:22:59', '2019-08-19 15:22:59'),
(319, 488, 257, '32090097', 'e $26.5', 1, '2019-08-19 15:14:29', '2019-08-19 15:14:29'),
(318, 488, 256, '97608289', '45.99', 1, '2019-08-19 09:11:14', '2019-08-19 09:11:14'),
(317, 488, 255, '97608289', '45.99', 1, '2019-08-19 09:11:13', '2019-08-19 09:11:13'),
(316, 488, 254, '97608289', '45.99', 1, '2019-08-19 09:11:13', '2019-08-19 09:11:13'),
(315, 488, 253, '83063600', '45.99', 1, '2019-08-13 17:47:48', '2019-08-13 17:47:48'),
(314, 488, 252, '83063600', '45.99', 1, '2019-08-13 17:47:46', '2019-08-13 17:47:46'),
(313, 488, 251, '83063600', '26.50', 1, '2019-08-13 17:34:32', '2019-08-13 17:34:32'),
(312, 488, 250, '83063600', '45.99', 1, '2019-08-13 17:31:03', '2019-08-13 17:31:03'),
(311, 488, 249, '37098264', '45.99', 1, '2019-08-13 10:06:14', '2019-08-13 10:06:14'),
(310, 488, 248, '21988390', '45.99', 1, '2019-08-12 14:24:38', '2019-08-12 14:24:38'),
(309, 488, 247, '50601048', '45.99', 1, '2019-08-12 14:23:04', '2019-08-12 14:23:04'),
(308, 488, 246, '21988390', '45.99', 1, '2019-08-12 14:15:39', '2019-08-12 14:15:39'),
(307, 488, 245, '23028237', '45.99', 1, '2019-08-12 12:08:08', '2019-08-12 12:08:08'),
(306, 488, 244, '7HP99395J5950580W', '26.50', 1, '2019-08-12 08:02:50', '2019-08-12 12:02:50'),
(305, 488, 243, '93695522', '45.99', 1, '2019-08-12 11:51:00', '2019-08-12 11:51:00'),
(304, 487, 242, '98727718', '45.99', 1, '2019-08-12 11:39:17', '2019-08-12 11:39:17'),
(385, 506, 323, '45638311', 'e $26.5', 1, '2019-08-28 16:49:18', '2019-08-28 16:49:18'),
(386, 512, 324, '42186966', 'e $26.5', 1, '2019-08-29 08:59:28', '2019-08-29 08:59:28'),
(387, 512, 325, '8FU60314GB170305S', '26.50', 1, '2019-08-29 05:13:50', '2019-08-29 09:13:50'),
(388, 512, 326, '15302683', '26.50', 1, '2019-08-29 09:48:37', '2019-08-29 09:48:37'),
(389, 512, 327, '39913801', '26.50', 1, '2019-08-29 10:16:01', '2019-08-29 10:16:01'),
(390, 512, 328, '5AW48170SW234702U', '26.50', 1, '2019-08-29 06:39:15', '2019-08-29 10:39:15'),
(391, 512, 329, '57232577', '26.50', 1, '2019-08-29 10:39:15', '2019-08-29 10:39:15'),
(392, 512, 330, '2UC264481A198850H', '26.50', 1, '2019-08-29 06:43:54', '2019-08-29 10:43:54'),
(393, 512, 331, '8AY6017859615693F', '26.50', 1, '2019-08-29 06:47:41', '2019-08-29 10:47:41'),
(394, 512, 332, '0LP9485137799184N', '26.50', 1, '2019-08-29 10:24:34', '2019-08-29 14:24:34'),
(395, 512, 333, '9CE03801340148922', '26.50', 1, '2019-08-30 05:10:50', '2019-08-30 09:10:50'),
(396, 512, 334, '34Y825608N618031K', '45.99', 1, '2019-08-30 05:28:49', '2019-08-30 09:28:49'),
(397, 512, 335, '6WL83368WY917084U', '45.99', 1, '2019-08-30 05:55:10', '2019-08-30 09:55:10'),
(398, 512, 336, '1HD52616WH4457504', '45.99', 1, '2019-08-30 13:44:14', '2019-08-30 17:44:14'),
(399, 512, 337, '2GH0225941144625X', '45.99', 1, '2019-08-30 13:46:36', '2019-08-30 17:46:36'),
(400, 512, 338, '96753682', 'e $26.5', 1, '2019-08-30 17:47:40', '2019-08-30 17:47:40'),
(401, 512, 339, '36L90974MJ9935924', '26.50', 1, '2019-08-30 13:49:22', '2019-08-30 17:49:22'),
(402, 512, 340, '24398949', '26.50', 1, '2019-09-02 08:52:23', '2019-09-02 08:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('skchaudhary7073@gmail.com', '$2y$10$EHCyCgEqEbnoU5nSDSoRneWZ9fvya3xnJ5gDAC6gvkO4cqUuacwDG', '2019-07-20 18:33:24'),
('navinadhikari87@gmail.com', '$2y$10$uE7bj02woAan7Ag/lSE2k.7V9dhUZibB6NF86p9BfgcAcVguz8VIO', '2019-07-23 12:23:37'),
('abhinandansingh281@gmail.com', '$2y$10$7PKeensNKncxTs5CC2BOOO5w5ANTj4C8/jSCl0O5S3lCUAGOYECgy', '2019-07-25 22:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Services`
--

CREATE TABLE `Services` (
  `id` int(11) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Services`
--

INSERT INTO `Services` (`id`, `amount`, `created_at`, `updated_at`) VALUES
(340, '26.50', '2019-09-02 04:52:23', '2019-09-02 08:52:23'),
(339, '26.50', '2019-08-30 01:48:58', '2019-08-30 05:48:58'),
(338, 'e $26.5', '2019-08-30 01:47:40', '2019-08-30 05:47:40'),
(337, '45.99', '2019-08-30 01:46:05', '2019-08-30 05:46:05'),
(336, '45.99', '2019-08-30 01:43:17', '2019-08-30 05:43:17'),
(335, '45.99', '2019-08-30 05:53:36', '2019-08-30 09:53:36'),
(334, '45.99', '2019-08-30 05:28:09', '2019-08-30 09:28:09'),
(333, '26.50', '2019-08-30 05:08:54', '2019-08-30 09:08:54'),
(332, '26.50', '2019-08-29 10:23:57', '2019-08-29 14:23:57'),
(331, '26.50', '2019-08-29 06:47:14', '2019-08-29 10:47:14'),
(330, '26.50', '2019-08-29 06:42:52', '2019-08-29 10:42:52'),
(329, '26.50', '2019-08-29 06:39:15', '2019-08-29 10:39:15'),
(328, '26.50', '2019-08-29 06:38:30', '2019-08-29 10:38:30'),
(327, '26.50', '2019-08-29 06:16:01', '2019-08-29 10:16:01'),
(326, '26.50', '2019-08-29 05:48:37', '2019-08-29 09:48:37'),
(325, '26.50', '2019-08-29 05:13:20', '2019-08-29 09:13:20'),
(324, 'e $26.5', '2019-08-29 04:59:28', '2019-08-29 08:59:28'),
(323, 'e $26.5', '2019-08-28 12:49:18', '2019-08-28 16:49:18'),
(322, '45.99', '2019-08-28 12:44:58', '2019-08-28 16:44:58'),
(321, '26.50', '2019-08-28 12:42:24', '2019-08-28 16:42:24'),
(320, '26.50', '2019-08-27 11:02:24', '2019-08-27 15:02:24'),
(319, '26.50', '2019-08-27 10:29:44', '2019-08-27 14:29:44'),
(318, '26.50', '2019-08-27 09:58:04', '2019-08-27 13:58:04'),
(317, '26.50', '2019-08-27 08:24:07', '2019-08-27 12:24:07'),
(316, '26.50', '2019-08-27 06:37:18', '2019-08-27 10:37:18'),
(315, '26.50', '2019-08-27 06:35:33', '2019-08-27 10:35:33'),
(314, '26.50', '2019-08-27 06:25:58', '2019-08-27 10:25:58'),
(313, 'e $26.5', '2019-08-26 01:17:00', '2019-08-26 05:17:00'),
(312, '45.99', '2019-08-26 12:55:34', '2019-08-26 16:55:34'),
(311, '26.50', '2019-08-26 12:49:29', '2019-08-26 16:49:29'),
(310, 'e $26.5', '2019-08-26 12:46:21', '2019-08-26 16:46:21'),
(309, 'e $26.5', '2019-08-26 12:45:41', '2019-08-26 16:45:41'),
(308, 'e $26.5', '2019-08-26 12:42:16', '2019-08-26 16:42:16'),
(307, 'e $26.5', '2019-08-26 12:36:44', '2019-08-26 16:36:44'),
(306, '45.99', '2019-08-26 12:36:42', '2019-08-26 16:36:42'),
(305, 'e $26.5', '2019-08-26 12:28:10', '2019-08-26 16:28:10'),
(304, '26.50', '2019-08-26 12:12:37', '2019-08-26 16:12:37'),
(303, '26.50', '2019-08-26 11:47:17', '2019-08-26 15:47:17'),
(302, '45.99', '2019-08-26 11:29:27', '2019-08-26 15:29:27'),
(301, '26.50', '2019-08-26 11:27:24', '2019-08-26 15:27:24'),
(300, '45.99', '2019-08-26 11:27:22', '2019-08-26 15:27:22'),
(299, 'e $26.5', '2019-08-26 11:22:59', '2019-08-26 15:22:59'),
(298, '45.99', '2019-08-26 11:21:52', '2019-08-26 15:21:52'),
(297, '26.50', '2019-08-26 11:21:02', '2019-08-26 15:21:02'),
(296, '26.50', '2019-08-26 11:20:34', '2019-08-26 15:20:34'),
(295, 'e $26.5', '2019-08-26 11:14:32', '2019-08-26 15:14:32'),
(294, '26.50', '2019-08-26 11:14:22', '2019-08-26 15:14:22'),
(293, '45.99', '2019-08-26 11:14:13', '2019-08-26 15:14:13'),
(292, '45.99', '2019-08-26 11:10:42', '2019-08-26 15:10:42'),
(291, '45.99', '2019-08-26 11:10:36', '2019-08-26 15:10:36'),
(290, 'e $26.5', '2019-08-26 11:09:19', '2019-08-26 15:09:19'),
(289, 'e $26.5', '2019-08-26 11:03:34', '2019-08-26 15:03:34'),
(288, 'e $26.5', '2019-08-26 10:59:27', '2019-08-26 14:59:27'),
(287, 'e $26.5', '2019-08-26 10:59:17', '2019-08-26 14:59:17'),
(286, 'e $26.5', '2019-08-26 10:59:16', '2019-08-26 14:59:16'),
(285, '45.99', '2019-08-26 10:58:54', '2019-08-26 14:58:54'),
(284, '45.99', '2019-08-26 10:58:43', '2019-08-26 14:58:43'),
(283, '45.99', '2019-08-26 10:58:41', '2019-08-26 14:58:41'),
(282, '45.99', '2019-08-26 10:58:20', '2019-08-26 14:58:20'),
(281, '45.99', '2019-08-26 10:58:03', '2019-08-26 14:58:03'),
(280, '45.99', '2019-08-26 10:57:47', '2019-08-26 14:57:47'),
(279, '45.99', '2019-08-26 10:57:32', '2019-08-26 14:57:32'),
(278, '26.50', '2019-08-26 10:27:12', '2019-08-26 14:27:12'),
(277, '26.50', '2019-08-26 10:27:00', '2019-08-26 14:27:00'),
(276, '26.50', '2019-08-26 10:26:43', '2019-08-26 14:26:43'),
(275, '26.50', '2019-08-26 10:26:35', '2019-08-26 14:26:35'),
(274, '26.50', '2019-08-26 10:26:29', '2019-08-26 14:26:29'),
(273, '26.50', '2019-08-26 10:26:03', '2019-08-26 14:26:03'),
(272, '26.50', '2019-08-26 10:25:55', '2019-08-26 14:25:55'),
(271, '26.50', '2019-08-26 10:25:50', '2019-08-26 14:25:50'),
(270, '26.50', '2019-08-26 08:27:35', '2019-08-26 12:27:35'),
(269, '26.50', '2019-08-22 12:34:32', '2019-08-22 16:34:32'),
(268, '26.50', '2019-08-22 12:34:06', '2019-08-22 16:34:06'),
(267, '26.50', '2019-08-22 11:07:54', '2019-08-22 15:07:54'),
(266, '26.50', '2019-08-22 10:54:26', '2019-08-22 14:54:26'),
(265, '26.50', '2019-08-21 12:26:27', '2019-08-21 16:26:27'),
(264, 'e $26.5', '2019-08-21 10:37:42', '2019-08-21 14:37:42'),
(263, '26.50', '2019-08-21 10:36:25', '2019-08-21 14:36:25'),
(262, '26.50', '2019-08-20 07:13:28', '2019-08-20 11:13:28'),
(261, '26.50', '2019-08-19 01:27:18', '2019-08-19 05:27:18'),
(260, '26.50', '2019-08-19 11:39:43', '2019-08-19 15:39:43'),
(259, '26.50', '2019-08-19 11:37:39', '2019-08-19 15:37:39'),
(258, 'e $26.5', '2019-08-19 11:22:59', '2019-08-19 15:22:59'),
(257, 'e $26.5', '2019-08-19 11:14:29', '2019-08-19 15:14:29'),
(256, '45.99', '2019-08-19 05:11:14', '2019-08-19 09:11:14'),
(255, '45.99', '2019-08-19 05:11:13', '2019-08-19 09:11:13'),
(254, '45.99', '2019-08-19 05:11:13', '2019-08-19 09:11:13'),
(253, '45.99', '2019-08-13 01:47:48', '2019-08-13 05:47:48'),
(252, '45.99', '2019-08-13 01:47:46', '2019-08-13 05:47:46'),
(251, '26.50', '2019-08-13 01:34:32', '2019-08-13 05:34:32'),
(250, '45.99', '2019-08-13 01:31:03', '2019-08-13 05:31:03'),
(249, '45.99', '2019-08-13 06:06:14', '2019-08-13 10:06:14'),
(248, '45.99', '2019-08-12 10:24:38', '2019-08-12 14:24:38'),
(247, '45.99', '2019-08-12 10:23:04', '2019-08-12 14:23:04'),
(246, '45.99', '2019-08-12 10:15:39', '2019-08-12 14:15:39'),
(245, '45.99', '2019-08-12 08:08:08', '2019-08-12 12:08:08'),
(244, '26.50', '2019-08-12 08:02:26', '2019-08-12 12:02:26'),
(243, '45.99', '2019-08-12 07:51:00', '2019-08-12 11:51:00'),
(242, '45.99', '2019-08-12 07:39:17', '2019-08-12 11:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `subscribemembers`
--

CREATE TABLE `subscribemembers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribemembers`
--

INSERT INTO `subscribemembers` (`id`, `video_type`, `created_at`, `updated_at`) VALUES
(1, 'Free Thumbnails', NULL, NULL),
(2, 'Free Script/Text', NULL, NULL),
(3, 'Multiple Video Orientation', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(4, 'Ability to re-edit video yourself', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(5, 'Multiple Test Variations', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(6, 'Multiple Stop Scroll Variations', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(7, 'Multiple Split Test', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(8, 'Translate Language', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(9, 'Free Royalty Music', '2019-07-02 18:30:00', '2019-07-02 18:30:00'),
(10, '4 Day Express Delivery', '2019-07-02 18:30:00', '2019-07-02 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_member_video_variation`
--

CREATE TABLE `sub_member_video_variation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_member_video_variation`
--

INSERT INTO `sub_member_video_variation` (`id`, `amount`, `video_type`, `created_at`, `updated_at`) VALUES
(1, '$39.99 / 1 Video (Free)', 'Free Thumbnails', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(2, '$79.98 / 2 Video (Free)', 'Free Script/Text', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(3, '$119.97 / 3 Video', 'Multiple Video Orientation', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(4, '$159.96 / 4 Video', 'Ability to re-edit video yourself', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(5, '$199.95 / 5 Video', 'Multiple Test Variations', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(6, '', 'Multiple Stop Scroll Variations', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(7, NULL, 'Multiple Split Test', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(8, NULL, 'Translate Language', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(9, NULL, 'Free Royalty Music', '2019-07-03 18:30:00', '2019-07-03 18:30:00'),
(10, NULL, '4 Day Express Delivery', '2019-07-03 18:30:00', '2019-07-03 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `token`, `active`, `remember_token`, `created_at`, `updated_at`, `first_name`, `last_name`, `role_id`) VALUES
(387, 'Admin', 'admin@mail.com', NULL, '$2y$10$FBSNMVrLhOrji6xi5ALoiOofl8cefuHTgZJvtvUzfa8CWChHpSheS', 'NtGESCLysLVH9eNjUIdIa0aTgSEkTQbhT8w6Jszi1563952016', 1, 'OqmLPMMBMWae3cwe3q1TUt3jZSCDzmvhTN2pvIpQPgm7inOWpgpR3k2rj3xi', '2019-07-24 11:06:56', '2019-07-24 15:26:15', 'Admin', 'Admin', 3),
(491, 'amit', 'mesasell888@gmail.com', NULL, '$2y$10$9F5QnI3/nAnGV4g1Vmb3pe7LfyZV3/KQqYiNFjUSjEljPOAzhaWki', 'wQAKUGMqdQ5TcCiZKDxilMaK6kIolbMilHWs5uS71565598690', 0, NULL, '2019-08-12 12:31:30', '2019-08-12 12:31:30', 'web', 'ewq', 1),
(499, 'rajkumar', 'jyotishjndghjdedq@gmail.com', NULL, '$2y$10$JkE43hC3Dpz/eA.hvErFuO/5b81yPgZjtR4gf7fRCSaNNXRDJZm8m', 'Z4IprEQc2WcmAvFKkbYEr775X5q5tG8WWQhd7f2u1566194133', 1, NULL, '2019-08-19 09:55:33', '2019-08-29 09:38:20', NULL, NULL, 2),
(500, 'ramkumar', 'jyotishraj1999@gmail.com', NULL, '$2y$10$eV.8d0EJYs6m8y1FbQA4euX/YiScvdLF9r5JoZAqaJkV.8tTe4kEu', 'nQBb08oB75HVGbTdmZ3IyZhgtYM9DMNQenPxdwKj1566196219', 1, NULL, '2019-08-19 10:30:19', '2019-08-19 10:30:54', NULL, NULL, 2),
(506, 'Jyotish', 'kjyotish888@gmail.com', NULL, '$2y$10$nt84i34/TMVWr1dhbA71WutUj6IeSrvDeZ0/CkTVr9Xqh56.l0sCi', 'CCXYT8u6z0T3kf2IUKBcyuSInxVqMATPxSxKCVWu1566825277', 1, NULL, '2019-08-26 17:14:37', '2019-08-26 17:15:12', 'Jyotish', 'raj', 1),
(512, 'Jyotish', 'onlinedimand888@gmail.com', NULL, '$2y$10$qLCobOhjyKE4juvZ3oa5Ve5ow6DM/Nb9pgWzO2/13RA8PhYX/fPHW', 'bEVAOlpgDK8vODxTLlQLYNP7jllyb7nKLRWBuMzP1566989292', 1, NULL, '2019-08-28 14:48:12', '2019-08-28 14:54:53', 'Jyotish', 'raj', 1),
(514, 'santosh kumar', 'skchaudhary7073@gmail.com', NULL, '$2y$10$1Trm64lUbSAKHuV37kfl5.4cEgAb4qXunmOxx4HSET9uLQIQPV9RS', 'CwFwpDUMCfmlPjenhDbDxdI7MeTp8cK3XBmSS9LN1567057924', 0, NULL, '2019-08-29 09:52:04', '2019-08-29 09:52:04', 'santosh', 'kumar', 1),
(515, 'santosh kumar', 'santoshkumarc51@gmail.com', NULL, '$2y$10$tXdLGVfN9reozldxXQWlM.H6AZqmShrzYdm792jcV4IeNNB8moLeK', 'wvHWsWjQouQAHeKMpe8lfGgID377PVZtw9ECAQFt1567058290', 0, NULL, '2019-08-29 09:58:10', '2019-08-29 09:58:10', 'santosh', 'kumar', 1),
(516, 'ashish', 'ashishmaurya644@gmail.com', NULL, '$2y$10$4.0ovPxFQrN3rWUBSfP6WeA68AK1wCi3I3XokqQcbum1WvbD5lqrC', 'qKIUlhCjzxi96X1Mt20gvhufkiC1gC2gMjHNmc8k1567058385', 1, NULL, '2019-08-29 09:59:45', '2019-08-29 10:00:36', 'ashish', 'maurya', 1),
(517, 'Jyotish raj', 'jyotishk746@gmail.com', NULL, '$2y$10$TlTFW.dwUmUTpsLiODjy0OOsV11eoMHQmyBMxAXlFKpv8tknsxM4S', 'QnEa4ltOrhs5HmBubhSat3ct75ZvzwMKyrgL8f5v1567065916', 0, NULL, '2019-08-29 12:05:16', '2019-08-29 12:05:16', NULL, NULL, 2),
(518, 'Jyotish raj', 'jyotish.stit@outlook.com', NULL, '$2y$10$/Y4EyrVYcV930boIp6YcjOq5G/aZTJgUY8viDKubZOM5VzlFAoYIW', 'jkHq3omQAuMTIWHxlWWZKtEKzex5IBCZTgxae0Ly1567065966', 1, NULL, '2019-08-29 12:06:06', '2019-08-29 12:07:31', NULL, NULL, 2),
(519, 'aa', 'aa@gmail.com', NULL, '$2y$10$ck3YoDzXOe8x9XVbqfgc6ujVgLhGNi4sATmHGk2yVUMhbHTif.RxW', 'Sj1m0lFyi3mWvzOGjZ4LR2rVgpfVlli4UrDlSfpZ1567166922', 1, NULL, '2019-08-30 16:08:42', '2019-08-30 16:21:10', NULL, NULL, 2),
(520, 'yugyu', 'uyu@gmail.com', NULL, '$2y$10$2vIUJe3FNwNGviU6cvnNJumkD6yAlTULeZ/63C823k7JE/u6CjMV6', 'z491XTJvjKEElKHAlsHiBP2GXgZatfbd0Bf7flk11567578744', 0, NULL, '2019-09-04 10:32:25', '2019-09-04 10:32:25', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `videoaffects`
--

CREATE TABLE `videoaffects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videoaffects`
--

INSERT INTO `videoaffects` (`id`, `item`, `imagename`, `created_at`, `updated_at`) VALUES
(1, 'Shake', 'shake.jpg', NULL, NULL),
(2, 'Blur', 'blur.jpg', NULL, NULL),
(3, 'Lomography', 'lomography.jpg', NULL, NULL),
(4, 'Frames', 'frames.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `links` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `links`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'https://mdbootstrap.com/img/video/Tropical.mp4', 'Strong mask', 'Third text', NULL, NULL),
(14, 'https://mdbootstrap.com/img/video/animation-intro.mp4', 'Super light mask', 'Secondary text', NULL, NULL),
(16, 'img/video_styles/videoplayback (1).mp45d6916a12190e', 'Light Mask', 'First Text', '2019-08-30 16:29:21', '2019-08-30 16:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `videosounds`
--

CREATE TABLE `videosounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sound_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videosounds`
--

INSERT INTO `videosounds` (`id`, `item`, `sound_image`, `filename`, `created_at`, `updated_at`) VALUES
(1, 'Bensound Acousticbreeze', 'bensound-acousticbreeze.jpg', 'bensound-acousticbreeze.mp3', NULL, NULL),
(2, 'Bensound Cute', 'bensound-cute.jpg', 'bensound-cute.mp3', NULL, NULL),
(3, 'Bensound Summer', 'bensound-summer.jpg', 'bensound-summer.mp3', NULL, NULL),
(4, 'Bensound Ukulele', 'bensound-ukulele.jpg', 'bensound-ukulele.mp3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videotitles`
--

CREATE TABLE `videotitles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videotitles`
--

INSERT INTO `videotitles` (`id`, `item`, `created_at`, `updated_at`) VALUES
(1, 'Wave Style', NULL, NULL),
(2, 'Type Writer', NULL, NULL),
(3, 'Cinema Style', NULL, NULL),
(4, 'Random', NULL, NULL),
(5, 'Doorway', NULL, NULL),
(6, 'Boom', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videotransitions`
--

CREATE TABLE `videotransitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videotransitions`
--

INSERT INTO `videotransitions` (`id`, `item`, `imagename`, `created_at`, `updated_at`) VALUES
(1, 'Bar', 'bar.jpg', NULL, NULL),
(2, 'Blind', 'blind.jpg', NULL, NULL),
(3, 'Box Flip', 'boxflip.jpg', NULL, NULL),
(4, 'Cross Merge', 'crossmerge.jpg', NULL, NULL),
(5, 'Diamond Zoom', 'diamondzoom.jpg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `createvideo`
--
ALTER TABLE `createvideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerdetails`
--
ALTER TABLE `customerdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employes_email_unique` (`email`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipn_status`
--
ALTER TABLE `ipn_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masterthumnails`
--
ALTER TABLE `masterthumnails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nonsubscribemembers`
--
ALTER TABLE `nonsubscribemembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nonsub_member_video_variation`
--
ALTER TABLE `nonsub_member_video_variation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribemembers`
--
ALTER TABLE `subscribemembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_member_video_variation`
--
ALTER TABLE `sub_member_video_variation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `createvideo`
--
ALTER TABLE `createvideo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customerdetails`
--
ALTER TABLE `customerdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=394;

--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ipn_status`
--
ALTER TABLE `ipn_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `masters`
--
ALTER TABLE `masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `masterthumnails`
--
ALTER TABLE `masterthumnails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nonsubscribemembers`
--
ALTER TABLE `nonsubscribemembers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nonsub_member_video_variation`
--
ALTER TABLE `nonsub_member_video_variation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Services`
--
ALTER TABLE `Services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;

--
-- AUTO_INCREMENT for table `subscribemembers`
--
ALTER TABLE `subscribemembers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_member_video_variation`
--
ALTER TABLE `sub_member_video_variation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=521;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
