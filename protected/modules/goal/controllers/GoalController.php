<?php

class GoalController extends Controller {
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
      "actions" => array("index", "goalbank", "goalbankdetail", "appendMoreGoal"),
      "users" => array("*"),
    ),
    array("allow", // allow authenticated user to perform "create" and "update" actions
      "actions" => array(
        "goal",
        "goalHome",
        "goalbank",
        "goalBrowse",
        "goalLevelSearch",
        "addGoal",
        "addGoalPlayAnswer",
        "addGoalComment",
        "requestGoalContributor",
        "addGoalQuestionnaire",
        "addGoalTodo",
        "addGoalDiscussion",
        "AddGoalWeblink",
        "addGoalNote",
        "addGoalTimeline"),
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

 public function actionGoalHome() {
  //$goal = Goal::Model()->findByPk($goalId);
  $todoPriorities = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name");
  $this->render("goal_home", array(
    "goalLevels" => Level::getLevels(Level::$LEVEL_CATEGORY_GOAL),
    "goals" => Goal::getGoals($levelId, Goal::$GOALS_PER_PAGE),
    "goalsCount" => Goal::getGoalsCount($levelId),
    "goalsGained" => Goal::getGoals(Level::$LEVEL_GOAL_GAINED, Goal::$GOALS_PER_PREVIEW_PAGE),
    "goalsToImprove" => Goal::getGoals(Level::$LEVEL_GOAL_TO_IMPROVE, Goal::$GOALS_PER_PREVIEW_PAGE),
    "goalsToLearn" => Goal::getGoals(Level::$LEVEL_GOAL_TO_LEARN, Goal::$GOALS_PER_PREVIEW_PAGE),
    "goalsGainedCount" => Goal::getGoalsCount(Level::$LEVEL_GOAL_GAINED),
    "goalsToImproveCount" => Goal::getGoalsCount(Level::$LEVEL_GOAL_TO_IMPROVE),
    "goalsToLearnCount" => Goal::getGoalsCount(Level::$LEVEL_GOAL_TO_LEARN),
    "goalOverviewQuestionnaires" => Question::getQuestions(Type::$SOURCE_GOAL),
    "commentModel" => new Comment(),
    "discussionModel" => new Discussion(),
    //"goalParentTodos" => GoalTodo::getGoalParentTodos($goalId),
    "noteModel" => new Note(),
    "questionModel" => new Question(),
    "questionnaireModel" => new Questionnaire(),
    "requestModel" => new Notification(),
    "todoModel" => new Todo(),
    "todoPriorities" => $todoPriorities,
    "weblinkModel" => new Weblink(),
    "discussionModel" => new Discussion(),
    //"goalParentDiscussions" => GoalDiscussion::getGoalParentDiscussions($goalId),
    //"goalType" => $goalType,
    //"advicePages" => Page::getUserPages($goal->creator_id),
    //"goalTimeline" => GoalTimeline::getGoalTimeline($goalId),
    "goalTimelineModel" => new GoalTimeline(),
    "people" => Profile::getPeople(true),
    "timelineModel" => new Timeline(),
    //"feedbackQuestions" => Goal::getFeedbackQuestions($goal, Yii::app()->user->id),
    "goalModel" => new Goal(),
    //"goal" => Goal::getGoal(Level::$LEVEL_CATEGORY_GOAL, Yii::app()->user->id, null, null, 50),
    "goalLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_GOAL), "id", "name"),
  ));
 }

 public function actionGoal($goalId) {
  $goal = Goal::model()->findByPk($goalId);
  //$goalChecklistsCount = $goal->getChecklistsCount();
  $this->render("tabs/goal_tab/_goal_item_pane", array(
    'goal' => $goal,
    'goalId' => $goal->id,
    "goalLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_GOAL), "id", "name"),
    //CONTRIBUTOR
    "contributorModel" => new Contributor(),
    "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
    "goalContributors" => $goal->getGoalParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
    "goalContributorsCount" => $goal->getGoalParentContributorsCount(),
    //COMMENT
    'commentModel' => new Comment(),
    'goalComments' => $goal->getGoalParentComments(Comment::$COMMENTS_PER_PAGE),
    'goalCommentsCount' => $goal->getGoalParentCommentsCount(),
    //DISCUSSION
    "discussionModel" => new Discussion(),
    'goalDiscussions' => $goal->getGoalParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
    'goalDiscussionsCount' => $goal->getGoalParentDiscussionsCount(),
    //MENTORSHIPS
    "mentorshipGoalModel" => new MentorshipGoal(),
    "mentorshipLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name"),
    "mentorshipGoals" => $goal->getMentorshipGoals(6),
    "mentorshipGoalsCount" => $goal->getMentorshipGoalsCount(),
    //NOTES
    "noteModel" => new Note(),
    'goalNotes' => $goal->getGoalParentNotes(Note::$NOTES_PER_PAGE),
    'goalNotesCount' => $goal->getGoalParentNotesCount(),
    //TODO
    "todoModel" => new Todo(),
    "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
    'goalTodos' => $goal->getGoalParentTodos(Todo::$TODOS_PER_PAGE),
    'goalTodosCount' => $goal->getGoalParentTodosCount(),
    //WEBLINKS
    "weblinkModel" => new Weblink(),
    'goalWeblinks' => $goal->getGoalParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
    'goalWeblinksCount' => $goal->getGoalParentWeblinksCount(),
    //TIMELINE
    'timelineModel' => new Timeline(),
    'goalTimelineDays' => $goal->getGoalParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
    'goalTimelineDaysCount' => $goal->getGoalParentTimelinesCount(),
  ));
 }

 public function actionAddGoalPlayAnswer($answerType) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["GoalPlayAnswer"])) {
    $goalPlayAnswerModel = new GoalPlayAnswer();
    $goalPlayAnswerModel->attributes = $_POST["GoalPlayAnswer"];
    if ($goalPlayAnswerModel->validate()) {
     $goalPlayAnswerModel->creator_id = Yii::app()->user->id;
     $goalPlayAnswerModel->goal_play_answer = $answerType;
     $cdate = new DateTime("now");
     $goalPlayAnswerModel->created_date = $cdate->format("Y-m-d h:i:s");
     if ($goalPlayAnswerModel->save(false)) {
      $nextForm = $this->renderPartial('goal.views.goal.forms._goal_play_form', array(
        "actionUrl" => Yii::app()->createUrl("goal/goal/addGoalPlayAnswer", array()),
        "goalPlayAnswerModel" => new GoalPlayAnswer(),
        "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
        ), true);
      echo CJSON::encode(array(
        "success" => true,
        "_next_form" => $nextForm
      ));
     }
    } else {
     echo CActiveForm::validate($goalPlayAnswerModel);
    }
   }
  }
  Yii::app()->end();
 }

 public function actionGoalBrowse() {
  if (Yii::app()->request->isAjaxRequest) {
   $postRow = $this->renderPartial("goal.views.goal.search._goal_browse", array(
     )
     , true);
   echo CJSON::encode(array(
     "_post_row" => $postRow));
  }
  Yii::app()->end();
 }

 public function actionGoalLevelSearch() {
  if (Yii::app()->request->isAjaxRequest) {
   $postRow = $this->renderPartial("goal.views.goal.search.search_page._level_search_page", array(
     "goalLevels" => Level::getLevels(Level::$LEVEL_CATEGORY_GOAL))
     , true);
   echo CJSON::encode(array(
     "_post_row" => $postRow));
  }
  Yii::app()->end();
 }

 public function actionGoalKeywordSearch() {
  if (Yii::app()->request->isAjaxRequest) {
   $keyword = Yii::app()->request->getParam('keyword');
   $postRow = $this->renderPartial("goal.views.goal._goal_post_row", array(
     "goal" => $goalModel,
     "source" => Goal::$SOURCE_GOAL)
     , true);
   echo CJSON::encode(array(
     "success" => true,
     "goal_level_id" => $goalModel->level_id,
     "_post_row" => $postRow));
  }
  Yii::app()->end();
 }

 public function actionAddGoal($rowType = null) {
  if (Yii::app()->request->isAjaxRequest) {
   $goalModel = new Goal;
   if (isset($_POST["Goal"]) && isset($_POST["Goal"])) {
    $goalModel->attributes = $_POST["Goal"];
    if ($goalModel->validate() && $goalModel->validate()) {
     $goalModel->created_date = date("Y-m-d");
     $goalModel->creator_id = Yii::app()->user->id;
     if ($goalModel->save()) {
      if (isset($_POST["gb-goal-share-with"])) {
       //GoalShare::shareGoal($goalModel->id, $_POST["gb-goal-share-with"]);
       //Post::addPost($goalModel->id, Post::$TYPE_GOAL_LIST, $goalModel->privacy, $_POST["gb-goal-share-with"]);
      } else {
       //  GoalShare::shareGoal($goalModel->id);
       //Post::addPost($goalModel->id, Post::$TYPE_GOAL_LIST, $goalModel->privacy);
      }
      $postRow = $this->renderPartial("goal.views.goal.activity.goal._goal_item", array(
        "goal" => $goalModel), true
      );
      echo CJSON::encode(array(
        "success" => true,
        "goal_level_id" => $goalModel->level_id,
        "_post_row" => $postRow));
     }
    } else {
     echo CActiveForm::validate(array($goalModel));
    }
   }
   Yii::app()->end();
  }
 }

 public function actionAddGoalTimeline($goalId) {
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
      $goal = Goal::model()->findByPk($goalId);
      $goalTimelineModel = new GoalTimeline();
      $goalTimelineModel->goal_id = $goalId;
      $goalTimelineModel->timeline_id = $timelineModel->id;
      $goalTimelineModel->save(false);

      $postRow = $this->renderPartial('goal.views.goal.activity.timeline._goal_timelines', array(
        "goal" => $goal,
        "goalTimelineDays" => $goal->getGoalParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
        'goalTimelineDaysCount' => $goal->getGoalParentTimelinesCount(),
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

 public function actionAddGoalTodo($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Todo"])) {
    $todoModel = new Todo();
    $todoModel->attributes = $_POST["Todo"];
    if ($todoModel->validate()) {
     $todoModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $todoModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($todoModel->save(false)) {
      $goalTodoModel = new GoalTodo();
      $goalTodoModel->goal_id = $goalId;
      $goalTodoModel->todo_id = $todoModel->id;
      $goalTodoModel->save(false);
      $postRow;
      if ($todoModel->parent_todo_id) {
       $postRow = $this->renderPartial("todo.views.todo.activity._todo_parent", array(
         "todo" => GoalTodo::getGoalParentTodo($todoModel->parent_todo_id, $goalId)->todo,
         "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
         "todoCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("todo.views.todo.activity._todo_parent", array(
         "todo" => $goalTodoModel->todo,
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

 public function actionAddGoalComment($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Comment"])) {
    $commentModel = new Comment();
    $commentModel->attributes = $_POST["Comment"];
    if ($commentModel->validate()) {
     $commentModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $commentModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($commentModel->save(false)) {
      $goalCommentModel = new GoalComment();
      $goalCommentModel->goal_id = $goalId;
      $goalCommentModel->comment_id = $commentModel->id;
      $goalCommentModel->save(false);
      $postRow;
      if ($commentModel->parent_comment_id) {
       $postRow = $this->renderPartial("comment.views.comment.activity._comment_parent", array(
         "comment" => GoalComment::getGoalParentComment($commentModel->parent_comment_id, $goalId)->comment,
         "commentCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("comment.views.comment.activity._comment_parent", array(
         "comment" => $goalCommentModel->comment,
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

 public function actionRequestGoalContributor($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Contributor"])) {
    $contributorModel = new Contributor();
    $contributorModel->attributes = $_POST["Contributor"];
    if ($contributorModel->validate()) {
     $contributorModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $contributorModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($contributorModel->save(false)) {
      $goalContributorModel = new GoalContributor();
      $goalContributorModel->goal_id = $goalId;
      $goalContributorModel->contributor_id = $contributorModel->id;
      $goalContributorModel->save(false);
      $postRow;
      if ($contributorModel->parent_contributor_id) {
       $postRow = $this->renderPartial("contributor.views.contributor.activity._contributor_parent", array(
         "contributor" => GoalContributor::getGoalParentContributor($contributorModel->parent_contributor_id, $goalId)->contributor,
         "contributorCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("contributor.views.contributor.activity._contributor_parent", array(
         "contributor" => $goalContributorModel->contributor,
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

 public function actionAddGoalNote($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Note"])) {
    $noteModel = new Note();
    $noteModel->attributes = $_POST["Note"];
    if ($noteModel->validate()) {
     $noteModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $noteModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($noteModel->save(false)) {
      $goalNoteModel = new GoalNote();
      $goalNoteModel->goal_id = $goalId;
      $goalNoteModel->note_id = $noteModel->id;
      $goalNoteModel->save(false);
      $postRow;
      if ($noteModel->parent_note_id) {
       $postRow = $this->renderPartial("note.views.note.activity._note_parent", array(
         "note" => GoalNote::getGoalParentNote($noteModel->parent_note_id, $goalId)->note,
         "noteCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("note.views.note.activity._note_parent", array(
         "note" => $goalNoteModel->note,
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

 public function actionAddGoalQuestion($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Question"])) {
    $questionModel = new question();
    $questionModel->attributes = $_POST["Question"];
    if ($questionModel->validate()) {
     $questionModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $questionModel->created_date = $cdate->format("Y-m-d h:i:s");
     if ($questionModel->save(false)) {
      $goalQuestionModel = new GoalQuestion();
      $goalQuestionModel->goal_id = $goalId;
      $goalQuestionModel->question_id = $questionModel->id;
      $goalQuestionModel->save(false);

      $postRow = $this->renderPartial("goal.views.goal.activity.question._goal_question_parent_list_item", array(
        "goalQuestionParent" => GoalQuestion::getGoalParentQuestion($questionModel->id, $goalId),
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

 public function actionAddGoalDiscussion($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Discussion"])) {
    $discussionModel = new Discussion();
    $discussionModel->attributes = $_POST["Discussion"];
    if ($discussionModel->validate()) {
     $discussionModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $discussionModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($discussionModel->save(false)) {
      $goalDiscussionModel = new GoalDiscussion();
      $goalDiscussionModel->goal_id = $goalId;
      $goalDiscussionModel->discussion_id = $discussionModel->id;
      $goalDiscussionModel->save(false);
      $postRow;
      if ($discussionModel->parent_discussion_id) {
       $postRow = $this->renderPartial("discussion.views.discussion.activity._discussion_parent", array(
         "discussion" => GoalDiscussion::getGoalParentDiscussion($discussionModel->parent_discussion_id, $goalId)->discussion,
         "discussionCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("discussion.views.discussion.activity._discussion_parent", array(
         "discussion" => $goalDiscussionModel->discussion,
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

 public function actionAddGoalQuestionnaire($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Questionnaire"])) {
    $questionnaireModel = new Questionnaire();
    $questionnaireModel->attributes = $_POST["Questionnaire"];
    if ($questionnaireModel->validate()) {
     $questionnaireModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $questionnaireModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($questionnaireModel->save(false)) {
      $goalQuestionnaireModel = new GoalQuestionnaire();
      $goalQuestionnaireModel->goal_id = $goalId;
      $goalQuestionnaireModel->questionnaire_id = $questionnaireModel->id;
      $goalQuestionnaireModel->save(false);
      $postRow;
      if ($questionnaireModel->parent_questionnaire_id) {
       $postRow = $this->renderPartial("questionnaire.views.questionnaire.activity._questionnaire_parent", array(
         "questionnaire" => GoalQuestionnaire::getGoalParentQuestionnaire($questionnaireModel->parent_questionnaire_id, $goalId)->questionnaire,
         "questionnaireCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("questionnaire.views.questionnaire.activity._questionnaire_parent", array(
         "questionnaire" => $goalQuestionnaireModel->questionnaire,
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

 public function actionAddGoalWeblink($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Weblink"])) {
    $weblinkModel = new Weblink();
    $weblinkModel->attributes = $_POST["Weblink"];
    if ($weblinkModel->validate()) {
     $weblinkModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $weblinkModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($weblinkModel->save(false)) {
      $goalWeblinkModel = new GoalWeblink();
      $goalWeblinkModel->goal_id = $goalId;
      $goalWeblinkModel->weblink_id = $weblinkModel->id;
      $goalWeblinkModel->save(false);
      $postRow;
      if ($weblinkModel->parent_weblink_id) {
       $postRow = $this->renderPartial("weblink.views.weblink.activity._weblink_parent", array(
         "weblink" => GoalWeblink::getGoalParentWeblink($weblinkModel->parent_weblink_id, $goalId)->weblink,
         "weblinkCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("weblink.views.weblink.activity._weblink_parent", array(
         "weblink" => $goalWeblinkModel->weblink,
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

 public function actionAppendMoreGoal() {
  if (Yii::app()->request->isAjaxRequest) {
   $nextPage = Yii::app()->request->getParam("next_page") * 100;
   $type = Yii::app()->request->getParam("type");
   $bankSearchCriteria = Bank::getBankSearchCriteria(GoalType::$CATEGORY_GOAL, null, 100, $nextPage);
   switch ($type) {
    case 1:
     echo CJSON::encode(array(
       "_goal_bank_list" => $this->renderPartial("goal.views.goal._goal_bank_list", array(
         "goalBank" => Bank::model()->findAll($bankSearchCriteria))
         , true
     )));
     break;
    case 2:
     echo CJSON::encode(array(
       "_goal_bank_list" => $this->renderPartial("goal.views.goal._goal_bank_list_1", array(
         "goalBank" => Bank::model()->findAll($bankSearchCriteria))
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
  $model = new Goal("search");
  $model->unsetAttributes(); // clear any default values
  if (isset($_GET["Goal"]))
   $model->attributes = $_GET["Goal"];

  $this->render("admin", array(
    "model" => $model,
  ));
 }

 /**
  * Returns the data model based on the primary key given in the GET variable.
  * If the data model is not found, an HTTP exception will be raised.
  * @param integer $id the ID of the model to be loaded
  * @return Goal the loaded model
  * @throws CHttpException
  */
 public function loadModel($id) {
  $model = Goal::model()->findByPk($id);
  if ($model === null)
   throw new CHttpException(404, "The requested page does not exist.");
  return $model;
 }

 /**
  * Performs the AJAX validation.
  * @param Goal $model the model to be validated
  */
 protected function performAjaxValidation($model) {
  if (isset($_POST["ajax"]) && $_POST["ajax"] === "goal-form") {
   echo CActiveForm::validate($model);
   Yii::app()->end();
  }
 }

}
