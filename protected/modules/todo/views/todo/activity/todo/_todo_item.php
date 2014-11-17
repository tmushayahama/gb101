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
    <div class="gb-icon-nav row">
      <ul id="" class="gb-icon-side-nav-1 col-lg-12 col-md-12 col-sm-12 col-xs-12 row gb-no-padding">
        <li class="active col-lg-2 col-sm-2 col-xs-12">
          <a class="" href="#gb-todo-welcome-overview-pane" data-toggle="tab">
            <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/progress_1.png"; ?>" class="img-circle gb-img-sm" alt="">
          </a>
        </li>    
        <li class="col-lg-2 col-sm-2 col-xs-12">
          <a class="" href="#gb-todo-welcome-overview-pane" data-toggle="tab">
            <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/checklist_1.png"; ?>" class="img-circle gb-img-sm" alt="">
          </a>
        </li>
        <li class="col-lg-2 col-sm-2 col-xs-12">
          <a class="row" href="#gb-todo-welcome-comments-pane" data-toggle="tab"
             gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoComments", array('todoListId' => $todoListChild->id)); ?>">
            <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/comment_1.png"; ?>" class="img-circle gb-img-sm" alt="">

          </a>
        </li>
        <li class="col-lg-2 col-sm-2 col-xs-12">
          <a class="row" href="#gb-todo-welcome-note-pane" data-toggle="tab"
             gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoTodos", array('todoListId' => $todoListChild->id)); ?>">
            <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/note_1.png"; ?>" class="img-circle gb-img-sm" alt="">

          </a>
        </li>    
        <li class="col-lg-2 col-sm-2 col-xs-12">
          <a class="row" href="#gb-todo-welcome-note-pane" data-toggle="tab"
             gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoTodos", array('todoListId' => $todoListChild->id)); ?>">
            <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/people_1.png"; ?>" class="img-circle gb-img-sm" alt="">

          </a>
        </li>   
      </ul>
    </div>
  </div>
</div>