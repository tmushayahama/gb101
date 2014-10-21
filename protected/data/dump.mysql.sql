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

--
-- Table structure for table `gb_advice_page`
--
DROP TABLE IF EXISTS `gb_advice_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_advice_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subskills` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `skill_list_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `privacy` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `advice_page_page_id` (`page_id`),
  KEY `advice_page_skill_list_id` (`skill_list_id`),
  KEY `advice_page_level_id` (`level_id`),
  CONSTRAINT `advice_page_page_id` FOREIGN KEY (`page_id`) REFERENCES `gb_page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `advice_page_skill_list_id` FOREIGN KEY (`skill_list_id`) REFERENCES `gb_skill_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `advice_page_level_id` FOREIGN KEY (`level_id`) REFERENCES `gb_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_page_share`
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


--
-- Table structure for table `gb_advice_page`
--
DROP TABLE IF EXISTS `gb_advice_page_subskill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_advice_page_subskill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advice_page_id` int(11) NOT NULL,
  `subskill_list_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `advice_page_subskill_page_id` (`advice_page_id`),
  KEY `advice_page_subskill_subskill_list_id` (`subskill_list_id`),
  CONSTRAINT `advice_page_subskill_page_id` FOREIGN KEY (`advice_page_id`) REFERENCES `gb_advice_page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `advice_page_subskill_subskill_list_id` FOREIGN KEY (`subskill_list_id`) REFERENCES `gb_skill_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `gb_announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `announcer_id` int(11) NOT NULL,
  `receiver_id` int(11),
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT "",
  PRIMARY KEY (`id`),
  KEY `gb_announcement_announcer_id` (`announcer_id`),
  KEY `gb_announcement_receiver_id` (`receiver_id`),
  CONSTRAINT `gb_announcement_announcer_id` FOREIGN KEY (`announcer_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gb_announcement_receiver_id` FOREIGN KEY (`receiver_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_comment`
--

DROP TABLE IF EXISTS `gb_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_comment_id` int(11),
  `title` varchar(150) NOT NULL DEFAULT "",
  `creator_id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT "",
  `created_date` datetime NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gb_comment_creator_id` (`creator_id`),
  KEY `gb_comment_parent_comment_id` (`parent_comment_id`),
  CONSTRAINT `gb_comment_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gb_comment_parent_comment_id` FOREIGN KEY (`parent_comment_id`) REFERENCES `gb_comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `gb_discussion`
--

DROP TABLE IF EXISTS `gb_discussion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_discussion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_discussion_id` int(11),
  `title` varchar(150) NOT NULL DEFAULT "",
  `creator_id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT "",
  `created_date` datetime NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gb_discussion_creator_id` (`creator_id`),
  KEY `gb_discussion_parent_discussion_id` (`parent_discussion_id`),
  CONSTRAINT `gb_discussion_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gb_discussion_parent_discussion_id` FOREIGN KEY (`parent_discussion_id`) REFERENCES `gb_discussion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_skill`
--

DROP TABLE IF EXISTS `gb_hobby`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_hobby` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `hobby_skill_id` (`skill_id`),
  CONSTRAINT `hobby_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_hobby_list`
--

DROP TABLE IF EXISTS `gb_hobby_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_hobby_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hobby_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `list_bank_parent_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `privacy` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `hobby_list_user_id` (`user_id`),
  KEY `hobby_list_hobby_id` (`hobby_id`),
  KEY `hobby_list_level_id` (`level_id`),
  KEY `hobby_list_list_bank_parent_id` (`list_bank_parent_id`),
  CONSTRAINT `hobby_list_hobby_id` FOREIGN KEY (`hobby_id`) REFERENCES `gb_hobby` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hobby_list_level_id` FOREIGN KEY (`level_id`) REFERENCES `gb_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hobby_list_list_bank_parent_id` FOREIGN KEY (`list_bank_parent_id`) REFERENCES `gb_list_bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hobby_list_user_id` FOREIGN KEY (`user_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_hobby_list_share`
--

DROP TABLE IF EXISTS `gb_hobby_list_share`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_hobby_list_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hobby_list_id` int(11) NOT NULL,
  `shared_to_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `hobby_list_share_hobby_list_id` (`hobby_list_id`),
  KEY `hobby_list_share_shared_to_id` (`shared_to_id`),
  CONSTRAINT `hobby_list_share_hobby_list_id` FOREIGN KEY (`hobby_list_id`) REFERENCES `gb_hobby_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hobby_list_share_shared_to_id` FOREIGN KEY (`shared_to_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `gb_skill`
--

DROP TABLE IF EXISTS `gb_goal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500),
  `points_pledged` int(11) DEFAULT NULL,
  `assign_date` datetime NOT NULL,
  `begin_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `goal_type_id` (`type_id`),
  KEY `goal_skill_id` (`skill_id`),
  CONSTRAINT `goal_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_skill_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_goal_list`
--

DROP TABLE IF EXISTS `gb_goal_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_goal_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  CONSTRAINT `goal_list_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_list_level_id` FOREIGN KEY (`level_id`) REFERENCES `gb_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_list_list_bank_parent_id` FOREIGN KEY (`list_bank_parent_id`) REFERENCES `gb_list_bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `goal_list_user_id` FOREIGN KEY (`user_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_group`
--
DROP TABLE IF EXISTS `gb_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT "",
  `creator_id` int(11) NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `group_creator_id` (`creator_id`),
  KEY `group_level_id` (`level_id`),
  CONSTRAINT `group_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `group_level_id` FOREIGN KEY (`level_id`) REFERENCES `gb_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_skill`
--

DROP TABLE IF EXISTS `gb_journal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_journal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) NOT NULL,
  `skill_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `journal_creator_id` (`creator_id`),
  KEY `journal_level_id` (`level_id`),
  KEY `journal_skill_id` (`skill_id`),
  CONSTRAINT `journal_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `journal_level_id` FOREIGN KEY (`level_id`) REFERENCES `gb_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `journal_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_journal_share`
--
DROP TABLE IF EXISTS `gb_journal_share`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_journal_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_id` int(11) NOT NULL,
  `shared_to_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `journal_share_journal_id` (`journal_id`),
  KEY `journal_share_shared_to_id` (`shared_to_id`),
  CONSTRAINT `journal_share_journal_id` FOREIGN KEY (`journal_id`) REFERENCES `gb_journal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `journal_share_shared_to_id` FOREIGN KEY (`shared_to_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `gb_level`
--

DROP TABLE IF EXISTS `gb_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
  `subskill` varchar(200) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `owner_id` int(11) NOT NULL DEFAULT 0,
  `times_used` int(11) NOT NUll DEFAULT 0,
  `times_gained` int(11) NOT NULL DEFAULT 0,
  `times_learning` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `list_bank_type_id` (`type_id`),
  KEY `list_bank_owner_id` (`owner_id`),
 CONSTRAINT `list_bank_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `list_bank_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_skill_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_mentorship`
--
DROP TABLE IF EXISTS `gb_mentorship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_mentorship_id` int(11),
  `owner_id` int(11) NOT NULL,
  `mentor_id` int(11),
  `mentee_id` int(11),
  `skill_list_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `level_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_parent_mentorship_id` (`parent_mentorship_id`),
  KEY `mentorship_owner_id` (`owner_id`),
  KEY `mentorship_skill_list_id` (`skill_list_id`),
  KEY `mentorship_mentor_id` (`mentor_id`),
  KEY `mentorship_mentee_id` (`mentee_id`),
  KEY `mentorship_level_id` (`level_id`),
  CONSTRAINT `mentorship_parent_mentorship_id` FOREIGN KEY (`parent_mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_skill_list_id` FOREIGN KEY (`skill_list_id`) REFERENCES `gb_skill_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_level_id` FOREIGN KEY (`level_id`) REFERENCES `gb_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_mentor_id` FOREIGN KEY (`mentor_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_mentee_id` FOREIGN KEY (`mentee_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `gb_mentorship_announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship_announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `announcement_id` int(11) NOT NULL,
  `mentorship_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `privacy` int(11) NOT NULL DEFAULT '0',
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

DROP TABLE IF EXISTS `gb_mentorship_discussion_title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship_discussion_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `discussion_title_id` int(11) NOT NULL,
  `mentorship_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_discussion_title_discussion_title_id` (`discussion_title_id`),
  KEY `mentorship_discussion_title_mentorship_id` (`mentorship_id`),
  CONSTRAINT `mentorship_discussion_title_discussion_title_id` FOREIGN KEY (`discussion_title_id`) REFERENCES `gb_discussion_title` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_discussion_title_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `gb_mentorship_monitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship_monitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mentorship_id` int(11) NOT NULL,
  `monitor_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `type_id` int (11) NOT NULL DEFAULT '0',
  `privacy` int(11) NOT NULL DEFAULT '0',
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
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_question_mentorship_id` (`mentorship_id`),
  KEY `mentorship_question_question_id` (`question_id`),
  CONSTRAINT `mentorship_question_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_question_question_id` FOREIGN KEY (`question_id`) REFERENCES `gb_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `gb_mentorship_timeline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship_timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timeline_id` int(11) NOT NULL,  
  `mentorship_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_timeline_timeline_id` (`timeline_id`),
  KEY `mentorship_timeline_mentorship_id` (`mentorship_id`),
  CONSTRAINT `mentorship_timeline_timeline_id` FOREIGN KEY (`timeline_id`) REFERENCES `gb_timeline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_timeline_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `gb_mentorship_todo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_mentorship_todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `todo_id` int(11) NOT NULL,
  `mentorship_id` int(11) NOT NULL,
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_todo_todo_id` (`todo_id`),
  KEY `mentorship_todo_mentorship_id` (`mentorship_id`),
  CONSTRAINT `mentorship_todo_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_todo_todo_id` FOREIGN KEY (`todo_id`) REFERENCES `gb_todo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_weblink_weblink_id` (`weblink_id`),
  KEY `mentorship_weblink_mentorship_id` (`mentorship_id`),
  CONSTRAINT `mentorship_weblink_weblink_id` FOREIGN KEY (`weblink_id`) REFERENCES `gb_weblink` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mentorship_weblink_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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

--
-- Table structure for table `gb_note`
--
DROP TABLE IF EXISTS `gb_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_note_id` int(11),
  `title` varchar(150) NOT NULL DEFAULT "",
  `creator_id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT "",
  `created_date` datetime NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gb_note_creator_id` (`creator_id`),
  KEY `gb_note_parent_note_id` (`parent_note_id`),
  CONSTRAINT `gb_note_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gb_note_parent_note_id` FOREIGN KEY (`parent_note_id`) REFERENCES `gb_note` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_notification`
--

DROP TABLE IF EXISTS `gb_notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL DEFAULT '1',
  `source_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL DEFAULT '',
  `message` varchar(500) NOT NULL DEFAULT '',
  `type` int not null default 0,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `notification_sender_id` (`sender_id`),
  KEY `notification_recipient_id` (`recipient_id`),
  CONSTRAINT `notification_sender_id` FOREIGN KEY (`sender_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notification_recipient_id` FOREIGN KEY (`recipient_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `gb_project`
--
DROP TABLE IF EXISTS `gb_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT "",
  `creator_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `project_creator_id` (`creator_id`),
  CONSTRAINT `project_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_project_advice_page`
--
DROP TABLE IF EXISTS `gb_project_advice_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_project_advice_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advice_page_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT "",
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `project_advice_page_advice_page_id` (`advice_page_id`),
  KEY `project_advice_page_project_id` (`project_id`),
  CONSTRAINT `project_advice_page_advice_page_id` FOREIGN KEY (`advice_page_id`) REFERENCES `gb_advice_page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `project_advice_page_project_id` FOREIGN KEY (`project_id`) REFERENCES `gb_project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_project_member`
--
DROP TABLE IF EXISTS `gb_project_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_project_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `inviter_id` int(11),
  `acceptee_id` int(11),
  `project_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT "",
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `project_member_member_id` (`member_id`),
  KEY `project_member_inviter_id` (`inviter_id`),
  KEY `project_member_acceptee_id` (`acceptee_id`),
  KEY `project_member_project_id` (`project_id`),
  CONSTRAINT `project_member_member_id` FOREIGN KEY (`member_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `project_member_inviter_id` FOREIGN KEY (`inviter_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `project_member_acceptee_id` FOREIGN KEY (`acceptee_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `project_member_project_id` FOREIGN KEY (`project_id`) REFERENCES `gb_project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `gb_project_mentorship`
--
DROP TABLE IF EXISTS `gb_project_mentorship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_project_mentorship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mentorship_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT "",
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `project_mentorship_mentorship_id` (`mentorship_id`),
  KEY `project_mentorship_project_id` (`project_id`),
  CONSTRAINT `project_mentorship_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `project_mentorship_project_id` FOREIGN KEY (`project_id`) REFERENCES `gb_project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `gb_project_skill`
--
DROP TABLE IF EXISTS `gb_project_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_project_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT "",
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `project_skill_skill_id` (`skill_id`),
  KEY `project_skill_project_id` (`project_id`),
  CONSTRAINT `project_skill_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `project_skill_project_id` FOREIGN KEY (`project_id`) REFERENCES `gb_project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `gb_project_task`
--
DROP TABLE IF EXISTS `gb_project_task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_project_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT "",
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `project_task_task_id` (`task_id`),
  KEY `project_task_project_id` (`project_id`),
  CONSTRAINT `project_task_task_id` FOREIGN KEY (`task_id`) REFERENCES `gb_task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `project_task_project_id` FOREIGN KEY (`project_id`) REFERENCES `gb_project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_skill`
--

DROP TABLE IF EXISTS `gb_promise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_promise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `points_pledged` int(11) DEFAULT NULL,
  `assign_date` datetime NOT NULL,
  `begin_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `promise_type_id` (`type_id`),
  KEY `promise_skill_id` (`skill_id`),
  CONSTRAINT `promise_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_skill_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `promise_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_promise_list`
--

DROP TABLE IF EXISTS `gb_promise_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_promise_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `promise_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `list_bank_parent_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `privacy` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `promise_list_user_id` (`user_id`),
  KEY `promise_list_promise_id` (`promise_id`),
  KEY `promise_list_level_id` (`level_id`),
  KEY `promise_list_list_bank_parent_id` (`list_bank_parent_id`),
  CONSTRAINT `promise_list_promise_id` FOREIGN KEY (`promise_id`) REFERENCES `gb_promise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `promise_list_level_id` FOREIGN KEY (`level_id`) REFERENCES `gb_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `promise_list_list_bank_parent_id` FOREIGN KEY (`list_bank_parent_id`) REFERENCES `gb_list_bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `promise_list_user_id` FOREIGN KEY (`user_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_promise_list_share`
--
DROP TABLE IF EXISTS `gb_promise_list_share`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_promise_list_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `promise_list_id` int(11) NOT NULL,
  `shared_to_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `promise_list_share_promise_list_id` (`promise_list_id`),
  KEY `promise_list_share_shared_to_id` (`shared_to_id`),
  CONSTRAINT `promise_list_share_promise_list_id` FOREIGN KEY (`promise_list_id`) REFERENCES `gb_promise_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `promise_list_share_shared_to_id` FOREIGN KEY (`shared_to_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `gb_question_answer`
--

DROP TABLE IF EXISTS `gb_question_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_question_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_question_answer_id` int(11),
  `title` varchar(150) NOT NULL DEFAULT "",
  `creator_id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT "",
  `created_date` datetime,
  `type` int not null DEFAULT "0",
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gb_question_answer_creator_id` (`creator_id`),
  KEY `gb_question_answer_parent_question_answer_id` (`parent_question_answer_id`),
  CONSTRAINT `gb_question_answer_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gb_question_answer_parent_question_answer_id` FOREIGN KEY (`parent_question_answer_id`) REFERENCES `gb_question_answer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `gb_skill`
--

DROP TABLE IF EXISTS `gb_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill` (
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
  KEY `skill_type_id` (`type_id`),
  CONSTRAINT `skill_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_skill_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `gb_skill_anouncement`
--
DROP TABLE IF EXISTS `gb_skill_announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `announcement_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `skill_announcement_announcement_id` (`announcement_id`),
  KEY `skill_announcement_skill_id` (`skill_id`),
  CONSTRAINT `skill_announcement_announcement_id` FOREIGN KEY (`announcement_id`) REFERENCES `gb_announcement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_announcement_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `gb_skill_question_answer`
--
DROP TABLE IF EXISTS `gb_skill_question_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_question_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_answer_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `skill_question_answer_question_answer_id` (`question_answer_id`),
  KEY `skill_question_answer_skill_id` (`skill_id`),
  CONSTRAINT `skill_question_answer_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_question_answer_question_answer_id` FOREIGN KEY (`question_answer_id`) REFERENCES `gb_question_answer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `gb_skill_comment`
--
DROP TABLE IF EXISTS `gb_skill_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `skill_comment_comment_id` (`comment_id`),
  KEY `skill_comment_skill_id` (`skill_id`),
  CONSTRAINT `skill_comment_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_comment_comment_id` FOREIGN KEY (`comment_id`) REFERENCES `gb_comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `gb_skill_discussion`
--
DROP TABLE IF EXISTS `gb_skill_discussion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_discussion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `discussion_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `skill_discussion_discussion_id` (`discussion_id`),
  KEY `skill_discussion_skill_id` (`skill_id`),
  CONSTRAINT `skill_discussion_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_discussion_discussion_id` FOREIGN KEY (`discussion_id`) REFERENCES `gb_discussion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_skill_list`
--
DROP TABLE IF EXISTS `gb_skill_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `list_bank_parent_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `privacy` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `skill_list_owner_id` (`owner_id`),
  KEY `skill_list_skill_id` (`skill_id`),
  KEY `skill_list_level_id` (`level_id`),
  KEY `skill_list_list_bank_parent_id` (`list_bank_parent_id`),
  KEY `skill_list_type_id` (`type_id`),
  CONSTRAINT `skill_list_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_list_level_id` FOREIGN KEY (`level_id`) REFERENCES `gb_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_list_list_bank_parent_id` FOREIGN KEY (`list_bank_parent_id`) REFERENCES `gb_list_bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_list_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_skill_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_list_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `gb_skill_list_judge`
--
DROP TABLE IF EXISTS `gb_skill_list_judge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_list_judge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judge_id` int(11) NOT NULL,
  `skill_list_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `skill_list_judge_judge_id` (`judge_id`),
  KEY `skill_list_judge_skill_list_id` (`skill_list_id`),
  CONSTRAINT `skill_list_judge_skill_list_id` FOREIGN KEY (`skill_list_id`) REFERENCES `gb_skill_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_list_judge_judge_id` FOREIGN KEY (`judge_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_skill_list_share`
--
DROP TABLE IF EXISTS `gb_skill_list_share`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_list_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_list_id` int(11) NOT NULL,
  `shared_to_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `skill_list_share_skill_list_id` (`skill_list_id`),
  KEY `skill_list_share_shared_to_id` (`shared_to_id`),
  CONSTRAINT `skill_list_share_skill_list_id` FOREIGN KEY (`skill_list_id`) REFERENCES `gb_skill_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_list_share_shared_to_id` FOREIGN KEY (`shared_to_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_skill_list_observer`
--
DROP TABLE IF EXISTS `gb_skill_list_observer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_list_observer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `observer_id` int(11) NOT NULL,
  `skill_list_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `skill_list_observer_observer_id` (`observer_id`),
  KEY `skill_list_observer_skill_list_id` (`skill_list_id`),
  CONSTRAINT `skill_list_observer_skill_list_id` FOREIGN KEY (`skill_list_id`) REFERENCES `gb_skill_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_list_observer_observer_id` FOREIGN KEY (`observer_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `gb_skill_note`
--
DROP TABLE IF EXISTS `gb_skill_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `skill_note_note_id` (`note_id`),
  KEY `skill_note_skill_id` (`skill_id`),
  CONSTRAINT `skill_note_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_note_note_id` FOREIGN KEY (`note_id`) REFERENCES `gb_note` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_skill_timeline`
--
DROP TABLE IF EXISTS `gb_skill_timeline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timeline_id` int(11) NOT NULL,  
  `skill_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `skill_timeline_timeline_id` (`timeline_id`),
  KEY `skill_timeline_skill_id` (`skill_id`),
  CONSTRAINT `skill_timeline_timeline_id` FOREIGN KEY (`timeline_id`) REFERENCES `gb_timeline` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_timeline_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_skill_todo`
--
DROP TABLE IF EXISTS `gb_skill_todo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `todo_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `skill_todo_todo_id` (`todo_id`),
  KEY `skill_todo_skill_id` (`skill_id`),
  CONSTRAINT `skill_todo_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_todo_todo_id` FOREIGN KEY (`todo_id`) REFERENCES `gb_todo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_skill_weblink`
--
DROP TABLE IF EXISTS `gb_skill_weblink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_weblink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weblink_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `privacy` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `skill_weblink_weblink_id` (`weblink_id`),
  KEY `skill_weblink_skill_id` (`skill_id`),
  CONSTRAINT `skill_weblink_weblink_id` FOREIGN KEY (`weblink_id`) REFERENCES `gb_weblink` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_weblink_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






--
-- Table structure for table `gb_skill_tag`
--
DROP TABLE IF EXISTS `gb_skill_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT Null,
  `tag_id` int(11) NOT NULL,
  `tagger_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `skill_tag_skill_id` (`skill_id`),
  KEY `skill_tag_tag_id` (`tag_id`),
  KEY `skill_tag_tagger_id` (`tagger_id`),
  CONSTRAINT `skill_tag_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_tag_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `gb_tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `skill_tag_tagger_id` FOREIGN KEY (`tagger_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_skill_type`
--
DROP TABLE IF EXISTS `gb_skill_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_skill_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `gb_subskill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_subskill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT NULL,
  `subskill_id` int(11) NOT NULL,
  `type` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `subskill_skill_id` (`skill_id`),
  KEY `subskill_subskill_id` (`subskill_id`),
  CONSTRAINT `subskill_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subskill_subskill_id` FOREIGN KEY (`subskill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `gb_tag`
--
DROP TABLE IF EXISTS `gb_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(1000) NOT NULL,
  `type` int(11),
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_task`
--

DROP TABLE IF EXISTS `gb_task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task` varchar(100) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `type` int(11),
  `description` varchar(1000) NOT NULL DEFAULT "",
   PRIMARY KEY (`id`),
   KEY `task_skill_id` (`skill_id`),
   CONSTRAINT `task_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `gb_timeline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_timeline` (
    `id` integer AUTO_INCREMENT NOT NULL,
    `title` varchar(200) not null,
    `description` varchar(1000) not null default "",
    `creator_id` int(11) NOT NULL,
    `type` int not null default 0,
    `status` int not null default 0,
    PRIMARY KEY (`id`),
    KEY `timeline_creator_id` (`creator_id`),
    CONSTRAINT `timeline_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_todo`
--
DROP TABLE IF EXISTS `gb_todo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_todo_id` int(11),
  `priority_id` int(11),
  `creator_id` int(11) NOT NULL,
  `assignee_id` int(11),
  `created_date` datetime NOT NULL,
  `due_date` datetime,
  `title` varchar(200) NOT NULL DEFAULT "",
  `todo_color` varchar(6) NOT NULL DEFAULT "FFFFFF",
  `description` varchar(1000) NOT NULL DEFAULT "",
  PRIMARY KEY (`id`),
  KEY `todo_parent_todo_id` (`parent_todo_id`),
  KEY `todo_creator_id` (`creator_id`),
  KEY `todo_assignee_id` (`assignee_id`),
  KEY `todo_priority_id` (`priority_id`),
  CONSTRAINT `todo_parent_todo_id` FOREIGN KEY (`parent_todo_id`) REFERENCES `gb_todo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `todo_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `todo_assignee_id` FOREIGN KEY (`assignee_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `todo_priority_id` FOREIGN KEY (`priority_id`) REFERENCES `gb_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gb_weblink`
--

DROP TABLE IF EXISTS `gb_weblink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gb_weblink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_weblink_id` int(11),
  `link` varchar(1000) NOT NULL,
  `title` varchar(150) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT "",
  `created_date` datetime NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gb_weblink_creator_id` (`creator_id`),
  KEY `gb_weblink_parent_weblink_id` (`parent_weblink_id`),
  CONSTRAINT `gb_weblink_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gb_weblink_parent_weblink_id` FOREIGN KEY (`parent_weblink_id`) REFERENCES `gb_weblink` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
   (`user_id`, `lastname`,  `firstname`, `specialty`, `avatar_url`, `favorite_quote`,`gender`, `birthdate`, `address`);

load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/SkillType.txt' 
    into table goalbook.gb_skill_type 
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
    (`id`, `type_id`, `name`, `subskill`, `description`, `owner_id`, `times_used`, `times_gained`, `times_learning`);

-- ----------- Level ---------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Level.txt' 
    into table goalbook.gb_level 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
    (`id`, `category`, `code`, `name`, `description`);

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

-- ------------------Skill ----------------
/*load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Skill.txt' 
    into table goalbook.gb_skill 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
    (`id`, `type_id`, `title`, `description`, `points_pledged`, `assign_date`, `begin_date`, `end_date`, `status`);
-- ------------------Skill Commitments ----------------
/*load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/SkillCommitment.txt' 
    into table goalbook.gb_skill_commitment 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
   (`id`, `owner_id`, `skill_id`);

-- ------------------Skill Commitment Share ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/SkillCommitmentShare.txt' 
    into table goalbook.gb_skill_commitment_share
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
   (`id`, `skill_commitment_id`,	`connection_id`);


-- ------------------Skill Assignments ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/SkillAssignment.txt' 
    into table goalbook.gb_skill_assignment 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
   (`id`, `creator_id`, `assignee_id`, `skill_id`, `connection_id`);

-- ------------------ Skill List ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/SkillList.txt' 
    into table goalbook.gb_skill_list 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
   (`id`, `type_id`, `user_id`, `skill_id`, `level_id`, `list_bank_parent_id`, `status`, `order`);

-- ------------------ Skill List Share ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/SkillListShare.txt' 
    into table goalbook.gb_skill_list_share 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
   (`id`, `skill_list_id`, `connection_id`);


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
/* load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Todo.txt' 
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
  (`id`, `title`, `creator_id`, `skill_id`, `created_date`);

-- ------------------ Discussion ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Discussion.txt' 
    into table goalbook.gb_discussion 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`,`title_id`, `creator_id`, `description`,`created_date`, `importance`,`status`);

load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/SkillWeblink.txt' 
    into table goalbook.gb_skill_weblink 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`, `link`, `title`, `creator_id`, `skill_id`, `description`, `importance`, `status`);

-- ------------------ Page ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Page.txt' 
    into table goalbook.gb_page 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`, `owner_id`, `title`, `description`, `type`);

-- ------------------ SkillPage ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/AdvicePage.txt' 
    into table goalbook.gb_advice_page 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`, `subskills`, `page_id`, `skill_id`, `level_id`);

load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Mentorship.txt' 
    into table goalbook.gb_mentorship 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`, `owner_id`, `skill_id`, `level_id`, `title`, `description`, `type`, `status`);

load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Post.txt' 
    into table goalbook.gb_post 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`, `owner_id`, `source_id`, `type`, `status`);
*/

load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Question.txt' 
    into table goalbook.gb_question_answer 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`, `parent_question_answer_id`, `creator_id`, `description`, `type`, `status`);
