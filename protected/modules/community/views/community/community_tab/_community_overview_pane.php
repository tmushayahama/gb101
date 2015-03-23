<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="nav-container col-lg-4 col-md-4 col-sm-12 col-xs-12 gb-no-padding">
 <div id="gb-middle-nav-3" class="gb-nav-parent">
  <div class="row">
   <ul id="" class="gb-top-nav-1 col-lg-12 gb-nav">
    <div class="gb-nav-heading-1 col-lg-9 col-sm-2 col-xs-12">
     <a>
      <p class="gb-title gb-ellipsis">COMMUNITY</p>
     </a>
    </div>
   </ul>
  </div>
  <br>
  <div class="row gb-hide">
   <div class="input-group gb-padding-thin">
    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
    <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search communitys. e.g. awesome, John Doe, dentist">
    <div class="input-group-btn">
     <button id="gb-keyword-search-btn" class="btn btn-default form-control gb-form-show gb-backdrop-visible"
             data-gb-target-container="#gb-community-search-form-container"
             data-gb-target="#gb-community-search-form"
             data-gb-url = "<?php echo Yii::app()->createUrl('community/community/searchCommunity', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
             data-gb-prepend-to="#gb-communitys">
      <span class="caret"></span>
     </button>
    </div>
   </div>
  </div>
  <div id="gb-people" class="gb-list">
   <?php
   foreach ($people as $person) :
    echo $this->renderPartial('community.views.community.person._person_badge', array(
      'person' => $person));
   endforeach;
   ?>
  </div>
  <div class="gb-dummy-height"></div>
 </div>
</div>
<div class="nav-container col-lg-7 col-md-7 col-sm-12 col-xs-12 gb-no-padding">
 <div id="gb-right-nav-3" class="">
  <div class="tab-content">
   <!---------- COMMUNITY MANAGEMENT WELCOME OVERVIEW PANE ------------>
   <div class="tab-pane active" id="gb-profile-item-pane">
    <br>
    <h4 class="text-center text-warning gb-no-information row">
     select a profile to show
    </h4>
   </div>
  </div>
  <div class="gb-dummy-height"></div>
 </div>
</div>
