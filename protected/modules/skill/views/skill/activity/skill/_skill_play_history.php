<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-heading-3">PLAY HISTORY</div>
<div class="gb-panel-display row">
 <div class="row">
  <?php foreach (SkillPlayAnswer::getPlayAnswers() as $skillPlay): ?>
   <div class="row gb-skill-history-row">
    <a>
     <?php echo $skillPlay->skill->title; ?>
    </a>
    <p>
     <?php echo $skillPlay->skillLevel->name; ?>
    </p>
   </div>
  <?php endforeach; ?>
 </div>
</div>