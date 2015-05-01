<?php

class MentorshipTabController extends Controller {
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
        'mentorships',
        'mentorshipChild',
        'MentorshipChildOverview',
        'mentorshipContent',
        'mentorshipContribution',
        'mentorshipsWelcome',
        'mentorshipAppOverview',
        'mentorshipApps',
        'mentorshipTimeline',
        'mentorshipContributors',
        'mentorshipComments',
        'mentorshipTodos',
        'mentorshipDiscussions',
        'mentorshipQuestionnaire',
        'mentorshipQuestions',
        'mentorshipNotes',
        'mentorshipWeblinks',
        'mentorshipObserver'),
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

 public function actionMentorshipAppOverview() {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-main-tab-pane",
     "selected_tab_url" => "mentorship",
     "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_5.css',
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.tabs.mentorships_tab._mentorship_app_overview_pane', array(
       "mentorships" => Mentorship::getMentorships(null, null, Mentorship::$MENTORSHIPS_PER_PAGE),
       "mentorshipLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name"),
       "mentorshipsCount" => Mentorship::getMentorshipsCount(),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorships($levelId) {
  if (Yii::app()->request->isAjaxRequest) {
   $level = Level::model()->findByPk($levelId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-mentorships-pane",
     "clear_tab_pane" => "#gb-mentorship-item-pane",
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.tabs.mentorships_tab._mentorship_list_pane', array(
       "mentorships" => Mentorship::getMentorships($levelId, null, Mentorship::$MENTORSHIPS_PER_PAGE),
       "level" => $level,
       "mentorshipsCount" => Mentorship::getMentorshipsCount($levelId, null),
       ), true),
     "_no_content_row" => $this->renderPartial('mentorship.views.mentorship.activity.mentorship._no_content_row', array(
       "type" => Type::$NO_CONTENT_MENTORSHIP,
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorship($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   $mentorship = Mentorship::model()->findByPk($mentorshipId);
   //$mentorshipChecklistsCount = $mentorship->getChecklistsCount();
   echo CJSON::encode(array(
     "selected_tab_url" => Yii::app()->createUrl("app/mentorship/", array("mentorshipId" => $mentorshipId)),
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.tabs.mentorships_tab._mentorship_detail_pane', array(
       'mentorship' => $mentorship,
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP_TYPE), "id", "name"),
       "mentorshipChildren" => Mentorship::getMentorships(null, $mentorship->id, Mentorship::$MENTORSHIPS_PER_PAGE),
       "mentorshipChildrenCount" => Mentorship::getMentorshipsCount(null, $mentorship->id),
       // 'mentorshipChecklists' => $mentorship->getChecklists(Checklist::$CHECKLISTS_PER_OVERVIEW_PAGE),
       // 'mentorshipChecklistsCount' => $mentorshipChecklistsCount,
       // 'mentorshipChecklistsProgressCount' => $mentorship->getProgress($mentorshipChecklistsCount),
       // 'mentorshipContributors' => $mentorship->getContributors(null, 6),
       // 'mentorshipContributorsCount' => $mentorship->getContributorsCount(),
       'timelineModel' => new Timeline(),
       'mentorshipTimelineDays' => $mentorship->getMentorshipParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'mentorshipTimelineDaysCount' => $mentorship->getMentorshipParentTimelinesCount(),
       // 'mentorshipNotes' => $mentorship->getMentorshipParentNotes(Note::$NOTES_PER_OVERVIEW_PAGE),
       // 'mentorshipNotesCount' => $mentorship->getMentorshipParentNotesCount(),
       //  'mentorshipWeblinks' => $mentorship->getMentorshipParentWeblinks(3),
       // 'mentorshipWeblinksCount' => $mentorship->getMentorshipParentWeblinksCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorshipChild($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   $mentorship = Mentorship::model()->findByPk($mentorshipId);
   //$mentorshipChecklistsCount = $mentorship->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.tabs.mentorship_tab._mentorship_item_pane', array(
       'mentorship' => $mentorship,
       'mentorshipId' => $mentorship->id,
       "mentorshipLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
       //CONTRIBUTOR
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "mentorshipContributors" => $mentorship->getmentorshipParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "mentorshipContributorsCount" => $mentorship->getmentorshipParentContributorsCount(),
       //COMMENT
       'commentModel' => new Comment(),
       'mentorshipComments' => $mentorship->getmentorshipParentComments(Comment::$COMMENTS_PER_PAGE),
       'mentorshipCommentsCount' => $mentorship->getmentorshipParentCommentsCount(),
       //DISCUSSION
       "discussionModel" => new Discussion(),
       'mentorshipDiscussions' => $mentorship->getmentorshipParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'mentorshipDiscussionsCount' => $mentorship->getmentorshipParentDiscussionsCount(),
       //NOTES
       "noteModel" => new Note(),
       'mentorshipNotes' => $mentorship->getmentorshipParentNotes(Note::$NOTES_PER_PAGE),
       'mentorshipNotesCount' => $mentorship->getmentorshipParentNotesCount(),
       //TODO
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'mentorshipTodos' => $mentorship->getmentorshipParentTodos(Todo::$TODOS_PER_PAGE),
       'mentorshipTodosCount' => $mentorship->getmentorshipParentTodosCount(),
       //WEBLINKS
       "weblinkModel" => new Weblink(),
       'mentorshipWeblinks' => $mentorship->getmentorshipParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'mentorshipWeblinksCount' => $mentorship->getmentorshipParentWeblinksCount(),
       //TIMELINE
       'timelineModel' => new Timeline(),
       'mentorshipTimelineDays' => $mentorship->getmentorshipParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'mentorshipTimelineDaysCount' => $mentorship->getmentorshipParentTimelinesCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorshipChildOverview($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   $mentorship = Mentorship::model()->findByPk($mentorshipId);
   //$mentorshipChecklistsCount = $mentorship->getChecklistsCount();
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-mentorship-item-pane",
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.tabs.mentorship_tab._mentorship_overview_pane', array(
       'mentorship' => $mentorship,
       'overviewQuestions' => Question::getQuestions(1),
       'timelineModel' => new Timeline(),
       // 'mentorshipChecklists' => $mentorship->getChecklists(Checklist::$CHECKLISTS_PER_OVERVIEW_PAGE),
       // 'mentorshipChecklistsCount' => $mentorshipChecklistsCount,
       // 'mentorshipChecklistsProgressCount' => $mentorship->getProgress($mentorshipChecklistsCount),
       //'mentorshipContributors' => $mentorship->getContributors(null, 6),
       // 'mentorshipContributorsCount' => $mentorship->getContributorsCount(),
       'mentorshipTimelineDays' => $mentorship->getMentorshipParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'mentorshipTimelineDaysCount' => $mentorship->getMentorshipParentTimelinesCount(),
       // 'mentorshipNotes' => $mentorship->getMentorshipParentNotes(Note::$NOTES_PER_OVERVIEW_PAGE),
       // 'mentorshipNotesCount' => $mentorship->getMentorshipParentNotesCount(),
       //  'mentorshipWeblinks' => $mentorship->getMentorshipParentWeblinks(3),
       // 'mentorshipWeblinksCount' => $mentorship->getMentorshipParentWeblinksCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorshipOverview($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   $mentorship = Mentorship::model()->findByPk($mentorshipId);
   // $mentorshipChecklistsCount = $mentorship->getChecklistsCount();

   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-mentorship-item-pane",
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.welcome_tab._mentorship_item_pane', array(
       'mentorship' => $mentorship,
       'timelineModel' => new Timeline(),
       // 'mentorshipChecklists' => $mentorship->getChecklists(Checklist::$CHECKLISTS_PER_OVERVIEW_PAGE),
       // 'mentorshipChecklistsCount' => $mentorshipChecklistsCount,
       // 'mentorshipChecklistsProgressCount' => $mentorship->getProgress($mentorshipChecklistsCount),
       //'mentorshipContributors' => $mentorship->getContributors(null, 6),
       // 'mentorshipContributorsCount' => $mentorship->getContributorsCount(),
       'mentorshipTimelineDays' => $mentorship->getMentorshipParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'mentorshipTimelineDaysCount' => $mentorship->getMentorshipParentTimelinesCount(),
       // 'mentorshipNotes' => $mentorship->getMentorshipParentNotes(Note::$NOTES_PER_OVERVIEW_PAGE),
       // 'mentorshipNotesCount' => $mentorship->getMentorshipParentNotesCount(),
       //  'mentorshipWeblinks' => $mentorship->getMentorshipParentWeblinks(3),
       // 'mentorshipWeblinksCount' => $mentorship->getMentorshipParentWeblinksCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorshipContent($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   $mentorship = Mentorship::model()->findByPk($mentorshipId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.tabs.mentorship_item_tab._mentorship_item_content_pane', array(
       'mentorship' => $mentorship,
       'mentorshipId' => $mentorship->id,
       "mentorshipLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
       //CONTRIBUTOR
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "mentorshipContributors" => $mentorship->getmentorshipParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "mentorshipContributorsCount" => $mentorship->getmentorshipParentContributorsCount(),
       //COMMENT
       'commentModel' => new Comment(),
       'mentorshipComments' => $mentorship->getmentorshipParentComments(Comment::$COMMENTS_PER_PAGE),
       'mentorshipCommentsCount' => $mentorship->getmentorshipParentCommentsCount(),
       //DISCUSSION
       "discussionModel" => new Discussion(),
       'mentorshipDiscussions' => $mentorship->getmentorshipParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'mentorshipDiscussionsCount' => $mentorship->getmentorshipParentDiscussionsCount(),
       //NOTES
       "noteModel" => new Note(),
       'mentorshipNotes' => $mentorship->getmentorshipParentNotes(Note::$NOTES_PER_PAGE),
       'mentorshipNotesCount' => $mentorship->getmentorshipParentNotesCount(),
       //TODO
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'mentorshipTodos' => $mentorship->getmentorshipParentTodos(Todo::$TODOS_PER_PAGE),
       'mentorshipTodosCount' => $mentorship->getmentorshipParentTodosCount(),
       //WEBLINKS
       "weblinkModel" => new Weblink(),
       'mentorshipWeblinks' => $mentorship->getmentorshipParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'mentorshipWeblinksCount' => $mentorship->getmentorshipParentWeblinksCount(),
       //TIMELINE
       'timelineModel' => new Timeline(),
       'mentorshipTimelineDays' => $mentorship->getmentorshipParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'mentorshipTimelineDaysCount' => $mentorship->getmentorshipParentTimelinesCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorshipContribution($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   $mentorship = Mentorship::model()->findByPk($mentorshipId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.tabs.mentorship_item_tab._mentorship_item_contribution_pane', array(
       'mentorship' => $mentorship,
       'mentorshipId' => $mentorship->id,
       "mentorshipLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
       //CONTRIBUTOR
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "mentorshipContributors" => $mentorship->getmentorshipParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "mentorshipContributorsCount" => $mentorship->getmentorshipParentContributorsCount(),
       //COMMENT
       'commentModel' => new Comment(),
       'mentorshipComments' => $mentorship->getmentorshipParentComments(Comment::$COMMENTS_PER_PAGE),
       'mentorshipCommentsCount' => $mentorship->getmentorshipParentCommentsCount(),
       //DISCUSSION
       "discussionModel" => new Discussion(),
       'mentorshipDiscussions' => $mentorship->getmentorshipParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'mentorshipDiscussionsCount' => $mentorship->getmentorshipParentDiscussionsCount(),
       //NOTES
       "noteModel" => new Note(),
       'mentorshipNotes' => $mentorship->getmentorshipParentNotes(Note::$NOTES_PER_PAGE),
       'mentorshipNotesCount' => $mentorship->getmentorshipParentNotesCount(),
       //TODO
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'mentorshipTodos' => $mentorship->getmentorshipParentTodos(Todo::$TODOS_PER_PAGE),
       'mentorshipTodosCount' => $mentorship->getmentorshipParentTodosCount(),
       //WEBLINKS
       "weblinkModel" => new Weblink(),
       'mentorshipWeblinks' => $mentorship->getmentorshipParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'mentorshipWeblinksCount' => $mentorship->getmentorshipParentWeblinksCount(),
       //TIMELINE
       'timelineModel' => new Timeline(),
       'mentorshipTimelineDays' => $mentorship->getmentorshipParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'mentorshipTimelineDaysCount' => $mentorship->getmentorshipParentTimelinesCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorshipApps($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#mentorship-management-apps-pane",
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.apps_tab._mentorship_apps_pane', array(
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorshipTimeline($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#mentorship-management-timeline-pane",
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.timeline_tab._mentorship_timeline_pane', array(
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorshipContributors($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   $mentorship = Mentorship::model()->findByPk($mentorshipId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-mentorship-item-tab-pane",
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.activity.contributor._mentorship_contributors_list', array(
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "mentorshipContributors" => $mentorship->getMentorshipParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "mentorshipContributorsCount" => $mentorship->getMentorshipParentContributorsCount(),
       "mentorshipId" => $mentorshipId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorshipComments($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   $mentorship = Mentorship::model()->findByPk($mentorshipId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-mentorship-item-tab-pane",
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.activity.comment._mentorship_comments_section', array(
       "commentModel" => new Comment(),
       'mentorshipComments' => $mentorship->getMentorshipParentComments(Comment::$COMMENTS_PER_PAGE),
       'mentorshipCommentsCount' => $mentorship->getMentorshipParentCommentsCount(),
       'mentorshipId' => $mentorshipId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorshipTodos($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   $mentorship = Mentorship::model()->findByPk($mentorshipId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-mentorship-item-tab-pane",
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.activity.todo._mentorship_todos_list', array(
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'mentorshipTodos' => $mentorship->getMentorshipParentTodos(Todo::$TODOS_PER_PAGE),
       'mentorshipTodosCount' => $mentorship->getMentorshipParentTodosCount(),
       'mentorshipId' => $mentorshipId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorshipDiscussions($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   $mentorship = Mentorship::model()->findByPk($mentorshipId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-mentorship-item-tab-pane",
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.activity.discussion._mentorship_discussions_list', array(
       "discussionModel" => new Discussion(),
       'mentorshipDiscussions' => $mentorship->getMentorshipParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'mentorshipDiscussionsCount' => $mentorship->getMentorshipParentDiscussionsCount(),
       'mentorshipId' => $mentorshipId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorshipNotes($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   $mentorship = Mentorship::model()->findByPk($mentorshipId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-mentorship-item-tab-pane",
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.activity.note._mentorship_notes_list', array(
       "noteModel" => new Note(),
       'mentorshipNotes' => $mentorship->getMentorshipParentNotes(Note::$NOTES_PER_PAGE),
       'mentorshipNotesCount' => $mentorship->getMentorshipParentNotesCount(),
       'mentorshipId' => $mentorshipId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorshipQuestionnaires($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   $mentorship = Mentorship::model()->findByPk($mentorshipId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-mentorship-item-tab-pane",
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.activity.questionnaire._mentorship_questionnaires_section', array(
       "questionnaireModel" => new Questionnaire(),
       'mentorshipQuestionnaires' => $mentorship->getMentorshipParentQuestionnaires(Questionnaire::$QUESTIONNAIRES_PER_PAGE),
       'mentorshipQuestionnairesCount' => $mentorship->getMentorshipParentQuestionnairesCount(),
       'mentorshipId' => $mentorshipId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionMentorshipWeblinks($mentorshipId) {
  if (Yii::app()->request->isAjaxRequest) {
   $mentorship = Mentorship::model()->findByPk($mentorshipId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-mentorship-item-tab-pane",
     "_post_row" => $this->renderPartial('mentorship.views.mentorship.activity.weblink._mentorship_weblinks_list', array(
       "weblinkModel" => new Weblink(),
       'mentorshipWeblinks' => $mentorship->getMentorshipParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'mentorshipWeblinksCount' => $mentorship->getMentorshipParentWeblinksCount(),
       'mentorshipId' => $mentorshipId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

}
