<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-goal-item row" gb-source="<?php echo Type::$SOURCE_GOAL; ?>"
     data-gb-source-pk="<?php echo $goal->id; ?>">
 <div class="gb-box-3 gb-background-white">
  <div class="row gb-bottom-border-grey-1 gb-padding-medium">
   <?php
   $this->renderPartial('goal.views.goal.activity.goal._goal_item_heading', array(
     "goal" => $goal,
   ));
   ?>
  </div>
  <div class="row ">
   <div class="gb-icon-nav row">
    <ul id="" class="gb-icon-top-nav-1 row gb-nav">
     <li class="active col-lg-2 col-sm-2 col-xs-12">
      <a href="#gb-goal-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("goal/goalTab/goalOverview", array('goalId' => $goal->id)); ?>">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/overview_1.png"; ?>" class="img-circle gb-img-sm" alt="">
       <p class="gb-title gb-ellipsis">Activities</p>
       <div class="gb-line-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
      </a>
     </li>
     <li class="col-lg-2 col-sm-2 col-xs-12">
      <a class="" href="#gb-goal-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("goal/goalTab/goalTodos", array('goalId' => $goal->id)); ?>">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/todo_1.png"; ?>" class="img-circle gb-img-sm" alt="">
       <p class="gb-title gb-ellipsis">To-Do List</p>
       <div class="gb-line-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
      </a>
     </li>
     <li class="col-lg-2 col-sm-2 col-xs-12">
      <a class="" href="#gb-goal-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("goal/goalTab/goalComments", array('goalId' => $goal->id)); ?>">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/comment_1.png"; ?>" class="img-circle gb-img-sm" alt="">
       <p class="gb-title gb-ellipsis">Comments</p>
       <div class="gb-line-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
      </a>
     </li>
     <li class="col-lg-2 col-sm-2 col-xs-12">
      <a class="" href="#gb-goal-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("goal/goalTab/goalNotes", array('goalId' => $goal->id)); ?>">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/note_1.png"; ?>" class="img-circle gb-img-sm" alt="">
       <p class="gb-title gb-ellipsis">Notes</p>
       <div class="gb-line-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
      </a>
     </li>
     <li class="col-lg-2 col-sm-2 col-xs-12">
      <a class="" href="#gb-goal-item-contributors-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("goal/goalTab/goalContributors", array('goalId' => $goal->id)); ?>">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/people_1.png"; ?>" class="img-circle gb-img-sm" alt="">
       <p class="gb-title gb-ellipsis">Contributors</p>
       <div class="gb-line-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
      </a>
     </li>
     <li class="col-lg-2 col-sm-2 col-xs-12">
      <a class="" gb-purpose="gb-more-toggle"
         data-gb-parent=".gb-nav">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/more_1.png"; ?>" class="img-circle gb-img-sm" alt="">
       <p class="gb-title gb-ellipsis">More</p>
       <div class="gb-line-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
      </a>
     </li>
     <li class="gb-more-target gb-hide col-lg-2 col-sm-2 col-xs-12">
      <a class="" href="#gb-goal-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("goal/goalTab/goalDiscussions", array('goalId' => $goal->id)); ?>">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/discussion_1.png"; ?>" class="img-circle gb-img-sm" alt="">
       <p class="gb-title gb-ellipsis">Discussion</p>
       <div class="gb-line-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
      </a>
     </li>
     <li class="gb-more-target gb-hide col-lg-2 col-sm-2 col-xs-12">
      <a class="" href="#gb-goal-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("goal/goalTab/goalQuestionnaires", array('goalId' => $goal->id)); ?>">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/questionnaire_1.png"; ?>" class="img-circle gb-img-sm" alt="">
       <p class="gb-title gb-ellipsis">Questionnaires</p>
       <div class="gb-line-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
      </a>
     </li>
     <li class="gb-more-target gb-hide col-lg-2 col-sm-2 col-xs-12">
      <a class="" href="#gb-goal-item-tab-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("goal/goalTab/goalWeblinks", array('goalId' => $goal->id)); ?>">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/weblink_1.png"; ?>" class="img-circle gb-img-sm" alt="">
       <p class="gb-title gb-ellipsis">Weblinks</p>
       <div class="gb-line-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
      </a>
     </li>
    </ul>
   </div>
  </div>
 </div>
 <div class="tab-content">
  <div class="tab-pane active" id="gb-goal-item-tab-pane">
   <div class="row gb-tab-pane-body">
    <?php
    $this->renderPartial('goal.views.goal.welcome_tab.goal_item_tab._goal_item_overview_pane', array(
      'goal' => $goal,
      'commentModel' => $commentModel,
      //'goalChecklists' => $goalChecklists,
      //'goalChecklistsCount' => $goalChecklistsCount,
      //'goalChecklistsProgressCount' => $goalChecklistsProgressCount,
      // 'goalContributors' => $goalContributors,
      // 'goalContributorsCount' => $goalContributorsCount,
      'goalComments' => $goalComments,
      'goalCommentsCount' => $goalCommentsCount,
      // 'goalNotes' => $goalNotes,
      // 'goalNotesCount' => $goalNotesCount,
      //'goalWeblinks' => $goalWeblinks,
      // 'goalWeblinksCount' => $goalWeblinksCount,
    ))
    ?>
    <br>
   </div>
  </div>

 </div>
</div>

