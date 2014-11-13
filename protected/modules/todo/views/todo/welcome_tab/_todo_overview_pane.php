<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
  <div class="gb-heading-4 col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="gb-breadcrumb row">
      <a href="<?php echo $todoParentInfo["rootUrl"]; ?>" class="gb-ellipsis-2">
        <?php echo $todoParentInfo["rootUrlDisplay"]; ?>
      </a>
      <div class="gb-breadcrumb-caret"><i class="glyphicon glyphicon-play"></i></div>
      <a href="<?php echo Yii::app()->createUrl("todo/todo/todoHome", array()); ?>" class="gb-ellipsis-3">
        <?php echo "To-do Lists"; ?>
      </a>
      <div class="gb-breadcrumb-caret"><i class="glyphicon glyphicon-play"></i></div>
      <p class="gb-ellipsis-3">
        <?php echo $todoParentInfo["typeDisplay"]; ?>
      </p>
    </div>
  </div>
  <div class="gb-box-3 gb-background-white">
    <?php
    $this->renderPartial('todo.views.todo.activity.todo._todolist_row', array(
     "todoParent" => $todoParent,
    ));
    ?>
  </div>
</div>
<div class="row gb-stat-box">
  <div class="gb-heading col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-no-padding ">
    <div class="gb-title text-center">
      <h4>Progress</h4>
      <div class="progress gb-progress-bar">
        <div class="progress-bar progress-bar-info progress-bar-striped col-lg-12 col-sm-12 col-xs-12" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
        </div>
      </div>
    </div>
    <div class="gb-stat-value">
      <?php echo $todoParent->todo->getProgressStats() . "%"; ?>
    </div>
  </div>
</div>   
<div class="row gb-box-3">  
  <div class="row">
    <h5 class="gb-heading-4 col-lg-5 col-sm-6 col-xs-12">
      Recent Activities
    </h5> 
  </div>
  <div id="gb-recent-activities">
  </div>
</div>

<br>

