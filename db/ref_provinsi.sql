-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5505
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_sp
CREATE DATABASE IF NOT EXISTS `db_sp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_sp`;

-- Dumping structure for table db_sp.ref_provinsi
CREATE TABLE IF NOT EXISTS `ref_provinsi` (
  `id_provinsi` int(6) NOT NULL,
  `nama_provinsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_sp.ref_provinsi: ~34 rows (approximately)
/*!40000 ALTER TABLE `ref_provinsi` DISABLE KEYS */;
INSERT IGNORE INTO `ref_provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
	(11, 'ACEH'),
	(12, 'SUMATERA UTARA'),
	(13, 'SUMATERA BARAT'),
	(14, 'RIAU'),
	(15, 'JAMBI'),
	(16, 'SUMATERA SELATAN'),
	(17, 'BENGKULU'),
	(18, 'LAMPUNG'),
	(19, 'KEPULAUAN BANGKA BELITUNG'),
	(21, 'KEPULAUAN RIAU'),
	(31, 'DKI JAKARTA'),
	(32, 'JAWA BARAT'),
	(33, 'JAWA TENGAH'),
	(34, 'DI YOGYAKARTA'),
	(35, 'JAWA TIMUR'),
	(36, 'BANTEN'),
	(51, 'BALI'),
	(52, 'NUSA TENGGARA BARAT'),
	(53, 'NUSA TENGGARA TIMUR'),
	(61, 'KALIMANTAN BARAT'),
	(62, 'KALIMANTAN TENGAH'),
	(63, 'KALIMANTAN SELATAN'),
	(64, 'KALIMANTAN TIMUR'),
	(65, 'KALIMANTAN UTARA'),
	(71, 'SULAWESI UTARA'),
	(72, 'SULAWESI TENGAH'),
	(73, 'SULAWESI SELATAN'),
	(74, 'SULAWESI TENGGARA'),
	(75, 'GORONTALO'),
	(76, 'SULAWESI BARAT'),
	(81, 'MALUKU'),
	(82, 'MALUKU UTARA'),
	(91, 'PAPUA'),
	(92, 'PAPUA BARAT');
/*!40000 ALTER TABLE `ref_provinsi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
