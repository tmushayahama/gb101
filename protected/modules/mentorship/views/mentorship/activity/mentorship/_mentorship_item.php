<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-box col-lg-3 col-md-3 col-sm-4 col-xs-12">
 <div class="gb-link que-project-entry"
      gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('mentorshipId' => $mentorship->id)); ?>">
  <div class="row gb-heading">
   <div class="col-lg-12 gb-no-padding">
    <p class=" gb-ellipsis gb-title">
     <strong><?php echo $mentorship->title; ?></strong>
    </p>
    <p class="gb-description gb-ellipsis">
     <?php
     if ($mentorship->description) {
      echo $mentorship->description;
     } else {
      echo "<i>no description</i>";
     }
     ?>
    </p>
   </div>
  </div>
  <div class="gb-heading-img-container row">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/mentorships/" . $mentorship->mentorship_picture_url; ?>" class="gb-heading-img" alt="">
  </div>
  <div class="caption">
   <div class="row gb-body">
    <p class="gb-ellipsis gb-description"><i><?php echo $mentorship->level->name; ?></i></p>
   </div>
  </div>
 </div>
</div>