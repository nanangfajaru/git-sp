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

-- Dumping structure for table db_sp.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `changed_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `changed_date` datetime DEFAULT NULL,
  `password_changed_date` datetime DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_sp.users: ~26 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_id`, `username`, `role_id`, `status`, `created_by`, `created_date`, `changed_by`, `changed_date`, `password_changed_date`, `last_login_date`) VALUES
	(1, 'Nanang Fajar Untoro', 'nanangfajaru@gmail.com', NULL, '$2y$10$UUXe6neHjmieY/Zt.0HcvuAdnBtCPngr5O1TtFb1Dep1jahJmXmay', 'M3JI2K2YhbmoHDZdgERnjosiEon4GeFU3dGqwPb2pCCTZROP4O7t2kUnGRil', NULL, '2019-07-04 05:47:30', 'USR1', 'nanang', 'SYS', '1', NULL, NULL, NULL, NULL, NULL, '2019-07-04 05:47:30'),
	(2, 'Serikat Pekerja', NULL, NULL, '$2y$10$yGcTscNikVfU7Iw8kNUpiuu6ybgVY6UshLRUigMX1hPU7SSGRGkQe', '60g2JBRxSljF8DmypSOTBFhWqgMbZJb2Y2jULWvE7rlejqzV3FZB3QTh1mtS', NULL, '2019-06-27 08:19:41', 'USR2', 'sp', 'SP', '1', 'USR1', '2019-06-11 08:42:56', NULL, NULL, NULL, '2019-06-27 08:19:41'),
	(3, 'ucok', NULL, NULL, '$2y$10$AjDKhCVPnd6Ee4FTvbl4L.d5TB0V.s35tfV20uxYG8O7Bq7.3sowy', NULL, NULL, NULL, 'USR3', '1637299156164737', 'SP', '1', 'Online', '2019-06-25 15:09:13', NULL, NULL, NULL, NULL),
	(4, 'ok', NULL, NULL, '$2y$10$kcS0D71EWf6Wb6kY8XGjqOyorw5X9nU5Ve4guZZFlA/jbONyEpARu', NULL, NULL, NULL, 'USR4', '1637299442432704', 'SP', '1', 'Online', '2019-06-25 15:13:46', NULL, NULL, NULL, NULL),
	(5, 'ok', NULL, NULL, '$2y$10$7qORd.rZ2dAgwOHxQgPj3OKpUOBvt9iLv25pZ1kGejPHwkEec79OC', NULL, NULL, NULL, 'USR5', '1637299576344672', 'SP', '1', 'Online', '2019-06-25 15:15:54', NULL, NULL, NULL, NULL),
	(6, 'qweqwe', NULL, NULL, '$2y$10$siSOPzbKCoYlF7r6sXpdOuwC/OWCFQuLSD.WtGSie8UNTmDSVgJ6S', NULL, NULL, NULL, 'USR6', '1637299593554346', 'SP', '1', 'Online', '2019-06-25 15:16:10', NULL, NULL, NULL, NULL),
	(7, 'asdasd', NULL, NULL, '$2y$10$CribwNCCDWgvONZbFON6ROKD4drt4szk3mlGDu2S6KHgVPlgFSeJa', NULL, NULL, NULL, 'USR7', '1637299620628198', 'SP', '1', 'Online', '2019-06-25 15:16:36', NULL, NULL, NULL, NULL),
	(8, '12', NULL, NULL, '$2y$10$yp2wToguje3WRvqTFv/hPeUEie3RRgeyW5a9J.nIPGrrox2/8FoYG', NULL, NULL, NULL, 'USR8', '5d11d90b13e66', 'SP', '1', 'Online', '2019-06-25 15:19:23', NULL, NULL, NULL, NULL),
	(9, 'ok', NULL, NULL, '$2y$10$nqluFw1Gr6PUaqbZnHvqz.Zcq0Ia782g85FGgDJH0IXfbKc0.1nRi', NULL, NULL, NULL, 'USR9', 'nsoheckt', 'SP', '1', 'Online', '2019-06-25 16:37:36', NULL, NULL, NULL, NULL),
	(10, 'ok', NULL, NULL, '$2y$10$vhc9LwpX.JM1TRjjmg/A8uUjXqTBTFJVC2Ked8y3rh1V2/IkfrVJS', 'Emvqxwt2KtZaDGBAdYraXWwZmBGO7y2h1FPPo0DCaBNITyiNw95sRXeH6ntU', NULL, '2019-06-25 16:38:55', 'USR10', 'fmvtrn13', 'SP', '1', 'Online', '2019-06-25 16:38:30', NULL, NULL, NULL, '2019-06-25 16:38:55'),
	(11, 'Singa Sari', NULL, NULL, '$2y$10$lgfa/CJTuDtekM0Rl3VbN.370UoySVA.Fn.SwMg.o9QBe7.ZUMcrO', 'X8a26yJ2klFQjPPZfp2smlQArwMr2rQBhiURtRmTjLSgaryIkw9TQQLiewO2', NULL, '2019-06-25 16:46:49', 'USR11', 'rq8ic6cm', 'SP', '1', 'Online', '2019-06-25 16:45:43', NULL, NULL, '2019-06-25 16:46:42', '2019-06-25 16:46:49'),
	(12, 'jack', NULL, NULL, '$2y$10$S8g3kqHB7IbATpArmIxvm.anfySxL15M0Cy88PRDFQAKohzD2LHye', 'd0MrUxmLJWv4zks2cNojf51aoLrT0Qft4vCQJTjAjRXsyTYnDxQn4Ort8sSB', NULL, '2019-06-25 16:57:02', 'USR12', 'natp4bsy', 'SP', '1', 'Online', '2019-06-25 16:56:28', NULL, NULL, '2019-06-25 16:56:47', '2019-06-25 16:57:02'),
	(13, 'Erik & Pren', NULL, NULL, '$2y$10$1wj2RgX2k25aESamFL84lO2iJ75fNwei74TtE6BqRhEgca4gq3wt2', 'AEsEWGHJtwEL73NbTO1qRXzKQVQ20mpVIZnV2hTBowRV2yc8zYDeBGpt1Xnr', NULL, '2019-06-26 14:08:32', 'USR13', 'mj49fmv9', 'SP', '1', 'Online', '2019-06-26 13:49:20', NULL, NULL, '2019-06-26 13:49:53', '2019-06-26 14:08:32'),
	(14, 'Nanang Fajar Untoro', NULL, NULL, '$2y$10$/DOUCgi2RDZRJpi6AhljyeYRyEf0arYjB4nyyLHLkp4NuANdXiSaa', 'sqt3eEbtIwbwkpULlFjeSekyRNObYwZ1gCu2OUAZ1eSRXGMN6ZpZNwfU9FZU', NULL, '2019-06-27 08:20:59', 'USR14', 'aizafasg', 'SP', '1', 'Online', '2019-06-27 08:20:27', NULL, NULL, '2019-06-27 08:20:49', '2019-06-27 08:20:59'),
	(15, 'Argo Konfederasi', NULL, NULL, '$2y$10$dt5L6rydXxlYuEYi/PKtjOaB24QnPcXGK0Y7toF/5Dxr0tIgCm/bq', '1qrHt3FB5EpSDMMageEnbc2gzoo7fD5d1LxC12bUOIEdD11jAO3fImz08ukz', NULL, '2019-06-30 13:51:55', 'USR15', 'muqwy8df', 'KD', '1', 'Online', '2019-06-30 13:51:32', NULL, NULL, '2019-06-30 13:51:48', '2019-06-30 13:51:55'),
	(16, 'sp', NULL, NULL, '$2y$10$w7HHEyqeUsdKYNdF3brDwOrQO7EEoCvYHBh3SaJpeBFeU4jhBVDyC', NULL, NULL, NULL, 'USR16', 'c6agrscs', 'SP', '1', 'Online', '2019-06-30 14:12:18', NULL, NULL, '2010-01-01 00:00:00', NULL),
	(17, 'sp2', NULL, NULL, '$2y$10$bJOjqG6h8fqPeRiVauZd.eneJAnCjLTwr0CbDAwueH//vQVM/OXtW', NULL, NULL, NULL, 'USR17', 'mytmhe0v', 'SP', '1', 'Online', '2019-06-30 14:14:01', NULL, NULL, '2010-01-01 00:00:00', NULL),
	(18, 'sp22', NULL, NULL, '$2y$10$zGQujyg45bFsfyqbvvRWFuumrwcLlk7ygcSPVp3CD0Z.UVtgar/Qu', NULL, NULL, NULL, 'USR18', 'mlvlzwwv', 'SP', '1', 'Online', '2019-06-30 14:16:40', NULL, NULL, '2010-01-01 00:00:00', NULL),
	(19, 'sp222', NULL, NULL, '$2y$10$FZTKSJMmIuIz.KyRqV1u4.THK0KwLO61Q5rYzVNcDBy9YqxXIxD5K', NULL, NULL, NULL, 'USR19', 'flrb0mpg', 'SP', '1', 'Online', '2019-06-30 14:17:20', NULL, NULL, '2010-01-01 00:00:00', NULL),
	(20, 'sp222123', NULL, NULL, '$2y$10$7aJIfwBOy2iAUxlNuYgi3OiHO2nu709Ls/sgF1N4hje6GMOPkLYF6', NULL, NULL, NULL, 'USR20', 'ekfusodp', 'SP', '1', 'Online', '2019-06-30 14:19:02', NULL, NULL, '2010-01-01 00:00:00', NULL),
	(21, 'sp2221232', NULL, NULL, '$2y$10$/PrpDkBm8a/P2QPoWzgETeS3VV2HJaG9qbpxmb/qKEv1l0E08z1KG', NULL, NULL, NULL, 'USR21', 't45pmpid', 'SP', '1', 'Online', '2019-06-30 14:19:49', NULL, NULL, '2010-01-01 00:00:00', NULL),
	(22, 'sp22212321', NULL, NULL, '$2y$10$iqJcY7xB160UX8nuraG/9Oi4XpKdn4ICQezHC/xtmXCxxHDSanoyu', NULL, NULL, NULL, 'USR22', 'kktb229c', 'SP', '1', 'Online', '2019-06-30 14:21:56', NULL, NULL, '2010-01-01 00:00:00', NULL),
	(24, 'sp222123211', NULL, NULL, '$2y$10$BQFVKvjlowkVwXm84eyTRurrpz8aP6JxSiNGdB1lKEOf84LWbMzva', NULL, NULL, NULL, 'USR23', 'j7g5cr1a', 'FD', '1', 'Online', '2019-06-30 14:25:59', NULL, NULL, '2010-01-01 00:00:00', NULL),
	(25, 'sp2221232111', NULL, NULL, '$2y$10$WX0h1fRb912knSPQI3dFCuLMcsKdLp/Vmrq.i38D8z/J5.YbOy9xW', 'mCmwFrZpbGSfAUxOa3G5HjPrHXM99AKG4hVZF61a08faTzYEEdjuVTA2qkxe', NULL, '2019-06-30 14:40:30', 'USR25', '4l7c8ctz', 'SP', '1', 'Online', '2019-06-30 14:32:38', NULL, NULL, '2019-06-30 14:40:24', '2019-06-30 14:40:30'),
	(26, 'Federasi 123', NULL, NULL, '$2y$10$KneoIr0dr5YgeoPpHk/xQOTco.LvUPzJ0/w.x57tASwCalGF40KZa', NULL, NULL, NULL, 'USR26', 'c9e1b21o', 'FD', '1', 'Online', '2019-07-01 09:51:58', NULL, NULL, '2010-01-01 00:00:00', NULL),
	(27, 'Federasi1', NULL, NULL, '$2y$10$tWd21nQIGX1CgHw3/BwZaOnG8sEAqtzWHArQGY81AXhEp6/ISl2Y.', 'K7d8B4vEVnnnQN9GFqfPxtJJaoh5dyq81c9GNsYSF68zv7CC2SwFC6pIIbt8', NULL, '2019-07-01 10:16:06', 'USR27', 'j6n3nzy9', 'FD', '1', 'Online', '2019-07-01 09:57:19', NULL, NULL, '2019-07-01 09:58:08', '2019-07-01 10:16:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
