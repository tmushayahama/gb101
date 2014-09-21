<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_mentorship_detail.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_goal_home.js', CClientScript::POS_END
);
?>
<script type="text/javascript">
</script>
<div class="container-fluid gb-heading-bar-7">
  <br>
  <?php
  echo $this->renderPartial('project.views.project.management._management_header', array(
   "project" => $project));
  ?>
</div>
<br>
<div class="container gb-background-light-grey-1">
  <div class="tab-content">
    <div class="tab-pane active" id="project-management-welcome-pane">
      <div class="gb-home-left-nav col-lg-5 col-md-5 col-sm-12 col-xs-12 gb-no-padding">
        <div id="gb-primary-apps-panel" class="gb-box-1 row">
          <h3 class="gb-heading-2">
            Ist Generation Apps
            <span class="pull-right badge badge-default">3</span>
          </h3>
          <div class="row gb-home-nav">
            <a id="gb-tour-skill-1" class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
               gb-form-slide-target="#gb-skill-list-form-container"
               gb-form-target="#gb-skill-list-form">
              <div class="thumbnail">
                <div class="gb-img-container">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_7.png" alt="">
                </div>
                <div class="caption">
                  <h5 class="text-center">Add a<br>Project Skill</h5>
                </div>
              </div>
            </a>
            <a id="" class="gb-disabled-1 gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
               gb-form-slide-target="#gb-goal-list-form-container"
               gb-form-target="#gb-goal-list-form">
              <div class="thumbnail">
                <div class="gb-img-container">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon_7.png" alt="">
                </div>
                <div class="caption">
                  <h5 class="text-center">Add a<br>Project Goal</h5>
                </div>
              </div>
            </a>
            <a id="" class="gb-disabled-1 gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
               gb-form-slide-target="#gb-promise-list-form-container"
               gb-form-target="#gb-goal-list-form">
              <div class="thumbnail">
                <div class="gb-img-container">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon_7.png" alt="">
                </div>
                <div class="caption">
                  <h5 class="text-center">Add a<br>Project Promise</h5>
                </div>
              </div>
            </a>
          </div>
          <div id="gb-skill-list-form-container" class="row gb-hide gb-panel-form">

          </div>
        </div>
        <br>
        <div id="gb-secondary-apps-panel" class="gb-box-1 row">
          <h3 class="gb-heading-2">
            2nd Generation Apps
            <span class="pull-right badge badge-default">6</span>
          </h3>
          <div class="row gb-home-nav">
            <a class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
               gb-form-slide-target="#gb-mentorship-form-container"
               gb-form-target="#gb-mentorship-form">
              <div class="thumbnail">
                <div class="gb-img-container">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_7.png" alt="">
                </div>
                <div class="caption">
                  <h5 class="text-center">Create Project<br>Mentorship</h5>
                </div>
              </div>
            </a>
            <a class="gb-form-show gb-backdrop-visible gb-advice-page-form-slide col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
               gb-form-slide-target="#gb-advice-page-form-container"
               gb-form-target="#gb-advice-page-form">
              <div class="thumbnail">
                <div class="gb-img-container">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_7.png" alt="">
                </div>
                <div class="caption">
                  <h5 class="text-center">Add Project<br>Advice Page</h5>
                </div>
              </div>
            </a>
            <a class="gb-disabled-1 gb-journal-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
              <div class="thumbnail">
                <div class="gb-img-container">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_bank_icon_7.png" alt="">
                </div>
                <div class="caption">
                  <h5 class="text-center">Add to Project<br>Skill Bank</h5>
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
          <div class="row gb-home-nav">

            <a class="gb-disabled-1 gb-journal-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
              <div class="thumbnail">
                <div class="gb-img-container">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/daily_journal_icon_7.png" alt="">
                </div>
                <div class="caption">
                  <h5 class="text-center">Create A<br>Project Journal</h5>
                </div>
              </div>
            </a>
            <a class="gb-disabled-1 gb-journal-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
              <div class="thumbnail">
                <div class="gb-img-container">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/just_answer_icon_7.png" alt="">
                </div>
                <div class="caption">
                  <h5 class="text-center">About your<br>Skills</h5>
                </div>
              </div>
            </a>

            <a class="gb-disabled-1 gb-make-template-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
              <div class="thumbnail">
                <div class="gb-img-container">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/more_icon_7.png" alt="">
                </div>
                <div class="caption">
                  <h5 class="text-center"><br>See More</h5>
                </div>
              </div>
            </a>
          </div>
          <!--
          <div id="gb-connections-panel" class="panel panel-default gb-disabled">
            <h3 class="gb-heading-1"><a>
                My Connections
                <span class="pull-right badge badge-default">5</span>
              </a>
            </h3>
            <div class="panel-body gb-no-padding">
              
               <div class="row">
                <a href="" class="home-menu-box-2 col-lg-12 col-sm-12 col-xs-12">
                  <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl . "/img/gb_public.png";                                ?>" alt="">
                  <div class="menu-heading">
                    <h4>Public</h4>
                  </div>
                </a>
               
          <?php //foreach ($connections as $connection): ?>
                  <a href="<?php //echo Yii::app()->createUrl("connection/connection/connection", array('connectionId' => $connection->id));                                ?>" class="home-menu-box-2 col-lg-12 col-sm-12 col-xs-12">
                    <img href="/profile" src="<?php //echo Yii::app()->request->baseUrl . "/img/" . $connection->connection_picture;                                ?>" alt="">
                    <div class="menu-heading">
                      <h4>
          <?php //echo $connection->name ?>
                      </h4>
                    </div>
                  </a>
          <?php //endforeach; ?>
               
              </div>
            </div>
         
        </div> -->
        </div>
        <br>
        <div id="gb-tertiary-apps-panel" class="gb-box-1 row">
          <h3 class="gb-heading-2">
            3rd Generation Apps
            <span class="pull-right badge badge-default">6</span>
          </h3>
          <div class="row gb-home-nav">
            <a class="gb-form-show gb-backdrop-visible col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner"
               gb-form-slide-target="#gb-project-form-container"
               gb-form-target="#gb-project-form">
              <div class="thumbnail">
                <div class="gb-img-container">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/project_icon_7.png" alt="">
                </div>
                <div class="caption">
                  <h5 class="text-center">Create a<br>Project</h5>
                </div>
              </div>
            </a>
            <a class="gb-disabled-1 gb-make-template-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
              <div class="thumbnail">
                <div class="gb-img-container">
                  <img href="/profile" src="<?php echo Yii::app()->request->baseUrl; ?>/img/groups_icon_7.png" alt="">
                </div>
                <div class="caption">
                  <h5 class="text-center">Create a<br>Group</h5>
                </div>
              </div>
            </a>
          </div>
          <div id="gb-project-form-container" class="gb-hide gb-panel-form">
            <?php
            echo $this->renderPartial('project.views.project.forms._project_form', array(
             'projectModel' => $projectModel));
            ?>
          </div>
        </div>
        <br>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 gb-padding-left-3">
        <div class="gb-box-1 row">
          <h3 class="gb-heading-2">Project Description</h3>
          <?php echo $project->description; ?>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="project-management-apps-pane">
      <div class="col-lg-1 col-md-1 col-sm-4 col-xs-12 gb-no-padding">
        <ul class="gb-side-nav-7 gb-nav-for-background-7 row gb-no-padding">
          <li class="active col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
            <a class="row" href="#gb-project-app-skill-pane" data-toggle="tab">
              <img href="/profile" class="gb-icon-2 col-lg-4 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_7.png" alt="">
              <div class="col-lg-8 gb-no-padding"><p class="gb-ellipsis ">Skills</p></div>
            </a>
          </li>
          <li class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
            <a class="row" href="#gb-project-app-mentorship-pane" data-toggle="tab">
              <img href="/profile" class="gb-icon-2 col-lg-4 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_7.png" alt="">
              <div class="col-lg-8 gb-no-padding"><p class="gb-ellipsis ">Mentorships</p></div>
            </a>
          </li>
          <li class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
            <a class="row" href="#gb-project-app-advice-pages-pane" data-toggle="tab">
              <img href="/profile" class="gb-icon-2 col-lg-4 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_7.png" alt="">
              <div class="col-lg-8 gb-no-padding"><p class="gb-ellipsis ">Advice Page</p></div>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-lg-11 col-md-11 col-sm-8 col-xs-12 gb-no-padding">
        <div class="tab-content gb-padding-left-3">
          <div class="tab-pane active" id="gb-project-app-skill-pane">
            <h3 class="gb-heading-2">Project Skills</h3>
            <?php
            echo $this->renderPartial('project.views.project.skill._project_skill_tab', array(
             'skillModel' => $skillModel,
             'skillList' => $skillList,
             'skillListModel' => $skillListModel,
             'skillLevelList' => $skillLevelList));
            ?>
          </div>
          <div class="tab-pane" id="gb-project-app-mentorship-pane">
            <h3 class="gb-heading-2">Project Mentorships</h3>
            <?php
             echo $this->renderPartial('project.views.project.mentorship._project_mentorship_home', array(
             "mentorships" => $mentorships));
            ?>
          </div>
          <div class="tab-pane" id="gb-project-app-advice-pages-pane">
            <h3 class="gb-heading-2">Project Advice Pages</h3>
             <?php
             echo $this->renderPartial('project.views.project.advice_page._project_advice_pages_home', array(
             "advicePages" => $advicePages));
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="project-management-activities-pane">
      <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
        <br>
        <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <li class="active"><a href="#gb-project-management-announcement-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Announcements</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-project-management-activities-todos-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">To Dos</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-project-management-activities-discussion-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Discussion</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-project-management-activities-ask-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Ask & Answer</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class=""><a href="#gb-project-management-activities-weblinks-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">External Links</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
          <li class="gb-disabled-1"><a href="#gb-skill-activity-files-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-left">Files</p><i class="glyphicon glyphicon-chevron-right pull-right"></i></a></li>
        </ul>

      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-no-padding">
        <br>
        <h3 class="gb-heading-2">Activities</h3>
      </div>
    </div>
    <div class="tab-pane" id="project-management-members-pane">
      <div class="gb-home-left-nav col-lg-4 col-md-4 col-sm-4 col-xs-12 gb-no-padding">
        <br>

      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 gb-no-padding gb-background-light-grey-1 ">
        <br>
        <h3 class="gb-heading-2">Members</h3>
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->


<!--- ----------------------------HIDDEN THINGS ------------------------->
<div id="gb-forms-home" class="gb-hide">
  <?php
  echo $this->renderPartial('project.views.project.forms._project_skill_list_form', array(
   'formType' => GoalType::$FORM_TYPE_SKILL_HOME,
   'project' => $project,
   'skillModel' => $skillModel,
   'skillListModel' => $skillListModel,
   'skillLevelList' => $skillLevelList));
  ?>
</div>
<?php $this->endContent(); ?>