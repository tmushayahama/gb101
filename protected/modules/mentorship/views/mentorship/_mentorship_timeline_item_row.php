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
    <div class="panel panel-default col-lg-6 col-sm-6 col-xs-6 gb-no-padding gb-timeline-left gb-background-light-grey-1"
         timeline-mentorship-id="<?php echo $mentorshipTimelineItem->id; ?>">
      <br>
      <div class="gb-hide gb-display-attribute" gb-control-target="#gb-mentorship-timeline-form-day-input"><?php echo $timelineDay; ?></div>
      <div class="panel-body gb-background-light-grey-1 gb-no-padding">
        <div class="gb-panel-display gb-timeline-item-title">
          <h5 class="gb-display-attribute" gb-control-target="#gb-mentorship-timeline-form-title-input"><?php echo $mentorshipTimelineItem->timeline->title; ?></h5>
        </div>
        <div class="gb-panel-display gb-timeline-item-description">
          <p class="gb-display-attribute" gb-control-target="#gb-mentorship-timeline-form-description-input"><?php echo $mentorshipTimelineItem->timeline->description; ?></p>
        </div>
        <div class="row gb-panel-form gb-hide">
        </div>  
        <?php if ($mentorshipTimelineItem->mentorship->owner_id == Yii::app()->user->id): ?>
          <div class="panel-footer gb-panel-display gb-no-padding"> 
            <div class="row">
              <div class="btn-group pull-right">
                <a class="gb-edit-form-show btn btn-link"
                   gb-form-target="#gb-mentorship-timeline-form">
                  <i class="glyphicon glyphicon-edit"></i>
                </a>
                <a class="gb-answer-list-item-delete btn btn-link"><i class="glyphicon glyphicon-trash"></i></a>
              </div>
            </div>
          </div>
        <?php endif; ?>

      </div>
      <br>
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-6 gb-timeline-right">
      <div class="panel-body">
      </div>
    </div>
  </div>
<?php endforeach; ?>

