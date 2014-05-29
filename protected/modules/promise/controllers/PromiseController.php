<?php

class PromiseController extends Controller {
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
      'actions' => array('index', 'view'),
      'users' => array('*'),
     ),
     array('allow', // allow authenticated user to perform 'create' and 'update' actions
      'actions' => array('promisehome', 'update', 'addpromiselist', 'addpromisebank', 'promisedetail', 'promisemanagement'),
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

  public function actionPromiseHome() {
    $promiseListModel = new GoalList;
    $promiseListShare = new GoalListShare;
    $promiseCommitmentShare = new GoalCommitmentShare;
    $promiseListMentor = new GoalListMentor;
    $promiseMonitorModel = new GoalMonitor;
    $promiseMentorshipModel = new GoalMentorship();
    $promiseModel = new Goal;
    $connectionModel = new Connection;
    $connectionMemberModel = new ConnectionMember;
    $academicModel = new SkillAcademic;


    $this->render('promise_home', array(
     'promiseModel' => $promiseModel,
     'promiseListModel' => $promiseListModel,
     'academicModel' => $academicModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'promiseTypes' => GoalType::Model()->findAll(),
     'promiseList' => GoalList::getGoalList(0, GoalList::$TYPE_SKILL, 12),
     'promise_levels' => Level::getLevels("promise"),
     'promiseList' => GoalList::getGoalList(0, GoalList::$TYPE_GOAL, 12),
     'promiseList' => GoalList::getGoalList(0, GoalList::$TYPE_PROMISE, 12),
     'promiseListShare' => $promiseListShare,
     'promiseCommitmentShare' => $promiseCommitmentShare,
     'promiseListMentor' => $promiseListMentor,
     'promiseMonitorModel' => $promiseMonitorModel,
     'promiseMentorshipModel' => $promiseMentorshipModel,
     'promiseCommitments' => GoalCommitment::getGoalCommitment(),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
     'todos' => GoalAssignment::getTodos(),
     'promise_list_bank' => ListBank::model()->findAll()
    ));
  }

  public function actionPromiseBank() {
    $promiseListModel = new GoalList;
    $promiseListShare = new GoalListShare;
    $promiseCommitmentShare = new GoalCommitmentShare;
    $promiseListMentor = new GoalListMentor;
    $promiseMonitorModel = new GoalMonitor;
    $promiseMentorshipModel = new GoalMentorship();
    $promiseModel = new Goal;
    $connectionModel = new Connection;
    $connectionMemberModel = new ConnectionMember;
    $academicModel = new SkillAcademic;


    $this->render('promise_list_bank', array(
     'promiseModel' => $promiseModel,
     'promiseListModel' => $promiseListModel,
     'academicModel' => $academicModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'promiseTypes' => GoalType::Model()->findAll(),
     'promiseList' => GoalList::getGoalList(0, GoalList::$TYPE_SKILL, 12),
     'promise_levels' => Level::getLevels("promise"),
     'promise_list_bank' => ListBank::model()->findAll()
    ));
  }

  public function actionPromiseDetail($promiseListId) {
    //$promiseCommitmentWebLinkModel = new GoalWebLink;
    $promiseListItem = GoalList::Model()->findByPk($promiseListId);
    $this->render('promise_detail', array(
     'promiseListItem' => $promiseListItem,
     'promise' => Goal::getGoal($promiseListItem->goal_id),
     'promiseTodos' => GoalTodo::getGoalTodos($promiseListItem->goal_id)
     //'promiseWebLinks' => GoalWebLink::getGoalWebLinks($promiseId)
    ));
  }

  public function actionPromiseManagement($promiseCommitmentId) {
    $promiseCommitmentWebLinkModel = new GoalWebLink;
    $promiseCommitment = GoalCommitment::Model()->findByPk($promiseCommitmentId);
    $promiseId = $promiseCommitment->goal_id;
    $this->render('promise_management', array(
     'promiseCommitment' => $promiseCommitment,
     'promiseCommitmentWebLinkModel' => $promiseCommitmentWebLinkModel,
     'monitors' => GoalMonitor::getMonitors($promiseCommitmentId),
     'mentorships' => GoalMentorship::getMentorships($promiseCommitmentId),
     'promiseTodos' => GoalTodo::getGoalTodos($promiseId),
     'promiseWebLinks' => GoalWebLink::getGoalWebLinks($promiseCommitmentId)
    ));
  }

  /**
   * Displays a particular model.
   * @param integer $id the ID of the model to be displayed
   */
  public function actionView($id) {
    $this->render('view', array(
     'promise' => Goal::getGoal($id),
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
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'promise-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }

}
