<?php
/* @var $this SkillCommitmentController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-project-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
  'data-gb-url' => Yii::app()->createUrl("project/project/addproject", array()),
  'data-gb-url' => Yii::app()->createUrl("project/project/addproject", array()),
  'data-gb-prepend-to' => "#gb-posts",
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-project-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
    <?php //echo $form->hiddenField($advicePageModel, 'privacy', array('id' => 'gb-page-share-with-sharing-type', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
    <div class="form-group row">
      <?php echo $form->textField($projectModel, 'name', array('id' => 'gb-project-form-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 70, 'placeholder' => 'Project Name')); ?>
      <?php echo $form->error($projectModel, 'name'); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->textArea($projectModel, 'description', array('id' => 'gb-project-form-description', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Project Description. max characters 250', 'rows' => 2)); ?>
      <?php echo $form->error($projectModel, 'description'); ?>
    </div>
    <div class="form-group row">
      <div class="form-group row">
        <h5 class="pull-left gb-padding-thin">Privacy: <span class="gb-page-share-with-privacy">Private</span></h5>
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <button type="button" class="btn btn-default gb-form-hide" data-dismiss="modal">Cancel</button>
    <?php echo CHtml::submitButton('Submit', array('id' => 'gb-advice-page-btn', 'class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => Type::$AJAX_RETURN_ACTION_REDIRECTS)); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
