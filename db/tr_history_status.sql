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

-- Dumping structure for table db_sp.tr_history_status
CREATE TABLE IF NOT EXISTS `tr_history_status` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `serikat_pekerja_id` varchar(50) DEFAULT NULL,
  `status_sp` varchar(50) DEFAULT NULL,
  `status_desc` varchar(200) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `serikat_pekerja_id` (`serikat_pekerja_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sp.tr_history_status: ~6 rows (approximately)
/*!40000 ALTER TABLE `tr_history_status` DISABLE KEYS */;
INSERT IGNORE INTO `tr_history_status` (`id`, `serikat_pekerja_id`, `status_sp`, `status_desc`, `created_by`, `created_date`) VALUES
	(1, '20190621185441', '4', 'Belum Perpanjang Anggaran Dasar', 'USR1', '2019-06-23 14:04:34'),
	(2, '20190622223114', '4', 'NON', 'USR1', '2019-06-23 14:05:15'),
	(3, '20190622223114', '4', 'Bubar', 'USR1', '2019-06-23 15:42:35'),
	(4, '20190622223114', '3', 'Tidak Perpanjag AD', 'USR1', '2019-06-23 15:43:22'),
	(5, '20190621185441', '4', 'Bubar', 'USR1', '2019-06-23 15:50:58'),
	(6, '20190620143733', '2', 'OK', 'USR1', '2019-06-23 15:51:36'),
	(7, '20190621190203', '1', 're open', 'USR1', '2019-06-23 17:36:55'),
	(8, '20190626134919', '2', 'ok', 'USR1', '2019-06-26 14:07:29');
/*!40000 ALTER TABLE `tr_history_status` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
