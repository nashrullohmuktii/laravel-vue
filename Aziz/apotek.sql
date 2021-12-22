-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 08:36 PM
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
(1, 'Aziz', '0000-00-00', '85647555528', 'gigi'),
(3, 'Ani', '0000-00-00', '85647555528', 'jantung'),
(4, 'Nisa', '0000-00-00', '85647555528', 'kulit'),
(5, 'Dila', '0000-00-00', '85647555528', 'gigi'),
(6, 'Nila', '0000-00-00', '85647555528', 'jantung'),
(7, 'Ida', '0000-00-00', '85647555528', 'kulit'),
(8, 'Idaa', '0000-00-00', '85647555528', 'gigi'),
(9, 'anjar', '0000-00-00', '85647555528', 'jantung'),
(10, 'anjas', '0000-00-00', '85647555528', 'kulit'),
(11, 'lutfi', '0000-00-00', '85647555528', 'gigi');

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
(1, 'vitamin A', '0000-00-00', '0000-00-00', 'vitamin', 'Manfaat vitamin A adalah menunjang pertumbuhan dan perkembangan sel. Vitamin yang larut dalam lemak ini juga meningkatkan kesehatan kulit, rambut, kuku, gusi, kelenjar, tulang, gigi, mencegah rabun senja sampai kanker paru. Makanan yang banyak mengandung vitamin A di antaranya ikan salmon, kuning telur, dan produk susu.'),
(3, 'vitamin B1', '0000-00-00', '0000-00-00', 'vitamin', ''),
(4, 'vitamin B2', '0000-00-00', '0000-00-00', 'vitamin', ''),
(5, 'vitamin B3', '0000-00-00', '0000-00-00', 'vitamin', ''),
(6, 'vitamin B5', '0000-00-00', '0000-00-00', 'vitamin', ''),
(7, 'vitamin B6', '0000-00-00', '0000-00-00', 'vitamin', ''),
(8, 'vitamin B7', '0000-00-00', '0000-00-00', 'vitamin', ''),
(9, 'vitamin B9', '0000-00-00', '0000-00-00', 'vitamin', ''),
(10, 'vitamin B11', '0000-00-00', '0000-00-00', 'vitamin', ''),
(11, 'vitamin B12', '0000-00-00', '0000-00-00', 'vitamin', ''),
(12, 'vitamin D', '0000-00-00', '0000-00-00', 'vitamin', ''),
(13, 'vitamin E', '0000-00-00', '0000-00-00', 'vitamin', ''),
(14, 'vitamin K', '0000-00-00', '0000-00-00', 'vitamin', ''),
(15, 'vitamin C', '0000-00-00', '0000-00-00', 'vitamin', '');

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
  `id_dokter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_resep`
--

INSERT INTO `tb_resep` (`id_resep`, `nama`, `tanggal`, `jenis_resep`, `id_obat`, `id_dokter`) VALUES
(1, 'parasetamol', '2021-12-21', 'penurun panas', 3, 10),
(2, 'penurun panas', '2021-12-22', 'penurun panas', 1, 1);

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
-- Indexes for table `tb_resep`
--
ALTER TABLE `tb_resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_obat_2` (`id_obat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_resep`
--
ALTER TABLE `tb_resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_resep`
--
ALTER TABLE `tb_resep`
  ADD CONSTRAINT `tb_resep_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_resep_ibfk_3` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
