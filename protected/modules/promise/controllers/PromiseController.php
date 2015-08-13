<?php

class PromiseController extends Controller {
 /**
  * @var string the default layout for the views. Defaults to "//layouts/column2", meaning
  * using two-column layout. See "protected/views/layouts/column2.php".
  */

 /**
  * @return array action filters
  */
 public function filters() {
  return array(
    "accessControl", // perform access control for CRUD operations
    "postOnly + delete", // we only allow deletion via POST request
  );
 }

 /**
  * Specifies the access control rules.
  * This method is used by the "accessControl" filter.
  * @return array access control rules
  */
 public function accessRules() {
  return array(
    array("allow", // allow all users to perform "index" and "view" actions
      "actions" => array("index", "promisebank", "promisebankdetail", "appendMorePromise"),
      "users" => array("*"),
    ),
    array("allow", // allow authenticated user to perform "create" and "update" actions
      "actions" => array(
        "promise",
        "promiseHome",
        "promisebank",
        "promiseBrowse",
        "promiseLevelSearch",
        "addpromise",
        "addPromisePlayAnswer",
        "addPromiseComment",
        "requestPromiseContributor",
        "addPromiseQuestionnaire",
        "addPromiseTodo",
        "addPromiseDiscussion",
        "AddPromiseWeblink",
        "addPromiseNote",
        "addPromiseTimeline"),
      "users" => array("@"),
    ),
    array("allow", // allow admin user to perform "admin" and "delete" actions
      "actions" => array("admin", "delete"),
      "users" => array("admin"),
    ),
    array("deny", // deny all users
      "users" => array("*"),
    ),
  );
 }

 public function actionPromiseHome() {
  //$promise = Promise::Model()->findByPk($promiseId);
  $todoPriorities = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name");
  $this->render("promise_home", array(
    "promiseLevels" => Level::getLevels(Level::$LEVEL_CATEGORY_PROMISE),
    "promises" => Promise::getPromises($levelId, Promise::$PROMISES_PER_PAGE),
    "promisesCount" => Promise::getPromisesCount($levelId),
    "promisesGained" => Promise::getPromises(Level::$LEVEL_PROMISE_GAINED, Promise::$PROMISES_PER_PREVIEW_PAGE),
    "promisesToImprove" => Promise::getPromises(Level::$LEVEL_PROMISE_TO_IMPROVE, Promise::$PROMISES_PER_PREVIEW_PAGE),
    "promisesToLearn" => Promise::getPromises(Level::$LEVEL_PROMISE_TO_LEARN, Promise::$PROMISES_PER_PREVIEW_PAGE),
    "promisesGainedCount" => Promise::getPromisesCount(Level::$LEVEL_PROMISE_GAINED),
    "promisesToImproveCount" => Promise::getPromisesCount(Level::$LEVEL_PROMISE_TO_IMPROVE),
    "promisesToLearnCount" => Promise::getPromisesCount(Level::$LEVEL_PROMISE_TO_LEARN),
    "promiseOverviewQuestionnaires" => Question::getQuestions(Type::$SOURCE_PROMISE),
    "commentModel" => new Comment(),
    "discussionModel" => new Discussion(),
    //"promiseParentTodos" => PromiseTodo::getPromiseParentTodos($promiseId),
    "noteModel" => new Note(),
    "questionModel" => new Question(),
    "questionnaireModel" => new Questionnaire(),
    "requestModel" => new Notification(),
    "todoModel" => new Todo(),
    "todoPriorities" => $todoPriorities,
    "weblinkModel" => new Weblink(),
    "discussionModel" => new Discussion(),
    //"promiseParentDiscussions" => PromiseDiscussion::getPromiseParentDiscussions($promiseId),
    //"promiseType" => $promiseType,
    //"advicePages" => Page::getUserPages($promise->creator_id),
    //"promiseTimeline" => PromiseTimeline::getPromiseTimeline($promiseId),
    "promiseTimelineModel" => new PromiseTimeline(),
    "people" => Profile::getPeople(true),
    "timelineModel" => new Timeline(),
    //"feedbackQuestions" => Promise::getFeedbackQuestions($promise, Yii::app()->user->id),
    "promiseModel" => new Promise(),
    //"promise" => Promise::getPromise(Level::$LEVEL_CATEGORY_PROMISE, Yii::app()->user->id, null, null, 50),
    "promiseLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_PROMISE), "id", "name"),
  ));
 }

 public function actionPromise($promiseId) {
  $promise = Promise::model()->findByPk($promiseId);
  //$promiseChecklistsCount = $promise->getChecklistsCount();
  $this->render("tabs/promise_tab/_promise_item_pane", array(
    'promise' => $promise,
    'promiseId' => $promise->id,
    "promiseLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_PROMISE), "id", "name"),
    //CONTRIBUTOR
    "contributorModel" => new Contributor(),
    "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
    "promiseContributors" => $promise->getPromiseParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
    "promiseContributorsCount" => $promise->getPromiseParentContributorsCount(),
    //COMMENT
    'commentModel' => new Comment(),
    'promiseComments' => $promise->getPromiseParentComments(Comment::$COMMENTS_PER_PAGE),
    'promiseCommentsCount' => $promise->getPromiseParentCommentsCount(),
    //DISCUSSION
    "discussionModel" => new Discussion(),
    'promiseDiscussions' => $promise->getPromiseParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
    'promiseDiscussionsCount' => $promise->getPromiseParentDiscussionsCount(),
    //MENTORSHIPS
    "mentorshipPromiseModel" => new MentorshipPromise(),
    "mentorshipLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name"),
    "mentorshipPromises" => $promise->getMentorshipPromises(6),
    "mentorshipPromisesCount" => $promise->getMentorshipPromisesCount(),
    //NOTES
    "noteModel" => new Note(),
    'promiseNotes' => $promise->getPromiseParentNotes(Note::$NOTES_PER_PAGE),
    'promiseNotesCount' => $promise->getPromiseParentNotesCount(),
    //TODO
    "todoModel" => new Todo(),
    "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
    'promiseTodos' => $promise->getPromiseParentTodos(Todo::$TODOS_PER_PAGE),
    'promiseTodosCount' => $promise->getPromiseParentTodosCount(),
    //WEBLINKS
    "weblinkModel" => new Weblink(),
    'promiseWeblinks' => $promise->getPromiseParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
    'promiseWeblinksCount' => $promise->getPromiseParentWeblinksCount(),
    //TIMELINE
    'timelineModel' => new Timeline(),
    'promiseTimelineDays' => $promise->getPromiseParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
    'promiseTimelineDaysCount' => $promise->getPromiseParentTimelinesCount(),
  ));
 }

 public function actionPromiseBrowse() {
  if (Yii::app()->request->isAjaxRequest) {
   $postRow = $this->renderPartial("promise.views.promise.search._promise_browse", array(
     )
     , true);
   echo CJSON::encode(array(
     "_post_row" => $postRow));
  }
  Yii::app()->end();
 }

 public function actionPromiseLevelSearch() {
  if (Yii::app()->request->isAjaxRequest) {
   $postRow = $this->renderPartial("promise.views.promise.search.search_page._level_search_page", array(
     "promiseLevels" => Level::getLevels(Level::$LEVEL_CATEGORY_PROMISE))
     , true);
   echo CJSON::encode(array(
     "_post_row" => $postRow));
  }
  Yii::app()->end();
 }

 public function actionPromiseKeywordSearch() {
  if (Yii::app()->request->isAjaxRequest) {
   $keyword = Yii::app()->request->getParam('keyword');
   $postRow = $this->renderPartial("promise.views.promise._promise_post_row", array(
     "promise" => $promiseModel,
     "source" => Promise::$SOURCE_PROMISE)
     , true);
   echo CJSON::encode(array(
     "success" => true,
     "promise_level_id" => $promiseModel->level_id,
     "_post_row" => $postRow));
  }
  Yii::app()->end();
 }

 public function actionAddPromise($rowType = null) {
  if (Yii::app()->request->isAjaxRequest) {
   $promiseModel = new Promise;
   if (isset($_POST["Promise"]) && isset($_POST["Promise"])) {
    $promiseModel->attributes = $_POST["Promise"];
    if ($promiseModel->validate() && $promiseModel->validate()) {
     $promiseModel->created_date = date("Y-m-d");
     $promiseModel->creator_id = Yii::app()->user->id;
     if ($promiseModel->save()) {
      if (isset($_POST["gb-promise-share-with"])) {
       //PromiseShare::sharePromise($promiseModel->id, $_POST["gb-promise-share-with"]);
       //Post::addPost($promiseModel->id, Post::$TYPE_GOAL_LIST, $promiseModel->privacy, $_POST["gb-promise-share-with"]);
      } else {
       //  PromiseShare::sharePromise($promiseModel->id);
       //Post::addPost($promiseModel->id, Post::$TYPE_GOAL_LIST, $promiseModel->privacy);
      }
      $postRow = $this->renderPartial("promise.views.promise.activity.promise._promise_item", array(
        "promise" => $promiseModel)
        , true);
      echo CJSON::encode(array(
        "success" => true,
        "promise_level_id" => $promiseModel->level_id,
        "_post_row" => $postRow));
     }
    } else {
     echo CActiveForm::validate(array($promiseModel));
    }
   }
   Yii::app()->end();
  }
 }

 public function actionAddPromisePlayAnswer($answerType) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["PromisePlayAnswer"])) {
    $promisePlayAnswerModel = new PromisePlayAnswer();
    $promisePlayAnswerModel->attributes = $_POST["PromisePlayAnswer"];
    if ($promisePlayAnswerModel->validate()) {
     $promisePlayAnswerModel->creator_id = Yii::app()->user->id;
     $promisePlayAnswerModel->promise_play_answer = $answerType;
     $cdate = new DateTime("now");
     $promisePlayAnswerModel->created_date = $cdate->format("Y-m-d h:i:s");
     if ($promisePlayAnswerModel->save(false)) {
      $nextForm = $this->renderPartial('promise.views.promise.forms._promise_play_form', array(
        "actionUrl" => Yii::app()->createUrl("promise/promise/addPromisePlayAnswer", array()),
        "promisePlayAnswerModel" => new PromisePlayAnswer(),
        "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
        ), true);
      echo CJSON::encode(array(
        "success" => true,
        "_next_form" => $nextForm
      ));
     }
    } else {
     echo CActiveForm::validate($promisePlayAnswerModel);
    }
   }
  }
  Yii::app()->end();
 }

 public function actionAddPromiseTimeline($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Timeline"])) {
    $timelineModel = new Timeline();
    $timelineModel->attributes = $_POST["Timeline"];
    if ($timelineModel->validate()) {
     $timelineModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $timelineModel->created_date = $cdate->format("Y-m-d h:m:i");
     $timelineModel->timeline_date = $cdate->format("Y-m-d h:m:i");
     if ($timelineModel->save(false)) {
      $promise = Promise::model()->findByPk($promiseId);
      $promiseTimelineModel = new PromiseTimeline();
      $promiseTimelineModel->promise_id = $promiseId;
      $promiseTimelineModel->timeline_id = $timelineModel->id;
      $promiseTimelineModel->save(false);

      $postRow = $this->renderPartial('promise.views.promise.activity.timeline._promise_timelines', array(
        "promise" => $promise,
        "promiseTimelineDays" => $promise->getPromiseParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
        'promiseTimelineDaysCount' => $promise->getPromiseParentTimelinesCount(),
        "offset" => 1)
        , true);

      echo CJSON::encode(array(
        "success" => true,
        "data_source" => Type::$SOURCE_TIMELINE,
        "source_pk_id" => 0,
        "_post_row" => $postRow
      ));
     }
    } else {
     echo CActiveForm::validate($timelineModel);
    }
   }

   Yii::app()->end();
  }
 }

 public function actionAddPromiseTodo($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Todo"])) {
    $todoModel = new Todo();
    $todoModel->attributes = $_POST["Todo"];
    if ($todoModel->validate()) {
     $todoModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $todoModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($todoModel->save(false)) {
      $promiseTodoModel = new PromiseTodo();
      $promiseTodoModel->promise_id = $promiseId;
      $promiseTodoModel->todo_id = $todoModel->id;
      $promiseTodoModel->save(false);
      $postRow;
      if ($todoModel->parent_todo_id) {
       $postRow = $this->renderPartial("todo.views.todo.activity._todo_parent", array(
         "todo" => PromiseTodo::getPromiseParentTodo($todoModel->parent_todo_id, $promiseId)->todo,
         "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
         "todoCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("todo.views.todo.activity._todo_parent", array(
         "todo" => $promiseTodoModel->todo,
         "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
         "todoCounter" => "new.")
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
 }

 public function actionAddPromiseComment($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Comment"])) {
    $commentModel = new Comment();
    $commentModel->attributes = $_POST["Comment"];
    if ($commentModel->validate()) {
     $commentModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $commentModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($commentModel->save(false)) {
      $promiseCommentModel = new PromiseComment();
      $promiseCommentModel->promise_id = $promiseId;
      $promiseCommentModel->comment_id = $commentModel->id;
      $promiseCommentModel->save(false);
      $postRow;
      if ($commentModel->parent_comment_id) {
       $postRow = $this->renderPartial("comment.views.comment.activity._comment_parent", array(
         "comment" => PromiseComment::getPromiseParentComment($commentModel->parent_comment_id, $promiseId)->comment,
         "commentCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("comment.views.comment.activity._comment_parent", array(
         "comment" => $promiseCommentModel->comment,
         "commentCounter" => "new.")
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

 public function actionRequestPromiseContributor($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Contributor"])) {
    $contributorModel = new Contributor();
    $contributorModel->attributes = $_POST["Contributor"];
    if ($contributorModel->validate()) {
     $contributorModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $contributorModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($contributorModel->save(false)) {
      $promiseContributorModel = new PromiseContributor();
      $promiseContributorModel->promise_id = $promiseId;
      $promiseContributorModel->contributor_id = $contributorModel->id;
      $promiseContributorModel->save(false);
      $postRow;
      if ($contributorModel->parent_contributor_id) {
       $postRow = $this->renderPartial("contributor.views.contributor.activity._contributor_parent", array(
         "contributor" => PromiseContributor::getPromiseParentContributor($contributorModel->parent_contributor_id, $promiseId)->contributor,
         "contributorCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("contributor.views.contributor.activity._contributor_parent", array(
         "contributor" => $promiseContributorModel->contributor,
         "contributorCounter" => "new.")
         , true);
      }

      echo CJSON::encode(array(
        "success" => true,
        "data_source" => Type::$SOURCE_TODO,
        "source_pk_id" => $contributorModel->parent_contributor_id,
        "_post_row" => $postRow
      ));
     }
    } else {
     echo CActiveForm::validate($contributorModel);
    }
   }

   Yii::app()->end();
  }
 }

 public function actionAddPromiseNote($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Note"])) {
    $noteModel = new Note();
    $noteModel->attributes = $_POST["Note"];
    if ($noteModel->validate()) {
     $noteModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $noteModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($noteModel->save(false)) {
      $promiseNoteModel = new PromiseNote();
      $promiseNoteModel->promise_id = $promiseId;
      $promiseNoteModel->note_id = $noteModel->id;
      $promiseNoteModel->save(false);
      $postRow;
      if ($noteModel->parent_note_id) {
       $postRow = $this->renderPartial("note.views.note.activity._note_parent", array(
         "note" => PromiseNote::getPromiseParentNote($noteModel->parent_note_id, $promiseId)->note,
         "noteCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("note.views.note.activity._note_parent", array(
         "note" => $promiseNoteModel->note,
         "noteCounter" => "new.")
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

 public function actionAddPromiseQuestion($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Question"])) {
    $questionModel = new question();
    $questionModel->attributes = $_POST["Question"];
    if ($questionModel->validate()) {
     $questionModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $questionModel->created_date = $cdate->format("Y-m-d h:i:s");
     if ($questionModel->save(false)) {
      $promiseQuestionModel = new PromiseQuestion();
      $promiseQuestionModel->promise_id = $promiseId;
      $promiseQuestionModel->question_id = $questionModel->id;
      $promiseQuestionModel->save(false);

      $postRow = $this->renderPartial("promise.views.promise.activity.question._promise_question_parent_list_item", array(
        "promiseQuestionParent" => PromiseQuestion::getPromiseParentQuestion($questionModel->id, $promiseId),
        "questionnaireAnswerCounter" => "new")
        , true);



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

 public function actionAddPromiseDiscussion($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Discussion"])) {
    $discussionModel = new Discussion();
    $discussionModel->attributes = $_POST["Discussion"];
    if ($discussionModel->validate()) {
     $discussionModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $discussionModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($discussionModel->save(false)) {
      $promiseDiscussionModel = new PromiseDiscussion();
      $promiseDiscussionModel->promise_id = $promiseId;
      $promiseDiscussionModel->discussion_id = $discussionModel->id;
      $promiseDiscussionModel->save(false);
      $postRow;
      if ($discussionModel->parent_discussion_id) {
       $postRow = $this->renderPartial("discussion.views.discussion.activity._discussion_parent", array(
         "discussion" => PromiseDiscussion::getPromiseParentDiscussion($discussionModel->parent_discussion_id, $promiseId)->discussion,
         "discussionCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("discussion.views.discussion.activity._discussion_parent", array(
         "discussion" => $promiseDiscussionModel->discussion,
         "discussionCounter" => "new.")
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

 public function actionAddPromiseQuestionnaire($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Questionnaire"])) {
    $questionnaireModel = new Questionnaire();
    $questionnaireModel->attributes = $_POST["Questionnaire"];
    if ($questionnaireModel->validate()) {
     $questionnaireModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $questionnaireModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($questionnaireModel->save(false)) {
      $promiseQuestionnaireModel = new PromiseQuestionnaire();
      $promiseQuestionnaireModel->promise_id = $promiseId;
      $promiseQuestionnaireModel->questionnaire_id = $questionnaireModel->id;
      $promiseQuestionnaireModel->save(false);
      $postRow;
      if ($questionnaireModel->parent_questionnaire_id) {
       $postRow = $this->renderPartial("questionnaire.views.questionnaire.activity._questionnaire_parent", array(
         "questionnaire" => PromiseQuestionnaire::getPromiseParentQuestionnaire($questionnaireModel->parent_questionnaire_id, $promiseId)->questionnaire,
         "questionnaireCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("questionnaire.views.questionnaire.activity._questionnaire_parent", array(
         "questionnaire" => $promiseQuestionnaireModel->questionnaire,
         "questionnaireCounter" => "new.")
         , true);
      }

      echo CJSON::encode(array(
        "success" => true,
        "data_source" => Type::$SOURCE_TODO,
        "source_pk_id" => $questionnaireModel->parent_questionnaire_id,
        "_post_row" => $postRow
      ));
     }
    } else {
     echo CActiveForm::validate($questionnaireModel);
    }
   }

   Yii::app()->end();
  }
 }

 public function actionAddPromiseWeblink($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Weblink"])) {
    $weblinkModel = new Weblink();
    $weblinkModel->attributes = $_POST["Weblink"];
    if ($weblinkModel->validate()) {
     $weblinkModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $weblinkModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($weblinkModel->save(false)) {
      $promiseWeblinkModel = new PromiseWeblink();
      $promiseWeblinkModel->promise_id = $promiseId;
      $promiseWeblinkModel->weblink_id = $weblinkModel->id;
      $promiseWeblinkModel->save(false);
      $postRow;
      if ($weblinkModel->parent_weblink_id) {
       $postRow = $this->renderPartial("weblink.views.weblink.activity._weblink_parent", array(
         "weblink" => PromiseWeblink::getPromiseParentWeblink($weblinkModel->parent_weblink_id, $promiseId)->weblink,
         "weblinkCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("weblink.views.weblink.activity._weblink_parent", array(
         "weblink" => $promiseWeblinkModel->weblink,
         "weblinkCounter" => "new.")
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

 public function actionAppendMorePromise() {
  if (Yii::app()->request->isAjaxRequest) {
   $nextPage = Yii::app()->request->getParam("next_page") * 100;
   $type = Yii::app()->request->getParam("type");
   $bankSearchCriteria = Bank::getBankSearchCriteria(PromiseType::$CATEGORY_PROMISE, null, 100, $nextPage);
   switch ($type) {
    case 1:
     echo CJSON::encode(array(
       "_promise_bank_list" => $this->renderPartial("promise.views.promise._promise_bank_list", array(
         "promiseBank" => Bank::model()->findAll($bankSearchCriteria))
         , true
     )));
     break;
    case 2:
     echo CJSON::encode(array(
       "_promise_bank_list" => $this->renderPartial("promise.views.promise._promise_bank_list_1", array(
         "promiseBank" => Bank::model()->findAll($bankSearchCriteria))
         , true
     )));
     break;
   }
   Yii::app()->end();
  }
 }

 /**
  * Manages all models.
  */
 public function actionAdmin() {
  $model = new Promise("search");
  $model->unsetAttributes(); // clear any default values
  if (isset($_GET["Promise"]))
   $model->attributes = $_GET["Promise"];

  $this->render("admin", array(
    "model" => $model,
  ));
 }

 /**
  * Returns the data model based on the primary key given in the GET variable.
  * If the data model is not found, an HTTP exception will be raised.
  * @param integer $id the ID of the model to be loaded
  * @return Promise the loaded model
  * @throws CHttpException
  */
 public function loadModel($id) {
  $model = Promise::model()->findByPk($id);
  if ($model === null)
   throw new CHttpException(404, "The requested page does not exist.");
  return $model;
 }

 /**
  * Performs the AJAX validation.
  * @param Promise $model the model to be validated
  */
 protected function performAjaxValidation($model) {
  if (isset($_POST["ajax"]) && $_POST["ajax"] === "promise-form") {
   echo CActiveForm::validate($model);
   Yii::app()->end();
  }
 }

}
