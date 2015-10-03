<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => $formId,
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    'class' => '',
    'data-gb-url' => $actionUrl,
    'data-gb-prepend-to' => $prependTo,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="row gb-padding-thin">
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-user-question-form-error-display" class="text-left row">

  </div>
 </div>
 <div class="form-group gb-hide row">
  <?php echo $form->hiddenField($mentorshipQuestionAnswerModel, 'question_id', array('value' => $questionId)); ?>
 </div>
 <div class="row">
  <div class="form-group col-lg-10 col-md-10 col-sm-12 col-xs-12">
   <?php echo $form->textArea($mentorshipQuestionAnswerModel, 'description', array('id' => 'gb-user-question-form-description-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 150, 'placeholder' => 'Answer', 'rows' => '2')); ?>
   <?php echo $form->error($mentorshipQuestionAnswerModel, 'description') ?>
  </div>
  <div class="col-lg-2 col-md-2">
   <?php echo CHtml::tag("button", array('class' => 'gb-submit-form btn btn-primary col-lg-6 col-md-6', 'data-gb-action' => $ajaxReturnAction), "<i class='fa fa-plus'></i>"); ?>
  </div>
 </div>
</div>
<?php $this->endWidget(); ?>
