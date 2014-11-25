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
      'actions' => array('skillWelcome', 'skillOverview', 'skillApps', 'skillTimeline', 'skillContributors',
       'skillComments', 'skillTodos', 'skillDiscussions', 'skillQuestions', 'skillNotes',
       'skillWeblinks', 'skillContributor', 'skillObserver'),
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
        'skillListItem' => SkillList::model()->findByPk($skillListId),
        'skillContributorRequests' => Notification::getRequestStatus(array(Type::$SOURCE_JUDGE_REQUESTS), $skillListId, null, true),
        'skillObserverRequests' => Notification::getRequestStatus(array(Type::$SOURCE_OBSERVER_REQUESTS), $skillListId, null, true),
        'skillContributors' => SkillListContributor::getSkillListContributors($skillListId),
        'skillObservers' => SkillListObserver::getSkillListObservers($skillListId),
        'skillContributorsCount' => SkillListContributor::getSkillListContributorsCount($skillListId),
        'skillObserversCount' => SkillListObserver::getSkillListObserversCount($skillListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionSkillOverview($skillListId) {
    if (Yii::app()->request->isAjaxRequest) {
      $skillListItem = SkillList::model()->findByPk($skillListId);
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-skill-welcome-activities-pane",
       "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_overview_pane', array(
        "skillListItem" => $skillListItem,
        "skillOverviewQuestionnaires" => question::getQuestions(Type::$SOURCE_SKILL),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionSkillComments($skillListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-skill-welcome-activities-pane",
       "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_comment_list_pane', array(
        'skillCommentParentList' => SkillComment::getSkillParentComments($skillListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionSkillTodos($skillListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-skill-welcome-activities-pane",
       "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_todo_list_pane', array(
        'skillTodoParentList' => SkillTodo::getSkillParentTodos($skillListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionSkillDiscussions($skillListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-skill-welcome-activities-pane",
       "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_discussion_list_pane', array(
        'skillDiscussionParentList' => SkillDiscussion::getSkillParentDiscussions($skillListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionSkillNotes($skillListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-skill-welcome-activities-pane",
       "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_note_list_pane', array(
        'skillNoteParentList' => SkillNote::getSkillParentNotes($skillListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionSkillquestions($skillListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-skill-welcome-activities-pane",
       "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_question_list_pane', array(
        'skillQuestionParentList' => Skillquestion::getSkillParentquestions($skillListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionSkillWeblinks($skillListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-skill-welcome-activities-pane",
       "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_weblink_list_pane', array(
        'skillWeblinkParentList' => SkillWeblink::getSkillParentWeblinks($skillListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionSkillContributor($skillListId, $skillContributorId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-contributor-person-pane",
       "_post_row" => $this->renderPartial('skill.views.skill.contributors_tab._skill_contributors_contributor_pane', array(
        'skillContributor' => SkillListContributor::model()->findByPk($skillContributorId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionSkillObserver($skillListId, $skillObserverId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-contributor-person-pane",
       "_post_row" => $this->renderPartial('skill.views.skill.contributors_tab._skill_contributors_observer_pane', array(
        'skillObserver' => SkillListObserver::model()->findByPk($skillObserverId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionSkillFiles($skillListId) {
    if (Yii::app()->request->isAjaxRequest) {
      echo CJSON::encode(array(
       "tab_pane_id" => "#gb-skill-welcome-files-pane",
       "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_file_list_pane', array(
        'skillFileParentList' => SkillFile::getSkillParentFiles($skillListId),
         )
         , true)
      ));
      Yii::app()->end();
    }
  }

}
