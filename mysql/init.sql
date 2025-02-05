DROP DATABASE IF EXISTS liga_solidaria;
CREATE DATABASE liga_solidaria;
USE liga_solidaria;
-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: lsfpc
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `centros`
--

DROP TABLE IF EXISTS `centros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `centros` (
  `id_centro` int NOT NULL AUTO_INCREMENT,
  `fk_sede` int NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `anotaciones` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_centro`),
  KEY `centros_fk_1` (`fk_sede`),
  CONSTRAINT `centros_fk_1` FOREIGN KEY (`fk_sede`) REFERENCES `sedes` (`id_sede`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centros`
--

LOCK TABLES `centros` WRITE;
/*!40000 ALTER TABLE `centros` DISABLE KEYS */;
/*!40000 ALTER TABLE `centros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipos`
--

DROP TABLE IF EXISTS `equipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipos` (
  `id_equipo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `fk_centro` int DEFAULT NULL,
  `grupo` tinyint(1) DEFAULT NULL,
  `fk_foto` int DEFAULT NULL,
  PRIMARY KEY (`id_equipo`),
  KEY `equipos_fk_1` (`fk_centro`),
  CONSTRAINT `equipos_fk_1` FOREIGN KEY (`fk_centro`) REFERENCES `centros` (`id_centro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipos`
--

LOCK TABLES `equipos` WRITE;
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudios`
--

DROP TABLE IF EXISTS `estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudios` (
  `id_estudio` int NOT NULL AUTO_INCREMENT,
  `fk_centro` int NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `curso` int DEFAULT NULL,
  PRIMARY KEY (`id_estudio`),
  KEY `estudios_fk` (`fk_centro`),
  CONSTRAINT `estudios_fk` FOREIGN KEY (`fk_centro`) REFERENCES `centros` (`id_centro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudios`
--

LOCK TABLES `estudios` WRITE;
/*!40000 ALTER TABLE `estudios` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localizaciones`
--

DROP TABLE IF EXISTS `localizaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `localizaciones` (
  `id_localizacion` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `anotaciones` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_localizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localizaciones`
--

LOCK TABLES `localizaciones` WRITE;
/*!40000 ALTER TABLE `localizaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `localizaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multimedia`
--

DROP TABLE IF EXISTS `multimedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `multimedia` (
  `id_media` int NOT NULL AUTO_INCREMENT,
  `foto` text NOT NULL,
  `descripcion` varchar(100) default NULL,
  `fk_partido` int DEFAULT NULL,
  `fk_publicacion` int DEFAULT NULL,
  `fk_equipo` int DEFAULT NULL,
  `fk_participante` int DEFAULT NULL,
  `fk_reto` int DEFAULT NULL,
  PRIMARY KEY (`id_media`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multimedia`
--

LOCK TABLES `multimedia` WRITE;
/*!40000 ALTER TABLE `multimedia` DISABLE KEYS */;
/*!40000 ALTER TABLE `multimedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participantes`
--

DROP TABLE IF EXISTS `participantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `participantes` (
  `id_participante` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido1` varchar(30) DEFAULT NULL,
  `apellido2` varchar(30) DEFAULT NULL,
  `fk_foto` int DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `dni` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id_participante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participantes`
--

LOCK TABLES `participantes` WRITE;
/*!40000 ALTER TABLE `participantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `participantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participantes_equipos`
--

DROP TABLE IF EXISTS `participantes_equipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `participantes_equipos` (
  `id_participante_equipo` int NOT NULL AUTO_INCREMENT,
  `fk_equipo` int NOT NULL,
  `fk_participante` int NOT NULL,
  `fk_estudios` int NOT NULL,
  `rol` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_participante_equipo`),
  KEY `participantes_equipos_fk_1` (`fk_equipo`),
  KEY `participantes_equipos_fk_2` (`fk_participante`),
  KEY `participantes_equipos_fk_3` (`fk_estudios`),
  CONSTRAINT `participantes_equipos_fk_1` FOREIGN KEY (`fk_equipo`) REFERENCES `equipos` (`id_equipo`),
  CONSTRAINT `participantes_equipos_fk_2` FOREIGN KEY (`fk_participante`) REFERENCES `participantes` (`id_participante`),
  CONSTRAINT `participantes_equipos_fk_3` FOREIGN KEY (`fk_estudios`) REFERENCES `estudios` (`id_estudio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participantes_equipos`
--

LOCK TABLES `participantes_equipos` WRITE;
/*!40000 ALTER TABLE `participantes_equipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `participantes_equipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partidos`
--

DROP TABLE IF EXISTS `partidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partidos` (
  `id_partido` int NOT NULL AUTO_INCREMENT,
  `fk_torneo` int NOT NULL,
  `eq_local` int DEFAULT NULL,
  `eq_visitante` int DEFAULT NULL,
  `goles_local` int DEFAULT NULL,
  `goles_visitante` int DEFAULT NULL,
  `fecha_partido` date DEFAULT NULL,
  `hora_partido` time DEFAULT NULL,
  `fases` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_partido`),
  KEY `partidos_fk_1` (`eq_local`),
  KEY `partidos_fk_2` (`eq_visitante`),
  KEY `partidos_fk_3` (`fk_torneo`),
  CONSTRAINT `partidos_fk_1` FOREIGN KEY (`eq_local`) REFERENCES `equipos` (`id_equipo`),
  CONSTRAINT `partidos_fk_2` FOREIGN KEY (`eq_visitante`) REFERENCES `equipos` (`id_equipo`),
  CONSTRAINT `partidos_fk_3` FOREIGN KEY (`fk_torneo`) REFERENCES `torneos` (`id_torneo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partidos`
--

LOCK TABLES `partidos` WRITE;
/*!40000 ALTER TABLE `partidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `partidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patrocinadores`
--

DROP TABLE IF EXISTS `patrocinadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patrocinadores` (
  `id_patrocinador` int NOT NULL AUTO_INCREMENT,
  `fk_torneo` int NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `descripcion` varchar(1500) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `fk_logo` int NOT NULL,
  PRIMARY KEY (`id_patrocinador`),
  KEY `patrocinadores_fk_1` (`fk_torneo`),
  KEY `patrocinadores_fk_2` (`fk_logo`),
  CONSTRAINT `patrocinadores_fk_1` FOREIGN KEY (`fk_torneo`) REFERENCES `torneos` (`id_torneo`),
  CONSTRAINT `patrocinadores_fk_2` FOREIGN KEY (`fk_logo`) REFERENCES `multimedia` (`id_media`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patrocinadores`
--

LOCK TABLES `patrocinadores` WRITE;
/*!40000 ALTER TABLE `patrocinadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `patrocinadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicaciones`
--

DROP TABLE IF EXISTS `publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publicaciones` (
  `id_publicacion` int NOT NULL AUTO_INCREMENT,
  `fk_centro` int NOT NULL,
  `fk_torneo` int NOT NULL,
  `fk_usuario` int DEFAULT NULL,
  `fecha` date NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `subtitulo` varchar(60) NOT NULL,
  `contenido` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_publicacion`),
  KEY `publicaciones_fk_1` (`fk_centro`),
  KEY `publicaciones_fk_2` (`fk_torneo`),
  CONSTRAINT `publicaciones_fk_1` FOREIGN KEY (`fk_centro`) REFERENCES `centros` (`id_centro`),
  CONSTRAINT `publicaciones_fk_2` FOREIGN KEY (`fk_torneo`) REFERENCES `torneos` (`id_torneo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicaciones`
--

LOCK TABLES `publicaciones` WRITE;
/*!40000 ALTER TABLE `publicaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retos`
--

DROP TABLE IF EXISTS `retos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `retos` (
  `id_reto` int NOT NULL AUTO_INCREMENT,
  `fk_centro` int NOT NULL,
  `fk_torneo` int NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `estudios` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_reto`),
  KEY `retos_fk_1` (`fk_centro`),
  KEY `retos_fk_2` (`fk_torneo`),
  CONSTRAINT `retos_fk_1` FOREIGN KEY (`fk_centro`) REFERENCES `centros` (`id_centro`),
  CONSTRAINT `retos_fk_2` FOREIGN KEY (`fk_torneo`) REFERENCES `torneos` (`id_torneo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retos`
--

LOCK TABLES `retos` WRITE;
/*!40000 ALTER TABLE `retos` DISABLE KEYS */;
/*!40000 ALTER TABLE `retos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sedes`
--

DROP TABLE IF EXISTS `sedes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sedes` (
  `id_sede` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `anotaciones` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_sede`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sedes`
--

LOCK TABLES `sedes` WRITE;
/*!40000 ALTER TABLE `sedes` DISABLE KEYS */;
/*!40000 ALTER TABLE `sedes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `torneos`
--

DROP TABLE IF EXISTS `torneos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `torneos` (
  `id_torneo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `fk_logo` int DEFAULT NULL,
  `fk_localizacion` int NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`id_torneo`),
  KEY `torneos_fk_1` (`fk_localizacion`),
  CONSTRAINT `torneos_fk_1` FOREIGN KEY (`fk_localizacion`) REFERENCES `localizaciones` (`id_localizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `torneos`
--

LOCK TABLES `torneos` WRITE;
/*!40000 ALTER TABLE `torneos` DISABLE KEYS */;
/*!40000 ALTER TABLE `torneos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `fk_centro` int NOT NULL,
  `rol` tinyint(1) DEFAULT '0',
  `activo` tinyint(1) DEFAULT '1',
  `contacto_centro` tinyint(1) DEFAULT '1',
  `informacion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'lsfpc'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-27 13:16:12


INSERT INTO `localizaciones` (`id_localizacion`, `nombre`, `direccion`, `anotaciones`) VALUES
(1, 'Polideportivo Emilio Amavisca', 'C. Reconquista de Sevilla, 39777 Laredo, Cantabria', NULL),
(2, 'Pabellón Municipal La Habana Vieja', 'Pabellón Deportivo, C. Pintor Varela, s/n, 39300 ', NULL),
(3, 'Pabellón deportivo IES Augusto González de Linares', 'Av. Primero de Mayo, 1, 39011 Santander, Cantabria', NULL),
(4, 'Pabellón Exterior de La Albericia', 'Av. del Deporte, 15, 39011 Santander, Cantabria', NULL);


INSERT INTO `multimedia` (`id_media`, `foto`, `fk_partido`, `fk_publicacion`, `fk_equipo`, `fk_participante`, `fk_reto`) VALUES
(1, 'acicatech_blanco.png', NULL, NULL, NULL, NULL, NULL),
(2, 'cantabria_informatica_blanco.png', NULL, NULL, NULL, NULL, NULL),
(3, 'CIC_blanco.png', NULL, NULL, NULL, NULL, NULL),
(4, 'Deduce_Data_Solutions_blanco.png', NULL, NULL, NULL, NULL, NULL),
(5, 'deode_blanco.png', NULL, NULL, NULL, NULL, NULL),
(6, 'ec.png', NULL, NULL, NULL, NULL, NULL),
(7, 'EMI_hb.png', NULL, NULL, NULL, NULL, NULL),
(8, 'infortec_blanco.png', NULL, NULL, NULL, NULL, NULL),
(9, 'netkia_blanco.png', NULL, NULL, NULL, NULL, NULL),
(10, 'seidor_blanco.png', NULL, NULL, NULL, NULL, NULL);

INSERT INTO `torneos` (`id_torneo`, `nombre`, `fk_logo`, `fk_localizacion`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 'Liga Solidaria FP Cantabria - Laredo', NULL, 1, '2025-02-21', '2025-06-21'),
(2, 'Liga Solidaria FP Cantabria - Torrelavega', NULL, 2, '2025-02-14', '2025-06-21'),
(3, 'Liga Solidaria FP Cantabria - Santander', NULL, 3, '2025-03-21', '2025-06-21'),
(4, 'Liga Solidaria FP Cantabria', NULL, 4, '2025-04-29', '2025-06-21');


INSERT INTO `patrocinadores` (`id_patrocinador`, `fk_torneo`, `nombre`, `descripcion`, `direccion`, `telefono`, `email`, `fk_logo`) VALUES
(1, 3, 'Acicatech Servicios Tecnológicos', NULL, NULL, NULL, NULL, 1),
(2, 3, 'Cantabria Informática', NULL, NULL, NULL, NULL, 2),
(3, 3, 'CIC', NULL, NULL, NULL, NULL, 3),
(4, 3, 'Deduce Data Solutions', NULL, NULL, NULL, NULL, 4),
(5, 3, 'Deode', NULL, NULL, NULL, NULL, 5),
(6, 3, 'EC', NULL, NULL, NULL, NULL, 6),
(7, 3, 'EMI Suite', NULL, NULL, NULL, NULL, 7),
(8, 3, 'Infortec', NULL, NULL, NULL, NULL, 8),
(9, 3, 'Netkia', NULL, NULL, NULL, NULL, 9),
(10, 3, 'Seidor', NULL, NULL, NULL, NULL, 10);

INSERT INTO `sedes` (`id_sede`, `nombre`, `direccion`, `anotaciones`) VALUES
(1, 'Santander', 'Pabellón IES Augusto González de Linares', 'Av. Primero de Mayo, 1, 39011 Santander, Cantabria'),
(2, 'Torrelavega', 'Pabellón Municipal La Habana Vieja', 'Pabellón Deportivo, C. Pintor Varela, s/n, 39300 Torrelavega, Cantabria'),
(3, 'Laredo', 'Polideportivo Emilio Amavisca', 'C. Reconquista de Sevilla, 39777 Laredo, Cantabria');


INSERT INTO `centros` (`id_centro`, `fk_sede`, `nombre`, `direccion`, `anotaciones`) VALUES
(1, 1, 'IES Augusto González de Linares', 'Av. Primero de Mayo, 1, 39011 Santander, Cantabria', NULL),
(2, 1, 'IES Peñacastillo', 'C. Eduardo García, 0, 39011 Santander, Cantabria', NULL),
(3, 3, 'IES Fuente Fresnedo', 'C. Reconquista de Sevilla, 45, 39770 Laredo, Cantabria', NULL),
(4, 3, 'IES Ataulfo Argenta', 'P.º Menéndez Pelayo, 4, 39700 Castro-Urdiales, Cantabria', NULL),
(5, 2, 'IES Besaya', 'Av. Oviedo, 2, 39300 Torres, Cantabria', NULL),
(6, 2, 'IES Miguel Herrero Pereda', 'P.º de Julio Hauzeur, 59, 39300 Torrelavega, Cantabria', NULL),
(7, 2, 'IES Zapatón', 'Av. de la Constitución, 7, 39300 Torrelavega, Cantabria', NULL);



