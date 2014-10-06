<?php
/* @var $this SkillCommitmentController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
 'id' => 'gb-ask-question-form',
 'enableAjaxValidation' => true,
 //'enableClientValidation' => true,
 'htmlOptions' => array(
  'class' => 'gb-backdrop-escapee gb-background-white gb-padding-thin',
  'gb-add-url' => Yii::app()->createUrl("skill/skill/addSkillAskQuestion", array("skillId" => $skillId)),
  'gb-submit-prepend-to' => "#gb-questions",
  'validateOnSubmit' => true,
  'onsubmit' => "return true;")
  ));
?>
<div class="row">
  <div class="gb-error-box gb-hide col-lg-12 col-sm-12 col-xs-12 alert alert-danger alert-block">
    <h5 class="text-error text-left">Errors Found</h5>
    <div id="gb-ask-question-form-error-display" class="text-left row">

    </div>
  </div>
  <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
    <div class="form-group row">
      <?php echo $form->textField($questionModel, 'question', array('id' => 'gb-ask-question-form-question', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Question')); ?>
      <?php echo $form->error($questionModel, 'question'); ?>
    </div>
    <div class="form-group row">
      <?php echo $form->textArea($questionModel, 'description', array('id' => 'gb-ask-question-form-description', 'class' => ' form-control col-lg-12 col-sm-12 col-xs-12', 'maxlength' => 250, 'placeholder' => 'Description. max 250 characters', 'rows' => 2)); ?>
      <?php echo $form->error($questionModel, 'description'); ?>
    </div>
  </div>
</div>
<?php
switch ($formType):
  case SkillType::$FORM_TYPE_MENTORSHIP_MENTORSHIP:
    ?>
    <div class="modal-footer">
      <div class="row">
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-default gb-form-hide" >Cancel</button>
          <?php echo CHtml::submitButton('Submit', array('class' => 'gb-submit-form btn btn-primary', 'gb-ajax-return-action' => Type::$AJAX_RETURN_ACTION_PREPEND)); ?>
        </div>
      </div>
    </div>
    <?php
    break;
endswitch;
?>
<?php $this->endWidget(); ?>
