<?php $this->beginContent('//layouts/gb_main1'); ?>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss_themes/ss_greenish.css" type="text/css" rel="stylesheet"/>
<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_todo_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_search.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_todo_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_mentorship_home.js', CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
  Yii::app()->baseUrl . '/js/gb_advice_pages_home.js', CClientScript::POS_END
);
?>
<script id="record-task-url" type="text/javascript">
  var addTodoListUrl = "<?php echo Yii::app()->createUrl("todo/todo/addtodolist", array('connectionId' => 0, 'source' => "todo", 'type' => TodoList::$TYPE_SKILL)); ?>";
  var editTodoListUrl = "<?php echo Yii::app()->createUrl("todo/todo/edittodolist", array('connectionId' => 0, 'source' => "home", 'type' => TodoList::$TYPE_SKILL)); ?>";
  var addPromiseListUrl = "<?php echo Yii::app()->createUrl("site/addtodolist", array('connectionId' => 0, 'source' => "todo", 'type' => TodoList::$TYPE_PROMISE)); ?>";
  var recordTodoCommitmentUrl = "<?php echo Yii::app()->createUrl("site/recordtodocommitment", array('connectionId' => 0, 'source' => 'todo')); ?>"
  var sendMonitorRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmonitorrequest"); ?>";
  var sendMentorshipRequestUrl = "<?php echo Yii::app()->createUrl("site/sendmentorshiprequest"); ?>";
  var acceptRequestUrl = "<?php echo Yii::app()->createUrl("site/acceptrequest"); ?>";
  var mentorshipRequestUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipRequest"); ?>";
  var appendMoreTodoUrl = "<?php echo Yii::app()->createUrl("todo/todo/appendMoreTodo"); ?>";

  var addAdvicePageUrl = "<?php echo Yii::app()->createUrl("pages/pages/addAdvicePage", array()); ?>";
  var advicePageDetailUrl = "<?php echo Yii::app()->createUrl("pages/pages/advicePageDetail", array()); ?>";


  var addMentorshipUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/addMentorship", array()); ?>";
  var mentorshipDetailUrl = "<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array()); ?>";

  // $("#gb-topbar-heading-title").text("Todos");
</script>
<div class="gb-background hidden-sm hidden-xs">
  <div class="container-fluid gb-no-padding">
    <div class="gb-background-dark col-lg-6 col-md-6 col-sm-6"></div> 
    <div class="gb-background-light-grey-1 col-lg-6 col-md-6 col-sm-6"></div>
  </div>
</div>
<div class="container">
  <div class="tab-content">
    <div class="tab-pane active" id="todo-all-pane">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-home-left-nav gb-no-padding gb-background-dark">
        <br>
        <div class="gb-top-heading row">
          <h1 class="">Todos</h1>
        </div>

        <br>
        <h3 class="gb-heading-1 gb-hide">
          <a id="gb-start-tour-btn" class="btn btn-link" data-toggle="collapse" data-parent="#gb-getting-started" href="#collapseOne">
            Tour: <strong>My Todos Page</strong>
          </a>
        </h3>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 gb-no-padding gb-background-light-grey-1">
        <br>
        <div class="row gb-home-nav-2 gb-box-1">
          <a class="gb-form-show gb-backdrop-visible col-lg-6 col-md-6 col-sm-6 col-xs-6 gb-padding-thinner"
             gb-form-slide-target="#gb-todo-list-form-container"
             gb-form-target="#gb-todo-list-form">
            <div class="thumbnail row">
              <div class="gb-img-container pull-left">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/todo_icon_2.png" alt="">
              </div>
              <div class="caption">
                <h4 class="">Add a Todo</h4>
              </div>
            </div>
          </a>
          <a class="gb-request-trigger-btn gb-prepopulate-selected-people-list gb-form-show gb-backdrop-visible col-lg-6 col-md-6 col-sm-6 col-xs-6 gb-padding-thinner"
             gb-type="<?php echo Type::$SOURCE_SKILL_ASSIGN_REQUESTS; ?>" 
             gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
             gb-target-modal="#gb-send-request-modal"
             gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
             gb-single-target-display=".gb-display-assign-to"
             gb-single-target-display-input="#gb-request-form-recipient-id-input"
             gb-source-pk-id="<?php //echo $mentorship->id;      ?>" 
             gb-data-source="<?php echo Type::$SOURCE_SKILL_ASSIGN_REQUESTS; ?>"
             gb-form-slide-target="#gb-request-form-container"
             gb-form-target="#gb-request-form"
             gb-submit-prepend-to="#gb-assignment-requests"
             gb-request-title="<?php //echo $mentorship->todoList->todo->title;      ?>"
             gb-request-title-placeholder="Mentorship subtodo">
            <div class="thumbnail row">
              <div class="gb-img-container pull-left">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/todo_icon_2.png" alt="">
              </div>
              <div class="caption">
                <h4 class="">Assign a Todo</h4>
              </div>
            </div>
          </a>
        </div>
        <div id="gb-request-form-container" class="gb-hide gb-panel-form">

        </div>

        <div id="gb-todo-list-form-container" class="row gb-hide gb-panel-form">
          <?php
          echo $this->renderPartial('todo.views.todo.forms._add_todo_list_form', array(
           'formType' => TodoType::$FORM_TYPE_SKILL_HOME,
           'todoModel' => $todoModel,
           'todoListModel' => $todoListModel,
           'todoLevelList' => $todoLevelList));
          ?>
        </div>
        <br>
        <div class="row">
          <ul id="" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-todo-leftbar">
            <li class="active col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-todos-all-pane" data-toggle="tab"><p class="text-right col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">All Todos</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-my-todos-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">My Todos</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
          </ul>
        </div>
        <br>
        <div class="tab-content row gb-padding-left-3 gb-background-light-grey-1">
          <div class="tab-pane active" id="gb-todos-all-pane">
            <h3 class="gb-heading-2">Recent Todos</h3>
            <div id="gb-posts"class="panel-body gb-no-padding">
              <?php
              $count = 1;
              foreach ($todoList as $todoListItem):
                echo $this->renderPartial('_todo_list_post_row', array(
                 'todoListItem' => $todoListItem,
                 'source' => TodoList::$SOURCE_SKILL));
              endforeach;
              ?>
            </div>
          </div>
          <div class="tab-pane" id="gb-my-todos-pane">
            <h3 class="gb-heading-2">My Todos</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->
<?php
$this->renderPartial('todo.views.todo.modals._todo_request_contribute_modal', array(
));

echo $this->renderPartial('application.views.site.modals._send_request_modal', array(
 "modalType" => Type::$REQUEST_SHARE));
?>

<?php
echo $this->renderPartial('todo.views.todo.modals.todo_bank_list', array(
 "todoListBank" => $todoListBank));
?>


<?php
echo $this->renderPartial('application.views.site.modals._share_with_modal'
  , array("people" => $people,
 "modalType" => Type::$SKILL_SHARE,
 "modalId" => "gb-todo-share-with-modal"));
?>
<div id="gb-todo-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="gb-todo-list-form-cancel-btn btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Add Todo
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>
<div id="gb-advice-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="gb-advice-form-cancel-btn btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Add Advice Page
      </div>
      <div class="modal-body gb-padding-thin">
        <?php
        echo $this->renderPartial('pages.views.pages.forms._add_advice_page_form', array(
         'formType' => TodoType::$FORM_TYPE_ADVICE_PAGE_HOME,
         'pageModel' => $pageModel,
         'advicePageModel' => $advicePageModel,
         'pageLevelList' => $pageLevelList));
        ?>
      </div>
    </div>
  </div>
</div>
<div id="gb-request-confirmation-modal" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2 class="text-center text-success"> Your request has been sent</h2>
  <div class="modal-footer">
    <button class="gb-btn gb-btn-blue-1" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
<?php
echo $this->renderPartial('todo.views.todo.modals.todo_bank_list', array("todoListBank" => $todoListBank));
?>
<?php echo $this->renderPartial('todo.views.todo.modals.request_mentorship', array()); ?>


<!-- -----------------------------HIDDEN THINGS --------------------------->

<div id="gb-forms-home" class="gb-hide">
  <?php
  echo $this->renderPartial('application.views.site.forms._request_form', array(
   "requestModel" => $requestModel));
  ?>
</div>
<?php $this->endContent() ?>