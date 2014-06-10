<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-answer-list-item panel panel-default gb-no-padding" answer-id="<?php echo $answer->id; ?>">
  <div class="panel-body">
    <div class="row gb-panel-form gb-hide">
    </div>
    <div class="row gb-panel-display">
      <p>
        <strong class="gb-display-attribute" gb-control-target="#gb-answer-question-form-title"><?php echo $answer->goal->title; ?> </strong> 
        <span class="gb-display-attribute" gb-control-target="#gb-answer-question-form-description"><?php echo $answer->description; ?></span>
      </p>
    </div>
  </div>
  <?php if ($answer->mentorship->owner_id == Yii::app()->user->id): ?>
    <div class="panel-footer gb-panel-display gb-no-padding"> 
      <div class="row">
        <div class="btn-group pull-right">
          <a class="gb-edit-form-show btn btn-link"
            gb-form-target="#gb-answer-question-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a>
          <a class="gb-answer-list-item-delete btn btn-link"><i class="glyphicon glyphicon-trash"></i></a>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>


