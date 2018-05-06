-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: faucet2
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin`
--

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_config`
--

DROP TABLE IF EXISTS `tbl_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `value` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_config`
--

LOCK TABLES `tbl_config` WRITE;
/*!40000 ALTER TABLE `tbl_config` DISABLE KEYS */;
INSERT INTO `tbl_config` VALUES (1,'referral_percent','60'),(2,'timer','5'),(3,'currency','mBTC'),(4,'donate_type','USD'),(5,'donate_min','0.001'),(6,'privkey','DfrEJM4Ygg0guz2FJynM3tCxXTYmf2Cn'),(7,'verkey','TKWMuZfKu8fcI2mK3HLkhQpIhTCvQl7y'),(8,'hashkey','24gI7W6i0Kpxax.aqmaHU4Q3.wws2AF0'),(9,'pusername','wilan'),(10,'papiname','phpfaucet'),(11,'ppassword','php123'),(12,'STORE_NAME','phpfaucetsci'),(13,'asmoneymin','1'),(14,'currencymin','1'),(15,'minimum_donate','4'),(16,'sci_username','a'),(17,'sci_pass','dsad'),(18,'requestcount','10');
/*!40000 ALTER TABLE `tbl_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_donate`
--

DROP TABLE IF EXISTS `tbl_donate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_donate` (
  `donate` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `date` int(4) unsigned NOT NULL,
  `link` text COLLATE utf8_persian_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`donate`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_donate`
--

LOCK TABLES `tbl_donate` WRITE;
/*!40000 ALTER TABLE `tbl_donate` DISABLE KEYS */;
INSERT INTO `tbl_donate` VALUES (1,14,0,1521765920,'',0),(2,14,0,1521857313,'http://www.google.com',0);
/*!40000 ALTER TABLE `tbl_donate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_prize`
--

DROP TABLE IF EXISTS `tbl_prize`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_prize` (
  `prize_id` int(11) NOT NULL AUTO_INCREMENT,
  `prize` float NOT NULL,
  `chance` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`prize_id`),
  KEY `chance` (`chance`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_prize`
--

LOCK TABLES `tbl_prize` WRITE;
/*!40000 ALTER TABLE `tbl_prize` DISABLE KEYS */;
INSERT INTO `tbl_prize` VALUES (7,1,1),(16,10,1);
/*!40000 ALTER TABLE `tbl_prize` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_transaction`
--

DROP TABLE IF EXISTS `tbl_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_transaction` (
  `trans_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_Id` int(10) unsigned NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `date` int(4) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`trans_id`),
  KEY `user_Id` (`user_Id`),
  CONSTRAINT `tbl_transaction_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_transaction`
--

LOCK TABLES `tbl_transaction` WRITE;
/*!40000 ALTER TABLE `tbl_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ausername` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `username` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `reset` int(11) NOT NULL DEFAULT '0',
  `ip` int(10) unsigned DEFAULT NULL,
  `credit` decimal(20,8) DEFAULT '0.00000000',
  PRIMARY KEY (`user_id`),
  KEY `parent_id` (`parent_id`),
  CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (14,'cesardanielhg','cesardanielhg','5574dc479dedd21ce1a16be01dd018c7','kkkkkfldlfd32343kdkflf',NULL,1522784453,3006362856,1.00000000),(15,'Test','Test','098f6bcd4621d373cade4e832627b4f6','Yhiehskdudjfie83syr63dfgrwghhte737dury4efgdsserffg7e7r7fcgur7euwjfig7euguwke7gjeugjeur7gurufnru',NULL,1522070286,174967165,0.00000000),(16,'colosh','dennis','e10adc3949ba59abbe56e057f20f883e','5NbCTMansKp1AmRUV9sxxcBJEi4avk3dt7RsXsxo6vFVSqZCTEsuCgXTiQZCsKM5TdGQD2m6UpM58KoDLEtX7ofH61t9hNZ',NULL,1522187259,3006362856,0.00000000),(17,'','yayi','5f4dcc3b5aa765d61d8327deb882cf99','5NbCTMansKp1AmRUV9sxxcBJEi4avk3dt7RsXsxo6vFVSqZCTEsuCgXTiQZCsKM5TdGQD2m6UpM58KoDLEtX7ofH61t9hNd',NULL,1522359652,3044215268,1.00000000);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_withdrawal`
--

DROP TABLE IF EXISTS `tbl_withdrawal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_withdrawal` (
  `withdrawal_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `amount` float unsigned NOT NULL,
  `fee` int(11) NOT NULL,
  `date` int(4) DEFAULT NULL,
  `type` tinyint(1) NOT NULL,
  `wallet` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `reccode` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`withdrawal_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_withdrawal`
--

LOCK TABLES `tbl_withdrawal` WRITE;
/*!40000 ALTER TABLE `tbl_withdrawal` DISABLE KEYS */;
INSERT INTO `tbl_withdrawal` VALUES (3,13,0.89,0,NULL,1,'','167457',1),(4,15,11,0,NULL,1,'','',0),(5,16,10,0,NULL,1,'','',0),(6,14,1,0,NULL,1,'','',0),(7,14,10,0,NULL,1,'','',0),(8,14,20,0,NULL,1,'','',0),(9,14,26,0,NULL,1,'','',0),(10,14,10,0,NULL,1,'','',0);
/*!40000 ALTER TABLE `tbl_withdrawal` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-03 16:35:56
