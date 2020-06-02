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

-- Dumping structure for table db_sp.tr_pengurus
CREATE TABLE IF NOT EXISTS `tr_pengurus` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `serikat_pekerja_id` varchar(50) DEFAULT NULL,
  `pengurus_nik` varchar(50) DEFAULT NULL,
  `pengurus_nama` varchar(50) DEFAULT NULL,
  `jk` enum('laki-laki','perempuan') DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `url_ktp` varchar(200) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `serikat_pekerja_id` (`serikat_pekerja_id`),
  KEY `pengurus_nik` (`pengurus_nik`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sp.tr_pengurus: ~11 rows (approximately)
/*!40000 ALTER TABLE `tr_pengurus` DISABLE KEYS */;
INSERT IGNORE INTO `tr_pengurus` (`id`, `serikat_pekerja_id`, `pengurus_nik`, `pengurus_nama`, `jk`, `jabatan`, `no_hp`, `url_ktp`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
	(1, '20190608132918', '12', '12', NULL, '12', '12', 'public/ktp/2019-06-08/82MhXZ611SZ4hp0vMlP0l8tUSxAxrnFHEh3rUh6M.pdf', '1', 'USR1', '2019-06-08 13:39:46', NULL, NULL),
	(2, '20190608132918', '123', '123', NULL, '123', '123', 'public/ktp/2019-06-08/v8mhPvyFvNIHJENBqXWYxb3npVl27EiqXxsjsnrd.pdf', '1', 'USR1', '2019-06-08 13:55:01', NULL, NULL),
	(3, '20190609081753', '099867', 'Ahmad Rafi', NULL, 'Ketua', '1232', 'public/ktp/2019-06-09/U9nY62Di3uagkxnvvd68jQ4BYHtSSTY2l3DdGqUj.jpeg', '1', 'USR1', '2019-06-09 08:19:08', NULL, NULL),
	(4, '20190611105445', '09812', 'Sidik', NULL, 'Ketua', '123', 'public/ktp/2019-06-11/UjygRDMzlXYG1vBu6EXYKvWSr6DVByB5teYJIdn8.jpeg', '1', 'USR2', '2019-06-11 10:55:41', NULL, NULL),
	(5, '20190620111220', '321', 'okda', NULL, 'ketua', '0812', 'public/ktp/2019-06-20/mKfBfcOaWJyyG2sexgqJCNhAqn3oTABme2Darkju.pdf', '1', 'USR2', '2019-06-20 11:13:22', NULL, NULL),
	(6, '20190620143733', '4321', 'ERED', NULL, 'KETUA', '234', 'public/ktp/2019-06-20/CTI9SsTH13oSyVqktqiSDYuo5sLgu8BRov5KMKF1.jpeg', '1', 'USR2', '2019-06-20 14:48:14', NULL, NULL),
	(7, '20190620143733', '23456', 'ERIK', NULL, 'WAKIL', '123', 'public/ktp/2019-06-20/JwPCdaoB8iyrmAgFpEpTVMna168JkznKNG3i5B5z.jpeg', '1', 'USR2', '2019-06-20 14:51:06', NULL, NULL),
	(8, '20190622072038', '1111111111111111', '123', 'laki-laki', '123', '1233123', 'public/ktp/2019-06-22/fvW392F1kXlCcIfBvhsteP8soQVM9OGH5t5qiEpA.jpeg', '1', 'USR1', '2019-06-22 18:49:45', NULL, NULL),
	(9, '20190622223114', '1111111111111113', 'Kiki', 'laki-laki', 'Ketua', '085695109870', 'public/ktp/2019-06-23/zYGAf3RWfby2uAejeB0AtXYUxcQMsCRBPmwjQ9xs.png', '1', 'USR1', '2019-06-23 07:18:24', NULL, NULL),
	(10, '20190622223114', '1111111111111114', '23', 'laki-laki', '123', '123', 'public/ktp/2019-06-23/EAZirEkcygoZBUgi445oQSC5L74sm40NVCGkCEbD.jpeg', '1', 'USR1', '2019-06-23 07:20:22', NULL, NULL),
	(11, '20190621190203', '1111111111111143', 'N', 'perempuan', 'asd', '123', 'public/ktp/2019-06-23/e5GqoAJjYOV6oN7YzxiWZhpGeKirWFa8kFAIeyCu.jpeg', '1', 'USR1', '2019-06-23 07:35:43', NULL, NULL),
	(12, '20190625103727', '1111111111111123', 'Jo', 'laki-laki', 'Ketua', '123', 'public/ktp/2019-06-25/qveH9BrZVuOTkpgGEjAK9a7IL8m6j83nVa9Y8nMq.png', '1', 'USR2', '2019-06-25 11:40:35', NULL, NULL),
	(13, '20190626134919', '4444333322221111', 'okda', 'laki-laki', 'ketua', '123', 'public/ktp/2019-06-26/DxI5JaKiksitc3NQdGgyDoK9uN1TgDzTDctYi0Zi.png', '1', 'USR13', '2019-06-26 13:54:01', NULL, NULL),
	(14, '20190627082027', '1111111111111199', 'Riko', 'laki-laki', 'Ketua', '123', 'public/ktp/2019-06-27/7VGrKTjSrFfAoa8GUrqErgntktKWZV28kvXZ7SM4.jpeg', '1', 'USR14', '2019-06-27 08:22:15', NULL, NULL);
/*!40000 ALTER TABLE `tr_pengurus` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
