<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'discussion-input-form',
 'enableAjaxValidation' => false,
 'htmlOptions' => array(
  'class' => 'form',
  'onsubmit' => "return true;")
  ));
?>

<?php echo $form->errorSummary($discussionModel, $discussionTitleModel); ?>
<div class="form-group row">
  <?php echo $form->textField($discussionTitleModel, 'title', array("id" => "gb-add-goal-title-input", 'class' => 'input-lg col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Discussion Title ex. "GETTING STARTED')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textArea($discussionModel, 'description', array('class' => 'input-lg col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Start a Discussion', 'rows' => 2)); ?>
</div>
<div class="form-group row">
  <?php echo CHtml::submitButton('Post', array('id' => 'gb-discussion-submit-btn', 'class' => 'btn btn-primary')); ?>
</div>
<?php $this->endWidget(); ?>

