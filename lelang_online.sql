-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2020 at 01:21 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lelang_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `history_lelang`
--

CREATE TABLE IF NOT EXISTS `history_lelang` (
`id_history` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penawaran_harga` int(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `history_lelang`
--

INSERT INTO `history_lelang` (`id_history`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga`) VALUES
(1, 1, 1, 1, 650000),
(2, 2, 2, 1, 995550000),
(3, 3, 5, 1, 68440),
(4, 1, 1, 1, 650000),
(5, 3, 5, 1, 68440),
(6, 3, 5, 4, 96426),
(7, 3, 5, 4, 96426),
(8, 1, 1, 2, 700000),
(9, 4, 3, 1, 550000),
(10, 4, 3, 1, 550000),
(11, 2, 2, 1, 995550000),
(14, 7, 7, 1, 12000),
(15, 8, 8, 1, 950000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
`id_barang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `tgl` date NOT NULL,
  `harga_awal` int(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi_barang` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `tgl`, `harga_awal`, `foto`, `deskripsi_barang`) VALUES
(1, 'Koin Dinar', '2020-02-21', 650000, 'Dinar_of_Abd_al-Malik,_AH_75.jpg', 'Koin Dinar yang ada pada zaman Kekhalifahan Umayyah'),
(2, 'PhoneWave', '2020-02-21', 995550000, 'Futuregadget08_01.png', 'The PhoneWave(Name subject to change) is one of the inventions of the Future Gadget Laboratory (Future Gadget No. 8). With it, you can send messages to the past.'),
(3, 'Bit Particle Gun', '2020-02-21', 550000, 'Futuregadget_01_01.png', 'A toy gun modified to act as a TV remote. However, only the Channel + button works.'),
(5, 'Sendok Sup', '2020-02-22', 68440, 'hqdefault.jpg', 'Sendok Sup Abad ke 17'),
(7, 'Mouse', '2020-02-25', 12000, 'Mouse.jpg', 'Mouse Logitech'),
(8, 'VSS Vintorez', '2020-02-25', 950000, '', 'VSS Vintorez');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lelang`
--

CREATE TABLE IF NOT EXISTS `tb_lelang` (
`id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_lelang` date NOT NULL,
  `harga_akhir` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` enum('dibuka','ditutup','terlelang') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_lelang`
--

INSERT INTO `tb_lelang` (`id_lelang`, `id_barang`, `tgl_lelang`, `harga_akhir`, `id_user`, `id_petugas`, `status`) VALUES
(1, 1, '2020-02-22', 700000, 2, 2, 'dibuka'),
(2, 2, '2020-02-22', 995550000, 1, 2, 'dibuka'),
(3, 5, '2020-02-22', 96426, 4, 2, 'terlelang'),
(4, 3, '2020-02-24', 550000, 1, 2, 'dibuka'),
(7, 7, '2020-02-25', 12000, 1, 2, 'ditutup'),
(8, 8, '2020-02-25', 950000, 1, 2, 'ditutup');

--
-- Triggers `tb_lelang`
--
DELIMITER //
CREATE TRIGGER `history` AFTER INSERT ON `tb_lelang`
 FOR EACH ROW BEGIN
INSERT INTO history_lelang SET
id_history=NULL, id_lelang=NEW.id_lelang, id_barang=NEW.id_barang, id_user=NEW.id_user, penawaran_harga=NEW.harga_akhir
ON DUPLICATE KEY UPDATE id_user=NEW.id_user, penawaran_harga=penawaran_harga+NEW.harga_akhir;
END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `history_update` AFTER UPDATE ON `tb_lelang`
 FOR EACH ROW BEGIN
INSERT INTO history_lelang SET
id_history=NULL, id_lelang=NEW.id_lelang, id_barang=NEW.id_barang, id_user=NEW.id_user, penawaran_harga=penawaran_harga+NEW.harga_akhir
ON DUPLICATE KEY UPDATE id_user=NEW.id_user, penawaran_harga=penawaran_harga+NEW.harga_akhir;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE IF NOT EXISTS `tb_level` (
`id_level` int(11) NOT NULL,
  `level` enum('administrator','petugas') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'administrator'),
(2, 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masyarakat`
--

CREATE TABLE IF NOT EXISTS `tb_masyarakat` (
`id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telp` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_user`, `nama_lengkap`, `username`, `password`, `telp`) VALUES
(1, 'Anon', 'Anon', '2ae66f90b7788ab8950e8f81b829c947', '066666666666'),
(2, '', 'Arnavet', '438d5077274b642c7c477c3566aee248', ''),
(3, '', 'Naphtali', '438d5077274b642c7c477c3566aee248', ''),
(4, '', 'PatrickStar', '827ccb0eea8a706c4c34a16891f84e7b', ''),
(5, '', 'Khula', '438d5077274b642c7c477c3566aee248', ''),
(6, 'Aharon', 'Aharon', '438d5077274b642c7c477c3566aee248', '081251779142');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE IF NOT EXISTS `tb_petugas` (
`id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `id_level`) VALUES
(1, 'Lukham', 'Lukham', '438d5077274b642c7c477c3566aee248', 1),
(2, 'Shumera', 'Shumera', '438d5077274b642c7c477c3566aee248', 2),
(3, 'Mefayisha', 'Mefayisha', '438d5077274b642c7c477c3566aee248', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_lelang`
--
ALTER TABLE `history_lelang`
 ADD PRIMARY KEY (`id_history`), ADD KEY `id_lelang` (`id_lelang`,`id_barang`,`id_user`), ADD KEY `id_barang` (`id_barang`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
 ADD PRIMARY KEY (`id_lelang`), ADD KEY `id_barang` (`id_barang`,`id_user`,`id_petugas`), ADD KEY `id_user` (`id_user`), ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
 ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
 ADD PRIMARY KEY (`id_petugas`), ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_lelang`
--
ALTER TABLE `history_lelang`
MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_lelang`
--
ALTER TABLE `history_lelang`
ADD CONSTRAINT `history_lelang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `history_lelang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `history_lelang_ibfk_3` FOREIGN KEY (`id_lelang`) REFERENCES `tb_lelang` (`id_lelang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
ADD CONSTRAINT `tb_lelang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tb_lelang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tb_lelang_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
