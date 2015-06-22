<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-link gb-box-7 row"
     gb-data-toggle='gb-expandable-tab'
     data-gb-replace-sm=true
     data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skill", array('skillId' => $skill->id)); ?>"
     data-gb-target-pane-id="#gb-skill-item-pane">
 <div class="gb-indicator <?php echo 'gb-level-' . $skill->level->code; ?>"></div>
 <div class="gb-container row">
  <div class="col-lg-2 col-md-2 col-sm-1 col-xs-2 gb-padding-none">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skill->creator->profile->avatar_url; ?>" alt="">
  </div>
  <div class="col-lg-9 col-md-9 col-sm-10 col-xs-9 gb-padding-left-1 text-left">
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