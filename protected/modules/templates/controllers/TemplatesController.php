<?php

class TemplatesController extends Controller {

  public function actionTemplatesHome() {
    $this->render('templates_home', array(
     'todos' => SkillAssignment::getTodos(),
     'advicePages' => AdvicePage::Model()->findAll(),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
    ));
  }

}