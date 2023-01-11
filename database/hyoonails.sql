-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2023 pada 02.38
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hyoonails`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_produk`
--

CREATE TABLE `master_produk` (
  `kode_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kode_warna` varchar(10) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `harga_satuan` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `insert_date` datetime NOT NULL,
  `insert_by` varchar(10) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_by` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_produk`
--

INSERT INTO `master_produk` (`kode_produk`, `nama_produk`, `kode_warna`, `ukuran`, `harga_satuan`, `quantity`, `insert_date`, `insert_by`, `update_date`, `update_by`) VALUES
('PRD0000001', 'Barang Apa ya', 'G1001', 25, 1000, 68, '2022-12-03 06:57:00', 'IT', '2023-01-01 09:29:19', 'arta'),
('PRD0000002', 'ASDASDASD', 'G1001', 12, 3000, 75, '2022-12-03 08:01:17', 'IT', '2023-01-01 09:28:55', 'arta'),
('PRD0000003', 'kondom cap kaki lima', 'G1001', 300, 4000, 92, '2022-12-03 08:14:56', 'IT', '2023-01-01 09:10:32', 'arta'),
('PRD0000004', 'Barang Langka', 'G1003', 21, 9000, 984, '2022-12-31 19:05:32', 'admin', '2023-01-01 09:29:34', 'arta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_user`
--

CREATE TABLE `master_user` (
  `username` varchar(10) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `nama_lengkap` text DEFAULT NULL,
  `role` int(11) DEFAULT NULL COMMENT '1 = Admin, 2 = Kasir',
  `insert_date` datetime DEFAULT NULL,
  `insert_by` varchar(10) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_user`
--

INSERT INTO `master_user` (`username`, `password`, `nama_lengkap`, `role`, `insert_date`, `insert_by`, `update_date`, `update_by`) VALUES
('admin', 'admin', 'Admin', 1, '2022-12-31 18:18:30', 'IT', NULL, NULL),
('arta', 'arta', 'Arta', 2, '2022-12-31 18:24:32', 'IT', NULL, NULL),
('daus', 'daus12345', 'Muhammad Firdaus', 3, '2022-12-31 18:25:30', 'IT', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_warna`
--

CREATE TABLE `master_warna` (
  `kode_warna` varchar(10) NOT NULL,
  `nama_warna` varchar(100) NOT NULL,
  `insert_by` varchar(10) DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_warna`
--

INSERT INTO `master_warna` (`kode_warna`, `nama_warna`, `insert_by`, `insert_date`, `update_by`, `update_date`) VALUES
('G1001', 'Hitam Manis', NULL, NULL, 'IT', '2022-12-03 12:51:04'),
('G1002', 'Merah', NULL, NULL, NULL, NULL),
('G1003', 'Merah Ati', 'IT', '2022-12-03 12:55:29', NULL, NULL),
('G1004', 'Merah Jambu', 'IT', '2022-12-03 12:55:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_trans_detail`
--

CREATE TABLE `order_trans_detail` (
  `id` int(11) NOT NULL,
  `order_no` varchar(10) NOT NULL,
  `kode_produk` varchar(10) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `insert_by` varchar(10) NOT NULL,
  `insert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_trans_detail`
--

INSERT INTO `order_trans_detail` (`id`, `order_no`, `kode_produk`, `jumlah_beli`, `total_price`, `insert_by`, `insert_date`) VALUES
(91, 'TRS0000001', 'PRD0000001', 3, 3000, 'arta', '2023-01-01 09:26:48'),
(92, 'TRS0000001', 'PRD0000002', 4, 12000, 'arta', '2023-01-01 09:26:48'),
(93, 'TRS0000002', 'PRD0000002', 3, 9000, 'arta', '2023-01-01 09:27:34'),
(94, 'TRS0000002', 'PRD0000004', 2, 18000, 'arta', '2023-01-01 09:27:34'),
(95, 'TRS0000003', 'PRD0000001', 1, 1000, 'arta', '2023-01-01 09:28:55'),
(96, 'TRS0000003', 'PRD0000002', 2, 6000, 'arta', '2023-01-01 09:28:55'),
(97, 'TRS0000004', 'PRD0000001', 5, 5000, 'arta', '2023-01-01 09:29:19'),
(98, 'TRS0000005', 'PRD0000004', 10, 90000, 'arta', '2023-01-01 09:29:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_trans_header`
--

CREATE TABLE `order_trans_header` (
  `id` int(11) NOT NULL,
  `order_no` varchar(10) NOT NULL,
  `order_date` datetime NOT NULL,
  `total_price` int(11) NOT NULL,
  `uang_bayar` double NOT NULL,
  `insert_by` varchar(10) NOT NULL,
  `insert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_trans_header`
--

INSERT INTO `order_trans_header` (`id`, `order_no`, `order_date`, `total_price`, `uang_bayar`, `insert_by`, `insert_date`) VALUES
(61, 'TRS0000001', '2023-01-01 09:26:48', 15000, 15000, 'arta', '2023-01-01 09:26:48'),
(62, 'TRS0000002', '2023-01-01 09:27:34', 27000, 30000, 'arta', '2023-01-01 09:27:34'),
(63, 'TRS0000003', '2022-12-31 09:28:55', 7000, 7000, 'arta', '2023-01-01 09:28:55'),
(64, 'TRS0000004', '2022-12-31 09:29:19', 5000, 5000, 'arta', '2023-01-01 09:29:19'),
(65, 'TRS0000005', '2022-12-31 09:29:34', 90000, 100000, 'arta', '2023-01-01 09:29:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_produk`
--
ALTER TABLE `master_produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indeks untuk tabel `master_warna`
--
ALTER TABLE `master_warna`
  ADD PRIMARY KEY (`kode_warna`);

--
-- Indeks untuk tabel `order_trans_detail`
--
ALTER TABLE `order_trans_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_trans_header`
--
ALTER TABLE `order_trans_header`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_no` (`order_no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `order_trans_detail`
--
ALTER TABLE `order_trans_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT untuk tabel `order_trans_header`
--
ALTER TABLE `order_trans_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
