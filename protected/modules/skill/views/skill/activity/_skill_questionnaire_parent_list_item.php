<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-parent-box row" skill-question-answer-id="<?php echo $skillQuestionAnswerParent->id; ?>"
     gb-source-pk-id="<?php echo $skillQuestionAnswerParent->question_answer_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display gb-padding-left-3">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-skill-question-answer-form-title-input"><?php echo $skillQuestionAnswerParent->questionAnswer->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-skill-question-answer-form-description-input"><?php echo $skillQuestionAnswerParent->questionAnswer->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-left gb-disabled-1">
        <a class="btn btn-sm btn-link gb-form-show"
           gb-is-child-form="1"
           gb-form-status="<?php echo QuestionAnswer::$STATUS_QUESTIONNAIRE; ?>"
           gb-form-status-id-input="#gb-skill-question-answer-form-status-input"
           gb-form-target="#gb-skill-question-answer-form"
           gb-form-slide-target="<?php echo '#gb-skill-questionnaire-child-form-container-' . $skillQuestionAnswerParent->id; ?>"
           gb-form-parent-id-input="#gb-skill-question-answer-form-parent-question-answer-id-input"
           gb-form-heading="Add Skill QuestionAnswer"
           gb-form-parent-id="<?php echo $skillQuestionAnswerParent->question_answer_id; ?>">
          Comment
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
    <div id="<?php echo 'gb-skill-questionnaire-child-form-container-' . $skillQuestionAnswerParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div id="gb-question-answer-children" class="row gb-hide">
      <?php
      $skillQuestionAnswerChildren = SkillQuestionAnswer::getSkillChildrenQuestionAnswers($skillQuestionAnswerParent->question_answer_id);
      ?>

      <?php foreach ($skillQuestionAnswerChildren as $skillQuestionAnswerChild): ?>
        <?php
        $this->renderPartial('skill.views.skill.activity._skill_questionnaire_child_list_item', array(
         "skillQuestionAnswerChild" => $skillQuestionAnswerChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>

