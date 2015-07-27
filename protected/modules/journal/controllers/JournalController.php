<?php

class JournalController extends Controller {
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
      'actions' => array('journalhome'),
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

   public function actionJournalHome() {
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('journal_home_guest', array(
       'postShares' => PostShare::getPostShare(Post::$TYPE_MENTORSHIP),
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
      $journalLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE), "id", "name");

      $this->render('journal_home', array(
       'people' => Profile::getPeople(true),
       'journalModel' => new Journal(),
       //'journalList' => Skill::getSkill(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, null, 50),
       'journalLevelList' => $journalLevelList,
      ));
    }
  }

}
