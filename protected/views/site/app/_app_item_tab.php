<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<li>
 <a id="<?php echo $app_tab_id; ?>" class="gb-link gb-app-tab row <?php echo $active; ?> "
    gb-data-toggle='gb-expandable-tab'
    data-parent="#gb-left-nav-3"
    data-gb-url="<?php echo $url; ?>"
    data-gb-target-pane-id="#gb-main-tab-pane">
  <div class="col-lg-8 col-md-12 col-sm-12 hidden-xs caption gb-padding-none">
   <p class="gb-ellipsis gb-title"><?php echo $appName; ?></p>
  </div>
  <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 thumbnail">
   <img src="<?php echo $iconUrl; ?>" class="gb-icon" alt="">
  </div>
 </a>
</li>

