<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>

<div class="gb-request-notification-row panel panel-default">
  <div class="col-lg-2 col-sm-2 col-xs-2">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $request->sender->profile->avatar_url; ?>" class="gb-img-default gb-img-md pull-right img-polariod" alt="">
  </div>
  <div class="col-lg-10 col-sm-10 col-xs-10 panel panel-default gb-no-padding gb-discussion-title-side-border">
    <div class="panel-body">
      <?php $requestText; ?>
      <?php if ($request->type == Notification::$NOTIFICATION_MENTEE_REQUEST_OWNER) : ?>
        <?php $requestText = "Mentee Request"; ?>
      <?php elseif ($request->type == Notification::$NOTIFICATION_MENTOR_REQUEST_OWNER) : ?>
        <?php $requestText = "Mentor Request"; ?>
      <?php endif; ?>
      <h4><?php echo $requestText; ?>
        <small><a class="btn btn-link gb-toggle" gb-target="<?php echo '#gb-request-view-' . $request->id; ?>">view message</a></small>
      </h4>
      <div id="<?php echo 'gb-request-view-' . $request->id; ?>" class="gb-hide row">
        <?php echo $request->message; ?>
      </div>
    </div>
    <div class="panel-footer gb-no-padding">
      <div class="row">
        <a class="btn btn-link" href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $request->sender_id)); ?>">
          <?php echo $request->sender->profile->firstname . " " . $request->sender->profile->lastname ?>
        </a>
        <div class="btn-group pull-right">
          <a class="gb-accept-request-btn btn btn-sm btn-primary" gb-notification-id="<?php echo $request->id ?>"><i class="glyphicon glyphicon-ok"></i> Accept</a>
          <a class="btn btn-default btn-sm"><i class="glyphicon glyphicon-trash"></i> Ignore</a>
        </div>
      </div>
    </div>
  </div>
</div>
