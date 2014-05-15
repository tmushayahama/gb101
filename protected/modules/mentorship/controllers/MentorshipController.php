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
      $this->render('mentorship_home', array(
       'todos' => GoalAssignment::getTodos(),
       'mentorships' => Mentorship::getAllMentorshipList(),
       'mentorshipRequests' => RequestNotification::getRequestNotifications(RequestNotification::$TYPE_MENTORSHIP_REQUEST, 10),
       'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
      ));
    }
  }

  public function actionGoalPagesForm($goalTitle, $subgoalNumber) {
    $goal = new Goal();
    $goal->title = $goalTitle;
    $goal->save(false);
    $page = new Page();
    $page->owner_id = Yii::app()->user->id;
    $page->title = $subgoalNumber . " skills you need to " . $goalTitle;
    $page->save(false);
    $this->render('goal_pages_form', array(
     'goal' => $goal,
     'page' => $page,
     'subgoalNumber' => $subgoalNumber,
    ));
  }

  public function actionMentorshipDetail($mentorshipId, $mentoringLevel = null, $goalId = null) {
    $mentorship = null;
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      $mentorship = Mentorship::model()->findByPk($mentorshipId);
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('goal_mentorship_detail_guest', array(
       'goalMentorship' => $mentorship,
       'advicePages' => Page::getUserPages($mentorship->owner_id),
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
      $bankSearchCriteria = ListBank::getListBankSearchCriteria(GoalType::$CATEGORY_SKILL, null, 400);
      if ($mentorshipId == 0) {
        $goal = Goal::model()->findByPk($goalId);
        $mentorship = new Mentorship();
        $mentorship->goal_id = $goalId;
        $mentorship->owner_id = Yii::app()->user->id;
        // $mentorship->title = $goal->title;
        $mentorship->mentoring_level = $mentoringLevel;
        if ($mentorship->save(false)) {
          Post::addPost($mentorship->id, Post::$TYPE_MENTORSHIP);
        }
      } else {
        $mentorship = Mentorship::model()->findByPk($mentorshipId);
      }
      $this->render('goal_mentorship_detail', array(
       'mentees' => MentorshipEnrolled::getMentees($mentorshipId),
       'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
       'todos' => GoalAssignment::getTodos(),
       'goalMentorship' => $mentorship,
       'advicePages' => Page::getUserPages($mentorship->owner_id),
       'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
      ));
    }
  }

  public function actionEditDetail() {
    if (Yii::app()->request->isAjaxRequest) {
      $description = Yii::app()->request->getParam('description');
      $mentorshipId = Yii::app()->request->getParam('mentorship_id');
      $mentorship = Mentorship::model()->findByPk($mentorshipId);
      $mentorship->description = $description;
      $mentorship->save(false);
      echo CJSON::encode(array(
       "description" => $mentorship->description)
      );
      Yii::app()->end();
    }
  }

  public function actionAddMentorshipAnswer($mentorshipId) {
    if (Yii::app()->request->isAjaxRequest) {
      $title = Yii::app()->request->getParam('title');
      $questionId = Yii::app()->request->getParam('question_id');
      $description = Yii::app()->request->getParam('description');
      $goalId = Yii::app()->request->getParam('goal_id');
      $mentorship = Mentorship::model()->findByPk($mentorshipId);
      $answer = new MentorshipQuestion();

      if ($goalId == null) {
        $goal = new Goal();
        $goal->title = $title;
        $goal->description = $description;
        $goal->save(false);
        $goalId = $goal->id;
      }
      $answer->mentorship_id = $mentorshipId;
      $answer->question_id = $questionId;
      $answer->description = $description;
      $answer->goal_id = $goalId;
      $answer->save(false);

      $subgoal = new Subgoal();
      $subgoal->goal_id = $mentorship->goal_id;
      $subgoal->subgoal_id = $goalId;
      $subgoal->type = Subgoal::$TYPE_MENTORSHIP;
      $subgoal->save(false);

      echo CJSON::encode(array(
       "question_id" => $questionId,
       "_answer_list_item" => $this->renderPartial('mentorship.views.mentorship._answer_list_item'
         , array("answer" => $answer)
         , true)
        )
      );
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
      $requestNotification = new RequestNotification();
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
      echo CJSON::encode(array(
       "mentee_id" => $menteeId,
       "mentee_badge" => $this->renderPartial('_mentee_badge', array(
        "mentee" => $mentorshipEnrollment,
        'mentorshipId' => $mentorshipId,
         ), true),
       "mentee_badge_small" => $this->renderPartial('_mentee_badge_small', array(
        "mentee" => $mentorshipEnrollment
         ), true)));
      Yii::app()->end();
    }
  }

}
