<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-block gb-block-row gb-question-list-item row gb-discussion-title-side-border" mentorship-question-id="<?php echo $mentorshipQuestionChild->id; ?>"
     data-gb-source-pk="<?php echo $mentorshipQuestionChild->question_id; ?>" data-gb-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-1 col-md-1 col-sm-1 gb-padding-none">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorshipQuestionChild->question->creator->profile->avatar_url; ?>" class="gb-child-box-heading-img img-circle pull-right" alt="">
  </div>
  <div class="col-lg-11 col-sm-10 col-xs-12 gb-padding-none gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <h5 class="gb-child-box-heading">
        <span> 
          <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorshipQuestionChild->question->creator_id)); ?>">
            <?php echo $mentorshipQuestionChild->question->creator->profile->firstname . " " . $mentorshipQuestionChild->question->creator->profile->lastname ?>
          </a>
        </span>
      </h5>
      <div class="row gb-panel-display gb-padding-left-1">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-mentorship-question-form-title-input"><?php echo $mentorshipQuestionChild->question->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-mentorship-question-form-description-input"><?php echo $mentorshipQuestionChild->question->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-right">
        <?php if ($mentorshipQuestionChild->question->creator_id == Yii::app()->user->id): ?>
          <a class="gb-edit-form-show btn btn-xs btn-link"
             data-gb-target="#gb-mentorship-question-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a> 
          <a class="gb-delete-me btn btn-xs btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
          <?php endif; ?>
      </div> 
    </div>
  </div>
</div> 