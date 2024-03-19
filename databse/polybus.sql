-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Jan 2023 pada 05.39
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `polybus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `inputan_user`
--

CREATE TABLE IF NOT EXISTS `inputan_user` (
`id` int(5) NOT NULL,
  `nama` varchar(5) NOT NULL,
  `hsl_enkripsi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_enkrip`
--

CREATE TABLE IF NOT EXISTS `tabel_enkrip` (
`id_enkrip` int(5) NOT NULL,
  `huruf` varchar(4) NOT NULL,
  `kiri_atas` int(5) NOT NULL,
  `atas_kiri` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_enkrip`
--

INSERT INTO `tabel_enkrip` (`id_enkrip`, `huruf`, `kiri_atas`, `atas_kiri`) VALUES
(1, 'A', 21, 12),
(2, 'B', 22, 22),
(3, 'C', 23, 32),
(4, 'D', 24, 42),
(5, 'E', 25, 52),
(6, 'F', 26, 62),
(7, 'G', 27, 72),
(8, 'H', 28, 82),
(9, 'I', 31, 13),
(10, 'J', 32, 23),
(11, 'K', 33, 33),
(12, 'L', 13, 31),
(13, 'M', 34, 43),
(14, 'N', 35, 53),
(15, 'O', 12, 21),
(16, 'P', 11, 11),
(17, 'Q', 36, 63),
(18, 'R', 37, 73),
(19, 'S', 38, 83),
(20, 'T', 41, 14),
(21, 'U', 42, 24),
(22, 'V', 43, 34),
(23, 'W', 44, 44),
(24, 'X', 45, 54),
(25, 'Y', 14, 41),
(26, 'Z', 46, 64),
(27, '0', 16, 61),
(28, '1', 17, 71),
(29, '2', 15, 51),
(30, '3', 18, 81),
(31, '4', 47, 74),
(32, '5', 48, 84),
(33, '6', 51, 15),
(34, '7', 52, 25),
(35, '8', 53, 35),
(36, '9', 54, 45),
(37, ' ', 55, 55),
(38, '!', 56, 65),
(39, '"', 57, 75),
(40, '#', 58, 85),
(41, '$', 61, 16),
(42, '%', 62, 26),
(43, '&', 63, 36),
(44, '''', 64, 46),
(45, '(', 65, 56),
(46, ')', 66, 66),
(47, '*', 67, 76),
(48, '+', 68, 86),
(49, ',', 71, 17),
(50, '-', 72, 27),
(51, '.', 73, 37),
(52, '/', 74, 47),
(53, ':', 75, 57),
(54, ';', 76, 67),
(55, '<', 77, 77),
(56, '=', 78, 87),
(57, '>', 81, 18),
(58, '?', 82, 28),
(59, '@', 83, 38),
(60, '[', 84, 48),
(61, '\\', 85, 58),
(62, ']', 86, 68),
(63, '^', 87, 78),
(64, '_', 88, 88);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
`id` int(11) NOT NULL,
  `Username` varchar(244) NOT NULL,
  `Password` varchar(244) NOT NULL,
  `Jabatan` enum('Stockist','Stockist_Regional') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `Username`, `Password`, `Jabatan`) VALUES
(1, 'supri', 'supri21', 'Stockist_Regional'),
(2, 'zaki', 'zaki20', 'Stockist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inputan_user`
--
ALTER TABLE `inputan_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_enkrip`
--
ALTER TABLE `tabel_enkrip`
 ADD PRIMARY KEY (`id_enkrip`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inputan_user`
--
ALTER TABLE `inputan_user`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_enkrip`
--
ALTER TABLE `tabel_enkrip`
MODIFY `id_enkrip` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
