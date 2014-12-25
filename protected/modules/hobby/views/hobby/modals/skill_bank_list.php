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
        Select From Hobby Bank
      </div>
      <div class="modal-body modal-body-scroll">
        <div id="gb-hobbybank-search-result" class="row">

          <?php
          echo $this->renderPartial('hobby.views.hobby._hobby_bank_list_1', array(
           'hobbyBank' => $hobbyBank,));
          ?>
        </div>

        <a id='gb-load-more-hobbybank' class= 'btn-lg btn btn-default col-lg-12 col-md-12 col-sm-12 col-xs-12' type=2 next-page=1>
          Load More
        </a>
      </div>
      <div class="modal-footer">

      </div>

    </div>
  </div>
</div>