<?php
$dayCount = 0;
foreach ($mentorshipTimeline as $mentorshipTimelineItem) :
  $timelineDay = $mentorshipTimelineItem->day;
  $newDay = $dayCount != $timelineDay;
  if ($newDay) {
    $dayCount = $timelineDay;
  }
  ?>
  <?php if ($newDay): ?>
    <div id="<?php echo 'gb-timeline-day-container-' . $timelineDay; ?>" class="row">
      <div class="text-center gb-timeline-day col-lg-offset-5 col-lg-2 col-sm-offset-5 col-sm-2 col-xs-offset-5 col-xs-2"
           day="<?php echo $timelineDay; ?>">
             <?php echo 'Day' . ' ' . $timelineDay; ?>
      </div>
    </div>
  <?php endif; ?>
  <div class="row gb-timeline-row gb-no-padding">
    <div class="col-lg-6 col-sm-6 col-xs-6 gb-timeline-left">
      <br>
      <div class="row">
        <div class="gb-timeline-item-title">
          <h5><?php echo $mentorshipTimelineItem->timeline->title; ?></h5>
        </div>
        <div class="gb-timeline-item-description">
          <p><?php echo $mentorshipTimelineItem->timeline->description; ?></p>
        </div>
      </div>
      <br>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-6 gb-timeline-right">
      <div class="panel-body">
      </div>
    </div>
  </div>
<?php endforeach; ?>

