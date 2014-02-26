<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-person-badge-small row-fluid" mentee-id="<?php echo $mentee->mentee_id; ?>">
  <span class="span2">
    <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/gb_avatar.jpg" class="gb-post-img img-polariod" alt="">
  </span>
  <span class="span10">
    <a><h5><?php echo $mentee->mentee->profile->firstname . " " . $mentee->mentee->profile->lastname ?></h5></a>
  </span>
</div>