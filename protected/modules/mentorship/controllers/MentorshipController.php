<?php

class MentorshipController extends Controller {

  public function actionMentorshipHome() {
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('mentorship_home_guest', array(
       'mentorships' => Mentorship::getAllMentorshipList(),
       //'mentorshipRequests' => Notification::getNotifications(Notification::$TYPE_NEED_MENTEE, 10, true),
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
      $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "level_name");
      $pageLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE_PAGE), "id", "level_name");

      $this->render('mentorship_home', array(
       'people' => Profile::getPeople(true),
       'mentorshipModel' => new Mentorship(),
       'mentoringList' => Mentorship::getMentoringList(),
       'mentorships' => Mentorship::getAllMentorshipList(),
       'mentorshipLevelList' => $mentorshipLevelList,
       //'mentorshipRequests' => Notification::getNotifications(Notification::$TYPE_NEED_MENTEE, 10),
       'pageModel' => new Page(),
       'advicePageModel' => new AdvicePage(),
       'pageLevelList' => $pageLevelList,
       'requestModel' => new Notification()
      ));
    }
  }

  public function actionMentorshipManagement($mentorshipId) {
    $mentorship = Mentorship::model()->findByPk($mentorshipId);
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('mentorship_manager_guest', array(
       'mentorships' => Mentorship::getAllMentorshipList(),
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile,
       'mentorship' => $mentorship)
      );
    } else {
      if ($mentorship->owner->id == Yii::app()->user->id) {
        $this->render('mentorship_management_owner', array(
         'mentorship' => $mentorship,
         'mentorshipsEnrolled' => Mentorship::getMentorships($mentorship->id),
         'mentorshipTypeName' => Mentorship::getMentorshipTypeName($mentorship->type),
         'mentorshipRequests' => Notification::getRequestStatus(array(Notification::$NOTIFICATION_MENTEE_REQUEST_OWNER, Notification::$NOTIFICATION_MENTOR_REQUEST_OWNER), $mentorship->id, null, true),
         'advicePages' => Page::getUserPages($mentorship->owner_id),
         'otherMentorships' => Mentorship::getOtherMentoringList($mentorship->owner_id, $mentorshipId),
         'requestModel' => new Notification(),
        ));
      } else {
        $this->render('mentorship_management_friend', array(
         'mentorship' => $mentorship,
         'mentorshipsEnrolled' => Mentorship::getMentorships($mentorship->id),
         'mentorshipTypeName' => Mentorship::getMentorshipTypeName($mentorship->type),
         'mentorshipRequests' => Notification::getRequestStatus(array(Notification::$NOTIFICATION_MENTEE_REQUEST_OWNER, Notification::$NOTIFICATION_MENTOR_REQUEST_OWNER), $mentorship->id, null, true),
         'advicePages' => Page::getUserPages($mentorship->owner_id),
         'otherMentorships' => Mentorship::getOtherMentoringList($mentorship->owner_id, $mentorshipId),
         'requestModel' => new Notification(),
        ));
      }
    }
  }

  public function actionMentorshipDetail($mentorshipId) {
    $mentorship = Mentorship::model()->findByPk($mentorshipId);
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      $mentorship = Mentorship::model()->findByPk($mentorshipId);
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('mentorship_detail_guest', array(
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile,
       'mentorshipModel' => $mentorship,
       'requestModel' => new Notification(),
       'mentorship' => $mentorship,
       'mentorshipMonitors' => MentorshipMonitor::getMentorshipMonitors($mentorshipId),
       'advicePages' => Page::getUserPages($mentorship->owner_id),
       'otherMentorships' => Mentorship::getOtherMentoringList($mentorship->owner_id, $mentorship->parent_mentorship_id),
       'mentorshipTimeline' => MentorshipTimeline::getMentorshipTimeline($mentorshipId),
       'people' => Profile::getPeople(false))
      );
    } else {
      $mentorshipTodoPriorities = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "level_name");
      $mentorshipType = Mentorship::viewerPrivilege($mentorshipId, Yii::app()->user->id);
      switch ($mentorshipType) {
        case Mentorship::$IS_OWNER:
        case Mentorship::$ENROLLED_MENTOR:
        case Mentorship::$ENROLLED_MENTEE:
          $bankSearchCriteria = ListBank::getListBankSearchCriteria(GoalType::$CATEGORY_SKILL, null, 400);
          $this->render('mentorship_detail', array(
           'mentorshipModel' => $mentorship,
           'skillModel' => new Goal(),
           'questionModel' => new Question(),
           'mentorshipQuestionModel' => new MentorshipQuestion(),
           'mentorshipAnswerModel' => new MentorshipAnswer(),
           'requestModel' => new Notification(),
           'announcementModel' => new Announcement(),
           'todoModel' => new Todo(),
           'mentorshipTodoPriorities' => $mentorshipTodoPriorities,
           'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
           'weblinkModel' => new Weblink(),
           'discussionModel' => new Discussion(),
           'discussionTitleModel' => new DiscussionTitle(),
           'mentorship' => $mentorship,
           'mentorshipMonitors' => MentorshipMonitor::getMentorshipMonitors($mentorshipId),
           'mentorshipType' => $mentorshipType,
           'advicePages' => Page::getUserPages($mentorship->owner_id),
           'otherMentorships' => Mentorship::getOtherMentoringList($mentorship->owner_id, $mentorship->parent_mentorship_id),
           'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
           'mentorshipTimeline' => MentorshipTimeline::getMentorshipTimeline($mentorshipId),
           "mentorshipTimelineModel" => new MentorshipTimeline(),
           'people' => Profile::getPeople(true),
           "timelineModel" => new Timeline(),
           'feedbackQuestions' => Mentorship::getFeedbackQuestions($mentorship, Yii::app()->user->id)
          ));
          break;
        case Mentorship::$IS_ENROLLED:
          $this->render('mentorship_detail_enrolled', array(
           'mentorshipModel' => $mentorship,
           'todoModel' => new Todo,
           'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
           'weblinkModel' => new Weblink(),
           'discussionTitleModel' => new DiscussionTitle(),
           'mentorship' => $mentorship,
           'advicePages' => Page::getUserPages($mentorship->owner_id),
           'otherMentorships' => Mentorship::getOtherMentoringList($mentorship->owner_id, $mentorshipId),
           'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
           'mentorshipTimeline' => MentorshipTimeline::getMentorshipTimeline($mentorshipId),
           "mentorshipTimelineModel" => new MentorshipTimeline(),
          ));
          break;
        case Mentorship::$IS_NOT_ENROLLED:
          $this->render('mentorship_detail_not_enrolled', array(
           'mentorshipModel' => $mentorship,
           'requestModel' => new Notification(),
           'mentorship' => $mentorship,
           'mentorshipMonitors' => MentorshipMonitor::getMentorshipMonitors($mentorshipId),
           'advicePages' => Page::getUserPages($mentorship->owner_id),
           'otherMentorships' => Mentorship::getOtherMentoringList($mentorship->owner_id, $mentorshipId),
           'mentorshipTimeline' => MentorshipTimeline::getMentorshipTimeline($mentorshipId),
           'people' => Profile::getPeople(true)
          ));
          break;
      }
    }
  }

  public function actionAddMentorship() {
    if (Yii::app()->request->isAjaxRequest) {
      $mentorshipModel = new Mentorship();
      if (isset($_POST['Mentorship'])) {
        $mentorshipModel->attributes = $_POST['Mentorship'];
        $mentorshipModel->person_chosen_id = $_POST['Mentorship']["person_chosen_id"];
        $mentorshipModel->owner_id = Yii::app()->user->id;
        if ($mentorshipModel->validate()) {
          $mentorshipModel->setMentorshipGoalList();
          if ($mentorshipModel->save(false)) {
            if (isset($_POST['gb-mentorship-share-with'])) {
              MentorshipShare::shareMentorship($mentorshipModel->id, $_POST['gb-mentorship-share-with']);
              Post::addPost($mentorshipModel->id, Post::$TYPE_MENTORSHIP, $mentorshipModel->privacy, $_POST['gb-mentorship-share-with']);
            } else {
              MentorshipShare::shareMentorship($mentorshipModel->id);
              Post::addPost($mentorshipModel->id, Post::$TYPE_MENTORSHIP, $mentorshipModel->privacy);
            }
            $mentorshipModel->setRequestMentorship();
            echo CJSON::encode(array(
             "success" => true,
             "redirect_url" => Yii::app()->createUrl("mentorship/mentorship/mentorshipManagement", array("mentorshipId" => $mentorshipModel->id)))
            );
          }
        } else {
          echo CActiveForm::validate($mentorshipModel);
          Yii::app()->end();
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAddMentorshipAnswer($mentorshipId, $questionId) {
    if (Yii::app()->request->isAjaxRequest) {
      $skillModel = new Goal();
      if (isset($_POST['Goal'])) {
        $skillModel->attributes = $_POST['Goal'];
        if ($skillModel->validate()) {
          if ($skillModel->save(false)) {
            $mentorshipQuestion = new MentorshipQuestion();
            $mentorshipQuestion->mentorship_id = $mentorshipId;
            $mentorshipQuestion->question_id = $questionId;
            if ($mentorshipQuestion->save(false)) {
              $answer = new MentorshipAnswer();
              $answer->questionee_id = Yii::app()->user->id;
              $answer->mentorship_id = $mentorshipId;
              $answer->mentorship_question_id = $mentorshipQuestion->id;
              $answer->mentorship_answer = $skillModel->description;
              $answer->goal_id = $skillModel->id;
              if ($answer->save(false)) {
                $mentorship = Mentorship::model()->findByPk($mentorshipId);
                $subgoal = new Subgoal();
                $subgoal->goal_id = $mentorship->goalList->goal_id;
                $subgoal->subgoal_id = $skillModel->id;
                $subgoal->type = Subgoal::$TYPE_MENTORSHIP;
                if ($subgoal->save(false)) {
                  echo CJSON::encode(array(
                   "success" => true,
                   "_post_row" => $this->renderPartial('mentorship.views.mentorship._answer_list_item'
                     , array("answer" => $answer)
                     , true)
                  ));
                }
              }
            }
          }
        } else {
          echo CActiveForm::validate($skillModel);
          Yii::app()->end();
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAddMentorshipAskQuestion($mentorshipId) {
    if (Yii::app()->request->isAjaxRequest) {
      $questionModel = new Question();
      if (isset($_POST['Question'])) {
        $questionModel->attributes = $_POST['Question'];
        if ($questionModel->validate()) {
          $questionModel->questioner_id = Yii::app()->user->id;
          $questionModel->type = Question::$TYPE_MENTORSHIP_ASK;
          if ($questionModel->save(false)) {
            $mentorshipQuestion = new MentorshipQuestion();
            $mentorshipQuestion->mentorship_id = $mentorshipId;
            $mentorshipQuestion->question_id = $questionModel->id;
            if ($mentorshipQuestion->save(false)) {
              echo CJSON::encode(array(
               "success" => true,
               "_post_row" => $this->renderPartial('mentorship.views.mentorship._mentorship_ask_question_list_item', array(
                'mentorshipQuestion' => $mentorshipQuestion,
                'mentorshipId' => $mentorshipId,
                 )
                 , true)
              ));
            }
          }
        } else {
          echo CActiveForm::validate($questionModel);
          Yii::app()->end();
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAddMentorshipAskAnswer($mentorshipId, $mentorshipQuestionId) {
    if (Yii::app()->request->isAjaxRequest) {
      $mentorshipAnswerModel = new MentorshipAnswer();
      if (isset($_POST['MentorshipAnswer'])) {
        $mentorshipAnswerModel->attributes = $_POST['MentorshipAnswer'];
        if ($mentorshipAnswerModel->validate()) {
          $mentorshipAnswerModel->questionee_id = Yii::app()->user->id;
          $mentorshipAnswerModel->mentorship_question_id = $mentorshipQuestionId;
          $mentorshipAnswerModel->mentorship_id = $mentorshipId;
          if ($mentorshipAnswerModel->save(false)) {
            echo CJSON::encode(array(
             "success" => true,
             "_post_row" => $this->renderPartial('mentorship.views.mentorship._mentorship_ask_answer_list_item', array(
              'mentorshipAnswer' => $mentorshipAnswerModel,
              'mentorshipId' => $mentorshipId,
               )
               , true)
            ));
          }
        } else {
          echo CActiveForm::validate($mentorshipAnswerModel);
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAddMentorshipAnnouncement($mentorshipId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Announcement'])) {
        $announcementModel = new Announcement();
        $announcementModel->attributes = $_POST['Announcement'];
        if ($announcementModel->validate()) {
          $announcementModel->announcer_id = Yii::app()->user->id;
          if ($announcementModel->save(false)) {
            $mentorshipAnnouncementModel = new MentorshipAnnouncement();
            $mentorshipAnnouncementModel->mentorship_id = $mentorshipId;
            $mentorshipAnnouncementModel->announcement_id = $announcementModel->id;
            if ($mentorshipAnnouncementModel->save(false)) {
              echo CJSON::encode(array(
               "success" => true,
               "_post_row" => $this->renderPartial('mentorship.views.mentorship._announcement_list_item'
                 , array("mentorshipAnnouncement" => $mentorshipAnnouncementModel)
                 , true)
                )
              );
            }
          }
        } else {
          echo CActiveForm::validate($announcementModel);
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAddMentorshipTimelineItem($mentorshipId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Timeline']) && isset($_POST['MentorshipTimeline'])) {
        $timelineModel = new Timeline();
        $mentorshipTimelineModel = new MentorshipTimeline();
        $timelineModel->attributes = $_POST['Timeline'];
        $mentorshipTimelineModel->attributes = $_POST['MentorshipTimeline'];
        if ($mentorshipTimelineModel->validate() && $timelineModel->validate()) {
          $timelineModel->assigner_id = Yii::app()->user->id;
          if ($timelineModel->save(false)) {
            $mentorshipTimelineModel->mentorship_id = $mentorshipId;
            $mentorshipTimelineModel->timeline_id = $timelineModel->id;
            $mentorshipTimelineModel->save(false);
            echo CJSON::encode(array(
             'success' => true,
             'data_source' => Type::$SOURCE_TIMELINE,
             'source_pk_id' => 0,
             '_post_row' => $this->renderPartial('mentorship.views.mentorship._mentorship_timeline_item_row', array(
              'mentorshipTimeline' => MentorshipTimeline::getMentorshipTimeline($mentorshipId),
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
  }

  public function actionAddMentorshipTodo($mentorshipId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Todo'])) {
        $todoModel = new Todo();
        $todoModel->attributes = $_POST['Todo'];
        if ($todoModel->validate()) {
          $todoModel->assigner_id = Yii::app()->user->id;
          $cdate = new DateTime('now');
          $todoModel->assigned_date = $cdate->format('Y-m-d h:m:i');
          if ($todoModel->save(false)) {
            $mentorshipTodoModel = new MentorshipTodo();
            $mentorshipTodoModel->mentorship_id = $mentorshipId;
            $mentorshipTodoModel->todo_id = $todoModel->id;
            $mentorshipTodoModel->save(false);
            echo CJSON::encode(array(
             "success" => true,
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
  }

  public function actionAddMentorshipWeblink($mentorshipId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Weblink'])) {
        $weblinkModel = new Weblink();
        $mentorshipWeblinkModel = new MentorshipWeblink();

        $weblinkModel->attributes = $_POST['Weblink'];
        if ($weblinkModel->validate()) {
          $weblinkModel->creator_id = Yii::app()->user->id;
          $cdate = new DateTime('now');
          $weblinkModel->created_date = $cdate->format('Y-m-d h:m:i');
          if ($weblinkModel->save(false)) {

            $mentorshipWeblinkModel->mentorship_id = $mentorshipId;
            $mentorshipWeblinkModel->weblink_id = $weblinkModel->id;
            if ($mentorshipWeblinkModel->save(false)) {
              echo CJSON::encode(array(
               "success" => true,
               '_post_row' => $this->renderPartial('mentorship.views.mentorship._mentorship_weblink_list_item', array(
                'mentorshipWeblinkModel' => $mentorshipWeblinkModel)
                 , true)
              ));
            }
          }
        } else {
          echo CActiveForm::validate($weblinkModel);
        }
      }

      Yii::app()->end();
    }
  }

  public function actionPostMentorshipDiscussionTitle($mentorshipId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['DiscussionTitle'])) {
        $discussionTitleModel = new DiscussionTitle();
        $mentorshipDiscussionTitle = new MentorshipDiscussionTitle();

        $discussionTitleModel->attributes = $_POST['DiscussionTitle'];
        if ($discussionTitleModel->validate()) {
          $discussionTitleModel->creator_id = Yii::app()->user->id;
          $cdate = new DateTime('now');
          $discussionTitleModel->created_date = $cdate->format('Y-m-d h:m:i');
          if ($discussionTitleModel->save(false)) {
            $mentorshipDiscussionTitle->mentorship_id = $mentorshipId;
            $mentorshipDiscussionTitle->discussion_title_id = $discussionTitleModel->id;
            if ($mentorshipDiscussionTitle->save(false)) {
              echo CJSON::encode(array(
               'success' => true,
               '_post_row' => $this->renderPartial('discussion.views.discussion._discussion_title', array(
                'discussionTitle' => $discussionTitleModel,
                'mentorshipId' => $mentorshipId)
                 , true)
              ));
            }
          }
        } else {
          echo CActiveForm::validate($discussionTitleModel);
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAcceptMentorshipEnrollment($mentorshipId) {
    if (Yii::app()->request->isAjaxRequest) {
      $menteeId = Yii::app()->request->getParam('mentee_id');
      $mentorshipEnrollment = MentorshipEnrolled::getMentee($mentorshipId, $menteeId);
      $mentorshipEnrollment->status = MentorshipEnrolled::$ENROLLED;
      $requestNotification = Notification::getNotification(Notification::$TYPE_MENTORSHIP_ENROLLMENT, $menteeId, $mentorshipId);
      $requestNotification->status = Notification::$STATUS_ACCEPTED;
      if ($mentorshipEnrollment->save(false)) {
        if ($requestNotification->save(false)) {
          
        }
      }
      echo CJSON::encode(array("mentee_id" => $menteeId,
       "mentee_badge" => $this->renderPartial('_mentee_badge', array(
        "mentee" => $mentorshipEnrollment, 'mentorshipId' => $mentorshipId,
         ), true),
       "mentee_badge_small" => $this->renderPartial('_mentee_badge_small', array(
        "mentee" => $mentorshipEnrollment
         ), true)));
      Yii::app()->end();
    }
  }

}
