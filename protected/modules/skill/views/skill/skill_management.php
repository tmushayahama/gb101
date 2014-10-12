<?php $this->beginContent('//layouts/gb_main1'); ?>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_skill_management.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var addNewDiscussionUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/addNewDiscussionPost", array('skillId' => $skillListItem->skill_id)); ?>";
  var getDiscussionPostsUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/getDiscussionPosts", array('skillId' => $skillListItem->skill_id)); ?>";
  var discussionReplyUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/discussionReply", array('skillId' => $skillListItem->skill_id)); ?>";
  var addSkillWeblinkUrl = "<?php echo Yii::app()->createUrl("site/addSkillWeblink", array('skillId' => $skillListItem->skill_id)); ?>";
</script>

<div class="container-fluid gb-heading-bar-2">
  <br>
  <div class="container">
    <div class="gb-top-heading row">
      <h2 class="gb-ellipsis">Skill Management</h2>
      <ul id="" class="row gb-nav-1">
        <li class="active col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-no-padding"><a href="#skill-management-welcome-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding pull-left gb-ellipsis"><?php echo $skillListItem->skill->title; ?></p></a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="#skill-management-apps-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Skill Apps</p></a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="#skill-management-timeline-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Timeline</p></a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="#skill-management-contributors-pane" data-toggle="tab"><p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-ellipsis">Contributors</p></a></li>
      </ul>
    </div>
  </div>
</div>
<br>
<div class="container gb-background-light-grey-1">
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-no-padding">
    <div class="tab-content">
      <div class="tab-pane active" id="skill-management-welcome-pane">
        <div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
          <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-nav-for-background-2 row gb-no-padding">
            <li class="active col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-skill-welcome-overview-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-book pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Overview & Tools</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-skill-welcome-todos-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-tasks pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Skill Todo List</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-skill-welcome-discussions-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-th-list pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Discussions</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-skill-welcome-ask-answer-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-question-sign pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Ask & Answer</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-skill-welcome-external-links-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-globe pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">External Links</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12">
              <a class="row" href="#gb-skill-welcome-files-pane" data-toggle="tab">
                <i class="glyphicon glyphicon-file pull-left"></i> 
                <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Files</p></div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
          <div class="tab-content gb-padding-left-3">
            <div class="tab-pane active" id="gb-skill-welcome-overview-pane">
              <h3 class="gb-heading-2">Skill Details</h3>
              <p>
                <strong><?php echo $skillListItem->skill->title; ?></strong>
                <?php echo $skillListItem->skill->description; ?>
              </p>
              <br>
            </div>
            <div class="tab-pane" id="gb-skill-welcome-todos-pane">
              <h3 class="gb-heading-2">Skill Todo List
                <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
                   gb-form-slide-target="#gb-skill-todo-form-container"
                   gb-form-target="#gb-skill-todo-form"
                   gb-form-heading="Create Skill Todo List">
                  <i class="glyphicon glyphicon-plus"></i>
                  Add
                </a>
              </h3>
              <div id="gb-skill-todo-form-container" class="row gb-panel-form gb-hide">

              </div>
              <div id="gb-todos">
                <?php
                if (count($skillTodoParentList) == 0):
                  ?>
                  <h5 class="text-center text-warning gb-no-information row">
                    no todo(s) added.
                  </h5>
                <?php endif; ?>

                <?php foreach ($skillTodoParentList as $skillTodoParent): ?>
                  <?php
                  $this->renderPartial('skill.views.skill.activity._skill_todo_parent_list_item', array(
                   "skillTodoParent" => $skillTodoParent)
                  );
                  ?>
                <?php endforeach; ?>    
              </div>
            </div>
            <div class="tab-pane" id="gb-skill-welcome-discussions-pane">
              <h3 class="gb-heading-2">Discussions
                <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
                   gb-form-slide-target="#gb-skill-discussion-title-form-container"
                   gb-form-target="#gb-skill-discussion-title-form">
                  <i class="glyphicon glyphicon-plus"></i>
                  Add
                </a>
              </h3>
              <div id="gb-skill-discussion-title-form-container" class="row gb-panel-form gb-hide">
                <?php
                echo $this->renderPartial('skill.views.skill.forms._skill_discussion_title_form', array(
                 "discussionTitleModel" => $discussionTitleModel,
                 "skillId" => $skill->id,
                ));
                ?>
              </div>
              <?php $skillDiscussionTitles = SkillDiscussionTitle::getDiscussionTitles($skill->id, 5); ?>
              <div id="gb-discussion-titles"  class="row">
                <?php if (count($skillDiscussionTitles) == 0): ?>
                  <h5 class="text-center text-warning gb-no-information row">
                    no discussion(s) added.
                  </h5>
                <?php endif; ?>
                <?php foreach ($skillDiscussionTitles as $skillDiscussionTitle): ?>
                  <?php
                  $this->renderPartial('discussion.views.discussion._discussion_title', array(
                   'discussionTitle' => $skillDiscussionTitle->discussionTitle,
                   "skillId" => $skill->id));
                  ?>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="tab-pane" id="gb-skill-welcome-ask-answer-pane">
              <h3 class="gb-heading-2">Ask Answer    
                <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
                   gb-form-slide-target="#gb-ask-question-form-container"
                   gb-form-target="#gb-ask-question-form">
                  <i class="glyphicon glyphicon-plus"></i>
                  Add
                </a>
              </h3>
              <div class="row">
                <div id="gb-ask-question-form-container" class="row gb-panel-form gb-hide">
                  <?php
                  $this->renderPartial('skill.views.skill.forms._skill_ask_question_form', array(
                   'formType' => SkillType::$FORM_TYPE_MENTORSHIP_MENTORSHIP,
                   "questionModel" => $questionModel,
                   'skillId' => $skill->id
                  ));
                  ?>
                </div>
                <?php $skillQuestions = SkillQuestion::getSkillQuestions($skill->id); ?>
                <div id="gb-questions" class="row">
                  <?php if (count($skillQuestions) == 0): ?>
                    <h5 class="text-center text-warning gb-no-information row">
                      no question(s) added.
                    </h5>
                  <?php endif; ?>
                  <?php foreach ($skillQuestions as $skillQuestion): ?>
                    <?php
                    $this->renderPartial('skill.views.skill.activity._skill_ask_question_list_item', array(
                     'skillQuestion' => $skillQuestion,
                     'skillId' => $skill->id,
                    ));
                    ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="gb-skill-welcome-external-links-pane">
              <h3 class="gb-heading-2">External Links
                <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
                   gb-form-slide-target="#gb-skill-weblink-form-container"
                   gb-form-target="#gb-skill-weblink-form">
                  <i class="glyphicon glyphicon-plus"></i>
                  Add
                </a>
              </h3>
              <div class="panel-body gb-padding-thin">
                <div id="gb-skill-weblink-form-container" class="row gb-panel-form gb-hide">
                  <?php
                  echo $this->renderPartial('skill.views.skill.forms._skill_weblink_form', array(
                   'weblinkModel' => $weblinkModel,
                   "skillId" => $skill->id,
                  ));
                  ?>
                </div>
                <?php $skillWeblinks = SkillWeblink::getSkillWeblinks($skill->id, true); ?>
                <div id="gb-weblinks" class="row">
                  <?php if (count($skillWeblinks) == 0): ?>
                    <h5 class="text-center text-warning gb-no-information row">
                      no external link(s) added.
                    </h5>
                  <?php endif; ?>
                  <?php foreach ($skillWeblinks as $skillWeblink): ?>
                    <?php
                    echo $this->renderPartial('skill.views.skill.activity._skill_weblink_list_item', array(
                     'skillWeblinkModel' => $skillWeblink));
                    ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="gb-skill-welcome-files-pane">
              <h3 class="gb-heading-2">Files</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="skill-management-apps-pane">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gb-no-padding">
          <ul class="gb-side-nav-1 gb-nav-for-background-2 row gb-no-padding">
            <li class="active col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
              <a class="row" href="#gb-skill-app-skill-pane" data-toggle="tab">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-no-padding pull-left">
                  <img class="gb-icon-2 col-lg-2 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_2.png" alt="">
                  <div class="col-lg-8 gb-no-padding"><p class="gb-ellipsis ">Sub Skills</p></div>
                </div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
              <a class="row" href="#gb-skill-app-mentorship-pane" data-toggle="tab">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-no-padding pull-left">
                  <img class="gb-icon-2 col-lg-2 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_2.png" alt="">
                  <div class="col-lg-8 gb-no-padding"><p class="gb-ellipsis ">Skills</p></div>
                </div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
            <li class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
              <a class="row" href="#gb-skill-app-advice-pages-pane" data-toggle="tab">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-no-padding pull-left">
                  <img class="gb-icon-2 col-lg-2 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_2.png" alt="">
                  <div class="col-lg-8 gb-no-padding"><p class="gb-ellipsis ">Advice Pages</p></div>
                </div>
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 gb-no-padding">
          <div class="tab-content gb-padding-left-3">
            <div class="tab-pane active" id="gb-skill-app-skill-pane">
              <h3 class="gb-heading-2">Skills</h3>

            </div>
            <div class="tab-pane" id="gb-skill-app-mentorship-pane">
              <h3 class="gb-heading-2">Skill Skills</h3>

            </div>
            <div class="tab-pane" id="gb-skill-app-advice-pages-pane">
              <h3 class="gb-heading-2">Skill Advice Pages</h3>

            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="skill-management-timeline-pane">
        <h3 class="gb-heading-2">Timeline</h3>
      </div>
      <div class="tab-pane" id="skill-management-contributors-pane">
        <div class="row gb-home-nav-2 gb-box-1">
          <a class="gb-request-trigger-btn gb-prepopulate-selected-people-list gb-form-show gb-backdrop-visible col-lg-6 col-md-6 col-sm-6 col-xs-6"
             gb-type="<?php echo Type::$SOURCE_JUDGE_REQUESTS; ?>" 
             gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
             gb-target-modal="#gb-send-request-modal"
             gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
             gb-single-target-display=".gb-display-assign-to"
             gb-single-target-display-input="#gb-request-form-recipient-id-input"
             gb-source-pk-id="<?php echo $skillListItem->id; ?>" 
             gb-data-source="<?php echo Type::$SOURCE_JUDGE_REQUESTS; ?>"
             gb-form-slide-target="#gb-skill-judges-request-form-container"
             gb-form-target="#gb-request-form"
             gb-submit-prepend-to="#gb-skill-judges"
             gb-request-title="<?php echo "Skill Observer" ?>"
             gb-request-title-placeholder="Mentorship subskill">
            <div class="thumbnail row">
              <div class="gb-img-container pull-left">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_2.png" alt="">
              </div>
              <div class="caption">
                <h4 class="">Request Observers</h4>
              </div>
            </div>
          </a>
          <a class="gb-request-trigger-btn gb-prepopulate-selected-people-list gb-form-show gb-backdrop-visible col-lg-6 col-md-6 col-sm-6 col-xs-6"
             gb-type="<?php echo Type::$SOURCE_JUDGE_REQUESTS; ?>" 
             gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
             gb-target-modal="#gb-send-request-modal"
             gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
             gb-single-target-display=".gb-display-assign-to"
             gb-single-target-display-input="#gb-request-form-recipient-id-input"
             gb-source-pk-id="<?php echo $skillListItem->id; ?>" 
             gb-data-source="<?php echo Type::$SOURCE_JUDGE_REQUESTS; ?>"
             gb-form-slide-target="#gb-skill-judges-request-form-container"
             gb-form-target="#gb-request-form"
             gb-submit-prepend-to="#gb-skill-judges"
             gb-request-title="<?php echo "Skill Observer" ?>"
             gb-request-title-placeholder="Mentorship subskill">
            <div class="thumbnail row">
              <div class="gb-img-container pull-left">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/skill_icon_2.png" alt="">
              </div>
              <div class="caption">
                <h4 class="">Request Judge(s)</h4>
              </div>
            </div>
          </a>
        </div>
        <div id="gb-skill-judges-request-form-container" class="row gb-panel-form gb-hide">

        </div>
        <br>
        <div class="row">
          <div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
            <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-nav-for-background-2 row gb-no-padding">
              <li class="active col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a class="row" href="#gb-skill-contributors-pending-pane" data-toggle="tab">
                  <i class="glyphicon glyphicon-question-sign pull-left"></i> 
                  <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Pending Requests</p></div>
                  <i class="glyphicon glyphicon-chevron-right pull-right"></i>
                </a>
              </li>
              <?php foreach ($skillJudges as $skillJudge): ?>
                <li class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
                  <a class="row" href="<?php echo "#gb-skill-judge-pane-" . $skillJudge->judge_id; ?>" data-toggle="tab">
                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-no-padding pull-left">
                      <img class="gb-icon-2 col-lg-2 gb-no-padding" src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $skillJudge->judge->profile->avatar_url; ?>" alt="">
                      <div class="col-lg-9 gb-no-padding"><p class="gb-ellipsis "><?php echo $skillJudge->judge->profile->firstname . " " . $skillJudge->judge->profile->lastname; ?></p></div>
                    </div>
                    <i class="glyphicon glyphicon-chevron-right pull-right"></i>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="tab-content gb-padding-left-3">
              <div class="tab-pane active" id="gb-skill-contributors-pending-pane">
                <h3 class="gb-heading-2">Pending Requests</h3>
                <div id="gb-skill-judges">
                  <?php
                  echo $this->renderPartial('skill.views.skill._skill_judge_requests', array(
                   "skillJudgeRequests" => $skillJudgeRequests,
                   "skillListItem" => $skillListItem));
                  ?>
                </div>
              </div>
              <?php foreach ($skillJudges as $skillJudge): ?>
                <div class="tab-pane" id="<?php echo "gb-skill-judge-pane-" . $skillJudge->judge_id; ?>">
                  <h3 class="gb-heading-2">
                    <div class="col-lg-5 gb-no-padding"><p class="gb-ellipsis "><?php echo $skillJudge->judge->profile->firstname . " " . $skillJudge->judge->profile->lastname; ?></p></div>
                  </h3>
                </div>
              <?php endforeach; ?>

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

<!-- ------------------------------- MODALS --------------------------->

<?php
echo $this->renderPartial('application.views.site.modals._send_request_modal', array(
 "modalType" => Type::$REQUEST_SHARE));
?>

<!-- ------------------------------- HIDDEN THINGS --------------------------->

<div id="gb-forms-home" class="gb-hide">
  <?php
  $this->renderPartial('skill.views.skill.forms._skill_todo_form', array(
   "todoModel" => $todoModel,
   "skillTodoPriorities" => $skillTodoPriorities,
   "skillId" => $skill->id,
  ));
  ?>

  <?php
  echo $this->renderPartial('application.views.site.forms._request_form', array(
   "requestModel" => $requestModel));
  ?>
</div>
<?php $this->endContent(); ?>