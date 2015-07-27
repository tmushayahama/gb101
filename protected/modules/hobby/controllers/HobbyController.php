<?php

class HobbyController extends Controller {
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
      "actions" => array("index", "hobbybank", "hobbybankdetail", "appendMoreHobby"),
      "users" => array("*"),
    ),
    array("allow", // allow authenticated user to perform "create" and "update" actions
      "actions" => array(
        "hobby",
        "hobbyHome",
        "hobbybank",
        "hobbyBrowse",
        "hobbyLevelSearch",
        "addhobby",
        "addHobbyComment",
        "requestHobbyContributor",
        "addHobbyQuestionnaire",
        "addHobbyTodo",
        "addHobbyDiscussion",
        "AddHobbyWeblink",
        "addHobbyNote",
        "addHobbyTimeline"),
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

 public function actionHobbyHome() {
  //$hobby = Hobby::Model()->findByPk($hobbyId);
  $todoPriorities = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name");
  $this->render("hobby_home", array(
    "hobbyLevels" => Level::getLevels(Level::$LEVEL_CATEGORY_HOBBY),
    "hobbys" => Hobby::getHobbys($levelId, Hobby::$HOBBYS_PER_PAGE),
    "hobbysCount" => Hobby::getHobbysCount($levelId),
    "hobbysGained" => Hobby::getHobbys(Level::$LEVEL_HOBBY_GAINED, Hobby::$HOBBYS_PER_PREVIEW_PAGE),
    "hobbysToImprove" => Hobby::getHobbys(Level::$LEVEL_HOBBY_TO_IMPROVE, Hobby::$HOBBYS_PER_PREVIEW_PAGE),
    "hobbysToLearn" => Hobby::getHobbys(Level::$LEVEL_HOBBY_TO_LEARN, Hobby::$HOBBYS_PER_PREVIEW_PAGE),
    "hobbysGainedCount" => Hobby::getHobbysCount(Level::$LEVEL_HOBBY_GAINED),
    "hobbysToImproveCount" => Hobby::getHobbysCount(Level::$LEVEL_HOBBY_TO_IMPROVE),
    "hobbysToLearnCount" => Hobby::getHobbysCount(Level::$LEVEL_HOBBY_TO_LEARN),
    "hobbyOverviewQuestionnaires" => Question::getQuestions(Type::$SOURCE_HOBBY),
    "commentModel" => new Comment(),
    "discussionModel" => new Discussion(),
    //"hobbyParentTodos" => HobbyTodo::getHobbyParentTodos($hobbyId),
    "noteModel" => new Note(),
    "questionModel" => new Question(),
    "questionnaireModel" => new Questionnaire(),
    "requestModel" => new Notification(),
    "todoModel" => new Todo(),
    "todoPriorities" => $todoPriorities,
    "weblinkModel" => new Weblink(),
    "discussionModel" => new Discussion(),
    //"hobbyParentDiscussions" => HobbyDiscussion::getHobbyParentDiscussions($hobbyId),
    //"hobbyType" => $hobbyType,
    //"advicePages" => Page::getUserPages($hobby->creator_id),
    //"hobbyTimeline" => HobbyTimeline::getHobbyTimeline($hobbyId),
    "hobbyTimelineModel" => new HobbyTimeline(),
    "people" => Profile::getPeople(true),
    "timelineModel" => new Timeline(),
    //"feedbackQuestions" => Hobby::getFeedbackQuestions($hobby, Yii::app()->user->id),
    "hobbyModel" => new Hobby(),
    //"hobby" => Hobby::getHobby(Level::$LEVEL_CATEGORY_HOBBY, Yii::app()->user->id, null, null, 50),
    "hobbyLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_HOBBY), "id", "name"),
  ));
 }

 public function actionHobby($hobbyId) {
  $hobby = Hobby::model()->findByPk($hobbyId);
  //$hobbyChecklistsCount = $hobby->getChecklistsCount();
  $this->render("tabs/hobby_tab/_hobby_item_pane", array(
    'hobby' => $hobby,
    'hobbyId' => $hobby->id,
    "hobbyLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_HOBBY), "id", "name"),
    //CONTRIBUTOR
    "contributorModel" => new Contributor(),
    "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
    "hobbyContributors" => $hobby->getHobbyParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
    "hobbyContributorsCount" => $hobby->getHobbyParentContributorsCount(),
    //COMMENT
    'commentModel' => new Comment(),
    'hobbyComments' => $hobby->getHobbyParentComments(Comment::$COMMENTS_PER_PAGE),
    'hobbyCommentsCount' => $hobby->getHobbyParentCommentsCount(),
    //DISCUSSION
    "discussionModel" => new Discussion(),
    'hobbyDiscussions' => $hobby->getHobbyParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
    'hobbyDiscussionsCount' => $hobby->getHobbyParentDiscussionsCount(),
    //MENTORSHIPS
    "mentorshipHobbyModel" => new MentorshipHobby(),
    "mentorshipLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name"),
    "mentorshipHobbys" => $hobby->getMentorshipHobbys(6),
    "mentorshipHobbysCount" => $hobby->getMentorshipHobbysCount(),
    //NOTES
    "noteModel" => new Note(),
    'hobbyNotes' => $hobby->getHobbyParentNotes(Note::$NOTES_PER_PAGE),
    'hobbyNotesCount' => $hobby->getHobbyParentNotesCount(),
    //TODO
    "todoModel" => new Todo(),
    "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
    'hobbyTodos' => $hobby->getHobbyParentTodos(Todo::$TODOS_PER_PAGE),
    'hobbyTodosCount' => $hobby->getHobbyParentTodosCount(),
    //WEBLINKS
    "weblinkModel" => new Weblink(),
    'hobbyWeblinks' => $hobby->getHobbyParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
    'hobbyWeblinksCount' => $hobby->getHobbyParentWeblinksCount(),
    //TIMELINE
    'timelineModel' => new Timeline(),
    'hobbyTimelineDays' => $hobby->getHobbyParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
    'hobbyTimelineDaysCount' => $hobby->getHobbyParentTimelinesCount(),
  ));
 }

 public function actionHobbyBrowse() {
  if (Yii::app()->request->isAjaxRequest) {
   $postRow = $this->renderPartial("hobby.views.hobby.search._hobby_browse", array(
     )
     , true);
   echo CJSON::encode(array(
     "_post_row" => $postRow));
  }
  Yii::app()->end();
 }

 public function actionHobbyLevelSearch() {
  if (Yii::app()->request->isAjaxRequest) {
   $postRow = $this->renderPartial("hobby.views.hobby.search.search_page._level_search_page", array(
     "hobbyLevels" => Level::getLevels(Level::$LEVEL_CATEGORY_HOBBY))
     , true);
   echo CJSON::encode(array(
     "_post_row" => $postRow));
  }
  Yii::app()->end();
 }

 public function actionHobbyKeywordSearch() {
  if (Yii::app()->request->isAjaxRequest) {
   $keyword = Yii::app()->request->getParam('keyword');
   $postRow = $this->renderPartial("hobby.views.hobby._hobby_post_row", array(
     "hobby" => $hobbyModel,
     "source" => Hobby::$SOURCE_HOBBY)
     , true);
   echo CJSON::encode(array(
     "success" => true,
     "hobby_level_id" => $hobbyModel->level_id,
     "_post_row" => $postRow));
  }
  Yii::app()->end();
 }

 public function actionAddHobby($rowType = null) {
  if (Yii::app()->request->isAjaxRequest) {
   $hobbyModel = new Hobby;
   if (isset($_POST["Hobby"]) && isset($_POST["Hobby"])) {
    $hobbyModel->attributes = $_POST["Hobby"];
    if ($hobbyModel->validate() && $hobbyModel->validate()) {
     $hobbyModel->created_date = date("Y-m-d");
     $hobbyModel->creator_id = Yii::app()->user->id;
     if ($hobbyModel->save()) {
      if (isset($_POST["gb-hobby-share-with"])) {
       //HobbyShare::shareHobby($hobbyModel->id, $_POST["gb-hobby-share-with"]);
       //Post::addPost($hobbyModel->id, Post::$TYPE_GOAL_LIST, $hobbyModel->privacy, $_POST["gb-hobby-share-with"]);
      } else {
       //  HobbyShare::shareHobby($hobbyModel->id);
       //Post::addPost($hobbyModel->id, Post::$TYPE_GOAL_LIST, $hobbyModel->privacy);
      }
      $postRow;
      if ($rowType) {
       switch ($rowType) {
        case Type::$ROW_TYPE_NAV:
         $postRow = $this->renderPartial("hobby.views.hobby.activity.hobby._hobby_item", array(
           "hobby" => $hobbyModel)
           , true);
       }
      } else {
       $postRow = $this->renderPartial("hobby.views.hobby._hobby_post_row", array(
         "hobby" => $hobbyModel,
         "source" => Hobby::$SOURCE_HOBBY)
         , true);
      }
      echo CJSON::encode(array(
        "success" => true,
        "hobby_level_id" => $hobbyModel->level_id,
        "_post_row" => $postRow));
     }
    } else {
     echo CActiveForm::validate(array($hobbyModel));
    }
   }
   Yii::app()->end();
  }
 }

 public function actionAddHobbyTimeline($hobbyId) {
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
      $hobby = Hobby::model()->findByPk($hobbyId);
      $hobbyTimelineModel = new HobbyTimeline();
      $hobbyTimelineModel->hobby_id = $hobbyId;
      $hobbyTimelineModel->timeline_id = $timelineModel->id;
      $hobbyTimelineModel->save(false);

      $postRow = $this->renderPartial('hobby.views.hobby.activity.timeline._hobby_timelines', array(
        "hobby" => $hobby,
        "hobbyTimelineDays" => $hobby->getHobbyParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
        'hobbyTimelineDaysCount' => $hobby->getHobbyParentTimelinesCount(),
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

 public function actionAddHobbyTodo($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Todo"])) {
    $todoModel = new Todo();
    $todoModel->attributes = $_POST["Todo"];
    if ($todoModel->validate()) {
     $todoModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $todoModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($todoModel->save(false)) {
      $hobbyTodoModel = new HobbyTodo();
      $hobbyTodoModel->hobby_id = $hobbyId;
      $hobbyTodoModel->todo_id = $todoModel->id;
      $hobbyTodoModel->save(false);
      $postRow;
      if ($todoModel->parent_todo_id) {
       $postRow = $this->renderPartial("todo.views.todo.activity._todo_parent", array(
         "todo" => HobbyTodo::getHobbyParentTodo($todoModel->parent_todo_id, $hobbyId)->todo,
         "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
         "todoCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("todo.views.todo.activity._todo_parent", array(
         "todo" => $hobbyTodoModel->todo,
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

 public function actionAddHobbyComment($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Comment"])) {
    $commentModel = new Comment();
    $commentModel->attributes = $_POST["Comment"];
    if ($commentModel->validate()) {
     $commentModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $commentModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($commentModel->save(false)) {
      $hobbyCommentModel = new HobbyComment();
      $hobbyCommentModel->hobby_id = $hobbyId;
      $hobbyCommentModel->comment_id = $commentModel->id;
      $hobbyCommentModel->save(false);
      $postRow;
      if ($commentModel->parent_comment_id) {
       $postRow = $this->renderPartial("comment.views.comment.activity._comment_parent", array(
         "comment" => HobbyComment::getHobbyParentComment($commentModel->parent_comment_id, $hobbyId)->comment,
         "commentCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("comment.views.comment.activity._comment_parent", array(
         "comment" => $hobbyCommentModel->comment,
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

 public function actionRequestHobbyContributor($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Contributor"])) {
    $contributorModel = new Contributor();
    $contributorModel->attributes = $_POST["Contributor"];
    if ($contributorModel->validate()) {
     $contributorModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $contributorModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($contributorModel->save(false)) {
      $hobbyContributorModel = new HobbyContributor();
      $hobbyContributorModel->hobby_id = $hobbyId;
      $hobbyContributorModel->contributor_id = $contributorModel->id;
      $hobbyContributorModel->save(false);
      $postRow;
      if ($contributorModel->parent_contributor_id) {
       $postRow = $this->renderPartial("contributor.views.contributor.activity._contributor_parent", array(
         "contributor" => HobbyContributor::getHobbyParentContributor($contributorModel->parent_contributor_id, $hobbyId)->contributor,
         "contributorCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("contributor.views.contributor.activity._contributor_parent", array(
         "contributor" => $hobbyContributorModel->contributor,
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

 public function actionAddHobbyNote($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Note"])) {
    $noteModel = new Note();
    $noteModel->attributes = $_POST["Note"];
    if ($noteModel->validate()) {
     $noteModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $noteModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($noteModel->save(false)) {
      $hobbyNoteModel = new HobbyNote();
      $hobbyNoteModel->hobby_id = $hobbyId;
      $hobbyNoteModel->note_id = $noteModel->id;
      $hobbyNoteModel->save(false);
      $postRow;
      if ($noteModel->parent_note_id) {
       $postRow = $this->renderPartial("note.views.note.activity._note_parent", array(
         "note" => HobbyNote::getHobbyParentNote($noteModel->parent_note_id, $hobbyId)->note,
         "noteCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("note.views.note.activity._note_parent", array(
         "note" => $hobbyNoteModel->note,
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

 public function actionAddHobbyQuestion($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Question"])) {
    $questionModel = new question();
    $questionModel->attributes = $_POST["Question"];
    if ($questionModel->validate()) {
     $questionModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $questionModel->created_date = $cdate->format("Y-m-d h:i:s");
     if ($questionModel->save(false)) {
      $hobbyQuestionModel = new HobbyQuestion();
      $hobbyQuestionModel->hobby_id = $hobbyId;
      $hobbyQuestionModel->question_id = $questionModel->id;
      $hobbyQuestionModel->save(false);

      $postRow = $this->renderPartial("hobby.views.hobby.activity.question._hobby_question_parent_list_item", array(
        "hobbyQuestionParent" => HobbyQuestion::getHobbyParentQuestion($questionModel->id, $hobbyId),
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

 public function actionAddHobbyDiscussion($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Discussion"])) {
    $discussionModel = new Discussion();
    $discussionModel->attributes = $_POST["Discussion"];
    if ($discussionModel->validate()) {
     $discussionModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $discussionModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($discussionModel->save(false)) {
      $hobbyDiscussionModel = new HobbyDiscussion();
      $hobbyDiscussionModel->hobby_id = $hobbyId;
      $hobbyDiscussionModel->discussion_id = $discussionModel->id;
      $hobbyDiscussionModel->save(false);
      $postRow;
      if ($discussionModel->parent_discussion_id) {
       $postRow = $this->renderPartial("discussion.views.discussion.activity._discussion_parent", array(
         "discussion" => HobbyDiscussion::getHobbyParentDiscussion($discussionModel->parent_discussion_id, $hobbyId)->discussion,
         "discussionCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("discussion.views.discussion.activity._discussion_parent", array(
         "discussion" => $hobbyDiscussionModel->discussion,
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

 public function actionAddHobbyQuestionnaire($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Questionnaire"])) {
    $questionnaireModel = new Questionnaire();
    $questionnaireModel->attributes = $_POST["Questionnaire"];
    if ($questionnaireModel->validate()) {
     $questionnaireModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $questionnaireModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($questionnaireModel->save(false)) {
      $hobbyQuestionnaireModel = new HobbyQuestionnaire();
      $hobbyQuestionnaireModel->hobby_id = $hobbyId;
      $hobbyQuestionnaireModel->questionnaire_id = $questionnaireModel->id;
      $hobbyQuestionnaireModel->save(false);
      $postRow;
      if ($questionnaireModel->parent_questionnaire_id) {
       $postRow = $this->renderPartial("questionnaire.views.questionnaire.activity._questionnaire_parent", array(
         "questionnaire" => HobbyQuestionnaire::getHobbyParentQuestionnaire($questionnaireModel->parent_questionnaire_id, $hobbyId)->questionnaire,
         "questionnaireCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("questionnaire.views.questionnaire.activity._questionnaire_parent", array(
         "questionnaire" => $hobbyQuestionnaireModel->questionnaire,
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

 public function actionAddHobbyWeblink($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Weblink"])) {
    $weblinkModel = new Weblink();
    $weblinkModel->attributes = $_POST["Weblink"];
    if ($weblinkModel->validate()) {
     $weblinkModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $weblinkModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($weblinkModel->save(false)) {
      $hobbyWeblinkModel = new HobbyWeblink();
      $hobbyWeblinkModel->hobby_id = $hobbyId;
      $hobbyWeblinkModel->weblink_id = $weblinkModel->id;
      $hobbyWeblinkModel->save(false);
      $postRow;
      if ($weblinkModel->parent_weblink_id) {
       $postRow = $this->renderPartial("weblink.views.weblink.activity._weblink_parent", array(
         "weblink" => HobbyWeblink::getHobbyParentWeblink($weblinkModel->parent_weblink_id, $hobbyId)->weblink,
         "weblinkCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("weblink.views.weblink.activity._weblink_parent", array(
         "weblink" => $hobbyWeblinkModel->weblink,
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

 public function actionAppendMoreHobby() {
  if (Yii::app()->request->isAjaxRequest) {
   $nextPage = Yii::app()->request->getParam("next_page") * 100;
   $type = Yii::app()->request->getParam("type");
   $bankSearchCriteria = Bank::getBankSearchCriteria(HobbyType::$CATEGORY_HOBBY, null, 100, $nextPage);
   switch ($type) {
    case 1:
     echo CJSON::encode(array(
       "_hobby_bank_list" => $this->renderPartial("hobby.views.hobby._hobby_bank_list", array(
         "hobbyBank" => Bank::model()->findAll($bankSearchCriteria))
         , true
     )));
     break;
    case 2:
     echo CJSON::encode(array(
       "_hobby_bank_list" => $this->renderPartial("hobby.views.hobby._hobby_bank_list_1", array(
         "hobbyBank" => Bank::model()->findAll($bankSearchCriteria))
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
  $model = new Hobby("search");
  $model->unsetAttributes(); // clear any default values
  if (isset($_GET["Hobby"]))
   $model->attributes = $_GET["Hobby"];

  $this->render("admin", array(
    "model" => $model,
  ));
 }

 /**
  * Returns the data model based on the primary key given in the GET variable.
  * If the data model is not found, an HTTP exception will be raised.
  * @param integer $id the ID of the model to be loaded
  * @return Hobby the loaded model
  * @throws CHttpException
  */
 public function loadModel($id) {
  $model = Hobby::model()->findByPk($id);
  if ($model === null)
   throw new CHttpException(404, "The requested page does not exist.");
  return $model;
 }

 /**
  * Performs the AJAX validation.
  * @param Hobby $model the model to be validated
  */
 protected function performAjaxValidation($model) {
  if (isset($_POST["ajax"]) && $_POST["ajax"] === "hobby-form") {
   echo CActiveForm::validate($model);
   Yii::app()->end();
  }
 }

}
