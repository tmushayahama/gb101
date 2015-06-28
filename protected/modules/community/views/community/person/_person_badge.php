<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
 <div class="gb-link gb-box-4 row"
      gb-data-toggle='gb-expandable-tab'
      data-gb-url="<?php echo Yii::app()->createUrl("user/profileTab/profileFriend", array('userId' => $person->user_id)); ?>"
      data-gb-target-pane-id="#gb-main-tab-pane">
  <div class="gb-heading-img-container col-lg-3 col-md-3 col-sm-3 col-xs-3 gb-padding-none">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $person->avatar_url; ?>" class="gb-heading-img" alt="">
  </div>
  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <p class="gb-ellipsis gb-title">
    <a>
     <?php echo $person->firstname . " " . $person->lastname; ?></a>
    </a>
   </p>
   <p class="gb-ellipsis gb-description">
   </p>
  </div>
 </div>
</div>