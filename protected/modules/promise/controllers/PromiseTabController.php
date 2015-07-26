<?php

class PromiseTabController extends Controller {
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
        'promises',
        'promisesWelcome',
        'promiseAppOverview',
        'promiseApps',
        'promiseContent',
        'promiseContribution',
        'promiseSettings',
        'promiseTimeline',
        'promiseContributors',
        'promiseComments',
        'promiseTodos',
        'promiseDiscussions',
        'promiseQuestionnaire',
        'promiseQuestions',
        'promiseNotes',
        'promiseWeblinks',
        'promiseObserver'),
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

 public function actionPromiseAppOverview() {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_4.css',
     "selected_tab_url" => "promise",
     "_post_row" => $this->renderPartial('promise.views.promise.tabs.promises_tab._promise_app_overview_pane', array(
       "promises" => Promise::getPromises(null, Promise::$PROMISES_PER_PAGE),
       "promiseLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_PROMISE), "id", "name"),
       "promisesCount" => Promise::getPromisesCount(),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionPromises($levelId) {
  if (Yii::app()->request->isAjaxRequest) {
   $level = Level::model()->findByPk($levelId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-promises-pane",
     "clear_tab_pane" => "#gb-promise-item-pane",
     "_post_row" => $this->renderPartial('promise.views.promise.tabs.promises_tab._promise_list_pane', array(
       "promises" => Promise::getPromises($levelId, Promise::$PROMISES_PER_PAGE),
       "level" => $level,
       "promisesCount" => Promise::getPromisesCount($levelId),
       ), true),
     "_no_content_row" => $this->renderPartial('promise.views.promise.activity.promise._no_content_row', array(
       "type" => Type::$NO_CONTENT_PROMISE,
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionPromise($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   $promise = Promise::model()->findByPk($promiseId);
   //$promiseChecklistsCount = $promise->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('promise.views.promise.tabs.promise_tab._promise_item_pane', array(
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
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionPromiseOverview($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   $promise = Promise::model()->findByPk($promiseId);
   // $promiseChecklistsCount = $promise->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('promise.views.promise.tabs.promise_item_tab._promise_item_overview_pane', array(
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
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionPromiseContent($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   $promise = Promise::model()->findByPk($promiseId);
   //$promiseChecklistsCount = $promise->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('promise.views.promise.tabs.promise_item_tab._promise_item_content_pane', array(
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
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionPromiseContribution($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   $promise = Promise::model()->findByPk($promiseId);
   //$promiseChecklistsCount = $promise->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('promise.views.promise.tabs.promise_item_tab._promise_item_contribution_pane', array(
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
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionPromiseSettings($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   $promise = Promise::model()->findByPk($promiseId);
   //$promiseChecklistsCount = $promise->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('promise.views.promise.tabs.promise_item_tab._promise_item_settings_pane', array(
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
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionPromiseApps($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('promise.views.promise.apps_tab._promise_apps_pane', array(
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionPromiseTimeline($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('promise.views.promise.timeline_tab._promise_timeline_pane', array(
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionPromiseContributors($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   $promise = Promise::model()->findByPk($promiseId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('promise.views.promise.activity.contributor._promise_contributors_section', array(
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "promiseContributors" => $promise->getPromiseParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "promiseContributorsCount" => $promise->getPromiseParentContributorsCount(),
       "promiseId" => $promiseId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionPromiseComments($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   $promise = Promise::model()->findByPk($promiseId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('promise.views.promise.activity.comment._promise_comments_section', array(
       "commentModel" => new Comment(),
       'promiseComments' => $promise->getPromiseParentComments(Comment::$COMMENTS_PER_PAGE),
       'promiseCommentsCount' => $promise->getPromiseParentCommentsCount(),
       'promiseId' => $promiseId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionPromiseTodos($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   $promise = Promise::model()->findByPk($promiseId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('promise.views.promise.activity.todo._promise_todos_section', array(
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'promiseTodos' => $promise->getPromiseParentTodos(Todo::$TODOS_PER_PAGE),
       'promiseTodosCount' => $promise->getPromiseParentTodosCount(),
       'promiseId' => $promiseId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionPromiseDiscussions($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   $promise = Promise::model()->findByPk($promiseId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('promise.views.promise.activity.discussion._promise_discussions_section', array(
       "discussionModel" => new Discussion(),
       'promiseDiscussions' => $promise->getPromiseParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'promiseDiscussionsCount' => $promise->getPromiseParentDiscussionsCount(),
       'promiseId' => $promiseId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionPromiseNotes($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   $promise = Promise::model()->findByPk($promiseId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('promise.views.promise.activity.note._promise_notes_section', array(
       "noteModel" => new Note(),
       'promiseNotes' => $promise->getPromiseParentNotes(Note::$NOTES_PER_PAGE),
       'promiseNotesCount' => $promise->getPromiseParentNotesCount(),
       'promiseId' => $promiseId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionPromiseQuestionnaires($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   $promise = Promise::model()->findByPk($promiseId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('promise.views.promise.activity.questionnaire._promise_questionnaires_section', array(
       "questionnaireModel" => new Questionnaire(),
       'promiseQuestionnaires' => $promise->getPromiseParentQuestionnaires(Questionnaire::$QUESTIONNAIRES_PER_PAGE),
       'promiseQuestionnairesCount' => $promise->getPromiseParentQuestionnairesCount(),
       'promiseId' => $promiseId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionPromiseWeblinks($promiseId) {
  if (Yii::app()->request->isAjaxRequest) {
   $promise = Promise::model()->findByPk($promiseId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('promise.views.promise.activity.weblink._promise_weblinks_section', array(
       "weblinkModel" => new Weblink(),
       'promiseWeblinks' => $promise->getPromiseParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'promiseWeblinksCount' => $promise->getPromiseParentWeblinksCount(),
       'promiseId' => $promiseId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

}
