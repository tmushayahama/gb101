<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none gb-no-margin">
 <div class="row">
  <div class="row gb-panel-form gb-hide">
  </div>
  <h5 class="gb-heading-6 col-lg-12 col-sm-12 col-xs-12">
   <div class="col-lg-11 col-sm-11 col-xs-11 gb-padding-none">
    <p class="gb-ellipsis">Discussions</p>
   </div>
   <div class="col-lg-1 col-sm-1 col-xs-1 gb-padding-none">
    <i class="pull-right"><?php echo $promiseDiscussionsCount; ?></i>
   </div>
  </h5>
  <input class="gb-form-show gb-backdrop-disappear form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12"
         type="text"
         data-gb-target-container="#gb-discussion-form-container"
         data-gb-target="#gb-discussion-form"
         readonly
         placeholder="Write a Discussion"
         />
 </div>
 <br>
 <div id="gb-discussion-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('discussion.views.discussion.forms._discussion_form', array(
     "formId" => "gb-discussion-form",
     "actionUrl" => Yii::app()->createUrl("promise/promise/addPromiseDiscussion", array("promiseId" => $promiseId)),
     "prependTo" => "#gb-promise-discussions",
     'discussionModel' => $discussionModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-promise-discussions">
  <?php
  $this->renderPartial('promise.views.promise.activity.discussion._promise_discussions', array(
    "promiseDiscussions" => $promiseDiscussions,
    "promiseDiscussionsCount" => $promiseDiscussionsCount,
    "promiseId" => $promiseId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>
