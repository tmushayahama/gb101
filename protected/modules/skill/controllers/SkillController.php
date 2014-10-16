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
      'actions' => array('skillHome', 'skillbank', 'addskilllist', 'editskilllist', 'addskillbank',
       'skillManagement', 'addSkillComment', 'addSkillQuestionAnswer', 'addSkillTodo', 'addSkillDiscussion', 'AddSkillWeblink',
       'addSkillNote', 'addSkillTimelineItem'),
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

  public function actionSkillManagement($skillListItemId) {
    $skillListItem = SkillList::Model()->findByPk($skillListItemId);
    $skillId = $skillListItem->skill_id;
    $skillTodoPriorities = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name");
    $this->render('skill_management', array(
     'announcementModel' => new Announcement(),
     'commentModel' => new Comment(),
     'discussionModel' => new Discussion(),
     'skillListItem' => $skillListItem,
     'skill' => Skill::getSkill($skillListItem->skill_id),
     'skillParentTodos' => SkillTodo::getSkillParentTodos($skillListItem->skill_id),
     'noteModel' => new Note(),
     'questionAnswerModel' => new QuestionAnswer(),
     'requestModel' => new Notification(),
     'todoModel' => new Todo(),
     'skillTodoPriorities' => $skillTodoPriorities,
     'weblinkModel' => new Weblink(),
     'discussionModel' => new Discussion(),
     'skillParentDiscussions' => SkillDiscussion::getSkillParentDiscussions($skillListItem->skill_id),
     //'skillType' => $skillType,
     //'advicePages' => Page::getUserPages($skill->owner_id),
     //'skillTimeline' => SkillTimeline::getSkillTimeline($skillId),
     "skillTimelineModel" => new SkillTimeline(),
     'people' => Profile::getPeople(true),
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

  public function actionAddSkillTimelineItem($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Timeline']) && isset($_POST['SkillTimeline'])) {
        $timelineModel = new Timeline();
        $skillTimelineModel = new SkillTimeline();
        $timelineModel->attributes = $_POST['Timeline'];
        $skillTimelineModel->attributes = $_POST['SkillTimeline'];
        if ($skillTimelineModel->validate() && $timelineModel->validate()) {
          $timelineModel->creator_id = Yii::app()->user->id;
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

   public function actionAddSkillComment($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Comment'])) {
        $commentModel = new Comment();
        $commentModel->attributes = $_POST['Comment'];
        if ($commentModel->validate()) {
          $commentModel->creator_id = Yii::app()->user->id;
          $cdate = new DateTime('now');
          $commentModel->created_date = $cdate->format('Y-m-d h:m:i');
          if ($commentModel->save(false)) {
            $skillCommentModel = new SkillComment();
            $skillCommentModel->skill_id = $skillId;
            $skillCommentModel->comment_id = $commentModel->id;
            $skillCommentModel->save(false);
            $postRow;
            if ($commentModel->parent_comment_id) {
              $postRow = $this->renderPartial('skill.views.skill.activity._skill_comment_parent_list_item', array(
               "skillCommentParent" => SkillComment::getSkillParentComment($commentModel->parent_comment_id, $skillId))
                , true);
            } else {
              $postRow = $this->renderPartial('skill.views.skill.activity._skill_comment_parent_list_item', array(
               "skillCommentParent" => $skillCommentModel)
                , true);
            }

            echo CJSON::encode(array(
             "success" => true,
             "data_source" => Type::$SOURCE_TODO,
             "source_pk_id" => $commentModel->parent_comment_id,
             "_post_row" => $postRow
            ));
          }
        } else {
          echo CActiveForm::validate($commentModel);
        }
      }

      Yii::app()->end();
    }
  }
  
  
   public function actionAddSkillNote($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Note'])) {
        $noteModel = new Note();
        $noteModel->attributes = $_POST['Note'];
        if ($noteModel->validate()) {
          $noteModel->creator_id = Yii::app()->user->id;
          $cdate = new DateTime('now');
          $noteModel->created_date = $cdate->format('Y-m-d h:m:i');
          if ($noteModel->save(false)) {
            $skillNoteModel = new SkillNote();
            $skillNoteModel->skill_id = $skillId;
            $skillNoteModel->note_id = $noteModel->id;
            $skillNoteModel->save(false);
            $postRow;
            if ($noteModel->parent_note_id) {
              $postRow = $this->renderPartial('skill.views.skill.activity._skill_note_parent_list_item', array(
               "skillNoteParent" => SkillNote::getSkillParentNote($noteModel->parent_note_id, $skillId))
                , true);
            } else {
              $postRow = $this->renderPartial('skill.views.skill.activity._skill_note_parent_list_item', array(
               "skillNoteParent" => $skillNoteModel)
                , true);
            }

            echo CJSON::encode(array(
             "success" => true,
             "data_source" => Type::$SOURCE_TODO,
             "source_pk_id" => $noteModel->parent_note_id,
             "_post_row" => $postRow
            ));
          }
        } else {
          echo CActiveForm::validate($noteModel);
        }
      }

      Yii::app()->end();
    }
  }
  
   public function actionAddSkillQuestionAnswer($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['QuestionAnswer'])) {
        $questionAnswerModel = new QuestionAnswer();
        $questionAnswerModel->attributes = $_POST['QuestionAnswer'];
        if ($questionAnswerModel->validate()) {
          $questionAnswerModel->creator_id = Yii::app()->user->id;
          $cdate = new DateTime('now');
          $questionAnswerModel->created_date = $cdate->format('Y-m-d h:m:i');
          if ($questionAnswerModel->save(false)) {
            $skillQuestionAnswerModel = new SkillQuestionAnswer();
            $skillQuestionAnswerModel->skill_id = $skillId;
            $skillQuestionAnswerModel->question_answer_id = $questionAnswerModel->id;
            $skillQuestionAnswerModel->save(false);
            $postRow;
            if ($questionAnswerModel->parent_question_answer_id) {
              $postRow = $this->renderPartial('skill.views.skill.activity._skill_question_answer_parent_list_item', array(
               "skillQuestionAnswerParent" => SkillQuestionAnswer::getSkillParentQuestionAnswer($questionAnswerModel->parent_question_answer_id, $skillId))
                , true);
            } else {
              $postRow = $this->renderPartial('skill.views.skill.activity._skill_question_answer_parent_list_item', array(
               "skillQuestionAnswerParent" => $skillQuestionAnswerModel)
                , true);
            }

            echo CJSON::encode(array(
             "success" => true,
             "data_source" => Type::$SOURCE_TODO,
             "source_pk_id" => $questionAnswerModel->parent_question_answer_id,
             "_post_row" => $postRow
            ));
          }
        } else {
          echo CActiveForm::validate($questionAnswerModel);
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
          $todoModel->creator_id = Yii::app()->user->id;
          $cdate = new DateTime('now');
          $todoModel->created_date = $cdate->format('Y-m-d h:m:i');
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

  public function actionAddSkillDiscussion($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Discussion'])) {
        $discussionModel = new Discussion();
        $discussionModel->attributes = $_POST['Discussion'];
        if ($discussionModel->validate()) {
          $cdate = new DateTime('now');
          $discussionModel->creator_id = Yii::app()->user->id;
          $discussionModel->created_date = $cdate->format('Y-m-d h:m:i');
          if ($discussionModel->save(false)) {
            $skillDiscussionModel = new SkillDiscussion();
            $skillDiscussionModel->skill_id = $skillId;
            $skillDiscussionModel->discussion_id = $discussionModel->id;
            $skillDiscussionModel->save(false);
            $postRow;
            if ($discussionModel->parent_discussion_id) {
              $postRow = $this->renderPartial('skill.views.skill.activity._skill_discussion_parent_list_item', array(
               "skillDiscussionParent" => SkillDiscussion::getSkillParentDiscussion($discussionModel->parent_discussion_id, $skillId))
                , true);
            } else {
              $postRow = $this->renderPartial('skill.views.skill.activity._skill_discussion_parent_list_item', array(
               "skillDiscussionParent" => $skillDiscussionModel)
                , true);
            }

            echo CJSON::encode(array(
             "success" => true,
             "data_source" => Type::$SOURCE_TODO,
             "source_pk_id" => $discussionModel->parent_discussion_id,
             "_post_row" => $postRow
            ));
          }
        } else {
          echo CActiveForm::validate($discussionModel);
        }
      }

      Yii::app()->end();
    }
  }

   public function actionAddSkillWeblink($skillId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Weblink'])) {
        $weblinkModel = new Weblink();
        $weblinkModel->attributes = $_POST['Weblink'];
        if ($weblinkModel->validate()) {
          $weblinkModel->creator_id = Yii::app()->user->id;
          $cdate = new DateTime('now');
          $weblinkModel->created_date = $cdate->format('Y-m-d h:m:i');
          if ($weblinkModel->save(false)) {
            $skillWeblinkModel = new SkillWeblink();
            $skillWeblinkModel->skill_id = $skillId;
            $skillWeblinkModel->weblink_id = $weblinkModel->id;
            $skillWeblinkModel->save(false);
            $postRow;
            if ($weblinkModel->parent_weblink_id) {
              $postRow = $this->renderPartial('skill.views.skill.activity._skill_weblink_parent_list_item', array(
               "skillWeblinkParent" => SkillWeblink::getSkillParentWeblink($weblinkModel->parent_weblink_id, $skillId))
                , true);
            } else {
              $postRow = $this->renderPartial('skill.views.skill.activity._skill_weblink_parent_list_item', array(
               "skillWeblinkParent" => $skillWeblinkModel)
                , true);
            }

            echo CJSON::encode(array(
             "success" => true,
             "data_source" => Type::$SOURCE_TODO,
             "source_pk_id" => $weblinkModel->parent_weblink_id,
             "_post_row" => $postRow
            ));
          }
        } else {
          echo CActiveForm::validate($weblinkModel);
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
