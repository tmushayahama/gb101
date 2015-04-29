<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="col-lg-6 col-sm-5 col-xs-11 gb-no-padding">
 <div class="row">
  <div class="col-lg-2 gb-no-padding">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorship->mentor->profile->avatar_url; ?>" class="gb-heading-img pull-left" alt="">
  </div>
  <div class="col-lg-10 gb-no-padding">
   <p class="gb-ellipsis">
    <strong>Mentor</strong>
   </p>
   <p class="gb-ellipsis">
    <a><?php echo $mentorship->mentor->profile->firstname . " " . $mentorship->mentor->profile->lastname; ?></a>
   </p>
  </div>
 </div>
</div>
<div class="col-lg-6 col-sm-5 col-xs-11 gb-no-padding">
 <div class="row">
  <div class="col-lg-2 gb-no-padding">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $mentorship->mentee->profile->avatar_url; ?>" class="gb-heading-img pull-left" alt="">
  </div>
  <div class="col-lg-10 gb-no-padding">
   <p class="gb-ellipsis">
    <strong>Mentee</strong>
   </p>
   <p class="gb-ellipsis">
    <a><?php echo $mentorship->mentee->profile->firstname . " " . $mentorship->mentee->profile->lastname; ?></a>
   </p>
  </div>
 </div>
</div>
