-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2018 at 01:25 PM
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
-- Table structure for table `m_login`
--

CREATE TABLE `m_login` (
  `log_id` int(11) NOT NULL,
  `log_user` varchar(20) NOT NULL,
  `log_pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_login`
--

INSERT INTO `m_login` (`log_id`, `log_user`, `log_pass`) VALUES
(1, 'admin', '6bcf59cd4718e9c9e0aaf65d326af35daaac9b235bda310ddc2babacc0cad63ecdd3f610f365edeb222c01c2e54d254b013fc4c189b72f0b0ad56abc5ab4ba57liYfAvV2dUPNvqQBj0zToG7H2VWLiBiKNx/SBCdBWb0=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_login`
--
ALTER TABLE `m_login`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_login`
--
ALTER TABLE `m_login`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
