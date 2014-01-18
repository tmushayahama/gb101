<?php

class MentorshipController extends Controller
{
	public function actionMentorshipHome() {
    $this->render('mentorship_home', array(
     'todos' => GoalAssignment::getTodos(),
     'goalPages' => GoalPage::Model()->findAll(),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
    ));
  }
}