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
<div class="gb-skill-to-learn" skill-id="<?php echo $skillListItem->skill_id; ?>">
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillListItem->user->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default gb-no-padding gb-skill-to-learn-top-border col-lg-10 col-sm-10 col-xs-12">
      <div class="panel-heading">
        <h5><a href="<?php echo $skillUrl; ?>"><?php echo $skillListItem->level->name ?></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $skillListItem->user_id)); ?>"><?php echo $skillListItem->user->profile->firstname . " " . $skillListItem->user->profile->lastname ?></a></h5>
        <small><a><i>Shared to <?php //echo $connection_name                    ?></i></a> - <a></a></small>	
      </div> 
      <div class="panel-body row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
          <p class=""><a class="skill-title" href="<?php echo Yii::app()->createUrl('skill/skill/skillManagement', array('skillListItemId' => $skillListItem->id)); ?>"><?php echo $skillListItem->skill->title; ?></a>   
            <?php echo $skillListItem->skill->description ?>
          </p>
        </div>
      </div>
      <div class="panel-footer gb-no-padding">
        <div class="row">
          <div class="pull-left">
            <a class="btn btn-default gb-form-show-modal"
               gb-form-slide-target="#gb-mentorship-form-modal"
               gb-form-target="#gb-mentorship-form">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_0.png" class="gb-icon-1" alt="">
            </a>
            <a class="btn btn-default gb-form-show-modal gb-advice-page-form-slide"
               gb-form-slide-target="#gb-advice-page-form-modal"
               gb-form-target="#gb-advice-page-form">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_0.png" class="gb-icon-1" alt="">
            </a> 
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

