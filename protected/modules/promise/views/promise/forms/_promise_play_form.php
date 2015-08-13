<?php
/* @var $this PromiseCommitmentController */
/* @var $model PromiseCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => 'gb-promise-play-form',
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
 <div class="col-lg-12 col-sm-12 col-xs-11 gb-padding-none">
  <?php $promise = Promise::getRandomPromise(); ?>
  <img src="<?php echo Yii::app()->request->baseUrl . "/img/placeholders/promise_cover_3.png" ?>" class="" alt="">
  <p class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
   <strong><?php echo $promise->title ?></strong> <?php echo $promise->description ?>
  </p>
 </div>
 <?php echo $form->hiddenField($promisePlayAnswerModel, 'promise_id', array('value' => $promise->id)); ?>
</div>
<div class="gb-footer row">
 <div class="btn-group">
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
<?php $this->endWidget(); ?>
