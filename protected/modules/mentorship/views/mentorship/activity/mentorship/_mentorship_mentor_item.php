<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-link gb-box-2 row"
     data-gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipChild", array('mentorshipId' => $mentorshipChild->id)); ?>"
     data-gb-target-pane-id="#gb-mentorship-item-pane">
 <div class="gb-container">
  <div class="row gb-heading">
   <div class="col-lg-12 gb-no-padding">
    <p class=" gb-ellipsis gb-title">
     <strong><?php echo "A mentorship main Skill"; ?></strong>
    </p>
   </div>
  </div>
  <div class="row gb-body">
   <p class="gb-description gb-ellipsis">
    Created by
    <a>
     <?php echo $mentorshipChild->creator->profile->firstname . " " . $mentorshipChild->creator->profile->lastname; ?>
    </a>
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