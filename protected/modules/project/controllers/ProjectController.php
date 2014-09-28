<?php

class ProjectController extends Controller {
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
      'actions' => array('index'),
      'users' => array('*'),
     ),
     array('allow', // allow authenticated user to perform 'create' and 'update' actions
      'actions' => array('projecthome', 'addProject', 'ProjectManagement'),
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

  public function actionProjectHome() {
    $skillListModel = new GoalList;
    $skillModel = new Goal;
    $mentorshipModel = new Mentorship();
    $connectionModel = new Connection;
    $connectionMemberModel = new ConnectionMember;

    $bankSearchCriteria = ListBank::getListBankSearchCriteria(GoalType::$CATEGORY_SKILL, null, 100);
    $skillLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "level_name");
    $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "level_name");

    $pageLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE_PAGE), "id", "level_name");

    $this->render('project_home', array(
     'projects' => Project::getProjects(),
     'people' => Profile::getPeople(true),
     'skillModel' => $skillModel,
     'skillListModel' => $skillListModel,
     'mentorshipModel' => $mentorshipModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'skillTypes' => GoalType::Model()->findAll(),
     'skillList' => GoalList::getGoalList(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, null, 50),
     'skillLevelList' => $skillLevelList,
     'pageModel' => new Page(),
     'advicePageModel' => new AdvicePage(),
     'projectModel' => new Project(),
     'pageLevelList' => $pageLevelList,
     'mentorshipLevelList' => $mentorshipLevelList,
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
     'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
      //"skillListBankPages" => $skillListBankPages,
// "skillListBankCount" => $skillListBankCount,
    ));
  }

  public function actionProjectManagement($projectId) {
    $project = Project::model()->findByPk($projectId);
    $skillListModel = new GoalList;
    $skillModel = new Goal;
    $mentorshipModel = new Mentorship();

    $bankSearchCriteria = ListBank::getListBankSearchCriteria(GoalType::$CATEGORY_SKILL, null, 100);
    $skillLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "level_name");
    $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "level_name");

    $pageLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE_PAGE), "id", "level_name");


    $this->render('management/project_management_owner', array(
     "project" => $project,
     'postShares' => PostShare::getPostShare(),
     'skillModel' => $skillModel,
     'skillList' => GoalList::getGoalList(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, null, 50),
     'skillListModel' => $skillListModel,
     'mentorshipModel' => $mentorshipModel,
     'mentorships' => Mentorship::getMentorships(null, null),
     'pageModel' => new Page(),
     'advicePageModel' => new AdvicePage(),
     'advicePages' => AdvicePage::getAdvicePages(),
     'pageLevelList' => $pageLevelList,
     'projectModel' => new Project(),
     'connections' => Connection::getAllConnections(),
     'skillTypes' => GoalType::Model()->findAll(),
     'projectMemberRequests' => Notification::getRequestStatus(array(Type::$SOURCE_PROJECT_MEMBER_REQUESTS), $project->id, null, true),
     'projectMembersEnrolled' => ProjectMember::getProjectMembers($project->id),
     'people' => Profile::getPeople(true),
     'skillLevelList' => $skillLevelList,
     'mentorshipLevelList' => $mentorshipLevelList,
     'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
     'requestModel' => new Notification(),
     'tags' => Tag::getAllTags()
    ));
  }

  public function actionAddProject() {
    if (Yii::app()->request->isAjaxRequest) {
      $projectModel = new Project();
      if (isset($_POST['Project'])) {
        $projectModel->attributes = $_POST['Project'];
        $projectModel->creator_id = Yii::app()->user->id;
        if ($projectModel->validate()) {
          if ($projectModel->save(false)) {
            echo CJSON::encode(array(
             "success" => true,
             "redirect_url" => Yii::app()->createUrl("project/project/projectManagement", array("projectId" => $projectModel->id)))
            );
          }
        } else {
          echo CActiveForm::validate($projectModel);
          Yii::app()->end();
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAddProjectSkillList($projectId) {
    if (Yii::app()->request->isAjaxRequest) {
      $skillModel = new Goal;
      $skillListModel = new GoalList;
      if (isset($_POST['Goal']) && isset($_POST['GoalList'])) {
        $skillModel->attributes = $_POST['Goal'];
        $skillListModel->attributes = $_POST['GoalList'];
        if ($skillModel->validate() && $skillListModel->validate()) {
          $skillModel->assign_date = date("Y-m-d");
          $skillModel->status = 1;
          if ($skillModel->save()) {
            $skillListModel->type_id = $type;
            $skillListModel->user_id = Yii::app()->user->id;
            $skillListModel->goal_id = $skillModel->id;
            if ($skillListModel->save()) {
              if (ProjectSkill::saveProjectSkill($projectId, $skillListModel->id)) {
                if (isset($_POST['gb-skill-share-with'])) {
                  GoalListShare::shareGoalList($skillListModel->id, $_POST['gb-skill-share-with']);
                  Post::addPost($skillListModel->id, Post::$TYPE_GOAL_LIST, $skillListModel->privacy, $_POST['gb-skill-share-with']);
                } else {
                  GoalListShare::shareGoalList($skillListModel->id);
                  Post::addPost($skillListModel->id, Post::$TYPE_GOAL_LIST, $skillListModel->privacy);
                }
                echo CJSON::encode(array(
                 'success' => true,
                 "skill_level_id" => $skillListModel->level_id,
                 '_post_row' => $this->renderPartial('skill.views.skill._skill_list_post_row', array(
                  'skillListItem' => $skillListModel,
                  'source' => GoalList::$SOURCE_SKILL)
                   , true),
                 "_skill_preview_list_row" => $this->renderPartial('skill.views.skill._skill_preview_list_row', array(
                  "skillListItem" => $skillListModel)
                   , true)));
              }
            }
          }
        } else {
          echo CActiveForm::validate(array($skillModel, $skillListModel));
        }
      }
      Yii::app()->end();
    }
  }

  /**
   * Performs the AJAX validation.
   * @param Goal $model the model to be validated
   */
  protected function performAjaxValidation($model) {
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'skill-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }

}
