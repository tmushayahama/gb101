<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row gb-box-3">
  <div class="row">
    <div class="col-lg-11 col-sm-11 col-xs-11 gb-no-padding">
      <p class="gb-display-attribute col-lg-12 col-sm-12 col-xs-12 gb-no-padding">
        <?php echo $todoChild->description; ?>
      </p>      
    </div>
  </div>
</div>
<div class="row gb-box-3">  
  <div class="row">
    <h5 class="gb-heading-4 col-lg-6 col-sm-6 col-xs-12">
      Todo Progress
      <span class="pull-right badge badge-info">
        <?php echo '20%' ?>
      </span>
    </h5> 
  </div>
  <div class="progress">
    <div class="progress-bar progress-bar-info progress-bar-striped col-lg-12 col-sm-12 col-xs-12" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
      <span class="sr-only">20% Complete</span>
    </div>
  </div>
</div>

<div class="row gb-box-3">
  <div class="row">
    <h5 class="gb-heading-4 col-lg-6 col-sm-6 col-xs-12">
      Checklist
      <span class="pull-right badge badge-info">
        <?php echo '70%' ?>
      </span>
    </h5>
  </div>
  <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
       gb-is-child-form="1"
       gb-form-target="#gb-todo-todo-form"
       gb-form-parent-id-input="#gb-todo-todo-form-parent-todo-id-input"
       gb-form-description-input="#gb-skill-todo-form-description-input"
       gb-form-parent-id="<?php echo $todoChild->id; ?>">
    <textarea class="form-control"
              placeholder="Add a Checklist"
              rows="1"></textarea>
    <div class="input-group-btn">
      <div class="input-group-btn">
        <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus-sign"></i></button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Assign</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div>
  </div>
</div>
<div class="row gb-box-3">      
  <h5 class="gb-heading-4 col-lg-6 col-sm-6 col-xs-12">
    Contributors
    <span class="pull-right badge badge-info">
      <?php echo '0' ?>
    </span>
  </h5> 
</div>
<div class="row gb-box-3">  
  <div class="row">
    <h5 class="gb-heading-4 col-lg-6 col-sm-6 col-xs-12">
      Comments
      <span class="pull-right badge badge-info">
        <?php echo '0' ?>
      </span>
    </h5> 
  </div>
  <div class="gb-form-middleman input-group col-lg-12 col-sm-12 col-xs-12"
       gb-is-child-form="1"
       gb-form-target="#gb-todo-comment-form"
       gb-form-parent-id-input="#gb-todo-todo-form-parent-todo-id-input"
       gb-form-description-input="#gb-skill-todo-form-description-input"
       gb-form-parent-id="<?php echo $todoChild->id; ?>">
    <textarea class="form-control"
              placeholder="Comment"
              rows="1"></textarea>
    <div class="input-group-btn">
      <div class="input-group-btn">
        <button type="button" class="gb-form-middleman-submit btn btn-default"><i class="gb-no-margin glyphicon glyphicon-plus-sign"></i></button>
      </div><!-- /btn-group -->
    </div>
  </div>
</div>
<div class="row gb-box-3">      
  <h5 class="gb-heading-4 col-lg-6 col-sm-6 col-xs-12">
    Notes
    <span class="pull-right badge badge-info">
      <?php echo '0' ?>
    </span>
  </h5> 
</div>
<div class="row gb-box-3">      
  <h5 class="gb-heading-4 col-lg-6 col-sm-6 col-xs-12">
    Files
    <span class="pull-right badge badge-info">
      <?php echo '0' ?>
    </span>
  </h5> 
</div>
<br>

