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
  'class' => 'gb-panel-form gb-hide col-lg-12 col-sm-12 col-xs-12 gb-padding-thin',
  'onsubmit' => "return false;")
  ));
?>

<?php echo $form->errorSummary($discussionTitleModel); ?>
<div class="form-group row">
  <?php echo $form->textField($discussionTitleModel, 'title', array("id" => "gb-add-goal-title-input", 'class' => 'input-sm col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Discussion Title e.g. "GETTING STARTED')); ?>
</div>
<div class="form-group row">
  <?php echo $form->textArea($discussionTitleModel, 'description', array('class' => 'input-sm col-lg-12 col-sm-12 col-xs-12', 'placeholder' => 'Description', 'rows' => 2)); ?>
</div>
<div class="form-group row">
  <?php echo CHtml::submitButton(UserModule::t("Post"), array('class' => 'btn btn-success', 'onclick' => 'postDiscussionTitle();')); ?>
  <a class="gb-post-discussion-title-cancel-btn btn btn-default">Cancel</a>
</div>
<?php $this->endWidget(); ?>

