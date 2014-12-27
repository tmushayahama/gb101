<?php

class AppController extends Controller {

 public function actionHome() {
  //$skill = Skill::Model()->findByPk($skillId);
  $todoPriorities = CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name");
  $this->render("application.views.site.app_home", array(
    "skillLevels" => Level::getLevels(Level::$LEVEL_CATEGORY_SKILL),
    "skills" => Skill::getSkills(),
    "skillsCount" => Skill::getSkillsCount(),
    "commentModel" => new Comment(),
    "discussionModel" => new Discussion(),
    //"skillParentTodos" => SkillTodo::getSkillParentTodos($skillId),
    "noteModel" => new Note(),
    "questionModel" => new Question(),
    "questionnaireModel" => new Questionnaire(),
    "requestModel" => new Notification(),
    "todoModel" => new Todo(),
    "todoPriorities" => $todoPriorities,
    "weblinkModel" => new Weblink(),
    "discussionModel" => new Discussion(),
    //"skillParentDiscussions" => SkillDiscussion::getSkillParentDiscussions($skillId),
    //"skillType" => $skillType,
    //"advicePages" => Page::getUserPages($skill->creator_id),
    //"skillTimeline" => SkillTimeline::getSkillTimeline($skillId),
    "skillTimelineModel" => new SkillTimeline(),
    "people" => Profile::getPeople(true),
    "timelineModel" => new Timeline(),
    //"feedbackQuestions" => Skill::getFeedbackQuestions($skill, Yii::app()->user->id),
    "skillModel" => new Skill(),
    //"skill" => Skill::getSkill(Level::$LEVEL_CATEGORY_SKILL, Yii::app()->user->id, null, null, 50),
    "skillLevelList" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_SKILL), "id", "name"),
  ));
 }

}
