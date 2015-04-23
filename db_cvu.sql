CREATE DATABASE  IF NOT EXISTS `markoptic_cvu` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `markoptic_cvu`;
-- MySQL dump 10.13  Distrib 5.6.23, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: markoptic_cvu
-- ------------------------------------------------------
-- Server version	5.6.23

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
-- Table structure for table `CVU`
--

DROP TABLE IF EXISTS `CVU`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CVU` (
  `id` int(11) NOT NULL,
  `fec_nac` date DEFAULT NULL,
  `edad` int(2) DEFAULT NULL,
  `curp` varchar(18) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish_ci DEFAULT NULL,
  `disp_horario` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `viajar` char(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `conacyt` char(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  CONSTRAINT `cvu_usuarios` FOREIGN KEY (`id`) REFERENCES `Usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Cursos`
--

DROP TABLE IF EXISTS `Cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cvu` int(11) NOT NULL,
  `nom_curso` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_curso` text COLLATE utf8_spanish_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cursos_cvu_idx` (`id_cvu`),
  CONSTRAINT `cursos_cvu` FOREIGN KEY (`id_cvu`) REFERENCES `CVU` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Documentos`
--

DROP TABLE IF EXISTS `Documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cvu` int(11) NOT NULL,
  `nom_documento` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dir_documento` text COLLATE utf8_spanish_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `documentos_cvu_idx` (`id_cvu`),
  CONSTRAINT `documentos_cvu` FOREIGN KEY (`id_cvu`) REFERENCES `CVU` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Domicilios`
--

DROP TABLE IF EXISTS `Domicilios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Domicilios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cvu` int(11) NOT NULL,
  `nom_dom` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `domicilio` text COLLATE utf8_spanish_ci,
  `ciudad` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `municipio` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pais` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `domicilio_cvu_idx` (`id_cvu`),
  CONSTRAINT `domicilio_cvu` FOREIGN KEY (`id_cvu`) REFERENCES `CVU` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Domidiomas`
--

DROP TABLE IF EXISTS `Domidiomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Domidiomas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cvu` int(11) NOT NULL,
  `idioma` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `certificacion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `idioma_cvu_idx` (`id_cvu`),
  CONSTRAINT `idioma_cvu` FOREIGN KEY (`id_cvu`) REFERENCES `CVU` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Domtec`
--

DROP TABLE IF EXISTS `Domtec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Domtec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cvu` int(11) NOT NULL,
  `nom_tec` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_tec` text COLLATE utf8_spanish_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `domtec_cvu_idx` (`id_cvu`),
  CONSTRAINT `domtec_cvu` FOREIGN KEY (`id_cvu`) REFERENCES `CVU` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Escuelas`
--

DROP TABLE IF EXISTS `Escuelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Escuelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cvu` int(11) NOT NULL,
  `nom_esc` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel_esc` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `escuelas_cvu_idx` (`id_cvu`),
  CONSTRAINT `escuelas_cvu` FOREIGN KEY (`id_cvu`) REFERENCES `CVU` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Especialidades`
--

DROP TABLE IF EXISTS `Especialidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Especialidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cvu` int(11) NOT NULL,
  `nom_esp` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_esp` text COLLATE utf8_spanish_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `esp:cvu_idx` (`id_cvu`),
  CONSTRAINT `esp:cvu` FOREIGN KEY (`id_cvu`) REFERENCES `CVU` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Histproy`
--

DROP TABLE IF EXISTS `Histproy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Histproy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cvu` int(11) NOT NULL,
  `nom_proy` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_proy` text COLLATE utf8_spanish_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `hproy_cvu_idx` (`id_cvu`),
  CONSTRAINT `hproy_cvu` FOREIGN KEY (`id_cvu`) REFERENCES `CVU` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Perfiles`
--

DROP TABLE IF EXISTS `Perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_perfil` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `desc_perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Publicaciones`
--

DROP TABLE IF EXISTS `Publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Publicaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cvu` int(11) NOT NULL,
  `nom_pub` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_pub` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_pub` text COLLATE utf8_spanish_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `publicaciones_cvu_idx` (`id_cvu`),
  CONSTRAINT `publicaciones_cvu` FOREIGN KEY (`id_cvu`) REFERENCES `CVU` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Telefonos`
--

DROP TABLE IF EXISTS `Telefonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Telefonos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cvu` int(11) NOT NULL,
  `lada` int(11) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `telefonos_cvu_idx` (`id_cvu`),
  CONSTRAINT `telefonos_cvu` FOREIGN KEY (`id_cvu`) REFERENCES `CVU` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Titulos`
--

DROP TABLE IF EXISTS `Titulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Titulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cvu` int(11) NOT NULL,
  `nom_titulo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_titulo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_titulo` text COLLATE utf8_spanish_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `titulos_cvu_idx` (`id_cvu`),
  CONSTRAINT `titulos_cvu` FOREIGN KEY (`id_cvu`) REFERENCES `CVU` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Trabajos`
--

DROP TABLE IF EXISTS `Trabajos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Trabajos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cvu` int(11) NOT NULL,
  `lugar_trabajo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `puesto_trabajo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `jefe_trabajo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sigue_trabajo` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tiempo_trabajo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_trabajo` text COLLATE utf8_spanish_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `trabajos_cvu_idx` (`id_cvu`),
  CONSTRAINT `trabajos_cvu` FOREIGN KEY (`id_cvu`) REFERENCES `CVU` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `Usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `idPerfil_idx` (`id_perfil`),
  CONSTRAINT `Perfiles` FOREIGN KEY (`id_perfil`) REFERENCES `Perfiles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-23 10:38:07
