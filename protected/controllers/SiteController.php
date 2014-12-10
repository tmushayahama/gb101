<?php

class SiteController extends Controller {

 /**
  * Declares class-based actions.
  */
 public function actions() {
  return array(
// captcha action renders the CAPTCHA image displayed on the contact page
    'captcha' => array(
      'class' => 'CCaptchaAction',
      'backColor' => 0xFFFFFF,
    ),
    // page action renders "static" pages stored under 'protected/views/site/pages'
// They can be accessed via: index.php?r=site/page&view=FileName
    'page' => array(
      'class' => 'CViewAction',
    ),
  );
 }

 /**
  * This is the default 'index' action that is invoked
  * when an action is not explicitly requested by users.
  */
 public function actionHome() {
  $skillModel = new Skill();
  $mentorshipModel = new Mentorship();
  $pageModel = new Page();
  $advicePageModel = new AdvicePage();

  $skillLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name");
  $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name");
  $pageLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_ADVICE_PAGE), "id", "name");

  $bankSearchCriteria = Bank::getBankSearchCriteria(SkillType::$CATEGORY_SKILL, null, 100);

  $this->render('home', array(
    'postShares' => PostShare::getPostShare(),
    'skillModel' => $skillModel,
    'mentorshipModel' => $mentorshipModel,
    'pageModel' => $pageModel,
    'advicePageModel' => $advicePageModel,
    'pageLevelList' => $pageLevelList,
    'projectModel' => new Project(),
    'skillTypes' => SkillType::Model()->findAll(),
    'people' => Profile::getPeople(true),
    'skillLevelList' => $skillLevelList,
    'mentorshipLevelList' => $mentorshipLevelList,
    'skillBank' => Bank::model()->findAll($bankSearchCriteria),
    'requestModel' => new Notification(),
    'tags' => Tag::getAllTags()
    // 'requests' => Notification::getNotifications(null, 6),
  ));
 }

 public function actionEditMe($dataSource, $sourcePkId, $sourceType) {
  if (Yii::app()->request->isAjaxRequest) {
   switch ($dataSource) {
    case Type::$SOURCE_COMMENT:
     $this->editComment($dataSource, $sourcePkId, $sourceType);
     break;
    case Type::$SOURCE_CONTRIBUTOR:
     $this->editContributor($dataSource, $sourcePkId, $sourceType);
     break;
    case Type::$SOURCE_TODO:
     $this->editTodo($dataSource, $sourcePkId, $sourceType);
     break;
    case Type::$SOURCE_NOTE:
     $this->editNote($dataSource, $sourcePkId, $sourceType);
     break;
    case Type::$SOURCE_DISCUSSION:
     $this->editDiscussion($dataSource, $sourcePkId, $sourceType);
     break;
    case Type::$SOURCE_QUESTIONNAIRE:
     $this->editQuestionnaire($dataSource, $sourcePkId, $sourceType);
     break;
    case Type::$SOURCE_WEBLINK:
     $this->editWeblink($dataSource, $sourcePkId, $sourceType);
     break;
    case Type::$SOURCE_SKILL:
     $this->editSkill($dataSource, $sourcePkId, $sourceType);
     break;
   }
  }
 }

 public function actionAppendMore() {
  if (Yii::app()->request->isAjaxRequest) {
   $dataSource = Yii::app()->request->getParam('data_source');
   $sourcePkId = Yii::app()->request->getParam('source_pk_id');
   $offset = Yii::app()->request->getParam('offset');
   $postRow;
   switch ($dataSource) {
    case Type::$SOURCE_SKILL_COMMENT:
     $postRow = $this->renderPartial('skill.views.skill.activity.comment._skill_comments', array(
       "skillComments" => SkillComment::getSkillParentComments($sourcePkId, Comment::$COMMENTS_PER_PAGE, $offset),
       "skillCommentsCount" => SkillComment::getSkillParentCommentsCount($sourcePkId),
       "skillId" => $sourcePkId,
       "offset" => $offset,
       ), true);
     break;
    case Type::$SOURCE_SKILL_CONTRIBUTOR:
     $postRow = $this->renderPartial('skill.views.skill.activity.contributor._skill_contributors', array(
       "skillContributors" => SkillContributor::getSkillParentContributors($sourcePkId, Contributor::$CONTRIBUTORS_PER_PAGE, $offset),
       "skillContributorsCount" => SkillContributor::getSkillParentContributorsCount($sourcePkId),
       "skillId" => $sourcePkId,
       "offset" => $offset,
       ), true);
     break;
    case Type::$SOURCE_SKILL_TODO:
     $postRow = $this->renderPartial('skill.views.skill.activity.todo._skill_todos', array(
       "skillTodos" => SkillTodo::getSkillParentTodos($sourcePkId, Todo::$TODOS_PER_PAGE, $offset),
       "skillTodosCount" => SkillTodo::getSkillParentTodosCount($sourcePkId),
       "skillId" => $sourcePkId,
       "offset" => $offset,
       ), true);
     break;
    case Type::$SOURCE_SKILL_NOTE:
     $postRow = $this->renderPartial('skill.views.skill.activity.note._skill_notes', array(
       "skillNotes" => SkillNote::getSkillParentNotes($sourcePkId, Note::$TODOS_PER_PAGE, $offset),
       "skillNotesCount" => SkillNote::getSkillParentNotesCount($sourcePkId),
       "skillId" => $sourcePkId,
       "offset" => $offset,
       ), true);
     break;
    case Type::$SOURCE_SKILL_DISCUSSION:
     $postRow = $this->renderPartial('skill.views.skill.activity.discussion._skill_discussions', array(
       "skillDiscussions" => SkillDiscussion::getSkillParentDiscussions($sourcePkId, Discussion::$DISCUSSIONS_PER_PAGE, $offset),
       "skillDiscussionsCount" => SkillDiscussion::getSkillParentDiscussionsCount($sourcePkId),
       "skillId" => $sourcePkId,
       "offset" => $offset,
       ), true);
     break;
    case Type::$SOURCE_SKILL_WEBLINK:
     $postRow = $this->renderPartial('skill.views.skill.activity.weblink._skill_weblinks', array(
       "skillWeblinks" => SkillWeblink::getSkillParentWeblinks($sourcePkId, Weblink::$WEBLINKS_PER_PAGE, $offset),
       "skillWeblinksCount" => SkillWeblink::getSkillParentWeblinksCount($sourcePkId),
       "skillId" => $sourcePkId,
       "offset" => $offset,
       ), true);
     break;
    case Type::$SOURCE_SKILL_QUESTIONNAIRE:
     $postRow = $this->renderPartial('skill.views.skill.activity.questionnaire._skill_questionnaires', array(
       "skillQuestionnaires" => SkillQuestionnaire::getSkillParentQuestionnaires($sourcePkId, Questionnaire::$QUESTIONNAIRES_PER_PAGE, $offset),
       "skillQuestionnairesCount" => SkillQuestionnaire::getSkillParentQuestionnairesCount($sourcePkId),
       "skillId" => $sourcePkId,
       "offset" => $offset,
       ), true);
     break;
    case Type::$SOURCE_SKILL:
     Skill::deleteSkill($sourcePkId);
     break;
    case Type::$SOURCE_MENTORSHIP:
     Mentorship::deleteMentorship($sourcePkId);
     break;
    case Type::$SOURCE_PAGE:
     AdvicePage::deleteAdvicePage($sourcePkId);
     break;
    case Type::$SOURCE_ANSWER:
     MentorshipAnswer::deleteMentorshipAnswer($sourcePkId);
     break;
    case Type::$SOURCE_TIMELINE:
     $mentorshipId = MentorshipTimeline::deleteMentorshipTimeline($sourcePkId);
     $replaceWithRow = $this->renderPartial('mentorship.views.mentorship._mentorship_timeline_item_row', array(
       'mentorshipTimeline' => MentorshipTimeline::getMentorshipTimeline($mentorshipId),
       )
       , true);
     break;
    case Type::$SOURCE_TODO:
     Todo::deleteTodo($sourcePkId);
     break;
    case Type::$SOURCE_DISCUSSION_TITLE:
     DiscussionTitle::deleteDiscussionTitle($sourcePkId);
     break;
    case Type::$SOURCE_DISCUSSION_POST:
     Discussion::deleteDiscussion($sourcePkId);
     break;
    case Type::$SOURCE_WEBLINK:
     Weblink::deleteWeblink($sourcePkId);
     break;
    case Type::$SOURCE_NOTIFICATION:
     Notification::deleteNotification($sourcePkId);
     break;
   }

   echo CJSON::encode(array(
     'data_source' => $dataSource,
     'source_pk_id' => $sourcePkId,
     '_post_row' => $postRow,
   ));
   Yii::app()->end();
  }
 }

 public function actionDeleteMe() {
  if (Yii::app()->request->isAjaxRequest) {
   $dataSource = Yii::app()->request->getParam('data_source');
   $sourcePkId = Yii::app()->request->getParam('source_pk_id');
   $replaceWithRow = null;
   switch ($dataSource) {
    case Type::$SOURCE_COMMENT:
     Comment::deleteComment($sourcePkId);
     break;
    case Type::$SOURCE_CONTRIBUTOR:
     Contributor::deleteContributor($sourcePkId);
     break;
    case Type::$SOURCE_TODO:
     Todo::deleteTodo($sourcePkId);
     break;
    case Type::$SOURCE_NOTE:
     Note::deleteNote($sourcePkId);
     break;
    case Type::$SOURCE_DISCUSSION:
     Discussion::deleteDiscussion($sourcePkId);
     break;
    case Type::$SOURCE_QUESTIONNAIRE:
     Questionnaire::deleteQuestionnaire($sourcePkId);
     break;
    case Type::$SOURCE_WEBLINK:
     Weblink::deleteWeblink($sourcePkId);
     break;
    case Type::$SOURCE_SKILL:
     Skill::deleteSkill($sourcePkId);
     break;
    case Type::$SOURCE_MENTORSHIP:
     Mentorship::deleteMentorship($sourcePkId);
     break;
    case Type::$SOURCE_PAGE:
     AdvicePage::deleteAdvicePage($sourcePkId);
     break;
    case Type::$SOURCE_ANSWER:
     MentorshipAnswer::deleteMentorshipAnswer($sourcePkId);
     break;
    case Type::$SOURCE_TIMELINE:
     $mentorshipId = MentorshipTimeline::deleteMentorshipTimeline($sourcePkId);
     $replaceWithRow = $this->renderPartial('mentorship.views.mentorship._mentorship_timeline_item_row', array(
       'mentorshipTimeline' => MentorshipTimeline::getMentorshipTimeline($mentorshipId),
       )
       , true);
     break;
    case Type::$SOURCE_TODO:
     Todo::deleteTodo($sourcePkId);
     break;
    case Type::$SOURCE_DISCUSSION_TITLE:
     DiscussionTitle::deleteDiscussionTitle($sourcePkId);
     break;
    case Type::$SOURCE_DISCUSSION_POST:
     Discussion::deleteDiscussion($sourcePkId);
     break;
    case Type::$SOURCE_WEBLINK:
     Weblink::deleteWeblink($sourcePkId);
     break;
    case Type::$SOURCE_NOTIFICATION:
     Notification::deleteNotification($sourcePkId);
     break;
   }

   echo CJSON::encode(array(
     'data_source' => $dataSource,
     'source_pk_id' => $sourcePkId,
     '_replace_with_row' => $replaceWithRow,
   ));
   Yii::app()->end();
  }
 }

 /**
  * This is the action to handle external exceptions.
  */
 public function actionError() {
  if ($error = Yii::app()->errorHandler->error) {
   if (Yii::app()->request->isAjaxRequest)
    echo $error['message'];
   else
    $this->render('error', $error);
  }
 }

 /**
  * Logs out the current user and redirect to homepage.
  */
 public function actionLogout() {
  Yii::app()->user->logout();
  $this->redirect(Yii::app()->homeUrl);
 }

 public function actionGetPosts() {
  if (Yii::app()->request->isAjaxRequest) {
   $postType = Yii::app()->request->getParam('post_type');
   $creatorId = Yii::app()->request->getParam('creator_id');
   $postShares = PostShare::getPostShare($postType, $creatorId);
   echo CJSON::encode(array(
     "_posts" => $this->renderPartial('application.views.site._posts', array(
       "postShares" => $postShares,
       "heading" => "Your " . Post::getPostTypeName($postType) . "(s)")
       , true)));
   Yii::app()->end();
  }
 }

 public function actionSubmitTag() {
  if (Yii::app()->request->isAjaxRequest) {
   $tagName = Yii::app()->request->getParam('tag_name');
   Tag::submitTag($tagName);

   // echo CJSON::encode(array(
   //// "_posts" => $this->renderPartial('application.views.site._posts', array(
   //  "postShares" => $postShares,
   //  "heading" => "Your " . Post::getPostTypeName($postType) . "(s)")
   //   , true)));
   Yii::app()->end();
  }
 }

 public function actionGetSelectPeopleList() {
  if (Yii::app()->request->isAjaxRequest) {
   $sourcePkId = Yii::app()->request->getParam('source_pk_id');
   $source = Yii::app()->request->getParam('source');
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('application.views.site._select_people_list', array(
       "people" => Profile::getPeople(true),
       "source" => $source,
       "sourcePkId" => $sourcePkId,
       "modalType" => Type::$REQUEST_SHARE)
       , true)
     )
   );
   Yii::app()->end();
  }
 }

 public function actionSendRequest() {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST['Notification'])) {
    $type = $_POST['Notification']['type'];
    if (isset($_POST['gb-send-request-recepients'])) {
     $sourcePkId = $_POST['Notification']['source_id'];
     $dataSource = $_POST['Notification']['data_source'];
     Notification::setNotification(
       $_POST['Notification']['message']
       , $sourcePkId
       , Yii::app()->user->id
       , $_POST['gb-send-request-recepients']
       , $type
       , $_POST['Notification']['status']);
     Post::addPostAfterRequest($sourcePkId, $type, $_POST['gb-send-request-recepients']);
     $this->getRequestPostRow($dataSource, $sourcePkId, $type);
    }
   }
   Yii::app()->end();
  }
 }

 public function actionAcceptRequest() {
  if (Yii::app()->request->isAjaxRequest) {
   $notificationId = Yii::app()->request->getParam('notification_id');
   $notification = Notification::Model()->findByPk($notificationId);
   switch ($notification->type) {
    case Type::$SOURCE_MENTOR_REQUESTS:
    case Type::$SOURCE_MENTEE_REQUESTS:
     $mentorshipId = Mentorship::acceptMentor($notification);
     echo CJSON::encode(array(
       "redirect_url" => Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array("mentorshipId" => $mentorshipId))
     ));
     break;
    case Type::$SOURCE_PROJECT_MEMBER_REQUESTS:
     $projectId = ProjectMember::acceptMember($notification);
     echo CJSON::encode(array(
       "redirect_url" => Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array("mentorshipId" => $mentorshipId))
     ));
     break;
    case Type::$SOURCE_JUDGE_REQUESTS:
     $skillId = SkillContributor::acceptContributor($notification);
     echo CJSON::encode(array(
       "redirect_url" => Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array("mentorshipId" => $mentorshipId))
     ));
     break;
    case Type::$SOURCE_OBSERVER_REQUESTS:
     $skillId = SkillObserver::acceptObserver($notification);
     echo CJSON::encode(array(
       "redirect_url" => Yii::app()->createUrl("mentorship/mentorship/mentorshipDetail", array("mentorshipId" => $mentorshipId))
     ));
     break;
   }

   Yii::app()->end();
  }
 }

 public function editSkill($dataSource, $sourcePkId) {
  if (isset($_POST['Skill']) && isset($_POST['Skill'])) {
   $skillModel = Skill::model()->findByPk($sourcePkId);
   $skillModel = $skillModel->skill;
   $skillModel->attributes = $_POST['Skill'];
   $skillModel->attributes = $_POST['Skill'];

   if ($skillModel->validate() && $skillModel->validate()) {
    if ($skillModel->save()) {
     if ($skillModel->save()) {
      echo CJSON::encode(array(
        'success' => true,
        'data_source' => $dataSource,
        'source_pk_id' => $sourcePkId,
        '_post_row' => $this->renderPartial('skill.views.skill._skill_post_row', array(
          'skill' => $skillModel,
          'source' => Skill::$SOURCE_SKILL)
          , true)));
     }
    }
   } else {
    echo CActiveForm::validate(array($skillModel, $skillModel));
   }
  }
  Yii::app()->end();
 }

 public function editTodo($dataSource, $sourcePkId, $sourceType) {
  if (isset($_POST['Todo'])) {
   $todoModel = Todo::model()->findByPk($sourcePkId);
   $todoModel->description = $_POST["Todo"]["description"];
   if ($todoModel->validate()) {
    if ($todoModel->save()) {
     $postRow;
     switch ($sourceType) {
      case Type::$SOURCE_TYPE_PARENT:
       $postRow = $this->renderPartial('todo.views.todo.activity._todo_parent', array(
         'todo' => $todoModel,
         "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
         'todoCounter' => "edited")
         , true);
       break;
      case Type::$SOURCE_TYPE_CHILD:
       $postRow = $this->renderPartial('todo.views.todo.activity._todo_child', array(
         "todoChild" => $todoModel,
         "todoChildCounter" => "edited")
         , true);
       break;
     }
     echo CJSON::encode(array(
       'success' => true,
       'data_source' => $dataSource,
       'source_pk_id' => $sourcePkId,
       '_post_row' => $postRow));
    }
   } else {
    echo CActiveForm::validate(array($todoModel));
   }
  }
  Yii::app()->end();
 }

 public function editComment($dataSource, $sourcePkId, $sourceType) {
  if (isset($_POST['Comment'])) {
   $commentModel = Comment::model()->findByPk($sourcePkId);
   $commentModel->attributes = $_POST["Comment"];
   if ($commentModel->validate()) {
    if ($commentModel->save()) {
     $postRow;
     switch ($sourceType) {
      case Type::$SOURCE_TYPE_PARENT:
       $postRow = $this->renderPartial('comment.views.comment.activity._comment_parent', array(
         'comment' => $commentModel,
         'commentCounter' => "edited")
         , true);
       break;
      case Type::$SOURCE_TYPE_CHILD:
       $postRow = $this->renderPartial('comment.views.comment.activity._comment_child', array(
         "commentChild" => $commentModel,
         "commentChildCounter" => "edited")
         , true);
       break;
     }
     echo CJSON::encode(array(
       'success' => true,
       'data_source' => $dataSource,
       'source_pk_id' => $sourcePkId,
       '_post_row' => $postRow));
    }
   } else {
    echo CActiveForm::validate(array($commentModel));
   }
  }
  Yii::app()->end();
 }

 public function editContributor($dataSource, $sourcePkId, $sourceType) {
  if (isset($_POST['Contributor'])) {
   $contributorModel = Contributor::model()->findByPk($sourcePkId);
   $contributorModel->attributes = $_POST["Contributor"];
   if ($contributorModel->validate()) {
    if ($contributorModel->save()) {
     $postRow;
     switch ($sourceType) {
      case Type::$SOURCE_TYPE_PARENT:
       $postRow = $this->renderPartial('contributor.views.contributor.activity._contributor_parent', array(
         'contributor' => $contributorModel,
         'contributorCounter' => "edited")
         , true);
       break;
      case Type::$SOURCE_TYPE_CHILD:
       $postRow = $this->renderPartial('contributor.views.contributor.activity._contributor_child', array(
         "contributorChild" => $contributorModel,
         "contributorChildCounter" => "edited")
         , true);
       break;
     }
     echo CJSON::encode(array(
       'success' => true,
       'data_source' => $dataSource,
       'source_pk_id' => $sourcePkId,
       '_post_row' => $postRow));
    }
   } else {
    echo CActiveForm::validate(array($contributorModel));
   }
  }
  Yii::app()->end();
 }

 public function editNote($dataSource, $sourcePkId, $sourceType) {
  if (isset($_POST['Note'])) {
   $noteModel = Note::model()->findByPk($sourcePkId);
   $noteModel->description = $_POST["Note"]["description"];
   if ($noteModel->validate()) {
    if ($noteModel->save()) {
     $postRow;
     switch ($sourceType) {
      case Type::$SOURCE_TYPE_PARENT:
       $postRow = $this->renderPartial('note.views.note.activity._note_parent', array(
         'note' => $noteModel,
         'noteCounter' => "edited")
         , true);
       break;
      case Type::$SOURCE_TYPE_CHILD:
       $postRow = $this->renderPartial('note.views.note.activity._note_child', array(
         "noteChild" => $noteModel,
         "noteChildCounter" => "edited")
         , true);
       break;
     }
     echo CJSON::encode(array(
       'success' => true,
       'data_source' => $dataSource,
       'source_pk_id' => $sourcePkId,
       '_post_row' => $postRow));
    }
   } else {
    echo CActiveForm::validate(array($noteModel));
   }
  }
  Yii::app()->end();
 }

 public function editDiscussion($dataSource, $sourcePkId, $sourceType) {
  if (isset($_POST['Discussion'])) {
   $discussionModel = Discussion::model()->findByPk($sourcePkId);
   $discussionModel->description = $_POST["Discussion"]["description"];
   if ($discussionModel->validate()) {
    if ($discussionModel->save()) {
     $postRow;
     switch ($sourceType) {
      case Type::$SOURCE_TYPE_PARENT:
       $postRow = $this->renderPartial('discussion.views.discussion.activity._discussion_parent', array(
         'discussion' => $discussionModel,
         'discussionCounter' => "edited")
         , true);
       break;
      case Type::$SOURCE_TYPE_CHILD:
       $postRow = $this->renderPartial('discussion.views.discussion.activity._discussion_child', array(
         "discussionChild" => $discussionModel,
         "discussionChildCounter" => "edited")
         , true);
       break;
     }
     echo CJSON::encode(array(
       'success' => true,
       'data_source' => $dataSource,
       'source_pk_id' => $sourcePkId,
       '_post_row' => $postRow));
    }
   } else {
    echo CActiveForm::validate(array($discussionModel));
   }
  }
  Yii::app()->end();
 }

 public function editQuestionnaire($dataSource, $sourcePkId, $sourceType) {
  if (isset($_POST['Questionnaire'])) {
   $questionnaireModel = Questionnaire::model()->findByPk($sourcePkId);
   $questionnaireModel->description = $_POST["Questionnaire"]["description"];
   if ($questionnaireModel->validate()) {
    if ($questionnaireModel->save()) {
     $postRow;
     switch ($sourceType) {
      case Type::$SOURCE_TYPE_PARENT:
       $postRow = $this->renderPartial('questionnaire.views.questionnaire.activity._questionnaire_parent', array(
         'questionnaire' => $questionnaireModel,
         'questionnaireCounter' => "edited")
         , true);
       break;
      case Type::$SOURCE_TYPE_CHILD:
       $postRow = $this->renderPartial('questionnaire.views.questionnaire.activity._questionnaire_child', array(
         "questionnaireChild" => $questionnaireModel,
         "questionnaireChildCounter" => "edited")
         , true);
       break;
     }
     echo CJSON::encode(array(
       'success' => true,
       'data_source' => $dataSource,
       'source_pk_id' => $sourcePkId,
       '_post_row' => $postRow));
    }
   } else {
    echo CActiveForm::validate(array($questionnaireModel));
   }
  }
  Yii::app()->end();
 }

 public function editWeblink($dataSource, $sourcePkId, $sourceType) {
  if (isset($_POST['Weblink'])) {
   $weblinkModel = Weblink::model()->findByPk($sourcePkId);
   $weblinkModel->attributes = $_POST["Weblink"];
   if ($weblinkModel->validate()) {
    if ($weblinkModel->save()) {
     $postRow;
     switch ($sourceType) {
      case Type::$SOURCE_TYPE_PARENT:
       $postRow = $this->renderPartial('weblink.views.weblink.activity._weblink_parent', array(
         'weblink' => $weblinkModel,
         'weblinkCounter' => "edited")
         , true);
       break;
      case Type::$SOURCE_TYPE_CHILD:
       $postRow = $this->renderPartial('weblink.views.weblink.activity._weblink_child', array(
         "weblinkChild" => $weblinkModel,
         "weblinkChildCounter" => "edited")
         , true);
       break;
     }
     echo CJSON::encode(array(
       'success' => true,
       'data_source' => $dataSource,
       'source_pk_id' => $sourcePkId,
       '_post_row' => $postRow));
    }
   } else {
    echo CActiveForm::validate(array($weblinkModel));
   }
  }
  Yii::app()->end();
 }

 public function editTimeline($dataSource, $sourcePkId) {
  if (isset($_POST['Timeline']) && isset($_POST['MentorshipTimeline'])) {
   $mentorshipTimelineModel = MentorshipTimeline::model()->findByPk($sourcePkId);
   $timelineModel = $mentorshipTimelineModel->timeline;
   $timelineModel->attributes = $_POST['Timeline'];
   $mentorshipTimelineModel->attributes = $_POST['MentorshipTimeline'];
   if ($mentorshipTimelineModel->validate() && $timelineModel->validate()) {
    if ($timelineModel->save(false)) {
     $mentorshipTimelineModel->save(false);
     echo CJSON::encode(array(
       'success' => true,
       'data_source' => $dataSource,
       'source_pk_id' => 0,
       '_post_row' => $this->renderPartial('mentorship.views.mentorship._mentorship_timeline_item_row', array(
         'mentorshipTimeline' => MentorshipTimeline::getMentorshipTimeline($mentorshipTimelineModel->mentorship_id),
         )
         , true)
     ));
    }
   } else {
    echo CActiveForm::validate(array($mentorshipTimelineModel, $timelineModel));
   }
  }

  Yii::app()->end();
 }

 public function getRequestPostRow($dataSource, $sourcePkId, $type) {
  switch ($dataSource) {
   case Type::$SOURCE_MENTOR_REQUESTS:
    $mentorship = Mentorship::model()->findByPk($sourcePkId);
    echo CJSON::encode(array(
      'success' => true,
      'data_source' => $dataSource,
      'source_pk_id' => 0,
      "_post_row" => $this->renderPartial('mentorship.views.mentorship._mentorship_mentor_requests', array(
        "mentorshipRequests" => Notification::getRequestStatus(array($type), $sourcePkId, null, true),
        "mentorship" => $mentorship)
        , true)
    ));
    break;
   case Type::$SOURCE_MENTEE_REQUESTS:
    $mentorship = Mentorship::model()->findByPk($sourcePkId);
    echo CJSON::encode(array(
      'success' => true,
      'data_source' => $dataSource,
      'source_pk_id' => 0,
      "_post_row" => $this->renderPartial('mentorship.views.mentorship._mentorship_mentee_requests', array(
        "mentorshipRequests" => Notification::getRequestStatus(array($type), $sourcePkId, null, true),
        "mentorship" => $mentorship)
        , true)
    ));
    break;
   case Type::$SOURCE_MENTORSHIP_ASSIGNMENT_REQUESTS:
    $mentorship = Mentorship::model()->findByPk($sourcePkId);
    echo CJSON::encode(array(
      'success' => true,
      'data_source' => $dataSource,
      'source_pk_id' => 0,
      "_post_row" => $this->renderPartial('mentorship.views.mentorship._mentorship_assignment_requests', array(
        "mentorshipRequests" => Notification::getRequestStatus(array($type), $sourcePkId, null, true),
        "mentorship" => $mentorship)
        , true)
    ));
    break;

   case Type::$SOURCE_PROJECT_MEMBER_REQUESTS:
    $project = Project::model()->findByPk($sourcePkId);
    echo CJSON::encode(array(
      'success' => true,
      'data_source' => $dataSource,
      'source_pk_id' => 0,
      "_post_row" => $this->renderPartial('project.views.project._project_member_requests', array(
        "projectMemberRequests" => Notification::getRequestStatus(array($type), $sourcePkId, null, true),
        "project" => $project)
        , true)
    ));
    break;
   case Type::$SOURCE_SKILL_ASSIGN_REQUESTS:
    echo CJSON::encode(array(
      'success' => true,
      'data_source' => $dataSource,
      'source_pk_id' => 0,
      "_post_row" => $this->renderPartial('project.views.project._project_member_requests', array(
        "projectMemberRequests" => Notification::getRequestStatus(array($type), $sourcePkId, null, true),
        "project" => $project)
        , true)
    ));
    break;
   case Type::$SOURCE_JUDGE_REQUESTS:
    echo CJSON::encode(array(
      'success' => true,
      'data_source' => $dataSource,
      'source_pk_id' => 0,
      "_post_row" => $this->renderPartial('skill.views.skill._skill_contributor_requests', array(
        "skillContributorRequests" => Notification::getRequestStatus(array($type), $sourcePkId, null, true),
        "skill" => Skill::model()->findByPk($sourcePkId))
        , true)
    ));
    break;
   case Type::$SOURCE_OBSERVER_REQUESTS:
    echo CJSON::encode(array(
      'success' => true,
      'data_source' => $dataSource,
      'source_pk_id' => 0,
      "_post_row" => $this->renderPartial('skill.views.skill._skill_observer_requests', array(
        "skillObserverRequests" => Notification::getRequestStatus(array($type), $sourcePkId, null, true),
        "skill" => Skill::model()->findByPk($sourcePkId))
        , true)
    ));
    break;
  }
 }

}
