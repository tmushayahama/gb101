<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
if ($promisesCount == 0):
 ?>
 <h5 class="text-center text-warning gb-no-information row">
  no promises added
 </h5>
<?php endif; ?>

<?php
$promiseCounter = 1;

foreach ($promises as $promise):
 ?>
 <?php
 $this->renderPartial('promise.views.promise.activity.promise._promise_item', array(
   "promise" => $promise,
   "count" => $promiseCounter++
 ));
 ?>
<?php endforeach; ?>

<?php
$offset+=Promise::$PROMISES_PER_PAGE;
if ($offset < $promisesCount):
 ?>
 <a class="gb-more-btn btn btn-default col-lg-12 col-sm-12 col-xs-12"
    data-gb-source="<?php echo Type::$SOURCE_PROMISE; ?>"
    data-gb-source-pk="<?php echo $levelId; ?>"
    data-gb-offset="<?php echo $offset; ?>"
    data-gb-parent="#gb-promises">
  More Notes
 </a>
<?php endif; ?>



