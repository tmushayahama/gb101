<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$url;
?>

<?php
if ($mentorship->owner->id == Yii::app()->user->id):
  $url = Yii::app()->createUrl('mentorship/mentorship/mentorshipManagement', array('mentorshipId' => $mentorship->id));
else:
  $url = Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorship->id));
endif;
?>
<div class="gb-post-entry gb-commitment-post" mentorship-id="<?php echo $mentorship->id; ?>"
     gb-source-pk-id="<?php echo $mentorship->id; ?>" gb-data-source="<?php echo Type::$SOURCE_MENTORSHIP; ?>">

  <div class="row">
    <div class="col-lg-2 col-sm-2 col-xs-2">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorship->owner->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default col-lg-10 col-sm-10 col-xs-10 gb-mentorship-top-border gb-no-padding">
      <div class='panel-heading'><h5><a><i>Mentorship</i></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->owner_id)); ?>"><?php echo $mentorship->owner->profile->firstname . " " . $mentorship->owner->profile->lastname ?></a></h5></div>
      <div class="panel-body skill-commitment-title">
        <p>
          <a class="mentorship-title" href="<?php echo $url; ?>"><?php echo $mentorship->title; ?></a>   
          <?php echo $mentorship->description ?>
        </p>
      </div>
      <div class="panel-footer gb-no-padding">
        <?php if (!Yii::app()->user->isGuest): ?>
          <?php
          $pendingRequest = Notification::getPendingRequest(
              array(Notification::$NOTIFICATION_MENTEE_REQUEST, Notification::$NOTIFICATION_MENTOR_REQUEST), $mentorship->id)
          ?>
          <?php if ($mentorship->owner->id == Yii::app()->user->id): ?>
            <div class="row">
              <div class="pull-right">
                <a class="btn btn-link gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                <a href="<?php echo $url; ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
              </div>
            </div>
          <?php elseif ($pendingRequest != null): ?>
            <?php $requestText = Mentorship::getMentorshipTypeName($mentorship->type); ?>
            <div class="row gb-padding-thin">
              <h5 class="pull-left gb-padding-thinner"><?php echo $requestText; ?>:- </h5> <?php echo " " . $pendingRequest->message; ?>
            </div>
            <div class="row gb-padding-thin">
              <div class="pull-left">
                <a class="gb-accept-request-btn btn btn-xs btn-primary" gb-notificaction-id="<?php echo $pendingRequest->id ?>"><i class="glyphicon glyphicon-ok"></i> Accept</a>
                <a class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i> Ignore</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo $url; ?>" class="btn btn-xs btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
              </div>
            </div>
          <?php else: ?>
            <div class="row">
              <div class="pull-right">
                <a href="<?php echo $url; ?>" class="btn btn-xs btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
              </div>
            </div>
          <?php endif; ?>
        <?php else: ?>
          <div class="row">
            <div class="pull-right">
              <a href="<?php echo $url; ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
            </div>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>