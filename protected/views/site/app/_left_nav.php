<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-left-nav-3" class="gb-nav-parent col-lg-2 col-md-5 col-sm-12 col-xs-12 ">
 <div id="gb-skills-nav" class="row  panel-group" role="tablist" aria-multiselectable="true">
  <div class="row">
   <a class="gb-sidenav-app-heading active collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
      gb-data-toggle='gb-expandable-tab'
      gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillAppOverview", array()); ?>">
    <div class="col-lg-12  text-left">
     <p class="gb-heading gb-heading-7b gb-ellipsis">SKILLS APP</p>
     <p class="gb-description">
      Explore your skills and discover other skills.
     </p>
    </div>
   </a>
  </div>
  <br>
  <h5 class="gb-heading-2 gb-ellipsis">
   SKILL CATEGORIES
  </h5>
  <?php
  $count = 1;
  foreach ($skillLevels as $level):
   $this->renderPartial('skill.views.skill.activity.skill._skill_item_level_row', array(
     "level" => $level,
     "count" => $count
   ));
   ?>
  <?php endforeach; ?>
 </div>
 <div class="gb-dummy-height"></div>
</div>

