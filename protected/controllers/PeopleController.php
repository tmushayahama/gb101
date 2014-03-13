<?php

class PeopleController extends Controller {

  public function actionIndex() {
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);

      $this->render('people_home_guest', array(
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile,
       'people' => Profile::getPeople(),
      ));
    } else {
      $this->render('people_home', array(
       'people' => Profile::getPeople(),
      ));
    }
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
