-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2021 pada 17.07
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `apoteker`
--

CREATE TABLE `apoteker` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `umur` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `apoteker`
--

INSERT INTO `apoteker` (`id`, `name`, `umur`, `alamat`) VALUES
(1, 'Dio Maulana', 26, 'Padang'),
(2, 'Jhon Doe', 22, 'Jakarta'),
(4, 'Ani', 20, 'Cilacap'),
(5, 'Budi', 18, 'kampung Duren'),
(6, 'Vina', 29, 'Cianjur'),
(7, 'Aristoteles', 23, 'Jakarta'),
(8, 'Brian', 27, 'Bandung'),
(9, 'Agus', 22, 'Cimahi'),
(10, 'Zian', 25, 'Siteba'),
(11, 'Rani', 25, 'Bogor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `expire_obat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `expire_obat`) VALUES
(1, 'Paracetamol', '2022-12-14 00:00:00'),
(2, 'Dumin', '2024-12-26 02:15:18'),
(3, 'Vitamin C', '2024-12-18 18:33:52'),
(4, 'Vitamin D', '2024-12-26 18:33:52'),
(5, 'Entrostop', '2023-12-25 18:33:52'),
(6, 'Paramex', '2022-12-27 18:33:52'),
(7, 'Bodrex', '2026-12-27 18:33:52'),
(8, 'Ampicillin', '2025-12-31 18:33:52'),
(9, 'Antropin', '2026-12-30 18:33:52'),
(10, 'estazolam', '2024-12-19 18:33:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date_order` datetime NOT NULL,
  `id_apoteker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `id_obat`, `price`, `date_order`, `id_apoteker`) VALUES
(1, 2, 20000, '2021-12-14 20:20:25', 1),
(2, 1, 12000, '2021-12-14 20:20:25', 2),
(3, 9, 50000, '2020-12-22 18:37:36', 11),
(5, 2, 40000, '2018-12-13 18:37:36', 2),
(6, 3, 30000, '2020-12-01 18:37:36', 1),
(7, 9, 31200, '2021-09-01 18:37:36', 7),
(8, 9, 30000, '2021-12-01 18:37:36', 6),
(9, 4, 60000, '2020-10-14 18:37:36', 10),
(10, 7, 32220, '2021-02-01 18:37:36', 11);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `apoteker`
--
ALTER TABLE `apoteker`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_obat` (`id_obat`),
  ADD KEY `fk_apoteker` (`id_apoteker`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `apoteker`
--
ALTER TABLE `apoteker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_apoteker` FOREIGN KEY (`id_apoteker`) REFERENCES `apoteker` (`id`),
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
