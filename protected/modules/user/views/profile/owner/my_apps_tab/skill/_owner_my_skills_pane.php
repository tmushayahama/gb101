<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-block gb-profile-header-1 row"
     data-gb-source-pk="<?php echo 0; ?>"
     data-gb-source="<?php echo Type::$SOURCE_PROFILE_HEADER; ?>"
     data-gb-del-message-key="">
 <div class="gb-profile-header-img-container-1 col-lg-2 col-md-2 col-sm-2 col-xs-2">
  <img src="<?php echo Yii::app()->request->baseUrl . '/img/icons/profile/gb_skill.png' ?>" class="gb-profile-header-img-1" alt="">
 </div>
 <div class="gb-panel-display col-lg-7 col-md-7 col-sm-10 col-xs-10">
  <div class="gb-heading-9">
   <p class="gb-ellipsis">
    <?php echo $profile->firstname . " " . $profile->lastname; ?>
   </p>
   <div class="gb-sub-heading gb-ellipsis">
    MY SKILLS
   </div>
  </div>
 </div>
 <div class = "col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-padding-medium">
  <div class = "row">
   <div class="btn btn-default gb-edit-form-show gb-backdrop-disappear col-lg-12 col-md-12 col-sm-12 col-xs-12"
        data-gb-target-container="#gb-profile-welcome-form-container"
        data-gb-target="#gb-profile-welcome-form">
    <i class = "glyphicon glyphicon-edit"></i> Edit
   </div>
   <br>
   <br>
   <div class = "gb-disabled-1 btn btn-primary col-lg-12 col-md-12 col-sm-4 col-xs-6">
    <i class = "glyphicon glyphicon-cog"></i> Settings
   </div>
  </div>
 </div>
</div>
<div id="gb-user-skills" class="row gb-padding-thickest">
 <?php foreach ($userSkills as $userSkill): ?>
  <?php
  $this->renderPartial('user.views.profile.owner.my_apps_tab.skill._skill_item_heading', array(
    "skill" => $userSkill,
  ));
  ?>
 <?php endforeach; ?>
</div>
<div class="gb-dummy-height"></div>