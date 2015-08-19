<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-heading-3">PLAY</div>
<p class="gb-padding-medium">
 A random skill will appear.
 <i> Choose what you wanna do with it?</i>
</p>
<div class="gb-panel-display row">
 <div class="row">
  <?php
  $this->renderPartial('skill.views.skill.forms._skill_play_form', array(
    "actionUrl" => Yii::app()->createUrl("skill/skill/addSkillPlayAnswer", array()),
    "skillPlayAnswerModel" => new SkillPlayAnswer(),
    "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
  ));
  ?>
 </div>
</div>
