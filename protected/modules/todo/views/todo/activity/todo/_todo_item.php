<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<li class="col-lg-12 col-sm-12 col-xs-12">
  <a class="row" href="#gb-todo-item-pane" data-toggle="tab"  
     gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoChild", array('todoChildId' => $todoListChild->id)); ?>">
    <i class="glyphicon glyphicon-pause pull-left"></i> 
    <div class="col-lg-9 gb-padding-left-1">
      <p class="gb-ellipsis"><?php echo $todoListChild->description; ?></p>
    </div>
    <i class="glyphicon glyphicon-chevron-right pull-right"></i>
  </a>
</li>
