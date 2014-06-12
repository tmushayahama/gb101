<?php ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-mentorship-web-link-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-white-background gb-padding-thin',
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-mentorship-web-link-form-error-display" class="text-left row">

  </div>
</div>

<div class="form-group row">
  <?php echo $form->textField($webLinkModel, 'link', array('class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Link')); ?>
  <?php echo $form->error($webLinkModel, 'link'); ?>
</div>
<div class="form-group row">
  <?php echo $form->textField($webLinkModel, 'title', array('class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Text')); ?>
  <?php echo $form->error($webLinkModel, 'title'); ?>
</div>
<div class="form-group row">
  <?php echo $form->textArea($webLinkModel, 'description', array('class' => 'input-sm form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Description (optional)', 'rows' => 3)); ?>
  <?php echo $form->error($webLinkModel, 'description'); ?>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Add", array('id' => 'gb-mentorship-web-link-form-submit', 'class' => 'btn btn-primary')); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
