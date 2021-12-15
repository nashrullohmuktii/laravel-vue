-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2021 pada 05.05
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek_fahri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `harga_obat` int(12) NOT NULL,
  `stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `harga_obat`, `stok`) VALUES
(1, 'Aspirin', 3000, 300),
(2, 'Ibuprofen', 3500, 250),
(3, 'Acetaminophen', 7000, 700),
(4, 'Indomethacin', 6000, 500),
(5, 'Sumatriptan', 6500, 230),
(6, 'Ketorolac', 4500, 670),
(7, 'Zolmitriptan', 8888, 666),
(8, 'Naproxen', 2500, 50),
(9, 'Benzocaine', 6000, 300),
(10, 'Eritromisin', 3500, 250);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(35) NOT NULL,
  `umur` int(2) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `umur`, `alamat`, `jenis_kelamin`) VALUES
(1, 'Fahri Gunawan', 23, 'Jl. Pertahanan Komp. Griya Pertahanan 3', 'pria'),
(2, 'Gunawan Fahri', 23, 'Jl. Pertahanan Komp. Griya Pertahanan 3 Plaju', 'pria'),
(3, 'Tio Dinata', 20, 'Palembang', 'pria'),
(4, 'Zahra Tiara', 22, 'Palembang', 'wanita'),
(5, 'Juminah', 53, 'Palembang', 'wanita'),
(6, 'Supriadi', 43, 'Plaju Palembang', 'pria'),
(7, 'Rahman', 30, 'Sumatera Selatan', 'pria'),
(8, 'Bahtiar', 45, 'Sumatera Utara', 'pria'),
(9, 'Rosdiana', 50, 'Sumsel Palembang', 'wanita'),
(10, 'Fah Gun', 23, 'Palembang', 'pria');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total_transaksi` int(10) NOT NULL,
  `total_bayar` int(10) NOT NULL,
  `total_kembalian` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pelanggan`, `tgl_transaksi`, `total_transaksi`, `total_bayar`, `total_kembalian`) VALUES
(1, 4, '2021-12-09', 15000, 20000, 5000),
(2, 1, '2021-12-14', 45000, 100000, 55000),
(3, 3, '2021-12-03', 30000, 50000, 20000),
(4, 5, '2021-12-15', 200000, 200000, 0),
(5, 6, '2021-12-10', 50000, 100000, 50000),
(6, 9, '2021-12-01', 70000, 100000, 30000),
(7, 8, '2021-12-02', 60000, 100000, 40000),
(8, 2, '2021-12-08', 20000, 50000, 30000),
(9, 1, '2021-12-15', 10000, 20000, 10000),
(10, 10, '2021-12-15', 35000, 50000, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_transaksi_detail`, `id_penjualan`, `id_obat`, `jumlah_obat`) VALUES
(1, 5, 7, 22),
(2, 2, 6, 6),
(3, 6, 5, 5),
(4, 3, 8, 7),
(5, 2, 5, 9),
(6, 4, 4, 4),
(7, 5, 2, 5),
(8, 1, 7, 5),
(9, 3, 8, 2),
(10, 10, 10, 66);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `fk_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`),
  ADD KEY `fk_transaksi` (`id_penjualan`),
  ADD KEY `fk_obat` (`id_obat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `fk_transaksi` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
