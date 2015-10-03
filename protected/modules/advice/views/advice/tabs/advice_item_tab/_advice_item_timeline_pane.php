<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  gb-no-margin">
 <!-- timeline -->
 <div id="gb-timeline-form-container" class="row gb-hide gb-panel-form">
  <?php
  $this->renderPartial('timeline.views.timeline.forms._timeline_form', array(
    "formId" => "gb-timeline-form",
    "actionUrl" => Yii::app()->createUrl("advice/advice/addAdviceTimeline", array("adviceId" => $advice->id)),
    "prependTo" => "#gb-advice-timelines-overview",
    'timelineModel' => $timelineModel,
    "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_REPLACE
  ));
  ?>
 </div>
 <div class="smart-timeline">
  <ul class="smart-timeline-list col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <?php
   $this->renderPartial('advice.views.advice.activity.timeline._advice_timelines', array(
     "advice" => $advice,
     'timelineModel' => $timelineModel,
     "adviceTimelineDays" => $adviceTimelineDays,
     "adviceTimelineDaysCount" => $adviceTimelineDaysCount,
     "offset" => 1
   ));
   ?>
  </ul>
 </div>
 <!-- end timeline -->

 <?php if ($adviceTimelineDaysCount > Timeline::$TIMELINES_PER_PAGE): ?>
  <a class="btn btn-default btn-lg col-lg-12 col-sm-12 col-xs-12 text-center text-info gb-see-more"
     gb-purpose="redirects"
     gb-target="a[href='#gb-advice-item-timelines-pane']">
   see more
  </a>
 <?php endif; ?>
</div>