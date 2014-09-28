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
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-no-padding">
    <div class="tab-content">
      <div class="tab-pane active" id="project-management-welcome-pane">
        <div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
          <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-nav-for-background-7 row gb-no-padding">
            <li class="active col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-project-welcome-overview-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-book pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Overview & Tools</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-project-welcome-tasks-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-tasks pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Tasks</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-project-welcome-discussions-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-th-list pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Discussions</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-project-welcome-ask-answer-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-question-sign pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Ask & Answer</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-project-welcome-external-links-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-globe pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">External Links</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-project-welcome-files-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-file pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Files</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
          <div class="tab-content gb-padding-left-3">
            <div class="tab-pane active" id="gb-project-welcome-overview-pane">
              <h3 class="gb-heading-2">Project Description</h3>
              <p>
                <strong><?php echo $project->name; ?></strong>
                <?php echo $project->description; ?>
              </p>
              <br>
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
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_7.png" alt="">
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
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/goal_icon_7.png" alt="">
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
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/promise_icon_7.png" alt="">
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
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_7.png" alt="">
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
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_7.png" alt="">
                      </div>
                      <div class="caption">
                        <h5 class="text-center">Add Project<br>Advice Page</h5>
                      </div>
                    </div>
                  </a>
                  <a class="gb-disabled-1 gb-journal-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
                    <div class="thumbnail">
                      <div class="gb-img-container">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_bank_icon_7.png" alt="">
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
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/daily_journal_icon_7.png" alt="">
                      </div>
                      <div class="caption">
                        <h5 class="text-center">Create A<br>Project Journal</h5>
                      </div>
                    </div>
                  </a>
                  <a class="gb-disabled-1 gb-journal-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
                    <div class="thumbnail">
                      <div class="gb-img-container">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/just_answer_icon_7.png" alt="">
                      </div>
                      <div class="caption">
                        <h5 class="text-center">About your<br>Skills</h5>
                      </div>
                    </div>
                  </a>

                  <a class="gb-disabled-1 gb-make-template-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
                    <div class="thumbnail">
                      <div class="gb-img-container">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/more_icon_7.png" alt="">
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
                        <img src="<?php //echo Yii::app()->request->baseUrl . "/img/gb_public.png";                                                       ?>" alt="">
                        <div class="menu-heading">
                          <h4>Public</h4>
                        </div>
                      </a>
                     
                <?php //foreach ($connections as $connection): ?>
                        <a href="<?php //echo Yii::app()->createUrl("connection/connection/connection", array('connectionId' => $connection->id));                                                       ?>" class="home-menu-box-2 col-lg-12 col-sm-12 col-xs-12">
                          <img src="<?php //echo Yii::app()->request->baseUrl . "/img/" . $connection->connection_picture;                                                       ?>" alt="">
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
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/project_icon_7.png" alt="">
                      </div>
                      <div class="caption">
                        <h5 class="text-center">Create a<br>Project</h5>
                      </div>
                    </div>
                  </a>
                  <a class="gb-disabled-1 gb-make-template-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 gb-padding-thinner">
                    <div class="thumbnail">
                      <div class="gb-img-container">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/groups_icon_7.png" alt="">
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
            <div class="tab-pane" id="gb-project-welcome-tasks-pane">
              <h3 class="gb-heading-2">Tasks</h3>
            </div>
            <div class="tab-pane" id="gb-project-welcome-discussions-pane">
              <h3 class="gb-heading-2">Discussions</h3>
            </div>
            <div class="tab-pane" id="gb-project-welcome-ask-answer-pane">
              <h3 class="gb-heading-2">Ask Answer</h3>
            </div>
            <div class="tab-pane" id="gb-project-welcome-external-links-pane">
              <h3 class="gb-heading-2">External Links</h3>
            </div>
            <div class="tab-pane" id="gb-project-welcome-files-pane">
              <h3 class="gb-heading-2">Files</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="project-management-apps-pane">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gb-no-padding">
          <ul class="gb-side-nav-1 gb-nav-for-background-7 row gb-no-padding">
            <li class="active col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
              <a class="row" href="#gb-project-app-skill-pane" data-toggle="tab">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-no-padding pull-left">
                  <img class="gb-icon-2 col-lg-2 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_7.png" alt="">
                  <div class="col-lg-8 gb-no-padding"><p class="gb-ellipsis ">Skills</p></div>
                </div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
              <a class="row" href="#gb-project-app-mentorship-pane" data-toggle="tab">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-no-padding pull-left">
                  <img class="gb-icon-2 col-lg-2 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_7.png" alt="">
                  <div class="col-lg-8 gb-no-padding"><p class="gb-ellipsis ">Mentorships</p></div>
                </div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
              <a class="row" href="#gb-project-app-advice-pages-pane" data-toggle="tab">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-no-padding pull-left">
                  <img class="gb-icon-2 col-lg-2 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_7.png" alt="">
                  <div class="col-lg-8 gb-no-padding"><p class="gb-ellipsis ">Advice Pages</p></div>
                </div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
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
      <div class="tab-pane" id="project-management-timeline-pane">
        <h3 class="gb-heading-2">Timeline</h3>
      </div>
      <div class="tab-pane" id="project-management-members-pane">
        <div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
          <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-nav-for-background-7 row gb-no-padding">
            <li class="active col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-project-members-active-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-book pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Active</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-project-members-pending-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-tasks pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Pending Request</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-background-light-grey-1 ">
          <div class="tab-content gb-padding-left-3">
            <div class="tab-pane active" id="gb-project-members-active-pane">
              <div class="row gb-home-nav-2 gb-box-1">
                <a class="gb-request-trigger-btn gb-prepopulate-selected-people-list gb-form-show gb-backdrop-visible col-lg-6 col-md-6 col-sm-6 col-xs-6 gb-padding-thinner"
                   gb-type="<?php echo Type::$SOURCE_PROJECT_MEMBER_REQUESTS; ?>" 
                   gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
                   gb-target-modal="#gb-send-request-modal"
                   gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
                   gb-single-target-display=".gb-display-assign-to"
                   gb-single-target-display-input="#gb-request-form-recipient-id-input"
                   gb-source-pk-id="<?php echo $project->id; ?>" 
                   gb-data-source="<?php echo Type::$SOURCE_PROJECT_MEMBER_REQUESTS; ?>"
                   gb-form-slide-target="#gb-request-form-container"
                   gb-form-target="#gb-request-form"
                   gb-submit-prepend-to="#gb-mentee-requests"
                   gb-request-title="<?php //echo ;           ?>"
                   gb-request-title-placeholder="Member subskill">
                  <div class="thumbnail row">
                    <div class="gb-img-container pull-left">
                      <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/project_member_request_icon_7.png" alt="">
                    </div>
                    <div class="caption">
                      <h4 class="">Add Project Member(s)</h4>
                    </div>
                  </div>
                </a>
              </div>
              <div id="gb-request-form-container" class="gb-hide gb-panel-form">

              </div>
              <br>
              <h3 class="gb-heading-2">Members</h3>
              <div id="gb-project-members" class="row">
                <?php foreach ($projectMembersEnrolled as $projectMemberEnrolled): ?>
                  <?php
                  echo $this->renderPartial('project.views.project._project_member_access_badge', array(
                   "projectMemberEnrolled" => $projectMemberEnrolled));
                  ?>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="tab-pane" id="gb-project-members-pending-pane">              
              <h3 class="gb-heading-2">Pending Requests</h3>

              <?php
              echo $this->renderPartial('project.views.project._project_member_requests', array(
               "projectMemberRequests" => $projectMemberRequests,
               "project" => $project));
              ?>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 gb-no-padding hidden-sm hidden-xs">
    <div class="row gb-box-1">
      <h5 class="gb-heading-2">Other People</h5>
      <br>
    </div>
  </div>
</div>
<!-- -------------------------------MODALS --------------------------->
<?php
echo $this->renderPartial('application.views.site.modals._send_request_modal', array(
 "modalType" => Type::$REQUEST_SHARE));
?>

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

  <?php
  echo $this->renderPartial('application.views.site.forms._request_form', array(
   "requestModel" => $requestModel));
  ?>
</div>
<?php $this->endContent(); ?>