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
    <h4 class=""><?php echo $subgoal->subgoal->title; ?></a>   
      <small> <?php echo $subgoal->subgoal->description ?></small>
    </h4>
  </div>
  <div class="panel-footer">
    <a class="gb-btn">Agree: <div class="badge badge-info">0</div></a>
    <a class="gb-btn">Disagree: <div class="badge badge-info">0</div></a>
  </div>
</div>

