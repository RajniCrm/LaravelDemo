-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2019 at 12:33 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `parent_id`, `title`, `slug`, `image`, `description`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'About Us', 'about_us', NULL, '<p>cxcc</p>', 1, 'Active', '2019-03-26 07:35:01', '2019-03-27 04:24:59'),
(2, 0, 'Branches', 'branches', NULL, '<p>1. Singapore Level 8, 3 Church Street Singapore 049483 +65 6408 0153 2.</p>\r\n\r\n<p>Nagpur 10/4, STPI, IT Park Gayatri Nagar Near V.N.I.T. College</p>\r\n\r\n<p>Nagpur - 440022 India +91 988 1525 949</p>', 4, 'Active', '2019-03-26 07:38:23', '2019-04-01 03:23:14'),
(3, 0, 'Resources', 'resources', 'Website-image.generic_1553928944.jpg', '<p>1. This instance is built on top of SuiteCRM 7.5.1 and SugarCE 6.5.20 and published under AGPLv3 license. It includes modifications such as: UI modifications Asterix plugin and basic call-pop-up Facebook listener plugin Twitter plugin Basic Escalation Matrix Fixes for encountered issues Correct way to allow all users of your software to download the version they are using. Others</p>', 3, 'Inactive', '2019-03-26 07:39:55', '2019-04-01 03:26:52'),
(12, 0, 'Services', 'services', 'website-images-guide_1553926306.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with de</p>', 2, 'Active', '2019-03-30 00:41:46', '2019-04-01 00:51:33'),
(13, 0, 'Subscriber', 'subscriber', 'kisspng-computer-icons-help-desk-technical-support-symbol5_1554097451.jpg', '<p>fbfg</p>', 5, 'Inactive', '2019-03-30 03:28:40', '2019-04-01 00:14:11'),
(14, 0, 'Testing', 'testing', 'keyboard_typing_1554108865.jpg', '<p>sum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2><samp><strong>Why do we use it?</strong></samp></h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubt</p>', 1, 'Active', '2019-04-01 03:24:25', '2019-04-01 03:27:23');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_19_122013_create_posts_table', 2),
(4, '2019_03_20_054421_alter_users_table', 3),
(5, '2019_03_20_060624_create_user_roles_table', 3),
(6, '2019_03_20_095029_create_roles_table', 4),
(7, '2019_03_22_103019_create_cms_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Active', '2019-03-20 05:26:48', '2019-03-22 04:57:23'),
(4, 'Subscriber', 'Active', '2019-03-21 23:58:00', '2019-03-22 04:36:08'),
(5, 'Editor', 'Inactive', '2019-03-21 23:58:33', '2019-03-26 03:30:32'),
(6, 'user profile', 'Active', '2019-03-27 07:54:03', '2019-03-28 04:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `show_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `show_password`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', 'admin@simplecrm.com.sg', NULL, '123456', '$2y$10$qi/2Fpt2ePAcWuvCQr74nuTCpQQKSLmy3n.YpKSL5k4eAy61xmHXK', 'cFUIFvJuI6cwu576SyDzCRU9uBR1W7vbc7y4zyjScPbXDTyXVqc0iLWLxrK2', 'Active', '2019-03-22 08:10:23', '2019-03-22 08:10:23'),
(2, 6, 'Anjali', 'anjali@simplecrm.com.sg', NULL, '123456', '$2y$10$hP6pOLdI4PuEZgeofL1tl.zUVCQ5kaoZrHc6wY5T608oIBZKo714y', 'xrmGU1KhkfCQmNqgB3yNqa10fqnYfpeGeWa1RqrkxEl26EAVlVBRpnAuc0iU', 'Active', '2019-03-27 07:47:19', '2019-03-27 07:47:19'),
(3, 4, 'Rajni', 'rajni@simplecrm.com.sg', NULL, '123456', '$2y$10$9q4Sq1f4EqK.YbB.7zyKSuIr6XbQ9WogZHIvtUceYDaVPrP0kV3q6', '7gvaObv8KX0ipw3Ww3uxF8JYCAGRCKJZsE1GugXKa83dkvL9GOv1RMnJ9PoB', 'Active', '2019-03-27 07:47:52', '2019-03-27 07:47:52'),
(4, 6, 'Mrunali', 'mrunali@simplecrm.com.sg', NULL, '123456', '$2y$10$yTXyTXUUm3oTcRxi3fxfnOwkewTVhYy0nE92RxTNZm9swCB0nfwvC', 'pGyEIgZ6GMN1y2fbHsv9ObX70t8ZcDhUdaWGqFB52dJtDKZds6O5Xyik1qSh', 'Active', '2019-03-27 07:48:28', '2019-03-29 04:21:52'),
(5, 4, 'Ashish', 'ashish@simplecrm.com.sg', NULL, '123456', '$2y$10$psQY12vUqnlbQ02CZCm/COoAX3zMuMtVL4OsWQ5TbtIcofiQqvJ4G', '2FY2Jf5T7iR16FOZmskyedpqgjFYvZ5zAtpyzFfrG6h52ZV7BTZB71m08EP8', 'Active', '2019-03-27 07:49:11', '2019-03-27 07:49:11'),
(9, 6, 'Naina ddf dcs', 'adaa@simplecrm.com.sg', NULL, '123456', '$2y$10$u9TEdTTqeQIbC4OCOHay3.RBmuL3g5Xk3fhBWUYBHswc07NmYXLvm', NULL, 'Inactive', '2019-03-28 05:29:51', '2019-03-28 05:56:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
