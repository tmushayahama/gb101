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
      'actions' => array(
        'skills',
        'skillsWelcome',
        'skillAppOverview',
        'skillApps',
        'skillContent',
        'skillContribution',
        'skillSettings',
        'skillTimeline',
        'skillContributors',
        'skillComments',
        'skillTodos',
        'skillDiscussions',
        'skillPlay',
        'skillPlayHistory',
        'skillQuestionnaire',
        'skillQuestions',
        'skillNotes',
        'skillWeblinks',
        'skillObserver'),
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
     "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_1.css',
     "selected_tab_url" => "skill",
     "_post_row" => $this->renderPartial('skill.views.skill.tabs.skills_tab._skill_app_overview_pane', array(
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
     "_post_row" => $this->renderPartial('skill.views.skill.tabs.skills_tab._skill_list_pane', array(
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
     "_post_row" => $this->renderPartial('skill.views.skill.tabs.skill_tab._skill_item_pane', array(
       'skill' => $skill,
       'skillId' => $skill->id,
       "skillLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
       //CONTRIBUTOR
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "skillContributors" => $skill->getSkillParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "skillContributorsCount" => $skill->getSkillParentContributorsCount(),
       //COMMENT
       'commentModel' => new Comment(),
       'skillComments' => $skill->getSkillParentComments(Comment::$COMMENTS_PER_PAGE),
       'skillCommentsCount' => $skill->getSkillParentCommentsCount(),
       //DISCUSSION
       "discussionModel" => new Discussion(),
       'skillDiscussions' => $skill->getSkillParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'skillDiscussionsCount' => $skill->getSkillParentDiscussionsCount(),
       //MENTORSHIPS
       "mentorshipSkillModel" => new MentorshipSkill(),
       "mentorshipLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name"),
       "mentorshipSkills" => $skill->getMentorshipSkills(6),
       "mentorshipSkillsCount" => $skill->getMentorshipSkillsCount(),
       //NOTES
       "noteModel" => new Note(),
       'skillNotes' => $skill->getSkillParentNotes(Note::$NOTES_PER_PAGE),
       'skillNotesCount' => $skill->getSkillParentNotesCount(),
       //TODO
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'skillTodos' => $skill->getSkillParentTodos(Todo::$TODOS_PER_PAGE),
       'skillTodosCount' => $skill->getSkillParentTodosCount(),
       //WEBLINKS
       "weblinkModel" => new Weblink(),
       'skillWeblinks' => $skill->getSkillParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'skillWeblinksCount' => $skill->getSkillParentWeblinksCount(),
       //TIMELINE
       'timelineModel' => new Timeline(),
       'skillTimelineDays' => $skill->getSkillParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'skillTimelineDaysCount' => $skill->getSkillParentTimelinesCount(),
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
     "_post_row" => $this->renderPartial('skill.views.skill.tabs.skill_item_tab._skill_item_overview_pane', array(
       'skill' => $skill,
       'skillId' => $skill->id,
       "skillLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
       //CONTRIBUTOR
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "skillContributors" => $skill->getSkillParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "skillContributorsCount" => $skill->getSkillParentContributorsCount(),
       //COMMENT
       'commentModel' => new Comment(),
       'skillComments' => $skill->getSkillParentComments(Comment::$COMMENTS_PER_PAGE),
       'skillCommentsCount' => $skill->getSkillParentCommentsCount(),
       //DISCUSSION
       "discussionModel" => new Discussion(),
       'skillDiscussions' => $skill->getSkillParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'skillDiscussionsCount' => $skill->getSkillParentDiscussionsCount(),
       //MENTORSHIPS
       "mentorshipSkillModel" => new MentorshipSkill(),
       "mentorshipLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name"),
       "mentorshipSkills" => $skill->getMentorshipSkills(6),
       "mentorshipSkillsCount" => $skill->getMentorshipSkillsCount(),
//NOTES
       "noteModel" => new Note(),
       'skillNotes' => $skill->getSkillParentNotes(Note::$NOTES_PER_PAGE),
       'skillNotesCount' => $skill->getSkillParentNotesCount(),
       //TODO
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'skillTodos' => $skill->getSkillParentTodos(Todo::$TODOS_PER_PAGE),
       'skillTodosCount' => $skill->getSkillParentTodosCount(),
       //WEBLINKS
       "weblinkModel" => new Weblink(),
       'skillWeblinks' => $skill->getSkillParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'skillWeblinksCount' => $skill->getSkillParentWeblinksCount(),
       //TIMELINE
       'timelineModel' => new Timeline(),
       'skillTimelineDays' => $skill->getSkillParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'skillTimelineDaysCount' => $skill->getSkillParentTimelinesCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillContent($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   //$skillChecklistsCount = $skill->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('skill.views.skill.tabs.skill_item_tab._skill_item_content_pane', array(
       'skill' => $skill,
       'skillId' => $skill->id,
       "skillLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
       //CONTRIBUTOR
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "skillContributors" => $skill->getSkillParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "skillContributorsCount" => $skill->getSkillParentContributorsCount(),
       //COMMENT
       'commentModel' => new Comment(),
       'skillComments' => $skill->getSkillParentComments(Comment::$COMMENTS_PER_PAGE),
       'skillCommentsCount' => $skill->getSkillParentCommentsCount(),
       //DISCUSSION
       "discussionModel" => new Discussion(),
       'skillDiscussions' => $skill->getSkillParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'skillDiscussionsCount' => $skill->getSkillParentDiscussionsCount(),
       //NOTES
       "noteModel" => new Note(),
       'skillNotes' => $skill->getSkillParentNotes(Note::$NOTES_PER_PAGE),
       'skillNotesCount' => $skill->getSkillParentNotesCount(),
       //TODO
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'skillTodos' => $skill->getSkillParentTodos(Todo::$TODOS_PER_PAGE),
       'skillTodosCount' => $skill->getSkillParentTodosCount(),
       //WEBLINKS
       "weblinkModel" => new Weblink(),
       'skillWeblinks' => $skill->getSkillParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'skillWeblinksCount' => $skill->getSkillParentWeblinksCount(),
       //TIMELINE
       'timelineModel' => new Timeline(),
       'skillTimelineDays' => $skill->getSkillParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'skillTimelineDaysCount' => $skill->getSkillParentTimelinesCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillContribution($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   //$skillChecklistsCount = $skill->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('skill.views.skill.tabs.skill_item_tab._skill_item_contribution_pane', array(
       'skill' => $skill,
       'skillId' => $skill->id,
       "skillLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
       //CONTRIBUTOR
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "skillContributors" => $skill->getSkillParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "skillContributorsCount" => $skill->getSkillParentContributorsCount(),
       //COMMENT
       'commentModel' => new Comment(),
       'skillComments' => $skill->getSkillParentComments(Comment::$COMMENTS_PER_PAGE),
       'skillCommentsCount' => $skill->getSkillParentCommentsCount(),
       //DISCUSSION
       "discussionModel" => new Discussion(),
       'skillDiscussions' => $skill->getSkillParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'skillDiscussionsCount' => $skill->getSkillParentDiscussionsCount(),
       //NOTES
       "noteModel" => new Note(),
       'skillNotes' => $skill->getSkillParentNotes(Note::$NOTES_PER_PAGE),
       'skillNotesCount' => $skill->getSkillParentNotesCount(),
       //TODO
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'skillTodos' => $skill->getSkillParentTodos(Todo::$TODOS_PER_PAGE),
       'skillTodosCount' => $skill->getSkillParentTodosCount(),
       //WEBLINKS
       "weblinkModel" => new Weblink(),
       'skillWeblinks' => $skill->getSkillParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'skillWeblinksCount' => $skill->getSkillParentWeblinksCount(),
       //TIMELINE
       'timelineModel' => new Timeline(),
       'skillTimelineDays' => $skill->getSkillParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'skillTimelineDaysCount' => $skill->getSkillParentTimelinesCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillSettings($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   //$skillChecklistsCount = $skill->getChecklistsCount();
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('skill.views.skill.tabs.skill_item_tab._skill_item_settings_pane', array(
       'skill' => $skill,
       'skillId' => $skill->id,
       "skillLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
       //CONTRIBUTOR
       "contributorModel" => new Contributor(),
       "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
       "skillContributors" => $skill->getSkillParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
       "skillContributorsCount" => $skill->getSkillParentContributorsCount(),
       //COMMENT
       'commentModel' => new Comment(),
       'skillComments' => $skill->getSkillParentComments(Comment::$COMMENTS_PER_PAGE),
       'skillCommentsCount' => $skill->getSkillParentCommentsCount(),
       //DISCUSSION
       "discussionModel" => new Discussion(),
       'skillDiscussions' => $skill->getSkillParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
       'skillDiscussionsCount' => $skill->getSkillParentDiscussionsCount(),
       //NOTES
       "noteModel" => new Note(),
       'skillNotes' => $skill->getSkillParentNotes(Note::$NOTES_PER_PAGE),
       'skillNotesCount' => $skill->getSkillParentNotesCount(),
       //TODO
       "todoModel" => new Todo(),
       "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
       'skillTodos' => $skill->getSkillParentTodos(Todo::$TODOS_PER_PAGE),
       'skillTodosCount' => $skill->getSkillParentTodosCount(),
       //WEBLINKS
       "weblinkModel" => new Weblink(),
       'skillWeblinks' => $skill->getSkillParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
       'skillWeblinksCount' => $skill->getSkillParentWeblinksCount(),
       //TIMELINE
       'timelineModel' => new Timeline(),
       'skillTimelineDays' => $skill->getSkillParentTimelines(Timeline::$TIMELINES_PER_OVERVIEW_PAGE),
       'skillTimelineDaysCount' => $skill->getSkillParentTimelinesCount(),
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillApps($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
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
     "_post_row" => $this->renderPartial('skill.views.skill.activity.contributor._skill_contributors_section', array(
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
     "_post_row" => $this->renderPartial('skill.views.skill.activity.comment._skill_comments_section', array(
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
     "_post_row" => $this->renderPartial('skill.views.skill.activity.todo._skill_todos_section', array(
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
     "_post_row" => $this->renderPartial('skill.views.skill.activity.discussion._skill_discussions_section', array(
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
     "_post_row" => $this->renderPartial('skill.views.skill.activity.note._skill_notes_section', array(
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

 public function actionSkillPlay() {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('skill.views.skill.activity.skill._skill_play', array(
       "actionUrl" => Yii::app()->createUrl("skill/skill/addSkillPlayAnswer", array()),
       "skillPlayAnswerModel" => new SkillPlayAnswer(),
       "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
       )
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillPlayHistory() {
  if (Yii::app()->request->isAjaxRequest) {
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('skill.views.skill.activity.skill._skill_play_history', array()
       , true)
   ));
   Yii::app()->end();
  }
 }

 public function actionSkillQuestionnaires($skillId) {
  if (Yii::app()->request->isAjaxRequest) {
   $skill = Skill::model()->findByPk($skillId);
   echo CJSON::encode(array(
     "_post_row" => $this->renderPartial('skill.views.skill.activity.questionnaire._skill_questionnaires_section', array(
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
     "_post_row" => $this->renderPartial('skill.views.skill.activity.weblink._skill_weblinks_section', array(
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
