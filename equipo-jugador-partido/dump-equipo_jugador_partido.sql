-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: equipo_jugador
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `equipo`
--

DROP TABLE IF EXISTS `equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `socios` int(11) DEFAULT NULL,
  `fundacion` int(11) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo`
--

LOCK TABLES `equipo` WRITE;
/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
INSERT INTO `equipo` VALUES (1,'Real madri',70000,1,'madrid'),(2,'barselona',33,2,'barcelona'),(3,'palencia fc',2147483647,3,'palencia'),(4,'albion',4334,4,'albion'),(5,'berlin fc',3000,1,'berlin');
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jugador`
--

DROP TABLE IF EXISTS `jugador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jugador` (
  `id_jugador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `edad` smallint(6) DEFAULT NULL,
  `equipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jugador`),
  KEY `jugador_equipo_FK` (`equipo`),
  CONSTRAINT `FK_527D6F18C49C530B` FOREIGN KEY (`equipo`) REFERENCES `equipo` (`id_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jugador`
--

LOCK TABLES `jugador` WRITE;
/*!40000 ALTER TABLE `jugador` DISABLE KEYS */;
INSERT INTO `jugador` VALUES (1,'javier','garcia gorbino',30,4),(2,'andrei','ierdna',44,2),(15,'Carlos','Gómez',25,1),(16,'Luis','Martínez',22,1),(17,'Pedro','Sánchez',30,2),(18,'Ana','Lopez',28,2),(19,'María','García',24,3),(20,'Javier','Hernández',27,3),(21,'Sofía','Ruiz',21,4),(22,'Laura','Díaz',26,5),(23,'David','Torres',23,5);
/*!40000 ALTER TABLE `jugador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partido`
--

DROP TABLE IF EXISTS `partido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partido` (
  `id_partido` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipo_local` int(11) DEFAULT NULL,
  `id_equipo_visitante` int(11) DEFAULT NULL,
  `goles_local` int(11) DEFAULT NULL,
  `goles_visitante` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_partido`),
  KEY `partido_equipo_FK` (`id_equipo_local`),
  KEY `partido_equipo_FK_1` (`id_equipo_visitante`),
  CONSTRAINT `FK_4E79750B566B345E` FOREIGN KEY (`id_equipo_local`) REFERENCES `equipo` (`id_equipo`),
  CONSTRAINT `FK_4E79750BBE31F08D` FOREIGN KEY (`id_equipo_visitante`) REFERENCES `equipo` (`id_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partido`
--

LOCK TABLES `partido` WRITE;
/*!40000 ALTER TABLE `partido` DISABLE KEYS */;
INSERT INTO `partido` VALUES (3,1,2,2,3,'2023-01-05'),(4,1,3,4,1,'2023-01-12'),(5,1,4,3,0,'2023-01-19'),(6,1,5,1,2,'2023-01-26'),(9,2,1,2,1,'2023-02-09'),(10,2,3,3,3,'2023-02-16'),(11,2,4,5,0,'2023-02-23'),(12,2,5,1,2,'2023-03-02'),(14,3,1,0,2,'2023-03-16'),(15,3,2,3,5,'2023-03-23'),(16,3,4,2,1,'2023-03-30'),(17,3,5,4,3,'2023-04-06'),(19,3,5,1,0,'2023-04-13'),(20,4,1,2,4,'2023-04-20'),(21,4,2,3,2,'2023-04-27'),(22,4,2,3,2,'2023-04-27'),(23,4,3,1,5,'2023-05-04'),(24,4,5,0,1,'2023-05-11'),(26,5,1,5,0,'2023-05-25'),(27,5,2,1,2,'2023-06-01'),(28,5,3,3,4,'2023-06-08'),(29,5,4,2,1,'2023-06-15');
/*!40000 ALTER TABLE `partido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'equipo_jugador'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-03 23:40:47
