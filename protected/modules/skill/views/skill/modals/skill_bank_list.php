<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-bank-list-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
        Select From Skill Bank
      </div>
      <div class="modal-body modal-body-scroll">
        <?php
        $count = 1;
        foreach ($skillListBank as $skillBankItem):
          echo $this->renderPartial('skill.views.skill._skill_list_bank_item_row', array(
           'skillBankItem' => $skillBankItem,
           'count' => $count++));
          ?>
        <?php endforeach; ?>
      </div>
      <div class="modal-footer">

      </div>

    </div>
  </div>
</div>