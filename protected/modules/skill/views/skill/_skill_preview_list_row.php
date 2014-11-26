<?php
/* @var $this SkillCommitmentController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
?>
<a href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillId' => $skill->id)); ?>" class="gb-skill-skill-row row home-menu-box-3 col-lg-12 col-sm-12 col-xs-12">
  <p class="gb-ellipsis">
    <?php echo $skill->title ?>
  </p>
</a>
