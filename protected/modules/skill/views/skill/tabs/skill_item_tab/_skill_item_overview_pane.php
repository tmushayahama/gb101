<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-section-row-1 row">
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-skill-item-overview-panel" class="row">
   <?php
   $this->renderPartial('skill.views.skill.activity.skill._skill_item_heading', array(
     "skill" => $skill,
   ));
   ?>
  </div>
  <div class="col-lg-12">

  </div>
 </div>
</div>

<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <a  class="gb-title gb-link active col-lg-10 col-md-10 col-sm-2 col-xs-12" data-gb-toggle="gb-collapse"
      data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillContributors", array('skillId' => $skill->id)); ?>"
      data-gb-target-collapse-id="#gb-skill-item-contributor-panel">
   <p class="gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/people_1.png"; ?>" class="gb-heading-img" alt="">
    Contributors
   </p>
  </a>
  <div class="btn gb-request-notification-viewer gb-populate col-lg-1 col-sm-1 col-xs-1 gb-no-padding"
       data-gb-target="#gb-notification-viewer-body"
       data-gb-type="gb-modal"
       data-gb-target-heading="#gb-notification-viewer-heading"
       data-gb-heading-text="Pending skill judge request(s)"
       data-gb-source="<?php echo Notification::$TYPE_CONTRIBUTOR; ?>"
       data-gb-source-pk="<?php echo $skillId; ?>">
   <div class="text-right"></div>
   <h4><i class="text-warning glyphicon glyphicon-road"></i></h4>
  </div>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-skill-item-contributor-panel" class="row">
   <?php
   $this->renderPartial('skill.views.skill.tabs.skill_item_tab._skill_item_contributors_pane', array(
     "contributorModel" => new Contributor(),
     "contributorTypes" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_CONTRIBUTOR_TYPE), "id", "name"),
     "skillContributors" => $skill->getSkillParentContributors(Contributor::$CONTRIBUTORS_PER_PAGE),
     "skillContributorsCount" => $skill->getSkillParentContributorsCount(),
     "skillId" => $skillId
   ));
   ?>
  </div>
 </div>
</div>

<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <a  class="gb-title gb-link active col-lg-10 col-md-10 col-sm-2 col-xs-12" data-gb-toggle="gb-collapse"
      data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillTodos", array('skillId' => $skill->id)); ?>"
      data-gb-target-collapse-id="#gb-skill-item-todo-panel">
   <p class="gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/todo_1.png"; ?>" class="gb-heading-img" alt="">
    Todos
   </p>
  </a>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-skill-item-todo-panel" class="row">
   <?php
   $this->renderPartial('skill.views.skill.tabs.skill_item_tab._skill_item_todos_pane', array(
     "todoModel" => new Todo(),
     "todoPriorities" => CHtml::listData(Level::getLevels(Level::$LEVEL_CATEGORY_TODO_PRIORITY), "id", "name"),
     'skillTodos' => $skill->getSkillParentTodos(Todo::$TODOS_PER_PAGE),
     'skillTodosCount' => $skill->getSkillParentTodosCount(),
     'skillId' => $skillId
   ));
   ?>
  </div>
 </div>
</div>

<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <a  class="gb-title gb-link active col-lg-10 col-md-10 col-sm-2 col-xs-12" data-gb-toggle="gb-collapse"
      data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillWeblinks", array('skillId' => $skill->id)); ?>"
      data-gb-target-collapse-id="#gb-skill-item-weblink-panel">
   <p class="gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/weblink_1.png"; ?>" class="gb-heading-img" alt="">
    Weblinks
   </p>
  </a>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-skill-item-weblink-panel" class="row">
   <?php
   $this->renderPartial('skill.views.skill.tabs.skill_item_tab._skill_item_weblinks_pane', array(
     "weblinkModel" => new Weblink(),
     'skillWeblinks' => $skill->getSkillParentWeblinks(Weblink::$WEBLINKS_PER_PAGE),
     'skillWeblinksCount' => $skill->getSkillParentWeblinksCount(),
     'skillId' => $skillId
   ));
   ?>
  </div>
 </div>
</div>

<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <a  class="gb-title gb-link active col-lg-10 col-md-10 col-sm-2 col-xs-12" data-gb-toggle="gb-collapse"
      data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillNotes", array('skillId' => $skill->id)); ?>"
      data-gb-target-collapse-id="#gb-skill-item-note-panel">
   <p class="gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/note_1.png"; ?>" class="gb-heading-img" alt="">
    Notes
   </p>
  </a>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-skill-item-note-panel" class="row">
   <?php
   $this->renderPartial('skill.views.skill.tabs.skill_item_tab._skill_item_notes_pane', array(
     "noteModel" => new Note(),
     'skillNotes' => $skill->getSkillParentNotes(Note::$NOTES_PER_PAGE),
     'skillNotesCount' => $skill->getSkillParentNotesCount(),
     'skillId' => $skillId
   ));
   ?>
  </div>
 </div>
</div>


<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <a  class="gb-title gb-link active col-lg-10 col-md-10 col-sm-2 col-xs-12" data-gb-toggle="gb-collapse"
      data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillComments", array('skillId' => $skill->id)); ?>"
      data-gb-target-collapse-id="#gb-skill-item-comment-panel">
   <p class="gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/comment_1.png"; ?>" class="gb-heading-img" alt="">
    Comments
   </p>
  </a>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-skill-item-comment-panel" class="row">
   <?php
   $this->renderPartial('skill.views.skill.tabs.skill_item_tab._skill_item_comments_pane', array(
     "commentModel" => new Comment(),
     'skillComments' => $skill->getSkillParentComments(Comment::$COMMENTS_PER_PAGE),
     'skillCommentsCount' => $skill->getSkillParentCommentsCount(),
     'skillId' => $skillId
   ));
   ?>
  </div>
 </div>
</div>

<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <a  class="gb-title gb-link active col-lg-10 col-md-10 col-sm-2 col-xs-12" data-gb-toggle="gb-collapse"
      data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillDiscussions", array('skillId' => $skill->id)); ?>"
      data-gb-target-collapse-id="#gb-skill-item-discussion-panel">
   <p class="gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/discussion_1.png"; ?>" class="gb-heading-img" alt="">
    Discussions
   </p>
  </a>
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-skill-item-discussion-panel" class="row">
   <?php
   $this->renderPartial('skill.views.skill.tabs.skill_item_tab._skill_item_discussions_pane', array(
     "discussionModel" => new Discussion(),
     'skillDiscussions' => $skill->getSkillParentDiscussions(Discussion::$DISCUSSIONS_PER_PAGE),
     'skillDiscussionsCount' => $skill->getSkillParentDiscussionsCount(),
     'skillId' => $skillId
   ))
   ?>
  </div>
 </div>
</div>





<div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
 <div class="row">
  <h5 class="gb-heading-6 col-lg-12 col-sm-12 col-xs-12">
   <div class="col-lg-11 col-sm-11 col-xs-11 gb-no-padding">
    <p class="gb-ellipsis">Timeline</p>
   </div>
   <div class="col-lg-1 col-sm-1 col-xs-1 gb-no-padding">
    <i class="pull-right"><?php echo $skillTimelineDaysCount; ?></i>
   </div>
  </h5>
  <div id="gb-timeline-form-container" class="row gb-panel-form">
   <?php
   $this->renderPartial('timeline.views.timeline.forms._timeline_form', array(
     "formId" => "gb-timeline-form",
     "actionUrl" => Yii::app()->createUrl("skill/skill/addSkillTimeline", array("skillId" => $skill->id)),
     "prependTo" => "#gb-skill-timelines-overview",
     'timelineModel' => $timelineModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_REPLACE
   ));
   ?>
  </div>
 </div>
 <div id="gb-skill-timelines-overview"
      class="row gb-block"
      data-gb-source-pk="<?php echo $skill->id; ?>"
      data-gb-source="<?php echo Type::$SOURCE_TIMELINE; ?>"
      data-gb-del-message-key="TIMELINE">
  <ul class="gb-timeline col-lg-12 col-md-12 col-sm-12">
   <?php
   $this->renderPartial('skill.views.skill.activity.timeline._skill_timelines', array(
     "skill" => $skill,
     "skillTimelineDays" => $skillTimelineDays,
     "skillTimelineDaysCount" => $skillTimelineDaysCount,
     "offset" => 1
   ));
   ?>
   <?php if ($skillTimelineDaysCount > Timeline::$TIMELINES_PER_PAGE): ?>
    <a class="btn btn-default btn-lg col-lg-12 col-sm-12 col-xs-12 text-center text-info gb-see-more"
       gb-purpose="redirects"
       gb-target="a[href='#gb-skill-item-timelines-pane']">
     see more
    </a>
   <?php endif; ?>
  </ul>
 </div>
</div>