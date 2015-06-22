<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-link gb-box-3 row"
     data-gb-replace-when='sm'
     data-gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipChild", array('mentorshipId' => $mentorshipChild->id)); ?>"
     data-gb-target-pane-id="#gb-mentorship-item-pane">
 <div class="gb-container">
  <div class="row gb-heading">
   <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorshipChild->mentor->profile->avatar_url; ?>" class="gb-heading-img pull-left" alt="">
   </div>
   <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
    <i class="gb-arrow fa-2x fa fa-play"></i>
   </div>
   <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorshipChild->mentee->profile->avatar_url; ?>" class="gb-heading-img pull-right" alt="">
   </div>
  </div>
  <div class="row gb-body">
   <p class=" gb-ellipsis gb-title">
    <strong><?php echo "A mentorship main Skill"; ?></strong>
   </p>
   <p class="gb-description gb-ellipsis">
    Mentor:
    <a>
     <?php echo $mentorshipChild->mentor->profile->firstname . " " . $mentorshipChild->mentor->profile->lastname; ?>
    </a>
   </p>
   <p class="gb-description gb-ellipsis">
    Is Mentoring
    <a>
     <?php echo $mentorshipChild->mentee->profile->firstname . " " . $mentorshipChild->mentee->profile->lastname; ?>
    </a>
   </p>
  </div>
 </div>
</div>