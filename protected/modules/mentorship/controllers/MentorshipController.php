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
       'mentorshipRequests' => RequestNotification::getRequestNotifications(RequestNotification::$TYPE_MENTORSHIP_REQUEST, 10, true),
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
      $mentorshipModel = new Mentorship();
      $skillGainedList = CHtml::listData(GoalList::getGoalList(null, Yii::app()->user->id, null, array(Level::$LEVEL_SKILL_GAINED, Level::$LEVEL_SKILL_TO_IMPROVE)), "id", "goal.title");
      $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "level_name");

      $this->render('mentorship_home', array(
       'mentorshipModel' => $mentorshipModel,
       'mentoringList' => Mentorship::getMentoringList(),
       'todos' => GoalAssignment::getTodos(),
       'mentorships' => Mentorship::getAllMentorshipList(),
       'mentorshipLevelList' => $mentorshipLevelList,
       'skillGainedList' => $skillGainedList,
       'mentorshipRequests' => RequestNotification::getRequestNotifications(RequestNotification::$TYPE_MENTORSHIP_REQUEST, 10),
       'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
      ));
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
      $this->render('goal_mentorship_detail_guest', array(
       'mentees' => MentorshipEnrolled::getMentees($mentorshipId),
       'goalMentorship' => $mentorship,
       'advicePages' => Page::getUserPages($mentorship->owner_id),
       'otherMentorships' => Mentorship::getOtherMentoringList($mentorship->owner_id, $mentorshipId),
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'mentorshipTimeline' => MentorshipTimeline::getMentorshipTimeline($mentorshipId),
       'profile' => $profile)
      );
    } else {
      $todoModel = new Todo;
      $timelineModel = new Timeline();
      $mentorshipTimelineModel = new MentorshipTimeline();
      $webLinkModel = new WebLink();
      $discussionTitleModel = new DiscussionTitle();
      $announcemetModel = new Announcement();

      switch (Mentorship::viewerPrivilege($mentorshipId, Yii::app()->user->id)) {
        case Mentorship::$IS_OWNER:
          $bankSearchCriteria = ListBank::getListBankSearchCriteria(GoalType::$CATEGORY_SKILL, null, 400);
          $this->render('goal_mentorship_detail', array(
           'mentorshipModel' => $mentorship,
           'skillModel' => new Goal(),
           'announcementModel' => $announcemetModel,
           'mentees' => MentorshipEnrolled::getMentees($mentorshipId),
           'todoModel' => $todoModel,
           'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
           'todos' => GoalAssignment::getTodos(),
           'webLinkModel' => $webLinkModel,
           'discussionTitleModel' => $discussionTitleModel,
           'goalMentorship' => $mentorship,
           'advicePages' => Page::getUserPages($mentorship->owner_id),
           'otherMentorships' => Mentorship::getOtherMentoringList($mentorship->owner_id, $mentorshipId),
           'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
           'mentorshipTimeline' => MentorshipTimeline::getMentorshipTimeline($mentorshipId),
           "mentorshipTimelineModel" => $mentorshipTimelineModel,
           "timelineModel" => $timelineModel
          ));
          break;
        case Mentorship::$IS_ENROLLED:
          $this->render('goal_mentorship_detail_enrolled', array(
           'mentorshipModel' => $mentorship,
           'todoModel' => $todoModel,
           'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
           'todos' => GoalAssignment::getTodos(),
           'webLinkModel' => $webLinkModel,
           'discussionTitleModel' => $discussionTitleModel,
           'goalMentorship' => $mentorship,
           'advicePages' => Page::getUserPages($mentorship->owner_id),
           'otherMentorships' => Mentorship::getOtherMentoringList($mentorship->owner_id, $mentorshipId),
           'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
           'mentorshipTimeline' => MentorshipTimeline::getMentorshipTimeline($mentorshipId),
           "mentorshipTimelineModel" => $mentorshipTimelineModel,
          ));
          break;
        case Mentorship::$IS_NOT_ENROLLED:
          $bankSearchCriteria = ListBank::getListBankSearchCriteria(GoalType::$CATEGORY_SKILL, null, 400);
          $todoModel = new Todo;
          $timelineModel = new Timeline();
          $mentorshipTimelineModel = new MentorshipTimeline();
          $webLinkModel = new WebLink();
          $discussionTitleModel = new DiscussionTitle();

          $mentorship = Mentorship::model()->findByPk($mentorshipId);

          $this->render('goal_mentorship_detail_not_enrolled', array(
           'mentorshipModel' => $mentorship,
           'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
           'todos' => GoalAssignment::getTodos(),
           'goalMentorship' => $mentorship,
           'advicePages' => Page::getUserPages($mentorship->owner_id),
           'otherMentorships' => Mentorship::getOtherMentoringList($mentorship->owner_id, $mentorshipId),
           'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
           'mentorshipTimeline' => MentorshipTimeline::getMentorshipTimeline($mentorshipId),
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
        $mentorshipModel->owner_id = Yii::app()->user->id;
        if ($mentorshipModel->validate()) {
          if ($mentorshipModel->save(false)) {
            Post::addPost($mentorshipModel->id, Post::$TYPE_MENTORSHIP);
            echo CJSON::encode(array(
             "success" => true,
             "mentorshipId" => $mentorshipModel->id)
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

  public function actionEditMentorshipDetails($mentorshipId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Mentorship'])) {
        $mentorshipModel = Mentorship::model()->findByPk($mentorshipId);
        $mentorshipModel->attributes = $_POST['Mentorship'];
        $mentorshipModel->save(false);
        echo CJSON::encode(array(
         "description" => $mentorshipModel->description,
         "title" => $mentorshipModel->title)
        );
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
            $answer = new MentorshipQuestion();
            $answer->mentorship_id = $mentorshipId;
            $answer->question_id = $questionId;
            $answer->description = $skillModel->description;
            $answer->goal_id = $skillModel->id;
            if ($answer->save(false)) {
              $mentorship = Mentorship::model()->findByPk($mentorshipId);
              $subgoal = new Subgoal();
              $subgoal->goal_id = $mentorship->goal_id;
              $subgoal->subgoal_id = $skillModel->id;
              $subgoal->type = Subgoal::$TYPE_MENTORSHIP;
              if ($subgoal->save(false)) {
                echo CJSON::encode(array(
                 "success" => true,
                 "question_id" => $questionId,
                 "_answer_list_item" => $this->renderPartial('mentorship.views.mentorship._answer_list_item'
                   , array("answer" => $answer)
                   , true)
                ));
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

  public function actionEditMentorshipAnswer($answerId) {
    if (Yii::app()->request->isAjaxRequest) {
      $answer = MentorshipQuestion::model()->findByPk($answerId);
      $skillModel = Goal::model()->findByPk($answer->goal_id);
      if (isset($_POST['Goal'])) {
        $skillModel->attributes = $_POST['Goal'];
        if ($skillModel->validate()) {
          if ($skillModel->save(false)) {
            $answer->description = $skillModel->description;
            if ($answer->save(false)) {
              echo CJSON::encode(array(
               "success" => true,
               "answer_id" => $answerId,
               "_answer_list_item" => $this->renderPartial('mentorship.views.mentorship._answer_list_item'
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
  }

  public function actionAddMentorshipAnnouncement($mentorshipId) {
    if (Yii::app()->request->isAjaxRequest) {
      $title = Yii::app()->request->getParam('title');
      $description = Yii::app()->request->getParam('description');
      $mentorshipAnnouncement = new MentorshipAnnouncement();

      $announcement = new Announcement();
      $announcement->announcer_id = Yii::app()->user->id;
      $announcement->title = $title;
      $announcement->description = $description;
      $announcement->save(false);

      $mentorshipAnnouncement->mentorship_id = $mentorshipId;
      $mentorshipAnnouncement->announcement_id = $announcement->id;
      $mentorshipAnnouncement->save(false);

      echo CJSON::encode(array(
       "_announcement_list_item" => $this->renderPartial('mentorship.views.mentorship._announcement_list_item'
         , array("mentorshipAnnouncement" => $mentorshipAnnouncement)
         , true)
        )
      );
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

            $timelineDay = $mentorshipTimelineModel->day;
            echo CJSON::encode(array(
             'success' => true,
             'timelineDay' => $timelineDay,
             '_mentorship_timeline_item_row' => $this->renderPartial('mentorship.views.mentorship._mentorship_timeline_item_row', array(
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

  public function actionEditMentorshipTimelineItem($mentorshipId, $mentorshipTimelineId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Timeline']) && isset($_POST['MentorshipTimeline'])) {
        $mentorshipTimelineModel = MentorshipTimeline::model()->findByPk($mentorshipTimelineId);
        $timelineModel = Timeline::model()->findByPk($mentorshipTimelineModel->timeline_id);
        $timelineModel->attributes = $_POST['Timeline'];
        $mentorshipTimelineModel->attributes = $_POST['MentorshipTimeline'];
        if ($mentorshipTimelineModel->validate() && $timelineModel->validate()) {
          if ($timelineModel->save(false)) {
            $mentorshipTimelineModel->save(false);

            $timelineDay = $mentorshipTimelineModel->day;
            echo CJSON::encode(array(
             'success' => true,
             'timelineDay' => $timelineDay,
             '_mentorship_timeline_item_row' => $this->renderPartial('mentorship.views.mentorship._mentorship_timeline_item_row', array(
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
// if ($todoModel->validate()) {
        // form inputs are valid, do something here
        $todoModel->category_id = 1;
        $todoModel->assigner_id = Yii::app()->user->id;
        $cdate = new DateTime('now');
        $todoModel->assigned_date = $cdate->format('Y-m-d h:m:i');
        $todoModel->save(false);
        $mentorshipTodo = new MentorshipTodo();
        $mentorshipTodo->mentorship_id = $mentorshipId;
        $mentorshipTodo->todo_id = $todoModel->id;
        $mentorshipTodo->save(false);
// }
      }
      echo CJSON::encode(array(
       "_mentorship_todo_list_item" => $this->
         renderPartial('mentorship.views.mentorship._mentorship_todo_list_item'
           , array("mentorshipTodo" => $mentorshipTodo)
           , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionPostMentorshipDiscussionTitle($mentorshipId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['DiscussionTitle'])) {
        $discussionTitleModel = new DiscussionTitle();
        $mentorshipDiscussionTitle = new MentorshipDiscussionTitle();

        $discussionTitleModel->attributes = $_POST['DiscussionTitle'];
// if ($todoModel->validate()) {
        $discussionTitleModel->creator_id = Yii::app()->user->id;
        $cdate = new DateTime('now');
        $discussionTitleModel->created_date = $cdate->format('Y-m-d h:m:i');
        $discussionTitleModel->save(false);

        $mentorshipDiscussionTitle->mentorship_id = $mentorshipId;
        $mentorshipDiscussionTitle->discussion_title_id = $discussionTitleModel->id;
        $mentorshipDiscussionTitle->save(false);
// }
      }
      echo CJSON::encode(array(
       '_discussion_title' => $this->
         renderPartial('discussion.views.discussion._discussion', array(
          'discussionTitle' => $discussionTitleModel)
           , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionAddMentorshipWebLink($mentorshipId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['WebLink'])) {
        $webLink = new WebLink();
        $mentorshipWebLink = new MentorshipWebLink();

        $webLink->attributes = $_POST['WebLink'];
// if ($todoModel->validate()) {
        $webLink->creator_id = Yii::app()->user->id;
        $cdate = new DateTime('now');
        $webLink->created_date = $cdate->format('Y-m-d h:m:i');
        $webLink->save(false);

        $mentorshipWebLink->mentorship_id = $mentorshipId;
        $mentorshipWebLink->web_link_id = $webLink->id;
        $mentorshipWebLink->save(false);
// }
      }
      echo CJSON::encode(array(
       '_web_link_list_item' => $this->renderPartial('application.views.weblink._web_link_list_item', array(
        'webLink' => $webLink)
         , true)
      ));
      Yii::app()->end();
    }
  }

  public function actionMentorshipRequest() {
    if (Yii::app()->request->isAjaxRequest) {
      $message = Yii::app()->request->getParam('message');
      $goalId = Yii::app()->request->getParam('goal_id');
      $requestNotification = new RequestNotification();
      $requestNotification->from_id = Yii::app()->user->id;
      $requestNotification->message = $message;
      $requestNotification->notification_id = $goalId;
      $requestNotification->type = RequestNotification::$TYPE_MENTORSHIP_REQUEST;
      if ($requestNotification->save(false)) {
        Post::addPost($requestNotification->id, Post::$TYPE_MENTORSHIP_REQUEST);
      }
      echo CJSON::encode(array(
       "description" => $requestNotification->id)
      );
      Yii::app()->end();
    }
  }

  public function actionMentorshipEnrollRequest() {
    if (Yii::app()->request->isAjaxRequest) {
      $message = Yii::app()->request->getParam('message');
      $mentorshipId = Yii::app()->request->getParam('mentorship_id');
      $requestNotification = new RequestNotification ();
      $mentorshipEnroll = new MentorshipEnrolled();
      $mentorshipEnroll->mentee_id = Yii::app()->user->id;
      $mentorshipEnroll->mentorship_id = $mentorshipId;
      if ($mentorshipEnroll->save(false)) {
        $requestNotification->from_id = Yii::app()->user->id;
        $requestNotification->message = $message;
        $requestNotification->notification_id = $mentorshipId;
        $requestNotification->type = RequestNotification ::$TYPE_MENTORSHIP_ENROLLMENT;
        if ($requestNotification->save(false)) {
          
        }
      }
      echo CJSON::encode(array(
       "mentorship_id" => $mentorshipId)
      );
      Yii::app()->end();
    }
  }

  public function actionAcceptMentorshipEnrollment($mentorshipId) {
    if (Yii::app()->request->isAjaxRequest) {
      $menteeId = Yii::app()->request->getParam('mentee_id');
      $mentorshipEnrollment = MentorshipEnrolled::getMentee($mentorshipId, $menteeId);
      $mentorshipEnrollment->status = MentorshipEnrolled::$ENROLLED;
      $requestNotification = RequestNotification::getRequestNotification(RequestNotification::$TYPE_MENTORSHIP_ENROLLMENT, $menteeId, $mentorshipId);
      $requestNotification->status = RequestNotification::$STATUS_ACCEPTED;
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
