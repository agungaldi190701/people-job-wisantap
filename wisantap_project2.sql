-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2023 at 04:08 PM
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
-- Database: `wisantap_project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinasis`
--

CREATE TABLE `destinasis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinasis`
--

INSERT INTO `destinasis` (`id`, `nama`, `alamat`, `deskripsi`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Situ Cipanten', 'Kecamatan Sindang, Kabupaten Majalengka, Jawa Barat.', 'Situ Cipanten merupakan tempat wisata yang terdapat di Kecamatan Sindang, Kabupaten Majalengka, Jawa Barat.  \r\n                          Kawasan destinasi ini merupakan favorit masyarakat Majalengka. \r\n                          Situ Cipanten memiliki keindahan danau yang eksotis dengan air yang segar. \r\n                          Situ Cipanten memiliki air yang sangat jernih hingga terlihat bisa melihat ke dasar serta bisa melihat ikan - ikan yang ada di danau ini. \r\n                          Keindahan kawasan ini ditambah dengan hutan di sekeliling situ yang menambah keasrian dan kesegaran udara di sekitarnya. \r\n                          Bahkan pada siang hari, kawasan wisata ini nyaman untuk disinggahi.', 10000, 'Situ Cipanten Ilmi 2 1.png', '2023-01-02 03:47:48', '2023-01-02 03:48:10'),
(2, 'The Lodge Maribaya', 'Jalan Maribaya No. 149/252 RT. 03 / RW. 15 Babakan, Gentong, Cibodas, Kec. Lembang, Kabupaten Bandung Barat, Jawa Barat 40391', 'The Lodge Maribaya Camp & Village yang merupakan bagian dari The Lodge Maribaya adalah tempat bermalam terbaik di dataran tinggi Lembang yang menawarkan fasilitas menginap berbentuk labu (Camping) dan rumah adat (Village/Joglo/Rumah Pohon). Rasakan sensasi berkemah bersama teman atau keluarga di tengah hutan pinus dengan fasilitas nyaman dan lengkap untuk sejenak keluar dari rutinitas dan kesibukan sehari-hari.', 15000, 'The Lodge Maribaya 1.png', '2023-01-02 03:49:12', '2023-01-02 09:00:22'),
(3, 'Taman Wisata Karangresik', 'Jl. Mohamad Hatta, Sukamanah, Kec. Cipedes, Kab. Tasikmalaya, Jawa Barat 46131', 'Taman Wisata Karang sebuah taman hiburan di sisi Sungai Citanduy, Tasikmalaya. Dengan luas 32 hektar, taman ini menawarkan banyak kegiatan rekreasi yang asyik untuk dijajal bersama keluarga dan teman di akhir pekan.\r\n\r\nMenariknya, taman ini memadukan beragam konsep sekaligus. Wisatawan bisa mendapatkan pengalaman rekreasi, wisata edukasi, wisata sejarah, hingga wisata kuliner sekaligus.', 35000, 'Taman_Wisata_Karangresik 1.png', '2023-01-02 03:49:58', '2023-01-02 03:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `destinasis_id` bigint UNSIGNED NOT NULL,
  `jumlah_pengunjung` int NOT NULL,
  `nama_pengunjung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_daerah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_berangkat` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `user_id`, `destinasis_id`, `jumlah_pengunjung`, `nama_pengunjung`, `asal_daerah`, `total`, `payment_method`, `status`, `tanggal_berangkat`, `created_at`, `updated_at`) VALUES
(4, 2, 2, 5, 'user', 'Jambi', 75000, 'DANA', 'sudah dibayar', '2023-01-02 21:42:00', '2023-01-02 07:42:19', '2023-01-02 08:16:44'),
(5, 2, 1, 10, 'user', 'Jogja', 100000, 'DANA', 'pending', '2023-01-02 22:15:00', '2023-01-02 08:15:30', '2023-01-02 08:16:15'),
(6, 2, 3, 5, 'user', 'Jakarta Selatan', 175000, 'GOPAY', 'belum dibayar', '2023-01-02 22:15:00', '2023-01-02 08:15:58', '2023-01-02 08:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_29_202835_create_destinasis_table', 1),
(6, '2022_12_29_203259_create_rating', 1),
(7, '2023_01_02_102955_create_detail_transaksi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id` bigint UNSIGNED NOT NULL,
  `destinasis_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`id`, `destinasis_id`, `user_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 5, '2023-01-02 03:55:14', '2023-01-02 03:55:14'),
(2, 2, 1, 4, '2023-01-02 03:55:32', '2023-01-02 03:55:32'),
(3, 2, 1, 5, '2023-01-02 03:55:44', '2023-01-02 03:55:44'),
(4, 2, 2, 4, '2023-01-02 07:41:45', '2023-01-02 07:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@admin', '$2y$10$SrOmeTGGCyji6ZaT1Ce8.OY4dVLzfLrjTudGXkQzn9kqG.eoq/Wta', NULL, '2023-01-02 03:45:45', '2023-01-02 03:45:45'),
(2, 'user', 'admin', 'user@email.com', '$2y$10$7Z.k2PnU8ZTFfR/OigGk7u.wspKH6uCxowBw41m3ZX8SfNJVhLyIW', NULL, '2023-01-02 05:21:20', '2023-01-02 05:21:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinasis`
--
ALTER TABLE `destinasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksi_user_id_foreign` (`user_id`),
  ADD KEY `detail_transaksi_destinasis_id_foreign` (`destinasis_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_rating_destinasis_id_foreign` (`destinasis_id`),
  ADD KEY `tb_rating_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `destinasis`
--
ALTER TABLE `destinasis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_destinasis_id_foreign` FOREIGN KEY (`destinasis_id`) REFERENCES `destinasis` (`id`),
  ADD CONSTRAINT `detail_transaksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD CONSTRAINT `tb_rating_destinasis_id_foreign` FOREIGN KEY (`destinasis_id`) REFERENCES `destinasis` (`id`),
  ADD CONSTRAINT `tb_rating_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
