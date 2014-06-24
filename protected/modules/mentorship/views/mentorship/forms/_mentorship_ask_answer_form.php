<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-mentorship-ask-answer-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-mentorship-ask-answer-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
    <div class="form-group row">
      <?php echo $form->textArea($mentorshipAnswerModel, 'mentorship_answer', array('id' => 'gb-mentorship-ask-answer-form-description', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Your answer. max 250 characters', 'rows' => 3)); ?>
      <?php echo $form->error($mentorshipAnswerModel, 'mentorship_answer'); ?>
    </div>
  </div>
</div>
<?php
switch ($formType):
  case GoalType::$FORM_TYPE_MENTORSHIP_MENTORSHIP:
    ?>
    <div class="modal-footer">
      <div class="row">
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-default gb-form-hide" >Cancel</button>
          <?php echo CHtml::submitButton('Submit', array('id' => 'gb-mentorship-ask-answer-form-submit', 'class' => 'btn btn-primary')); ?>
        </div>
      </div>
    </div>
    <?php
    break;
endswitch;
?>
<?php $this->endWidget(); ?>