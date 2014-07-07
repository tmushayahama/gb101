<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-person-badge-small row" mentee-id="<?php echo $mentee->mentee_id; ?>">
  <div class="col-lg-2 col-sm-2 col-xs-2 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl."/img/profile_pic/".$mentee->mentee->profile->avatar_url; ?>" class="img-polariod" alt="">
  </div>
  <span class="col-lg-10 col-sm-10 col-xs-10">
    <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $mentee->mentee_id)); ?>"><h5><?php echo $mentee->mentee->profile->firstname . " " . $mentee->mentee->profile->lastname ?></h5></a>
  </span>
</div>