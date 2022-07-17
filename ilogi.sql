-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 06:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilogi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('disbekal','kadopus','penyedia') NOT NULL,
  `status` bit(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `login` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`, `role`, `status`, `created_at`, `last_login`, `login`) VALUES
(1, 'Omar Yazidz', 'omar@gmail.com', 'test', 'disbekal', b'1', '2022-07-06 17:09:39', '2022-07-17 13:31:43', b'0'),
(2, 'Test', 'test@gmail.com', 'test', 'kadopus', b'1', '2022-07-07 06:02:21', '2022-07-17 15:59:25', b'0'),
(3, 'Aku', 'aku@gmail.com', 'test', 'penyedia', b'1', '0000-00-00 00:00:00', '2022-07-17 13:05:01', b'0'),
(4, 'Omar Penyedia', 'dia@gmail.com', 'test', 'penyedia', b'1', '2022-07-13 08:41:23', '2022-07-17 13:05:01', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(11) NOT NULL,
  `id_komoditi` int(11) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tahun_produksi` int(11) NOT NULL,
  `no_kontrak` int(11) NOT NULL,
  `status_barang` bit(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_komoditi`, `nama_barang`, `harga_barang`, `jumlah_barang`, `tahun_produksi`, `no_kontrak`, `status_barang`, `created_at`, `deleted_at`, `updated_at`) VALUES
('11414', 3, 'Pensil', 2500, 95, 2019, 2001198644, b'1', '2017-07-21 19:31:56', '2022-07-17 07:35:38', '2022-07-17 07:35:38'),
('123124', 2, 'Laptop', 150000000, 10, 2015, 1618347659, b'1', '2017-07-22 04:07:34', '2022-07-17 14:28:08', '2022-07-17 14:28:08'),
('12312412', 3, 'Sandal', 15000, 15, 2151, 841766986, b'1', '2017-07-22 04:06:20', '2022-07-17 04:06:20', '2017-07-22 04:06:20'),
('123151', 2, 'Sepatu Nike', 123155, 15, 2154, 123151, b'1', '2022-07-16 03:49:10', '2022-07-16 03:49:10', '2022-07-16 03:49:10'),
('15161', 3, 'Sepatu Adidas Aja', 150000, 10, 2015, 1514515, b'1', '2022-07-16 05:19:12', '2022-07-17 07:15:57', '2022-07-17 07:15:57'),
('155151', 1, 'Jaket', 150000, 45, 2019, 1476624244, b'1', '2017-07-22 04:21:25', '2022-07-17 13:44:34', '2022-07-17 13:44:34');

--
-- Triggers `barang`
--
DELIMITER $$
CREATE TRIGGER `update_log_barang` BEFORE UPDATE ON `barang` FOR EACH ROW BEGIN
    INSERT INTO log
    set id_barang = OLD.id_barang,
    nama_baru=new.nama_barang,
    stok_awal=old.jumlah_barang,
    stok_masuk=new.jumlah_barang,
    stok_keluar=new.jumlah_barang,
    stok_akhir=new.jumlah_barang,
    date = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `komoditi`
--

CREATE TABLE `komoditi` (
  `id_komoditi` int(11) NOT NULL,
  `jenis_komoditi` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komoditi`
--

INSERT INTO `komoditi` (`id_komoditi`, `jenis_komoditi`, `created_at`, `updated_at`) VALUES
(1, 'Pakaian', '2022-07-10 13:53:54', '2022-07-10 13:54:08'),
(2, 'Elektronik', '2022-07-10 13:54:26', '2022-07-10 13:54:38'),
(3, 'Lain-lain', '2022-07-10 13:54:40', '2022-07-10 13:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `nama_lama` varchar(250) NOT NULL,
  `nama_baru` varchar(250) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `stok_masuk` int(11) NOT NULL,
  `stok_keluar` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_barang`, `nama_lama`, `nama_baru`, `stok_awal`, `stok_masuk`, `stok_keluar`, `stok_akhir`, `date`) VALUES
(1, '12314asd', '', '', 10, 0, 0, 0, '2022-07-10 13:00:22'),
(2, 'asdasdasda', '', 'Sepatu', 0, 0, 0, 0, '2022-07-12 06:32:20'),
(3, '12314asd', '', 'Dasi', 0, 0, 0, 0, '2022-07-12 06:33:55'),
(4, 'asdasdasda', '', 'Dasi', 0, 0, 0, 0, '2022-07-12 06:36:45'),
(5, 'asdasdasda', '', 'Dasi', 5151515, 0, 0, 5151515, '2022-07-12 06:43:49'),
(6, 'asdasdasda', '', 'Dasi', 10, 0, 0, 105, '2022-07-12 06:44:27'),
(7, 'asdasdasda', '', 'Dasi', 105, 10, 10, 10, '2022-07-12 07:08:35'),
(10, 'asdasdasda', '', 'Dasi', 10, 10, 10, 10, '2022-07-13 10:19:55'),
(11, 'asdasdasda', '', 'Sepatu', 10, 10, 10, 10, '2022-07-13 10:20:30'),
(12, '123123', '', 'Sepatu', 10, 10, 10, 10, '2022-07-15 17:54:31'),
(13, '12312', '', 'Sepatu', 10, 10, 10, 10, '2022-07-16 01:03:13'),
(14, '12312', '', 'Sepatu', 10, 10, 10, 10, '2022-07-16 01:03:19'),
(15, '12312', '', 'Sepatu', 10, 100, 100, 100, '2022-07-16 01:03:24'),
(16, '12312', '', 'Sepatu', 100, 10, 10, 10, '2022-07-16 01:03:33'),
(17, '12312', '', 'Sepatu', 10, 100, 100, 100, '2022-07-16 01:03:55'),
(19, '15161', '', 'Sepatu Adidas', 15, 15, 15, 15, '2022-07-16 05:22:58'),
(20, '15161', '', 'Sepatu Adidasssss', 15, 15, 15, 15, '2022-07-16 05:23:31'),
(21, '15161', '', 'Sepatu Adidas Aja', 15, 15, 15, 15, '2022-07-16 05:26:11'),
(23, '123124', '', 'Laptop', 15, 15, 15, 15, '2022-07-17 04:12:58'),
(24, '12312412', '', 'Sandal', 15, 15, 15, 15, '2022-07-17 04:13:05'),
(25, '155151', '', 'Jaket', 90, 90, 90, 90, '2022-07-17 04:27:53'),
(26, '155151', '', 'Jaket', 90, 80, 80, 80, '2022-07-17 05:12:29'),
(27, '155151', '', 'Jaket', 80, 70, 70, 70, '2022-07-17 05:13:12'),
(28, '15161', '', 'Sepatu Adidas Aja', 15, 10, 10, 10, '2022-07-17 07:15:57'),
(29, '11414', '', 'Pensil', 100, 95, 95, 95, '2022-07-17 07:35:38'),
(30, '155151', '', 'Jaket', 70, 55, 55, 55, '2022-07-17 07:42:32'),
(31, '123124', '', 'Laptop', 15, 14, 14, 14, '2022-07-17 13:41:54'),
(32, '155151', '', 'Jaket', 55, 45, 45, 45, '2022-07-17 13:44:34'),
(33, '123124', '', 'Laptop', 14, 10, 10, 10, '2022-07-17 14:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `log_penyedia`
--

CREATE TABLE `log_penyedia` (
  `id_log_penyedia` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('approved','pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_request` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_penyedia` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL,
  `id_komoditi` int(11) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `tahun_produksi` int(11) NOT NULL,
  `tgl_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_request` enum('Approved','Pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_request`, `id_admin`, `nama_penyedia`, `role`, `id_komoditi`, `id_barang`, `nama_barang`, `jumlah_barang`, `harga_barang`, `tahun_produksi`, `tgl_request`, `status_request`) VALUES
(30, 3, 'Aku', 'Penyedia', 3, '', 'Pensil', 100, 2500, 2019, '2022-07-17 07:31:23', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_kirim` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat_user` varchar(250) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `id_komoditi` int(11) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `tahun_produksi` int(11) NOT NULL,
  `no_kontrak` int(11) NOT NULL,
  `tgl_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `tgl_kirim` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_request` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_kirim`, `id_user`, `nama_user`, `alamat_user`, `id_barang`, `id_komoditi`, `nama_barang`, `jumlah_barang`, `harga_barang`, `tahun_produksi`, `no_kontrak`, `tgl_request`, `tgl_kirim`, `status_request`) VALUES
(10, 1, 'Omar', '', '155151', 1, 'Jaket', 10, 150000, 2019, 1476624244, '2022-07-17 05:12:29', '2022-07-17 16:03:16', b'1'),
(11, 1, 'Omar', '', '155151', 1, 'Jaket', 10, 150000, 2019, 1476624244, '2022-07-17 05:13:12', '2022-07-17 14:23:50', b'1'),
(12, 1, 'Omar', '', '15161', 3, 'Sepatu Adidas Aja', 5, 150000, 2015, 1514515, '2022-07-17 07:15:57', '2022-07-17 14:23:50', b'1'),
(13, 1, 'Omar', '', '11414', 3, 'Pensil', 5, 2500, 2019, 2001198644, '2022-07-17 07:35:38', '2022-07-17 14:23:50', b'1'),
(14, 2, 'Siapa', '', '155151', 1, 'Jaket', 15, 150000, 2019, 1476624244, '2022-07-17 07:42:32', '2022-07-17 14:23:50', b'1'),
(15, 1, 'Omar', 'Jalan Pluto Dalam 1 No.33 RT04/004', '123124', 2, 'Laptop', 1, 150000000, 2015, 1618347659, '2022-07-17 13:41:54', '2022-07-17 14:23:50', b'1'),
(16, 1, 'Omar', 'Jalan jalan yuk kemana kek', '155151', 1, 'Jaket', 10, 150000, 2019, 1476624244, '2022-07-17 13:44:34', '2022-07-17 14:23:50', b'1'),
(17, 1, 'Omar', 'Jalan Pluto Dalam 1 No.33 RT04/004', '123124', 2, 'Laptop', 4, 150000000, 2015, 1618347659, '2022-07-17 14:28:08', '2022-07-17 14:30:08', b'1');

--
-- Triggers `pengeluaran`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `pengeluaran` FOR EACH ROW UPDATE barang
SET jumlah_barang=jumlah_barang-new.jumlah_barang
WHERE id_barang=new.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) NOT NULL,
  `login` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `no_hp`, `email_user`, `password_user`, `created_at`, `last_login`, `role`, `login`) VALUES
(1, 'Omar', '085885819904', 'omar@gmail.com', 'user', '2022-07-16 12:06:31', '2022-07-17 13:30:41', 'User', b'0'),
(2, 'Siapa', '082119624945', 'siapa@gmail.com', 'user', '2022-07-17 07:36:38', '2022-07-17 13:25:42', 'User', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `nama_barang` (`nama_barang`),
  ADD KEY `fk_id_komoditi` (`id_komoditi`);

--
-- Indexes for table `komoditi`
--
ALTER TABLE `komoditi`
  ADD PRIMARY KEY (`id_komoditi`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_id_barang` (`id_barang`);

--
-- Indexes for table `log_penyedia`
--
ALTER TABLE `log_penyedia`
  ADD PRIMARY KEY (`id_log_penyedia`),
  ADD KEY `fk_id_admin` (`id_admin`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `fk_id_komoditi1` (`id_komoditi`),
  ADD KEY `fk_id_admin1` (`id_admin`),
  ADD KEY `fk_id_barang2` (`id_barang`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_kirim`),
  ADD KEY `fk_id_komoditi2` (`id_komoditi`),
  ADD KEY `fk_id_barang1` (`id_barang`),
  ADD KEY `fk_id_user1` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_user` (`email_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komoditi`
--
ALTER TABLE `komoditi`
  MODIFY `id_komoditi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `log_penyedia`
--
ALTER TABLE `log_penyedia`
  MODIFY `id_log_penyedia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_kirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_id_komoditi` FOREIGN KEY (`id_komoditi`) REFERENCES `komoditi` (`id_komoditi`);

--
-- Constraints for table `log_penyedia`
--
ALTER TABLE `log_penyedia`
  ADD CONSTRAINT `fk_id_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `fk_id_admin1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `fk_id_komoditi1` FOREIGN KEY (`id_komoditi`) REFERENCES `komoditi` (`id_komoditi`);

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `fk_id_barang1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `fk_id_komoditi2` FOREIGN KEY (`id_komoditi`) REFERENCES `komoditi` (`id_komoditi`),
  ADD CONSTRAINT `fk_id_user1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
