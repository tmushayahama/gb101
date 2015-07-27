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
    $skillModel = new Skill;
    $skillModel = new Skill;
    $mentorshipModel = new Mentorship();
    $connectionModel = new Connection;
    $connectionMemberModel = new ConnectionMember;

    $bankSearchCriteria = Bank::getBankSearchCriteria(SkillType::$CATEGORY_SKILL, null, 100);
    $skillLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name");
    $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name");

    $pageLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE), "id", "name");

    $this->render('project_home', array(
     'projects' => Project::getProjects(),
     'people' => Profile::getPeople(true),
     'skillModel' => $skillModel,
     'skillModel' => $skillModel,
     'mentorshipModel' => $mentorshipModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'skillTypes' => SkillType::Model()->findAll(),
     'skill' => Skill::getSkill(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, null, 50),
     'skillLevelList' => $skillLevelList,
     'pageModel' => new Page(),
     'advicePageModel' => new AdvicePage(),
     'projectModel' => new Project(),
     'pageLevelList' => $pageLevelList,
     'mentorshipLevelList' => $mentorshipLevelList,
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
     'skillBank' => Bank::model()->findAll($bankSearchCriteria),
      //"skillBankPages" => $skillBankPages,
// "skillBankCount" => $skillBankCount,
    ));
  }

  public function actionProjectManagement($projectId) {
    $project = Project::model()->findByPk($projectId);
    $skillModel = new Skill;
    $skillModel = new Skill;
    $mentorshipModel = new Mentorship();

    $bankSearchCriteria = Bank::getBankSearchCriteria(SkillType::$CATEGORY_SKILL, null, 100);
    $skillLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name");
    $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name");

    $pageLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE), "id", "name");


    $this->render('management/project_management_creator', array(
     "project" => $project,
     'postShares' => PostShare::getPostShare(),
     'skillModel' => $skillModel,
     'skill' => Skill::getSkill(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, null, 50),
     'skillModel' => $skillModel,
     'mentorshipModel' => $mentorshipModel,
     'mentorships' => Mentorship::getMentorships(null, null),
     'pageModel' => new Page(),
     'advicePageModel' => new AdvicePage(),
     'advicePages' => AdvicePage::getAdvicePages(),
     'pageLevelList' => $pageLevelList,
     'projectModel' => new Project(),
     'connections' => Connection::getAllConnections(),
     'skillTypes' => SkillType::Model()->findAll(),
     'projectMemberRequests' => Notification::getRequestStatus(array(Type::$SOURCE_PROJECT_MEMBER_REQUESTS), $project->id, null, true),
     'projectMembersEnrolled' => ProjectMember::getProjectMembers($project->id),
     'people' => Profile::getPeople(true),
     'skillLevelList' => $skillLevelList,
     'mentorshipLevelList' => $mentorshipLevelList,
     'skillBank' => Bank::model()->findAll($bankSearchCriteria),
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

  public function actionAddProjectSkill($projectId) {
    if (Yii::app()->request->isAjaxRequest) {
      $skillModel = new Skill;
      $skillModel = new Skill;
      if (isset($_POST['Skill']) && isset($_POST['Skill'])) {
        $skillModel->attributes = $_POST['Skill'];
        $skillModel->attributes = $_POST['Skill'];
        if ($skillModel->validate() && $skillModel->validate()) {
          $skillModel->assign_date = date("Y-m-d");
          $skillModel->status = 1;
          if ($skillModel->save()) {
            $skillModel->type_id = $type;
             $skillModel->creator_id = Yii::app()->user->id;
            $skillModel->skill_id = $skillModel->id;
            if ($skillModel->save()) {
              if (ProjectSkill::saveProjectSkill($projectId, $skillModel->id)) {
                if (isset($_POST['gb-skill-share-with'])) {
                  SkillShare::shareSkill($skillModel->id, $_POST['gb-skill-share-with']);
                  Post::addPost($skillModel->id, Post::$TYPE_GOAL_LIST, $skillModel->privacy, $_POST['gb-skill-share-with']);
                } else {
                  SkillShare::shareSkill($skillModel->id);
                  Post::addPost($skillModel->id, Post::$TYPE_GOAL_LIST, $skillModel->privacy);
                }
                echo CJSON::encode(array(
                 'success' => true,
                 "skill_level_id" => $skillModel->level_id,
                 '_post_row' => $this->renderPartial('skill.views.skill._skill_post_row', array(
                  'skill' => $skillModel,
                  'source' => Skill::$SOURCE_SKILL)
                   , true),
                 "_skill_preview_list_row" => $this->renderPartial('skill.views.skill._skill_preview_list_row', array(
                  "skill" => $skillModel)
                   , true)));
              }
            }
          }
        } else {
          echo CActiveForm::validate(array($skillModel, $skillModel));
        }
      }
      Yii::app()->end();
    }
  }

  /**
   * Performs the AJAX validation.
   * @param Skill $model the model to be validated
   */
  protected function performAjaxValidation($model) {
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'skill-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }

}
