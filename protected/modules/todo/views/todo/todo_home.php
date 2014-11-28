<?php $this->beginContent('//layouts/gb_main1'); ?>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ss_themes/ss_theme_3.css" type="text/css" rel="stylesheet"/>
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
          <h1 class="">Todo List</h1>
        </div>
        <div class="row gb-hide">
          <ul id="" class="col-lg-12 col-sm-12 col-xs-12 gb-side-nav-1 gb-todo-leftbar">
            <li class="active col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-todos-all-pane" data-toggle="tab"><p class="text-right col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">All Todos</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="#gb-my-todos-pane" data-toggle="tab"><p class="col-lg-11 col-md-11 col-sm-11 col-xs-10 pull-left">My Todos</p><i class="glyphicon glyphicon-chevron-down pull-right"></i></a></li>
          </ul>
        </div>
        <br>       
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
             data-gb-source-pk="<?php //echo $mentorship->id;          ?>" 
             data-gb-source="<?php echo Type::$SOURCE_SKILL_ASSIGN_REQUESTS; ?>"
             gb-form-slide-target="#gb-request-form-container"
             gb-form-target="#gb-request-form"
             gb-submit-prepend-to="#gb-assignment-requests"
             gb-request-title="<?php //echo $mentorship->skillTodo->todo->title;          ?>"
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

        </div>
        <br>

        <br>
        <div class="tab-content row gb-padding-left-3 gb-background-light-grey-1">

          <!------------------TODO MANAGEMENT PANE --------------------->
          <div class="tab-pane active" id="todo-home-welcome-pane">
            <div class="row gb-tab-pane-body">
              <ul id="gb-posts"class="row gb-side-nav-2">       
                <?php
                $count = 1;
                foreach ($skillTodoList as $skillTodoItem):
                  echo $this->renderPartial('todo.views.todo.activity._todo_parent_list_item', array(
                   'todoParent' => $skillTodoItem,
                   'source' => Type::$SOURCE_SKILL));
                endforeach;
                ?>
              </ul>
            </div>
          </div>
          <div class="tab-pane" id="todo-detail-pane">
            <div class="row gb-tab-pane-body">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- -------------------------------MODALS --------------------------->


<!-- -----------------------------HIDDEN THINGS --------------------------->

<div id="gb-forms-home" class="gb-hide">
  <?php
  echo $this->renderPartial('application.views.site.forms._request_form', array(
   "requestModel" => $requestModel));
  ?>
</div>
<?php $this->endContent() ?>