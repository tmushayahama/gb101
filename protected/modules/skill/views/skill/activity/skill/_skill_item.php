<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$collapseId = 'gb-todo-collapse-' . $todoListChild->id;
?>
<div class="panel">
  <div class="row" role="tab">
    <a class="collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
       data-toggle="collapse" 
       gb-data-toggle='gb-expandable-tab'
       data-parent="#gb-todos-nav" href="<?php echo '#' . $collapseId; ?>"
       aria-expanded="false" aria-controls="<?php echo $collapseId; ?>"
       gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoChild", array('todoChildId' => $todoListChild->id)); ?>">
      <i class="glyphicon glyphicon-pause pull-left"></i> 
      <div class="col-lg-9 gb-padding-left-1 text-left">
        <p class="gb-ellipsis"><?php echo $todoListChild->description; ?></p>
      </div>
      <i class="glyphicon glyphicon-chevron-right pull-right"></i>

    </a>
  </div>
  <div id="<?php echo $collapseId; ?>" class="row panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
  </div>
</div>