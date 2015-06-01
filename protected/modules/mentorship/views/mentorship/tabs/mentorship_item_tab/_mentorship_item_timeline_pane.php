<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none gb-no-margin">
 <div id="gb-timeline-form-container" class="row gb-hide gb-panel-form">
  <?php
  $this->renderPartial('timeline.views.timeline.forms._timeline_form', array(
    "formId" => "gb-timeline-form",
    "actionUrl" => Yii::app()->createUrl("mentorship/mentorship/addMentorshipTimeline", array("mentorshipId" => $mentorship->id)),
    "prependTo" => "#gb-mentorship-timelines-overview",
    'timelineModel' => $timelineModel,
    "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_REPLACE
  ));
  ?>
 </div>
 <ul class="gb-timeline col-lg-12 col-md-12 col-sm-12">
  <?php
  $this->renderPartial('mentorship.views.mentorship.activity.timeline._mentorship_timelines', array(
    "mentorship" => $mentorship,
    'timelineModel' => $timelineModel,
    "mentorshipTimelineDays" => $mentorshipTimelineDays,
    "mentorshipTimelineDaysCount" => $mentorshipTimelineDaysCount,
    "offset" => 1
  ));
  ?>
  <?php if ($mentorshipTimelineDaysCount > Timeline::$TIMELINES_PER_PAGE): ?>
   <a class="btn btn-default btn-lg col-lg-12 col-sm-12 col-xs-12 text-center text-info gb-see-more"
      gb-purpose="redirects"
      gb-target="a[href='#gb-mentorship-item-timelines-pane']">
    see more
   </a>
  <?php endif; ?>
 </ul>
</div>