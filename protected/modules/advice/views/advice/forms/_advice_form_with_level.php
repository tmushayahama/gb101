<?php
/* @var $this AdviceCommitmentController */
/* @var $model AdviceCommitment */
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
  <div id="gb-advice-form-error-display" class="text-left row">

  </div>
 </div>
 <?php echo $form->hiddenField($adviceModel, 'privacy', array('id' => 'gb-advice-share-with-sharing-type', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
 <?php echo $form->hiddenField($adviceModel, 'level_id', array('value' => $levelId)); ?>
 <div class="gb-btn-row-large row gb-margin-bottom-narrow gb-hide">
  <a class="btn btn-link text-center gb-bank-list-modal-trigger"><i class="glyphicon glyphicon-list"></i> Select From Advice Bank</a>
 </div>
 <div class="form-group row">
  <?php echo $form->textField($adviceModel, 'title', array('id' => 'gb-advice-form-title-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Name of the advice')); ?>
  <?php echo $form->error($adviceModel, 'title'); ?>
 </div>
 <div class="form-group row">
  <?php echo $form->textArea($adviceModel, 'description', array('id' => 'gb-advice-form-description-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Advice Description. max 250 characters', 'rows' => 2)); ?>
  <?php echo $form->error($adviceModel, 'description'); ?>
 </div>
 <div class="form-group row gb-hide">
  <div class="form-group row">
   <h5 class="pull-left gb-padding-thin">Privacy: <span class="gb-advice-share-with-privacy">Private</span></h5>
   <a class="gb-share-with-modal-trigger btn btn-sm btn-default pull-right"
      gb-type="<?php echo Type::$ADVICE_SHARE; ?>">
    Change & Share With
   </a>
  </div>
  <div id="gb-advice-share-with-textboxes" class="gb-hide gb-share-with-textboxes"></div>
  <div id="gb-advice-share-with-display" class="gb-share-with-display"></div>
 </div>
</div>


<div class="modal-footer">
 <div class="pull-right btn-group">
  <button type="button" class="btn btn-default gb-form-hide" data-dismiss="modal">Cancel</button>
  <?php echo CHtml::submitButton('Submit', array('gb-edit-btn' => 0, 'class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => $ajaxReturnAction)); ?>
 </div>
</div>
<?php $this->endWidget(); ?>
