<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

$count = 1;
foreach ($skillListBank as $skillBankItem):
  ?> 
  <?php
  echo $this->renderPartial('skill.views.skill._skill_bank_item_row', array(
   'skillBankItem' => $skillBankItem));
  ?>
<?php endforeach; ?>

