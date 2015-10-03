<?php
/* @var $this PromiseCommitmentController */
/* @var $model PromiseCommitment */
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
    "data-gb-source-pk" => $promiseModel->id,
    "data-gb-source" => Type::$SOURCE_PROMISE,
    "data-gb-source-type" => Type::$SOURCE_TYPE_PARENT,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-border gb-padding-medium row">
 <div class="gb-form-header gb-form-header-2">
  <div class="row">
   <div class="col-lg-10 col-md-10 col-sm-10 gb-xs-10 ">
    <p class="gb-form-heading gb-ellipsis">Edit Promise Description</p>
   </div>
   <div class="pull-right">
    <a class="gb-form-hide btn btn-default">X</a>
   </div>
  </div>
 </div>
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-promise-form-error-display" class="text-left row">

  </div>
 </div>
 <?php echo $form->hiddenField($promiseModel, 'privacy', array('id' => 'gb-promise-share-with-sharing-type', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
 <div class="gb-btn-row-large row gb-margin-bottom-narrow gb-hide">
  <a class="btn btn-link text-center gb-bank-list-modal-trigger"><i class="glyphicon glyphicon-list"></i> Select From Promise Bank</a>
 </div>
 <div class="form-group row">
  <?php echo $form->textField($promiseModel, 'title', array('id' => 'gb-promise-form-title-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Name of the promise')); ?>
  <?php echo $form->error($promiseModel, 'title'); ?>
 </div>
 <div class="form-group row">
  <?php echo $form->textArea($promiseModel, 'description', array('id' => 'gb-promise-form-description-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Promise Description. max 250 characters', 'rows' => 2)); ?>
  <?php echo $form->error($promiseModel, 'description'); ?>
 </div>
 <div class="form-group row">
  <?php
  echo CHtml::activeDropDownList($promiseModel, 'level_id', $promiseLevelList, array('empty' => 'Select Promise Level',
    'id' => 'gb-promise-form-level-input',
    'class' => 'form-control col-lg-12 col-sm-12 col-xs-12'));
  ?>
  <?php echo $form->error($promiseModel, 'level_id'); ?>
 </div>
 <div class="form-group row gb-hide">
  <div class="form-group row">
   <h5 class="pull-left gb-padding-thin">Privacy: <span class="gb-promise-share-with-privacy">Private</span></h5>
   <a class="gb-share-with-modal-trigger btn btn-sm btn-default pull-right"
      gb-type="<?php echo Type::$PROMISE_SHARE; ?>">
    Change & Share With
   </a>
  </div>
  <div id="gb-promise-share-with-textboxes" class="gb-hide gb-share-with-textboxes"></div>
  <div id="gb-promise-share-with-display" class="gb-share-with-display"></div>
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
