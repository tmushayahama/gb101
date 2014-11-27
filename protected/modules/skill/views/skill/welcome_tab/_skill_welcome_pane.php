<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-nav-parent gb-left-nav-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
 <div id="gb-activities-nav" class="row gb-no-padding panel-group" role="tablist" aria-multiselectable="true">
  <div class="panel">
   <div class="row" role="tab">
    <a class="active collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
       data-toggle="collapse"
       gb-data-toggle='gb-expandable-tab'
       data-parent="#gb-activities-nav" href="#gb-skill-welcome-overview-pane"
       aria-expanded="false" aria-controls="gb-skill-welcome-overview-pane"
       gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillOverview", array('skillId' => $skill->id)); ?>">
     <i class="glyphicon glyphicon-pause pull-left"></i>
     <div class="col-lg-9 gb-padding-left-1">
      <p class="gb-ellipsis">Overview</p>
     </div>
     <i class="glyphicon glyphicon-chevron-right pull-right"></i>
    </a>
   </div>
   <div id="gb-collapse-skill-welcome" class="row panel-collapse collapse" role="tabpanel">
   </div>
  </div>

  <div class="panel">
   <div class="row" role="tab">
    <a class="collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
       data-toggle="collapse"
       gb-data-toggle='gb-expandable-tab'
       data-parent="#gb-activities-nav" href="#gb-skill-welcome-comments-pane"
       aria-expanded="false" aria-controls="gb-skill-welcome-comments-pane"
       gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillComments", array('skillId' => $skill->id)); ?>">
     <i class="glyphicon glyphicon-pause pull-left"></i>
     <div class="col-lg-9 gb-padding-left-1">
      <p class="gb-ellipsis">Comments</p>
     </div>
     <i class="glyphicon glyphicon-chevron-right pull-right"></i>
    </a>
   </div>
   <div id="gb-collapse-skill-welcome" class="row panel-collapse collapse" role="tabpanel">
   </div>
  </div>

  <div class="panel">
   <div class="row" role="tab">
    <a class="collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
       data-toggle="collapse"
       gb-data-toggle='gb-expandable-tab'
       data-parent="#gb-activities-nav" href="#gb-skill-welcome-todos-pane"
       aria-expanded="false" aria-controls="gb-skill-welcome-todos-pane"
       gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillTodos", array('skillId' => $skill->id)); ?>">
     <i class="glyphicon glyphicon-pause pull-left"></i>
     <div class="col-lg-9 gb-padding-left-1">
      <p class="gb-ellipsis">Skill To-dos</p>
     </div>
     <i class="glyphicon glyphicon-chevron-right pull-right"></i>
    </a>
   </div>
   <div id="gb-collapse-skill-welcome" class="row panel-collapse collapse" role="tabpanel">
   </div>
  </div>

  <div class="panel">
   <div class="row" role="tab">
    <a class="collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
       data-toggle="collapse"
       gb-data-toggle='gb-expandable-tab'
       data-parent="#gb-activities-nav" href="#gb-skill-welcome-discussions-pane"
       aria-expanded="false" aria-controls="gb-skill-welcome-discussions-pane"
       gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillDiscussions", array('skillId' => $skill->id)); ?>">
     <i class="glyphicon glyphicon-pause pull-left"></i>
     <div class="col-lg-9 gb-padding-left-1">
      <p class="gb-ellipsis">Skill Discussion</p>
     </div>
     <i class="glyphicon glyphicon-chevron-right pull-right"></i>
    </a>
   </div>
   <div id="gb-collapse-skill-welcome" class="row panel-collapse collapse" role="tabpanel">
   </div>
  </div>

  <div class="panel">
   <div class="row" role="tab">
    <a class="collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
       data-toggle="collapse"
       gb-data-toggle='gb-expandable-tab'
       data-parent="#gb-activities-nav" href="#gb-skill-welcome-questions-pane"
       aria-expanded="false" aria-controls="gb-skill-welcome-questions-pane"
       gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillQuestions", array('skillId' => $skill->id)); ?>">
     <i class="glyphicon glyphicon-pause pull-left"></i>
     <div class="col-lg-9 gb-padding-left-1">
      <p class="gb-ellipsis">Skill Ask Me</p>
     </div>
     <i class="glyphicon glyphicon-chevron-right pull-right"></i>
    </a>
   </div>
   <div id="gb-collapse-skill-welcome" class="row panel-collapse collapse" role="tabpanel">
   </div>
  </div>

  <div class="panel">
   <div class="row" role="tab">
    <a class="collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
       data-toggle="collapse"
       gb-data-toggle='gb-expandable-tab'
       data-parent="#gb-activities-nav" href="#gb-skill-welcome-weblinks-pane"
       aria-expanded="false" aria-controls="gb-skill-welcome-weblinks-pane"
       gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillWeblinks", array('skillId' => $skill->id)); ?>">
     <i class="glyphicon glyphicon-pause pull-left"></i>
     <div class="col-lg-9 gb-padding-left-1">
      <p class="gb-ellipsis">Skill Weblinks</p>
     </div>
     <i class="glyphicon glyphicon-chevron-right pull-right"></i>
    </a>
   </div>
   <div id="gb-collapse-skill-welcome" class="row panel-collapse collapse" role="tabpanel">
   </div>
  </div>

  <div class="panel">
   <div class="row" role="tab">
    <a class="collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
       data-toggle="collapse"
       gb-data-toggle='gb-expandable-tab'
       data-parent="#gb-activities-nav" href="#gb-skill-welcome-notes-pane"
       aria-expanded="false" aria-controls="gb-skill-welcome-notes-pane"
       gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillNotes", array('skillId' => $skill->id)); ?>">
     <i class="glyphicon glyphicon-pause pull-left"></i>
     <div class="col-lg-9 gb-padding-left-1">
      <p class="gb-ellipsis">Skill Notes</p>
     </div>
     <i class="glyphicon glyphicon-chevron-right pull-right"></i>
    </a>
   </div>
   <div id="gb-collapse-skill-welcome" class="row panel-collapse collapse" role="tabpanel">
   </div>
  </div>
 </div>
</div>
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-no-padding gb-middle-container-2">
 <div class="gb-box-3 gb-background-grey-1">
  <div class="row gb-padding-medium">
   <?php
   $this->renderPartial('skill.views.skill.activity.skill._skill_item_row', array(
     "skill" => $skill,
   ));
   ?>
  </div>
 </div>
 <div class="tab-content">
  <!---------- SKILL MANAGEMENT WELCOME OVERVIEW PANE ------------>
  <div class="tab-pane active" id="gb-skill-welcome-activities-pane">
   <div class="row gb-tab-pane-body">
    <?php
    $this->renderPartial('skill.views.skill.welcome_tab._skill_overview_pane', array(
      "skill" => $skill,
      "skillOverviewQuestionnaires" => $skillOverviewQuestionnaires,
    ));
    ?>
   </div>
  </div>
 </div>
</div>


