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
    data-gb-target-container="#gb-mentorship-form-container"
    data-gb-target="#gb-mentorship-form"
    data-gb-url="<?php echo Yii::app()->createUrl('mentorship/mentorship/addmentorship', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
    data-gb-prepend-to="#gb-mentorships">
  <i class="glyphicon glyphicon-plus-sign"></i> Add a Mentorship
 </a>
</div>
<div id="gb-mentorship-form-container" class="row gb-hide gb-panel-form">
 <?php
 $this->renderPartial('mentorship.views.mentorship.forms._mentorship_form_with_level', array(
   "formId" => "gb-mentorship-form",
   "actionUrl" => Yii::app()->createUrl("mentorship/mentorship/addMentorship", array()),
   "prependTo" => "#gb-mentorships",
   'mentorshipModel' => new Mentorship(),
   'levelId' => $level->id,
   "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
 ));
 ?>
</div>
<div id="gb-mentorships" class="gb-list">
 <?php
 $this->renderPartial('mentorship.views.mentorship.activity.mentorship._mentorship_list', array(
   "mentorships" => $mentorships,
   "mentorshipsCount" => $mentorshipsCount,
   "level" => $level->id,
   "offset" => 1,
 ));
 ?>
</div>