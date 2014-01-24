<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-commitment-post">
  <span class='gb-top-heading gb-heading-left'>Mentorship</span>
  <div class="gb-post-title ">
    <span class="span1">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
    </span>
    <span class="span9">
      <a><h5><?php echo $mentorship->owner->profile->firstname . " " . $mentorship->owner->profile->lastname ?></h5></a>
    </span>
    <span class="span2">

    </span> 
  </div>
  <div class="gb-post-content row">
    <span class="span12">
      <h4 class="skill-commitment-title"><a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorship->id)); ?>"><?php echo $mentorship->title; ?></a>   
        <small> <?php echo $mentorship->description ?></small>
      </h4>
    </span>
  </div>
  <div class="gb-footer">
    <?php if ($mentorship->owner->id == Yii::app()->user->id): ?>
      <a class="gb-btn">Activities: <div class="badge badge-info">0</div></a>
      <a class="gb-btn">Share</a>
      <div class="pull-right">
        <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorship->id)); ?>" class="gb-btn"><strong>More Details</strong></a>
        <a class="gb-btn"><i class="icon-edit"></i></a>
        <a class="gb-btn"><i class="icon-trash"></i></a>
      </div>
    <?php else: ?>
       <a class="gb-btn">Activities: <div class="badge badge-info">0</div></a>
      <a class="gb-btn">Share</a>
      <div class="pull-right">
        <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipEnroll', array('mentorshipId' => $mentorship->id)); ?>" class="gb-btn"><strong>Enroll</strong></a>
        <a href="<?php echo Yii::app()->createUrl('mentorship/mentorship/mentorshipDetail', array('mentorshipId' => $mentorship->id)); ?>" class="gb-btn"><strong>More Details</strong></a>
      </div>
    <?php endif; ?>

  </div>
</div>