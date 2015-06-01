<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none gb-no-margin">
 <!-- timeline -->
 <div id="gb-timeline-form-container" class="row gb-hide gb-panel-form">
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
 <div class="smart-timeline">
  <ul class="smart-timeline-list col-lg-12 col-md-12 col-sm-12">
   <?php
   $this->renderPartial('skill.views.skill.activity.timeline._skill_timelines', array(
     "skill" => $skill,
     'timelineModel' => $timelineModel,
     "skillTimelineDays" => $skillTimelineDays,
     "skillTimelineDaysCount" => $skillTimelineDaysCount,
     "offset" => 1
   ));
   ?>
  </ul>
 </div>
 <!-- end timeline -->

 <?php if ($skillTimelineDaysCount > Timeline::$TIMELINES_PER_PAGE): ?>
  <a class="btn btn-default btn-lg col-lg-12 col-sm-12 col-xs-12 text-center text-info gb-see-more"
     gb-purpose="redirects"
     gb-target="a[href='#gb-skill-item-timelines-pane']">
   see more
  </a>
 <?php endif; ?>
</div>