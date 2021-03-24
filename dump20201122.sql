CREATE DATABASE  IF NOT EXISTS `seastar_hotelaria2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `seastar_hotelaria2`;
-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: seastar_hotelaria2
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `admLogin` varchar(10) NOT NULL,
  PRIMARY KEY (`admLogin`),
  CONSTRAINT `fk_admLogin` FOREIGN KEY (`admLogin`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES ('-'),('adm_ana'),('adm_bru'),('adm_teteu');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `clienteLogin` varchar(10) NOT NULL,
  `numReservas` int(11) DEFAULT 0,
  `idCupom` varchar(10) DEFAULT '-',
  PRIMARY KEY (`clienteLogin`),
  KEY `fk_idCup` (`idCupom`),
  CONSTRAINT `fk_clienteLog` FOREIGN KEY (`clienteLogin`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `fk_idCup` FOREIGN KEY (`idCupom`) REFERENCES `cupom` (`idCupom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES ('-',0,'-'),('ananeves',0,'-'),('bthalia',0,'-'),('carlaj',8,'-'),('jcarlos',8,'-'),('joana123',5,'-'),('lcrocha',0,'-');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cupom`
--

DROP TABLE IF EXISTS `cupom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cupom` (
  `idCupom` varchar(10) NOT NULL,
  `valorDesc` int(11) NOT NULL DEFAULT 0,
  `admId` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idCupom`),
  KEY `fk_admId` (`admId`),
  CONSTRAINT `fk_admId` FOREIGN KEY (`admId`) REFERENCES `administrador` (`admLogin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cupom`
--

LOCK TABLES `cupom` WRITE;
/*!40000 ALTER TABLE `cupom` DISABLE KEYS */;
INSERT INTO `cupom` VALUES ('-',0,'-'),('friday10',100,'adm_bru'),('FUI10',10,'adm_bru');
/*!40000 ALTER TABLE `cupom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel` (
  `nome` varchar(50) NOT NULL,
  `idHotel` varchar(10) NOT NULL,
  `quartoQtd` int(11) NOT NULL,
  `imagem` varchar(20) DEFAULT NULL,
  `numDiarias` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idHotel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel`
--

LOCK TABLES `hotel` WRITE;
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
INSERT INTO `hotel` VALUES ('Hotel Amanda','hamanda',8,'hotel7.jpg',0),('Hotel Gloria','hgloria',15,'hotel11.jpg',0),('Hotel Lara','hlara',15,'hotel13.jpg',0),('Hotel Paufino','hpaufino',15,'hotel16.jpg',0),('Hotel Raba','hraba',17,'hotel13.jpg',0);
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localizacao`
--

DROP TABLE IF EXISTS `localizacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `localizacao` (
  `idH` varchar(10) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  PRIMARY KEY (`idH`),
  CONSTRAINT `localizacao_ibfk_1` FOREIGN KEY (`idH`) REFERENCES `hotel` (`idHotel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localizacao`
--

LOCK TABLES `localizacao` WRITE;
/*!40000 ALTER TABLE `localizacao` DISABLE KEYS */;
INSERT INTO `localizacao` VALUES ('hamanda','Lagoa Dourada','Centro'),('hgloria','Lagoa Dourada','Centro'),('hlara','Resende Costa','Centro'),('hpaufino','Lagoa Dourada','Centro'),('hraba','Lagoa Dourada','Centro');
/*!40000 ALTER TABLE `localizacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quarto`
--

DROP TABLE IF EXISTS `quarto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quarto` (
  `idHQ` varchar(10) NOT NULL,
  `idQuarto` int(11) NOT NULL AUTO_INCREMENT,
  `valor` int(11) NOT NULL,
  `tipoCama` enum('S','C') NOT NULL,
  `imagem` varchar(30) NOT NULL,
  PRIMARY KEY (`idQuarto`),
  KEY `fk_idHotel2` (`idHQ`),
  CONSTRAINT `fk_idHotel2` FOREIGN KEY (`idHQ`) REFERENCES `hotel` (`idHotel`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quarto`
--

LOCK TABLES `quarto` WRITE;
/*!40000 ALTER TABLE `quarto` DISABLE KEYS */;
INSERT INTO `quarto` VALUES ('hgloria',6,70,'S','quarto10.jpg'),('hgloria',7,4,'S','quarto11.jpg'),('hamanda',9,4,'C','quarto11.jpg'),('hamanda',10,6,'S','quarto4.jpg'),('hlara',11,30,'C','quarto8.jpg'),('hlara',12,5,'S','quarto8.jpg'),('hpaufino',13,60,'S','quarto1.jpg'),('hraba',17,80,'S','quarto12.jpg'),('hraba',18,60,'S','quarto6.jpg');
/*!40000 ALTER TABLE `quarto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva` (
  `idQR` int(11) NOT NULL,
  `idDaReserva` int(11) NOT NULL AUTO_INCREMENT,
  `statuss` enum('D','R','O') DEFAULT 'D',
  `usuarioLogin` varchar(10) NOT NULL,
  `dataEntrada` date DEFAULT '1999-12-31',
  `dataSaida` date DEFAULT '1999-12-31',
  PRIMARY KEY (`idDaReserva`),
  KEY `fk_idHReserva` (`idQR`),
  KEY `fk_clientLogg` (`usuarioLogin`),
  CONSTRAINT `fk_clientLogg` FOREIGN KEY (`usuarioLogin`) REFERENCES `cliente` (`clienteLogin`) ON DELETE CASCADE,
  CONSTRAINT `fk_idHReserva` FOREIGN KEY (`idQR`) REFERENCES `quarto` (`idQuarto`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (6,1,'D','-','0000-00-00','0000-00-00'),(17,2,'D','-','0000-00-00','0000-00-00'),(18,3,'D','-','0000-00-00','0000-00-00'),(9,13,'R','carlaj','2020-11-22','2020-11-30'),(13,14,'R','jcarlos','2020-11-22','2020-11-30'),(18,15,'R','joana123','2020-12-05','2020-12-10');
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `Pnome` varchar(30) NOT NULL,
  `Snome` varchar(30) NOT NULL,
  `idUsuario` varchar(10) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('-','-','-','-','-','-'),('Ana','Flavia','adm_ana','5390489da3971cbbcd22c159d54d24da','analemos22@gmail.com','32998127753'),('Bruce Williss','de Mendonça','adm_bru','ff58ac7e8a159bfb312ee301d4880266','iambruc3@hotmail.com','32998127783'),('Matheus','Piano','adm_teteu','e56b6eea9b0bc782bbb9ea6098ead641','matheuspiano@hotmail.com','32999041419'),('Ana','Leticia','ananeves','analele123','analeticia@oi.com','32998126578'),('Thalia','Bianca','bthalia','thalia123','thaliab@oi.com','32998765677'),('Carla','Joao','carlaj','998a0b86802f387c77bffa2d737c6557','carlajoao@oi.com','32997127783'),('Joao','Carlos','jcarlos','9ad48828b0955513f7cf0f7f6510c8f8','joaocarlos@oi.com','32998128783'),('Joana','Maria','joana123','c689de85871d8325aca2ddef8de173cd','joanamaria2@oi.com','32998127743'),('Leonardo','Rocha','lcrocha','leorocha123','lcrocha@gmail.com','32998129087');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'seastar_hotelaria2'
--

--
-- Dumping routines for database 'seastar_hotelaria2'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-22 21:49:42
