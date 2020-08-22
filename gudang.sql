-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2020 pada 15.07
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` enum('Admin','Super Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `role`) VALUES
(9, 'admin1', '$2y$10$ygJjRrXWGEXKcFtsS5po8uEPqqjmS35dcU7mXvr5.bEcj1vQspWBO', 'Admin 1', 'Admin'),
(10, 'prioariefg', '$2y$10$SiZKNQ2PrAshZLiiHqctSOVC4I9uBykh5kMyNkIFYMvvVYidTtfqq', 'Prio Arief Gunawan', 'Super Admin'),
(18, 'prioarief', '$2y$10$V46GhqYB.OAGPSlG3tJELe3G9k/dMJ7ouOgUKPKWDPrUBjUdrp.6S', 'Prio Arief Gunawan', 'Super Admin'),
(19, 'admin', '$2y$10$uP9Zv4iUDVrjED6aOvZDSOggndgiRqEu1P0eyeek5bCbQx7ONTLEO', 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga_beli`, `harga_jual`, `stok`) VALUES
(1, 'Susu', 1000, 2500, 46),
(2, 'Kopi ABC', 1000, 2000, 805),
(3, 'Indomie', 2500, 3000, 0),
(4, 'Indomie Seblak Jeletot', 1500, 2500, 20),
(5, 'Susu Jahe', 1500, 2000, 20);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_keluar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_keluar` (
`nama_barang` varchar(100)
,`jumlah` int(11)
,`tanggal` datetime
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_masuk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_masuk` (
`nama_barang` varchar(100)
,`jumlah` int(11)
,`tanggal` datetime
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id` int(11) NOT NULL,
  `pembelian_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id`, `pembelian_id`, `barang_id`, `jumlah`) VALUES
(6, 3, 1, 100),
(7, 3, 2, 100),
(8, 3, 3, 100),
(9, 4, 1, 30),
(10, 4, 2, 20),
(11, 5, 1, 30),
(12, 5, 2, 20),
(13, 6, 1, 30),
(14, 6, 2, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `penjualan_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `penjualan_id`, `barang_id`, `jumlah`) VALUES
(32, 19, 1, 50),
(33, 19, 2, 100),
(34, 19, 3, 5),
(35, 20, 1, 1),
(36, 20, 2, 1),
(37, 20, 3, 1),
(38, 21, 1, 1),
(39, 21, 2, 4),
(40, 21, 3, 1),
(41, 22, 2, 90),
(42, 23, 1, 2),
(43, 23, 3, 3);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `laba`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `laba` (
`tanggal` datetime
,`laba` decimal(43,0)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `username`, `password`, `nama`, `telp`, `alamat`) VALUES
(4, 'prioarief', '$2y$10$TeYB1jsvOCKdrxKQ4Sx8sO2b.0icENhkP18uvqHvrtbKWauw.uwlW', 'Prio Arief Gunawan', '0895606060390', 'Tangerang'),
(5, 'jajal', '$2y$10$J9iVuL.wbWtfawU/EpYbkeIBDFZziHJp0PUO4Az3jM5fTi8xUHKpW', 'Jajal', '0895606060390', 'Tng');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `nama_supplier`, `total_harga`, `tanggal`) VALUES
(3, 'Agen Maju Jaya', 450000, '2020-05-31 00:00:29'),
(4, 'Agen Maju Kena Mundur Kena', 50000, '2020-05-31 11:24:59'),
(5, 'Sembako Murah', 50000, '2020-05-31 11:29:42'),
(6, 'Agen Sembako Murah', 50000, '2020-05-31 11:35:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `pelanggan_id`, `total_harga`, `tanggal`, `status`) VALUES
(19, 4, 340000, '2020-05-31 11:57:41', 1),
(20, 4, 7500, '2020-05-31 11:59:31', 1),
(21, 4, 13500, '2020-05-31 12:01:17', 1),
(22, 4, 180000, '2020-06-06 11:35:40', 1),
(23, 4, 14000, '2020-08-22 19:44:11', 1);

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_keluar`
--
DROP TABLE IF EXISTS `barang_keluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_keluar`  AS  select `b`.`nama_barang` AS `nama_barang`,`dp`.`jumlah` AS `jumlah`,`p`.`tanggal` AS `tanggal` from ((`detail_penjualan` `dp` join `penjualan` `p` on((`p`.`id` = `dp`.`penjualan_id`))) join `barang` `b` on((`b`.`id` = `dp`.`barang_id`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_masuk`
--
DROP TABLE IF EXISTS `barang_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_masuk`  AS  select `b`.`nama_barang` AS `nama_barang`,`dp`.`jumlah` AS `jumlah`,`p`.`tanggal` AS `tanggal` from ((`detail_pembelian` `dp` join `pembelian` `p` on((`p`.`id` = `dp`.`pembelian_id`))) join `barang` `b` on((`b`.`id` = `dp`.`barang_id`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `laba`
--
DROP TABLE IF EXISTS `laba`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laba`  AS  select `p`.`tanggal` AS `tanggal`,sum(((`b`.`harga_jual` - `b`.`harga_beli`) * `dp`.`jumlah`)) AS `laba` from ((`penjualan` `p` join `detail_penjualan` `dp` on((`p`.`id` = `dp`.`penjualan_id`))) join `barang` `b` on((`b`.`id` = `dp`.`barang_id`))) group by `p`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_id` (`pembelian_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `penjualan_id` (`penjualan_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `detail_pembelian_ibfk_1` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pembelian_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
