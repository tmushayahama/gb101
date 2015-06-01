<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row">
  <div class="col-lg-11 col-sm-11 col-xs-11 gb-padding-none">
    <p class="gb-display-attribute col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
      <strong><?php echo $promise->title; ?></strong>
      <?php echo $promise->description; ?>
    </p>      
  </div>
  <div class="btn-group pull-right">
    <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
      <i class="glyphicon glyphicon-chevron-down"></i>
    </button>
    <ul class="dropdown-menu" role="menu">
      <li><a class="gb-edit-form-show" data-gb-target="#gb-promise-form">edit</a></li>
      <li><a class="gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">Delete</a></li>
    </ul>
  </div>
</div>
