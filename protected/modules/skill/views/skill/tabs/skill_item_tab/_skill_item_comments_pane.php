<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
 <div class="row">
  <input class="gb-form-show gb-backdrop-disappear form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12"
         type="text"
         data-gb-target-container="#gb-comment-form-container"
         data-gb-target="#gb-comment-form"
         readonly
         placeholder="Write a Comment"
         />
 </div>
 <br>
 <div id="gb-comment-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('comment.views.comment.forms._comment_form', array(
     "formId" => "gb-comment-form",
     "actionUrl" => Yii::app()->createUrl("skill/skill/addSkillComment", array("skillId" => $skillId)),
     "prependTo" => "#gb-skill-comments",
     'commentModel' => $commentModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-skill-comments">
  <?php
  $this->renderPartial('skill.views.skill.activity.comment._skill_comments', array(
    "skillComments" => $skillComments,
    "skillCommentsCount" => $skillCommentsCount,
    "skillId" => $skillId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

