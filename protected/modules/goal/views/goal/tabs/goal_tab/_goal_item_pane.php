<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>
<?php ?>
<!-- Sidebar -->
<div class="container">
 <div class="gb-goal-item row gb-app-detail col-lg-9 col-md-9 col-sm-9 col-xs-9" gb-source="<?php echo Type::$SOURCE_GOAL; ?>"
      data-gb-source-pk="<?php echo $goal->id; ?>">
  <div class="row">
   <a class='gb-hide gb-close-right-nav'>
    <i class='fa fa-times'></i> close
   </a>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
    <div id="myCarousel" class="carousel slide profile-carousel" data-ride="carousel">
     <div class="air air-bottom-right padding-10">
      <a class="btn btn-default col-lg-12 col-md-12 col-sm-12 col-xs-12" data-toggle="dropdown" aria-expanded="false">
       <i class="fa fa-star"></i> Subscribe
      </a>
      <br>
      <a class="btn btn-primary col-lg-12 col-md-12 col-sm-12 col-xs-12"
         gb-purpose="gb-expandables-modal-trigger"
         data-gb-modal-target="#gb-contribute-modal">
       <i class="fa fa-user-plus"></i> Contribute
      </a>
     </div>
     <div class="gb-opacity-5 air air-top-left padding-10">
      <p class="gb-title gb-ellipsis">
       By: <a class="">
        <?php
        echo $goal->creator->profile->firstname . " " . $goal->creator->profile->lastname
        ?>
       </a>
      </p>
      <p class="gb-ellipsis gb-description">
       <strong class="text-info"><?php echo $goal->level->name; ?></strong>
      </p>
     </div>
     <ol class="carousel-indicators" role="listbox">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1" class=""></li>
      <li data-target="#myCarousel" data-slide-to="2" class=""></li>
     </ol>
     <div class="carousel-inner">
      <!-- Slide 1 -->
      <div class="item active">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/demo/s1.jpg"; ?>" alt="demo user">
      </div>
      <!-- Slide 2 -->
      <div class="item">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/demo/s2.jpg"; ?>" alt="demo user">
      </div>
      <!-- Slide 3 -->
      <div class="item">
       <img src="<?php echo Yii::app()->request->baseUrl . "/img/demo/m3.jpg"; ?>" alt="demo user">
      </div>
     </div>
    </div>
   </div>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
    <div class="row">
     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 profile-pic">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $goal->creator->profile->avatar_url; ?>" class="gb-heading-img" alt="">
     </div>
     <div class="pull-left col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <ul id="" class="gb-icon-top-nav-1 row gb-nav">
       <li class="active col-lg-7 col-md-7 col-sm-7 col-xs-6 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-0">
        <a  class="gb-link" data-toggle="tab"
            data-gb-url="<?php echo Yii::app()->createUrl("goal/goalTab/goalOverview", array('goalId' => $goal->id)); ?>"
            data-gb-target-pane-id="#gb-goal-item-tab-pane">
         <p class="gb-title gb-ellipsis">
          <strong><?php echo $goal->title; ?></strong>
          <?php echo " " . $goal->description; ?>
         </p>
        </a>
       </li>
       <li class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
        <a  class="gb-link" data-toggle="tab"
            data-gb-url="<?php echo Yii::app()->createUrl("goal/goalTab/goalContent", array('goalId' => $goal->id)); ?>"
            data-gb-target-pane-id="#gb-goal-item-tab-pane">
         <i class="fa fa-files-o"></i>
        </a>
       </li>
       <li class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
        <a  class="gb-link" data-toggle="tab"
            data-gb-url="<?php echo Yii::app()->createUrl('goal/goalTab/goalContribution', array('goalId' => $goal->id)); ?>"
            data-gb-target-pane-id="#gb-goal-item-tab-pane">
         <i class="fa fa-users"></i>
        </a>
       </li>
       <li class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
        <a href="#gb-goal-item-contributors-pane" data-toggle="tab"
           data-gb-url="<?php echo Yii::app()->createUrl("goal/goalTab/goalSettings", array('goalId' => $goal->id)); ?>"
           data-gb-target-pane-id="#gb-goal-item-tab-pane">
         <i class="fa fa-cog"></i>
        </a>
       </li>
      </ul>
     </div>
    </div>
   </div>
  </div>
  <div class="gb-hide gb-app-item-heading row">
   <div class="col-lg-2">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $goal->creator->profile->avatar_url; ?>" class="gb-heading-img" alt="">
   </div>
   <div class="col-lg-7 gb-padding-left-1 text-left">
    <p class="gb-title">
     <a class="gb-ellipsis">
      <?php
      echo $goal->creator->profile->firstname . " " . $goal->creator->profile->lastname
      ?>
     </a>
    </p>
    <p class="gb-ellipsis gb-description">
     <strong><?php echo $goal->level->name; ?></strong>
    </p>
    <div class="gb-ellipsis gb-description">
     Created on
     <i>
      <a>
       <?php echo date_format(date_create($goal->created_date), 'M jS \a\t g:ia'); ?>
      </a>
     </i>
    </div>
    <p class="gb-ellipsis gb-description">
     <a class="gb-faded-link"><i class="fa fa-share"></i> Share</a> •
     <a class="gb-faded-link"><i class="fa fa-clipboard"></i> Clone Request</a>
    </p>
   </div>
   <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-padding-thinner">
    <div class="row">
     <a class="btn btn-default col-lg-12 col-md-12 col-sm-12 col-xs-12" data-toggle="dropdown" aria-expanded="false">
      <i class="fa fa-star"></i> Subscribe
     </a>
     <br>
     <a class="btn dropdown-toggle btn-primary col-lg-12 col-md-12 col-sm-12 col-xs-12"
        gb-purpose="gb-expandables-modal-trigger"
        data-gb-modal-target="#gb-contribute-modal">
      <i class="fa fa-user-plus"></i> Contribute
     </a>
    </div>
   </div>
  </div>
  <div class="tab-content">
   <div class="tab-pane active">
    <div id="gb-goal-item-tab-pane" class="row gb-tab-pane-body gb-padding-thin">
     <?php
     $this->renderPartial('goal.views.goal.tabs.goal_item_tab._goal_item_overview_pane', array(
       'goal' => $goal,
       'goalId' => $goalId,
       "goalLevelList" => $goalLevelList,
       //CONTRIBUTOR
       "contributorModel" => $contributorModel,
       "contributorTypes" => $contributorTypes,
       "goalContributors" => $goalContributors,
       "goalContributorsCount" => $goalContributorsCount,
       //COMMENT
       'commentModel' => $commentModel,
       'goalComments' => $goalComments,
       'goalCommentsCount' => $goalCommentsCount,
       //DISCUSSION
       "discussionModel" => $discussionModel,
       'goalDiscussions' => $goalDiscussions,
       'goalDiscussionsCount' => $goalDiscussionsCount,
       //MENTORSHIP
       "mentorshipGoals" => $mentorshipGoals,
       "mentorshipGoalsCount" => $mentorshipGoalsCount,
       //NOTES
       "noteModel" => $noteModel,
       'goalNotes' => $goalNotes,
       'goalNotesCount' => $goalNotesCount,
       //TODO
       "todoModel" => $todoModel,
       "todoPriorities" => $todoPriorities,
       'goalTodos' => $goalTodos,
       'goalTodosCount' => $goalTodosCount,
       //WEBLINKS
       "weblinkModel" => $weblinkModel,
       'goalWeblinks' => $goalWeblinks,
       'goalWeblinksCount' => $goalWeblinksCount,
       //TIMELINE
       'timelineModel' => $timelineModel,
       'goalTimelineDays' => $goalTimelineDays,
       'goalTimelineDaysCount' => $goalTimelineDaysCount,
     ))
     ?>
     <br>
    </div>
   </div>
  </div>
  <!-- ------------------------------- MODALS --------------------------->

  <?php
  echo $this->renderPartial('goal.views.goal.modals._goal_contribute_modal'
    , array(
    "goal" => $goal,
    "mentorshipGoalModel" => $mentorshipGoalModel,
    "mentorshipLevelList" => $mentorshipLevelList));
  ?>
 </div>
</div>
<!-- /#wrapper -->
<?php $this->endContent(); ?>

