<?php
/* @var $this TodoListItemController */
/* @var $model TodoCommitment */
/* @var $form CActiveForm */
$todoUrl = "";
if (Yii::app()->user->isGuest) {
  $todoUrl = Yii::app()->createUrl("todo/todo/todobank", array());
} else {
  $todoUrl = Yii::app()->createUrl("todo/todo/todohome", array());
}
?>
<div class="gb-post-entry panel panel-default row" todo-id="<?php echo $todoListItem->id; ?>" 
     gb-source-pk-id="<?php echo $todoListItem->id; ?>" gb-data-source="<?php echo Type::$SOURCE_SKILL; ?>">
  <div class="gb-discussion-title-side-border row">
    <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs gb-no-padding">
      <img src="<?php echo Yii::app()->request->baseUrl . "/img/profile_pic/" . $todoListItem->creator->profile->avatar_url; ?>" class="gb-parent-box-heading-img img-circle pull-right" alt="">
    </div>
    <div class="col-lg-11 col-sm-11 col-xs-12 gb-no-padding gb-no-margin">
      <h5 class="gb-parent-box-heading">
        <a href="<?php echo $todoUrl; ?>" class="todo-level gb-display-attribute" gb-control-target="#gb-todo-list-form-level-input" gb-option-id="<?php echo $todoListItem->level_id; ?>">
          <?php echo $todoListItem->level->name ?></a> - <a href="<?php echo Yii::app()->createUrl('user/profile/profile/', array('user' => $todoListItem->creator_id)); ?>"><?php echo $todoListItem->creator->profile->firstname . " " . $todoListItem->creator->profile->lastname ?>
        </a>
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-chevron-down"></i>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a class="gb-edit-form-show" gb-form-target="#gb-todo-list-form">edit</a></li>
            <li><a class="gb-delete-me" gb-del-type="<?php echo Type::$DEL_TYPE_REMOVE; ?>">Delete</a></li>
            <li class="divider"></li>
          </ul>
        </div>
      </h5>
      <div class="panel-body">
        <div class="row gb-panel-display">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding">
            <p class="">
              <a class="todo-title gb-display-attribute" gb-control-target="#gb-todo-list-form-title-input" href="<?php echo Yii::app()->createUrl('todo/todo/todoManagement', array('todoListItemId' => $todoListItem->id)); ?>">
                <?php echo $todoListItem->todo->title; ?>
              </a>   
              <span class="todo-description gb-display-attribute" gb-control-target="#gb-todo-list-form-description-input"><?php echo $todoListItem->todo->description ?></span>
            </p>
          </div>
        </div>
      </div>
      <div class="gb-panel-form gb-hide gb-no-padding">
      </div>

    </div>
  </div>
  <div class="panel-footer row gb-panel-display gb-no-padding">
    <div class="row">
      <a href="<?php echo Yii::app()->createUrl('todo/todo/todoManagement', array('todoListItemId' => $todoListItem->id)); ?>" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm btn-default"><i class="glyphicon glyphicon-open"></i> Open</a>
      <a class="gb-disabled-1 gb-todo-contribute-request-modal-trigger col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm btn-default"><i class="glyphicon glyphicon-list-alt"></i> Participate</a>
      <a href="<?php echo Yii::app()->createUrl('todo/todo/todoManagement', array('todoListItemId' => $todoListItem->id)); ?>" class="gb-disabled-1 col-lg-4 col-md-4 col-sm-4 col-xs-4 btn btn-sm  btn-default"><i class="glyphicon glyphicon-share-alt"></i> Share</a>
    </div>
    <div id="gb-todo-contributor-request-form-container" class="row gb-panel-form gb-hide">

    </div>
  </div>
</div>