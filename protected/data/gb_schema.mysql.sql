DROP USER 'gb'@'localhost';
CREATE USER 'gb'@'localhost' IDENTIFIED BY 'goal++';
DROP DATABASE IF EXISTS goalbook;
CREATE DATABASE goalbook DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
GRANT ALL PRIVILEGES ON goalbook.* to 'gb'@'localhost' WITH GRANT OPTION;
USE goalbook;

drop table if exists AuthItem;
drop table if exists AuthItemChild;
drop table if exists AuthAssignment;
drop table if exists Rights;

create table AuthItem
(
   name varchar(64) not null,
   type integer not null,
   description text,
   bizrule text,
   data text,
   primary key (name)
);

create table AuthItemChild
(
   parent varchar(64) not null,
   child varchar(64) not null,
   primary key (parent,child),
   foreign key (parent) references AuthItem (name) on delete cascade on update cascade,
   foreign key (child) references AuthItem (name) on delete cascade on update cascade
);

create table AuthAssignment
(
   itemname varchar(64) not null,
   userid varchar(64) not null,
   bizrule text,
   data text,
   primary key (itemname,userid),
   foreign key (itemname) references AuthItem (name) on delete cascade on update cascade
);

create table Rights
(
	itemname varchar(64) not null,
	type integer not null,
	weight integer not null,
	primary key (itemname),
	foreign key (itemname) references AuthItem (name) on delete cascade on update cascade
);
CREATE TABLE `gb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

CREATE TABLE `gb_profile` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `lastname` varchar(50) NOT NULL DEFAULT '',
    `firstname` varchar(50) NOT NULL DEFAULT '',
    `specialty` varchar(50) NOT NULL DEFAULT '',
    `avatar_url` varchar(100) NOT NULL DEFAULT 'gb_default_avatar.png',
    `favorite_quote` varchar (500) not null default '',
    `gender` varchar(3) NULL,
    `birthdate` date NULL,
    `phone_number` varchar(20) NOT NULL default '',
    `address` varchar(255) NOT NULL default '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `gb_profile`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `gb_user` (`id`) ON DELETE CASCADE;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

CREATE TABLE `gb_goal_level` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `level_category` varchar(50) NOT NULL,
    `level_name` varchar(50) NOT NULL,
    `description` varchar(150) NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE `gb_goal_type` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `category` varchar(50) NOT NULL,
    `type` varchar(50) NOT NULL,
    `description` varchar(150) NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE `gb_list_bank` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `type_id` int,
    `name` varchar(100) NOT NULL,
    `subgoal` varchar(100) NULL,
    `description` varchar(500) NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_list_bank` ADD CONSTRAINT `list_bank_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_goal_type` (`id`);

CREATE TABLE `gb_todo_category` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `category` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE `gb_todo` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `todo` varchar(250) NOT NULL,
    `category_id` integer NOT NULL,
    `creator_id` integer NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_todo` ADD CONSTRAINT `todo_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_todo` ADD CONSTRAINT `todo_category_id` FOREIGN KEY (`category_id`) REFERENCES `gb_todo_category` (`id`);

CREATE TABLE `gb_connection` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `name` varchar(50) NOT NULL,
    `connection_picture` varchar(50) NULL,
    `description` varchar(150) NULL,
    `created_date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE `gb_connection_member` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `connection_id` integer NOT NULL,
    `connection_member_id_1` integer NOT NULL,
    `connection_member_id_2` integer NOT NULL,
    `added_date` datetime NOT NULL,
    `privilege` int NOT NULL default 1,
    `status` int default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_connection_member` ADD CONSTRAINT `connection_member_connection_member_id_1` FOREIGN KEY (`connection_member_id_1`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_connection_member` ADD CONSTRAINT `connection_member_connection_member_id_2` FOREIGN KEY (`connection_member_id_2`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_connection_member` ADD CONSTRAINT `connection_member_connection_id` FOREIGN KEY (`connection_id`) REFERENCES `gb_connection` (`id`);

CREATE TABLE `gb_goal` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `type_id` integer,
    `title` varchar(100) NOT NULL,
    `description` varchar(500) NOT NULL,
    `points_pledged` integer,
    `assign_date` datetime NOT NULL,
    `begin_date` datetime,
    `end_date` datetime,
    `status` int default 0
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal` ADD CONSTRAINT `goal_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_goal_type` (`id`);

CREATE TABLE `gb_subgoal` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `goal_id` integer NOT NULL,         
    `subgoal_id` integer NOT NULL,
    `status` int default 0
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_subgoal` ADD CONSTRAINT `subgoal_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`);
ALTER TABLE `gb_subgoal` ADD CONSTRAINT `subgoal_subgoal_id` FOREIGN KEY (`subgoal_id`) REFERENCES `gb_goal` (`id`);

CREATE TABLE `gb_goal_list` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `type_id` integer NOT NULL,
    `user_id` integer NOT NULL,
    `goal_id` int NOT NULL,
    `goal_level_id` integer not null default 1,
    `list_bank_parent_id` integer null,
    `status` int not null default 1
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_list` ADD CONSTRAINT `goal_list_user_id` FOREIGN KEY (`user_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_goal_list` ADD CONSTRAINT `goal_list_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`);
ALTER TABLE `gb_goal_list` ADD CONSTRAINT `goal_list_level_id` FOREIGN KEY (`goal_level_id`) REFERENCES `gb_goal_level` (`id`);
ALTER TABLE `gb_goal_list` ADD CONSTRAINT `goal_list_list_bank_parent_id` FOREIGN KEY (`list_bank_parent_id`) REFERENCES `gb_list_bank` (`id`);
ALTER TABLE `gb_goal_list` ADD CONSTRAINT `goal_list_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_goal_type` (`id`);

CREATE TABLE `gb_goal_todo` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `todo_id` integer NOT NULL,
    `goal_id` integer NOT NULL,
    `assigner_id` integer NOT NULL,
    `assignee_id` integer NOT NULL,
    `assigned_date` date NOT NULL,
    `importance` int not null default 1,
    `status` integer NOT NULL default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_todo` ADD CONSTRAINT `goal_todo_todo_id` FOREIGN KEY (`todo_id`) REFERENCES `gb_todo` (`id`);
ALTER TABLE `gb_goal_todo` ADD CONSTRAINT `goal_todo_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`);
ALTER TABLE `gb_goal_todo` ADD CONSTRAINT `goal_todo_assigner_id` FOREIGN KEY (`assigner_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_goal_todo` ADD CONSTRAINT `goal_todo_assignee_id` FOREIGN KEY (`assignee_id`) REFERENCES `gb_user` (`id`);

CREATE TABLE `gb_goal_list_share` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `goal_list_id` integer NOT NULL,
    `connection_id` integer
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_list_share` ADD CONSTRAINT `goal_goal_goal_list_id` FOREIGN KEY (`goal_list_id`) REFERENCES `gb_goal_list` (`id`);
ALTER TABLE `gb_goal_list_share` ADD CONSTRAINT `goal_goal_goal_list_connection_id` FOREIGN KEY (`connection_id`) REFERENCES `gb_connection` (`id`);

CREATE TABLE `gb_goal_list_mentor` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `goal_list_id` integer NOT NULL,
    `mentor_id` integer
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_list_mentor` ADD CONSTRAINT `goal_goal_mentor_goal_list_id` FOREIGN KEY (`goal_list_id`) REFERENCES `gb_goal_list` (`id`);
ALTER TABLE `gb_goal_list_mentor` ADD CONSTRAINT `goal_goal_mentor_goal_mentor_id` FOREIGN KEY (`mentor_id`) REFERENCES `gb_user` (`id`);


/*CREATE TABLE `gb_goal_commitment` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `owner_id` integer NOT NULL,
    `goal_id` int NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_commitment` ADD CONSTRAINT `goal_commitment_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_goal_commitment` ADD CONSTRAINT `goal_commitment_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`);

CREATE TABLE `gb_goal_commitment_share` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `goal_commitment_id` integer NOT NULL,
    `connection_id` integer
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_commitment_share` ADD CONSTRAINT `goal_commitment_share_goal_commitment_id` FOREIGN KEY (`goal_commitment_id`) REFERENCES `gb_goal_commitment` (`id`);
ALTER TABLE `gb_goal_commitment_share` ADD CONSTRAINT `goal_commitment_share_connection_id` FOREIGN KEY (`connection_id`) REFERENCES `gb_connection` (`id`);
*/
CREATE TABLE `gb_discussion_title` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `title` varchar(150),
    `creator_id` int NOT NULL,
    `goal_id` integer NOT NULL,
    `created_date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_discussion_title` ADD CONSTRAINT `gb_discussion_title_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`);
ALTER TABLE `gb_discussion_title` ADD CONSTRAINT `gb_discussion_title_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`);

CREATE TABLE `gb_discussion` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `title_id` int NOT NULL,
    `creator_id` int NOT NULL,
    `description` varchar(1000) not null default "",
    `created_date` datetime NOT NULL,
    `importance` int not null default 1,
    `status` integer NOT NULL default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_discussion` ADD CONSTRAINT `gb_discussion_title_id` FOREIGN KEY (`title_id`) REFERENCES `gb_discussion_title` (`id`);
ALTER TABLE `gb_discussion` ADD CONSTRAINT `gb_discussion_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`);

CREATE TABLE `gb_message` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `type` int not null,
    `sender_id` int not null,
    `title` int NOT NULL,
    `subject` int NOT NULL,
    `body` varchar(5000) not null default "",
    `created_date` datetime NOT NULL,
    `importance` int not null default 1,
    `status` integer NOT NULL default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_message` ADD CONSTRAINT `gb_message_sender_id` FOREIGN KEY (`sender_id`) REFERENCES `gb_user` (`id`);

CREATE TABLE `gb_message_receipient` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `message_id` int not null,
    `receipient_id` int not null,
    `status` integer NOT NULL default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_message_receipient` ADD CONSTRAINT `gb_message_receipient_id` FOREIGN KEY (`receipient_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_message_receipient` ADD CONSTRAINT `gb_message_message_id` FOREIGN KEY (`message_id`) REFERENCES `gb_message` (`id`);

CREATE TABLE `gb_message_receipient_goal` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `goal_id` int not null,
    `message_receipient_id` int not null,
    `status` integer NOT NULL default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_message_receipient_goal` ADD CONSTRAINT `gb_message_receipient_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`);
ALTER TABLE `gb_message_receipient_goal` ADD CONSTRAINT `gb_message_receipient_message_receipient_id` FOREIGN KEY (`message_receipient_id`) REFERENCES `gb_message_receipient` (`id`);

CREATE TABLE `gb_goal_web_link` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `link` varchar(1000) NOT NULL,
    `title` varchar(250) NOT NULL,
    `creator_id` integer NOT NULL,
    `goal_id` integer NOT NULL,
    `description` varchar(500) not null default "",
    `importance` int not null default 1,
    `status` integer NOT NULL default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_web_link` ADD CONSTRAINT `goal_web_link_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_goal_web_link` ADD CONSTRAINT `goal_web_link_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`);

/*CREATE TABLE `gb_goal_monitor` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `goal_commitment_id` integer NOT NULL,
    `monitor_id` integer not null,
    `status` int not null default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_monitor` ADD CONSTRAINT `goal_monitor_goal_commitment_id` FOREIGN KEY (`goal_commitment_id`) REFERENCES `gb_goal_commitment` (`id`);
ALTER TABLE `gb_goal_monitor` ADD CONSTRAINT `goal_monitor_monitor_id` FOREIGN KEY (`monitor_id`) REFERENCES `gb_user` (`id`);

CREATE TABLE `gb_goal_follow` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `goal_commitment_id` integer NOT NULL,
    `follow_id` integer not null,
    `status` int not null default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_follow` ADD CONSTRAINT `goal_follow_goal_commitment_id` FOREIGN KEY (`goal_commitment_id`) REFERENCES `gb_goal_commitment` (`id`);
ALTER TABLE `gb_goal_follow` ADD CONSTRAINT `goal_follow_follow_id` FOREIGN KEY (`follow_id`) REFERENCES `gb_user` (`id`);

CREATE TABLE `gb_goal_assist` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `goal_commitment_id` integer NOT NULL,
    `assist_id` integer not null,
    `status` int not null default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_assist` ADD CONSTRAINT `goal_assist_goal_commitment_id` FOREIGN KEY (`goal_commitment_id`) REFERENCES `gb_goal_commitment` (`id`);
ALTER TABLE `gb_goal_assist` ADD CONSTRAINT `goal_assist_assist_id` FOREIGN KEY (`assist_id`) REFERENCES `gb_user` (`id`);

CREATE TABLE `gb_goal_referee`(
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `goal_commitment_id` integer NOT NULL,
    `referee_id` integer not null,
    `status` int not null default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_referee` ADD CONSTRAINT `goal_referee_goal_commitment_id` FOREIGN KEY (`goal_commitment_id`) REFERENCES `gb_goal_commitment` (`id`);
ALTER TABLE `gb_goal_referee` ADD CONSTRAINT `goal_referee_referee_id` FOREIGN KEY (`referee_id`) REFERENCES `gb_user` (`id`);
*/

CREATE TABLE `gb_goal_assignment` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `assigner_id` integer NOT NULL,
    `assignee_id` integer NOT NULL,
    `goal_id` int NOT NULL,
    `connection_id` integer
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_assignment` ADD CONSTRAINT `goal_assignment_assigner_id` FOREIGN KEY (`assigner_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_goal_assignment` ADD CONSTRAINT `goal_assignment_assignee_id` FOREIGN KEY (`assignee_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_goal_assignment` ADD CONSTRAINT `goal_assignment_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`);
ALTER TABLE `gb_goal_assignment` ADD CONSTRAINT `goal_assignment_goal_connection_id` FOREIGN KEY (`connection_id`) REFERENCES `gb_connection` (`id`);

CREATE TABLE `gb_goal_challenge` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `assigner_id` integer NOT NULL,
    `challenger_id` integer NOT NULL,
    `goal_id` int NOT NULL,
    `connection_id` integer
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_challenge` ADD CONSTRAINT `goal_challenge_assigner_id` FOREIGN KEY (`assigner_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_goal_challenge` ADD CONSTRAINT `goal_challenge_assignee_id` FOREIGN KEY (`challenger_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_goal_challenge` ADD CONSTRAINT `goal_challenge_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`);
ALTER TABLE `gb_goal_challenge` ADD CONSTRAINT `goal_challenge_goal_connection_id` FOREIGN KEY (`connection_id`) REFERENCES `gb_connection` (`id`);

CREATE TABLE `gb_skill_academic` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `skill_id` integer NOT NULL,
    `school` varchar(255),
    `major` varchar(255),
    `extra_info` varchar(255)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_skill_academic` ADD CONSTRAINT `skill_academic_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_goal` (`id`);

CREATE TABLE `gb_skill_job` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `skill_id` integer NOT NULL,
    `company` varchar(255),
    `position` varchar(255),
    `extra_info` varchar(255)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_skill_job` ADD CONSTRAINT `skill_job_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `gb_goal` (`id`);

CREATE TABLE `gb_page` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `owner_id` int NOT NULL,
    `title` varchar(200) not null,
	`description` varchar(1000) not null default "",
    `type` int not null
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_page` ADD CONSTRAINT `page_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`);

CREATE TABLE `gb_goal_page` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `page_id` int NOT NULL,
    `goal_id` int not null,
    `subgoal_id` int not null
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_page` ADD CONSTRAINT `goal_page_page_id` FOREIGN KEY (`page_id`) REFERENCES `gb_page` (`id`);
ALTER TABLE `gb_goal_page` ADD CONSTRAINT `goal_page_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`);
ALTER TABLE `gb_goal_page` ADD CONSTRAINT `goal_page_subgoal_id` FOREIGN KEY (`subgoal_id`) REFERENCES `gb_goal` (`id`);

-- --------Ignore this table ---------
/*CREATE TABLE `gb_goal_mentorship` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `goal_commitment_id` integer NOT NULL,
    `mentorship_id` integer not null,
    `status` int not null default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_mentorship` ADD CONSTRAINT `goal_mentorship_goal_commitment_id` FOREIGN KEY (`goal_commitment_id`) REFERENCES `gb_goal_commitment` (`id`);
ALTER TABLE `gb_goal_mentorship` ADD CONSTRAINT `goal_mentorship_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_user` (`id`);
*/
CREATE TABLE `gb_mentorship` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `owner_id` int NOT NULL,
    `goal_id` integer NOT NULL,
    `title` varchar(200) not null,
    `description` varchar(1000) not null default "",
    `mentoring_level` int not null default 0,
    `type` int not null default 0,
    `status` int not null default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_mentorship` ADD CONSTRAINT `mentorship_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_mentorship` ADD CONSTRAINT `mentorship_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`);

/* CREATE TABLE `gb_goal_request` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `requester_id` int NOT NULL,
    `goal_id` int NOT NULL,
    `message` varchar(250) not null default "",
    `type` int not null,
    `status` int not null default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_request` ADD CONSTRAINT `goal_request_requester_id` FOREIGN KEY (`requester_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_goal_request` ADD CONSTRAINT `goal_request_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`);
*/
CREATE TABLE `gb_mentorship_enrolled` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `mentee_id` integer NOT NULL,
    `mentorship_id` integer not null,
    `status` int not null default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_mentorship_enrolled` ADD CONSTRAINT `mentorship_enrolled_mentee_id` FOREIGN KEY (`mentee_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_mentorship_enrolled` ADD CONSTRAINT `mentorship_enroled_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_mentorship` (`id`);


CREATE TABLE `gb_action` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `action` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE `gb_goal_user_puntos` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `user_id` integer NOT NULL,
    `puntos` integer NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_user_puntos` ADD CONSTRAINT `goal_user_puntos` FOREIGN KEY (`user_id`) REFERENCES `gb_user` (`id`);

CREATE TABLE `gb_request_notification` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `from_id` integer NOT NULL,
    `to_id` integer NOT NULL default 1,
    `notification_id` int not null,
    `message` varchar(500) not null default "", 
    `type` int not null,
    `status` int not null default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_request_notification` ADD CONSTRAINT `request_notification_from_id` FOREIGN KEY (`from_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_request_notification` ADD CONSTRAINT `request_notification_to_id` FOREIGN KEY (`to_id`) REFERENCES `gb_user` (`id`);

CREATE TABLE `gb_post` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `owner_id` integer NOT NULL,
    `source_id` int not null,
    `type` int not null,
    `status` int not null default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_post` ADD CONSTRAINT `post_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`);


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

/*load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/GoalRequest.txt' 
    into table goalbook.gb_goal_request 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
  (`id`, `requester_id`, `goal_id`, `message`, `type`, `status`);*/