-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2025 pada 17.56
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan-ci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `kode_buku` int(2) NOT NULL,
  `ISBN` int(10) NOT NULL,
  `gambar_buku` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `stok_buku` int(2) NOT NULL,
  `kode_kategori` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`kode_buku`, `ISBN`, `gambar_buku`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `stok_buku`, `kode_kategori`) VALUES
(1, 23146879, '1720237779_672146b2ebc2adfd27d5.jpg', 'Dasar Pemrograman Dalam Bahasa C', 'Bernandus Anggo', 'Deepublish', '2024-02-20', 8, 1),
(2, 23146871, '1720237811_ed0823301ed500412aa1.jpg', 'Pengantar Hukum Pidana', 'H. Suryanto, S.H., M.H., MKn.', 'Deepublish', '2023-06-06', 1, 2),
(3, 23146873, '1720265037_cb48c09f7fa1628108a1.jpg', 'Pengantar Hukum Perburuan', 'Nindy Sulistya Widiastiani', 'BukuKita', '2023-06-06', 5, 2),
(4, 23146279, '1720312572_caa4b835957ce220fffa.jpeg', 'Hukum Lingkungan', 'Aditya Saprillah, S.H., M.H', 'Deepublish', '2022-01-04', 3, 2),
(5, 23146271, '1720315439_e8c870160094d283cf7e.jpg', 'Hukum Keluarga Islam Indonesia', 'Ansari, S.Sy., M.H', 'Hukumbook', '2021-12-22', 2, 2),
(6, 23946871, '1720315601_97dc81bddb6336c36e09.jpg', 'Dasar-Dasar Teknik Informatika', 'Novega Pratama Adiputra', 'Informatikas', '2023-09-20', 2, 1),
(7, 23172879, '1720316745_80da06120fac751995e3.jpg', 'Pemrograman Database MySQL dengan PHP7', 'Bertha Sidik', 'Informatika', '2023-08-16', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kode_kategori` int(2) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kode_kategori`, `nama_kategori`) VALUES
(1, 'Sistem dan Teknologi Informasi'),
(2, 'Hukum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `kode_peminjaman` int(2) NOT NULL,
  `id_user` int(2) NOT NULL,
  `kode_buku` int(2) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_dikembalikan` date NOT NULL,
  `status_peminjaman` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`kode_peminjaman`, `id_user`, `kode_buku`, `tanggal_peminjaman`, `tanggal_dikembalikan`, `status_peminjaman`) VALUES
(1, 2, 3, '2024-07-07', '2024-07-14', 'Dikembalikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_role`
--

CREATE TABLE `tbl_role` (
  `kode_role` int(2) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_role`
--

INSERT INTO `tbl_role` (`kode_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(2) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `NPM` varchar(12) NOT NULL,
  `alamat_user` varchar(50) NOT NULL,
  `no_hp_user` int(15) NOT NULL,
  `email_user` varchar(15) NOT NULL,
  `password_user` varchar(25) NOT NULL,
  `kode_role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `NPM`, `alamat_user`, `no_hp_user`, `email_user`, `password_user`, `kode_role`) VALUES
(1, 'Admin', '0', 'Bernah', 2147483647, 'admin@gmail.com', 'admin', 1),
(2, 'Rama Apriando', '2259201023', 'Sindang Sari', 2147483647, 'rama@gmail.com', 'umko', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`kode_buku`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`kode_peminjaman`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_buku` (`kode_buku`);

--
-- Indeks untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`kode_role`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `kode_role` (`kode_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `kode_buku` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kode_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `kode_peminjaman` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `kode_role` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD CONSTRAINT `kategori` FOREIGN KEY (`kode_kategori`) REFERENCES `tbl_kategori` (`kode_kategori`);

--
-- Ketidakleluasaan untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD CONSTRAINT `buku3` FOREIGN KEY (`kode_buku`) REFERENCES `tbl_buku` (`kode_buku`),
  ADD CONSTRAINT `user1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `role` FOREIGN KEY (`kode_role`) REFERENCES `tbl_role` (`kode_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
