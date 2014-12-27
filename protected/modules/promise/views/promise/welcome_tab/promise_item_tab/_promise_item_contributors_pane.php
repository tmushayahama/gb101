<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
 <div class="row">
  <div class="row gb-panel-form gb-hide">
  </div>
  <h5 class="gb-heading-6 col-lg-12 col-sm-12 col-xs-12">
   <div class="col-lg-11 col-sm-11 col-xs-11 gb-padding-thin">
    <p class="gb-ellipsis">Contributors (<i><?php echo $promiseContributorsCount; ?></i>)
    </p>
   </div>
   <div class="btn gb-request-notification-viewer gb-populate col-lg-1 col-sm-1 col-xs-1 gb-no-padding"
        data-gb-target="#gb-notification-viewer-body"
        data-gb-type="gb-modal"
        data-gb-target-heading="#gb-notification-viewer-heading"
        data-gb-heading-text="Pending promise judge request(s)"
        data-gb-source="<?php echo Notification::$TYPE_CONTRIBUTOR; ?>"
        data-gb-source-pk="<?php echo $promiseId; ?>">
    <div class="text-right"></div>
    <h4><i class="text-warning glyphicon glyphicon-road"></i></h4>
   </div>
  </h5>
  <input class="gb-form-show gb-prepopulate-selected-people-list gb-backdrop-disappear form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12"
         type="text"
         data-gb-selection-type="multiple"
         data-gb-target-container="#gb-contributor-form-container"
         data-gb-target="#gb-contributor-form"
         data-gb-list-target="#gb-contributor-form-people-list"
         data-gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
         data-gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
         data-gb-source-pk="<?php echo $promiseId; ?>"
         data-gb-source="<?php echo Type::$SOURCE_CONTRIBUTOR; ?>"
         readonly
         placeholder="Add Contributor(s)"/>
 </div>
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
  $this->renderPartial('promise.views.promise.activity.contributor._promise_contributors', array(
    "promiseContributors" => $promiseContributors,
    "promiseContributorsCount" => $promiseContributorsCount,
    "promiseId" => $promiseId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>
