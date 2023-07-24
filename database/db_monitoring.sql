-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 03:54 PM
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
-- Database: `db_monitoring`
--

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_07_11_013735_tbl_pengguna', 1),
(5, '2023_07_11_013816_tbl_walimurid', 1),
(6, '2023_07_11_013816_tbl_walimurid copy', 1),
(7, '2023_07_11_013829_tbl_mtrharian', 1),
(8, '2023_07_11_013841_tbl_mtrbulanan', 1),
(9, '2023_07_11_013852_tbl_mtrsemesteran', 1),
(10, '2023_07_11_013909_tbl_guru', 1),
(12, '2023_07_12_032616_tbl_kelas', 2),
(15, '2023_07_11_013803_tbl_santri', 3),
(16, '2023_07_12_054120_tbl_walimurid', 4),
(17, '2023_07_14_010043_tbl_mtrbulanan', 5);

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
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `guru_username` varchar(255) DEFAULT NULL,
  `guru_password` varchar(255) DEFAULT NULL,
  `guru_nama` varchar(255) DEFAULT NULL,
  `guru_foto` varchar(255) DEFAULT NULL,
  `guru_jk` varchar(255) DEFAULT NULL,
  `guru_ttl` date DEFAULT NULL,
  `guru_alamat` text DEFAULT NULL,
  `guru_jabatan` varchar(255) DEFAULT NULL,
  `guru_nohp` varchar(255) DEFAULT NULL,
  `guru_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id`, `kelas_id`, `guru_username`, `guru_password`, `guru_nama`, `guru_foto`, `guru_jk`, `guru_ttl`, `guru_alamat`, `guru_jabatan`, `guru_nohp`, `guru_email`, `created_at`, `updated_at`) VALUES
(11, 2, 'hayati', '$2y$10$95bm.3XtmMnKoMUEXRbxn.2UvH78oCp1y0viXJR7Y2BEFbsmq7h1.', 'bu guru hayati', '2023-07-142022062512582220190114141318Dzah Halimah.png', 'Laki-laki', '1950-02-16', 'koto baru', 'guru kelas 1 dan 2', '08123873457', 'hayati@gmail.com', '2023-07-15 08:03:28', '2023-07-16 07:19:13'),
(30, 4, 'elia12', '$2y$10$oxJI0sET/gPx1xVqWMJJ..SCS2Eu6y0eGGvC8HKdecglehmN0fHN2', 'Elia Yanti', '2023-07-1420230615090112kurikulum.jpeg', 'Perempuan', '1970-07-15', 'Padang', 'Guru', '085363229534', 'Elia86@gmail.com', '2023-07-12 17:25:25', '2023-07-16 07:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id`, `kelas_nama`, `created_at`, `updated_at`) VALUES
(1, 'Kelas 1 ', '2023-07-11 20:45:42', '2023-07-11 20:45:42'),
(2, 'Kelas 2', '2023-07-11 20:45:53', '2023-07-11 20:45:53'),
(3, 'Kelas 3', '2023-07-11 20:46:03', '2023-07-11 20:46:11'),
(4, 'Kelas 4', '2023-07-11 20:46:24', '2023-07-11 20:46:42'),
(5, 'Kelas 5', '2023-07-11 20:46:25', '2023-07-11 20:46:25'),
(6, 'Kelas 6', '2023-07-11 20:46:51', '2023-07-11 20:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mtrbulanan`
--

CREATE TABLE `tbl_mtrbulanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mtrbulanan_sholat` varchar(255) DEFAULT NULL,
  `mtrbulanan_doa_harian` varchar(255) DEFAULT NULL,
  `mtrbulanan_surah_pendek` varchar(255) DEFAULT NULL,
  `mtrbulanan_quran` varchar(255) DEFAULT NULL,
  `list_sholat` varchar(255) DEFAULT NULL,
  `list_doa_harian` varchar(255) DEFAULT NULL,
  `list_surah_pendek` varchar(255) DEFAULT NULL,
  `list_quran` varchar(255) DEFAULT NULL,
  `mtrbulanan_tgl` date DEFAULT NULL,
  `nilai_solat` int(11) NOT NULL,
  `nilai_doa_harian` int(11) NOT NULL,
  `nilai_surah_pendek` int(11) NOT NULL,
  `nilai_quran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_mtrbulanan`
--

INSERT INTO `tbl_mtrbulanan` (`id`, `santri_id`, `guru_id`, `kelas_id`, `mtrbulanan_sholat`, `mtrbulanan_doa_harian`, `mtrbulanan_surah_pendek`, `mtrbulanan_quran`, `list_sholat`, `list_doa_harian`, `list_surah_pendek`, `list_quran`, `mtrbulanan_tgl`, `nilai_solat`, `nilai_doa_harian`, `nilai_surah_pendek`, `nilai_quran`, `created_at`, `updated_at`) VALUES
(2, 3, 6, 2, 'Bacaan Solat Sudah Bagus', 'Tingkatkan hafalan', 'Perjelas Makhraj', 'Tingkatkan Bacaan', 'Bacaan sholat', 'Doa keluar rumah', 'Ad-duha', 'Seni baca quran', '2023-07-14', 70, 30, 70, 60, '2023-07-13 19:08:09', '2023-07-13 19:08:09'),
(6, 3, 6, 2, 'Tingkatkan Hafalan', 'Tingkatkan Hafalan', 'Belum Hafal', 'Belajar Lagi Dirumah', 'Bacaan sholat', 'Doa keluar rumah', 'At-tin', 'Seni baca quran', '2023-08-15', 95, 90, 85, 70, '2023-07-14 03:34:08', '2023-07-14 03:34:08'),
(7, 3, 6, 2, 'Belajar Lagi Dirumah', 'Belajar Lagi Dirumah masih ragu-ragu', 'Belajar Lagi Dirumah masih ragu-ragu', 'Belajar Magraj Lagi', 'Bacaan sholat', 'Doa masuk/keluar masjid', 'At-tin', 'Tajwid', '2023-06-14', 70, 75, 80, 70, '2023-07-14 03:47:46', '2023-07-14 03:47:46'),
(8, 1, 11, 2, 'masih banyak gerakan', 'belum lancar', 'benahi tajwid', 'perbaiki tajwid', 'Gerakan sholat', 'Doa keluar rumah', 'Ad-duha', 'Tajwid', '2023-07-13', 60, 20, 20, 30, '2023-07-15 08:30:50', '2023-07-15 08:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mtrharian`
--

CREATE TABLE `tbl_mtrharian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `catatan_hari` varchar(255) DEFAULT NULL,
  `catatan_laporan` varchar(255) DEFAULT NULL,
  `catatan_tgl` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_mtrharian`
--

INSERT INTO `tbl_mtrharian` (`id`, `santri_id`, `guru_id`, `kelas_id`, `catatan_hari`, `catatan_laporan`, `catatan_tgl`, `created_at`, `updated_at`) VALUES
(7, 1, 10, 2, 'Sabtu', 'Mengaji Sampai Surat Albaqarah ayat 10', '2023-07-15', '2023-07-15 00:54:18', '2023-07-15 00:54:18'),
(9, 1, 11, 2, NULL, 'rajin belajar ya nak', '2023-07-18', '2023-07-18 06:37:03', '2023-07-18 06:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mtrsemesteran`
--

CREATE TABLE `tbl_mtrsemesteran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catatan_id` int(11) NOT NULL,
  `santri_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mtrsemesteran_sholat` varchar(255) DEFAULT NULL,
  `mtrsemesteran_doa_harian` varchar(255) DEFAULT NULL,
  `mtrsemesteran_surah_pendek` varchar(255) DEFAULT NULL,
  `mtrsemesteran_quran` varchar(255) DEFAULT NULL,
  `mtrsemesteran_tgl` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengguna_nama` varchar(255) DEFAULT NULL,
  `pengguna_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','guru','walimurid') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id`, `pengguna_nama`, `pengguna_email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(6, 'admin ', 'admin@admin.com', '$2y$10$s.AGyEQWUxRWuNKKzYeh6exOoUGdSZhHGWRlJMM7gREvOjam/7tDO', 'admin', '2023-07-11 01:19:15', '2023-07-14 14:12:16'),
(8, 'rosidin12', '', '$2y$10$4/Jy5nh6DwghluIHWJmwCOBcJ2hI2VdVoCrMzv8Xg7hMIzEjUDOAC', 'walimurid', '2023-07-14 15:38:16', '2023-07-14 15:38:16'),
(15, 'elia12', '64b1cfce68c9c', '$2y$10$wB5cxCLTVvTcUx3jyHCSRuZfI7929ytkSs5sNMOhX6KsSbb86YJQe', 'guru', '2023-07-14 15:44:30', '2023-07-14 15:44:30'),
(16, 'ratna12', '64b1d040c3e3a', '$2y$10$8CTUZ9fqXBdUbN6h8y.Olebvdhzdx/FyW8Y8yHTIRGW9dUDARyUHC', 'guru', '2023-07-14 15:46:25', '2023-07-15 06:31:00'),
(21, 'gilang', 'gilang@mail.com', '$2y$10$VjH3GutHhKijNNc3pKlJf.w8O2pea4Ndi/7A2/zJIwoAzghJKBESK', 'guru', '2023-07-15 00:52:03', '2023-07-15 00:52:03'),
(22, 'rahmadina', '64b2515b77f88', '$2y$10$4x3Y6uQh70vEq6h1aMqEwu94gQQjUn3LZNrM0nSwS2Y.nSdGWSnOG', 'walimurid', '2023-07-15 00:57:15', '2023-07-15 00:57:15'),
(23, 'pak doni', 'doni@gmail.com', '$2y$10$FTnLEKZZuKalo9LYMHTL/e8XI.oikxNr1c1CjRManZUco2wAdfIcC', 'guru', '2023-07-15 06:37:55', '2023-07-15 06:37:55'),
(24, 'hayati', 'hayati@gmail.com', '$2y$10$122P3Xi0rgZL3Gbd4cdjqu0X28evHI.CZ.OqPlokHmAZQDmLbelmW', 'guru', '2023-07-15 08:03:28', '2023-07-15 08:03:28'),
(25, 'lina', '64b2b74d8cb40', '$2y$10$AZ9I8ZVjxindXrHscurpJOsdyxlvM9omAkCCavtMNISEbRiB7Bvpm', 'walimurid', '2023-07-15 08:12:13', '2023-07-15 08:12:13'),
(26, 'siti', '64b3e13acd562', '$2y$10$gLwFtUgDTbRt6eo5imG5hOMlQWKIS4wWr3/56IYD69VkdjDITiUDO', 'guru', '2023-07-16 05:23:23', '2023-07-16 05:23:23'),
(27, 'ayu', '64b3eb089524d', '$2y$10$3tFBApR0Y7hdf5SgJntBfO1LD0uxUfJECJW.SCy1jM/KLoHk1GdWS', 'guru', '2023-07-16 06:05:12', '2023-07-16 06:05:12'),
(28, 'zxc', '64b3f6e28fc69', '$2y$10$IDugd6senyCCtQQa.l4OEOKBrpvS9T9X2NSdERAEih/3NeILOtMtW', 'guru', '2023-07-16 06:55:46', '2023-07-16 06:55:46'),
(29, 'sd', '64b3f7aef062f', '$2y$10$gkxaGz677YAkXIhf5veL5.T7wYmmg7nrkV/o5Y5RUBUqklXlXSzf6', 'guru', '2023-07-16 06:59:11', '2023-07-16 06:59:11'),
(30, 'ayu', '64b3f977a6949', '$2y$10$fo4E8Fe0KXOYwjqig1TtruCmQ/y2f9CL9Mrc2U/LSDIODNCbWQVN.', 'guru', '2023-07-16 07:06:47', '2023-07-16 07:06:47'),
(31, 'baru', '64b3fdb7a2152', '$2y$10$etl7dMWUUBQ2lFwszKivWOVTgJg77ZZPTH4mj99wKdNDIrINaPKCu', 'guru', '2023-07-16 07:24:55', '2023-07-16 07:24:55'),
(32, 'rahma', '64b4d4bb18906', '$2y$10$6iu.8w93VAXkWe7AKzk2nufEraFFzQsHEloVvIthzIpGw4479E8fK', 'guru', '2023-07-16 22:42:19', '2023-07-16 22:42:19'),
(33, 'hardi', '64b4d6f55ca74', '$2y$10$shQy74hLH3u.fl/fjN1vr.JtxGYw5CjjlaM3sVdbcmpstbkc3BFsq', 'guru', '2023-07-16 22:51:49', '2023-07-16 22:51:49'),
(34, 'rian', '64b4d8673ec80', '$2y$10$flm0NMgaWJD6gvXyQ9VZqOFu5K4BvIHxCE5CsQ4/tRiRQv8u6vCr.', 'guru', '2023-07-16 22:57:59', '2023-07-16 22:57:59'),
(35, 'xx@gmail.com', '64b4d960dbdae', '$2y$10$y3gMB3PxNNtBm0tnj4ziVeOgwJP5fUNrTlIPGjOImjdTUrLcBLILi', 'guru', '2023-07-16 23:02:08', '2023-07-16 23:02:08'),
(36, 'www', '64b4db88737c7', '$2y$10$pVnHzJK0uZRD8dCrYD2/.u2f3Dox/2Od4BmD7Uj6lFYcyVsJPRATq', 'guru', '2023-07-16 23:11:20', '2023-07-16 23:11:20'),
(37, 'irfan', '64b4f2714de7b', '$2y$10$8eK5qmsN27xb.f.hVXpwA.kxkul1i2p4Huoi3M106wazdR/dfvWiK', 'guru', '2023-07-17 00:49:05', '2023-07-17 00:49:05'),
(38, 'pakdos', '64b4fe31c6d94', '$2y$10$rk2bW/8vo7GehA.yXpE.U.GBrI01GJsbH30FmdGsHdPVI4fjKgbXe', 'guru', '2023-07-17 01:39:14', '2023-07-17 01:39:14'),
(39, 'pakdos', '64b4fe3383f6d', '$2y$10$F9YyNhDRbQswB36fd.fCPe8ywSdNoJlJe26yiTuR8CQIgV6yrvE2u', 'guru', '2023-07-17 01:39:15', '2023-07-17 01:39:15'),
(40, 'pakdos', '64b4fe34e9874', '$2y$10$Uxv.P6EJLoJjEJMLRyUO2eNYx3rfnrt2KaIjS5e5GxdWS6..ON6s2', 'guru', '2023-07-17 01:39:17', '2023-07-17 01:39:17'),
(41, 'pakdos', '64b4fe36102e5', '$2y$10$kefELsYmhfU1qPtuOQ6nWum2xpzs5xHUZEUDSaDyv2PrUt2bSwnTW', 'guru', '2023-07-17 01:39:18', '2023-07-17 01:39:18'),
(42, 'pakdos', '64b4fe36a1b35', '$2y$10$CtHUpI4LvOoMdPLdx7asburlqK7cFFDSlUWNa2UQgMxSskPPNVjE6', 'guru', '2023-07-17 01:39:18', '2023-07-17 01:39:18'),
(43, 'pakdos', '64b4fe3738dca', '$2y$10$xzEm0fVcTMQmLOqo/4KOF.2fUn4pJU.IRrYkka/2My321kxMvgmdW', 'guru', '2023-07-17 01:39:19', '2023-07-17 01:39:19'),
(44, 'siti', '64b4ff2e8d3fb', '$2y$10$nij46uSUVRCV9wniROCE0eMWxizMqkIX5p8j67nCu.kFyJjT9Ie1y', 'guru', '2023-07-17 01:43:26', '2023-07-17 01:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_santri`
--

CREATE TABLE `tbl_santri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `santri_nis` varchar(255) DEFAULT NULL,
  `santri_nama` varchar(255) DEFAULT NULL,
  `santri_jk` varchar(255) DEFAULT NULL,
  `santri_tmp_lhr` varchar(255) DEFAULT NULL,
  `santri_tgl_lhr` varchar(255) DEFAULT NULL,
  `santri_alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_santri`
--

INSERT INTO `tbl_santri` (`id`, `kelas_id`, `guru_id`, `santri_nis`, `santri_nama`, `santri_jk`, `santri_tmp_lhr`, `santri_tgl_lhr`, `santri_alamat`, `created_at`, `updated_at`) VALUES
(1, 2, 11, '19965343434', 'Rina Ferbriana', 'Perempuan', 'Solok Laweh', '2009-07-12', 'Solok', '2023-07-11 21:36:52', '2023-07-13 09:45:28'),
(3, 2, 11, '19965343434', 'Marvel Saputra', 'Laki-laki', 'Padang', '2008-07-13', 'Padang', '2023-07-13 09:45:18', '2023-07-13 09:45:18'),
(4, 2, 30, '14.256', 'bayu', 'Laki-laki', 'bukittinggi', '2023-07-19', 'jr.sungai sakai', '2023-07-15 08:06:01', '2023-07-15 08:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_walimurid`
--

CREATE TABLE `tbl_walimurid` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `walimurid_nama` varchar(255) DEFAULT NULL,
  `walimurid_jk` varchar(255) DEFAULT NULL,
  `walimurid_tmp_lhr` varchar(255) DEFAULT NULL,
  `walimurid_tgl_lhr` varchar(255) DEFAULT NULL,
  `walimurid_email` varchar(255) DEFAULT NULL,
  `walimurid_tlp` varchar(255) DEFAULT NULL,
  `walimurid_alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_walimurid`
--

INSERT INTO `tbl_walimurid` (`id`, `santri_id`, `username`, `password`, `walimurid_nama`, `walimurid_jk`, `walimurid_tmp_lhr`, `walimurid_tgl_lhr`, `walimurid_email`, `walimurid_tlp`, `walimurid_alamat`, `created_at`, `updated_at`) VALUES
(5, 3, 'rosidin12', '$2y$10$fE4ohat7OQi3n9OATFI21uQJBztA7OKJexHp7x/lt2Z65XbWnm0Jy', 'Rosidin Bahri', 'Laki-laki', 'Padang Tarok', '1980-07-14', 'rosidinbahri45@gmail.com', '085363553635', 'Padang', '2023-07-14 15:38:16', '2023-07-14 15:38:16'),
(10, 1, 'rahmadina', '$2y$10$V.tvb1ObpN3YPHP5vfw/teOsBLK.AmyVdTewaMT56PgygIhXm83s.', 'Rahmadina', 'Perempuan', 'disitu lahirnya', '1992-02-01', 'rahmadina@gmail.com', '92348708923', 'Padang Laweh Dekat Rumah Gilang', '2023-07-15 00:57:15', '2023-07-15 00:57:15'),
(11, 4, 'lina', '$2y$10$EWDR8qz6RxJiFjZfY4ey9uwlT.zcRsWdyob4iS1/TLwMFYR.3EdxS', 'herlina', 'Perempuan', 'sumedang', '2023-07-20', 'lina@gmail.com', '083453456456', 'jr.sungai sakai', '2023-07-15 08:12:13', '2023-07-15 08:12:13');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mtrbulanan`
--
ALTER TABLE `tbl_mtrbulanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mtrharian`
--
ALTER TABLE `tbl_mtrharian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mtrsemesteran`
--
ALTER TABLE `tbl_mtrsemesteran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_pengguna_pengguna_email_unique` (`pengguna_email`);

--
-- Indexes for table `tbl_santri`
--
ALTER TABLE `tbl_santri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_walimurid`
--
ALTER TABLE `tbl_walimurid`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_mtrbulanan`
--
ALTER TABLE `tbl_mtrbulanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_mtrharian`
--
ALTER TABLE `tbl_mtrharian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_mtrsemesteran`
--
ALTER TABLE `tbl_mtrsemesteran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_santri`
--
ALTER TABLE `tbl_santri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_walimurid`
--
ALTER TABLE `tbl_walimurid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
