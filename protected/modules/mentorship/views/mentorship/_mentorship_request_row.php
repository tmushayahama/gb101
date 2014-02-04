<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-commitment-post">
  <span class='gb-top-heading gb-heading-left'>Mentorship Request</span>
  <div class="gb-post-title ">
    <span class="span1">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
    </span>
    <span class="span9">
      <a><h5><?php echo $mentorshipRequest->requester->profile->firstname . " " . $mentorshipRequest->requester->profile->lastname ?></h5></a>
    </span>
    <span class="span2">

    </span> 
  </div>
  <div class="gb-post-content row">
    <span class="span12">
      <h4 class="skill-commitment-title"><a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorshipRequest->id)); ?>"><?php echo $mentorshipRequest->goal->title; ?></a>   
        <small> <?php echo $mentorshipRequest->message ?></small>
      </h4>
    </span>
  </div>
  <div class="gb-footer">
    <?php if ($mentorshipRequest->requester->id == Yii::app()->user->id): ?>
      <a class="gb-btn">Promote</a>
      <a class="gb-btn">Share</a>
      <div class="pull-right">
        <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorshipRequest->id)); ?>" class="gb-btn"><strong>More Details</strong></a>
        <a class="gb-btn"><i class="icon-edit"></i></a>
        <a class="gb-btn"><i class="icon-trash"></i></a>
      </div>
    <?php else: ?>
     <a class="gb-btn">Share</a>
      <div class="pull-right">
        <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipEnroll', array('mentorshipId' => $mentorshipRequest->id)); ?>" class="gb-btn"><strong>Mentor</strong></a>
        <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorshipRequest->id)); ?>" class="gb-btn"><strong>More Details</strong></a>
      </div>
    <?php endif; ?>

  </div>
</div>