<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 <div class="gb-link gb-box-4 row"
      data-gb-link-type="redirects"
      data-gb-url="<?php echo Yii::app()->createUrl("user/profile/profile", array('userId' => $person->user_id)); ?>">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
   <p class="gb-ellipsis gb-title">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $person->avatar_url; ?>" class="gb-profile-icon" alt="">
    <?php echo $person->firstname . " " . $person->lastname; ?></a>
   </p>
   <div class="gb-description">
   </div>
  </div>
 </div>
</div>