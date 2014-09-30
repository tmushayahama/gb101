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
      'actions' => array('promisehome'),
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
      $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "level_name");
      $pageLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE_PAGE), "id", "level_name");

      $this->render('promise_home', array(
       'people' => Profile::getPeople(true),
       'mentorshipModel' => new Mentorship(),
       'projectModel' => new Project(),
       'myMentorships' => Mentorship::getMentorships(null, Yii::app()->user->id),
       'postShares' => PostShare::getPostShare(Post::$TYPE_MENTORSHIP),
       'mentorshipLevelList' => $mentorshipLevelList,
       //'mentorshipRequests' => Notification::getNotifications(Notification::$TYPE_NEED_MENTEE, 10),
       'pageModel' => new Page(),
       'advicePageModel' => new AdvicePage(),
       'pageLevelList' => $pageLevelList,
       'requestModel' => new Notification()
      ));
    }
  }
}
