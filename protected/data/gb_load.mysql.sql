
insert into `gb_goal_type` ( `category`, `type`, `description`) values
('skill', 'Academic', ''),
('skill', 'Self Management', ''),
('skill', 'Transferable', ''),
('goal', 'Physical', ''),
('goal', 'Social', ''),
('goal', 'Career', ''),
('goal', 'Financial', ''),
('goal', 'Self Improvement and Spiritual', ''),
('goal', 'Pleasure', ''),
('goal', 'Relationships and Family', '');

insert into `gb_connection` ( `name`, `description`, `created_date`) values
('Public', '', '0000-00-00 00:00:00'),
('Friends', '', '0000-00-00 00:00:00'),
('Family', '', '0000-00-00 00:00:00'),
('Followers', '', '0000-00-00 00:00:00');

INSERT INTO `gb_user` (`id`, `username`, `password`, `email`, `activkey`, `superuser`, `status`) VALUES
(1, 'goalbook', '827ccb0eea8a706c4c34a16891f84e7b', 'goalbook@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(2, 'tremayne@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'tremayne@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(3, 'tag@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'tag@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(4, 'lindah@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'lindah@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(5, 'john@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'john@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(6, 'joyce@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'joyce@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(7, 'paul@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'paul@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1);

INSERT INTO `gb_profile` (`user_id`, `firstname`, `lastname`, `gender`, `birthdate`) VALUES
(1, 'GoalBook', 'Bot',   'J', '2001-12-12'),
(2, 'Tremayne', 'Mushayahama',   'M', '2001-12-12'),
(3, 'Tag', 'Para',   'M', '2000-11-12'),
(4, 'Lindah', 'Nolle',  'F', '2002-10-12'),
(5, 'John', 'Nolle',   'M', '1956-8-12'),
(6, 'Joyce', 'Mushayahama',   'F', '1985-1-12'),
(7, 'Paul', 'Ash',   'M', '1974-2-12');

INSERT INTO `gb_user_connection` (`owner_id`, `connection_member_id`, `connection_id`, `added_date`) VALUES
(2, 2, 1, '2001-12-12'),
(2, 2, 2, '2001-12-12'),
(2, 2, 3, '2001-12-12'),
(2, 2, 4, '2001-12-12'),
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
(6, 6, 3, '2001-12-12'),
(7, 7, 1, '2001-12-12'),
(7, 7, 2, '2001-12-12'),
(7, 7, 3, '2001-12-12');

INSERT INTO `gb_goal` (`id`, `type_id`, `description`, `points_pledged`, `assign_date`, `begin_date`, `end_date`) VALUES
(1, 5, 'Make a random list of goals you want to accomplish', 20, '0001-01-01', '0001-01-01', '0001-01-01'),
(2, 5, 'Write an encouraging quote on your profile', 3, '0001-01-01', '0001-01-01', '0001-01-01'),
(3, 5, 'Learn the acronym S.M.A.R.T.', 20, '0001-01-01', '0001-01-01', '0001-01-01'),
(4, 5, 'Finish your profile', 30, '0001-01-01', '0001-01-01', '0001-01-01'),
(5, 2, 'Add at least 20 people to your connections', 5, '0001-01-01', '0001-01-01', '0001-01-01');

INSERT INTO `gb_goal_assignment` (`id`, `assigner_id`, `assignee_id`, `goal_id`, `connection_id`) VALUES
(1, 1, 2, 1, 1),
(2, 1, 2, 2, 1),
(3, 1, 2, 3, 1),
(4, 1, 2, 4, 1),
(5, 1, 2, 5, 1);

