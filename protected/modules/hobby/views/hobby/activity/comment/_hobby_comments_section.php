<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12  gb-no-margin">
 <div id="gb-comment-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('comment.views.comment.forms._comment_form', array(
     "formId" => "gb-comment-form",
     "actionUrl" => Yii::app()->createUrl("hobby/hobby/addHobbyComment", array("hobbyId" => $hobbyId)),
     "prependTo" => "#gb-hobby-comments",
     'commentModel' => $commentModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-hobby-comments">
  <?php
  $this->renderPartial('hobby.views.hobby.activity.comment._hobby_comments_list', array(
    "hobbyComments" => $hobbyComments,
    "hobbyCommentsCount" => $hobbyCommentsCount,
    "hobbyId" => $hobbyId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>