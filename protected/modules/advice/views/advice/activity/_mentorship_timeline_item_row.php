<div id="gb-timeline" class="gb-block gb-block-row row" data-gb-source="<?php echo Type::$SOURCE_TIMELINE; ?>" data-gb-source-pk="0">
  <?php
  $dayCount = 0;
  foreach ($adviceTimeline as $adviceTimeline) :
    $timelineDay = $adviceTimeline->day;
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
    <div class="row gb-timeline-row ">
      <div class="gb-block gb-block-row panel panel-default col-lg-6 col-sm-6 col-xs-6  gb-timeline-left gb-background-light-grey-1"
           timeline-advice-id="<?php echo $adviceTimeline->id; ?>" data-gb-source-pk="<?php echo $adviceTimeline->id; ?>" data-gb-source="<?php echo Type::$SOURCE_TIMELINE; ?>">
        <br>
        <div class="gb-hide gb-display-attribute" gb-control-target="#gb-advice-timeline-form-day-input"><?php echo $timelineDay; ?></div>
        <div class="panel-body gb-background-light-grey-1 ">
          <div class="gb-panel-display gb-timeline-item-title">
            <h5 class="gb-display-attribute" gb-control-target="#gb-advice-timeline-form-title-input"><?php echo $adviceTimeline->timeline->title; ?></h5>
          </div>
          <div class="gb-panel-display gb-timeline-item-description">
            <p class="gb-display-attribute" gb-control-target="#gb-advice-timeline-form-description-input"><?php echo $adviceTimeline->timeline->description; ?></p>
          </div>
          <div class="row gb-panel-form gb-hide">
          </div>  
          <?php if ($adviceTimeline->advice->creator_id == Yii::app()->user->id): ?>
            <div class="panel-footer gb-panel-display "> 
              <div class="row">
                   <div class="pull-left gb-padding-thin">By: <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $adviceTimeline->advice->creator_id)); ?>"><i><?php echo $adviceTimeline->advice->creator->profile->firstname . " " . $adviceTimeline->advice->creator->profile->lastname ?></i></a></div>
       <div class="btn-group pull-right">
                  <a class="gb-edit-form-show btn btn-link"
                     data-gb-target="#gb-advice-timeline-form">
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