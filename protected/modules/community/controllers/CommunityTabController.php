<?php

class CommunityTabController extends Controller {
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
      'actions' => array('communitys', 'communitysWelcome', 'communityAppOverview', 'communityApps', 'communityTimeline', 'communityContributors',
        'communityComments', 'communityTodos', 'communityDiscussions', 'communityQuestionnaire', 'communityQuestions', 'communityNotes',
        'communityWeblinks', 'communityObserver'),
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

 public function actionCommunityOverview() {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-main-tab-pane",
     "_post_row" => $this->render('community.views.community.community_tab._community_overview_pane', array(
       'people' => Profile::getPeople(true),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionProfile($userId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-profile-item-pane",
     "_post_row" => $this->renderPartial('user.views.profile.owner._profile_owner_pane', array(
       "profile" => Profile::model()->findByPk($userId),
       ), true)
   ));
   Yii::app()->end();
  }
 }

}
