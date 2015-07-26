<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none gb-no-margin">
 <!-- timeline -->
 <div id="gb-timeline-form-container" class="row gb-hide gb-panel-form">
  <?php
  $this->renderPartial('timeline.views.timeline.forms._timeline_form', array(
    "formId" => "gb-timeline-form",
    "actionUrl" => Yii::app()->createUrl("goal/goal/addGoalTimeline", array("goalId" => $goal->id)),
    "prependTo" => "#gb-goal-timelines-overview",
    'timelineModel' => $timelineModel,
    "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_REPLACE
  ));
  ?>
 </div>
 <div class="smart-timeline">
  <?php
  $this->renderPartial('goal.views.goal.activity.timeline._goal_timelines', array(
    "goal" => $goal,
    'timelineModel' => $timelineModel,
    "goalTimelineDays" => $goalTimelineDays,
    "goalTimelineDaysCount" => $goalTimelineDaysCount,
    "offset" => 1
  ));
  ?>
 </div>
 <!-- end timeline -->

 <?php if ($goalTimelineDaysCount > Timeline::$TIMELINES_PER_PAGE): ?>
  <a class="btn btn-default btn-lg col-lg-12 col-sm-12 col-xs-12 text-center text-info gb-see-more"
     gb-purpose="redirects"
     gb-target="a[href='#gb-goal-item-timelines-pane']">
   see more
  </a>
 <?php endif; ?>
</div>