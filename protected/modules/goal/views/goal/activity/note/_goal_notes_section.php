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
     "actionUrl" => Yii::app()->createUrl("goal/goal/addGoalNote", array("goalId" => $goalId)),
     "prependTo" => "#gb-goal-notes",
     'noteModel' => $noteModel,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
   ));
   ?>
  </div>
 </div>

 <div id="gb-goal-notes">
  <?php
  $this->renderPartial('goal.views.goal.activity.note._goal_notes_list', array(
    "goalNotes" => $goalNotes,
    "goalNotesCount" => $goalNotesCount,
    "goalId" => $goalId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

