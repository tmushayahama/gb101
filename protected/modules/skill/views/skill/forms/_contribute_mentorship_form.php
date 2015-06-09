<?php
/* @var $this MentorshipCommitmentController */
/* @var $model MentorshipCommitment */
/* @var $form CActiveForm */
?>
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
<div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
 <h5 class="text-error text-left">Errors Found</h5>
 <div id="gb-mentorship-form-error-display" class="text-left row">

 </div>
</div>
<?php echo $form->hiddenField($mentorshipModel, 'privacy', array('class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
<?php echo $form->hiddenField($mentorshipSkillModel, 'skill_id', array('class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>

<div class="form-group row">
 <?php echo $form->textField($mentorshipModel, 'title', array('class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Name of the mentorship')); ?>
 <?php echo $form->error($mentorshipModel, 'title'); ?>
</div>
<div class="form-group row">
 <?php echo $form->textArea($mentorshipModel, 'description', array('class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Mentorship Description. max 250 characters', 'rows' => 2)); ?>
 <?php echo $form->error($mentorshipModel, 'description'); ?>
</div>
<div class="form-group row">
 <?php
 echo CHtml::activeDropDownList($mentorshipModel, 'level_id', $mentorshipLevelList, array('empty' => 'Select Mentorship Level',
   'id' => 'gb-mentorship-form-level-input',
   'class' => ' form-control col-lg-12 col-sm-12 col-xs-12'));
 ?>
 <?php echo $form->error($mentorshipModel, 'level_id'); ?>
</div>
<div class="row">
 <div class="pull-right btn-group">
  <button type="button" class="btn btn-default gb-form-hide" data-dismiss="modal">Cancel</button>
  <?php echo CHtml::submitButton('Submit', array('gb-edit-btn' => 0, 'class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => $ajaxReturnAction)); ?>
 </div>
</div>
<?php $this->endWidget(); ?>
