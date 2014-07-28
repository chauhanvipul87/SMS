-- MySQL dump 10.13  Distrib 5.5.28, for Win32 (x86)
--
-- Host: localhost    Database: sms
-- ------------------------------------------------------
-- Server version	5.5.28

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
-- Table structure for table `am`
--

DROP TABLE IF EXISTS `am`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `am` (
  `am_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `md_id` bigint(20) NOT NULL,
  `approved_status` int(11) NOT NULL DEFAULT '-1' COMMENT '-1 : pending\n0 :approved\n1 -not approved',
  `approved_by` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_datetime` varchar(20) DEFAULT NULL,
  `delete_flag` int(11) DEFAULT '0',
  PRIMARY KEY (`am_id`),
  UNIQUE KEY `md_id_UNIQUE` (`md_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `am`
--

LOCK TABLES `am` WRITE;
/*!40000 ALTER TABLE `am` DISABLE KEYS */;
INSERT INTO `am` VALUES (1,1,0,1,1,'2013-01-31 03:00',0),(2,2,0,NULL,1,'2014-01-31 11:46:34',0),(3,3,0,NULL,1,'2014-01-31 11:55:30',0),(4,4,0,NULL,1,'2014-01-31 12:28:27',0),(5,5,0,NULL,1,'2014-01-31 12:29:00',0),(6,6,0,NULL,1,'2014-01-31 12:29:01',0),(7,7,0,NULL,1,'2014-01-31 12:29:02',0),(8,9,0,NULL,1,'2014-02-01 08:48:48',0),(9,10,0,NULL,1,'2014-02-01 08:55:37',0),(10,17,0,NULL,1,'2014-02-04 10:37:13',0),(11,18,-1,NULL,1,'2014-02-05 07:23:45',0);
/*!40000 ALTER TABLE `am` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(45) NOT NULL,
  `delete_flag` int(11) DEFAULT '0',
  `created_datetime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'Computer Department',0,'2014-01-28 03:00:15'),(2,'IT',0,'2014-01-28 03:00:15'),(3,'EC',0,'2014-02-03 11:31:08'),(4,'Civil',0,'2014-02-05 08:18:01'),(5,'Artchitecure',1,'2014-02-05 08:41:31');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fm`
--

DROP TABLE IF EXISTS `fm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm` (
  `fm_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `md_id` bigint(20) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `approved_status` int(11) NOT NULL DEFAULT '-1' COMMENT '-1 : pending\n0 :approved\n1 -not approved',
  `approved_by` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_datetime` varchar(20) DEFAULT NULL,
  `delete_flag` int(11) DEFAULT '0',
  PRIMARY KEY (`fm_id`),
  UNIQUE KEY `md_id_UNIQUE` (`md_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm`
--

LOCK TABLES `fm` WRITE;
/*!40000 ALTER TABLE `fm` DISABLE KEYS */;
INSERT INTO `fm` VALUES (2,12,2,0,NULL,1,'2014-02-03 08:30:52',0),(3,20,1,-1,NULL,19,'2014-02-07 11:31:28',0),(4,21,1,-1,NULL,19,'2014-02-07 11:31:53',0),(5,22,1,-1,NULL,19,'2014-02-07 11:32:22',0),(6,23,2,-1,NULL,19,'2014-02-08 06:39:49',0),(7,24,1,-1,NULL,19,'2014-02-08 06:41:05',0);
/*!40000 ALTER TABLE `fm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hm`
--

DROP TABLE IF EXISTS `hm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hm` (
  `hm_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `md_id` bigint(20) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `approved_status` int(11) NOT NULL DEFAULT '-1' COMMENT '-1 : pending\n0 :approved\n1 -not approved',
  `approved_by` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_datetime` varchar(20) DEFAULT NULL,
  `delete_flag` int(11) DEFAULT '0',
  PRIMARY KEY (`hm_id`),
  UNIQUE KEY `md_id_UNIQUE` (`md_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hm`
--

LOCK TABLES `hm` WRITE;
/*!40000 ALTER TABLE `hm` DISABLE KEYS */;
INSERT INTO `hm` VALUES (1,11,1,1,NULL,1,'2014-02-03 04:39:52',0),(2,15,1,0,NULL,1,'2014-02-04 09:10:58',0),(3,16,1,0,NULL,1,'2014-02-04 10:03:12',0),(4,19,1,0,NULL,1,'2014-02-07 11:06:56',0);
/*!40000 ALTER TABLE `hm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `md`
--

DROP TABLE IF EXISTS `md`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `md` (
  `md_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) NOT NULL,
  `mname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) NOT NULL,
  `phone_no` varchar(13) NOT NULL,
  `email` varchar(45) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `user_pass` varchar(45) NOT NULL,
  `paddress` text,
  `peraddress` text,
  `pstate` varchar(45) DEFAULT NULL,
  `perstate` varchar(45) DEFAULT NULL,
  `pcity` varchar(45) DEFAULT NULL,
  `percity` varchar(45) DEFAULT NULL,
  `usertype_id` int(11) NOT NULL DEFAULT '4' COMMENT '1- Admin,\n2- Head Master,\n3- Faculty,\n4- Student\n',
  `dob` varchar(10) NOT NULL,
  `doj` varchar(10) NOT NULL,
  PRIMARY KEY (`md_id`),
  KEY `index2` (`md_id`,`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COMMENT='Maseter Details Table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `md`
--

LOCK TABLES `md` WRITE;
/*!40000 ALTER TABLE `md` DISABLE KEYS */;
INSERT INTO `md` VALUES (1,'Vipul','N','Chauhan','7600722172','chauhan_vipul87@yahoo.com','admin','21232f297a57a5a743894a0e4a801fc3','Padra','PAdra','Gujarat','Gujarat','Vadodara','Vadodara',1,'08-11-1987','01-07-2013'),(2,'SH','Vipul','chauhan','7600722172','chauhan@yahoo.com','abc','abc','A-5,Morar baug Society,\r\nNear vastalua Hospitla,\r\nPadra-391440','A-5,Morar baug Society,\r\nNear vastalua Hospitla,\r\nPadra-391440','df','df','df','df',1,'2014-01-31','2014-01-01'),(3,'vipul','Narendrabhai','chauhan','7600722172','chauhan@yahoo.com','abc1','900150983cd24fb0d6963f7d28e17f72','PAdra','PAdra','PAdra','PAdra','PAdra','PAdra',1,'2014-01-31','2014-01-31'),(4,'vipul','Narendrabhai','chauhan','7600722172','chauhan@yahoo.com','abc2','900150983cd24fb0d6963f7d28e17f72','PAdra','PAdra','PAdra','PAdra','PAdra','PAdra',1,'2014-01-31','2014-01-31'),(5,'vipul','Narendrabhai','chauhan','7600722172','chauhan@yahoo.com','abc3','900150983cd24fb0d6963f7d28e17f72','PAdra','PAdra','PAdra','PAdra','PAdra','PAdra',1,'2014-01-31','2014-01-31'),(6,'vipul','Narendrabhai','chauhan','7600722172','chauhan@yahoo.com','abc4','900150983cd24fb0d6963f7d28e17f72','PAdra','PAdra','PAdra','PAdra','PAdra','PAdra',1,'2014-01-31','2014-01-31'),(7,'vipul','Narendrabhai','chauhan','7600722172','chauhan@yahoo.com','abc5','900150983cd24fb0d6963f7d28e17f72','PAdra','PAdra','PAdra','PAdra','PAdra','PAdra',1,'2014-01-31','2014-01-31'),(9,'chauhan','n','chauhan','7600','ch@yaho.com','abc6','721307e5b715dea44b55e56cd72cc154','asdfas','asdfas','gujarat','gujarat','vado','vado',1,'2014-02-13','2014-02-20'),(10,'212','12','121','12','2','asdf','c20ad4d76fe97759aa27a0c99bff6710','ds','ds','12','12','21','21',1,'2014-02-11','2014-02-26'),(11,'chauhan','n','chauhan','760072172','ch@yahoo.com','Jimmy','617b94886b46c84543331ea15fd47855','Vadiodara1','Vadiodara1','Vadiodara12','Vadiodara12','Vadiodara13','adfa',2,'2014-02-03','2014-02-11'),(12,'vip','n','chauhan','1445454','ch@h.com','vip','8e2c423d2ed85986fd8ccac266a72ca0','adfads','adfads','1212','updateFacultyDetails','12121','update',3,'2014-02-04','2014-02-04'),(13,'vipul','n','chauhan','7600722172','cha@yahoo.com','abc','232059cb5361a9336ccf1b8c2ba7657a','asdfasdf','asdfasdf','asdfasdf','123Vip','asdf','asdf',4,'2014-02-04','2014-02-12'),(14,'122','121','212','121','21','abc1','c20ad4d76fe97759aa27a0c99bff6710','dfdf','dfdf','df','Vadodara','df','Padra',4,'2014-02-19','2014-02-05'),(15,'21','21','21','21','212','12','4c56ff4ce4aaf9573aa5dff913df997a','12','12','12','12','121','121',2,'2014-02-26','2014-02-04'),(16,'12','1212','121','2121','212','h1','721307e5b715dea44b55e56cd72cc154','sdfad','sdfad','12','12','121','121',2,'2014-02-18','2014-02-12'),(17,'df','df','df','df','df','df','eff7d5dba32b4da32d9a67a519434d3f','df','df','df','df','df','df',1,'2014-02-05','2014-02-11'),(18,'121','212','12','121221212121','12@ay.c','vip','c20ad4d76fe97759aa27a0c99bff6710','asdfdadf','asdfdadf','asdf','asdf','asdf','asdf',1,'2014-02-18','2014-02-05'),(19,'vipul','n','chauhan','7600722172','ch@yahoo.com','admin','900150983cd24fb0d6963f7d28e17f72','ttest','ttest','test','test','vadoara','vadoara',2,'2014-02-12','2014-02-05'),(20,'vip','n','chuahn','121212121212','1212@yahool.com','hhh','721307e5b715dea44b55e56cd72cc154','asdfsdad','asdfsdad','sdfd','sdfd','df','df',3,'2014-02-14','2014-02-11'),(21,'vipul','asdf','ddf','4221212121212','dfdf@yahoo.com','asdfsadf','900150983cd24fb0d6963f7d28e17f72','asdf','asdf','asdf','asdf','adsf','adsf',3,'2014-02-13','2014-02-10'),(22,'asdfasdf','asdfd1','dfd','7600722172','dfdf@yaooo.com','asdf','900150983cd24fb0d6963f7d28e17f72','asdf','asdf','asdf','asdf','asdf','asdf',3,'2014-02-07','2014-02-05'),(23,'Jalpa','V','Chauhan','7600722172','ch@yahoo.com','Jalpa','900150983cd24fb0d6963f7d28e17f72','Padra','Padra','Padra','Padra','Padra','Padra',3,'2014-02-08','2014-02-08'),(24,'Jalpa','V','Chauhan','7600722172','ch@yahoo.com','JV','900150983cd24fb0d6963f7d28e17f72','asdfasdf','asdfasdf','asdf','asdf','asdf','asdf',3,'2014-02-08','2014-02-08');
/*!40000 ALTER TABLE `md` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `hm_id` int(11) NOT NULL,
  `fm_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `sessiontype_id` int(11) NOT NULL DEFAULT '0' COMMENT '0 for lecture,\n1 for lab',
  `session_about` varchar(250) DEFAULT NULL,
  `session_sequence` int(11) NOT NULL DEFAULT '1',
  `session_date` varchar(12) DEFAULT NULL,
  `delete_flag` int(11) DEFAULT '0',
  `created_datetime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (1,19,20,2,1,1,'hi',1,'2014-02-10',0,'getCreatedDateTime'),(2,19,20,2,1,1,'IT',1,'2014-02-12',0,'getCreatedDateTime'),(3,19,24,4,1,2,'te',2,'2014-02-12',0,'getCreatedDateTime'),(4,19,21,4,1,1,'2',3,'2014-02-12',0,'getCreatedDateTime');
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sem`
--

DROP TABLE IF EXISTS `sem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sem` (
  `sem_id` int(11) NOT NULL AUTO_INCREMENT,
  `sem_name` varchar(10) NOT NULL,
  `delete_flag` int(11) DEFAULT '0',
  `created_datetime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Semester Master';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sem`
--

LOCK TABLES `sem` WRITE;
/*!40000 ALTER TABLE `sem` DISABLE KEYS */;
INSERT INTO `sem` VALUES (1,'1st',0,'2014-01-28 03:00:15'),(2,'2nd',0,'2014-01-28 03:00:15'),(3,'3rd',0,'2014-01-28 03:00:15'),(4,'4th',0,'2014-01-28 03:00:15'),(5,'5th',0,'2014-01-28 03:00:15'),(6,'6th',0,'2014-01-28 03:00:15');
/*!40000 ALTER TABLE `sem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sm`
--

DROP TABLE IF EXISTS `sm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sm` (
  `sm_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `md_id` bigint(20) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `approved_status` int(11) NOT NULL DEFAULT '-1' COMMENT '-1 : pending\n0 :approved\n1 -not approved',
  `approved_by` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_datetime` varchar(20) DEFAULT NULL,
  `delete_flag` int(11) DEFAULT '0',
  PRIMARY KEY (`sm_id`),
  UNIQUE KEY `md_id_UNIQUE` (`md_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sm`
--

LOCK TABLES `sm` WRITE;
/*!40000 ALTER TABLE `sm` DISABLE KEYS */;
INSERT INTO `sm` VALUES (1,13,1,1,1,NULL,1,'2014-02-04 08:54:39',0),(2,14,1,1,-1,NULL,1,'2014-02-04 08:55:33',1);
/*!40000 ALTER TABLE `sm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_title` varchar(45) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `delete_flag` int(11) DEFAULT '0',
  `createdBy` bigint(20) DEFAULT NULL,
  `created_datetime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sub_id`),
  UNIQUE KEY `sub_title_UNIQUE` (`sub_title`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (1,'Data Structure',2,2,0,1,'2014-02-05 06:13:32'),(2,'Graphics Design',1,1,0,1,'2014-02-05 06:16:15'),(3,'ITI',1,1,1,1,'2014-02-05 06:18:10'),(4,'C Language',1,1,0,1,'2014-02-05 06:19:58'),(5,'Information Security',1,1,0,1,'2014-02-05 08:07:44'),(6,'KL',3,1,1,1,'2014-02-05 09:00:21');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ut`
--

DROP TABLE IF EXISTS `ut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ut` (
  `usertype_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usertype_name` varchar(45) NOT NULL,
  `delete_flag` int(11) DEFAULT '0',
  `created_datetime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`usertype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='User Type Master Table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ut`
--

LOCK TABLES `ut` WRITE;
/*!40000 ALTER TABLE `ut` DISABLE KEYS */;
INSERT INTO `ut` VALUES (1,'Admin',0,'2014-01-28 03:00:15'),(2,'Head',0,'2014-01-28 03:00:15'),(3,'Faculty',0,'2014-01-28 03:00:15'),(4,'Student',0,'2014-01-28 03:00:15');
/*!40000 ALTER TABLE `ut` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-27 17:17:56
