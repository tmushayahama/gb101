<?php

class MentorshipController extends Controller {

  public function actionMentorshipHome() {
    $this->render('mentorship_home', array(
     'todos' => GoalAssignment::getTodos(),
     'mentorships' => Mentorship::getAllMentorshipList(),
     'mentorshipRequests' => RequestNotification::getRequestsNotifications(RequestNotification::$TYPE_MENTORSHIP, 10),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
    ));
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
    if ($mentorshipId == 0) {
      $goal = Goal::model()->findByPk($goalId);
      $mentorship = new Mentorship();
      $mentorship->goal_id = $goalId;
      $mentorship->owner_id = Yii::app()->user->id;
      $mentorship->title = $goal->title;
      $mentorship->mentoring_level = $mentoringLevel;
      if ($mentorship->save(false)) {
        Post::addPost($mentorship->id, Post::$TYPE_MENTORSHIP);
      }
    } else {
      $mentorship = Mentorship::model()->findByPk($mentorshipId);
    }
    $this->render('goal_mentorship_detail', array(
     'mentees' => MentorshipEnrolled::getMentee($mentorshipId),
     'todos' => GoalAssignment::getTodos(),
     'goalMentorship' => $mentorship,
     'advicePages' => Page::getUserPages($mentorship->owner_id),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
    ));
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

  public function actionMentorshipRequest() {
    if (Yii::app()->request->isAjaxRequest) {
      $message = Yii::app()->request->getParam('message');
      $goalId = Yii::app()->request->getParam('goal_id');
      $requestNotification = new RequestNotification();
      $requestNotification->from_id = Yii::app()->user->id;
      $requestNotification->message = $message;
      $requestNotification->notification_id = $goalId;
      $requestNotification->type = RequestNotification::$TYPE_MENTOR;
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

  public function actionAcceptMentorshipEnrollRequest() {
    if (Yii::app()->request->isAjaxRequest) {
      $message = Yii::app()->request->getParam('message');
      $goalId = Yii::app()->request->getParam('goal_id');
      $requestNotification = new GoalRequest();
      $requestNotification->from_id = Yii::app()->user->id;
      $requestNotification->message = $message;
      //$requestNotification->goal_id = $goalId;
      $requestNotification->type = GoalRequest ::$TYPE_MENTOR_ENROLLMENT;
      if ($requestNotification->save(false)) {
        
      }
      echo CJSON::encode(array(
       "description" => $requestNotification->id)
      );
      Yii::app()->end();
    }
  }

}
