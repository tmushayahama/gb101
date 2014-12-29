<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-box col-lg-4 col-md-4 col-sm-4 col-xs-12">
 <div class="gb-container gb-link"
      gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('mentorshipId' => $mentorship->id)); ?>">
  <div class="row gb-heading">
   <div class="col-lg-2 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/mentorships/" . $mentorship->mentorship_picture_url; ?>" class="gb-heading-img img-circle pull-left" alt="">
   </div>
   <div class="col-lg-10 gb-no-padding">
    <p class=" gb-ellipsis gb-title">
     <strong><?php echo $mentorship->title; ?></strong>
    </p>
   </div>
  </div>
  <div class="row gb-body">
   <p class="gb-description">
    <?php
    if ($mentorship->description) {
     echo $mentorship->description;
    } else {
     echo "<i>no description</i>";
    }
    ?>
   </p>
  </div>
  <div class="row gb-footer">
   <p class="gb-ellipsis gb-description"><i><?php echo $mentorship->level->name; ?></i></p>
  </div>
 </div>
</div>