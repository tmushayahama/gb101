<?php
$form = $this->beginWidget('UActiveForm', array(
 'id' => 'gb-skill-question-answer-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-no-padding',
  'gb-add-url' => Yii::app()->createUrl("skill/skill/addSkillQuestionAnswer", array("skillId" => $skillId)),
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-header gb-form-header-2">
  <div class="row">
    <h3 class="gb-form-heading pull-left">Add Question & Answer List</h3>
    <div class="pull-right btn-group">
      <a class="gb-form-hide btn btn-xs btn-default">X</a>
    </div>
  </div>
</div>
<div class="gb-form-body row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-skill-question-answer-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="form-group row">
    <?php echo $form->hiddenField($questionAnswerModel, 'parent_question_answer_id', array('id' => 'gb-skill-question-answer-form-parent-question-answer-id-input')); ?>
    <?php echo $form->hiddenField($questionAnswerModel, 'status', array('id' => 'gb-skill-question-answer-form-status-input')); ?>
  </div>
  <div class="form-group row">
    <?php echo $form->textArea($questionAnswerModel, 'description', array('id' => 'gb-skill-question-answer-form-description-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'QuestionAnswer Description. max 250 characters', 'rows' => '2')); ?>
    <?php echo $form->error($questionAnswerModel, 'description') ?>
  </div>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Add", array('class' => 'gb-submit-form btn gb-btn-2', 'gb-ajax-return-action' => Type::$AJAX_RETURN_ACTION_REPLACE)); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
     