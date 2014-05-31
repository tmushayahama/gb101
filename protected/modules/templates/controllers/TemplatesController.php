<?php

class TemplatesController extends Controller {

  public function actionTemplatesHome() {
    $this->render('templates_home', array(
     'todos' => GoalAssignment::getTodos(),
     'goalPages' => AdvicePage::Model()->findAll(),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
    ));
  }

}