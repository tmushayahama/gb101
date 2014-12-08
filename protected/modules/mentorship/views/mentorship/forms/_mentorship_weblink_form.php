<?php ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-mentorship-weblink-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
  'data-gb-url' => Yii::app()->createUrl("mentorship/mentorship/addMentorshipWeblink", array("mentorshipId" => $mentorshipId)),
  'data-gb-prepend-to' => "#gb-weblinks",
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-mentorship-weblink-form-error-display" class="text-left row">

  </div>
</div>

<div class="form-group row">
  <?php echo $form->textField($weblinkModel, 'link', array('id' => 'gb-mentorship-weblink-form-link-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 1000, 'placeholder' => 'Actual url')); ?>
  <?php echo $form->error($weblinkModel, 'link'); ?>
</div>
<div class="form-group row">
  <?php echo $form->textField($weblinkModel, 'title', array('id' => 'gb-mentorship-weblink-form-title-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Readable Link Text')); ?>
  <?php echo $form->error($weblinkModel, 'title'); ?>
</div>
<div class="form-group row">
  <?php echo $form->textArea($weblinkModel, 'description', array('id' => 'gb-mentorship-weblink-form-description-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Description (optional)', 'rows' => 3)); ?>
  <?php echo $form->error($weblinkModel, 'description'); ?>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Add", array('class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => $ajaxReturnAction)); ?>
  </div>
</div>
<?php $this->endWidget(); ?>

