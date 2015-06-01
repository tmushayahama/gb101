<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container-fluid">
 <div class="container">
  <div class="row gb-breadcrumb-container-4">
   <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 gb-padding-medium">
    <div class="gb-breadcrumb row">
     <?php foreach ($breadcrumbItems as $item => $url) : ?>
      <?php if ($url != ""): ?>
       <a href="<?php echo $url; ?>" class="gb-ellipsis-3">
        <?php echo $item; ?>
       </a>
       <div class="gb-breadcrumb-caret"><i class="glyphicon glyphicon-play"></i></div>
      <?php else : ?>
       <p class="gb-ellipsis-3">
        <?php echo $item; ?>
       </p>
      <?php endif; ?>
     <?php endforeach; ?>
    </div>
   </div>
   <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 gb-padding-none">

   </div>
  </div>
 </div>
</div>

