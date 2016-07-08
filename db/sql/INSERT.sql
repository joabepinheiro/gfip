-- MySQL dump 10.13  Distrib 5.6.30, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: gfip
-- ------------------------------------------------------
-- Server version	5.6.30-0ubuntu0.14.04.1

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
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cartao`
--

LOCK TABLES `cartao` WRITE;
/*!40000 ALTER TABLE `cartao` DISABLE KEYS */;
INSERT INTO `cartao` VALUES (1,'Riachuelo','Mastercard',12,20,480,1,1);
/*!40000 ALTER TABLE `cartao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Salário','receita',1,2),(2,'Aluguel','despesa',1,2),(3,'Água','despesa',1,1),(4,'Supermercado','despesa',1,1),(5,'Telefone','despesa',1,1),(6,'Alimentação','despesa',1,1);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `chamado`
--

LOCK TABLES `chamado` WRITE;
/*!40000 ALTER TABLE `chamado` DISABLE KEYS */;
/*!40000 ALTER TABLE `chamado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,2),(2,3);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `consultor`
--

LOCK TABLES `consultor` WRITE;
/*!40000 ALTER TABLE `consultor` DISABLE KEYS */;
INSERT INTO `consultor` VALUES (1,1);
/*!40000 ALTER TABLE `consultor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `conta`
--

LOCK TABLES `conta` WRITE;
/*!40000 ALTER TABLE `conta` DISABLE KEYS */;
INSERT INTO `conta` VALUES (1,'Banco do Brasil','corrente',1000,1,2),(2,'Carteira','especie',400,1,2);
/*!40000 ALTER TABLE `conta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `conversa`
--

LOCK TABLES `conversa` WRITE;
/*!40000 ALTER TABLE `conversa` DISABLE KEYS */;
/*!40000 ALTER TABLE `conversa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `despesa`
--

LOCK TABLES `despesa` WRITE;
/*!40000 ALTER TABLE `despesa` DISABLE KEYS */;
INSERT INTO `despesa` VALUES (3,'50','2016-06-27','Almoço no  xópis',6,2,NULL,'1'),(4,'70','2016-07-11','Feira no CEASA',6,2,NULL,'1'),(5,'90','2016-06-26','Conta de água',3,1,NULL,'1');
/*!40000 ALTER TABLE `despesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `despesa_programada`
--

LOCK TABLES `despesa_programada` WRITE;
/*!40000 ALTER TABLE `despesa_programada` DISABLE KEYS */;
/*!40000 ALTER TABLE `despesa_programada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `receita`
--

LOCK TABLES `receita` WRITE;
/*!40000 ALTER TABLE `receita` DISABLE KEYS */;
INSERT INTO `receita` VALUES (5,788,'2016-07-05','Salário',0,1,1,1,1);
/*!40000 ALTER TABLE `receita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `receita_programada`
--

LOCK TABLES `receita_programada` WRITE;
/*!40000 ALTER TABLE `receita_programada` DISABLE KEYS */;
/*!40000 ALTER TABLE `receita_programada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `transferencia`
--

LOCK TABLES `transferencia` WRITE;
/*!40000 ALTER TABLE `transferencia` DISABLE KEYS */;
INSERT INTO `transferencia` VALUES (4,'2016-07-08 12:27:32',10,2,1,1),(5,'2016-07-08 12:27:48',1000,1,2,1);
/*!40000 ALTER TABLE `transferencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Giuliano','giuliano@gmail.com','Jm/tJ4ar','2016-06-26 18:22:05','2016-06-26 20:18:13','consultor',1),(2,'Joabe Pinheiro','joabepinhero@gmail.com','Jm/tJ4ar','2016-06-26 18:22:05','2016-06-26 18:22:05','cliente',1),(3,'Jose Ramalho','joseramalho@gmail.com','Jm/tJ4ar','2016-06-26 21:32:53','2016-06-26 21:32:53','cliente',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-08 16:47:32
