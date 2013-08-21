
insert into `gb_goal_type` ( `type`, `description`) values
('physical', ''),
('social', ''),
('career', ''),
('financial', ''),
('self improvement and spiritual', ''),
('pleasure', ''),
('relationships and family', '');

insert into `gb_circle` ( `name`, `description`, `created_date`) values
('friends', '', '0000-00-00 00:00:00'),
('family', '', '0000-00-00 00:00:00'),
('public', '', '0000-00-00 00:00:00'),
('followers', '', '0000-00-00 00:00:00');

INSERT INTO `gb_user` (`id`, `username`, `password`, `email`, `activkey`, `superuser`, `status`) VALUES
(1, 'test1@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'test1@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(2, 'test2@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'test2@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(3, 'test3@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'test3@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(4, 'test4@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'test4@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(5, 'test5@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'test5@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(6, 'test6@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 'test6@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1);

INSERT INTO `gb_profile` (`user_id`, `lastname`, `firstname`, `gender`, `birthdate`) VALUES
(1, 'Test1', 'One',   'M', '2001-12-12'),
(2, 'Test2', 'Two',   'M', '2000-11-12'),
(3, 'Test3', 'Three',  'F', '2002-10-12'),
(4, 'Test4', 'Four',   'M', '1956-8-12'),
(5, 'Test5', 'Five',   'F', '1985-1-12'),
(6, 'Test6', 'Six',   'F', '1974-2-12');