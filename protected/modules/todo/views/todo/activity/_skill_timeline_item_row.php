<div id="gb-timeline" class="gb-post-entry-row row" data-gb-source="<?php echo Type::$SOURCE_TIMELINE; ?>" data-gb-source-pk="0">
  <?php
  $dayCount = 0;
  foreach ($todoTimeline as $todoTimelineItem) :
    $timelineDay = $todoTimelineItem->day;
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
      <div class="gb-post-entry-row panel panel-default col-lg-6 col-sm-6 col-xs-6 gb-no-padding gb-timeline-left gb-background-light-grey-1"
           timeline-todo-id="<?php echo $todoTimelineItem->id; ?>" data-gb-source-pk="<?php echo $todoTimelineItem->id; ?>" data-gb-source="<?php echo Type::$SOURCE_TIMELINE; ?>">
        <br>
        <div class="gb-hide gb-display-attribute" gb-control-target="#gb-todo-timeline-form-day-input"><?php echo $timelineDay; ?></div>
        <div class="panel-body gb-background-light-grey-1 gb-no-padding">
          <div class="gb-panel-display gb-timeline-item-title">
            <h5 class="gb-display-attribute" gb-control-target="#gb-todo-timeline-form-title-input"><?php echo $todoTimelineItem->timeline->title; ?></h5>
          </div>
          <div class="gb-panel-display gb-timeline-item-description">
            <p class="gb-display-attribute" gb-control-target="#gb-todo-timeline-form-description-input"><?php echo $todoTimelineItem->timeline->description; ?></p>
          </div>
          <div class="row gb-panel-form gb-hide">
          </div>  
          <?php if ($todoTimelineItem->todo->creator_id == Yii::app()->user->id): ?>
            <div class="panel-footer gb-panel-display gb-no-padding"> 
              <div class="row">
                   <div class="pull-left gb-padding-thin">By: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $todoTimelineItem->todo->creator_id)); ?>"><i><?php echo $todoTimelineItem->todo->creator->profile->firstname . " " . $todoTimelineItem->todo->creator->profile->lastname ?></i></a></div>
       <div class="btn-group pull-right">
                  <a class="gb-edit-form-show btn btn-link"
                     data-gb-target="#gb-todo-timeline-form">
                    <i class="glyphicon glyphicon-edit"></i>
                  </a>
                  <a class="gb-delete-me btn btn-link" gb-del-type="<?php echo Type::$DEL_TYPE_REPLACE; ?>"><i class="glyphicon glyphicon-trash"></i></a>
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
</div>