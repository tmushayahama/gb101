<?php

class SkillController extends Controller {
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
      "actions" => array("index", "skillbank", "skillbankdetail", "appendMoreSkill"),
      "users" => array("*"),
    ),
    array("allow", // allow authenticated user to perform "create" and "update" actions
      "actions" => array(
        "skill",
        "skillHome",
        "skillbank",
        "skillBrowse",
        "skillLevelSearch",
        "addskill",
        "addSkillComment",
        "requestSkillContributor",
        "addSkillQuestionnaire",
        "addSkillTodo",
        "addSkillDiscussion",
        "AddSkillWeblink",
        "addSkillNote",
        "addSkillTimeline"),
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

 public function actionSkillHome() {
  //$skill = Skill::Model()->findByPk($skillId);
  $todoPriorities = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name");
  $this->render("skill_home", array(
    "skillLevels" => Level::getLevels(Level::$LEVEL_CATEGORY_SKILL),
    "skills" => Skill::getSkills($levelId, Skill::$SKILLS_PER_PAGE),
    "skillsCount" => Skill::getSkillsCount($levelId),
    "skillsGained" => Skill::getSkills(Level::$LEVEL_SKILL_GAINED, Skill::$SKILLS_PER_PREVIEW_PAGE),
    "skillsToImprove" => Skill::getSkills(Level::$LEVEL_SKILL_TO_IMPROVE, Skill::$SKILLS_PER_PREVIEW_PAGE),
    "skillsToLearn" => Skill::getSkills(Level::$LEVEL_SKILL_TO_LEARN, Skill::$SKILLS_PER_PREVIEW_PAGE),
    "skillsGainedCount" => Skill::getSkillsCount(Level::$LEVEL_SKILL_GAINED),
    "skillsToImproveCount" => Skill::getSkillsCount(Level::$LEVEL_SKILL_TO_IMPROVE),
    "skillsToLearnCount" => Skill::getSkillsCount(Level::$LEVEL_SKILL_TO_LEARN),
    "skillOverviewQuestionnaires" => Question::getQuestions(Type::$SOURCE_SKILL),
    "commentModel" => new Comment(),
    "discussionModel" => new Discussion(),
    //"skillParentTodos" => SkillTodo::getSkillParentTodos($skillId),
    "noteModel" => new Note(),
    "questionModel" => new Question(),
    "questionnaireModel" => new Questionnaire(),
    "requestModel" => new Notification(),
    "todoModel" => new Todo(),
    "todoPriorities" => $todoPriorities,
    "weblinkModel" => new Weblink(),
    "discussionModel" => new Discussion(),
    //"skillParentDiscussions" => SkillDiscussion::getSkillParentDiscussions($skillId),
    //"skillType" => $skillType,
    //"advicePages" => Page::getUserPages($skill->creator_id),
    //"skillTimeline" => SkillTimeline::getSkillTimeline($skillId),
    "skillTimelineModel" => new SkillTimeline(),
    "people" => Profile::getPeople(true),
    "timelineModel" => new Timeline(),
    //"feedbackQuestions" => Skill::getFeedbackQuestions($skill, Yii::app()->user->id),
    "skillModel" => new Skill(),
    //"skill" => Skill::getSkill(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, null, 50),
    "skillLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
  ));
 }

 public function actionSkill($skillId) {
  $skill = Skill::model()->findByPk($skillId);
  //$skillChecklistsCount = $skill->getChecklistsCount();
  $this->render("tabs/skill_tab/_skill_item_pane", array(
    'skill' => $skill,
    'skillId' => $skill->id,
    "skillLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
    //CONTRIBUTOR
    "contributorModel" => new Contributor(),
    "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
    "skillContributors" => $skill->getSkillParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
    "skillContributorsCount" => $skill->getSkillParentContributorsCount(),
    //COMMENT
    'commentModel' => new Comment(),
    'skillComments' => $skill->getSkillParentComments(Comment::$COMMENTS_PER_PAGE),
    'skillCommentsCount' => $skill->getSkillParentCommentsCount(),
    //DISCUSSION
    "discussionModel" => new Discussion(),
    'skillDiscussions' => $skill->getSkillParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
    'skillDiscussionsCount' => $skill->getSkillParentDiscussionsCount(),
    //MENTORSHIPS
    "mentorshipSkillModel" => new MentorshipSkill(),
    "mentorshipLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name"),
    "mentorshipSkills" => $skill->getMentorshipSkills(6),
    "mentorshipSkillsCount" => $skill->getMentorshipSkillsCount(),
    //NOTES
    "noteModel" => new Note(),
    'skillNotes' => $skill->getSkillParentNotes(Note::$NOTES_PER_PAGE),
    'skillNotesCount' => $skill->getSkillParentNotesCount(),
    //TODO
    "todoModel" => new Todo(),
    "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
    'skillTodos' => $skill->getSkillParentTodos(Todo::$TODOS_PER_PAGE),
    'skillTodosCount' => $skill->getSkillParentTodosCount(),
    //WEBLINKS
    "weblinkModel" => new Weblink(),
    'skillWeblinks' => $skill->getSkillParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
    'skillWeblinksCount' => $skill->getSkillParentWeblinksCount(),
    //TIMELINE
    'timelineModel' => new Timeline(),
    'skillTimelineDays' => $skill->getSkillParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
    'skillTimelineDaysCount' => $skill->getSkillParentTimelinesCount(),
  ));
 }

 public function actionSkillBrowse() {
  if (Yii::app()->request->isAjaxRequest) {
   $postRow = $this->renderPartial("skill.views.skill.search._skill_browse", array(
     )
     , true);
   echo CJSON::encode(array(
     "_post_row" => $postRow));
  }
  Yii::app()->end();
 }

 public function actionSkillLevelSearch() {
  if (Yii::app()->request->isAjaxRequest) {
   $postRow = $this->renderPartial("skill.views.skill.search.search_page._level_search_page", array(
     "skillLevels" => Level::getLevels(Level::$LEVEL_CATEGORY_SKILL))
     , true);
   echo CJSON::encode(array(
     "_post_row" => $postRow));
  }
  Yii::app()->end();
 }

 public function actionSkillKeywordSearch() {
  if (Yii::app()->request->isAjaxRequest) {
   $keyword = Yii::app()->request->getParam('keyword');
   $postRow = $this->renderPartial("skill.views.skill._skill_post_row", array(
     "skill" => $skillModel,
     "source" => Skill::$SOURCE_SKILL)
     , true);
   echo CJSON::encode(array(
     "success" => true,
     "skill_level_id" => $skillModel->level_id,
     "_post_row" => $postRow));
  }
  Yii::app()->end();
 }

 public function actionAddSkill($rowType = null) {
  if (Yii::app()->request->isAjaxRequest) {
   $skillModel = new Skill;
   if (isset($_POST["Skill"]) && isset($_POST["Skill"])) {
    $skillModel->attributes = $_POST["Skill"];
    if ($skillModel->validate() && $skillModel->validate()) {
     $skillModel->created_date = date("Y-m-d");
     $skillModel->creator_id = Yii::app()->user->id;
     if ($skillModel->save()) {
      if (isset($_POST["gb-skill-share-with"])) {
       //SkillShare::shareSkill($skillModel->id, $_POST["gb-skill-share-with"]);
       //Post::addPost($skillModel->id, Post::$TYPE_GOAL_LIST, $skillModel->privacy, $_POST["gb-skill-share-with"]);
      } else {
       //  SkillShare::shareSkill($skillModel->id);
       //Post::addPost($skillModel->id, Post::$TYPE_GOAL_LIST, $skillModel->privacy);
      }
      $postRow;
      if ($rowType) {
       switch ($rowType) {
        case Type::$ROW_TYPE_NAV:
         $postRow = $this->renderPartial("skill.views.skill.activity.skill._skill_item", array(
           "skill" => $skillModel)
           , true);
       }
      } else {
       $postRow = $this->renderPartial("skill.views.skill._skill_post_row", array(
         "skill" => $skillModel,
         "source" => Skill::$SOURCE_SKILL)
         , true);
      }
      echo CJSON::encode(array(
        "success" => true,
        "skill_level_id" => $skillModel->level_id,
        "_post_row" => $postRow));
     }
    } else {
     echo CActiveForm::validate(array($skillModel));
    }
   }
   Yii::app()->end();
  }
 }

 public function actionAddSkillTimeline($skillId) {
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
      $skill = Skill::model()->findByPk($skillId);
      $skillTimelineModel = new SkillTimeline();
      $skillTimelineModel->skill_id = $skillId;
      $skillTimelineModel->timeline_id = $timelineModel->id;
      $skillTimelineModel->save(false);

      $postRow = $this->renderPartial('skill.views.skill.activity.timeline._skill_timelines', array(
        "skill" => $skill,
        "skillTimelineDays" => $skill->getSkillParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
        'skillTimelineDaysCount' => $skill->getSkillParentTimelinesCount(),
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

 public function actionAddSkillTodo($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Todo"])) {
    $todoModel = new Todo();
    $todoModel->attributes = $_POST["Todo"];
    if ($todoModel->validate()) {
     $todoModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $todoModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($todoModel->save(false)) {
      $skillTodoModel = new SkillTodo();
      $skillTodoModel->skill_id = $skillId;
      $skillTodoModel->todo_id = $todoModel->id;
      $skillTodoModel->save(false);
      $postRow;
      if ($todoModel->parent_todo_id) {
       $postRow = $this->renderPartial("todo.views.todo.activity._todo_parent", array(
         "todo" => SkillTodo::getSkillParentTodo($todoModel->parent_todo_id, $skillId)->todo,
         "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
         "todoCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("todo.views.todo.activity._todo_parent", array(
         "todo" => $skillTodoModel->todo,
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

 public function actionAddSkillComment($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Comment"])) {
    $commentModel = new Comment();
    $commentModel->attributes = $_POST["Comment"];
    if ($commentModel->validate()) {
     $commentModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $commentModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($commentModel->save(false)) {
      $skillCommentModel = new SkillComment();
      $skillCommentModel->skill_id = $skillId;
      $skillCommentModel->comment_id = $commentModel->id;
      $skillCommentModel->save(false);
      $postRow;
      if ($commentModel->parent_comment_id) {
       $postRow = $this->renderPartial("comment.views.comment.activity._comment_parent", array(
         "comment" => SkillComment::getSkillParentComment($commentModel->parent_comment_id, $skillId)->comment,
         "commentCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("comment.views.comment.activity._comment_parent", array(
         "comment" => $skillCommentModel->comment,
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

 public function actionRequestSkillContributor($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Contributor"])) {
    $contributorModel = new Contributor();
    $contributorModel->attributes = $_POST["Contributor"];
    if ($contributorModel->validate()) {
     $contributorModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $contributorModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($contributorModel->save(false)) {
      $skillContributorModel = new SkillContributor();
      $skillContributorModel->skill_id = $skillId;
      $skillContributorModel->contributor_id = $contributorModel->id;
      $skillContributorModel->save(false);
      $postRow;
      if ($contributorModel->parent_contributor_id) {
       $postRow = $this->renderPartial("contributor.views.contributor.activity._contributor_parent", array(
         "contributor" => SkillContributor::getSkillParentContributor($contributorModel->parent_contributor_id, $skillId)->contributor,
         "contributorCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("contributor.views.contributor.activity._contributor_parent", array(
         "contributor" => $skillContributorModel->contributor,
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

 public function actionAddSkillNote($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Note"])) {
    $noteModel = new Note();
    $noteModel->attributes = $_POST["Note"];
    if ($noteModel->validate()) {
     $noteModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $noteModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($noteModel->save(false)) {
      $skillNoteModel = new SkillNote();
      $skillNoteModel->skill_id = $skillId;
      $skillNoteModel->note_id = $noteModel->id;
      $skillNoteModel->save(false);
      $postRow;
      if ($noteModel->parent_note_id) {
       $postRow = $this->renderPartial("note.views.note.activity._note_parent", array(
         "note" => SkillNote::getSkillParentNote($noteModel->parent_note_id, $skillId)->note,
         "noteCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("note.views.note.activity._note_parent", array(
         "note" => $skillNoteModel->note,
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

 public function actionAddSkillQuestion($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Question"])) {
    $questionModel = new question();
    $questionModel->attributes = $_POST["Question"];
    if ($questionModel->validate()) {
     $questionModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $questionModel->created_date = $cdate->format("Y-m-d h:i:s");
     if ($questionModel->save(false)) {
      $skillQuestionModel = new SkillQuestion();
      $skillQuestionModel->skill_id = $skillId;
      $skillQuestionModel->question_id = $questionModel->id;
      $skillQuestionModel->save(false);

      $postRow = $this->renderPartial("skill.views.skill.activity.question._skill_question_parent_list_item", array(
        "skillQuestionParent" => SkillQuestion::getSkillParentQuestion($questionModel->id, $skillId),
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

 public function actionAddSkillDiscussion($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Discussion"])) {
    $discussionModel = new Discussion();
    $discussionModel->attributes = $_POST["Discussion"];
    if ($discussionModel->validate()) {
     $discussionModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $discussionModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($discussionModel->save(false)) {
      $skillDiscussionModel = new SkillDiscussion();
      $skillDiscussionModel->skill_id = $skillId;
      $skillDiscussionModel->discussion_id = $discussionModel->id;
      $skillDiscussionModel->save(false);
      $postRow;
      if ($discussionModel->parent_discussion_id) {
       $postRow = $this->renderPartial("discussion.views.discussion.activity._discussion_parent", array(
         "discussion" => SkillDiscussion::getSkillParentDiscussion($discussionModel->parent_discussion_id, $skillId)->discussion,
         "discussionCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("discussion.views.discussion.activity._discussion_parent", array(
         "discussion" => $skillDiscussionModel->discussion,
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

 public function actionAddSkillQuestionnaire($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Questionnaire"])) {
    $questionnaireModel = new Questionnaire();
    $questionnaireModel->attributes = $_POST["Questionnaire"];
    if ($questionnaireModel->validate()) {
     $questionnaireModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $questionnaireModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($questionnaireModel->save(false)) {
      $skillQuestionnaireModel = new SkillQuestionnaire();
      $skillQuestionnaireModel->skill_id = $skillId;
      $skillQuestionnaireModel->questionnaire_id = $questionnaireModel->id;
      $skillQuestionnaireModel->save(false);
      $postRow;
      if ($questionnaireModel->parent_questionnaire_id) {
       $postRow = $this->renderPartial("questionnaire.views.questionnaire.activity._questionnaire_parent", array(
         "questionnaire" => SkillQuestionnaire::getSkillParentQuestionnaire($questionnaireModel->parent_questionnaire_id, $skillId)->questionnaire,
         "questionnaireCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("questionnaire.views.questionnaire.activity._questionnaire_parent", array(
         "questionnaire" => $skillQuestionnaireModel->questionnaire,
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

 public function actionAddSkillWeblink($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["Weblink"])) {
    $weblinkModel = new Weblink();
    $weblinkModel->attributes = $_POST["Weblink"];
    if ($weblinkModel->validate()) {
     $weblinkModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $weblinkModel->created_date = $cdate->format("Y-m-d h:m:i");
     if ($weblinkModel->save(false)) {
      $skillWeblinkModel = new SkillWeblink();
      $skillWeblinkModel->skill_id = $skillId;
      $skillWeblinkModel->weblink_id = $weblinkModel->id;
      $skillWeblinkModel->save(false);
      $postRow;
      if ($weblinkModel->parent_weblink_id) {
       $postRow = $this->renderPartial("weblink.views.weblink.activity._weblink_parent", array(
         "weblink" => SkillWeblink::getSkillParentWeblink($weblinkModel->parent_weblink_id, $skillId)->weblink,
         "weblinkCounter" => "new")
         , true);
      } else {
       $postRow = $this->renderPartial("weblink.views.weblink.activity._weblink_parent", array(
         "weblink" => $skillWeblinkModel->weblink,
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

 public function actionAppendMoreSkill() {
  if (Yii::app()->request->isAjaxRequest) {
   $nextPage = Yii::app()->request->getParam("next_page") * 100;
   $type = Yii::app()->request->getParam("type");
   $bankSearchCriteria = Bank::getBankSearchCriteria(SkillType::$CATEGORY_SKILL, null, 100, $nextPage);
   switch ($type) {
    case 1:
     echo CJSON::encode(array(
       "_skill_bank_list" => $this->renderPartial("skill.views.skill._skill_bank_list", array(
         "skillBank" => Bank::model()->findAll($bankSearchCriteria))
         , true
     )));
     break;
    case 2:
     echo CJSON::encode(array(
       "_skill_bank_list" => $this->renderPartial("skill.views.skill._skill_bank_list_1", array(
         "skillBank" => Bank::model()->findAll($bankSearchCriteria))
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
  $model = new Skill("search");
  $model->unsetAttributes(); // clear any default values
  if (isset($_GET["Skill"]))
   $model->attributes = $_GET["Skill"];

  $this->render("admin", array(
    "model" => $model,
  ));
 }

 /**
  * Returns the data model based on the primary key given in the GET variable.
  * If the data model is not found, an HTTP exception will be raised.
  * @param integer $id the ID of the model to be loaded
  * @return Skill the loaded model
  * @throws CHttpException
  */
 public function loadModel($id) {
  $model = Skill::model()->findByPk($id);
  if ($model === null)
   throw new CHttpException(404, "The requested page does not exist.");
  return $model;
 }

 /**
  * Performs the AJAX validation.
  * @param Skill $model the model to be validated
  */
 protected function performAjaxValidation($model) {
  if (isset($_POST["ajax"]) && $_POST["ajax"] === "skill-form") {
   echo CActiveForm::validate($model);
   Yii::app()->end();
  }
 }

}
