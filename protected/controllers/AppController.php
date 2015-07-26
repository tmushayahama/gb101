<?php

class AppController extends Controller {

 /**
  * @return array action filters
  */
 public function filters() {
  return array(
    "accessControl", // perform access control for CRUD operations
    "postOnly + delete", // we only allow deletion via POST request
  );
 }

 /**
  * Specifies the access control rules.
  * This method is used by the "accessControl" filter.
  * @return array access control rules
  */
 public function accessRules() {
  return array(
    array("allow", // allow authenticated user to perform "create" and "update" actions
      "actions" => array(
        "skill",
        "goal",
        "mentorship",
        "profile",
        "community",
      ),
      "users" => array("@"),
    ),
    array("allow", // allow admin user to perform "admin" and "delete" actions
      "actions" => array("admin", "delete"),
      "users" => array("admin"),
    ),
    array("deny", // deny all users
      "users" => array("*"),
    ),
  );
 }

 public function actionProfile() {
  $this->render("application.views.site.app_home", array(
    "app_selected_tab_id" => "gb-tab-profile",
    "tab_url_suffix" => "profile",
    "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_1.css',
    "browse_url" => Yii::app()->createUrl("skill/skill/skillBrowse", array()),
    "app_tab" => $this->renderPartial('user.views.profile.owner._profile_owner_pane', array(
      "profile" => Profile::model()->findByPk(Yii::app()->user->id),
      ), true),
  ));
 }

 public function actionCommunity() {
  $this->render("application.views.site.app_home", array(
    "app_selected_tab_id" => "gb-tab-community",
    "tab_url_suffix" => "community",
    "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_5.css',
    "browse_url" => Yii::app()->createUrl("skill/skill/skillBrowse", array()),
    "app_tab" => $this->renderPartial('community.views.community.community_tab._community_overview_pane', array(
      'people' => Profile::getPeople(true),
      ), true),
  ));
 }

 public function actionSkill() {
  $skills = Skill::getSkills(null, Skill::$SKILLS_PER_PAGE);
  $skillsCount = Skill::getSkillsCount();
  $skillModel = new Skill();
  $skillLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name");
  $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name");

  $this->render("application.views.site.app_home", array(
    "skills" => $skills,
    "skillsCount" => $skillsCount,
    "skillModel" => new $skillModel,
    "skillLevelList" => $skillLevelList,
    "mentorshipLevelList" => $mentorshipLevelList,
    "app_selected_tab_id" => "gb-tab-skills",
    "tab_url_suffix" => "skill",
    "browse_url" => Yii::app()->createUrl("skill/skill/skillBrowse", array()),
    "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_4.css',
    "app_tab" => $this->renderPartial('skill.views.skill.tabs.skills_tab._skill_app_overview_pane', array(
      "skills" => $skills,
      "skillLevelList" => $skillLevelList,
      "mentorshipLevelList" => $mentorshipLevelList,
      "skillsCount" => $skillsCount,
      ), true),
  ));
 }

 public function actionGoal() {
  $goals = Goal::getGoals(null, Goal::$GOALS_PER_PAGE);
  $goalsCount = Goal::getGoalsCount();
  $goalModel = new Goal();
  $goalLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_GOAL), "id", "name");
  $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name");

  $this->render("application.views.site.app_home", array(
    "goals" => $goals,
    "goalsCount" => $goalsCount,
    "goalModel" => new $goalModel,
    "goalLevelList" => $goalLevelList,
    "mentorshipLevelList" => $mentorshipLevelList,
    "app_selected_tab_id" => "gb-tab-goals",
    "tab_url_suffix" => "goal",
    "browse_url" => Yii::app()->createUrl("goal/goal/goalBrowse", array()),
    "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_4.css',
    "app_tab" => $this->renderPartial('goal.views.goal.tabs.goals_tab._goal_app_overview_pane', array(
      "goals" => $goals,
      "goalLevelList" => $goalLevelList,
      "mentorshipLevelList" => $mentorshipLevelList,
      "goalsCount" => $goalsCount,
      ), true),
  ));
 }

 public function actionMentorship($mentorshipId = null) {
  $mentorships = Mentorship::getMentorships(null, null, Mentorship::$MENTORSHIPS_PER_PAGE);
  $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name");
  $mentorshipsCount = Mentorship::getMentorshipsCount();

  $app_tab;
  if ($mentorshipId) {
   $mentorship = Mentorship::model()->findByPk($mentorshipId);
   if ($mentorship == null) {
    throw new CHttpException(404, 'The specified post cannot be found.');
   }
   $app_tab = $this->renderPartial('mentorship.views.mentorship.tabs.mentorships_tab._mentorship_detail_pane', array(
     'mentorship' => $mentorship,
     "mentorshipChildren" => Mentorship::getMentorships(null, $mentorship->id, Mentorship::$MENTORSHIPS_PER_PAGE),
     "mentorshipChildrenCount" => Mentorship::getMentorshipsCount(null, $mentorship->id),
     "contributorModel" => new Contributor(),
     "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP_TYPE), "id", "name"),
     )
     , true);
  } else {
   $app_tab = $this->renderPartial('mentorship.views.mentorship.tabs.mentorships_tab._mentorship_app_overview_pane', array(
     "mentorships" => $mentorships,
     "mentorshipLevelList" => $mentorshipLevelList,
     "mentorshipsCount" => $mentorshipsCount,
     ), true);
  }
  $this->render("application.views.site.app_home", array(
    "mentorships" => $mentorships,
    "mentorshipLevelList" => $mentorshipLevelList,
    "mentorshipsCount" => $mentorshipsCount,
    "app_selected_tab_id" => "gb-tab-mentorships",
    "tab_url_suffix" => "mentorship",
    "browse_url" => Yii::app()->createUrl("mentorship/mentorship/mentorshipBrowse", array()),
    "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_5.css',
    "app_tab" => $app_tab,
  ));
 }

}
