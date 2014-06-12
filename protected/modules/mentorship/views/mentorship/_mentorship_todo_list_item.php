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
    <div class="gb-panel-display">
      <div class="col-lg-1 col-md-1 col-sm-1">
        <div class="checkbox">
          <label>
            <input type="checkbox">
          </label>
        </div>
      </div>
      <div class="col-lg-11 col-md-11 col-sm-11">
        <p><strong><?php echo $mentorshipTodo->todo->title; ?> </strong> 
          <?php echo $mentorshipTodo->todo->description; ?>
        </p>
      </div>
    </div>
  </div>
  <div class="panel-footer row">
    <div class="col-lg-10 col-md-9 col-sm-10">
      <a><?php echo $mentorshipTodo->todo->assigned_date; ?> </a> - ?
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2">
      <?php if ($mentorshipTodo->todo->assigner_id == Yii::app()->user->id): ?>
        <a class="btn btn-xs btn-link pull-right"><i class="glyphicon glyphicon-trash"></i></a>
        <a class="gb-edit-form-show btn btn-link pull-right"
           gb-form-target="#gb-mentorship-todo-form">
          <i class="glyphicon glyphicon-edit"></i>
        </a>
      <?php endif; ?>
    </div>
  </div>
</div>


