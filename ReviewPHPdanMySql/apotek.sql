-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 10:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

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
-- Table structure for table `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `harga` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `id_pelanggan`, `id_obat`, `harga`) VALUES
(1, 1, 5, 'Rp2000'),
(2, 3, 1, 'Rp5000'),
(3, 2, 6, 'Rp12000'),
(4, 4, 2, 'Rp13000'),
(5, 5, 3, 'Rp6000'),
(6, 1, 2, 'Rp13000'),
(7, 4, 5, 'Rp2000');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `stok` varchar(12) NOT NULL,
  `expired` date NOT NULL,
  `id_petunjuk_pemakaian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama`, `stok`, `expired`, `id_petunjuk_pemakaian`) VALUES
(1, 'Panadol', '50', '2023-12-15', 1),
(2, 'Siladex flu dan batuk', '70', '2024-03-22', 2),
(3, 'Konimex sakit kepala', '40', '2022-05-13', 2),
(4, 'Oskadon', '50', '2022-07-07', 2),
(5, 'Komix', '100', '2022-05-13', 1),
(6, 'Mylanta sirup', '27', '2022-05-13', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `usia` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_pelanggan`, `alamat`, `usia`) VALUES
(1, 'Ahmad Shobari', 'Jl. Manggar No. 02, Surabaya', '18'),
(2, 'Nurhalimah', 'Jl. Merak No. 35, Surabaya', '20'),
(3, 'Alex Nurmustofa', 'Jl. Kenanga, No.56, Sidoarjo', '22'),
(4, 'Rini Setiawati', 'Jl. Pandjaitan, No. 27, Gresik', '24'),
(5, 'Rahmat Pahlevi', 'Jl. Ahmad Yani, No.24 Surabaya', '20');

-- --------------------------------------------------------

--
-- Table structure for table `petunjuk_pemakaian`
--

CREATE TABLE `petunjuk_pemakaian` (
  `id` int(11) NOT NULL,
  `anak-anak` varchar(100) DEFAULT NULL,
  `remaja` varchar(100) DEFAULT NULL,
  `dewasa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petunjuk_pemakaian`
--

INSERT INTO `petunjuk_pemakaian` (`id`, `anak-anak`, `remaja`, `dewasa`) VALUES
(1, '1x1 sehari', '2x1 sehari', '3x1 sehari'),
(2, '', '2x1 sendok makan sehari', '3x1 sendok makan sehari'),
(3, '2x2 sehari', '3x2 sehari', '3x2 sehari');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_obat` (`id_obat`),
  ADD KEY `fk_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_petunjuk_pemakaian` (`id_petunjuk_pemakaian`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petunjuk_pemakaian`
--
ALTER TABLE `petunjuk_pemakaian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `petunjuk_pemakaian`
--
ALTER TABLE `petunjuk_pemakaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_petunjuk_pemakaian` FOREIGN KEY (`id_petunjuk_pemakaian`) REFERENCES `petunjuk_pemakaian` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
