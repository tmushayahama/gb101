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
      $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "level_name");
      $pageLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE_PAGE), "id", "level_name");
      $this->render('pages_home', array(
       'people' => Profile::getPeople(true),
       'mentorshipLevelList' => $mentorshipLevelList,
       'mentorshipModel' => new Mentorship(),
       'pageModel' => $pageModel,
       'advicePageModel' => $advicePageModel,
       'pageLevelList' => $pageLevelList,
       'advicePages' => AdvicePage::getAdvicePages(),
       'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
      ));
    }
  }

  public function actionAddAdvicePageSubskill($advicePageId) {
    if (Yii::app()->request->isAjaxRequest) {
      if ((isset($_POST['Skill']))) {
        $skillModel = new Skill();
        $skillListModel = new SkillList();
        $skillModel->attributes = $_POST['Skill'];
        if ($skillModel->validate()) {
          if ($skillModel->save(false)) {
            $advicePageSubskillModel = new AdvicePageSubskill();
            $skillListModel->type_id = 1; //temp
            $skillListModel->user_id = Yii::app()->user->id;
            $skillListModel->skill_id = $skillModel->id;
            $skillListModel->level_id = Level::$LEVEL_SKILL_OTHER;
            if ($skillListModel->save(false)) {
              $advicePageSubskillModel->advice_page_id = $advicePageId;
              $advicePageSubskillModel->subskill_list_id = $skillListModel->id;
              if ($advicePageSubskillModel->save(false)) {
                echo CJSON::encode(array(
                 "success" => true,
                 "_post_row" => $this->renderPartial('skill.views.skill._skill_list_post_row', array(
                  'skillListItem' => $skillListModel,
                  'source' => SkillList::$SOURCE_ADVICE_PAGE)
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

  public function actionEditAdvicePageSubskill($skillListId) {
    if (Yii::app()->request->isAjaxRequest) {
      $skillListModel = SkillList::model()->findByPk($skillListId);
      $skillModel = Skill::model()->findByPk($skillListModel->skill_id);
      if ((isset($_POST['Skill']))) {
        $skillModel->attributes = $_POST['Skill'];
        if ($skillModel->validate()) {
          if ($skillModel->save(false)) {
            if ($skillListModel->save(false)) {
              echo CJSON::encode(array(
               "success" => true,
               "skill_list_id" => $skillListModel->id,
               "_skill_list_post_row" => $this->renderPartial('skill.views.skill._skill_list_post_row', array(
                'skillListItem' => $skillListModel,
                'source' => SkillList::$SOURCE_ADVICE_PAGE)
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
     $advicePage = AdvicePage::model()->findByPk($advicePageId);
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('skill_page_detail_guest', array(
       'advicePage' => $advicePage,
       'subskills' => AdvicePageSubskill::getSubskill($advicePageId),
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile,
       "otherAdvicePages" => AdvicePage::getAdvicePages(null, null, null, $advicePage->page->owner_id, $advicePage->id),
       'mentorships' => Mentorship::getOtherMentoringList($advicePage->page->owner_id),
        )
      );
    } else {
      $bankSearchCriteria = ListBank::getListBankSearchCriteria(SkillType::$CATEGORY_SKILL, null, 100);
      $pageLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE_PAGE), "id", "level_name");

      $this->render('skill_page_detail', array(
       'skillModel' => new Skill(),
       'advicePage' => $advicePage,
       "otherAdvicePages" => AdvicePage::getAdvicePages(null, null, null, $advicePage->page->owner_id, $advicePage->id),
       'mentorships' => Mentorship::getOtherMentoringList($advicePage->page->owner_id),
       'pageLevelList' => $pageLevelList,
       'pageModel' => new Page(),
       "advicePageModel" => new AdvicePage(),
       'subskills' => AdvicePageSubskill::getSubskill($advicePageId),
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
            $skillModel = new Skill();
            $skillModel->title = $pageModel->title;
            $skillModel->description = $pageModel->description;
            if ($skillModel->save(false)) {
              $skillListModel = new SkillList();
              $skillListModel->type_id = 1; //temp
              $skillListModel->user_id = Yii::app()->user->id;
              $skillListModel->skill_id = $skillModel->id;
              $skillListModel->level_id = Level::$LEVEL_SKILL_OTHER;
              if ($skillListModel->save(false)) {
                $advicePageModel->page_id = $pageModel->id;
                $advicePageModel->skill_list_id = $skillListModel->id;
                if ($advicePageModel->save(false)) {
                  if (isset($_POST['gb-page-share-with'])) {
                    AdvicePageShare::shareAdvicePage($advicePageModel->id, $_POST['gb-page-share-with']);
                    Post::addPost($advicePageModel->id, Post::$TYPE_ADVICE_PAGE, $advicePageModel->privacy, $_POST['gb-page-share-with']);
                  } else {
                    AdvicePageShare::shareAdvicePage($advicePageModel->id);
                    Post::addPost($advicePageModel->id, Post::$TYPE_ADVICE_PAGE, $advicePageModel->privacy);
                  }
                  echo CJSON::encode(array(
                   "success" => true,
                   "redirect_url" => Yii::app()->createUrl("pages/pages/advicePageDetail", array("advicePageId" => $advicePageModel->id)))
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
            $skillModel = new Skill();
            $skillModel->title = $pageModel->title;
            $skillModel->description = $pageModel->description;
            if ($skillModel->save(false)) {
              $skillListModel = new SkillList();
              $skillListModel->type_id = 1; //temp
              $skillListModel->user_id = Yii::app()->user->id;
              $skillListModel->skill_id = $skillModel->id;
              $skillListModel->level_id = Level::$LEVEL_SKILL_OTHER;
              if ($skillListModel->save(false)) {
                $advicePageModel->page_id = $pageModel->id;
                $advicePageModel->skill_list_id = $skillListModel->id;
                if ($advicePageModel->save(false)) {
                  echo CJSON::encode(array(
                   "success" => true,
                   "title" => $advicePageModel->subskills . " " . $advicePageModel->level->level_name . " " . $advicePageModel->skillList->skill->title,
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
