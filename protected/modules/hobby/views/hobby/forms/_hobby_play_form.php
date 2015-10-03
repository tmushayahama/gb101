<?php
/* @var $this HobbyCommitmentController */
/* @var $model HobbyCommitment */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
  'id' => 'gb-hobby-play-form',
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
  <?php $hobby = Hobby::getRandomHobby(); ?>
  <img src="<?php echo Yii::app()->request->baseUrl . "/img/placeholders/hobby_cover_3.png" ?>" class="" alt="">
  <p class="col-lg-12 col-sm-12 col-xs-12 ">
   <strong><?php echo $hobby->title ?></strong> <?php echo $hobby->description ?>
  </p>
 </div>
 <?php echo $form->hiddenField($hobbyPlayAnswerModel, 'hobby_id', array('value' => $hobby->id)); ?>
</div>
<div class="gb-footer row">
 <?php
 echo CHtml::submitButton('Not Now', array(
   'gb-edit-btn' => 0,
   'class' => 'gb-form-next btn btn-danger col-lg-4 col-md-4 col-xs-6 col-sm-6',
   'data-gb-type' => "1",
   'data-gb-action' => $ajaxReturnAction));
 ?>
 <?php
 echo CHtml::submitButton('Maybe', array(
   'gb-edit-btn' => 0,
   'class' => 'gb-form-next btn btn-default col-lg-4 col-md-4 col-xs-6 col-sm-6',
   'data-gb-type' => "2",
   'data-gb-action' => $ajaxReturnAction));
 ?>
 <?php
 echo CHtml::submitButton('Interested', array(
   'gb-edit-btn' => 0,
   'class' => 'gb-form-next btn btn-success col-lg-4 col-md-4 col-xs-6 col-sm-6',
   'data-gb-type' => "3",
   'data-gb-action' => $ajaxReturnAction));
 ?>
</div>
<?php $this->endWidget(); ?>
