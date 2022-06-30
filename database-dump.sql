-- Adminer 4.8.1 MySQL 10.4.25-MariaDB-1:10.4.25+maria~focal-log dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `sportisimo-znacky` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sportisimo-znacky`;

DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `brands` (`id`, `title`, `created_at`) VALUES
(1,	'Adidas',	'2022-06-30 08:47:53'),
(2,	'Alpina',	'2022-06-30 08:47:53'),
(3,	'Arcore',	'2022-06-30 08:47:53'),
(4,	'Atomic',	'2022-06-30 08:47:53'),
(5,	'Bauer',	'2022-06-30 08:47:53'),
(6,	'Blizzard',	'2022-06-30 08:47:53'),
(7,	'Crocs',	'2022-06-30 08:47:53'),
(8,	'CCM',	'2022-06-30 08:47:53'),
(9,	'Dunlop',	'2022-06-30 08:47:53'),
(10,	'Dynastar',	'2022-06-30 08:47:53'),
(11,	'Elan',	'2022-06-30 08:47:53'),
(12,	'Everlast',	'2022-06-30 08:47:53'),
(13,	'Fila',	'2022-06-30 08:47:53'),
(14,	'Garmin',	'2022-06-30 08:47:53'),
(15,	'Head',	'2022-06-30 08:47:53'),
(16,	'Husky',	'2022-06-30 08:47:53'),
(17,	'Isostar',	'2022-06-30 08:47:53'),
(18,	'Kappa',	'2022-06-30 08:47:53'),
(19,	'Lotto',	'2022-06-30 08:47:53'),
(20,	'Marimex',	'2022-06-30 08:47:53'),
(21,	'Nike',	'2022-06-30 08:47:53'),
(22,	'Olpran',	'2022-06-30 08:47:53'),
(23,	'Puma',	'2022-06-30 08:47:53');

-- 2022-06-30 08:53:09
