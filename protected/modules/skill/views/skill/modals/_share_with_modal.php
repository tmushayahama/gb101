<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-send-skill-request"  gb-type="<?php //echo $modalType ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header gb-form-header gb-form-header-2">
        <div class="row">
          <h3 class="gb-form-heading pull-left">Add Comment List</h3>
          <div class="pull-right btn-group">
            <a class="gb-form-hide btn btn-xs btn-default" data-dismiss="modal" aria-hidden="true">X</a>
          </div>
        </div>
      </div>
      <div class="gb-form-body row">
        <div class="list-group">
          <a class="list-group-item active gb-select-sharing-type" gb-type="<?php echo Type::$SHARE_PRIVATE; ?>">
            <h4 class="list-group-item-heading">Private</h4>
            <p class="list-group-item-text">Noone can see this except you.</p>
          </a>
          <a class="list-group-item gb-select-sharing-type" gb-type="<?php echo Type::$SHARE_PUBLIC; ?>" >
            <h4 class="list-group-item-heading">Public</h4>
            <p class="list-group-item-text">Everyone can see this skill.</p>
          </a>
        </div>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">Done</a>
      </div>
    </div>
  </div>
</div>

