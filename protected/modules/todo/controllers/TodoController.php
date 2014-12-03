<?php

class TodoController extends Controller {
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
      'actions' => array('index', 'todobank', 'todobankdetail', 'appendMoreTodo'),
      'users' => array('*'),
    ),
    array('allow', // allow authenticated user to perform 'create' and 'update' actions
      'actions' => array('todoHome', 'todobank', 'addtodolist', 'addTodoReply', 'addTodo', 'edittodolist', 'addtodobank',
        'todoManagement', 'addTodoComment', 'addTodoquestion', 'addTodoChecklist', 'addTodoDiscussion', 'AddTodoWeblink',
        'addTodoNote', 'addTodoTimelineItem'),
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

 public function actionTodoHome() {
  $this->render('todo_home', array(
    'people' => Profile::getPeople(true),
    //'mentorshipModel'=> new Mentorship(),
    'todoModel' => new Todo(),
    'skillTodoModel' => new SkillTodo(),
    //'todoTypes' => TodoType::Model()->findAll(),
    'skillTodoList' => SkillTodo::getSkillParentTodos(),
    // 'todoLevelList' => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
    'requestModel' => new Notification()

//"todoBankPages" => $todoBankPages,
// "todoBankCount" => $todoBankCount,
  ));
 }

 public function actionTodoBank() {
  if (Yii::app()->user->isGuest) {
   $todoListModel = new TodoList;
   $todoModel = new Todo;

   $bankSearchCriteria = Bank::getBankSearchCriteria(TodoType::$CATEGORY_SKILL, null, 100);

   $count = Bank::model()->count($bankSearchCriteria);
   $pages = new CPagination($count);
// results per page
   $pages->pageSize = 100;
   $pages->applyLimit($bankSearchCriteria);
   $registerModel = new RegistrationForm;
   $profile = new Profile;
   $loginModel = new UserLogin;
   UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
   $this->render('todo_bank_guest', array(
     'todoModel' => $todoModel,
     'todoBank' => Bank::model()->findAll($bankSearchCriteria),
     'pages' => $pages, 'loginModel' => $loginModel,
     'registerModel' => $registerModel,
     'profile' => $profile)
   );
  } else {
   $todoListModel = new TodoList;
   $todoModel = new Todo;
   $connectionModel = new Connection;
   $connectionMemberModel = new ConnectionMember;

   $bankSearchCriteria = Bank::getBankSearchCriteria(TodoType::$CATEGORY_SKILL, null, 100);

   $this->render('todo_bank', array(
     'todoModel' => $todoModel,
     'todoListModel' => $todoListModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'todoTypes' => TodoType::Model()->findAll(),
     'todoList' => TodoList::getTodoList(null, null, null, array(TodoList::$TYPE_SKILL), 12),
     'todo_levels' => Level::getLevels(Level::$LEVEL_CATEGORY_SKILL),
     'todoBank' => Bank::model()->findAll($bankSearchCriteria),
   ));
  }
 }

 public function actionTodoBankDetail($todoId) {
  if (Yii::app()->user->isGuest) {
   $registerModel = new RegistrationForm;
   $profile = new Profile;
   $loginModel = new UserLogin;
   $todoBankItem = Bank::Model()->findByPk($todoId);
   UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
   $this->render('todo_bank_detail_guest', array(
     'todoBankItem' => $todoBankItem,
     'loginModel' => $loginModel,
     'registerModel' => $registerModel,
     'profile' => $profile)
   );
  } else {
//$todoWeblinkModel = new TodoWeblink;
   $todoBankItem = Bank::Model()->findByPk($todoId);
   $this->render('todo_bank_detail', array(
     'todoBankItem' => $todoBankItem,
   ));
  }
 }

 public function actionTodoManagement($todoListId, $type) {
  switch ($type) {
   case Type::$SOURCE_SKILL:
    $todoParent = SkillTodo::Model()->findByPk($todoListId);
    $this->render('todo_management_skill', array(
      //'todoOverviewQuestionnaires' => question::getQuestions(Type::$SOURCE_SKILL),
      'todoParent' => $todoParent,
      'todoParentInfo' => $todoParent->todo->getParentInfo($todoParent),
      'todoListChildren' => Todo::getChildrenTodos($todoParent->todo_id, 10),
      'todoListChildrenCount' => Todo::getChildrenTodosCount($todoParent->todo_id),
      'announcementModel' => new Announcement(),
      'checklistModel' => new Checklist(),
      'commentModel' => new Comment(),
      'discussionModel' => new Discussion(),
      'noteModel' => new Note(),
      'requestModel' => new Notification(),
      'todoModel' => new Todo(),
      'todoPriorities' => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
      'weblinkModel' => new Weblink(),
      //'todoParentDiscussions' => TodoDiscussion::getTodoParentDiscussions($todoListItem->todo_id),
      //'todoType' => $todoType,
      //'advicePages' => Page::getUserPages($todo->creator_id),
      //'todoTimeline' => TodoTimeline::getTodoTimeline($todoId),
      // "todoTimelineModel" => new TodoTimeline(),
      'people' => Profile::getPeople(true),
      "timelineModel" => new Timeline(),
      //'feedbackQuestions' => Todo::getFeedbackQuestions($todo, Yii::app()->user->id),
    ));
    break;
  }
 }

 public function actionAddTodolist($connectionId, $source, $type) {
  if (Yii::app()->request->isAjaxRequest) {
   $todoModel = new Todo;
   $todoListModel = new TodoList;
   if (isset($_POST['Todo']) && isset($_POST['TodoList'])) {
    $todoModel->attributes = $_POST['Todo'];
    $todoListModel->attributes = $_POST['TodoList'];
    if ($todoModel->validate() && $todoListModel->validate()) {
     $todoModel->assign_date = date("Y-m-d");
     $todoModel->status = 1;
     if ($todoModel->save()) {
      $todoListModel->type_id = $type;
      $todoListModel->creator_id = Yii::app()->user->id;
      $todoListModel->todo_id = $todoModel->id;
      if ($todoListModel->save()) {
       if (isset($_POST['gb-todo-share-with'])) {
        TodoListShare::shareTodoList($todoListModel->id, $_POST['gb-todo-share-with']);
        Post::addPost($todoListModel->id, Post::$TYPE_GOAL_LIST, $todoListModel->privacy, $_POST['gb-todo-share-with']);
       } else {
        TodoListShare::shareTodoList($todoListModel->id);
        Post::addPost($todoListModel->id, Post::$TYPE_GOAL_LIST, $todoListModel->privacy);
       }
       echo CJSON::encode(array(
         'success' => true,
         "todo_level_id" => $todoListModel->level_id,
         '_post_row' => $this->renderPartial('todo.views.todo._todo_list_post_row', array(
           'todoListItem' => $todoListModel,
           'source' => TodoList::$SOURCE_SKILL)
           , true),
         "_todo_preview_list_row" => $this->renderPartial('todo.views.todo._todo_preview_list_row', array(
           "todoListItem" => $todoListModel)
           , true)));
      }
     }
    } else {
     echo CActiveForm::validate(array($todoModel, $todoListModel));
    }
   }
   Yii::app()->end();
  }
 }

 public function actionAddTodoReply() {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST['Todo'])) {
    $todoModel = new Todo();
    $todoModel->attributes = $_POST['Todo'];
    if ($todoModel->validate()) {
     $todoModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime('now');
     $todoModel->created_date = $cdate->format('Y-m-d h:m:i');
     if ($todoModel->save(false)) {
      $postRow = $this->renderPartial('todo.views.todo.activity._todo_child', array(
        "todoChild" => $todoModel,
        "todoChildCounter" => "new")
        , true);
     }
     echo CJSON::encode(array(
       "success" => true,
       "data_source" => Type::$SOURCE_TODO,
       "source_pk_id" => $todoModel->parent_todo_id,
       "_post_row" => $postRow
     ));
    }
   } else {
    echo CActiveForm::validate($todoModel);
   }
  }

  Yii::app()->end();
 }

 public function actionAddTodoTimelineItem($todoId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST['Timeline']) && isset($_POST['TodoTimeline'])) {
    $timelineModel = new Timeline();
    $todoTimelineModel = new TodoTimeline();
    $timelineModel->attributes = $_POST['Timeline'];
    $todoTimelineModel->attributes = $_POST['TodoTimeline'];
    if ($todoTimelineModel->validate() && $timelineModel->validate()) {
     $timelineModel->creator_id = Yii::app()->user->id;
     if ($timelineModel->save(false)) {
      $todoTimelineModel->todo_id = $todoId;
      $todoTimelineModel->timeline_id = $timelineModel->id;
      $todoTimelineModel->save(false);
      echo CJSON::encode(array(
        'success' => true,
        'data_source' => Type::$SOURCE_TIMELINE,
        'source_pk_id' => 0,
        '_post_row' => $this->renderPartial('todo.views.todo.activity._todo_timeline_item_row', array(
          'todoTimeline' => TodoTimeline::getTodoTimeline($todoId),
          )
          , true)
      ));
     }
    } else {
     echo CActiveForm::validate(array($todoTimelineModel, $timelineModel));
    }
   }
   Yii::app()->end();
  }
 }

 public function actionAddTodoChecklist($todoId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST['Checklist'])) {
    $checklistModel = new Checklist();
    $checklistModel->attributes = $_POST['Checklist'];
    if ($checklistModel->validate()) {
     $checklistModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime('now');
     $checklistModel->created_date = $cdate->format('Y-m-d h:m:i');
     if ($checklistModel->save(false)) {
      $todoChecklistModel = new TodoChecklist();
      $todoChecklistModel->todo_id = $todoId;
      $todoChecklistModel->checklist_id = $checklistModel->id;
      $todoChecklistModel->save(false);
      $postRow;
      if ($checklistModel->parent_checklist_id) {
       $postRow = $this->renderPartial('todo.views.todo.activity.checklist._todo_checklist_parent_list_item', array(
         "todoChecklistParent" => TodoChecklist::getTodoParentChecklist($checklistModel->parent_checklist_id, $todoId))
         , true);
      } else {
       $postRow = $this->renderPartial('todo.views.todo.activity.checklist._todo_checklist_parent_list_item', array(
         "todoChecklistParent" => $todoChecklistModel)
         , true);
      }

      echo CJSON::encode(array(
        "success" => true,
        "data_source" => Type::$SOURCE_TODO,
        "source_pk_id" => $checklistModel->parent_checklist_id,
        "_post_row" => $postRow
      ));
     }
    } else {
     echo CActiveForm::validate($checklistModel);
    }
   }

   Yii::app()->end();
  }
 }

 public function actionAddTodoComment($todoId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST['Comment'])) {
    $commentModel = new Comment();
    $commentModel->attributes = $_POST['Comment'];
    if ($commentModel->validate()) {
     $commentModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime('now');
     $commentModel->created_date = $cdate->format('Y-m-d h:m:i');
     if ($commentModel->save(false)) {
      $todoCommentModel = new TodoComment();
      $todoCommentModel->todo_id = $todoId;
      $todoCommentModel->comment_id = $commentModel->id;
      $todoCommentModel->save(false);
      $postRow;
      if ($commentModel->parent_comment_id) {
       $postRow = $this->renderPartial('todo.views.todo.activity.comment._todo_comment_parent', array(
         "todoCommentParent" => TodoComment::getTodoParentComment($commentModel->parent_comment_id, $todoId))
         , true);
      } else {
       $postRow = $this->renderPartial('todo.views.todo.activity.comment._todo_comment_parent', array(
         "todoCommentParent" => $todoCommentModel)
         , true);
      }

      echo CJSON::encode(array(
        "success" => true,
        "data_source" => Type::$SOURCE_TODO,
        "source_pk_id" => $commentModel->parent_comment_id,
        "_post_row" => $postRow
      ));
     }
    } else {
     echo CActiveForm::validate($commentModel);
    }
   }

   Yii::app()->end();
  }
 }

 public function actionAddTodoNote($todoId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST['Note'])) {
    $noteModel = new Note();
    $noteModel->attributes = $_POST['Note'];
    if ($noteModel->validate()) {
     $noteModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime('now');
     $noteModel->created_date = $cdate->format('Y-m-d h:m:i');
     if ($noteModel->save(false)) {
      $todoNoteModel = new TodoNote();
      $todoNoteModel->todo_id = $todoId;
      $todoNoteModel->note_id = $noteModel->id;
      $todoNoteModel->save(false);
      $postRow;
      if ($noteModel->parent_note_id) {
       $postRow = $this->renderPartial('todo.views.todo.activity.note._todo_note_parent_list_item', array(
         "todoNoteParent" => TodoNote::getTodoParentNote($noteModel->parent_note_id, $todoId))
         , true);
      } else {
       $postRow = $this->renderPartial('todo.views.todo.activity.note._todo_note_parent_list_item', array(
         "todoNoteParent" => $todoNoteModel)
         , true);
      }

      echo CJSON::encode(array(
        "success" => true,
        "data_source" => Type::$SOURCE_TODO,
        "source_pk_id" => $noteModel->parent_note_id,
        "_post_row" => $postRow
      ));
     }
    } else {
     echo CActiveForm::validate($noteModel);
    }
   }

   Yii::app()->end();
  }
 }

 public function actionAddTodoquestion($todoId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST['question'])) {
    $questionModel = new question();
    $questionModel->attributes = $_POST['question'];
    if ($questionModel->validate()) {
     $questionModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime('now');
     $questionModel->created_date = $cdate->format('Y-m-d h:m:i');
     if ($questionModel->save(false)) {
      $todoquestionModel = new Todoquestion();
      $todoquestionModel->todo_id = $todoId;
      $todoquestionModel->question_id = $questionModel->id;
      $todoquestionModel->save(false);
      $postRow;
      switch ($questionModel->status) {
       case question::$STATUS_GENERAL:
        if ($questionModel->parent_question_id) {
         $postRow = $this->renderPartial('todo.views.todo.activity._todo_question_parent_list_item', array(
           "todoquestionParent" => Todoquestion::getTodoParentquestion($questionModel->parent_question_id, $todoId))
           , true);
        } else {
         $postRow = $this->renderPartial('todo.views.todo.activity._todo_question_parent_list_item', array(
           "todoquestionParent" => $todoquestionModel)
           , true);
        }

        break;

       case question::$STATUS_QUESTIONNAIRE:
        if ($questionModel->parent_question_id) {
         $postRow = $this->renderPartial('todo.views.todo.activity._todo_questionnaire_parent_list_item', array(
           "todoquestionParent" => Todoquestion::getTodoParentquestion($questionModel->id, $todoId))
           , true);
        } else {
         $postRow = $this->renderPartial('todo.views.todo.activity._todo_questionnaire_parent_list_item', array(
           "todoquestionParent" => $todoquestionModel)
           , true);
        }

        break;
      }


      echo CJSON::encode(array(
        "success" => true,
        "data_source" => Type::$SOURCE_TODO,
        "source_pk_id" => $questionModel->parent_question_id,
        "_post_row" => $postRow
      ));
     }
    } else {
     echo CActiveForm::validate($questionModel);
    }
   }

   Yii::app()->end();
  }
 }

 public function actionAddTodo($todoParentId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST['Todo'])) {
    $todoModel = new Todo();
    $todoModel->attributes = $_POST['Todo'];
    if ($todoModel->validate()) {
     $todoModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime('now');
     $todoModel->created_date = $cdate->format('Y-m-d h:m:i');
     $todoModel->parent_todo_id = $todoParentId;
     if ($todoModel->save(false)) {
      $postRow = $this->renderPartial('todo.views.todo.activity.todo._todo_item', array(
        "todoListChild" => Todo::model()->findByPk($todoModel->id))
        , true);

      echo CJSON::encode(array(
        "success" => true,
        "data_source" => Type::$SOURCE_TODO,
        "source_pk_id" => $todoModel->parent_todo_id,
        "_post_row" => $postRow
      ));
     }
    } else {
     echo CActiveForm::validate($todoModel);
    }
   }

   Yii::app()->end();
  }
 }

 public function actionAddTodoDiscussion($todoId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST['Discussion'])) {
    $discussionModel = new Discussion();
    $discussionModel->attributes = $_POST['Discussion'];
    if ($discussionModel->validate()) {
     $cdate = new DateTime('now');
     $discussionModel->creator_id = Yii::app()->user->id;
     $discussionModel->created_date = $cdate->format('Y-m-d h:m:i');
     if ($discussionModel->save(false)) {
      $todoDiscussionModel = new TodoDiscussion();
      $todoDiscussionModel->todo_id = $todoId;
      $todoDiscussionModel->discussion_id = $discussionModel->id;
      $todoDiscussionModel->save(false);
      $postRow;
      if ($discussionModel->parent_discussion_id) {
       $postRow = $this->renderPartial('todo.views.todo.activity._todo_discussion_parent_list_item', array(
         "todoDiscussionParent" => TodoDiscussion::getTodoParentDiscussion($discussionModel->parent_discussion_id, $todoId))
         , true);
      } else {
       $postRow = $this->renderPartial('todo.views.todo.activity._todo_discussion_parent_list_item', array(
         "todoDiscussionParent" => $todoDiscussionModel)
         , true);
      }

      echo CJSON::encode(array(
        "success" => true,
        "data_source" => Type::$SOURCE_TODO,
        "source_pk_id" => $discussionModel->parent_discussion_id,
        "_post_row" => $postRow
      ));
     }
    } else {
     echo CActiveForm::validate($discussionModel);
    }
   }

   Yii::app()->end();
  }
 }

 public function actionAddTodoWeblink($todoId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST['Weblink'])) {
    $weblinkModel = new Weblink();
    $weblinkModel->attributes = $_POST['Weblink'];
    if ($weblinkModel->validate()) {
     $weblinkModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime('now');
     $weblinkModel->created_date = $cdate->format('Y-m-d h:m:i');
     if ($weblinkModel->save(false)) {
      $todoWeblinkModel = new TodoWeblink();
      $todoWeblinkModel->todo_id = $todoId;
      $todoWeblinkModel->weblink_id = $weblinkModel->id;
      $todoWeblinkModel->save(false);
      $postRow;
      if ($weblinkModel->parent_weblink_id) {
       $postRow = $this->renderPartial('todo.views.todo.activity._todo_weblink_parent_list_item', array(
         "todoWeblinkParent" => TodoWeblink::getTodoParentWeblink($weblinkModel->parent_weblink_id, $todoId))
         , true);
      } else {
       $postRow = $this->renderPartial('todo.views.todo.activity._todo_weblink_parent_list_item', array(
         "todoWeblinkParent" => $todoWeblinkModel)
         , true);
      }

      echo CJSON::encode(array(
        "success" => true,
        "data_source" => Type::$SOURCE_TODO,
        "source_pk_id" => $weblinkModel->parent_weblink_id,
        "_post_row" => $postRow
      ));
     }
    } else {
     echo CActiveForm::validate($weblinkModel);
    }
   }

   Yii::app()->end();
  }
 }

 public function actionAppendMoreTodo() {
  if (Yii::app()->request->isAjaxRequest) {
   $nextPage = Yii::app()->request->getParam('next_page') * 100;
   $type = Yii::app()->request->getParam('type');
   $bankSearchCriteria = Bank::getBankSearchCriteria(TodoType::$CATEGORY_SKILL, null, 100, $nextPage);
   switch ($type) {
    case 1:
     echo CJSON::encode(array(
       '_todo_bank_list' => $this->renderPartial('todo.views.todo._todo_bank_list', array(
         'todoBank' => Bank::model()->findAll($bankSearchCriteria))
         , true
     )));
     break;
    case 2:
     echo CJSON::encode(array(
       '_todo_bank_list' => $this->renderPartial('todo.views.todo._todo_bank_list_1', array(
         'todoBank' => Bank::model()->findAll($bankSearchCriteria))
         , true
     )));
     break;
   }
   Yii::app()->end();
  }
 }

 /**
  * Displays a particular model.
  * @param integer $id the ID of the model to be displayed
  */
 public function actionView($id) {
  $this->render('view', array(
    'todo' => Todo::getTodo($id),
  ));
 }

 /**
  * Creates a new model.
  * If creation is successful, the browser will be redirected to the 'view' page.
  */
 public function actionCreate() {
  $model = new Todo;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

  if (isset($_POST['Todo'])) {
   $model->attributes = $_POST['Todo'];
   if ($model->save())
    $this->redirect(array('view', 'id' => $model->id));
  }

  $this->render('create', array(
    'model' => $model,
  ));
 }

 /**
  * Updates a particular model.
  * If update is successful, the browser will be redirected to the 'view' page.
  * @param integer $id the ID of the model to be updated
  */
 public function actionUpdate($id) {
  $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

  if (isset($_POST['Todo'])) {
   $model->attributes = $_POST['Todo'];
   if ($model->save())
    $this->redirect(array('view', 'id' => $model->id));
  }

  $this->render('update', array(
    'model' => $model,
  ));
 }

 /**
  * Deletes a particular model.
  * If deletion is successful, the browser will be redirected to the 'admin' page.
  * @param integer $id the ID of the model to be deleted
  */
 public function actionDelete($id) {
  $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
  if (!isset($_GET['ajax']))
   $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
 }

 /**
  * Lists all models.
  */
 public function actionIndex() {
  $dataProvider = new CActiveDataProvider('Todo');
  $this->render('index', array(
    'dataProvider' => $dataProvider,
  ));
 }

 /**
  * Manages all models.
  */
 public function actionAdmin() {
  $model = new Todo('search');
  $model->unsetAttributes(); // clear any default values
  if (isset($_GET['Todo']))
   $model->attributes = $_GET['Todo'];

  $this->render('admin', array(
    'model' => $model,
  ));
 }

 /**
  * Returns the data model based on the primary key given in the GET variable.
  * If the data model is not found, an HTTP exception will be raised.
  * @param integer $id the ID of the model to be loaded
  * @return Todo the loaded model
  * @throws CHttpException
  */
 public function loadModel($id) {
  $model = Todo::model()->findByPk($id);
  if ($model === null)
   throw new CHttpException(404, 'The requested page does not exist.');
  return $model;
 }

 /**
  * Performs the AJAX validation.
  * @param Todo $model the model to be validated
  */
 protected function performAjaxValidation($model) {
  if (isset($_POST['ajax']) && $_POST['ajax'] === 'todo-form') {
   echo CActiveForm::validate($model);
   Yii::app()->end();
  }
 }

}
