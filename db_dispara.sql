-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2023 at 03:38 AM
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

--
-- Dumping data for table `artikels`
--

INSERT INTO `artikels` (`id`, `image`, `title`, `isi`, `kategori_id`, `author`, `created_at`, `updated_at`) VALUES
(1, 'artikel_image/hQs7fmcsdMmi3Ho3dbhECOUQAhIzl9u0Fx4B09zE.png', 'artikel kecil', '<div>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>', 1, 'iqbal', '2023-07-25 04:24:25', '2023-07-25 04:24:25');

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
  `user_id` int(11) DEFAULT NULL,
  `pelindung` varchar(255) DEFAULT NULL,
  `no_hp` varchar(30) DEFAULT NULL,
  `alamat` mediumtext DEFAULT NULL,
  `last_visited_post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku_tamus`
--

INSERT INTO `buku_tamus` (`id`, `user_id`, `pelindung`, `no_hp`, `alamat`, `last_visited_post_id`, `created_at`, `updated_at`) VALUES
(14, 311, 'jogja', '085421525484518', 'jogja ajah', NULL, '2023-07-26 00:29:48', '2023-07-26 00:29:48');

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
(1, 'event_image/5PFztk2koVLWk9tv8Rhk7tK1jCI6EziWdHetbEt2.jpg', 'test', '<div>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>', '2023-07-23 02:02:00', '2023-07-24 02:02:00', 1, 'iqbal', '2023-07-23 00:25:11', '2023-07-23 00:25:11'),
(2, 'event_image/pZzDwD2Lw0bmOcDPLIHO7QKJ5GNntYr4msv9wD3L.jpg', 'acara piknik', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '2023-02-22 10:10:00', '2023-02-22 12:10:00', 2, 'iqbal bol', '2023-07-27 04:32:15', '2023-07-27 04:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `event_penggunas`
--

CREATE TABLE `event_penggunas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tamu_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('proses','tolak','setujui') NOT NULL DEFAULT 'proses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_penggunas`
--

INSERT INTO `event_penggunas` (`id`, `tamu_id`, `event_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, 1, 'tolak', '2023-07-26 00:29:48', '2023-07-30 05:08:19');

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

--
-- Dumping data for table `kategori_artikels`
--

INSERT INTO `kategori_artikels` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'cerita', '2023-07-25 04:23:16', '2023-07-25 04:23:16');

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
-- Table structure for table `tb_katagori_ruangan`
--

CREATE TABLE `tb_katagori_ruangan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_katagori_ruangan`
--

INSERT INTO `tb_katagori_ruangan` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(1, 'daerah alun alun', '2023-07-31 00:39:36', '2023-07-30 06:44:06'),
(3, 'test', '2023-07-31 01:02:53', '2023-07-31 01:02:53');

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
(311, 'Ardianw', 'ardiaen@g.mail', '085421525484888', 'jogjaaaaaaa', '$2y$10$nliulXcHgP6/eDVc2qPjx.mqxXiAhxzEfMBmF2x.x06L3SLGf7SN.', 0, NULL, 'pict_profile/FV26hXDcKFUCf45F0CpV6EzL7js66cbRUrrBq3kN.jpg', 'Aktif', '2023-07-25 07:33:41', '2023-07-30 02:22:05'),
(315, 'Ardianwuyu', 'ardiaen@ug.mail', '0854215484518', 'jogja', '$2y$10$TvXRB2L9K6fxS0Z5v4SruOGFQEpOPqi3Wg4voCXKPFbsSRub8mnMK', 0, NULL, 'pict_profile/2GjrZ6JGyo6DTWWy11C8NcwnfZR5QY7MWLYDbyNP.png', 'Aktif', '2023-07-25 07:37:17', '2023-07-28 04:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `id_kat` int(11) DEFAULT NULL,
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

INSERT INTO `tb_ruang` (`id`, `nama`, `id_kat`, `icon_id`, `urutan`, `gambar`, `created_at`, `updated_at`, `long`, `lat`, `zoom`, `deskripsi`, `kode_ruangan`) VALUES
(7, 'Test', 1, NULL, NULL, 'pict_rooms/PbZAEHKpFZGo6aSx4qvXfJQhmrRVJywZFpH5m4mf.jpg', '2023-07-30 07:29:26', '2023-07-30 07:29:33', NULL, NULL, NULL, 'Tets', 'FrontRoom');

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
(1, 'wisata_image/YksVZl2ezWWWz4RQwCcTcP3HNfswkdyf2MAjLquW.jpg', 'Tempat Wisata Jogja Paling Populer', '<p>Sudah berapa kali kamu wisata ke Jogja? Jutaan orang ke Jogja setiap tahun. Pertama, <em>pengen</em> lihat Candi Borobudur dan Prambanan. <em>Lho</em>, kamu belum pernah ke sana? Ya, <em>gak papa</em> juga <em>sih</em>. Mungkin kamu lebih suka hal-hal yang sederhana. Misalnya saja sarapan gudeg yang gurih dan manis. Menikmati senja di Pantai Parangtritis. Duduk di bangku pedestrian Malioboro yang romantis. <em>Dengerin</em> musisi jalanan yang entah kenapa suaranya bikin <em>melow</em>. \"Pulang ke kotamu, ada setangkup haru dalam rindu...\"</p>\r\n<p><em>Ups</em>, tanpa sadar kamu tadi <em>nyanyi</em> dalam hati. <em>Gak papa, lanjutin aja</em>. <em>Toh</em>, akhir pekan ini kamu libur. Jadi, kamu bisa langsung <em>cus</em> ke Jogja. Berangkat Jumat sore, malamnya sudah sampai Jogja.</p>\r\n<p>Coba bayangkan. Hari Sabtu dan Minggu, kamu bisa santai-santai di pantai. Biarkan air laut yang bening membelai. Rasanya <em>damaaaaaai</em>. Kamu juga bisa menyusuri sungai bawah tanah dan wisata seru lainnya. Menjelajahi sudut-sudut kota Jogja yang kaya bangunan cagar budaya. Mengunjungi masa lalu di Museum Ullen Sentalu. Menemukan semangat baru dari ratusan tempat wisata di Jogja.</p>\r\n<p>Bayangkan juga suasana akrab di angkringan. Hangatnya teh jahe berpadu dengan aroma arang yang membara. Benarlah kata seorang penyair, \"Yogya terbuat dari rindu, pulang, dan angkringan.\"</p>\r\n<p>Lalu kamu sadar bahwa rasa kangen ini, rindu ini, begitu nyata. Jogja adalah kampung halamanmu juga. Kampung halaman yang sedang memanggilmu untuk pulang</p>', 1, 1, 'iqbal', '2023-07-20 02:18:43', '2023-07-20 02:18:43'),
(3, 'wisata_image/5TPITX7wSR1o9CPUB6IC3A9pS632uIETMN53Omof.jpg', 'test', '<p>test</p>', 1, 1, 'iqbal', '2023-07-20 03:05:28', '2023-07-20 03:05:28');

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
  ADD UNIQUE KEY `user_id` (`user_id`);

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
  ADD UNIQUE KEY `tamu_id` (`tamu_id`),
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
-- Indexes for table `tb_katagori_ruangan`
--
ALTER TABLE `tb_katagori_ruangan`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_penggunas`
--
ALTER TABLE `event_penggunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_recents`
--
ALTER TABLE `event_recents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_artikels`
--
ALTER TABLE `kategori_artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_icon`
--
ALTER TABLE `tb_icon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_katagori_ruangan`
--
ALTER TABLE `tb_katagori_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_marker`
--
ALTER TABLE `tb_marker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
