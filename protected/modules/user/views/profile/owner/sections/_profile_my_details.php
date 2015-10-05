<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-block row gb-section-row-2"
     data-gb-source-pk="<?php echo 0; ?>"
     data-gb-source="<?php echo Type::$SOURCE_PROFILE_DETAILS; ?>"
     data-gb-del-message-key="">
 <div class="gb-heading row">
  <div class="gb-title col-lg-9 col-md-9 col-sm-9 col-xs-10">
   <p class="gb-ellipsis">MY DETAILS</p>
  </div>
 </div>
 <div class="gb-body">
  <p class="gb-panel-display">
  <ul class="list-group row">
   <li class="list-group-item"><?php echo Type::getGenderName($profile->gender); ?></li>
  </ul>
 </div>
</div>
