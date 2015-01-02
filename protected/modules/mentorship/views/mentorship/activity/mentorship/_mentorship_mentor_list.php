<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-link gb-box row"
     gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorshipOverview", array('mentorshipId' => $mentorship->id)); ?>">
 <div class="gb-container">
  <div class="row gb-heading">
   <div class="col-lg-12 gb-no-padding">
    <p class=" gb-ellipsis gb-title">
     <strong><?php echo "Mentorship Overview"; ?></strong>
    </p>
   </div>
  </div>
  <div class="row gb-body">
   <p class="gb-description">
    Quick view to manage all your mentors and mentees.
   </p>
  </div>
 </div>
</div>

<?php
if ($mentorshipChildrenCount == 0):
 ?>
 <div class="row text-center text-warning gb-no-information row">
  <br>
  no mentorships added
 </div>
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



