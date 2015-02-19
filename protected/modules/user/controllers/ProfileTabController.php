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
      'actions' => array('profileOverview'),
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

 public function actionProfileOverview($userId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-main-tab-pane",
     "_post_row" => $this->renderPartial('user.views.profile.about_tab._profile_overview_pane', array(
       "profile" => Profile::model()->findByPk($userId),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionProfileDiscoverMe($userId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-main-tab-pane",
     "_post_row" => $this->renderPartial('user.views.profile.about_tab._profile_discover_me_pane', array(
       "profile" => Profile::model()->findByPk($userId),
       "userQuestionnaires" => UserQuestionnaire::getUserQuestionnaires($userId, UserQuestionnaire::$USER_QUESTIONNAIRES_PER_PAGE, 0),
       "userQuestionnairesCount" => UserQuestionnaire::getUserQuestionnairesCount($userId, 0),
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
