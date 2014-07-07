<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-answer-question-form',
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
    <div id="gb-answer-question-form-error-display" class="text-left row">

    </div>
  </div>
  <a class="btn btn-link btn-sm col-lg-12 col-sm-12 col-xs-12 gb-bank-list-modal-trigger"><i class="glyphicon glyphicon-list"></i> Select From Skill Bank</a>
  <br>
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
    <div class="form-group row">
      <?php echo $form->textField($skillModel, 'title', array('id' => 'gb-answer-question-form-title', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Title')); ?>
      <?php echo $form->error($skillModel, 'title'); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->textArea($skillModel, 'description', array('id'=>'gb-answer-question-form-description',  'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Description. max 250 characters', 'rows' => 2)); ?>
      <?php echo $form->error($skillModel, 'description'); ?>
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
          <?php echo CHtml::submitButton('Submit', array('class' => 'gb-submit-form btn btn-primary')); ?>

        </div>
      </div>
    </div>
    <?php
    break;
endswitch;
?>
<?php $this->endWidget(); ?>
