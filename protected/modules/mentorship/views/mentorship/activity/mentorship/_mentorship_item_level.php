<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$collapseId = 'gb-mentorship-collapse-' . $mentorship->id;
?>
<a class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
   gb-data-toggle='gb-expandable-tab'
   data-parent="#gb-middle-nav-3"
   gb-url="<?php echo Yii::app()->createUrl("mentorship/mentorshipTab/mentorship", array('mentorshipId' => $mentorship->id)); ?>">
 <div class="col-lg-11 gb-padding-left-1 text-left">
  <p class="gb-ellipsis gb-title"><?php echo $mentorship->title; ?></p>
  <p class="gb-ellipsis gb-description">
   <?php
   if ($mentorship->description) {
    echo $mentorship->description;
   } else {
    echo "<i>no description</i>";
   }
   ?></p>
 </div>
 <i class="glyphicon glyphicon-chevron-right pull-right"></i>
</a>