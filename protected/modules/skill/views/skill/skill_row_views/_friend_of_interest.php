<?php
/* @var $this SkillListItemController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
$skillUrl = "";
if (Yii::app()->user->isGuest) {
  $skillUrl = Yii::app()->createUrl("skill/skill/skillbank", array());
} else {
  $skillUrl = Yii::app()->createUrl("skill/skill/skillhome", array());
}
?>
<div class="gb-skill-gained" skill-id="<?php echo $skillListItem->id; ?>">
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillListItem->owner->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default gb-no-padding gb-skill-of-interest-top-border col-lg-10 col-sm-10 col-xs-12">
      <div class="panel-heading">
        <?php if ($source == SkillList::$SOURCE_ADVICE_PAGE): ?>
          <h5><a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillListItem->owner_id)); ?>"><?php echo $skillListItem->owner->profile->firstname . " " . $skillListItem->owner->profile->lastname ?></a></h5>
        <?php else: ?>
          <h5><a href="<?php echo $skillUrl; ?>" class="skill-level" skill-level-id="<?php echo $skillListItem->level_id; ?>"><?php echo $skillListItem->level->name ?></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillListItem->owner_id)); ?>"><?php echo $skillListItem->owner->profile->firstname . " " . $skillListItem->owner->profile->lastname ?></a></h5>
       <?php endif; ?>
      </div> 
      <div class="panel-body row">
        <div class="row gb-panel-display">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
            <p class="">
              <a class="skill-title" href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>">
                <?php echo $skillListItem->skill->title; ?>
              </a>   
              <span class="skill-description"><?php echo $skillListItem->skill->description ?></span>
            </p>
          </div>
        </div>
        <div class="gb-panel-form gb-hide">

        </div>
      </div>
      <div class="panel-footer gb-panel-display gb-no-padding">
        <div class="row">
          <div class="pull-left">
            <?php if ($source == SkillList::$SOURCE_ADVICE_PAGE): ?>
              <a href="" class="btn btn-link"><i class="glyphicon glyphicon-thumbs-up"></i></a>
              <a href="" class="btn btn-link"><i class="glyphicon glyphicon-thumbs-down"></i></a>
            <?php endif; ?>
          </div>
          <div class="pull-right">
            <a href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

