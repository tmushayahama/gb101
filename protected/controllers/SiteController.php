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

  $skillLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name");
  $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name");

  $bankSearchCriteria = Bank::getBankSearchCriteria(SkillType::$CATEGORY_SKILL, null, 100);

  $this->render('home', array(
    'postShares' => PostShare::getPostShare(),
    'skillModel' => $skillModel,
    'mentorshipModel' => $mentorshipModel,
    'projectModel' => new Project(),
    'skillTypes' => SkillType::Model()->findAll(),
    'people' => Profile::getPeople(true),
    'skillLevelList' => $skillLevelList,
    'skillBank' => Bank::model()->findAll($bankSearchCriteria),
    'requestModel' => new Notification(),
    'tags' => Tag::getAllTags()
    // 'requests' => Notification::getNotifications(null, 6),
  ));
 }

 public function actionEditMe($dataSource, $sourcePk, $sourceType) {
  if (Yii::app()->request->isAjaxRequest) {
   switch ($dataSource) {
    case Type::$SOURCE_COMMENT:
     $this->editComment($dataSource, $sourcePk, $sourceType);
     break;
    case Type::$SOURCE_CONTRIBUTOR:
     $this->editContributor($dataSource, $sourcePk, $sourceType);
     break;
    case Type::$SOURCE_TODO:
     $this->editTodo($dataSource, $sourcePk, $sourceType);
     break;
    case Type::$SOURCE_NOTE:
     $this->editNote($dataSource, $sourcePk, $sourceType);
     break;
    case Type::$SOURCE_DISCUSSION:
     $this->editDiscussion($dataSource, $sourcePk, $sourceType);
     break;
    case Type::$SOURCE_QUESTIONNAIRE:
     $this->editQuestionnaire($dataSource, $sourcePk, $sourceType);
     break;
    case Type::$SOURCE_WEBLINK:
     $this->editWeblink($dataSource, $sourcePk, $sourceType);
     break;
    case Type::$SOURCE_SKILL:
     $this->editSkill($dataSource, $sourcePk, $sourceType);
     break;
   }
  }
 }

 public function actionAppendMore() {
  if (Yii::app()->request->isAjaxRequest) {
   $dataSource = Yii::app()->request->getParam('data_source');
   $sourcePk = Yii::app()->request->getParam('source_pk_id');
   $offset = Yii::app()->request->getParam('offset');
   $postRow;
   switch ($dataSource) {
    case Type::$SOURCE_SKILL_COMMENT:
     $postRow = $this->renderPartial('skill.views.skill.activity.comment._skill_comments', array(
       "skillComments" => SkillComment::getSkillParentComments($sourcePk, Comment::$COMMENTS_PER_PAGE, $offset),
       "skillCommentsCount" => SkillComment::getSkillParentCommentsCount($sourcePk),
       "skillId" => $sourcePk,
       "offset" => $offset,
       ), true);
     break;
    case Type::$SOURCE_SKILL_CONTRIBUTOR:
     $postRow = $this->renderPartial('skill.views.skill.activity.contributor._skill_contributors', array(
       "skillContributors" => SkillContributor::getSkillParentContributors($sourcePk, Contributor::$CONTRIBUTORS_PER_PAGE, $offset),
       "skillContributorsCount" => SkillContributor::getSkillParentContributorsCount($sourcePk),
       "skillId" => $sourcePk,
       "offset" => $offset,
       ), true);
     break;
    case Type::$SOURCE_SKILL_TODO:
     $postRow = $this->renderPartial('skill.views.skill.activity.todo._skill_todos', array(
       "skillTodos" => SkillTodo::getSkillParentTodos($sourcePk, Todo::$TODOS_PER_PAGE, $offset),
       "skillTodosCount" => SkillTodo::getSkillParentTodosCount($sourcePk),
       "skillId" => $sourcePk,
       "offset" => $offset,
       ), true);
     break;
    case Type::$SOURCE_SKILL_NOTE:
     $postRow = $this->renderPartial('skill.views.skill.activity.note._skill_notes', array(
       "skillNotes" => SkillNote::getSkillParentNotes($sourcePk, Note::$TODOS_PER_PAGE, $offset),
       "skillNotesCount" => SkillNote::getSkillParentNotesCount($sourcePk),
       "skillId" => $sourcePk,
       "offset" => $offset,
       ), true);
     break;
    case Type::$SOURCE_SKILL_DISCUSSION:
     $postRow = $this->renderPartial('skill.views.skill.activity.discussion._skill_discussions', array(
       "skillDiscussions" => SkillDiscussion::getSkillParentDiscussions($sourcePk, Discussion::$DISCUSSIONS_PER_PAGE, $offset),
       "skillDiscussionsCount" => SkillDiscussion::getSkillParentDiscussionsCount($sourcePk),
       "skillId" => $sourcePk,
       "offset" => $offset,
       ), true);
     break;
    case Type::$SOURCE_SKILL_WEBLINK:
     $postRow = $this->renderPartial('skill.views.skill.activity.weblink._skill_weblinks', array(
       "skillWeblinks" => SkillWeblink::getSkillParentWeblinks($sourcePk, Weblink::$WEBLINKS_PER_PAGE, $offset),
       "skillWeblinksCount" => SkillWeblink::getSkillParentWeblinksCount($sourcePk),
       "skillId" => $sourcePk,
       "offset" => $offset,
       ), true);
     break;
    case Type::$SOURCE_SKILL_QUESTIONNAIRE:
     $postRow = $this->renderPartial('skill.views.skill.activity.questionnaire._skill_questionnaires', array(
       "skillQuestionnaires" => SkillQuestionnaire::getSkillParentQuestionnaires($sourcePk, Questionnaire::$QUESTIONNAIRES_PER_PAGE, $offset),
       "skillQuestionnairesCount" => SkillQuestionnaire::getSkillParentQuestionnairesCount($sourcePk),
       "skillId" => $sourcePk,
       "offset" => $offset,
       ), true);
     break;
    case Type::$SOURCE_SKILL:
     Skill::deleteSkill($sourcePk);
     break;
    case Type::$SOURCE_MENTORSHIP:
     Mentorship::deleteMentorship($sourcePk);
     break;
    case Type::$SOURCE_PAGE:
     AdvicePage::deleteAdvicePage($sourcePk);
     break;
    case Type::$SOURCE_ANSWER:
     MentorshipAnswer::deleteMentorshipAnswer($sourcePk);
     break;
    case Type::$SOURCE_TIMELINE:
     $mentorshipId = MentorshipTimeline::deleteMentorshipTimeline($sourcePk);
     $replaceWithRow = $this->renderPartial('mentorship.views.mentorship._mentorship_timeline_item_row', array(
       'mentorshipTimeline' => MentorshipTimeline::getMentorshipTimeline($mentorshipId),
       )
       , true);
     break;
    case Type::$SOURCE_TODO:
     Todo::deleteTodo($sourcePk);
     break;
    case Type::$SOURCE_DISCUSSION_TITLE:
     DiscussionTitle::deleteDiscussionTitle($sourcePk);
     break;
    case Type::$SOURCE_DISCUSSION_POST:
     Discussion::deleteDiscussion($sourcePk);
     break;
    case Type::$SOURCE_WEBLINK:
     Weblink::deleteWeblink($sourcePk);
     break;
    case Type::$SOURCE_NOTIFICATION:
     Notification::deleteNotification($sourcePk);
     break;
   }

   echo CJSON::encode(array(
     'data_source' => $dataSource,
     'source_pk_id' => $sourcePk,
     '_post_row' => $postRow,
   ));
   Yii::app()->end();
  }
 }

 public function actionDeleteMe() {
  if (Yii::app()->request->isAjaxRequest) {
   $dataSource = Yii::app()->request->getParam('data_source');
   $sourcePk = Yii::app()->request->getParam('source_pk_id');
   $replaceWithRow = null;
   switch ($dataSource) {
    case Type::$SOURCE_COMMENT:
     Comment::deleteComment($sourcePk);
     break;
    case Type::$SOURCE_CONTRIBUTOR:
     Contributor::deleteContributor($sourcePk);
     break;
    case Type::$SOURCE_DISCUSSION:
     Discussion::deleteDiscussion($sourcePk);
     break;
    case Type::$SOURCE_NOTE:
     Note::deleteNote($sourcePk);
     break;
    case Type::$SOURCE_NOTIFICATION:
     Notification::deleteNotification($sourcePk);
     break;
    case Type::$SOURCE_QUESTIONNAIRE:
     Questionnaire::deleteQuestionnaire($sourcePk);
     break;
    case Type::$SOURCE_TODO:
     Todo::deleteTodo($sourcePk);
     break;
    case Type::$SOURCE_SKILL:
     Skill::deleteSkill($sourcePk);
     break;
    case Type::$SOURCE_TODO:
     Todo::deleteTodo($sourcePk);
     break;
    case Type::$SOURCE_WEBLINK:
     Weblink::deleteWeblink($sourcePk);
     break;
   }
   echo CJSON::encode(array(
     'data_source' => $dataSource,
     'source_pk_id' => $sourcePk,
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

 public function actionPopulateData() {
  if (Yii::app()->request->isAjaxRequest) {
   $sourcePk = Yii::app()->request->getParam('source_pk');
   $source = Yii::app()->request->getParam('source');
   $requests = Notification::getNotifications($source, null, $sourcePk, 10);
   $requestsCount = Notification::getNotificationsCount($source, null, $sourcePk);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('skill.views.skill.activity.contributor.requests._skill_contributor_requests', array(
       "requests" => $requests,
       "requestsCount" => $requestsCount,
       "sourceId" => $source,
       "offset" => 0)
       , true)
     )
   );
   Yii::app()->end();
  }
 }

 public function actionGetSelectPeopleList() {
  if (Yii::app()->request->isAjaxRequest) {
   $sourcePk = Yii::app()->request->getParam('source_pk_id');
   $type = Yii::app()->request->getParam('source');
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('application.views.site._select_people_list', array(
       "people" => Profile::getPeople(true),
       "type" => $type,
       "sourcePk" => $sourcePk)
       , true)
     )
   );
   Yii::app()->end();
  }
 }

 public function actionSendRequest() {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST['Notification'])) {
    if (isset($_POST['gb-send-request-recepients'])) {
     $sourcePk = $_POST['Notification']['source_id'];
     $type = $_POST['Notification']['type_id'];
     Notification::setNotification(
       $_POST['Notification']['message']
       , $sourcePk
       , $type
       , Yii::app()->user->id
       , $_POST['gb-send-request-recepients']);
     // Post::addPostAfterRequest($sourcePk, $type, $_POST['gb-send-request-recepients']);
     $this->getRequestPostRow();
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

 public function editSkill($dataSource, $sourcePk) {
  if (isset($_POST['Skill']) && isset($_POST['Skill'])) {
   $skillModel = Skill::model()->findByPk($sourcePk);
   $skillModel = $skillModel->skill;
   $skillModel->attributes = $_POST['Skill'];
   $skillModel->attributes = $_POST['Skill'];

   if ($skillModel->validate() && $skillModel->validate()) {
    if ($skillModel->save()) {
     if ($skillModel->save()) {
      echo CJSON::encode(array(
        'success' => true,
        'data_source' => $dataSource,
        'source_pk_id' => $sourcePk,
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

 public function editTodo($dataSource, $sourcePk, $sourceType) {
  if (isset($_POST['Todo'])) {
   $todoModel = Todo::model()->findByPk($sourcePk);
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
       'source_pk_id' => $sourcePk,
       '_post_row' => $postRow));
    }
   } else {
    echo CActiveForm::validate(array($todoModel));
   }
  }
  Yii::app()->end();
 }

 public function editComment($dataSource, $sourcePk, $sourceType) {
  if (isset($_POST['Comment'])) {
   $commentModel = Comment::model()->findByPk($sourcePk);
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
       'source_pk_id' => $sourcePk,
       '_post_row' => $postRow));
    }
   } else {
    echo CActiveForm::validate(array($commentModel));
   }
  }
  Yii::app()->end();
 }

 public function editContributor($dataSource, $sourcePk, $sourceType) {
  if (isset($_POST['Contributor'])) {
   $contributorModel = Contributor::model()->findByPk($sourcePk);
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
       'source_pk_id' => $sourcePk,
       '_post_row' => $postRow));
    }
   } else {
    echo CActiveForm::validate(array($contributorModel));
   }
  }
  Yii::app()->end();
 }

 public function editNote($dataSource, $sourcePk, $sourceType) {
  if (isset($_POST['Note'])) {
   $noteModel = Note::model()->findByPk($sourcePk);
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
       'source_pk_id' => $sourcePk,
       '_post_row' => $postRow));
    }
   } else {
    echo CActiveForm::validate(array($noteModel));
   }
  }
  Yii::app()->end();
 }

 public function editDiscussion($dataSource, $sourcePk, $sourceType) {
  if (isset($_POST['Discussion'])) {
   $discussionModel = Discussion::model()->findByPk($sourcePk);
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
       'source_pk_id' => $sourcePk,
       '_post_row' => $postRow));
    }
   } else {
    echo CActiveForm::validate(array($discussionModel));
   }
  }
  Yii::app()->end();
 }

 public function editQuestionnaire($dataSource, $sourcePk, $sourceType) {
  if (isset($_POST['Questionnaire'])) {
   $questionnaireModel = Questionnaire::model()->findByPk($sourcePk);
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
       'source_pk_id' => $sourcePk,
       '_post_row' => $postRow));
    }
   } else {
    echo CActiveForm::validate(array($questionnaireModel));
   }
  }
  Yii::app()->end();
 }

 public function editWeblink($dataSource, $sourcePk, $sourceType) {
  if (isset($_POST['Weblink'])) {
   $weblinkModel = Weblink::model()->findByPk($sourcePk);
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
       'source_pk_id' => $sourcePk,
       '_post_row' => $postRow));
    }
   } else {
    echo CActiveForm::validate(array($weblinkModel));
   }
  }
  Yii::app()->end();
 }

 public function editTimeline($dataSource, $sourcePk) {
  if (isset($_POST['Timeline']) && isset($_POST['MentorshipTimeline'])) {
   $mentorshipTimelineModel = MentorshipTimeline::model()->findByPk($sourcePk);
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

 public function getRequestPostRow() {
  echo CJSON::encode(array(
    "success" => true,
    "notify_title" => "Request Sent",
    "notify_description" => "Your request has been sent",
  ));
 }

}
