<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12  gb-no-margin">
 <div id="gb-note-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('note.views.note.forms._note_form', array(
     "formId" => "gb-note-form",
     "actionUrl" => Yii::app()->createUrl("promise/promise/addPromiseNote", array("promiseId" => $promiseId)),
     "prependTo" => "#gb-promise-notes",
     'noteModel' => $noteModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-promise-notes">
  <?php
  $this->renderPartial('promise.views.promise.activity.note._promise_notes_list', array(
    "promiseNotes" => $promiseNotes,
    "promiseNotesCount" => $promiseNotesCount,
    "promiseId" => $promiseId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

