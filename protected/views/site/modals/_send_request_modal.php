<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-send-request-modal" class="modal fade" gb-type="<?php echo $modalType ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <div class="">Send Request</div>
      </div>
      <div class="modal-body gb-padding-thin">
        <a class="list-group-item gb-select-sharing-type gb-requester-owner" gb-type="<?php echo Type::$SHARE_CUSTOMIZE; ?>">
          <h4 class="list-group-item-heading">Select People</h4>
          <p class="list-group-item-text">Select members who you want to share with.</p>
        </a>
        <div class="gb-share-with-people-list modal-body-scroll gb-background-light-grey-1 row gb-hide">

        </div>
        <div id="gb-request-form-container" class="row gb-panel-form">
          <?php
          echo $this->renderPartial('application.views.site.forms._request_form', array(
           "requestModel" => $requestModel));
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

