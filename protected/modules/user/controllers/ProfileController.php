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
  public function actionProfile($user) {
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = Profile::Model()->find('user_id=' . $user);
      $loginModel = new UserLogin;
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('profile_public', array(
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile,
       'profilePostShares' => PostShare::getPostShare(null, $user),
      ));
    } else {
       $skillModel = new Skill;
    $skillModel = new Skill;
    $mentorshipModel = new Mentorship();

    $bankSearchCriteria = Bank::getBankSearchCriteria(SkillType::$CATEGORY_SKILL, null, 100);
    $skillLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name");
    $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name");

    $pageLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE_PAGE), "id", "name");

      $this->render('profile', array(
       'profile' => Profile::Model()->find('user_id=' . $user),
       'postShares' => PostShare::getPostShare(),
       'skillModel' => $skillModel,
       'skill' => Skill::getSkill(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, null, 50),
       'skillModel' => $skillModel,
       'mentorshipModel' => $mentorshipModel,
       'mentorships' => Mentorship::getMentorships(null, null),
       'pageModel' => new Page(),
       'advicePageModel' => new AdvicePage(),
       'advicePages' => AdvicePage::getAdvicePages(),
       'pageLevelList' => $pageLevelList,
       'projectModel' => new Project(),
       'connections' => Connection::getAllConnections(),
       'skillTypes' => SkillType::Model()->findAll(),
       'people' => Profile::getPeople(true),
       'skillLevelList' => $skillLevelList,
       'mentorshipLevelList' => $mentorshipLevelList,
       'skillBank' => Bank::model()->findAll($bankSearchCriteria),
       'requestModel' => new Notification(),
       'tags' => Tag::getAllTags(),
       'profilePostShares' => PostShare::getPostShare(null, $user),
      ));
    }
  }

  /**
   * Updates a particular model.
   * If update is successful, the browser will be redirected to the 'view' page.
   */
  public function actionEdit() {
    $model = $this->loadUser();
    $profile = $model->profile;

    // ajax validator
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'profile-form') {
      echo UActiveForm::validate(array($model, $profile));
      Yii::app()->end();
    }

    if (isset($_POST['User'])) {
      $model->attributes = $_POST['User'];
      $profile->attributes = $_POST['Profile'];

      if ($model->validate() && $profile->validate()) {
        $model->save();
        $profile->save();
        Yii::app()->user->updateSession();
        Yii::app()->user->setFlash('profileMessage', UserModule::t("Changes is saved."));
        $this->redirect(array('/user/profile'));
      } else
        $profile->validate();
    }

    $this->render('edit', array(
     'model' => $model,
     'profile' => $profile,
    ));
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
