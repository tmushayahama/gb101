<?php

class SkillController extends Controller {
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
      'actions' => array('index', 'skillbank', 'skillbankdetail', 'appendMoreSkill'),
      'users' => array('*'),
     ),
     array('allow', // allow authenticated user to perform 'create' and 'update' actions
      'actions' => array('skillhome', 'skillbank', 'addskilllist', 'editskilllist', 'addskillbank',
       'skilldetail', 'skillmanagement'),
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

  public function actionSkillHome() {
    $skillListModel = new GoalList;
    $skillModel = new Goal;
    $mentorshipModel = new Mentorship();
    $connectionModel = new Connection;
    $connectionMemberModel = new ConnectionMember;

    $bankSearchCriteria = ListBank::getListBankSearchCriteria(GoalType::$CATEGORY_SKILL, null, 100);
    $skillLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "level_name");
    $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "level_name");

    $pageLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE_PAGE), "id", "level_name");

    $this->render('skill_home', array(
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
     'pageLevelList' => $pageLevelList,
     'mentorshipLevelList' => $mentorshipLevelList,
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
     'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
      //"skillListBankPages" => $skillListBankPages,
// "skillListBankCount" => $skillListBankCount,
    ));
  }

  public function actionSkillBank() {
    if (Yii::app()->user->isGuest) {
      $skillListModel = new GoalList;
      $skillModel = new Goal;

      $bankSearchCriteria = ListBank::getListBankSearchCriteria(GoalType::$CATEGORY_SKILL, null, 100);

      $count = ListBank::model()->count($bankSearchCriteria);
      $pages = new CPagination($count);
// results per page    
      $pages->pageSize = 100;
      $pages->applyLimit($bankSearchCriteria);
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('skill_bank_guest', array(
       'skillModel' => $skillModel,
       'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
       'pages' => $pages, 'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
      $skillListModel = new GoalList;
      $skillModel = new Goal;
      $connectionModel = new Connection;
      $connectionMemberModel = new ConnectionMember;

      $bankSearchCriteria = ListBank::getListBankSearchCriteria(GoalType::$CATEGORY_SKILL, null, 100);

      $this->render('skill_bank', array(
       'skillModel' => $skillModel,
       'skillListModel' => $skillListModel,
       'connectionMemberModel' => $connectionMemberModel,
       'connectionModel' => $connectionModel,
       'skillTypes' => GoalType::Model()->findAll(),
       'skillList' => GoalList::getGoalList(null, null, null, array(GoalList::$TYPE_SKILL), 12),
       'skill_levels' => Level::getLevels(Level::$LEVEL_CATEGORY_SKILL),
       'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
      ));
    }
  }

  public function actionSkillBankDetail($skillId) {
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      $skillBankItem = ListBank::Model()->findByPk($skillId);
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('skill_bank_detail_guest', array(
       'skillBankItem' => $skillBankItem,
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
//$skillWebLinkModel = new GoalWebLink;
      $skillBankItem = ListBank::Model()->findByPk($skillId);
      $this->render('skill_bank_detail', array(
       'skillBankItem' => $skillBankItem,
      ));
    }
  }

  public function actionSkillDetail($skillListId) {
//$skillWebLinkModel = new GoalWebLink;
    $skillListItem = GoalList::Model()->findByPk($skillListId);
    $this->render('skill_detail', array(
     'skillListItem' => $skillListItem,
     'skill' => Goal::getGoal($skillListItem->goal_id),
     'skillTodos' => GoalTodo::getGoalTodos($skillListItem->goal_id)
//'skillWebLinks' => GoalWebLink::getGoalWebLinks($skillId)
    ));
  }

  public function actionSkillManagement($skillListItemId) {
    $skillWebLinkModel = new GoalWebLink;
    $discussionModel = new Discussion();
    $discussionTitleModel = new DiscussionTitle();
    $skillListItem = GoalList::Model()->findByPk($skillListItemId);
    $skillId = $skillListItem->goal_id;
    $this->render('skill_management', array(
     'skillListItem' => $skillListItem,
     'skillWebLinkModel' => $skillWebLinkModel,
     'skillTodos' => GoalTodo::getGoalTodos($skillId),
     'skillWebLinks' => GoalWebLink::getGoalWebLinks($skillId),
     'discussionModel' => $discussionModel,
     "discussionTitleModel" => $discussionTitleModel
    ));
  }

  public function actionAddSkilllist($connectionId, $source, $type) {
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
        } else {
          echo CActiveForm::validate(array($skillModel, $skillListModel));
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAppendMoreSkill() {
    if (Yii::app()->request->isAjaxRequest) {
      $nextPage = Yii::app()->request->getParam('next_page') * 100;
      $type = Yii::app()->request->getParam('type');
      $bankSearchCriteria = ListBank::getListBankSearchCriteria(GoalType::$CATEGORY_SKILL, null, 100, $nextPage);
      switch ($type) {
        case 1:
          echo CJSON::encode(array(
           '_skill_bank_list' => $this->renderPartial('skill.views.skill._skill_bank_list', array(
            'skillListBank' => ListBank::model()->findAll($bankSearchCriteria))
             , true
          )));
          break;
        case 2:
          echo CJSON::encode(array(
           '_skill_bank_list' => $this->renderPartial('skill.views.skill._skill_bank_list_1', array(
            'skillListBank' => ListBank::model()->findAll($bankSearchCriteria))
             , true
          )));
          break;
      }
      Yii::app()->end();
    }
  }

  /**
   * Displays a particular model.
   * @param integer $id the ID of the model to be displayed
   */
  public function actionView($id) {
    $this->render('view', array(
     'skill' => Goal::getGoal($id),
    ));
  }

  /**
   * Creates a new model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   */
  public function actionCreate() {
    $model = new Goal;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

    if (isset($_POST['Goal'])) {
      $model->attributes = $_POST['Goal'];
      if ($model->save())
        $this->redirect(array('view', 'id' => $model->id));
    }

    $this->render('create', array(
     'model' => $model,
    ));
  }

  /**
   * Updates a particular model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id the ID of the model to be updated
   */
  public function actionUpdate($id) {
    $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

    if (isset($_POST['Goal'])) {
      $model->attributes = $_POST['Goal'];
      if ($model->save())
        $this->redirect(array('view', 'id' => $model->id));
    }

    $this->render('update', array(
     'model' => $model,
    ));
  }

  /**
   * Deletes a particular model.
   * If deletion is successful, the browser will be redirected to the 'admin' page.
   * @param integer $id the ID of the model to be deleted
   */
  public function actionDelete($id) {
    $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
    if (!isset($_GET['ajax']))
      $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
  }

  /**
   * Lists all models.
   */
  public function actionIndex() {
    $dataProvider = new CActiveDataProvider('Goal');
    $this->render('index', array(
     'dataProvider' => $dataProvider,
    ));
  }

  /**
   * Manages all models.
   */
  public function actionAdmin() {
    $model = new Goal('search');
    $model->unsetAttributes(); // clear any default values
    if (isset($_GET['Goal']))
      $model->attributes = $_GET['Goal'];

    $this->render('admin', array(
     'model' => $model,
    ));
  }

  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer $id the ID of the model to be loaded
   * @return Goal the loaded model
   * @throws CHttpException
   */
  public function loadModel($id) {
    $model = Goal::model()->findByPk($id);
    if ($model === null)
      throw new CHttpException(404, 'The requested page does not exist.');
    return $model;
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
