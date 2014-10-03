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
      'actions' => array('goalhome', 'addGoallist'),
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
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('mentorship_home_guest', array(
       'postShares' => PostShare::getPostShare(Post::$TYPE_MENTORSHIP),
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
      $goalLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "level_name");
    
      $this->render('goal_home', array(
       'people' => Profile::getPeople(true),
       'goalModel' => new Goal(),
       'goalListModel' => new GoalList(),
       //'goalList' => SkillList::getSkillList(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, null, 50),
       'goalLevelList' => $goalLevelList,
      ));
    }
  }

   public function actionAddGoallist() {
    if (Yii::app()->request->isAjaxRequest) {
      $goalModel = new Goal;
      $goalListModel = new GoalList;
      if (isset($_POST['Goal']) && isset($_POST['GoalList'])) {
        $goalModel->attributes = $_POST['Goal'];
        $goalListModel->attributes = $_POST['GoalList'];
        if ($goalModel->validate() && $goalListModel->validate()) {
          $goalModel->assign_date = date("Y-m-d");
          $goalModel->status = 1;
          if ($goalModel->save()) {
            $goalListModel->user_id = Yii::app()->user->id;
            $goalListModel->goal_id = $goalModel->id;
            if ($goalListModel->save()) {
              if (isset($_POST['gb-goal-share-with'])) {
                GoalListShare::shareGoalList($goalListModel->id, $_POST['gb-goal-share-with']);
                Post::addPost($goalListModel->id, Post::$TYPE_GOAL_LIST, $goalListModel->privacy, $_POST['gb-goal-share-with']);
              } else {
                GoalListShare::shareGoalList($goalListModel->id);
                Post::addPost($goalListModel->id, Post::$TYPE_GOAL_LIST, $goalListModel->privacy);
              }
              echo CJSON::encode(array(
               'success' => true,
               "goal_level_id" => $goalListModel->level_id,
               '_post_row' => $this->renderPartial('goal.views.goal._goal_list_post_row', array(
                'goalListItem' => $goalListModel,
                'source' => GoalList::$SOURCE_SKILL)
                 , true),
               "_goal_preview_list_row" => $this->renderPartial('goal.views.goal._goal_preview_list_row', array(
                "goalListItem" => $goalListModel)
                 , true)));
            }
          }
        } else {
          echo CActiveForm::validate(array($goalModel, $goalListModel));
        }
      }
      Yii::app()->end();
    }
  }

  
}
