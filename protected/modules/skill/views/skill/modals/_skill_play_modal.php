<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="gb-skill-play-modal" class="modal gb-modal-lg fade gb-z-index-2000" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-hidden="true">X</button>
    <span class="gb-title">Skill Play</span>
   </div>
   <div class="modal-body gb-padding-none">
    <div class="row" role="tabpanel">
     <ul class="gb-modal-tabs-left nav col-lg-1 col-md-1 col-sm-2 col-xs-2"
         id="demo-pill-nav">
      <li class="active col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
       <a class="gb-link text-center" data-toggle="tab"
          data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillPlay", array()); ?>"
          data-gb-target-pane-id="#gb-skill-play-tab-pane">
        <i class="fa fa-play"></i>
       </a>
      </li>
      <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
       <a class="gb-link text-center" data-toggle="tab"
          data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillPlayHistory", array()); ?>"
          data-gb-target-pane-id="#gb-skill-play-tab-pane">
        <i class="fa fa-history"></i>
       </a>
      </li>
     </ul>
     <div class="gb-modal-panes-right tab-content col-lg-11 col-md-11 col-sm-10 col-xs-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-2 col-xs-offset-2">
      <div class="tab-pane active" id="gb-skill-play-tab-pane">
       <?php
       $this->renderPartial('skill.views.skill.activity.skill._skill_play', array(
         "actionUrl" => Yii::app()->createUrl("skill/skill/addSkillPlayAnswer", array()),
         "skillPlayAnswerModel" => new SkillPlayAnswer(),
         "ajaxReturnAction" => Type::$AJAX_RETURN_ACTION_PREPEND
       ));
       ?>
      </div>
     </div>
     <br>
    </div>
   </div>
   <div class="modal-footer gb-modal-footer-abs">
    <div class="row">
     <a class="btn btn-default" data-dismiss="modal" aria-hidden="true">Done</a>
    </div>
   </div>
  </div>
 </div>
</div>