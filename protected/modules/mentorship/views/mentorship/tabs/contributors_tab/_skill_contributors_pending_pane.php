<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-mentorship-contributors">
  <?php
  echo $this->renderPartial('mentorship.views.mentorship._mentorship_contributor_requests', array(
   "mentorshipContributorRequests" => $mentorshipContributorRequests,
   "mentorship" => $mentorship));
  ?>

  <?php
  echo $this->renderPartial('mentorship.views.mentorship._mentorship_observer_requests', array(
   "mentorshipObserverRequests" => $mentorshipObserverRequests,
   "mentorship" => $mentorship));
  ?>
</div>