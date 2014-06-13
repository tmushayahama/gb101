<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-discussion-title-form',
 'enableAjaxValidation' => false,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-white-background gb-padding-thin',
  'onsubmit' => "return false;")
  ));
?>

<?php echo $form->errorSummary($discussionTitleModel); ?>
<div class="form-group row">
  <?php echo $form->textField($discussionTitleModel, 'title', array("id" => "gb-goal-title-input", 'class' => 'input-lg form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Discussion Title e.g. "GETTING STARTED')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textArea($discussionTitleModel, 'description', array('class' => 'input-lg form-control col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Description', 'rows' => 2)); ?>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Post", array('class' => 'btn btn-primary', 'onclick' => 'postDiscussionTitle();')); ?>
  </div>
</div>
<?php $this->endWidget(); ?>

