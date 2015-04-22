<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
 <div class="row">
  <input class="gb-form-show gb-backdrop-disappear form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12"
         type="text"
         data-gb-target-container="#gb-weblink-form-container"
         data-gb-target="#gb-weblink-form"
         readonly
         placeholder="Write a Weblink"
         />
 </div>

 <div id="gb-weblink-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('weblink.views.weblink.forms._weblink_form', array(
     "formId" => "gb-weblink-form",
     "actionUrl" => Yii::app()->createUrl("skill/skill/addSkillWeblink", array("skillId" => $skillId)),
     "prependTo" => "#gb-skill-weblinks",
     'weblinkModel' => $weblinkModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-skill-weblinks">
  <?php
  $this->renderPartial('skill.views.skill.activity.weblink._skill_weblinks', array(
    "skillWeblinks" => $skillWeblinks,
    "skillWeblinksCount" => $skillWeblinksCount,
    "skillId" => $skillId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

