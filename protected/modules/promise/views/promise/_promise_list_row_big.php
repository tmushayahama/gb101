<?php
/* @var $this GoalCommitmentController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<div class="gb-promise-promise-list-row-big">
  <div class="row-fluid">
    <div class="span11">
      <h5 class="promise-commitment-title">
        <a href="<?php echo Yii::app()->createUrl('promise/promise/promisedetail', array('promiseListId' => $promiseListItem->id)); ?>"><?php echo $promiseListItem->promise->title ?></a> 
        <small><?php echo $promiseListItem->promise->description ?></small>
      </h5>
    </div>
    <div class="span1">
       <a class="pull-right gb-btn gb-btn-red-1"><i class="icon-white icon-trash"></i></a>
    </div>
  </div>
  <div class="row-fluid">
    <div class="gb-promise-footer inline">
      <a class="gb-btn">Edit</a>
      <a class="gb-btn">Commit promise</a>
      <a class="gb-btn">Share</a>
      <a class="pull-right gb-btn"><h5>More Details</h5></a>
    </div>
  </div>
</div>
