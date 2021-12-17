-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 06:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `jabatan` varchar(12) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `jabatan`, `no_telpon`, `alamat`) VALUES
(1, 'Adan', 'apoteker', '08123321', 'jalan. jend.sudrirman yogyakarta'),
(2, 'Buma', 'kasir', '08145678', 'jl. jalan-jalan, yogyakarta'),
(3, 'Cahi', 'kasir', '081567890', 'jl. jalan jalan'),
(4, 'Deltra', 'spv', '08123456987', 'jl. pemimimpin bangsa');

-- --------------------------------------------------------

--
-- Table structure for table `nama_produk`
--

CREATE TABLE `nama_produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(32) NOT NULL,
  `izin_bpom` varchar(15) NOT NULL,
  `perusahaan_farmasi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nama_produk`
--

INSERT INTO `nama_produk` (`id`, `nama_produk`, `izin_bpom`, `perusahaan_farmasi`) VALUES
(1, 'Obat Sakit Kepala', 'ab12345', 'PT. Obat Hebat'),
(2, 'Obat Migraib', 'zb1235', 'PT. Obat Hebat'),
(3, 'Obat Migrain', 'zb1235', 'PT. Obat Hebat'),
(4, 'Obat Flu', 'zb1236', 'PT. Obat Tua'),
(5, 'Obat Batuk', 'zb2235', 'PT. Obat Obat');

-- --------------------------------------------------------

--
-- Table structure for table `stok_masuk`
--

CREATE TABLE `stok_masuk` (
  `id` int(11) NOT NULL,
  `id_nama_produk` int(11) NOT NULL,
  `harga` int(10) NOT NULL,
  `tanggal_stok_masuk` date NOT NULL,
  `stok_masuk` int(11) NOT NULL,
  `id_penanggung_jawab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_masuk`
--

INSERT INTO `stok_masuk` (`id`, `id_nama_produk`, `harga`, `tanggal_stok_masuk`, `stok_masuk`, `id_penanggung_jawab`) VALUES
(2, 1, 13000, '2021-12-01', 100, 4),
(3, 3, 15000, '2021-12-01', 120, 4),
(4, 3, 15000, '2021-12-01', 120, 4),
(5, 5, 11000, '2021-12-01', 90, 4),
(6, 1, 13000, '2021-11-03', 110, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nama_produk`
--
ALTER TABLE `nama_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pp` (`id_penanggung_jawab`),
  ADD KEY `fk_produk` (`id_nama_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nama_produk`
--
ALTER TABLE `nama_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  ADD CONSTRAINT `fk_pp` FOREIGN KEY (`id_penanggung_jawab`) REFERENCES `karyawan` (`id`),
  ADD CONSTRAINT `fk_produk` FOREIGN KEY (`id_nama_produk`) REFERENCES `nama_produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
