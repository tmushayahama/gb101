<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding gb-no-margin">
 <div class="row">
  <input class="gb-form-show gb-prepopulate-selected-people-list gb-backdrop-disappear form-control input-lg col-lg-12 col-md-12 col-sm-12 col-xs-12"
         type="text"
         data-gb-selection-type="multiple"
         data-gb-target-container="#gb-contributor-form-container"
         data-gb-target="#gb-contributor-form"
         data-gb-list-target="#gb-contributor-form-people-list"
         data-gb-requester-type="<?php echo Notification::$REQUEST_FROM_OWNER; ?>"
         data-gb-status="<?php echo Notification::$STATUS_PENDING; ?>"
         data-gb-source-pk="<?php echo $skillId; ?>"
         data-gb-source="<?php echo Type::$SOURCE_CONTRIBUTOR; ?>"
         readonly
         placeholder="Add Contributor(s)"/>
 </div>
 <div id="gb-contributor-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('application.views.site.forms._request_form', array(
     "formId" => "gb-contributor-form",
     "prependTo" => "#gb-skill-contributors",
     "requestModel" => new Notification(),
     "sourceId" => $skillId,
     "requestTypes" => $contributorTypes,
     "title" => "Add a Contributor",
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_NOTIFY
   ));
   ?>
  </div>
 </div>
 <div id="gb-skill-contributors">
  <?php
  $this->renderPartial('skill.views.skill.activity.contributor._skill_contributors', array(
    "skillContributors" => $skillContributors,
    "skillContributorsCount" => $skillContributorsCount,
    "skillId" => $skillId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

