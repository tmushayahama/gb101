<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-link gb-box row"
     gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipChild", array('mentorshipId' => $mentorshipChild->id)); ?>">
 <div class="gb-container">
  <div class="row gb-heading">
   <div class="col-lg-12 gb-no-padding">
    <p class=" gb-ellipsis gb-title">
     <strong><?php echo "A mentorship main Skill"; ?></strong>
    </p>
   </div>
  </div>
  <div class="row gb-body">
   <p class="gb-description">
    Created by
    <a>
     <?php echo $mentorshipChild->creator->profile->firstname . " " . $mentorshipChild->creator->profile->lastname; ?>
    </a>.
    <a>
     <?php echo $mentorshipChild->mentor->profile->firstname . " " . $mentorshipChild->mentor->profile->lastname; ?>
    </a>
    is mentoring
    <a>
     <?php echo $mentorshipChild->mentee->profile->firstname . " " . $mentorshipChild->mentee->profile->lastname; ?>
    </a>
   </p>
  </div>
 </div>
</div>