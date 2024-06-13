-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2024 at 03:52 AM
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
