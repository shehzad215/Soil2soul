-- MySQL dump 10.13  Distrib 5.6.24, for linux-glibc2.5 (x86_64)
--
-- Host: 192.168.0.249    Database: pura_tuatos
-- ------------------------------------------------------
-- Server version	5.5.39

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
-- Table structure for table `attraction_addresses`
--

DROP TABLE IF EXISTS `attraction_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attraction_addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` int(10) unsigned NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) DEFAULT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction_addresses`
--

LOCK TABLES `attraction_addresses` WRITE;
/*!40000 ALTER TABLE `attraction_addresses` DISABLE KEYS */;
INSERT INTO `attraction_addresses` VALUES (1,1,'Blue Foods, Marine Lines(W)','Mumbai',103,'Maharashtra','sadsadsa da','400001',18.9431,72.8272,'2015-12-11 05:38:35','2015-12-30 04:05:11'),(19,6,'Sydney NSW, Australia','Near Hill Town Hotel',14,'Sydney','Sydney','500522',40.7144,-74.006,'2015-12-18 11:08:54','2015-12-29 11:29:14'),(24,7,'Blue Foods, Marine Lines(W)','',103,'maharashtra','','400102',54,5,'2015-12-21 06:23:43','2015-12-29 12:25:25'),(26,8,'Gateway of India','Churchgate',103,'maharashtra','','400001',18.922,72.8347,'2015-12-21 10:06:25','2015-12-29 11:34:27'),(32,9,'Golden Gate Bridge, California, United States','',236,'San Francisco','','400102',37.7749,-122.419,'2015-12-24 11:21:59','2015-12-29 12:37:14'),(33,14,'B/202, Antop Hill Warehousing Company, Near V.I.T College,','Wadala (E)',103,'MAHARASHTRA','MUMBAI','400037',11.11,18.22,'2016-01-20 06:57:37','2016-01-20 06:57:37'),(34,15,'B/202, Antop Hill Warehousing Company, Near V.I.T College,','Wadala (E)',103,'MAHARASHTRA','MUMBAI','400037',11.11,18.22,'2016-01-21 11:39:25','2016-01-21 11:39:25'),(35,16,'B/202, Antop Hill Warehousing Company, Near V.I.T College,','Wadala (E)',103,'MAHARASHTRA','MUMBAI','400037',11.11,18.22,'2016-01-21 11:43:40','2016-01-21 11:43:40');
/*!40000 ALTER TABLE `attraction_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attraction_closed_dates`
--

DROP TABLE IF EXISTS `attraction_closed_dates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attraction_closed_dates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(45) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction_closed_dates`
--

LOCK TABLES `attraction_closed_dates` WRITE;
/*!40000 ALTER TABLE `attraction_closed_dates` DISABLE KEYS */;
INSERT INTO `attraction_closed_dates` VALUES (1,6,'2016-01-09','Holiday test',1,'2016-01-08 09:54:45','2016-01-16 09:36:34'),(2,6,'2016-01-12','',1,'2016-01-12 06:36:22','2016-01-12 06:36:22'),(4,1,'2016-01-26','No men power',1,'2016-01-12 07:06:53','2016-01-16 10:35:07');
/*!40000 ALTER TABLE `attraction_closed_dates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attraction_comments`
--

DROP TABLE IF EXISTS `attraction_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attraction_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `attraction_id` int(10) NOT NULL,
  `attraction_product_id` int(10) DEFAULT NULL,
  `comment` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction_comments`
--

LOCK TABLES `attraction_comments` WRITE;
/*!40000 ALTER TABLE `attraction_comments` DISABLE KEYS */;
INSERT INTO `attraction_comments` VALUES (1,2,1,4,'Amazing Deal i like it',1,'2015-12-23 10:51:12','2015-12-28 09:26:34'),(2,18,1,4,'Comment Two',1,'2015-12-23 10:51:12','2015-12-23 10:51:12'),(3,2,1,4,'Comment Three',1,'2015-12-23 10:51:12','2015-12-23 10:51:12'),(4,2,1,4,'gggggg',1,'2015-12-28 06:36:45','2015-12-28 06:36:45'),(5,2,1,4,'hi',1,'2015-12-28 06:43:27','2015-12-28 06:43:27');
/*!40000 ALTER TABLE `attraction_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attraction_contacts`
--

DROP TABLE IF EXISTS `attraction_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attraction_contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country_code` varchar(6) NOT NULL,
  `area_code` int(6) unsigned NOT NULL,
  `contact_no` bigint(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction_contacts`
--

LOCK TABLES `attraction_contacts` WRITE;
/*!40000 ALTER TABLE `attraction_contacts` DISABLE KEYS */;
INSERT INTO `attraction_contacts` VALUES (1,1,'Deepak','adad@asdas.com','222222',4234234,3243423423,'2015-12-11 05:38:35','2015-12-24 13:11:00'),(4,3,'MTB6 Mountain Bike Race','info@tuatos.com','AUS',455122,28526523,'2015-12-11 07:21:47','2015-12-29 06:24:12'),(7,6,'f','info@tuatos.com','12',11,28526523,'2015-12-18 11:08:54','2015-12-29 05:34:27'),(8,7,'deepak2','mailme.deepakjha@gmail.com','INR',1,4534675765,'2015-12-21 06:23:43','2015-12-24 11:52:32'),(9,8,'ds','ddd@dd.com','3',3,3,'2015-12-21 10:06:25','2015-12-21 10:06:25');
/*!40000 ALTER TABLE `attraction_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attraction_images`
--

DROP TABLE IF EXISTS `attraction_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attraction_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_file` varchar(255) DEFAULT NULL,
  `is_cover_image` tinyint(1) NOT NULL DEFAULT '0',
  `display_order` int(10) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction_images`
--

LOCK TABLES `attraction_images` WRITE;
/*!40000 ALTER TABLE `attraction_images` DISABLE KEYS */;
INSERT INTO `attraction_images` VALUES (4,3,'Warman Ride 2013','bike.jpg',0,1,1,'2015-12-11 07:21:47','2016-01-09 09:24:15'),(11,6,'1/2 Marathon Snowshoe Race','Peak_Snowshoe.jpg',0,1,1,'2015-12-18 11:08:54','2016-01-09 09:25:04'),(12,7,'product image 1','1Maldivess1.jpg',1,1,1,'2015-12-21 06:23:43','2015-12-29 12:39:05'),(14,8,'Private City Hall Tour','download.jpg',1,1,1,'2015-12-21 10:06:25','2016-01-04 08:44:36'),(15,3,'Warman Ride 2013','bike2.jpg',1,2,1,'2015-12-29 06:22:19','2016-01-09 09:24:15'),(16,3,'Warman Ride 2013 ','bike3.jpg',0,3,1,'2015-12-29 06:22:19','2016-01-09 09:24:15'),(17,9,'San Francisco CityPASS','1846366801-san-francisco-city-pass.jpg',1,1,1,'2015-12-29 08:59:54','2015-12-29 09:08:07'),(18,9,'sSan Francisco CityPASS','128317504-san-francisco-city-pass2.jpg',0,2,1,'2015-12-29 08:59:54','2015-12-29 09:08:07'),(19,9,'San Francisco CityPASS','1546176332-san-francisco-city-pass3.jpg',0,3,1,'2015-12-29 08:59:54','2015-12-29 09:08:07'),(20,9,'San Francisco CityPASS','1757527699-san-francisco-city-pass3.jpg',0,4,0,'2015-12-29 08:59:54','2015-12-29 09:08:07'),(21,7,'product image 2','nature.jpeg',0,2,0,'2015-12-29 12:38:41','2015-12-29 12:39:05'),(26,1,'Scenic Dining Cruises','activityimg01.jpg',1,1,1,'2016-01-09 09:18:48','2016-01-16 04:54:40'),(27,1,'Scenic Dining Cruises','activityimg02.jpg',0,2,1,'2016-01-09 09:18:48','2016-01-16 04:54:40'),(28,1,'Scenic Dining Cruises','activityimg03.jpg',0,3,1,'2016-01-09 09:18:48','2016-01-16 04:54:40'),(29,6,'1/2 Marathon Snowshoe Race','activityimg03.jpg',1,2,1,'2016-01-09 09:25:04','2016-01-09 09:25:04'),(30,7,'test title','Singapore (3).jpg',0,5,1,'2016-01-12 07:11:52','2016-01-12 07:11:52'),(31,16,'Test tom',NULL,0,3,1,'2016-01-21 12:45:40','2016-01-21 12:45:40');
/*!40000 ALTER TABLE `attraction_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attraction_product_pickup_points`
--

DROP TABLE IF EXISTS `attraction_product_pickup_points`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attraction_product_pickup_points` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_product_id` int(10) unsigned NOT NULL,
  `pickup_point_type_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction_product_pickup_points`
--

LOCK TABLES `attraction_product_pickup_points` WRITE;
/*!40000 ALTER TABLE `attraction_product_pickup_points` DISABLE KEYS */;
INSERT INTO `attraction_product_pickup_points` VALUES (10,48,1,'MTB6 Mountain Bike Race',5,5,'2016-01-05 13:34:09','2016-01-05 13:34:09'),(11,110,1,'ghg',6,6,'2016-01-08 09:46:51','2016-01-08 09:49:18'),(12,112,1,'j',6,6,'2016-01-16 05:09:43','2016-01-16 05:09:43'),(13,115,1,'',NULL,NULL,'2016-01-20 05:23:42','2016-01-20 05:34:28'),(14,111,1,'',NULL,NULL,'2016-01-20 05:27:05','2016-01-20 05:27:05'),(16,3,1,'1',1,1,'2016-01-20 11:28:21','2016-01-20 11:28:21'),(21,124,1,'1',1,1,'2016-01-21 10:50:53','2016-01-21 10:50:53');
/*!40000 ALTER TABLE `attraction_product_pickup_points` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attraction_product_price_groups`
--

DROP TABLE IF EXISTS `attraction_product_price_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attraction_product_price_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_product_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `is_grouping_by_age` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If selected age_min, age_max will appear on screen & user can select the values in it',
  `age_min` int(3) unsigned DEFAULT NULL,
  `age_max` int(3) unsigned DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction_product_price_groups`
--

LOCK TABLES `attraction_product_price_groups` WRITE;
/*!40000 ALTER TABLE `attraction_product_price_groups` DISABLE KEYS */;
INSERT INTO `attraction_product_price_groups` VALUES (1,2,'Adult','Adult',1,1,50,1,'2015-12-14 05:03:34','2016-01-20 10:31:50'),(2,2,'Child','Child',1,1,4,1,'2015-12-29 06:55:49','2016-01-20 10:32:15'),(6,3,'Adult','Adult',0,8,8,1,'2015-12-18 13:06:25','2016-01-20 11:28:21'),(7,4,'Product Price Groups','Product Price Groups description',0,NULL,NULL,1,'2015-12-21 06:27:25','2016-01-04 10:44:27'),(8,5,'d','d',1,3,3,1,'2015-12-29 04:57:17','2015-12-29 04:57:17'),(9,6,'d','',0,NULL,NULL,0,'2015-12-29 04:59:12','2015-12-29 04:59:12'),(10,7,'dgd','',0,NULL,NULL,0,'2015-12-29 05:00:51','2015-12-29 05:00:51'),(11,8,'dgd','',0,NULL,NULL,0,'2015-12-29 05:01:12','2015-12-29 05:01:12'),(12,9,'dgd','',0,NULL,NULL,0,'2015-12-29 05:03:28','2015-12-29 05:03:28'),(13,10,'dgd','',0,NULL,NULL,0,'2015-12-29 05:03:43','2015-12-29 05:03:43'),(14,11,'dgd','',0,NULL,NULL,0,'2015-12-29 05:04:17','2015-12-29 05:04:17'),(15,12,'dgd','',0,NULL,NULL,0,'2015-12-29 05:05:01','2015-12-29 05:05:01'),(16,13,'dsf','',0,NULL,NULL,0,'2015-12-29 05:07:30','2015-12-29 05:07:30'),(17,14,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:08:42','2015-12-29 05:08:42'),(18,15,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:08:55','2015-12-29 05:08:55'),(19,16,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:10:26','2015-12-29 05:10:26'),(20,17,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:10:56','2015-12-29 05:10:56'),(21,18,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:11:20','2015-12-29 05:11:20'),(22,19,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:11:56','2015-12-29 05:11:56'),(23,20,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:12:03','2015-12-29 05:12:03'),(24,21,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:12:27','2015-12-29 05:12:27'),(25,22,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:12:37','2015-12-29 05:12:37'),(26,23,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:14:42','2015-12-29 05:14:42'),(27,24,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:14:53','2015-12-29 05:14:53'),(28,25,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:17:37','2015-12-29 05:17:37'),(29,26,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:17:59','2015-12-29 05:17:59'),(30,27,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:18:17','2015-12-29 05:18:17'),(31,28,'Racing Price Group Title','Racing Price Group Description',0,NULL,NULL,1,'2015-12-29 05:18:37','2016-01-04 10:46:15'),(32,29,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:18:50','2015-12-29 05:18:50'),(33,30,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:19:19','2015-12-29 05:19:19'),(34,31,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:19:40','2015-12-29 05:19:40'),(35,32,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:20:26','2015-12-29 05:20:26'),(36,33,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:20:49','2015-12-29 05:20:49'),(37,34,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:21:06','2015-12-29 05:21:06'),(38,35,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:21:42','2015-12-29 05:21:42'),(39,36,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:22:04','2015-12-29 05:22:04'),(40,37,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:22:46','2015-12-29 05:22:46'),(41,38,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:23:09','2015-12-29 05:23:09'),(42,39,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:23:24','2015-12-29 05:23:24'),(43,40,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:23:56','2015-12-29 05:23:56'),(44,41,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:24:30','2015-12-29 05:24:30'),(45,42,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:25:21','2015-12-29 05:25:21'),(46,43,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:25:32','2015-12-29 05:25:32'),(47,44,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:25:50','2015-12-29 05:25:50'),(48,45,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:26:03','2015-12-29 05:26:03'),(49,46,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:26:20','2015-12-29 05:26:20'),(50,47,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:26:30','2015-12-29 05:26:30'),(51,48,'1/2 Marathon Snowshoe Race','<p>1/2 Marathon Snowshoe Race Description</p>',0,NULL,NULL,1,'2015-12-29 05:27:49','2016-01-05 13:34:10'),(52,49,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:27:58','2015-12-29 05:27:58'),(53,50,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:34:10','2015-12-29 05:34:10'),(54,51,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:34:25','2015-12-29 05:34:25'),(55,52,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:34:43','2015-12-29 05:34:43'),(56,53,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:35:06','2015-12-29 05:35:06'),(57,54,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:35:19','2015-12-29 05:35:19'),(58,55,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:35:47','2015-12-29 05:35:47'),(59,56,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:35:54','2015-12-29 05:35:54'),(60,57,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:36:04','2015-12-29 05:36:04'),(61,58,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:36:20','2015-12-29 05:36:20'),(62,59,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:38:01','2015-12-29 05:38:01'),(63,60,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:38:44','2015-12-29 05:38:44'),(64,61,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:39:01','2015-12-29 05:39:01'),(65,62,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:39:30','2015-12-29 05:39:30'),(66,63,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:39:40','2015-12-29 05:39:40'),(67,64,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:39:59','2015-12-29 05:39:59'),(68,65,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:40:15','2015-12-29 05:40:15'),(69,66,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:41:04','2015-12-29 05:41:04'),(70,67,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:41:52','2015-12-29 05:41:52'),(71,68,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:42:25','2015-12-29 05:42:25'),(72,69,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:42:33','2015-12-29 05:42:33'),(73,70,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:49:19','2015-12-29 05:49:19'),(74,71,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:49:54','2015-12-29 05:49:54'),(75,72,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:50:22','2015-12-29 05:50:22'),(76,73,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:50:48','2015-12-29 05:50:48'),(77,74,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:51:04','2015-12-29 05:51:04'),(78,75,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:51:16','2015-12-29 05:51:16'),(79,76,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:52:07','2015-12-29 05:52:07'),(80,77,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:53:09','2015-12-29 05:53:09'),(81,78,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:53:41','2015-12-29 05:53:41'),(82,79,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:54:49','2015-12-29 05:54:49'),(83,80,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:55:01','2015-12-29 05:55:01'),(84,81,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:55:32','2015-12-29 05:55:32'),(85,82,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:57:11','2015-12-29 05:57:11'),(86,83,'dvdv','',0,NULL,NULL,0,'2015-12-29 05:57:35','2015-12-29 05:57:35'),(87,84,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:00:05','2015-12-29 06:00:05'),(88,85,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:01:04','2015-12-29 06:01:04'),(89,86,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:01:28','2015-12-29 06:01:28'),(90,87,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:01:35','2015-12-29 06:01:35'),(91,88,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:03:09','2015-12-29 06:03:09'),(92,89,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:03:23','2015-12-29 06:03:23'),(93,90,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:03:46','2015-12-29 06:03:46'),(94,91,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:05:59','2015-12-29 06:05:59'),(95,92,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:10:01','2015-12-29 06:10:01'),(96,93,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:10:33','2015-12-29 06:10:33'),(97,94,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:11:08','2015-12-29 06:11:08'),(98,95,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:11:27','2015-12-29 06:11:27'),(99,96,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:11:36','2015-12-29 06:11:36'),(100,97,'MTB6 Mountain Bike Race Price Group Title','MTB6 Mountain Bike Race Description',0,NULL,NULL,1,'2015-12-29 06:17:41','2016-01-04 10:43:21'),(101,98,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:19:06','2015-12-29 06:19:06'),(102,99,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:19:45','2015-12-29 06:19:45'),(103,100,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:20:01','2015-12-29 06:20:01'),(104,101,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:20:16','2015-12-29 06:20:16'),(105,102,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:20:50','2015-12-29 06:20:50'),(106,103,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:21:11','2015-12-29 06:21:11'),(107,104,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:21:49','2015-12-29 06:21:49'),(108,105,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:22:48','2015-12-29 06:22:48'),(109,106,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:23:43','2015-12-29 06:23:43'),(110,107,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:23:50','2015-12-29 06:23:50'),(111,108,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:24:44','2015-12-29 06:24:44'),(112,109,'dvdv','',0,NULL,NULL,0,'2015-12-29 06:25:43','2015-12-29 06:25:43'),(113,110,'Adult','Adult',0,NULL,NULL,1,'2015-12-29 08:56:01','2016-01-08 09:49:18'),(114,111,'test','',0,NULL,NULL,1,'2016-01-02 05:39:39','2016-01-20 05:27:05'),(115,3,'Child','Child',1,20,30,1,'2016-01-02 06:15:33','2016-01-20 11:28:21'),(117,111,'onther','onther',0,NULL,NULL,1,'2016-01-02 07:07:09','2016-01-20 05:27:05'),(118,112,'Attraction Product price groups','test description',0,NULL,NULL,1,'2016-01-04 13:02:25','2016-01-04 13:02:25'),(119,113,'Attraction Product price groups','fghfhfghf',0,NULL,NULL,1,'2016-01-04 13:05:37','2016-01-04 13:05:37'),(120,114,'Attraction Product price groups','ghjgjfgj',0,NULL,NULL,1,'2016-01-04 13:14:55','2016-01-04 13:14:55'),(121,115,'Attraction Product price groups','ghjgjfgj',0,NULL,NULL,1,'2016-01-04 13:15:21','2016-01-20 05:34:28'),(145,110,'Child','Child',0,NULL,NULL,1,'2016-01-08 09:47:45','2016-01-08 09:50:46'),(146,112,'d','',0,NULL,NULL,0,'2016-01-16 05:09:43','2016-01-16 05:09:43'),(147,115,'T i s t i t l e g o e s h e r e  ','',0,NULL,NULL,0,'2016-01-20 05:23:42','2016-01-20 05:34:28'),(164,124,'Adult','Adult',0,8,8,1,'2016-01-21 10:50:53','2016-01-21 10:50:53'),(165,124,'Child','Child',1,20,30,1,'2016-01-21 10:50:53','2016-01-21 10:50:53'),(166,124,'Child (2 to 5 yrs)','',1,2,5,1,'2016-01-21 10:50:53','2016-01-21 10:50:53'),(169,126,'Adult','Adult',1,1,50,1,'2016-01-21 11:15:28','2016-01-21 11:15:28'),(170,126,'Child','Child',1,1,4,1,'2016-01-21 11:15:28','2016-01-21 11:15:28'),(173,128,'Adult','Adult',1,1,50,1,'2016-01-21 11:43:40','2016-01-21 11:43:40'),(174,128,'Child','Child',1,1,4,1,'2016-01-21 11:43:40','2016-01-21 11:43:40');
/*!40000 ALTER TABLE `attraction_product_price_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attraction_product_prices`
--

DROP TABLE IF EXISTS `attraction_product_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attraction_product_prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_product_id` int(10) NOT NULL,
  `attraction_product_price_group_id` int(10) DEFAULT NULL,
  `supplier_id` int(10) unsigned NOT NULL,
  `nationality_id` int(10) unsigned DEFAULT NULL,
  `currency_id` int(10) unsigned NOT NULL,
  `original_price` decimal(10,2) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `max_quantity` int(10) NOT NULL,
  `max_product_booking_allowed_per_day` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction_product_prices`
--

LOCK TABLES `attraction_product_prices` WRITE;
/*!40000 ALTER TABLE `attraction_product_prices` DISABLE KEYS */;
INSERT INTO `attraction_product_prices` VALUES (1,2,1,3,1,67,15000.00,'2016-01-20 16:01:00','2016-05-27 18:35:00',30,10,'2015-12-17 12:57:16','2016-01-20 10:31:50'),(6,3,6,3,41,67,20000.00,'2016-01-07 19:39:00','2016-01-31 19:39:00',20,20,'2016-01-02 06:20:02','2016-01-07 14:09:50'),(7,3,6,3,1,67,40000.00,'2016-01-07 19:39:00','2016-01-31 18:34:00',10,60,'2016-01-02 06:20:02','2016-01-07 14:09:50'),(8,3,115,3,41,67,5000.00,'2016-01-07 19:40:00','2016-05-27 18:35:00',10,10,'2016-01-02 06:40:04','2016-01-07 14:10:18'),(9,3,115,3,41,67,10000.00,'2016-01-07 19:40:00','2016-05-27 18:35:00',20,80,'2016-01-02 06:40:04','2016-01-07 14:10:18'),(10,111,114,3,198,67,100000.00,'2016-01-07 15:16:00','2016-06-25 11:09:00',20,1,'2016-01-02 07:05:04','2016-01-07 09:46:18'),(11,111,114,3,115,67,1900.00,'2016-01-07 15:16:00','2016-06-25 11:09:00',10,1,'2016-01-02 07:05:04','2016-01-07 09:46:18'),(12,111,117,3,198,67,6000.00,'2016-01-04 16:12:00','2016-06-25 11:09:00',15,1,'2016-01-02 07:07:09','2016-01-04 10:42:15'),(13,111,117,3,115,67,12000.00,'2016-01-04 16:12:00','2016-06-25 11:09:00',16,1,'2016-01-02 07:07:09','2016-01-04 10:42:15'),(14,97,100,3,NULL,67,55650.00,'2016-01-04 16:13:00','2016-06-25 11:09:00',17,1,'2016-01-04 06:25:23','2016-01-04 10:43:21'),(15,48,51,3,198,67,20500.00,'2016-01-04 16:15:00','2016-06-25 11:09:00',19,1,'2016-01-04 06:58:19','2016-01-04 10:46:02'),(16,28,31,3,NULL,67,20685.00,'2016-01-04 16:16:00','2016-06-25 11:09:00',22,1,'2016-01-04 06:59:53','2016-01-04 10:46:15'),(17,110,113,3,41,67,30987.00,'2016-01-04 16:10:00','2016-07-29 12:30:00',10,1,'2016-01-04 07:01:01','2016-01-04 10:40:56'),(18,2,2,3,1,67,14978.00,'2016-01-20 16:02:00','2016-05-31 18:35:00',55,1,'2016-01-04 09:46:16','2016-01-20 10:32:15'),(19,4,7,3,115,67,54580.00,'2016-01-04 16:14:00','2016-06-25 11:09:00',65,1,'2016-01-04 10:44:27','2016-01-04 10:44:27'),(20,110,145,3,NULL,67,500.00,'2016-01-08 15:20:00','2016-03-25 15:20:00',1,1,'2016-01-08 09:50:46','2016-01-08 09:50:46'),(21,3,148,3,41,67,200.00,'2016-01-20 10:07:00','2016-01-31 10:06:00',11,11,'2016-01-21 04:36:20','2016-01-21 04:37:29'),(45,124,164,3,41,67,20000.00,'2016-01-07 19:39:00','2016-01-31 19:39:00',20,20,'2016-01-21 10:50:53','2016-01-21 10:50:53'),(46,124,164,3,1,67,40000.00,'2016-01-07 19:39:00','2016-01-31 18:34:00',10,60,'2016-01-21 10:50:53','2016-01-21 10:50:53'),(47,124,165,3,41,67,5000.00,'2016-01-07 19:40:00','2016-05-27 18:35:00',10,10,'2016-01-21 10:50:53','2016-01-21 10:50:53'),(48,124,165,3,41,67,10000.00,'2016-01-07 19:40:00','2016-05-27 18:35:00',20,80,'2016-01-21 10:50:53','2016-01-21 10:50:53'),(49,124,166,3,41,67,200.00,'2016-01-20 10:07:00','2016-01-31 10:06:00',11,11,'2016-01-21 10:50:53','2016-01-21 10:50:53'),(54,126,169,3,1,67,15000.00,'2016-01-20 16:01:00','2016-05-27 18:35:00',30,10,'2016-01-21 11:15:28','2016-01-21 11:15:28'),(55,126,170,3,1,67,14978.00,'2016-01-20 16:02:00','2016-05-31 18:35:00',55,1,'2016-01-21 11:15:28','2016-01-21 11:15:28'),(58,128,173,3,1,67,15000.00,'2016-01-20 16:01:00','2016-05-27 18:35:00',30,10,'2016-01-21 11:43:40','2016-01-21 11:43:40'),(59,128,174,3,1,67,14978.00,'2016-01-20 16:02:00','2016-05-31 18:35:00',55,1,'2016-01-21 11:43:40','2016-01-21 11:43:40');
/*!40000 ALTER TABLE `attraction_product_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attraction_product_time_slots`
--

DROP TABLE IF EXISTS `attraction_product_time_slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attraction_product_time_slots` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_product_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction_product_time_slots`
--

LOCK TABLES `attraction_product_time_slots` WRITE;
/*!40000 ALTER TABLE `attraction_product_time_slots` DISABLE KEYS */;
INSERT INTO `attraction_product_time_slots` VALUES (1,2,'18:46','2015-12-17 13:16:50','2016-01-04 10:31:57'),(2,2,'19:00','2015-12-17 13:30:18','2016-01-04 10:31:57'),(3,3,'09:00','2015-12-18 13:06:25','2016-01-20 11:28:21'),(4,3,'09:01','2015-12-18 13:06:25','2016-01-20 11:28:21'),(5,4,'11:57','2015-12-21 06:27:25','2016-01-04 10:43:56'),(6,5,'10:27','2015-12-29 04:57:17','2015-12-29 04:57:17'),(7,6,'10:29','2015-12-29 04:59:12','2015-12-29 04:59:12'),(8,7,'10:30','2015-12-29 05:00:51','2015-12-29 05:00:51'),(9,8,'10:30','2015-12-29 05:01:12','2015-12-29 05:01:12'),(10,9,'10:30','2015-12-29 05:03:28','2015-12-29 05:03:28'),(11,10,'10:30','2015-12-29 05:03:43','2015-12-29 05:03:43'),(12,11,'10:30','2015-12-29 05:04:17','2015-12-29 05:04:17'),(13,12,'10:30','2015-12-29 05:05:01','2015-12-29 05:05:01'),(14,13,'10:37','2015-12-29 05:07:30','2015-12-29 05:07:30'),(15,14,'10:38','2015-12-29 05:08:42','2015-12-29 05:08:42'),(16,15,'10:38','2015-12-29 05:08:55','2015-12-29 05:08:55'),(17,16,'10:38','2015-12-29 05:10:26','2015-12-29 05:10:26'),(18,17,'10:38','2015-12-29 05:10:56','2015-12-29 05:10:56'),(19,18,'10:38','2015-12-29 05:11:20','2015-12-29 05:11:20'),(20,19,'10:38','2015-12-29 05:11:56','2015-12-29 05:11:56'),(21,20,'10:38','2015-12-29 05:12:03','2015-12-29 05:12:03'),(22,21,'10:38','2015-12-29 05:12:27','2015-12-29 05:12:27'),(23,22,'10:38','2015-12-29 05:12:37','2015-12-29 05:12:37'),(24,23,'10:38','2015-12-29 05:14:42','2015-12-29 05:14:42'),(25,24,'10:38','2015-12-29 05:14:53','2015-12-29 05:14:53'),(26,25,'10:38','2015-12-29 05:17:37','2015-12-29 05:17:37'),(27,26,'10:38','2015-12-29 05:17:59','2015-12-29 05:17:59'),(28,27,'10:38','2015-12-29 05:18:17','2015-12-29 05:18:17'),(29,28,'10:47','2015-12-29 05:18:37','2016-01-04 10:45:42'),(30,29,'10:38','2015-12-29 05:18:50','2015-12-29 05:18:50'),(31,30,'10:38','2015-12-29 05:19:19','2015-12-29 05:19:19'),(32,31,'10:38','2015-12-29 05:19:40','2015-12-29 05:19:40'),(33,32,'10:38','2015-12-29 05:20:26','2015-12-29 05:20:26'),(34,33,'10:38','2015-12-29 05:20:49','2015-12-29 05:20:49'),(35,34,'10:38','2015-12-29 05:21:06','2015-12-29 05:21:06'),(36,35,'10:38','2015-12-29 05:21:42','2015-12-29 05:21:42'),(37,36,'10:38','2015-12-29 05:22:04','2015-12-29 05:22:04'),(38,37,'10:38','2015-12-29 05:22:46','2015-12-29 05:22:46'),(39,38,'10:38','2015-12-29 05:23:09','2015-12-29 05:23:09'),(40,39,'10:38','2015-12-29 05:23:24','2015-12-29 05:23:24'),(41,40,'10:38','2015-12-29 05:23:56','2015-12-29 05:23:56'),(42,41,'10:38','2015-12-29 05:24:30','2015-12-29 05:24:30'),(43,42,'10:38','2015-12-29 05:25:21','2015-12-29 05:25:21'),(44,43,'10:38','2015-12-29 05:25:32','2015-12-29 05:25:32'),(45,44,'10:38','2015-12-29 05:25:50','2015-12-29 05:25:50'),(46,45,'10:38','2015-12-29 05:26:03','2015-12-29 05:26:03'),(47,46,'10:38','2015-12-29 05:26:20','2015-12-29 05:26:20'),(48,47,'10:38','2015-12-29 05:26:30','2015-12-29 05:26:30'),(49,48,'11:56','2015-12-29 05:27:49','2016-01-05 13:34:09'),(50,48,'12:57','2015-12-29 05:27:49','2016-01-05 13:34:09'),(51,49,'10:38','2015-12-29 05:27:58','2015-12-29 05:27:58'),(52,50,'10:38','2015-12-29 05:34:10','2015-12-29 05:34:10'),(53,51,'10:38','2015-12-29 05:34:25','2015-12-29 05:34:25'),(54,52,'10:38','2015-12-29 05:34:43','2015-12-29 05:34:43'),(55,53,'10:38','2015-12-29 05:35:06','2015-12-29 05:35:06'),(56,54,'10:38','2015-12-29 05:35:19','2015-12-29 05:35:19'),(57,55,'10:38','2015-12-29 05:35:47','2015-12-29 05:35:47'),(58,56,'10:38','2015-12-29 05:35:54','2015-12-29 05:35:54'),(59,57,'10:38','2015-12-29 05:36:04','2015-12-29 05:36:04'),(60,58,'10:38','2015-12-29 05:36:20','2015-12-29 05:36:20'),(61,59,'10:38','2015-12-29 05:38:01','2015-12-29 05:38:01'),(62,60,'10:38','2015-12-29 05:38:44','2015-12-29 05:38:44'),(63,61,'10:38','2015-12-29 05:39:01','2015-12-29 05:39:01'),(64,62,'10:38','2015-12-29 05:39:30','2015-12-29 05:39:30'),(65,63,'10:38','2015-12-29 05:39:40','2015-12-29 05:39:40'),(66,64,'10:38','2015-12-29 05:39:59','2015-12-29 05:39:59'),(67,65,'10:38','2015-12-29 05:40:15','2015-12-29 05:40:15'),(68,66,'10:38','2015-12-29 05:41:04','2015-12-29 05:41:04'),(69,67,'10:38','2015-12-29 05:41:52','2015-12-29 05:41:52'),(70,68,'10:38','2015-12-29 05:42:25','2015-12-29 05:42:25'),(71,69,'10:38','2015-12-29 05:42:33','2015-12-29 05:42:33'),(72,70,'10:38','2015-12-29 05:49:19','2015-12-29 05:49:19'),(73,71,'10:38','2015-12-29 05:49:54','2015-12-29 05:49:54'),(74,72,'10:38','2015-12-29 05:50:22','2015-12-29 05:50:22'),(75,73,'10:38','2015-12-29 05:50:48','2015-12-29 05:50:48'),(76,74,'10:38','2015-12-29 05:51:04','2015-12-29 05:51:04'),(77,75,'10:38','2015-12-29 05:51:16','2015-12-29 05:51:16'),(78,76,'10:38','2015-12-29 05:52:07','2015-12-29 05:52:07'),(79,77,'10:38','2015-12-29 05:53:09','2015-12-29 05:53:09'),(80,78,'10:38','2015-12-29 05:53:41','2015-12-29 05:53:41'),(81,79,'10:38','2015-12-29 05:54:49','2015-12-29 05:54:49'),(82,80,'10:38','2015-12-29 05:55:01','2015-12-29 05:55:01'),(83,81,'10:38','2015-12-29 05:55:32','2015-12-29 05:55:32'),(84,82,'10:38','2015-12-29 05:57:11','2015-12-29 05:57:11'),(85,83,'10:38','2015-12-29 05:57:35','2015-12-29 05:57:35'),(86,84,'10:38','2015-12-29 06:00:05','2015-12-29 06:00:05'),(87,85,'10:38','2015-12-29 06:01:04','2015-12-29 06:01:04'),(88,86,'10:38','2015-12-29 06:01:28','2015-12-29 06:01:28'),(89,87,'10:38','2015-12-29 06:01:35','2015-12-29 06:01:35'),(90,88,'10:38','2015-12-29 06:03:09','2015-12-29 06:03:09'),(91,89,'10:38','2015-12-29 06:03:23','2015-12-29 06:03:23'),(92,90,'10:38','2015-12-29 06:03:46','2015-12-29 06:03:46'),(93,91,'10:38','2015-12-29 06:05:59','2015-12-29 06:05:59'),(94,92,'10:38','2015-12-29 06:10:01','2015-12-29 06:10:01'),(95,93,'10:38','2015-12-29 06:10:33','2015-12-29 06:10:33'),(96,94,'10:38','2015-12-29 06:11:08','2015-12-29 06:11:08'),(97,95,'10:38','2015-12-29 06:11:27','2015-12-29 06:11:27'),(98,96,'10:38','2015-12-29 06:11:36','2015-12-29 06:11:36'),(99,97,'11:00','2015-12-29 06:17:41','2016-01-04 10:43:04'),(100,97,'13:00','2015-12-29 06:17:41','2016-01-04 10:43:04'),(101,98,'10:38','2015-12-29 06:19:06','2015-12-29 06:19:06'),(102,99,'10:38','2015-12-29 06:19:45','2015-12-29 06:19:45'),(103,100,'10:38','2015-12-29 06:20:01','2015-12-29 06:20:01'),(104,101,'10:38','2015-12-29 06:20:16','2015-12-29 06:20:16'),(105,102,'10:38','2015-12-29 06:20:50','2015-12-29 06:20:50'),(106,103,'10:38','2015-12-29 06:21:11','2015-12-29 06:21:11'),(107,104,'10:38','2015-12-29 06:21:49','2015-12-29 06:21:49'),(108,105,'10:38','2015-12-29 06:22:48','2015-12-29 06:22:48'),(109,106,'10:38','2015-12-29 06:23:43','2015-12-29 06:23:43'),(110,107,'10:38','2015-12-29 06:23:50','2015-12-29 06:23:50'),(111,108,'10:38','2015-12-29 06:24:44','2015-12-29 06:24:44'),(112,109,'10:38','2015-12-29 06:25:43','2015-12-29 06:25:43'),(113,3,'12:18','2015-12-29 06:48:53','2016-01-20 11:28:21'),(114,110,'14:25','2015-12-29 08:56:01','2016-01-08 09:49:18'),(115,111,'11:09','2016-01-02 05:39:39','2016-01-20 05:27:05'),(116,112,'19:31','2016-01-04 13:02:25','2016-01-04 13:02:25'),(117,113,'18:35','2016-01-04 13:05:37','2016-01-04 13:05:37'),(118,114,'18:36','2016-01-04 13:14:55','2016-01-04 13:14:55'),(119,115,'18:36','2016-01-04 13:15:21','2016-01-20 05:34:28'),(124,112,'10:39','2016-01-16 05:09:43','2016-01-16 05:09:43'),(127,115,'10:53','2016-01-20 05:23:42','2016-01-20 05:34:28'),(140,124,'09:00','2016-01-21 10:50:53','2016-01-21 10:50:53'),(141,124,'09:01','2016-01-21 10:50:53','2016-01-21 10:50:53'),(142,124,'12:18','2016-01-21 10:50:53','2016-01-21 10:50:53'),(146,126,'18:46','2016-01-21 11:15:28','2016-01-21 11:15:28'),(147,126,'19:00','2016-01-21 11:15:28','2016-01-21 11:15:28'),(150,128,'18:46','2016-01-21 11:43:40','2016-01-21 11:43:40'),(151,128,'19:00','2016-01-21 11:43:40','2016-01-21 11:43:40');
/*!40000 ALTER TABLE `attraction_product_time_slots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attraction_products`
--

DROP TABLE IF EXISTS `attraction_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attraction_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `includes` text NOT NULL,
  `excludes` text NOT NULL,
  `currency_id` int(10) unsigned NOT NULL,
  `original_price` decimal(10,2) NOT NULL,
  `duration` text COMMENT 'Cancellation Policy (refundable/ non refundable)\n',
  `cancellation_policy` text COMMENT 'Cancellation Policy (refundable/ non refundable)\n',
  `availability` text,
  `safety_info` text,
  `other_rules` text,
  `important_points` text,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction_products`
--

LOCK TABLES `attraction_products` WRITE;
/*!40000 ALTER TABLE `attraction_products` DISABLE KEYS */;
INSERT INTO `attraction_products` VALUES (2,1,'Udipi Shri Krishna Boarding','Sydney Tower Eye is a must-do while in the city that takes you to the highest point above Sydney for breathtaking 360-degree views of our beautiful harbour city, including the Sydney Harbour Bridge and Sydney Opera House along with an amazing vista that stretches from the Sydney CBD out to the distant horizons of the Blue Mountains.<br>\n                <br>\n                Eighteen different binoculars will let you peer out to a distance of up to 100 kilometres in every direction or zoom in on a point of interest. From the golden beaches in the east to the distant Blue Mountains, youll be amazed by Sydneys best views.<br>\n                <br>\n                <strong>Meet Location:</strong> In front of Cinecitta at 663 Union Street, which is near the corner of Union and Columbus, in between Powell and Columbus Streets on Union, near Washington Square Park.<br><br>\n                <strong>Check in Time:</strong> 10 a.m. and 2 p.m.<br><br>\n                <strong>Itinerary:</strong> Explore North Beach/Little Italy\'s Foods & History Enjoy the best coffee and see how it is roasted Savor award-winning chocolates and see how the chocolates are made Enjoy fresh baked breads and watch breads bake in 130-year-old ovens Taste local olive oils and relish a variety of local pizza Explore the Beat Generation hangouts.<br><br>\n                <strong>Insider Tip:</strong> The tour is about 7-8 blocks<br><br>\n                <strong>What to Wear:</strong> Bring a light wind-breaker or jacket as San Francisco can get chilly even in the summer.','<ul>\n                      <li><span>Sydney Tower Eye Priority Access</span></li>\n                      <li><span>4D Cinema Experience</span></li>\n                      <li><span>SKYWALK</span></li>\n                    </ul>','<ul>\n                      <li><span>Meals and drinks</span></li>\n                      <li><span>Personal expenses</span></li>\n                      <li><span>Optional activities</span></li>\n                      <li><span>Tips and gratuities</span></li>\n                    </ul>',67,200.00,NULL,'No Refunds','Sunday, Monday, Thursday, Friday and Saturday at 10 a.m., 10:45 a.m., 11:30 a.m., 12:15 p.m., 1 p.m., 1:45 p.m., 2:30 p.m., 3:15 p.m.','','No Pets Allowed',NULL,'2015-12-24 16:15:00','2016-05-27 18:35:00',1,'2015-12-17 10:45:31','2016-01-04 10:31:57'),(3,1,'Manis Lunch Home','<p>Sydney Tower Eye is a must-do while in the city that takes you to the highest point above Sydney for breathtaking 360-degree views of our beautiful harbour city, including the Sydney Harbour Bridge and Sydney Opera House along with an amazing vista that stretches from the Sydney CBD out to the distant horizons of the Blue Mountains.<br /> <br /> Eighteen different binoculars will let you peer out to a distance of up to 100 kilometres in every direction or zoom in on a point of interest. From the golden beaches in the east to the distant Blue Mountains, youll be amazed by Sydneys best views.<br /> <br /> <strong>Meet Location:</strong> In front of Cinecitta at 663 Union Street, which is near the corner of Union and Columbus, in between Powell and Columbus Streets on Union, near Washington Square Park.<br /><br /> <strong>Check in Time:</strong> 10 a.m. and 2 p.m.<br /><br /> <strong>Itinerary:</strong> Explore North Beach/Little Italy\'s Foods &amp; History Enjoy the best coffee and see how it is roasted Savor award-winning chocolates and see how the chocolates are made Enjoy fresh baked breads and watch breads bake in 130-year-old ovens Taste local olive oils and relish a variety of local pizza Explore the Beat Generation hangouts.<br /><br /> <strong>Insider Tip:</strong> The tour is about 7-8 blocks<br /><br /> <strong>What to Wear:</strong> Bring a light wind-breaker or jacket as San Francisco can get chilly even in the summer.</p>','<ul>\r\n<li>Sydney Tower Eye Priority Access</li>\r\n<li>4D Cinema Experience</li>\r\n<li>SKYWALK</li>\r\n</ul>','<ul>\r\n<li>Meals and drinks</li>\r\n<li>Personal expenses</li>\r\n<li>Optional activities</li>\r\n<li>Tips and gratuities</li>\r\n</ul>',67,100.00,'<p>1 Hour</p>','<p>Taste\'s Best. No Refund</p>','<p>Available 24/7</p>','<p>Credit And Debit Cards Accepted. No need to carry cash</p>','<p>Pets not Allowed</p>','','2015-12-24 16:15:00','2016-05-27 18:35:00',1,'2015-12-18 13:06:25','2016-01-20 11:28:21'),(4,7,'Product 1','<p>Product 1 Description</p>','','',67,10000.00,NULL,'no cancellation.','avaliable','','No Pets Allowed',NULL,'2015-12-24 16:15:00','2016-06-25 11:09:00',1,'2015-12-21 06:27:25','2016-01-04 10:43:56'),(28,6,'10k Snowshoe Race ','<p>10k Snowshoe Race</p>\n<p>starts March 19th</p>','','',67,80.00,NULL,'No Refund','Available Now','','Don’t cut the course. Don’t litter. Snowshoes mandatory.\n\nSorry, no dogs',NULL,'2015-12-24 16:15:00','2016-06-25 11:09:00',1,'2015-12-29 05:18:37','2016-01-04 10:45:42'),(48,6,'1/2 Marathon Snowshoe Race','<p>1/2 Marathon Snowshoe Race</p>\n<div id=\"descriptionDiv36147605\" style=\"font-size: 11px; line-height: 12px; margin: 5px 0 0 0;\">starts March 19th</div>','<p>efsfgdg</p>','<p>dgsgsgsdg</p>',67,90.00,NULL,'<p>No Refund</p>','<p>Ticket Available</p>','','<p>Don&rsquo;t cut the course. Don&rsquo;t litter. Snowshoes mandatory. Sorry, no dogs.</p>',NULL,'2015-12-24 16:15:00','2016-06-25 11:09:00',1,'2015-12-29 05:27:49','2016-01-05 13:34:09'),(97,3,'MTB6 Mountain Bike Race','<p><strong>Course Description &amp; Profile:</strong> <span style=\"color: #ff0000;\">NEW COURSE CHANGES</span> We have made changes to the course this year!&nbsp; Expect climbing on beautiful switchback singletrack with equally rewarding descents over a 10 mile lap.&nbsp; All riders will return back to the start finish lap after each lap before going out on additional laps. There will no longer be any course crossings or 2-way sections!</p>','','',67,100.00,NULL,'No Refund','Same Day Registration: CASH ONLY','','All 6 hour racers will take off at 9:30am.  2 lap and 1 lap racers will take off together 2 minutes later at 9:32am.\nRacer meeting at 9:15am just before the start which will take place at the start/finish area.',NULL,'2015-12-24 16:15:00','2016-06-25 11:09:00',1,'2015-12-29 06:17:41','2016-01-04 10:43:04'),(110,9,'San Francisco CityPASS','<h3 class=\"activity-tagline\">Entry to 4 top SF sights plus transit</h3>\n<div class=\"full-details\">\n<div class=\"activity-summary\">Get access to some of SF&rsquo;s top sights, plus coupons and a week of unlimited Muni and cable car transportation in this value-packed pass.</div>\n<div class=\"activity-description\">\n<ul>\n<li>7-day access to MUNI&nbsp;and Cable Car transport</li>\n<li>General admission to the California Academy of Sciences &nbsp;</li>\n<li>Blue and&nbsp;Gold Fleet Bay Cruise Adventure (1-hour cruise)</li>\n<li>Choice of general admission to the Aquarium of the Bay or&nbsp;the Monterey Bay Aquarium</li>\n<li>Choice of general admission to either the Exploratorium or the de Young Museum and Legion of Honor (must be visited together on the same day to be valid)</li>\n<li>Shopping and dining coupons</li>\n<li>Tips revealing a CityPASS; secret to breezing past ticket lines like a VIP</li>\n</ul>\n</div>\n</div>','','',67,94.00,NULL,'24 hours in advance','Passes are available year round, passes expire 6 months after purchase date','','',NULL,'2015-12-24 16:15:00','2016-04-30 16:24:00',1,'2015-12-29 08:56:01','2016-01-08 09:49:18'),(111,8,'test','<p>test</p>','<p>includes goes here&nbsp;</p>','<p>excludes goes here&nbsp;</p>',67,2000.00,NULL,'test','test','test','test',NULL,'2015-12-24 16:15:00','2016-07-21 11:09:00',1,'2016-01-02 05:39:39','2016-01-20 05:27:05'),(115,8,'New attraction 8','<p>Description goes here &nbsp;</p>','<p>Includes goes here</p>','<p>Excludes goes here&nbsp;</p>',0,0.00,NULL,'','','','',NULL,'2016-01-28 10:52:00','2016-01-29 10:52:00',1,'2016-01-20 05:23:42','2016-01-20 05:34:28'),(126,14,'Udipi Shri Krishna Boarding','Sydney Tower Eye is a must-do while in the city that takes you to the highest point above Sydney for breathtaking 360-degree views of our beautiful harbour city, including the Sydney Harbour Bridge and Sydney Opera House along with an amazing vista that stretches from the Sydney CBD out to the distant horizons of the Blue Mountains.<br>\n                <br>\n                Eighteen different binoculars will let you peer out to a distance of up to 100 kilometres in every direction or zoom in on a point of interest. From the golden beaches in the east to the distant Blue Mountains, youll be amazed by Sydneys best views.<br>\n                <br>\n                <strong>Meet Location:</strong> In front of Cinecitta at 663 Union Street, which is near the corner of Union and Columbus, in between Powell and Columbus Streets on Union, near Washington Square Park.<br><br>\n                <strong>Check in Time:</strong> 10 a.m. and 2 p.m.<br><br>\n                <strong>Itinerary:</strong> Explore North Beach/Little Italy\'s Foods & History Enjoy the best coffee and see how it is roasted Savor award-winning chocolates and see how the chocolates are made Enjoy fresh baked breads and watch breads bake in 130-year-old ovens Taste local olive oils and relish a variety of local pizza Explore the Beat Generation hangouts.<br><br>\n                <strong>Insider Tip:</strong> The tour is about 7-8 blocks<br><br>\n                <strong>What to Wear:</strong> Bring a light wind-breaker or jacket as San Francisco can get chilly even in the summer.','<ul>\n                      <li><span>Sydney Tower Eye Priority Access</span></li>\n                      <li><span>4D Cinema Experience</span></li>\n                      <li><span>SKYWALK</span></li>\n                    </ul>','<ul>\n                      <li><span>Meals and drinks</span></li>\n                      <li><span>Personal expenses</span></li>\n                      <li><span>Optional activities</span></li>\n                      <li><span>Tips and gratuities</span></li>\n                    </ul>',67,200.00,NULL,'No Refunds','Sunday, Monday, Thursday, Friday and Saturday at 10 a.m., 10:45 a.m., 11:30 a.m., 12:15 p.m., 1 p.m., 1:45 p.m., 2:30 p.m., 3:15 p.m.','','No Pets Allowed',NULL,'2015-12-24 16:15:00','2016-05-27 18:35:00',1,'2016-01-21 11:15:28','2016-01-21 11:15:28'),(128,16,'Udipi Shri Krishna Boarding','Sydney Tower Eye is a must-do while in the city that takes you to the highest point above Sydney for breathtaking 360-degree views of our beautiful harbour city, including the Sydney Harbour Bridge and Sydney Opera House along with an amazing vista that stretches from the Sydney CBD out to the distant horizons of the Blue Mountains.<br>\n                <br>\n                Eighteen different binoculars will let you peer out to a distance of up to 100 kilometres in every direction or zoom in on a point of interest. From the golden beaches in the east to the distant Blue Mountains, youll be amazed by Sydneys best views.<br>\n                <br>\n                <strong>Meet Location:</strong> In front of Cinecitta at 663 Union Street, which is near the corner of Union and Columbus, in between Powell and Columbus Streets on Union, near Washington Square Park.<br><br>\n                <strong>Check in Time:</strong> 10 a.m. and 2 p.m.<br><br>\n                <strong>Itinerary:</strong> Explore North Beach/Little Italy\'s Foods & History Enjoy the best coffee and see how it is roasted Savor award-winning chocolates and see how the chocolates are made Enjoy fresh baked breads and watch breads bake in 130-year-old ovens Taste local olive oils and relish a variety of local pizza Explore the Beat Generation hangouts.<br><br>\n                <strong>Insider Tip:</strong> The tour is about 7-8 blocks<br><br>\n                <strong>What to Wear:</strong> Bring a light wind-breaker or jacket as San Francisco can get chilly even in the summer.','<ul>\n                      <li><span>Sydney Tower Eye Priority Access</span></li>\n                      <li><span>4D Cinema Experience</span></li>\n                      <li><span>SKYWALK</span></li>\n                    </ul>','<ul>\n                      <li><span>Meals and drinks</span></li>\n                      <li><span>Personal expenses</span></li>\n                      <li><span>Optional activities</span></li>\n                      <li><span>Tips and gratuities</span></li>\n                    </ul>',67,200.00,NULL,'No Refunds','Sunday, Monday, Thursday, Friday and Saturday at 10 a.m., 10:45 a.m., 11:30 a.m., 12:15 p.m., 1 p.m., 1:45 p.m., 2:30 p.m., 3:15 p.m.','','No Pets Allowed',NULL,'2015-12-24 16:15:00','2016-05-27 18:35:00',1,'2016-01-21 11:43:40','2016-01-21 11:43:40');
/*!40000 ALTER TABLE `attraction_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attraction_products_tags`
--

DROP TABLE IF EXISTS `attraction_products_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attraction_products_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_product_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction_products_tags`
--

LOCK TABLES `attraction_products_tags` WRITE;
/*!40000 ALTER TABLE `attraction_products_tags` DISABLE KEYS */;
INSERT INTO `attraction_products_tags` VALUES (7,4,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,6,10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,7,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,8,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,9,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,10,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,11,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,12,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,13,7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,14,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,15,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,16,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,17,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,18,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,19,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,20,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,21,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,22,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(29,23,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,24,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(31,25,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(32,26,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(33,27,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(34,28,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(35,28,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(36,29,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(37,30,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(38,31,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(39,32,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(40,33,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(41,34,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(42,35,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(43,36,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(44,37,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(45,38,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(46,39,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(47,40,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(48,41,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(49,42,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(50,43,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(51,44,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(52,45,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(53,46,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(54,47,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(55,48,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(56,48,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(57,49,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(58,50,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(59,51,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(60,52,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(61,53,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(62,54,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(63,55,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(64,56,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(65,57,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(66,58,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(67,59,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(68,60,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(69,61,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(70,62,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(71,63,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(72,64,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(73,65,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(74,66,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(75,67,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(76,68,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(77,69,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(78,70,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(79,71,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(80,72,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(81,73,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(82,74,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(83,75,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(84,76,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(85,77,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(86,78,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(87,79,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(88,80,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(89,81,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(90,82,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(91,83,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(92,84,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(93,85,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(94,86,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(95,87,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(96,88,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(97,89,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(98,90,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(99,91,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(100,92,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(101,93,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(102,94,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(103,95,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(104,96,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(105,97,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(106,98,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(107,99,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(108,100,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(109,101,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(110,102,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(111,103,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(112,104,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(113,105,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(114,106,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(115,107,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(116,108,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(117,109,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(118,3,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(119,3,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(120,2,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(121,2,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(122,4,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(123,111,3,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `attraction_products_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attraction_regular_timings`
--

DROP TABLE IF EXISTS `attraction_regular_timings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attraction_regular_timings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` int(10) NOT NULL,
  `week_day_id` int(10) NOT NULL,
  `opening_time` time DEFAULT NULL,
  `closing_time` time DEFAULT NULL,
  `is_closed` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction_regular_timings`
--

LOCK TABLES `attraction_regular_timings` WRITE;
/*!40000 ALTER TABLE `attraction_regular_timings` DISABLE KEYS */;
INSERT INTO `attraction_regular_timings` VALUES (1,1,1,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2015-12-24 12:58:08'),(2,1,2,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2015-12-24 12:58:08'),(3,1,3,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2015-12-24 12:58:08'),(4,1,4,'11:07:00','11:07:00',1,'2015-12-11 05:38:35','2015-12-24 12:58:08'),(5,1,5,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2015-12-24 12:58:08'),(6,1,6,'11:07:00','11:07:00',1,'2015-12-11 05:38:35','2015-12-24 12:58:08'),(7,1,7,'11:07:00','11:07:00',1,'2015-12-11 05:38:35','2015-12-24 12:58:08'),(15,3,1,'08:00:00','20:26:00',0,'2015-12-11 07:21:47','2015-12-29 06:23:25'),(16,3,2,'08:00:00','20:26:00',0,'2015-12-11 07:21:47','2015-12-29 06:23:25'),(17,3,3,'08:00:00',NULL,0,'2015-12-11 07:21:47','2015-12-29 06:23:25'),(18,3,4,'20:26:00','20:26:00',1,'2015-12-11 07:21:47','2015-12-29 06:23:25'),(19,3,5,'20:26:00','20:26:00',1,'2015-12-11 07:21:47','2015-12-29 06:23:25'),(20,3,6,NULL,NULL,1,'2015-12-11 07:21:47','2015-12-29 06:23:25'),(21,3,7,NULL,NULL,1,'2015-12-11 07:21:47','2015-12-29 06:23:25'),(85,6,1,NULL,NULL,1,'2015-12-18 11:08:54','2015-12-29 05:32:05'),(86,6,2,'11:01:00','19:01:00',0,'2015-12-18 11:08:54','2015-12-29 05:32:05'),(87,6,3,'12:01:00','20:01:00',0,'2015-12-18 11:08:54','2015-12-29 05:32:05'),(88,6,4,NULL,NULL,1,'2015-12-18 11:08:54','2015-12-29 05:32:05'),(89,6,5,NULL,NULL,1,'2015-12-18 11:08:54','2015-12-29 05:32:05'),(90,6,6,NULL,NULL,1,'2015-12-18 11:08:54','2015-12-29 05:32:05'),(91,6,7,NULL,NULL,1,'2015-12-18 11:08:54','2015-12-29 05:32:05'),(92,7,1,'11:52:00','11:52:00',0,'2015-12-21 06:23:43','2015-12-24 11:51:54'),(93,7,2,'11:52:00','11:52:00',0,'2015-12-21 06:23:43','2015-12-24 11:51:54'),(94,7,3,'11:52:00','11:52:00',1,'2015-12-21 06:23:43','2015-12-24 11:51:54'),(95,7,4,'11:52:00','11:52:00',1,'2015-12-21 06:23:43','2015-12-24 11:51:54'),(96,7,5,'11:52:00','11:52:00',1,'2015-12-21 06:23:43','2015-12-24 11:51:54'),(97,7,6,'11:52:00','11:52:00',1,'2015-12-21 06:23:43','2015-12-24 11:51:54'),(98,7,7,'11:52:00','11:52:00',1,'2015-12-21 06:23:43','2015-12-24 11:51:54'),(99,8,1,NULL,NULL,1,'2015-12-21 10:06:25','2015-12-21 10:06:25'),(100,8,2,NULL,NULL,1,'2015-12-21 10:06:25','2015-12-21 10:06:25'),(101,8,3,NULL,NULL,1,'2015-12-21 10:06:25','2015-12-21 10:06:25'),(102,8,4,NULL,NULL,1,'2015-12-21 10:06:25','2015-12-21 10:06:25'),(103,8,5,NULL,NULL,1,'2015-12-21 10:06:25','2015-12-21 10:06:25'),(104,8,6,NULL,NULL,1,'2015-12-21 10:06:25','2015-12-21 10:06:25'),(105,8,7,NULL,NULL,1,'2015-12-21 10:06:25','2015-12-21 10:06:25'),(113,9,1,'09:00:00','12:00:00',0,'2015-12-29 09:03:05','2015-12-29 09:03:18'),(114,9,2,'09:00:00','12:00:00',0,'2015-12-29 09:03:05','2015-12-29 09:03:18'),(115,9,3,NULL,NULL,1,'2015-12-29 09:03:05','2015-12-29 09:03:18'),(116,9,4,NULL,NULL,1,'2015-12-29 09:03:05','2015-12-29 09:03:18'),(117,9,5,NULL,NULL,1,'2015-12-29 09:03:05','2015-12-29 09:03:18'),(118,9,6,NULL,NULL,1,'2015-12-29 09:03:05','2015-12-29 09:03:18'),(119,9,7,NULL,NULL,1,'2015-12-29 09:03:05','2015-12-29 09:03:18'),(120,14,1,NULL,NULL,1,'2016-01-21 11:43:00','2016-01-21 11:43:00'),(121,14,2,NULL,NULL,1,'2016-01-21 11:43:00','2016-01-21 11:43:00'),(122,14,3,NULL,NULL,1,'2016-01-21 11:43:00','2016-01-21 11:43:00'),(123,14,4,'09:00:00','18:00:00',0,'2016-01-21 11:43:00','2016-01-21 11:43:00'),(124,14,5,'09:00:00','18:00:00',0,'2016-01-21 11:43:00','2016-01-21 11:43:00'),(125,14,6,'09:00:00','18:00:00',0,'2016-01-21 11:43:00','2016-01-21 11:43:00'),(126,14,7,'09:00:00','18:00:00',0,'2016-01-21 11:43:00','2016-01-21 11:43:00'),(127,16,1,NULL,NULL,1,'2016-01-21 11:43:40','2016-01-21 11:43:40'),(128,16,2,NULL,NULL,1,'2016-01-21 11:43:40','2016-01-21 11:43:40'),(129,16,3,NULL,NULL,1,'2016-01-21 11:43:40','2016-01-21 11:43:40'),(130,16,4,'09:00:00','18:00:00',0,'2016-01-21 11:43:40','2016-01-21 11:43:40'),(131,16,5,'09:00:00','18:00:00',0,'2016-01-21 11:43:40','2016-01-21 11:43:40'),(132,16,6,'09:00:00','18:00:00',0,'2016-01-21 11:43:40','2016-01-21 11:43:40'),(133,16,7,'09:00:00','18:00:00',0,'2016-01-21 11:43:40','2016-01-21 11:43:40');
/*!40000 ALTER TABLE `attraction_regular_timings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attraction_types`
--

DROP TABLE IF EXISTS `attraction_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attraction_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned DEFAULT NULL,
  `rght` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `thumbnail_image` varchar(255) DEFAULT NULL,
  `cover_image` tinyint(1) DEFAULT NULL,
  `display_on_homepage` tinyint(1) DEFAULT NULL,
  `no_of_elements_to_show` int(3) DEFAULT NULL,
  `homepage_order` int(3) unsigned DEFAULT NULL,
  `meta_title` varchar(70) DEFAULT NULL,
  `meta_description` varchar(160) DEFAULT NULL,
  `meta_keywords` text,
  `active` tinyint(1) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction_types`
--

LOCK TABLES `attraction_types` WRITE;
/*!40000 ALTER TABLE `attraction_types` DISABLE KEYS */;
INSERT INTO `attraction_types` VALUES (1,NULL,1,2,'Demo Type 1','asd asd as asd','activitycolg.jpg',0,0,2,1,'sada dad as a','as dad as dsada','as dasd asdas asdsa dsa',1,'2015-12-10 10:31:25','2015-12-22 08:40:33'),(2,NULL,3,4,'Racing','Atttraction Type is Racing','racing.jpeg',1,0,1,1,'','','',1,'2015-12-29 04:56:28','2015-12-29 04:56:28'),(3,NULL,5,6,'cuisine','Cuisine Description','cuisine.jpg',1,0,2,NULL,'','','',1,'2015-12-29 06:34:30','2015-12-29 06:34:30'),(4,NULL,7,8,'City','If there’s anything more valuable to a traveler than time, it’s money and memories, and the San Francisco CityPASS capitalizes on all three. Its package bundles admission to five top attractions like the California Academy of Sciences and Blue and Gold Fleet cruises, with unlimited Muni bus and cable car access that gets you everywhere. Once you’re there not only will you get in for a fraction of the cost, you’ll usually be able to skip the line. If you plan on playing tourist and bouncing around to a lot of San Francisco attractions, this pass combines value with convenience.','1846366801-san-francisco-city-pass.jpg',1,0,NULL,NULL,'','','',1,'2015-12-29 07:19:21','2015-12-29 07:19:21');
/*!40000 ALTER TABLE `attraction_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attraction_videos`
--

DROP TABLE IF EXISTS `attraction_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attraction_videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `order_no` int(2) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_UNIQUE` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraction_videos`
--

LOCK TABLES `attraction_videos` WRITE;
/*!40000 ALTER TABLE `attraction_videos` DISABLE KEYS */;
INSERT INTO `attraction_videos` VALUES (4,1,'Video 2','https://www.youtube.com/watch?v=bh58iC5vMAs',2,1,'2015-12-17 04:58:18','2015-12-24 13:04:11'),(6,3,'test','https://youtu.be/PKCTsKiuX08',1,1,'2015-12-17 12:26:32','2015-12-29 05:53:18'),(9,6,'d','https://www.youtube.com/wddatch?v=TVDDkjQmiT8',1,1,'2015-12-18 11:08:54','2015-12-18 12:49:42'),(10,7,'fgdgdfgd','http://youtube.com',1,1,'2015-12-21 06:23:43','2015-12-24 11:53:12'),(11,8,'ss','http://localhost/tuatos/admin/destinations',1,1,'2015-12-21 10:06:25','2015-12-21 10:06:25');
/*!40000 ALTER TABLE `attraction_videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attractions`
--

DROP TABLE IF EXISTS `attractions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attractions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'hidden',
  `user_id` int(10) unsigned NOT NULL COMMENT 'Added By',
  `country_id` int(10) unsigned NOT NULL COMMENT 'Country',
  `destination_id` int(10) unsigned NOT NULL COMMENT 'Destination',
  `attraction_type_id` int(10) unsigned NOT NULL COMMENT 'Attraction Type',
  `title` varchar(255) NOT NULL COMMENT 'Title',
  `description` text NOT NULL,
  `highlights` text NOT NULL COMMENT 'Highlights',
  `includes` text NOT NULL COMMENT 'What you get',
  `excludes` text NOT NULL COMMENT 'What you don''t get',
  `validity` text NOT NULL COMMENT 'Validity',
  `cancellation_policy` text NOT NULL COMMENT 'Cancellation Policy',
  `important_points_to_be_noted` text NOT NULL COMMENT 'Important Points to be Noted',
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `meta_title` varchar(70) DEFAULT NULL,
  `meta_description` varchar(160) DEFAULT NULL,
  `meta_keywords` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attractions`
--

LOCK TABLES `attractions` WRITE;
/*!40000 ALTER TABLE `attractions` DISABLE KEYS */;
INSERT INTO `attractions` VALUES (1,3,103,1,3,'Scenic Dining Cruises','<p><strong>Indian cuisine</strong> encompasses a wide variety of regional cuisines native to <a title=\"India\" href=\"https://en.wikipedia.org/wiki/India\">India</a>. Given the range of diversity in soil type, climate, culture, ethnic group and occupations, these cuisines vary significantly from each other and use locally available <a title=\"Spice\" href=\"https://en.wikipedia.org/wiki/Spice\">spices</a>, <a title=\"Herb\" href=\"https://en.wikipedia.org/wiki/Herb\">herbs</a>, <a title=\"Vegetable\" href=\"https://en.wikipedia.org/wiki/Vegetable\">vegetables</a> and <a title=\"Fruit\" href=\"https://en.wikipedia.org/wiki/Fruit\">fruits</a>. Indian food is also heavily influenced by religious and cultural choices and traditions. There has also been <a class=\"mw-redirect\" title=\"Central Asian\" href=\"https://en.wikipedia.org/wiki/Central_Asian\">Central Asian</a> influence on <a title=\"North Indian cuisine\" href=\"https://en.wikipedia.org/wiki/North_Indian_cuisine\">North Indian cuisine</a> from the years of <a title=\"Mughal Empire\" href=\"https://en.wikipedia.org/wiki/Mughal_Empire\">Mughal</a> rule.<sup id=\"cite_ref-GestelandGesteland2010_2-0\" class=\"reference\"></sup> Indian cuisine has been and is still evolving, as a result of the nation\'s cultural interactions with other societies</p>','<p><a title=\"Staple food\" href=\"https://en.wikipedia.org/wiki/Staple_food\">Staple foods</a> of Indian cuisine include <a title=\"Pearl millet\" href=\"https://en.wikipedia.org/wiki/Pearl_millet\">pearl millet</a> (<em>bājra</em>), <a title=\"Rice\" href=\"https://en.wikipedia.org/wiki/Rice\">rice</a>, <a title=\"Whole-wheat flour\" href=\"https://en.wikipedia.org/wiki/Whole-wheat_flour\">whole-wheat flour</a> (<em>aṭṭa</em>), and a variety of <a title=\"Lentil\" href=\"https://en.wikipedia.org/wiki/Lentil\">lentils</a>, such as <em>masoor</em> (most often red <a title=\"Lentil\" href=\"https://en.wikipedia.org/wiki/Lentil\">lentils</a>), <em>toor</em> (<a title=\"Pigeon pea\" href=\"https://en.wikipedia.org/wiki/Pigeon_pea\">pigeon peas</a>), <em><a class=\"mw-redirect\" title=\"Urad (bean)\" href=\"https://en.wikipedia.org/wiki/Urad_%28bean%29\">urad</a></em> (black gram), and <em>mong</em> (<a title=\"Mung bean\" href=\"https://en.wikipedia.org/wiki/Mung_bean\">mung beans</a>). Lentils may be used whole, dehusked&mdash;for example, <em>dhuli moong</em> or <em>dhuli urad</em>&mdash;or split. Split lentils, or <em><a title=\"Dal\" href=\"https://en.wikipedia.org/wiki/Dal\">dal</a></em>, are used extensively. Some <a title=\"Pulse (legume)\" href=\"https://en.wikipedia.org/wiki/Pulse_%28legume%29\">pulses</a>, such as <em>channa</em> (<a title=\"Chickpea\" href=\"https://en.wikipedia.org/wiki/Chickpea\">chickpeas</a>), <em><a title=\"Rajma\" href=\"https://en.wikipedia.org/wiki/Rajma\">rajma</a></em> (<a title=\"Kidney bean\" href=\"https://en.wikipedia.org/wiki/Kidney_bean\">kidney beans</a>), and <em>lobiya</em> (<a title=\"Black-eyed pea\" href=\"https://en.wikipedia.org/wiki/Black-eyed_pea\">black-eyed peas</a>) are very common, especially in the northern regions. <em>Channa</em> and <em>moong</em> are also processed into flour (<em><a title=\"Gram flour\" href=\"https://en.wikipedia.org/wiki/Gram_flour\">besan</a></em>).</p>','<ul>\r\n<li>Many Indian dishes are cooked in <a title=\"Vegetable oil\" href=\"https://en.wikipedia.org/wiki/Vegetable_oil\">vegetable oil</a>, but <a title=\"Peanut oil\" href=\"https://en.wikipedia.org/wiki/Peanut_oil\">peanut oil</a> is popular in northern and western India, <a title=\"Mustard oil\" href=\"https://en.wikipedia.org/wiki/Mustard_oil\">mustard oil</a> in eastern India, and <a title=\"Coconut oil\" href=\"https://en.wikipedia.org/wiki/Coconut_oil\">coconut oil</a> along the western coast, especially in <a title=\"Kerala\" href=\"https://en.wikipedia.org/wiki/Kerala\">Kerala</a><sup>.</sup></li>\r\n<li><a title=\"Sesame oil\" href=\"https://en.wikipedia.org/wiki/Sesame_oil\"><em>Gingelly</em> (sesame) oil</a> is common in the south since it imparts a fragrant nutty aroma. In recent decades, <a title=\"Sunflower oil\" href=\"https://en.wikipedia.org/wiki/Sunflower_oil\">sunflower</a> and <a title=\"Soybean oil\" href=\"https://en.wikipedia.org/wiki/Soybean_oil\">soybean</a> oils have become popular across India.</li>\r\n<li><a title=\"Hydrogenation\" href=\"https://en.wikipedia.org/wiki/Hydrogenation\">Hydrogenated</a> vegetable oil, known as <em><a title=\"Vanaspati\" href=\"https://en.wikipedia.org/wiki/Vanaspati\">Vanaspati</a> ghee</em>, is another popular cooking medium. Butter-based <a title=\"Ghee\" href=\"https://en.wikipedia.org/wiki/Ghee\">ghee</a>, or <em>deshi ghee</em>, is used frequently, though less than in the past. Many types of meat are used for Indian cooking, but chicken and mutton tend to be the most commonly consumed meats.</li>\r\n<li>Fish and beef consumption are prevalent in some parts of India, but they are not widely consumed.</li>\r\n</ul>','<ul>\r\n<li>Cuisine differs across <a title=\"List of regions of India\" href=\"https://en.wikipedia.org/wiki/List_of_regions_of_India\">India\'s diverse regions</a> as a result of variation in local culture, geographical location (proximity to sea, desert, or mountains) and economics.</li>\r\n<li>It also varies seasonally, depending on which fruits and vegetables are ripe.</li>\r\n</ul>','<p>Always Avaliable</p>','<ul style=\"box-sizing: border-box; margin: 0px; border-radius: 0px !important; padding: 0px; color: #484848; font-family: \'Open Sans\', sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18.5714px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: border-box; border-radius: 0px !important; list-style-type: disc; margin: 0px 0px 0px 13px; padding: 5px 0px; font-size: 11px; color: #484848; line-height: 16px;\"><span style=\"box-sizing: border-box; border-radius: 0px !important; font-size: 13px;\">Free cancellation: 8 days prior to date of activity.</span></li>\r\n<li style=\"box-sizing: border-box; border-radius: 0px !important; list-style-type: disc; margin: 0px 0px 0px 13px; padding: 5px 0px; font-size: 11px; color: #484848; line-height: 16px;\"><span style=\"box-sizing: border-box; border-radius: 0px !important; font-size: 13px;\">20% Cancellation Fee (80% reimbursement): 4 to 7 days prior to date of activity.</span></li>\r\n<li style=\"box-sizing: border-box; border-radius: 0px !important; list-style-type: disc; margin: 0px 0px 0px 13px; padding: 5px 0px; font-size: 11px; color: #484848; line-height: 16px;\"><span style=\"box-sizing: border-box; border-radius: 0px !important; font-size: 13px;\">100% cancellation Fee (No reimbursement): Less than 4 days before the date of activity.</span></li>\r\n</ul>\r\n<p>&nbsp;</p>','<p>The most important and frequently used spices and flavourings in Indian cuisine are whole or powdered <a title=\"Chili pepper\" href=\"https://en.wikipedia.org/wiki/Chili_pepper\">chilli pepper</a> (<em>mirch</em>, <a title=\"Columbian Exchange\" href=\"https://en.wikipedia.org/wiki/Columbian_Exchange\">introduced by the Portuguese</a> from <a title=\"Mexico\" href=\"https://en.wikipedia.org/wiki/Mexico\">Mexico</a> in the 16th century), <a title=\"Brassica nigra\" href=\"https://en.wikipedia.org/wiki/Brassica_nigra\">black mustard</a> seed (<em>sarso</em>), <a title=\"Cardamom\" href=\"https://en.wikipedia.org/wiki/Cardamom\">cardamom</a> (<em>elaichi</em>), <a title=\"Cumin\" href=\"https://en.wikipedia.org/wiki/Cumin\">cumin</a> (<em>jeera</em>), <a title=\"Turmeric\" href=\"https://en.wikipedia.org/wiki/Turmeric\">turmeric</a> (<em>haldi</em>), <a title=\"Asafoetida\" href=\"https://en.wikipedia.org/wiki/Asafoetida\">asafoetida</a> (<em>hing</em>), <a title=\"Ginger\" href=\"https://en.wikipedia.org/wiki/Ginger\">ginger</a> (<em>adrak</em>), <a title=\"Coriander\" href=\"https://en.wikipedia.org/wiki/Coriander\">coriander</a> (<em>dhania</em>), and <a title=\"Garlic\" href=\"https://en.wikipedia.org/wiki/Garlic\">garlic</a> (<em>lasoon</em>). One popular <a title=\"Spice mix\" href=\"https://en.wikipedia.org/wiki/Spice_mix\">spice mix</a> is <em><a title=\"Garam masala\" href=\"https://en.wikipedia.org/wiki/Garam_masala\">garam masala</a></em>, a powder that typically includes five or more dried spices, especially <a title=\"Cardamom\" href=\"https://en.wikipedia.org/wiki/Cardamom\">cardamom</a>, <a title=\"Cinnamon\" href=\"https://en.wikipedia.org/wiki/Cinnamon\">cinnamon</a> (<em>dalchini</em>), and <a title=\"Clove\" href=\"https://en.wikipedia.org/wiki/Clove\">clove</a>.<sup id=\"cite_ref-Kelley2009_25-0\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/Indian_cuisine#cite_note-Kelley2009-25\">[25]</a></sup> Each culinary region has a distinctive <em>garam masala</em> blend&mdash;individual <a title=\"Chef\" href=\"https://en.wikipedia.org/wiki/Chef\">chefs</a> may also have their own. <em>Goda masala</em> is a comparable, though sweet, spice mix popular in <a title=\"Maharashtra\" href=\"https://en.wikipedia.org/wiki/Maharashtra\">Maharashtra</a>. Some leaves commonly used for flavouring include <a title=\"Bay leaf\" href=\"https://en.wikipedia.org/wiki/Bay_leaf\">bay leaves</a> (<em><a title=\"Cinnamomum tamala\" href=\"https://en.wikipedia.org/wiki/Cinnamomum_tamala\">tejpat</a></em>), <a title=\"Coriander\" href=\"https://en.wikipedia.org/wiki/Coriander\">coriander</a> leaves, <a title=\"Fenugreek\" href=\"https://en.wikipedia.org/wiki/Fenugreek\">fenugreek</a> leaves, and <a title=\"Mentha\" href=\"https://en.wikipedia.org/wiki/Mentha\">mint</a> leaves. The use of <a title=\"Curry tree\" href=\"https://en.wikipedia.org/wiki/Curry_tree\">curry</a> leaves and roots for flavouring is typical of <a title=\"Gujarati cuisine\" href=\"https://en.wikipedia.org/wiki/Gujarati_cuisine\">Gujarati</a> and <a title=\"South Indian cuisine\" href=\"https://en.wikipedia.org/wiki/South_Indian_cuisine\">South Indian cuisine</a>. Sweet dishes are often seasoned with <a title=\"Cardamom\" href=\"https://en.wikipedia.org/wiki/Cardamom\">cardamom</a>, <a title=\"Saffron\" href=\"https://en.wikipedia.org/wiki/Saffron\">saffron</a>, <a title=\"Nutmeg\" href=\"https://en.wikipedia.org/wiki/Nutmeg\">nutmeg</a> and <a title=\"Rose\" href=\"https://en.wikipedia.org/wiki/Rose\">rose</a> petal essences.</p>','2015-12-24 16:15:00','2016-05-27 18:35:00',1,NULL,NULL,NULL,'2015-12-11 05:38:35','2016-01-16 10:35:07'),(3,3,14,9,2,'MTB6 Mountain Bike Race','<p><span style=\"color: #ff0000;\">NEW COURSE CHANGES</span> We have made changes to the course this year!&nbsp; Expect climbing on beautiful switchback singletrack with equally rewarding descents over a 10 mile lap.&nbsp; All riders will return back to the start finish lap after each lap before going out on additional laps. There will no longer be any course crossings or 2-way sections!</p>','<p style=\"text-align: justify;\">The river is still there and is completely runable or rideable.&nbsp; If you have a problem with getting your feet wet then I suggest taking up road racing &ndash; This is a 6&Prime; deep gentle flowing river.&nbsp; Remember the days in other races where we had to traverse waist deep rivers and mud that stuck to your ribs?&nbsp; This is a mountain bike race people.</p>','<p style=\"text-align: justify;\"><strong>Support/Feed:</strong><br /> We will provide you with hydration (Skratch &amp; water), watermelon, &amp; p&amp;j rice cakes at the top of the climb, roughly 6 miles into the race.&nbsp; If you are self supporting, you will most likely want to stock up here if you do not have your own food on the course, but I encourage everyone to bring their own food/drink to ensure you have what you need.</p>\r\n<p style=\"text-align: justify;\">Riders doing multiple laps can drop their food/bottles at the top of Tweed River Drive (the camping area if you choose) as the course will dump you out onto that dirt road before heading into the Green trail (approx 4.5 miles into your lap).&nbsp; You can easily drive your stuff up there in the morning (do not bike it unless you want to really warm up before the race!), or have your support person drop it for you.</p>\r\n<p style=\"text-align: justify;\">If you do only use Tweed and our summit feed zone as your only fuel sources, I suggest you make sure you have enough fuel on you before you leave the summit, because you will not see anything until you get back to the start/lap/finish area.</p>\r\n<p style=\"text-align: justify;\">Support/Spectator Viewing:<br /> The best places to watch the start are obviously the start/finish, or they can walk down to the river before the start of the race to anticipate any amazing photos of those who cross the bridge.</p>\r\n<p style=\"text-align: justify;\">Spectators can also drive up to Tweed to hand off support bottles, and then hike through shortcut trails where they can then view riders buzzing through singletrack.&nbsp; This is a fairly spectator friendly course if they are willing to do a bit of hiking, otherwise they can hang back at the start/finish and wait.&nbsp; It&rsquo;s a great place to hike if you are bringing kids or dogs.&nbsp; Spectator maps will be available.</p>','<p style=\"text-align: justify;\"><strong>Pets:</strong><br /> We are on a farm and there are plenty of animals who already live on the property, but well behaved dogs are most welcome. Dogs MUST be kept on the leash at all times &ndash; we can&rsquo;t have them chasing the goats and chickens.</p>','<ul>\r\n<ul>\r\n<li style=\"text-align: justify;\">&nbsp;1 lap, 2 lap, &amp; 6 hour race options.</li>\r\n<li style=\"text-align: justify;\">KOM awards</li>\r\n<li style=\"text-align: justify;\">Stocked aid stations &ndash; Water, Electrolytes, Watermelon, Bagels, Cookies.. etc</li>\r\n<li style=\"text-align: justify;\">Post-race meal TBD, but you are definitely all getting homemade apple crisp!</li>\r\n<li style=\"text-align: justify;\">This is not a USA Cycling sanctioned event &ndash; no licenses needed!</li>\r\n<li style=\"text-align: justify;\">All registered racers will receive stocked aid stations, &amp; custom pint glasses.</li>\r\n</ul>\r\n</ul>','<p>No Refund</p>','<p style=\"text-align: justify;\">The river is still there and is completely runable or rideable.&nbsp; If you have a problem with getting your feet wet then I suggest taking up road racing &ndash; This is a 6&Prime; deep gentle flowing river.&nbsp; Remember the days in other races where we had to traverse waist deep rivers and mud that stuck to your ribs?&nbsp; This is a mountain bike race people.</p>','2016-01-12 00:00:00','2016-06-25 11:09:00',1,NULL,NULL,NULL,'2015-12-11 07:21:47','2016-01-09 09:24:15'),(6,1,14,8,2,' Peak Snowshoe Race','<p>Ultra Snowshoe Race &ndash; 100 miles and Snowshoe Marathon, 1/2 Marathon, and 10k Option.&nbsp;&nbsp; The course will be a rugged 6.5 mile loop in the Green Mountains of Vermont.&nbsp; Each loop has 1200 vertical.</p>','<h4>THIS YEAR WE&rsquo;RE PARTNERING WITH VERMONT FOOD BANK! $5 of every 2016 registration will go to the Vermont Food bank.</h4>','<p><strong>Lodging:</strong><br /> <a href=\"http://ameefarm.com/\">Amee Farm</a>, Trailside Lodge, Swiss Farm. Camping is available at many state parks in the area that offer camping and lots of smaller motels and B &amp; B&rsquo;s as well.</p>\r\n<p><strong>Weather:</strong><br /> It&rsquo;s Vermont in March. Please watch the weather leading up to the race and plan accordingly.&nbsp; Expect cold temps.</p>\r\n<p><strong>DROP BAGS:</strong><br /> We will have a tent set up and you can leave bags with food and clothes at the start/finish.</p>\r\n<p><strong>PARKING:</strong><br /> We have parking at Riverside Farm on Tweed River Road just off route 100.&nbsp; There will be Event Parking signs and a designated parking area.&nbsp; Please park in designated areas.&nbsp; You may be towed if you are parked illegally.</p>','<p><strong>Rules:</strong><br /> Don&rsquo;t cut the course. Don&rsquo;t litter. Snowshoes mandatory.</p>\r\n<p>Sorry, no dogs.</p>','<h2>March 18 &amp; 19th 2016</h2>','<p>NO REFUNDS</p>','<p><strong>Schwag and Awards:</strong><br /> Shirts, hats, cool finishers awards.</p>','2015-12-24 16:15:00','2016-06-25 11:09:00',1,'Peak Snow Way',NULL,NULL,'2015-12-18 11:08:54','2016-01-12 06:36:22'),(7,1,103,4,1,'AttractionProduct test','<p>Blue Foods, Marine Lines(W)</p>','<p>Blue Foods, Marine Lines(W)</p>','<p>Blue Foods, Marine Lines(W)</p>','<p>Blue Foods, Marine Lines(W)</p>','<p>Blue Foods, Marine Lines(W)</p>','<p>Blue Foods, Marine Lines(W)</p>','<p>Blue Foods, Marine Lines(W)</p>','2015-12-24 16:15:00','2016-06-25 11:09:00',1,NULL,NULL,NULL,'2015-12-21 06:23:43','2016-01-08 10:11:03'),(8,1,103,1,4,'Private City Hall Tour','<p>The Gateway of India is a monument built during the British Rule in Mumbai City of Maharashtra state in Western India . It is located on the waterfront in the Apollo Bunder area in South Mumbai and overlooks the Arabian Sea</p>','<p>It is the place where the viceroys and governors used to land upon their arrival in India. Though built as a welcome to King George V for his visit of 1911, then an event of grand significance for British India and the British empire, today serves as a \"monumental memento\" of British colonial rule over India.</p>','<p>Special Hot Vada Pav with Cold Drinks</p>','<p>It is the place where the viceroys and governors used to land upon their arrival in India. Though built as a welcome to King George V for his visit of 1911, then an event of grand significance for British India and the British empire, today serves as a \"monumental memento\" of British colonial rule over India.</p>','<p><sub>Applicable Everyday</sub></p>','<p>No Refund</p>','<p>It is the place where the viceroys and governors used to land upon their arrival in India. Though built as a welcome to King George V for his visit of 1911, then an event of grand significance for British India and the British empire, today serves as a \"monumental memento\" of British colonial rule over India.</p>','2015-12-24 16:15:00','2016-07-21 11:09:00',1,NULL,NULL,NULL,'2016-01-10 10:06:25','2016-01-04 08:44:36'),(9,1,236,10,4,'San Francisco CityPASS','<p style=\"text-align: justify;\">If there&rsquo;s anything more valuable to a traveler than time, it&rsquo;s money and memories, and the San Francisco CityPASS capitalizes on all three. Its package bundles admission to five top attractions like the California Academy of Sciences and Blue and Gold Fleet cruises, with unlimited Muni bus and cable car access that gets you everywhere. Once you&rsquo;re there not only will you get in for a fraction of the cost, you&rsquo;ll usually be able to skip the line. If you plan on playing tourist and bouncing around to a lot of San Francisco attractions, this pass combines value with convenience.</p>','<p>San Francisco CityPASS<br />Entry to 4 top SF sights plus transit<br />Get access to some of SF&rsquo;s top sights, plus coupons and a week of unlimited Muni and cable car transportation in this value-packed pass.</p>','<div class=\"activity-description\">\r\n<ul>\r\n<li>7-day access to MUNI&nbsp;and Cable Car transport</li>\r\n<li>General admission to the California Academy of Sciences &nbsp;</li>\r\n<li>Blue and&nbsp;Gold Fleet Bay Cruise Adventure (1-hour cruise)</li>\r\n<li>Choice of general admission to the Aquarium of the Bay or&nbsp;the Monterey Bay Aquarium</li>\r\n<li>Choice of general admission to either the Exploratorium or the de Young Museum and Legion of Honor (must be visited together on the same day to be valid)</li>\r\n<li>Shopping and dining coupons</li>\r\n<li>Tips revealing a CityPASS; secret to breezing past ticket lines like a VIP</li>\r\n</ul>\r\n</div>','<p>Get access to some of SF&rsquo;s top sights, plus coupons and a week of unlimited Muni and cable car transportation in this value-packed pass.</p>','<p>Tickets Available</p>','<p>10% Deduction from Total Amount</p>','<div class=\"activity-description\">\r\n<ul>\r\n<li>7-day access to MUNI&nbsp;and Cable Car transport</li>\r\n<li>General admission to the California Academy of Sciences &nbsp;</li>\r\n<li>Blue and&nbsp;Gold Fleet Bay Cruise Adventure (1-hour cruise)</li>\r\n<li>Choice of general admission to the Aquarium of the Bay or&nbsp;the Monterey Bay Aquarium</li>\r\n<li>Choice of general admission to either the Exploratorium or the de Young Museum and Legion of Honor (must be visited together on the same day to be valid)</li>\r\n<li>Shopping and dining coupons</li>\r\n<li>Tips revealing a CityPASS; secret to breezing past ticket lines like a VIP</li>\r\n</ul>\r\n</div>','2015-12-24 16:15:00','2016-04-30 16:24:00',1,NULL,NULL,NULL,'2015-12-24 11:21:59','2016-01-09 05:28:07'),(12,1,103,2,2,'Brt','<p>Test</p>','<p>test</p>','<p>test</p>','<p>test</p>','<p>test</p>','<p>test</p>','<p>test</p>',NULL,NULL,0,NULL,NULL,NULL,'2016-01-12 07:25:41','2016-01-12 07:25:41'),(14,1,103,1,2,'a','<p>adsda&nbsp;</p>','<p>asdsad</p>','<p>sadasdsa</p>','<p>sadasdsa</p>','<p><em></em>asdsada</p>','<p>asdasd</p>','<p>sadasda</p>',NULL,NULL,0,NULL,NULL,NULL,'2016-01-20 06:57:37','2016-01-21 11:43:00'),(16,1,103,1,2,'a (Copied)','<p>adsda&nbsp;</p>','<p>asdsad</p>','<p>sadasdsa</p>','<p>sadasdsa</p>','<p><em></em>asdsada</p>','<p>asdasd</p>','<p>sadasda</p>',NULL,NULL,0,NULL,NULL,NULL,'2016-01-21 11:43:40','2016-01-21 12:45:40');
/*!40000 ALTER TABLE `attractions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attractions_categories`
--

DROP TABLE IF EXISTS `attractions_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attractions_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attractions_categories`
--

LOCK TABLES `attractions_categories` WRITE;
/*!40000 ALTER TABLE `attractions_categories` DISABLE KEYS */;
INSERT INTO `attractions_categories` VALUES (1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,1,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,2,7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,4,7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(29,2,8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,9,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(31,3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(32,6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(33,6,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(34,6,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(35,6,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(36,3,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(37,3,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(38,9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(39,9,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(40,9,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(41,8,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(42,7,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(43,14,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(44,14,3,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `attractions_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attractions_facilities`
--

DROP TABLE IF EXISTS `attractions_facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attractions_facilities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` int(10) unsigned DEFAULT NULL,
  `facility_id` int(10) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attractions_facilities`
--

LOCK TABLES `attractions_facilities` WRITE;
/*!40000 ALTER TABLE `attractions_facilities` DISABLE KEYS */;
INSERT INTO `attractions_facilities` VALUES (1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,1,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,1,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(31,6,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(32,6,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(33,6,8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(34,6,9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(35,6,11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(36,3,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(37,3,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(38,3,7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(39,3,9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(40,1,6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(41,1,7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(42,1,8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(43,1,11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(44,9,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(45,9,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(46,9,6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(47,9,8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(48,8,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(49,8,6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(50,7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(51,7,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(52,7,9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(53,14,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(54,14,3,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `attractions_facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attractions_tags`
--

DROP TABLE IF EXISTS `attractions_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attractions_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attractions_tags`
--

LOCK TABLES `attractions_tags` WRITE;
/*!40000 ALTER TABLE `attractions_tags` DISABLE KEYS */;
INSERT INTO `attractions_tags` VALUES (12,6,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,6,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,7,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,3,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,3,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,1,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(29,1,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,9,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(31,9,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(32,8,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(33,8,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(34,14,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(35,14,5,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `attractions_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `careers`
--

DROP TABLE IF EXISTS `careers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `careers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `position` varchar(255) CHARACTER SET utf8 NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 NOT NULL,
  `qualifications` varchar(255) CHARACTER SET utf8 NOT NULL,
  `experience` varchar(255) CHARACTER SET utf8 NOT NULL,
  `skill_sets` text CHARACTER SET utf8 NOT NULL,
  `job_description` text CHARACTER SET utf8 NOT NULL,
  `contact_person` varchar(255) CHARACTER SET utf8 NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `careers`
--

LOCK TABLES `careers` WRITE;
/*!40000 ALTER TABLE `careers` DISABLE KEYS */;
/*!40000 ALTER TABLE `careers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) unsigned NOT NULL,
  `attraction_id` int(11) unsigned NOT NULL,
  `attraction_product_id` int(11) unsigned NOT NULL,
  `attraction_product_price_group_id` int(10) unsigned NOT NULL,
  `attraction_product_price_id` int(11) unsigned NOT NULL,
  `attraction_product_time_slot_id` int(11) unsigned DEFAULT NULL,
  `travel_date` date DEFAULT NULL,
  `nationality_id` int(10) unsigned DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_items`
--

LOCK TABLES `cart_items` WRITE;
/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
INSERT INTO `cart_items` VALUES (1,1,1,2,1,1,1,'2016-01-28',1,1,'2016-01-18 09:22:33','2016-01-18 09:22:33'),(2,1,1,2,2,18,1,'2016-01-28',1,1,'2016-01-18 09:22:33','2016-01-18 09:22:33'),(3,2,1,2,1,1,1,'2016-01-28',1,1,'2016-01-18 11:04:58','2016-01-18 11:04:58'),(4,2,1,2,2,18,1,'2016-01-28',1,1,'2016-01-18 11:04:58','2016-01-18 11:04:58'),(5,3,1,2,1,1,1,'2016-01-28',1,1,'2016-01-19 08:49:08','2016-01-19 08:49:08'),(6,3,1,2,2,18,1,'2016-01-28',1,1,'2016-01-19 08:49:08','2016-01-19 08:49:08'),(7,4,1,2,1,1,2,'2016-01-25',1,3,'2016-01-20 04:33:21','2016-01-20 04:33:21'),(8,4,1,2,2,18,2,'2016-01-25',1,2,'2016-01-20 04:33:21','2016-01-20 04:33:21');
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `session` varchar(225) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (1,2,'8be6b2950abcace688c43085d48e2a2d','2016-01-18 09:22:33','2016-01-18 09:22:33'),(2,2,'4d11afb35586fc97b9c11cbe1169d637','2016-01-18 11:04:57','2016-01-18 11:04:57'),(3,2,'c30e9512e6826b0a69b25df4a9c6a563','2016-01-19 08:49:07','2016-01-19 08:49:07'),(4,2,'24cac8f315cbc5466ea56d634684b8dd','2016-01-20 04:33:21','2016-01-20 04:33:21');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned DEFAULT NULL,
  `rght` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `thumbnail_image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `display_on_homepage` tinyint(1) unsigned NOT NULL,
  `no_of_elements_to_show` int(3) unsigned DEFAULT NULL,
  `homepage_order` int(3) unsigned DEFAULT NULL,
  `display_order` int(3) unsigned NOT NULL,
  `meta_title` varchar(70) DEFAULT NULL,
  `meta_description` varchar(160) DEFAULT NULL,
  `meta_keywords` text,
  `description` text,
  `active` tinyint(1) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,1,2,'Theme Park','activitycolg.jpg','attractionimg01.jpg',1,1,1,0,'Theme Park Way','','','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.',1,'2015-12-09 11:37:34','1451373242'),(2,NULL,3,4,'Water Park','aftersearchcollage.jpg','attractionimg02.jpg',1,1,2,0,'','','','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.',1,'2015-12-09 11:42:47','1451283753'),(3,NULL,5,6,'Zoo','destinationcolg.jpg','attractionimg03.jpg',1,1,3,0,'','','','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.',1,'2015-12-16 05:29:06','1451283782'),(4,NULL,7,8,'Aquariums','aftersearchcollage.jpg','attractionimg04.jpg',1,1,4,0,'','','','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.',1,'2015-12-16 05:29:33','1451283842');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zone_id` int(10) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `alpha_2_code` varchar(2) CHARACTER SET utf8 NOT NULL,
  `alpha_3_code` varchar(3) CHARACTER SET utf8 NOT NULL,
  `calling_code` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='https://en.wikipedia.org/wiki/ISO_3166-1\nhttps://en.wikipedia.org/wiki/List_of_country_calling_codes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,5,'Afghanistan','AF','AFG','93',1,'0000-00-00 00:00:00','2016-01-11 09:40:57'),(2,7,'Aland Islands ! Åland Islands','AX','ALA','358',1,'0000-00-00 00:00:00','2016-01-11 10:37:53'),(3,5,'Albania (Shqipëri)','AL','ALB','355',1,'0000-00-00 00:00:00','2015-11-04 05:56:06'),(4,5,'Algeria','DZ','DZA','213',1,'0000-00-00 00:00:00','2016-01-11 09:40:20'),(5,5,'American Samoa','AS','ASM','1-684',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,5,'Andorra','AD','AND','376',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,7,'Angola','AO','AGO','244',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,7,'Anguilla','AI','AIA','1-264',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,7,'Antarctica','AQ','ATA','672',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,7,'Antigua and Barbuda','AG','ATG','1-268',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,7,'Argentina','AR','ARG','54',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,4,'Armenia','AM','ARM','374',1,'0000-00-00 00:00:00','2016-01-11 11:04:25'),(13,4,'Aruba','AW','ABW','297',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,4,'Australia','AU','AUS','61',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,4,'Austria','AT','AUT','43',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,4,'Azerbaijan','AZ','AZE','994',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,3,'Bahamas','BS','BHS','1-242',1,'0000-00-00 00:00:00','2016-01-11 11:06:15'),(18,2,'Bahrain','BH','BHR','973',1,'0000-00-00 00:00:00','2016-01-11 11:05:10'),(19,2,'Bangladesh','BD','BGD','880',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,2,'Barbados','BB','BRB','1-246',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,2,'Belarus','BY','BLR','375',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,2,'Belgium','BE','BEL','32',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,1,'Belize','BZ','BLZ','501',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,1,'Benin','BJ','BEN','229',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,1,'Bermuda','BM','BMU','1-441',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,1,'Bhutan','BT','BTN','975',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,1,'Bolivia, Plurinational State of','BO','BOL','591',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,3,'Bonaire, Sint Eustatius and Saba','BQ','BES','599',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(29,3,'Bosnia and Herzegovina','BA','BIH','387',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,3,'Botswana','BW','BWA','267',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(31,3,'Bouvet Island','BV','BVT','47',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(32,3,'Brazil','BR','BRA','55',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(33,NULL,'British Indian Ocean Territory','IO','IOT','246',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(34,NULL,'Brunei Darussalam','BN','BRN','673',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(35,NULL,'Bulgaria','BG','BGR','359',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(36,NULL,'Burkina Faso','BF','BFA','226',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(37,NULL,'Burundi (Uburundi)','BI','BDI','257',1,'0000-00-00 00:00:00','2015-11-04 06:20:58'),(38,NULL,'Cambodia','KH','KHM','855',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(39,NULL,'Cameroon','CM','CMR','237',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(40,NULL,'Canada','CA','CAN','1',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(41,NULL,'Cabo Verde','CV','CPV','238',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(42,NULL,'Cayman Islands','KY','CYM','1-345',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(43,NULL,'Central African Republic','CF','CAF','236',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(44,NULL,'Chad','TD','TCD','235',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(45,NULL,'Chile','CL','CHL','56',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(46,NULL,'China','CN','CHN','86',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(47,NULL,'Christmas Island','CX','CXR','61',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(48,NULL,'Cocos (Keeling) Islands','CC','CCK','61',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(49,NULL,'Colombia','CO','COL','57',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(50,NULL,'Comoros','KM','COM','269',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(51,NULL,'Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)','CG','COG','242',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(52,NULL,'Congo (Republic) (Congo-Brazzaville)','CD','COD','243',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(53,NULL,'Cook Islands','CK','COK','682',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(54,NULL,'Costa Rica','CR','CRI','506',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(55,NULL,'Côte d’Ivoire','CI','CIV','225',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(56,NULL,'Croatia (Hrvatska)','HR','HRV','385',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(57,NULL,'Cuba','CU','CUB','53',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(58,NULL,'Curacao ! Curaçao','CW','CUW','599',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(59,NULL,'Cyprus','CY','CYP','357',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(60,NULL,'Czech Republic','CZ','CZE','420',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(61,NULL,'Denmark (Danmark)','DK','DNK','45',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(62,NULL,'Djibouti','DJ','DJI','253',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(63,NULL,'Dominica','DM','DMA','1-767',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(64,NULL,'Dominican Republic','DO','DOM','1-809',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(65,NULL,'Ecuador','EC','ECU','593',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(66,NULL,'Egypt','EG','EGY','20',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(67,NULL,'El Salvador','SV','SLV','503',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(68,NULL,'Equatorial Guinea','GQ','GNQ','240',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(69,NULL,'Eritrea','ER','ERI','291',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(70,NULL,'Estonia','EE','EST','372',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(71,NULL,'Ethiopia','ET','ETH','251',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(72,NULL,'Falkland Islands (Malvinas)','FK','FLK','500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(73,NULL,'Faroe Islands','FO','FRO','298',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(74,NULL,'Fiji','FJ','FJI','679',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(75,NULL,'Finland (Soumi)','FI','FIN','358',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(76,NULL,'France','FR','FRA','33',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(77,NULL,'French Guiana','GF','GUF','594',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(78,NULL,'French Polynesia','PF','PYF','689',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(79,NULL,'French Southern Territories','TF','ATF','689',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(80,NULL,'Gabon','GA','GAB','241',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(81,NULL,'Gambia','GM','GMB','220',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(82,NULL,'Georgia','GE','GEO','995',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(83,NULL,'Germany (Deutschland)','DE','DEU','49',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(84,NULL,'Ghana (Gaana)','GH','GHA','233',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(85,NULL,'Gibraltar','GI','GIB','350',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(86,NULL,'Greece','GR','GRC','30',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(87,NULL,'Greenland (Kalaallit Nunaat)','GL','GRL','299',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(88,NULL,'Grenada','GD','GRD','1-473',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(89,NULL,'Guadeloupe','GP','GLP','590',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(90,NULL,'Guam','GU','GUM','1-671',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(91,NULL,'Guatemala','GT','GTM','502',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(92,NULL,'Guernsey','GG','GGY','44',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(93,NULL,'Guinea','GN','GIN','224',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(94,NULL,'Guinea-Bissau','GW','GNB','245',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(95,NULL,'Guyana','GY','GUY','592',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(96,NULL,'Haiti','HT','HTI','509',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(97,NULL,'Heard Island and McDonald Islands','HM','HMD',NULL,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(98,NULL,'Holy See (Vatican City State)','VA','VAT','379',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(99,NULL,'Honduras','HN','HND','504',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(100,NULL,'Hong Kong','HK','HKG','852',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(101,NULL,'Hungary','HU','HUN','36',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(102,NULL,'Iceland (Island)','IS','ISL','354',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(103,1,'India','IN','IND','91',1,'0000-00-00 00:00:00','2016-01-04 13:33:22'),(104,1,'Indonesia','ID','IDN','62',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(105,1,'Iran, Islamic Republic of','IR','IRN','98',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(106,1,'Iraq','IQ','IRQ','964',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(107,1,'Ireland','IE','IRL','353',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(108,NULL,'Isle of Man','IM','IMN','44-16',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(109,NULL,'Israel','IL','ISR','972',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(110,NULL,'Italy (Italia)','IT','ITA','39',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(111,NULL,'Jamaica','JM','JAM','1-876',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(112,NULL,'Japan','JP','JPN','81',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(113,NULL,'Jersey','JE','JEY','44-15',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(114,NULL,'Jordan','JO','JOR','962',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(115,NULL,'Kazakhstan','KZ','KAZ','7',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(116,NULL,'Kenya','KE','KEN','254',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(117,NULL,'Kiribati','KI','KIR','686',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(118,NULL,'Korea, Democratic People&#039;s Republic of','KP','PRK','850',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(119,NULL,'Korea, Republic of','KR','KOR','82',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(120,NULL,'Kuwait','KW','KWT','965',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(121,NULL,'Kyrgyzstan','KG','KGZ','996',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(122,NULL,'Loas','LA','LAO','856',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(123,NULL,'Latvia (Latvija)','LV','LVA','371',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(124,NULL,'Lebanon','LB','LBN','961',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(125,NULL,'Lesotho','LS','LSO','266',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(126,NULL,'Liberia','LR','LBR','231',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(127,NULL,'Libya','LY','LBY','218',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(128,NULL,'Liechtenstein','LI','LIE','423',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(129,NULL,'Lithuania','LT','LTU','370',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(130,NULL,'Luxembourg','LU','LUX','352',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(131,NULL,'Macao','MO','MAC','853',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(132,NULL,'Macedonia, the former Yugoslav Republic of','MK','MKD','389',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(133,NULL,'Madagascar (Madagasikara)','MG','MDG','261',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(134,NULL,'Malawi','MW','MWI','265',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(135,NULL,'Malaysia','MY','MYS','60',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(136,NULL,'Maldives','MV','MDV','960',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(137,NULL,'Mali','ML','MLI','223',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(138,NULL,'Malta','MT','MLT','356',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(139,NULL,'Marshall Islands','MH','MHL','692',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(140,NULL,'Martinique','MQ','MTQ','596',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(141,NULL,'Mauritania','MR','MRT','222',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(142,NULL,'Mauritius (Moris)','MU','MUS','230',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(143,NULL,'Mayotte','YT','MYT','262',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(144,NULL,'Mexico','MX','MEX','52',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(145,NULL,'Micronesia','FM','FSM','691',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(147,NULL,'Monaco','MC','MCO','377',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(148,NULL,'Mongolia','MN','MNG','976',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(149,NULL,'Montenegro (Crna Gora)','ME','MNE','382',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(150,NULL,'Montserrat','MS','MSR','1-664',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(151,NULL,'Morocco','MA','MAR','212',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(152,NULL,'Mozambique','MZ','MOZ','258',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(153,NULL,'Myanmar (Burma)','MM','MMR','95',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(154,NULL,'Namibia','NA','NAM','264',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(155,NULL,'Nauru','NR','NRU','674',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(156,NULL,'Nepal','NP','NPL','977',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(157,NULL,'Netherlands (Nedarland)','NL','NLD','31',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(158,NULL,'New Caledonia','NC','NCL','687',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(159,NULL,'New Zealand','NZ','NZL','64',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(160,NULL,'Nicaragua','NI','NIC','505',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(161,NULL,'Niger (Nijar)','NE','NER','227',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(162,NULL,'Nigeria','NG','NGA','234',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(163,NULL,'Niue','NU','NIU','683',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(164,NULL,'Norfolk Island','NF','NFK','672',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(165,NULL,'Northern Mariana Islands','MP','MNP','1-670',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(166,NULL,'Norway (Norge)','NO','NOR','47',1,'0000-00-00 00:00:00','2015-11-04 09:49:05'),(167,NULL,'Oman','OM','OMN','968',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(168,NULL,'Pakistan','PK','PAK','92',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(169,NULL,'Palau','PW','PLW','680',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(170,NULL,'Palestine','PS','PSE','970',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(171,NULL,'Panama','PA','PAN','507',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(172,NULL,'Papua New Guinea','PG','PNG','675',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(173,NULL,'Paraguay','PY','PRY','595',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(174,NULL,'Peru','PE','PER','51',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(175,NULL,'Philippines','PH','PHL','63',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(176,NULL,'Pitcairn Islands','PN','PCN','870',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(177,NULL,'Poland (Polska)','PL','POL','48',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(178,NULL,'Portugal','PT','PRT','351',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(179,NULL,'Puerto Rico','PR','PRI','1-787',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(180,NULL,'Qatar','QA','QAT','974',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(181,NULL,'Reunion ! Réunion','RE','REU','262',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(182,NULL,'Romania','RO','ROU','40',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(183,NULL,'Russian Federation','RU','RUS','7',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(184,NULL,'Rwanda','RW','RWA','250',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(185,NULL,'Saint Barthelemy ! Saint Barthélemy','BL','BLM','590',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(186,NULL,'Saint Helena, Ascension and Tristan da Cunha','SH','SHN','290',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(187,NULL,'Saint Kitts and Nevis','KN','KNA','1-869',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(188,NULL,'Saint Lucia','LC','LCA','1-758',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(189,NULL,'Saint Martin (French part)','MF','MAF','590',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(190,NULL,'Saint Pierre and Miquelon','PM','SPM','508',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(191,NULL,'Saint Vincent and the Grenadines','VC','VCT','1-784',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(192,NULL,'Samoa','WS','WSM','685',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(193,NULL,'San Marino','SM','SMR','378',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(194,NULL,'Sao Tome and Principe','ST','STP','239',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(195,NULL,'Saudi Arabia','SA','SAU','966',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(196,NULL,'Senegal','SN','SEN','221',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(197,NULL,'Serbia','RS','SRB','381',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(198,NULL,'Seychelles','SC','SYC','248',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(199,NULL,'Sierra Leone','SL','SLE','232',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(200,NULL,'Singapore','SG','SGP','65',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(201,NULL,'Sint Maarten (Dutch part)','SX','SXM','1',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(202,NULL,'Slovakia (Slovensko)','SK','SVK','421',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(203,NULL,'Slovenia (Slovenija)','SI','SVN','386',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(204,NULL,'Solomon Islands','SB','SLB','677',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(205,NULL,'Somalia (Soomaalia)','SO','SOM','252',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(206,NULL,'South Africa','ZA','ZAF','27',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(207,NULL,'South Georgia and the South Sandwich Islands','GS','SGS','500',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(208,NULL,'South Sudan','SS','SSD','211',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(209,NULL,'Spain','ES','ESP','34',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(210,NULL,'Sri Lanka','LK','LKA','94',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(211,NULL,'Sudan','SD','SDN','249',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(212,NULL,'Suriname','SR','SUR','597',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(213,NULL,'Svalbard and Jan Mayen','SJ','SJM','47',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(214,NULL,'Swaziland','SZ','SWZ','268',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(215,NULL,'Sweden (Sverige)','SE','SWE','46',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(216,NULL,'Switzerland (Schweiz)','CH','CHE','41',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(217,NULL,'Syrian Arab Republic','SY','SYR','963',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(218,NULL,'Taiwan, Province of China','TW','TWN','886',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(219,NULL,'Tajikistan','TJ','TJK','992',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(220,NULL,'Tanzania','TZ','TZA','255',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(221,NULL,'Thailand','TH','THA','66',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(222,NULL,'Timor-Leste','TL','TLS','670',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(223,NULL,'Togo','TG','TGO','228',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(224,NULL,'Tokelau','TK','TKL','690',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(225,NULL,'Tonga','TO','TON','676',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(226,NULL,'Trinidad and Tobago','TT','TTO','1-868',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(227,NULL,'Tunisia','TN','TUN','216',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(228,NULL,'Turkey','TR','TUR','90',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(229,NULL,'Turkmenistan','TM','TKM','993',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(230,NULL,'Turks and Caicos Islands','TC','TCA','1-649',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(231,NULL,'Tuvalu','TV','TUV','688',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(232,NULL,'Uganda','UG','UGA','256',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(233,NULL,'Ukraine','UA','UKR','380',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(234,NULL,'United Arab Emirates','AE','ARE','971',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(235,NULL,'United Kingdom','GB','GBR','44',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(236,NULL,'United States','US','USA','1',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(237,NULL,'United States Minor Outlying Islands','UM','UMI','1',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(238,NULL,'Uruguay','UY','URY','598',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(239,NULL,'Uzbekistan (O\'zbekistan)','UZ','UZB','998',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(240,NULL,'Vanuatu','VU','VUT','678',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(241,NULL,'Venezuela','VE','VEN','58',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(242,NULL,'Viet Nam','VN','VNM','84',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(243,NULL,'Virgin Islands, British','VG','VGB','1',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(244,NULL,'Virgin Islands, U.S.','VI','VIR','1-340',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(245,NULL,'Wallis and Futuna','WF','WLF','681',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(246,NULL,'Western Sahara','EH','ESH','212',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(247,NULL,'Yemen','YE','YEM','967',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(248,NULL,'Zambia','ZM','ZMB','260',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(249,NULL,'Zimbabwe','ZW','ZWE','263',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(251,NULL,'Ascension Island','AC','ACI',NULL,1,'2015-11-04 06:04:12','2015-11-04 06:04:12'),(252,NULL,'Bosnia & Herzegovina (Босна и Херцеговина)','BA','BAH','387',1,'2015-11-04 06:13:23','2015-11-04 06:13:23'),(253,NULL,'Brunei','BN','BNI','673',1,'2015-11-04 06:19:02','2015-11-04 06:19:02'),(255,NULL,'Canary Islands (islas Canarias)','IC','ICS',NULL,1,'2015-11-04 06:27:50','2015-11-04 06:27:50'),(256,NULL,'Cape Verde (Kabu Verdi)','CV','CV','238',1,'2015-11-04 06:30:06','2015-11-04 06:30:13'),(257,NULL,'Caribbean Netherlands','BQ','BQ','599',1,'2015-11-04 06:31:33','2015-11-04 06:31:33'),(258,NULL,'Ceuta & Melilla (Ceuta y Melilla)','EA','EA','956',1,'2015-11-04 06:33:51','2015-11-04 06:33:51'),(259,NULL,'Clipperton Island','CP','CP',NULL,1,'2015-11-04 08:35:55','2015-11-04 08:35:55'),(260,NULL,'Diego Garcia','DG','DGA',NULL,1,'2015-11-04 08:54:34','2015-11-04 08:54:34'),(261,NULL,'Dominican Republic (República Dominicana)','DO','DOR','1',1,'2015-11-04 08:57:36','2015-11-04 08:57:36'),(262,NULL,'Kosovo (Kosovë)','XK','XK','383',1,'2015-11-04 09:23:44','2015-11-04 09:23:44'),(263,NULL,'Moldova (Republica Moldova)','MD','MDA','373',1,'2015-11-04 09:38:27','2015-11-04 09:38:27'),(264,NULL,'North Korea (조선민주주의인민공화국)','KP','KP','850',1,'2015-11-04 09:48:20','2015-11-04 09:48:20'),(265,NULL,'Russia (Россия)','RU','RUA','7',1,'2015-11-04 09:56:30','2015-11-04 09:56:30'),(266,NULL,'South Korea (대한민국)','KR','KRA','82',1,'2015-11-04 10:09:27','2015-11-04 10:09:27'),(267,NULL,'Syria (‫سوريا‬‎)','SY','SYA','963',1,'2015-11-04 12:31:38','2015-11-04 12:31:38');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_details`
--

DROP TABLE IF EXISTS `country_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `icon_image` varchar(255) DEFAULT NULL COMMENT 'image picker',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_details`
--

LOCK TABLES `country_details` WRITE;
/*!40000 ALTER TABLE `country_details` DISABLE KEYS */;
INSERT INTO `country_details` VALUES (1,103,'images.jpg','INDIAicon.gif','2015-12-19 12:25:42','2016-01-04 13:33:22'),(11,1,'af_flag.png','af_icon.png','2015-12-21 05:22:42','2016-01-11 09:40:57'),(12,4,NULL,NULL,'2016-01-11 09:40:20','2016-01-11 09:40:20'),(13,2,NULL,NULL,'2016-01-11 10:37:53','2016-01-11 10:37:53'),(14,12,NULL,NULL,'2016-01-11 11:04:25','2016-01-11 11:04:25'),(15,18,NULL,NULL,'2016-01-11 11:05:10','2016-01-11 11:05:10'),(16,17,NULL,NULL,'2016-01-11 11:06:15','2016-01-11 11:06:15');
/*!40000 ALTER TABLE `country_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `iso_code` varchar(3) NOT NULL,
  `iso_code_num` varchar(3) NOT NULL,
  `sign` varchar(8) DEFAULT NULL,
  `blank` tinyint(1) NOT NULL,
  `format` tinyint(1) NOT NULL,
  `decimals` tinyint(1) unsigned DEFAULT NULL,
  `conversion_rate` decimal(13,6) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=548 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'United Arab Emirates dirham','AED','784','د.إ',0,0,0,NULL,0,'2015-11-04 10:10:56','2015-11-04 10:10:56'),(2,'Afghan afghani','AFN','971','؋',0,0,0,NULL,0,'2015-11-04 10:12:29','2015-11-04 10:12:29'),(3,'Albanian lek','ALL','008','L',0,0,0,NULL,0,'2015-11-04 10:13:13','2015-11-04 10:13:13'),(4,'Armenian dram','AMD','051','֏',0,0,0,NULL,0,'2015-11-04 10:15:22','2015-11-05 04:33:18'),(5,'Netherlands Antillean guilder','ANG','532','ƒ',0,0,0,NULL,0,'2015-11-04 10:16:06','2015-11-04 10:16:06'),(6,'Angolan kwanza','AOA','973','Kz',0,0,0,NULL,0,'2015-11-04 10:16:41','2015-11-04 10:16:41'),(7,'Argentine peso','ARS','032','$',0,0,0,0.201714,0,'2015-11-04 10:17:11','2016-01-14 07:03:50'),(8,'Australian dollar','AUD','036','$',0,0,0,0.021399,0,'2015-11-04 10:17:50','2016-01-14 07:03:50'),(9,'Aruban florin','AWG','533','ƒ',0,0,0,NULL,0,'2015-11-04 10:18:17','2015-11-04 10:18:17'),(10,'Azerbaijani manat','AZN','944','منات',0,0,0,NULL,0,'2015-11-04 10:19:02','2015-11-05 04:34:48'),(11,'Bosnia and Herzegovina convertible mark','BAM','977','KM',0,0,0,NULL,0,'2015-11-04 10:19:37','2015-11-04 10:19:37'),(12,'Barbados dollar','BBD','052','$',0,0,0,NULL,0,'2015-11-04 10:26:16','2015-11-04 10:26:16'),(13,'Bangladeshi taka','BDT','050','৳',0,0,0,NULL,0,'2015-11-04 10:26:42','2015-11-05 04:35:16'),(14,'Bulgarian lev','BGN','975','лв',0,0,0,NULL,0,'2015-11-04 10:27:45','2015-11-04 10:27:45'),(15,'Bahraini dinar','BHD','048','.د.ب',0,0,0,NULL,0,'2015-11-04 10:28:28','2015-11-04 10:28:28'),(16,'Burundian franc','BIF','108','Fr',0,0,0,NULL,0,'2015-11-04 10:28:54','2015-11-04 10:28:54'),(17,'Bermudian dollar','BMD','060','$',0,0,0,NULL,0,'2015-11-04 10:29:55','2015-11-04 10:29:55'),(18,'Brunei dollar','BND','096','$',0,0,0,NULL,0,'2015-11-04 10:30:21','2015-11-04 10:30:21'),(19,'Boliviano','BOB','068','Bs.',0,0,0,NULL,0,'2015-11-04 10:30:44','2015-11-04 10:30:44'),(20,'Bolivian Mvdol','BOV','984','Bs.',0,0,0,NULL,0,'2015-11-04 10:31:35','2015-11-04 10:31:35'),(21,'Brazilian real','BRL','986','R$',0,0,0,0.059901,0,'2015-11-04 10:31:59','2016-01-14 07:03:50'),(22,'Bahamian dollar','BSD','044','$',0,0,0,NULL,0,'2015-11-04 10:32:27','2015-11-04 10:32:27'),(23,'Bhutanese ngultrum','BTN','064','Nu.',0,0,0,NULL,0,'2015-11-04 10:32:49','2015-11-04 10:32:49'),(24,'Botswana pula','BWP','072','P',0,0,0,NULL,0,'2015-11-04 10:33:24','2015-11-04 10:33:24'),(25,'Belarusian ruble','BYR','974','Br',0,0,0,NULL,0,'2015-11-04 10:33:54','2015-11-04 10:33:54'),(26,'Belize dollar','BZD','084','$',0,0,0,NULL,0,'2015-11-04 10:34:25','2015-11-04 10:34:25'),(27,'Canadian dollar','CAD','124','$',0,0,0,0.021385,0,'2015-11-04 10:34:46','2016-01-14 07:03:50'),(28,'Congolese franc','CDF','976','Fr',0,0,0,NULL,0,'2015-11-04 10:35:12','2015-11-04 10:35:34'),(29,'WIR Euro','CHE','947','€',0,0,0,NULL,0,'2015-11-04 10:36:29','2015-11-05 04:47:46'),(30,'Swiss franc','CHF','756','Fr',0,0,0,0.015027,0,'2015-11-04 10:41:33','2016-01-14 07:03:51'),(31,'WIR Franc','CHW','948','X',0,0,0,NULL,0,'2015-11-04 10:42:14','2015-11-05 04:47:00'),(32,'Unidad de Fomento','CLF','990','UF',0,0,0,NULL,0,'2015-11-04 10:42:37','2015-11-05 04:40:19'),(33,'Chilean peso','CLP','152','$',0,0,0,10.843097,0,'2015-11-04 10:42:57','2016-01-14 07:03:50'),(34,'Chinese yuan','CNY','156','¥',0,0,0,0.098208,0,'2015-11-04 10:43:32','2016-01-14 07:03:50'),(35,'Colombian peso','COP','170','$',0,0,0,NULL,0,'2015-11-04 10:46:29','2015-11-04 10:46:29'),(36,'Unidad de Valor Real','COU','970','$',0,0,0,NULL,0,'2015-11-04 10:47:21','2015-11-05 04:40:01'),(37,'Costa Rican colon','CRC','188','₡',0,0,0,NULL,0,'2015-11-04 10:47:48','2015-11-05 04:39:22'),(38,'Cuban convertible peso','CUC','931','$',0,0,0,NULL,0,'2015-11-04 10:48:11','2015-11-04 10:48:11'),(39,'Cuban peso','CUP','192','₱',0,0,0,NULL,0,'2015-11-04 10:49:03','2015-11-05 04:38:59'),(40,'Cape Verde escudo','CVE','132','$',0,0,0,NULL,0,'2015-11-04 10:49:33','2015-11-04 10:49:33'),(41,'Czech koruna','CZK','203','Kč',0,0,0,0.370565,0,'2015-11-04 10:49:55','2016-01-14 07:03:50'),(42,'Djiboutian franc','DJF','262','Fr',0,0,0,NULL,0,'2015-11-04 10:50:21','2015-11-04 10:50:21'),(43,'Danish krone','DKK','208','kr',0,0,0,0.102338,0,'2015-11-04 10:50:58','2016-01-14 07:03:50'),(44,'Dominican peso','DOP','214','$',0,0,0,NULL,0,'2015-11-04 10:51:23','2015-11-04 10:51:23'),(45,'Algerian dinar','DZD','012','دج',0,0,0,NULL,0,'2015-11-04 10:51:55','2015-11-05 04:38:31'),(46,'Egyptian pound','EGP','818','£',0,0,0,NULL,0,'2015-11-04 10:54:00','2015-11-04 10:54:00'),(47,'Eritrean nakfa','ERN','232','Nfk',0,0,0,NULL,0,'2015-11-04 10:54:25','2015-11-04 10:54:25'),(48,'Ethiopian birr','ETB','230','Br',0,0,0,NULL,0,'2015-11-04 10:54:53','2015-11-04 10:54:53'),(49,'Euro','EUR','978','€',0,0,0,0.013714,0,'2015-11-04 10:55:34','2016-01-14 07:03:50'),(50,'Fiji dollar','FJD','242','$',0,0,0,0.032429,0,'2015-11-04 10:56:15','2016-01-14 07:03:50'),(51,'Falkland Islands pound','FKP','238','£',0,0,0,NULL,0,'2015-11-04 10:56:36','2015-11-04 10:56:36'),(52,'Pound sterling','GBP','826','£',0,0,0,0.010344,0,'2015-11-04 10:57:27','2016-01-14 07:03:51'),(53,'Georgian lari','GEL','981','ლ',0,0,0,NULL,0,'2015-11-04 10:58:00','2015-11-04 10:58:00'),(54,'Ghanaian cedi','GHS','936','₵',0,0,0,NULL,0,'2015-11-04 10:58:27','2015-11-04 10:58:27'),(55,'Gibraltar pound','GIP','292','£',0,0,0,NULL,0,'2015-11-04 10:59:57','2015-11-04 10:59:57'),(56,'Gambian dalasi','GMD','270','D',0,0,0,NULL,0,'2015-11-04 11:00:29','2015-11-04 11:00:29'),(57,'Guinean franc','GNF','324','Fr',0,0,0,NULL,0,'2015-11-04 11:01:10','2015-11-04 11:01:10'),(58,'Guatemalan quetzal','GTQ','320','Q',0,0,0,NULL,0,'2015-11-04 11:01:44','2015-11-04 11:01:44'),(59,'Guyanese dollar','GYD','328','$',0,0,0,NULL,0,'2015-11-04 11:02:09','2015-11-04 11:02:09'),(60,'Hong Kong dollar','HKD','344','$',0,0,0,0.115802,0,'2015-11-04 11:02:29','2016-01-14 07:03:50'),(61,'Honduran lempira','HNL','340','L',0,0,0,0.334340,0,'2015-11-04 12:13:16','2016-01-14 07:03:50'),(62,'Croatian kuna','HRK','191','kn',0,0,0,NULL,0,'2015-11-04 12:13:38','2015-11-04 12:13:38'),(63,'Haitian gourde','HTG','332','G',0,0,0,NULL,0,'2015-11-04 12:14:00','2015-11-04 12:14:00'),(64,'Hungarian forint','HUF','348','Ft',0,0,0,4.332588,0,'2015-11-04 12:14:22','2016-01-14 07:03:50'),(65,'Indonesian rupiah','IDR','360','Rp',0,0,0,207.289797,0,'2015-11-04 12:14:57','2016-01-14 07:03:50'),(66,'Israeli new shekel','ILS','376','₪',0,0,0,0.058713,0,'2015-11-04 12:15:33','2016-01-14 07:03:50'),(67,'Indian rupee','INR','356','₹',0,0,0,1.000000,1,'2015-11-04 12:15:59','2016-01-14 07:03:50'),(68,'Iraqi dinar','IQD','368','ع.د',0,0,0,NULL,0,'2015-11-04 12:16:40','2015-11-04 12:16:40'),(69,'Iranian rial','IRR','364','﷼',0,0,0,NULL,0,'2015-11-04 12:17:04','2015-11-04 12:17:04'),(70,'Icelandic króna','ISK','352','kr',0,0,0,1.936345,0,'2015-11-04 12:17:27','2016-01-14 07:03:50'),(71,'Jamaican dollar','JMD','388','$',0,0,0,NULL,0,'2015-11-04 12:17:53','2015-11-04 12:17:53'),(72,'Jordanian dinar','JOD','400','دينار',0,0,0,NULL,0,'2015-11-04 12:18:24','2015-11-05 04:38:08'),(73,'Japanese yen','JPY','392','¥',0,0,0,1.757528,0,'2015-11-04 12:18:49','2016-01-14 07:03:50'),(74,'Kenyan shilling','KES','404','Sh',0,0,0,NULL,0,'2015-11-04 12:19:14','2015-11-04 12:19:14'),(75,'Kyrgyzstani som','KGS','417','лв',0,0,0,NULL,0,'2015-11-04 12:19:38','2015-11-04 12:19:38'),(76,'Cambodian riel','KHR','116','៛',0,0,0,NULL,0,'2015-11-04 12:20:03','2015-11-04 12:20:03'),(77,'Comoro franc','KMF','174','Fr',0,0,0,NULL,0,'2015-11-04 12:20:26','2015-11-04 12:20:26'),(78,'North Korean won','KPW','408','₩',0,0,0,NULL,0,'2015-11-04 12:20:49','2015-11-05 04:37:26'),(79,'South Korean won','KRW','410','₩',0,0,0,18.080574,0,'2015-11-04 12:21:15','2016-01-14 07:03:51'),(80,'Kuwaiti dinar','KWD','414','د.ك',0,0,0,NULL,0,'2015-11-04 12:21:43','2015-11-04 12:21:43'),(81,'Cayman Islands dollar','KYD','136','$',0,0,0,NULL,0,'2015-11-04 12:22:03','2015-11-04 12:22:03'),(82,'Kazakhstani tenge','KZT','398','₸',0,0,0,NULL,0,'2015-11-04 12:22:27','2015-11-05 04:36:44'),(83,'Lao kip','LAK','418','₭',0,0,0,NULL,0,'2015-11-04 12:22:53','2015-11-04 12:22:53'),(84,'Lebanese pound','LBP','422','ل.ل',0,0,0,NULL,0,'2015-11-04 12:23:12','2015-11-04 12:23:12'),(85,'Sri Lankan rupee','LKR','144','Rs',0,0,0,NULL,0,'2015-11-04 12:23:40','2015-11-04 12:23:40'),(86,'Liberian dollar','LRD','430','$',0,0,0,NULL,0,'2015-11-04 12:23:58','2015-11-04 12:23:58'),(87,'Lesotho loti','LSL','426','L',0,0,0,NULL,0,'2015-11-04 12:24:22','2015-11-04 12:24:22'),(88,'Libyan dinar','LYD','434','ل.د',0,0,0,NULL,0,'2015-11-04 12:24:54','2015-11-04 12:24:54'),(89,'Moroccan dirham','MAD','504','د.م.',0,0,0,NULL,0,'2015-11-04 12:25:22','2015-11-04 12:25:22'),(90,'Moldovan leu','MDL','498','L',0,0,0,NULL,0,'2015-11-04 12:25:42','2015-11-04 12:25:42'),(91,'Malagasy ariary','MGA','969','Ar',0,0,0,NULL,0,'2015-11-04 12:27:04','2015-11-04 12:27:04'),(92,'Macedonian denar','MKD','807','ден',0,0,0,NULL,0,'2015-11-04 12:27:24','2015-11-04 12:27:24'),(93,'Myanmar kyat','MMK','104','Ks',0,0,0,NULL,0,'2015-11-04 12:27:45','2015-11-04 12:27:45'),(94,'Mongolian tögrög','MNT','496','₮',0,0,0,NULL,0,'2015-11-04 12:28:06','2015-11-04 12:28:06'),(95,'Macanese pataca','MOP','446','P',0,0,0,NULL,0,'2015-11-04 12:28:30','2015-11-04 12:28:30'),(96,'Mauritanian ouguiya','MRO','478','UM',0,0,0,NULL,0,'2015-11-04 12:28:51','2015-11-04 12:28:51'),(97,'Mauritian rupee','MUR','480','₨',0,0,0,NULL,0,'2015-11-04 12:29:20','2015-11-04 12:29:20'),(98,'Maldivian rufiyaa','MVR','462','ރ',0,0,0,NULL,0,'2015-11-04 12:29:45','2015-11-04 12:29:45'),(99,'Malawian kwacha','MWK','454','MK',0,0,0,NULL,0,'2015-11-04 12:31:10','2015-11-04 12:31:10'),(100,'Mexican peso','MXN','484','$',0,0,0,0.267153,0,'2015-11-04 12:31:43','2016-01-14 07:03:50'),(101,'Mexican Unidad de Inversion','MXV','979','UDI',0,0,0,NULL,0,'2015-11-04 12:32:06','2015-11-05 05:07:13'),(102,'Malaysian ringgit','MYR','458','RM',0,0,0,0.065423,0,'2015-11-04 12:32:35','2016-01-14 07:03:50'),(103,'Mozambican metical','MZN','943','MT',0,0,0,NULL,0,'2015-11-04 12:33:02','2015-11-04 12:33:02'),(104,'Namibian dollar','NAD','516','$',0,0,0,NULL,0,'2015-11-04 12:33:22','2015-11-04 12:33:22'),(105,'Nigerian naira','NGN','566','₦',0,0,0,NULL,0,'2015-11-04 12:33:45','2015-11-04 12:33:45'),(106,'Nicaraguan córdoba','NIO','558','C$',0,0,0,NULL,0,'2015-11-04 12:34:46','2015-11-04 12:34:46'),(107,'Norwegian krone','NOK','578','kr',0,0,0,0.131579,0,'2015-11-04 12:35:25','2016-01-14 07:03:50'),(108,'Nepalese rupee','NPR','524','₨',0,0,0,NULL,0,'2015-11-04 12:35:53','2015-11-04 12:35:53'),(109,'New Zealand dollar','NZD','554','$',0,0,0,0.022936,0,'2015-11-04 12:36:15','2016-01-14 07:03:50'),(110,'Omani rial','OMR','512','ر.ع.',0,0,0,NULL,0,'2015-11-04 12:36:47','2015-11-04 12:36:47'),(111,'Panamanian balboa','PAB','590','B/.',0,0,0,NULL,0,'2015-11-04 12:37:10','2015-11-04 12:37:10'),(112,'Peruvian nuevo sol','PEN','604','S/.',0,0,0,NULL,0,'2015-11-04 12:37:33','2015-11-04 12:37:33'),(113,'Papua New Guinean kina','PGK','598','K',0,0,0,NULL,0,'2015-11-04 12:38:24','2015-11-04 12:38:24'),(114,'Philippine peso','PHP','608','₱',0,0,0,0.710562,0,'2015-11-04 12:38:45','2016-01-14 07:03:50'),(115,'Pakistani rupee','PKR','586','₨',0,0,0,1.563879,0,'2015-11-04 12:39:11','2016-01-14 07:03:50'),(116,'Polish złoty','PLN','985','zł',0,0,0,0.059670,0,'2015-11-04 12:39:38','2016-01-14 07:03:51'),(117,'Paraguayan guaraní','PYG','600','₲',0,0,0,NULL,0,'2015-11-04 12:39:58','2015-11-04 12:39:58'),(118,'Qatari riyal','QAR','634','ر.ق',0,0,0,NULL,0,'2015-11-04 12:40:19','2015-11-04 12:40:19'),(119,'Romanian leu','RON','946','lei',0,0,0,NULL,0,'2015-11-04 12:40:55','2015-11-04 12:40:55'),(120,'Serbian dinar','RSD','941','дин.',0,0,0,NULL,0,'2015-11-04 12:41:12','2015-11-04 12:41:12'),(121,'Russian ruble','RUB','643','py6',0,0,0,1.148248,0,'2015-11-04 12:41:51','2016-01-14 07:03:51'),(122,'Rwandan franc','RWF','646','Fr',1,0,0,NULL,0,'2015-11-04 12:42:16','2015-11-04 12:42:16'),(123,'Saudi riyal','SAR','682','ر.س',0,0,0,NULL,0,'2015-11-04 12:42:41','2015-11-04 12:42:41'),(124,'Solomon Islands dollar','SBD','090','$',0,0,0,NULL,0,'2015-11-04 12:43:01','2015-11-04 12:43:01'),(125,'Seychelles rupee','SCR','690','₨',0,0,0,NULL,0,'2015-11-04 12:43:29','2015-11-04 12:43:29'),(126,'Sudanese pound','SDG','938','ج.س.',0,0,0,NULL,0,'2015-11-04 12:43:51','2015-11-04 12:43:51'),(127,'Swedish krona/kronor','SEK','752','kr',0,0,0,0.127124,0,'2015-11-04 12:44:12','2016-01-14 07:03:51'),(128,'Singapore dollar','SGD','702','$',0,0,0,0.021442,0,'2015-11-04 12:44:33','2016-01-14 07:03:51'),(129,'Saint Helena pound','SHP','654','£',0,0,0,NULL,0,'2015-11-04 12:44:52','2015-11-04 12:44:52'),(130,'Sierra Leonean leone','SLL','694','Le',0,0,0,NULL,0,'2015-11-04 12:45:15','2015-11-04 12:45:15'),(131,'Somali shilling','SOS','706','Sh',0,0,0,NULL,0,'2015-11-04 12:45:48','2015-11-04 12:45:48'),(132,'Surinamese dollar','SRD','968','$',0,0,0,NULL,0,'2015-11-04 12:46:13','2015-11-04 12:46:13'),(133,'South Sudanese pound','SSP','728','£',0,0,0,NULL,0,'2015-11-04 12:47:06','2015-11-04 12:47:06'),(134,'São Tomé and Príncipe dobra','STD','678','Db',0,0,0,NULL,0,'2015-11-04 12:47:28','2015-11-04 12:47:28'),(135,'Syrian pound','SYP','760','ل.س',0,0,0,NULL,0,'2015-11-04 12:47:50','2015-11-04 12:47:50'),(136,'Swazi lilangeni','SZL','748','L',0,0,0,NULL,0,'2015-11-04 12:48:13','2015-11-04 12:48:13'),(137,'Thai baht','THB','764','฿',0,0,0,0.540988,0,'2015-11-04 12:48:47','2016-01-14 07:03:51'),(138,'Tajikistani somoni','TJS','972','SM',0,0,0,NULL,0,'2015-11-04 12:49:08','2015-11-04 12:49:08'),(139,'Turkmenistani manat','TMT','934','m',0,0,0,NULL,0,'2015-11-04 12:49:34','2015-11-04 12:49:34'),(140,'Tunisian dinar','TND','788','د.ت',0,0,0,NULL,0,'2015-11-04 12:50:25','2015-11-04 12:50:25'),(141,'Tongan paʻanga','TOP','776','T$',0,0,0,NULL,0,'2015-11-04 12:50:46','2015-11-04 12:50:46'),(142,'Turkish lira','TRY','949','YTL',0,0,0,0.045127,0,'2015-11-04 12:51:11','2016-01-14 07:03:51'),(143,'Trinidad and Tobago dollar','TTD','780','$',0,0,0,NULL,0,'2015-11-04 12:51:31','2015-11-04 12:51:31'),(144,'New Taiwan dollar','TWD','901','$',0,0,0,0.499314,0,'2015-11-04 12:52:23','2016-01-14 07:03:50'),(145,'Tanzanian shilling','TZS','834','Sh',0,0,0,NULL,0,'2015-11-04 12:52:47','2015-11-04 12:52:47'),(146,'Ukrainian hryvnia','UAH','980','₴',0,0,0,NULL,0,'2015-11-04 12:53:12','2015-11-04 12:53:12'),(147,'Ugandan shilling','UGX','800','Sh',0,0,0,NULL,0,'2015-11-04 12:53:30','2015-11-04 12:53:30'),(148,'United States dollar','USD','840','$',1,0,0,0.014908,1,'2015-11-04 12:54:08','2016-01-14 07:03:51'),(149,'United States dollar (next day) (funds code)','USN','997','$',0,0,0,NULL,0,'2015-11-04 12:55:44','2015-11-04 12:55:44'),(150,'Uruguay Peso en Unidades Indexadas (URUIURUI) (funds code)','UYI','940','$',0,0,0,NULL,0,'2015-11-04 12:56:09','2015-11-04 12:56:09'),(151,'Uruguayan peso','UYU','858','$',0,0,0,NULL,0,'2015-11-04 12:56:30','2015-11-04 12:56:30'),(152,'Uzbekistan som','UZS','860','лв',0,0,0,NULL,0,'2015-11-04 12:57:17','2015-11-05 04:55:15'),(153,'Venezuelan bolívar','VEF','937','Bs F',0,0,0,NULL,0,'2015-11-04 12:57:38','2015-11-04 12:57:38'),(154,'Vietnamese dong','VND','704','₫',0,0,0,334.593013,0,'2015-11-04 12:58:00','2016-01-14 07:03:51'),(155,'Vanuatu vatu','VUV','548','Vt',0,0,0,NULL,0,'2015-11-04 12:58:29','2015-11-04 12:58:29'),(156,'Samoan tala','WST','882','T',0,0,0,NULL,0,'2015-11-04 12:58:48','2015-11-04 12:58:48'),(157,'CFA franc BEAC','XAF','950','Fr',0,0,0,NULL,0,'2015-11-04 12:59:15','2015-11-04 12:59:15'),(158,'Silver (one troy ounce)','XAG','961','Ag',0,0,0,NULL,0,'2015-11-04 12:59:38','2015-11-05 04:54:17'),(159,'Gold (one troy ounce)','XAU','959','Au',0,0,0,NULL,0,'2015-11-04 12:59:56','2015-11-05 04:51:21'),(160,'European Composite Unit  (bond market unit)','XBA','955','EURCO',0,0,0,NULL,0,'2015-11-04 13:00:14','2015-11-05 04:50:33'),(161,'European Monetary Unit (bond market unit)','XBB','956','E.M.U. 6',0,0,0,NULL,0,'2015-11-04 13:00:39','2015-11-05 05:29:39'),(162,'European Unit of Account 9 (E.U.A.-9) (bond market unit)','XBC','957','E.U.A. 9',0,0,0,NULL,0,'2015-11-04 13:01:01','2015-11-05 04:50:00'),(163,'European Unit of Account 17 (E.U.A.-17) (bond market unit)','XBD','958','EUA',0,0,0,NULL,0,'2015-11-04 13:01:26','2015-11-05 04:49:20'),(164,'East Caribbean dollar','XCD','951','$',0,0,0,NULL,0,'2015-11-04 13:02:03','2015-11-04 13:02:03'),(165,'Special drawing rights','XDR','960','SDR',0,0,0,NULL,0,'2015-11-04 13:02:22','2015-11-05 05:09:25'),(166,'UIC franc (special settlement currency)','XFU','-','₣',0,0,0,NULL,0,'2015-11-04 13:02:45','2015-11-05 05:20:39'),(167,'CFA franc BCEAO','XOF','952','Fr',0,0,0,NULL,0,'2015-11-04 13:03:05','2015-11-04 13:03:05'),(168,'Palladium (one troy ounce)','XPD','964','Pd',0,0,0,NULL,0,'2015-11-04 13:03:24','2015-11-05 05:21:01'),(169,'CFP franc (franc Pacifique)','XPF','953','Fr',0,0,0,NULL,0,'2015-11-04 13:03:42','2015-11-04 13:03:42'),(170,'Platinum (one troy ounce)','XPT','962','XPT',0,0,0,NULL,0,'2015-11-04 13:04:10','2015-11-05 05:25:46'),(171,'SUCRE','XSU','994','S/.',0,0,0,NULL,0,'2015-11-04 13:04:36','2015-11-05 05:26:26'),(172,'Code reserved for testing purposes','XTS','963','Reserved',0,0,0,NULL,0,'2015-11-04 13:04:56','2015-11-05 05:27:09'),(173,'ADB Unit of Account','XUA','965','ADB',0,0,0,NULL,0,'2015-11-04 13:05:20','2015-11-05 05:28:17'),(174,'No currency','XXX','999','XXX',0,0,0,NULL,0,'2015-11-04 13:05:48','2015-11-05 05:29:07'),(175,'Yemeni rial','YER','886','﷼',0,0,0,NULL,0,'2015-11-04 13:06:07','2015-11-04 13:06:07'),(176,'South African rand','ZAR','710','R',0,0,0,0.247384,0,'2015-11-04 13:06:25','2016-01-14 07:03:51'),(177,'Zambian kwacha','ZMW','967','ZK',0,0,0,NULL,0,'2015-11-04 13:06:46','2015-11-04 13:06:46'),(179,'Argentina Peso','ARS','1','$',0,0,0,0.201714,0,'2016-01-13 09:59:48','2016-01-14 07:03:50'),(180,'Bitcoin','BTC','','฿',0,0,0,0.002300,0,'2016-01-13 10:01:31','2016-01-13 10:50:44'),(181,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-14 14:19:24','2016-01-14 14:19:24'),(182,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-14 14:19:56','2016-01-14 14:19:56'),(183,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-14 14:23:10','2016-01-14 14:23:10'),(184,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-14 14:23:10','2016-01-14 14:23:10'),(185,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:12:26','2016-01-15 06:12:26'),(186,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:12:26','2016-01-15 06:12:26'),(187,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:17:54','2016-01-15 06:17:54'),(188,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:17:54','2016-01-15 06:17:54'),(189,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:22:54','2016-01-15 06:22:54'),(190,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:22:54','2016-01-15 06:22:54'),(191,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:23:06','2016-01-15 06:23:06'),(192,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:23:06','2016-01-15 06:23:06'),(193,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:23:32','2016-01-15 06:23:32'),(194,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:23:32','2016-01-15 06:23:32'),(196,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:43:14','2016-01-15 06:43:14'),(197,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:43:14','2016-01-15 06:43:14'),(198,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:45:30','2016-01-15 06:45:30'),(199,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:45:30','2016-01-15 06:45:30'),(200,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:45:53','2016-01-15 06:45:53'),(201,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:45:53','2016-01-15 06:45:53'),(202,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:50:28','2016-01-15 06:50:28'),(203,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:50:28','2016-01-15 06:50:28'),(204,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:52:25','2016-01-15 06:52:25'),(205,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:52:25','2016-01-15 06:52:25'),(206,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:58:12','2016-01-15 06:58:12'),(207,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:58:12','2016-01-15 06:58:12'),(208,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:58:36','2016-01-15 06:58:36'),(209,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:58:36','2016-01-15 06:58:36'),(210,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:59:00','2016-01-15 06:59:00'),(211,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:59:00','2016-01-15 06:59:00'),(212,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:59:43','2016-01-15 06:59:43'),(213,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 06:59:43','2016-01-15 06:59:43'),(214,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:00:10','2016-01-15 07:00:10'),(215,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:00:10','2016-01-15 07:00:10'),(216,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:00:30','2016-01-15 07:00:30'),(217,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:00:30','2016-01-15 07:00:30'),(224,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:10:09','2016-01-15 07:10:09'),(225,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:10:09','2016-01-15 07:10:09'),(233,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:13:06','2016-01-15 07:13:06'),(234,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:13:06','2016-01-15 07:13:06'),(237,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:15:30','2016-01-15 07:15:30'),(238,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:15:30','2016-01-15 07:15:30'),(245,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:19:25','2016-01-15 07:19:25'),(246,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:19:26','2016-01-15 07:19:26'),(247,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:19:35','2016-01-15 07:19:35'),(248,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:19:35','2016-01-15 07:19:35'),(249,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:19:54','2016-01-15 07:19:54'),(250,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:19:54','2016-01-15 07:19:54'),(251,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:20:29','2016-01-15 07:20:29'),(252,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:20:29','2016-01-15 07:20:29'),(253,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:21:41','2016-01-15 07:21:41'),(254,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:21:41','2016-01-15 07:21:41'),(255,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:21:52','2016-01-15 07:21:52'),(256,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:21:52','2016-01-15 07:21:52'),(257,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:22:08','2016-01-15 07:22:08'),(258,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:22:08','2016-01-15 07:22:08'),(261,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:24:46','2016-01-15 07:24:46'),(262,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:24:46','2016-01-15 07:24:46'),(263,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:25:42','2016-01-15 07:25:42'),(264,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:25:42','2016-01-15 07:25:42'),(265,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:25:49','2016-01-15 07:25:49'),(266,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:25:49','2016-01-15 07:25:49'),(267,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:26:51','2016-01-15 07:26:51'),(268,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:26:51','2016-01-15 07:26:51'),(269,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:27:36','2016-01-15 07:27:36'),(270,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:27:36','2016-01-15 07:27:36'),(271,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:28:27','2016-01-15 07:28:27'),(272,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:28:27','2016-01-15 07:28:27'),(273,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:28:44','2016-01-15 07:28:44'),(274,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:28:44','2016-01-15 07:28:44'),(275,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:30:11','2016-01-15 07:30:11'),(276,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:30:11','2016-01-15 07:30:11'),(277,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:30:29','2016-01-15 07:30:29'),(278,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:30:29','2016-01-15 07:30:29'),(279,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:30:57','2016-01-15 07:30:57'),(280,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:30:57','2016-01-15 07:30:57'),(281,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:32:16','2016-01-15 07:32:16'),(282,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 07:32:16','2016-01-15 07:32:16'),(283,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:41:48','2016-01-15 08:41:48'),(284,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:41:48','2016-01-15 08:41:48'),(285,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:42:05','2016-01-15 08:42:05'),(286,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:42:05','2016-01-15 08:42:05'),(287,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:42:11','2016-01-15 08:42:11'),(288,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:42:11','2016-01-15 08:42:11'),(289,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:42:41','2016-01-15 08:42:41'),(290,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:42:41','2016-01-15 08:42:41'),(291,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:43:21','2016-01-15 08:43:21'),(292,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:43:21','2016-01-15 08:43:21'),(293,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:46:02','2016-01-15 08:46:02'),(294,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:46:02','2016-01-15 08:46:02'),(295,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:47:03','2016-01-15 08:47:03'),(296,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:47:03','2016-01-15 08:47:03'),(297,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:48:21','2016-01-15 08:48:21'),(298,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:48:21','2016-01-15 08:48:21'),(299,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:48:38','2016-01-15 08:48:38'),(300,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:48:38','2016-01-15 08:48:38'),(301,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:48:53','2016-01-15 08:48:53'),(302,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:48:53','2016-01-15 08:48:53'),(303,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:49:14','2016-01-15 08:49:14'),(304,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:49:14','2016-01-15 08:49:14'),(305,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:50:07','2016-01-15 08:50:07'),(306,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:50:07','2016-01-15 08:50:07'),(307,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:51:51','2016-01-15 08:51:51'),(308,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:51:51','2016-01-15 08:51:51'),(309,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:53:26','2016-01-15 08:53:26'),(310,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:53:26','2016-01-15 08:53:26'),(311,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:54:12','2016-01-15 08:54:12'),(312,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:54:12','2016-01-15 08:54:12'),(313,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:54:39','2016-01-15 08:54:39'),(314,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:54:39','2016-01-15 08:54:39'),(315,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:54:47','2016-01-15 08:54:47'),(316,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:54:47','2016-01-15 08:54:47'),(317,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:55:09','2016-01-15 08:55:09'),(318,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:55:09','2016-01-15 08:55:09'),(319,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:55:42','2016-01-15 08:55:42'),(320,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:55:42','2016-01-15 08:55:42'),(321,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:56:02','2016-01-15 08:56:02'),(322,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:56:02','2016-01-15 08:56:02'),(323,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:56:10','2016-01-15 08:56:10'),(324,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:56:10','2016-01-15 08:56:10'),(325,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:56:57','2016-01-15 08:56:57'),(326,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:56:57','2016-01-15 08:56:57'),(327,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:57:56','2016-01-15 08:57:56'),(328,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:57:56','2016-01-15 08:57:56'),(329,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:58:09','2016-01-15 08:58:09'),(330,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 08:58:09','2016-01-15 08:58:09'),(331,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:00:39','2016-01-15 09:00:39'),(332,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:00:39','2016-01-15 09:00:39'),(333,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:00:59','2016-01-15 09:00:59'),(334,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:01:00','2016-01-15 09:01:00'),(335,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:01:17','2016-01-15 09:01:17'),(336,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:01:18','2016-01-15 09:01:18'),(337,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:02:06','2016-01-15 09:02:06'),(338,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:02:06','2016-01-15 09:02:06'),(339,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:02:29','2016-01-15 09:02:29'),(340,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:02:29','2016-01-15 09:02:29'),(341,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:02:52','2016-01-15 09:02:52'),(342,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:02:52','2016-01-15 09:02:52'),(343,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:04:38','2016-01-15 09:04:38'),(344,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:04:38','2016-01-15 09:04:38'),(345,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:04:54','2016-01-15 09:04:54'),(346,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:04:54','2016-01-15 09:04:54'),(347,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:04:55','2016-01-15 09:04:55'),(348,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:04:55','2016-01-15 09:04:55'),(349,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:07:47','2016-01-15 09:07:47'),(350,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:07:47','2016-01-15 09:07:47'),(351,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:08:58','2016-01-15 09:08:58'),(352,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:08:58','2016-01-15 09:08:58'),(353,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:10:29','2016-01-15 09:10:29'),(354,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:10:29','2016-01-15 09:10:29'),(355,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:11:08','2016-01-15 09:11:08'),(356,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:11:08','2016-01-15 09:11:08'),(357,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:12:04','2016-01-15 09:12:04'),(358,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:12:04','2016-01-15 09:12:04'),(359,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:12:37','2016-01-15 09:12:37'),(360,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:12:37','2016-01-15 09:12:37'),(361,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:13:15','2016-01-15 09:13:15'),(362,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:13:15','2016-01-15 09:13:15'),(363,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:14:32','2016-01-15 09:14:32'),(364,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:14:32','2016-01-15 09:14:32'),(365,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:15:25','2016-01-15 09:15:25'),(366,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:15:25','2016-01-15 09:15:25'),(367,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:16:12','2016-01-15 09:16:12'),(368,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:16:12','2016-01-15 09:16:12'),(369,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:17:02','2016-01-15 09:17:02'),(370,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:17:02','2016-01-15 09:17:02'),(371,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:17:34','2016-01-15 09:17:34'),(372,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:17:34','2016-01-15 09:17:34'),(373,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:20:44','2016-01-15 09:20:44'),(374,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:20:44','2016-01-15 09:20:44'),(375,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:21:16','2016-01-15 09:21:16'),(376,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:21:16','2016-01-15 09:21:16'),(377,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:21:30','2016-01-15 09:21:30'),(378,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:21:30','2016-01-15 09:21:30'),(379,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:22:09','2016-01-15 09:22:09'),(380,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:22:09','2016-01-15 09:22:09'),(381,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:23:21','2016-01-15 09:23:21'),(382,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:23:21','2016-01-15 09:23:21'),(383,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:23:42','2016-01-15 09:23:42'),(384,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:23:42','2016-01-15 09:23:42'),(385,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:24:30','2016-01-15 09:24:30'),(386,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:24:30','2016-01-15 09:24:30'),(387,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:26:08','2016-01-15 09:26:08'),(388,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:26:08','2016-01-15 09:26:08'),(389,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:27:26','2016-01-15 09:27:26'),(390,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:27:26','2016-01-15 09:27:26'),(391,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:28:02','2016-01-15 09:28:02'),(392,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:28:02','2016-01-15 09:28:02'),(393,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:28:10','2016-01-15 09:28:10'),(394,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:28:10','2016-01-15 09:28:10'),(395,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:29:27','2016-01-15 09:29:27'),(396,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:29:27','2016-01-15 09:29:27'),(397,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:30:09','2016-01-15 09:30:09'),(398,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:30:09','2016-01-15 09:30:09'),(399,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:30:26','2016-01-15 09:30:26'),(400,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:30:26','2016-01-15 09:30:26'),(401,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:30:38','2016-01-15 09:30:38'),(402,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:30:38','2016-01-15 09:30:38'),(403,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:30:47','2016-01-15 09:30:47'),(404,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:30:47','2016-01-15 09:30:47'),(405,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:30:56','2016-01-15 09:30:56'),(406,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:30:56','2016-01-15 09:30:56'),(407,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:31:12','2016-01-15 09:31:12'),(408,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:31:12','2016-01-15 09:31:12'),(409,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:31:16','2016-01-15 09:31:16'),(410,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:31:16','2016-01-15 09:31:16'),(411,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:32:04','2016-01-15 09:32:04'),(412,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:32:04','2016-01-15 09:32:04'),(413,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:34:01','2016-01-15 09:34:01'),(414,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:34:01','2016-01-15 09:34:01'),(415,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:35:42','2016-01-15 09:35:42'),(416,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:35:43','2016-01-15 09:35:43'),(417,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:35:47','2016-01-15 09:35:47'),(418,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:35:47','2016-01-15 09:35:47'),(419,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:37:37','2016-01-15 09:37:37'),(420,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:37:37','2016-01-15 09:37:37'),(421,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:38:17','2016-01-15 09:38:17'),(422,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:38:17','2016-01-15 09:38:17'),(423,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:39:17','2016-01-15 09:39:17'),(424,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:39:17','2016-01-15 09:39:17'),(425,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:39:44','2016-01-15 09:39:44'),(426,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:39:44','2016-01-15 09:39:44'),(427,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:40:19','2016-01-15 09:40:19'),(428,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:40:19','2016-01-15 09:40:19'),(429,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:41:27','2016-01-15 09:41:27'),(430,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 09:41:28','2016-01-15 09:41:28'),(431,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 10:22:36','2016-01-15 10:22:36'),(432,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 10:22:37','2016-01-15 10:22:37'),(433,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 13:44:27','2016-01-15 13:44:27'),(434,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 13:44:27','2016-01-15 13:44:27'),(435,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 13:45:18','2016-01-15 13:45:18'),(436,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 13:45:18','2016-01-15 13:45:18'),(437,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 13:49:38','2016-01-15 13:49:38'),(438,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-15 13:49:38','2016-01-15 13:49:38'),(439,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:23:16','2016-01-16 05:23:16'),(440,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:23:16','2016-01-16 05:23:16'),(441,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:29:19','2016-01-16 05:29:19'),(442,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:29:19','2016-01-16 05:29:19'),(443,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:34:36','2016-01-16 05:34:36'),(444,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:34:36','2016-01-16 05:34:36'),(445,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:34:40','2016-01-16 05:34:40'),(446,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:34:40','2016-01-16 05:34:40'),(447,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:34:51','2016-01-16 05:34:51'),(448,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:34:51','2016-01-16 05:34:51'),(449,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:34:54','2016-01-16 05:34:54'),(450,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:34:54','2016-01-16 05:34:54'),(451,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:35:05','2016-01-16 05:35:05'),(452,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:35:05','2016-01-16 05:35:05'),(453,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:37:57','2016-01-16 05:37:57'),(454,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:37:57','2016-01-16 05:37:57'),(455,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:38:00','2016-01-16 05:38:00'),(456,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:38:00','2016-01-16 05:38:00'),(457,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:38:32','2016-01-16 05:38:32'),(458,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:38:32','2016-01-16 05:38:32'),(459,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:38:58','2016-01-16 05:38:58'),(460,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:38:58','2016-01-16 05:38:58'),(461,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:39:06','2016-01-16 05:39:06'),(462,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:39:06','2016-01-16 05:39:06'),(463,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:40:04','2016-01-16 05:40:04'),(464,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:40:04','2016-01-16 05:40:04'),(465,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:40:17','2016-01-16 05:40:17'),(466,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:40:17','2016-01-16 05:40:17'),(467,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:40:46','2016-01-16 05:40:46'),(468,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:40:46','2016-01-16 05:40:46'),(469,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:45:56','2016-01-16 05:45:56'),(470,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:45:56','2016-01-16 05:45:56'),(471,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:46:16','2016-01-16 05:46:16'),(472,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:46:16','2016-01-16 05:46:16'),(473,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:52:39','2016-01-16 05:52:39'),(474,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:52:39','2016-01-16 05:52:39'),(475,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:53:06','2016-01-16 05:53:06'),(476,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:53:06','2016-01-16 05:53:06'),(477,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:53:36','2016-01-16 05:53:36'),(478,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:53:36','2016-01-16 05:53:36'),(479,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:54:50','2016-01-16 05:54:50'),(480,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 05:54:50','2016-01-16 05:54:50'),(481,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 06:05:07','2016-01-16 06:05:07'),(482,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 06:05:07','2016-01-16 06:05:07'),(483,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 06:10:27','2016-01-16 06:10:27'),(484,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 06:10:27','2016-01-16 06:10:27'),(485,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 07:28:19','2016-01-16 07:28:19'),(486,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 07:28:19','2016-01-16 07:28:19'),(487,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 07:32:44','2016-01-16 07:32:44'),(488,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 09:09:58','2016-01-16 09:09:58'),(489,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 09:09:58','2016-01-16 09:09:58'),(490,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 09:21:08','2016-01-16 09:21:08'),(491,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 09:21:08','2016-01-16 09:21:08'),(492,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 12:50:42','2016-01-16 12:50:42'),(493,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-16 12:50:42','2016-01-16 12:50:42'),(498,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 05:15:22','2016-01-18 05:15:22'),(499,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 05:15:22','2016-01-18 05:15:22'),(504,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 05:30:57','2016-01-18 05:30:57'),(505,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 05:30:57','2016-01-18 05:30:57'),(506,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 05:33:35','2016-01-18 05:33:35'),(507,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 05:33:35','2016-01-18 05:33:35'),(508,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 05:48:16','2016-01-18 05:48:16'),(509,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 05:48:16','2016-01-18 05:48:16'),(510,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:00:01','2016-01-18 06:00:01'),(511,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:00:01','2016-01-18 06:00:01'),(516,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:04:13','2016-01-18 06:04:13'),(517,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:04:13','2016-01-18 06:04:13'),(518,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:08:59','2016-01-18 06:08:59'),(519,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:08:59','2016-01-18 06:08:59'),(520,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:09:40','2016-01-18 06:09:40'),(521,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:09:40','2016-01-18 06:09:40'),(522,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:23:47','2016-01-18 06:23:47'),(523,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:23:47','2016-01-18 06:23:47'),(524,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:23:47','2016-01-18 06:23:47'),(525,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:33:44','2016-01-18 06:33:44'),(526,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:33:44','2016-01-18 06:33:44'),(527,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:33:44','2016-01-18 06:33:44'),(528,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:33:44','2016-01-18 06:33:44'),(529,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:36:48','2016-01-18 06:36:48'),(530,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:36:48','2016-01-18 06:36:48'),(531,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:36:48','2016-01-18 06:36:48'),(532,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:49:28','2016-01-18 06:49:28'),(533,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:49:28','2016-01-18 06:49:28'),(534,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:56:12','2016-01-18 06:56:12'),(535,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 06:56:12','2016-01-18 06:56:12'),(539,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 07:31:46','2016-01-18 07:31:46'),(540,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 09:22:37','2016-01-18 09:22:37'),(541,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 09:22:37','2016-01-18 09:22:37'),(542,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 11:05:05','2016-01-18 11:05:05'),(543,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-18 11:05:05','2016-01-18 11:05:05'),(544,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-21 10:52:49','2016-01-21 10:52:49'),(545,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-21 10:52:49','2016-01-21 10:52:49'),(546,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-21 13:31:22','2016-01-21 13:31:22'),(547,'','','',NULL,0,0,NULL,1.000000,0,'2016-01-21 13:31:22','2016-01-21 13:31:22');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destinations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `top_attractions` text,
  `thumbnail_image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `display_on_homepage` tinyint(1) unsigned NOT NULL,
  `no_of_elements_to_show` int(3) unsigned NOT NULL,
  `homepage_order` int(3) unsigned NOT NULL,
  `description` text,
  `active` tinyint(1) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinations`
--

LOCK TABLES `destinations` WRITE;
/*!40000 ALTER TABLE `destinations` DISABLE KEYS */;
INSERT INTO `destinations` VALUES (1,103,'Mumbai','<ul>\n<li>Eiffel Tower</li>\n<li>Louvre Museum</li>\n<li>Versailles</li>\n<li>The Seine</li>\n<li>Moulin Rouge</li>\n<li>Orsay Museum</li>\n</ul>','destinationimg01.jpg','aftersearchcollage.jpg',1,1,1,'<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>',1,'2015-12-10 10:25:26','2015-12-29 12:35:30'),(2,103,'Switzerland',NULL,'destinationimg02.jpg','activitycolg.jpg',0,1,2,'<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>',1,'2015-12-16 12:05:13','2015-12-28 06:04:28'),(3,103,'Dubai','<ul>\n<li>Eiffel Tower</li>\n<li>Louvre Museum</li>\n<li>Versailles</li>\n<li>The Seine</li>\n<li>Moulin Rouge</li>\n<li>Orsay Museum</li>\n</ul>','destinationimg03.jpg','destinationcolg.jpg',0,1,3,'<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>',1,'2015-12-16 12:05:45','2015-12-29 12:34:36'),(4,103,'New York',NULL,'destinationimg04.jpg','aftersearchcollage.jpg',1,1,4,'<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>',1,'2015-12-16 12:06:30','2015-12-28 06:05:42'),(8,14,'Sydney',NULL,'sydney-harbour-and-opera-house_2.jpg','sydney.jpeg',1,1,1,'<p>Australia Sydney Destination</p>',1,'2015-12-29 04:53:44','2015-12-29 09:52:30'),(9,14,'Perth',NULL,'perth.jpg','perth.jpeg',1,2,1,'<p>Perth Australia</p>',1,'2015-12-29 05:57:48','2015-12-29 09:53:29'),(10,236,'San Francisco',NULL,'San Francisco.jpg','1846366801-san-francisco-city-pass.jpg',1,2,2,'<p>San Francisco description</p>',1,'2015-12-29 07:31:22','2015-12-29 10:00:57');
/*!40000 ALTER TABLE `destinations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `durations`
--

DROP TABLE IF EXISTS `durations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `durations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `php_time_value` varchar(255) DEFAULT NULL,
  `display_order` int(3) unsigned NOT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `durations`
--

LOCK TABLES `durations` WRITE;
/*!40000 ALTER TABLE `durations` DISABLE KEYS */;
INSERT INTO `durations` VALUES (1,'1 Hour','',0,1,'2015-12-18 07:21:11','2015-12-18 07:21:11'),(2,'2 Hours','',0,1,'2015-12-18 07:21:37','2015-12-18 07:21:37'),(3,'3 Hours','',0,1,'2015-12-18 07:21:51','2015-12-18 07:21:51'),(4,'4 Hours','',0,1,'2015-12-18 07:22:04','2015-12-18 07:22:04'),(5,'5 Hours','',0,1,'2015-12-18 07:22:16','2015-12-18 07:22:16'),(6,'6 Hours','',0,1,'2015-12-18 07:22:36','2015-12-18 07:22:36'),(7,'7 Hours','',0,1,'2015-12-18 07:22:47','2015-12-18 07:22:47'),(8,'8 Hours','',0,1,'2015-12-18 07:22:56','2015-12-18 07:24:55'),(9,'9 Hours','',0,1,'2015-12-18 07:23:05','2015-12-18 07:24:51'),(10,'10 Hours','',0,1,'2015-12-18 07:23:12','2015-12-18 07:24:23'),(11,'11 Hours','',0,1,'2015-12-18 07:23:18','2015-12-18 07:24:30'),(12,'12 Hours','',0,1,'2015-12-18 07:23:25','2015-12-18 07:24:27'),(13,'13 Hours','',0,1,'2015-12-18 07:23:47','2015-12-18 07:23:47'),(14,'14 Hours','',0,1,'2015-12-18 07:23:57','2015-12-18 07:23:57'),(15,'15 Hours','',0,1,'2015-12-18 07:25:20','2015-12-18 07:25:20'),(16,'16 Hours','',0,1,'2015-12-18 07:25:20','2015-12-18 07:25:20'),(17,'17 Hours','',0,1,'2015-12-18 07:27:23','2015-12-18 07:27:23'),(18,'18 Hours','',0,1,'2015-12-18 07:27:36','2015-12-18 07:27:36'),(19,'19 Hours','',0,1,'2015-12-18 07:27:46','2015-12-18 07:27:46'),(20,'20 Hours','',0,1,'2015-12-18 07:27:57','2015-12-18 07:27:57'),(21,'21 Hours','',0,1,'2015-12-18 07:28:13','2015-12-18 07:28:13'),(22,'22 Hours','',0,1,'2015-12-18 07:28:22','2015-12-18 07:28:22'),(23,'23 Hours','',0,1,'2015-12-18 07:28:31','2015-12-18 07:28:31'),(24,'24 Hours','',0,1,'2015-12-18 07:28:39','2015-12-18 07:28:39');
/*!40000 ALTER TABLE `durations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_subscriptions`
--

DROP TABLE IF EXISTS `email_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_subscriptions`
--

LOCK TABLES `email_subscriptions` WRITE;
/*!40000 ALTER TABLE `email_subscriptions` DISABLE KEYS */;
INSERT INTO `email_subscriptions` VALUES (2,'bhushan@gmail.com',1,'2015-12-15 10:16:49','2015-12-16 13:09:13'),(3,'jh@hjb.com',1,'2015-12-15 13:19:38','2015-12-15 13:19:38'),(4,'towsif@puratech.co.in',1,'2016-01-15 06:33:30','2016-01-15 06:33:30'),(5,'dfew@fewfe.com',1,'2016-01-15 06:33:56','2016-01-15 06:33:56'),(6,'edgeg@few.com',1,'2016-01-15 06:47:51','2016-01-15 06:47:51'),(7,'dew@fewyyr.com',1,'2016-01-15 06:51:16','2016-01-15 06:51:16'),(8,'a@s.cj',1,'2016-01-15 09:10:45','2016-01-15 09:10:45');
/*!40000 ALTER TABLE `email_subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facilities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned DEFAULT NULL,
  `rght` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `icon_image` varchar(255) DEFAULT NULL COMMENT 'image picker',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities`
--

LOCK TABLES `facilities` WRITE;
/*!40000 ALTER TABLE `facilities` DISABLE KEYS */;
INSERT INTO `facilities` VALUES (1,NULL,1,2,'Restrooms','restrooms_icon.png',1,'2015-12-19 13:29:41','2015-12-23 06:30:31'),(2,NULL,3,4,'Restaurants','restaurants_icon.png',1,'2015-12-19 13:29:54','2015-12-23 06:31:38'),(3,NULL,5,6,'Shopping ','shopping_icon.png',1,'2015-12-19 13:30:07','2015-12-23 06:33:35'),(4,NULL,7,8,'Disabled friendly','disabledfriendly_icon.png',1,'2015-12-19 13:31:31','2015-12-23 06:35:17'),(5,NULL,9,10,'Guided tours available','guidedtours_icon.png',1,'2015-12-19 13:48:19','2015-12-23 06:36:12'),(6,NULL,11,12,'ATM ','atm_icon.png',1,'2015-12-19 13:55:45','2015-12-23 06:35:45'),(7,NULL,13,14,'Wi Fi Facility','wifi_icon.png',1,'2015-12-19 13:57:04','2015-12-23 06:35:29'),(8,NULL,15,16,'Accommodation','accommodation_icon.png',1,'2015-12-19 14:00:59','2015-12-23 06:33:44'),(9,NULL,17,18,'First Aid','firstaid_icon.png',1,'2015-12-19 14:14:00','2015-12-23 06:32:08'),(10,NULL,19,20,'Lockers','lockers_icon.png',1,'2015-12-19 14:14:15','2015-12-23 06:31:58'),(11,NULL,21,22,'Parking','parking_icon.png',1,'2015-12-19 14:16:37','2015-12-23 06:31:47'),(12,NULL,23,24,'Prayer Room',NULL,1,'2016-01-11 05:32:06','2016-01-11 06:08:58'),(13,NULL,25,26,'Cabana',NULL,1,'2016-01-11 06:08:46','2016-01-11 06:08:46'),(14,NULL,27,28,'Waiting Hall',NULL,1,'2016-01-11 06:44:56','2016-01-11 06:44:56'),(15,NULL,29,30,'Lifts',NULL,1,'2016-01-11 07:40:11','2016-01-11 07:40:11'),(16,NULL,31,32,'Escalator',NULL,1,'2016-01-11 07:41:17','2016-01-11 07:41:17'),(17,NULL,33,34,'Money Changer',NULL,1,'2016-01-11 07:41:32','2016-01-11 07:41:32'),(18,NULL,35,36,'Zoo huts',NULL,1,'2016-01-12 09:39:34','2016-01-12 09:39:34');
/*!40000 ALTER TABLE `facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `featured_attractions`
--

DROP TABLE IF EXISTS `featured_attractions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `featured_attractions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned DEFAULT NULL,
  `rght` int(10) unsigned DEFAULT NULL,
  `attraction_id` int(10) unsigned NOT NULL,
  `display_order` int(3) unsigned NOT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `featured_attractions`
--

LOCK TABLES `featured_attractions` WRITE;
/*!40000 ALTER TABLE `featured_attractions` DISABLE KEYS */;
INSERT INTO `featured_attractions` VALUES (1,NULL,1,2,1,1,1,'2015-12-11 12:32:59','2016-01-08 07:15:04'),(2,NULL,3,4,3,2,1,'2016-01-08 07:19:08','2016-01-08 07:19:08'),(3,NULL,5,6,8,3,1,'2016-01-08 07:19:30','2016-01-08 07:19:30'),(4,NULL,7,8,9,4,1,'2016-01-08 07:19:39','2016-01-08 07:19:39'),(5,NULL,9,10,6,5,1,'2016-01-08 09:21:33','2016-01-08 09:22:49'),(6,NULL,11,12,7,6,1,'2016-01-08 09:23:28','2016-01-08 09:23:28');
/*!40000 ALTER TABLE `featured_attractions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `homepage_banners`
--

DROP TABLE IF EXISTS `homepage_banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `homepage_banners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `heading_1` text,
  `heading_2` text,
  `image_file` text NOT NULL,
  `link_url` text,
  `display_order` int(3) unsigned NOT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  `created` text NOT NULL,
  `modified` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `homepage_banners`
--

LOCK TABLES `homepage_banners` WRITE;
/*!40000 ALTER TABLE `homepage_banners` DISABLE KEYS */;
INSERT INTO `homepage_banners` VALUES (1,NULL,NULL,'1.jpg','#',1,1,'1450098910','1450098910'),(2,NULL,NULL,'2.jpg','#',2,1,'1450098924','1450098924'),(3,NULL,NULL,'3.jpg','#',3,1,'1450098935','1450098935');
/*!40000 ALTER TABLE `homepage_banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `markups`
--

DROP TABLE IF EXISTS `markups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `markups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `is_percentage` tinyint(1) NOT NULL,
  `value` float NOT NULL,
  `currency_id` int(10) unsigned DEFAULT NULL,
  `country_id` int(10) DEFAULT NULL,
  `attraction_id` int(10) DEFAULT NULL,
  `attraction_product_id` int(10) DEFAULT NULL,
  `supplier_id` int(10) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `markups`
--

LOCK TABLES `markups` WRITE;
/*!40000 ALTER TABLE `markups` DISABLE KEYS */;
INSERT INTO `markups` VALUES (2,1,12,NULL,NULL,1,NULL,NULL,'2015-12-23 11:13:11','2015-12-23 11:13:11');
/*!40000 ALTER TABLE `markups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_links`
--

DROP TABLE IF EXISTS `menu_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned DEFAULT NULL,
  `rght` int(10) unsigned DEFAULT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 NOT NULL,
  `attributes` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_links`
--

LOCK TABLES `menu_links` WRITE;
/*!40000 ALTER TABLE `menu_links` DISABLE KEYS */;
INSERT INTO `menu_links` VALUES (1,NULL,1,2,1,'home','Dashboard','{\"controller\":\"dashboards\", \"action\":\"admin_index\"}','',1,'2015-12-10 04:12:39','2015-12-11 11:10:15'),(2,NULL,3,10,1,'flag','Attractions','#','',1,'2015-12-11 10:59:57','2016-01-16 09:19:33'),(3,2,4,5,1,'','View all attractions','{\"controller\":\"attractions\", \"action\":\"admin_index\"}','',1,'2015-12-11 11:00:42','2015-12-11 11:01:22'),(4,2,6,7,1,'star','Featured Attractions','{\"controller\":\"featured_attractions\", \"action\":\"admin_index\"}','',1,'2015-12-11 11:02:05','2015-12-11 11:02:05'),(6,2,8,9,1,'list','Attraction Comments','{\"controller\":\"attraction_comments\", \"action\":\"admin_index\"}','',1,'2015-12-11 11:04:14','2015-12-11 11:04:14'),(12,32,35,36,1,'list','Attraction Types','{\"controller\":\"attraction_types\", \"action\":\"admin_index\"}','',1,'2015-12-11 11:07:49','2016-01-16 12:53:14'),(20,32,37,38,1,'sort-amount-asc','Categories','{\"controller\":\"categories\", \"action\":\"admin_index\"}','',1,'2015-12-11 11:36:35','2016-01-16 13:29:24'),(22,NULL,93,102,1,'gears','Super Masters','#','',1,'2015-12-11 11:37:51','2015-12-18 05:31:57'),(23,22,94,95,1,'list','Menus','{\"controller\":\"menus\", \"action\":\"admin_index\"}','',1,'2015-12-11 11:38:29','2015-12-11 11:38:29'),(24,22,96,97,1,'list','Menu Links','{\"controller\":\"menu_links\", \"action\":\"admin_index\"}','',1,'2015-12-11 11:39:21','2015-12-11 11:39:21'),(25,22,98,99,1,'list','Roles','{\"controller\":\"roles\", \"action\":\"admin_index\"}','',1,'2015-12-11 11:39:50','2015-12-11 11:39:50'),(28,NULL,11,42,1,'building-o','Masters','#','',1,'2015-12-11 11:42:02','2015-12-11 11:42:02'),(29,28,12,19,1,'globe','Geo Locations','#','',1,'2015-12-11 11:42:45','2015-12-11 11:42:45'),(30,29,15,16,1,'list','Countries','{\"controller\":\"countries\", \"action\":\"admin_index\"}','',1,'2015-12-11 11:44:18','2015-12-11 11:44:18'),(31,29,17,18,1,'list','Timezones','{\"controller\":\"timezones\", \"action\":\"admin_index\"}','',1,'2015-12-11 11:44:57','2015-12-18 06:57:30'),(32,28,20,41,1,'caret-square-o-down','Dropdowns','#','',1,'2015-12-11 11:47:18','2016-01-16 12:51:48'),(33,32,21,22,1,'inr','Currencies','{\"controller\":\"currencies\", \"action\":\"admin_index\"}','',1,'2015-12-11 11:50:36','2016-01-16 13:06:26'),(34,32,23,24,1,'map-signs','Destinations','{\"controller\":\"destinations\", \"action\":\"admin_index\"}','',1,'2015-12-11 12:36:59','2016-01-16 13:05:48'),(35,32,25,26,1,'list','Nationalities','{\"controller\":\"nationalities\", \"action\":\"admin_index\"}','',1,'2015-12-11 12:37:32','2015-12-11 12:37:32'),(36,32,39,40,1,'hashtag','Tags','{\"controller\":\"tags\", \"action\":\"admin_index\"}','',1,'2015-12-11 12:39:49','2016-01-16 12:54:46'),(37,32,27,28,1,'clock-o','Durations','{\"controller\":\"durations\", \"action\":\"admin_index\"}','',1,'2015-12-11 12:41:15','2016-01-16 13:07:02'),(38,32,29,30,1,'list','Facilities','{\"controller\":\"facilities\", \"action\":\"admin_index\"}','',1,'2015-12-11 12:41:57','2015-12-11 12:41:57'),(39,NULL,133,134,1,'list','Markups','{\"controller\":\"markups\", \"action\":\"admin_index\"}','',1,'2015-12-11 12:42:35','2015-12-18 07:16:04'),(40,32,31,32,1,'calendar','Week Days','{\"controller\":\"week_days\", \"action\":\"admin_index\"}','',1,'2015-12-11 12:43:10','2016-01-16 13:04:02'),(41,22,100,101,1,'list','Template Layouts','{\"controller\":\"template_layouts\", \"action\":\"admin_index\"}','',1,'2015-12-11 12:43:55','2015-12-18 07:09:27'),(42,NULL,61,66,1,'users','Users','#','',1,'2015-12-11 12:46:17','2015-12-11 12:46:17'),(43,42,62,63,1,'','List All','{\"controller\":\"users\", \"action\":\"admin_index\"}','',1,'2015-12-11 12:46:47','2015-12-11 12:46:47'),(47,NULL,67,72,1,'user-plus','Subscriptions','#','',1,'2015-12-11 12:50:01','2015-12-18 05:22:15'),(48,47,68,69,1,'list','Subscription Plans','{\"controller\":\"subscription_plans\", \"action\":\"admin_index\"}','',1,'2015-12-11 12:50:53','2015-12-18 05:54:40'),(49,47,70,71,1,'list','User Subscriptions','{\"controller\":\"user_subscriptions\", \"action\":\"admin_index\"}','',1,'2015-12-11 12:52:06','2015-12-11 12:52:06'),(50,NULL,73,80,1,'inr','Payments','#','',1,'2015-12-11 12:52:42','2015-12-18 05:22:31'),(51,50,74,75,1,'list','Payment Methods','{\"controller\":\"payment_methods\", \"action\":\"admin_index\"}','',1,'2015-12-11 12:53:12','2015-12-11 12:53:12'),(52,50,76,77,1,'list','Payment Status','{\"controller\":\"payment_statuses\", \"action\":\"admin_index\"}','',1,'2015-12-11 12:54:04','2015-12-11 12:54:04'),(53,50,78,79,1,'list','User Subscription Payments','{\"controller\":\"user_subscription_payments\", \"action\":\"admin_index\"}','',1,'2015-12-11 12:54:52','2015-12-11 12:54:52'),(56,NULL,81,82,1,'link','Careers','{\"controller\":\"careers\", \"action\":\"admin_index\"}','',1,'2015-12-11 13:02:24','2015-12-18 06:54:56'),(57,NULL,83,84,1,'bank','Posts','{\"controller\":\"posts\", \"action\":\"admin_index\"}','',1,'2015-12-11 13:03:02','2015-12-18 06:55:18'),(58,NULL,85,92,1,'gear','Settings','#','',1,'2015-12-11 13:03:27','2016-01-16 12:47:33'),(60,58,90,91,1,'image','Home Slider','{\"controller\":\"homepage_banners\", \"action\":\"admin_index\"}','',1,'2015-12-14 12:36:17','2015-12-18 05:11:57'),(62,NULL,103,104,2,'','HOME','{\"controller\":\"attractions\", \"action\":\"home\",\"user\":false,\"admin\":false,\"supplier\":false}','',1,'2015-12-15 06:49:13','2015-12-15 06:49:13'),(63,NULL,105,106,2,'','DESTINATIONS','{\"controller\":\"destinations\", \"action\":\"index\",\"user\":false,\"admin\":false,\"supplier\":false}','',1,'2015-12-15 06:49:41','2016-01-12 09:36:51'),(64,NULL,107,108,2,'','EXPERIENCES','{\"controller\":\"pages\", \"action\":\"view\",\"0\":\"6\" ,\"user\":false,\"admin\":false,\"supplier\":false}','',1,'2015-12-15 06:49:59','2015-12-28 12:48:37'),(65,NULL,109,110,2,'','WHY BOOK WITH US','{\"controller\":\"pages\", \"action\":\"view\",\"0\":\"1\",\"user\":false,\"admin\":false,\"supplier\":false}','',1,'2015-12-15 06:50:15','2015-12-28 09:32:16'),(66,NULL,111,112,2,'','CONTACT US','{\"controller\":\"pages\", \"action\":\"view\",\"0\":\"2\",\"user\":false,\"admin\":false,\"supplier\":false}','',1,'2015-12-15 06:50:34','2015-12-28 11:01:42'),(67,NULL,113,114,3,'','Home','{\"controller\":\"attractions\", \"action\":\"home\",\"user\":false,\"admin\":false,\"supplier\":false}','',1,'2015-12-15 06:59:44','2015-12-15 06:59:44'),(68,NULL,115,116,3,'','Destinations','{\"controller\":\"destinations\", \"action\":\"index\",\"user\":false,\"admin\":false,\"supplier\":false}','',1,'2015-12-15 07:00:07','2015-12-22 05:02:40'),(69,NULL,117,118,3,'','Top Attractions','#','',1,'2015-12-15 07:00:21','2015-12-15 07:00:21'),(70,NULL,119,120,3,'','Why Book with us','{\"controller\":\"pages\", \"action\":\"view\",\"0\":\"1\",\"user\":false,\"admin\":false,\"supplier\":false}','',1,'2015-12-15 07:00:34','2015-12-29 06:54:21'),(71,NULL,121,122,3,'','Enquiry','#','',1,'2015-12-15 07:00:42','2015-12-15 07:00:42'),(72,NULL,123,124,3,'','FAQ’s','{\"controller\":\"pages\", \"action\":\"view\",\"0\":\"4\",\"user\":false,\"admin\":false,\"supplier\":false}','',1,'2015-12-15 07:02:51','2015-12-28 11:02:55'),(73,NULL,125,126,3,'','Write a Review','#','',0,'2015-12-15 07:03:07','2015-12-29 06:49:35'),(74,NULL,127,128,3,'','Terms & Conditions','{\"controller\":\"pages\", \"action\":\"view\",\"0\":\"3\",\"user\":false,\"admin\":false,\"supplier\":false}','',1,'2015-12-15 07:03:22','2015-12-28 11:02:25'),(75,NULL,129,130,3,'','Contact us',' {\"controller\":\"pages\", \"action\":\"view\",\"0\":\"2\",\"user\":false,\"admin\":false,\"supplier\":false} ','',1,'2015-12-15 07:03:31','2015-12-29 06:55:11'),(76,NULL,131,132,3,'','Supplier Login','{\"controller\":\"users\", \"action\":\"supplier_login\", \"supplier\":true,  \"admin\":false,  \"user\":false }','',1,'2015-12-15 07:03:54','2015-12-30 04:52:26'),(77,58,88,89,1,'th','Social Media','{\"controller\":\"social_media\", \"action\":\"admin_index\"}','',1,'2015-12-18 05:04:36','2016-01-16 12:49:27'),(78,58,86,87,1,'wrench','Basic Settings','{\"controller\":\"settings\", \"action\":\"admin_index\"}','',1,'2015-12-18 05:06:44','2016-01-16 12:48:08'),(81,NULL,43,44,1,'files-o','Pages','{\"controller\":\"pages\", \"action\":\"admin_index\"}','',1,'2015-12-23 14:26:32','2016-01-12 05:54:00'),(82,NULL,135,136,5,'','Dashboards','{\"controller\":\"dashboards\", \"action\":\"user_index\" ,\"user\":true}','',1,'2015-12-29 05:46:42','2015-12-29 05:52:55'),(83,NULL,137,138,5,'','My Orders','{\"controller\":\"orders\", \"action\":\"index\",\"user\":true ,\"admin\":false,\"supplier\":false,\"agent\":false}','',1,'2015-12-29 05:47:16','2016-01-16 06:16:16'),(84,NULL,139,140,5,'','My Account','{\"controller\":\"users\", \"action\":\"account\",\"user\":true}','',1,'2015-12-29 05:48:25','2015-12-29 05:48:25'),(85,NULL,141,142,4,'','Dashboard','{\"controller\":\"dashboards\", \"action\":\"supplier_index\",\"supplier\":true}','',1,'2015-12-29 05:49:54','2015-12-29 05:52:39'),(86,NULL,143,144,4,'','Attractions','{\"controller\":\"attractions\", \"action\":\"index\",\"supplier\":true}','',1,'2015-12-29 05:50:40','2015-12-29 05:52:14'),(87,NULL,145,146,4,'','Orders','{\"controller\":\"orders\", \"action\":\"supplier_index\", \"user\":false, \"admin\":false, \"supplier\":true}','',1,'2015-12-29 05:54:05','2016-01-15 10:09:14'),(88,NULL,147,148,4,'','Subscription Plan','#','',1,'2015-12-29 05:54:55','2015-12-29 07:32:26'),(89,NULL,149,150,4,'','Payments','#','',1,'2015-12-29 05:55:46','2015-12-29 05:55:46'),(90,NULL,153,154,4,'','My Account','{\"controller\":\"users\", \"action\":\"account\",\"supplier\":true}','',1,'2015-12-29 05:56:31','2015-12-29 05:56:31'),(91,NULL,151,152,5,'','My Wishlist','{\"controller\":\"wishlists\", \"action\":\"index\",\"user\":true}','',1,'2015-12-29 06:09:29','2015-12-29 06:09:29'),(93,29,13,14,1,'list','Zones','{\"controller\":\"zones\", \"action\":\"admin_index\"}','',1,'2016-01-04 13:52:50','2016-01-04 13:52:50'),(94,32,33,34,1,'location-arrow','Pickup Point Types','{\"controller\":\"pickup_point_types\", \"action\":\"admin_index\"}','',1,'2016-01-05 13:52:09','2016-01-16 13:04:40'),(96,42,64,65,1,'list','Cart Items','{\"controller\":\"cart_items\", \"action\":\"admin_index\"}','',1,'2016-01-13 05:04:40','2016-01-13 05:22:27'),(97,NULL,45,52,1,'shopping-cart','Suppliers','#','',1,'2016-01-15 05:39:52','2016-01-16 12:42:58'),(98,97,46,47,1,'','List All','{\"controller\":\"users\", \"action\":\"admin_supplier_index\"}','',1,'2016-01-15 05:40:56','2016-01-15 05:40:56'),(99,97,48,49,1,'','Approved','{\"controller\":\"users\", \"action\":\"admin_supplier_index\", \"User.active\":\"1\"}','',1,'2016-01-15 05:41:53','2016-01-15 05:41:53'),(100,97,50,51,1,'','Unapproved','{\"controller\":\"users\", \"action\":\"admin_supplier_index\", \"User.active\":\"0\"}','',1,'2016-01-15 05:42:33','2016-01-15 05:42:33'),(101,NULL,53,60,1,'shopping-cart','Agents','#','',1,'2016-01-15 05:54:49','2016-01-16 12:43:15'),(102,101,54,55,1,'','List All','{\"controller\":\"users\", \"action\":\"admin_agent_index\"}','',1,'2016-01-15 05:55:50','2016-01-15 05:55:50'),(103,101,56,57,1,'','Approved','{\"controller\":\"users\", \"action\":\"admin_agent_index\", \"User.active\":\"1\"}','',1,'2016-01-15 05:56:39','2016-01-15 05:56:39'),(104,101,58,59,1,'','Unapproved','{\"controller\":\"users\", \"action\":\"admin_agent_index\", \"User.active\":\"0\"}','',1,'2016-01-15 05:57:14','2016-01-15 05:57:14'),(105,NULL,155,156,1,'','Orders','{\"controller\":\"orders\", \"action\":\"admin_index\"}','',1,'2016-01-18 07:14:37','2016-01-18 07:14:37');
/*!40000 ALTER TABLE `menu_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_links_roles`
--

DROP TABLE IF EXISTS `menu_links_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_links_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_link_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_links_roles`
--

LOCK TABLES `menu_links_roles` WRITE;
/*!40000 ALTER TABLE `menu_links_roles` DISABLE KEYS */;
INSERT INTO `menu_links_roles` VALUES (1,47,1),(2,50,1),(3,22,1),(4,48,1),(5,56,1),(6,57,1),(7,31,1),(8,40,1),(9,39,1);
/*!40000 ALTER TABLE `menu_links_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_links_users`
--

DROP TABLE IF EXISTS `menu_links_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_links_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_link_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_links_users`
--

LOCK TABLES `menu_links_users` WRITE;
/*!40000 ALTER TABLE `menu_links_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_links_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Backend','#','2015-09-24 05:53:21','2015-09-24 05:53:21'),(2,'Frontend Header','#','2015-09-24 05:53:44','2015-09-24 05:53:44'),(3,'Frontend Footer','#','2015-09-24 05:54:59','2015-09-24 05:54:59'),(4,'Agent Nav','Agent My Account - Left side navigation ','2015-10-08 04:47:19','2015-10-08 04:47:19'),(5,'User Nav','User My Account - Left side navigation ','2015-10-08 04:47:53','2015-10-08 04:47:53');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nationalities`
--

DROP TABLE IF EXISTS `nationalities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nationalities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nationalities`
--

LOCK TABLES `nationalities` WRITE;
/*!40000 ALTER TABLE `nationalities` DISABLE KEYS */;
INSERT INTO `nationalities` VALUES (1,1,'Afghan, Afghani',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(2,2,'Albanian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(3,4,'Algerian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(4,7,'Angolan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(5,11,'Argentine, Argentinian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(6,14,'Australian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(7,15,'Austrian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(8,19,'Bangladeshi',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(9,21,'Belarusian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(10,22,'Belgian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(11,26,'Bhutanese',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(12,30,'Botswanan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(13,32,'Brazilian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(14,35,'Bulgarian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(15,41,'Cape Verdeans',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(16,40,'Canadian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(17,45,'Chilean',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(18,46,'Chinese',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(19,49,'Colombian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(20,55,'Croatian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(21,57,'Cuban',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(22,59,'Cypriot',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(23,60,'Czech',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(26,65,'Ecuadorian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(27,66,'Egyptian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(28,67,'Salvadorean',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(29,70,'Estonian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(30,71,'Ethiopian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(31,74,'Fijian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(33,76,'French',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(34,82,'Georgian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(36,83,'German',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(37,86,'Greek',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(38,91,'Guatemalan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(39,101,'Hungarian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(40,102,'Icelandic',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(41,103,'Indian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(42,104,'Indonesian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(43,105,'Iranian, Persian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(44,106,'Iraqi',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(45,107,'Irish',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(46,109,'Israeli',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(48,110,'Ivorian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(49,111,'Jamaican',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(50,112,'Japanese',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(51,114,'Jordanian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(52,115,'Kazakh, Kazakhstani',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(53,116,'Kenyan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(54,120,'Kuwaiti',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(55,121,'Laotian, Lao',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(56,121,'Latvian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(57,124,'Lebanese',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(58,127,'Libyan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(59,129,'Lithuanian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(60,132,'Madagascan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(61,135,'Malaysian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(62,144,'Mexican',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(63,148,'Mongolian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(64,151,'Moroccan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(65,152,'Mozambican',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(66,152,'Burmese',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(67,154,'Namibian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(68,156,'Nepalese, Nepali',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(70,159,'New Zealand',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(71,162,'Nigerian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(73,164,'Northern Irish',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(75,168,'Pakistani',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(76,170,'Palestinian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(77,173,'Paraguayan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(78,174,'Peruvian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(79,175,'Filipino',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(80,177,'Polish',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(81,178,'Portuguese',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(82,182,'Romanian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(83,182,'Russian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(84,195,'Saudi Arabian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(86,197,'Serbian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(87,200,'Singaporean',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(88,201,'Slovak, Slovakian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(89,202,'Slovenian, Slovene',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(90,204,'Somali, Somalian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(91,206,'South African',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(92,266,'South Korean',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(93,209,'Spanish',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(94,210,'Sri Lankan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(95,211,'Sudanese',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(96,214,'Swedish',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(97,215,'Swiss',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(98,267,'Syrian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(99,218,'Taiwanese',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(100,220,'Tanzanian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(101,221,'Thai',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(102,227,'Tunisian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(103,228,'Turkish',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(104,232,'Ugandan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(105,233,'Ukrainian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(106,235,'British',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(107,236,'American',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(108,238,'Uruguayan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(109,241,'Venezuelan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(110,242,'Vietnamese',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(112,247,'Yemeni, Yemenite',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(113,248,'Zambian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(114,249,'Zimbabwean',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(115,6,'Andorran',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(116,12,'Armenian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(117,16,'Azerbaijani',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(118,17,'Bahamian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(119,18,'Bahraini',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(120,20,'Barbadian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(121,23,'Belizean',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(122,24,'Beninese',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(123,27,'Bolivian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(124,29,'Bosnian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(126,253,'Bruneian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(130,38,'Cambodian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(131,39,'Cameroonian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(134,44,'Chadian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(136,54,'Costa Rican',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(138,256,'English',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(139,69,'Eritrean',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(140,80,'Gabonese',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(141,81,'Gambian',0,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(142,88,'Grenadian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(143,93,'Guinean',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(144,96,'Haitian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(146,99,'Honduran',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(149,126,'Liberian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(152,134,'Malawian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(153,136,'Maldivian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(154,137,'Malian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(155,138,'Maltese',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(156,141,'Mauritanian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(159,147,'Monégasque or Monacan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(161,160,'Nicaraguan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(164,167,'Omani',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(165,171,'Panamanian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(166,172,'Papua New Guinean or Guinean',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(167,175,'Philippine',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(168,180,'Qatari',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(169,184,'Rwandan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(170,196,'Senegalese',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(171,198,'Seychellois',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(172,199,'Sierra Leonian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(174,205,'Somali',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(175,219,'Tajik or Tadjik',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(176,225,'Togolese',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(177,226,'Trinidadian\nTobagan\nTobagonian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(178,229,'Turkmen or Turkoman',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(179,231,'Tuvaluan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(180,234,'UAE or Emirates (used attributively only, as in UAE buildings, Emirates holidays but not He is UAE, I am Emirates) or Emirati',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(182,240,'Vanuatuan',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(186,61,'Danish',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(187,62,'Djiboutian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(188,63,'Dominican',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(189,64,'Dominican',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(191,58,'Dutch',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(193,72,'British',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(194,75,'Finnish',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(195,77,'Guianese',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(196,78,'Polynesia',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(197,25,'Bermudian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(198,42,'African-Caucasian',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(199,43,'Central African Republic',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(200,47,'Christmas Island',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(201,48,'Cocos (Keeling) Islands',1,'2015-12-18 13:18:33','2015-12-18 13:18:33'),(203,68,'Equatorial Guinea',1,'2015-12-18 13:18:33','2015-12-18 13:18:33');
/*!40000 ALTER TABLE `nationalities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_attraction_addresses`
--

DROP TABLE IF EXISTS `order_attraction_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_attraction_addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `order_attraction_id` int(10) unsigned NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) DEFAULT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_attraction_addresses`
--

LOCK TABLES `order_attraction_addresses` WRITE;
/*!40000 ALTER TABLE `order_attraction_addresses` DISABLE KEYS */;
INSERT INTO `order_attraction_addresses` VALUES (1,1,1,'Blue Foods, Marine Lines(W)','Mumbai',103,'Maharashtra','sadsadsa da','400001',18.9431,72.8272,'2015-12-11 05:38:35','2016-01-18 09:22:37'),(2,2,2,'Blue Foods, Marine Lines(W)','Mumbai',103,'Maharashtra','sadsadsa da','400001',18.9431,72.8272,'2015-12-11 05:38:35','2016-01-18 11:05:05'),(3,3,3,'Blue Foods, Marine Lines(W)','Mumbai',103,'Maharashtra','sadsadsa da','400001',18.9431,72.8272,'2015-12-11 05:38:35','2016-01-21 10:52:49'),(4,4,4,'Blue Foods, Marine Lines(W)','Mumbai',103,'Maharashtra','sadsadsa da','400001',18.9431,72.8272,'2015-12-11 05:38:35','2016-01-21 13:31:22');
/*!40000 ALTER TABLE `order_attraction_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_attraction_closed_dates`
--

DROP TABLE IF EXISTS `order_attraction_closed_dates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_attraction_closed_dates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `order_attraction_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(45) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_attraction_closed_dates`
--

LOCK TABLES `order_attraction_closed_dates` WRITE;
/*!40000 ALTER TABLE `order_attraction_closed_dates` DISABLE KEYS */;
INSERT INTO `order_attraction_closed_dates` VALUES (1,1,1,'2016-01-26','No men power',1,'2016-01-12 07:06:53','2016-01-18 09:22:37'),(2,2,2,'2016-01-26','No men power',1,'2016-01-12 07:06:53','2016-01-18 11:05:05'),(3,3,3,'2016-01-26','No men power',1,'2016-01-12 07:06:53','2016-01-21 10:52:49'),(4,4,4,'2016-01-26','No men power',1,'2016-01-12 07:06:53','2016-01-21 13:31:22');
/*!40000 ALTER TABLE `order_attraction_closed_dates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_attraction_contacts`
--

DROP TABLE IF EXISTS `order_attraction_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_attraction_contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `order_attraction_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country_code` varchar(6) NOT NULL,
  `area_code` int(6) unsigned NOT NULL,
  `contact_no` bigint(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_attraction_contacts`
--

LOCK TABLES `order_attraction_contacts` WRITE;
/*!40000 ALTER TABLE `order_attraction_contacts` DISABLE KEYS */;
INSERT INTO `order_attraction_contacts` VALUES (1,1,1,'Deepak','adad@asdas.com','222222',4234234,3243423423,'2015-12-11 05:38:35','2016-01-18 09:22:37'),(2,2,2,'Deepak','adad@asdas.com','222222',4234234,3243423423,'2015-12-11 05:38:35','2016-01-18 11:05:05'),(3,3,3,'Deepak','adad@asdas.com','222222',4234234,3243423423,'2015-12-11 05:38:35','2016-01-21 10:52:49'),(4,4,4,'Deepak','adad@asdas.com','222222',4234234,3243423423,'2015-12-11 05:38:35','2016-01-21 13:31:22');
/*!40000 ALTER TABLE `order_attraction_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_attraction_product_pickup_points`
--

DROP TABLE IF EXISTS `order_attraction_product_pickup_points`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_attraction_product_pickup_points` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `order_attraction_product_id` int(10) unsigned NOT NULL,
  `pickup_point_type_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_attraction_product_pickup_points`
--

LOCK TABLES `order_attraction_product_pickup_points` WRITE;
/*!40000 ALTER TABLE `order_attraction_product_pickup_points` DISABLE KEYS */;
INSERT INTO `order_attraction_product_pickup_points` VALUES (1,4,4,1,'1',1,1,'2016-01-20 11:28:21','2016-01-21 13:31:22');
/*!40000 ALTER TABLE `order_attraction_product_pickup_points` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_attraction_product_price_groups`
--

DROP TABLE IF EXISTS `order_attraction_product_price_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_attraction_product_price_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `order_attraction_product_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `is_grouping_by_age` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If selected age_min, age_max will appear on screen & user can select the values in it',
  `age_min` int(3) unsigned DEFAULT NULL,
  `age_max` int(3) unsigned DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `currency_id` int(10) unsigned NOT NULL,
  `original_price` decimal(10,2) NOT NULL,
  `currency_conversion_rate` decimal(10,2) NOT NULL,
  `original_price_currency_id` int(10) unsigned NOT NULL,
  `original_price_before_discount` decimal(10,2) DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `discount_percentage` decimal(10,2) DEFAULT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `selling_price_currency_id` int(10) unsigned NOT NULL,
  `total_quantity` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_attraction_product_price_groups`
--

LOCK TABLES `order_attraction_product_price_groups` WRITE;
/*!40000 ALTER TABLE `order_attraction_product_price_groups` DISABLE KEYS */;
INSERT INTO `order_attraction_product_price_groups` VALUES (1,1,1,'Udipi Shri Krishna Boarding','Udipi Shri Krishna Boarding Description',1,1,50,1,67,1000.00,1.00,67,1000.00,100.00,10.00,900.00,67,'1','2015-12-14 05:03:34','2016-01-18 09:22:37'),(2,1,1,'Udipi Shri Krishna Boarding ','ff',1,4,4,1,67,14978.00,1.00,67,14978.00,300.00,2.00,14678.00,67,'1','2015-12-29 06:55:49','2016-01-18 09:22:37'),(3,2,2,'Udipi Shri Krishna Boarding','Udipi Shri Krishna Boarding Description',1,1,50,1,67,1000.00,1.00,67,1000.00,100.00,10.00,900.00,67,'1','2015-12-14 05:03:34','2016-01-18 11:05:05'),(4,2,2,'Udipi Shri Krishna Boarding ','ff',1,4,4,1,67,14978.00,1.00,67,14978.00,300.00,2.00,14678.00,67,'1','2015-12-29 06:55:49','2016-01-18 11:05:05'),(5,3,3,'Adult','Adult',1,1,50,1,67,2000.00,1.00,67,2000.00,200.00,10.00,1800.00,67,'2','2015-12-14 05:03:34','2016-01-21 10:52:49'),(6,3,3,'Child','Child',1,1,4,1,67,14978.00,1.00,67,14978.00,300.00,2.00,14678.00,67,'1','2015-12-29 06:55:49','2016-01-21 10:52:49'),(7,4,4,'Adult','Adult',0,8,8,1,67,40000.00,1.00,67,0.00,0.00,NULL,40000.00,67,'2','2015-12-18 13:06:25','2016-01-21 13:31:22'),(8,4,4,'Child','Child',1,20,30,1,67,5000.00,1.00,67,0.00,0.00,NULL,5000.00,67,'1','2016-01-02 06:15:33','2016-01-21 13:31:22');
/*!40000 ALTER TABLE `order_attraction_product_price_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_attraction_product_prices`
--

DROP TABLE IF EXISTS `order_attraction_product_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_attraction_product_prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `order_attraction_product_id` int(10) NOT NULL,
  `order_attraction_product_price_group_id` int(10) DEFAULT NULL,
  `supplier_id` int(10) NOT NULL,
  `nationality_id` int(10) unsigned DEFAULT NULL,
  `currency_id` int(10) unsigned NOT NULL,
  `original_price` decimal(10,2) NOT NULL,
  `total_quantity` int(10) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `max_quantity` int(10) NOT NULL,
  `max_product_booking_allowed_per_day` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_attraction_product_prices`
--

LOCK TABLES `order_attraction_product_prices` WRITE;
/*!40000 ALTER TABLE `order_attraction_product_prices` DISABLE KEYS */;
INSERT INTO `order_attraction_product_prices` VALUES (1,1,1,1,3,1,540,1000.00,0,'2016-01-05 16:33:00','2016-05-27 18:35:00',30,10,'2015-12-17 12:57:16','2016-01-18 09:22:37'),(2,1,1,2,3,1,541,14978.00,0,'2016-01-05 16:33:00','2016-05-27 18:35:00',55,1,'2016-01-04 09:46:16','2016-01-18 09:22:37'),(3,2,2,3,3,1,542,1000.00,0,'2016-01-05 16:33:00','2016-05-27 18:35:00',30,10,'2015-12-17 12:57:16','2016-01-18 11:05:05'),(4,2,2,4,3,1,543,14978.00,0,'2016-01-05 16:33:00','2016-05-27 18:35:00',55,1,'2016-01-04 09:46:16','2016-01-18 11:05:05'),(5,3,3,5,3,1,544,1000.00,0,'2016-01-20 16:01:00','2016-05-27 18:35:00',30,10,'2015-12-17 12:57:16','2016-01-21 10:52:49'),(6,3,3,6,3,1,545,14978.00,0,'2016-01-20 16:02:00','2016-05-31 18:35:00',55,1,'2016-01-04 09:46:16','2016-01-21 10:52:49'),(7,4,4,7,3,41,546,20000.00,0,'2016-01-07 19:39:00','2016-01-31 19:39:00',20,20,'2016-01-02 06:20:02','2016-01-07 14:09:50'),(8,4,4,8,3,41,547,5000.00,0,'2016-01-07 19:40:00','2016-05-27 18:35:00',10,10,'2016-01-02 06:40:04','2016-01-07 14:10:18');
/*!40000 ALTER TABLE `order_attraction_product_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_attraction_product_time_slots`
--

DROP TABLE IF EXISTS `order_attraction_product_time_slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_attraction_product_time_slots` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `order_attraction_product_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_attraction_product_time_slots`
--

LOCK TABLES `order_attraction_product_time_slots` WRITE;
/*!40000 ALTER TABLE `order_attraction_product_time_slots` DISABLE KEYS */;
INSERT INTO `order_attraction_product_time_slots` VALUES (1,1,1,'18:46','2015-12-17 13:16:50','2016-01-18 09:22:37'),(2,2,2,'18:46','2015-12-17 13:16:50','2016-01-18 11:05:05'),(3,3,3,'18:46','2015-12-17 13:16:50','2016-01-21 10:52:49'),(4,4,4,'09:00','2015-12-18 13:06:25','2016-01-21 13:31:22');
/*!40000 ALTER TABLE `order_attraction_product_time_slots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_attraction_products`
--

DROP TABLE IF EXISTS `order_attraction_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_attraction_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `order_attraction_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `includes` text NOT NULL,
  `excludes` text NOT NULL,
  `duration_id` int(10) unsigned NOT NULL COMMENT 'Ideal Time required to see the attraction',
  `currency_id` int(10) unsigned NOT NULL,
  `original_price` decimal(10,2) NOT NULL,
  `cancellation_policy` text COMMENT 'Cancellation Policy (refundable/ non refundable)\n',
  `availability` text,
  `safety_info` text,
  `other_rules` text,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_attraction_products`
--

LOCK TABLES `order_attraction_products` WRITE;
/*!40000 ALTER TABLE `order_attraction_products` DISABLE KEYS */;
INSERT INTO `order_attraction_products` VALUES (1,1,1,'Udipi Shri Krishna Boarding','Sydney Tower Eye is a must-do while in the city that takes you to the highest point above Sydney for breathtaking 360-degree views of our beautiful harbour city, including the Sydney Harbour Bridge and Sydney Opera House along with an amazing vista that stretches from the Sydney CBD out to the distant horizons of the Blue Mountains.<br>\n                <br>\n                Eighteen different binoculars will let you peer out to a distance of up to 100 kilometres in every direction or zoom in on a point of interest. From the golden beaches in the east to the distant Blue Mountains, youll be amazed by Sydneys best views.<br>\n                <br>\n                <strong>Meet Location:</strong> In front of Cinecitta at 663 Union Street, which is near the corner of Union and Columbus, in between Powell and Columbus Streets on Union, near Washington Square Park.<br><br>\n                <strong>Check in Time:</strong> 10 a.m. and 2 p.m.<br><br>\n                <strong>Itinerary:</strong> Explore North Beach/Little Italy\'s Foods & History Enjoy the best coffee and see how it is roasted Savor award-winning chocolates and see how the chocolates are made Enjoy fresh baked breads and watch breads bake in 130-year-old ovens Taste local olive oils and relish a variety of local pizza Explore the Beat Generation hangouts.<br><br>\n                <strong>Insider Tip:</strong> The tour is about 7-8 blocks<br><br>\n                <strong>What to Wear:</strong> Bring a light wind-breaker or jacket as San Francisco can get chilly even in the summer.','<ul>\n                      <li><span>Sydney Tower Eye Priority Access</span></li>\n                      <li><span>4D Cinema Experience</span></li>\n                      <li><span>SKYWALK</span></li>\n                    </ul>','<ul>\n                      <li><span>Meals and drinks</span></li>\n                      <li><span>Personal expenses</span></li>\n                      <li><span>Optional activities</span></li>\n                      <li><span>Tips and gratuities</span></li>\n                    </ul>',14,67,200.00,'No Refunds','Sunday, Monday, Thursday, Friday and Saturday at 10 a.m., 10:45 a.m., 11:30 a.m., 12:15 p.m., 1 p.m., 1:45 p.m., 2:30 p.m., 3:15 p.m.','','No Pets Allowed','2015-12-24 16:15:00','2016-05-27 18:35:00',1,'2015-12-17 10:45:31','2016-01-18 09:22:37'),(2,2,2,'Udipi Shri Krishna Boarding','Sydney Tower Eye is a must-do while in the city that takes you to the highest point above Sydney for breathtaking 360-degree views of our beautiful harbour city, including the Sydney Harbour Bridge and Sydney Opera House along with an amazing vista that stretches from the Sydney CBD out to the distant horizons of the Blue Mountains.<br>\n                <br>\n                Eighteen different binoculars will let you peer out to a distance of up to 100 kilometres in every direction or zoom in on a point of interest. From the golden beaches in the east to the distant Blue Mountains, youll be amazed by Sydneys best views.<br>\n                <br>\n                <strong>Meet Location:</strong> In front of Cinecitta at 663 Union Street, which is near the corner of Union and Columbus, in between Powell and Columbus Streets on Union, near Washington Square Park.<br><br>\n                <strong>Check in Time:</strong> 10 a.m. and 2 p.m.<br><br>\n                <strong>Itinerary:</strong> Explore North Beach/Little Italy\'s Foods & History Enjoy the best coffee and see how it is roasted Savor award-winning chocolates and see how the chocolates are made Enjoy fresh baked breads and watch breads bake in 130-year-old ovens Taste local olive oils and relish a variety of local pizza Explore the Beat Generation hangouts.<br><br>\n                <strong>Insider Tip:</strong> The tour is about 7-8 blocks<br><br>\n                <strong>What to Wear:</strong> Bring a light wind-breaker or jacket as San Francisco can get chilly even in the summer.','<ul>\n                      <li><span>Sydney Tower Eye Priority Access</span></li>\n                      <li><span>4D Cinema Experience</span></li>\n                      <li><span>SKYWALK</span></li>\n                    </ul>','<ul>\n                      <li><span>Meals and drinks</span></li>\n                      <li><span>Personal expenses</span></li>\n                      <li><span>Optional activities</span></li>\n                      <li><span>Tips and gratuities</span></li>\n                    </ul>',14,67,200.00,'No Refunds','Sunday, Monday, Thursday, Friday and Saturday at 10 a.m., 10:45 a.m., 11:30 a.m., 12:15 p.m., 1 p.m., 1:45 p.m., 2:30 p.m., 3:15 p.m.','','No Pets Allowed','2015-12-24 16:15:00','2016-05-27 18:35:00',1,'2015-12-17 10:45:31','2016-01-18 11:05:05'),(3,3,3,'Udipi Shri Krishna Boarding','Sydney Tower Eye is a must-do while in the city that takes you to the highest point above Sydney for breathtaking 360-degree views of our beautiful harbour city, including the Sydney Harbour Bridge and Sydney Opera House along with an amazing vista that stretches from the Sydney CBD out to the distant horizons of the Blue Mountains.<br>\n                <br>\n                Eighteen different binoculars will let you peer out to a distance of up to 100 kilometres in every direction or zoom in on a point of interest. From the golden beaches in the east to the distant Blue Mountains, youll be amazed by Sydneys best views.<br>\n                <br>\n                <strong>Meet Location:</strong> In front of Cinecitta at 663 Union Street, which is near the corner of Union and Columbus, in between Powell and Columbus Streets on Union, near Washington Square Park.<br><br>\n                <strong>Check in Time:</strong> 10 a.m. and 2 p.m.<br><br>\n                <strong>Itinerary:</strong> Explore North Beach/Little Italy\'s Foods & History Enjoy the best coffee and see how it is roasted Savor award-winning chocolates and see how the chocolates are made Enjoy fresh baked breads and watch breads bake in 130-year-old ovens Taste local olive oils and relish a variety of local pizza Explore the Beat Generation hangouts.<br><br>\n                <strong>Insider Tip:</strong> The tour is about 7-8 blocks<br><br>\n                <strong>What to Wear:</strong> Bring a light wind-breaker or jacket as San Francisco can get chilly even in the summer.','<ul>\n                      <li><span>Sydney Tower Eye Priority Access</span></li>\n                      <li><span>4D Cinema Experience</span></li>\n                      <li><span>SKYWALK</span></li>\n                    </ul>','<ul>\n                      <li><span>Meals and drinks</span></li>\n                      <li><span>Personal expenses</span></li>\n                      <li><span>Optional activities</span></li>\n                      <li><span>Tips and gratuities</span></li>\n                    </ul>',0,67,200.00,'No Refunds','Sunday, Monday, Thursday, Friday and Saturday at 10 a.m., 10:45 a.m., 11:30 a.m., 12:15 p.m., 1 p.m., 1:45 p.m., 2:30 p.m., 3:15 p.m.','','No Pets Allowed','2015-12-24 16:15:00','2016-05-27 18:35:00',1,'2015-12-17 10:45:31','2016-01-21 10:52:49'),(4,4,4,'Manis Lunch Home','<p>Sydney Tower Eye is a must-do while in the city that takes you to the highest point above Sydney for breathtaking 360-degree views of our beautiful harbour city, including the Sydney Harbour Bridge and Sydney Opera House along with an amazing vista that stretches from the Sydney CBD out to the distant horizons of the Blue Mountains.<br /> <br /> Eighteen different binoculars will let you peer out to a distance of up to 100 kilometres in every direction or zoom in on a point of interest. From the golden beaches in the east to the distant Blue Mountains, youll be amazed by Sydneys best views.<br /> <br /> <strong>Meet Location:</strong> In front of Cinecitta at 663 Union Street, which is near the corner of Union and Columbus, in between Powell and Columbus Streets on Union, near Washington Square Park.<br /><br /> <strong>Check in Time:</strong> 10 a.m. and 2 p.m.<br /><br /> <strong>Itinerary:</strong> Explore North Beach/Little Italy\'s Foods &amp; History Enjoy the best coffee and see how it is roasted Savor award-winning chocolates and see how the chocolates are made Enjoy fresh baked breads and watch breads bake in 130-year-old ovens Taste local olive oils and relish a variety of local pizza Explore the Beat Generation hangouts.<br /><br /> <strong>Insider Tip:</strong> The tour is about 7-8 blocks<br /><br /> <strong>What to Wear:</strong> Bring a light wind-breaker or jacket as San Francisco can get chilly even in the summer.</p>','<ul>\r\n<li>Sydney Tower Eye Priority Access</li>\r\n<li>4D Cinema Experience</li>\r\n<li>SKYWALK</li>\r\n</ul>','<ul>\r\n<li>Meals and drinks</li>\r\n<li>Personal expenses</li>\r\n<li>Optional activities</li>\r\n<li>Tips and gratuities</li>\r\n</ul>',0,67,100.00,'<p>Taste\'s Best. No Refund</p>','<p>Available 24/7</p>','<p>Credit And Debit Cards Accepted. No need to carry cash</p>','<p>Pets not Allowed</p>','2015-12-24 16:15:00','2016-05-27 18:35:00',1,'2015-12-18 13:06:25','2016-01-21 13:31:22');
/*!40000 ALTER TABLE `order_attraction_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_attraction_regular_timings`
--

DROP TABLE IF EXISTS `order_attraction_regular_timings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_attraction_regular_timings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `order_attraction_id` int(10) NOT NULL,
  `week_day_id` int(10) NOT NULL,
  `opening_time` time DEFAULT NULL,
  `closing_time` time DEFAULT NULL,
  `is_closed` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_attraction_regular_timings`
--

LOCK TABLES `order_attraction_regular_timings` WRITE;
/*!40000 ALTER TABLE `order_attraction_regular_timings` DISABLE KEYS */;
INSERT INTO `order_attraction_regular_timings` VALUES (1,1,1,1,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-18 09:22:37'),(2,1,1,2,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-18 09:22:37'),(3,1,1,3,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-18 09:22:37'),(4,1,1,4,'11:07:00','11:07:00',1,'2015-12-11 05:38:35','2016-01-18 09:22:37'),(5,1,1,5,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-18 09:22:37'),(6,1,1,6,'11:07:00','11:07:00',1,'2015-12-11 05:38:35','2016-01-18 09:22:37'),(7,1,1,7,'11:07:00','11:07:00',1,'2015-12-11 05:38:35','2016-01-18 09:22:37'),(8,2,2,1,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-18 11:05:05'),(9,2,2,2,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-18 11:05:05'),(10,2,2,3,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-18 11:05:05'),(11,2,2,4,'11:07:00','11:07:00',1,'2015-12-11 05:38:35','2016-01-18 11:05:05'),(12,2,2,5,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-18 11:05:05'),(13,2,2,6,'11:07:00','11:07:00',1,'2015-12-11 05:38:35','2016-01-18 11:05:05'),(14,2,2,7,'11:07:00','11:07:00',1,'2015-12-11 05:38:35','2016-01-18 11:05:05'),(15,3,3,1,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-21 10:52:49'),(16,3,3,2,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-21 10:52:49'),(17,3,3,3,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-21 10:52:49'),(18,3,3,4,'11:07:00','11:07:00',1,'2015-12-11 05:38:35','2016-01-21 10:52:49'),(19,3,3,5,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-21 10:52:49'),(20,3,3,6,'11:07:00','11:07:00',1,'2015-12-11 05:38:35','2016-01-21 10:52:49'),(21,3,3,7,'11:07:00','11:07:00',1,'2015-12-11 05:38:35','2016-01-21 10:52:49'),(22,4,4,1,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-21 13:31:22'),(23,4,4,2,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-21 13:31:22'),(24,4,4,3,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-21 13:31:22'),(25,4,4,4,'11:07:00','11:07:00',1,'2015-12-11 05:38:35','2016-01-21 13:31:22'),(26,4,4,5,'11:07:00','11:07:00',0,'2015-12-11 05:38:35','2016-01-21 13:31:22'),(27,4,4,6,'11:07:00','11:07:00',1,'2015-12-11 05:38:35','2016-01-21 13:31:22'),(28,4,4,7,'11:07:00','11:07:00',1,'2015-12-11 05:38:35','2016-01-21 13:31:22');
/*!40000 ALTER TABLE `order_attraction_regular_timings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_attractions`
--

DROP TABLE IF EXISTS `order_attractions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_attractions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'hidden',
  `order_id` int(10) unsigned NOT NULL COMMENT 'Order',
  `user_id` int(10) unsigned NOT NULL COMMENT 'Added By',
  `country_id` int(10) unsigned NOT NULL COMMENT 'Country',
  `destination_id` int(10) unsigned NOT NULL COMMENT 'Destination',
  `order_attraction_type_id` int(10) unsigned NOT NULL COMMENT 'Attraction Type',
  `title` varchar(255) NOT NULL COMMENT 'Title',
  `description` text NOT NULL,
  `highlights` text NOT NULL COMMENT 'Highlights',
  `includes` text NOT NULL COMMENT 'What you get',
  `excludes` text NOT NULL COMMENT 'What you don''t get',
  `validity` text NOT NULL COMMENT 'Validity',
  `cancellation_policy` text NOT NULL COMMENT 'Cancellation Policy',
  `important_points_to_be_noted` text NOT NULL COMMENT 'Important Points to be Noted',
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_attractions`
--

LOCK TABLES `order_attractions` WRITE;
/*!40000 ALTER TABLE `order_attractions` DISABLE KEYS */;
INSERT INTO `order_attractions` VALUES (1,1,3,103,1,3,'Scenic Dining Cruises','<p><strong>Indian cuisine</strong> encompasses a wide variety of regional cuisines native to <a title=\"India\" href=\"https://en.wikipedia.org/wiki/India\">India</a>. Given the range of diversity in soil type, climate, culture, ethnic group and occupations, these cuisines vary significantly from each other and use locally available <a title=\"Spice\" href=\"https://en.wikipedia.org/wiki/Spice\">spices</a>, <a title=\"Herb\" href=\"https://en.wikipedia.org/wiki/Herb\">herbs</a>, <a title=\"Vegetable\" href=\"https://en.wikipedia.org/wiki/Vegetable\">vegetables</a> and <a title=\"Fruit\" href=\"https://en.wikipedia.org/wiki/Fruit\">fruits</a>. Indian food is also heavily influenced by religious and cultural choices and traditions. There has also been <a class=\"mw-redirect\" title=\"Central Asian\" href=\"https://en.wikipedia.org/wiki/Central_Asian\">Central Asian</a> influence on <a title=\"North Indian cuisine\" href=\"https://en.wikipedia.org/wiki/North_Indian_cuisine\">North Indian cuisine</a> from the years of <a title=\"Mughal Empire\" href=\"https://en.wikipedia.org/wiki/Mughal_Empire\">Mughal</a> rule.<sup id=\"cite_ref-GestelandGesteland2010_2-0\" class=\"reference\"></sup> Indian cuisine has been and is still evolving, as a result of the nation\'s cultural interactions with other societies</p>','<p><a title=\"Staple food\" href=\"https://en.wikipedia.org/wiki/Staple_food\">Staple foods</a> of Indian cuisine include <a title=\"Pearl millet\" href=\"https://en.wikipedia.org/wiki/Pearl_millet\">pearl millet</a> (<em>bājra</em>), <a title=\"Rice\" href=\"https://en.wikipedia.org/wiki/Rice\">rice</a>, <a title=\"Whole-wheat flour\" href=\"https://en.wikipedia.org/wiki/Whole-wheat_flour\">whole-wheat flour</a> (<em>aṭṭa</em>), and a variety of <a title=\"Lentil\" href=\"https://en.wikipedia.org/wiki/Lentil\">lentils</a>, such as <em>masoor</em> (most often red <a title=\"Lentil\" href=\"https://en.wikipedia.org/wiki/Lentil\">lentils</a>), <em>toor</em> (<a title=\"Pigeon pea\" href=\"https://en.wikipedia.org/wiki/Pigeon_pea\">pigeon peas</a>), <em><a class=\"mw-redirect\" title=\"Urad (bean)\" href=\"https://en.wikipedia.org/wiki/Urad_%28bean%29\">urad</a></em> (black gram), and <em>mong</em> (<a title=\"Mung bean\" href=\"https://en.wikipedia.org/wiki/Mung_bean\">mung beans</a>). Lentils may be used whole, dehusked&mdash;for example, <em>dhuli moong</em> or <em>dhuli urad</em>&mdash;or split. Split lentils, or <em><a title=\"Dal\" href=\"https://en.wikipedia.org/wiki/Dal\">dal</a></em>, are used extensively. Some <a title=\"Pulse (legume)\" href=\"https://en.wikipedia.org/wiki/Pulse_%28legume%29\">pulses</a>, such as <em>channa</em> (<a title=\"Chickpea\" href=\"https://en.wikipedia.org/wiki/Chickpea\">chickpeas</a>), <em><a title=\"Rajma\" href=\"https://en.wikipedia.org/wiki/Rajma\">rajma</a></em> (<a title=\"Kidney bean\" href=\"https://en.wikipedia.org/wiki/Kidney_bean\">kidney beans</a>), and <em>lobiya</em> (<a title=\"Black-eyed pea\" href=\"https://en.wikipedia.org/wiki/Black-eyed_pea\">black-eyed peas</a>) are very common, especially in the northern regions. <em>Channa</em> and <em>moong</em> are also processed into flour (<em><a title=\"Gram flour\" href=\"https://en.wikipedia.org/wiki/Gram_flour\">besan</a></em>).</p>','<ul>\r\n<li>Many Indian dishes are cooked in <a title=\"Vegetable oil\" href=\"https://en.wikipedia.org/wiki/Vegetable_oil\">vegetable oil</a>, but <a title=\"Peanut oil\" href=\"https://en.wikipedia.org/wiki/Peanut_oil\">peanut oil</a> is popular in northern and western India, <a title=\"Mustard oil\" href=\"https://en.wikipedia.org/wiki/Mustard_oil\">mustard oil</a> in eastern India, and <a title=\"Coconut oil\" href=\"https://en.wikipedia.org/wiki/Coconut_oil\">coconut oil</a> along the western coast, especially in <a title=\"Kerala\" href=\"https://en.wikipedia.org/wiki/Kerala\">Kerala</a><sup>.</sup></li>\r\n<li><a title=\"Sesame oil\" href=\"https://en.wikipedia.org/wiki/Sesame_oil\"><em>Gingelly</em> (sesame) oil</a> is common in the south since it imparts a fragrant nutty aroma. In recent decades, <a title=\"Sunflower oil\" href=\"https://en.wikipedia.org/wiki/Sunflower_oil\">sunflower</a> and <a title=\"Soybean oil\" href=\"https://en.wikipedia.org/wiki/Soybean_oil\">soybean</a> oils have become popular across India.</li>\r\n<li><a title=\"Hydrogenation\" href=\"https://en.wikipedia.org/wiki/Hydrogenation\">Hydrogenated</a> vegetable oil, known as <em><a title=\"Vanaspati\" href=\"https://en.wikipedia.org/wiki/Vanaspati\">Vanaspati</a> ghee</em>, is another popular cooking medium. Butter-based <a title=\"Ghee\" href=\"https://en.wikipedia.org/wiki/Ghee\">ghee</a>, or <em>deshi ghee</em>, is used frequently, though less than in the past. Many types of meat are used for Indian cooking, but chicken and mutton tend to be the most commonly consumed meats.</li>\r\n<li>Fish and beef consumption are prevalent in some parts of India, but they are not widely consumed.</li>\r\n</ul>','<ul>\r\n<li>Cuisine differs across <a title=\"List of regions of India\" href=\"https://en.wikipedia.org/wiki/List_of_regions_of_India\">India\'s diverse regions</a> as a result of variation in local culture, geographical location (proximity to sea, desert, or mountains) and economics.</li>\r\n<li>It also varies seasonally, depending on which fruits and vegetables are ripe.</li>\r\n</ul>','<p>Always Avaliable</p>','<ul style=\"box-sizing: border-box; margin: 0px; border-radius: 0px !important; padding: 0px; color: #484848; font-family: \'Open Sans\', sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18.5714px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: border-box; border-radius: 0px !important; list-style-type: disc; margin: 0px 0px 0px 13px; padding: 5px 0px; font-size: 11px; color: #484848; line-height: 16px;\"><span style=\"box-sizing: border-box; border-radius: 0px !important; font-size: 13px;\">Free cancellation: 8 days prior to date of activity.</span></li>\r\n<li style=\"box-sizing: border-box; border-radius: 0px !important; list-style-type: disc; margin: 0px 0px 0px 13px; padding: 5px 0px; font-size: 11px; color: #484848; line-height: 16px;\"><span style=\"box-sizing: border-box; border-radius: 0px !important; font-size: 13px;\">20% Cancellation Fee (80% reimbursement): 4 to 7 days prior to date of activity.</span></li>\r\n<li style=\"box-sizing: border-box; border-radius: 0px !important; list-style-type: disc; margin: 0px 0px 0px 13px; padding: 5px 0px; font-size: 11px; color: #484848; line-height: 16px;\"><span style=\"box-sizing: border-box; border-radius: 0px !important; font-size: 13px;\">100% cancellation Fee (No reimbursement): Less than 4 days before the date of activity.</span></li>\r\n</ul>\r\n<p>&nbsp;</p>','<p>The most important and frequently used spices and flavourings in Indian cuisine are whole or powdered <a title=\"Chili pepper\" href=\"https://en.wikipedia.org/wiki/Chili_pepper\">chilli pepper</a> (<em>mirch</em>, <a title=\"Columbian Exchange\" href=\"https://en.wikipedia.org/wiki/Columbian_Exchange\">introduced by the Portuguese</a> from <a title=\"Mexico\" href=\"https://en.wikipedia.org/wiki/Mexico\">Mexico</a> in the 16th century), <a title=\"Brassica nigra\" href=\"https://en.wikipedia.org/wiki/Brassica_nigra\">black mustard</a> seed (<em>sarso</em>), <a title=\"Cardamom\" href=\"https://en.wikipedia.org/wiki/Cardamom\">cardamom</a> (<em>elaichi</em>), <a title=\"Cumin\" href=\"https://en.wikipedia.org/wiki/Cumin\">cumin</a> (<em>jeera</em>), <a title=\"Turmeric\" href=\"https://en.wikipedia.org/wiki/Turmeric\">turmeric</a> (<em>haldi</em>), <a title=\"Asafoetida\" href=\"https://en.wikipedia.org/wiki/Asafoetida\">asafoetida</a> (<em>hing</em>), <a title=\"Ginger\" href=\"https://en.wikipedia.org/wiki/Ginger\">ginger</a> (<em>adrak</em>), <a title=\"Coriander\" href=\"https://en.wikipedia.org/wiki/Coriander\">coriander</a> (<em>dhania</em>), and <a title=\"Garlic\" href=\"https://en.wikipedia.org/wiki/Garlic\">garlic</a> (<em>lasoon</em>). One popular <a title=\"Spice mix\" href=\"https://en.wikipedia.org/wiki/Spice_mix\">spice mix</a> is <em><a title=\"Garam masala\" href=\"https://en.wikipedia.org/wiki/Garam_masala\">garam masala</a></em>, a powder that typically includes five or more dried spices, especially <a title=\"Cardamom\" href=\"https://en.wikipedia.org/wiki/Cardamom\">cardamom</a>, <a title=\"Cinnamon\" href=\"https://en.wikipedia.org/wiki/Cinnamon\">cinnamon</a> (<em>dalchini</em>), and <a title=\"Clove\" href=\"https://en.wikipedia.org/wiki/Clove\">clove</a>.<sup id=\"cite_ref-Kelley2009_25-0\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/Indian_cuisine#cite_note-Kelley2009-25\">[25]</a></sup> Each culinary region has a distinctive <em>garam masala</em> blend&mdash;individual <a title=\"Chef\" href=\"https://en.wikipedia.org/wiki/Chef\">chefs</a> may also have their own. <em>Goda masala</em> is a comparable, though sweet, spice mix popular in <a title=\"Maharashtra\" href=\"https://en.wikipedia.org/wiki/Maharashtra\">Maharashtra</a>. Some leaves commonly used for flavouring include <a title=\"Bay leaf\" href=\"https://en.wikipedia.org/wiki/Bay_leaf\">bay leaves</a> (<em><a title=\"Cinnamomum tamala\" href=\"https://en.wikipedia.org/wiki/Cinnamomum_tamala\">tejpat</a></em>), <a title=\"Coriander\" href=\"https://en.wikipedia.org/wiki/Coriander\">coriander</a> leaves, <a title=\"Fenugreek\" href=\"https://en.wikipedia.org/wiki/Fenugreek\">fenugreek</a> leaves, and <a title=\"Mentha\" href=\"https://en.wikipedia.org/wiki/Mentha\">mint</a> leaves. The use of <a title=\"Curry tree\" href=\"https://en.wikipedia.org/wiki/Curry_tree\">curry</a> leaves and roots for flavouring is typical of <a title=\"Gujarati cuisine\" href=\"https://en.wikipedia.org/wiki/Gujarati_cuisine\">Gujarati</a> and <a title=\"South Indian cuisine\" href=\"https://en.wikipedia.org/wiki/South_Indian_cuisine\">South Indian cuisine</a>. Sweet dishes are often seasoned with <a title=\"Cardamom\" href=\"https://en.wikipedia.org/wiki/Cardamom\">cardamom</a>, <a title=\"Saffron\" href=\"https://en.wikipedia.org/wiki/Saffron\">saffron</a>, <a title=\"Nutmeg\" href=\"https://en.wikipedia.org/wiki/Nutmeg\">nutmeg</a> and <a title=\"Rose\" href=\"https://en.wikipedia.org/wiki/Rose\">rose</a> petal essences.</p>','2016-01-10 00:00:00','2016-05-27 18:35:00',1,'2015-12-11 05:38:35','2016-01-18 09:22:37'),(2,2,3,103,1,3,'Scenic Dining Cruises','<p><strong>Indian cuisine</strong> encompasses a wide variety of regional cuisines native to <a title=\"India\" href=\"https://en.wikipedia.org/wiki/India\">India</a>. Given the range of diversity in soil type, climate, culture, ethnic group and occupations, these cuisines vary significantly from each other and use locally available <a title=\"Spice\" href=\"https://en.wikipedia.org/wiki/Spice\">spices</a>, <a title=\"Herb\" href=\"https://en.wikipedia.org/wiki/Herb\">herbs</a>, <a title=\"Vegetable\" href=\"https://en.wikipedia.org/wiki/Vegetable\">vegetables</a> and <a title=\"Fruit\" href=\"https://en.wikipedia.org/wiki/Fruit\">fruits</a>. Indian food is also heavily influenced by religious and cultural choices and traditions. There has also been <a class=\"mw-redirect\" title=\"Central Asian\" href=\"https://en.wikipedia.org/wiki/Central_Asian\">Central Asian</a> influence on <a title=\"North Indian cuisine\" href=\"https://en.wikipedia.org/wiki/North_Indian_cuisine\">North Indian cuisine</a> from the years of <a title=\"Mughal Empire\" href=\"https://en.wikipedia.org/wiki/Mughal_Empire\">Mughal</a> rule.<sup id=\"cite_ref-GestelandGesteland2010_2-0\" class=\"reference\"></sup> Indian cuisine has been and is still evolving, as a result of the nation\'s cultural interactions with other societies</p>','<p><a title=\"Staple food\" href=\"https://en.wikipedia.org/wiki/Staple_food\">Staple foods</a> of Indian cuisine include <a title=\"Pearl millet\" href=\"https://en.wikipedia.org/wiki/Pearl_millet\">pearl millet</a> (<em>bājra</em>), <a title=\"Rice\" href=\"https://en.wikipedia.org/wiki/Rice\">rice</a>, <a title=\"Whole-wheat flour\" href=\"https://en.wikipedia.org/wiki/Whole-wheat_flour\">whole-wheat flour</a> (<em>aṭṭa</em>), and a variety of <a title=\"Lentil\" href=\"https://en.wikipedia.org/wiki/Lentil\">lentils</a>, such as <em>masoor</em> (most often red <a title=\"Lentil\" href=\"https://en.wikipedia.org/wiki/Lentil\">lentils</a>), <em>toor</em> (<a title=\"Pigeon pea\" href=\"https://en.wikipedia.org/wiki/Pigeon_pea\">pigeon peas</a>), <em><a class=\"mw-redirect\" title=\"Urad (bean)\" href=\"https://en.wikipedia.org/wiki/Urad_%28bean%29\">urad</a></em> (black gram), and <em>mong</em> (<a title=\"Mung bean\" href=\"https://en.wikipedia.org/wiki/Mung_bean\">mung beans</a>). Lentils may be used whole, dehusked&mdash;for example, <em>dhuli moong</em> or <em>dhuli urad</em>&mdash;or split. Split lentils, or <em><a title=\"Dal\" href=\"https://en.wikipedia.org/wiki/Dal\">dal</a></em>, are used extensively. Some <a title=\"Pulse (legume)\" href=\"https://en.wikipedia.org/wiki/Pulse_%28legume%29\">pulses</a>, such as <em>channa</em> (<a title=\"Chickpea\" href=\"https://en.wikipedia.org/wiki/Chickpea\">chickpeas</a>), <em><a title=\"Rajma\" href=\"https://en.wikipedia.org/wiki/Rajma\">rajma</a></em> (<a title=\"Kidney bean\" href=\"https://en.wikipedia.org/wiki/Kidney_bean\">kidney beans</a>), and <em>lobiya</em> (<a title=\"Black-eyed pea\" href=\"https://en.wikipedia.org/wiki/Black-eyed_pea\">black-eyed peas</a>) are very common, especially in the northern regions. <em>Channa</em> and <em>moong</em> are also processed into flour (<em><a title=\"Gram flour\" href=\"https://en.wikipedia.org/wiki/Gram_flour\">besan</a></em>).</p>','<ul>\r\n<li>Many Indian dishes are cooked in <a title=\"Vegetable oil\" href=\"https://en.wikipedia.org/wiki/Vegetable_oil\">vegetable oil</a>, but <a title=\"Peanut oil\" href=\"https://en.wikipedia.org/wiki/Peanut_oil\">peanut oil</a> is popular in northern and western India, <a title=\"Mustard oil\" href=\"https://en.wikipedia.org/wiki/Mustard_oil\">mustard oil</a> in eastern India, and <a title=\"Coconut oil\" href=\"https://en.wikipedia.org/wiki/Coconut_oil\">coconut oil</a> along the western coast, especially in <a title=\"Kerala\" href=\"https://en.wikipedia.org/wiki/Kerala\">Kerala</a><sup>.</sup></li>\r\n<li><a title=\"Sesame oil\" href=\"https://en.wikipedia.org/wiki/Sesame_oil\"><em>Gingelly</em> (sesame) oil</a> is common in the south since it imparts a fragrant nutty aroma. In recent decades, <a title=\"Sunflower oil\" href=\"https://en.wikipedia.org/wiki/Sunflower_oil\">sunflower</a> and <a title=\"Soybean oil\" href=\"https://en.wikipedia.org/wiki/Soybean_oil\">soybean</a> oils have become popular across India.</li>\r\n<li><a title=\"Hydrogenation\" href=\"https://en.wikipedia.org/wiki/Hydrogenation\">Hydrogenated</a> vegetable oil, known as <em><a title=\"Vanaspati\" href=\"https://en.wikipedia.org/wiki/Vanaspati\">Vanaspati</a> ghee</em>, is another popular cooking medium. Butter-based <a title=\"Ghee\" href=\"https://en.wikipedia.org/wiki/Ghee\">ghee</a>, or <em>deshi ghee</em>, is used frequently, though less than in the past. Many types of meat are used for Indian cooking, but chicken and mutton tend to be the most commonly consumed meats.</li>\r\n<li>Fish and beef consumption are prevalent in some parts of India, but they are not widely consumed.</li>\r\n</ul>','<ul>\r\n<li>Cuisine differs across <a title=\"List of regions of India\" href=\"https://en.wikipedia.org/wiki/List_of_regions_of_India\">India\'s diverse regions</a> as a result of variation in local culture, geographical location (proximity to sea, desert, or mountains) and economics.</li>\r\n<li>It also varies seasonally, depending on which fruits and vegetables are ripe.</li>\r\n</ul>','<p>Always Avaliable</p>','<ul style=\"box-sizing: border-box; margin: 0px; border-radius: 0px !important; padding: 0px; color: #484848; font-family: \'Open Sans\', sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18.5714px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: border-box; border-radius: 0px !important; list-style-type: disc; margin: 0px 0px 0px 13px; padding: 5px 0px; font-size: 11px; color: #484848; line-height: 16px;\"><span style=\"box-sizing: border-box; border-radius: 0px !important; font-size: 13px;\">Free cancellation: 8 days prior to date of activity.</span></li>\r\n<li style=\"box-sizing: border-box; border-radius: 0px !important; list-style-type: disc; margin: 0px 0px 0px 13px; padding: 5px 0px; font-size: 11px; color: #484848; line-height: 16px;\"><span style=\"box-sizing: border-box; border-radius: 0px !important; font-size: 13px;\">20% Cancellation Fee (80% reimbursement): 4 to 7 days prior to date of activity.</span></li>\r\n<li style=\"box-sizing: border-box; border-radius: 0px !important; list-style-type: disc; margin: 0px 0px 0px 13px; padding: 5px 0px; font-size: 11px; color: #484848; line-height: 16px;\"><span style=\"box-sizing: border-box; border-radius: 0px !important; font-size: 13px;\">100% cancellation Fee (No reimbursement): Less than 4 days before the date of activity.</span></li>\r\n</ul>\r\n<p>&nbsp;</p>','<p>The most important and frequently used spices and flavourings in Indian cuisine are whole or powdered <a title=\"Chili pepper\" href=\"https://en.wikipedia.org/wiki/Chili_pepper\">chilli pepper</a> (<em>mirch</em>, <a title=\"Columbian Exchange\" href=\"https://en.wikipedia.org/wiki/Columbian_Exchange\">introduced by the Portuguese</a> from <a title=\"Mexico\" href=\"https://en.wikipedia.org/wiki/Mexico\">Mexico</a> in the 16th century), <a title=\"Brassica nigra\" href=\"https://en.wikipedia.org/wiki/Brassica_nigra\">black mustard</a> seed (<em>sarso</em>), <a title=\"Cardamom\" href=\"https://en.wikipedia.org/wiki/Cardamom\">cardamom</a> (<em>elaichi</em>), <a title=\"Cumin\" href=\"https://en.wikipedia.org/wiki/Cumin\">cumin</a> (<em>jeera</em>), <a title=\"Turmeric\" href=\"https://en.wikipedia.org/wiki/Turmeric\">turmeric</a> (<em>haldi</em>), <a title=\"Asafoetida\" href=\"https://en.wikipedia.org/wiki/Asafoetida\">asafoetida</a> (<em>hing</em>), <a title=\"Ginger\" href=\"https://en.wikipedia.org/wiki/Ginger\">ginger</a> (<em>adrak</em>), <a title=\"Coriander\" href=\"https://en.wikipedia.org/wiki/Coriander\">coriander</a> (<em>dhania</em>), and <a title=\"Garlic\" href=\"https://en.wikipedia.org/wiki/Garlic\">garlic</a> (<em>lasoon</em>). One popular <a title=\"Spice mix\" href=\"https://en.wikipedia.org/wiki/Spice_mix\">spice mix</a> is <em><a title=\"Garam masala\" href=\"https://en.wikipedia.org/wiki/Garam_masala\">garam masala</a></em>, a powder that typically includes five or more dried spices, especially <a title=\"Cardamom\" href=\"https://en.wikipedia.org/wiki/Cardamom\">cardamom</a>, <a title=\"Cinnamon\" href=\"https://en.wikipedia.org/wiki/Cinnamon\">cinnamon</a> (<em>dalchini</em>), and <a title=\"Clove\" href=\"https://en.wikipedia.org/wiki/Clove\">clove</a>.<sup id=\"cite_ref-Kelley2009_25-0\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/Indian_cuisine#cite_note-Kelley2009-25\">[25]</a></sup> Each culinary region has a distinctive <em>garam masala</em> blend&mdash;individual <a title=\"Chef\" href=\"https://en.wikipedia.org/wiki/Chef\">chefs</a> may also have their own. <em>Goda masala</em> is a comparable, though sweet, spice mix popular in <a title=\"Maharashtra\" href=\"https://en.wikipedia.org/wiki/Maharashtra\">Maharashtra</a>. Some leaves commonly used for flavouring include <a title=\"Bay leaf\" href=\"https://en.wikipedia.org/wiki/Bay_leaf\">bay leaves</a> (<em><a title=\"Cinnamomum tamala\" href=\"https://en.wikipedia.org/wiki/Cinnamomum_tamala\">tejpat</a></em>), <a title=\"Coriander\" href=\"https://en.wikipedia.org/wiki/Coriander\">coriander</a> leaves, <a title=\"Fenugreek\" href=\"https://en.wikipedia.org/wiki/Fenugreek\">fenugreek</a> leaves, and <a title=\"Mentha\" href=\"https://en.wikipedia.org/wiki/Mentha\">mint</a> leaves. The use of <a title=\"Curry tree\" href=\"https://en.wikipedia.org/wiki/Curry_tree\">curry</a> leaves and roots for flavouring is typical of <a title=\"Gujarati cuisine\" href=\"https://en.wikipedia.org/wiki/Gujarati_cuisine\">Gujarati</a> and <a title=\"South Indian cuisine\" href=\"https://en.wikipedia.org/wiki/South_Indian_cuisine\">South Indian cuisine</a>. Sweet dishes are often seasoned with <a title=\"Cardamom\" href=\"https://en.wikipedia.org/wiki/Cardamom\">cardamom</a>, <a title=\"Saffron\" href=\"https://en.wikipedia.org/wiki/Saffron\">saffron</a>, <a title=\"Nutmeg\" href=\"https://en.wikipedia.org/wiki/Nutmeg\">nutmeg</a> and <a title=\"Rose\" href=\"https://en.wikipedia.org/wiki/Rose\">rose</a> petal essences.</p>','2016-01-10 00:00:00','2016-05-27 18:35:00',1,'2015-12-11 05:38:35','2016-01-18 11:05:05'),(3,3,3,103,1,3,'Scenic Dining Cruises','<p><strong>Indian cuisine</strong> encompasses a wide variety of regional cuisines native to <a title=\"India\" href=\"https://en.wikipedia.org/wiki/India\">India</a>. Given the range of diversity in soil type, climate, culture, ethnic group and occupations, these cuisines vary significantly from each other and use locally available <a title=\"Spice\" href=\"https://en.wikipedia.org/wiki/Spice\">spices</a>, <a title=\"Herb\" href=\"https://en.wikipedia.org/wiki/Herb\">herbs</a>, <a title=\"Vegetable\" href=\"https://en.wikipedia.org/wiki/Vegetable\">vegetables</a> and <a title=\"Fruit\" href=\"https://en.wikipedia.org/wiki/Fruit\">fruits</a>. Indian food is also heavily influenced by religious and cultural choices and traditions. There has also been <a class=\"mw-redirect\" title=\"Central Asian\" href=\"https://en.wikipedia.org/wiki/Central_Asian\">Central Asian</a> influence on <a title=\"North Indian cuisine\" href=\"https://en.wikipedia.org/wiki/North_Indian_cuisine\">North Indian cuisine</a> from the years of <a title=\"Mughal Empire\" href=\"https://en.wikipedia.org/wiki/Mughal_Empire\">Mughal</a> rule.<sup id=\"cite_ref-GestelandGesteland2010_2-0\" class=\"reference\"></sup> Indian cuisine has been and is still evolving, as a result of the nation\'s cultural interactions with other societies</p>','<p><a title=\"Staple food\" href=\"https://en.wikipedia.org/wiki/Staple_food\">Staple foods</a> of Indian cuisine include <a title=\"Pearl millet\" href=\"https://en.wikipedia.org/wiki/Pearl_millet\">pearl millet</a> (<em>bājra</em>), <a title=\"Rice\" href=\"https://en.wikipedia.org/wiki/Rice\">rice</a>, <a title=\"Whole-wheat flour\" href=\"https://en.wikipedia.org/wiki/Whole-wheat_flour\">whole-wheat flour</a> (<em>aṭṭa</em>), and a variety of <a title=\"Lentil\" href=\"https://en.wikipedia.org/wiki/Lentil\">lentils</a>, such as <em>masoor</em> (most often red <a title=\"Lentil\" href=\"https://en.wikipedia.org/wiki/Lentil\">lentils</a>), <em>toor</em> (<a title=\"Pigeon pea\" href=\"https://en.wikipedia.org/wiki/Pigeon_pea\">pigeon peas</a>), <em><a class=\"mw-redirect\" title=\"Urad (bean)\" href=\"https://en.wikipedia.org/wiki/Urad_%28bean%29\">urad</a></em> (black gram), and <em>mong</em> (<a title=\"Mung bean\" href=\"https://en.wikipedia.org/wiki/Mung_bean\">mung beans</a>). Lentils may be used whole, dehusked&mdash;for example, <em>dhuli moong</em> or <em>dhuli urad</em>&mdash;or split. Split lentils, or <em><a title=\"Dal\" href=\"https://en.wikipedia.org/wiki/Dal\">dal</a></em>, are used extensively. Some <a title=\"Pulse (legume)\" href=\"https://en.wikipedia.org/wiki/Pulse_%28legume%29\">pulses</a>, such as <em>channa</em> (<a title=\"Chickpea\" href=\"https://en.wikipedia.org/wiki/Chickpea\">chickpeas</a>), <em><a title=\"Rajma\" href=\"https://en.wikipedia.org/wiki/Rajma\">rajma</a></em> (<a title=\"Kidney bean\" href=\"https://en.wikipedia.org/wiki/Kidney_bean\">kidney beans</a>), and <em>lobiya</em> (<a title=\"Black-eyed pea\" href=\"https://en.wikipedia.org/wiki/Black-eyed_pea\">black-eyed peas</a>) are very common, especially in the northern regions. <em>Channa</em> and <em>moong</em> are also processed into flour (<em><a title=\"Gram flour\" href=\"https://en.wikipedia.org/wiki/Gram_flour\">besan</a></em>).</p>','<ul>\r\n<li>Many Indian dishes are cooked in <a title=\"Vegetable oil\" href=\"https://en.wikipedia.org/wiki/Vegetable_oil\">vegetable oil</a>, but <a title=\"Peanut oil\" href=\"https://en.wikipedia.org/wiki/Peanut_oil\">peanut oil</a> is popular in northern and western India, <a title=\"Mustard oil\" href=\"https://en.wikipedia.org/wiki/Mustard_oil\">mustard oil</a> in eastern India, and <a title=\"Coconut oil\" href=\"https://en.wikipedia.org/wiki/Coconut_oil\">coconut oil</a> along the western coast, especially in <a title=\"Kerala\" href=\"https://en.wikipedia.org/wiki/Kerala\">Kerala</a><sup>.</sup></li>\r\n<li><a title=\"Sesame oil\" href=\"https://en.wikipedia.org/wiki/Sesame_oil\"><em>Gingelly</em> (sesame) oil</a> is common in the south since it imparts a fragrant nutty aroma. In recent decades, <a title=\"Sunflower oil\" href=\"https://en.wikipedia.org/wiki/Sunflower_oil\">sunflower</a> and <a title=\"Soybean oil\" href=\"https://en.wikipedia.org/wiki/Soybean_oil\">soybean</a> oils have become popular across India.</li>\r\n<li><a title=\"Hydrogenation\" href=\"https://en.wikipedia.org/wiki/Hydrogenation\">Hydrogenated</a> vegetable oil, known as <em><a title=\"Vanaspati\" href=\"https://en.wikipedia.org/wiki/Vanaspati\">Vanaspati</a> ghee</em>, is another popular cooking medium. Butter-based <a title=\"Ghee\" href=\"https://en.wikipedia.org/wiki/Ghee\">ghee</a>, or <em>deshi ghee</em>, is used frequently, though less than in the past. Many types of meat are used for Indian cooking, but chicken and mutton tend to be the most commonly consumed meats.</li>\r\n<li>Fish and beef consumption are prevalent in some parts of India, but they are not widely consumed.</li>\r\n</ul>','<ul>\r\n<li>Cuisine differs across <a title=\"List of regions of India\" href=\"https://en.wikipedia.org/wiki/List_of_regions_of_India\">India\'s diverse regions</a> as a result of variation in local culture, geographical location (proximity to sea, desert, or mountains) and economics.</li>\r\n<li>It also varies seasonally, depending on which fruits and vegetables are ripe.</li>\r\n</ul>','<p>Always Avaliable</p>','<ul style=\"box-sizing: border-box; margin: 0px; border-radius: 0px !important; padding: 0px; color: #484848; font-family: \'Open Sans\', sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18.5714px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: border-box; border-radius: 0px !important; list-style-type: disc; margin: 0px 0px 0px 13px; padding: 5px 0px; font-size: 11px; color: #484848; line-height: 16px;\"><span style=\"box-sizing: border-box; border-radius: 0px !important; font-size: 13px;\">Free cancellation: 8 days prior to date of activity.</span></li>\r\n<li style=\"box-sizing: border-box; border-radius: 0px !important; list-style-type: disc; margin: 0px 0px 0px 13px; padding: 5px 0px; font-size: 11px; color: #484848; line-height: 16px;\"><span style=\"box-sizing: border-box; border-radius: 0px !important; font-size: 13px;\">20% Cancellation Fee (80% reimbursement): 4 to 7 days prior to date of activity.</span></li>\r\n<li style=\"box-sizing: border-box; border-radius: 0px !important; list-style-type: disc; margin: 0px 0px 0px 13px; padding: 5px 0px; font-size: 11px; color: #484848; line-height: 16px;\"><span style=\"box-sizing: border-box; border-radius: 0px !important; font-size: 13px;\">100% cancellation Fee (No reimbursement): Less than 4 days before the date of activity.</span></li>\r\n</ul>\r\n<p>&nbsp;</p>','<p>The most important and frequently used spices and flavourings in Indian cuisine are whole or powdered <a title=\"Chili pepper\" href=\"https://en.wikipedia.org/wiki/Chili_pepper\">chilli pepper</a> (<em>mirch</em>, <a title=\"Columbian Exchange\" href=\"https://en.wikipedia.org/wiki/Columbian_Exchange\">introduced by the Portuguese</a> from <a title=\"Mexico\" href=\"https://en.wikipedia.org/wiki/Mexico\">Mexico</a> in the 16th century), <a title=\"Brassica nigra\" href=\"https://en.wikipedia.org/wiki/Brassica_nigra\">black mustard</a> seed (<em>sarso</em>), <a title=\"Cardamom\" href=\"https://en.wikipedia.org/wiki/Cardamom\">cardamom</a> (<em>elaichi</em>), <a title=\"Cumin\" href=\"https://en.wikipedia.org/wiki/Cumin\">cumin</a> (<em>jeera</em>), <a title=\"Turmeric\" href=\"https://en.wikipedia.org/wiki/Turmeric\">turmeric</a> (<em>haldi</em>), <a title=\"Asafoetida\" href=\"https://en.wikipedia.org/wiki/Asafoetida\">asafoetida</a> (<em>hing</em>), <a title=\"Ginger\" href=\"https://en.wikipedia.org/wiki/Ginger\">ginger</a> (<em>adrak</em>), <a title=\"Coriander\" href=\"https://en.wikipedia.org/wiki/Coriander\">coriander</a> (<em>dhania</em>), and <a title=\"Garlic\" href=\"https://en.wikipedia.org/wiki/Garlic\">garlic</a> (<em>lasoon</em>). One popular <a title=\"Spice mix\" href=\"https://en.wikipedia.org/wiki/Spice_mix\">spice mix</a> is <em><a title=\"Garam masala\" href=\"https://en.wikipedia.org/wiki/Garam_masala\">garam masala</a></em>, a powder that typically includes five or more dried spices, especially <a title=\"Cardamom\" href=\"https://en.wikipedia.org/wiki/Cardamom\">cardamom</a>, <a title=\"Cinnamon\" href=\"https://en.wikipedia.org/wiki/Cinnamon\">cinnamon</a> (<em>dalchini</em>), and <a title=\"Clove\" href=\"https://en.wikipedia.org/wiki/Clove\">clove</a>.<sup id=\"cite_ref-Kelley2009_25-0\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/Indian_cuisine#cite_note-Kelley2009-25\">[25]</a></sup> Each culinary region has a distinctive <em>garam masala</em> blend&mdash;individual <a title=\"Chef\" href=\"https://en.wikipedia.org/wiki/Chef\">chefs</a> may also have their own. <em>Goda masala</em> is a comparable, though sweet, spice mix popular in <a title=\"Maharashtra\" href=\"https://en.wikipedia.org/wiki/Maharashtra\">Maharashtra</a>. Some leaves commonly used for flavouring include <a title=\"Bay leaf\" href=\"https://en.wikipedia.org/wiki/Bay_leaf\">bay leaves</a> (<em><a title=\"Cinnamomum tamala\" href=\"https://en.wikipedia.org/wiki/Cinnamomum_tamala\">tejpat</a></em>), <a title=\"Coriander\" href=\"https://en.wikipedia.org/wiki/Coriander\">coriander</a> leaves, <a title=\"Fenugreek\" href=\"https://en.wikipedia.org/wiki/Fenugreek\">fenugreek</a> leaves, and <a title=\"Mentha\" href=\"https://en.wikipedia.org/wiki/Mentha\">mint</a> leaves. The use of <a title=\"Curry tree\" href=\"https://en.wikipedia.org/wiki/Curry_tree\">curry</a> leaves and roots for flavouring is typical of <a title=\"Gujarati cuisine\" href=\"https://en.wikipedia.org/wiki/Gujarati_cuisine\">Gujarati</a> and <a title=\"South Indian cuisine\" href=\"https://en.wikipedia.org/wiki/South_Indian_cuisine\">South Indian cuisine</a>. Sweet dishes are often seasoned with <a title=\"Cardamom\" href=\"https://en.wikipedia.org/wiki/Cardamom\">cardamom</a>, <a title=\"Saffron\" href=\"https://en.wikipedia.org/wiki/Saffron\">saffron</a>, <a title=\"Nutmeg\" href=\"https://en.wikipedia.org/wiki/Nutmeg\">nutmeg</a> and <a title=\"Rose\" href=\"https://en.wikipedia.org/wiki/Rose\">rose</a> petal essences.</p>','2015-12-24 16:15:00','2016-05-27 18:35:00',1,'2015-12-11 05:38:35','2016-01-21 10:52:49'),(4,4,3,103,1,3,'Scenic Dining Cruises','<p><strong>Indian cuisine</strong> encompasses a wide variety of regional cuisines native to <a title=\"India\" href=\"https://en.wikipedia.org/wiki/India\">India</a>. Given the range of diversity in soil type, climate, culture, ethnic group and occupations, these cuisines vary significantly from each other and use locally available <a title=\"Spice\" href=\"https://en.wikipedia.org/wiki/Spice\">spices</a>, <a title=\"Herb\" href=\"https://en.wikipedia.org/wiki/Herb\">herbs</a>, <a title=\"Vegetable\" href=\"https://en.wikipedia.org/wiki/Vegetable\">vegetables</a> and <a title=\"Fruit\" href=\"https://en.wikipedia.org/wiki/Fruit\">fruits</a>. Indian food is also heavily influenced by religious and cultural choices and traditions. There has also been <a class=\"mw-redirect\" title=\"Central Asian\" href=\"https://en.wikipedia.org/wiki/Central_Asian\">Central Asian</a> influence on <a title=\"North Indian cuisine\" href=\"https://en.wikipedia.org/wiki/North_Indian_cuisine\">North Indian cuisine</a> from the years of <a title=\"Mughal Empire\" href=\"https://en.wikipedia.org/wiki/Mughal_Empire\">Mughal</a> rule.<sup id=\"cite_ref-GestelandGesteland2010_2-0\" class=\"reference\"></sup> Indian cuisine has been and is still evolving, as a result of the nation\'s cultural interactions with other societies</p>','<p><a title=\"Staple food\" href=\"https://en.wikipedia.org/wiki/Staple_food\">Staple foods</a> of Indian cuisine include <a title=\"Pearl millet\" href=\"https://en.wikipedia.org/wiki/Pearl_millet\">pearl millet</a> (<em>bājra</em>), <a title=\"Rice\" href=\"https://en.wikipedia.org/wiki/Rice\">rice</a>, <a title=\"Whole-wheat flour\" href=\"https://en.wikipedia.org/wiki/Whole-wheat_flour\">whole-wheat flour</a> (<em>aṭṭa</em>), and a variety of <a title=\"Lentil\" href=\"https://en.wikipedia.org/wiki/Lentil\">lentils</a>, such as <em>masoor</em> (most often red <a title=\"Lentil\" href=\"https://en.wikipedia.org/wiki/Lentil\">lentils</a>), <em>toor</em> (<a title=\"Pigeon pea\" href=\"https://en.wikipedia.org/wiki/Pigeon_pea\">pigeon peas</a>), <em><a class=\"mw-redirect\" title=\"Urad (bean)\" href=\"https://en.wikipedia.org/wiki/Urad_%28bean%29\">urad</a></em> (black gram), and <em>mong</em> (<a title=\"Mung bean\" href=\"https://en.wikipedia.org/wiki/Mung_bean\">mung beans</a>). Lentils may be used whole, dehusked&mdash;for example, <em>dhuli moong</em> or <em>dhuli urad</em>&mdash;or split. Split lentils, or <em><a title=\"Dal\" href=\"https://en.wikipedia.org/wiki/Dal\">dal</a></em>, are used extensively. Some <a title=\"Pulse (legume)\" href=\"https://en.wikipedia.org/wiki/Pulse_%28legume%29\">pulses</a>, such as <em>channa</em> (<a title=\"Chickpea\" href=\"https://en.wikipedia.org/wiki/Chickpea\">chickpeas</a>), <em><a title=\"Rajma\" href=\"https://en.wikipedia.org/wiki/Rajma\">rajma</a></em> (<a title=\"Kidney bean\" href=\"https://en.wikipedia.org/wiki/Kidney_bean\">kidney beans</a>), and <em>lobiya</em> (<a title=\"Black-eyed pea\" href=\"https://en.wikipedia.org/wiki/Black-eyed_pea\">black-eyed peas</a>) are very common, especially in the northern regions. <em>Channa</em> and <em>moong</em> are also processed into flour (<em><a title=\"Gram flour\" href=\"https://en.wikipedia.org/wiki/Gram_flour\">besan</a></em>).</p>','<ul>\r\n<li>Many Indian dishes are cooked in <a title=\"Vegetable oil\" href=\"https://en.wikipedia.org/wiki/Vegetable_oil\">vegetable oil</a>, but <a title=\"Peanut oil\" href=\"https://en.wikipedia.org/wiki/Peanut_oil\">peanut oil</a> is popular in northern and western India, <a title=\"Mustard oil\" href=\"https://en.wikipedia.org/wiki/Mustard_oil\">mustard oil</a> in eastern India, and <a title=\"Coconut oil\" href=\"https://en.wikipedia.org/wiki/Coconut_oil\">coconut oil</a> along the western coast, especially in <a title=\"Kerala\" href=\"https://en.wikipedia.org/wiki/Kerala\">Kerala</a><sup>.</sup></li>\r\n<li><a title=\"Sesame oil\" href=\"https://en.wikipedia.org/wiki/Sesame_oil\"><em>Gingelly</em> (sesame) oil</a> is common in the south since it imparts a fragrant nutty aroma. In recent decades, <a title=\"Sunflower oil\" href=\"https://en.wikipedia.org/wiki/Sunflower_oil\">sunflower</a> and <a title=\"Soybean oil\" href=\"https://en.wikipedia.org/wiki/Soybean_oil\">soybean</a> oils have become popular across India.</li>\r\n<li><a title=\"Hydrogenation\" href=\"https://en.wikipedia.org/wiki/Hydrogenation\">Hydrogenated</a> vegetable oil, known as <em><a title=\"Vanaspati\" href=\"https://en.wikipedia.org/wiki/Vanaspati\">Vanaspati</a> ghee</em>, is another popular cooking medium. Butter-based <a title=\"Ghee\" href=\"https://en.wikipedia.org/wiki/Ghee\">ghee</a>, or <em>deshi ghee</em>, is used frequently, though less than in the past. Many types of meat are used for Indian cooking, but chicken and mutton tend to be the most commonly consumed meats.</li>\r\n<li>Fish and beef consumption are prevalent in some parts of India, but they are not widely consumed.</li>\r\n</ul>','<ul>\r\n<li>Cuisine differs across <a title=\"List of regions of India\" href=\"https://en.wikipedia.org/wiki/List_of_regions_of_India\">India\'s diverse regions</a> as a result of variation in local culture, geographical location (proximity to sea, desert, or mountains) and economics.</li>\r\n<li>It also varies seasonally, depending on which fruits and vegetables are ripe.</li>\r\n</ul>','<p>Always Avaliable</p>','<ul style=\"box-sizing: border-box; margin: 0px; border-radius: 0px !important; padding: 0px; color: #484848; font-family: \'Open Sans\', sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18.5714px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: border-box; border-radius: 0px !important; list-style-type: disc; margin: 0px 0px 0px 13px; padding: 5px 0px; font-size: 11px; color: #484848; line-height: 16px;\"><span style=\"box-sizing: border-box; border-radius: 0px !important; font-size: 13px;\">Free cancellation: 8 days prior to date of activity.</span></li>\r\n<li style=\"box-sizing: border-box; border-radius: 0px !important; list-style-type: disc; margin: 0px 0px 0px 13px; padding: 5px 0px; font-size: 11px; color: #484848; line-height: 16px;\"><span style=\"box-sizing: border-box; border-radius: 0px !important; font-size: 13px;\">20% Cancellation Fee (80% reimbursement): 4 to 7 days prior to date of activity.</span></li>\r\n<li style=\"box-sizing: border-box; border-radius: 0px !important; list-style-type: disc; margin: 0px 0px 0px 13px; padding: 5px 0px; font-size: 11px; color: #484848; line-height: 16px;\"><span style=\"box-sizing: border-box; border-radius: 0px !important; font-size: 13px;\">100% cancellation Fee (No reimbursement): Less than 4 days before the date of activity.</span></li>\r\n</ul>\r\n<p>&nbsp;</p>','<p>The most important and frequently used spices and flavourings in Indian cuisine are whole or powdered <a title=\"Chili pepper\" href=\"https://en.wikipedia.org/wiki/Chili_pepper\">chilli pepper</a> (<em>mirch</em>, <a title=\"Columbian Exchange\" href=\"https://en.wikipedia.org/wiki/Columbian_Exchange\">introduced by the Portuguese</a> from <a title=\"Mexico\" href=\"https://en.wikipedia.org/wiki/Mexico\">Mexico</a> in the 16th century), <a title=\"Brassica nigra\" href=\"https://en.wikipedia.org/wiki/Brassica_nigra\">black mustard</a> seed (<em>sarso</em>), <a title=\"Cardamom\" href=\"https://en.wikipedia.org/wiki/Cardamom\">cardamom</a> (<em>elaichi</em>), <a title=\"Cumin\" href=\"https://en.wikipedia.org/wiki/Cumin\">cumin</a> (<em>jeera</em>), <a title=\"Turmeric\" href=\"https://en.wikipedia.org/wiki/Turmeric\">turmeric</a> (<em>haldi</em>), <a title=\"Asafoetida\" href=\"https://en.wikipedia.org/wiki/Asafoetida\">asafoetida</a> (<em>hing</em>), <a title=\"Ginger\" href=\"https://en.wikipedia.org/wiki/Ginger\">ginger</a> (<em>adrak</em>), <a title=\"Coriander\" href=\"https://en.wikipedia.org/wiki/Coriander\">coriander</a> (<em>dhania</em>), and <a title=\"Garlic\" href=\"https://en.wikipedia.org/wiki/Garlic\">garlic</a> (<em>lasoon</em>). One popular <a title=\"Spice mix\" href=\"https://en.wikipedia.org/wiki/Spice_mix\">spice mix</a> is <em><a title=\"Garam masala\" href=\"https://en.wikipedia.org/wiki/Garam_masala\">garam masala</a></em>, a powder that typically includes five or more dried spices, especially <a title=\"Cardamom\" href=\"https://en.wikipedia.org/wiki/Cardamom\">cardamom</a>, <a title=\"Cinnamon\" href=\"https://en.wikipedia.org/wiki/Cinnamon\">cinnamon</a> (<em>dalchini</em>), and <a title=\"Clove\" href=\"https://en.wikipedia.org/wiki/Clove\">clove</a>.<sup id=\"cite_ref-Kelley2009_25-0\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/Indian_cuisine#cite_note-Kelley2009-25\">[25]</a></sup> Each culinary region has a distinctive <em>garam masala</em> blend&mdash;individual <a title=\"Chef\" href=\"https://en.wikipedia.org/wiki/Chef\">chefs</a> may also have their own. <em>Goda masala</em> is a comparable, though sweet, spice mix popular in <a title=\"Maharashtra\" href=\"https://en.wikipedia.org/wiki/Maharashtra\">Maharashtra</a>. Some leaves commonly used for flavouring include <a title=\"Bay leaf\" href=\"https://en.wikipedia.org/wiki/Bay_leaf\">bay leaves</a> (<em><a title=\"Cinnamomum tamala\" href=\"https://en.wikipedia.org/wiki/Cinnamomum_tamala\">tejpat</a></em>), <a title=\"Coriander\" href=\"https://en.wikipedia.org/wiki/Coriander\">coriander</a> leaves, <a title=\"Fenugreek\" href=\"https://en.wikipedia.org/wiki/Fenugreek\">fenugreek</a> leaves, and <a title=\"Mentha\" href=\"https://en.wikipedia.org/wiki/Mentha\">mint</a> leaves. The use of <a title=\"Curry tree\" href=\"https://en.wikipedia.org/wiki/Curry_tree\">curry</a> leaves and roots for flavouring is typical of <a title=\"Gujarati cuisine\" href=\"https://en.wikipedia.org/wiki/Gujarati_cuisine\">Gujarati</a> and <a title=\"South Indian cuisine\" href=\"https://en.wikipedia.org/wiki/South_Indian_cuisine\">South Indian cuisine</a>. Sweet dishes are often seasoned with <a title=\"Cardamom\" href=\"https://en.wikipedia.org/wiki/Cardamom\">cardamom</a>, <a title=\"Saffron\" href=\"https://en.wikipedia.org/wiki/Saffron\">saffron</a>, <a title=\"Nutmeg\" href=\"https://en.wikipedia.org/wiki/Nutmeg\">nutmeg</a> and <a title=\"Rose\" href=\"https://en.wikipedia.org/wiki/Rose\">rose</a> petal essences.</p>','2015-12-24 16:15:00','2016-05-27 18:35:00',1,'2015-12-11 05:38:35','2016-01-21 13:31:22');
/*!40000 ALTER TABLE `order_attractions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `supplier_id` int(10) unsigned NOT NULL,
  `attraction_id` int(10) unsigned NOT NULL,
  `attraction_product_id` int(10) unsigned NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `confirmation_code` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL,
  `currency_id` int(10) unsigned NOT NULL,
  `currency_conversion_rate` decimal(10,2) NOT NULL,
  `original_price` decimal(10,2) NOT NULL,
  `original_price_currency_id` int(10) unsigned NOT NULL,
  `original_price_before_discount` decimal(10,2) DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `discount_percentage` decimal(10,2) DEFAULT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `selling_price_currency_id` int(10) unsigned NOT NULL,
  `total_quantity` varchar(255) NOT NULL,
  `travel_date` date NOT NULL,
  `nationality_id` int(10) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,2,3,1,2,'201601181',NULL,'Paid',67,1.00,15978.00,67,15978.00,400.00,10.00,15578.00,67,'2','2016-01-28',1,'2016-01-18 09:22:37','2016-01-18 09:22:37'),(2,2,3,1,2,'201601182',NULL,'Paid',67,1.00,15978.00,67,15978.00,400.00,10.00,15578.00,67,'2','2016-01-28',1,'2016-01-18 11:05:05','2016-01-18 11:05:05'),(3,2,0,1,2,'201601213',NULL,'Paid',67,1.00,16978.00,67,16978.00,500.00,10.00,16478.00,67,'6','2016-01-28',1,'2016-01-21 10:52:49','2016-01-21 10:52:49'),(4,2,0,1,3,'201601214',NULL,'Paid',67,1.00,45000.00,67,0.00,0.00,NULL,45000.00,67,'6','2016-01-28',41,'2016-01-21 13:31:22','2016-01-21 13:31:22');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned DEFAULT NULL,
  `rght` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `body` longtext CHARACTER SET utf8 NOT NULL,
  `cover_image_file` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `template_layout_id` int(10) unsigned NOT NULL,
  `meta_title` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `meta_keyword` varchar(160) CHARACTER SET utf8 DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,NULL,1,2,'Why Book With Us','Coming Soon...','',2,'','','','2015-12-23 14:18:00','2015-12-23 14:18:00'),(2,NULL,3,4,'Contact Us','Coming Soon...','',2,'','','','2015-12-23 14:21:18','2015-12-23 14:21:18'),(3,NULL,5,6,'Terms And Conditions','Coming Soon...','',2,'','','','2015-12-23 14:22:07','2015-12-23 14:22:07'),(4,NULL,7,8,'FAQ’s','Coming Soon...','',2,'','','','2015-12-23 14:22:46','2015-12-23 14:22:46'),(6,NULL,9,10,'Experiences','<p>Coming Soon....</p>','',2,'','','','2015-12-28 12:47:58','2015-12-28 12:47:58');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo_image` varchar(255) DEFAULT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_methods`
--

LOCK TABLES `payment_methods` WRITE;
/*!40000 ALTER TABLE `payment_methods` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_status`
--

DROP TABLE IF EXISTS `payment_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_status`
--

LOCK TABLES `payment_status` WRITE;
/*!40000 ALTER TABLE `payment_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pickup_point_types`
--

DROP TABLE IF EXISTS `pickup_point_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pickup_point_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pickup_point_types`
--

LOCK TABLES `pickup_point_types` WRITE;
/*!40000 ALTER TABLE `pickup_point_types` DISABLE KEYS */;
INSERT INTO `pickup_point_types` VALUES (1,'Single Point','2016-01-04 12:20:54','2016-01-04 12:20:54');
/*!40000 ALTER TABLE `pickup_point_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_images`
--

DROP TABLE IF EXISTS `post_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `image_file` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_images`
--

LOCK TABLES `post_images` WRITE;
/*!40000 ALTER TABLE `post_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned DEFAULT NULL,
  `rght` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `body` longtext CHARACTER SET utf8 NOT NULL,
  `cover_image_file` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `template_layout_id` int(10) unsigned NOT NULL,
  `meta_title` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `meta_keyword` varchar(160) CHARACTER SET utf8 DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `full_view` tinyint(1) DEFAULT NULL,
  `full_add` tinyint(1) DEFAULT NULL,
  `full_edit` tinyint(1) DEFAULT NULL,
  `full_delete` tinyint(1) DEFAULT NULL,
  `super_config` tinyint(1) DEFAULT NULL,
  `config` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Super Admin','Demo description!',1,1,1,1,1,0,'2015-09-23 15:23:38','2015-09-23 15:23:39'),(2,'User','Demo description!',1,1,1,1,0,0,'2015-10-01 11:34:16','2015-10-01 11:34:19'),(3,'Supplier','Demo description!',1,1,1,1,0,0,'2015-10-01 11:59:48','2015-10-01 11:59:51'),(4,'Admin','',1,1,1,1,0,1,'2015-12-18 05:20:47','2015-12-18 05:20:47'),(5,'Employee','',1,1,1,1,0,0,'2015-12-18 05:32:23','2015-12-18 05:32:23'),(6,'Agent','',1,1,1,1,0,0,'2016-01-15 06:12:02','2016-01-15 06:12:02');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salutations`
--

DROP TABLE IF EXISTS `salutations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salutations` (
  `id` int(11) DEFAULT NULL,
  `title` text,
  `created` text,
  `modified` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salutations`
--

LOCK TABLES `salutations` WRITE;
/*!40000 ALTER TABLE `salutations` DISABLE KEYS */;
INSERT INTO `salutations` VALUES (1,'Mr.','2015-05-07 06:04:42','2015-06-11 06:27:42'),(2,'Mrs.','2015-05-07 06:05:49','2015-06-11 06:27:57'),(3,'Ms.','2015-05-07 06:06:06','2015-06-11 06:27:51'),(4,'Mstr.','2015-06-11 06:27:34','2015-06-11 06:27:34');
/*!40000 ALTER TABLE `salutations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `value` text CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`,`created`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'footer_text','Footer Text','<p><strong>Tuatos Travel Services Pvt Ltd.</strong><br />Address: 10, Meghal Estate, First Floor, Devidayal Road, Mulund West, Mumbai &ndash; 400 080. India.<br /><strong>Contact</strong>: +91 22 40220073 | helpdesk@tuatos.com | www.tuatos.com</p>','2015-08-11 15:04:33','2016-01-18 06:06:57'),(2,'footer_text','Footer Text','<p>Explore exciting attractions,activities &amp; hot deals in your inbox.</p>','2015-08-11 15:04:26','2016-01-13 10:55:58'),(3,'','Call','1234 567 891','2015-12-21 11:14:48','2016-01-15 10:03:15'),(4,'','Enquiry EmailId','enquire@tuatos.com','2015-12-21 11:14:48','2016-01-15 10:03:15'),(5,'footer_text','Service Band','<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<div class=\"servicesicon\"><img src=\"/tuatos/files/tinymce_uploads/attractionicon.png\" alt=\"\" /></div>\r\n<div class=\"servicesheading\">The Best Attractions</div>\r\n<div class=\"servicescont\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>\r\n</div>\r\n<div class=\"col-sm-4 rowmargin\">\r\n<div class=\"servicesicon\"><img src=\"/tuatos/files/tinymce_uploads/bookingicon.png\" alt=\"\" /></div>\r\n<div class=\"servicesheading\">Quick Booking in easy Steps</div>\r\n<div class=\"servicescont\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>\r\n</div>\r\n<div class=\"col-sm-4 rowmargin\">\r\n<div class=\"servicesicon\"><img src=\"/tuatos/files/tinymce_uploads/priceicon.png\" alt=\"\" /></div>\r\n<div class=\"servicesheading\">The Lowset Prices</div>\r\n<div class=\"servicescont\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>\r\n</div>\r\n</div>','2015-12-21 11:14:48','2016-01-13 10:55:58'),(6,'homepage_slider_speed','Home Page Slider Speed','5000','2016-01-13 14:20:57','2016-01-15 10:03:15'),(9,'Currency','Default Currency','67','0000-00-00 00:00:00','2016-01-15 10:03:15'),(10,'Order','Order','enquire@tuatos.com, enquire@tuatos.com','0000-00-00 00:00:00','2016-01-15 10:03:15');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_media`
--

DROP TABLE IF EXISTS `social_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `link` varchar(255) NOT NULL,
  `order` int(3) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_media`
--

LOCK TABLES `social_media` WRITE;
/*!40000 ALTER TABLE `social_media` DISABLE KEYS */;
INSERT INTO `social_media` VALUES (2,'Facebook','facebookicon.png','https://www.facebook.com/',1,1,'2015-12-14 12:48:58','2015-12-15 06:54:13'),(3,'Twitter','twittericon.png','#',2,1,'2015-12-14 12:49:01','2015-12-14 13:03:31'),(4,'Linkedin','inicon.png','#',3,1,'2015-12-14 12:49:03','2015-12-14 13:04:04'),(5,'Google +','gplusicon.png','#',4,1,'2015-12-14 12:49:06','2015-12-14 13:04:22');
/*!40000 ALTER TABLE `social_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specific_prices`
--

DROP TABLE IF EXISTS `specific_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specific_prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attraction_id` int(10) unsigned NOT NULL,
  `attraction_product_id` int(10) unsigned DEFAULT NULL,
  `attraction_product_price_group_id` int(10) unsigned DEFAULT NULL,
  `attraction_product_price_id` int(10) unsigned DEFAULT NULL,
  `currency_id` int(10) unsigned DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `nationality_id` int(10) unsigned DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `from_quantity` int(10) DEFAULT NULL,
  `reduction_value` decimal(10,2) NOT NULL,
  `is_percentage` tinyint(1) DEFAULT NULL,
  `from_datetime` datetime DEFAULT NULL,
  `to_datetime` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specific_prices`
--

LOCK TABLES `specific_prices` WRITE;
/*!40000 ALTER TABLE `specific_prices` DISABLE KEYS */;
INSERT INTO `specific_prices` VALUES (1,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,500.00,0,'2016-01-06 10:24:00','2016-01-31 10:24:00','2016-01-06 04:56:06','2016-01-06 05:09:07'),(2,1,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,300.00,0,NULL,NULL,'2016-01-06 06:48:50','2016-01-06 06:48:50'),(3,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,200.00,0,NULL,NULL,'2016-01-06 06:51:44','2016-01-06 06:51:44'),(5,1,2,1,1,NULL,NULL,NULL,1000.00,NULL,10.00,1,NULL,NULL,'2016-01-06 07:05:30','2016-01-06 08:57:53'),(6,8,111,114,11,NULL,NULL,NULL,NULL,NULL,900.00,0,NULL,NULL,'2016-01-07 09:33:28','2016-01-07 09:33:28');
/*!40000 ALTER TABLE `specific_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_plans`
--

DROP TABLE IF EXISTS `subscription_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription_plans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `duration_value` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL COMMENT 'Duration\n(days / months / years)',
  `amount` decimal(10,2) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_plans`
--

LOCK TABLES `subscription_plans` WRITE;
/*!40000 ALTER TABLE `subscription_plans` DISABLE KEYS */;
INSERT INTO `subscription_plans` VALUES (1,'Free','1','Month',0.00,1,'2015-12-09 12:41:20','2015-12-17 11:02:33');
/*!40000 ALTER TABLE `subscription_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned DEFAULT NULL,
  `rght` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,0,1,2,'aaaaaaaaa',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,NULL,3,4,'bbbbbb',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,NULL,5,6,'Market',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,NULL,7,8,'ddd',1,'2015-12-18 10:59:05','2015-12-18 10:59:05'),(5,NULL,9,10,'Destination',1,'2015-12-18 11:08:53','2015-12-18 11:08:53'),(7,NULL,13,14,'testing',1,'2015-12-18 11:24:01','2015-12-18 11:24:01'),(9,NULL,15,16,'test',1,'2015-12-18 13:10:38','2015-12-18 13:10:38'),(10,NULL,17,18,'fd',1,'2015-12-24 11:21:59','2015-12-24 11:21:59'),(11,NULL,19,20,'hkh',1,'2015-12-28 07:27:52','2015-12-28 07:27:52'),(12,NULL,21,22,'hkkk',1,'2015-12-28 07:28:44','2015-12-28 07:28:44'),(13,NULL,23,24,'hkll',1,'2015-12-28 09:44:40','2015-12-28 09:44:40'),(14,NULL,25,26,'lll',1,'2015-12-28 09:53:34','2015-12-28 09:53:34'),(15,NULL,27,28,'lllll',1,'2015-12-28 11:16:07','2015-12-28 11:16:07'),(16,NULL,29,30,'3',1,'2015-12-29 05:11:56','2015-12-29 05:11:56');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp_orders`
--

DROP TABLE IF EXISTS `temp_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `supplier_id` int(10) NOT NULL,
  `attraction_id` int(11) unsigned NOT NULL,
  `attraction_product_id` int(11) unsigned NOT NULL,
  `attraction_product_price_group_id` int(10) unsigned NOT NULL,
  `attraction_product_price_id` int(11) unsigned NOT NULL,
  `attraction_product_time_slot_id` int(11) unsigned DEFAULT NULL,
  `travel_date` date DEFAULT NULL,
  `nationality_id` int(10) unsigned DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `session` varchar(225) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp_orders`
--

LOCK TABLES `temp_orders` WRITE;
/*!40000 ALTER TABLE `temp_orders` DISABLE KEYS */;
INSERT INTO `temp_orders` VALUES (3,NULL,0,1,3,6,6,NULL,'2016-01-21',41,1,'c8b0f34e095988d710ff66af9860dd19','2016-01-21 04:39:52','2016-01-21 04:39:52'),(4,NULL,0,1,3,115,8,NULL,'2016-01-21',41,2,'c8b0f34e095988d710ff66af9860dd19','2016-01-21 04:39:52','2016-01-21 04:39:52'),(5,NULL,0,1,3,148,21,NULL,'2016-01-21',41,1,'c8b0f34e095988d710ff66af9860dd19','2016-01-21 04:39:52','2016-01-21 04:39:52'),(6,NULL,0,1,3,6,6,113,'2016-01-21',41,1,'96d202986fe0bd6ab8faa164a29345cf','2016-01-21 04:54:43','2016-01-21 04:54:43'),(7,NULL,0,1,3,115,8,113,'2016-01-21',41,1,'96d202986fe0bd6ab8faa164a29345cf','2016-01-21 04:54:43','2016-01-21 04:54:43'),(8,NULL,0,1,2,1,1,1,'2016-01-21',1,2,'166bd8ae082ebd9ed5f82babd13035a2','2016-01-21 05:40:12','2016-01-21 05:40:12'),(9,NULL,0,1,2,2,18,1,'2016-01-21',1,3,'166bd8ae082ebd9ed5f82babd13035a2','2016-01-21 05:40:12','2016-01-21 05:40:12'),(10,NULL,0,1,2,1,1,1,'2016-01-28',1,1,'c8cf134275937198ff8318079562345e','2016-01-21 05:44:08','2016-01-21 05:44:08'),(11,NULL,0,1,2,2,18,1,'2016-01-28',1,1,'c8cf134275937198ff8318079562345e','2016-01-21 05:44:08','2016-01-21 05:44:08'),(12,NULL,0,1,2,1,1,1,'2016-01-28',1,1,'f0f2b14c21fefd8e4a4b293c955d0c0d','2016-01-21 06:15:40','2016-01-21 06:15:40'),(13,NULL,0,1,2,2,18,1,'2016-01-28',1,1,'f0f2b14c21fefd8e4a4b293c955d0c0d','2016-01-21 06:15:40','2016-01-21 06:15:40'),(14,NULL,0,1,2,1,1,1,'2016-01-28',1,2,'89fbc3edf0868d175af02901e665f8f9','2016-01-21 06:23:02','2016-01-21 06:23:02'),(15,NULL,0,1,2,2,18,1,'2016-01-28',1,1,'89fbc3edf0868d175af02901e665f8f9','2016-01-21 06:23:02','2016-01-21 06:23:02'),(16,NULL,0,1,3,6,6,113,'2016-01-21',41,1,'511b3c646d760b653e7df8fa7e929dc7','2016-01-21 06:46:54','2016-01-21 06:46:54'),(17,NULL,0,1,3,115,8,113,'2016-01-21',41,2,'511b3c646d760b653e7df8fa7e929dc7','2016-01-21 06:46:54','2016-01-21 06:46:54'),(18,NULL,0,1,2,1,1,2,'2016-01-25',1,3,'eff8a40238807acde74e08572ef29ae7','2016-01-21 06:57:21','2016-01-21 06:57:21'),(19,NULL,0,1,2,2,18,2,'2016-01-25',1,2,'eff8a40238807acde74e08572ef29ae7','2016-01-21 06:57:21','2016-01-21 06:57:21'),(20,NULL,0,1,2,1,1,1,'2016-01-28',1,1,'d7a40d9847b179e1d37c6ef979ee9d91','2016-01-21 07:15:48','2016-01-21 07:15:48'),(21,NULL,0,1,2,2,18,1,'2016-01-28',1,2,'d7a40d9847b179e1d37c6ef979ee9d91','2016-01-21 07:15:48','2016-01-21 07:15:48'),(22,NULL,3,1,2,1,1,1,'2016-01-25',1,1,'aaa3b18c45ec48ac1036eaffe3a3a5b0','2016-01-21 07:16:29','2016-01-21 07:16:29'),(23,NULL,3,1,2,2,18,1,'2016-01-25',1,1,'aaa3b18c45ec48ac1036eaffe3a3a5b0','2016-01-21 07:16:29','2016-01-21 07:16:29'),(24,NULL,3,1,3,6,6,3,'2016-01-21',41,1,'7e77bfd1e92f4106e56f068a9d41a2ac','2016-01-21 08:45:55','2016-01-21 08:45:55'),(25,NULL,3,1,3,115,8,3,'2016-01-21',41,1,'7e77bfd1e92f4106e56f068a9d41a2ac','2016-01-21 08:45:55','2016-01-21 08:45:55'),(26,NULL,3,1,2,1,1,2,'2016-01-25',1,2,'100f30a91dcb8bea662d1360fa986654','2016-01-21 08:56:01','2016-01-21 08:56:01'),(27,NULL,3,1,2,2,18,2,'2016-01-25',1,2,'100f30a91dcb8bea662d1360fa986654','2016-01-21 08:56:01','2016-01-21 08:56:01'),(28,NULL,3,1,2,1,1,1,'2016-01-28',1,2,'75611abf23e6f51cca5772d49345b89e','2016-01-21 10:15:07','2016-01-21 10:15:07'),(29,NULL,3,1,2,2,18,1,'2016-01-28',1,1,'75611abf23e6f51cca5772d49345b89e','2016-01-21 10:15:07','2016-01-21 10:15:07'),(30,NULL,3,1,2,1,1,1,'2016-01-28',1,1,'65d7dc6d5e5c392d9688eab3fa96fc89','2016-01-21 10:57:48','2016-01-21 10:57:48'),(31,NULL,3,1,2,2,18,1,'2016-01-28',1,1,'65d7dc6d5e5c392d9688eab3fa96fc89','2016-01-21 10:57:48','2016-01-21 10:57:48'),(32,NULL,3,1,2,1,1,1,'2016-01-28',1,1,'65c5e477b905e81fbf77a828bb25e696','2016-01-21 12:28:56','2016-01-21 12:28:56'),(33,NULL,3,1,2,2,18,1,'2016-01-28',1,1,'65c5e477b905e81fbf77a828bb25e696','2016-01-21 12:28:56','2016-01-21 12:28:56'),(34,NULL,3,1,3,6,6,3,'2016-01-28',41,2,'661a8a339f9dfb018e7e9c8defa5e73a','2016-01-21 13:31:00','2016-01-21 13:31:00'),(35,NULL,3,1,3,115,8,3,'2016-01-28',41,1,'661a8a339f9dfb018e7e9c8defa5e73a','2016-01-21 13:31:00','2016-01-21 13:31:00'),(36,2,3,1,3,6,6,3,'2016-01-22',41,1,'e777cb285b7bddd64a8a9a41612b7087','2016-01-22 06:06:16','2016-01-22 06:06:16'),(37,2,3,1,3,115,8,3,'2016-01-22',41,2,'e777cb285b7bddd64a8a9a41612b7087','2016-01-22 06:06:16','2016-01-22 06:06:16'),(38,2,3,1,2,1,1,1,'2016-01-28',1,1,'af6bbef9553f38f89fb5b5337c931263','2016-01-22 07:00:20','2016-01-22 07:00:20');
/*!40000 ALTER TABLE `temp_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp_orders_attraction_product_price_groups`
--

DROP TABLE IF EXISTS `temp_orders_attraction_product_price_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_orders_attraction_product_price_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `temp_order_id` int(10) unsigned NOT NULL,
  `temp_order_attraction_product_id` int(10) unsigned NOT NULL,
  `total_quantity` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp_orders_attraction_product_price_groups`
--

LOCK TABLES `temp_orders_attraction_product_price_groups` WRITE;
/*!40000 ALTER TABLE `temp_orders_attraction_product_price_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `temp_orders_attraction_product_price_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template_layouts`
--

DROP TABLE IF EXISTS `template_layouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template_layouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template_layouts`
--

LOCK TABLES `template_layouts` WRITE;
/*!40000 ALTER TABLE `template_layouts` DISABLE KEYS */;
INSERT INTO `template_layouts` VALUES (2,'default','2015-12-23 14:15:59','2016-01-13 12:42:51');
/*!40000 ALTER TABLE `template_layouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timezones`
--

DROP TABLE IF EXISTS `timezones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timezones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `utc_offset` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=645 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timezones`
--

LOCK TABLES `timezones` WRITE;
/*!40000 ALTER TABLE `timezones` DISABLE KEYS */;
INSERT INTO `timezones` VALUES (1,236,'(GMT-10:00) Hawaii Time','Pacific/Honolulu',-10),(2,236,'(GMT-09:00) Alaska Time','America/Anchorage',-9),(3,236,'(GMT-08:00) Pacific Time','America/Los_Angeles',-8),(4,236,'(GMT-07:00) Mountain Time','America/Denver',-7),(5,236,'(GMT-07:00) Mountain Time - Arizona','America/Phoenix',-7),(6,236,'(GMT-06:00) Central Time','America/Chicago',-6),(7,236,'(GMT-05:00) Eastern Time','America/New_York',-5),(8,40,'(GMT-08:00) Pacific Time - Vancouver','America/Vancouver',-8),(9,40,'(GMT-08:00) Pacific Time - Whitehorse','America/Whitehorse',-8),(10,40,'(GMT-07:00) Mountain Time - Dawson Creek','America/Dawson_Creek',-7),(11,40,'(GMT-07:00) Mountain Time - Edmonton','America/Edmonton',-7),(12,40,'(GMT-07:00) Mountain Time - Yellowknife','America/Yellowknife',-7),(13,40,'(GMT-06:00) Central Time - Regina','America/Regina',-6),(14,40,'(GMT-06:00) Central Time - Winnipeg','America/Winnipeg',-6),(15,40,'(GMT-05:00) Eastern Time - Iqaluit','America/Iqaluit',-5),(16,40,'(GMT-05:00) Eastern Time - Montreal','America/Montreal',-5),(17,40,'(GMT-05:00) Eastern Time - Toronto','America/Toronto',-5),(18,40,'(GMT-04:00) Atlantic Time - Halifax','America/Halifax',-4),(19,40,'(GMT-03:30) Newfoundland Time - St. Johns','America/St_Johns',-3.5),(20,103,'(GMT+05:30) India Standard Time','Asia/Kolkata',5.5),(21,236,'(GMT-04:00) Atlantic Time ','America/Puerto_Rico',-4),(22,235,'(GMT+00:00) Greenwich Mean Time','Europe/London',0),(23,1,'(GMT+04:30) Kabul','Asia/Kabul',4.5),(24,2,'(GMT+02:00) Helsinki','Europe/Helsinki',2),(25,3,'(GMT+01:00) Tirane','Europe/Tirane',1),(26,4,'(GMT+01:00) Algiers','Africa/Algiers',1),(27,5,'(GMT-11:00) Pago Pago','Pacific/Pago_Pago',-11),(28,6,'(GMT+01:00) Andorra','Europe/Andorra',1),(29,7,'(GMT+01:00) Lagos','Africa/Lagos',1),(30,8,'(GMT-04:00) Port of Spain','America/Port_of_Spain',-4),(31,9,'(GMT+05:30) India Standard Time','Antarctica/Palmer',5.5),(32,9,'(GMT-03:00) Rothera','Antarctica/Rothera',-3),(33,9,'(GMT+03:00) Syowa','Antarctica/Syowa',3),(34,9,'(GMT+05:00) Mawson','Antarctica/Mawson',5),(35,9,'(GMT+06:00) Vostok','Antarctica/Vostok',6),(36,9,'(GMT+07:00) Davis','Antarctica/Davis',7),(37,9,'(GMT+08:00) Casey','Antarctica/Casey',8),(38,9,'(GMT+10:00) Dumont D\'Urville','Antarctica/DumontDUrville',10),(39,9,'(GMT+13:00) Auckland','Pacific/Auckland',13),(40,10,'(GMT-04:00) Port of Spain','America/Port_of_Spain',-4),(41,11,'(GMT-03:00) Buenos Aires','America/Argentina/Buenos_Aires',-3),(42,12,'(GMT+04:00) Yerevan','Asia/Yerevan',4),(43,13,'(GMT-04:00) Curacao','America/Curacao',-4),(44,251,'(GMT-10:00) Hawaii Time','Pacific/Honolulu',-10),(45,251,'(GMT-08:00) Alaska Time','America/Anchorage',-8),(46,251,'(GMT-07:00) Pacific Time','America/Los_Angeles',-7),(47,251,'(GMT-06:00) Mountain Time','America/Denver',-6),(48,251,'(GMT-07:00) Mountain Time - Arizona','America/Phoenix',-7),(49,251,'(GMT-05:00) Central Time','America/Chicago',-5),(50,251,'(GMT-05:00) Eastern Time','America/New_York',-5),(51,14,'(GMT+08:00) Western Time - Perth','Australia/Perth',8),(52,14,'(GMT+10:30) Central Time - Adelaide','Australia/Adelaide',10.5),(53,14,'(GMT+09:30) Central Time - Darwin','Australia/Darwin',9.5),(54,14,'(GMT+10:00) Eastern Time - Brisbane','Australia/Brisbane',10),(55,14,'(GMT+11:00) Eastern Time - Hobart','Australia/Hobart',11),(56,14,'(GMT+11:00) Eastern Time - Melbourne, Sydney','Australia/Sydney',11),(57,15,'(GMT+01:00) Vienna','Europe/Vienna',1),(58,16,'(GMT+04:00) Baku','Asia/Baku',4),(59,17,'(GMT-05:00) Nassau','America/Nassau',-5),(60,18,'(GMT+03:00) Qatar','Asia/Qatar',3),(61,19,'(GMT+06:00) Dhaka','Asia/Dhaka',6),(62,20,'(GMT-04:00) Barbados','America/Barbados',-4),(63,21,'(GMT+03:00) Minsk','Europe/Minsk',3),(64,22,'(GMT+01:00) Brussels','Europe/Brussels',1),(65,23,'(GMT-06:00) Belize','America/Belize',-6),(66,24,'(GMT+01:00) Lagos','Africa/Lagos',1),(67,25,'(GMT-04:00) Bermuda','Atlantic/Bermuda',-4),(68,26,'(GMT+06:00) Thimphu','Asia/Thimphu',6),(69,27,'(GMT-04:00) La Paz','America/La_Paz',-4),(70,29,'(GMT+01:00) Central European Time - Belgrade','Europe/Belgrade',1),(71,30,'(GMT+02:00) Maputo','Africa/Maputo',2),(72,31,'(GMT+00:00) Abidjan','Africa/Abidjan',0),(73,32,'(GMT-05:00) Rio Branco','America/Rio_Branco',-5),(74,32,'(GMT-04:00) Boa Vista','America/Boa_Vista',-4),(75,32,'(GMT-03:00) Campo Grande','America/Campo_Grande',-3),(76,32,'(GMT-03:00) Cuiaba','America/Cuiaba',-3),(77,32,'(GMT-04:00) Manaus','America/Manaus',-4),(78,32,'(GMT-04:00) Porto Velho','America/Porto_Velho',-4),(79,32,'(GMT-03:00) Araguaina','America/Araguaina',-3),(80,32,'(GMT-03:00) Salvador','America/Bahia',-3),(81,32,'(GMT-03:00) Belem','America/Belem',-3),(82,32,'(GMT-03:00) Fortaleza','America/Fortaleza',-3),(83,32,'(GMT-03:00) Maceio','America/Maceio',-3),(84,32,'(GMT-03:00) Recife','America/Recife',-3),(85,32,'(GMT-02:00) Sao Paulo','America/Sao_Paulo',-2),(86,32,'(GMT-02:00) Noronha','America/Noronha',-2),(87,33,'(GMT+06:00) Chagos','Indian/Chagos',6),(88,243,'(GMT-04:00) Port of Spain','America/Port_of_Spain',-4),(89,253,'(GMT+08:00) Brunei','Asia/Brunei',8),(90,35,'(GMT+02:00) Sofia','Europe/Sofia',2),(91,36,'(GMT+00:00) Abidjan','Africa/Abidjan',0),(92,37,'(GMT+02:00) Maputo','Africa/Maputo',2),(93,38,'(GMT+07:00) Bangkok','Asia/Bangkok',7),(94,39,'(GMT+01:00) Lagos','Africa/Lagos',1),(95,40,'(GMT-07:00) Pacific Time - Vancouver','America/Vancouver',-7),(96,40,'(GMT-07:00) Pacific Time - Whitehorse','America/Whitehorse',-7),(97,40,'(GMT-07:00) Mountain Time - Dawson Creek','America/Dawson_Creek',-7),(98,40,'(GMT-06:00) Mountain Time - Edmonton','America/Edmonton',-6),(99,40,'(GMT-06:00) Mountain Time - Yellowknife','America/Yellowknife',-6),(100,40,'(GMT-06:00) Central Time - Regina','America/Regina',-6),(101,40,'(GMT-05:00) Central Time - Winnipeg','America/Winnipeg',-5),(102,40,'(GMT-05:00) Eastern Time - Iqaluit','America/Iqaluit',-5),(103,40,'(GMT-05:00) Eastern Time - Toronto','America/Toronto',-5),(104,40,'(GMT-04:00) Atlantic Time - Halifax','America/Halifax',-4),(105,40,'(GMT-03:30) Newfoundland Time - St. Johns','America/St_Johns',-3.5),(106,255,'(GMT-10:00) Hawaii Time','Pacific/Honolulu',-10),(107,255,'(GMT-08:00) Alaska Time','America/Anchorage',-8),(108,255,'(GMT-07:00) Pacific Time','America/Los_Angeles',-7),(109,255,'(GMT-06:00) Mountain Time','America/Denver',-6),(110,255,'(GMT-07:00) Mountain Time - Arizona','America/Phoenix',-7),(111,255,'(GMT-05:00) Central Time','America/Chicago',-5),(112,255,'(GMT-05:00) Eastern Time','America/New_York',-5),(113,256,'(GMT-01:00) Cape Verde','Atlantic/Cape_Verde',-1),(114,257,'(GMT-04:00) Curacao','America/Curacao',-4),(115,42,'(GMT-05:00) Cayman','America/Cayman',-5),(116,43,'(GMT+01:00) Lagos','Africa/Lagos',1),(117,258,'(GMT-10:00) Hawaii Time','Pacific/Honolulu',-10),(118,258,'(GMT-08:00) Alaska Time','America/Anchorage',-8),(119,258,'(GMT-07:00) Pacific Time','America/Los_Angeles',-7),(120,258,'(GMT-06:00) Mountain Time','America/Denver',-6),(121,258,'(GMT-07:00) Mountain Time - Arizona','America/Phoenix',-7),(122,258,'(GMT-05:00) Central Time','America/Chicago',-5),(123,258,'(GMT-05:00) Eastern Time','America/New_York',-5),(124,44,'(GMT+01:00) Ndjamena','Africa/Ndjamena',1),(125,45,'(GMT-05:00) Easter Island','Pacific/Easter',-5),(126,45,'(GMT-03:00) Santiago','America/Santiago',-3),(127,46,'(GMT+08:00) China Time - Beijing','Asia/Shanghai',8),(128,47,'(GMT+07:00) Christmas','Indian/Christmas',7),(129,259,'(GMT-10:00) Hawaii Time','Pacific/Honolulu',-10),(130,259,'(GMT-08:00) Alaska Time','America/Anchorage',-8),(131,259,'(GMT-07:00) Pacific Time','America/Los_Angeles',-7),(132,259,'(GMT-06:00) Mountain Time','America/Denver',-6),(133,259,'(GMT-07:00) Mountain Time - Arizona','America/Phoenix',-7),(134,259,'(GMT-05:00) Central Time','America/Chicago',-5),(135,259,'(GMT-05:00) Eastern Time','America/New_York',-5),(136,48,'(GMT+06:30) Cocos','Indian/Cocos',6.5),(137,49,'(GMT-05:00) Bogota','America/Bogota',-5),(138,50,'(GMT+03:00) Nairobi','Africa/Nairobi',3),(139,51,'(GMT+01:00) Lagos','Africa/Lagos',1),(140,51,'(GMT+02:00) Maputo','Africa/Maputo',2),(141,52,'(GMT+01:00) Lagos','Africa/Lagos',1),(142,53,'(GMT-10:00) Rarotonga','Pacific/Rarotonga',-10),(143,54,'(GMT-06:00) Costa Rica','America/Costa_Rica',-6),(144,55,'(GMT+00:00) Abidjan','Africa/Abidjan',0),(145,56,'(GMT+01:00) Central European Time - Belgrade','Europe/Belgrade',1),(146,57,'(GMT-05:00) Havana','America/Havana',-5),(147,58,'(GMT-04:00) Curacao','America/Curacao',-4),(148,59,'(GMT+02:00) Nicosia','Asia/Nicosia',2),(149,60,'(GMT+01:00) Central European Time - Prague','Europe/Prague',1),(150,61,'(GMT+01:00) Copenhagen','Europe/Copenhagen',1),(151,260,'(GMT-10:00) Hawaii Time','Pacific/Honolulu',-10),(152,260,'(GMT-08:00) Alaska Time','America/Anchorage',-8),(153,260,'(GMT-07:00) Pacific Time','America/Los_Angeles',-7),(154,260,'(GMT-07:00) Mountain Time','America/Denver',-7),(155,260,'(GMT-07:00) Mountain Time - Arizona','America/Phoenix',-7),(156,260,'(GMT-06:00) Central Time','America/Chicago',-6),(157,260,'(GMT-05:00) Eastern Time','America/New_York',-5),(158,62,'(GMT+03:00) Nairobi','Africa/Nairobi',3),(159,63,'(GMT-04:00) Port of Spain','America/Port_of_Spain',-4),(160,261,'(GMT-04:00) Santo Domingo','America/Santo_Domingo',-4),(161,65,'(GMT-06:00) Galapagos','Pacific/Galapagos',-6),(162,65,'(GMT-05:00) Guayaquil','America/Guayaquil',-5),(163,66,'(GMT+02:00) Cairo','Africa/Cairo',2),(164,67,'(GMT-06:00) El Salvador','America/El_Salvador',-6),(165,68,'(GMT+01:00) Lagos','Africa/Lagos',1),(166,69,'(GMT+03:00) Nairobi','Africa/Nairobi',3),(167,70,'(GMT+02:00) Tallinn','Europe/Tallinn',2),(168,71,'(GMT+03:00) Nairobi','Africa/Nairobi',3),(169,72,'(GMT-03:00) Stanley','Atlantic/Stanley',-3),(170,73,'(GMT+00:00) Faeroe','Atlantic/Faroe',0),(171,74,'(GMT+13:00) Fiji','Pacific/Fiji',13),(172,75,'(GMT+02:00) Helsinki','Europe/Helsinki',2),(173,76,'(GMT+01:00) Paris','Europe/Paris',1),(174,77,'(GMT-03:00) Cayenne','America/Cayenne',-3),(175,78,'(GMT-10:00) Tahiti','Pacific/Tahiti',-10),(176,78,'(GMT-09:30) Marquesas','Pacific/Marquesas',-9.5),(177,78,'(GMT-09:00) Gambier','Pacific/Gambier',-9),(178,79,'(GMT+05:00) Kerguelen','Indian/Kerguelen',5),(179,80,'(GMT+01:00) Lagos','Africa/Lagos',1),(180,81,'(GMT+00:00) Abidjan','Africa/Abidjan',0),(181,82,'(GMT+04:00) Tbilisi','Asia/Tbilisi',4),(182,83,'(GMT+01:00) Berlin','Europe/Berlin',1),(183,84,'(GMT+00:00) Accra','Africa/Accra',0),(184,85,'(GMT+01:00) Gibraltar','Europe/Gibraltar',1),(185,86,'(GMT+02:00) Athens','Europe/Athens',2),(186,87,'(GMT-04:00) Thule','America/Thule',-4),(187,87,'(GMT-03:00) Godthab','America/Godthab',-3),(188,87,'(GMT-01:00) Scoresbysund','America/Scoresbysund',-1),(189,87,'(GMT+00:00) Danmarkshavn','America/Danmarkshavn',0),(190,88,'(GMT-04:00) Port of Spain','America/Port_of_Spain',-4),(191,89,'(GMT-04:00) Port of Spain','America/Port_of_Spain',-4),(192,90,'(GMT+10:00) Guam','Pacific/Guam',10),(193,91,'(GMT-06:00) Guatemala','America/Guatemala',-6),(194,92,'(GMT+00:00) London','Europe/London',0),(195,93,'(GMT+00:00) Abidjan','Africa/Abidjan',0),(196,94,'(GMT+00:00) Bissau','Africa/Bissau',0),(197,95,'(GMT-04:00) Guyana','America/Guyana',-4),(198,96,'(GMT-05:00) Port-au-Prince','America/Port-au-Prince',-5),(199,97,'(GMT+05:00) Kerguelen','Indian/Kerguelen',5),(200,99,'(GMT-06:00) Central Time - Tegucigalpa','America/Tegucigalpa',-6),(201,100,'(GMT+08:00) Hong Kong','Asia/Hong_Kong',8),(202,101,'(GMT+01:00) Budapest','Europe/Budapest',1),(203,102,'(GMT+00:00) Reykjavik','Atlantic/Reykjavik',0),(204,104,'(GMT+07:00) Jakarta','Asia/Jakarta',7),(205,104,'(GMT+08:00) Makassar','Asia/Makassar',8),(206,104,'(GMT+09:00) Jayapura','Asia/Jayapura',9),(207,105,'(GMT+03:30) Tehran','Asia/Tehran',3.5),(208,106,'(GMT+03:00) Baghdad','Asia/Baghdad',3),(209,107,'(GMT+00:00) Dublin','Europe/Dublin',0),(210,108,'(GMT+00:00) London','Europe/London',0),(211,109,'(GMT+02:00) Jerusalem','Asia/Jerusalem',2),(212,110,'(GMT+01:00) Rome','Europe/Rome',1),(213,111,'(GMT-05:00) Jamaica','America/Jamaica',-5),(214,112,'(GMT+09:00) Tokyo','Asia/Tokyo',9),(215,113,'(GMT+00:00) London','Europe/London',0),(216,114,'(GMT+02:00) Amman','Asia/Amman',2),(217,115,'(GMT+05:00) Aqtau','Asia/Aqtau',5),(218,115,'(GMT+05:00) Aqtobe','Asia/Aqtobe',5),(219,115,'(GMT+06:00) Almaty','Asia/Almaty',6),(220,116,'(GMT+03:00) Nairobi','Africa/Nairobi',3),(221,117,'(GMT+12:00) Tarawa','Pacific/Tarawa',12),(222,117,'(GMT+14:00) Kiritimati','Pacific/Kiritimati',14),(223,262,'(GMT-10:00) Hawaii Time','Pacific/Honolulu',-10),(224,262,'(GMT-08:00) Alaska Time','America/Anchorage',-8),(225,262,'(GMT-08:00) Pacific Time','America/Los_Angeles',-8),(226,262,'(GMT-07:00) Mountain Time','America/Denver',-7),(227,262,'(GMT-07:00) Mountain Time - Arizona','America/Phoenix',-7),(228,262,'(GMT-06:00) Central Time','America/Chicago',-6),(229,262,'(GMT-05:00) Eastern Time','America/New_York',-5),(230,120,'(GMT+03:00) Riyadh','Asia/Riyadh',3),(231,121,'(GMT+06:00) Bishkek','Asia/Bishkek',6),(232,122,'(GMT+07:00) Bangkok','Asia/Bangkok',7),(233,123,'(GMT+02:00) Riga','Europe/Riga',2),(234,124,'(GMT+02:00) Beirut','Asia/Beirut',2),(235,125,'(GMT+02:00) Johannesburg','Africa/Johannesburg',2),(236,126,'(GMT+00:00) Monrovia','Africa/Monrovia',0),(237,127,'(GMT+02:00) Tripoli','Africa/Tripoli',2),(238,128,'(GMT+01:00) Zurich','Europe/Zurich',1),(239,129,'(GMT+02:00) Vilnius','Europe/Vilnius',2),(240,130,'(GMT+01:00) Luxembourg','Europe/Luxembourg',1),(241,131,'(GMT+08:00) Macau','Asia/Macau',8),(242,132,'(GMT+01:00) Central European Time - Belgrade','Europe/Belgrade',1),(243,133,'(GMT+03:00) Nairobi','Africa/Nairobi',3),(244,134,'(GMT+02:00) Maputo','Africa/Maputo',2),(245,135,'(GMT+08:00) Kuala Lumpur','Asia/Kuala_Lumpur',8),(246,136,'(GMT+05:00) Maldives','Indian/Maldives',5),(247,137,'(GMT+00:00) Abidjan','Africa/Abidjan',0),(248,138,'(GMT+01:00) Malta','Europe/Malta',1),(249,139,'(GMT+12:00) Kwajalein','Pacific/Kwajalein',12),(250,139,'(GMT+12:00) Majuro','Pacific/Majuro',12),(251,140,'(GMT-04:00) Martinique','America/Martinique',-4),(252,141,'(GMT+00:00) Abidjan','Africa/Abidjan',0),(253,142,'(GMT+04:00) Mauritius','Indian/Mauritius',4),(254,143,'(GMT+03:00) Nairobi','Africa/Nairobi',3),(255,144,'(GMT-08:00) Pacific Time - Tijuana','America/Tijuana',-8),(256,144,'(GMT-07:00) Mountain Time - Hermosillo','America/Hermosillo',-7),(257,144,'(GMT-07:00) Mountain Time - Chihuahua, Mazatlan','America/Mazatlan',-7),(258,144,'(GMT-06:00) Central Time - Mexico City','America/Mexico_City',-6),(259,144,'(GMT-05:00) America Cancun','America/Cancun',-5),(260,145,'(GMT+10:00) Truk','Pacific/Chuuk',10),(261,145,'(GMT+11:00) Kosrae','Pacific/Kosrae',11),(262,145,'(GMT+11:00) Ponape','Pacific/Pohnpei',11),(263,263,'(GMT+02:00) Chisinau','Europe/Chisinau',2),(264,147,'(GMT+01:00) Monaco','Europe/Monaco',1),(265,148,'(GMT+07:00) Hovd','Asia/Hovd',7),(266,148,'(GMT+08:00) Choibalsan','Asia/Choibalsan',8),(267,148,'(GMT+08:00) Ulaanbaatar','Asia/Ulaanbaatar',8),(268,149,'(GMT+01:00) Central European Time - Belgrade','Europe/Belgrade',1),(269,150,'(GMT-04:00) Port of Spain','America/Port_of_Spain',-4),(270,151,'(GMT+00:00) Casablanca','Africa/Casablanca',0),(271,152,'(GMT+02:00) Maputo','Africa/Maputo',2),(272,153,'(GMT+06:30) Rangoon','Asia/Rangoon',6.5),(273,154,'(GMT+02:00) Windhoek','Africa/Windhoek',2),(274,155,'(GMT+12:00) Nauru','Pacific/Nauru',12),(275,156,'(GMT+05:45) Katmandu','Asia/Katmandu',5.45),(276,157,'(GMT+01:00) Amsterdam','Europe/Amsterdam',1),(277,157,'(GMT+01:00) Amsterdam','Europe/Amsterdam',1),(278,158,'(GMT+11:00) Noumea','Pacific/Noumea',11),(279,159,'(GMT+13:00) Auckland','Pacific/Auckland',13),(280,160,'(GMT-06:00) Managua','America/Managua',-6),(281,161,'(GMT+01:00) Lagos','Africa/Lagos',1),(282,162,'(GMT+01:00) Lagos','Africa/Lagos',1),(283,163,'(GMT-11:00) Niue','Pacific/Niue',-11),(284,164,'(GMT+11:00) Norfolk','Pacific/Norfolk',11),(285,165,'(GMT+10:00) Guam','Pacific/Guam',10),(286,264,'(GMT+08:30) Pyongyang','Asia/Pyongyang',8.5),(287,166,'(GMT+01:00) Oslo','Europe/Oslo',1),(288,167,'(GMT+04:00) Dubai','Asia/Dubai',4),(289,168,'(GMT+05:00) Karachi','Asia/Karachi',5),(290,169,'(GMT+09:00) Palau','Pacific/Palau',9),(291,170,'(GMT+02:00) Gaza','Asia/Gaza',2),(292,171,'(GMT-05:00) Panama','America/Panama',-5),(293,172,'(GMT+10:00) Port Moresby','Pacific/Port_Moresby',10),(294,173,'(GMT-03:00) Asuncion','America/Asuncion',-3),(295,174,'(GMT-05:00) Lima','America/Lima',-5),(296,175,'(GMT+08:00) Manila','Asia/Manila',8),(297,176,'(GMT-08:00) Pitcairn','Pacific/Pitcairn',-8),(298,177,'(GMT+01:00) Warsaw','Europe/Warsaw',1),(299,178,'(GMT-01:00) Azores','Atlantic/Azores',-1),(300,178,'(GMT+00:00) Lisbon','Europe/Lisbon',0),(301,179,'(GMT-04:00) Puerto Rico','America/Puerto_Rico',-4),(302,180,'(GMT+03:00) Qatar','Asia/Qatar',3),(303,181,'(GMT+04:00) Reunion','Indian/Reunion',4),(304,182,'(GMT+02:00) Bucharest','Europe/Bucharest',2),(305,265,'(GMT+02:00) Moscow-01 - Kaliningrad','Europe/Kaliningrad',2),(306,265,'(GMT+03:00) Moscow+00 - Moscow','Europe/Moscow',3),(307,265,'(GMT+04:00) Moscow+01 - Samara','Europe/Samara',4),(308,265,'(GMT+05:00) Moscow+02 - Yekaterinburg','Asia/Yekaterinburg',5),(309,265,'(GMT+06:00) Moscow+03 - Omsk, Novosibirsk','Asia/Omsk',6),(310,265,'(GMT+07:00) Moscow+04 - Krasnoyarsk','Asia/Krasnoyarsk',7),(311,265,'(GMT+08:00) Moscow+05 - Irkutsk','Asia/Irkutsk',8),(312,265,'(GMT+09:00) Moscow+06 - Yakutsk','Asia/Yakutsk',9),(313,265,'(GMT+10:00) Moscow+08 - Magadan','Asia/Magadan',10),(314,265,'(GMT+10:00) Moscow+07 - Yuzhno-Sakhalinsk','Asia/Vladivostok',10),(315,265,'(GMT+12:00) Moscow+09 - Petropavlovsk-Kamchatskiy','Asia/Kamchatka',12),(316,184,'(GMT+02:00) Maputo','Africa/Maputo',2),(317,192,'(GMT+14:00) Apia','Pacific/Apia',14),(318,193,'(GMT+01:00) Rome','Europe/Rome',1),(319,194,'(GMT+00:00) Abidjan','Africa/Abidjan',0),(320,195,'(GMT+03:00) Riyadh','Asia/Riyadh',3),(321,196,'(GMT+00:00) Abidjan','Africa/Abidjan',0),(322,197,'(GMT+01:00) Central European Time - Belgrade','Europe/Belgrade',1),(323,198,'(GMT+04:00) Mahe','Indian/Mahe',4),(324,199,'(GMT+00:00) Abidjan','Africa/Abidjan',0),(325,200,'(GMT+08:00) Singapore','Asia/Singapore',8),(326,201,'(GMT-04:00) Curacao','America/Curacao',-4),(327,202,'(GMT+01:00) Central European Time - Prague','Europe/Prague',1),(328,203,'(GMT+01:00) Central European Time - Belgrade','Europe/Belgrade',1),(329,204,'(GMT+11:00) Guadalcanal','Pacific/Guadalcanal',11),(330,205,'(GMT+03:00) Nairobi','Africa/Nairobi',3),(331,206,'(GMT+02:00) Johannesburg','Africa/Johannesburg',2),(332,207,'(GMT-02:00) South Georgia','Atlantic/South_Georgia',-2),(333,266,'(GMT+09:00) Seoul','Asia/Seoul',9),(334,208,'(GMT+03:00) Khartoum','Africa/Khartoum',3),(335,209,'(GMT+00:00) Canary Islands','Atlantic/Canary',0),(336,209,'(GMT+01:00) Ceuta','Africa/Ceuta',1),(337,209,'(GMT+01:00) Madrid','Europe/Madrid',1),(338,210,'(GMT+05:30) Colombo','Asia/Colombo',5.5),(339,185,'(GMT-11:00) Niue','Pacific/Niue',-11),(340,185,'(GMT-11:00) Pago Pago','Pacific/Pago_Pago',-11),(341,185,'(GMT-10:00) Hawaii Time','Pacific/Honolulu',-10),(342,185,'(GMT-10:00) Rarotonga','Pacific/Rarotonga',-10),(343,185,'(GMT-10:00) Tahiti','Pacific/Tahiti',-10),(344,185,'(GMT-09:30) Marquesas','Pacific/Marquesas',-9.5),(345,185,'(GMT-09:00) Alaska Time','America/Anchorage',-9),(346,185,'(GMT-09:00) Gambier','Pacific/Gambier',-9),(347,185,'(GMT-08:00) Pacific Time','America/Los_Angeles',-8),(348,185,'(GMT-08:00) Pacific Time - Tijuana','America/Tijuana',-8),(349,185,'(GMT-08:00) Pacific Time - Vancouver','America/Vancouver',-8),(350,185,'(GMT-08:00) Pacific Time - Whitehorse','America/Whitehorse',-8),(351,185,'(GMT-08:00) Pitcairn','Pacific/Pitcairn',-8),(352,185,'(GMT-07:00) Mountain Time - Dawson Creek','America/Dawson_Creek',-7),(353,185,'(GMT-07:00) Mountain Time','America/Denver',-7),(354,185,'(GMT-07:00) Mountain Time - Edmonton','America/Edmonton',-7),(355,185,'(GMT-07:00) Mountain Time - Hermosillo','America/Hermosillo',-7),(356,185,'(GMT-07:00) Mountain Time - Chihuahua, Mazatlan','America/Mazatlan',-7),(357,185,'(GMT-07:00) Mountain Time - Arizona','America/Phoenix',-7),(358,185,'(GMT-07:00) Mountain Time - Yellowknife','America/Yellowknife',-7),(359,185,'(GMT-06:00) Belize','America/Belize',-6),(360,185,'(GMT-06:00) Central Time','America/Chicago',-6),(361,185,'(GMT-06:00) Costa Rica','America/Costa_Rica',-6),(362,185,'(GMT-06:00) El Salvador','America/El_Salvador',-6),(363,185,'(GMT-06:00) Guatemala','America/Guatemala',-6),(364,185,'(GMT-06:00) Managua','America/Managua',-6),(365,185,'(GMT-06:00) Central Time - Mexico City','America/Mexico_City',-6),(366,185,'(GMT-06:00) Central Time - Regina','America/Regina',-6),(367,185,'(GMT-06:00) Central Time - Tegucigalpa','America/Tegucigalpa',-6),(368,185,'(GMT-06:00) Central Time - Winnipeg','America/Winnipeg',-6),(369,185,'(GMT-06:00) Galapagos','Pacific/Galapagos',-6),(370,185,'(GMT-05:00) Bogota','America/Bogota',-5),(371,185,'(GMT-05:00) America Cancun','America/Cancun',-5),(372,185,'(GMT-05:00) Cayman','America/Cayman',-5),(373,185,'(GMT-05:00) Guayaquil','America/Guayaquil',-5),(374,185,'(GMT-05:00) Havana','America/Havana',-5),(375,185,'(GMT-05:00) Eastern Time - Iqaluit','America/Iqaluit',-5),(376,185,'(GMT-05:00) Jamaica','America/Jamaica',-5),(377,185,'(GMT-05:00) Lima','America/Lima',-5),(378,185,'(GMT-05:00) Nassau','America/Nassau',-5),(379,185,'(GMT-05:00) Eastern Time','America/New_York',-5),(380,185,'(GMT-05:00) Panama','America/Panama',-5),(381,185,'(GMT-05:00) Port-au-Prince','America/Port-au-Prince',-5),(382,185,'(GMT-05:00) Rio Branco','America/Rio_Branco',-5),(383,185,'(GMT-05:00) Eastern Time - Toronto','America/Toronto',-5),(384,185,'(GMT-05:00) Easter Island','Pacific/Easter',-5),(385,185,'(GMT-04:30) Caracas','America/Caracas',-4.5),(386,185,'(GMT-03:00) Asuncion','America/Asuncion',-3),(387,185,'(GMT-04:00) Barbados','America/Barbados',-4),(388,185,'(GMT-04:00) Boa Vista','America/Boa_Vista',-4),(389,185,'(GMT-03:00) Campo Grande','America/Campo_Grande',-3),(390,185,'(GMT-03:00) Cuiaba','America/Cuiaba',-3),(391,185,'(GMT-04:00) Curacao','America/Curacao',-4),(392,185,'(GMT-04:00) Grand Turk','America/Grand_Turk',-4),(393,185,'(GMT-04:00) Guyana','America/Guyana',-4),(394,185,'(GMT-04:00) Atlantic Time - Halifax','America/Halifax',-4),(395,185,'(GMT-04:00) La Paz','America/La_Paz',-4),(396,185,'(GMT-04:00) Manaus','America/Manaus',-4),(397,185,'(GMT-04:00) Martinique','America/Martinique',-4),(398,185,'(GMT-04:00) Port of Spain','America/Port_of_Spain',-4),(399,185,'(GMT-04:00) Porto Velho','America/Porto_Velho',-4),(400,185,'(GMT-04:00) Puerto Rico','America/Puerto_Rico',-4),(401,185,'(GMT-04:00) Santo Domingo','America/Santo_Domingo',-4),(402,185,'(GMT-04:00) Thule','America/Thule',-4),(403,185,'(GMT-04:00) Bermuda','Atlantic/Bermuda',-4),(404,185,'(GMT-03:30) Newfoundland Time - St. Johns','America/St_Johns',-3.5),(405,185,'(GMT-03:00) Araguaina','America/Araguaina',-3),(406,185,'(GMT-03:00) Buenos Aires','America/Argentina/Buenos_Aires',-3),(407,185,'(GMT-03:00) Salvador','America/Bahia',-3),(408,185,'(GMT-03:00) Belem','America/Belem',-3),(409,185,'(GMT-03:00) Cayenne','America/Cayenne',-3),(410,185,'(GMT-03:00) Fortaleza','America/Fortaleza',-3),(411,185,'(GMT-03:00) Godthab','America/Godthab',-3),(412,185,'(GMT-03:00) Maceio','America/Maceio',-3),(413,185,'(GMT-03:00) Miquelon','America/Miquelon',-3),(414,185,'(GMT-03:00) Montevideo','America/Montevideo',-3),(415,185,'(GMT-03:00) Paramaribo','America/Paramaribo',-3),(416,185,'(GMT-03:00) Recife','America/Recife',-3),(417,185,'(GMT-03:00) Santiago','America/Santiago',-3),(418,185,'(GMT-02:00) Sao Paulo','America/Sao_Paulo',-2),(419,185,'(GMT-03:00) Palmer','Antarctica/Palmer',-3),(420,185,'(GMT-03:00) Rothera','Antarctica/Rothera',-3),(421,185,'(GMT-03:00) Stanley','Atlantic/Stanley',-3),(422,185,'(GMT-02:00) Noronha','America/Noronha',-2),(423,185,'(GMT-02:00) South Georgia','Atlantic/South_Georgia',-2),(424,185,'(GMT-01:00) Scoresbysund','America/Scoresbysund',-1),(425,185,'(GMT-01:00) Azores','Atlantic/Azores',-1),(426,185,'(GMT-01:00) Cape Verde','Atlantic/Cape_Verde',-1),(427,185,'(GMT+00:00) Abidjan','Africa/Abidjan',0),(428,185,'(GMT+00:00) Accra','Africa/Accra',0),(429,185,'(GMT+00:00) Bissau','Africa/Bissau',0),(430,185,'(GMT+00:00) Casablanca','Africa/Casablanca',0),(431,185,'(GMT+00:00) El Aaiun','Africa/El_Aaiun',0),(432,185,'(GMT+00:00) Monrovia','Africa/Monrovia',0),(433,185,'(GMT+00:00) Danmarkshavn','America/Danmarkshavn',0),(434,185,'(GMT+00:00) Canary Islands','Atlantic/Canary',0),(435,185,'(GMT+00:00) Faeroe','Atlantic/Faroe',0),(436,185,'(GMT+00:00) Reykjavik','Atlantic/Reykjavik',0),(437,185,'(GMT+00:00) GMT(no daylight saving)','Etc/GMT',0),(438,185,'(GMT+00:00) Dublin','Europe/Dublin',0),(439,185,'(GMT+00:00) Lisbon','Europe/Lisbon',0),(440,185,'(GMT+00:00) London','Europe/London',0),(441,185,'(GMT+01:00) Algiers','Africa/Algiers',1),(442,185,'(GMT+01:00) Ceuta','Africa/Ceuta',1),(443,185,'(GMT+01:00) Lagos','Africa/Lagos',1),(444,185,'(GMT+01:00) Ndjamena','Africa/Ndjamena',1),(445,185,'(GMT+01:00) Tunis','Africa/Tunis',1),(446,185,'(GMT+02:00) Windhoek','Africa/Windhoek',2),(447,185,'(GMT+01:00) Amsterdam','Europe/Amsterdam',1),(448,185,'(GMT+01:00) Andorra','Europe/Andorra',1),(449,185,'(GMT+01:00) Central European Time - Belgrade','Europe/Belgrade',1),(450,185,'(GMT+01:00) Berlin','Europe/Berlin',1),(451,185,'(GMT+01:00) Brussels','Europe/Brussels',1),(452,185,'(GMT+01:00) Budapest','Europe/Budapest',1),(453,185,'(GMT+01:00) Copenhagen','Europe/Copenhagen',1),(454,185,'(GMT+01:00) Gibraltar','Europe/Gibraltar',1),(455,185,'(GMT+01:00) Luxembourg','Europe/Luxembourg',1),(456,185,'(GMT+01:00) Madrid','Europe/Madrid',1),(457,185,'(GMT+01:00) Malta','Europe/Malta',1),(458,185,'(GMT+01:00) Monaco','Europe/Monaco',1),(459,185,'(GMT+01:00) Oslo','Europe/Oslo',1),(460,185,'(GMT+01:00) Paris','Europe/Paris',1),(461,185,'(GMT+01:00) Central European Time - Prague','Europe/Prague',1),(462,185,'(GMT+01:00) Rome','Europe/Rome',1),(463,185,'(GMT+01:00) Stockholm','Europe/Stockholm',1),(464,185,'(GMT+01:00) Tirane','Europe/Tirane',1),(465,185,'(GMT+01:00) Vienna','Europe/Vienna',1),(466,185,'(GMT+01:00) Warsaw','Europe/Warsaw',1),(467,185,'(GMT+01:00) Zurich','Europe/Zurich',1),(468,185,'(GMT+02:00) Cairo','Africa/Cairo',2),(469,185,'(GMT+02:00) Johannesburg','Africa/Johannesburg',2),(470,185,'(GMT+02:00) Maputo','Africa/Maputo',2),(471,185,'(GMT+02:00) Tripoli','Africa/Tripoli',2),(472,185,'(GMT+02:00) Amman','Asia/Amman',2),(473,185,'(GMT+02:00) Beirut','Asia/Beirut',2),(474,185,'(GMT+02:00) Damascus','Asia/Damascus',2),(475,185,'(GMT+02:00) Gaza','Asia/Gaza',2),(476,185,'(GMT+02:00) Jerusalem','Asia/Jerusalem',2),(477,185,'(GMT+02:00) Nicosia','Asia/Nicosia',2),(478,185,'(GMT+02:00) Athens','Europe/Athens',2),(479,185,'(GMT+02:00) Bucharest','Europe/Bucharest',2),(480,185,'(GMT+02:00) Chisinau','Europe/Chisinau',2),(481,185,'(GMT+02:00) Helsinki','Europe/Helsinki',2),(482,185,'(GMT+02:00) Istanbul','Europe/Istanbul',2),(483,185,'(GMT+02:00) Moscow-01 - Kaliningrad','Europe/Kaliningrad',2),(484,185,'(GMT+02:00) Kiev','Europe/Kiev',2),(485,185,'(GMT+02:00) Riga','Europe/Riga',2),(486,185,'(GMT+02:00) Sofia','Europe/Sofia',2),(487,185,'(GMT+02:00) Tallinn','Europe/Tallinn',2),(488,185,'(GMT+02:00) Vilnius','Europe/Vilnius',2),(489,185,'(GMT+03:00) Khartoum','Africa/Khartoum',3),(490,185,'(GMT+03:00) Nairobi','Africa/Nairobi',3),(491,185,'(GMT+03:00) Syowa','Antarctica/Syowa',3),(492,185,'(GMT+03:00) Baghdad','Asia/Baghdad',3),(493,185,'(GMT+03:00) Qatar','Asia/Qatar',3),(494,185,'(GMT+03:00) Riyadh','Asia/Riyadh',3),(495,185,'(GMT+03:00) Minsk','Europe/Minsk',3),(496,185,'(GMT+03:00) Moscow+00 - Moscow','Europe/Moscow',3),(497,185,'(GMT+03:30) Tehran','Asia/Tehran',3.5),(498,185,'(GMT+04:00) Baku','Asia/Baku',4),(499,185,'(GMT+04:00) Dubai','Asia/Dubai',4),(500,185,'(GMT+04:00) Tbilisi','Asia/Tbilisi',4),(501,185,'(GMT+04:00) Yerevan','Asia/Yerevan',4),(502,185,'(GMT+04:00) Moscow+01 - Samara','Europe/Samara',4),(503,185,'(GMT+04:00) Mahe','Indian/Mahe',4),(504,185,'(GMT+04:00) Mauritius','Indian/Mauritius',4),(505,185,'(GMT+04:00) Reunion','Indian/Reunion',4),(506,185,'(GMT+04:30) Kabul','Asia/Kabul',4.5),(507,185,'(GMT+05:00) Mawson','Antarctica/Mawson',5),(508,185,'(GMT+05:00) Aqtau','Asia/Aqtau',5),(509,185,'(GMT+05:00) Aqtobe','Asia/Aqtobe',5),(510,185,'(GMT+05:00) Ashgabat','Asia/Ashgabat',5),(511,185,'(GMT+05:00) Dushanbe','Asia/Dushanbe',5),(512,185,'(GMT+05:00) Karachi','Asia/Karachi',5),(513,185,'(GMT+05:00) Tashkent','Asia/Tashkent',5),(514,185,'(GMT+05:00) Moscow+02 - Yekaterinburg','Asia/Yekaterinburg',5),(515,185,'(GMT+05:00) Kerguelen','Indian/Kerguelen',5),(516,185,'(GMT+05:00) Maldives','Indian/Maldives',5),(517,185,'(GMT+05:30) India Standard Time','Asia/Calcutta',5.5),(518,185,'(GMT+05:30) Colombo','Asia/Colombo',5.5),(519,185,'(GMT+05:45) Katmandu','Asia/Katmandu',5.45),(520,185,'(GMT+06:00) Vostok','Antarctica/Vostok',6),(521,185,'(GMT+06:00) Almaty','Asia/Almaty',6),(522,185,'(GMT+06:00) Bishkek','Asia/Bishkek',6),(523,185,'(GMT+06:00) Dhaka','Asia/Dhaka',6),(524,185,'(GMT+06:00) Moscow+03 - Omsk, Novosibirsk','Asia/Omsk',6),(525,185,'(GMT+06:00) Thimphu','Asia/Thimphu',6),(526,185,'(GMT+06:00) Chagos','Indian/Chagos',6),(527,185,'(GMT+06:30) Rangoon','Asia/Rangoon',6.5),(528,185,'(GMT+06:30) Cocos','Indian/Cocos',6.5),(529,185,'(GMT+07:00) Davis','Antarctica/Davis',7),(530,185,'(GMT+07:00) Bangkok','Asia/Bangkok',7),(531,185,'(GMT+07:00) Hovd','Asia/Hovd',7),(532,185,'(GMT+07:00) Jakarta','Asia/Jakarta',7),(533,185,'(GMT+07:00) Moscow+04 - Krasnoyarsk','Asia/Krasnoyarsk',7),(534,185,'(GMT+07:00) Hanoi','Asia/Saigon',7),(535,185,'(GMT+07:00) Christmas','Indian/Christmas',7),(536,185,'(GMT+08:00) Casey','Antarctica/Casey',8),(537,185,'(GMT+08:00) Brunei','Asia/Brunei',8),(538,185,'(GMT+08:00) Choibalsan','Asia/Choibalsan',8),(539,185,'(GMT+08:00) Hong Kong','Asia/Hong_Kong',8),(540,185,'(GMT+08:00) Moscow+05 - Irkutsk','Asia/Irkutsk',8),(541,185,'(GMT+08:00) Kuala Lumpur','Asia/Kuala_Lumpur',8),(542,185,'(GMT+08:00) Macau','Asia/Macau',8),(543,185,'(GMT+08:00) Makassar','Asia/Makassar',8),(544,185,'(GMT+08:00) Manila','Asia/Manila',8),(545,185,'(GMT+08:00) China Time - Beijing','Asia/Shanghai',8),(546,185,'(GMT+08:00) Singapore','Asia/Singapore',8),(547,185,'(GMT+08:00) Taipei','Asia/Taipei',8),(548,185,'(GMT+08:00) Ulaanbaatar','Asia/Ulaanbaatar',8),(549,185,'(GMT+08:00) Western Time - Perth','Australia/Perth',8),(550,185,'(GMT+08:30) Pyongyang','Asia/Pyongyang',8.5),(551,185,'(GMT+09:00) Dili','Asia/Dili',9),(552,185,'(GMT+09:00) Jayapura','Asia/Jayapura',9),(553,185,'(GMT+09:00) Seoul','Asia/Seoul',9),(554,185,'(GMT+09:00) Tokyo','Asia/Tokyo',9),(555,185,'(GMT+09:00) Moscow+06 - Yakutsk','Asia/Yakutsk',9),(556,185,'(GMT+09:00) Palau','Pacific/Palau',9),(557,185,'(GMT+10:30) Central Time - Adelaide','Australia/Adelaide',10.5),(558,185,'(GMT+09:30) Central Time - Darwin','Australia/Darwin',9.5),(559,185,'(GMT+10:00) Dumont D\'Urville','Antarctica/DumontDUrville',10),(560,185,'(GMT+10:00) Moscow+08 - Magadan','Asia/Magadan',10),(561,185,'(GMT+10:00) Moscow+07 - Yuzhno-Sakhalinsk','Asia/Vladivostok',10),(562,185,'(GMT+10:00) Eastern Time - Brisbane','Australia/Brisbane',10),(563,185,'(GMT+11:00) Eastern Time - Hobart','Australia/Hobart',11),(564,185,'(GMT+11:00) Eastern Time - Melbourne, Sydney','Australia/Sydney',11),(565,185,'(GMT+10:00) Truk','Pacific/Chuuk',10),(566,185,'(GMT+10:00) Guam','Pacific/Guam',10),(567,185,'(GMT+10:00) Port Moresby','Pacific/Port_Moresby',10),(568,185,'(GMT+11:00) Efate','Pacific/Efate',11),(569,185,'(GMT+11:00) Guadalcanal','Pacific/Guadalcanal',11),(570,185,'(GMT+11:00) Kosrae','Pacific/Kosrae',11),(571,185,'(GMT+11:00) Norfolk','Pacific/Norfolk',11),(572,185,'(GMT+11:00) Noumea','Pacific/Noumea',11),(573,185,'(GMT+11:00) Ponape','Pacific/Pohnpei',11),(574,185,'(GMT+12:00) Moscow+09 - Petropavlovsk-Kamchatskiy','Asia/Kamchatka',12),(575,185,'(GMT+13:00) Auckland','Pacific/Auckland',13),(576,185,'(GMT+13:00) Fiji','Pacific/Fiji',13),(577,185,'(GMT+12:00) Funafuti','Pacific/Funafuti',12),(578,185,'(GMT+12:00) Kwajalein','Pacific/Kwajalein',12),(579,185,'(GMT+12:00) Majuro','Pacific/Majuro',12),(580,185,'(GMT+12:00) Nauru','Pacific/Nauru',12),(581,185,'(GMT+12:00) Tarawa','Pacific/Tarawa',12),(582,185,'(GMT+12:00) Wake','Pacific/Wake',12),(583,185,'(GMT+12:00) Wallis','Pacific/Wallis',12),(584,185,'(GMT+14:00) Apia','Pacific/Apia',14),(585,185,'(GMT+13:00) Enderbury','Pacific/Enderbury',13),(586,185,'(GMT+13:00) Fakaofo','Pacific/Fakaofo',13),(587,185,'(GMT+13:00) Tongatapu','Pacific/Tongatapu',13),(588,185,'(GMT+14:00) Kiritimati','Pacific/Kiritimati',14),(591,186,'(GMT+00:00) Abidjan','Africa/Abidjan',0),(592,187,'(GMT-04:00) Port of Spain','America/Port_of_Spain',-4),(593,188,'(GMT-04:00) Port of Spain','America/Port_of_Spain',-4),(594,189,'(GMT-04:00) Port of Spain','America/Port_of_Spain',-4),(595,190,'(GMT-03:00) Miquelon','America/Miquelon',-3),(596,191,'(GMT-04:00) Port of Spain','America/Port_of_Spain',-4),(597,211,'(GMT+03:00) Khartoum','Africa/Khartoum',3),(598,212,'(GMT-03:00) Paramaribo','America/Paramaribo',-3),(599,213,'(GMT+01:00) Oslo','Europe/Oslo',1),(600,214,'(GMT+02:00) Johannesburg','Africa/Johannesburg',2),(601,215,'(GMT+01:00) Stockholm','Europe/Stockholm',1),(602,216,'(GMT+01:00) Zurich','Europe/Zurich',1),(603,267,'(GMT+02:00) Damascus','Asia/Damascus',2),(604,218,'(GMT+08:00) Taipei','Asia/Taipei',8),(605,219,'(GMT+05:00) Dushanbe','Asia/Dushanbe',5),(606,220,'(GMT+03:00) Nairobi','Africa/Nairobi',3),(607,221,'(GMT+07:00) Bangkok','Asia/Bangkok',7),(608,222,'(GMT+09:00) Dili','Asia/Dili',9),(609,223,'(GMT+00:00) Abidjan','Africa/Abidjan',0),(610,224,'(GMT+13:00) Fakaofo','Pacific/Fakaofo',13),(611,225,'(GMT+13:00) Tongatapu','Pacific/Tongatapu',13),(612,226,'(GMT-04:00) Port of Spain','America/Port_of_Spain',-4),(613,186,'(GMT-10:00) Hawaii Time','Pacific/Honolulu',-10),(614,186,'(GMT-09:00) Alaska Time','America/Anchorage',-9),(615,186,'(GMT-08:00) Pacific Time','America/Los_Angeles',-8),(616,186,'(GMT-07:00) Mountain Time','America/Denver',-7),(617,186,'(GMT-07:00) Mountain Time - Arizona','America/Phoenix',-7),(618,186,'(GMT-06:00) Central Time','America/Chicago',-6),(619,186,'(GMT-05:00) Eastern Time','America/New_York',-5),(620,227,'(GMT+01:00) Tunis','Africa/Tunis',1),(621,228,'(GMT+02:00) Istanbul','Europe/Istanbul',2),(622,229,'(GMT+05:00) Ashgabat','Asia/Ashgabat',5),(623,230,'(GMT-04:00) Grand Turk','America/Grand_Turk',-4),(624,231,'(GMT+12:00) Funafuti','Pacific/Funafuti',12),(625,237,'(GMT-11:00) Pago Pago','Pacific/Pago_Pago',-11),(626,237,'(GMT-10:00) Hawaii Time','Pacific/Honolulu',-10),(627,237,'(GMT+12:00) Wake','Pacific/Wake',12),(628,237,'(GMT+13:00) Enderbury','Pacific/Enderbury',13),(629,244,'(GMT-04:00) Port of Spain','America/Port_of_Spain',-4),(630,232,'(GMT+03:00) Nairobi','Africa/Nairobi',3),(631,233,'(GMT+02:00) Kiev','Europe/Kiev',2),(632,234,'(GMT+04:00) Dubai','Asia/Dubai',4),(633,235,'(GMT+00:00) London','Europe/London',0),(634,238,'(GMT-03:00) Montevideo','America/Montevideo',-3),(635,239,'(GMT+05:00) Tashkent','Asia/Tashkent',5),(636,240,'(GMT+11:00) Efate','Pacific/Efate',11),(637,98,'(GMT+01:00) Rome','Europe/Rome',1),(638,241,'(GMT-04:30) Caracas','America/Caracas',-4.5),(639,242,'(GMT+07:00) Hanoi','Asia/Saigon',7),(640,245,'(GMT+12:00) Wallis','Pacific/Wallis',12),(641,246,'(GMT+00:00) El Aaiun','Africa/El_Aaiun',0),(642,247,'(GMT+03:00) Riyadh','Asia/Riyadh',3),(643,248,'(GMT+02:00) Maputo','Africa/Maputo',2),(644,249,'(GMT+02:00) Maputo','Africa/Maputo',2);
/*!40000 ALTER TABLE `timezones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `image_file` varchar(255) DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_details`
--

LOCK TABLES `user_details` WRITE;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` VALUES (3,3,'bookingicon.png','http://www.epuratech.com','','',0,NULL,NULL,NULL,'2016-01-15 05:11:16','2016-01-18 13:16:58');
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_social_profiles`
--

DROP TABLE IF EXISTS `user_social_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_social_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `social_network_name` varchar(45) NOT NULL,
  `social_network_id` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `display_name` varchar(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `link` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_social_profiles`
--

LOCK TABLES `user_social_profiles` WRITE;
/*!40000 ALTER TABLE `user_social_profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_social_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_subscription_payments`
--

DROP TABLE IF EXISTS `user_subscription_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_subscription_payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `subscription_plan_id` int(10) unsigned NOT NULL,
  `user_subscription_id` int(10) unsigned NOT NULL,
  `payment_method_id` int(10) unsigned NOT NULL,
  `date_time` datetime NOT NULL,
  `amount_paid` decimal(10,2) unsigned NOT NULL,
  `payment_status_id` int(10) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_subscription_payments`
--

LOCK TABLES `user_subscription_payments` WRITE;
/*!40000 ALTER TABLE `user_subscription_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_subscription_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_subscriptions`
--

DROP TABLE IF EXISTS `user_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `subscription_plan_id` int(10) unsigned NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_subscriptions`
--

LOCK TABLES `user_subscriptions` WRITE;
/*!40000 ALTER TABLE `user_subscriptions` DISABLE KEYS */;
INSERT INTO `user_subscriptions` VALUES (1,1,0,'0000-00-00','0000-00-00',0.00,'2015-12-18 07:16:22','2015-12-18 07:16:22'),(2,23,1,'0000-00-00','0000-00-00',0.00,'2016-01-14 10:56:08','2016-01-14 10:56:08'),(3,24,1,'0000-00-00','0000-00-00',0.00,'2016-01-14 10:59:29','2016-01-18 05:03:35'),(4,25,1,'0000-00-00','0000-00-00',0.00,'2016-01-14 11:01:12','2016-01-14 11:01:12'),(5,26,1,'0000-00-00','0000-00-00',0.00,'2016-01-14 11:07:53','2016-01-15 06:35:27'),(6,27,1,'0000-00-00','0000-00-00',0.00,'2016-01-14 11:09:16','2016-01-14 11:09:16'),(7,28,1,'0000-00-00','0000-00-00',0.00,'2016-01-14 11:10:50','2016-01-14 11:10:50'),(8,29,1,'0000-00-00','0000-00-00',0.00,'2016-01-14 11:14:07','2016-01-14 11:14:07'),(9,3,1,'0000-00-00','0000-00-00',0.00,'2016-01-14 11:20:52','2016-01-18 05:03:19'),(10,3,1,'0000-00-00','0000-00-00',0.00,'2016-01-14 11:22:03','2016-01-14 11:22:03'),(11,3,1,'0000-00-00','0000-00-00',0.00,'2016-01-14 12:04:57','2016-01-14 12:04:57'),(12,3,1,'0000-00-00','0000-00-00',0.00,'2016-01-15 05:10:35','2016-01-15 05:10:35'),(13,3,1,'0000-00-00','0000-00-00',0.00,'2016-01-15 05:11:16','2016-01-15 05:11:16'),(14,3,1,'0000-00-00','0000-00-00',0.00,'2016-01-15 05:12:20','2016-01-15 05:12:20'),(15,22,0,'0000-00-00','0000-00-00',0.00,'2016-01-15 05:15:29','2016-01-15 05:24:09'),(16,21,0,'0000-00-00','0000-00-00',0.00,'2016-01-15 05:26:03','2016-01-15 05:26:03'),(17,25,1,'0000-00-00','0000-00-00',0.00,'2016-01-15 06:33:38','2016-01-15 06:33:38'),(18,28,1,'0000-00-00','0000-00-00',0.00,'2016-01-18 05:05:36','2016-01-18 05:05:36');
/*!40000 ALTER TABLE `user_subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `username` varchar(255) NOT NULL COMMENT 'Email Address',
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_no` bigint(10) DEFAULT NULL,
  `address` text CHARACTER SET latin1,
  `timezone_id` int(10) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,103,'admin@epuratech.com','c371958dae2afefb121e8a5bb97766888f9e4c04','Super','Admin','1988-07-28','admin@epuratech.com',9878987898,'',20,1,'2016-01-22 06:44:59','2015-12-07 16:36:31','2016-01-22 06:44:59'),(2,2,103,'user@epuratech.com','dbeab83d8eb22e42bd0c4878b64e42fbee44540f','Puratech','User','2015-10-14','user@epuratech.com',9878987898,'Mumbai, India',20,1,'2016-01-22 07:00:24','2015-12-09 10:41:11','2016-01-22 07:00:24'),(3,3,103,'supplier@epuratech.com','dbeab83d8eb22e42bd0c4878b64e42fbee44540f','Puratech','Supplier','2045-11-17','supplier@epuratech.com',9878987898,'B / 201 - 202, Antop Hill Warehousing Co, VIT College Road, Near Sangam Nagar, Antop Hill, Wadala (E), Mumbai, Maharashtra 400037',20,1,'2016-01-21 09:16:41','2015-12-09 10:41:11','2016-01-21 09:16:41'),(4,4,103,'admin@tuatos.com','b57d07ce7507a9f2bba085e991ba7667d898de69','Admin','Tuatos','2015-11-01','admin@tuatos.com',NULL,'',20,1,'2015-12-28 05:59:24','2015-12-18 05:35:29','2015-12-28 05:59:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `week_days`
--

DROP TABLE IF EXISTS `week_days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `week_days` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `week_days`
--

LOCK TABLES `week_days` WRITE;
/*!40000 ALTER TABLE `week_days` DISABLE KEYS */;
INSERT INTO `week_days` VALUES (1,'Sunday',1,'2015-12-09 12:33:47','2015-12-09 12:34:07'),(2,'Monday',1,'2015-12-09 12:34:29','2015-12-09 12:34:29'),(3,'Tuesday',1,'2015-12-09 12:34:29','2015-12-09 12:34:29'),(4,'Wednesday',1,'2015-12-09 12:34:29','2015-12-09 12:34:29'),(5,'Thursday',1,'2015-12-09 12:34:29','2015-12-09 12:34:29'),(6,'Friday',1,'2015-12-09 12:34:29','2015-12-09 12:34:29'),(7,'Saturday',1,'2015-12-09 12:34:29','2015-12-09 12:34:29');
/*!40000 ALTER TABLE `week_days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishlists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `attraction_id` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (31,1,7,'2016-01-05 07:28:14','2016-01-05 07:28:14'),(32,95,6,'2016-01-07 06:52:35','2016-01-07 06:52:35'),(53,22,1,'2016-01-11 06:26:07','2016-01-11 06:26:07'),(55,1,8,'2016-01-15 11:33:08','2016-01-15 11:33:08'),(70,2,1,'2016-01-19 13:11:43','2016-01-19 13:11:43');
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zones`
--

DROP TABLE IF EXISTS `zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zones`
--

LOCK TABLES `zones` WRITE;
/*!40000 ALTER TABLE `zones` DISABLE KEYS */;
INSERT INTO `zones` VALUES (1,'Asia',1,'2016-01-04 13:17:37','2016-01-04 13:54:34'),(2,'North America',1,'2016-01-11 08:45:47','2016-01-11 08:45:47'),(3,'South America',1,'2016-01-11 08:46:03','2016-01-11 08:46:03'),(4,'Europe',1,'2016-01-11 08:46:12','2016-01-11 08:46:12'),(5,'Africa',1,'2016-01-11 08:46:19','2016-01-11 08:46:19'),(7,'Australia & Oceania',1,'2016-01-11 08:46:40','2016-01-11 08:46:40');
/*!40000 ALTER TABLE `zones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-22 12:43:53
