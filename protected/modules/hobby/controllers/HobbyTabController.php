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
      'actions' => array('hobbies', 'hobbiesWelcome', 'hobbyAppOverview', 'hobbyApps', 'hobbyTimeline', 'hobbyContributors',
        'hobbyComments', 'hobbyTodos', 'hobbyDiscussions', 'hobbyQuestionnaire', 'hobbyQuestions', 'hobbyNotes',
        'hobbyWeblinks', 'hobbyObserver'),
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
     "tab_pane_id" => "#gb-hobbies-pane",
     "_post_row" => $this->renderPartial('hobby.views.hobby.hobbies_tab._hobby_app_overview_pane', array(
       "hobbies" => Hobby::getHobbies(null, Hobby::$HOBBIES_PER_PAGE),
       "hobbyLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_HOBBY), "id", "name"),
       "hobbiesCount" => Hobby::getHobbiesCount(),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbies($levelId) {
  if (Yii::app()->request->isAjaxRequest) {
   $level = Level::model()->findByPk($levelId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-hobbies-pane",
     "clear_tab_pane" => "#gb-hobby-item-pane",
     "_post_row" => $this->renderPartial('hobby.views.hobby.hobbies_tab._hobby_list_pane', array(
       "hobbies" => Hobby::getHobbies($levelId, Hobby::$HOBBIES_PER_PAGE),
       "level" => $level,
       "hobbiesCount" => Hobby::getHobbiesCount($levelId),
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
     "tab_pane_id" => "#gb-hobby-item-pane",
     "_post_row" => $this->renderPartial('hobby.views.hobby.welcome_tab._hobby_item_pane', array(
       'hobby' => $hobby,
       "commentModel" => new Comment(),
       // 'hobbyChecklists' => $hobby->getChecklists(Checklist::$CHECKLISTS_PER_OVERVIEW_PAGE),
       // 'hobbyChecklistsCount' => $hobbyChecklistsCount,
       // 'hobbyChecklistsProgressCount' => $hobby->getProgress($hobbyChecklistsCount),
       //'hobbyContributors' => $hobby->getContributors(null, 6),
       // 'hobbyContributorsCount' => $hobby->getContributorsCount(),
       'hobbyComments' => $hobby->getHobbyParentComments(Comment::$COMMENTS_PER_OVERVIEW_PAGE),
       'hobbyCommentsCount' => $hobby->getHobbyParentCommentsCount(),
       // 'hobbyNotes' => $hobby->getHobbyParentNotes(Note::$NOTES_PER_OVERVIEW_PAGE),
       // 'hobbyNotesCount' => $hobby->getHobbyParentNotesCount(),
       //  'hobbyWeblinks' => $hobby->getHobbyParentWeblinks(3),
       // 'hobbyWeblinksCount' => $hobby->getHobbyParentWeblinksCount(),
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
     "tab_pane_id" => "#gb-hobby-item-tab-pane",
     "_post_row" => $this->renderPartial('hobby.views.hobby.welcome_tab.hobby_item_tab._hobby_item_overview_pane', array(
       'hobby' => $hobby,
       'commentModel' => new Comment(),
       // 'hobbyChecklists' => $hobby->getChecklists(Checklist::$CHECKLISTS_PER_OVERVIEW_PAGE),
       // 'hobbyChecklistsCount' => $hobbyChecklistsCount,
       // 'hobbyChecklistsProgressCount' => $hobby->getProgress($hobbyChecklistsCount),
       //'hobbyContributors' => $hobby->getContributors(null, 6),
       // 'hobbyContributorsCount' => $hobby->getContributorsCount(),
       'hobbyComments' => $hobby->getHobbyParentComments(Comment::$COMMENTS_PER_OVERVIEW_PAGE),
       'hobbyCommentsCount' => $hobby->getHobbyParentCommentsCount(),
       // 'hobbyNotes' => $hobby->getHobbyParentNotes(Note::$NOTES_PER_OVERVIEW_PAGE),
       // 'hobbyNotesCount' => $hobby->getHobbyParentNotesCount(),
       //  'hobbyWeblinks' => $hobby->getHobbyParentWeblinks(3),
       // 'hobbyWeblinksCount' => $hobby->getHobbyParentWeblinksCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionHobbyApps($hobbyId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#hobby-management-apps-pane",
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
     "tab_pane_id" => "#hobby-management-timeline-pane",
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
     "tab_pane_id" => "#gb-hobby-item-tab-pane",
     "_post_row" => $this->renderPartial('hobby.views.hobby.welcome_tab.hobby_item_tab._hobby_item_contributors_pane', array(
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
     "tab_pane_id" => "#gb-hobby-item-tab-pane",
     "_post_row" => $this->renderPartial('hobby.views.hobby.welcome_tab.hobby_item_tab._hobby_item_comments_pane', array(
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
     "tab_pane_id" => "#gb-hobby-item-tab-pane",
     "_post_row" => $this->renderPartial('hobby.views.hobby.welcome_tab.hobby_item_tab._hobby_item_todos_pane', array(
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
     "tab_pane_id" => "#gb-hobby-item-tab-pane",
     "_post_row" => $this->renderPartial('hobby.views.hobby.welcome_tab.hobby_item_tab._hobby_item_discussions_pane', array(
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
     "tab_pane_id" => "#gb-hobby-item-tab-pane",
     "_post_row" => $this->renderPartial('hobby.views.hobby.welcome_tab.hobby_item_tab._hobby_item_notes_pane', array(
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
     "tab_pane_id" => "#gb-hobby-item-tab-pane",
     "_post_row" => $this->renderPartial('hobby.views.hobby.welcome_tab.hobby_item_tab._hobby_item_questionnaires_pane', array(
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
     "tab_pane_id" => "#gb-hobby-item-tab-pane",
     "_post_row" => $this->renderPartial('hobby.views.hobby.welcome_tab.hobby_item_tab._hobby_item_weblinks_pane', array(
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
