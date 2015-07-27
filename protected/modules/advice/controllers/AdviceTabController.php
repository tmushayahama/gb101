<?php

class AdviceTabController extends Controller {
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
        'advices',
        'adviceChild',
        'AdviceChildOverview',
        'adviceContent',
        'adviceContribution',
        'advicesWelcome',
        'adviceAppOverview',
        'adviceApps',
        'adviceTimeline',
        'adviceContributors',
        'adviceComments',
        'adviceTodos',
        'adviceDiscussions',
        'adviceQuestionnaire',
        'adviceQuestions',
        'adviceNotes',
        'adviceWeblinks',
        'adviceObserver'),
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

 public function actionAdviceAppOverview() {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-main-tab-pane",
     "selected_tab_url" => "advice",
     "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_6.css',
     "_post_row" => $this->renderPartial('advice.views.advice.tabs.advices_tab._advice_app_overview_pane', array(
       "advices" => Advice::getAdvices(null, null, Advice::$ADVICES_PER_PAGE),
       "adviceLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE), "id", "name"),
       "advicesCount" => Advice::getAdvicesCount(),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdvices($levelId) {
  if (Yii::app()->request->isAjaxRequest) {
   $level = Level::model()->findByPk($levelId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-advices-pane",
     "clear_tab_pane" => "#gb-advice-item-pane",
     "_post_row" => $this->renderPartial('advice.views.advice.tabs.advices_tab._advice_list_pane', array(
       "advices" => Advice::getAdvices($levelId, null, Advice::$ADVICES_PER_PAGE),
       "level" => $level,
       "advicesCount" => Advice::getAdvicesCount($levelId, null),
       ), true),
     "_no_content_row" => $this->renderPartial('advice.views.advice.activity.advice._no_content_row', array(
       "type" => Type::$NO_CONTENT_ADVICE,
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdvice($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   $advice = Advice::model()->findByPk($adviceId);
   //$adviceChecklistsCount = $advice->getChecklistsCount();
   echo CJSON::encode(array(
     "selected_tab_url" => Yii::app()->createUrl("app/advice/", array("adviceId" => $adviceId)),
     "_post_row" => $this->renderPartial('advice.views.advice.tabs.advices_tab._advice_detail_pane', array(
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
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdviceChild($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   $advice = Advice::model()->findByPk($adviceId);
   //$adviceChecklistsCount = $advice->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('advice.views.advice.tabs.advice_tab._advice_item_pane', array(
       'advice' => $advice,
       'adviceId' => $advice->id,
       "adviceLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
       //CONTRIBUTOR
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "adviceContributors" => $advice->getadviceParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "adviceContributorsCount" => $advice->getadviceParentContributorsCount(),
       //COMMENT
       'commentModel' => new Comment(),
       'adviceComments' => $advice->getadviceParentComments(Comment::$COMMENTS_PER_PAGE),
       'adviceCommentsCount' => $advice->getadviceParentCommentsCount(),
       //DISCUSSION
       "discussionModel" => new Discussion(),
       'adviceDiscussions' => $advice->getadviceParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'adviceDiscussionsCount' => $advice->getadviceParentDiscussionsCount(),
       //NOTES
       "noteModel" => new Note(),
       'adviceNotes' => $advice->getadviceParentNotes(Note::$NOTES_PER_PAGE),
       'adviceNotesCount' => $advice->getadviceParentNotesCount(),
       //TODO
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'adviceTodos' => $advice->getadviceParentTodos(Todo::$TODOS_PER_PAGE),
       'adviceTodosCount' => $advice->getadviceParentTodosCount(),
       //WEBLINKS
       "weblinkModel" => new Weblink(),
       'adviceWeblinks' => $advice->getadviceParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'adviceWeblinksCount' => $advice->getadviceParentWeblinksCount(),
       //TIMELINE
       'timelineModel' => new Timeline(),
       'adviceTimelineDays' => $advice->getadviceParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'adviceTimelineDaysCount' => $advice->getadviceParentTimelinesCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdviceChildOverview($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   $advice = Advice::model()->findByPk($adviceId);
   //$adviceChecklistsCount = $advice->getChecklistsCount();
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-advice-item-pane",
     "_post_row" => $this->renderPartial('advice.views.advice.tabs.advice_tab._advice_overview_pane', array(
       'advice' => $advice,
       'overviewQuestions' => Question::getQuestions(1),
       'timelineModel' => new Timeline(),
       // 'adviceChecklists' => $advice->getChecklists(Checklist::$CHECKLISTS_PER_OVERVIEW_PAGE),
       // 'adviceChecklistsCount' => $adviceChecklistsCount,
       // 'adviceChecklistsProgressCount' => $advice->getProgress($adviceChecklistsCount),
       //'adviceContributors' => $advice->getContributors(null, 6),
       // 'adviceContributorsCount' => $advice->getContributorsCount(),
       'adviceTimelineDays' => $advice->getAdviceParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'adviceTimelineDaysCount' => $advice->getAdviceParentTimelinesCount(),
       // 'adviceNotes' => $advice->getAdviceParentNotes(Note::$NOTES_PER_OVERVIEW_PAGE),
       // 'adviceNotesCount' => $advice->getAdviceParentNotesCount(),
       //  'adviceWeblinks' => $advice->getAdviceParentWeblinks(3),
       // 'adviceWeblinksCount' => $advice->getAdviceParentWeblinksCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdviceOverview($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   $advice = Advice::model()->findByPk($adviceId);
   // $adviceChecklistsCount = $advice->getChecklistsCount();

   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-advice-item-pane",
     "_post_row" => $this->renderPartial('advice.views.advice.tabs.advice_item_tab._advice_item_overview_pane', array(
       'advice' => $advice,
       'timelineModel' => new Timeline(),
       // 'adviceChecklists' => $advice->getChecklists(Checklist::$CHECKLISTS_PER_OVERVIEW_PAGE),
       // 'adviceChecklistsCount' => $adviceChecklistsCount,
       // 'adviceChecklistsProgressCount' => $advice->getProgress($adviceChecklistsCount),
       //'adviceContributors' => $advice->getContributors(null, 6),
       // 'adviceContributorsCount' => $advice->getContributorsCount(),
       "adviceLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
       "adviceContributors" => $advice->getadviceParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "adviceContributorsCount" => $advice->getadviceParentContributorsCount(),
       'adviceTimelineDays' => $advice->getAdviceParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'adviceTimelineDaysCount' => $advice->getAdviceParentTimelinesCount(),
       // 'adviceNotes' => $advice->getAdviceParentNotes(Note::$NOTES_PER_OVERVIEW_PAGE),
       // 'adviceNotesCount' => $advice->getAdviceParentNotesCount(),
       //  'adviceWeblinks' => $advice->getAdviceParentWeblinks(3),
       // 'adviceWeblinksCount' => $advice->getAdviceParentWeblinksCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdviceContent($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   $advice = Advice::model()->findByPk($adviceId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('advice.views.advice.tabs.advice_item_tab._advice_item_content_pane', array(
       'advice' => $advice,
       'adviceId' => $advice->id,
       "adviceLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
       //CONTRIBUTOR
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "adviceContributors" => $advice->getadviceParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "adviceContributorsCount" => $advice->getadviceParentContributorsCount(),
       //COMMENT
       'commentModel' => new Comment(),
       'adviceComments' => $advice->getadviceParentComments(Comment::$COMMENTS_PER_PAGE),
       'adviceCommentsCount' => $advice->getadviceParentCommentsCount(),
       //DISCUSSION
       "discussionModel" => new Discussion(),
       'adviceDiscussions' => $advice->getadviceParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'adviceDiscussionsCount' => $advice->getadviceParentDiscussionsCount(),
       //NOTES
       "noteModel" => new Note(),
       'adviceNotes' => $advice->getadviceParentNotes(Note::$NOTES_PER_PAGE),
       'adviceNotesCount' => $advice->getadviceParentNotesCount(),
       //TODO
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'adviceTodos' => $advice->getadviceParentTodos(Todo::$TODOS_PER_PAGE),
       'adviceTodosCount' => $advice->getadviceParentTodosCount(),
       //WEBLINKS
       "weblinkModel" => new Weblink(),
       'adviceWeblinks' => $advice->getadviceParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'adviceWeblinksCount' => $advice->getadviceParentWeblinksCount(),
       //TIMELINE
       'timelineModel' => new Timeline(),
       'adviceTimelineDays' => $advice->getadviceParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'adviceTimelineDaysCount' => $advice->getadviceParentTimelinesCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdviceContribution($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   $advice = Advice::model()->findByPk($adviceId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('advice.views.advice.tabs.advice_item_tab._advice_item_contribution_pane', array(
       'advice' => $advice,
       'adviceId' => $advice->id,
       "adviceLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
       //CONTRIBUTOR
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "adviceContributors" => $advice->getadviceParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "adviceContributorsCount" => $advice->getadviceParentContributorsCount(),
       //COMMENT
       'commentModel' => new Comment(),
       'adviceComments' => $advice->getadviceParentComments(Comment::$COMMENTS_PER_PAGE),
       'adviceCommentsCount' => $advice->getadviceParentCommentsCount(),
       //DISCUSSION
       "discussionModel" => new Discussion(),
       'adviceDiscussions' => $advice->getadviceParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'adviceDiscussionsCount' => $advice->getadviceParentDiscussionsCount(),
       //NOTES
       "noteModel" => new Note(),
       'adviceNotes' => $advice->getadviceParentNotes(Note::$NOTES_PER_PAGE),
       'adviceNotesCount' => $advice->getadviceParentNotesCount(),
       //TODO
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'adviceTodos' => $advice->getadviceParentTodos(Todo::$TODOS_PER_PAGE),
       'adviceTodosCount' => $advice->getadviceParentTodosCount(),
       //WEBLINKS
       "weblinkModel" => new Weblink(),
       'adviceWeblinks' => $advice->getadviceParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'adviceWeblinksCount' => $advice->getadviceParentWeblinksCount(),
       //TIMELINE
       'timelineModel' => new Timeline(),
       'adviceTimelineDays' => $advice->getadviceParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'adviceTimelineDaysCount' => $advice->getadviceParentTimelinesCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdviceApps($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#advice-management-apps-pane",
     "_post_row" => $this->renderPartial('advice.views.advice.apps_tab._advice_apps_pane', array(
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdviceTimeline($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#advice-management-timeline-pane",
     "_post_row" => $this->renderPartial('advice.views.advice.timeline_tab._advice_timeline_pane', array(
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdviceContributors($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   $advice = Advice::model()->findByPk($adviceId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-advice-item-tab-pane",
     "_post_row" => $this->renderPartial('advice.views.advice.activity.contributor._advice_contributors_list', array(
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "adviceContributors" => $advice->getAdviceParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "adviceContributorsCount" => $advice->getAdviceParentContributorsCount(),
       "adviceId" => $adviceId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdviceComments($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   $advice = Advice::model()->findByPk($adviceId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-advice-item-tab-pane",
     "_post_row" => $this->renderPartial('advice.views.advice.activity.comment._advice_comments_section', array(
       "commentModel" => new Comment(),
       'adviceComments' => $advice->getAdviceParentComments(Comment::$COMMENTS_PER_PAGE),
       'adviceCommentsCount' => $advice->getAdviceParentCommentsCount(),
       'adviceId' => $adviceId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdviceTodos($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   $advice = Advice::model()->findByPk($adviceId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-advice-item-tab-pane",
     "_post_row" => $this->renderPartial('advice.views.advice.activity.todo._advice_todos_list', array(
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'adviceTodos' => $advice->getAdviceParentTodos(Todo::$TODOS_PER_PAGE),
       'adviceTodosCount' => $advice->getAdviceParentTodosCount(),
       'adviceId' => $adviceId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdviceDiscussions($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   $advice = Advice::model()->findByPk($adviceId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-advice-item-tab-pane",
     "_post_row" => $this->renderPartial('advice.views.advice.activity.discussion._advice_discussions_list', array(
       "discussionModel" => new Discussion(),
       'adviceDiscussions' => $advice->getAdviceParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'adviceDiscussionsCount' => $advice->getAdviceParentDiscussionsCount(),
       'adviceId' => $adviceId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdviceNotes($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   $advice = Advice::model()->findByPk($adviceId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-advice-item-tab-pane",
     "_post_row" => $this->renderPartial('advice.views.advice.activity.note._advice_notes_list', array(
       "noteModel" => new Note(),
       'adviceNotes' => $advice->getAdviceParentNotes(Note::$NOTES_PER_PAGE),
       'adviceNotesCount' => $advice->getAdviceParentNotesCount(),
       'adviceId' => $adviceId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdviceQuestionnaires($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   $advice = Advice::model()->findByPk($adviceId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-advice-item-tab-pane",
     "_post_row" => $this->renderPartial('advice.views.advice.activity.questionnaire._advice_questionnaires_section', array(
       "questionnaireModel" => new Questionnaire(),
       'adviceQuestionnaires' => $advice->getAdviceParentQuestionnaires(Questionnaire::$QUESTIONNAIRES_PER_PAGE),
       'adviceQuestionnairesCount' => $advice->getAdviceParentQuestionnairesCount(),
       'adviceId' => $adviceId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAdviceWeblinks($adviceId) {
  if (Yii::app()->request->isAjaxRequest) {
   $advice = Advice::model()->findByPk($adviceId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-advice-item-tab-pane",
     "_post_row" => $this->renderPartial('advice.views.advice.activity.weblink._advice_weblinks_list', array(
       "weblinkModel" => new Weblink(),
       'adviceWeblinks' => $advice->getAdviceParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'adviceWeblinksCount' => $advice->getAdviceParentWeblinksCount(),
       'adviceId' => $adviceId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

}
