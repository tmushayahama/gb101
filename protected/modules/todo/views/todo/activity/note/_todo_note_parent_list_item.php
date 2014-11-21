<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<li class="gb-post-entry gb-note-row col-lg-6 col-sm-6 col-xs-12" todo-note-id="<?php echo $todoNoteParent->id; ?>"
    gb-source-pk-id="<?php echo $todoNoteParent->note_id; ?>" gb-data-source="<?php echo Type::$SOURCE_TODO; ?>">

  <a class="">
    <h5 class="gb-parent-box-heading">
      <span> 
        <div href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $todoNoteParent->note->creator_id)); ?>">
          <?php echo $todoNoteParent->note->creator->profile->firstname . " " . $todoNoteParent->note->creator->profile->lastname ?>
        </div>
      </span>
    </h5>
    <div class="row gb-panel-display">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
        <p>
          <span class="gb-display-attribute" gb-control-target="#gb-note-form-description-input"><?php echo $todoNoteParent->note->description; ?></span>
        </p>
      </div>
    </div>  
  </a> 
</li>

