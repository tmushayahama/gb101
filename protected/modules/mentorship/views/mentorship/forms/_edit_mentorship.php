<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-edit-mentorship-form',
 'enableAjaxValidation' => false,
 'htmlOptions' => array(
  'class' => 'gb-hide col-lg-12 col-sm-12 col-xs-12 gb-padding-thin',
  'onsubmit' => "return false;")
  ));
?>
<?php echo $form->errorSummary($mentorshipModel); ?>
<div class="form-group row">
  <?php echo $form->textField($mentorshipModel, 'title', array("id" => "gb-mentorship-title-input", 'class' => 'input-lg col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Mentorship Title')); ?>
</div>
<div class="form-group row">
 <input type="text" class='input-lg col-lg-12 col-sm-12 col-xs-12' readonly value="<?php echo $mentorshipModel->goal->title; ?>">
</div>
<div class="form-group row">
  <?php echo $form->textArea($mentorshipModel, 'description', array("id" => "gb-mentorship-description-input", 'class' => 'input-lg col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Mentorship Description', 'rows' => 2)); ?>
</div>
<div class="form-group row">
  <?php echo CHtml::submitButton("Update", array('class' => 'btn btn-success', 'onclick' => 'updateMentorshipDetails();')); ?>
  <a class="gb-update-mentorship-cancel-btn btn btn-default">Cancel</a>
</div>
<?php $this->endWidget(); ?>

