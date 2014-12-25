<?php

class GoalTabController extends Controller {
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
      'actions' => array('goals', 'goalsWelcome', 'goalAppOverview', 'goalApps', 'goalTimeline', 'goalContributors',
        'goalComments', 'goalTodos', 'goalDiscussions', 'goalQuestionnaire', 'goalQuestions', 'goalNotes',
        'goalWeblinks', 'goalObserver'),
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

 public function actionGoalAppOverview() {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-goals-pane",
     "_post_row" => $this->renderPartial('goal.views.goal.goals_tab._goal_app_overview_pane', array(
       "goals" => Goal::getGoals(null, Goal::$GOALS_PER_PAGE),
       "goalLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_GOAL), "id", "name"),
       "goalsCount" => Goal::getGoalsCount(),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoals($levelId) {
  if (Yii::app()->request->isAjaxRequest) {
   $level = Level::model()->findByPk($levelId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-goals-pane",
     "clear_tab_pane" => "#gb-goal-item-pane",
     "_post_row" => $this->renderPartial('goal.views.goal.goals_tab._goal_list_pane', array(
       "goals" => Goal::getGoals($levelId, Goal::$GOALS_PER_PAGE),
       "level" => $level,
       "goalsCount" => Goal::getGoalsCount($levelId),
       ), true),
     "_no_content_row" => $this->renderPartial('goal.views.goal.activity.goal._no_content_row', array(
       "type" => Type::$NO_CONTENT_GOAL,
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoal($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   $goal = Goal::model()->findByPk($goalId);
   //$goalChecklistsCount = $goal->getChecklistsCount();
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-goal-item-pane",
     "_post_row" => $this->renderPartial('goal.views.goal.welcome_tab._goal_item_pane', array(
       'goal' => $goal,
       "commentModel" => new Comment(),
       // 'goalChecklists' => $goal->getChecklists(Checklist::$CHECKLISTS_PER_OVERVIEW_PAGE),
       // 'goalChecklistsCount' => $goalChecklistsCount,
       // 'goalChecklistsProgressCount' => $goal->getProgress($goalChecklistsCount),
       //'goalContributors' => $goal->getContributors(null, 6),
       // 'goalContributorsCount' => $goal->getContributorsCount(),
       'goalComments' => $goal->getGoalParentComments(Comment::$COMMENTS_PER_OVERVIEW_PAGE),
       'goalCommentsCount' => $goal->getGoalParentCommentsCount(),
       // 'goalNotes' => $goal->getGoalParentNotes(Note::$NOTES_PER_OVERVIEW_PAGE),
       // 'goalNotesCount' => $goal->getGoalParentNotesCount(),
       //  'goalWeblinks' => $goal->getGoalParentWeblinks(3),
       // 'goalWeblinksCount' => $goal->getGoalParentWeblinksCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoalOverview($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   $goal = Goal::model()->findByPk($goalId);
   // $goalChecklistsCount = $goal->getChecklistsCount();

   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-goal-item-tab-pane",
     "_post_row" => $this->renderPartial('goal.views.goal.welcome_tab.goal_item_tab._goal_item_overview_pane', array(
       'goal' => $goal,
       'commentModel' => new Comment(),
       // 'goalChecklists' => $goal->getChecklists(Checklist::$CHECKLISTS_PER_OVERVIEW_PAGE),
       // 'goalChecklistsCount' => $goalChecklistsCount,
       // 'goalChecklistsProgressCount' => $goal->getProgress($goalChecklistsCount),
       //'goalContributors' => $goal->getContributors(null, 6),
       // 'goalContributorsCount' => $goal->getContributorsCount(),
       'goalComments' => $goal->getGoalParentComments(Comment::$COMMENTS_PER_OVERVIEW_PAGE),
       'goalCommentsCount' => $goal->getGoalParentCommentsCount(),
       // 'goalNotes' => $goal->getGoalParentNotes(Note::$NOTES_PER_OVERVIEW_PAGE),
       // 'goalNotesCount' => $goal->getGoalParentNotesCount(),
       //  'goalWeblinks' => $goal->getGoalParentWeblinks(3),
       // 'goalWeblinksCount' => $goal->getGoalParentWeblinksCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoalApps($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#goal-management-apps-pane",
     "_post_row" => $this->renderPartial('goal.views.goal.apps_tab._goal_apps_pane', array(
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoalTimeline($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#goal-management-timeline-pane",
     "_post_row" => $this->renderPartial('goal.views.goal.timeline_tab._goal_timeline_pane', array(
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoalContributors($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   $goal = Goal::model()->findByPk($goalId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-goal-item-tab-pane",
     "_post_row" => $this->renderPartial('goal.views.goal.welcome_tab.goal_item_tab._goal_item_contributors_pane', array(
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "goalContributors" => $goal->getGoalParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "goalContributorsCount" => $goal->getGoalParentContributorsCount(),
       "goalId" => $goalId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoalComments($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   $goal = Goal::model()->findByPk($goalId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-goal-item-tab-pane",
     "_post_row" => $this->renderPartial('goal.views.goal.welcome_tab.goal_item_tab._goal_item_comments_pane', array(
       "commentModel" => new Comment(),
       'goalComments' => $goal->getGoalParentComments(Comment::$COMMENTS_PER_PAGE),
       'goalCommentsCount' => $goal->getGoalParentCommentsCount(),
       'goalId' => $goalId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoalTodos($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   $goal = Goal::model()->findByPk($goalId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-goal-item-tab-pane",
     "_post_row" => $this->renderPartial('goal.views.goal.welcome_tab.goal_item_tab._goal_item_todos_pane', array(
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'goalTodos' => $goal->getGoalParentTodos(Todo::$TODOS_PER_PAGE),
       'goalTodosCount' => $goal->getGoalParentTodosCount(),
       'goalId' => $goalId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoalDiscussions($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   $goal = Goal::model()->findByPk($goalId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-goal-item-tab-pane",
     "_post_row" => $this->renderPartial('goal.views.goal.welcome_tab.goal_item_tab._goal_item_discussions_pane', array(
       "discussionModel" => new Discussion(),
       'goalDiscussions' => $goal->getGoalParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'goalDiscussionsCount' => $goal->getGoalParentDiscussionsCount(),
       'goalId' => $goalId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoalNotes($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   $goal = Goal::model()->findByPk($goalId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-goal-item-tab-pane",
     "_post_row" => $this->renderPartial('goal.views.goal.welcome_tab.goal_item_tab._goal_item_notes_pane', array(
       "noteModel" => new Note(),
       'goalNotes' => $goal->getGoalParentNotes(Note::$NOTES_PER_PAGE),
       'goalNotesCount' => $goal->getGoalParentNotesCount(),
       'goalId' => $goalId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoalQuestionnaires($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   $goal = Goal::model()->findByPk($goalId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-goal-item-tab-pane",
     "_post_row" => $this->renderPartial('goal.views.goal.welcome_tab.goal_item_tab._goal_item_questionnaires_pane', array(
       "questionnaireModel" => new Questionnaire(),
       'goalQuestionnaires' => $goal->getGoalParentQuestionnaires(Questionnaire::$QUESTIONNAIRES_PER_PAGE),
       'goalQuestionnairesCount' => $goal->getGoalParentQuestionnairesCount(),
       'goalId' => $goalId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoalWeblinks($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   $goal = Goal::model()->findByPk($goalId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-goal-item-tab-pane",
     "_post_row" => $this->renderPartial('goal.views.goal.welcome_tab.goal_item_tab._goal_item_weblinks_pane', array(
       "weblinkModel" => new Weblink(),
       'goalWeblinks' => $goal->getGoalParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'goalWeblinksCount' => $goal->getGoalParentWeblinksCount(),
       'goalId' => $goalId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

}
