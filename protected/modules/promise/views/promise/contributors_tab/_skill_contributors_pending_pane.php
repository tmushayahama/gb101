<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-promise-contributors">
  <?php
  echo $this->renderPartial('promise.views.promise._promise_contributor_requests', array(
   "promiseContributorRequests" => $promiseContributorRequests,
   "promise" => $promise));
  ?>

  <?php
  echo $this->renderPartial('promise.views.promise._promise_observer_requests', array(
   "promiseObserverRequests" => $promiseObserverRequests,
   "promise" => $promise));
  ?>
</div>