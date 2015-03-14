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
    <p class="gb-ellipsis">Timeline</p>
   </div>
   <div class="col-lg-1 col-sm-1 col-xs-1 gb-no-padding">
    <i class="pull-right"><?php echo $mentorshipTimelineDaysCount; ?></i>
   </div>
  </h5>

  <input class="gb-form-show gb-backdrop-disappear form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding"
         type="text"
         data-gb-target-container="#gb-timeline-form-container"
         data-gb-target="#gb-timeline-form"
         readonly
         placeholder="Write a Timeline"
         />
  <div id="gb-timeline-form-container" class="row gb-hide gb-panel-form">
   <div class="row">
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
  </div>
 </div>

 <div id="gb-mentorship-timelines-overview"
      class="row gb-block"
      data-gb-source-pk="<?php echo $mentorship->id; ?>"
      data-gb-source="<?php echo Type::$SOURCE_TIMELINE; ?>"
      data-gb-del-message-key="TIMELINE">
  <ul class="gb-timeline col-lg-12 col-md-12 col-sm-12">
   <?php
   $this->renderPartial('mentorship.views.mentorship.activity.timeline._mentorship_timelines', array(
     "mentorship" => $mentorship,
     "mentorshipTimelineDays" => $mentorshipTimelineDays,
     "mentorshipTimelineDaysCount" => $mentorshipTimelineDaysCount,
     "offset" => 1
   ));
   ?>
   <?php
   if ($mentorshipTimelineDaysCount > Timeline::$TIMELINES_PER_PAGE):
    ?>
    <a class="btn btn-default btn-lg col-lg-12 col-sm-12 col-xs-12 text-center text-info gb-see-more"
       gb-purpose="redirects"
       gb-target="a[href='#gb-mentorship-item-timelines-pane']">
     see more
    </a>
   <?php endif; ?>
  </ul>
 </div>
</div>

