<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>
<?php ?>
<!-- Sidebar -->
<div class="container">
 <div class="gb-hobby-item row gb-app-detail col-lg-9 col-md-9 col-sm-9 col-xs-9" gb-source="<?php echo Type::$SOURCE_HOBBY; ?>"
      data-gb-source-pk="<?php echo $hobby->id; ?>">
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
        echo $hobby->creator->profile->firstname . " " . $hobby->creator->profile->lastname
        ?>
       </a>
      </p>
      <p class="gb-ellipsis gb-description">
       <strong class="text-info"><?php echo $hobby->level->name; ?></strong>
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
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $hobby->creator->profile->avatar_url; ?>" class="gb-heading-img" alt="">
     </div>
     <div class="pull-left col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <ul id="" class="gb-icon-top-nav-1 row gb-nav">
       <li class="active col-lg-7 col-md-7 col-sm-7 col-xs-6 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-0">
        <a  class="gb-link" data-toggle="tab"
            data-gb-url="<?php echo Yii::app()->createUrl("hobby/hobbyTab/hobbyOverview", array('hobbyId' => $hobby->id)); ?>"
            data-gb-target-pane-id="#gb-hobby-item-tab-pane">
         <p class="gb-title gb-ellipsis">
          <strong><?php echo $hobby->title; ?></strong>
          <?php echo " " . $hobby->description; ?>
         </p>
        </a>
       </li>
       <li class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
        <a  class="gb-link" data-toggle="tab"
            data-gb-url="<?php echo Yii::app()->createUrl("hobby/hobbyTab/hobbyContent", array('hobbyId' => $hobby->id)); ?>"
            data-gb-target-pane-id="#gb-hobby-item-tab-pane">
         <i class="fa fa-files-o"></i>
        </a>
       </li>
       <li class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
        <a  class="gb-link" data-toggle="tab"
            data-gb-url="<?php echo Yii::app()->createUrl('hobby/hobbyTab/hobbyContribution', array('hobbyId' => $hobby->id)); ?>"
            data-gb-target-pane-id="#gb-hobby-item-tab-pane">
         <i class="fa fa-users"></i>
        </a>
       </li>
       <li class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
        <a href="#gb-hobby-item-contributors-pane" data-toggle="tab"
           data-gb-url="<?php echo Yii::app()->createUrl("hobby/hobbyTab/hobbySettings", array('hobbyId' => $hobby->id)); ?>"
           data-gb-target-pane-id="#gb-hobby-item-tab-pane">
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
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $hobby->creator->profile->avatar_url; ?>" class="gb-heading-img" alt="">
   </div>
   <div class="col-lg-7 gb-padding-left-1 text-left">
    <p class="gb-title">
     <a class="gb-ellipsis">
      <?php
      echo $hobby->creator->profile->firstname . " " . $hobby->creator->profile->lastname
      ?>
     </a>
    </p>
    <p class="gb-ellipsis gb-description">
     <strong><?php echo $hobby->level->name; ?></strong>
    </p>
    <div class="gb-ellipsis gb-description">
     Created on
     <i>
      <a>
       <?php echo date_format(date_create($hobby->created_date), 'M jS \a\t g:ia'); ?>
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
    <div id="gb-hobby-item-tab-pane" class="row gb-tab-pane-body gb-padding-thin">
     <?php
     $this->renderPartial('hobby.views.hobby.tabs.hobby_item_tab._hobby_item_overview_pane', array(
       'hobby' => $hobby,
       'hobbyId' => $hobbyId,
       "hobbyLevelList" => $hobbyLevelList,
       //CONTRIBUTOR
       "contributorModel" => $contributorModel,
       "contributorTypes" => $contributorTypes,
       "hobbyContributors" => $hobbyContributors,
       "hobbyContributorsCount" => $hobbyContributorsCount,
       //COMMENT
       'commentModel' => $commentModel,
       'hobbyComments' => $hobbyComments,
       'hobbyCommentsCount' => $hobbyCommentsCount,
       //DISCUSSION
       "discussionModel" => $discussionModel,
       'hobbyDiscussions' => $hobbyDiscussions,
       'hobbyDiscussionsCount' => $hobbyDiscussionsCount,
       //MENTORSHIP
       "mentorshipHobbys" => $mentorshipHobbys,
       "mentorshipHobbysCount" => $mentorshipHobbysCount,
       //NOTES
       "noteModel" => $noteModel,
       'hobbyNotes' => $hobbyNotes,
       'hobbyNotesCount' => $hobbyNotesCount,
       //TODO
       "todoModel" => $todoModel,
       "todoPriorities" => $todoPriorities,
       'hobbyTodos' => $hobbyTodos,
       'hobbyTodosCount' => $hobbyTodosCount,
       //WEBLINKS
       "weblinkModel" => $weblinkModel,
       'hobbyWeblinks' => $hobbyWeblinks,
       'hobbyWeblinksCount' => $hobbyWeblinksCount,
       //TIMELINE
       'timelineModel' => $timelineModel,
       'hobbyTimelineDays' => $hobbyTimelineDays,
       'hobbyTimelineDaysCount' => $hobbyTimelineDaysCount,
     ))
     ?>
     <br>
    </div>
   </div>
  </div>
  <!-- ------------------------------- MODALS --------------------------->

  <?php
  echo $this->renderPartial('hobby.views.hobby.modals._hobby_contribute_modal'
    , array(
    "hobby" => $hobby,
    "mentorshipHobbyModel" => $mentorshipHobbyModel,
    "mentorshipLevelList" => $mentorshipLevelList));
  ?>
 </div>
</div>
<!-- /#wrapper -->
<?php $this->endContent(); ?>

