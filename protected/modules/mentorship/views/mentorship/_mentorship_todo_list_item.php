<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-todo-list-item panel panel-default" mentorship-todo-id="<?php echo $mentorshipTodo->id; ?>">
  <div class="panel-body">
    <div class="row gb-panel-form gb-hide">
    </div>
    <div class="row gb-panel-display">
      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 gb-no-padding">
        <p><strong class="gb-display-attribute" gb-control-target="#gb-mentorship-todo-form-title-input"><?php echo $mentorshipTodo->todo->title; ?> </strong> 
          <span class="gb-display-attribute" gb-control-target="#gb-mentorship-todo-form-description-input"><?php echo $mentorshipTodo->todo->description; ?></span>
        </p>
      </div>
      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 gb-padding-thinnest">
        <a><?php echo $mentorshipTodo->todo->priority->level_name; ?> </a>
      </div>
      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
        <a class="btn btn-default btn-xs">Done</a>
      </div>
    </div>
  </div>
  <?php if ($mentorshipTodo->todo->assigner_id == Yii::app()->user->id): ?>
    <div class="panel-footer gb-no-padding">
      <div class="row">
        <div class="pull-left gb-padding-thin">By: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorshipTodo->todo->assigner_id)); ?>"><i><?php echo $mentorshipTodo->todo->assigner->profile->firstname . " " . $mentorshipTodo->todo->assigner->profile->lastname ?></i></a></div>
        <div class="btn-group pull-right">
          <a class="gb-edit-form-show btn btn-link"
             gb-form-target="#gb-mentorship-todo-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a> 
          <a class="btn btn-link"><i class="glyphicon glyphicon-trash"></i></a>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>


