<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <div class="col-lg-10 col-md-10 col-sm-2 col-xs-12 gb-padding-none">
   <p class="gb-title gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . '/img/icons/todo_1.png'; ?>" class="gb-heading-img" alt="">
    TIMELINE
   </p>
   <div class="gb-subtitle gb-ellipsis">
    <a>
     <?php echo $mentorshipTimelineDaysCount . ' days'; ?>
    </a>
   </div>
  </div>
  <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-12">
   <a class="gb-form-show pull-right"
      data-gb-target-container="#gb-timeline-form-container"
      data-gb-target="#gb-timeline-form">
    <i class="fa fa-plus-circle fa-2x"></i>
   </a>
  </div>
 </div>
 <div id="gb-mentorship-item-timeline-panel" class="row">
  <?php
  $this->renderPartial('mentorship.views.mentorship.tabs.mentorship_item_tab._mentorship_item_timeline_pane', array(
    'mentorship' => $mentorship,
    'timelineModel' => $timelineModel,
    'mentorshipTimelineDays' => $mentorshipTimelineDays,
    'mentorshipTimelineDaysCount' => $mentorshipTimelineDaysCount,
  ));
  ?>
 </div>
</div>