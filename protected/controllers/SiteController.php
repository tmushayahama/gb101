<?php

class SiteController extends Controller {

  /**
   * Declares class-based actions.
   */
  public function actions() {
    return array(
// captcha action renders the CAPTCHA image displayed on the contact page
     'captcha' => array(
      'class' => 'CCaptchaAction',
      'backColor' => 0xFFFFFF,
     ),
     // page action renders "static" pages stored under 'protected/views/site/pages'
// They can be accessed via: index.php?r=site/page&view=FileName
     'page' => array(
      'class' => 'CViewAction',
     ),
    );
  }

  /**
   * This is the default 'index' action that is invoked
   * when an action is not explicitly requested by users.
   */
  public function actionHome() {
    $skillModel = new Goal();
    $skillListModel = new GoalList();
    $mentorshipModel = new Mentorship();
    $pageModel = new Page();
    $advicePageModel = new AdvicePage();

    $connectionModel = new Connection;
    $connectionMemberModel = new ConnectionMember;

    $skillLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "level_name");
    $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "level_name");
    $pageLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE_PAGE), "id", "level_name");

    $bankSearchCriteria = ListBank::getListBankSearchCriteria(GoalType::$CATEGORY_SKILL, null, 100);

    $this->render('home', array(
     'posts' => Post::getPosts(),
     'skillModel' => $skillModel,
     'skillListModel' => $skillListModel,
     'mentorshipModel' => $mentorshipModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'pageModel' => $pageModel,
     'advicePageModel' => $advicePageModel,
     'pageLevelList' => $pageLevelList,
     'connections' => Connection::getAllConnections(),
     'skillTypes' => GoalType::Model()->findAll(),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(1, 4),
     'people' => Profile::getPeople(true),
 'skillLevelList' => $skillLevelList,
     'mentorshipLevelList' => $mentorshipLevelList,
     'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
     'requests' => RequestNotification::getRequestNotifications(null, 6),
    ));
  }

  public function actionSendMentorshipRequest($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['GoalMentorship']['mentorshipsIdList'])) {
        if (is_array($_POST['GoalMentorship']['mentorshipsIdList'])) {
          foreach ($_POST['GoalMentorship']['mentorshipsIdList'] as $userId) {
            $skillMentorship = new GoalMentorship;
            $skillMentorship->mentorship_id = $userId;
            $skillMentorship->goal_commitment_id = $skillId;
            if ($skillMentorship->save(false)) {
              $requestNotification = new RequestNotification;
              $requestNotification->from_id = Yii::app()->user->id;
              $requestNotification->to_id = $skillMentorship->mentorship_id;
              $requestNotification->notification_id = $skillMentorship->id;
              $requestNotification->type = RequestNotification::$TYPE_MENTORSHIP;
              $requestNotification->save(false);
            }
          }
        }
      }
      echo CJSON::encode(array(
// "mentorship" =>);
      ));
      Yii::app()->end();
    }
  }

  public function actionAcceptRequest() {
    if (Yii::app()->request->isAjaxRequest) {
      $requestNotificationId = Yii::app()->request->getParam('request_notification_id');
      $requestNotification = RequestNotification::Model()->findByPk($requestNotificationId);
      switch ($requestNotification->type) {
        case RequestNotification::$TYPE_MONITOR:
          $skillMonitor = GoalMentorship::Model()->findByPk($requestNotification->notification_id);
          $skillMonitor->status = 1;
          if ($skillMonitor->save(false)) {
            $requestNotification->status = 1;
            $requestNotification->save(false);
          }
          break;
        case RequestNotification::$TYPE_MENTORSHIP:
          $skillMentorship = GoalMentorship::Model()->findByPk($requestNotification->notification_id);
          $skillMentorship->status = 1;
          if ($skillMentorship->save(false)) {
            $requestNotification->status = 1;
            $requestNotification->save(false);
          }
          break;

        case RequestNotification::$TYPE_CONNECTION_REQUEST:

          if (ConnectionMember::acceptConnectionRequest($requestNotification->notification_id)) {
            $requestNotification->status = 1;
            $requestNotification->save(false);
          }
          break;
      }

      echo CJSON::encode(array(
      ));
      Yii::app()->end();
    }
  }

  /**
   * This is the action to handle external exceptions.
   */
  public function actionError() {
    if ($error = Yii::app()->errorHandler->error) {
      if (Yii::app()->request->isAjaxRequest)
        echo $error['message'];
      else
        $this->render('error', $error);
    }
  }

  /**
   * Displays the contact page
   */
  public function actionContact() {
    $model = new ContactForm;
    if (isset($_POST['ContactForm'])) {
      $model->attributes = $_POST['ContactForm'];
      if ($model->validate()) {
        $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
        $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
        $headers = "From: $name <{$model->email}>\r\n" .
          "Reply-To: {$model->email}\r\n" .
          "MIME-Version: 1.0\r\n" .
          "Content-type: text/plain; charset=UTF-8";

        mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
        Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
        $this->refresh();
      }
    }
    $this->render('contact', array('model' => $model));
  }
  /**
   * Logs out the current user and redirect to homepage.
   */
  public function actionLogout() {
    Yii::app()->user->logout();
    $this->redirect(Yii::app()->homeUrl);
  }

}
