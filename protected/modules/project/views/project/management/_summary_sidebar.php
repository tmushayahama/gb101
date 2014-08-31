<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
  <h3 class="gb-heading-2">Creator</h3>
  <p class="">
    <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $project->creator_id)); ?>"><?php echo $project->creator->profile->firstname . " " . $project->creator->profile->lastname; ?></a>
  </p>
</div>
<div class="row">
  <h3 class="gb-heading-2">Description</h3>  
  <p class="">
    <strong><?php echo $project->name; ?> </strong>
    <span class=""> 
      <?php echo $project->description; ?>
    </span> 
</div>