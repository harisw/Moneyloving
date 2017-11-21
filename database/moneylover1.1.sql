-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.28-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk moneylover
DROP DATABASE IF EXISTS `moneylover`;
CREATE DATABASE IF NOT EXISTS `moneylover` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `moneylover`;

-- membuang struktur untuk table moneylover.details
DROP TABLE IF EXISTS `details`;
CREATE TABLE IF NOT EXISTS `details` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `nama_item` varchar(100) NOT NULL,
  `kuantitas` int(32) NOT NULL,
  `harga` int(100) NOT NULL,
  `id_expense` int(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel moneylover.details: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `details` DISABLE KEYS */;
INSERT INTO `details` (`id`, `nama_item`, `kuantitas`, `harga`, `id_expense`, `created_at`, `updated_at`) VALUES
	(1, 'Sabun Lifebuoy', 3, 2000, 1, '2017-11-21 07:49:59', '2017-11-21 07:49:59'),
	(2, 'Pepsodent', 3, 2500, 1, '2017-11-21 07:49:59', '2017-11-21 07:49:59'),
	(3, 'Shampoo', 2, 2000, 1, '2017-11-21 07:49:59', '2017-11-21 07:49:59'),
	(4, 'Chiki', 2, 3000, 1, '2017-11-21 07:49:59', '2017-11-21 07:49:59');
/*!40000 ALTER TABLE `details` ENABLE KEYS */;

-- membuang struktur untuk table moneylover.expenses
DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `judul_transaksi` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `id_user` int(32) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tempat_pembelian` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel moneylover.expenses: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` (`id`, `judul_transaksi`, `category`, `jumlah`, `id_user`, `foto`, `tempat_pembelian`, `created_at`, `updated_at`) VALUES
	(1, 'Belanja Bulanan', 'Kebutuhan sehari - hari', 3500000, 1, 'assets/app/expense/belanja-bu2.jpeg', 'Sakinah', '2017-11-21 07:49:59', '2017-11-21 07:49:59');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;

-- membuang struktur untuk table moneylover.incomes
DROP TABLE IF EXISTS `incomes`;
CREATE TABLE IF NOT EXISTS `incomes` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `judul_transaksi` varchar(100) NOT NULL,
  `jumlah` int(32) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel moneylover.incomes: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `incomes` DISABLE KEYS */;
INSERT INTO `incomes` (`id`, `judul_transaksi`, `jumlah`, `id_user`, `foto`, `created_at`, `updated_at`) VALUES
	(1, 'Gajian', 35000000, 1, 'assets/app/income/gajian2.jpeg', '2017-11-21 04:39:01', '2017-11-21 04:39:01');
/*!40000 ALTER TABLE `incomes` ENABLE KEYS */;

-- membuang struktur untuk table moneylover.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel moneylover.users: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
