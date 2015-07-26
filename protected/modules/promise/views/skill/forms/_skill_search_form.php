<?php
/* @var $this SkillCommitmentController */
/* @var $model SkillCommitment */
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
<div class="row gb-forms-with-steps-content box-4-height">
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-skill-form-error-display" class="text-left row">

  </div>
 </div>
 <div class="form-group row">
  <?php echo $form->textField($skillModel, 'title', array('id' => 'gb-skill-form-title-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Name of the skill')); ?>
  <?php echo $form->error($skillModel, 'title'); ?>
 </div>
 <div class="form-group row">
  <?php echo $form->textArea($skillModel, 'description', array('id' => 'gb-skill-form-description-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Skill Description. max 250 characters', 'rows' => 2)); ?>
  <?php echo $form->error($skillModel, 'description'); ?>
 </div>
 <div class="form-group row">
  <?php
  echo CHtml::activeDropDownList($skillModel, 'level_id', $skillLevelList, array('empty' => 'Select Skill Level',
    'id' => 'gb-skill-form-level-input',
    'class' => ' form-control col-lg-12 col-sm-12 col-xs-12'));
  ?>
  <?php echo $form->error($skillModel, 'level_id'); ?>
 </div>
</div>
<div class="modal-footer">
 <div class="pull-right btn-group">
  <button type="button" class="btn btn-default gb-form-hide" data-dismiss="modal">Cancel</button>
  <?php echo CHtml::submitButton('Submit', array('gb-edit-btn' => 0, 'class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => $ajaxReturnAction)); ?>
 </div>
</div>
<?php $this->endWidget(); ?>
