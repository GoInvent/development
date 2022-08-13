-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2022 at 03:46 PM
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
(1, 'Omar Yazidz', 'omar@gmail.com', 'test', 'disbekal', b'1', '2022-07-06 17:09:39', '2022-08-13 04:46:22', b'0'),
(2, 'Test', 'test@gmail.com', 'test', 'kadopus', b'1', '2022-07-07 06:02:21', '2022-07-20 13:34:25', b'0'),
(3, 'Aku', 'aku@gmail.com', 'test', 'penyedia', b'1', '0000-00-00 00:00:00', '2022-07-23 15:17:18', b'0'),
(4, 'Omar Penyedia', 'dia@gmail.com', 'test', 'penyedia', b'1', '2022-07-13 08:41:23', '2022-07-18 03:52:13', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(11) NOT NULL,
  `id_penyedia` int(11) NOT NULL,
  `kelas_bekal` varchar(250) NOT NULL,
  `nama_bekal` varchar(250) NOT NULL,
  `harga_bekal` int(11) NOT NULL,
  `jumlah_bekal` int(11) NOT NULL,
  `tahun_produksi` int(11) NOT NULL,
  `no_kontrak` int(11) NOT NULL,
  `status_barang` bit(1) NOT NULL,
  `status` bit(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `barang`
--
DELIMITER $$
CREATE TRIGGER `insert_log_barang` AFTER INSERT ON `barang` FOR EACH ROW BEGIN
    INSERT INTO log
    set id_barang = new.id_barang,
    nama_baru=new.nama_barang,
    status = 'Masuk Barang',
    stok_awal=new.jumlah_barang,
    stok_masuk=new.jumlah_barang,
    stok_keluar= 0,
    stok_akhir=new.jumlah_barang,
    date = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bekal_penyedia`
--

CREATE TABLE `bekal_penyedia` (
  `id_bekal_penyedia` int(11) NOT NULL,
  `id_penyedia` int(11) NOT NULL,
  `kelas_bekal` varchar(255) NOT NULL,
  `nama_bekal` varchar(255) NOT NULL,
  `id_bekal` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok_bekal` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nama_gudang` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bekal_penyedia`
--

INSERT INTO `bekal_penyedia` (`id_bekal_penyedia`, `id_penyedia`, `kelas_bekal`, `nama_bekal`, `id_bekal`, `harga`, `stok_bekal`, `tahun`, `nama_gudang`, `created_at`, `updated_at`) VALUES
(25, 2, 'BK.1', 'Makanan Jadi', 1000834435, 50000, 50, 2022, 'Dopusbektim', '2022-08-12 09:33:07', '2022-08-12 09:33:07'),
(26, 3, 'BK.2', 'Pakaian Asal', 775408049, 20000, 100, 2001, 'Dopusbekbar', '2022-08-12 09:33:33', '2022-08-12 09:33:33'),
(28, 2, 'BK.2', 'Makanan Belom Jadi', 841280033, 350000, 100, 2010, 'Dopusbektim', '2022-08-12 20:48:58', '2022-08-12 20:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` int(11) NOT NULL,
  `nama_gudang` varchar(255) NOT NULL,
  `alamat_gudang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `nama_gudang`, `alamat_gudang`, `stok`) VALUES
(1, 'Dopusbekbar', 'Jl.Jl. Semper Tim. I No.7, RT.7/RW.1, Semper Tim., Kec. Cilincing, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14130', 1000),
(2, 'Dopusbektim', 'Jl. Pati Unus No.152, Ujung, Kec. Semampir, Kota SBY, Jawa Timur 60155', 500);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_bekal`
--

CREATE TABLE `kategori_bekal` (
  `id_kelas` int(11) NOT NULL,
  `nama_kategori_bekal` varchar(255) NOT NULL,
  `kelas_bekal` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_bekal`
--

INSERT INTO `kategori_bekal` (`id_kelas`, `nama_kategori_bekal`, `kelas_bekal`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', 'BK.1', '2022-07-30 21:03:00', '2022-07-30 21:03:00'),
(9, 'Santri dan Komaliwan', 'BK.2', '2022-08-12 09:36:35', '2022-08-12 09:36:35'),
(12, 'Amunisi', 'BK.3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `komoditi`
--

CREATE TABLE `komoditi` (
  `id_komoditi` int(11) NOT NULL,
  `kode_komoditi` varchar(15) NOT NULL,
  `jenis_komoditi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komoditi`
--

INSERT INTO `komoditi` (`id_komoditi`, `kode_komoditi`, `jenis_komoditi`) VALUES
(6, 'BK.I.00001', 'Roti Kabin'),
(7, 'BK.I.00002', 'Susu Bubuk'),
(8, 'BK.I.00003', 'Kopi Bubuk');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `nama_lama` varchar(250) NOT NULL,
  `nama_baru` varchar(250) NOT NULL,
  `status` varchar(255) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `stok_masuk` int(11) NOT NULL,
  `stok_keluar` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_barang`, `nama_lama`, `nama_baru`, `status`, `stok_awal`, `stok_masuk`, `stok_keluar`, `stok_akhir`, `date`) VALUES
(64, '12345', '', 'Susu', 'Masuk Barang', 200, 200, 0, 200, '2022-07-29 01:51:44'),
(65, '213123', '', 'Kopi', 'Masuk Barang', 20, 20, 0, 20, '2022-07-29 08:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `log_penyedia`
--

CREATE TABLE `log_penyedia` (
  `id_log_penyedia` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('approved','pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_request` int(11) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `id_penyedia` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `nama_gudang` varchar(50) NOT NULL,
  `nama_bekal` varchar(250) NOT NULL,
  `harga_bekal` int(11) NOT NULL,
  `jumlah_bekal` int(11) NOT NULL,
  `tahun_produksi` int(11) NOT NULL,
  `tgl_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_kontrak` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `status_request` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_request`, `id_barang`, `id_penyedia`, `nama_kelas`, `nama_gudang`, `nama_bekal`, `harga_bekal`, `jumlah_bekal`, `tahun_produksi`, `tgl_request`, `no_kontrak`, `status`, `status_request`) VALUES
(85, '12314', 2, 'Makanan Jadi', 'Dopusbekbar', 'Kedelai', 50000, 50, 2022, '2022-08-13 12:06:22', 792560510, 'Pending', b'1'),
(86, '', 2, 'Makanan Jadi', 'Dopusbekbar', 'Lemper', 50000, 1000, 2022, '2022-08-13 13:03:00', 2051813262, 'Pending', b'1'),
(87, '', 2, 'Makanan Jadi', 'Dopusbekbar', 'Sarden', 50000, 0, 2022, '2022-08-13 13:36:44', 820402030, 'Pending', b'1');

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
-- Table structure for table `penyedia_barang`
--

CREATE TABLE `penyedia_barang` (
  `id_penyedia` int(11) NOT NULL,
  `nama_penyedia` varchar(255) NOT NULL,
  `email_penyedia` varchar(255) NOT NULL,
  `no_penyedia` int(11) NOT NULL,
  `alamat_penyedia` varchar(255) NOT NULL,
  `tanggal_terdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyedia_barang`
--

INSERT INTO `penyedia_barang` (`id_penyedia`, `nama_penyedia`, `email_penyedia`, `no_penyedia`, `alamat_penyedia`, `tanggal_terdaftar`) VALUES
(2, 'PT Bogarasa', 'bogarasa@org.id', 2147483647, 'Jl. Kebon Jahe No.12', '2022-07-30 14:37:48'),
(3, 'PT Sari Roti', 'sariroti@gmail.com', 21039810, 'JL. Ir Soekarno', '2022-07-30 21:22:13');

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
(1, 'Omar', '085885819904', 'omar@gmail.com', 'user', '2022-07-24 10:38:13', '2022-07-29 08:38:11', 'Penyedia', b'1'),
(2, 'Siapa', '082119624945', 'siapa@gmail.com', 'user', '2022-07-25 14:14:55', '2022-07-24 14:07:33', 'Penyedia', b'1'),
(3, 'user', '0821389719371', 'user@gmail.com', 'user', '2022-07-29 07:32:09', '2022-07-29 07:39:44', 'User', b'0');

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
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `bekal_penyedia`
--
ALTER TABLE `bekal_penyedia`
  ADD PRIMARY KEY (`id_bekal_penyedia`),
  ADD KEY `fk_id_penyedia` (`id_penyedia`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `kategori_bekal`
--
ALTER TABLE `kategori_bekal`
  ADD PRIMARY KEY (`id_kelas`);

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
  ADD KEY `fk_id_admin` (`id_user`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `fk_id_barang2` (`id_barang`),
  ADD KEY `fk_id_penyedia1` (`id_penyedia`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_kirim`),
  ADD KEY `fk_id_komoditi2` (`id_komoditi`),
  ADD KEY `fk_id_barang1` (`id_barang`),
  ADD KEY `fk_id_user1` (`id_user`);

--
-- Indexes for table `penyedia_barang`
--
ALTER TABLE `penyedia_barang`
  ADD PRIMARY KEY (`id_penyedia`);

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
-- AUTO_INCREMENT for table `bekal_penyedia`
--
ALTER TABLE `bekal_penyedia`
  MODIFY `id_bekal_penyedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_bekal`
--
ALTER TABLE `kategori_bekal`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `komoditi`
--
ALTER TABLE `komoditi`
  MODIFY `id_komoditi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `log_penyedia`
--
ALTER TABLE `log_penyedia`
  MODIFY `id_log_penyedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_kirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `penyedia_barang`
--
ALTER TABLE `penyedia_barang`
  MODIFY `id_penyedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bekal_penyedia`
--
ALTER TABLE `bekal_penyedia`
  ADD CONSTRAINT `fk_id_penyedia` FOREIGN KEY (`id_penyedia`) REFERENCES `penyedia_barang` (`id_penyedia`);

--
-- Constraints for table `log_penyedia`
--
ALTER TABLE `log_penyedia`
  ADD CONSTRAINT `fk_id_admin` FOREIGN KEY (`id_user`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `fk_id_penyedia1` FOREIGN KEY (`id_penyedia`) REFERENCES `penyedia_barang` (`id_penyedia`);

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
