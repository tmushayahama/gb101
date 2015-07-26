<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
if ($advicesCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no advices added
 </h5>
<?php endif; ?>

<?php
$adviceCounter = 1;

foreach ($advices as $advice):
 ?>
 <?php
 $this->renderPartial('advice.views.advice.activity.advice._advice_item', array(
   "advice" => $advice,
   "count" => $adviceCounter++
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Advice::$ADVICES_PER_PAGE;
if ($offset < $advicesCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_ADVICE; ?>"
    data-gb-source-pk="<?php echo $levelId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-advices">
  More Notes
 </a>
<?php endif; ?>



