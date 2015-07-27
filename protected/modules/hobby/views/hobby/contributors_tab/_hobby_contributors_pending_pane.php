<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-hobby-contributors">
  <?php
  echo $this->renderPartial('hobby.views.hobby._hobby_contributor_requests', array(
   "hobbyContributorRequests" => $hobbyContributorRequests,
   "hobby" => $hobby));
  ?>

  <?php
  echo $this->renderPartial('hobby.views.hobby._hobby_observer_requests', array(
   "hobbyObserverRequests" => $hobbyObserverRequests,
   "hobby" => $hobby));
  ?>
</div>