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
<div class="row gb-box-1">
  <div class="row">
    <div class="col-lg-11 col-sm-11 col-xs-11 gb-no-padding">
      <p class="gb-display-attribute col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
        <?php echo $todoParent->todo->description; ?>
      </p>      
    </div>
  </div>
</div>
<br>

<div class="row">      
  <h4 class="gb-heading-2">
    Todo Progress
    <span class="pull-right badge badge-info">
      <?php echo '20%' ?>
    </span>
  </h4> 

  <div class="progress">
    <div class="progress-bar progress-bar-info progress-bar-striped col-lg-12 col-sm-12 col-xs-12" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
      <span class="sr-only">20% Complete</span>
    </div>
  </div>
  <div class = "row">
    <?php
    $this->renderPartial('skill.views.skill.activity.todo._skill_todo_children_progress', array(
     "todoListChildren" => $todoListChildren,
    ));
    ?>        
  </div>
</div>
<br>

