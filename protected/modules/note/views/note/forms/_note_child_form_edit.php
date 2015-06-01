<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => $formId,
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
    "data-gb-source-pk" => $noteModel->id,
    "data-gb-source" => Type::$SOURCE_NOTE,
    "data-gb-source-type" => Type::$SOURCE_TYPE_CHILD,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="input-group form-group col-lg-12 col-sm-12 col-xs-12 gb-padding-none gb-no-margin">

 <?php echo $form->textArea($noteModel, 'description', array('class' => 'form-control', 'maxlength' => 150, 'placeholder' => 'Your reply', 'rows' => '2')); ?>

 <div class="input-group-btn">
  <?php echo CHtml::tag("submit", array('class' => 'gb-submit-form btn btn-default', 'data-gb-action' => Type::$AJAX_RETURN_ACTION_EDIT), "<i class='text-success glyphicon glyphicon-ok'></i>"); ?>
  <a class="gb-form-hide btn btn-default "><i class="text-danger glyphicon glyphicon-remove"></i></a>
 </div><!-- /btn-group -->
</div>
<?php $this->endWidget(); ?>
