<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => $formId,
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
    'data-gb-url' => $actionUrl,
    'data-gb-prepend-to' => $prependTo,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-header gb-form-header-2">
 <div class="row">
  <div class="col-lg-10 col-md-10 col-sm-10 gb-xs-10 gb-no-padding">
   <p class="gb-form-heading"><?php echo $question->description; ?></p>
  </div>
  <div class="pull-right">
   <a class="gb-form-hide btn btn-default">X</a>
  </div>
 </div>
</div>
<div class="gb-form-body row">
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-user-question-form-error-display" class="text-left row">

  </div>
 </div>
 <div class="form-group gb-hide row">
  <?php echo $form->hiddenField($userQuestionModel, 'question_id', array('value' => $question->id)); ?>
 </div>

 <div class="form-group row">
  <?php
  $options = array(
    'template' => '<span class="gender">{input</span>',
    'uncheckValue' => null,
  );
  $questionAnswerChoiceList = CHtml::listData(QuestionAnswerChoice::getQuestionAnswerChoices($question->id), "id", "answer");

  echo CHtml::activeRadioButtonList($userQuestionModel, 'question_answer_id', $questionAnswerChoiceList, array(
    'template' => '<div class="col-lg-1">{input}</div> <div class="col-lg-11">{label}</div>',
    'uncheckValue' => null));
  ?>
  <?php echo $form->error($userQuestionModel, 'question_answer_id'); ?>
 </div>

 <div class="form-group row gb-no-margin">
  <?php echo $form->textArea($userQuestionModel, 'description', array('id' => 'gb-user-question-form-description-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 150, 'placeholder' => 'Questionnaire, 150 characters', 'rows' => '3')); ?>
  <?php echo $form->error($userQuestionModel, 'description') ?>
 </div>
</div>
<div class="modal-footer gb-padding-medium gb-no-margin">
 <div class="pull-right btn-group">
  <a class="gb-form-hide btn btn-default">Cancel</a>
  <?php echo CHtml::submitButton("Post", array('class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => $ajaxReturnAction)); ?>
 </div>
</div>
<?php $this->endWidget(); ?>
