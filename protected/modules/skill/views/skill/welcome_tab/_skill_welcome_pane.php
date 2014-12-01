<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-nav-parent gb-left-nav-2 col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-no-padding">
 <div id="gb-skills-nav" class="row gb-no-padding panel-group" role="tablist" aria-multiselectable="true">
  <div class="panel">
   <div class="row" role="tab">
    <a class="active collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
       data-toggle="collapse"
       gb-data-toggle='gb-expandable-tab'
       data-parent="#gb-skills-nav" href="#gb-collapse-skill-welcome"
       aria-expanded="false" aria-controls="gb-collapse-skill-welcome"
       gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillWelcome", array()); ?>">
     <i class="glyphicon glyphicon-pause pull-left"></i>
     <div class="col-lg-9 gb-padding-left-1">
      <p class="gb-ellipsis">Overview</p>
     </div>
     <i class="glyphicon glyphicon-chevron-right pull-right"></i>
    </a>
   </div>
   <div id="gb-collapse-skill-welcome" class="row panel-collapse collapse" role="tabpanel" >
   </div>
  </div>
  <h5 class="gb-heading-3">SKILLS
   <span class="pull-right badge gb-badge-sm"><?php echo $skillsCount; ?></span>
  </h5>
  <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
       gb-is-child-form="0"
       gb-form-target="#gb-skill-form"
       gb-add-url="<?php echo Yii::app()->createUrl("skill/skill/addSkill", array()); ?>"
       gb-form-description-input="#gb-skill-form-description-input">
   <textarea class="form-control"
             placeholder="Add a Skill"
             rows="1"></textarea>
   <div class="input-group-btn">
    <div class="input-group-btn">
     <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus-sign"></i></button>
    </div><!-- /btn-group -->
   </div>
  </div>
  <br>
  <div id="gb-skills" class="row">

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
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 gb-no-padding gb-middle-container-2">
 <div class="tab-content">
  <!---------- SKILL MANAGEMENT WELCOME OVERVIEW PANE ------------>
  <div class="tab-pane active" id="gb-skill-item-pane">
   <div class="row gb-tab-pane-body">
    <?php
    $this->renderPartial('skill.views.skill.welcome_tab._skill_overview_pane', array(
      "skills" => $skills,
      "skillsCount" => $skillsCount,
    ));
    ?>
   </div>
  </div>
 </div>
</div>


