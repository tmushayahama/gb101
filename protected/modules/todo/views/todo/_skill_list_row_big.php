<?php
/* @var $this TodoCommitmentController */
/* @var $model TodoCommitment */
/* @var $form CActiveForm */
?>
<div class="gb-todo-todo-list-row-big">
  <div class="row-fluid">
    <div class="span11">
      <h5 class="">
        <a href="<?php echo Yii::app()->createUrl('todo/todo/tododetail', array('todoListId' => $todoListItem->id)); ?>"><?php echo $todoListItem->todo->title ?></a> 
        <small><?php echo $todoListItem->todo->description ?></small>
      </h5>
    </div>
    <div class="span1">
       <a class="pull-right gb-btn gb-btn-red-1"><i class="glyphicon glyphicon-white icon-trash"></i></a>
    </div>
  </div>
  <div class="row-fluid">
    <div class="gb-todo-footer inline">
      <a class="gb-btn">Edit</a>
      <a class="gb-btn">Commit Todo</a>
      <a class="gb-btn">Share</a>
      <a class="pull-right gb-btn"><h5>More Details</h5></a>
    </div>
  </div>
</div>
