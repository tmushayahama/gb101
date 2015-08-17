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
     <ul class="gb-modal-tabs-left nav col-lg-4 col-md-4 col-sm-4 col-xs-4"
         id="demo-pill-nav">
      <p class="gb-padding-medium">
       A random skill will appear.
       <i> Choose what you wanna do with it?</i>
      </p>
      <li class="active col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
       <a class="gb-link" data-toggle="tab"
          data-gb-url="<?php echo Yii::app()->createUrl("skill/skillTab/skillPlay", array()); ?>"
          data-gb-target-pane-id="#gb-skill-item-tab-pane">
        Play
       </a>
      </li>
      <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
       <a href="#tab-r2" data-toggle="tab">
        History
       </a>
      </li>
      <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
       <a href="#tab-r3" data-toggle="tab">
        Formula
       </a>
      </li>
      <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gb-padding-none">
       <a href="#tab-r4" data-toggle="tab">
        Share
       </a>
      </li>
     </ul>
     <div class="gb-modal-panes-right tab-content col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
      <div class="tab-pane active" id="tab-r1">
       <div class="gb-heading-3">PLAY</div>
       <div class="gb-panel-display row">
        <div class="row">
         <?php
         $this->renderPartial('skill.views.skill.forms._skill_play_form', array(
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