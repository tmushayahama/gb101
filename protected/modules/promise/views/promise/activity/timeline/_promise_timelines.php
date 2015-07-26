<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<ul class="gb-block smart-timeline-list col-lg-12 col-md-12 col-sm-12 col-xs-12"
    data-gb-source-pk=0
    data-gb-source="<?php echo Type::$SOURCE_TIMELINE; ?>">
     <?php if ($promiseTimelineDaysCount == 0): ?>
  <h5 class="text-center text-warning gb-no-information row">
   no timeline to show
  </h5>
 <?php else: ?>
  <?php
  $timelineCounter = 1;
  $timelineRight = "";
  foreach ($promiseTimelineDays as $promiseTimelineDay):
   ?>
   <li>
    <div class="smart-timeline-icon btn-primary">
     <i class="fa fa-link" width="32" height="32" alt="user"></i>
    </div>
    <div class="smart-timeline-time">
     <small><?php echo 'Step ' . $promiseTimelineDay->timeline->day; ?></small>
    </div>
    <div class="smart-timeline-content">
     <?php
     $this->renderPartial('promise.views.promise.activity.timeline._promise_timeline_day', array(
       "promise" => $promise,
       "timelineDay" => $promiseTimelineDay->timeline->day,
       "timelineCounter" => $timelineCounter++,
     ));
     ?>
    </div>
   </li>
  <?php endforeach; ?>
  <?php
  $offset+=Timeline::$TIMELINES_PER_PAGE;
  if ($offset < $promiseTimelineDaysCount):
   ?>
   <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
      data-gb-source="<?php echo Type::$SOURCE_PROMISE_TIMELINE; ?>"
      data-gb-source-pk="<?php echo $promise->id; ?>"
      data-gb-offset="<?php echo $offset; ?>"
      data-gb-parent="#gb-promise-timelines">
    More Timelines
   </a>
  <?php endif; ?>
 <?php endif; ?>
</ul>