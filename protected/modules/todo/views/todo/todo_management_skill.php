<?php $this->beginContent('//layouts/gb_main1'); ?>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss_themes/ss_theme_3.css" type="text/css" rel="stylesheet"/>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_todo_management.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
?>
<script  type="text/javascript">
  var addNewDiscussionUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/addNewDiscussionPost", array('todoId' => $todoParent->todo_id)); ?>";
  var getDiscussionPostsUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/getDiscussionPosts", array('todoId' => $todoParent->todo_id)); ?>";
  var discussionReplyUrl = "<?php echo Yii::app()->createUrl("discussion/discussion/discussionReply", array('todoId' => $todoParent->todo_id)); ?>";
  var addTodoWeblinkUrl = "<?php echo Yii::app()->createUrl("site/addTodoWeblink", array('todoId' => $todoParent->todo_id)); ?>";

</script>
<div class="container-fluid gb-heading-bar">
  <br>
  <div class="container">
    <div class="gb-top-heading row">
      <h2 class="gb-ellipsis">Todo Management - Skill</h2>
      <ul id="" class="row gb-nav-1">
        <li class="active col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-no-padding">
          <a href="#todo-management-welcome-pane" data-toggle="tab">
            <p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding pull-left gb-ellipsis"><?php echo $todoParent->todo->description; ?></p>
          </a>
        </li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
          <a href="#todo-management-apps-pane" gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoApps", array('todoListId' => $todoParent->id)); ?>" data-toggle="tab">
            <p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Todo Apps</p>
          </a>
        </li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
          <a href="#todo-management-timeline-pane" gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoTimeline", array('todoListId' => $todoParent->id)); ?>" data-toggle="tab">
            <p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left gb-ellipsis">Timeline</p>
          </a></li>
        <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
          <a href="#todo-management-contributors-pane" gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoContributors", array('todoListId' => $todoParent->id)); ?>" data-toggle="tab">
            <p class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-ellipsis">Contributors</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
<br>
<div class="container gb-background-light-grey-1">
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-no-padding">
    <div class="tab-content">
      <!------------------STODO MANAGEMENT PANE --------------------->
      <div class="tab-pane active" id="todo-management-welcome-pane">
        <div class="row gb-tab-pane-body">
          <?php
          $this->renderPartial('todo.views.todo.welcome_tab._todo_welcome_pane', array(
           "todoParent" => $todoParent,
           "todoListChildren" => $todoListChildren,
           "todoListChildrenCount" => $todoListChildrenCount,
            // "todoOverviewQuestionnaires" => $todoOverviewQuestionnaires
          ));
          ?>
        </div>
      </div>

      <!---------------SKILL MANAGEMENT APPS -------------->
      <div class="tab-pane" id="todo-management-apps-pane">
        <div class="row gb-tab-pane-body"></div>
      </div>

      <!---------------SKILL MANAGEMENT TIMELINE -------------->
      <div class="tab-pane" id="todo-management-timeline-pane">
        <div class="row gb-tab-pane-body"></div>
      </div>

      <!---------------SKILL MANAGEMENT CONTRIBUTORS -------------->
      <div class="tab-pane" id="todo-management-contributors-pane">
        <div class="row gb-home-nav-2 gb-box-1">
          <a class="gb-request-trigger-btn gb-prepopulate-selected-people-list gb-form-show gb-backdrop-visible col-lg-6 col-md-6 col-sm-6 col-xs-6"
             gb-type="<?php echo Type::$SOURCE_JUDGE_REQUESTS; ?>" 
             gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
             gb-target-modal="#gb-send-request-modal"
             gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
             gb-single-target-display=".gb-display-assign-to"
             gb-single-target-display-input="#gb-request-form-recipient-id-input"
             gb-source-pk-id="<?php echo $todoParent->id; ?>" 
             gb-data-source="<?php echo Type::$SOURCE_JUDGE_REQUESTS; ?>"
             gb-form-slide-target="#gb-todo-contributor-request-form-container"
             gb-form-target="#gb-request-form"
             gb-submit-prepend-to="#gb-todo-judges"
             gb-request-title="<?php echo "Todo Observer" ?>"
             gb-request-title-placeholder="Mentorship subtodo">
            <div class="thumbnail row">
              <div class="gb-img-container pull-left">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/todo_icon_2.png" alt="">
              </div>
              <div class="caption">
                <h4 class="">Request Judge(s)</h4>
              </div>
            </div>
          </a>
          <a class="gb-request-trigger-btn gb-prepopulate-selected-people-list gb-form-show gb-backdrop-visible col-lg-6 col-md-6 col-sm-6 col-xs-6"
             gb-type="<?php echo Type::$SOURCE_OBSERVER_REQUESTS; ?>" 
             gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
             gb-target-modal="#gb-send-request-modal"
             gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
             gb-single-target-display=".gb-display-assign-to"
             gb-single-target-display-input="#gb-request-form-recipient-id-input"
             gb-source-pk-id="<?php echo $todoParent->id; ?>" 
             gb-data-source="<?php echo Type::$SOURCE_JUDGE_REQUESTS; ?>"
             gb-form-slide-target="#gb-todo-contributor-request-form-container"
             gb-form-target="#gb-request-form"
             gb-submit-prepend-to="#gb-todo-observers"
             gb-request-title="<?php echo "Todo Observer" ?>"
             gb-request-title-placeholder="Mentorship subtodo">
            <div class="thumbnail row">
              <div class="gb-img-container pull-left">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/todo_icon_2.png" alt="">
              </div>
              <div class="caption">
                <h4 class="">Request Observer(s)</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="row gb-tab-pane-body"></div>
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

echo $this->renderPartial('checklist.views.checklist.modals._checklist_modal', array(
));
?>

<!-- ------------------------------- HIDDEN THINGS --------------------------->

<div id="gb-forms-home" class="gb-hide">
  <?php
  $this->renderPartial('todo.views.todo.forms._todo_checklist_form', array(
   "checklistModel" => $checklistModel,
   "todoId" => $todoParent->id,
  ));

  $this->renderPartial('application.views.site.forms.comment._comment_form', array(
   "commentModel" => $commentModel
  ));
  $this->renderPartial('application.views.site.forms.note._note_form', array(
   "noteModel" => $noteModel
  ));
  $this->renderPartial('application.views.site.forms.weblink._weblink_form', array(
   "weblinkModel" => $weblinkModel
  ));

  $this->renderPartial('todo.views.todo.forms._todo_form', array(
   "todoModel" => $todoModel,
   "todoPriorities" => $todoPriorities,
   "todoId" => $todoParent->id,
  ));
  ?>

  <?php
  echo $this->renderPartial('application.views.site.forms._request_form', array(
   "requestModel" => $requestModel));
  ?>
</div>
<?php $this->endContent(); ?>