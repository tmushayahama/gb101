DROP USER 'gb'@'localhost';
CREATE USER 'gb'@'localhost' IDENTIFIED BY 'goal++';
DROP DATABASE IF EXISTS goalbook;
CREATE DATABASE goalbook DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
GRANT ALL PRIVILEGES ON goalbook.* to 'gb'@'localhost' WITH GRANT OPTION;
USE goalbook;

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
-- Table structure for table `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AuthItemchild`
--

CREATE TABLE IF NOT EXISTS `AuthItemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `gb_announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `announcer_id` int(11) NOT NULL,
  `receiver_id` int(11),
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gb_announcement_announcer_id` (`announcer_id`),
  KEY `gb_announcement_receiver_id` (`receiver_id`),
  CONSTRAINT `gb_announcement_announcer_id` FOREIGN KEY (`announcer_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gb_announcement_receiver_id` FOREIGN KEY (`receiver_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
  `description` varchar(1000) NOT NULL DEFAULT '',
  `created_date` datetime NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gb_discussion_title_id` (`title_id`),
  KEY `gb_discussion_creator_id` (`creator_id`),
  CONSTRAINT `gb_discussion_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gb_discussion_title_id` FOREIGN KEY (`title_id`) REFERENCES `gb_discussion_title` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_discussion_title`
--

DROP TABLE IF EXISTS `gb_discussion_title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_discussion_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gb_discussion_title_goal_id` (`goal_id`),
  KEY `gb_discussion_title_creator_id` (`creator_id`),
  CONSTRAINT `gb_discussion_title_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gb_discussion_title_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_goal_assignment`
--

DROP TABLE IF EXISTS `gb_goal_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal_assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assigner_id` int(11) NOT NULL,
  `assignee_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `connection_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_assignment_assigner_id` (`assigner_id`),
  KEY `goal_assignment_assignee_id` (`assignee_id`),
  KEY `goal_assignment_goal_id` (`goal_id`),
  KEY `goal_assignment_goal_connection_id` (`connection_id`),
  CONSTRAINT `goal_assignment_assignee_id` FOREIGN KEY (`assignee_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_assignment_assigner_id` FOREIGN KEY (`assigner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_assignment_goal_connection_id` FOREIGN KEY (`connection_id`) REFERENCES `gb_connection` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_assignment_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_goal_challenge`
--

DROP TABLE IF EXISTS `gb_goal_challenge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal_challenge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assigner_id` int(11) NOT NULL,
  `challenger_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `connection_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_challenge_assigner_id` (`assigner_id`),
  KEY `goal_challenge_assignee_id` (`challenger_id`),
  KEY `goal_challenge_goal_id` (`goal_id`),
  KEY `goal_challenge_goal_connection_id` (`connection_id`),
  CONSTRAINT `goal_challenge_assignee_id` FOREIGN KEY (`challenger_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_challenge_assigner_id` FOREIGN KEY (`assigner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_challenge_goal_connection_id` FOREIGN KEY (`connection_id`) REFERENCES `gb_connection` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_challenge_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_goal_level`
--

DROP TABLE IF EXISTS `gb_goal_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_category` varchar(50) NOT NULL,
  `level_name` varchar(50) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
  `goal_level_id` int(11) NOT NULL DEFAULT '1',
  `list_bank_parent_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `goal_list_user_id` (`user_id`),
  KEY `goal_list_goal_id` (`goal_id`),
  KEY `goal_list_level_id` (`goal_level_id`),
  KEY `goal_list_list_bank_parent_id` (`list_bank_parent_id`),
  KEY `goal_list_type_id` (`type_id`),
  CONSTRAINT `goal_list_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_list_level_id` FOREIGN KEY (`goal_level_id`) REFERENCES `gb_goal_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_list_list_bank_parent_id` FOREIGN KEY (`list_bank_parent_id`) REFERENCES `gb_list_bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_list_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_goal_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_list_user_id` FOREIGN KEY (`user_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_goal_list_mentor`
--

DROP TABLE IF EXISTS `gb_goal_list_mentor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal_list_mentor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal_list_id` int(11) NOT NULL,
  `mentor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_goal_mentor_goal_list_id` (`goal_list_id`),
  KEY `goal_goal_mentor_goal_mentor_id` (`mentor_id`),
  CONSTRAINT `goal_goal_mentor_goal_list_id` FOREIGN KEY (`goal_list_id`) REFERENCES `gb_goal_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_goal_mentor_goal_mentor_id` FOREIGN KEY (`mentor_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_goal_list_mentor`
--

LOCK TABLES `gb_goal_list_mentor` WRITE;
/*!40000 ALTER TABLE `gb_goal_list_mentor` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_goal_list_mentor` ENABLE KEYS */;
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
  `connection_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_goal_goal_list_id` (`goal_list_id`),
  KEY `goal_goal_goal_list_connection_id` (`connection_id`),
  CONSTRAINT `goal_goal_goal_list_connection_id` FOREIGN KEY (`connection_id`) REFERENCES `gb_connection` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_goal_goal_list_id` FOREIGN KEY (`goal_list_id`) REFERENCES `gb_goal_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
--
-- Table structure for table `gb_goal_page`
--

DROP TABLE IF EXISTS `gb_goal_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `subgoal_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_page_page_id` (`page_id`),
  KEY `goal_page_goal_id` (`goal_id`),
  KEY `goal_page_subgoal_id` (`subgoal_id`),
  CONSTRAINT `goal_page_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_page_page_id` FOREIGN KEY (`page_id`) REFERENCES `gb_page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_page_subgoal_id` FOREIGN KEY (`subgoal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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

--
-- Table structure for table `gb_goal_user_puntos`
--

DROP TABLE IF EXISTS `gb_goal_user_puntos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal_user_puntos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_user_puntos` (`user_id`),
  CONSTRAINT `goal_user_puntos` FOREIGN KEY (`user_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_goal_user_puntos`
--

LOCK TABLES `gb_goal_user_puntos` WRITE;
/*!40000 ALTER TABLE `gb_goal_user_puntos` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_goal_user_puntos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_goal_web_link`
--

DROP TABLE IF EXISTS `gb_goal_web_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal_web_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(1000) NOT NULL,
  `title` varchar(250) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL DEFAULT '',
  `importance` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `goal_web_link_creator_id` (`creator_id`),
  KEY `goal_web_link_goal_id` (`goal_id`),
  CONSTRAINT `goal_web_link_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_web_link_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_list_bank`
--

DROP TABLE IF EXISTS `gb_list_bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_list_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `subgoal` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `list_bank_type_id` (`type_id`),
  CONSTRAINT `list_bank_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_goal_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=720 DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_mentorship`
--

DROP TABLE IF EXISTS `gb_mentorship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT '',
  `mentoring_level` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_owner_id` (`owner_id`),
  KEY `mentorship_goal_id` (`goal_id`),
  CONSTRAINT `mentorship_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

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
--
-- Table structure for table `gb_mentorship_enrolled`
--

DROP TABLE IF EXISTS `gb_mentorship_enrolled`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship_enrolled` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mentee_id` int(11) NOT NULL,
  `mentorship_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_enrolled_mentee_id` (`mentee_id`),
  KEY `mentorship_enrolled_mentorship_id` (`mentorship_id`),
  CONSTRAINT `mentorship_enrolled_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_enrolled_mentee_id` FOREIGN KEY (`mentee_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_mentorship_enrolled`
--

LOCK TABLES `gb_mentorship_enrolled` WRITE;
/*!40000 ALTER TABLE `gb_mentorship_enrolled` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_mentorship_enrolled` ENABLE KEYS */;
UNLOCK TABLES;

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
  `goal_id` int(11) NOT NULL,
  `description` varchar(1000),
  `level` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_question_mentorship_id` (`mentorship_id`),
  KEY `mentorship_question_question_id` (`question_id`),
  KEY `mentorship_question_goal_id` (`goal_id`),
  CONSTRAINT `mentorship_question_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_question_question_id` FOREIGN KEY (`question_id`) REFERENCES `gb_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_question_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
-- Table structure for table `gb_message_receipient_goal`
--

DROP TABLE IF EXISTS `gb_message_receipient_goal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_message_receipient_goal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal_id` int(11) NOT NULL,
  `message_receipient_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gb_message_receipient_goal_id` (`goal_id`),
  KEY `gb_message_receipient_message_receipient_id` (`message_receipient_id`),
  CONSTRAINT `gb_message_receipient_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gb_message_receipient_message_receipient_id` FOREIGN KEY (`message_receipient_id`) REFERENCES `gb_message_receipient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_message_receipient_goal`
--

LOCK TABLES `gb_message_receipient_goal` WRITE;
/*!40000 ALTER TABLE `gb_message_receipient_goal` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_message_receipient_goal` ENABLE KEYS */;
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
  `description` varchar(1000) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_owner_id` (`owner_id`),
  CONSTRAINT `page_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `post_owner_id` (`owner_id`),
  CONSTRAINT `post_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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
CREATE TABLE `gb_question` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `question` varchar(200) not null,
    `description` varchar(1000) not null default "",
    `type` int not null default 0,
    `status` int not null default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_skill_academic`
--

DROP TABLE IF EXISTS `gb_skill_academic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_academic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT NULL,
  `school` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `extra_info` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `skill_academic_skill_id` (`skill_id`),
  CONSTRAINT `skill_academic_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_skill_academic`
--

LOCK TABLES `gb_skill_academic` WRITE;
/*!40000 ALTER TABLE `gb_skill_academic` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_skill_academic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gb_skill_job`
--

DROP TABLE IF EXISTS `gb_skill_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `extra_info` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `skill_job_skill_id` (`skill_id`),
  CONSTRAINT `skill_job_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gb_skill_job`
--

LOCK TABLES `gb_skill_job` WRITE;
/*!40000 ALTER TABLE `gb_skill_job` DISABLE KEYS */;
/*!40000 ALTER TABLE `gb_skill_job` ENABLE KEYS */;
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
-- Table structure for table `gb_todo`
--

DROP TABLE IF EXISTS `gb_todo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `todo` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `todo_creator_id` (`creator_id`),
  KEY `todo_category_id` (`category_id`),
  CONSTRAINT `todo_category_id` FOREIGN KEY (`category_id`) REFERENCES `gb_todo_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `todo_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_todo_category`
--

DROP TABLE IF EXISTS `gb_todo_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_todo_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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


-- ------------------Initial Users ------------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/User.txt' 
    into table goalbook.gb_user 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
    (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`);

-- ------------------Profile ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Profile.txt' 
    into table goalbook.gb_profile 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
   (`user_id`, `lastname`,  `firstname`, `specialty`, `avatar_url`, `favorite_quote`,`gender`, `birthdate`);

load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/GoalType.txt' 
    into table goalbook.gb_goal_type 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
     (`id`, `category`, `type`, `description`);

-- ----------------- Skill List Data
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/SkillBank.txt' 
    into table goalbook.gb_list_bank 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
    (`id`, `type_id`, `name`, `subgoal`, `description`);

-- -----------Goal Level ---------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/GoalLevel.txt' 
    into table goalbook.gb_goal_level 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
    (`id`, `level_category`,`level_name`, `description`);

-- ------------------Connection ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Connection.txt' 
    into table goalbook.gb_connection
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
    (`id`, `name`, `connection_picture`, `description`, `created_date`);

-- ------------------Connection Member----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/ConnectionMember.txt' 
    into table goalbook.gb_connection_member
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
    (`id`, `connection_id`, `connection_member_id_1`,`connection_member_id_2`, `added_date`, `privilege`, `status`);

-- ------------------Goal ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Goal.txt' 
    into table goalbook.gb_goal 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
    (`id`, `type_id`, `title`, `description`, `points_pledged`, `assign_date`, `begin_date`, `end_date`, `status`);
-- ------------------Goal Commitments ----------------
/*load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/GoalCommitment.txt' 
    into table goalbook.gb_goal_commitment 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
   (`id`, `owner_id`, `goal_id`);

-- ------------------Goal Commitment Share ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/GoalCommitmentShare.txt' 
    into table goalbook.gb_goal_commitment_share
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
   (`id`, `goal_commitment_id`,	`connection_id`);
*/

-- ------------------Goal Assignments ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/GoalAssignment.txt' 
    into table goalbook.gb_goal_assignment 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
   (`id`, `assigner_id`, `assignee_id`, `goal_id`, `connection_id`);

-- ------------------ Goal List ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/GoalList.txt' 
    into table goalbook.gb_goal_list 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
   (`id`, `type_id`, `user_id`, `goal_id`, `goal_level_id`, `list_bank_parent_id`, `status`);

-- ------------------ Goal List Share ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/GoalListShare.txt' 
    into table goalbook.gb_goal_list_share 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
   (`id`, `goal_list_id`, `connection_id`);


-- ------------------Todo Category ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/TodoCategory.txt' 
    into table goalbook.gb_todo_category 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
    (`id`, `category`);

-- ------------------ Todo ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Todo.txt' 
    into table goalbook.gb_todo 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
   (`id`, `todo`, `category_id`, `creator_id`);

-- ------------------ DiscussionTitle ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/DiscussionTitle.txt' 
    into table goalbook.gb_discussion_title 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`, `title`, `creator_id`, `goal_id`, `created_date`);

-- ------------------ Discussion ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Discussion.txt' 
    into table goalbook.gb_discussion 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`,`title_id`, `creator_id`, `description`,`created_date`, `importance`,`status`);

load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/GoalWebLink.txt' 
    into table goalbook.gb_goal_web_link 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`, `link`, `title`, `creator_id`, `goal_id`, `description`, `importance`, `status`);

-- ------------------ Page ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Page.txt' 
    into table goalbook.gb_page 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`, `owner_id`, `title`, `description`, `type`);

-- ------------------ GoalPage ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/GoalPage.txt' 
    into table goalbook.gb_goal_page 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`, `page_id`, `goal_id`, `subgoal_id`);

load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Mentorship.txt' 
    into table goalbook.gb_mentorship 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`, `owner_id`, `goal_id`, `title`, `description`, `mentoring_level`, `type`, `status`);

load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Post.txt' 
    into table goalbook.gb_post 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`, `owner_id`, `source_id`, `type`, `status`);

load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Question.txt' 
    into table goalbook.gb_question 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`, `question`, `description`, `type`, `status`);

