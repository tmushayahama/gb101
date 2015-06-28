<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-link gb-box-5 row <?php echo $active; ?> "
     gb-data-toggle='gb-expandable-tab'
     data-gb-replace-when='sm'
     data-parent="#gb-left-nav-3"
     data-gb-url="<?php echo $url; ?>"
     data-gb-target-pane-id="#gb-profile-tab-pane">
 <div class="gb-heading-img-container col-lg-2 col-md-2 col-sm-2 col-xs-2">
  <img src="<?php echo $iconUrl; ?>" class="gb-heading-img" alt="">
 </div>
 <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
  <p class="gb-ellipsis gb-title"><?php echo $title; ?></p>
  <p class="gb-ellipsis gb-description"><?php echo $description; ?></p>
 </div>
</div>

