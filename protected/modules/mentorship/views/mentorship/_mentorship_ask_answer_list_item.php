<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-question-answer-list-item panel panel-default gb-no-padding" mentorship-answer-id="<?php echo $mentorshipAnswer->id; ?>"
     gb-source-pk-id="<?php echo $mentorshipAnswer->id; ?>" gb-data-source="<?php echo Type::$SOURCE_MENTORSHIP_ASK_ANSWER; ?>">
  <div class="panel-body">
    <div class="row gb-panel-form gb-hide">
    </div>
    <div class="row gb-panel-display">
      <p>
        <span class="gb-display-attribute" gb-control-target="#gb-mentorship-answer-form-description"><?php echo $mentorshipAnswer->mentorship_answer; ?></span>
      </p>
    </div>
  </div>
  <?php if ($mentorshipAnswer->mentorship->owner_id == Yii::app()->user->id): ?>
    <div class="panel-footer gb-panel-display gb-no-padding"> 
      <div class="row">
        <div class="btn-group pull-right">
          <a class="gb-delete-me btn btn-sm btn-link"><i class="glyphicon glyphicon-trash"></i></a>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>

