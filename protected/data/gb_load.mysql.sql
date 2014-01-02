
-- ------------------Initial Users ------------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/User.txt' 
    into table goalbook.gb_user 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
    (`id`, `username`, `password`, `email`, `activkey`, `superuser`, `status`);

-- ------------------Profile ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Profile.txt' 
    into table goalbook.gb_profile 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
   (`id`, `user_id`, `lastname`,  `firstname`, `specialty`, `avatar_url`, `favorite_quote`,`gender`, `birthdate`);

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
    (`id`, `connection_picture`, `name`, `description`, `created_date`);

-- ------------------Goal ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/Goal.txt' 
    into table goalbook.gb_goal 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
    (`id`, `type_id`, `title`, `description`, `points_pledged`, `assign_date`, `begin_date`, `end_date`);

-- ------------------Goal Assignments ----------------
load data local infile 'C:/xampp/htdocs/goalbook/protected/data/Initializers/GoalAssignment.txt' 
    into table goalbook.gb_goal_assignment 
    fields terminated by '\t' 
    enclosed by '"' 
    escaped by '\\' 
    lines terminated by '\r\n'
    ignore 1 LINES
   (`id`, `assigner_id`, `assignee_id`, `goal_id`, `connection_id`);

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