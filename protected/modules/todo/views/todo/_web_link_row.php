<?php
/* @var $this TodoCommitmentController */
/* @var $model TodoCommitment */
/* @var $form CActiveForm */
?>
<div class="gb-todo-management-weblink row-fluid ">
  <div class="span9">
    <a href="<?php echo $todoWeblink->link ?>" class="" target="blank">
      <?php echo $todoWeblink->title ?>
    </a><br>
  </div>
  <div class="span3">
    <a class="gb-btn pull-right gb-btn-red-1"><i class="glyphicon glyphicon-white  icon-trash"></i></a>
    <a class="gb-btn pull-right "><i class="glyphicon glyphicon-edit"></i></a>
    <a class="">More Details</a>
  </div>
</div>
