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

