<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-send-request-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body gb-no-padding">
    <div class="row">
     <?php
     $this->renderPartial('application.views.site.forms._request_form', array(
       "formId" => $formId,
       "prependTo" => $prependTo,
       "requestModel" => new Notification(),
       "sourceId" => $sourceId,
       "requestTypes" => $requestTypes,
       "title" => $title,
       "ajaxReturnAction" => $ajaxReturnAction
     ));
     ?>
    </div>
   </div>
  </div>
 </div>
</div>

