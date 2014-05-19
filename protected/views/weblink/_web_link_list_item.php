<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
  <div class="col-lg-10 col-md-10 col-sm-10">
    <p><a href="<?php echo $webLink->link; ?>" target="blank"><strong><?php echo $webLink->title; ?> </strong></a> 
      <?php echo $webLink->description; ?>
    </p>
  </div>
  <div class="col-lg-2 col-md-2 col-sm-3">   
    <a class="btn btn-xs btn-link pull-right"><i class="glyphicon glyphicon-trash"></i></a>
    <a class="btn btn-xs btn-link pull-right"><i class="glyphicon glyphicon-edit"></i></a>
  </div>
</div>


