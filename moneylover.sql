-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 01:44 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneylover`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(32) NOT NULL,
  `nama_item` varchar(100) NOT NULL,
  `kuantitas` int(32) NOT NULL,
  `harga` int(100) NOT NULL,
  `id_record` int(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `nama_item`, `kuantitas`, `harga`, `id_record`, `created_at`, `updated_at`) VALUES
(1, 'Sabun Lifebuoy', 3, 2000, 1, '2017-11-21 00:49:59', '2017-11-21 00:49:59'),
(2, 'Pepsodent', 3, 2500, 1, '2017-11-21 00:49:59', '2017-11-21 00:49:59'),
(3, 'Shampoo', 2, 2000, 1, '2017-11-21 00:49:59', '2017-11-21 00:49:59'),
(4, 'Chiki', 2, 3000, 1, '2017-11-21 00:49:59', '2017-11-21 00:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(32) NOT NULL,
  `judul_transaksi` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `id_user` int(32) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tempat_pembelian` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `judul_transaksi`, `category`, `jumlah`, `id_user`, `foto`, `tempat_pembelian`, `created_at`, `updated_at`) VALUES
(1, 'Belanja Bulanan', 'Kebutuhan sehari - hari', 3500000, 1, 'assets/app/expense/belanja-bu2.jpeg', 'Sakinah', '2017-11-21 00:49:59', '2017-11-21 00:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(32) NOT NULL,
  `judul_transaksi` varchar(100) NOT NULL,
  `jumlah` int(32) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `judul_transaksi`, `jumlah`, `id_user`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Gajian', 35000000, 1, 'assets/app/income/gajian2.jpeg', '2017-11-20 21:39:01', '2017-11-20 21:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(32) NOT NULL,
  `judul_transaksi` varchar(100) NOT NULL,
  `type` varchar(2) NOT NULL,
  `category` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `id_user` int(32) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `judul_transaksi`, `type`, `category`, `jumlah`, `id_user`, `foto`, `tempat`, `created_at`, `updated_at`) VALUES
(1, 'Belanja Bulanan', '-', 'Kebutuhan sehari - hari', 3500000, 1, 'assets/app/expense/belanja-bu2.jpeg', 'Sakinah', '2017-11-21 00:49:59', '2017-11-21 00:49:59'),
(2, 'Gajian', '+', '', 3500000, 1, 'assets/app/income/gajian2.jpeg', '', '2017-11-22 00:49:59', '2017-11-22 00:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `kunci` varbinary(32) NOT NULL,
  `IV` varbinary(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `kunci`, `IV`, `created_at`, `updated_at`) VALUES
(1, 'a', 'a', 0x61, 0x61, '2017-11-22 04:57:16', '2017-11-22 04:57:16'),
(2, 'Hamka', '202cb962ac59075b964b07152d234b70', 0x746573, 0x8d20493862216af0e5108b15ab765da2f02904eb006f6914717854539111a405, '2017-11-22 05:11:11', '2017-11-22 05:11:11'),
(3, 'dimas', '202cb962ac59075b964b07152d234b70', 0x941efbe5e8d2ef8738fd324bf8694286821b0a168993e6b39b20cc7cd1f807d6, 0xfa7537c0ff51a38ed37286a4d61d72a3768c95eb17179f730c45f516f7dc7067, '2017-11-22 05:15:01', '2017-11-22 05:15:01'),
(4, 'Pentol', '202cb962ac59075b964b07152d234b70', 0x1cfcf4515661ca65bd388c4bdbe08ef6e691fa6d1962a5aac62af5b702458969, 0xe63710e710eaf68203ea89955ab549db6037287ce04119e59b33649955463adf, '2017-11-22 05:24:55', '2017-11-22 05:24:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
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
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
