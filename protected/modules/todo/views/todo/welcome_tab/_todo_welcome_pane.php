<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-nav-parent col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-no-padding">
  <div id="gb-todos-nav" class="row gb-no-padding panel-group" role="tablist" aria-multiselectable="true">
    <div class="panel">
      <div class="row" role="tab">
        <a class="collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
           data-toggle="collapse" 
           gb-data-toggle='gb-expandable-tab'
           data-parent="#gb-todos-nav" href="#gb-collapse-todo-welcome"
           aria-expanded="false" aria-controls="gb-collapse-todo-welcome"
           gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoWelcome", array('todoListId' => $todoParent->id)); ?>">
          <i class="glyphicon glyphicon-pause pull-left"></i> 
          <div class="col-lg-9 gb-padding-left-1">
            <p class="gb-ellipsis">Overview</p>
          </div>
          <i class="glyphicon glyphicon-chevron-right pull-right"></i>
        </a>
      </div>
      <div id="gb-collapse-todo-welcome" class="row panel-collapse collapse" role="tabpanel" >
        <div class="list-group gb-no-margin">
          <a href="#" class="list-group-item">Checklists</a>
          <a href="#" class="list-group-item">Comments</a>
          <a href="#" class="list-group-item">Notes</a>
        </div>
      </div>
    </div>
    <h5 class="gb-heading-3">TODOS 
      <span class="pull-right badge gb-badge-sm"><?php echo $todoListChildrenCount; ?></span>
    </h5>
    <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
         gb-is-child-form="0"
         gb-form-target="#gb-todo-form"
         gb-add-url="<?php echo Yii::app()->createUrl("todo/todo/addTodo", array("todoParentId" => $todoParent->id)); ?>"
         gb-form-description-input="#gb-todo-form-description-input">
      <textarea class="form-control"
                placeholder="Add a Todo"
                rows="1"></textarea>
      <div class="input-group-btn">
        <div class="input-group-btn">
          <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus-sign"></i></button>
        </div><!-- /btn-group -->
      </div>
    </div>
    <br>
    <div id="gb-todos" class="row">

      <?php foreach ($todoListChildren as $todoListChild): ?>
        <?php
        $this->renderPartial('todo.views.todo.activity.todo._todo_item', array(
         "todoListChild" => $todoListChild,
        ));
        ?> 
      <?php endforeach; ?>
    </div>
  </div>
</div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 gb-no-padding gb-middle-container">
  <div class="tab-content">
    <!---------- TODO MANAGEMENT WELCOME OVERVIEW PANE ------------>
    <div class="tab-pane active" id="gb-todo-item-pane">      
      <div class="row gb-tab-pane-body">
        <?php
        $this->renderPartial('todo.views.todo.welcome_tab._todo_overview_pane', array(
         "todoParent" => $todoParent,
         "todoParentInfo" => $todoParentInfo,
         "todoListChildren" => $todoListChildren,
         "todoListChildrenCount" => $todoListChildrenCount,
        ));
        ?>     
      </div>
    </div>

    <!---------------------SKILL COMMENTS PANE -------------------->
    <div class="tab-pane" id="gb-todo-welcome-comments-pane">
      <h3 class="gb-heading-2">Todo Comments
        <a class="btn btn-sm btn-primary gb-form-show pull-right"
           gb-form-slide-target="#gb-comment-form-container"
           gb-form-target="#gb-comment-form"
           gb-form-heading="Create Todo Comment List">
          <i class="glyphicon glyphicon-plus"></i>
          Add
        </a>
      </h3>
      <div class="row gb-tab-pane-body"></div>
    </div>

    <!---------------------SKILL TODOS PANE -------------------->
    <div class="tab-pane" id="gb-todo-welcome-todos-pane">
      <h3 class="gb-heading-2">Todo Todo List
        <a class="btn btn-sm btn-primary gb-form-show pull-right"
           gb-form-slide-target="#gb-todo-todo-form-container"
           gb-form-target="#gb-todo-todo-form"
           gb-form-heading="Create Todo Todo List">
          <i class="glyphicon glyphicon-plus"></i>
          Add
        </a>
      </h3>
      <div class="row gb-tab-pane-body"></div>
    </div>

    <!------------------SKILL DISCUSSIONS PANE ----------------------->
    <div class="tab-pane" id="gb-todo-welcome-discussions-pane">    
      <h3 class="gb-heading-2">Todo Discussions
        <a class="btn btn-sm btn-primary gb-form-show pull-right"
           gb-form-slide-target="#gb-todo-discussion-form-container"
           gb-form-target="#gb-todo-discussion-form"
           gb-form-heading="Create Todo Discussion">
          <i class="glyphicon glyphicon-plus"></i>
          Add
        </a>
      </h3>
      <div class="row gb-tab-pane-body"></div>
    </div>

    <!---------------------SKILL QUESTION ANSWER PANE -------------------->
    <div class="tab-pane" id="gb-todo-welcome-question-answers-pane">
      <h3 class="gb-heading-2">Todo Questions
        <a class="btn btn-sm btn-primary gb-form-show pull-right"
           gb-form-status="<?php echo QuestionAnswer::$STATUS_GENERAL; ?>"
           gb-form-status-id-input="#gb-todo-question-answer-form-status-input"
           gb-form-slide-target="#gb-todo-question-answer-form-container"
           gb-form-target="#gb-todo-question-answer-form"
           gb-form-heading="Create Todo Question Answer List"
           gb-submit-prepend-to="#gb-question-answers">
          <i class="glyphicon glyphicon-plus"></i>
          Add
        </a>
      </h3>
      <div class="row gb-tab-pane-body"></div>
    </div>

    <!---------------------SKILL EXTERNAL LINKS PANE -------------------->
    <div class="tab-pane" id="gb-todo-welcome-weblinks-pane">
      <h3 class="gb-heading-2">Todo External Link
        <a class="btn btn-sm btn-primary gb-form-show pull-right"
           gb-form-slide-target="#gb-todo-weblink-form-container"
           gb-form-target="#gb-todo-weblink-form"
           gb-form-heading="Create Todo Weblink List">
          <i class="glyphicon glyphicon-plus"></i>
          Add
        </a>
      </h3>
      <div class="row gb-tab-pane-body"></div>
    </div>

    <!---------------------SKILL NOTES PANE -------------------->
    <div class="tab-pane" id="gb-todo-welcome-notes-pane">
      <h3 class="gb-heading-2">Todo Note List
        <a class="btn btn-sm btn-primary gb-form-show pull-right"
           gb-form-slide-target="#gb-note-form-container"
           gb-form-target="#gb-note-form"
           gb-form-heading="Create Todo Note List">
          <i class="glyphicon glyphicon-plus"></i>
          Add
        </a>
      </h3>
      <div class="row gb-tab-pane-body"></div>
    </div>

    <!---------------------SKILL FILES PANE -------------------->
    <div class="tab-pane" id="gb-todo-welcome-files-pane">
      <h3 class="gb-heading-2">Todo Files</h3>
      <div class="row gb-tab-pane-body"></div>
    </div>
  </div>
</div>


