<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
 <?php foreach (PromiseTimeline::getPromiseParentTimelines($promise->id, $timelineDay) as $promiseTimeline): ?>
  <?php
  $this->renderPartial('timeline.views.timeline.activity._timeline_parent', array(
    "timeline" => $promiseTimeline->timeline,
    "timelineCounter" => 0,
  ));
  ?>
 <?php endforeach; ?>
</div>