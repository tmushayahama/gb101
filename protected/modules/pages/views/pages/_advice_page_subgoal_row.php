<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h5 class=""><a><?php echo "Skill " . $count; ?></a></h5>
  </div>
  <div class="panel-body">
    <p class=""><strong><?php echo $subskill->subskillList->skill->title; ?></strong>: 
      <?php echo $subskill->subskillList->skill->description ?>
    </p>
  </div>
</div>

