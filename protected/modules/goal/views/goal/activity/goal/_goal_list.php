<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
if ($goalsCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no goals added
 </h5>
<?php endif; ?>

<?php
$goalCounter = 1;

foreach ($goals as $goal):
 ?>
 <?php
 $this->renderPartial('goal.views.goal.activity.goal._goal_item', array(
   "goal" => $goal,
   "count" => $goalCounter++
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Goal::$GOALS_PER_PAGE;
if ($offset < $goalsCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_GOAL; ?>"
    data-gb-source-pk="<?php //echo $levelId;   ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-goals">
  More Notes
 </a>
<?php endif; ?>



