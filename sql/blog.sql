-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2024 at 04:03 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `user_id`) VALUES
(1, 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `penulis` bigint UNSIGNED NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `judul`, `slug`, `penulis`, `isi`, `gambar`, `category_id`, `created_at`) VALUES
(1, 'tes', 'tes', 5, '', 'Cover Notulensi SmCity_1718121293.png', 1, '0000-00-00 00:00:00'),
(3, 'tes', 'tes-2', 5, '&lt;div&gt;&amp;nbsp;tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp; tes&amp;nbsp;&lt;/div&gt;', 'Cover Notulensi SmCity_1718121536.png', 1, '0000-00-00 00:00:00'),
(4, 'Rafi Jauhari', 'rafi-jauhari', 5, '&lt;div&gt;Rafi Jauhari&lt;/div&gt;', 'auryn_1718248977.jpg', 1, '2024-06-13 03:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama`) VALUES
(1, 'Sport'),
(2, 'Education'),
(3, 'News'),
(4, 'future'),
(5, 'lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `user_id`, `comment`, `created_at`) VALUES
(1, 3, 5, 'assalamualaikum', '2024-06-11 16:49:34'),
(2, 1, 5, '', '2024-06-11 16:49:54'),
(3, 3, 5, 'waalaikumsalam', '2024-06-11 17:44:05'),
(4, 3, 5, 'tes', '2024-06-12 01:09:17'),
(5, 1, 5, 'asda', '2024-06-12 13:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `readers`
--

CREATE TABLE `readers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `readers`
--

INSERT INTO `readers` (`id`, `user_id`, `name`, `created_at`) VALUES
(1, 4, 'Haikal AlKamily', '2024-05-23 06:04:05'),
(2, 5, 'Rafi Jo', '2024-05-23 07:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Writer'),
(3, 'Reader');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$B9x5oUtKpomXzmViL11CweTAkaKLDEo6/N/pclxnniSwqXDQQrMeO', 'admin@example.com', 1, '2024-05-20 09:28:23', '2024-05-20 09:28:23'),
(2, 'Jeje', '$2y$12$ns.mhAYJbarTI/F3wM3ZWOdveeyZupm/2ArVchCyMABImR/GVDAhy', 'jetrosulthan@gmail.com', 2, '2024-05-22 10:28:23', '2024-05-22 10:28:23'),
(3, 'nuril', '$2y$12$e1jD42aY5CvPVQdnJT0RzelcSWIBnOsST1UbkKc51F1lubPP60X46', 'haikal.nuril23@gmail.com', 2, '2024-05-22 12:48:53', '2024-05-22 12:48:53'),
(4, 'haikal', '$2y$12$YJhurfxjQn8PkBbyep2mgOp3t4ofGSNrXVvHnDr2b0mFbEbrCaXyC', 'haikalteroris@gmail.com', 3, '2024-05-23 06:04:05', '2024-05-23 06:04:05'),
(5, 'jo', '$2y$12$MjibErpURSjL.4O7Q31eDOP75oBhMpy662LBClQL1.JE/0tBmPgVW', 'rafijoe@gmail.com', 2, '2024-05-23 07:08:40', '2024-06-10 13:49:45'),
(6, 'Rafi Jauhari', '$2y$10$ly9bpUYoRx75XrdOZutm..uyXnkr0GOBKN1HIpWm4Doq4tzhDAAse', 'rafijoe44@gmail.com', 2, '2024-06-12 15:34:45', '2024-06-12 15:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`id`, `user_id`, `name`, `phone`, `created_at`) VALUES
(1, 2, 'Jetro Sulthan', '0831033410568', '2024-05-22 10:28:23'),
(2, 3, 'Haikal Nuril', '0895370577773', '2024-05-22 12:48:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
