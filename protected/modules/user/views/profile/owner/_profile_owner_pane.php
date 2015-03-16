<div class="nav-container col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-no-padding">
 <div id="gb-middle-nav-3" class="gb-nav-parent">
  <div class="thumbnail">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $profile->avatar_url; ?>" alt="">
   <div class="caption">
    <h5 class="text-center gb-ellipsis"><?php echo $profile->firstname . ' ' . $profile->lastname; ?></h5>
   </div>
  </div>
  <div id="gb-skills-nav" class="row gb-no-padding panel-group" role="tablist" aria-multiselectable="true">
   <br>
   <div class="row">
    <h6 class="gb-heading-8 gb-ellipsis">
     ABOUT
    </h6>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "active" => "active",
      "appName" => "About Me",
      "url" => Yii::app()->createUrl("user/profileTab/profileOwnerOverview", array("userId" => Yii::app()->user->id)),
      "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/profile/gb_about_me.png"
    ));
    ?>
    <?php
    $this->renderPartial('application.views.site.app._app_item_tab', array(
      "active" => "",
      "appName" => "Discover Me",
      "url" => Yii::app()->createUrl("user/profileTab/profileOwnerDiscoverMe", array("userId" => Yii::app()->user->id)),
      "iconUrl" => Yii::app()->request->baseUrl . "/img/icons/profile/gb_discover_me.png"
    ));
    ?>
   </div>
  </div>
  <div class="gb-dummy-height"></div>
 </div>
</div>
<div class="nav-container col-lg-8 col-md-8 col-sm-12 col-xs-12 gb-no-padding">
 <div id="gb-right-nav-3" class="">
  <div id="gb-profile-tab-pane">
   <?php
   echo $this->renderPartial('user.views.profile.owner.about_tab._owner_overview_pane', array(
     "profile" => $profile,
   ))
   ?>
  </div>
  <div class="gb-dummy-height"></div>
 </div>
</div>
<!-- ------------------------------- MODALS --------------------------->
