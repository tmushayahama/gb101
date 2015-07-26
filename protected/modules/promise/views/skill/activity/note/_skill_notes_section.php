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
     "actionUrl" => Yii::app()->createUrl("skill/skill/addSkillNote", array("skillId" => $skillId)),
     "prependTo" => "#gb-skill-notes",
     'noteModel' => $noteModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-skill-notes">
  <?php
  $this->renderPartial('skill.views.skill.activity.note._skill_notes_list', array(
    "skillNotes" => $skillNotes,
    "skillNotesCount" => $skillNotesCount,
    "skillId" => $skillId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

