<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<div class="gb-promise-promise-list-row row-fluid">
  <div class="span1 promise-row-num">
    <?php echo $count++ ?>
  </div>
  <div class="span8">
    <p class="gb-ellipsis">
      <a href="<?php echo Yii::app()->createUrl('promise/promise/promisedetail', array('promiseListId' => $promiseListItem->id)); ?>"><?php echo $promiseListItem->promise->title ?></a>
    </p>
  </div>
  <div class="span3">
    <a class="gb-btn pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></a>
  </div>
</div>
