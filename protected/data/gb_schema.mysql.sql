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
    `type` varchar(50) NOT NULL,
    `description` varchar(150) NOT NULL default ''
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE `gb_circle` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `name` varchar(50) NOT NULL,
    `description` varchar(150) NOT NULL default '',
    `created_date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE `gb_user_circle` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `owner_id` integer NOT NULL,
    `circle_member_id` integer NOT NULL,
	`circle_id` integer NOT NULL,
    `added_date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_user_circle` ADD CONSTRAINT `user_circle_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_user_circle` ADD CONSTRAINT `user_circle_circle_member_id` FOREIGN KEY (`circle_member_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_user_circle` ADD CONSTRAINT `user_circle_circle_id` FOREIGN KEY (`circle_id`) REFERENCES `gb_circle` (`id`);


CREATE TABLE `gb_goal_commitment` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
	`user_id` integer NOT NULL,
    `type_id` integer NOT NULL,
    `description` varchar(150) NOT NULL default '',
    `points_pledged` integer,
    `assign_date` datetime NOT NULL,
    `begin_date` datetime NOT NULL,
    `end_date` datetime
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_commitment` ADD CONSTRAINT `goal_commitment_user_id` FOREIGN KEY (`user_id`) REFERENCES `gb_user` (`id`);
ALTER TABLE `gb_goal_commitment` ADD CONSTRAINT `goal_commitment_type_id` FOREIGN KEY (`type_id`) REFERENCES `gb_goal_type` (`id`);

CREATE TABLE `gb_goal_commitment_circle` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `goal_commitment_id` int NOT NULL,
    `circle_id` integer
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
ALTER TABLE `gb_goal_commitment_circle` ADD CONSTRAINT `goal_commitment_circle_goal_commitment_id` FOREIGN KEY (`goal_commitment_id`) REFERENCES `gb_goal_commitment` (`id`);
ALTER TABLE `gb_goal_commitment_circle` ADD CONSTRAINT `goal_commitment_circle_goal_circle_id` FOREIGN KEY (`circle_id`) REFERENCES `gb_circle` (`id`);


