<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-link gb-box row"
     gb-data-toggle='gb-expandable-tab'
     gb-url="<?php echo Yii::app()->createUrl("hobby/hobbyTab/hobby", array('hobbyId' => $hobby->id)); ?>">
 <div class="gb-container row">
  <div class="col-lg-1 gb-no-padding">
   <img src="<?php echo Yii::app()->request->baseUrl . "/img/hobbies/" . $hobby->hobby_picture_url; ?>" class="gb-heading-img img-circle pull-right" alt="">
  </div>
  <div class="col-lg-10 gb-padding-left-1 text-left">
   <p class="gb-ellipsis gb-title"><?php echo $hobby->title; ?></p>
   <p class="gb-ellipsis gb-description">
    <?php
    if ($hobby->description) {
     echo $hobby->description;
    } else {
     echo "<i>no description</i>";
    }
    ?>
   </p>
   <p class="gb-ellipsis gb-description text-info"><i><?php echo $hobby->level->name; ?></i></p>
  </div>
  <i class="glyphicon glyphicon-chevron-right pull-right"></i>
 </div>
</div>