<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-link gb-box-3 row"
     data-gb-url="<?php echo Yii::app()->createUrl("advice/adviceTab/adviceChildOverview", array('adviceId' => $advice->id)); ?>"
     data-gb-target-pane-id="#gb-advice-item-pane">
 <div class="gb-container">
  <div class="row gb-heading">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
    <p class=" gb-ellipsis gb-title">
     <strong><?php echo "Advice Overview"; ?></strong>
    </p>
   </div>
  </div>
  <div class="row gb-body">
   <p class="gb-description gb-ellipsis">
    Created by
    <a>
     <?php echo $advice->creator->profile->firstname . " " . $advice->creator->profile->lastname; ?>
    </a>
   </p>
   <p class="gb-description">
    Quick view to manage all your mentors and mentees.
   </p>
  </div>
 </div>
</div>

<?php
if ($adviceChildrenCount == 0):
 ?>
 <div class="row text-center text-warning gb-no-information row">
  <br>
  no advices added
 </div>
<?php endif; ?>

<?php
$adviceChildCounter = 1;

foreach ($adviceChildren as $adviceChild):
 ?>
 <?php
 $this->renderPartial('advice.views.advice.activity.advice._advice_mentor_item', array(
   "adviceChild" => $adviceChild,
   "count" => $adviceChildCounter++
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Advice::$ADVICES_PER_PAGE;
if ($offset < $adviceChildrenCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_ADVICE; ?>"
    data-gb-source-pk="<?php echo $levelId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-advices">
  More Notes
 </a>
<?php endif; ?>



