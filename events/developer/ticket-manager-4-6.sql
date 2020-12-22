CREATE DATABASE  IF NOT EXISTS `ticket-manager` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ticket-manager`;
-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: ticket-manager
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Athens'),(2,'Thessaloniki'),(3,'Serres'),(4,'Larisa');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Description` longtext NOT NULL,
  `ImgUrl` longtext NOT NULL,
  `VenueId` int NOT NULL,
  `EndTime` datetime NOT NULL,
  `FamilyEventId` int NOT NULL,
  `StartDateTime` datetime NOT NULL,
  `EventTypeId` int NOT NULL,
  `Price` double NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `EventTypeId` (`EventTypeId`),
  KEY `FamilyEventId` (`FamilyEventId`),
  KEY `VenueId` (`VenueId`),
  CONSTRAINT `Event_EventTypeId_fk` FOREIGN KEY (`EventTypeId`) REFERENCES `eventtype` (`Id`),
  CONSTRAINT `Event_FamilyEventId_fk` FOREIGN KEY (`FamilyEventId`) REFERENCES `familyevent` (`Id`),
  CONSTRAINT `Event_VenueId_fk` FOREIGN KEY (`VenueId`) REFERENCES `venue` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'PHP regular Meetup','This is a test text about a regular meetup about PHP scripting language. We assume that you will like our meeting that is completely free to join! Many interesting subjects will be discussed and analysed in depth. Laboratory exercises and live scripting are some other features that will take place.\r\n\r\nWe will be happy to meet you!','php_meetup.jpg',1,'2020-07-31 15:00:00',2,'2020-05-30 10:30:00',1,0),(2,'Η λίμνη των κύκνων','This is a test text about Rockwave Festival.','limni_kiknon.jpg',2,'2020-09-20 21:00:00',9,'2020-09-17 09:00:00',6,20),(3,'Η λίμνη των κύκνων','This is a sample text about TRIO EL GRECO HAYDN - BEETHOVEN: THE TEACHER AND THE STUDENT','limni_kiknon.jpg',3,'2020-08-15 20:00:00',9,'2020-08-15 17:00:00',6,10),(4,'PHP regular Meetup','This is a test text about a regular meetup about PHP scripting language. We assume that you will like our meeting that is completely free to join! Many interesting subjects will be discussed and analysed in depth. Laboratory exercises and live scripting are some other features that will take place.\r\n\r\nWe will be happy to meet you!','php_meetup.jpg',4,'2020-07-31 15:00:00',2,'2020-05-30 10:30:00',1,0),(10,'Η λίμνη των κύκνων','vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit','limni_kiknon.jpg',5,'2021-03-21 20:49:47',9,'2020-11-17 12:13:33',6,19),(31,'Σεμινάριο HTML','orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt','Html5.jpg',1,'2021-05-20 19:48:06',7,'2021-04-03 16:17:07',1,6),(46,'Η λίμνη των κύκνων','rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit','limni_kiknon.jpg',4,'2020-08-22 17:24:26',9,'2020-12-06 20:04:23',6,19),(47,'Το ημέρωμα της στρίγκλας','a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam','HMEROMA.jpg',5,'2020-07-22 17:48:26',12,'2021-01-29 15:08:14',2,7),(49,'Σεμινάριο ASP .NET','rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit','aspnet.jpg',5,'2020-08-22 17:24:26',6,'2020-12-06 20:04:23',1,19),(50,'Το ημέρωμα της στρίγκλας','a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam','HMEROMA.jpg',1,'2020-07-22 17:48:26',12,'2021-01-29 15:08:14',2,7),(53,'Το ημέρωμα της στρίγκλας','vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam','HMEROMA.jpg',2,'2020-09-26 14:43:31',12,'2020-10-09 04:37:40',2,6),(54,'MySQL Workshop','magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu','mysql_logo.jpg',3,'2020-09-24 16:57:35',5,'2020-10-14 14:45:41',4,9),(56,'Το ημέρωμα της στρίγκλας','magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu','HMEROMA.jpg',3,'2020-09-24 16:57:35',12,'2020-10-14 14:45:41',2,9),(59,'Το ημέρωμα της στρίγκλας','placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus','HMEROMA.jpg',5,'2020-06-23 06:55:18',12,'2021-05-07 10:32:08',2,12),(60,'Το ημέρωμα της στρίγκλας','Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum.','HMEROMA.jpg',2,'2021-01-28 22:19:04',12,'2021-05-19 04:38:36',2,6),(61,'Amore','nec ligula consectetuer rhoncus. Nullam velit','Zakharova_Rodkin.jpg',3,'2021-04-02 16:08:53',11,'2021-01-05 07:21:56',2,11),(62,'Το ημέρωμα της στρίγκλας','Aenean egestas hendrerit neque. In ornare','HMEROMA.jpg',5,'2020-10-19 05:19:08',12,'2020-08-14 00:32:48',2,29),(63,'Το ημέρωμα της στρίγκλας','Nullam velit dui, semper et, lacinia','HMEROMA.jpg',1,'2020-07-29 12:43:12',12,'2020-07-13 17:21:54',2,13),(64,'Σεμινάριο Javascript','Vivamus euismod urna. Nullam lobortis quam','avascript.jpg',6,'2020-09-09 15:33:17',4,'2020-06-04 11:53:24',7,50),(65,'Η λίμνη των κύκνων','mauris. Integer sem elit, pharetra ut,','limni_kiknon.jpg',3,'2020-07-27 01:17:53',9,'2020-06-02 17:39:13',6,4),(66,'Ομήρου Οδύσσεια','condimentum. Donec at arcu. Vestibulum ante','athinorama.jpg',5,'2020-12-09 03:34:13',3,'2020-11-11 16:47:21',3,36),(67,'Η λίμνη των κύκνων','dignissim lacus. Aliquam rutrum lorem ac','limni_kiknon.jpg',6,'2020-11-05 09:40:51',9,'2020-09-05 23:40:11',6,36),(68,'Ο Κουρσάρος','Praesent interdum ligula eu enim. Etiam','le-corsaire-bolshoi.jpg',5,'2020-10-05 12:04:26',10,'2021-05-23 05:19:02',3,44),(71,'Η λίμνη των κύκνων','Aliquam vulputate ullamcorper magna. Sed eu','limni_kiknon.jpg',2,'2020-12-14 10:59:17',9,'2020-08-08 13:51:47',6,10),(72,'Η λίμνη των κύκνων','ac arcu. Nunc mauris. Morbi non','limni_kiknon.jpg',5,'2021-03-29 22:31:15',9,'2021-03-27 14:46:02',6,26),(73,'Η λίμνη των κύκνων','ullamcorper magna. Sed eu eros. Nam','limni_kiknon.jpg',3,'2020-10-08 19:17:35',9,'2021-04-16 11:34:47',6,2),(74,'Άμλετ','Nam interdum enim non nisi. Aenean','hamletimg.jpg',3,'2020-12-03 06:39:57',1,'2021-05-06 05:47:02',3,8),(75,'Άμλετ','Duis a mi fringilla mi lacinia','hamletimg.jpg',5,'2020-08-21 06:24:16',1,'2020-08-11 20:01:23',3,11),(76,'Άμλετ','Cras eu tellus eu augue porttitor','hamletimg.jpg',5,'2021-02-26 20:21:20',1,'2021-04-23 18:50:30',3,13),(77,'Άμλετ','pharetra ut, pharetra sed, hendrerit a,','hamletimg.jpg',1,'2020-11-12 16:17:54',1,'2020-12-15 12:22:45',3,1),(78,'Άμλετ','cursus. Nunc mauris elit, dictum eu,','hamletimg.jpg',5,'2020-08-29 23:59:37',1,'2020-11-15 13:04:14',3,2),(81,'Σεμινάριο Digital Marketing','metus. In nec orci. Donec nibh.','digitalmarketing.jpg',1,'2020-11-24 18:02:47',8,'2020-10-23 04:51:40',1,42),(82,'Ομήρου Οδύσσεια','Vestibulum ante ipsum primis in faucibus','athinorama.jpg',2,'2020-11-22 13:30:42',3,'2020-10-15 04:35:40',5,38),(83,'Άμλετ','lobortis quam a felis ullamcorper viverra.','hamletimg.jpg',4,'2021-03-28 06:34:58',1,'2021-01-05 21:47:29',3,11),(84,'Σεμινάριο ASP .NET','lorem fringilla ornare placerat, orci lacus','aspnet.jpg',3,'2020-09-24 01:50:33',6,'2020-10-28 01:11:59',1,4),(85,'Ομήρου Οδύσσεια','elementum sem, vitae aliquam eros turpis','athinorama.jpg',4,'2020-08-12 20:33:30',3,'2020-12-26 11:07:05',5,12),(86,'Άμλετ','vehicula et, rutrum eu, ultrices sit','hamletimg.jpg',4,'2021-05-18 18:02:58',1,'2020-09-06 19:07:18',3,26),(91,'Σεμινάριο HTML','parturient montes, nascetur ridiculus mus. Donec','Html5.jpg',5,'2020-07-17 15:17:25',7,'2021-01-13 11:21:42',1,47),(92,'Άμλετ','Vestibulum ante ipsum primis in faucibus','hamletimg.jpg',5,'2020-06-22 23:28:09',1,'2020-07-11 11:03:30',3,0),(93,'Σεμινάριο Digital Marketing','Suspendisse commodo tincidunt nibh. Phasellus nulla.','digitalmarketing.jpg',4,'2020-11-08 08:59:50',8,'2021-02-28 23:28:12',1,2),(94,'Άμλετ','tincidunt adipiscing. Mauris molestie pharetra nibh.','hamletimg.jpg',6,'2020-10-11 09:35:02',1,'2020-09-24 11:45:55',3,39),(95,'MySQL Workshop','ornare, facilisis eget, ipsum. Donec sollicitudin','mysql_logo.jpg',4,'2020-10-25 20:32:43',5,'2021-01-20 10:40:49',4,30),(96,'Ομήρου Οδύσσεια','consectetuer adipiscing elit. Curabitur sed tortor.','athinorama.jpg',4,'2021-01-05 04:37:10',3,'2020-09-26 05:53:53',5,18),(97,'Η λίμνη των κύκνων','Suspendisse sagittis. Nullam vitae diam. Proin','limni_kiknon.jpg',1,'2020-11-16 15:49:30',9,'2021-04-01 03:01:14',6,9),(98,'Ομήρου Οδύσσεια','ligula. Aenean euismod mauris eu elit.','athinorama.jpg',1,'2020-08-19 22:35:21',3,'2020-12-10 20:54:16',5,24),(101,'Ομήρου Οδύσσεια','parturient montes, nascetur ridiculus mus. Donec','athinorama.jpg',5,'2020-07-17 15:17:25',3,'2021-01-13 11:21:42',5,47),(102,'Ομήρου Οδύσσεια','Vestibulum ante ipsum primis in faucibus','athinorama.jpg',4,'2020-06-22 23:28:09',3,'2020-07-11 11:03:30',5,0),(103,'Ομήρου Οδύσσεια','Suspendisse commodo tincidunt nibh. Phasellus nulla.','athinorama.jpg',3,'2020-11-08 08:59:50',3,'2021-02-28 23:28:12',3,2),(104,'Ομήρου Οδύσσεια','tincidunt adipiscing. Mauris molestie pharetra nibh.','athinorama.jpg',3,'2020-10-11 09:35:02',3,'2020-09-24 11:45:55',5,39),(105,'Σεμινάριο Javascript','ornare, facilisis eget, ipsum. Donec sollicitudin','avascript.jpg',6,'2020-10-25 20:32:43',4,'2021-01-20 10:40:49',7,30),(106,'Άμλετ','consectetuer adipiscing elit. Curabitur sed tortor.','hamletimg.jpg',4,'2021-01-05 04:37:10',1,'2020-09-26 05:53:53',3,18),(107,'Άμλετ','Suspendisse sagittis. Nullam vitae diam. Proin','hamletimg.jpg',4,'2020-11-16 15:49:30',1,'2021-04-01 03:01:14',3,9),(108,'Amore','ligula. Aenean euismod mauris eu elit.','Zakharova_Rodkin.jpg',1,'2020-08-19 22:35:21',11,'2020-12-10 20:54:16',2,24),(110,'Άμλετ','nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque','hamletimg.jpg',3,'2020-06-04 02:58:07',1,'2020-11-16 10:40:16',3,16),(111,'Άμλετ','in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas','hamletimg.jpg',3,'2020-08-01 18:36:39',1,'2021-02-05 02:10:48',3,0),(112,'Amore','molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu.','Zakharova_Rodkin.jpg',1,'2020-08-03 00:32:13',11,'2020-07-31 10:50:45',2,13),(113,'Άμλετ','nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris','hamletimg.jpg',3,'2020-09-23 00:39:44',1,'2021-05-22 09:02:44',3,1),(114,'Άμλετ','natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero','hamletimg.jpg',4,'2020-09-30 12:10:09',1,'2021-01-10 09:05:07',3,8),(115,'PHP regular Meetup','nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet','php_meetup.jpg',4,'2020-08-29 21:23:58',2,'2020-08-17 08:15:48',1,19),(116,'Άμλετ','libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris','hamletimg.jpg',5,'2021-03-26 06:52:54',1,'2021-04-02 10:53:23',3,18),(117,'Άμλετ','eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec,','hamletimg.jpg',1,'2021-03-11 07:46:24',1,'2020-07-25 06:50:22',3,9),(118,'Ο Κουρσάρος','netus et malesuada fames ac turpis egestas. Fusce aliquet magna a neque. Nullam ut nisi a odio semper cursus. Integer','le-corsaire-bolshoi.jpg',3,'2021-05-19 18:00:06',10,'2020-06-01 18:28:06',3,11),(119,'Άμλετ','Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at','hamletimg.jpg',1,'2020-08-07 23:30:33',1,'2020-11-12 03:06:46',3,9),(120,'Ο Κουρσάρος','ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id,','le-corsaire-bolshoi.jpg',3,'2021-03-04 18:56:03',10,'2020-10-21 19:29:31',3,8),(121,'Η λίμνη των κύκνων','mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus','limni_kiknon.jpg',2,'2020-08-22 14:38:05',9,'2020-09-26 09:23:06',6,0),(122,'Άμλετ','et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula','hamletimg.jpg',2,'2021-05-16 21:18:32',1,'2021-04-02 04:25:41',3,15),(123,'Άμλετ','ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus','hamletimg.jpg',4,'2020-06-05 04:20:10',1,'2020-08-12 10:41:05',3,17),(124,'Άμλετ','imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis','hamletimg.jpg',4,'2020-06-09 03:43:52',1,'2020-10-20 23:24:00',3,19),(125,'Σεμινάριο Digital Marketing','ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis.','digitalmarketing.jpg',5,'2021-05-19 12:42:00',8,'2020-08-22 17:57:47',1,2),(126,'Άμλετ','vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent','hamletimg.jpg',3,'2020-12-14 13:06:59',1,'2020-05-28 04:12:47',3,11),(127,'Άμλετ','erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl.','hamletimg.jpg',3,'2020-08-23 18:32:31',1,'2021-02-03 01:23:46',3,14),(128,'Σεμινάριο HTML','ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis.','Html5.jpg',2,'2020-11-29 03:22:16',7,'2021-02-06 14:52:39',1,4),(129,'Άμλετ','tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet','hamletimg.jpg',1,'2020-12-18 20:14:16',1,'2020-08-24 18:56:00',3,3),(130,'Άμλετ','ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat.','hamletimg.jpg',3,'2020-09-05 09:37:40',1,'2020-08-22 14:37:36',3,12),(131,'Άμλετ','sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis','hamletimg.jpg',3,'2020-05-25 16:44:27',1,'2020-12-27 14:17:12',3,18),(132,'MySQL Workshop','faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu','mysql_logo.jpg',2,'2021-05-10 16:40:52',5,'2020-11-20 04:49:32',4,5),(133,'Άμλετ','eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum','hamletimg.jpg',6,'2020-07-14 13:37:21',1,'2020-06-10 22:37:03',3,2),(134,'Σεμινάριο ASP .NET','urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;','aspnet.jpg',1,'2021-01-12 09:59:33',6,'2021-03-08 12:03:52',1,10),(135,'Άμλετ','nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut','hamletimg.jpg',6,'2021-01-19 07:30:33',1,'2021-01-11 17:28:48',3,8),(136,'Σεμινάριο Javascript','orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin','avascript.jpg',1,'2020-11-21 00:33:27',4,'2020-10-25 09:13:46',7,12),(137,'Άμλετ','Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet,','hamletimg.jpg',4,'2021-02-01 21:21:48',1,'2021-03-16 16:54:45',3,14),(138,'Άμλετ','at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis','hamletimg.jpg',1,'2020-07-28 15:34:14',1,'2020-11-29 04:20:42',3,17),(139,'Άμλετ','quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem','hamletimg.jpg',4,'2021-01-02 20:49:53',1,'2020-06-30 10:21:15',3,11),(140,'Ομήρου Οδύσσεια','arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum','athinorama.jpg',2,'2021-03-26 02:51:28',3,'2020-11-09 06:08:36',3,0),(141,'Άμλετ','urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius.','hamletimg.jpg',4,'2020-09-23 07:31:10',1,'2020-10-21 15:14:34',3,7),(142,'PHP regular Meetup','montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit','php_meetup.jpg',4,'2021-03-18 06:15:36',2,'2020-11-19 04:45:24',1,12),(143,'Άμλετ','libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum','hamletimg.jpg',6,'2021-03-20 08:40:49',1,'2020-05-26 22:53:24',3,13),(144,'Άμλετ','lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames','hamletimg.jpg',1,'2021-01-12 07:27:11',1,'2020-06-25 01:01:02',3,7),(145,'PHP regular Meetup','fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque','php_meetup.jpg',4,'2020-10-06 05:13:57',2,'2021-01-19 01:01:54',1,2),(146,'Άμλετ','pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas','hamletimg.jpg',3,'2020-12-03 14:03:13',1,'2020-05-25 04:06:37',3,0),(147,'Σεμινάριο Javascript','pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies','avascript.jpg',4,'2021-02-21 20:24:09',4,'2021-04-12 20:01:33',7,8),(148,'Άμλετ','lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras','hamletimg.jpg',1,'2020-06-12 07:59:23',1,'2020-07-16 14:29:20',3,14),(149,'Ομήρου Οδύσσεια','non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam auctor, velit eget','athinorama.jpg',6,'2020-06-24 21:44:19',3,'2020-07-18 22:59:00',3,4),(150,'Άμλετ','adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo','hamletimg.jpg',5,'2020-05-28 00:23:02',1,'2021-02-12 12:57:06',3,17),(151,'Άμλετ','in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec','hamletimg.jpg',2,'2021-04-04 17:09:11',1,'2020-11-07 15:07:59',3,16),(152,'MySQL Workshop','Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet','mysql_logo.jpg',5,'2020-10-06 07:06:49',5,'2020-11-01 00:13:22',4,1),(153,'Άμλετ','porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi','hamletimg.jpg',4,'2020-12-11 16:57:02',1,'2020-06-19 14:34:59',3,4),(154,'Σεμινάριο ASP .NET','eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem.','aspnet.jpg',3,'2021-01-01 03:18:35',6,'2020-08-26 20:21:28',1,6),(155,'Άμλετ','Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis','hamletimg.jpg',3,'2020-12-13 03:37:44',1,'2021-01-28 16:24:37',3,16),(156,'Σεμινάριο HTML','congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;','Html5.jpg',5,'2020-10-07 02:48:45',7,'2020-11-14 12:41:51',1,7),(157,'Άμλετ','tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus','hamletimg.jpg',1,'2020-08-01 09:13:13',1,'2020-10-26 09:00:43',3,11),(158,'Άμλετ','volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget','hamletimg.jpg',1,'2020-07-14 08:52:17',1,'2021-01-10 21:09:53',3,6),(159,'Σεμινάριο Digital Marketing','ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero.','digitalmarketing.jpg',2,'2020-12-06 15:38:07',8,'2020-08-13 09:45:53',1,16),(160,'Άμλετ','Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum','hamletimg.jpg',3,'2020-06-06 09:13:01',1,'2020-06-09 17:10:49',3,6),(161,'Άμλετ','nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante','hamletimg.jpg',4,'2020-06-18 03:11:46',1,'2021-01-16 05:18:27',3,7),(162,'Ο Κουρσάρος','at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero','le-corsaire-bolshoi.jpg',6,'2020-11-23 14:55:44',10,'2020-06-07 23:19:48',3,7),(163,'Άμλετ','pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus','hamletimg.jpg',4,'2020-11-15 23:43:20',1,'2020-07-29 08:00:28',3,6),(164,'Amore','non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus','Zakharova_Rodkin.jpg',4,'2020-10-28 23:40:12',11,'2020-09-13 06:05:23',2,7),(165,'Άμλετ','Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis vitae','hamletimg.jpg',4,'2020-09-15 03:07:35',1,'2020-11-30 06:27:42',3,2),(166,'Άμλετ','semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus.','hamletimg.jpg',1,'2020-09-17 11:15:00',1,'2020-07-14 07:27:07',3,16),(167,'Σεμινάριο HTML','erat, in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc','Html5.jpg',3,'2021-02-18 13:46:44',7,'2021-02-14 17:52:32',1,20),(168,'Άμλετ','justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in','hamletimg.jpg',5,'2021-04-24 10:49:23',1,'2020-09-09 00:58:50',3,2),(169,'Σεμινάριο Digital Marketing','sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim','digitalmarketing.jpg',2,'2020-10-30 00:25:52',8,'2021-01-09 18:32:31',1,2),(170,'Άμλετ','senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit.','hamletimg.jpg',1,'2021-03-22 10:21:11',1,'2020-05-25 07:45:36',3,14),(171,'Άμλετ','sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper','hamletimg.jpg',2,'2021-02-14 10:53:47',1,'2020-06-14 05:08:58',3,16),(172,'Άμλετ','cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel,','hamletimg.jpg',6,'2021-04-07 11:58:00',1,'2021-03-01 10:07:18',3,2),(173,'Άμλετ','Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem,','hamletimg.jpg',2,'2021-04-15 13:48:05',1,'2020-11-18 03:15:09',3,12),(174,'Άμλετ','vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis','hamletimg.jpg',2,'2021-02-21 07:30:52',1,'2020-12-26 13:00:36',3,19),(175,'Σεμινάριο ASP .NET','nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula.','aspnet.jpg',1,'2021-03-28 21:47:11',6,'2020-06-14 01:01:59',1,0),(176,'Άμλετ','ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus.','hamletimg.jpg',4,'2021-05-23 20:08:20',1,'2020-07-22 18:48:01',3,14),(177,'Άμλετ','non nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec','hamletimg.jpg',2,'2020-10-26 19:04:07',1,'2020-12-23 18:19:48',3,8),(178,'Άμλετ','Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est.','hamletimg.jpg',6,'2020-11-17 20:21:24',1,'2021-05-04 21:24:14',3,7),(179,'Ο Κουρσάρος','a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at','le-corsaire-bolshoi.jpg',2,'2020-09-19 17:21:53',10,'2021-03-08 18:17:12',3,4),(180,'Άμλετ','orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam.','hamletimg.jpg',1,'2020-08-23 18:31:01',1,'2020-09-27 18:55:01',3,18),(181,'Amore','Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci. Donec','Zakharova_Rodkin.jpg',2,'2020-07-19 03:23:11',11,'2020-07-05 12:02:34',2,19),(182,'Άμλετ','Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.','hamletimg.jpg',4,'2021-01-08 04:01:16',1,'2020-06-17 07:48:36',3,18),(183,'Σεμινάριο Javascript','dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum','avascript.jpg',6,'2020-08-24 15:03:37',4,'2021-04-19 13:42:40',7,15),(184,'Άμλετ','facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis','hamletimg.jpg',4,'2020-09-07 05:57:22',1,'2021-03-16 11:31:56',3,7),(185,'Άμλετ','facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis','hamletimg.jpg',2,'2021-03-19 20:21:42',1,'2020-10-12 10:09:22',3,0),(186,'Άμλετ','sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida','hamletimg.jpg',4,'2020-09-11 04:31:44',1,'2021-03-12 22:55:48',3,11),(187,'MySQL Workshop','pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris','mysql_logo.jpg',4,'2020-12-05 10:55:46',5,'2020-06-14 02:45:14',4,2),(188,'Άμλετ','vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum','hamletimg.jpg',3,'2021-05-18 08:51:55',1,'2021-04-29 08:54:10',3,18),(189,'Άμλετ','suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus','hamletimg.jpg',6,'2020-08-25 13:07:08',1,'2021-03-13 18:30:59',3,14),(190,'Άμλετ','sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non','hamletimg.jpg',1,'2021-01-02 01:01:19',1,'2021-02-18 11:00:22',3,9),(191,'Σεμινάριο HTML','Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis','Html5.jpg',4,'2021-04-23 17:35:04',7,'2021-04-21 13:40:16',1,3),(192,'Άμλετ','Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam','hamletimg.jpg',2,'2021-01-11 15:55:09',1,'2020-06-18 17:22:52',3,20),(193,'Άμλετ','risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet','hamletimg.jpg',2,'2021-03-06 08:33:40',1,'2020-10-10 02:42:48',3,11),(194,'Άμλετ','nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu','hamletimg.jpg',3,'2021-04-28 07:42:32',1,'2021-04-06 21:00:14',3,16),(195,'Η λίμνη των κύκνων','dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec','limni_kiknon.jpg',4,'2020-11-28 23:41:42',9,'2020-06-03 14:28:31',6,7),(196,'Άμλετ','in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque','hamletimg.jpg',4,'2021-03-11 09:38:59',1,'2020-08-13 22:51:16',3,9),(197,'Άμλετ','elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla','hamletimg.jpg',4,'2020-06-18 02:52:15',1,'2020-12-26 16:16:44',3,1),(198,'Σεμινάριο Digital Marketing','mauris ut mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec,','digitalmarketing.jpg',3,'2020-11-25 23:57:36',8,'2021-01-17 21:18:18',1,16),(199,'Άμλετ','Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris','hamletimg.jpg',4,'2020-08-05 19:31:21',1,'2020-09-27 07:55:08',3,18),(201,'PHP regular Meetup','Sample text for PHP meetup in Larissa.','php_meetup.jpg',6,'2020-05-27 00:30:00',2,'2020-05-27 08:30:00',1,0),(202,'Άμλετ','This text must not be visible!!','hamletimg.jpg',1,'2020-04-25 06:00:00',1,'2020-04-25 05:00:00',3,1),(203,'Ομήρου Οδύσσεια','This text must not be visible!!','athinorama.jpg',2,'2020-04-25 06:00:00',3,'2020-04-25 05:00:00',3,1),(204,'Άμλετ','This text must not be visible!!','hamletimg.jpg',3,'2020-04-25 06:00:00',1,'2020-04-25 05:00:00',3,1),(205,'PHP regular Meetup','This is a test seminar. it occurs in Σερρες (ΔΙΠΕΘΕ).','php_meetup.jpg',5,'2020-06-28 22:50:00',2,'2020-07-28 21:49:00',1,50),(206,'MySQL Workshop','magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu','mysql_logo.jpg',5,'2020-09-24 16:57:35',5,'2020-10-14 14:45:41',4,9);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventtype`
--

DROP TABLE IF EXISTS `eventtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eventtype` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventtype`
--

LOCK TABLES `eventtype` WRITE;
/*!40000 ALTER TABLE `eventtype` DISABLE KEYS */;
INSERT INTO `eventtype` VALUES (1,'Seminar'),(2,'Concert'),(3,'Show'),(4,'Workshop'),(5,'Conference'),(6,'Reunion'),(7,'Party'),(8,'Gala');
/*!40000 ALTER TABLE `eventtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `familyevent`
--

DROP TABLE IF EXISTS `familyevent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `familyevent` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `ImgUrl` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `familyevent`
--

LOCK TABLES `familyevent` WRITE;
/*!40000 ALTER TABLE `familyevent` DISABLE KEYS */;
INSERT INTO `familyevent` VALUES (1,'Άμλετ','hamletimg.jpg'),(2,'PHP regular Meetup','php_meetup.jpg'),(3,'Ομήρου Οδύσσεια','athinorama.jpg'),(4,'Σεμινάριο Javascript','avascript.jpg'),(5,'MySQL Workshop','mysql_logo.jpg'),(6,'Σεμινάριο ASP .NET','aspnet.jpg'),(7,'Σεμινάριο HTML','Html5.jpg'),(8,'Σεμινάριο Digital Marketing','digitalmarketing.jpg'),(9,'Η λίμνη των κύκνων','limni_kiknon.jpg'),(10,'Ο Κουρσάρος','le-corsaire-bolshoi.jpg'),(11,'Amore','Zakharova_Rodkin.jpg'),(12,'Το ημέρωμα της στρίγκλας','HMEROMA.jpg');
/*!40000 ALTER TABLE `familyevent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrationshistory`
--

DROP TABLE IF EXISTS `migrationshistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrationshistory` (
  `MigrationId` int NOT NULL AUTO_INCREMENT,
  `ProductVersion` text NOT NULL,
  PRIMARY KEY (`MigrationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrationshistory`
--

LOCK TABLES `migrationshistory` WRITE;
/*!40000 ALTER TABLE `migrationshistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrationshistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservation` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `UserId` varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SeatId` int NOT NULL,
  `EventDate` datetime NOT NULL,
  `Duration` time NOT NULL,
  `EventId` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserId` (`UserId`),
  KEY `Reservation_EventId_fk_idx` (`EventId`),
  KEY `Reservation_SeatId_fk_idx` (`SeatId`),
  CONSTRAINT `Reservation_EventId_fk` FOREIGN KEY (`EventId`) REFERENCES `event` (`Id`),
  CONSTRAINT `Reservation_SeatId_fk` FOREIGN KEY (`SeatId`) REFERENCES `seat` (`Id`),
  CONSTRAINT `Reservation_UserId_fk` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roleclaims`
--

DROP TABLE IF EXISTS `roleclaims`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roleclaims` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `RoleId` varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ClaimType` varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ClaimValue` varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `RoleId` (`RoleId`),
  CONSTRAINT `RoleId_fk` FOREIGN KEY (`RoleId`) REFERENCES `roles` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roleclaims`
--

LOCK TABLES `roleclaims` WRITE;
/*!40000 ALTER TABLE `roleclaims` DISABLE KEYS */;
/*!40000 ALTER TABLE `roleclaims` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `Id` varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Name` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NormalizedName` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ConcurrencyStamp` varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Description` varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `CreationDate` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES ('1','Administrator','administrator','','This user has full access to all application features.','2020-05-16 12:16:00'),('2','Subscriber','subscriber','','This user has commercial access to basic application functions.','2020-05-16 12:18:00');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seat`
--

DROP TABLE IF EXISTS `seat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seat` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `X` decimal(18,2) NOT NULL,
  `Y` decimal(18,2) NOT NULL,
  `Name` varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Available` bit(1) NOT NULL,
  `SubAreaId` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `SubAreaId` (`SubAreaId`),
  CONSTRAINT `Seat_SubAreaId_fk` FOREIGN KEY (`SubAreaId`) REFERENCES `subarea` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seat`
--

LOCK TABLES `seat` WRITE;
/*!40000 ALTER TABLE `seat` DISABLE KEYS */;
INSERT INTO `seat` VALUES (1,0.00,0.00,'chair 1',_binary '',1),(2,0.00,0.00,'καρέκλα 1',_binary '',3),(5,0.00,0.00,'καρέκλες 1',_binary '',2),(6,0.00,0.00,'καρέκλες 2',_binary '',2),(9,0.00,0.00,'chair 2',_binary '',1),(10,0.00,0.00,'καρέκλα 2',_binary '',3),(11,0.00,0.00,'chair 3',_binary '',1),(12,0.00,0.00,'chair 4',_binary '',1),(13,0.00,0.00,'chair 5',_binary '',1),(14,0.00,0.00,'chair 6',_binary '',1),(15,0.00,0.00,'chair 7',_binary '',1),(16,0.00,0.00,'chair 8',_binary '',1),(17,0.00,0.00,'chair 9',_binary '',1),(18,0.00,0.00,'chair 10',_binary '',1),(19,0.00,0.00,'Αναδιπλούμενη καρέκλα',_binary '',4),(20,0.00,0.00,'Αναδιπλούμενη καρέκλα 1',_binary '',4),(21,0.00,0.00,'Αναδιπλούμενη καρέκλα 2',_binary '',4),(22,0.00,0.00,'Αναδιπλούμενη καρέκλα 3',_binary '',4),(23,0.00,0.00,'καρέκλα 1',_binary '',5),(24,0.00,0.00,'καρέκλα 2',_binary '',5),(25,0.00,0.00,'καρέκλα 3',_binary '',5),(26,0.00,0.00,'καρέκλα 4',_binary '',5),(27,0.00,0.00,'καρέκλα 5',_binary '',5),(28,0.00,0.00,'Έδρανο 1',_binary '',6),(29,0.00,0.00,'Έδρανο 2',_binary '',6),(30,0.00,0.00,'Έδρανο 3',_binary '',6),(31,0.00,0.00,'καρέκλα 1',_binary '',7),(32,0.00,0.00,'καρέκλα 2',_binary '',7),(33,0.00,0.00,'καρέκλα 1',_binary '',8),(34,0.00,0.00,'καρέκλα 2',_binary '',8),(35,0.00,0.00,'καρέκλα 1',_binary '',9),(36,0.00,0.00,'καρέκλα 2',_binary '',9),(37,0.00,0.00,'καρέκλα 1',_binary '',10),(38,0.00,0.00,'καρέκλα 2',_binary '',10),(39,0.00,0.00,'καρέκλα 1',_binary '',11),(40,0.00,0.00,'καρέκλα 2',_binary '',11);
/*!40000 ALTER TABLE `seat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subarea`
--

DROP TABLE IF EXISTS `subarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subarea` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `AreaName` varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Width` decimal(18,2) NOT NULL,
  `Height` decimal(18,2) NOT NULL,
  `[Top]` decimal(18,2) NOT NULL,
  `[Left]` decimal(18,2) NOT NULL,
  `VenueId` int NOT NULL,
  `[Desc]` varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Rotate` decimal(18,2) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `VenueId` (`VenueId`),
  CONSTRAINT `SubAreaId_VenueId_fk` FOREIGN KEY (`VenueId`) REFERENCES `venue` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subarea`
--

LOCK TABLES `subarea` WRITE;
/*!40000 ALTER TABLE `subarea` DISABLE KEYS */;
INSERT INTO `subarea` VALUES (1,'Αμφιθέατρο',1.00,1.00,1.00,1.00,1,'Κεντρικό αμφιθέατρο από την κύρια είσοδο.',0.00),(2,'Main Hall',1.00,1.00,1.00,1.00,1,'Right side from main entrance',0.00),(3,'Main Amphitheater',1.00,1.00,1.00,1.00,4,'North East side of Campus',0.00),(4,'Συνεδριακό κέντρο',1.00,1.00,1.00,1.00,6,'Δεξιά μετά την κύρια είσοδο',0.00),(5,'Second Amphitheater',1.00,1.00,1.00,1.00,4,'South West side of Campus',0.00),(6,'Αίθουσα Συνεδριάσεων',1.00,1.00,1.00,1.00,5,'Ευθεία από την πλαϊνή είσοδο',0.00),(7,'Αμφιθέατρο',1.00,1.00,1.00,1.00,2,'Κεντρικό αμφιθέατρο από την κύρια είσοδο.',0.00),(8,'Αμφιθέατρο',1.00,1.00,1.00,1.00,6,'Κεντρικό αμφιθέατρο από την κύρια είσοδο.',0.00),(9,'Αμφιθέατρο',1.00,1.00,1.00,1.00,2,'Κεντρικό αμφιθέατρο από την κύρια είσοδο.',0.00),(10,'Main Hall',1.00,1.00,1.00,1.00,3,'Right side from main entrance',0.00),(11,'Main Hall',1.00,1.00,1.00,1.00,5,'Right side from main entrance',0.00);
/*!40000 ALTER TABLE `subarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userclaims`
--

DROP TABLE IF EXISTS `userclaims`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userclaims` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `UserId` varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ClaimType` varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ClaimValue` varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserID` (`UserId`),
  CONSTRAINT `UserId_fk` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userclaims`
--

LOCK TABLES `userclaims` WRITE;
/*!40000 ALTER TABLE `userclaims` DISABLE KEYS */;
/*!40000 ALTER TABLE `userclaims` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userlogins`
--

DROP TABLE IF EXISTS `userlogins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userlogins` (
  `LoginProvider` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ProviderKey` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ProviderDisplayName` varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserId` varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  KEY `UserId` (`UserId`),
  CONSTRAINT `UserLogins_UserId_fk` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userlogins`
--

LOCK TABLES `userlogins` WRITE;
/*!40000 ALTER TABLE `userlogins` DISABLE KEYS */;
/*!40000 ALTER TABLE `userlogins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userroles`
--

DROP TABLE IF EXISTS `userroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userroles` (
  `UserId` varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `RoleId` varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`UserId`),
  KEY `RoleId` (`RoleId`),
  CONSTRAINT `UserRoles_RoleId_fk` FOREIGN KEY (`RoleId`) REFERENCES `roles` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `UserRoles_UserId_fk` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userroles`
--

LOCK TABLES `userroles` WRITE;
/*!40000 ALTER TABLE `userroles` DISABLE KEYS */;
INSERT INTO `userroles` VALUES ('1','2');
/*!40000 ALTER TABLE `userroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `Id` varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NormallizedUserName` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Email` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NormallizedEmail` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `EmailConfirmed` bit(1) DEFAULT NULL,
  `PasswordHash` varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SecurityStamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ConcurrencyStamp` varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `PhoneNumberConfirmed` bit(1) NOT NULL,
  `TwoFactorEnabled` bit(1) NOT NULL,
  `LockoutEnd` datetime NOT NULL,
  `LockoutEnabled` bit(1) NOT NULL,
  `AccessFailedCount` int NOT NULL DEFAULT '0',
  `FirstName` varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `LastName` varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('1','Test','test','test@test.com','test@test.com',_binary '','$2y$10$JY8su7uYu.I.YPzT06rU.uJYCv5YCQRFvl6YcVEbDvhPfvv4J/aua','2020-05-16 15:00:07','','23102310',_binary '',_binary '\0','0000-00-00 00:00:00',_binary '\0',0,'test First Name','test Last Name'),('2','ABC','abc','ABC@ABC.COM','abc@abc.com',_binary '\0','$2y$10$BxzypA24ihZ9fwFcXhPVaelguBDKUrGKtmmPW/Mt7L.6Zu2Id2Jry','2020-05-19 23:30:19','','123123',_binary '\0',_binary '\0','0000-00-00 00:00:00',_binary '\0',0,'ABCD','DEFG');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertokens`
--

DROP TABLE IF EXISTS `usertokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usertokens` (
  `UserId` varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `LoginProvider` varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Name` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Value` varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  KEY `UserId` (`UserId`),
  CONSTRAINT `UserTokens_UserId_fk` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertokens`
--

LOCK TABLES `usertokens` WRITE;
/*!40000 ALTER TABLE `usertokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `usertokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venue`
--

DROP TABLE IF EXISTS `venue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venue` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Address` varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PostalCode` varchar(10) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `UserId` varchar(450) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ImgUrl` varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `CityId` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserId` (`UserId`),
  KEY `CityId` (`CityId`),
  CONSTRAINT `Venue_CityId_fk` FOREIGN KEY (`CityId`) REFERENCES `city` (`Id`),
  CONSTRAINT `Venue_UserId_fk` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venue`
--

LOCK TABLES `venue` WRITE;
/*!40000 ALTER TABLE `venue` DISABLE KEYS */;
INSERT INTO `venue` VALUES (1,'National and Kapodistrian University of Athens','Panepistimiou 30','10679','+30 2102102102','1','kapodistrian_uni.jpg',1),(2,'TerraVibe Park','37th km Athens-Lamia Highway','19011','+30 2112112112','1','terravibe.jpg',1),(3,'Thessaliniki Consert Hall','25 Martiou Street','54646','+30 2310 895800','1','tch_banner.jpg',2),(4,'Aristotle Univercity of Thessaloniki','University Campus center of Thessaloniki','54124','+30 2310 996000','1','aristotle_uni.jpg',2),(5,'ΔΙΠΕΘΕ Σερρών','Π.Κωστοπούλου 4','62100','+30 23210 54585','1','dipethe_logo.jpg',3),(6,'ΔΙΠΕΘΕ Λάρισσας','ΓΕΩΡΓΙΑΔΟΥ 53','41447','+30 2410-533417','1','dipethe_logo_larissa.jpg',4);
/*!40000 ALTER TABLE `venue` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-04 10:20:01
