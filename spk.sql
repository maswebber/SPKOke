-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 14 Jan 2020 pada 18.50
-- Versi server: 10.2.29-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u7627689_spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alters`
--

CREATE TABLE `alters` (
  `idalter` int(11) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `id_tahun` bigint(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alters`
--

INSERT INTO `alters` (`idalter`, `ket`, `id_tahun`, `status`) VALUES
(1, 'Jembatan', 2, 1),
(2, 'Gedung Serbaguna', 2, 1),
(3, 'Taman Desa Sehat', 2, 1),
(4, 'Trotoar', 2, 1),
(7, 'Rumah Rakyat', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ipnkfmnmhvc37a934au87f1am5v5bm30', '127.0.0.1', 1578642561, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383634323535383b757365727c733a353a2261646d696e223b726f6c657c733a353a2241444d494e223b69647c733a313a2231223b),
('j06bc84i96aedkfhpq62p6vmim2ueje1', '127.0.0.1', 1578641107, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383634313130373b757365727c733a383a226f70657261746f72223b726f6c657c733a383a224f50455241544f52223b69647c733a323a223132223b),
('lbh5cj1p3eb2e4jhjgfgokkapk4k7evg', '127.0.0.1', 1578817908, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383831373633323b757365727c733a353a2261646d696e223b726f6c657c733a353a2241444d494e223b69647c733a313a2231223b),
('nft0i8f90iagookr3iqhh0n435bhj80d', '127.0.0.1', 1578893309, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383839333330373b757365727c733a353a2261646d696e223b726f6c657c733a353a2241444d494e223b69647c733a313a2231223b),
('f5s7t8op4lt36hdlvof7l2dvij0jlvfe', '127.0.0.1', 1578926879, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383932363837363b757365727c733a383a226f70657261746f72223b726f6c657c733a383a224f50455241544f52223b69647c733a323a223132223b666f746f7c733a35323a2268747470733a2f2f73706b2d646573616f6b2e746573742f6173736574732f696d616765732f696e636f7272656374332e706e67223b),
('8942ff568b8f3a528bee51b8da24b150bf75e7b7', '114.125.81.124', 1578927919, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383932373636373b),
('34c18b87c2da12997ef19306896961f6fc607b6f', '114.125.81.124', 1578927929, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383932373932393b),
('2367007171e84b39e56875df8612ad13d57abbca', '114.125.81.124', 1578927949, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383932373934393b),
('180d89cb93b9b1fe59c8dc6430cba824c899b4e2', '182.1.76.90', 1578928682, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383932383638323b),
('62bcd2d92f744f2497aead524eedb9da6dd9ec7c', '179.43.169.182', 1578928005, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383932383030353b),
('f41b6dc43bd1ac1bec8fd7acc811b6bbde32fdf9', '64.41.200.104', 1578928099, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383932383039393b),
('ac824551b0b536231d113426fcc50023b2fb7b08', '209.17.96.66', 1578984727, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383938343732373b),
('6652315dc2215c2fdd28e21e22fe8ed490465a2c', '114.142.169.5', 1579002604, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537393030323630343b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `format_setting`
--

CREATE TABLE `format_setting` (
  `head` longtext DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `foot` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `format_setting`
--

INSERT INTO `format_setting` (`head`, `body`, `foot`) VALUES
('<p><br></p><table class=\"table borderless\" style=\"\"><tbody><tr><td><p style=\"text-align: center; \"><br><img src=\"https://www.spk.maswebber.com/assets/images/logo61.png\" style=\"width: 150px;\"></p></td><td><table width=\"100%\" style=\"background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); text-align: center;\"><tbody><tr><td width=\"70%\"><h4><span arial=\"\" black\";\"=\"\" style=\"font-family: \"><span style=\"font-weight: 700;\">PEMERINTAH KABUPATEN BANYUMAS</span></span></h4></td></tr><tr><td><h4><span arial=\"\" black\";\"=\"\" style=\"font-family: \"><span style=\"font-weight: 700;\">KECAMATAN KARANG TURI</span></span></h4></td></tr><tr><td><h4><span arial=\"\" black\";\"=\"\" style=\"font-family: \"><span style=\"font-weight: 700;\">ALAMAT KECAMATAN KARANG TURI</span></span></h4></td></tr><tr><td><p><span arial=\"\" black\";\"=\"\" style=\"font-family: \"><span style=\"font-weight: 700;\">Alamat : Jl. Karangturi no 1</span></span></p></td></tr></tbody></table></td></tr></tbody></table>', '<p>Bisa berisi nomor dan keterangan yang dibutuhkan</p>', '<div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\"><br></div><div style=\"text-align: right;\">Banyumas, <u>                                                   </u></div>\r\n<table class=\"table borderless\">\r\n    <tbody>\r\n        <tr>\r\n            <td style=\"text-align: center; \">\r\n                <p>Mengetahui,</p>\r\n                <p><span style=\"background-color: transparent;\">Sekdes Karangturi</span></p>\r\n                <p><br></p>\r\n                <p>TTD</p>\r\n                <p><br></p>\r\n                <p>Nama</p>\r\n            </td>\r\n            <td style=\"text-align: center; \">\r\n                <p><span style=\"color: rgb(51, 51, 51); background-color: transparent;\">Kaur Perencanaan,</span><br></p>\r\n                <p><span style=\"color: rgb(51, 51, 51);\">Karangturi</span></p>\r\n                <p><br></p>\r\n                <p>TTD</p>\r\n                <p><br></p>\r\n                <p>Nama</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<table class=\"table borderless\">\r\n    <tbody>\r\n        <tr>\r\n            <td style=\"text-align: center; \">\r\n                <p><span style=\"color: rgb(51, 51, 51);\">Meyetujui,</span></p>\r\n                <p><span style=\"color: rgb(51, 51, 51);\">Kepala Desa Karangturi</span></p>\r\n                <p><br></p>\r\n                <p>TTD</p>\r\n                <p><span style=\"color: rgb(51, 51, 51);\"><br></span><span style=\"color: rgb(51, 51, 51);\"><br></span>Nama</p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `menu` varchar(255) DEFAULT NULL,
  `aksi` varchar(255) DEFAULT NULL,
  `tanggal_aksi` datetime DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id_history`, `menu`, `aksi`, `tanggal_aksi`, `user_name`) VALUES
(2, 'setting', 'update Format Laporan', '0000-00-00 00:00:00', 'admin'),
(3, 'setting', 'update Format Laporan', '2020-01-10 06:24:44', 'admin'),
(4, 'setting', 'update Format Laporan', '2020-01-10 06:25:05', 'admin'),
(5, 'Data Kriteria', 'Tambah Kriteria', '2020-01-10 06:43:40', 'admin'),
(6, 'Data Kriteria', 'Hapus Kriteria', '2020-01-10 06:43:46', 'admin'),
(7, 'Data Kriteria', 'Tambah Kriteria', '2020-01-10 06:50:03', 'admin'),
(8, 'Data Kriteria', 'Hapus Kriteria', '2020-01-10 06:50:19', 'admin'),
(9, 'Data tahun', 'Tambah tahun ID:9', '2020-01-10 07:33:45', 'admin'),
(10, 'Data tahun', 'Hapus tahun ID:9', '2020-01-10 07:34:03', 'admin'),
(11, 'Pengaturan Sistem', 'Ubah Format Laporan', '2020-01-12 07:09:03', 'admin'),
(12, 'Data setting', 'Ubah setting ID:', '2020-01-12 07:15:27', 'admin'),
(13, 'Data setting', 'Ubah setting ID:', '2020-01-12 07:32:53', 'admin'),
(14, 'Data setting', 'Tambah setting ID:0', '2020-01-12 07:35:51', 'admin'),
(15, 'Data setting', 'Ubah setting ID:', '2020-01-12 07:36:12', 'admin'),
(16, 'Data format_setting', 'Ubah format_setting ID:', '2020-01-12 07:38:43', 'admin'),
(17, 'Data setting', 'Ubah setting ID:', '2020-01-12 07:57:34', 'admin'),
(18, 'Data setting', 'Ubah setting ID:', '2020-01-12 08:14:49', 'admin'),
(19, 'Data setting', 'Ubah setting ID:', '2020-01-12 08:15:43', 'admin'),
(20, 'Data setting', 'Ubah setting ID:', '2020-01-12 08:19:03', 'admin'),
(21, 'Data setting', 'Ubah setting ID:', '2020-01-12 08:19:34', 'admin'),
(22, 'Data format_setting', 'Ubah format_setting ID:', '2020-01-13 03:09:40', 'admin'),
(23, 'Data format_setting', 'Ubah format_setting ID:', '2020-01-13 03:10:12', 'admin'),
(24, 'Data memgota', 'Ubah memgota ID:Array', '2020-01-13 12:30:21', 'admin'),
(25, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 12:31:33', 'admin'),
(26, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 12:31:54', 'admin'),
(27, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 12:35:33', 'admin'),
(28, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 12:35:39', 'admin'),
(29, 'Data memgota', '{\"id_ngota\":\"12\",\"pwo\":\"ff852edd2d33b0495d74118a4e8c57e6\"}', '2020-01-13 12:43:08', 'admin'),
(30, 'Data memgota', 'Tambah memgota ID:13', '2020-01-13 12:45:50', 'admin'),
(31, 'Data memgota', 'Hapus memgota ID:13', '2020-01-13 12:46:01', 'admin'),
(32, 'Data memgota', 'Tambah memgota ID:14', '2020-01-13 13:29:16', 'admin'),
(33, 'Data memgota', '{\"id_ngota\":\"14\"}', '2020-01-13 13:40:10', 'admin'),
(34, 'Data memgota', '{\"id_ngota\":\"14\"}', '2020-01-13 13:40:28', 'admin'),
(35, 'Data memgota', '{\"id_ngota\":\"1\"}', '2020-01-13 13:48:44', 'admin'),
(36, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 13:49:03', 'admin'),
(37, 'Data memgota', '{\"id_ngota\":\"14\"}', '2020-01-13 13:49:57', 'admin'),
(38, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 14:45:47', 'operator'),
(39, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 14:47:14', 'operator'),
(40, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 14:47:55', 'operator'),
(41, 'Data format_setting', 'null', '2020-01-13 15:16:09', 'admin'),
(42, 'Data setting', 'null', '2020-01-13 15:16:31', 'admin'),
(43, 'Data memgota', '{\"id_ngota\":\"14\"}', '2020-01-13 15:16:57', 'admin'),
(44, 'Data memgota', '{\"id_ngota\":\"12\"}', '2020-01-13 15:17:10', 'admin'),
(45, 'Data memgota', '{\"id_ngota\":\"1\"}', '2020-01-13 15:17:27', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `idkri` int(11) NOT NULL,
  `ketkri` varchar(100) NOT NULL,
  `bobot` float NOT NULL,
  `atribut` set('benefit','cost') NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`idkri`, `ketkri`, `bobot`, `atribut`, `name`, `status`) VALUES
(1, 'Daya Guna', 5, 'benefit', 'asp', 1),
(2, 'Kondisi', 5, 'benefit', 'pkr', 1),
(3, 'Budget', 3, 'cost', 'ips', 1),
(4, 'Daya Tahan', 3, 'benefit', 'year', 1),
(5, 'Waktu Pelaksanaan', 3, 'cost', 'stat', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `memgota`
--

CREATE TABLE `memgota` (
  `id_ngota` int(11) NOT NULL,
  `usn` varchar(32) NOT NULL,
  `pwo` varchar(128) NOT NULL,
  `role` set('ADMIN','OPERATOR','PIMPINAN') NOT NULL DEFAULT '',
  `status` int(1) DEFAULT NULL,
  `foto` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `memgota`
--

INSERT INTO `memgota` (`id_ngota`, `usn`, `pwo`, `role`, `status`, `foto`) VALUES
(1, 'admin', '1a382c7339f0ac81773311f264ba2610', 'ADMIN', 1, 'correct3.png'),
(12, 'operator', 'ff852edd2d33b0495d74118a4e8c57e6', 'OPERATOR', 1, 'incorrect5.png'),
(14, 'test01', '7bff5a560f5bad99fe62c421a57da08a', 'OPERATOR', 1, 'incorrect4.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_alter`
--

CREATE TABLE `nilai_alter` (
  `idnilai` int(11) NOT NULL,
  `idalter` int(11) NOT NULL,
  `idkri` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_alter`
--

INSERT INTO `nilai_alter` (`idnilai`, `idalter`, `idkri`, `nilai`) VALUES
(1, 1, 1, 5),
(2, 1, 2, 10),
(3, 1, 3, 5),
(4, 1, 4, 5),
(5, 1, 5, 4),
(6, 2, 1, 7),
(7, 2, 2, 6),
(9, 2, 3, 5),
(10, 2, 4, 7),
(11, 2, 5, 5),
(12, 3, 1, 5),
(13, 3, 2, 4),
(14, 3, 3, 3),
(15, 3, 4, 6),
(16, 3, 5, 3),
(17, 4, 1, 7),
(18, 4, 2, 8),
(19, 4, 3, 6),
(20, 4, 4, 7),
(21, 4, 5, 8),
(27, 7, 1, 10),
(28, 7, 2, 6),
(29, 7, 3, 1),
(30, 7, 4, 10),
(31, 7, 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `logo` longtext DEFAULT NULL,
  `nama` longtext DEFAULT NULL,
  `kota` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`logo`, `nama`, `kota`) VALUES
('correct2.png', 'SPK Oke', 'Banyumas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stud`
--

CREATE TABLE `stud` (
  `roll_no` int(1) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stud`
--

INSERT INTO `stud` (`roll_no`, `Name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` bigint(255) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`id_tahun`, `tgl_mulai`, `status`, `tgl_selesai`) VALUES
(2, '2008-09-08', 0, '2009-09-10'),
(3, '2018-10-04', 0, '2019-05-18'),
(4, '2019-04-01', 1, '2020-04-01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alters`
--
ALTER TABLE `alters`
  ADD PRIMARY KEY (`idalter`),
  ADD KEY `id_tahun` (`id_tahun`);

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`idkri`);

--
-- Indeks untuk tabel `memgota`
--
ALTER TABLE `memgota`
  ADD PRIMARY KEY (`id_ngota`);

--
-- Indeks untuk tabel `nilai_alter`
--
ALTER TABLE `nilai_alter`
  ADD PRIMARY KEY (`idnilai`),
  ADD KEY `idalter` (`idalter`),
  ADD KEY `idkri` (`idkri`);

--
-- Indeks untuk tabel `stud`
--
ALTER TABLE `stud`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indeks untuk tabel `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alters`
--
ALTER TABLE `alters`
  MODIFY `idalter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `idkri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `memgota`
--
ALTER TABLE `memgota`
  MODIFY `id_ngota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `nilai_alter`
--
ALTER TABLE `nilai_alter`
  MODIFY `idnilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `stud`
--
ALTER TABLE `stud`
  MODIFY `roll_no` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alters`
--
ALTER TABLE `alters`
  ADD CONSTRAINT `alters_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id_tahun`);

--
-- Ketidakleluasaan untuk tabel `nilai_alter`
--
ALTER TABLE `nilai_alter`
  ADD CONSTRAINT `nilai_alter_ibfk_1` FOREIGN KEY (`idalter`) REFERENCES `alters` (`idalter`),
  ADD CONSTRAINT `nilai_alter_ibfk_2` FOREIGN KEY (`idkri`) REFERENCES `kriteria` (`idkri`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
