<?php

class PagesController extends Controller {

  public function actionPagesHome() {
    $this->render('pages_home', array(
     'todos' => GoalAssignment::getTodos(),
     'goalPages' => GoalPage::Model()->findAll(),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
    ));
  }
  public function actionGoalPagesForm($goal, $goalNumber) {
   $this->render('goal_pages_form', array(
     
     'goal'=>$goal,
     'goalNumber'=>$goalNumber,
     'goalPages' => GoalPage::Model()->findAll(),
    ));
  }

}