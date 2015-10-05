<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="nav-container col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-thin">
 <div id="gb-middle-nav-3" class="gb-nav-parent row">
  <div id="" class="gb-top-nav-1 gb-nav row">
   <div class="gb-title col-lg-8 col-md-8 col-sm-8 col-xs-8">
    <p class="gb-ellipsis">
     ABOUT ME
    </p>
   </div>
   <div class="gb-action col-lg-4 col-md-4 col-sm-4 col-xs-4">
   </div>
  </div>
  <div class="gb-scrollable-container col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <?php
   $this->renderPartial('user.views.profile.owner.sections._profile_header', array(
     "profile" => $profile,
   ));
   ?>
   <div class="row">
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
    <?php
    $this->renderPartial('user.views.profile.owner.sections._profile_my_details', array(
      "profile" => $profile,
    ));
    ?>
   </div>
   <div class="gb-dummy-height row"></div>
  </div>
 </div>
</div>