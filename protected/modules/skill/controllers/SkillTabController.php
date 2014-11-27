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

 public function actionSkillApps($skillId) {
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

 public function actionSkillTimeline($skillId) {
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

 public function actionSkillContributors($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#skill-management-contributors-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.contributors_tab._skill_contributors_pane', array(
       'skillId' => $skillId,
       'skill' => Skill::model()->findByPk($skillId),
       'skillContributorRequests' => Notification::getRequestStatus(array(Type::$SOURCE_JUDGE_REQUESTS), $skillId, null, true),
       'skillObserverRequests' => Notification::getRequestStatus(array(Type::$SOURCE_OBSERVER_REQUESTS), $skillId, null, true),
       'skillContributors' => SkillContributor::getSkillContributors($skillId),
       'skillObservers' => SkillObserver::getSkillObservers($skillId),
       'skillContributorsCount' => SkillContributor::getSkillContributorsCount($skillId),
       'skillObserversCount' => SkillObserver::getSkillObserversCount($skillId),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillOverview($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-welcome-activities-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_overview_pane', array(
       "skill" => $skill,
       "skillOverviewQuestionnaires" => question::getQuestions(Type::$SOURCE_SKILL),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillComments($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-welcome-activities-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_comment_list_pane', array(
       'skillComments' => $skill->getSkillParentComments(Comment::$COMMENTS_PER_PAGE),
       'skillCommentsCount' => $skill->getSkillParentCommentsCount(),
       'skillId' => $skillId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillTodos($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-welcome-activities-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_todo_list_pane', array(
       'skillTodoParentList' => SkillTodo::getSkillParentTodos($skillId),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillDiscussions($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-welcome-activities-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_discussion_list_pane', array(
       'skillDiscussionParentList' => SkillDiscussion::getSkillParentDiscussions($skillId),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillNotes($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-welcome-activities-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_note_list_pane', array(
       'skillNoteParentList' => SkillNote::getSkillParentNotes($skillId),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillquestions($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-welcome-activities-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_question_list_pane', array(
       'skillQuestionParentList' => Skillquestion::getSkillParentquestions($skillId),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillWeblinks($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-welcome-activities-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_weblink_list_pane', array(
       'skillWeblinkParentList' => SkillWeblink::getSkillParentWeblinks($skillId),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillContributor($skillId, $skillContributorId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-contributor-person-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.contributors_tab._skill_contributors_contributor_pane', array(
       'skillContributor' => SkillContributor::model()->findByPk($skillContributorId),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillObserver($skillId, $skillObserverId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-contributor-person-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.contributors_tab._skill_contributors_observer_pane', array(
       'skillObserver' => SkillObserver::model()->findByPk($skillObserverId),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillFiles($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-welcome-files-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_file_list_pane', array(
       'skillFileParentList' => SkillFile::getSkillParentFiles($skillId),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

}
