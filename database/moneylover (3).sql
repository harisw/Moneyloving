-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Nov 2017 pada 03.33
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `details`
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
-- Dumping data untuk tabel `details`
--

INSERT INTO `details` (`id`, `nama_item`, `kuantitas`, `harga`, `id_record`, `created_at`, `updated_at`) VALUES
(1, 'Sabun Lifebuoy', 3, 2000, 1, '2017-11-21 00:49:59', '2017-11-21 00:49:59'),
(2, 'Pepsodent', 3, 2500, 1, '2017-11-21 00:49:59', '2017-11-21 00:49:59'),
(3, 'Shampoo', 2, 2000, 1, '2017-11-21 00:49:59', '2017-11-21 00:49:59'),
(4, 'Chiki', 2, 3000, 1, '2017-11-21 00:49:59', '2017-11-21 00:49:59'),
(5, 'asdas', 12, 1212, 2, '2017-11-27 07:53:48', '2017-11-27 07:53:48'),
(6, 'asda', 1, 111, 2, '2017-11-27 07:53:48', '2017-11-27 07:53:48'),
(7, 'asdas', 1, 111, 2, '2017-11-27 07:53:48', '2017-11-27 07:53:48'),
(8, 'Bandeng Presto', 2, 34000, 12, '2017-11-27 13:23:04', '2017-11-27 13:23:04'),
(9, 'Bandeng Segar', 1, 25000, 13, '2017-11-27 13:24:49', '2017-11-27 13:24:49'),
(10, 'Bandeng Presto', 1, 35000, 14, '2017-11-27 13:34:07', '2017-11-27 13:34:07'),
(11, 'Bandeng Bumbu', 2, 34000, 14, '2017-11-27 13:34:07', '2017-11-27 13:34:07'),
(12, 'Kertas Nota', 500, 50, 15, '2017-11-27 13:38:15', '2017-11-27 13:38:15'),
(13, 'Pulpen', 12, 1500, 15, '2017-11-27 13:38:15', '2017-11-27 13:38:15'),
(14, 'Bandeng Presto', 12, 35000, 16, '2017-11-27 13:40:53', '2017-11-27 13:40:53'),
(15, 'Otak-otak Bandeng', 6, 33000, 16, '2017-11-27 13:40:53', '2017-11-27 13:40:53'),
(16, 'Bandeng Presto', 12, 35000, 17, '2017-11-27 13:42:19', '2017-11-27 13:42:19'),
(17, 'Otak-otak Bandeng', 6, 33000, 17, '2017-11-27 13:42:19', '2017-11-27 13:42:19'),
(18, 'Bandeng Segar', 10, 25000, 18, '2017-11-27 13:43:33', '2017-11-27 13:43:33'),
(19, 'Otak-otak Bandeng', 3, 33000, 19, '2017-11-27 13:45:04', '2017-11-27 13:45:04'),
(20, 'Bandeng Segar', 2, 25000, 20, '2017-11-27 13:46:25', '2017-11-27 13:46:25'),
(21, 'Bumbu', 1, 10000, 20, '2017-11-27 13:46:25', '2017-11-27 13:46:25'),
(22, 'Bandeng Presto', 3, 35000, 21, '2017-11-27 13:49:30', '2017-11-27 13:49:30'),
(23, 'Otak-otak Bandeng', 2, 33000, 21, '2017-11-27 13:49:30', '2017-11-27 13:49:30'),
(24, 'Bandeng Segar', 3, 25000, 22, '2017-11-27 13:50:10', '2017-11-27 13:50:10'),
(25, 'Bandeng Segar', 3, 25000, 23, '2017-11-27 13:50:21', '2017-11-27 13:50:21'),
(26, 'Bandeng Presto', 12, 35000, 24, '2017-11-27 13:51:55', '2017-11-27 13:51:55'),
(27, 'Bandeng Segar', 6, 25000, 25, '2017-11-27 13:52:36', '2017-11-27 13:52:36'),
(28, 'Otak-otak Bandeng', 3, 33000, 27, '2017-11-27 13:54:03', '2017-11-27 13:54:03'),
(29, 'Bandeng Presto', 6, 35000, 27, '2017-11-27 13:54:03', '2017-11-27 13:54:03'),
(30, 'Bandeng Segar', 5, 25000, 28, '2017-11-27 13:55:53', '2017-11-27 13:55:53'),
(31, 'Kertas Nota', 500, 50, 28, '2017-11-27 13:55:53', '2017-11-27 13:55:53'),
(32, 'Pulpen', 12, 2000, 28, '2017-11-27 13:55:53', '2017-11-27 13:55:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `expenses`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `incomes`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `record`
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
  `tanggal` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `record`
--

INSERT INTO `record` (`id`, `judul_transaksi`, `type`, `category`, `jumlah`, `id_user`, `foto`, `tempat`, `tanggal`, `created_at`, `updated_at`) VALUES
(12, 'DDcq5C7kTDkW3WKUAvbCcvMoVX2okbqUphGdmK6RjP9kX3XHdACx3INIrZojuQza', '+', '', 68000, 5, '', 'KKhlshIfXajgTa/1OBZjj+JTZRigyMFzJ4M8OT3ljVI=', '2017-11-26 17:00:00', '2017-11-27 13:23:04', '2017-11-27 13:23:04'),
(13, '9rChCq6zvtxiRIMMI+Orvpa1pXqgT9VEIhZ+04e4gMKwOBrvyIjklZX3ZIJpj2y+', '-', '', 25000, 5, '', 'vxqV0pWXg4FDfbdTvev1GTQaol4n9ZiriuY6rOIKahg=', '2017-11-26 17:00:00', '2017-11-27 13:24:49', '2017-11-27 13:24:49'),
(14, 'DDcq5C7kTDkW3WKUAvbCcr/ZLxTsLQ8Fg2XXZuImPVfB66UlBU/diYcCvSUay/B0', '+', '', 103000, 5, '', 'KKhlshIfXajgTa/1OBZjj+JTZRigyMFzJ4M8OT3ljVI=', '2017-11-25 17:00:00', '2017-11-27 13:34:07', '2017-11-27 13:34:07'),
(15, 'WfvIubkf3p6mueSIdwaJ4O3xt2arrVFMOeGbe6Nr4NR2/bdJvlryqTel2CvbrgaI', '-', '', 43000, 5, '', 'LMC+WFpXBZa9YAgvNZrsR3ZSyxtEpiBx66f8fqHBnZI=', '2017-11-25 17:00:00', '2017-11-27 13:38:15', '2017-11-27 13:38:15'),
(17, 'DDcq5C7kTDkW3WKUAvbCcpmkryhPnnsHizOY8tW9hd9GY85kFS+ueXZd/EMkLzu9tO04LfWUbqvX77T2sECbwA==', '+', '', 618000, 5, '', 'KKhlshIfXajgTa/1OBZjj+JTZRigyMFzJ4M8OT3ljVI=', '2017-11-24 17:00:00', '2017-11-27 13:42:19', '2017-11-27 13:42:19'),
(18, '9rChCq6zvtxiRIMMI+Orvpa1pXqgT9VEIhZ+04e4gMKwOBrvyIjklZX3ZIJpj2y+', '-', '', 250000, 5, '', 'bp89ogR+x9dK1pBCMpYsAsSXj+bifntLie2toA5zwzU=', '2017-11-24 17:00:00', '2017-11-27 13:43:33', '2017-11-27 13:43:33'),
(19, 'hQO9XMgcsNIZAIcas737XvXBxHqE4nZkDszU1hiQXC5Q1AdeOX0ih6LPfcBAcYPe', '+', '', 99000, 5, '', 'KKhlshIfXajgTa/1OBZjj+JTZRigyMFzJ4M8OT3ljVI=', '2017-11-23 17:00:00', '2017-11-27 13:45:04', '2017-11-27 13:45:04'),
(20, '9rChCq6zvtxiRIMMI+Orvn+WpOecER7VGQNXJz0dZpey42Jt1fYjI0Gz9NZatKXz', '-', '', 60000, 5, '', 'vxqV0pWXg4FDfbdTvev1GTQaol4n9ZiriuY6rOIKahg=', '2017-11-23 17:00:00', '2017-11-27 13:46:25', '2017-11-27 13:46:25'),
(21, '2GqzWnmrljf7HvAc1D5TcGYqCdf5Q3xs3MelqMtdvYVU71pdI/LdG3EkqMSnwyGUSdZGJSN2HeAaP/8Gy8y89w==', '+', '', 171000, 3, '', 'CEMn3V6dB+qRX5PRKOnQJ3BRyaCgItP0f01bffbcuq0=', '2017-11-26 17:00:00', '2017-11-27 13:49:30', '2017-11-27 13:49:30'),
(23, 'ciK32QZKPoI/X8kFUlO7YeCvV36PP7R8KfaZ2Iyg1WwuAz0aI1aFY6TBlSqutL3b', '-', '', 75000, 3, '', 'Dp1w995eQxLNwA2d0zP7YcWpCUmAsV6r6NAmBplrL1M=', '2017-11-26 17:00:00', '2017-11-27 13:50:21', '2017-11-27 13:50:21'),
(24, '2GqzWnmrljf7HvAc1D5TcH7lZY/Qul6J9qsm1iv1t2H+8ct9uxCHMd344J8KiTYJ', '+', '', 420000, 3, '', 'CEMn3V6dB+qRX5PRKOnQJ3BRyaCgItP0f01bffbcuq0=', '2017-11-25 17:00:00', '2017-11-27 13:51:55', '2017-11-27 13:51:55'),
(25, 'ciK32QZKPoI/X8kFUlO7YeCvV36PP7R8KfaZ2Iyg1WwuAz0aI1aFY6TBlSqutL3b', '-', '', 150000, 3, '', 'Dp1w995eQxLNwA2d0zP7YcWpCUmAsV6r6NAmBplrL1M=', '2017-11-25 17:00:00', '2017-11-27 13:52:36', '2017-11-27 13:52:36'),
(27, 'vrydC7j3ZtzS+XonLglJTECxsmpsL/YMQKxib7bGM5N0umHFF5clWRJ1DjRPiTVQM7uupq14xJq2ybhLGBqkDQ==', '+', '', 309000, 3, '', 'CEMn3V6dB+qRX5PRKOnQJ3BRyaCgItP0f01bffbcuq0=', '2017-11-24 17:00:00', '2017-11-27 13:54:03', '2017-11-27 13:54:03'),
(28, 'ciK32QZKPoI/X8kFUlO7YQfiyqCLcSkCKgDi9ihIBoxTMde6zoeT/naNrCXY+05oxbUpuAvXLY87RBoW8kY/ZA==', '-', '', 174000, 3, '', 'AA0yu3ZHG1IjbEPv6LBVRwW5fvUfD+wpDKsFJW+DMXFD+DgngQcIDsrRKXZMtLue', '2017-11-24 17:00:00', '2017-11-27 13:55:53', '2017-11-27 13:55:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `kunci` varbinary(32) NOT NULL,
  `IV` varbinary(16) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `kunci`, `IV`, `created_at`, `updated_at`) VALUES
(3, 'dimas', '202cb962ac59075b964b07152d234b70', 0x941efbe5e8d2ef8738fd324bf8694286821b0a168993e6b39b20cc7cd1f807d6, 0xfa7537c0ff51a38ed37286a4d61d72a3, '2017-11-22 05:15:01', '2017-11-22 05:15:01'),
(5, 'bayu', 'e79257ead6d3c9e3037ab0189c8e7632', 0x76fc95723767667d711dae2fb817caf08ad736574d168a6ee1c78afecdcf7e90, 0x0e2254387e2eb2b0687e6945adcf0eab, '2017-11-27 12:43:17', '2017-11-27 12:43:17');

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
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
