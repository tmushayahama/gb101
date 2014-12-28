<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
if ($mentorshipChildrenCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no mentorships added
 </h5>
<?php endif; ?>

<?php
$mentorshipChildCounter = 1;

foreach ($mentorshipChildren as $mentorshipChild):
 ?>
 <?php
 $this->renderPartial('mentorship.views.mentorship.activity.mentorship._mentorship_mentor_item', array(
   "mentorshipChild" => $mentorshipChild,
   "count" => $mentorshipChildCounter++
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Mentorship::$MENTORSHIPS_PER_PAGE;
if ($offset < $mentorshipChildrenCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_MENTORSHIP; ?>"
    data-gb-source-pk="<?php echo $levelId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-mentorships">
  More Notes
 </a>
<?php endif; ?>



