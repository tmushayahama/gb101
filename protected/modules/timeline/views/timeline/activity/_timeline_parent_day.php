<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<li class="<?php echo $timelineRight; ?>">
 <div class="gb-timeline-badge info gb-timeline-day">
  <?php echo 'Day ' . $timelineDay ?>
 </div>
 <div class="gb-timeline-panel">

  <?php foreach (SkillTimeline::getSkillParentTimelines($skill->id, $timelineDay) as $skillTimeline): ?>
   <?php
   $this->renderPartial('timeline.views.timeline.activity._timeline_parent', array(
     "timeline" => $skillTimeline->timeline,
     "timelineCounter" => 0,
   ));
   ?>
  <?php endforeach; ?>
 </div>
</li>