-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Mar 2021 pada 23.09
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, 'XII RPL 1', 'Rekayasa Perangkat Lunak'),
(2, 'XII AK 1', 'Akutansi'),
(3, 'XII MEX 1', 'Multimedia'),
(4, 'X RPL 1', 'Rekayasa Perangkat Lunak'),
(5, 'XI MEX 1', 'Multimedia'),
(7, 'XII MR 2', 'Multimedia'),
(8, 'XII MR 1', 'Multimedia'),
(9, 'XI AK 2', 'Akutansi'),
(10, 'XI AK 1', 'Akutansi'),
(11, 'XI MR 1', 'Multimedia'),
(12, 'X  TR 1', 'Teknik Komputer Jaringan'),
(13, 'X RPL 2', 'Rekayasa Perangkat Lunak'),
(17, 'XII RPL 2', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` char(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(8) NOT NULL,
  `tahun_dibayar` varchar(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`) VALUES
(2, 1, '111', '2021-03-24', 'Maret', '2022', 6, 460000),
(12, 1, '111', '2021-03-26', 'Januari', '2022', 6, 460000),
(13, 1, '111', '2021-03-26', 'Februari', '2022', 6, 460000),
(14, 2, '0032011368', '2021-03-26', 'Januari', '2021', 1, 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'rayyaniman123', 'rayyaniman123', 'Rayyan Iman', 'admin'),
(2, 'muhammadray1', 'muhammadray1', 'Muhammad Raynn', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
('001', '001', 'Siswa', 12, 'Jln. Ampera', '123', 1),
('0032011368', '002618', 'Muhammad Rayyan Imani', 1, 'JL. AR HAKIM GG KOLAM LR KUMIS NO 1', '085360974655', 1),
('111', '22', 'Aab', 9, 'ba', '1', 6),
('1234', '123', 'Taki', 1, 'Jln. Tokyo', '08123456789', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, 2021, 300000),
(2, 2020, 300000),
(3, 2019, 300000),
(6, 2022, 460000);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vpembayaran`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vpembayaran` (
`id_pembayaran` int(11)
,`nama_petugas` varchar(35)
,`nisn` char(10)
,`nama` varchar(35)
,`tgl_bayar` date
,`bulan_dibayar` varchar(8)
,`tahun_dibayar` varchar(4)
,`jumlah_bayar` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vsiswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vsiswa` (
`nisn` char(10)
,`nis` char(8)
,`nama` varchar(35)
,`id_kelas` int(11)
,`nama_kelas` varchar(10)
,`alamat` text
,`no_telp` varchar(13)
,`id_spp` int(11)
,`tahun` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vpembayaran`
--
DROP TABLE IF EXISTS `vpembayaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpembayaran`  AS SELECT `pembayaran`.`id_pembayaran` AS `id_pembayaran`, `petugas`.`nama_petugas` AS `nama_petugas`, `pembayaran`.`nisn` AS `nisn`, `siswa`.`nama` AS `nama`, `pembayaran`.`tgl_bayar` AS `tgl_bayar`, `pembayaran`.`bulan_dibayar` AS `bulan_dibayar`, `pembayaran`.`tahun_dibayar` AS `tahun_dibayar`, `pembayaran`.`jumlah_bayar` AS `jumlah_bayar` FROM ((`pembayaran` join `siswa` on(`pembayaran`.`nisn` = `siswa`.`nisn`)) join `petugas` on(`pembayaran`.`id_petugas` = `petugas`.`id_petugas`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vsiswa`
--
DROP TABLE IF EXISTS `vsiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vsiswa`  AS SELECT `siswa`.`nisn` AS `nisn`, `siswa`.`nis` AS `nis`, `siswa`.`nama` AS `nama`, `siswa`.`id_kelas` AS `id_kelas`, `kelas`.`nama_kelas` AS `nama_kelas`, `siswa`.`alamat` AS `alamat`, `siswa`.`no_telp` AS `no_telp`, `siswa`.`id_spp` AS `id_spp`, `spp`.`tahun` AS `tahun` FROM ((`siswa` join `kelas`) join `spp`) WHERE `siswa`.`id_kelas` = `kelas`.`id_kelas` AND `siswa`.`id_spp` = `spp`.`id_spp` ORDER BY `siswa`.`nisn` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_spp` (`id_spp`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_4` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
