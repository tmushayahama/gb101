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

  public function actionAddAdvicePageSubgoal($advicePageId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Goal'])) {
        $goalModel = new Goal();
        $goalModel->attributes = $_POST['Goal'];
        if ($goalModel->validate()) {
          if ($goalModel->save(false)) {
            $advicePageSubgoalModel = new AdvicePageSubgoal();
            $advicePageSubgoalModel->advice_page_id = $advicePageId;
            $advicePageSubgoalModel->subgoal_id = $goalModel->id;
            if ($advicePageSubgoalModel->save(false)) {
              echo CJSON::encode(array(
               "success" => true,
               "_advice_page_subgoal_row" => $this->renderPartial('pages.views.pages._advice_page_subgoal_row', array(
                'subgoal' => $advicePageSubgoalModel,
                'count'=>'1')
                 , true)
              ));
            }
          }
        } else {
          echo CActiveForm::validate($goalModel);
        }
      }
      Yii::app()->end();
    }
  }

  public
    function actionAdvicePageDetail($advicePageId) {
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('goal_page_detail_guest', array(
       'advicePage' => AdvicePage::model()->findByPk($advicePageId),
       'subgoals' => AdvicePageSubgoal::getSubgoal($advicePageId),
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
      $this->render('goal_page_detail', array(
       'goalModel' => new Goal(),
       'todos' => GoalAssignment::getTodos(),
       'advicePage' => AdvicePage::model()->findByPk($advicePageId),
       'subgoals' => AdvicePageSubgoal::getSubgoal($advicePageId),
       'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
      ));
    }
  }

  public
    function actionAddAdvicePage() {
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
