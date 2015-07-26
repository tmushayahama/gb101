<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-advice-item row" gb-source="<?php echo Type::$SOURCE_ADVICE; ?>"
     data-gb-source-pk="<?php echo $advice->id; ?>">
 <a class='gb-hide gb-close-right-nav'>
  <i class='fa fa-times'></i> close
 </a>
 <div class="gb-item-heading-1 gb-bottom-border-grey-1 row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <div class="row">
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 gb-padding-none">
     <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $advice->mentor->profile->avatar_url; ?>" class="" alt="">
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center gb-padding-none">
     <i class="fa fa-2x fa-play"></i>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 gb-padding-none">
     <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $advice->mentee->profile->avatar_url; ?>" class="" alt="">
    </div>
   </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
   <div class="row">
    <p class="gb-description gb-ellipsis">
     Mentor:
     <a>
      <?php echo $advice->mentor->profile->firstname . " " . $advice->mentor->profile->lastname; ?>
     </a>
    </p>
    <p class="gb-description gb-ellipsis">
     Is Mentoring:
     <a>
      <?php echo $advice->mentee->profile->firstname . " " . $advice->mentee->profile->lastname; ?>
     </a>
    </p>
    <p class="gb-description gb-ellipsis">
     Created By:
     <a>
      <?php echo $advice->creator->profile->firstname . " " . $advice->creator->profile->lastname; ?>
     </a>
    </p>
   </div>
   <div class="row">
    <a class="btn btn-default col-lg-6 col-md-6 col-sm-6 col-xs-6" data-toggle="dropdown" aria-expanded="false">
     <i class="fa fa-star"></i> Subscribe
    </a>
    <a class="btn btn-primary col-lg-6 col-md-6 col-sm-6 col-xs-6"
       gb-purpose="gb-expandables-modal-trigger"
       data-gb-modal-target="#gb-contribute-modal">
     <i class="fa fa-user-plus"></i> Contribute
    </a>
   </div>
  </div>
 </div>
 <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
   <ul id="" class="gb-icon-top-nav-1 row gb-nav">
    <li class="active col-lg-9 col-md-9 col-sm-9 col-xs-8">
     <a  class="gb-link" data-toggle="tab"
         data-gb-url="<?php echo Yii::app()->createUrl("advice/adviceTab/adviceOverview", array('adviceId' => $advice->id)); ?>"
         data-gb-target-pane-id="#gb-advice-item-tab-pane">
      <p class="gb-title gb-ellipsis">
       <strong><?php echo $advice->title; ?></strong>
       <?php echo " " . $advice->description; ?>
      </p>
     </a>
    </li>
    <li class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
     <a  class="gb-link" data-toggle="tab"
         data-gb-url="<?php echo Yii::app()->createUrl("advice/adviceTab/adviceContent", array('adviceId' => $advice->id)); ?>"
         data-gb-target-pane-id="#gb-advice-item-tab-pane">
      <i class="fa fa-files-o"></i>
     </a>
    </li>
    <li class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
     <a  class="gb-link" data-toggle="tab"
         data-gb-url="<?php echo Yii::app()->createUrl('advice/adviceTab/adviceContribution', array('adviceId' => $advice->id)); ?>"
         data-gb-target-pane-id="#gb-advice-item-tab-pane">
      <i class="fa fa-users"></i>
     </a>
    </li>
    <li class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
     <a href="#gb-advice-item-contributors-pane" data-toggle="tab"
        data-gb-url="<?php echo Yii::app()->createUrl("advice/adviceTab/adviceSettings", array('adviceId' => $advice->id)); ?>"
        data-gb-target-pane-id="#gb-advice-item-tab-pane">
      <i class="fa fa-cog"></i>
     </a>
    </li>
   </ul>
  </div>
 </div>
 <div class="gb-hide gb-app-item-heading row">
  <div class="col-lg-2">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $advice->creator->profile->avatar_url; ?>" class="gb-heading-img" alt="">
  </div>
  <div class="col-lg-7 gb-padding-left-1 text-left">
   <p class="gb-title">
    <a class="gb-ellipsis">
     <?php
     echo $advice->creator->profile->firstname . " " . $advice->creator->profile->lastname
     ?>
    </a>
   </p>
   <p class="gb-ellipsis gb-description">
    <strong><?php echo $advice->level->name; ?></strong>
   </p>
   <div class="gb-ellipsis gb-description">
    Created on
    <i>
     <a>
      <?php echo date_format(date_create($advice->created_date), 'M jS \a\t g:ia'); ?>
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
   <div id="gb-advice-item-tab-pane" class="row gb-tab-pane-body gb-padding-thin">
    <?php
    $this->renderPartial('advice.views.advice.tabs.advice_item_tab._advice_item_overview_pane', array(
      'advice' => $advice,
      'adviceId' => $adviceId,
      "adviceLevelList" => $adviceLevelList,
      //CONTRIBUTOR
      "contributorModel" => $contributorModel,
      "contributorTypes" => $contributorTypes,
      "adviceContributors" => $adviceContributors,
      "adviceContributorsCount" => $adviceContributorsCount,
      //COMMENT
      'commentModel' => $commentModel,
      'adviceComments' => $adviceComments,
      'adviceCommentsCount' => $adviceCommentsCount,
      //DISCUSSION
      "discussionModel" => $discussionModel,
      'adviceDiscussions' => $adviceDiscussions,
      'adviceDiscussionsCount' => $adviceDiscussionsCount,
      //NOTES
      "noteModel" => $noteModel,
      'adviceNotes' => $adviceNotes,
      'adviceNotesCount' => $adviceNotesCount,
      //TODO
      "todoModel" => $todoModel,
      "todoPriorities" => $todoPriorities,
      'adviceTodos' => $adviceTodos,
      'adviceTodosCount' => $adviceTodosCount,
      //WEBLINKS
      "weblinkModel" => $weblinkModel,
      'adviceWeblinks' => $adviceWeblinks,
      'adviceWeblinksCount' => $adviceWeblinksCount,
      //TIMELINE
      'timelineModel' => $timelineModel,
      'adviceTimelineDays' => $adviceTimelineDays,
      'adviceTimelineDaysCount' => $adviceTimelineDaysCount,))
    ?>
    <br>
   </div>
  </div>
 </div>
</div>