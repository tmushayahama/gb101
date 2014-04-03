<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-commitment-post" mentorship-id="<?php echo $mentorship->id; ?>">
  <div class="row ">
    <div class="col-lg-2 col-sm-2 col-xs-2">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default col-lg-10 col-sm-10 col-xs-10 gb-mentorship-top-border gb-no-padding">
      <div class='panel-heading'><h4><a><i>Mentorship</i></a> - <a><?php echo $mentorship->owner->profile->firstname . " " . $mentorship->owner->profile->lastname ?></a></h4></div>
      <div class="panel-body skill-commitment-title"><a class="mentorship-title" href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorship->id)); ?>"><?php echo $mentorship->title; ?></a>   
        <small class="gb-grey-text"> <?php echo $mentorship->description ?></small>
      </div>
      <div class="panel-footer">
        <?php if (!Yii::app()->user->isGuest): ?>
          <?php if ($mentorship->owner->id == Yii::app()->user->id): ?>
            <a class="btn btn-default">Activities: <div class="badge badge-info">0</div></a>
            <a class="btn btn-default">Share</a>
            <div class="pull-right">
              <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorship->id)); ?>" class="gb-btn"><strong>More Details</strong></a>
              <a class="gb-btn"><i class="icon-edit"></i></a>
              <a class="gb-btn"><i class="icon-trash"></i></a>
            </div>
          <?php else: ?>
            <a class="btn btn-default">Activities: <div class="badge badge-info">0</div></a>
            <a class="btn btn-default">Share</a>
            <div class="pull-right">
              <?php
              $mentorshipStatus = MentorshipEnrolled::getEnrollStatus($mentorship->id);
              $mentorshipText = "Enroll Request";
              switch ($mentorshipStatus):
                case MentorshipEnrolled::$PENDING_REQUEST:
                  $mentorshipText = "Pending Request";
                  break;
              endswitch;
              ?>
              <a class="gb-mentorship-enroll-request-modal-trigger btn btn-default" status="<?php echo $mentorshipStatus; ?>"><strong><?php echo $mentorshipText ?></strong></a>
              <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorship->id)); ?>" class="btn btn-default hidden-xs"><strong>More Details</strong></a>
            </div>
          <?php endif; ?>
        <?php else: ?>
          <a class="btn btn-default">Activities: <div class="badge badge-info">0</div></a>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>