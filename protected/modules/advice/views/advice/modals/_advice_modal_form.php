<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-advice-form-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
    Add a Advice
   </div>
   <div class="modal-body">
    <?php
    $this->renderPartial('advice.views.advice.forms._advice_form', array(
      "formId" => "gb-advice-form",
      "actionUrl" => Yii::app()->createUrl("advice/advice/addAdvice", array()),
      "prependTo" => "#gb-advices",
      "adviceLevelList" => $adviceLevelList,
      'adviceModel' => new Advice(),
      "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
    ));
    ?>
   </div>
  </div>
 </div>
</div>