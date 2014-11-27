<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry-row gb-question-list-item panel panel-default row gb-background-light-grey-1" mentorship-answer-id="<?php echo $mentorshipAnswer->id; ?>"
     gb-source-pk-id="<?php echo $mentorshipAnswer->id; ?>" gb-data-source="<?php echo Type::$SOURCE_MENTORSHIP_ASK_ANSWER; ?>">
  <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-2 col-lg-2 col-sm-2 col-xs-2">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorshipAnswer->questionee->profile->avatar_url; ?>" class="gb-img-md img-polariod pull-right" alt="">
  </div>
  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 panel panel-default gb-no-padding gb-discussion-reply-side-border">
    <div class="panel-body">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display">
        <p>
          <span class="gb-display-attribute" gb-control-target="#gb-mentorship-answer-form-description"><?php echo $mentorshipAnswer->mentorship_answer; ?></span>
        </p>
      </div>
    </div>
    <div class="panel-footer gb-panel-display gb-no-padding"> 
      <div class="row">
        <div class="pull-left gb-padding-thin">By: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorshipAnswer->questionee_id)); ?>"><i><?php echo $mentorshipAnswer->questionee->profile->firstname . " " . $mentorshipAnswer->questionee->profile->lastname ?></i></a></div>
        <?php if ($mentorshipAnswer->mentorship->creator_id == Yii::app()->user->id): ?>
          <div class="btn-group pull-right">
            <a class="gb-delete-me btn btn-sm btn-link"><i class="glyphicon glyphicon-trash"></i></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

