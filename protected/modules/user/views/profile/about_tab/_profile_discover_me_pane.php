<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-right-nav-2" class="gb-nav-parent col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-padding-none">
 <div class="row gb-padding-medium">
  <div class="gb-heading-9"><?php echo $profile->firstname . " " . $profile->lastname; ?></div>
  <?php echo $profile->welcome_message; ?>
 </div>
 <div class="row">
  <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
   <div class="gb-nav-heading-1 col-lg-3 col-sm-2 col-xs-12">
    <a href="#gb-mentorship-item-tab-pane" data-toggle="tab"
       gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('tabName' => "PP")); ?>">
     <p class="gb-title gb-ellipsis">DISCOVER ME</p>
    </a>
   </div>
   <div class="col-lg-offset-7 col-lg-2 col-sm-2 gb-padding-thin">
    <a class="gb-form-modal-trigger btn btn-default pull-right"
       data-gb-modal-target="#gb-mentorship-form-modal">
     <i class="glyphicon glyphicon-plus"></i> Edit
    </a>
   </div>
  </ul>
 </div>
 <br>
 <div class="row">
  <div class="col-lg-8">
   <div class="gb-body-1">
    This is discove me body
   </div>
  </div>
  <div class="col-lg-4">

  </div>
 </div>
 <div class="gb-dummy-height"></div>
</div>
