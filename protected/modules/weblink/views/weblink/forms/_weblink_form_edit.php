<?php
$form = $this->beginWidget('UActiveForm', array(
  "id" => $formId,
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    'class' => 'gb-backdrop-escapee gb-background-white gb-padding-none',
    "data-gb-source-pk" => $weblinkModel->id,
    "data-gb-source" => Type::$SOURCE_WEBLINK,
    "data-gb-source-type" => Type::$SOURCE_TYPE_PARENT,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-header gb-form-header-2">
 <div class="row">
  <div class="col-lg-10 col-md-10 col-sm-10 gb-xs-10 gb-padding-none">
   <p class="gb-form-heading gb-ellipsis">Edit weblink details</p>
  </div>
  <div class="pull-right">
   <a class="gb-form-hide btn btn-default">X</a>
  </div>
 </div>
</div>
<div class="gb-form-body row">
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-weblink-form-error-display" class="text-left row">

  </div>
 </div>
 <div class="form-group row">
  <?php echo $form->textField($weblinkModel, 'link', array('class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 1000, 'placeholder' => 'Weblink', 'rows' => '3')); ?>
  <?php echo $form->error($weblinkModel, 'link') ?>
 </div>
 <div class="form-group row">
  <?php echo $form->textArea($weblinkModel, 'description', array('class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 150, 'placeholder' => 'Description', 'rows' => '2')); ?>
  <?php echo $form->error($weblinkModel, 'description') ?>
 </div>
</div>
<div class="modal-footer gb-padding-medium gb-no-margin">
 <div class="pull-right btn-group">
  <a class="gb-form-hide btn btn-default">Cancel</a>
  <?php echo CHtml::submitButton("Done", array('class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => Type::$AJAX_RETURN_ACTION_EDIT)); ?>
 </div>
</div>
<?php $this->endWidget(); ?>
