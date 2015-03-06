<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php if ($skillTimelineDaysCount == 0): ?>
 <h5 class="text-center text-warning gb-no-information row">
  no timelines
 </h5>
<?php endif; ?>

<?php
$timelineCounter = 1;

foreach ($skillTimelineDays as $skillTimelineDay):
 ?>
 <?php
 $this->renderPartial('timeline.views.timeline.activity._timeline_parent_day', array(
   "skill" => $skill,
   "timelineDay" => $skillTimelineDay->timeline->day,
   "timelineCounter" => $timelineCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Timeline::$TIMELINES_PER_PAGE;
if ($offset < $skillTimelineDaysCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_SKILL_TIMELINE; ?>"
    data-gb-source-pk="<?php echo $skill->id; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-skill-timelines">
  More Timelines
 </a>
<?php endif; ?>

