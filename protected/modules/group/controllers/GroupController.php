<?php

class GroupController extends Controller {

  public function actionGroupHome() {
    $this->render('group_home', array(
     'todos' => SkillAssignment::getTodos(),
     'advicePages' => AdvicePage::Model()->findAll(),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
    ));
  }
  

}