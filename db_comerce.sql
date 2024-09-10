-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Sep 2024 pada 14.52
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_comerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga` varchar(225) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `id_kategori`, `gambar`, `nama_barang`, `harga`, `merk`, `stok`) VALUES
(9, 1, '../assets/images/610.jpg', 'GT 610', '600000', 'NVDIA', 30),
(10, 1, '../assets/images/3060.jpg', 'RTX 3060', '4000000', 'NVDIA', 7),
(11, 1, '../assets/images/4060.jpg', 'RTX 4090', '30000000', 'NVDIA', 3),
(12, 1, '../assets/images/3050.jpg', 'RTX 3050', '2500000', 'NVDIA', 11),
(13, 2, '../assets/images/i5 12400f.jpg', 'Core I5 12400f', '1800000', 'Intel', 12),
(14, 2, '../assets/images/i7 2600.jpg', 'Core I7 2600', '650000', 'Intel', 20),
(15, 2, '../assets/images/r5 4600g.jpg', 'Ryzen 5 4600G', '1500000', 'AMD', 25),
(16, 2, '../assets/images/r9 7900.jpg', 'Ryzen 9 7900', '6000000', 'AMD', 7),
(17, 4, '../assets/images/ram kingston.jpg', '4GB RAM DDR 4 2666Mhz', '200000', 'Kingston', 40),
(18, 4, '../assets/images/kaizen.jpeg', '4GB RAM DDR 4 2666Mhz', '240000', 'Kaizen', 10),
(19, 4, '../assets/images/imperion.jpeg', '8GB RAM DDR 4 3200Mhz', '300000', 'Imperion', 15),
(20, 4, '../assets/images/kyo.jpeg', '16GB RAM DDR 4 3200Mhz', '600000', 'KYO', 0),
(21, 6, '../assets/images/rx7 128.jpeg', '128GB SSD NVME', '230000', 'RX7', 17),
(22, 6, '../assets/images/adata legend.png', '258GB SSD NVME', '300000', 'ADATA LEGEND', 10),
(23, 6, '../assets/images/vgen 1tb.png', '1TB SSD NVME', '1200000', 'V-GeN', 3),
(24, 5, '../assets/images/asrock h410.jpeg', 'Motherboard H410M', '800000', 'ASROCK', 20),
(25, 5, '../assets/images/msi b450m pro.jpeg', 'Motherboard B450M PRO', '1000000', 'MSI', 10),
(26, 1, '../assets/images/rx 580.jpeg', 'RX 580', '1200000', 'AISURIX', 15),
(27, 1, '../assets/images/rx 7900xtx.jpeg', 'RX 7900 XTX', '20000000', 'ASROCK', 5),
(28, 2, '../assets/images/i 7 12700f.jpeg', 'Core I7 12700F', '4000000', 'Intel', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `namakategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `namakategori`) VALUES
(1, 'VGA'),
(2, 'CPU'),
(4, 'RAM'),
(5, 'Motherboard'),
(6, 'SSD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` varchar(225) NOT NULL,
  `statusbeli` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_pembelian`, `id_user`, `id_barang`, `tgl_beli`, `jumlah`, `total`, `statusbeli`) VALUES
(8, 2, 22, '2024-09-09', 7, '2100000', 'disetujui'),
(9, 6, 11, '2024-09-09', 3, '90000000', 'ditolak'),
(10, 6, 9, '2024-09-09', 5, '3000000', 'konfirmasi'),
(11, 5, 20, '2024-09-09', 5, '3000000', 'disetujui'),
(12, 5, 26, '2024-09-09', 5, '6000000', 'konfirmasi'),
(13, 4, 12, '2024-09-09', 4, '10000000', 'dibeli'),
(14, 4, 14, '2024-09-09', 10, '6500000', 'dibeli');

--
-- Trigger `tbl_pembelian`
--
DELIMITER $$
CREATE TRIGGER `beli` AFTER UPDATE ON `tbl_pembelian` FOR EACH ROW BEGIN
IF new.statusbeli = 'disetujui' AND old.statusbeli != new.statusbeli THEN UPDATE tbl_barang SET stok = stok - new.jumlah WHERE id_barang = new.id_barang;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `email` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `level`, `email`, `alamat`) VALUES
(1, 'Kwanzaa', 'arsalfrlh', '202cb962ac59075b964b07152d234b70', 'admin', 'arsal@gmail.com', 'Isekai'),
(2, 'User Toko', 'user', '202cb962ac59075b964b07152d234b70', 'user', 'arsal@gmail.com', 'isekai'),
(3, 'Admin Toko', 'admin', '202cb962ac59075b964b07152d234b70', 'admin', 'arsal@gmail.com', 'Isekai'),
(4, 'Pembeli', 'pembeli', '202cb962ac59075b964b07152d234b70', 'user', 'arsal@gmail.com', 'Isekai'),
(5, 'Penggemar Komputer', 'pengguna', '202cb962ac59075b964b07152d234b70', 'user', 'arsal@gmail.com', 'Isekai'),
(6, 'Si Benclung', 'benclung', '202cb962ac59075b964b07152d234b70', 'user', 'arsal@gmail.com', 'Isekai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `tbl_pembelian_ibfk_1` (`id_user`),
  ADD KEY `tbl_pembelian_ibfk_2` (`id_barang`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD CONSTRAINT `tbl_pembelian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembelian_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
