<?php
/* @var $this TodoCommitmentController */
/* @var $model TodoCommitment */
/* @var $form CActiveForm */
?>
<a href="<?php echo Yii::app()->createUrl('todo/todo/todoManagement', array('todoListItemId' => $todoListItem->id)); ?>" class="gb-todo-todo-list-row row home-menu-box-3 col-lg-12 col-sm-12 col-xs-12">
  <p class="gb-ellipsis">
    <?php echo $todoListItem->todo->title ?>
  </p>
</a>
