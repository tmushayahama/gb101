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
`avatar_url` varchar(100) NOT NULL DEFAULT 'gb_default_avatar.png',
`favorite_quote` varchar (500) not null default '',
  `gender` varchar(3) NOT NULL,
    `birthdate` date NOT NULL,
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

CREATE TABLE `gb_goal_type` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `category` varchar(50) NOT NULL,
    `type` varchar(50) NOT NULL,
    `description` varchar(150) NOT NULL default ''
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE `gb_connection` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `name` varchar(50) NOT NULL,
    `description` varchar(150) NOT NULL default '',
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
    `description` varchar(150) NOT NULL,
    `points_pledged` integer,
    `assign_date` datetime NOT NULL,
    `begin_date` datetime,
    `end_date` datetime,
    `status` int default 0
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal` ADD CONSTRAINT `goal_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_goal_type` (`id`);

CREATE TABLE `gb_goal_list` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `type` integer NOT NULL,
    `user_id` integer NOT NULL,
    `goal_id` int NOT NULL,
    `skill_level` integer not null default 1
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_list` ADD CONSTRAINT `goal_list_user_id` FOREIGN KEY (`user_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_goal_list` ADD CONSTRAINT `goal_goal_id` FOREIGN KEY (`goal_id`) REFERENCES `gb_goal` (`id`);

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


CREATE TABLE `gb_goal_commitment` (
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

CREATE TABLE `gb_goal_mentorship` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `goal_commitment_id` integer NOT NULL,
    `mentorship_id` integer not null,
    `status` int not null default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_mentorship` ADD CONSTRAINT `goal_mentorship_goal_commitment_id` FOREIGN KEY (`goal_commitment_id`) REFERENCES `gb_goal_commitment` (`id`);
ALTER TABLE `gb_goal_mentorship` ADD CONSTRAINT `goal_mentorship_mentorship_id` FOREIGN KEY (`mentorship_id`) REFERENCES `gb_user` (`id`);

CREATE TABLE `gb_goal_monitor` (
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

CREATE TABLE `gb_request_notifications` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `from_id` integer NOT NULL,
    `to_id` integer NOT NULL,
    `notification_id` int not null,
    `type` int not null,
    `status` int not null default 0
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_request_notifications` ADD CONSTRAINT `request_notifications_from_id` FOREIGN KEY (`from_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_request_notifications` ADD CONSTRAINT `request_notifications_to_id` FOREIGN KEY (`to_id`) REFERENCES `gb_user` (`id`);