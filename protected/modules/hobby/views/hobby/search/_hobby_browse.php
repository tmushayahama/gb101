<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="container">
 <br>
 <h4 class="gb-heading-2">Hobby Browse</h4>
 <div class="row">
  <div class="gb-home-left-nav col-lg-3 col-md-3 col-sm-12 col-xs-12 gb-padding-none">
   <ul class="gb-side-nav-1">
    <li class="active col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
     <a class="gb-link"
        data-gb-url="<?php echo Yii::app()->createUrl("hobby/hobby/hobbyLevelSearch", array()); ?>"
        data-gb-target-pane-id="#gb-search-tab-pane">
      <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-padding-none pull-left">
       <div class="col-lg-12 gb-padding-none"><p class="gb-ellipsis ">Category</p></div>
      </div>
      <i class="glyphicon glyphicon-chevron-right pull-right"></i>
     </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
     <a class="gb-link"
        data-gb-url="<?php echo Yii::app()->createUrl("hobby/hobby/hobbyLevelSearch", array()); ?>"
        data-gb-target-pane-id="#gb-search-tab-pane">
      <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-padding-none pull-left">
       <div class="col-lg-12 gb-padding-none"><p class="gb-ellipsis ">Level</p></div>
      </div>
      <i class="glyphicon glyphicon-chevron-right pull-right"></i>
     </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
     <a class="gb-link"
        data-gb-url="<?php echo Yii::app()->createUrl("hobby/hobby/hobbyLevelSearch", array()); ?>"
        data-gb-target-pane-id="#gb-search-tab-pane">
      <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-padding-none pull-left">
       <div class="col-lg-12 gb-padding-none"><p class="gb-ellipsis ">Tags</p></div>
      </div>
      <i class="glyphicon glyphicon-chevron-right pull-right"></i>
     </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
     <a class="gb-link"
        data-gb-url="<?php echo Yii::app()->createUrl("hobby/hobby/hobbyLevelSearch", array()); ?>"
        data-gb-target-pane-id="#gb-search-tab-pane">
      <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-padding-none pull-left">
       <div class="col-lg-12 gb-padding-none"><p class="gb-ellipsis ">People</p></div>
      </div>
      <i class="glyphicon glyphicon-chevron-right pull-right"></i>
     </a>
    </li>
    <li class="col-lg-12 col-sm-12 col-xs-12 gb-padding-none">
     <a class="gb-link"
        data-gb-url="<?php echo Yii::app()->createUrl("hobby/hobby/hobbyLevelSearch", array()); ?>"
        data-gb-target-pane-id="#gb-search-tab-pane">
      <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 gb-padding-none pull-left">
       <div class="col-lg-12 gb-padding-none"><p class="gb-ellipsis ">Keyword</p></div>
      </div>
      <i class="glyphicon glyphicon-chevron-right pull-right"></i>
     </a>
    </li>

   </ul>
  </div>
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 gb-padding-none">
   <div id="gb-search-tab-pane" class="tab-content gb-padding-left-3 gb-height-7 gb-scrollable">

   </div>
  </div>
 </div>
</div>
