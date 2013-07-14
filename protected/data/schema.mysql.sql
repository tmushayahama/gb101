DROP USER 'gb'@'localhost';
CREATE USER 'gb'@'localhost' IDENTIFIED BY 'goal++';
DROP DATABASE IF EXISTS goalbook;
CREATE DATABASE goalbook DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
GRANT ALL PRIVILEGES ON goalbook.* to 'gb'@'localhost' WITH GRANT OPTION;
USE goalbook;
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
  `gender` varchar(3) NOT NULL,
    `birthdate` date NOT NULL,
    `phone_number` varchar(20) NOT NULL default '',
    `address` varchar(255) NOT NULL default '',
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
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

INSERT INTO `gb_profile_field` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);

CREATE TABLE `gb_category` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `name` varchar(150) NOT NULL UNIQUE,
    `description` varchar(3000) NOT NULL
);
CREATE TABLE `gb_type` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `name` varchar(150) NOT NULL UNIQUE,
    `category_id` integer NOT NULL,
    `description` varchar(3000) NOT NULL
);
ALTER TABLE `gb_type` 
	ADD CONSTRAINT `type_category_id` FOREIGN KEY (`category_id`) REFERENCES `gb_category` (`id`);
CREATE TABLE `gb_task` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `name` varchar(150) NOT NULL,
    `description` varchar(3000) NOT NULL default '',
    `task_type_id` integer NOT NULL,
    `task_category_id` integer NOT NULL,
    `points_awarded` integer,
    `award` varchar(765) NOT NULL,
    `assign_date` datetime NOT NULL,
    `begin_date` datetime NOT NULL,
    `end_date` datetime
)
;
ALTER TABLE `gb_task` ADD CONSTRAINT `task_task_type_id` FOREIGN KEY (`task_type_id`) REFERENCES `gb_type` (`id`);
ALTER TABLE `gb_task` ADD CONSTRAINT `task_task_category_id` FOREIGN KEY (`task_category_id`) REFERENCES `gb_type` (`id`);
CREATE TABLE `gb_user_goal_list` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `user_id` integer NOT NULL UNIQUE,
    `name` varchar(150) NOT NULL,
    `date_listed` datetime NOT NULL
)
;
ALTER TABLE `gb_user_goal_list` ADD CONSTRAINT `user_goal_list_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);
CREATE TABLE `gb_user_profile` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `user_id` integer NOT NULL UNIQUE,
    `welcome_note` varchar(150) NOT NULL,
    `cover_goal_1_id` integer,
    `cover_goal_2_id` integer,
    `cover_goal_3_id` integer
)
;
ALTER TABLE `gb_user_profile` ADD CONSTRAINT `cover_goal_1_id_refs_id_bd733d8` FOREIGN KEY (`cover_goal_1_id`) REFERENCES `gb_user_goal_list` (`id`);
ALTER TABLE `gb_user_profile` ADD CONSTRAINT `cover_goal_2_id_refs_id_bd733d8` FOREIGN KEY (`cover_goal_2_id`) REFERENCES `gb_user_goal_list` (`id`);
ALTER TABLE `gb_user_profile` ADD CONSTRAINT `cover_goal_3_id_refs_id_bd733d8` FOREIGN KEY (`cover_goal_3_id`) REFERENCES `gb_user_goal_list` (`id`);
ALTER TABLE `gb_user_profile` ADD CONSTRAINT `user_id_refs_id_e5a145a` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);
CREATE TABLE `gb_group` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `name` varchar(150) NOT NULL UNIQUE,
    `founder_id` integer NOT NULL,
    `group_type_id` integer NOT NULL,
    `group_category_id` integer NOT NULL,
    `founded` datetime NOT NULL,
    `decription` varchar(3000) NOT NULL
)
;
ALTER TABLE `gb_group` ADD CONSTRAINT `group_type_id_refs_id_2d5c5817` FOREIGN KEY (`group_type_id`) REFERENCES `gb_type` (`id`);
ALTER TABLE `gb_group` ADD CONSTRAINT `group_category_id_refs_id_2d5c5817` FOREIGN KEY (`group_category_id`) REFERENCES `gb_type` (`id`);
ALTER TABLE `gb_group` ADD CONSTRAINT `founder_id_refs_id_61aa73a3` FOREIGN KEY (`founder_id`) REFERENCES `auth_user` (`id`);
CREATE TABLE `gb_group_goal_list` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `group_id` integer NOT NULL UNIQUE,
    `name` varchar(150) NOT NULL,
    `date_listed` datetime NOT NULL
)
;
ALTER TABLE `gb_group_goal_list` ADD CONSTRAINT `group_id_refs_id_365584b2` FOREIGN KEY (`group_id`) REFERENCES `gb_group` (`id`);
CREATE TABLE `gb_group_profile` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `group_id` integer NOT NULL UNIQUE,
    `welcome_note` varchar(150) NOT NULL,
    `cover_goal_1_id` integer,
    `cover_goal_2_id` integer,
    `cover_goal_3_id` integer
)
;
ALTER TABLE `gb_group_profile` ADD CONSTRAINT `cover_goal_1_id_refs_id_7676f8be` FOREIGN KEY (`cover_goal_1_id`) REFERENCES `gb_group_goal_list` (`id`);
ALTER TABLE `gb_group_profile` ADD CONSTRAINT `cover_goal_2_id_refs_id_7676f8be` FOREIGN KEY (`cover_goal_2_id`) REFERENCES `gb_group_goal_list` (`id`);
ALTER TABLE `gb_group_profile` ADD CONSTRAINT `cover_goal_3_id_refs_id_7676f8be` FOREIGN KEY (`cover_goal_3_id`) REFERENCES `gb_group_goal_list` (`id`);
ALTER TABLE `gb_group_profile` ADD CONSTRAINT `group_id_refs_id_2e355089` FOREIGN KEY (`group_id`) REFERENCES `gb_group` (`id`);
CREATE TABLE `gb_is_member` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `user_id` integer NOT NULL,
    `group_id` integer NOT NULL,
    `member_type_id` integer NOT NULL,
    `date_joined` datetime NOT NULL
)
;
ALTER TABLE `gb_is_member` ADD CONSTRAINT `group_id_refs_id_461d7e4d` FOREIGN KEY (`group_id`) REFERENCES `gb_group` (`id`);
ALTER TABLE `gb_is_member` ADD CONSTRAINT `member_type_id_refs_id_658b4a91` FOREIGN KEY (`member_type_id`) REFERENCES `gb_type` (`id`);
ALTER TABLE `gb_is_member` ADD CONSTRAINT `user_id_refs_id_467900fb` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);
CREATE TABLE `gb_group_task` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `taskee` integer NOT NULL,
    `tasker` integer NOT NULL,
    `task_id` integer NOT NULL
)
;
ALTER TABLE `gb_group_task` ADD CONSTRAINT `taskee_refs_id_843ee16` FOREIGN KEY (`taskee`) REFERENCES `gb_group` (`id`);
ALTER TABLE `gb_group_task` ADD CONSTRAINT `tasker_refs_id_843ee16` FOREIGN KEY (`tasker`) REFERENCES `gb_group` (`id`);
ALTER TABLE `gb_group_task` ADD CONSTRAINT `task_id_refs_id_65d81851` FOREIGN KEY (`task_id`) REFERENCES `gb_task` (`id`);
CREATE TABLE `gb_group_monitor` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `user_id` integer NOT NULL,
    `monitor_id` integer NOT NULL,
    `task_id` integer NOT NULL,
    `monitor_type_id` integer NOT NULL,
    `monitor_status_id` integer NOT NULL
)
;
ALTER TABLE `gb_group_monitor` ADD CONSTRAINT `user_id_refs_id_6b06c7c6` FOREIGN KEY (`user_id`) REFERENCES `gb_group` (`id`);
ALTER TABLE `gb_group_monitor` ADD CONSTRAINT `monitor_id_refs_id_6b06c7c6` FOREIGN KEY (`monitor_id`) REFERENCES `gb_group` (`id`);
ALTER TABLE `gb_group_monitor` ADD CONSTRAINT `monitor_type_id_refs_id_1aa77530` FOREIGN KEY (`monitor_type_id`) REFERENCES `gb_type` (`id`);
ALTER TABLE `gb_group_monitor` ADD CONSTRAINT `monitor_status_id_refs_id_1aa77530` FOREIGN KEY (`monitor_status_id`) REFERENCES `gb_type` (`id`);
ALTER TABLE `gb_group_monitor` ADD CONSTRAINT `task_id_refs_id_428987db` FOREIGN KEY (`task_id`) REFERENCES `gb_task` (`id`);
CREATE TABLE `gb_user_monitor` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `user_id` integer NOT NULL,
    `monitor_id` integer NOT NULL,
    `task_id` integer NOT NULL,
    `monitor_type_id` integer NOT NULL,
    `monitor_status_id` integer NOT NULL
)
;
ALTER TABLE `gb_user_monitor` ADD CONSTRAINT `task_id_refs_id_4df5ee22` FOREIGN KEY (`task_id`) REFERENCES `gb_task` (`id`);
ALTER TABLE `gb_user_monitor` ADD CONSTRAINT `monitor_type_id_refs_id_67051a5f` FOREIGN KEY (`monitor_type_id`) REFERENCES `gb_type` (`id`);
ALTER TABLE `gb_user_monitor` ADD CONSTRAINT `monitor_status_id_refs_id_67051a5f` FOREIGN KEY (`monitor_status_id`) REFERENCES `gb_type` (`id`);
ALTER TABLE `gb_user_monitor` ADD CONSTRAINT `user_id_refs_id_1f1f9a15` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);
ALTER TABLE `gb_user_monitor` ADD CONSTRAINT `monitor_id_refs_id_1f1f9a15` FOREIGN KEY (`monitor_id`) REFERENCES `auth_user` (`id`);
CREATE TABLE `gb_user_task` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `taskee` integer NOT NULL,
    `tasker` integer NOT NULL,
    `task_id` integer NOT NULL
)
;
ALTER TABLE `gb_user_task` ADD CONSTRAINT `task_id_refs_id_49f3a7a4` FOREIGN KEY (`task_id`) REFERENCES `gb_task` (`id`);
ALTER TABLE `gb_user_task` ADD CONSTRAINT `taskee_refs_id_6d3049db` FOREIGN KEY (`taskee`) REFERENCES `auth_user` (`id`);
ALTER TABLE `gb_user_task` ADD CONSTRAINT `tasker_refs_id_6d3049db` FOREIGN KEY (`tasker`) REFERENCES `auth_user` (`id`);
CREATE TABLE `gb_relationship` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `user_id` integer NOT NULL,
    `friend_id` integer NOT NULL,
    `friendship_type_id` integer NOT NULL,
    `friendship_status_id` integer NOT NULL,
    `request_date` datetime NOT NULL,
    `accepted_date` datetime NOT NULL
)
;
ALTER TABLE `gb_relationship` ADD CONSTRAINT `friendship_type_id_refs_id_72b5c9ef` FOREIGN KEY (`friendship_type_id`) REFERENCES `gb_type` (`id`);
ALTER TABLE `gb_relationship` ADD CONSTRAINT `friendship_status_id_refs_id_72b5c9ef` FOREIGN KEY (`friendship_status_id`) REFERENCES `gb_type` (`id`);
ALTER TABLE `gb_relationship` ADD CONSTRAINT `user_id_refs_id_4ff37685` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);
ALTER TABLE `gb_relationship` ADD CONSTRAINT `friend_id_refs_id_4ff37685` FOREIGN KEY (`friend_id`) REFERENCES `auth_user` (`id`);
CREATE TABLE `gb_task_timeline` (
    `id` integer AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `task_id` integer NOT NULL,
    `entry_name` varchar(150) NOT NULL UNIQUE,
    `entry_time` datetime NOT NULL
)
;
ALTER TABLE `gb_task_timeline` ADD CONSTRAINT `task_id_refs_id_62616d10` FOREIGN KEY (`task_id`) REFERENCES `gb_task` (`id`);
COMMIT;
