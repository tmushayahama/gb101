<?php

class SkillTabController extends Controller {
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
      'actions' => array('skillWelcome', 'skillApps', 'skillTimeline', 'skillContributors',
       'skillTodos', 'skillDiscussion'),
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

  public function actionSkillTodos($skillListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-skill-welcome-todos-pane",
       "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_todo_list_pane', array(
        'skillTodoParentList' => SkillTodo::getSkillParentTodos($skillListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionSkillApps($skillListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#skill-management-apps-pane",
       "_post_row" => $this->renderPartial('skill.views.skill.apps_tab._skill_apps_pane', array(
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionSkillTimeline($skillListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#skill-management-timeline-pane",
       "_post_row" => $this->renderPartial('skill.views.skill.timeline_tab._skill_timeline_pane', array(
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionSkillContributors($skillListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#skill-management-contributors-pane",
       "_post_row" => $this->renderPartial('skill.views.skill.contributors_tab._skill_contributors_pane', array(
        'skillListId' => $skillListId,
        'skillJudgeRequests' => Notification::getRequestStatus(array(Type::$SOURCE_JUDGE_REQUESTS), $skillListId, null, true),
        'skillJudges' => SkillListJudge::getSkillListJudges($skillListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionSkillDiscussion($skillListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-skill-welcome-todos-pane",
       "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_todo_list_pane', array(
        'skillTodoParentList' => SkillTodo::getSkillParentTodos($skillListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

}
