<?php

class PagesController extends Controller {

  public function actionPagesHome() {
    $this->render('pages_home', array(
     'todos' => GoalAssignment::getTodos(),
     'pages' => Page::getPages(),
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
    if ($page->save(false)) {
      Post::addPost($page->id, Post::$TYPE_ADVICE_PAGE);
    }
    $this->render('goal_pages_form', array(
     'goal' => $goal,
     'page' => $page,
     'subgoalNumber' => $subgoalNumber,
    ));
  }

  public function actionSubmitGoalPageEntry($pageId, $goalId) {
    if (Yii::app()->request->isAjaxRequest) {
      $subgoalEntryTitle = Yii::app()->request->getParam('subgoal_entry_title');
      $subgoalEntryDescription = Yii::app()->request->getParam('subgoal_entry_description');

      $goal = new Goal();
      $goal->title = $subgoalEntryTitle;
      $goal->description = $subgoalEntryDescription;
      if ($goal->save(false)) {
        $page = Page::Model()->findByPk($pageId);
        $goalPage = new GoalPage();
        $goalPage->page_id = $page->id;
        $goalPage->goal_id = $goalId;
        $goalPage->subgoal_id = $goal->id;
        if ($goalPage->save(false)) {
          Post::addPost($goalPage->id, Post::$TYPE_ADVICE_PAGE);
        }
      }
      echo CJSON::encode(array(
// "monitor" =>);
      ));
      Yii::app()->end();
    }
  }

  public function actionGoalPageDetail($pageId) {
    $this->render('goal_page_detail', array(
     'todos' => GoalAssignment::getTodos(),
     'page' => Page::model()->findByPk($pageId),
     'subgoals' => GoalPage::getSubgoal($pageId),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
    ));
  }

}
