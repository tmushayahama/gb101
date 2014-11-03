<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
  <ul id="" class="gb-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12  row gb-no-padding">
    <li class="active col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-todo-welcome-overview-pane" data-toggle="tab">
        <i class="glyphicon glyphicon-book pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Overview & Tools</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-todo-welcome-comments-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoComments", array('todoListId' => $todoListParent->id)); ?>">
        <i class="glyphicon glyphicon-tasks pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Todo Comments</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-todo-welcome-todos-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoTodos", array('todoListId' => $todoListParent->id)); ?>">
        <i class="glyphicon glyphicon-tasks pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Todo Todo List</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-todo-welcome-discussions-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoDiscussions", array('todoListId' => $todoListParent->id)); ?>">
        <i class="glyphicon glyphicon-th-list pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Discussions</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-todo-welcome-question-answers-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoQuestionAnswers", array('todoListId' => $todoListParent->id)); ?>">
        <i class="glyphicon glyphicon-question-sign pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Questions</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-todo-welcome-weblinks-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoWeblinks", array('todoListId' => $todoListParent->id)); ?>">
        <i class="glyphicon glyphicon-globe pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">External Links</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-todo-welcome-notes-pane" data-toggle="tab"
         gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoNotes", array('todoListId' => $todoListParent->id)); ?>">
        <i class="glyphicon glyphicon-tasks pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Todo Note List</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12">
      <a class="row" href="#gb-todo-welcome-files-pane" data-toggle="tab">
        <i class="glyphicon glyphicon-file pull-left"></i> 
        <div class="col-lg-9 gb-padding-left-1"><p class="gb-ellipsis ">Files</p></div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
  </ul>
</div>
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
  <div class="tab-content gb-padding-left-3">
    <!---------- SKILL MANAGEMENT WELCOME OVERVIEW PANE ------------>
    <div class="tab-pane active" id="gb-todo-welcome-overview-pane">      
      <h4 class="gb-heading-2">
        <?php echo $todoListParent->todo->description; ?>
      </h4>
      <div class="row gb-tab-pane-body">
        <?php
        $this->renderPartial('todo.views.todo.welcome_tab._todo_overview_pane', array(
         "todoListParent" => $todoListParent,
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
           gb-form-slide-target="#gb-todo-comment-form-container"
           gb-form-target="#gb-todo-comment-form"
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
           gb-form-slide-target="#gb-todo-note-form-container"
           gb-form-target="#gb-todo-note-form"
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


