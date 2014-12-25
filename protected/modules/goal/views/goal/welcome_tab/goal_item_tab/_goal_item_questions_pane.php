<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
 <div class="row">
  <div class="row gb-panel-form gb-hide">
  </div>
  <h5 class="gb-heading-6 col-lg-12 col-sm-12 col-xs-12">
   <div class="col-lg-11 col-sm-11 col-xs-11 gb-no-padding">
    <p class="gb-ellipsis">Comments</p>
   </div>
   <div class="col-lg-1 col-sm-1 col-xs-1 gb-no-padding">
    <i class="pull-right"><?php echo $goalCommentsCount; ?></i>
   </div>
  </h5>
  <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12 gb-no-padding"
       gb-is-child-form="0"
       data-gb-target="#gb-comment-form"
       data-gb-url="<?php echo Yii::app()->createUrl("goal/goal/addGoalComment", array("goalId" => $goalId)); ?>"
       data-gb-prepend-to="#gb-goal-comments"
       gb-form-description-input="#gb-comment-form-description-input">
   <textarea class="form-control"
             placeholder="Add a comment"
             rows="1"></textarea>
   <div class="input-group-btn">
    <div class="input-group-btn">
     <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus"></i></button>

    </div><!-- /btn-group -->
   </div>
  </div>
 </div>

 <div id="gb-goal-comments">
  <?php
  $this->renderPartial('goal.views.goal.activity.comment._goal_comments', array(
    "goalComments" => $goalComments,
    "goalCommentsCount" => $goalCommentsCount,
    "goalId" => $goalId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

