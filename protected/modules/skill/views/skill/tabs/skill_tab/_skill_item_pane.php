<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
?>
<?php ?>
<!-- Sidebar -->
<div class="nav-container col-lg-2 col-md-3 col-sm-4 col-xs-12 ">
 <div class="gb-nav-parent" id="gb-left-nav-3" role="navigation">
  <div class="gb-nav-strip row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
    <div id="myCarousel" class="carousel slide profile-carousel" data-ride="carousel">
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
  </div>
  <div class="row">
   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skill->creator->profile->avatar_url; ?>" class="gb-heading-img" alt="">
   </div>
   <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
    <a class="gb-link gb-ellipsis"
       data-gb-link-type="redirects"
       data-gb-url="<?php echo Yii::app()->createUrl("user/profile/profile/", array('userId' => $skill->creator->profile->user_id)); ?>">
        <?php
        echo 'By: ' . $skill->creator->profile->firstname . " " . $skill->creator->profile->lastname
        ?>
    </a>
    <div class="row">
     <a class="btn btn-xs btn-default col-lg-6 col-md-6 col-sm-6 col-xs-6 gb-padding-thin" data-toggle="dropdown" aria-expanded="false">
      <i class="fa fa-star"></i> Subscribe
     </a>
     <a class="btn btn-xs btn-primary col-lg-6 col-md-6 col-sm-6 col-xs-6 gb-padding-thin"
        gb-purpose="gb-expandables-modal-trigger"
        data-gb-modal-target="#gb-contribute-modal">
      <i class="fa fa-user-plus"></i> Contribute
     </a>
    </div>
   </div>
  </div>
  <div class="gb-nav-strip row">
   <h6 class="gb-heading gb-ellipsis">
    <?php echo $skill->title; ?>
   </h6>
   <?php
   $this->renderPartial('application.views.site.app._app_item_detail_tab', array(
     "active" => "",
     "title" => "Overview",
     "targetPaneId" => "#gb-skill-item-tab-pane",
     "url" => Yii::app()->createUrl("skill/skillTab/skillOverview", array('skillId' => $skill->id)),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_goal.png"
   ));
   ?>
   <h6 class="gb-heading gb-ellipsis">
    Content
   </h6>
   <?php
   $this->renderPartial('application.views.site.app._app_item_detail_tab', array(
     "active" => "",
     "title" => "Todos",
     "targetPaneId" => "#gb-skill-item-tab-pane",
     "url" => Yii::app()->createUrl("skill/skillTab/skillTodos", array('skillId' => $skill->id)),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/community_icon_0.png"
   ));
   ?>
   <?php
   $this->renderPartial('application.views.site.app._app_item_detail_tab', array(
     "active" => "",
     "title" => "Notes",
     "targetPaneId" => "#gb-skill-item-tab-pane",
     "url" => Yii::app()->createUrl("skill/skillTab/skillNotes", array('skillId' => $skill->id)),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/community_icon_0.png"
   ));
   ?>
   <?php
   $this->renderPartial('application.views.site.app._app_item_detail_tab', array(
     "active" => "",
     "title" => "Weblinks",
     "targetPaneId" => "#gb-skill-item-tab-pane",
     "url" => Yii::app()->createUrl("skill/skillTab/skillWeblinks", array('skillId' => $skill->id)),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/community_icon_0.png"
   ));
   ?>
   <h6 class="gb-heading gb-ellipsis">
    Community
   </h6>
   <?php
   $this->renderPartial('application.views.site.app._app_item_detail_tab', array("appTabId" => "gb-tab-skills",
     "active" => "",
     "title" => "Contributors",
     "targetPaneId" => "#gb-skill-item-tab-pane",
     "url" => Yii::app()->createUrl('skill/skillTab/skillContributors', array('skillId' => $skill->id)),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_skill.png"
   ));
   ?>
   <?php
   $this->renderPartial('application.views.site.app._app_item_detail_tab', array("appTabId" => "gb-tab-skills",
     "active" => "",
     "title" => "Comments",
     "targetPaneId" => "#gb-skill-item-tab-pane",
     "url" => Yii::app()->createUrl('skill/skillTab/skillComments', array('skillId' => $skill->id)),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_skill.png"
   ));
   ?>
   <?php
   $this->renderPartial('application.views.site.app._app_item_detail_tab', array("appTabId" => "gb-tab-skills",
     "active" => "",
     "title" => "Discusssions",
     "targetPaneId" => "#gb-skill-item-tab-pane",
     "url" => Yii::app()->createUrl('skill/skillTab/skillDiscussions', array('skillId' => $skill->id)),
     "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/apps/gb_skill.png"
   ));
   ?>
  </div>
  <div class="gb-dummy-height"></div>
 </div>
</div>
<div class="nav-container col-lg-10 col-md-9 col-sm-8">
 <div id="gb-screen-height" class="container">
  <div class="nav-container gb-skill-item row gb-app-detail col-lg-8 col-md-9 col-sm-8 col-xs-12" gb-source="<?php echo Type::$SOURCE_SKILL; ?>"
       data-gb-source-pk="<?php echo $skill->id; ?>">
   <div id="gb-middle-nav-3" class="gb-nav-parent">
    <div id="" class="gb-top-nav-1 gb-nav row">
     <div class="gb-title col-lg-10 col-md-9 col-sm-9 col-xs-9">
      <p class="gb-ellipsis">
       <strong><?php echo $skill->title; ?></strong>
       <?php echo " " . $skill->description; ?>
      </p>
     </div>
     <div class="gb-action col-lg-2 col-md-3 col-sm-3 col-xs-3">
      <div class="btn-group pull-right">
       <a class="btn btn-link" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-star"></i>
       </a>
       <a class="btn btn-link"
          gb-purpose="gb-expandables-modal-trigger"
          data-gb-modal-target="#gb-contribute-modal">
        <i class="fa fa-user-plus"></i>
       </a>
      </div>
     </div>
    </div>
    <div class="gb-scrollable-container col-lg-12 col-md-12 col-sm-12 col-xs-12">
     <a class='gb-hide gb-close-right-nav'>
      <i class='fa fa-times'></i> close
     </a>
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
          //MENTORSHIP
          "mentorshipSkills" => $mentorshipSkills,
          "mentorshipSkillsCount" => $mentorshipSkillsCount,
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
   <!-- ------------------------------- MODALS --------------------------->

   <?php
   echo $this->renderPartial('skill.views.skill.modals._skill_contribute_modal'
     , array(
     "skill" => $skill,
     "mentorshipSkillModel" => $mentorshipSkillModel,
     "mentorshipLevelList" => $mentorshipLevelList));
   ?>
  </div>
 </div>
</div>
<!-- /#wrapper -->
<?php $this->endContent(); ?>