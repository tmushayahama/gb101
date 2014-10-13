<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3 class="gb-heading-2">Pending Requests</h3>
<div id="gb-skill-judges">
  <?php
  echo $this->renderPartial('skill.views.skill._skill_judge_requests', array(
   "skillJudgeRequests" => $skillJudgeRequests,
   "skillListItem" => $skillListItem));
  ?>
</div>