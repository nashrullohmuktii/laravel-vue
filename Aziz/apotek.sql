-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 12:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

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
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(64) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telfon` varchar(13) NOT NULL,
  `spesialis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `tanggal_lahir`, `no_telfon`, `spesialis`) VALUES
(1, 'Aziz', '1999-01-26', '851234567890', 'hati'),
(3, 'Ani', '1999-01-26', '851234567890', 'jantung'),
(4, 'Nisa', '1990-01-27', '851234567890', 'kulit'),
(5, 'Dila', '1988-01-28', '851234567890', 'gigi'),
(6, 'Nila', '1989-01-25', '851234567890', 'jantung'),
(7, 'Ida', '1999-01-26', '851234567890', 'kulit'),
(8, 'Idaa', '1990-01-27', '851234567890', 'gigi'),
(10, 'anjas', '1996-02-02', '851234567890', 'kulit'),
(11, 'lutfi', '1995-02-03', '851234567890', 'gigi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(64) NOT NULL,
  `tanggal_pembuat` date NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL,
  `jenis_obat` varchar(64) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `tanggal_pembuat`, `tanggal_kadaluarsa`, `jenis_obat`, `keterangan`) VALUES
(1, 'vitamin A', '2021-01-01', '2021-12-12', 'vitamin', 'Manfaat vitamin A adalah menunjang pertumbuhan dan perkembangan sel. Vitamin yang larut dalam lemak ini juga meningkatkan kesehatan kulit, rambut, kuku, gusi, kelenjar, tulang, gigi, mencegah rabun senja sampai kanker paru. Makanan yang banyak mengandung vitamin A di antaranya ikan salmon, kuning telur, dan produk susu.'),
(3, 'vitamin B1', '2021-01-02', '2021-12-13', 'vitamin', ''),
(4, 'vitamin B2', '2021-01-03', '2021-12-14', 'vitamin', ''),
(5, 'vitamin B3', '2021-01-01', '2021-12-12', 'vitamin', ''),
(6, 'vitamin B5', '2021-01-02', '2021-12-13', 'vitamin', ''),
(7, 'vitamin B6', '2021-01-03', '2021-12-14', 'vitamin', ''),
(8, 'vitamin B7', '2021-01-01', '2021-12-12', 'vitamin', ''),
(9, 'vitamin B9', '2021-01-02', '2021-12-13', 'vitamin', ''),
(10, 'vitamin B11', '2021-01-03', '2021-12-14', 'vitamin', ''),
(11, 'vitamin B12', '2021-01-01', '2021-12-12', 'vitamin', ''),
(12, 'vitamin D', '2021-01-02', '2021-12-13', 'vitamin', ''),
(13, 'vitamin E', '2021-01-03', '2021-12-14', 'vitamin', ''),
(14, 'vitamin K', '2021-01-01', '2021-12-12', 'vitamin', ''),
(15, 'vitamin C', '2021-01-02', '2021-12-13', 'vitamin', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(64) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telfon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nama_pasien`, `tanggal_lahir`, `alamat`, `no_telfon`) VALUES
(1, 'Lukman', '2021-12-01', 'Kota Depok', '085647555528'),
(3, 'aryo', '2021-09-07', 'kota jakarta', '85647555528'),
(11, 'aryo', '2000-01-02', 'kota jakarta', '85647555528'),
(12, 'johan', '2001-01-03', 'kota bekasi', '85647555528'),
(13, 'ari', '1999-01-01', 'kota bogor', '85647555528'),
(14, 'reza', '2000-01-02', 'kota depok', '85647555528'),
(15, 'hilda', '2001-01-03', 'kota jakarta', '85647555528'),
(16, 'harry', '1999-01-01', 'kota bekasi', '85647555528'),
(17, 'jeny', '2000-01-02', 'kota bogor', '85647555528');

-- --------------------------------------------------------

--
-- Table structure for table `tb_resep`
--

CREATE TABLE `tb_resep` (
  `id_resep` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_resep` text NOT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `id_pasien` int(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_resep`
--

INSERT INTO `tb_resep` (`id_resep`, `nama`, `tanggal`, `jenis_resep`, `id_obat`, `id_dokter`, `id_pasien`) VALUES
(3, 'penurun panas', '2021-12-21', 'vitamin C', 15, 11, 15),
(6, 'penambah napsu makan', '2021-12-22', 'Vitamin D', 12, 5, 3),
(7, 'antibody', '2021-12-23', 'Vitamin C', 15, 10, 13),
(8, 'kebugaran', '2021-12-21', 'vitamin B1', 3, 8, 11),
(9, 'untuk mata', '2021-12-22', 'vitamin A', 1, 11, 15),
(10, 'penurun panas', '2021-12-23', 'Vitamin C', 15, 4, 1),
(11, 'untuk mata', '2021-12-22', 'vitamin A', 1, 11, 17),
(12, 'antibody', '2021-12-23', 'Vitamin C', 15, 10, 14),
(13, 'kebugaran', '2021-12-21', 'vitamin B1', 3, 8, 12),
(14, 'penurun panas', '2021-12-21', 'vitamin C', 15, 11, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_resep`
--
ALTER TABLE `tb_resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_obat_2` (`id_obat`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_pasien_2` (`id_pasien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_resep`
--
ALTER TABLE `tb_resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_resep`
--
ALTER TABLE `tb_resep`
  ADD CONSTRAINT `tb_resep_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_resep_ibfk_3` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_resep_ibfk_4` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
