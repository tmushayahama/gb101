<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => $formId,
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    'class' => 'gb-padding-thin',
    'data-gb-url' => $actionUrl,
    'data-gb-prepend-to' => $prependTo,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="form-group gb-hide row">
 <?php echo $form->hiddenField($noteModel, 'parent_note_id', array("value" => $parentValue)); ?>
</div>
<div class="input-group form-group col-lg-12 col-sm-12 col-xs-12 gb-padding-none gb-no-margin">

 <?php echo $form->textArea($noteModel, 'description', array('class' => 'form-control', 'maxlength' => 150, 'placeholder' => 'Your reply', 'rows' => '1')); ?>

 <div class="input-group-btn">
  <?php echo CHtml::tag("submit", array('class' => 'gb-submit-form btn btn-default', 'data-gb-action' => $ajaxReturnAction), "<i class='gb-no-margin glyphicon glyphicon-plus'></i>"); ?>
 </div><!-- /btn-group -->
</div>
<?php $this->endWidget(); ?>
