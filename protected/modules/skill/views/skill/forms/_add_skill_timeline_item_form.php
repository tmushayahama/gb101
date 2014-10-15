<?php
$form = $this->beginWidget('UActiveForm', array(
 'id' => 'gb-skill-timeline-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
  'gb-add-url' => Yii::app()->createUrl("skill/skill/addSkillTimelineItem", array("skillId" => $skillId)),
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-skill-timeline-form-error-display" class="text-left row">

  </div>
</div>
<div class="form-group row">
  <?php echo $form->textField($skillTimelineModel, 'day', array('id' => 'gb-skill-timeline-form-day-input', 'class' => ' form-control col-lg-12 col-sm-12 col-md-12 col-xs-12', 'maxlength' => 4, 'placeholder' => 'Day')); ?>
  <?php echo $form->error($skillTimelineModel, 'day'); ?>
</div>
<div class="form-group row">
  <?php echo $form->textField($timelineModel, 'title', array('id' => 'gb-skill-timeline-form-title-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Entry Title')); ?>
  <?php echo $form->error($timelineModel, 'title'); ?>
</div>
<div class="form-group row">
  <?php echo $form->textArea($timelineModel, 'description', array('id' => 'gb-skill-timeline-form-description-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Description. max 250 characters', 'rows' => '2')); ?>
  <?php echo $form->error($timelineModel, 'description'); ?>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Add", array('class' => 'gb-submit-form btn btn-primary', 'gb-ajax-return-action' => Type::$AJAX_RETURN_ACTION_REPLACE)); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
     