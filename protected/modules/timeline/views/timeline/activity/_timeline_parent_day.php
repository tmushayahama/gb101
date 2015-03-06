<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-post-entry gb-post-entry-row gb-post-entry-row-lg"
     data-gb-source-pk="<?php echo $timelineDay; ?>"
     data-gb-source="<?php echo Type::$SOURCE_TIMELINE; ?>"
     data-gb-del-message-key="TIMELINE">
 <div class="text-center gb-timeline-day col-lg-offset-5 col-lg-2 col-sm-offset-5 col-sm-2 col-xs-offset-5 col-xs-2"
      gb-data-day="<?php echo $timelineDay; ?>">
       <?php echo $timelineDay; ?>
 </div>
 <div class="row gb-timeline-row gb-no-padding">
  <?php foreach (SkillTimeline::getSkillParentTimelines($skill->id, $timelineDay) as $skillTimeline): ?>

   <div class="gb-post-entry panel panel-default col-lg-6 col-sm-6 col-xs-6 gb-no-padding gb-timeline-left gb-background-light-grey-1"
        timeline-mentorship-id="4"
        gb-source-pk-id="4"
        gb-data-source="5">

    <?php
    $this->renderPartial('timeline.views.timeline.activity._timeline_parent', array(
      "timeline" => $skillTimeline->timeline,
      "timelineCounter" => 0,
    ));
    ?>

   </div>
  </div>
 <?php endforeach; ?>
</div>