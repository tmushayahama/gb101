<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php if ($mentorshipTimelineDaysCount == 0): ?>
 <h5 class="text-center text-warning gb-no-information row">
  no timeline to show
 </h5>
<?php else: ?>
 <?php
 $timelineCounter = 1;
 $timelineRight = "";
 foreach ($mentorshipTimelineDays as $mentorshipTimelineDay):
  ?>
  <li>
   <div class="smart-timeline-icon btn-primary">
    <i class="fa fa-link" width="32" height="32" alt="user" /></i>
  </div>
  <div class="smart-timeline-time">
   <small><?php echo 'Step ' . $mentorshipTimelineDay->timeline->day; ?></small>
  </div>
  <div class="smart-timeline-content">
   <?php
   $this->renderPartial('mentorship.views.mentorship.activity.timeline._mentorship_timeline_day', array(
     "mentorship" => $mentorship,
     "timelineDay" => $mentorshipTimelineDay->timeline->day,
     "timelineCounter" => $timelineCounter++,
   ));
   ?>
  </div>
  </li>
 <?php endforeach; ?>


 <?php
 $offset+=Timeline::$TIMELINES_PER_PAGE;
 if ($offset < $mentorshipTimelineDaysCount):
  ?>
  <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
     data-gb-source="<?php echo Type::$SOURCE_MENTORSHIP_TIMELINE; ?>"
     data-gb-source-pk="<?php echo $mentorship->id; ?>"
     data-gb-offset="<?php echo $offset; ?>"
     data-gb-parent="#gb-mentorship-timelines">
   More Timelines
  </a>
 <?php endif; ?>
<?php endif; ?>

