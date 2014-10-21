<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry gb-question-answer-list-item panel panel-default row gb-discussion-title-side-border" skill-question-answer-id="<?php echo $skillQuestionnaireParent->id; ?>"
     gb-source-pk-id="<?php echo $skillQuestionnaireParent->id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">
 <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <h5 class="gb-parent-box-heading">
       <?php echo $skillQuestionnaireParent->description; ?>
      </h5>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-left">
        <a class="btn btn-sm btn-link gb-form-show"
           gb-is-child-form="1"
           gb-form-slide-target="<?php echo '#gb-skill-question-answer-child-form-container-' . $skillQuestionnaireParent->id; ?>"
           gb-form-target="#gb-skill-question-answer-form"
           gb-form-parent-id-input="#gb-skill-question-answer-form-parent-question-answer-id-input"
           gb-form-heading="Add Skill Questionnaire"
           gb-form-parent-id="<?php echo $skillQuestionnaireParent->id; ?>">
           <i class="glyphicon glyphicon-plus"></i>
          Add
        </a>        
      </div>
      <div class="btn-group pull-right">
        <?php if ($skillQuestionnaireParent->creator_id == Yii::app()->user->id): ?>
          <a class="btn btn-sm btn-link"
             gb-form-target="#gb-skill-question-answer-form">
            <i class="glyphicon glyphicon-ban-circle"></i>
          </a> 
         <?php endif; ?>
      </div>
    </div>
    <div id="<?php echo 'gb-skill-question-answer-child-form-container-' . $skillQuestionnaireParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
  </div> 
</div>

