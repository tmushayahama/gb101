<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-commitment-post">
  <div class="row">
    <div class="col-lg-2 col-sm-2 col-xs-2">
      <img src="<?php echo Yii::app()->request->baseUrl."/img/profile_pic/".$mentorshipRequest->from->profile->avatar_url; ?>" class="gb-post-img img-polariod" alt="">
    </div>
    <div class="panel panel-default gb-no-padding gb-mentorship-request-top-border col-lg-10 col-sm-10 col-xs-10">
      <div class="panel-heading">
        <h5><a>Mentorship Requests</a> - <a><?php echo $mentorshipRequest->from->profile->firstname . " " . $mentorshipRequest->from->profile->lastname ?></a></h5>
      </div>
      <div class="gb-post-content panel-body row">
        <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
          <p class=""><a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorshipRequest->id)); ?>"><?php //echo $mentorshipRequest->notification_id;      ?></a>   
            <?php echo $mentorshipRequest->message ?>
          </p>
        </div>
      </div>
      <div class="panel-footer">
        <?php if ($mentorshipRequest->from_id == Yii::app()->user->id): ?>
          <a class="btn btn-link">Promote</a>
          <a class="btn btn-link">Share</a>
          <div class="btn-group pull-right">
            <a class="btn btn-link"><i class="glyphicon glyphicon-edit"></i></a>
            <a class="btn btn-link"><i class="glyphicon glyphicon-trash"></i></a>
            <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorshipRequest->id)); ?>" class="btn btn-link">More Details</a>
          </div>
        <?php else: ?>
          <a class="btn btn-link">Share</a>
          <div class="btn-group pull-right">
            <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipEnroll', array('mentorshipId' => $mentorshipRequest->id)); ?>" class="btn btn-link"><strong>Mentor</strong></a>
            <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorshipRequest->id)); ?>" class="btn btn-link"><strong>More Details</strong></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>