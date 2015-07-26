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
      'actions' => array(
        'goals',
        'goalsWelcome',
        'goalAppOverview',
        'goalApps',
        'goalContent',
        'goalContribution',
        'goalSettings',
        'goalTimeline',
        'goalContributors',
        'goalComments',
        'goalTodos',
        'goalDiscussions',
        'goalQuestionnaire',
        'goalQuestions',
        'goalNotes',
        'goalWeblinks',
        'goalObserver'),
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
     "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_4.css',
     "selected_tab_url" => "goal",
     "_post_row" => $this->renderPartial('goal.views.goal.tabs.goals_tab._goal_app_overview_pane', array(
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
     "_post_row" => $this->renderPartial('goal.views.goal.tabs.goals_tab._goal_list_pane', array(
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
     "_post_row" => $this->renderPartial('goal.views.goal.tabs.goal_tab._goal_item_pane', array(
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
     "_post_row" => $this->renderPartial('goal.views.goal.tabs.goal_item_tab._goal_item_overview_pane', array(
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
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoalContent($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   $goal = Goal::model()->findByPk($goalId);
   //$goalChecklistsCount = $goal->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('goal.views.goal.tabs.goal_item_tab._goal_item_content_pane', array(
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
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoalContribution($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   $goal = Goal::model()->findByPk($goalId);
   //$goalChecklistsCount = $goal->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('goal.views.goal.tabs.goal_item_tab._goal_item_contribution_pane', array(
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
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoalSettings($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   $goal = Goal::model()->findByPk($goalId);
   //$goalChecklistsCount = $goal->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('goal.views.goal.tabs.goal_item_tab._goal_item_settings_pane', array(
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
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionGoalApps($goalId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
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
     "_post_row" => $this->renderPartial('goal.views.goal.activity.contributor._goal_contributors_section', array(
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
     "_post_row" => $this->renderPartial('goal.views.goal.activity.comment._goal_comments_section', array(
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
     "_post_row" => $this->renderPartial('goal.views.goal.activity.todo._goal_todos_section', array(
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
     "_post_row" => $this->renderPartial('goal.views.goal.activity.discussion._goal_discussions_section', array(
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
     "_post_row" => $this->renderPartial('goal.views.goal.activity.note._goal_notes_section', array(
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
     "_post_row" => $this->renderPartial('goal.views.goal.activity.questionnaire._goal_questionnaires_section', array(
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
     "_post_row" => $this->renderPartial('goal.views.goal.activity.weblink._goal_weblinks_section', array(
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
