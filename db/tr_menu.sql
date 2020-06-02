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

-- Dumping structure for table db_sp.tr_menu
CREATE TABLE IF NOT EXISTS `tr_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `changed_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `changed_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sp.tr_menu: ~18 rows (approximately)
/*!40000 ALTER TABLE `tr_menu` DISABLE KEYS */;
INSERT IGNORE INTO `tr_menu` (`id`, `role_id`, `menu_id`, `status`, `created_by`, `created_date`, `changed_by`, `changed_date`) VALUES
	(31, 'SYS', 'M12', '1', 'USR1', '2019-06-23 08:50:46', NULL, NULL),
	(32, 'SYS', 'SM13', '1', 'USR1', '2019-06-23 08:50:46', NULL, NULL),
	(33, 'SYS', 'SM14', '1', 'USR1', '2019-06-23 08:50:46', NULL, NULL),
	(34, 'SYS', 'M9', '1', 'USR1', '2019-06-23 08:50:46', NULL, NULL),
	(35, 'SYS', 'M1', '1', 'USR1', '2019-06-23 08:50:46', NULL, NULL),
	(36, 'SYS', 'SM2', '1', 'USR1', '2019-06-23 08:50:46', NULL, NULL),
	(37, 'SYS', 'SM3', '1', 'USR1', '2019-06-23 08:50:46', NULL, NULL),
	(38, 'SYS', 'SM4', '1', 'USR1', '2019-06-23 08:50:46', NULL, NULL),
	(39, 'SYS', 'SM1', '1', 'USR1', '2019-06-23 08:50:46', NULL, NULL),
	(40, 'SYS', 'M11', '1', 'USR1', '2019-06-23 08:50:46', NULL, NULL),
	(41, 'SYS', 'SM16', '1', 'USR1', '2019-06-23 08:50:46', NULL, NULL),
	(42, 'SYS', 'SM15', '1', 'USR1', '2019-06-23 08:50:46', NULL, NULL),
	(43, 'SYS', 'M8', '1', 'USR1', '2019-06-23 08:50:46', NULL, NULL),
	(48, 'SP', 'M11', '1', 'USR1', '2019-06-26 14:09:23', NULL, NULL),
	(49, 'SP', 'M8', '1', 'USR1', '2019-06-26 14:09:23', NULL, NULL),
	(50, 'FD', 'M11', '1', 'USR1', '2019-06-30 13:47:30', NULL, NULL),
	(51, 'FD', 'SM16', '1', 'USR1', '2019-06-30 13:47:30', NULL, NULL),
	(52, 'KD', 'M11', '1', 'USR1', '2019-06-30 13:47:40', NULL, NULL),
	(53, 'KD', 'SM15', '1', 'USR1', '2019-06-30 13:47:40', NULL, NULL);
/*!40000 ALTER TABLE `tr_menu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
