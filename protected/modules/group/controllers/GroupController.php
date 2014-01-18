<?php

class GroupController extends Controller {

  public function actionGroupHome() {
    $this->render('group_home', array(
     'todos' => GoalAssignment::getTodos(),
     'goalPages' => GoalPage::Model()->findAll(),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
    ));
  }
  

}