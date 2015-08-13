<?php

class AdviceController extends Controller {
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
      "actions" => array("index", "advicebank", "advicebankdetail", "appendMoreAdvice"),
      "users" => array("*"),
    ),
    array("allow", // allow authenticated user to perform "create" and "update" actions
      "actions" => array(
        "advice",
        "adviceHome",
        "advicebank",
        "addadvice",
        "addAdvicePlayAnswer",
        "answerAdviceQuestionOverview",
        "addAdviceComment",
        "addAdviceContributor",
        "addAdviceQuestionnaire",
        "addAdviceTodo",
        "addAdviceDiscussion",
        "AddAdviceWeblink",
        "addAdviceNote",
        "addAdviceTimeline"),
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

 public function actionAdviceHome() {
  //$advice = Advice::Model()->findByPk($adviceId);
  $todoPriorities = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name");
  $this->render("advice_home", array(
    "adviceLevels" => Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE),
    "advices" => Advice::getAdvices(),
    "advicesCount" => Advice::getAdvicesCount(),
    "advicesGained" => Advice::getAdvices(Level::$LEVEL_ADVICE_GAINED, Advice::$ADVICES_PER_PREVIEW_PAGE),
    "advicesToImprove" => Advice::getAdvices(Level::$LEVEL_ADVICE_TO_IMPROVE, Advice::$ADVICES_PER_PREVIEW_PAGE),
    "advicesToLearn" => Advice::getAdvices(Level::$LEVEL_ADVICE_TO_LEARN, Advice::$ADVICES_PER_PREVIEW_PAGE),
    "advicesGainedCount" => Advice::getAdvicesCount(Level::$LEVEL_ADVICE_GAINED),
    "advicesToImproveCount" => Advice::getAdvicesCount(Level::$LEVEL_ADVICE_TO_IMPROVE),
    "advicesToLearnCount" => Advice::getAdvicesCount(Level::$LEVEL_ADVICE_TO_LEARN),
    "adviceOverviewQuestionnaires" => Question::getQuestions(Type::$SOURCE_ADVICE),
    "commentModel" => new Comment(),
    "discussionModel" => new Discussion(),
    //"adviceParentTodos" => AdviceTodo::getAdviceParentTodos($adviceId),
    "noteModel" => new Note(),
    "questionModel" => new Question(),
    "questionnaireModel" => new Questionnaire(),
    "requestModel" => new Notification(),
    "todoModel" => new Todo(),
    "todoPriorities" => $todoPriorities,
    "weblinkModel" => new Weblink(),
    "discussionModel" => new Discussion(),
    //"adviceParentDiscussions" => AdviceDiscussion::getAdviceParentDiscussions($adviceId),
    //"adviceType" => $adviceType,
    //"advicePages" => Page::getUserPages($advice->creator_id),
    //"adviceTimeline" => AdviceTimeline::getAdviceTimeline($adviceId),
    "adviceTimelineModel" => new AdviceTimeline(),
    "people" => Profile::getPeople(true),
    "timelineModel" => new Timeline(),
    //"feedbackQuestions" => Advice::getFeedbackQuestions($advice, Yii::app()->user->id),
    "adviceModel" => new Advice(),
    //"advice" => Advice::getAdvice(Level::$LEVEL_CATEGORY_ADVICE, Yii::app()->user->id, null, null, 50),
    "adviceLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE), "id", "name"),
  ));
 }

 public function actionAdvice($adviceId) {
  $advice = Advice::model()->findByPk($adviceId);
  //$adviceChecklistsCount = $advice->getChecklistsCount();
  $this->render("tabs/advices_tab/_advice_detail_pane", array(
    "selected_tab_url" => Yii::app()->createUrl("app/advice/", array("adviceId" => $adviceId)),
    'advice' => $advice,
    "contributorModel" => new Contributor(),
    "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE_TYPE), "id", "name"),
    "adviceChildren" => Advice::getAdvices(null, $advice->id, Advice::$ADVICES_PER_PAGE),
    "adviceChildrenCount" => Advice::getAdvicesCount(null, $advice->id),
    // 'adviceChecklists' => $advice->getChecklists(Checklist::$CHECKLISTS_PER_OVERVIEW_PAGE),
    // 'adviceChecklistsCount' => $adviceChecklistsCount,
    // 'adviceChecklistsProgressCount' => $advice->getProgress($adviceChecklistsCount),
    // 'adviceContributors' => $advice->getContributors(null, 6),
    // 'adviceContributorsCount' => $advice->getContributorsCount(),
    'timelineModel' => new Timeline(),
    'adviceTimelineDays' => $advice->getAdviceParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
    'adviceTimelineDaysCount' => $advice->getAdviceParentTimelinesCount(),
    // 'adviceNotes' => $advice->getAdviceParentNotes(Note::$NOTES_PER_OVERVIEW_PAGE),
    // 'adviceNotesCount' => $advice->getAdviceParentNotesCount(),
    //  'adviceWeblinks' => $advice->getAdviceParentWeblinks(3),
    // 'adviceWeblinksCount' => $advice->getAdviceParentWeblinksCount(),
    )
  );
 }

 public function actionAddAdvice($rowType = null, $skillId = null, $requesteeId = null) {
  if (Yii::app()->request->isAjaxRequest) {
   $adviceModel = new Advice;
   if (isset($_POST["Advice"])) {
    $adviceModel->attributes = $_POST["Advice"];
    if ($adviceModel->validate() && $adviceModel->validate()) {
     $adviceModel->created_date = date("Y-m-d");
     $adviceModel->creator_id = Yii::app()->user->id;
     if ($adviceModel->save()) {
      if ($skillId && $requesteeId) {
       AdviceSkill::CreateAdviceSkill($adviceModel, $skillId, $requesteeId);
      }
      if (isset($_POST["gb-advice-share-with"])) {
       //AdviceShare::shareAdvice($adviceModel->id, $_POST["gb-advice-share-with"]);
       // Post::addPost($adviceModel->id, Post::$TYPE_GOAL_LIST, $adviceModel->privacy, $_POST["gb-advice-share-with"]);
      } else {
       //  AdviceShare::shareAdvice($adviceModel->id);
       //Post::addPost($adviceModel->id, Post::$TYPE_GOAL_LIST, $adviceModel->privacy);
      }
      $postRow;
      if ($rowType) {
       switch ($rowType) {
        case Type::$ROW_TYPE_NAV:
         $postRow = $this->renderPartial("advice.views.advice.activity.advice._advice_item", array(
           "advice" => $adviceModel)
           , true);
       }
      } else {
       $postRow = $this->renderPartial("advice.views.advice._advice_post_row", array(
         "advice" => $adviceModel,
         "source" => Advice::$SOURCE_ADVICE)
         , true);
      }
      echo CJSON::encode(array(
        "success" => true,
        "advice_level_id" => $adviceModel->level_id,
        "_post_row" => $postRow));
     }
    } else {
     echo CActiveForm::validate(array($adviceModel));
    }
   }
   Yii::app()->end();
  }
 }

 public function actionAddAdvicePlayAnswer($answerType) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["AdvicePlayAnswer"])) {
    $advicePlayAnswerModel = new AdvicePlayAnswer();
    $advicePlayAnswerModel->attributes = $_POST["AdvicePlayAnswer"];
    if ($advicePlayAnswerModel->validate()) {
     $advicePlayAnswerModel->creator_id = Yii::app()->user->id;
     $advicePlayAnswerModel->advice_play_answer = $answerType;
     $cdate = new DateTime("now");
     $advicePlayAnswerModel->created_date = $cdate->format("Y-m-d h:i:s");
     if ($advicePlayAnswerModel->save(false)) {
      $nextForm = $this->renderPartial('advice.views.advice.forms._advice_play_form', array(
        "actionUrl" => Yii::app()->createUrl("advice/advice/addAdvicePlayAnswer", array()),
        "advicePlayAnswerModel" => new AdvicePlayAnswer(),
        "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
        ), true);
      echo CJSON::encode(array(
        "success" => true,
        "_next_form" => $nextForm
      ));
     }
    } else {
     echo CActiveForm::validate($advicePlayAnswerModel);
    }
   }
  }
  Yii::app()->end();
 }

 public function actionAnswerAdviceQuestionOverview($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["AdviceQuestionAnswer"])) {
    $adviceQuestionAnswerModel = new AdviceQuestionAnswer();
    $adviceQuestionAnswerModel->attributes = $_POST["AdviceQuestionAnswer"];
    $adviceQuestionAnswerModel->advice_id = $adviceId;
    if ($adviceQuestionAnswerModel->validate()) {
     $adviceQuestionAnswerModel->user_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $adviceQuestionAnswerModel->created_date = $cdate->format("Y-m-d h:i:s");
     if ($adviceQuestionAnswerModel->save(false)) {
      $postRow = $this->renderPartial('advice.views.advice.activity.question._overview_question_answer_row', array(
        "adviceQuestionAnswer" => $adviceQuestionAnswerModel,
        ), true);
      echo CJSON::encode(array(
        "success" => true,
        // "data_source" => Type::$SOURCE_TODO,
        //"source_pk_id" => $userQuestionAnswerModel->parent_question_id,
        "_post_row" => $postRow
      ));
     }
    } else {
     echo CActiveForm::validate($adviceQuestionAnswerModel);
    }
   }

   Yii::app()->end();
  }
 }

 public function actionAddAdviceTimeline($adviceId) {
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
      $advice = Advice::model()->findByPk($adviceId);
      $adviceTimelineModel = new AdviceTimeline();
      $adviceTimelineModel->advice_id = $adviceId;
      $adviceTimelineModel->timeline_id = $timelineModel->id;
      $adviceTimelineModel->save(false);

      $postRow = $this->renderPartial('advice.views.advice.activity.timeline._advice_timelines', array(
        "advice" => $advice,
        "adviceTimelineDays" => $advice->getAdviceParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
        'adviceTimelineDaysCount' => $advice->getAdviceParentTimelinesCount(),
        "offset" => 1)
        , true);

      echo CJSON::encode(array(
        "success" => true,
        "data_source" => Type::$SOURCE_TIMELINE,
        "source_pk_id" => $adviceId,
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

 public function actionAddAdviceTodo($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Todo"])) {
    $todoModel = new Todo();
    $todoModel->attributes = $_POST["Todo"];
    if ($todoModel->validate()) {
     $todoModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $todoModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($todoModel->save(false)) {
      $adviceTodoModel = new AdviceTodo();
      $adviceTodoModel->advice_id = $adviceId;
      $adviceTodoModel->todo_id = $todoModel->id;
      $adviceTodoModel->save(false);
      $postRow;
      if ($todoModel->parent_todo_id) {
       $postRow = $this->renderPartial("todo.views.todo.activity._todo_parent", array(
         "todo" => AdviceTodo::getAdviceParentTodo($todoModel->parent_todo_id, $adviceId)->todo,
         "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
         "todoCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("todo.views.todo.activity._todo_parent", array(
         "todo" => $adviceTodoModel->todo,
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

 public function actionAddAdviceComment($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Comment"])) {
    $commentModel = new Comment();
    $commentModel->attributes = $_POST["Comment"];
    if ($commentModel->validate()) {
     $commentModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $commentModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($commentModel->save(false)) {
      $adviceCommentModel = new AdviceComment();
      $adviceCommentModel->advice_id = $adviceId;
      $adviceCommentModel->comment_id = $commentModel->id;
      $adviceCommentModel->save(false);
      $postRow;
      if ($commentModel->parent_comment_id) {
       $postRow = $this->renderPartial("comment.views.comment.activity._comment_parent", array(
         "comment" => AdviceComment::getAdviceParentComment($commentModel->parent_comment_id, $adviceId)->comment,
         "commentCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("comment.views.comment.activity._comment_parent", array(
         "comment" => $adviceCommentModel->comment,
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

 public function actionAddAdviceContributor($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Contributor"])) {
    $contributorModel = new Contributor();
    $contributorModel->attributes = $_POST["Contributor"];
    if ($contributorModel->validate()) {
     $contributorModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $contributorModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($contributorModel->save(false)) {
      $adviceContributorModel = new AdviceContributor();
      $adviceContributorModel->advice_id = $adviceId;
      $adviceContributorModel->contributor_id = $contributorModel->id;
      $adviceContributorModel->save(false);
      $postRow;
      if ($contributorModel->parent_contributor_id) {
       $postRow = $this->renderPartial("contributor.views.contributor.activity._contributor_parent", array(
         "contributor" => AdviceContributor::getAdviceParentContributor($contributorModel->parent_contributor_id, $adviceId)->contributor,
         "contributorCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("contributor.views.contributor.activity._contributor_parent", array(
         "contributor" => $adviceContributorModel->contributor,
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

 public function actionAddAdviceNote($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Note"])) {
    $noteModel = new Note();
    $noteModel->attributes = $_POST["Note"];
    if ($noteModel->validate()) {
     $noteModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $noteModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($noteModel->save(false)) {
      $adviceNoteModel = new AdviceNote();
      $adviceNoteModel->advice_id = $adviceId;
      $adviceNoteModel->note_id = $noteModel->id;
      $adviceNoteModel->save(false);
      $postRow;
      if ($noteModel->parent_note_id) {
       $postRow = $this->renderPartial("note.views.note.activity._note_parent", array(
         "note" => AdviceNote::getAdviceParentNote($noteModel->parent_note_id, $adviceId)->note,
         "noteCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("note.views.note.activity._note_parent", array(
         "note" => $adviceNoteModel->note,
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

 public function actionAddAdviceQuestion($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Question"])) {
    $questionModel = new question();
    $questionModel->attributes = $_POST["Question"];
    if ($questionModel->validate()) {
     $questionModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $questionModel->created_date = $cdate->format("Y-m-d h:i:s");
     if ($questionModel->save(false)) {
      $adviceQuestionModel = new AdviceQuestion();
      $adviceQuestionModel->advice_id = $adviceId;
      $adviceQuestionModel->question_id = $questionModel->id;
      $adviceQuestionModel->save(false);

      $postRow = $this->renderPartial("advice.views.advice.activity.question._advice_question_parent_list_item", array(
        "adviceQuestionParent" => AdviceQuestion::getAdviceParentQuestion($questionModel->id, $adviceId),
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

 public function actionAddAdviceDiscussion($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Discussion"])) {
    $discussionModel = new Discussion();
    $discussionModel->attributes = $_POST["Discussion"];
    if ($discussionModel->validate()) {
     $discussionModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $discussionModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($discussionModel->save(false)) {
      $adviceDiscussionModel = new AdviceDiscussion();
      $adviceDiscussionModel->advice_id = $adviceId;
      $adviceDiscussionModel->discussion_id = $discussionModel->id;
      $adviceDiscussionModel->save(false);
      $postRow;
      if ($discussionModel->parent_discussion_id) {
       $postRow = $this->renderPartial("discussion.views.discussion.activity._discussion_parent", array(
         "discussion" => AdviceDiscussion::getAdviceParentDiscussion($discussionModel->parent_discussion_id, $adviceId)->discussion,
         "discussionCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("discussion.views.discussion.activity._discussion_parent", array(
         "discussion" => $adviceDiscussionModel->discussion,
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

 public function actionAddAdviceQuestionnaire($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Questionnaire"])) {
    $questionnaireModel = new Questionnaire();
    $questionnaireModel->attributes = $_POST["Questionnaire"];
    if ($questionnaireModel->validate()) {
     $questionnaireModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $questionnaireModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($questionnaireModel->save(false)) {
      $adviceQuestionnaireModel = new AdviceQuestionnaire();
      $adviceQuestionnaireModel->advice_id = $adviceId;
      $adviceQuestionnaireModel->questionnaire_id = $questionnaireModel->id;
      $adviceQuestionnaireModel->save(false);
      $postRow;
      if ($questionnaireModel->parent_questionnaire_id) {
       $postRow = $this->renderPartial("questionnaire.views.questionnaire.activity._questionnaire_parent", array(
         "questionnaire" => AdviceQuestionnaire::getAdviceParentQuestionnaire($questionnaireModel->parent_questionnaire_id, $adviceId)->questionnaire,
         "questionnaireCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("questionnaire.views.questionnaire.activity._questionnaire_parent", array(
         "questionnaire" => $adviceQuestionnaireModel->questionnaire,
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

 public function actionAddAdviceWeblink($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Weblink"])) {
    $weblinkModel = new Weblink();
    $weblinkModel->attributes = $_POST["Weblink"];
    if ($weblinkModel->validate()) {
     $weblinkModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $weblinkModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($weblinkModel->save(false)) {
      $adviceWeblinkModel = new AdviceWeblink();
      $adviceWeblinkModel->advice_id = $adviceId;
      $adviceWeblinkModel->weblink_id = $weblinkModel->id;
      $adviceWeblinkModel->save(false);
      $postRow;
      if ($weblinkModel->parent_weblink_id) {
       $postRow = $this->renderPartial("weblink.views.weblink.activity._weblink_parent", array(
         "weblink" => AdviceWeblink::getAdviceParentWeblink($weblinkModel->parent_weblink_id, $adviceId)->weblink,
         "weblinkCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("weblink.views.weblink.activity._weblink_parent", array(
         "weblink" => $adviceWeblinkModel->weblink,
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

 public function actionAppendMoreAdvice() {
  if (Yii::app()->request->isAjaxRequest) {
   $nextPage = Yii::app()->request->getParam("next_page") * 100;
   $type = Yii::app()->request->getParam("type");
   $bankSearchCriteria = Bank::getBankSearchCriteria(AdviceType::$CATEGORY_ADVICE, null, 100, $nextPage);
   switch ($type) {
    case 1:
     echo CJSON::encode(array(
       "_advice_bank_list" => $this->renderPartial("advice.views.advice._advice_bank_list", array(
         "adviceBank" => Bank::model()->findAll($bankSearchCriteria))
         , true
     )));
     break;
    case 2:
     echo CJSON::encode(array(
       "_advice_bank_list" => $this->renderPartial("advice.views.advice._advice_bank_list_1", array(
         "adviceBank" => Bank::model()->findAll($bankSearchCriteria))
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
  $model = new Advice("search");
  $model->unsetAttributes(); // clear any default values
  if (isset($_GET["Advice"]))
   $model->attributes = $_GET["Advice"];

  $this->render("admin", array(
    "model" => $model,
  ));
 }

 /**
  * Returns the data model based on the primary key given in the GET variable.
  * If the data model is not found, an HTTP exception will be raised.
  * @param integer $id the ID of the model to be loaded
  * @return Advice the loaded model
  * @throws CHttpException
  */
 public function loadModel($id) {
  $model = Advice::model()->findByPk($id);
  if ($model === null)
   throw new CHttpException(404, "The requested page does not exist.");
  return $model;
 }

 /**
  * Performs the AJAX validation.
  * @param Advice $model the model to be validated
  */
 protected function performAjaxValidation($model) {
  if (isset($_POST["ajax"]) && $_POST["ajax"] === "advice-form") {
   echo CActiveForm::validate($model);
   Yii::app()->end();
  }
 }

}
