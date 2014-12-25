<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="<?php echo 'gb-level-' . $level->id; ?> row">
 <h3 class="gb-item-level-heading gb-ellipsis">
  <?php echo $level->name; ?>
 </h3>
</div>

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
 $this->renderPartial('hobby.views.hobby.forms._hobby_form_with_level', array(
   "formId" => "gb-hobby-form",
   "actionUrl" => Yii::app()->createUrl("hobby/hobby/addHobby", array()),
   "prependTo" => "#gb-hobbies",
   'hobbyModel' => new Hobby(),
   'levelId' => $level->id,
   "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
 ));
 ?>
</div>

<div id="gb-hobbies" class="gb-list">
 <?php
 $this->renderPartial('hobby.views.hobby.activity.hobby._hobby_list', array(
   "hobbies" => $hobbies,
   "hobbiesCount" => $hobbiesCount,
   "level" => $level->id,
   "offset" => 1,
 ));
 ?>
</div>