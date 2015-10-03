<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => 'gb-goal-play-form',
  'enableAjaxValidation' => true,
  //'enableClientValidation' => true,
  'htmlOptions' => array(
    'class' => 'gb-play-form',
    'data-gb-url' => $actionUrl,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="gb-body gb-padding-thin row">
 <div class="col-lg-12 col-sm-12 col-xs-11 ">
  <?php $goal = Goal::getRandomGoal(); ?>
  <img src="<?php echo Yii::app()->request->baseUrl . "/img/placeholders/goal_cover_3.png" ?>" class="" alt="">
  <p class="col-lg-12 col-sm-12 col-xs-12 ">
   <strong><?php echo $goal->title ?></strong> <?php echo $goal->description ?>
  </p>
 </div>
 <?php echo $form->hiddenField($goalPlayAnswerModel, 'goal_id', array('value' => $goal->id)); ?>
</div>
<div class="gb-footer row">
 <?php
 echo CHtml::submitButton('Not Now', array(
   'gb-edit-btn' => 0,
   'class' => 'gb-form-next btn btn-danger col-lg-3 col-md-3 col-xs-6 col-sm-6',
   'data-gb-type' => "1",
   'data-gb-action' => $ajaxReturnAction));
 ?>
 <?php
 echo CHtml::submitButton('Ehh!!!', array(
   'gb-edit-btn' => 0,
   'class' => 'gb-form-next btn btn-default col-lg-3 col-md-3 col-xs-6 col-sm-6',
   'data-gb-type' => "2",
   'data-gb-action' => $ajaxReturnAction));
 ?>
 <?php
 echo CHtml::submitButton('Dream', array(
   'gb-edit-btn' => 0,
   'class' => 'gb-form-next btn btn-success col-lg-3 col-md-3 col-xs-6 col-sm-6',
   'data-gb-type' => "3",
   'data-gb-action' => $ajaxReturnAction));
 ?>
 <?php
 echo CHtml::submitButton('Goal', array(
   'gb-edit-btn' => 0,
   'class' => 'gb-form-next btn btn-success col-lg-3 col-md-3 col-xs-6 col-sm-6',
   'data-gb-type' => "4",
   'data-gb-action' => $ajaxReturnAction));
 ?>
</div>
<?php $this->endWidget(); ?>
