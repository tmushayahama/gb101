<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-post-entry " gb-source-pk-id="0" gb-data-source="<?php echo Type::$SOURCE_REQUESTS; ?>">
  <?php foreach ($mentorshipRequests as $mentorshipRequest): ?>
    <?php $status = ($mentorshipRequest->status == Notification::$STATUS_PENDING) ?>
    <div class="gb-post-entry " mentorship-id="<?php echo $mentorship->id; ?>"
         gb-source-pk-id="<?php echo $mentorship->id; ?>" gb-data-source="<?php echo Type::$SOURCE_MENTORSHIP; ?>">

      <div class="row ">
        <div class="col-lg-2 col-sm-2 col-xs-2">
          <img href="/profile" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorshipRequest->recipient->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
        </div>
        <div class="panel panel-default col-lg-10 col-sm-10 col-xs-10 gb-mentorship-top-border gb-no-padding">
          <div class='panel-heading'>
            <h5> 
              <?php echo Notification::getRequestTypeName($mentorshipRequest->type); ?> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorshipRequest->recipient_id)); ?>"><?php echo $mentorshipRequest->recipient->profile->firstname . " " . $mentorshipRequest->recipient->profile->lastname ?></a>
            </h5>
          </div>
          <div class="panel-body skill-commitment-title">
            <?php if ($status): ?>
              <p class="text-warning"><i>The link to the mentorship page will be available 
                  after the request has been accepted.</i></p>
            <?php else: ?>
               <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorshipRequest->source_id)); ?>" class="btn btn-xs btn-link">Access Mentorship Page</a>
              
            <?php endif; ?>
          </div>
          <div class="panel-footer gb-no-padding">
            <?php if ($mentorship->owner->id == Yii::app()->user->id): ?>
              <div class="row">
                <?php if ($status): ?>
                  <div class="pull-left">
                    <h5 class="gb-padding-medium text-warning">Pending Request</h5>
                  </div>
                  <div class="pull-right">
                    <a class="btn btn-link gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                  </div>
                <?php else: ?>
                  <div class="pull-left">
                    <h5 class="gb-padding-medium pull-left text-success">Accepted Request</h5>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorshipRequest->source_id)); ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
                  </div>
                <?php endif; ?>
              </div>
            <?php else: ?>
              <div class="row">
                <div class="pull-right">
                  <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorshipRequest->source_id)); ?>" class="btn btn-xs btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>        