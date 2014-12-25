<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-request-mentorship-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Request Mentorship
      </div>
      <div class="modal-body">
        <div class="row">
          <a href="<?php echo Yii::app()->createUrl("mentorship/mentorship/mentorshiphome"); ?>" class="btn btn-link col-lg-12 col-sm-12 col-xs-12"><i class="glyphicon glyphicon-list"></i>Go To Mentorship Page</a>

          <div class="form-group row">
            <input id="gb-request-mentorship-goal-input" type="text" class =" col-lg-12 col-sm-12 col-xs-12" readonly>
          </div>
          <div class="form-group row">
            <textarea id="gb-request-message" class="col-lg-12 col-sm-12 col-xs-12" rows="2" placeholder="Write a short message"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <a id="gb-request-mentorship-btn" class="pull-right btn btn-primary">Request Mentoring</a>
        </div>
      </div>
    </div>
  </div>
</div>