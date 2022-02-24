DROP TABLE IF EXISTS `vehiculo`;
DROP TABLE IF EXISTS `categoriavehiculo`;
CREATE TABLE `categoriavehiculo` (
  `id_categoria_vehiculo` int NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_categoria_vehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


LOCK TABLES `categoriavehiculo` WRITE;
/*!40000 ALTER TABLE `categoriavehiculo` DISABLE KEYS */;
INSERT INTO `categoriavehiculo` VALUES (1,'Pequeño',NULL),(2,'Mediano',NULL),(3,'Familiar',NULL),(4,'SUV',NULL);
/*!40000 ALTER TABLE `categoriavehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;


-- Tabla vehiculos--
DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE `vehiculo` (
  `id_vehiculo` int NOT NULL AUTO_INCREMENT,
  `placa` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `precioDia` double DEFAULT NULL,
  `aire_acondicionado` int DEFAULT NULL,
  `id_categoria` int DEFAULT NULL,
  PRIMARY KEY (`id_vehiculo`),
  KEY `id_categoria_vehiculo_idx` (`id_categoria`),
  CONSTRAINT `id_categoria_vehiculo` FOREIGN KEY (`id_categoria`) REFERENCES `categoriavehiculo` (`id_categoria_vehiculo`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

