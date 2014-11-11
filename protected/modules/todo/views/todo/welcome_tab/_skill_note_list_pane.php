<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-note-form-container" class="row gb-panel-form gb-hide">

</div>
<div id="gb-notes">
  <?php
  if (count($todoNoteParentList) == 0):
    ?>
    <h5 class="text-center text-warning gb-no-information row">
      no note(s) added.
    </h5>
  <?php endif; ?>

  <?php foreach ($todoNoteParentList as $todoNoteParent): ?>
    <?php
    $this->renderPartial('todo.views.todo.activity._todo_note_parent_list_item', array(
     "todoNoteParent" => $todoNoteParent)
    );
    ?>
  <?php endforeach; ?>    
</div>

