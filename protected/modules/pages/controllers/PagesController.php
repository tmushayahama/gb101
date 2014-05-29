<?php

class PagesController extends Controller {

  public function actionPagesHome() {
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('pages_home_guest', array(
       'pages' => Page::getPages(),
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
      $this->render('pages_home', array(
       'todos' => GoalAssignment::getTodos(),
       'pages' => Page::getPages(),
       'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
      ));
    }
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
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('goal_page_detail_guest', array(
       'page' => Page::model()->findByPk($pageId),
       'subgoals' => GoalPage::getSubgoal($pageId),
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
      $this->render('goal_page_detail', array(
       'todos' => GoalAssignment::getTodos(),
       'page' => Page::model()->findByPk($pageId),
       'subgoals' => GoalPage::getSubgoal($pageId),
       'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
      ));
    }
  }

  public function actionAddAdvicePage() {
    if (Yii::app()->request->isAjaxRequest) {
      $pageModel = new Page();
      $advicePageModel = new AdvicePage();
      if (isset($_POST['Page']) && isset($_POST['AdvicePage'])) {
        $pageModel->attributes = $_POST['Page'];
        $advicePageModel->attributes = $_POST['AdvicePage'];
        if ($pageModel->validate() && $advicePageModel->validate()) {
          $pageModel->owner_id = Yii::app()->user->id;
          if ($pageModel->save(false)) {
            $goalModel = new Goal();
            $goalModel->title = $pageModel->title;
            $goalModel->description = $pageModel->description;
            if ($goalModel->save(false)) {
              $advicePageModel->page_id = $pageModel->id;
              $advicePageModel->goal_id = $goalModel->id;
              if ($advicePageModel->save(false)) {
                Post::addPost($advicePageModel->id, Post::$TYPE_ADVICE_PAGE);
                echo CJSON::encode(array(
                 "success" => true,
                 "advicePageId" => $advicePageModel->id)
                );
              }
            }
          }
        } else {
          echo CActiveForm::validate(array($pageModel, $advicePageModel));
        }
      }
      Yii::app()->end();
    }
  }

}
