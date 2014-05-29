<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-add-advice-page-subgoal-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class'=>'gb-padding-thin gb-white-background',
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-add-advice-page-subgoal-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>Your Advice Page will not be active until you finish.</p>
  </div>
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
    <div class="form-group row">
      <?php echo $form->textField($goalModel, 'title', array('id' => 'gb-goalist-title-input', 'class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Subgoal Title')); ?>
      <?php echo $form->error($goalModel, 'title'); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->textArea($goalModel, 'description', array('class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Sub Skill Description max 1000 characters', 'rows' => 7)); ?>
      <?php echo $form->error($goalModel, 'description'); ?>
    </div>
  </div>
</div>
  <div class="row">
    <div class="pull-right btn-group">
      <button type="button" class="btn btn-default gb-cancel-add-advice-page-subgoal-btn col-lg-6 col-sm-6 col-xs-12" >Cancel</button>
     <!-- <button type="button" id="gb-goal-form-back-btn-disabled" class="btn btn-default gb-btn-disabled-1"><i class="glyphicon glyphicon-arrow-left"></i> Back</button>
      <button type="button" id="gb-goal-form-back-btn" form-num="0" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</button>
      <button type="button" id="gb-goal-form-next-btn-disabled" class="btn btn-default gb-btn-disabled-1">Next <i class="glyphicon glyphicon-arrow-right"></i></button>
      <button type="button" id="gb-goal-form-next-btn" form-num="0" class="btn btn-default">Next <i class="glyphicon glyphicon-arrow-right"></i></button> -->
      <?php echo CHtml::submitButton('Submit', array('id' => 'gb-add-advice-page-subgoal-btn', 'class' => 'btn btn-primary')); ?>
    </div>
  </div>
<?php $this->endWidget(); ?>
<br>