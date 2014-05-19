<?php ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-web-link-form',
 'enableAjaxValidation' => false,
 'htmlOptions' => array(
  'class'=>'gb-hide row',
  'onsubmit' => "return false;")
  ));
?>

<?php echo $form->errorSummary($webLinkModel); ?>

<div class="form-group row">
  <?php echo $form->textField($webLinkModel, 'link', array('class' => 'input-sm col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Link')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textField($webLinkModel, 'title', array('class' => 'input-sm col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Text')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textArea($webLinkModel, 'description', array('class' => 'input-sm col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Description (optional)', 'rows' => 3)); ?>
</div>
<div class="form-actions row">
  <?php echo CHtml::submitButton(UserModule::t("Add"), array('class' => 'btn btn-primary', 'onclick' => 'addMentorshipWebLink();')); ?>
  <a class="gb-add-web-link-cancel-btn btn btn-default">Cancel</a>
</div>
<?php $this->endWidget(); ?>

