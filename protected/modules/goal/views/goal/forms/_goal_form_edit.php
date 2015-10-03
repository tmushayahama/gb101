<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => $formId,
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    'class' => '',
    'data-gb-url' => $actionUrl,
    'data-gb-prepend-to' => $prependTo,
    "data-gb-source-pk" => $goalModel->id,
    "data-gb-source" => Type::$SOURCE_GOAL,
    "data-gb-source-type" => Type::$SOURCE_TYPE_PARENT,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-border gb-padding-medium row">
 <div class="gb-form-header gb-form-header-2">
  <div class="row">
   <div class="col-lg-10 col-md-10 col-sm-10 gb-xs-10 ">
    <p class="gb-form-heading gb-ellipsis">Edit Goal Description</p>
   </div>
   <div class="pull-right">
    <a class="gb-form-hide btn btn-default">X</a>
   </div>
  </div>
 </div>
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-goal-form-error-display" class="text-left row">

  </div>
 </div>
 <?php echo $form->hiddenField($goalModel, 'privacy', array('id' => 'gb-goal-share-with-sharing-type', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
 <div class="gb-btn-row-large row gb-margin-bottom-narrow gb-hide">
  <a class="btn btn-link text-center gb-bank-list-modal-trigger"><i class="glyphicon glyphicon-list"></i> Select From Goal Bank</a>
 </div>
 <div class="form-group row">
  <?php echo $form->textField($goalModel, 'title', array('id' => 'gb-goal-form-title-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Name of the goal')); ?>
  <?php echo $form->error($goalModel, 'title'); ?>
 </div>
 <div class="form-group row">
  <?php echo $form->textArea($goalModel, 'description', array('id' => 'gb-goal-form-description-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Goal Description. max 250 characters', 'rows' => 2)); ?>
  <?php echo $form->error($goalModel, 'description'); ?>
 </div>
 <div class="form-group row">
  <?php
  echo CHtml::activeDropDownList($goalModel, 'level_id', $goalLevelList, array('empty' => 'Select Goal Level',
    'id' => 'gb-goal-form-level-input',
    'class' => 'form-control col-lg-12 col-sm-12 col-xs-12'));
  ?>
  <?php echo $form->error($goalModel, 'level_id'); ?>
 </div>
 <div class="form-group row gb-hide">
  <div class="form-group row">
   <h5 class="pull-left gb-padding-thin">Privacy: <span class="gb-goal-share-with-privacy">Private</span></h5>
   <a class="gb-share-with-modal-trigger btn btn-sm btn-default pull-right"
      gb-type="<?php echo Type::$GOAL_SHARE; ?>">
    Change & Share With
   </a>
  </div>
  <div id="gb-goal-share-with-textboxes" class="gb-hide gb-share-with-textboxes"></div>
  <div id="gb-goal-share-with-display" class="gb-share-with-display"></div>
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
