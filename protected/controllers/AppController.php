<?php

class AppController extends Controller {

 public function actionProfile() {
  $this->render("application.views.site.app_home", array(
    "app_selected_tab_id" => "gb-tab-profile",
    "tab_url_suffix" => "profile",
    "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_1.css',
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

  $this->render("application.views.site.app_home", array(
    "skills" => $skills,
    "skillsCount" => $skillsCount,
    "skillModel" => new $skillModel,
    "skillLevelList" => $skillLevelList,
    "app_selected_tab_id" => "gb-tab-skills",
    "tab_url_suffix" => "skill",
    "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_4.css',
    "app_tab" => $this->renderPartial('skill.views.skill.skills_tab._skill_app_overview_pane', array(
      "skills" => $skills,
      "skillLevelList" => $skillLevelList,
      "skillsCount" => $skillsCount,
      ), true),
  ));
 }

 public function actionMentorship() {
  $mentorships = Mentorship::getMentorships(null, null, Mentorship::$MENTORSHIPS_PER_PAGE);
  $mentorshipLevelList = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_MENTORSHIP), "id", "name");
  $mentorshipsCount = Mentorship::getMentorshipsCount();

  $this->render("application.views.site.app_home", array(
    "mentorships" => $mentorships,
    "mentorshipLevelList" => $mentorshipLevelList,
    "mentorshipsCount" => $mentorshipsCount,
    "app_selected_tab_id" => "gb-tab-mentorships",
    "tab_url_suffix" => "mentorship",
    "css_theme_url" => Yii::app()->request->baseUrl . '/css/ss_themes/ss_theme_5.css',
    "app_tab" => $this->renderPartial('mentorship.views.mentorship.mentorships_tab._mentorship_app_overview_pane', array(
      "mentorships" => $mentorships,
      "mentorshipLevelList" => $mentorshipLevelList,
      "mentorshipsCount" => $mentorshipsCount,
      ), true),
  ));
 }

}
