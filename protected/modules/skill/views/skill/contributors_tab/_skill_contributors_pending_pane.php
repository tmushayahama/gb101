<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-skill-judges">
  <?php
  echo $this->renderPartial('skill.views.skill._skill_judge_requests', array(
   "skillJudgeRequests" => $skillJudgeRequests,
   "skillListItem" => $skillListItem));
  ?>

  <?php
  echo $this->renderPartial('skill.views.skill._skill_observer_requests', array(
   "skillObserverRequests" => $skillObserverRequests,
   "skillListItem" => $skillListItem));
  ?>
</div>