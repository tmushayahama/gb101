<?php ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-web-link-form',
 'enableAjaxValidation' => false,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-white-background gb-padding-thin',
  'onsubmit' => "return false;")
  ));
?>

<?php echo $form->errorSummary($webLinkModel); ?>

<div class="form-group row">
  <?php echo $form->textField($webLinkModel, 'link', array('class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Link')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textField($webLinkModel, 'title', array('class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Text')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textArea($webLinkModel, 'description', array('class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Description (optional)', 'rows' => 3)); ?>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
     <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Add", array('class' => 'btn btn-primary', 'onclick' => 'addMentorshipWebLink();')); ?>
 </div>
</div>
<?php $this->endWidget(); ?>

