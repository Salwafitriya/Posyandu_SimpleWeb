-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 01:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_balita`
--

CREATE TABLE `data_balita` (
  `NIK_balita` int(16) NOT NULL,
  `nama_balita` varchar(100) NOT NULL,
  `jenis_kelamin` enum('P','L') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `alamat_balita` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_balita`
--

INSERT INTO `data_balita` (`NIK_balita`, `nama_balita`, `jenis_kelamin`, `tanggal_lahir`, `nama_ibu`, `alamat_balita`) VALUES
(12356789, 'Awa', 'L', '2023-12-01', 'Ana', 'Mijen'),
(53322125, 'Musa', 'L', '2023-03-21', 'Lia', 'Bandungsari RT 7/VII'),
(55533221, 'Naura', 'P', '2020-03-06', 'Ana', 'Mijen'),
(135791113, 'Salwa', 'P', '2023-12-07', 'Sholeha', 'Gajah Mungkur'),
(202011025, 'Keeho', 'L', '2020-11-25', 'Gyuri', 'Jl Pantai Selatan'),
(211133355, 'Niki Zefa', 'P', '2021-01-16', 'Mira', 'Tambangan');

-- --------------------------------------------------------

--
-- Table structure for table `data_bumil`
--

CREATE TABLE `data_bumil` (
  `NIK_bumil` int(11) NOT NULL,
  `nama_bumil` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_suami` varchar(100) NOT NULL,
  `HPHT` date NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_bumil`
--

INSERT INTO `data_bumil` (`NIK_bumil`, `nama_bumil`, `tanggal_lahir`, `nama_suami`, `HPHT`, `alamat`) VALUES
(622335566, 'Bilkis', '2023-12-09', 'Jeongwoo', '2023-12-02', 'Peterongan'),
(661122338, 'Karini', '1994-02-16', 'Heedo', '2023-12-01', 'Jrakah Timur'),
(735678911, 'Sri', '1990-01-01', 'Joko', '2023-08-01', 'Ngaliyan'),
(778822331, 'Winter', '1988-11-16', 'Jay', '2023-03-01', 'Nglimut Barat'),
(876533219, 'Wendy', '1995-02-16', 'Hyungwon', '2023-08-17', 'Jl Medan Merdeka'),
(987654321, 'Suwarni', '2023-12-21', 'Suno', '2023-09-07', 'Nggabu Timur RT 03 RW 11');

-- --------------------------------------------------------

--
-- Table structure for table `data_vitamin`
--

CREATE TABLE `data_vitamin` (
  `vitamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id` int(11) NOT NULL,
  `kode_jk` varchar(11) NOT NULL,
  `keterangan_jk` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id`, `kode_jk`, `keterangan_jk`) VALUES
(1, 'P', 'Perempuan'),
(2, 'L', 'Laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan_bumil`
--

CREATE TABLE `pelayanan_bumil` (
  `NIK_bumil` int(10) NOT NULL,
  `nama_bumil` text NOT NULL,
  `tanggal_cekbumil` date NOT NULL,
  `berat_bumil` int(200) NOT NULL,
  `lingkar_perut` int(100) NOT NULL,
  `usia_hamil` varchar(1000) NOT NULL,
  `keluhan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelayanan_bumil`
--

INSERT INTO `pelayanan_bumil` (`NIK_bumil`, `nama_bumil`, `tanggal_cekbumil`, `berat_bumil`, `lingkar_perut`, `usia_hamil`, `keluhan`) VALUES
(735678911, 'Sri', '2024-02-08', 60, 55, '9', 'mual'),
(876533219, 'Wendy', '2023-12-08', 70, 66, '7', 'mual'),
(987654321, 'Suwarni', '2023-12-21', 70, 58, '3', 'tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `penimbangan_balita`
--

CREATE TABLE `penimbangan_balita` (
  `NIK_balita` int(10) NOT NULL,
  `nama_balita` text NOT NULL,
  `tanggal_timbang` date NOT NULL,
  `tinggi_badan` int(200) NOT NULL,
  `berat_badan` int(200) NOT NULL,
  `usia` int(11) NOT NULL,
  `vitamin` varchar(30) NOT NULL,
  `imunisasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penimbangan_balita`
--

INSERT INTO `penimbangan_balita` (`NIK_balita`, `nama_balita`, `tanggal_timbang`, `tinggi_badan`, `berat_badan`, `usia`, `vitamin`, `imunisasi`) VALUES
(12356789, 'Awa', '2023-12-23', 100, 20, 3, 'A', 'BCG'),
(53322125, 'Musa', '2023-12-21', 130, 30, 5, 'A', '-'),
(55533221, 'Naura', '2023-12-15', 50, 20, 3, 'A', '-'),
(135791113, 'Salwa', '0000-00-00', 0, 0, 0, '', ''),
(202011025, 'Keeho', '2023-12-02', 120, 30, 5, 'C', 'Cacar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses_id` int(11) NOT NULL,
  `data_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `akses_id`, `data_user_id`) VALUES
(1, 'kader_salwa', 'kader123', 1, 0),
(2, 'ibu_balita', 'ibu123', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_balita`
--
ALTER TABLE `data_balita`
  ADD PRIMARY KEY (`NIK_balita`);

--
-- Indexes for table `data_bumil`
--
ALTER TABLE `data_bumil`
  ADD PRIMARY KEY (`NIK_bumil`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelayanan_bumil`
--
ALTER TABLE `pelayanan_bumil`
  ADD PRIMARY KEY (`NIK_bumil`);

--
-- Indexes for table `penimbangan_balita`
--
ALTER TABLE `penimbangan_balita`
  ADD PRIMARY KEY (`NIK_balita`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_balita`
--
ALTER TABLE `data_balita`
  MODIFY `NIK_balita` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelayanan_bumil`
--
ALTER TABLE `pelayanan_bumil`
  MODIFY `NIK_bumil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=987654322;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
