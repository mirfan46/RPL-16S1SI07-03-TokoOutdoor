-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 08:06 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokooutdoordb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `KD_Barang` char(5) NOT NULL,
  `Nama_Barang` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Tanggal_Beli` date DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_jual`
--

CREATE TABLE `detail_jual` (
  `ID_Detail_Penjualan` char(5) NOT NULL,
  `Harga_Jual` int(11) DEFAULT NULL,
  `KD_Barang` char(5) NOT NULL,
  `KD_Penjualan` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengembalian`
--

CREATE TABLE `detail_pengembalian` (
  `ID_Detail_Pengembalian` char(5) NOT NULL,
  `Denda` int(11) DEFAULT NULL,
  `KD_Barang` char(5) NOT NULL,
  `KD_Pengembalian` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penyewaan`
--

CREATE TABLE `detail_penyewaan` (
  `ID_Detail_Penyewaan` char(5) NOT NULL,
  `Harga_Sewa` int(11) DEFAULT NULL,
  `KD_Barang` char(5) NOT NULL,
  `KD_Penyewaan` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `ID_Konsumen` char(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `No_Telephone` varchar(12) DEFAULT NULL,
  `Alamat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `KD_Pengembalian` char(5) NOT NULL,
  `Tanggal_Kembali` date DEFAULT NULL,
  `ID_Konsumen` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `KD_Penjualan` char(5) NOT NULL,
  `Total` int(11) DEFAULT NULL,
  `Tanggal_Penjualan` date NOT NULL,
  `ID_Konsumen` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `KD_Penyewaan` char(5) NOT NULL,
  `Diskon` int(11) DEFAULT NULL,
  `Tanggal_Penyewaan` date NOT NULL,
  `Tanggal_Pengembalian` date NOT NULL,
  `ID_Konsumen` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`KD_Barang`);

--
-- Indexes for table `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD PRIMARY KEY (`ID_Detail_Penjualan`),
  ADD KEY `ForgnkeyKDBARANG` (`KD_Barang`),
  ADD KEY `ForgnkeyKDPENJUALAN` (`KD_Penjualan`);

--
-- Indexes for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD PRIMARY KEY (`ID_Detail_Pengembalian`),
  ADD KEY `ForgnkeyKDPENGEMBALIAN` (`KD_Pengembalian`),
  ADD KEY `Forgnkey` (`KD_Barang`);

--
-- Indexes for table `detail_penyewaan`
--
ALTER TABLE `detail_penyewaan`
  ADD PRIMARY KEY (`ID_Detail_Penyewaan`),
  ADD KEY `ForgnkeyKD_Barang` (`KD_Barang`),
  ADD KEY `ForegnkeyKDPENYEWAAN` (`KD_Penyewaan`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`ID_Konsumen`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`KD_Pengembalian`),
  ADD KEY `ForgnkeyIDKONSUMEN` (`ID_Konsumen`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`KD_Penjualan`),
  ADD KEY `Forgnkey` (`ID_Konsumen`) USING BTREE;

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`KD_Penyewaan`),
  ADD KEY `ForegnkeyIDKONSUMEN` (`ID_Konsumen`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD CONSTRAINT `ForgnkeyKDBARANG` FOREIGN KEY (`KD_Barang`) REFERENCES `barang` (`KD_Barang`),
  ADD CONSTRAINT `ForgnkeyKDPENJUALAN` FOREIGN KEY (`KD_Penjualan`) REFERENCES `penjualan` (`KD_Penjualan`);

--
-- Constraints for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD CONSTRAINT `Forgnkey` FOREIGN KEY (`KD_Barang`) REFERENCES `barang` (`KD_Barang`),
  ADD CONSTRAINT `ForgnkeyKDPENGEMBALIAN` FOREIGN KEY (`KD_Pengembalian`) REFERENCES `pengembalian` (`KD_Pengembalian`);

--
-- Constraints for table `detail_penyewaan`
--
ALTER TABLE `detail_penyewaan`
  ADD CONSTRAINT `ForegnkeyKDPENYEWAAN` FOREIGN KEY (`KD_Penyewaan`) REFERENCES `penyewaan` (`KD_Penyewaan`),
  ADD CONSTRAINT `ForgnkeyKD_Barang` FOREIGN KEY (`KD_Barang`) REFERENCES `barang` (`KD_Barang`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `ForgnkeyIDKONSUMEN` FOREIGN KEY (`ID_Konsumen`) REFERENCES `konsumen` (`ID_Konsumen`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `ID_Konsumen` FOREIGN KEY (`ID_Konsumen`) REFERENCES `konsumen` (`ID_Konsumen`);

--
-- Constraints for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `ForegnkeyIDKONSUMEN` FOREIGN KEY (`ID_Konsumen`) REFERENCES `konsumen` (`ID_Konsumen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
