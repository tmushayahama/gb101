<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="gb-todo-item row" gb-source="<?php echo Type::$SOURCE_TODO; ?>"
     data-gb-source-pk="<?php echo $todoChild->id; ?>">
  <div class="gb-box-7 gb-background-white gb-margin-left-neg-thick">
    <div class="row gb-bottom-border-grey-1 gb-padding-medium"> 
      <?php
      $this->renderPartial('todo.views.todo.activity.todo._todo_item_row', array(
       "todoChild" => $todoChild,
      ));
      ?> 
    </div>
    <div class="row ">
      <div class="gb-icon-nav row">
        <ul id="" class="gb-icon-top-nav-1 row ">
          <li class="active col-lg-2 col-sm-2 col-xs-12">
            <a href="#gb-todo-item-overview-pane" data-toggle="tab"
               gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoItemOverview", array('todoChildId' => $todoChild->id)); ?>">  
              <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/overview_1.png"; ?>" class="img-circle gb-img-sm" alt="">
              <h6 class="gb-small-text">Activities</h6>
            </a>
          </li>    
          <li class="col-lg-2 col-sm-2 col-xs-12">
            <a class="" href="#gb-todo-item-checklists-pane" data-toggle="tab"
               gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoItemChecklists", array('todoChildId' => $todoChild->id)); ?>">           
              <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/checklist_1.png"; ?>" class="img-circle gb-img-sm" alt="">
              <h6 class="gb-small-text">Checklists</h6>
            </a>
          </li>
          <li class="col-lg-2 col-sm-2 col-xs-12">
            <a class="row" href="#gb-todo-item-comments-pane" data-toggle="tab"
               gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoItemComments", array('todoChildId' => $todoChild->id)); ?>">
              <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/comment_1.png"; ?>" class="img-circle gb-img-sm" alt="">
              <h6 class="gb-small-text">Comments</h6>
            </a>
          </li>
          <li class="col-lg-2 col-sm-2 col-xs-12">
            <a class="row" href="#gb-todo-item-notes-pane" data-toggle="tab"
               gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoItemNotes", array('todoChildId' => $todoChild->id)); ?>">
              <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/note_1.png"; ?>" class="img-circle gb-img-sm" alt="">
              <h6 class="gb-small-text">Notes</h6>
            </a>
          </li>    
          <li class="col-lg-2 col-sm-2 col-xs-12">
            <a class="row" href="#gb-todo-item-contributors-pane" data-toggle="tab"
               gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoItemContributors", array('todoChildId' => $todoChild->id)); ?>">
              <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/people_1.png"; ?>" class="img-circle gb-img-sm" alt="">
              <h6 class="gb-small-text">Contributors</h6>
            </a>
          </li>

          <li class="col-lg-2 col-sm-2 col-xs-12">
            <a class="" data-toggle="dropdown">
              <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/more_1.png"; ?>" class="img-circle gb-img-sm" alt="">
              <h6 class="gb-small-text">More</h6>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a class="row" href="#gb-todo-welcome-note-pane" data-toggle="tab"
                   gb-url="<?php echo Yii::app()->createUrl("todo/todoTab/todoTodos", array('todoListId' => $todoChild->id)); ?>">
                  <img src="<?php echo Yii::app()->request->baseUrl . "/img/icons/people_1.png"; ?>" class="img-circle gb-img-sm" alt="">
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div> 
  <div class="row gb-stat-box">
    <div class="gb-heading col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding ">
      <div class="gb-title text-center">
        <h4>Todo Progress</h4>
        <div class="progress gb-progress-bar">
          <div class="gb-checklist-item-progress progress-bar progress-bar-info col-lg-12 col-sm-12 col-xs-12 gb-no-padding" 
               role="progressbar" 
               aria-valuenow="<?php echo $todoChecklistsProgressCount; ?>" 
               aria-valuemin="0" aria-valuemax="100" style="<?php echo 'width:' . $todoChecklistsProgressCount . '%'; ?>">
          </div>
        </div>
      </div>
      <div class="gb-stat-value">
        <?php echo $todoChecklistsProgressCount . "%"; ?>
      </div>
    </div>
  </div> 
  <div class="tab-content">
    <div class="tab-pane active" id="gb-todo-item-overview-pane">    
      <div class="row gb-tab-pane-body">
        <?php
        $this->renderPartial('todo.views.todo.welcome_tab.todo_item_tab._todo_item_overview_pane', array(
         'todoChild' => $todoChild,
         'todoChecklists' => $todoChecklists,
         'todoChecklistsCount' => $todoChecklistsCount,
         'todoChecklistsProgressCount' => $todoChecklistsProgressCount,
         'todoContributors' => $todoContributors,
         'todoContributorsCount' => $todoContributorsCount,
         'todoComments' => $todoComments,
         'todoCommentsCount' => $todoCommentsCount,
         'todoNotes' => $todoNotes,
         'todoNotesCount' => $todoNotesCount,
         'todoWeblinks' => $todoWeblinks,
         'todoWeblinksCount' => $todoWeblinksCount,
        ))
        ?>
        <br>
      </div>
    </div>

    <div class="tab-pane active" id="gb-todo-item-checklists-pane">    
      <div class="row gb-tab-pane-body">

      </div>
    </div>
    <div class="tab-pane" id="gb-todo-item-contributors-pane">    
      <div class="row gb-tab-pane-body">

      </div>
    </div>
    <div class="tab-pane" id="gb-todo-item-comments-pane">    
      <div class="row gb-tab-pane-body">

      </div>
    </div>
    <div class="tab-pane" id="gb-todo-item-notes-pane">    
      <div class="row gb-tab-pane-body">

      </div>
    </div>
  </div>
</div>

