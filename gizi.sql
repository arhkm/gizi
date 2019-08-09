-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2019 at 04:45 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gizi`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_cek`
--

CREATE TABLE `hasil_cek` (
  `id` int(11) NOT NULL,
  `id_htubuh` int(11) NOT NULL,
  `id_hmakanan` int(11) NOT NULL,
  `nis` int(8) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `keterangan_tubuh` text NOT NULL,
  `keterangan_kar` text NOT NULL,
  `keterangan_prot` text NOT NULL,
  `keterangan_lem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_cek`
--

INSERT INTO `hasil_cek` (`id`, `id_htubuh`, `id_hmakanan`, `nis`, `tanggal`, `keterangan_tubuh`, `keterangan_kar`, `keterangan_prot`, `keterangan_lem`) VALUES
(1, 1, 1, 11505045, '2018-03-04', 'NORMAL', 'tubuh anda kekurangan karbohidrat', 'tubuh anda kekurangan protein', 'tubuh anda kekurangan lemak'),
(2, 2, 2, 11504549, '2019-07-16', 'KURUS', 'tubuh anda kekurangan karbohidrat', 'tubuh anda kekurangan protein', 'lemak dalam tubuh anda tercukupi'),
(3, 3, 3, 11505161, '2019-08-08', 'OBESITAS', 'tubuh anda kekurangan karbohidrat', 'tubuh anda kekurangan protein', 'lemak dalam tubuh anda melebihi yang dibutuhkan tubuh'),
(4, 4, 4, 11605386, '2019-08-08', 'OBESITAS', 'Karbohidrat dalam tubuh anda melebihi yang dibutuhkan tubuh', 'Protein dalam tubuh anda melebihi yang dibutuhkan tubuh', 'lemak dalam tubuh anda melebihi yang dibutuhkan tubuh');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_makanan`
--

CREATE TABLE `hasil_makanan` (
  `id_hmakanan` int(11) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `nis` int(8) NOT NULL,
  `hkarbohidrat` varchar(8) NOT NULL,
  `hprotein` varchar(8) NOT NULL,
  `hlemak` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_makanan`
--

INSERT INTO `hasil_makanan` (`id_hmakanan`, `tanggal`, `nis`, `hkarbohidrat`, `hprotein`, `hlemak`) VALUES
(1, '2018-03-04', 11505045, '300', '38', '3.4'),
(2, '2019-07-16', 11504549, '75', '26.8', '38.59999'),
(3, '2019-08-08', 11505161, '1.3', '7.8', '38.3'),
(4, '2019-08-08', 11605386, '5.4', '18.3', '4.2');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_tubuh`
--

CREATE TABLE `hasil_tubuh` (
  `id_htubuh` int(11) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `imt` varchar(8) NOT NULL,
  `bbi` varchar(8) NOT NULL,
  `kkarbohidrat` varchar(8) NOT NULL,
  `skarbohidrat` varchar(8) NOT NULL,
  `kprotein` varchar(8) NOT NULL,
  `sprotein` varchar(8) NOT NULL,
  `klemak` varchar(8) NOT NULL,
  `slemak` varchar(8) NOT NULL,
  `kenergi` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_tubuh`
--

INSERT INTO `hasil_tubuh` (`id_htubuh`, `tanggal`, `nis`, `imt`, `bbi`, `kkarbohidrat`, `skarbohidrat`, `kprotein`, `sprotein`, `klemak`, `slemak`, `kenergi`) VALUES
(1, '2018-03-04', '11505045', '19.03', '63', '410.03', '512.54', '64.2', '102.51', '28.53', '75.93', '2567.885'),
(2, '2019-07-16', '11504549', '16.53', '58.5', '365.59', '456.99', '55.56', '91.4', '24.69', '67.7', '2222.235'),
(3, '2019-08-08', '11505161', '193.81', '-29.7', '123.17', '153.97', '15.91', '30.79', '7.07', '22.81', '636.399'),
(4, '2019-08-08', '11605386', '100.25', '-29.7', '-32.07', '-40.09', '-4.71', '-8.02', '-2.09', '-5.94', '-188.309');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatanl`
--

CREATE TABLE `kegiatanl` (
  `id` int(2) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nilai` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatanl`
--

INSERT INTO `kegiatanl` (`id`, `jenis`, `nilai`) VALUES
(1, 'bedrest', '1.30'),
(2, 'ringan', '1.65'),
(3, 'sedang', '1.76'),
(4, 'berat', '2.10');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatanp`
--

CREATE TABLE `kegiatanp` (
  `id` int(2) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nilai` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatanp`
--

INSERT INTO `kegiatanp` (`id`, `jenis`, `nilai`) VALUES
(1, 'bedrest', '1.30'),
(2, 'ringan', '1.55'),
(3, 'sedang', '1.70'),
(4, 'berat', '2.00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `qw_laporan`
-- (See below for the actual view)
--
CREATE TABLE `qw_laporan` (
`NIS` int(8)
,`Nama` varchar(50)
,`JK` varchar(50)
,`Rombel` varchar(50)
,`imt` varchar(8)
,`bbi` varchar(8)
,`kkarbohidrat` varchar(8)
,`skarbohidrat` varchar(8)
,`kprotein` varchar(8)
,`sprotein` varchar(8)
,`klemak` varchar(8)
,`slemak` varchar(8)
,`kenergi` varchar(8)
,`hkarbohidrat` varchar(8)
,`hprotein` varchar(8)
,`hlemak` varchar(8)
,`keterangan_tubuh` text
,`keterangan_kar` text
,`keterangan_prot` text
,`keterangan_lem` text
,`tanggal` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_makanan`
--

CREATE TABLE `tb_makanan` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gram` int(50) NOT NULL,
  `energi` int(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `kadar` varchar(50) NOT NULL,
  `lemak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_makanan`
--

INSERT INTO `tb_makanan` (`id`, `nama`, `gram`, `energi`, `jenis`, `kadar`, `lemak`) VALUES
(3, 'Sayur Sop', 100, 27, 'Karbohidrat', '1.3', '2'),
(4, 'Susu', 100, 336, 'karbohiddrat', '55', '10'),
(5, 'kangkung', 100, 29, 'Karbohidrat', '5.4', '0.2'),
(6, 'Tauge', 100, 35, 'Karbohidrat', '5.8', '0.2'),
(7, 'Sawi', 100, 22, 'karbohidrat', '4', '0.3'),
(8, 'Ikan Lele', 100, 372, 'protein', '7.8', '36.3'),
(9, 'Tempe', 100, 149, 'protein', '18.3', '4'),
(10, 'ikan Asin', 100, 193, 'protein', '42', '1.5'),
(11, 'ikan mas', 100, 86, 'protein', '16', '2'),
(12, 'ikan gurame', 100, 192, 'Karbohidrat', '12.7', '10.1'),
(13, 'roti', 100, 248, 'karbohidrat', '50', '1.2'),
(14, 'ikan mujair', 100, 89, 'protein', '18.7', '1'),
(15, 'nasi', 100, 176, 'karbohidrat', '3.3', '0'),
(16, 'sayur asem', 100, 29, 'karbohidrat', '5', '0.6'),
(17, 'buncis', 100, 35, 'karbohidrat', '7.7', '0.2'),
(18, 'bayam', 100, 36, 'karbohidrat', '6.5', '0.5'),
(19, 'telur ayam', 100, 162, 'Karbohidrat', '12.8', '11.5'),
(20, 'Tahu', 100, 68, 'Karbohidrat', '7.8', '4.6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `NIS` int(8) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Rombel` varchar(50) NOT NULL,
  `JK` varchar(50) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`NIS`, `Nama`, `Rombel`, `JK`, `Keterangan`) VALUES
(11605386, 'Arief Rahman Hakim', 'RPL XII-4', 'L', 'sehat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`) VALUES
('agus', 'suryadi123'),
('agung', 'jumadi123'),
('sukma', 'perkakas123'),
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `temporari`
--

CREATE TABLE `temporari` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `kadar` varchar(8) NOT NULL,
  `gram` varchar(8) NOT NULL,
  `energi` varchar(8) NOT NULL,
  `lemak` varchar(8) NOT NULL,
  `nis` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `qw_laporan`
--
DROP TABLE IF EXISTS `qw_laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qw_laporan`  AS  select `tb_siswa`.`NIS` AS `NIS`,`tb_siswa`.`Nama` AS `Nama`,`tb_siswa`.`JK` AS `JK`,`tb_siswa`.`Rombel` AS `Rombel`,`hasil_tubuh`.`imt` AS `imt`,`hasil_tubuh`.`bbi` AS `bbi`,`hasil_tubuh`.`kkarbohidrat` AS `kkarbohidrat`,`hasil_tubuh`.`skarbohidrat` AS `skarbohidrat`,`hasil_tubuh`.`kprotein` AS `kprotein`,`hasil_tubuh`.`sprotein` AS `sprotein`,`hasil_tubuh`.`klemak` AS `klemak`,`hasil_tubuh`.`slemak` AS `slemak`,`hasil_tubuh`.`kenergi` AS `kenergi`,`hasil_makanan`.`hkarbohidrat` AS `hkarbohidrat`,`hasil_makanan`.`hprotein` AS `hprotein`,`hasil_makanan`.`hlemak` AS `hlemak`,`hasil_cek`.`keterangan_tubuh` AS `keterangan_tubuh`,`hasil_cek`.`keterangan_kar` AS `keterangan_kar`,`hasil_cek`.`keterangan_prot` AS `keterangan_prot`,`hasil_cek`.`keterangan_lem` AS `keterangan_lem`,`hasil_cek`.`tanggal` AS `tanggal` from (((`hasil_cek` join `tb_siswa` on((`hasil_cek`.`nis` = `tb_siswa`.`NIS`))) join `hasil_tubuh` on((`hasil_cek`.`id_htubuh` = `hasil_tubuh`.`id_htubuh`))) join `hasil_makanan` on((`hasil_cek`.`id_hmakanan` = `hasil_makanan`.`id_hmakanan`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_cek`
--
ALTER TABLE `hasil_cek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_makanan`
--
ALTER TABLE `hasil_makanan`
  ADD PRIMARY KEY (`id_hmakanan`);

--
-- Indexes for table `hasil_tubuh`
--
ALTER TABLE `hasil_tubuh`
  ADD PRIMARY KEY (`id_htubuh`);

--
-- Indexes for table `kegiatanl`
--
ALTER TABLE `kegiatanl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatanp`
--
ALTER TABLE `kegiatanp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_makanan`
--
ALTER TABLE `tb_makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- Indexes for table `temporari`
--
ALTER TABLE `temporari`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_cek`
--
ALTER TABLE `hasil_cek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hasil_makanan`
--
ALTER TABLE `hasil_makanan`
  MODIFY `id_hmakanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hasil_tubuh`
--
ALTER TABLE `hasil_tubuh`
  MODIFY `id_htubuh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatanl`
--
ALTER TABLE `kegiatanl`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatanp`
--
ALTER TABLE `kegiatanp`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_makanan`
--
ALTER TABLE `tb_makanan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `temporari`
--
ALTER TABLE `temporari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
