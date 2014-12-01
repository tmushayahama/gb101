<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

if (Yii::app()->user->isGuest):
  foreach ($skillBank as $skillBank):
    ?> 
    <?php

    echo $this->renderPartial('skill.views.skill._skill_bank_item_row_guest', array(
     'skillBank' => $skillBank));
    ?>
  <?php

  endforeach;
else:
  foreach ($skillBank as $skillBank):
    ?> 
    <?php

    echo $this->renderPartial('skill.views.skill._skill_bank_item_row', array(
     'skillBank' => $skillBank));
    ?>
  <?php endforeach;
endif;
?>


