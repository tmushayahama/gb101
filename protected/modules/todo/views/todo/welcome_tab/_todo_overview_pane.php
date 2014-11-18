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
  <div class="gb-box-3 gb-background-white gb-margin-left-neg-thick gb-padding-medium">
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
    <h5 class="gb-heading-4 col-lg-5 col-sm-6 col-xs-12 gb-margin-left-neg-thick">
      Recent Activities
    </h5> 
  </div>
  <div id="gb-recent-activities">
  </div>
</div>

<br>

