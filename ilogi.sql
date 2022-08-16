-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2022 at 12:25 PM
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
(1, 'Omar Yazidz', 'omar@gmail.com', 'test', 'disbekal', b'1', '2022-07-06 17:09:39', '2022-08-16 09:26:53', b'0'),
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
  `nama_gudang` varchar(250) NOT NULL,
  `kelas_bekal` varchar(250) NOT NULL,
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
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_penyedia`, `nama_gudang`, `kelas_bekal`, `harga_bekal`, `jumlah_bekal`, `tahun_produksi`, `no_kontrak`, `status_barang`, `status`, `created_at`, `updated_at`) VALUES
('1235207074', 292375694, 'Dopusbekbar', 'Sarung Wadimor', 150000, 40, 2019, 2120385022, b'1', b'1', '2022-08-16 09:58:43', '2022-08-16 09:58:43'),
('1647727668', 292375694, 'Dopusbekbar', 'Sarung Wadimor', 150000, 10, 2019, 1121990532, b'1', b'1', '2022-08-16 10:03:48', '2022-08-16 10:22:39'),
('1848273272', 159109889, 'Dopusbektim', 'Sarung', 140000, 0, 2010, 280174882, b'1', b'1', '2022-08-16 09:52:02', '2022-08-16 09:53:02'),
('1884418299', 292375694, 'Dopusbekbar', 'Sarung Wadimor', 150000, 100, 2019, 741300777, b'1', b'1', '2022-08-16 10:00:21', '2022-08-16 10:00:21'),
('195193457', 159109889, 'Dopusbektim', 'Beras', 7500, 20, 2019, 14257184, b'1', b'1', '2022-08-16 09:50:25', '2022-08-16 09:50:25');

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
(25, 2, 'BK.1', 'Gandum', 1000834435, 50000, 50, 2022, 'Dopusbektim', '2022-08-12 09:33:07', '2022-08-12 09:33:07'),
(26, 3, 'BK.2', 'Peci', 775408049, 20000, 100, 2001, 'Dopusbekbar', '2022-08-12 09:33:33', '2022-08-12 09:33:33'),
(28, 2, 'BK.1', 'Beras', 841280033, 350000, 100, 2010, 'Dopusbektim', '2022-08-12 20:48:58', '2022-08-12 20:48:58'),
(29, 292375694, 'BK.2-Santri dan Komaliwan', 'Sarung Wadimor', 1955279660, 0, 0, 0, 'Dopusbekbar', '2022-08-16 10:44:23', '2022-08-16 10:44:23'),
(30, 292375694, 'BK.1-Makanan', 'Sarden', 1306794697, 0, 0, 0, 'Dopusbektim', '2022-08-16 10:47:31', '2022-08-16 10:47:31'),
(31, 292375694, 'BK.1-Makanan', 'Kue', 195411391, 0, 0, 0, 'Dopusbekbar', '2022-08-16 10:48:10', '2022-08-16 10:48:10'),
(32, 159109889, 'BK.2-Santri dan Komaliwan', 'Sarung', 612972841, 0, 0, 0, 'Dopusbekbar', '2022-08-16 16:43:13', '2022-08-16 16:43:13'),
(33, 159109889, 'BK.1-Makanan', 'Beras', 1930346373, 0, 0, 0, 'Dopusbekbar', '2022-08-16 16:43:33', '2022-08-16 16:43:33');

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
  `id_penyedia` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `nama_gudang` varchar(50) NOT NULL,
  `harga_bekal` int(11) NOT NULL,
  `jumlah_bekal` int(11) NOT NULL,
  `tahun_produksi` int(11) NOT NULL,
  `tgl_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_kontrak` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `status_request` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_request`, `id_penyedia`, `nama_kelas`, `nama_gudang`, `harga_bekal`, `jumlah_bekal`, `tahun_produksi`, `tgl_request`, `no_kontrak`, `status`, `status_request`) VALUES
(92, 159109889, 'Beras', 'Dopusbektim', 7500, 20, 2019, '2022-08-16 09:45:19', 14257184, 'Approved', '1'),
(93, 292375694, 'Sarden', 'Dopusbekbar', 25000, 10, 2017, '2022-08-16 09:45:52', 574711425, 'Menunggu Persetujuan - 1', '1'),
(94, 159109889, 'Sarung', 'Dopusbektim', 150000, 20, 2020, '2022-08-16 09:51:37', 280174882, 'Approved', '1'),
(95, 292375694, 'Sarung Wadimor', 'Dopusbekbar', 20000, 200, 2019, '2022-08-16 09:57:31', 1720433603, 'Menunggu Persetujuan - 1', '1'),
(96, 292375694, 'Sarung Wadimor', 'Dopusbekbar', 150000, 100, 2019, '2022-08-16 09:58:21', 1121990532, 'Approved', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_kirim` int(11) NOT NULL,
  `id_penyedia` int(11) NOT NULL,
  `nama_penyedia` varchar(50) NOT NULL,
  `alamat_user` varchar(250) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `kelas_bekal` varchar(255) NOT NULL,
  `jumlah_bekal` int(11) NOT NULL,
  `harga_bekal` int(11) NOT NULL,
  `tahun_produksi` int(11) NOT NULL,
  `no_kontrak` int(11) NOT NULL,
  `tgl_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `tgl_kirim` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_request` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_kirim`, `id_penyedia`, `nama_penyedia`, `alamat_user`, `id_barang`, `kelas_bekal`, `jumlah_bekal`, `harga_bekal`, `tahun_produksi`, `no_kontrak`, `tgl_request`, `tgl_kirim`, `status_request`) VALUES
(16, 1, 'Omar', 'Jl. Matahari No.32', '1848273272', 'Sarung', 15, 140000, 2010, 280174882, '2022-08-16 09:53:02', '2022-08-16 09:53:02', b'1'),
(17, 1, 'Omar', 'Jl. Pluto Dalam 1', '1647727668', 'Sarung Wadimor', 50, 150000, 2019, 1121990532, '2022-08-16 10:04:55', '2022-08-16 10:04:55', b'1'),
(18, 1, 'Omar', 'Jl. Pluto Dalam 1', '1647727668', 'Sarung Wadimor', 20, 150000, 2019, 1121990532, '2022-08-16 10:16:43', '2022-08-16 10:16:43', b'1'),
(19, 2, 'Allaam', 'Jl. Kemerdekaan', '1647727668', 'Sarung Wadimor', 20, 150000, 2019, 1121990532, '2022-08-16 10:22:39', '2022-08-16 10:22:39', b'1');

--
-- Triggers `pengeluaran`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `pengeluaran` FOR EACH ROW UPDATE barang
SET jumlah_bekal=jumlah_bekal-new.jumlah_bekal
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
(159109889, 'PT. Bogarasa', 'bogarasa@co.id', 215151422, 'Jl. Sudirman', '2022-08-16 16:42:22'),
(292375694, 'PT. Alfaria Sejahtera', 'alfaria@co.id', 2147483647, 'Jl. Hos Cokroaminoto', '2022-08-16 10:34:45');

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
(1, 'Omar', '085885819904', 'omar@gmail.com', 'user', '2022-07-24 10:38:13', '2022-08-16 09:28:38', 'User', b'1'),
(2, 'Allaam', '082119624945', 'allaam@gmail.com', 'user', '2022-07-25 14:14:55', '2022-08-16 10:22:14', 'User', b'1');

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
  ADD KEY `fk_id_penyedia1` (`id_penyedia`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_kirim`),
  ADD KEY `fk_id_barang1` (`id_barang`),
  ADD KEY `fk_id_penyedia` (`id_penyedia`);

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
  MODIFY `id_bekal_penyedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_kirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
