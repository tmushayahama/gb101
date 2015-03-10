<?php

class CommunityController extends Controller {

 public function actionHome() {
  //$skill = Skill::Model()->findByPk($skillId);
  if (Yii::app()->user->isGuest) {
   $registerModel = new RegistrationForm;
   $profile = new Profile;
   $loginModel = new UserLogin;
   UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);

   $this->render('application.views.site.app_home_guest', array(
     'loginModel' => $loginModel,
     'registerModel' => $registerModel,
     'profile' => $profile,
     'people' => Profile::getPeople(false),
   ));
  } else {
   $this->render('application.views.site.community_home', array(
     'people' => Profile::getPeople(true),
   ));
  }
 }

}
