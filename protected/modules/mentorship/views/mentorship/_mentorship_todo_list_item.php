<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry-row gb-todo-list-item panel panel-default row gb-background-light-grey-1" mentorship-todo-id="<?php echo $mentorshipTodo->id; ?>"
     data-gb-source-pk="<?php echo $mentorshipTodo->todo_id; ?>" data-gb-source="<?php echo Type::$SOURCE_TODO; ?>">
  <div class="col-lg-2 col-sm-2 col-xs-2">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorshipTodo->todo->creator->profile->avatar_url; ?>" class="gb-img-md pull-right img-polariod" alt="">
  </div>
  <div class="col-lg-10 col-sm-10 col-xs-10 panel panel-default gb-no-padding gb-discussion-title-side-border">
    <div class="panel-body">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-11 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-mentorship-todo-form-title-input"><?php echo $mentorshipTodo->todo->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-mentorship-todo-form-description-input"><?php echo $mentorshipTodo->todo->description; ?></span>
          </p>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 gb-padding-thinnest">
          <p>
            <span class="gb-display-attribute" gb-control-target="#gb-mentorship-todo-form-priority-id-input" gb-option-id="<?php echo $mentorshipTodo->todo->priority_id; ?>"><?php echo $mentorshipTodo->todo->priority->name; ?> </span>
          </p>
        </div>
      </div>
    </div>
    <div class="panel-footer gb-no-padding">
      <div class="row">
        <div class="pull-left gb-padding-thin">By: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorshipTodo->todo->creator_id)); ?>"><i><?php echo $mentorshipTodo->todo->creator->profile->firstname . " " . $mentorshipTodo->todo->creator->profile->lastname ?></i></a></div>
        <div class="btn-group pull-right">
          <a class="gb-todo-done btn btn-default btn-xs">Done</a>
          <?php if ($mentorshipTodo->todo->creator_id == Yii::app()->user->id): ?>
            <a class="gb-edit-form-show btn btn-link"
               data-gb-target="#gb-mentorship-todo-form">
              <i class="glyphicon glyphicon-edit"></i>
            </a> 
            <a class="gb-delete-me btn btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
            <?php endif; ?>
        </div> 
      </div>
    </div>
  </div>
</div>


