-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_eparkir
CREATE DATABASE IF NOT EXISTS `db_eparkir` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_eparkir`;

-- Dumping structure for table db_eparkir.kendaraan
CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id_kendaraan` int(10) NOT NULL AUTO_INCREMENT,
  `jenis_kendaraan` varchar(20) NOT NULL,
  `biaya` decimal(10,0) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kendaraan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eparkir.kendaraan: ~2 rows (approximately)
/*!40000 ALTER TABLE `kendaraan` DISABLE KEYS */;
INSERT INTO `kendaraan` (`id_kendaraan`, `jenis_kendaraan`, `biaya`) VALUES
	(1, 'Sepedah Motor', 2000),
	(2, 'Mobil', 3000);
/*!40000 ALTER TABLE `kendaraan` ENABLE KEYS */;

-- Dumping structure for table db_eparkir.parkir
CREATE TABLE IF NOT EXISTS `parkir` (
  `id_parkir` int(10) NOT NULL AUTO_INCREMENT,
  `id_kendaraan` int(10) NOT NULL,
  `plat_nomor` varchar(15) NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `barcode` char(20) DEFAULT NULL,
  `status` enum('Parkir','Selesai') NOT NULL,
  PRIMARY KEY (`id_parkir`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eparkir.parkir: ~12 rows (approximately)
/*!40000 ALTER TABLE `parkir` DISABLE KEYS */;
INSERT INTO `parkir` (`id_parkir`, `id_kendaraan`, `plat_nomor`, `jam_masuk`, `jam_keluar`, `tgl`, `barcode`, `status`) VALUES
	(1, 1, 'N9732AA', '14:50:40', '16:15:26', '2022-06-26', NULL, 'Parkir'),
	(2, 1, 'N4383AA', '16:38:46', '16:38:59', '2022-07-03', NULL, 'Parkir'),
	(3, 2, 'B8394OP', '16:40:08', NULL, '2022-07-02', NULL, 'Selesai'),
	(4, 2, 'N7839KK', '16:43:37', NULL, '2022-07-01', NULL, 'Parkir'),
	(5, 1, 'B1203UU', '16:44:37', NULL, '2022-07-04', NULL, 'Parkir'),
	(6, 1, 'Z1489PS', '19:51:00', NULL, '2022-07-05', NULL, 'Parkir'),
	(8, 1, 'N8732HA', '09:08:58', NULL, '2022-07-06', NULL, 'Parkir'),
	(13, 1, 'M9090KK', '16:56:33', NULL, '2022-07-13', NULL, 'Parkir'),
	(14, 2, 'N7654', '17:07:34', NULL, '2022-07-13', NULL, 'Parkir'),
	(15, 1, 'B8721AA', '17:10:18', NULL, '2022-07-13', NULL, 'Parkir'),
	(16, 2, 'B521HB', '17:16:41', NULL, '2022-07-13', NULL, 'Parkir'),
	(17, 1, 'N6333AD', '17:24:33', NULL, '2022-07-13', NULL, 'Parkir'),
	(18, 1, 'Z8271MM', '17:30:45', NULL, '2022-07-13', NULL, 'Parkir'),
	(19, 2, 'AD7672OP', '17:33:09', NULL, '2022-07-13', NULL, 'Parkir'),
	(20, 1, 'N8827FF', '14:04:36', NULL, '2022-07-14', NULL, 'Parkir'),
	(21, 2, 'B7872JJ', '14:09:13', NULL, '2022-07-14', NULL, 'Parkir');
/*!40000 ALTER TABLE `parkir` ENABLE KEYS */;

-- Dumping structure for table db_eparkir.role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_eparkir.role: ~2 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `nama_role`) VALUES
	(1, 'admin'),
	(2, 'user');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table db_eparkir.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  `id_role` int(11) NOT NULL,
  `createdDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eparkir.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`, `nama`, `id_role`, `createdDate`) VALUES
	(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, '2022-06-28 22:37:53'),
	(2, 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 1, '2022-07-01 15:04:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
