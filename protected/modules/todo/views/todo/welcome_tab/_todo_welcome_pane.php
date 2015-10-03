<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="gb-nav-parent gb-left-nav-1 col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
  <div id="gb-todos-nav" class="row  panel-group" role="tablist" aria-multiselectable="true">
    <div class="panel">
      <div class="row" role="tab">
        <a class="active collapsed col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-margin"
           data-toggle="collapse" 
           gb-data-toggle='gb-expandable-tab'
           data-parent="#gb-todos-nav" href="#gb-collapse-todo-welcome"
           aria-expanded="false" aria-controls="gb-collapse-todo-welcome"
           gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoWelcome", array('todoListId' => $todoParent->id)); ?>">
          <i class="glyphicon glyphicon-pause pull-left"></i> 
          <div class="col-lg-9 gb-padding-left-1">
            <p class="gb-ellipsis">Overview</p>
          </div>
          <i class="glyphicon glyphicon-chevron-right pull-right"></i>
        </a>
      </div>
      <div id="gb-collapse-todo-welcome" class="row panel-collapse collapse" role="tabpanel" >
      </div>
    </div>
    <h5 class="gb-heading-3">TODOS 
      <span class="pull-right badge gb-badge-sm"><?php echo $todoListChildrenCount; ?></span>
    </h5>
    <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
         gb-is-child-form="0"
         data-gb-target="#gb-todo-form"
         data-gb-url="<?php echo Yii::app()->createUrl("todo/todo/addTodo", array("todoParentId" => $todoParent->id)); ?>"
         gb-form-description-input="#gb-todo-form-description-input">
      <textarea class="form-control"
                placeholder="Add a Todo"
                rows="1"></textarea>
      <div class="input-group-btn">
        <div class="input-group-btn">
          <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus-sign"></i></button>
        </div><!-- /btn-group -->
      </div>
    </div>
    <br>
    <div id="gb-todos" class="row">

      <?php foreach ($todoListChildren as $todoListChild): ?>
        <?php
        $this->renderPartial('todo.views.todo.activity.todo._todo_item', array(
         "todoListChild" => $todoListChild,
        ));
        ?> 
      <?php endforeach; ?>
    </div>
  </div>
</div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12  gb-middle-container-1">
  <div class="tab-content">
    <!---------- TODO MANAGEMENT WELCOME OVERVIEW PANE ------------>
    <div class="tab-pane active" id="gb-todo-item-pane">      
      <div class="row gb-tab-pane-body">
        <?php
        $this->renderPartial('todo.views.todo.welcome_tab._todo_overview_pane', array(
         "todoParent" => $todoParent,
         "todoParentInfo" => $todoParentInfo,
         "todoListChildren" => $todoListChildren,
         "todoListChildrenCount" => $todoListChildrenCount,
        ));
        ?>     
      </div>
    </div>
  </div>
</div>


