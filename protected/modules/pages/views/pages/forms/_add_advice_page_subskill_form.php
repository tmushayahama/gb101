<?php
/* @var $this SkillCommitmentController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-advice-page-skill-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-padding-thin gb-background-white',
  'data-gb-url' => Yii::app()->createUrl("pages/pages/addAdvicePageSubskill", array("advicePageId" => $advicePageId)),
  'gb-edit-url' => Yii::app()->createUrl("pages/pages/editAdvicePageSubskill", array("advicePageId" => $advicePageId)),
  'data-gb-prepend-to' => "#gb-advice-page-skills",
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-advice-page-skill-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>Your Advice Page will not be active until you finish.</p>
  </div>
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
    <div class="form-group row">
      <?php echo $form->textField($skillModel, 'title', array('id' => 'gb-skillist-title-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Subskill Title')); ?>
      <?php echo $form->error($skillModel, 'title'); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->textArea($skillModel, 'description', array('class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Sub Skill Description. max 250 characters', 'rows' => 5)); ?>
      <?php echo $form->error($skillModel, 'description'); ?>
    </div>
  </div>
</div>
<div class="modal-footer">
  <div class="row">
    <div class="pull-right btn-group">
      <button type="button" class="btn btn-default gb-form-hide" >Cancel</button>
      <?php echo CHtml::submitButton('Submit', array('class' => 'gb-submit-form btn btn-primary', 'data-gb-action' => $ajaxReturnAction)); ?>
    </div>
  </div>
</div>
<?php $this->endWidget(); ?>
<br>