CREATE DATABASE  IF NOT EXISTS `goalbook` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `goalbook`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: goalbook
-- ------------------------------------------------------
-- Server version	5.5.32

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
-- Table structure for table `authassignment`
--

DROP TABLE IF EXISTS `authassignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authassignment`
--

LOCK TABLES `authassignment` WRITE;
/*!40000 ALTER TABLE `authassignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `authassignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authitem`
--

DROP TABLE IF EXISTS `authitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authitem`
--

LOCK TABLES `authitem` WRITE;
/*!40000 ALTER TABLE `authitem` DISABLE KEYS */;
/*!40000 ALTER TABLE `authitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authitemchild`
--

DROP TABLE IF EXISTS `authitemchild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authitemchild`
--

LOCK TABLES `authitemchild` WRITE;
/*!40000 ALTER TABLE `authitemchild` DISABLE KEYS */;
/*!40000 ALTER TABLE `authitemchild` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_action`
--

DROP TABLE IF EXISTS `gb_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_action`
--

LOCK TABLES `gb_action` WRITE;
/*!40000 ALTER TABLE `gb_action` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_advice_page`
--

DROP TABLE IF EXISTS `gb_advice_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_advice_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subgoals` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `goal_list_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `privacy` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `advice_page_page_id` (`page_id`),
  KEY `advice_page_goal_list_id` (`goal_list_id`),
  KEY `advice_page_level_id` (`level_id`),
  CONSTRAINT `advice_page_page_id` FOREIGN KEY (`page_id`) REFERENCES `gb_page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `advice_page_goal_list_id` FOREIGN KEY (`goal_list_id`) REFERENCES `gb_goal_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `advice_page_level_id` FOREIGN KEY (`level_id`) REFERENCES `gb_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_advice_page`
--

LOCK TABLES `gb_advice_page` WRITE;
/*!40000 ALTER TABLE `gb_advice_page` DISABLE KEYS */;
INSERT INTO `gb_advice_page` VALUES (1,5,1,9,10,1);
/*!40000 ALTER TABLE `gb_advice_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_advice_page_share`
--

DROP TABLE IF EXISTS `gb_advice_page_share`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_advice_page_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advice_page_id` int(11) NOT NULL,
  `shared_to_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `advice_page_share_advice_page_id` (`advice_page_id`),
  KEY `advice_page_share_shared_to_id` (`shared_to_id`),
  CONSTRAINT `advice_page_share_advice_page_id` FOREIGN KEY (`advice_page_id`) REFERENCES `gb_advice_page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `advice_page_share_shared_to_id` FOREIGN KEY (`shared_to_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_advice_page_share`
--

LOCK TABLES `gb_advice_page_share` WRITE;
/*!40000 ALTER TABLE `gb_advice_page_share` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_advice_page_share` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_advice_page_subgoal`
--

DROP TABLE IF EXISTS `gb_advice_page_subgoal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_advice_page_subgoal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advice_page_id` int(11) NOT NULL,
  `subgoal_list_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `advice_page_subgoal_page_id` (`advice_page_id`),
  KEY `advice_page_subgoal_subgoal_list_id` (`subgoal_list_id`),
  CONSTRAINT `advice_page_subgoal_page_id` FOREIGN KEY (`advice_page_id`) REFERENCES `gb_advice_page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `advice_page_subgoal_subgoal_list_id` FOREIGN KEY (`subgoal_list_id`) REFERENCES `gb_goal_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_advice_page_subgoal`
--

LOCK TABLES `gb_advice_page_subgoal` WRITE;
/*!40000 ALTER TABLE `gb_advice_page_subgoal` DISABLE KEYS */;
INSERT INTO `gb_advice_page_subgoal` VALUES (1,1,10),(2,1,11),(3,1,12),(4,1,13),(5,1,14);
/*!40000 ALTER TABLE `gb_advice_page_subgoal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_announcement`
--

DROP TABLE IF EXISTS `gb_announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `announcer_id` int(11) NOT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gb_announcement_announcer_id` (`announcer_id`),
  KEY `gb_announcement_receiver_id` (`receiver_id`),
  CONSTRAINT `gb_announcement_announcer_id` FOREIGN KEY (`announcer_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gb_announcement_receiver_id` FOREIGN KEY (`receiver_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_announcement`
--

LOCK TABLES `gb_announcement` WRITE;
/*!40000 ALTER TABLE `gb_announcement` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_connection`
--

DROP TABLE IF EXISTS `gb_connection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_connection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `connection_picture` varchar(50) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_connection`
--

LOCK TABLES `gb_connection` WRITE;
/*!40000 ALTER TABLE `gb_connection` DISABLE KEYS */;
INSERT INTO `gb_connection` VALUES (1,'Connections','gb_connections.png','All my connections.','0000-00-00 00:00:00'),(2,'Friends','gb_friends.png','Right friends.','0000-00-00 00:00:00'),(3,'Family','gb_family.png','Your family members.','0000-00-00 00:00:00'),(4,'Followers','gb_followers.png','Your followers.','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `gb_connection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_connection_member`
--

DROP TABLE IF EXISTS `gb_connection_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_connection_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `connection_id` int(11) NOT NULL,
  `connection_member_id_1` int(11) NOT NULL,
  `connection_member_id_2` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `privilege` int(11) NOT NULL DEFAULT '1',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `connection_member_connection_member_id_1` (`connection_member_id_1`),
  KEY `connection_member_connection_member_id_2` (`connection_member_id_2`),
  KEY `connection_member_connection_id` (`connection_id`),
  CONSTRAINT `connection_member_connection_id` FOREIGN KEY (`connection_id`) REFERENCES `gb_connection` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `connection_member_connection_member_id_1` FOREIGN KEY (`connection_member_id_1`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `connection_member_connection_member_id_2` FOREIGN KEY (`connection_member_id_2`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_connection_member`
--

LOCK TABLES `gb_connection_member` WRITE;
/*!40000 ALTER TABLE `gb_connection_member` DISABLE KEYS */;
INSERT INTO `gb_connection_member` VALUES (1,1,5,2,'2014-01-14 00:00:00',1,1),(2,1,2,5,'2014-01-14 00:00:00',1,1),(3,2,5,2,'2014-01-14 00:00:00',1,1),(4,2,2,5,'2014-01-14 00:00:00',1,1),(5,3,6,2,'2014-01-15 00:00:00',1,1),(6,3,2,6,'2014-01-15 00:00:00',1,1),(7,1,3,2,'2014-01-15 00:00:00',1,1),(8,1,2,3,'2014-01-15 00:00:00',1,1),(9,2,3,2,'2014-01-15 00:00:00',1,1),(10,2,2,3,'2014-01-15 00:00:00',1,1),(11,3,4,2,'2014-01-15 00:00:00',1,1),(12,3,2,4,'2014-01-15 00:00:00',1,1),(13,3,7,2,'2014-01-15 00:00:00',1,1),(14,3,2,7,'2014-01-15 00:00:00',1,1),(15,3,5,2,'2014-01-15 00:00:00',1,1),(16,3,2,5,'2014-01-15 00:00:00',1,1);
/*!40000 ALTER TABLE `gb_connection_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_discussion`
--

DROP TABLE IF EXISTS `gb_discussion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_discussion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gb_discussion_title_id` (`title_id`),
  KEY `gb_discussion_creator_id` (`creator_id`),
  CONSTRAINT `gb_discussion_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gb_discussion_title_id` FOREIGN KEY (`title_id`) REFERENCES `gb_discussion_title` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_discussion`
--

LOCK TABLES `gb_discussion` WRITE;
/*!40000 ALTER TABLE `gb_discussion` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_discussion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_discussion_title`
--

DROP TABLE IF EXISTS `gb_discussion_title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_discussion_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gb_discussion_title_creator_id` (`creator_id`),
  CONSTRAINT `gb_discussion_title_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_discussion_title`
--

LOCK TABLES `gb_discussion_title` WRITE;
/*!40000 ALTER TABLE `gb_discussion_title` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_discussion_title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_goal`
--

DROP TABLE IF EXISTS `gb_goal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `points_pledged` int(11) DEFAULT NULL,
  `assign_date` datetime NOT NULL,
  `begin_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `goal_type_id` (`type_id`),
  CONSTRAINT `goal_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_goal_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_goal`
--

LOCK TABLES `gb_goal` WRITE;
/*!40000 ALTER TABLE `gb_goal` DISABLE KEYS */;
INSERT INTO `gb_goal` VALUES (1,NULL,'Communication - Speaking Clearly','Speaking clearly, slowly and audible. Sometimes people have some hard times understanding me.',NULL,'2014-07-03 00:00:00',NULL,NULL,1),(2,NULL,'Building ideas into action','Executing an idea and making it see the light. I wanna know mostly how the entrepreneurship world work.',NULL,'2014-07-03 00:00:00',NULL,NULL,1),(3,NULL,'Handling job interviews.','Sometimes I get nervous for no reason. Then not selling my skills correctly.',NULL,'2014-07-03 00:00:00',NULL,NULL,1),(4,NULL,'Becoming actively involved','I might move to a new city, so I wanna learn how to get involved and having this as an opportunity to meet new people.',NULL,'2014-07-03 00:00:00',NULL,NULL,1),(5,NULL,'Intermediate Web Development - using Bootstrap 3, designing','Well, I can say I have gained some of the basics of web design starting from scratch.',NULL,'2014-07-03 00:00:00',NULL,NULL,1),(6,NULL,'Teamwork- college','',NULL,'0000-00-00 00:00:00',NULL,NULL,0),(7,NULL,'Building ideas into action','',NULL,'0000-00-00 00:00:00',NULL,NULL,0),(8,NULL,'Impresing a lady','',NULL,'0000-00-00 00:00:00',NULL,NULL,0),(9,NULL,'understand what interviewers want in a candidate','From the book by Rob Yeung, PhD he emphasizes some of the ways to know and understand the interview game.',NULL,'0000-00-00 00:00:00',NULL,NULL,0),(10,NULL,'Competence','A candidate who the interviewers seek is the one who has the ability to do something successfully or efficiently.  Especially the one with skills and qualities to do the job. It is recommended to read the job description well',NULL,'0000-00-00 00:00:00',NULL,NULL,0),(11,NULL,'Chemistry','With a company\'s unique culture, employers wants someone that they can connect with, a candidate that can fit with the rest of the team.',NULL,'0000-00-00 00:00:00',NULL,NULL,0),(12,NULL,'Commitment and self motivated person','Someone who is self motivated and who will stick to the job and does not easily gives up.',NULL,'0000-00-00 00:00:00',NULL,NULL,0),(13,NULL,'Confidence','Someone who is secure about themselves. Someone who will deal with new people and situations',NULL,'0000-00-00 00:00:00',NULL,NULL,0),(14,NULL,'Initiative','Someone who can go above and beyond by taking initiative without maximum supervision. Imagine someone who just do what\'s on the job description.',NULL,'0000-00-00 00:00:00',NULL,NULL,0);
/*!40000 ALTER TABLE `gb_goal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_goal_discussion_title`
--

DROP TABLE IF EXISTS `gb_goal_discussion_title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal_discussion_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `discussion_title_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `goal_discussion_title_discussion_title_id` (`discussion_title_id`),
  KEY `goal_discussion_title_goal_id` (`goal_id`),
  CONSTRAINT `goal_discussion_title_discussion_title_id` FOREIGN KEY (`discussion_title_id`) REFERENCES `gb_discussion_title` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_discussion_title_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_goal_discussion_title`
--

LOCK TABLES `gb_goal_discussion_title` WRITE;
/*!40000 ALTER TABLE `gb_goal_discussion_title` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_goal_discussion_title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_goal_list`
--

DROP TABLE IF EXISTS `gb_goal_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `list_bank_parent_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `privacy` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `goal_list_user_id` (`user_id`),
  KEY `goal_list_goal_id` (`goal_id`),
  KEY `goal_list_level_id` (`level_id`),
  KEY `goal_list_list_bank_parent_id` (`list_bank_parent_id`),
  KEY `goal_list_type_id` (`type_id`),
  CONSTRAINT `goal_list_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_list_level_id` FOREIGN KEY (`level_id`) REFERENCES `gb_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_list_list_bank_parent_id` FOREIGN KEY (`list_bank_parent_id`) REFERENCES `gb_list_bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_list_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_goal_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_list_user_id` FOREIGN KEY (`user_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_goal_list`
--

LOCK TABLES `gb_goal_list` WRITE;
/*!40000 ALTER TABLE `gb_goal_list` DISABLE KEYS */;
INSERT INTO `gb_goal_list` VALUES (1,1,2,1,2,NULL,1,1,1),(2,1,2,2,1,NULL,1,1,1),(3,1,2,3,2,NULL,1,2,1),(4,1,2,4,3,NULL,1,1,1),(5,1,2,5,1,NULL,1,1,1),(6,1,2,6,5,NULL,1,0,1),(7,1,2,7,5,NULL,1,0,1),(8,1,2,8,5,NULL,1,0,1),(9,1,2,9,5,NULL,1,0,1),(10,1,2,10,5,NULL,1,0,1),(11,1,2,11,5,NULL,1,0,1),(12,1,2,12,5,NULL,1,0,1),(13,1,2,13,5,NULL,1,0,1),(14,1,2,14,5,NULL,1,0,1);
/*!40000 ALTER TABLE `gb_goal_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_goal_list_share`
--

DROP TABLE IF EXISTS `gb_goal_list_share`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal_list_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal_list_id` int(11) NOT NULL,
  `shared_to_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `goal_list_share_goal_list_id` (`goal_list_id`),
  KEY `goal_list_share_shared_to_id` (`shared_to_id`),
  CONSTRAINT `goal_list_share_goal_list_id` FOREIGN KEY (`goal_list_id`) REFERENCES `gb_goal_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_list_share_shared_to_id` FOREIGN KEY (`shared_to_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_goal_list_share`
--

LOCK TABLES `gb_goal_list_share` WRITE;
/*!40000 ALTER TABLE `gb_goal_list_share` DISABLE KEYS */;
INSERT INTO `gb_goal_list_share` VALUES (1,3,6,1),(2,3,7,1),(3,3,3,1);
/*!40000 ALTER TABLE `gb_goal_list_share` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_goal_todo`
--

DROP TABLE IF EXISTS `gb_goal_todo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal_todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `todo_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `assigner_id` int(11) NOT NULL,
  `assignee_id` int(11) NOT NULL,
  `assigned_date` date NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `goal_todo_todo_id` (`todo_id`),
  KEY `goal_todo_goal_id` (`goal_id`),
  KEY `goal_todo_assigner_id` (`assigner_id`),
  KEY `goal_todo_assignee_id` (`assignee_id`),
  CONSTRAINT `goal_todo_assignee_id` FOREIGN KEY (`assignee_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_todo_assigner_id` FOREIGN KEY (`assigner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_todo_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_todo_todo_id` FOREIGN KEY (`todo_id`) REFERENCES `gb_todo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_goal_todo`
--

LOCK TABLES `gb_goal_todo` WRITE;
/*!40000 ALTER TABLE `gb_goal_todo` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_goal_todo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_goal_type`
--

DROP TABLE IF EXISTS `gb_goal_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_goal_type`
--

LOCK TABLES `gb_goal_type` WRITE;
/*!40000 ALTER TABLE `gb_goal_type` DISABLE KEYS */;
INSERT INTO `gb_goal_type` VALUES (1,'skill ','Academic/Job Related',NULL),(2,'skill ','Self Management',NULL),(3,'skill  ','Transferable',NULL),(4,'skill','Action Words',NULL),(5,'skill  ','Other',NULL),(6,'goal  ','Physical',NULL),(7,'goal ','Social',NULL),(8,'goal ','Career ',NULL),(9,'goal ','Financial ',NULL),(10,'goal ','Self Improvement and Spiritual',NULL),(11,'goal ','Pleasure ',NULL),(12,'goal','Relationships and Family',NULL);
/*!40000 ALTER TABLE `gb_goal_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_goal_weblink`
--

DROP TABLE IF EXISTS `gb_goal_weblink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal_weblink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weblink_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `goal_weblink_weblink_id` (`weblink_id`),
  KEY `goal_weblink_goal_id` (`goal_id`),
  CONSTRAINT `goal_weblink_weblink_id` FOREIGN KEY (`weblink_id`) REFERENCES `gb_weblink` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_weblink_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_goal_weblink`
--

LOCK TABLES `gb_goal_weblink` WRITE;
/*!40000 ALTER TABLE `gb_goal_weblink` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_goal_weblink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_level`
--

DROP TABLE IF EXISTS `gb_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_category` varchar(50) NOT NULL,
  `level_name` varchar(50) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_level`
--

LOCK TABLES `gb_level` WRITE;
/*!40000 ALTER TABLE `gb_level` DISABLE KEYS */;
INSERT INTO `gb_level` VALUES (1,'1','Skills Gained',NULL),(2,'1','Skills To Improve',NULL),(3,'1','Skills To Learn',NULL),(4,'1','Skills Of Interest',NULL),(5,'1000','Other',NULL),(6,'2','I am still learning this skill',NULL),(7,'2','I am a beginner in mentoring',NULL),(8,'2','I have mentored this skill before',NULL),(9,'2','i am an expert in mentoring this skill',NULL),(10,'3','ways to',NULL),(11,'3','tips to',NULL),(12,'3','instrunctions to',NULL),(13,'3','methods of',NULL),(14,'3','things to',NULL);
/*!40000 ALTER TABLE `gb_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_list_bank`
--

DROP TABLE IF EXISTS `gb_list_bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_list_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `subgoal` varchar(200) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `times_used` int(11) NOT NULL DEFAULT '0',
  `times_gained` int(11) NOT NULL DEFAULT '0',
  `times_learning` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `list_bank_type_id` (`type_id`),
  KEY `list_bank_owner_id` (`owner_id`),
  CONSTRAINT `list_bank_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `list_bank_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_goal_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2074 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_list_bank`
--

LOCK TABLES `gb_list_bank` WRITE;
/*!40000 ALTER TABLE `gb_list_bank` DISABLE KEYS */;
INSERT INTO `gb_list_bank` VALUES (1,7,'1000 subscribers to my blogs',NULL,NULL,1,0,0,0),(2,3,'3d printing',NULL,NULL,1,0,0,0),(3,3,'a vintage scrapbook',NULL,NULL,1,0,0,0),(4,3,'ability to delegate',NULL,NULL,1,0,0,0),(5,3,'ability to learn ',NULL,NULL,1,0,0,0),(6,3,'ability to work under pressure ',NULL,NULL,1,0,0,0),(7,3,'aboriginal and torres strait islander health worker',NULL,NULL,1,0,0,0),(8,3,'accept responsibility',NULL,NULL,1,0,0,0),(9,3,'accommodation and hospitality managers',NULL,NULL,1,0,0,0),(10,3,'accountant (general)',NULL,NULL,1,0,0,0),(11,3,'accounting',NULL,NULL,1,0,0,0),(12,3,'accounts payable',NULL,NULL,1,0,0,0),(13,3,'accounts receivable',NULL,NULL,1,0,0,0),(14,3,'accuracy',NULL,NULL,1,0,0,0),(15,3,'accurate: careful, precise, free from error.',NULL,NULL,1,0,0,0),(16,2,'active',NULL,'becoming actively involved, stand up',1,0,0,0),(17,3,'actor',NULL,NULL,1,0,0,0),(18,3,'actors, dancers and other entertainers',NULL,NULL,1,0,0,0),(19,3,'actuary',NULL,NULL,1,0,0,0),(20,3,'acupuncturist',NULL,NULL,1,0,0,0),(21,3,'adapt to changing situations',NULL,NULL,1,0,0,0),(22,3,'adaptability ',NULL,NULL,1,0,0,0),(23,3,'adaptable',NULL,'being flexible when things change. manage multiple assignments and tasks, set priorities, adapt to changing conditions, adapt to work assignments. adapting new procedures',1,0,0,0),(24,3,'adaptable: able to adapt oneself to new surroundings; to make suitable change so as to fit new conditions.',NULL,NULL,1,0,0,0),(25,3,'add windshield washer fluid',NULL,NULL,1,0,0,0),(26,3,'administering medication ',NULL,NULL,1,0,0,0),(27,3,'adobe illustrator',NULL,NULL,1,0,0,0),(28,3,'adobe indesign',NULL,NULL,1,0,0,0),(29,3,'adobe photoshop',NULL,NULL,1,0,0,0),(30,2,'adventurous',NULL,NULL,1,0,0,0),(31,3,'advertising and public relations',NULL,NULL,1,0,0,0),(32,3,'advertising manager',NULL,NULL,1,0,0,0),(33,3,'advertising specialist',NULL,NULL,1,0,0,0),(34,1,'advising people',NULL,NULL,1,0,0,0),(35,3,'aeronautical engineer',NULL,NULL,1,0,0,0),(36,3,'aeroplane pilot',NULL,NULL,1,0,0,0),(37,2,'affectionate',NULL,NULL,1,0,0,0),(38,2,'aggressive',NULL,NULL,1,0,0,0),(39,3,'agricultural consultant',NULL,NULL,1,0,0,0),(40,3,'agricultural engineer',NULL,NULL,1,0,0,0),(41,3,'agricultural scientist',NULL,NULL,1,0,0,0),(42,3,'agricultural technician',NULL,NULL,1,0,0,0),(43,3,'air sports',NULL,NULL,1,0,0,0),(44,3,'air traffic controller',NULL,NULL,1,0,0,0),(45,3,'air transport professionals nec',NULL,NULL,1,0,0,0),(46,3,'airconditioning and mechanical services plumber',NULL,NULL,1,0,0,0),(47,3,'airconditioning and refrigeration mechanic',NULL,NULL,1,0,0,0),(48,3,'aircraft maintenance engineer (avionics)',NULL,NULL,1,0,0,0),(49,3,'aircraft maintenance engineer (mechanical)',NULL,NULL,1,0,0,0),(50,3,'aircraft maintenance engineer (structures)',NULL,NULL,1,0,0,0),(51,3,'aircraft spotting',NULL,NULL,1,0,0,0),(52,3,'airsoft',NULL,NULL,1,0,0,0),(53,2,'alert',NULL,NULL,1,0,0,0),(54,3,'alert: watchful, wide awake, ready to act.',NULL,NULL,1,0,0,0),(55,3,'amateur astronomy',NULL,NULL,1,0,0,0),(56,3,'amateur geology',NULL,NULL,1,0,0,0),(57,3,'amateur radio',NULL,NULL,1,0,0,0),(58,2,'ambitious',NULL,NULL,1,0,0,0),(59,3,'ambitious: full of ambition, strong desire to do something.',NULL,NULL,1,0,0,0),(60,3,'ambulance officer',NULL,NULL,1,0,0,0),(61,3,'american football',NULL,NULL,1,0,0,0),(62,3,'amiable: feeling and inspiring friendliness; lovable.',NULL,NULL,1,0,0,0),(63,3,'amusement centre manager',NULL,NULL,1,0,0,0),(64,3,'anaesthetist',NULL,NULL,1,0,0,0),(65,3,'analyst programmer',NULL,NULL,1,0,0,0),(66,3,'analytical skills',NULL,NULL,1,0,0,0),(67,3,'analytical: employing analytic methods; separating things into their parts of elements.',NULL,NULL,1,0,0,0),(68,3,'analytics',NULL,NULL,1,0,0,0),(69,3,'analyze',NULL,NULL,1,0,0,0),(70,1,'analyze data or facts',NULL,NULL,1,0,0,0),(71,3,'analyze data, audit and maintain records',NULL,NULL,1,0,0,0),(72,3,'analyzing data',NULL,NULL,1,0,0,0),(73,1,'analyzing problems',NULL,NULL,1,0,0,0),(74,3,'anatomist or physiologist',NULL,NULL,1,0,0,0),(75,3,'android',NULL,NULL,1,0,0,0),(76,3,'animal attendants and trainers nec',NULL,NULL,1,0,0,0),(77,3,'animal showing',NULL,NULL,1,0,0,0),(78,3,'answering telephone',NULL,NULL,1,0,0,0),(79,3,'anticipate needs',NULL,NULL,1,0,0,0),(80,3,'antique dealer',NULL,NULL,1,0,0,0),(81,3,'antiquing',NULL,NULL,1,0,0,0),(82,3,'antiquities',NULL,NULL,1,0,0,0),(83,3,'apiarist',NULL,NULL,1,0,0,0),(84,3,'apis',NULL,NULL,1,0,0,0),(85,3,'apparel cutter',NULL,NULL,1,0,0,0),(86,3,'appointment scheduling',NULL,NULL,1,0,0,0),(87,3,'arborist',NULL,NULL,1,0,0,0),(88,3,'archaeologist',NULL,NULL,1,0,0,0),(89,3,'archery',NULL,NULL,1,0,0,0),(90,3,'architect',NULL,NULL,1,0,0,0),(91,3,'architectural draftsperson',NULL,NULL,1,0,0,0),(92,3,'architectural, building and surveying technicians nec',NULL,NULL,1,0,0,0),(93,3,'archivist',NULL,NULL,1,0,0,0),(94,3,'arrange meetings or social functions',NULL,NULL,1,0,0,0),(95,3,'arrange social functions',NULL,NULL,1,0,0,0),(96,3,'art administrator or manager',NULL,NULL,1,0,0,0),(97,3,'art collecting',NULL,NULL,1,0,0,0),(98,3,'art design',NULL,NULL,1,0,0,0),(99,3,'art director (film, television or stage)',NULL,NULL,1,0,0,0),(100,3,'art skills related to your teaching',NULL,NULL,1,0,0,0),(101,3,'art teacher (private tuition)',NULL,NULL,1,0,0,0),(102,3,'articulate',NULL,NULL,1,0,0,0),(103,3,'articulate: able to express oneself clearly, do not mumble.',NULL,NULL,1,0,0,0),(104,1,'artistic',NULL,NULL,1,0,0,0),(105,3,'artistic director',NULL,NULL,1,0,0,0),(106,3,'ask for help appropriately',NULL,NULL,1,0,0,0),(107,3,'assemble kits',NULL,NULL,1,0,0,0),(108,1,'assemble or make things',NULL,'Alert',1,0,0,0),(109,1,'assembling apparatus',NULL,NULL,1,0,0,0),(110,3,'assembling equipment',NULL,NULL,1,0,0,0),(111,3,'assembling things',NULL,NULL,1,0,0,0),(112,3,'assembly line work',NULL,NULL,1,0,0,0),(113,2,'assertive',NULL,NULL,1,0,0,0),(114,3,'assertive: insist on one\'s rights or opinions.',NULL,NULL,1,0,0,0),(115,3,'assess and evaluate my own work',NULL,NULL,1,0,0,0),(116,3,'assess and evaluate others\' work',NULL,NULL,1,0,0,0),(117,3,'association football (soccer)',NULL,NULL,1,0,0,0),(118,3,'astrology',NULL,NULL,1,0,0,0),(119,3,'astronomy',NULL,NULL,1,0,0,0),(120,3,'attend to visual detail',NULL,NULL,1,0,0,0),(121,3,'attending classes and lectures',NULL,NULL,1,0,0,0),(122,3,'attention to detail',NULL,NULL,1,0,0,0),(123,3,'attention to details ',NULL,NULL,1,0,0,0),(124,3,'attentive: to notice, pay attention to, careful attention.',NULL,NULL,1,0,0,0),(125,2,'attractive',NULL,NULL,1,0,0,0),(126,3,'auctioneer',NULL,NULL,1,0,0,0),(127,3,'audiologist',NULL,NULL,1,0,0,0),(128,3,'audiophilia',NULL,NULL,1,0,0,0),(129,1,'audit records',NULL,NULL,1,0,0,0),(130,3,'auditing financial data ',NULL,NULL,1,0,0,0),(131,1,'auditing financial reports',NULL,NULL,1,0,0,0),(132,3,'australian football league',NULL,NULL,1,0,0,0),(133,3,'authors',NULL,NULL,1,0,0,0),(134,3,'auto audiophilia',NULL,NULL,1,0,0,0),(135,3,'auto body repair',NULL,NULL,1,0,0,0),(136,3,'auto racing',NULL,NULL,1,0,0,0),(137,3,'autocad',NULL,NULL,1,0,0,0),(138,3,'automotive electrician',NULL,NULL,1,0,0,0),(139,3,'avoid wasting time',NULL,NULL,1,0,0,0),(140,3,'back to top',NULL,NULL,1,0,0,0),(141,3,'backing large trucks into small openings',NULL,NULL,1,0,0,0),(142,3,'backpacking',NULL,NULL,1,0,0,0),(143,3,'backup management',NULL,NULL,1,0,0,0),(144,3,'badminton',NULL,NULL,1,0,0,0),(145,3,'baker',NULL,NULL,1,0,0,0),(146,3,'baking',NULL,NULL,1,0,0,0),(147,1,'balance money',NULL,NULL,1,0,0,0),(148,3,'barrister',NULL,NULL,1,0,0,0),(149,3,'bartender',NULL,NULL,1,0,0,0),(150,3,'base jumping',NULL,NULL,1,0,0,0),(151,3,'baseball',NULL,NULL,1,0,0,0),(152,3,'basic academic skills in reading, writing, and ',NULL,NULL,1,0,0,0),(153,1,'basic accounting',NULL,NULL,1,0,0,0),(154,3,'basketball',NULL,NULL,1,0,0,0),(155,3,'baton twirling',NULL,NULL,1,0,0,0),(156,3,'be a good listener',NULL,NULL,1,0,0,0),(157,2,'be a respectful house guest',NULL,NULL,1,0,0,0),(158,3,'be artistic',NULL,NULL,1,0,0,0),(159,3,'be competitive when necessary',NULL,NULL,1,0,0,0),(160,3,'be inventive',NULL,NULL,1,0,0,0),(161,3,'be kind and understanding',NULL,NULL,1,0,0,0),(162,3,'be logical',NULL,NULL,1,0,0,0),(163,3,'be outgoing',NULL,NULL,1,0,0,0),(164,3,'be pleasant and sociable',NULL,NULL,1,0,0,0),(165,3,'be tactful and diplomatic',NULL,NULL,1,0,0,0),(166,3,'be tough when necessary',NULL,NULL,1,0,0,0),(167,3,'beading ',NULL,NULL,1,0,0,0),(168,3,'beautician',NULL,NULL,1,0,0,0),(169,1,'becoming actively involved',NULL,NULL,1,0,0,0),(170,3,'bed and breakfast operator',NULL,NULL,1,0,0,0),(171,3,'beef cattle farmer',NULL,NULL,1,0,0,0),(172,3,'beekeeping',NULL,NULL,1,0,0,0),(173,2,'being photogenic',NULL,NULL,1,0,0,0),(174,1,'being thorough',NULL,NULL,1,0,0,0),(175,3,'betting agency manager',NULL,NULL,1,0,0,0),(176,3,'billiards',NULL,NULL,1,0,0,0),(177,3,'billing',NULL,NULL,1,0,0,0),(178,3,'binder and finisher',NULL,NULL,1,0,0,0),(179,3,'biochemist',NULL,NULL,1,0,0,0),(180,3,'biomedical engineer',NULL,NULL,1,0,0,0),(181,3,'biotechnologist',NULL,NULL,1,0,0,0),(182,3,'bird watching',NULL,NULL,1,0,0,0),(183,3,'birdwatching',NULL,NULL,1,0,0,0),(184,3,'blacksmith',NULL,NULL,1,0,0,0),(185,3,'board sports',NULL,NULL,1,0,0,0),(186,3,'boarding kennel or cattery operator',NULL,NULL,1,0,0,0),(187,3,'boat builder and repairer',NULL,NULL,1,0,0,0),(188,3,'bobbin lace ',NULL,NULL,1,0,0,0),(189,2,'bold',NULL,NULL,1,0,0,0),(190,3,'book collecting',NULL,NULL,1,0,0,0),(191,3,'book or script editor',NULL,NULL,1,0,0,0),(192,3,'bookbinding ',NULL,NULL,1,0,0,0),(193,3,'bookkeeping',NULL,NULL,1,0,0,0),(194,3,'bookkeeping skills',NULL,NULL,1,0,0,0),(195,3,'botanist',NULL,NULL,1,0,0,0),(196,3,'bowling',NULL,NULL,1,0,0,0),(197,3,'box making',NULL,NULL,1,0,0,0),(198,3,'boxing',NULL,NULL,1,0,0,0),(199,3,'brainstorming',NULL,NULL,1,0,0,0),(200,3,'brick laying',NULL,NULL,1,0,0,0),(201,3,'bricklayer',NULL,NULL,1,0,0,0),(202,3,'broadcast transmitter operator',NULL,NULL,1,0,0,0),(203,2,'broad-minded',NULL,NULL,1,0,0,0),(204,3,'broad-minded: being tolerant or liberal in thought or opinion.',NULL,NULL,1,0,0,0),(205,3,'budgeting',NULL,NULL,1,0,0,0),(206,1,'budgeting expenses',NULL,NULL,1,0,0,0),(207,3,'buffing',NULL,NULL,1,0,0,0),(208,3,'build a fire',NULL,NULL,1,0,0,0),(209,3,'build or construct',NULL,NULL,1,0,0,0),(210,3,'build or repair things',NULL,NULL,1,0,0,0),(211,1,'build, observe, inspect things',NULL,NULL,1,0,0,0),(212,3,'building',NULL,NULL,1,0,0,0),(213,3,'building additions',NULL,NULL,1,0,0,0),(214,3,'building and engineering technicians nec',NULL,NULL,1,0,0,0),(215,3,'building associate',NULL,NULL,1,0,0,0),(216,3,'building inspector',NULL,NULL,1,0,0,0),(217,3,'building new business ',NULL,NULL,1,0,0,0),(218,3,'bus spotting',NULL,NULL,1,0,0,0),(219,3,'busboy',NULL,NULL,1,0,0,0),(220,3,'business broker',NULL,NULL,1,0,0,0),(221,3,'business communication skills',NULL,NULL,1,0,0,0),(222,3,'business machine mechanic',NULL,NULL,1,0,0,0),(223,3,'business management skills',NULL,NULL,1,0,0,0),(224,2,'businesslike',NULL,NULL,1,0,0,0),(225,3,'businesslike: practical, systematic.',NULL,NULL,1,0,0,0),(226,3,'butcher or smallgoods maker',NULL,NULL,1,0,0,0),(227,3,'buy a woman clothing',NULL,NULL,1,0,0,0),(228,3,'c',NULL,NULL,1,0,0,0),(229,3,'c++',NULL,NULL,1,0,0,0),(230,3,'cabinet building',NULL,NULL,1,0,0,0),(231,3,'cabinetmaker',NULL,NULL,1,0,0,0),(232,3,'cabler (data and telecommunications)',NULL,NULL,1,0,0,0),(233,3,'caf  or restaurant manager',NULL,NULL,1,0,0,0),(234,3,'calculate or compute',NULL,NULL,1,0,0,0),(235,1,'calculate, compute',NULL,NULL,1,0,0,0),(236,3,'calculating data',NULL,NULL,1,0,0,0),(237,1,'calculating numerical data',NULL,NULL,1,0,0,0),(238,3,'call or contact centre manager',NULL,NULL,1,0,0,0),(239,3,'calligraphy ',NULL,NULL,1,0,0,0),(240,3,'calling clients',NULL,NULL,1,0,0,0),(241,2,'calm',NULL,NULL,1,0,0,0),(242,3,'calm a crying baby',NULL,NULL,1,0,0,0),(243,3,'calm: stillness, serenity, peaceful, undisturbed.',NULL,NULL,1,0,0,0),(244,3,'camera operator (film, television or video)',NULL,NULL,1,0,0,0),(245,3,'canning or preserving',NULL,NULL,1,0,0,0),(246,3,'canvas goods maker',NULL,NULL,1,0,0,0),(247,3,'capable problem solver',NULL,NULL,1,0,0,0),(248,3,'capable: having the skills/ability or fitness for.',NULL,NULL,1,0,0,0),(249,3,'car driving',NULL,NULL,1,0,0,0),(250,3,'car tune-up',NULL,NULL,1,0,0,0),(251,3,'caravan park and camping ground manager',NULL,NULL,1,0,0,0),(252,3,'card collecting',NULL,NULL,1,0,0,0),(253,3,'cardiologist',NULL,NULL,1,0,0,0),(254,3,'cardiopulmonary resuscitation',NULL,NULL,1,0,0,0),(255,3,'cardiothoracic surgeon',NULL,NULL,1,0,0,0),(256,3,'careers counsellor',NULL,NULL,1,0,0,0),(257,2,'careful',NULL,NULL,1,0,0,0),(258,3,'careful: watchful, cautious, concerned for.',NULL,NULL,1,0,0,0),(259,3,'caring',NULL,NULL,1,0,0,0),(260,3,'carpenter',NULL,NULL,1,0,0,0),(261,3,'carpenter and joiner',NULL,NULL,1,0,0,0),(262,3,'carpentry skills',NULL,NULL,1,0,0,0),(263,3,'carpentry work',NULL,NULL,1,0,0,0),(264,3,'cartographer',NULL,NULL,1,0,0,0),(265,3,'carve a turkey',NULL,NULL,1,0,0,0),(266,3,'cashier',NULL,NULL,1,0,0,0),(267,3,'categorizing records',NULL,NULL,1,0,0,0),(268,2,'cautious',NULL,NULL,1,0,0,0),(269,3,'certifications',NULL,NULL,1,0,0,0),(270,3,'change a tire',NULL,NULL,1,0,0,0),(271,3,'change oil',NULL,NULL,1,0,0,0),(272,3,'changing a light bulb',NULL,NULL,1,0,0,0),(273,3,'changing a tire on a car',NULL,NULL,1,0,0,0),(274,3,'changing tires',NULL,NULL,1,0,0,0),(275,3,'changing truck tires',NULL,NULL,1,0,0,0),(276,2,'charming',NULL,NULL,1,0,0,0),(277,3,'check coolant level',NULL,NULL,1,0,0,0),(278,3,'check information for accuracy',NULL,NULL,1,0,0,0),(279,3,'check tire pressure',NULL,NULL,1,0,0,0),(280,1,'checking for accuracy',NULL,NULL,1,0,0,0),(281,3,'checking the oil in a car',NULL,NULL,1,0,0,0),(282,2,'cheerful',NULL,NULL,1,0,0,0),(283,3,'cheerleading',NULL,NULL,1,0,0,0),(284,3,'chef',NULL,NULL,1,0,0,0),(285,3,'chemical engineer',NULL,NULL,1,0,0,0),(286,3,'chemical plant operator',NULL,NULL,1,0,0,0),(287,3,'chemist',NULL,NULL,1,0,0,0),(288,3,'chemistry technician',NULL,NULL,1,0,0,0),(289,3,'chess',NULL,NULL,1,0,0,0),(290,3,'chief executive or managing director',NULL,NULL,1,0,0,0),(291,3,'chief information officer',NULL,NULL,1,0,0,0),(292,3,'child care',NULL,NULL,1,0,0,0),(293,3,'child care centre manager',NULL,NULL,1,0,0,0),(294,3,'chiropractor',NULL,NULL,1,0,0,0),(295,3,'cinema or theatre manager',NULL,NULL,1,0,0,0),(296,3,'city driving',NULL,NULL,1,0,0,0),(297,3,'civil engineer',NULL,NULL,1,0,0,0),(298,3,'civil engineering draftsperson',NULL,NULL,1,0,0,0),(299,3,'civil engineering technician',NULL,NULL,1,0,0,0),(300,1,'classify data',NULL,NULL,1,0,0,0),(301,1,'classifying records',NULL,NULL,1,0,0,0),(302,3,'cleaning',NULL,NULL,1,0,0,0),(303,3,'cleaning bathrooms',NULL,NULL,1,0,0,0),(304,3,'cleaning rugs or carpets',NULL,NULL,1,0,0,0),(305,3,'cleaning your residence',NULL,NULL,1,0,0,0),(306,3,'clearing a drain',NULL,NULL,1,0,0,0),(307,3,'clearing the table',NULL,NULL,1,0,0,0),(308,3,'clearly express myself',NULL,NULL,1,0,0,0),(309,2,'clear-thinking',NULL,NULL,1,0,0,0),(310,3,'clerk',NULL,NULL,1,0,0,0),(311,3,'clerk duties',NULL,NULL,1,0,0,0),(312,2,'clever',NULL,NULL,1,0,0,0),(313,3,'client server',NULL,NULL,1,0,0,0),(314,3,'client support',NULL,NULL,1,0,0,0),(315,3,'climbing',NULL,NULL,1,0,0,0),(316,3,'clinical coder',NULL,NULL,1,0,0,0),(317,3,'clinical haematologist',NULL,NULL,1,0,0,0),(318,3,'clinical psychologist',NULL,NULL,1,0,0,0),(319,3,'clothing patternmaker',NULL,NULL,1,0,0,0),(320,3,'clothing trades worker',NULL,NULL,1,0,0,0),(321,3,'coach',NULL,NULL,1,0,0,0),(322,3,'coaching',NULL,NULL,1,0,0,0),(323,1,'coaching individuals',NULL,NULL,1,0,0,0),(324,3,'coaching skills',NULL,NULL,1,0,0,0),(325,3,'coin collecting',NULL,NULL,1,0,0,0),(326,1,'collaborating ideas',NULL,NULL,1,0,0,0),(327,3,'collecting items',NULL,NULL,1,0,0,0),(328,1,'collecting money',NULL,NULL,1,0,0,0),(329,3,'college football',NULL,NULL,1,0,0,0),(330,3,'color guard',NULL,NULL,1,0,0,0),(331,3,'comfort a crying woman',NULL,NULL,1,0,0,0),(332,3,'commissioned defence force officer',NULL,NULL,1,0,0,0),(333,3,'commissioned fire officer',NULL,NULL,1,0,0,0),(334,3,'commissioned police officer',NULL,NULL,1,0,0,0),(335,3,'commodities trader',NULL,NULL,1,0,0,0),(336,3,'common sense',NULL,NULL,1,0,0,0),(337,3,'communicate',NULL,NULL,1,0,0,0),(338,3,'communicate verbally',NULL,'Writes clearly and concisely, speaks effectively, listens attentively, openly expresses ideas, negotiates/resolves differences, leads group discussions, provides feedback, persuades others, provides well-thought out solutions, gathers appropriate information, confidently speaks in public',1,0,0,0),(339,3,'communicate well',NULL,NULL,1,0,0,0),(340,3,'communicating with young or old people',NULL,NULL,1,0,0,0),(341,3,'communications operator',NULL,NULL,1,0,0,0),(342,3,'community arts worker',NULL,NULL,1,0,0,0),(343,3,'community worker',NULL,NULL,1,0,0,0),(344,3,'company secretary',NULL,NULL,1,0,0,0),(345,1,'compare, inspect, or record facts',NULL,NULL,1,0,0,0),(346,1,'comparing results',NULL,NULL,1,0,0,0),(347,2,'competent',NULL,NULL,1,0,0,0),(348,3,'competent: adequately qualified, ability.',NULL,NULL,1,0,0,0),(349,2,'competitive',NULL,NULL,1,0,0,0),(350,1,'compiling statistics',NULL,NULL,1,0,0,0),(351,3,'complementary health therapist nec',NULL,NULL,1,0,0,0),(352,3,'composer',NULL,NULL,1,0,0,0),(353,3,'comprehending books or ideas',NULL,NULL,1,0,0,0),(354,1,'comprehending ideas',NULL,NULL,1,0,0,0),(355,3,'comprehension',NULL,NULL,1,0,0,0),(356,3,'computation ',NULL,NULL,1,0,0,0),(357,3,'computer network and systems engineer',NULL,NULL,1,0,0,0),(358,3,'computer programming',NULL,NULL,1,0,0,0),(359,3,'computer skills',NULL,NULL,1,0,0,0),(360,3,'concrete work',NULL,NULL,1,0,0,0),(361,3,'conduct research in a library or on the internet',NULL,NULL,1,0,0,0),(362,1,'conducting interviews',NULL,NULL,1,0,0,0),(363,1,'conducting meetings',NULL,NULL,1,0,0,0),(364,3,'conference and event organiser',NULL,NULL,1,0,0,0),(365,2,'confident',NULL,NULL,1,0,0,0),(366,3,'confident: trusting, fully assured, belief, trust in yourself.',NULL,NULL,1,0,0,0),(367,3,'configuration',NULL,NULL,1,0,0,0),(368,3,'conflict management',NULL,NULL,1,0,0,0),(369,3,'conflict resolution ',NULL,NULL,1,0,0,0),(370,3,'confront others',NULL,NULL,1,0,0,0),(371,1,'confronting other people',NULL,NULL,1,0,0,0),(372,2,'conscientious',NULL,NULL,1,0,0,0),(373,3,'conscientious: good moral understanding of right and wrong.',NULL,NULL,1,0,0,0),(374,3,'conservation officer',NULL,NULL,1,0,0,0),(375,2,'conservative',NULL,NULL,1,0,0,0),(376,3,'conservator',NULL,NULL,1,0,0,0),(377,2,'considerate',NULL,NULL,1,0,0,0),(378,3,'consistent: constant to same principles, not changing.',NULL,NULL,1,0,0,0),(379,1,'construct or repair',NULL,NULL,1,0,0,0),(380,1,'constructing buildings',NULL,NULL,1,0,0,0),(381,3,'construction',NULL,NULL,1,0,0,0),(382,3,'construction estimator',NULL,NULL,1,0,0,0),(383,3,'construction project manager',NULL,NULL,1,0,0,0),(384,3,'construction skills',NULL,NULL,1,0,0,0),(385,3,'consulting organizations',NULL,NULL,1,0,0,0),(386,3,'content management systems',NULL,NULL,1,0,0,0),(387,3,'contract administrator',NULL,NULL,1,0,0,0),(388,3,'contract, project or program administrator',NULL,NULL,1,0,0,0),(389,3,'conveyancer',NULL,NULL,1,0,0,0),(390,3,'cook',NULL,NULL,1,0,0,0),(391,3,'cook s assistant',NULL,NULL,1,0,0,0),(392,3,'cooking',NULL,NULL,1,0,0,0),(393,3,'cooking food',NULL,NULL,1,0,0,0),(394,2,'cool',NULL,NULL,1,0,0,0),(395,3,'cooperation',NULL,NULL,1,0,0,0),(396,2,'cooperative',NULL,NULL,1,0,0,0),(397,3,'cooperative: work well with others.',NULL,NULL,1,0,0,0),(398,3,'coordinate fundraising activities',NULL,NULL,1,0,0,0),(399,1,'coordinating schedules/times',NULL,NULL,1,0,0,0),(400,1,'coping with deadlines',NULL,NULL,1,0,0,0),(401,3,'copywriter',NULL,NULL,1,0,0,0),(402,3,'corel draw',NULL,NULL,1,0,0,0),(403,3,'corel word perfect',NULL,NULL,1,0,0,0),(404,3,'corporate general manager',NULL,NULL,1,0,0,0),(405,3,'corporate treasurer',NULL,NULL,1,0,0,0),(406,3,'correctly filling orders',NULL,NULL,1,0,0,0),(407,3,'cosmetics consulting',NULL,NULL,1,0,0,0),(408,3,'cosplaying',NULL,NULL,1,0,0,0),(409,3,'cotton grower',NULL,NULL,1,0,0,0),(410,3,'counsel people',NULL,NULL,1,0,0,0),(411,3,'counseling others',NULL,NULL,1,0,0,0),(412,3,'counseling people ',NULL,NULL,1,0,0,0),(413,3,'counseling skills',NULL,NULL,1,0,0,0),(414,1,'counseling/consulting people',NULL,NULL,1,0,0,0),(415,3,'counsellors nec',NULL,NULL,1,0,0,0),(416,1,'count, observe, compile',NULL,NULL,1,0,0,0),(417,2,'courageous',NULL,NULL,1,0,0,0),(418,3,'court bailiff or sheriff (aus) / court collections officer (nz)',NULL,NULL,1,0,0,0),(419,3,'create and talk about new ideas',NULL,NULL,1,0,0,0),(420,1,'creating meaningful and challenging work',NULL,NULL,1,0,0,0),(421,3,'creating meaningful work',NULL,NULL,1,0,0,0),(422,1,'creating new ideas',NULL,NULL,1,0,0,0),(423,2,'creative',NULL,NULL,1,0,0,0),(424,3,'creative thinking',NULL,NULL,1,0,0,0),(425,3,'creative thinking and problem solving ',NULL,NULL,1,0,0,0),(426,3,'creative thinking skills ',NULL,NULL,1,0,0,0),(427,3,'creative writing',NULL,NULL,1,0,0,0),(428,1,'creative, artistic',NULL,NULL,1,0,0,0),(429,3,'creativity',NULL,NULL,1,0,0,0),(430,3,'cricket',NULL,NULL,1,0,0,0),(431,3,'cricket (indoor)',NULL,NULL,1,0,0,0),(432,3,'crisis work',NULL,NULL,1,0,0,0),(433,1,'critical thinking',NULL,NULL,1,0,0,0),(434,3,'critical thinking skills',NULL,NULL,1,0,0,0),(435,3,'crocheting',NULL,NULL,1,0,0,0),(436,3,'crop farmers nec',NULL,NULL,1,0,0,0),(437,3,'cryptography',NULL,NULL,1,0,0,0),(438,3,'css',NULL,NULL,1,0,0,0),(439,3,'cubing',NULL,NULL,1,0,0,0),(440,2,'curiosity',NULL,NULL,1,0,0,0),(441,3,'curling',NULL,NULL,1,0,0,0),(442,3,'customer relations',NULL,NULL,1,0,0,0),(443,3,'customer service',NULL,NULL,1,0,0,0),(444,3,'customer service manager',NULL,NULL,1,0,0,0),(445,3,'customer service skills',NULL,NULL,1,0,0,0),(446,3,'cycling',NULL,NULL,1,0,0,0),(447,3,'dairy cattle farmer',NULL,NULL,1,0,0,0),(448,3,'dance',NULL,NULL,1,0,0,0),(449,3,'dance teacher (private tuition)',NULL,NULL,1,0,0,0),(450,2,'dance, body movement',NULL,NULL,1,0,0,0),(451,3,'dance, create body movement',NULL,NULL,1,0,0,0),(452,3,'dancer or choreographer',NULL,NULL,1,0,0,0),(453,3,'dancing',NULL,NULL,1,0,0,0),(454,2,'daring',NULL,NULL,1,0,0,0),(455,3,'darts',NULL,NULL,1,0,0,0),(456,3,'data analytics',NULL,NULL,1,0,0,0),(457,3,'database administrator',NULL,NULL,1,0,0,0),(458,3,'deal with obstacles and crises',NULL,NULL,1,0,0,0),(459,3,'dealing with complaints',NULL,NULL,1,0,0,0),(460,1,'dealing with data',NULL,NULL,1,0,0,0),(461,3,'debate',NULL,NULL,1,0,0,0),(462,1,'deciding uses of money',NULL,NULL,1,0,0,0),(463,3,'decision making',NULL,NULL,1,0,0,0),(464,3,'decision making skills',NULL,NULL,1,0,0,0),(465,2,'decisive',NULL,NULL,1,0,0,0),(466,3,'decorating',NULL,NULL,1,0,0,0),(467,3,'decorating a store',NULL,NULL,1,0,0,0),(468,3,'decorating classrooms',NULL,NULL,1,0,0,0),(469,3,'dedicated: devoted to aims or vocation.',NULL,NULL,1,0,0,0),(470,3,'deer farmer',NULL,NULL,1,0,0,0),(471,3,'defence force member   other ranks',NULL,NULL,1,0,0,0),(472,3,'defence force senior officer',NULL,NULL,1,0,0,0),(473,1,'defining a problem',NULL,NULL,1,0,0,0),(474,1,'defining performance standards',NULL,NULL,1,0,0,0),(475,3,'defining problems',NULL,NULL,1,0,0,0),(476,3,'delegate',NULL,NULL,1,0,0,0),(477,3,'delegate responsibility',NULL,NULL,1,0,0,0),(478,1,'delegating responsibilities',NULL,NULL,1,0,0,0),(479,3,'delegating skills',NULL,NULL,1,0,0,0),(480,2,'deliberate',NULL,NULL,1,0,0,0),(481,3,'deliver bad news',NULL,NULL,1,0,0,0),(482,3,'delivery goods',NULL,NULL,1,0,0,0),(483,3,'deltiology (postcard collecting)',NULL,NULL,1,0,0,0),(484,2,'democratic',NULL,NULL,1,0,0,0),(485,3,'demonstrate something',NULL,NULL,1,0,0,0),(486,3,'demonstrating products',NULL,NULL,1,0,0,0),(487,3,'dental hygienist',NULL,NULL,1,0,0,0),(488,3,'dental prothetist',NULL,NULL,1,0,0,0),(489,3,'dental specialist',NULL,NULL,1,0,0,0),(490,3,'dental technician',NULL,NULL,1,0,0,0),(491,3,'dental therapist',NULL,NULL,1,0,0,0),(492,3,'dentist',NULL,NULL,1,0,0,0),(493,2,'dependable',NULL,NULL,1,0,0,0),(494,3,'dependable: may be relied on.',NULL,NULL,1,0,0,0),(495,3,'dermatologist',NULL,NULL,1,0,0,0),(496,1,'design',NULL,NULL,1,0,0,0),(497,3,'design buildings, furniture, etc.',NULL,NULL,1,0,0,0),(498,3,'design posters, draw cartoons and illustrations',NULL,NULL,1,0,0,0),(499,3,'design presentations',NULL,NULL,1,0,0,0),(500,3,'designing systems',NULL,NULL,1,0,0,0),(501,3,'desire to improve',NULL,NULL,1,0,0,0),(502,3,'desire to learn',NULL,NULL,1,0,0,0),(503,3,'desktop publishing',NULL,NULL,1,0,0,0),(504,3,'detail oriented',NULL,NULL,1,0,0,0),(505,1,'detail-oriented',NULL,NULL,1,0,0,0),(506,3,'detect a lie',NULL,NULL,1,0,0,0),(507,3,'detective',NULL,NULL,1,0,0,0),(508,3,'determination',NULL,NULL,1,0,0,0),(509,2,'determined',NULL,NULL,1,0,0,0),(510,3,'determined: to do, resolve, on a course of action.',NULL,NULL,1,0,0,0),(511,1,'determining a problem',NULL,NULL,1,0,0,0),(512,3,'developer programmer',NULL,NULL,1,0,0,0),(513,1,'developing a climate of enthusiasm, teamwork, and cooperation',NULL,NULL,1,0,0,0),(514,1,'developing plans for projects',NULL,NULL,1,0,0,0),(515,3,'dexterity',NULL,NULL,1,0,0,0),(516,3,'diagnostic and interventional radiologist',NULL,NULL,1,0,0,0),(517,3,'diagnostics',NULL,NULL,1,0,0,0),(518,3,'diesel motor mechanic',NULL,NULL,1,0,0,0),(519,3,'diesel repairs',NULL,NULL,1,0,0,0),(520,3,'dietitian',NULL,NULL,1,0,0,0),(521,3,'digital arts',NULL,NULL,1,0,0,0),(522,2,'dignified',NULL,NULL,1,0,0,0),(523,3,'diplomacy skills',NULL,NULL,1,0,0,0),(524,3,'diplomatic',NULL,NULL,1,0,0,0),(525,1,'direct others',NULL,NULL,1,0,0,0),(526,1,'direct projects',NULL,NULL,1,0,0,0),(527,3,'direct the work of others',NULL,NULL,1,0,0,0),(528,3,'directing clients',NULL,NULL,1,0,0,0),(529,3,'directing customers',NULL,NULL,1,0,0,0),(530,3,'directing procedures',NULL,NULL,1,0,0,0),(531,3,'director (film, television, radio or stage)',NULL,NULL,1,0,0,0),(532,3,'director of photography',NULL,NULL,1,0,0,0),(533,3,'disabilities services officer',NULL,NULL,1,0,0,0),(534,3,'disc golf',NULL,NULL,1,0,0,0),(535,2,'discreet',NULL,NULL,1,0,0,0),(536,3,'dishwashing',NULL,NULL,1,0,0,0),(537,1,'dispensing information',NULL,NULL,1,0,0,0),(538,3,'displaying art',NULL,NULL,1,0,0,0),(539,1,'displaying artistic ideas',NULL,NULL,1,0,0,0),(540,3,'displaying samples',NULL,NULL,1,0,0,0),(541,1,'distributing products',NULL,NULL,1,0,0,0),(542,3,'diver',NULL,NULL,1,0,0,0),(543,3,'diversional therapist',NULL,NULL,1,0,0,0),(544,3,'diving instructor (open water)',NULL,NULL,1,0,0,0),(545,3,'do basic cooking',NULL,NULL,1,0,0,0),(546,2,'do push-ups and sit-ups properly',NULL,NULL,1,0,0,0),(547,3,'documentation',NULL,NULL,1,0,0,0),(548,3,'doesn t in various situations',NULL,NULL,1,0,0,0),(549,3,'dog and horse racing official',NULL,NULL,1,0,0,0),(550,3,'dog handler or trainer',NULL,NULL,1,0,0,0),(551,3,'dog sport',NULL,NULL,1,0,0,0),(552,2,'dominant',NULL,NULL,1,0,0,0),(553,12,'donate at an organisation',NULL,NULL,1,0,0,0),(554,1,'drafting reports',NULL,NULL,1,0,0,0),(555,3,'drainer',NULL,NULL,1,0,0,0),(556,3,'drama',NULL,NULL,1,0,0,0),(557,3,'drama teacher (private tuition)',NULL,NULL,1,0,0,0),(558,1,'dramatizing ideas',NULL,NULL,1,0,0,0),(559,3,'draw or create other art',NULL,NULL,1,0,0,0),(560,1,'draw, sketch, render',NULL,NULL,1,0,0,0),(561,3,'drawing',NULL,NULL,1,0,0,0),(562,3,'drawing/painting ',NULL,NULL,1,0,0,0),(563,3,'dressmaker or tailor',NULL,NULL,1,0,0,0),(564,3,'driller',NULL,NULL,1,0,0,0),(565,3,'drinking coffee',NULL,NULL,1,0,0,0),(566,3,'drive a manual transmission vehicle',NULL,NULL,1,0,0,0),(567,1,'drive or operate vehicles',NULL,NULL,1,0,0,0),(568,3,'driving',NULL,NULL,1,0,0,0),(569,3,'driving ',NULL,NULL,1,0,0,0),(570,3,'driving diesel trucks',NULL,NULL,1,0,0,0),(571,3,'driving instructor',NULL,NULL,1,0,0,0),(572,3,'driving safely ',NULL,NULL,1,0,0,0),(573,3,'driving small trucks',NULL,NULL,1,0,0,0),(574,3,'drug and alcohol counsellor',NULL,NULL,1,0,0,0),(575,3,'drying clothes and dishes',NULL,NULL,1,0,0,0),(576,3,'dusting',NULL,NULL,1,0,0,0),(577,3,'dusting furniture',NULL,NULL,1,0,0,0),(578,3,'dyeing yarn ',NULL,NULL,1,0,0,0),(579,2,'eager',NULL,NULL,1,0,0,0),(580,3,'early childhood (pre-primary school) teacher',NULL,NULL,1,0,0,0),(581,3,'earth science technician',NULL,NULL,1,0,0,0),(582,2,'easygoing',NULL,NULL,1,0,0,0),(583,6,'eat healthy',NULL,NULL,1,0,0,0),(584,3,'eating',NULL,NULL,1,0,0,0),(585,3,'economist',NULL,NULL,1,0,0,0),(586,1,'edit a picture',NULL,NULL,1,0,0,0),(587,1,'edit a video',NULL,NULL,1,0,0,0),(588,3,'editing',NULL,NULL,1,0,0,0),(589,1,'editing work',NULL,NULL,1,0,0,0),(590,3,'education adviser',NULL,NULL,1,0,0,0),(591,3,'education managers nec',NULL,NULL,1,0,0,0),(592,3,'education reviewer',NULL,NULL,1,0,0,0),(593,3,'educational psychologist',NULL,NULL,1,0,0,0),(594,3,'effective listening skills ',NULL,NULL,1,0,0,0),(595,3,'effective study skills',NULL,NULL,1,0,0,0),(596,3,'efficiency',NULL,NULL,1,0,0,0),(597,2,'efficient',NULL,NULL,1,0,0,0),(598,3,'efficient: competent, capable, able to get results.',NULL,NULL,1,0,0,0),(599,3,'effort ',NULL,NULL,1,0,0,0),(600,3,'electorate officer',NULL,NULL,1,0,0,0),(601,3,'electrical engineer',NULL,NULL,1,0,0,0),(602,3,'electrical engineering draftsperson',NULL,NULL,1,0,0,0),(603,3,'electrical engineering technician',NULL,NULL,1,0,0,0),(604,3,'electrical linesworker',NULL,NULL,1,0,0,0),(605,3,'electrical repairs',NULL,NULL,1,0,0,0),(606,3,'electrical wiring',NULL,NULL,1,0,0,0),(607,3,'electrician (general)',NULL,NULL,1,0,0,0),(608,3,'electrician (special class)',NULL,NULL,1,0,0,0),(609,3,'electronic engineering draftsperson',NULL,NULL,1,0,0,0),(610,3,'electronic engineering technician',NULL,NULL,1,0,0,0),(611,3,'electronic equipment trades worker',NULL,NULL,1,0,0,0),(612,3,'electronic instrument trades worker (general)',NULL,NULL,1,0,0,0),(613,3,'electronic instrument trades worker (special class)',NULL,NULL,1,0,0,0),(614,3,'electronics ',NULL,NULL,1,0,0,0),(615,3,'electronics engineer',NULL,NULL,1,0,0,0),(616,3,'electroplater',NULL,NULL,1,0,0,0),(617,3,'element collecting',NULL,NULL,1,0,0,0),(618,3,'email',NULL,NULL,1,0,0,0),(619,3,'embroidery',NULL,NULL,1,0,0,0),(620,3,'embroidery ',NULL,NULL,1,0,0,0),(621,3,'emergency medicine specialist',NULL,NULL,1,0,0,0),(622,3,'emergency service worker',NULL,NULL,1,0,0,0),(623,2,'emotional',NULL,NULL,1,0,0,0),(624,3,'employee relations',NULL,NULL,1,0,0,0),(625,3,'empowering others',NULL,NULL,1,0,0,0),(626,3,'enameling ',NULL,NULL,1,0,0,0),(627,1,'encouraging others',NULL,NULL,1,0,0,0),(628,3,'encouraging people',NULL,NULL,1,0,0,0),(629,3,'end a date politely without making promises',NULL,NULL,1,0,0,0),(630,3,'end user support',NULL,NULL,1,0,0,0),(631,3,'endocrinologist',NULL,NULL,1,0,0,0),(632,1,'enduring long hours',NULL,NULL,1,0,0,0),(633,2,'energetic',NULL,NULL,1,0,0,0),(634,3,'energetic: active, full of life, vigorous, an energetic worker.',NULL,NULL,1,0,0,0),(635,3,'enforcing rules',NULL,NULL,1,0,0,0),(636,1,'enforcing rules and regulations',NULL,NULL,1,0,0,0),(637,3,'engineering',NULL,NULL,1,0,0,0),(638,3,'engineering manager',NULL,NULL,1,0,0,0),(639,3,'engineering patternmaker',NULL,NULL,1,0,0,0),(640,3,'engineering professionals nec',NULL,NULL,1,0,0,0),(641,3,'engineering technologist',NULL,NULL,1,0,0,0),(642,3,'engraver',NULL,NULL,1,0,0,0),(643,2,'enterprising',NULL,NULL,1,0,0,0),(644,3,'enterprising: strong interest, great eagerness.',NULL,NULL,1,0,0,0),(645,3,'entertainer or variety artist',NULL,NULL,1,0,0,0),(646,3,'entertaining others',NULL,NULL,1,0,0,0),(647,1,'entertaining people',NULL,NULL,1,0,0,0),(648,3,'enthusiasm',NULL,NULL,1,0,0,0),(649,2,'enthusiastic',NULL,NULL,1,0,0,0),(650,3,'environmental consultant',NULL,NULL,1,0,0,0),(651,3,'environmental engineer',NULL,NULL,1,0,0,0),(652,3,'environmental health officer',NULL,NULL,1,0,0,0),(653,3,'environmental manager',NULL,NULL,1,0,0,0),(654,3,'environmental research scientist',NULL,NULL,1,0,0,0),(655,3,'environmental scientists nec',NULL,NULL,1,0,0,0),(656,3,'envisioning solutions or ideas',NULL,NULL,1,0,0,0),(657,3,'equestrianism',NULL,NULL,1,0,0,0),(658,3,'equipment hire manager',NULL,NULL,1,0,0,0),(659,3,'esperanto ',NULL,NULL,1,0,0,0),(660,1,'estimating physical space',NULL,NULL,1,0,0,0),(661,3,'estimating project workload',NULL,NULL,1,0,0,0),(662,3,'ethics',NULL,NULL,1,0,0,0),(663,3,'evaluate',NULL,NULL,1,0,0,0),(664,3,'evaluate information for relevance and accuracy',NULL,NULL,1,0,0,0),(665,1,'evaluating programs',NULL,NULL,1,0,0,0),(666,3,'evaluating work',NULL,NULL,1,0,0,0),(667,3,'excel',NULL,NULL,1,0,0,0),(668,3,'excellent ability to adapt to difficult situations',NULL,NULL,1,0,0,0),(669,3,'exhibition drill',NULL,NULL,1,0,0,0),(670,3,'experience in the art of persuading',NULL,NULL,1,0,0,0),(671,3,'explain ideas well',NULL,NULL,1,0,0,0),(672,3,'explain things to others',NULL,NULL,1,0,0,0),(673,3,'express myself through music, poetry, or art',NULL,NULL,1,0,0,0),(674,1,'expressing feelings',NULL,NULL,1,0,0,0),(675,3,'expressing ideas',NULL,NULL,1,0,0,0),(676,1,'expressing ideas orally to individuals or groups',NULL,NULL,1,0,0,0),(677,2,'expressive',NULL,NULL,1,0,0,0),(678,3,'external auditor',NULL,NULL,1,0,0,0),(679,3,'extracting information ',NULL,NULL,1,0,0,0),(680,3,'facials',NULL,NULL,1,0,0,0),(681,3,'facilities manager',NULL,NULL,1,0,0,0),(682,3,'factory skills',NULL,NULL,1,0,0,0),(683,3,'faculty head',NULL,NULL,1,0,0,0),(684,2,'fair-minded',NULL,NULL,1,0,0,0),(685,3,'family and marriage counsellor',NULL,NULL,1,0,0,0),(686,3,'family support worker',NULL,NULL,1,0,0,0),(687,3,'farm laborer (list skills and machinery you can use)',NULL,NULL,1,0,0,0),(688,3,'farming skills (please list all your skills)',NULL,NULL,1,0,0,0),(689,3,'farrier',NULL,NULL,1,0,0,0),(690,2,'farsighted',NULL,NULL,1,0,0,0),(691,3,'fashion designer',NULL,NULL,1,0,0,0),(692,3,'felting ',NULL,NULL,1,0,0,0),(693,3,'fencing',NULL,NULL,1,0,0,0),(694,3,'fibrous plasterer',NULL,NULL,1,0,0,0),(695,3,'field hockey',NULL,NULL,1,0,0,0),(696,3,'figure skating',NULL,NULL,1,0,0,0),(697,3,'filemaker pro',NULL,NULL,1,0,0,0),(698,3,'filing',NULL,NULL,1,0,0,0),(699,3,'filling orders',NULL,NULL,1,0,0,0),(700,3,'film and video editor',NULL,NULL,1,0,0,0),(701,3,'film, television, radio and stage directors nec',NULL,NULL,1,0,0,0),(702,3,'fimo ',NULL,NULL,1,0,0,0),(703,3,'finance',NULL,NULL,1,0,0,0),(704,3,'finance broker',NULL,NULL,1,0,0,0),(705,3,'finance brokers nec',NULL,NULL,1,0,0,0),(706,3,'finance manager',NULL,NULL,1,0,0,0),(707,3,'financial dealers nec',NULL,NULL,1,0,0,0),(708,3,'financial institution branch manager',NULL,NULL,1,0,0,0),(709,3,'financial investment adviser',NULL,NULL,1,0,0,0),(710,3,'financial investment manager',NULL,NULL,1,0,0,0),(711,3,'financial market dealer',NULL,NULL,1,0,0,0),(712,1,'finding information',NULL,NULL,1,0,0,0),(713,3,'finding missing information',NULL,NULL,1,0,0,0),(714,3,'fire fighter',NULL,NULL,1,0,0,0),(715,3,'fire protection equipment technician',NULL,NULL,1,0,0,0),(716,2,'firm',NULL,NULL,1,0,0,0),(717,3,'first aid',NULL,NULL,1,0,0,0),(718,3,'first aid trainer',NULL,NULL,1,0,0,0),(719,3,'fisheries inspector',NULL,NULL,1,0,0,0),(720,3,'fishing',NULL,NULL,1,0,0,0),(721,3,'fitness centre manager',NULL,NULL,1,0,0,0),(722,3,'fitter (general)',NULL,NULL,1,0,0,0),(723,3,'fitter and turner',NULL,NULL,1,0,0,0),(724,3,'fitter-welder',NULL,NULL,1,0,0,0),(725,3,'fleet manager',NULL,NULL,1,0,0,0),(726,2,'flexibility',NULL,NULL,1,0,0,0),(727,2,'flexible',NULL,NULL,1,0,0,0),(728,3,'flexible: manageable, adaptable, versatile.',NULL,NULL,1,0,0,0),(729,3,'flirt without looking ridiculous',NULL,NULL,1,0,0,0),(730,3,'floor finisher',NULL,NULL,1,0,0,0),(731,3,'florist',NULL,NULL,1,0,0,0),(732,3,'flower collecting and pressing',NULL,NULL,1,0,0,0),(733,3,'flower gardening',NULL,NULL,1,0,0,0),(734,3,'flower grower',NULL,NULL,1,0,0,0),(735,3,'flying',NULL,NULL,1,0,0,0),(736,3,'flying instructor',NULL,NULL,1,0,0,0),(737,3,'folding clothes, towels, or sheets',NULL,NULL,1,0,0,0),(738,1,'follow instructions',NULL,NULL,1,0,0,0),(739,3,'follow instructions and company',NULL,NULL,1,0,0,0),(740,3,'follow proper sequences',NULL,NULL,1,0,0,0),(741,3,'following a recipe',NULL,NULL,1,0,0,0),(742,3,'following instructions ',NULL,NULL,1,0,0,0),(743,3,'food preparation',NULL,NULL,1,0,0,0),(744,3,'food technologist',NULL,NULL,1,0,0,0),(745,3,'footbag',NULL,NULL,1,0,0,0),(746,3,'football',NULL,NULL,1,0,0,0),(747,3,'footballer',NULL,NULL,1,0,0,0),(748,3,'foraging',NULL,NULL,1,0,0,0),(749,2,'forceful',NULL,NULL,1,0,0,0),(750,3,'forecasting',NULL,NULL,1,0,0,0),(751,3,'foreign language learning',NULL,NULL,1,0,0,0),(752,3,'foreign languages',NULL,NULL,1,0,0,0),(753,3,'forester',NULL,NULL,1,0,0,0),(754,2,'formal',NULL,NULL,1,0,0,0),(755,3,'formulating new ideas',NULL,NULL,1,0,0,0),(756,3,'fortran',NULL,NULL,1,0,0,0),(757,3,'fossil hunting',NULL,NULL,1,0,0,0),(758,2,'frank',NULL,NULL,1,0,0,0),(759,2,'friendly',NULL,NULL,1,0,0,0),(760,3,'friendship',NULL,NULL,1,0,0,0),(761,3,'fruit or nut grower',NULL,NULL,1,0,0,0),(762,3,'funeral director',NULL,NULL,1,0,0,0),(763,3,'funeral workers nec',NULL,NULL,1,0,0,0),(764,3,'furniture finisher',NULL,NULL,1,0,0,0),(765,3,'furniture making',NULL,NULL,1,0,0,0),(766,3,'furniture refinishing',NULL,NULL,1,0,0,0),(767,3,'futures trader',NULL,NULL,1,0,0,0),(768,3,'gallery or museum curator',NULL,NULL,1,0,0,0),(769,3,'gallery or museum technician',NULL,NULL,1,0,0,0),(770,3,'gambling',NULL,NULL,1,0,0,0),(771,3,'gaming',NULL,NULL,1,0,0,0),(772,3,'gaming (tabletop games and role-playing games)',NULL,NULL,1,0,0,0),(773,3,'garage skills',NULL,NULL,1,0,0,0),(774,3,'gardener (general)',NULL,NULL,1,0,0,0),(775,3,'gardening','Compost',NULL,1,0,0,0),(776,3,'gardening ',NULL,NULL,1,0,0,0),(777,3,'gardening skills',NULL,NULL,1,0,0,0),(778,3,'gas or petroleum operator',NULL,NULL,1,0,0,0),(779,3,'gasfitter',NULL,NULL,1,0,0,0),(780,3,'gastroenterologist',NULL,NULL,1,0,0,0),(781,1,'gathering information',NULL,NULL,1,0,0,0),(782,3,'genealogy',NULL,NULL,1,0,0,0),(783,2,'general conscientiousness','Accept Constructive Criticism',NULL,1,0,0,0),(784,3,'general medical practitioner',NULL,NULL,1,0,0,0),(785,3,'general repair skills (list all your areas of experience)',NULL,NULL,1,0,0,0),(786,3,'generate creative solutions to problems',NULL,NULL,1,0,0,0),(787,1,'generating accounts',NULL,NULL,1,0,0,0),(788,2,'generous',NULL,NULL,1,0,0,0),(789,2,'gentle',NULL,NULL,1,0,0,0),(790,3,'geocaching',NULL,NULL,1,0,0,0),(791,3,'geologist',NULL,NULL,1,0,0,0),(792,3,'geophysicist',NULL,NULL,1,0,0,0),(793,3,'geotechnical engineer',NULL,NULL,1,0,0,0),(794,3,'german ',NULL,NULL,1,0,0,0),(795,5,'get a busy bartender\'s attention',NULL,NULL,1,0,0,0),(796,1,'get results',NULL,NULL,1,0,0,0),(797,3,'ghost hunting',NULL,NULL,1,0,0,0),(798,3,'give a compliment',NULL,NULL,1,0,0,0),(799,5,'give a good massage',NULL,NULL,1,0,0,0),(800,3,'give driving directions',NULL,NULL,1,0,0,0),(801,3,'giving permanents and body waves',NULL,NULL,1,0,0,0),(802,3,'glazier',NULL,NULL,1,0,0,0),(803,3,'go',NULL,NULL,1,0,0,0),(804,3,'goal setting',NULL,NULL,1,0,0,0),(805,3,'goal setting ',NULL,NULL,1,0,0,0),(806,3,'goat farmer',NULL,NULL,1,0,0,0),(807,3,'golfer',NULL,NULL,1,0,0,0),(808,3,'golfing',NULL,NULL,1,0,0,0),(809,3,'gongoozling',NULL,NULL,1,0,0,0),(810,3,'good communication skills including ',NULL,NULL,1,0,0,0),(811,3,'good organizational skills',NULL,NULL,1,0,0,0),(812,1,'good with my hands',NULL,NULL,1,0,0,0),(813,2,'good-natured',NULL,NULL,1,0,0,0),(814,1,'google efficiently',NULL,NULL,1,0,0,0),(815,3,'graffiti',NULL,NULL,1,0,0,0),(816,3,'grafting',NULL,NULL,1,0,0,0),(817,3,'grain, oilseed or pasture grower (australia) / field crop grower (new zealand)',NULL,NULL,1,0,0,0),(818,3,'grape grower',NULL,NULL,1,0,0,0),(819,3,'graphic design',NULL,NULL,1,0,0,0),(820,3,'graphic designer',NULL,NULL,1,0,0,0),(821,3,'graphic pre-press trades worker ',NULL,NULL,1,0,0,0),(822,3,'greenhouse work',NULL,NULL,1,0,0,0),(823,3,'greenkeeper',NULL,NULL,1,0,0,0),(824,3,'greeting clients',NULL,NULL,1,0,0,0),(825,3,'greeting customers',NULL,NULL,1,0,0,0),(826,3,'group counseling (list what types of problems)',NULL,NULL,1,0,0,0),(827,3,'gunsmith',NULL,NULL,1,0,0,0),(828,3,'gymnastics',NULL,NULL,1,0,0,0),(829,3,'gymnastics coach or instructor',NULL,NULL,1,0,0,0),(830,3,'hair coloring',NULL,NULL,1,0,0,0),(831,3,'hair cutting',NULL,NULL,1,0,0,0),(832,3,'hair lightening',NULL,NULL,1,0,0,0),(833,3,'hair or beauty salon manager',NULL,NULL,1,0,0,0),(834,3,'hairdresser',NULL,NULL,1,0,0,0),(835,3,'ham radio ',NULL,NULL,1,0,0,0),(836,3,'handball',NULL,NULL,1,0,0,0),(837,3,'handle a hammer, axe or handsaw',NULL,NULL,1,0,0,0),(838,3,'handle a job interview',NULL,NULL,1,0,0,0),(839,3,'handle complaints',NULL,NULL,1,0,0,0),(840,3,'handle money in a businesslike',NULL,NULL,1,0,0,0),(841,3,'handle the police',NULL,NULL,1,0,0,0),(842,1,'handling complaints',NULL,NULL,1,0,0,0),(843,1,'handling detail work',NULL,NULL,1,0,0,0),(844,3,'handling money',NULL,NULL,1,0,0,0),(845,2,'happinness',NULL,NULL,1,0,0,0),(846,3,'hardware',NULL,NULL,1,0,0,0),(847,3,'hardware technician',NULL,NULL,1,0,0,0),(848,3,'hardworking: done with energy, industrious.',NULL,NULL,1,0,0,0),(849,3,'have good attendance',NULL,NULL,1,0,0,0),(850,3,'health and welfare services managers nec',NULL,NULL,1,0,0,0),(851,3,'health diagnostic and promotion professionals nec',NULL,NULL,1,0,0,0),(852,3,'health information manager',NULL,NULL,1,0,0,0),(853,3,'health promotion officer',NULL,NULL,1,0,0,0),(854,2,'healthy',NULL,NULL,1,0,0,0),(855,3,'heating installation',NULL,NULL,1,0,0,0),(856,3,'heavy equipment operation',NULL,NULL,1,0,0,0),(857,3,'heavy labor',NULL,NULL,1,0,0,0),(858,3,'helicopter pilot',NULL,NULL,1,0,0,0),(859,3,'help and care for others',NULL,NULL,1,0,0,0),(860,3,'help desk',NULL,NULL,1,0,0,0),(861,3,'help others',NULL,NULL,1,0,0,0),(862,3,'help set goals for my team',NULL,NULL,1,0,0,0),(863,2,'helpful',NULL,NULL,1,0,0,0),(864,3,'herping',NULL,NULL,1,0,0,0),(865,3,'high energy',NULL,NULL,1,0,0,0),(866,3,'hiking',NULL,NULL,1,0,0,0),(867,3,'hiring',NULL,NULL,1,0,0,0),(868,3,'historian',NULL,NULL,1,0,0,0),(869,3,'hold a baby',NULL,NULL,1,0,0,0),(870,3,'home and personal care skills','Determine which clothes to take to the dry cleaners',NULL,1,0,0,0),(871,3,'home maintenance','Caulk',NULL,1,0,0,0),(872,3,'home repair (plumbing, electric, etc.) ',NULL,NULL,1,0,0,0),(873,3,'homebrewing',NULL,NULL,1,0,0,0),(874,3,'homoeopath',NULL,NULL,1,0,0,0),(875,2,'honest',NULL,NULL,1,0,0,0),(876,3,'honest: not lying, cheating or stealing, sincere.',NULL,NULL,1,0,0,0),(877,3,'hook up a basic home theater system',NULL,NULL,1,0,0,0),(878,3,'hooking and unhooking trailer from tractor',NULL,NULL,1,0,0,0),(879,3,'hooping',NULL,NULL,1,0,0,0),(880,3,'horse breeder',NULL,NULL,1,0,0,0),(881,3,'horse riding coach or instructor',NULL,NULL,1,0,0,0),(882,3,'horse trainer',NULL,NULL,1,0,0,0),(883,3,'hospital pharmacist',NULL,NULL,1,0,0,0),(884,3,'hostess / maitre de',NULL,NULL,1,0,0,0),(885,3,'hotel or motel manager',NULL,NULL,1,0,0,0),(886,3,'house framing',NULL,NULL,1,0,0,0),(887,3,'house painting',NULL,NULL,1,0,0,0),(888,3,'html',NULL,NULL,1,0,0,0),(889,3,'human resource adviser',NULL,NULL,1,0,0,0),(890,3,'human resource manager',NULL,NULL,1,0,0,0),(891,3,'human resources',NULL,NULL,1,0,0,0),(892,2,'humorous',NULL,NULL,1,0,0,0),(893,3,'hunting',NULL,NULL,1,0,0,0),(894,3,'hydrographer',NULL,NULL,1,0,0,0),(895,3,'ice hockey',NULL,NULL,1,0,0,0),(896,3,'ict business analyst',NULL,NULL,1,0,0,0),(897,3,'ict customer support officer',NULL,NULL,1,0,0,0),(898,3,'ict sales representative',NULL,NULL,1,0,0,0),(899,3,'ict security specialist',NULL,NULL,1,0,0,0),(900,3,'ict support technicians nec',NULL,NULL,1,0,0,0),(901,3,'ict systems test engineer',NULL,NULL,1,0,0,0),(902,2,'idealistic',NULL,NULL,1,0,0,0),(903,3,'identify and manage ethical issues',NULL,NULL,1,0,0,0),(904,3,'identify ethical issues',NULL,NULL,1,0,0,0),(905,3,'identify the need for data',NULL,NULL,1,0,0,0),(906,3,'identifying problems',NULL,NULL,1,0,0,0),(907,3,'illustrator',NULL,NULL,1,0,0,0),(908,2,'imaginative',NULL,NULL,1,0,0,0),(909,3,'imagining innovative solutions',NULL,NULL,1,0,0,0),(910,1,'imagining new solutions',NULL,NULL,1,0,0,0),(911,3,'implement basic computer security best practices',NULL,NULL,1,0,0,0),(912,3,'implementation',NULL,NULL,1,0,0,0),(913,3,'importance',NULL,NULL,1,0,0,0),(914,3,'importer or exporter',NULL,NULL,1,0,0,0),(915,3,'income tax',NULL,NULL,1,0,0,0),(916,2,'independent',NULL,NULL,1,0,0,0),(917,3,'independent: ability to work on your own without being constantly supervised.',NULL,NULL,1,0,0,0),(918,3,'individual counseling (list what types of problems)',NULL,NULL,1,0,0,0),(919,2,'individualistic',NULL,NULL,1,0,0,0),(920,3,'indoors[edit]',NULL,NULL,1,0,0,0),(921,3,'industrial designer',NULL,NULL,1,0,0,0),(922,3,'industrial engineer',NULL,NULL,1,0,0,0),(923,3,'industrial pharmacist',NULL,NULL,1,0,0,0),(924,2,'industrious',NULL,NULL,1,0,0,0),(925,3,'industrious: hardworking, diligent.',NULL,NULL,1,0,0,0),(926,2,'informal',NULL,NULL,1,0,0,0),(927,3,'information and organisation professionals nec',NULL,NULL,1,0,0,0),(928,3,'information management',NULL,NULL,1,0,0,0),(929,2,'ingenious',NULL,NULL,1,0,0,0),(930,3,'initiative',NULL,NULL,1,0,0,0),(931,3,'initiator ',NULL,NULL,1,0,0,0),(932,3,'inline skating',NULL,NULL,1,0,0,0),(933,3,'innovative',NULL,NULL,1,0,0,0),(934,3,'innovative: make changes, introduction of something new.',NULL,NULL,1,0,0,0),(935,3,'insect collecting',NULL,NULL,1,0,0,0),(936,3,'insightful',NULL,NULL,1,0,0,0),(937,3,'inspect and maintain equipment or vehicles',NULL,NULL,1,0,0,0),(938,3,'inspecting buildings',NULL,NULL,1,0,0,0),(939,3,'inspecting equipment',NULL,NULL,1,0,0,0),(940,1,'inspecting physical objects',NULL,NULL,1,0,0,0),(941,3,'inspection',NULL,NULL,1,0,0,0),(942,3,'inspire others to follow willingly',NULL,NULL,1,0,0,0),(943,3,'installation',NULL,NULL,1,0,0,0),(944,3,'instructing others',NULL,NULL,1,0,0,0),(945,3,'insulation installation',NULL,NULL,1,0,0,0),(946,3,'insurance agent',NULL,NULL,1,0,0,0),(947,3,'insurance broker',NULL,NULL,1,0,0,0),(948,3,'insurance investigator',NULL,NULL,1,0,0,0),(949,3,'insurance loss adjuster',NULL,NULL,1,0,0,0),(950,3,'insurance risk surveyor',NULL,NULL,1,0,0,0),(951,3,'integrity',NULL,NULL,1,0,0,0),(952,2,'intellectual',NULL,NULL,1,0,0,0),(953,3,'intellectual property lawyer',NULL,NULL,1,0,0,0),(954,3,'intelligence officer',NULL,NULL,1,0,0,0),(955,2,'intelligent',NULL,NULL,1,0,0,0),(956,3,'intensive care ambulance paramedic',NULL,NULL,1,0,0,0),(957,3,'intensive care specialist',NULL,NULL,1,0,0,0),(958,2,'intentive',NULL,NULL,1,0,0,0),(959,1,'interacting with people at different levels',NULL,NULL,1,0,0,0),(960,3,'interacting with various people ',NULL,NULL,1,0,0,0),(961,3,'inter-agency work',NULL,NULL,1,0,0,0),(962,3,'interior decorator',NULL,NULL,1,0,0,0),(963,3,'interior designer',NULL,NULL,1,0,0,0),(964,3,'internal auditor',NULL,NULL,1,0,0,0),(965,3,'internet',NULL,NULL,1,0,0,0),(966,3,'interpersonal communication skills ',NULL,NULL,1,0,0,0),(967,1,'interpersonal skills',NULL,'works well with others, self-confident, accepts responsibilitysensitive, supportive, motivates others, shares credit, counsels, cooperates, delegates effectively, represents others, understands feelings, ',1,0,0,0),(968,3,'interpersonal/negotiation skills and ',NULL,NULL,1,0,0,0),(969,3,'interpreter',NULL,NULL,1,0,0,0),(970,1,'interpreting languages',NULL,NULL,1,0,0,0),(971,3,'interview others',NULL,NULL,1,0,0,0),(972,3,'interview people',NULL,NULL,1,0,0,0),(973,3,'interviewing',NULL,NULL,1,0,0,0),(974,3,'interviewing ',NULL,NULL,1,0,0,0),(975,1,'interviewing prospective employees',NULL,NULL,1,0,0,0),(976,1,'inventing new ideas',NULL,NULL,1,0,0,0),(977,3,'inventing products/ideas',NULL,NULL,1,0,0,0),(978,3,'inventory',NULL,NULL,1,0,0,0),(979,1,'investigate',NULL,NULL,1,0,0,0),(980,3,'investigate and clarify results',NULL,NULL,1,0,0,0),(981,1,'investigating problems',NULL,NULL,1,0,0,0),(982,3,'investigating solutions',NULL,NULL,1,0,0,0),(983,3,'ios',NULL,NULL,1,0,0,0),(984,3,'iphone',NULL,NULL,1,0,0,0),(985,3,'iron a shirt',NULL,NULL,1,0,0,0),(986,3,'ironing',NULL,NULL,1,0,0,0),(987,3,'java',NULL,NULL,1,0,0,0),(988,3,'javascript',NULL,NULL,1,0,0,0),(989,3,'jeweller',NULL,NULL,1,0,0,0),(990,3,'jewellery designer',NULL,NULL,1,0,0,0),(991,3,'jewelry making',NULL,NULL,1,0,0,0),(992,3,'jockey',NULL,NULL,1,0,0,0),(993,3,'jogging',NULL,NULL,1,0,0,0),(994,3,'joiner',NULL,NULL,1,0,0,0),(995,3,'journalists and other writers nec',NULL,NULL,1,0,0,0),(996,3,'judge',NULL,NULL,1,0,0,0),(997,3,'judgment',NULL,NULL,1,0,0,0),(998,3,'judicial and other legal professionals nec',NULL,NULL,1,0,0,0),(999,3,'judo',NULL,NULL,1,0,0,0),(1000,3,'jugger',NULL,NULL,1,0,0,0),(1001,3,'juggling',NULL,NULL,1,0,0,0),(1002,3,'juggling ',NULL,NULL,1,0,0,0),(1003,3,'jukskei',NULL,NULL,1,0,0,0),(1004,3,'jump start a car',NULL,NULL,1,0,0,0),(1005,3,'kart racing',NULL,NULL,1,0,0,0),(1006,3,'kayaking',NULL,NULL,1,0,0,0),(1007,3,'keep a clean house',NULL,NULL,1,0,0,0),(1008,3,'keep businesslike records',NULL,NULL,1,0,0,0),(1009,1,'keep financial records',NULL,NULL,1,0,0,0),(1010,3,'keep records',NULL,NULL,1,0,0,0),(1011,3,'keeping on schedule',NULL,NULL,1,0,0,0),(1012,3,'keeping records',NULL,NULL,1,0,0,0),(1013,3,'kennel hand',NULL,NULL,1,0,0,0),(1014,3,'kind',NULL,NULL,1,0,0,0),(1015,3,'kitchen and cooking','Cook Dried Beans',NULL,1,0,0,0),(1016,3,'kitchen skills',NULL,NULL,1,0,0,0),(1017,3,'kiteboarding',NULL,NULL,1,0,0,0),(1018,3,'kiteflying',NULL,NULL,1,0,0,0),(1019,3,'knitting',NULL,NULL,1,0,0,0),(1020,3,'knots ',NULL,NULL,1,0,0,0),(1021,3,'know when to ask for help',NULL,NULL,1,0,0,0),(1022,3,'knowledge of community ',NULL,NULL,1,0,0,0),(1023,1,'knowledge of community/government affairs',NULL,NULL,1,0,0,0),(1024,1,'knowledge of concepts and principles',NULL,NULL,1,0,0,0),(1025,3,'knowledge of government affairs',NULL,NULL,1,0,0,0),(1026,3,'laboratory manager',NULL,NULL,1,0,0,0),(1027,3,'lacemaking',NULL,NULL,1,0,0,0),(1028,3,'lampwork glass beads ',NULL,NULL,1,0,0,0),(1029,3,'land economist',NULL,NULL,1,0,0,0),(1030,3,'landscape architect',NULL,NULL,1,0,0,0),(1031,3,'landscape gardener',NULL,NULL,1,0,0,0),(1032,3,'landscaping',NULL,NULL,1,0,0,0),(1033,3,'lapidary',NULL,NULL,1,0,0,0),(1034,3,'larping',NULL,NULL,1,0,0,0),(1035,3,'laundry skills',NULL,NULL,1,0,0,0),(1036,3,'lawn care',NULL,NULL,1,0,0,0),(1037,3,'lead by example',NULL,NULL,1,0,0,0),(1038,1,'leadership',NULL,NULL,1,0,0,0),(1039,3,'leadership skills',NULL,NULL,1,0,0,0),(1040,3,'leading teams',NULL,NULL,1,0,0,0),(1041,3,'leaf collecting and pressing',NULL,NULL,1,0,0,0),(1042,3,'learn new skills from others',NULL,NULL,1,0,0,0),(1043,3,'learn quickly',NULL,NULL,1,0,0,0),(1044,3,'learn spaninsh',NULL,NULL,1,0,0,0),(1045,3,'learn whom to ask for help',NULL,NULL,1,0,0,0),(1046,3,'learning other languages','Learn Spaninsh',NULL,1,0,0,0),(1047,3,'leather crafting',NULL,NULL,1,0,0,0),(1048,3,'leather goods maker',NULL,NULL,1,0,0,0),(1049,3,'legal executive',NULL,NULL,1,0,0,0),(1050,3,'lego building',NULL,NULL,1,0,0,0),(1051,2,'leisurely',NULL,NULL,1,0,0,0),(1052,3,'liaison officer',NULL,NULL,1,0,0,0),(1053,3,'librarian',NULL,NULL,1,0,0,0),(1054,3,'library technician',NULL,NULL,1,0,0,0),(1055,3,'licensed club manager',NULL,NULL,1,0,0,0),(1056,3,'life management and organization skills','Address An Envelope',NULL,1,0,0,0),(1057,3,'life science technician',NULL,NULL,1,0,0,0),(1058,3,'life scientist',NULL,NULL,1,0,0,0),(1059,3,'life scientists nec',NULL,NULL,1,0,0,0),(1060,3,'life skills examples',NULL,NULL,1,0,0,0),(1061,3,'lift mechanic',NULL,NULL,1,0,0,0),(1062,3,'light technician',NULL,NULL,1,0,0,0),(1063,2,'lighthearted',NULL,NULL,1,0,0,0),(1064,2,'likable',NULL,NULL,1,0,0,0),(1065,3,'lincoln douglas debate',NULL,NULL,1,0,0,0),(1066,3,'linux',NULL,NULL,1,0,0,0),(1067,3,'listen',NULL,NULL,1,0,0,0),(1068,3,'listen carefully to others',NULL,NULL,1,0,0,0),(1069,3,'listen well',NULL,NULL,1,0,0,0),(1070,3,'listening',NULL,NULL,1,0,0,0),(1071,3,'listening and speaking ',NULL,NULL,1,0,0,0),(1072,1,'listening to others',NULL,NULL,1,0,0,0),(1073,3,'listening to people',NULL,NULL,1,0,0,0),(1074,3,'livestock farmers nec',NULL,NULL,1,0,0,0),(1075,3,'loading and unloading',NULL,NULL,1,0,0,0),(1076,1,'locate answers or information',NULL,NULL,1,0,0,0),(1077,3,'locate answers, gather information',NULL,NULL,1,0,0,0),(1078,1,'locating missing information',NULL,NULL,1,0,0,0),(1079,3,'locksmith',NULL,NULL,1,0,0,0),(1080,3,'logical',NULL,NULL,1,0,0,0),(1081,3,'logical thinking',NULL,NULL,1,0,0,0),(1082,3,'look for better ways to do things',NULL,NULL,1,0,0,0),(1083,3,'look for ways to make the system work better',NULL,NULL,1,0,0,0),(1084,6,'lose weight',NULL,NULL,1,0,0,0),(1085,3,'lost wax casting ',NULL,NULL,1,0,0,0),(1086,2,'loyal',NULL,NULL,1,0,0,0),(1087,3,'mac',NULL,NULL,1,0,0,0),(1088,3,'machining',NULL,NULL,1,0,0,0),(1089,3,'macram ',NULL,NULL,1,0,0,0),(1090,3,'magic',NULL,NULL,1,0,0,0),(1091,3,'magistrate',NULL,NULL,1,0,0,0),(1092,3,'main cook',NULL,NULL,1,0,0,0),(1093,3,'maintain focus with interruptions',NULL,NULL,1,0,0,0),(1094,1,'maintaining a high level of activity',NULL,NULL,1,0,0,0),(1095,3,'maintaining a high level of production',NULL,NULL,1,0,0,0),(1096,1,'maintaining accurate records',NULL,NULL,1,0,0,0),(1097,1,'maintaining emotional control under stress',NULL,NULL,1,0,0,0),(1098,3,'maintaining files',NULL,NULL,1,0,0,0),(1099,3,'maintaining records',NULL,NULL,1,0,0,0),(1100,3,'maintaining schedules or times',NULL,NULL,1,0,0,0),(1101,3,'maintenance / janitorial skills',NULL,NULL,1,0,0,0),(1102,3,'maintenance / repair skills',NULL,NULL,1,0,0,0),(1103,3,'maintenance planner',NULL,NULL,1,0,0,0),(1104,3,'maintenance repairs',NULL,NULL,1,0,0,0),(1105,3,'make a budget, manage money',NULL,NULL,1,0,0,0),(1106,3,'make a good first impression',NULL,NULL,1,0,0,0),(1107,3,'make a short, informative public speech',NULL,NULL,1,0,0,0),(1108,3,'make a simple budget',NULL,NULL,1,0,0,0),(1109,3,'make adjustments when needed',NULL,NULL,1,0,0,0),(1110,3,'make and keep schedules',NULL,NULL,1,0,0,0),(1111,3,'make decisions',NULL,NULL,1,0,0,0),(1112,3,'make eggs more than three ways',NULL,NULL,1,0,0,0),(1113,3,'make up artist',NULL,NULL,1,0,0,0),(1114,3,'making a household budget',NULL,NULL,1,0,0,0),(1115,3,'making appointments',NULL,NULL,1,0,0,0),(1116,3,'making assignments',NULL,NULL,1,0,0,0),(1117,3,'making clothes',NULL,NULL,1,0,0,0),(1118,1,'making decisions',NULL,NULL,1,0,0,0),(1119,3,'making important decisions',NULL,NULL,1,0,0,0),(1120,3,'making models ',NULL,NULL,1,0,0,0),(1121,3,'manage conflicts, resolve issues',NULL,NULL,1,0,0,0),(1122,3,'manage finances',NULL,NULL,1,0,0,0),(1123,3,'manage money',NULL,NULL,1,0,0,0),(1124,3,'manage people',NULL,NULL,1,0,0,0),(1125,3,'manage time',NULL,NULL,1,0,0,0),(1126,3,'management',NULL,NULL,1,0,0,0),(1127,3,'management accountant',NULL,NULL,1,0,0,0),(1128,3,'management consultant',NULL,NULL,1,0,0,0),(1129,1,'managing an organization',NULL,NULL,1,0,0,0),(1130,3,'managing organizations',NULL,NULL,1,0,0,0),(1131,1,'managing people',NULL,NULL,1,0,0,0),(1132,3,'managing people ',NULL,NULL,1,0,0,0),(1133,3,'manicures/pedicures',NULL,NULL,1,0,0,0),(1134,3,'manufacturer',NULL,NULL,1,0,0,0),(1135,3,'marbles',NULL,NULL,1,0,0,0),(1136,3,'marine biologist',NULL,NULL,1,0,0,0),(1137,3,'market research analyst',NULL,NULL,1,0,0,0),(1138,3,'marketing specialist',NULL,NULL,1,0,0,0),(1139,3,'martial arts',NULL,NULL,1,0,0,0),(1140,3,'massage therapist',NULL,NULL,1,0,0,0),(1141,3,'master fisher',NULL,NULL,1,0,0,0),(1142,3,'materials engineer',NULL,NULL,1,0,0,0),(1143,1,'math',NULL,NULL,1,0,0,0),(1144,3,'mathematician',NULL,NULL,1,0,0,0),(1145,3,'matlab',NULL,NULL,1,0,0,0),(1146,2,'mature',NULL,NULL,1,0,0,0),(1147,3,'maya',NULL,NULL,1,0,0,0),(1148,3,'meal planning',NULL,NULL,1,0,0,0),(1149,1,'measuring boundaries',NULL,NULL,1,0,0,0),(1150,3,'meat inspector',NULL,NULL,1,0,0,0),(1151,3,'mechanical engineer',NULL,NULL,1,0,0,0),(1152,3,'mechanical engineering draftsperson',NULL,NULL,1,0,0,0),(1153,3,'mechanical engineering technician',NULL,NULL,1,0,0,0),(1154,3,'mechanical repairs',NULL,NULL,1,0,0,0),(1155,3,'mechanically inclined',NULL,NULL,1,0,0,0),(1156,3,'mechanics ',NULL,NULL,1,0,0,0),(1157,3,'media producer (excluding video)',NULL,NULL,1,0,0,0),(1158,1,'mediate problems',NULL,NULL,1,0,0,0),(1159,1,'mediating between people',NULL,NULL,1,0,0,0),(1160,3,'mediation',NULL,NULL,1,0,0,0),(1161,3,'medical administrator',NULL,NULL,1,0,0,0),(1162,3,'medical diagnostic radiographer',NULL,NULL,1,0,0,0),(1163,3,'medical laboratory scientist',NULL,NULL,1,0,0,0),(1164,3,'medical laboratory technician',NULL,NULL,1,0,0,0),(1165,3,'medical oncologist',NULL,NULL,1,0,0,0),(1166,3,'medical practitioners nec',NULL,NULL,1,0,0,0),(1167,3,'medical radiation therapist',NULL,NULL,1,0,0,0),(1168,3,'meet deadlines',NULL,NULL,1,0,0,0),(1169,3,'meeting deadlines',NULL,NULL,1,0,0,0),(1170,1,'meeting new people',NULL,NULL,1,0,0,0),(1171,3,'meeting new people ',NULL,NULL,1,0,0,0),(1172,1,'meeting people',NULL,NULL,1,0,0,0),(1173,3,'metal casting trades worker',NULL,NULL,1,0,0,0),(1174,3,'metal detecting',NULL,NULL,1,0,0,0),(1175,3,'metal fabricator',NULL,NULL,1,0,0,0),(1176,3,'metal fitter and machinists nec',NULL,NULL,1,0,0,0),(1177,3,'metal machinist (first class)',NULL,NULL,1,0,0,0),(1178,3,'metal polisher',NULL,NULL,1,0,0,0),(1179,3,'metallurgical or materials technician',NULL,NULL,1,0,0,0),(1180,3,'metallurgist',NULL,NULL,1,0,0,0),(1181,3,'meteorologist',NULL,NULL,1,0,0,0),(1182,3,'meteorology',NULL,NULL,1,0,0,0),(1183,2,'methodical',NULL,NULL,1,0,0,0),(1184,2,'meticulous',NULL,NULL,1,0,0,0),(1185,3,'microbiologist',NULL,NULL,1,0,0,0),(1186,3,'microscopy',NULL,NULL,1,0,0,0),(1187,3,'microsoft excel',NULL,NULL,1,0,0,0),(1188,3,'microsoft office',NULL,NULL,1,0,0,0),(1189,3,'microsoft outlook',NULL,NULL,1,0,0,0),(1190,3,'microsoft publisher',NULL,NULL,1,0,0,0),(1191,3,'microsoft visual',NULL,NULL,1,0,0,0),(1192,3,'microsoft word',NULL,NULL,1,0,0,0),(1193,3,'midwife',NULL,NULL,1,0,0,0),(1194,3,'migration agent',NULL,NULL,1,0,0,0),(1195,2,'mild',NULL,NULL,1,0,0,0),(1196,3,'mine deputy',NULL,NULL,1,0,0,0),(1197,3,'mineral collecting',NULL,NULL,1,0,0,0),(1198,3,'miniatures ',NULL,NULL,1,0,0,0),(1199,3,'mining engineer (excluding petroleum)',NULL,NULL,1,0,0,0),(1200,3,'minister of religion',NULL,NULL,1,0,0,0),(1201,3,'minor auto repairs',NULL,NULL,1,0,0,0),(1202,3,'mixed crop and livestock farmer',NULL,NULL,1,0,0,0),(1203,3,'mixed crop farmer',NULL,NULL,1,0,0,0),(1204,3,'mixed livestock farmer',NULL,NULL,1,0,0,0),(1205,3,'mobile',NULL,NULL,1,0,0,0),(1206,3,'model aircraft making and flying',NULL,NULL,1,0,0,0),(1207,3,'model building',NULL,NULL,1,0,0,0),(1208,3,'modelling',NULL,NULL,1,0,0,0),(1209,2,'moderate',NULL,NULL,1,0,0,0),(1210,2,'modest',NULL,NULL,1,0,0,0),(1211,3,'monetary exchange',NULL,NULL,1,0,0,0),(1212,3,'money handling',NULL,NULL,1,0,0,0),(1213,3,'money management','Balance A Checkbook',NULL,1,0,0,0),(1214,3,'mopping the floor',NULL,NULL,1,0,0,0),(1215,3,'mosaics ',NULL,NULL,1,0,0,0),(1216,3,'motivate others',NULL,NULL,1,0,0,0),(1217,3,'motivate people',NULL,NULL,1,0,0,0),(1218,3,'motivated: the inner reason for any act; as, hunger might be the motive for working.',NULL,NULL,1,0,0,0),(1219,1,'motivating others',NULL,NULL,1,0,0,0),(1220,3,'motor mechanic (general)',NULL,NULL,1,0,0,0),(1221,3,'motor sports',NULL,NULL,1,0,0,0),(1222,3,'motorcycle mechanic',NULL,NULL,1,0,0,0),(1223,3,'mountain biking',NULL,NULL,1,0,0,0),(1224,3,'movie collecting',NULL,NULL,1,0,0,0),(1225,3,'mowing the lawn',NULL,NULL,1,0,0,0),(1226,3,'multimedia designer',NULL,NULL,1,0,0,0),(1227,3,'multi-task',NULL,NULL,1,0,0,0),(1228,3,'multi-tasking',NULL,NULL,1,0,0,0),(1229,3,'mushroom hunting or mycology',NULL,NULL,1,0,0,0),(1230,2,'music appreciation',NULL,NULL,1,0,0,0),(1231,3,'music director',NULL,NULL,1,0,0,0),(1232,3,'music professionals nec',NULL,NULL,1,0,0,0),(1233,3,'music skills related to your teaching',NULL,NULL,1,0,0,0),(1234,3,'music teacher (private tuition)',NULL,NULL,1,0,0,0),(1235,3,'musical instrument maker or repairer',NULL,NULL,1,0,0,0),(1236,3,'musician instrumental',NULL,NULL,1,0,0,0),(1237,3,'mysql',NULL,NULL,1,0,0,0),(1238,2,'natural',NULL,NULL,1,0,0,0),(1239,3,'natural and physical science professionals nec',NULL,NULL,1,0,0,0),(1240,3,'naturopath',NULL,NULL,1,0,0,0),(1241,3,'naval architect',NULL,NULL,1,0,0,0),(1242,3,'navigate with a map and compass',NULL,NULL,1,0,0,0),(1243,3,'navigating politics ',NULL,NULL,1,0,0,0),(1244,3,'needlepoint/petit point ',NULL,NULL,1,0,0,0),(1245,3,'negotiate',NULL,NULL,1,0,0,0),(1246,3,'negotiate agreements',NULL,NULL,1,0,0,0),(1247,3,'negotiating',NULL,NULL,1,0,0,0),(1248,3,'negotiating skills',NULL,NULL,1,0,0,0),(1249,1,'negotiating/arbitrating conflicts',NULL,NULL,1,0,0,0),(1250,3,'net ball',NULL,NULL,1,0,0,0),(1251,3,'network administrator',NULL,NULL,1,0,0,0),(1252,3,'network analyst',NULL,NULL,1,0,0,0),(1253,3,'networking',NULL,NULL,1,0,0,0),(1254,3,'networks',NULL,NULL,1,0,0,0),(1255,3,'neurologist',NULL,NULL,1,0,0,0),(1256,3,'neurosurgeon',NULL,NULL,1,0,0,0),(1257,3,'newspaper or periodical editor',NULL,NULL,1,0,0,0),(1258,3,'nice',NULL,NULL,1,0,0,0),(1259,3,'nordic skating',NULL,NULL,1,0,0,0),(1260,3,'nuclear medicine technologist',NULL,NULL,1,0,0,0),(1261,3,'nurse educator',NULL,NULL,1,0,0,0),(1262,3,'nurse manager',NULL,NULL,1,0,0,0),(1263,3,'nurse practitioner',NULL,NULL,1,0,0,0),(1264,3,'nurse researcher',NULL,NULL,1,0,0,0),(1265,3,'nurseryperson',NULL,NULL,1,0,0,0),(1266,3,'nursing clinical director',NULL,NULL,1,0,0,0),(1267,3,'nutritionist',NULL,NULL,1,0,0,0),(1268,2,'obliging',NULL,NULL,1,0,0,0),(1269,3,'observing',NULL,NULL,1,0,0,0),(1270,3,'obstetrician and gynaecologist',NULL,NULL,1,0,0,0),(1271,3,'obtain information',NULL,NULL,1,0,0,0),(1272,3,'occupational health and safety adviser',NULL,NULL,1,0,0,0),(1273,3,'occupational therapist',NULL,NULL,1,0,0,0),(1274,1,'off-bearing or feeding machinery',NULL,NULL,1,0,0,0),(1275,3,'office manager',NULL,NULL,1,0,0,0),(1276,3,'open minded',NULL,NULL,1,0,0,0),(1277,3,'open source software',NULL,NULL,1,0,0,0),(1278,1,'operate a computer',NULL,NULL,1,0,0,0),(1279,1,'operate tools and machinery',NULL,NULL,1,0,0,0),(1280,3,'operate tools or machinery',NULL,NULL,1,0,0,0),(1281,3,'operating a dishwasher',NULL,NULL,1,0,0,0),(1282,1,'operating equipment',NULL,NULL,1,0,0,0),(1283,3,'operating machinery (examples: grinder, lathe, drill press, milling machine, etc. list all you know how to use)',NULL,NULL,1,0,0,0),(1284,3,'ophthalmologist',NULL,NULL,1,0,0,0),(1285,2,'opportunistic',NULL,NULL,1,0,0,0),(1286,3,'optical dispenser',NULL,NULL,1,0,0,0),(1287,3,'optical mechanic',NULL,NULL,1,0,0,0),(1288,2,'optimistic',NULL,NULL,1,0,0,0),(1289,3,'optimistic: view that good prevails over evil.',NULL,NULL,1,0,0,0),(1290,3,'optometrist',NULL,NULL,1,0,0,0),(1291,3,'or school policies',NULL,NULL,1,0,0,0),(1292,3,'oracle',NULL,NULL,1,0,0,0),(1293,3,'oral presentations',NULL,NULL,1,0,0,0),(1294,3,'order processing',NULL,NULL,1,0,0,0),(1295,3,'ordering supplies',NULL,NULL,1,0,0,0),(1296,3,'organisation and methods analyst',NULL,NULL,1,0,0,0),(1297,3,'organisational psychologist',NULL,NULL,1,0,0,0),(1298,3,'organization',NULL,NULL,1,0,0,0),(1299,3,'organizational effectiveness and leadership',NULL,NULL,1,0,0,0),(1300,2,'organizational skills',NULL,'organizing tasks, organizing files, handles details, coordinates tasks, punctual, manages projects effectively, meets deadlines, sets goals, keeps control over budget, plans and arranges activities, multi-tasks',1,0,0,0),(1301,3,'organize a task well',NULL,NULL,1,0,0,0),(1302,3,'organize and chair a meeting',NULL,NULL,1,0,0,0),(1303,3,'organize and manage projects',NULL,NULL,1,0,0,0),(1304,3,'organized',NULL,NULL,1,0,0,0),(1305,3,'organized: place things in working order.',NULL,NULL,1,0,0,0),(1306,3,'organizing a closet, cupboard, shed, attic or garage',NULL,NULL,1,0,0,0),(1307,3,'organizing files',NULL,NULL,1,0,0,0),(1308,3,'organizing projects relating to parents and people in the community',NULL,NULL,1,0,0,0),(1309,3,'organizing tasks',NULL,NULL,1,0,0,0),(1310,3,'orienteering ',NULL,NULL,1,0,0,0),(1311,3,'origami',NULL,NULL,1,0,0,0),(1312,2,'original',NULL,NULL,1,0,0,0),(1313,3,'ornamental woodwork',NULL,NULL,1,0,0,0),(1314,3,'orthopaedic surgeon',NULL,NULL,1,0,0,0),(1315,3,'orthoptist',NULL,NULL,1,0,0,0),(1316,3,'orthotist or prosthetist',NULL,NULL,1,0,0,0),(1317,3,'osteopath',NULL,NULL,1,0,0,0),(1318,3,'other kinds of auto repairs',NULL,NULL,1,0,0,0),(1319,3,'other spatial scientist',NULL,NULL,1,0,0,0),(1320,3,'other sports coach or instructor',NULL,NULL,1,0,0,0),(1321,3,'other sports official',NULL,NULL,1,0,0,0),(1322,3,'other supervisory experience (in a job, in a club or organization you belong to, etc.)',NULL,NULL,1,0,0,0),(1323,3,'otorhinolaryngologist',NULL,NULL,1,0,0,0),(1324,3,'outdoors[edit]',NULL,NULL,1,0,0,0),(1325,3,'outgoing',NULL,NULL,1,0,0,0),(1326,1,'overseeing operations',NULL,NULL,1,0,0,0),(1327,3,'over-the-road driving (long distance)',NULL,NULL,1,0,0,0),(1328,3,'packing',NULL,NULL,1,0,0,0),(1329,3,'paediatric surgeon',NULL,NULL,1,0,0,0),(1330,3,'paediatrician',NULL,NULL,1,0,0,0),(1331,2,'painstaking',NULL,NULL,1,0,0,0),(1332,3,'paint',NULL,NULL,1,0,0,0),(1333,3,'paint a room',NULL,NULL,1,0,0,0),(1334,3,'paint ball',NULL,NULL,1,0,0,0),(1335,3,'paintball',NULL,NULL,1,0,0,0),(1336,3,'painter (visual arts)',NULL,NULL,1,0,0,0),(1337,3,'painting',NULL,NULL,1,0,0,0),(1338,3,'painting a room',NULL,NULL,1,0,0,0),(1339,3,'painting trades worker',NULL,NULL,1,0,0,0),(1340,3,'panelbeater',NULL,NULL,1,0,0,0),(1341,3,'paneling',NULL,NULL,1,0,0,0),(1342,3,'papermaking ',NULL,NULL,1,0,0,0),(1343,3,'parallel park',NULL,NULL,1,0,0,0),(1344,3,'park ranger',NULL,NULL,1,0,0,0),(1345,3,'parkour',NULL,NULL,1,0,0,0),(1346,3,'parole or probation officer',NULL,NULL,1,0,0,0),(1347,3,'parts clerk',NULL,NULL,1,0,0,0),(1348,3,'pastrycook',NULL,NULL,1,0,0,0),(1349,3,'patents examiner',NULL,NULL,1,0,0,0),(1350,3,'pathologist',NULL,NULL,1,0,0,0),(1351,2,'patience',NULL,NULL,1,0,0,0),(1352,3,'patient',NULL,NULL,1,0,0,0),(1353,3,'patient: calm.',NULL,NULL,1,0,0,0),(1354,3,'pay attention to details',NULL,NULL,1,0,0,0),(1355,3,'payroll',NULL,NULL,1,0,0,0),(1356,2,'peaceable',NULL,NULL,1,0,0,0),(1357,3,'people management skills',NULL,NULL,1,0,0,0),(1358,3,'people watching',NULL,NULL,1,0,0,0),(1359,3,'people-oriented: enjoy working/being with people.',NULL,NULL,1,0,0,0),(1360,3,'perform and act',NULL,NULL,1,0,0,0),(1361,3,'perform basic first aid',NULL,NULL,1,0,0,0),(1362,3,'perform cpr and the heimlich maneuver',NULL,NULL,1,0,0,0),(1363,3,'perform, act',NULL,NULL,1,0,0,0),(1364,3,'performing clerical work ',NULL,NULL,1,0,0,0),(1365,1,'performing numeric analysis',NULL,NULL,1,0,0,0),(1366,3,'performing numerical analysis',NULL,NULL,1,0,0,0),(1367,3,'perl',NULL,NULL,1,0,0,0),(1368,3,'perseverance',NULL,NULL,1,0,0,0),(1369,2,'persevering',NULL,NULL,1,0,0,0),(1370,3,'persevering: steadfast pursuit to an aim, refusal to give up; continued effort.',NULL,NULL,1,0,0,0),(1371,3,'personal and career development skills ',NULL,NULL,1,0,0,0),(1372,1,'persuading others',NULL,NULL,1,0,0,0),(1373,3,'persuasion',NULL,NULL,1,0,0,0),(1374,2,'persuasive',NULL,NULL,1,0,0,0),(1375,3,'petroleum engineer',NULL,NULL,1,0,0,0),(1376,3,'photographer',NULL,NULL,1,0,0,0),(1377,3,'photography',NULL,NULL,1,0,0,0),(1378,3,'php',NULL,NULL,1,0,0,0),(1379,3,'physicist',NULL,NULL,1,0,0,0),(1380,3,'physiotherapist',NULL,NULL,1,0,0,0),(1381,3,'pick a ripe fruit',NULL,NULL,1,0,0,0),(1382,1,'picking out important information',NULL,NULL,1,0,0,0),(1383,3,'picture framer',NULL,NULL,1,0,0,0),(1384,3,'pig farmer',NULL,NULL,1,0,0,0),(1385,3,'pigeon racing',NULL,NULL,1,0,0,0),(1386,3,'ping pong',NULL,NULL,1,0,0,0),(1387,1,'plan',NULL,NULL,1,0,0,0),(1388,3,'plan activities and put them into action',NULL,NULL,1,0,0,0),(1389,3,'plan ahead',NULL,NULL,1,0,0,0),(1390,3,'plan daily work or special events',NULL,NULL,1,0,0,0),(1391,3,'planning',NULL,NULL,1,0,0,0),(1392,1,'planning agendas/meetings',NULL,NULL,1,0,0,0),(1393,3,'planning meetings ',NULL,NULL,1,0,0,0),(1394,1,'planning organizational needs',NULL,NULL,1,0,0,0),(1395,3,'plastic and reconstructive surgeon',NULL,NULL,1,0,0,0),(1396,3,'plastics technician',NULL,NULL,1,0,0,0),(1397,2,'play instruments',NULL,NULL,1,0,0,0),(1398,3,'playing musical instruments',NULL,NULL,1,0,0,0),(1399,2,'pleasant',NULL,NULL,1,0,0,0),(1400,3,'plumber (general)',NULL,NULL,1,0,0,0),(1401,3,'plumbing',NULL,NULL,1,0,0,0),(1402,3,'plumbing inspector',NULL,NULL,1,0,0,0),(1403,3,'plumbing repairs',NULL,NULL,1,0,0,0),(1404,3,'podiatrist',NULL,NULL,1,0,0,0),(1405,2,'poised',NULL,NULL,1,0,0,0),(1406,3,'poker',NULL,NULL,1,0,0,0),(1407,3,'pole dancing',NULL,NULL,1,0,0,0),(1408,3,'police officer',NULL,NULL,1,0,0,0),(1409,3,'policy analyst',NULL,NULL,1,0,0,0),(1410,3,'policy and planning manager',NULL,NULL,1,0,0,0),(1411,3,'polishing furniture',NULL,NULL,1,0,0,0),(1412,2,'polite',NULL,NULL,1,0,0,0),(1413,3,'positivity',NULL,NULL,1,0,0,0),(1414,3,'post office manager',NULL,NULL,1,0,0,0),(1415,3,'potter or ceramic artist',NULL,NULL,1,0,0,0),(1416,3,'pottery',NULL,NULL,1,0,0,0),(1417,3,'poultry farmer',NULL,NULL,1,0,0,0),(1418,3,'power generation plant operator',NULL,NULL,1,0,0,0),(1419,2,'practical',NULL,NULL,1,0,0,0),(1420,3,'practical: inclined or suited to useful action, rather that speculation.',NULL,NULL,1,0,0,0),(1421,2,'precise',NULL,NULL,1,0,0,0),(1422,3,'precision instrument maker and repairer',NULL,NULL,1,0,0,0),(1423,3,'predicting future trends',NULL,NULL,1,0,0,0),(1424,1,'predicting futures',NULL,NULL,1,0,0,0),(1425,1,'prefer details',NULL,NULL,1,0,0,0),(1426,3,'prepare budgets',NULL,NULL,1,0,0,0),(1427,1,'preparing written communications',NULL,NULL,1,0,0,0),(1428,3,'present artistic ideas',NULL,NULL,1,0,0,0),(1429,3,'present material',NULL,NULL,1,0,0,0),(1430,3,'present material orally',NULL,NULL,1,0,0,0),(1431,3,'present written material',NULL,NULL,1,0,0,0),(1432,3,'presentations',NULL,NULL,1,0,0,0),(1433,3,'pressure welder',NULL,NULL,1,0,0,0),(1434,2,'pressure-resistant',NULL,NULL,1,0,0,0),(1435,3,'primary health organisation manager',NULL,NULL,1,0,0,0),(1436,3,'primary products inspectors nec',NULL,NULL,1,0,0,0),(1437,3,'primary school teacher',NULL,NULL,1,0,0,0),(1438,3,'print finisher',NULL,NULL,1,0,0,0),(1439,3,'print journalist',NULL,NULL,1,0,0,0),(1440,3,'printing machinist',NULL,NULL,1,0,0,0),(1441,3,'prioritization skills',NULL,NULL,1,0,0,0),(1442,1,'prioritizing work',NULL,NULL,1,0,0,0),(1443,3,'prison officer',NULL,NULL,1,0,0,0),(1444,3,'private tutors and teachers nec',NULL,NULL,1,0,0,0),(1445,3,'problem analysis skills',NULL,NULL,1,0,0,0),(1446,3,'problem solving',NULL,NULL,1,0,0,0),(1447,3,'problem solving skills',NULL,NULL,1,0,0,0),(1448,3,'processing',NULL,NULL,1,0,0,0),(1449,3,'procurement manager',NULL,NULL,1,0,0,0),(1450,3,'product promotion',NULL,NULL,1,0,0,0),(1451,3,'production manager (forestry)',NULL,NULL,1,0,0,0),(1452,3,'production manager (manufacturing)',NULL,NULL,1,0,0,0),(1453,3,'production manager (mining)',NULL,NULL,1,0,0,0),(1454,3,'production or plant engineer',NULL,NULL,1,0,0,0),(1455,2,'productive',NULL,NULL,1,0,0,0),(1456,3,'productive: tending to produce.',NULL,NULL,1,0,0,0),(1457,3,'professional skills','Draft A Cover Letter',NULL,1,0,0,0),(1458,3,'proficient at excel',NULL,NULL,1,0,0,0),(1459,3,'program director (television or radio)',NULL,NULL,1,0,0,0),(1460,3,'program or project administrator',NULL,NULL,1,0,0,0),(1461,3,'programming',NULL,NULL,1,0,0,0),(1462,3,'programming ',NULL,NULL,1,0,0,0),(1463,2,'progressive',NULL,NULL,1,0,0,0),(1464,3,'project builder',NULL,NULL,1,0,0,0),(1465,1,'promoting events',NULL,NULL,1,0,0,0),(1466,3,'proofreading',NULL,NULL,1,0,0,0),(1467,3,'property manager',NULL,NULL,1,0,0,0),(1468,1,'proposing ideas',NULL,NULL,1,0,0,0),(1469,3,'protect personal identity information',NULL,NULL,1,0,0,0),(1470,3,'providing customer service',NULL,NULL,1,0,0,0),(1471,1,'providing customers with service',NULL,NULL,1,0,0,0),(1472,3,'providing discipline ',NULL,NULL,1,0,0,0),(1473,1,'providing discipline when necessary',NULL,NULL,1,0,0,0),(1474,2,'prudent',NULL,NULL,1,0,0,0),(1475,3,'pruning trees',NULL,NULL,1,0,0,0),(1476,3,'psychiatrist',NULL,NULL,1,0,0,0),(1477,3,'psychologists nec',NULL,NULL,1,0,0,0),(1478,3,'psychotherapist',NULL,NULL,1,0,0,0),(1479,3,'pt modeler',NULL,NULL,1,0,0,0),(1480,3,'public relations',NULL,NULL,1,0,0,0),(1481,3,'public relations manager',NULL,NULL,1,0,0,0),(1482,3,'public relations professional',NULL,NULL,1,0,0,0),(1483,1,'public speaking',NULL,NULL,1,0,0,0),(1484,3,'pumping gas',NULL,NULL,1,0,0,0),(1485,2,'punctual',NULL,NULL,1,0,0,0),(1486,2,'purposeful',NULL,NULL,1,0,0,0),(1487,3,'puzzles',NULL,NULL,1,0,0,0),(1488,3,'pysanky ',NULL,NULL,1,0,0,0),(1489,3,'python',NULL,NULL,1,0,0,0),(1490,3,'quality assurance manager',NULL,NULL,1,0,0,0),(1491,3,'quality control',NULL,NULL,1,0,0,0),(1492,3,'quantity surveyor',NULL,NULL,1,0,0,0),(1493,3,'quarantine officer',NULL,NULL,1,0,0,0),(1494,1,'questioning others',NULL,NULL,1,0,0,0),(1495,2,'quick',NULL,NULL,1,0,0,0),(1496,3,'quick books pro',NULL,NULL,1,0,0,0),(1497,3,'quick learning skills',NULL,NULL,1,0,0,0),(1498,2,'quiet',NULL,NULL,1,0,0,0),(1499,3,'quilting',NULL,NULL,1,0,0,0),(1500,3,'racquetball',NULL,NULL,1,0,0,0),(1501,3,'radiation oncologist',NULL,NULL,1,0,0,0),(1502,3,'radio journalist',NULL,NULL,1,0,0,0),(1503,3,'radio presenter',NULL,NULL,1,0,0,0),(1504,3,'radiocommunications technician',NULL,NULL,1,0,0,0),(1505,3,'radio-controlled car racing (hobby grade)',NULL,NULL,1,0,0,0),(1506,3,'railway station manager',NULL,NULL,1,0,0,0),(1507,1,'raising funds',NULL,NULL,1,0,0,0),(1508,3,'raking leaves',NULL,NULL,1,0,0,0),(1509,3,'rank activities in order of',NULL,NULL,1,0,0,0),(1510,2,'rational',NULL,NULL,1,0,0,0),(1511,3,'rc cars',NULL,NULL,1,0,0,0),(1512,3,'reading',NULL,NULL,1,0,0,0),(1513,3,'reading ',NULL,NULL,1,0,0,0),(1514,1,'reading volumes of material',NULL,NULL,1,0,0,0),(1515,3,'real estate agency principal',NULL,NULL,1,0,0,0),(1516,3,'real estate agent',NULL,NULL,1,0,0,0),(1517,3,'real estate representative',NULL,NULL,1,0,0,0),(1518,2,'realistic',NULL,NULL,1,0,0,0),(1519,3,'realistic: practical views/policy, truth/detail, presenting people/scenes as they are.',NULL,NULL,1,0,0,0),(1520,2,'reasonable',NULL,NULL,1,0,0,0),(1521,3,'receptionist',NULL,NULL,1,0,0,0),(1522,3,'recite basic geography',NULL,NULL,1,0,0,0),(1523,3,'recognize personal alcohol limits',NULL,NULL,1,0,0,0),(1524,3,'recognize what works and what',NULL,NULL,1,0,0,0),(1525,3,'recognizing problems',NULL,NULL,1,0,0,0),(1526,1,'recommending courses of action',NULL,NULL,1,0,0,0),(1527,3,'record collecting',NULL,NULL,1,0,0,0),(1528,3,'record facts, classify information by date',NULL,NULL,1,0,0,0),(1529,3,'record keeping',NULL,NULL,1,0,0,0),(1530,3,'records manager',NULL,NULL,1,0,0,0),(1531,3,'recreation officer (aus)',NULL,NULL,1,0,0,0),(1532,3,'recruiting',NULL,NULL,1,0,0,0),(1533,3,'recruitment consultant',NULL,NULL,1,0,0,0),(1534,2,'reflective',NULL,NULL,1,0,0,0),(1535,3,'refrigeration work',NULL,NULL,1,0,0,0),(1536,3,'regional education manager',NULL,NULL,1,0,0,0),(1537,3,'registered nurse (aged care)',NULL,NULL,1,0,0,0),(1538,3,'registered nurse (child and family health)',NULL,NULL,1,0,0,0),(1539,3,'registered nurse (community health)',NULL,NULL,1,0,0,0),(1540,3,'registered nurse (critical care and emergency)',NULL,NULL,1,0,0,0),(1541,3,'registered nurse (developmental disability)',NULL,NULL,1,0,0,0),(1542,3,'registered nurse (disability and rehabilitation)',NULL,NULL,1,0,0,0),(1543,3,'registered nurse (medical practice)',NULL,NULL,1,0,0,0),(1544,3,'registered nurse (medical)',NULL,NULL,1,0,0,0),(1545,3,'registered nurse (mental health)',NULL,NULL,1,0,0,0),(1546,3,'registered nurse (paediatric)',NULL,NULL,1,0,0,0),(1547,3,'registered nurse (perioperative)',NULL,NULL,1,0,0,0),(1548,3,'registered nurse (surgical)',NULL,NULL,1,0,0,0),(1549,3,'registered nurses nec',NULL,NULL,1,0,0,0),(1550,1,'rehabilitating people',NULL,NULL,1,0,0,0),(1551,3,'rehabilitation counsellor',NULL,NULL,1,0,0,0),(1552,3,'relating to customers',NULL,NULL,1,0,0,0),(1553,3,'relating to other people',NULL,NULL,1,0,0,0),(1554,3,'relating to others',NULL,NULL,1,0,0,0),(1555,3,'relating to people',NULL,NULL,1,0,0,0),(1556,1,'relating to the public',NULL,NULL,1,0,0,0),(1557,2,'relaxation',NULL,NULL,1,0,0,0),(1558,2,'relaxed',NULL,NULL,1,0,0,0),(1559,3,'reliability',NULL,NULL,1,0,0,0),(1560,2,'reliable',NULL,NULL,1,0,0,0),(1561,3,'reliable: dependable.',NULL,NULL,1,0,0,0),(1562,3,'relocate living spaces',NULL,NULL,1,0,0,0),(1563,3,'remember information',NULL,NULL,1,0,0,0),(1564,3,'remember names',NULL,NULL,1,0,0,0),(1565,1,'remembering information',NULL,NULL,1,0,0,0),(1566,3,'remove a stain',NULL,NULL,1,0,0,0),(1567,3,'renal medicine specialist',NULL,NULL,1,0,0,0),(1568,3,'repair',NULL,NULL,1,0,0,0),(1569,3,'repair equipment or machinery',NULL,NULL,1,0,0,0),(1570,1,'repair things',NULL,NULL,1,0,0,0),(1571,3,'repairing and maintaining diesel engine vehicles',NULL,NULL,1,0,0,0),(1572,3,'repairing equipment ',NULL,NULL,1,0,0,0),(1573,3,'repelling ',NULL,NULL,1,0,0,0),(1574,3,'reporting data',NULL,NULL,1,0,0,0),(1575,1,'reporting information',NULL,NULL,1,0,0,0),(1576,1,'research',NULL,'creates ideas, identifies problems, solves problem, gathers information, evaluate information, citing sources, meets goals, identifies resourcess, defines needs, analyzes issues, develops strategies, assesses situations',1,0,0,0),(1577,3,'research and development manager',NULL,NULL,1,0,0,0),(1578,3,'research and write reports',NULL,NULL,1,0,0,0),(1579,3,'researcher',NULL,NULL,1,0,0,0),(1580,3,'researching ',NULL,NULL,1,0,0,0),(1581,2,'reserved',NULL,NULL,1,0,0,0),(1582,3,'resident medical officer',NULL,NULL,1,0,0,0),(1583,3,'residential care officer',NULL,NULL,1,0,0,0),(1584,1,'resolving conflicts',NULL,NULL,1,0,0,0),(1585,3,'resolving conflicts ',NULL,NULL,1,0,0,0),(1586,2,'resourceful',NULL,NULL,1,0,0,0),(1587,3,'resourceful: ability to supply what is needed, quick wit.',NULL,NULL,1,0,0,0),(1588,3,'resourcefulness',NULL,NULL,1,0,0,0),(1589,3,'responsibility',NULL,NULL,1,0,0,0),(1590,2,'responsible',NULL,NULL,1,0,0,0),(1591,3,'responsible: capable of rational conduct, trustworthy.',NULL,NULL,1,0,0,0),(1592,3,'restaurant skills',NULL,NULL,1,0,0,0),(1593,3,'results orientated ',NULL,NULL,1,0,0,0),(1594,3,'results oriented',NULL,NULL,1,0,0,0),(1595,3,'retail buyer',NULL,NULL,1,0,0,0),(1596,3,'retail pharmacist',NULL,NULL,1,0,0,0),(1597,3,'retirement village manager',NULL,NULL,1,0,0,0),(1598,2,'retiring',NULL,NULL,1,0,0,0),(1599,3,'rheumatologist',NULL,NULL,1,0,0,0),(1600,3,'risk taking',NULL,NULL,1,0,0,0),(1601,2,'robust',NULL,NULL,1,0,0,0),(1602,3,'rock climbing',NULL,NULL,1,0,0,0),(1603,3,'rock stacking',NULL,NULL,1,0,0,0),(1604,3,'role playing games ',NULL,NULL,1,0,0,0),(1605,3,'roller derby',NULL,NULL,1,0,0,0),(1606,3,'roller skating',NULL,NULL,1,0,0,0),(1607,3,'roof plumber',NULL,NULL,1,0,0,0),(1608,3,'roof tiler',NULL,NULL,1,0,0,0),(1609,3,'roofing',NULL,NULL,1,0,0,0),(1610,3,'ruby',NULL,NULL,1,0,0,0),(1611,3,'rugby',NULL,NULL,1,0,0,0),(1612,3,'rugby league football',NULL,NULL,1,0,0,0),(1613,1,'run meetings',NULL,NULL,1,0,0,0),(1614,3,'running',NULL,NULL,1,0,0,0),(1615,1,'running meetings',NULL,NULL,1,0,0,0),(1616,3,'running office machines (examples: fax machine, computers, photocopy, printing, etc.)',NULL,NULL,1,0,0,0),(1617,3,'russian ',NULL,NULL,1,0,0,0),(1618,3,'safety',NULL,NULL,1,0,0,0),(1619,1,'safety conscious',NULL,NULL,1,0,0,0),(1620,3,'safety inspector',NULL,NULL,1,0,0,0),(1621,3,'sail maker',NULL,NULL,1,0,0,0),(1622,3,'sailing',NULL,NULL,1,0,0,0),(1623,3,'sales',NULL,NULL,1,0,0,0),(1624,3,'sales ability',NULL,NULL,1,0,0,0),(1625,3,'sales and marketing manager',NULL,NULL,1,0,0,0),(1626,3,'sales clerk skills',NULL,NULL,1,0,0,0),(1627,3,'sales representative (industrial products)',NULL,NULL,1,0,0,0),(1628,3,'sales representative (medical and pharmaceutical products)',NULL,NULL,1,0,0,0),(1629,3,'sales skills',NULL,NULL,1,0,0,0),(1630,3,'sand castle building',NULL,NULL,1,0,0,0),(1631,3,'sanding',NULL,NULL,1,0,0,0),(1632,3,'saw maker and repairer',NULL,NULL,1,0,0,0),(1633,3,'scalp treatment',NULL,NULL,1,0,0,0),(1634,3,'scheduling',NULL,NULL,1,0,0,0),(1635,3,'school laboratory technician',NULL,NULL,1,0,0,0),(1636,3,'school principal',NULL,NULL,1,0,0,0),(1637,3,'science technicians nec',NULL,NULL,1,0,0,0),(1638,3,'scrapbooking',NULL,NULL,1,0,0,0),(1639,3,'screen printer',NULL,NULL,1,0,0,0),(1640,1,'screening telephone calls',NULL,NULL,1,0,0,0),(1641,3,'scuba diving',NULL,NULL,1,0,0,0),(1642,3,'sculling or rowing',NULL,NULL,1,0,0,0),(1643,3,'sculpting',NULL,NULL,1,0,0,0),(1644,3,'sculpting ',NULL,NULL,1,0,0,0),(1645,3,'sculptor',NULL,NULL,1,0,0,0),(1646,3,'seaglass collecting',NULL,NULL,1,0,0,0),(1647,3,'seashell collecting',NULL,NULL,1,0,0,0),(1648,3,'secondary school teacher',NULL,NULL,1,0,0,0),(1649,3,'secretarial skills',NULL,NULL,1,0,0,0),(1650,3,'see when things are going wrong',NULL,NULL,1,0,0,0),(1651,3,'select good produce',NULL,NULL,1,0,0,0),(1652,2,'self-confident',NULL,NULL,1,0,0,0),(1653,3,'self-esteem, motivation, and goal setting ',NULL,NULL,1,0,0,0),(1654,2,'self-motivated',NULL,NULL,1,0,0,0),(1655,3,'self-motivated ',NULL,NULL,1,0,0,0),(1656,3,'selling',NULL,NULL,1,0,0,0),(1657,1,'selling ideas',NULL,NULL,1,0,0,0),(1658,1,'selling products',NULL,NULL,1,0,0,0),(1659,3,'selling products or services',NULL,NULL,1,0,0,0),(1660,3,'senior non-commissioned defence force member',NULL,NULL,1,0,0,0),(1661,2,'sense of humor',NULL,NULL,1,0,0,0),(1662,2,'sensible',NULL,NULL,1,0,0,0),(1663,3,'sensitive',NULL,NULL,1,0,0,0),(1664,2,'serious',NULL,NULL,1,0,0,0),(1665,3,'servicing equipment (examples: telephone, lawn mowers, appliances)',NULL,NULL,1,0,0,0),(1666,3,'servicing goods',NULL,NULL,1,0,0,0),(1667,3,'servicing office machines (example: typewriter, copiers, etc.)',NULL,NULL,1,0,0,0),(1668,3,'serving',NULL,NULL,1,0,0,0),(1669,1,'serving individuals',NULL,NULL,1,0,0,0),(1670,3,'serving people',NULL,NULL,1,0,0,0),(1671,3,'set up my own network of experts or helpers',NULL,NULL,1,0,0,0),(1672,3,'setting performance standards',NULL,NULL,1,0,0,0),(1673,1,'setting priorities',NULL,NULL,1,0,0,0),(1674,3,'setting the table',NULL,NULL,1,0,0,0),(1675,3,'setting up classroom interest centers',NULL,NULL,1,0,0,0),(1676,1,'setting up demonstrations',NULL,NULL,1,0,0,0),(1677,1,'setting work/committee goals',NULL,NULL,1,0,0,0),(1678,3,'settle disagreements',NULL,NULL,1,0,0,0),(1679,3,'sew a button',NULL,NULL,1,0,0,0),(1680,3,'sew a button onto clothing',NULL,NULL,1,0,0,0),(1681,3,'sewing',NULL,NULL,1,0,0,0),(1682,3,'sewing ',NULL,NULL,1,0,0,0),(1683,3,'sewing or mending','Crafting',NULL,1,0,0,0),(1684,3,'shade',NULL,NULL,1,0,0,0),(1685,3,'shampooing hair',NULL,NULL,1,0,0,0),(1686,3,'share in group effort',NULL,NULL,1,0,0,0),(1687,3,'share leadership',NULL,NULL,1,0,0,0),(1688,2,'sharp-witted',NULL,NULL,1,0,0,0),(1689,3,'sheep farmer',NULL,NULL,1,0,0,0),(1690,3,'sheetmetal trades worker',NULL,NULL,1,0,0,0),(1691,3,'sheet-metal work',NULL,NULL,1,0,0,0),(1692,3,'shibori dyeing ',NULL,NULL,1,0,0,0),(1693,3,'shine a shoe',NULL,NULL,1,0,0,0),(1694,3,'ship surveyor',NULL,NULL,1,0,0,0),(1695,3,'ship\'s engineer',NULL,NULL,1,0,0,0),(1696,3,'ship\'s master',NULL,NULL,1,0,0,0),(1697,3,'ship\'s officer',NULL,NULL,1,0,0,0),(1698,3,'shipwright',NULL,NULL,1,0,0,0),(1699,3,'shoemaker',NULL,NULL,1,0,0,0),(1700,3,'shooting',NULL,NULL,1,0,0,0),(1701,3,'shooting sport',NULL,NULL,1,0,0,0),(1702,3,'short order cook',NULL,NULL,1,0,0,0),(1703,3,'shortwave listening',NULL,NULL,1,0,0,0),(1704,3,'show patience',NULL,NULL,1,0,0,0),(1705,3,'show self-confidence',NULL,NULL,1,0,0,0),(1706,3,'sign language',NULL,NULL,1,0,0,0),(1707,3,'signwriter',NULL,NULL,1,0,0,0),(1708,2,'sincere',NULL,NULL,1,0,0,0),(1709,3,'singer',NULL,NULL,1,0,0,0),(1710,3,'singing',NULL,NULL,1,0,0,0),(1711,3,'skateboarding',NULL,NULL,1,0,0,0),(1712,3,'skating',NULL,NULL,1,0,0,0),(1713,1,'sketching charts or diagrams',NULL,NULL,1,0,0,0),(1714,3,'skiing',NULL,NULL,1,0,0,0),(1715,1,'skillfully applying professional knowledge',NULL,NULL,1,0,0,0),(1716,3,'skydiving',NULL,NULL,1,0,0,0),(1717,3,'slacklining',NULL,NULL,1,0,0,0),(1718,3,'slaughterer',NULL,NULL,1,0,0,0),(1719,3,'slot car racing',NULL,NULL,1,0,0,0),(1720,3,'small engine mechanic',NULL,NULL,1,0,0,0),(1721,3,'small offset printer',NULL,NULL,1,0,0,0),(1722,3,'smile for the camera',NULL,NULL,1,0,0,0),(1723,3,'snowboarding',NULL,NULL,1,0,0,0),(1724,3,'snowsport instructor',NULL,NULL,1,0,0,0),(1725,3,'soapmaking',NULL,NULL,1,0,0,0),(1726,2,'sociable',NULL,NULL,1,0,0,0),(1727,3,'social professionals nec',NULL,NULL,1,0,0,0),(1728,3,'social worker',NULL,NULL,1,0,0,0),(1729,3,'software',NULL,NULL,1,0,0,0),(1730,3,'software and applications programmers nec',NULL,NULL,1,0,0,0),(1731,3,'software engineer',NULL,NULL,1,0,0,0),(1732,3,'software tester',NULL,NULL,1,0,0,0),(1733,3,'soldering',NULL,NULL,1,0,0,0),(1734,3,'solicitor',NULL,NULL,1,0,0,0),(1735,3,'solid plasterer',NULL,NULL,1,0,0,0),(1736,1,'solve problems',NULL,NULL,1,0,0,0),(1737,3,'sonographer',NULL,NULL,1,0,0,0),(1738,3,'sorting, delivering mail',NULL,NULL,1,0,0,0),(1739,3,'sound technician',NULL,NULL,1,0,0,0),(1740,3,'speak a foreign language (specify language)',NULL,NULL,1,0,0,0),(1741,3,'speak at least two common languages',NULL,NULL,1,0,0,0),(1742,10,'speak english fluently',NULL,NULL,1,0,0,0),(1743,3,'speak foreign languages',NULL,NULL,1,0,0,0),(1744,3,'speak in public',NULL,NULL,1,0,0,0),(1745,3,'speaking in spanish',NULL,NULL,1,0,0,0),(1746,1,'speaking to the public',NULL,NULL,1,0,0,0),(1747,3,'special education teachers nec',NULL,NULL,1,0,0,0),(1748,3,'special needs teachers',NULL,NULL,1,0,0,0),(1749,3,'specialist managers',NULL,NULL,1,0,0,0),(1750,3,'specialist physician (general medicine)',NULL,NULL,1,0,0,0),(1751,3,'specialist physicians nec',NULL,NULL,1,0,0,0),(1752,3,'speech pathologist',NULL,NULL,1,0,0,0),(1753,3,'speed read',NULL,NULL,1,0,0,0),(1754,3,'speed skating',NULL,NULL,1,0,0,0),(1755,3,'spelunking ',NULL,NULL,1,0,0,0),(1756,3,'spinning yarn ',NULL,NULL,1,0,0,0),(1757,3,'split firewood',NULL,NULL,1,0,0,0),(1758,2,'spontaneous',NULL,NULL,1,0,0,0),(1759,3,'sports',NULL,NULL,1,0,0,0),(1760,3,'sports administrator',NULL,NULL,1,0,0,0),(1761,3,'sports centre manager',NULL,NULL,1,0,0,0),(1762,3,'sports development officer',NULL,NULL,1,0,0,0),(1763,3,'sports umpire',NULL,NULL,1,0,0,0),(1764,3,'sportspersons nec',NULL,NULL,1,0,0,0),(1765,3,'spreadsheet',NULL,NULL,1,0,0,0),(1766,2,'spunky',NULL,NULL,1,0,0,0),(1767,3,'sql',NULL,NULL,1,0,0,0),(1768,3,'squash',NULL,NULL,1,0,0,0),(1769,2,'stable',NULL,NULL,1,0,0,0),(1770,3,'stage manager',NULL,NULL,1,0,0,0),(1771,3,'stained glass ',NULL,NULL,1,0,0,0),(1772,3,'stamp collecting',NULL,NULL,1,0,0,0),(1773,3,'stand-up comedy',NULL,NULL,1,0,0,0),(1774,3,'statistician',NULL,NULL,1,0,0,0),(1775,3,'stay focused on my work',NULL,NULL,1,0,0,0),(1776,2,'steady',NULL,NULL,1,0,0,0),(1777,3,'stenography',NULL,NULL,1,0,0,0),(1778,3,'stock and station agent',NULL,NULL,1,0,0,0),(1779,3,'stockbroking dealer',NULL,NULL,1,0,0,0),(1780,3,'stocking shelves',NULL,NULL,1,0,0,0),(1781,3,'stockroom work',NULL,NULL,1,0,0,0),(1782,3,'stone collecting',NULL,NULL,1,0,0,0),(1783,3,'stonemason',NULL,NULL,1,0,0,0),(1784,3,'strategic thinking',NULL,NULL,1,0,0,0),(1785,3,'strive to satisfy clients',NULL,NULL,1,0,0,0),(1786,2,'strong',NULL,NULL,1,0,0,0),(1787,3,'strong communication skills',NULL,NULL,1,0,0,0),(1788,2,'strong-minded',NULL,NULL,1,0,0,0),(1789,3,'structural engineer',NULL,NULL,1,0,0,0),(1790,3,'student counsellor',NULL,NULL,1,0,0,0),(1791,3,'student specific skills','Contact Professors For Help',NULL,1,0,0,0),(1792,3,'studying current beauty supplies and styles',NULL,NULL,1,0,0,0),(1793,3,'styling',NULL,NULL,1,0,0,0),(1794,3,'sugar cane grower',NULL,NULL,1,0,0,0),(1795,3,'suggest improvements',NULL,NULL,1,0,0,0),(1796,3,'suggesting courses of action',NULL,NULL,1,0,0,0),(1797,3,'summarizing data',NULL,NULL,1,0,0,0),(1798,1,'summarizing information',NULL,NULL,1,0,0,0),(1799,3,'supervise',NULL,NULL,1,0,0,0),(1800,3,'supervise others',NULL,NULL,1,0,0,0),(1801,3,'supervise, teach',NULL,NULL,1,0,0,0),(1802,3,'supervising',NULL,NULL,1,0,0,0),(1803,3,'supervising adults and/or children within a school-type setting (what did you supervise them to do?)',NULL,NULL,1,0,0,0),(1804,3,'supervising clients',NULL,NULL,1,0,0,0),(1805,1,'supervising employees',NULL,NULL,1,0,0,0),(1806,3,'supervising operations',NULL,NULL,1,0,0,0),(1807,3,'supervising others (in a job, in a club or organization you belong to, etc.)',NULL,NULL,1,0,0,0),(1808,3,'supervisory experience (in a job, in a club or organization you belong to, etc.)',NULL,NULL,1,0,0,0),(1809,3,'supply and distribution manager',NULL,NULL,1,0,0,0),(1810,3,'support',NULL,NULL,1,0,0,0),(1811,1,'supporting others',NULL,NULL,1,0,0,0),(1812,3,'supporting others ',NULL,NULL,1,0,0,0),(1813,3,'supportive',NULL,NULL,1,0,0,0),(1814,3,'surfing',NULL,NULL,1,0,0,0),(1815,3,'surgeon (general)',NULL,NULL,1,0,0,0),(1816,3,'surveying',NULL,NULL,1,0,0,0),(1817,3,'surveying or cartographic tech',NULL,NULL,1,0,0,0),(1818,3,'surveying or spatial science technician',NULL,NULL,1,0,0,0),(1819,3,'surveyor',NULL,NULL,1,0,0,0),(1820,3,'sweeping floors',NULL,NULL,1,0,0,0),(1821,3,'sweeping the floor',NULL,NULL,1,0,0,0),(1822,3,'swim',NULL,NULL,1,0,0,0),(1823,3,'swimming',NULL,NULL,1,0,0,0),(1824,3,'swimming coach or instructor',NULL,NULL,1,0,0,0),(1825,2,'sympathetic',NULL,NULL,1,0,0,0),(1826,3,'systems administration',NULL,NULL,1,0,0,0),(1827,3,'systems administrator',NULL,NULL,1,0,0,0),(1828,3,'systems analyst',NULL,NULL,1,0,0,0),(1829,3,'table football',NULL,NULL,1,0,0,0),(1830,3,'table tennis',NULL,NULL,1,0,0,0),(1831,3,'tactful',NULL,NULL,1,0,0,0),(1832,3,'taekwondo',NULL,NULL,1,0,0,0),(1833,3,'tai chi',NULL,NULL,1,0,0,0),(1834,3,'take a good picture',NULL,NULL,1,0,0,0),(1835,3,'take corrective action',NULL,NULL,1,0,0,0),(1836,1,'take inventory',NULL,NULL,1,0,0,0),(1837,3,'take orders',NULL,NULL,1,0,0,0),(1838,2,'take risks',NULL,NULL,1,0,0,0),(1839,3,'take risks when necessary',NULL,NULL,1,0,0,0),(1840,3,'take useful notes',NULL,NULL,1,0,0,0),(1841,3,'taking decisive action',NULL,NULL,1,0,0,0),(1842,1,'taking independent action',NULL,NULL,1,0,0,0),(1843,3,'taking inititiave',NULL,NULL,1,0,0,0),(1844,3,'taking out the trash',NULL,NULL,1,0,0,0),(1845,1,'taking personal responsibility',NULL,NULL,1,0,0,0),(1846,3,'talk easily with others',NULL,NULL,1,0,0,0),(1847,3,'target shooting',NULL,NULL,1,0,0,0),(1848,3,'tarot ',NULL,NULL,1,0,0,0),(1849,3,'tatting ',NULL,NULL,1,0,0,0),(1850,3,'taxation accountant',NULL,NULL,1,0,0,0),(1851,3,'taxidermy',NULL,NULL,1,0,0,0),(1852,3,'teach',NULL,NULL,1,0,0,0),(1853,3,'teach new skills to others',NULL,NULL,1,0,0,0),(1854,3,'teach others and give clear instructions',NULL,NULL,1,0,0,0),(1855,2,'teachable',NULL,NULL,1,0,0,0),(1856,3,'teacher of english to speakers of other languages',NULL,NULL,1,0,0,0),(1857,3,'teacher of the hearing impaired',NULL,NULL,1,0,0,0),(1858,3,'teacher of the sight impaired',NULL,NULL,1,0,0,0),(1859,3,'teaching',NULL,NULL,1,0,0,0),(1860,3,'teaching (adults and/or children, volunteer or paid)',NULL,NULL,1,0,0,0),(1861,3,'teaching skills',NULL,NULL,1,0,0,0),(1862,3,'teaching skills ',NULL,NULL,1,0,0,0),(1863,3,'teaching various subjects or special events',NULL,NULL,1,0,0,0),(1864,1,'teaching/instructing/training individuals',NULL,NULL,1,0,0,0),(1865,1,'team builder',NULL,NULL,1,0,0,0),(1866,3,'team building',NULL,NULL,1,0,0,0),(1867,3,'team player',NULL,NULL,1,0,0,0),(1868,3,'teamwork ',NULL,NULL,1,0,0,0),(1869,3,'teamwork skills',NULL,NULL,1,0,0,0),(1870,3,'technical cable jointer',NULL,NULL,1,0,0,0),(1871,3,'technical director',NULL,NULL,1,0,0,0),(1872,3,'technical sales representatives nec',NULL,NULL,1,0,0,0),(1873,3,'technical work',NULL,NULL,1,0,0,0),(1874,3,'technical writer',NULL,NULL,1,0,0,0),(1875,3,'technicians and trades workers',NULL,NULL,1,0,0,0),(1876,3,'telecommunications cable jointer',NULL,NULL,1,0,0,0),(1877,3,'telecommunications engineer',NULL,NULL,1,0,0,0),(1878,3,'telecommunications field engineer',NULL,NULL,1,0,0,0),(1879,3,'telecommunications linesworker',NULL,NULL,1,0,0,0),(1880,3,'telecommunications network engineer',NULL,NULL,1,0,0,0),(1881,3,'telecommunications network planner',NULL,NULL,1,0,0,0),(1882,3,'telecommunications technical officer or technologist',NULL,NULL,1,0,0,0),(1883,3,'telecommunications technician',NULL,NULL,1,0,0,0),(1884,3,'television equipment operator',NULL,NULL,1,0,0,0),(1885,3,'television journalist',NULL,NULL,1,0,0,0),(1886,3,'television presenter',NULL,NULL,1,0,0,0),(1887,3,'tell a story that captivates people\'s attention',NULL,NULL,1,0,0,0),(1888,2,'tenacious',NULL,NULL,1,0,0,0),(1889,3,'tennis',NULL,NULL,1,0,0,0),(1890,3,'tennis coach',NULL,NULL,1,0,0,0),(1891,3,'textile, clothing and footwear mechanic',NULL,NULL,1,0,0,0),(1892,3,'think of others',NULL,NULL,1,0,0,0),(1893,1,'thinking in a logical manner',NULL,NULL,1,0,0,0),(1894,3,'thinking logically',NULL,NULL,1,0,0,0),(1895,1,'thinking of creative ideas',NULL,NULL,1,0,0,0),(1896,3,'thoracic medicine specialist',NULL,NULL,1,0,0,0),(1897,2,'thorough',NULL,NULL,1,0,0,0),(1898,2,'thoughtful',NULL,NULL,1,0,0,0),(1899,2,'tie a necktie',NULL,NULL,1,0,0,0),(1900,3,'tie dyeing ',NULL,NULL,1,0,0,0),(1901,3,'time and project management',NULL,NULL,1,0,0,0),(1902,3,'time management',NULL,NULL,1,0,0,0),(1903,3,'time management skills',NULL,NULL,1,0,0,0),(1904,2,'tolerant',NULL,NULL,1,0,0,0),(1905,1,'tolerating interruptions',NULL,NULL,1,0,0,0),(1906,3,'toolmaker',NULL,NULL,1,0,0,0),(1907,3,'tools and machines you can use',NULL,NULL,1,0,0,0),(1908,3,'touch football',NULL,NULL,1,0,0,0),(1909,2,'tough',NULL,NULL,1,0,0,0),(1910,3,'tour skating',NULL,NULL,1,0,0,0),(1911,8,'tracking acomplishments ',NULL,NULL,1,0,0,0),(1912,3,'tracking personal finances',NULL,NULL,1,0,0,0),(1913,3,'traditional chinese medical practitioner',NULL,NULL,1,0,0,0),(1914,3,'train or teach others',NULL,NULL,1,0,0,0),(1915,3,'training and development professional',NULL,NULL,1,0,0,0),(1916,3,'training skills',NULL,NULL,1,0,0,0),(1917,3,'trainspotting',NULL,NULL,1,0,0,0),(1918,3,'translating words',NULL,NULL,1,0,0,0),(1919,3,'translator',NULL,NULL,1,0,0,0),(1920,3,'transport company manager',NULL,NULL,1,0,0,0),(1921,3,'transport engineer',NULL,NULL,1,0,0,0),(1922,3,'transportation savvy','Bike Maintenance',NULL,1,0,0,0),(1923,3,'transporting trees',NULL,NULL,1,0,0,0),(1924,3,'travel agency manager',NULL,NULL,1,0,0,0),(1925,3,'travel attendants nec',NULL,NULL,1,0,0,0),(1926,3,'travel light',NULL,NULL,1,0,0,0),(1927,3,'traveling',NULL,NULL,1,0,0,0),(1928,3,'tree trimming',NULL,NULL,1,0,0,0),(1929,3,'trenching',NULL,NULL,1,0,0,0),(1930,3,'triathlon',NULL,NULL,1,0,0,0),(1931,3,'tribunal member',NULL,NULL,1,0,0,0),(1932,3,'troubleshooting',NULL,NULL,1,0,0,0),(1933,3,'truck driver',NULL,NULL,1,0,0,0),(1934,3,'truck driving',NULL,NULL,1,0,0,0),(1935,3,'trust',NULL,NULL,1,0,0,0),(1936,3,'trust my instincts',NULL,NULL,1,0,0,0),(1937,3,'trust people',NULL,NULL,1,0,0,0),(1938,2,'trusting',NULL,NULL,1,0,0,0),(1939,2,'trustworthy',NULL,NULL,1,0,0,0),(1940,3,'try to reach agreements with',NULL,NULL,1,0,0,0),(1941,3,'turf grower',NULL,NULL,1,0,0,0),(1942,3,'type',NULL,NULL,1,0,0,0),(1943,3,'typing',NULL,NULL,1,0,0,0),(1944,3,'typing from dictating machines',NULL,NULL,1,0,0,0),(1945,3,'typing in chinese',NULL,NULL,1,0,0,0),(1946,2,'unaffected',NULL,NULL,1,0,0,0),(1947,2,'unassuming',NULL,NULL,1,0,0,0),(1948,1,'understand the big picture',NULL,NULL,1,0,0,0),(1949,2,'understanding',NULL,NULL,1,0,0,0),(1950,2,'unexcitable',NULL,NULL,1,0,0,0),(1951,2,'uninhibited',NULL,NULL,1,0,0,0),(1952,3,'university lecturer',NULL,NULL,1,0,0,0),(1953,3,'university tutor',NULL,NULL,1,0,0,0),(1954,3,'unix',NULL,NULL,1,0,0,0),(1955,3,'unloading or loading',NULL,NULL,1,0,0,0),(1956,8,'update your skills',NULL,NULL,1,0,0,0),(1957,1,'updating files',NULL,NULL,1,0,0,0),(1958,3,'upholsterer',NULL,NULL,1,0,0,0),(1959,3,'urban and regional planner',NULL,NULL,1,0,0,0),(1960,3,'urban exploration',NULL,NULL,1,0,0,0),(1961,3,'urologist',NULL,NULL,1,0,0,0),(1962,3,'use budgets',NULL,NULL,1,0,0,0),(1963,1,'use complex equipment',NULL,NULL,1,0,0,0),(1964,3,'use computers to create presentations',NULL,NULL,1,0,0,0),(1965,1,'use equipment',NULL,NULL,1,0,0,0),(1966,1,'use my hands',NULL,NULL,1,0,0,0),(1967,3,'use sign language',NULL,NULL,1,0,0,0),(1968,3,'using adding machines',NULL,NULL,1,0,0,0),(1969,3,'using calculators',NULL,NULL,1,0,0,0),(1970,3,'using computers',NULL,NULL,1,0,0,0),(1971,3,'using office machines (list all you can use)',NULL,NULL,1,0,0,0),(1972,3,'using words, ideas',NULL,NULL,1,0,0,0),(1973,3,'utilize computer software',NULL,NULL,1,0,0,0),(1974,3,'utilize computer software (specify programs)',NULL,NULL,1,0,0,0),(1975,3,'vacuuming',NULL,NULL,1,0,0,0),(1976,3,'valuer',NULL,NULL,1,0,0,0),(1977,3,'vascular surgeon',NULL,NULL,1,0,0,0),(1978,3,'vegetable gardening',NULL,NULL,1,0,0,0),(1979,3,'vegetable grower (australia) / market gardener (new zealand)',NULL,NULL,1,0,0,0),(1980,3,'vehicle body builder',NULL,NULL,1,0,0,0),(1981,3,'vehicle painter',NULL,NULL,1,0,0,0),(1982,3,'vehicle restoration',NULL,NULL,1,0,0,0),(1983,3,'vehicle trimmer',NULL,NULL,1,0,0,0),(1984,2,'verbal',NULL,NULL,1,0,0,0),(1985,3,'verbal communication',NULL,NULL,1,0,0,0),(1986,3,'verbal communication skills',NULL,NULL,1,0,0,0),(1987,2,'versatile',NULL,NULL,1,0,0,0),(1988,3,'versatile: turning easily or readily from occupation/job to another, changeable',NULL,NULL,1,0,0,0),(1989,3,'veterinarian',NULL,NULL,1,0,0,0),(1990,3,'video gaming',NULL,NULL,1,0,0,0),(1991,3,'video producer',NULL,NULL,1,0,0,0),(1992,3,'videophilia (home theater)',NULL,NULL,1,0,0,0),(1993,3,'vintage books',NULL,NULL,1,0,0,0),(1994,3,'vintage cars',NULL,NULL,1,0,0,0),(1995,3,'vintage clothing',NULL,NULL,1,0,0,0),(1996,3,'visual arts and crafts professionals nec',NULL,NULL,1,0,0,0),(1997,3,'visual detail',NULL,NULL,1,0,0,0),(1998,3,'vocational education teacher',NULL,NULL,1,0,0,0),(1999,3,'volleyball',NULL,NULL,1,0,0,0),(2000,3,'waiter',NULL,NULL,1,0,0,0),(2001,3,'waitress',NULL,NULL,1,0,0,0),(2002,3,'wall and floor tiler',NULL,NULL,1,0,0,0),(2003,3,'wallpapering',NULL,NULL,1,0,0,0),(2004,2,'warm',NULL,NULL,1,0,0,0),(2005,3,'washing clothes, dishes, windows or the car',NULL,NULL,1,0,0,0),(2006,3,'washing floors',NULL,NULL,1,0,0,0),(2007,3,'washing pans',NULL,NULL,1,0,0,0),(2008,3,'washing windows',NULL,NULL,1,0,0,0),(2009,3,'watch and clock maker and repairer',NULL,NULL,1,0,0,0),(2010,3,'watching movies',NULL,NULL,1,0,0,0),(2011,3,'water sports',NULL,NULL,1,0,0,0),(2012,3,'wax a car',NULL,NULL,1,0,0,0),(2013,3,'waxing',NULL,NULL,1,0,0,0),(2014,3,'way',NULL,NULL,1,0,0,0),(2015,3,'weaving ',NULL,NULL,1,0,0,0),(2016,3,'web design ',NULL,NULL,1,0,0,0),(2017,3,'web designer',NULL,NULL,1,0,0,0),(2018,3,'web page design',NULL,NULL,1,0,0,0),(2019,3,'web surfing',NULL,NULL,1,0,0,0),(2020,3,'weightlifting',NULL,NULL,1,0,0,0),(2021,3,'welder (first class)',NULL,NULL,1,0,0,0),(2022,3,'welding',NULL,NULL,1,0,0,0),(2023,3,'welfare centre manager',NULL,NULL,1,0,0,0),(2024,3,'welfare worker',NULL,NULL,1,0,0,0),(2025,3,'wholesaler',NULL,NULL,1,0,0,0),(2026,2,'wholesome',NULL,NULL,1,0,0,0),(2027,3,'win or avoid a fistfight',NULL,NULL,1,0,0,0),(2028,3,'window repairs',NULL,NULL,1,0,0,0),(2029,3,'windows',NULL,NULL,1,0,0,0),(2030,3,'wine maker',NULL,NULL,1,0,0,0),(2031,2,'wise',NULL,NULL,1,0,0,0),(2032,2,'witty',NULL,NULL,1,0,0,0),(2033,3,'wood carving',NULL,NULL,1,0,0,0),(2034,3,'wood machinist',NULL,NULL,1,0,0,0),(2035,3,'wood machinists and other wood trades workers',NULL,NULL,1,0,0,0),(2036,3,'wood turner',NULL,NULL,1,0,0,0),(2037,3,'woodworking',NULL,NULL,1,0,0,0),(2038,3,'woodworking ',NULL,NULL,1,0,0,0),(2039,3,'wool buyer',NULL,NULL,1,0,0,0),(2040,3,'wool classer',NULL,NULL,1,0,0,0),(2041,3,'word processing',NULL,NULL,1,0,0,0),(2042,3,'work independently',NULL,NULL,1,0,0,0),(2043,3,'work out compromises',NULL,NULL,1,0,0,0),(2044,3,'work well with my hands',NULL,NULL,1,0,0,0),(2045,3,'work well with others',NULL,NULL,1,0,0,0),(2046,3,'work with minimal supervision',NULL,NULL,1,0,0,0),(2047,3,'working creatively  ',NULL,NULL,1,0,0,0),(2048,3,'working knowledge of visual basic',NULL,NULL,1,0,0,0),(2049,3,'working with different adult and/or child populations',NULL,NULL,1,0,0,0),(2050,3,'working with others',NULL,NULL,1,0,0,0),(2051,1,'working with people',NULL,NULL,1,0,0,0),(2052,3,'working with statistics',NULL,NULL,1,0,0,0),(2053,3,'workplace relations adviser',NULL,NULL,1,0,0,0),(2054,3,'worldbuilding',NULL,NULL,1,0,0,0),(2055,3,'write clear and concise reports',NULL,NULL,1,0,0,0),(2056,1,'write clearly',NULL,NULL,1,0,0,0),(2057,3,'write short stories or articles',NULL,NULL,1,0,0,0),(2058,3,'writing',NULL,NULL,1,0,0,0),(2059,3,'writing and grading tests',NULL,NULL,1,0,0,0),(2060,3,'writing clearly and concisely',NULL,NULL,1,0,0,0),(2061,1,'writing for publication',NULL,NULL,1,0,0,0),(2062,3,'writing lesson plans',NULL,NULL,1,0,0,0),(2063,3,'writing letters, papers, or proposals',NULL,NULL,1,0,0,0),(2064,1,'writing letters/papers/proposals',NULL,NULL,1,0,0,0),(2065,3,'writing programs',NULL,NULL,1,0,0,0),(2066,1,'writing reports',NULL,NULL,1,0,0,0),(2067,3,'writing spanish',NULL,NULL,1,0,0,0),(2068,3,'written communications',NULL,NULL,1,0,0,0),(2069,3,'xhtml',NULL,NULL,1,0,0,0),(2070,3,'xml',NULL,NULL,1,0,0,0),(2071,3,'yoga',NULL,NULL,1,0,0,0),(2072,3,'youth worker',NULL,NULL,1,0,0,0),(2073,3,'yo-yoing',NULL,NULL,1,0,0,0);
/*!40000 ALTER TABLE `gb_list_bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_mentorship`
--

DROP TABLE IF EXISTS `gb_mentorship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `mentor_id` int(11),
  `mentee_id` int(11),
  `goal_list_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `level_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_owner_id` (`owner_id`),
  KEY `mentorship_goal_list_id` (`goal_list_id`),
  KEY `mentorship_mentor_id` (`mentor_id`),
  KEY `mentorship_mentee_id` (`mentee_id`),
  CONSTRAINT `mentorship_goal_list_id` FOREIGN KEY (`goal_list_id`) REFERENCES `gb_goal_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_level_id` FOREIGN KEY (`level_id`) REFERENCES `gb_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_mentor_id` FOREIGN KEY (`mentor_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_mentee_id` FOREIGN KEY (`mentee_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_mentorship`
--

LOCK TABLES `gb_mentorship` WRITE;
/*!40000 ALTER TABLE `gb_mentorship` DISABLE KEYS */;
INSERT INTO `gb_mentorship` VALUES (1,2,2,NULL,6,'Working with a team in college for class project(s).','During my college life, I have learned and gathered so much information on how to handle people in college group projects',6,1,0,1),(2,2,2,NULL,7,'Building ideas into action','As my first mentorship, I want to mentor someone who has an idea and wants it to see the light. I am not an expert, but I wanna share my story when developing this website and maybe we can learn from each other.',7,1,1,1),(3,2,7,2,8,'To become that awesome guy for the lady.','Some of the everyday tips to be an awesome guy to a lady friend or girlfriend or wife',6,2,0,2);
/*!40000 ALTER TABLE `gb_mentorship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_mentorship_announcement`
--

DROP TABLE IF EXISTS `gb_mentorship_announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship_announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `announcement_id` int(11) NOT NULL,
  `mentorship_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_announcement_announcement_id` (`announcement_id`),
  KEY `mentorship_announcement_mentorship_id` (`mentorship_id`),
  CONSTRAINT `mentorship_announcement_announcement_id` FOREIGN KEY (`announcement_id`) REFERENCES `gb_announcement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_announcement_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_mentorship_announcement`
--

LOCK TABLES `gb_mentorship_announcement` WRITE;
/*!40000 ALTER TABLE `gb_mentorship_announcement` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_mentorship_announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_mentorship_answer`
--

DROP TABLE IF EXISTS `gb_mentorship_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionee_id` int(11) NOT NULL,
  `mentorship_id` int(11) NOT NULL,
  `mentorship_question_id` int(11) NOT NULL,
  `goal_id` int(11) DEFAULT NULL,
  `mentorship_answer` varchar(1000) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_answer_mentorship_id` (`mentorship_id`),
  KEY `mentorship_answer_mentorship_question_id` (`mentorship_question_id`),
  KEY `mentorship_answer_goal_id` (`goal_id`),
  KEY `mentorship_questionee_id` (`questionee_id`),
  CONSTRAINT `mentorship_answer_questionee_id` FOREIGN KEY (`questionee_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_answer_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_answer_mentorship_question_id` FOREIGN KEY (`mentorship_question_id`) REFERENCES `gb_mentorship_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_answer_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_mentorship_answer`
--

LOCK TABLES `gb_mentorship_answer` WRITE;
/*!40000 ALTER TABLE `gb_mentorship_answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_mentorship_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_mentorship_discussion_title`
--

DROP TABLE IF EXISTS `gb_mentorship_discussion_title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship_discussion_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `discussion_title_id` int(11) NOT NULL,
  `mentorship_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_discussion_title_discussion_title_id` (`discussion_title_id`),
  KEY `mentorship_discussion_title_mentorship_id` (`mentorship_id`),
  CONSTRAINT `mentorship_discussion_title_discussion_title_id` FOREIGN KEY (`discussion_title_id`) REFERENCES `gb_discussion_title` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_discussion_title_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_mentorship_discussion_title`
--

LOCK TABLES `gb_mentorship_discussion_title` WRITE;
/*!40000 ALTER TABLE `gb_mentorship_discussion_title` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_mentorship_discussion_title` ENABLE KEYS */;
UNLOCK TABLES;


DROP TABLE IF EXISTS `gb_mentorship_monitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship_monitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mentorship_id` int(11) NOT NULL,
  `monitor_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `type_id` int (11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gb_mentorship_monitor_mentorship_id` (`mentorship_id`),
  KEY `gb_mentorship_monitor_monitor_id` (`monitor_id`),
  KEY `gb_mentorship_monitor_level_id` (`level_id`),
  CONSTRAINT `gb_mentorship_monitor_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gb_mentorship_monitor_monitor_id` FOREIGN KEY (`monitor_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gb_mentorship_monitor_level_id` FOREIGN KEY (`level_id`) REFERENCES `gb_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_mentorship_question`
--

DROP TABLE IF EXISTS `gb_mentorship_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mentorship_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_question_mentorship_id` (`mentorship_id`),
  KEY `mentorship_question_question_id` (`question_id`),
  CONSTRAINT `mentorship_question_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_question_question_id` FOREIGN KEY (`question_id`) REFERENCES `gb_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_mentorship_question`
--

LOCK TABLES `gb_mentorship_question` WRITE;
/*!40000 ALTER TABLE `gb_mentorship_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_mentorship_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_mentorship_share`
--

DROP TABLE IF EXISTS `gb_mentorship_share`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mentorship_id` int(11) NOT NULL,
  `shared_to_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `mentorship_share_mentorship_id` (`mentorship_id`),
  KEY `mentorship_share_shared_to_id` (`shared_to_id`),
  CONSTRAINT `mentorship_share_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_share_shared_to_id` FOREIGN KEY (`shared_to_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_mentorship_share`
--

LOCK TABLES `gb_mentorship_share` WRITE;
/*!40000 ALTER TABLE `gb_mentorship_share` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_mentorship_share` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_mentorship_timeline`
--

DROP TABLE IF EXISTS `gb_mentorship_timeline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship_timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timeline_id` int(11) NOT NULL,
  `mentorship_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_timeline_timeline_id` (`timeline_id`),
  KEY `mentorship_timeline_mentorship_id` (`mentorship_id`),
  CONSTRAINT `mentorship_timeline_timeline_id` FOREIGN KEY (`timeline_id`) REFERENCES `gb_timeline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_timeline_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_mentorship_timeline`
--

LOCK TABLES `gb_mentorship_timeline` WRITE;
/*!40000 ALTER TABLE `gb_mentorship_timeline` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_mentorship_timeline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_mentorship_todo`
--

DROP TABLE IF EXISTS `gb_mentorship_todo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship_todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `todo_id` int(11) NOT NULL,
  `mentorship_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_todo_todo_id` (`todo_id`),
  KEY `mentorship_todo_mnentorship_id` (`mentorship_id`),
  CONSTRAINT `mentorship_todo_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_todo_todo_id` FOREIGN KEY (`todo_id`) REFERENCES `gb_todo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_mentorship_todo`
--

LOCK TABLES `gb_mentorship_todo` WRITE;
/*!40000 ALTER TABLE `gb_mentorship_todo` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_mentorship_todo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_mentorship_weblink`
--

DROP TABLE IF EXISTS `gb_mentorship_weblink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship_weblink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weblink_id` int(11) NOT NULL,
  `mentorship_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_weblink_weblink_id` (`weblink_id`),
  KEY `mentorship_weblink_mentorship_id` (`mentorship_id`),
  CONSTRAINT `mentorship_weblink_weblink_id` FOREIGN KEY (`weblink_id`) REFERENCES `gb_weblink` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_weblink_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_mentorship_weblink`
--

LOCK TABLES `gb_mentorship_weblink` WRITE;
/*!40000 ALTER TABLE `gb_mentorship_weblink` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_mentorship_weblink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_message`
--

DROP TABLE IF EXISTS `gb_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `body` varchar(5000) NOT NULL DEFAULT '',
  `created_date` datetime NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gb_message_sender_id` (`sender_id`),
  CONSTRAINT `gb_message_sender_id` FOREIGN KEY (`sender_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_message`
--

LOCK TABLES `gb_message` WRITE;
/*!40000 ALTER TABLE `gb_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_message_receipient`
--

DROP TABLE IF EXISTS `gb_message_receipient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_message_receipient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `receipient_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gb_message_receipient_id` (`receipient_id`),
  KEY `gb_message_message_id` (`message_id`),
  CONSTRAINT `gb_message_message_id` FOREIGN KEY (`message_id`) REFERENCES `gb_message` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gb_message_receipient_id` FOREIGN KEY (`receipient_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_message_receipient`
--

LOCK TABLES `gb_message_receipient` WRITE;
/*!40000 ALTER TABLE `gb_message_receipient` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_message_receipient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_page`
--

DROP TABLE IF EXISTS `gb_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `page_owner_id` (`owner_id`),
  CONSTRAINT `page_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_page`
--

LOCK TABLES `gb_page` WRITE;
/*!40000 ALTER TABLE `gb_page` DISABLE KEYS */;
INSERT INTO `gb_page` VALUES (1,2,'understand what interviewers want in a candidate','From the book by Rob Yeung, PhD he emphasizes some of the ways to know and understand the interview game.',1);
/*!40000 ALTER TABLE `gb_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_post`
--

DROP TABLE IF EXISTS `gb_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `post_owner_id` (`owner_id`),
  CONSTRAINT `post_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_post`
--

LOCK TABLES `gb_post` WRITE;
/*!40000 ALTER TABLE `gb_post` DISABLE KEYS */;
INSERT INTO `gb_post` VALUES (1,2,1,0,1,0),(2,2,2,0,1,0),(3,2,3,0,2,0),(4,2,4,0,1,0),(5,2,5,0,1,0),(6,2,1,1,0,0),(7,2,2,1,1,0),(8,2,3,1,0,0),(9,2,1,2,1,0);
/*!40000 ALTER TABLE `gb_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_post_share`
--

DROP TABLE IF EXISTS `gb_post_share`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_post_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `shared_to_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `post_share_post_id` (`post_id`),
  KEY `post_share_owner_id` (`owner_id`),
  KEY `post_share_shared_to_id` (`shared_to_id`),
  CONSTRAINT `post_share_post_id` FOREIGN KEY (`post_id`) REFERENCES `gb_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `post_share_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `post_share_shared_to_id` FOREIGN KEY (`shared_to_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_post_share`
--

LOCK TABLES `gb_post_share` WRITE;
/*!40000 ALTER TABLE `gb_post_share` DISABLE KEYS */;
INSERT INTO `gb_post_share` VALUES (1,1,2,1,0),(2,2,2,1,0),(3,3,2,6,0),(4,3,2,7,0),(5,3,2,3,0),(6,4,2,1,0),(7,5,2,1,0),(8,6,2,2,0),(9,7,2,1,0),(10,8,2,2,0),(11,9,2,1,0);
/*!40000 ALTER TABLE `gb_post_share` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_profile`
--

DROP TABLE IF EXISTS `gb_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_profile` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `specialty` varchar(50) NOT NULL DEFAULT '',
  `avatar_url` varchar(100) NOT NULL DEFAULT 'gb_default_avatar.png',
  `favorite_quote` varchar(500) NOT NULL DEFAULT '',
  `gender` varchar(3) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`),
  CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_profile`
--

LOCK TABLES `gb_profile` WRITE;
/*!40000 ALTER TABLE `gb_profile` DISABLE KEYS */;
INSERT INTO `gb_profile` VALUES (1,'Team','GoalBook','System','gb_avatar.jpg','','J','0000-00-00','',''),(2,'Mushayahama','Tremayne','Software Engineer','tremayne.jpg','','M','0000-00-00','',''),(3,'Nolle','Lindah','','gb_avatar.jpg','','F','0000-00-00','',''),(4,'Nolle','John','','gb_avatar.jpg','','M','0000-00-00','',''),(5,'Mushayahama','Joyce','','gb_avatar.jpg','','F','0000-00-00','',''),(6,'Ash','Paul','','gb_avatar.jpg','','M','0000-00-00','',''),(7,'Ash','Susan','','gb_avatar.jpg','','M','0000-00-00','',''),(8,'Taggg','Tagwie','','gb_avatar.jpg','',NULL,NULL,'',''),(9,'Georgiev','Simeon','','gb_avatar.jpg','',NULL,NULL,'',''),(10,'Pedicini','Joey','','gb_avatar.jpg','',NULL,NULL,'',''),(11,'Nakhaleh','Marwan','','gb_avatar.jpg','',NULL,NULL,'',''),(12,'Amin','Edward','','gb_avatar.jpg','',NULL,NULL,'',''),(13,'Testing','George','','gb_avatar.jpg','',NULL,NULL,'','');
/*!40000 ALTER TABLE `gb_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_profile_field`
--

DROP TABLE IF EXISTS `gb_profile_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_profile_field` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_profile_field`
--

LOCK TABLES `gb_profile_field` WRITE;
/*!40000 ALTER TABLE `gb_profile_field` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_profile_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_question`
--

DROP TABLE IF EXISTS `gb_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questioner_id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `question_questioner_id` (`questioner_id`),
  CONSTRAINT `question_questioner_id` FOREIGN KEY (`questioner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_question`
--

LOCK TABLES `gb_question` WRITE;
/*!40000 ALTER TABLE `gb_question` DISABLE KEYS */;
INSERT INTO `gb_question` VALUES (1,1,'Requirements and prerequisite','You must be familiar with some of the following topics/subskills inorder to get much from this mentorship',1,0),(2,1,'Specific topics/subskills I can mentor','The following are some of the topics/subskills I have gained related to this topic which I will guarantee to mentor you successfully',1,0),(3,1,'Specific topics/subskills I cannot mentor you','I canot guarantee that I will fully mentor you the following topics/subskills',1,0),(4,1,'My requirements and prerequisite','I am familiar with the following topics/subskills',2,0),(5,1,'Specific topics or subskills I want mentorship','Please focus on the following topics/subskills',2,0);
/*!40000 ALTER TABLE `gb_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_request_notification`
--

DROP TABLE IF EXISTS `gb_request_notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_request_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL DEFAULT '1',
  `notification_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `request_notification_from_id` (`from_id`),
  KEY `request_notification_to_id` (`to_id`),
  CONSTRAINT `request_notification_from_id` FOREIGN KEY (`from_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `request_notification_to_id` FOREIGN KEY (`to_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_request_notification`
--

LOCK TABLES `gb_request_notification` WRITE;
/*!40000 ALTER TABLE `gb_request_notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_request_notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_subgoal`
--

DROP TABLE IF EXISTS `gb_subgoal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_subgoal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal_id` int(11) NOT NULL,
  `subgoal_id` int(11) NOT NULL,
  `type` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `subgoal_goal_id` (`goal_id`),
  KEY `subgoal_subgoal_id` (`subgoal_id`),
  CONSTRAINT `subgoal_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subgoal_subgoal_id` FOREIGN KEY (`subgoal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_subgoal`
--

LOCK TABLES `gb_subgoal` WRITE;
/*!40000 ALTER TABLE `gb_subgoal` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_subgoal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_timeline`
--

DROP TABLE IF EXISTS `gb_timeline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT '',
  `assigner_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `timeline_assigner_id` (`assigner_id`),
  CONSTRAINT `timeline_assigner_id` FOREIGN KEY (`assigner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_timeline`
--

LOCK TABLES `gb_timeline` WRITE;
/*!40000 ALTER TABLE `gb_timeline` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_timeline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_todo`
--

DROP TABLE IF EXISTS `gb_todo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_id` int(11) DEFAULT NULL,
  `assigner_id` int(11) NOT NULL,
  `assignee_id` int(11) DEFAULT NULL,
  `assigned_date` datetime NOT NULL,
  `due_date` datetime DEFAULT NULL,
  `importance` int(11) NOT NULL DEFAULT '1',
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `todo_assigner_id` (`assigner_id`),
  KEY `todo_assignee_id` (`assignee_id`),
  KEY `todo_level_id` (`level_id`),
  CONSTRAINT `todo_assigner_id` FOREIGN KEY (`assigner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `todo_assignee_id` FOREIGN KEY (`assignee_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `todo_level_id` FOREIGN KEY (`level_id`) REFERENCES `gb_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_todo`
--

LOCK TABLES `gb_todo` WRITE;
/*!40000 ALTER TABLE `gb_todo` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_todo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_user`
--

DROP TABLE IF EXISTS `gb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_user`
--

LOCK TABLES `gb_user` WRITE;
/*!40000 ALTER TABLE `gb_user` DISABLE KEYS */;
INSERT INTO `gb_user` VALUES (1,'goalbookteam','827ccb0eea8a706c4c34a16891f84e7b','goalbook@example.com','9a24eff8c15a6a141ece27eb6947da0f','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),(2,'tremayne@example.com','827ccb0eea8a706c4c34a16891f84e7b','tremayne@example.com','9a24eff8c15a6a141ece27eb6947da0f','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),(3,'lindah@example.com','827ccb0eea8a706c4c34a16891f84e7b','lindah@example.com','9a24eff8c15a6a141ece27eb6947da0f','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),(4,'john@example.com','827ccb0eea8a706c4c34a16891f84e7b','john@example.com','9a24eff8c15a6a141ece27eb6947da0f','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),(5,'joyce@example.com','827ccb0eea8a706c4c34a16891f84e7b','joyce@example.com','9a24eff8c15a6a141ece27eb6947da0f','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),(6,'paul@example.com','827ccb0eea8a706c4c34a16891f84e7b','paul@example.com','9a24eff8c15a6a141ece27eb6947da0f','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),(7,'susan@example.com','827ccb0eea8a706c4c34a16891f84e7b','susan@example.com','9a24eff8c15a6a141ece27eb6947da0f','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),(8,'tagwireyip@gmail.com','fcea920f7412b5da7be0cf42b8c93759','tagwireyip@gmail.com','4822d1065415bf7033e24b09b1bd4279','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),(9,'s.georgiev.27@gmail.','7f307a13c39f73fdc18a11ef01e05661','s.georgiev.27@gmail.com','76a3359cd73bbbc28bc58a48e0ff8131','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),(10,'joey.pedicini@gmail.','81dc9bdb52d04dc20036dbd8313ed055','joey.pedicini@gmail.com','bb3f5bfb11cafdfe0a294b4769858c87','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),(11,'mnakhaleh@gmail.com','742929dcb631403d7c1c1efad2ca2700','mnakhaleh@gmail.com','92cc9a607305148f209a958808426a82','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),(12,'edwardamin13@yahoo.c','f0c8b4ed2d4700a2723e84363d9a4a3d','edwardamin13@yahoo.com','59a2dca520551ee9da3a0e806b7c2423','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1),(13,'testing@testing.com','098f6bcd4621d373cade4e832627b4f6','testing@testing.com','8b6dddd8bd6e39cbdf5e049953224e35','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1);
/*!40000 ALTER TABLE `gb_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_weblink`
--

DROP TABLE IF EXISTS `gb_weblink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_weblink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(1000) NOT NULL,
  `title` varchar(250) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `description` varchar(500) NOT NULL DEFAULT '',
  `importance` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `weblink_creator_id` (`creator_id`),
  CONSTRAINT `weblink_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_weblink`
--

LOCK TABLES `gb_weblink` WRITE;
/*!40000 ALTER TABLE `gb_weblink` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_weblink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rights`
--

DROP TABLE IF EXISTS `rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rights`
--

LOCK TABLES `rights` WRITE;
/*!40000 ALTER TABLE `rights` DISABLE KEYS */;
/*!40000 ALTER TABLE `rights` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-03  5:04:17