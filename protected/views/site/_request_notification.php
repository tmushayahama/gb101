<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<li class="gb-request-notification-row">
  <div class="span2">
    <img href="/prosfile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">
  </div>
  <div class="name">
    <a href="<?php echo Yii::app()->createUrl("user/profile/profile", array('id' => $request->from_id)); ?>">
      <h5><?php echo $request->from->profile->firstname . " " . $request->from->profile->lastname; ?></h5>
    </a>
    <h5>Has requested to be monitored on skill:- <small>skill is this one</small></h5>
  </div>
  <ul class="nav nav-stacked action">
    <li><a class="gb-accept-monitor-request-btn gb-btn gb-btn-color-white gb-btn-blue-4" request-notificaction-id="<?php echo $request->id ?>"><i class="icon-white icon-plus-sign"></i>Accept</a></li>
    <li><a class=" gb-btn "><i class="icon-trash"></i>Ignore</a></li>
  </ul>
</li>
