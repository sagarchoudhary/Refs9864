-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: events
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `uid` int(11) DEFAULT NULL,
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `ename` varchar(20) DEFAULT NULL,
  `eimg` varchar(150) DEFAULT NULL,
  `edescription` text,
  `owner` int(11) DEFAULT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`eid`),
  KEY `uid` (`uid`),
  CONSTRAINT `event_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (47,78,'event2','incubator_strategies-2015-03-27-14-19.jpg','event1event1event1eve nt1event1event1eve nt1event1event1 event1event1event1event1eve nt1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1',51,13),(47,79,'Event 3','Business-plan-presentation-2015-03-27-14-50.jpg','event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1',51,12),(47,81,'Event 5','locate market-2015-03-27-14-11.jpg','event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1',56,13),(47,82,'event1event1','MOTIVATION-2015-03-27-14-33.jpg','event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1',55,15),(47,83,'event9','angel_investors-2015-03-27-14-59.jpg','event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1',55,14),(47,84,'event20','SAGAR-2015-03-27-14-24.jpg','event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1',53,15),(47,86,'Event Testing','MOTIVATION-2015-03-27-16-01.jpg','event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event ',53,16),(1,87,'Content Event','locate market-2015-03-27-19-07.jpg','eventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventevent',53,16),(47,88,'event 3','life-2015-03-27-19-46.jpg','',51,13),(47,89,'event 2','how to find potential client-2015-03-27-19-07.jpg','eventeventeventeventeventeventeventeventeventeventeventeventevent\r\n\r\neventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventevent\r\n\r\neventeventeventeventeventeventeventeventevent',51,13),(47,90,'event 3','locate market-2015-03-27-19-02.jpg','event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1event1',51,13),(47,91,'Event 999','angel_investors-2015-03-27-19-55.jpg','eventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventevent',51,13),(47,92,'event 3','mkt5-2015-03-27-19-35.jpg','eventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeventeve',51,13);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t1`
--

DROP TABLE IF EXISTS `t1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t1` (
  `name` varchar(10) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t1`
--

LOCK TABLES `t1` WRITE;
/*!40000 ALTER TABLE `t1` DISABLE KEYS */;
/*!40000 ALTER TABLE `t1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxonomy`
--

DROP TABLE IF EXISTS `taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taxonomy` (
  `tid` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxonomy`
--

LOCK TABLES `taxonomy` WRITE;
/*!40000 ALTER TABLE `taxonomy` DISABLE KEYS */;
INSERT INTO `taxonomy` VALUES (13,'Folk'),(14,'rock'),(16,'political'),(17,'Sports'),(18,'school');
/*!40000 ALTER TABLE `taxonomy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(10) DEFAULT NULL,
  `sex` varchar(7) NOT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Content Manager','content@mail.com','202cb962ac59075b964b07152d234b70','content','',NULL,'0000-00-00 00:00:00'),(47,'SuperAdmin','Superadmin@gmail.com','17c4520f6cfd1ab53d8745e84681eb49','admin','',NULL,'0000-00-00 00:00:00'),(51,'sagar','sagar@mail.com','202cb962ac59075b964b07152d234b70','user','male',NULL,'0000-00-00 00:00:00'),(53,'user 3','user3','202cb962ac59075b964b07152d234b70','user','',NULL,'0000-00-00 00:00:00'),(54,'user4','user4','202cb962ac59075b964b07152d234b70','content','',NULL,'2015-03-27 09:17:19'),(56,'user8','user8','123','user','',NULL,'2015-03-27 10:59:23'),(58,'content test','test content','202cb962ac59075b964b07152d234b70','content','',NULL,'0000-00-00 00:00:00');
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

-- Dump completed on 2015-03-28 13:46:52
