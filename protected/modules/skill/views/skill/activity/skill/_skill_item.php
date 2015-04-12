<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-link gb-box-3 row"
     gb-data-toggle='gb-expandable-tab'
     data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skill", array('skillId' => $skill->id)); ?>"
     data-gb-target-pane-id="#gb-skill-item-pane">
 <div class="gb-container row">
  <div class="col-lg-2 gb-no-padding">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skill->creator->profile->avatar_url; ?>" class="gb-heading-img" alt="">
  </div>
  <div class="col-lg-9 gb-padding-left-1 text-left">
   <p class="gb-ellipsis gb-title">
    <a>
     <?php
     echo $skill->creator->profile->firstname . " " . $skill->creator->profile->lastname
     ?>
    </a>
   </p>
   <p class="gb-ellipsis gb-title"><?php echo $skill->title; ?></p>
   <p class="gb-ellipsis gb-description">
    <?php
    if ($skill->description) {
     echo $skill->description;
    } else {
     echo "<i>no description</i>";
    }
    ?>
   </p>
  </div>
  <i class="gb-icon-nav-arrow glyphicon glyphicon-chevron-right pull-right"></i>
 </div>
</div>