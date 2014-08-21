<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="<?php echo $modalId ?>" class="modal fade" gb-tags-type="<?php echo Type::$SKILL_TAG; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="gb-mentorship-form-cancel-btn btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        <div class="">Tags </div>
      </div>
      <div class="modal-body gb-padding-thin">
        <div class="input-group">
          <input type="text" class="form-control gb-tag-name-input">
          <span class="input-group-addon gb-submit-tag-btn"><i class="glyphicon glyphicon-plus"></i> Add</span>
        </div>
        <div class="row">
          <?php foreach ($tags as $tag): ?>
          <a><?php echo $tag->tag; ?></a>
          <?php endforeach; ?>
        </div>
          
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">Done</a>
      </div>
    </div>
  </div>
</div>

