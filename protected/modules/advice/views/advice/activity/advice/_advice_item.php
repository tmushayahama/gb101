<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
 <div class="gb-link gb-box-2"
      data-gb-link-type="redirects"
      data-gb-url="<?php echo Yii::app()->createUrl("advice/advice/advice", array('adviceId' => $advice->id)); ?>">
  <div class="gb-heading-img-container row">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/advices/" . $advice->advice_picture_url; ?>" class="gb-heading-img" alt="">
  </div>
  <div class="row gb-body">
   <div class="col-lg-12 ">
    <p class=" gb-ellipsis gb-title">
     <strong><?php echo $advice->title; ?></strong>
    </p>
    <p class="gb-description gb-ellipsis">
     <?php
     if ($advice->description) {
      echo $advice->description;
     } else {
      echo "<i>no description</i>";
     }
     ?>
    </p>
    <p class="gb-ellipsis gb-description"><i><?php echo $advice->level->name; ?></i></p>
   </div>
  </div>
  <div class="row gb-footer">
   <p class="gb-ellipsis gb-description"><i><?php echo $advice->created_date; ?></i></p>
  </div>
 </div>
</div>