<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-box-7">
 <div class="row">
  <h5 class="gb-heading-6 col-lg-12 col-sm-12 col-xs-12">
   <div class="col-lg-11 col-sm-11 col-xs-11 gb-no-padding">
    <p class="gb-ellipsis">Comments</p>
   </div>
   <div class="col-lg-1 col-sm-1 col-xs-1 gb-no-padding">
    <i class="pull-right"><?php echo $goalCommentsCount; ?></i>
   </div>
  </h5>
  <input class="gb-form-show gb-backdrop-disappear form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12"
         type="text"
         data-gb-target-container="#gb-comment-form-container"
         data-gb-target="#gb-comment-form"
         readonly
         placeholder="Write a Comment"
         />
 </div>

 <div id="gb-comment-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('comment.views.comment.forms._comment_form', array(
     "formId" => "gb-comment-form",
     "actionUrl" => Yii::app()->createUrl("goal/goal/addGoalComment", array("goalId" => $goal->id)),
     "prependTo" => "#gb-goal-comments-overview",
     'commentModel' => $commentModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>
 <div id="gb-goal-comments-overview">
  <?php
  $this->renderPartial('goal.views.goal.activity.comment._goal_comments', array(
    "goalComments" => $goalComments,
    "goalCommentsCount" => $goalCommentsCount,
    "offset" => 1
  ));
  ?>
  <?php
  if ($goalCommentsCount > Comment::$COMMENTS_PER_OVERVIEW_PAGE):
   ?>
   <a class="btn btn-default btn-lg col-lg-12 col-sm-12 col-xs-12 text-center text-info gb-see-more"
      gb-purpose="redirects"
      gb-target="a[href='#gb-goal-item-comments-pane']">
    see more comments
   </a>
  <?php endif; ?>
 </div>
</div>

