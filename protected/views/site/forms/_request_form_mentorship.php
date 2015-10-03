<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => $formId,
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    "class" => 'gb-form gb-backdrop-escapee',
    "data-gb-url" => Yii::app()->createUrl("site/sendRequest", array()),
    "data-gb-prepend-to" => $prependTo,
    "validateOnSubmit" => true,
    "onsubmit" => "return true;")
  ));
?>
<?php echo $form->hiddenField($requestModel, 'source_id', array('value' => $sourceId)); ?>

<div class="gb-form-header row">
 <div class="row">
  <div class="col-lg-10 col-md-10 col-sm-10 gb-xs-10 ">
   <p class="gb-form-heading gb-ellipsis"><?php echo $title; ?></p>
  </div>
  <div class="pull-right">
   <a class="gb-form-hide btn btn-default">X</a>
  </div>
 </div>
</div>
<br>
<div class="gb-form-body gb-padding-thin row">
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-request-form-error-display" class="text-left row">
  </div>
 </div>
 <div class="form-group row">
  <?php
  echo CHtml::activeDropDownList($requestModel, 'type_id', $requestTypes, array('empty' => 'Select Type',
    'class' => 'form-control col-lg-12 col-sm-12 col-xs-12'));
  ?>
  <?php echo $form->error($requestModel, 'type_id'); ?>
 </div>
 <div class="form-group row gb-no-margin">
  <?php echo $form->textArea($requestModel, 'message', array('class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 150, 'placeholder' => 'Invitation Message, 150 characters', 'rows' => '2')); ?>
  <?php echo $form->error($requestModel, 'message') ?>
 </div>
 <div id="<?php echo $formId . '-people-display'; ?>" class="gb-selected-people-display row">
 </div>
 <div id="<?php echo $formId . '-people-ids'; ?>" class="gb-selected-people-ids gb-hide row">
 </div>
 <div id="<?php echo $formId . '-people-list'; ?>" class="gb-people-list row"
      data-gb-selection-type="multiple"
      data-gb-selected-display-container="<?php echo '#' . $formId . '-people-display'; ?>"
      data-gb-selected-ids-container="<?php echo '#' . $formId . '-people-ids'; ?>"
      data-gb-selected-input-name="gb-send-request-recepients">
 </div>
</div>
<div class="modal-footer gb-padding-medium gb-no-margin">
 <div class="pull-right btn-group">
  <a class="gb-form-hide btn btn-default">Cancel</a>
  <?php echo CHtml::submitButton("Request", array('class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => $ajaxReturnAction)); ?>
 </div>
</div>
<?php $this->endWidget(); ?>
