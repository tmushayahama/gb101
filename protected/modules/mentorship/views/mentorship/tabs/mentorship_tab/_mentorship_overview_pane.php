<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-mentorship-item row" gb-source="<?php echo Type::$SOURCE_MENTORSHIP; ?>"
     data-gb-source-pk="<?php echo $mentorship->id; ?>">
 <div class="gb-nav-heading-1 col-lg-9 col-sm-2 col-xs-12">
  <p class="gb-title gb-ellipsis">MENTORSHIP OVERVIEW</p>
 </div>

 <div class="gb-title col-lg-9 col-sm-2 col-xs-12">
  <p class="gb-ellipsis">DESCRIPTION</p>
 </div>
 <div class="row gb-padding-medium">
  <div class="col-lg-12 col-sm-12 col-xs-11 gb-no-padding">
   <p class="gb-display-attribute col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
    <strong><?php echo $mentorship->title; ?></strong>
    <?php echo $mentorship->description; ?>
   </p>
  </div>
 </div>
</div>

