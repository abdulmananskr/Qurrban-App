-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2023 pada 04.35
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtabungan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hewan_qurban`
--

CREATE TABLE `hewan_qurban` (
  `id_hewan` int(11) NOT NULL,
  `jenis` varchar(45) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` float NOT NULL,
  `umur` float NOT NULL,
  `stok` int(11) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hewan_qurban`
--

INSERT INTO `hewan_qurban` (`id_hewan`, `jenis`, `id_kategori`, `harga`, `berat`, `umur`, `stok`, `image`) VALUES
(5, 'kambing', 1, 3000000, 25, 2, 9, 'kambing.jpg'),
(6, 'kambing', 2, 4000000, 30, 2, 6, 'kambing.jpg'),
(12, 'kambing', 3, 5000000, 27, 2.3, 3, 'kambing.jpg'),
(13, 'sapi', 1, 20000000, 420, 3, 3, 'sapi.jpg'),
(22, 'sapi', 2, 30000000, 560, 3, 2, 'sapi.jpg'),
(28, 'sapi', 3, 40000000, 650, 3.5, 5, 'sapi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_hewan`
--

CREATE TABLE `kategori_hewan` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_hewan`
--

INSERT INTO `kategori_hewan` (`id`, `kategori`) VALUES
(1, 'biasa '),
(2, 'sedang'),
(3, 'super');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_hewan`
--

CREATE TABLE `pemesanan_hewan` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_hewan` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `alamat_pengiriman` varchar(128) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan_hewan`
--

INSERT INTO `pemesanan_hewan` (`id_pesanan`, `id_user`, `id_hewan`, `harga`, `jumlah`, `alamat_pengiriman`, `tgl_pesan`, `total_harga`) VALUES
(10, 9, 5, 3000000, 2, 'tegal', '2023-06-25', 6000000),
(11, 9, 5, 3000000, 2, 'tegal', '2023-06-25', 6000000),
(12, 9, 5, 3000000, 2, 'tegal', '2023-06-25', 6000000),
(13, 9, 5, 3000000, 2, 'tegal', '2023-06-26', 6000000),
(14, 9, 6, 4000000, 3, 'semarang', '2023-06-26', 12000000),
(15, 9, 13, 20000000, 1, 'semarang', '2023-06-26', 20000000),
(16, 13, 5, 3000000, 4, 'tegal', '2023-06-27', 12000000),
(17, 9, 5, 3000000, 3, 'semarang, Jawa tengah', '2023-06-28', 9000000),
(18, 9, 5, 3000000, 2, 'semarang, Jawa tengah', '2023-06-28', 6000000),
(19, 9, 5, 3000000, 1, 'semarang, Jawa tengah', '2023-07-04', 3000000),
(20, 9, 5, 3000000, 2, 'jakarta, indonesia', '2023-07-06', 6000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` int(1) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `deskripsi` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `nama`, `deskripsi`) VALUES
(1, 'administrator', NULL),
(2, 'user', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabungan`
--

CREATE TABLE `tabungan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabungan`
--

INSERT INTO `tabungan` (`id`, `id_user`, `saldo`) VALUES
(9, 9, 30000),
(12, 13, 20000),
(13, 14, 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_transaksi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `kredit_debet` enum('kredit','debet') NOT NULL,
  `nominal` int(11) DEFAULT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `nama_transaksi`, `tanggal`, `kredit_debet`, `nominal`, `saldo`) VALUES
(52, 14, 'Top Up', '2023-05-28', 'debet', 20000, 20000),
(53, 14, 'Top Up', '2023-05-28', 'debet', 20000, 40000),
(54, 9, 'Top Up', '2023-06-01', 'debet', 20000, 20000),
(55, 9, 'Top Up', '2023-06-22', 'debet', 20000, 40000),
(56, 9, 'Top Up', '2023-06-22', 'debet', 10000, 50000),
(57, 9, 'Tarik Tunai', '2023-06-22', 'kredit', 20000, 30000),
(58, 13, 'Top Up', '2023-06-27', 'debet', 20000, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) CHARACTER SET latin1 NOT NULL,
  `no_telepon` int(50) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `email` varchar(128) CHARACTER SET latin1 NOT NULL,
  `image` varchar(128) CHARACTER SET latin1 NOT NULL,
  `password` varchar(256) CHARACTER SET latin1 NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_telepon`, `alamat`, `email`, `image`, `password`, `role_id`, `is_active`, `tanggal_input`) VALUES
(8, 'Admin', 2147483567, 'tegal', 'admin@gmail.com', 'default.jpg', '$2y$10$u6xBC1bSC3uOWnrbGExJLuIsZ09m4vB.u24ZEQxfA6K0/lupSFHla', 1, 1, 0),
(9, 'user', 2147483647, 'user', 'user@gmail.com', 'default.jpg', '$2y$10$HwH8SjEwPpSC1/ArKQnREeeiWZF/YJGKkSQFE.eV5EC65gbULm9c.', 2, 1, 0),
(13, 'rendi', 2147483647, 'tegal jawa tengah', 'doni@gmail.com', 'default.jpg', '$2y$10$1Et57ZqCMhlrMqrXrjKZZ.SgxUUlF09A4Jd.NGlhwH/HMUHJSVz0q', 2, 1, 1670977069),
(14, 'gustian', 2147483647, 'brebes', 'gus@gmail.com', 'default.jpg', '$2y$10$WhLkDMvv0RU9cHKNxO9nquceqOV1TvPfxEAUn98dL3.Nvw7jHmEr2', 2, 1, 1680676266);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 1, 3),
(5, 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Adminiistrator'),
(2, 'User'),
(3, 'Transaksi'),
(4, 'Laporan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-solid fa-tachometer-alt'),
(2, 2, 'Home', 'user', 'fas fa-fw fa-home\n'),
(4, 2, 'Transaksi', 'transaksi', 'fas fa-fw fa-history'),
(5, 2, 'My Profile', 'user/profile', 'fas fa-fw fa-user'),
(6, 1, 'My Profile', 'user/profile', 'fas fa-fw fa-user'),
(8, 1, 'Hewan Qurban', 'hewan', 'fas fa-fw fa-hippo'),
(9, 1, 'Nasabah', 'user/anggota', 'fas fa-fw fa-users'),
(10, 1, 'Tabungan', 'tabungan', 'fas fa-fw fa-credit-card'),
(11, 3, 'Transaksi', 'transaksi', 'fas fa-fw fa-exchange-alt'),
(14, 4, 'Laporan Data Hewan', 'laporan/laporan_hewan', 'fas fa-fw fa-light fa-file'),
(15, 4, 'Lapoaran Data Nasabah', 'laporan/laporan_nasabah', 'fas fa-fw fa-address-book'),
(17, 4, 'Laporan Data Transaksi', 'laporan/laporan_transaksi', 'fa fa-fw fa-light fa-file\n'),
(18, 3, 'Pesanan', 'pesanhewan', 'fas fa-hippo'),
(19, 2, 'Pesanan', 'pesanhewan', 'fas fa-hippo');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hewan_qurban`
--
ALTER TABLE `hewan_qurban`
  ADD PRIMARY KEY (`id_hewan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori_hewan`
--
ALTER TABLE `kategori_hewan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemesanan_hewan`
--
ALTER TABLE `pemesanan_hewan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_hewan` (`id_hewan`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `id_role` (`role_id`);

--
-- Indeks untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hewan_qurban`
--
ALTER TABLE `hewan_qurban`
  MODIFY `id_hewan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_hewan`
--
ALTER TABLE `pemesanan_hewan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hewan_qurban`
--
ALTER TABLE `hewan_qurban`
  ADD CONSTRAINT `hewan_qurban_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_hewan` (`id`);

--
-- Ketidakleluasaan untuk tabel `pemesanan_hewan`
--
ALTER TABLE `pemesanan_hewan`
  ADD CONSTRAINT `pemesanan_hewan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pemesanan_hewan_ibfk_2` FOREIGN KEY (`id_hewan`) REFERENCES `hewan_qurban` (`id_hewan`);

--
-- Ketidakleluasaan untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  ADD CONSTRAINT `tabungan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
