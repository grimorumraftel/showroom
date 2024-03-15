-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 03:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `showroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `stok` int(11) NOT NULL,
  `jenis_barang` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `stok`, `jenis_barang`) VALUES
(9, 'KB-0303231', 'Honda CRV', 181, ' SUV '),
(11, 'KS-04042311', 'Hino Dutro', 22, ' Truck ');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal_keluar` varchar(20) NOT NULL,
  `kode_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `tujuan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `id_transaksi`, `tanggal_keluar`, `kode_barang`, `nama_barang`, `jumlah_keluar`, `tujuan`) VALUES
(36, 'BK-210923073626', '2023-09-21', 'KB-0303231', 'Honda CRV', 2, 'bogor');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(11) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `kode_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `pengirim` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `id_transaksi`, `tanggal`, `kode_barang`, `nama_barang`, `pengirim`, `jumlah`, `satuan`) VALUES
(25, ' BM-2109230', '2023-09-21', 'KB-0303231', 'Honda CR-V', ' ABC Suzuki Bintaro', 30, ' Kilo');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_barang`

CREATE TABLE `tb_jenis_barang` (
  `id` int(11) NOT NULL,
  `jenis_barang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenis_barang`
--

INSERT INTO `tb_jenis_barang` (`id`, `jenis_barang`) VALUES
(3, 'SUV'),
(4, 'LCGC'),
(5, 'Truck');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan_barang`
--

CREATE TABLE `tb_satuan_barang` (
  `id` int(11) NOT NULL,
  `satuan_barang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_satuan_barang`
--

INSERT INTO `tb_satuan_barang` (`id`, `satuan_barang`) VALUES
(6, 'Container'),
(7, 'Unit'),
(8, 'Truck Double Deck');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suplier`
--

CREATE TABLE `tb_suplier` (
  `id_suplier` int(11) NOT NULL,
  `kode_suplier` varchar(11) NOT NULL,
  `nama_suplier` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_suplier`
--

INSERT INTO `tb_suplier` (`id_suplier`, `kode_suplier`, `nama_suplier`, `alamat`, `no_tlp`) VALUES
(9, 'DS-0303231', 'ABC Suzuki Bogor', 'Jl. Durian', '0876565767'),
(10, 'KS-04042310', 'XYZ Honda Bintaro ', 'Cibubur', '0876565767');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_create`) VALUES
(1, 'Admin123', 'Admin1@gmail.com', '3a16b48512666bb5ac3d678e5ef345e1.png', '$2y$10$R.H71g1HCzst2F/lEcYggeMkpUXPEZRCWHHI5IlmBa0S0CMRtVpZi', 1, 1, 1658847001),
(2, 'Admin2', 'Admin2@gmail.com', 'people-2388584_960_720.png', '$2y$10$.g4U4zTnu6/ROTXpvIF4MOCBcpIIy5CM.wWHJn6GQwYTBtnjIHbSK', 1, 1, 1626420108),
(7, 'Windah', 'windah@gmail.com', '09399ef81c71414c11552c94813aa6fb.png', '$2y$10$p1nY69LC0ZWJf72Eo6Di/eiMiw93rC5znfTAMgy.PnTJHaNY9AVKy', 1, 1, 1658845036),
(8, '123', '123@gmail.com', 'default.jpg', '$2y$10$R.H71g1HCzst2F/lEcYggeMkpUXPEZRCWHHI5IlmBa0S0CMRtVpZi', 2, 1, 1661858756),
(10, 'Udin', 'udin@gmail.com', 'default.jpg', '$2y$10$cAnLQs.OU2zCmfhPl5rLR.sODWZTo4lpu6c14F0KDVNfylv9j8dPy', 1, 1, 1677574880),
(11, 'akuAdmin1', 'aku@gmail.com', 'profile.jpg', '$2y$10$PGWX65n2PO33mqmVPhAjxesKUL0TYperTowVwb4AqFLg7XsBG0pQa', 2, 1, 1694519636);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenis_barang`
--
ALTER TABLE `tb_jenis_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_satuan_barang`
--
ALTER TABLE `tb_satuan_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_suplier`
--
ALTER TABLE `tb_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jenis_barang`
--
ALTER TABLE `tb_jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_satuan_barang`
--
ALTER TABLE `tb_satuan_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_suplier`
--
ALTER TABLE `tb_suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
