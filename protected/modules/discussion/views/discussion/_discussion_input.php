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
<div class="control-group ">
  <div class="controls">
    <?php echo $form->textField($discussionTitleModel, 'title', array("id" => "gb-add-goal-title-input", 'class' => 'input-block-level', 'placeholder' => 'Discussion Title ex. "GETTING STARTED')); ?>
    <?php echo $form->textArea($discussionModel, 'description', array('class' => 'input-block-level', 'placeholder' => 'Start a Discussion', 'rows' => 3)); ?>
  </div>
</div>
<?php echo CHtml::submitButton('Post', array('id' => 'gb-discussion-submit-btn', 'class' => 'span3 gb-btn gb-btn-blue-2')); ?>

<?php $this->endWidget(); ?>

