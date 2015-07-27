<?php

class HobbyTabController extends Controller {
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
        'hobbys',
        'hobbysWelcome',
        'hobbyAppOverview',
        'hobbyApps',
        'hobbyContent',
        'hobbyContribution',
        'hobbySettings',
        'hobbyTimeline',
        'hobbyContributors',
        'hobbyComments',
        'hobbyTodos',
        'hobbyDiscussions',
        'hobbyQuestionnaire',
        'hobbyQuestions',
        'hobbyNotes',
        'hobbyWeblinks',
        'hobbyObserver'),
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

 public function actionHobbyAppOverview() {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_3.css',
     "selected_tab_url" => "hobby",
     "_post_row" => $this->renderPartial('hobby.views.hobby.tabs.hobbys_tab._hobby_app_overview_pane', array(
       "hobbys" => Hobby::getHobbys(null, Hobby::$HOBBYS_PER_PAGE),
       "hobbyLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_HOBBY), "id", "name"),
       "hobbysCount" => Hobby::getHobbysCount(),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbys($levelId) {
  if (Yii::app()->request->isAjaxRequest) {
   $level = Level::model()->findByPk($levelId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-hobbys-pane",
     "clear_tab_pane" => "#gb-hobby-item-pane",
     "_post_row" => $this->renderPartial('hobby.views.hobby.tabs.hobbys_tab._hobby_list_pane', array(
       "hobbys" => Hobby::getHobbys($levelId, Hobby::$HOBBYS_PER_PAGE),
       "level" => $level,
       "hobbysCount" => Hobby::getHobbysCount($levelId),
       ), true),
     "_no_content_row" => $this->renderPartial('hobby.views.hobby.activity.hobby._no_content_row', array(
       "type" => Type::$NO_CONTENT_HOBBY,
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobby($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   $hobby = Hobby::model()->findByPk($hobbyId);
   //$hobbyChecklistsCount = $hobby->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('hobby.views.hobby.tabs.hobby_tab._hobby_item_pane', array(
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
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbyOverview($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   $hobby = Hobby::model()->findByPk($hobbyId);
   // $hobbyChecklistsCount = $hobby->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('hobby.views.hobby.tabs.hobby_item_tab._hobby_item_overview_pane', array(
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
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbyContent($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   $hobby = Hobby::model()->findByPk($hobbyId);
   //$hobbyChecklistsCount = $hobby->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('hobby.views.hobby.tabs.hobby_item_tab._hobby_item_content_pane', array(
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
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbyContribution($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   $hobby = Hobby::model()->findByPk($hobbyId);
   //$hobbyChecklistsCount = $hobby->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('hobby.views.hobby.tabs.hobby_item_tab._hobby_item_contribution_pane', array(
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
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbySettings($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   $hobby = Hobby::model()->findByPk($hobbyId);
   //$hobbyChecklistsCount = $hobby->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('hobby.views.hobby.tabs.hobby_item_tab._hobby_item_settings_pane', array(
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
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbyApps($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('hobby.views.hobby.apps_tab._hobby_apps_pane', array(
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbyTimeline($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('hobby.views.hobby.timeline_tab._hobby_timeline_pane', array(
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbyContributors($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   $hobby = Hobby::model()->findByPk($hobbyId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('hobby.views.hobby.activity.contributor._hobby_contributors_section', array(
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "hobbyContributors" => $hobby->getHobbyParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "hobbyContributorsCount" => $hobby->getHobbyParentContributorsCount(),
       "hobbyId" => $hobbyId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbyComments($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   $hobby = Hobby::model()->findByPk($hobbyId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('hobby.views.hobby.activity.comment._hobby_comments_section', array(
       "commentModel" => new Comment(),
       'hobbyComments' => $hobby->getHobbyParentComments(Comment::$COMMENTS_PER_PAGE),
       'hobbyCommentsCount' => $hobby->getHobbyParentCommentsCount(),
       'hobbyId' => $hobbyId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbyTodos($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   $hobby = Hobby::model()->findByPk($hobbyId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('hobby.views.hobby.activity.todo._hobby_todos_section', array(
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'hobbyTodos' => $hobby->getHobbyParentTodos(Todo::$TODOS_PER_PAGE),
       'hobbyTodosCount' => $hobby->getHobbyParentTodosCount(),
       'hobbyId' => $hobbyId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbyDiscussions($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   $hobby = Hobby::model()->findByPk($hobbyId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('hobby.views.hobby.activity.discussion._hobby_discussions_section', array(
       "discussionModel" => new Discussion(),
       'hobbyDiscussions' => $hobby->getHobbyParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'hobbyDiscussionsCount' => $hobby->getHobbyParentDiscussionsCount(),
       'hobbyId' => $hobbyId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbyNotes($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   $hobby = Hobby::model()->findByPk($hobbyId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('hobby.views.hobby.activity.note._hobby_notes_section', array(
       "noteModel" => new Note(),
       'hobbyNotes' => $hobby->getHobbyParentNotes(Note::$NOTES_PER_PAGE),
       'hobbyNotesCount' => $hobby->getHobbyParentNotesCount(),
       'hobbyId' => $hobbyId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbyQuestionnaires($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   $hobby = Hobby::model()->findByPk($hobbyId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('hobby.views.hobby.activity.questionnaire._hobby_questionnaires_section', array(
       "questionnaireModel" => new Questionnaire(),
       'hobbyQuestionnaires' => $hobby->getHobbyParentQuestionnaires(Questionnaire::$QUESTIONNAIRES_PER_PAGE),
       'hobbyQuestionnairesCount' => $hobby->getHobbyParentQuestionnairesCount(),
       'hobbyId' => $hobbyId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbyWeblinks($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   $hobby = Hobby::model()->findByPk($hobbyId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('hobby.views.hobby.activity.weblink._hobby_weblinks_section', array(
       "weblinkModel" => new Weblink(),
       'hobbyWeblinks' => $hobby->getHobbyParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'hobbyWeblinksCount' => $hobby->getHobbyParentWeblinksCount(),
       'hobbyId' => $hobbyId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

}
