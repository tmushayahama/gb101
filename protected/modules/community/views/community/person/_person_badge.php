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
<div class="col-lg-3 col-md-3">
 <div class="gb-link gb-box-3 row"
      gb-data-toggle='gb-expandable-tab'
      gb-url="<?php echo Yii::app()->createUrl("community/communityTab/profile", array('userId' => $person->user_id)); ?>">
  <div class="gb-container row">
   <div class="col-lg-2 gb-no-padding">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $person->avatar_url; ?>" class="gb-heading-img" alt="">
   </div>
   <div class="col-lg-10 gb-padding-left-1 text-left">
    <p class="gb-ellipsis gb-title">
     <a>
      <?php echo $person->firstname . " " . $person->lastname; ?></a>
     </a>
    </p>
    <p class="gb-ellipsis gb-title"></p>
    <p class="gb-ellipsis gb-description">
    </p>
   </div>
  </div>
 </div>
</div>