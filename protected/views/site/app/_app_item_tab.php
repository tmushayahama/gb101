<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<li id="<?php echo $appTabId; ?>" class="col-lg-12 col-md-12 col-sm-6 col-xs-12 gb-padding-none">
 <a class="gb-link gb-app-tab row <?php echo $appClassName; ?> "
    data-gb-type="app-menu"
    gb-data-toggle='gb-expandable-tab'
    data-parent="#gb-left-nav-3"
    data-gb-url="<?php echo $url; ?>"
    data-gb-target-pane-id="#gb-main-tab-pane">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
   <p class="gb-ellipsis gb-title">
    <img src="<?php echo $iconUrl; ?>" class="gb-icon" alt="">
    <?php echo $appName; ?>
   </p>
   <div class="gb-description">
    <?php echo $appDescription; ?>
   </div>
  </div>
 </a>
</li>

