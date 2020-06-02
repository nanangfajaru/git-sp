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

-- Dumping structure for table db_sp.mstr_menu
CREATE TABLE IF NOT EXISTS `mstr_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_seq` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_parent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `changed_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `changed_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sp.mstr_menu: ~13 rows (approximately)
/*!40000 ALTER TABLE `mstr_menu` DISABLE KEYS */;
INSERT IGNORE INTO `mstr_menu` (`id`, `menu_id`, `menu_desc`, `menu_seq`, `menu_parent`, `menu_url`, `menu_icon`, `status`, `created_by`, `created_date`, `changed_by`, `changed_date`) VALUES
	(1, 'M1', 'Master', '1', NULL, '#', 'icon-cogs', '1', 'USR1', '2019-06-01 14:18:17', NULL, NULL),
	(3, 'M3', 'Report', '1', NULL, 'reports', 'icon-newspaper', '1', 'USR1', '2019-06-01 14:18:17', NULL, NULL),
	(4, 'SM1', 'Users', '2', 'M1', 'users', 'icon-users2', '1', 'USR1', '2019-06-01 14:18:17', NULL, NULL),
	(5, 'SM2', 'Menu', '2', 'M1', 'menus', 'icon-cog', '1', 'USR1', '2019-06-01 14:18:17', NULL, NULL),
	(6, 'SM3', 'Roles', '2', 'M1', 'roles', 'icon-stack-star', '1', 'USR1', '2019-06-01 14:18:17', NULL, NULL),
	(7, 'SM4', 'Setting', '2', 'M1', 'setting', 'icon-equalizer', '1', 'USR1', '2019-06-01 14:18:17', NULL, NULL),
	(8, 'M8', 'Serikat Pekerja', '2', 'M11', 'serikatpekerja', 'icon-stack3', '1', 'USR1', '2019-06-01 14:47:36', 'USR1', '2019-06-23 08:48:24'),
	(9, 'M9', 'Formulir Serikat Pekerja', '2', 'M12', 'serikatcreate', 'icon-file-plus', '1', 'USR1', '2019-06-03 22:38:50', 'USR1', '2019-06-25 13:23:02'),
	(10, 'SM10', 'Laporan', '2', 'M3', 'lp', 'icon-cogs', '1', 'USR1', '2019-06-10 15:16:56', NULL, NULL),
	(11, 'M11', 'Transaksi', '1', 'NULL', '##', 'icon-stack', '1', 'USR1', '2019-06-23 08:46:18', NULL, NULL),
	(12, 'M12', 'Formulir', '1', 'NULL', '###', 'icon-file-plus', '1', 'USR1', '2019-06-23 08:47:21', NULL, NULL),
	(13, 'SM13', 'Formulir Federasi', '2', 'M12', 'federasi/create', 'icon-file-plus', '1', 'USR1', '2019-06-23 08:49:06', 'USR1', '2019-06-23 08:51:17'),
	(14, 'SM14', 'Formulir Konfederasi', '2', 'M12', 'konfederasi/create', 'icon-file-plus', '1', 'USR1', '2019-06-23 08:49:38', 'USR1', '2019-06-23 08:51:22'),
	(15, 'SM15', 'Konfederasi', '2', 'M11', 'konfederasi', 'icon-stack3', '1', 'USR1', '2019-06-23 08:49:57', NULL, NULL),
	(16, 'SM16', 'Federasi', '2', 'M11', 'federasi', 'icon-stack3', '1', 'USR1', '2019-06-23 08:50:17', NULL, NULL);
/*!40000 ALTER TABLE `mstr_menu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
