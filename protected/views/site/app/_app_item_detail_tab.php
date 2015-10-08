<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
 <a class="gb-link gb-app-tab row"
    data-gb-type="app-menu"
    gb-data-toggle='gb-expandable-tab'
    data-parent="#gb-left-nav-3"
    data-gb-url="<?php echo $url; ?>"
    data-gb-target-pane-id="<?php echo $targetPaneId; ?>">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
   <p class="gb-ellipsis gb-title">
    <img src="<?php echo $iconUrl; ?>" class="gb-icon" alt="">
    <?php echo $title; ?>
   </p>
  </div>
 </a>
</li>