<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$this->renderPartial('user.views.profile.sections._profile_header', array(
  "profile" => $profile,
));
?>

<div class = "row">
 <div class = "col-lg-7">
  <?php
  $this->renderPartial('user.views.profile.sections._profile_summary', array(
    "profile" => $profile,
  ));
  ?>
  <?php
  $this->renderPartial('user.views.profile.sections._profile_experience', array(
    "profile" => $profile,
  ));
  ?>
  <?php
  $this->renderPartial('user.views.profile.sections._profile_interest', array(
    "profile" => $profile,
  ));
  ?>
  <?php
  $this->renderPartial('user.views.profile.sections._profile_favorite_quote', array(
    "profile" => $profile,
  ));
  ?>
 </div>
 <div class="col-lg-5">
  <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
   <div class="gb-nav-heading-2 col-lg-7 col-sm-2 col-xs-12">
    <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
       gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
     <p class="gb-title gb-ellipsis">MY DETAILS</p>
    </a>
   </div>
   <div class="col-lg-offset-2 col-lg-3 col-sm-2 gb-padding-thin">
    <a class="gb-edit-form-show btn btn-default pull-right">
     <i class="glyphicon glyphicon-edit"></i> Edit
    </a>
   </div>
  </ul>
  <br>
  <ul class="list-group row">
   <li class="list-group-item"><?php echo Type::getGenderName($profile->gender); ?></li>
   <li class="list-group-item"><?php echo $profile->address; ?></li>
  </ul>
 </div>
</div>