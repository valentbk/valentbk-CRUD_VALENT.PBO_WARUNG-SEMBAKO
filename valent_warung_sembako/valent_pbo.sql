-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2024 pada 03.53
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `valent.pbo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_valentstock`
--

CREATE TABLE `tbl_valentstock` (
  `id_barang` int(12) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `stok` int(12) DEFAULT NULL,
  `harga_beli` int(12) DEFAULT NULL,
  `harga_jual` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_valentstock`
--

INSERT INTO `tbl_valentstock` (`id_barang`, `nama_barang`, `stok`, `harga_beli`, `harga_jual`) VALUES
(9384752, 'Minyak', 10, 6000, 7000),
(9384753, 'Gula', 10, 4000, 5000),
(9384754, 'Garam ', 10, 3000, 4000),
(9384755, 'Beras', 10, 6000, 7000),
(9384756, 'Telur ayam', 10, 1000, 2000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_valentstock`
--
ALTER TABLE `tbl_valentstock`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_valentstock`
--
ALTER TABLE `tbl_valentstock`
  MODIFY `id_barang` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9384757;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
