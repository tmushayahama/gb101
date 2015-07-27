<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="<?php echo 'gb-level-' . $level->id; ?> row">
 <h3 class="gb-item-level-heading gb-ellipsis">
  <?php echo $level->name; ?>
 </h3>
</div>
<div class="row">
 <a class="btn btn-default btn-lg gb-form-show gb-backdrop-visible col-lg-12 col-md-12 col-sm-12 col-xs-12"
    data-gb-target-container="#gb-advice-form-container"
    data-gb-target="#gb-advice-form"
    data-gb-url="<?php echo Yii::app()->createUrl('advice/advice/addadvice', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
    data-gb-prepend-to="#gb-advices">
  <i class="glyphicon glyphicon-plus-sign"></i> Add a Advice
 </a>
</div>
<div id="gb-advice-form-container" class="row gb-hide gb-panel-form">
 <?php
 $this->renderPartial('advice.views.advice.forms._advice_form_with_level', array(
   "formId" => "gb-advice-form",
   "actionUrl" => Yii::app()->createUrl("advice/advice/addAdvice", array()),
   "prependTo" => "#gb-advices",
   'adviceModel' => new Advice(),
   'levelId' => $level->id,
   "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
 ));
 ?>
</div>
<div id="gb-advices" class="gb-list">
 <?php
 $this->renderPartial('advice.views.advice.activity.advice._advice_list', array(
   "advices" => $advices,
   "advicesCount" => $advicesCount,
   "level" => $level->id,
   "offset" => 1,
 ));
 ?>
</div>