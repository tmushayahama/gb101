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
    "actionUrl" => Yii::app()->createUrl("hobby/hobby/addHobbyTimeline", array("hobbyId" => $hobby->id)),
    "prependTo" => "#gb-hobby-timelines-overview",
    'timelineModel' => $timelineModel,
    "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_REPLACE
  ));
  ?>
 </div>
 <div class="smart-timeline">
  <?php
  $this->renderPartial('hobby.views.hobby.activity.timeline._hobby_timelines', array(
    "hobby" => $hobby,
    'timelineModel' => $timelineModel,
    "hobbyTimelineDays" => $hobbyTimelineDays,
    "hobbyTimelineDaysCount" => $hobbyTimelineDaysCount,
    "offset" => 1
  ));
  ?>
 </div>
 <!-- end timeline -->

 <?php if ($hobbyTimelineDaysCount > Timeline::$TIMELINES_PER_PAGE): ?>
  <a class="btn btn-default btn-lg col-lg-12 col-sm-12 col-xs-12 text-center text-info gb-see-more"
     gb-purpose="redirects"
     gb-target="a[href='#gb-hobby-item-timelines-pane']">
   see more
  </a>
 <?php endif; ?>
</div>