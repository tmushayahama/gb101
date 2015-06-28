<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-block gb-section-row-2 row"
     data-gb-source-pk="<?php echo 0; ?>"
     data-gb-source="<?php echo Type::$SOURCE_PROFILE_INTEREST; ?>"
     data-gb-del-message-key="">
 <div class="gb-heading row">
  <div class="gb-title col-lg-9 col-md-9 col-sm-9 col-xs-10">
   <p class="gb-ellipsis">INTERESTS</p>
  </div>
  <div class="gb-action col-lg-3 col-md-3 col-sm-3 col-xs-2">
   <a class="gb-edit-form-show btn btn-default btn-sm pull-right">
    <i class="glyphicon glyphicon-edit"></i> <span class="hidden-xs">edit</span>
   </a>
  </div>
 </div>
 <div class="gb-body">
  <p class="gb-panel-display">
   <?php if ($profile->interests != ""): ?>
    <?php echo $profile->interests; ?>
   <?php else: ?>
    <?php echo "Write your interests "; ?>
    <a class="gb-edit-form-show">
     write interests
    </a>
   <?php endif; ?>
  </p>
  <div id="gb-profile-interests-form-container" class="row gb-hide gb-panel-form">
   <?php
   $this->renderPartial('user.views.profile.forms._profile_interest_form', array(
     "formId" => "gb-profile-interests-form",
     "actionUrl" => Yii::app()->createUrl("user/profile/addUserQuestionAnswer", array()),
     "prependTo" => "",
     "profileModel" => $profile,
     "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_EDIT
   ));
   ?>
  </div>
 </div>
</div>
