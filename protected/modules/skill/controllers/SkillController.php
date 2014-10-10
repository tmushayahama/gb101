<?php

class SkillController extends Controller {
  /**
   * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
   * using two-column layout. See 'protected/views/layouts/column2.php'.
   */

  /**
   * @return array action filters
   */
  public function filters() {
    return array(
     'accessControl', // perform access control for CRUD operations
     'postOnly + delete', // we only allow deletion via POST request
    );
  }

  /**
   * Specifies the access control rules.
   * This method is used by the 'accessControl' filter.
   * @return array access control rules
   */
  public function accessRules() {
    return array(
     array('allow', // allow all users to perform 'index' and 'view' actions
      'actions' => array('index', 'skillbank', 'skillbankdetail', 'appendMoreSkill'),
      'users' => array('*'),
     ),
     array('allow', // allow authenticated user to perform 'create' and 'update' actions
      'actions' => array('skillhome', 'skillbank', 'addskilllist', 'editskilllist', 'addskillbank',
       'skilldetail', 'skillmanagement', 'addSkillAskQuestion', 'addSkillTodo', 'AddSkillWeblink',
       'postSkillDiscussionTitle', 'addSkillTimelineItem', 'addSkillAskQuestion'),
      'users' => array('@'),
     ),
     array('allow', // allow admin user to perform 'admin' and 'delete' actions
      'actions' => array('admin', 'delete'),
      'users' => array('admin'),
     ),
     array('deny', // deny all users
      'users' => array('*'),
     ),
    );
  }

  public function actionSkillHome() {
    $skillListModel = new SkillList;
    $skillModel = new Skill;
    $skillModel = new Skill();
    $connectionModel = new Connection;
    $connectionMemberModel = new ConnectionMember;

    $bankSearchCriteria = ListBank::getListBankSearchCriteria(SkillType::$CATEGORY_SKILL, null, 100);
    $pageLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE_PAGE), "id", "name");

    $this->render('skill_home', array(
     'people' => Profile::getPeople(true),
     //'mentorshipModel'=> new Mentorship(),
     'skillModel' => $skillModel,
     'skillListModel' => $skillListModel,
     'skillModel' => $skillModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'skillTypes' => SkillType::Model()->findAll(),
     'skillList' => SkillList::model()->findAll(), //getSkillList(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, null, 50),
     'skillLevelList' => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
     'pageModel' => new Page(),
     'advicePageModel' => new AdvicePage(),
     'pageLevelList' => $pageLevelList,
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers(0, 6),
     'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
     'requestModel' => new Notification()

//"skillListBankPages" => $skillListBankPages,
// "skillListBankCount" => $skillListBankCount,
    ));
  }

  public function actionSkillBank() {
    if (Yii::app()->user->isGuest) {
      $skillListModel = new SkillList;
      $skillModel = new Skill;

      $bankSearchCriteria = ListBank::getListBankSearchCriteria(SkillType::$CATEGORY_SKILL, null, 100);

      $count = ListBank::model()->count($bankSearchCriteria);
      $pages = new CPagination($count);
// results per page    
      $pages->pageSize = 100;
      $pages->applyLimit($bankSearchCriteria);
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('skill_bank_guest', array(
       'skillModel' => $skillModel,
       'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
       'pages' => $pages, 'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
      $skillListModel = new SkillList;
      $skillModel = new Skill;
      $connectionModel = new Connection;
      $connectionMemberModel = new ConnectionMember;

      $bankSearchCriteria = ListBank::getListBankSearchCriteria(SkillType::$CATEGORY_SKILL, null, 100);

      $this->render('skill_bank', array(
       'skillModel' => $skillModel,
       'skillListModel' => $skillListModel,
       'connectionMemberModel' => $connectionMemberModel,
       'connectionModel' => $connectionModel,
       'skillTypes' => SkillType::Model()->findAll(),
       'skillList' => SkillList::getSkillList(null, null, null, array(SkillList::$TYPE_SKILL), 12),
       'skill_levels' => Level::getLevels(Level::$LEVEL_CATEGORY_SKILL),
       'skillListBank' => ListBank::model()->findAll($bankSearchCriteria),
      ));
    }
  }

  public function actionSkillBankDetail($skillId) {
    if (Yii::app()->user->isGuest) {
      $registerModel = new RegistrationForm;
      $profile = new Profile;
      $loginModel = new UserLogin;
      $skillBankItem = ListBank::Model()->findByPk($skillId);
      UserLogin::gbLogin($this, $loginModel, $registerModel, $profile);
      $this->render('skill_bank_detail_guest', array(
       'skillBankItem' => $skillBankItem,
       'loginModel' => $loginModel,
       'registerModel' => $registerModel,
       'profile' => $profile)
      );
    } else {
//$skillWeblinkModel = new SkillWeblink;
      $skillBankItem = ListBank::Model()->findByPk($skillId);
      $this->render('skill_bank_detail', array(
       'skillBankItem' => $skillBankItem,
      ));
    }
  }

  public function actionSkillDetail($skillListId) {
//$skillWeblinkModel = new SkillWeblink;
    $skillListItem = SkillList::Model()->findByPk($skillListId);
    $this->render('skill_detail', array(
    ));
  }

  public function actionSkillManagement($skillListItemId) {
    $skillListItem = SkillList::Model()->findByPk($skillListItemId);
    $skillId = $skillListItem->skill_id;
    $skillTodoPriorities = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name");
    $this->render('skill_management', array(
     'skillListItem' => $skillListItem,
     'skill' => Skill::getSkill($skillListItem->skill_id),
     'skillParentTodos' => SkillTodo::getSkillParentTodos($skillListItem->skill_id),
     'questionModel' => new Question(),
     'skillQuestionModel' => new SkillQuestion(),
     'skillAnswerModel' => new SkillAnswer(),
     'requestModel' => new Notification(),
     'announcementModel' => new Announcement(),
     'todoModel' => new Todo(),
     'skillTodoPriorities' => $skillTodoPriorities,
     'skillTodoParentList' => SkillTodo::getSkillParentTodos($skillId),
     'weblinkModel' => new Weblink(),
     'discussionModel' => new Discussion(),
     'discussionTitleModel' => new DiscussionTitle(),
     //'skillMonitors' => SkillMonitor::getSkillMonitors($skillId),
     //'skillType' => $skillType,
     //'advicePages' => Page::getUserPages($skill->owner_id),
     //'skillTimeline' => SkillTimeline::getSkillTimeline($skillId),
     "skillTimelineModel" => new SkillTimeline(),
     'people' => Profile::getPeople(true),
     'skillJudgeRequests' => Notification::getRequestStatus(array(Type::$SOURCE_JUDGE_REQUESTS), $skillId, null, true),
         
     "timelineModel" => new Timeline(),
     //'feedbackQuestions' => Skill::getFeedbackQuestions($skill, Yii::app()->user->id),
     'skillModel' => new Skill(),
     'skillListModel' => new SkillList(),
     'skillList' => SkillList::getSkillList(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, null, 50),
     'skillLevelList' => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
    ));
  }

  public function actionAddSkilllist($connectionId, $source, $type) {
    if (Yii::app()->request->isAjaxRequest) {
      $skillModel = new Skill;
      $skillListModel = new SkillList;
      if (isset($_POST['Skill']) && isset($_POST['SkillList'])) {
        $skillModel->attributes = $_POST['Skill'];
        $skillListModel->attributes = $_POST['SkillList'];
        if ($skillModel->validate() && $skillListModel->validate()) {
          $skillModel->assign_date = date("Y-m-d");
          $skillModel->status = 1;
          if ($skillModel->save()) {
            $skillListModel->type_id = $type;
             $skillListModel->owner_id = Yii::app()->user->id;
            $skillListModel->skill_id = $skillModel->id;
            if ($skillListModel->save()) {
              if (isset($_POST['gb-skill-share-with'])) {
                SkillListShare::shareSkillList($skillListModel->id, $_POST['gb-skill-share-with']);
                Post::addPost($skillListModel->id, Post::$TYPE_GOAL_LIST, $skillListModel->privacy, $_POST['gb-skill-share-with']);
              } else {
                SkillListShare::shareSkillList($skillListModel->id);
                Post::addPost($skillListModel->id, Post::$TYPE_GOAL_LIST, $skillListModel->privacy);
              }
              echo CJSON::encode(array(
               'success' => true,
               "skill_level_id" => $skillListModel->level_id,
               '_post_row' => $this->renderPartial('skill.views.skill._skill_list_post_row', array(
                'skillListItem' => $skillListModel,
                'source' => SkillList::$SOURCE_SKILL)
                 , true),
               "_skill_preview_list_row" => $this->renderPartial('skill.views.skill._skill_preview_list_row', array(
                "skillListItem" => $skillListModel)
                 , true)));
            }
          }
        } else {
          echo CActiveForm::validate(array($skillModel, $skillListModel));
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAddSkillAnswer($skillId, $questionId) {
    if (Yii::app()->request->isAjaxRequest) {
      $skillModel = new Skill();
      if (isset($_POST['Skill'])) {
        $skillModel->attributes = $_POST['Skill'];
        if ($skillModel->validate()) {
          if ($skillModel->save(false)) {
            $skillQuestion = new SkillQuestion();
            $skillQuestion->skill_id = $skillId;
            $skillQuestion->question_id = $questionId;
            if ($skillQuestion->save(false)) {
              $answer = new SkillAnswer();
              $answer->questionee_id = Yii::app()->user->id;
              $answer->skill_id = $skillId;
              $answer->skill_question_id = $skillQuestion->id;
              $answer->skill_answer = $skillModel->description;
              $answer->skill_id = $skillModel->id;
              if ($answer->save(false)) {
                $skill = Skill::model()->findByPk($skillId);
                $subskill = new Subskill();
                $subskill->skill_id = $skill->skillList->skill_id;
                $subskill->subskill_id = $skillModel->id;
                $subskill->type = Subskill::$TYPE_MENTORSHIP;
                if ($subskill->save(false)) {
                  echo CJSON::encode(array(
                   "success" => true,
                   "_post_row" => $this->renderPartial('skill.views.skill.activity._answer_list_item'
                     , array("answer" => $answer)
                     , true)
                  ));
                }
              }
            }
          }
        } else {
          echo CActiveForm::validate($skillModel);
          Yii::app()->end();
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAddSkillAskQuestion($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      $questionModel = new Question();
      if (isset($_POST['Question'])) {
        $questionModel->attributes = $_POST['Question'];
        if ($questionModel->validate()) {
          $questionModel->questioner_id = Yii::app()->user->id;
          $questionModel->type = Question::$TYPE_MENTORSHIP_ASK;
          if ($questionModel->save(false)) {
            $skillQuestion = new SkillQuestion();
            $skillQuestion->skill_id = $skillId;
            $skillQuestion->question_id = $questionModel->id;
            if ($skillQuestion->save(false)) {
              echo CJSON::encode(array(
               "success" => true,
               "_post_row" => $this->renderPartial('skill.views.skill.activity._skill_ask_question_list_item', array(
                'skillQuestion' => $skillQuestion,
                'skillId' => $skillId,
                 )
                 , true)
              ));
            }
          }
        } else {
          echo CActiveForm::validate($questionModel);
          Yii::app()->end();
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAddSkillAskAnswer($skillId, $skillQuestionId) {
    if (Yii::app()->request->isAjaxRequest) {
      $skillAnswerModel = new SkillAnswer();
      if (isset($_POST['SkillAnswer'])) {
        $skillAnswerModel->attributes = $_POST['SkillAnswer'];
        if ($skillAnswerModel->validate()) {
          $skillAnswerModel->questionee_id = Yii::app()->user->id;
          $skillAnswerModel->skill_question_id = $skillQuestionId;
          $skillAnswerModel->skill_id = $skillId;
          if ($skillAnswerModel->save(false)) {
            echo CJSON::encode(array(
             "success" => true,
             "_post_row" => $this->renderPartial('skill.views.skill.activity._skill_ask_answer_list_item', array(
              'skillAnswer' => $skillAnswerModel,
              'skillId' => $skillId,
               )
               , true)
            ));
          }
        } else {
          echo CActiveForm::validate($skillAnswerModel);
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAddSkillAnnouncement($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Announcement'])) {
        $announcementModel = new Announcement();
        $announcementModel->attributes = $_POST['Announcement'];
        if ($announcementModel->validate()) {
          $announcementModel->announcer_id = Yii::app()->user->id;
          if ($announcementModel->save(false)) {
            $skillAnnouncementModel = new SkillAnnouncement();
            $skillAnnouncementModel->skill_id = $skillId;
            $skillAnnouncementModel->announcement_id = $announcementModel->id;
            if ($skillAnnouncementModel->save(false)) {
              echo CJSON::encode(array(
               "success" => true,
               "_post_row" => $this->renderPartial('skill.views.skill.activity._announcement_list_item'
                 , array("skillAnnouncement" => $skillAnnouncementModel)
                 , true)
                )
              );
            }
          }
        } else {
          echo CActiveForm::validate($announcementModel);
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAddSkillTimelineItem($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Timeline']) && isset($_POST['SkillTimeline'])) {
        $timelineModel = new Timeline();
        $skillTimelineModel = new SkillTimeline();
        $timelineModel->attributes = $_POST['Timeline'];
        $skillTimelineModel->attributes = $_POST['SkillTimeline'];
        if ($skillTimelineModel->validate() && $timelineModel->validate()) {
          $timelineModel->assigner_id = Yii::app()->user->id;
          if ($timelineModel->save(false)) {
            $skillTimelineModel->skill_id = $skillId;
            $skillTimelineModel->timeline_id = $timelineModel->id;
            $skillTimelineModel->save(false);
            echo CJSON::encode(array(
             'success' => true,
             'data_source' => Type::$SOURCE_TIMELINE,
             'source_pk_id' => 0,
             '_post_row' => $this->renderPartial('skill.views.skill.activity._skill_timeline_item_row', array(
              'skillTimeline' => SkillTimeline::getSkillTimeline($skillId),
               )
               , true)
            ));
          }
        } else {
          echo CActiveForm::validate(array($skillTimelineModel, $timelineModel));
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAddSkillTodo($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Todo'])) {
        $todoModel = new Todo();
        $todoModel->attributes = $_POST['Todo'];
        if ($todoModel->validate()) {
          $todoModel->assigner_id = Yii::app()->user->id;
          $cdate = new DateTime('now');
          $todoModel->assigned_date = $cdate->format('Y-m-d h:m:i');
          if ($todoModel->save(false)) {
            $skillTodoModel = new SkillTodo();
            $skillTodoModel->skill_id = $skillId;
            $skillTodoModel->todo_id = $todoModel->id;
            $skillTodoModel->save(false);
            $postRow;
            if ($todoModel->parent_todo_id) {
              $postRow = $this->renderPartial('skill.views.skill.activity._skill_todo_parent_list_item', array(
               "skillTodoParent" => SkillTodo::getSkillParentTodo($todoModel->parent_todo_id, $skillId))
                , true);
            } else {
              $postRow = $this->renderPartial('skill.views.skill.activity._skill_todo_parent_list_item', array(
               "skillTodoParent" => $skillTodoModel)
                , true);
            }

            echo CJSON::encode(array(
             "success" => true,
             "data_source" => Type::$SOURCE_TODO,
             "source_pk_id" => $todoModel->parent_todo_id,
             "_post_row" => $postRow
            ));
          }
        } else {
          echo CActiveForm::validate($todoModel);
        }
      }

      Yii::app()->end();
    }
  }

  public function actionAddSkillWeblink($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Weblink'])) {
        $weblinkModel = new Weblink();
        $skillWeblinkModel = new SkillWeblink();

        $weblinkModel->attributes = $_POST['Weblink'];
        if ($weblinkModel->validate()) {
          $weblinkModel->creator_id = Yii::app()->user->id;
          $cdate = new DateTime('now');
          $weblinkModel->created_date = $cdate->format('Y-m-d h:m:i');
          if ($weblinkModel->save(false)) {

            $skillWeblinkModel->skill_id = $skillId;
            $skillWeblinkModel->weblink_id = $weblinkModel->id;
            if ($skillWeblinkModel->save(false)) {
              echo CJSON::encode(array(
               "success" => true,
               '_post_row' => $this->renderPartial('skill.views.skill.activity._skill_weblink_list_item', array(
                'skillWeblinkModel' => $skillWeblinkModel)
                 , true)
              ));
            }
          }
        } else {
          echo CActiveForm::validate($weblinkModel);
        }
      }

      Yii::app()->end();
    }
  }

  public function actionPostSkillDiscussionTitle($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['DiscussionTitle'])) {
        $discussionTitleModel = new DiscussionTitle();
        $skillDiscussionTitle = new SkillDiscussionTitle();

        $discussionTitleModel->attributes = $_POST['DiscussionTitle'];
        if ($discussionTitleModel->validate()) {
          $discussionTitleModel->creator_id = Yii::app()->user->id;
          $cdate = new DateTime('now');
          $discussionTitleModel->created_date = $cdate->format('Y-m-d h:m:i');
          if ($discussionTitleModel->save(false)) {
            $skillDiscussionTitle->skill_id = $skillId;
            $skillDiscussionTitle->discussion_title_id = $discussionTitleModel->id;
            if ($skillDiscussionTitle->save(false)) {
              echo CJSON::encode(array(
               'success' => true,
               '_post_row' => $this->renderPartial('discussion.views.discussion._discussion_title', array(
                'discussionTitle' => $discussionTitleModel,
                'skillId' => $skillId)
                 , true)
              ));
            }
          }
        } else {
          echo CActiveForm::validate($discussionTitleModel);
        }
      }
      Yii::app()->end();
    }
  }

  public function actionAppendMoreSkill() {
    if (Yii::app()->request->isAjaxRequest) {
      $nextPage = Yii::app()->request->getParam('next_page') * 100;
      $type = Yii::app()->request->getParam('type');
      $bankSearchCriteria = ListBank::getListBankSearchCriteria(SkillType::$CATEGORY_SKILL, null, 100, $nextPage);
      switch ($type) {
        case 1:
          echo CJSON::encode(array(
           '_skill_bank_list' => $this->renderPartial('skill.views.skill._skill_bank_list', array(
            'skillListBank' => ListBank::model()->findAll($bankSearchCriteria))
             , true
          )));
          break;
        case 2:
          echo CJSON::encode(array(
           '_skill_bank_list' => $this->renderPartial('skill.views.skill._skill_bank_list_1', array(
            'skillListBank' => ListBank::model()->findAll($bankSearchCriteria))
             , true
          )));
          break;
      }
      Yii::app()->end();
    }
  }

  /**
   * Displays a particular model.
   * @param integer $id the ID of the model to be displayed
   */
  public function actionView($id) {
    $this->render('view', array(
     'skill' => Skill::getSkill($id),
    ));
  }

  /**
   * Creates a new model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   */
  public function actionCreate() {
    $model = new Skill;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

    if (isset($_POST['Skill'])) {
      $model->attributes = $_POST['Skill'];
      if ($model->save())
        $this->redirect(array('view', 'id' => $model->id));
    }

    $this->render('create', array(
     'model' => $model,
    ));
  }

  /**
   * Updates a particular model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id the ID of the model to be updated
   */
  public function actionUpdate($id) {
    $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

    if (isset($_POST['Skill'])) {
      $model->attributes = $_POST['Skill'];
      if ($model->save())
        $this->redirect(array('view', 'id' => $model->id));
    }

    $this->render('update', array(
     'model' => $model,
    ));
  }

  /**
   * Deletes a particular model.
   * If deletion is successful, the browser will be redirected to the 'admin' page.
   * @param integer $id the ID of the model to be deleted
   */
  public function actionDelete($id) {
    $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
    if (!isset($_GET['ajax']))
      $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
  }

  /**
   * Lists all models.
   */
  public function actionIndex() {
    $dataProvider = new CActiveDataProvider('Skill');
    $this->render('index', array(
     'dataProvider' => $dataProvider,
    ));
  }

  /**
   * Manages all models.
   */
  public function actionAdmin() {
    $model = new Skill('search');
    $model->unsetAttributes(); // clear any default values
    if (isset($_GET['Skill']))
      $model->attributes = $_GET['Skill'];

    $this->render('admin', array(
     'model' => $model,
    ));
  }

  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer $id the ID of the model to be loaded
   * @return Skill the loaded model
   * @throws CHttpException
   */
  public function loadModel($id) {
    $model = Skill::model()->findByPk($id);
    if ($model === null)
      throw new CHttpException(404, 'The requested page does not exist.');
    return $model;
  }

  /**
   * Performs the AJAX validation.
   * @param Skill $model the model to be validated
   */
  protected function performAjaxValidation($model) {
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'skill-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }

}
