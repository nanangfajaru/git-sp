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

-- Dumping structure for table db_sp.tr_anggaran_dasar
CREATE TABLE IF NOT EXISTS `tr_anggaran_dasar` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `serikat_pekerja_id` varchar(50) DEFAULT NULL,
  `url_ad` varchar(100) DEFAULT NULL,
  `tgl_pembuatan_ad` date DEFAULT NULL,
  `tgl_berlaku_ad` date DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `serikat_pekerja_id` (`serikat_pekerja_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sp.tr_anggaran_dasar: ~8 rows (approximately)
/*!40000 ALTER TABLE `tr_anggaran_dasar` DISABLE KEYS */;
INSERT IGNORE INTO `tr_anggaran_dasar` (`id`, `serikat_pekerja_id`, `url_ad`, `tgl_pembuatan_ad`, `tgl_berlaku_ad`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
	(1, '20190608132918', 'public/anggaran/2019-06-09/kV0LlQeQF1ntHD3ceyyY2Vul1GGdUGCqaTKhbSwm.pdf', '2019-06-08', '2019-12-31', '1', 'USR1', '2019-06-08 13:29:18', 'USR1', '2019-06-09 09:24:08'),
	(2, '20190609081753', 'public/anggaran/2019-06-09/DQD76bBedG7IrbLzgAuby3Sg1wsYjfTSUTGfb1BX.pdf', '2019-06-18', '2019-06-09', '1', 'USR1', '2019-06-09 08:17:53', NULL, NULL),
	(3, '20190610143513', 'public/anggaran/2019-06-10/2SFzOiF6Ps0Q58fBzaByMgytvwf7WLSa3iCZUbxJ.pdf', '2019-06-10', '2019-06-10', '1', 'USR1', '2019-06-10 14:35:13', NULL, NULL),
	(4, '20190611105445', 'public/anggaran/2019-06-11/yS0SmQJ5w6pFO3fB9chDDmxUEBsRi6TkjaxmZacQ.pdf', '2019-06-11', '2019-06-11', '1', 'USR2', '2019-06-11 10:54:45', NULL, NULL),
	(5, '20190620111220', 'public/anggaran/2019-06-20/u6yHhJ3zEDXEi66RQMYkIyjI2ww6QqKsT4fxHAAK.pdf', '2019-06-20', '2020-01-01', '1', 'USR2', '2019-06-20 11:12:20', NULL, NULL),
	(6, '20190620143733', 'public/anggaran/2019-06-20/9JJ2OefxgaG9KJcxJBJHDi0TKtdiBFJHTUX8yovg.pdf', '2019-06-20', '2019-06-21', '1', 'USR2', '2019-06-20 14:37:33', NULL, NULL),
	(7, '20190621190203', 'public/anggaran/2019-06-21/rmQspQ3Y4hAp2oSfG3rUOdUr6ZBdUMNwKM9UtBqf.pdf', '2019-06-26', '2019-06-26', '1', 'USR1', '2019-06-21 19:10:22', NULL, NULL),
	(8, '20190622214412', 'public/anggaran/2019-06-22/zReY1Lwh2wLnuF3Dtl9Txu3GLqH4nghqcw30Te5l.jpeg', '2019-06-20', '2019-06-30', '1', 'USR1', '2019-06-22 22:46:55', NULL, NULL),
	(9, '20190626134919', 'public/anggaran/2019-06-26/nu8oqKfFvHHlzpGeMwavCSozcfP43dngF0UWOQr6.jpeg', '2019-06-26', '2020-06-25', '1', 'USR13', '2019-06-26 13:51:54', NULL, NULL),
	(10, '20190627082027', 'public/anggaran/2019-06-27/b6MBnxDHrW5bmZBTpOl9FP7mg5y6DFNbqWbChfr4.jpeg', '2019-06-27', '2025-06-30', '1', 'USR14', '2019-06-27 08:21:35', NULL, NULL);
/*!40000 ALTER TABLE `tr_anggaran_dasar` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
