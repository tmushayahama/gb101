<?php

class GoalController extends Controller {
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
      'actions' => array('goalhome', 'update', 'addgoallist', 'addgoalbank', 'goaldetail', 'goalmanagement'
       , 'recordgoalcommitment'),
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

  public function actionGoalHome() {
    $goalListModel = new GoalList;
    $goalListShare = new GoalListShare;
    $goalCommitmentShare = new GoalCommitmentShare;
    $goalListMentor = new GoalListMentor;
    $goalMonitorModel = new GoalMonitor;
    $goalMentorshipModel = new GoalMentorship();
    $goalModel = new Goal;
    $connectionModel = new Connection;
    $connectionMemberModel = new ConnectionMember;
    $academicModel = new SkillAcademic;


    $this->render('goal_home', array(
     'goalModel' => $goalModel,
     'goalListModel' => $goalListModel,
     'academicModel' => $academicModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'goalTypes' => GoalType::Model()->findAll(),
     'goalList' => GoalList::getGoalList(GoalType::$CATEGORY_GOAL, 0, GoalList::$TYPE_GOAL, 12),
     'goal_levels' => GoalLevel::getGoalLevels(GoalType::$CATEGORY_GOAL),
     'goalListShare' => $goalListShare,
     'goalCommitmentShare' => $goalCommitmentShare,
     'goalListMentor' => $goalListMentor,
     'goalMonitorModel' => $goalMonitorModel,
     'goalMentorshipModel' => $goalMentorshipModel,
     'goalCommitments' => GoalCommitment::getGoalCommitment(GoalType::$CATEGORY_GOAL),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
     'todos' => GoalAssignment::getTodos(),
     'goal_list_bank' => ListBank::model()->findAll()
    ));
  }

  public function actionGoalBank() {
    $goalListModel = new GoalList;
    $goalListShare = new GoalListShare;
    $goalCommitmentShare = new GoalCommitmentShare;
    $goalListMentor = new GoalListMentor;
    $goalMonitorModel = new GoalMonitor;
    $goalMentorshipModel = new GoalMentorship();
    $goalModel = new Goal;
    $connectionModel = new Connection;
    $connectionMemberModel = new ConnectionMember;
    $academicModel = new SkillAcademic;


    $this->render('goal_list_bank', array(
     'goalModel' => $goalModel,
     'goalListModel' => $goalListModel,
     'academicModel' => $academicModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'goalTypes' => GoalType::Model()->findAll(),
     'goalList' => GoalList::getGoalList(0, GoalList::$TYPE_GOAL, 12),
     'goal_levels' => GoalLevel::getGoalLevels("goal"),
     'goal_list_bank' => ListBank::model()->findAll()
    ));
  }

  public function actionGoalDetail($goalListId) {
    //$goalCommitmentWebLinkModel = new GoalCommitmentWebLink;
    $goalListItem = GoalList::Model()->findByPk($goalListId);
    $this->render('goal_detail', array(
     'goalListItem' => $goalListItem,
     'goal' => Goal::getGoal($goalListItem->goal_id),
     'goalTodos' => GoalTodo::getGoalTodos($goalListItem->goal_id)
      //'goalWebLinks' => GoalCommitmentWebLink::getGoalCommitmentWebLinks($goalId)
    ));
  }

  public function actionGoalManagement($goalCommitmentId) {
    $goalCommitmentWebLinkModel = new GoalCommitmentWebLink;
    $goalCommitment = GoalCommitment::Model()->findByPk($goalCommitmentId);
    $goalId = $goalCommitment->goal_id;
    $this->render('goal_management', array(
     'goalCommitment' => $goalCommitment,
     'goalCommitmentWebLinkModel' => $goalCommitmentWebLinkModel,
     'monitors' => GoalMonitor::getMonitors($goalCommitmentId),
     'mentorships' => GoalMentorship::getMentorships($goalCommitmentId),
     'goalTodos' => GoalTodo::getGoalTodos($goalId),
     'goalWebLinks' => GoalCommitmentWebLink::getGoalCommitmentWebLinks($goalCommitmentId)
    ));
  }

  public function actionAddGoallist($connectionId, $source, $type) {
    if (Yii::app()->request->isAjaxRequest) {
      $goalModel = new Goal;
      $goalListModel = new GoalList;
      $goalListMentor = new GoalListMentor;
//$connectionId= Yii::app()->request->getParam('connection_id');
      if (isset($_POST['GoalList'])) {
        $goalModel->title = $_POST['GoalList']['title'];
        $goalModel->description = $_POST['GoalList']['description'];
        $goalModel->assign_date = date("Y-m-d");
        $goalModel->status = 1;
        if ($goalModel->save(false)) {
          $goalListModel->type_id = $type;
          $goalListModel->user_id = Yii::app()->user->id;
          $goalListModel->goal_id = $goalModel->id;
          $goalListModel->goal_level_id = $_POST['GoalList']['goal_level_id'];
//$goalListModel->connection_id = $connectionId;
          $goalListModel->save(false);

          if (isset($_POST['GoalListShare']['connectionIdList'])) {
            if (is_array($_POST['GoalListShare']['connectionIdList'])) {
              foreach ($_POST['GoalListShare']['connectionIdList'] as $connectionId) {
                $goalListShare = new GoalListShare;
                $goalListShare->connection_id = $connectionId;
                $goalListShare->goal_list_id = $goalListModel->id;
                $goalListShare->save(false);
              }
            }
          }
          if (isset($_POST['GoalListMentor']['userIdList'])) {
            if (is_array($_POST['GoalListMentor']['userIdList'])) {
              foreach ($_POST['GoalListMentor']['userIdList'] as $mentorId) {
                $goalListMentor = new GoalListMentor;
                $goalListMentor->mentor_id = $mentorId;
                $goalListMentor->goal_list_id = $goalListModel->id;
                $goalListMentor->save(false);
              }
            }
          }
          if ($source == 'connections') {
            echo CJSON::encode(array(
             'new_goal_list_row' => $this->renderPartial('_goal_list_row', array(
              'description' => $goalModel->description,
              'goal_level' => $goalListModel->goalLevel->level_name,
              "status" => $goalModel->status)
               , true)));
          } else if ($source == "goal") {
            echo CJSON::encode(array(
             "goal_level_id" => $goalListModel->goalLevel->id,
             "new_goal_list_row" => $this->renderPartial('goal.views.goal._goal_list_row', array(
              "goalListItem" => $goalListModel,
              "count" => 1)
               , true)));
          }
        }
      }
      Yii::app()->end();
    }
  }

  public function actionRecordGoalCommitment($connectionId, $source) {
    if (Yii::app()->request->isAjaxRequest) {
      $goalModel = new Goal;
//$connectionId= Yii::app()->request->getParam('connection_id');
      if (isset($_POST['Goal'])) {
        $goalModel->attributes = $_POST['Goal'];
        $goalModel->assign_date = date("Y-m-d");
        $goalModel->type_id = 1;
        $goalModel->save(false);
        $goalCommitmentModel = new GoalCommitment;

        if ($connectionId < 0) {
          $goalCommitmentModel->owner_id = Yii::app()->user->id;
          $goalCommitmentModel->goal_id = $goalModel->id;
          if ($goalCommitmentModel->save(false)) {
            GoalTodo::initializeGoalWithTodos($goalModel->id);
          }
        } else {
          $goalCommitmentModel->owner_id = Yii::app()->user->id;
          $goalCommitmentModel->goal_id = $goalModel->id;
          $goalCommitmentModel->save(false);

          $goalTodo = new GoalTodo;
          $goalTodo->todo_id = 1;
          $goalTodo->goal_id = $goalModel->id;
          $goalTodo->assigner_id = 1;
          $goalTodo->assignee_id = Yii::app()->user->id;
          $goalTodo->assigned_date = date("Y-m-d");
          $goalTodo->save(false);
          // GoalTodo::kinitializeGoalWithTodos($goalModel->id);
        }
        if (isset($_POST['GoalCommitmentShare']['connectionIdList'])) {
          if (is_array($_POST['GoalCommitmentShare']['connectionIdList'])) {
            foreach ($_POST['GoalCommitmentShare']['connectionIdList'] as $connectionId) {
              $goalCommitmentShare = new GoalCommitmentShare;
              $goalCommitmentShare->connection_id = $connectionId;
              $goalCommitmentShare->goal_commitment_id = $goalCommitmentModel->id;
              $goalCommitmentShare->save(false);
            }
          }
        }
        if ($source == 'connections') {
          echo CJSON::encode(array(
           'new_goal_post' => $this->renderPartial('goal.views.goal._goal_commitment_post', array(
            'goalCommitment' => $goalCommitmentModel,
            'connection_name' => 'All')
             , true)));
        } else if ($source == 'goal') {
          echo CJSON::encode(array(
           'new_goal_post' => $this->renderPartial('goal.views.goal._goal_commitment_post', array(
            'goalCommitment' => $goalCommitmentModel,
            'connection_name' => 'All')
             , true)));
        }
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
     'goal' => Goal::getGoal($id),
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
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'goal-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }

}
