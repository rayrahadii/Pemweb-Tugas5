-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2019 at 12:29 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biodata`
--

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tanggal_lahir` varchar(128) NOT NULL,
  `berat` varchar(128) NOT NULL,
  `tinggi` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama`, `tanggal_lahir`, `berat`, `tinggi`, `alamat`) VALUES
(2, 'Rahadi Sasmita', '25 Desember 1999', '46 Kg', '165 Cm', 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `isi_biodata`
--

CREATE TABLE `isi_biodata` (
  `isi_id` int(11) NOT NULL,
  `isi_profile` varchar(256) NOT NULL,
  `hobby` varchar(128) NOT NULL,
  `sertifikat` varchar(128) NOT NULL,
  `sd` varchar(128) NOT NULL,
  `smp` varchar(128) NOT NULL,
  `sma` varchar(128) NOT NULL,
  `universitas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isi_biodata`
--

INSERT INTO `isi_biodata` (`isi_id`, `isi_profile`, `hobby`, `sertifikat`, `sd`, `smp`, `sma`, `universitas`) VALUES
(17, 'Test Profile Disini', 'Test Hobby Disini', 'Test Sertifikat Disini', 'SD 3 , 4 , 7 Singaraja', 'SMP N 2 Singaraja', 'SMA N 4 Singaraja', 'UPN Veteran Jawa Timur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `isi_biodata`
--
ALTER TABLE `isi_biodata`
  ADD PRIMARY KEY (`isi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `isi_biodata`
--
ALTER TABLE `isi_biodata`
  MODIFY `isi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
