<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-advice-contributors">
  <?php
  echo $this->renderPartial('advice.views.advice._advice_contributor_requests', array(
   "adviceContributorRequests" => $adviceContributorRequests,
   "advice" => $advice));
  ?>

  <?php
  echo $this->renderPartial('advice.views.advice._advice_observer_requests', array(
   "adviceObserverRequests" => $adviceObserverRequests,
   "advice" => $advice));
  ?>
</div>