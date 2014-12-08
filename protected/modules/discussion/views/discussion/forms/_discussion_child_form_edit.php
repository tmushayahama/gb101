<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => $formId,
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
    "data-gb-source-pk" => $discussionModel->id,
    "data-gb-source" => Type::$SOURCE_DISCUSSION,
    "data-gb-source-type" => Type::$SOURCE_TYPE_CHILD,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="input-group form-group col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">

 <?php echo $form->textArea($discussionModel, 'description', array('class' => 'form-control', 'maxlength' => 150, 'placeholder' => 'Your reply', 'rows' => '2')); ?>

 <div class="input-group-btn">
  <?php echo CHtml::tag("submit", array('class' => 'gb-submit-form btn btn-default', 'data-gb-action' => Type::$AJAX_RETURN_ACTION_EDIT), "<i class='gb-no-margin glyphicon glyphicon-edit'></i>"); ?>
 </div><!-- /btn-group -->
</div>
<?php $this->endWidget(); ?>
