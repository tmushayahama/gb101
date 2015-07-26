<?php

class ProfileController extends Controller {

 public $defaultAction = 'profile';

 /**
  * @var CActiveRecord the currently loaded data model instance.
  */
 private $_model;

 /**
  * Shows a particular model.
  */
 public function actionProfile($userId) {
  $profile = Profile::Model()->find('user_id=' . $userId);
  if (Yii::app()->user->isGuest) {
   $registerModel = new RegistrationForm;
   $loginModel = new UserLogin;
   UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
   $this->render('profile_public', array(
     'loginModel' => $loginModel,
     'registerModel' => $registerModel,
     'profile' => $profile,
     'profilePostShares' => PostShare::getPostShare(null, $userId),
   ));
  } else if ($userId != Yii::app()->user->id) {
   $todoPriorities = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name");
   $this->render("friend/_profile_friend_pane", array(
     "selected_tab_url" => "profile",
     "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_1.css',
     "profile" => Profile::model()->findByPk($userId),
   ));
  } else {
   $todoPriorities = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name");
   $this->render("owner/_profile_owner_pane", array(
     "selected_tab_url" => "profile",
     "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_1.css',
     "profile" => Profile::model()->findByPk(Yii::app()->user->id),
   ));
  }
 }

 public function actionGetNextForm($userId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "next_form" => $this->renderPartial('user.views.user.forms._user_question_form', array(
       "formId" => "gb-user-question-form",
       "actionUrl" => Yii::app()->createUrl("user/profile/addUserQuestionAnswer", array()),
       "prependTo" => "#gb-question-answers",
       'userQuestionModel' => new UserQuestionAnswer(),
       'question' => UserQuestionAnswer::getRandomUserQuestion($userId),
       "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionAddUserQuestionAnswer() {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST["UserQuestionAnswer"])) {
    $userQuestionAnswerModel = new UserQuestionAnswer();
    $userQuestionAnswerModel->attributes = $_POST["UserQuestionAnswer"];
    if ($userQuestionAnswerModel->validate()) {
     $userQuestionAnswerModel->user_id = Yii::app()->user->id;
     $cdate = new DateTime("now");
     $userQuestionAnswerModel->created_date = $cdate->format("Y-m-d h:i:s");
     if ($userQuestionAnswerModel->save(false)) {
      $postRow = $this->renderPartial('question.views.question.activity._question_answer_row', array(
        "userQuestionAnswer" => $userQuestionAnswerModel,
        ), true);
      echo CJSON::encode(array(
        "success" => true,
        // "data_source" => Type::$SOURCE_TODO,
        //"source_pk_id" => $userQuestionAnswerModel->parent_question_id,
        "_post_row" => $postRow
      ));
     }
    } else {
     echo CActiveForm::validate($userQuestionAnswerModel);
    }
   }

   Yii::app()->end();
  }
 }

 /**
  * Change password
  */
 public function actionChangepassword() {
  $model = new UserChangePassword;
  if (Yii::app()->user->id) {

   // ajax validator
   if (isset($_POST['ajax']) && $_POST['ajax'] === 'changepassword-form') {
    echo UActiveForm::validate($model);
    Yii::app()->end();
   }

   if (isset($_POST['UserChangePassword'])) {
    $model->attributes = $_POST['UserChangePassword'];
    if ($model->validate()) {
     $new_password = User::model()->notsafe()->findbyPk(Yii::app()->user->id);
     $new_password->password = UserModule::encrypting($model->password);
     $new_password->activkey = UserModule::encrypting(microtime() . $model->password);
     $new_password->save();
     Yii::app()->user->setFlash('profileMessage', UserModule::t("New password is saved."));
     $this->redirect(array("profile"));
    }
   }
   $this->render('changepassword', array('model' => $model));
  }
 }

 /**
  * Returns the data model based on the primary key given in the GET variable.
  * If the data model is not found, an HTTP exception will be raised.
  * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
  */
 public function loadUser() {
  if ($this->_model === null) {
   if (Yii::app()->user->id)
    $this->_model = Yii::app()->controller->module->user();
   if ($this->_model === null)
    $this->redirect(Yii::app()->controller->module->loginUrl);
  }
  return $this->_model;
 }

}
