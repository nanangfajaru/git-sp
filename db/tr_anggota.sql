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

-- Dumping structure for table db_sp.tr_anggota
CREATE TABLE IF NOT EXISTS `tr_anggota` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `serikat_pekerja_id` varchar(50) DEFAULT NULL,
  `anggota_nik` varchar(50) DEFAULT NULL,
  `anggota_nama` varchar(50) DEFAULT NULL,
  `jk` enum('laki-laki','perempuan') DEFAULT NULL,
  `tgl_aktif` date DEFAULT NULL,
  `tgl_tidak_aktif` date DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `serikat_pekerja_id` (`serikat_pekerja_id`),
  KEY `anggota_nik` (`anggota_nik`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sp.tr_anggota: ~16 rows (approximately)
/*!40000 ALTER TABLE `tr_anggota` DISABLE KEYS */;
INSERT IGNORE INTO `tr_anggota` (`id`, `serikat_pekerja_id`, `anggota_nik`, `anggota_nama`, `jk`, `tgl_aktif`, `tgl_tidak_aktif`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
	(3, '20190608132918', '12333', 'qwe', NULL, NULL, NULL, '1', 'USR1', '2019-06-08 13:37:27', NULL, NULL),
	(4, '20190608132918', '123', '123', NULL, NULL, NULL, '1', 'USR1', '2019-06-08 15:02:31', NULL, NULL),
	(6, '20190609081753', '9090098', 'Jari setiawan', NULL, NULL, NULL, '1', 'USR1', '2019-06-09 08:18:21', NULL, NULL),
	(7, '20190609081753', '123999', '123', NULL, NULL, NULL, '1', 'USR1', '2019-06-09 08:18:31', NULL, NULL),
	(8, '20190610143513', '12312323', 'adnsnda', NULL, NULL, NULL, '1', 'USR1', '2019-06-10 14:35:30', NULL, NULL),
	(9, '20190610143513', '123123', 'asnasd', NULL, NULL, NULL, '1', 'USR1', '2019-06-10 14:35:36', NULL, NULL),
	(10, '20190611105445', '0909', 'Eko Jatmiko', NULL, NULL, NULL, '1', 'USR2', '2019-06-11 10:54:57', NULL, NULL),
	(11, '20190611105445', '09733', 'Riza Ramzi', NULL, NULL, NULL, '1', 'USR2', '2019-06-11 10:55:13', NULL, NULL),
	(12, '20190620111220', '234', 'Erik', NULL, NULL, NULL, '1', 'USR2', '2019-06-20 11:12:50', NULL, NULL),
	(13, '20190620143733', '321', 'OKDAMESTA', NULL, NULL, NULL, '1', 'USR2', '2019-06-20 14:45:21', NULL, NULL),
	(14, '20190621190203', '9111111111111111', 'asd', 'perempuan', NULL, NULL, '1', 'USR1', '2019-06-22 07:11:10', NULL, NULL),
	(15, '20190622072038', '1234567898765432', 'Nanang Fajar', 'laki-laki', NULL, NULL, '1', 'USR1', '2019-06-22 13:58:53', NULL, NULL),
	(16, '20190622223114', '1111111111111113', 'Nanang', 'laki-laki', NULL, NULL, '1', 'USR1', '2019-06-23 07:17:49', NULL, NULL),
	(17, '20190625103727', '1111111111111111', '123', 'laki-laki', NULL, NULL, '1', 'USR2', '2019-06-25 11:34:19', NULL, NULL),
	(18, '20190625103727', '1111111111111112', 'Kiki', 'laki-laki', NULL, NULL, '1', 'USR2', '2019-06-25 11:39:12', NULL, NULL),
	(19, '20190626134919', '1111222233334444', 'erik', 'laki-laki', NULL, NULL, '1', 'USR13', '2019-06-26 13:52:54', NULL, NULL),
	(20, '20190627082027', '9111111111111119', 'Eko', 'laki-laki', NULL, NULL, '1', 'USR14', '2019-06-27 08:22:00', NULL, NULL);
/*!40000 ALTER TABLE `tr_anggota` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
