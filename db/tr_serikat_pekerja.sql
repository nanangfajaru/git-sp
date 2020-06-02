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

-- Dumping structure for table db_sp.tr_serikat_pekerja
CREATE TABLE IF NOT EXISTS `tr_serikat_pekerja` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `serikat_pekerja_id` varchar(50) DEFAULT NULL,
  `serikat_pekerja_desc` varchar(200) DEFAULT NULL,
  `nama_singkat` varchar(100) DEFAULT NULL,
  `afiliasi` varchar(100) DEFAULT NULL,
  `url_logo` varchar(200) DEFAULT NULL,
  `kategori` varchar(2) DEFAULT NULL,
  `id_provinsi` varchar(11) DEFAULT NULL,
  `id_kabupaten` varchar(11) DEFAULT NULL,
  `id_kecamatan` varchar(11) DEFAULT NULL,
  `id_desa` varchar(11) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `kirim_by` varchar(50) DEFAULT NULL,
  `kirim_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serikat_pekerja_id` (`serikat_pekerja_id`),
  UNIQUE KEY `serikat_pekerja_desc` (`serikat_pekerja_desc`),
  KEY `id_provinsi` (`id_provinsi`),
  KEY `id_kabupaten` (`id_kabupaten`),
  KEY `id_kecamatan` (`id_kecamatan`),
  KEY `id_desa` (`id_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sp.tr_serikat_pekerja: ~27 rows (approximately)
/*!40000 ALTER TABLE `tr_serikat_pekerja` DISABLE KEYS */;
INSERT IGNORE INTO `tr_serikat_pekerja` (`id`, `serikat_pekerja_id`, `serikat_pekerja_desc`, `nama_singkat`, `afiliasi`, `url_logo`, `kategori`, `id_provinsi`, `id_kabupaten`, `id_kecamatan`, `id_desa`, `alamat`, `telp`, `fax`, `email`, `status`, `created_by`, `created_date`, `modified_by`, `modified_date`, `kirim_by`, `kirim_date`) VALUES
	(1, '20190608132918', 'SPSI Metal Jaya', 'SM Jaya', NULL, 'public/logo/2019-06-09/cHjEmQvuuAlB3kKROK02P2SGpFYZFlMXkSq27Sji.jpeg', NULL, '32', '3216', '321608', '3216082006', 'Jalan Imam Bonjol', '02 8999888', '8999888', 'xxx@gmail.com', '1', 'USR1', '2019-06-08 13:29:18', 'USR1', '2019-06-09 09:24:08', NULL, NULL),
	(3, '20190609081753', 'Puri Jaya Lestari', 'PJS', NULL, 'public/logo/2019-06-09/wC6hdDLiZmQDDA56io3CI26hTW2UHjLUrrExBG4m.jpeg', NULL, '36', '3604', '360434', '3604342007', 'Babakan Dalam No 1', '123', '123', 'xxx@gmail.com', '2', 'USR1', '2019-06-09 08:17:53', NULL, NULL, NULL, NULL),
	(4, '20190610143513', 'Serikat Indonesia', 'SI', NULL, 'public/logo/2019-06-10/wOFxZcWieI2ncM9lX6rbt63cz9FYE03ocprhWvc1.jpeg', NULL, '11', '1105', '110501', '1105012007', 'Bekasi', '123', '123', 'xxx@gmail.com', '2', 'USR1', '2019-06-10 14:35:13', NULL, NULL, NULL, NULL),
	(5, '20190611105445', 'Pandu Sakti', 'PS', NULL, 'public/logo/2019-06-11/N1jDFUMjtc5CBQZULo1ATNM5iB3gIvN4tUq514bT.jpeg', NULL, '36', '3602', '360209', '3602092011', 'Lebak Raya', '09880', '0988', 'xxx@gmail.com', '2', 'USR2', '2019-06-11 10:54:45', NULL, NULL, NULL, NULL),
	(6, '20190620111220', 'Serikat Pekerja', 'SP', NULL, 'public/logo/2019-06-20/HcErni1ylcSAROhnu0ZAqHZwI3xYrwuEppqLb2Os.jpeg', NULL, '11', '1105', '110507', '1105072002', 'Jalan', '123', '321', 'xxx@gmail.com', '2', 'USR2', '2019-06-20 11:12:20', NULL, NULL, NULL, NULL),
	(7, '20190620143733', 'SERIKAT PEKERJA NIBA BCA', 'SP NIBA BCA KPSI', NULL, 'public/logo/2019-06-20/RvVHMgPntj6Qn5EQNIBO5suILlVj5tPefa0FN9iu.jpeg', NULL, '51', '5103', '510303', '5103032008', 'JL. JALAN', '123', '321', 'xxx@gmail.com', '2', 'USR2', '2019-06-20 14:37:33', 'USR1', '2019-06-23 15:51:36', NULL, NULL),
	(9, '20190621183417', 'Rock Jakarta', 'International', NULL, 'public/logo/2019-06-21/L9QDC5TIAe9dfwuWwPD9vYFfJc8y5yAtmxv9TRDW.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'USR1', '2019-06-21 18:34:17', NULL, NULL, NULL, NULL),
	(10, '20190621185441', 'Jak', 'Jak', NULL, 'public/logo/2019-06-21/Cn3WYe488jJ3By2NpV7XhlnJkQ1uncWs70g5Aon8.jpeg', NULL, '51', '5106', '510604', '5106042013', '1', '1', NULL, 'xxx@gmail.com', '4', 'USR1', '2019-06-21 19:00:42', 'USR1', '2019-06-23 15:50:58', NULL, NULL),
	(12, '20190621190203', 'yo', 'OK', NULL, 'public/logo/2019-06-21/TwvbT7Kt3zru6e4nh2CqbANObAKHiKtzJjfL6LRN.jpeg', NULL, '11', '1110', '111001', '1110012002', '1', '2', NULL, 'xxx@gmail.com', '1', 'USR1', '2019-06-21 19:10:22', 'USR1', '2019-06-23 17:36:55', NULL, NULL),
	(13, '20190622071926', 'asd', 'asd', NULL, 'public/logo/2019-06-22/cVMhIOgAi1bcPNdN2lgTmhgCOnaYPSVEJzACazNp.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR1', '2019-06-22 07:19:26', NULL, NULL, NULL, NULL),
	(14, '20190622072038', 'asdasd2', 'asd2', NULL, 'public/logo/2019-06-22/pksO04jPaCvmon51hvo8i1WobpmNGpEYpKLcXf6c.jpeg', NULL, '51', '5107', '510708', '5107082005', 'w', '123', '123', 'asd@gmail.com', '2', 'USR1', '2019-06-22 07:20:38', 'USR1', '2019-06-22 21:38:48', NULL, NULL),
	(15, '20190622214412', 'qwe', 'qwe', '123', 'public/logo/2019-06-22/wgbtVsTAQxayx7Ojfi7l5ACbP1RscPFt5cVGRB7C.jpeg', NULL, '17', '1701', '170104', '1701042019', '123', '123', '123', 'sf@gmail.com', '5', 'USR1', '2019-06-22 21:44:12', 'USR1', '2019-06-22 22:46:55', NULL, NULL),
	(16, '20190622223114', 'qw', 'qw', 'qw', 'public/logo/2019-06-22/CaSRO0iy8ST7QaoVdc7fTS9EstSPNq2NAIxghQ7f.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'USR1', '2019-06-22 22:31:14', 'USR1', '2019-06-23 15:43:22', NULL, NULL),
	(17, '20190623154852', 'qa', 'qa', 'qaq', 'public/logo/2019-06-23/lK9tTcHyq9ASloJCocDzxpqRFFRkhGfRoKa6HKnD.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR2', '2019-06-23 15:48:52', NULL, NULL, NULL, NULL),
	(18, '20190625103727', 'SOP', 'SOP', 'SOP', 'public/logo/2019-06-25/J2XU1kmickrIgjPm26h83xJF1oQAKxs2QZmnI7RR.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR2', '2019-06-25 10:37:27', NULL, NULL, NULL, NULL),
	(19, '20190625164543', 'Singa Sari', 'SS', 'Internasional', 'public/logo/2019-06-25/JJcYj8aKv6SRgZf6WfUltrkZTA0h1dfwCZ4OyxMm.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'rq8ic6cm', '2019-06-25 16:45:43', NULL, NULL, NULL, NULL),
	(20, '20190625165628', 'jack', 'jack', 'jack', 'public/logo/2019-06-25/5snCou0OuWni4r2EriyaCeibk6fAIUgXni35tNio.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR12', '2019-06-25 16:56:28', NULL, NULL, NULL, NULL),
	(21, '20190626134919', 'Erik & Pren', 'EP', 'Erik Corp', 'public/logo/2019-06-26/LSUEackYpXcbbf2VorzmYUgepuI06VvS1raevot3.png', NULL, '11', '1105', '110507', '1105072002', 'jalan', '021', '123', 'xxx@gmail.com', '2', 'USR13', '2019-06-26 13:51:54', 'USR1', '2019-06-26 14:07:29', 'USR13', '2019-06-26'),
	(22, '20190627082027', 'Nanang Fajar Untoro', 'nfu', 'internasional', 'public/logo/2019-06-27/W6nQFbeAzWPncpdyJ7JpRg7fVSMYJEG4fcd7EW5Z.png', NULL, '11', '1105', '110507', '1105072002', 'Jalan', '098', NULL, 'xxx@gmail.com', '5', 'USR14', '2019-06-27 08:21:35', NULL, NULL, 'USR14', '2019-06-27'),
	(23, '20190630135131', 'Argo Konfederasi', 'AKD', 'International', 'public/logo/2019-06-30/0z5DTjIU3fZtia6D2eBeMKE8mcwXZl4kT18RdXwU.jpeg', 'kd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR15', '2019-06-30 13:51:32', NULL, NULL, NULL, NULL),
	(24, '20190630141218', 'sp', 'sp2', 'sp', 'public/logo/2019-06-30/jTBkS24p2M642j0QK4HfxPE8rApymshfUxWmN2ye.jpeg', 'sp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR16', '2019-06-30 14:12:18', NULL, NULL, NULL, NULL),
	(25, '20190630141401', 'sp2', 'sp22', 'sp', 'public/logo/2019-06-30/YXogbVfYWtxjTHfyL8l8VNBKaORunz9eWtcCy71y.jpeg', 'sp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR17', '2019-06-30 14:14:01', NULL, NULL, NULL, NULL),
	(26, '20190630141640', 'sp22', 'sp222', 'sp', 'public/logo/2019-06-30/4ngpSjIvie4lX52FuuFcNDdS1NeZLL0Mig6aoa4P.jpeg', 'sp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR18', '2019-06-30 14:16:40', NULL, NULL, NULL, NULL),
	(27, '20190630141720', 'sp222', 'sp2222', 'sp', 'public/logo/2019-06-30/5eZoakGr3KuAVOxnIpRKa5KNNvO5BuCiS1kFOPhd.jpeg', 'sp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR19', '2019-06-30 14:17:20', NULL, NULL, NULL, NULL),
	(28, '20190630141902', 'sp222123', 'sp2222123', 'sp', 'public/logo/2019-06-30/EcRhYkRmPICls8sB8Hy2ek4FnA2NmlMJ4nV0jupg.jpeg', 'sp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR20', '2019-06-30 14:19:02', NULL, NULL, NULL, NULL),
	(29, '20190630141949', 'sp2221232', '2', 'sp', 'public/logo/2019-06-30/EyLJ1bA7sIQsZ7DKLEnZsPS2RvdrpFnAESNwTUPC.jpeg', 'sp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR21', '2019-06-30 14:19:49', NULL, NULL, NULL, NULL),
	(30, '20190630142156', 'sp22212321', '11', 'sp', 'public/logo/2019-06-30/FKzfNI9VxRKHDHd3MDqM8Fu32DpJQ7EWeaeV04mV.jpeg', 'sp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR22', '2019-06-30 14:21:56', NULL, NULL, NULL, NULL),
	(32, '20190630142559', 'sp222123211', '111', 'sp', 'public/logo/2019-06-30/qi1VfhyU7u879gL9NL1v88uVbKNF0D00QoIF6nSs.jpeg', 'fd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR23', '2019-06-30 14:25:59', NULL, NULL, NULL, NULL),
	(33, '20190630143238', 'sp2221232111', '1111', 'sp', 'public/logo/2019-06-30/UsIj04RR9y2t9E2hwF3iFnGCiArFQiZ1HjsH9jNC.jpeg', 'sp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR25', '2019-06-30 14:32:38', NULL, NULL, NULL, NULL),
	(34, '20190701095158', 'Federasi 123', 'F123', 'Inernasional', 'public/logo/2019-07-01/A4AYSc5KQoHZqtjE6wvoCmIfMRZDbXPOa6K74tsg.jpeg', 'fd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR26', '2019-07-01 09:51:58', NULL, NULL, NULL, NULL),
	(35, '20190701095719', 'Federasi1', 'f1', 'internasioan', 'public/logo/2019-07-01/5lIMpztEZhiJUi3Y9pyvyw3T4wjetoql96yPB07F.jpeg', 'fd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'USR27', '2019-07-01 09:57:19', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tr_serikat_pekerja` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
