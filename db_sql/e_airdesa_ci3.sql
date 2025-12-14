-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2025 at 11:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_airdesa_ci3`
--

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `nama`, `email`, `pesan`, `tanggal`) VALUES
(6, 'Fahrul Adib', 'fahruladib9@gmail.com', 'test', '2025-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Belum Dibaca',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `user_id`, `judul`, `pesan`, `link`, `status`, `created_at`) VALUES
(3, 1, 'Tagihan Baru Ditambahkan', 'Tagihan pelanggan Surapto telah dibuat oleh Ahmad.', 'http://localhost/e-airdesa-ci3/panel/tagihandetail/3', 'Dibaca', '2025-12-04 17:04:55'),
(4, 2, 'Update Status Tagihan', 'Status tagihan untuk pelanggan ID 1 telah diubah menjadi \'Lunas\'.', 'http://localhost/e-airdesa-ci3/panel/tagihandetail/2', 'Dibaca', '2025-12-04 11:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nometer` varchar(255) NOT NULL,
  `jeniskelamin` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `nometer`, `jeniskelamin`, `lat`, `lng`) VALUES
(1, 'Fahrul Adib', 'Palembang', '321321323', 'Laki-laki', '-2.987108', '104.763265'),
(2, 'Surapto', 'Palembang', '213213', 'Laki-laki', '-3.005551', '104.755569'),
(3, 'Suroso', 'Palembang', '23123213', 'Laki-laki', '-3.021350', '104.788070');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `jumlah_meter_awal` varchar(255) NOT NULL,
  `jumlah_meter_akhir` varchar(255) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `buktibayar` text DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id`, `pelanggan_id`, `petugas_id`, `jumlah_meter_awal`, `jumlah_meter_akhir`, `periode`, `total`, `status`, `buktibayar`, `created_at`) VALUES
(2, 1, 2, '123123', '21312123', '2025-12', '21131221321', 'Lunas', NULL, '2025-12-04 06:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Tidak Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `status`) VALUES
(1, 'Administrator', 'admin@gmail.com', '$2y$10$X7DVWBYa0dHj9dwEdbDWD.m6xY5e5OrsHfWCbA.FmmhVZktUWGAq6', 'Admin', 'Aktif'),
(2, 'Sudendev', 'sudendev@gmail.com', '$2y$10$CDvrGOMZvNATcOPh4cZLSuU98.qopYyQLnnm/eTEMh4oCT92b8ake', 'Petugas', 'Aktif'),
(4, 'Ahmad', 'ahmad@gmail.com', '$2y$10$Nv1mbdyqjxUBn9cYSF2Lx.ZmauMh4bEax2/jFtVJx14ZeWjyDzXSC', 'Petugas', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
