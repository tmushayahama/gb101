<?php
$form = $this->beginWidget('UActiveForm', array(
 'id' => 'gb-skill-weblink-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-no-padding',
  'gb-add-url' => Yii::app()->createUrl("skill/skill/addSkillWeblink", array("skillId" => $skillId)),
  'gb-submit-prepend-to' => "#gb-weblinks",
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-header gb-form-header-2">
  <div class="row">
    <h3 class="gb-form-heading pull-left">Add Weblink List</h3>
    <div class="pull-right btn-group">
      <a class="gb-form-hide btn btn-xs btn-default">X</a>
    </div>
  </div>
</div>
<div class="gb-form-body row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-skill-weblink-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="form-group row">
    <?php echo $form->hiddenField($weblinkModel, 'parent_weblink_id', array('id' => 'gb-skill-weblink-form-parent-weblink-id-input')); ?>
  </div>
  <div class="form-group row">
    <?php echo $form->textField($weblinkModel, 'link', array('id' => 'gb-skill-weblink-form-title-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Title')); ?>
    <?php echo $form->error($weblinkModel, 'link') ?>
  </div>
   <div class="form-group row">
    <?php echo $form->textField($weblinkModel, 'title', array('id' => 'gb-skill-weblink-form-title-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 75, 'placeholder' => 'Title')); ?>
    <?php echo $form->error($weblinkModel, 'title') ?>
  </div>
  <div class="form-group row">
    <?php echo $form->textArea($weblinkModel, 'description', array('id' => 'gb-skill-weblink-form-description-input', 'class' => ' form-control col-lg-12 col-md-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Weblink Description. max 250 characters', 'rows' => '2')); ?>
    <?php echo $form->error($weblinkModel, 'description') ?>
  </div>
</div>
<div class="modal-footer">
  <div class="pull-right btn-group">
    <a class="gb-form-hide btn btn-default">Cancel</a>
    <?php echo CHtml::submitButton("Add", array('class' => 'gb-submit-form btn gb-btn-2', 'gb-ajax-return-action' => Type::$AJAX_RETURN_ACTION_REPLACE)); ?>
  </div>
</div>
<?php $this->endWidget(); ?>
     