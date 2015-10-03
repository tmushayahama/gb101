<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12  gb-no-margin">
 <div id="gb-weblink-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('weblink.views.weblink.forms._weblink_form', array(
     "formId" => "gb-weblink-form",
     "actionUrl" => Yii::app()->createUrl("hobby/hobby/addHobbyWeblink", array("hobbyId" => $hobbyId)),
     "prependTo" => "#gb-hobby-weblinks",
     'weblinkModel' => $weblinkModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-hobby-weblinks">
  <?php
  $this->renderPartial('hobby.views.hobby.activity.weblink._hobby_weblinks_list', array(
    "hobbyWeblinks" => $hobbyWeblinks,
    "hobbyWeblinksCount" => $hobbyWeblinksCount,
    "hobbyId" => $hobbyId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

