-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2022 pada 07.15
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dika_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`) VALUES
(1, 'admin', '$2y$10$5dl7N9VrqwwpkfzDogLdJuvI3ftTjcgxXojRRABSEXfEb/4i0EeHG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` char(36) NOT NULL,
  `fk_user` char(36) NOT NULL,
  `fk_produk` char(36) NOT NULL,
  `jml_keranjang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `fk_user`, `fk_produk`, `jml_keranjang`) VALUES
('1c8c8fdc-586a-11ed-bfda-d0509999a4d7', 'c19a8e60-5524-11ed-91e7-d0509999a4d7', 'f8ed6034-4eea-11ed-816f-d0509999a4d7', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peramalan`
--

CREATE TABLE `peramalan` (
  `id_peramalan` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `hasil_analisis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peramalan`
--

INSERT INTO `peramalan` (`id_peramalan`, `tanggal`, `periode`, `hasil_analisis`) VALUES
(1, '15 Oktober 2022', 'Oktober', 2000),
(2, '12 November 2022', 'November', 1500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` char(36) NOT NULL,
  `fk_produk_kategori` char(36) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL COMMENT 'Satuan Gram',
  `status_hapus_produk` tinyint(1) NOT NULL DEFAULT 0,
  `tgl_input_produk` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `fk_produk_kategori`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`, `berat_produk`, `status_hapus_produk`, `tgl_input_produk`) VALUES
('45bf5fdb-d2a0-4f13-bae0-dec88ff21703', '388e04de-4ee1-11ed-afe5-d0509999a4d7', 'Ransel CRVSD Black', 125000, 'RANSEL CRVSD BLACK.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 800, 0, '2022-10-18 20:44:51'),
('89eb645f-5872-11ed-bfda-d0509999a4d7', '388e04de-4ee1-11ed-afe5-d0509999a4d7', 'The Legacy', 100000, '3521784609bak kontrol.jpg', 'lorem ipsum', 0, 1000, 1, '2022-10-30 23:47:28'),
('f8e90bc7-4eea-11ed-816f-d0509999a4d7', '388e05ff-4ee1-11ed-afe5-d0509999a4d7', 'Hoodie Black 1976', 180000, 'Hoodie Black 1976.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 800, 0, '2022-10-18 20:44:51'),
('f8ed6034-4eea-11ed-816f-d0509999a4d7', '388e064f-4ee1-11ed-afe5-d0509999a4d7', 'Snaphook Keychain', 60000, 'SNAPHOOK KEYCHAIN.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 19, 800, 0, '2022-10-18 20:44:51'),
('f8ed606f-4eea-11ed-816f-d0509999a4d7', '388e064f-4ee1-11ed-afe5-d0509999a4d7', 'Syal 1976', 100000, 'Syal 1976.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 800, 0, '2022-10-18 20:44:51'),
('f8ed60a3-4eea-11ed-816f-d0509999a4d7', '388bc588-4ee1-11ed-afe5-d0509999a4d7', 'Tshirt Mirror Gold', 150000, 'Tshirt Mirror Gold.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 800, 0, '2022-10-18 20:44:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `id_produk_kategori` char(36) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `foto_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_kategori`
--

INSERT INTO `produk_kategori` (`id_produk_kategori`, `nama_kategori`, `foto_kategori`) VALUES
('388bc588-4ee1-11ed-afe5-d0509999a4d7', 'Kaos', 'kaos.jpg'),
('388e04de-4ee1-11ed-afe5-d0509999a4d7', 'Tas', 'tas.jpg'),
('388e05ff-4ee1-11ed-afe5-d0509999a4d7', 'Jaket', 'jaket.jpg'),
('388e064f-4ee1-11ed-afe5-d0509999a4d7', 'Aksesoris', 'aksesoris.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_stok`
--

CREATE TABLE `produk_stok` (
  `id_produk_stok` int(100) NOT NULL,
  `fk_produk` char(36) NOT NULL,
  `fk_transaksi` char(36) DEFAULT NULL,
  `stok_awal` int(11) NOT NULL,
  `barang_masuk` int(11) NOT NULL DEFAULT 0,
  `barang_keluar` int(11) NOT NULL DEFAULT 0,
  `stok_akhir` int(11) NOT NULL,
  `keterangan_mutasi` text NOT NULL,
  `tgl_mutasi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_stok`
--

INSERT INTO `produk_stok` (`id_produk_stok`, `fk_produk`, `fk_transaksi`, `stok_awal`, `barang_masuk`, `barang_keluar`, `stok_akhir`, `keterangan_mutasi`, `tgl_mutasi`) VALUES
(1, 'f8ed6034-4eea-11ed-816f-d0509999a4d7', '16c61e8a-554f-11ed-91e7-d0509999a4d7', 0, 20, 0, 20, 'Penjualan', '2022-10-26 23:45:22'),
(2, 'f8ed6034-4eea-11ed-816f-d0509999a4d7', 'b9459999-554f-11ed-91e7-d0509999a4d7', 20, 0, 2, 18, 'Penjualan', '2022-10-27 00:00:41'),
(11, 'f8ed6034-4eea-11ed-816f-d0509999a4d7', 'b9459999-554f-11ed-91e7-d0509999a4d7', 18, 2, 0, 20, 'Pembatalan Transaksi', '2022-10-30 22:17:20'),
(15, 'f8ed6034-4eea-11ed-816f-d0509999a4d7', 'ffa040cb-5869-11ed-bfda-d0509999a4d7', 20, 0, 1, 19, 'Penjualan', '2022-10-30 22:46:20'),
(18, 'f8e90bc7-4eea-11ed-816f-d0509999a4d7', NULL, 0, 1, 0, 1, 'Pengadaan', '2022-10-30 23:20:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_ramalan`
--

CREATE TABLE `tabel_ramalan` (
  `id_data` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `pelanggan` int(11) NOT NULL,
  `penjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_ramalan`
--

INSERT INTO `tabel_ramalan` (`id_data`, `periode`, `stok`, `pelanggan`, `penjualan`) VALUES
(1, 6, 20, 15, 10),
(2, 7, 25, 20, 15),
(20, 8, 15, 30, 15),
(21, 9, 30, 50, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` char(36) NOT NULL,
  `fk_user` char(36) NOT NULL,
  `tgl_transaksi` datetime NOT NULL DEFAULT current_timestamp(),
  `alamat_pengiriman` text NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `telepon_penerima` varchar(50) NOT NULL,
  `kurir_pengiriman` varchar(50) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status_transaksi` int(1) NOT NULL DEFAULT 1 COMMENT '1:MenungguPembayaran,  \r\n2:Dikirim, \r\n3:Dibatalkan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `fk_user`, `tgl_transaksi`, `alamat_pengiriman`, `nama_penerima`, `telepon_penerima`, `kurir_pengiriman`, `ongkir`, `total_harga`, `status_transaksi`) VALUES
('b9459999-554f-11ed-91e7-d0509999a4d7', 'c19a8e60-5524-11ed-91e7-d0509999a4d7', '2022-10-27 00:00:41', 'dasdsa', 'nikko', '9832469', 'JNE OKE (Rp 92,000)', 92000, 212000, 3),
('ffa040cb-5869-11ed-bfda-d0509999a4d7', 'c19a8e60-5524-11ed-91e7-d0509999a4d7', '2022-10-30 22:46:20', 'Jetis', 'Nikko Prayudha', '089516798049', 'JNE CTC (Rp 6,000)', 6000, 66000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` char(36) NOT NULL,
  `fk_transaksi` char(36) NOT NULL,
  `fk_produk` char(36) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `fk_transaksi`, `fk_produk`, `harga_beli`, `jumlah_beli`) VALUES
('b948437b-554f-11ed-91e7-d0509999a4d7', 'b9459999-554f-11ed-91e7-d0509999a4d7', 'f8ed6034-4eea-11ed-816f-d0509999a4d7', 60000, 2),
('ffa28ebd-5869-11ed-bfda-d0509999a4d7', 'ffa040cb-5869-11ed-bfda-d0509999a4d7', 'f8ed6034-4eea-11ed-816f-d0509999a4d7', 60000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` char(36) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `password_user`) VALUES
('c19a8e60-5524-11ed-91e7-d0509999a4d7', 'Nikko', 'nikko@gmail.com', '$2y$10$vwCQ/v5rKAjWn1Zt3xVQA.A92ahP6LlKc9I/5WYa4eRR/L7W0D6eq');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `peramalan`
--
ALTER TABLE `peramalan`
  ADD PRIMARY KEY (`id_peramalan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD PRIMARY KEY (`id_produk_kategori`);

--
-- Indeks untuk tabel `produk_stok`
--
ALTER TABLE `produk_stok`
  ADD PRIMARY KEY (`id_produk_stok`);

--
-- Indeks untuk tabel `tabel_ramalan`
--
ALTER TABLE `tabel_ramalan`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `peramalan`
--
ALTER TABLE `peramalan`
  MODIFY `id_peramalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produk_stok`
--
ALTER TABLE `produk_stok`
  MODIFY `id_produk_stok` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tabel_ramalan`
--
ALTER TABLE `tabel_ramalan`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
