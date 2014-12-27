<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($mentorshipNotesCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no notes
 </h5>
<?php endif; ?>

<?php
$noteCounter = 1;
foreach ($mentorshipNotes as $mentorshipNote):
 ?>
 <?php
 $this->renderPartial('note.views.note.activity._note_parent', array(
   "note" => $mentorshipNote->note,
   "noteCounter" => $noteCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Note::$NOTES_PER_PAGE;
if ($offset < $mentorshipNotesCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_MENTORSHIP_NOTE; ?>"
    data-gb-source-pk="<?php echo $mentorshipId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-mentorship-notes">
  More Notes
 </a>
<?php endif; ?>

