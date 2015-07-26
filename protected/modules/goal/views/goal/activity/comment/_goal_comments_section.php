<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none gb-no-margin">
 <div id="gb-comment-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('comment.views.comment.forms._comment_form', array(
     "formId" => "gb-comment-form",
     "actionUrl" => Yii::app()->createUrl("goal/goal/addGoalComment", array("goalId" => $goalId)),
     "prependTo" => "#gb-goal-comments",
     'commentModel' => $commentModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-goal-comments">
  <?php
  $this->renderPartial('goal.views.goal.activity.comment._goal_comments_list', array(
    "goalComments" => $goalComments,
    "goalCommentsCount" => $goalCommentsCount,
    "goalId" => $goalId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>