<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="<?php echo 'gb-level-' . $level->id; ?> row">
 <h3 class="gb-item-level-heading gb-ellipsis">
  <?php echo $level->name; ?>
 </h3>
</div>

<div class="row">
 <a class="btn btn-default btn-lg gb-form-show gb-backdrop-visible col-lg-12 col-md-12 col-sm-12 col-xs-12"
    data-gb-target-container="#gb-promise-form-container"
    data-gb-target="#gb-promise-form"
    data-gb-url = "<?php echo Yii::app()->createUrl('promise/promise/addpromise', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
    data-gb-prepend-to="#gb-promises">
  <i class="glyphicon glyphicon-plus-sign"></i> Add a Promise
 </a>
</div>
<div id="gb-promise-form-container" class="row gb-hide gb-panel-form">
 <?php
 $this->renderPartial('promise.views.promise.forms._promise_form_with_level', array(
   "formId" => "gb-promise-form",
   "actionUrl" => Yii::app()->createUrl("promise/promise/addPromise", array()),
   "prependTo" => "#gb-promises",
   'promiseModel' => new Promise(),
   'levelId' => $level->id,
   "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
 ));
 ?>
</div>

<div id="gb-promises" class="gb-list">
 <?php
 $this->renderPartial('promise.views.promise.activity.promise._promise_list', array(
   "promises" => $promises,
   "promisesCount" => $promisesCount,
   "level" => $level->id,
   "offset" => 1,
 ));
 ?>
</div>