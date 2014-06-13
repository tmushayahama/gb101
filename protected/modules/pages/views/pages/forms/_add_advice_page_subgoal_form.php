<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-advice-page-subgoal-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-padding-thin gb-white-background',
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-advice-page-subgoal-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>Your Advice Page will not be active until you finish.</p>
  </div>
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
    <div class="form-group row">
      <?php echo $form->textField($goalModel, 'title', array('id' => 'gb-goalist-title-input', 'class' => 'input-lg form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Subgoal Title')); ?>
      <?php echo $form->error($goalModel, 'title'); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->textArea($goalModel, 'description', array('class' => 'input-lg form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Sub Skill Description. max 250 characters', 'rows' => 5)); ?>
      <?php echo $form->error($goalModel, 'description'); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="pull-right btn-group">
    <button type="button" class="btn btn-default gb-cancel-advice-page-subgoal-btn col-lg-6 col-sm-6 col-xs-12" >Cancel</button>
    <?php echo CHtml::submitButton('Submit', array('id' => 'gb-advice-page-subgoal-btn', 'class' => 'btn btn-primary')); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
<br>