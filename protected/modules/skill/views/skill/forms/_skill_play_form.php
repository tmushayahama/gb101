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
    'class' => 'gb-play-form',
    'data-gb-url' => $actionUrl,
    'validateOnSubmit' => true,
    'onsubmit' => "return true;")
  ));
?>
<div class="gb-body gb-padding-thin row">
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-11 ">
  <?php $skill = Skill::getRandomSkill(); ?>
  <img src="<?php echo Yii::app()->request->baseUrl . "/img/placeholders/skill_cover_3.png" ?>" class="gb-img" alt="">
  <p class="col-lg-12 col-sm-12 col-xs-12 ">
   <strong><?php echo $skill->title ?></strong> <?php echo $skill->description ?>
  </p>
 </div>
 <?php echo $form->hiddenField($skillPlayAnswerModel, 'skill_id', array('value' => $skill->id)); ?>
</div>
<div class="gb-footer row">
 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thin">
  <?php
  echo CHtml::submitButton('Not Now', array(
    'gb-edit-btn' => 0,
    'class' => 'gb-form-next gb-answer-btn btn btn-default',
    'data-gb-type' => Level::$LEVEL_SKILL_PLAY_NOT_NOW,
    'data-gb-action' => $ajaxReturnAction));
  ?>
 </div>
 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thin">
  <?php
  echo CHtml::submitButton('Ehh!', array(
    'gb-edit-btn' => 0,
    'class' => 'gb-form-next gb-answer-btn btn btn-default',
    'data-gb-type' => Level::$LEVEL_SKILL_PLAY_EHH,
    'data-gb-action' => $ajaxReturnAction));
  ?>
 </div>
 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thin">
  <?php
  echo CHtml::submitButton('Explore', array(
    'gb-edit-btn' => 0,
    'class' => 'gb-form-next gb-answer-btn btn btn-default',
    'data-gb-type' => Level::$LEVEL_SKILL_PLAY_EXPLORE,
    'data-gb-action' => $ajaxReturnAction));
  ?>
 </div>
</div>
<?php $this->endWidget(); ?>