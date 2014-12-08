<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-mentorship-discussion-form',
 'enableAjaxValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
  'data-gb-url' => Yii::app()->createUrl("mentorship/mentorship/postMentorshipDiscussionTitle", array("mentorshipId" => $mentorshipId)),
  'data-gb-prepend-to' => "#gb-discussion-titles",
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
  <h5 class="text-error text-left">Errors Found</h5>
  <div id="gb-mentorship-discussion-form-error-display" class="text-left row">

  </div>
</div>
<div class="form-group row">
  <?php echo $form->textArea($discussionModel, 'description', array("id" => "gb-discussion-form-description-input", 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Description', 'rows' => 3)); ?>
  <?php echo $form->error($discussionModel, 'description'); ?>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Post", array('class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => $ajaxReturnAction)); ?>
  </div>
</div>
<?php $this->endWidget(); ?>

