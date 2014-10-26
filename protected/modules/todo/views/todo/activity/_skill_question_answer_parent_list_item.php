<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-question-answer-list-item panel panel-default row gb-discussion-title-side-border" skill-question-answer-id="<?php echo $skillQuestionAnswerParent->id; ?>"
     gb-source-pk-id="<?php echo $skillQuestionAnswerParent->question_answer_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-1 col-md-1 col-sm-1 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillQuestionAnswerParent->questionAnswer->creator->profile->avatar_url; ?>" class="gb-parent-box-heading-img img-circle pull-right" alt="">
  </div>
  <div class="col-lg-11 col-sm-10 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <h5 class="gb-parent-box-heading">
        <span> 
          <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillQuestionAnswerParent->questionAnswer->creator_id)); ?>">
            <?php echo $skillQuestionAnswerParent->questionAnswer->creator->profile->firstname . " " . $skillQuestionAnswerParent->questionAnswer->creator->profile->lastname ?>
          </a>
        </span>
        <span><i>Skill QuestionAnswer</i></span>
      </h5>
      <div class="row gb-panel-display gb-padding-left-3">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-skill-question-answer-form-title-input"><?php echo $skillQuestionAnswerParent->questionAnswer->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-skill-question-answer-form-description-input"><?php echo $skillQuestionAnswerParent->questionAnswer->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-left">
        <a class="btn btn-sm btn-link gb-form-show"
           gb-is-child-form="1"
           gb-form-status="<?php echo QuestionAnswer::$STATUS_GENERAL; ?>"
           gb-form-status-id-input="#gb-skill-question-answer-form-status-input"
           gb-form-slide-target="<?php echo '#gb-skill-question-answer-child-form-container-' . $skillQuestionAnswerParent->id; ?>"
           gb-form-target="#gb-skill-question-answer-form"
           gb-form-parent-id-input="#gb-skill-question-answer-form-parent-question-answer-id-input"
           gb-form-heading="Add Skill QuestionAnswer"
           gb-form-parent-id="<?php echo $skillQuestionAnswerParent->id; ?>">
          <i class="glyphicon glyphicon-plus"></i>
          Reply
        </a>        
      </div>
      <div class="btn-group pull-right">
        <?php if ($skillQuestionAnswerParent->questionAnswer->creator_id == Yii::app()->user->id): ?>
          <a class="gb-edit-form-show btn btn-sm btn-link"
             gb-form-target="#gb-skill-question-answer-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a> 
          <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
        <?php endif; ?>
      </div>
    </div>
    <div id="<?php echo 'gb-skill-question-answer-child-form-container-' . $skillQuestionAnswerParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div>
      <?php
      $skillQuestionAnswerChildren = SkillQuestionAnswer::getSkillChildrenQuestionAnswers($skillQuestionAnswerParent->question_answer_id);
      ?>

      <?php foreach ($skillQuestionAnswerChildren as $skillQuestionAnswerChild): ?>
        <?php
        $this->renderPartial('skill.views.skill.activity._skill_question_answer_child_list_item', array(
         "skillQuestionAnswerChild" => $skillQuestionAnswerChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>

