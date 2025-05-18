-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 07:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konter`
--

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `tb_user_id` int(11) NOT NULL,
  `tb_konter_id` int(11) NOT NULL,
  `tanggal_pinjam` date DEFAULT curdate(),
  `status` enum('Dipinjam','Dikembalikan') NOT NULL DEFAULT 'Dikembalikan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `tb_user_id`, `tb_konter_id`, `tanggal_pinjam`, `status`) VALUES
(26, 0, 1, '2025-05-18', 'Dipinjam'),
(27, 0, 2, '2025-05-18', 'Dipinjam'),
(28, 0, 1, '2025-05-18', 'Dipinjam'),
(29, 0, 1, '2025-05-18', 'Dipinjam'),
(30, 0, 1, '2025-05-18', 'Dipinjam'),
(31, 3, 1, '2025-05-18', 'Dipinjam'),
(32, 3, 1, '2025-05-19', 'Dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konter`
--

CREATE TABLE `tb_konter` (
  `id` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `warna` varchar(30) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `status` enum('Tersedia','Dipinjam') DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_konter`
--

INSERT INTO `tb_konter` (`id`, `nama`, `warna`, `deskripsi`, `harga`, `status`) VALUES
(1, 'ODDO', 'Hitam', 'Ini adalah HP Terbaru', '4.500.000', 'Tersedia'),
(2, 'Vovi V23', 'Merah', 'deskripsi ', '300000', 'Tersedia'),
(3, 'ODDO', 'Hitam', '                                deskripsi  ', '2.000.000', 'Tersedia'),
(4, 'baru', 'Pink', 'adadaadad', '2.000.000', 'Tersedia'),
(5, 'Sumsang', 'orange', 'ini deskripsi', '25.000.000', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `email`, `password`, `level`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$0IYybBp7NA2zZsi8tR8bjeeh8KHiZCvGzT3a9XTt3bF9TL/1zOmge', 'admin'),
(2, 'example', 'ex', 'ex@gmail.com', '$2y$10$WYgosULfFSTdOn4EJcMG7e8QTN.Dr6kQ7BUUYQsoY74R36BWIo/Pi', 'user'),
(3, 'Kaka', 'kaka', 'kaka@gmail.com', '$2y$10$aa7C5o8ibKagCFMh8dEnkuOlqXgKwP2rcqtVFKk57FXcwwFtB1j/q', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_konter`
--
ALTER TABLE `tb_konter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_konter`
--
ALTER TABLE `tb_konter`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
