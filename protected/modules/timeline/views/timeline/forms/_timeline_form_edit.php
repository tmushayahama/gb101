<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => $formId,
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    'class' => 'gb-padding-none',
    "data-gb-source-pk" => $timelineModel->id,
    "data-gb-source" => Type::$SOURCE_TIMELINE,
    "data-gb-source-type" => Type::$SOURCE_TYPE_PARENT,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-body row">
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-timeline-form-error-display" class="text-left row">

  </div>
 </div>
 <div class="form-group row gb-no-margin">
  <?php echo $form->textArea($timelineModel, 'description', array('class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 150, 'placeholder' => 'Timeline, 150 characters', 'rows' => '3')); ?>
  <?php echo $form->error($timelineModel, 'description') ?>
 </div>
</div>
<div class="modal-footer gb-padding-medium gb-no-margin">
 <div class="pull-right btn-group">
  <a class="gb-form-hide btn btn-default">Cancel</a>
  <?php echo CHtml::submitButton("Done", array('class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => Type::$AJAX_RETURN_ACTION_EDIT)); ?>
 </div>
</div>
<?php $this->endWidget(); ?>
