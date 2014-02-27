<?php

class SearchController extends Controller {

  public function actionSearch($keyword) {
    $keyword = Yii::app()->request->getParam('keyword');

    $registerModel = new RegistrationForm;
    $profile = new Profile;
    $loginModel = new UserLogin;
    UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
    $this->render('search_not_login', array(
     'posts' => Post::getPosts(),
     'loginModel' => $loginModel,
     'registerModel' => $registerModel,
     'profile' => $profile)
    );
  }

  // Uncomment the following methods and override them if needed
  /*
    public function filters()
    {
    // return the filter configuration for this controller, e.g.:
    return array(
    'inlineFilterName',
    array(
    'class'=>'path.to.FilterClass',
    'propertyName'=>'propertyValue',
    ),
    );
    }

    public function actions()
    {
    // return external action classes, e.g.:
    return array(
    'action1'=>'path.to.ActionClass',
    'action2'=>array(
    'class'=>'path.to.AnotherActionClass',
    'propertyName'=>'propertyValue',
    ),
    );
    }
   */
}
