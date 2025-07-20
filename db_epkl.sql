-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2025 at 09:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_epkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam_absen` time DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `status` enum('hadir','izin_sakit','izin_keluarga','izin_lainnya','alpha') NOT NULL DEFAULT 'alpha',
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `siswa_id`, `tanggal`, `jam_absen`, `lokasi`, `foto`, `jam_masuk`, `jam_keluar`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(20, 14, '2025-07-13', '13:24:46', NULL, NULL, NULL, NULL, 'hadir', NULL, '2025-07-13 06:24:46', '2025-07-13 06:24:46'),
(22, 15, '2025-07-13', '14:10:25', NULL, NULL, NULL, NULL, 'hadir', NULL, '2025-07-13 07:10:25', '2025-07-13 07:10:25'),
(35, 15, '2025-07-14', '07:12:31', NULL, NULL, NULL, NULL, 'hadir', NULL, '2025-07-14 00:12:31', '2025-07-14 00:12:31'),
(38, 14, '2025-07-14', NULL, NULL, NULL, NULL, NULL, 'alpha', 'Tidak melakukan absen', '2025-07-14 13:23:48', '2025-07-14 13:23:48'),
(47, 29, '2025-07-15', '00:08:41', '1.1272192,104.0416768', 'absensi_foto/1752512921_FOTOKU.png', NULL, NULL, 'hadir', NULL, '2025-07-14 17:08:41', '2025-07-14 17:08:41'),
(49, 14, '2025-07-15', NULL, NULL, NULL, NULL, NULL, 'alpha', 'Tidak melakukan absen', '2025-07-15 15:19:07', '2025-07-15 15:19:07'),
(50, 15, '2025-07-15', NULL, NULL, NULL, NULL, NULL, 'alpha', 'Tidak melakukan absen', '2025-07-15 15:19:07', '2025-07-15 15:19:07'),
(52, 15, '2025-07-16', '06:43:52', '1.1272192,104.0449536', 'absensi_foto/1752623032_FOTOKU.png', NULL, NULL, 'hadir', NULL, '2025-07-15 23:43:52', '2025-07-15 23:43:52'),
(53, 29, '2025-07-16', '17:05:24', '1.1272192,104.0449536', 'absensi_foto/1752660324_FOTOKU.png', NULL, NULL, 'hadir', NULL, '2025-07-16 10:05:24', '2025-07-16 10:05:24'),
(54, 14, '2025-07-16', NULL, NULL, NULL, NULL, NULL, 'alpha', 'Tidak melakukan absen', '2025-07-16 10:11:21', '2025-07-16 10:11:21'),
(55, 14, '2025-07-20', '11:20:54', '1.1370496,104.0384', 'absensi_foto/1752985254_FOTOKU.png', NULL, NULL, 'hadir', NULL, '2025-07-20 04:20:54', '2025-07-20 04:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `activity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `activity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Melakukan Login', '2025-07-05 10:25:15', '2025-07-05 10:25:15'),
(2, 1, 'Melakukan Login', '2025-07-05 13:42:24', '2025-07-05 13:42:24'),
(3, 1, 'Melakukan Login', '2025-07-05 13:58:11', '2025-07-05 13:58:11'),
(4, 1, 'Melakukan Login', '2025-07-05 14:09:24', '2025-07-05 14:09:24'),
(5, 1, 'Melakukan Login', '2025-07-05 14:19:18', '2025-07-05 14:19:18'),
(6, 1, 'Melakukan Login', '2025-07-05 14:45:06', '2025-07-05 14:45:06'),
(7, 1, 'Melakukan Login', '2025-07-06 00:49:57', '2025-07-06 00:49:57'),
(8, 37, 'Melakukan Login', '2025-07-06 01:02:58', '2025-07-06 01:02:58'),
(9, 1, 'Melakukan Login', '2025-07-06 01:11:32', '2025-07-06 01:11:32'),
(10, 38, 'Melakukan Login', '2025-07-06 01:11:58', '2025-07-06 01:11:58'),
(13, 37, 'Melakukan Login', '2025-07-09 17:51:33', '2025-07-09 17:51:33'),
(14, 1, 'Melakukan Login', '2025-07-12 14:58:44', '2025-07-12 14:58:44'),
(19, 37, 'Melakukan Login', '2025-07-12 15:39:04', '2025-07-12 15:39:04'),
(20, 1, 'Melakukan Login', '2025-07-12 15:43:28', '2025-07-12 15:43:28'),
(21, 38, 'Melakukan Login', '2025-07-12 15:44:10', '2025-07-12 15:44:10'),
(22, 37, 'Melakukan Login', '2025-07-12 15:46:48', '2025-07-12 15:46:48'),
(23, 38, 'Melakukan Login', '2025-07-12 16:49:20', '2025-07-12 16:49:20'),
(26, 37, 'Melakukan Login', '2025-07-12 17:55:55', '2025-07-12 17:55:55'),
(28, 37, 'Melakukan Login', '2025-07-13 02:10:57', '2025-07-13 02:10:57'),
(30, 37, 'Melakukan Login', '2025-07-13 02:12:18', '2025-07-13 02:12:18'),
(31, 1, 'Melakukan Login', '2025-07-13 03:00:18', '2025-07-13 03:00:18'),
(32, 37, 'Melakukan Login', '2025-07-13 03:01:56', '2025-07-13 03:01:56'),
(33, 1, 'Melakukan Login', '2025-07-13 03:02:48', '2025-07-13 03:02:48'),
(34, 37, 'Melakukan Login', '2025-07-13 03:04:58', '2025-07-13 03:04:58'),
(36, 37, 'Melakukan Login', '2025-07-13 03:06:27', '2025-07-13 03:06:27'),
(37, 1, 'Melakukan Login', '2025-07-13 04:37:36', '2025-07-13 04:37:36'),
(39, 1, 'Melakukan Login', '2025-07-13 05:13:27', '2025-07-13 05:13:27'),
(41, 40, 'Melakukan Login', '2025-07-13 05:25:09', '2025-07-13 05:25:09'),
(42, 1, 'Melakukan Login', '2025-07-13 06:11:23', '2025-07-13 06:11:23'),
(43, 37, 'Melakukan Login', '2025-07-13 06:13:43', '2025-07-13 06:13:43'),
(44, 1, 'Melakukan Login', '2025-07-13 06:15:05', '2025-07-13 06:15:05'),
(45, 37, 'Melakukan Login', '2025-07-13 06:21:51', '2025-07-13 06:21:51'),
(46, 38, 'Melakukan Login', '2025-07-13 06:23:35', '2025-07-13 06:23:35'),
(47, 55, 'Melakukan Login', '2025-07-13 06:24:10', '2025-07-13 06:24:10'),
(48, 37, 'Melakukan Login', '2025-07-13 06:25:21', '2025-07-13 06:25:21'),
(49, 38, 'Melakukan Login', '2025-07-13 06:26:25', '2025-07-13 06:26:25'),
(50, 40, 'Melakukan Login', '2025-07-13 06:50:01', '2025-07-13 06:50:01'),
(52, 40, 'Melakukan Login', '2025-07-13 06:52:54', '2025-07-13 06:52:54'),
(53, 38, 'Melakukan Login', '2025-07-13 06:53:42', '2025-07-13 06:53:42'),
(54, 41, 'Melakukan Login', '2025-07-13 06:54:20', '2025-07-13 06:54:20'),
(55, 1, 'Melakukan Login', '2025-07-13 07:07:42', '2025-07-13 07:07:42'),
(56, 56, 'Melakukan Login', '2025-07-13 07:10:16', '2025-07-13 07:10:16'),
(58, 37, 'Melakukan Login', '2025-07-13 07:12:40', '2025-07-13 07:12:40'),
(59, 40, 'Melakukan Login', '2025-07-13 07:13:24', '2025-07-13 07:13:24'),
(60, 41, 'Melakukan Login', '2025-07-13 07:17:20', '2025-07-13 07:17:20'),
(61, 38, 'Melakukan Login', '2025-07-13 07:18:11', '2025-07-13 07:18:11'),
(62, 1, 'Melakukan Login', '2025-07-13 08:58:33', '2025-07-13 08:58:33'),
(64, 37, 'Melakukan Login', '2025-07-13 09:00:24', '2025-07-13 09:00:24'),
(65, 41, 'Melakukan Login', '2025-07-13 09:00:53', '2025-07-13 09:00:53'),
(66, 1, 'Melakukan Login', '2025-07-13 09:48:44', '2025-07-13 09:48:44'),
(68, 37, 'Melakukan Login', '2025-07-13 09:51:01', '2025-07-13 09:51:01'),
(69, 40, 'Melakukan Login', '2025-07-13 09:52:09', '2025-07-13 09:52:09'),
(70, 41, 'Melakukan Login', '2025-07-13 09:52:38', '2025-07-13 09:52:38'),
(71, 38, 'Melakukan Login', '2025-07-13 09:53:25', '2025-07-13 09:53:25'),
(72, 37, 'Melakukan Login', '2025-07-13 13:55:19', '2025-07-13 13:55:19'),
(73, 40, 'Melakukan Login', '2025-07-13 14:22:52', '2025-07-13 14:22:52'),
(74, 1, 'Melakukan Login', '2025-07-13 16:01:05', '2025-07-13 16:01:05'),
(77, 37, 'Melakukan Login', '2025-07-13 16:07:14', '2025-07-13 16:07:14'),
(78, 38, 'Melakukan Login', '2025-07-13 16:08:22', '2025-07-13 16:08:22'),
(79, 1, 'Melakukan Login', '2025-07-13 16:24:04', '2025-07-13 16:24:04'),
(81, 1, 'Melakukan Login', '2025-07-13 16:26:48', '2025-07-13 16:26:48'),
(83, 1, 'Melakukan Login', '2025-07-13 16:44:36', '2025-07-13 16:44:36'),
(85, 1, 'Melakukan Login', '2025-07-13 16:47:35', '2025-07-13 16:47:35'),
(87, 1, 'Melakukan Login', '2025-07-13 16:53:49', '2025-07-13 16:53:49'),
(89, 37, 'Melakukan Login', '2025-07-13 16:56:03', '2025-07-13 16:56:03'),
(91, 37, 'Melakukan Login', '2025-07-13 17:11:23', '2025-07-13 17:11:23'),
(92, 40, 'Melakukan Login', '2025-07-13 17:11:59', '2025-07-13 17:11:59'),
(95, 37, 'Melakukan Login', '2025-07-14 00:12:02', '2025-07-14 00:12:02'),
(96, 56, 'Melakukan Login', '2025-07-14 00:12:20', '2025-07-14 00:12:20'),
(98, 37, 'Melakukan Login', '2025-07-14 05:48:54', '2025-07-14 05:48:54'),
(100, 37, 'Melakukan Login', '2025-07-14 05:49:56', '2025-07-14 05:49:56'),
(101, 37, 'Melakukan Login', '2025-07-14 13:23:42', '2025-07-14 13:23:42'),
(103, 1, 'Melakukan Login', '2025-07-14 13:24:46', '2025-07-14 13:24:46'),
(106, 37, 'Melakukan Login', '2025-07-14 13:34:01', '2025-07-14 13:34:01'),
(108, 38, 'Melakukan Login', '2025-07-14 13:58:20', '2025-07-14 13:58:20'),
(110, 37, 'Melakukan Login', '2025-07-14 14:01:37', '2025-07-14 14:01:37'),
(111, 38, 'Melakukan Login', '2025-07-14 14:02:59', '2025-07-14 14:02:59'),
(113, 1, 'Melakukan Login', '2025-07-14 14:55:40', '2025-07-14 14:55:40'),
(115, 1, 'Melakukan Login', '2025-07-14 15:13:01', '2025-07-14 15:13:01'),
(119, 1, 'Melakukan Login', '2025-07-14 17:00:26', '2025-07-14 17:00:26'),
(120, 37, 'Melakukan Login', '2025-07-14 17:01:40', '2025-07-14 17:01:40'),
(121, 71, 'Melakukan Login', '2025-07-14 17:06:41', '2025-07-14 17:06:41'),
(122, 55, 'Melakukan Login', '2025-07-14 17:09:08', '2025-07-14 17:09:08'),
(123, 1, 'Melakukan Login', '2025-07-14 17:11:21', '2025-07-14 17:11:21'),
(124, 37, 'Melakukan Login', '2025-07-14 17:14:08', '2025-07-14 17:14:08'),
(126, 1, 'Melakukan Login', '2025-07-15 15:08:14', '2025-07-15 15:08:14'),
(127, 37, 'Melakukan Login', '2025-07-15 15:15:21', '2025-07-15 15:15:21'),
(128, 38, 'Melakukan Login', '2025-07-15 15:23:25', '2025-07-15 15:23:25'),
(129, 41, 'Melakukan Login', '2025-07-15 15:27:02', '2025-07-15 15:27:02'),
(131, 55, 'Melakukan Login', '2025-07-15 15:32:34', '2025-07-15 15:32:34'),
(132, 1, 'Melakukan Login', '2025-07-15 15:44:33', '2025-07-15 15:44:33'),
(134, 1, 'Melakukan Login', '2025-07-15 15:58:20', '2025-07-15 15:58:20'),
(135, 56, 'Melakukan Login', '2025-07-15 23:18:18', '2025-07-15 23:18:18'),
(136, 56, 'Melakukan Login', '2025-07-15 23:32:53', '2025-07-15 23:32:53'),
(137, 37, 'Melakukan Login', '2025-07-16 00:01:22', '2025-07-16 00:01:22'),
(138, 56, 'Melakukan Login', '2025-07-16 09:57:56', '2025-07-16 09:57:56'),
(139, 1, 'Melakukan Login', '2025-07-16 09:59:12', '2025-07-16 09:59:12'),
(140, 71, 'Melakukan Login', '2025-07-16 09:59:53', '2025-07-16 09:59:53'),
(141, 55, 'Melakukan Login', '2025-07-16 10:05:53', '2025-07-16 10:05:53'),
(142, 1, 'Melakukan Login', '2025-07-16 10:06:10', '2025-07-16 10:06:10'),
(143, 55, 'Melakukan Login', '2025-07-16 10:06:47', '2025-07-16 10:06:47'),
(144, 37, 'Melakukan Login', '2025-07-16 10:08:42', '2025-07-16 10:08:42'),
(145, 37, 'Melakukan Login', '2025-07-16 10:13:33', '2025-07-16 10:13:33'),
(146, 37, 'Melakukan Login', '2025-07-16 10:16:22', '2025-07-16 10:16:22'),
(147, 55, 'Melakukan Login', '2025-07-20 04:19:05', '2025-07-20 04:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `aspek_teknis`
--

CREATE TABLE `aspek_teknis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `capaian_pembelajaran` text NOT NULL,
  `elemen` text NOT NULL,
  `siswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pembimbing_industri_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aspek_teknis`
--

INSERT INTO `aspek_teknis` (`id`, `jurusan`, `capaian_pembelajaran`, `elemen`, `siswa_id`, `pembimbing_industri_id`, `created_at`, `updated_at`, `user_id`) VALUES
(29, 'Teknik Jaringan Komputer dan Telekomunikasi', 'Mampu menerapkan kompetensi teknis pada pekerjaan sesuai POS yang berlaku di dunia kerja', '1. Perencanaan dan Pengalamatan Jaringan\r\n2. Teknologi Jaringan Kabel dan Nirkabel\r\n3. Keamanan Jaringan\r\n4. Pemasangan dan KonfigurasI Perangkat Jaringan\r\n5. Adminitrasi Sistem Jaringan', 14, 5, '2025-07-13 06:21:28', '2025-07-13 06:21:28', 1),
(31, 'Teknik Kendaraan Ringan Otomotif', 'Mampu menerapkan kompetensi teknis pada pekerjaan sesuai POS yang berlaku di dunia kerja', '1. Konversi Energi Kendaraan Ringan\r\n2. Proses Pelayanan dan Manajemen Bengkel Kendaraan Ringan\r\n3. Prosedur Penggunaan Kendaraan Ringan\r\n4. Perawatan Berkala Kendaraan Ringan\r\n5. Sistem Pemindah Tenaga Kendaraaan Ringan', 15, 5, '2025-07-15 15:14:45', '2025-07-15 15:14:45', 1),
(32, 'Teknik Pengelasan', 'Mampu menerapkan kompetensi teknis pada pekerjaan sesuai POS yang berlaku di dunia kerja', '1. Teknik Gambar\r\n2. Pengelasan O A W\r\n3. Pengelasan S M A W\r\n4. Pengelasan G M A W\r\n5. Pengelasan F C A W\r\n6. Pengelasan G T A W\r\n7. Mutu Pengelasan', 29, 5, '2025-07-15 15:15:01', '2025-07-15 15:15:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `aspek_teknis_user`
--

CREATE TABLE `aspek_teknis_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aspek_teknis_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `guru_pembimbings`
--

CREATE TABLE `guru_pembimbings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_pembimbings`
--

INSERT INTO `guru_pembimbings` (`id`, `user_id`, `nip`, `nama_lengkap`, `jurusan`, `email`, `kontak`, `created_at`, `updated_at`) VALUES
(4, 38, '19791212 200604 1 003', '-', 'Teknik Pemesinan', 'agus@gmail.com', '08987654321', '2025-07-02 12:58:40', '2025-07-02 13:16:53'),
(5, 41, '19871124 201103 2 002', '-', 'Teknik Jaringan Komputer dan Telekomunikasi', 'ardi@gmail.com', '08765432123', '2025-07-02 13:29:35', '2025-07-02 13:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Pemesinan', '2025-06-27 02:54:16', '2025-06-27 02:54:16'),
(2, 'Teknik Jaringan Komputer dan Telekomunikasi', '2025-06-27 02:54:16', '2025-06-27 02:54:16'),
(3, 'Teknik Kendaraan Ringan Otomotif', '2025-06-27 02:54:16', '2025-06-27 02:54:16'),
(4, 'Teknik Alat Berat', '2025-06-27 02:54:16', '2025-06-27 02:54:16'),
(5, 'Teknik Pengelasan', '2025-06-27 02:54:16', '2025-06-27 02:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kegiatan` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('menunggu','disetujui','ditolak') NOT NULL DEFAULT 'menunggu',
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `siswa_id`, `tanggal`, `kegiatan`, `foto`, `status`, `catatan`, `created_at`, `updated_at`) VALUES
(10, 14, '2025-07-13', 'testtttt', 'kegiatan-foto/1752387879_10web2.png', 'disetujui', NULL, '2025-07-13 06:24:39', '2025-07-13 06:25:35'),
(15, 14, '2025-07-15', 'Mengoperasikan Mesin Milling', 'kegiatan-foto/1752593661_WhatsApp Image 2025-07-15 at 22.32.08_19be13cb.jpg', 'ditolak', 'test', '2025-07-15 15:34:22', '2025-07-16 00:03:23'),
(16, 15, '2025-07-16', 'mengoperasikan mesin milling', 'kegiatan-foto/1752623430_WhatsApp Image 2025-07-15 at 22.32.08_19be13cb.jpg', 'disetujui', NULL, '2025-07-15 23:50:30', '2025-07-16 00:02:32'),
(17, 29, '2025-07-16', 'mengoperasikan mesin milling', 'kegiatan-foto/1752660289_WhatsApp Image 2025-05-03 at 07.40.34_fd7c24b4.jpg', 'disetujui', NULL, '2025-07-16 10:04:49', '2025-07-16 10:17:08');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_25_145230_add_role_to_users_table', 1),
(5, '2025_05_22_000001_create_sessions_table', 1),
(6, '2025_05_27_233130_create_pembimbing_industris_table', 1),
(7, '2025_05_31_234650_create_guru_pembimbings_table', 1),
(8, '2025_06_01_143327_create_siswas_table', 1),
(9, '2025_06_01_181540_create_activity_logs_table', 1),
(10, '2025_06_04_031955_create_proyeks_table', 1),
(11, '2025_06_04_032041_create_proyek_siswa_table', 1),
(12, '2025_06_04_032141_create_tugas_table', 1),
(13, '2025_06_04_032245_create_tugas_siswa_table', 1),
(14, '2025_06_06_104842_add_periode_mulai_selesai_to_siswa_table', 2),
(15, '2025_06_06_123652_remove_periode_from_siswas_table', 3),
(16, '2025_06_06_130538_create_siswas_table', 4),
(17, '2025_06_06_144458_alter_siswas_nullable_dates', 5),
(18, '2025_06_07_140039_create_aspek_teknis_table', 6),
(19, '2025_06_07_210415_add_elemen_to_aspek_teknis_table', 7),
(20, '2025_06_07_222249_create_template_aspek_teknis_table', 8),
(21, '2025_06_08_053645_create_aspek_teknis_user_table', 9),
(22, '2025_06_12_084619_create_kegiatans_table', 10),
(23, '2025_06_12_110755_create_aspekteknis_table', 10),
(24, '2025_06_12_110955_create_template_aspekteknis_table', 11),
(25, '2025_06_12_121940_create_alter_siswas_nullables_date_table', 11),
(26, '2025_06_12_124413_create_absensi_table', 11),
(27, '2025_06_13_181831_create_add_pembimbing_industri_id_to_siswas', 11),
(28, '2025_06_14_165254_create_umpan_balik_table', 11),
(29, '2025_06_14_214125_create_penilaian_table', 11),
(30, '2025_06_25_010748_add_jam_absen_to_absensi_table', 12),
(31, '2025_06_27_093000_create_jurusans_table', 13),
(32, '2025_06_28_012822_drop_old_fields_from_penilaian_table', 14),
(33, '2025_06_28_013047_add_json_fields_to_penilaian_table', 15),
(36, '2025_07_02_235342_create_siswa_pembimbing_tables', 16),
(37, '2025_07_03_124424_create_siswa_guru_pembimbing_table', 17),
(39, '2025_07_03_181016_create_siswa_pembimbing_tables', 18),
(40, '2025_07_03_232319_add_guru_pembimbing_id_to_siswas_table', 19),
(41, '2025_07_05_171310_create_activity_logs_table', 20),
(42, '2025_07_13_003306_add_lokasi_to_absensi_table', 21),
(43, '2025_07_13_233259_add_foto_to_absensi_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing_industris`
--

CREATE TABLE `pembimbing_industris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nama_industri` varchar(255) NOT NULL,
  `bidang_industri` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) NOT NULL,
  `nama_pimpinan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembimbing_industris`
--

INSERT INTO `pembimbing_industris` (`id`, `user_id`, `nama_lengkap`, `nama_industri`, `bidang_industri`, `alamat`, `kontak`, `nama_pimpinan`, `created_at`, `updated_at`) VALUES
(5, 37, '-', 'PT. Multi Engineering Perkasa', 'Fabrikasi', 'Kawasan Tunas Industri, Batam Center, Batam', '08123456789', 'Dedi Junaidi', '2025-07-02 12:56:48', '2025-07-02 13:07:55'),
(6, 40, '-', 'PT. Cipta Teknologi Nusantara', 'Teknologi Informasi dan Jaringan', 'Jl. Gatot Subroto No. 15, Batam Center, Kota Batam', '08543216781', 'Joko Susilo', '2025-07-02 13:28:49', '2025-07-02 13:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `pembimbing_industri_id` bigint(20) UNSIGNED NOT NULL,
  `total_teknis` int(11) DEFAULT NULL,
  `total_nonteknis` int(11) DEFAULT NULL,
  `total_keseluruhan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `teknis_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`teknis_json`)),
  `nonteknis_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`nonteknis_json`)),
  `grade` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `pembimbing_industri_id` bigint(20) UNSIGNED NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `keterangan` text DEFAULT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `siswa_id`, `pembimbing_industri_id`, `nama_file`, `file_path`, `original_name`, `file_size`, `status`, `keterangan`, `tanggal_upload`, `created_at`, `updated_at`) VALUES
(7, 14, 5, 'sertifikat_1324516_1752512773.pdf', 'sertifikat/sertifikat_1324516_1752512773.pdf', 'Muhammad Ali Maksum.pdf', 1296084, 'approved', NULL, '2025-07-14 17:06:13', '2025-07-14 17:06:13', '2025-07-14 17:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('xnRNC9YGMpCL9xchsRvAt07CWyapZ2tGch6IjMhj', 55, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib0FtdW9ONUJFckNNU0ZiS21LSkR0QzFBM083QmhmNzN0emVVZnc4cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaXN3YS9hYnNlbnNpIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTU7fQ==', 1752985255);

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `periode_mulai` date DEFAULT NULL,
  `periode_selesai` date DEFAULT NULL,
  `pembimbing_industri_id` bigint(20) UNSIGNED DEFAULT NULL,
  `guru_pembimbing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `user_id`, `nis`, `nama_lengkap`, `kelas`, `jurusan`, `email`, `kontak`, `periode_mulai`, `periode_selesai`, `pembimbing_industri_id`, `guru_pembimbing_id`, `created_at`, `updated_at`) VALUES
(14, 55, '3312411092', '-', '12a', 'Teknik Jaringan Komputer dan Telekomunikasi', 'afifah@gmail.com', '0812345677', '2025-08-01', '2025-11-30', 5, 5, '2025-07-13 06:17:55', '2025-07-15 15:12:07'),
(15, 56, '3312411034', '-', '12b', 'Teknik Kendaraan Ringan Otomotif', 'rifki@gmail.com', '08123461829', '2025-08-01', '2025-11-30', 5, 5, '2025-07-13 07:08:09', '2025-07-15 15:13:12'),
(29, 71, '3312411031', '-', '12e', 'Teknik Pengelasan', 'anjas@gmail.com', '08123461843', '2025-08-01', '2025-11-30', 5, 4, '2025-07-14 17:00:58', '2025-07-15 15:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_guru_pembimbing`
--

CREATE TABLE `siswa_guru_pembimbing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `guru_pembimbing_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa_guru_pembimbing`
--

INSERT INTO `siswa_guru_pembimbing` (`id`, `siswa_id`, `guru_pembimbing_id`, `created_at`, `updated_at`) VALUES
(13, 55, 38, NULL, NULL),
(14, 56, 38, NULL, NULL),
(28, 71, 38, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_pembimbing_industri`
--

CREATE TABLE `siswa_pembimbing_industri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `pembimbing_industri_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa_pembimbing_industri`
--

INSERT INTO `siswa_pembimbing_industri` (`id`, `siswa_id`, `pembimbing_industri_id`, `created_at`, `updated_at`) VALUES
(13, 55, 37, NULL, NULL),
(14, 56, 37, NULL, NULL),
(28, 71, 37, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `template_aspek_teknis`
--

CREATE TABLE `template_aspek_teknis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `capaian_pembelajaran` text NOT NULL,
  `elemen` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template_aspek_teknis`
--

INSERT INTO `template_aspek_teknis` (`id`, `jurusan`, `capaian_pembelajaran`, `elemen`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Pemesinan', 'Mampu menerapkan kompetensi teknis pada pekerjaan sesuai POS yang berlaku di dunia kerja', '1. Gambar Teknik Manufaktur\n2. Teknik Pemesinan Bubut\n3. Teknik Pemesinan Frais\n4. Teknik Pemesinan Gerinda\n5. Teknik Pemesinan Nonkonvensional', '2025-06-07 18:41:46', '2025-06-07 18:41:46'),
(2, 'Teknik Jaringan Komputer dan Telekomunikasi', 'Mampu menerapkan kompetensi teknis pada pekerjaan sesuai POS yang berlaku di dunia kerja', '1. Perencanaan dan Pengalamatan Jaringan\n2. Teknologi Jaringan Kabel dan Nirkabel\n3. Keamanan Jaringan\n4. Pemasangan dan KonfigurasI Perangkat Jaringan\n5. Adminitrasi Sistem Jaringan', '2025-06-07 18:41:46', '2025-06-07 18:41:46'),
(3, 'Teknik Kendaraan Ringan Otomotif', 'Mampu menerapkan kompetensi teknis pada pekerjaan sesuai POS yang berlaku di dunia kerja', '1. Konversi Energi Kendaraan Ringan\n2. Proses Pelayanan dan Manajemen Bengkel Kendaraan Ringan\n3. Prosedur Penggunaan Kendaraan Ringan\n4. Perawatan Berkala Kendaraan Ringan\n5. Sistem Pemindah Tenaga Kendaraaan Ringan', '2025-06-07 18:41:46', '2025-06-07 18:41:46'),
(4, 'Teknik Alat Berat', 'Mampu menerapkan kompetensi teknis pada pekerjaan sesuai POS yang berlaku di dunia kerja', '1. Model Unit Alat Berat atau Product Knowledge\n2. Gambar Teknik\n3. Diesel Engine Alat Berat\n4. Sistem Kelistrikan Alat Berat\n5. Sistem Hydraulic Alat Berat', '2025-06-07 18:41:46', '2025-06-07 18:41:46'),
(5, 'Teknik Pengelasan', 'Mampu menerapkan kompetensi teknis pada pekerjaan sesuai POS yang berlaku di dunia kerja', '1. Teknik Gambar\n2. Pengelasan O A W\n3. Pengelasan S M A W\n4. Pengelasan G M A W\n5. Pengelasan F C A W\n6. Pengelasan G T A W\n7. Mutu Pengelasan', '2025-06-07 18:41:46', '2025-06-07 18:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `umpan_balik`
--

CREATE TABLE `umpan_balik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `pembimbing_industri_id` bigint(20) UNSIGNED NOT NULL,
  `isi_umpan_balik` text NOT NULL,
  `status` enum('draft','terkirim') NOT NULL DEFAULT 'terkirim',
  `tanggal_kirim` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `umpan_balik`
--

INSERT INTO `umpan_balik` (`id`, `siswa_id`, `pembimbing_industri_id`, `isi_umpan_balik`, `status`, `tanggal_kirim`, `created_at`, `updated_at`) VALUES
(5, 14, 37, 'tesmjhjkhkuolipo', 'terkirim', '2025-07-13 06:22:34', '2025-07-13 06:22:34', '2025-07-13 06:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` enum('admin','pembimbing_industri','guru_pembimbing','siswa') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin1', 'admin', 'admin', '$2y$12$Za0yFcUpy6fFiAl58qEbTOfwVxJatJ8VwaV8q/uWdqJKiafMr0Mga', '2025-06-05 03:41:04', '2025-06-05 03:41:04'),
(37, 'Fredy Setiawan', 'fredy', 'pembimbing_industri', '$2y$12$3ixhY51ZK7WgMD4lr7k.NuOC/h9Fgxlch14vWIXdbrRfNibJRvpPu', '2025-07-02 12:56:48', '2025-07-13 06:16:42'),
(38, 'Agus Solihin', 'agus', 'guru_pembimbing', '$2y$12$cpZm25v/W28ea94YR6P6aeob6e1dFqwwmtJgcUKAP54wNmtw//PAe', '2025-07-02 12:58:40', '2025-07-13 06:16:31'),
(40, 'Wahyu Hidayat', 'wahyu', 'pembimbing_industri', '$2y$12$eAWxJ4Nb6HrHUCI7c2ueOeBwOyzJM5yc8f7wXqd57pFKXlkA8xfwK', '2025-07-02 13:28:49', '2025-07-13 06:16:22'),
(41, 'Ardiansyah', 'ardi', 'guru_pembimbing', '$2y$12$6NDX0Vk2pHwnu6gudfJZpeu6AchMX6x3so1A3n6Zw4s5F4hPU.qyK', '2025-07-02 13:29:35', '2025-07-13 06:15:59'),
(55, 'siti nur afifah', 'afifah', 'siswa', '$2y$12$07FIOzoLEALQj7HhVxiO0uzYywliMcXvcrUd.L11iXee5tar/9UC6', '2025-07-13 06:17:55', '2025-07-13 06:17:55'),
(56, 'Muhammad Rifki', 'rifki', 'siswa', '$2y$12$KXkLvI1U3zPS5e62kJZS/uYrhLyUwLM58c20BFuHulBCa/nEHLcz2', '2025-07-13 07:08:09', '2025-07-15 15:13:12'),
(71, 'Anjasmara', 'anjas', 'siswa', '$2y$12$rQnPFa/i89Y6x8oAf/4eIOhmFsjNbGKxweBc5nfA2L1zmulAyUg3K', '2025-07-14 17:00:58', '2025-07-15 15:14:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `absensi_siswa_id_tanggal_unique` (`siswa_id`,`tanggal`);

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `aspek_teknis`
--
ALTER TABLE `aspek_teknis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aspek_teknis_siswa_id_foreign` (`siswa_id`),
  ADD KEY `aspek_teknis_pembimbing_industri_id_foreign` (`pembimbing_industri_id`);

--
-- Indexes for table `aspek_teknis_user`
--
ALTER TABLE `aspek_teknis_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aspek_teknis_user_aspek_teknis_id_foreign` (`aspek_teknis_id`),
  ADD KEY `aspek_teknis_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guru_pembimbings`
--
ALTER TABLE `guru_pembimbings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_pembimbings_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jurusans_nama_unique` (`nama`);

--
-- Indexes for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatans_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembimbing_industris`
--
ALTER TABLE `pembimbing_industris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembimbing_industris_user_id_foreign` (`user_id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_siswa_id_foreign` (`siswa_id`),
  ADD KEY `penilaian_pembimbing_industri_id_foreign` (`pembimbing_industri_id`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sertifikat_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_user_id_foreign` (`user_id`),
  ADD KEY `siswas_pembimbing_industri_id_foreign` (`pembimbing_industri_id`),
  ADD KEY `siswas_guru_pembimbing_id_foreign` (`guru_pembimbing_id`);

--
-- Indexes for table `siswa_guru_pembimbing`
--
ALTER TABLE `siswa_guru_pembimbing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_guru_pembimbing_siswa_id_foreign` (`siswa_id`),
  ADD KEY `siswa_guru_pembimbing_guru_pembimbing_id_foreign` (`guru_pembimbing_id`);

--
-- Indexes for table `siswa_pembimbing_industri`
--
ALTER TABLE `siswa_pembimbing_industri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_pembimbing_industri_siswa_id_foreign` (`siswa_id`),
  ADD KEY `siswa_pembimbing_industri_pembimbing_industri_id_foreign` (`pembimbing_industri_id`);

--
-- Indexes for table `template_aspek_teknis`
--
ALTER TABLE `template_aspek_teknis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `umpan_balik_siswa_id_foreign` (`siswa_id`),
  ADD KEY `umpan_balik_pembimbing_industri_id_foreign` (`pembimbing_industri_id`);

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
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `aspek_teknis`
--
ALTER TABLE `aspek_teknis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `aspek_teknis_user`
--
ALTER TABLE `aspek_teknis_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru_pembimbings`
--
ALTER TABLE `guru_pembimbings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `pembimbing_industris`
--
ALTER TABLE `pembimbing_industris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `siswa_guru_pembimbing`
--
ALTER TABLE `siswa_guru_pembimbing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `siswa_pembimbing_industri`
--
ALTER TABLE `siswa_pembimbing_industri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `template_aspek_teknis`
--
ALTER TABLE `template_aspek_teknis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `aspek_teknis`
--
ALTER TABLE `aspek_teknis`
  ADD CONSTRAINT `aspek_teknis_pembimbing_industri_id_foreign` FOREIGN KEY (`pembimbing_industri_id`) REFERENCES `pembimbing_industris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aspek_teknis_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `aspek_teknis_user`
--
ALTER TABLE `aspek_teknis_user`
  ADD CONSTRAINT `aspek_teknis_user_aspek_teknis_id_foreign` FOREIGN KEY (`aspek_teknis_id`) REFERENCES `aspek_teknis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aspek_teknis_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `guru_pembimbings`
--
ALTER TABLE `guru_pembimbings`
  ADD CONSTRAINT `guru_pembimbings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD CONSTRAINT `kegiatans_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembimbing_industris`
--
ALTER TABLE `pembimbing_industris`
  ADD CONSTRAINT `pembimbing_industris_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_pembimbing_industri_id_foreign` FOREIGN KEY (`pembimbing_industri_id`) REFERENCES `pembimbing_industris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `sertifikat_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_guru_pembimbing_id_foreign` FOREIGN KEY (`guru_pembimbing_id`) REFERENCES `guru_pembimbings` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `siswas_pembimbing_industri_id_foreign` FOREIGN KEY (`pembimbing_industri_id`) REFERENCES `pembimbing_industris` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `siswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswa_guru_pembimbing`
--
ALTER TABLE `siswa_guru_pembimbing`
  ADD CONSTRAINT `siswa_guru_pembimbing_guru_pembimbing_id_foreign` FOREIGN KEY (`guru_pembimbing_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_guru_pembimbing_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswa_pembimbing_industri`
--
ALTER TABLE `siswa_pembimbing_industri`
  ADD CONSTRAINT `siswa_pembimbing_industri_pembimbing_industri_id_foreign` FOREIGN KEY (`pembimbing_industri_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_pembimbing_industri_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  ADD CONSTRAINT `umpan_balik_pembimbing_industri_id_foreign` FOREIGN KEY (`pembimbing_industri_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `umpan_balik_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
