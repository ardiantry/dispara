-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 12:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dispara`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` mediumtext NOT NULL,
  `isi` mediumtext NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artikel_recents`
--

CREATE TABLE `artikel_recents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tamu_id` bigint(20) UNSIGNED NOT NULL,
  `artikel_id` bigint(20) UNSIGNED NOT NULL,
  `visited_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` mediumtext NOT NULL,
  `isi` mediumtext NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `berita_recents`
--

CREATE TABLE `berita_recents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tamu_id` bigint(20) UNSIGNED NOT NULL,
  `berita_id` bigint(20) UNSIGNED NOT NULL,
  `visited_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamus`
--

CREATE TABLE `buku_tamus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pelindung` varchar(255) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` mediumtext NOT NULL,
  `last_visited_post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku_tamus`
--

INSERT INTO `buku_tamus` (`id`, `user_id`, `pelindung`, `no_hp`, `alamat`, `last_visited_post_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'Politeknik Negeri Indramayu', '0888888888888', 'Bangkir', 3, '2023-06-19 01:15:31', '2023-07-20 03:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` mediumtext NOT NULL,
  `isi` mediumtext NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `image`, `title`, `isi`, `tgl_mulai`, `tgl_selesai`, `kategori_id`, `author`, `created_at`, `updated_at`) VALUES
(1, 'event_image/5PFztk2koVLWk9tv8Rhk7tK1jCI6EziWdHetbEt2.jpg', 'test', '<p>acara test</p>', '2023-07-23 02:02:00', '2023-07-24 02:02:00', 1, 'iqbal', '2023-07-23 00:25:11', '2023-07-23 00:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `event_penggunas`
--

CREATE TABLE `event_penggunas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tamu_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_recents`
--

CREATE TABLE `event_recents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tamu_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `visited_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `kategori_artikels`
--

CREATE TABLE `kategori_artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_beritas`
--

CREATE TABLE `kategori_beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_beritas`
--

INSERT INTO `kategori_beritas` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Olahraga', '2023-06-19 01:15:31', '2023-06-19 01:15:31'),
(2, 'Berita Media', '2023-06-19 01:15:31', '2023-06-19 01:15:31'),
(3, 'Edukasi & Tips', '2023-06-19 01:15:31', '2023-06-19 01:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_events`
--

CREATE TABLE `kategori_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_events`
--

INSERT INTO `kategori_events` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Ekonomi Kreatif', '2023-06-19 01:15:31', '2023-06-19 01:15:31'),
(2, 'Budaya', '2023-06-19 01:15:31', '2023-06-19 01:15:31'),
(3, 'Event', '2023-06-19 01:15:31', '2023-06-19 01:15:31'),
(4, 'Olahraga', '2023-06-19 01:15:31', '2023-06-19 01:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_wisatas`
--

CREATE TABLE `kategori_wisatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_wisatas`
--

INSERT INTO `kategori_wisatas` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Wisata Alam', '2023-06-19 01:15:31', '2023-06-19 01:15:31'),
(2, 'Wisata buatan', '2023-06-19 01:15:31', '2023-06-19 01:15:31'),
(3, 'Wisata Kuliner', '2023-06-19 01:15:31', '2023-06-19 01:15:31'),
(4, 'Wisata Sejarah', '2023-06-19 01:15:31', '2023-06-19 01:15:31'),
(5, 'Wisata Edukasi', '2023-06-19 01:15:31', '2023-06-19 01:15:31');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_23_074232_create_kategori_beritas_table', 1),
(6, '2023_04_30_062343_create_beritas_table', 1),
(7, '2023_04_30_120923_create_kategori_events_table', 1),
(8, '2023_04_30_121225_create_buku_tamus_table', 1),
(9, '2023_05_30_064921_create_kategori_wisatas_table', 1),
(10, '2023_05_30_120626_create_events_table', 1),
(11, '2023_05_30_120946_create_event_penggunas_table', 1),
(12, '2023_05_31_063912_create_wisatas_table', 1),
(13, '2023_05_31_085150_create_pengaturans_table', 1),
(14, '2023_06_03_130503_create_tamu_post_visits_table', 1),
(15, '2023_06_03_221131_create_berita_recents_table', 1),
(16, '2023_06_03_231440_create_event_recents_table', 1),
(17, '2023_06_10_233730_create_kategori_artikels_table', 1),
(18, '2023_06_11_231608_create_artikels_table', 1),
(19, '2023_06_12_201818_create_artikel_recents_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturans`
--

CREATE TABLE `pengaturans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_web` varchar(255) NOT NULL,
  `email_web` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `deskripsi_web` mediumtext NOT NULL,
  `alamat` mediumtext NOT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `logo_web` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaturans`
--

INSERT INTO `pengaturans` (`id`, `nama_web`, `email_web`, `kontak`, `deskripsi_web`, `alamat`, `favicon`, `logo_web`, `created_at`, `updated_at`) VALUES
(1, 'Dinas Pariwisata Kepemudaan Dan Olahraga Kabupaten Indramayu', 'disbudparindramayu@gmail.com', '(0234) 272325', 'Dinas Pariwisata Kepemudaan Dan Olahraga merupakan badan lembaga daerah yang berada di Kabupaten Indramayu Provinsi Jawa Barat', 'Jl. Gatot Subroto No.4, Karanganyar, Kec. Indramayu, Kabupaten Indramayu, Jawa Barat 45213', NULL, NULL, '2023-06-19 01:15:31', '2023-06-19 01:15:31');

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
-- Table structure for table `tamu_post_visits`
--

CREATE TABLE `tamu_post_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tamu_id` bigint(20) UNSIGNED NOT NULL,
  `wisata_id` bigint(20) UNSIGNED NOT NULL,
  `visited_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tamu_post_visits`
--

INSERT INTO `tamu_post_visits` (`id`, `tamu_id`, `wisata_id`, `visited_at`, `created_at`, `updated_at`) VALUES
(13, 1, 3, '2023-07-20 04:07:23', '2023-07-20 04:07:23', '2023-07-20 04:07:23'),
(14, 1, 3, '2023-07-20 04:13:03', '2023-07-20 04:13:03', '2023-07-20 04:13:03'),
(15, 1, 3, '2023-07-20 04:24:51', '2023-07-20 04:24:51', '2023-07-20 04:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_icon`
--

CREATE TABLE `tb_icon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_icon`
--

INSERT INTO `tb_icon` (`id`, `icon`, `created_at`, `updated_at`) VALUES
(2, 'marker_rooms/20230624053510.png', '2023-06-24 10:35:10', '2023-06-24 10:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_marker`
--

CREATE TABLE `tb_marker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_marker` int(11) DEFAULT NULL,
  `ruangan_id` int(11) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_marker`
--

INSERT INTO `tb_marker` (`id`, `id_marker`, `ruangan_id`, `value`, `created_at`, `updated_at`) VALUES
(2, 2, 3, 'a:9:{s:5:\"width\";s:2:\"50\";s:6:\"height\";s:2:\"50\";s:7:\"tooltip\";s:11:\"Pintu masuk\";s:5:\"image\";s:59:\"http://localhost:90/storage/marker_rooms/20230624053510.png\";s:9:\"longitude\";s:17:\"2.107118639247626\";s:8:\"latitude\";s:19:\"-0.4022916160386836\";s:6:\"anchor\";s:13:\"bottom center\";s:10:\"typemarker\";s:8:\"AddRooms\";s:4:\"link\";N;}', '2023-06-24 10:35:42', '2023-06-24 10:35:42'),
(4, 2, 3, 'a:9:{s:5:\"width\";s:3:\"100\";s:6:\"height\";s:3:\"100\";s:7:\"tooltip\";s:9:\"ruangan 2\";s:5:\"image\";s:59:\"http://localhost:70/storage/marker_rooms/20230624053510.png\";s:9:\"longitude\";s:1:\"0\";s:8:\"latitude\";s:1:\"0\";s:6:\"anchor\";s:13:\"bottom center\";s:10:\"typemarker\";s:8:\"AddRooms\";s:4:\"link\";s:2:\"R6\";}', '2023-07-14 11:46:53', '2023-07-14 11:46:53'),
(5, 2, 3, 'a:9:{s:5:\"width\";s:3:\"100\";s:6:\"height\";s:3:\"100\";s:7:\"tooltip\";s:11:\"YXfPuPmhV3I\";s:5:\"image\";s:59:\"http://localhost:70/storage/marker_rooms/20230624053510.png\";s:9:\"longitude\";s:19:\"0.37105873943938394\";s:8:\"latitude\";s:18:\"0.2120752278610134\";s:6:\"anchor\";s:13:\"bottom center\";s:10:\"typemarker\";s:8:\"Addvideo\";s:4:\"link\";s:11:\"YXfPuPmhV3I\";}', '2023-07-14 12:07:48', '2023-07-14 12:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `poin` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `nama`, `email`, `no_hp`, `instansi`, `password`, `poin`, `email_verified_at`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Technogis Indonesia', 'tehcnogis.id@gmail.com', '081222333444', 'PT Technogis Indonesia', '$2y$10$a9g4qIKtNt6oRlx2RuOrgutgsNLITBvAxcarnKjqGNONwy/0jWGtS', 150, '2022-08-22 09:02:57', NULL, 'Aktif', '2022-08-22 09:02:57', '2022-08-22 09:02:57'),
(2, 'Arsipatra Firgantoro S.H.', 'julia.maryati@example.com', '1637189835', 'repellat', '$2y$10$nBIc.KAGFRAuOHunaZgAZuQrxImYBGVJc4Iaa8099ITLq6TYDjdQC', 2, '2022-08-22 09:04:03', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(3, 'Dimas Sihombing', 'apuspita@example.com', '1489842735', 'omnis', '$2y$10$mnE/nQqq2unhcXIXfGacMOzzl.wkMDxKL5KX6ye5beNz1bhsVWZTK', 292, '2022-08-22 09:04:04', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(4, 'Ami Farida', 'wulan.kuswandari@example.com', '318941106', 'corporis', '$2y$10$F3k2occuAjL9c8Z0t5tt2uBXPdS2RyhzdJSIelawprRC4E4VQb6Wa', 29, '2022-08-22 09:04:04', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(5, 'Uli Pertiwi M.Farm', 'harjasa81@example.org', '1630775394', 'alias', '$2y$10$b9ZfifG73pVoTv9sWK/Wb.m7gme6tCbc/fIkf3C725j.0/kOaawYe', 1, '2022-08-22 09:04:04', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(6, 'Bagus Wahyudin', 'yulianti.betania@example.org', '1806188386', 'soluta', '$2y$10$N9v79fWuK9dotAv6DQYFju4FT50NYXVUg8RKySd8k3sGYh1Nyh4B6', 0, '2022-08-22 09:04:05', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(7, 'Zelaya Safitri S.H.', 'kamila75@example.org', '1719776774', 'numquam', '$2y$10$QNaH4QUtfssv3ZZUGQxFZetdrSgLYZ8arTyE4C3TZYS187swNp0BC', 19, '2022-08-22 09:04:05', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(8, 'Purwa Yosef Gunarto', 'napitupulu.jumari@example.org', '2044157072', 'mollitia', '$2y$10$JGcA98TfqGDVRinORtoPUO3JJAK4.03hSQogzj76huPocPWIuorkC', 7, '2022-08-22 09:04:06', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(9, 'Kartika Safitri S.T.', 'ghaliyati61@example.com', '1637043215', 'in', '$2y$10$aFXzcDJOi4JKoGmJa5ugyew5lWCMx5uq.TTxOsFuKe6P4Y5YPhDa6', 5939, '2022-08-22 09:04:06', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(10, 'Olivia Yuniar', 'cornelia.riyanti@example.org', '1306461533', 'nihil', '$2y$10$BvkaNzAfkwuxTNhFlk8i2OfKGyB6s91pyG4GdF.3QYVXXTZJywdpC', 441917089, '2022-08-22 09:04:07', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(11, 'Halima Nasyidah', 'wahyuni.latika@example.net', '219092512', 'ex', '$2y$10$D5NJJ2Nle6QBk84lcfVI3e4LRp1jp3KKJL.ARxCaKIfRwej5.IfiG', 618, '2022-08-22 09:04:07', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(12, 'Ellis Tari Sudiati', 'zkusmawati@example.net', '1608196123', 'neque', '$2y$10$kOTnibcgOZuCqhUtY4ouXuhBcEufaU.ZYDZB8KafsMujbDvyCrZhm', 65688489, '2022-08-22 09:04:07', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(13, 'Banawa Prayoga Haryanto M.TI.', 'jabal.yuliarti@example.net', '859976355', 'at', '$2y$10$JuSUdNjr6xDqSCwL5wUxOu8GbTvxy5FQohpn27bak7Mt5dksiz6N.', 714385, '2022-08-22 09:04:07', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(14, 'Ajeng Lailasari', 'rpradipta@example.org', '1863603943', 'quas', '$2y$10$q7iQqKaJoDVVTAZKmHCgG.uHYjA3bvqK5vvA65VO6bjTExUcS.x.C', 11, '2022-08-22 09:04:08', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(15, 'Chelsea Suryatmi S.E.', 'hrahayu@example.org', '37493673', 'ipsum', '$2y$10$3lg/L6gOXdAQpwW9qUNwOePF6J8DsocbnOlhwlOHiMF5nj5LMZ2RC', 22250997, '2022-08-22 09:04:08', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(16, 'Lukman Firmansyah S.H.', 'rina70@example.net', '645260122', 'dolorem', '$2y$10$XXfg4OK8mF6YY3USwsf2j.kvjSe7ulDXLmPc.fsjTCkWJfjXS5MRW', 218, '2022-08-22 09:04:08', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(17, 'Warsita Tamba M.Kom.', 'wasita.nabila@example.com', '1552845855', 'soluta', '$2y$10$xy1ZRNoemyI/Q4kK3ePOH.vT7joeGL7ta3vBoRAl5/5r6E888Qtpu', 122, '2022-08-22 09:04:09', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(18, 'Agnes Hariyah', 'ulva77@example.com', '423435955', 'et', '$2y$10$AMtWtoHBfhrxqXzsaZMuzeF/P.DY0OVxI41FR3uiTe41JwXYBRmzu', 627528865, '2022-08-22 09:04:09', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(19, 'Juli Dian Rahayu', 'jayadi81@example.com', '1075160098', 'non', '$2y$10$7x5tfqoMACmkzk9L.MYYaOgbupVhRzmBNtuMObp49WiPXuJAw1Kl.', 663844351, '2022-08-22 09:04:09', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(20, 'Maimunah Haryanti', 'sudiati.julia@example.net', '1090064709', 'est', '$2y$10$eHSigd8vduQHo3Bcxh28geKBGH2DyEekoHHYqZnaAW9k/pmDoYkd6', 483027, '2022-08-22 09:04:09', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(21, 'Salman Maheswara M.M.', 'cager52@example.org', '38697917', 'velit', '$2y$10$2QqSvnA6YLe/JyYcTAd9CONbq.idma38LQEMAyW54hIVagaJHZt8G', 49056330, '2022-08-22 09:04:10', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(22, 'Asmianto Prakasa', 'sitorus.artanto@example.org', '93435809', 'expedita', '$2y$10$csYAxOwiWF9QucKtOSnSXOOB3PtU0mEF29PtOr3T36QyBqBsDxnMy', 43489, '2022-08-22 09:04:10', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(23, 'Rusman Hakim', 'gandewa00@example.org', '651283669', 'quia', '$2y$10$xPIBHgpIx1U1j7rwqg.IrOygOHuoOl/qmfRIX7llmvXM2wKJGZxTS', 2, '2022-08-22 09:04:10', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(24, 'Wani Hariyah M.Farm', 'mahendra.timbul@example.com', '500861536', 'sunt', '$2y$10$VwPOsSUC7F2IXdx4H/uOHu11IQmvhx8Lb5uWDHtZ7AcG.AKAolmP6', 391, '2022-08-22 09:04:10', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(25, 'Kamaria Yuni Purnawati S.Pt', 'cprabowo@example.net', '1960599528', 'voluptatibus', '$2y$10$szQOdYwTo2vWJk8XkEj2feLQaZgsi3SOSoFzUTRctc0804idFTvl.', 17707565, '2022-08-22 09:04:11', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(26, 'Estiawan Firmansyah', 'hidayat.mahdi@example.org', '1414354665', 'odio', '$2y$10$hQDkugVvoHMFlZCfK/VzMucSEWW7Fok2BRY/nHhn4ojdDsgPfZRn6', 1799, '2022-08-22 09:04:11', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(27, 'Lulut Hutasoit', 'darmaji.nuraini@example.net', '980318574', 'perspiciatis', '$2y$10$DIzfZVjl63dBV5NaZ3Px1.98SZjBYnvdjlPKahHu16CdHtl8qBmG2', 46550444, '2022-08-22 09:04:11', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(28, 'Siti Aryani', 'xwidiastuti@example.com', '1223073563', 'quibusdam', '$2y$10$oCAIS2vzFK6ZKrg7CVnuNO4bkjcn.XgxrzSruzY/wcVsz6ocSKjlm', 83548, '2022-08-22 09:04:12', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(29, 'Xanana Ian Wasita S.Ked', 'ibudiman@example.com', '492243077', 'voluptatem', '$2y$10$yrE2pv.x..dNnEcFKcO6beQ5HpV.6TriPPsKcG9hGUyhyUNYManOa', 123599, '2022-08-22 09:04:12', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(30, 'Azalea Oktaviani', 'shania73@example.com', '11475266', 'velit', '$2y$10$zzBl.O1IdDvmR4uEAUtj0uz/.QocPdTPKrB02kbrCvmsQV1T0eDwO', 2278, '2022-08-22 09:04:12', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(31, 'Shakila Sabrina Utami M.Farm', 'yuliarti.yuni@example.com', '751723558', 'fugit', '$2y$10$S51jX2LXFv3oVRweANU96etuDfDjpqwvXIVt1ezfTBOaukZeGzrBK', 2227822, '2022-08-22 09:04:13', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(32, 'Gara Iswahyudi', 'prabowo.edward@example.net', '472791574', 'magnam', '$2y$10$E/XgfUBtKpQgpbOCdIWyGO.YwUHhsqvtVA48YlMV3zEkZILx9tHtm', 371, '2022-08-22 09:04:13', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(33, 'Diana Nuraini S.I.Kom', 'dhartati@example.com', '404033335', 'et', '$2y$10$V/urAbscLQ6qVoBVyc0yOOQ7cUOPSRw3mWlky3KPl6n8ycZqyTPu2', 1984, '2022-08-22 09:04:13', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(34, 'Parman Cakrawangsa Widodo', 'artanto.wulandari@example.com', '11370006', 'perferendis', '$2y$10$wIp.e9Cwpd6FmHtofoUxFePS7HZ5QuO.d5LUF8NjC1WVSUHAUYezi', 147802, '2022-08-22 09:04:13', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(35, 'Usman Situmorang', 'zulaika.ibrahim@example.com', '1510524755', 'dolorem', '$2y$10$hhoXytftQIenAHqDdMJ.muaCuU3gGeq7FjuT3mb7qxpL5UVoKhqzW', 221121323, '2022-08-22 09:04:14', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(36, 'Usyi Malika Yulianti M.M.', 'bakiono65@example.com', '1930666980', 'dolor', '$2y$10$mqJ7ZOultfre1hN1X3nG0uTG6bFlQVeReyTsYwy57dQEq1fk58dYi', 70896, '2022-08-22 09:04:14', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(37, 'Cici Wastuti S.Farm', 'farah58@example.net', '1466361931', 'cupiditate', '$2y$10$4ZbAs.B.vklRGYQiIV7z0Oi98k3Hup7TU9VE7oigTg42AhEyVB3M6', 7, '2022-08-22 09:04:14', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(38, 'Hasna Widiastuti', 'oktaviani.sabrina@example.net', '1984931740', 'temporibus', '$2y$10$1Wf/1u/Rb17YTpBxNQ8kBev8yUvf0nTtC0nMXLeMLfVUPD4TEbGMG', 29, '2022-08-22 09:04:14', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(39, 'Dian Pratiwi', 'cinta82@example.net', '924592000', 'occaecati', '$2y$10$4QuDCmZjSVpmPVxY/WOUAuPbZEEOMgQwAmUNOCFlQP9YSDOMLfxra', 71597, '2022-08-22 09:04:15', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(40, 'Warsita Hutapea', 'klatupono@example.net', '1492868466', 'nesciunt', '$2y$10$a4NfYATyU2a.gLmLGrvTNuUaXrgcLan6wX01FP1TEKlkySYHO9A0G', 3, '2022-08-22 09:04:15', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(41, 'Jasmani Haryanto', 'utami.patricia@example.com', '1183448157', 'rerum', '$2y$10$Na5qqKENr1i2OD84tvEfhu3kIf2qKCKtDoPsBLv0pnMDW.V9TxoYe', 3, '2022-08-22 09:04:15', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(42, 'Vinsen Surya Hardiansyah', 'michelle95@example.com', '1581181841', 'ratione', '$2y$10$Iv7K4.YqUBzdtOa.xwY8aO3HMe1th.z5rXgd/qpt4pOs17litpqsy', 8117, '2022-08-22 09:04:17', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(43, 'Lintang Safitri', 'pertiwi.sabrina@example.net', '2115892987', 'et', '$2y$10$Ed35e8fVELPgZv/lyMHg1uR18zMXKKZ4G/nIfjC9/Xjs8J9opDRlS', 35, '2022-08-22 09:04:17', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(44, 'Ihsan Ardianto', 'osuryono@example.org', '1470684000', 'blanditiis', '$2y$10$epY6GN6KvKU0ne3stBMpk.iG9auQbo5hMj4sLqS204LKgQluTlPuC', 36, '2022-08-22 09:04:18', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(45, 'Harjasa Sinaga', 'lanang.adriansyah@example.com', '866721185', 'vero', '$2y$10$IWKEh8Xfiw1Ca01AlPgipuyTIHZtwp0RaMvuWvx.MJUxSAfMd/vlu', 182, '2022-08-22 09:04:19', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(46, 'Viktor Gunawan', 'catur.wasita@example.com', '680493768', 'maxime', '$2y$10$f/OiAaOMUrlKhYr23F4TIenzHG/8WA4Pk18Jhqc0dQGAlUjj0MVpK', 7439, '2022-08-22 09:04:19', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(47, 'Laila Winarsih S.H.', 'qmangunsong@example.org', '1974018832', 'quod', '$2y$10$mn193zTiwSS9./wYmnbPwuVwgY.gcidKMKE8cPTfkcQpYIouOZv4K', 3534, '2022-08-22 09:04:19', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(48, 'Caraka Hutagalung S.Gz', 'saiful.hastuti@example.org', '1116716989', 'ratione', '$2y$10$.fkhwPzBEHtZTKnRAEftZOKN3B2E2YXRcV6c1FCN6qjxo2eW2qM0W', 692331, '2022-08-22 09:04:20', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(49, 'Jaya Mangunsong S.E.', 'hasna.laksita@example.org', '751223217', 'fugiat', '$2y$10$lV6KM7ItHKKj/nUpEu80BOao/sRnQ6LGS7QFyFAEXf4M/..W9wjI.', 101251, '2022-08-22 09:04:21', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(50, 'Vanya Wulandari', 'yulianti.marwata@example.com', '2067044639', 'tempora', '$2y$10$I5SoqXqicjSL2xixxXqr9OSHINQm3PsWVJB7JX7uMhPnOPl4trxVa', 7040172, '2022-08-22 09:04:21', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(51, 'Zamira Melani', 'nasim.hakim@example.org', '1170226919', 'laborum', '$2y$10$lT0PKc4LTNhYkpKKeDY2xutczu5ykYsQ1O5tCBC3LiIWdGWaIemfa', 45942159, '2022-08-22 09:04:22', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(52, 'Samiah Ana Puspasari', 'balapati.kuswandari@example.com', '1422298906', 'consequuntur', '$2y$10$ppxTugg3c8hJcxFo8wlIRu4ZrJBp4o5RD1Dc37H3CVHHzQvk9rnta', 4, '2022-08-22 09:04:22', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(53, 'Darmaji Sirait', 'limar50@example.org', '954595322', 'molestias', '$2y$10$JEdenDIR0f9996SRSBzNUeD5FVF3.bqRJXSwv0w5CTGYFcoBxptnm', 2, '2022-08-22 09:04:24', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(54, 'Gading Dipa Manullang', 'zamira51@example.org', '269890813', 'dolorum', '$2y$10$vbkHpRaRnCbZwIC3VJhwP.xweAOmXc4uUozPaFX.Vs9Yz8snfdgOe', 5, '2022-08-22 09:04:24', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(55, 'Latika Palastri', 'zulfa.siregar@example.com', '510433890', 'culpa', '$2y$10$PaHc1ZwLuvDmW1od1Jr9r.VV4X45LLMbdOsMzJw1.P6AdQohOvf/K', 299546041, '2022-08-22 09:04:25', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(56, 'Lukita Marpaung', 'napitupulu.hani@example.net', '1983317723', 'quaerat', '$2y$10$lCCYmsIHUbWsV38qRKC.pu288A9FINHRMJsRMoQxg37JO9058szbC', 2, '2022-08-22 09:04:25', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(57, 'Oman Sitorus S.IP', 'tpradipta@example.com', '501098097', 'rerum', '$2y$10$stg3w43pImXKDp2EEo7yGOLz6Or2BA2GMg.02IK8IIbpQvcjLLm6a', 69835, '2022-08-22 09:04:26', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(58, 'Lalita Haryanti', 'maimunah73@example.com', '1444325542', 'ut', '$2y$10$bE8AT5HcRFbl/q5qqwC0rup78.bOUSMzvb.4uB63BuX3aMX/1p6c2', 0, '2022-08-22 09:04:26', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(59, 'Nilam Sudiati S.Sos', 'tmahendra@example.net', '858803041', 'totam', '$2y$10$ANhZglkLhRb0COgpMHQS9OsPSEFBQKzOjhCnppTBTHcCFvt24DGEC', 256, '2022-08-22 09:04:26', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(60, 'Jono Sitorus', 'umay69@example.com', '1929544844', 'dolorum', '$2y$10$Y7TPYweWBtfp0ijZiHHIZuzF9ti2gXd0VyWHZ4AObw7uqkc9FMgjW', 77387, '2022-08-22 09:04:27', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(61, 'Jagaraga Simbolon', 'mmansur@example.com', '1928437884', 'eum', '$2y$10$dPOlMqk2Xi/xxo3sJLWqYuQbwtVwXI/xAKoyF1h7QlzSh7EFlqOs2', 31, '2022-08-22 09:04:27', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(62, 'Wirda Anggraini', 'uputra@example.com', '491073807', 'ab', '$2y$10$ira.aUVlWBvqvIAGbsk6vub1iREetaz.3yT61Vl9x1Q2TANdqy7.a', 6126282, '2022-08-22 09:04:29', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(63, 'Aditya Setiawan', 'malika83@example.org', '448742337', 'culpa', '$2y$10$4z1d7DuLzaqt/7az1QJ5T.NYXnHO63MonV3cR17Ak2YSySUfEEDdi', 45077, '2022-08-22 09:04:30', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(64, 'Zelda Nasyidah', 'endah.kusmawati@example.net', '394230148', 'quis', '$2y$10$JRzH0L/85pbzgG9sKfl3AO98QMnN2CO1qq4rXGp3dRfWZMZTmyEY.', 3, '2022-08-22 09:04:30', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(65, 'Gasti Hastuti', 'pangeran30@example.org', '1226872196', 'voluptatibus', '$2y$10$JuV7r.UMJf9kTZV2l5ZceO/JXeOnLMpat69UYOfEvyn7Fr.B3/J/y', 958523, '2022-08-22 09:04:31', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(66, 'Tiara Utami', 'faizah.riyanti@example.com', '1689459515', 'corporis', '$2y$10$57uaBgMqTn2SLconO.IUWeuk5jRDgC2QtvN8y07MVvYi4/Luctf92', 5434534, '2022-08-22 09:04:31', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(67, 'Edi Prasetya', 'duwais@example.com', '946805698', 'eum', '$2y$10$W2Xt4o7e.aVQpiUInfz6reP3m5PquYfhFXl5QE/bZWngHqJvYSj96', 0, '2022-08-22 09:04:32', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(68, 'Enteng Mahendra', 'tasdik.hassanah@example.net', '250849405', 'molestias', '$2y$10$vZg83gnXiwSb9cL38Zc97.PXKlxVh5baurzK1z1InFDnqqgziFnSq', 3168361, '2022-08-22 09:04:32', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(69, 'Sari Hariyah', 'ilyas.permata@example.com', '1446717055', 'est', '$2y$10$eCzps.pnAx6kQs6.RmbHl.q.WgFMQIeyRUDRj7Qo3Uf2hf0i9OnyS', 3810, '2022-08-22 09:04:33', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(70, 'Aris Tri Kuswoyo', 'jarwa03@example.net', '1655359140', 'dolor', '$2y$10$ew1WrBRDvpLZLO6JNbrZsOyW0UHdqUH0pOvVU9srxrSNhYGjQLZDq', 56900, '2022-08-22 09:04:34', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(71, 'Salwa Widiastuti M.M.', 'fpurnawati@example.com', '1511740755', 'et', '$2y$10$4ijzcddTMN7SbR9liksppeY9ATnZj12QqKudmFDatOcAAxNRViGHC', 38198016, '2022-08-22 09:04:35', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(72, 'Enteng Napitupulu S.E.', 'xyuliarti@example.com', '259848005', 'sunt', '$2y$10$wqruVX9g8kkB3xVdELW.ZOxwcgE1qvmMNCEBvCTkNZPKkCYrP.WA6', 621, '2022-08-22 09:04:36', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(73, 'Najwa Mardhiyah S.H.', 'hardiansyah.kenes@example.com', '1091578235', 'sed', '$2y$10$4Lcjmqg8rsO./lXEpBQry.nf.JJcgC46E3Q5IHGKX1.hgLW6m83JW', 75222101, '2022-08-22 09:04:37', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(74, 'Estiawan Permadi', 'laksmiwati.harto@example.com', '1132794180', 'debitis', '$2y$10$Ny/mcqrlt6pGm75c58.ZYOn.dnuIJPNLYMvwoKMufR71710U51aLG', 91, '2022-08-22 09:04:37', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(75, 'Laras Agustina', 'almira.agustina@example.com', '1568939724', 'et', '$2y$10$CXzDLZVkXundDY5L5s5E6edMfeLlEYyzxIXeu3Jm4lZf.3ALQPNXC', 25712120, '2022-08-22 09:04:38', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(76, 'Harimurti Wacana', 'halim.padma@example.org', '1191035868', 'dignissimos', '$2y$10$Sk1/hsKYsLOZMVEGIT2cCuGH6S0CcrpIVFOjSFxxQjXjq7Suc/JqS', 109030, '2022-08-22 09:04:42', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(77, 'Prayogo Karsa Gunarto', 'kayla.winarno@example.net', '1211384083', 'aliquid', '$2y$10$xK0ZukkH7MJVyjXSFFVg2eoTFbr/oTa9eZPjBJX9VswOycrNZtW4G', 459227, '2022-08-22 09:04:45', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(78, 'Ika Namaga', 'kuncara.pratiwi@example.net', '1533887335', 'vitae', '$2y$10$PbLkRd3FdQFFbVyTi8OuieMa82wFbQbKX4w8JFwqlbBQYY5hLTWoW', 67782554, '2022-08-22 09:04:46', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(79, 'Gantar Wahyudin', 'rahman99@example.com', '1341910776', 'est', '$2y$10$aob6/VWGNH2tK6IUyMc2zeqJ3uSViBsGORs/gg00B7VoIMgzQ673m', 1, '2022-08-22 09:04:46', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(80, 'Danu Prasetyo Wibisono', 'vhastuti@example.org', '2098597231', 'deleniti', '$2y$10$O6tXoAiIxAObh06qtvEiJeF1a6bDiSLeXsfRD0jJJhMv0ZCJkMm1i', 6138574, '2022-08-22 09:04:47', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(81, 'Adinata Hairyanto Permadi', 'jpradipta@example.org', '2112989306', 'excepturi', '$2y$10$VXG7sDGHn25RlEsVKDZoOucq0.10M42DIg1nhv3IW7t7md5crrzRK', 112, '2022-08-22 09:04:47', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(82, 'Yessi Eva Rahayu M.Kom.', 'fnainggolan@example.org', '333002568', 'nam', '$2y$10$Bn2V6YaoxKLZ/4.kbf/S/.slhwaAxuZJUo8pjbaAzPeNv7f9FKr02', 463264, '2022-08-22 09:04:47', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(83, 'Rachel Oktaviani M.Kom.', 'wlailasari@example.com', '80861509', 'libero', '$2y$10$J90nqUZnsdbzQSKn17DpiemnzSeLZXd/Sp.OrpBmOmVE1Ey2wyltq', 4, '2022-08-22 09:04:47', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(84, 'Hendri Saputra S.Farm', 'vhasanah@example.com', '362909371', 'harum', '$2y$10$PWplLuVYhtVp0K9c4G.T3uVW.nRQ.iBR5spTZLpoCy4jx4tCqdb9.', 103348641, '2022-08-22 09:04:48', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(85, 'Maida Laksita', 'wahyuni.rahmi@example.net', '92166221', 'ullam', '$2y$10$YfN3xVuUXAbx2tWxhGdQ9eALT3yrUbVpnU2itpQRbhHeuIdoQf2Ii', 497209, '2022-08-22 09:04:48', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(86, 'Umi Kayla Namaga S.Pd', 'saptono.siska@example.com', '841706194', 'recusandae', '$2y$10$pe3HEM0Xrl0cyHGoCGro9.QkBWrln/xSY9Qpol4uthRf211SaebW.', 649041066, '2022-08-22 09:04:48', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(87, 'Prasetya Maulana S.Psi', 'lailasari.daru@example.org', '580273929', 'esse', '$2y$10$DjWu4ytXwOvTUOaym8YZL.Hy3eFpilwiUePmnbhWM7sQSsT9B6PmS', 478, '2022-08-22 09:04:48', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(88, 'Latika Ellis Oktaviani', 'kasiyah.oktaviani@example.com', '994616428', 'illum', '$2y$10$CjLNcRiIepbw4qwoDHAvwusQjXw3Gpvhh9Ajnrr5SII7OAA4xlX9q', 9677, '2022-08-22 09:04:49', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(89, 'Galak Jagaraga Mandala', 'znainggolan@example.net', '511674285', 'qui', '$2y$10$d/vS/XO77s1kt2rN53HWr.r6nieGfEVhe6nRlbugtBg2zvYPUNKWC', 2, '2022-08-22 09:04:49', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(90, 'Rudi Rudi Wacana M.Ak', 'umi61@example.org', '2100245995', 'beatae', '$2y$10$q7QmFilGFwSvSCZ956VqI.jXr67bL6kK6Ks6rl0bG48ZGhOzt3G8q', 4510002, '2022-08-22 09:04:49', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(91, 'Puti Juli Handayani S.E.I', 'rahmawati.cahyono@example.org', '1025339959', 'omnis', '$2y$10$qH0RmvF/Luki5QDvd9iKCeHc9o5/LmEWhTP4gKarhnv6bwEcFfGTu', 214184, '2022-08-22 09:04:50', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(92, 'Lintang Palastri', 'cinthia.saefullah@example.org', '1249263491', 'ut', '$2y$10$Fptcw/74Ms4eOWXumfl4f.FqgCcWRBu4RtWXu8vWHreXVis7vsmSW', 0, '2022-08-22 09:04:50', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(93, 'Uchita Padmasari', 'kusumo.yani@example.net', '137185448', 'suscipit', '$2y$10$z5rzVTf/7wpzWORMQDF27O3Mm6Bmo69u0RuTOUU2UAohFpcMBT66G', 28, '2022-08-22 09:04:50', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(94, 'Dono Liman Thamrin', 'ciaobella.zulaika@example.org', '569730897', 'et', '$2y$10$Dgc2MvwmPKI1k/DKVd3U6uET8iIwVgS0mnK079X2EDug.jBRaKtc2', 47, '2022-08-22 09:04:50', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(95, 'Sidiq Edison Prasetyo S.E.', 'amelia.riyanti@example.org', '2036129124', 'quaerat', '$2y$10$QaKIweUloGI4Vqcv9dhZ9esNZcHhLcWQyblsmf8m5wlnWyY9GTVIG', 13599, '2022-08-22 09:04:51', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(96, 'Ratna Hariyah', 'saptono.kartika@example.org', '498784654', 'ipsa', '$2y$10$VsRPbKRk2/xTdOkvSqatv.6lfw0jTqZKN63BBLJP35eGiiOTr9rl6', 1, '2022-08-22 09:04:51', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(97, 'Nabila Namaga', 'nugroho.iriana@example.net', '1096647669', 'nemo', '$2y$10$0MxokuPJQ5fDNoQB74KiYuLSys3UUMuZ4ncmpMsk9B4hlTdpGtrQu', 381, '2022-08-22 09:04:51', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(98, 'Satya Irawan', 'wsetiawan@example.com', '678670267', 'harum', '$2y$10$5OhxTguBy7YAJS0trLl6tuFQ3gFNOn5.SH4L29KZqOSWrv/gbGqIS', 50758321, '2022-08-22 09:04:52', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(99, 'Oliva Novitasari', 'elma50@example.com', '1684269819', 'assumenda', '$2y$10$PCNThEv8UkqY5AwkVSoA7up0j5z9xGQw7laDmDI1PXLk7LCrepR0e', 1639721, '2022-08-22 09:04:52', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(100, 'Ella Mayasari', 'gzulaika@example.org', '1684699433', 'id', '$2y$10$km4xqR0Dsur5BgMiNHtR7Om8IUnGRM0DtA2qSzs9aXsQ5xzJErOem', 8036, '2022-08-22 09:04:52', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(101, 'Kenari Sitorus M.TI.', 'wirda46@example.org', '32215931', 'commodi', '$2y$10$o6FdfUMTLjGslSMMq1bCUu.oFVYHhEDgajO02whj1dRF1Fei5AfES', 89455, '2022-08-22 09:04:53', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(102, 'Atma Warji Lazuardi', 'timbul.budiman@example.com', '861386223', 'non', '$2y$10$bukV3p.aSIuRgMlYYl5kpeMk5l7p8iWMBzrR4QzAzimTjwbdXCO02', 140, '2022-08-22 09:04:53', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(103, 'Tirta Napitupulu', 'maryadi.violet@example.com', '2036097729', 'blanditiis', '$2y$10$Vou6gW2GAjLr.ZZmMD6rzuN0kSFMZMHi3hV6G6.vea9M7sc6APcBG', 5737607, '2022-08-22 09:04:54', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(104, 'Jono Mahmud Hutapea', 'winarsih.lala@example.org', '1240407842', 'eos', '$2y$10$aL9kIG3FKd4KckaWjy.9/OFEX.7yYuOvWiA8vks3HuGR.v901ja5.', 51526335, '2022-08-22 09:04:54', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(105, 'Hendra Yahya Saputra', 'uastuti@example.net', '258006688', 'voluptatem', '$2y$10$7.3Pop1t2xucuZxBxTzyduVIbNbvqHayjyOk3iLgXXZxjRM9NAu9a', 35653, '2022-08-22 09:04:54', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(106, 'Lili Pertiwi', 'dhalim@example.org', '924304732', 'quis', '$2y$10$akiWdwqg6nY9on8.1sGmSuR/e2EWHsrRvpYnNhFjWn8havxeG96xm', 2245446, '2022-08-22 09:04:56', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(107, 'Warsita Pradipta S.Gz', 'xsuwarno@example.com', '415136273', 'vel', '$2y$10$vdaTp/6kmVfXyYTWlERf/OBFR2NPauvS8LXH2yDHTOR4BtJCjdnum', 0, '2022-08-22 09:04:57', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(108, 'Ophelia Mardhiyah', 'kiandra82@example.com', '20743399', 'quod', '$2y$10$NG.yLXiFNdRB0iD3l66QLOlQs3CwG3YY1cJtFNy0vKFqnpfWYyu/u', 147233970, '2022-08-22 09:04:58', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(109, 'Maya Wahyuni', 'labuh.januar@example.org', '242502905', 'laborum', '$2y$10$3KeZo2USvagaPgAvcL7Ob.1zhazCNhAwVBsut0HqXaHKKkgO7bOZ6', 0, '2022-08-22 09:04:58', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(110, 'Kiandra Zelda Suartini', 'budiman.siska@example.org', '1692908040', 'commodi', '$2y$10$9dMTV2WRgSfmn7cqz8Z1V.NuDHKai7620n.D3iwtul8ZsA/G8mH/2', 5754, '2022-08-22 09:04:58', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(111, 'Irfan Karsa Mangunsong', 'yani67@example.org', '1634566499', 'ad', '$2y$10$AtNIop3iI3rp9q1HRuy.Yegesj/k7CWgT9ReEDIa5c75cdAdhCN.q', 33175, '2022-08-22 09:04:58', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(112, 'Lukita Raihan Gunarto S.E.I', 'raina.zulaika@example.com', '1626469570', 'nisi', '$2y$10$2LXPRWt6ovyD674TMQC8z.k/v4L301KIkeumaf.eN2BB1tQZ6NU2i', 4, '2022-08-22 09:04:59', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(113, 'Edi Halim', 'haryanti.dinda@example.com', '2030746792', 'unde', '$2y$10$1mXf4al06YU86.dg9svZAOArowSvR6JlzFU9yYFQ0bq/w09zha5V6', 656, '2022-08-22 09:05:00', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(114, 'Kusuma Parman Siregar S.Pt', 'karya.yulianti@example.com', '700975666', 'cumque', '$2y$10$3dZs2cvY41FobdaOmSL2Eu3PAGN0PEH1mU3d1ia4BoFPNlV7sq1Jy', 5898, '2022-08-22 09:05:01', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(115, 'Indah Andriani', 'budi26@example.com', '1294846021', 'recusandae', '$2y$10$s4s21eCgzVP6xzeKQUp.X..4ZF56bjvf1Rv96vIXS9.b71TDEeaWO', 502, '2022-08-22 09:05:02', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(116, 'Nyana Jasmani Jailani', 'jhabibi@example.org', '206915723', 'dolorem', '$2y$10$N/2P3oyV48GXkMpCq2njT.CxEKupafr6ErypKFZsp3wBAE9qha1z.', 19, '2022-08-22 09:05:03', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(117, 'Wirda Eli Astuti', 'lurhur37@example.org', '1143941994', 'officia', '$2y$10$H6wUoPhiqY141DBpVX13audDNOK9BUQOFKpe3eUuwnqbNWmHCijSu', 2738192, '2022-08-22 09:05:05', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(118, 'Cornelia Rahimah', 'dina.hasanah@example.com', '891819452', 'nulla', '$2y$10$4fi0UCatKiFNAV9vPFZgnub/qmNyexeyFju2B8YXWe7AwxjzPMOZS', 24264, '2022-08-22 09:05:06', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(119, 'Edison Budiyanto', 'adriansyah.ulva@example.net', '2003351466', 'omnis', '$2y$10$xoIPWnhpl19L8U5QaaL0R.kajsW4HOX9KC/AB2fZeZ/VaDQr2Tl8.', 15, '2022-08-22 09:05:06', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(120, 'Hasna Palastri', 'michelle.mayasari@example.net', '1529920579', 'unde', '$2y$10$arLVnf/q2eFTekO5iPS4mutrirxq...fkwS8qX4FGPy5nAMVOZESO', 1, '2022-08-22 09:05:07', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(121, 'Nabila Uyainah', 'hardiansyah.maida@example.com', '2133692964', 'ipsam', '$2y$10$EvjniU0CM7roQYnV1BXee.xpj8RaaV01LIXk.gNAYEQ0K0PPGZ5m2', 583, '2022-08-22 09:05:07', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(122, 'Tasdik Slamet Situmorang', 'prayoga05@example.com', '852613836', 'id', '$2y$10$OEGRM85.MUVbhZHgjvh8xuFkUky0T9UbtiHKT395Zrw5a44Aus5xq', 42277, '2022-08-22 09:05:07', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(123, 'Gatot Uwais', 'mustofa.cakrabirawa@example.org', '792106538', 'fugiat', '$2y$10$ieviSW3Hul4/54/F7IGNj.0TX2OHeKgjzJPU5rWRT.0dVMYijY3w.', 9, '2022-08-22 09:05:08', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(124, 'Indah Diana Nuraini', 'rutami@example.com', '474235143', 'mollitia', '$2y$10$hFqbdbVq6OvVMTxuYr.oZOqrknMkZGgm0.rEF76bxC/Ov93emByJy', 1381247, '2022-08-22 09:05:08', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(125, 'Yunita Usada', 'karen.rahayu@example.com', '1110438512', 'beatae', '$2y$10$aDuJozfo1gB0vbIfQLb.de3EnU8StWVU7OmNzhYLt0xdoiK.A1r4S', 2, '2022-08-22 09:05:08', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(126, 'Galuh Wacana', 'belinda52@example.org', '709139076', 'ipsa', '$2y$10$FPepLWa6OI/EqU8BjoaCA.JmgCe/AAvAaN0mXX.X5dUcvKC0T6E2u', 285258, '2022-08-22 09:05:08', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(127, 'Saiful Salahudin', 'cwastuti@example.org', '521036331', 'quis', '$2y$10$mJLGrYsQh1zwG.xwAsSmmO3VVUBXzYBxsuW8C8LVsQmnELM5nDzTi', 94951587, '2022-08-22 09:05:09', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(128, 'Syahrini Suryatmi M.Pd', 'purwadi.situmorang@example.net', '502426088', 'sit', '$2y$10$ZKfjQJRfrhJxdQ6vsguLT.NBTG7SIfN2YP.G73xq6nd9YWta9bwK6', 0, '2022-08-22 09:05:09', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(129, 'Umi Ida Haryanti S.Kom', 'atma.hidayanto@example.org', '476812828', 'et', '$2y$10$iJSSUkEFh7fRY4A7XBOHeuRtPmh8/VIbhwDYT58OqUp1xCrzsJc.G', 83, '2022-08-22 09:05:09', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(130, 'Siska Kuswandari', 'woktaviani@example.org', '324214455', 'deleniti', '$2y$10$S1WmxBp/cO4hmYjyhg5oLe.tDWO5vvhQJ9AYmQgHXrhe7FMMYClGG', 275096970, '2022-08-22 09:05:09', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(131, 'Cakrabuana Gunawan', 'sitorus.marsudi@example.com', '846671341', 'sapiente', '$2y$10$VC7ZdXcGFOxD4y1ekZEjUOTg8acF1fKuNBRtWrmOhvBlSYQ1GQSxa', 199102, '2022-08-22 09:05:10', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(132, 'Iriana Nasyidah M.Kom.', 'almira07@example.net', '975009502', 'consequuntur', '$2y$10$qwMC26KjpIUDQAqcBPNd3uRf68yI9HFEMSVmBGFOo1QMQOsBQn3/y', 27390825, '2022-08-22 09:05:10', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(133, 'Putri Purnawati M.Kom.', 'vsudiati@example.net', '520286893', 'eligendi', '$2y$10$yi8hEM8LaXjNOF/V3G5CM.5zz6yGkUpDyBuxgPlP3ZRZ7vhS3YHee', 36581, '2022-08-22 09:05:10', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(134, 'Prayitna Mangunsong', 'kusumo.ana@example.net', '1696181463', 'commodi', '$2y$10$oJ1LOMlzvGan7ee1k5TFj.6s1jgwXfehSjk6NphgmpUxack2pWOwu', 6781533, '2022-08-22 09:05:11', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(135, 'Dinda Dina Farida S.Pd', 'halimah.puput@example.com', '1287000803', 'illo', '$2y$10$uXIPO8tRfLLBnWnRH7uWGulH9rlVlWsR6yD5jKno2RaWGwUL1eKOq', 3243, '2022-08-22 09:05:11', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(136, 'Cahyono Narpati', 'natalia10@example.com', '711095873', 'rerum', '$2y$10$MBSJbXyAdONWD/7NcRRDD.OoCqbzFcaV1T.qYnhZ9KtGzrk5dLsvC', 58182027, '2022-08-22 09:05:11', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(137, 'Hilda Sudiati', 'kusmawati.diana@example.org', '1695026911', 'doloremque', '$2y$10$85cw1R6Rh7a9e0vg69M3jutSHkFSdd2gRKBic8Q4T2ajU3QuonoJa', 1486580, '2022-08-22 09:05:12', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(138, 'Emin Tarihoran', 'fathonah10@example.org', '1093245277', 'nihil', '$2y$10$5dsijcDwpExRtWuvx1Vzm.t1ydXGcFPrNxSD4NNmH6JXpz/3cWAD2', 41752381, '2022-08-22 09:05:12', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(139, 'Wulan Hassanah S.Pt', 'emong.wastuti@example.net', '2141088679', 'non', '$2y$10$KNbU6qzvB2LhJIjzTeoJKeKseUn5nzZDrauUTKJjCtJRO10UQ4Kwi', 78580136, '2022-08-22 09:05:13', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(140, 'Gambira Luthfi Mansur M.Pd', 'radika31@example.org', '444366856', 'ducimus', '$2y$10$3HxrYYDcC2XTafAOIzj4vOsaCyRSa3vvxibmK9LJFyU/Qqma3uNBm', 155, '2022-08-22 09:05:13', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(141, 'Vivi Uyainah', 'megantara.wadi@example.net', '1653878951', 'debitis', '$2y$10$d/3OJztCEViLCAXVljghaenXNoEW7L50X6N7hH1GT5MZ/NsZuFYCy', 54239252, '2022-08-22 09:05:13', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(142, 'Drajat Wijaya', 'zwahyudin@example.org', '887824462', 'sint', '$2y$10$zZg4CATWvBeC2UBnDwEgcuaZ.SnhX31TxZqZy7EuyLFBKvL0Npsou', 1109625, '2022-08-22 09:05:13', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(143, 'Olivia Zulaika', 'hasna.kurniawan@example.com', '1172462968', 'aliquid', '$2y$10$Y3JSGY3fFqFh7MJFOLUhfuV.9cLdjN./duHvv/qUG8h5p.0W49dKi', 4818312, '2022-08-22 09:05:14', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(144, 'Qori Oktaviani', 'fujiati.sari@example.net', '1086070219', 'non', '$2y$10$T.3jFl0nzCscaorHFe43KuLq1N77vWfsL4XEU1lzZipLDGxtLevCC', 66872, '2022-08-22 09:05:14', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(145, 'Dadap Mulyanto Saptono S.Ked', 'yhakim@example.com', '1554497904', 'consequatur', '$2y$10$S6QcEbYpT1QF2ZAXV9kyVe5nFVSi6KwDNrrr2sLtFEl5/uxbPzote', 29, '2022-08-22 09:05:15', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(146, 'Kayla Ulya Widiastuti M.TI.', 'lutfan.mangunsong@example.org', '1259991989', 'magni', '$2y$10$zAXU8BS52ZunRqUgdD/rRu4RV7hhsqBrbpuXGiJW/AOYCVm.2vdG.', 1, '2022-08-22 09:05:15', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(147, 'Pia Suryatmi', 'kuncara.rahimah@example.net', '1856711170', 'sed', '$2y$10$P.MV3AkV2wFcykDAvoZZpuY5pM50pFBtu.gtpoJuFlrX2jzW24deC', 6351304, '2022-08-22 09:05:15', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(148, 'Slamet Sihombing', 'kuncara54@example.org', '1911051988', 'tenetur', '$2y$10$haMC7AOYTm00dFYm1TcJtuVHoBXtcBYYeax1jj2Tc4lnDtg9JncRG', 46, '2022-08-22 09:05:15', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(149, 'Erik Kamidin Pradana S.Pt', 'drajat.damanik@example.net', '354871070', 'vel', '$2y$10$XzIEaCdD8lSGkH5xkLgdyuiHwNyuvtFFxFfe4feJZXr11a2pXTPj.', 0, '2022-08-22 09:05:16', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(150, 'Purwanto Sabar Sirait', 'emas54@example.net', '1527419679', 'ullam', '$2y$10$pjEdyZ0srlvXDO6NkTMZ6uSJce334.maC.M5XlxVGl1ge.znzS4CK', 4, '2022-08-22 09:05:17', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(151, 'Gaduh Wahyudin S.E.I', 'nugraha08@example.org', '1064392029', 'non', '$2y$10$v3EJsLT80SD67zsy001K/OK0Xrppe6b6Hbgkrd2OdJ74XZXcp1Cfa', 46, '2022-08-22 09:05:17', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(152, 'Winda Agustina S.Ked', 'mprabowo@example.org', '980818793', 'commodi', '$2y$10$S6fGJIocsfxOy4bMPIYZ3ue55CVIKuXOgKN1UihXURWPkROw04Vx6', 28733, '2022-08-22 09:05:17', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(153, 'Eva Hana Rahayu S.I.Kom', 'hutapea.kiandra@example.org', '1207189469', 'blanditiis', '$2y$10$dyzYo3GFIxhL7WRtxhVkl.DDTORssXLP1PheWSllQe6mOQBAT6MHm', 3007339, '2022-08-22 09:05:17', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(154, 'Ganda Utama', 'vrahmawati@example.com', '203608535', 'tenetur', '$2y$10$kzcOczcZH3RZxvtfHSOXQeHpDPM2KHomYfJKwp3F2q/dWZ4eQXllC', 3570982, '2022-08-22 09:05:18', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(155, 'Manah Rosman Uwais S.E.I', 'wastuti.kiandra@example.com', '440415039', 'sint', '$2y$10$RKaAdszdiShvKlHbe6HPg.d/mA80N7I71OtJzzkPewzuHt19ROnEa', 10, '2022-08-22 09:05:18', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(156, 'Ratih Fitriani Yulianti', 'gina38@example.net', '676076696', 'quibusdam', '$2y$10$ziQTn0Oj4wtfU1.CRyBXWu5mCEbQ61f95md.BCTiz/3UVDbRBHYbW', 452261789, '2022-08-22 09:05:18', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(157, 'Jati Sinaga', 'suryono.laras@example.net', '945648345', 'dolorem', '$2y$10$45gRXgc64HfhmeZeg6UBfeSidCBTltXu1vJsYAWRJzZ.F1A0K7PkW', 53, '2022-08-22 09:05:19', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(158, 'Olga Hadi Wacana S.E.', 'nsinaga@example.com', '274664074', 'non', '$2y$10$a3lSNCxO/cvwkqr8tceA0.HRoSWXvl2QvlH5aHHo0Dx7oMqrtaMIu', 0, '2022-08-22 09:05:19', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(159, 'Wirda Shania Utami S.IP', 'suwarno.saadat@example.net', '296550459', 'sapiente', '$2y$10$nrgkBDit9Rn/PJWB4X5ETeM2WumphwAX67ebPCJXyzvMlcaVwl.2O', 50, '2022-08-22 09:05:19', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(160, 'Paulin Yuniar', 'kuswandari.prayogo@example.org', '91454604', 'repellendus', '$2y$10$56GM/u43OTUAddloZctHyOBsrIdHpv5Pht4cj0pcofmsVn6t0ENdC', 8, '2022-08-22 09:05:19', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(161, 'Jamalia Mila Rahayu', 'oskar90@example.net', '2005491465', 'quibusdam', '$2y$10$1bNGp2AQdAqWH.MhdkgQT.HHYBt/f/eeudnV5iESgR5c6VbTjLXae', 654, '2022-08-22 09:05:20', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(162, 'Natalia Fujiati', 'najwa65@example.org', '51531302', 'aperiam', '$2y$10$D/z0mf3RU1wjeCcpn3zcduMYi0WkKiunfv3uCvMzs.I4rJHuM2QCW', 188, '2022-08-22 09:05:20', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(163, 'Mujur Bagya Adriansyah', 'amelia30@example.com', '1994704098', 'asperiores', '$2y$10$RoBLe7g0vd8ClYkaYP7RHOkLptEC/tpm0x6bChvYvM/RJiSOGdQw6', 952527914, '2022-08-22 09:05:21', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(164, 'Salwa Yuniar S.E.', 'farah54@example.net', '137103643', 'sed', '$2y$10$wEAqo5m39d34aV37DlEi/uO/XXR792wgC52s79MdlNcttAUtR3CaS', 1, '2022-08-22 09:05:21', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(165, 'Septi Wijayanti', 'uyainah.ina@example.org', '365894928', 'aliquid', '$2y$10$SPxfbYwxoy1fVM4jzJgl9.HLQjH.9R1ZYesNitlVs3gz5SLBMlJ7.', 70718, '2022-08-22 09:05:21', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(166, 'Najib Winarno S.I.Kom', 'ida82@example.com', '1523532250', 'nihil', '$2y$10$vwmQIDdLsbqj0RMiBjhEMOe.CvtnqxHUn1vmnqdHdoKTSQpnRwl/K', 1142466, '2022-08-22 09:05:22', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(167, 'Jasmani Lazuardi', 'hani.samosir@example.net', '1009128397', 'quod', '$2y$10$/BBUboo8YRyBG2HIxAs2su4/KWsPJHYz6FHiWp8evSnQDlmPwFl1G', 19846, '2022-08-22 09:05:22', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(168, 'Chandra Simbolon', 'rini.pratiwi@example.com', '316377219', 'esse', '$2y$10$Lbu8GOogC8GuR/8hxVOWDeyJfLJwdHN4E3vziAW4cDizXQzXYFUEO', 0, '2022-08-22 09:05:22', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(169, 'Lasmanto Pranowo', 'kharyanti@example.org', '2118877061', 'dicta', '$2y$10$q6EwXBZZwigqldOgE4nbVuD8hSozjonYUC5sumZUFvSimJaqIsyXe', 3662529, '2022-08-22 09:05:23', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(170, 'Iriana Maryati', 'hariyah.endah@example.net', '1391770412', 'alias', '$2y$10$6z37mb89y9aZFhTsFt5kSe/pzJ9w0m25oDXQa4pPj.CLxvN7O/j02', 918652, '2022-08-22 09:05:23', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(171, 'Kajen Sinaga', 'bakianto51@example.net', '132443403', 'aut', '$2y$10$uC83k1RjwfZXm2IGpRbFluzk9MF6P4QbOz0cWP9fJQwKiVvw2DDPe', 597575, '2022-08-22 09:05:24', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(172, 'Daliono Siregar', 'ana.hidayanto@example.net', '1367003226', 'omnis', '$2y$10$Ubj6tx/9ZDjgseuGGFsX/eDpmb12p6np64Q9dnzLiXhaVA1xiLov2', 105494, '2022-08-22 09:05:24', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(173, 'Ghaliyati Wijayanti', 'rajasa.dalima@example.com', '2047084610', 'cumque', '$2y$10$1FvbkTBB/XT2f9525uJQnezrJ7CG8w1Kc1rNzTdnGd.gx7xc4Hsn6', 32, '2022-08-22 09:05:24', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(174, 'Lili Ilsa Rahmawati M.M.', 'xmaheswara@example.com', '1064667885', 'ipsam', '$2y$10$M59IXTUWfB7RLeKBC0dae.mRus2TGDgd0JdLXsxoyEEyExtNcUPOO', 12811050, '2022-08-22 09:05:25', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(175, 'Estiono Prabowo', 'suartini.intan@example.net', '1564681282', 'neque', '$2y$10$z0x2/aBpFsns5HDTn1ykqOgIrp.AzJy7MhtcD7PWJ62AYbj3An6Sm', 378715784, '2022-08-22 09:05:25', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(176, 'Cornelia Hani Pertiwi S.Kom', 'upik71@example.org', '1765103057', 'adipisci', '$2y$10$ArFOssQViGpAXC3u5uXfSuQKSzvEJpstOCiHKmbMB9uFI0eEK0RAW', 5045841, '2022-08-22 09:05:25', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(177, 'Febi Maryati', 'gasti.puspasari@example.org', '666398613', 'repellendus', '$2y$10$IC0X.gFgCYVEJYut/Kf06.BC7M2eRXq0tSBJc1kSi9uGQH3zoo/Bq', 1, '2022-08-22 09:05:26', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(178, 'Dewi Putri Hariyah', 'ana.mansur@example.com', '944902970', 'culpa', '$2y$10$BnQWS0Xc2bHsGtjzO2dMbOI23LsDgnr2.qX/mBhLjAfi5ewq/jCo2', 515260250, '2022-08-22 09:05:26', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(179, 'Kacung Daniswara Rajasa', 'jaeman50@example.com', '1400164661', 'beatae', '$2y$10$y96s5tE/KblH4vkJGwR8ROozbB84ESSmrUF9Dww2JQ.j9JHgOz8ma', 9, '2022-08-22 09:05:26', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(180, 'Hardana Prasetya Saptono', 'ifa57@example.com', '1084978454', 'dicta', '$2y$10$Rro8Vet7NxBVK6o/8Wcqquen3yXOO5FQUIEyQ3CpxCM18/d08wK7a', 88, '2022-08-22 09:05:27', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(181, 'Ghaliyati Kusmawati S.Gz', 'bsihombing@example.com', '1442437661', 'accusamus', '$2y$10$p/aLbyZ6XS.NpB4OPcNtGOCd1XgQ68jX.rHmkNh0T/gt4ThZIaANi', 4279, '2022-08-22 09:05:27', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(182, 'Taufan Pranowo S.T.', 'gara.simbolon@example.org', '1927448516', 'molestiae', '$2y$10$jQoa02RUmV23Bf2GHRVXHOH/h2Rm5TzvilrPfFd81TVUPK1zBuPaS', 238431, '2022-08-22 09:05:28', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(183, 'Edward Kusumo', 'belinda46@example.net', '2119465078', 'qui', '$2y$10$z/a9Cv98WzxJbEYyvrIT.OYWozBEgXPxlfeaJXnzs383iaGYRMrxK', 6131065, '2022-08-22 09:05:28', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(184, 'Aisyah Permata S.Ked', 'vino72@example.org', '1464216154', 'enim', '$2y$10$C7uph.dFoSG721tpgsNAvu7G2FXZETJxQC67mTPebzOune0WmfwoO', 1673108, '2022-08-22 09:05:28', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(185, 'Vera Vanya Maryati M.Kom.', 'azalea08@example.net', '1884879967', 'ut', '$2y$10$D6W1QTd6hHkSX4OYBWQ.IOMvLHcGmZQH2MiiTxzjDzBMFUOjrueCa', 28083365, '2022-08-22 09:05:29', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(186, 'Elvin Hasta Prayoga', 'dyuniar@example.com', '1772471985', 'officiis', '$2y$10$JlddEfOpMnSn/5NWLbkQfenqLjGVCRyYbYnw7NRW8Oz4/pfso4eE.', 293, '2022-08-22 09:05:29', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(187, 'Kartika Wastuti', 'talia49@example.org', '680106376', 'qui', '$2y$10$zoihdy0.rLmt6Wyf4xBmVe9ZalkKls5Em6m7DNBeB.Bsmogjrr6mS', 6596259, '2022-08-22 09:05:29', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(188, 'Jelita Ghaliyati Mardhiyah M.Kom.', 'suwarno.dasa@example.com', '946283444', 'eius', '$2y$10$KSey6lavjeV5AUNHfb7nAeFaEGronNfebYz1ypywtIaYXSu.wmM/e', 897, '2022-08-22 09:05:29', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(189, 'Lalita Farida', 'khidayat@example.org', '1401789050', 'assumenda', '$2y$10$1sWvYO0pRlbQpbRIvAYMD.l2Azuev9FtHpSvA2ubjMudjZBojQ/IW', 24860610, '2022-08-22 09:05:30', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(190, 'Hari Rangga Mahendra', 'prasetyo.kasiyah@example.com', '231044871', 'dolorum', '$2y$10$G/5YjIksIB.kTHFTkn/wyudL2bCP8Gjugga3RBE635L.U8QsCb2yO', 3003, '2022-08-22 09:05:30', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(191, 'Maya Susanti', 'silvia70@example.net', '396451422', 'est', '$2y$10$JbS.y1RLYabHadMpGeDYz.B79oL1b4m11CEs0IKisrRRaqgkXTYNG', 1, '2022-08-22 09:05:30', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(192, 'Rizki Firmansyah S.Farm', 'makara53@example.com', '1690687073', 'voluptates', '$2y$10$jynywaJFlbfJESducfUm7uBlTYvncbAyj5AgWnjhYn76kFIANjlrm', 145019, '2022-08-22 09:05:30', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(193, 'Halima Ratna Maryati', 'ajeng66@example.com', '55417942', 'nisi', '$2y$10$E5YF8.aiIs9n1lMTKMKkmuOY/fBZPNmZGIMfkvCL7g/kG6sAb/Xuq', 56574, '2022-08-22 09:05:31', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(194, 'Ian Dongoran', 'dongoran.darmana@example.org', '1235960200', 'nemo', '$2y$10$zVO3lB6BS3emKL8AHd2/Se4q.uMuPs6bd4081ULLWX82xpQrXxwYq', 51999054, '2022-08-22 09:05:31', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(195, 'Prakosa Saragih', 'brajata@example.net', '1452504547', 'quia', '$2y$10$NjhNx0hpc1E9r95ZeorWeuScrXRfomIFHgMMWmsuCEYzBy5bnIcJm', 1986589, '2022-08-22 09:05:32', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(196, 'Jabal Salahudin M.Kom.', 'xutami@example.net', '625513393', 'debitis', '$2y$10$0oO6A4DGOvM5kuhVXjtZfuUznDRORiSEvUjkcDl/WE1jbq390iJte', 683245, '2022-08-22 09:05:32', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(197, 'Tiara Yuliarti', 'jnurdiyanti@example.com', '793629663', 'nesciunt', '$2y$10$S8bjvJghZvmfnbp5JvEGsOLWrKzLl0WvQ7OReEqmEdbzy4RySL53G', 6702, '2022-08-22 09:05:32', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(198, 'Nabila Lailasari', 'irfan.anggraini@example.com', '1460335223', 'ipsum', '$2y$10$i9vsizW.mwGGfBDnGAcKp.33im8Vcb1kJkWtv97vsgXqNOBg945Fy', 4, '2022-08-22 09:05:33', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(199, 'Balapati Prasetyo S.Pt', 'cindy82@example.org', '1060726006', 'tenetur', '$2y$10$LE8MnWT74qlfAATO6sW9meV4LB8PG7QdQlpuAYu/o0lEKQ8Gmo50K', 1, '2022-08-22 09:05:33', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(200, 'Hilda Hassanah', 'ratna07@example.com', '1342156455', 'repellendus', '$2y$10$l7TVZtIs67qHHD9VnurgA.GbuSkCvMTwNmoHOOEki1nax57ocuKji', 9660, '2022-08-22 09:05:33', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(201, 'Winda Maryati', 'lazuardi.siska@example.org', '343743382', 'impedit', '$2y$10$5cXL8x6aMUIhBT3cBKi39O9oEGg7nzzlG7Naexd3uORLv.QrbECo2', 28083, '2022-08-22 09:05:34', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(202, 'Talia Safitri', 'kusmawati.ina@example.org', '1617539487', 'aliquid', '$2y$10$fu1dO7ygv3Qlrwt6J2KfSOFEMSHDwD.QpuaFZbjTGu0TS/nVadqje', 27, '2022-08-22 09:05:34', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(203, 'Irma Aryani', 'teguh97@example.com', '1829992605', 'cumque', '$2y$10$seWZgm93qTK7wbW0lSJ/vO6BJBAdFXDrOtcMGj1GngNiK9FmMQ626', 30540107, '2022-08-22 09:05:34', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(204, 'Vivi Zulfa Lestari', 'hani53@example.org', '1429689741', 'amet', '$2y$10$2vTqb9d29BBN85QwwSwj2eqLfT7NjpRJYpA2qxsXGhX2HZkqcR5my', 2, '2022-08-22 09:05:35', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(205, 'Leo Adriansyah', 'mhalimah@example.net', '1846340621', 'aut', '$2y$10$i2JVPIWY8bpqmf.tXuY3YOW7iVtNKTwswx7Mt8NluWq2SRJJTHKOy', 562296691, '2022-08-22 09:05:35', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(206, 'Jaka Nababan S.Kom', 'vmanullang@example.org', '417540126', 'corrupti', '$2y$10$IxzAPEwdmr/zpscbvPjcoOG2Xt18EA4MRIMvh51HJmtSOlYkMySii', 81020, '2022-08-22 09:05:35', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(207, 'Rika Irma Permata M.TI.', 'harto.saptono@example.net', '1363696044', 'sint', '$2y$10$DUgU9Bb5XNjHPp3t9704huZopJPfDJpqJe1ux6q9MSzXqBXbm5nC.', 22, '2022-08-22 09:05:36', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(208, 'Wirda Novitasari', 'oman29@example.com', '1590029626', 'pariatur', '$2y$10$wQvECJlb4xVZw82rfifNP.kPYPfFmtzJ4/wJkqHrCcnbm84/l.FhK', 2568303, '2022-08-22 09:05:36', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(209, 'Sabrina Agustina', 'riyanti.paulin@example.com', '70825213', 'rem', '$2y$10$I..yxsiqQnNDB68knb.MlO0QvzoWXq7h.gNiwsaIGI/STNzZCORRS', 44436, '2022-08-22 09:05:36', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(210, 'Caket Samsul Hidayanto', 'gaduh.sihombing@example.org', '673680719', 'et', '$2y$10$5LUimGVnLIcM.Yg6AFuSyu8acgYnxydgVAi.d3EUlZHsQ8StsV61m', 4343428, '2022-08-22 09:05:37', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(211, 'Kiandra Mardhiyah', 'prasetyo.belinda@example.org', '1846072542', 'sed', '$2y$10$FuguswF45gQ9Blr.TEh7POWk6QtlDNXnILYjw8lxft/ubdC7PdjLK', 0, '2022-08-22 09:05:37', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(212, 'Cawuk Wibisono', 'eka.oktaviani@example.com', '1009230176', 'minus', '$2y$10$q7WggPu9okIgegW9CAaquOdfOQVXfnSwBz4DUFK5MyMHE86e/H.bu', 190, '2022-08-22 09:05:37', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(213, 'Panji Zulkarnain', 'sitorus.yance@example.net', '1511363020', 'quia', '$2y$10$4L3ZirTjf0xx060mT9zLMu2Ec8jlVIoebgrqj/KdOhLpyk9iKb5zW', 477, '2022-08-22 09:05:37', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09');
INSERT INTO `tb_pengguna` (`id`, `nama`, `email`, `no_hp`, `instansi`, `password`, `poin`, `email_verified_at`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(214, 'Patricia Melani', 'kamidin.zulaika@example.org', '2064728597', 'rerum', '$2y$10$uuXgQDZkjw27/EDKD1m7v.hsaGYc3/ztUX252DGxtRpC2uYVGMgmi', 8, '2022-08-22 09:05:38', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(215, 'Tami Purnawati', 'unggul23@example.org', '810566957', 'repellat', '$2y$10$V3qmGHzz5b9qEJrQR5207u1DFZwXcLOtD17unl9U0cCDv.ub6dRNW', 54, '2022-08-22 09:05:38', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(216, 'Perkasa Artawan Prakasa', 'hardiansyah.cahyo@example.com', '711769186', 'quos', '$2y$10$cxNrCdZd8KI0w4wUiG6jguO6y0MUTlsySUzyvArZRR7o1mWRfmMJC', 55958706, '2022-08-22 09:05:38', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(217, 'Kamila Lailasari S.Pt', 'ghani.laksmiwati@example.net', '945195829', 'officia', '$2y$10$yKsmEIsl5smWmAlwn7rO8u.CjHWan0UEhY/JfIxYkTV6v4tdTtWau', 21, '2022-08-22 09:05:38', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(218, 'Rina Namaga', 'oni43@example.net', '2028991576', 'enim', '$2y$10$nOxQFLs5iQ6z5CR00pob1OG3BzzpLf0XhtgIEt41qnhSxFSpcBBca', 3, '2022-08-22 09:05:39', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(219, 'Salman Chandra Dabukke M.TI.', 'vsitumorang@example.net', '2132073239', 'aspernatur', '$2y$10$nNRgbo2MFg30xyhs4pqq0uM.Vm2AcwsqicGrUb4UhKCdpAmXmh6L2', 22474012, '2022-08-22 09:05:39', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(220, 'Shakila Laksita M.Farm', 'artawan25@example.org', '1908966191', 'aut', '$2y$10$0M3x3SHw/yFaxxt36uUC8.QszXcxFz1TneAGLyCbhpXCWA3o.qgTe', 1529, '2022-08-22 09:05:39', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(221, 'Tira Winarsih', 'nmaheswara@example.com', '1326557474', 'ut', '$2y$10$50CtExzM6FkU/QbhXxlTWuXCSVXF4weyLXHMLOrtq/Uyt0AzGL7E2', 0, '2022-08-22 09:05:40', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(222, 'Maida Nuraini S.H.', 'ikin80@example.org', '1110678307', 'corrupti', '$2y$10$vRy5MC6W.STKaV6jCZv5ceQozo.s.srQxKQIo5OzjA51v5grAXqTS', 44, '2022-08-22 09:05:40', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(223, 'Titi Halimah S.H.', 'prasetyo.nadine@example.com', '814885860', 'ut', '$2y$10$ZnuGe5mont4eTFKfArsivukA51r5uXdaXiEVLQ40hu9DdYlkHMo5q', 2376, '2022-08-22 09:05:40', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(224, 'Artawan Budiman', 'maria90@example.com', '2122547790', 'eum', '$2y$10$mUXu6XXgW/kjiWdVAmu04uu9EF/9ZCGKAr1W112L3mDGq/IVd84lW', 9363, '2022-08-22 09:05:41', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(225, 'Raina Vanya Agustina S.I.Kom', 'nuraini.kadir@example.com', '637946338', 'dicta', '$2y$10$PYRYu1wQ9asOJV71.62TL.xZ0pNcMpc/sCqSsqRaRIe6FPZuo3k/O', 82625, '2022-08-22 09:05:41', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(226, 'Rangga Mansur S.Farm', 'jefri30@example.org', '1292743467', 'enim', '$2y$10$xiAPINfuGMGdOjteaGe8vOo0SB21bwWgn.t/KpWZccUwG5jTUHKyy', 4110867, '2022-08-22 09:05:41', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(227, 'Gantar Suryono', 'darmana78@example.com', '1756377392', 'repellendus', '$2y$10$uU8v6iF8u.9LKtxYADXOo./zmnYJWM4NNT.yx6hX.35VBoY3YyZq2', 0, '2022-08-22 09:05:41', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(228, 'Salwa Tiara Mandasari', 'jamalia.hartati@example.net', '1252258471', 'aut', '$2y$10$M8MBGmSEUUycQelDerxGC./x5mvq20X76w5Yw5lpP.AEybPSsBQK.', 651508, '2022-08-22 09:05:42', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(229, 'Hani Iriana Widiastuti S.Farm', 'nabila53@example.org', '484090340', 'id', '$2y$10$c3GFB8B91HgQaxj./TyCveTt37glNshxH1fWEj8kfzrX/WASqvHNO', 116066171, '2022-08-22 09:05:42', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(230, 'Makuta Firmansyah', 'kanda.adriansyah@example.net', '153506899', 'voluptatem', '$2y$10$s1A8fffZm.hThqtL4DV7Yegg66QbeaIQ5TzVmJOl6GK5WBn0ETL/K', 32170, '2022-08-22 09:05:42', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(231, 'Teddy Wadi Lazuardi S.Sos', 'zirawan@example.org', '684325605', 'quam', '$2y$10$JwQ/UEJJS7zzADIwnGoKAu5pShsn372VNeLQDeoTgogAAJq/67dB2', 14385, '2022-08-22 09:05:42', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(232, 'Nadia Nurdiyanti', 'prabowo.siregar@example.com', '800614910', 'minus', '$2y$10$QAqN0yYhHSr17CNOqd.5JO3BOFAN5FwmXTkOViuHBw1wqzpnMX/YS', 5665836, '2022-08-22 09:05:43', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(233, 'Yance Widiastuti', 'awacana@example.net', '534159452', 'facere', '$2y$10$MFFyMJJHenGL0lChV5mHW.CkpxJcUSz74OqT.qKTgzLrR4P.3l7jK', 1279809, '2022-08-22 09:05:43', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(234, 'Ida Wastuti', 'latika.mansur@example.org', '313041031', 'officia', '$2y$10$f7aCXk55HllSFT9OXX3TDeXI3.tRe27QPAJE1H0AcgWZ7wggHdCz.', 64, '2022-08-22 09:05:43', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(235, 'Jaya Hutapea', 'lailasari.septi@example.net', '1869420730', 'rerum', '$2y$10$pOpPpyfUU3w0AxLXZtssz.U/69o/PIvMl78qD6ghhLqy2ESwM/jFa', 3586730, '2022-08-22 09:05:44', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(236, 'Safina Farida', 'rhakim@example.org', '18480443', 'iste', '$2y$10$DJGivO3yl50C/8wxdV/Of.RTjqWOcv1jdUClmssKIfGjtlPGiPGo6', 166612, '2022-08-22 09:05:44', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(237, 'Patricia Pudjiastuti', 'kartika.fujiati@example.net', '1476056475', 'blanditiis', '$2y$10$MuK/LYyHDovBtLgvG60Tke0JHWx1IXjTYadOSWYJd60kn1dySD7jG', 718799, '2022-08-22 09:05:44', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(238, 'Rahayu Suartini S.Gz', 'xpadmasari@example.net', '2010607978', 'occaecati', '$2y$10$uyuZKTjaXReAykTe33sodO43ahFWQKtAKWvsv6Ww80WLaIVnQ4ZlS', 68, '2022-08-22 09:05:44', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(239, 'Panji Kenari Widodo S.Pd', 'mandala.jaiman@example.org', '727688104', 'occaecati', '$2y$10$AeoOYyYLPGJ7FbckuoXptO4y0u2m9ZZSRgrnWNehYu1lZgd69fhfa', 5757296, '2022-08-22 09:05:45', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(240, 'Elma Susanti S.E.I', 'reksa.pratama@example.org', '1477889697', 'ducimus', '$2y$10$ZMTaCBdDBOzJoV2o.InGe.7EAw03MF1Sr.v9L2FP2h4/BW999ECHG', 189536786, '2022-08-22 09:05:45', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(241, 'Salsabila Ika Nasyidah S.E.', 'lalita.sitompul@example.org', '132839170', 'ullam', '$2y$10$1PO2anhvifpUNsxkmF9pnujsW3Mg6CDsR9jm1lugs6AjWM81orvky', 122522, '2022-08-22 09:05:45', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(242, 'Among Habibi', 'nadine00@example.com', '1923302563', 'exercitationem', '$2y$10$QMMh7hswQoS6FdTfCJXudeBwuIDoqbNYnantyz8BmhJjy9ncrucq6', 50, '2022-08-22 09:05:45', '0', 'Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(243, 'Mutia Winarsih M.Ak', 'zulkarnain.capa@example.net', '1351784519', 'libero', '$2y$10$QUJ9KJuZ2p0IlskZy/ETc.MF4Y6SymQ37CSKVREY27OHdCHRk3nLG', 10, '2022-08-22 09:05:46', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(244, 'Ulya Pertiwi', 'kadir03@example.com', '1519112572', 'et', '$2y$10$ohGuqUsRgv/L..T7pceZten3vBRMlHp/KvHfhb/iNbfj.hXrzTaS.', 3055, '2022-08-22 09:05:46', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(245, 'Hadi Banara Budiman S.H.', 'csamosir@example.net', '620632147', 'velit', '$2y$10$oUpki4pltLUZSB0eMQEmMOWlCD9L5C1pYQXoVfaAhYWh.hDn1IOB6', 3, '2022-08-22 09:05:47', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(246, 'Eva Pia Uyainah S.I.Kom', 'gantar.ramadan@example.net', '89137425', 'est', '$2y$10$me0K/Pi1mXQybaCibrRpjeKYBa7OBmmCBYhSRZwMtxdiXxWjEgwXy', 4125, '2022-08-22 09:05:47', '0', 'Tidak Aktif', '2022-08-22 09:06:09', '2022-08-22 09:06:09'),
(247, 'Bakidin Situmorang S.Kom', 'jkusmawati@example.net', '2103967222', 'nihil', '$2y$10$JuatDVegHdmQXQ37PkSy7eG4o447N5FZDD7pDCq8E8cmaH8dHht..', 31165, '2022-08-22 09:05:47', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(248, 'Ifa Fujiati', 'salwa58@example.net', '787042482', 'tempore', '$2y$10$k3ZJ7FTh9n7T.Qh.ln0ziOvST/wU.aw4pvtkwDe5DSdEvzd6obmTq', 23695, '2022-08-22 09:05:47', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(249, 'Jaya Drajat Saragih S.E.', 'oskar36@example.org', '945675820', 'voluptatum', '$2y$10$znT/W20DGBN1hCbpfQK6nem0rt7.uq4Yy4hI9GCE9kK8FvUUlOnxa', 538182605, '2022-08-22 09:05:48', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(250, 'Iriana Nasyiah S.H.', 'jarwadi12@example.com', '338140165', 'consequuntur', '$2y$10$RLAQmkrFOuho2ID..8VvVe63U69Uy6Evc0hkjTM7TEtXUTcXnH6Ri', 4991, '2022-08-22 09:05:48', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(251, 'Uli Utami', 'kurniawan.lidya@example.com', '1748029324', 'impedit', '$2y$10$Z/2koiBbiR6ez7R6/fqpouMc5x06nvQKpVgnodQtqFOo0B0VpeOhW', 112017249, '2022-08-22 09:05:48', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(252, 'Kezia Unjani Winarsih', 'ratna.pratiwi@example.net', '676772391', 'voluptas', '$2y$10$h3nJBG0KQJ9zm7jvpOh1j.tfImtVqPjl32ZPuLKUbFUApmLjjtcPO', 0, '2022-08-22 09:05:49', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(253, 'Rachel Wulan Aryani M.Farm', 'marbun.estiono@example.com', '991248163', 'laboriosam', '$2y$10$AFiXndAJjL50etExFKoRuOOKlJDymTiIhp6fLFOzBf7QxnonwEhmW', 12, '2022-08-22 09:05:49', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(254, 'Nabila Latika Laksita', 'kuswandari.indah@example.net', '1517438708', 'est', '$2y$10$3E/FPVnyp//poeM5W65.7.dD6GKz2mICszi8CZ5oUaJe2d1gPdxsi', 5566, '2022-08-22 09:05:49', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(255, 'Gantar Saptono S.Gz', 'malika.sinaga@example.net', '1774075971', 'inventore', '$2y$10$SZGi5WsD/gnOP6Ou5daKhu72X17q6XvmdhfxjBiCINA0wlr4mn9Q6', 745, '2022-08-22 09:05:49', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(256, 'Harjaya Pandu Prasetya S.IP', 'adikara18@example.com', '1639507097', 'voluptatem', '$2y$10$9xikinb9tre27/cYAsIQvOf5YEtk4eoI9xd1r2WKI63Y4vKkW8al2', 1, '2022-08-22 09:05:50', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(257, 'Titi Yuniar', 'rajata.putri@example.net', '1425579548', 'qui', '$2y$10$APS0Kv3jNnnkkeBNcb9.2uQGXEqWPpJlzAV5KbuSZyc8ipg0XRnO.', 492686, '2022-08-22 09:05:50', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(258, 'Chandra Nugraha Hutagalung', 'eka81@example.net', '1954549955', 'optio', '$2y$10$2nVHdHGGoJRZ8CYH.D99j.PydZEAqj4UcPna03ygP.FqPgAv5CWp.', 4250628, '2022-08-22 09:05:50', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(259, 'Elisa Kuswandari', 'surya65@example.net', '1537349657', 'facilis', '$2y$10$zkC.5mnqSU60/3X8m6Nj1.EcDfL5uV569ljpyHmohtSxL9JT4Flnq', 527476270, '2022-08-22 09:05:51', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(260, 'Panji Hakim', 'susanti.halim@example.net', '1141369007', 'id', '$2y$10$pHcqMrqBOr4p.PT7Rn8Zk.T8aGC3ZFIbJzOZsSE1PLWBIkA597Zxa', 2765, '2022-08-22 09:05:51', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(261, 'Artanto Gambira Wijaya M.TI.', 'gasti78@example.org', '368718145', 'eaque', '$2y$10$9oDp569zVDug3tDibPC2KOLnp73EragY4qAe/xu6DxlhcOKlNfUKa', 26455735, '2022-08-22 09:05:51', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(262, 'Makuta Setiawan', 'tedi34@example.net', '16683610', 'quo', '$2y$10$ql5IVW3U1OCCxq1s6hZhlOwWKXJSi9g/N0xD88nuHG2EOZPY/bbZC', 906492, '2022-08-22 09:05:52', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(263, 'Natalia Melinda Padmasari', 'zamira.rahayu@example.net', '1411761477', 'voluptatem', '$2y$10$SafKvBIpDKZXGOOpYGmQ/eh44Qlzqki.aLlkBajzAe7Ewcrs6Wbl6', 14007344, '2022-08-22 09:05:52', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(264, 'Elisa Calista Farida', 'gmansur@example.com', '1162555905', 'ea', '$2y$10$Lkah//1G5tSkq9hVleTWI.XmgtpdSbuaA8uj7TCKQ2E9QwhhzphGe', 18, '2022-08-22 09:05:52', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(265, 'Zelda Belinda Lestari', 'opurnawati@example.net', '1263062043', 'velit', '$2y$10$1a3vg8fU.EjOkQ0w6FbDRu7hrTOG8M34q64IUiXBuNGryEmcAo0ua', 24, '2022-08-22 09:05:52', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(266, 'Damar Widodo S.E.', 'prasetya.hardana@example.org', '415253582', 'maiores', '$2y$10$T3PNADZZsjdwz4C9EpXXQuCp9y54eyAo2dlpPpRWkf4xsC9RMRRDS', 29, '2022-08-22 09:05:53', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(267, 'Galak Marbun M.TI.', 'sitompul.balapati@example.com', '286158040', 'omnis', '$2y$10$cWcL0drx8X0qTIaE15dATOGFZB9kYJSGbWcG60VmsqXh0pBeq07/e', 261788, '2022-08-22 09:05:53', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(268, 'Wadi Latupono', 'zsusanti@example.com', '751341940', 'quibusdam', '$2y$10$55A02dcusUI6s.NOVfG/ou5EniNKdpJhf7zEOvkN47LcYveipgK3e', 44, '2022-08-22 09:05:54', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(269, 'Titi Cici Hastuti', 'elon49@example.org', '1833309824', 'et', '$2y$10$TRfJvTJdHFxWUswBx8xYqeVsAHegGYv4zld0uZr.ArE50BdKxcI/u', 7, '2022-08-22 09:05:54', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(270, 'Almira Usamah M.Ak', 'humaira81@example.net', '553461027', 'qui', '$2y$10$lo1ZQ220WY6VnViRjs15n.z.ZE3qMh4z6u/hRTIUzX.74sfQYcUmm', 21849, '2022-08-22 09:05:54', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(271, 'Michelle Melani', 'simanjuntak.gamanto@example.net', '1428955279', 'natus', '$2y$10$YRaFIpIHJg31qOc3Y8DpHe8EwvsR3YnvDjoMzl248Os.mewIeNr3q', 18, '2022-08-22 09:05:55', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(272, 'Hilda Zulaika', 'maria.usada@example.org', '565954267', 'quod', '$2y$10$5QV8IrJ6uLYEa4nrJKXjueu7h7v17Uu8oPKjDWcETnxa0Y8ZVXOe.', 8275, '2022-08-22 09:05:55', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(273, 'Uda Tampubolon', 'ouyainah@example.com', '295290427', 'itaque', '$2y$10$1uzfz9QeMR5yrpm5bOciz.hwi7BuTCFQK0yjH6cm1sKcTuwJR8rie', 152183, '2022-08-22 09:05:56', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(274, 'Prima Tomi Dongoran', 'harsaya71@example.com', '167301102', 'asperiores', '$2y$10$tKImexjggObhbVjtm2AAFO/mW3jjNIc09ucx6JsStZOnZW9PURZRO', 63, '2022-08-22 09:05:56', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(275, 'Latika Nasyidah', 'hnarpati@example.net', '472607258', 'quo', '$2y$10$gKDQGANqX4bhnNrzoHDgkOQZuANzzo87duDK/h0UEbE8RT9OSaUwm', 55954346, '2022-08-22 09:05:56', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(276, 'Jelita Mayasari S.Psi', 'xnamaga@example.org', '277351738', 'cumque', '$2y$10$NSwWYGFBltjL.GfPlpBlYu/0t9fAG8QMNG1aoQLqJxBvakwrf0Tea', 2969, '2022-08-22 09:05:57', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(277, 'Zamira Mardhiyah', 'ana.nainggolan@example.com', '1628221947', 'illo', '$2y$10$Rsbodg5rX4v1Oknh/GTucuENY9p6Z9g7pWchCRQtTW.MErVIMVf/2', 2402, '2022-08-22 09:05:57', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(278, 'Hartaka Kasim Hutasoit', 'rwulandari@example.net', '1799609649', 'laborum', '$2y$10$0OrU22K0Xr8tl5tl0SoVSuDYqhNy.3EkP6cgAH.GXggytgYQETsym', 20983404, '2022-08-22 09:05:57', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(279, 'Ade Suwarno', 'cayadi95@example.com', '2049701480', 'commodi', '$2y$10$4Kwv0vTFJjC1jfw9OiqO6uXRKHxQVTocXHrmczZRW1b4DizBjcY6.', 2, '2022-08-22 09:05:58', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(280, 'Prayoga Prayoga', 'harjaya.prayoga@example.org', '548049951', 'nostrum', '$2y$10$ONf7UPjQM96.yaiiWdFP9.sWt8M7DTKH.PGFB6vvKiPb4PFbtKrgK', 3844, '2022-08-22 09:05:58', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(281, 'Dasa Irawan', 'abyasa68@example.com', '2012561233', 'occaecati', '$2y$10$nDtzWLzs0bGGee0Fwh4fLOeHoFtAPNLYHRktLdZaGFx4x3mrhJ.Kq', 262, '2022-08-22 09:05:58', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(282, 'Praba Santoso', 'ismail.mustofa@example.org', '1644971231', 'repellat', '$2y$10$k3JzJbBtbKbFHIqtWhOd1OqUmaQpHC9h7uDmuG9LMZLqJ9uBzJsx6', 52, '2022-08-22 09:05:59', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(283, 'Safina Kuswandari S.Gz', 'talia.lestari@example.net', '334380932', 'maxime', '$2y$10$2wpuzhL5HW.lqfAaBvuee.qtLbsha/0n0KPIUfFVc3eZmB1eEEBim', 364189, '2022-08-22 09:05:59', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(284, 'Cinthia Laksita S.IP', 'jasmin.wahyuni@example.net', '971935265', 'accusantium', '$2y$10$VM/ZNLY4PzPAKrSLVmIOluEBlZBEhGBpPldUT5Bm6oETIOjfps0oy', 148133, '2022-08-22 09:05:59', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(285, 'Jaya Winarno', 'banara.putra@example.com', '315663160', 'et', '$2y$10$27HeZCjjK4zGrGpfvdTxKOvbIHGRC4xGOba9oIk8BOA5WPTUhLdti', 174493308, '2022-08-22 09:05:59', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(286, 'Makuta Panji Budiman', 'danang.kusmawati@example.com', '2025089414', 'culpa', '$2y$10$1VdWV/qBaKxkQd8d25urCOXd9iCFiFVtfDXcUV45s2jvb2QJlNfXe', 36279599, '2022-08-22 09:06:00', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(287, 'Maryadi Uwais', 'habibi.putri@example.net', '687770571', 'ut', '$2y$10$7H.caDlOppOwhvU.otuMp.MNR1YBdehjxVtOmU3X.P.k4uUg9yR7u', 25, '2022-08-22 09:06:01', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(288, 'Maya Dewi Astuti', 'puput17@example.com', '12251260', 'laboriosam', '$2y$10$nlzZfY3gOQ4frzedfDuFc.8DZwZFrqELYSsuVrBvmQMDi2C4WC3KW', 84, '2022-08-22 09:06:01', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(289, 'Aslijan Saragih S.Ked', 'xpermadi@example.org', '1529968376', 'ex', '$2y$10$KZwiHdY4ccXxHvcUifz6ReBVOeNA0C7w8Q42bByeeRBjEHPv9T8hW', 40165, '2022-08-22 09:06:01', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(290, 'Cahyono Waskita', 'salahudin.faizah@example.com', '612339056', 'nemo', '$2y$10$JjV8WcOznSV1SAlNzBvahuM/uNZPbyAlhNtZBn4YibEMZ2WmkeboS', 445412, '2022-08-22 09:06:02', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(291, 'Galur Hidayat S.Pt', 'ipranowo@example.net', '1048399175', 'ratione', '$2y$10$SBHG1ihGphxUNrvlu5R8OOJ67FqL4qdwe1IKRobn69AhVVHEJyQ4S', 123, '2022-08-22 09:06:03', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(292, 'Darijan Januar S.E.', 'astuti.teguh@example.com', '63698946', 'vel', '$2y$10$k8os8QLszqGhivgVMv1gTutKO4JCiY7ecX/XVJOUWSiH10KY9b/ya', 587, '2022-08-22 09:06:04', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(293, 'Darman Saragih S.Ked', 'jessica62@example.com', '967455529', 'aut', '$2y$10$FFHpmNdWxSRYkSJWWfq7weCOkTPQQBfNwvIF6ZsxrwMFMaWGmF70u', 116, '2022-08-22 09:06:05', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(294, 'Zizi Novitasari', 'situmorang.syahrini@example.org', '1859152437', 'qui', '$2y$10$e6ZA5PTJI10w6kUF04iMWOkI9m5dVPNvEFhavoHCN3QOAN1zk3b4.', 31243756, '2022-08-22 09:06:05', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(295, 'Intan Safitri', 'ghutagalung@example.com', '1853746025', 'voluptas', '$2y$10$DxrGROHncMVcmC/AipwQhurhupI0TIhfbJtL5mX9pvT6MYtRInbbq', 45, '2022-08-22 09:06:06', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(296, 'Iriana Riyanti S.Sos', 'ida89@example.net', '843309471', 'aliquam', '$2y$10$WggjScVt92Kew6tur3p/0uPYlR7O.EWWsI22SM224h4rjcL8p1G1e', 22391, '2022-08-22 09:06:06', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(297, 'Puspa Ellis Kusmawati', 'sadina.maryadi@example.com', '808328230', 'qui', '$2y$10$LytorgohKM6w/CSg9gmR9eMJu/yDIWi8xv6s.t2x.hEC5zWWei5mC', 152131, '2022-08-22 09:06:07', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(298, 'Ciaobella Agustina', 'budi59@example.com', '1326496175', 'sunt', '$2y$10$afsci6g0GC33uWKeNKbvo.JhemA7B02SWw7.vakeRZvKef/nYfVfO', 5963, '2022-08-22 09:06:08', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(299, 'Silvia Riyanti', 'prabowo.harsana@example.org', '1695278235', 'facilis', '$2y$10$QeHRzeauBWhogrQE/KtmTu9yBjOZfGnFYQSpCFaESWomwsRf5bFBG', 38, '2022-08-22 09:06:08', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(300, 'Cakrawala Satya Hidayanto', 'utami.balamantri@example.net', '1079504637', 'vel', '$2y$10$MdqU0PViBHLSM/WLGxBrZu6at1SpGj4f1yEEgjPiTMPnY1QD6UJne', 509, '2022-08-22 09:06:08', '0', 'Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(301, 'Sarah Mila Agustina', 'yessi.zulaika@example.net', '1898364204', 'excepturi', '$2y$10$/wZ09pHplkTJ0nkhEpHErOoaFWS6SMo1M1zfdg5fsK6zjXzd7/AjC', 259, '2022-08-22 09:06:08', '0', 'Tidak Aktif', '2022-08-22 09:06:10', '2022-08-22 09:06:10'),
(302, 'Ardites', 'ardi@gmail.com', '425424242424', 'tukang', '$2y$10$Omt5YvJpyq.9LXfzVpYWteg/iHZXPZr6D7rnp2IlaQush.B5/upBO', 0, NULL, NULL, 'Aktif', '2023-07-23 09:05:02', '2023-07-23 09:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `icon_id` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `long` varchar(100) DEFAULT NULL,
  `lat` varchar(100) DEFAULT NULL,
  `zoom` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kode_ruangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_ruang`
--

INSERT INTO `tb_ruang` (`id`, `nama`, `icon_id`, `urutan`, `gambar`, `created_at`, `updated_at`, `long`, `lat`, `zoom`, `deskripsi`, `kode_ruangan`) VALUES
(3, 'Ruangan Depan', NULL, NULL, 'pict_rooms/yiiQHJTgKz2dqF7nS7FkChiiPuOskFtCbnZGKGAI.jpg', '2023-06-24 10:12:52', '2023-06-24 10:13:54', NULL, NULL, NULL, 'Pintu masuk ruangan depan', 'FrontRoom'),
(4, 'Ruang 2', NULL, NULL, 'pict_rooms/RdwDGn0Z72hFfunwv0GQQlZAS8tLFpoQft3zB2G3.jpg', '2023-07-14 11:46:07', '2023-07-14 11:46:17', NULL, NULL, NULL, 'ruang 2', 'InRoom');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `profile_image_path` varchar(255) DEFAULT NULL,
  `role` enum('1','2') NOT NULL DEFAULT '2',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `profile_image_path`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admininstrator', 'admin@admin.com', '2023-06-19 01:15:31', NULL, '1', '$2y$10$Khle1J1pnh8YV/w1e3XO..UnnEKaqNCoLYNh8ZvpDC5ev4.6.xIXu', NULL, '2023-06-19 01:15:31', '2023-06-19 01:15:31'),
(2, 'iqbal', 'iqbal@gmail.com', '2023-06-19 01:15:31', NULL, '1', '$2y$10$A3U1iSjU6z8WhS.ceU1AFeCu.hy3vedMuwA/A4C9r9JlD3fQemrmm', NULL, '2023-06-19 01:15:31', '2023-06-19 01:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `wisatas`
--

CREATE TABLE `wisatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` mediumtext NOT NULL,
  `isi` mediumtext NOT NULL,
  `id_ruangan` int(11) DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wisatas`
--

INSERT INTO `wisatas` (`id`, `image`, `title`, `isi`, `id_ruangan`, `kategori_id`, `author`, `created_at`, `updated_at`) VALUES
(1, 'wisata_image/YksVZl2ezWWWz4RQwCcTcP3HNfswkdyf2MAjLquW.jpg', 'Tempat Wisata Jogja Paling Populer', '<p>Sudah berapa kali kamu wisata ke Jogja? Jutaan orang ke Jogja setiap tahun. Pertama, <em>pengen</em> lihat Candi Borobudur dan Prambanan. <em>Lho</em>, kamu belum pernah ke sana? Ya, <em>gak papa</em> juga <em>sih</em>. Mungkin kamu lebih suka hal-hal yang sederhana. Misalnya saja sarapan gudeg yang gurih dan manis. Menikmati senja di Pantai Parangtritis. Duduk di bangku pedestrian Malioboro yang romantis. <em>Dengerin</em> musisi jalanan yang entah kenapa suaranya bikin <em>melow</em>. \"Pulang ke kotamu, ada setangkup haru dalam rindu...\"</p>\r\n<p><em>Ups</em>, tanpa sadar kamu tadi <em>nyanyi</em> dalam hati. <em>Gak papa, lanjutin aja</em>. <em>Toh</em>, akhir pekan ini kamu libur. Jadi, kamu bisa langsung <em>cus</em> ke Jogja. Berangkat Jumat sore, malamnya sudah sampai Jogja.</p>\r\n<p>Coba bayangkan. Hari Sabtu dan Minggu, kamu bisa santai-santai di pantai. Biarkan air laut yang bening membelai. Rasanya <em>damaaaaaai</em>. Kamu juga bisa menyusuri sungai bawah tanah dan wisata seru lainnya. Menjelajahi sudut-sudut kota Jogja yang kaya bangunan cagar budaya. Mengunjungi masa lalu di Museum Ullen Sentalu. Menemukan semangat baru dari ratusan tempat wisata di Jogja.</p>\r\n<p>Bayangkan juga suasana akrab di angkringan. Hangatnya teh jahe berpadu dengan aroma arang yang membara. Benarlah kata seorang penyair, \"Yogya terbuat dari rindu, pulang, dan angkringan.\"</p>\r\n<p>Lalu kamu sadar bahwa rasa kangen ini, rindu ini, begitu nyata. Jogja adalah kampung halamanmu juga. Kampung halaman yang sedang memanggilmu untuk pulang</p>', NULL, 1, 'iqbal', '2023-07-20 02:18:43', '2023-07-20 02:18:43'),
(3, 'wisata_image/5TPITX7wSR1o9CPUB6IC3A9pS632uIETMN53Omof.jpg', 'test', '<p>test</p>', 3, 1, 'iqbal', '2023-07-20 03:05:28', '2023-07-20 03:05:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikels_kategori_id_index` (`kategori_id`);

--
-- Indexes for table `artikel_recents`
--
ALTER TABLE `artikel_recents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikel_recents_tamu_id_foreign` (`tamu_id`),
  ADD KEY `artikel_recents_artikel_id_foreign` (`artikel_id`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beritas_kategori_id_index` (`kategori_id`);

--
-- Indexes for table `berita_recents`
--
ALTER TABLE `berita_recents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_recents_tamu_id_foreign` (`tamu_id`),
  ADD KEY `berita_recents_berita_id_foreign` (`berita_id`);

--
-- Indexes for table `buku_tamus`
--
ALTER TABLE `buku_tamus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_tamus_user_id_foreign` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_kategori_id_index` (`kategori_id`);

--
-- Indexes for table `event_penggunas`
--
ALTER TABLE `event_penggunas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_penggunas_tamu_id_foreign` (`tamu_id`),
  ADD KEY `event_penggunas_event_id_foreign` (`event_id`);

--
-- Indexes for table `event_recents`
--
ALTER TABLE `event_recents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_recents_tamu_id_foreign` (`tamu_id`),
  ADD KEY `event_recents_event_id_foreign` (`event_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori_artikels`
--
ALTER TABLE `kategori_artikels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_beritas`
--
ALTER TABLE `kategori_beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_events`
--
ALTER TABLE `kategori_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_wisatas`
--
ALTER TABLE `kategori_wisatas`
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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengaturans`
--
ALTER TABLE `pengaturans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tamu_post_visits`
--
ALTER TABLE `tamu_post_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tamu_post_visits_tamu_id_foreign` (`tamu_id`),
  ADD KEY `tamu_post_visits_wisata_id_foreign` (`wisata_id`);

--
-- Indexes for table `tb_icon`
--
ALTER TABLE `tb_icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_marker`
--
ALTER TABLE `tb_marker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_pengguna_email_unique` (`email`),
  ADD UNIQUE KEY `tb_pengguna_no_hp_unique` (`no_hp`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wisatas`
--
ALTER TABLE `wisatas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wisatas_kategori_id_index` (`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artikel_recents`
--
ALTER TABLE `artikel_recents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berita_recents`
--
ALTER TABLE `berita_recents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buku_tamus`
--
ALTER TABLE `buku_tamus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_penggunas`
--
ALTER TABLE `event_penggunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_recents`
--
ALTER TABLE `event_recents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_artikels`
--
ALTER TABLE `kategori_artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_beritas`
--
ALTER TABLE `kategori_beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_events`
--
ALTER TABLE `kategori_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori_wisatas`
--
ALTER TABLE `kategori_wisatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pengaturans`
--
ALTER TABLE `pengaturans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tamu_post_visits`
--
ALTER TABLE `tamu_post_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_icon`
--
ALTER TABLE `tb_icon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_marker`
--
ALTER TABLE `tb_marker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wisatas`
--
ALTER TABLE `wisatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikels`
--
ALTER TABLE `artikels`
  ADD CONSTRAINT `artikels_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_artikels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `artikel_recents`
--
ALTER TABLE `artikel_recents`
  ADD CONSTRAINT `artikel_recents_artikel_id_foreign` FOREIGN KEY (`artikel_id`) REFERENCES `artikels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artikel_recents_tamu_id_foreign` FOREIGN KEY (`tamu_id`) REFERENCES `buku_tamus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `beritas`
--
ALTER TABLE `beritas`
  ADD CONSTRAINT `beritas_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_beritas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `berita_recents`
--
ALTER TABLE `berita_recents`
  ADD CONSTRAINT `berita_recents_berita_id_foreign` FOREIGN KEY (`berita_id`) REFERENCES `beritas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `berita_recents_tamu_id_foreign` FOREIGN KEY (`tamu_id`) REFERENCES `buku_tamus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `buku_tamus`
--
ALTER TABLE `buku_tamus`
  ADD CONSTRAINT `buku_tamus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_penggunas`
--
ALTER TABLE `event_penggunas`
  ADD CONSTRAINT `event_penggunas_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_penggunas_tamu_id_foreign` FOREIGN KEY (`tamu_id`) REFERENCES `buku_tamus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_recents`
--
ALTER TABLE `event_recents`
  ADD CONSTRAINT `event_recents_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_recents_tamu_id_foreign` FOREIGN KEY (`tamu_id`) REFERENCES `buku_tamus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tamu_post_visits`
--
ALTER TABLE `tamu_post_visits`
  ADD CONSTRAINT `tamu_post_visits_tamu_id_foreign` FOREIGN KEY (`tamu_id`) REFERENCES `buku_tamus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tamu_post_visits_wisata_id_foreign` FOREIGN KEY (`wisata_id`) REFERENCES `wisatas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wisatas`
--
ALTER TABLE `wisatas`
  ADD CONSTRAINT `wisatas_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_wisatas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
