-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 03:26 PM
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
-- Database: `fuzzy`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) NOT NULL,
  `normal` double(8,2) DEFAULT 0.00,
  `ringan` double(8,2) DEFAULT 0.00,
  `sedang` double(8,2) DEFAULT 0.00,
  `berat` double(8,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `nama`, `normal`, `ringan`, `sedang`, `berat`, `created_at`, `updated_at`) VALUES
(1, 'test', 2.55, 0.00, 0.00, 0.00, NULL, NULL),
(2, 'asd', 0.00, 0.00, 0.00, 25.50, NULL, NULL),
(3, 'asdasd', 0.00, 0.00, 0.00, 25.50, NULL, NULL),
(4, 'amal', 0.00, 0.00, 0.00, 25.50, NULL, NULL),
(5, 'aku yang terusir', 0.00, 7.50, 0.00, 0.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosagejalas`
--

CREATE TABLE `diagnosagejalas` (
  `diagnoses_id` bigint(20) UNSIGNED NOT NULL,
  `gejalas_id` bigint(20) UNSIGNED NOT NULL,
  `weight` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnosagejalas`
--

INSERT INTO `diagnosagejalas` (`diagnoses_id`, `gejalas_id`, `weight`, `created_at`, `updated_at`) VALUES
(1, 1, 0.15, NULL, NULL),
(1, 2, 0.15, NULL, NULL),
(1, 3, 0.15, NULL, NULL),
(1, 4, 0.15, NULL, NULL),
(1, 5, 0.15, NULL, NULL),
(1, 6, 0.15, NULL, NULL),
(1, 7, 0.15, NULL, NULL),
(1, 8, 0.15, NULL, NULL),
(1, 9, 0.15, NULL, NULL),
(1, 10, 0.15, NULL, NULL),
(1, 11, 0.15, NULL, NULL),
(1, 12, 0.15, NULL, NULL),
(1, 13, 0.15, NULL, NULL),
(1, 14, 0.15, NULL, NULL),
(1, 15, 0.15, NULL, NULL),
(1, 16, 0.15, NULL, NULL),
(1, 17, 0.15, NULL, NULL),
(1, 18, 0.15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnoses`
--

INSERT INTO `diagnoses` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Depresi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gejalas`
--

CREATE TABLE `gejalas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gejalas`
--

INSERT INTO `gejalas` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Merasa sedih, kosong, atau tanpa harapan.\n', NULL, NULL),
(2, 'Mudah tersinggung atau frustrasi, bahkan untuk hal-hal kecil\n', NULL, NULL),
(3, 'Insomnia (sulit tidur atau sering terbangun).\n', NULL, NULL),
(4, 'Hypersomnia (terlalu banyak tidur).\r\n', NULL, NULL),
(5, 'Penurunan berat badan atau nafsu makan.\r\n', NULL, NULL),
(6, 'Peningkatan berat badan atau nafsu makan\r\n', NULL, NULL),
(7, 'Kehilangan minat pada hobi atau aktivitas yang biasanya disukai.', NULL, NULL),
(8, 'Merasa tidak ada kegembiraan atau kesenangan dalam aktivitas  sehari-hari', NULL, NULL),
(9, 'Merasa lelah sepanjang waktu.', NULL, NULL),
(10, 'Kurangnya energi untuk melakukan tugas-tugas harian', NULL, NULL),
(11, 'Perasaan bersalah yang tidak semestinya atau berlebihan.', NULL, NULL),
(12, 'Merasa tidak berguna atau tidak berarti.', NULL, NULL),
(13, 'Sulit untuk berpikir, berkonsentrasi, atau membuat keputusan', NULL, NULL),
(14, 'Gelisah atau tidak bisa duduk diam.', NULL, NULL),
(15, 'Gerakan atau bicara yang lebih lambat dari biasanya', NULL, NULL),
(16, 'Pikiran tentang bunuh diri atau keinginan untuk mati.', NULL, NULL),
(17, 'Perencanaan atau upaya bunuh diri\r\n', NULL, NULL),
(18, 'Sulit membuat keputusan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_07_20_131036_create_users_table', 1),
(2, '2024_05_21_162125_create_diagnoses_table', 1),
(3, '2024_05_21_162347_create_gejalas_table', 1),
(4, '2024_05_21_164108_create_diagnosagejalas_table', 1),
(5, '2024_07_10_140005_create_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `level` enum('admin','users') NOT NULL DEFAULT 'users',
  `umur` varchar(191) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(191) NOT NULL,
  `status` enum('Verifikasi','Belum Verifikasi') NOT NULL DEFAULT 'Belum Verifikasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `level`, `umur`, `alamat`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', '25', 'asd', '$2y$10$apKf8885MOHS/wXzz6UCgOwlJORe.zIJ/ihQi2rfYJhruzWRNhS1q', 'Verifikasi', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosagejalas`
--
ALTER TABLE `diagnosagejalas`
  ADD PRIMARY KEY (`diagnoses_id`,`gejalas_id`),
  ADD KEY `diagnosagejalas_gejalas_id_foreign` (`gejalas_id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejalas`
--
ALTER TABLE `gejalas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gejalas`
--
ALTER TABLE `gejalas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diagnosagejalas`
--
ALTER TABLE `diagnosagejalas`
  ADD CONSTRAINT `diagnosagejalas_diagnoses_id_foreign` FOREIGN KEY (`diagnoses_id`) REFERENCES `diagnoses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diagnosagejalas_gejalas_id_foreign` FOREIGN KEY (`gejalas_id`) REFERENCES `gejalas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
