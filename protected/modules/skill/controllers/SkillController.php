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
    $skillListModel = new SkillList;
    $skillModel = new Skill;
    $mentorshipModel = new Mentorship();
    $connectionModel = new Connection;
    $connectionMemberModel = new ConnectionMember;

    $bankSearchCriteria = ListBank::getListBankSearchCriteria(SkillType::$CATEGORY_SKILL, null, 100);
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
     'skillTypes' => SkillType::Model()->findAll(),
     'skillList' => SkillList::getSkillList(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, null, 50),
     'skillLevelList' => $skillLevelList,
     'pageModel' => new Page(),
     'advicePageModel' => new AdvicePage(),
     'pageLevelList' => $pageLevelList,
     'mentorshipLevelList' => $mentorshipLevelList,
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
     'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
      'requestModel' => new Notification()

//"skillListBankPages" => $skillListBankPages,
// "skillListBankCount" => $skillListBankCount,
    ));
  }

  public function actionSkillBank() {
    if (Yii::app()->user->isGuest) {
      $skillListModel = new SkillList;
      $skillModel = new Skill;

      $bankSearchCriteria = ListBank::getListBankSearchCriteria(SkillType::$CATEGORY_SKILL, null, 100);

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
      $skillListModel = new SkillList;
      $skillModel = new Skill;
      $connectionModel = new Connection;
      $connectionMemberModel = new ConnectionMember;

      $bankSearchCriteria = ListBank::getListBankSearchCriteria(SkillType::$CATEGORY_SKILL, null, 100);

      $this->render('skill_bank', array(
       'skillModel' => $skillModel,
       'skillListModel' => $skillListModel,
       'connectionMemberModel' => $connectionMemberModel,
       'connectionModel' => $connectionModel,
       'skillTypes' => SkillType::Model()->findAll(),
       'skillList' => SkillList::getSkillList(null, null, null, array(SkillList::$TYPE_SKILL), 12),
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
//$skillWeblinkModel = new SkillWeblink;
      $skillBankItem = ListBank::Model()->findByPk($skillId);
      $this->render('skill_bank_detail', array(
       'skillBankItem' => $skillBankItem,
      ));
    }
  }

  public function actionSkillDetail($skillListId) {
//$skillWeblinkModel = new SkillWeblink;
    $skillListItem = SkillList::Model()->findByPk($skillListId);
    $this->render('skill_detail', array(
     'skillListItem' => $skillListItem,
     'skill' => Skill::getSkill($skillListItem->skill_id),
     'skillTodos' => SkillTodo::getSkillTodos($skillListItem->skill_id)
//'skillWeblinks' => SkillWeblink::getSkillWeblinks($skillId)
    ));
  }

  public function actionSkillManagement($skillListItemId) {
    $skillWeblinkModel = new SkillWeblink;
    $discussionModel = new Discussion();
    $discussionTitleModel = new DiscussionTitle();
    $skillListItem = SkillList::Model()->findByPk($skillListItemId);
    $skillId = $skillListItem->skill_id;
    $this->render('skill_management', array(
     'skillListItem' => $skillListItem,
     'skillWeblinkModel' => $skillWeblinkModel,
     'skillTodos' => SkillTodo::getSkillTodos($skillId),
     'skillWeblinks' => SkillWeblink::getSkillWeblinks($skillId),
     'discussionModel' => $discussionModel,
     "discussionTitleModel" => $discussionTitleModel
    ));
  }

  public function actionAddSkilllist($connectionId, $source, $type) {
    if (Yii::app()->request->isAjaxRequest) {
      $skillModel = new Skill;
      $skillListModel = new SkillList;
      if (isset($_POST['Skill']) && isset($_POST['SkillList'])) {
        $skillModel->attributes = $_POST['Skill'];
        $skillListModel->attributes = $_POST['SkillList'];
        if ($skillModel->validate() && $skillListModel->validate()) {
          $skillModel->assign_date = date("Y-m-d");
          $skillModel->status = 1;
          if ($skillModel->save()) {
            $skillListModel->type_id = $type;
            $skillListModel->user_id = Yii::app()->user->id;
            $skillListModel->skill_id = $skillModel->id;
            if ($skillListModel->save()) {
              if (isset($_POST['gb-skill-share-with'])) {
                SkillListShare::shareSkillList($skillListModel->id, $_POST['gb-skill-share-with']);
                Post::addPost($skillListModel->id, Post::$TYPE_GOAL_LIST, $skillListModel->privacy, $_POST['gb-skill-share-with']);
              } else {
                SkillListShare::shareSkillList($skillListModel->id);
                Post::addPost($skillListModel->id, Post::$TYPE_GOAL_LIST, $skillListModel->privacy);
              }
              echo CJSON::encode(array(
               'success' => true,
               "skill_level_id" => $skillListModel->level_id,
               '_post_row' => $this->renderPartial('skill.views.skill._skill_list_post_row', array(
                'skillListItem' => $skillListModel,
                'source' => SkillList::$SOURCE_SKILL)
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
      $bankSearchCriteria = ListBank::getListBankSearchCriteria(SkillType::$CATEGORY_SKILL, null, 100, $nextPage);
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
     'skill' => Skill::getSkill($id),
    ));
  }

  /**
   * Creates a new model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   */
  public function actionCreate() {
    $model = new Skill;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

    if (isset($_POST['Skill'])) {
      $model->attributes = $_POST['Skill'];
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

    if (isset($_POST['Skill'])) {
      $model->attributes = $_POST['Skill'];
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
    $dataProvider = new CActiveDataProvider('Skill');
    $this->render('index', array(
     'dataProvider' => $dataProvider,
    ));
  }

  /**
   * Manages all models.
   */
  public function actionAdmin() {
    $model = new Skill('search');
    $model->unsetAttributes(); // clear any default values
    if (isset($_GET['Skill']))
      $model->attributes = $_GET['Skill'];

    $this->render('admin', array(
     'model' => $model,
    ));
  }

  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer $id the ID of the model to be loaded
   * @return Skill the loaded model
   * @throws CHttpException
   */
  public function loadModel($id) {
    $model = Skill::model()->findByPk($id);
    if ($model === null)
      throw new CHttpException(404, 'The requested page does not exist.');
    return $model;
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
