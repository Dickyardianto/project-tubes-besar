-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2019 at 01:09 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tubes_rekweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pesanan`
--

CREATE TABLE `data_pesanan` (
  `id_pesanan` int(10) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `nomor_telephone` varchar(20) NOT NULL,
  `jenis_pengiriman` varchar(50) NOT NULL,
  `jenis_pembayaran` varchar(50) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `pesanan` varchar(1000) NOT NULL,
  `total_pembayaran` int(50) NOT NULL,
  `bukti_pembayaran` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pesanan`
--

INSERT INTO `data_pesanan` (`id_pesanan`, `user`, `nama_pemesan`, `nomor_telephone`, `jenis_pengiriman`, `jenis_pembayaran`, `alamat`, `pesanan`, `total_pembayaran`, `bukti_pembayaran`) VALUES
(55, 'syahrulandripermana03@gmail.com', 'syahrul andri permana', '081344945825', 'COD', 'Transfer Bank', 'sdadwasd', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pesanan`
--
ALTER TABLE `data_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pesanan`
--
ALTER TABLE `data_pesanan`
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
