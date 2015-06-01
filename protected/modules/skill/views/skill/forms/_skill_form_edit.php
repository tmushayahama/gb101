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
    'class' => 'gb-padding-none',
    'data-gb-url' => $actionUrl,
    'data-gb-prepend-to' => $prependTo,
    "data-gb-source-pk" => $skillModel->id,
    "data-gb-source" => Type::$SOURCE_SKILL,
    "data-gb-source-type" => Type::$SOURCE_TYPE_PARENT,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-border gb-padding-medium row">
 <div class="gb-form-header gb-form-header-2">
  <div class="row">
   <div class="col-lg-10 col-md-10 col-sm-10 gb-xs-10 gb-padding-none">
    <p class="gb-form-heading gb-ellipsis">Edit Skill Description</p>
   </div>
   <div class="pull-right">
    <a class="gb-form-hide btn btn-default">X</a>
   </div>
  </div>
 </div>
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-skill-form-error-display" class="text-left row">

  </div>
 </div>
 <?php echo $form->hiddenField($skillModel, 'privacy', array('id' => 'gb-skill-share-with-sharing-type', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
 <div class="gb-btn-row-large row gb-margin-bottom-narrow gb-hide">
  <a class="btn btn-link text-center gb-bank-list-modal-trigger"><i class="glyphicon glyphicon-list"></i> Select From Skill Bank</a>
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
    'class' => 'form-control col-lg-12 col-sm-12 col-xs-12'));
  ?>
  <?php echo $form->error($skillModel, 'level_id'); ?>
 </div>
 <div class="form-group row gb-hide">
  <div class="form-group row">
   <h5 class="pull-left gb-padding-thin">Privacy: <span class="gb-skill-share-with-privacy">Private</span></h5>
   <a class="gb-share-with-modal-trigger btn btn-sm btn-default pull-right"
      gb-type="<?php echo Type::$SKILL_SHARE; ?>">
    Change & Share With
   </a>
  </div>
  <div id="gb-skill-share-with-textboxes" class="gb-hide gb-share-with-textboxes"></div>
  <div id="gb-skill-share-with-display" class="gb-share-with-display"></div>
 </div>
 <div class="modal-footer">
  <div class="pull-right btn-group">
   <button type="button" class="btn btn-default gb-form-hide" data-dismiss="modal">Cancel</button>
   <?php echo CHtml::submitButton('Submit', array('gb-edit-btn' => 0, 'class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => $ajaxReturnAction)); ?>
  </div>
 </div>
</div>
<br>
<?php $this->endWidget(); ?>
