-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 11:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sourcedartnew_source_dart_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `best_ofs`
--

CREATE TABLE `best_ofs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url_youtube` varchar(255) NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `date`, `name`, `event_id`, `created_at`, `updated_at`) VALUES
(5, '2023-10-07', 'samedi', 2, '2023-10-05 08:37:30', '2024-02-04 19:03:01'),
(7, '2023-10-08', 'dimanche', 2, '2023-10-07 12:08:03', '2024-02-04 19:02:48'),
(8, '2024-02-07', 'mercredi', 2, '2024-02-04 19:03:35', '2024-02-04 19:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `eposters`
--

CREATE TABLE `eposters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eposters`
--

INSERT INTO `eposters` (`id`, `pdf`, `name`, `event_id`, `created_at`, `updated_at`) VALUES
(6, '169649871353998.pdf', 'eposter2', 2, '2023-10-05 08:38:33', '2023-10-05 08:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `primary_color` varchar(255) NOT NULL,
  `secendary_color` varchar(255) NOT NULL,
  `btn_acc` varchar(255) DEFAULT NULL,
  `btn_pro` varchar(255) DEFAULT NULL,
  `btn_red` varchar(255) DEFAULT NULL,
  `btn_epo` varchar(255) DEFAULT NULL,
  `btn_x_pc` varchar(255) DEFAULT NULL,
  `btn_y_pc` varchar(255) DEFAULT NULL,
  `btn_x_mobile` varchar(255) DEFAULT NULL,
  `btn_y_mobile` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `header` varchar(255) NOT NULL,
  `thumbnail_pc` varchar(255) NOT NULL,
  `thumbnail_mobile` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `primary_color`, `secendary_color`, `btn_acc`, `btn_pro`, `btn_red`, `btn_epo`, `btn_x_pc`, `btn_y_pc`, `btn_x_mobile`, `btn_y_mobile`, `logo`, `header`, `thumbnail_pc`, `thumbnail_mobile`, `created_at`, `updated_at`) VALUES
(2, 'smp 2023', '#1a5fb4', '#e41b1b', 'acc.png', 'pro.png', 'red.png', 'epo.png', '10', '52', '18', '55', 'logo.png', 'header.jpg', '1.jpg', '2.jpg', '2023-10-05 08:37:30', '2024-02-04 19:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `event_id`, `created_at`, `updated_at`) VALUES
(13, 'img (0).jpg', 2, '2023-10-05 08:44:04', '2023-10-05 08:44:04'),
(14, 'img (1).jpg', 2, '2023-10-05 08:44:06', '2023-10-05 08:44:06'),
(15, 'img (2).jpg', 2, '2023-10-05 08:44:07', '2023-10-05 08:44:07'),
(16, 'img (3).jpg', 2, '2023-10-05 08:44:09', '2023-10-05 08:44:09'),
(17, 'img (4).jpg', 2, '2023-10-05 08:44:11', '2023-10-05 08:44:11'),
(18, 'img (5).jpg', 2, '2023-10-05 08:44:12', '2023-10-05 08:44:12'),
(19, 'img (6).jpg', 2, '2023-10-05 08:44:13', '2023-10-05 08:44:13'),
(20, 'img (7).jpg', 2, '2023-10-05 08:44:14', '2023-10-05 08:44:14'),
(21, 'img (8).jpg', 2, '2023-10-05 08:44:15', '2023-10-05 08:44:15'),
(22, 'img (9).jpg', 2, '2023-10-05 08:44:17', '2023-10-05 08:44:17'),
(23, 'img (10).jpg', 2, '2023-10-05 08:44:19', '2023-10-05 08:44:19'),
(24, 'img (11).jpg', 2, '2023-10-05 08:44:20', '2023-10-05 08:44:20'),
(25, 'img (12).jpg', 2, '2023-10-05 08:44:21', '2023-10-05 08:44:21'),
(27, 'img (13).jpg', 2, '2023-10-07 12:13:01', '2023-10-07 12:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_20_185200_create_events_table', 1),
(6, '2023_09_20_185305_create_best_ofs_table', 1),
(7, '2023_09_20_185353_create_images_table', 1),
(8, '2023_09_20_185436_create_days_table', 1),
(9, '2023_09_20_185500_create_themes_table', 1),
(10, '2023_09_27_205557_create_programmes_table', 1),
(11, '2023_09_28_112832_create_eposters_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `image`, `event_id`, `created_at`, `updated_at`) VALUES
(17, '169658675250126.jpg', 2, '2023-10-06 09:05:52', '2023-10-06 09:05:52'),
(18, '169658675273562.jpg', 2, '2023-10-06 09:05:52', '2023-10-06 09:05:52'),
(25, '1696683632170.jpg', 2, '2023-10-07 12:00:32', '2023-10-07 12:00:32'),
(26, '169668363273728.jpg', 2, '2023-10-07 12:00:32', '2023-10-07 12:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `path_video` varchar(255) DEFAULT NULL,
  `day_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `image`, `video_url`, `path_video`, `day_id`, `created_at`, `updated_at`) VALUES
(9, '169663412436192.png', 'https://www.youtube.com/embed/_y4Rkdk_B3Q?si=jWl33-gmZvWdiKp0', NULL, 5, '2023-10-06 22:15:24', '2023-10-06 22:15:24'),
(11, '169663417687386.png', 'https://www.youtube.com/embed/_y4Rkdk_B3Q?si=jWl33-', NULL, 5, '2023-10-06 22:16:16', '2023-10-06 22:16:16'),
(13, '169668426466153.png', 'https://www.youtube.com/embed/_y4Rkdk_B3Q?si=jWl33-gmZvWdiKp0', NULL, 7, '2023-10-07 12:11:04', '2023-10-07 12:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$S7WTI5z1YPZ.l7gtembnsuDTZVSttthJJ6vvK1ki2KMHN8fE7Zglm', NULL, '2023-10-07 09:04:44', '2023-10-07 09:04:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `best_ofs`
--
ALTER TABLE `best_ofs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `best_ofs_event_id_foreign` (`event_id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `days_event_id_foreign` (`event_id`);

--
-- Indexes for table `eposters`
--
ALTER TABLE `eposters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eposters_event_id_foreign` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_event_id_foreign` (`event_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programmes_event_id_foreign` (`event_id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `themes_day_id_foreign` (`day_id`);

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
-- AUTO_INCREMENT for table `best_ofs`
--
ALTER TABLE `best_ofs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `eposters`
--
ALTER TABLE `eposters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `best_ofs`
--
ALTER TABLE `best_ofs`
  ADD CONSTRAINT `best_ofs_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `days`
--
ALTER TABLE `days`
  ADD CONSTRAINT `days_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `eposters`
--
ALTER TABLE `eposters`
  ADD CONSTRAINT `eposters_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `programmes`
--
ALTER TABLE `programmes`
  ADD CONSTRAINT `programmes_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `themes`
--
ALTER TABLE `themes`
  ADD CONSTRAINT `themes_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
