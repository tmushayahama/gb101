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
  public function actionHome($connectionId) {
    $goalListModel = new GoalList;
    $goalListShare = new GoalListShare;
    $goalCommitmentShare = new GoalCommitmentShare;
    $goalListMentor = new GoalListMentor;
    $goalMonitorModel = new GoalMonitor;
    $goalMentorshipModel = new GoalMentorship;
    $goalMenteeshipModel = new GoalMentorship;
    $goalModel = new Goal;
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
      $goalModel->attributes = $_POST['Goal'];
      $academicModel->attributes = $_POST['SkillAcademic'];
      $goalModel->type_id = 1;
      $goalModel->assign_date = date("Y-m-d");
      $goalModel->save(false);
      if ($connectionId == 0) {
        GoalCommitment::saveToAllCrcles($goalModel->id);
      } else {
        $goalCommitmentModel = new GoalCommitment;
        $goalCommitmentModel->owner_id = Yii::app()->user->id;
        $goalCommitmentModel->goal_id = $goalModel->id;
        $goalCommitmentModel->save();
      }
      $academicModel->skill_id = $goalModel->id;
      $academicModel->save();
    }

    $this->render('home', array(
     'goalModel' => $goalModel,
     'goalListModel' => $goalListModel,
     'academicModel' => $academicModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'activeConnectionId' => $connectionId,
     'connection' => Connection::Model()->findByPk($connectionId),
     'goalTypes' => GoalType::Model()->findAll(),
     'skillList' => GoalListShare::getGoalListShared($connectionId, GoalList::$TYPE_SKILL, 10),
     'goalList' => GoalListShare::getGoalListShared($connectionId, GoalList::$TYPE_GOAL, 10),
     'promiseList' => GoalListShare::getGoalListShared($connectionId, GoalList::$TYPE_PROMISE, 10),
     'goalListShare' => $goalListShare,
     'goalCommitmentShare' => $goalCommitmentShare,
     'goalMonitorModel' => $goalMonitorModel,
     'goalMentorshipModel' => $goalMentorshipModel,
     'goalMenteeshipModel' => $goalMenteeshipModel,
     'goalListMentor' => $goalListMentor,
     'posts' => GoalCommitmentShare::getAllPostShared($connectionId),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers($connectionId, 6),
     'connectionMembers' => ConnectionMember::getConnectionMembers($connectionId, 4),
     'todos' => GoalAssignment::getTodos()
    ));
  }

  public function actionConnections() {
    $goalModel = new Goal;
    $connectionModel = new Connection;
    $connectionMemberModel = new ConnectionMember;
    $goalListShare = new GoalListShare;
    $goalListMentor = new GoalListMentor;
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
    $this->render('connections', array(
     'goalModel' => $goalModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'connections' => Connection::getAllConnections(),
     'goalTypes' => GoalType::Model()->findAll(),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(1, 4),
     'skillList' => GoalListShare::getGoalListShared(0, GoalList::$TYPE_SKILL, 10),
     'goalList' => GoalListShare::getGoalListShared(0, GoalList::$TYPE_GOAL, 10),
     'promiseList' => GoalListShare::getGoalListShared(0, GoalList::$TYPE_PROMISE, 10),
     'goalListShare' => $goalListShare,
     'goalListMentor' => $goalListMentor,
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

  public function actionRecordSkillCommitment($connectionId, $source) {
    if (Yii::app()->request->isAjaxRequest) {
      $goalModel = new Goal;
//$connectionId= Yii::app()->request->getParam('connection_id');
      if (isset($_POST['Goal'])) {
        $goalModel->attributes = $_POST['Goal'];
        $goalModel->assign_date = date("Y-m-d");
        $goalModel->type_id = 1;
        $goalModel->save(false);
        $goalCommitmentModel = new GoalCommitment;

        if ($connectionId < 0) {
          $goalCommitmentModel->owner_id = Yii::app()->user->id;
          $goalCommitmentModel->goal_id = $goalModel->id;
          if ($goalCommitmentModel->save(false)) {
            GoalTodo::initializeGoalWithTodos($goalModel->id);
          }
        } else {
          $goalCommitmentModel->owner_id = Yii::app()->user->id;
          $goalCommitmentModel->goal_id = $goalModel->id;
          $goalCommitmentModel->save(false);

          $goalTodo = new GoalTodo;
          $goalTodo->todo_id = 1;
          $goalTodo->goal_id = $goalModel->id;
          $goalTodo->assigner_id = 1;
          $goalTodo->assignee_id = Yii::app()->user->id;
          $goalTodo->assigned_date = date("Y-m-d");
          $goalTodo->save(false);
          // GoalTodo::kinitializeGoalWithTodos($goalModel->id);
        }
        if (isset($_POST['GoalCommitmentShare']['connectionIdList'])) {
          if (is_array($_POST['GoalCommitmentShare']['connectionIdList'])) {
            foreach ($_POST['GoalCommitmentShare']['connectionIdList'] as $connectionId) {
              $goalCommitmentShare = new GoalCommitmentShare;
              $goalCommitmentShare->connection_id = $connectionId;
              $goalCommitmentShare->goal_commitment_id = $goalCommitmentModel->id;
              $goalCommitmentShare->save(false);
            }
          }
        }
        if ($source == 'connections') {
          echo CJSON::encode(array(
           'new_goal_post' => $this->renderPartial('goal.views.goal._goal_commitment_post', array(
            'goalCommitment' => $goalCommitmentModel,
            'connection_name' => 'All')
             , true)));
        } else if ($source == 'goal') {
          echo CJSON::encode(array(
           'new_goal_post' => $this->renderPartial('goal.views.goal._goal_commitment_post', array(
            'goalCommitment' => $goalCommitmentModel,
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
      $goalModel = new Goal;
      $goalListModel = new GoalList;
      $goalListMentor = new GoalListMentor;
//$connectionId= Yii::app()->request->getParam('connection_id');
      if (isset($_POST['GoalList'])) {
        $goalModel->description = $_POST['GoalList']['description'];
        $goalModel->assign_date = date("Y-m-d");
        $goalModel->status = 1;
        if ($goalModel->save(false)) {

          $goalListModel->type = $type;
          $goalListModel->user_id = Yii::app()->user->id;
          $goalListModel->goal_id = $goalModel->id;
          $goalListModel->skill_level = $_POST['GoalList']['skill_level'];
//$goalListModel->connection_id = $connectionId;
          $goalListModel->save(false);

          if (isset($_POST['GoalListShare']['connectionIdList'])) {
            if (is_array($_POST['GoalListShare']['connectionIdList'])) {
              foreach ($_POST['GoalListShare']['connectionIdList'] as $connectionId) {
                $goalListShare = new GoalListShare;
                $goalListShare->connection_id = $connectionId;
                $goalListShare->goal_list_id = $goalListModel->id;
                $goalListShare->save(false);
              }
            }
          }
          if (isset($_POST['GoalListMentor']['userIdList'])) {
            if (is_array($_POST['GoalListMentor']['userIdList'])) {
              foreach ($_POST['GoalListMentor']['userIdList'] as $mentorId) {
                $goalListMentor = new GoalListMentor;
                $goalListMentor->mentor_id = $mentorId;
                $goalListMentor->goal_list_id = $goalListModel->id;
                $goalListMentor->save(false);
              }
            }
          }
          if ($source == 'connections') {
            echo CJSON::encode(array(
             'new_skill_list_row' => $this->renderPartial('_skill_list_row', array(
              'description' => $goalModel->description,
              'skill_level' => $goalListModel->skill_level,
              "status" => $goalModel->status)
               , true)));
          } else if ($source == "goal") {
            echo CJSON::encode(array(
             "new_skill_list_row" => $this->renderPartial('goal.views.goal._skill_list_row', array(
              "goalListItem" => $goalListModel,
              "count" => 1)
               , true)));
          }
        }
      }
      Yii::app()->end();
    }
  }

  public function actionSendMonitorRequest($goalId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['GoalMonitor']['monitorsIdList'])) {
        if (is_array($_POST['GoalMonitor']['monitorsIdList'])) {
          foreach ($_POST['GoalMonitor']['monitorsIdList'] as $userId) {
            $goalMonitor = new GoalMonitor;
            $goalMonitor->monitor_id = $userId;
            $goalMonitor->goal_commitment_id = $goalId;
            if ($goalMonitor->save(false)) {
              $requestNotification = new RequestNotifications;
              $requestNotification->from_id = Yii::app()->user->id;
              $requestNotification->to_id = $goalMonitor->monitor_id;
              $requestNotification->notification_id = $goalMonitor->id;
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
            if ($connectionMemberModel->save(false) &&  $connectionMemberModel_2->save(false)) {
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

  public function actionSendMentorshipRequest($goalId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['GoalMentorship']['mentorshipsIdList'])) {
        if (is_array($_POST['GoalMentorship']['mentorshipsIdList'])) {
          foreach ($_POST['GoalMentorship']['mentorshipsIdList'] as $userId) {
            $goalMentorship = new GoalMentorship;
            $goalMentorship->mentorship_id = $userId;
            $goalMentorship->goal_commitment_id = $goalId;
            if ($goalMentorship->save(false)) {
              $requestNotification = new RequestNotifications;
              $requestNotification->from_id = Yii::app()->user->id;
              $requestNotification->to_id = $goalMentorship->mentorship_id;
              $requestNotification->notification_id = $goalMentorship->id;
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

  public function actionSendMenteeshipRequest($goalId) {
    if (Yii::app()->request->isAjaxRequest) {
      $toId = GoalCommitment::Model()->findByPk($goalId)->owner_id;
      $goalMentorship = new GoalMentorship;
      $goalMentorship->mentorship_id = Yii::app()->user->id;
      $goalMentorship->goal_commitment_id = $goalId;
      if ($goalMentorship->save(false)) {
        $requestNotification = new RequestNotifications;
        $requestNotification->from_id = $goalMentorship->mentorship_id;
        $requestNotification->to_id = $toId;
        $requestNotification->notification_id = $goalMentorship->id;
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
          $goalMonitor = GoalMentorship::Model()->findByPk($requestNotification->notification_id);
          $goalMonitor->status = 1;
          if ($goalMonitor->save(false)) {
            $requestNotification->status = 1;
            $requestNotification->save(false);
          }
          break;
        case RequestNotifications::$TYPE_MENTORSHIP_REQUEST:
        case RequestNotifications::$TYPE_MENTEESHIP_REQUEST:
          $goalMentorship = GoalMentorship::Model()->findByPk($requestNotification->notification_id);
          $goalMentorship->status = 1;
          if ($goalMentorship->save(false)) {
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
