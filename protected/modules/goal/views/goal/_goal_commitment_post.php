<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<?php if ($goalCommitment->owner->id == Yii::app()->user->id) : ?>
  <div class="gb-commitment-post">
    <span class='gb-top-heading gb-heading-left'>Skill Commitment</span>
    <span class='gb-top-heading gb-heading-right'><?php echo $goalCommitment->goal->type->type ?></span>
    <div class="gb-post-title ">
      <span class="span2">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
      </span>
      <span class="span8">
        <a><h5><?php echo $goalCommitment->owner->profile->firstname . " " . $goalCommitment->owner->profile->lastname ?></h5></a>
        <small><a><i>Shared to <?php echo $connection_name ?></i></a> - <a>12/03/13</a></small>								
      </span>
      <span class="span2">
        <h4 class="pull-right"><?php echo $goalCommitment->goal->points_pledged ?>
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/puntos_icon.png" class="gb-puntos-icon" alt="P">
        </h4>
      </span> 
    </div>
    <div class="gb-post-content row">
      <span class="span8">
        <h4 class="goal-commitment-title"><a href="<?php echo Yii::app()->createUrl('goal/goal/goalManagement', array('goalCommitmentId' => $goalCommitment->id)); ?>"><?php echo $goalCommitment->goal->title; ?></a>   
          <small> <?php echo $goalCommitment->goal->description ?></small>
        </h4>
      </span>
      <span class=" span4">
        <ul class="gb-post-action pull-righ nav nav-stacked">
          <li><h6><a class="gb-request-monitors-modal-trigger" goal-id="<?php echo $goalCommitment->id; ?>"><i class="icon icon-eye-open"></i>Get Monitors</a> <a class="badge badge-info pull-right">0</a></h6></li>         
          <li><h6><a class="gb-request-mentorship-modal-trigger" goal-id="<?php echo $goalCommitment->id; ?>"><i class="icon icon-plane"></i>Get Mentorship</a> <a class="badge badge-info pull-right">0</a></h6></li>
          <li><h6><a><i class="icon icon-eye-open"></i>Get Judges</a><a class="badge badge-info pull-right">0</a></h6></li>
        </ul>
      </span>
    </div>
    <div class="gb-footer inline">
      <a class="gb-btn">Activities: 0</a>
      <div class="pull-right">
        <a href="<?php echo Yii::app()->createUrl('goal/goal/goalManagement', array('goalCommitmentId' => $goalCommitment->id)); ?>" class="gb-btn"><strong>More Details</strong></a>
        <a class="gb-btn"><i class="icon-edit"></i></a>
        <a class="gb-btn-red-1"><i class="icon-white icon-trash"></i></a>
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="gb-commitment-post">
    <span class='gb-top-heading gb-heading-left'>Skill Commitment</span>
    <span class='gb-top-heading gb-heading-left'><?php echo $goalCommitment->goal->type->type; ?></span>
    <div class="gb-post-title ">
      <span class="span1">
        <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
      </span>
      <span class="span8">
        <a><strong><?php echo $goalCommitment->owner->profile->firstname . " " . $goalCommitment->owner->profile->lastname ?></strong></a><br>
        <small><a><i>Shared to <?php echo $connection_name ?></i></a> - <a>12/03/13</a></small>								
      </span>
      <span class="span3">
        <h4 class="pull-right"><?php echo $goalCommitment->goal->points_pledged ?>
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/puntos_icon.png" class="gb-puntos-icon" alt="P">
        </h4>
      </span> 
    </div>
    <div class="gb-post-content row">
      <span class="span8">
        <h4 class="goal-commitment-title"><a href="<?php echo Yii::app()->createUrl('goal/goal/goalManagement', array('goalCommitmentId' => $goalCommitment->id)); ?>"><?php echo $goalCommitment->goal->title; ?></a>   
          <small> <?php echo $goalCommitment->goal->description ?></small>
        </h4>
      </span>
      <span class=" span4">
        <ul class="gb-post-action pull-righ nav nav-stacked">
          <li><h6><a class="gb-request-monitee-modal-trigger" goal-id="<?php echo $goalCommitment->id; ?>"><i class="icon icon-eye-open"></i>Monitor</a> <a class="badge badge-info pull-right">0</a></h6></li>
          <li><h6><a class="gb-request-menteeship-modal-trigger" goal-id="<?php echo $goalCommitment->id; ?>"><i class="icon icon-plane"></i>Mentor</a> <a class="badge badge-info pull-right">0</a></h6></li>
          <li><h6><a><i class="icon icon-eye-open"></i>Judge</a><a class="badge badge-info pull-right">0</a></h6></li>
          <li><h6><i class="icon icon-tag"></i> Follow<a class="badge badge-info pull-right">0</a></h6></li>
          <li><h6><i class="icon icon-thumbs-up"></i> Assist<a class="badge badge-info pull-right">0</a></h6></li>
        </ul>
      </span>
    </div>
    <div class="gb-footer inline">
      <a class="gb-btn">Activities: 0</a>
      <a class="gb-btn">Share</a>
      <div class="pull-right">
        <a href="<?php echo Yii::app()->createUrl('goal/goal/goalManagement', array('goalCommitmentId' => $goalCommitment->id)); ?>" class="gb-btn"><strong>More Details</strong></a>
        <a class="gb-btn"><i class="icon-edit"></i></a>
        <a class="gb-btn-red-1"><i class="icon-white icon-trash"></i></a>
      </div>
    </div>
  </div>
<?php endif; ?>
