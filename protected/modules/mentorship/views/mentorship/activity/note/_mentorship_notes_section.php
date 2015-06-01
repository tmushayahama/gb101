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
     "actionUrl" => Yii::app()->createUrl("mentorship/mentorship/addMentorshipNote", array("mentorshipId" => $mentorshipId)),
     "prependTo" => "#gb-mentorship-notes",
     'noteModel' => $noteModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-mentorship-notes">
  <?php
  $this->renderPartial('mentorship.views.mentorship.activity.note._mentorship_notes_list', array(
    "mentorshipNotes" => $mentorshipNotes,
    "mentorshipNotesCount" => $mentorshipNotesCount,
    "mentorshipId" => $mentorshipId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

