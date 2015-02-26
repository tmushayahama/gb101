<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="nav-container col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-no-padding">
 <div id="gb-middle-nav-3" class="gb-nav-parent">
  <div class="row">
   <a class="btn btn-default btn-lg gb-form-show gb-backdrop-visible col-lg-5 col-md-5 col-sm-6 col-xs-6"
      data-gb-target-container="#gb-search-skill-form-container"
      data-gb-target="#gb-search-skill-form"
      data-gb-url = "<?php echo Yii::app()->createUrl('skill/skill/addskill', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
      data-gb-prepend-to="#gb-skills">
    <i class="glyphicon glyphicon-search"></i> Browse
   </a>
   <a class="btn btn-primary btn-lg gb-form-show gb-backdrop-visible col-lg-7 col-md-7 col-sm-6 col-xs-6"
      data-gb-target-container="#gb-skill-form-container"
      data-gb-target="#gb-skill-form"
      data-gb-url = "<?php echo Yii::app()->createUrl('skill/skill/addskill', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
      data-gb-prepend-to="#gb-skills">
    <i class="glyphicon glyphicon-plus-sign"></i> Add a Skill
   </a>
  </div>
  <br>
  <div id="gb-skill-form-container" class="row gb-hide gb-panel-form">
   <?php
   $this->renderPartial('skill.views.skill.forms._skill_form', array(
     "formId" => "gb-skill-form",
     "actionUrl" => Yii::app()->createUrl("skill/skill/addSkill", array()),
     "prependTo" => "#gb-skills",
     "skillLevelList" => $skillLevelList,
     'skillModel' => new Skill(),
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>

  <div id="gb-skills" class="gb-list">
   <?php
   $this->renderPartial('skill.views.skill.activity.skill._skill_list', array(
     "skills" => $skills,
     "skillsCount" => $skillsCount,
     "level" => 0,
     "offset" => 1,
   ));
   ?>
  </div>
  <div class="gb-dummy-height"></div>
 </div>
</div>
<div class="nav-container col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-no-padding">
 <div id="gb-right-nav-3" class="">
  <div class="tab-content">
   <!---------- SKILL MANAGEMENT WELCOME OVERVIEW PANE ------------>
   <div class="tab-pane active" id="gb-skill-item-pane">
    <br>
    <h4 class="text-center text-warning gb-no-information row">
     select a skill to show
    </h4>
   </div>
  </div>
  <div class="gb-dummy-height"></div>
 </div>
</div>
