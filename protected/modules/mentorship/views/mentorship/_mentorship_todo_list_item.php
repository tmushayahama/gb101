<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="panel panel-default">
  <div class="panel-body row">
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
  <div class="panel-footer row">
    <div class="col-lg-10 col-md-9 col-sm-10">
      <a><?php echo $mentorshipTodo->todo->assigned_date; ?> </a> - ?
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2">   
      <a class="btn btn-xs btn-link pull-right"><i class="glyphicon glyphicon-trash"></i></a>
      <a class="btn btn-xs btn-link pull-right"><i class="glyphicon glyphicon-edit"></i></a>
    </div>
  </div>
</div>


