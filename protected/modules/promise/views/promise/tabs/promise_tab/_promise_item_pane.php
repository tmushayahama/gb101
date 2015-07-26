<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>
<?php ?>
<!-- Sidebar -->
<div class="container">
 <div class="gb-promise-item row gb-app-detail col-lg-9 col-md-9 col-sm-9 col-xs-9" gb-source="<?php echo Type::$SOURCE_PROMISE; ?>"
      data-gb-source-pk="<?php echo $promise->id; ?>">
  <div class="row">
   <a class='gb-hide gb-close-right-nav'>
    <i class='fa fa-times'></i> close
   </a>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
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
        echo $promise->creator->profile->firstname . " " . $promise->creator->profile->lastname
        ?>
       </a>
      </p>
      <p class="gb-ellipsis gb-description">
       <strong class="text-info"><?php echo $promise->level->name; ?></strong>
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
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
    <div class="row">
     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 profile-pic">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $promise->creator->profile->avatar_url; ?>" class="gb-heading-img" alt="">
     </div>
     <div class="pull-left col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
      <ul id="" class="gb-icon-top-nav-1 row gb-nav">
       <li class="active col-lg-7 col-md-7 col-sm-7 col-xs-6 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-0">
        <a  class="gb-link" data-toggle="tab"
            data-gb-url="<?php echo Yii::app()->createUrl("promise/promiseTab/promiseOverview", array('promiseId' => $promise->id)); ?>"
            data-gb-target-pane-id="#gb-promise-item-tab-pane">
         <p class="gb-title gb-ellipsis">
          <strong><?php echo $promise->title; ?></strong>
          <?php echo " " . $promise->description; ?>
         </p>
        </a>
       </li>
       <li class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
        <a  class="gb-link" data-toggle="tab"
            data-gb-url="<?php echo Yii::app()->createUrl("promise/promiseTab/promiseContent", array('promiseId' => $promise->id)); ?>"
            data-gb-target-pane-id="#gb-promise-item-tab-pane">
         <i class="fa fa-files-o"></i>
        </a>
       </li>
       <li class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
        <a  class="gb-link" data-toggle="tab"
            data-gb-url="<?php echo Yii::app()->createUrl('promise/promiseTab/promiseContribution', array('promiseId' => $promise->id)); ?>"
            data-gb-target-pane-id="#gb-promise-item-tab-pane">
         <i class="fa fa-users"></i>
        </a>
       </li>
       <li class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
        <a href="#gb-promise-item-contributors-pane" data-toggle="tab"
           data-gb-url="<?php echo Yii::app()->createUrl("promise/promiseTab/promiseSettings", array('promiseId' => $promise->id)); ?>"
           data-gb-target-pane-id="#gb-promise-item-tab-pane">
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
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $promise->creator->profile->avatar_url; ?>" class="gb-heading-img" alt="">
   </div>
   <div class="col-lg-7 gb-padding-left-1 text-left">
    <p class="gb-title">
     <a class="gb-ellipsis">
      <?php
      echo $promise->creator->profile->firstname . " " . $promise->creator->profile->lastname
      ?>
     </a>
    </p>
    <p class="gb-ellipsis gb-description">
     <strong><?php echo $promise->level->name; ?></strong>
    </p>
    <div class="gb-ellipsis gb-description">
     Created on
     <i>
      <a>
       <?php echo date_format(date_create($promise->created_date), 'M jS \a\t g:ia'); ?>
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
    <div id="gb-promise-item-tab-pane" class="row gb-tab-pane-body gb-padding-thin">
     <?php
     $this->renderPartial('promise.views.promise.tabs.promise_item_tab._promise_item_overview_pane', array(
       'promise' => $promise,
       'promiseId' => $promiseId,
       "promiseLevelList" => $promiseLevelList,
       //CONTRIBUTOR
       "contributorModel" => $contributorModel,
       "contributorTypes" => $contributorTypes,
       "promiseContributors" => $promiseContributors,
       "promiseContributorsCount" => $promiseContributorsCount,
       //COMMENT
       'commentModel' => $commentModel,
       'promiseComments' => $promiseComments,
       'promiseCommentsCount' => $promiseCommentsCount,
       //DISCUSSION
       "discussionModel" => $discussionModel,
       'promiseDiscussions' => $promiseDiscussions,
       'promiseDiscussionsCount' => $promiseDiscussionsCount,
       //MENTORSHIP
       "mentorshipPromises" => $mentorshipPromises,
       "mentorshipPromisesCount" => $mentorshipPromisesCount,
       //NOTES
       "noteModel" => $noteModel,
       'promiseNotes' => $promiseNotes,
       'promiseNotesCount' => $promiseNotesCount,
       //TODO
       "todoModel" => $todoModel,
       "todoPriorities" => $todoPriorities,
       'promiseTodos' => $promiseTodos,
       'promiseTodosCount' => $promiseTodosCount,
       //WEBLINKS
       "weblinkModel" => $weblinkModel,
       'promiseWeblinks' => $promiseWeblinks,
       'promiseWeblinksCount' => $promiseWeblinksCount,
       //TIMELINE
       'timelineModel' => $timelineModel,
       'promiseTimelineDays' => $promiseTimelineDays,
       'promiseTimelineDaysCount' => $promiseTimelineDaysCount,
     ))
     ?>
     <br>
    </div>
   </div>
  </div>
  <!-- ------------------------------- MODALS --------------------------->

  <?php
  echo $this->renderPartial('promise.views.promise.modals._promise_contribute_modal'
    , array(
    "promise" => $promise,
    "mentorshipPromiseModel" => $mentorshipPromiseModel,
    "mentorshipLevelList" => $mentorshipLevelList));
  ?>
 </div>
</div>
<!-- /#wrapper -->
<?php $this->endContent(); ?>

