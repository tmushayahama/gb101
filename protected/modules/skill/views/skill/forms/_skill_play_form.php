<?php
/* @var $this SkillCommitmentController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => 'gb-skill-play-form',
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    'class' => '',
    'data-gb-url' => $actionUrl,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="gb-form-border gb-padding-thin row">
 <div class="col-lg-12 col-sm-12 col-xs-11 gb-padding-none">
  <?php $skill = Skill::getRandomSkill(); ?>
  <p class="gb- col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
   <?php echo $skill->title ?>
  </p>
 </div>
 <?php echo $form->hiddenField($skillPlayAnswerModel, 'skill_id', array('value' => $skill->id)); ?>
 <div class="modal-footer">
  <div class="row">
   <?php
   echo CHtml::submitButton('Pass', array(
     'gb-edit-btn' => 0,
     'class' => 'gb-form-next btn btn-default',
     'data-gb-type' => "1",
     'data-gb-action' => $ajaxReturnAction));
   ?>
   <?php
   echo CHtml::submitButton('Maybe', array(
     'gb-edit-btn' => 0,
     'class' => 'gb-form-next btn btn-default',
     'data-gb-type' => "2",
     'data-gb-action' => $ajaxReturnAction));
   ?>
  </div>
  <div class="btn-group pull-right">
   <?php
   echo CHtml::submitButton('Dream', array(
     'gb-edit-btn' => 0,
     'class' => 'gb-form-next btn btn-default',
     'data-gb-type' => "3",
     'data-gb-action' => $ajaxReturnAction));
   ?>
   <?php
   echo CHtml::submitButton('Goal', array(
     'gb-edit-btn' => 0,
     'class' => 'gb-form-next btn btn-default',
     'data-gb-type' => "4",
     'data-gb-action' => $ajaxReturnAction));
   ?>
  </div>
 </div>
</div>
<?php $this->endWidget(); ?>
