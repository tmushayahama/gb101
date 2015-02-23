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
  if (Yii::app()->user->isGuest) {
   $registerModel = new RegistrationForm;
   $profile = Profile::Model()->find('user_id=' . $userId);
   $loginModel = new UserLogin;
   UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
   $this->render('profile_public', array(
     'loginModel' => $loginModel,
     'registerModel' => $registerModel,
     'profile' => $profile,
     'profilePostShares' => PostShare::getPostShare(null, $userId),
   ));
  } else {
   $todoPriorities = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name");
   $this->render("profile_owner", array(
     "profile" => Profile::model()->findByPk($userId),
     "skillLevels" => Level::getLevels(Level::$LEVEL_CATEGORY_SKILL),
     "skills" => Skill::getSkills(),
     "skillsCount" => Skill::getSkillsCount(),
     "commentModel" => new Comment(),
     "discussionModel" => new Discussion(),
     //"skillParentTodos" => SkillTodo::getSkillParentTodos($skillId),
     "noteModel" => new Note(),
     "questionModel" => new Question(),
     "questionnaireModel" => new Questionnaire(),
     "requestModel" => new Notification(),
     "todoModel" => new Todo(),
     "todoPriorities" => $todoPriorities,
     "weblinkModel" => new Weblink(),
     "discussionModel" => new Discussion(),
     //"skillParentDiscussions" => SkillDiscussion::getSkillParentDiscussions($skillId),
     //"skillType" => $skillType,
     //"advicePages" => Page::getUserPages($skill->creator_id),
     //"skillTimeline" => SkillTimeline::getSkillTimeline($skillId),
     "skillTimelineModel" => new SkillTimeline(),
     "people" => Profile::getPeople(true),
     "timelineModel" => new Timeline(),
     //"feedbackQuestions" => Skill::getFeedbackQuestions($skill, Yii::app()->user->id),
     "skillModel" => new Skill(),
     //"skill" => Skill::getSkill(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, null, 50),
     "skillLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
   ));
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
