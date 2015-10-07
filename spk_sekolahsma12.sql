-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Okt 2015 pada 12.49
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk_sekolahsma12`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelas`
--

CREATE TABLE IF NOT EXISTS `data_kelas` (
`id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data untuk tabel `data_kelas`
--

INSERT INTO `data_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X 1'),
(2, 'X 2'),
(3, 'X 3'),
(4, 'X 4'),
(5, 'X 5'),
(6, 'X 6'),
(7, 'X 7'),
(8, 'X 8'),
(9, 'X 9'),
(10, 'X 10'),
(11, 'XI IPS 1'),
(12, 'XI IPS 2'),
(13, 'XI IPS 3'),
(14, 'XI IPS 4'),
(15, 'XI IPA 1'),
(16, 'XI IPA 2'),
(17, 'XI IPA 3'),
(18, 'XI IPA 4'),
(19, 'XII IPS 1'),
(20, 'XII IPS 2'),
(21, 'XII IPS 3'),
(22, 'XII IPS 4'),
(23, 'XII IPA 1'),
(24, 'XII IPA 2'),
(25, 'XII IPA 3'),
(26, 'XII IPA 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE IF NOT EXISTS `data_siswa` (
`id_siswa` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jkel` varchar(30) NOT NULL,
  `p_ortu` varchar(20) NOT NULL,
  `jml_saudara` varchar(10) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `kelakuan` varchar(30) NOT NULL,
  `id_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id_siswa`, `nis`, `nama`, `alamat`, `jkel`, `p_ortu`, `jml_saudara`, `nilai`, `kelakuan`, `id_kelas`) VALUES
(1, '111450', 'Hendra', 'Jl. Abdesir', 'L', '500000', '3', '8.4', 'Cukup', '2'),
(2, '111451', 'Wijaya', 'Jl. Meong', 'L', '680000', '1', '7.9', 'Buruk', '1'),
(3, '111452', 'Wijayanto', 'Jl. Kucing', 'L', '750000', '3', '7.4', 'Cukup', '9'),
(4, '111453', 'Jayanti', 'Jl. Sukimin', 'L', '800000', '4', '8.2', 'Cukup', '4'),
(5, '111454', 'Saiful', 'Jl.yahoo', 'L', '670000', '4', '7.9', 'Baik', '1'),
(6, '111455', 'Anwar', 'Jl. meong', 'L', '840000', '5', '8.4', 'Baik', '1'),
(7, '111456', 'Abeng', 'Jl. tinumbu', 'L', '850000', '2', '7.4', 'Buruk', '1'),
(8, '111457', 'Feli', 'Jl. Syech', 'P', '960000', '2', '8.6', 'Baik', '1'),
(9, '111458', 'Kelas dua', 'Jl. Kelas', 'L', '780000', '4', '8.8', 'Sangat Baik', '2'),
(10, '111459', 'Feli', 'Jl. Yusuf', 'P', '845000', '5', '7.6', 'Baik', '2'),
(11, '111460', 'Rani', 'Jl. S.kom', 'P', '740000', '1', '7.3', 'Sangat Baik', '2'),
(12, '111461', 'Lahuddu', 'Jl. laong', 'L', '840000', '3', '8.7', 'Cukup', '2'),
(13, '111477', 'Nisa', 'Jl. Kucing', 'P', '760000', '2', '7.8', 'Baik', '3'),
(14, '111488', 'irvan bachdim', 'Jl. Tentara', 'L', '740000', '4', '8.3', 'Baik', '3'),
(15, '111480', 'Kucing', 'Jl. Meong', 'L', '860000', '8', '8.4', 'Baik', '3'),
(16, '111481', 'kdjskj', 'Jl. djs', 'L', '800000', '9', '7.9', 'Cukup', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`id_kriteria` int(11) NOT NULL,
  `id_siswa` varchar(50) NOT NULL,
  `x1` varchar(20) NOT NULL,
  `x2` varchar(20) NOT NULL,
  `y1` varchar(20) NOT NULL,
  `y2` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `id_siswa`, `x1`, `x2`, `y1`, `y2`) VALUES
(2, '2', '3', '1', '3', '2'),
(4, '4', '2', '4', '4', '3'),
(6, '6', '1', '5', '4', '4'),
(7, '7', '1', '2', '2', '2'),
(8, '8', '1', '2', '5', '4'),
(10, '9', '2', '4', '5', '5'),
(11, '10', '1', '5', '3', '4'),
(12, '11', '2', '1', '2', '5'),
(13, '12', '1', '3', '5', '3'),
(18, '3', '2', '3', '2', '3'),
(19, '13', '2', '2', '3', '4'),
(20, '14', '2', '4', '4', '4'),
(21, '15', '1', '5', '4', '4'),
(22, '16', '2', '5', '3', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rangking`
--

CREATE TABLE IF NOT EXISTS `rangking` (
`id_ranking` int(11) NOT NULL,
  `id_siswa` varchar(11) NOT NULL,
  `n_ekonomi` varchar(10) NOT NULL,
  `n_akademik` varchar(10) NOT NULL,
  `n_total` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `rangking`
--

INSERT INTO `rangking` (`id_ranking`, `id_siswa`, `n_ekonomi`, `n_akademik`, `n_total`) VALUES
(1, '2', '2.2', '2.6', '4.8'),
(2, '4', '2.8', '3.6', '6.4'),
(3, '6', '2.6', '4', '6.6'),
(4, '7', '1.4', '2', '3.4'),
(5, '8', '1.4', '4.6', '6'),
(6, '9', '2.8', '5', '7.8'),
(7, '10', '2.6', '3.4', '6'),
(8, '11', '1.6', '3.2', '4.8'),
(9, '12', '1.8', '4.2', '6'),
(10, '7', '1.4', '2', '3.4'),
(11, '3', '2.4', '2.4', '4.8'),
(12, '13', '2', '3.4', '5.4'),
(13, '14', '2.8', '4', '6.8'),
(14, '15', '2.6', '4', '6.6'),
(15, '16', '3.2', '3', '6.2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_session` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_session`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'tnqja2io1il7fq7mics4ua36n5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kelas`
--
ALTER TABLE `data_kelas`
 ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
 ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`id_kriteria`), ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `rangking`
--
ALTER TABLE `rangking`
 ADD PRIMARY KEY (`id_ranking`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kelas`
--
ALTER TABLE `data_kelas`
MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `rangking`
--
ALTER TABLE `rangking`
MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
