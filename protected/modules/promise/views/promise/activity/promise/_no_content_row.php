<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row gb-content-row">
 <?php
 switch ($type):
  case Type::$NO_CONTENT_PROMISE
   ?>
   <br>
   <br>
   <div class="row alert">
    <h4 class="text-warning text-center">Select a promise to show</h4>
   </div>
 <?php endswitch; ?>
</div>
