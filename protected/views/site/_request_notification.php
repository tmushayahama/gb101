<?php
/* @var $this SkillCommitmentController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
?>

<div class="gb-request-notification-row gb-background-white row">
 <div class="col-lg-2 col-sm-2 col-xs-2">
  <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $request->sender->profile->avatar_url; ?>" class="gb-img-default gb-img-md pull-right img-polariod" alt="">
 </div>
 <div class="col-lg-8 col-sm-10 col-xs-10 panel panel-default  gb-discussion-title-side-border">
  <p>
   <strong><a class="" href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $request->sender_id)); ?>">
     <?php echo $request->sender->profile->firstname . " " . $request->sender->profile->lastname ?>
    </a></strong>
   <small><?php echo Notification::displayRequestText($request); ?></small>
  </p>
  <small><a class="btn btn-link gb-toggle" gb-target="<?php echo '#gb-request-view-' . $request->id; ?>">view message</a></small>
  <div id="<?php echo 'gb-request-view-' . $request->id; ?>" class="gb-hide row">
   <?php echo $request->message; ?>
  </div>
 </div>
 <div class="col-lg-2 col-sm-12 col-xs-10">
  <div class="btn-group pull-right">
   <a class="gb-accept-request-btn btn btn-default" data-gb-notification-id="<?php echo $request->id ?>"><i class="text-success glyphicon glyphicon-ok"></i></a>
   <a class="btn btn-default"><i class="text-danger glyphicon glyphicon-trash"></i></a>
  </div>
 </div>
</div>
