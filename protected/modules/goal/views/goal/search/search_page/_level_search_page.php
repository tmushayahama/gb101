<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
 <?php foreach ($goalLevels as $goalLevel): ?>
  <div class="col-lg-6 col-md-6">
   <div class="row gb-heading">
    <div class="col-lg-10 col-md-10">
     <p class="gb-ellipsis">
      <?php echo $goalLevel->name; ?>
     </p>
    </div>
    <div class="col-lg-2 col-md-2">
     <div class="checkbox">
      <label>
       <input class="form-control" type="checkbox">
      </label>
     </div>
    </div>
   </div>
   <div class="row gb-body">
    <?php echo $goalLevel->description; ?>
   </div>
  </div>
 <?php endforeach; ?>
</div>
