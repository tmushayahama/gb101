<?php

class ProfileTabController extends Controller {
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
      'actions' => array('profileOwnerOverview', 'ProfileOwnerOverview'),
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

 public function actionProfileOwner($userId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-main-tab-pane",
     "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_1.css',
     "_post_row" => $this->renderPartial('user.views.profile.owner._profile_owner_pane', array(
       "profile" => Profile::model()->findByPk($userId),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionProfileOwnerOverview($userId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-profile-tab-pane",
     "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_1.css',
     "_post_row" => $this->renderPartial('user.views.profile.owner.about_tab._owner_overview_pane', array(
       "profile" => Profile::model()->findByPk($userId),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionProfileOwnerDiscoverMe($userId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-profile-tab-pane",
     "_post_row" => $this->renderPartial('user.views.profile.owner.about_tab._owner_discover_me_pane', array(
       "profile" => Profile::model()->findByPk($userId),
       "userQuestionModel" => new UserQuestionAnswer(),
       "userQuestionAnswers" => UserQuestionAnswer::getUserQuestionAnswers($userId, UserQuestionAnswer::$USER_QUESTION_ANSWERS_PER_PAGE, 0),
       "userQuestionAnswersCount" => UserQuestionAnswer::getUserQuestionAnswersCount($userId, 0),
       "nextQuestion" => UserQuestionAnswer::getRandomUserQuestion($userId),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionProfileFriendOverview($userId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-profile-tab-pane",
     "_post_row" => $this->renderPartial('user.views.profile.friend.about_tab._friend_overview_pane', array(
       "profile" => Profile::model()->findByPk($userId),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionProfileFriendDiscoverMe($userId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-profile-tab-pane",
     "_post_row" => $this->renderPartial('user.views.profile.friend.about_tab._friend_discover_me_pane', array(
       "profile" => Profile::model()->findByPk($userId),
       "userQuestionModel" => new UserQuestionAnswer(),
       "userQuestionAnswers" => UserQuestionAnswer::getUserQuestionAnswers($userId, UserQuestionAnswer::$USER_QUESTION_ANSWERS_PER_PAGE, 0),
       "userQuestionAnswersCount" => UserQuestionAnswer::getUserQuestionAnswersCount($userId, 0),
       "nextQuestion" => UserQuestionAnswer::getRandomUserQuestion($userId),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillComments($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-item-tab-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab.skill_item_tab._skill_item_comments_pane', array(
       "commentModel" => new Comment(),
       'skillComments' => $skill->getSkillParentComments(Comment::$COMMENTS_PER_PAGE),
       'skillCommentsCount' => $skill->getSkillParentCommentsCount(),
       'skillId' => $skillId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

}
