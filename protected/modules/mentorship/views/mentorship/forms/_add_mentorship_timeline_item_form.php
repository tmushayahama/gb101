<?php
$form = $this->beginWidget('UActiveForm', array(
 'id' => 'gb-mentorship-timeline-form',
 'enableAjaxValidation' => false,
 'clientOptions' => array(
  'validateOnSubmit' => false,
 ),
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-white-background gb-padding-thin',
  'onsubmit' => "return false;",
  'enctype' => 'multipart/form-data',
 ),
  ));
?>
<div class="form-group row">
  <?php echo $form->textField($mentorshipTimelineModel, 'day', array('id' => 'gb-mentorship-day-', 'class' => 'input-sm form-control col-lg-12 col-sm-12 col-md-12 col-xs-12', 'placeholder' => 'day')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textField($timelineModel, 'title', array('class' => 'input-sm form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'placeholder' => 'Title')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textArea($timelineModel, 'description', array('class' => 'input-sm form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'placeholder' => 'Description', 'rows' => '2')); ?>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Add", array('class' => 'btn btn-primary', 'onclick' => 'addMentorshipTimelineItem();')); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
     