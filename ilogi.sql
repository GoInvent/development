-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 06:54 AM
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
(1, 'Omar Yazidz', 'omar@gmail.com', 'test', 'disbekal', b'1', '2022-07-06 17:09:39', '2022-07-18 04:26:59', b'0'),
(2, 'Test', 'test@gmail.com', 'test', 'kadopus', b'1', '2022-07-07 06:02:21', '2022-07-17 15:59:25', b'0'),
(3, 'Aku', 'aku@gmail.com', 'test', 'penyedia', b'1', '0000-00-00 00:00:00', '2022-07-17 13:05:01', b'0'),
(4, 'Omar Penyedia', 'dia@gmail.com', 'test', 'penyedia', b'1', '2022-07-13 08:41:23', '2022-07-18 03:52:13', b'0');

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
  `jenis_komoditi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komoditi`
--

INSERT INTO `komoditi` (`id_komoditi`, `jenis_komoditi`) VALUES
(1, 'Pakaian'),
(2, 'Elektronik'),
(3, 'Lain-lain');

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
  `status_request` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
