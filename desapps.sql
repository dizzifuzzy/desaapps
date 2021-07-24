-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 08:21 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desapps`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(5) NOT NULL,
  `nama_adm` varchar(50) NOT NULL,
  `username_adm` varchar(50) NOT NULL,
  `password_adm` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_adm`, `nama_adm`, `username_adm`, `password_adm`) VALUES
(1, 'admins', 'admin', '$2y$10$9mV1rgjCHIh5sdYLxJiejOyxjqERFX1b0Egc42DlsogurG0YrLVlq');

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id_aktivitas` int(1) NOT NULL,
  `kunci_aktivitas` varchar(50) NOT NULL,
  `nama_aktivitas` varchar(50) NOT NULL,
  `waktu_aktivitas` varchar(50) NOT NULL,
  `id_petugas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`id_aktivitas`, `kunci_aktivitas`, `nama_aktivitas`, `waktu_aktivitas`, `id_petugas`) VALUES
(6, 'id: 4 - bukutamu', 'Mengubah data Buku Tamu dengan NIK 123456789012345', '10:53:54pm 2019-10-28', 3),
(7, 'id: 1 - skck', 'Mengubah data SKCK dengan nomor surat 12', '', 3),
(8, 'id: 1 - skck', 'Mengubah data SKCK dengan nomor surat 13', '11:12:13pm 2019-10-28', 3),
(9, 'id: 0 - masuk', 'Login kedalam website', '11:13:50 pm 28-10-2019', 3),
(10, 'id: 1 - serbaguna', 'Mengubah data Serba Guna dengan nomor surat 13', '11:14:54pm 2019-10-28', 3),
(11, 'id: 1 - stkm', 'Menambahkan data SKTM dengan nomor surat 1', '11:42:02 pm 28/10/2019', 3),
(14, 'id: 0 - ubahdata', 'Mengubah Profil', '12:43:34 am 29/10/2019', 3),
(15, 'id: 0 - ubahdata', 'Mengubah Profil', '12:44:09 am 29/10/2019', 3),
(16, 'id: 0 - ubahdata', 'Mengubah Password', '12:55:05 am 29/10/2019', 3),
(17, 'id: 0 - masuk', 'Login kedalam website', '01:21:35 am 29/10/2019', 5),
(18, 'id: 0 - masuk', 'Login kedalam website', '01:30:04 am 29/10/2019', 6),
(19, 'id: 4 - bukutamu', 'Mengubah data Buku Tamu dengan NIK 123456789012345', '11:56:48 am 29/10/2019', 6),
(20, 'id: 1 - skck', 'Mengubah data SKCK dengan nomor surat 13555', '11:57:10 am 29/10/2019', 6),
(21, 'id: 0 - masuk', 'Login kedalam website', '01:19:59 am 25/07/2021', 1),
(22, 'id: 0 - ubahdata', 'Mengubah Profil', '01:20:23 am 25/07/2021', 1),
(23, 'id: 0 - ubahdata', 'Mengubah Password', '01:20:28 am 25/07/2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_diri`
--

CREATE TABLE `data_diri` (
  `id_dd` int(5) NOT NULL,
  `nama_dd` varchar(50) NOT NULL,
  `nik_dd` varchar(30) NOT NULL,
  `kk_dd` varchar(30) NOT NULL,
  `tmpt_lahir_dd` varchar(50) NOT NULL,
  `tgl_lahir_dd` date NOT NULL,
  `jk_dd` int(1) NOT NULL,
  `agama_dd` varchar(30) NOT NULL,
  `tgl_dd` varchar(50) NOT NULL,
  `status_dd` int(5) NOT NULL DEFAULT 1,
  `id_petugas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_diri`
--

INSERT INTO `data_diri` (`id_dd`, `nama_dd`, `nik_dd`, `kk_dd`, `tmpt_lahir_dd`, `tgl_lahir_dd`, `jk_dd`, `agama_dd`, `tgl_dd`, `status_dd`, `id_petugas`) VALUES
(4, 'jackz', '1234567890123456', '1234567890123456', 'Bandung', '2019-10-11', 1, 'Islam', '2019-10-24', 1, 1),
(5, 'Jack', '123123', '123', 'Bandung', '2019-10-03', 1, 'Kristen Protestan', '2019-10-24', 0, 1),
(6, 'Fadli Zon', '863532', '47345352', 'Zimbawe', '2019-10-04', 1, 'Islam', '10:40:17pm 2019-10-28', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(5) NOT NULL,
  `app_instansi` varchar(50) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `url_instansi` text NOT NULL,
  `alamat_instansi` text NOT NULL,
  `email_instansi` varchar(50) NOT NULL,
  `telp_instansi` int(14) NOT NULL,
  `logo_instansi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `app_instansi`, `nama_instansi`, `url_instansi`, `alamat_instansi`, `email_instansi`, `telp_instansi`, `logo_instansi`) VALUES
(1, 'Desapps', 'Desa Bojongmanggu', 'http://localhost/desapps/', 'Manggu', 'manggu@gmail.com', 1, 'Desappsz29102019.07.24.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(5) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `email_petugas` varchar(50) NOT NULL,
  `username_petugas` varchar(50) NOT NULL,
  `password_petugas` varchar(120) NOT NULL,
  `gambar_petugas` text NOT NULL,
  `log_petugas` varchar(50) NOT NULL,
  `status_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `email_petugas`, `username_petugas`, `password_petugas`, `gambar_petugas`, `log_petugas`, `status_petugas`) VALUES
(1, 'Petugas', 'petugas@gmail.com', 'batims', '$2y$10$bs9ylEKT5sV1KR8ud.wrleR3q/mS5CzI9z0axJgHupxg4BTQEtcAq', 'Petugas25072021.jpg', '', 1),
(2, 'Petugass', 'batim@gmail.coms', 'batims', '$2y$10$0bgBgLEqkR.WzPw0wfCjJ.KODktU4oMzYGorvsxUEaU9zOzMxRY3e', 'default.pngs', '', 0),
(3, 'Petugass', 'ba@gmail.com', 'batims', '$2y$10$4LKNpkgZILHAvSka2jg.YuaLkc0Bnaz9XJBlLY69bwX1kQT1u/0lW', 'Petugass29102019.jpg', '', 0),
(5, 'Petugas', 'tes@gmail.com', 'tes', '$2y$10$HB4LjCYrV3ZlVE2IKbMqQujqaMyOJZsflra2sMHAn.knZRVqliChK', 'default.jpg', '', 1),
(6, 'Petugas', 'tim@gmail.com', 'tim', '$2y$10$Th/rt1BlHRaraJTinnj7Vec8CHqxh80iXBBez5oGXAQwJS2KlQ2tG', 'default.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `serba_guna`
--

CREATE TABLE `serba_guna` (
  `id_serbaguna` int(5) NOT NULL,
  `no_surat_serbaguna` int(5) NOT NULL,
  `tgl_surat_serbaguna` date NOT NULL,
  `id_dd` int(5) NOT NULL,
  `pendidikan_serbaguna` varchar(30) NOT NULL,
  `pekerjaan_serbaguna` varchar(30) NOT NULL,
  `perkawinan_serbaguna` varchar(30) NOT NULL,
  `alamat_serbaguna` text NOT NULL,
  `desa_serbaguna` varchar(50) NOT NULL,
  `kecamatan_serbaguna` varchar(50) NOT NULL,
  `tgl_serbaguna` varchar(50) NOT NULL,
  `status_serbaguna` int(2) NOT NULL,
  `id_petugas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serba_guna`
--

INSERT INTO `serba_guna` (`id_serbaguna`, `no_surat_serbaguna`, `tgl_surat_serbaguna`, `id_dd`, `pendidikan_serbaguna`, `pekerjaan_serbaguna`, `perkawinan_serbaguna`, `alamat_serbaguna`, `desa_serbaguna`, `kecamatan_serbaguna`, `tgl_serbaguna`, `status_serbaguna`, `id_petugas`) VALUES
(1, 13, '2019-10-04', 6, 'Tidak/Belum Sekolaha', 'Belum/Tidak Bekerja', 'Belum Kawin', 'KP. 1 RT. 1 RW. 1', 'Bojongmanggu', 'Pameungpeuk', '10:41:40pm 2019-10-28', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `skck`
--

CREATE TABLE `skck` (
  `id_skck` int(5) NOT NULL,
  `no_surat_skck` int(5) NOT NULL,
  `tgl_surat_skck` date NOT NULL,
  `id_dd` int(5) NOT NULL,
  `alamat_skck` text NOT NULL,
  `desa_skck` varchar(50) NOT NULL,
  `kecamatan_skck` varchar(50) NOT NULL,
  `tgl_skck` varchar(50) NOT NULL,
  `status_skck` int(2) NOT NULL,
  `id_petugas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skck`
--

INSERT INTO `skck` (`id_skck`, `no_surat_skck`, `tgl_surat_skck`, `id_dd`, `alamat_skck`, `desa_skck`, `kecamatan_skck`, `tgl_skck`, `status_skck`, `id_petugas`) VALUES
(1, 13555, '2019-10-03', 4, 'KP. 12 RT. 1 RW. 1', 'Bojongmanggu', 'Pameungpeuk', '11:06:54pm 2019-10-28', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sktm`
--

CREATE TABLE `sktm` (
  `id_sktm` int(5) NOT NULL,
  `no_surat_sktm` int(5) NOT NULL,
  `tgl_surat_sktm` date NOT NULL,
  `id_dd` int(5) NOT NULL,
  `pendidikan_sktm` varchar(30) NOT NULL,
  `pekerjaan_sktm` varchar(30) NOT NULL,
  `perkawinan_sktm` varchar(30) NOT NULL,
  `orangtua_sktm` varchar(50) NOT NULL,
  `alamat_sktm` text NOT NULL,
  `desa_sktm` varchar(50) NOT NULL,
  `kecamatan_sktm` varchar(50) NOT NULL,
  `tgl_sktm` varchar(50) NOT NULL,
  `status_sktm` int(2) NOT NULL,
  `id_petugas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sktm`
--

INSERT INTO `sktm` (`id_sktm`, `no_surat_sktm`, `tgl_surat_sktm`, `id_dd`, `pendidikan_sktm`, `pekerjaan_sktm`, `perkawinan_sktm`, `orangtua_sktm`, `alamat_sktm`, `desa_sktm`, `kecamatan_sktm`, `tgl_sktm`, `status_sktm`, `id_petugas`) VALUES
(1, 1, '2019-10-11', 4, 'Tidak/Belum Sekolah', 'Belum/Tidak Bekerja', 'Belum Kawin', 'aceng fikri', 'KP. a RT. 1 RW. 1', 'ea', 'ea', '11:42:02 pm 28/10/2019', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sku`
--

CREATE TABLE `sku` (
  `id_sku` int(5) NOT NULL,
  `no_surat_sku` int(5) NOT NULL,
  `tgl_surat_sku` date NOT NULL,
  `id_dd` int(5) NOT NULL,
  `alamat_sku` text NOT NULL,
  `desa_sku` varchar(50) NOT NULL,
  `kecamatan_sku` varchar(50) NOT NULL,
  `nama_perusahaan_sku` varchar(50) NOT NULL,
  `jenis_perusahaan_sku` varchar(50) NOT NULL,
  `alamat_perusahaan_sku` text NOT NULL,
  `keterangan_sku` text NOT NULL,
  `tgl_sku` varchar(50) NOT NULL,
  `status_sku` int(1) NOT NULL,
  `id_petugas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `data_diri`
--
ALTER TABLE `data_diri`
  ADD PRIMARY KEY (`id_dd`),
  ADD UNIQUE KEY `nik_dd` (`nik_dd`),
  ADD UNIQUE KEY `kk_dd` (`kk_dd`),
  ADD KEY `data_diri_ibfk_1` (`id_petugas`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `serba_guna`
--
ALTER TABLE `serba_guna`
  ADD PRIMARY KEY (`id_serbaguna`),
  ADD KEY `id_dd` (`id_dd`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `skck`
--
ALTER TABLE `skck`
  ADD PRIMARY KEY (`id_skck`),
  ADD KEY `id_dd` (`id_dd`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `sktm`
--
ALTER TABLE `sktm`
  ADD PRIMARY KEY (`id_sktm`),
  ADD KEY `id_dd` (`id_dd`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `sku`
--
ALTER TABLE `sku`
  ADD PRIMARY KEY (`id_sku`),
  ADD KEY `id_dd` (`id_dd`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id_aktivitas` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `data_diri`
--
ALTER TABLE `data_diri`
  MODIFY `id_dd` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `serba_guna`
--
ALTER TABLE `serba_guna`
  MODIFY `id_serbaguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skck`
--
ALTER TABLE `skck`
  MODIFY `id_skck` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sktm`
--
ALTER TABLE `sktm`
  MODIFY `id_sktm` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sku`
--
ALTER TABLE `sku`
  MODIFY `id_sku` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD CONSTRAINT `aktivitas_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

--
-- Constraints for table `data_diri`
--
ALTER TABLE `data_diri`
  ADD CONSTRAINT `data_diri_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `serba_guna`
--
ALTER TABLE `serba_guna`
  ADD CONSTRAINT `serba_guna_ibfk_1` FOREIGN KEY (`id_dd`) REFERENCES `data_diri` (`id_dd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `serba_guna_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skck`
--
ALTER TABLE `skck`
  ADD CONSTRAINT `skck_ibfk_1` FOREIGN KEY (`id_dd`) REFERENCES `data_diri` (`id_dd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skck_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sktm`
--
ALTER TABLE `sktm`
  ADD CONSTRAINT `sktm_ibfk_1` FOREIGN KEY (`id_dd`) REFERENCES `data_diri` (`id_dd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sktm_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sku`
--
ALTER TABLE `sku`
  ADD CONSTRAINT `sku_ibfk_1` FOREIGN KEY (`id_dd`) REFERENCES `data_diri` (`id_dd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sku_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
