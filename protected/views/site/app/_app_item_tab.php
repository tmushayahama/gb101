<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<a id="<?php echo $app_tab_id; ?>" class="gb-link gb-app-tab row <?php echo $active; ?> "
   gb-data-toggle='gb-expandable-tab'
   data-parent="#gb-left-nav-3"
   gb-url="<?php echo $url; ?>">
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
  <div class="thumbnail">
   <img src="<?php echo $iconUrl; ?>" class="gb-icon" alt="">
  </div>
  <div class="caption gb-no-padding">
   <p class="gb-ellipsis gb-title"><?php echo $appName; ?></p>
  </div>
 </div>
</a>

