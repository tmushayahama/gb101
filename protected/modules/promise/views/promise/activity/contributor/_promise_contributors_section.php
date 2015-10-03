<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12  gb-no-margin">
 <div id="gb-contributor-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('application.views.site.forms._request_form', array(
     "formId" => "gb-contributor-form",
     "prependTo" => "#gb-promise-contributors",
     "requestModel" => new Notification(),
     "sourceId" => $promiseId,
     "requestTypes" => $contributorTypes,
     "title" => "Add a Contributor",
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_NOTIFY
   ));
   ?>
  </div>
 </div>
 <div id="gb-promise-contributors">
  <?php
  $this->renderPartial('promise.views.promise.activity.contributor._promise_contributors_list', array(
    "promiseContributors" => $promiseContributors,
    "promiseContributorsCount" => $promiseContributorsCount,
    "promiseId" => $promiseId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

