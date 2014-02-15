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
  public function actionConnection($connectionId) {
    $skillListModel = new GoalList;
    $skillListShare = new GoalListShare;
    $skillCommitmentShare = new GoalCommitmentShare;
    $skillListMentor = new GoalListMentor;
    $skillMonitorModel = new GoalMonitor;
    $skillMentorshipModel = new GoalMentorship;
    $skillMenteeshipModel = new GoalMentorship;
    $skillModel = new Goal;
    $connectionModel = new Connection;
    $connectionMemberModel = new ConnectionMember;
    $academicModel = new SkillAcademic;

    /* if (isset($_POST['Connection'])) {
      $connectionModel->attributes = $_POST['Connection'];
      $connectionModel->created_date = date("Y-m-d");
      if ($connectionModel->save()) {
      $connectionMemberModel = new ConnectionMember;
      $connectionMemberModel->connection_member_id = Yii::app()->user->id;
      $connectionMemberModel->connection_id = $connectionModel->id;
      $connectionMemberModel->privilege = ConnectionMember::$OWNER;
      $connectionMemberModel->added_date = date("Y-m-d");
      $connectionMemberModel->save(false);
      }
      } */

    if (isset($_POST['Goal']) && isset($_POST['SkillAcademic'])) {
      $skillModel->attributes = $_POST['Goal'];
      $academicModel->attributes = $_POST['SkillAcademic'];
      $skillModel->type_id = 1;
      $skillModel->assign_date = date("Y-m-d");
      $skillModel->save(false);
      if ($connectionId == 0) {
        GoalCommitment::saveToAllCrcles($skillModel->id);
      } else {
        $skillCommitmentModel = new GoalCommitment;
        $skillCommitmentModel->owner_id = Yii::app()->user->id;
        $skillCommitmentModel->goal_id = $skillModel->id;
        $skillCommitmentModel->save();
      }
      $academicModel->goal_id = $skillModel->id;
      $academicModel->save();
    }

    $this->render('connections', array(
     'skillModel' => $skillModel,
     'skillListModel' => $skillListModel,
     'academicModel' => $academicModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'activeConnectionId' => $connectionId,
     'connection' => Connection::Model()->findByPk($connectionId),
     'skillTypes' => GoalType::Model()->findAll(),
     'skillList' => GoalListShare::getGoalListShared($connectionId, GoalList::$TYPE_SKILL, 10),
     'skillList' => GoalListShare::getGoalListShared($connectionId, GoalList::$TYPE_GOAL, 10),
     'promiseList' => GoalListShare::getGoalListShared($connectionId, GoalList::$TYPE_PROMISE, 10),
     'skillListShare' => $skillListShare,
     'skillCommitmentShare' => $skillCommitmentShare,
     'skillMonitorModel' => $skillMonitorModel,
     'skillMentorshipModel' => $skillMentorshipModel,
     'skillMenteeshipModel' => $skillMenteeshipModel,
     'skillListMentor' => $skillListMentor,
     'skill_levels' => GoalLevel::getGoalLevels("skill"),
     'posts' => GoalCommitmentShare::getAllPostShared($connectionId),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers($connectionId, 6),
     'connectionMembers' => ConnectionMember::getConnectionMembers($connectionId, 4),
     'todos' => GoalAssignment::getTodos(),
     'skill_list_bank' => ListBank::model()->findAll()
    ));
  }

  public function actionHome() {
    $skillModel = new Goal;
    $connectionModel = new Connection;
    $connectionMemberModel = new ConnectionMember;
    $skillListShare = new GoalListShare;
    $skillListMentor = new GoalListMentor;
    if (isset($_POST['ConnectionMember']['userIdList'])) {
      foreach ($_POST['ConnectionMember']['userIdList'] as $postConnectionId) {
        $connectionMemberModel->connection_id = $postConnectionId;
        $connectionMemberModel->connection_member_id = $_POST['ConnectionMember']['connection_member_id'];
        $connectionMemberModel->added_date = date("Y-m-d");
        $connectionMemberModel->privilege = ConnectionMember::$CAN_VIEW;
        $connectionMemberModel->status = ConnectionMember::$PENDING_REQUEST;
        $connectionMemberModel->save(false);
        $connectionMemberModel = new ConnectionMember;
      }
    }
    /*  if (isset($_POST['Connection'])) {
      $connectionModel->attributes = $_POST['Connection'];
      $connectionModel->created_date = date("Y-m-d");
      if ($connectionModel->save()) {
      $createConnectionModel = new ConnectionMember;
      $createConnectionModel->connection_member_id = Yii::app()->user->id;
      $createConnectionModel->connection_id = $connectionModel->id;
      $connectionMemberModel->privilege = ConnectionMember::$OWNER;
      $createConnectionModel->added_date = date("Y-m-d");
      $createConnectionModel->save(false);
      }
      } */
    $this->render('home', array(
     'posts' => Post::getPosts(),
     'skillModel' => $skillModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'connections' => Connection::getAllConnections(),
     'skillTypes' => GoalType::Model()->findAll(),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(1, 4),
     'skillList' => GoalListShare::getGoalListShared(0, GoalList::$TYPE_SKILL, 10),
     'skillList' => GoalListShare::getGoalListShared(0, GoalList::$TYPE_GOAL, 10),
     'promiseList' => GoalListShare::getGoalListShared(0, GoalList::$TYPE_PROMISE, 10),
     'skillListShare' => $skillListShare,
     'skillListMentor' => $skillListMentor,
     'requests' => RequestNotifications::getRequestsNotifications(6),
     //'connectionMembers' => ConnectionMember::getConnectionMembers($connectionId, 4),
     'todos' => GoalAssignment::getTodos()
    ));
  }

  /* public function actionCreateConnection() {
    if (Yii::app()->request->isAjaxRequest) {
    $connectionModel = new Connection;
    $connectionName = Yii::app()->request->getParam('connection_name');
    if (isset($_POST['Connection'])) {
    $connectionModel->attributes = $_POST['Connection'];
    $connectionModel->created_date = date("Y-m-d");
    $connectionModel->owner_id = Yii::app()->user->id;
    if ($connectionModel->save()) {
    $connectionMemberModel = new ConnectionMember;
    $connectionMemberModel->connection_member_id = Yii::app()->user->id;
    $connectionMemberModel->connection_id = $connectionModel->id;
    $connectionMemberModel->privilege = ConnectionMember::$OWNER;
    $connectionMemberModel->save();
    $this->actionHome($connectionMemberModel->id);
    }
    }
    Yii::app()->end();
    }
    } */

  public function actionPopulateSkillList() {
    if (Yii::app()->request->isAjaxRequest) {
      $skillLevelId = Yii::app()->request->getParam('type');
      $skillList = GoalList::getGoalList($connectionId, $skillLevelId, null);

      echo CJSON::encode(array("row" => array(
        'skill_list_row' => $this->renderPartial('_skill_list_row_big', array(
         'skillListItem' => $skillListItem,
         'count' => $count++)
          , true))));
    }
  }

  public function actionRecordSkillCommitment($connectionId, $source) {
    if (Yii::app()->request->isAjaxRequest) {
      $skillModel = new Goal;
//$connectionId= Yii::app()->request->getParam('connection_id');
      if (isset($_POST['Goal'])) {
        $skillModel->attributes = $_POST['Goal'];
        $skillModel->assign_date = date("Y-m-d");
        $skillModel->type_id = 1;
        $skillModel->save(false);
        $skillCommitmentModel = new GoalCommitment;

        if ($connectionId < 0) {
          $skillCommitmentModel->owner_id = Yii::app()->user->id;
          $skillCommitmentModel->goal_id = $skillModel->id;
          if ($skillCommitmentModel->save(false)) {
            GoalTodo::initializeGoalWithTodos($skillModel->id);
          }
        } else {
          $skillCommitmentModel->owner_id = Yii::app()->user->id;
          $skillCommitmentModel->goal_id = $skillModel->id;
          $skillCommitmentModel->save(false);

          $skillTodo = new GoalTodo;
          $skillTodo->todo_id = 1;
          $skillTodo->goal_id = $skillModel->id;
          $skillTodo->assigner_id = 1;
          $skillTodo->assignee_id = Yii::app()->user->id;
          $skillTodo->assigned_date = date("Y-m-d");
          $skillTodo->save(false);
          // GoalTodo::kinitializeGoalWithTodos($skillModel->id);
        }
        if (isset($_POST['GoalCommitmentShare']['connectionIdList'])) {
          if (is_array($_POST['GoalCommitmentShare']['connectionIdList'])) {
            foreach ($_POST['GoalCommitmentShare']['connectionIdList'] as $connectionId) {
              $skillCommitmentShare = new GoalCommitmentShare;
              $skillCommitmentShare->connection_id = $connectionId;
              $skillCommitmentShare->goal_commitment_id = $skillCommitmentModel->id;
              $skillCommitmentShare->save(false);
            }
          }
        }
        if ($source == 'connections') {
          echo CJSON::encode(array(
           'new_skill_post' => $this->renderPartial('skill.views.skill._skill_commitment_post', array(
            'skillCommitment' => $skillCommitmentModel,
            'connection_name' => 'All')
             , true)));
        } else if ($source == 'skill') {
          echo CJSON::encode(array(
           'new_skill_post' => $this->renderPartial('skill.views.skill._skill_commitment_post', array(
            'skillCommitment' => $skillCommitmentModel,
            'connection_name' => 'All')
             , true)));
        }
      }
      Yii::app()->end();
    }
  }

  public function actionDisplayAddConnectionMemberForm() {
    if (Yii::app()->request->isAjaxRequest) {
      $newConnectionMemberId = Yii::app()->request->getParam('new_connection_member_id');
      echo CJSON::encode(array(
       'memberExistInConnection' => ConnectionMember::getMemberExistInConnection($newConnectionMemberId)
      ));
    }
    Yii::app()->end();
  }

  public function actionAddSkilllist($connectionId, $source, $type) {
    if (Yii::app()->request->isAjaxRequest) {
      $skillModel = new Goal;
      $skillListModel = new GoalList;
      $skillListMentor = new GoalListMentor;
//$connectionId= Yii::app()->request->getParam('connection_id');
      if (isset($_POST['GoalList'])) {
        $skillModel->title = $_POST['GoalList']['title'];
        $skillModel->description = $_POST['GoalList']['description'];
        $skillModel->assign_date = date("Y-m-d");
        $skillModel->status = 1;
        if ($skillModel->save(false)) {
          $skillListModel->type_id = $type;
          $skillListModel->user_id = Yii::app()->user->id;
          $skillListModel->goal_id = $skillModel->id;
          $skillListModel->goal_level_id = $_POST['GoalList']['goal_level_id'];
//$skillListModel->connection_id = $connectionId;
          if ($skillListModel->save(false)) {
            Post::addPost($skillListModel->id, Post::$TYPE_GOAL_LIST);
          }

          if (isset($_POST['GoalListShare']['connectionIdList'])) {
            if (is_array($_POST['GoalListShare']['connectionIdList'])) {
              foreach ($_POST['GoalListShare']['connectionIdList'] as $connectionId) {
                $skillListShare = new GoalListShare;
                $skillListShare->connection_id = $connectionId;
                $skillListShare->goal_list_id = $skillListModel->id;
                $skillListShare->save(false);
              }
            }
          }
          if (isset($_POST['GoalListMentor']['userIdList'])) {
            if (is_array($_POST['GoalListMentor']['userIdList'])) {
              foreach ($_POST['GoalListMentor']['userIdList'] as $mentorId) {
                $skillListMentor = new GoalListMentor;
                $skillListMentor->mentor_id = $mentorId;
                $skillListMentor->goal_list_id = $skillListModel->id;
                $skillListMentor->save(false);
              }
            }
          }
          if ($source == 'connections') {
            echo CJSON::encode(array(
             'new_skill_list_row' => $this->renderPartial('_skill_list_row', array(
              'description' => $skillModel->description,
              'skill_level' => $skillListModel->goalLevel->level_name,
              "status" => $skillModel->status)
               , true)));
          } else if ($source == "skill") {
            echo CJSON::encode(array(
             'new_skill_post' => $this->renderPartial('skill.views.skill._skill_list_post_row', array(
              'skillListItem' => $skillListModel,
              'count' => 1)
               , true),
             "skill_level_id" => $skillListModel->goalLevel->id,
             "new_skill_list_row" => $this->renderPartial('skill.views.skill._skill_list_row', array(
              "skillListItem" => $skillListModel,
              "count" => 1)
               , true)));
          }
        }
      }
      Yii::app()->end();
    }
  }

  public function actionSendMonitorRequest($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['GoalMonitor']['monitorsIdList'])) {
        if (is_array($_POST['GoalMonitor']['monitorsIdList'])) {
          foreach ($_POST['GoalMonitor']['monitorsIdList'] as $userId) {
            $skillMonitor = new GoalMonitor;
            $skillMonitor->monitor_id = $userId;
            $skillMonitor->goal_commitment_id = $skillId;
            if ($skillMonitor->save(false)) {
              $requestNotification = new RequestNotifications;
              $requestNotification->from_id = Yii::app()->user->id;
              $requestNotification->to_id = $skillMonitor->monitor_id;
              $requestNotification->notification_id = $skillMonitor->id;
              $requestNotification->type = RequestNotifications::$TYPE_MONITOR_REQUEST;
              $requestNotification->save(false);
            }
          }
        }
      }
      echo CJSON::encode(array(
// "monitor" =>);
      ));
      Yii::app()->end();
    }
  }

  public function actionSendConnectionMemberRequest($userId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['ConnectionMember']['userIdList'])) {
        if (is_array($_POST['ConnectionMember']['userIdList'])) {
          foreach ($_POST['ConnectionMember']['userIdList'] as $connectionId) {
            $connectionMemberModel = new ConnectionMember;
            $connectionMemberModel->connection_id = $connectionId;
            $connectionMemberModel->connection_member_id_2 = Yii::app()->user->id;
            $connectionMemberModel->connection_member_id_1 = $userId;
            $connectionMemberModel->status = ConnectionMember::$PENDING_REQUEST;
            $connectionMemberModel->added_date = date("Y-m-d");

            $connectionMemberModel_2 = new ConnectionMember;
            $connectionMemberModel_2->connection_id = $connectionId;
            $connectionMemberModel_2->connection_member_id_1 = Yii::app()->user->id;
            $connectionMemberModel_2->connection_member_id_2 = $userId;
            $connectionMemberModel_2->status = ConnectionMember::$PENDING_REQUEST;
            $connectionMemberModel_2->added_date = date("Y-m-d");
            if ($connectionMemberModel->save(false) && $connectionMemberModel_2->save(false)) {
              $requestNotification = new RequestNotifications;
              $requestNotification->from_id = $connectionMemberModel_2->connection_member_id_1;
              $requestNotification->to_id = $connectionMemberModel_2->connection_member_id_2;
              $requestNotification->notification_id = $connectionMemberModel_2->id;
              $requestNotification->type = RequestNotifications::$TYPE_CONNECTION_REQUEST;
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

  public function actionSendMentorshipRequest($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['GoalMentorship']['mentorshipsIdList'])) {
        if (is_array($_POST['GoalMentorship']['mentorshipsIdList'])) {
          foreach ($_POST['GoalMentorship']['mentorshipsIdList'] as $userId) {
            $skillMentorship = new GoalMentorship;
            $skillMentorship->mentorship_id = $userId;
            $skillMentorship->goal_commitment_id = $skillId;
            if ($skillMentorship->save(false)) {
              $requestNotification = new RequestNotifications;
              $requestNotification->from_id = Yii::app()->user->id;
              $requestNotification->to_id = $skillMentorship->mentorship_id;
              $requestNotification->notification_id = $skillMentorship->id;
              $requestNotification->type = RequestNotifications::$TYPE_MONITOR_REQUEST;
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

  public function actionSendMenteeshipRequest($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      $toId = GoalCommitment::Model()->findByPk($skillId)->owner_id;
      $skillMentorship = new GoalMentorship;
      $skillMentorship->mentorship_id = Yii::app()->user->id;
      $skillMentorship->goal_commitment_id = $skillId;
      if ($skillMentorship->save(false)) {
        $requestNotification = new RequestNotifications;
        $requestNotification->from_id = $skillMentorship->mentorship_id;
        $requestNotification->to_id = $toId;
        $requestNotification->notification_id = $skillMentorship->id;
        $requestNotification->type = RequestNotifications::$TYPE_MENTEESHIP_REQUEST;
        $requestNotification->save(false);
      }
      if (isset($_POST['GoalMentorship[2]'])) {
        
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
      $requestNotification = RequestNotifications::Model()->findByPk($requestNotificationId);
      switch ($requestNotification->type) {
        case RequestNotifications::$TYPE_MONITOR_REQUEST:
          $skillMonitor = GoalMentorship::Model()->findByPk($requestNotification->notification_id);
          $skillMonitor->status = 1;
          if ($skillMonitor->save(false)) {
            $requestNotification->status = 1;
            $requestNotification->save(false);
          }
          break;
        case RequestNotifications::$TYPE_MENTORSHIP_REQUEST:
        case RequestNotifications::$TYPE_MENTEESHIP_REQUEST:
          $skillMentorship = GoalMentorship::Model()->findByPk($requestNotification->notification_id);
          $skillMentorship->status = 1;
          if ($skillMentorship->save(false)) {
            $requestNotification->status = 1;
            $requestNotification->save(false);
          }
          break;

        case RequestNotifications::$TYPE_CONNECTION_REQUEST:

          if (ConnectionMember::acceptConnectionRequest($requestNotification->notification_id)) {
            $requestNotification->status = 1;
            $requestNotification->save(false);
          }
          break;
      }

      echo CJSON::encode(array(
// "mentorship" =>);
      ));
      Yii::app()->end();
    }
  }

  public function actionAddGoalWebLink() {
    if (Yii::app()->request->isAjaxRequest) {
      $skillWebLink = new GoalWebLink;
      if (isset($_POST['GoalWebLink'])) {
        $skillWebLink->attributes = $_POST['GoalWebLink'];
        $skillWebLink->creator_id = Yii::app()->user->id;
        $skillWebLink->save(false);
      }

      echo CJSON::encode(array(
       "web_link_row" => $this->renderPartial('skill.views.skill._web_link_row', array(
        "skillWebLink" => $skillWebLink)
         , true)));
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
   * Displays the login page
   */

  /**
   * Logs out the current user and redirect to homepage.
   */
  public function actionLogout() {
    Yii::app()->user->logout();
    $this->redirect(Yii::app()->homeUrl);
  }

}
