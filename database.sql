-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para ticketly
CREATE DATABASE IF NOT EXISTS `ticketly` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `ticketly`;

-- Volcando estructura para tabla ticketly.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ticketly.category: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
REPLACE INTO `category` (`id`, `name`) VALUES
	(1, 'Requerimiento'),
	(2, 'Incidente');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Volcando estructura para tabla ticketly.kind
CREATE TABLE IF NOT EXISTS `kind` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ticketly.kind: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `kind` DISABLE KEYS */;
REPLACE INTO `kind` (`id`, `name`) VALUES
	(1, 'Ticket');
/*!40000 ALTER TABLE `kind` ENABLE KEYS */;

-- Volcando estructura para tabla ticketly.priority
CREATE TABLE IF NOT EXISTS `priority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ticketly.priority: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `priority` DISABLE KEYS */;
REPLACE INTO `priority` (`id`, `name`) VALUES
	(1, 'Alta'),
	(2, 'Media'),
	(3, 'Baja');
/*!40000 ALTER TABLE `priority` ENABLE KEYS */;

-- Volcando estructura para tabla ticketly.project
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ticketly.project: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
REPLACE INTO `project` (`id`, `name`, `description`) VALUES
	(1, 'RR.HH.', 'Recursos Humanos'),
	(2, 'Contabilidad y Financias', 'Contabilidad y Financias'),
	(3, 'Comercial', 'Area Comercial'),
	(4, 'Higiene Ocupacional', 'Higiene Ocupacional'),
	(5, 'Recepcion', 'Recepcion'),
	(6, 'Gerencia General', 'Gerencia General'),
	(7, 'Supervision', 'Supervision'),
	(8, 'Clinica Surco', 'Clinica Surco'),
	(9, 'Clinica Chiclayo', 'Clinica Chiclayo'),
	(10, 'CSO - Cerro Lindo', 'CSO - Cerro Lindo'),
	(11, 'Sistemas', 'Sistemas');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;

-- Volcando estructura para tabla ticketly.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ticketly.status: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
REPLACE INTO `status` (`id`, `name`) VALUES
	(1, 'Pendiente'),
	(2, 'En Desarrollo'),
	(3, 'Terminado'),
	(4, 'Cancelado');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Volcando estructura para tabla ticketly.ticket
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `kind_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `asigned_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `priority_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `priority_id` (`priority_id`),
  KEY `status_id` (`status_id`),
  KEY `user_id` (`user_id`),
  KEY `kind_id` (`kind_id`),
  KEY `category_id` (`category_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`priority_id`) REFERENCES `priority` (`id`),
  CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `ticket_ibfk_4` FOREIGN KEY (`kind_id`) REFERENCES `kind` (`id`),
  CONSTRAINT `ticket_ibfk_5` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `ticket_ibfk_6` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ticketly.ticket: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
REPLACE INTO `ticket` (`id`, `title`, `description`, `updated_at`, `created_at`, `kind_id`, `user_id`, `asigned_id`, `project_id`, `category_id`, `priority_id`, `status_id`) VALUES
	(1, 'aa', 'aa', NULL, '2019-11-08 11:04:00', 1, 10, NULL, 6, 1, 2, 1),
	(2, 'addasdsadass', 'asdasdsdasdsa', NULL, '2019-11-08 12:25:26', 1, 11, NULL, 1, 2, 2, 1);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;

-- Volcando estructura para tabla ticketly.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `kind` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ticketly.user: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `nivel`, `name`, `area`, `username`, `password`, `profile_pic`, `is_active`, `kind`, `created_at`) VALUES
	(4, 'Administrador', 'Administrador', NULL, 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'default.png', 1, 1, '2019-10-31 20:30:00'),
	(9, 'Administrador', 'Luis Angel De La Cruz', 11, 'ldelacruz', '7e53732e3efe99d29525d65d5b744045404250b7', 'default.png', 1, 1, '2019-11-07 20:26:24'),
	(10, 'Usuario', 'Horacio Reeves', 6, 'h.reeves', 'adcd7048512e64b48da55b027577886ee5a36350', 'default.png', 1, 1, '2019-11-08 14:34:32'),
	(11, 'Usuario', 'Fernando Albines', 1, 'fernando.albines', 'adcd7048512e64b48da55b027577886ee5a36350', 'default.png', 1, 1, '2019-11-08 17:24:27');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
