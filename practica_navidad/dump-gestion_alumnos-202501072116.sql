-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: gestion_alumnos
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
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido1` varchar(100) NOT NULL,
  `apellido2` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `curso` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_alumno`),
  UNIQUE KEY `alumnos_dni` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (5,'71956225N','Natan','Blanco','Rodríguez','asdj@masio.com','654897641','2DAW'),(7,'71956224B','Asd','ads','fgafs','sdfdsa@asknfd.com','56746984','1DAW'),(8,'21836H','saodihj','koljsadoi','lkjhnasdk','joshad@skah.com','89765142','sikoahd'),(9,'20596001F','Marco','Arias','Fernandez','kjhnasf@sak.com','654987321','2DAW25'),(10,'52418078C','Isaac','Vara','Gomez','asdfsdf@dsfwe.es','325234567','1GER34'),(11,'67409559D','Daniel','Perez','Gijon','hfdg@sdfsdf.es','435367532','2FE12'),(12,'28321173P','Pablo','Nieto','Conde','hjfuyjt@hjgfyu.com','456345876','2SER25'),(13,'78280519l','Paula','Jara','Sedal','okjhsadf@saio.es','738426348','2DAW25'),(14,'28227595V','Alejandra','Brito','','ghuias@asdh.com','987635454','1DAW25'),(15,'35263528C','Elisabeth','Mata','','asgd@asd.com','987654231','3ECO23'),(16,'76494526E','Juan','Garcia','Polo','ughasid@asjhd.com','765239873','3FER22');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `periodo` varchar(9) DEFAULT NULL,
  `curso` varchar(9) DEFAULT NULL,
  `fecha_presentacion` date DEFAULT NULL,
  `nota` decimal(3,2) DEFAULT NULL,
  `logotipo` blob DEFAULT NULL,
  `pdf_proyecto` varchar(100) DEFAULT NULL,
  `alumno` int(11) DEFAULT NULL,
  `tutor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_proyecto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto`
--

LOCK TABLES `proyecto` WRITE;
/*!40000 ALTER TABLE `proyecto` DISABLE KEYS */;
INSERT INTO `proyecto` VALUES (1,'Sistema de Gestión Escolar','Un sistema web para la gestión integral de escuelas, incluyendo registro de alumnos','mayo','2DAW2025','2025-05-30',9.75,NULL,'sistema_gestion_escolar.pdf',5,8),(2,'Aplicación de Recetas Saludables','Una aplicación móvil que permite a los usuarios descubrir recetas personalizadas según sus preferencias alimenticias.','diciembre','2DAW2024','2024-12-15',8.50,NULL,'recetas_saludables.pdf',7,7),(3,'Plataforma de E-Commerce','Una plataforma de comercio electrónico enfocada en productos artesanales y sostenibles.','mayo','2DAW2024','2024-05-28',9.20,NULL,'ecommerce_artesanal.pdf',8,5);
/*!40000 ALTER TABLE `proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutor`
--

DROP TABLE IF EXISTS `tutor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tutor` (
  `id_tutor` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `tipo_usu` tinyint(1) DEFAULT NULL,
  `baja` tinyint(1) DEFAULT NULL,
  `activar` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id_tutor`),
  UNIQUE KEY `login_unique` (`login`),
  UNIQUE KEY `correo_unique` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutor`
--

LOCK TABLES `tutor` WRITE;
/*!40000 ALTER TABLE `tutor` DISABLE KEYS */;
INSERT INTO `tutor` VALUES (4,'admin','$2y$10$Y.zNOXmAFxJOXbDUlSX6ouTSGVHARlfSMFwW4Mh0jxeks0KIRts/.','admin@example.com','Admin','Admin',1,1,'activo'),(5,'neykkles','$2y$10$a97uhOP2GLYz8TA1peT99eoPkAspnnkpTIFGBkxI6pf/8DYUNXvyC','','Natan','Blanco',2,1,'activo'),(7,'federico','$2y$10$0hr6diV.P5hM4kT89xXegezFyBn4qzrcjItu28VDKxe//43/Bn.gS','federico@example.com','Federico','Garcia',2,1,'activo'),(8,'javi','$2y$10$1W1QQ9ugRxwZ6lsFz2.21ej8eRlJKOOkYci.9yhbNO0sjXqNsEFEG','javi@example.com','Javi','Sii',2,1,'activo');
/*!40000 ALTER TABLE `tutor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'gestion_alumnos'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-07 21:16:21
