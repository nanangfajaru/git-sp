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

-- Dumping structure for table db_sp.mstr_role
CREATE TABLE IF NOT EXISTS `mstr_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `changed_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `changed_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sp.mstr_role: ~8 rows (approximately)
/*!40000 ALTER TABLE `mstr_role` DISABLE KEYS */;
INSERT IGNORE INTO `mstr_role` (`id`, `role_id`, `role_desc`, `status`, `created_by`, `created_date`, `changed_by`, `changed_date`) VALUES
	(1, 'SYS', 'Administrator', '1', 'USR1', '2019-06-01 14:18:17', NULL, NULL),
	(2, 'User', 'User', '1', 'USR1', '2019-06-01 14:18:17', NULL, NULL),
	(3, 'KEMENTERIAN', 'Kementerian', '1', 'USR1', '2019-06-11 08:35:05', NULL, NULL),
	(4, 'PROVINSI', 'Provinsi', '1', 'USR1', '2019-06-11 08:35:18', NULL, NULL),
	(5, 'KABUPATEN', 'Kabupaten', '1', 'USR1', '2019-06-11 08:36:12', NULL, NULL),
	(6, 'SP', 'Serikat Pekerja', '1', 'USR1', '2019-06-11 08:36:25', NULL, NULL),
	(7, 'FD', 'federasi', '1', 'USR1', '2019-06-30 13:47:09', NULL, NULL),
	(8, 'KD', 'konfederasi', '1', 'USR1', '2019-06-30 13:47:17', NULL, NULL);
/*!40000 ALTER TABLE `mstr_role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
