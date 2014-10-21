<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-post-entry gb-question-answer-list-item row gb-discussion-title-side-border" skill-question-answer-id="<?php echo $skillQuestionAnswerChild->id; ?>"
     gb-source-pk-id="<?php echo $skillQuestionAnswerChild->question_answer_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillQuestionAnswerChild->questionAnswer->creator->profile->avatar_url; ?>" class="gb-child-box-heading-img img-circle pull-right" alt="">
  </div>
  <div class="col-lg-11 col-sm-10 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <h5 class="gb-child-box-heading">
        <span> 
          <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillQuestionAnswerChild->questionAnswer->creator_id)); ?>">
            <?php echo $skillQuestionAnswerChild->questionAnswer->creator->profile->firstname . " " . $skillQuestionAnswerChild->questionAnswer->creator->profile->lastname ?>
          </a>
        </span>
      </h5>
      <div class="row gb-panel-display gb-padding-left-1">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-skill-question-answer-form-title-input"><?php echo $skillQuestionAnswerChild->questionAnswer->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-skill-question-answer-form-description-input"><?php echo $skillQuestionAnswerChild->questionAnswer->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-right">
        <?php if ($skillQuestionAnswerChild->questionAnswer->creator_id == Yii::app()->user->id): ?>
          <a class="gb-edit-form-show btn btn-xs btn-link"
             gb-form-target="#gb-skill-question-answer-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a> 
          <a class="gb-delete-me btn btn-xs btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
          <?php endif; ?>
      </div> 
    </div>
  </div>
</div> 