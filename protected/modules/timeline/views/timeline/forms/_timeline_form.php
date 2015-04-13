<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => $formId,
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    'class' => 'gb-padding-thick',
    'data-gb-url' => $actionUrl,
    'data-gb-prepend-to' => $prependTo,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-border row">
 <br>
 <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-timeline-form-error-display" class="text-left row">

  </div>
 </div>
 <div class="form-group gb-hide row">
  <?php echo $form->hiddenField($timelineModel, 'parent_timeline_id', array()); ?>
 </div>

 <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
  <?php echo $form->numberField($timelineModel, 'day', array('class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 3, 'placeholder' => 'Day')); ?>
 </div>

 <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
  <?php echo $form->dateField($timelineModel, 'timeline_date', array('class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 3, 'placeholder' => 'Date')); ?>
 </div>
 <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <?php echo $form->textArea($timelineModel, 'description', array('class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 150, 'placeholder' => 'Timeline, 150 characters', 'rows' => '3')); ?>
  <?php echo $form->error($timelineModel, 'description') ?>
 </div>
</div>
<div class="modal-footer gb-padding-medium gb-no-margin">
 <div class="pull-right btn-group">
  <a class="gb-form-hide btn btn-default">Cancel</a>
  <?php echo CHtml::submitButton("Post", array('class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => $ajaxReturnAction)); ?>
 </div>
</div>
<?php $this->endWidget(); ?>
