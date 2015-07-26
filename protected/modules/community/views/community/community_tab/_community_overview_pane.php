<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="nav-container col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
 <div id="gb-right-nav-2" class="gb-nav-parent">
  <div id="" class="gb-top-nav-1 gb-color-7 row gb-nav">
   <div class="gb-nav-heading-1 col-lg-9 col-md-9 col-sm-9 col-xs-12">
    <a>
     <p class="gb-title gb-ellipsis">COMMUNITY</p>
    </a>
   </div>
  </div>
  <div class="gb-scrollable-container col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
   <div id="gb-people" class="row gb-list">
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
</div>