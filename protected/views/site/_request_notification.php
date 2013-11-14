<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<li class="gb-request-notification-row">
  <img href="/prosfile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" alt="">

  <div class="name">
    <a href="<?php echo Yii::app()->createUrl("user/profile/profile", array('id' => $request->from_id)); ?>">
      <h5><?php echo $request->from->profile->firstname . " " . $request->from->profile->lastname; ?></h5>
    </a>
    <?php if ($request->type == RequestNotifications::$TYPE_CONNECTION_REQUEST) { ?>
      <h5>Wants to be added to the connection </h5>
    <?php } else if ($request->type == RequestNotifications::$TYPE_MONITOR_REQUEST) { ?>
      <h5>Has requested to be monitored on skill:- <small>skill is this one</small></h5>
    <?php } else if ($request->type == RequestNotifications::$TYPE_MENTORSHIP_REQUEST) { ?>
      <h5>Has requested to be mentored on skill:- <small>skill is this one</small></h5>
    <?php } else if ($request->type == RequestNotifications::$TYPE_MENTEESHIP_REQUEST) { ?>
      <h5>Has requested to mentor you on skill:- <small>skill is this one</small></h5>
    <?php } ?>

  </div>
  <div class="action">
    <a class="gb-accept-request-btn gb-btn gb-btn-color-white gb-btn-blue-4" request-notificaction-id="<?php echo $request->id ?>"><i class="icon-white icon-plus-sign"></i>Accept</a>
    <a class="gb-btn "><i class="icon-trash"></i>Ignore</a>
  </div>
</li>
