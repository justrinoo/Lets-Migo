-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2021 at 07:39 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lets-migo`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `no_telp` int(16) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `kode_pos` int(7) NOT NULL,
  `jenis_pengiriman` enum('Instant','Medium','Premium') NOT NULL,
  `jenis_pembayaran` enum('COD','Gopay','Ovo') NOT NULL,
  `status` enum('pending','accept','reject') NOT NULL,
  `waktu_belanja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `nama_pembeli`, `no_telp`, `nama_kota`, `alamat`, `kode_pos`, `jenis_pengiriman`, `jenis_pembayaran`, `status`, `waktu_belanja`) VALUES
(11, 'Rino', 84882334, 'Aceh', '989  Dancing Dove Lane', 11260, 'Medium', 'Gopay', 'accept', '2021-04-09 02:43:51'),
(13, 'Mikasa', 84882334, 'Bali', 'Jakarta Barat', 11260, 'Medium', 'Gopay', 'reject', '2021-04-08 19:04:03'),
(14, 'Levi', 84882334, 'Bandung', 'New york city', 11260, 'Medium', 'Gopay', 'pending', '2021-04-09 03:04:12'),
(15, 'Armin', 84882334, 'Bandung', 'Seoul Korea', 11260, 'Premium', 'Gopay', 'reject', '2021-04-09 03:04:34'),
(16, 'Connie', 827367267, 'Aceh', 'Jl Shingasina Tembok Maria', 11260, 'Premium', 'Gopay', 'accept', '2021-04-09 04:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_migo` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` int(200) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `stock` int(200) NOT NULL,
  `deskripsi` char(200) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_migo`, `nama`, `harga`, `gambar`, `stock`, `deskripsi`, `createdAt`) VALUES
(22, 'Sepeda Listrik Volta 101 - Putih', 3980000, '6065affe8da71.jpg', 4, 'Kondisi: Baru\r\nBerat: 55.000 Gram\r\nKategori: Sepeda Listrik\r\nEtalase: Volta Series 1', '0000-00-00 00:00:00'),
(27, 'Btwin sepeda anak monster truck 16inch untuk anak 4-6tahun 85590132', 2750000, '606d29abad6e2.jpg', 10, 'Frame rendah membuat anak Anda mudah naik dan turun.', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_telp` varchar(200) NOT NULL,
  `level` enum('penjual','pembeli') NOT NULL,
  `umur` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `no_telp`, `level`, `umur`) VALUES
(10, 'rino', '$2y$10$/Q03SwoqpZ4BtVDl6SZNd.5NqNYrXecxWXQSQynKQgeOYbWsj7q0O', 'rino@mail.com', '0857294828400', 'pembeli', 15),
(11, 'riyaraa', '$2y$10$kEM9oHThIIptUS6eX4rbJODMJ3Z3Bbl7O92nmuOwgJBgmSMH1EFoy', 'riyaraa@mail.com', '09878372642', 'penjual', 16),
(13, 'mikasa', '$2y$10$spaR1C6AQpicdihAQS8MMetr4KQ0NhdcHGU.qcElXszPJpMG2QhRi', 'mikasa@mail.com', '09878372642', 'penjual', 15),
(14, 'armin', '$2y$10$zSeP87nKpCk3bAqLlO2Kf.JYxaV9znQuiax5plR2rWs6tB9TUS8BC', 'armin@mail.com', '0857294828400', 'pembeli', 16),
(15, 'connie', '$2y$10$bbe2OsVGcVAfdYVKdktFoOCFNX6w1wOxIbmDI2Yycur.mJaYZcaLm', 'connie@mail.com', '0827367267', 'pembeli', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_migo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_migo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
