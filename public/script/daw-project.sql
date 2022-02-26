/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `categoriavehiculo`;
CREATE TABLE `categoriavehiculo` (
  `id_categoria_vehiculo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_categoria_vehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `ciudades`;
CREATE TABLE `ciudades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE `reserva` (
  `id` int(11)  NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  `destino` varchar(45) DEFAULT NULL,
  `fecha_viaje` date DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `precioDia` double DEFAULT NULL,
  `aire_acondicionado` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_vehiculo`),
  KEY `id_categoria_vehiculo_idx` (`id_categoria`),
  CONSTRAINT `id_categoria_vehiculo` FOREIGN KEY (`id_categoria`) REFERENCES `categoriavehiculo` (`id_categoria_vehiculo`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `vuelos`;
CREATE TABLE `vuelos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ciudad_origen_id` bigint(20) unsigned NOT NULL,
  `ciudad_destino_id` bigint(20) unsigned NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_regreso` date DEFAULT NULL,
  `precio` decimal(5,2) NOT NULL,
  `duracion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `ciudad_origen_id` (`ciudad_origen_id`),
  KEY `ciudad_destino_id` (`ciudad_destino_id`),
  CONSTRAINT `vuelos_ibfk_1` FOREIGN KEY (`ciudad_origen_id`) REFERENCES `ciudades` (`id`),
  CONSTRAINT `vuelos_ibfk_2` FOREIGN KEY (`ciudad_destino_id`) REFERENCES `ciudades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;



INSERT INTO `ciudades` (`id`, `ciudad`) VALUES
(1, 'Guayaquil');
INSERT INTO `ciudades` (`id`, `ciudad`) VALUES
(2, 'Quito');
INSERT INTO `ciudades` (`id`, `ciudad`) VALUES
(3, 'Loja');
INSERT INTO `ciudades` (`id`, `ciudad`) VALUES
(4, 'Machala'),
(5, 'Esmeraldas'),
(6, 'Zaruma'),
(7, 'Cuenca');

INSERT INTO `reserva` (`id`, `usuario`, `nombre`, `contraseña`, `destino`, `fecha_viaje`, `email`, `telefono`) VALUES
(2, 'Joel34', 'Joel Mero', '20478', 'Quito', '2022-04-08', 'joel@gmail.com', '0987456314');
INSERT INTO `reserva` (`id`, `usuario`, `nombre`, `contraseña`, `destino`, `fecha_viaje`, `email`, `telefono`) VALUES
(3, 'andres69', 'Andres Mero', '424234', 'Ba&ntilde;os', '2022-04-30', 'andres@hotmail.com', '0987456314');
INSERT INTO `reserva` (`id`, `usuario`, `nombre`, `contraseña`, `destino`, `fecha_viaje`, `email`, `telefono`) VALUES
(5, 'May2003', 'Maybeth Jimenez', '12123', 'Gal&aacute;pagos', '2022-05-07', 'may@gmail.com', '0987321544');



INSERT INTO `vuelos` (`id`, `ciudad_origen_id`, `ciudad_destino_id`, `fecha_salida`, `fecha_regreso`, `precio`, `duracion`) VALUES
(1, 1, 2, '2022-03-20', '2022-03-25', 150.00, 2);
INSERT INTO `vuelos` (`id`, `ciudad_origen_id`, `ciudad_destino_id`, `fecha_salida`, `fecha_regreso`, `precio`, `duracion`) VALUES
(2, 2, 1, '2022-03-20', '2022-03-25', 150.00, 2);
INSERT INTO `vuelos` (`id`, `ciudad_origen_id`, `ciudad_destino_id`, `fecha_salida`, `fecha_regreso`, `precio`, `duracion`) VALUES
(3, 3, 2, '2022-03-20', '2022-03-25', 150.00, 3);
INSERT INTO `vuelos` (`id`, `ciudad_origen_id`, `ciudad_destino_id`, `fecha_salida`, `fecha_regreso`, `precio`, `duracion`) VALUES
(4, 2, 3, '2022-03-20', '2022-03-25', 150.00, 3),
(5, 3, 1, '2022-03-20', '2022-03-25', 180.00, 4),
(6, 1, 3, '2022-03-20', '2022-03-25', 180.00, 4),
(7, 4, 2, '2022-03-20', '2022-03-25', 120.00, 2),
(8, 2, 4, '2022-03-20', '2022-03-25', 120.00, 2),
(9, 1, 4, '2022-03-20', '2022-03-25', 200.00, 3),
(10, 4, 1, '2022-03-20', '2022-03-25', 200.00, 3),
(11, 3, 4, '2022-03-20', '2022-03-25', 200.00, 1),
(12, 4, 3, '2022-03-20', NULL, 200.00, 1);

INSERT INTO `categoriavehiculo` VALUES (1,'Pequeño',NULL),(2,'Mediano',NULL),(3,'Familiar',NULL),(4,'SUV',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;