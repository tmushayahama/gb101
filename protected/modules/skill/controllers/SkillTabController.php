<?php

class SkillTabController extends Controller {
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
      'actions' => array(),
      'users' => array('*'),
    ),
    array('allow', // allow authenticated user to perform 'create' and 'update' actions
      'actions' => array('skills', 'skillsWelcome', 'skillAppOverview', 'skillApps', 'skillTimeline', 'skillContributors',
        'skillComments', 'skillTodos', 'skillDiscussions', 'skillQuestionnaire', 'skillQuestions', 'skillNotes',
        'skillWeblinks', 'skillObserver'),
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

 public function actionSkillAppOverview() {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-main-tab-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.skills_tab._skill_app_overview_pane', array(
       "skills" => Skill::getSkills(null, Skill::$SKILLS_PER_PAGE),
       "skillLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
       "skillsCount" => Skill::getSkillsCount(),
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkills($levelId) {
  if (Yii::app()->request->isAjaxRequest) {
   $level = Level::model()->findByPk($levelId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skills-pane",
     "clear_tab_pane" => "#gb-skill-item-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.skills_tab._skill_list_pane', array(
       "skills" => Skill::getSkills($levelId, Skill::$SKILLS_PER_PAGE),
       "level" => $level,
       "skillsCount" => Skill::getSkillsCount($levelId),
       ), true),
     "_no_content_row" => $this->renderPartial('skill.views.skill.activity.skill._no_content_row', array(
       "type" => Type::$NO_CONTENT_SKILL,
       ), true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkill($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   //$skillChecklistsCount = $skill->getChecklistsCount();
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-item-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab._skill_item_pane', array(
       'skill' => $skill,
       "commentModel" => new Comment(),
       // 'skillChecklists' => $skill->getChecklists(Checklist::$CHECKLISTS_PER_OVERVIEW_PAGE),
       // 'skillChecklistsCount' => $skillChecklistsCount,
       // 'skillChecklistsProgressCount' => $skill->getProgress($skillChecklistsCount),
       //'skillContributors' => $skill->getContributors(null, 6),
       // 'skillContributorsCount' => $skill->getContributorsCount(),
       'skillComments' => $skill->getSkillParentComments(Comment::$COMMENTS_PER_OVERVIEW_PAGE),
       'skillCommentsCount' => $skill->getSkillParentCommentsCount(),
       // 'skillNotes' => $skill->getSkillParentNotes(Note::$NOTES_PER_OVERVIEW_PAGE),
       // 'skillNotesCount' => $skill->getSkillParentNotesCount(),
       //  'skillWeblinks' => $skill->getSkillParentWeblinks(3),
       // 'skillWeblinksCount' => $skill->getSkillParentWeblinksCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillOverview($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   // $skillChecklistsCount = $skill->getChecklistsCount();

   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-item-tab-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab.skill_item_tab._skill_item_overview_pane', array(
       'skill' => $skill,
       'commentModel' => new Comment(),
       // 'skillChecklists' => $skill->getChecklists(Checklist::$CHECKLISTS_PER_OVERVIEW_PAGE),
       // 'skillChecklistsCount' => $skillChecklistsCount,
       // 'skillChecklistsProgressCount' => $skill->getProgress($skillChecklistsCount),
       //'skillContributors' => $skill->getContributors(null, 6),
       // 'skillContributorsCount' => $skill->getContributorsCount(),
       'skillComments' => $skill->getSkillParentComments(Comment::$COMMENTS_PER_OVERVIEW_PAGE),
       'skillCommentsCount' => $skill->getSkillParentCommentsCount(),
       // 'skillNotes' => $skill->getSkillParentNotes(Note::$NOTES_PER_OVERVIEW_PAGE),
       // 'skillNotesCount' => $skill->getSkillParentNotesCount(),
       //  'skillWeblinks' => $skill->getSkillParentWeblinks(3),
       // 'skillWeblinksCount' => $skill->getSkillParentWeblinksCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillApps($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#skill-management-apps-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.apps_tab._skill_apps_pane', array(
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillTimeline($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "tab_pane_id" => "#skill-management-timeline-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.timeline_tab._skill_timeline_pane', array(
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillContributors($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-item-tab-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab.skill_item_tab._skill_item_contributors_pane', array(
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "skillContributors" => $skill->getSkillParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "skillContributorsCount" => $skill->getSkillParentContributorsCount(),
       "skillId" => $skillId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillComments($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-item-tab-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab.skill_item_tab._skill_item_comments_pane', array(
       "commentModel" => new Comment(),
       'skillComments' => $skill->getSkillParentComments(Comment::$COMMENTS_PER_PAGE),
       'skillCommentsCount' => $skill->getSkillParentCommentsCount(),
       'skillId' => $skillId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillTodos($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-item-tab-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab.skill_item_tab._skill_item_todos_pane', array(
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'skillTodos' => $skill->getSkillParentTodos(Todo::$TODOS_PER_PAGE),
       'skillTodosCount' => $skill->getSkillParentTodosCount(),
       'skillId' => $skillId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillDiscussions($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-item-tab-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab.skill_item_tab._skill_item_discussions_pane', array(
       "discussionModel" => new Discussion(),
       'skillDiscussions' => $skill->getSkillParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'skillDiscussionsCount' => $skill->getSkillParentDiscussionsCount(),
       'skillId' => $skillId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillNotes($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-item-tab-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab.skill_item_tab._skill_item_notes_pane', array(
       "noteModel" => new Note(),
       'skillNotes' => $skill->getSkillParentNotes(Note::$NOTES_PER_PAGE),
       'skillNotesCount' => $skill->getSkillParentNotesCount(),
       'skillId' => $skillId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillQuestionnaires($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-item-tab-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab.skill_item_tab._skill_item_questionnaires_pane', array(
       "questionnaireModel" => new Questionnaire(),
       'skillQuestionnaires' => $skill->getSkillParentQuestionnaires(Questionnaire::$QUESTIONNAIRES_PER_PAGE),
       'skillQuestionnairesCount' => $skill->getSkillParentQuestionnairesCount(),
       'skillId' => $skillId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillWeblinks($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   echo CJSON::encode(array(
     "tab_pane_id" => "#gb-skill-item-tab-pane",
     "_post_row" => $this->renderPartial('skill.views.skill.welcome_tab.skill_item_tab._skill_item_weblinks_pane', array(
       "weblinkModel" => new Weblink(),
       'skillWeblinks' => $skill->getSkillParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'skillWeblinksCount' => $skill->getSkillParentWeblinksCount(),
       'skillId' => $skillId
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

}
