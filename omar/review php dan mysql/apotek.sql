-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 07:20 PM
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
(2, 'Obat Pusing', 'zb1235', 'PT. Obat Hebat'),
(3, 'Obat Migrain', 'zb1235', 'PT. Obat Hebat'),
(4, 'Obat Flu', 'zb1236', 'PT. Obat Tua'),
(5, 'Obat Batuk', 'zb2235', 'PT. Obat Obat'),
(6, 'Obat Tidur', 'bb12332', 'PT. Obat Tua'),
(7, 'Obat Penenang', 'ag42332', 'PT. Obat Tua'),
(8, 'Obat Tetes', 'bb12232', 'PT. Obat Herbal'),
(9, 'Obat Panu', 'cb19992', 'PT. Obat Hebat'),
(10, 'Obat Pijet', 'ac42332', 'PT. Obat Herbal'),
(11, 'Obat Segar', 'aa98987', 'PT. Obat Hebat'),
(12, 'Obat Gigi', 'bb12332', 'PT. Obat Obat'),
(13, 'Obat Bahagia', 'bb12332', 'PT. Obat Hebat'),
(14, 'Obat Rambut', 'rb12332', 'PT. Obat Tua'),
(15, 'Obat Pereda', 'aa78786', 'PT. Obat Obat'),
(16, 'Obat Suplemen', 'bb12332', 'PT. Obat Obat');

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
(1, 1, 13000, '2021-12-01', 100, 4),
(2, 2, 15000, '2021-12-01', 120, 4),
(3, 3, 15000, '2021-12-01', 120, 4),
(4, 5, 11000, '2021-12-01', 90, 4),
(5, 4, 13000, '2021-12-01', 110, 1),
(7, 6, 19000, '2021-12-02', 114, 2),
(8, 1, 11000, '2021-12-02', 101, 2),
(9, 3, 11000, '2021-12-02', 131, 2),
(10, 6, 15000, '2021-12-03', 101, 4),
(11, 4, 12000, '2021-12-03', 98, 4),
(12, 11, 50000, '2021-12-03', 154, 4),
(13, 6, 16000, '2021-12-03', 122, 4),
(14, 10, 12000, '2021-12-03', 100, 4),
(15, 1, 13000, '2021-12-04', 101, 3),
(16, 2, 11000, '2021-12-04', 78, 3),
(17, 7, 13000, '2021-12-04', 120, 3),
(18, 11, 12000, '2021-12-04', 101, 1),
(19, 13, 120000, '2021-12-04', 181, 1),
(20, 8, 14000, '2021-12-04', 91, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
