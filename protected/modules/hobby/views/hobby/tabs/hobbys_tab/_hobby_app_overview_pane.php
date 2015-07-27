<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="nav-container col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
 <div id="gb-middle-nav-3" class="gb-nav-parent">
  <div id="" class="gb-top-nav-1 gb-nav row gb-color-3">
   <div class="gb-title col-lg-10 col-md-10 col-sm-10 col-xs-10">
    <div class="gb-ellipsis">
     <div class="btn-group">
      <a class="btn btn-default btn-sm dropdown-toggle gb-backdrop-visible"
         data-toggle="dropdown" aria-expanded="false"
         data-gb-target-container="#gb-hobby-form-container"
         data-gb-target="#gb-hobby-form"
         data-gb-url = "<?php echo Yii::app()->createUrl('hobby/hobby/addhobby', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
         data-gb-prepend-to="#gb-hobbys">
       <i class="fa fa-filter"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-left gb-form-dropdown" role="menu">
       <li>
        <div class="row gb-panel-form">
         <?php
         $this->renderPartial('hobby.views.hobby.forms._hobby_search_form', array(
           "formId" => "gb-hobby-form",
           "actionUrl" => Yii::app()->createUrl("hobby/hobby/addHobby", array()),
           "prependTo" => "#gb-hobbys",
           "hobbyLevelList" => $hobbyLevelList,
           'hobbyModel' => new Hobby(),
           "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
         ));
         ?>
        </div>
       </li>
      </ul>
     </div>
     HOBBY APP
    </div>
   </div>
   <div class="gb-action col-lg-2 col-md-2 col-sm-2 col-xs-2">
    <div class="btn-group pull-right">
     <a class="btn btn-sm btn-primary dropdown-toggle gb-backdrop-visible"
        data-toggle="dropdown" aria-expanded="false"
        data-gb-target-container="#gb-hobby-form-container"
        data-gb-target="#gb-hobby-form"
        data-gb-url = "<?php echo Yii::app()->createUrl('hobby/hobby/addhobby', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
        data-gb-prepend-to="#gb-hobbys">
      <i class="glyphicon glyphicon-plus"></i>
     </a>
     <ul class="dropdown-menu dropdown-menu-right gb-form-dropdown" role="menu">
      <li>
       <div id="gb-hobby-form-container" class="row gb-panel-form">
        <?php
        $this->renderPartial('hobby.views.hobby.forms._hobby_form', array(
          "formId" => "gb-hobby-form",
          "actionUrl" => Yii::app()->createUrl("hobby/hobby/addHobby", array()),
          "prependTo" => "#gb-hobbys",
          "hobbyLevelList" => $hobbyLevelList,
          'hobbyModel' => new Hobby(),
          "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
        ));
        ?>
       </div>
      </li>
     </ul>
    </div>
   </div>
  </div>
  <div class="gb-scrollable-container col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="row gb-hide">
    <div class="input-group gb-padding-thin">
     <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
     <input class="form-control" id="gb-keyword-search-input" type="text" placeholder="Search hobbys. e.g. awesome, John Doe, dentist">
     <div class="input-group-btn">
      <button id="gb-keyword-search-btn" class="btn btn-default form-control gb-form-show gb-backdrop-visible"
              data-gb-target-container="#gb-hobby-search-form-container"
              data-gb-target="#gb-hobby-search-form"
              data-gb-url = "<?php echo Yii::app()->createUrl('hobby/hobby/searchHobby', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
              data-gb-prepend-to="#gb-hobbys">
       <span class="caret"></span>
      </button>
     </div>
    </div>
   </div>
   <div id="gb-hobby-search-form-container" class="row gb-hide gb-panel-form">
    <?php
    $this->renderPartial('hobby.views.hobby.forms._hobby_search_form', array(
      "formId" => "gb-hobby-search-form",
      "actionUrl" => Yii::app()->createUrl("hobby/hobby/searchHobby", array()),
      "prependTo" => "#gb-hobbys",
      "hobbyLevelList" => $hobbyLevelList,
      'hobbyModel' => new Hobby(),
      "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_REPLACE
    ));
    ?>
   </div>
   <div id="gb-hobbys" class="gb-list row">
    <?php
    $this->renderPartial('hobby.views.hobby.activity.hobby._hobby_list', array(
      "hobbys" => $hobbys,
      "hobbysCount" => $hobbysCount,
      "level" => 0,
      "offset" => 1,
    ));
    ?>
   </div>
   <div class="gb-dummy-height row"></div>
  </div>
 </div>
</div>