<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none gb-no-margin">
 <div id="gb-note-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('note.views.note.forms._note_form', array(
     "formId" => "gb-note-form",
     "actionUrl" => Yii::app()->createUrl("hobby/hobby/addHobbyNote", array("hobbyId" => $hobbyId)),
     "prependTo" => "#gb-hobby-notes",
     'noteModel' => $noteModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-hobby-notes">
  <?php
  $this->renderPartial('hobby.views.hobby.activity.note._hobby_notes_list', array(
    "hobbyNotes" => $hobbyNotes,
    "hobbyNotesCount" => $hobbyNotesCount,
    "hobbyId" => $hobbyId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

