<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-promise-play-modal" class="modal gb-modal-lg fade gb-z-index-2000" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
    <span class="gb-title">Promise Play</span>
   </div>
   <div class="modal-body ">
    <div class="row" role="tabpanel">
     <ul class="gb-modal-tabs-left nav col-lg-4 col-md-4 col-sm-4 col-xs-4"
         id="demo-pill-nav">
      <p class="gb-padding-medium">
       You can choose one or more ways to contribute.
       <i> A checkmark shows which part you are contributing</i>
      </p>
      <li class="active col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
       <a href="#tab-r1" data-toggle="tab">
        Promises
       </a>
      </li>
      <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
       <a href="#tab-r2" data-toggle="tab">
        History
       </a>
      </li>
      <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
       <a href="#tab-r3" data-toggle="tab">
        Make it a promise
       </a>
      </li>
      <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
       <a href="#tab-r4" data-toggle="tab">
        Make it a promise
       </a>
      </li>
     </ul>
     <div class="gb-modal-panes-right tab-content col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
      <div class="tab-pane active" id="tab-r1">
       <div class="gb-heading-3">BE A MENTOR</div>
       <div class="gb-panel-display row">
        <div class="row">
         <?php
         $this->renderPartial('promise.views.promise.forms._promise_play_form', array(
           "actionUrl" => Yii::app()->createUrl("promise/promise/addPromisePlayAnswer", array()),
           "promisePlayAnswerModel" => new PromisePlayAnswer(),
           "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
         ));
         ?>
        </div>
       </div>
       <br>
      </div>
      <div class="tab-pane" id="tab-r2">
       <p>
        Stay tuned! Advice is coming soon
       </p>
      </div>
      <div class="tab-pane" id="tab-r3">
       <p>
        Stay tuned! Promises are coming soon
       </p>
      </div>
      <div class="tab-pane" id="tab-r4">
       <p>
        Stay tuned! Promises are coming soon
       </p>
      </div>
     </div>
    </div>
   </div>
   <div class="modal-footer gb-modal-footer-abs">
    <div class="row">
     <a class="btn btn-default" data-dismiss="modal" aria-hidden="true">Done</a>
    </div>
   </div>
  </div>
 </div>
</div>