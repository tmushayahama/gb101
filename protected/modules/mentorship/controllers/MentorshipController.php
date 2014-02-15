<?php

class MentorshipController extends Controller {

  public function actionMentorshipHome() {
    $this->render('mentorship_home', array(
     'todos' => GoalAssignment::getTodos(),
     'mentorships' => Mentorship::getAllMentorshipList(),
     'mentorshipRequests' => GoalRequest::getGoalRequests(GoalRequest::$TYPE_MENTOR),
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
      $goalRequest = new GoalRequest();
      $goalRequest->requester_id = Yii::app()->user->id;
      $goalRequest->message = $message;
      $goalRequest->goal_id = $goalId;
      $goalRequest->type = GoalRequest::$TYPE_MENTOR;
      if ($goalRequest->save(false)) {
        Post::addPost($goalRequest->id, Post::$TYPE_MENTORSHIP_REQUEST);
      }
      echo CJSON::encode(array(
       "description" => $goalRequest->id)
      );
      Yii::app()->end();
    }
  }

}
