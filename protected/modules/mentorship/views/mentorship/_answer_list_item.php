<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="panel panel-default gb-no-padding" answer-id="<?php echo $answer->id; ?>">
  <div class="panel-body">
    <div class="row gb-panel-form-inner gb-hide">
    </div>
    <div class="row gb-panel-display-inner">
      <p><strong><?php echo $answer->goal->title; ?> </strong> 
        <?php echo $answer->description; ?>
      </p>
    </div>
  </div>
  <?php if ($answer->mentorship->owner_id == Yii::app()->user->id): ?>
    <div class="panel-footer gb-panel-display-inner gb-no-padding"> 
      <div class="row">
        <div class="btn-group pull-right">
          <a class="gb-answer-list-item-edit gb-form-show-inner btn btn-link"><i class="glyphicon glyphicon-edit"></i></a>
          <a class="gb-answer-list-item-delete btn btn-link"><i class="glyphicon glyphicon-trash"></i></a>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>


