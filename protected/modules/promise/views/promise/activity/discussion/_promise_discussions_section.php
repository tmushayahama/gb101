<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12  gb-no-margin">
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
  $this->renderPartial('promise.views.promise.activity.discussion._promise_discussions_list', array(
    "promiseDiscussions" => $promiseDiscussions,
    "promiseDiscussionsCount" => $promiseDiscussionsCount,
    "promiseId" => $promiseId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>
