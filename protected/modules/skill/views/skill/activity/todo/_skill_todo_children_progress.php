<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row">
  <?php foreach ($todoListChildren as $todoListChild): ?>
    <div class="gb-box-1 col-lg-12 col-sm-12 col-xs-12">
      <div class="row">
        <div class="col-lg-10 col-sm-10 col-xs-10 gb-no-padding">
          <p class="gb-ellipsis col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
            <?php echo $todoListChild->todo->description; ?>
          </p>
        </div>
        <div class="col-lg-1 col-sm-1 col-xs-1 pull-right badge badge-info">
          <?php echo '40%' ?>
        </div>
      </div>
      <br>
      <div class="col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
        <div class="progress">
          <div class="progress-bar progress-bar-info progress-bar-striped col-lg-12 col-sm-12 col-xs-12" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
            <span class="sr-only">20% Complete</span>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>  
</div>



