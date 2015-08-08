<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => $formId,
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    'class' => 'gb-padding-none',
    'data-gb-url' => $actionUrl,
    'data-gb-prepend-to' => $prependTo,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-body row gb-padding-thin">
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-user-question-form-error-display" class="text-left row">
  </div>
 </div>
 <div class="form-group gb-hide row">
  <?php echo $form->hiddenField($userQuestionModel, 'question_id', array('value' => $question->id)); ?>
 </div>
 <div class="gb-callout gb-callout-default">
  <h5 class="gb-question"><?php echo $question->description; ?></h5>
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
  <?php echo $form->textArea($userQuestionModel, 'description', array('id' => 'gb-user-question-form-description-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 150, 'placeholder' => 'Description', 'rows' => '3')); ?>
  <?php echo $form->error($userQuestionModel, 'description') ?>
 </div>
</div>
<div class="modal-footer gb-padding-medium gb-no-margin">
 <div class="pull-right btn-group">
  <a class="gb-form-next btn btn-default"
     data-gb-url="<?php echo Yii::app()->createUrl("user/profile/getNextForm", array("userId" => Yii::app()->user->id)); ?>">
   Next Question
  </a>
  <?php echo CHtml::submitButton("Post", array('class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => $ajaxReturnAction)); ?>
 </div>
</div>
<?php $this->endWidget(); ?>
