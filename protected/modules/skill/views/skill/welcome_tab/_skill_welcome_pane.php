<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-nav-parent gb-left-nav-2 col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-no-padding">
 <div id="gb-skills-nav" class="row gb-no-padding panel-group" role="tablist" aria-multiselectable="true">
  <div class="panel gb-no-margin">
   <div class="row" role="tab">
    <a class="gb-sidenav-app-heading active collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
       data-toggle="collapse"
       gb-data-toggle='gb-expandable-tab'
       data-parent="#gb-skills-nav" href="#gb-collapse-skill-welcome"
       aria-expanded="false" aria-controls="gb-collapse-skill-welcome"
       gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillsWelcome", array()); ?>">
     <div class="col-lg-12 gb-no-padding text-left">
      <p class="gb-heading gb-heading-7 gb-ellipsis">Skills App</p>
      <p class="gb-description">
       Explore your skills and discover other skills. Find out what others are doing with their
       skills. Monitor someone, get monitored, make a template, etc
      </p>
     </div>
    </a>
   </div>
   <div id="gb-collapse-skill-welcome" class="row panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
   </div>
  </div>
  <br>
  <h5 class="gb-heading-3">SKILLS
   <span class="pull-right gb-badge-sm"><?php echo $skillsCount; ?></span>
  </h5>
  <div class="row">
   <a class="btn btn-default btn-lg gb-form-show gb-backdrop-visible col-lg-12 col-md-12 col-sm-12 col-xs-12"
      data-gb-target-container="#gb-skill-form-container"
      data-gb-target="#gb-skill-form"
      data-gb-url = "<?php echo Yii::app()->createUrl('skill/skill/addskill', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
      data-gb-prepend-to="#gb-skills">
    <i class="glyphicon glyphicon-plus-sign"></i> Add a Skill
   </a>
  </div>
  <div id="gb-skill-form-container" class="row gb-hide gb-panel-form">
   <?php
   $this->renderPartial('skill.views.skill.forms._skill_form', array(
     "formId" => "gb-skill-form",
     "actionUrl" => Yii::app()->createUrl("skill/skill/addSkill", array()),
     "prependTo" => "#gb-skills",
     'skillModel' => $skillModel,
     'skillLevelList' => $skillLevelList,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
  <div id="gb-skills" class="gb-side-nav-scrollable">

   <?php foreach ($skills as $skill): ?>
    <?php
    $this->renderPartial('skill.views.skill.activity.skill._skill_item', array(
      "skill" => $skill,
    ));
    ?>
   <?php endforeach; ?>
  </div>
 </div>
</div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 gb-middle-container-2">
 <div class="tab-content">
  <!---------- SKILL MANAGEMENT WELCOME OVERVIEW PANE ------------>
  <div class="tab-pane active" id="gb-skill-item-pane">
   <div class="row gb-tab-pane-body">
    <?php
    $this->renderPartial('skill.views.skill.welcome_tab._skill_overview_pane', array(
      "skills" => $skills,
      "skillsCount" => $skillsCount,
      "skillsGained" => $skillsGained,
      "skillsToImprove" => $skillsToImprove,
      "skillsToLearn" => $skillsToLearn,
      "skillsGainedCount" => $skillsGainedCount,
      "skillsToImproveCount" => $skillsToImproveCount,
      "skillsToLearnCount" => $skillsToLearnCount,
    ));
    ?>
   </div>
  </div>
 </div>
</div>


