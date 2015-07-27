<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-advice-item row" gb-source="<?php echo Type::$SOURCE_ADVICE; ?>"
     data-gb-source-pk="<?php echo $advice->id; ?>">
 <div class="gb-nav-heading-1 col-lg-9 col-sm-2 col-xs-12">
  <p class="gb-title gb-ellipsis">ADVICE OVERVIEW</p>
 </div>

 <div class="gb-title col-lg-9 col-sm-2 col-xs-12">
  <p class="gb-ellipsis">DESCRIPTION</p>
 </div>
 <div class="row gb-padding-medium">
  <div class="col-lg-12 col-sm-12 col-xs-11 gb-padding-none">
   <p class="gb-display-attribute col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
    <strong><?php echo $advice->title; ?></strong>
    <?php echo $advice->description; ?>
   </p>
  </div>
 </div>
 <div class="gb-title col-lg-9 col-sm-2 col-xs-12">
  <p class="gb-ellipsis">DESCRIPTION</p>
 </div>
 <div class="col-lg-12">
  <?php foreach ($overviewQuestions as $overviewQuestion): ?>
   <?php
   echo $this->renderPartial('advice.views.advice.activity.question._overview_question', array(
     'advice' => $advice,
     'overviewQuestion' => $overviewQuestion));
   ?>
  <?php endforeach; ?>
 </div>
</div>

