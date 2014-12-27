<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-middle-nav-3" class="gb-nav-parent col-lg-4 col-md-5 col-sm-12 col-xs-12">
 <div class="tab-content">
  <div class="tab-pane active" id="gb-app-overview-pane">
   <div class="row">
    <a class="btn btn-default btn-lg gb-form-show gb-backdrop-visible col-lg-12 col-md-12 col-sm-12 col-xs-12"
       data-gb-target-container="#gb-hobby-form-container"
       data-gb-target="#gb-hobby-form"
       data-gb-url = "<?php echo Yii::app()->createUrl('hobby/hobby/addhobby', array('rowType' => Type::$ROW_TYPE_NAV)); ?>"
       data-gb-prepend-to="#gb-hobbies">
     <i class="glyphicon glyphicon-plus-sign"></i> Add a Hobby
    </a>
   </div>
   <div id="gb-hobby-form-container" class="row gb-hide gb-panel-form">
    <?php
    $this->renderPartial('hobby.views.hobby.forms._hobby_form', array(
      "formId" => "gb-hobby-form",
      "actionUrl" => Yii::app()->createUrl("hobby/hobby/addHobby", array()),
      "prependTo" => "#gb-hobbies",
      "hobbyLevelList" => $hobbyLevelList,
      'hobbyModel' => new Hobby(),
      "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
    ));
    ?>
   </div>

   <div id="gb-hobbies" class="gb-list">
    <?php
    $this->renderPartial('hobby.views.hobby.activity.hobby._hobby_list', array(
      "hobbies" => $hobbies,
      "hobbiesCount" => $hobbiesCount,
      "level" => 0,
      "offset" => 1,
    ));
    ?>
   </div>
  </div>
 </div>
 <div class="gb-dummy-height"></div>
</div>
<div id="gb-right-nav-3" class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
 <div class="tab-content">
  <!---------- HOBBY MANAGEMENT WELCOME OVERVIEW PANE ------------>
  <div class="tab-pane active" id="gb-hobby-item-pane">
   <br>
   <h4 class="text-center text-warning gb-no-information row">
    select a hobby to show
   </h4>
  </div>
 </div>
 <div class="gb-dummy-height"></div>
</div>