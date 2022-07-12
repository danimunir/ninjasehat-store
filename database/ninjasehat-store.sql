-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 01:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ninjasehat-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` int(11) NOT NULL,
  `nama_katalog` varchar(64) NOT NULL,
  `slug` varchar(64) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `nama_katalog`, `slug`, `deskripsi`) VALUES
(10, 'Obat Cair', 'obat cair', ''),
(11, 'Kapsul', 'kapsul', ''),
(12, 'Tablet', 'tablet', ''),
(13, 'Obat Tidur', 'obat tidur', ''),
(14, 'Pil', 'pil', ''),
(15, 'Obat Oles', 'obat oles', ''),
(16, 'Antidepresan', 'antidepresan', '');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `resi` varchar(16) NOT NULL,
  `pembeli_id` int(11) NOT NULL,
  `total_harga` double(16,0) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `kirim_ke` text NOT NULL,
  `terbaca` enum('0','1','2') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `resi`, `pembeli_id`, `total_harga`, `status`, `kirim_ke`, `terbaca`, `created_at`, `updated_at`) VALUES
(20, '1655723551', 3, 110551, '2', 'GANG BABAH, KOTA : JAKARTA TIMUR, PROFINSI : DKI JAKARTA, KODEPOS : 13810', '0', '2022-06-20 11:13:07', '2022-06-20 06:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id_ordetail` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `produk_harga` double(16,0) NOT NULL,
  `qty` tinyint(4) NOT NULL,
  `subtotal` double(16,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id_ordetail`, `order_id`, `produk_id`, `produk_harga`, `qty`, `subtotal`, `created_at`) VALUES
(20, 20, 18, 30000, 1, 30000, '2022-06-20 06:12:31'),
(21, 20, 15, 10000, 1, 10000, '2022-06-20 06:12:31'),
(22, 20, 19, 70000, 1, 70000, '2022-06-20 06:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `orderkonfirm`
--

CREATE TABLE `orderkonfirm` (
  `id_orkonfirm` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `resi` varchar(16) NOT NULL,
  `metode` varchar(16) NOT NULL,
  `tujuan` varchar(16) NOT NULL,
  `atasnama` varchar(128) NOT NULL,
  `dari` varchar(16) NOT NULL,
  `rekening` varchar(32) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `terbaca` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderkonfirm`
--

INSERT INTO `orderkonfirm` (`id_orkonfirm`, `order_id`, `resi`, `metode`, `tujuan`, `atasnama`, `dari`, `rekening`, `tanggal_transfer`, `terbaca`, `created_at`) VALUES
(2, 20, '1655723551', '', 'BRI', 'Dhani', 'Mandiri', '123123123', '2022-06-20', '1', '2022-06-20 11:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(64) NOT NULL,
  `profinsi` varchar(32) NOT NULL,
  `kodepos` varchar(8) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `phone`, `alamat`, `kota`, `profinsi`, `kodepos`, `password`, `created_at`, `updated_at`) VALUES
(3, 'Dhani', 'danimmunir1@gmail.com', '123457', 'gang babah', 'jakarta timur', 'DKI Jakarta', '13810', 'a73256267f08f754fceea0e890d78ff8', '2022-06-20 06:04:31', '2022-06-20 06:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `namasitus` varchar(255) NOT NULL,
  `metatag` text NOT NULL,
  `metadeskripsi` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `katalog_id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `permalink` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_jual` double(16,0) NOT NULL,
  `harga_coret` double(16,0) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `katalog_id`, `nama_produk`, `permalink`, `stok`, `harga_jual`, `harga_coret`, `gambar`, `deskripsi`, `created_at`, `updated_at`) VALUES
(13, 10, 'Promag Cair', 'promag-cair', 20, 50000, 0, 'promag_cair_1655722204.jpg', 'Promag ini dibuat untuk orang yang sakit', '2022-06-20 05:50:04', '2022-06-20 05:50:04'),
(14, 10, 'Hexadol', 'hexadol', 20, 50000, 10, 'hexadol_1655722366.jpg', 'khusus orang yang sakit', '2022-06-20 05:52:46', '2022-06-20 05:52:46'),
(15, 11, 'Amoxilin', 'amoxilin', 46, 10000, 0, 'amoxilin_1655722495.jpg', 'Untuk sakit kepala', '2022-06-20 11:12:31', '2022-06-20 05:54:55'),
(16, 12, 'Paracetamol', 'paracetamol', 48, 20000, 0, 'paracetamol_1655722582.jpg', 'Untuk obat sakit kepala', '2022-06-20 05:56:22', '2022-06-20 05:56:22'),
(17, 13, 'Lelap', 'lelap', 30, 30000, 0, 'lelap_1655722659.jpg', 'Untuk yang susah tidur', '2022-06-20 05:57:39', '2022-06-20 05:57:39'),
(18, 15, 'Asam Urat', 'asam-urat', 48, 30000, 0, 'kolton_1655722786.jpg', 'Untuk mengoles ', '2022-06-20 11:12:31', '2022-06-20 06:08:27'),
(19, 14, 'Hakubi White', 'hakubi-white', 19, 70000, 0, 'hakubi_white_1655722882.jpg', '', '2022-06-20 11:12:31', '2022-06-20 06:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `email`, `phone`, `created_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'administrator@admin.com', '08123456789', '2017-04-23 22:22:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id_ordetail`);

--
-- Indexes for table `orderkonfirm`
--
ALTER TABLE `orderkonfirm`
  ADD PRIMARY KEY (`id_orkonfirm`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id_katalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id_ordetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orderkonfirm`
--
ALTER TABLE `orderkonfirm`
  MODIFY `id_orkonfirm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
