<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class UserLogin extends CFormModel {

 public $username;
 public $password;
 public $rememberMe;

 public static function gbLogin($gbController, $loginModel, $registerModel, $profile) {
  if (Yii::app()->user->id) {
   $gbController->redirect(Yii::app()->controller->module->returnUrl);
  } else if (Yii::app()->user->isGuest) {
   // collect user input data
   if (isset($_POST['UserLogin'])) {
    $loginModel->attributes = $_POST['UserLogin'];
    // validate user input and redirect to previous page if valid
    if ($loginModel->validate()) {
     //$this->lastViset();
     if (Yii::app()->user->returnUrl == '/index.php')
      $gbController->redirect(Yii::app()->controller->module->returnUrl);
     else
      $gbController->redirect(Yii::app()->user->returnUrl);
    }
   } else {
    // display the login form
    //$this->render('/user/authenticate',
    //				array('model'=>$model));
    //$this->redirect(Yii::app()->controller->module->returnUrl);
    // ajax validator
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'registration-form') {
     echo UActiveForm::validate(array($registerModel, $profile));
     Yii::app()->end();
    }


    if (isset($_POST['RegistrationForm'])) {
     $registerModel->attributes = $_POST['RegistrationForm'];
     $profile->attributes = ((isset($_POST['Profile']) ? $_POST['Profile'] : array()));
     $registerModel->password = "12345";
     $registerModel->verifyPassword = "12345";
     if ($registerModel->validate() && $profile->validate()) {
      $registerModel->username = $registerModel->email;
      //$sourcePassword = $registerModel->password;
      $registerModel->activkey = UserModule::encrypting(microtime() . $registerModel->password);
      $registerModel->password = UserModule::encrypting($registerModel->password);
      $registerModel->verifyPassword = UserModule::encrypting($registerModel->verifyPassword);
      $registerModel->superuser = 0;
      $registerModel->status = -1; //((Yii::app()->controller->module->activeAfterRegister) ? User::STATUS_ACTIVE : User::STATUS_NOACTIVE);

      if ($registerModel->save()) {
       $profile->user_id = $registerModel->id;
       if ($profile->save()) {
        $gbController->redirect("login/betarequest");
       }
       /*  if (Yii::app()->controller->module->sendActivationMail) {
         $activation_url = $gbController->createAbsoluteUrl('/user/activation/activation', array("activkey" => $registerModel->activkey, "email" => $registerModel->email));
         UserModule::sendMail($registerModel->email, UserModule::t("You registered from {site_name}", array('{site_name}' => Yii::app()->name)), UserModule::t("Please activate you account go to {activation_url}", array('{activation_url}' => $activation_url)));
         }

         if ((Yii::app()->controller->module->loginNotActiv || (Yii::app()->controller->module->activeAfterRegister && Yii::app()->controller->module->sendActivationMail == false)) && Yii::app()->controller->module->autoLogin) {
         $identity = new UserIdentity($registerModel->username, $sourcePassword);
         $identity->authenticate();
         Yii::app()->user->login($identity, 0);
         $gbController->redirect(Yii::app()->controller->module->returnUrl);
         } else {
         if (!Yii::app()->controller->module->activeAfterRegister && !Yii::app()->controller->module->sendActivationMail) {
         Yii::app()->user->setFlash('registration', UserModule::t("Thank you for your registration. Contact Admin to activate your account."));
         } elseif (Yii::app()->controller->module->activeAfterRegister && Yii::app()->controller->module->sendActivationMail == false) {
         Yii::app()->user->setFlash('registration', UserModule::t("Thank you for your registration. Please {{login}}.", array('{{login}}' => CHtml::link(UserModule::t('Login'), Yii::app()->controller->module->loginUrl))));
         } elseif (Yii::app()->controller->module->loginNotActiv) {
         Yii::app()->user->setFlash('registration', UserModule::t("Thank you for your registration. Please check your email or login."));
         } else {
         Yii::app()->user->setFlash('registration', UserModule::t("Thank you for your registration. Please check your email."));
         }
         $gbController->refresh();
         }
         $loginModel->username = $registerModel->username;
         $loginModel->password = $_POST['RegistrationForm']['password'];
         // validate user input and redirect to previous page if valid
         if ($loginModel->validate()) {
         //$this->lastViset();
         if (Yii::app()->user->returnUrl == '/index.php')
         $gbController->redirect(Yii::app()->controller->module->returnUrl);
         else
         $gbController->redirect(Yii::app()->user->returnUrl);
         }
        *
        */
      }
     } else
      $profile->validate();
    }
   }
  }
 }

 /**
  * Declares the validation rules.
  * The rules state that username and password are required,
  * and password needs to be authenticated.
  */
 public function rules() {
  return array(
    // username and password are required
    array('username, password', 'required'),
    // rememberMe needs to be a boolean
    array('rememberMe', 'boolean'),
    // password needs to be authenticated
    array('password', 'authenticate'),
  );
 }

 /**
  * Declares attribute labels.
  */
 public function attributeLabels() {
  return array(
    'rememberMe' => UserModule::t("Stay Signed Up"),
    'username' => UserModule::t("Email"),
    'password' => UserModule::t("Password"),
  );
 }

 /**
  * Authenticates the password.
  * This is the 'authenticate' validator as declared in rules().
  */
 public function authenticate($attribute, $params) {
  if (!$this->hasErrors()) {  // we only want to authenticate when no input errors
   $identity = new UserIdentity($this->username, $this->password);
   $identity->authenticate();
   switch ($identity->errorCode) {
    case UserIdentity::ERROR_NONE:
     $duration = $this->rememberMe ? Yii::app()->controller->module->rememberMeTime : 0;
     Yii::app()->user->login($identity, $duration);
     break;
    case UserIdentity::ERROR_EMAIL_INVALID:
     $this->addError("username", UserModule::t("Email is incorrect."));
     break;
    case UserIdentity::ERROR_USERNAME_INVALID:
     $this->addError("username", UserModule::t("Username is incorrect."));
     break;
    case UserIdentity::ERROR_STATUS_NOTACTIV:
     $this->addError("status", UserModule::t("You account is not activated."));
     break;
    case UserIdentity::ERROR_STATUS_BAN:
     $this->addError("status", UserModule::t("You account is blocked."));
     break;
    case UserIdentity::ERROR_PASSWORD_INVALID:
     $this->addError("password", UserModule::t("Password is incorrect."));
     break;
   }
  }
 }

}
