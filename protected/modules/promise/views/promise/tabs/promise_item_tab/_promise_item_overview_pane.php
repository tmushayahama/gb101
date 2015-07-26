<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$this->renderPartial('promise.views.promise.activity.promise._promise_item_heading', array(
  'promise' => $promise,
  'promiseLevelList' => $promiseLevelList,
  "mentorshipPromises" => $mentorshipPromises,
  "mentorshipPromisesCount" => $mentorshipPromisesCount,
));
?>
<div class="gb-section-row-1 row">
 <div class="gb-heading row">
  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 gb-padding-none">
   <p class="gb-title gb-ellipsis">
    <img src="<?php echo Yii::app()->request->baseUrl . '/img/icons/todo_1.png'; ?>" class="gb-heading-img" alt="">
    TIMELINE
   </p>
  </div>
  <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-2">
   <a class="gb-form-show pull-right"
      data-gb-target-container="#gb-timeline-form-container"
      data-gb-target="#gb-timeline-form">
    <i class="fa fa-plus-circle fa-2x"></i>
   </a>
  </div>
 </div>
 <div id="gb-promise-item-timeline-panel" class="row">
  <?php
  $this->renderPartial('promise.views.promise.tabs.promise_item_tab._promise_item_timeline_pane', array(
    'promise' => $promise,
    'timelineModel' => $timelineModel,
    'promiseTimelineDays' => $promiseTimelineDays,
    'promiseTimelineDaysCount' => $promiseTimelineDaysCount,
  ));
  ?>
 </div>
</div>