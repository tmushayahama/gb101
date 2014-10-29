<?php

class TodoTabController extends Controller {
  /**
   * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
   * using two-column layout. See 'protected/views/layouts/column2.php'.
   */

  /**
   * @return array action filters
   */
  public function filters() {
    return array(
     'accessControl', // perform access control for CRUD operations
     'postOnly + delete', // we only allow deletion via POST request
    );
  }

  /**
   * Specifies the access control rules.
   * This method is used by the 'accessControl' filter.
   * @return array access control rules
   */
  public function accessRules() {
    return array(
     array('allow', // allow all users to perform 'index' and 'view' actions
      'actions' => array(),
      'users' => array('*'),
     ),
     array('allow', // allow authenticated user to perform 'create' and 'update' actions
      'actions' => array('todoWelcome', 'todoApps', 'todoTimeline', 'todoContributors',
       'todoComments', 'todoTodos', 'todoDiscussions', 'todoQuestionAnswers', 'todoNotes',
       'todoWeblinks', 'todoJudge', 'todoObserver'),
      'users' => array('@'),
     ),
     array('allow', // allow admin user to perform 'admin' and 'delete' actions
      'actions' => array('admin', 'delete'),
      'users' => array('admin'),
     ),
     array('deny', // deny all users
      'users' => array('*'),
     ),
    );
  }

  public function actionTodoApps($todoListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#todo-management-apps-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.apps_tab._todo_apps_pane', array(
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoTimeline($todoListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#todo-management-timeline-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.timeline_tab._todo_timeline_pane', array(
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoContributors($todoListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#todo-management-contributors-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.contributors_tab._todo_contributors_pane', array(
        'todoListId' => $todoListId,
        'todoListItem' => TodoList::model()->findByPk($todoListId),
        'todoJudgeRequests' => Notification::getRequestStatus(array(Type::$SOURCE_JUDGE_REQUESTS), $todoListId, null, true),
        'todoObserverRequests' => Notification::getRequestStatus(array(Type::$SOURCE_OBSERVER_REQUESTS), $todoListId, null, true),
        'todoJudges' => TodoListJudge::getTodoListJudges($todoListId),
        'todoObservers' => TodoListObserver::getTodoListObservers($todoListId),
        'todoJudgesCount' => TodoListJudge::getTodoListJudgesCount($todoListId),
        'todoObserversCount' => TodoListObserver::getTodoListObserversCount($todoListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoComments($todoListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-todo-welcome-comments-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab._todo_comment_list_pane', array(
        'todoCommentParentList' => TodoComment::getTodoParentComments($todoListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoTodos($todoListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-todo-welcome-todos-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab._todo_todo_list_pane', array(
        'todoTodoParentList' => TodoTodo::getTodoParentTodos($todoListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoDiscussions($todoListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-todo-welcome-discussions-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab._todo_discussion_list_pane', array(
        'todoDiscussionParentList' => TodoDiscussion::getTodoParentDiscussions($todoListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoNotes($todoListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-todo-welcome-notes-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab._todo_note_list_pane', array(
        'todoNoteParentList' => TodoNote::getTodoParentNotes($todoListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoQuestionAnswers($todoListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-todo-welcome-question-answers-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab._todo_question_answer_list_pane', array(
        'todoQuestionAnswerParentList' => TodoQuestionAnswer::getTodoParentQuestionAnswers($todoListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoWeblinks($todoListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-todo-welcome-weblinks-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab._todo_weblink_list_pane', array(
        'todoWeblinkParentList' => TodoWeblink::getTodoParentWeblinks($todoListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoJudge($todoListId, $todoJudgeId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-contributor-person-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.contributors_tab._todo_contributors_judge_pane', array(
        'todoJudge' => TodoListJudge::model()->findByPk($todoJudgeId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoObserver($todoListId, $todoObserverId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-contributor-person-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.contributors_tab._todo_contributors_observer_pane', array(
        'todoObserver' => TodoListObserver::model()->findByPk($todoObserverId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoFiles($todoListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-todo-welcome-files-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab._todo_file_list_pane', array(
        'todoFileParentList' => TodoFile::getTodoParentFiles($todoListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

}