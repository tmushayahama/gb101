<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-skill-note-form-container" class="row gb-panel-form gb-hide">

</div>
<div id="gb-notes">
  <?php
  if (count($skillNoteParentList) == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
      no note(s) added.
    </h5>
  <?php endif; ?>

  <?php foreach ($skillNoteParentList as $skillNoteParent): ?>
    <?php
    $this->renderPartial('skill.views.skill.activity._skill_note_parent_list_item', array(
     "skillNoteParent" => $skillNoteParent)
    );
    ?>
  <?php endforeach; ?>    
</div>

