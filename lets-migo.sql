-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2021 at 06:10 AM
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
  `alamat` varchar(250) NOT NULL,
  `pengiriman` set('instan','medium','premium') NOT NULL,
  `pembayaran` enum('COD','Alfamart','Indomart') NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `alamat`, `pengiriman`, `pembayaran`, `createdAt`) VALUES
(7, 'Krendang Selatan 1', 'instan', 'Alfamart', '0000-00-00 00:00:00'),
(8, 'Krendang Selatan 1', 'medium', 'Alfamart', '0000-00-00 00:00:00'),
(9, 'Krendang Selatan 1', 'medium', 'Alfamart', '0000-00-00 00:00:00'),
(10, 'Krendang Selatan 1', 'medium', 'Alfamart', '0000-00-00 00:00:00'),
(11, 'Krendang Selatan 1', 'medium', 'Alfamart', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_migo` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `harga` int(200) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `stock` int(200) NOT NULL,
  `deskripsi` char(200) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_migo`, `nama`, `id_penjual`, `harga`, `gambar`, `stock`, `deskripsi`, `createdAt`) VALUES
(22, 'Sepeda Listrik Volta 101 - Putih', 0, 3980000, '6065affe8da71.jpg', 4, 'Kondisi: Baru\r\nBerat: 55.000 Gram\r\nKategori: Sepeda Listrik\r\nEtalase: Volta Series 1', '0000-00-00 00:00:00'),
(25, 'Jual FIIDO M1 ELECTRICK FOLDING BIKE / Sepeda Lipat Listrik 12.5 Ah', 0, 11990000, '60669d0883f4d.jpg', 2, 'Kondisi: Baru\r\nBerat: 1.000 Gram\r\nKategori: Sepeda Listrik\r\nEtalase: Sepeda Scooter Listrik\r\n', '0000-00-00 00:00:00'),
(26, 'LANKELEISI G660 Sepeda Listrik Lipat Luxury Edition 48V 10.4AH - Black Grey', 0, 8190000, '60669d5e0bf61.jpg', 1, 'Sepeda lipat dari Lankeleisi ini punya teknologi yang unik ketimbang yang ada di pasaran Sepeda ini membuat Anda tetap mendapatkan manfaat kebugaran dari olahraga bersepeda.', '0000-00-00 00:00:00');

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
(14, 'armin', '$2y$10$zSeP87nKpCk3bAqLlO2Kf.JYxaV9znQuiax5plR2rWs6tB9TUS8BC', 'armin@mail.com', '0857294828400', 'pembeli', 16);

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
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_migo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
