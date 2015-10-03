<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-block gb-block-row gb-parent-box row" advice-question-id="<?php echo $adviceQuestionParent->id; ?>"
     data-gb-source-pk="<?php echo $adviceQuestionParent->question_id; ?>" data-gb-source="<?php echo Type::$SOURCE_TODO; ?>">

  <div class="col-lg-12 col-sm-12 col-xs-12  gb-no-margin">
    <div class="row">
      <div class="row gb-panel-form gb-hide">
      </div>
      <div class="row gb-panel-display gb-padding-left-3">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
          <p><strong class="gb-display-attribute" gb-control-target="#gb-advice-question-form-title-input"><?php echo $adviceQuestionParent->question->title; ?> </strong> 
            <span class="gb-display-attribute" gb-control-target="#gb-advice-question-form-description-input"><?php echo $adviceQuestionParent->question->description; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="row gb-padding-left-1">
      <div class="btn-group pull-left gb-disabled-1">
        <a class="btn btn-sm btn-link gb-form-show"
           gb-is-child-form="1"
           gb-form-status="<?php echo question::$STATUS_QUESTIONNAIRE; ?>"
           gb-form-status-id-input="#gb-advice-question-form-status-input"
           data-gb-target="#gb-advice-question-form"
           data-gb-target-container="<?php echo '#gb-advice-questionnaire-child-form-container-' . $adviceQuestionParent->id; ?>"
           gb-form-parent-id-input="#gb-advice-question-form-parent-question-id-input"
           gb-form-heading="Add Advice question"
           gb-form-parent-id="<?php echo $adviceQuestionParent->question_id; ?>">
          Comment
        </a>        
      </div>
      <div class="btn-group pull-right">
        <?php if ($adviceQuestionParent->question->creator_id == Yii::app()->user->id): ?>
          <a class="gb-edit-form-show btn btn-sm btn-link"
             data-gb-target="#gb-advice-question-form">
            <i class="glyphicon glyphicon-edit"></i>
          </a> 
          <a class="gb-delete-me btn btn-sm btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
        <?php endif; ?>
      </div>
    </div>
    <div id="<?php echo 'gb-advice-questionnaire-child-form-container-' . $adviceQuestionParent->id; ?>" class="row gb-panel-form gb-hide">

    </div>
    <div id="gb-question-children" class="row gb-hide">
      <?php
      $adviceQuestionChildren = Advicequestion::getAdviceChildrenquestions($adviceQuestionParent->question_id);
      ?>

      <?php foreach ($adviceQuestionChildren as $adviceQuestionChild): ?>
        <?php
        $this->renderPartial('advice.views.advice.activity.question._advice_questionnaire_child_list_item', array(
         "adviceQuestionChild" => $adviceQuestionChild)
        );
        ?>
      <?php endforeach; ?>    
    </div>
  </div> 
</div>

