CREATE DATABASE  IF NOT EXISTS `WTA_address_book` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `WTA_address_book`;
-- MySQL dump 10.13  Distrib 5.5.24, for osx10.5 (i386)
--
-- Host: 127.0.0.1    Database: WTA_address_book
-- ------------------------------------------------------
-- Server version	5.5.29

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
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(255) DEFAULT NULL,
  `org_phone` varchar(255) DEFAULT NULL,
  `org_email` varchar(255) DEFAULT NULL,
  `street1` varchar(255) DEFAULT NULL,
  `street2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES (1,'Joe\'s Crab Shack','1234445555','crabs@gmail.com','639 Edwardian Ln','','Waynesboro','VA','22980','2013-08-27 00:04:30','2013-08-27 00:04:30'),(2,'Sally\'s Cookies','1234567890','sally@yahoo.com','639 Edwardian Ln','','Waynesboro','VA','22980','2013-08-27 00:08:18','2013-08-27 00:08:18'),(3,'Ben\'s Auto','1234567890','bensauto@gmail.com','99 Fairchild Drive','','Mountain View','CA','12345','2013-08-27 09:08:59','2013-08-27 09:08:59'),(4,'Willow Tree Apps','8883299875','wta@hotmail.com','107 5th Street SE','Suite B','Charlottesville','VA','22902','2013-08-27 09:11:18','2013-08-30 10:14:10'),(5,'The Galactic Empire','6666666666','evilempire@yahoo.com','1 Corosaunt Way','','Corosaunt','DC','12345','2013-08-27 09:18:09','2013-08-27 09:18:09'),(6,'Jedi Counsel','1234567890','jedi@gmail.com','99 Big Temple','','Corosaunt','AK','12345','2013-08-27 09:26:25','2013-08-27 09:26:25'),(7,'World\'s End Pub','1234567890','drinkup@hotmail.com','123 World\'s End','','Newton Haven','UK','12345','2013-08-27 09:28:28','2013-08-27 09:28:28'),(8,'Hot Fuzz Detectives','1234567890','fuzzy@hotmail.com','123 Police Way','','Sanford','UK','12345','2013-08-27 09:30:59','2013-08-27 09:30:59'),(9,'Godzilla\'s Playhouse','1234567890','nyc@hotmail.com','639 Edwardian Ln','','Waynesboro','VA','22980','2013-08-27 15:21:49','2013-08-27 15:21:49'),(10,'Project 86','1234567890','p86@awesome.com','639 Edwardian Ln','','Waynesboro','VA','22980','2013-08-28 13:38:17','2013-08-28 13:38:17'),(11,'Grow','1234567890','thisisgrow@grow.com','427 Granby Street','','Norfolk','VA','23501','2013-10-02 09:10:15','2013-10-02 09:10:15');
/*!40000 ALTER TABLE `organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `street1` varchar(255) DEFAULT NULL,
  `street2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `organizations_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_organizations_idx` (`organizations_id`),
  CONSTRAINT `fk_users_organizations` FOREIGN KEY (`organizations_id`) REFERENCES `organizations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Joseph','Dillon','awq6e9Hel8rWLkKBf/JCDtZMvrjYAjtI+GTBFP+nkIFI2Hw4dFJrUl7vRVt3GEo513o9v1Ku3lRv3cAb95IOjQ==','9073502750','joseph.dillon.522@gmail.com','4001 East 112th','','Anchorage','AK','99516','2013-08-27 00:39:12','2013-10-02 09:11:15',11),(2,'Rachel','Dillon','rqWEX2JcShG7T+9N8S9QG1a2x3I2rtbTeEKOwH6gL+AeqA5Q0ic2YXYH9cK6n8X9w8E+dYmAKMOIlhsLeN958A==','9073502750','rae.simplicity@gmail.com','639 Edwardian Ln','','Waynesboro','VA','22980','2013-08-27 09:03:00','2013-08-27 09:03:00',1),(3,'Luke','Dillon','BTcnvWoeWPInjaGKIWssbmYVqC4VPw643wQWCDCa6NkFWQkuuO/kxOybgX9psLMiLNH8flLqzEutEwKeJC8FhA==','1234567890','luke@hotmail.com','639 Edwardian Ln','639 Edwardian Ln','Waynesboro','VA','22980','2013-08-27 09:03:58','2013-08-28 12:11:16',5),(4,'Levi','Dillon','P72sSBc58xs+zfw1beZ9TlqBNG+4t6qA22DVQeX14ocSuXnMuXh9QAdW2EDTmFL0rxljsIIUrvQMtMk830Lojw==','1234567890','levi@hotmail.com','639 Edwardian Ln','639 Edwardian Ln','Waynesboro','VA','22980','2013-08-27 09:04:19','2013-08-27 09:04:19',2),(15,'Ben','Woundedmarlin','SRO1Vljk8OW4aD44q1buQzpzhn+zbeZSt562muD1goQz3x2v26WhDkhT1xzhoPgdO2ZukFLdtYoTdP0vFj0uBw==','1234567890','ben@hotmail.com','639 Edwardian Ln','','Waynesboro','VA','22980','2013-08-27 15:07:09','2013-08-27 15:07:09',8),(17,'India','Meisner','wFM3BXihnzzcecVKvKVi+2h93Wv89mzsdG5aeIXQ9kzTFdT/eZNwFDQ5oXaNKwItCZfoWoUePxjXqR50h72YRQ==','1234567890','india@gmail.com','639 Edwardian Ln','','Waynesboro','VA','22980','2013-08-27 15:12:20','2013-08-27 15:12:20',5),(18,'Conan','Barbarian','ura1IEV1W9Gbfgk5v8md6VOKn9fHIcHH0J+u9jnT6SvmByh0uPVwwc8HL63hT7XZtccJ4RQgNaVu21oloMQ+SQ==','1234567890','conan@destroy.com','639 Edwardian Ln','','Waynesboro','VA','22980','2013-08-27 15:14:27','2013-08-27 15:14:27',6),(19,'Conan','Barbarian','MSvJwnSnudKYT15jzR7VschkhfuLQh9aoY0a7BYOwgBe2aHyAmnvKUENRORWJ65nWWUzdCErmPR/AKY5oCX5Gw==','1234567890','conan@destroy.com','639 Edwardian Ln','','Waynesboro','VA','22980','2013-08-27 15:14:27','2013-08-27 15:14:27',6),(20,'Trent','Leibman','RimDZ3j+4LwioYtZYkeIV+3x7zIsoJWONNj4pQS8JnFHC0gw+e9EWBHHlg+xF7ubyMyGKSmTa9tLbacDhsIfDg==','1234567890','littleJew@hotmail.com','639 Edwardian Ln','','Waynesboro','VA','22980','2013-08-27 15:24:29','2013-08-27 15:24:29',8),(21,'Rachel','Dillon','Vtm2XPsWctR0UNWFNMyGjkhxVeIXgkxTmS6LFZh06osPFeXsoH5vypIKyoX07Xr2qgFHfujo90f8AD6mH2tx1g==','9073502750','rae.simplicity@yahoo.com','639 Edwardian Ln','','Waynesboro','VA','22980','2013-08-28 01:57:16','2013-08-28 01:57:16',4),(22,'Luke','Dillon','XQFEfLWd9L0KE3U9+1+gpJEGVDJMHN+jYcKDRya263NHlysmsbsXdG3DbO2JJA/GX/KGJiQOoKPYlmMM2MyoPQ==','1234567890','luke@gmail.com','639 Edwardian Ln','639 Edwardian Ln','Waynesboro','VA','22980','2013-08-28 02:09:20','2013-08-28 02:09:20',1),(23,'Julius','Caesar','2xULIce2mOCh+z8qGe/M9Rslfb8GYkBn2gVD9eI4tkq4/cY40pCkLruIhycDeyll7F6C2FkGGHWqa/khnweKwQ==','1234567890','emperor@hotmail.com','639 Edwardian Ln','','Waynesboro','VA','22980','2013-08-28 13:02:09','2013-08-28 13:02:09',5),(24,'Billy','Goat','1CPk8Kd+R9/Kc4UrhDuakRUdmckSLf1Oz7Q9d4/7z3UJO0Gxgo0Fp2Yi5p+laUKlM2Lk28J3ia8GhwHt88t+VA==','2223334444','canMuncher@hotmail.com','639 Edwardian Ln','','Waynesboro','VA','22980','2013-08-28 13:25:25','2013-08-28 13:25:25',3),(25,'General','Maximus','QvCXdXjv9aIrJYTLNTBGRppJW7D1FT9X1eFUmNeKDF0SAyBeG5P1HgArJV4Lq7pppRM2+eZhWqET2a/8DvVtIQ==','1234567890','rome@hotmail.com','639 Edwardian Ln','','Waynesboro','VA','22980','2013-08-28 15:33:08','2013-08-28 15:33:08',6),(26,'Godzilla','Monster','TNuxtFnwM2IDi8RYDgXOnOL4Sv7RxNWwonoUJLMLWykPhtsWTIEtK6jF9VBqo/hvvwDXwMjyx48oIBL1WNMbbw==','1234567890','toyoko_sucx@gmail.com','639 Edwardian Ln','','Waynesboro','VA','22980','2013-10-02 09:08:42','2013-10-02 09:08:42',5);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-07 11:53:59
