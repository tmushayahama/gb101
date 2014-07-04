<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_mentorship_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_advice_pages_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var mentorshipDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array('mentorshipId' => 0)); ?>";
  var mentorshipEnrollRequestUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipEnrollRequest"); ?>";

  var addMentorshipUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorship", array()); ?>";
  var mentorshipDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array()); ?>";

  // $("#gb-topbar-heading-title").text("Skills");
</script> 
<div class="gb-background">
  <div class="container-fluid gb-no-padding">
    <div class="gb-background-dark-4 col-lg-6 col-md-6"></div> 
    <div class="gb-background-light-grey-1 col-lg-6 col-md-6"></div>
  </div>
</div>
<div class="container-fluid gb-heading-bar-1">
  <div class="container">
    <div class="gb-top-heading row">
      <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_5.png" alt="">
      <h2 class="pull-left">Mentorships</h2>
    </div>
  </div>
  <div class="gb-nav-bar-1-contaner row">
    <div class="container">
      <ul id="" class="gb-nav-1">
        <li class="active"><a href="#goal-mentorships-all-pane" data-toggle="tab">All</a></li>
        <li class=""><a href="#goal-mentorships-mentoring-pane" data-toggle="tab">Mentoring</a></li>
        <li class=""><a href="#goal-mentorships-enrolled-pane" data-toggle="tab">Enrolled</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container tab-content gb-full">
  <div class="tab-pane active row gb-full" id="goal-mentorships-all-pane">
    <div class="gb-full col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding gb-background-dark-4">
      <br>
      <ul id="gb-mentorship-all-activity-nav" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-skill-leftbar">
        <li class="active"><a href="#gb-mentorship-all-list-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Recent</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-all-requests-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Requests</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-all-favorites-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Favorites</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
      </ul>
      <br>
      <br>
      <div class="row gb-home-nav">
        <a class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
           gb-form-slide-target="#gb-mentorship-form-container"
           gb-form-target="#gb-mentorship-form">
          <div class="thumbnail">
            <div class="gb-img-container">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_5.png" alt="">
            </div>
            <div class="caption">
              <h5 class="text-center">Add<br>Mentorship</h5>
            </div>
          </div>
        </a>
        <a class="gb-form-show gb-backdrop-visible gb-advice-page-form-slide col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
           gb-form-slide-target="#gb-advice-page-form-container"
           gb-form-target="#gb-advice-page-form">
          <div class="thumbnail">
            <div class="gb-img-container">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_5.png" alt="">
            </div>
            <div class="caption">
              <h5 class="text-center">Add<br>Advice</h5>
            </div>
          </div>
        </a>
        <a class="gb-disabled-1 gb-journal-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
          <div class="thumbnail">
            <div class="gb-img-container">
              <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/daily_journal_icon_5.png" alt="">
            </div>
            <div class="caption">
              <h5 class="text-center">Add To<br>Journal</h5>
            </div>
          </div>
        </a>
      </div>
      <div id="gb-mentorship-form-container" class="gb-hide gb-panel-form">
        <?php
        echo $this->renderPartial('mentorship.views.mentorship.forms._add_mentorship_form', array(
         'formType' => GoalType::$FORM_TYPE_MENTORSHIP_HOME,
         'mentorshipModel' => $mentorshipModel,
         'mentorshipLevelList' => $mentorshipLevelList));
        ?>
      </div>
      <div id="gb-advice-page-form-container" class="gb-hide gb-panel-form">
        <?php
        echo $this->renderPartial('pages.views.pages.forms._add_advice_page_form', array(
         'formType' => GoalType::$FORM_TYPE_ADVICE_PAGE_HOME,
         'pageModel' => $pageModel,
         'advicePageModel' => $advicePageModel,
         'pageLevelList' => $pageLevelList));
        ?>
      </div>
      <br>
    </div>
    <div class="gb-full col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-background-light-grey-1 gb-no-padding">
      <br>
      <div class="row gb-hide">
        <div id="" class="input-group input-group-sm">
          <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search mentorship by anything, e.g. fighting">
          <div class="input-group-btn">
            <button id="gb-mentorship-keyword-search-btn" class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
          </div>
        </div>
      </div>
      <div class="tab-content row">
        <div class="tab-pane active" id="gb-mentorship-all-list-pane">
          <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
            <h3 class="gb-heading-2">Recent Mentorships</h3>
            <br>
            <div id="skill-posts"class="panel-body gb-background-light-grey-1">
              <?php foreach ($mentorships as $mentorship): ?>
                <?php
                echo $this->renderPartial('_mentorship_row', array(
                 "mentorship" => $mentorship,
                ));
                ?>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="gb-mentorship-all-requests-pane">
          <div class="panel panel-default">
            <h3 class="gb-heading-2">Mentorship Requests<span class="pull-right"></span></h3>
            <div class="panel-body">
              <?php foreach ($mentorshipRequests as $mentorshipRequest): ?>
                <?php
                echo $this->renderPartial('_mentorship_request_row', array(
                 "mentorshipRequest" => $mentorshipRequest,
                ));
                ?>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="gb-mentorship-all-favorites-pane">
          <div class="panel panel-default">
            <h3 class="gb-heading-2">Mentorship Favorites<span class="pull-right"></span></h3>
            <div class="panel-body">

            </div>
          </div>
        </div>
      </div>
      <div class="gb-dummy-height">

      </div>
    </div>
  </div>
  <div class="tab-pane row gb-full" id="goal-mentorships-mentoring-pane">
    <div class="gb-full col-lg-4 col-sm-12 col-xs-12 gb-no-padding gb-background-dark-4">
      <br>
      <ul id="gb-mentorship-all-activity-nav" class="gb-side-nav-1">
        <li class="active"><a href="#gb-mentorship-mentoring-all-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">All</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-mentoring-in-progress-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">In Progress</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-mentoring-completed-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Completed</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
      </ul>
    </div>
    <div class="gb-full col-lg-8 col-sm-12 col-xs-12 gb-background-light-grey-1 gb-no-padding">
      <br>
      <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
        <h3 class="gb-heading-2">My Mentoring</h3>
        <div class="panel-body gb-background-light-grey-1">
          <div id="skill-posts"class="row">
            <?php foreach ($mentoringList as $mentorship): ?>
              <?php
              echo $this->renderPartial('_mentorship_row', array(
               "mentorship" => $mentorship,
              ));
              ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane row gb-full" id="goal-mentorships-enrolled-pane">
    <div class="gb-full col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding gb-background-dark-4">
      <br>
      <ul id="gb-mentorship-all-activity-nav" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-skill-leftbar">
        <li class="active"><a href="#gb-mentorship-enrolled-in-progress-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">In Progress</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-enrolled-completed-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Completed</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        <li class=""><a href="#gb-mentorship-enrolled-archived-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Archived</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
      </ul>
    </div>
    <div class="gb-full col-lg-8 col-md-4 col-sm-8 col-xs-12 gb-background-light-grey-1 gb-no-padding">
      <br>
      <div class="panel panel-default gb-side-margin-thick gb-no-padding gb-background-light-grey-1">
        <h3 class="gb-heading-2">Mentorship Enrolled</h3>
        <div class="panel-body">

        </div>
      </div>
      <div class="gb-dummy-height">

      </div>
    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('application.views.site.modals._share_with_modal'
  , array("people" => $people,
 "modalType" => Type::$SKILL_SHARE,
 "modalId" => "gb-skill-share-with-modal"));
?>
<?php
echo $this->renderPartial('application.views.site.modals._share_with_modal'
  , array("people" => $people,
 "modalType" => Type::$MENTORSHIP_SHARE,
 "modalId" => "gb-mentorship-share-with-modal"));
?>
<?php
echo $this->renderPartial('application.views.site.modals._share_with_modal'
  , array("people" => $people,
 "modalType" => Type::$PAGE_SHARE,
 "modalId" => "gb-page-share-with-modal"));
?>
<?php
echo $this->renderPartial('mentorship.views.mentorship.modals._choose_people_modal'
  , array("people" => $people));
?>
<?php
echo $this->renderPartial('mentorship.views.mentorship.modals._send_enroll_request', array());
?>
<?php
echo $this->renderPartial('application.views.site.modals._request_sent_notification', array(
));
?>
<?php $this->endContent(); ?>