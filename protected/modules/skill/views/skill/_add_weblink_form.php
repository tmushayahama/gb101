<?php ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-skill-weblink-form',
 'enableAjaxValidation' => false,
 'htmlOptions' => array(
  'onsubmit' => "return false;")
  ));
?>

<?php echo $form->errorSummary($skillWebLinkModel); ?>

<?php echo $form->hiddenField($skillWebLinkModel, 'goal_id'); ?>
<div class="form-group row">
  <?php echo $form->textField($skillWebLinkModel, 'link', array('class' => 'input-lg col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Link')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textField($skillWebLinkModel, 'title', array('class' => 'input-lg col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Text')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textArea($skillWebLinkModel, 'description', array('class' => 'input-lg col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Description (optional)', 'rows' => 3)); ?>
</div>
<div class="form-actions row">
  <?php echo CHtml::submitButton('Add', array('id' => 'add-weblink-submit-btn', 'class' => 'btn btn-primary')); ?>
</div>
<?php $this->endWidget(); ?>

