-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: youtof
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (16,'Maxichat'),(17,'Hibou !'),(29,'rrfgvsfdqzd'),(30,'dzdzdzdzdzd');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picture` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `legend` tinytext,
  `upload_date` datetime NOT NULL,
  `resolution` float(4,2) NOT NULL,
  `filesize` mediumint(8) unsigned NOT NULL,
  `uploader_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture`
--

LOCK TABLES `picture` WRITE;
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
INSERT INTO `picture` VALUES (9,'chat !!!','2016-12-09 10:02:28',0.28,50664,2),(10,'duo','2016-12-09 10:03:53',0.22,71142,2),(11,'','2016-12-09 10:04:00',0.79,44484,2),(12,'ez','2016-12-09 10:04:11',3.66,252601,2),(14,'','2016-12-09 10:16:00',0.32,222341,2),(15,'','2016-12-09 10:17:04',1.88,749477,2),(16,'','2016-12-09 10:17:11',1.01,114847,2),(17,'','2016-12-09 10:19:06',4.00,1393646,2),(18,'BoB','2016-12-09 10:19:17',0.18,34072,2),(19,'poney','2016-12-09 10:21:42',0.10,65149,2),(20,'','2016-12-09 10:21:57',0.81,79460,2),(21,'','2016-12-09 10:22:13',0.34,162119,2),(23,'','2016-12-09 12:40:28',0.04,1624885,2),(24,'','2016-12-09 13:12:51',0.04,351176,2),(25,'','2016-12-09 13:13:13',0.04,1136012,2),(26,'','2016-12-09 13:15:00',0.07,1384752,2),(27,'','2016-12-09 13:15:16',0.12,2009441,2),(28,'hibou','2016-12-09 13:15:52',0.05,1859896,2),(29,'','2016-12-09 13:19:58',0.24,119596,2),(30,'','2016-12-09 13:21:20',0.92,244660,2),(31,'','2016-12-09 13:22:51',0.09,108305,2),(32,'','2016-12-09 13:24:54',0.09,18695,2),(33,'','2016-12-09 13:26:54',0.07,35766,2),(34,'','2016-12-09 13:27:57',0.12,14431,2),(35,'Trop la classe','2016-12-13 09:15:37',0.52,49006,2),(39,'duo en png','2016-12-13 10:36:50',0.09,26710,2),(45,'','2016-12-13 10:45:04',0.23,24394,2),(46,'','2016-12-13 10:45:14',0.09,18695,2),(47,'','2016-12-13 10:45:26',0.16,139725,2),(48,'','2016-12-13 10:45:37',0.44,87671,2),(50,'','2016-12-13 10:46:34',1.91,2026169,2),(51,'Snake !?','2016-12-13 11:29:54',0.16,114943,2),(52,'CHOCOBO !!!','2016-12-13 11:30:14',0.07,56874,2),(53,'','2016-12-13 11:31:38',0.45,58639,2),(54,'','2016-12-13 11:33:12',0.46,347603,2),(55,'','2016-12-15 11:11:39',0.08,59652,2),(56,'','2016-12-15 11:12:15',0.14,1973970,2),(57,'','2016-12-15 11:13:11',0.20,1008548,2),(59,'','2016-12-15 11:15:35',0.05,214321,2),(60,'','2016-12-15 11:16:03',0.16,392525,2),(62,'','2016-12-15 14:38:44',0.12,2077097,2),(63,'','2016-12-15 14:45:34',0.15,1026678,2),(64,'','2016-12-15 14:45:56',0.05,334125,2),(65,'','2016-12-15 14:46:17',0.19,323578,2),(66,'','2016-12-15 14:46:30',0.09,870076,2),(67,'','2016-12-15 14:46:39',0.09,503847,2),(68,'','2016-12-15 14:46:54',0.24,928316,2),(69,'','2016-12-15 14:47:08',0.12,509824,2),(70,'','2016-12-15 14:47:24',0.10,507953,2);
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture_gallery`
--

DROP TABLE IF EXISTS `picture_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picture_gallery` (
  `picture_id` smallint(5) unsigned NOT NULL,
  `gallery_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`picture_id`,`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture_gallery`
--

LOCK TABLES `picture_gallery` WRITE;
/*!40000 ALTER TABLE `picture_gallery` DISABLE KEYS */;
INSERT INTO `picture_gallery` VALUES (9,13),(9,14),(9,16),(10,3),(10,17),(21,16),(23,16),(24,3),(24,16),(25,3),(25,16),(26,16),(27,3),(27,16),(28,3),(28,17),(31,3),(32,3),(33,3),(34,3),(35,16),(39,17),(48,3),(49,3),(50,3),(50,17),(51,16),(52,16),(52,17),(53,16),(53,17),(54,16),(55,16),(56,16),(57,16),(59,16),(60,16),(62,16),(63,16),(64,16),(65,16),(66,16),(67,16),(68,16),(69,16),(70,16);
/*!40000 ALTER TABLE `picture_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'Djyp','d41d8cd98f00b204e9800998ecf8427e','user_youtof@djyp.me');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-20 14:21:17
