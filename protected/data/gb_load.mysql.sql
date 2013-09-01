
insert into `gb_goal_type` ( `type`, `description`) values
('Physical', ''),
('Social', ''),
('Career', ''),
('Financial', ''),
('Self Improvement and Spiritual', ''),
('Pleasure', ''),
('Relationships and Family', '');

insert into `gb_connection` ( `name`, `description`, `created_date`) values
('Friends', '', '0000-00-00 00:00:00'),
('Family', '', '0000-00-00 00:00:00'),
('Followers', '', '0000-00-00 00:00:00');

INSERT INTO `gb_user` (`id`, `username`, `password`, `email`, `activkey`, `superuser`, `status`) VALUES
(1, 'tremayne@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'tremayne@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(2, 'tag@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'tag@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(3, 'lindah@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'lindah@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(4, 'john@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'john@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(5, 'joyce@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'joyce@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(6, 'paul@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'paul@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1);

INSERT INTO `gb_profile` (`user_id`, `lastname`, `firstname`, `gender`, `birthdate`) VALUES
(1, 'Tremayne', 'Mushayahama',   'M', '2001-12-12'),
(2, 'Tag', 'Para',   'M', '2000-11-12'),
(3, 'Lindah', 'Nolle',  'F', '2002-10-12'),
(4, 'John', 'Nolle',   'M', '1956-8-12'),
(5, 'Joyce', 'Mushayahama',   'F', '1985-1-12'),
(6, 'Paul', 'Ash',   'M', '1974-2-12');

INSERT INTO `gb_user_connection` (`owner_id`, `connection_member_id`, `connection_id`, `added_date`) VALUES
(1, 1, 1, '2001-12-12'),
(1, 1, 2, '2001-12-12'),
(1, 1, 3, '2001-12-12'),
(2, 2, 1, '2001-12-12'),
(2, 2, 2, '2001-12-12'),
(2, 2, 3, '2001-12-12'),
(3, 3, 1, '2001-12-12'),
(3, 3, 2, '2001-12-12'),
(3, 3, 3, '2001-12-12'),
(4, 4, 1, '2001-12-12'),
(4, 4, 2, '2001-12-12'),
(4, 4, 3, '2001-12-12'),
(5, 5, 1, '2001-12-12'),
(5, 5, 2, '2001-12-12'),
(5, 5, 3, '2001-12-12'),
(6, 6, 1, '2001-12-12'),
(6, 6, 2, '2001-12-12'),
(6, 6, 3, '2001-12-12');
