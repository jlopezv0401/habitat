-- MySQL dump 10.13  Distrib 5.5.28, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: habitat
-- ------------------------------------------------------
-- Server version	5.5.28-0ubuntu0.12.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Calificacion`
--

DROP TABLE IF EXISTS `Calificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Calificacion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_intervalo` bigint(20) NOT NULL,
  `id_participante` bigint(20) NOT NULL,
  `calificacion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `calificacion_intervalo_fk` (`id_intervalo`),
  KEY `calificacion_participante_fk` (`id_participante`),
  CONSTRAINT `calificacion_intervalo_fk` FOREIGN KEY (`id_intervalo`) REFERENCES `Intervalo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calificacion_participante_fk` FOREIGN KEY (`id_participante`) REFERENCES `Participante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Calificacion`
--

LOCK TABLES `Calificacion` WRITE;
/*!40000 ALTER TABLE `Calificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `Calificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Carpa`
--

DROP TABLE IF EXISTS `Carpa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Carpa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_evento` bigint(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carpa_evento_fk` (`id_evento`),
  CONSTRAINT `carpa_evento_fk` FOREIGN KEY (`id_evento`) REFERENCES `Evento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Carpa`
--

LOCK TABLES `Carpa` WRITE;
/*!40000 ALTER TABLE `Carpa` DISABLE KEYS */;
INSERT INTO `Carpa` VALUES (1,1,'Carpa1');
/*!40000 ALTER TABLE `Carpa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Colaborador`
--

DROP TABLE IF EXISTS `Colaborador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Colaborador` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `tipo_usuario` enum('Administrador','Colaborador') COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Colaborador`
--

LOCK TABLES `Colaborador` WRITE;
/*!40000 ALTER TABLE `Colaborador` DISABLE KEYS */;
INSERT INTO `Colaborador` VALUES (2,'admin','WGJWZQhiAWILbg==','Administrador'),(3,'colaborador1','CjICOlQ/DWYPZgpsVSELZlI0UTtTd1Ng','Colaborador');
/*!40000 ALTER TABLE `Colaborador` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `insertar_colaborador` AFTER INSERT ON `Colaborador`
    FOR EACH ROW BEGIN
                INSERT INTO Colaborador_Personal VALUES (NEW.id, '', '', '', '', '','', '', '');
            END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Colaborador_Personal`
--

DROP TABLE IF EXISTS `Colaborador_Personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Colaborador_Personal` (
  `id_colaborador` bigint(20) NOT NULL DEFAULT '0',
  `nombre` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `apaterno` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `amaterno` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `sexo` enum('H','M') COLLATE utf8_bin DEFAULT NULL,
  `edad` int(11) NOT NULL,
  `direccion` text COLLATE utf8_bin,
  `telefono` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_colaborador`),
  CONSTRAINT `colaborador_personal_colaborador_fk` FOREIGN KEY (`id_colaborador`) REFERENCES `Colaborador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Colaborador_Personal`
--

LOCK TABLES `Colaborador_Personal` WRITE;
/*!40000 ALTER TABLE `Colaborador_Personal` DISABLE KEYS */;
INSERT INTO `Colaborador_Personal` VALUES (2,'','','','',0,'','',''),(3,'','','','',0,'','','');
/*!40000 ALTER TABLE `Colaborador_Personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Dinamica`
--

DROP TABLE IF EXISTS `Dinamica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Dinamica` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_programa` bigint(20) NOT NULL,
  `id_metrica` bigint(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `hora_inicio` datetime NOT NULL,
  `hora_fin` datetime NOT NULL,
  `descripcion` text COLLATE utf8_bin,
  PRIMARY KEY (`id`),
  KEY `dinamica_area_fk` (`id_programa`),
  KEY `dinamica_metrica_fk` (`id_metrica`),
  CONSTRAINT `dinamica_area_fk` FOREIGN KEY (`id_programa`) REFERENCES `Programa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dinamica_metrica_fk` FOREIGN KEY (`id_metrica`) REFERENCES `Metrica` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Dinamica`
--

LOCK TABLES `Dinamica` WRITE;
/*!40000 ALTER TABLE `Dinamica` DISABLE KEYS */;
INSERT INTO `Dinamica` VALUES (2,1,2,'Dinamica','2013-03-11 00:00:00','2013-03-11 00:00:00','<p>\n	Uno</p>\n'),(3,1,2,'Dinamica1','2013-03-11 00:00:00','2013-03-11 00:00:00','<p>\n	Dos</p>\n');
/*!40000 ALTER TABLE `Dinamica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Dinamica_Colaborador`
--

DROP TABLE IF EXISTS `Dinamica_Colaborador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Dinamica_Colaborador` (
  `id_dinamica` bigint(20) NOT NULL,
  `id_colaborador` bigint(20) NOT NULL,
  `responsable` tinyint(1) DEFAULT NULL,
  `lista` int(11) DEFAULT NULL,
  KEY `dinamica_colaborador1_fk` (`id_colaborador`),
  KEY `dinamica_colaborador2_fk` (`id_dinamica`),
  CONSTRAINT `dinamica_colaborador1_fk` FOREIGN KEY (`id_colaborador`) REFERENCES `Colaborador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dinamica_colaborador2_fk` FOREIGN KEY (`id_dinamica`) REFERENCES `Dinamica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Dinamica_Colaborador`
--

LOCK TABLES `Dinamica_Colaborador` WRITE;
/*!40000 ALTER TABLE `Dinamica_Colaborador` DISABLE KEYS */;
INSERT INTO `Dinamica_Colaborador` VALUES (2,3,NULL,0),(3,3,NULL,0);
/*!40000 ALTER TABLE `Dinamica_Colaborador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Dinamica_Paquete`
--

DROP TABLE IF EXISTS `Dinamica_Paquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Dinamica_Paquete` (
  `id_dinamica` bigint(20) NOT NULL,
  `id_paquete` bigint(20) NOT NULL,
  `lista` int(11) DEFAULT NULL,
  KEY `dinamica_paquete1_fk` (`id_paquete`),
  KEY `dinamica_paquete2_fk` (`id_dinamica`),
  CONSTRAINT `dinamica_paquete1_fk` FOREIGN KEY (`id_paquete`) REFERENCES `Paquete` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dinamica_paquete2_fk` FOREIGN KEY (`id_dinamica`) REFERENCES `Dinamica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Dinamica_Paquete`
--

LOCK TABLES `Dinamica_Paquete` WRITE;
/*!40000 ALTER TABLE `Dinamica_Paquete` DISABLE KEYS */;
INSERT INTO `Dinamica_Paquete` VALUES (2,1,0),(3,1,0);
/*!40000 ALTER TABLE `Dinamica_Paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Evento`
--

DROP TABLE IF EXISTS `Evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Evento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ubicacion` text COLLATE utf8_bin,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Evento`
--

LOCK TABLES `Evento` WRITE;
/*!40000 ALTER TABLE `Evento` DISABLE KEYS */;
INSERT INTO `Evento` VALUES (1,'Evento1','<p>\n	Evento1</p>\n','2013-03-07','2013-03-23');
/*!40000 ALTER TABLE `Evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Intervalo`
--

DROP TABLE IF EXISTS `Intervalo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Intervalo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_metrica` bigint(20) NOT NULL,
  `intervalo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `descripcion` text COLLATE utf8_bin,
  PRIMARY KEY (`id`),
  KEY `intervalo_metrica_fk` (`id_metrica`),
  CONSTRAINT `intervalo_metrica_fk` FOREIGN KEY (`id_metrica`) REFERENCES `Metrica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Intervalo`
--

LOCK TABLES `Intervalo` WRITE;
/*!40000 ALTER TABLE `Intervalo` DISABLE KEYS */;
INSERT INTO `Intervalo` VALUES (2,2,'0','<p>\n	:)</p>\n'),(3,2,'1','<p>\n	:|</p>\n'),(4,2,'2','<p>\n	:(</p>\n');
/*!40000 ALTER TABLE `Intervalo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Material`
--

DROP TABLE IF EXISTS `Material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Material` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `existencia` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Material`
--

LOCK TABLES `Material` WRITE;
/*!40000 ALTER TABLE `Material` DISABLE KEYS */;
INSERT INTO `Material` VALUES (1,'Material1',50,'<p>\n	Material1</p>\n');
/*!40000 ALTER TABLE `Material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Metrica`
--

DROP TABLE IF EXISTS `Metrica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Metrica` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `valor_medir` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `rango_inicio` int(11) NOT NULL,
  `rango_fin` int(11) NOT NULL,
  `no_intervalo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Metrica`
--

LOCK TABLES `Metrica` WRITE;
/*!40000 ALTER TABLE `Metrica` DISABLE KEYS */;
INSERT INTO `Metrica` VALUES (2,'Metrica Satisfaccion','Satisfaccion',1,3,3);
/*!40000 ALTER TABLE `Metrica` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER Insertar
        AFTER INSERT ON Metrica FOR EACH ROW
        BEGIN
            DECLARE x INT;
            SET x = 0;
            WHILE x < NEW.no_intervalo DO
                INSERT INTO Intervalo VALUES ("", NEW.id, x, "Cambiar nombre Intervalo");
                SET x = x+1;
            END WHILE;
        END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Paquete`
--

DROP TABLE IF EXISTS `Paquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Paquete` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `id_material` bigint(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `paquete_material_fk` (`id_material`),
  CONSTRAINT `paquete_material_fk` FOREIGN KEY (`id_material`) REFERENCES `Material` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Paquete`
--

LOCK TABLES `Paquete` WRITE;
/*!40000 ALTER TABLE `Paquete` DISABLE KEYS */;
INSERT INTO `Paquete` VALUES (1,'Paquete1',1,5);
/*!40000 ALTER TABLE `Paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Participante`
--

DROP TABLE IF EXISTS `Participante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Participante` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_evento` bigint(20) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `apaterno` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `amaterno` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `sexo` enum('H','M') COLLATE utf8_bin DEFAULT NULL,
  `edad` int(11) NOT NULL,
  `telefono` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Participante`
--

LOCK TABLES `Participante` WRITE;
/*!40000 ALTER TABLE `Participante` DISABLE KEYS */;
INSERT INTO `Participante` VALUES (1,1,'Participante1','Participante1','Participante1','H',23,'44344443','Participante1');
/*!40000 ALTER TABLE `Participante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Programa`
--

DROP TABLE IF EXISTS `Programa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Programa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_carpa` bigint(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `descripcion` text COLLATE utf8_bin,
  PRIMARY KEY (`id`),
  KEY `programa_carpa_fk` (`id_carpa`),
  CONSTRAINT `programa_carpa_fk` FOREIGN KEY (`id_carpa`) REFERENCES `Carpa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Programa`
--

LOCK TABLES `Programa` WRITE;
/*!40000 ALTER TABLE `Programa` DISABLE KEYS */;
INSERT INTO `Programa` VALUES (1,1,'Programa1','<p>\n	Programa1</p>\n');
/*!40000 ALTER TABLE `Programa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-03-11 19:24:32
