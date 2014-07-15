<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$url = "";
$pendingRequest = Notification::getPendingRequest(
    array(Notification::$NOTIFICATION_MENTEE_REQUEST_OWNER, Notification::$NOTIFICATION_MENTOR_REQUEST_OWNER), $mentorship->id)
?>

<?php
if ($mentorship->owner->id == Yii::app()->user->id) {
  $url = Yii::app()->createUrl('mentorship/mentorship/mentorshipManagement', array('mentorshipId' => $mentorship->id));
} else {
  $redirectMentorshipId = Mentorship::getMentorshipRedirectId($mentorship);
  if ($redirectMentorshipId) {
    $url = Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $redirectMentorshipId->id));
  }
}
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
        <?php if ($pendingRequest): ?>
          <p><i class="text-warning">The link to the mentorship page will be available 
              after the request has been accepted.</i><br>
            <strong class="mentorship-title" ><?php echo $mentorship->title; ?></strong>   
            <?php echo $mentorship->description ?>
          </p>
        <?php else: ?>
          <p>
            <a class="mentorship-title" href="<?php echo $url; ?>"><?php echo $mentorship->title; ?></a>   
            <?php echo $mentorship->description ?>
          </p>
        <?php endif; ?>
      </div>
      <div class="panel-footer gb-no-padding">
        <?php if (!Yii::app()->user->isGuest): ?>
          <?php if ($mentorship->owner->id == Yii::app()->user->id): ?>
            <div class="row">
              <div class="pull-left">
                <?php if ($mentorship->type == Mentorship::$TYPE_NEED_MENTOR): ?>
                  <a class="gb-send-request-modal-trigger gb-form-show btn btn-link"
                     gb-type="<?php echo Notification::$NOTIFICATION_MENTOR_REQUEST_OWNER; ?>" 
                     gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
                     gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
                     gb-source-pk-id="<?php echo $mentorship->id; ?>" 
                     gb-data-source="<?php echo Type::$SOURCE_MENTORSHIP; ?>"
                     gb-form-slide-target="#gb-request-form-container"
                     gb-form-target="#gb-request-form">
                    Request Mentor(s)
                  </a>
                <?php elseif ($mentorship->type == Mentorship::$TYPE_NEED_MENTEE): ?>
                  <a class="gb-send-request-modal-trigger gb-form-show btn btn-link"
                     gb-type="<?php echo Notification::$NOTIFICATION_MENTEE_REQUEST_OWNER; ?>" 
                     gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
                     gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
                     gb-source-pk-id="<?php echo $mentorship->id; ?>" 
                     gb-data-source="<?php echo Type::$SOURCE_MENTORSHIP; ?>"
                     gb-form-slide-target="#gb-request-form-container"
                     gb-form-target="#gb-request-form">
                    Request Mentee(s)
                  </a>
                <?php endif; ?>
              </div>
              <div class="pull-right">
                <a class="btn btn-link gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                <a href="<?php echo $url; ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
              </div>
            </div>
          <?php elseif ($pendingRequest): ?>
            <?php $requestText = Mentorship::getMentorshipTypeName($mentorship->type); ?>
            <div class="row gb-padding-thin">
              <h5 class="pull-left gb-padding-thinner"><?php echo $requestText; ?>:- </h5> <?php echo " " . $pendingRequest->message; ?>
            </div>
            <div class="row gb-padding-thin">
              <div class="pull-left">
                <a class="gb-accept-request-btn btn btn-xs btn-primary" gb-notification-id="<?php echo $pendingRequest->id ?>"><i class="glyphicon glyphicon-ok"></i> Accept</a>
                <a class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i> Ignore</a>
              </div>
            </div>
          <?php else: ?> <!-- I am not the owner -->
            <div class="row">
              <div class="pull-left">
                <?php if ($mentorship->type == Mentorship::$TYPE_NEED_MENTOR): ?>
                  <a class="gb-send-request-modal-trigger gb-form-show btn btn-link"
                     gb-type="<?php echo Notification::$NOTIFICATION_MENTEE_REQUEST_FRIEND; ?>" 
                     gb-recipient-id="<?php echo $mentorship->owner_id; ?>"
                     gb-requester-type="<?php echo Notification::$REQUEST_FROM_FRIEND; ?>"
                     gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
                     gb-source-pk-id="<?php echo $mentorship->id; ?>" 
                     gb-data-source="<?php echo Type::$SOURCE_MENTORSHIP; ?>"
                     gb-form-slide-target="#gb-request-form-container"
                     gb-form-target="#gb-request-form">
                    Request Mentorship
                  </a>
                <?php elseif ($mentorship->type == Mentorship::$TYPE_NEED_MENTEE): ?>
                  <a class="gb-send-request-modal-trigger gb-form-show btn btn-link"
                     gb-type="<?php echo Notification::$NOTIFICATION_MENTOR_REQUEST_FRIEND; ?>" 
                     gb-recipient-id="<?php echo $mentorship->owner_id; ?>"
                     gb-requester-type="<?php echo Notification::$REQUEST_FROM_FRIEND; ?>"
                     gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
                     gb-source-pk-id="<?php echo $mentorship->id; ?>" 
                     gb-data-source="<?php echo Type::$SOURCE_MENTORSHIP; ?>"
                     gb-form-slide-target="#gb-request-form-container"
                     gb-form-target="#gb-request-form">
                    Request Mentoring
                  </a>    
                <?php endif; ?>
              </div>
              <div class="pull-right">
                <a href="<?php echo $url; ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
              </div>
            </div>
          <?php endif; ?>
        <?php else: ?>  <!-- I am not logged in -->
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