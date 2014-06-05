<?php

class PagesController extends Controller {

  public function actionPagesHome() {
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('pages_home_guest', array(
       'advicePages' => AdvicePage::getAdvicePages(),
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
      $pageModel = new Page();
      $advicePageModel = new AdvicePage();
      $pageLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE_PAGE), "id", "level_name");
      $this->render('pages_home', array(
       'pageModel' => $pageModel,
       'advicePageModel' => $advicePageModel,
       'pageLevelList' => $pageLevelList,
       'todos' => GoalAssignment::getTodos(),
       'advicePages' => AdvicePage::getAdvicePages(),
       'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
      ));
    }
  }

  public function actionAddAdvicePageSubgoal($advicePageId) {
    if (Yii::app()->request->isAjaxRequest) {
      if ((isset($_POST['Goal']))) {
        $skillModel = new Goal();
        $skillListModel = new GoalList();
        $skillModel->attributes = $_POST['Goal'];
        if ($skillModel->validate()) {
          if ($skillModel->save(false)) {
            $advicePageSubgoalModel = new AdvicePageSubgoal();
            $skillListModel->type_id = 1; //temp
            $skillListModel->user_id = Yii::app()->user->id;
            $skillListModel->goal_id = $skillModel->id;
            $skillListModel->level_id = Level::$LEVEL_SKILL_OTHER;
            if ($skillListModel->save(false)) {
              $advicePageSubgoalModel->advice_page_id = $advicePageId;
              $advicePageSubgoalModel->subgoal_list_id = $skillListModel->id;
              if ($advicePageSubgoalModel->save(false)) {
                echo CJSON::encode(array(
                 "success" => true,
                 "_skill_list_post_row" => $this->renderPartial('skill.views.skill._skill_list_post_row', array(
                  'skillListItem' => $skillListModel,
                  'source' => GoalList::$SOURCE_ADVICE_PAGE)
                   , true)
                ));
              }
            }
          }
        } else {
          echo CActiveForm::validate($skillModel);
        }
      }
      Yii::app()->end();
    }
  }

  public function actionEditAdvicePageSubgoal($goalListId) {
    if (Yii::app()->request->isAjaxRequest) {
      $skillListModel = GoalList::model()->findByPk($goalListId);
      $skillModel = Goal::model()->findByPk($skillListModel->goal_id);
      if ((isset($_POST['Goal']))) {
        $skillModel->attributes = $_POST['Goal'];
        if ($skillModel->validate()) {
          if ($skillModel->save(false)) {
            if ($skillListModel->save(false)) {
              echo CJSON::encode(array(
               "success" => true,
               "goal_list_id" => $skillListModel->id,
               "_skill_list_post_row" => $this->renderPartial('skill.views.skill._skill_list_post_row', array(
                'skillListItem' => $skillListModel,
                'source' => GoalList::$SOURCE_ADVICE_PAGE)
                 , true)
              ));
            }
          }
        } else {
          echo CActiveForm::validate($skillModel);
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAdvicePageDetail($advicePageId) {
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
      $advicePage = AdvicePage::model()->findByPk($advicePageId);
      $skillLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "level_name");
      $bankSearchCriteria = ListBank::getListBankSearchCriteria(GoalType::$CATEGORY_SKILL, null, 100);
      $page = Page::model()->findByPk($advicePage->page_id);
      $pageLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE_PAGE), "id", "level_name");

      $this->render('goal_page_detail', array(
       'skillModel' => new Goal(),
       'skillListModel' => new GoalList(),
       'skillLevelList' => $skillLevelList,
       'skillListShare' => new GoalListShare,
       'todos' => GoalAssignment::getTodos(),
       'advicePage' => $advicePage,
       'pageLevelList' => $pageLevelList,
       'page' => $page,
       'subgoals' => AdvicePageSubgoal::getSubgoal($advicePageId),
       'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
       'skillListBank' => ListBank::model()->findAll($bankSearchCriteria)
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
              $goalListModel = new GoalList();
              $goalListModel->type_id = 1; //temp
              $goalListModel->user_id = Yii::app()->user->id;
              $goalListModel->goal_id = $goalModel->id;
              $goalListModel->level_id = Level::$LEVEL_SKILL_OTHER;
              if ($goalListModel->save(false)) {
                $advicePageModel->page_id = $pageModel->id;
                $advicePageModel->goal_list_id = $goalListModel->id;
                if ($advicePageModel->save(false)) {
                  Post::addPost($advicePageModel->id, Post::$TYPE_ADVICE_PAGE);
                  echo CJSON::encode(array(
                   "success" => true,
                   "advicePageId" => $advicePageModel->id)
                  );
                }
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

  public function actionEditAdvicePage($advicePageId) {
    if (Yii::app()->request->isAjaxRequest) {
      $advicePageModel = AdvicePage::model()->findByPk($advicePageId);
      $pageModel = Page::model()->findByPk($advicePageModel->page_id);
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
              $goalListModel = new GoalList();
              $goalListModel->type_id = 1; //temp
              $goalListModel->user_id = Yii::app()->user->id;
              $goalListModel->goal_id = $goalModel->id;
              $goalListModel->level_id = Level::$LEVEL_SKILL_OTHER;
              if ($goalListModel->save(false)) {
                $advicePageModel->page_id = $pageModel->id;
                $advicePageModel->goal_list_id = $goalListModel->id;
                if ($advicePageModel->save(false)) {
                  echo CJSON::encode(array(
                   "success" => true,
                   "title" => $advicePageModel->subgoals . " " . $advicePageModel->level->level_name . " " . $advicePageModel->goalList->goal->title,
                   "description" => $advicePageModel->page->description)
                  );
                }
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
