<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-mentorship-item row" gb-source="<?php echo Type::$SOURCE_MENTORSHIP; ?>"
     data-gb-source-pk="<?php echo $mentorship->id; ?>">
 <div class="row">
  <a class='gb-hide gb-close-right-nav'>
   <i class='fa fa-times'></i> close
  </a>
  <div class="gb-item-heading-1 gb-bottom-border-grey-1 row">
   <?php
   $this->renderPartial('mentorship.views.mentorship.activity.mentorship._mentorship_item_heading', array(
     "mentorship" => $mentorship,
   ));
   ?>
  </div>
  <div class="row">
   <div class="gb-icon-nav row">
    <ul id="" class="gb-icon-top-nav-1 row gb-nav">
     <li class="active col-lg-9 col-sm-2 col-xs-12">
      <a  class="gb-link" data-toggle="tab"
          data-gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipOverview", array('mentorshipId' => $mentorship->id)); ?>"
          data-gb-target-pane-id="#gb-mentorship-item-tab-pane">
       <p class="gb-title gb-ellipsis">
        <strong><?php echo $mentorship->title; ?></strong>
        <?php echo " " . $mentorship->description; ?>
       </p>
      </a>
     </li>
     <li class="col-lg-1 col-sm-2 col-xs-12">
      <a  class="gb-link" data-toggle="tab"
          data-gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipContent", array('mentorshipId' => $mentorship->id)); ?>"
          data-gb-target-pane-id="#gb-mentorship-item-tab-pane">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/content_1.png"; ?>" class="img-circle gb-img-sm" alt="">
      </a>
     </li>
     <li class="col-lg-1 col-sm-2 col-xs-12">
      <a  class="gb-link" data-toggle="tab"
          data-gb-url="<?php echo Yii::app()->createUrl('mentorship/mentorshipTab/mentorshipContribution', array('mentorshipId' => $mentorship->id)); ?>"
          data-gb-target-pane-id="#gb-mentorship-item-tab-pane">
       <img src="<?php echo Yii::app()->request->baseUrl . '/img/icons/contribution_1.png'; ?>" class="img-circle gb-img-sm" alt="">
      </a>
     </li>
     <li class="col-lg-1 col-sm-2 col-xs-12 gb-no-">
      <a href="#gb-mentorship-item-contributors-pane" data-toggle="tab"
         data-gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipSettings", array('mentorshipId' => $mentorship->id)); ?>"
         data-gb-target-pane-id="#gb-mentorship-item-tab-pane">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/settings_1.png"; ?>" class="img-circle gb-img-sm" alt="">
      </a>
     </li>
    </ul>
   </div>
  </div>
 </div>
 <div class="tab-content">
  <div class="tab-pane active" id="gb-mentorship-item-tab-pane">
   <div class="row gb-tab-pane-body">
    <?php
    $this->renderPartial('mentorship.views.mentorship.tabs.mentorship_item_tab._mentorship_item_overview_pane', array(
      'mentorship' => $mentorship,
      'mentorshipId' => $mentorshipId,
      "mentorshipLevelList" => $mentorshipLevelList,
      //CONTRIBUTOR
      "contributorModel" => $contributorModel,
      "contributorTypes" => $contributorTypes,
      "mentorshipContributors" => $mentorshipContributors,
      "mentorshipContributorsCount" => $mentorshipContributorsCount,
      //COMMENT
      'commentModel' => $commentModel,
      'mentorshipComments' => $mentorshipComments,
      'mentorshipCommentsCount' => $mentorshipCommentsCount,
      //DISCUSSION
      "discussionModel" => $discussionModel,
      'mentorshipDiscussions' => $mentorshipDiscussions,
      'mentorshipDiscussionsCount' => $mentorshipDiscussionsCount,
      //NOTES
      "noteModel" => $noteModel,
      'mentorshipNotes' => $mentorshipNotes,
      'mentorshipNotesCount' => $mentorshipNotesCount,
      //TODO
      "todoModel" => $todoModel,
      "todoPriorities" => $todoPriorities,
      'mentorshipTodos' => $mentorshipTodos,
      'mentorshipTodosCount' => $mentorshipTodosCount,
      //WEBLINKS
      "weblinkModel" => $weblinkModel,
      'mentorshipWeblinks' => $mentorshipWeblinks,
      'mentorshipWeblinksCount' => $mentorshipWeblinksCount,
      //TIMELINE
      'timelineModel' => $timelineModel,
      'mentorshipTimelineDays' => $mentorshipTimelineDays,
      'mentorshipTimelineDaysCount' => $mentorshipTimelineDaysCount,))
    ?>
    <br>
   </div>
  </div>
 </div>
</div>