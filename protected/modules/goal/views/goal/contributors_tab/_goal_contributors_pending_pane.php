<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-goal-contributors">
  <?php
  echo $this->renderPartial('goal.views.goal._goal_contributor_requests', array(
   "goalContributorRequests" => $goalContributorRequests,
   "goal" => $goal));
  ?>

  <?php
  echo $this->renderPartial('goal.views.goal._goal_observer_requests', array(
   "goalObserverRequests" => $goalObserverRequests,
   "goal" => $goal));
  ?>
</div>