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
      'actions' => array('todoWelcome', 'todoChild',
       'todoItemOverview', 'todoItemChecklists', 'todoItemContributors', 'todoItemComments', 'todoItemNotes',
       'todoApps', 'todoTimeline', 'todoContributors',
       'todoComments', 'todoDetail', 'todoDiscussions', 'todoquestions', 'todoNotes',
       'todoWeblinks', 'todoContributor', 'todoObserver'),
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

  public function actionTodoWelcome($todoListId) {
    if (Yii::app()->request->isAjaxRequest) {
      $todoParent = SkillTodo::Model()->findByPk($todoListId);
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-todo-item-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab._todo_overview_pane', array(
        'todoParent' => $todoParent,
        'todoParentInfo' => $todoParent->todo->getParentInfo($todoParent),
        'todoListChildren' => Todo::getChildrenTodos($todoParent->todo_id, 10),
        'todoListChildrenCount' => Todo::getChildrenTodosCount($todoParent->todo_id),
         ), true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoChild($todoChildId) {
    if (Yii::app()->request->isAjaxRequest) {
      $todoChild = Todo::model()->findByPk($todoChildId);
      $todoChecklistsCount = $todoChild->getChecklistsCount();
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-todo-item-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab._todo_item_pane', array(
        'todoChild' => $todoChild,
        'todoChecklists' => $todoChild->getChecklists(Checklist::$CHECKLISTS_PER_OVERVIEW_PAGE),
        'todoChecklistsCount' => $todoChecklistsCount,
        'todoChecklistsProgressCount' => $todoChild->getProgress($todoChecklistsCount),
        'todoContributors' => $todoChild->getContributors(null, 6),
        'todoContributorsCount' => $todoChild->getContributorsCount(),
        'todoComments' => $todoChild->getTodoParentComments(Comment::$COMMENTS_PER_OVERVIEW_PAGE),
        'todoCommentsCount' => $todoChild->getTodoParentCommentsCount(),
        'todoNotes' => $todoChild->getTodoParentNotes(Note::$NOTES_PER_OVERVIEW_PAGE),
        'todoNotesCount' => $todoChild->getTodoParentNotesCount(),
        'todoWeblinks' => $todoChild->getTodoParentWeblinks(3),
        'todoWeblinksCount' => $todoChild->getTodoParentWeblinksCount(),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoItemOverview($todoChildId) {
    if (Yii::app()->request->isAjaxRequest) {
      $todoChild = Todo::model()->findByPk($todoChildId);
      $todoChecklistsCount = $todoChild->getChecklistsCount();

      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-todo-item-overview-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab.todo_item_tab._todo_item_overview_pane', array(
        'todoChild' => $todoChild,
        'todoChecklists' => $todoChild->getChecklists(Checklist::$CHECKLISTS_PER_OVERVIEW_PAGE),
        'todoChecklistsCount' => $todoChecklistsCount,
        'todoChecklistsProgressCount' => $todoChild->getProgress($todoChecklistsCount),
        'todoContributors' => $todoChild->getContributors(null, 6),
        'todoContributorsCount' => $todoChild->getContributorsCount(),
        'todoComments' => $todoChild->getTodoParentComments(Comment::$COMMENTS_PER_OVERVIEW_PAGE),
        'todoCommentsCount' => $todoChild->getTodoParentCommentsCount(),
        'todoNotes' => $todoChild->getTodoParentNotes(Note::$NOTES_PER_OVERVIEW_PAGE),
        'todoNotesCount' => $todoChild->getTodoParentNotesCount(),
        'todoWeblinks' => $todoChild->getTodoParentWeblinks(3),
        'todoWeblinksCount' => $todoChild->getTodoParentWeblinksCount(),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoItemChecklists($todoChildId) {
    if (Yii::app()->request->isAjaxRequest) {
      $todoChild = Todo::model()->findByPk($todoChildId);
      $todoChecklistsCount = $todoChild->getChecklistsCount();
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-todo-item-checklists-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab.todo_item_tab._todo_item_checklists_pane', array(
        'todoChild' => $todoChild,
        'todoChecklists' => $todoChild->getChecklists(Checklist::$CHECKLISTS_PER_PAGE),
        'todoChecklistsCount' => $todoChecklistsCount,
        'todoChecklistsProgressCount' => $todoChild->getProgress($todoChecklistsCount),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoItemContributors($todoChildId) {
    if (Yii::app()->request->isAjaxRequest) {
      $todoChild = Todo::model()->findByPk($todoChildId);
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-todo-item-contributors-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab.todo_item_tab._todo_item_contributors_pane', array(
        'todoChild' => $todoChild,
        'todoContributors' => $todoChild->getContributors(null, 3),
        'todoContributorsCount' => $todoChild->getContributorsCount(),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoItemComments($todoChildId) {
    if (Yii::app()->request->isAjaxRequest) {
      $todoChild = Todo::model()->findByPk($todoChildId);
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-todo-item-comments-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab.todo_item_tab._todo_item_comments_pane', array(
        'todoChild' => $todoChild,
        'todoComments' => $todoChild->getTodoParentComments(Comment::$COMMENTS_PER_PAGE),
        'todoCommentsCount' => $todoChild->getTodoParentCommentsCount(),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionTodoItemNotes($todoChildId) {
    if (Yii::app()->request->isAjaxRequest) {
      $todoChild = Todo::model()->findByPk($todoChildId);
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-todo-item-notes-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab.todo_item_tab._todo_item_notes_pane', array(
        'todoChild' => $todoChild,
        'todoNotes' => $todoChild->getTodoParentNotes(Note::$NOTES_PER_PAGE),
        'todoNotesCount' => $todoChild->getTodoParentNotesCount(),
         )
         , true)
      ));
      Yii::app()->end();
    }
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
        'todoContributorRequests' => Notification::getRequestStatus(array(Type::$SOURCE_JUDGE_REQUESTS), $todoListId, null, true),
        'todoObserverRequests' => Notification::getRequestStatus(array(Type::$SOURCE_OBSERVER_REQUESTS), $todoListId, null, true),
        'todoContributors' => TodoListContributor::getTodoListContributors($todoListId),
        'todoObservers' => TodoListObserver::getTodoListObservers($todoListId),
        'todoContributorsCount' => TodoListContributor::getTodoListContributorsCount($todoListId),
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

  public function actionTodoDetail($todoListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#todo-detail-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab._todo_detail_pane', array(
        'skillTodoParent' => SkillTodo::model()->findByPk($todoListId),
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

  public function actionTodoquestions($todoListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-todo-welcome-questions-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.welcome_tab._todo_question_list_pane', array(
        'todoquestionParentList' => Todoquestion::getTodoParentquestions($todoListId),
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

  public function actionTodoContributor($todoListId, $todoContributorId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-contributor-person-pane",
       "_post_row" => $this->renderPartial('todo.views.todo.contributors_tab._todo_contributors_contributor_pane', array(
        'todoContributor' => TodoListContributor::model()->findByPk($todoContributorId),
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
