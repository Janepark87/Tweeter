-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 13, 2018 at 03:05 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tweeter`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tweet_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `body`, `tweet_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'Hi, bulldog. how are you???', 1, '2018-08-13 10:17:19', '2018-08-13 10:17:19'),
(2, 2, 'no.. i dont think so.. today is soooooo hot~!!!', 2, '2018-08-13 10:17:39', '2018-08-13 10:17:39'),
(3, 3, 'Master Panda, how to become a master!??? i want, sir!!', 3, '2018-08-13 10:20:14', '2018-08-13 10:20:14'),
(4, 3, 'I love hot day!!!! lovelovelove ^^', 2, '2018-08-13 10:20:49', '2018-08-13 10:20:49'),
(5, 4, 'hot~ dog?  or hotdog!?', 5, '2018-08-13 10:30:43', '2018-08-13 10:30:43'),
(6, 4, 'hi hotdog', 4, '2018-08-13 10:31:02', '2018-08-13 10:31:02'),
(7, 6, 'I understand ! puhahahahaha', 6, '2018-08-13 10:38:31', '2018-08-13 10:38:31'),
(8, 7, 'hey yo~!', 7, '2018-08-13 10:41:27', '2018-08-13 10:41:27'),
(9, 7, 'i know ! i want to be a friend with you!!', 6, '2018-08-13 10:42:05', '2018-08-13 10:42:05'),
(10, 7, 'Master P. what kind of master are you?', 3, '2018-08-13 10:42:44', '2018-08-13 10:42:44'),
(11, 7, 'oh~ you look like red sausage~! hahahaha i like !', 4, '2018-08-13 10:47:09', '2018-08-13 10:47:09'),
(12, 8, 'yes!!', 8, '2018-08-13 10:49:42', '2018-08-13 10:49:42'),
(13, 8, 'buldog .. buldog do you have a time tmr?? i have something to tell you. i am sure you like it!!', 1, '2018-08-13 10:51:24', '2018-08-13 10:51:24'),
(14, 7, 'oh my gosh !! i love party~!!  i am the first!!!!! put me name on the list!! hot dog~!!', 11, '2018-08-13 10:55:02', '2018-08-13 10:55:02'),
(15, 4, 'wow i will go!', 11, '2018-08-13 10:55:29', '2018-08-13 10:55:29'),
(16, 1, 'partypartyparty love it!! me tooooooooo', 8, '2018-08-13 10:56:38', '2018-08-13 10:56:38'),
(17, 2, 'master panda will join your party!', 11, '2018-08-13 10:58:04', '2018-08-13 10:58:04'),
(18, 6, 'yes i am', 11, '2018-08-13 10:58:37', '2018-08-13 10:58:37'),
(19, 8, 'of course!!!', 11, '2018-08-13 10:59:05', '2018-08-13 10:59:05'),
(20, 3, 'welcome everybody!!  you guys are already in my guest list!!', 11, '2018-08-13 11:27:15', '2018-08-13 11:27:15'),
(21, 3, 'i cannot wait!!!', 11, '2018-08-13 11:27:25', '2018-08-13 11:27:25'),
(23, 3, 'oh~~ just remind you guys~! you dont need to bring anything!! just bring your body and mind!!', 11, '2018-08-13 11:42:25', '2018-08-13 11:42:25'),
(24, 1, 'can i ...? is it too late to let you know..?', 11, '2018-08-13 13:07:54', '2018-08-13 13:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

DROP TABLE IF EXISTS `followers`;
CREATE TABLE IF NOT EXISTS `followers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `follow_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `follow_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0, '2018-08-13 10:17:06', '2018-08-13 10:17:06'),
(2, 3, 2, 0, '2018-08-13 10:19:49', '2018-08-13 10:19:49'),
(3, 3, 1, 0, '2018-08-13 10:19:51', '2018-08-13 10:19:51'),
(4, 4, 3, 0, '2018-08-13 10:29:44', '2018-08-13 10:29:44'),
(5, 4, 2, 0, '2018-08-13 10:29:45', '2018-08-13 10:29:45'),
(37, 3, 6, 0, '2018-08-13 12:39:00', '2018-08-13 12:39:00'),
(36, 6, 4, 0, '2018-08-13 12:38:29', '2018-08-13 12:38:29'),
(8, 6, 2, 0, '2018-08-13 10:39:01', '2018-08-13 10:39:01'),
(10, 7, 6, 0, '2018-08-13 10:41:06', '2018-08-13 10:41:06'),
(11, 7, 3, 0, '2018-08-13 10:41:07', '2018-08-13 10:41:07'),
(13, 7, 1, 0, '2018-08-13 10:41:11', '2018-08-13 10:41:11'),
(15, 8, 7, 0, '2018-08-13 10:48:00', '2018-08-13 10:48:00'),
(16, 8, 1, 0, '2018-08-13 10:48:04', '2018-08-13 10:48:04'),
(17, 8, 2, 0, '2018-08-13 10:48:05', '2018-08-13 10:48:05'),
(18, 8, 3, 0, '2018-08-13 10:51:30', '2018-08-13 10:51:30'),
(42, 1, 3, 0, '2018-08-13 13:07:26', '2018-08-13 13:07:26'),
(41, 1, 6, 0, '2018-08-13 13:07:22', '2018-08-13 13:07:22'),
(22, 2, 7, 0, '2018-08-13 10:57:33', '2018-08-13 10:57:33'),
(23, 2, 3, 0, '2018-08-13 10:57:36', '2018-08-13 10:57:36'),
(24, 6, 3, 0, '2018-08-13 10:58:27', '2018-08-13 10:58:27'),
(44, 3, 8, 0, '2018-08-13 14:30:10', '2018-08-13 14:30:10'),
(26, 3, 7, 0, '2018-08-13 11:36:38', '2018-08-13 11:36:38'),
(38, 3, 4, 0, '2018-08-13 12:39:02', '2018-08-13 12:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tweet_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `tweet_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2018-08-13 10:17:42', '2018-08-13 10:17:42'),
(2, 3, 3, '2018-08-13 10:20:18', '2018-08-13 10:20:18'),
(3, 3, 2, '2018-08-13 10:20:51', '2018-08-13 10:20:51'),
(4, 4, 5, '2018-08-13 10:30:23', '2018-08-13 10:30:23'),
(5, 4, 4, '2018-08-13 10:31:07', '2018-08-13 10:31:07'),
(6, 6, 6, '2018-08-13 10:38:06', '2018-08-13 10:38:06'),
(7, 6, 2, '2018-08-13 10:38:42', '2018-08-13 10:38:42'),
(8, 7, 6, '2018-08-13 10:42:07', '2018-08-13 10:42:07'),
(9, 7, 4, '2018-08-13 10:47:11', '2018-08-13 10:47:11'),
(10, 8, 8, '2018-08-13 10:49:43', '2018-08-13 10:49:43'),
(11, 7, 11, '2018-08-13 10:53:00', '2018-08-13 10:53:00'),
(12, 4, 11, '2018-08-13 10:55:32', '2018-08-13 10:55:32'),
(13, 1, 8, '2018-08-13 10:56:40', '2018-08-13 10:56:40'),
(14, 2, 8, '2018-08-13 10:57:26', '2018-08-13 10:57:26'),
(15, 2, 11, '2018-08-13 10:57:38', '2018-08-13 10:57:38'),
(16, 6, 11, '2018-08-13 10:58:30', '2018-08-13 10:58:30'),
(17, 8, 11, '2018-08-13 10:58:58', '2018-08-13 10:58:58'),
(18, 3, 11, '2018-08-13 11:40:04', '2018-08-13 11:40:04'),
(19, 1, 11, '2018-08-13 13:08:01', '2018-08-13 13:08:01'),
(20, 1, 4, '2018-08-13 13:56:14', '2018-08-13 13:56:14'),
(21, 1, 7, '2018-08-13 14:01:04', '2018-08-13 14:01:04'),
(22, 1, 5, '2018-08-13 14:01:11', '2018-08-13 14:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(111, '2014_10_12_000000_create_users_table', 1),
(112, '2014_10_12_100000_create_password_resets_table', 1),
(113, '2018_07_12_155942_create_tweets_table', 1),
(114, '2018_07_16_070116_create_comments_table', 1),
(115, '2018_08_07_180018_create_followers_table', 1),
(116, '2018_08_09_043931_create_likes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

DROP TABLE IF EXISTS `tweets`;
CREATE TABLE IF NOT EXISTS `tweets` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `user_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hello, I am Bulldog!', '2018-08-13 10:13:57', '2018-08-13 10:13:57'),
(2, 1, 'Oh, what a nice day~!!!', '2018-08-13 10:14:22', '2018-08-13 10:14:22'),
(3, 2, 'Hi, I am Master Panda :))', '2018-08-13 10:15:30', '2018-08-13 10:15:30'),
(4, 3, 'Hiiiiiiiiiiiiiiiiiiiiii, my name is HOOOOOOOTTDOG~.~', '2018-08-13 10:18:31', '2018-08-13 10:18:31'),
(5, 3, 'I am so HOT dog~.~', '2018-08-13 10:19:44', '2018-08-13 10:19:44'),
(6, 4, 'I AM ANGRYDOG!! DO NOT TALK ABOUT MY ANGRY FACE !!! IT\'S JUST NAME, I am not ANGRY with you ..', '2018-08-13 10:28:42', '2018-08-13 10:30:07'),
(7, 6, 'Hi, what\'s new?\r\nSmoking cigar Man~', '2018-08-13 10:37:53', '2018-08-13 10:37:53'),
(8, 7, 'yo~! what\'t up? hey do you want to listen to my hiphop song!?', '2018-08-13 10:40:37', '2018-08-13 10:40:37'),
(9, 8, 'what!!?', '2018-08-13 10:47:59', '2018-08-13 10:47:59'),
(10, 8, 'nnnnnnoooooooooooooooooooooooooooooo nothing@@@@!!!', '2018-08-13 10:49:21', '2018-08-13 10:49:21'),
(11, 3, 'Let\'s have a SAUSAGE Party!!!! who wants to join~~???  let me know!! everybody can join sausage party~~!!', '2018-08-13 10:52:33', '2018-08-13 11:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `bio` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `bio`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bulldog', '1534133304.png', 'Bowwow', 'info@bull.com', '$2y$10$vQ6aJK/Ni98DwJdFT8W0ze4ycJ159PkhN3BowVf.6lKtG8Y1TT1MK', 'L3uhvl8LL8UKsLM1wvibW4kyXSfUoCrcPHNBQBqsZP57qoO3JdzGyYhDMthH', '2018-08-13 10:00:00', '2018-08-13 10:10:04'),
(2, 'Master Panda', '1534133808.png', 'If you want to become a master, then contact me!', 'info@masterdog.com', '$2y$10$OjQEEjNehWDCJBrYAr10C.E3UI1i4A4Edof./zF810GGwF251OqDy', '9EHoT3Sz2KNdt6hMTgFt7RR8qSjacOnMYJNq0hlkngVw9O2w6YtWgV75RO3C', '2018-08-13 10:15:06', '2018-08-13 10:16:49'),
(3, 'Hotdog', '1534133964.png', 'SAUSAGE PARTY!!!! JOIN US~!', 'info@hotdog.com', '$2y$10$9FQ8BShUxe1iFUassG1WxuDmp1CoquiPmWfjxvYMW.UAsyKpuaUyC', 'JKbKXt2u7q7b17JkZJ6DxIDISMq7BAjVoZQNSqRCXFwAkk3FeKtTuaY8SeYI', '2018-08-13 10:18:09', '2018-08-13 11:43:05'),
(4, 'Angrydog', '1534134575.jpg', 'Don\'t be scared to talk with me!', 'info@angrydog.com', '$2y$10$4NCPrm8xqHH3MUKg/qGrnOViUu16uOKVb0.zUXbdqFzwQRA8HTcCi', '8oB3HYnHoPqYzGsnVHFxP163A8QKfdjq57zrb3lSc7wkj7OasKF19RMB5gf8', '2018-08-13 10:24:58', '2018-08-13 10:29:35'),
(6, 'Gangster', '1534135042.jpg', 'Smoking Cigar', 'info@ganster.com', '$2y$10$GMWjAGZPrJb9WBQ3OK4qNOO.vBtBF86Fpia3ZTvFRpeXJMaJPp.n6', 'OioA0wYmtskUjSHFUkdgy1L5tydGnXErDCuQO1HnkmCUpXC0hfCLu9nVnhzD', '2018-08-13 10:36:46', '2018-08-13 10:37:22'),
(7, 'Hiphopdog', '1534135257.jpg', 'Hip Hop yeah~!', 'info@hiphop.com', '$2y$10$ae7VxYKkwLShSVfMXFThIehIv/hDznxTHqUobYMB0zSiu5QEDrebq', 'iPqggl8zY3h7bm7dJRCH2FpFsQZ0ml1aFLLuRxOAh3Hmpoz52AVfx6haShlV', '2018-08-13 10:40:06', '2018-08-13 10:40:57'),
(8, 'Whatdog', '1534135719.jpg', 'what ?!?!?!?!?!?!?!?', 'info@what.com', '$2y$10$cjuiFwsvgn2OzL6TpW/ase4mvQ/nKkgweqwueHPUPFK9dwlvOl67m', 'DUWJO2EACG5Yt2HfDBEpifbU7tzdP4aWvToA6JFIgEGlZ8raBDFkogGHsDQT', '2018-08-13 10:47:53', '2018-08-13 10:48:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
