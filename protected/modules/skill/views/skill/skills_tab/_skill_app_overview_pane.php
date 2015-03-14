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
   <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
    <div class="gb-nav-heading-1 col-lg-9 col-sm-2 col-xs-12">
     <a>
      <p class="gb-title gb-ellipsis">SKILL APP</p>
     </a>
    </div>
    <div class="col-lg-3 col-sm-2 gb-padding-thin">
     <div class="row">
      <a class="btn btn-primary gb-form-show gb-backdrop-visible col-lg-12 col-md-12 col-sm-6 col-xs-6"
         data-gb-target-container="#gb-skill-form-container"
         data-gb-target="#gb-skill-form"
         data-gb-url = "<?php echo Yii::app()->createUrl('skill/skill/addskill', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
         data-gb-prepend-to="#gb-skills">
       <i class="glyphicon glyphicon-plus"></i> Add
      </a>
     </div>
    </div>
   </ul>
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
  <div class="row">
   <div class="input-group gb-padding-thin">
    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
    <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search skills. e.g. awesome, John Doe, dentist">
    <div class="input-group-btn">
     <button id="gb-keyword-search-btn" class="btn btn-default form-control gb-form-show gb-backdrop-visible"
             data-gb-target-container="#gb-skill-search-form-container"
             data-gb-target="#gb-skill-search-form"
             data-gb-url = "<?php echo Yii::app()->createUrl('skill/skill/searchSkill', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
             data-gb-prepend-to="#gb-skills">
      <span class="caret"></span>
     </button>
    </div>
   </div>
  </div>
  <div id="gb-skill-search-form-container" class="row gb-hide gb-panel-form">
   <?php
   $this->renderPartial('skill.views.skill.forms._skill_search_form', array(
     "formId" => "gb-skill-search-form",
     "actionUrl" => Yii::app()->createUrl("skill/skill/searchSkill", array()),
     "prependTo" => "#gb-skills",
     "skillLevelList" => $skillLevelList,
     'skillModel' => new Skill(),
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_REPLACE
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
