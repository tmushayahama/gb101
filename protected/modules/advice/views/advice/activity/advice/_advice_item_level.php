<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$collapseId = 'gb-advice-collapse-' . $advice->id;
?>
<a class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
   gb-data-toggle='gb-expandable-tab'
   data-parent="#gb-middle-nav-3"
   gb-url="<?php echo Yii::app()->createUrl("advice/adviceTab/advice", array('adviceId' => $advice->id)); ?>">
 <div class="col-lg-11 gb-padding-left-1 text-left">
  <p class="gb-ellipsis gb-title"><?php echo $advice->title; ?></p>
  <p class="gb-ellipsis gb-description">
   <?php
   if ($advice->description) {
    echo $advice->description;
   } else {
    echo "<i>no description</i>";
   }
   ?></p>
 </div>
 <i class="glyphicon glyphicon-chevron-right pull-right"></i>
</a>