-- MySQL dump 10.13  Distrib 5.1.66, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: u350509588_svman
-- ------------------------------------------------------
-- Server version	5.1.66

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
-- Table structure for table `Embeds`
--

DROP TABLE IF EXISTS `Embeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Embeds` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `EmbedID` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `PostID` int(11) NOT NULL,
  `Title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `Sinopse` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Category` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Tag` longtext COLLATE utf8_unicode_ci NOT NULL,
  `BgImage` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `ServerData` longtext COLLATE utf8_unicode_ci NOT NULL,
  `PublishDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` enum('serie','film') COLLATE utf8_unicode_ci NOT NULL,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `Reports`
--

DROP TABLE IF EXISTS `Reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Reports` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `EmbedID` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Mensage` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Reports` int(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;