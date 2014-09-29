<?php

class JournalController extends Controller
{
	public function actionJournalHome() {
    $this->render('journal_home', array(
     'todos' => SkillAssignment::getTodos(),
     'advicePages' => AdvicePage::Model()->findAll(),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
    ));
  }
}