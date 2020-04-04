-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2020 at 06:57 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_konflik_ntt`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_btkangket`
--

CREATE TABLE `m_btkangket` (
  `IDBENTUK` int(10) NOT NULL,
  `NMBENTUK` varchar(512) NOT NULL,
  `WARNABNTK` varchar(512) DEFAULT NULL,
  `LOGOKON` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_btkangket`
--

INSERT INTO `m_btkangket` (`IDBENTUK`, `NMBENTUK`, `WARNABNTK`, `LOGOKON`) VALUES
(7, 'Ekonomi', 'yellow', 'ekonomi.png'),
(9, 'Hankam', '#0D4693', 'hankam.png'),
(10, 'Terorisme', '#0D4693', 'terorisme.png'),
(11, 'Sara', '#B400C6', 'sara.png'),
(13, 'Sengketa SDA', '#0D9379', 'sengketa-sda.png'),
(14, 'Distribusi SDA', 'orange', 'sda.png'),
(15, 'Ideologi', '#30904E', 'ideologi.png'),
(16, 'Batas Wilayah', 'red', 'batas.png'),
(17, 'Sosial Budaya', '#932C0D', 'sosbud.png'),
(19, 'Politik', 'red', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_kabkota`
--

CREATE TABLE `m_kabkota` (
  `IDWIL` int(10) NOT NULL,
  `NMWIL` varchar(512) NOT NULL,
  `KORDKAB` varchar(1024) DEFAULT NULL,
  `ZOOMVK` varchar(512) DEFAULT NULL,
  `WARNAK` varchar(512) DEFAULT NULL,
  `FILEGJSON` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kabkota`
--

INSERT INTO `m_kabkota` (`IDWIL`, `NMWIL`, `KORDKAB`, `ZOOMVK`, `WARNAK`, `FILEGJSON`) VALUES
(5, 'Flores Timur', '-10.4904256,122.4295641', '7.4', 'black', 'flotim.geojson'),
(6, ' Alor', '930293029090', '9.8', 'red', 'alor.geojson'),
(7, 'Sabu Raijua', '-10.4904256,122.4295641', '7.4', '#E1DE16', 'sabu.geojson'),
(8, 'TTS', '-10.4904256,122.4295641', '7.4', '#636370', 'tts.geojson'),
(9, 'TTU', '-10.4904256,122.4295641', '7.4', '#74E954', 'ttu.geojson'),
(11, 'Sikka', '-10.4904256,122.4295641', '7.4', '#B400C6 ', 'sikka.geojson'),
(12, 'Nagekeo', '-10.4904256,122.4295641', '7.4', '#E1A416', 'nagekeo.geojson'),
(13, 'Manggarai', '-10.4904256,122.4295641', '7.4', '#26FFF8 ', 'manggarai.geojson'),
(14, 'Manggarai Timur', '-10.4904256,122.4295641', '7.4', '#0D9379', 'manggarai_timur.geojson'),
(17, 'Sumba Barat', '-10.4904256,122.4295641', '7.4', '#AD0909 ', 'sumba_barat.geojson'),
(18, 'Kabupaten Kupang', '-10.4904256,122.4295641', '7.4', '#932C0D', 'kupang_kab.geojson'),
(19, 'Kota Kupang', '-10.4904256,122.4295641', '7.4', '#F0FF00 ', 'kupang.geojson'),
(21, 'Sabu', '-10.4904256,122.4295641', '7.4', '#E1DE16', 'sabu.geojson'),
(22, 'Sumba Tengah', '-10.4904256,122.4295641', '7.4', '#4AB657', 'sumba_tengah.geojson'),
(23, 'Sumba Barat Daya', '-10.4904256,122.4295641', '7.4', '#17175D ', 'sumba_barat_daya.geojson'),
(24, 'Ngada', '-10.4904256,122.4295641', '7.4', '#FCFF26 ', 'ngada.geojson'),
(25, 'Ende', '-10.4904256,122.4295641', '7.4', '#30904E ', 'ende.geojson'),
(26, 'Belu', '-10.4904256,122.4295641', '7.4', 'blue', 'belu.geojson'),
(27, 'Lembata', '-10.4904256,122.4295641', '7.4', 'red', 'lembata.geojson'),
(33, '  Rote', '923019,90230', '7,9', 'red', NULL),
(65, '  Antonius laure', '923019,90230', '7,9', 'black', NULL),
(66, '  Antonius laure', '930293029090', '7,9', 'blue', NULL),
(67, ' Antonius', '930293029090', '7,9', 'blue', NULL),
(68, 'Anton', '923019,90230', '7,9', 'black', NULL),
(69, ' Antonius', '930293029090', '9.8', 'black', NULL),
(70, '  Antonius laure', '923019,90230', '9.8', 'black', NULL),
(71, '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_kecamatan`
--

CREATE TABLE `m_kecamatan` (
  `IDKEC` int(10) NOT NULL,
  `NMKEC` varchar(512) NOT NULL,
  `IDKAB` int(10) NOT NULL,
  `ZOOMVK` varchar(1024) DEFAULT NULL,
  `KORDKEC` varchar(1024) DEFAULT NULL,
  `WARNAKEC` varchar(1024) DEFAULT NULL,
  `GJSONKEC` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kecamatan`
--

INSERT INTO `m_kecamatan` (`IDKEC`, `NMKEC`, `IDKAB`, `ZOOMVK`, `KORDKEC`, `WARNAKEC`, `GJSONKEC`) VALUES
(2, 'Pantar Barat', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-pantar_barat.geojson'),
(4, 'Alor Timur Laut', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-alor_timur_laut.geojson'),
(5, 'Alor Timur ', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-alor_timur.geojson'),
(9, 'Pantar', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-pantar.geojson'),
(10, 'Alor Barat Daya', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-alor_barat_daya.geojson'),
(11, 'Alor Barat Laut', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-alor_barat_laut.geojson'),
(12, 'Alor Selatan', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-alor_selatan.geojson'),
(13, 'Alor Tengah Utara', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-alor_tengah_utara.geojson'),
(14, 'Kabola', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-kabola.geojson'),
(15, 'Lembur', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-lembur.geojson'),
(16, 'Mataru', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-mataru.geojson'),
(17, 'Pantar Timur', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-pantar_timur.geojson'),
(18, 'Pantar Tengah', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-pantar_tengah.geojson'),
(19, 'Pantar Barat Laut', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-pantar_barat_laut.geojson'),
(20, 'Pura', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-pulau_pura.geojson'),
(21, 'Pureman', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-pureman.geojson'),
(22, 'Teluk Mutiara', 6, '7.4', '-10.4904256,122.4295641', '#FA8800', 'alor-teluk_mutiara.geojson'),
(23, 'Lobalain', 4, '7.4', '-10.4904256,122.4295641', '#FA8800', 'rote_lobalain.geojson'),
(24, 'Rote Barat', 4, '7.4', '-10.4904256,122.4295641', 'orange', 'rote_rotebarat.geojson'),
(25, 'Rote Barat Daya', 4, '7.4', '-10.4904256,122.4295641', '#F74A13', 'rote_rotebaratdaya.geojson'),
(26, 'Rote Barat Laut', 4, '7.4', '-10.4904256,122.4295641', '#F74A13', 'rote_rotebaratlaut.geojson'),
(28, 'Rote Selatan', 4, '7.4', '-10.4904256,122.4295641', '#F74A13', 'rote_roteselatan.geojson'),
(29, 'Rote Tengah', 4, '7.4', '-10.4904256,122.4295641', '#F74A13', 'rote_rotetengah.geojson'),
(30, 'Rote Timur', 4, '7.4', '-10.4904256,122.4295641', '#F74A13', 'rote_rotetimur.geojson'),
(31, 'Hawu Mehare', 7, '7.4', '-10.4904256,122.4295641', '#F74A13', 'sabu_hawu mehare.geojson'),
(32, 'Sabu Raijua', 7, '7.4', '-10.4904256,122.4295641', '#F74A13', 'sabu_raijua.geojson'),
(33, 'Sabu Barat', 7, '7.4', '-10.4904256,122.4295641', '#F74A13', 'sabu_sabubarrat.geojson'),
(34, 'Sabu Liae', 7, '7.4', '-10.4904256,122.4295641', '#F74A13', 'sabu_sabuliae.geojson'),
(35, 'Sabu Tengah', 7, '7.4', '-10.4904256,122.4295641', '#F74A13', 'sabu_sabutengah.geojson'),
(36, 'Sabu Timur', 7, '7.4', '-10.4904256,122.4295641', '#F74A13', 'sabu_sabutimur.geojson'),
(37, 'Kota Waikabubak', 17, '7.4', '-10.4904256,122.4295641', '#F74A13', 'sumbabarat_kotawaikabubak.geojson'),
(38, 'Laboya Barat', 17, '7.4', '-10.4904256,122.4295641', '#F74A13', 'sumbabarat_laboyabarat.geojson'),
(39, 'Lamboya', 17, '7.4', '-10.4904256,122.4295641', '#F74A13', 'sumbabarat_lamboya.geojson'),
(40, 'Loli', 17, '7.4', '-10.4904256,122.4295641', '#F74A13', 'sumbabarat_loli.geojson'),
(85, 'Antonius Arnol Laure', 5, NULL, '-12930192,2093019', NULL, 'nagekeo.geojson');

-- --------------------------------------------------------

--
-- Table structure for table `m_parpol`
--

CREATE TABLE `m_parpol` (
  `IDPARPOL` int(11) NOT NULL,
  `NMPARPOL` varchar(1024) DEFAULT NULL,
  `LOGOPARPOL` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_parpol`
--

INSERT INTO `m_parpol` (`IDPARPOL`, `NMPARPOL`, `LOGOPARPOL`) VALUES
(2, 'Demokrat', 'it.png'),
(3, 'Partai PDI Perjuangan', 'du.png');

-- --------------------------------------------------------

--
-- Table structure for table `m_status`
--

CREATE TABLE `m_status` (
  `IDSTATUS` int(50) NOT NULL,
  `NMSTATUS` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_status`
--

INSERT INTO `m_status` (`IDSTATUS`, `NMSTATUS`) VALUES
(2, 'Rawan'),
(3, 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `m_tahun`
--

CREATE TABLE `m_tahun` (
  `IDTAHUN` int(11) NOT NULL,
  `NMTAHUN` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_tahun`
--

INSERT INTO `m_tahun` (`IDTAHUN`, `NMTAHUN`) VALUES
(1, ' 2017'),
(3, '2018'),
(4, '2019');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemilu`
--

CREATE TABLE `tb_pemilu` (
  `IDTRXPEMILU` bigint(20) NOT NULL,
  `IDTAHUN` int(11) NOT NULL,
  `IDKEC` int(11) NOT NULL,
  `IDPARTAI` int(11) NOT NULL,
  `TOTALSUARA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemilu`
--

INSERT INTO `tb_pemilu` (`IDTRXPEMILU`, `IDTAHUN`, `IDKEC`, `IDPARTAI`, `TOTALSUARA`) VALUES
(3, 3, 5, 2, 1240),
(4, 1, 5, 2, 123);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `IDUSER` int(11) NOT NULL,
  `NMUSER` varchar(512) DEFAULT NULL,
  `USERNAME` varchar(512) DEFAULT NULL,
  `PASSWORD` varchar(512) DEFAULT NULL,
  `LEVEL` varchar(512) DEFAULT NULL,
  `SESSION` varchar(512) DEFAULT NULL,
  `EMAIL` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_angket`
--

CREATE TABLE `tr_angket` (
  `IDTRXANGKET` int(30) NOT NULL,
  `IDBENTUK` int(10) DEFAULT NULL,
  `IDKEC` int(10) DEFAULT NULL,
  `NMANGKET` varchar(1024) DEFAULT NULL,
  `STATUS` varchar(256) DEFAULT NULL,
  `DESKRIPSI` longtext DEFAULT NULL,
  `TGLANGKET` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_angket`
--

INSERT INTO `tr_angket` (`IDTRXANGKET`, `IDBENTUK`, `IDKEC`, `NMANGKET`, `STATUS`, `DESKRIPSI`, `TGLANGKET`) VALUES
(14, 13, 12, 'Terjadi Hujan yang berlangsung terus menerus di 12 kecamtan, sampai pagi hari menyebabkan terjadinya banjirdan tanah longsor di beberapa titik', '2', 'antonius', '2020-03-03'),
(15, 7, 4, 'Masalah Perang Perbatasan', '2', NULL, '2020-02-07'),
(16, 14, 2, 'Terjadi Hujan yang berlangsung terus menerus di 12 kecamtan, sampai pagi hari menyebabkan terjadinya banjirdan tanah longsor di beberapa titik', '2', NULL, '2020-02-12'),
(17, 19, 17, 'Pemilu', '3', '', '2020-02-21'),
(18, 19, 32, 'Pemilu', '3', 'Pemilihan Bupati Sabu', '2020-02-11'),
(19, 9, 32, 'pemilihan umum', '3', '', '2020-02-10'),
(20, 17, 24, 'pemilihan umum', '3', '', '2020-02-20'),
(21, 19, 25, 'pemilihan umum', '3', '', '2020-02-29'),
(22, 19, 23, 'pemilihan umum', '3', '', '2020-02-19'),
(23, 19, 37, 'pemilihan umum', '3', '', '2020-02-19'),
(24, 19, 4, 'pemilihan umum', '3', '', '2020-02-11'),
(25, 19, 32, 'pemilihan umum', '3', 'sadsaaaaaaaaaaaaaaaaaa', '2020-02-07'),
(30, 7, 5, 'Perang', '2', 'Hanya Perang ', '2020-03-12'),
(31, 9, 5, 'Virus Corona Masuk Indonesia', 'Rawan', ' Virus Corona Masuk Indonesia', '2020-02-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_btkangket`
--
ALTER TABLE `m_btkangket`
  ADD PRIMARY KEY (`IDBENTUK`);

--
-- Indexes for table `m_kabkota`
--
ALTER TABLE `m_kabkota`
  ADD PRIMARY KEY (`IDWIL`);

--
-- Indexes for table `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  ADD PRIMARY KEY (`IDKEC`);

--
-- Indexes for table `m_parpol`
--
ALTER TABLE `m_parpol`
  ADD PRIMARY KEY (`IDPARPOL`);

--
-- Indexes for table `m_status`
--
ALTER TABLE `m_status`
  ADD PRIMARY KEY (`IDSTATUS`);

--
-- Indexes for table `m_tahun`
--
ALTER TABLE `m_tahun`
  ADD PRIMARY KEY (`IDTAHUN`);

--
-- Indexes for table `tb_pemilu`
--
ALTER TABLE `tb_pemilu`
  ADD PRIMARY KEY (`IDTRXPEMILU`,`IDTAHUN`,`IDKEC`,`IDPARTAI`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`IDUSER`);

--
-- Indexes for table `tr_angket`
--
ALTER TABLE `tr_angket`
  ADD PRIMARY KEY (`IDTRXANGKET`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_btkangket`
--
ALTER TABLE `m_btkangket`
  MODIFY `IDBENTUK` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `m_kabkota`
--
ALTER TABLE `m_kabkota`
  MODIFY `IDWIL` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  MODIFY `IDKEC` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `m_parpol`
--
ALTER TABLE `m_parpol`
  MODIFY `IDPARPOL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_status`
--
ALTER TABLE `m_status`
  MODIFY `IDSTATUS` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_tahun`
--
ALTER TABLE `m_tahun`
  MODIFY `IDTAHUN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pemilu`
--
ALTER TABLE `tb_pemilu`
  MODIFY `IDTRXPEMILU` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `IDUSER` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_angket`
--
ALTER TABLE `tr_angket`
  MODIFY `IDTRXANGKET` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
