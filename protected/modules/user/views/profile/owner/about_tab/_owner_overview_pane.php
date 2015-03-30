<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$this->renderPartial('user.views.profile.owner.sections._profile_header', array(
  "profile" => $profile,
));
?>
<div class = "row">
 <div class = "col-lg-7">
  <?php
  $this->renderPartial('user.views.profile.owner.sections._profile_summary', array(
    "profile" => $profile,
  ));
  ?>
  <?php
  $this->renderPartial('user.views.profile.owner.sections._profile_experience', array(
    "profile" => $profile,
  ));
  ?>
  <?php
  $this->renderPartial('user.views.profile.owner.sections._profile_interest', array(
    "profile" => $profile,
  ));
  ?>
  <?php
  $this->renderPartial('user.views.profile.owner.sections._profile_favorite_quote', array(
    "profile" => $profile,
  ));
  ?>
 </div>
 <div class="col-lg-5">
  <div class="gb-section-row-1 row">
   <div class="gb-heading col-lg-12">
    <div class="gb-title col-lg-8 col-sm-2 col-xs-12">
     <p class="gb-ellipsis">MY DETAILS</p>
    </div>
    <div class="gb-action col-lg-4 col-sm-2">
     <a class="gb-edit-form-show btn btn-default btn-sm pull-right">
      <i class="glyphicon glyphicon-edit"></i> Edit
     </a>
    </div>
   </div>
  </div>
  <ul class="list-group row">
   <li class="list-group-item"><?php echo Type::getGenderName($profile->gender); ?></li>
   <li class="list-group-item"><?php echo $profile->address; ?></li>
  </ul>
 </div>
</div>