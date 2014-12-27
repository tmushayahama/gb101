<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-middle-nav-3" class="gb-nav-parent col-lg-4 col-md-5 col-sm-12 col-xs-12">
 <div class="tab-content">
  <div class="tab-pane active" id="gb-app-overview-pane">
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
    $this->renderPartial('promise.views.promise.forms._promise_form', array(
      "formId" => "gb-promise-form",
      "actionUrl" => Yii::app()->createUrl("promise/promise/addPromise", array()),
      "prependTo" => "#gb-promises",
      "promiseLevelList" => $promiseLevelList,
      'promiseModel' => new Promise(),
      "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
    ));
    ?>
   </div>

   <div id="gb-promises" class="gb-list">
    <?php
    $this->renderPartial('promise.views.promise.activity.promise._promise_list', array(
      "promises" => $promises,
      "promisesCount" => $promisesCount,
      "level" => 0,
      "offset" => 1,
    ));
    ?>
   </div>
  </div>
 </div>
 <div class="gb-dummy-height"></div>
</div>
<div id="gb-right-nav-3" class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
 <div class="tab-content">
  <!---------- PROMISE MANAGEMENT WELCOME OVERVIEW PANE ------------>
  <div class="tab-pane active" id="gb-promise-item-pane">
   <br>
   <h4 class="text-center text-warning gb-no-information row">
    select a promise to show
   </h4>
  </div>
 </div>
 <div class="gb-dummy-height"></div>
</div>
