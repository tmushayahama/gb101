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
     'postShares' => PostShare::getPostShare(),
     'skillModel' => $skillModel,
     'skillListModel' => $skillListModel,
     'mentorshipModel' => $mentorshipModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'pageModel' => $pageModel,
     'advicePageModel' => $advicePageModel,
     'pageLevelList' => $pageLevelList,
     'projectModel' => new Project(),
     'connections' => Connection::getAllConnections(),
     'skillTypes' => GoalType::Model()->findAll(),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(1, 4),
     'people' => Profile::getPeople(true),
     'skillLevelList' => $skillLevelList,
     'mentorshipLevelList' => $mentorshipLevelList,
     'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
     'requestModel' => new Notification(),
     'tags'=>Tag::getAllTags()
      // 'requests' => Notification::getNotifications(null, 6),
    ));
  }

  public function actionEditMe($dataSource, $sourcePkId) {
    if (Yii::app()->request->isAjaxRequest) {
      switch ($dataSource) {
        case Type::$SOURCE_SKILL:
          $this->editSkill($dataSource, $sourcePkId);
          break;
        case Type::$SOURCE_MENTORSHIP:
          $this->editMentorship($dataSource, $sourcePkId);
          break;
        case Type::$SOURCE_PAGE:
          $this->editPage($dataSource, $sourcePkId);
          break;
        case Type::$SOURCE_ANSWER:
          $this->editMentorshipAnswer($dataSource, $sourcePkId);
          break;
        case Type::$SOURCE_TIMELINE:
          $this->editTimeline($dataSource, $sourcePkId);
          break;
        case Type::$SOURCE_ANNOUNCEMENT:
          $this->editMentorshipAnnouncement($dataSource, $sourcePkId);
          break;
        case Type::$SOURCE_TODO:
          $this->editMentorshipTodo($dataSource, $sourcePkId);
          break;
        case Type::$SOURCE_WEBLINK:
          $this->editMentorshipWeblink($dataSource, $sourcePkId);
          break;
      }
    }
  }

  public function actionDeleteMe() {
    if (Yii::app()->request->isAjaxRequest) {
      $dataSource = Yii::app()->request->getParam('data_source');
      $sourcePkId = Yii::app()->request->getParam('source_pk_id');
      $replaceWithRow = null;
      switch ($dataSource) {
        case Type::$SOURCE_SKILL:
          GoalList::deleteGoalList($sourcePkId);
          break;
        case Type::$SOURCE_MENTORSHIP:
          Mentorship::deleteMentorship($sourcePkId);
          break;
        case Type::$SOURCE_PAGE:
          AdvicePage::deleteAdvicePage($sourcePkId);
          break;
        case Type::$SOURCE_ANSWER:
          MentorshipAnswer::deleteMentorshipAnswer($sourcePkId);
          break;
        case Type::$SOURCE_TIMELINE:
          $mentorshipId = MentorshipTimeline::deleteMentorshipTimeline($sourcePkId);
          $replaceWithRow = $this->renderPartial('mentorship.views.mentorship._mentorship_timeline_item_row', array(
           'mentorshipTimeline' => MentorshipTimeline::getMentorshipTimeline($mentorshipId),
            )
            , true);
          break;
        case Type::$SOURCE_ANNOUNCEMENT:
          Announcement::deleteAnnouncement($sourcePkId);
          break;
        case Type::$SOURCE_TODO:
          Todo::deleteTodo($sourcePkId);
          break;
        case Type::$SOURCE_DISCUSSION_TITLE:
          DiscussionTitle::deleteDiscussionTitle($sourcePkId);
          break;
        case Type::$SOURCE_DISCUSSION_POST:
          Discussion::deleteDiscussion($sourcePkId);
          break;
        case Type::$SOURCE_WEBLINK:
          Weblink::deleteWeblink($sourcePkId);
          break;
        case Type::$SOURCE_NOTIFICATION:
          Notification::deleteNotification($sourcePkId);
          break;
      }

      echo CJSON::encode(array(
       'data_source' => $dataSource,
       'source_pk_id' => $sourcePkId,
       '_replace_with_row' => $replaceWithRow,
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

  public function actionGetPosts() {
    if (Yii::app()->request->isAjaxRequest) {
      $postType = Yii::app()->request->getParam('post_type');
      $ownerId = Yii::app()->request->getParam('owner_id');
      $postShares = PostShare::getPostShare($postType, $ownerId);
      echo CJSON::encode(array(
       "_posts" => $this->renderPartial('application.views.site._posts', array(
        "postShares" => $postShares,
        "heading" => "Your " . Post::getPostTypeName($postType) . "(s)")
         , true)));
      Yii::app()->end();
    }
  }
  
   public function actionSubmitTag() {
    if (Yii::app()->request->isAjaxRequest) {
      $tagName = Yii::app()->request->getParam('tag_name');
      Tag::submitTag($tagName);
      
     // echo CJSON::encode(array(
      //// "_posts" => $this->renderPartial('application.views.site._posts', array(
      //  "postShares" => $postShares,
      //  "heading" => "Your " . Post::getPostTypeName($postType) . "(s)")
      //   , true)));
      Yii::app()->end();
    }
  }

  public function actionGetSelectPeopleList() {
    if (Yii::app()->request->isAjaxRequest) {
      $sourceId = Yii::app()->request->getParam('source_id');
      $type = Yii::app()->request->getParam('type');
      echo CJSON::encode(array(
       "_post_row" => $this->renderPartial('application.views.site._select_people_list', array(
        'people' => Profile::getPeople(true),
        "sourceId" => $sourceId,
        "types" => array($type),
        "modalType" => Type::$REQUEST_SHARE)
         , true)
        )
      );
      Yii::app()->end();
    }
  }

  public function actionSendRequest() {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Notification'])) {
        $type = $_POST['Notification']['type'];
        if (isset($_POST['gb-send-request-recepients'])) {
          $sourcePkId = $_POST['Notification']['source_id'];
          $dataSource = $_POST['Notification']['data_source'];
          Notification::setNotification(
            $_POST['Notification']['message']
            , $sourcePkId
            , Yii::app()->user->id
            , $_POST['gb-send-request-recepients']
            , $type
            , $_POST['Notification']['status']);
          Post::addPostAfterRequest($sourcePkId, $type, $_POST['gb-send-request-recepients']);
          $this->getRequestPostRow($dataSource, $sourcePkId);
        } elseif ($type == Notification::$NOTIFICATION_MENTOR_REQUEST_FRIEND || $type == Notification::$NOTIFICATION_MENTEE_REQUEST_FRIEND) {
          $sourcePkId = $_POST['Notification']['source_id'];
          $dataSource = $_POST['Notification']['data_source'];
          Notification::setNotification(
            $_POST['Notification']['message']
            , $sourcePkId
            , Yii::app()->user->id
            , array($_POST['Notification']['recipient_id'])
            , $type
            , $_POST['Notification']['status']);
          Post::addPostAfterRequest($sourcePkId, $type, array($_POST['Notification']['recipient_id']));
          $this->getRequestPostRow($dataSource, $sourcePkId);
        } 
      }
      Yii::app()->end();
    }
  }

  public function actionAcceptRequest() {
    if (Yii::app()->request->isAjaxRequest) {
      $notificationId = Yii::app()->request->getParam('notification_id');
      $notification = Notification::Model()->findByPk($notificationId);
      switch ($notification->type) {
        case Notification::$NOTIFICATION_MENTEE_REQUEST_OWNER:
        case Notification::$NOTIFICATION_MENTOR_REQUEST_OWNER:
          $mentorshipId = Mentorship::acceptMentor($notification);
          echo CJSON::encode(array(
           "redirect_url" => Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array("mentorshipId" => $mentorshipId))
          ));
          break;
      }

      Yii::app()->end();
    }
  }

  public function editSkill($dataSource, $sourcePkId) {
    if (isset($_POST['Goal']) && isset($_POST['GoalList'])) {
      $skillListModel = GoalList::model()->findByPk($sourcePkId);
      $skillModel = $skillListModel->goal;
      $skillModel->attributes = $_POST['Goal'];
      $skillListModel->attributes = $_POST['GoalList'];

      if ($skillModel->validate() && $skillListModel->validate()) {
        if ($skillModel->save()) {
          if ($skillListModel->save()) {
            echo CJSON::encode(array(
             'success' => true,
             'data_source' => $dataSource,
             'source_pk_id' => $sourcePkId,
             '_post_row' => $this->renderPartial('skill.views.skill._skill_list_post_row', array(
              'skillListItem' => $skillListModel,
              'source' => GoalList::$SOURCE_SKILL)
               , true)));
          }
        }
      } else {
        echo CActiveForm::validate(array($skillModel, $skillListModel));
      }
    }
    Yii::app()->end();
  }

  public function editMentorship($dataSource, $sourcePkId) {
    
  }

  public function editPage($dataSource, $sourcePkId) {
    
  }

  public function editTimeline($dataSource, $sourcePkId) {
    if (isset($_POST['Timeline']) && isset($_POST['MentorshipTimeline'])) {
      $mentorshipTimelineModel = MentorshipTimeline::model()->findByPk($sourcePkId);
      $timelineModel = $mentorshipTimelineModel->timeline;
      $timelineModel->attributes = $_POST['Timeline'];
      $mentorshipTimelineModel->attributes = $_POST['MentorshipTimeline'];
      if ($mentorshipTimelineModel->validate() && $timelineModel->validate()) {
        if ($timelineModel->save(false)) {
          $mentorshipTimelineModel->save(false);
          echo CJSON::encode(array(
           'success' => true,
           'data_source' => $dataSource,
           'source_pk_id' => 0,
           '_post_row' => $this->renderPartial('mentorship.views.mentorship._mentorship_timeline_item_row', array(
            'mentorshipTimeline' => MentorshipTimeline::getMentorshipTimeline($mentorshipTimelineModel->mentorship_id),
             )
             , true)
          ));
        }
      } else {
        echo CActiveForm::validate(array($mentorshipTimelineModel, $timelineModel));
      }
    }

    Yii::app()->end();
  }

  public function editMentorshipAnswer($dataSource, $sourcePkId) {
    if (isset($_POST['Goal'])) {
      $answer = MentorshipAnswer::model()->findByPk($sourcePkId);
      $skillModel = $answer->goal;
      $skillModel->attributes = $_POST['Goal'];
      if ($skillModel->validate()) {
        if ($skillModel->save(false)) {
          $answer->mentorship_answer = $skillModel->description;
          if ($answer->save(false)) {
            echo CJSON::encode(array(
             "success" => true,
             "data_source" => $dataSource,
             "source_pk_id" => $sourcePkId,
             "_post_row" => $this->renderPartial('mentorship.views.mentorship._answer_list_item'
               , array("answer" => $answer)
               , true)
            ));
          }
        }
      } else {
        echo CActiveForm::validate($skillModel);
      }
    }
    Yii::app()->end();
  }

  public function editMentorshipAnnouncement($dataSource, $sourcePkId) {
    if (isset($_POST['Announcement'])) {
      $mentorshipAnnouncementModel = MentorshipAnnouncement::model()->findByPk($sourcePkId);
      $announcementModel = $mentorshipAnnouncementModel->announcement;
      $announcementModel->attributes = $_POST['Announcement'];
      if ($announcementModel->validate()) {
        if ($announcementModel->save(false)) {
          if ($mentorshipAnnouncementModel->save(false)) {
            echo CJSON::encode(array(
             "success" => true,
             "data_source" => $dataSource,
             "source_pk_id" => $sourcePkId,
             "_post_row" => $this->renderPartial('mentorship.views.mentorship._announcement_list_item'
               , array("mentorshipAnnouncement" => $mentorshipAnnouncementModel)
               , true)
              )
            );
          }
        }
      } else {
        echo CActiveForm::validate(array($skillModel, $skillListModel));
      }
    }
    Yii::app()->end();
  }

  public function editMentorshipTodo($dataSource, $sourcePkId) {
    if (isset($_POST['Todo'])) {
      $mentorshipTodoModel = MentorshipTodo::model()->findByPk($sourcePkId);
      $todoModel = $mentorshipTodoModel->todo;
      $todoModel->attributes = $_POST['Todo'];
      if ($todoModel->validate()) {
        if ($todoModel->save(false)) {
          echo CJSON::encode(array(
           "success" => true,
           "data_source" => $dataSource,
           "source_pk_id" => $sourcePkId,
           "_post_row" => $this->renderPartial('mentorship.views.mentorship._mentorship_todo_list_item'
             , array("mentorshipTodo" => $mentorshipTodoModel)
             , true)
          ));
        }
      } else {
        echo CActiveForm::validate($todoModel);
      }
    }

    Yii::app()->end();
  }

  public function editMentorshipWeblink($dataSource, $sourcePkId) {
    if (isset($_POST['Weblink'])) {
      $mentorshipWeblinkModel = MentorshipWeblink::model()->findByPk($sourcePkId);
      $weblinkModel = $mentorshipWeblinkModel->weblink;

      $weblinkModel->attributes = $_POST['Weblink'];
      if ($weblinkModel->validate()) {
        if ($weblinkModel->save(false)) {
          echo CJSON::encode(array(
           "success" => true,
           "data_source" => $dataSource,
           "source_pk_id" => $sourcePkId,
           '_post_row' => $this->renderPartial('mentorship.views.mentorship._mentorship_weblink_list_item', array(
            'mentorshipWeblinkModel' => $mentorshipWeblinkModel)
             , true)
          ));
        }
      } else {
        echo CActiveForm::validate($weblinkModel);
      }
    }

    Yii::app()->end();
  }

  public function getRequestPostRow($dataSource, $sourcePkId) {
    switch ($dataSource) {
      case Type::$SOURCE_MENTORSHIP:
        $mentorship = Mentorship::model()->findByPk($sourcePkId);
        echo CJSON::encode(array(
         'success' => true,
         'data_source' => Type::$SOURCE_REQUESTS,
         'source_pk_id' => 0,
         "_post_row" => $this->renderPartial('mentorship.views.mentorship._mentorship_request_row', array(
          "mentorshipRequests" => Notification::getRequestStatus(array(Notification::$NOTIFICATION_MENTEE_REQUEST_OWNER, Notification::$NOTIFICATION_MENTOR_REQUEST_OWNER), $sourcePkId),
          "mentorship" => $mentorship)
           , true)
        ));
    }
  }

}
