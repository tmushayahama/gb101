<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

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
 </div>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div id="gb-skill-item-contributor-panel" class="row">

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