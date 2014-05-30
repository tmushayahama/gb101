<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-add-mentorship-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Start Mentoring
      </div>
      <div class="modal-body">
        <?php
        echo $this->renderPartial('mentorship.views.mentorship.forms._add_mentorship_form', array(
         'fromHomePage' => true,
         'mentorshipModel' => $mentorshipModel,
         'mentorshipLevelList' => $mentorshipLevelList,
         'skillGainedList' => $skillGainedList));
        ?>
      </div>
    </div>
  </div>
</div>

