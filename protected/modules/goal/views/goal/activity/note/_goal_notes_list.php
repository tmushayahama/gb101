<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($goalNotesCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no notes
 </h5>
<?php endif; ?>

<?php
$noteCounter = 1;
foreach ($goalNotes as $goalNote):
 ?>
 <?php
 $this->renderPartial('note.views.note.activity._note_parent', array(
   "note" => $goalNote->note,
   "noteCounter" => $noteCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Note::$NOTES_PER_PAGE;
if ($offset < $goalNotesCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_GOAL_NOTE; ?>"
    data-gb-source-pk="<?php echo $goalId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-goal-notes">
  More Notes
 </a>
<?php endif; ?>

