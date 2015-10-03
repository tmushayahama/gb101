<?php
/* @var $this HobbyCommitmentController */
/* @var $model HobbyCommitment */
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
    "data-gb-source-pk" => $hobbyModel->id,
    "data-gb-source" => Type::$SOURCE_HOBBY,
    "data-gb-source-type" => Type::$SOURCE_TYPE_PARENT,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-border gb-padding-medium row">
 <div class="gb-form-header gb-form-header-2">
  <div class="row">
   <div class="col-lg-10 col-md-10 col-sm-10 gb-xs-10 ">
    <p class="gb-form-heading gb-ellipsis">Edit Hobby Description</p>
   </div>
   <div class="pull-right">
    <a class="gb-form-hide btn btn-default">X</a>
   </div>
  </div>
 </div>
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-hobby-form-error-display" class="text-left row">

  </div>
 </div>
 <?php echo $form->hiddenField($hobbyModel, 'privacy', array('id' => 'gb-hobby-share-with-sharing-type', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
 <div class="gb-btn-row-large row gb-margin-bottom-narrow gb-hide">
  <a class="btn btn-link text-center gb-bank-list-modal-trigger"><i class="glyphicon glyphicon-list"></i> Select From Hobby Bank</a>
 </div>
 <div class="form-group row">
  <?php echo $form->textField($hobbyModel, 'title', array('id' => 'gb-hobby-form-title-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Name of the hobby')); ?>
  <?php echo $form->error($hobbyModel, 'title'); ?>
 </div>
 <div class="form-group row">
  <?php echo $form->textArea($hobbyModel, 'description', array('id' => 'gb-hobby-form-description-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Hobby Description. max 250 characters', 'rows' => 2)); ?>
  <?php echo $form->error($hobbyModel, 'description'); ?>
 </div>
 <div class="form-group row">
  <?php
  echo CHtml::activeDropDownList($hobbyModel, 'level_id', $hobbyLevelList, array('empty' => 'Select Hobby Level',
    'id' => 'gb-hobby-form-level-input',
    'class' => 'form-control col-lg-12 col-sm-12 col-xs-12'));
  ?>
  <?php echo $form->error($hobbyModel, 'level_id'); ?>
 </div>
 <div class="form-group row gb-hide">
  <div class="form-group row">
   <h5 class="pull-left gb-padding-thin">Privacy: <span class="gb-hobby-share-with-privacy">Private</span></h5>
   <a class="gb-share-with-modal-trigger btn btn-sm btn-default pull-right"
      gb-type="<?php echo Type::$HOBBY_SHARE; ?>">
    Change & Share With
   </a>
  </div>
  <div id="gb-hobby-share-with-textboxes" class="gb-hide gb-share-with-textboxes"></div>
  <div id="gb-hobby-share-with-display" class="gb-share-with-display"></div>
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
