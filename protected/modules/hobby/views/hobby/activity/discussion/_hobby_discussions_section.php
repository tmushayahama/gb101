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
     "actionUrl" => Yii::app()->createUrl("hobby/hobby/addHobbyDiscussion", array("hobbyId" => $hobbyId)),
     "prependTo" => "#gb-hobby-discussions",
     'discussionModel' => $discussionModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-hobby-discussions">
  <?php
  $this->renderPartial('hobby.views.hobby.activity.discussion._hobby_discussions_list', array(
    "hobbyDiscussions" => $hobbyDiscussions,
    "hobbyDiscussionsCount" => $hobbyDiscussionsCount,
    "hobbyId" => $hobbyId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>
