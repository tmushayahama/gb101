<?php

class HobbyController extends Controller {
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
      'actions' => array('hobbyhome', 'addHobbylist'),
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

  public function actionHobbyHome() {
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('hobby_home_guest', array(
       'postShares' => PostShare::getPostShare(Post::$TYPE_MENTORSHIP),
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
      $hobbyLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_HOBBY), "id", "name");

      $this->render('hobby_home', array(
       'people' => Profile::getPeople(true),
       'hobbyModel' => new Hobby(),
       'hobbyListModel' => new HobbyList(),
       'hobbyList' => HobbyList::getHobbyList(Level::$LEVEL_CATEGORY_HOBBY, Yii::app()->user->id, null, 50),
       'hobbyLevelList' => $hobbyLevelList,
      ));
    }
  }
  
   public function actionAddHobbylist() {
    if (Yii::app()->request->isAjaxRequest) {
      $hobbyModel = new Hobby;
      $hobbyListModel = new HobbyList;
      if (isset($_POST['Hobby']) && isset($_POST['HobbyList'])) {
        $hobbyModel->attributes = $_POST['Hobby'];
        $hobbyListModel->attributes = $_POST['HobbyList'];
        if ($hobbyModel->validate() && $hobbyListModel->validate()) {
          $hobbyModel->created_date = date("Y-m-d");
          $hobbyModel->status = 1;
          if ($hobbyModel->save()) {
            $hobbyListModel->user_id = Yii::app()->user->id;
            $hobbyListModel->hobby_id = $hobbyModel->id;
            if ($hobbyListModel->save()) {
              if (isset($_POST['gb-hobby-share-with'])) {
                HobbyListShare::shareHobbyList($hobbyListModel->id, $_POST['gb-hobby-share-with']);
                Post::addPost($hobbyListModel->id, Post::$TYPE_GOAL_LIST, $hobbyListModel->privacy, $_POST['gb-hobby-share-with']);
              } else {
                HobbyListShare::shareHobbyList($hobbyListModel->id);
                Post::addPost($hobbyListModel->id, Post::$TYPE_GOAL_LIST, $hobbyListModel->privacy);
              }
              echo CJSON::encode(array(
               'success' => true,
               "hobby_level_id" => $hobbyListModel->level_id,
               '_post_row' => $this->renderPartial('hobby.views.hobby._hobby_list_post_row', array(
                'hobbyListItem' => $hobbyListModel,
                'source' => HobbyList::$SOURCE_SKILL)
                 , true),
               "_hobby_preview_list_row" => $this->renderPartial('hobby.views.hobby._hobby_preview_list_row', array(
                "hobbyListItem" => $hobbyListModel)
                 , true)));
            }
          }
        } else {
          echo CActiveForm::validate(array($hobbyModel, $hobbyListModel));
        }
      }
      Yii::app()->end();
    }
  }

}
