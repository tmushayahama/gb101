<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-mentorship-item row" gb-source="<?php echo Type::$SOURCE_MENTORSHIP; ?>"
     data-gb-source-pk="<?php echo $mentorship->id; ?>">
 <div class="gb-background-white row">
  <div class="gb-item-heading-1 gb-bottom-border-grey-1 row">
   <?php
   $this->renderPartial('mentorship.views.mentorship.activity.mentorship._mentorship_item_heading', array(
     "mentorship" => $mentorship,
   ));
   ?>
  </div>
  <ul id="" class="gb-icon-top-nav-1 row gb-nav">
   <li class="active col-lg-2 col-sm-2 col-xs-12">
    <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
       gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipOverview", array('mentorshipId' => $mentorship->id)); ?>">
     <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/overview_1.png"; ?>" class="img-circle gb-img-sm" alt="">
     <p class="gb-title gb-ellipsis">Overview</p>
    </a>
   </li>
   <li class="col-lg-2 col-sm-2 col-xs-12">
    <a class="" href="#gb-mentorship-item-tab-pane" data-toggle="tab"
       gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipTodos", array('mentorshipId' => $mentorship->id)); ?>">
     <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/todo_1.png"; ?>" class="img-circle gb-img-sm" alt="">
     <p class="gb-title gb-ellipsis">To-Do List</p>
    </a>
   </li>
   <li class="col-lg-2 col-sm-2 col-xs-12">
    <a class="" href="#gb-mentorship-item-tab-pane" data-toggle="tab"
       gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipComments", array('mentorshipId' => $mentorship->id)); ?>">
     <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/comment_1.png"; ?>" class="img-circle gb-img-sm" alt="">
     <p class="gb-title gb-ellipsis">Comments</p>
    </a>
   </li>
   <li class="col-lg-2 col-sm-2 col-xs-12">
    <a class="" href="#gb-mentorship-item-tab-pane" data-toggle="tab"
       gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipNotes", array('mentorshipId' => $mentorship->id)); ?>">
     <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/note_1.png"; ?>" class="img-circle gb-img-sm" alt="">
     <p class="gb-title gb-ellipsis">Notes</p>
    </a>
   </li>
   <li class="col-lg-2 col-sm-2 col-xs-12">
    <a class="" href="#gb-mentorship-item-contributors-pane" data-toggle="tab"
       gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipContributors", array('mentorshipId' => $mentorship->id)); ?>">
     <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/people_1.png"; ?>" class="img-circle gb-img-sm" alt="">
     <p class="gb-title gb-ellipsis">Contributors</p>
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
    <a class="" href="#gb-mentorship-item-tab-pane" data-toggle="tab"
       gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipDiscussions", array('mentorshipId' => $mentorship->id)); ?>">
     <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/discussion_1.png"; ?>" class="img-circle gb-img-sm" alt="">
     <p class="gb-title gb-ellipsis">Discussion</p>
     <div class="gb-line-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
    </a>
   </li>
   <li class="gb-more-target gb-hide col-lg-2 col-sm-2 col-xs-12">
    <a class="" href="#gb-mentorship-item-tab-pane" data-toggle="tab"
       gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipQuestionnaires", array('mentorshipId' => $mentorship->id)); ?>">
     <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/questionnaire_1.png"; ?>" class="img-circle gb-img-sm" alt="">
     <p class="gb-title gb-ellipsis">Questionnaires</p>
     <div class="gb-line-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
    </a>
   </li>
   <li class="gb-more-target gb-hide col-lg-2 col-sm-2 col-xs-12">
    <a class="" href="#gb-mentorship-item-tab-pane" data-toggle="tab"
       gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipWeblinks", array('mentorshipId' => $mentorship->id)); ?>">
     <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/weblink_1.png"; ?>" class="img-circle gb-img-sm" alt="">
     <p class="gb-title gb-ellipsis">Weblinks</p>
     <div class="gb-line-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10"></div>
    </a>
   </li>
  </ul>
 </div>
 <div class="tab-content">
  <div class="tab-pane active" id="gb-mentorship-item-tab-pane">
   <div class="row gb-tab-pane-body">
    <?php
    $this->renderPartial('mentorship.views.mentorship.welcome_tab.mentorship_item_tab._mentorship_item_overview_pane', array(
      'mentorship' => $mentorship,
      'timelineModel' => $timelineModel,
      //'mentorshipChecklists' => $mentorshipChecklists,
      //'mentorshipChecklistsCount' => $mentorshipChecklistsCount,
      //'mentorshipChecklistsProgressCount' => $mentorshipChecklistsProgressCount,
      // 'mentorshipContributors' => $mentorshipContributors,
      // 'mentorshipContributorsCount' => $mentorshipContributorsCount,
      'mentorshipTimelineDays' => $mentorshipTimelineDays,
      'mentorshipTimelineDaysCount' => $mentorshipTimelineDaysCount,
      // 'mentorshipNotes' => $mentorshipNotes,
      // 'mentorshipNotesCount' => $mentorshipNotesCount,
      //'mentorshipWeblinks' => $mentorshipWeblinks,
      // 'mentorshipWeblinksCount' => $mentorshipWeblinksCount,
    ))
    ?>
    <br>
   </div>
  </div>

 </div>
</div>

