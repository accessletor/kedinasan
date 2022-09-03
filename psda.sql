-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Agu 2022 pada 10.17
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar`
--

CREATE TABLE `keluar` (
  `id` int(11) NOT NULL,
  `arsip` varchar(200) NOT NULL,
  `tgl` varchar(200) NOT NULL,
  `nosurat` varchar(200) NOT NULL,
  `dari` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluar`
--

INSERT INTO `keluar` (`id`, `arsip`, `tgl`, `nosurat`, `dari`) VALUES
(3, '08094', '2022-08-09', '0849090', 'asepsan'),
(4, '233', '2022-08-23', 'NAMA090984', 'cirebon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratm`
--

CREATE TABLE `suratm` (
  `id` int(11) NOT NULL,
  `arsip` varchar(50) NOT NULL,
  `nodisposisi` varchar(200) NOT NULL,
  `tgl` varchar(70) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `sifat` varchar(200) NOT NULL,
  `nosurat` varchar(200) NOT NULL,
  `tglsurat` varchar(100) NOT NULL,
  `dari` varchar(200) NOT NULL,
  `hal` varchar(200) NOT NULL,
  `kasie` varchar(200) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `surat` varchar(200) NOT NULL,
  `disposisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suratm`
--

INSERT INTO `suratm` (`id`, `arsip`, `nodisposisi`, `tgl`, `jenis`, `sifat`, `nosurat`, `tglsurat`, `dari`, `hal`, `kasie`, `ket`, `surat`, `disposisi`) VALUES
(1, '123', '200', '2022-08-28', 'penting', 'segera', 'ND/2004989/KN', '2022-08-13', 'dinas sda', 'Kambing', '-', '-', '630aefbe9038e.pdf', '630af055c29a7.pdf'),
(2, '234', '-', '2022-08-27', 'penting', 'segera', 'ND/2004989/KNN', '', 'dukupuntang', 'Kambing', '-', '-', '630af49148715.pdf', '630af4914a26e.'),
(3, '1232', '200', '2022-08-28', 'penting', 'segera', 'ND/2004989/KNN', '2022-08-14', 'dukupuntang', 'Kambing', '-', '-', '630af4f1ed391.', '630af4f1ed779.pdf'),
(4, '122', '-', '2022-08-28', 'penting', 'segera', 'ND/2004989/89', '2022-09-02', 'dinas sda', 'Kambing', '-', '-', '630b1fe0bd5b6.', '630b1fe0bd99e.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `undangan`
--

CREATE TABLE `undangan` (
  `id` int(11) NOT NULL,
  `arsip` varchar(200) NOT NULL,
  `tgl` varchar(200) NOT NULL,
  `hari` varchar(300) NOT NULL,
  `no` varchar(200) NOT NULL,
  `dari` varchar(200) NOT NULL,
  `jadwal` varchar(200) NOT NULL,
  `tempat` varchar(300) NOT NULL,
  `perihal` varchar(300) NOT NULL,
  `surat` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `undangan`
--

INSERT INTO `undangan` (`id`, `arsip`, `tgl`, `hari`, `no`, `dari`, `jadwal`, `tempat`, `perihal`, `surat`) VALUES
(6, '209', '2022-08-16', 'senin', '0868628989', 'asepsan', '08:00', 'lapangan', 'menangis wkwk', '63004ca9c28f1.pdf'),
(7, '834', '2022-08-01', 'nedk', 'sdsdf', 'asep saefuddin', 'dsknkl', 'dslnfsl', 'dskln', '63004cd4c0426.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'asep', '$2y$10$hLcjNQv5KtOUltJq1Rbq8uxcK7GTbFWujZGQcRUsA0lKKyJSbIf6u'),
(2, 'umum', '$2y$10$/1H3Natf2IcMIYqk1704Yee9CaCfzHG8mcA0qCWhAMZFhcYxUpaby');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suratm`
--
ALTER TABLE `suratm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `undangan`
--
ALTER TABLE `undangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `suratm`
--
ALTER TABLE `suratm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `undangan`
--
ALTER TABLE `undangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
