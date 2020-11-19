-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2018 at 08:36 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkkapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_kk`
--

CREATE TABLE `m_kk` (
  `kk_id` int(11) NOT NULL,
  `kk_no` varchar(10) NOT NULL,
  `kk_asli` varchar(7) NOT NULL,
  `kk_daftar` date NOT NULL,
  `kk_sektor` enum('01','02','03','04','05','06','07','08','09','10','11','12') NOT NULL,
  `kk_nama` varchar(50) NOT NULL,
  `kk_alamat` text NOT NULL,
  `kk_telpon` varchar(15) NOT NULL,
  `kk_email` varchar(100) NOT NULL,
  `kk_jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `kk_hubungan` enum('Bapak','Ibu','Anak') NOT NULL,
  `kk_lahirtmp` varchar(20) NOT NULL,
  `kk_lahirtgl` date NOT NULL,
  `kk_baptis` date NOT NULL,
  `kk_sidi` date NOT NULL,
  `kk_nikah` date NOT NULL,
  `kk_pendidikan` varchar(50) NOT NULL,
  `kk_profesi` varchar(50) NOT NULL,
  `kk_ketrampilan` text NOT NULL,
  `kk_organisasi` text NOT NULL,
  `kk_ktp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kk`
--

INSERT INTO `m_kk` (`kk_id`, `kk_no`, `kk_asli`, `kk_daftar`, `kk_sektor`, `kk_nama`, `kk_alamat`, `kk_telpon`, `kk_email`, `kk_jk`, `kk_hubungan`, `kk_lahirtmp`, `kk_lahirtgl`, `kk_baptis`, `kk_sidi`, `kk_nikah`, `kk_pendidikan`, `kk_profesi`, `kk_ketrampilan`, `kk_organisasi`, `kk_ktp`) VALUES
(0, '010000101', '0100001', '2018-07-20', '01', 'LEO EMIR1', 'Grand Silah Residence C3, Jakarta Selatan', '08125674532', 'leo@gmail.com', 'Laki-Laki', 'Bapak', 'BANDA ACEH', '1977-07-22', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', 'b366bc55aec9c0b677775ef31c8767b3.png'),
(2, '010000102', '0100001', '2018-01-20', '01', 'LORENSUS', 'Grand Silah Residence C3, Jakarta Selatan', '08136784560', 'loren@gmail.com', 'Perempuan', 'Ibu', 'LHOKSEUMAWE', '1977-01-23', '1977-11-19', '1977-02-07', '1982-07-19', 'S1', 'Karyawan', '', '', 'e4fc7501b604ae95cc14a2cf04af47ab.png');

-- --------------------------------------------------------

--
-- Table structure for table `m_kota`
--

CREATE TABLE `m_kota` (
  `kota_id` int(11) NOT NULL,
  `kota_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kota`
--

INSERT INTO `m_kota` (`kota_id`, `kota_nama`) VALUES
(1, 'BANDA ACEH'),
(2, 'SABANG'),
(3, 'LHOKSEUMAWE'),
(4, 'LANGSA'),
(5, 'SUBULUSSALAM'),
(6, 'MEDAN'),
(7, 'PEMATANG SIANTAR'),
(8, 'SIBOLGA'),
(9, 'TANJUNG BALAI'),
(10, 'BINJAI'),
(11, 'TEBING TINGGI'),
(12, 'PADANGSIDIMPUAN'),
(13, 'GUNUNGSITOLI'),
(14, 'PADANG'),
(15, 'SOLOK'),
(16, 'SAWAHLUNTO'),
(17, 'PADANG PANJANG'),
(18, 'BUKITTINGGI'),
(19, 'PAYAKUMBUH'),
(20, 'PARIAMAN'),
(21, 'PEKANBARU'),
(22, 'DUMAI'),
(23, 'JAMBI'),
(24, 'SUNGAI PENUH'),
(25, 'PALEMBANG'),
(26, 'PAGAR ALAM'),
(27, 'LUBUK LINGGAU'),
(28, 'PRABUMULIH'),
(29, 'BENGKULU'),
(30, 'BANDAR LAMPUNG'),
(31, 'METRO'),
(32, 'PANGKAL PINANG'),
(33, 'BATAM'),
(34, 'TANJUNG PINANG'),
(35, 'JAKARTA PUSAT'),
(36, 'JAKARTA UTARA'),
(37, 'JAKARTA BARAT'),
(38, 'JAKARTA SELATAN'),
(39, 'JAKARTA TIMUR'),
(40, 'BOGOR'),
(41, 'SUKABUMI'),
(42, 'BANDUNG'),
(43, 'CIREBON'),
(44, 'BEKASI'),
(45, 'DEPOK'),
(46, 'CIMAHI'),
(47, 'TASIKMALAYA'),
(48, 'BANJAR'),
(49, 'MAGELANG'),
(50, 'SURAKARTA'),
(51, 'SALATIGA'),
(52, 'SEMARANG'),
(53, 'PEKALONGAN'),
(54, 'TEGAL'),
(55, 'YOGYAKARTA'),
(56, 'KEDIRI'),
(57, 'BLITAR'),
(58, 'MALANG'),
(59, 'PROBOLINGGO'),
(60, 'PASURUAN'),
(61, 'MOJOKERTO'),
(62, 'MADIUN'),
(63, 'SURABAYA'),
(64, 'BATU'),
(65, 'TANGERANG'),
(66, 'CILEGON'),
(67, 'SERANG'),
(68, 'TANGERANG SELATAN'),
(69, 'DENPASAR'),
(70, 'MATARAM'),
(71, 'BIMA'),
(72, 'KUPANG'),
(73, 'PONTIANAK'),
(74, 'SINGKAWANG'),
(75, 'PALANGKARAYA'),
(76, 'BANJARMASIN'),
(77, 'BANJARBARU'),
(78, 'BALIKPAPAN'),
(79, 'SAMARINDA'),
(80, 'BONTANG'),
(81, 'TARAKAN'),
(82, 'MANADO'),
(83, 'BITUNG'),
(84, 'TOMOHON'),
(85, 'KOTAMOBAGU'),
(86, 'PALU'),
(87, 'MAKASSAR'),
(88, 'PARE PARE'),
(89, 'PALOPO'),
(90, 'KENDARI'),
(91, 'BAU BAU'),
(92, 'GORONTALO'),
(93, 'AMBON'),
(94, 'TUAL'),
(95, 'TERNATE'),
(96, 'TIDORE KEPULAUAN'),
(97, 'JAYAPURA'),
(98, 'SORONG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_kk`
--
ALTER TABLE `m_kk`
  ADD PRIMARY KEY (`kk_id`);

--
-- Indexes for table `m_kota`
--
ALTER TABLE `m_kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_kk`
--
ALTER TABLE `m_kk`
  MODIFY `kk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `m_kota`
--
ALTER TABLE `m_kota`
  MODIFY `kota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
