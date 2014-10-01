<?php
/* @var $this SkillCommitmentController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-promise-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
  'gb-add-url' => Yii::app()->createUrl("promise/promise/addpromise", array()),
  'gb-add-url' => Yii::app()->createUrl("promise/promise/addpromise", array()),
  'gb-submit-prepend-to' => "#gb-posts",
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-promise-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
    <?php //echo $form->hiddenField($advicePageModel, 'privacy', array('id' => 'gb-page-share-with-sharing-type', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12')); ?>
    <div class="form-group row">
      <?php echo $form->textField($promiseModel, 'title', array('id' => 'gb-promise-form-title-input', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 70, 'placeholder' => 'Promise Title')); ?>
      <?php echo $form->error($promiseModel, 'title'); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->textArea($promiseModel, 'description', array('id' => 'gb-promise-form-description', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Promise Description. max characters 250', 'rows' => 2)); ?>
      <?php echo $form->error($promiseModel, 'description'); ?>
    </div>
    <div class="form-group row">       
      <?php
      echo CHtml::activeDropDownList($promiseListModel, 'level_id', $promiseLevelList, array('empty' => 'Select Promise Level',
       'id' => 'gb-promise-list-form-level-input',
       'class' => ' form-control col-lg-12 col-sm-12 col-xs-12'));
      ?>
      <?php echo $form->error($promiseListModel, 'level_id'); ?>
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
    <?php echo CHtml::submitButton('Submit', array('id' => 'gb-advice-page-btn', 'class' => 'gb-submit-form btn btn-primary', 'gb-ajax-return-action' => Type::$AJAX_RETURN_ACTION_REDIRECTS)); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
