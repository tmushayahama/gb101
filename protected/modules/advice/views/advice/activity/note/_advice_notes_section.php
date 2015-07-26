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
     "actionUrl" => Yii::app()->createUrl("advice/advice/addAdviceNote", array("adviceId" => $adviceId)),
     "prependTo" => "#gb-advice-notes",
     'noteModel' => $noteModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-advice-notes">
  <?php
  $this->renderPartial('advice.views.advice.activity.note._advice_notes_list', array(
    "adviceNotes" => $adviceNotes,
    "adviceNotesCount" => $adviceNotesCount,
    "adviceId" => $adviceId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

