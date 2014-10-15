<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3 class="gb-heading-2">Skill Note List
  <a class="btn btn-sm gb-btn-2 gb-form-show pull-right"
     gb-form-slide-target="#gb-skill-note-form-container"
     gb-form-target="#gb-skill-note-form"
     gb-form-heading="Create Skill Note List">
    <i class="glyphicon glyphicon-plus"></i>
    Add
  </a>
</h3>
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

