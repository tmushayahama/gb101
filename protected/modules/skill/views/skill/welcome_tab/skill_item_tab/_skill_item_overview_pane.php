<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
 <div class="row">
  <h5 class="gb-heading-6 col-lg-12 col-sm-12 col-xs-12">
   <div class="col-lg-11 col-sm-11 col-xs-11 gb-no-padding">
    <p class="gb-ellipsis">Timelines</p>
   </div>
   <div class="col-lg-1 col-sm-1 col-xs-1 gb-no-padding">
    <i class="pull-right"><?php echo $skillTimelinesCount; ?></i>
   </div>
  </h5>
  <input class="gb-form-show gb-backdrop-disappear form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12"
         type="text"
         data-gb-target-container="#gb-timeline-form-container"
         data-gb-target="#gb-timeline-form"
         readonly
         placeholder="Write a Timeline"
         />
 </div>

 <div id="gb-timeline-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('timeline.views.timeline.forms._timeline_form', array(
     "formId" => "gb-timeline-form",
     "actionUrl" => Yii::app()->createUrl("skill/skill/addSkillTimeline", array("skillId" => $skill->id)),
     "prependTo" => "#gb-skill-timelines-overview",
     'timelineModel' => $timelineModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>
 <div id="gb-skill-timelines-overview">
  <?php
  $this->renderPartial('skill.views.skill.activity.timeline._skill_timelines', array(
    "skillTimelines" => $skillTimelines,
    "skillTimelinesCount" => $skillTimelinesCount,
    "offset" => 1
  ));
  ?>
  <?php
  if ($skillTimelinesCount > Timeline::$TIMELINES_PER_OVERVIEW_PAGE):
   ?>
   <a class="btn btn-default btn-lg col-lg-12 col-sm-12 col-xs-12 text-center text-info gb-see-more"
      gb-purpose="redirects"
      gb-target="a[href='#gb-skill-item-timelines-pane']">
    see more timelines
   </a>
  <?php endif; ?>
 </div>
</div>

