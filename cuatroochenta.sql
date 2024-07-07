-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.12 - MySQL Community Server - GPL
-- SO del servidor:              Linux
-- HeidiSQL Versión:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para cuatroochenta
CREATE DATABASE IF NOT EXISTS `cuatroochenta` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `cuatroochenta`;

-- Volcando estructura para tabla cuatroochenta.doctrine_migration_versions
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla cuatroochenta.doctrine_migration_versions: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20240704102612', '2024-07-04 12:26:27', 853);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;

-- Volcando estructura para tabla cuatroochenta.measurement
CREATE TABLE IF NOT EXISTS `measurement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `variety` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temperature` double NOT NULL,
  `graduation` double NOT NULL,
  `ph` double NOT NULL,
  `observations` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_2CE0D811A76ED395` (`user_id`),
  CONSTRAINT `FK_2CE0D811A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cuatroochenta.measurement: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `measurement` DISABLE KEYS */;
INSERT INTO `measurement` (`id`, `user_id`, `year`, `variety`, `type`, `color`, `temperature`, `graduation`, `ph`, `observations`) VALUES
	(1, 4, 1905, 'Albariño', 'Dulce', 'Blanco', 20, 8, 7, 'Vino de origen español'),
	(2, 4, 1910, 'Chardonnay', 'Dulce', 'Blanco', 16, 7, 9, 'Vino de origen francés'),
	(3, 4, 1940, 'Merlot', 'Orange', 'Blanco', 20, 8, 8, ''),
	(4, 4, 1845, 'Riesling', 'Rosado', 'Tinto', 21, 7, 8, ''),
	(5, 10, 1907, 'Albariño', 'Dulce', 'Blanco', 20, 8, 8, 'Vino origen de España');
/*!40000 ALTER TABLE `measurement` ENABLE KEYS */;

-- Volcando estructura para tabla cuatroochenta.sensor
CREATE TABLE IF NOT EXISTS `sensor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type_sensor_id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BC8617B0A76ED395` (`user_id`),
  KEY `IDX_BC8617B01681D80F` (`type_sensor_id`),
  CONSTRAINT `FK_BC8617B01681D80F` FOREIGN KEY (`type_sensor_id`) REFERENCES `type_sensor` (`id`),
  CONSTRAINT `FK_BC8617B0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cuatroochenta.sensor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sensor` DISABLE KEYS */;
INSERT INTO `sensor` (`id`, `user_id`, `type_sensor_id`, `value`) VALUES
	(1, 4, 1, '20'),
	(2, 4, 1, '20'),
	(3, 10, 4, '8');
/*!40000 ALTER TABLE `sensor` ENABLE KEYS */;

-- Volcando estructura para tabla cuatroochenta.type_sensor
CREATE TABLE IF NOT EXISTS `type_sensor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cuatroochenta.type_sensor: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `type_sensor` DISABLE KEYS */;
INSERT INTO `type_sensor` (`id`, `name`) VALUES
	(1, 'Temperatura'),
	(2, 'Ph'),
	(3, 'Color'),
	(4, 'Graduacion');
/*!40000 ALTER TABLE `type_sensor` ENABLE KEYS */;

-- Volcando estructura para tabla cuatroochenta.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cuatroochenta.user: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
	(1, 'pruebas@gmail.com', '["ROLE_USER"]', '$2y$13$WWnOm5CUPd254SV/6gnzqOCAyjlgmOt4wIoskKhI42YJlzq/lMb1y'),
	(2, 'jaime@gmail.com', '["ROLE_USER"]', '$2y$13$QfsW8HKr4iPexXw6GXHb1OXOv9jVncJ6VY4sSR1wDrnpuGC2YCGvK'),
	(3, 'prueba1@gmail.com', '["ROLE_USER"]', '$2y$13$pQycUoLtGEHBUyNstgHKBe6epxKQcT7GOwhKSFWUZKkueW/Fofalq'),
	(4, 'prueba2@gmail.com', '["ROLE_USER"]', '$2y$13$CZ0h.UN2AiaMc0dSS.pMw.ywQZdidHswNZmVDY9jYj4Vb/DTZKHGy'),
	(5, 'prueba3@gmail.com', '["ROLE_USER"]', '$2y$13$6YYzlMZymUHKnTxoF6YlhuwcCXzw0mRwlLGpo6ysLcYyRk9ttQbcO'),
	(6, 'prueba4@gmail.com', '["ROLE_USER"]', '$2y$13$.gt5kQ9o/Pic0CGB.3K7FenQhMBbYjIUclPnMZjtb0t7c/YoDIBUO'),
	(8, 'prueba5@gmail.com', '["ROLE_USER"]', '$2y$13$EFn4QXmml0Mzk7z7oZCdfOKVrKZTjFV/ob1G37on.bKfzYhlIcVMK'),
	(10, 'cuatroochenta@gmail.com', '["ROLE_USER"]', '$2y$13$p4tUVUjC17YMdZ0F8vRQReWyLdl/Dmy0FharO5hAsfugUZupTkNae');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
