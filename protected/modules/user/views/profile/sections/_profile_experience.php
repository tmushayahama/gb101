<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-block gb-section-row-1 row"
     data-gb-source-pk="<?php echo 0; ?>"
     data-gb-source="<?php echo Type::$SOURCE_PROFILE_EXPERIENCE; ?>"
     data-gb-del-message-key="">
 <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
  <div class="gb-nav-heading-2 col-lg-9 col-sm-2 col-xs-12">
   <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
      gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
    <p class="gb-title gb-ellipsis">EXPERIENCE</p>
   </a>
  </div>
  <div class="col-lg-3 col-sm-2 gb-padding-thin">
   <a class="gb-edit-form-show btn btn-default pull-right">
    <i class="glyphicon glyphicon-edit"></i> Edit
   </a>
  </div>
 </ul>
 <div class="gb-body-1">
  <p class="gb-panel-display"><?php echo $profile->experience; ?></p>
  <div id="gb-profile-experience-form-container" class="row gb-hide gb-panel-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="row ">
    <?php
    $this->renderPartial('user.views.profile.forms._profile_experience_form', array(
      "formId" => "gb-profile-experience-form",
      "actionUrl" => Yii::app()->createUrl("user/profile/addUserQuestionAnswer", array()),
      "prependTo" => "",
      "profileModel" => $profile,
      "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_EDIT
    ));
    ?>
   </div>
  </div>
 </div>
</div>