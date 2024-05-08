-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 09:00 AM
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
-- Database: `swalayan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `transaksi_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `produk_id`, `quantity`, `biaya`, `transaksi_id`) VALUES
(1, 1, 1, 30000, 1),
(2, 2, 1, 15000, 1),
(3, 1, 1, 30000, 2),
(4, 2, 2, 30000, 2);

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
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(10) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `nama`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `alamat`, `user_id`) VALUES
(1, 'Ahmad Rayhan', '1234567890123456', 'Laki-Laki', 'Dumai', '2002-10-11', '081234567890', 'Jl. Kandangan Padati, Padang', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(10) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `alamat`, `user_id`) VALUES
(1, 'Muhammad Ardyansyah', '1234567890123457', 'Laki-Laki', 'Padang', '2001-03-08', '081234567891', 'Jl. Jati, Padang', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(15) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama_kategori`, `keterangan`) VALUES
(1, 'kategori 1', 'keterangan kategori 1'),
(2, 'kategori 2', 'keterangan kategori 2');

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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_05_06_144812_create_inventaris_table', 1),
(7, '2024_05_06_144926_create_kasirs_table', 1),
(8, '2024_05_06_144939_create_pelanggans_table', 1),
(9, '2024_05_06_144951_create_suppliers_table', 1),
(10, '2024_05_06_145004_create_kategori_produks_table', 1),
(11, '2024_05_06_145010_create_produks_table', 1),
(12, '2024_05_06_145022_create_on_supplies_table', 1),
(13, '2024_05_06_145033_create_transaksis_table', 1),
(14, '2024_05_06_145041_create_detail_transaksis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `on_supply`
--

CREATE TABLE `on_supply` (
  `produk_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(12) NOT NULL,
  `inventaris_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `on_supply`
--

INSERT INTO `on_supply` (`produk_id`, `supplier_id`, `quantity`, `status`, `inventaris_id`) VALUES
(1, 1, 187, 'Recipient', 1),
(2, 1, 130, 'Recipient', 1);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `kode_pos`, `alamat`, `img_url`, `user_id`) VALUES
(1, 'Muhakim', '1234567890123458', 'Laki-Laki', 'Padang', '2003-02-15', '081234567892', '99009', 'Kpg. Basmol Raya No. 913', 'https://via.placeholder.com/640x480.png/007766?text=programmer+sed', 3),
(2, 'Jhon Doe', '1234567890123456', 'Laki-Laki', 'Padang', '2000-02-20', '082198928341', '1234', 'padang', 'http://foto/profile.jpg', 5);

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
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(15) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `img_url` varchar(50) NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `stock`, `status`, `deskripsi`, `img_url`, `kategori_id`) VALUES
(1, 'product 1', 30000, 100, 'Tersedia', 'deskripsi product 1', 'https://www.product-images.com/product-1.jpg', 1),
(2, 'product 2', 15000, 100, 'Tersedia', 'deskripsi product 2', 'https://www.product-images.com/product-2.jpg', 2),
(3, 'product 3', 10000, 0, 'Kosong', 'deskripsi product 3', 'https://www.product-images.com/product-3.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(10) UNSIGNED NOT NULL,
  `nama_supplier` varchar(80) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_hp`, `alamat`) VALUES
(1, 'PJ Setiawan Hutapea', '+260883828953', 'Psr. Abdul Muis No. 982'),
(2, 'CV Rajata Wijaya (Persero) Tbk', '+22373798663', 'Psr. Bakhita No. 826'),
(3, 'PT Suryono Kusmawati', '+5928952136', 'Jr. Casablanca No. 147'),
(4, 'Yayasan Astuti Rahmawati', '+22916464194', 'Ds. Elang No. 451'),
(5, 'Fa Simbolon Sihotang', '+968956179403', 'Kpg. Ketandan No. 52'),
(6, 'Yayasan Handayani', '+247926355', 'Jln. Bazuka Raya No. 806'),
(7, 'CV Mangunsong', '+2201253219', 'Jr. Gatot Subroto No. 685'),
(8, 'UD Novitasari', '+255067744945', 'Jln. Yosodipuro No. 359'),
(9, 'Yayasan Widiastuti (Persero) Tbk', '+265203084475', 'Ki. Bara Tambar No. 695'),
(10, 'PD Situmorang (Persero) Tbk', '+51192071467', 'Ki. Rajawali Timur No. 467'),
(11, 'Fa Budiman Hariyah', '+590535758326', 'Ds. Industri No. 770'),
(12, 'CV Purnawati (Persero) Tbk', '+594071864642', 'Jr. Sukabumi No. 444'),
(13, 'CV Pradana Nainggolan Tbk', '+6832004485', 'Ds. Gedebage Selatan No. 768'),
(14, 'Yayasan Andriani', '+51728855639', 'Kpg. Bawal No. 855'),
(15, 'Yayasan Mardhiyah Hassanah Tbk', '+22751360692', 'Gg. Bazuka Raya No. 288'),
(16, 'PD Megantara', '+636941399052', 'Jln. Bank Dagang Negara No. 308'),
(17, 'Fa Salahudin (Persero) Tbk', '+50462800317', 'Psr. Hasanuddin No. 826'),
(18, 'Perum Saptono Tbk', '+224479369636', 'Psr. Baja No. 922'),
(19, 'PJ Tarihoran', '+387992892875', 'Dk. Bazuka Raya No. 204'),
(20, 'PD Widiastuti', '+6920750072', 'Gg. Balikpapan No. 250'),
(21, 'PD Sihombing Wastuti', '+3811334705124', 'Gg. Bhayangkara No. 560'),
(22, 'Fa Prabowo Purwanti Tbk', '+231329167443', 'Gg. Baabur Royan No. 197'),
(23, 'PT Jailani Prasetya', '+870812398347', 'Ds. Sunaryo No. 230'),
(24, 'Fa Kusmawati', '+6857035698933', 'Psr. Mahakam No. 119'),
(25, 'Yayasan Siregar Tbk', '+2344869316570', 'Ds. Bakau No. 916'),
(26, 'UD Budiyanto', '+996759344467', 'Ds. Merdeka No. 736'),
(27, 'UD Saputra Laksmiwati Tbk', '+954629125628', 'Psr. B.Agam Dlm No. 45'),
(28, 'PJ Januar Uwais', '+242993532204', 'Psr. Raya Setiabudhi No. 848'),
(29, 'PD Laksita', '+909371602555', 'Jln. Gajah Mada No. 719'),
(30, 'Fa Pudjiastuti Sihombing Tbk', '+68673313891', 'Jr. Sudirman No. 352');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) UNSIGNED NOT NULL,
  `nota` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `kasir_id` int(10) UNSIGNED DEFAULT NULL,
  `pelanggan_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nota`, `tanggal`, `total_biaya`, `status`, `kasir_id`, `pelanggan_id`) VALUES
(1, 'T20240508112006', '2024-05-08', 45000, 'Pending', 1, 1),
(2, 'T20240508112007', '2024-05-08', 60000, 'Selesai', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `role`) VALUES
(1, 'admin@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin'),
(2, 'ahmadrayhan@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Inventaris'),
(3, 'ardyansyah.muhammad@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Kasir'),
(4, 'muhakim@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Pelanggan'),
(5, 'sample@mail.com', '$2y$10$tLpm8pz0HTyGAKUzaAIEzuBrmWXAFRU8SW/YyQpVXe2z.hs9dxnLe', 'Pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `detail_transaksi_produk_id_foreign` (`produk_id`),
  ADD KEY `detail_transaksi_transaksi_id_foreign` (`transaksi_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD UNIQUE KEY `inventaris_nik_unique` (`nik`),
  ADD UNIQUE KEY `inventaris_no_hp_unique` (`no_hp`),
  ADD KEY `inventaris_user_id_foreign` (`user_id`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`),
  ADD UNIQUE KEY `kasir_nik_unique` (`nik`),
  ADD UNIQUE KEY `kasir_no_hp_unique` (`no_hp`),
  ADD KEY `kasir_user_id_foreign` (`user_id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `on_supply`
--
ALTER TABLE `on_supply`
  ADD KEY `on_supply_produk_id_foreign` (`produk_id`),
  ADD KEY `on_supply_supplier_id_foreign` (`supplier_id`),
  ADD KEY `on_supply_inventaris_id_foreign` (`inventaris_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `pelanggan_nik_unique` (`nik`),
  ADD UNIQUE KEY `pelanggan_no_hp_unique` (`no_hp`),
  ADD KEY `pelanggan_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `produk_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `transaksi_nota_unique` (`nota`),
  ADD KEY `transaksi_kasir_id_foreign` (`kasir_id`),
  ADD KEY `transaksi_pelanggan_id_foreign` (`pelanggan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `detail_transaksi_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `kasir`
--
ALTER TABLE `kasir`
  ADD CONSTRAINT `kasir_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `on_supply`
--
ALTER TABLE `on_supply`
  ADD CONSTRAINT `on_supply_inventaris_id_foreign` FOREIGN KEY (`inventaris_id`) REFERENCES `inventaris` (`id_inventaris`),
  ADD CONSTRAINT `on_supply_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `on_supply_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id_supplier`);

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_produk` (`id_kategori`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_kasir_id_foreign` FOREIGN KEY (`kasir_id`) REFERENCES `kasir` (`id_kasir`),
  ADD CONSTRAINT `transaksi_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
