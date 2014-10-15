<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-question-answer-list-item panel panel-default row gb-background-light-grey-1" skill-question-answer-id="<?php echo $skillQuestionAnswerParent->id; ?>"
     gb-source-pk-id="<?php echo $skillQuestionAnswerParent->question_answer_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-12 col-sm-12 col-xs-12 panel panel-default gb-no-padding gb-no-margin gb-discussion-title-side-border">
    <div class="panel-body gb-padding-thin">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-skill-question-answer-form-title-input"><?php echo $skillQuestionAnswerParent->questionAnswer->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-skill-question-answer-form-description-input"><?php echo $skillQuestionAnswerParent->questionAnswer->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="panel-footer gb-no-padding">
      <div class="row gb-padding-left-1">
        <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillQuestionAnswerParent->questionAnswer->assigner->profile->avatar_url; ?>" class="gb-img-sm img-polariod pull-left" alt="">
        <div class="btn btn-sm pull-left">By: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillQuestionAnswerParent->questionAnswer->assigner_id)); ?>"><i><?php echo $skillQuestionAnswerParent->questionAnswer->assigner->profile->firstname . " " . $skillQuestionAnswerParent->questionAnswer->assigner->profile->lastname ?></i></a></div>
        <div class="btn-group pull-right">
          <a class="btn btn-sm btn-link gb-form-show"
             gb-is-child-form="1"
             gb-form-slide-target="<?php echo '#gb-skill-question-answer-child-form-container-' . $skillQuestionAnswerParent->id; ?>"
             gb-form-target="#gb-skill-question-answer-form"
             gb-form-parent-id-input="#gb-skill-question-answer-form-parent-question-answer-id-input"
             gb-form-heading="Add Skill QuestionAnswer"
             gb-form-parent-id="<?php echo $skillQuestionAnswerParent->id; ?>"
             <i class="glyphicon glyphicon-plus"></i>
            Add a QuestionAnswer 
          </a>
          <?php if ($skillQuestionAnswerParent->questionAnswer->assigner_id == Yii::app()->user->id): ?>
            <a class="gb-edit-form-show btn btn-sm btn-link"
               gb-form-target="#gb-skill-question-answer-form">
              <i class="glyphicon glyphicon-edit"></i>
            </a> 
            <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
          <?php endif; ?>
        </div> 
      </div>
    </div> 
    <div id="<?php echo 'gb-skill-question-answer-child-form-container-' . $skillQuestionAnswerParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div id="gb-question-answer-children">
      <?php
      $skillQuestionAnswerChildren = SkillQuestionAnswer::getSkillChildrenQuestionAnswers($skillQuestionAnswerParent->id);
      if (count($skillQuestionAnswerChildren) == 0):
        ?>
        <h5 class="text-center text-warning gb-no-information row">
          no questionAnswer(s) added.
        </h5>
      <?php endif; ?>

      <?php foreach ($skillQuestionAnswerChildren as $skillQuestionAnswerChild): ?>
        <?php
        $this->renderPartial('skill.views.skill.activity._skill_questionAnswer_child_list_item', array(
         "skillQuestionAnswerChild" => $skillQuestionAnswerChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>

