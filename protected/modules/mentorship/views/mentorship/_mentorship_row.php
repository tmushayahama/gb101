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
      <div class='panel-heading'><h5><a><i>Mentorship</i></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentorship->owner_id)); ?>"><?php echo $mentorship->owner->profile->firstname . " " . $mentorship->owner->profile->lastname ?></a></h5></div>
      <div class="panel-body skill-commitment-title">
        <p><a class="mentorship-title" href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorship->id)); ?>"><?php echo $mentorship->title; ?></a>   
          <?php echo $mentorship->description ?>
        </p>
      </div>
      <div class="panel-footer">
        <div class="row">
          <?php if (!Yii::app()->user->isGuest): ?>
            <?php if ($mentorship->owner->id == Yii::app()->user->id): ?>
             <div class="pull-right">
                <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorship->id)); ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
              </div>
            <?php else: ?>
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
                <a class="gb-mentorship-enroll-request-modal-trigger btn btn-link" status="<?php echo $mentorshipStatus; ?>"><?php echo $mentorshipText ?></a>
                <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorship->id)); ?>" class="btn btn-link"><i class="glyphicon glyphicon-arrow-right"></i></a>
              </div>
            <?php endif; ?>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>