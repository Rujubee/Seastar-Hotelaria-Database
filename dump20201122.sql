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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `clienteLogin` varchar(10) NOT NULL,
  `numReservas` int(11) DEFAULT 0,
  `cupomCliente` varchar(10) DEFAULT '-',
  PRIMARY KEY (`clienteLogin`),
  KEY `fk_idCup` (`cupomCliente`),
  CONSTRAINT `fk_clienteLog` FOREIGN KEY (`clienteLogin`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `fk_idCup` FOREIGN KEY (`cupomCliente`) REFERENCES `cupom` (`idCupom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `feriado`
--

DROP TABLE IF EXISTS `feriado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feriado` (
  `adm` varchar(10) NOT NULL,
  `dataFeriado` date NOT NULL,
  `feriado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dataFeriado`),
  KEY `fk_adm` (`adm`),
  CONSTRAINT `fk_adm` FOREIGN KEY (`adm`) REFERENCES `administrador` (`admLogin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel` (
  `nome` varchar(50) NOT NULL,
  `idHotel` varchar(10) NOT NULL,
  `imagem` varchar(20) DEFAULT NULL,
  `numDiarias` int(11) NOT NULL DEFAULT 0,
  `receita` int(11) DEFAULT 0,
  PRIMARY KEY (`idHotel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `valorTotal` int(11) DEFAULT 0,
  PRIMARY KEY (`idDaReserva`),
  KEY `fk_idHReserva` (`idQR`),
  KEY `fk_clientLogg` (`usuarioLogin`),
  CONSTRAINT `fk_clientLogg` FOREIGN KEY (`usuarioLogin`) REFERENCES `cliente` (`clienteLogin`) ON DELETE CASCADE,
  CONSTRAINT `fk_idHReserva` FOREIGN KEY (`idQR`) REFERENCES `quarto` (`idQuarto`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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

-- Dump completed on 2021-03-23 23:49:57
