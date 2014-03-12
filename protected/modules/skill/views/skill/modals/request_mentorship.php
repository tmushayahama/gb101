<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-request-mentorship-modal" class="modal gb-modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <h2>Request Mentorship
    <button class="pull-right gb-btn gb-btn-red-1 gb-btn-color-white skilllist-modal-close-btn" data-dismiss="modal" aria-hidden="true">close</button>
  </h2>
  <div class="modal-body">
    <div class="row-fluid">
      <div class="gb-btn-row-large row-fluid gb-margin-bottom-narrow">
        <a href="<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshiphome"); ?>" class="span12 gb-btn gb-btn-grey-2"><i class="icon-list"></i>Go To Mentorship Page</a>

      </div>
      <div class="row-fluid ">
        <input id="gb-request-mentorship-goal-input" type="text" class ="input-block-level gb-margin-bottom-narrow" readonly>
        <textarea id="gb-request-message" class="input-block-level" rows="2" placeholder="Write a short message"></textarea>
      </div>
      <button id="gb-request-mentorship-btn" class="gb-btn gb-btn-blue-2">Request Mentoring</button>
    </div>
  </div>
</div>

