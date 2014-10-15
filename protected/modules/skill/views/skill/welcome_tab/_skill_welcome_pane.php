<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
  <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-nav-for-background-2 row gb-no-padding">
    <li class="active col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-skill-welcome-overview-pane" data-toggle="tab">
        <i class="glyphicon glyphicon-book pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Overview & Tools</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-skill-welcome-comments-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillComments", array('skillListId' => $skillListItem->id)); ?>">
        <i class="glyphicon glyphicon-tasks pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Skill Comments</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-skill-welcome-todos-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillTodos", array('skillListId' => $skillListItem->id)); ?>">
        <i class="glyphicon glyphicon-tasks pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Skill Todo List</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-skill-welcome-discussions-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillDiscussions", array('skillListId' => $skillListItem->id)); ?>">
        <i class="glyphicon glyphicon-th-list pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Discussions</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-skill-welcome-question-answers-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillQuestionAnswers", array('skillListId' => $skillListItem->id)); ?>">
        <i class="glyphicon glyphicon-question-sign pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Questions</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-skill-welcome-weblinks-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillWeblinks", array('skillListId' => $skillListItem->id)); ?>">
        <i class="glyphicon glyphicon-globe pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">External Links</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
     <li class="col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-skill-welcome-notes-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillNotes", array('skillListId' => $skillListItem->id)); ?>">
        <i class="glyphicon glyphicon-tasks pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Skill Note List</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-skill-welcome-files-pane" data-toggle="tab">
        <i class="glyphicon glyphicon-file pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Files</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
  </ul>
</div>
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
  <div class="tab-content gb-padding-left-3">
    
    <!---------- SKILL MANAGEMENT WELCOME OVERVIEW PANE ------------>
    <div class="tab-pane active" id="gb-skill-welcome-overview-pane">
      <?php
      $this->renderPartial('skill.views.skill.welcome_tab._skill_overview_pane', array(
       "skillListItem" => $skillListItem,
      ));
      ?>
    </div>
    
    <!---------------------SKILL COMMENTS PANE -------------------->
    <div class="tab-pane" id="gb-skill-welcome-comments-pane"></div>
    
    <!---------------------SKILL TODOS PANE -------------------->
    <div class="tab-pane" id="gb-skill-welcome-todos-pane"></div>
    
    <!------------------SKILL DISCUSSIONS PANE ----------------------->
    <div class="tab-pane" id="gb-skill-welcome-discussions-pane"></div>
    
    <!---------------------SKILL QUESTION ANSWER PANE -------------------->
    <div class="tab-pane" id="gb-skill-welcome-question-answers-pane"></div>
    
    <!---------------------SKILL EXTERNAL LINKS PANE -------------------->
    <div class="tab-pane" id="gb-skill-welcome-weblinks-pane"></div>
    
    <!---------------------SKILL NOTES PANE -------------------->
    <div class="tab-pane" id="gb-skill-welcome-notes-pane"></div>
    
    <!---------------------SKILL FILES PANE -------------------->
    <div class="tab-pane" id="gb-skill-welcome-files-pane"></div>
  </div>
</div>


