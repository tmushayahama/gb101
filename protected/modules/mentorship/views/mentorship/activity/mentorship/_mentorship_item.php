<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
 <div class="gb-link gb-box-2"
      data-gb-link-type="redirects"
      data-gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorship", array('mentorshipId' => $mentorship->id)); ?>">
  <div class="gb-heading-img-container row">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/mentorships/" . $mentorship->mentorship_picture_url; ?>" class="gb-heading-img" alt="">
  </div>
  <div class="row gb-body">
   <div class="col-lg-12 ">
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
    <p class="gb-ellipsis gb-description"><i><?php echo $mentorship->level->name; ?></i></p>
   </div>
  </div>
  <div class="row gb-footer">
   <p class="gb-ellipsis gb-description"><i><?php echo $mentorship->created_date; ?></i></p>
  </div>
 </div>
</div>