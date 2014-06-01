<?php

class JournalController extends Controller
{
	public function actionJournalHome() {
    $this->render('journal_home', array(
     'todos' => GoalAssignment::getTodos(),
     'advicePages' => AdvicePage::Model()->findAll(),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
    ));
  }
}