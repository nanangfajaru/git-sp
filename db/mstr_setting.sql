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

-- Dumping structure for table db_sp.mstr_setting
CREATE TABLE IF NOT EXISTS `mstr_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `changed_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `changed_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sp.mstr_setting: ~4 rows (approximately)
/*!40000 ALTER TABLE `mstr_setting` DISABLE KEYS */;
INSERT IGNORE INTO `mstr_setting` (`id`, `setting_key`, `setting_value`, `setting_desc`, `status`, `created_by`, `created_date`, `changed_by`, `changed_date`) VALUES
	(1, 'exp_cp', '60', 'Hari Expire Password', '1', 'USR1', '2019-06-01 14:18:18', 'USR1', '2019-06-01 14:24:42'),
	(2, 'menu_seq', '1', 'Menu Sequence', '1', 'USR1', '2019-06-01 14:18:18', NULL, NULL),
	(3, 'menu_seq', '2', 'Menu Sequence', '1', 'USR1', '2019-06-01 14:18:18', NULL, NULL),
	(4, 'menu_seq', '3', 'Menu Sequence', '1', 'USR1', '2019-06-01 14:18:18', NULL, NULL);
/*!40000 ALTER TABLE `mstr_setting` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
