<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
 <div class="row">
  <div class="row gb-panel-form gb-hide">
  </div>
  <h5 class="gb-heading-6 col-lg-12 col-sm-12 col-xs-12">
   <div class="col-lg-11 col-sm-11 col-xs-11 gb-no-padding">
    <p class="gb-ellipsis">Contributors</p>
   </div>
   <div class="col-lg-1 col-sm-1 col-xs-1 gb-no-padding">
    <i class="pull-right"><?php echo $skillContributorsCount; ?></i>
   </div>
  </h5>
  <input class="gb-form-show gb-backdrop-disappear form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12"
         type="text"
         data-gb-target-container="#gb-contributor-form-container"
         data-gb-target="#gb-contributor-form"
         readonly
         placeholder="Write a Contributor"
         />
 </div>

 <div id="gb-contributor-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('contributor.views.contributor.forms._contributor_form', array(
     "formId" => "gb-contributor-form",
     "actionUrl" => Yii::app()->createUrl("skill/skill/addSkillContributor", array("skillId" => $skillId)),
     "prependTo" => "#gb-skill-contributors",
     'contributorModel' => $contributorModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-skill-contributors">
  <?php
  $this->renderPartial('skill.views.skill.activity.contributor._skill_contributors', array(
    "skillContributors" => $skillContributors,
    "skillContributorsCount" => $skillContributorsCount,
    "skillId" => $skillId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

