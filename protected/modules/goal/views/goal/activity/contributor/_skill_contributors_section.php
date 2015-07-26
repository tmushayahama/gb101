<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none gb-no-margin">
 <div id="gb-contributor-form-container" class="row gb-hide gb-panel-form">
  <div class="row">
   <?php
   $this->renderPartial('application.views.site.forms._request_form', array(
     "formId" => "gb-contributor-form",
     "prependTo" => "#gb-goal-contributors",
     "requestModel" => new Notification(),
     "sourceId" => $goalId,
     "requestTypes" => $contributorTypes,
     "title" => "Add a Contributor",
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_NOTIFY
   ));
   ?>
  </div>
 </div>
 <div id="gb-goal-contributors">
  <?php
  $this->renderPartial('goal.views.goal.activity.contributor._goal_contributors_list', array(
    "goalContributors" => $goalContributors,
    "goalContributorsCount" => $goalContributorsCount,
    "goalId" => $goalId,
    "offset" => 1,
  ));
  ?>
 </div>
</div>

