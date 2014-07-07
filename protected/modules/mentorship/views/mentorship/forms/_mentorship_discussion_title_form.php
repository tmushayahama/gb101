<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-mentorship-discussion-title-form',
 'enableAjaxValidation' => false,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
  'gb-add-url' => Yii::app()->createUrl("mentorship/mentorship/postMentorshipDiscussionTitle", array("mentorshipId" => $mentorshipId)),
  'gb-submit-prepend-to' => "#gb-discussion-titles",
  'onsubmit' => "return false;")
  ));
?>
<div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-discussion-title-form-error-display" class="text-left row">

  </div>
</div>
<?php echo $form->errorSummary($discussionTitleModel); ?>
<div class="form-group row">
  <?php echo $form->textField($discussionTitleModel, 'title', array("id" => "gb-discussion-title-form-title-input", 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Discussion Title e.g. "GETTING STARTED')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textArea($discussionTitleModel, 'description', array("id" => "gb-discussion-title-form-description-input", 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Description', 'rows' => 2)); ?>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Post", array('class' => 'gb-submit-form btn btn-primary')); ?>
  </div>
</div>
<?php $this->endWidget(); ?>

