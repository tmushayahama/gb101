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
      'actions' => array('promisehome', 'addPromiselist'),
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
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('promise_home_guest', array(
       'postShares' => PostShare::getPostShare(Post::$TYPE_MENTORSHIP),
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
      $promiseLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_PROMISE), "id", "level_name");

      $this->render('promise_home', array(
       'people' => Profile::getPeople(true),
       'promiseModel' => new Promise(),
       'promiseListModel' => new PromiseList(),
       'promiseList' => PromiseList::getPromiseList(Level::$LEVEL_CATEGORY_PROMISE, Yii::app()->user->id, null, 50),
       'promiseLevelList' => $promiseLevelList,
      ));
    }
  }
  
  
   public function actionAddPromiselist() {
    if (Yii::app()->request->isAjaxRequest) {
      $promiseModel = new Promise;
      $promiseListModel = new PromiseList;
      if (isset($_POST['Promise']) && isset($_POST['PromiseList'])) {
        $promiseModel->attributes = $_POST['Promise'];
        $promiseListModel->attributes = $_POST['PromiseList'];
        if ($promiseModel->validate() && $promiseListModel->validate()) {
          $promiseModel->assign_date = date("Y-m-d");
          $promiseModel->status = 1;
          if ($promiseModel->save()) {
            $promiseListModel->user_id = Yii::app()->user->id;
            $promiseListModel->promise_id = $promiseModel->id;
            if ($promiseListModel->save()) {
              if (isset($_POST['gb-promise-share-with'])) {
                PromiseListShare::sharePromiseList($promiseListModel->id, $_POST['gb-promise-share-with']);
                Post::addPost($promiseListModel->id, Post::$TYPE_GOAL_LIST, $promiseListModel->privacy, $_POST['gb-promise-share-with']);
              } else {
                PromiseListShare::sharePromiseList($promiseListModel->id);
                Post::addPost($promiseListModel->id, Post::$TYPE_GOAL_LIST, $promiseListModel->privacy);
              }
              echo CJSON::encode(array(
               'success' => true,
               "promise_level_id" => $promiseListModel->level_id,
               '_post_row' => $this->renderPartial('promise.views.promise._promise_list_post_row', array(
                'promiseListItem' => $promiseListModel,
                'source' => PromiseList::$SOURCE_SKILL)
                 , true),
               "_promise_preview_list_row" => $this->renderPartial('promise.views.promise._promise_preview_list_row', array(
                "promiseListItem" => $promiseListModel)
                 , true)));
            }
          }
        } else {
          echo CActiveForm::validate(array($promiseModel, $promiseListModel));
        }
      }
      Yii::app()->end();
    }
  }

}
