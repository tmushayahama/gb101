<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-post-entry gb-bottom-border-grey-1 gb-question-answer-list-item row gb-padding-left-3" skill-question-answer-id="<?php echo $skillQuestionAnswerChild->id; ?>"
     gb-source-pk-id="<?php echo $skillQuestionAnswerChild->question_answer_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-margin">
    <div class="row gb-padding-thin">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-skill-question-answer-form-title-input"><?php echo $skillQuestionAnswerChild->questionAnswer->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-skill-question-answer-form-description-input"><?php echo $skillQuestionAnswerChild->questionAnswer->description; ?></span>
          </p>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gb-no-padding">
          <div class="gb-show-more-btn btn btn-link btn-xs pull-right"
               gb-closest-parent=".gb-question-answer-list-item">
            More
          </div>
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
    <div class="gb-hide gb-no-padding gb-show-more">
      <div class="row gb-padding-left-3">
        <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillQuestionAnswerChild->questionAnswer->creator->profile->avatar_url; ?>" class="gb-img-sm img-polariod pull-left" alt="">
        <div class="btn btn-sm pull-left">By: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillQuestionAnswerChild->questionAnswer->creator_id)); ?>"><i><?php echo $skillQuestionAnswerChild->questionAnswer->creator->profile->firstname . " " . $skillQuestionAnswerChild->questionAnswer->creator->profile->lastname ?></i></a></div>

      </div>
    </div>
  </div>
</div> 


