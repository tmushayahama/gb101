<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-link gb-box-7 row">
 <div class="gb-indicator <?php echo 'gb-level-' . $skill->level->code; ?>"></div>
 <div class="gb-container row">
  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 ">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skill->creator->profile->avatar_url; ?>" class='pull-right gb-heading-img' alt="">
  </div>
  <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 text-left">
   <p class="gb-ellipsis gb-title">
    <a class="gb-link"
       data-gb-link-type="redirects"
       data-gb-url="<?php echo Yii::app()->createUrl("user/profile/profile/", array('userId' => $skill->creator->profile->user_id)); ?>">
        <?php
        echo $skill->creator->profile->firstname . " " . $skill->creator->profile->lastname
        ?>
    </a>
   </p>
   <p class="gb-description">
    <a class="gb-link"
       data-gb-link-type="redirects"
       data-gb-url="<?php echo Yii::app()->createUrl("skill/skill/skill", array('skillId' => $skill->id)); ?>">
        <?php echo $skill->title; ?>
    </a>
    <?php
    echo $skill->description;
    ?>
   </p>
   <a class="gb-level">
    <small>
     <i>
      <?php echo $skill->level->name; ?>
     </i>
    </small>
   </a>
  </div>
 </div>
</div>