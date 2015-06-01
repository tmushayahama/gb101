<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gb-padding-none">
  <ul class="gb-side-nav-1 row gb-padding-none">
    <li class="active col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
      <a class="row" href="#gb-todo-app-todo-pane" data-toggle="tab">
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-padding-none pull-left">
          <img class="gb-icon-2 col-lg-2 gb-padding-none" src="<?php echo Yii::app()->request->baseUrl; ?>/img/todo_icon_2.png" alt="">
          <div class="col-lg-8 gb-padding-none"><p class="gb-ellipsis ">Sub Todos</p></div>
        </div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
      <a class="row" href="#gb-todo-app-mentorship-pane" data-toggle="tab">
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-padding-none pull-left">
          <img class="gb-icon-2 col-lg-2 gb-padding-none" src="<?php echo Yii::app()->request->baseUrl; ?>/img/mentorship_icon_2.png" alt="">
          <div class="col-lg-8 gb-padding-none"><p class="gb-ellipsis ">Todos</p></div>
        </div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
      <a class="row" href="#gb-todo-app-advice-pages-pane" data-toggle="tab">
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-padding-none pull-left">
          <img class="gb-icon-2 col-lg-2 gb-padding-none" src="<?php echo Yii::app()->request->baseUrl; ?>/img/advice_pages_icon_2.png" alt="">
          <div class="col-lg-8 gb-padding-none"><p class="gb-ellipsis ">Advice Pages</p></div>
        </div>
        <i class="glyphicon glyphicon-chevron-right pull-right"></i>
      </a>
    </li>
  </ul>
</div>
<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 gb-padding-none">
  <div class="tab-content gb-padding-left-3">
    <div class="tab-pane active" id="gb-todo-app-todo-pane">
      <h3 class="gb-heading-2">Todos</h3>

    </div>
    <div class="tab-pane" id="gb-todo-app-mentorship-pane">
      <h3 class="gb-heading-2">Todo Todos</h3>

    </div>
    <div class="tab-pane" id="gb-todo-app-advice-pages-pane">
      <h3 class="gb-heading-2">Todo Advice Pages</h3>

    </div>
  </div>
</div>


