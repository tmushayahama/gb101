<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<div class="gb-skill-item row" gb-source="<?php echo Type::$SOURCE_SKILL; ?>"
     data-gb-source-pk="<?php echo $skill->id; ?>">
 <div class="gb-scrollable-container col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="row">
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
     <div class="air air-top-left padding-10">
      <h4 class="txt-color-white font-md gb-title gb-ellipsis">
       By: <a class="">
        <?php
        echo $skill->creator->profile->firstname . " " . $skill->creator->profile->lastname
        ?>
       </a>
      </h4>
      <p class="gb-ellipsis gb-description">
       <strong class="text-info"><?php echo $skill->level->name; ?></strong>
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
     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 profile-pic">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skill->creator->profile->avatar_url; ?>" class="gb-heading-img" alt="">
     </div>
     <div class="gb-icon-nav pull-left col-lg-12 col-md-9 col-sm-9 col-xs-9 gb-padding-none">
      <ul id="" class="gb-icon-top-nav-1 row gb-nav">
       <li class="active col-lg-6 col-md-6 col-xs-12 col-lg-offset-3 col-md-offset-3">
        <a  class="gb-link" data-toggle="tab"
            data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillOverview", array('skillId' => $skill->id)); ?>"
            data-gb-target-pane-id="#gb-skill-item-tab-pane">
         <p class="gb-title gb-ellipsis">
          <strong><?php echo $skill->title; ?></strong>
          <?php echo " " . $skill->description; ?>
         </p>
        </a>
       </li>
       <li class="col-lg-1 col-sm-2 col-xs-12">
        <a  class="gb-link" data-toggle="tab"
            data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillContent", array('skillId' => $skill->id)); ?>"
            data-gb-target-pane-id="#gb-skill-item-tab-pane">
         <i class="fa fa-files-o"></i>
        </a>
       </li>
       <li class="col-lg-1 col-sm-2 col-xs-12">
        <a  class="gb-link" data-toggle="tab"
            data-gb-url="<?php echo Yii::app()->createUrl('skill/skillTab/skillContribution', array('skillId' => $skill->id)); ?>"
            data-gb-target-pane-id="#gb-skill-item-tab-pane">
         <i class="fa fa-users"></i>
        </a>
       </li>
       <li class="col-lg-1 col-sm-2 col-xs-12 gb-no-">
        <a href="#gb-skill-item-contributors-pane" data-toggle="tab"
           data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillSettings", array('skillId' => $skill->id)); ?>"
           data-gb-target-pane-id="#gb-skill-item-tab-pane">
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
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skill->creator->profile->avatar_url; ?>" class="gb-heading-img" alt="">
   </div>
   <div class="col-lg-7 gb-padding-left-1 text-left">
    <p class="gb-title">
     <a class="gb-ellipsis">
      <?php
      echo $skill->creator->profile->firstname . " " . $skill->creator->profile->lastname
      ?>
     </a>
    </p>
    <p class="gb-ellipsis gb-description">
     <strong><?php echo $skill->level->name; ?></strong>
    </p>
    <div class="gb-ellipsis gb-description">
     Created on
     <i>
      <a>
       <?php echo date_format(date_create($skill->created_date), 'M jS \a\t g:ia'); ?>
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
    <div id="gb-skill-item-tab-pane" class="row gb-tab-pane-body gb-padding-thin">
     <?php
     $this->renderPartial('skill.views.skill.tabs.skill_item_tab._skill_item_overview_pane', array(
       'skill' => $skill,
       'skillId' => $skillId,
       "skillLevelList" => $skillLevelList,
       //CONTRIBUTOR
       "contributorModel" => $contributorModel,
       "contributorTypes" => $contributorTypes,
       "skillContributors" => $skillContributors,
       "skillContributorsCount" => $skillContributorsCount,
       //COMMENT
       'commentModel' => $commentModel,
       'skillComments' => $skillComments,
       'skillCommentsCount' => $skillCommentsCount,
       //DISCUSSION
       "discussionModel" => $discussionModel,
       'skillDiscussions' => $skillDiscussions,
       'skillDiscussionsCount' => $skillDiscussionsCount,
       //NOTES
       "noteModel" => $noteModel,
       'skillNotes' => $skillNotes,
       'skillNotesCount' => $skillNotesCount,
       //TODO
       "todoModel" => $todoModel,
       "todoPriorities" => $todoPriorities,
       'skillTodos' => $skillTodos,
       'skillTodosCount' => $skillTodosCount,
       //WEBLINKS
       "weblinkModel" => $weblinkModel,
       'skillWeblinks' => $skillWeblinks,
       'skillWeblinksCount' => $skillWeblinksCount,
       //TIMELINE
       'timelineModel' => $timelineModel,
       'skillTimelineDays' => $skillTimelineDays,
       'skillTimelineDaysCount' => $skillTimelineDaysCount,
     ))
     ?>
     <br>
    </div>
   </div>
  </div>
 </div>
</div>

