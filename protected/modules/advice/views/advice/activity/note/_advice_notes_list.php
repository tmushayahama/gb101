<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ($adviceNotesCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no notes
 </h5>
<?php endif; ?>

<?php
$noteCounter = 1;
foreach ($adviceNotes as $adviceNote):
 ?>
 <?php
 $this->renderPartial('note.views.note.activity._note_parent', array(
   "note" => $adviceNote->note,
   "noteCounter" => $noteCounter++,
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Note::$NOTES_PER_PAGE;
if ($offset < $adviceNotesCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_ADVICE_NOTE; ?>"
    data-gb-source-pk="<?php echo $adviceId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-advice-notes">
  More Notes
 </a>
<?php endif; ?>

