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
 <?php echo $form->hiddenField($discussionModel, 'parent_discussion_id', array("value" => $parentValue)); ?>
</div>
<div class="input-group form-group col-lg-12 col-sm-12 col-xs-12  gb-no-margin">

 <?php echo $form->textArea($discussionModel, 'description', array('class' => 'form-control', 'maxlength' => 250, 'placeholder' => 'Your point of view', 'rows' => '3')); ?>

 <div class="input-group-btn">
  <?php echo CHtml::tag("submit", array('class' => 'gb-submit-form btn btn-default', 'data-gb-action' => $ajaxReturnAction), "<i class='gb-no-margin glyphicon glyphicon-plus'></i>"); ?>
 </div><!-- /btn-group -->
</div>
<?php $this->endWidget(); ?>
