-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2014 at 03:44 AM
-- Server version: 5.5.33-31.1
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tmtrigga_ss101`
--
DROP DATABASE IF EXISTS tmtrigga_ss101;
CREATE DATABASE tmtrigga_ss101 DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
GRANT ALL PRIVILEGES ON tmtrigga_ss101.* to 'tmtrigga_gb' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON tmtrigga_ss101.* to 'tmtrigga' WITH GRANT OPTION;
USE `tmtrigga_ss101`;

-- --------------------------------------------------------

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

-- --------------------------------------------------------

--
-- Table structure for table `gb_action`
--

CREATE TABLE IF NOT EXISTS `gb_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gb_connection`
--

CREATE TABLE IF NOT EXISTS `gb_connection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `connection_picture` varchar(50) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gb_connection`
--

INSERT INTO `gb_connection` (`id`, `name`, `connection_picture`, `description`, `created_date`) VALUES
(1, 'Connections', 'gb_connections.png', 'All my connections.', '0000-00-00 00:00:00'),
(2, 'Friends', 'gb_friends.png', 'Right friends.', '0000-00-00 00:00:00'),
(3, 'Family', 'gb_family.png', 'Your family members.', '0000-00-00 00:00:00'),
(4, 'Followers', 'gb_followers.png', 'Your followers.', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gb_connection_member`
--

CREATE TABLE IF NOT EXISTS `gb_connection_member` (
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
  KEY `connection_member_connection_id` (`connection_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `gb_connection_member`
--

INSERT INTO `gb_connection_member` (`id`, `connection_id`, `connection_member_id_1`, `connection_member_id_2`, `added_date`, `privilege`, `status`) VALUES
(1, 1, 5, 2, '2014-01-14 00:00:00', 1, 1),
(2, 1, 2, 5, '2014-01-14 00:00:00', 1, 1),
(3, 2, 5, 2, '2014-01-14 00:00:00', 1, 1),
(4, 2, 2, 5, '2014-01-14 00:00:00', 1, 1),
(5, 3, 6, 2, '2014-01-15 00:00:00', 1, 1),
(6, 3, 2, 6, '2014-01-15 00:00:00', 1, 1),
(7, 1, 3, 2, '2014-01-15 00:00:00', 1, 1),
(8, 1, 2, 3, '2014-01-15 00:00:00', 1, 1),
(9, 2, 3, 2, '2014-01-15 00:00:00', 1, 1),
(10, 2, 2, 3, '2014-01-15 00:00:00', 1, 1),
(11, 3, 4, 2, '2014-01-15 00:00:00', 1, 1),
(12, 3, 2, 4, '2014-01-15 00:00:00', 1, 1),
(13, 3, 7, 2, '2014-01-15 00:00:00', 1, 1),
(14, 3, 2, 7, '2014-01-15 00:00:00', 1, 1),
(15, 3, 5, 2, '2014-01-15 00:00:00', 1, 1),
(16, 3, 2, 5, '2014-01-15 00:00:00', 1, 1),
(17, 2, 5, 4, '2014-03-12 00:00:00', 1, 0),
(18, 2, 4, 5, '2014-03-12 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gb_discussion`
--

CREATE TABLE IF NOT EXISTS `gb_discussion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT '',
  `created_date` datetime NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gb_discussion_title_id` (`title_id`),
  KEY `gb_discussion_creator_id` (`creator_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gb_discussion`
--

INSERT INTO `gb_discussion` (`id`, `title_id`, `creator_id`, `description`, `created_date`, `importance`, `status`) VALUES
(1, 2, 6, 'Oh yeah, who doesn''t like food.', '2014-01-14 00:00:00', 1, 0),
(2, 2, 3, 'Yes, but think of how you invite her first.', '2014-01-14 00:00:00', 1, 0),
(3, 2, 4, 'No, if a lady likes you whatever you do will impress her.', '2014-01-14 00:00:00', 1, 0),
(5, 2, 2, 'The invite details are already planned.', '2014-01-14 00:00:00', 1, 0),
(6, 3, 3, 'In brief, I cooked and she cancelled.', '2014-01-14 00:00:00', 1, 0),
(7, 3, 2, 'Always have a back up plan, back up plan. Someone I know wanted to surprise a lady and decided to cook for her before asking what she wants . He went ahead and cooked the best chicken ever. However, the lady was  becoming a vegetarian. ', '2014-01-14 00:00:00', 1, 0),
(8, 4, 6, 'I found so many interesting things rather than simple search. Try putting any math like 1+6 as a search term..', '2014-01-15 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gb_discussion_title`
--

CREATE TABLE IF NOT EXISTS `gb_discussion_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gb_discussion_title_goal_id` (`goal_id`),
  KEY `gb_discussion_title_creator_id` (`creator_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gb_discussion_title`
--

INSERT INTO `gb_discussion_title` (`id`, `title`, `creator_id`, `goal_id`, `created_date`) VALUES
(1, 'First Steps', 1, 23, '2014-01-14 00:00:00'),
(2, 'Is it a good way to impress? ', 2, 23, '2014-01-14 00:00:00'),
(3, 'Just curious, anyone please share if you had a bad experience. ', 3, 23, '2014-01-14 00:00:00'),
(4, 'Has anyone ever used the advanced search tab before?', 6, 26, '2014-01-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gb_goal`
--

CREATE TABLE IF NOT EXISTS `gb_goal` (
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
  KEY `goal_type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `gb_goal`
--

INSERT INTO `gb_goal` (`id`, `type_id`, `title`, `description`, `points_pledged`, `assign_date`, `begin_date`, `end_date`, `status`) VALUES
(1, 5, 'Goalbook Setup', 'Make a random list of goals you want to accomplish', 20, '0001-01-01 00:00:00', '0001-01-01 00:00:00', '0001-01-01 00:00:00', 0),
(2, 5, 'Goalbook Setup', 'Write an encouraging quote on your profile', 3, '0001-01-01 00:00:00', '0001-01-01 00:00:00', '0001-01-01 00:00:00', 0),
(3, 5, 'Goalbook Setup', 'Learn the acronym S.M.A.R.T.', 20, '0001-01-01 00:00:00', '0001-01-01 00:00:00', '0001-01-01 00:00:00', 0),
(4, 5, 'Goalbook Setup', 'Finish your profile', 30, '0001-01-01 00:00:00', '0001-01-01 00:00:00', '0001-01-01 00:00:00', 0),
(5, 2, 'Goalbook Setup', 'Add at least 20 people to your connections', 5, '0001-01-01 00:00:00', '0001-01-01 00:00:00', '0001-01-01 00:00:00', 0),
(6, 3, 'Adventurous', 'Being creative when going out.', 0, '2014-01-02 00:00:00', '0001-01-01 00:00:01', '0001-01-01 00:00:01', 1),
(7, NULL, 'Advising People', 'Want to improve on how I communicate with others. Not to overwhelm them when giving them advice.', 0, '2014-01-02 00:00:00', '0001-01-01 00:00:02', '0001-01-01 00:00:02', 1),
(8, NULL, 'Artistic - Drawing', 'I used to like drawing with pencil and paper but somehow stopped.', 10, '2014-01-02 00:00:01', '0001-01-01 00:00:03', '0001-01-01 00:00:03', 1),
(9, NULL, 'Communication - My Accent', 'Improve how I speak English. Having more American accent', 10, '2014-01-02 00:00:02', '0001-01-01 00:00:04', '0001-01-01 00:00:04', 1),
(10, NULL, 'Communication - Speaking Clearly', 'Speaking clearly slowly and audible. Sometimes people have some hard times understanding me.', 10, '2014-01-02 00:00:03', '0001-01-01 00:00:05', '0001-01-01 00:00:05', 1),
(11, NULL, 'Design', 'Web Designing using simpe tools. i.e. MS Word, MS Powerpoint, MS Visio .', 10, '2014-01-02 00:00:04', '0001-01-01 00:00:06', '0001-01-01 00:00:06', 1),
(12, NULL, 'Games - Boggle', 'It is an intersting game to learn because it will improve my vocabulary.', 10, '2014-01-02 00:00:05', '0001-01-01 00:00:07', '0001-01-01 00:00:07', 1),
(13, NULL, 'Games - Chess', 'I am not a grandmaster, but for now I am comfortable where I stand. ', 10, '2014-01-02 00:00:06', '0001-01-01 00:00:08', '0001-01-01 00:00:08', 1),
(14, 1, 'Handling a job Interview', 'Sometimes gets nervous for no reason. Then not selling my skills correctly.', 10, '2014-01-02 00:00:07', '0001-01-01 00:00:09', '0001-01-01 00:00:09', 1),
(15, NULL, 'Swim', 'I can''t imagine that I don''t know how to swim. I will have my own yart soon haha.', 10, '2014-01-02 00:00:08', '0001-01-01 00:00:10', '0001-01-01 00:00:10', 1),
(16, NULL, 'Tell a Story that Captivates People''s Attention', 'Everyone has a cool story to tell, but have to work on the delivery and right audience.', 10, '2014-01-02 00:00:09', '0001-01-01 00:00:11', '0001-01-01 00:00:11', 1),
(17, NULL, 'Using Google efficiently', 'Basically I need to learn more vocabulary. I sometimes waste lots of time trying to find simple thing.', 10, '2014-01-02 00:00:10', '0001-01-01 00:00:12', '0001-01-01 00:00:12', 1),
(18, NULL, 'Working with others', 'I think I have gained some experience of being a good teammate. Open to new ideas from another teammate is the best thing of how to learn.', 10, '2014-01-02 00:00:11', '0001-01-01 00:00:13', '0001-01-01 00:00:13', 1),
(19, NULL, 'Achieved', 'I like to hear this word. Makes me work hard.', 0, '2014-01-02 00:00:12', '0001-01-01 00:00:14', '0001-01-01 00:00:14', 1),
(20, NULL, 'Initiated', 'This word makes wanna get involved and being a leader.', 0, '2014-01-02 00:00:13', '0001-01-01 00:00:15', '0001-01-01 00:00:15', 1),
(21, NULL, 'Compiled', 'Every programmed wanna hear this.', 0, '2014-01-02 00:00:14', '0001-01-01 00:00:16', '0001-01-01 00:00:16', 1),
(22, NULL, 'Mentored', 'I have mentored someone before and have been mentored. Looks good on resume.', 0, '2014-01-02 00:00:15', '0001-01-01 00:00:17', '0001-01-01 00:00:17', 1),
(23, 2, 'Cooking a big meal', 'At least invite a lady for a 3 course meal for dinner ', 15, '2014-01-02 00:00:16', '0001-01-01 00:00:18', '0001-01-01 00:00:18', 1),
(24, 9, 'Tracking Acomplishments ', 'I want to start see what I am good at and what I need to improve. This is a self motivation when I want to learn something new which is difficult. ', 14, '2014-01-14 00:00:00', '2014-01-30 00:00:00', '2014-01-31 00:00:00', 0),
(25, NULL, 'Speak English fluently', 'Somehow I want to express my point in English without any difficulties. Especially in team environment situation.', NULL, '2014-01-14 00:00:00', NULL, NULL, 1),
(26, 1, 'Use Google Efficiently', 'If I don''t find anything, I call my son. Things like when my YouTube volume is giving me troubles.', NULL, '2014-01-15 00:00:00', '2014-01-15 00:00:00', '2021-01-28 00:00:00', 0),
(27, NULL, 'to be an excellent software engineer', '', NULL, '0000-00-00 00:00:00', NULL, NULL, 0),
(28, NULL, 'Curiosity', 'If you are curious to know how a function is implemnted the way it is. ', NULL, '0000-00-00 00:00:00', NULL, NULL, 0),
(29, NULL, 'Teamwork', 'Prepare yourself to work with other software engineers. You might need to start learn how to communicate well with others , How to convey your idea, how to  solve disputes', NULL, '0000-00-00 00:00:00', NULL, NULL, 0),
(30, NULL, 'Teach Yourself Things', 'In college, if you just rely on class activities without doing your own project then you are striving for disaster. Technology is moving so fast and you need to learn some staff quic', NULL, '0000-00-00 00:00:00', NULL, NULL, 0),
(31, NULL, 'Cooking Healthy Foods', 'I just enjoy cooking food vegetables. I am not a vegetarian but I like to watch my diet.', NULL, '2014-01-24 00:00:00', NULL, NULL, 1),
(32, NULL, 'having good eating habits', '', NULL, '0000-00-00 00:00:00', NULL, NULL, 0),
(33, NULL, 'Always eat breakfast', 'You need fuel to start your day and coffee is not enough. Have a good healthy breakfast that is full of protein and high-fiber foods like eggs with whole-wheat toast.', NULL, '0000-00-00 00:00:00', NULL, NULL, 0),
(34, NULL, 'Web Design and Development ', 'I have heard of this MVC architecture, I am interested in any language, but would prefer PHP.', NULL, '2014-02-05 00:00:00', NULL, NULL, 1),
(35, NULL, 'Using Yii, a php MVC Framework.', 'I have programmed this website in Yii, ', NULL, '2014-02-05 00:00:00', NULL, NULL, 1),
(36, NULL, 'to be a good web designer.', '', NULL, '0000-00-00 00:00:00', NULL, NULL, 0),
(37, NULL, 'Be simple, unique and yet stick to some standards', 'You have to stand out, therefore your design should be unique. However, don''t make a mistake of not sticking to some standards. Standards makes user navigate through your website without much/any training.', NULL, '0000-00-00 00:00:00', NULL, NULL, 0),
(38, NULL, 'Use any tools and libraries out there', 'Sometimes you want to code faster or not reinventing the wheel. Many free libraries can make your life easier, i.e. jQuery, Bootstrap. ', NULL, '0000-00-00 00:00:00', NULL, NULL, 0),
(39, NULL, 'Use MVC framework', 'You might have started web development long back before MVC. These days MVC is becoming popular. It has so many benefit such as code reusability, separation of concerns, faster development.', NULL, '0000-00-00 00:00:00', NULL, NULL, 0),
(40, NULL, 'Use Color Template and ger feedback from an expect designer', 'A color scheme will help your website be simple and clean and easy for a user to see what they want. Don''t make for example 5 different colors for a cancel button.', NULL, '0000-00-00 00:00:00', NULL, NULL, 0),
(41, NULL, 'Test', '', NULL, '2014-02-05 00:00:00', NULL, NULL, 1),
(42, NULL, 'advice for pre cse', 'vgbgtbgtb', NULL, '2014-02-07 00:00:00', NULL, NULL, 1),
(43, NULL, 'advice cse', 'vgvgvbtg', NULL, '2014-02-07 00:00:00', NULL, NULL, 1),
(44, NULL, '', '', NULL, '2014-03-13 00:00:00', NULL, NULL, 1),
(45, NULL, '', '', NULL, '2014-03-13 00:00:00', NULL, NULL, 1),
(46, NULL, 'Add windshield washer fluid', '', NULL, '2014-03-13 00:00:00', NULL, NULL, 1),
(47, NULL, 'Add windshield washer fluid', '', NULL, '2014-03-13 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gb_goal_assignment`
--

CREATE TABLE IF NOT EXISTS `gb_goal_assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assigner_id` int(11) NOT NULL,
  `assignee_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `connection_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_assignment_assigner_id` (`assigner_id`),
  KEY `goal_assignment_assignee_id` (`assignee_id`),
  KEY `goal_assignment_goal_id` (`goal_id`),
  KEY `goal_assignment_goal_connection_id` (`connection_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gb_goal_assignment`
--

INSERT INTO `gb_goal_assignment` (`id`, `assigner_id`, `assignee_id`, `goal_id`, `connection_id`) VALUES
(1, 1, 2, 1, 1),
(2, 1, 2, 2, 1),
(3, 1, 2, 3, 1),
(4, 1, 2, 4, 1),
(5, 1, 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gb_goal_challenge`
--

CREATE TABLE IF NOT EXISTS `gb_goal_challenge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assigner_id` int(11) NOT NULL,
  `challenger_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `connection_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_challenge_assigner_id` (`assigner_id`),
  KEY `goal_challenge_assignee_id` (`challenger_id`),
  KEY `goal_challenge_goal_id` (`goal_id`),
  KEY `goal_challenge_goal_connection_id` (`connection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gb_goal_level`
--

CREATE TABLE IF NOT EXISTS `gb_goal_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_category` varchar(50) NOT NULL,
  `level_name` varchar(50) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gb_goal_level`
--

INSERT INTO `gb_goal_level` (`id`, `level_category`, `level_name`, `description`) VALUES
(1, 'skill', 'Skills Gained', NULL),
(2, 'skill', 'Skills To Learn', NULL),
(3, 'skill', 'Skills To Improve', NULL),
(4, 'skill', 'Words Of Action', NULL),
(5, 'goal', 'Goals Achieved', NULL),
(6, 'goal', 'Skills To Improve', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gb_goal_list`
--

CREATE TABLE IF NOT EXISTS `gb_goal_list` (
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
  KEY `goal_list_type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `gb_goal_list`
--

INSERT INTO `gb_goal_list` (`id`, `type_id`, `user_id`, `goal_id`, `goal_level_id`, `list_bank_parent_id`, `status`) VALUES
(1, 1, 2, 6, 2, NULL, 1),
(2, 1, 2, 7, 2, NULL, 1),
(3, 1, 2, 8, 4, NULL, 1),
(4, 1, 2, 9, 2, NULL, 1),
(5, 1, 2, 10, 2, NULL, 1),
(6, 1, 2, 11, 1, NULL, 1),
(7, 1, 2, 12, 4, NULL, 1),
(8, 1, 2, 13, 1, NULL, 1),
(9, 1, 2, 14, 2, NULL, 1),
(10, 1, 2, 15, 2, NULL, 1),
(11, 1, 2, 16, 2, NULL, 1),
(12, 1, 2, 17, 2, NULL, 1),
(13, 1, 2, 18, 1, NULL, 1),
(14, 1, 2, 19, 4, NULL, 1),
(15, 1, 2, 20, 4, NULL, 1),
(16, 1, 2, 21, 4, NULL, 1),
(17, 1, 2, 22, 4, NULL, 1),
(18, 3, 2, 25, 5, NULL, 1),
(19, 1, 6, 31, 1, NULL, 1),
(20, 1, 7, 34, 2, NULL, 1),
(21, 1, 2, 23, 2, NULL, 1),
(22, 1, 2, 35, 1, NULL, 1),
(23, 1, 8, 44, 1, NULL, 1),
(24, 1, 8, 45, 1, NULL, 1),
(25, 1, 8, 46, 1, NULL, 1),
(26, 1, 8, 47, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gb_goal_list_mentor`
--

CREATE TABLE IF NOT EXISTS `gb_goal_list_mentor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal_list_id` int(11) NOT NULL,
  `mentor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_goal_mentor_goal_list_id` (`goal_list_id`),
  KEY `goal_goal_mentor_goal_mentor_id` (`mentor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gb_goal_list_share`
--

CREATE TABLE IF NOT EXISTS `gb_goal_list_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal_list_id` int(11) NOT NULL,
  `connection_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_goal_goal_list_id` (`goal_list_id`),
  KEY `goal_goal_goal_list_connection_id` (`connection_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `gb_goal_list_share`
--

INSERT INTO `gb_goal_list_share` (`id`, `goal_list_id`, `connection_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 3),
(6, 3, 1),
(7, 3, 2),
(8, 4, 1),
(9, 4, 3),
(10, 5, 1),
(11, 5, 2),
(12, 5, 4),
(13, 6, 1),
(14, 6, 2),
(15, 7, 3),
(16, 7, 4),
(17, 8, 3),
(18, 8, 4),
(19, 9, 1),
(20, 9, 2),
(21, 9, 4),
(22, 10, 1),
(23, 10, 2),
(24, 11, 2),
(25, 12, 4),
(26, 13, 1),
(27, 13, 2),
(28, 14, 3),
(29, 15, 1),
(30, 15, 2),
(31, 15, 3),
(32, 15, 4),
(33, 16, 4),
(34, 17, 1),
(35, 17, 2),
(36, 17, 3),
(37, 18, 1),
(38, 18, 2),
(39, 23, 1),
(40, 25, NULL),
(41, 25, NULL),
(42, 25, NULL),
(43, 25, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gb_goal_page`
--

CREATE TABLE IF NOT EXISTS `gb_goal_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `subgoal_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_page_page_id` (`page_id`),
  KEY `goal_page_goal_id` (`goal_id`),
  KEY `goal_page_subgoal_id` (`subgoal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gb_goal_page`
--

INSERT INTO `gb_goal_page` (`id`, `page_id`, `goal_id`, `subgoal_id`) VALUES
(1, 1, 27, 28),
(2, 1, 27, 29),
(3, 1, 27, 30),
(4, 2, 32, 33);

-- --------------------------------------------------------

--
-- Table structure for table `gb_goal_todo`
--

CREATE TABLE IF NOT EXISTS `gb_goal_todo` (
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
  KEY `goal_todo_assignee_id` (`assignee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gb_goal_type`
--

CREATE TABLE IF NOT EXISTS `gb_goal_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `gb_goal_type`
--

INSERT INTO `gb_goal_type` (`id`, `category`, `type`, `description`) VALUES
(1, 'skill ', 'Academic/Job Related', NULL),
(2, 'skill ', 'Self Management', NULL),
(3, 'skill  ', 'Transferable', NULL),
(4, 'skill', 'Action Words', NULL),
(5, 'skill  ', 'Other', NULL),
(6, 'goal  ', 'Physical', NULL),
(7, 'goal ', 'Social', NULL),
(8, 'goal ', 'Career ', NULL),
(9, 'goal ', 'Financial ', NULL),
(10, 'goal ', 'Self Improvement and Spiritual', NULL),
(11, 'goal ', 'Pleasure ', NULL),
(12, 'goal', 'Relationships and Family', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gb_goal_user_puntos`
--

CREATE TABLE IF NOT EXISTS `gb_goal_user_puntos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_user_puntos` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gb_goal_web_link`
--

CREATE TABLE IF NOT EXISTS `gb_goal_web_link` (
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
  KEY `goal_web_link_goal_id` (`goal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gb_goal_web_link`
--

INSERT INTO `gb_goal_web_link` (`id`, `link`, `title`, `creator_id`, `goal_id`, `description`, `importance`, `status`) VALUES
(1, 'http://www.wikihow.com/Cook-For-Your-Girlfriend', 'Cook For Her - Wiki-How', 6, 23, 'Ohh Tremayne, mother knows better. Look at my google skills. Check this out.', 1, 0),
(2, 'http://www.artofmanliness.com/2011/03/18/the-10-commandments-of-the-at-home-dinner-date/', 'For  Dinner Date', 2, 23, 'Something I think will be useful to me in a long run', 1, 0),
(3, 'http://www.lifehack.org/articles/technology/20-tips-use-google-search-efficiently.html', 'Read This', 2, 26, 'I searched for you', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gb_list_bank`
--

CREATE TABLE IF NOT EXISTS `gb_list_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `subgoal` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `list_bank_type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=720 ;

--
-- Dumping data for table `gb_list_bank`
--

INSERT INTO `gb_list_bank` (`id`, `type_id`, `name`, `subgoal`, `description`) VALUES
(1, 4, 'Achieved', NULL, NULL),
(2, 2, 'Active', NULL, 'becoming actively involved, stand up'),
(3, 3, 'Adaptable', NULL, 'being flexible when things change. manage multiple assignments and tasks, set priorities, adapt to changing conditions, adapt to work assignments. adapting new procedures'),
(4, 4, 'Adapted', NULL, NULL),
(5, 3, 'Add windshield washer fluid', NULL, NULL),
(6, 4, 'Addressed', NULL, NULL),
(7, 4, 'Administered', NULL, NULL),
(8, 2, 'Adventurous', NULL, NULL),
(9, 4, 'Advised', NULL, NULL),
(10, 1, 'Advising People', NULL, NULL),
(11, 2, 'Affectionate', NULL, NULL),
(12, 2, 'Aggressive', NULL, NULL),
(13, 2, 'Alert', NULL, NULL),
(14, 2, 'Ambitious', NULL, NULL),
(15, 1, 'Analyze Data Or Facts', NULL, NULL),
(16, 4, 'Analyzed', NULL, NULL),
(17, 1, 'Analyzing Problems', NULL, NULL),
(18, 3, 'Anticipate Needs', NULL, NULL),
(19, 3, 'Arrange Social Functions', NULL, NULL),
(20, 4, 'Arranged', NULL, NULL),
(21, 3, 'Articulate', NULL, NULL),
(22, 1, 'Artistic', NULL, NULL),
(23, 1, 'Assemble Or Make Things', NULL, 'Alert'),
(24, 4, 'Assembled', NULL, NULL),
(25, 1, 'Assembling Apparatus', NULL, NULL),
(26, 2, 'Assertive', NULL, NULL),
(27, 4, 'Assessed', NULL, NULL),
(28, 4, 'Assisted', NULL, NULL),
(29, 4, 'Attained', NULL, NULL),
(30, 2, 'Attractive', NULL, NULL),
(31, 1, 'Audit Records', NULL, NULL),
(32, 4, 'Audited', NULL, NULL),
(33, 1, 'Auditing Financial Reports', NULL, NULL),
(34, 1, 'Balance Money', NULL, NULL),
(35, 1, 'Basic Accounting', NULL, NULL),
(36, 2, 'Be a Respectful House Guest', NULL, NULL),
(37, 1, 'Becoming Actively Involved', NULL, NULL),
(38, 2, 'Being Photogenic', NULL, NULL),
(39, 1, 'Being Thorough', NULL, NULL),
(40, 2, 'Bold', NULL, NULL),
(41, 2, 'Broad-Minded', NULL, NULL),
(42, 4, 'Budgeted', NULL, NULL),
(43, 1, 'Budgeting Expenses', NULL, NULL),
(44, 3, 'Build a Fire', NULL, NULL),
(45, 1, 'Build, Observe, Inspect Things', NULL, NULL),
(46, 2, 'Businesslike', NULL, NULL),
(47, 3, 'Buy a Woman Clothing', NULL, NULL),
(48, 1, 'Calculate, Compute', NULL, NULL),
(49, 4, 'Calculated', NULL, NULL),
(50, 1, 'Calculating Numerical Data', NULL, NULL),
(51, 2, 'Calm', NULL, NULL),
(52, 3, 'Calm a Crying Baby', NULL, NULL),
(53, 3, 'Care For', NULL, NULL),
(54, 2, 'Careful', NULL, NULL),
(55, 3, 'Caring', NULL, NULL),
(56, 3, 'Carve a Turkey', NULL, NULL),
(57, 2, 'Cautious', NULL, NULL),
(58, 3, 'Change a tire', NULL, NULL),
(59, 3, 'Change oil', NULL, NULL),
(60, 2, 'Charming', NULL, NULL),
(61, 3, 'Check coolant level', NULL, NULL),
(62, 3, 'Check tire pressure', NULL, NULL),
(63, 1, 'Checking For Accuracy', NULL, NULL),
(64, 2, 'Cheerful', NULL, NULL),
(65, 4, 'Classified', NULL, NULL),
(66, 1, 'Classify Data', NULL, NULL),
(67, 1, 'Classifying Records', NULL, NULL),
(68, 2, 'Clear-Thinking', NULL, NULL),
(69, 2, 'Clever', NULL, NULL),
(70, 4, 'Coached', NULL, NULL),
(71, 1, 'Coaching Individuals', NULL, NULL),
(72, 1, 'Collaborating Ideas', NULL, NULL),
(73, 4, 'Collected', NULL, NULL),
(74, 1, 'Collecting Money', NULL, NULL),
(75, 3, 'Comfort a Crying Woman', NULL, NULL),
(76, 3, 'Communicate Verbally', NULL, 'Writes clearly and concisely, speaks effectively, listens attentively, openly expresses ideas, negotiates/resolves differences, leads group discussions, provides feedback, persuades others, provides well-thought out solutions, gathers appropriate information, confidently speaks in public'),
(77, 4, 'Communicated', NULL, NULL),
(78, 1, 'Compare, Inspect, Or Record Facts', NULL, NULL),
(79, 1, 'Comparing Results', NULL, NULL),
(80, 2, 'Competent', NULL, NULL),
(81, 2, 'Competitive', NULL, NULL),
(82, 4, 'Compiled', NULL, NULL),
(83, 1, 'Compiling Statistics', NULL, NULL),
(84, 4, 'Composed', NULL, NULL),
(85, 1, 'Comprehending Ideas', NULL, NULL),
(86, 4, 'Computed', NULL, NULL),
(87, 4, 'Conducted', NULL, NULL),
(88, 1, 'Conducting Interviews', NULL, NULL),
(89, 1, 'Conducting Meetings', NULL, NULL),
(90, 2, 'Confident', NULL, NULL),
(91, 3, 'Confront Others', NULL, NULL),
(92, 1, 'Confronting Other People', NULL, NULL),
(93, 2, 'Conscientious', NULL, NULL),
(94, 2, 'Conservative', NULL, NULL),
(95, 2, 'Considerate', NULL, NULL),
(96, 4, 'Consolidated', NULL, NULL),
(97, 1, 'Construct Or Repair', NULL, NULL),
(98, 4, 'Constructed', NULL, NULL),
(99, 1, 'Constructing Buildings', NULL, NULL),
(100, 4, 'Consulted', NULL, NULL),
(101, 2, 'Cool', NULL, NULL),
(102, 2, 'Cooperative', NULL, NULL),
(103, 4, 'Coordinated', NULL, NULL),
(104, 1, 'Coordinating Schedules/Times', NULL, NULL),
(105, 1, 'Coping With Deadlines', NULL, NULL),
(106, 3, 'Counsel People', NULL, NULL),
(107, 4, 'Counseled', NULL, NULL),
(108, 1, 'Counseling/Consulting People', NULL, NULL),
(109, 1, 'Count, Observe, Compile', NULL, NULL),
(110, 2, 'Courageous', NULL, NULL),
(111, 1, 'Create New Ideas', NULL, NULL),
(112, 4, 'Created', NULL, NULL),
(113, 1, 'Creating Meaningful And Challenging Work', NULL, NULL),
(114, 1, 'Creating New Ideas', NULL, NULL),
(115, 2, 'Creative', NULL, NULL),
(116, 1, 'Creative, Artistic', NULL, NULL),
(117, 1, 'Critical Thinking', NULL, NULL),
(118, 4, 'Critiqued', NULL, NULL),
(119, 2, 'Curiosity', NULL, NULL),
(120, 2, 'Dance, Body Movement', NULL, NULL),
(121, 2, 'Daring', NULL, NULL),
(122, 1, 'Dealing With Data', NULL, NULL),
(123, 1, 'Deciding Uses Of Money', NULL, NULL),
(124, 3, 'Decision Making', NULL, NULL),
(125, 2, 'Decisive', NULL, NULL),
(126, 4, 'Defined', NULL, NULL),
(127, 1, 'Defining A Problem', NULL, NULL),
(128, 1, 'Defining Performance Standards', NULL, NULL),
(129, 3, 'Delegate', NULL, NULL),
(130, 1, 'Delegating Responsibilities', NULL, NULL),
(131, 2, 'Deliberate', NULL, NULL),
(132, 3, 'Deliver Bad News', NULL, NULL),
(133, 2, 'Democratic', NULL, NULL),
(134, 3, 'Demonstrate Something', NULL, NULL),
(135, 2, 'Dependable', NULL, NULL),
(136, 1, 'Design', NULL, NULL),
(137, 4, 'Designed', NULL, NULL),
(138, 1, 'Detail-Oriented', NULL, NULL),
(139, 3, 'Detect a Lie', NULL, NULL),
(140, 4, 'Detected', NULL, NULL),
(141, 2, 'Determined', NULL, NULL),
(142, 4, 'Determined', NULL, NULL),
(143, 1, 'Determining A Problem', NULL, NULL),
(144, 1, 'Developing A Climate Of Enthusiasm, Teamwork, And Cooperation', NULL, NULL),
(145, 1, 'Developing Plans For Projects', NULL, NULL),
(146, 4, 'Devised', NULL, NULL),
(147, 4, 'Diagnosed', NULL, NULL),
(148, 2, 'Dignified', NULL, NULL),
(149, 3, 'Diplomatic', NULL, NULL),
(150, 1, 'Direct Others', NULL, NULL),
(151, 1, 'Direct Projects', NULL, NULL),
(152, 4, 'Directed', NULL, NULL),
(153, 4, 'Discovered', NULL, NULL),
(154, 2, 'Discreet', NULL, NULL),
(155, 1, 'Dispensing Information', NULL, NULL),
(156, 4, 'Displayed', NULL, NULL),
(157, 1, 'Displaying Artistic Ideas', NULL, NULL),
(158, 1, 'Distributing Products', NULL, NULL),
(159, 3, 'Do Basic Cooking', NULL, NULL),
(160, 2, 'Do Push-Ups and Sit-Ups Properly', NULL, NULL),
(161, 2, 'Dominant', NULL, NULL),
(162, 1, 'Drafting Reports', NULL, NULL),
(163, 1, 'Dramatizing Ideas', NULL, NULL),
(164, 1, 'Draw, Sketch, Render', NULL, NULL),
(165, 3, 'Drive a Manual Transmission Vehicle', NULL, NULL),
(166, 1, 'Drive Or Operate Vehicles', NULL, NULL),
(167, 2, 'Eager', NULL, NULL),
(168, 4, 'Earned', NULL, NULL),
(169, 2, 'Easygoing', NULL, NULL),
(170, 1, 'Edit', NULL, NULL),
(171, 1, 'Edit A Picture', NULL, NULL),
(172, 1, 'Edit A Video', NULL, NULL),
(173, 4, 'Edited', NULL, NULL),
(174, 1, 'Editing Work', NULL, NULL),
(175, 2, 'Efficient', NULL, NULL),
(176, 4, 'Eliminated', NULL, NULL),
(177, 2, 'Emotional', NULL, NULL),
(178, 3, 'Empowering Others', NULL, NULL),
(179, 1, 'Encouraging Others', NULL, NULL),
(180, 3, 'End a Date Politely Without Making Promises', NULL, NULL),
(181, 1, 'Enduring Long Hours', NULL, NULL),
(182, 2, 'Energetic', NULL, NULL),
(183, 4, 'Enforced', NULL, NULL),
(184, 1, 'Enforcing Rules And Regulations', NULL, NULL),
(185, 2, 'Enterprising', NULL, NULL),
(186, 1, 'Entertaining People', NULL, NULL),
(187, 2, 'Enthusiastic', NULL, NULL),
(188, 4, 'Established', NULL, NULL),
(189, 4, 'Estimated', NULL, NULL),
(190, 1, 'Estimating Physical Space', NULL, NULL),
(191, 4, 'Evaluated', NULL, NULL),
(192, 1, 'Evaluating Programs', NULL, NULL),
(193, 4, 'Examined', NULL, NULL),
(194, 4, 'Expanded', NULL, NULL),
(195, 4, 'Experimented', NULL, NULL),
(196, 3, 'Explain Things To Others', NULL, NULL),
(197, 4, 'Explained', NULL, NULL),
(198, 1, 'Expressing Feelings', NULL, NULL),
(199, 1, 'Expressing Ideas Orally To Individuals Or Groups', NULL, NULL),
(200, 2, 'Expressive', NULL, NULL),
(201, 2, 'Fair-Minded', NULL, NULL),
(202, 2, 'Farsighted', NULL, NULL),
(203, 4, 'Financed', NULL, NULL),
(204, 1, 'Finding Information', NULL, NULL),
(205, 2, 'Firm', NULL, NULL),
(206, 2, 'Flexibility', NULL, NULL),
(207, 2, 'Flexible', NULL, NULL),
(208, 3, 'Flirt Without Looking Ridiculous', NULL, NULL),
(209, 1, 'Follow Instructions', NULL, NULL),
(210, 2, 'Forceful', NULL, NULL),
(211, 2, 'Formal', NULL, NULL),
(212, 4, 'Formulated', NULL, NULL),
(213, 2, 'Frank', NULL, NULL),
(214, 2, 'Friendly', NULL, NULL),
(215, 3, 'Friendship', NULL, NULL),
(216, 3, 'Gardening', 'Compost', NULL),
(217, 3, 'Gardening', 'Divide Plants', NULL),
(218, 3, 'Gardening', 'Grow An Herb Garden', NULL),
(219, 3, 'Gardening', 'Grow Plants From Cuttings', NULL),
(220, 3, 'Gardening', 'Grow Plants From Seed', NULL),
(221, 3, 'Gardening', 'Plant A Vegetable Garden', NULL),
(222, 3, 'Gardening', 'Save Seeds', NULL),
(223, 4, 'Gathered', NULL, NULL),
(224, 1, 'Gathering Information', NULL, NULL),
(225, 2, 'General Conscientiousness', 'Accept Constructive Criticism', NULL),
(226, 2, 'General Conscientiousness', 'Avoid Drugs And Alcohol', NULL),
(227, 2, 'General Conscientiousness', 'Awareness Of Your Surroundings', NULL),
(228, 2, 'General Conscientiousness', 'Be Open-Minded', NULL),
(229, 2, 'General Conscientiousness', 'Be Sexually Responsible', NULL),
(230, 2, 'General Conscientiousness', 'Being Alert', NULL),
(231, 2, 'General Conscientiousness', 'Emergency Preparedness', NULL),
(232, 2, 'General Conscientiousness', 'Have Personal Medical Information And Keep Up With Appointments', NULL),
(233, 2, 'General Conscientiousness', 'How To Ask For Help', NULL),
(234, 2, 'General Conscientiousness', 'How To Say ''No'', Respectfully', NULL),
(235, 2, 'General Conscientiousness', 'Recognizing A Potentially Dangerous Situation', NULL),
(236, 4, 'Generated', NULL, NULL),
(237, 1, 'Generating Accounts', NULL, NULL),
(238, 2, 'Generous', NULL, NULL),
(239, 2, 'Gentle', NULL, NULL),
(240, 5, 'Get a Busy Bartender''s Attention', NULL, NULL),
(241, 1, 'Get Results', NULL, NULL),
(242, 3, 'Give a Compliment', NULL, NULL),
(243, 5, 'Give a Good Massage', NULL, NULL),
(244, 3, 'Give Driving Directions', NULL, NULL),
(245, 1, 'Good With My Hands', NULL, NULL),
(246, 2, 'Good-Natured', NULL, NULL),
(247, 1, 'Google Efficiently', NULL, NULL),
(248, 4, 'Grossed', NULL, NULL),
(249, 4, 'Guided', NULL, NULL),
(250, 3, 'Handle a Hammer, Axe or Handsaw', NULL, NULL),
(251, 3, 'Handle a Job Interview', NULL, NULL),
(252, 3, 'Handle the Police', NULL, NULL),
(253, 4, 'Handled', NULL, NULL),
(254, 1, 'Handling Complaints', NULL, NULL),
(255, 1, 'Handling Detail Work', NULL, NULL),
(256, 2, 'Happinness', NULL, NULL),
(257, 2, 'Healthy', NULL, NULL),
(258, 3, 'Help Others', NULL, NULL),
(259, 2, 'Helpful', NULL, NULL),
(260, 3, 'High Energy', NULL, NULL),
(261, 3, 'Hold a Baby', NULL, NULL),
(262, 3, 'Home and Personal Care Skills', 'Determine which clothes to take to the dry cleaners', NULL),
(263, 3, 'Home and Personal Care Skills', 'Fold laundry', NULL),
(264, 3, 'Home and Personal Care Skills', 'Get rid of spiders and bugs (without help)', NULL),
(265, 3, 'Home and Personal Care Skills', 'How to properly clean a toilet, shower, bathroom floor, etc.', NULL),
(266, 3, 'Home and Personal Care Skills', 'How to unclog a toilet', NULL),
(267, 3, 'Home and Personal Care Skills', 'How to use basic kitchen appliances', NULL),
(268, 3, 'Home and Personal Care Skills', 'Make a bed (with clean sheets)', NULL),
(269, 3, 'Home and Personal Care Skills', 'Read An Electric Meter.', NULL),
(270, 3, 'Home and Personal Care Skills', 'Set an alarm and wake yourself up on time', NULL),
(271, 3, 'Home and Personal Care Skills', 'Wash/Dry clothes', NULL),
(272, 3, 'Home Maintenance', 'Caulk', NULL),
(273, 3, 'Home Maintenance', 'Clean A Dryer Vent', NULL),
(274, 3, 'Home Maintenance', 'Clean Your Gutters', NULL),
(275, 3, 'Home Maintenance', 'Fix A Leaky Faucet', NULL),
(276, 3, 'Home Maintenance', 'Get Rid Of Ants', NULL),
(277, 3, 'Home Maintenance', 'Get Rid Of Fruit Flies', NULL),
(278, 3, 'Home Maintenance', 'Line-Dry Clothes.', NULL),
(279, 3, 'Home Maintenance', 'Reverse A Ceiling Fan', NULL),
(280, 3, 'Home Maintenance', 'Unclog A Drain', NULL),
(281, 3, 'Home Maintenance', 'Unclog A Toilet', NULL),
(282, 3, 'Home Maintenance', 'Vacuum Refrigerator Coils', NULL),
(283, 2, 'Honest', NULL, NULL),
(284, 3, 'Hook Up a Basic Home Theater System', NULL, NULL),
(285, 2, 'Humorous', NULL, NULL),
(286, 4, 'Hypothesized', NULL, NULL),
(287, 2, 'Idealistic', NULL, NULL),
(288, 4, 'Identified', NULL, NULL),
(289, 4, 'Illustrated', NULL, NULL),
(290, 2, 'Imaginative', NULL, NULL),
(291, 1, 'Imagining New Solutions', NULL, NULL),
(292, 3, 'Implement Basic Computer Security Best Practices', NULL, NULL),
(293, 4, 'Implemented', NULL, NULL),
(294, 4, 'Improved', NULL, NULL),
(295, 4, 'Increased', NULL, NULL),
(296, 2, 'Independent', NULL, NULL),
(297, 2, 'Individualistic', NULL, NULL),
(298, 2, 'Industrious', NULL, NULL),
(299, 4, 'Influenced', NULL, NULL),
(300, 2, 'Informal', NULL, NULL),
(301, 2, 'Ingenious', NULL, NULL),
(302, 4, 'Initiated', NULL, NULL),
(303, 3, 'Initiative', NULL, NULL),
(304, 3, 'Innovative', NULL, NULL),
(305, 3, 'Insightful', NULL, NULL),
(306, 4, 'Inspected', NULL, NULL),
(307, 1, 'Inspecting Physical Objects', NULL, NULL),
(308, 4, 'Installed', NULL, NULL),
(309, 4, 'Instituted', NULL, NULL),
(310, 4, 'Instructed', NULL, NULL),
(311, 2, 'Intellectual', NULL, NULL),
(312, 2, 'Intelligent', NULL, NULL),
(313, 2, 'Intentive', NULL, NULL),
(314, 1, 'Interacting With People At Different Levels', NULL, NULL),
(315, 1, 'Interpersonal Skills', NULL, 'works well with others, self-confident, accepts responsibilitysensitive, supportive, motivates others, shares credit, counsels, cooperates, delegates effectively, represents others, understands feelings, '),
(316, 4, 'Interpreted', NULL, NULL),
(317, 1, 'Interpreting Languages', NULL, NULL),
(318, 3, 'Interview Others', NULL, NULL),
(319, 4, 'Interviewed', NULL, NULL),
(320, 1, 'Interviewing Prospective Employees', NULL, NULL),
(321, 4, 'Invented', NULL, NULL),
(322, 1, 'Inventing New Ideas', NULL, NULL),
(323, 1, 'Investigate', NULL, NULL),
(324, 4, 'Investigated', NULL, NULL),
(325, 1, 'Investigating Problems', NULL, NULL),
(326, 3, 'Iron a Shirt', NULL, NULL),
(327, 3, 'Jump Start a Car', NULL, NULL),
(328, 3, 'Jump Start a Car', NULL, NULL),
(329, 3, 'Keep a Clean House', NULL, NULL),
(330, 1, 'Keep Financial Records', NULL, NULL),
(331, 3, 'Kind', NULL, NULL),
(332, 3, 'Kitchen and Cooking', 'Cook Dried Beans', NULL),
(333, 3, 'Kitchen and Cooking', 'Cook In Bulk', NULL),
(334, 3, 'Kitchen and Cooking', 'Cook Your Own Food', NULL),
(335, 3, 'Kitchen and Cooking', 'Make A Cake From Scratch', NULL),
(336, 3, 'Kitchen and Cooking', 'Make Bread', NULL),
(337, 3, 'Kitchen and Cooking', 'Make Broth with Beef, Vegetable, Chicken, Turkey', NULL),
(338, 3, 'Kitchen and Cooking', 'Make Ice Cream', NULL),
(339, 3, 'Kitchen and Cooking', 'Make Pancakes From Scratch', NULL),
(340, 3, 'Kitchen and Cooking', 'Make Yogurt', NULL),
(341, 3, 'Kitchen and Cooking', 'Roast A Chicken', NULL),
(342, 3, 'Kitchen and Cooking', 'Season A Cast Iron Pan', NULL),
(343, 3, 'Kitchen and Cooking', 'Substitute Ingredients In Recipes', NULL),
(344, 3, 'Kitchen and Cooking', 'Use Up Leftovers', NULL),
(345, 1, 'Knowledge Of Community/Government Affairs', NULL, NULL),
(346, 1, 'Knowledge Of Concepts And Principles', NULL, NULL),
(347, 1, 'Leadership', NULL, NULL),
(348, 3, 'Learn Spaninsh', NULL, NULL),
(349, 3, 'Learning Other Languages', 'Learn Spaninsh', NULL),
(350, 3, 'Learning Other Languages', 'Speaking in Spanish', NULL),
(351, 3, 'Learning Other Languages', 'Typing in Chinese', NULL),
(352, 3, 'Learning Other Languages', 'Writing Spanish', NULL),
(353, 4, 'Lectured', NULL, NULL),
(354, 2, 'Leisurely', NULL, NULL),
(355, 3, 'Life Management and Organization Skills', 'Address An Envelope', NULL),
(356, 3, 'Life Management and Organization Skills', 'Back-Up Information On Your Computer And Other Devices', NULL),
(357, 3, 'Life Management and Organization Skills', 'Balance A Checkbook', NULL),
(358, 3, 'Life Management and Organization Skills', 'Calculate A Tip', NULL),
(359, 3, 'Life Management and Organization Skills', 'Change The Battery In A Fire Alarm', NULL),
(360, 3, 'Life Management and Organization Skills', 'Create A Budget', NULL),
(361, 3, 'Life Management and Organization Skills', 'How To Set Up Internet/Cable', NULL),
(362, 3, 'Life Management and Organization Skills', 'How To Split A Check Amongst Friends', NULL),
(363, 3, 'Life Management and Organization Skills', 'Keep A Daily Calendar', NULL),
(364, 3, 'Life Management and Organization Skills', 'Keep Your Finances Records Organized', NULL),
(365, 3, 'Life Management and Organization Skills', 'Manage/Clean-Up Your Social Media Accounts', NULL),
(366, 3, 'Life Management and Organization Skills', 'Organize All Passwords', NULL),
(367, 3, 'Life Management and Organization Skills', 'Pack Smarter', NULL),
(368, 3, 'Life Management and Organization Skills', 'Time Management', NULL),
(369, 3, 'Life Management and Organization Skills', 'Use A Credit Card Responsibly, Avoiding Debt', NULL),
(370, 3, 'Life Management and Organization Skills', 'When/How To Pay Taxes', NULL),
(371, 3, 'Life Management and Organization Skills', 'Write A Check', NULL),
(372, 2, 'Lighthearted', NULL, NULL),
(373, 2, 'Likable', NULL, NULL),
(374, 3, 'Listen', NULL, NULL),
(375, 3, 'Listen Carefully to Others', NULL, NULL),
(376, 1, 'Listening To Others', NULL, NULL),
(377, 1, 'Locate Answers Or Information', NULL, NULL),
(378, 1, 'Locating Missing Information', NULL, NULL),
(379, 3, 'Logical', NULL, NULL),
(380, 2, 'Loyal', NULL, NULL),
(381, 1, 'Maintaining A High Level Of Activity', NULL, NULL),
(382, 1, 'Maintaining Accurate Records', NULL, NULL),
(383, 1, 'Maintaining Emotional Control Under Stress', NULL, NULL),
(384, 3, 'Make a Good First Impression', NULL, NULL),
(385, 3, 'Make a Short, Informative Public Speech', NULL, NULL),
(386, 3, 'Make a Simple Budget', NULL, NULL),
(387, 3, 'Make Eggs More than Three Ways', NULL, NULL),
(388, 1, 'Making Decisions', NULL, NULL),
(389, 3, 'Manage Money', NULL, NULL),
(390, 3, 'Manage Time', NULL, NULL),
(391, 4, 'Managed', NULL, NULL),
(392, 1, 'Managing An Organization', NULL, NULL),
(393, 1, 'Managing People', NULL, NULL),
(394, 4, 'Marketed', NULL, NULL),
(395, 1, 'Math', NULL, NULL),
(396, 2, 'Mature', NULL, NULL),
(397, 1, 'Measuring Boundaries', NULL, NULL),
(398, 1, 'Mediate Problems', NULL, NULL),
(399, 4, 'Mediated', NULL, NULL),
(400, 1, 'Mediating Between People', NULL, NULL),
(401, 1, 'Meeting New People', NULL, NULL),
(402, 1, 'Meeting People', NULL, NULL),
(403, 2, 'Methodical', NULL, NULL),
(404, 2, 'Meticulous', NULL, NULL),
(405, 2, 'Mild', NULL, NULL),
(406, 4, 'Modeled', NULL, NULL),
(407, 2, 'Moderate', NULL, NULL),
(408, 2, 'Modest', NULL, NULL),
(409, 3, 'Money Management', 'Balance A Checkbook', NULL),
(410, 3, 'Money Management', 'Bargain Shopping', NULL),
(411, 3, 'Money Management', 'Barter Trade', NULL),
(412, 3, 'Money Management', 'Calculate Your Net Worth', NULL),
(413, 3, 'Money Management', 'Cherry Pick', NULL),
(414, 3, 'Money Management', 'Contest A Billing Error', NULL),
(415, 3, 'Money Management', 'Haggle', NULL),
(416, 3, 'Money Management', 'Make A Household Budget', NULL),
(417, 3, 'Money Management', 'Make Your Own Sale', NULL),
(418, 3, 'Money Management', 'Negotiate Medical Bills', NULL),
(419, 3, 'Money Management', 'Stack Coupons', NULL),
(420, 4, 'Monitored', NULL, NULL),
(421, 3, 'Motivate People', NULL, NULL),
(422, 4, 'Motivated', NULL, NULL),
(423, 1, 'Motivating Others', NULL, NULL),
(424, 2, 'Music Appreciation', NULL, NULL),
(425, 2, 'Natural', NULL, NULL),
(426, 3, 'Navigate with a Map and Compass', NULL, NULL),
(427, 3, 'Negotiate', NULL, NULL),
(428, 3, 'Negotiate', NULL, NULL),
(429, 3, 'Negotiate Agreements', NULL, NULL),
(430, 4, 'Negotiated', NULL, NULL),
(431, 1, 'Negotiating/Arbitrating Conflicts', NULL, NULL),
(432, 3, 'Networking', NULL, NULL),
(433, 2, 'Obliging', NULL, NULL),
(434, 4, 'Obtained', NULL, NULL),
(435, 1, 'Off-Bearing Or Feeding Machinery', NULL, NULL),
(436, 3, 'Open Minded', NULL, NULL),
(437, 1, 'Operate a Computer', NULL, NULL),
(438, 1, 'Operate Tools And Machinery', NULL, NULL),
(439, 4, 'Operated', NULL, NULL),
(440, 1, 'Operating Equipment', NULL, NULL),
(441, 2, 'Opportunistic', NULL, NULL),
(442, 2, 'Optimistic', NULL, NULL),
(443, 4, 'Ordered', NULL, NULL),
(444, 2, 'Organizational Skills', NULL, 'organizing tasks, organizing files, handles details, coordinates tasks, punctual, manages projects effectively, meets deadlines, sets goals, keeps control over budget, plans and arranges activities, multi-tasks'),
(445, 4, 'Organized', NULL, NULL),
(446, 2, 'Original', NULL, NULL),
(447, 3, 'Outgoing', NULL, NULL),
(448, 4, 'Oversaw', NULL, NULL),
(449, 1, 'Overseeing Operations', NULL, NULL),
(450, 2, 'Painstaking', NULL, NULL),
(451, 3, 'Paint', NULL, NULL),
(452, 3, 'Paint a Room', NULL, NULL),
(453, 3, 'Parallel Park', NULL, NULL),
(454, 2, 'Patience', NULL, NULL),
(455, 3, 'Patient', NULL, NULL),
(456, 2, 'Peaceable', NULL, NULL),
(457, 3, 'Perform Basic First Aid', NULL, NULL),
(458, 3, 'Perform CPR and the Heimlich Maneuver', NULL, NULL),
(459, 3, 'Perform, Act', NULL, NULL),
(460, 4, 'Performed', NULL, NULL),
(461, 1, 'Performing Numeric Analysis', NULL, NULL),
(462, 2, 'Persevering', NULL, NULL),
(463, 4, 'Persuaded', NULL, NULL),
(464, 1, 'Persuading Others', NULL, NULL),
(465, 2, 'Persuasive', NULL, NULL),
(466, 4, 'Photographed', NULL, NULL),
(467, 3, 'Pick a Ripe Fruit', NULL, NULL),
(468, 1, 'Picking Out Important Information', NULL, NULL),
(469, 1, 'Plan', NULL, NULL),
(470, 4, 'Planned', NULL, NULL),
(471, 1, 'Planning Agendas/Meetings', NULL, NULL),
(472, 1, 'Planning Organizational Needs', NULL, NULL),
(473, 2, 'Play Instruments', NULL, NULL),
(474, 2, 'Pleasant', NULL, NULL),
(475, 2, 'Poised', NULL, NULL),
(476, 2, 'Polite', NULL, NULL),
(477, 2, 'Practical', NULL, NULL),
(478, 2, 'Precise', NULL, NULL),
(479, 1, 'Predicting Futures', NULL, NULL),
(480, 1, 'Prefer Details', NULL, NULL),
(481, 4, 'Prepared', NULL, NULL),
(482, 1, 'Preparing Written Communications', NULL, NULL),
(483, 3, 'Present Artistic Ideas', NULL, NULL),
(484, 4, 'Presented', NULL, NULL),
(485, 2, 'Pressure-Resistant', NULL, NULL),
(486, 4, 'Printed', NULL, NULL),
(487, 1, 'Prioritizing Work', NULL, NULL),
(488, 4, 'Processed', NULL, NULL),
(489, 4, 'Produced', NULL, NULL),
(490, 2, 'Productive', NULL, NULL),
(491, 3, 'Professional Skills', 'Draft A Cover Letter', NULL),
(492, 3, 'Professional Skills', 'Network', NULL),
(493, 3, 'Professional Skills', 'Professionally Format Emails', NULL),
(494, 3, 'Professional Skills', 'Write A Resume', NULL),
(495, 3, 'Professional Skills', 'Write Thank You Notes', NULL),
(496, 2, 'Progressive', NULL, NULL),
(497, 4, 'Projected', NULL, NULL),
(498, 4, 'Promoted', NULL, NULL),
(499, 1, 'Promoting Events', NULL, NULL),
(500, 4, 'Proofread', NULL, NULL),
(501, 1, 'Proposing Ideas', NULL, NULL),
(502, 3, 'Protect Personal Identity Information', NULL, NULL),
(503, 4, 'Provided', NULL, NULL),
(504, 1, 'Providing Customers With Service', NULL, NULL),
(505, 1, 'Providing Discipline When Necessary', NULL, NULL),
(506, 2, 'Prudent', NULL, NULL),
(507, 1, 'Public Speaking', NULL, NULL),
(508, 4, 'Publicized', NULL, NULL),
(509, 2, 'Punctual', NULL, NULL),
(510, 4, 'Purchased', NULL, NULL),
(511, 2, 'Purposeful', NULL, NULL),
(512, 1, 'Questioning Others', NULL, NULL),
(513, 2, 'Quick', NULL, NULL),
(514, 2, 'Quiet', NULL, NULL),
(515, 1, 'Raising Funds', NULL, NULL),
(516, 2, 'Rational', NULL, NULL),
(517, 1, 'Reading Volumes Of Material', NULL, NULL),
(518, 2, 'Realistic', NULL, NULL),
(519, 2, 'Reasonable', NULL, NULL),
(520, 4, 'Received', NULL, NULL),
(521, 3, 'Recite Basic Geography', NULL, NULL),
(522, 3, 'Recognize Personal Alcohol Limits', NULL, NULL),
(523, 4, 'Recommended', NULL, NULL),
(524, 1, 'Recommending Courses Of Action', NULL, NULL),
(525, 4, 'Reconciled', NULL, NULL),
(526, 4, 'Recorded', NULL, NULL),
(527, 4, 'Recruited', NULL, NULL),
(528, 4, 'Reduced', NULL, NULL),
(529, 4, 'Referred', NULL, NULL),
(530, 4, 'Refined', NULL, NULL),
(531, 2, 'Reflective', NULL, NULL),
(532, 4, 'Rehabilitated', NULL, NULL),
(533, 1, 'Rehabilitating People', NULL, NULL),
(534, 1, 'Relating To The Public', NULL, NULL),
(535, 2, 'Relaxation', NULL, NULL),
(536, 2, 'Relaxed', NULL, NULL),
(537, 2, 'Reliable', NULL, NULL),
(538, 3, 'Relocate Living Spaces', NULL, NULL),
(539, 3, 'Remember Information', NULL, NULL),
(540, 3, 'Remember Names', NULL, NULL),
(541, 1, 'Remembering Information', NULL, NULL),
(542, 3, 'Remove a Stain', NULL, NULL),
(543, 1, 'Repair Things', NULL, NULL),
(544, 4, 'Repaired', NULL, NULL),
(545, 4, 'Reported', NULL, NULL),
(546, 1, 'Reporting Information', NULL, NULL),
(547, 4, 'Represented', NULL, NULL),
(548, 1, 'Research', NULL, 'creates ideas, identifies problems, solves problem, gathers information, evaluate information, citing sources, meets goals, identifies resourcess, defines needs, analyzes issues, develops strategies, assesses situations'),
(549, 4, 'Researched', NULL, NULL),
(550, 2, 'Reserved', NULL, NULL),
(551, 4, 'Resolved', NULL, NULL),
(552, 1, 'Resolving Conflicts', NULL, NULL),
(553, 2, 'Resourceful', NULL, NULL),
(554, 4, 'Responded', NULL, NULL),
(555, 2, 'Responsible', NULL, NULL),
(556, 4, 'Restored', NULL, NULL),
(557, 2, 'Retiring', NULL, NULL),
(558, 4, 'Retrieved', NULL, NULL),
(559, 4, 'Reviewed', NULL, NULL),
(560, 2, 'Robust', NULL, NULL),
(561, 1, 'Run Meetings', NULL, NULL),
(562, 1, 'Running Meetings', NULL, NULL),
(563, 1, 'Safety Conscious', NULL, NULL),
(564, 4, 'Scheduled', NULL, NULL),
(565, 1, 'Screening Telephone Calls', NULL, NULL),
(566, 3, 'Select Good Produce', NULL, NULL),
(567, 4, 'Selected', NULL, NULL),
(568, 2, 'Self-Confident', NULL, NULL),
(569, 2, 'Self-Motivated', NULL, NULL),
(570, 1, 'Selling Ideas', NULL, NULL),
(571, 1, 'Selling Products', NULL, NULL),
(572, 2, 'Sense Of Humor', NULL, NULL),
(573, 2, 'Sensible', NULL, NULL),
(574, 3, 'Sensitive', NULL, NULL),
(575, 2, 'Serious', NULL, NULL),
(576, 3, 'Serving', NULL, NULL),
(577, 1, 'Serving Individuals', NULL, NULL),
(578, 1, 'Setting Priorities', NULL, NULL),
(579, 1, 'Setting Up Demonstrations', NULL, NULL),
(580, 1, 'Setting Work/Committee Goals', NULL, NULL),
(581, 3, 'Sew a Button', NULL, NULL),
(582, 3, 'Sew a Button onto Clothing', NULL, NULL),
(583, 3, 'Sewing or Mending', 'Crafting', NULL),
(584, 3, 'Sewing or Mending', 'Fix A Broken Zipper', NULL),
(585, 3, 'Sewing or Mending', 'Hem A Pair Of Pants', NULL),
(586, 3, 'Sewing or Mending', 'Make A Candle.', NULL),
(587, 3, 'Sewing or Mending', 'Mend A Ripped Seam', NULL),
(588, 3, 'Sewing or Mending', 'Sew On A Button', NULL),
(589, 3, 'Sewing or Mending', 'Use A Sewing Machine.', NULL),
(590, 3, 'Share Leadership', NULL, NULL),
(591, 2, 'Sharp-Witted', NULL, NULL),
(592, 3, 'Shine a Shoe', NULL, NULL),
(593, 2, 'Sincere', NULL, NULL),
(594, 1, 'Sketching Charts Or Diagrams', NULL, NULL),
(595, 1, 'Skillfully Applying Professional Knowledge', NULL, NULL),
(596, 3, 'Smile for the Camera', NULL, NULL),
(597, 2, 'Sociable', NULL, NULL),
(598, 1, 'Solve Problems', NULL, NULL),
(599, 4, 'Solved', NULL, NULL),
(600, 4, 'Sorted', NULL, NULL),
(601, 3, 'Speak at Least Two Common Languages', NULL, NULL),
(602, 3, 'Speak In Public', NULL, NULL),
(603, 3, 'Speaking in Spanish', NULL, NULL),
(604, 1, 'Speaking To The Public', NULL, NULL),
(605, 3, 'Speed Read', NULL, NULL),
(606, 3, 'Split Firewood', NULL, NULL),
(607, 2, 'Spontaneous', NULL, NULL),
(608, 2, 'Spunky', NULL, NULL),
(609, 2, 'Stable', NULL, NULL),
(610, 2, 'Steady', NULL, NULL),
(611, 2, 'Strong', NULL, NULL),
(612, 2, 'Strong-Minded', NULL, NULL),
(613, 3, 'Student Specific Skills', 'Contact Professors For Help', NULL),
(614, 3, 'Student Specific Skills', 'Create A Schedule That Works For You', NULL),
(615, 3, 'Student Specific Skills', 'Create An Outline', NULL),
(616, 3, 'Student Specific Skills', 'Discuss Living Guidelines With Your Roommate', NULL),
(617, 3, 'Student Specific Skills', 'Essay Writing', NULL),
(618, 3, 'Student Specific Skills', 'Keep Track Of Assignments Due', NULL),
(619, 3, 'Student Specific Skills', 'Keep Track Of Your Grades', NULL),
(620, 3, 'Student Specific Skills', 'Maintain A Healthy Balance Between Your Academic And Social Life', NULL),
(621, 3, 'Student Specific Skills', 'Maintain Healthy Study Habits', NULL),
(622, 3, 'Student Specific Skills', 'Navigate To Classes', NULL),
(623, 3, 'Student Specific Skills', 'Public Speaking', NULL),
(624, 3, 'Student Specific Skills', 'Register For Classes', NULL),
(625, 3, 'Student Specific Skills', 'Seek Out Extracurricular Activities You Enjoy', NULL),
(626, 3, 'Student Specific Skills', 'Shop Smarter For Books', NULL),
(627, 3, 'Student Specific Skills', 'Taking Clear, Readable Notes', NULL),
(628, 3, 'Student Specific Skills', 'Use Your University''s Web Site', NULL),
(629, 4, 'Studied', NULL, NULL),
(630, 4, 'Summarized', NULL, NULL),
(631, 1, 'Summarizing Information', NULL, NULL),
(632, 3, 'Supervise', NULL, NULL),
(633, 4, 'Supervised', NULL, NULL),
(634, 1, 'Supervising Employees', NULL, NULL),
(635, 4, 'Supplied', NULL, NULL),
(636, 1, 'Supporting Others', NULL, NULL),
(637, 3, 'Supportive', NULL, NULL),
(638, 4, 'Surveyed', NULL, NULL),
(639, 3, 'Swim', NULL, NULL),
(640, 2, 'Sympathetic', NULL, NULL),
(641, 3, 'Tactful', NULL, NULL),
(642, 3, 'Take A Good Picture', NULL, NULL),
(643, 1, 'Take Inventory', NULL, NULL),
(644, 3, 'Take Orders', NULL, NULL),
(645, 2, 'Take Risks', NULL, NULL),
(646, 3, 'Take Useful Notes', NULL, NULL),
(647, 1, 'Taking Independent Action', NULL, NULL),
(648, 1, 'Taking Personal Responsibility', NULL, NULL),
(649, 3, 'Teach', NULL, NULL),
(650, 2, 'Teachable', NULL, NULL),
(651, 1, 'Teaching/Instructing/Training Individuals', NULL, NULL),
(652, 1, 'Team Builder', NULL, NULL),
(653, 3, 'Tell a Story that Captivates People''s Attention', NULL, NULL),
(654, 2, 'Tenacious', NULL, NULL),
(655, 4, 'Tested', NULL, NULL),
(656, 3, 'Think Of Others', NULL, NULL),
(657, 1, 'Thinking In A Logical Manner', NULL, NULL),
(658, 1, 'Thinking Of Creative Ideas', NULL, NULL),
(659, 2, 'Thorough', NULL, NULL),
(660, 2, 'Thoughtful', NULL, NULL),
(661, 2, 'Tie A Necktie', NULL, NULL),
(662, 2, 'Tolerant', NULL, NULL),
(663, 1, 'Tolerating Interruptions', NULL, NULL),
(664, 2, 'Tough', NULL, NULL),
(665, 4, 'Trained', NULL, NULL),
(666, 4, 'Transcribed', NULL, NULL),
(667, 4, 'Translated', NULL, NULL),
(668, 3, 'Transportation Savvy', 'Bike Maintenance', NULL),
(669, 3, 'Transportation Savvy', 'Change A Tire', NULL),
(670, 3, 'Transportation Savvy', 'Fill Up A Car With Gas', NULL),
(671, 3, 'Transportation Savvy', 'Hail A Taxi', NULL),
(672, 3, 'Transportation Savvy', 'Read A Map', NULL),
(673, 3, 'Transportation Savvy', 'Utilize And Navigate Public Transit', NULL),
(674, 3, 'Travel Light', NULL, NULL),
(675, 4, 'Traveled', NULL, NULL),
(676, 3, 'Trust', NULL, NULL),
(677, 2, 'Trusting', NULL, NULL),
(678, 2, 'Trustworthy', NULL, NULL),
(679, 4, 'Tutored', NULL, NULL),
(680, 3, 'Type', NULL, NULL),
(681, 3, 'Typing in Chinese', NULL, NULL),
(682, 2, 'Unaffected', NULL, NULL),
(683, 2, 'Unassuming', NULL, NULL),
(684, 1, 'Understand The Big Picture', NULL, NULL),
(685, 2, 'Understanding', NULL, NULL),
(686, 2, 'Unexcitable', NULL, NULL),
(687, 2, 'Uninhibited', NULL, NULL),
(688, 1, 'Updating Files', NULL, NULL),
(689, 4, 'Upgraded', NULL, NULL),
(690, 1, 'Use Complex Equipment', NULL, NULL),
(691, 1, 'Use Equipment', NULL, NULL),
(692, 1, 'Use My Hands', NULL, NULL),
(693, 3, 'Using Words, Ideas', NULL, NULL),
(694, 4, 'Utilized', NULL, NULL),
(695, 2, 'Verbal', NULL, NULL),
(696, 2, 'Versatile', NULL, NULL),
(697, 2, 'Warm', NULL, NULL),
(698, 3, 'Wax a car', NULL, NULL),
(699, 2, 'Wholesome', NULL, NULL),
(700, 3, 'Win or Avoid a Fistfight', NULL, NULL),
(701, 2, 'Wise', NULL, NULL),
(702, 2, 'Witty', NULL, NULL),
(703, 3, 'Working With Others', NULL, NULL),
(704, 1, 'Working With People', NULL, NULL),
(705, 1, 'Write Clearly', NULL, NULL),
(706, 1, 'Writing For Publication', NULL, NULL),
(707, 1, 'Writing Letters/Papers/Proposals', NULL, NULL),
(708, 1, 'Writing Reports', NULL, NULL),
(709, 3, 'Writing Spanish', NULL, NULL),
(710, 4, 'Wrote', NULL, NULL),
(711, 6, 'Lose Weight', NULL, NULL),
(712, 6, 'Eat Healthy', NULL, NULL),
(713, 8, 'Networking', NULL, NULL),
(714, 8, 'Tracking Acomplishments ', NULL, NULL),
(715, 8, 'Update your Skills', NULL, NULL),
(716, 8, 'Negotiate', NULL, NULL),
(717, 10, 'Speak English fluently', NULL, NULL),
(718, 7, '1000 subscribers to my blogs', NULL, NULL),
(719, 12, 'Donate at an organisation', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gb_mentorship`
--

CREATE TABLE IF NOT EXISTS `gb_mentorship` (
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
  KEY `mentorship_goal_id` (`goal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gb_mentorship`
--

INSERT INTO `gb_mentorship` (`id`, `owner_id`, `goal_id`, `title`, `description`, `mentoring_level`, `type`, `status`) VALUES
(1, 2, 11, 'Design', '', 1, 0, 0),
(2, 6, 31, 'Cooking Healthy Foods', 'I can show how I started eating health.', 2, 0, 0),
(3, 2, 35, 'Using Yii, a php MVC Framework.', 'This mentorship will about some of the tips I have learned during my development process. I can mentor you some basics design and answer some questions you might have. Or refer you to some resources.', 1, 0, 0),
(4, 8, 46, 'Add windshield washer fluid', '', 0, 0, 0),
(5, 8, 46, 'Add windshield washer fluid', 'gagahgajs s nd nyw asdywhe wwwqyw', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gb_mentorship_enrolled`
--

CREATE TABLE IF NOT EXISTS `gb_mentorship_enrolled` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mentee_id` int(11) NOT NULL,
  `mentorship_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mentorship_enrolled_mentee_id` (`mentee_id`),
  KEY `mentorship_enroled_mentorship_id` (`mentorship_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gb_message`
--

CREATE TABLE IF NOT EXISTS `gb_message` (
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
  KEY `gb_message_sender_id` (`sender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gb_message_receipient`
--

CREATE TABLE IF NOT EXISTS `gb_message_receipient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `receipient_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gb_message_receipient_id` (`receipient_id`),
  KEY `gb_message_message_id` (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gb_message_receipient_goal`
--

CREATE TABLE IF NOT EXISTS `gb_message_receipient_goal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal_id` int(11) NOT NULL,
  `message_receipient_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gb_message_receipient_goal_id` (`goal_id`),
  KEY `gb_message_receipient_message_receipient_id` (`message_receipient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gb_page`
--

CREATE TABLE IF NOT EXISTS `gb_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_owner_id` (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gb_page`
--

INSERT INTO `gb_page` (`id`, `owner_id`, `title`, `description`, `type`) VALUES
(1, 2, '4 skills you need to be an excellent software engineer', '', 0),
(2, 6, '3 skills you need to have good eating habits', '', 0),
(3, 2, '4 skills you need to be a good web designer.', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gb_post`
--

CREATE TABLE IF NOT EXISTS `gb_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `post_owner_id` (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `gb_post`
--

INSERT INTO `gb_post` (`id`, `owner_id`, `source_id`, `type`, `status`) VALUES
(1, 2, 6, 1, 0),
(2, 6, 2, 2, 0),
(3, 2, 2, 1, 0),
(4, 2, 3, 1, 0),
(5, 2, 3, 3, 0),
(6, 2, 1, 4, 0),
(7, 6, 2, 4, 0),
(8, 8, 23, 1, 0),
(9, 8, 24, 1, 0),
(10, 8, 25, 1, 0),
(11, 8, 4, 2, 0),
(12, 8, 5, 2, 0),
(13, 8, 26, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gb_profile`
--

CREATE TABLE IF NOT EXISTS `gb_profile` (
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
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gb_profile`
--

INSERT INTO `gb_profile` (`user_id`, `lastname`, `firstname`, `specialty`, `avatar_url`, `favorite_quote`, `gender`, `birthdate`, `phone_number`, `address`) VALUES
(1, 'Team', 'GoalBook', 'System', 'gb_default_avatar.png', '', 'J', '0000-00-00', '', ''),
(2, 'Mushayahama', 'Tremayne', 'Software Engineer', 'gb_default_avatar.png', '', 'M', '0000-00-00', '', ''),
(3, 'Para', 'Tag', '', 'gb_default_avatar.png', '', 'M', '0000-00-00', '', ''),
(4, 'Nolle', 'Lindah', '', 'gb_default_avatar.png', '', 'F', '0000-00-00', '', ''),
(5, 'Nolle', 'John', '', 'gb_default_avatar.png', '', 'M', '0000-00-00', '', ''),
(6, 'Mushayahama', 'Joyce', '', 'gb_default_avatar.png', '', 'F', '0000-00-00', '', ''),
(7, 'Ash', 'Paul', '', 'gb_default_avatar.png', '', 'M', '0000-00-00', '', ''),
(8, 'Taggg', 'Tagwie', '', 'gb_default_avatar.png', '', NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gb_profile_field`
--

CREATE TABLE IF NOT EXISTS `gb_profile_field` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `gb_request_notification`
--

CREATE TABLE IF NOT EXISTS `gb_request_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL DEFAULT '1',
  `notification_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `request_notification_from_id` (`from_id`),
  KEY `request_notification_to_id` (`to_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gb_request_notification`
--

INSERT INTO `gb_request_notification` (`id`, `from_id`, `to_id`, `notification_id`, `message`, `type`, `status`) VALUES
(1, 4, 5, 18, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gb_skill_academic`
--

CREATE TABLE IF NOT EXISTS `gb_skill_academic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT NULL,
  `school` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `extra_info` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `skill_academic_skill_id` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gb_skill_job`
--

CREATE TABLE IF NOT EXISTS `gb_skill_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `extra_info` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `skill_job_skill_id` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gb_subgoal`
--

CREATE TABLE IF NOT EXISTS `gb_subgoal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal_id` int(11) NOT NULL,
  `subgoal_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `subgoal_goal_id` (`goal_id`),
  KEY `subgoal_subgoal_id` (`subgoal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gb_todo`
--

CREATE TABLE IF NOT EXISTS `gb_todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `todo` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `todo_creator_id` (`creator_id`),
  KEY `todo_category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gb_todo`
--

INSERT INTO `gb_todo` (`id`, `todo`, `category_id`, `creator_id`) VALUES
(1, 'Get familiar with this page', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gb_todo_category`
--

CREATE TABLE IF NOT EXISTS `gb_todo_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gb_todo_category`
--

INSERT INTO `gb_todo_category` (`id`, `category`) VALUES
(1, 'General');

-- --------------------------------------------------------

--
-- Table structure for table `gb_user`
--

CREATE TABLE IF NOT EXISTS `gb_user` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gb_user`
--

INSERT INTO `gb_user` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'goalbookteam', '827ccb0eea8a706c4c34a16891f84e7b', 'goalbook@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(2, 'tremayne@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'tremayne@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(3, 'tag@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'tag@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(4, 'lindah@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'lindah@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(5, 'john@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'john@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(6, 'joyce@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'joyce@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(7, 'paul@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'paul@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(8, 'tagwireyip@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'tagwireyip@gmail.com', '4822d1065415bf7033e24b09b1bd4279', '2014-03-13 23:47:29', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthItemchild`
--
ALTER TABLE `AuthItemchild`
  ADD CONSTRAINT `AuthItemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_connection_member`
--
ALTER TABLE `gb_connection_member`
  ADD CONSTRAINT `connection_member_connection_id` FOREIGN KEY (`connection_id`) REFERENCES `gb_connection` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `connection_member_connection_member_id_1` FOREIGN KEY (`connection_member_id_1`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `connection_member_connection_member_id_2` FOREIGN KEY (`connection_member_id_2`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_discussion`
--
ALTER TABLE `gb_discussion`
  ADD CONSTRAINT `gb_discussion_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gb_discussion_title_id` FOREIGN KEY (`title_id`) REFERENCES `gb_discussion_title` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_discussion_title`
--
ALTER TABLE `gb_discussion_title`
  ADD CONSTRAINT `gb_discussion_title_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gb_discussion_title_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_goal`
--
ALTER TABLE `gb_goal`
  ADD CONSTRAINT `goal_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_goal_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_goal_assignment`
--
ALTER TABLE `gb_goal_assignment`
  ADD CONSTRAINT `goal_assignment_goal_connection_id` FOREIGN KEY (`connection_id`) REFERENCES `gb_connection` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_assignment_assignee_id` FOREIGN KEY (`assignee_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_assignment_assigner_id` FOREIGN KEY (`assigner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_assignment_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_goal_challenge`
--
ALTER TABLE `gb_goal_challenge`
  ADD CONSTRAINT `goal_challenge_goal_connection_id` FOREIGN KEY (`connection_id`) REFERENCES `gb_connection` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_challenge_assignee_id` FOREIGN KEY (`challenger_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_challenge_assigner_id` FOREIGN KEY (`assigner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_challenge_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_goal_list`
--
ALTER TABLE `gb_goal_list`
  ADD CONSTRAINT `goal_list_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_goal_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_list_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_list_level_id` FOREIGN KEY (`goal_level_id`) REFERENCES `gb_goal_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_list_list_bank_parent_id` FOREIGN KEY (`list_bank_parent_id`) REFERENCES `gb_list_bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_list_user_id` FOREIGN KEY (`user_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_goal_list_mentor`
--
ALTER TABLE `gb_goal_list_mentor`
  ADD CONSTRAINT `goal_goal_mentor_goal_mentor_id` FOREIGN KEY (`mentor_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_goal_mentor_goal_list_id` FOREIGN KEY (`goal_list_id`) REFERENCES `gb_goal_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_goal_list_share`
--
ALTER TABLE `gb_goal_list_share`
  ADD CONSTRAINT `goal_goal_goal_list_connection_id` FOREIGN KEY (`connection_id`) REFERENCES `gb_connection` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_goal_goal_list_id` FOREIGN KEY (`goal_list_id`) REFERENCES `gb_goal_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_goal_page`
--
ALTER TABLE `gb_goal_page`
  ADD CONSTRAINT `goal_page_subgoal_id` FOREIGN KEY (`subgoal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_page_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_page_page_id` FOREIGN KEY (`page_id`) REFERENCES `gb_page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_goal_todo`
--
ALTER TABLE `gb_goal_todo`
  ADD CONSTRAINT `goal_todo_assignee_id` FOREIGN KEY (`assignee_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_todo_assigner_id` FOREIGN KEY (`assigner_id`) REFERENCES `gb_user` (`id`)ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_todo_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_todo_todo_id` FOREIGN KEY (`todo_id`) REFERENCES `gb_todo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_goal_user_puntos`
--
ALTER TABLE `gb_goal_user_puntos`
  ADD CONSTRAINT `goal_user_puntos` FOREIGN KEY (`user_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_goal_web_link`
--
ALTER TABLE `gb_goal_web_link`
  ADD CONSTRAINT `goal_web_link_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_web_link_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_list_bank`
--
ALTER TABLE `gb_list_bank`
  ADD CONSTRAINT `list_bank_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_goal_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_mentorship`
--
ALTER TABLE `gb_mentorship`
  ADD CONSTRAINT `mentorship_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mentorship_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_mentorship_enrolled`
--
ALTER TABLE `gb_mentorship_enrolled`
  ADD CONSTRAINT `mentorship_enroled_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mentorship_enrolled_mentee_id` FOREIGN KEY (`mentee_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_message`
--
ALTER TABLE `gb_message`
  ADD CONSTRAINT `gb_message_sender_id` FOREIGN KEY (`sender_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_message_receipient`
--
ALTER TABLE `gb_message_receipient`
  ADD CONSTRAINT `gb_message_message_id` FOREIGN KEY (`message_id`) REFERENCES `gb_message` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gb_message_receipient_id` FOREIGN KEY (`receipient_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_message_receipient_goal`
--
ALTER TABLE `gb_message_receipient_goal`
  ADD CONSTRAINT `gb_message_receipient_message_receipient_id` FOREIGN KEY (`message_receipient_id`) REFERENCES `gb_message_receipient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gb_message_receipient_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_page`
--
ALTER TABLE `gb_page`
  ADD CONSTRAINT `page_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_post`
--
ALTER TABLE `gb_post`
  ADD CONSTRAINT `post_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_profile`
--
ALTER TABLE `gb_profile`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_request_notification`
--
ALTER TABLE `gb_request_notification`
  ADD CONSTRAINT `request_notification_to_id` FOREIGN KEY (`to_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_notification_from_id` FOREIGN KEY (`from_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_skill_academic`
--
ALTER TABLE `gb_skill_academic`
  ADD CONSTRAINT `skill_academic_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_skill_job`
--
ALTER TABLE `gb_skill_job`
  ADD CONSTRAINT `skill_job_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_subgoal`
--
ALTER TABLE `gb_subgoal`
  ADD CONSTRAINT `subgoal_subgoal_id` FOREIGN KEY (`subgoal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subgoal_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gb_todo`
--
ALTER TABLE `gb_todo`
  ADD CONSTRAINT `todo_category_id` FOREIGN KEY (`category_id`) REFERENCES `gb_todo_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `todo_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
