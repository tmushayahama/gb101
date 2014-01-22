<?php

class MentorshipController extends Controller {

  public function actionMentorshipHome() {
    $this->render('mentorship_home', array(
     'todos' => GoalAssignment::getTodos(),
     'mentorships' => Mentorship::getAllMentorshipList(),
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

  public function actionMentorshipDetail($mentorshipId, $mentoringLevel=null, $goalId=null) {
    $mentorship = null;
    if ($mentorshipId == 0) {
      $goal = Goal::model()->findByPk($goalId);
      $mentorship = new Mentorship();
      $mentorship->goal_id = $goalId;
      $mentorship->owner_id = Yii::app()->user->id;
      $mentorship->title = $goal->title;
      $mentorship->mentoring_level=$mentoringLevel;
      $mentorship->save(false);
    } else {
      $mentorship = Mentorship::model()->findByPk($mentorshipId);
    }
    $this->render('goal_mentorship_detail', array(
     'todos' => GoalAssignment::getTodos(),
     'goalMentorship' => $mentorship,
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
    ));
  }

}
