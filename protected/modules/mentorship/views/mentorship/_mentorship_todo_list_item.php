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
      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
        <div class="checkbox">
          <label>
            <input type="checkbox">
          </label>
        </div>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-11">
        <p><strong class="gb-display-attribute" gb-control-target="#gb-mentorship-todo-form-title-input"><?php echo $mentorshipTodo->todo->title; ?> </strong> 
          <span class="gb-display-attribute" gb-control-target="#gb-mentorship-todo-form-description-input"><?php echo $mentorshipTodo->todo->description; ?></span>
        </p>
        <a><?php echo $mentorshipTodo->todo->assigned_date; ?> </a>
      </div>
      <?php if ($mentorshipTodo->todo->assigner_id == Yii::app()->user->id): ?>
        <div class="panel-footer col-lg-2 col-md-2 col-sm-2 col-xs-12 gb-no-padding">
          <a class="gb-edit-form-show btn btn-link"
             gb-form-target="#gb-mentorship-todo-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a> 
          <a class="btn btn-link"><i class="glyphicon glyphicon-trash"></i></a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>


