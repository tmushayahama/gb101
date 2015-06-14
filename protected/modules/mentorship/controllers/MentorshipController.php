<?php

class MentorshipController extends Controller {
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
      "actions" => array("index", "mentorshipbank", "mentorshipbankdetail", "appendMoreMentorship"),
      "users" => array("*"),
    ),
    array("allow", // allow authenticated user to perform "create" and "update" actions
      "actions" => array(
        "mentorshipHome",
        "mentorshipbank",
        "addmentorship",
        "answerMentorshipQuestionOverview",
        "addMentorshipComment",
        "addMentorshipContributor",
        "addMentorshipQuestionnaire",
        "addMentorshipTodo",
        "addMentorshipDiscussion",
        "AddMentorshipWeblink",
        "addMentorshipNote",
        "addMentorshipTimeline"),
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

 public function actionMentorshipHome() {
  //$mentorship = Mentorship::Model()->findByPk($mentorshipId);
  $todoPriorities = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name");
  $this->render("mentorship_home", array(
    "mentorshipLevels" => Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP),
    "mentorships" => Mentorship::getMentorships(),
    "mentorshipsCount" => Mentorship::getMentorshipsCount(),
    "mentorshipsGained" => Mentorship::getMentorships(Level::$LEVEL_MENTORSHIP_GAINED, Mentorship::$MENTORSHIPS_PER_PREVIEW_PAGE),
    "mentorshipsToImprove" => Mentorship::getMentorships(Level::$LEVEL_MENTORSHIP_TO_IMPROVE, Mentorship::$MENTORSHIPS_PER_PREVIEW_PAGE),
    "mentorshipsToLearn" => Mentorship::getMentorships(Level::$LEVEL_MENTORSHIP_TO_LEARN, Mentorship::$MENTORSHIPS_PER_PREVIEW_PAGE),
    "mentorshipsGainedCount" => Mentorship::getMentorshipsCount(Level::$LEVEL_MENTORSHIP_GAINED),
    "mentorshipsToImproveCount" => Mentorship::getMentorshipsCount(Level::$LEVEL_MENTORSHIP_TO_IMPROVE),
    "mentorshipsToLearnCount" => Mentorship::getMentorshipsCount(Level::$LEVEL_MENTORSHIP_TO_LEARN),
    "mentorshipOverviewQuestionnaires" => Question::getQuestions(Type::$SOURCE_MENTORSHIP),
    "commentModel" => new Comment(),
    "discussionModel" => new Discussion(),
    //"mentorshipParentTodos" => MentorshipTodo::getMentorshipParentTodos($mentorshipId),
    "noteModel" => new Note(),
    "questionModel" => new Question(),
    "questionnaireModel" => new Questionnaire(),
    "requestModel" => new Notification(),
    "todoModel" => new Todo(),
    "todoPriorities" => $todoPriorities,
    "weblinkModel" => new Weblink(),
    "discussionModel" => new Discussion(),
    //"mentorshipParentDiscussions" => MentorshipDiscussion::getMentorshipParentDiscussions($mentorshipId),
    //"mentorshipType" => $mentorshipType,
    //"advicePages" => Page::getUserPages($mentorship->creator_id),
    //"mentorshipTimeline" => MentorshipTimeline::getMentorshipTimeline($mentorshipId),
    "mentorshipTimelineModel" => new MentorshipTimeline(),
    "people" => Profile::getPeople(true),
    "timelineModel" => new Timeline(),
    //"feedbackQuestions" => Mentorship::getFeedbackQuestions($mentorship, Yii::app()->user->id),
    "mentorshipModel" => new Mentorship(),
    //"mentorship" => Mentorship::getMentorship(Level::$LEVEL_CATEGORY_MENTORSHIP, Yii::app()->user->id, null, null, 50),
    "mentorshipLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name"),
  ));
 }

 public function actionAddMentorship($rowType = null, $skillId = null, $requesteeId = null) {
  if (Yii::app()->request->isAjaxRequest) {
   $mentorshipModel = new Mentorship;
   if (isset($_POST["Mentorship"])) {
    $mentorshipModel->attributes = $_POST["Mentorship"];
    if ($mentorshipModel->validate() && $mentorshipModel->validate()) {
     $mentorshipModel->created_date = date("Y-m-d");
     $mentorshipModel->creator_id = Yii::app()->user->id;
     if ($mentorshipModel->save()) {
      if ($skillId && $requesteeId) {
       MentorshipSkill::CreateMentorshipSkill($mentorshipModel, $skillId, $requesteeId);
      }
      if (isset($_POST["gb-mentorship-share-with"])) {
       //MentorshipShare::shareMentorship($mentorshipModel->id, $_POST["gb-mentorship-share-with"]);
       // Post::addPost($mentorshipModel->id, Post::$TYPE_GOAL_LIST, $mentorshipModel->privacy, $_POST["gb-mentorship-share-with"]);
      } else {
       //  MentorshipShare::shareMentorship($mentorshipModel->id);
       //Post::addPost($mentorshipModel->id, Post::$TYPE_GOAL_LIST, $mentorshipModel->privacy);
      }
      $postRow;
      if ($rowType) {
       switch ($rowType) {
        case Type::$ROW_TYPE_NAV:
         $postRow = $this->renderPartial("mentorship.views.mentorship.activity.mentorship._mentorship_item", array(
           "mentorship" => $mentorshipModel)
           , true);
       }
      } else {
       $postRow = $this->renderPartial("mentorship.views.mentorship._mentorship_post_row", array(
         "mentorship" => $mentorshipModel,
         "source" => Mentorship::$SOURCE_MENTORSHIP)
         , true);
      }
      echo CJSON::encode(array(
        "success" => true,
        "mentorship_level_id" => $mentorshipModel->level_id,
        "_post_row" => $postRow));
     }
    } else {
     echo CActiveForm::validate(array($mentorshipModel));
    }
   }
   Yii::app()->end();
  }
 }

 public function actionAnswerMentorshipQuestionOverview($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["MentorshipQuestionAnswer"])) {
    $mentorshipQuestionAnswerModel = new MentorshipQuestionAnswer();
    $mentorshipQuestionAnswerModel->attributes = $_POST["MentorshipQuestionAnswer"];
    $mentorshipQuestionAnswerModel->mentorship_id = $mentorshipId;
    if ($mentorshipQuestionAnswerModel->validate()) {
     $mentorshipQuestionAnswerModel->user_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $mentorshipQuestionAnswerModel->created_date = $cdate->format("Y-m-d h:i:s");
     if ($mentorshipQuestionAnswerModel->save(false)) {
      $postRow = $this->renderPartial('mentorship.views.mentorship.activity.question._overview_question_answer_row', array(
        "mentorshipQuestionAnswer" => $mentorshipQuestionAnswerModel,
        ), true);
      echo CJSON::encode(array(
        "success" => true,
        // "data_source" => Type::$SOURCE_TODO,
        //"source_pk_id" => $userQuestionAnswerModel->parent_question_id,
        "_post_row" => $postRow
      ));
     }
    } else {
     echo CActiveForm::validate($mentorshipQuestionAnswerModel);
    }
   }

   Yii::app()->end();
  }
 }

 public function actionAddMentorshipTimeline($mentorshipId) {
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
      $mentorship = Mentorship::model()->findByPk($mentorshipId);
      $mentorshipTimelineModel = new MentorshipTimeline();
      $mentorshipTimelineModel->mentorship_id = $mentorshipId;
      $mentorshipTimelineModel->timeline_id = $timelineModel->id;
      $mentorshipTimelineModel->save(false);

      $postRow = $this->renderPartial('mentorship.views.mentorship.activity.timeline._mentorship_timelines', array(
        "mentorship" => $mentorship,
        "mentorshipTimelineDays" => $mentorship->getMentorshipParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
        'mentorshipTimelineDaysCount' => $mentorship->getMentorshipParentTimelinesCount(),
        "offset" => 1)
        , true);

      echo CJSON::encode(array(
        "success" => true,
        "data_source" => Type::$SOURCE_TIMELINE,
        "source_pk_id" => $mentorshipId,
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

 public function actionAddMentorshipTodo($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Todo"])) {
    $todoModel = new Todo();
    $todoModel->attributes = $_POST["Todo"];
    if ($todoModel->validate()) {
     $todoModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $todoModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($todoModel->save(false)) {
      $mentorshipTodoModel = new MentorshipTodo();
      $mentorshipTodoModel->mentorship_id = $mentorshipId;
      $mentorshipTodoModel->todo_id = $todoModel->id;
      $mentorshipTodoModel->save(false);
      $postRow;
      if ($todoModel->parent_todo_id) {
       $postRow = $this->renderPartial("todo.views.todo.activity._todo_parent", array(
         "todo" => MentorshipTodo::getMentorshipParentTodo($todoModel->parent_todo_id, $mentorshipId)->todo,
         "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
         "todoCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("todo.views.todo.activity._todo_parent", array(
         "todo" => $mentorshipTodoModel->todo,
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

 public function actionAddMentorshipComment($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Comment"])) {
    $commentModel = new Comment();
    $commentModel->attributes = $_POST["Comment"];
    if ($commentModel->validate()) {
     $commentModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $commentModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($commentModel->save(false)) {
      $mentorshipCommentModel = new MentorshipComment();
      $mentorshipCommentModel->mentorship_id = $mentorshipId;
      $mentorshipCommentModel->comment_id = $commentModel->id;
      $mentorshipCommentModel->save(false);
      $postRow;
      if ($commentModel->parent_comment_id) {
       $postRow = $this->renderPartial("comment.views.comment.activity._comment_parent", array(
         "comment" => MentorshipComment::getMentorshipParentComment($commentModel->parent_comment_id, $mentorshipId)->comment,
         "commentCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("comment.views.comment.activity._comment_parent", array(
         "comment" => $mentorshipCommentModel->comment,
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

 public function actionAddMentorshipContributor($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Contributor"])) {
    $contributorModel = new Contributor();
    $contributorModel->attributes = $_POST["Contributor"];
    if ($contributorModel->validate()) {
     $contributorModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $contributorModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($contributorModel->save(false)) {
      $mentorshipContributorModel = new MentorshipContributor();
      $mentorshipContributorModel->mentorship_id = $mentorshipId;
      $mentorshipContributorModel->contributor_id = $contributorModel->id;
      $mentorshipContributorModel->save(false);
      $postRow;
      if ($contributorModel->parent_contributor_id) {
       $postRow = $this->renderPartial("contributor.views.contributor.activity._contributor_parent", array(
         "contributor" => MentorshipContributor::getMentorshipParentContributor($contributorModel->parent_contributor_id, $mentorshipId)->contributor,
         "contributorCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("contributor.views.contributor.activity._contributor_parent", array(
         "contributor" => $mentorshipContributorModel->contributor,
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

 public function actionAddMentorshipNote($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Note"])) {
    $noteModel = new Note();
    $noteModel->attributes = $_POST["Note"];
    if ($noteModel->validate()) {
     $noteModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $noteModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($noteModel->save(false)) {
      $mentorshipNoteModel = new MentorshipNote();
      $mentorshipNoteModel->mentorship_id = $mentorshipId;
      $mentorshipNoteModel->note_id = $noteModel->id;
      $mentorshipNoteModel->save(false);
      $postRow;
      if ($noteModel->parent_note_id) {
       $postRow = $this->renderPartial("note.views.note.activity._note_parent", array(
         "note" => MentorshipNote::getMentorshipParentNote($noteModel->parent_note_id, $mentorshipId)->note,
         "noteCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("note.views.note.activity._note_parent", array(
         "note" => $mentorshipNoteModel->note,
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

 public function actionAddMentorshipQuestion($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Question"])) {
    $questionModel = new question();
    $questionModel->attributes = $_POST["Question"];
    if ($questionModel->validate()) {
     $questionModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $questionModel->created_date = $cdate->format("Y-m-d h:i:s");
     if ($questionModel->save(false)) {
      $mentorshipQuestionModel = new MentorshipQuestion();
      $mentorshipQuestionModel->mentorship_id = $mentorshipId;
      $mentorshipQuestionModel->question_id = $questionModel->id;
      $mentorshipQuestionModel->save(false);

      $postRow = $this->renderPartial("mentorship.views.mentorship.activity.question._mentorship_question_parent_list_item", array(
        "mentorshipQuestionParent" => MentorshipQuestion::getMentorshipParentQuestion($questionModel->id, $mentorshipId),
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

 public function actionAddMentorshipDiscussion($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Discussion"])) {
    $discussionModel = new Discussion();
    $discussionModel->attributes = $_POST["Discussion"];
    if ($discussionModel->validate()) {
     $discussionModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $discussionModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($discussionModel->save(false)) {
      $mentorshipDiscussionModel = new MentorshipDiscussion();
      $mentorshipDiscussionModel->mentorship_id = $mentorshipId;
      $mentorshipDiscussionModel->discussion_id = $discussionModel->id;
      $mentorshipDiscussionModel->save(false);
      $postRow;
      if ($discussionModel->parent_discussion_id) {
       $postRow = $this->renderPartial("discussion.views.discussion.activity._discussion_parent", array(
         "discussion" => MentorshipDiscussion::getMentorshipParentDiscussion($discussionModel->parent_discussion_id, $mentorshipId)->discussion,
         "discussionCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("discussion.views.discussion.activity._discussion_parent", array(
         "discussion" => $mentorshipDiscussionModel->discussion,
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

 public function actionAddMentorshipQuestionnaire($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Questionnaire"])) {
    $questionnaireModel = new Questionnaire();
    $questionnaireModel->attributes = $_POST["Questionnaire"];
    if ($questionnaireModel->validate()) {
     $questionnaireModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $questionnaireModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($questionnaireModel->save(false)) {
      $mentorshipQuestionnaireModel = new MentorshipQuestionnaire();
      $mentorshipQuestionnaireModel->mentorship_id = $mentorshipId;
      $mentorshipQuestionnaireModel->questionnaire_id = $questionnaireModel->id;
      $mentorshipQuestionnaireModel->save(false);
      $postRow;
      if ($questionnaireModel->parent_questionnaire_id) {
       $postRow = $this->renderPartial("questionnaire.views.questionnaire.activity._questionnaire_parent", array(
         "questionnaire" => MentorshipQuestionnaire::getMentorshipParentQuestionnaire($questionnaireModel->parent_questionnaire_id, $mentorshipId)->questionnaire,
         "questionnaireCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("questionnaire.views.questionnaire.activity._questionnaire_parent", array(
         "questionnaire" => $mentorshipQuestionnaireModel->questionnaire,
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

 public function actionAddMentorshipWeblink($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Weblink"])) {
    $weblinkModel = new Weblink();
    $weblinkModel->attributes = $_POST["Weblink"];
    if ($weblinkModel->validate()) {
     $weblinkModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $weblinkModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($weblinkModel->save(false)) {
      $mentorshipWeblinkModel = new MentorshipWeblink();
      $mentorshipWeblinkModel->mentorship_id = $mentorshipId;
      $mentorshipWeblinkModel->weblink_id = $weblinkModel->id;
      $mentorshipWeblinkModel->save(false);
      $postRow;
      if ($weblinkModel->parent_weblink_id) {
       $postRow = $this->renderPartial("weblink.views.weblink.activity._weblink_parent", array(
         "weblink" => MentorshipWeblink::getMentorshipParentWeblink($weblinkModel->parent_weblink_id, $mentorshipId)->weblink,
         "weblinkCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("weblink.views.weblink.activity._weblink_parent", array(
         "weblink" => $mentorshipWeblinkModel->weblink,
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

 public function actionAppendMoreMentorship() {
  if (Yii::app()->request->isAjaxRequest) {
   $nextPage = Yii::app()->request->getParam("next_page") * 100;
   $type = Yii::app()->request->getParam("type");
   $bankSearchCriteria = Bank::getBankSearchCriteria(MentorshipType::$CATEGORY_MENTORSHIP, null, 100, $nextPage);
   switch ($type) {
    case 1:
     echo CJSON::encode(array(
       "_mentorship_bank_list" => $this->renderPartial("mentorship.views.mentorship._mentorship_bank_list", array(
         "mentorshipBank" => Bank::model()->findAll($bankSearchCriteria))
         , true
     )));
     break;
    case 2:
     echo CJSON::encode(array(
       "_mentorship_bank_list" => $this->renderPartial("mentorship.views.mentorship._mentorship_bank_list_1", array(
         "mentorshipBank" => Bank::model()->findAll($bankSearchCriteria))
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
  $model = new Mentorship("search");
  $model->unsetAttributes(); // clear any default values
  if (isset($_GET["Mentorship"]))
   $model->attributes = $_GET["Mentorship"];

  $this->render("admin", array(
    "model" => $model,
  ));
 }

 /**
  * Returns the data model based on the primary key given in the GET variable.
  * If the data model is not found, an HTTP exception will be raised.
  * @param integer $id the ID of the model to be loaded
  * @return Mentorship the loaded model
  * @throws CHttpException
  */
 public function loadModel($id) {
  $model = Mentorship::model()->findByPk($id);
  if ($model === null)
   throw new CHttpException(404, "The requested page does not exist.");
  return $model;
 }

 /**
  * Performs the AJAX validation.
  * @param Mentorship $model the model to be validated
  */
 protected function performAjaxValidation($model) {
  if (isset($_POST["ajax"]) && $_POST["ajax"] === "mentorship-form") {
   echo CActiveForm::validate($model);
   Yii::app()->end();
  }
 }

}
