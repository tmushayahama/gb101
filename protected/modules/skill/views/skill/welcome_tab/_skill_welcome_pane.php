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
      <h3 class="gb-heading-2">Skill Details</h3>
      <div class="row gb-tab-pane-body">
        <?php
        $this->renderPartial('skill.views.skill.welcome_tab._skill_overview_pane', array(
         "skillListItem" => $skillListItem,
        ));
        ?>
      </div>
    </div>

    <!---------------------SKILL COMMENTS PANE -------------------->
    <div class="tab-pane" id="gb-skill-welcome-comments-pane">
      <h3 class="gb-heading-2">Skill Comments
        <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
           gb-form-slide-target="#gb-skill-comment-form-container"
           gb-form-target="#gb-skill-comment-form"
           gb-form-heading="Create Skill Comment List">
          <i class="glyphicon glyphicon-plus"></i>
          Add
        </a>
      </h3>
      <div class="row gb-tab-pane-body"></div>
    </div>

    <!---------------------SKILL TODOS PANE -------------------->
    <div class="tab-pane" id="gb-skill-welcome-todos-pane">
      <h3 class="gb-heading-2">Skill Todo List
        <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
           gb-form-slide-target="#gb-skill-todo-form-container"
           gb-form-target="#gb-skill-todo-form"
           gb-form-heading="Create Skill Todo List">
          <i class="glyphicon glyphicon-plus"></i>
          Add
        </a>
      </h3>
      <div class="row gb-tab-pane-body"></div>
    </div>

    <!------------------SKILL DISCUSSIONS PANE ----------------------->
    <div class="tab-pane" id="gb-skill-welcome-discussions-pane">    
      <h3 class="gb-heading-2">Skill Discussions
        <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
           gb-form-slide-target="#gb-skill-discussion-form-container"
           gb-form-target="#gb-skill-discussion-form"
           gb-form-heading="Create Skill Discussion List">
          <i class="glyphicon glyphicon-plus"></i>
          Add
        </a>
      </h3>
      <div class="row gb-tab-pane-body"></div>
    </div>

    <!---------------------SKILL QUESTION ANSWER PANE -------------------->
    <div class="tab-pane" id="gb-skill-welcome-question-answers-pane">
      <h3 class="gb-heading-2">Skill Questions
        <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
           gb-form-slide-target="#gb-skill-question-answer-form-container"
           gb-form-target="#gb-skill-question-answer-form"
           gb-form-heading="Create Skill Question Answer List">
          <i class="glyphicon glyphicon-plus"></i>
          Add
        </a>
      </h3>
      <div class="row gb-tab-pane-body"></div>
    </div>

    <!---------------------SKILL EXTERNAL LINKS PANE -------------------->
    <div class="tab-pane" id="gb-skill-welcome-weblinks-pane">
      <h3 class="gb-heading-2">Skill External Link
        <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
           gb-form-slide-target="#gb-skill-weblink-form-container"
           gb-form-target="#gb-skill-weblink-form"
           gb-form-heading="Create Skill Weblink List">
          <i class="glyphicon glyphicon-plus"></i>
          Add
        </a>
      </h3>
      <div class="row gb-tab-pane-body"></div>
    </div>

    <!---------------------SKILL NOTES PANE -------------------->
    <div class="tab-pane" id="gb-skill-welcome-notes-pane">
      <h3 class="gb-heading-2">Skill Note List
        <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
           gb-form-slide-target="#gb-skill-note-form-container"
           gb-form-target="#gb-skill-note-form"
           gb-form-heading="Create Skill Note List">
          <i class="glyphicon glyphicon-plus"></i>
          Add
        </a>
      </h3>
      <div class="row gb-tab-pane-body"></div>
    </div>

    <!---------------------SKILL FILES PANE -------------------->
    <div class="tab-pane" id="gb-skill-welcome-files-pane">
      <h3 class="gb-heading-2">Skill Files</h3>
      <div class="row gb-tab-pane-body"></div>
    </div>
  </div>
</div>


